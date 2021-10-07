@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="post" action="{{ route('departments.store') }}">
            @csrf

            <div class="mb-3">
                <label for="f_id" class="form-label">Kodas</label>
                <input type="text" class="form-control" name="f_id">
            </div>

            <div class="mb-3">
                <label for="f_name" class="form-label">Pavadinimas</label>
                <input type="text" class="form-control" name="f_name">
            </div>

            <div class="mb-3">
                <label for="f_name2" class="form-label">Pavadinimas 2</label>
                <input type="text" class="form-control" name="f_name2">
            </div>

            <div class="mb-3">
                <label for="f_accountid1" class="form-label">Sąskaita</label>
                <select name="f_accountid1" id="f_accountid1">
                    @foreach($accounts as $account)
                        <option value="{{ $account->f_id }}">{{ $account->f_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="f_accountid2" class="form-label">Sąskaita 2</label>
                <select name="f_accountid2" id="f_accountid2">
                    @foreach($accounts as $account)
                        <option value="{{ $account->f_id }}">{{ $account->f_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="f_manager_id" class="form-label">Vadovas</label>
                <select name="f_manager_id" id="f_manager_id">
                </select>
            </div>
            <div class="mb-3">
                <label for="f_parent_id" class="form-label">Valdantysis padalinys</label>
                <select name="f_parent_id" id="f_parent_id">
                </select>
            </div>

            <div  class="mb-3" hidden>
                <label for="f_doc_confirm_rules" class="form-label">Confirm rules</label>
                <input type="text" class="form-control" name="f_doc_confirm_rules">
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
