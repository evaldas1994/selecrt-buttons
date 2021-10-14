@extends('layouts.app')

@section('content')
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto">
            <h1>@lang('modules/account.h1')</h1>
        </div>

        <div class="col-auto ms-auto text-end mt-n1">
            <a href="#" class="btn btn-primary"
               onclick="event.preventDefault();document.getElementById('account-form').submit();">@lang('global.btn_save')</a>
            <a href="{{ route('accounts.index') }}" class="btn btn-dark">@lang('global.btn_close')</a>
        </div>
    </div>
    <div class="row">
        <div class="card">
            <div class="col-12 col-xl-4">
                <div class="card-body">
                    <form id="account-form" action="{{ route('accounts.update', $account) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/account.f_id')</label>
                            <input type="text"
                                   class="not-empty form-control form-control-sm @error('f_id') is-invalid @enderror"
                                   name="f_id"
                                   id-pattern
                                   placeholder="@lang('modules/account.f_id')"
                                   required
                                   maxlength="20"
                                   value="{{ old('f_id', $account->f_id) }}">
                            @error('f_id') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/account.f_name')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_name') is-invalid @enderror"
                                   name="f_name"
                                   placeholder="@lang('modules/account.f_name')"
                                   maxlength="10"
                                   value="{{ old('f_name', $account->f_name) }}">
                            @error('f_name') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/account.f_groupid')</label>
                            <select class="form-control form-control-sm @error('f_groupid') is-invalid @enderror"
                                    name="f_groupid"
                                    value="{{ old('f_groupid') }}">
                                <option value>---</option>
                                @foreach($accountGroups as $group)
                                    <option value="{{ $group->f_id }}" {{ selected('f_groupid', $group->f_id, $account->f_groupid) }}>{{ $group->f_name }}</option>
                                @endforeach
                            </select>
                            @error('f_groupid') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>


                        <div class="mb-2">
                            <label class="form-label">@lang('modules/account.f_type')</label>
                            <select class="form-control form-control-sm @error('f_type') is-invalid @enderror"
                                    name="f_type"
                                    value="{{ old('f_type') }}">
                                <option value="D" {{ selected('f_type', 'D', $account->f_type) }}>D - detalinė</option>
                                <option value="S" {{ selected('f_type', 'S', $account->f_type) }}>S - suminė</option>
                            </select>
                            @error('f_type') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/account.f_purpose')</label>
                            <select class="form-control form-control-sm @error('f_purpose') is-invalid @enderror"
                                    name="f_purpose"
                                    value="{{ old('f_purpose') }}">
                                <option value="B" {{ selected('f_purpose', 'B', $account->f_purpose) }}>B - bendra</option>
                                <option value="D" {{ selected('f_purpose', 'D', $account->f_purpose) }}>D - detalizuota</option>
                                <option value="P" {{ selected('f_purpose', 'P', $account->f_purpose) }}>P - pinigai</option>
                                <option value="A" {{ selected('f_purpose', 'A', $account->f_purpose) }}>A - atsiskaitymai</option>
                                <option value="S" {{ selected('f_purpose', 'S', $account->f_purpose) }}>S - atlyginimai</option>
                            </select>
                            @error('f_purpose') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/account.f_vmi_code')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_vmi_code') is-invalid @enderror"
                                   name="f_vmi_code"
                                   placeholder="@lang('modules/account.f_vmi_code')"
                                   maxlength="10"
                                   value="{{ old('f_vmi_code', $account->f_vmi_code) }}">
                            @error('f_vmi_code') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2" hidden>
                            <label class="form-label">@lang('modules/account.f_system1')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_system1') is-invalid @enderror"
                                   name="f_system1"
                                   placeholder="@lang('modules/account.f_system1')"
                                   maxlength="10"
                                   value="{{ old('f_system1', $account->f_system1) }}">
                            @error('f_system1') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2" hidden>
                            <label class="form-label">@lang('modules/account.f_system2')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_system2') is-invalid @enderror"
                                   name="f_system2"
                                   placeholder="@lang('modules/account.f_system2')"
                                   maxlength="10"
                                   value="{{ old('f_system2', $account->f_system2) }}">
                            @error('f_system2') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2" hidden>
                            <label class="form-label">@lang('modules/account.f_system3')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_system3') is-invalid @enderror"
                                   name="f_system3"
                                   placeholder="@lang('modules/account.f_system3')"
                                   maxlength="10"
                                   value="{{ old('f_system3', $account->f_system3) }}">
                            @error('f_system3') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
