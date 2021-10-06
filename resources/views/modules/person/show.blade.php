@extends('layouts.app')

@section('content')
    <div class="container">
        <p>Kodas: {{ $person->f_id }}</p>
        <p>Pavadinimas: {{ $person->f_name }}</p>
        <p>Pavadinimas 2: {{ $person->f_name2 }}</p>
        <p>Koeficientas: {{ $person->f_coef }}</p>

        <a href="{{ route('persons.edit', $person->f_id) }}">Edit</a>

        <form method="post" action="{{ route('persons.destroy', $person->f_id) }}">
            @method('DELETE')
            @csrf

            <button type="submit">Delete</button>
        </form>

    </div>
@endsection
