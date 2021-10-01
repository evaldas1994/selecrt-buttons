@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="post" action="{{ route('stores.update', $store->f_id) }}">
            @method('PATCH')
            @csrf

            <div class="mb-3">
                <label for="f_id" class="form-label">Kodas</label>
                <input type="text" class="form-control" name="f_id" value="{{ $store->f_id }}">
            </div>

            <div class="mb-3">
                <label for="f_name" class="form-label">Pavadinimas</label>
                <input type="text" class="form-control" name="f_name" value="{{ $store->f_name }}">
            </div>

            <div class="mb-3">
                <label for="f_name2" class="form-label">Pavadinimas 2</label>
                <input type="text" class="form-control" name="f_name2" value="{{ $store->f_name2 }}">
            </div>

            <div class="mb-3">
                <label for="f_address" class="form-label">Adresas</label>
                <textarea id="f_address" name="f_address" rows="4" cols="50">
                    {{ $store->f_address }}
                </textarea>
            </div>

            <div class="mb-3">
                <label for="f_accountid" class="form-label">Sąskaita</label>
                <select name="f_accountid" id="f_accountid">
                </select>
            </div>

            <div class="mb-3">
                <label for="f_f1" class="form-label">Laukas 1</label>
                <input type="text" class="form-control" name="f_f1" value="{{ $store->f_f1 }}">
            </div>

            <div class="mb-3">
                <label for="f_f2" class="form-label">Laukas 2</label>
                <input type="text" class="form-control" name="f_f2" value="{{ $store->f_f2 }}">
            </div>

            <div class="mb-3">
                <label for="f_f3" class="form-label">Laukas 3</label>
                <input type="text" class="form-control" name="f_f3" value="{{ $store->f_f3 }}">
            </div>

            <div class="mb-3">
                <label for="f_f4" class="form-label">Laukas 4</label>
                <input type="text" class="form-control" name="f_f4" value="{{ $store->f_f4 }}">
            </div>

            <div class="mb-3">
                <label for="f_f5" class="form-label">Laukas 5</label>
                <input type="text" class="form-control" name="f_f5" value="{{ $store->f_f5 }}">
            </div>

            <div class="mb-3">
                <label for="f_store_name" class="form-label">Susiejimo sandėlis</label>
                <select name="f_store_name" id="f_store_name">
                </select>
            </div>

            <div class="mb-3">
                <label for="f_r1id" class="form-label">Galioja iki</label>
                <select name="f_r1id" id="f_r1id">
                </select>
            </div>

            <div class="mb-3">
                <label for="f_r2id" class="form-label">Registras 2</label>
                <select name="f_r1id" id="f_r2id">
                </select>
            </div>

            <div class="mb-3">
                <label for="f_r3id" class="form-label">Registras 3</label>
                <select name="f_r3id" id="f_r3id">
                </select>
            </div>

            <div class="mb-3">
                <label for="f_r4id" class="form-label">Registras 4</label>
                <select name="f_r4id" id="f_r4id">
                </select>
            </div>

            <div class="mb-3">
                <label for="f_r5id" class="form-label">Registras 5</label>
                <select name="f_r5id" id="f_r5id">
                </select>
            </div>

            <div class="mb-3">
                <label for="f_departmentid" class="form-label">Padalinys</label>
                <select name="f_departmentid" id="f_departmentid">
                </select>
            </div>

            <div class="mb-3">
                <label for="f_personid" class="form-label">Asmuo</label>
                <select name="f_personid" id="f_personid">
                </select>
            </div>

            <div class="mb-3">
                <label for="f_projectid" class="form-label">Projektas</label>
                <select name="f_projectid" id="f_projectid">
                </select>
            </div>

            <div class="mb-3">
                <label for="f_iln_edisoft" class="form-label">Edi pristatymo ILN numeris</label>
                <input type="text" class="form-control" name="f_iln_edisoft" value="{{ $store->f_iln_edisoft }}">
            </div>

            <div class="mb-3">
                <label for="f_store_email" class="form-label">Sandėlio el. paštas</label>
                <input type="text" class="form-control" name="f_store_email" value="{{ $store->f_store_email }}">
            </div>

            <div class="mb-3">
                <label for="f_vat_code" class="form-label">PVM kodas</label>
                <input type="text" class="form-control" name="f_vat_code" value="{{ $store->f_vat_code }}">
            </div>

            <div class="mb-3">
                <label for="f_noexported">Neeksportuojamas</label>
                <input type="checkbox" value=1 id="f_noexported" name="f_noexported" {{ $store->f_noexported ? 'checked' : '' }}>
            </div>

            <div class="mb-3">
                <label for="f_price_by_store">Kainų prioritetas pagal padalinį</label>
                <input type="checkbox" value=1 id="f_price_by_store" name="f_price_by_store" {{ $store->f_price_by_store ? 'checked' : '' }}>
            </div>

            <div  class="mb-3" hidden>
                <label for="f_system1" class="form-label">System1</label>
                <input type="text" class="form-control" name="f_system1" value="{{ $store->f_system1 }}">
            </div>

            <div class="mb-3" hidden>
                <label for="f_system2" class="form-label">System2</label>
                <input type="text" class="form-control" name="f_system2" value="{{ $store->f_system2 }}">
            </div>

            <div class="mb-3" hidden>
                <label for="f_system3" class="form-label">System3</label>
                <input type="text" class="form-control" name="f_system3" value="{{ $store->f_system3 }}">
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
