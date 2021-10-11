@extends('layouts.app')

@section('content')
    <div class="container">
        <p>Darbuotojas: {{ $bonus->f_employee_id }}</p>
        <p>Pavadinimas: {{ $bonus->f_bonus_name }}</p>
        <p>Reikšmė: {{ $bonus->f_value }}</p>
        <p>Tipas: {{ $bonus->f_type }}</p>
        <p>Laikotarpis nuo: {{ $bonus->f_date_from }}</p>
        <p>Laikotarpis iki: {{ $bonus->f_date_till }}</p>
        <p>Neatvykimo į darbą atvejai: {{ $bonus->f_reason }}</p>
        <p>Aprašymas: {{ $bonus->f_description }}</p>

        <a href="{{ route('bonuses.edit', $bonus->f_id) }}">Edit</a>

        <form method="post" action="{{ route('bonuses.destroy', $bonus->f_id) }}">

            @method('DELETE')
            @csrf
            <button type="submit">Delete</button>
        </form>

    </div>
@endsection
