<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TemplateStoreUpdateRequest extends FormRequest
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
        $id = $this->route()->parameter('template');

        return [
            'f_id' => 'string|required|max:20|unique:t_template,f_id,' .$id. ',f_id',
            'f_op' => 'string|max:1',
            'f_description1' => 'string|max:100|nullable',
            'f_cred_account1' => 'string|max:20|nullable|exists:t_account,f_id',
            'f_deb_account1' => 'string|max:20|nullable|exists:t_account,f_id',
            'f_name' => 'string|max:100|nullable',
            'f_description2' => 'string|max:100|nullable',
            'f_cred_account2' => 'string|max:20|nullable|exists:t_account,f_id',
            'f_deb_account2' => 'string|max:20|nullable|exists:t_account,f_id',
            'f_description3' => 'string|max:100|nullable',
            'f_cred_account3' => 'string|max:20|nullable|exists:t_account,f_id',
            'f_deb_account3' => 'string|max:20|nullable|exists:t_account,f_id',
            'f_description4' => 'string|max:100|nullable',
            'f_cred_account4' => 'string|max:20|nullable|exists:t_account,f_id',
            'f_deb_account4' => 'string|max:20|nullable|exists:t_account,f_id',
            'f_description5' => 'string|max:100|nullable',
            'f_cred_account5' => 'string|max:20|nullable|exists:t_account,f_id',
            'f_deb_account5' => 'string|max:20|nullable|exists:t_account,f_id',
            'f_description6' => 'string|max:100|nullable',
            'f_cred_account6' => 'string|max:20|nullable|exists:t_account,f_id',
            'f_deb_account6' => 'string|max:20|nullable|exists:t_account,f_id',
            'f_description7' => 'string|max:100|nullable',
            'f_cred_account7' => 'string|max:20|nullable|exists:t_account,f_id',
            'f_deb_account7' => 'string|max:20|nullable|exists:t_account,f_id',
            'f_description8' => 'string|max:100|nullable',
            'f_cred_account8' => 'string|max:20|nullable|exists:t_account,f_id',
            'f_deb_account8' => 'string|max:20|nullable|exists:t_account,f_id',
            'f_description9' => 'string|max:100|nullable',
            'f_cred_account9' => 'string|max:20|nullable|exists:t_account,f_id',
            'f_deb_account9' => 'string|max:20|nullable|exists:t_account,f_id',
            'f_description10' => 'string|max:100|nullable',
            'f_cred_account10' => 'string|max:20|nullable|exists:t_account,f_id',
            'f_deb_account10' => 'string|max:20|nullable|exists:t_account,f_id',
            'f_description11' => 'string|max:100|nullable',
            'f_cred_account11' => 'string|max:20|nullable|exists:t_account,f_id',
            'f_deb_account11' => 'string|max:20|nullable|exists:t_account,f_id',
            'f_description12' => 'string|max:100|nullable',
            'f_cred_account12' => 'string|max:20|nullable|exists:t_account,f_id',
            'f_deb_account12' => 'string|max:20|nullable|exists:t_account,f_id',
            'f_description13' => 'string|max:100|nullable',
            'f_cred_account13' => 'string|max:20|nullable|exists:t_account,f_id',
            'f_deb_account13' => 'string|max:20|nullable|exists:t_account,f_id',
            'f_description14' => 'string|max:100|nullable',
            'f_cred_account14' => 'string|max:20|nullable|exists:t_account,f_id',
            'f_deb_account14' => 'string|max:20|nullable|exists:t_account,f_id',
            'f_description15' => 'string|max:100|nullable',
            'f_cred_account15' => 'string|max:20|nullable|exists:t_account,f_id',
            'f_deb_account15' => 'string|max:20|nullable|exists:t_account,f_id',
            'f_description16' => 'string|max:100|nullable',
            'f_cred_account16' => 'string|max:20|nullable|exists:t_account,f_id',
            'f_deb_account16' => 'string|max:20|nullable|exists:t_account,f_id',
            'f_system1' => 'string|max:100|nullable',
            'f_system2' => 'string|max:100|nullable',
            'f_system3' => 'string|max:100|nullable',
            'f_description17' => 'string|max:100|nullable',
            'f_description18' => 'string|max:100|nullable',
            'f_description19' => 'string|max:100|nullable',
            'f_deb_account17' => 'string|max:20|nullable|exists:t_account,f_id',
            'f_deb_account18' => 'string|max:20|nullable|exists:t_account,f_id',
            'f_deb_account19' => 'string|max:20|nullable|exists:t_account,f_id',
            'f_cred_account17' => 'string|max:20|nullable|exists:t_account,f_id',
            'f_cred_account18' => 'string|max:20|nullable|exists:t_account,f_id',
            'f_cred_account19' => 'string|max:20|nullable|exists:t_account,f_id',
            'f_description20' => 'string|max:100|nullable',
            'f_cred_account20' => 'string|max:20|nullable|exists:t_account,f_id',
            'f_deb_account20' => 'string|max:20|nullable|exists:t_account,f_id',
            'f_description21' => 'string|max:100|nullable',
            'f_cred_account21' => 'string|max:20|nullable|exists:t_account,f_id',
            'f_deb_account21' => 'string|max:20|nullable|exists:t_account,f_id',
            'f_description22' => 'string|max:100|nullable',
            'f_cred_account22' => 'string|max:20|nullable|exists:t_account,f_id',
            'f_deb_account22' => 'string|max:20|nullable|exists:t_account,f_id',
            'f_consignment' => 'boolean',
            'f_primary_document' => 'boolean',
            'f_invoice_register',
            'f_description23' => 'string|max:100|nullable',
            'f_cred_account23' => 'string|max:20|nullable|exists:t_account,f_id',
            'f_deb_account23' => 'string|max:20|nullable|exists:t_account,f_id',
            'f_groupid' => 'string|max:20',
        ];
    }
}
