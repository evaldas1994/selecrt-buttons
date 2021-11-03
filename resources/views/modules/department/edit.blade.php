@extends('layouts.app')

@section('content')
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto">
            <h1>@lang('modules/department.h1')</h1>
        </div>

        <div class="col-auto ms-auto text-end mt-n1">
            <a href="#" class="btn btn-primary"
               onclick="event.preventDefault();document.getElementById('department-form').submit();">@lang('global.btn_save')</a>
            <a href="{{ route('departments.index') }}" class="btn btn-dark">@lang('global.btn_close')</a>
        </div>
    </div>
    <div class="row">
        <div class="card">
            <div class="col-12 col-xl-4">
                <div class="card-body">
                    <form id="department-form" action="{{ route('departments.update', $department) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/department.f_id')</label>
                            <input type="text"
                                   class="not-empty form-control form-control-sm @error('f_id') is-invalid @enderror"
                                   name="f_id"
                                   id-pattern
                                   placeholder="@lang('modules/department.f_id')"
                                   required
                                   maxlength="20"
                                   value="{{ old('f_id', $department->f_id)}}">
                            @error('f_id') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/department.f_name')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_name') is-invalid @enderror"
                                   name="f_name"
                                   placeholder="@lang('modules/department.f_name')"
                                   maxlength="100"
                                   value="{{ old('f_name', $department->f_name)}}">
                            @error('f_name') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/department.f_name2')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_name2') is-invalid @enderror"
                                   name="f_name2"
                                   placeholder="@lang('modules/department.f_name2')"
                                   maxlength="100"
                                   value="{{ old('f_name2', $department->f_name2)}}">
                            @error('f_name2') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>


                        <div class="mb-2">
                            <label class="form-label">@lang('modules/department.f_accountid1')</label>
                            <select class="form-control form-control-sm @error('f_accountid1') is-invalid @enderror" name="f_accountid1">
                                <option value selected>---</option>
                                @foreach($accounts as $account)
                                    <option value="{{ $account->f_id }}" {{ selected('f_accountid1', $account->f_id, $department->f_accountid1) }}>{{ $account->f_name }}</option>
                                @endforeach
                            </select>
                            @error('f_accountid1') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/department.f_accountid2')</label>
                            <select class="form-control form-control-sm @error('f_accountid2') is-invalid @enderror" name="f_accountid2">
                                <option value selected>---</option>
                                @foreach($accounts as $account)
                                    <option value="{{ $account->f_id }}" {{ selected('f_accountid2', $account->f_id, $department->f_accountid2) }}>{{ $account->f_name }}</option>
                                @endforeach
                            </select>
                            @error('f_accountid2') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/department.f_manager_id')</label>
                            <select class="form-control form-control-sm @error('f_manager_id') is-invalid @enderror" name="f_manager_id">
                                <option value selected>---</option>
                                @foreach($employees as $employee)
                                    <option value="{{ $employee->f_id }}" {{ selected('f_manager_id', $employee->f_id, $department->f_manager_id) }}>{{ $employee->f_name }}</option>
                                @endforeach
                            </select>
                            @error('f_manager_id') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/department.f_parent_id')</label>
                            <select class="form-control form-control-sm @error('f_parent_id') is-invalid @enderror" name="f_parent_id">
                                <option value selected>---</option>
                                @foreach($departments as $singleDepartment)
                                    <option value="{{ $singleDepartment->f_id }}" {{ selected('f_parent_id', $singleDepartment->f_id, $department->f_parent_id) }}>{{ $singleDepartment->f_name }}</option>
                                @endforeach
                            </select>
                            @error('f_parent_id') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2" hidden>
                            <label class="form-label">@lang('modules/department.f_system1')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_system1') is-invalid @enderror"
                                   name="f_system1"
                                   placeholder="@lang('modules/department.f_system1')"
                                   maxlength="100"
                                   value="{{ old('f_system1', $department->f_system1) }}">
                            @error('f_system1') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2" hidden>
                            <label class="form-label">@lang('modules/department.f_system2')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_system2') is-invalid @enderror"
                                   name="f_system2"
                                   placeholder="@lang('modules/department.f_system2')"
                                   maxlength="100"
                                   value="{{ old('f_system2', $department->f_system2) }}">
                            @error('f_system2') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2" hidden>
                            <label class="form-label">@lang('modules/department.f_system3')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_system3') is-invalid @enderror"
                                   name="f_system3"
                                   placeholder="@lang('modules/department.f_system3')"
                                   maxlength="100"
                                   value="{{ old('f_system3', $department->f_system3) }}">
                            @error('f_system3') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
