<!DOCTYPE html>
<html>
@include('partials.head')
<body>
    @include('partials.page-header')
    <div id="app" class="column">
            @yield('content')
    </div>
</body>
</html>
