@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="post" action="{{ route('bonuses.update', $bonus->f_id) }}">
            @method('PATCH')
            @csrf

            <div class="mb-3">
                <label for="f_employee_id" class="form-label">Darbuotojas</label>
                <select name="f_employee_id" id="f_employee_id">
                    <option value="0011905086">0011905086</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="f_bonus_name" class="form-label">Pavadinimas</label>
                <input type="text" class="form-control" name="f_bonus_name" value="{{ $bonus->f_bonus_name }}">
            </div>

            <div class="mb-3">
                <label for="f_value" class="form-label">Reikšmė</label>
                <input type="text" class="form-control" name="f_value" value="{{ $bonus->f_value }}">
            </div>

            <div class="mb-3">
                <label for="f_type" class="form-label">Tipas</label>
                <select name="f_type" id="f_type">
                    <option value=0 {{ $bonus->f_type === 0 ? 'selected' : '' }}>---</option>
                    <option value=1 {{ $bonus->f_type === 1 ? 'selected' : '' }}>Apmokestinama</option>
                    <option value=2 {{ $bonus->f_type === 2 ? 'selected' : '' }}>Neapmokestinama</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="f_date_from" class="form-label">Laikotarpis nuo</label>
                <input type="text" class="form-control" name="f_date_from" value="{{ $bonus->f_date_from }}">
            </div>

            <div class="mb-3">
                <label for="f_date_till" class="form-label">Laikotarpis iki</label>
                <input type="text" class="form-control" name="f_date_till" value="{{ $bonus->f_date_till }}">
            </div>

            <div class="mb-3">
                <label for="f_reason" class="form-label">Neatvykimo į darbą atvejai</label>
                <select name="f_reason" id="f_reason">
                    <option value="DN" {{ $bonus->f_reason === 'DN' ? 'selected' : '' }}>DN - darbas naktį</option>
                    <option value="VD" {{ $bonus->f_reason === 'VD' ? 'selected' : '' }}>VD - viršvalandinis darbas</option>
                    <option value="FD" {{ $bonus->f_reason === 'FD' ? 'selected' : '' }}>FD - faktiškai dirbtas laikas</option>
                    <option value="KS" {{ $bonus->f_reason === 'KS' ? 'selected' : '' }}>KS - darbas esant nukrypimams nuo normalių darbo sąlygų</option>
                    <option value="DP" {{ $bonus->f_reason === 'DP' ? 'selected' : '' }}>DP - darbas poilsio ir švenčių dienomis</option>
                    <option value="BN" {{ $bonus->f_reason === 'BN' ? 'selected' : '' }}>BN - budėjimas namuose</option>
                    <option value="BI" {{ $bonus->f_reason === 'BI' ? 'selected' : '' }}>BĮ - budėjimas darbe</option>
                    <option value="ID" {{ $bonus->f_reason === 'ID' ? 'selected' : '' }}>ID - laikas naujo darbo paieškoms</option>
                    <option value="MD" {{ $bonus->f_reason === 'MD' ? 'selected' : '' }}>MD - privalomų medicininių apžiūrų laikas</option>
                    <option value="V" {{ $bonus->f_reason === 'V' ? 'selected' : '' }}>V - papildomos poilsio dienos, suteiktos už darbą virš kasdienio darbo laiko trukmės, darbą poilsio ir švenčių dienomis</option>
                    <option value="M" {{ $bonus->f_reason === 'M' ? 'selected' : '' }}>M - papildomas poilsio laikas darbuotojams, auginantiems neįgalų vaiką iki 18 metų arba du ir daugiau vaikų iki 12 metų</option>
                    <option value="D" {{ $bonus->f_reason === 'D' ? 'selected' : '' }}>D - kraujo davimo dienos donorams</option>
                    <option value="L" {{ $bonus->f_reason === 'L' ? 'selected' : '' }}>L - nedarbingumas dėl ligos ar traumų</option>
                    <option value="N" {{ $bonus->f_reason === 'N' ? 'selected' : '' }}>N - neapmokamas nedarbingumas</option>
                    <option value="NS" {{ $bonus->f_reason === 'NS' ? 'selected' : '' }}>NS - nedarbingumas ligoniams slaugyti, turint pažymas</option>
                    <option value="A" {{ $bonus->f_reason === 'A' ? 'selected' : '' }}>A - kasmetinės atostogos</option>
                    <option value="MA" {{ $bonus->f_reason === 'MA' ? 'selected' : '' }}>MA - mokymosi atostogos</option>
                    <option value="NA" {{ $bonus->f_reason === 'NA' ? 'selected' : '' }}>NA - nemokamos atostogos</option>
                    <option value="KA" {{ $bonus->f_reason === 'KA' ? 'selected' : '' }}>KA - kūrybinės atostogos</option>
                    <option value="G" {{ $bonus->f_reason === 'G' ? 'selected' : '' }}>G - nėštumo ir gimdymo atostogos</option>
                    <option value="TA" {{ $bonus->f_reason === 'TA' ? 'selected' : '' }}>TA - tėvystės atostogos</option>
                    <option value="PV" {{ $bonus->f_reason === 'PV' ? 'selected' : '' }}>PV - atostogos vaikui prižiūrėti, kol jam sueis 3 metai</option>
                    <option value="KR" {{ $bonus->f_reason === 'KR' ? 'selected' : '' }}>KR - kitų rūšių atostogos</option>
                    <option value="K" {{ $bonus->f_reason === 'K' ? 'selected' : '' }}>K - tarnybinės komandiruotės</option>
                    <option value="SZ" {{ $bonus->f_reason === 'SZ' ? 'selected' : '' }}>SŽ - stažuotės</option>
                    <option value="KV" {{ $bonus->f_reason === 'KV' ? 'selected' : '' }}>KV - kvalifikacijos kėlimas</option>
                    <option value="PR" {{ $bonus->f_reason === 'PR' ? 'selected' : '' }}>PR - pertraukos darbe, pagal norminius teisės aktus įskaitomos į darbo laiką</option>
                    <option value="VV" {{ $bonus->f_reason === 'VV' ? 'selected' : '' }}>VV - valstybinių, visuomeninių ar piliečio pareigų vykdymas</option>
                    <option value="KT" {{ $bonus->f_reason === 'KT' ? 'selected' : '' }}>KT - karinė tarnyba</option>
                    <option value="KM" {{ $bonus->f_reason === 'KM' ? 'selected' : '' }}>KM - mokomosios karinės pratybos</option>
                    <option value="PK" {{ $bonus->f_reason === 'PK' ? 'selected' : '' }}>PK - prastovos dėl darbuotojo kaltės</option>
                    <option value="PN" {{ $bonus->f_reason === 'PN' ? 'selected' : '' }}>PN - prastovos ne dėl darbuotojo kaltės</option>
                    <option value="PB" {{ $bonus->f_reason === 'PB' ? 'selected' : '' }}>PB - pravaikštos ir kitoks neatvykimas į darbą be svarbios priežasties</option>
                    <option value="ND" {{ $bonus->f_reason === 'ND' ? 'selected' : '' }}>ND - neatvykimas į darbą administracijai leidus</option>
                    <option value="NP" {{ $bonus->f_reason === 'NP' ? 'selected' : '' }}>NP - neatvykimas į darbą kitais norminių teisės aktų nustatytais laikotarpiais</option>
                    <option value="NN" {{ $bonus->f_reason === 'NN' ? 'selected' : '' }}>NN - nušalinimas nuo darbo</option>
                    <option value="P" {{ $bonus->f_reason === 'P' ? 'selected' : '' }}>P - poilsio dienos</option>
                    <option value="S" {{ $bonus->f_reason === 'S' ? 'selected' : '' }}>S - švenčių dienos</option>
                    <option value="ST" {{ $bonus->f_reason === 'ST' ? 'selected' : '' }}>ST - streikas</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="f_description" class="form-label">Aprašymas</label>
                <input type="text" class="form-control" name="f_description" value="{{ $bonus->f_description }}">
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
