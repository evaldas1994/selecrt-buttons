@extends('layouts.app')

@section('content')
    <div class="container">
        <p>Kodas: {{ $bank->f_id }}</p>
        <p>Pavadinimas: {{ $bank->f_name }}</p>
        <p>BIC (SWIFT): {{ $bank->f_bic }}</p>
        <p>Įmonės kodas: {{ $bank->f_code }}</p>

        <a href="{{ route('banks.edit', $bank->f_id) }}">Edit</a>

        <form method="post" action="{{ route('banks.destroy', $bank->f_id) }}">

            @method('DELETE')
            @csrf
            <button type="submit">Delete</button>
        </form>

    </div>
@endsection
