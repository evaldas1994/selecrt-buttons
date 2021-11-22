@extends('layouts.app')

@section('content')
    <div class="row mb-2">
        <div class="col-auto">
            <h1>@lang('modules/contact.h1')</h1>
        </div>

        <div class="col-auto ms-auto text-end mt-n1">
            <x-form-elements.button
                form="contact_edit_form"
                class="btn-primary"
                text="global.btn_save"
            />

            <x-form-elements.button
                form="contact_edit_form"
                class="btn-dark"
                name="button-action-without-validation"
                value="close"
                text="global.btn_close"
            />
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form id="contact_edit_form"
                  name="contact_edit_form"
                  action="{{ route('contacts.update', [$partner, $contact]) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-6 col-xl-3">
                                <x-form-elements.input
                                    name="f_fullname"
                                    labelValue="modules/contact.f_fullname"
                                    inputClass="not-empty"
                                    maxLength="100"
                                    :defaultValue="$contact->f_fullname"
                                />

                                <x-form-elements.input
                                    name="f_post"
                                    labelValue="modules/contact.f_post"
                                    maxLength="100"
                                    :defaultValue="$contact->f_post"
                                />
                            </div>
                            <div class="col-12 col-md-6 col-xl-3">
                                <x-form-elements.input
                                    name="f_phone"
                                    labelValue="modules/contact.f_phone"
                                    inputClass="not-empty"
                                    maxLength="100"
                                    :defaultValue="$contact->f_phone"
                                />

                                <x-form-elements.input
                                    name="f_email"
                                    labelValue="modules/contact.f_email"
                                    maxLength="100"
                                    :defaultValue="$contact->f_email"
                                />
                            </div>
                            <div class="col-12 col-md-6 col-xl-3">
                                <x-form-elements.textarea
                                    name="f_address"
                                    labelValue="modules/contact.f_address"
                                    :defaultValue="$contact->f_address"
                                />
                            </div>
                            <div class="col-12 col-md-6 col-xl-3">
                                <x-form-elements.select-array
                                    :items="$purposeTypes"
                                    name="f_purpose"
                                    labelValue="modules/contact.f_purpose"
                                    selectValue="modules/contact.purpose_type"
                                    :defaultValue="$contact->f_purpose"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
