<div class="mb-2" {{ $hidden ?? '' }}>
    <label class="form-label {{ $labelClass ?? '' }}">@lang($labelValue)</label> {{ old($name) }}
    <div class="input-group">
        <select class="form-select-sm form-control form-control-sm {{ $selectClass ?? '' }}" @error($name) is-invalid @enderror"
                name="{{ $name }}">
            <option value selected>---</option>
            @foreach($stocks as $stock)
                <option value="{{ $stock->f_id }}" {{ selected($name, $stock->f_id, $defaultValue ?? null) }}>{{ $stock->f_id }}</option>
            @endforeach
        </select>
        <button
            name="{{ $buttonName }}"
            value="{{ $buttonValue }}"
            type="{{ $buttonType ?? 'submit' }}"
            class="{{ $buttonClass }}">
            <i class="fas fa-ellipsis-v"></i>
        </button>
    </div>
    @error('f_stockid') <span class="invalid-feedback"
                              role="alert"> <strong>{{ $message }}</strong> </span> @enderror
</div>
