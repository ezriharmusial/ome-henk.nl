@extends ('layouts.master')
@section ('window-title')
{{ '| '. $page->title or 'Welkom op Ome-Henk.nl' }}
@endsection
@section ('title')
{{--                 <figure class="is-image is-square">
                    <img src="images\logo.svg" alt="" style="width: 25vw;">
                </figure> --}}
                <span class="icon is-medium">
                    <i class="{{ $page->title_icon or "fa fa-handshake-o"}}"></i>
                </span>
                <span>{{ $page->title or 'Welkom op Ome-Henk.nl'}}</span>
@endsection
@section ('subtitle')
                {{ $page->subtitle  or 'Uw eigen persoonlijke blog'}}
@endsection

@section ('content')
                <div class="column">
                    <article>
                        <h2 class="title">
                            <span class="icon">
                                <i class="{{ $page->title_icon or "fa fa-info" }}"></i>
                            </span>
                            <span>{{ $page->title or "Hoe te beginnen?" }}</span>
                        </h2>
                        <h3 class="subtitle has-text-weight-light"><span>{{ $page->subtitle or "Direct aan de slag"}}</span></h3>
                        <div class="content">
                            {!! $page->content or "Stap 1: Druk op de Knop <a href=\"register\" class=\"button is-primary is-inverted\">
                                    <span class=\"icon is-medium\">
                                        <i class=\"fa fa-user-plus\"></i>
                                    </span>
                                    <span>Inschrijven</span>
                                </a> rechts bovenin het scherm. "!!}
                        </div>
                    </articls>
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
                        <a href="/{{ $page->slug }}/{{ $post->slug }}" title="{{ $post->title }}"class="columns">
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
@endsection

@section ('sidebar-content')
    @include ('auth.partials.article-info')
@endsection


