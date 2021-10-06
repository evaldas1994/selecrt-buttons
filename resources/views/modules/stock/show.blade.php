@extends('layouts.app')

@section('content')
    <div class="container">
        <p>Kodas: {{ $stock->f_id }}</p>
        <p>Pavadinimas: {{ $stock->f_name }}</p>
        <p>Pavadinimas 2: {{ $stock->f_name2 }}</p>
        <p>Prekės grupė: {{ $stock->f_groupid }}</p>
        <p>Mat. vnt.: {{ $stock->f_unitid }}</p>
        <p>Pakuotės mat. vnt.: {{ $stock->f_pack_unitid }}</p>
        <p>Kiekis pakuotėje: {{ $stock->f_pack_quant }}</p>
        <p>Tūris: {{ $stock->f_volume }}</p>
        <p>Svoris: {{ $stock->f_weight }}</p>
        <p>Min. kiekis: {{ $stock->f_min_quant }}</p>
        <p>Galioja dienų: {{ $stock->f_valid_days }}</p>
        <p>Galioja iki: {{ $stock->f_valid_date }}</p>
        <p>Fasuotė: {{ $stock->f_packing }}</p>
        <p>Kilmės šalis: {{ $stock->f_originating }}</p>
        <p>Gamintojas: {{ $stock->f_manufacturerid }}</p>
        <p>Pardavimo kaina 1: {{ $stock->f_price_sale1 }}</p>
        <p>Pardavimo kaina 2: {{ $stock->f_price_sale2 }}</p>
        <p>Pardavimo kaina 3: {{ $stock->f_price_sale3 }}</p>
        <p>Pardavimo kaina 4: {{ $stock->f_price_sale4 }}</p>
        <p>Pardavimo kaina 5: {{ $stock->f_price_sale5 }}</p>
        <p>Nuolaida: {{ $stock->f_discid }}</p>
        <p>Pirk. kaina: {{ $stock->f_price_purch }}</p>
        <p>PVM proc.: {{ $stock->f_vat_perc }}</p>
        <p>PVM kodas: {{ $stock->f_vatid }}</p>
        <p>Alternatyvi prekė: {{ $stock->f_main_stockid }}</p>
        <p>Tiekėjo nuolaida: {{ $stock->f_partner_discount }}</p>
        <p>Svoris (bruto): {{ $stock->f_gross_weight }}</p>
        <p>Tipas: {{ $stock->f_type }}</p>
        <p>Sveriama: {{ $stock->f_weightsign }}</p>
        <p>Gaminama: {{ $stock->f_product }}</p>
        <p>Siųsti į svarstykles: {{ $stock->f_scalesign }}</p>
        <p>Valiuta: {{ $stock->f_curid }}</p>
        <p>Tiekejo kodas: {{ $stock->f_partnerid }}</p>
        <p>Tiekejo kodas: {{ $stock->f_code }}</p>
        <p>Sąskaita: {{ $stock->f_accountid }}</p>
        <p>Sudėtis: {{ $stock->f_ingredients }}</p>
        <p>Etiketės aprašymas 1: {{ $stock->f_stock_text1 }}</p>
        <p>Etiketės aprašymas 2: {{ $stock->f_stock_text2 }}</p>
        <p>Etiketės aprašymas 3: {{ $stock->f_stock_text3 }}</p>
        <p>Tuščia pakuotė: {{ $stock->f_empty_pack }}</p>

        <h1> Papildomas </h1>

        <p>Laukas1: {{ $stock->f_f1 }}</p>
        <p>Laukas2: {{ $stock->f_f2 }}</p>
        <p>Laukas3: {{ $stock->f_f3 }}</p>
        <p>Laukas4: {{ $stock->f_f4 }}</p>
        <p>Laukas5: {{ $stock->f_f5 }}</p>
        <p>Aukstis: {{ $stock->f_height }}</p>
        <p>Plotis: {{ $stock->f_width }}</p>
        <p>Ilgis: {{ $stock->f_length }}</p>
        <p>Alternatyvi grupė: {{ $stock->f_alternative_group_id }}</p>
        <p>Galioja iki: {{ $stock->f_r1id }}</p>
        <p>Registras 2: {{ $stock->f_r2id }}</p>
        <p>Registras 3: {{ $stock->f_r3id }}</p>
        <p>Registras 4: {{ $stock->f_r4id }}</p>
        <p>Registras 5: {{ $stock->f_r5id }}</p>
        <p>Padalinys: {{ $stock->f_departmentid }}</p>
        <p>Asmuo: {{ $stock->f_personid }}</p>
        <p>Projektas: {{ $stock->f_projectid }}</p>
        <p>Kiekis paletėje: {{ $stock->f_quantity }}</p>
        <p>Požymis 1: {{ $stock->f_mark1 }}</p>
        <p>Požymis 2: {{ $stock->f_mark2 }}</p>
        <p>Požymis 3: {{ $stock->f_mark3 }}</p>
        <p>Požymis 4: {{ $stock->f_mark4 }}</p>
        <p>Požymis 5: {{ $stock->f_mark5 }}</p>
        <p>Požymis 6: {{ $stock->f_mark6 }}</p>
        <p>Požymis 7: {{ $stock->f_mark7 }}</p>
        <p>Požymis 8: {{ $stock->f_mark8 }}</p>
        <p>Blokuota: {{ $stock->f_locked }}</p>
        <p>Blokuoti pardavimams: {{ $stock->f_sales_block }}</p>
        <p>Blokuoti Pikimams: {{ $stock->f_purch_block }}</p>
        <p>Blokuoti Užsakymams: {{ $stock->f_order_block }}</p>
        <p>Įtraukti į katalogą: {{ $stock->f_catalog_item }}</p>
        <p>Prioritetas kataloge: {{ $stock->f_disp_priority }}</p>

        <h3>GPAIS Registrai:</h3>

        <p>Pirkimas: {{ $stock->f_gpais_i }}</p>
        <p>Pardavimas: {{ $stock->f_gpais_a }}</p>
        <p>Nurašymas: {{ $stock->f_gpais_n }}</p>
        <p>Gpais pakuotės tipas: {{ $stock->f_pack_type }}</p>
        <p>Paveikslėlis: {{ $stock->f_image }}</p>

        <h1>Savitarna</h1>

        <p>Ignoruoti Bruto svorį: {{ $stock->f_ignor_gross_wight }}</p>
        <p>Rankinio (barkodo) įvedimo draudimas: {{ $stock->f_prevent_manual_entry }}</p>
        <p>Paklaidos toleravimo %: {{ $stock->f_diviation_percentage }}</p>
        <p>Nuotraukos URL: {{ $stock->f_imgurl }}</p>


        <a href="{{ route('stocks.edit', $stock->f_id) }}">Edit</a>

        <form method="post" action="{{ route('stocks.destroy', $stock->f_id) }}">

            @method('DELETE')
            @csrf
            <button type="submit">Delete</button>
        </form>

    </div>
@endsection
