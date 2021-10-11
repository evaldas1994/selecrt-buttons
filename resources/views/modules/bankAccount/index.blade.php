@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach($bankAccounts as $bankAccount)
            <p><a href="{{ route('bankAccounts.show', $bankAccount->f_id) }}">{{ $bankAccount->f_id }} </a></p>
        @endforeach
    </div>
@endsection
