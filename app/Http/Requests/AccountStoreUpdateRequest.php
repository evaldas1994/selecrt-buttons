<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccountStoreUpdateRequest extends FormRequest
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
        $id = $this->route()->parameter('account');

        return [
            'f_id' => 'string|required|max:20|unique:t_account,f_id,' .$id. ',f_id',
            'f_name' => 'string|max:100|nullable',
            'f_groupid' => 'string|max:20|nullable',
            'f_type' => 'string|max:1|required',
            'f_purpose' => 'string|max:1|required',
            'f_system1' => 'string|max:100|nullable',
            'f_system2' => 'string|max:100|nullable',
            'f_system3' => 'string|max:100|nullable',
            'f_vmi_code' => 'string|max:20|nullable',
        ];
    }
}
