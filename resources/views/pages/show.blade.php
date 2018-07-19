@extends ('layouts.master')
@section ('window-title')
| {{ $page->title or 'Welkom op Ome-Henk.nl' }}
@endsection
@section ('page-header-style')
is-large
@endsection
@section ('page-header-bg')
@if ($pageHeaderUrl = $page->getFirstMediaUrl('page-headers', 'full'))
style="background-image: url('{{ $pageHeaderUrl }}');background-size: cover;"
@endif
@endsection
@section ('title')
                @if( $page->exists() )
                <span class="icon is-medium">
                    <i class="{{ $page->title_icon or "fa fa-handshake-o"}}"></i>
                </span>
                @else
                <figure class="is-square">
                    <img src="images\logo-primary.png" alt="" style="width: 25vw;">
                </figure>
                @endif
                <span>{{ $page->title or 'Welkom op Ome-Henk.nl'}}</span>
@endsection
@section ('subtitle')
                {{ $page->subtitle or "Ome Henk's persoonlijke Blog" }}
@endsection

@section ('content')
{{--                         <h3 class="title">
                <span class="icon">
                    <i class="{{ $page->title_icon or "fa fa-wrench" }}"></i>
                </span>
                <span>{{ $page->title or "Wij zijn druk bezig" }}</span>
            </h3>
            <h4 class="subtitle has-text-weight-light"><span>{{ $page->subtitle or "Om ome-henk.nl voor u gereed te maken" }}</span></h4> --}}
            <div class="columns">
                <div class="column">
                    @include('pages.article')
                    <section class="tile is-ancestor is-vertical">
                        @if ($page->has_articles)
                        <hr>
                        @auth
                        <a href="{{ route('posts.create', $page->slug) }}" class="box notification is-primary tile">
                            <div class="tile is-4">
                                <figure class="tile image is-3by2">
                                    <img src="https://via.placeholder.com/128/00c0a1/ffffff">
                                </figure>
                            </div>
                            <div class="tile is-parent">
                                <div class="tile is-child">
                                    <h4 class="title is-size-4">
                                        <span class="icon is-small">
                                            <i class="fa fa-plus"></i>
                                        </span>
                                        <span>Nieuw Artikel Aanmaken</span>
                                    </h4>
                                </div>
                            </div>
                        </a>
                        @endauth

                        @foreach ($page->posts as $post)
                        <a href="{{ route('posts.show', [$page->slug, $post->slug]) }}" title="{{ $post->title }}" class="box notification is-white tile">
                            {{-- Display Featured Article Image if it is there --}}
                            <div class="tile is-4">
                                <figure class="tile image is-3by2">
                                @if ($media = $post->getFirstMedia('featured-images') )
                                    {{ $media('full')}}
                                @else
                                <img src="https://via.placeholder.com/640/00d1b2/ffffff?text=1280px%20*%20960px">
                                @endif
                                </figure>
                            </div>
                            <div class="tile is-parent">
                                @include ('posts.article')
                            </div>
                        </a>
                        @endforeach
                        @endif
                    </section>
                </div>
                @if ( !is_null(Auth::user()) && !is_null( \App\Page::first() ) )
                <div class="column is-one-third">
                    @include ('partials.article-info')
                </div>
                @endif
            </div>
@endsection


