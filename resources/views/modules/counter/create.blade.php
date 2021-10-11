@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="post" action="{{ route('counters.store') }}">
            @csrf

            <div class="mb-3">
                <label for="f_id" class="form-label">Kodas</label>
                <input type="text" class="form-control" name="f_id">
            </div>

            <div class="mb-3">
                <label for="f_txt" class="form-label">Tekstas</label>
                <input type="text" class="form-control" name="f_txt">
            </div>

            <div class="mb-3">
                <label for="f_txt_len">Teksto ilgis</label>
                <input type="text" id="f_default" name="f_txt_len" value=0>
            </div>

            <div class="mb-3">
                <label for="f_num" class="form-label">Skaičius</label>
                <input type="text" class="form-control" name="f_num" value=0>
            </div>

            <div class="mb-3">
                <label for="f_num_len" class="form-label">Skaičiaus ilgis</label>
                <input type="text" class="form-control" name="f_num_len" value=0>
            </div>

            <div class="mb-3">
                <label for="f_copy_to_ano">Kopijuoti į Pap. nr.	</label>
                <input type="hidden" name="f_copy_to_ano" value="0">
                <input type="checkbox" value=1 id="f_default" name="f_copy_to_ano">
            </div>

            <div  class="mb-3" hidden>
                <label for="f_type" class="form-label">Tipas</label>
                <input type="text" class="form-control" name="f_type" value=0>
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
