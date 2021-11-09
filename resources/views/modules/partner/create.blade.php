@extends('layouts.app')

@section('content')
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto">
            <h1>@lang('modules/partner.h1')</h1>
        </div>

        <div class="col-auto ms-auto text-end mt-n1">
            <a href="#" class="btn btn-primary"
               onclick="event.preventDefault();document.getElementById('partner-form').submit();">@lang('global.btn_save')</a>
            <a href="{{ route('partners.index') }}" class="btn btn-dark">@lang('global.btn_close')</a>
        </div>
    </div>
    <div class="row">
        <form id="partner-form" action="{{ route('partners.store') }}" method="POST">
            @csrf
            <div class="card">
                <div class="col-12">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item"><a class="nav-link active" href="#tab-1" data-bs-toggle="tab"
                                                            role="tab">@lang('modules/partner.tab1')</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#tab-2" data-bs-toggle="tab"
                                                            role="tab">@lang('modules/partner.tab2')</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#tab-3" data-bs-toggle="tab"
                                                            role="tab">@lang('modules/partner.tab3')</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#tab-4" data-bs-toggle="tab"
                                                            role="tab">@lang('modules/partner.tab4')</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#tab-5" data-bs-toggle="tab"
                                                            role="tab">@lang('modules/partner.tab5')</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#tab-6" data-bs-toggle="tab"
                                                            role="tab">@lang('modules/partner.tab6')</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#tab-7" data-bs-toggle="tab"
                                                            role="tab">@lang('modules/partner.tab7')</a></li>
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
                                                        <label class="form-label">@lang('modules/partner.f_id')</label>
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
                                                        <label
                                                            class="form-label">@lang('modules/partner.f_name')</label>
                                                        <input type="text"
                                                               class="form-control form-control-sm @error('f_name') is-invalid @enderror"
                                                               name="f_name"
                                                               maxlength="100"
                                                               value="{{ old('f_name')}}">
                                                        @error('f_name') <span class="invalid-feedback"
                                                                               role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label
                                                            class="form-label">@lang('modules/partner.f_name2')</label>
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
                                                            class="form-label">@lang('modules/partner.f_groupid')</label>
                                                        <select
                                                            class="form-control form-control-sm @error('f_groupid') is-invalid @enderror"
                                                            name="f_groupid">
                                                            <option value selected>---</option>
                                                            @foreach($partnerGroups as $group)
                                                                <option
                                                                    value="{{ $group->f_id }}" {{ selected('f_groupid', $group->f_id) }}>{{ $group->f_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('f_groupid') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label
                                                            class="form-label">@lang('modules/partner.f_code')</label>
                                                        <input type="text"
                                                               class="form-control form-control-sm @error('f_code') is-invalid @enderror"
                                                               name="f_code"
                                                               maxlength="20"
                                                               value="{{ old('f_code')}}">
                                                        @error('f_code') <span class="invalid-feedback"
                                                                               role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label
                                                            class="form-label">@lang('modules/partner.f_vat_code')</label>
                                                        <input type="text"
                                                               class="form-control form-control-sm @error('f_vat_code') is-invalid @enderror"
                                                               name="f_vat_code"
                                                               maxlength="20"
                                                               value="{{ old('f_vat_code')}}">
                                                        @error('f_vat_code') <span class="invalid-feedback"
                                                                                   role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label
                                                            class="form-label">@lang('modules/partner.f_legal_status')</label>
                                                        <select
                                                            class="form-control form-control-sm @error('f_legal_status') is-invalid @enderror"
                                                            name="f_legal_status">
                                                            @foreach($legalStatuses as $status)
                                                                <option
                                                                    value="{{ $status }}" {{ selected('f_legal_status', $status) }}>@lang('modules/partner.legal_status_type' . $status)</option>
                                                            @endforeach
                                                        </select>
                                                        @error('f_legal_status') <span class="invalid-feedback"
                                                                                       role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label class="form-check m-0">
                                                            <span
                                                                class="form-check-label">@lang('modules/partner.f_buyer')</span>
                                                            <input type="hidden" name="f_buyer" value="0">
                                                            <input type="checkbox" name="f_buyer"
                                                                   class="form-check-input @error('f_buyer') is-invalid @enderror"
                                                                   value="{{ old('f_buyer', 1) }}" {{ old('f_buyer') == 1 ? 'checked' : '' }}>
                                                        </label>
                                                        @error('f_buyer') <span class="invalid-feedback"
                                                                                role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label class="form-check m-0">
                                                            <span
                                                                class="form-check-label">@lang('modules/partner.f_seller')</span>
                                                            <input type="hidden" name="f_seller" value="0">
                                                            <input type="checkbox" name="f_seller"
                                                                   class="form-check-input @error('f_seller') is-invalid @enderror"
                                                                   value="{{ old('f_seller', 1) }}" {{ old('f_seller') == 1 ? 'checked' : '' }}>
                                                        </label>
                                                        @error('f_seller') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label class="form-check m-0">
                                                            <span
                                                                class="form-check-label">@lang('modules/partner.f_locked')</span>
                                                            <input type="hidden" name="f_locked" value="0">
                                                            <input type="checkbox" name="f_locked"
                                                                   class="form-check-input @error('f_locked') is-invalid @enderror"
                                                                   value="{{ old('f_locked', 1) }}" {{ old('f_locked') == 1 ? 'checked' : '' }}>
                                                        </label>
                                                        @error('f_locked') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12 col-xl-3">
                                                    <div class="mb-2">
                                                        <label
                                                            class="form-label">@lang('modules/partner.f_person')</label>
                                                        <input type="text"
                                                               class="form-control form-control-sm @error('f_person') is-invalid @enderror"
                                                               name="f_person"
                                                               maxlength="100"
                                                               value="{{ old('f_person')}}">
                                                        @error('f_person') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label
                                                            class="form-label">@lang('modules/partner.f_post')</label>
                                                        <input type="text"
                                                               class="form-control form-control-sm @error('f_post') is-invalid @enderror"
                                                               name="f_post"
                                                               maxlength="100"
                                                               value="{{ old('f_post')}}">
                                                        @error('f_post') <span class="invalid-feedback"
                                                                               role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label
                                                            class="form-label">@lang('modules/partner.f_phone')</label>
                                                        <input type="text"
                                                               class="form-control form-control-sm @error('f_phone') is-invalid @enderror"
                                                               name="f_phone"
                                                               maxlength="100"
                                                               value="{{ old('f_phone')}}">
                                                        @error('f_phone') <span class="invalid-feedback"
                                                                                role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label class="form-label">@lang('modules/partner.f_fax')</label>
                                                        <input type="text"
                                                               class="form-control form-control-sm @error('f_fax') is-invalid @enderror"
                                                               name="f_fax"
                                                               maxlength="100"
                                                               value="{{ old('f_fax')}}">
                                                        @error('f_fax') <span class="invalid-feedback"
                                                                              role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label
                                                            class="form-label">@lang('modules/partner.f_email')</label>
                                                        <input type="text"
                                                               class="form-control form-control-sm @error('f_email') is-invalid @enderror"
                                                               name="f_email"
                                                               maxlength="100"
                                                               value="{{ old('f_email')}}">
                                                        @error('f_email') <span class="invalid-feedback"
                                                                                role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label
                                                            class="form-label">@lang('modules/partner.f_address')</label>
                                                        <input type="text"
                                                               class="form-control form-control-sm @error('f_address') is-invalid @enderror"
                                                               name="f_address"
                                                               maxlength="100"
                                                               value="{{ old('f_address')}}">
                                                        @error('f_address') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label
                                                            class="form-label">@lang('modules/partner.f_price_level')</label>
                                                        <select
                                                            class="form-control form-control-sm @error('f_price_level') is-invalid @enderror"
                                                            name="f_price_level">
                                                            @foreach($priceLevels as $level)
                                                                <option
                                                                    value="{{ $level }}" {{ selected('f_price_level', $level) }}>@lang('modules/partner.price_level_type' . $level)</option>
                                                            @endforeach
                                                        </select>
                                                        @error('f_price_level') <span class="invalid-feedback"
                                                                                      role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label
                                                            class="form-label">@lang('modules/partner.f_partnerid')</label>
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
                                                        <label
                                                            class="form-label">@lang('modules/partner.f_accountid1')</label>
                                                        <select
                                                            class="form-control form-control-sm @error('f_accountid1') is-invalid @enderror"
                                                            name="f_accountid1">
                                                            <option value selected>---</option>
                                                            @foreach($accounts as $account)
                                                                <option
                                                                    value="{{ $account->f_id }}" {{ selected('f_accountid1', $account->f_id) }}>{{ $account->f_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('f_accountid1') <span class="invalid-feedback"
                                                                                     role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label
                                                            class="form-label">@lang('modules/partner.f_accountid2')</label>
                                                        <select
                                                            class="form-control form-control-sm @error('f_accountid2') is-invalid @enderror"
                                                            name="f_accountid2">
                                                            <option value selected>---</option>
                                                            @foreach($accounts as $account)
                                                                <option
                                                                    value="{{ $account->f_id }}" {{ selected('f_accountid2', $account->f_id) }}>{{ $account->f_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('f_accountid2') <span class="invalid-feedback"
                                                                                     role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12 col-xl-3">
                                                    <div class="mb-2">
                                                        <label
                                                            class="form-label">@lang('modules/partner.f_messagegroupid')</label>
                                                        <select
                                                            class="form-control form-control-sm @error('f_messagegroupid') is-invalid @enderror"
                                                            name="f_messagegroupid">
                                                            <option value selected>---</option>
                                                            @foreach($messageGroups as $group)
                                                                <option
                                                                    value="{{ $group->f_id }}" {{ selected('f_messagegroupid', $group->f_id) }}>{{ $group->f_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('f_messagegroupid') <span class="invalid-feedback"
                                                                                         role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label
                                                            class="form-label">@lang('modules/partner.f_curid')</label>
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
                                                            class="form-label">@lang('modules/partner.f_credit')</label>
                                                        <input type="text"
                                                               class="form-control form-control-sm @error('f_credit') is-invalid @enderror"
                                                               name="f_credit"
                                                               maxlength="15"
                                                               value="{{ old('f_credit', '0.00')}}">
                                                        @error('f_credit') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label
                                                            class="form-label">@lang('modules/partner.f_pay_days')</label>
                                                        <input type="text"
                                                               class="form-control form-control-sm @error('f_pay_days') is-invalid @enderror"
                                                               name="f_pay_days"
                                                               maxlength="255"
                                                               value="{{ old('f_pay_days', 0)}}">
                                                        @error('f_pay_days') <span class="invalid-feedback"
                                                                                   role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label
                                                            class="form-label">@lang('modules/partner.f_discount_card')</label>
                                                        <input type="text"
                                                               class="form-control form-control-sm @error('f_discount_card') is-invalid @enderror"
                                                               name="f_discount_card"
                                                               maxlength="255"
                                                               value="{{ old('f_discount_card')}}">
                                                        @error('f_discount_card') <span class="invalid-feedback"
                                                                                        role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label class="form-check m-0">
                                                            <span
                                                                class="form-check-label">@lang('modules/partner.f_discount_card_active')</span>
                                                            <input type="hidden" name="f_discount_card_active"
                                                                   value="0">
                                                            <input type="checkbox" name="f_discount_card_active"
                                                                   class="form-check-input @error('f_discount_card_active') is-invalid @enderror"
                                                                   value="{{ old('f_discount_card_active', 1) }}" {{ old('f_discount_card_active') == 1 ? 'checked' : '' }}>
                                                        </label>
                                                        @error('f_discount_card_active') <span class="invalid-feedback"
                                                                                               role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label
                                                            class="form-label">@lang('modules/partner.f_discount_card_balance')</label>
                                                        <input type="text"
                                                               class="form-control form-control-sm @error('f_discount_card_balance') is-invalid @enderror"
                                                               name="f_discount_card_balance"
                                                               maxlength="15"
                                                               value="{{ old('f_discount_card_balance', '0.00')}}">
                                                        @error('f_discount_card_balance') <span class="invalid-feedback"
                                                                                                role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label
                                                            class="form-label">@lang('modules/partner.f_discount_card_balance2')</label>
                                                        <input type="text"
                                                               class="form-control form-control-sm @error('f_discount_card_balance2') is-invalid @enderror"
                                                               name="f_discount_card_balance2"
                                                               maxlength="15"
                                                               value="{{ old('f_discount_card_balance2', '0.00')}}">
                                                        @error('f_discount_card_balance2') <span
                                                            class="invalid-feedback"
                                                            role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label
                                                            class="form-label">@lang('modules/partner.f_discount_card_balance3')</label>
                                                        <input type="text"
                                                               class="form-control form-control-sm @error('f_discount_card_balance3') is-invalid @enderror"
                                                               name="f_discount_card_balance3"
                                                               maxlength="15"
                                                               value="{{ old('f_discount_card_balance3', '0.00')}}"
                                                               readonly>
                                                        @error('f_discount_card_balance3') <span
                                                            class="invalid-feedback"
                                                            role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label
                                                            class="form-label">@lang('modules/partner.f_discount_card_balance3_date')</label>
                                                        <input
                                                            type="text"
                                                            class="form-control form-control-sm date"
                                                            name="f_discount_card_balance3_date"
                                                            placeholder="@lang('global.select_date')"
                                                            value="{{ old('f_discount_card_balance3_date') }}">
                                                        @error('f_discount_card_balance3_date') <span
                                                            class="invalid-feedback"
                                                            role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12 col-xl-3">
                                                    <div class="mb-2">
                                                        <label
                                                            class="form-label">@lang('modules/partner.f_vatid')</label>
                                                        <select
                                                            class="form-control form-control-sm @error('f_vatid') is-invalid @enderror"
                                                            name="f_vatid">
                                                            <option value selected>---</option>
                                                            @foreach($vats as $vat)
                                                                <option
                                                                    value="{{ $vat->f_id }}" {{ selected('f_vatid', $vat->f_id) }}>{{ $vat->f_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('f_vatid') <span class="invalid-feedback"
                                                                                role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label
                                                            class="form-label">@lang('modules/partner.f_r1id')</label>
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
                                                        <label
                                                            class="form-label">@lang('modules/partner.f_r2id')</label>
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
                                                        <label
                                                            class="form-label">@lang('modules/partner.f_r3id')</label>
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
                                                        <label
                                                            class="form-label">@lang('modules/partner.f_r4id')</label>
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
                                                        <label
                                                            class="form-label">@lang('modules/partner.f_r5id')</label>
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
                                                            class="form-label">@lang('modules/partner.f_departmentid')</label>
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
                                                            class="form-label">@lang('modules/partner.f_personid')</label>
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
                                                            class="form-label">@lang('modules/partner.f_projectid')</label>
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
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab-2" role="tabpanel">
                                            <div class="row">
                                                <div class="col-12 col-xl-3">
                                                    <div class="mb-2">
                                                        <label
                                                            class="form-label">@lang('modules/partner.f_f1')</label>
                                                        <input type="text"
                                                               class="form-control form-control-sm @error('f_f1') is-invalid @enderror"
                                                               name="f_f1"
                                                               maxlength="1000"
                                                               value="{{ old('f_f1')}}">
                                                        @error('f_f1') <span class="invalid-feedback"
                                                                             role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label
                                                            class="form-label">@lang('modules/partner.f_f2')</label>
                                                        <input type="text"
                                                               class="form-control form-control-sm @error('f_f2') is-invalid @enderror"
                                                               name="f_f2"
                                                               maxlength="1000"
                                                               value="{{ old('f_f2')}}">
                                                        @error('f_f2') <span class="invalid-feedback"
                                                                             role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label
                                                            class="form-label">@lang('modules/partner.f_f3')</label>
                                                        <input type="text"
                                                               class="form-control form-control-sm @error('f_f3') is-invalid @enderror"
                                                               name="f_f3"
                                                               maxlength="1000"
                                                               value="{{ old('f_f3')}}">
                                                        @error('f_f3') <span class="invalid-feedback"
                                                                             role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label
                                                            class="form-label">@lang('modules/partner.f_f4')</label>
                                                        <input type="text"
                                                               class="form-control form-control-sm @error('f_f4') is-invalid @enderror"
                                                               name="f_f4"
                                                               maxlength="1000"
                                                               value="{{ old('f_f4')}}">
                                                        @error('f_f4') <span class="invalid-feedback"
                                                                             role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label
                                                            class="form-label">@lang('modules/partner.f_f5')</label>
                                                        <input type="text"
                                                               class="form-control form-control-sm @error('f_f5') is-invalid @enderror"
                                                               name="f_f5"
                                                               maxlength="1000"
                                                               value="{{ old('f_f5')}}">
                                                        @error('f_f5') <span class="invalid-feedback"
                                                                             role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label
                                                            class="form-label">@lang('modules/partner.f_sex')</label>
                                                        <select
                                                            class="form-control form-control-sm @error('f_sex') is-invalid @enderror"
                                                            name="f_sex">
                                                            @foreach($sexTypes as $type)
                                                                <option
                                                                    value="{{ $type }}" {{ selected('f_sex', $type) }}>@lang('modules/partner.sex_type' . $type)</option>
                                                            @endforeach
                                                        </select>
                                                        @error('f_sex') <span class="invalid-feedback"
                                                                              role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label
                                                            class="form-label">@lang('modules/partner.f_birthday')</label>
                                                        <input
                                                            type="text"
                                                            class="form-control form-control-sm date"
                                                            name="f_birthday"
                                                            placeholder="@lang('global.select_date')"
                                                            value="{{ old('f_birthday') }}">
                                                        @error('f_birthday') <span class="invalid-feedback"
                                                                                   role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label
                                                            class="form-label">@lang('modules/partner.f_country')</label>
                                                        <input type="text"
                                                               class="form-control form-control-sm @error('f_country') is-invalid @enderror"
                                                               name="f_country"
                                                               maxlength="1000"
                                                               value="{{ old('f_country')}}">
                                                        @error('f_country') <span class="invalid-feedback"
                                                                                  role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12 col-xl-3">
                                                    <div class="mb-2">
                                                        <label class="form-check m-0">
                                                            <span
                                                                class="form-check-label">@lang('modules/partner.f_mark1')</span>
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
                                                                class="form-check-label">@lang('modules/partner.f_mark2')</span>
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
                                                                class="form-check-label">@lang('modules/partner.f_mark3')</span>
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
                                                                class="form-check-label">@lang('modules/partner.f_mark4')</span>
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
                                                                class="form-check-label">@lang('modules/partner.f_mark5')</span>
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
                                                                class="form-check-label">@lang('modules/partner.f_notgenerate_sale_price')</span>
                                                            <input type="hidden" name="f_notgenerate_sale_price"
                                                                   value="0">
                                                            <input type="checkbox" name="f_notgenerate_sale_price"
                                                                   class="form-check-input @error('f_notgenerate_sale_price') is-invalid @enderror"
                                                                   value="{{ old('f_notgenerate_sale_price', 1) }}" {{ old('f_notgenerate_sale_price') == 1 ? 'checked' : '' }}>
                                                        </label>
                                                        @error('f_notgenerate_sale_price') <span
                                                            class="invalid-feedback"
                                                            role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label class="form-check m-0">
                                                            <span
                                                                class="form-check-label">@lang('modules/partner.f_notgenerate_purch_price')</span>
                                                            <input type="hidden" name="f_notgenerate_purch_price"
                                                                   value="0">
                                                            <input type="checkbox" name="f_notgenerate_purch_price"
                                                                   class="form-check-input @error('f_notgenerate_purch_price') is-invalid @enderror"
                                                                   value="{{ old('f_notgenerate_purch_price', 1) }}" {{ old('f_notgenerate_purch_price') == 1 ? 'checked' : '' }}>
                                                        </label>
                                                        @error('f_notgenerate_purch_price') <span
                                                            class="invalid-feedback"
                                                            role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label class="form-check m-0">
                                                            <span
                                                                class="form-check-label">@lang('modules/partner.f_send_on_increase')</span>
                                                            <input type="hidden" name="f_send_on_increase" value="0">
                                                            <input type="checkbox" name="f_send_on_increase"
                                                                   class="form-check-input @error('f_send_on_increase') is-invalid @enderror"
                                                                   value="{{ old('f_send_on_increase', 1) }}" {{ old('f_send_on_increase') == 1 ? 'checked' : '' }}>
                                                        </label>
                                                        @error('f_send_on_increase') <span class="invalid-feedback"
                                                                                           role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label class="form-check m-0">
                                                            <span
                                                                class="form-check-label">@lang('modules/partner.f_send_on_decrease')</span>
                                                            <input type="hidden" name="f_send_on_decrease" value="0">
                                                            <input type="checkbox" name="f_send_on_decrease"
                                                                   class="form-check-input @error('f_send_on_decrease') is-invalid @enderror"
                                                                   value="{{ old('f_send_on_decrease', 1) }}" {{ old('f_send_on_decrease') == 1 ? 'checked' : '' }}>
                                                        </label>
                                                        @error('f_send_on_decrease') <span class="invalid-feedback"
                                                                                           role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label class="form-check m-0">
                                                            <span
                                                                class="form-check-label">@lang('modules/partner.f_send_weekly')</span>
                                                            <input type="hidden" name="f_send_weekly" value="0">
                                                            <input type="checkbox" name="f_send_weekly"
                                                                   class="form-check-input @error('f_send_weekly') is-invalid @enderror"
                                                                   value="{{ old('f_send_weekly', 1) }}" {{ old('f_send_weekly') == 1 ? 'checked' : '' }}>
                                                        </label>
                                                        @error('f_send_weekly') <span class="invalid-feedback"
                                                                                      role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label class="form-check m-0">
                                                            <span
                                                                class="form-check-label">@lang('modules/partner.f_direct_debit')</span>
                                                            <input type="hidden" name="f_direct_debit" value="0">
                                                            <input type="checkbox" name="f_direct_debit"
                                                                   class="form-check-input @error('f_direct_debit') is-invalid @enderror"
                                                                   value="{{ old('f_direct_debit', 1) }}" {{ old('f_direct_debit') == 1 ? 'checked' : '' }}>
                                                        </label>
                                                        @error('f_direct_debit') <span class="invalid-feedback"
                                                                                       role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label class="form-check m-0">
                                                            <span
                                                                class="form-check-label">@lang('modules/partner.f_pay_in_cash')</span>
                                                            <input type="hidden" name="f_pay_in_cash" value="0">
                                                            <input type="checkbox" name="f_pay_in_cash"
                                                                   class="form-check-input @error('f_pay_in_cash') is-invalid @enderror"
                                                                   value="{{ old('f_pay_in_cash', 1) }}" {{ old('f_pay_in_cash') == 1 ? 'checked' : '' }}>
                                                        </label>
                                                        @error('f_pay_in_cash') <span class="invalid-feedback"
                                                                                      role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label class="form-check m-0">
                                                            <span
                                                                class="form-check-label">@lang('modules/partner.f_use_pay_days')</span>
                                                            <input type="hidden" name="f_use_pay_days" value="0">
                                                            <input type="checkbox" name="f_use_pay_days"
                                                                   class="form-check-input @error('f_use_pay_days') is-invalid @enderror"
                                                                   value="{{ old('f_use_pay_days', 1) }}" {{ old('f_use_pay_days') == 1 ? 'checked' : '' }}>
                                                        </label>
                                                        @error('f_use_pay_days') <span class="invalid-feedback"
                                                                                       role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12 col-xl-3">
                                                    <div class="mb-2">
                                                        <label
                                                            class="form-label">@lang('modules/partner.f_direct_debit_bank')</label>
                                                        <select
                                                            class="form-control form-control-sm @error('f_direct_debit_bank') is-invalid @enderror"
                                                            name="f_direct_debit_bank">
                                                            <option value selected>---</option>
                                                            @foreach($banks as $bank)
                                                                <option
                                                                    value="{{ $bank->f_id }}" {{ selected('f_direct_debit_bank', $bank->f_id) }}>{{ $bank->f_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('f_direct_debit_bank') <span class="invalid-feedback"
                                                                                            role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label
                                                            class="form-label">@lang('modules/partner.f_direct_debit_code')</label>
                                                        <input type="text"
                                                               class="form-control form-control-sm @error('f_direct_debit_code') is-invalid @enderror"
                                                               name="f_direct_debit_code"
                                                               maxlength="20"
                                                               value="{{ old('f_direct_debit_code')}}">
                                                        @error('f_direct_debit_code') <span class="invalid-feedback"
                                                                                            role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label
                                                            class="form-label">@lang('modules/partner.f_direct_debit_no')</label>
                                                        <input type="text"
                                                               class="form-control form-control-sm @error('f_direct_debit_no') is-invalid @enderror"
                                                               name="f_direct_debit_no"
                                                               maxlength="20"
                                                               value="{{ old('f_direct_debit_no')}}">
                                                        @error('f_direct_debit_no') <span class="invalid-feedback"
                                                                                          role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label
                                                            class="form-label">@lang('modules/partner.f_act_url')</label>
                                                        <input type="text"
                                                               class="form-control form-control-sm @error('f_act_url') is-invalid @enderror"
                                                               name="f_act_url"
                                                               maxlength="100"
                                                               value="{{ old('f_act_url')}}">
                                                        @error('f_act_url') <span class="invalid-feedback"
                                                                                  role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label
                                                            class="form-label">@lang('modules/partner.f_direct_debit_limit')</label>
                                                        <input type="text"
                                                               class="form-control form-control-sm @error('f_direct_debit_limit') is-invalid @enderror"
                                                               name="f_direct_debit_limit"
                                                               maxlength="15"
                                                               value="{{ old('f_direct_debit_limit', '0.00')}}">
                                                        @error('f_direct_debit_limit') <span class="invalid-feedback"
                                                                                             role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label
                                                            class="form-label">@lang('modules/partner.f_edi_export')</label>
                                                        <select
                                                            class="form-control form-control-sm @error('f_edi_export') is-invalid @enderror"
                                                            name="f_edi_export">
                                                            @foreach($ediExportTypes as $type)
                                                                <option
                                                                    value="{{ $type }}" {{ selected('f_edi_export', $type) }}>@lang('modules/partner.edi_export_type' . $type)</option>
                                                            @endforeach
                                                        </select>
                                                        @error('f_edi_export') <span class="invalid-feedback"
                                                                                     role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                </div>
                                                <div class="col-12 col-xl-3">
                                                    <div class="mb-2">
                                                        <label
                                                            class="form-label">@lang('modules/partner.f_direct_debit_date1')</label>
                                                        <input
                                                            type="text"
                                                            class="form-control form-control-sm date"
                                                            name="f_direct_debit_date1"
                                                            placeholder="@lang('global.select_date')"
                                                            value="{{ old('f_direct_debit_date1') }}">
                                                        @error('f_direct_debit_date1') <span class="invalid-feedback"
                                                                                             role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label
                                                            class="form-label">@lang('modules/partner.f_direct_debit_date2')</label>
                                                        <input
                                                            type="text"
                                                            class="form-control form-control-sm date"
                                                            name="f_direct_debit_date2"
                                                            placeholder="@lang('global.select_date')"
                                                            value="{{ old('f_direct_debit_date2') }}">
                                                        @error('f_direct_debit_date2') <span class="invalid-feedback"
                                                                                             role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label
                                                            class="form-label">@lang('modules/partner.f_iln_edisoft')</label>
                                                        <input type="text"
                                                               class="form-control form-control-sm @error('f_iln_edisoft') is-invalid @enderror"
                                                               name="f_iln_edisoft"
                                                               maxlength="20"
                                                               value="{{ old('f_iln_edisoft')}}">
                                                        @error('f_iln_edisoft') <span class="invalid-feedback"
                                                                                      role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label
                                                            class="form-label">@lang('modules/partner.f_edi_storeid')</label>
                                                        <select
                                                            class="form-control form-control-sm @error('f_edi_storeid') is-invalid @enderror"
                                                            name="f_edi_storeid">
                                                            <option value selected>---</option>
                                                            @foreach($stores as $store)
                                                                <option
                                                                    value="{{ $store->f_id }}" {{ selected('f_edi_storeid', $store->f_id) }}>{{ $store->f_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('f_edi_storeid') <span class="invalid-feedback"
                                                                                      role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label
                                                            class="form-label">@lang('modules/partner.f_edi_delivery_iln')</label>
                                                        <input type="text"
                                                               class="form-control form-control-sm @error('f_edi_delivery_iln') is-invalid @enderror"
                                                               name="f_edi_delivery_iln"
                                                               maxlength="20"
                                                               value="{{ old('f_edi_delivery_iln')}}">
                                                        @error('f_edi_delivery_iln') <span class="invalid-feedback"
                                                                                           role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label
                                                            class="form-label">@lang('modules/partner.f_templateid')</label>
                                                        <select
                                                            class="form-control form-control-sm @error('f_templateid') is-invalid @enderror"
                                                            name="f_templateid">
                                                            <option value selected>---</option>
                                                            @foreach($stores as $store)
                                                                <option
                                                                    value="{{ $store->f_id }}" {{ selected('f_templateid', $store->f_id) }}>{{ $store->f_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('f_templateid') <span class="invalid-feedback"
                                                                                     role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <label
                                                            class="form-label">@lang('modules/partner.f_templateid2')</label>
                                                        <select
                                                            class="form-control form-control-sm @error('f_templateid2') is-invalid @enderror"
                                                            name="f_templateid2">
                                                            <option value selected>---</option>
                                                            @foreach($stores as $store)
                                                                <option
                                                                    value="{{ $store->f_id }}" {{ selected('f_templateid2', $store->f_id) }}>{{ $store->f_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('f_templateid2') <span class="invalid-feedback"
                                                                                      role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab-3" role="tabpanel">3</div>
                                        <div class="tab-pane fade" id="tab-4" role="tabpanel">4</div>
                                        <div class="tab-pane fade" id="tab-5" role="tabpanel">5</div>
                                        <div class="tab-pane fade" id="tab-6" role="tabpanel">6</div>
                                        <div class="tab-pane fade" id="tab-7" role="tabpanel">
                                            <div class="row">
                                                <div class="col-auto text-end mt-1">
                                                    <button
                                                        form="partner-form"
                                                        class="btn btn-primary"
                                                        type="submit"
                                                        name="action"
                                                        value="bank-account-create">
                                                        <i class="fas fa-plus"></i> @lang('global.btn_new')
                                                    </button>
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
