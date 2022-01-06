@extends('layouts.app')

@section('content')
    <a href="{{ route('units.create') }}" class="btn btn-primary float-end mt-n1"><i class="fas fa-plus"></i> @lang('global.btn_new')</a>
    <div class="mb-3">
        <h1>@lang('modules/unit.h1')</h1>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="table-responsive">
                    <table class="table mb-0 table-sm table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">@lang('modules/unit.f_id')</th>
                            <th scope="col">@lang('modules/unit.f_name')</th>
                            <th scope="col">@lang('modules/unit.f_component')</th>
                            <th scope="col">@lang('modules/unit.f_create_userid')</th>
                            <th scope="col">@lang('modules/unit.f_create_date')</th>
                            <th scope="col">@lang('modules/unit.f_modified_userid')</th>
                            <th scope="col">@lang('modules/unit.f_modified_date')</th>
                            <th scope="col">@lang('global.actions')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($units as $unit)
                            <tr>

                                @if(session()->has('queue_of_actions'))
                                    <td><button style="outline: none; box-shadow: none;" form="unit_selected_by_form" class="btn w-100 h-100 text-start p-0" name="button-action-without-validation" value="selected-by|{{ $unit->f_id }}" >{{ $unit->f_id !== null ? $unit->f_id : '-' }}</button></td>
                                    <td><button style="outline: none; box-shadow: none;" form="unit_selected_by_form" class="btn w-100 h-100 text-start p-0" name="button-action-without-validation" value="selected-by|{{ $unit->f_id }}" >{{ $unit->f_name !== null ? $unit->f_name : '-' }}</button></td>
                                    <td><button style="outline: none; box-shadow: none;" form="unit_selected_by_form" class="btn w-100 h-100 text-start p-0" name="button-action-without-validation" value="selected-by|{{ $unit->f_id }}" >{{ $unit->f_component !== null ? $unit->f_component : '-' }}</button></td>
                                    <td><button style="outline: none; box-shadow: none;" form="unit_selected_by_form" class="btn w-100 h-100 text-start p-0" name="button-action-without-validation" value="selected-by|{{ $unit->f_id }}" >{{ $unit->f_create_userid !== null ? $unit->f_create_userid : '-' }}</button></td>
                                    <td><button style="outline: none; box-shadow: none;" form="unit_selected_by_form" class="btn w-100 h-100 text-start p-0" name="button-action-without-validation" value="selected-by|{{ $unit->f_id }}" >{{ $unit->f_create_date !== null ? $unit->f_create_date : '-' }}</button></td>
                                    <td><button style="outline: none; box-shadow: none;" form="unit_selected_by_form" class="btn w-100 h-100 text-start p-0" name="button-action-without-validation" value="selected-by|{{ $unit->f_id }}" >{{ $unit->f_modified_userid !== null ? $unit->f_modified_userid : '-' }}</button></td>
                                    <td><button style="outline: none; box-shadow: none;" form="unit_selected_by_form" class="btn w-100 h-100 text-start p-0" name="button-action-without-validation" value="selected-by|{{ $unit->f_id }}" >{{ $unit->f_modified_date !== null ? $unit->f_modified_date : '-' }}</button></td>
                                @else
                                    <td>{{ $unit->f_id }}</td>
                                    <td>{{ $unit->f_name }}</td>
                                    <td>{{ $unit->f_component }}</td>
                                    <td>{{ $unit->f_create_userid }}</td>
                                    <td>{{ $unit->f_create_date }}</td>
                                    <td>{{ $unit->f_modified_userid }}</td>
                                    <td>{{ $unit->f_modified_date }}</td>
                                @endif

                                <td class="table-action">
                                    <a href="{{ route('units.edit', $unit ) }}"><i class="align-middle" data-feather="edit-2"></i></a>
                                    <a href="#" onclick="event.preventDefault();document.getElementById('delete-form-{{ $unit->f_id }}').submit();">
                                        <i class="align-middle" data-feather="trash-2"></i>
                                    </a>
                                    <form action="{{ route('units.destroy', $unit) }}" method="POST" class="d-none" id="delete-form-{{ $unit->f_id }}">
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
            {{ $units->links() }}
        </div>

        {{--    Forms--}}
        @if(session()->has('queue_of_actions'))
            <x-form-elements.form
                id="unit_selected_by_form"
                route="units.store"
                method="POST"
            />
        @endif
    </div>
@endsection

