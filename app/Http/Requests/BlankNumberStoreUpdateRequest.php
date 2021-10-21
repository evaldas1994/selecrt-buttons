<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlankNumberStoreUpdateRequest extends FormRequest
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
        return [
            'f_counterid' => 'string|max:20|exists:t_counter,f_id',
            'f_op' => 'string|max:1|nullable',
            'f_storeid' => 'string|max:20|nullable|exists:t_store,f_id',
            'f_groupid' => 'string|max:20|nullable|existc:t_stockopgroup,f_id',
            'f_system1' => 'string|max:100|nullable',
            'f_system2' => 'string|max:100|nullable',
            'f_system3' => 'string|max:100|nullable',
            'f_invoice_register' => 'string|max:5|nullable',
        ];
    }
}
