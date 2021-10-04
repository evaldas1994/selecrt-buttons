<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StockStoreUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        $id = $this->route()->parameter('stock');

        return [
            'f_id' => 'string|required|max:20|unique:t_stock,f_id,' .$id. ',f_id',
            'f_name' => 'string|max:500|nullable',
            'f_name2' => 'string|max:100|nullable',
            'f_type' => 'integer|required',
            'f_groupid' => 'string|max:20|nullable',
            'f_unitid' => 'string|max:20|required|exists:t_unit,f_id',
            'f_pack_unitid' => 'string|max:20|nullable',
            'f_pack_quant' => 'numeric|between:0,9999999999.9999|regex:/^\d+(\.\d{1,4})?$/',
            'f_volume' => 'numeric|between:0,9999999999.9999|regex:/^\d+(\.\d{1,4})?$/',
            'f_weight' => 'numeric|between:0,9999999999.9999|regex:/^\d+(\.\d{1,4})?$/',
            'f_valid_days' => 'integer|nullable',
            'f_valid_date' => 'date|nullable',
            'f_partnerid' => 'string|max:20|nullable',
            'f_code' => 'string|max:20|nullable',
            'f_price_purch' => 'numeric|between:0,9999999999.9999|regex:/^\d+(\.\d{1,4})?$/',
            'f_price_sale1' => 'numeric|between:0,9999999999.9999|regex:/^\d+(\.\d{1,4})?$/',
            'f_price_sale2' => 'numeric|between:0,9999999999.9999|regex:/^\d+(\.\d{1,4})?$/',
            'f_price_sale3' => 'numeric|between:0,9999999999.9999|regex:/^\d+(\.\d{1,4})?$/',
            'f_price_sale4' => 'numeric|between:0,9999999999.9999|regex:/^\d+(\.\d{1,4})?$/',
            'f_price_sale5' => 'numeric|between:0,9999999999.9999|regex:/^\d+(\.\d{1,4})?$/',
            'f_discid' => 'string|max:20|nullable',
            'f_vat_perc' => 'numeric',
            'f_vatid' => 'string|max:20|nullable|required|exists:t_vat,f_id',
            'f_curid' => 'string|max:20|nullable',
            'f_accountid' => 'string|max:20|nullable',
            'f_f1' => 'string|max:1000|nullable',
            'f_f2' => 'string|max:1000|nullable',
            'f_f3' => 'string|max:1000|nullable',
            'f_f4' => 'string|max:1000|nullable',
            'f_f5' => 'string|max:1000|nullable',
            'f_r1id' => 'string|max:20|nullable',
            'f_r2id' => 'string|max:20|nullable',
            'f_r3id' => 'string|max:20|nullable',
            'f_r4id' => 'string|max:20|nullable',
            'f_r5id' => 'string|max:20|nullable',
            'f_departmentid' => 'string|max:20|nullable',
            'f_personid' => 'string|max:20|nullable',
            'f_projectid' => 'string|max:20|nullable',
            'f_min_quant' => 'numeric|between:0,9999999999.9999|regex:/^\d+(\.\d{1,4})?$/|nullable',
            'f_weightsign' => 'boolean',
            'f_product' => 'boolean',
            'f_locked' => 'boolean',
            'f_system1' => 'string|max:100|nullable',
            'f_system2' => 'string|max:100|nullable',
            'f_system3' => 'string|max:100|nullable',
            'f_scalesign' => 'boolean',
            'f_ingredients' => 'string|max:4000|nullable',
            'f_originating' => 'string|max:100|nullable',
            'f_manufacturerid' => 'string|max:20|nullable',
            'f_quantity' => 'string|between:0,9999999999.9999|regex:/^\d+(\.\d{1,4})?$/|nullable',
            'f_stock_text1' => 'string|max:200|nullable',
            'f_stock_text2' => 'string|max:30|nullable',
            'f_stock_text3' => 'string|max:30|nullable',
            'f_packing' => 'string|max:200|nullable',
            'f_partner_discount' => 'numeric|between:0,9999999999.9999|regex:/^\d+(\.\d{1,4})?$/|nullable',
            'f_main_stockid' => 'string|max:20|nullable',
            'f_mark1' => 'boolean',
            'f_mark2' => 'boolean',
            'f_mark3' => 'boolean',
            'f_mark4' => 'boolean',
            'f_mark5' => 'boolean',
            'f_mark6' => 'boolean',
            'f_mark7' => 'boolean',
            'f_mark8' => 'boolean',
            'f_order_block' => 'boolean',
            'f_sales_block' => 'boolean',
            'f_purch_block' => 'boolean',
            'f_height' => 'numeric|between:0,9999999999.9999|regex:/^\d+(\.\d{1,4})?$/|nullable',
            'f_width' => 'numeric|between:0,9999999999.9999|regex:/^\d+(\.\d{1,4})?$/|nullable',
            'f_length' => 'numeric|between:0,9999999999.9999|regex:/^\d+(\.\d{1,4})?$/|nullable',
            'f_image' => 'bytea|nullable',
            'f_gpais_i' => 'boolean',
            'f_gpais_n' => 'boolean',
            'f_gpais_a' => 'boolean',
            'f_empty_pack' => 'boolean',
            'f_pack_type' => 'integer|nullable',
            'f_gross_weight' => 'numeric|between:0,9999999999.9999|regex:/^\d+(\.\d{1,4})?$/',
            'f_catalog_item' => 'boolean',
            'f_disp_priority' => 'integer|nullable',
            'f_alternative_group_id' => 'string|max:20|nullable',
            'f_imgurl' => 'string|max:500|nullable',
            'f_ignor_gross_wight' => 'boolean',
            'f_prevent_manual_entry' => 'boolean',
            'f_diviation_percentage' => 'numeric|max:13|nullable',
            'f_f6' => 'string|max:1000|nullable',//nera blade
            'f_f7' => 'string|max:1000|nullable',//nera blade
        ];
    }
}
