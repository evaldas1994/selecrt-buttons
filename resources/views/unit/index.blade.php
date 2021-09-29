@extends('layouts.app')

@section('content')
    <div class="container">
        @for ($i = 0; $i < count($units); $i++)
            <p><a href="{{ route('units.show', $units[$i]->f_id) }}"> The current value is {{ $units[$i]->f_id }} </a></p>
        @endfor
    </div>




@endsection
