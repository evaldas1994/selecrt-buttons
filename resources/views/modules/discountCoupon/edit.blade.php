@extends('layouts.app')

@section('content')
    <div>
        <div class="row mb-2">
            <div class="col-auto">
                <h1>@lang('modules/discountCoupon.h1')</h1>
            </div>

            <div class="col-auto ms-auto text-end mt-n1">
                <x-form-elements.button
                    form="discount_coupon_edit_form"
                    class="btn-primary"
                    text="global.btn_save"
                />

                <x-form-elements.button
                    form="discount_coupon_edit_form"
                    class="btn-dark"
                    name="button-action-without-validation"
                    value="close"
                    text="global.btn_close"
                />
            </div>
        </div>
        <div class="row">
            <form id="discount_coupon_edit_form"
                  name="discount_coupon_edit_form"
                  action="{{ route('discount-coupons.update', $discountCoupon) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-6 col-xl-3">
                                <x-form-elements.input-id
                                    name="f_id"
                                    labelValue="modules/discountCoupon.f_id"
                                    inputClass="not-empty"
                                    wireModel="f_id"
                                    :defaultValue="$discountCoupon->f_id"
                                />

                                <x-form-elements.input-date
                                    name="f_activation_date"
                                    labelValue="modules/discountCoupon.f_activation_date"
                                    :defaultValue="$discountCoupon->f_activation_date"
                                />

                                <x-form-elements.checkbox-boolean
                                    name="f_active"
                                    labelValue="modules/discountCoupon.f_active"
                                    :defaultValue="$discountCoupon->f_active"
                                />
                            </div>
                            <div class="col-12 col-md-6 col-xl-3">
                                <x-form-elements.input
                                    name="f_activation_docno"
                                    labelValue="modules/discountCoupon.f_activation_docno"
                                    maxLength="20"
                                    readonly="readonly"
                                    :defaultValue="$discountCoupon->f_activation_docno"
                                />

                                <x-form-elements.input
                                    name="f_activation_partnerid"
                                    labelValue="modules/discountCoupon.f_activation_partnerid"
                                    maxLength="20"
                                    readonly="readonly"
                                    :defaultValue="$discountCoupon->f_activation_partnerid"
                                />

                                <x-form-elements.input
                                    name="f_activation_storeid"
                                    labelValue="modules/discountCoupon.f_activation_storeid"
                                    maxLength="15"
                                    readonly="readonly"
                                    :defaultValue="$discountCoupon->f_activation_storeid"
                                />
                            </div>
                            <div class="col-12 col-md-6 col-xl-3">
                                <x-form-elements.input
                                    name="f_nominal"
                                    labelValue="modules/discountCoupon.f_nominal"
                                    maxLength="20"
                                    :defaultValue="$discountCoupon->f_nominal"
                                />

                                <x-form-elements.input-date
                                    name="f_sale_date"
                                    labelValue="modules/discountCoupon.f_sale_date"
                                    :defaultValue="$discountCoupon->f_sale_date"
                                />

                                <x-form-elements.input
                                    name="f_sale_docno"
                                    labelValue="modules/discountCoupon.f_sale_docno"
                                    maxLength="20"
                                    :defaultValue="$discountCoupon->f_sale_docno"
                                />

                                <x-form-elements.input
                                    name="f_valid_days"
                                    labelValue="modules/discountCoupon.f_valid_days"
                                    :defaultValue="$discountCoupon->f_valid_days"
                                />
                            </div>
                            <div class="col-12 col-md-6 col-xl-3">
                                <x-form-elements.input
                                    name="f_sale_partnerid"
                                    labelValue="modules/discountCoupon.f_sale_partnerid"
                                    maxLength="20"
                                    readonly="readonly"
                                    :defaultValue="$discountCoupon->f_sale_partnerid"
                                />

                                <x-form-elements.input
                                    name="f_sale_storeid"
                                    labelValue="modules/discountCoupon.f_sale_storeid"
                                    maxLength="20"
                                    readonly="readonly"
                                    :defaultValue="$discountCoupon->f_sale_storeid"
                                />

                                <x-form-elements.input
                                    name="f_sale_sum"
                                    labelValue="modules/discountCoupon.f_sale_sum"
                                    maxLength="20"
                                    readonly="readonly"
                                    :defaultValue="$discountCoupon->f_sale_sum"
                                />

                                <x-form-elements.input-date
                                    name="f_valid_till"
                                    labelValue="modules/discountCoupon.f_valid_till"
                                    disabled="disabled"
                                    :defaultValue="$discountCoupon->f_valid_till"
                                />
                            </div>
                            <div class="col-12 col-md-6 col-xl-3">
                                <x-form-elements.input
                                    name="f_system1"
                                    labelValue="modules/discountCoupon.f_system1"
                                    maxLength="100"
                                    hidden="hidden"
                                    :defaultValue="$discountCoupon->f_system1"
                                />

                                <x-form-elements.input
                                    name="f_system2"
                                    labelValue="modules/discountCoupon.f_system2"
                                    maxLength="100"
                                    hidden="hidden"
                                    :defaultValue="$discountCoupon->f_system2"
                                />

                                <x-form-elements.input
                                    name="f_system3"
                                    labelValue="modules/discountCoupon.f_system3"
                                    maxLength="100"
                                    hidden="hidden"
                                    :defaultValue="$discountCoupon->f_system3"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
