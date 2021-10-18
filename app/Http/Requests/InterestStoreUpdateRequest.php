<?php

namespace App\Http\Requests;

use App\Rules\IdPatternRule;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class InterestStoreUpdateRequest extends FormRequest
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
        $unique = in_array($this->method(), ['PUT', 'PATCH']) ? Rule::unique('t_interests')->ignore($this->interest) : 'unique:t_interests';
        return [
            'f_id' => [$unique, 'required', 'max:20', new IdPatternRule],
            'f_interest' => 'string|max:20|required',
            'f_system1' => 'string|max:100|nullable',
            'f_system2' => 'string|max:100|nullable',
            'f_system3' => 'string|max:100|nullable',
        ];
    }
}
