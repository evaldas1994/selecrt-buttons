@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="post" action="{{ route('partners.store') }}">
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
                </select>
            </div>

            <div class="mb-3">
                <label for="f_code" class="form-label">Įmonės kodas</label>
                <input type="text" class="form-control" name="f_code">
            </div>

            <div class="mb-3">
                <label for="f_vat_code" class="form-label">PVM kodas</label>
                <input type="text" class="form-control" name="f_vat_code">
            </div>

            <div class="mb-3">
                <label for="f_person" class="form-label">Kont. asmuo</label>
                <input type="text" class="form-control" name="f_person">
            </div>

            <div class="mb-3">
                <label for="f_post" class="form-label">Pareigos</label>
                <input type="text" class="form-control" name="f_post">
            </div>

            <div class="mb-3">
                <label for="f_phone" class="form-label">Telefonas</label>
                <input type="text" class="form-control" name="f_phone">
            </div>

            <div class="mb-3">
                <label for="f_fax" class="form-label">Faksas</label>
                <input type="text" class="form-control" name="f_fax">
            </div>

            <div class="mb-3">
                <label for="f_email" class="form-label">El. paštas</label>
                <input type="text" class="form-control" name="f_email">
            </div>

            <div class="mb-3">
                <label for="f_address" class="form-label">Sudėtis</label>
                <textarea id="f_address" name="f_address" rows="4" cols="50">
                </textarea>
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
                <label for="f_credit" class="form-label">Kredito limitas</label>
                <input type="text" class="form-control" name="f_credit" value=0.0000>
            </div>

            <div class="mb-3">
                <label for="f_pay_days" class="form-label">Apmokėti per</label>
                <input type="text" class="form-control" name="f_pay_days" value=0>
            </div>

            <div class="mb-3">
                <label for="f_price_level" class="form-label">Kainų lygis</label>
                <select name="f_price_level" id="f_price_level">
                    <option value=1>1 - pirmas</option>
                    <option value=2>2 - antras</option>
                    <option value=3>3 - trečias</option>
                    <option value=4>4 - ketvirtas</option>
                    <option value=5>5 - penktas</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="f_partnerid" class="form-label">Mokėtojas</label>
                <select name="f_partnerid" id="f_partnerid">

                </select>
            </div>

            <div class="mb-3">
                <label for="f_accountid1" class="form-label">Pirkėjo sqskaita</label>
                <select name="f_accountid1" id="f_accountid1">
                    @foreach($accounts as $account)
                        <option value="{{ $account->f_id }}">{{ $account->f_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="f_accountid2" class="form-label">Tiekėjo sąskaita</label>
                <select name="f_accountid2" id="f_accountid2">
                    @foreach($accounts as $account)
                        <option value="{{ $account->f_id }}">{{ $account->f_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="f_messagegroupid" class="form-label">Pranešimų grupė</label>
                <select name="f_messagegroupid" id="f_messagegroupid">

                </select>
            </div>

            <div class="mb-3">
                <label for="f_discount_card" class="form-label">Nuol. kortelės nr.</label>
                <input type="text" class="form-control" name="f_discount_card">
            </div>


            <div class="mb-3">
                <label for="f_discount_card_balance" class="form-label">Nuol. kort. balansas</label>
                <input type="text" class="form-control" name="f_discount_card_balance" value=0.0000>
            </div>

            <div class="mb-3">
                <label for="f_discount_card_balance3" class="form-label">Nepanaudotas balansas</label>
                <input type="text" class="form-control" name="f_discount_card_balance3" value=0.0000>
            </div>

            <div class="mb-3">
                <label for="f_legal_status" class="form-label">Juridinis statusas</label>
                <select name="f_legal_status" id="f_legal_status">
                    <option value=0>0 - nenurodyta</option>
                    <option value="F">F - Fizinis asmuo</option>
                    <option value="J">j - Juridinis asmuo</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="f_buyer">Pirkėjas</label>
                <input type="checkbox" value=1 id="f_buyer" name="f_buyer">
            </div>

            <div class="mb-3">
                <label for="f_locked">Blokuotas</label>
                <input type="checkbox" value=1 id="f_locked" name="f_locked">
            </div>

            <div class="mb-3">
                <label for="f_seller">Tiekėjo kodas</label>
                <input type="checkbox" value=1 id="f_seller" name="f_seller">
            </div>

            <div class="mb-3">
                <label for="f_r1id" class="form-label">Registras1</label>
                <select name="f_r1id" id="f_r1id">
                    @foreach($registers1 as $register1)
                        <option value="{{ $register1->f_id }}">{{ $register1->f_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="f_r2id" class="form-label">Registras 2</label>
                <select name="f_r2id" id="f_r2id">
                    @foreach($registers2 as $register2)
                        <option value="{{ $register2->f_id }}">{{ $register2->f_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="f_r3id" class="form-label">Registras 3</label>
                <select name="f_r3id" id="f_r3id">
                    @foreach($registers3 as $register3)
                        <option value="{{ $register3->f_id }}">{{ $register3->f_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="f_r4id" class="form-label">Registras 4</label>
                <select name="f_r4id" id="f_r4id">
                    @foreach($registers4 as $register4)
                        <option value="{{ $register4->f_id }}">{{ $register4->f_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="f_r5id" class="form-label">Registras 5</label>
                <select name="f_r5id" id="f_r5id">
                    @foreach($registers5 as $register5)
                        <option value="{{ $register5->f_id }}">{{ $register5->f_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="f_departmentid" class="form-label">Padalinys</label>
                <select name="f_departmentid" id="f_departmentid">
                </select>
            </div>

            <div class="mb-3">
                <label for="f_personid" class="form-label">Asmuo</label>
                <select name="f_personid" id="f_personid">
                    @foreach($persons as $person)
                        <option value="{{ $person->f_id }}">{{ $person->f_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="f_projectid" class="form-label">Projektas</label>
                <select name="f_projectid" id="f_projectid">
                    @foreach($projects as $project)
                        <option value="{{ $project->f_id }}">{{ $project->f_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="f_discount_card_active">Nuol. kort. aktyvumas</label>
                <input type="checkbox" value=1 id="f_discount_card_active" name="f_discount_card_active">
            </div>

            <div class="mb-3">
                <label for="f_discount_card_balance2" class="form-label">Nuol. kort. balansas 2</label>
                <input type="text" class="form-control" name="f_discount_card_balance2" value=0.0000>
            </div>

            <div class="mb-3">
                <label for="f_discount_card_balance3_date" class="form-label">Panaudoti taškus iki</label>
                <input type="text" class="form-control" name="f_discount_card_balance3_date">
            </div>

            <div class="mb-3">
                <label for="f_vatid" class="form-label">PVM(iSAF)</label>
                <select name="f_vatid" id="f_vatid">

                </select>
            </div>



            <h1>Papildomas</h1>





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
                <label for="f_legal_status" class="form-label">Lytis</label>
                <select name="f_legal_status" id="f_legal_status">
                    <option value=0>0 - nenurodyta</option>
                    <option value="M">M - Vyras</option>
                    <option value="F">F - Moteris</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="f_birthday" class="form-label">Gimimo data</label>
                <input type="text" class="form-control" name="f_birthday">
            </div>

            <div class="mb-3">
                <label for="f_country" class="form-label">Šalis (ISO kodas)</label>
                <input type="text" class="form-control" name="f_country">
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
                <label for="f_notgenerate_sale_price">Negeneruoti pard. kainų</label>
                <input type="checkbox" value=1 id="f_notgenerate_sale_price" name="f_notgenerate_sale_price">
            </div>

            <div class="mb-3">
                <label for="f_notgenerate_purch_price">Negeneruoti pirk. kainų</label>
                <input type="checkbox" value=1 id="f_notgenerate_purch_price" name="f_notgenerate_purch_price">
            </div>

            <div class="mb-3">
                <label for="f_send_on_increase">Siųsti sms padidėjus balansui</label>
                <input type="checkbox" value=1 id="f_send_on_decrease" name="f_send_on_decrease">
                <input type="text" class="form-control" name="f_sms_text1" placeholder="Išraiška %balance2% bus pakeista balansu.">
            </div>

            <div class="mb-3">
                <label for="f_send_on_increase">Siųsti sms sumažėjus balansui</label>
                <input type="checkbox" value=1 id="f_send_on_increase" name="f_send_on_increase">
                <input type="text" class="form-control" name="f_sms_text2" placeholder="Išraiška %balance2% bus pakeista balansu.">
            </div>

            <div class="mb-3">
                <label for="f_send_weekly">Siųsti sms savaitinį balansą</label>
                <input type="checkbox" value=1 id="f_send_weekly" name="f_send_weekly">
                <input type="text" class="form-control" name="f_sms_text3" placeholder="Išraiška %balance2% bus pakeista balansu.">
            </div>

            <div class="mb-3">
                <label for="f_direct_debit">Tiesioginio debeto sutartis</label>
                <input type="checkbox" value=1 id="f_direct_debit" name="f_direct_debit">
            </div>

            <div class="mb-3">
                <label for="f_pay_in_cash">Atsiskaitoma grynais</label>
                <input type="checkbox" value=1 id="f_pay_in_cash" name="f_pay_in_cash">
            </div>

            <div class="mb-3">
                <label for="f_use_pay_days">Integracijose naudoti mok. terminą</label>
                <input type="checkbox" value=1 id="f_use_pay_days" name="f_use_pay_days">
            </div>

            <div class="mb-3">
                <label for="f_direct_debit_bank" class="form-label">Bankas</label>
                <select name="f_direct_debit_bank" id="f_direct_debit_bank">

                </select>
            </div>

            <div class="mb-3">
                <label for="f_direct_debit_code" class="form-label">Kodas banke</label>
                <input type="text" class="form-control" name="f_direct_debit_code">
            </div>

            <div class="mb-3">
                <label for="f_direct_debit_no" class="form-label">Sutarties nr.</label>
                <input type="text" class="form-control" name="f_direct_debit_no">
            </div>

            <div class="mb-3">
                <label for="f_act_url" class="form-label">Sutarties nuoroda</label>
                <input type="text" class="form-control" name="f_act_url">
            </div>

            <div class="mb-3">
                <label for="f_direct_debit_limit" class="form-label">Maksimali suma</label>
                <input type="text" class="form-control" name="f_direct_debit_limit" value=0.0000>
            </div>

            <div class="mb-3">
                <label for="f_edi_export" class="form-label">EDI eksportas</label>
                <select name="f_edi_export" id="f_edi_export">
                    <option value=0>0 - SF</option>
                    <option value=1>0 - Važtaraštis</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="f_direct_debit_date1" class="form-label">Galioja nuo</label>
                <input type="text" class="form-control" name="f_direct_debit_date1">
            </div>

            <div class="mb-3">
                <label for="f_direct_debit_date2" class="form-label">Galioja iki</label>
                <input type="text" class="form-control" name="f_direct_debit_date2">
            </div>

            <div class="mb-3">
                <label for="f_iln_edisoft" class="form-label">Edi kliento ILN numeris</label>
                <input type="text" class="form-control" name="f_iln_edisoft">
            </div>

            <div class="mb-3">
                <label for="f_edi_storeid" class="form-label">Edi filialas</label>
                <select name="f_edi_storeid" id="f_edi_storeid">

                </select>
            </div>

            <div class="mb-3">
                <label for="f_edi_delivery_iln" class="form-label">EDI pristatymo ILN</label>
                <input type="text" class="form-control" name="f_edi_delivery_iln">
            </div>

            <div class="mb-3">
                <label for="f_templateid" class="form-label">DK šablonas</label>
                <select name="f_templateid" id="f_templateid">

                </select>
            </div>

            <div class="mb-3">
                <label for="f_templateid2" class="form-label">Pirkimo grąž. DK šablonas</label>
                <select name="f_templateid2" id="f_templateid2">

                </select>
            </div>

            <div class="mb-3" hidden>
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
