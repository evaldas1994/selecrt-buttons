@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="post" action="{{ route('bankAccounts.update', $bankAccount->f_id) }}">
            @method('PATCH')
            @csrf

            <div class="mb-3">
                <label for="f_id" class="form-label">Kodas</label>
                <input type="text" class="form-control" name="f_id" value="{{ $bankAccount->f_id }}">
            </div>

            <div class="mb-3">
                <label for="f_bankid" class="form-label">Bankas</label>
                <select name="f_bankid" id="f_bankid">
                    @foreach($banks as $bank)
                        <option value="{{ $bank->f_id }}" {{ $bankAccount->f_bankid === $bank->f_id ? 'selected' : '' }}>{{ $bank->f_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="f_partnerid" class="form-label">Partner id</label>
                <select name="f_partnerid" id="f_partnerid">
                    @foreach($partners as $partner)
                        <option value="{{ $partner->f_id }}" {{ $bankAccount->f_partnerid === $partner->f_id ? 'selected' : '' }}>{{ $partner->f_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="f_default">Pagrindinis</label>
                <input type="hidden" name="f_default" value="0">
                <input type="checkbox" value="1" id="f_default" name="f_default" {{ $bankAccount->f_default ? 'checked' : '' }}>
            </div>

            <div  class="mb-3" hidden>
                <label for="f_system1" class="form-label">System1</label>
                <input type="text" class="form-control" name="f_system1" value="{{ $bankAccount->f_system1 }}">
            </div>

            <div class="mb-3" hidden>
                <label for="f_system2" class="form-label">System2</label>
                <input type="text" class="form-control" name="f_system2" value="{{ $bankAccount->f_system2 }}">
            </div>

            <div class="mb-3" hidden>
                <label for="f_system3" class="form-label">System3</label>
                <input type="text" class="form-control" name="f_system3" value="{{ $bankAccount->f_system3 }}">
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
