@extends('layouts.app')

@section('content')
    <div class="container">
        <p>Prekė: {{ $barcode->f_stockid }}</p>
        <p>Barkodas: {{ $barcode->f_id }}</p>
        <p>Santykis su pagr.matu: {{ $barcode->f_ratio }}</p>
        <p>Pagrindinis: {{ $barcode->f_default }}</p>
        <p>Svoris neto: {{ $barcode->f_neto }}</p>
        <p>Pakuotės kiekis plastikas: {{ $barcode->f_plastic }}</p>
        <p>Pakuotės kiekis popierius: {{ $barcode->f_paper }}</p>
        <p>Pakuotės kiekis stiklas: {{ $barcode->f_glass }}</p>
        <p>Pakuotės kiekis medis: {{ $barcode->f_wood }}</p>
        <p>Pakuotės kiekis metalas: {{ $barcode->f_pap1 }}</p>
        <p>Pakuotės kiekis papild.: {{ $barcode->f_pap2 }}</p>
        <p>Taromato paslaugos ID: {{ $barcode->f_usadid }}</p>

        <a href="{{ route('barcodes.edit', $barcode->f_id) }}">Edit</a>

        <form method="post" action="{{ route('barcodes.destroy', $barcode->f_id) }}">

            @method('DELETE')
            @csrf
            <button type="submit">Delete</button>
        </form>

    </div>
@endsection
