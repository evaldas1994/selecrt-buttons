
<div class="fixed-bottom">
    <div class="row mb-2">
        <div class="col-auto ms-auto text-end mt-n1">
            <x-form-elements.button
                form="discd-edit-form"
                class="btn-primary"
                text="global.btn_save"
            />

            <button wire:click="$emitUp('showEdit', false)"
                    class="btn btn-primary"
            >
                @lang('global.btn_close')
            </button>
        </div>
    </div>
    <div class="row">
        <form id="discd-edit-form"
              action="{{ route('discd.update', [$disch, $discd]) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-6 col-xl-3">
                            <x-form-elements.input
                                name="f_quant"
                                labelValue="modules/discd.f_quant"
                                maxLength="15"
                                :defaultValue="$f_quant"
                                wireModel="f_quant"
                            />
                        </div>
                        <div class="col-12 col-md-6 col-xl-3">
                            <x-form-elements.input
                                name="f_perc"
                                labelValue="modules/discd.f_perc"
                                maxLength="15"
                                :defaultValue="$f_perc"
                                wireModel="f_perc"
                            />
                        </div>
                        <div class="col-12 col-md-6 col-xl-3">

                        </div>
                        <div class="col-12 col-md-6 col-xl-3">
                            <x-form-elements.input
                                name="f_system1"
                                labelValue="modules/discd.f_system1"
                                maxLength="100"
                                :defaultValue="$f_system1"
                                wireModel="f_system1"
                                hidden="hidden"
                            />

                            <x-form-elements.input
                                name="f_system2"
                                labelValue="modules/discd.f_system2"
                                maxLength="100"
                                :defaultValue="$f_system2"
                                wireModel="f_system2"
                                hidden="hidden"
                            />

                            <x-form-elements.input
                                name="f_system3"
                                labelValue="modules/discd.f_system3"
                                maxLength="100"
                                :defaultValue="$f_system3"
                                wireModel="f_system3"
                                hidden="hidden"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
