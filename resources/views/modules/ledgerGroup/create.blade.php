@extends('layouts.app')

@section('content')
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto">
            <h1>@lang('modules/ledgerGroup.h1')</h1>
        </div>

        <div class="col-auto ms-auto text-end mt-n1">
            <a href="#" class="btn btn-primary"
               onclick="event.preventDefault();document.getElementById('ledger-group-form').submit();">@lang('global.btn_save')</a>
            <a href="{{ route('ledger-groups.index') }}" class="btn btn-dark">@lang('global.btn_close')</a>
        </div>
    </div>
    <div class="row">
        <div class="card">
            <div class="col-12 col-xl-4">
                <div class="card-body">
                    <form id="ledger-group-form" action="{{ route('ledger-groups.store') }}" method="POST">
                        @csrf

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/ledgerGroup.f_id')</label>
                            <input type="text"
                                   class="not-empty form-control form-control-sm @error('f_id') is-invalid @enderror"
                                   name="f_id"
                                   id-pattern
                                   placeholder="@lang('modules/ledgerGroup.f_id')"
                                   required
                                   maxlength="40"
                                   value="{{ old('f_id')}}">
                            @error('f_id') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/ledgerGroup.f_name')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_name') is-invalid @enderror"
                                   name="f_name"
                                   placeholder="@lang('modules/ledgerGroup.f_name')"
                                   maxlength="100"
                                   value="{{ old('f_name')}}">
                            @error('f_name') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/ledgerGroup.f_accountid')</label>
                            <select class="form-control form-control-sm @error('f_accountid') is-invalid @enderror" name="f_accountid">
                                <option value selected>---</option>
                                @foreach($accounts as $account)
                                    <option value="{{ $account->f_id }}" {{ selected('f_accountid', $account->f_id) }}>{{ $account->f_name }}</option>
                                @endforeach
                            </select>
                            @error('f_accountid') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2" hidden>
                            <label class="form-label">@lang('modules/ledgerGroup.f_system1')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_system1') is-invalid @enderror"
                                   name="f_system1"
                                   placeholder="@lang('modules/ledgerGroup.f_system1')"
                                   maxlength="100"
                                   value="{{ old('f_system1') }}">
                            @error('f_system1') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2" hidden>
                            <label class="form-label">@lang('modules/ledgerGroup.f_system2')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_system2') is-invalid @enderror"
                                   name="f_system2"
                                   placeholder="@lang('modules/ledgerGroup.f_system2')"
                                   maxlength="100"
                                   value="{{ old('f_system2') }}">
                            @error('f_system2') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2" hidden>
                            <label class="form-label">@lang('modules/ledgerGroup.f_system3')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_system3') is-invalid @enderror"
                                   name="f_system3"
                                   placeholder="@lang('modules/ledgerGroup.f_system3')"
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
