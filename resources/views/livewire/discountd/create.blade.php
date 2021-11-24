
<div class="fixed-bottom">
    <div class="row mb-2">
        <div class="col-auto ms-auto text-end mt-n1">
            <x-form-elements.button
                form="discountd_create_form"
                class="btn-primary"
                text="global.btn_save"
            />

            <button wire:click="$emitUp('showCreateDiscountd', false)"
                    class="btn btn-primary"
            >
                @lang('global.btn_close')
            </button>
        </div>
    </div>
    <div class="row">
        <form id="discountd_create_form"
              action="{{ route('discountsd.store', $discountsh) }}" method="POST">
            @csrf

            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-6 col-xl-3">
                            <x-form-elements.select-array
                                :items="$actionTypes"
                                name="f_actiontype"
                                labelValue="modules/discountd.f_actiontype"
                                selectValue="modules/discountd.action_type"
                                wireModel="f_actiontype"
                                :defaultValue="$f_actiontype"
                            />
                        </div>
                        <div class="col-12 col-md-6 col-xl-3">
                            <x-form-elements.select-with-button
                                :items="$stocks"
                                name="f_actionid"
                                labelValue="modules/discountd.f_actionid"
                                selectClass="not-empty"
                                buttonName="button-action-without-validation"
                                buttonValue="select-stock|f_actionid"
                                wireModel="f_actionid"
                                wireChange="changeStock($event.target.value)"
                                defaultValue="f_actionid"
                            />
                        </div>
                        <div class="col-12 col-md-6 col-xl-3">
                            <x-form-elements.select-with-button
                                :items="$barcodes"
                                name="f_barcodeid"
                                labelValue="modules/discountd.f_barcodeid"
                                buttonName="button-action-without-validation"
                                buttonValue="select-barcode|f_barcodeid"
                                wireModel="f_barcodeid"
                                wireChange="changeBarcode($event.target.value)"
                                defaultValue="f_barcodeid"
                            />
                        </div>
                        <div class="col-12 col-md-6 col-xl-3">
                            <x-form-elements.input
                                name="f_discount_price"
                                labelValue="modules/discountd.f_discount_price"
                                maxLength="15"
                                :defaultValue="$f_discount_price"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
