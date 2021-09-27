@extends('layouts.app')

@section('content')
    @foreach ($sales as $sale)
        <div>
            {{ $sale->f_docno }}
        </div>
        <div>
            {{ $sale->stockd }}
        </div>
    @endforeach
    <div class="float-right mt-3 mb-3">
        {{ $sales->links() }}
    </div>
@endsection
