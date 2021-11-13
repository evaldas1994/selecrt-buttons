<div class="mb-2" {{ $hidden ?? '' }}>
    <label class="form-label {{ $labelClass ?? '' }}">@lang($labelValue)</label>
    <input type="text"
           class="form-control form-control-sm {{ $inputClass ?? '' }} @error($name) is-invalid @enderror"
           name="{{ $name }}"
           maxlength="{{ $maxLength ?? '255' }}"
           value="{{ old($name, $defaultValue ?? '')}}"
           {{ $readonly ?? '' }}>
    @error($name) <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
</div>
