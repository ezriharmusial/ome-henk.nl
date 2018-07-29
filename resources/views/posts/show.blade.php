@extends ('layouts.master')

@section ('title')
                <span class="icon is-medium">
                    <i class="{{ $page->title_icon }}"></i>
                </span>
                <span>{{ $page->title}}</span>
@endsection

@section ('page-header-style')
is-medium
@endsection
@section ('page-header-bg')
@if ($featuredImageUrl = $post->getFirstMediaUrl('featured-images', 'full'))
style="background-image: url('{{ $featuredImageUrl }}');background-size: cover;"
@endif
@endsection

@section ('subtitle')
{{ $post->title }}
@endsection
@section ('content')
            <div class="columns">
                <div class="column">
                    @include('posts.article')
                    {{-- @include('partials.comments') --}}
                </div>
                <div class="column is-one-third">
                    @if ($media = $post->getFirstMedia('featured-images') )
                    <label class="has-zoom-in-cursor" for="featured-image-toggle">
                        <figure class="image is-3by2">
                            {{ $media('full') }}
                        </figure>
                    </label>
                    @endif

                    @can('pagepost-crud')
                    @if ( !is_null(Auth::user()) && !is_null( \App\Page::first() ) )
                    @include ('partials.article-info')
                    @endif
                    @endcan
                </div>
            </div>
@endsection
@section('footer')
        <input id="featured-image-toggle" type="checkbox" />
        <div class="modal" id="featured-image-modal">
            <label for="featured-image-toggle">
                <div class="modal-background"></div>
                <div class="modal-content">
                    <figure class="image is-3by2">
                        {{ $post->getFirstMedia('featured-images') }}
                    </figure>
                </div>
                <div class="modal-close is-large" for="featured-image-toggle"></div>
            </label>
        </div>
@append

