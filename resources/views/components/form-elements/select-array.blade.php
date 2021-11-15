{{--<div class="mb-2" {{ $hidden ?? '' }}>--}}
{{--    <label class="form-label {{ $labelClass ?? '' }}">@lang($labelValue)</label> {{ old($name) }}--}}
{{--    <div class="input-group">--}}
{{--        <select class="form-select-sm form-control form-control-sm {{ $selectClass ?? '' }}" @error($name) is-invalid @enderror"--}}
{{--                name="{{ $name }}">--}}
{{--            @foreach($items as $item)--}}
{{--                <option value="{{ $item }}" {{ selected($name, $item, $defaultValue ?? '') }}>@lang($selectValue . $item)</option>--}}
{{--            @endforeach--}}
{{--        </select>--}}
{{--    </div>--}}
{{--    @error($name) <span class="invalid-feedback"--}}
{{--                              role="alert"> <strong>{{ $message }}</strong> </span> @enderror--}}
{{--</div>--}}

<div class="mb-2 row" {{ $hidden ?? '' }}>
    <label class="col-form-label col-6 col-xxl-5 text-sm">@lang($labelValue)</label>
    <div class="col-6 col-xxl-7">
        <div class="input-group">
            <select wire:model.lazy="{{ $wireModel ?? '' }}"
                    wire:change="{{$wireChange ?? ''}}"
                    {{ $disabled ?? '' }}
                    class="form-select-sm form-control form-control-sm {{ $selectClass ?? '' }} @error($name) is-invalid @enderror"
                    name="{{ $name }}">
                @foreach($items as $item)
                    <option value="{{ $item }}" {{ selected($name, $item, $defaultValue ?? '') }}>@lang($selectValue . $item)</option>
                @endforeach
            </select>
            @error($name) <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
        </div>
    </div>

    @if(isset($disabled) )
        <input type="hidden" name="{{ $name }}" value="{{ $defaultValue }}">
    @endif
</div>
