@extends('layouts.app')

@section('content')
    <div class="container">
        <p>Kodas: {{ $partner->f_id }}</p>
        <p>Pavadinimas: {{ $partner->f_name }}</p>
        <p>Pavadinimas 2: {{ $partner->f_name2 }}</p>
        <p>Prekės grupė: {{ $partner->f_groupid }}</p>
        <p>Įmonės kodas: {{ $partner->f_code }}</p>
        <p>PVM kodas: {{ $partner->f_vat_code }}</p>
        <p>Kont. asmuo: {{ $partner->f_person }}</p>
        <p>Pareigos: {{ $partner->f_post }}</p>
        <p>Telefonas: {{ $partner->f_phone }}</p>
        <p>Faksas: {{ $partner->f_fax }}</p>
        <p>El. paštas: {{ $partner->f_email }}</p>
        <p>Sudėtis: {{ $partner->f_address }}</p>
        <p>Valiuta: {{ $partner->f_curid }}</p>
        <p>Kredito limitas: {{ $partner->f_credit }}</p>
        <p>Apmokėti per: {{ $partner->f_pay_days }}</p>
        <p>Kainų lygis: {{ $partner->f_unitid }}</p>
        <p>Mokėtojas: {{ $partner->f_partnerid }}</p>
        <p>Pirkėjo sqskaita: {{ $partner->f_accountid1 }}</p>
        <p>Tiekėjo sąskaita: {{ $partner->f_accountid2 }}</p>
        <p>Pranešimų grupė: {{ $partner->f_messagegroupid }}</p>
        <p>Nuol. kortelės nr.: {{ $partner->f_discount_card }}</p>
        <p>Nuol. kort. balansas: {{ $partner->f_discount_card_balance }}</p>
        <p>Nepanaudotas balansas: {{ $partner->f_discount_card_balance3 }}</p>
        <p>Juridinis statusas: {{ $partner->f_legal_status }}</p>
        <p>Pirkėjas: {{ $partner->f_buyer }}</p>
        <p>Blokuotas: {{ $partner->f_locked }}</p>
        <p>Tiekėjo kodas: {{ $partner->f_seller }}</p>
        <p>Registras1: {{ $partner->f_r1id }}</p>
        <p>Registras2: {{ $partner->f_r2id }}</p>
        <p>Registras3: {{ $partner->f_r3id }}</p>
        <p>Registras4: {{ $partner->f_r4id }}</p>
        <p>Registras5: {{ $partner->f_r5id }}</p>
        <p>Padalinys: {{ $partner->f_departmentid }}</p>
        <p>Asmuo: {{ $partner->f_personid }}</p>
        <p>Projektas: {{ $partner->f_projectid }}</p>
        <p>Nuol. kort. aktyvumas: {{ $partner->f_discount_card_active }}</p>
        <p>Nuol. kort. balansas 2: {{ $partner->f_discount_card_balance2 }}</p>
        <p>Panaudoti taškus iki: {{ $partner->f_discount_card_balance3_date }}</p>
        <p>PVM(iSAF): {{ $partner->f_vatid }}</p>

        <h1>Papildomas</h1>

        <p>Laukas1: {{ $partner->f_f1 }}</p>
        <p>Laukas2: {{ $partner->f_f2 }}</p>
        <p>Laukas3: {{ $partner->f_f3 }}</p>
        <p>Laukas4: {{ $partner->f_f4 }}</p>
        <p>Laukas5: {{ $partner->f_f5 }}</p>
        <p>Lytis: {{ $partner->f_legal_status }}</p>
        <p>Gimimo data: {{ $partner->f_birthday }}</p>
        <p>Šalis (ISO kodas): {{ $partner->f_country }}</p>
        <p>Požymis 1: {{ $partner->f_mark1 }}</p>
        <p>Požymis 2: {{ $partner->f_mark2 }}</p>
        <p>Požymis 3: {{ $partner->f_mark3 }}</p>
        <p>Požymis 4: {{ $partner->f_mark4 }}</p>
        <p>Požymis 5: {{ $partner->f_mark5 }}</p>
        <p>Negeneruoti pard. kainų: {{ $partner->f_notgenerate_sale_price }}</p>
        <p>Negeneruoti pirk. kainų: {{ $partner->f_notgenerate_purch_price }}</p>
        <p>Siųsti sms padidėjus balansui: {{ $partner->f_send_on_decrease }} {{ $partner->f_sms_text1 }}</p>
        <p>Siųsti sms sumažėjus balansui: {{ $partner->f_send_on_increase }} {{ $partner->f_sms_text2 }}</p>
        <p>Siųsti sms savaitinį balansą: {{ $partner->f_send_weekly }} {{ $partner->f_sms_text3 }}</p>
        <p>Tiesioginio debeto sutartis: {{ $partner->f_direct_debit }}</p>
        <p>Atsiskaitoma grynais: {{ $partner->f_pay_in_cash }}</p>
        <p>Integracijose naudoti mok. terminą: {{ $partner->f_use_pay_days }}</p>
        <p>Bankas: {{ $partner->f_direct_debit_bank }}</p>
        <p>Kodas banke: {{ $partner->f_direct_debit_code }}</p>
        <p>Sutarties nr.: {{ $partner->f_direct_debit_no }}</p>
        <p>Sutarties nuoroda: {{ $partner->f_act_url }}</p>
        <p>Maksimali suma: {{ $partner->f_direct_debit_limit }}</p>
        <p>EDI eksportas: {{ $partner->f_edi_export }}</p>
        <p>Galioja nuo: {{ $partner->f_direct_debit_date1 }}</p>
        <p>Galioja iki: {{ $partner->f_direct_debit_date2 }}</p>
        <p>Edi kliento ILN numeris: {{ $partner->f_iln_edisoft }}</p>
        <p>Edi filialas: {{ $partner->f_edi_storeid }}</p>
        <p>EDI pristatymo ILN: {{ $partner->f_edi_delivery_iln }}</p>
        <p>DK šablonas: {{ $partner->f_templateid }}</p>
        <p>Pirkimo grąž. DK šablonas: {{ $partner->f_templateid2 }}</p>

        <a href="{{ route('partners.edit', $partner->f_id) }}">Edit</a>

        <form method="post" action="{{ route('partners.destroy', $partner->f_id) }}">
            @method('DELETE')
            @csrf

            <button type="submit">Delete</button>
        </form>

    </div>
@endsection
