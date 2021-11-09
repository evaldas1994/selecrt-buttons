@extends('layouts.app')

@section('content')
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto">
            <h1>@lang('modules/stock.h1')</h1>
        </div>

        <div class="col-auto ms-auto text-end mt-n1">
            <a href="#" class="btn btn-primary"
               onclick="event.preventDefault();document.getElementById('stock-form').submit();">@lang('global.btn_save')</a>
            <a href="{{ route('stocks.index') }}" class="btn btn-dark">@lang('global.btn_close')</a>
        </div>
    </div>

    <div class="row">
        <form id="stock-form" action="{{ route('stocks.store') }}" method="POST">
            @csrf

            <div class="card">
                <div class="col-12">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item"><a class="nav-link active" href="#tab-1" data-bs-toggle="tab"
                                                            role="tab">@lang('modules/stock.tab1')</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#tab-2" data-bs-toggle="tab"
                                                            role="tab">@lang('modules/stock.tab2')</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#tab-3" data-bs-toggle="tab"
                                                            role="tab">@lang('modules/stock.tab3')</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#tab-4" data-bs-toggle="tab"
                                                            role="tab">@lang('modules/stock.tab4')</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#tab-5" data-bs-toggle="tab"
                                                            role="tab">@lang('modules/stock.tab5')</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#tab-6" data-bs-toggle="tab"
                                                            role="tab">@lang('modules/stock.tab6')</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#tab-7" data-bs-toggle="tab"
                                                            role="tab">@lang('modules/stock.tab7')</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="tab">
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="tab-1" role="tabpanel">
                                            <div class="row">
                                                <div class="col-12 col-xl-3">
                                                    <div class="mb-2">
                                                        <label class="form-label">@lang('modules/stock.f_id')</label>
                                                        <input type="text"
                                                               class="not-empty form-control form-control-sm @error('f_id') is-invalid @enderror"
                                                               name="f_id"
                                                               id-pattern
                                                               required
                                                               maxlength="20"
                                                               value="{{ old('f_id')}}">
                                                        @error('f_id') <span class="invalid-feedback"
                                                                             role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label class="form-label">@lang('modules/stock.f_name')</label>
                                                        <input type="text"
                                                               class="form-control form-control-sm @error('f_name') is-invalid @enderror"
                                                               name="f_name"
                                                               maxlength="500"
                                                               value="{{ old('f_name')}}">
                                                        @error('f_name') <span class="invalid-feedback"
                                                                               role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label class="form-label">@lang('modules/stock.f_name2')</label>
                                                        <input type="text"
                                                               class="form-control form-control-sm @error('f_name2') is-invalid @enderror"
                                                               name="f_name2"
                                                               maxlength="100"
                                                               value="{{ old('f_name2')}}">
                                                        @error('f_name2') <span class="invalid-feedback"
                                                                                role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label
                                                            class="form-label">@lang('modules/stock.f_groupid')</label>
                                                        <select
                                                            class="form-control form-control-sm @error('f_groupid') is-invalid @enderror"
                                                            name="f_groupid">
                                                            <option value selected>---</option>
                                                            @foreach($stockGroups as $group)
                                                                <option
                                                                    value="{{ $group->f_id }}" {{ selected('f_groupid', $group->f_id) }}>{{ $group->f_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('f_groupid') <span class="invalid-feedback"
                                                                                  role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label
                                                            class="form-label">@lang('modules/stock.f_unitid')</label>
                                                        <select
                                                            class="not-empty form-control form-control-sm @error('f_unitid') is-invalid @enderror"
                                                            name="f_unitid">
                                                            @foreach($units as $unit)
                                                                <option
                                                                    value="{{ $unit->f_id }}" {{ selected('f_unitid', $unit->f_id, $defaultUnit)}}>{{ $unit->f_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('f_unitid') <span class="invalid-feedback"
                                                                                 role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label
                                                            class="form-label">@lang('modules/stock.f_pack_unitid')</label>
                                                        <select
                                                            class="form-control form-control-sm @error('f_pack_unitid') is-invalid @enderror"
                                                            name="f_pack_unitid">
                                                            <option value selected>---</option>
                                                            @foreach($units as $unit)
                                                                <option
                                                                    value="{{ $unit->f_id }}" {{ selected('f_pack_unitid', $unit->f_id) }}>{{ $unit->f_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('f_pack_unitid') <span class="invalid-feedback"
                                                                                      role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label
                                                            class="form-label">@lang('modules/stock.f_pack_quant')</label>
                                                        <input type="text"
                                                               class="form-control form-control-sm @error('f_pack_quant') is-invalid @enderror"
                                                               name="f_pack_quant"
                                                               maxlength="15"
                                                               value="{{ old('f_pack_quant', '0.0000')}}">
                                                        @error('f_pack_quant') <span class="invalid-feedback"
                                                                                     role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label
                                                            class="form-label">@lang('modules/stock.f_volume')</label>
                                                        <input type="text"
                                                               class="form-control form-control-sm @error('f_volume') is-invalid @enderror"
                                                               name="f_volume"
                                                               maxlength="15"
                                                               value="{{ old('f_volume', '0.0000')}}">
                                                        @error('f_volume') <span class="invalid-feedback"
                                                                                 role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label
                                                            class="form-label">@lang('modules/stock.f_weight')</label>
                                                        <input type="text"
                                                               class="form-control form-control-sm @error('f_weight') is-invalid @enderror"
                                                               name="f_weight"
                                                               maxlength="15"
                                                               value="{{ old('f_weight', '0.0000')}}">
                                                        @error('f_weight') <span class="invalid-feedback"
                                                                                 role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label
                                                            class="form-label">@lang('modules/stock.f_min_quant')</label>
                                                        <input type="text"
                                                               class="form-control form-control-sm @error('f_min_quant') is-invalid @enderror"
                                                               name="f_min_quant"
                                                               maxlength="15"
                                                               value="{{ old('f_min_quant', '0.0000')}}">
                                                        @error('f_min_quant') <span class="invalid-feedback"
                                                                                    role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12 col-xl-3">
                                                    <div class="mb-2">
                                                        <label
                                                            class="form-label">@lang('modules/stock.f_valid_days')</label>
                                                        <input type="text"
                                                               class="form-control form-control-sm @error('f_valid_days') is-invalid @enderror"
                                                               name="f_valid_days"
                                                               maxlength="100"
                                                               value="{{ old('f_valid_days', '0')}}">
                                                        @error('f_valid_days') <span class="invalid-feedback"
                                                                                     role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label
                                                            class="form-label">@lang('modules/stock.f_valid_date')</label>
                                                        <input
                                                            type="text"
                                                            class="form-control form-control-sm date"
                                                            name="f_valid_date"
                                                            placeholder="@lang('global.select_date')"
                                                            value="{{ old('f_valid_date') }}">
                                                        @error('f_valid_date') <span class="invalid-feedback"
                                                                                     role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label
                                                            class="form-label">@lang('modules/stock.f_packing')</label>
                                                        <input type="text"
                                                               class="form-control form-control-sm @error('f_packing') is-invalid @enderror"
                                                               name="f_packing"
                                                               maxlength="100"
                                                               value="{{ old('f_packing')}}">
                                                        @error('f_packing') <span class="invalid-feedback"
                                                                                  role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label
                                                            class="form-label">@lang('modules/stock.f_originating')</label>
                                                        <input type="text"
                                                               class="form-control form-control-sm @error('f_originating') is-invalid @enderror"
                                                               name="f_originating"
                                                               maxlength="100"
                                                               value="{{ old('f_originating')}}">
                                                        @error('f_originating') <span class="invalid-feedback"
                                                                                      role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label
                                                            class="form-label">@lang('modules/stock.f_manufacturerid')</label>
                                                        <select
                                                            class="form-control form-control-sm @error('f_manufacturerid') is-invalid @enderror"
                                                            name="f_manufacturerid">
                                                            <option value selected>---</option>
                                                            @foreach($manufacturers as $manufacturer)
                                                                <option
                                                                    value="{{ $manufacturer->f_id }}" {{ selected('f_manufacturerid', $manufacturer->f_id) }}>{{ $manufacturer->f_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('f_manufacturerid') <span class="invalid-feedback"
                                                                                         role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label
                                                            class="form-label">@lang('modules/stock.f_price_sale1')</label>
                                                        <input type="text"
                                                               class="form-control form-control-sm @error('f_price_sale1') is-invalid @enderror"
                                                               name="f_price_sale1"
                                                               maxlength="15"
                                                               value="{{ old('f_price_sale1', '0.0000')}}">
                                                        @error('f_price_sale1') <span class="invalid-feedback"
                                                                                      role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label
                                                            class="form-label">@lang('modules/stock.f_price_sale2')</label>
                                                        <input type="text"
                                                               class="form-control form-control-sm @error('f_price_sale2') is-invalid @enderror"
                                                               name="f_price_sale2"
                                                               maxlength="15"
                                                               value="{{ old('f_price_sale2', '0.0000')}}">
                                                        @error('f_price_sale2') <span class="invalid-feedback"
                                                                                      role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label
                                                            class="form-label">@lang('modules/stock.f_price_sale3')</label>
                                                        <input type="text"
                                                               class="form-control form-control-sm @error('f_price_sale3') is-invalid @enderror"
                                                               name="f_price_sale3"
                                                               maxlength="15"
                                                               value="{{ old('f_price_sale3', '0.0000')}}">
                                                        @error('f_price_sale3') <span class="invalid-feedback"
                                                                                      role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label
                                                            class="form-label">@lang('modules/stock.f_price_sale4')</label>
                                                        <input type="text"
                                                               class="form-control form-control-sm @error('f_price_sale4') is-invalid @enderror"
                                                               name="f_price_sale4"
                                                               maxlength="15"
                                                               value="{{ old('f_price_sale4', '0.0000')}}">
                                                        @error('f_price_sale4') <span class="invalid-feedback"
                                                                                      role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label
                                                            class="form-label">@lang('modules/stock.f_price_sale5')</label>
                                                        <input type="text"
                                                               class="form-control form-control-sm @error('f_price_sale5') is-invalid @enderror"
                                                               name="f_price_sale5"
                                                               maxlength="15"
                                                               value="{{ old('f_price_sale5', '0.0000')}}">
                                                        @error('f_price_sale5') <span class="invalid-feedback"
                                                                                      role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12 col-xl-3">
                                                    <div class="mb-2">
                                                        <label
                                                            class="form-label">@lang('modules/stock.f_discid')</label>
                                                        <select
                                                            class="form-control form-control-sm @error('f_discid') is-invalid @enderror"
                                                            name="f_discid">
                                                            <option value selected>---</option>
                                                            @foreach($discountsh as $discounth)
                                                                <option
                                                                    value="{{ $discounth->f_id }}" {{ selected('f_discid', $discounth->f_id) }}>{{ $discounth->f_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('f_discid') <span class="invalid-feedback"
                                                                                 role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label
                                                            class="form-label">@lang('modules/stock.f_price_purch')</label>
                                                        <input type="text"
                                                               class="form-control form-control-sm @error('f_price_purch') is-invalid @enderror"
                                                               name="f_price_purch"
                                                               maxlength="15"
                                                               value="{{ old('f_price_purch', '0.0000')}}">
                                                        @error('f_price_purch') <span class="invalid-feedback"
                                                                                      role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label
                                                            class="form-label">@lang('modules/stock.f_vat_perc')</label>
                                                        <input type="text"
                                                               class="form-control form-control-sm @error('f_vat_perc') is-invalid @enderror"
                                                               name="f_vat_perc"
                                                               maxlength="100"
                                                               value="{{ old('f_vat_perc', '21.00')}}"
                                                               readonly>
                                                        @error('f_vat_perc') <span class="invalid-feedback"
                                                                                   role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label class="form-label">@lang('modules/stock.f_vatid')</label>
                                                        <select
                                                            class="not-empty form-control form-control-sm @error('f_vatid') is-invalid @enderror"
                                                            name="f_vatid">
                                                            <option value selected>---</option>
                                                            @foreach($vats as $vat)
                                                                <option
                                                                    value="{{ $vat->f_id }}" {{ selected('f_vatid', $vat->f_id) }}>{{ $vat->f_id }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('f_vatid') <span class="invalid-feedback"
                                                                                role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label
                                                            class="form-label">@lang('modules/stock.f_alternative_group_id')</label>
                                                        <select
                                                            class="form-control form-control-sm @error('f_alternative_group_id') is-invalid @enderror"
                                                            name="f_alternative_group_id">
                                                            <option value selected>---</option>
                                                            @foreach($stockGroups as $group)
                                                                <option
                                                                    value="{{ $group->f_id }}" {{ selected('f_alternative_group_id', $group->f_id) }}>{{ $group->f_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('f_alternative_group_id') <span class="invalid-feedback"
                                                                                               role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label
                                                            class="form-label">@lang('modules/stock.f_partner_discount')</label>
                                                        <input type="text"
                                                               class="form-control form-control-sm @error('f_partner_discount') is-invalid @enderror"
                                                               name="f_partner_discount"
                                                               maxlength="15"
                                                               value="{{ old('f_partner_discount', '0.0000')}}">
                                                        @error('f_partner_discount') <span class="invalid-feedback"
                                                                                           role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label
                                                            class="form-label">@lang('modules/stock.f_gross_weight')</label>
                                                        <input type="text"
                                                               class="form-control form-control-sm @error('f_gross_weight') is-invalid @enderror"
                                                               name="f_gross_weight"
                                                               maxlength="15"
                                                               value="{{ old('f_gross_weight', '0.0000')}}">
                                                        @error('f_gross_weight') <span class="invalid-feedback"
                                                                                       role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label
                                                            class="form-label">@lang('modules/stock.f_stock_text1')</label>
                                                        <input type="text"
                                                               class="form-control form-control-sm @error('f_stock_text1') is-invalid @enderror"
                                                               name="f_stock_text1"
                                                               maxlength="100"
                                                               value="{{ old('f_stock_text1')}}">
                                                        @error('f_stock_text1') <span class="invalid-feedback"
                                                                                      role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label
                                                            class="form-label">@lang('modules/stock.f_stock_text2')</label>
                                                        <input type="text"
                                                               class="form-control form-control-sm @error('f_stock_text2') is-invalid @enderror"
                                                               name="f_stock_text2"
                                                               maxlength="100"
                                                               value="{{ old('f_stock_text2')}}">
                                                        @error('f_stock_text2') <span class="invalid-feedback"
                                                                                      role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label
                                                            class="form-label">@lang('modules/stock.f_stock_text3')</label>
                                                        <input type="text"
                                                               class="form-control form-control-sm @error('f_stock_text3') is-invalid @enderror"
                                                               name="f_stock_text3"
                                                               maxlength="100"
                                                               value="{{ old('f_stock_text3')}}">
                                                        @error('f_stock_text3') <span class="invalid-feedback"
                                                                                      role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12 col-xl-3">
                                                    <div class="mb-2">
                                                        <label class="form-label">@lang('modules/stock.f_type')</label>
                                                        <select
                                                            class="form-control form-control-sm @error('f_type') is-invalid @enderror"
                                                            name="f_type">
                                                            @foreach($types as $type)
                                                                <option
                                                                    value="{{ $type }}" {{ selected('f_type', $type) }}>@lang('modules/stock.type' . $type)</option>
                                                            @endforeach
                                                        </select>
                                                        @error('f_type') <span class="invalid-feedback"
                                                                               role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label class="form-check m-0">
                                                    <span
                                                        class="form-check-label">@lang('modules/stock.f_weightsign')</span>
                                                            <input type="hidden" name="f_weightsign" value="0">
                                                            <input type="checkbox" name="f_weightsign"
                                                                   class="form-check-input @error('f_weightsign') is-invalid @enderror"
                                                                   value="{{ old('f_weightsign', 1) }}" {{ old('f_weightsign') == 1 ? 'checked' : '' }}>
                                                        </label>
                                                        @error('f_weightsign') <span class="invalid-feedback"
                                                                                     role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label class="form-check m-0">
                                                    <span
                                                        class="form-check-label">@lang('modules/stock.f_product')</span>
                                                            <input type="hidden" name="f_product" value="0">
                                                            <input type="checkbox" name="f_product"
                                                                   class="form-check-input @error('f_product') is-invalid @enderror"
                                                                   value="{{ old('f_product', 1) }}" {{ old('f_product') == 1 ? 'checked' : '' }}>
                                                        </label>
                                                        @error('f_product') <span class="invalid-feedback"
                                                                                  role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label class="form-check m-0">
                                                    <span
                                                        class="form-check-label">@lang('modules/stock.f_scalesign')</span>
                                                            <input type="hidden" name="f_scalesign" value="0">
                                                            <input type="checkbox" name="f_scalesign"
                                                                   class="form-check-input @error('f_scalesign') is-invalid @enderror"
                                                                   value="{{ old('f_scalesign', 1) }}" {{ old('f_scalesign') == 1 ? 'checked' : '' }}>
                                                        </label>
                                                        @error('f_scalesign') <span class="invalid-feedback"
                                                                                    role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label class="form-label">@lang('modules/stock.f_curid')</label>
                                                        <select
                                                            class="form-control form-control-sm @error('f_curid') is-invalid @enderror"
                                                            name="f_curid">
                                                            <option value selected>---</option>
                                                            @foreach($currencies as $currency)
                                                                <option
                                                                    value="{{ $currency->f_id }}" {{ selected('f_curid', $currency->f_id) }}>{{ $currency->f_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('f_curid') <span class="invalid-feedback"
                                                                                role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label
                                                            class="form-label">@lang('modules/stock.f_partnerid')</label>
                                                        <select
                                                            class="form-control form-control-sm @error('f_partnerid') is-invalid @enderror"
                                                            name="f_partnerid">
                                                            <option value selected>---</option>
                                                            @foreach($partners as $partner)
                                                                <option
                                                                    value="{{ $partner->f_id }}" {{ selected('f_partnerid', $partner->f_id) }}>{{ $partner->f_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('f_partnerid') <span class="invalid-feedback"
                                                                                    role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label class="form-label">@lang('modules/stock.f_code')</label>
                                                        <input type="text"
                                                               class="form-control form-control-sm @error('f_code') is-invalid @enderror"
                                                               name="f_code"
                                                               maxlength="100"
                                                               value="{{ old('f_code')}}">
                                                        @error('f_code') <span class="invalid-feedback"
                                                                               role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label
                                                            class="form-label">@lang('modules/stock.f_accountid')</label>
                                                        <select
                                                            class="form-control form-control-sm @error('f_accountid') is-invalid @enderror"
                                                            name="f_accountid">
                                                            <option value selected>---</option>
                                                            @foreach($accounts as $account)
                                                                <option
                                                                    value="{{ $account->f_id }}" {{ selected('f_accountid', $account->f_id) }}>{{ $account->f_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('f_accountid') <span class="invalid-feedback"
                                                                                    role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label
                                                            class="form-label">@lang('modules/stock.f_ingredients')</label>
                                                        <textarea
                                                            class="form-control form-control-sm @error('f_ingredients') is-invalid @enderror"
                                                            name="f_ingredients"
                                                            rows="4"
                                                            cols="50">{{ old('f_ingredients')}}</textarea>
                                                        @error('f_ingredients') <span class="invalid-feedback"
                                                                                      role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label class="form-check m-0">
                                                    <span
                                                        class="form-check-label">@lang('modules/stock.f_empty_pack')</span>
                                                            <input type="hidden" name="f_empty_pack" value="0">
                                                            <input type="checkbox" name="f_empty_pack"
                                                                   class="form-check-input @error('f_empty_pack') is-invalid @enderror"
                                                                   value="{{ old('f_empty_pack', 1) }}" {{ old('f_empty_pack') == 1 ? 'checked' : '' }}>
                                                        </label>
                                                        @error('f_empty_pack') <span class="invalid-feedback"
                                                                                     role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab-2" role="tabpanel">
                                            <div class="row">
                                                <div class="col-12 col-xl-3">
                                                    <div class="mb-2">
                                                        <label class="form-label">@lang('modules/stock.f_f1')</label>
                                                        <input type="text"
                                                               class="form-control form-control-sm @error('f_f1') is-invalid @enderror"
                                                               name="f_f1"
                                                               maxlength="100"
                                                               value="{{ old('f_f1')}}">
                                                        @error('f_f1') <span class="invalid-feedback"
                                                                             role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label class="form-label">@lang('modules/stock.f_f2')</label>
                                                        <input type="text"
                                                               class="form-control form-control-sm @error('f_f2') is-invalid @enderror"
                                                               name="f_f2"
                                                               maxlength="100"
                                                               value="{{ old('f_f2')}}">
                                                        @error('f_f2') <span class="invalid-feedback"
                                                                             role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label class="form-label">@lang('modules/stock.f_f3')</label>
                                                        <input type="text"
                                                               class="form-control form-control-sm @error('f_f3') is-invalid @enderror"
                                                               name="f_f3"
                                                               maxlength="100"
                                                               value="{{ old('f_f3')}}">
                                                        @error('f_f3') <span class="invalid-feedback"
                                                                             role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label class="form-label">@lang('modules/stock.f_f4')</label>
                                                        <input type="text"
                                                               class="form-control form-control-sm @error('f_f4') is-invalid @enderror"
                                                               name="f_f4"
                                                               maxlength="100"
                                                               value="{{ old('f_f4')}}">
                                                        @error('f_f4') <span class="invalid-feedback"
                                                                             role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label class="form-label">@lang('modules/stock.f_f5')</label>
                                                        <input type="text"
                                                               class="form-control form-control-sm @error('f_f5') is-invalid @enderror"
                                                               name="f_f5"
                                                               maxlength="100"
                                                               value="{{ old('f_f5')}}">
                                                        @error('f_f5') <span class="invalid-feedback"
                                                                             role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label
                                                            class="form-label">@lang('modules/stock.f_height')</label>
                                                        <input type="text"
                                                               class="form-control form-control-sm @error('f_height') is-invalid @enderror"
                                                               name="f_height"
                                                               maxlength="100"
                                                               value="{{ old('f_height', '0.0000')}}">
                                                        @error('f_height') <span class="invalid-feedback"
                                                                                 role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label class="form-label">@lang('modules/stock.f_width')</label>
                                                        <input type="text"
                                                               class="form-control form-control-sm @error('f_width') is-invalid @enderror"
                                                               name="f_width"
                                                               maxlength="100"
                                                               value="{{ old('f_width', '0.0000')}}">
                                                        @error('f_width') <span class="invalid-feedback"
                                                                                role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label
                                                            class="form-label">@lang('modules/stock.f_length')</label>
                                                        <input type="text"
                                                               class="form-control form-control-sm @error('f_length') is-invalid @enderror"
                                                               name="f_length"
                                                               maxlength="100"
                                                               value="{{ old('f_length', '0.0000')}}">
                                                        @error('f_length') <span class="invalid-feedback"
                                                                                 role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label
                                                            class="form-label">@lang('modules/stock.f_main_stockid')</label>
                                                        <select
                                                            class="form-control form-control-sm @error('f_main_stockid') is-invalid @enderror"
                                                            name="f_main_stockid">
                                                            <option value selected>---</option>
                                                            @foreach($stocks as $singleStock)
                                                                <option
                                                                    value="{{ $singleStock->f_id }}" {{ selected('f_main_stockid', $singleStock->f_id) }}>{{ $singleStock->f_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('f_main_stockid') <span class="invalid-feedback"
                                                                                       role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12 col-xl-3">
                                                    <div class="mb-2">
                                                        <label class="form-label">@lang('modules/stock.f_r1id')</label>
                                                        <select
                                                            class="form-control form-control-sm @error('f_r1id') is-invalid @enderror"
                                                            name="f_r1id">
                                                            <option value selected>---</option>
                                                            @foreach($registers1 as $register)
                                                                <option
                                                                    value="{{ $register->f_id }}" {{ selected('f_r1id', $register->f_id) }}>{{ $register->f_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('f_r1id') <span class="invalid-feedback"
                                                                               role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label class="form-label">@lang('modules/stock.f_r2id')</label>
                                                        <select
                                                            class="form-control form-control-sm @error('f_r2id') is-invalid @enderror"
                                                            name="f_r2id">
                                                            <option value selected>---</option>
                                                            @foreach($registers2 as $register)
                                                                <option
                                                                    value="{{ $register->f_id }}" {{ selected('f_r2id', $register->f_id) }}>{{ $register->f_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('f_r2id') <span class="invalid-feedback"
                                                                               role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label class="form-label">@lang('modules/stock.f_r3id')</label>
                                                        <select
                                                            class="form-control form-control-sm @error('f_r3id') is-invalid @enderror"
                                                            name="f_r3id">
                                                            <option value selected>---</option>
                                                            @foreach($registers3 as $register)
                                                                <option
                                                                    value="{{ $register->f_id }}" {{ selected('f_r3id', $register->f_id) }}>{{ $register->f_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('f_r3id') <span class="invalid-feedback"
                                                                               role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label class="form-label">@lang('modules/stock.f_r4id')</label>
                                                        <select
                                                            class="form-control form-control-sm @error('f_r4id') is-invalid @enderror"
                                                            name="f_r4id">
                                                            <option value selected>---</option>
                                                            @foreach($registers4 as $register)
                                                                <option
                                                                    value="{{ $register->f_id }}" {{ selected('f_r4id', $register->f_id) }}>{{ $register->f_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('f_r4id') <span class="invalid-feedback"
                                                                               role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label class="form-label">@lang('modules/stock.f_r5id')</label>
                                                        <select
                                                            class="form-control form-control-sm @error('f_r5id') is-invalid @enderror"
                                                            name="f_r5id">
                                                            <option value selected>---</option>
                                                            @foreach($registers5 as $register)
                                                                <option
                                                                    value="{{ $register->f_id }}" {{ selected('f_r5id', $register->f_id) }}>{{ $register->f_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('f_r5id') <span class="invalid-feedback"
                                                                               role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label
                                                            class="form-label">@lang('modules/stock.f_departmentid')</label>
                                                        <select
                                                            class="form-control form-control-sm @error('f_departmentid') is-invalid @enderror"
                                                            name="f_departmentid">
                                                            <option value selected>---</option>
                                                            @foreach($departments as $department)
                                                                <option
                                                                    value="{{ $department->f_id }}" {{ selected('f_departmentid', $department->f_id) }}>{{ $department->f_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('f_departmentid') <span class="invalid-feedback"
                                                                                       role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label
                                                            class="form-label">@lang('modules/stock.f_personid')</label>
                                                        <select
                                                            class="form-control form-control-sm @error('f_personid') is-invalid @enderror"
                                                            name="f_personid">
                                                            <option value selected>---</option>
                                                            @foreach($persons as $person)
                                                                <option
                                                                    value="{{ $person->f_id }}" {{ selected('f_personid', $person->f_id) }}>{{ $person->f_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('f_personid') <span class="invalid-feedback"
                                                                                   role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label
                                                            class="form-label">@lang('modules/stock.f_projectid')</label>
                                                        <select
                                                            class="form-control form-control-sm @error('f_projectid') is-invalid @enderror"
                                                            name="f_projectid">
                                                            <option value selected>---</option>
                                                            @foreach($projects as $project)
                                                                <option
                                                                    value="{{ $project->f_id }}" {{ selected('f_projectid', $project->f_id) }}>{{ $project->f_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('f_projectid') <span class="invalid-feedback"
                                                                                    role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label
                                                            class="form-label">@lang('modules/stock.f_quantity')</label>
                                                        <input type="text"
                                                               class="form-control form-control-sm @error('f_quantity') is-invalid @enderror"
                                                               name="f_quantity"
                                                               maxlength="15"
                                                               value="{{ old('f_quantity', '0.0000')}}">
                                                        @error('f_quantity') <span class="invalid-feedback"
                                                                                   role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12 col-xl-3">
                                                    <div class="mb-2">
                                                        <label class="form-check m-0">
                                                            <span
                                                                class="form-check-label">@lang('modules/stock.f_mark1')</span>
                                                            <input type="hidden" name="f_mark1" value="0">
                                                            <input type="checkbox" name="f_mark1"
                                                                   class="form-check-input @error('f_mark1') is-invalid @enderror"
                                                                   value="{{ old('f_mark1', 1) }}" {{ old('f_mark1') == 1 ? 'checked' : '' }}>
                                                        </label>
                                                        @error('f_mark1') <span class="invalid-feedback"
                                                                                role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label class="form-check m-0">
                                                            <span
                                                                class="form-check-label">@lang('modules/stock.f_mark2')</span>
                                                            <input type="hidden" name="f_mark2" value="0">
                                                            <input type="checkbox" name="f_mark2"
                                                                   class="form-check-input @error('f_mark2') is-invalid @enderror"
                                                                   value="{{ old('f_mark2', 1) }}" {{ old('f_mark2') == 1 ? 'checked' : '' }}>
                                                        </label>
                                                        @error('f_mark2') <span class="invalid-feedback"
                                                                                role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label class="form-check m-0">
                                                            <span
                                                                class="form-check-label">@lang('modules/stock.f_mark3')</span>
                                                            <input type="hidden" name="f_mark3" value="0">
                                                            <input type="checkbox" name="f_mark3"
                                                                   class="form-check-input @error('f_mark3') is-invalid @enderror"
                                                                   value="{{ old('f_mark3', 1) }}" {{ old('f_mark3') == 1 ? 'checked' : '' }}>
                                                        </label>
                                                        @error('f_mark3') <span class="invalid-feedback"
                                                                                role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label class="form-check m-0">
                                                            <span
                                                                class="form-check-label">@lang('modules/stock.f_mark4')</span>
                                                            <input type="hidden" name="f_mark4" value="0">
                                                            <input type="checkbox" name="f_mark4"
                                                                   class="form-check-input @error('f_mark4') is-invalid @enderror"
                                                                   value="{{ old('f_mark4', 1) }}" {{ old('f_mark4') == 1 ? 'checked' : '' }}>
                                                        </label>
                                                        @error('f_mark4') <span class="invalid-feedback"
                                                                                role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label class="form-check m-0">
                                                            <span
                                                                class="form-check-label">@lang('modules/stock.f_mark5')</span>
                                                            <input type="hidden" name="f_mark5" value="0">
                                                            <input type="checkbox" name="f_mark5"
                                                                   class="form-check-input @error('f_mark5') is-invalid @enderror"
                                                                   value="{{ old('f_mark5', 1) }}" {{ old('f_mark5') == 1 ? 'checked' : '' }}>
                                                        </label>
                                                        @error('f_mark5') <span class="invalid-feedback"
                                                                                role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label class="form-check m-0">
                                                            <span
                                                                class="form-check-label">@lang('modules/stock.f_mark6')</span>
                                                            <input type="hidden" name="f_mark6" value="0">
                                                            <input type="checkbox" name="f_mark6"
                                                                   class="form-check-input @error('f_mark6') is-invalid @enderror"
                                                                   value="{{ old('f_mark6', 1) }}" {{ old('f_mark6') == 1 ? 'checked' : '' }}>
                                                        </label>
                                                        @error('f_mark6') <span class="invalid-feedback"
                                                                                role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label class="form-check m-0">
                                                            <span
                                                                class="form-check-label">@lang('modules/stock.f_mark7')</span>
                                                            <input type="hidden" name="f_mark7" value="0">
                                                            <input type="checkbox" name="f_mark7"
                                                                   class="form-check-input @error('f_mark7') is-invalid @enderror"
                                                                   value="{{ old('f_mark7', 1) }}" {{ old('f_mark7') == 1 ? 'checked' : '' }}>
                                                        </label>
                                                        @error('f_mark7') <span class="invalid-feedback"
                                                                                role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label class="form-check m-0">
                                                            <span
                                                                class="form-check-label">@lang('modules/stock.f_mark8')</span>
                                                            <input type="hidden" name="f_mark8" value="0">
                                                            <input type="checkbox" name="f_mark8"
                                                                   class="form-check-input @error('f_mark8') is-invalid @enderror"
                                                                   value="{{ old('f_mark8', 1) }}" {{ old('f_mark8') == 1 ? 'checked' : '' }}>
                                                        </label>
                                                        @error('f_mark8') <span class="invalid-feedback"
                                                                                role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label class="form-check m-0">
                                                    <span
                                                        class="form-check-label">@lang('modules/stock.f_locked')</span>
                                                            <input type="hidden" name="f_locked" value="0">
                                                            <input type="checkbox" name="f_locked"
                                                                   class="form-check-input @error('f_locked') is-invalid @enderror"
                                                                   value="{{ old('f_locked', 1) }}" {{ old('f_locked') == 1 ? 'checked' : '' }}>
                                                        </label>
                                                        @error('f_locked') <span class="invalid-feedback"
                                                                                 role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label class="form-check m-0">
                                                    <span
                                                        class="form-check-label">@lang('modules/stock.f_sales_block')</span>
                                                            <input type="hidden" name="f_sales_block" value="0">
                                                            <input type="checkbox" name="f_sales_block"
                                                                   class="form-check-input @error('f_sales_block') is-invalid @enderror"
                                                                   value="{{ old('f_sales_block', 1) }}" {{ old('f_sales_block') == 1 ? 'checked' : '' }}>
                                                        </label>
                                                        @error('f_sales_block') <span class="invalid-feedback"
                                                                                      role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label class="form-check m-0">
                                                    <span
                                                        class="form-check-label">@lang('modules/stock.f_purch_block')</span>
                                                            <input type="hidden" name="f_purch_block" value="0">
                                                            <input type="checkbox" name="f_purch_block"
                                                                   class="form-check-input @error('f_purch_block') is-invalid @enderror"
                                                                   value="{{ old('f_purch_block', 1) }}" {{ old('f_purch_block') == 1 ? 'checked' : '' }}>
                                                        </label>
                                                        @error('f_purch_block') <span class="invalid-feedback"
                                                                                      role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label class="form-check m-0">
                                                    <span
                                                        class="form-check-label">@lang('modules/stock.f_order_block')</span>
                                                            <input type="hidden" name="f_order_block" value="0">
                                                            <input type="checkbox" name="f_order_block"
                                                                   class="form-check-input @error('f_order_block') is-invalid @enderror"
                                                                   value="{{ old('f_order_block', 1) }}" {{ old('f_order_block') == 1 ? 'checked' : '' }}>
                                                        </label>
                                                        @error('f_order_block') <span class="invalid-feedback"
                                                                                      role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label class="form-check m-0">
                                                    <span
                                                        class="form-check-label">@lang('modules/stock.f_catalog_item')</span>
                                                            <input type="hidden" name="f_catalog_item" value="0">
                                                            <input type="checkbox" name="f_catalog_item"
                                                                   class="form-check-input @error('f_catalog_item') is-invalid @enderror"
                                                                   value="{{ old('f_catalog_item', 1) }}" {{ old('f_catalog_item') == 1 ? 'checked' : '' }}>
                                                        </label>
                                                        @error('f_catalog_item') <span class="invalid-feedback"
                                                                                       role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label
                                                            class="form-label">@lang('modules/stock.f_disp_priority')</label>
                                                        <input type="text"
                                                               class="form-control form-control-sm @error('f_disp_priority') is-invalid @enderror"
                                                               name="f_disp_priority"
                                                               maxlength="15"
                                                               value="{{ old('f_disp_priority', '0')}}">
                                                        @error('f_disp_priority') <span class="invalid-feedback"
                                                                                        role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12 col-xl-3">
                                                    <h4 class="form-label mt-4">@lang('modules/stock.title1')</h4>

                                                    <div class="mb-2">
                                                        <label class="form-check m-0">
                                                    <span
                                                        class="form-check-label">@lang('modules/stock.f_gpais_i')</span>
                                                            <input type="hidden" name="f_gpais_i" value="0">
                                                            <input type="checkbox" name="f_gpais_i"
                                                                   class="form-check-input @error('f_gpais_i') is-invalid @enderror"
                                                                   value="{{ old('f_gpais_i', 1) }}" {{ old('f_gpais_i') == 1 ? 'checked' : '' }}>
                                                        </label>
                                                        @error('f_gpais_i') <span class="invalid-feedback"
                                                                                  role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label class="form-check m-0">
                                                    <span
                                                        class="form-check-label">@lang('modules/stock.f_gpais_a')</span>
                                                            <input type="hidden" name="f_gpais_a" value="0">
                                                            <input type="checkbox" name="f_gpais_a"
                                                                   class="form-check-input @error('f_gpais_a') is-invalid @enderror"
                                                                   value="{{ old('f_gpais_a', 1) }}" {{ old('f_gpais_a') == 1 ? 'checked' : '' }}>
                                                        </label>
                                                        @error('f_gpais_a') <span class="invalid-feedback"
                                                                                  role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label class="form-check m-0">
                                                    <span
                                                        class="form-check-label">@lang('modules/stock.f_gpais_n')</span>
                                                            <input type="hidden" name="f_gpais_n" value="0">
                                                            <input type="checkbox" name="f_gpais_n"
                                                                   class="form-check-input @error('f_gpais_n') is-invalid @enderror"
                                                                   value="{{ old('f_gpais_n', 1) }}" {{ old('f_gpais_n') == 1 ? 'checked' : '' }}>
                                                        </label>
                                                        @error('f_gpais_n') <span class="invalid-feedback"
                                                                                  role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label
                                                            class="form-label">@lang('modules/stock.f_pack_type')</label>
                                                        <select
                                                            class="form-control form-control-sm @error('f_pack_type') is-invalid @enderror"
                                                            name="f_pack_type">
                                                            @foreach($pacTypes as $type)
                                                                <option
                                                                    value="{{ $type }}" {{ selected('f_pack_type', $type) }}>@lang('modules/stock.gpais_pac_type' . $type)</option>
                                                            @endforeach
                                                        </select>
                                                        @error('f_pack_type') <span class="invalid-feedback"
                                                                                    role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab-3" role="tabpanel">
                                            <div class="row">
                                                <div class="col-auto text-end mt-1">
                                                    <button
                                                        form="stock-form"
                                                        class="btn btn-primary"
                                                        type="submit"
                                                        name="action"
                                                        value="price-sale-create">
                                                        <i class="fas fa-plus"></i> @lang('global.btn_new')
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab-4" role="tabpanel">
                                            <div class="row">
                                                <div class="col-auto text-end mt-1">
                                                    <button
                                                        form="stock-form"
                                                        class="btn btn-primary"
                                                        type="submit"
                                                        name="action"
                                                        value="price-purch-create">
                                                        <i class="fas fa-plus"></i> @lang('global.btn_new')
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab-5" role="tabpanel">

                                        </div>
                                        <div class="tab-pane fade" id="tab-6" role="tabpanel">

                                        </div>
                                        <div class="tab-pane fade" id="tab-7" role="tabpanel">
                                            <div class="row">
                                                <div class="col-12 col-xl-3">
                                                    <div class="mb-2">
                                                        <label
                                                            class="form-label">@lang('modules/stock.f_diviation_percentage')</label>
                                                        <input type="text"
                                                               class="form-control form-control-sm @error('f_diviation_percentage') is-invalid @enderror"
                                                               name="f_diviation_percentage"
                                                               maxlength="15"
                                                               value="{{ old('f_diviation_percentage', '0.00')}}">
                                                        @error('f_diviation_percentage') <span class="invalid-feedback"
                                                                                               role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12 col-xl-3">
                                                    <div class="mb-2">
                                                        <label
                                                            class="form-label">@lang('modules/stock.f_imgurl')</label>
                                                        <input type="text"
                                                               class="form-control form-control-sm @error('f_imgurl') is-invalid @enderror"
                                                               name="f_imgurl"
                                                               maxlength="500"
                                                               value="{{ old('f_imgurl')}}">
                                                        @error('f_imgurl') <span class="invalid-feedback"
                                                                                 role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12 col-xl-3">
                                                    <div class="mb-2">
                                                        <label class="form-check m-0">
                                                    <span
                                                        class="form-check-label">@lang('modules/stock.f_ignor_gross_weight')</span>
                                                            <input type="hidden" name="f_ignor_gross_weight" value="0">
                                                            <input type="checkbox" name="f_ignor_gross_weight"
                                                                   class="form-check-input @error('f_ignor_gross_weight') is-invalid @enderror"
                                                                   value="{{ old('f_ignor_gross_weight', 1) }}" {{ old('f_ignor_gross_weight') == 1 ? 'checked' : '' }}>
                                                        </label>
                                                        @error('f_ignor_gross_weight') <span class="invalid-feedback"
                                                                                             role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label class="form-check m-0">
                                                    <span
                                                        class="form-check-label">@lang('modules/stock.f_prevent_manual_entry')</span>
                                                            <input type="hidden" name="f_prevent_manual_entry"
                                                                   value="0">
                                                            <input type="checkbox" name="f_prevent_manual_entry"
                                                                   class="form-check-input @error('f_prevent_manual_entry') is-invalid @enderror"
                                                                   value="{{ old('f_prevent_manual_entry', 1) }}" {{ old('f_prevent_manual_entry') == 1 ? 'checked' : '' }}>
                                                        </label>
                                                        @error('f_prevent_manual_entry') <span class="invalid-feedback"
                                                                                               role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12 col-xl-3">
                                                    <div class="mb-2" hidden>
                                                        <label
                                                            class="form-label">@lang('modules/stock.f_system1')</label>
                                                        <input type="text"
                                                               class="form-control form-control-sm @error('f_system1') is-invalid @enderror"
                                                               name="f_system1"
                                                               maxlength="100"
                                                               value="{{ old('f_system1') }}">
                                                        @error('f_system1') <span class="invalid-feedback"
                                                                                  role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2" hidden>
                                                        <label
                                                            class="form-label">@lang('modules/stock.f_system2')</label>
                                                        <input type="text"
                                                               class="form-control form-control-sm @error('f_system2') is-invalid @enderror"
                                                               name="f_system2"
                                                               maxlength="100"
                                                               value="{{ old('f_system2') }}">
                                                        @error('f_system2') <span class="invalid-feedback"
                                                                                  role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2" hidden>
                                                        <label
                                                            class="form-label">@lang('modules/stock.f_system3')</label>
                                                        <input type="text"
                                                               class="form-control form-control-sm @error('f_system3') is-invalid @enderror"
                                                               name="f_system3"
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
