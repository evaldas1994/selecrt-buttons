@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach($templates as $template)
            <p><a href="{{ route('templates.show', $template->f_id) }}">{{ $template->f_id }} </a></p>
        @endforeach
    </div>
@endsection
