<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VatStoreRequest extends FormRequest
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
            'f_id' => 'required|max:20',
            'f_i' => 'max:20',
            //'f_vat_perc' => 'required|numeric',
            //'f_priority_in_integrations' => 'required|boolean',
        ];
    }
}
