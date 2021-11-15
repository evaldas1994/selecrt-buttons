{{--<div class="mb-2" {{ $hidden ?? '' }}>--}}
{{--    <label class="form-label {{ $labelClass ?? '' }}">@lang($labelValue)</label>--}}
{{--    <textarea--}}
{{--        class="form-control form-control-sm {{ $textareaClass ?? '' }} @error('f_ingredients') is-invalid @enderror"--}}
{{--        name="{{ $name }}"--}}
{{--        maxlength="{{ $maxLength ?? null }}"--}}
{{--        rows="4"--}}
{{--        cols="50">{{ old($name, $defaultValue ?? '') }}</textarea>--}}
{{--    @error($name) <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror--}}
{{--</div>--}}

<div class="mb-2 row" {{ $hidden ?? '' }}>
    <label class="col-form-label col-6 col-xxl-5 text-sm">@lang($labelValue)</label>
    <div class="col-6 col-xxl-7">
        <textarea wire:model="{{ $wireModel ?? '' }}"
            class="form-control form-control-sm {{ $textareaClass ?? '' }} @error('f_ingredients') is-invalid @enderror"
            name="{{ $name }}"
            maxlength="{{ $maxLength ?? null }}"
            rows="4"
            cols="50">{{ old($name, $defaultValue ?? '') }}</textarea>
        @error($name) <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
    </div>
</div>
