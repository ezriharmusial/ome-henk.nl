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
        <script src="https://cdn.jsdelivr.net/npm/vue@2.5.17/dist/vue.js"></script>
        @yield('scripts')
    </body>
</html>
