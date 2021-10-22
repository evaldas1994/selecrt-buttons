<?php

namespace App\Http\Requests;

use Illuminate\Support\Arr;
use App\Models\BlankNumber;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class BlankNumberStoreUpdateRequest extends FormRequest
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
            'f_counterid' => 'string|max:20|exists:t_counter,f_id',
            'f_op' => ['required', Rule::in(Arr::pluck(BlankNumber::$opTypes, 'value'))],
            'f_storeid' => 'string|max:20|nullable|exists:t_store,f_id',
            'f_groupid' => 'string|max:20|nullable|exists:t_stockopgroup,f_id',
            'f_system1' => 'string|max:100|nullable',
            'f_system2' => 'string|max:100|nullable',
            'f_system3' => 'string|max:100|nullable',
            'f_invoice_register' => ['required', Rule::in(Arr::pluck(BlankNumber::$invoiceRegisterTypes, 'value'))],
        ];
    }
}
