 <section class="hero is-primary is-bold @yield('page-header-style')" @yield('page-header-bg')>
        <!-- Hero head: will stick at the top -->
        <div class="hero-head">
            @include ('partials.nav')
        </div>

        <!-- Hero content: will be in the middle -->
        <div class="hero-body">
            <div class="container has-text-centered">
                <h1 class="title">
@yield('title')
                </h1>
                <h2 class="subtitle">
@yield('subtitle')
                </h2>
            </div>
        </div>

        <!-- Hero footer: will stick at the bottom -->
        <div class="hero-foot">
            @include('partials.tabs')
        </div>
    </section>
