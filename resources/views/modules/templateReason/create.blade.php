@extends('layouts.app')

@section('content')
    <div>
        <div class="row mb-2">
            <div class="col-auto">
                <h1>@lang('modules/templateReason.h1')</h1>
            </div>

            <div class="col-auto ms-auto text-end mt-n1">
                <x-form-elements.button
                    form="template_reason_create_form"
                    class="btn-primary"
                    text="global.btn_save"
                />

                <x-form-elements.button
                    form="template_reason_create_form"
                    class="btn-dark"
                    name="button-action-without-validation"
                    value="close"
                    text="global.btn_close"
                />
            </div>
        </div>
        <div class="row">
            <form id="template_reason_create_form"
                  name="template_reason_create_form"
                  action="{{ route('template-reasons.store', $template) }}" method="POST">
                @csrf

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-6 col-xl-3">
                                <x-form-elements.input
                                    name="f_description"
                                    labelValue="modules/templateReason.f_description"
                                    maxLength="100"
                                />
                            </div>
                            <div class="col-12 col-md-6 col-xl-3">
                                <x-form-elements.input
                                    name="f_system1"
                                    labelValue="modules/stock.f_system1"
                                    maxLength="100"
                                    hidden="hidden"
                                />

                                <x-form-elements.input
                                    name="f_system2"
                                    labelValue="modules/stock.f_system2"
                                    maxLength="100"
                                    hidden="hidden"
                                />

                                <x-form-elements.input
                                    name="f_system3"
                                    labelValue="modules/stock.f_system3"
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
