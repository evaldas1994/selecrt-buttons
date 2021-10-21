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
        <div class="card">
            <div class="col-12 col-xl-4">
                <div class="card-body">
                    <form id="barcode-form" action="{{ route('barcodes.update', $barcode) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/barcode.f_stockid')</label>
                            <select class="not-empty form-control form-control-sm @error('f_stockid') is-invalid @enderror" name="f_stockid">
                                @foreach($stocks as $stock)
                                    <option value="{{ $stock->f_id }}" {{ selected('f_stockid', $stock->f_id, $barcode->f_stockid) }}>{{ $stock->f_id }}</option>
                                @endforeach
                            </select>
                            @error('f_stockid') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/barcode.f_id')</label>
                            <input type="text"
                                   class="not-empty form-control form-control-sm @error('f_id') is-invalid @enderror"
                                   name="f_id"
                                   id-pattern
                                   placeholder="@lang('modules/barcode.f_id')"
                                   required
                                   maxlength="40"
                                   value="{{ old('f_id', $barcode->f_id)}}">
                            @error('f_id') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/barcode.f_ratio')</label>
                            <input type="text"
                                   class="not-empty form-control form-control-sm @error('f_ratio') is-invalid @enderror"
                                   name="f_ratio"
                                   placeholder="@lang('modules/barcode.f_ratio')"
                                   maxlength="100"
                                   value="{{ old('f_ratio', $barcode->f_ratio)}}">
                            @error('f_ratio') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-check m-0">
                                <span class="form-check-label">@lang('modules/bankAccountSystem.f_default')</span>
                                <input type="hidden" name="f_default" value="0">
                                <input type="checkbox" name="f_default" class="form-check-input @error('f_default') is-invalid @enderror" value="{{ old('f_default', 1) }}"  {{ old('f_default', $barcode->f_default) == 1 ? 'checked' : '' }}>
                            </label>
                            @error('f_default') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/barcode.f_neto')</label>
                            <input type="text"
                                   class="not-empty form-control form-control-sm @error('f_neto') is-invalid @enderror"
                                   name="f_neto"
                                   placeholder="@lang('modules/barcode.f_neto')"
                                   maxlength="15"
                                   value="{{ old('f_neto', $barcode->f_neto)}}">
                            @error('f_neto') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/barcode.f_plastic')</label>
                            <input type="text"
                                   class="not-empty form-control form-control-sm @error('f_plastic') is-invalid @enderror"
                                   name="f_plastic"
                                   placeholder="@lang('modules/barcode.f_plastic')"
                                   maxlength="15"
                                   value="{{ old('f_plastic', $barcode->f_plastic)}}">
                            @error('f_plastic') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/barcode.f_paper')</label>
                            <input type="text"
                                   class="not-empty form-control form-control-sm @error('f_paper') is-invalid @enderror"
                                   name="f_paper"
                                   placeholder="@lang('modules/barcode.f_paper')"
                                   maxlength="15"
                                   value="{{ old('f_paper', $barcode->f_paper)}}">
                            @error('f_paper') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/barcode.f_glass')</label>
                            <input type="text"
                                   class="not-empty form-control form-control-sm @error('f_glass') is-invalid @enderror"
                                   name="f_glass"
                                   placeholder="@lang('modules/barcode.f_glass')"
                                   maxlength="15"
                                   value="{{ old('f_glass', $barcode->f_glass)}}">
                            @error('f_glass') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/barcode.f_wood')</label>
                            <input type="text"
                                   class="not-empty form-control form-control-sm @error('f_wood') is-invalid @enderror"
                                   name="f_wood"
                                   placeholder="@lang('modules/barcode.f_wood')"
                                   maxlength="15"
                                   value="{{ old('f_wood', $barcode->f_wood)}}">
                            @error('f_wood') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/barcode.f_pap1')</label>
                            <input type="text"
                                   class="not-empty form-control form-control-sm @error('f_pap1') is-invalid @enderror"
                                   name="f_pap1"
                                   placeholder="@lang('modules/barcode.f_pap1')"
                                   maxlength="15"
                                   value="{{ old('f_pap1', $barcode->f_pap1)}}">
                            @error('f_pap1') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/barcode.f_pap2')</label>
                            <input type="text"
                                   class="not-empty form-control form-control-sm @error('f_pap2') is-invalid @enderror"
                                   name="f_pap2"
                                   placeholder="@lang('modules/barcode.f_pap2')"
                                   maxlength="15"
                                   value="{{ old('f_pap2', $barcode->f_pap2)}}">
                            @error('f_pap2') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/barcode.f_usadid')</label>
                            <select class="form-control form-control-sm @error('f_usadid') is-invalid @enderror" name="f_usadid" value="{{ old('f_usadid') }}">
                                @foreach($stocks as $stock)
                                    <option value="{{ $stock->f_id }}" {{ selected('f_usadid', $stock->f_id, $barcode->f_usadid) }}>{{ $stock->f_id }}</option>
                                @endforeach
                            </select>
                            @error('f_usadid') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2" hidden>
                            <label class="form-label">@lang('modules/barcode.f_system1')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_system1') is-invalid @enderror"
                                   name="f_system1"
                                   placeholder="@lang('modules/barcode.f_system1')"
                                   maxlength="100"
                                   value="{{ old('f_system1', $barcode->f_system1) }}">
                            @error('f_system1') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2" hidden>
                            <label class="form-label">@lang('modules/barcode.f_system2')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_system2') is-invalid @enderror"
                                   name="f_system2"
                                   placeholder="@lang('modules/barcode.f_system2')"
                                   maxlength="100"
                                   value="{{ old('f_system2', $barcode->f_system2) }}">
                            @error('f_system2') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2" hidden>
                            <label class="form-label">@lang('modules/barcode.f_system3')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_system3') is-invalid @enderror"
                                   name="f_system3"
                                   placeholder="@lang('modules/barcode.f_system3')"
                                   maxlength="100"
                                   value="{{ old('f_system3', $barcode->f_system3) }}">
                            @error('f_system3') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
