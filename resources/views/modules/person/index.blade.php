@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach($persons as $person)
            <p><a href="{{ route('persons.show', $person->f_id) }}">{{ $person->f_id }} </a></p>
        @endforeach
    </div>
@endsection
