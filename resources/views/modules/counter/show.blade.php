@extends('layouts.app')

@section('content')
    <div class="container">
        <p>Kodas: {{ $counter->f_id }}</p>
        <p>Tekstas: {{ $counter->f_txt }}</p>
        <p>Teksto ilgis: {{ $counter->f_txt_len }}</p>
        <p>Skaičius: {{ $counter->f_num }}</p>
        <p>Skaičiaus ilgis: {{ $counter->f_num_len }}</p>
        <p>Kopijuoti į Pap. nr.: {{ $counter->f_copy_to_ano }}</p>
        <p>f_seq: {{ $counter->f_seq }}</p>
        <p>f_type: {{ $counter->f_type }}</p>

        <a href="{{ route('counters.edit', $counter->f_id) }}">Edit</a>

        <form method="post" action="{{ route('counters.destroy', $counter->f_id) }}">

            @method('DELETE')
            @csrf
            <button type="submit">Delete</button>
        </form>

    </div>
@endsection
