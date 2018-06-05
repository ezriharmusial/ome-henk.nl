@extends ('layouts.master')

@section ('title')
{{-- <figure class="is-image is-square">
    <img src="images\logo.svg" alt="" style="width: 25vw;">
</figure> --}}
Post Index pagina
@endsection
@section ('subtitle')
Begin met bouwen...
@endsection

@section ('content')
                    <div class="column">
                        @if (Auth::check())
                        <section class="section">
                            <a href="/posts/create" class="button is-primary is-fullwidth">
                                <span class="icon">
                                    <i class="fas fa-plus"></i>
                                </span>
                                <span>Nieuw Artikel</span>
                            </a>
                        </section>
                        @endif
                        @foreach ($posts as $post)
                            @include ('posts.article')
                        @endforeach
                        @include ('partials.pagination')
                    </div>
@endsection

@section ('footer')
@endsection

