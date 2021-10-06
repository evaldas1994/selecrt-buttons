@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach($currencies as $currency)
            <p><a href="{{ route('currencies.show', $currency->f_id) }}">{{ $currency->f_id }} </a></p>
        @endforeach
    </div>
@endsection
