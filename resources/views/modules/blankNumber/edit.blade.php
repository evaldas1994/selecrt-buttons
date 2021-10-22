@extends('layouts.app')

@section('content')
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto">
            <h1>@lang('modules/blankNumber.h1')</h1>
        </div>

        <div class="col-auto ms-auto text-end mt-n1">
            <a href="#" class="btn btn-primary"
               onclick="event.preventDefault();document.getElementById('blank-number-form').submit();">@lang('global.btn_save')</a>
            <a href="{{ route('blank-numbers.index') }}" class="btn btn-dark">@lang('global.btn_close')</a>
        </div>
    </div>
    <div class="row">
        <div class="card">
            <div class="col-12 col-xl-4">
                <div class="card-body">
                    <form id="blank-number-form" action="{{ route('blank-numbers.update', $blankNumber) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/blankNumber.f_counterid')</label>
                            <select class="form-control form-control-sm @error('f_counterid') is-invalid @enderror" name="f_counterid" value="{{ old('f_counterid') }}">
                                <option value selected>---</option>
                                @foreach($counters as $counter)
                                    <option value="{{ $counter->f_id }}" {{ selected('f_counterid',$counter->f_id, $blankNumber->f_counterid) }}>{{ $counter->f_txt }}</option>
                                @endforeach
                            </select>
                            @error('f_counterid') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/blankNumber.f_op')</label>
                            <select class="form-control form-control-sm @error('f_op') is-invalid @enderror" name="f_op" value="{{ old('f_op') }}">
                                @foreach($operations as $operation)
                                    <option value="{{ $operation['value'] }}" {{ selected('f_op',$operation['value'], $blankNumber->f_op) }}>{{ $operation['name'] }}</option>
                                @endforeach
                            </select>
                            @error('f_op') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/blankNumber.f_storeid')</label>
                            <select class="form-control form-control-sm @error('f_storeid') is-invalid @enderror" name="f_storeid" value="{{ old('f_storeid') }}">
                                <option value selected>---</option>
                                @foreach($stores as $store)
                                    <option value="{{ $store->f_id }}" {{ selected('f_storeid', $store->f_id, $blankNumber->f_storeid) }}>{{ $store->f_name }}</option>
                                @endforeach
                            </select>
                            @error('f_storeid') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/blankNumber.f_groupid')</label>
                            <select class="form-control form-control-sm @error('f_groupid') is-invalid @enderror" name="f_groupid" value="{{ old('f_groupid') }}">
                                <option value selected>---</option>
                                @foreach($stockOperationGroups as $group)
                                    <option value="{{ $group->f_id }}" {{ selected('f_groupid', $group->f_id, $blankNumber->f_groupid) }}>{{ $group->f_name }}</option>
                                @endforeach
                            </select>
                            @error('f_groupid') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/blankNumber.f_invoice_register')</label>
                            <select class="form-control form-control-sm @error('f_invoice_register') is-invalid @enderror" name="f_invoice_register" value="{{ old('f_invoice_register') }}">
                                @foreach($invoiceRegisters as $register)
                                    <option value="{{ $register['value'] }}" {{ selected('f_invoice_register', $register['value'], $blankNumber->f_invoice_register) }}>{{ $register['name'] }}</option>
                                @endforeach
                            </select>
                            @error('f_invoice_register') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2" hidden>
                            <label class="form-label">@lang('modules/blankNumber.f_system1')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_system1') is-invalid @enderror"
                                   name="f_system1"
                                   placeholder="@lang('modules/blankNumber.f_system1')"
                                   maxlength="100"
                                   value="{{ old('f_system1', $blankNumber->f_system1) }}">
                            @error('f_system1') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2" hidden>
                            <label class="form-label">@lang('modules/blankNumber.f_system2')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_system2') is-invalid @enderror"
                                   name="f_system2"
                                   placeholder="@lang('modules/blankNumber.f_system2')"
                                   maxlength="100"
                                   value="{{ old('f_system2', $blankNumber->f_system2) }}">
                            @error('f_system2') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2" hidden>
                            <label class="form-label">@lang('modules/blankNumber.f_system3')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_system3') is-invalid @enderror"
                                   name="f_system3"
                                   placeholder="@lang('modules/blankNumber.f_system3')"
                                   maxlength="100"
                                   value="{{ old('f_system3', $blankNumber->f_system3) }}">
                            @error('f_system3') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
