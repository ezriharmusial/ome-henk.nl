<!DOCTYPE html>
<html>
@include('partials.head')
<body class="has-navbar-fixed-top">
    @include('partials.page-header')

    @include('partials.notification')

    <section class="section">
        <div class="container">
            @yield('content')
        </div>
    </section>

    @include('partials.footer')

@yield('footer')
</body>
</html>
