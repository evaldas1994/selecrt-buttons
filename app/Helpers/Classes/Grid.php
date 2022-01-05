<?php

/**
 * Created by
 * User: Nerijus Bartoševičius
 * Date: 2022-01-04
 */

namespace App\Helpers\Classes;

use App\Models\ProductionCard;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\URL;

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

    public static function updateOrCreate($form, $data = array())
    {
        return \App\Models\Grid::updateOrCreate(['f_userid' => auth()->user()->f_id, 'f_form' => $form,], $data);
    }


    private function setItems($list, $defaultArray, $sortableGridColumns): array
    {
        $gridColumnsArray = [];
        $i = 0;

        foreach ($defaultArray as $defaultItem) {
            if (in_array($defaultItem, $list)) {
                $gridColumnsArray = Arr::add($gridColumnsArray, $i . '.name', $defaultItem);
                $gridColumnsArray = Arr::add($gridColumnsArray, $i . '.active', in_array($defaultItem, $list));
                $gridColumnsArray = Arr::add( $gridColumnsArray, $i . '.sortable', in_array($defaultItem, $sortableGridColumns));
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
