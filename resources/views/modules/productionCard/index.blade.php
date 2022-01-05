@extends('layouts.app')

@section('content')
    <div>
        <a href="{{ route('production-cards.create') }}" class="btn btn-primary float-end mt-n1"><i
                class="fas fa-plus"></i> @lang('global.btn_new')</a>
        <button
            class="btn btn-primary float-end mt-n1 mx-1"
            data-bs-toggle="modal"
            data-bs-target="#selection-of-grid-collumns"
        >
            <i class="fas fa-hashtag"></i>
        </button>
    </div>

    <div class="mb-3">
        <h1>@lang('modules/productionCard.h1')</h1>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="table">
                    <table class="table mb-0 table-sm table-bordered table-hover data"
                           data-rtc-resizable-table="productionCard.index">
                        <thead>
                        <tr class="text-primary">
                            @foreach($gridColumns as $column)
                                @if($column['active'])
                                    @if($column['sortable'])
                                    <th data-rtc-resizable="{{ $column['name'] }}">
                                        @sortablelink($column['name'],trans('modules/productionCard.'.$column['name']),
                                        ['form' => $form])
                                    </th>

                                    @else
                                        <th data-rtc-resizable="{{ $column['name'] }}">
                                            {{ $column['name'] }}
                                        </th>
                                    @endif
                                @endif
                            @endforeach

                            <th scope="col">@lang('global.actions')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($productionCards as $card)
                            <tr>
                                @foreach($gridColumns as $column)
                                    @if($column['active'])
                                        <td>{{ $card[$column['name']] }}</td>
                                    @endif
                                @endforeach

                                <td class="table-action text-center">
                                    <a href="{{ route('production-cards.edit', $card) }}"><i
                                            class="align-middle text-primary" data-feather="edit-2"></i></a>
                                    <x-buttons.delete>
                                        <x-slot name="route">{{ route('production-cards.destroy', $card) }}</x-slot>
                                        <x-slot name="id">{{ $card->f_id }}</x-slot>
                                    </x-buttons.delete>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{ $productionCards->links() }}
        </div>

        <!-- Modal -->
        <x-modals.selection-of-grid-columns
            :gridColumns="$gridColumns"
            :form="$form"
        />
    </div>
@endsection

