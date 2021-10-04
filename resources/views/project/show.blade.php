@extends('layouts.app')

@section('content')
    <div class="container">
        <p>Kodas: {{ $project->f_id }}</p>
        <p>Pavadinimas: {{ $project->f_name }}</p>
        <p>Pavadinimas 2: {{ $project->f_name2 }}</p>

        <a href="{{ route('projects.edit', $project->f_id) }}">Edit</a>

        <form method="post" action="{{ route('projects.destroy', $project->f_id) }}">
            @method('DELETE')
            @csrf

            <button type="submit">Delete</button>
        </form>

    </div>
@endsection
