@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="post" action="{{ route('persons.update', $person->f_id) }}">
            @method('PATCH')
            @csrf

            <div class="mb-3">
                <label for="f_id" class="form-label">Kodas</label>
                <input type="text" class="form-control" name="f_id" value="{{ $person->f_id }}">
            </div>

            <div class="mb-3">
                <label for="f_name" class="form-label">Pavadinimas</label>
                <input type="text" class="form-control" name="f_name" value="{{ $person->f_name }}">
            </div>

            <div class="mb-3">
                <label for="f_name2" class="form-label">Pavadinimas 2</label>
                <input type="text" class="form-control" name="f_name2" value="{{ $person->f_name2 }}">
            </div>

            <div class="mb-3">
                <label for="f_coef" class="form-label">Koeficientas</label>
                <input type="text" class="form-control" name="f_coef" value="{{ $person->f_coef }}">
            </div>

            <div  class="mb-3" hidden>
                <label for="f_system1" class="form-label">System1</label>
                <input type="text" class="form-control" name="f_system1" value="{{ $person->f_system1 }}">
            </div>

            <div class="mb-3" hidden>
                <label for="f_system2" class="form-label">System2</label>
                <input type="text" class="form-control" name="f_system2" value="{{ $person->f_system2 }}">
            </div>

            <div class="mb-3" hidden>
                <label for="f_system3" class="form-label">System3</label>
                <input type="text" class="form-control" name="f_system3" value="{{ $person->f_system3 }}">
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
