@extends('layouts.app')

@section('content')
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto">
            <h1>@lang('modules/stockGroup.h1')</h1>
        </div>

        <div class="col-auto ms-auto text-end mt-n1">
            <a href="#" class="btn btn-primary"
               onclick="event.preventDefault();document.getElementById('stock-group-form').submit();">@lang('global.btn_save')</a>
            <a href="{{ route('stock-groups.index') }}" class="btn btn-dark">@lang('global.btn_close')</a>
        </div>
    </div>
    <div class="row">
        <div class="card">
            <div class="col-12 col-xl-4">
                <div class="card-body">
                    <form id="stock-group-form" action="{{ route('stock-groups.store') }}" method="POST">
                        @csrf

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/stockGroup.f_id')</label>
                            <input type="text"
                                   class="not-empty form-control form-control-sm @error('f_id') is-invalid @enderror"
                                   name="f_id"
                                   id-pattern
                                   placeholder="@lang('modules/stockGroup.f_id')"
                                   required
                                   maxlength="20"
                                   value="{{ old('f_id')}}">
                            @error('f_id') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/stockGroup.f_name')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_name') is-invalid @enderror"
                                   name="f_name"
                                   placeholder="@lang('modules/stockGroup.f_name')"
                                   maxlength="100"
                                   value="{{ old('f_name')}}">
                            @error('f_name') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/stockGroup.f_name2')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_name2') is-invalid @enderror"
                                   name="f_name2"
                                   placeholder="@lang('modules/stockGroup.f_name2')"
                                   maxlength="100"
                                   value="{{ old('f_name2')}}">
                            @error('f_name2') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-check m-0">
                                <span class="form-check-label">@lang('modules/stockGroup.f_catalog_group')</span>
                                <input type="hidden" name="f_catalog_group" value="0">
                                <input type="checkbox" name="f_catalog_group" class="form-check-input @error('f_catalog_group') is-invalid @enderror" value="{{ old('f_catalog_group', 1) }}"  {{ old('f_catalog_group') == 1 ? 'checked' : '' }}>
                            </label>
                            @error('f_catalog_group') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <h4 class="form-label mt-5">@lang('modules/stockGroup.allowed')</h4>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/stockGroup.f_allowed_from')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_allowed_from') is-invalid @enderror"
                                   name="f_allowed_from"
                                   placeholder="@lang('modules/stockGroup.f_allowed_from')"
                                   maxlength="100"
                                   value="{{ old('f_allowed_from')}}">
                            @error('f_allowed_from') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/stockGroup.f_allowed_to')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_allowed_to') is-invalid @enderror"
                                   name="f_allowed_to"
                                   placeholder="@lang('modules/stockGroup.f_allowed_to')"
                                   maxlength="100"
                                   value="{{ old('f_allowed_to')}}">
                            @error('f_allowed_to') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-check m-0">
                                <span class="form-check-label">@lang('modules/stockGroup.f_ignore_promotion')</span>
                                <input type="hidden" name="f_ignore_promotion" value="0">
                                <input type="checkbox" name="f_ignore_promotion" class="form-check-input @error('f_ignore_promotion') is-invalid @enderror" value="{{ old('f_ignore_promotion', 1) }}"  {{ old('f_ignore_promotion') == 1 ? 'checked' : '' }}>
                            </label>
                            @error('f_ignore_promotion') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-check m-0">
                                <span class="form-check-label">@lang('modules/stockGroup.f_perishable_goods')</span>
                                <input type="hidden" name="f_perishable_goods" value="0">
                                <input type="checkbox" name="f_perishable_goods" class="form-check-input @error('f_perishable_goods') is-invalid @enderror" value="{{ old('f_perishable_goods', 1) }}"  {{ old('f_perishable_goods') == 1 ? 'checked' : '' }}>
                            </label>
                            @error('f_perishable_goods') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-check m-0">
                                <span class="form-check-label">@lang('modules/stockGroup.f_ignore_voucher')</span>
                                <input type="hidden" name="f_ignore_voucher" value="0">
                                <input type="checkbox" name="f_ignore_voucher" class="form-check-input @error('f_ignore_voucher') is-invalid @enderror" value="{{ old('f_ignore_voucher', 1) }}"  {{ old('f_ignore_voucher') == 1 ? 'checked' : '' }}>
                            </label>
                            @error('f_ignore_voucher') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/stockGroup.f_group_parent')</label>
                            <select class="form-control form-control-sm @error('f_group_parent') is-invalid @enderror" name="f_group_parent">
                                <option value selected>---</option>
                                @foreach($stockGroups as $group)
                                    <option value="{{ $group->f_id }}" {{ selected('f_group_parent', $group->f_id) }}>{{ $group->f_name }}</option>
                                @endforeach
                            </select>
                            @error('f_group_parent') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/stockGroup.f_group_level')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_group_level') is-invalid @enderror"
                                   name="f_group_level"
                                   placeholder="@lang('modules/stockGroup.f_group_level')"
                                   maxlength="100"
                                   value="{{ old('f_group_level')}}">
                            @error('f_group_level') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <h4 class="form-label mt-5">@lang('modules/stockGroup.self_service')</h4>

                        <div class="mb-2">
                            <label class="form-check m-0">
                                <span class="form-check-label">@lang('modules/stockGroup.f_age_restriction')</span>
                                <input type="hidden" name="f_age_restriction" value="0">
                                <input type="checkbox" name="f_age_restriction" class="form-check-input @error('f_age_restriction') is-invalid @enderror" value="{{ old('f_age_restriction', 1) }}"  {{ old('f_age_restriction') == 1 ? 'checked' : '' }}>
                            </label>
                            @error('f_age_restriction') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-check m-0">
                                <span class="form-check-label">@lang('modules/stockGroup.f_ignor_gross_weight')</span>
                                <input type="hidden" name="f_ignor_gross_weight" value="0">
                                <input type="checkbox" name="f_ignor_gross_weight" class="form-check-input @error('f_ignor_gross_weight') is-invalid @enderror" value="{{ old('f_ignor_gross_weight', 1) }}"  {{ old('f_ignor_gross_weight') == 1 ? 'checked' : '' }}>
                            </label>
                            @error('f_ignor_gross_weight') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/stockGroup.f_disp_priority')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_disp_priority') is-invalid @enderror"
                                   name="f_disp_priority"
                                   placeholder="@lang('modules/stockGroup.f_disp_priority')"
                                   maxlength="100"
                                   value="{{ old('f_disp_priority', 0)}}">
                            @error('f_disp_priority') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/stockGroup.f_imgurl')</label>
                            <input type="url"
                                   class="form-control form-control-sm @error('f_imgurl') is-invalid @enderror"
                                   name="f_imgurl"
                                   placeholder="@lang('modules/stockGroup.f_imgurl')"
                                   maxlength="400"
                                   value="{{ old('f_imgurl')}}">
                            @error('f_imgurl') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <h4 class="form-label mt-5">@lang('modules/stockGroup.short_group_name')</h4>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/stockGroup.f_name_short_lt')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_name_short_lt') is-invalid @enderror"
                                   name="f_name_short_lt"
                                   placeholder="@lang('modules/stockGroup.f_name_short_lt')"
                                   maxlength="100"
                                   value="{{ old('f_name_short_lt')}}">
                            @error('f_name_short_lt') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/stockGroup.f_name_short_en')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_name_short_en') is-invalid @enderror"
                                   name="f_name_short_en"
                                   placeholder="@lang('modules/stockGroup.f_name_short_en')"
                                   maxlength="100"
                                   value="{{ old('f_name_short_en')}}">
                            @error('f_name_short_en') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/stockGroup.f_name_short_ru')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_name_short_ru') is-invalid @enderror"
                                   name="f_name_short_ru"
                                   placeholder="@lang('modules/stockGroup.f_name_short_ru')"
                                   maxlength="100"
                                   value="{{ old('f_name_short_ru')}}">
                            @error('f_name_short_ru') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2" hidden>
                            <label class="form-label">@lang('modules/stockGroup.f_system1')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_system1') is-invalid @enderror"
                                   name="f_system1"
                                   placeholder="@lang('modules/stockGroup.f_system1')"
                                   maxlength="100"
                                   value="{{ old('f_system1') }}">
                            @error('f_system1') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2" hidden>
                            <label class="form-label">@lang('modules/stockGroup.f_system2')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_system2') is-invalid @enderror"
                                   name="f_system2"
                                   placeholder="@lang('modules/stockGroup.f_system2')"
                                   maxlength="100"
                                   value="{{ old('f_system2') }}">
                            @error('f_system2') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2" hidden>
                            <label class="form-label">@lang('modules/stockGroup.f_system3')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_system3') is-invalid @enderror"
                                   name="f_system3"
                                   placeholder="@lang('modules/stockGroup.f_system3')"
                                   maxlength="100"
                                   value="{{ old('f_system3') }}">
                            @error('f_system3') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
