<button
    form="{{ $form ?? null }}"
    class="btn {{ $class }}"
    type="{{ $type ?? 'submit' }}"
    name="{{ $name ?? null }}"
    value="{{ $value ?? null}}"
>   @lang($text)
</button>
