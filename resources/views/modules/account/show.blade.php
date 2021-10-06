@extends('layouts.app')

@section('content')
    <div class="container">
        <p>Kodas: {{ $account->f_id }}</p>
        <p>Pavadinimas: {{ $account->f_name }}</p>
        <p>Prekės grupė: {{ $account->f_groupid }}</p>
        <p>Tipas: {{ $account->f_type }}</p>
        <p>Paskirtis: {{ $account->f_purpose }}</p>
        <p>VMI klasifikatorius: {{ $account->f_vmi_code }}</p>


        <a href="{{ route('accounts.edit', $account->f_id) }}">Edit</a>

        <form method="post" action="{{ route('accounts.destroy', $account->f_id) }}">
            @method('DELETE')
            @csrf

            <button type="submit">Delete</button>
        </form>

    </div>
@endsection
