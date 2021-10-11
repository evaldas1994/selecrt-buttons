@extends('layouts.app')

@section('content')
    <div class="container">
        <p>ID: {{ $blankNumber->f_id }}</p>
        <p>Skaitliukas: {{ $blankNumber->f_counterid }}</p>
        <p>Operacija: {{ $blankNumber->f_op }}</p>
        <p>Sandėlis: {{ $blankNumber->f_storeid }}</p>
        <p>Prekės grupė: {{ $blankNumber->f_groupid }}</p>
        <p>Sąsk. fakt. registras: {{ $blankNumber->f_invoice_register }}</p>

        <a href="{{ route('blank-numbers.edit', $blankNumber->f_id) }}">Edit</a>

        <form method="post" action="{{ route('blank-numbers.destroy', $blankNumber->f_id) }}">

            @method('DELETE')
            @csrf
            <button type="submit">Delete</button>
        </form>

    </div>
@endsection
