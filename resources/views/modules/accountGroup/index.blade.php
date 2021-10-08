@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach($accountGroups as $group)
            <p><a href="{{ route('accountGroups.show', $group->f_id) }}">{{ $group->f_id }} </a></p>
        @endforeach
    </div>
@endsection
