@extends('layouts.app')

@section('content')
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto">
            <h1>@lang('modules/register2.h1')</h1>
        </div>

        <div class="col-auto ms-auto text-end mt-n1">
            <a href="#" class="btn btn-primary"
               onclick="event.preventDefault();document.getElementById('register2-form').submit();">@lang('global.btn_save')</a>
            <a href="{{ route('registers2.index') }}" class="btn btn-dark">@lang('global.btn_close')</a>
        </div>
    </div>
    <div class="row">
        <div class="card">
            <div class="col-12 col-xl-4">
                <div class="card-body">
                    <form id="register2-form" action="{{ route('registers2.update', $registers2) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/register2.f_id')</label>
                            <input type="text"
                                   class="not-empty form-control form-control-sm @error('f_id') is-invalid @enderror"
                                   name="f_id"
                                   id-pattern
                                   placeholder="@lang('modules/register2.f_id')"
                                   required
                                   maxlength="20"
                                   value="{{ old('f_id', $registers2->f_id) }}">
                            @error('f_id') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/register2.f_name')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_name') is-invalid @enderror"
                                   name="f_name"
                                   placeholder="@lang('modules/register2.f_name')"
                                   maxlength="100"
                                   value="{{ old('f_name', $registers2->f_name) }}">
                            @error('f_name') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/register2.f_name2')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_name2') is-invalid @enderror"
                                   name="f_name2"
                                   placeholder="@lang('modules/register2.f_name2')"
                                   maxlength="100"
                                   value="{{ old('f_name2', $registers2->f_name2) }}">
                            @error('f_name2') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/register2.f_name3')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_name3') is-invalid @enderror"
                                   name="f_name3"
                                   placeholder="@lang('modules/register2.f_name3')"
                                   maxlength="100"
                                   value="{{ old('f_name3', $registers2->f_name3) }}">
                            @error('f_name3') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/register2.f_coefficient')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_coefficient') is-invalid @enderror"
                                   name="f_coefficient"
                                   placeholder="@lang('modules/register2.f_coefficient')"
                                   maxlength="100"
                                   value="{{ old('f_coefficient', $registers2->f_coefficient) }}">
                            @error('f_coefficient') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2" hidden>
                            <label class="form-label">@lang('modules/register2.f_system1')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_system1') is-invalid @enderror"
                                   name="f_system1"
                                   placeholder="@lang('modules/register2.f_system1')"
                                   maxlength="100"
                                   value="{{ old('f_system1', $registers2->f_system1) }}">
                            @error('f_system1') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2" hidden>
                            <label class="form-label">@lang('modules/register2.f_system2')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_system2') is-invalid @enderror"
                                   name="f_system2"
                                   placeholder="@lang('modules/register2.f_system2')"
                                   maxlength="100"
                                   value="{{ old('f_system2', $registers2->f_system2) }}">
                            @error('f_system2') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2" hidden>
                            <label class="form-label">@lang('modules/register2.f_system3')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_system3') is-invalid @enderror"
                                   name="f_system3"
                                   placeholder="@lang('modules/register2.f_system3')"
                                   maxlength="20"
                                   value="{{ old('f_system3', $registers2->f_system3) }}">
                            @error('f_system3') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
