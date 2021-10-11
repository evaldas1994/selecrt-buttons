<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BankAccountSystemStoreUpdateRequest extends FormRequest
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
        $id = $this->route()->parameter('bank_account_system');

        return [
            'f_id' => 'string|required|max:20|unique:t_bankaccount_system,f_id,' .$id. ',f_id',
            'f_bankid' => 'string|max:20|nullable|exists:t_bank,f_id',
            'f_default' => 'boolean',
            'f_system1' => 'string|max:100|nullable',
            'f_system2' => 'string|max:100|nullable',
            'f_system3' => 'string|max:100|nullable',
            'f_name' => 'string|max:100|nullable',
        ];
    }
}
