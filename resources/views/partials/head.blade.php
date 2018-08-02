    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }} @yield('window-title')</title>

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script>
            window.Laravel = { csrfToken: '{{ csrf_token() }}' }
        </script>

        <!-- Apps -->
        <link rel="stylesheet prefetch" href="{{ asset('css/app.css') }}" crossorigin="anonymous" />
        <!-- Fonts -->
        <link rel="stylesheet prefetch" type="text/css" href="{{ asset('css/font-awesome.css') }}" crossorigin="anonymous">
        @yield('stylesheets')
    </head>
