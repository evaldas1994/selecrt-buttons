@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach($messages as $message)
            <p><a href="{{ route('messages.show', $message->f_id) }}">{{ $message->f_id }} </a></p>
        @endforeach
    </div>
@endsection
