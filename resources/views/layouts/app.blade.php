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
    @include('layouts.main')
@endif
<script src="{{ asset('theme/js/app.js') }}"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {

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

        Inputmask({
            mask: "V{20}",
            definitions: {
                "V": {
                    validator: "[A-Za-z0-9_-]",
                    casing: "upper"
                }
            },
            placeholder: '',
            showMaskOnHover: false
        }).mask(document.querySelectorAll('[id-pattern]'));
    });
</script>
</body>
</html>
