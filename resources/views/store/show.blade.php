@extends('layouts.app')

@section('content')
    <div class="container">
        <p>Kodas: {{ $store->f_id }}</p>
        <p>Pavadinimas: {{ $store->f_name }}</p>
        <p>Pavadinimas 2: {{ $store->f_name2 }}</p>
        <p>Adresas: {{ $store->f_address }}</p>
        <p>Sąskaita: {{ $store->f_accountid }}</p>
        <p>Laukas1: {{ $store->f_f1 }}</p>
        <p>Laukas2: {{ $store->f_f2 }}</p>
        <p>Laukas3: {{ $store->f_f3 }}</p>
        <p>Laukas4: {{ $store->f_f4 }}</p>
        <p>Laukas5: {{ $store->f_f5 }}</p>
        <p>Susiejimo sandėlis: {{ $store->f_store_name }}</p>
        <p>Galioja iki: {{ $store->f_r1id }}</p>
        <p>Registras 2: {{ $store->f_r2id }}</p>
        <p>Registras 3: {{ $store->f_r3id }}</p>
        <p>Registras 4: {{ $store->f_r4id }}</p>
        <p>Registras 5: {{ $store->f_r5id }}</p>
        <p>Padalinys: {{ $store->f_departmentid }}</p>
        <p>Asmuo: {{ $store->f_personid }}</p>
        <p>Projektas: {{ $store->f_projectid }}</p>
        <p>Edi pristatymo ILN numeris: {{ $store->f_iln_edisoft }}</p>
        <p>Sandėlio el. paštas: {{ $store->f_store_email }}</p>
        <p>PVM kodas: {{ $store->f_vat_code }}</p>
        <p>Neeksportuojamas: {{ $store->f_noexported }}</p>
        <p>Kainų prioritetas pagal padalinį: {{ $store->f_price_by_store }}</p>

        <a href="{{ route('stores.edit', $store->f_id) }}">Edit</a>

        <form method="post" action="{{ route('stores.destroy', $store->f_id) }}">
            @method('DELETE')
            @csrf

            <button type="submit">Delete</button>
        </form>

    </div>
@endsection
