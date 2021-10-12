@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="post" action="{{ route('templates.store') }}">
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
                <label for="f_consignment">Konsignacija</label>
                <input type="hidden" name="f_consignment" value="0">
                <input type="checkbox" value="1" id="f_consignment" name="f_consignment">
            </div>

            <div class="mb-3">
                <label for="f_op" class="form-label">Operacija</label>
                <select name="f_op" id="f_op">
                    <option value="P">P - pajamavimas</option>
                    <option value="N">N - nurašymas</option>
                    <option value="E">E - perkėlimas</option>
                    <option value="A">A - pardavimas</option>
                    <option value="I">I - pirkimas</option>
                    <option value="R">R - pardavimo grąžinimas</option>
                    <option value="Z">Z - pirkimo grąžinimas</option>
                    <option value="J">J - turto pajamavimas</option>
                    <option value="U">U - turto nurašymas</option>
                    <option value="K">K - turto perkėlimas</option>
                    <option value="V">V - turto perkainojimas</option>
                    <option value="D">D - turto nusidėvėjimas</option>
                    <option value="S">S - atlyginimas</option>
                    <option value="L">L - DK operacijos</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="f_groupid" class="form-label">Prekės grupė</label>
                <select name="f_groupid" id="f_groupid">
                </select>
            </div>


            <h3>Savikaina:</h3>

            <div class="mb-3">
                <label for="f_description1" class="form-label">Aprašymas</label>
                <input type="text" class="form-control" name="f_description1">
            </div>

            <div class="mb-3">
                <label for="f_deb_account1" class="form-label">Debetas</label>
                <select name="f_deb_account1" id="f_deb_account1">
                    <option value>---</option>
                    <option value>---</option>
                    @foreach($accounts as $account)
                        <option value="{{ $account->f_id }}">{{ $account->f_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="f_cred_account1" class="form-label">Kreditas</label>
                <select name="f_cred_account1" id="f_cred_account1">
                    <option value>---</option>
                    @foreach($accounts as $account)
                        <option value="{{ $account->f_id }}">{{ $account->f_name }}</option>
                    @endforeach
                </select>
            </div>

            <h3>Prek. pard. suma:</h3>

            <div class="mb-3">
                <label for="f_description2" class="form-label">Aprašymas</label>
                <input type="text" class="form-control" name="f_description2">
            </div>

            <div class="mb-3">
                <label for="f_deb_account2" class="form-label">Debetas</label>
                <select name="f_deb_account2" id="f_deb_account2">
                    <option value>---</option>
                    @foreach($accounts as $account)
                        <option value="{{ $account->f_id }}">{{ $account->f_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="f_cred_account2" class="form-label">Kreditas</label>
                <select name="f_cred_account2" id="f_cred_account2">
                    <option value>---</option>
                    @foreach($accounts as $account)
                        <option value="{{ $account->f_id }}">{{ $account->f_name }}</option>
                    @endforeach
                </select>
            </div>

            <h3>Pasl. pard. suma:</h3>

            <div class="mb-3">
                <label for="f_description3" class="form-label">Aprašymas</label>
                <input type="text" class="form-control" name="f_description3">
            </div>

            <div class="mb-3">
                <label for="f_deb_account3" class="form-label">Debetas</label>
                <select name="f_deb_account3" id="f_deb_account3">
                    <option value>---</option>
                    @foreach($accounts as $account)
                        <option value="{{ $account->f_id }}">{{ $account->f_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="f_cred_account3" class="form-label">Kreditas</label>
                <select name="f_cred_account3" id="f_cred_account3">
                    <option value>---</option>
                    @foreach($accounts as $account)
                        <option value="{{ $account->f_id }}">{{ $account->f_name }}</option>
                    @endforeach
                </select>
            </div>

            <h3>Pap. pasl. pard. suma:</h3>

            <div class="mb-3">
                <label for="f_description16" class="form-label">Aprašymas</label>
                <input type="text" class="form-control" name="f_description16">
            </div>

            <div class="mb-3">
                <label for="f_deb_account16" class="form-label">Debetas</label>
                <select name="f_deb_account16" id="f_deb_account16">
                    <option value>---</option>
                    @foreach($accounts as $account)
                        <option value="{{ $account->f_id }}">{{ $account->f_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="f_cred_account16" class="form-label">Kreditas</label>
                <select name="f_cred_account16" id="f_cred_account16">
                    <option value>---</option>
                    @foreach($accounts as $account)
                        <option value="{{ $account->f_id }}">{{ $account->f_name }}</option>
                    @endforeach
                </select>
            </div>

            <h3>PVM:</h3>

            <div class="mb-3">
                <label for="f_description4" class="form-label">Aprašymas</label>
                <input type="text" class="form-control" name="f_description4">
            </div>

            <div class="mb-3">
                <label for="f_deb_account4" class="form-label">Debetas</label>
                <select name="f_deb_account4" id="f_deb_account4">
                    <option value>---</option>
                    @foreach($accounts as $account)
                        <option value="{{ $account->f_id }}">{{ $account->f_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="f_cred_account4" class="form-label">Kreditas</label>
                <select name="f_cred_account4" id="f_cred_account4">
                    <option value>---</option>
                    @foreach($accounts as $account)
                        <option value="{{ $account->f_id }}">{{ $account->f_name }}</option>
                    @endforeach
                </select>
            </div>

            <h3>Nuolaida (-):</h3>

            <div class="mb-3">
                <label for="f_description5" class="form-label">Aprašymas</label>
                <input type="text" class="form-control" name="f_description5">
            </div>

            <div class="mb-3">
                <label for="f_deb_account5" class="form-label">Debetas</label>
                <select name="f_deb_account5" id="f_deb_account5">
                    <option value>---</option>
                    @foreach($accounts as $account)
                        <option value="{{ $account->f_id }}">{{ $account->f_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="f_cred_account5" class="form-label">Kreditas</label>
                <select name="f_cred_account5" id="f_cred_account5">
                    <option value>---</option>
                    @foreach($accounts as $account)
                        <option value="{{ $account->f_id }}">{{ $account->f_name }}</option>
                    @endforeach
                </select>
            </div>

            <h3>Prek. pirk. suma:</h3>

            <div class="mb-3">
                <label for="f_description6" class="form-label">Aprašymas</label>
                <input type="text" class="form-control" name="f_description6">
            </div>

            <div class="mb-3">
                <label for="f_deb_account6" class="form-label">Debetas</label>
                <select name="f_deb_account6" id="f_deb_account6">
                    <option value>---</option>
                    @foreach($accounts as $account)
                        <option value="{{ $account->f_id }}">{{ $account->f_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="f_cred_account6" class="form-label">Kreditas</label>
                <select name="f_cred_account6" id="f_cred_account6">
                    <option value>---</option>
                    @foreach($accounts as $account)
                        <option value="{{ $account->f_id }}">{{ $account->f_name }}</option>
                    @endforeach
                </select>
            </div>

            <h3>Pasl. pirk. suma:</h3>

            <div class="mb-3">
                <label for="f_description7" class="form-label">Aprašymas</label>
                <input type="text" class="form-control" name="f_description7">
            </div>

            <div class="mb-3">
                <label for="f_deb_account7" class="form-label">Debetas</label>
                <select name="f_deb_account7" id="f_deb_account7">
                    <option value>---</option>
                    @foreach($accounts as $account)
                        <option value="{{ $account->f_id }}">{{ $account->f_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="f_cred_account7" class="form-label">Kreditas</label>
                <select name="f_cred_account7" id="f_cred_account7">
                    <option value>---</option>
                    @foreach($accounts as $account)
                        <option value="{{ $account->f_id }}">{{ $account->f_name }}</option>
                    @endforeach
                </select>
            </div>

            <h3>Pap. pasl. pirk. suma:</h3>

            <div class="mb-3">
                <label for="f_description8" class="form-label">Aprašymas</label>
                <input type="text" class="form-control" name="f_description8">
            </div>

            <div class="mb-3">
                <label for="f_deb_account8" class="form-label">Debetas</label>
                <select name="f_deb_account8" id="f_deb_account8">
                    <option value>---</option>
                    @foreach($accounts as $account)
                        <option value="{{ $account->f_id }}">{{ $account->f_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="f_cred_account8" class="form-label">Kreditas</label>
                <select name="f_cred_account8" id="f_cred_account8">
                    <option value>---</option>
                    @foreach($accounts as $account)
                        <option value="{{ $account->f_id }}">{{ $account->f_name }}</option>
                    @endforeach
                </select>
            </div>

            <h3>Pasl. did. pirk. suma:</h3>

            <div class="mb-3">
                <label for="f_description9" class="form-label">Aprašymas</label>
                <input type="text" class="form-control" name="f_description9">
            </div>

            <div class="mb-3">
                <label for="f_deb_account9" class="form-label">Debetas</label>
                <select name="f_deb_account9" id="f_deb_account9">
                    <option value>---</option>
                    @foreach($accounts as $account)
                        <option value="{{ $account->f_id }}">{{ $account->f_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="f_cred_account9" class="form-label">Kreditas</label>
                <select name="f_cred_account9" id="f_cred_account9">
                    <option value>---</option>
                    @foreach($accounts as $account)
                        <option value="{{ $account->f_id }}">{{ $account->f_name }}</option>
                    @endforeach
                </select>
            </div>

            <h3>Pasl. maž. pirk. suma (-):</h3>

            <div class="mb-3">
                <label for="f_description10" class="form-label">Aprašymas</label>
                <input type="text" class="form-control" name="f_description10">
            </div>

            <div class="mb-3">
                <label for="f_deb_account10" class="form-label">Debetas</label>
                <select name="f_deb_account10" id="f_deb_account10">
                    <option value>---</option>
                    @foreach($accounts as $account)
                        <option value="{{ $account->f_id }}">{{ $account->f_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="f_cred_account10" class="form-label">Kreditas</label>
                <select name="f_cred_account10" id="f_cred_account10">
                    <option value>---</option>
                    @foreach($accounts as $account)
                        <option value="{{ $account->f_id }}">{{ $account->f_name }}</option>
                    @endforeach
                </select>
            </div>

            <h3>Savik. ir pard. skirtumas:</h3>

            <div class="mb-3">
                <label for="f_description11" class="form-label">Aprašymas</label>
                <input type="text" class="form-control" name="f_description11">
            </div>

            <div class="mb-3">
                <label for="f_deb_account11" class="form-label">Debetas</label>
                <select name="f_deb_account11" id="f_deb_account11">
                    <option value>---</option>
                    @foreach($accounts as $account)
                        <option value="{{ $account->f_id }}">{{ $account->f_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="f_cred_account11" class="form-label">Kreditas</label>
                <select name="f_cred_account11" id="f_cred_account11">
                    <option value>---</option>
                    @foreach($accounts as $account)
                        <option value="{{ $account->f_id }}">{{ $account->f_name }}</option>
                    @endforeach
                </select>
            </div>

            <h3>Turto savikaina:</h3>

            <div class="mb-3">
                <label for="f_description12" class="form-label">Aprašymas</label>
                <input type="text" class="form-control" name="f_description12">
            </div>

            <div class="mb-3">
                <label for="f_deb_account12" class="form-label">Debetas</label>
                <select name="f_deb_account12" id="f_deb_account12">
                    <option value>---</option>
                    @foreach($accounts as $account)
                        <option value="{{ $account->f_id }}">{{ $account->f_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="f_cred_account12" class="form-label">Kreditas</label>
                <select name="f_cred_account12" id="f_cred_account12">
                    <option value>---</option>
                    @foreach($accounts as $account)
                        <option value="{{ $account->f_id }}">{{ $account->f_name }}</option>
                    @endforeach
                </select>
            </div>

            <h3>Vertės perkainojimas:</h3>

            <div class="mb-3">
                <label for="f_description13" class="form-label">Aprašymas</label>
                <input type="text" class="form-control" name="f_description13">
            </div>

            <div class="mb-3">
                <label for="f_deb_account13" class="form-label">Debetas</label>
                <select name="f_deb_account13" id="f_deb_account13">
                    <option value>---</option>
                    @foreach($accounts as $account)
                        <option value="{{ $account->f_id }}">{{ $account->f_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="f_cred_account13" class="form-label">Kreditas</label>
                <select name="f_cred_account13" id="f_cred_account13">
                    <option value>---</option>
                    @foreach($accounts as $account)
                        <option value="{{ $account->f_id }}">{{ $account->f_name }}</option>
                    @endforeach
                </select>
            </div>

            <h3>Nusidėvėjimas:</h3>

            <div class="mb-3">
                <label for="f_description14" class="form-label">Aprašymas</label>
                <input type="text" class="form-control" name="f_description14">
            </div>

            <div class="mb-3">
                <label for="f_deb_account14" class="form-label">Debetas</label>
                <select name="f_deb_account14" id="f_deb_account14">
                    <option value>---</option>
                    @foreach($accounts as $account)
                        <option value="{{ $account->f_id }}">{{ $account->f_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="f_cred_account14" class="form-label">Kreditas</label>
                <select name="f_cred_account14" id="f_cred_account14">
                    <option value>---</option>
                    @foreach($accounts as $account)
                        <option value="{{ $account->f_id }}">{{ $account->f_name }}</option>
                    @endforeach
                </select>
            </div>

            <h3>Likutinė vertė:</h3>

            <div class="mb-3">
                <label for="f_description15" class="form-label">Aprašymas</label>
                <input type="text" class="form-control" name="f_description15">
            </div>

            <div class="mb-3">
                <label for="f_deb_account15" class="form-label">Debetas</label>
                <select name="f_deb_account15" id="f_deb_account15">
                    <option value>---</option>
                    @foreach($accounts as $account)
                        <option value="{{ $account->f_id }}">{{ $account->f_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="f_cred_account15" class="form-label">Kreditas</label>
                <select name="f_cred_account15" id="f_cred_account15">
                    <option value>---</option>
                    @foreach($accounts as $account)
                        <option value="{{ $account->f_id }}">{{ $account->f_name }}</option>
                    @endforeach
                </select>
            </div>

            <h3>GPM 15%:</h3>

            <div class="mb-3">
                <label for="f_description17" class="form-label">Aprašymas</label>
                <input type="text" class="form-control" name="f_description17">
            </div>

            <div class="mb-3">
                <label for="f_deb_account17" class="form-label">Debetas</label>
                <select name="f_deb_account17" id="f_deb_account17">
                    <option value>---</option>
                    @foreach($accounts as $account)
                        <option value="{{ $account->f_id }}">{{ $account->f_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="f_cred_account17" class="form-label">Kreditas</label>
                <select name="f_cred_account17" id="f_cred_account17">
                    <option value>---</option>
                    @foreach($accounts as $account)
                        <option value="{{ $account->f_id }}">{{ $account->f_name }}</option>
                    @endforeach
                </select>
            </div>

            <h3>Socialinis draudimas:</h3>

            <div class="mb-3">
                <label for="f_description18" class="form-label">Aprašymas</label>
                <input type="text" class="form-control" name="f_description18">
            </div>

            <div class="mb-3">
                <label for="f_deb_account18" class="form-label">Debetas</label>
                <select name="f_deb_account18" id="f_deb_account18">
                    <option value>---</option>
                    @foreach($accounts as $account)
                        <option value="{{ $account->f_id }}">{{ $account->f_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="f_cred_account18" class="form-label">Kreditas</label>
                <select name="f_cred_account18" id="f_cred_account18">
                    <option value>---</option>
                    @foreach($accounts as $account)
                        <option value="{{ $account->f_id }}">{{ $account->f_name }}</option>
                    @endforeach
                </select>
            </div>

            <h3>Sąnaudos:</h3>

            <div class="mb-3">
                <label for="f_description19" class="form-label">Aprašymas</label>
                <input type="text" class="form-control" name="f_description19">
            </div>

            <div class="mb-3">
                <label for="f_deb_account19" class="form-label">Debetas</label>
                <select name="f_deb_account19" id="f_deb_account19">
                    <option value>---</option>
                    @foreach($accounts as $account)
                        <option value="{{ $account->f_id }}">{{ $account->f_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="f_cred_account19" class="form-label">Kreditas</label>
                <select name="f_cred_account19" id="f_cred_account19">
                    <option value>---</option>
                    @foreach($accounts as $account)
                        <option value="{{ $account->f_id }}">{{ $account->f_name }}</option>
                    @endforeach
                </select>
            </div>

            <h3>Soc.draud 2%:</h3>

            <div class="mb-3">
                <label for="f_description20" class="form-label">Aprašymas</label>
                <input type="text" class="form-control" name="f_description20">
            </div>

            <div class="mb-3">
                <label for="f_deb_account20" class="form-label">Debetas</label>
                <select name="f_deb_account20" id="f_deb_account20">
                    <option value>---</option>
                    @foreach($accounts as $account)
                        <option value="{{ $account->f_id }}">{{ $account->f_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="f_cred_account20" class="form-label">Kreditas</label>
                <select name="f_cred_account20" id="f_cred_account20">
                    <option value>---</option>
                    @foreach($accounts as $account)
                        <option value="{{ $account->f_id }}">{{ $account->f_name }}</option>
                    @endforeach
                </select>
            </div>

            <h3>PSD 6%:</h3>

            <div class="mb-3">
                <label for="f_description21" class="form-label">Aprašymas</label>
                <input type="text" class="form-control" name="f_description21">
            </div>

            <div class="mb-3">
                <label for="f_deb_account21" class="form-label">Debetas</label>
                <select name="f_deb_account21" id="f_deb_account21">
                    <option value>---</option>
                    @foreach($accounts as $account)
                        <option value="{{ $account->f_id }}">{{ $account->f_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="f_cred_account21" class="form-label">Kreditas</label>
                <select name="f_cred_account21" id="f_cred_account21">
                    <option value>---</option>
                    @foreach($accounts as $account)
                        <option value="{{ $account->f_id }}">{{ $account->f_name }}</option>
                    @endforeach
                </select>
            </div>

            <h3>Soc. draudimas 3%:</h3>

            <div class="mb-3">
                <label for="f_description22" class="form-label">Aprašymas</label>
                <input type="text" class="form-control" name="f_description22">
            </div>

            <div class="mb-3">
                <label for="f_deb_account22" class="form-label">Debetas</label>
                <select name="f_deb_account22" id="f_deb_account22">
                    <option value>---</option>
                    @foreach($accounts as $account)
                        <option value="{{ $account->f_id }}">{{ $account->f_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="f_cred_account22" class="form-label">Kreditas</label>
                <select name="f_cred_account22" id="f_cred_account22">
                    <option value>---</option>
                    @foreach($accounts as $account)
                        <option value="{{ $account->f_id }}">{{ $account->f_name }}</option>
                    @endforeach
                </select>
            </div>

            <h3>Garantinis fondas:</h3>

            <div class="mb-3">
                <label for="f_description23" class="form-label">Aprašymas</label>
                <input type="text" class="form-control" name="f_description23">
            </div>

            <div class="mb-3">
                <label for="f_deb_account23" class="form-label">Debetas</label>
                <select name="f_deb_account23" id="f_deb_account23">
                    <option value>---</option>
                    @foreach($accounts as $account)
                        <option value="{{ $account->f_id }}">{{ $account->f_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="f_cred_account23" class="form-label">Kreditas</label>
                <select name="f_cred_account23" id="f_cred_account23">
                    <option value>---</option>
                    @foreach($accounts as $account)
                        <option value="{{ $account->f_id }}">{{ $account->f_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="f_primary_document">Pirminis dokumentas</label>
                <input type="hidden" name="f_primary_document" value="0">
                <input type="checkbox" value="1" id="f_primary_document" name="f_primary_document">
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
