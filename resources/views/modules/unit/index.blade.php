@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach($units as $unit)
            <p><a href="{{ route('units.show', $unit->f_id) }}">{{ $unit->f_id }} </a></p>
        @endforeach
    </div>
@endsection
