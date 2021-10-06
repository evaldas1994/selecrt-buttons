@extends('layouts.app')

@section('content')
    <div class="container">
        <p>id: {{ $unit->f_id }}</p>
        <p>name: {{ $unit->f_name }}</p>
        <p>user id: {{ $unit->f_create_userid }}</p>
        <p>modified user id: {{ $unit->f_modified_userid }}</p>
        <p>system1: {{ $unit->f_system1 }}</p>
        <p>system2: {{ $unit->f_system2 }}</p>
        <p>system3: {{ $unit->f_system3 }}</p>
        <p>component: {{ $unit->f_component }}</p>

        <a href="{{ route('units.edit', $unit->f_id) }}">Edit</a>

        <form method="post" action="{{ route('units.destroy', $unit->f_id) }}">

            @method('DELETE')
            @csrf
            <button type="submit">Delete</button>
        </form>

    </div>
@endsection
