@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach($accountGroups as $group)
            <p><a href="{{ route('account-groups.show', $group->f_id) }}">{{ $group->f_id }} </a></p>
        @endforeach
    </div>
@endsection
