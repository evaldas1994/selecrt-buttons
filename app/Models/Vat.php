<?php

namespace App\Models;

use App\Traits\IdToUppercase;
use App\Traits\UpdateCreatedModifiedUserIdColumns;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Vat extends Model
{
    use IdToUppercase, UpdateCreatedModifiedUserIdColumns, Sortable;

    protected $table = 't_vat';

    protected $perPage = 10;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'f_id',
        'f_name',
        'f_vat_perc',
        'f_default_vat2_id',
        'f_priority_in_integrations',
    ];

    public $sortable = [
        'f_id',
        'f_name',
        'f_vat_perc',
        'f_default_vat2_id',
        'f_priority_in_integrations',
        'f_create_userid',
        'f_create_date',
        'f_modified_userid',
        'f_modified_date',
    ];

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'f_id';

    /**
     * The "type" of the primary key ID.
     *
     * @var string
     */
    protected $keyType = 'string';

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

    protected $with = ['vat2'];

    public function vat2()
    {
        return $this->hasOne(Vat2::class, 'f_id', 'f_default_vat2_id');
    }

    public function addressSortable($query, $direction)
    {
        return $query->join('t_vat2', 't_vat.f_default_vat2_id', '=', 't_vat2.f_id')
            ->orderBy('t_vat2.f_name', $direction)
            ->select('t_vat.*');
    }

}
