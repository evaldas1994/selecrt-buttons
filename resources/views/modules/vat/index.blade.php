@extends('layouts.app')

@section('content')
    <a href="{{ route('vats.create') }}" class="btn btn-primary float-end mt-n1"><i class="fas fa-plus"></i> @lang('global.btn_new')</a>
    <div class="mb-3">
        <h1>@lang('modules/vat.h1')</h1>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="table-responsive">
                    <table class="table mb-0 table-sm table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">@lang('modules/vat.f_id')</th>
                            <th scope="col">@lang('modules/vat.f_name')</th>
                            <th scope="col">@lang('modules/vat.f_vat_perc')</th>
                            <th scope="col">@lang('modules/vat.f_default_vat2_id')</th>
                            <th scope="col">@lang('modules/vat.f_priority_in_integrations')</th>
                            <th scope="col">@lang('modules/vat.f_create_userid')</th>
                            <th scope="col">@lang('modules/vat.f_create_date')</th>
                            <th scope="col">@lang('modules/vat.f_modified_userid')</th>
                            <th scope="col">@lang('modules/vat.f_modified_date')</th>
                            <th scope="col">@lang('global.actions')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($vats as $vat)
                            <tr>
                                <td>{{ $vat->f_id }}</td>
                                <td class="text-nowrap">{{ Str::limit($vat->f_name,35) }}</td>
                                <td>{{ $vat->f_vat_perc }}</td>
                                <td>{{ $vat->f_default_vat2_id }}</td>
                                <td>{{ $vat->f_priority_in_integrations }}</td>
                                <td class="text-nowrap">{{ $vat->f_create_userid }}</td>
                                <td class="text-nowrap">{{ $vat->f_create_date }}</td>
                                <td class="text-nowrap">{{ $vat->f_modified_userid }}</td>
                                <td class="text-nowrap">{{ $vat->f_modified_date }}</td>
                                <td class="table-action">
                                    <a href="{{ route('vats.edit',$vat) }}"><i class="align-middle" data-feather="edit-2"></i></a>
                                    <a href="#" onclick="event.preventDefault();document.getElementById('delete-form-{{ $vat->f_id }}').submit();">
                                        <i class="align-middle" data-feather="trash-2"></i>
                                    </a>
                                    <form action="{{ route('vats.destroy',$vat) }}" method="POST" class="d-none" id="delete-form-{{ $vat->f_id }}">
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
            {{ $vats->links() }}
        </div>
    </div>
@endsection
