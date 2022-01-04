<?php

/**
 * Created by
 * User: Nerijus Bartoševičius
 * Date: 2022-01-04
 */

namespace App\Helpers\Classes;

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
}
