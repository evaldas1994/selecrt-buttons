<?php

namespace App\Models;

use App\Traits\IdToUppercase;
use App\Traits\UpdateCreatedModifiedUserIdColumns;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    use IdToUppercase, UpdateCreatedModifiedUserIdColumns;

    protected $table = 't_template';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'f_id',
        'f_op',
        'f_description1',
        'f_cred_account1',
        'f_deb_account1',
        'f_name',
        'f_description2',
        'f_cred_account2',
        'f_deb_account2',
        'f_description3',
        'f_cred_account3',
        'f_deb_account3',
        'f_description4',
        'f_cred_account4',
        'f_deb_account4',
        'f_description5',
        'f_cred_account5',
        'f_deb_account5',
        'f_description6',
        'f_cred_account6',
        'f_deb_account6',
        'f_description7',
        'f_cred_account7',
        'f_deb_account7',
        'f_description8',
        'f_cred_account8',
        'f_deb_account8',
        'f_description9',
        'f_cred_account9',
        'f_deb_account9',
        'f_description10',
        'f_cred_account10',
        'f_deb_account10',
        'f_description11',
        'f_cred_account11',
        'f_deb_account11',
        'f_description12',
        'f_cred_account12',
        'f_deb_account12',
        'f_description13',
        'f_cred_account13',
        'f_deb_account13',
        'f_description14',
        'f_cred_account14',
        'f_deb_account14',
        'f_description15',
        'f_cred_account15',
        'f_deb_account15',
        'f_description16',
        'f_cred_account16',
        'f_deb_account16',
        'f_create_userid',
        'f_modified_userid',
        'f_system1',
        'f_system2',
        'f_system3',
        'f_description17',
        'f_description18',
        'f_description19',
        'f_deb_account17',
        'f_deb_account18',
        'f_deb_account19',
        'f_cred_account17',
        'f_cred_account18',
        'f_cred_account19',
        'f_description20',
        'f_cred_account20',
        'f_deb_account20',
        'f_description21',
        'f_cred_account21',
        'f_deb_account21',
        'f_description22',
        'f_cred_account22',
        'f_deb_account22',
        'f_consignment',
        'f_primary_document',
        'f_invoice_register',
        'f_description23',
        'f_cred_account23',
        'f_deb_account23',
        'f_groupid' => 'string|max:20|nullable',
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
}
