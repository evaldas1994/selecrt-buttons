@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="post" action="{{ route('barcodes.store') }}">
            @csrf

            <div class="mb-3">
                <label for="f_stockid" class="form-label">Prekė</label>
                <select name="f_stockid" id="f_stockid">
                    @foreach($stocks as $stock)
                        <option value="{{ $stock->f_id }}">{{ $stock->f_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="f_id" class="form-label">Barkodas</label>
                <input type="text" class="form-control" name="f_id">
            </div>

            <div class="mb-3">
                <label for="f_ratio" class="form-label">Santykis su pagr.matu</label>
                <input type="text" class="form-control" name="f_ratio" value=1.0000>
            </div>

            <div class="mb-3">
                <label for="f_default">Pagrindinis</label>
                <input type="checkbox" value=1 id="f_default" name="f_default">
            </div>

            <div class="mb-3">
                <label for="f_neto" class="form-label">Svoris neto</label>
                <input type="text" class="form-control" name="f_neto" value=0.0000>
            </div>

            <div class="mb-3">
                <label for="f_plastic" class="form-label">Pakuotės kiekis plastikas</label>
                <input type="text" class="form-control" name="f_plastic" value=0.0000>
            </div>

            <div class="mb-3">
                <label for="f_paper" class="form-label">Pakuotės kiekis popierius</label>
                <input type="text" class="form-control" name="f_paper" value=0.0000>
            </div>

            <div class="mb-3">
                <label for="f_glass" class="form-label">Pakuotės kiekis stiklas</label>
                <input type="text" class="form-control" name="f_glass" value=0.0000>
            </div>

            <div class="mb-3">
                <label for="f_wood" class="form-label">Pakuotės kiekis medis</label>
                <input type="text" class="form-control" name="f_wood" value=0.0000>
            </div>

            <div class="mb-3">
                <label for="f_pap1" class="form-label">Pakuotės kiekis metalas</label>
                <input type="text" class="form-control" name="f_pap1" value=0.0000>
            </div>

            <div class="mb-3">
                <label for="f_pap2" class="form-label">Pakuotės kiekis papild.</label>
                <input type="text" class="form-control" name="f_pap2" value=0.0000>
            </div>

            <div class="mb-3">
                <label for="f_usadid" class="form-label">Taromato paslaugos ID</label>
                <select name="f_usadid" id="f_usadid">
                </select>
            </div>

            <div  class="mb-3" hidden>
                <label for="f_system1" class="form-label">System1</label>
                <input type="text" class="form-control" name="f_system1">
            </div>

            <div class="mb-3" hidden>
                <label for="f_system2" class="form-label">System2</label>
                <input type="text" class="form-control" name="f_system2">
            </div>

            <div class="mb-3" hidden>
                <label for="f_system3" class="form-label">System3</label>
                <input type="text" class="form-control" name="f_system3">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection
