<div class="modal fade" id="selection-of-grid-collumns" tabindex="-1"
     aria-labelledby="selection-of-grid-collumns-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div>
                    <div class="d-flex justify-content-center mt-3">
                        <div class="bg-white rounded">
                            <div>
                                <h1 class="text-center">Pasirinkti</h1>
                            </div>
                            <div selection-of-grid-collumns-container class="d-flex justify-content-center flex-column align-items-between">
                                @foreach($gridColumns as $column)
                                    <div
                                        selection-of-grid-collumn="{{ $column['name'] }}"
                                        class="draggable d-flex justify-content-between align-items-center cursor-grab py-1 px-3 my-1 bg-primary-light rounded"
                                        draggable="true"
                                    >
                                        {{ $column['name'] }}
                                        <i clickable class="cursor-pointer {{ $column['active'] ? 'far fa-eye' : 'far fa-eye-slash' }}"></i>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                <input id="columns" name="columns" type="hidden" form="save_active_column_form">

                <x-form-elements.button
                    form="save_active_column_form"
                    class="btn-primary"
                    text="global.btn_save"
                    id="submit"
                />

                <x-form-elements.button
                    form="reset_active_column_form"
                    class="btn-primary"
                    text="global.btn_reset"
                    id="submit"
                />
            </div>
        </div>
    </div>

{{--    forms--}}
    <x-form-elements.form
        id="save_active_column_form"
        route="grid.saveActiveColumns"
        method="POST"
    />

    <x-form-elements.form
        id="reset_active_column_form"
        route="grid.resetActiveColumns"
        method="GET"
    />
</div>



