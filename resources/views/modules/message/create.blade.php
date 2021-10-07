@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="post" action="{{ route('messages.store') }}">
            @csrf

            <div class="mb-3">
                <label for="f_id" class="form-label">Code</label>
                <input type="text" class="form-control" name="f_id">
            </div>
            <div class="mb-3">
                <label for="f_name" class="form-label">Name</label>
                <input type="text" class="form-control" name="f_name">
            </div>

            <div class="mb-3">
                <label for="f_groupid" class="form-label">Prekės grupė</label>
                <select name="f_groupid" id="f_groupid">
                    <option value="TEST1">test1</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="f_days" class="form-label">Pradelsta dienų</label>
                <input type="text" class="form-control" name="f_days" value=0.0000>
            </div>

            <div class="mb-3">
                <label for="f_min_sum" class="form-label">Min. pradelsta suma</label>
                <input type="text" class="form-control" name="f_min_sum" value=0.0000>
            </div>

            <div class="mb-3">
                <label for="f_subject" class="form-label">Pranešimo tema</label>
                <input type="text" class="form-control" name="f_subject">
            </div>

            <div class="mb-3">
                <label for="f_message" class="form-label">Pranešimo tekstas</label>
                <textarea id="f_message" name="f_message" rows="4" cols="50">
                </textarea>
            </div>

            <div class="mb-3" hidden>
                <label for="f_system2" class="form-label">System2</label>
                <input type="text" class="form-control" name="f_system2">
            </div>

            <div class="mb-3" hidden>
                <label for="f_system3" class="form-label">System3</label>
                <input type="text" class="form-control" name="f_system3">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection
