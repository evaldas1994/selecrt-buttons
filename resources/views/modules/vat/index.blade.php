@extends('layouts.app')

@section('content')
    <a href="{{ route('vats.create') }}" class="btn btn-primary float-end mt-n1"><i class="fas fa-plus"></i> @lang('global.btn_new')</a>
    <div class="mb-3">
        <h1>@lang('modules/vat.h1')</h1>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="table">
                    <table class="table mb-0 table-sm table-bordered table-hover data" data-rtc-resizable-table="vat.index">
                        <thead>
                        <tr>
                            <th data-rtc-resizable="f_id">@sortablelink('f_id',trans('modules/vat.f_id'), ['form' => $form])</th>
                            <th data-rtc-resizable="f_name">@sortablelink('f_name',trans('modules/vat.f_name'), ['form' => $form])</th>
                            <th data-rtc-resizable="f_vat_perc">@sortablelink('f_vat_perc',trans('modules/vat.f_vat_perc'), ['form' => $form])</th>
                            <th data-rtc-resizable="f_default_vat2_id">@sortablelink('f_default_vat2_id',trans('modules/vat.f_default_vat2_id'), ['form' => $form])</th>
                            <th data-rtc-resizable="f_default_vat2_id_name">@sortablelink('vat2.f_name','f_default_vat2_id_name', ['form' => $form])</th>
                            <th data-rtc-resizable="f_priority_in_integrations">@sortablelink('f_priority_in_integrations',trans('modules/vat.f_priority_in_integrations'), ['form' => $form])</th>
                            <th data-rtc-resizable="f_create_userid">@sortablelink('f_create_userid',trans('modules/vat.f_create_userid'), ['form' => $form])</th>
                            <th data-rtc-resizable="f_create_date">@sortablelink('f_create_date',trans('modules/vat.f_create_date'), ['form' => $form])</th>
                            <th data-rtc-resizable="f_modified_userid">@sortablelink('f_modified_userid',trans('modules/vat.f_modified_userid'), ['form' => $form])</th>
                            <th data-rtc-resizable="f_modified_date">@sortablelink('f_modified_date',trans('modules/vat.f_modified_date'), ['form' => $form])</th>
                            <th scope="col" class="text-center">@lang('global.actions')</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($vats as $vat)
                                <tr>
                                    <td>{{ $vat->f_id }}</td>
                                    <td class="">@limit($vat->f_name)</td>
                                    <td>{{ $vat->f_vat_perc }}</td>
                                    <td>{{ $vat->f_default_vat2_id }}</td>
                                    <td>{{ optional($vat->vat2)->f_name }}</td>
                                    <td>@lang('global.checkbox'.$vat->f_priority_in_integrations)</td>
                                    <td>{{ $vat->f_create_userid }}</td>
                                    <td>{{ $vat->f_create_date }}</td>
                                    <td>{{ $vat->f_modified_userid }}</td>
                                    <td>{{ $vat->f_modified_date }}</td>
                                    <td class="table-action text-center">
                                        <a href="{{ route('vats.edit',$vat) }}"><i class="align-middle text-primary" data-feather="edit-2"></i></a>
                                        <x-buttons.delete>
                                            <x-slot name="route">{{ route('vats.destroy',$vat) }}</x-slot>
                                            <x-slot name="id">{{ $vat->f_id }}</x-slot>
                                        </x-buttons.delete>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{ $vats->appends(\Request::except('page'))->render() }}
        </div>
    </div>
@endsection
