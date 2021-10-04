@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach($projects as $project)
            <p><a href="{{ route('projects.show', $project->f_id) }}">{{ $project->f_id }} </a></p>
        @endforeach
    </div>
@endsection
