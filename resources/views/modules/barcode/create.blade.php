@extends('layouts.app')

@section('content')
    <div class="row mb-2">
        <div class="col-auto">
            <h1>@lang('modules/barcode.h1')</h1>
        </div>

        <div class="col-auto ms-auto text-end mt-n1">
            <x-form-elements.button
                form="barcode-form"
                class="btn-primary"
                text="global.btn_save"
            />
            <x-form-elements.button
                form="barcode-form"
                class="btn-dark"
                name="button-action"
                value="close"
                text="global.btn_close"
            />
        </div>
    </div>

    <div class="row">
        <form id="barcode-form" action="{{ route('barcodes.store') }}" method="POST">
            @csrf

            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-6 col-xl-3">
                            <x-form-elements.input-id
                                name="f_id"
                                labelValue="modules/barcode.f_id"
                                maxLength="40"
                                inputClass="not-empty"
                            />

                            <x-form-elements.select-with-button
                                :items="$stocks"
                                name="f_stockid"
                                labelValue="modules/barcode.f_stockid"
                                selectClass="not-empty"
                                buttonName="button-action"
                                buttonValue="select-stock"
                                buttonClass="input-group-text"
                            />

                            <x-form-elements.checkbox-boolean
                                name="f_default"
                                labelValue="modules/barcode.f_default"
                            />
                        </div>
                        <div class="col-12 col-md-6 col-xl-3">
                            <x-form-elements.input
                                name="f_ratio"
                                labelValue="modules/barcode.f_ratio"
                                inputClass="not-empty"
                                maxLength="15"
                                defaultValue="1.0000"
                            />

                            <x-form-elements.select-with-button
                                :items="$stocks"
                                name="f_usadid"
                                labelValue="modules/barcode.f_usadid"
                                buttonName="button-action"
                                buttonValue="select-usad"
                                buttonClass="input-group-text"
                            />
                        </div>
                        <div class="col-12 col-md-6 col-xl-3">
                            <x-form-elements.input
                                name="f_neto"
                                labelValue="modules/barcode.f_neto"
                                inputClass="not-empty"
                                maxLength="15"
                                defaultValue="0.0000"
                            />

                            <x-form-elements.input
                                name="f_plastic"
                                labelValue="modules/barcode.f_plastic"
                                inputClass="not-empty"
                                maxLength="15"
                                defaultValue="0.0000"
                            />

                            <x-form-elements.input
                                name="f_paper"
                                labelValue="modules/barcode.f_paper"
                                inputClass="not-empty"
                                maxLength="15"
                                defaultValue="0.0000"
                            />
                        </div>
                        <div class="col-12 col-md-6 col-xl-3">
                            <x-form-elements.input
                                name="f_glass"
                                labelValue="modules/barcode.f_glass"
                                inputClass="not-empty"
                                maxLength="15"
                                defaultValue="0.0000"
                            />

                            <x-form-elements.input
                                name="f_wood"
                                labelValue="modules/barcode.f_wood"
                                inputClass="not-empty"
                                maxLength="15"
                                defaultValue="0.0000"
                            />

                            <x-form-elements.input
                                name="f_pap1"
                                labelValue="modules/barcode.f_pap1"
                                inputClass="not-empty"
                                maxLength="15"
                                defaultValue="0.0000"
                            />

                            <x-form-elements.input
                                name="f_pap2"
                                labelValue="modules/barcode.f_pap2"
                                inputClass="not-empty"
                                maxLength="15"
                                defaultValue="0.0000"
                            />
                        </div>
                        <div class="col-12 col-md-6 col-xl-3">
                            <x-form-elements.input
                                name="f_system1"
                                labelValue="modules/barcode.f_system1"
                                maxLength="100"
                                hidden="hidden"
                            />

                            <x-form-elements.input
                                name="f_system2"
                                labelValue="modules/barcode.f_system2"
                                maxLength="100"
                                hidden="hidden"
                            />

                            <x-form-elements.input
                                name="f_system3"
                                labelValue="modules/barcode.f_system3"
                                maxLength="100"
                                hidden="hidden"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
