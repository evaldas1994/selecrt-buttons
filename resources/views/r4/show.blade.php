@extends('layouts.app')

@section('content')
    <div class="container">
        <p>Kodas: {{ $register->f_id }}</p>
        <p>Pavadinimas: {{ $register->f_name }}</p>
        <p>Pavadinimas 2: {{ $register->f_name2 }}</p>

        <a href="{{ route('r4s.edit', $register->f_id) }}">Edit</a>

        <form method="post" action="{{ route('r4s.destroy', $register->f_id) }}">
            @method('DELETE')
            @csrf

            <button type="submit">Delete</button>
        </form>

    </div>
@endsection
