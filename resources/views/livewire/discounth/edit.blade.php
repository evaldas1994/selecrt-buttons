<div>
    <div class="row mb-2">
        <div class="col-auto">
            <h1>@lang('modules/discounth.h1')</h1>
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
        <div class="col-12">
        <div class="card">
                <div class="card-body">
                    <form id="disch_edit_form" name="disch_edit_form" action="{{ route('discountsh.update', $discountsh) }}" method="POST">
                        @csrf
                        @method('PUT')
                   <div class="row">
                       <div class="col-12 col-md-6 col-xl-3">
                           <x-form-elements.input-id
                               name="f_id"
                               labelValue="modules/discounth.f_id"
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
                               labelValue="modules/discounth.f_name"
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
                               labelValue="modules/discounth.f_system1"
                               maxLength="100"
                               :defaultValue="$f_system1"
                               wireModel="f_system1"
                               hidden="hidden"
                           />

                           <x-form-elements.input
                               name="f_system2"
                               labelValue="modules/discounth.f_system2"
                               maxLength="100"
                               :defaultValue="$f_system2"
                               wireModel="f_system2"
                               hidden="hidden"
                           />

                           <x-form-elements.input
                               name="f_system3"
                               labelValue="modules/discounth.f_system3"
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
                            <button wire:click="showCreate"
                                    class="btn btn-primary"
                            ><i class="fas fa-plus"></i>
                                @lang('global.btn_new')
                            </button>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <x-modules.items-list
                                form="disch_edit_form"
                                :items="$allDiscountsd"
                                :parentRouteData="$discountsh"
                                :langs="['modules/discountd.f_id', 'modules/discountd.f_quant', 'modules/discountd.f_perc']"
                                :fields="['f_id', 'f_quant', 'f_perc']"
                                deleteFormRoute="discountsd.destroy"
                                name="discountd"
                                wireEmmitUpName="showEdit"
                                wireEmmitValue="true"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if($showCreate)
        <div class="row">
            <livewire:discountd.create :discountsh="$discountsh"/>
        </div>
    @endif

    @if($showEdit && $discountsd != null)
        <div class="row">
            <livewire:discountd.edit :discountsh="$discountsh" :discountsd="$discountsd"/>
        </div>
    @endif
</div>
