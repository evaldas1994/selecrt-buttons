<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CounterStoreUpdateRequest extends FormRequest
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
        $id = $this->route()->parameter('counter');

        return [
            'f_id' => 'string|required|max:20|unique:t_counter,f_id,' .$id. ',f_id',
            'f_txt' => 'string|max:20|nullable',
            'f_txt_len' =>'integer|required',
            'f_num' =>'integer|required' ,
            'f_num_len' =>'integer|required' ,
            'f_seq' => 'string|max:40|nullable',
            'f_type' =>'integer' ,
            'f_system1' => 'string|max:100|nullable',
            'f_system2' => 'string|max:100|nullable',
            'f_system3' => 'string|max:100|nullable',
            'f_copy_to_ano' => 'boolean',
        ];
    }
}
