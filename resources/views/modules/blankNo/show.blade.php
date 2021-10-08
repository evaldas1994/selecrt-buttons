@extends('layouts.app')

@section('content')
    <div class="container">
        <p>ID: {{ $blankNo->f_id }}</p>
        <p>Skaitliukas: {{ $blankNo->f_counterid }}</p>
        <p>Operacija: {{ $blankNo->f_op }}</p>
        <p>Sandėlis: {{ $blankNo->f_storeid }}</p>
        <p>Prekės grupė: {{ $blankNo->f_groupid }}</p>
        <p>Sąsk. fakt. registras: {{ $blankNo->f_invoice_register }}</p>

        <a href="{{ route('blankNos.edit', $blankNo->f_id) }}">Edit</a>

        <form method="post" action="{{ route('blankNos.destroy', $blankNo->f_id) }}">

            @method('DELETE')
            @csrf
            <button type="submit">Delete</button>
        </form>

    </div>
@endsection
