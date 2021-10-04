@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="post" action="{{ route('accounts.update', $account->f_id) }}">
            @method('PATCH')
            @csrf

            <h1> Pagrindinis </h1>

            <div class="mb-3">
                <label for="f_id" class="form-label">Kodas</label>
                <input type="text" class="form-control" name="f_id" value="{{ $account->f_id }}">
            </div>

            <div class="mb-3">
                <label for="f_name" class="form-label">Pavadinimas</label>
                <input type="text" class="form-control" name="f_name" value="{{ $account->f_name }}">
            </div>

            <div class="mb-3">
                <label for="f_groupid" class="form-label">Prekės grupė</label>
                <select name="f_groupid" id="f_groupid">
                </select>
            </div>

            <div class="mb-3">
                <label for="f_type" class="form-label">Tipas</label>
                <select name="f_type" id="f_type">
                    <option value="S" {{ $account->f_vatid === "S" ? 'selected' : '' }}>S - suminė</option>
                    <option value="D" {{ $account->f_vatid === "D" ? 'selected' : '' }}>D - detalinė</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="f_purpose" class="form-label">Paskirtis</label>
                <select name="f_purpose" id="f_purpose">
                    <option value="B" {{ $account->f_vatid === "B" ? 'selected' : '' }}>B - bendra</option>
                    <option value="D" {{ $account->f_vatid === "D" ? 'selected' : '' }}>D - detalizuota</option>
                    <option value="P" {{ $account->f_vatid === "P" ? 'selected' : '' }}>P - pinigai</option>
                    <option value="A" {{ $account->f_vatid === "A" ? 'selected' : '' }}>A - atsiskaitymai</option>
                    <option value="S" {{ $account->f_vatid === "S" ? 'selected' : '' }}>S - atlyginimai</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="f_vmi_code" class="form-label">VMI klasifikatorius</label>
                <input type="text" class="form-control" name="f_vmi_code" value="{{ $account->f_vmi_code }}">
            </div>

            <div  class="mb-3" hidden>
                <label for="f_system1" class="form-label">System1</label>
                <input type="text" class="form-control" name="f_system1" value="{{ $account->f_system1 }}">
            </div>

            <div class="mb-3" hidden>
                <label for="f_system2" class="form-label">System2</label>
                <input type="text" class="form-control" name="f_system2" value="{{ $account->f_system2 }}">
            </div>

            <div class="mb-3" hidden>
                <label for="f_system3" class="form-label">System3</label>
                <input type="text" class="form-control" name="f_system3" value="{{ $account->f_system3 }}">
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
