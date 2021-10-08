@extends('layouts.app')

@section('content')
    <div class="container">
        <p>Kodas: {{ $account->f_id }}</p>
        <p>Pavadinimas: {{ $account->f_name }}</p>
        <p>Pavadinimas 2: {{ $account->f_name2 }}</p>

        <a href="{{ route('accountGroups.edit', $account->f_id) }}">Edit</a>

        <form method="post" action="{{ route('accountGroups.destroy', $account->f_id) }}">
            @method('DELETE')
            @csrf

            <button type="submit">Delete</button>
        </form>

    </div>
@endsection
