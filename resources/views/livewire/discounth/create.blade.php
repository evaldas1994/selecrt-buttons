<div>
    <div class="row mb-2">
        <div class="col-auto">
            <h1>@lang('modules/disch.h1')</h1>
        </div>

        <div class="col-auto ms-auto text-end mt-n1">
            <x-form-elements.button
                form="disch_create_form"
                class="btn-primary"
                text="global.btn_save"
            />

            <x-form-elements.button
                form="disch_create_form"
                class="btn-dark"
                name="button-action-without-validation"
                value="close"
                text="global.btn_close"
            />
        </div>
    </div>
    <div class="row">
        <div class="card">
            <div class="card-body">
                <form id="disch_create_form" name="disch_create_form" action="{{ route('discountsh.store') }}"
                      method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-md-6 col-xl-3">
                            <x-form-elements.input-id
                                name="f_id"
                                labelValue="modules/disch.f_id"
                                inputClass="not-empty"
                                maxLength="20"
                                wireModel="f_id"
                                wireChange="changeId($event.target.value)"
                                :defaultValue="$f_id"
                            />
                        </div>
                        <div class="col-12 col-md-6 col-xl-3">
                            <x-form-elements.input
                                name="f_name"
                                labelValue="modules/disch.f_name"
                                maxLength="100"
                                :defaultValue="$f_name"
                                wireModel="f_name"
                            />
                        </div>
                        <div class="col-12 col-md-6 col-xl-3">

                        </div>
                        <div class="col-12 col-md-6 col-xl-3">
                            <x-form-elements.input
                                name="f_system1"
                                labelValue="modules/disch.f_system1"
                                maxLength="100"
                                :defaultValue="$f_system1"
                                wireModel="f_system1"
                                hidden="hidden"
                            />

                            <x-form-elements.input
                                name="f_system2"
                                labelValue="modules/disch.f_system2"
                                maxLength="100"
                                :defaultValue="$f_system2"
                                wireModel="f_system2"
                                hidden="hidden"
                            />

                            <x-form-elements.input
                                name="f_system3"
                                labelValue="modules/disch.f_system3"
                                maxLength="100"
                                :defaultValue="$f_system3"
                                wireModel="f_system3"
                                hidden="hidden"
                            />
                        </div>
                    </div>
                </form>

                <div class="row mt-4">
                    <div class="col-12">
                        <h4>@lang('modules/discountd.h1')</h4>
                    </div>

                    <div class="col-auto">
                        <x-form-elements.button
                            form="disch_create_form"
                            class="btn-primary"
                            name="button-action"
                            value="discountd-create"
                            fontawesomeIcon="fas fa-plus"
                            text="global.btn_new"
                        />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
