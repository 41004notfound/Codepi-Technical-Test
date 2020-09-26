<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

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
    <hr>
    <footer class="page-footer fixed-bottom">
        <!-- Copyright -->
        <div class="footer-copyright text-center bg-white p-3 border-top">
            © 2020 Copyright - <a target="_blank" href="https://lucascote.fr/"> Lucas Côté</a>.
        </div>
        <!-- Copyright -->

    </footer>
</html>
