@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach($banks as $bank)
            <p><a href="{{ route('banks.show', $bank->f_id) }}">{{ $bank->f_id }} </a></p>
        @endforeach
    </div>
@endsection
