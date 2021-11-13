<div class="mb-2" {{ $hidden ?? '' }}>
    <label class="form-label {{ $labelClass ?? '' }}">@lang($labelValue)</label> {{ old($name) }}
    <div class="input-group">
        <select class="form-select-sm form-control form-control-sm {{ $selectClass ?? '' }}" @error($name) is-invalid @enderror"
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
    </div>
    @error($name) <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
</div>
