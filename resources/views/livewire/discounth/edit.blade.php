<div>
    <div class="row mb-2">
        <div class="col-auto">
            <h1>@lang('modules/disch.h1')</h1>
        </div>

        <div class="col-auto ms-auto text-end mt-n1">
            <x-form-elements.button
                form="disch_edit_form"
                class="btn-primary"
                text="global.btn_save"
            />

            <x-form-elements.button
                form="disch_edit_form"
                class="btn-dark"
                name="button-action-without-validation"
                value="close"
                text="global.btn_close"
            />
        </div>
    </div>
    <div class="row">
        <form id="disch_edit_form" name="disch_edit_form" action="{{ route('discountsh.update', $discountsh) }}" method="POST">
            @csrf
            @method('PUT')

        <div class="card">
                <div class="card-body">
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

                    <div class="row mt-4">
                        <div class="col-12">
                            <h4>@lang('modules/discountd.h1')</h4>
                        </div>

                        <div class="col-auto">
                            <x-form-elements.button
                                form="disch_edit_form"
                                class="btn-primary"
                                name="button-action"
                                value="discountd-create"
                                fontawesomeIcon="fas fa-plus"
                                text="global.btn_new"
                            />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <x-modules.items-list
                                form="disch_edit_form"
                                :items="$allDiscountsd"
                                :parentRouteData="$discountsh"
                                :langs="['modules/discountd.f_id', 'modules/discountd.f_hid', 'modules/discountd.f_quant', 'modules/discountd.f_perc']"
                                :fields="['f_id', 'f_hid', 'f_quant', 'f_perc']"
                                deleteFormRoute="discountsd.destroy"
                                name="discountd"
                                wireEmmitUpName="showEdit"
                                wireEmmitValue="true"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
