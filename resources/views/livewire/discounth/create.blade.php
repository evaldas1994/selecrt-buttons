<div>
    <div class="row mb-2">
        <div class="col-auto">
            <h1>@lang('modules/discounth.h1')</h1>
        </div>

        <div class="col-auto ms-auto text-end mt-n1">
            <x-form-elements.button
                form="discounth_create_form"
                class="btn-primary"
                text="global.btn_save"
            />

            <x-form-elements.button
                form="discounth_create_form"
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
                    <div class="row">
                        <x-modules.tabs-list
                            lang="modules/discounth.tab"
                            count="3"
                        />
                    </div>

                    <div class="row">
                        <div class="tab tab-content mt-2">
                            <div class="tab-pane fade show active" id="tab-1" role="tabpanel">
                                <form class="m-0 p-0" id="discounth_create_form"
                                      action="{{ route('discountsh.store') }}" method="POST"
                                      enctype=multipart/form-data laravel>
                                    @csrf

                                    <div class="row">
                                        <div class="col-12 col-md-6 col-xl-3">
                                            <x-form-elements.select-with-button
                                                :items="$stocks"
                                                name="f_stockid"
                                                labelValue="modules/discounth.f_stockid"
                                                selectClass="not-empty"
                                                buttonName="button-action-without-validation"
                                                buttonValue="select-stock|f_stockid"
                                                wireModel="f_stockid"
                                                wireChange="changeStock($event.target.value)"
                                                defaultValue="f_stockid"
                                            />

                                            <x-form-elements.input-date
                                                name="f_valid_from"
                                                labelValue="modules/discounth.f_valid_from"
                                                inputClass="not-empty"
                                                :defaultValue="$f_valid_from"
                                            />

                                            <x-form-elements.input-date
                                                name="f_valid_till"
                                                labelValue="modules/discounth.f_valid_till"
                                                inputClass="not-empty"
                                                :defaultValue="$f_valid_till"
                                            />

                                            <x-form-elements.checkbox-boolean
                                                name="f_daily"
                                                labelValue="modules/discounth.f_daily"
                                                :defaultValue="$f_daily"
                                            />
                                        </div>
                                        <div class="col-12 col-md-6 col-xl-3">
                                            <x-form-elements.select-array
                                                :items="$buyStockTypes"
                                                name="f_buystocktype"
                                                labelValue="modules/discounth.f_buystocktype"
                                                selectValue="modules/discounth.buy_stock_type"
                                                :defaultValue="$f_buystocktype"
                                            />

                                            <x-form-elements.select-array
                                                :items="$notBuyStockTypes"
                                                name="f_notbuystocktype"
                                                labelValue="modules/discounth.f_notbuystocktype"
                                                selectValue="modules/discounth.not_buy_stock_type"
                                                :defaultValue="$f_notbuystocktype"
                                            />

                                            <x-form-elements.select-array
                                                :items="$buyingTypes"
                                                name="f_buyingtype"
                                                labelValue="modules/discounth.f_buyingtype"
                                                selectValue="modules/discounth.buying_type"
                                                :defaultValue="$f_buyingtype"
                                            />
                                        </div>
                                        <div class="col-12 col-md-6 col-xl-3">
                                            <x-form-elements.select-array
                                                :items="$buyLinesWithDiscTypes"
                                                name="f_buylineswithdisc"
                                                labelValue="modules/discounth.f_buylineswithdisc"
                                                selectValue="modules/discounth.buy_lines_with_disc"
                                                :defaultValue="$f_buylineswithdisc"
                                            />

                                            <x-form-elements.select-array
                                                :items="$winLinesForBidDiscTypes"
                                                name="f_buylinesforbiddisc"
                                                labelValue="modules/discounth.f_buylinesforbiddisc"
                                                selectValue="modules/discounth.buy_lines_for_bid_disc"
                                                :defaultValue="$f_buylinesforbiddisc"
                                            />
                                        </div>
                                        <div class="col-12 col-md-6 col-xl-3">
                                            <x-form-elements.select-array
                                                :items="$discountTypes"
                                                name="f_discounttype"
                                                labelValue="modules/discounth.f_discounttype"
                                                selectValue="modules/discounth.discount_type"
                                                :defaultValue="$f_discounttype"
                                            />

                                            <x-form-elements.input
                                                name="f_minamount"
                                                labelValue="modules/discounth.f_minamount"
                                                maxLength="15"
                                                :defaultValue="$f_minamount"
                                            />

                                            <x-form-elements.input
                                                name="f_maxamount"
                                                labelValue="modules/discounth.f_maxamount"
                                                maxLength="15"
                                                :defaultValue="$f_maxamount"
                                            />
                                        </div>
                                        <div class="col-12 col-md-6 col-xl-3">
                                            <x-form-elements.select-array
                                                :items="$winStockTypes"
                                                name="f_winstocktype"
                                                labelValue="modules/discounth.f_winstocktype"
                                                selectValue="modules/discounth.win_stock_type"
                                                :defaultValue="$f_winstocktype"
                                            />

                                            <x-form-elements.select-array
                                                :items="$notWinStockTypes"
                                                name="f_notwinstocktype"
                                                labelValue="modules/discounth.f_notwinstocktype"
                                                selectValue="modules/discounth.not_win_stock_type"
                                                :defaultValue="$f_notwinstocktype"
                                            />

                                            <x-form-elements.select-array
                                                :items="$winLinesWithDiscTypes"
                                                name="f_winlineswithdisc"
                                                labelValue="modules/discounth.f_winlineswithdisc"
                                                selectValue="modules/discounth.win_lines_with_disc"
                                                :defaultValue="$f_winlineswithdisc"
                                            />
                                        </div>

                                        <div class="col-12 col-md-6 col-xl-3">
                                            <x-form-elements.select-array
                                                :items="$winningTypes"
                                                name="f_winningtype"
                                                labelValue="modules/discounth.f_winningtype"
                                                selectValue="modules/discounth.winning_type"
                                                :defaultValue="$f_winningtype"
                                            />

                                            <x-form-elements.input
                                                name="f_maxwinning"
                                                labelValue="modules/discounth.f_maxwinning"
                                                maxLength="15"
                                                :defaultValue="$f_maxwinning"
                                            />

                                            <x-form-elements.select-array
                                                :items="$repeatTypes"
                                                name="f_repeat_type"
                                                labelValue="modules/discounth.f_repeat_type"
                                                selectValue="modules/discounth.repeat_type"
                                                :defaultValue="$f_repeat_type"
                                            />

                                            <x-form-elements.input
                                                name="f_repeated"
                                                labelValue="modules/discounth.f_repeated"
                                                maxLength="15"
                                                :defaultValue="$f_repeated"
                                            />
                                        </div>
                                        <div class="col-12 col-md-6 col-xl-3">
                                            <x-form-elements.select-array
                                                :items="$winLinesForBidDiscTypes"
                                                name="f_winlinesforbiddisc"
                                                labelValue="modules/discounth.f_winlinesforbiddisc"
                                                selectValue="modules/discounth.win_lines_for_bid_disc"
                                                :defaultValue="$f_winlinesforbiddisc"
                                            />

                                            <x-form-elements.select-array
                                                :items="$addDiscountTypes"
                                                name="f_adddiscount"
                                                labelValue="modules/discounth.f_adddiscount"
                                                selectValue="modules/discounth.add_discount"
                                                :defaultValue="$f_adddiscount"
                                            />
                                        </div>
                                        <div class="col-12 col-md-6 col-xl-3">
                                            <x-form-elements.select-array
                                                :items="$manualTypes"
                                                name="f_manual"
                                                labelValue="modules/discounth.f_manual"
                                                selectValue="modules/discounth.manual_type"
                                                :defaultValue="$f_manual"
                                            />

                                            <x-form-elements.select-array
                                                :items="$manualInputTypes"
                                                name="f_manualinput"
                                                labelValue="modules/discounth.f_manualinput"
                                                selectValue="modules/discounth.manual_input_type"
                                                :defaultValue="$f_manualinput"
                                            />
                                        </div>
                                    </div>
                            </div>
                            <div class="tab-pane fade" id="tab-3" role="tabpanel">
                                <div class="row">
                                    <div class="col-12 col-md-6 col-xl-3">
                                        <x-form-elements.checkbox-boolean
                                            name="f_showmessage"
                                            labelValue="modules/discounth.f_showmessage"
                                            :defaultValue="$f_showmessage"
                                        />

                                        <x-form-elements.checkbox-boolean
                                            name="f_showpopup"
                                            labelValue="modules/discounth.f_showpopup"
                                            :defaultValue="$f_showpopup"
                                        />
                                    </div>
                                    <div class="col-12 col-md-6 col-xl-3">
                                        <x-form-elements.input
                                            name="f_showtext"
                                            labelValue="modules/discounth.f_showtext"
                                            maxLength="15"
                                            :defaultValue="$f_showtext"
                                        />
                                    </div>
                                    <div class="col-12 col-md-6 col-xl-3">
                                        <x-form-elements.select-array
                                            :items="$printMessageTypes"
                                            name="f_printmessage"
                                            labelValue="modules/discounth.f_printmessage"
                                            selectValue="modules/discounth.print_message"
                                            :defaultValue="$f_printmessage"
                                        />
                                    </div>
                                    <div class="col-12 col-md-6 col-xl-3">
                                        <x-form-elements.textarea
                                            name="f_printtext"
                                            labelValue="modules/discounth.f_printtext"
                                            :defaultValue="$f_printtext"
                                        />
                                    </div>
                                </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="tab-2" role="tabpanel">
                                <div class="row">
                                    <div class="col-12 col-md-6 col-xl-3">
                                        1
                                    </div>
                                    <div class="col-12 col-md-6 col-xl-3">
                                        2
                                    </div>
                                    <div class="col-12 col-md-6 col-xl-3">
                                        3
                                    </div>
                                    <div class="col-12 col-md-6 col-xl-3">
                                        4
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
{{--                        <div class="col-12">--}}
{{--                            <h4>@lang('modules/productionCardComponent.h1')</h4>--}}
{{--                        </div>--}}

                        <div class="col-auto">
                            {{--                            <x-form-elements.button--}}
                            {{--                                form="discounth_create_form"--}}
                            {{--                                class="btn-primary"--}}
                            {{--                                name="button-action"--}}
                            {{--                                value="production-card-component-create"--}}
                            {{--                                fontawesomeIcon="fas fa-plus"--}}
                            {{--                                text="global.btn_new"--}}
                            {{--                            />--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
