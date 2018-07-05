@extends ('layouts.master')
@section ('window-title', '| '. $page->title )
@section ('title')
{{--                 <figure class="is-image is-square">
                    <img src="images\logo.svg" alt="" style="width: 25vw;">
                </figure> --}}
                <span class="icon is-medium">
                    <i class="{{ $page->title_icon }}"></i>
                </span>
                <span>{{ $page->title }}</span>
@endsection
@section ('subtitle')
                {{ $page->subtitle }}
@endsection

@section ('content')
                <div class="column">
                    <article class="content">
                        <h2 class="title">
                            <span class="icon">
                                <i class="{{ $page->title_icon }}"></i>
                            </span>
                            <span>{{ $page->title }}</span>
                        </h2>
                        <h3 class="subtitle has-text-weight-light"><span>{{ $page->subtitle }}</span></h3>
                        {!! $page->content !!}
                    </articls>
@if ($page->has_articles)
@auth
                        <a href="{{ route('posts.create', $page->slug) }}" class="button is-primary is-fullwidth">
                            <span class="icon is-small">
                                <i class="fa fa-plus"></i>
                            </span>
                            <span>Nieuw Artikel</span>
                        </a>
@endauth
@foreach ($page->posts as $post)
                        @include ('posts.article')
@endforeach
@endif
                </div>
@endsection

@section ('sidebar-content')
    @include ('auth.partials.article-info')
@endsection


