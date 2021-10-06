@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach($partners as $partner)
            <p><a href="{{ route('partners.show', $partner->f_id) }}">{{ $partner->f_id }} </a></p>
        @endforeach
    </div>
@endsection
