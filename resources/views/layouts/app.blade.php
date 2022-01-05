<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.head')
<!--
      HOW TO USE:
      data-theme: default (default), dark, light, colored
      data-layout: fluid (default), boxed
      data-sidebar-position: left (default), right
      data-sidebar-layout: default (default), compact
    -->
<body data-theme="default" data-layout="fluid" data-sidebar-position="left" data-sidebar-layout="default">
@if(request()->routeIs('login'))
    @yield('content')
@else


    @if(session()->exists('band'))
        @foreach(session('band') as $session)
            {{ Arr::get($session, 'route-prev.route') . ' -> ' . Arr::get($session, 'route-next.route') }}
        @endforeach
    @endif



    @include('layouts.main')
@endif
@livewireScripts
<script src="{{ asset('js/resizable-table-columns/index.min.js') }}"></script>
<script src="{{ asset('js/resizable-table-columns/store.js') }}"></script>
<script src="{{ asset('theme/js/app.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
@if(app()->getLocale()!='en')
    <script src="{{ asset('theme/js/flatpickr-locales/'.app()->getLocale().'.js') }}"></script>
@endif
<script src="https://validide.github.io/resizable-table-columns/dist/samples/store.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {

        // Date picker
        flatpickr(".date",{
            "locale": "{{ app()->getLocale() == 'en' ? 'default' : app()->getLocale() }}"
        });
        flatpickr(".time", {
            time_24hr: true,
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
        });

        // Messages
        var success = '{{ session('success') }}';
        if (success) {
            getMessage(success, 'success');
        }
        var error = '{{ session('error') }}';
        if (error) {
            getMessage(error, 'danger');
        }
        function getMessage(message, type) {
            var message = message;
            var type = type;
            var duration = 3000;
            var dismissible = true;
            var positionX = 'center';
            var positionY = 'top';
            window.notyf.open({
                type,
                message,
                duration,
                dismissible,
                position: {
                    x: positionX,
                    y: positionY
                }
            });
        }

    });
</script>

{{--  selection of grid collumns  --}}
<script>
    const draggables = document.querySelectorAll('.draggable')
    const containers = document.querySelectorAll('[selection-of-grid-collumns-container]')

    const save_active_column_form = document.getElementById('save_active_column_form');
    save_active_column_form.addEventListener('submit', submit_save_active_column_form);

    const reset_active_column_form = document.getElementById('reset_active_column_form');
    reset_active_column_form.addEventListener('submit', submit_reset_active_column_form);

    function submit_save_active_column_form()
    {
        getActiveArr('save');
    }

    function submit_reset_active_column_form()
    {
        getActiveArr('reset');
    }



    draggables.forEach(draggable => {
        draggable.addEventListener('dragstart', () => {
            draggable.classList.add('dragging')
            draggable.classList.add('bg-primary')
        })

        draggable.addEventListener('dragend', () => {
            draggable.classList.remove('bg-primary')
            draggable.classList.remove('dragging')
        })
    })

    containers[0].addEventListener('dragover', e => {
        e.preventDefault()
        const afterElement = getDragAfterElement(containers[0], e.clientY)
        const draggable = document.querySelector('.dragging')
        if (afterElement == null) {
            containers[0].appendChild(draggable)
        } else {
            containers[0].insertBefore(draggable, afterElement)
        }

        getActiveArr('save');
    })

    function getDragAfterElement(container, y) {
        const draggableElements = [...container.querySelectorAll('.draggable:not(.dragging)')]

        return draggableElements.reduce((closest, child) => {
            const box = child.getBoundingClientRect()
            const offset = y - box.top - box.height / 2
            if (offset < 0 && offset > closest.offset) {
                return {offset: offset, element: child}
            } else {
                return closest
            }
        }, {offset: Number.NEGATIVE_INFINITY}).element
    }


    document.addEventListener('click', function (event) {
        if (!event.target.matches('[clickable]')) return;
        event.preventDefault();

        if (event.target.classList.contains('fa-eye-slash')) {
            event.target.classList.remove('fa-eye-slash')
            event.target.classList.add('fa-eye')
        } else {
            if (event.target.parentElement.parentElement.getElementsByClassName('fa-eye').length > 1) {
                event.target.classList.add('fa-eye-slash')
                event.target.classList.remove('fa-eye')
            }
        }
        getActiveArr('save');
    }, false);

    function getActiveArr(type) {

        let activeArr = [];

        Array.prototype.forEach.call(containers[0].children, child => {
            if (child.firstElementChild.classList.contains('fa-eye')) {
                activeArr.push(child.getAttribute('selection-of-grid-collumn'))
            }
        });

        if (type === 'save') {
            document.getElementById('columns').value = JSON.stringify(activeArr)
        } else if(type === 'reset') {
            document.getElementById('columns').value = JSON.stringify(null)
        }

        return JSON.stringify(activeArr)
    }
</script>

</body>
</html>
