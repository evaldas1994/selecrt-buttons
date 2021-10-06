@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach($stocks as $stock)
            <p><a href="{{ route('stocks.show', $stock->f_id) }}">{{ $stock->f_id }} </a></p>
        @endforeach
    </div>
@endsection
