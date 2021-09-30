<?php

namespace App\Models;

use App\Traits\IdToUppercase;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UpdateCreatedModifiedUserIdColumns;

/**
 * @method static paginate(int $int)
 */
class Stock extends Model
{
    use IdToUppercase, UpdateCreatedModifiedUserIdColumns;

    protected $table = 't_stock';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'f_id',
        'f_name',
        'f_name2',
        'f_type',
        'f_groupid',
        'f_unitid',
        'f_pack_unitid',
        'f_pack_quant',
        'f_volume',
        'f_weight',
        'f_valid_days',
        'f_valid_date',
        'f_partnerid',
        'f_code',
        'f_price_purch',
        'f_price_sale1',
        'f_price_sale2',
        'f_price_sale3',
        'f_price_sale4',
        'f_price_sale5',
        'f_discid',
        'f_vat_perc',
        'f_vatid',
        'f_curid',
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
        'f_min_quant',
        'f_weightsign',
        'f_product',
        'f_locked',
        'f_create_userid',
        'f_modified_userid',
        'f_system1',
        'f_system2',
        'f_system3',
        'f_scalesign',
        'f_ingredients',
        'f_originating',
        'f_manufacturerid',
        'f_quantity',
        'f_stock_text1',
        'f_stock_text2',
        'f_stock_text3',
        'f_packing',
        'f_partner_discount',
        'f_main_stockid',
        'f_mark1',
        'f_mark2',
        'f_mark3',
        'f_mark4',
        'f_mark5',
        'f_mark6',
        'f_mark7',
        'f_mark8',
        'f_order_block',
        'f_sales_block',
        'f_purch_block',
        'f_height',
        'f_width',
        'f_length',
        'f_image',
        'f_gpais_i',
        'f_gpais_n',
        'f_gpais_a',
        'f_empty_pack',
        'f_pack_type',
        'f_gross_weight',
        'f_catalog_item',
        'f_disp_priority',
        'f_alternative_group_id',
        'f_imgurl',
        'f_ignor_gross_wight',
        'f_prevent_manual_entry',
        'f_diviation_percentage',
        'f_f6',
        'f_f7',
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
