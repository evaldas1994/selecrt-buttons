@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="post" action="{{ route('blankNos.store') }}">
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
                    <option value="P">P - pajamavimas</option>
                    <option value="N">N - nurašymas</option>
                    <option value="E">E - perkėlimas</option>
                    <option value="Y">Y - gamyba</option>
                    <option value="T">T - inventorizacija</option>
                    <option value="A">A - pardavimas</option>
                    <option value="I">I - pirkimas</option>
                    <option value="R">R - pardavimo grąžinimas</option>
                    <option value="Z">Z - pirkimo grąžinimas</option>
                    <option value="L">L - logistika</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="f_storeid" class="form-label">Sandėlis</label>
                <select name="f_storeid" id="f_storeid">
                    @foreach($stores as $store)
                        <option value="{{ $store->f_id }}">{{ $store->f_name }}</option>
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
                    <option value="1">1 - neparinkti</option>
                    <option value="0">2 - neregistruoti</option>
                    <option value="2">3 - išrašomų</option>
                    <option value="3">4 - gaunamų</option>
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
