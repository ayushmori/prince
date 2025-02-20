<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'NeXT-SOLUTION') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- jQuery must be loaded first -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Owl Carousel -->
    <link href="{{ asset('assets/css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/owl.theme.default.min.css') }}" rel="stylesheet">

    <!-- exzoom product image -->
    <link href="{{ asset('assets/exzoom/jquery.exzoom.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">

    <!-- Alertify CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/alertify.min.css" />
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/themes/default.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1.7.4/glider.min.css">

    <!-- Apply Custom Font -->
    <style>
        @font-face {
            font-family: 'Poppins';
            src: url('/fonts/Poppins-Regular.woff2') format('woff2'),
                 url('/fonts/Poppins-Regular.woff') format('woff');
            font-weight: normal;
            font-style: normal;
        }

        @font-face {
            font-family: 'Poppins';
            src: url('/fonts/Poppins-Bold.woff2') format('woff2'),
                 url('/fonts/Poppins-Bold.woff') format('woff');
            font-weight: bold;
            font-style: normal;
        }

        /* Apply font to website */
        body {
            font-family: 'Poppins', sans-serif;
        }

        /* body {
            font-family: 'Arial Rounded MT'!important, Arial, sans-serif;
        } */

        /* Custom scrollbar for webkit browsers (Chrome, Safari, etc.) */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        /* Custom scrollbar thumb (the draggable part) */
        ::-webkit-scrollbar-thumb {
            background-color: #888;
            border-radius: 0;
        }

        ::-webkit-scrollbar-track {
            background-color: #f1f1f1;
            border-radius: 0;
        }

        ::-webkit-scrollbar-thumb:hover {
            background-color: #555;
        }
    </style>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>

    <div id="app">

        @include('layouts.inc.frontend.navbar')

        <main>
            @yield('content')
        </main>

    </div>
    @include('layouts.inc.frontend.footer')

    <style>
        body,
        html {
            margin: 0;
            padding: 0;
        }
    </style>

    <!-- Popper.js and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

    <!-- Glider.js -->
    <script src="https://cdn.jsdelivr.net/npm/glider-js@1.7.4/glider.min.js"></script>

    <script>
        window.addEventListener('message', event => {
            alertify.set('notifier', 'position', 'top-right');
            alertify.notify(event.detail.text, event.detail.type);
        });
    </script>

    @yield('scripts')
    <script src="{{ asset('assets/exzoom/jquery.exzoom.js') }}"></script>

    @livewireScripts
    <livewire:styles />
    <livewire:scripts />

    @stack('script')

</body>

</html>
