@extends('layouts.app')

@section('content')
    <div class="container">
        <p>Kodas: {{ $template->f_id }}</p>
        <p>Pavadinimas: {{ $template->f_name }}</p>
        <p>Konsignacija: {{ $template->f_consignment }}</p>
        <p>Operacija: {{ $template->f_op }}</p>
        <p>Prekės grupė: {{ $template->f_groupid }}</p>

        <h3>Savikaina:</h3>
        <p>Aprašymas: {{ $template->f_description1 }}</p>
        <p>Debetas: {{ $template->f_deb_account1 }}</p>
        <p>Kreditas: {{ $template->f_cred_account1 }}</p>

        <h3>Prek. pard. suma:</h3>
        <p>Aprašymas: {{ $template->f_description2 }}</p>
        <p>Debetas: {{ $template->f_deb_account2 }}</p>
        <p>Kreditas: {{ $template->f_cred_account2 }}</p>

        <h3>Pasl. pard. suma:</h3>
        <p>Aprašymas: {{ $template->f_description3 }}</p>
        <p>Debetas: {{ $template->f_deb_account3 }}</p>
        <p>Kreditas: {{ $template->f_cred_account3 }}</p>

        <h3>Pap. pasl. pard. suma:</h3>
        <p>Aprašymas: {{ $template->f_description16 }}</p>
        <p>Debetas: {{ $template->f_deb_account16 }}</p>
        <p>Kreditas: {{ $template->f_cred_account16 }}</p>

        <h3>PVM:</h3>
        <p>Aprašymas: {{ $template->f_description4 }}</p>
        <p>Debetas: {{ $template->f_deb_account4 }}</p>
        <p>Kreditas: {{ $template->f_cred_account4 }}</p>

        <h3>Nuolaida:</h3>
        <p>Aprašymas: {{ $template->f_description5 }}</p>
        <p>Debetas: {{ $template->f_deb_account5 }}</p>
        <p>Kreditas: {{ $template->f_cred_account5 }}</p>

        <h3>Prek. pirk. suma:</h3>
        <p>Aprašymas: {{ $template->f_description6 }}</p>
        <p>Debetas: {{ $template->f_deb_account6 }}</p>
        <p>Kreditas: {{ $template->f_cred_account6 }}</p>

        <h3>Pasl. pirk. suma:</h3>
        <p>Aprašymas: {{ $template->f_description7 }}</p>
        <p>Debetas: {{ $template->f_deb_account7 }}</p>
        <p>Kreditas: {{ $template->f_cred_account7 }}</p>

        <h3>Pap. pasl. pirk. suma:</h3>
        <p>Aprašymas: {{ $template->f_description8 }}</p>
        <p>Debetas: {{ $template->f_deb_account8 }}</p>
        <p>Kreditas: {{ $template->f_cred_account8 }}</p>

        <h3>Pasl. did. pirk. suma:</h3>
        <p>Aprašymas: {{ $template->f_description9 }}</p>
        <p>Debetas: {{ $template->f_deb_account9 }}</p>
        <p>Kreditas: {{ $template->f_cred_account1 }}</p>

        <h3>Pasl. maž. pirk. suma (-):</h3>
        <p>Aprašymas: {{ $template->f_description10 }}</p>
        <p>Debetas: {{ $template->f_deb_account10 }}</p>
        <p>Kreditas: {{ $template->f_cred_account10 }}</p>

        <h3>Pasl. maž. pirk. suma (-):</h3>
        <p>Aprašymas: {{ $template->f_description11 }}</p>
        <p>Debetas: {{ $template->f_deb_account11 }}</p>
        <p>Kreditas: {{ $template->f_cred_account11 }}</p>

        <h3>Turto savikaina:</h3>
        <p>Aprašymas: {{ $template->f_description12 }}</p>
        <p>Debetas: {{ $template->f_deb_account12 }}</p>
        <p>Kreditas: {{ $template->f_cred_account12 }}</p>

        <h3>Vertės perkainojimas:</h3>
        <p>Aprašymas: {{ $template->f_description13 }}</p>
        <p>Debetas: {{ $template->f_deb_account13 }}</p>
        <p>Kreditas: {{ $template->f_cred_account13 }}</p>

        <h3>Nusidėvėjimas:</h3>
        <p>Aprašymas: {{ $template->f_description14 }}</p>
        <p>Debetas: {{ $template->f_deb_account14 }}</p>
        <p>Kreditas: {{ $template->f_cred_account14 }}</p>

        <h3>Likutinė vertė:</h3>
        <p>Aprašymas: {{ $template->f_description15 }}</p>
        <p>Debetas: {{ $template->f_deb_account15 }}</p>
        <p>Kreditas: {{ $template->f_cred_account15 }}</p>

        <h3>GPM 15%:</h3>
        <p>Aprašymas: {{ $template->f_description17 }}</p>
        <p>Debetas: {{ $template->f_deb_account17 }}</p>
        <p>Kreditas: {{ $template->f_cred_account17 }}</p>

        <h3>Socialinis draudimas:</h3>
        <p>Aprašymas: {{ $template->f_description18 }}</p>
        <p>Debetas: {{ $template->f_deb_account18 }}</p>
        <p>Kreditas: {{ $template->f_cred_account18 }}</p>

        <h3>Sąnaudos:</h3>
        <p>Aprašymas: {{ $template->f_description19 }}</p>
        <p>Debetas: {{ $template->f_deb_account19 }}</p>
        <p>Kreditas: {{ $template->f_cred_account19 }}</p>

        <h3>Soc.draud 2%:</h3>
        <p>Aprašymas: {{ $template->f_description20 }}</p>
        <p>Debetas: {{ $template->f_deb_account20 }}</p>
        <p>Kreditas: {{ $template->f_cred_account20 }}</p>

        <h3>PSD 6%:</h3>
        <p>Aprašymas: {{ $template->f_description21 }}</p>
        <p>Debetas: {{ $template->f_deb_account21 }}</p>
        <p>Kreditas: {{ $template->f_cred_account21 }}</p>

        <h3>Soc. draudimas 3%:</h3>
        <p>Aprašymas: {{ $template->f_description22 }}</p>
        <p>Debetas: {{ $template->f_deb_account22 }}</p>
        <p>Kreditas: {{ $template->f_cred_account22 }}</p>

        <h3>Garantinis fondas:</h3>
        <p>Aprašymas: {{ $template->f_description23 }}</p>
        <p>Debetas: {{ $template->f_deb_account23 }}</p>
        <p>Kreditas: {{ $template->f_cred_account23 }}</p>

        <p>Pirminis dokumentas: {{ $template->f_primary_document }}</p>

        <a href="{{ route('templates.edit', $template->f_id) }}">Edit</a>

        <form method="post" action="{{ route('templates.destroy', $template->f_id) }}">

            @method('DELETE')
            @csrf
            <button type="submit">Delete</button>
        </form>

    </div>
@endsection
