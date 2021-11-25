<?php

namespace App\Http\Requests;

use App\Models\Salaryh;
use App\Rules\FloatRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SalaryhStoreUpdateRequest extends FormRequest
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
            'f_docdate' => 'required|date',
//            'f_docno' => 'required|string|max:20',
            'f_blankno' => 'nullable|string|max:50',
            'f_name' => 'string|max:100|nullable',
            'f_description' => 'string|max:100|nullable',
            'f_templateid' => 'required|exists:t_template,f_id',
            'f_curid' => 'required|exists:t_cur,f_id',
            'f_salary' => ['nullable', 'numeric', new FloatRule(4)],
            'f_period_year' => 'required|integer|min:1900|max:2100',
            'f_period_month' => ['required', Rule::in(Salaryh::$months)],
            'f_departmentid' => 'nullable|exists:t_department,f_id',
            'f_system1' => 'string|max:100|nullable',
            'f_system2' => 'string|max:100|nullable',
            'f_system3' => 'string|max:100|nullable',
        ];
    }
}
