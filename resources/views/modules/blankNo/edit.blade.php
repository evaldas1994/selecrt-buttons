@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="post" action="{{ route('blankNos.update', $blankNo->f_id) }}">
            @method('PATCH')
            @csrf

            <div class="mb-3">
                <label for="f_counterid" class="form-label">Skaitliukas</label>
                <select name="f_counterid" id="f_counterid">
                    <option value="PARD2015">PARD2015</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="f_op" class="form-label">Operacija</label>
                <select name="f_op" id="f_op">
                    <option value="P" {{ $blankNo->f_op === 'P' ? 'selected' : '' }}>P - pajamavimas</option>
                    <option value="N" {{ $blankNo->f_op === 'N' ? 'selected' : '' }}>N - nurašymas</option>
                    <option value="E" {{ $blankNo->f_op === 'E' ? 'selected' : '' }}>E - perkėlimas</option>
                    <option value="Y" {{ $blankNo->f_op === 'Y' ? 'selected' : '' }}>Y - gamyba</option>
                    <option value="T" {{ $blankNo->f_op === 'T' ? 'selected' : '' }}>T - inventorizacija</option>
                    <option value="A" {{ $blankNo->f_op === 'A' ? 'selected' : '' }}>A - pardavimas</option>
                    <option value="I" {{ $blankNo->f_op === 'I' ? 'selected' : '' }}>I - pirkimas</option>
                    <option value="R" {{ $blankNo->f_op === 'R' ? 'selected' : '' }}>R - pardavimo grąžinimas</option>
                    <option value="Z" {{ $blankNo->f_op === 'Z' ? 'selected' : '' }}>Z - pirkimo grąžinimas</option>
                    <option value="L" {{ $blankNo->f_op === 'L' ? 'selected' : '' }}>L - logistika</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="f_storeid" class="form-label">Sandėlis</label>
                <select name="f_storeid" id="f_storeid">
                    @foreach($stores as $store)
                        <option value="{{ $store->f_id }} {{ $blankNo->f_storeid === $store->f_id ? 'selected' : '' }}">{{ $store->f_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="f_groupid" class="form-label">Prekės Grupė</label>
                <select name="f_groupid" id="f_groupid">
                </select>
            </div>

            <div class="mb-3">
                <label for="f_invoice_register" class="form-label">Sąsk. fakt. registras</label>
                <select name="f_invoice_register" id="f_invoice_register">
                    <option value="1" {{ $blankNo->f_op === '1' ? 'selected' : '' }}>1 - neparinkti</option>
                    <option value="0" {{ $blankNo->f_op === '2' ? 'selected' : '' }}>2 - neregistruoti</option>
                    <option value="2" {{ $blankNo->f_op === '3' ? 'selected' : '' }}>3 - išrašomų</option>
                    <option value="3" {{ $blankNo->f_op === '4' ? 'selected' : '' }}>4 - gaunamų</option>
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
