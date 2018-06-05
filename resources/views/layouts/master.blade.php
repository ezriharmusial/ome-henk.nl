<!DOCTYPE html>
<html>
@include('partials.head')
<body>
    @include('partials.page-header')
    <section class="section">
        <div class="container">
            <div class="content">
                <div class="columns">
                    @yield('content')
                    @include('partials.sidebar')
                </div>
            </div>
        </div>
    </section>
    @include('partials.footer')
    @yield('footer')
    <script type="text/javascript" src="/js/app.js"></script>
</body>
</html>
