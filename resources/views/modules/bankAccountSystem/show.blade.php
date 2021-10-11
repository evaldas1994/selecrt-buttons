@extends('layouts.app')

@section('content')
    <div class="container">
        <p>Sąskaita: {{ $bankAccountSystem->f_id }}</p>
        <p>Bankas: {{ $bankAccountSystem->f_bankid }}</p>
        <p>Komentaras: {{ $bankAccountSystem->f_name }}</p>
        <p>Pagrindinis: {{ $bankAccountSystem->f_default }}</p>

        <a href="{{ route('bank-account-systems.edit', $bankAccountSystem->f_id) }}">Edit</a>

        <form method="post" action="{{ route('bank-account-systems.destroy', $bankAccountSystem->f_id) }}">

            @method('DELETE')
            @csrf
            <button type="submit">Delete</button>
        </form>

    </div>
@endsection
