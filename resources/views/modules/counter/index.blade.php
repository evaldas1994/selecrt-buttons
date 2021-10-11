@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach($counters as $counter)
            <p><a href="{{ route('counters.show', $counter->f_id) }}">{{ $counter->f_id }} </a></p>
        @endforeach
    </div>
@endsection
