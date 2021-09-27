@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="post" action="{{ route('sales.store') }}">
            @csrf

            <input type="hidden" class="form-control" name="f_op" value="A">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Docdate</label>
                <input type="date" class="form-control" name="f_docdate">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Name</label>
                <input type="text" class="form-control" name="f_name">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Name</label>
                <input type="text" class="form-control" name="f_name">
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
