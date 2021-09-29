@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="post" action="{{ route('units.update', $unit->f_id) }}">

            @method('PATCH')
            @csrf
            <div class="mb-3">
                <label for="f_id" class="form-label">Code</label>
                <input type="text" class="form-control" name="f_id" value="{{ $unit->f_id }}">
            </div>
            <div class="mb-3">
                <label for="f_name" class="form-label">Name</label>
                <input type="text" class="form-control" name="f_name" value="{{ $unit->f_name }}">
            </div>

            <div class="mb-3" hidden>
                <label for="f_system1" class="form-label">System1</label>
                <input type="text" class="form-control" name="f_system1" value="{{ $unit->f_system1 }}">
            </div>

            <div class="mb-3" hidden>
                <label for="f_system2" class="form-label">System2</label>
                <input type="text" class="form-control" name="f_system2" value="{{ $unit->f_system2 }}">
            </div>

            <div class="mb-3" hidden>
                <label for="f_system3" class="form-label">System3</label>
                <input type="text" class="form-control" name="f_system3" value="{{ $unit->f_system3 }}">
            </div>

            <div class="mb-3">
                <label for="f_component" class="form-label">Component</label>
                <input type="text" class="form-control" name="f_component" value="{{ $unit->f_component  }}">
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
