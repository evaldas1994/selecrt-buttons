@extends('layouts.app')

@section('content')
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto">
            <h1>@lang('modules/employee.h1')</h1>
        </div>

        <div class="col-auto ms-auto text-end mt-n1">
            <a href="#" class="btn btn-primary"
               onclick="event.preventDefault();document.getElementById('employee-form').submit();">@lang('global.btn_save')</a>
            <a href="{{ route('employees.index') }}" class="btn btn-dark">@lang('global.btn_close')</a>
        </div>
    </div>
    <div class="row">
        <div class="card">
            <div class="col-12 col-xl-4">
                <div class="card-body">
                    <form id="employee-form" action="{{ route('employees.update', $employee) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/employee.f_id')</label>
                            <input type="text"
                                   class="not-empty form-control form-control-sm @error('f_id') is-invalid @enderror"
                                   name="f_id"
                                   id-pattern
                                   placeholder="@lang('modules/employee.f_id')"
                                   required
                                   maxlength="20"
                                   value="{{ old('f_id', $employee->f_id)}}">
                            @error('f_id') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/employee.f_name')</label>
                            <input type="text"
                                   class="not-empty form-control form-control-sm @error('f_name') is-invalid @enderror"
                                   name="f_name"
                                   placeholder="@lang('modules/employee.f_name')"
                                   maxlength="100"
                                   value="{{ old('f_name', $employee->f_name)}}">
                            @error('f_name') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/employee.f_personal_code')</label>
                            <input type="text"
                                   class="not-empty form-control form-control-sm @error('f_personal_code') is-invalid @enderror"
                                   name="f_personal_code"
                                   placeholder="@lang('modules/employee.f_personal_code')"
                                   maxlength="100"
                                   value="{{ old('f_personal_code', $employee->f_personal_code)}}">
                            @error('f_personal_code') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/employee.f_adress')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_adress') is-invalid @enderror"
                                   name="f_adress"
                                   placeholder="@lang('modules/employee.f_adress')"
                                   maxlength="200"
                                   value="{{ old('f_adress', $employee->f_adress)}}">
                            @error('f_adress') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/employee.f_subdivision')</label>
                            <select class="form-control form-control-sm @error('f_subdivision') is-invalid @enderror" name="f_subdivision">
                                <option value selected>---</option>
                                @foreach($departments as $department)
                                    <option value="{{ $department->f_id }}" {{ selected('f_subdivision', $department->f_id, $employee->f_subdivision) }}>{{ $department->f_name }}</option>
                                @endforeach
                            </select>
                            @error('f_subdivision') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/employee.f_married')</label>
                            <select class="form-control form-control-sm @error('f_married') is-invalid @enderror" name="f_married">
                                @foreach($maritalStatuses as $status)
                                    <option value="{{ $status }}" {{ selected('f_married', $status, $employee->f_married) }}>@lang('modules/employee.maritalStatusType' . $status)</option>
                                @endforeach
                            </select>
                            @error('f_married') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/employee.f_userid')</label>
                            <select class="form-control form-control-sm @error('f_userid') is-invalid @enderror" name="f_userid">
                                <option value selected>---</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->f_id }}" {{ selected('f_userid', $user->f_id, $employee->f_userid) }}>{{ $user->f_name }}</option>
                                @endforeach
                            </select>
                            @error('f_userid') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/employee.f_uses_pi')</label>
                            <select class="form-control form-control-sm @error('f_uses_pi') is-invalid @enderror" name="f_uses_pi">
                                @foreach($pensionInsurances as $insurance)
                                    <option value="{{ $insurance }}" {{ selected('f_uses_pi', $insurance, $employee->f_uses_pi) }}>@lang('modules/employee.pensionInsuranceType' . $insurance)</option>
                                @endforeach
                            </select>
                            @error('f_uses_pi') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/employee.f_last_name')</label>
                            <input type="text"
                                   class="not-empty form-control form-control-sm @error('f_last_name') is-invalid @enderror"
                                   name="f_last_name"
                                   placeholder="@lang('modules/employee.f_last_name')"
                                   maxlength="100"
                                   value="{{ old('f_last_name', $employee->f_last_name)}}">
                            @error('f_last_name') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/employee.f_social_insurance_id')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_social_insurance_id') is-invalid @enderror"
                                   name="f_social_insurance_id"
                                   placeholder="@lang('modules/employee.f_social_insurance_id')"
                                   maxlength="50"
                                   value="{{ old('f_social_insurance_id', $employee->f_social_insurance_id)}}">
                            @error('f_social_insurance_id') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/employee.f_cell_phone_no')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_cell_phone_no') is-invalid @enderror"
                                   name="f_cell_phone_no"
                                   placeholder="@lang('modules/employee.f_cell_phone_no')"
                                   maxlength="50"
                                   value="{{ old('f_cell_phone_no', $employee->f_cell_phone_no)}}">
                            @error('f_cell_phone_no') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/employee.f_email')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_email') is-invalid @enderror"
                                   name="f_email"
                                   placeholder="@lang('modules/employee.f_email')"
                                   maxlength="100"
                                   value="{{ old('f_email', $employee->f_email)}}">
                            @error('f_email') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/employee.f_direct_debit_bank')</label>
                            <select class="form-control form-control-sm @error('f_direct_debit_bank') is-invalid @enderror" name="f_direct_debit_bank">
                                <option value selected>---</option>
                                @foreach($banks as $bank)
                                    <option value="{{ $bank->f_id }}" {{ selected('f_direct_debit_bank', $bank->f_id, $employee->f_direct_debit_bank) }}>{{ $bank->f_name }}</option>
                                @endforeach
                            </select>
                            @error('f_direct_debit_bank') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/employee.f_bank_account')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_bank_account') is-invalid @enderror"
                                   name="f_bank_account"
                                   placeholder="@lang('modules/employee.f_bank_account')"
                                   maxlength="100"
                                   value="{{ old('f_bank_account', $employee->f_bank_account)}}">
                            @error('f_bank_account') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-check m-0">
                                <span class="form-check-label">@lang('modules/employee.f_fired')</span>
                                <input type="hidden" name="f_fired" value="0">
                                <input type="checkbox" name="f_fired" class="form-check-input @error('f_fired') is-invalid @enderror" value="{{ old('f_fired', 1) }}"  {{ old('f_fired', $employee->f_fired) == 1 ? 'checked' : '' }}>
                            </label>
                            @error('f_fired') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/employee.f_sex')</label>
                            <select class="form-control form-control-sm @error('f_sex') is-invalid @enderror" name="f_sex">
                                @foreach($sexTypes as $type)
                                    <option value="{{ $type }}" {{ selected('f_sex', $type, $employee->f_sex) }}>@lang('modules/employee.sexType' . $type)</option>
                                @endforeach
                            </select>
                            @error('f_sex') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/employee.f_disablement')</label>
                            <select class="form-control form-control-sm @error('f_disablement') is-invalid @enderror" name="f_disablement">
                                @foreach($disablementTypes as $type)
                                    <option value="{{ $type }}" {{ selected('f_disablement', $type, $employee->f_disablement) }}>@lang('modules/employee.disablementType' . $type)</option>
                                @endforeach
                            </select>
                            @error('f_disablement') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/employee.f_home_phone')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_home_phone') is-invalid @enderror"
                                   name="f_home_phone"
                                   placeholder="@lang('modules/employee.f_home_phone')"
                                   maxlength="50"
                                   value="{{ old('f_home_phone', $employee->f_home_phone)}}">
                            @error('f_home_phone') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-check m-0">
                                <span class="form-check-label">@lang('modules/employee.f_uses_nti')</span>
                                <input type="hidden" name="f_uses_nti" value="0">
                                <input type="checkbox" name="f_uses_nti" class="form-check-input @error('f_uses_nti') is-invalid @enderror" value="{{ old('f_uses_nti', 1) }}"  {{ old('f_uses_nti', $employee->f_uses_nti) == 1 ? 'checked' : '' }}>
                            </label>
                            @error('f_uses_nti') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-check m-0">
                                <span class="form-check-label">@lang('modules/employee.f_cash')</span>
                                <input type="hidden" name="f_cash" value="0">
                                <input type="checkbox" name="f_cash" class="form-check-input @error('f_cash') is-invalid @enderror" value="{{ old('f_cash', 1) }}"  {{ old('f_cash', $employee->f_cash) == 1 ? 'checked' : '' }}>
                            </label>
                            @error('f_cash') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/employee.f_holiday_balance')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_holiday_balance') is-invalid @enderror"
                                   name="f_holiday_balance"
                                   placeholder="@lang('modules/employee.f_holiday_balance')"
                                   maxlength="15"
                                   value="{{ old('f_holiday_balance', $employee->f_holiday_balance)}}">
                            @error('f_holiday_balance') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-check m-0">
                                <span class="form-check-label">@lang('modules/employee.f_uses_vsd')</span>
                                <input type="hidden" name="f_uses_vsd" value="0">
                                <input type="checkbox" name="f_uses_vsd" class="form-check-input @error('f_uses_vsd') is-invalid @enderror" value="{{ old('f_uses_vsd', 1) }}"  {{ old('f_uses_vsd', $employee->f_uses_vsd) == 1 ? 'checked' : '' }}>
                            </label>
                            @error('f_uses_vsd') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/employee.f_work_shedule_template')</label>
                            <select class="form-control form-control-sm @error('f_work_shedule_template') is-invalid @enderror" name="f_work_shedule_template">
                                <option value selected>---</option>
                                @foreach($workSheduleTemplates as $template)
                                    <option value="{{ $template->f_id }}" {{ selected('f_work_shedule_template', $template->f_id, $employee->f_work_shedule_template) }}>{{ $template->f_title }}</option>
                                @endforeach
                            </select>
                            @error('work_shedule_template') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/employee.f_disability_perc')</label>
                            <select class="form-control form-control-sm @error('f_disability_perc') is-invalid @enderror" name="f_disability_perc">
                                @foreach($disablementPercentTypes as $type)
                                    <option value="{{ $type }}" {{ selected('f_disability_perc', $type, $employee->f_disability_perc) }}>@lang('modules/employee.disablementPercentType' . $type)</option>
                                @endforeach
                            </select>
                            @error('f_disability_perc') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
