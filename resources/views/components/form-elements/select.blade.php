<div class="mb-2" {{ $hidden ?? '' }}>
    <label class="form-label {{ $labelClass ?? '' }}">@lang($labelValue)</label> {{ old($name) }}
    <div class="input-group">
        <select class="form-select-sm form-control form-control-sm {{ $selectClass ?? '' }}" @error($name) is-invalid @enderror"
                name="{{ $name }}">
            <option value selected>---</option>
            @foreach($data as $item)
                <option value="{{ $item }}" {{ selected($name, $item, $defaultValue ?? '') }}>@lang($langValue . $item)</option>
            @endforeach
        </select>
    </div>
    @error($name) <span class="invalid-feedback"
                              role="alert"> <strong>{{ $message }}</strong> </span> @enderror
</div>
