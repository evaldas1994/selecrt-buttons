@extends('layouts.app')

@section('content')
    <div class="container">
        <p>id: {{ $message->f_id }}</p>
        <p>name: {{ $message->f_name }}</p>
        <p>Prekės grupė: {{ $message->f_groupid }}</p>
        <p>Pradelsta dienų: {{ $message->f_days }}</p>
        <p>Min. pradelsta suma: {{ $message->f_min_sum }}</p>
        <p>Pranešimo tema: {{ $message->f_subject }}</p>
        <p>Pranešimo tekstas: {{ $message->f_message }}</p>

        <a href="{{ route('messages.edit', $message->f_id) }}">Edit</a>

        <form method="post" action="{{ route('messages.destroy', $message->f_id) }}">

            @method('DELETE')
            @csrf
            <button type="submit">Delete</button>
        </form>

    </div>
@endsection
