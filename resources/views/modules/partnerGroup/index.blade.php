@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach($partnerGroups as $group)
            <p><a href="{{ route('partner-groups.show', $group->f_id) }}">{{ $group->f_id }} </a></p>
        @endforeach
    </div>
@endsection
