<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UnitRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        $id = $this->route()->parameter('unit');

        return [
            'f_id' => 'required|unique:t_unit,f_id,' .$id. ',f_id|max:20',
            'f_name' => 'required|max:100',
            'f_system1' => 'max:100|nullable',
            'f_system2' => 'max:100|nullable',
            'f_system3' => 'max:100|nullable',
            'f_component' => 'required|numeric',
        ];
    }
}
