<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MessageStoreUpdateRequest extends FormRequest
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
        $id = $this->route()->parameter('message');

        return [
            'f_id' => 'required|unique:t_message,f_id,' .$id. ',f_id|max:20',
            'f_name' => 'string|required|max:100',
            'f_groupid' => 'string|required|max:20|exists:t_messagegroup,f_id',
            'f_days' => 'numeric|between:0,9999999999.99|regex:/^\d+(\.\d{1,4})?$/|nullable',
            'f_min_sum' => 'numeric|between:0,9999999999.99|regex:/^\d+(\.\d{1,4})?$/|nullable',
            'f_subject' => 'string|max:100|nullable',
            'f_message' => 'string|nullable',
            'f_system1' => 'max:100|nullable',
            'f_system2' => 'max:100|nullable',
            'f_system3' => 'max:100|nullable',
        ];
    }
}
