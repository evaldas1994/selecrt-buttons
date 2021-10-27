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
        <div class="card">
            <div class="col-12 col-xl-4">
                <div class="card-body">
                    <form id="partner-form" action="{{ route('partners.update', $partner) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/partner.f_id')</label>
                            <input type="text"
                                   class="not-empty form-control form-control-sm @error('f_id') is-invalid @enderror"
                                   name="f_id"
                                   id-pattern
                                   placeholder="@lang('modules/partner.f_id')"
                                   required
                                   maxlength="20"
                                   value="{{ old('f_id', $partner->f_id)}}">
                            @error('f_id') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/partner.f_name')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_name') is-invalid @enderror"
                                   name="f_name"
                                   placeholder="@lang('modules/partner.f_name')"
                                   maxlength="100"
                                   value="{{ old('f_name', $partner->f_name)}}">
                            @error('f_name') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/partner.f_name2')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_name2') is-invalid @enderror"
                                   name="f_name2"
                                   placeholder="@lang('modules/partner.f_name2')"
                                   maxlength="100"
                                   value="{{ old('f_name2', $partner->f_name2)}}">
                            @error('f_name2') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/partner.f_groupid')</label>
                            <select class="form-control form-control-sm @error('f_groupid') is-invalid @enderror" name="f_groupid">
                                <option value selected>---</option>
                                @foreach($partnerGroups as $group)
                                    <option value="{{ $group->f_id }}" {{ selected('f_groupid', $group->f_id, $partner->f_groupid) }}>{{ $group->f_name }}</option>
                                @endforeach
                            </select>
                            @error('f_groupid') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/partner.f_code')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_code') is-invalid @enderror"
                                   name="f_code"
                                   placeholder="@lang('modules/partner.f_code')"
                                   maxlength="20"
                                   value="{{ old('f_code', $partner->f_code)}}">
                            @error('f_code') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/partner.f_vat_code')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_vat_code') is-invalid @enderror"
                                   name="f_vat_code"
                                   placeholder="@lang('modules/partner.f_vat_code')"
                                   maxlength="20"
                                   value="{{ old('f_vat_code', $partner->f_vat_code)}}">
                            @error('f_vat_code') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/partner.f_person')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_person') is-invalid @enderror"
                                   name="f_person"
                                   placeholder="@lang('modules/partner.f_person')"
                                   maxlength="100"
                                   value="{{ old('f_person', $partner->f_person)}}">
                            @error('f_person') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/partner.f_post')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_post') is-invalid @enderror"
                                   name="f_post"
                                   placeholder="@lang('modules/partner.f_post')"
                                   maxlength="100"
                                   value="{{ old('f_post', $partner->f_post)}}">
                            @error('f_post') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/partner.f_phone')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_phone') is-invalid @enderror"
                                   name="f_phone"
                                   placeholder="@lang('modules/partner.f_phone')"
                                   maxlength="100"
                                   value="{{ old('f_phone', $partner->f_phone)}}">
                            @error('f_phone') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/partner.f_fax')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_fax') is-invalid @enderror"
                                   name="f_fax"
                                   placeholder="@lang('modules/partner.f_fax')"
                                   maxlength="100"
                                   value="{{ old('f_fax', $partner->f_fax)}}">
                            @error('f_fax') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/partner.f_email')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_email') is-invalid @enderror"
                                   name="f_email"
                                   placeholder="@lang('modules/partner.f_email')"
                                   maxlength="100"
                                   value="{{ old('f_email', $partner->f_email)}}">
                            @error('f_email') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/partner.f_address')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_address') is-invalid @enderror"
                                   name="f_address"
                                   placeholder="@lang('modules/partner.f_address')"
                                   maxlength="100"
                                   value="{{ old('f_address', $partner->f_address)}}">
                            @error('f_address') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/partner.f_curid')</label>
                            <select class="form-control form-control-sm @error('f_curid') is-invalid @enderror" name="f_curid">
                                <option value selected>---</option>
                                @foreach($currencies as $currency)
                                    <option value="{{ $currency->f_id }}" {{ selected('f_curid', $currency->f_id, $partner->f_curid) }}>{{ $currency->f_name }}</option>
                                @endforeach
                            </select>
                            @error('f_curid') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/partner.f_credit')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_credit') is-invalid @enderror"
                                   name="f_credit"
                                   placeholder="@lang('modules/partner.f_credit')"
                                   maxlength="15"
                                   value="{{ old('f_credit', $partner->f_credit)}}">
                            @error('f_credit') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/partner.f_pay_days')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_pay_days') is-invalid @enderror"
                                   name="f_pay_days"
                                   placeholder="@lang('modules/partner.f_pay_days')"
                                   maxlength="255"
                                   value="{{ old('f_pay_days', $partner->f_pay_days)}}">
                            @error('f_pay_days') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/partner.f_price_level')</label>
                            <select class="form-control form-control-sm @error('f_price_level') is-invalid @enderror" name="f_price_level">
                                @foreach($priceLevels as $level)
                                    <option value="{{ $level }}" {{ selected('f_price_level', $level, $partner->f_price_level) }}>@lang('modules/partner.price_level_type' . $level)</option>
                                @endforeach
                            </select>
                            @error('f_price_level') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/partner.f_partnerid')</label>
                            <select class="form-control form-control-sm @error('f_partnerid') is-invalid @enderror" name="f_partnerid">
                                <option value selected>---</option>
                                @foreach($partners as $singlePartner)
                                    <option value="{{ $singlePartner->f_id }}" {{ selected('f_partnerid', $singlePartner->f_id, $partner->f_partnerid) }}>{{ $singlePartner->f_name }}</option>
                                @endforeach
                            </select>
                            @error('f_partnerid') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/partner.f_accountid1')</label>
                            <select class="form-control form-control-sm @error('f_accountid1') is-invalid @enderror" name="f_accountid1">
                                <option value selected>---</option>

                                @foreach($accounts as $account)
                                    <option value="{{ $account->f_id }}" {{ selected('f_accountid1', $account->f_id, $partner->f_accountid1) }}>{{ $account->f_name }}</option>
                                @endforeach
                            </select>
                            @error('f_accountid1') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/partner.f_accountid2')</label>
                            <select class="form-control form-control-sm @error('f_accountid2') is-invalid @enderror" name="f_accountid2">
                                <option value selected>---</option>
                                @foreach($accounts as $account)
                                    <option value="{{ $account->f_id }}" {{ selected('f_accountid2', $account->f_id, $partner->f_accountid2) }}>{{ $account->f_name }}</option>
                                @endforeach
                            </select>
                            @error('f_accountid2') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/partner.f_messagegroupid')</label>
                            <select class="form-control form-control-sm @error('f_messagegroupid') is-invalid @enderror" name="f_messagegroupid">
                                <option value selected>---</option>
                                @foreach($messageGroups as $group)
                                    <option value="{{ $group->f_id }}" {{ selected('f_messagegroupid', $group->f_id, $partner->f_messagegroupid) }}>{{ $group->f_name }}</option>
                                @endforeach
                            </select>
                            @error('f_messagegroupid') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/partner.f_discount_card')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_discount_card') is-invalid @enderror"
                                   name="f_discount_card"
                                   placeholder="@lang('modules/partner.f_discount_card')"
                                   maxlength="255"
                                   value="{{ old('f_discount_card', $partner->f_discount_card)}}">
                            @error('f_discount_card') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-check m-0">
                                <span class="form-check-label">@lang('modules/partner.f_discount_card_active')</span>
                                <input type="hidden" name="f_discount_card_active" value="0">
                                <input type="checkbox" name="f_discount_card_active" class="form-check-input @error('f_discount_card_active') is-invalid @enderror" value="{{ old('f_discount_card_active', 1) }}"  {{ old('f_discount_card_active', $partner->f_discount_card_active) == 1 ? 'checked' : '' }}>
                            </label>
                            @error('f_discount_card_active') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/partner.f_discount_card_balance')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_discount_card_balance') is-invalid @enderror"
                                   name="f_discount_card_balance"
                                   placeholder="@lang('modules/partner.f_discount_card_balance')"
                                   maxlength="15"
                                   value="{{ old('f_discount_card_balance', $partner->f_discount_card_balance)}}">
                            @error('f_discount_card_balance') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/partner.f_discount_card_balance2')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_discount_card_balance2') is-invalid @enderror"
                                   name="f_discount_card_balance2"
                                   placeholder="@lang('modules/partner.f_discount_card_balance2')"
                                   maxlength="15"
                                   value="{{ old('f_discount_card_balance2', $partner->f_discount_card_balance2)}}">
                            @error('f_discount_card_balance2') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/partner.f_discount_card_balance3')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_discount_card_balance3') is-invalid @enderror"
                                   name="f_discount_card_balance3"
                                   placeholder="@lang('modules/partner.f_discount_card_balance3')"
                                   maxlength="15"
                                   value="{{ old('f_discount_card_balance3', $partner->f_discount_card_balance3)}}"
                                   disabled>
                            @error('f_discount_card_balance3') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/partner.f_discount_card_balance3_date')</label>
                            <input
                                type="text"
                                class="form-control form-control-sm date"
                                name="f_discount_card_balance3_date"
                                placeholder="@lang('global.select_date')"
                                value="{{ old('f_discount_card_balance3_date', $partner->f_discount_card_balance3_date) }}">
                            @error('f_discount_card_balance3_date') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/partner.f_vatid')</label>
                            <select class="form-control form-control-sm @error('f_vatid') is-invalid @enderror" name="f_vatid">
                                <option value selected>---</option>
                                @foreach($vats as $vat)
                                    <option value="{{ $vat->f_id }}" {{ selected('f_vatid', $vat->f_id, $partner->f_vatid) }}>{{ $vat->f_name }}</option>
                                @endforeach
                            </select>
                            @error('f_vatid') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/partner.f_legal_status')</label>
                            <select class="form-control form-control-sm @error('f_legal_status') is-invalid @enderror" name="f_legal_status">
                                @foreach($legalStatuses as $status)
                                    <option value="{{ $status }}" {{ selected('f_legal_status', $status, $partner->f_legal_status) }}>{{ $status }}</option>
                                @endforeach
                            </select>
                            @error('f_legal_status') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-check m-0">
                                <span class="form-check-label">@lang('modules/partner.f_buyer')</span>
                                <input type="hidden" name="f_buyer" value="0">
                                <input type="checkbox" name="f_buyer" class="form-check-input @error('f_buyer') is-invalid @enderror" value="{{ old('f_buyer', 1) }}"  {{ old('f_buyer', $partner->f_buyer) == 1 ? 'checked' : '' }}>
                            </label>
                            @error('f_buyer') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-check m-0">
                                <span class="form-check-label">@lang('modules/partner.f_seller')</span>
                                <input type="hidden" name="f_seller" value="0">
                                <input type="checkbox" name="f_seller" class="form-check-input @error('f_seller') is-invalid @enderror" value="{{ old('f_seller', 1) }}"  {{ old('f_seller', $partner->f_seller) == 1 ? 'checked' : '' }}>
                            </label>
                            @error('f_seller') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-check m-0">
                                <span class="form-check-label">@lang('modules/partner.f_locked')</span>
                                <input type="hidden" name="f_locked" value="0">
                                <input type="checkbox" name="f_locked" class="form-check-input @error('f_locked') is-invalid @enderror" value="{{ old('f_locked', 1) }}"  {{ old('f_locked', $partner->f_locked) == 1 ? 'checked' : '' }}>
                            </label>
                            @error('f_locked') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/partner.f_r1id')</label>
                            <select class="form-control form-control-sm @error('f_r1id') is-invalid @enderror" name="f_r1id">
                                <option value selected>---</option>
                                @foreach($registers1 as $register)
                                    <option value="{{ $register->f_id }}" {{ selected('f_r1id', $register->f_id, $partner->f_r1id) }}>{{ $register->f_name }}</option>
                                @endforeach
                            </select>
                            @error('f_r1id') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/partner.f_r2id')</label>
                            <select class="form-control form-control-sm @error('f_r2id') is-invalid @enderror" name="f_r2id">
                                <option value selected>---</option>
                                @foreach($registers2 as $register)
                                    <option value="{{ $register->f_id }}" {{ selected('f_r2id', $register->f_id, $partner->f_r2id) }}>{{ $register->f_name }}</option>
                                @endforeach
                            </select>
                            @error('f_r2id') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/partner.f_r3id')</label>
                            <select class="form-control form-control-sm @error('f_r3id') is-invalid @enderror" name="f_r3id">
                                <option value selected>---</option>
                                @foreach($registers3 as $register)
                                    <option value="{{ $register->f_id }}" {{ selected('f_r3id', $register->f_id, $partner->f_r3id) }}>{{ $register->f_name }}</option>
                                @endforeach
                            </select>
                            @error('f_r3id') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/partner.f_r4id')</label>
                            <select class="form-control form-control-sm @error('f_r4id') is-invalid @enderror" name="f_r4id">
                                <option value selected>---</option>
                                @foreach($registers4 as $register)
                                    <option value="{{ $register->f_id }}" {{ selected('f_r4id', $register->f_id, $partner->f_r4id) }}>{{ $register->f_name }}</option>
                                @endforeach
                            </select>
                            @error('f_r4id') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/partner.f_r5id')</label>
                            <select class="form-control form-control-sm @error('f_r5id') is-invalid @enderror" name="f_r5id">
                                <option value selected>---</option>
                                @foreach($registers5 as $register)
                                    <option value="{{ $register->f_id }}" {{ selected('f_r5id', $register->f_id, $partner->f_r5id) }}>{{ $register->f_name }}</option>
                                @endforeach
                            </select>
                            @error('f_r5id') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/partner.f_departmentid')</label>
                            <select class="form-control form-control-sm @error('f_departmentid') is-invalid @enderror" name="f_departmentid">
                                <option value selected>---</option>
                                @foreach($departments as $department)
                                    <option value="{{ $department->f_id }}" {{ selected('f_departmentid', $department->f_id, $partner->f_departmentid) }}>{{ $department->f_name }}</option>
                                @endforeach
                            </select>
                            @error('f_departmentid') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/partner.f_personid')</label>
                            <select class="form-control form-control-sm @error('f_personid') is-invalid @enderror" name="f_personid">
                                <option value selected>---</option>
                                @foreach($persons as $person)
                                    <option value="{{ $person->f_id }}" {{ selected('f_personid', $person->f_id, $partner->f_personid) }}>{{ $person->f_name }}</option>
                                @endforeach
                            </select>
                            @error('f_personid') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/partner.f_projectid')</label>
                            <select class="form-control form-control-sm @error('f_projectid') is-invalid @enderror" name="f_projectid">
                                <option value selected>---</option>
                                @foreach($projects as $project)
                                    <option value="{{ $project->f_id }}" {{ selected('f_projectid', $project->f_id, $partner->f_projectid) }}>{{ $project->f_name }}</option>
                                @endforeach
                            </select>
                            @error('f_projectid') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
