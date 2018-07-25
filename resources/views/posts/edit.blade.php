@extends ('layouts.master')

@section ('head-tail')
  <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
@endsection

@section ('page-header-style')
is-medium
@endsection
@section ('page-header-bg')
@if ($featuredImageUrl = $post->getFirstMediaUrl('featured-images', 'full'))
style="background-image: url('{{ $featuredImageUrl }}');background-size: cover;"
@endif
@endsection

@section ('title')
        <span class="icon">
            <i class="fa fa-edit"></i>
        </span>
        <span>Artikel Bewerken</span>
@endsection

@section ('subtitle')
<span>voor op de "{{ $page->title }}" pagina</span>
@endsection

@section ('content')
{{-- <h3 class="title">
    <span class="icon">
        <i class="fa fa-edit"></i>
    </span>
    <span>Artikel Bewerken</span>
</h3>
<h4 class="subtitle">
    <span>voor op de "{{ $page->title }}" pagina</span>
</h4> --}}
<form method="POST" action="{{ route('posts.update', [$page->slug, $post->slug]) }}" enctype="multipart/form-data">
    {{ method_field('PATCH') }}
    <div class="columns">
        <div class="column">
            @include ('posts.form')
        </div>
        <div class="column is-one-third is-narrow">
            <label class="label">Artikel plaatjes</label>
            <div class="field">
                <label for="file">
                    <figure class="image is-3by2">
                    @if ($media = $post->getFirstMedia('featured-images') )
                        {{ $media('full')}}
                    @else
                        <img src="https://via.placeholder.com/640/00d1b2/ffffff?text=1280px%20*%20960px">
                    @endif
                    </figure>
                </label>
                <div class="file has-name is-right is-fullwidth">
                    <label class="file-label">
                        <input class="file-input" type="file" name="featured-image" id="file">
                        <span class="file-cta">
                            <span class="file-icon">
                                <i class="fa fa-image"></i>
                            </span>
                            <span class="file-label">
                                Bestanden
                            </span>
                        </span>
                        <span class="file-name" id="filename">
                            {{ ( $pageHeader = $post->getFirstMedia('featured-images') ) ? $pageHeader->file_name : "Kies een Foto voor het Artikel Plaatje..." }}
                        </span>
                    </label>
                </div>
            </div>
        </div>
    </div>
    <div class="field is-grouped is-grouped-right">
        <div class="control">
            <a class="button is-outlined is-danger" href="{{ URL::previous() }}">Annuleren</a>
            <button type="submit" class="button is-primary">
                <span class="icon">
                    <i class="fa fa-edit"></i>
                </span>
                <span>Wijzigingen Opslaan</span>
            </button>
        </div>
    </div>

</form>
@endsection
