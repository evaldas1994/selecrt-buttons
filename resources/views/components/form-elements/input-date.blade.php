{{--<div class="mb-2" {{ $hidden ?? '' }}>--}}
{{--    <label class="form-label {{ $labelClass ?? '' }}">@lang($labelValue)</label>--}}
{{--    <input type="text"--}}
{{--           class="form-control form-control-sm date {{ $inputClass ?? '' }} @error($name) is-invalid @enderror"--}}
{{--           name="{{ $name }}"--}}
{{--           placeholder="@lang('global.select_date')"--}}
{{--           value="{{ old($name, $defaultValue ?? '')}}">--}}
{{--    @error($name) <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror--}}
{{--</div>--}}

<div class="mb-2 row" {{ $hidden ?? '' }}>
    <label class="col-form-label col-6 text-sm">@lang($labelValue)</label>
    <div class="col-6">
        <input type="text"
               class="form-control form-control-sm date {{ $inputClass ?? '' }} @error($name) is-invalid @enderror"
               name="{{ $name }}"
               placeholder="@lang('global.select_date')"
               value="{{ old($name, $defaultValue ?? '')}}"
            {{ $readonly ?? '' }}>
        @error($name) <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
    </div>
</div>
