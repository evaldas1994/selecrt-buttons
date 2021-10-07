<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DepartmentStoreUpdateRequest extends FormRequest
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
        $id = $this->route()->parameter('department');

        return [
            'f_id' => 'string|required|max:20|unique:t_department,f_id,' .$id. ',f_id',
            'f_name' => 'string|max:100|nullable',
            'f_name2' => 'string|max:100|nullable',
            'f_system1' => 'string|max:100|nullable',
            'f_system2' => 'string|max:100|nullable',
            'f_system3' => 'string|max:100|nullable',
            'f_parent_id' => 'string|max:20|nullable|exists:t_department,f_id',
            'f_manager_id' => 'string|max:20|nullable',
            'f_doc_confirm_rules' => 'string|nullable',
            'f_accountid1' => 'string|max:20|nullable|exists:t_account,f_id',
            'f_accountid2' => 'string|max:20|nullable|exists:t_account,f_id',
        ];
    }
}
