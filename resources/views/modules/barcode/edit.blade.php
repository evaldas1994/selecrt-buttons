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

    </div>
    <div class="row">
        <form id="barcode-form" action="{{ route('barcodes.update', $barcode) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="card">
                <div class="col-12">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-xl-3">
                                <x-form-elements.input-id
                                    name="f_id"
                                    labelValue="modules/barcode.f_id"
                                    maxLength="40"
                                    inputClass="not-empty"
                                    :defaultValue="$barcode->f_id"
                                ></x-form-elements.input-id>
                                <x-form-elements.select-with-button
                                    :stocks="$stocks"
                                    name="f_stockid"
                                    labelValue="modules/barcode.f_stockid"
                                    selectClass="not-empty"
                                    buttonName="button-action"
                                    buttonValue="select-stock"
                                    buttonClass="input-group-text"
                                    :defaultValue="$barcode->f_stockid"
                                ></x-form-elements.select-with-button>
                                <x-form-elements.checkbox-boolean
                                    name="f_default"
                                    labelValue="modules/barcode.f_default"
                                    :defaultValue="$barcode->f_default"
                                ></x-form-elements.checkbox-boolean>
                            </div>
                            <div class="col-12 col-xl-3">
                                <x-form-elements.input
                                    name="f_ratio"
                                    labelValue="modules/barcode.f_ratio"
                                    inputClass="not-empty"
                                    maxLength="15"
                                    :defaultValue="$barcode->f_ratio"
                                ></x-form-elements.input>
                                <x-form-elements.select-with-button
                                    :stocks="$stocks"
                                    name="f_usadid"
                                    labelValue="modules/barcode.f_usadid"
                                    buttonName="button-action"
                                    buttonValue="select-usad"
                                    buttonClass="input-group-text"
                                    :defaultValue="$barcode->f_usadid"
                                ></x-form-elements.select-with-button>
                            </div>
                            <div class="col-12 col-xl-3">
                                <x-form-elements.input
                                    name="f_neto"
                                    labelValue="modules/barcode.f_neto"
                                    inputClass="not-empty"
                                    maxLength="15"
                                    :defaultValue="$barcode->f_neto"
                                ></x-form-elements.input>
                                <x-form-elements.input
                                    name="f_plastic"
                                    labelValue="modules/barcode.f_plastic"
                                    inputClass="not-empty"
                                    maxLength="15"
                                    :defaultValue="$barcode->f_plastic"
                                ></x-form-elements.input>
                                <x-form-elements.input
                                    name="f_paper"
                                    labelValue="modules/barcode.f_paper"
                                    inputClass="not-empty"
                                    maxLength="15"
                                    :defaultValue="$barcode->f_paper"
                                ></x-form-elements.input>
                            </div>
                            <div class="col-12 col-xl-3">
                                <x-form-elements.input
                                    name="f_glass"
                                    labelValue="modules/barcode.f_glass"
                                    inputClass="not-empty"
                                    maxLength="15"
                                    :defaultValue="$barcode->f_glass"
                                ></x-form-elements.input>
                                <x-form-elements.input
                                    name="f_wood"
                                    labelValue="modules/barcode.f_wood"
                                    inputClass="not-empty"
                                    maxLength="15"
                                    :defaultValue="$barcode->f_wood"
                                ></x-form-elements.input>
                                <x-form-elements.input
                                    name="f_pap1"
                                    labelValue="modules/barcode.f_pap1"
                                    inputClass="not-empty"
                                    maxLength="15"
                                    :defaultValue="$barcode->f_pap1"
                                ></x-form-elements.input>
                                <x-form-elements.input
                                    name="f_pap2"
                                    labelValue="modules/barcode.f_pap2"
                                    inputClass="not-empty"
                                    maxLength="15"
                                    :defaultValue="$barcode->f_pap2"
                                ></x-form-elements.input>
                            </div>
                            <div class="col-12 col-xl-3">
                                <x-form-elements.input
                                    name="f_system1"
                                    labelValue="modules/barcode.f_system1"
                                    maxLength="100"
                                    hidden="hidden"
                                    :defaultValue="$barcode->f_system1"
                                ></x-form-elements.input>
                                <x-form-elements.input
                                    name="f_system2"
                                    labelValue="modules/barcode.f_system2"
                                    maxLength="100"
                                    hidden="hidden"
                                    :defaultValue="$barcode->f_system2"
                                ></x-form-elements.input>
                                <x-form-elements.input
                                    name="f_system3"
                                    labelValue="modules/barcode.f_system3"
                                    maxLength="100"
                                    hidden="hidden"
                                    :defaultValue="$barcode->f_system3"
                                ></x-form-elements.input>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
