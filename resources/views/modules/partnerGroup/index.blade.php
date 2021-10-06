@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach($partnerGroups as $group)
            <p><a href="{{ route('partnerGroups.show', $group->f_id) }}">{{ $group->f_id }} </a></p>
        @endforeach
    </div>
@endsection
