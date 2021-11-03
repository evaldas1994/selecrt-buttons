@extends('layouts.app')

@section('content')
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto">
            <h1>@lang('modules/markup.h1')</h1>
        </div>

        <div class="col-auto ms-auto text-end mt-n1">
            <a href="#" class="btn btn-primary"
               onclick="event.preventDefault();document.getElementById('markup-form').submit();">@lang('global.btn_save')</a>
            <a href="{{ route('markups.index') }}" class="btn btn-dark">@lang('global.btn_close')</a>
        </div>
    </div>
    <div class="row">
        <div class="card">
            <div class="col-12 col-xl-4">
                <div class="card-body">
                    <form id="markup-form" action="{{ route('markups.update', $markup) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/markup.f_stockid')</label>
                            <select class="form-control form-control-sm @error('f_stockid') is-invalid @enderror" name="f_stockid">
                                <option value selected>---</option>
                                @foreach($stocks as $stock)
                                    <option value="{{ $stock->f_id }}" {{ selected('f_stockid', $stock->f_id, $markup->f_stockid) }}>{{ $stock->f_id }}</option>
                                @endforeach
                            </select>
                            @error('f_stockid') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/markup.f_partnerid')</label>
                            <select class="form-control form-control-sm @error('f_partnerid') is-invalid @enderror" name="f_partnerid">
                                <option value selected>---</option>
                                @foreach($partners as $partner)
                                    <option value="{{ $partner->f_id }}" {{ selected('f_partnerid', $partner->f_id, $markup->f_partnerid) }}>{{ $partner->f_id }}</option>
                                @endforeach
                            </select>
                            @error('f_partnerid') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/markup.f_groupid')</label>
                            <select class="form-control form-control-sm @error('f_groupid') is-invalid @enderror" name="f_groupid">
                                <option value selected>---</option>
                                @foreach($stockGroups as $group)
                                    <option value="{{ $group->f_id }}" {{ selected('f_groupid', $group->f_id, $markup->f_groupid) }}>{{ $group->f_id }}</option>
                                @endforeach
                            </select>
                            @error('f_groupid') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/markup.f_storeid')</label>
                            <select class="form-control form-control-sm @error('f_storeid') is-invalid @enderror" name="f_storeid">
                                <option value selected>---</option>
                                @foreach($stores as $store)
                                    <option value="{{ $store->f_id }}" {{ selected('f_storeid', $store->f_id, $markup->f_storeid) }}>{{ $store->f_id }}</option>
                                @endforeach
                            </select>
                            @error('f_storeid') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/markup.f_r1id')</label>
                            <select class="form-control form-control-sm @error('f_r1id') is-invalid @enderror" name="f_r1id">
                                <option value selected>---</option>
                                @foreach($registers1 as $register)
                                    <option value="{{ $register->f_id }}" {{ selected('f_r1id', $register->f_id, $markup->f_r1id) }}>{{ $register->f_id }}</option>
                                @endforeach
                            </select>
                            @error('f_r1id') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/markup.f_r2id')</label>
                            <select class="form-control form-control-sm @error('f_r2id') is-invalid @enderror" name="f_r2id">
                                <option value selected>---</option>
                                @foreach($registers2 as $register)
                                    <option value="{{ $register->f_id }}" {{ selected('f_r2id', $register->f_id, $markup->f_r2id) }}>{{ $register->f_id }}</option>
                                @endforeach
                            </select>
                            @error('f_r2id') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/markup.f_r3id')</label>
                            <select class="form-control form-control-sm @error('f_r3id') is-invalid @enderror" name="f_r3id">
                                <option value selected>---</option>
                                @foreach($registers3 as $register)
                                    <option value="{{ $register->f_id }}" {{ selected('f_r3id', $register->f_id, $markup->f_r3id) }}>{{ $register->f_id }}</option>
                                @endforeach
                            </select>
                            @error('f_r3id') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/markup.f_r4id')</label>
                            <select class="form-control form-control-sm @error('f_r4id') is-invalid @enderror" name="f_r4id">
                                <option value selected>---</option>
                                @foreach($registers4 as $register)
                                    <option value="{{ $register->f_id }}" {{ selected('f_r4id', $register->f_id, $markup->f_r4id) }}>{{ $register->f_id }}</option>
                                @endforeach
                            </select>
                            @error('f_r4id') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/markup.f_r5id')</label>
                            <select class="form-control form-control-sm @error('f_r5id') is-invalid @enderror" name="f_r5id">
                                <option value selected>---</option>
                                @foreach($registers5 as $register)
                                    <option value="{{ $register->f_id }}" {{ selected('f_r5id', $register->f_id, $markup->f_r5id) }}>{{ $register->f_id }}</option>
                                @endforeach
                            </select>
                            @error('f_r5id') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/markup.f_markup_perc')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_markup_perc') is-invalid @enderror"
                                   name="f_markup_perc"
                                   placeholder="@lang('modules/markup.f_markup_perc')"
                                   maxlength="100"
                                   value="{{ old('f_markup_perc', $markup->f_markup_perc)}}">
                            @error('f_markup_perc') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-check m-0">
                                <span class="form-check-label">@lang('modules/markup.f_include_vat')</span>
                                <input type="hidden" name="f_include_vat" value="0">
                                <input type="checkbox" name="f_include_vat" class="form-check-input @error('f_include_vat') is-invalid @enderror" value="{{ old('f_include_vat', 1) }}"  {{ old('f_include_vat', $markup->f_include_vat) == 1 ? 'checked' : '' }}>
                            </label>
                            @error('f_include_vat') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2" hidden>
                            <label class="form-label">@lang('modules/markup.f_system1')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_system1') is-invalid @enderror"
                                   name="f_system1"
                                   placeholder="@lang('modules/markup.f_system1')"
                                   maxlength="100"
                                   value="{{ old('f_system1', $markup->f_system1) }}">
                            @error('f_system1') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2" hidden>
                            <label class="form-label">@lang('modules/markup.f_system2')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_system2') is-invalid @enderror"
                                   name="f_system2"
                                   placeholder="@lang('modules/markup.f_system2')"
                                   maxlength="100"
                                   value="{{ old('f_system2', $markup->f_system2) }}">
                            @error('f_system2') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2" hidden>
                            <label class="form-label">@lang('modules/markup.f_system3')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_system3') is-invalid @enderror"
                                   name="f_system3"
                                   placeholder="@lang('modules/markup.f_system3')"
                                   maxlength="100"
                                   value="{{ old('f_system3', $markup->f_system3) }}">
                            @error('f_system3') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
