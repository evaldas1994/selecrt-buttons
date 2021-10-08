@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach($blankNos as $blankNo)
            <p><a href="{{ route('blankNos.show', $blankNo->f_id) }}">{{ $blankNo->f_id }} </a></p>
        @endforeach
    </div>
@endsection
