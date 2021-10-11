@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach($bankAccountSystems as $bankAccountSystem)
            <p><a href="{{ route('bank-account-systems.show', $bankAccountSystem->f_id) }}">{{ $bankAccountSystem->f_id }} </a></p>
        @endforeach
    </div>
@endsection
