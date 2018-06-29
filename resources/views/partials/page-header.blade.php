@php
if (Route::current()->getName() == 'pages.show' && $page->featured_image) {
    $featured_image = $page->featured_image;
} elseif (Route::current()->getName() == 'posts.show' && $post->featured_image) {
    $featured_image = $post->featured_image;
}
@endphp
<section class="hero is-success is-medium"@if (isset($featured_image)) style="background-image: url('/images/{{ $featured_image }}');background-size: cover;"@endif>
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
