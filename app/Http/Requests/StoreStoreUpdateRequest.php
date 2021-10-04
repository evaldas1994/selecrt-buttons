<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStoreUpdateRequest extends FormRequest
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
        $id = $this->route()->parameter('store');

        return [
            'f_id' => 'string|required|max:20|unique:t_store,f_id,' .$id. ',f_id',
            'f_name' => 'string|max:100|nullable',
            'f_name2' => 'string|max:100|nullable',
            'f_address' => 'string|max:100|nullable',
            'f_accountid' => 'string|max:20|nullable',
            'f_f1' => 'string|max:1000|nullable',
            'f_f2' => 'string|max:1000|nullable',
            'f_f3' => 'string|max:1000|nullable',
            'f_f4' => 'string|max:1000|nullable',
            'f_f5' => 'string|max:1000|nullable',
            'f_r1id' => 'string|max:20|nullable|exists:t_r1,f_id',
            'f_r2id' => 'string|max:20|nullable|exists:t_r2,f_id',
            'f_r3id' => 'string|max:20|nullable|exists:t_r3,f_id',
            'f_r4id' => 'string|max:20|nullable|exists:t_r4,f_id',
            'f_r5id' => 'string|max:20|nullable|exists:t_r5,f_id',
            'f_departmentid' => 'string|max:20|nullable',
            'f_personid' => 'string|max:20|nullable',
            'f_projectid' => 'string|max:20|nullable',
            'f_system1' => 'string|max:100|nullable',
            'f_system2' => 'string|max:100|nullable',
            'f_system3' => 'string|max:100|nullable',
            'f_store' => 'string|max:20|nullable',
            'f_iln_edisoft' => 'string|max:20|nullable',
            'f_store_email' => 'string|max:300|nullable',
            'f_noexported' => 'boolean',
            'f_price_by_store' => 'boolean',
            'f_vat_code' => 'string|max:20|nullable',
        ];
    }
}
