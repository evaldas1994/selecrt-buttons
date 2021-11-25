@extends('layouts.app')

@section('content')

    <div>
        <div class="row mb-2">
            <div class="col-auto">
                <h1>@lang('modules/salaryh.h1')</h1>
            </div>

            <div class="col-auto ms-auto text-end mt-n1">
                <x-form-elements.button
                    form="salaryh_edit_form"
                    class="btn-primary"
                    text="global.btn_save"
                />

                <x-form-elements.button
                    form="salaryh_edit_form"
                    class="btn-dark"
                    name="button-action-without-validation"
                    value="close"
                    text="global.btn_close"
                />
            </div>
        </div>
        <div class="row">
            <form id="salaryh_edit_form"
                  name="salaryh_edit_form"
                  action="{{ route('salariesh.update', $salariesh) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-6 col-xl-3">
                                <x-form-elements.input-date
                                    name="f_docdate"
                                    labelValue="modules/salaryh.f_docdate"
                                    inputClass="not-empty"
                                    :defaultValue="$salariesh->f_docdate"
                                />

                                <x-form-elements.input
                                    name="f_blankno"
                                    labelValue="modules/salaryh.f_blankno"
                                    maxLength="20"
                                    :defaultValue="$salariesh->f_blankno"
                                />
                            </div>
                            <div class="col-12 col-md-6 col-xl-3">
                                <x-form-elements.input
                                    name="f_name"
                                    labelValue="modules/salaryh.f_name"
                                    maxLength="100"
                                    :defaultValue="$salariesh->f_name"
                                />

                                <x-form-elements.input
                                    name="f_description"
                                    labelValue="modules/salaryh.f_description"
                                    maxLength="100"
                                    :defaultValue="$salariesh->f_description"
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
                                    :defaultValue="$salariesh->f_templateid"
                                />

                                <x-form-elements.select-with-button
                                    :items="$departments"
                                    name="f_departmentid"
                                    labelValue="modules/salaryh.f_departmentid"
                                    buttonName="button-action-without-validation"
                                    buttonValue="select-department|f_departmentid"
                                    :defaultValue="$salariesh->f_departmentid"
                                />

                                <x-form-elements.select-with-button
                                    :items="$currencies"
                                    name="f_curid"
                                    labelValue="modules/salaryh.f_curid"
                                    selectClass="not-empty"
                                    buttonName="button-action-without-validation"
                                    buttonValue="select-currency|f_curid"
                                    :defaultValue="$salariesh->f_curid"
                                />
                            </div>
                            <div class="col-12 col-md-6 col-xl-3">
                                <x-form-elements.input
                                    name="f_period_year"
                                    labelValue="modules/salaryh.f_period_year"
                                    inputClass="not-empty"
                                    maxLength="4"
                                    :defaultValue="$salariesh->f_period_year"
                                />

                                <x-form-elements.select-array
                                    :items="$months"
                                    name="f_period_month"
                                    name="f_period_month"
                                    labelValue="modules/salaryh.f_period_month"
                                    selectValue="modules/salaryh.period_month"
                                    :defaultValue="$salariesh->f_period_month"
                                />

                                <x-form-elements.input
                                    name="f_salary"
                                    labelValue="modules/salaryh.f_salary"
                                    maxLength="15"
                                    :defaultValue="$salariesh->f_salary"
                                    readonly="readonly"
                                />

                                <x-form-elements.input-date
                                    name="f_adate"
                                    labelValue="modules/salaryh.f_adate"
                                    :defaultValue="$salariesh->f_adate"
                                />
                            </div>
                            <div class="col-12 col-md-6 col-xl-3">
                                <x-form-elements.input
                                    name="f_system1"
                                    labelValue="modules/salaryh.f_system1"
                                    maxLength="100"
                                    hidden="hidden"
                                    :defaultValue="$salariesh->f_system1"
                                />

                                <x-form-elements.input
                                    name="f_system2"
                                    labelValue="modules/salaryh.f_system2"
                                    maxLength="100"
                                    hidden="hidden"
                                    :defaultValue="$salariesh->f_system2"
                                />

                                <x-form-elements.input
                                    name="f_system3"
                                    labelValue="modules/salaryh.f_system3"
                                    maxLength="100"
                                    hidden="hidden"
                                    :defaultValue="$salariesh->f_system3"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
