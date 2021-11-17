<?php

namespace App\Http\Requests;

use App\Models\Budget;
use App\Rules\FloatRule;
use App\Rules\IdPatternRule;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class BudgetStoreUpdateRequest extends FormRequest
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

        $unique = in_array($this->method(), ['PUT', 'PATCH']) ? Rule::unique('t_bom')->ignore($this->production_card) : 'unique:t_bom';
        return [
            'f_id' => [$unique, 'required', 'max:255', new IdPatternRule],
            'f_accountid' => 'required|exists:t_account,f_id',
            'f_year' => 'required|integer|min:2018|max:2023',
            'f_month' => ['required', 'string', Rule::in(Budget::$month)],
            'f_r1id' => 'required|exists:t_r1,f_id',
            'f_r2id' => 'required|exists:t_r2,f_id',
            'f_r3id' => 'required|exists:t_r3,f_id',
            'f_r4id' => 'required|exists:t_r4,f_id',
            'f_r5id' => 'required|exists:t_r5,f_id',
            'f_departmentid' => 'required|exists:t_department,f_id',
            'f_projectid' => 'required|exists:t_project,f_id',
            'f_system1' => 'string|max:100|nullable',
            'f_system2' => 'string|max:100|nullable',
            'f_system3' => 'string|max:100|nullable',
            'f_credit_sum' => ['required', 'numeric', new FloatRule(4)],
            'f_debit_sum' => ['required', 'numeric', new FloatRule(4)],
        ];
    }
}
