<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ env('APP_NAME') ?? 'Codepi Technical Test' }}</title>

        <!-- Style -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Livewire -->
        @livewireStyles
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @yield('content')
        </div>

        <!-- Livewire -->
        @livewireScripts

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
