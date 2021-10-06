@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="post" action="{{ route('accounts.store') }}">
            @csrf

            <h1> Pagrindinis </h1>

            <div class="mb-3">
                <label for="f_id" class="form-label">Kodas</label>
                <input type="text" class="form-control" name="f_id">
            </div>

            <div class="mb-3">
                <label for="f_name" class="form-label">Pavadinimas</label>
                <input type="text" class="form-control" name="f_name">
            </div>

            <div class="mb-3">
                <label for="f_groupid" class="form-label">Prekės grupė</label>
                <select name="f_groupid" id="f_groupid">
                </select>
            </div>

            <div class="mb-3">
                <label for="f_type" class="form-label">Tipas</label>
                <select name="f_type" id="f_type">
                    <option value="S">S - suminė</option>
                    <option value="D">D - detalinė</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="f_purpose" class="form-label">Paskirtis</label>
                <select name="f_purpose" id="f_purpose">
                    <option value="B">B - bendra</option>
                    <option value="D">D - detalizuota</option>
                    <option value="P">P - pinigai</option>
                    <option value="A">A - atsiskaitymai</option>
                    <option value="S">S - atlyginimai</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="f_vmi_code" class="form-label">VMI klasifikatorius</label>
                <input type="text" class="form-control" name="f_vmi_code">
            </div>

            <div  class="mb-3" hidden>
                <label for="f_system1" class="form-label">System1</label>
                <input type="text" class="form-control" name="f_system1">
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
