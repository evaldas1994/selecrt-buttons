@extends('layouts.app')

@section('content')
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto">
            <h1>@lang('modules/barcode.h1')</h1>
        </div>

        <div class="col-auto ms-auto text-end mt-n1">
            <a href="#" class="btn btn-primary"
               onclick="event.preventDefault();document.getElementById('barcode-form').submit();">@lang('global.btn_save')</a>
            <a href="{{ route('barcodes.index') }}" class="btn btn-dark">@lang('global.btn_close')</a>
        </div>
    </div>
    <div class="row">
        <form id="barcode-form" action="{{ route('barcodes.store') }}" method="POST">
            @csrf
            <div class="card">
                <div class="col-12">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-xl-3">
                                <div class="mb-2">
                                    <label class="form-label">@lang('modules/barcode.f_id')</label>{{old('f_id')}}
                                    <input type="text"
                                           class="not-empty form-control form-control-sm @error('f_id') is-invalid @enderror"
                                           name="f_id"
                                           id-pattern
                                           placeholder="@lang('modules/barcode.f_id')"
                                           required
                                           maxlength="40"
                                           value="{{ old('f_id', 0)}}">
                                    @error('f_id') <span class="invalid-feedback"
                                                         role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                </div>
                                <div class="mb-2">
                                    <label
                                        class="form-label">@lang('modules/barcode.f_stockid')</label> {{old('f_stockid')}}
                                    <div class="input-group">
                                        <select
                                            class="not-empty form-select-sm form-control form-control-sm @error('f_stockid') is-invalid @enderror"
                                            name="f_stockid">
                                            <option value selected>---</option>
                                            @foreach($stocks as $stock)
                                                <option
                                                    value="{{ $stock->f_id }}" {{ selected('f_stockid', $stock->f_id) }}>{{ $stock->f_id }}</option>
                                            @endforeach
                                        </select>
                                        <button
                                            name="button-action"
                                            value="select-stock"
                                            type="submit"
                                            class="input-group-text">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                    </div>
                                    @error('f_stockid') <span class="invalid-feedback"
                                                              role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                </div>
                                <div class="mb-2">
                                    <label class="form-check m-0">
                                        <span
                                            class="form-check-label">@lang('modules/bankAccountSystem.f_default')</span>
                                        <input type="hidden" name="f_default" value="0">
                                        <input type="checkbox" name="f_default"
                                               class="form-check-input @error('f_default') is-invalid @enderror"
                                               value="{{ old('f_default', 1) }}" {{ old('f_default') == 1 ? 'checked' : '' }}>
                                    </label>
                                    @error('f_default') <span class="invalid-feedback"
                                                              role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                </div>
                            </div>
                            <div class="col-12 col-xl-3">
                                <div class="mb-2">
                                    <label class="form-label">@lang('modules/barcode.f_ratio')</label>
                                    <input type="text"
                                           class="not-empty form-control form-control-sm @error('f_ratio') is-invalid @enderror"
                                           name="f_ratio"
                                           placeholder="@lang('modules/barcode.f_ratio')"
                                           maxlength="100"
                                           value="{{ old('f_ratio', '1.0000')}}">
                                    @error('f_ratio') <span class="invalid-feedback"
                                                            role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                </div>
                                <div class="mb-2">
                                    <label class="form-label">@lang('modules/barcode.f_usadid')</label>
                                    <div class="input-group">
                                        <select
                                            class="not-empty form-select-sm  form-control form-control-sm @error('f_usadid') is-invalid @enderror"
                                            name="f_usadid" value="{{ old('f_usadid') }}">
                                            <option value selected>---</option>
                                            @foreach($stocks as $stock)
                                                <option
                                                    value="{{ $stock->f_id }}" {{ selected('f_usadid',$stock->f_id) }}>{{ $stock->f_id }}</option>
                                            @endforeach
                                        </select>
                                        <button
                                            name="button-action"
                                            value="select-usad"
                                            type="submit"
                                            class="input-group-text">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                    </div>
                                    @error('f_usadid') <span class="invalid-feedback"
                                                             role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                </div>
                            </div>
                            <div class="col-12 col-xl-3">
                                <div class="mb-2">
                                    <label class="form-label">@lang('modules/barcode.f_neto')</label>
                                    <input type="text"
                                           class="form-control form-control-sm @error('f_neto') is-invalid @enderror"
                                           name="f_neto"
                                           placeholder="@lang('modules/barcode.f_neto')"
                                           maxlength="15"
                                           value="{{ old('f_neto', '0.0000')}}">
                                    @error('f_neto') <span class="invalid-feedback"
                                                           role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                </div>
                                <div class="mb-2">
                                    <label class="form-label">@lang('modules/barcode.f_plastic')</label>
                                    <input type="text"
                                           class="form-control form-control-sm @error('f_plastic') is-invalid @enderror"
                                           name="f_plastic"
                                           placeholder="@lang('modules/barcode.f_plastic')"
                                           maxlength="15"
                                           value="{{ old('f_plastic', '0.0000')}}">
                                    @error('f_plastic') <span class="invalid-feedback"
                                                              role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                </div>
                                <div class="mb-2">
                                    <label class="form-label">@lang('modules/barcode.f_paper')</label>
                                    <input type="text"
                                           class="form-control form-control-sm @error('f_paper') is-invalid @enderror"
                                           name="f_paper"
                                           placeholder="@lang('modules/barcode.f_paper')"
                                           maxlength="15"
                                           value="{{ old('f_paper', '0.0000')}}">
                                    @error('f_paper') <span class="invalid-feedback"
                                                            role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                </div>
                            </div>
                            <div class="col-12 col-xl-3">
                                <div class="mb-2">
                                    <label class="form-label">@lang('modules/barcode.f_glass')</label>
                                    <input type="text"
                                           class="form-control form-control-sm @error('f_glass') is-invalid @enderror"
                                           name="f_glass"
                                           placeholder="@lang('modules/barcode.f_glass')"
                                           maxlength="15"
                                           value="{{ old('f_glass', '0.0000')}}">
                                    @error('f_glass') <span class="invalid-feedback"
                                                            role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                </div>
                                <div class="mb-2">
                                    <label class="form-label">@lang('modules/barcode.f_wood')</label>
                                    <input type="text"
                                           class="form-control form-control-sm @error('f_wood') is-invalid @enderror"
                                           name="f_wood"
                                           placeholder="@lang('modules/barcode.f_wood')"
                                           maxlength="15"
                                           value="{{ old('f_wood', '0.0000')}}">
                                    @error('f_wood') <span class="invalid-feedback"
                                                           role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                </div>
                                <div class="mb-2">
                                    <label class="form-label">@lang('modules/barcode.f_pap1')</label>
                                    <input type="text"
                                           class="form-control form-control-sm @error('f_pap1') is-invalid @enderror"
                                           name="f_pap1"
                                           placeholder="@lang('modules/barcode.f_pap1')"
                                           maxlength="15"
                                           value="{{ old('f_pap1', '0.0000')}}">
                                    @error('f_pap1') <span class="invalid-feedback"
                                                           role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                </div>
                                <div class="mb-2">
                                    <label class="form-label">@lang('modules/barcode.f_pap2')</label>
                                    <input type="text"
                                           class="form-control form-control-sm @error('f_pap2') is-invalid @enderror"
                                           name="f_pap2"
                                           placeholder="@lang('modules/barcode.f_pap2')"
                                           maxlength="15"
                                           value="{{ old('f_pap2', '0.0000')}}">
                                    @error('f_pap2') <span class="invalid-feedback"
                                                           role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                </div>
                            </div>
                            <div class="col-12 col-xl-3">
                                <div class="mb-2" hidden>
                                    <label class="form-label">@lang('modules/barcode.f_system1')</label>
                                    <input type="text"
                                           class="form-control form-control-sm @error('f_system1') is-invalid @enderror"
                                           name="f_system1"
                                           placeholder="@lang('modules/barcode.f_system1')"
                                           maxlength="100"
                                           value="{{ old('f_system1') }}">
                                    @error('f_system1') <span class="invalid-feedback"
                                                              role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                </div>

                                <div class="mb-2" hidden>
                                    <label class="form-label">@lang('modules/barcode.f_system2')</label>
                                    <input type="text"
                                           class="form-control form-control-sm @error('f_system2') is-invalid @enderror"
                                           name="f_system2"
                                           placeholder="@lang('modules/barcode.f_system2')"
                                           maxlength="100"
                                           value="{{ old('f_system2') }}">
                                    @error('f_system2') <span class="invalid-feedback"
                                                              role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                </div>

                                <div class="mb-2" hidden>
                                    <label class="form-label">@lang('modules/barcode.f_system3')</label>
                                    <input type="text"
                                           class="form-control form-control-sm @error('f_system3') is-invalid @enderror"
                                           name="f_system3"
                                           placeholder="@lang('modules/barcode.f_system3')"
                                           maxlength="100"
                                           value="{{ old('f_system3') }}">
                                    @error('f_system3') <span class="invalid-feedback"
                                                              role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
