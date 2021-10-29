@extends('layouts.app')

@section('content')
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto">
            <h1>@lang('modules/loyaltyPoint.h1')</h1>
        </div>

        <div class="col-auto ms-auto text-end mt-n1">
            <a href="#" class="btn btn-primary"
               onclick="event.preventDefault();document.getElementById('loyalty-points-form').submit();">@lang('global.btn_save')</a>
            <a href="{{ route('loyalty-points.index') }}" class="btn btn-dark">@lang('global.btn_close')</a>
        </div>
    </div>
    <div class="row">
        <div class="card">
            <div class="col-12 col-xl-4">
                <div class="card-body">
                    <form id="loyalty-points-form" action="{{ route('loyalty-points.store') }}" method="POST">
                        @csrf

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/loyaltyPoint.f_validity_points')</label>
                            <input
                                type="text"
                                class="form-control form-control-sm date"
                                name="f_validity_points"
                                placeholder="@lang('global.select_date')"
                                value="{{ old('f_validity_points', $todayDate) }}">
                            @error('f_validity_points') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/loyaltyPoint.f_use_points')</label>
                            <input
                                type="text"
                                class="form-control form-control-sm date"
                                name="f_use_points"
                                placeholder="@lang('global.select_date')"
                                value="{{ old('f_use_points', $todayDate) }}">
                            @error('f_use_points') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/loyaltyPoint.f_fix_points')</label>
                            <input
                                type="text"
                                class="not-empty form-control form-control-sm date"
                                name="f_fix_points"
                                placeholder="@lang('global.select_date')"
                                value="{{ old('f_fix_points', $todayDate) }}">
                            @error('f_fix_points') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/loyaltyPoint.f_partner_groupid')</label>
                            <select class="form-control form-control-sm @error('f_partner_groupid') is-invalid @enderror" name="f_partner_groupid">
                                <option value selected>---</option>
                                @foreach($partnerGroups as $group)
                                    <option value="{{ $group->f_id }}" {{ selected('f_partner_groupid', $group->f_id) }}>{{ $group->f_id }}</option>
                                @endforeach
                            </select>
                            @error('f_partner_groupid') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/loyaltyPoint.f_discount_card')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_discount_card') is-invalid @enderror"
                                   name="f_discount_card"
                                   placeholder="@lang('modules/loyaltyPoint.f_discount_card')"
                                   maxlength="20"
                                   value="{{ old('f_discount_card')}}">
                            @error('f_discount_card') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/loyaltyPoint.f_operator')</label>
                            <select class="form-control form-control-sm @error('f_operator') is-invalid @enderror" name="f_operator">
                                @foreach($operatorTypes as $type)
                                    <option value="{{ $type }}" {{ selected('f_operator', $type) }}>@lang('modules/loyaltyPoint.operatorType' . $type )</option>
                                @endforeach
                            </select>
                            @error('f_operator') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/loyaltyPoint.f_system1')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_system1') is-invalid @enderror"
                                   name="f_system1"
                                   placeholder="@lang('modules/loyaltyPoint.f_system1')"
                                   maxlength="100"
                                   value="{{ old('f_system1') }}"
                                   readonly>
                            @error('f_system1') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/loyaltyPoint.f_system2')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_system2') is-invalid @enderror"
                                   name="f_system2"
                                   placeholder="@lang('modules/loyaltyPoint.f_system2')"
                                   maxlength="100"
                                   value="{{ old('f_system2') }}"
                                   readonly>
                            @error('f_system2') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2" hidden>
                            <label class="form-label">@lang('modules/loyaltyPoint.f_system3')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_system3') is-invalid @enderror"
                                   name="f_system3"
                                   placeholder="@lang('modules/loyaltyPoint.f_system3')"
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
