<?php

/**
 * Created by
 * User: Nerijus Bartoševičius
 * Date: 2022-01-04
 */

namespace App\Helpers\Classes;

use Illuminate\Support\Arr;

class Grid
{
    protected $gridObeject;

    /**
     * @param null $form
     */
    public function __construct(protected $form = null)
    {
        if (!is_null($this->form)) {
            $this->gridObeject = \App\Models\Grid::find(['f_userid' => auth()->user()->f_id, 'f_form' => $this->form]);
        }
    }

    /**
     * @return array
     */
    public function getSortableDefaultColumn(): array
    {
        $columns = [];
        if ($this->gridObeject) {
            $columns = [$this->gridObeject->f_order_field => $this->gridObeject->f_order_direction];
        }
        return $columns;
    }

    public function getColumn($column)
    {
        return optional($this->gridObeject)->{$column};
    }

    /**
     * @param $form
     * @param array $data
     * @return mixed
     */
    public static function updateOrCreate($form, $data = array())
    {
        return \App\Models\Grid::updateOrCreate(['f_userid' => auth()->user()->f_id, 'f_form' => $form,], $data);
    }


    /**
     * @param array $list
     * @param array $defaultArray
     * @param array $sortableGridColumns
     * @return array
     * sets the order of the columns
     */
    private function setItems(array $list, array $defaultArray, array $sortableGridColumns): array
    {
        $gridColumnsArray = [];
        $i = 0;

        foreach ($defaultArray as $defaultItem) {

            if (in_array($defaultItem, $list)) {
                $relation = array_search($defaultItem, $sortableGridColumns);
                if(!is_numeric($relation) && in_array($defaultItem, $sortableGridColumns)){
                    $sortable = $relation;
                }elseif (in_array($defaultItem, $sortableGridColumns)){
                    $sortable = $defaultItem;
                }else{
                    $sortable = null;
                }
                $gridColumnsArray = Arr::add($gridColumnsArray, $i . '.name', $defaultItem);
                $gridColumnsArray = Arr::add($gridColumnsArray, $i . '.active', in_array($defaultItem, $list));
                $gridColumnsArray = Arr::add( $gridColumnsArray, $i . '.sortable', $sortable);
                Arr::forget($list, array_search($defaultItem, $list));
            }
            $i++;
        }

        foreach ($list as $listItem) {
            $gridColumnsArray = Arr::add($gridColumnsArray, $i . '.name', $listItem);
            $gridColumnsArray = Arr::add($gridColumnsArray, $i . '.active', false);
            $gridColumnsArray = Arr::add($gridColumnsArray, $i . '.sortable', false);
            $i++;
        }

        return $gridColumnsArray;
    }

    /**
     * @param $model
     * @return array
     * constructs an array for blade
     */
    public function getGridColumns($model): array
    {
        $gridColumns = $model::$gridColumns;
        $defaultGridColumns = $model::$defaultGridColumns;
        $sortableGridColumns = $model::$sortable;

        $grid = $this->gridObeject;

        return $grid === null || $grid->f_col_sel === null || json_decode($grid->f_col_sel) === []
            ? $this->setItems($gridColumns, $defaultGridColumns, $sortableGridColumns)
            : $this->setItems($gridColumns, json_decode($grid->f_col_sel), $sortableGridColumns);
    }
}
