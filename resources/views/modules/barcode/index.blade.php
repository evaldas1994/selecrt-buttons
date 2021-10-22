@extends('layouts.app')

@section('content')
    <a href="{{ route('barcodes.create') }}" class="btn btn-primary float-end mt-n1"><i class="fas fa-plus"></i> @lang('global.btn_new')</a>
    <div class="mb-3">
        <h1>@lang('modules/barcode.h1')</h1>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="table-responsive">
                    <table class="table mb-0 table-sm table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">@lang('modules/barcode.f_stockid')</th>
                            <th scope="col">@lang('modules/barcode.f_id')</th>
                            <th scope="col">@lang('modules/barcode.f_ratio')</th>
                            <th scope="col">@lang('modules/barcode.f_default')</th>
                            <th scope="col">@lang('modules/barcode.f_neto')</th>
                            <th scope="col">@lang('modules/barcode.f_plastic')</th>
                            <th scope="col">@lang('modules/barcode.f_paper')</th>
                            <th scope="col">@lang('modules/barcode.f_glass')</th>
                            <th scope="col">@lang('modules/barcode.f_wood')</th>
                            <th scope="col">@lang('modules/barcode.f_met1')</th>
                            <th scope="col">@lang('modules/barcode.f_pap2')</th>
                            <th scope="col">@lang('modules/barcode.f_usadid')</th>
                            <th scope="col">@lang('modules/barcode.f_create_userid')</th>
                            <th scope="col">@lang('modules/barcode.f_create_date')</th>
                            <th scope="col">@lang('modules/barcode.f_modified_userid')</th>
                            <th scope="col">@lang('modules/barcode.f_modified_date')</th>
                            <th scope="col">@lang('global.actions')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($barcodes as $barcode)
                            <tr>
                                <td>{{ $barcode->f_stockid }}</td>
                                <td>{{ $barcode->f_id }}</td>
                                <td>{{ $barcode->f_ratio }}</td>
                                <td>{{ $barcode->f_default }}</td>
                                <td>{{ $barcode->f_neto }}</td>
                                <td>{{ $barcode->f_plastic }}</td>
                                <td>{{ $barcode->f_paper }}</td>
                                <td>{{ $barcode->f_glass }}</td>
                                <td>{{ $barcode->f_wood }}</td>
                                <td>{{ $barcode->f_met1 }}</td>
                                <td>{{ $barcode->f_pap2 }}</td>
                                <td>{{ $barcode->f_usadid }}</td>
                                <td>{{ $barcode->f_create_userid }}</td>
                                <td>{{ $barcode->f_create_date }}</td>
                                <td>{{ $barcode->f_modified_userid }}</td>
                                <td>{{ $barcode->f_modified_date }}</td>
                                <td class="table-action">
                                    <a href="{{ route('barcodes.edit', $barcode) }}"><i class="align-middle" data-feather="edit-2"></i></a>
                                    <a href="#" onclick="event.preventDefault();document.getElementById('delete-form-{{ $barcode->f_id }}').submit();">
                                        <i class="align-middle" data-feather="trash-2"></i>
                                    </a>
                                    <form action="{{ route('barcodes.destroy', $barcode) }}" method="POST" class="d-none" id="delete-form-{{ $barcode->f_id }}">
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
            {{ $barcodes->links() }}
        </div>
    </div>
@endsection

