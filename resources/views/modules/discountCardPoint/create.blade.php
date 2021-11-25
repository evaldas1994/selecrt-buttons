@extends('layouts.app')

@section('content')
        <div class="row mb-2">
            <div class="col-auto">
                <h1>@lang('modules/discountCardPoint.h1')</h1>
            </div>

            <div class="col-auto ms-auto text-end mt-n1">
                <x-form-elements.button
                    form="discount_card_points_create_form"
                    class="btn-primary"
                    text="global.btn_save"
                />

                <x-form-elements.button
                    form="discount_card_points_create_form"
                    class="btn-dark"
                    name="button-action-without-validation"
                    value="close"
                    text="global.btn_close"
                />
            </div>
        </div>
        <div class="row">
            <div class="col-12">
            <form id="discount_card_points_create_form"
                  name="discount_card_points_create_form"
                  action="{{ route('discount-card-points.store', $partner) }}" method="POST">
                @csrf

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-6 col-xl-3">
                                <x-form-elements.select-array
                                    :items="$types"
                                    name="f_type"
                                    labelValue="modules/discountCardPoint.f_type"
                                    selectValue="modules/discountCardPoint.type"
                                />
                            </div>
                            <div class="col-12 col-md-6 col-xl-3">
                                <x-form-elements.input
                                    name="f_discount_card"
                                    labelValue="modules/discountCardPoint.f_discount_card"
                                    inputClass="not-empty"
                                    maxLength="20"
                                />
                            </div>
                            <div class="col-12 col-md-6 col-xl-3">
                                <x-form-elements.input
                                    name="f_points"
                                    labelValue="modules/discountCardPoint.f_points"
                                    inputClass="not-empty"
                                    maxLength="15"
                                    defaultValue="0.0000"
                                />
                            </div>
                            <div class="col-12 col-md-6 col-xl-3">
                                <x-form-elements.input
                                    name="f_system1"
                                    labelValue="modules/discountCardPoint.f_system1"
                                    maxLength="100"
                                    hidden="hidden"
                                />

                                <x-form-elements.input
                                    name="f_system2"
                                    labelValue="modules/discountCardPoint.f_system2"
                                    maxLength="100"
                                    hidden="hidden"
                                />

                                <x-form-elements.input
                                    name="f_system3"
                                    labelValue="modules/discountCardPoint.f_system3"
                                    maxLength="100"
                                    hidden="hidden"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            </div>
        </div>
@endsection
