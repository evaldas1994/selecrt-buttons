@extends('layouts.app')

@section('content')
    <div class="container">
        <p>Kodas: {{ $bankAccount->f_id }}</p>
        <p>Bankas: {{ $bankAccount->f_bankid }}</p>
        <p>Partner id: {{ $bankAccount->f_partnerid }}</p>
        <p>Pagrindinis: {{ $bankAccount->f_default }}</p>

        <a href="{{ route('bank-accounts.edit', $bankAccount->f_id) }}">Edit</a>

        <form method="post" action="{{ route('bank-accounts.destroy', $bankAccount->f_id) }}">

            @method('DELETE')
            @csrf
            <button type="submit">Delete</button>
        </form>

    </div>
@endsection
