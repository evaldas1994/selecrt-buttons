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
                <div class="table-responsive">
                    <table class="table mb-0 table-sm table-bordered">
                        <thead>
                        <tr>
                            @foreach($gridColumns as $column)
                                @if($column['active'])
                                    <th scope="col">@lang('modules/productionCard.' . $column['name'])</th>
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

                                <td class="table-action">
                                    <a href="{{ route('production-cards.edit', $card) }}"><i class="align-middle"
                                                                                             data-feather="edit-2"></i></a>
                                    <a href="#"
                                       onclick="event.preventDefault();document.getElementById('delete-form-{{ $card->f_id }}').submit();">
                                        <i class="align-middle" data-feather="trash-2"></i>
                                    </a>
                                    <form action="{{ route('production-cards.destroy', $card) }}" method="POST"
                                          class="d-none" id="delete-form-{{ $card->f_id }}">
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
            {{ $productionCards->links() }}
        </div>

        <!-- Modal -->
        <x-modals.selection-of-grid-columns
            :gridColumns="$gridColumns"
        />
    </div>
@endsection

