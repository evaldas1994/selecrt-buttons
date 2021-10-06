@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach($registers as $register)
            <p><a href="{{ route('registers7.show', $register->f_id) }}">{{ $register->f_id }} </a></p>
        @endforeach
    </div>
@endsection
