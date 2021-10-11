@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach($blankNumbers as $blankNumber)
            <p><a href="{{ route('blank-numbers.show', $blankNumber->f_id) }}">{{ $blankNumber->f_id }} </a></p>
        @endforeach
    </div>
@endsection
