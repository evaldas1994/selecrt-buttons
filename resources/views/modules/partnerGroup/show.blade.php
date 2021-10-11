@extends('layouts.app')

@section('content')
    <div class="container">
        <p>Kodas: {{ $partnerGroup->f_id }}</p>
        <p>Pavadinimas: {{ $partnerGroup->f_name }}</p>
        <p>Pavadinimas 2: {{ $partnerGroup->f_name2 }}</p>
        <p>Importas: {{ $partnerGroup->f_import }}</p>

        <a href="{{ route('partner-groups.edit', $partnerGroup->f_id) }}">Edit</a>

        <form method="post" action="{{ route('partner-groups.destroy', $partnerGroup->f_id) }}">
            @method('DELETE')
            @csrf

            <button type="submit">Delete</button>
        </form>

    </div>
@endsection
