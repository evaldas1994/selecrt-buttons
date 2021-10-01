@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="post" action="{{ route('stocks.store') }}">
            @csrf

            <h1> Pagrindinis </h1>

            <div class="mb-3">
                <label for="f_id" class="form-label">Kodas</label>
                <input type="text" class="form-control" name="f_id">
            </div>

            <div class="mb-3">
                <label for="f_name" class="form-label">Pavadinimas</label>
                <input type="text" class="form-control" name="f_name">
            </div>

            <div class="mb-3">
                <label for="f_name2" class="form-label">Pavadinimas 2</label>
                <input type="text" class="form-control" name="f_name2">
            </div>

            <div class="mb-3">
                <label for="f_groupid" class="form-label">Prekės grupė</label>
                <select name="f_groupid" id="f_groupid">
                    <option value="AK">AK</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="f_groupid" class="form-label">Mat. vnt.</label>
                <select name="f_unitid" id="f_unitid">
                    @foreach($units as $unit)
                        <option value="{{ $unit->f_id }}">{{ $unit->f_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="f_pack_unitid" class="form-label">Pakuotės mat. vnt.</label>
                <select name="f_pack_unitid" id="f_pack_unitid">
                    <option value="KG">KG</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="f_pack_quant" class="form-label">Kiekis pakuotėje</label>
                <input type="text" class="form-control" name="f_pack_quant" value=0.0000>
            </div>

            <div class="mb-3">
                <label for="f_volume" class="form-label">Tūris</label>
                <input type="text" class="form-control" name="f_volume" value=0.0000>
            </div>

            <div class="mb-3">
                <label for="f_weight" class="form-label">Svoris</label>
                <input type="text" class="form-control" name="f_weight" value=0.0000>
            </div>

            <div class="mb-3">
                <label for="f_min_quant" class="form-label">Min. kiekis</label>
                <input type="text" class="form-control" name="f_min_quant" value=0.0000>
            </div>

            <div class="mb-3">
                <label for="f_valid_days" class="form-label">Galioja dienų</label>
                <input type="text" class="form-control" name="f_valid_days" value=0>
            </div>

            <div class="mb-3">
                <label for="f_valid_date" class="form-label">Galioja iki</label>
                <input type="text" class="form-control" name="f_valid_date">
            </div>

            <div class="mb-3">
                <label for="f_packing" class="form-label">Fasuotė</label>
                <input type="text" class="form-control" name="f_packing">
            </div>

            <div class="mb-3">
                <label for="f_originating" class="form-label">Kilmės šalis</label>
                <input type="text" class="form-control" name="f_originating">
            </div>

            <div class="mb-3">
                <label for="f_manufacturerid" class="form-label">Gamintojas</label>
                <select name="f_manufacturerid" id="f_manufacturerid">
                    <option value=null>---</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="f_price_sale1" class="form-label">Pardavimo kaina 1</label>
                <input type="text" class="form-control" name="f_price_sale1" value=0.0000>
            </div>

            <div class="mb-3">
                <label for="f_price_sale2" class="form-label">Pardavimo kaina 2</label>
                <input type="text" class="form-control" name="f_price_sale2" value=0.0000>
            </div>

            <div class="mb-3">
                <label for="f_price_sale3" class="form-label">Pardavimo kaina 3</label>
                <input type="text" class="form-control" name="f_price_sale3" value=0.0000>
            </div>

            <div class="mb-3">
                <label for="f_price_sale4" class="form-label">Pardavimo kaina 4</label>
                <input type="text" class="form-control" name="f_price_sale4" value=0.0000>
            </div>

            <div class="mb-3">
                <label for="f_price_sale5" class="form-label">Pardavimo kaina 5</label>
                <input type="text" class="form-control" name="f_price_sale5" value=0.0000>
            </div>

            <div class="mb-3">
                <label for="f_discid" class="form-label">Nuolaida</label>
                <select name="f_manufacturerid" id="f_discid">
                    <option value="KAS 10 VNT">KAS 10 VNT</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="f_price_purch" class="form-label">Pirk. kaina</label>
                <input type="text" class="form-control" name="f_price_purch" value=0.0000>
            </div>

            <div class="mb-3">
                <label for="f_vat_perc" class="form-label">PVM proc.</label>
                <input type="text" class="form-control" name="f_vat_perc" value=21.00>
            </div>

            <div class="mb-3">
                <label for="f_vatid" class="form-label">PVM kodas</label>
                <select name="f_vatid" id="f_vatid">
                    @foreach($vats as $vat)
                        <option value="{{ $vat->f_id }}">{{ $vat->f_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="f_main_stockid" class="form-label">Alternatyvi prekė</label>
                <select name="f_main_stockid" id="f_main_stockid">
                    <option value="0001">0001</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="f_partner_discount" class="form-label">Tiekėjo nuolaida</label>
                <input type="text" class="form-control" name="f_partner_discount" value=0.0000>
            </div>

            <div class="mb-3">
                <label for="f_gross_weight" class="form-label">Svoris (bruto)</label>
                <input type="text" class="form-control" name="f_gross_weight" value=0.0000>
            </div>

            <div class="mb-3">
                <label for="f_type" class="form-label">Tipas</label>
                <select name="f_type" id="f_type">
                    <option value=1>1</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="f_weightsign">Sveriama</label>
                <input type="checkbox" value=1 id="f_weightsign" name="f_weightsign">
            </div>

            <div class="mb-3">
                <label for="f_product">Gaminama</label>
                <input type="checkbox" value=1 id="f_product" name="f_product">
            </div>

            <div class="mb-3">
                <label for="f_scalesign">Siųsti į svarstykles</label>
                <input type="checkbox" value=1 id="f_scalesign" name="f_scalesign">
            </div>

            <div class="mb-3">
                <label for="f_curid" class="form-label">Valiuta</label>
                <select name="f_curid" id="f_curid">
                    @foreach($curs as $cur)
                        <option value="{{ $cur->f_id }}">{{ $cur->f_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="f_partnerid" class="form-label">Tiekejo kodas</label>
                <select name="f_partnerid" id="f_partnerid">
                    {{--                    <option value="104547">104547</option>--}}
                </select>
            </div>

            <div class="mb-3">
                <label for="f_code" class="form-label">Tiekejo kodas</label>
                <input type="text" class="form-control" name="f_code">
            </div>

            <div class="mb-3">
                <label for="f_accountid" class="form-label">Sąskaita</label>
                <select name="f_accountid" id="f_accountid">
                    <option value="1110">1110</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="f_ingredients" class="form-label">Sudėtis</label>
                <textarea id="f_ingredients" name="f_ingredients" rows="4" cols="50">
                </textarea>
            </div>

            <div class="mb-3">
                <label for="f_stock_text1" class="form-label">Etiketės aprašymas 1</label>
                <input type="text" class="form-control" name="f_stock_text1">
            </div>

            <div class="mb-3">
                <label for="f_stock_text2" class="form-label">Etiketės aprašymas 2</label>
                <input type="text" class="form-control" name="f_stock_text2">
            </div>

            <div class="mb-3">
                <label for="f_stock_text3" class="form-label">Etiketės aprašymas 3</label>
                <input type="text" class="form-control" name="f_stock_text3">
            </div>

            <div class="mb-3">
                <label for="f_empty_pack">Tuščia pakuotė</label>
                <input type="checkbox" value=1 id="f_empty_pack" name="f_empty_pack">
            </div>

            <h1> Papildomas </h1>

            <div class="mb-3">
                <label for="f_f1" class="form-label">Laukas1</label>
                <input type="text" class="form-control" name="f_f1">
            </div>

            <div class="mb-3">
                <label for="f_f2" class="form-label">Laukas2</label>
                <input type="text" class="form-control" name="f_f2">
            </div>

            <div class="mb-3">
                <label for="f_f3" class="form-label">Laukas3</label>
                <input type="text" class="form-control" name="f_f3">
            </div>

            <div class="mb-3">
                <label for="f_f4" class="form-label">Laukas4</label>
                <input type="text" class="form-control" name="f_f4">
            </div>

            <div class="mb-3">
                <label for="f_f5" class="form-label">Laukas5</label>
                <input type="text" class="form-control" name="f_f5">
            </div>

            <div class="mb-3">
                <label for="f_height" class="form-label">Aukstis</label>
                <input type="text" class="form-control" name="f_height" value=0.0000>
            </div>

            <div class="mb-3">
                <label for="f_width" class="form-label">Plotis</label>
                <input type="text" class="form-control" name="f_width" value=0.0000>
            </div>

            <div class="mb-3">
                <label for="f_length" class="form-label">Ilgis</label>
                <input type="text" class="form-control" name="f_length" value=0.0000>
            </div>

            <div class="mb-3">
                <label for="f_alternative_group_id" class="form-label">Alternatyvi grupė</label>
                <select name="f_alternative_group_id" id="f_alternative_group_id">
                    <option value="001">001</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="f_r1id" class="form-label">Galioja iki</label>
                <select name="f_r1id" id="f_r1id">
                    {{--                    <option value="01">01</option>--}}
                </select>
            </div>

            <div class="mb-3">
                <label for="f_r2id" class="form-label">Registras 2</label>
                <select name="f_r1id" id="f_r2id">
                    {{--                    <option value="12">12</option>--}}
                </select>
            </div>

            <div class="mb-3">
                <label for="f_r3id" class="form-label">Registras 3</label>
                <select name="f_r3id" id="f_r3id">
                    {{--                    <option value="147">147</option>--}}
                </select>
            </div>

            <div class="mb-3">
                <label for="f_r4id" class="form-label">Registras 4</label>
                <select name="f_r4id" id="f_r4id">
                    {{--                    <option value="1">1</option>--}}
                </select>
            </div>

            <div class="mb-3">
                <label for="f_r5id" class="form-label">Registras 5</label>
                <select name="f_r5id" id="f_r5id">
                    {{--                    <option value="1">1</option>--}}
                </select>
            </div>

            <div class="mb-3">
                <label for="f_departmentid" class="form-label">Padalinys</label>
                <select name="f_departmentid" id="f_departmentid">
                    {{--                    <option value="ADMN">ADMN</option>--}}
                </select>
            </div>

            <div class="mb-3">
                <label for="f_personid" class="form-label">Asmuo</label>
                <select name="f_personid" id="f_personid">
                    {{--                    <option value="DEMO A">DEMO A</option>--}}
                </select>
            </div>

            <div class="mb-3">
                <label for="f_projectid" class="form-label">Projektas</label>
                <select name="f_projectid" id="f_projectid">
                    {{--                    <option value="1">1</option>--}}
                </select>
            </div>

            <div class="mb-3">
                <label for="f_quantity" class="form-label">Kiekis paletėje</label>
                <input type="text" class="form-control" name="f_quantity" value=0.0000>
            </div>

            <div class="mb-3">
                <label for="f_mark1">Požymis 1</label>
                <input type="checkbox" value=1 id="f_mark1" name="f_mark1">
            </div>

            <div class="mb-3">
                <label for="f_mark2">Požymis 2</label>
                <input type="checkbox" value=1 id="f_mark2" name="f_mark2">
            </div>
            <div class="mb-3">
                <label for="f_mark3">Požymis 3</label>
                <input type="checkbox" value=1 id="f_mark3" name="f_mark3">
            </div>

            <div class="mb-3">
                <label for="f_mark4">Požymis 4</label>
                <input type="checkbox" value=1 id="f_mark4" name="f_mark4">
            </div>

            <div class="mb-3">
                <label for="f_mark5">Požymis 5</label>
                <input type="checkbox" value=1 id="f_mark5" name="f_mark5">
            </div>

            <div class="mb-3">
                <label for="f_mark6">Požymis 6</label>
                <input type="checkbox" value=1 id="f_mark6" name="f_mark6">
            </div>

            <div class="mb-3">
                <label for="f_mark7">Požymis 7</label>
                <input type="checkbox" value=1 id="f_mark7" name="f_mark7">
            </div>

            <div class="mb-3">
                <label for="f_mark8">Požymis 8</label>
                <input type="checkbox" value=1 id="f_mark8" name="f_mark8">
            </div>

            <div class="mb-3">
                <label for="f_locked">Blokuota</label>
                <input type="checkbox" value=1 id="f_locked" name="f_locked">
            </div>

            <div class="mb-3">
                <label for="f_sales_block">Blokuoti pardavimams</label>
                <input type="checkbox" value=1 id="f_sales_block" name="f_sales_block">
            </div>

            <div class="mb-3">
                <label for="f_purch_block">Blokuoti Pikimams</label>
                <input type="checkbox" value=1 id="f_purch_block" name="f_purch_block">
            </div>

            <div class="mb-3">
                <label for="f_order_block">Blokuoti Užsakymams</label>
                <input type="checkbox" value=1 id="f_order_block" name="f_order_block">
            </div>

            <div class="mb-3">
                <label for="f_catalog_item">Įtraukti į katalogą</label>
                <input type="checkbox" value=1 id="f_catalog_item" name="f_catalog_item">
            </div>

            <div class="mb-3">
                <label for="f_disp_priority" class="form-label">Prioritetas kataloge</label>
                <input type="text" class="form-control" name="f_disp_priority" value=0>
            </div>


            <h3>GPAIS Registrai:</h3>

            <div class="mb-3">
                <label for="f_gpais_i">Pirkimas</label>
                <input type="checkbox" value=1 id="f_gpais_i" name="f_gpais_i">
            </div>

            <div class="mb-3">
                <label for="f_gpais_a">Pardavimas</label>
                <input type="checkbox" value=1 id="f_gpais_a" name="f_gpais_a">
            </div>

            <div class="mb-3">
                <label for="f_gpais_n">Nurašymas</label>
                <input type="checkbox" value=1 id="f_gpais_n" name="f_gpais_n">
            </div>

            <div class="mb-3">
                <label for="f_pack_type" class="form-label">Gpais pakuotės tipas:</label>
                <select name="f_pack_type" id="f_pack_type">
                    {{--                    <option value=1>NULL</option>--}}
                </select>
            </div>

            <div class="mb-3">
                <label for="f_image">Paveikslėlis</label>
                <input type="file" id="f_image" name="f_image" accept="image/png, image/jpeg">
            </div>

            <h1>Savitarna</h1>

            <div class="mb-3">
                <label for="f_ignor_gross_wight">Ignoruoti Bruto svorį</label>
                <input type="checkbox" value=1 id="f_ignor_gross_wight" name="f_ignor_gross_wight">
            </div>

            <div class="mb-3">
                <label for="f_prevent_manual_entry">Rankinio (barkodo) įvedimo draudimas</label>
                <input type="checkbox" value=1 id="f_prevent_manual_entry" name="f_prevent_manual_entry">
            </div>

            <div class="mb-3">
                <label for="f_diviation_percentage" class="form-label">Paklaidos toleravimo %</label>
                <input type="text" class="form-control" name="f_diviation_percentage">
            </div>

            <div class="mb-3">
                <label for="f_imgurl" class="form-label">Nuotraukos URL</label>
                <input type="text" class="form-control" name="f_imgurl">
            </div>

            <div  class="mb-3" hidden>
                <label for="f_system1" class="form-label">System1</label>
                <input type="text" class="form-control" name="f_system1">
            </div>

            <div class="mb-3" hidden>
                <label for="f_system2" class="form-label">System2</label>
                <input type="text" class="form-control" name="f_system2">
            </div>

            <div class="mb-3" hidden>
                <label for="f_system3" class="form-label">System3</label>
                <input type="text" class="form-control" name="f_system3">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection
