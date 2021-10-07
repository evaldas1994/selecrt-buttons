@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="post" action="{{ route('barcodes.update', $barcode->f_id) }}">
            @method('PATCH')
            @csrf

            <div class="mb-3">
                <label for="f_stockid" class="form-label">Prekė</label>
                <select name="f_stockid" id="f_stockid">
                    @foreach($stocks as $stock)
                        <option value="{{ $stock->f_id }}" {{ $barcode->f_stockid === $stock->f_id ? 'selected' : '' }}>{{ $stock->f_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="f_id" class="form-label">Barkodas</label>
                <input type="text" class="form-control" name="f_id" value="{{ $barcode->f_id }}">
            </div>

            <div class="mb-3">
                <label for="f_ratio" class="form-label">Santykis su pagr.matu</label>
                <input type="text" class="form-control" name="f_ratio" value="{{ $barcode->f_ratio }}">
            </div>

            <div class="mb-3">
                <label for="f_default">Pagrindinis</label>
                <input type="hidden" name="f_default" value="0">
                <input type="checkbox" value="1" id="f_default" name="f_default" {{ $barcode->f_default ? 'checked' : '' }}>
            </div>

            <div class="mb-3">
                <label for="f_neto" class="form-label">Svoris neto</label>
                <input type="text" class="form-control" name="f_neto" value="{{ $barcode->f_neto }}">
            </div>

            <div class="mb-3">
                <label for="f_plastic" class="form-label">Pakuotės kiekis plastikas</label>
                <input type="text" class="form-control" name="f_plastic" value="{{ $barcode->f_plastic }}">
            </div>

            <div class="mb-3">
                <label for="f_paper" class="form-label">Pakuotės kiekis popierius</label>
                <input type="text" class="form-control" name="f_paper" value="{{ $barcode->f_paper }}">
            </div>

            <div class="mb-3">
                <label for="f_glass" class="form-label">Pakuotės kiekis stiklas</label>
                <input type="text" class="form-control" name="f_glass" value="{{ $barcode->f_glass }}">
            </div>

            <div class="mb-3">
                <label for="f_wood" class="form-label">Pakuotės kiekis medis</label>
                <input type="text" class="form-control" name="f_wood" value="{{ $barcode->f_wood }}">
            </div>

            <div class="mb-3">
                <label for="f_pap1" class="form-label">Pakuotės kiekis metalas</label>
                <input type="text" class="form-control" name="f_pap1" value="{{ $barcode->f_pap1 }}">
            </div>

            <div class="mb-3">
                <label for="f_pap2" class="form-label">Pakuotės kiekis papild.</label>
                <input type="text" class="form-control" name="f_pap2" value="{{ $barcode->f_pap2 }}">
            </div>

            <div class="mb-3">
                <label for="f_usadid" class="form-label">Taromato paslaugos ID</label>
                <select name="f_usadid" id="f_usadid">
                </select>
            </div>

            <div  class="mb-3" hidden>
                <label for="f_system1" class="form-label">System1</label>
                <input type="text" class="form-control" name="f_system1" value="{{ $barcode->f_system1 }}">
            </div>

            <div class="mb-3" hidden>
                <label for="f_system2" class="form-label">System2</label>
                <input type="text" class="form-control" name="f_system2" value="{{ $barcode->f_system2 }}">
            </div>

            <div class="mb-3" hidden>
                <label for="f_system3" class="form-label">System3</label>
                <input type="text" class="form-control" name="f_system3" value="{{ $barcode->f_system3 }}">
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
