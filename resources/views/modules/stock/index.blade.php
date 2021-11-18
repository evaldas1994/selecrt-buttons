@extends('layouts.app')

@section('content')
    <a href="{{ route('stocks.create') }}" class="btn btn-primary float-end mt-n1"><i class="fas fa-plus"></i> @lang('global.btn_new')</a>
    <div class="mb-3">
        <h1>@lang('modules/stock.h1')</h1>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="table-responsive">
                    <table class="table mb-0 table-sm table-bordered table-striped">
                        <thead>
                        <tr>
                            <th scope="col">@lang('modules/stock.f_id')</th>
                            <th scope="col">@lang('modules/stock.f_name')</th>
                            <th scope="col">@lang('modules/stock.f_type')</th>
                            <th scope="col">@lang('modules/stock.f_groupid')</th>
                            <th scope="col">@lang('modules/stock.f_unitid')</th>
                            <th scope="col">@lang('modules/stock.f_price_sale1')</th>
                            <th scope="col">@lang('global.actions')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($stocks as $stock)
                            <tr>
                                <td>{{ $stock->f_id }}</td>
                                <td>{{ $stock->f_name }}</td>
                                <td>{{ $stock->f_type }}</td>
                                <td>{{ $stock->f_groupid }}</td>
                                <td>{{ $stock->f_unitid }}</td>
                                <td>{{ $stock->f_price_sale1 }}</td>
                                <td class="table-action">
                                    <a href="{{ route('stocks.edit', $stock) }}"><i class="align-middle" data-feather="edit-2"></i></a>
                                    <a href="#" onclick="event.preventDefault();document.getElementById('delete-form-{{ $stock->f_id }}').submit();">
                                        <i class="align-middle" data-feather="trash-2"></i>
                                    </a>
                                    <form action="{{ route('stocks.destroy', $stock) }}" method="POST" class="d-none" name="delete-form-{{ $stock->f_id }}" id="delete-form-{{ $stock->f_id }}">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{ $stocks->links() }}
        </div>
    </div>
@endsection

