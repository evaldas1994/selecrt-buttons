<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BonusStoreUpdateRequest extends FormRequest
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
            'f_employee_id' => 'string|max:20|exists:t_employee,f_id',
            'f_bonus_name' => 'string|max:30',
            'f_description' => 'string|max:150|nullable',
            'f_value' => 'numeric|between:0,9999999.99|regex:/^\d+(\.\d{1,2})?$/',
            'f_date_from' => 'date|nullable|required',
            'f_date_till' => 'date|nullable|required',
            'f_reason' => 'string|max:5|required',
            'f_type' => 'integer|nullable',
        ];
    }
}
