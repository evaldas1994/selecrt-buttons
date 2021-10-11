@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="post" action="{{ route('blank-numbers.update', $blankNumber->f_id) }}">
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
                    <option value="P" {{ $blankNumber->f_op === 'P' ? 'selected' : '' }}>P - pajamavimas</option>
                    <option value="N" {{ $blankNumber->f_op === 'N' ? 'selected' : '' }}>N - nurašymas</option>
                    <option value="E" {{ $blankNumber->f_op === 'E' ? 'selected' : '' }}>E - perkėlimas</option>
                    <option value="Y" {{ $blankNumber->f_op === 'Y' ? 'selected' : '' }}>Y - gamyba</option>
                    <option value="T" {{ $blankNumber->f_op === 'T' ? 'selected' : '' }}>T - inventorizacija</option>
                    <option value="A" {{ $blankNumber->f_op === 'A' ? 'selected' : '' }}>A - pardavimas</option>
                    <option value="I" {{ $blankNumber->f_op === 'I' ? 'selected' : '' }}>I - pirkimas</option>
                    <option value="R" {{ $blankNumber->f_op === 'R' ? 'selected' : '' }}>R - pardavimo grąžinimas</option>
                    <option value="Z" {{ $blankNumber->f_op === 'Z' ? 'selected' : '' }}>Z - pirkimo grąžinimas</option>
                    <option value="L" {{ $blankNumber->f_op === 'L' ? 'selected' : '' }}>L - logistika</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="f_storeid" class="form-label">Sandėlis</label>
                <select name="f_storeid" id="f_storeid">
                    @foreach($stores as $store)
                        <option value="{{ $store->f_id }}" {{ $blankNumber->f_storeid === $store->f_id ? 'selected' : '' }}>{{ $store->f_name }}</option>
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
                    <option value=1 {{ $blankNumber->f_invoice_register === 1 ? 'selected' : '' }}>1 - neparinkti</option>
                    <option value=0 {{ $blankNumber->f_invoice_register === 0 ? 'selected' : '' }}>0 - neregistruoti</option>
                    <option value=2 {{ $blankNumber->f_invoice_register === 2 ? 'selected' : '' }}>2 - išrašomų</option>
                    <option value=3 {{ $blankNumber->f_invoice_register === 3 ? 'selected' : '' }}>3 - gaunamų</option>
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
