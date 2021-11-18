<div class="mb-2 row" {{ $hidden ?? '' }}>
    <label class="col-form-label col-6 col-xxl-5 text-sm">@lang($labelValue)</label>
    <div class="col-6 col-xxl-7">
        <input {{ isset($wireModel) ? 'wire:model='.$wireModel : '' }}
               {{ isset($wireChange) ? 'wire:change.lazy='.$wireChange : '' }}
               type="text"
               class="form-control form-control-sm {{ $inputClass ?? '' }} @error($name) is-invalid @enderror"
               name="{{ $name }}"
               maxlength="{{ $maxLength ?? '255' }}"
               value="{{ old($name, $defaultValue ?? '')}}"
            {{ $readonly ?? '' }}>
        @error($name) <span {{ $errorHidden ?? '' }} class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
    </div>
</div>
