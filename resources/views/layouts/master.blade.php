<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    @include('partials.head')
    <body>
        @include('partials.page-header')
        <div id="app">
            <section class="section">
                <div class="container">
                    @yield('content')
                </div>
            </section>
        </div>
        @include('partials.footer')
        @yield('footer')
        @yield('modal')
        <!-- SCRIPTS -->
        <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
        @yield('scripts')
    </body>
</html>
