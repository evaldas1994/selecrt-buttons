@extends('layouts.app')

@section('content')
    <div class="container">
        <p>Kodas: {{ $currency->f_id }}</p>
        <p>Pavadinimas: {{ $currency->f_name }}</p>
        <p>Simbolis: {{ $currency->f_symbol }}</p>
        <p>1 / 100 dalis: {{ $currency->f_fraction }}</p>

        <a href="{{ route('currencies.edit', $currency->f_id) }}">Edit</a>

        <form method="post" action="{{ route('currencies.destroy', $currency->f_id) }}">
            @method('DELETE')
            @csrf

            <button type="submit">Delete</button>
        </form>

    </div>
@endsection
