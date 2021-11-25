@extends('layouts.app')

@section('content')
    <div>
        <div class="row mb-2">
            <div class="col-auto">
                <h1>@lang('modules/salaryh.h1')</h1>
            </div>

            <div class="col-auto ms-auto text-end mt-n1">
                <x-form-elements.button
                    form="salaryh_create_form"
                    class="btn-primary"
                    text="global.btn_save"
                />

                <x-form-elements.button
                    form="salaryh_create_form"
                    class="btn-dark"
                    name="button-action-without-validation"
                    value="close"
                    text="global.btn_close"
                />
            </div>
        </div>
        <div class="row">
            <form id="salaryh_create_form"
                  name="salaryh_create_form"
                  action="{{ route('salariesh.store') }}" method="POST">
                @csrf

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-6 col-xl-3">
                                <x-form-elements.input-date
                                    name="f_docdate"
                                    labelValue="modules/salaryh.f_docdate"
                                    inputClass="not-empty"
                                    :defaultValue="$todayDate"
                                />

                                <x-form-elements.input
                                    name="f_blankno"
                                    labelValue="modules/salaryh.f_blankno"
                                    maxLength="20"
                                />
                            </div>
                            <div class="col-12 col-md-6 col-xl-3">
                                <x-form-elements.input
                                    name="f_name"
                                    labelValue="modules/salaryh.f_name"
                                    maxLength="100"
                                />

                                <x-form-elements.input
                                    name="f_description"
                                    labelValue="modules/salaryh.f_description"
                                    maxLength="100"
                                />
                            </div>
                            <div class="col-12 col-md-6 col-xl-3">
                                <x-form-elements.select-with-button
                                    :items="$templates"
                                    name="f_templateid"
                                    labelValue="modules/salaryh.f_templateid"
                                    selectClass="not-empty"
                                    buttonName="button-action-without-validation"
                                    buttonValue="select-template|f_templateid"
                                />

                                <x-form-elements.select-with-button
                                    :items="$departments"
                                    name="f_departmentid"
                                    labelValue="modules/salaryh.f_departmentid"
                                    buttonName="button-action-without-validation"
                                    buttonValue="select-department|f_departmentid"
                                />

                                <x-form-elements.select-with-button
                                    :items="$currencies"
                                    name="f_curid"
                                    labelValue="modules/salaryh.f_curid"
                                    selectClass="not-empty"
                                    buttonName="button-action-without-validation"
                                    buttonValue="select-currency|f_curid"
                                    defaultValue="EUR"
                                />
                            </div>
                            <div class="col-12 col-md-6 col-xl-3">
                                <x-form-elements.input
                                    name="f_period_year"
                                    labelValue="modules/salaryh.f_period_year"
                                    inputClass="not-empty"
                                    maxLength="4"
                                    :defaultValue="$todayDate->year"
                                />

                                <x-form-elements.select-array
                                    :items="$months"
                                    name="f_period_month"
                                    name="f_period_month"
                                    labelValue="modules/salaryh.f_period_month"
                                    selectValue="modules/salaryh.period_month"
                                    :defaultValue="$todayDate->month"
                                />
                            </div>
                            <div class="col-12 col-md-6 col-xl-3">
                                <x-form-elements.input
                                    name="f_system1"
                                    labelValue="modules/salaryh.f_system1"
                                    maxLength="100"
                                    hidden="hidden"
                                />

                                <x-form-elements.input
                                    name="f_system2"
                                    labelValue="modules/salaryh.f_system2"
                                    maxLength="100"
                                    hidden="hidden"
                                />

                                <x-form-elements.input
                                    name="f_system3"
                                    labelValue="modules/salaryh.f_system3"
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
