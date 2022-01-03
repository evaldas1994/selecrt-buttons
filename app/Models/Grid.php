<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasCompositePrimaryKeyTrait;
use App\Traits\UpdateCreatedModifiedUserIdColumns;

class Grid extends Model
{
    use UpdateCreatedModifiedUserIdColumns, HasCompositePrimaryKeyTrait;

    protected $table = 't_grid2';

    protected $perPage = 10;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'f_userid',
        'f_form',
        'f_col_sel'
    ];

    protected $attributes = [
        'f_filter_field' => null,
        'f_filter_qry' => null,
        'f_order_field' => null,
        'f_order_direction' => null,
        'f_system1' => null,
        'f_system2' => null,
        'f_system3' => null,
    ];

    /**
     * @var string[]
     */
    protected $primaryKey = array('f_userid', 'f_form');

    protected $keyType = 'array';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
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
}
