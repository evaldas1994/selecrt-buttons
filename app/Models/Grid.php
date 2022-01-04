<?php

namespace App\Models;

use App\Traits\HasCompositePrimaryKey;
use App\Traits\UpdateCreatedModifiedUserIdColumns;
use Illuminate\Database\Eloquent\Model;

class Grid extends Model
{
    use UpdateCreatedModifiedUserIdColumns,HasCompositePrimaryKey;

    protected $table = 't_grid2';

    protected $primaryKey = ['f_userid', 'f_form'];

    public $incrementing = false;

    /**
     * The name of the "created at" column.
     *
     * @var string|null
     */
    const CREATED_AT = 'f_create_date';

    /**
     * The name of the "updated at" column.
     *
     * @var string|null
     */
    const UPDATED_AT = 'f_modified_date';

    protected $fillable = [
        'f_userid',
        'f_form',
        'f_col_sel',
        'f_filter_field',
        'f_filter_qry',
        'f_order_field',
        'f_order_direction',
    ];

}
