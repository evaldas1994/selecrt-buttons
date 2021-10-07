@extends('layouts.app')

@section('content')
    <div class="container">
        <p>Kodas: {{ $department->f_id }}</p>
        <p>Pavadinimas: {{ $department->f_name }}</p>
        <p>Pavadinimas 2: {{ $department->f_name2 }}</p>
        <p>Sąskaita: {{ $department->f_accountid1 }}</p>
        <p>Sąskaita 2: {{ $department->f_accountid2 }}</p>
        <p>Vadovas: {{ $department->f_manager_id }}</p>
        <p>Valdantysis padalinys: {{ $department->f_parent_id }}</p>

        <a href="{{ route('departments.edit', $department->f_id) }}">Edit</a>

        <form method="post" action="{{ route('departments.destroy', $department->f_id) }}">
            @method('DELETE')
            @csrf

            <button type="submit">Delete</button>
        </form>

    </div>
@endsection
