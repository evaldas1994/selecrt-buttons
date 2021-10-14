@extends('layouts.app')

@section('content')
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto">
            <h1>@lang('modules/bankAccountSystem.h1')</h1>
        </div>

        <div class="col-auto ms-auto text-end mt-n1">
            <a href="#" class="btn btn-primary"
               onclick="event.preventDefault();document.getElementById('bank-account-system-form').submit();">@lang('global.btn_save')</a>
            <a href="{{ route('bank-account-systems.index') }}" class="btn btn-dark">@lang('global.btn_close')</a>
        </div>
    </div>
    <div class="row">
        <div class="card">
            <div class="col-12 col-xl-4">
                <div class="card-body">
                    <form id="bank-account-system-form" action="{{ route('bank-account-systems.update', $bankAccountSystem) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/bankAccountSystem.f_id')</label>
                            <input type="text"
                                   class="not-empty form-control form-control-sm @error('f_id') is-invalid @enderror"
                                   name="f_id"
                                   id-pattern
                                   placeholder="@lang('modules/bankAccountSystem.f_id')"
                                   required
                                   maxlength="20"
                                   value="{{ old('f_id', $bankAccountSystem->f_id) }}">
                            @error('f_id') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/bankAccountSystem.f_bankid')</label>
                            <select class="not-empty form-control form-control-sm @error('f_bankid') is-invalid @enderror" name="f_bankid" value="{{ old('f_bankid') }}">
                                <option value>---</option>
                                @foreach($banks as $bank)
                                    <option value="{{ $bank->f_id }}" {{ selected('f_bankid', $bank->f_id, $bankAccountSystem->f_bankid) }}>{{ $bank->f_name }}</option>
                                @endforeach
                            </select>
                            @error('f_bankid') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/bankAccountSystem.f_name')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_name') is-invalid @enderror"
                                   name="f_name"
                                   placeholder="@lang('modules/bankAccountSystem.f_name')"
                                   maxlength="10"
                                   value="{{ old('f_name', $bankAccountSystem->f_name) }}">
                            @error('f_name') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-check m-0">
                                <span class="form-check-label">@lang('modules/bankAccountSystem.f_default')</span>
                                <input type="hidden" name="f_default" value="0">
                                <input type="checkbox" name="f_default" class="form-check-input @error('f_default') is-invalid @enderror" value="{{ old('f_default',1) }}" {{ $bankAccountSystem->f_default == '1' ? 'checked' : '' }}>
                            </label>
                            @error('f_default') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2" hidden>
                            <label class="form-label">@lang('modules/bankAccountSystem.f_system1')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_system1') is-invalid @enderror"
                                   name="f_system1"
                                   placeholder="@lang('modules/bankAccountSystem.f_system1')"
                                   maxlength="100"
                                   value="{{ old('f_system1') }}">
                            @error('f_system1') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2" hidden>
                            <label class="form-label">@lang('modules/bankAccountSystem.f_system2')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_system2') is-invalid @enderror"
                                   name="f_system2"
                                   placeholder="@lang('modules/bankAccountSystem.f_system2')"
                                   maxlength="100"
                                   value="{{ old('f_system2') }}">
                            @error('f_system2') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2" hidden>
                            <label class="form-label">@lang('modules/bankAccountSystem.f_system3')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_system3') is-invalid @enderror"
                                   name="f_system3"
                                   placeholder="@lang('modules/bankAccountSystem.f_system3')"
                                   maxlength="100"
                                   value="{{ old('f_system3') }}">
                            @error('f_system3') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
