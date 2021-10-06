@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach($stores as $store)
            <p><a href="{{ route('stores.show', $store->f_id) }}">{{ $store->f_id }} </a></p>
        @endforeach
    </div>
@endsection
