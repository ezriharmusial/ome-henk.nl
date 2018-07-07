    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }} @yield('window-title')</title>

        <link rel="stylesheet prefetch" href="{{ asset('css/app.css') }}" crossorigin="anonymous" />
        @yield('stylesheets')
    </head>
