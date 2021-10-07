@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach($departments as $department)
            <p><a href="{{ route('departments.show', $department->f_id) }}">{{ $department->f_id }} </a></p>
        @endforeach
    </div>
@endsection
