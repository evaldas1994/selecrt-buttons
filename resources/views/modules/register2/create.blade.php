@extends('layouts.app')

@section('content')
    <div>
        <div class="row mb-2 mb-xl-3">
            <div class="col-auto">
                <h1>@lang('modules/register2.h1')</h1>
            </div>

            <div class="col-auto ms-auto text-end mt-n1">
                <x-form-elements.button
                    form="register2_create_form"
                    class="btn-primary"
                    text="global.btn_save"
                />

                <x-form-elements.button
                    form="register2_create_form"
                    class="btn-dark"
                    name="button-action-without-validation"
                    value="close"
                    text="global.btn_close"
                />
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-6 col-xl-3">
                                <x-form-elements.input-id
                                    form="register2_create_form"
                                    name="f_id"
                                    labelValue="modules/register2.f_id"
                                    maxLength="20"
                                    inputClass="not-empty"
                                />

                                <x-form-elements.input
                                    form="register2_create_form"
                                    name="f_coefficient"
                                    labelValue="modules/register2.f_coefficient"
                                    maxLength="20"
                                />
                            </div>
                            <div class="col-12 col-md-6 col-xl-3">
                                <x-form-elements.input
                                    form="register2_create_form"
                                    name="f_name"
                                    labelValue="modules/register2.f_name"
                                    maxLength="100"
                                />
                            </div>
                            <div class="col-12 col-md-6 col-xl-3">
                                <x-form-elements.input
                                    form="register2_create_form"
                                    name="f_name2"
                                    labelValue="modules/register2.f_name2"
                                    maxLength="100"
                                />
                            </div>
                            <div class="col-12 col-md-6 col-xl-3">
                                <x-form-elements.input
                                    form="register2_create_form"
                                    name="f_name3"
                                    labelValue="modules/register2.f_name3"
                                    maxLength="100"
                                />
                            </div>
                            <div class="col-12 col-md-6 col-xl-3">
                                <x-form-elements.input
                                    form="register2_create_form"
                                    name="f_system1"
                                    labelValue="modules/register2.f_system1"
                                    maxLength="100"
                                    hidden="hidden"
                                />

                                <x-form-elements.input
                                    form="register2_create_form"
                                    name="f_system2"
                                    labelValue="modules/register2.f_system2"
                                    maxLength="100"
                                    hidden="hidden"
                                />

                                <x-form-elements.input
                                    form="register2_create_form"
                                    name="f_system3"
                                    labelValue="modules/register2.f_system3"
                                    maxLength="100"
                                    hidden="hidden"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--    Forms--}}
        <x-form-elements.form
            id="register2_create_form"
            route="registers2.store"
            method="POST"
        />
    </div>
@endsection
