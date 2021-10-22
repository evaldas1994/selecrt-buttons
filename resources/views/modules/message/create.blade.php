@extends('layouts.app')

@section('content')
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto">
            <h1>@lang('modules/message.h1')</h1>
        </div>

        <div class="col-auto ms-auto text-end mt-n1">
            <a href="#" class="btn btn-primary"
               onclick="event.preventDefault();document.getElementById('message-form').submit();">@lang('global.btn_save')</a>
            <a href="{{ route('messages.index') }}" class="btn btn-dark">@lang('global.btn_close')</a>
        </div>
    </div>
    <div class="row">
        <div class="card">
            <div class="col-12 col-xl-4">
                <div class="card-body">
                    <form id="message-form" action="{{ route('messages.store') }}" method="POST">
                        @csrf

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/message.f_id')</label>
                            <input type="text"
                                   class="not-empty form-control form-control-sm @error('f_id') is-invalid @enderror"
                                   name="f_id"
                                   id-pattern
                                   placeholder="@lang('modules/message.f_id')"
                                   required
                                   maxlength="20"
                                   value="{{ old('f_id')}}">
                            @error('f_id') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/message.f_name')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_name') is-invalid @enderror"
                                   name="f_name"
                                   placeholder="@lang('modules/message.f_name')"
                                   maxlength="100"
                                   value="{{ old('f_name')}}">
                            @error('f_name') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/message.f_groupid')</label>
                            <select class="not-empty form-control form-control-sm @error('f_groupid') is-invalid @enderror" name="f_groupid" value="{{ old('f_groupid') }}">
                                <option value selected>---</option>
                                @foreach($messageGroups as $group)
                                    <option value="{{ $group->f_id }}" {{ selected('f_groupid', $group->f_id) }}>{{ $group->f_id }}</option>
                                @endforeach
                            </select>
                            @error('f_groupid') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/message.f_days')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_days') is-invalid @enderror"
                                   name="f_days"
                                   placeholder="@lang('modules/message.f_days')"
                                   maxlength="15"
                                   value="{{ old('f_days', 0)}}">
                            @error('f_days') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/message.f_min_sum')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_min_sum') is-invalid @enderror"
                                   name="f_min_sum"
                                   placeholder="@lang('modules/message.f_min_sum')"
                                   maxlength="15"
                                   value="{{ old('f_min_sum', '0.00')}}">
                            @error('f_min_sum') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/message.f_subject')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_subject') is-invalid @enderror"
                                   name="f_subject"
                                   placeholder="@lang('modules/message.f_subject')"
                                   maxlength="15"
                                   value="{{ old('f_subject')}}">
                            @error('f_subject') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/message.f_message')</label>
                            <textarea
                                class="form-control form-control-sm @error('f_message') is-invalid @enderror"
                                name="f_message"
                                rows="4"
                                cols="50">{{ old('f_message')}}</textarea>
                            @error('f_message') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2" hidden>
                            <label class="form-label">@lang('modules/message.f_system1')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_system1') is-invalid @enderror"
                                   name="f_system1"
                                   placeholder="@lang('modules/message.f_system1')"
                                   maxlength="100"
                                   value="{{ old('f_system1') }}">
                            @error('f_system1') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2" hidden>
                            <label class="form-label">@lang('modules/message.f_system2')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_system2') is-invalid @enderror"
                                   name="f_system2"
                                   placeholder="@lang('modules/message.f_system2')"
                                   maxlength="100"
                                   value="{{ old('f_system2') }}">
                            @error('f_system2') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2" hidden>
                            <label class="form-label">@lang('modules/message.f_system3')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_system3') is-invalid @enderror"
                                   name="f_system3"
                                   placeholder="@lang('modules/message.f_system3')"
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
