@extends ('layouts.master')
@section ('window-title')
| {{ $page->title or 'Welkom op Ome-Henk.nl' }}
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
            <div class="columns">
                <div class="column">
                    <article>
                        <h3 class="title">
                            <span class="icon">
                                <i class="{{ $page->title_icon or "fa fa-wrench" }}"></i>
                            </span>
                            <span>{{ $page->title or "Wij zijn druk bezig" }}</span>
                        </h3>
                        <h4 class="subtitle has-text-weight-light"><span>{{ $page->subtitle or "Om ome-henk.nl voor u gereed te maken" }}</span></h4>
                        <div class="content">
                            @if ( $page->exists() )
                            {!! $page->content !!}
                            @else
                                <p>Achter de schermen gebeurt er van alles. Komt u binnenkort weer terug een kijkje nemen?</p>
                            @endif
                        </div>
                    </article>
                    <section>
                        @if ($page->has_articles)
                        @auth
                        <a href="{{ route('posts.create', $page->slug) }}" class="button is-outlined is-primary is-fullwidth">
                            <span class="icon is-small">
                                <i class="fa fa-plus"></i>
                            </span>
                            <span>Nieuw Artikel Aanmaken</span>
                        </a>
                        @endauth
                    </section>
                    <section class="section">
                        @foreach ($page->posts as $post)
                        <a href="{{ route('posts.show', [$page->slug, $post->slug]) }}" title="{{ $post->title }}" class="columns">
                            {{-- Display Featured Article Image if it is there --}}
                            @if ( isset($post->featured_image) )
                            <div class="column is-4">
                                <figure class="image is-16by9">
                                    <img src="/images/{{ $post->featured_image }}')" title="{{ $post->title }}">
                                </figure>
                            </div>
                            @endif
                        @include ('posts.article')
                        </a>
                        @endforeach
                        @endif
                    </section>
                </div>
                <div class="column  is-one-forth is-narrow">
                    @include ('partials.article-info')
                </div>
            </div>
@endsection


