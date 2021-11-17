<div class="mb-2 row" {{ $hidden ?? '' }}>
    <label class="col-form-label col-6 col-xxl-5 text-sm">@lang($labelValue)</label>
    <div class="col-6 col-xxl-7">
        <div class="input-group">
            <select {{ isset($wireModel) ? 'wire:model.lazy='.$wireModel : '' }}
                    {{ isset($wireChange) ? 'wire:change.lazy='.$wireChange : '' }}
                    class="form-select-sm form-control form-control-sm {{ $selectClass ?? '' }} @error($name) is-invalid @enderror"
                    name="{{ $name }}">
                <option value selected>---</option>
                @foreach($items as $item)
                    <option value="{{ $item->f_id }}" {{ selected($name, $item->f_id, $defaultValue ?? null) }}>{{ $item->f_id }}</option>
                @endforeach
            </select>
            <button
            name="{{ $buttonName }}"
            value="{{ $buttonValue }}"
            type="{{ $buttonType ?? 'submit' }}"
            class="input-group-text {{ $buttonClass ?? '' }}">
                <i class="fas fa-ellipsis-v"></i>
            </button>
            @error($name) <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
        </div>
    </div>
</div>
