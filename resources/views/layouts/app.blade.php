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

</body>
</html>
