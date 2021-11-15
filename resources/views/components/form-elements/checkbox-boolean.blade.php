{{--<div class="mb-2">--}}
{{--    <div class="m-0">--}}
{{--        <div class="input-group">--}}
{{--            <div class="input-group-text">--}}
{{--                <input type="hidden" name="{{ $name }}" value="0">--}}
{{--                <input type="checkbox" name="{{ $name }}" id="{{ $name }}" class=" {{ $inputClass ?? '' }} @error($name) is-invalid @enderror" value="{{ old($name, 1) }}" {{ old($name, $defaultValue ?? null) == 1 ? 'checked' : '' }}>--}}
{{--            </div>--}}
{{--            <label class="form-control form-control-sm form-check-label {{ $labelClass ?? '' }}" for="{{ $name }}">@lang($labelValue)</label>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    @error($name) <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror--}}
{{--</div>--}}

<div class="mb-2" {{ $hidden ?? '' }}>
    <div class="m-0">
        <div class="input-group">
            <label class="form-control form-control-sm form-check-label {{ $labelClass ?? '' }}" for="{{ $name }}">@lang($labelValue)</label>
            <div class="input-group-text">
                <input type="hidden" name="{{ $name }}" value="0">
                <input type="checkbox" name="{{ $name }}" id="{{ $name }}" class=" {{ $inputClass ?? '' }} @error($name) is-invalid @enderror" value="{{ old($name, 1) }}" {{ old($name, $defaultValue ?? null) == 1 ? 'checked' : '' }}>
            </div>
        </div>
    </div>
    @error($name) <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
</div>
