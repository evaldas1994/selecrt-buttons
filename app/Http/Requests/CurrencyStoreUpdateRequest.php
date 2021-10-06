<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CurrencyStoreUpdateRequest extends FormRequest
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
        $id = $this->route()->parameter('currency');

        return [
            'f_id' => 'string|required|max:20|unique:t_cur,f_id,' .$id. ',f_id',
            'f_name' => 'string|max:100|nullable',
            'f_symbol' => 'string|required|max:20|unique:t_cur,f_symbol',
            'f_fraction' => 'string|required|max:20',
            'f_system1' => 'string|max:100|nullable',
            'f_system2' => 'string|max:100|nullable',
            'f_system3' => 'string|max:100|nullable',
        ];
    }
}
