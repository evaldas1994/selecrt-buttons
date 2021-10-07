@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach($barcodes as $barcode)
            <p><a href="{{ route('barcodes.show', $barcode->f_id) }}">{{ $barcode->f_id }} </a></p>
        @endforeach
    </div>
@endsection
