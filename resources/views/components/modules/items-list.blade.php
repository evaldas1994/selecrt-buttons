<div class="table-responsive">
    <table class="table table-sm table-striped">
        <thead>
        <tr>
            @foreach($langs as $lang)
                <th scope="col">@lang($lang)</th>
            @endforeach

            <th scope="col">@lang('global.actions')</th>
        </tr>
        </thead>
        <tbody>

        @foreach($items as $item)

            <tr>
                @foreach($fields as $field)
                    <td>{{ $item[$field] }}</td>
                @endforeach

                <td class="table-action">
                    <x-form-elements.button
                        form="{{ $form }}"
                        class="p-0"
                        name="button-action-without-validation"
                        value="{{ $name }}-edit|{{ $item->f_id }}"
                        dataFeather="edit-2"
                    />
                    <x-form-elements.button
                        form="delete_form_{{ $item->f_id }}"
                        class="p-0"
                        name="button-action-without-validation"
                        value="{{ $name }}-delete|{{ $item->f_id }}"
                        dataFeather="trash-2"
                    />
                    <form
                        action="{{ route($deleteFormRoute, [$parentRouteData, $item]) }}"
                        method="POST" class="d-none"
                        id="delete_form_{{ $item->f_id }}"
                        name="delete_form_{{ $item->f_id }}">
                        @csrf
                        @method('DELETE')
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
