<?php

namespace App\Models;

use App\Traits\IdToUppercase;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UpdateCreatedModifiedUserIdColumns;


class Store extends Model
{
    use IdToUppercase, UpdateCreatedModifiedUserIdColumns;

    protected $table = 't_store';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'f_id',
        'f_name',
        'f_name2',
        'f_address',
        'f_accountid',
        'f_f1',
        'f_f2',
        'f_f3',
        'f_f4',
        'f_f5',
        'f_r1id',
        'f_r2id',
        'f_r3id',
        'f_r4id',
        'f_r5id',
        'f_departmentid',
        'f_personid',
        'f_projectid',
        'f_create_userid',
        'f_modified_userid',
        'f_system1',
        'f_system2',
        'f_system3',
        'f_store',
        'f_iln_edisoft',
        'f_store_email',
        'f_noexported',
        'f_price_by_store',
        'f_vat_code',
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

    /**
     * Get the stock's register 1.
     */
    public function r1()
    {
        return $this->hasOne(R1::class, 'f_id', 'f_r1id');
    }

    /**
     * Get the stock's register 2.
     */
    public function r2()
    {
        return $this->hasOne(R2::class, 'f_id', 'f_r2id');
    }

    /**
     * Get the stock's register 3.
     */
    public function r3()
    {
        return $this->hasOne(R3::class, 'f_id', 'f_r3id');
    }

    /**
     * Get the stock's register 4.
     */
    public function r4()
    {
        return $this->hasOne(R4::class, 'f_id', 'f_r4id');
    }

    /**
     * Get the stock's register 5.
     */
    public function r5()
    {
        return $this->hasOne(R5::class, 'f_id', 'f_r5id');
    }
}
