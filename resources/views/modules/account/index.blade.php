@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach($accounts as $account)
            <p><a href="{{ route('accounts.show', $account->f_id) }}">{{ $account->f_id }} </a></p>
        @endforeach
    </div>
@endsection
