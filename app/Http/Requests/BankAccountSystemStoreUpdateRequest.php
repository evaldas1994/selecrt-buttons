<?php

namespace App\Http\Requests;

use Illuminate\Support\Arr;
use App\Rules\IdPatternRule;
use Illuminate\Validation\Rule;
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
        if (Arr::exists($this->input(), 'button-action-without-validation')) {
            return [];
        }

        $unique = in_array($this->method(), ['PUT', 'PATCH']) ? Rule::unique('t_bankaccount_system')->ignore($this->bank_account_system) : 'unique:t_bankaccount_system';
        return [
            'f_id' => [$unique, 'required', 'max:20', new IdPatternRule],
            'f_bankid' => 'string|max:20|nullable|exists:t_bank,f_id',
            'f_default' => 'boolean',
            'f_system1' => 'string|max:100|nullable',
            'f_system2' => 'string|max:100|nullable',
            'f_system3' => 'string|max:100|nullable',
            'f_name' => 'string|max:100|nullable',
        ];
    }
}
