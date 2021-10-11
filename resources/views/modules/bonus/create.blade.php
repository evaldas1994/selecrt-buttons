@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="post" action="{{ route('bonuses.store') }}">
            @csrf

            <div class="mb-3">
                <label for="f_employee_id" class="form-label">Darbuotojas</label>
                <select name="f_employee_id" id="f_employee_id">
                    <option value="0011905086">0011905086</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="f_bonus_name" class="form-label">Pavadinimas</label>
                <input type="text" class="form-control" name="f_bonus_name">
            </div>

            <div class="mb-3">
                <label for="f_value" class="form-label">Reikšmė</label>
                <input type="text" class="form-control" name="f_value" value="0.00">
            </div>

            <div class="mb-3">
                <label for="f_type" class="form-label">Tipas</label>
                <select name="f_type" id="f_type">
                    <option value="0">---</option>
                    <option value="1">Apmokestinama</option>
                    <option value="2">Neapmokestinama</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="f_date_from" class="form-label">Laikotarpis nuo</label>
                <input type="text" class="form-control" name="f_date_from">
            </div>

            <div class="mb-3">
                <label for="f_date_till" class="form-label">Laikotarpis iki</label>
                <input type="text" class="form-control" name="f_date_till">
            </div>

            <div class="mb-3">
                <label for="f_reason" class="form-label">Neatvykimo į darbą atvejai</label>
                <select name="f_reason" id="f_reason">
                    <option value="DN">DN - darbas naktį</option>
                    <option value="VD">VD - viršvalandinis darbas</option>
                    <option value="FD">FD - faktiškai dirbtas laikas</option>
                    <option value="KS">KS - darbas esant nukrypimams nuo normalių darbo sąlygų</option>
                    <option value="DP">DP - darbas poilsio ir švenčių dienomis</option>
                    <option value="BN">BN - budėjimas namuose</option>
                    <option value="BI">BĮ - budėjimas darbe</option>
                    <option value="ID">ID - laikas naujo darbo paieškoms</option>
                    <option value="MD">MD - privalomų medicininių apžiūrų laikas</option>
                    <option value="V">V - papildomos poilsio dienos, suteiktos už darbą virš kasdienio darbo laiko trukmės, darbą poilsio ir švenčių dienomis</option>
                    <option value="M">M - papildomas poilsio laikas darbuotojams, auginantiems neįgalų vaiką iki 18 metų arba du ir daugiau vaikų iki 12 metų</option>
                    <option value="D">D - kraujo davimo dienos donorams</option>
                    <option value="L">L - nedarbingumas dėl ligos ar traumų</option>
                    <option value="N">N - neapmokamas nedarbingumas</option>
                    <option value="NS">NS - nedarbingumas ligoniams slaugyti, turint pažymas</option>
                    <option value="A">A - kasmetinės atostogos</option>
                    <option value="MA">MA - mokymosi atostogos</option>
                    <option value="NA">NA - nemokamos atostogos</option>
                    <option value="KA">KA - kūrybinės atostogos</option>
                    <option value="G">G - nėštumo ir gimdymo atostogos</option>
                    <option value="TA">TA - tėvystės atostogos</option>
                    <option value="PV">PV - atostogos vaikui prižiūrėti, kol jam sueis 3 metai</option>
                    <option value="KR">KR - kitų rūšių atostogos</option>
                    <option value="K">K - tarnybinės komandiruotės</option>
                    <option value="SZ">SŽ - stažuotės</option>
                    <option value="KV">KV - kvalifikacijos kėlimas</option>
                    <option value="PR">PR - pertraukos darbe, pagal norminius teisės aktus įskaitomos į darbo laiką</option>
                    <option value="VV">VV - valstybinių, visuomeninių ar piliečio pareigų vykdymas</option>
                    <option value="KT">KT - karinė tarnyba</option>
                    <option value="KM">KM - mokomosios karinės pratybos</option>
                    <option value="PK">PK - prastovos dėl darbuotojo kaltės</option>
                    <option value="PN">PN - prastovos ne dėl darbuotojo kaltės</option>
                    <option value="PB">PB - pravaikštos ir kitoks neatvykimas į darbą be svarbios priežasties</option>
                    <option value="ND">ND - neatvykimas į darbą administracijai leidus</option>
                    <option value="NP">NP - neatvykimas į darbą kitais norminių teisės aktų nustatytais laikotarpiais</option>
                    <option value="NN">NN - nušalinimas nuo darbo</option>
                    <option value="P">P - poilsio dienos</option>
                    <option value="S">S - švenčių dienos</option>
                    <option value="ST">ST - streikas</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="f_description" class="form-label">Aprašymas</label>
                <input type="text" class="form-control" name="f_description">
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
