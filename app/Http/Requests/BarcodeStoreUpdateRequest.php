<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BarcodeStoreUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = $this->route()->parameter('barcode');

        return [
            'f_id' => 'string|required|max:20|unique:t_barcode,f_id,' .$id. ',f_id',
            'f_stockid' => 'string|max:20|nullable|exists:t_stock,f_id',
            'f_default' => 'boolean',
            'f_system1' => 'string|max:100|nullable',
            'f_system2' => 'string|max:100|nullable',
            'f_system3' => 'string|max:100|nullable',
            'f_ratio' => 'numeric|between:0,9999999999.9999|regex:/^\d+(\.\d{1,4})?$/',
            'f_name' => 'string|max:100|nullable',
            'f_neto' => 'numeric|between:0,9999999999.9999|regex:/^\d+(\.\d{1,4})?$/',
            'f_plastic' => 'numeric|between:0,9999999999.9999|regex:/^\d+(\.\d{1,4})?$/',
            'f_paper' => 'numeric|between:0,9999999999.9999|regex:/^\d+(\.\d{1,4})?$/',
            'f_glass' => 'numeric|between:0,9999999999.9999|regex:/^\d+(\.\d{1,4})?$/',
            'f_wood' => 'numeric|between:0,9999999999.9999|regex:/^\d+(\.\d{1,4})?$/',
            'f_pap1' => 'numeric|between:0,9999999999.9999|regex:/^\d+(\.\d{1,4})?$/',
            'f_pap2' => 'numeric|between:0,9999999999.9999|regex:/^\d+(\.\d{1,4})?$/',
            'f_usadid' => 'string|max:20|nullable',
        ];
    }
}
