@extends('layouts.app')

@section('content')
    <div>
        <div class="row mb-2">
            <div class="col-auto">
                <h1>@lang('modules/productionGroup.h1')</h1>
            </div>

            <div class="col-auto ms-auto text-end mt-n1">
                <x-form-elements.button
                    form="budget_edit_form"
                    class="btn-primary"
                    text="global.btn_save"
                />

                <x-form-elements.button
                    form="budget_edit_form"
                    class="btn-dark"
                    name="button-action-without-validation"
                    value="close"
                    text="global.btn_close"
                />
            </div>
        </div>
        <div class="row">
            <form id="budget_edit_form"
                  name="budget_edit_form"
                  action="{{ route('production-groups.store') }}" method="POST">
                @csrf

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-6 col-xl-3">
                                <x-form-elements.input-id
                                    name="f_id"
                                    labelValue="modules/productionGroup.f_id"
                                    inputClass="not-empty"
                                />
                            </div>
                            <div class="col-12 col-md-6 col-xl-3">
                                <x-form-elements.input
                                    name="f_name"
                                    labelValue="modules/productionGroup.f_name"
                                    maxLength="100"
                                />

                                <x-form-elements.input
                                    name="f_name2"
                                    labelValue="modules/productionGroup.f_name2"
                                    maxLength="100"
                                />
                            </div>
                            <div class="col-12 col-md-6 col-xl-3">
                                <x-form-elements.select-with-button
                                    :items="$templates"
                                    name="f_templateid1"
                                    labelValue="modules/productionGroup.f_templateid1"
                                    buttonName="button-action-without-validation"
                                    buttonValue="select-template1|f_templateid1"
                                />

                                <x-form-elements.select-with-button
                                    :items="$templates"
                                    name="f_templateid2"
                                    labelValue="modules/productionGroup.f_templateid2"
                                    buttonName="button-action-without-validation"
                                    buttonValue="select-template2|f_templateid2"
                                />
                            </div>
                            <div class="col-12 col-md-6 col-xl-3">
                                <x-form-elements.input
                                    name="f_system1"
                                    labelValue="modules/productionGroup.f_system1"
                                    maxLength="100"
                                    hidden="hidden"
                                />

                                <x-form-elements.input
                                    name="f_system2"
                                    labelValue="modules/productionGroup.f_system2"
                                    maxLength="100"
                                    hidden="hidden"
                                />

                                <x-form-elements.input
                                    name="f_system3"
                                    labelValue="modules/productionGroup.f_system3"
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
