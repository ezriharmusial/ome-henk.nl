@extends ('layouts.master')

@section ('head-tail')
  <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
@endsection

@section ('page-header-bg')
@if ($pageHeaderUrl = $page->getFirstMediaUrl('page-headers', 'full'))
style="background-image: url('{{ $pageHeaderUrl }}');background-size: cover;"
@endif
@endsection

@section ('title')
        <span class="icon">
            <i class="fa fa-plus"></i>
        </span>
        <span>Nieuw Artikel</span>
@endsection

@section ('subtitle')
voor op de "{{ $page->title}}" pagina
@endsection

@section ('content')
{{-- <h3 class="title">
    <span class="icon">
        <i class="fa fa-plus"></i>
    </span>
    <span>Nieuw Artikel</span>
</h3>
<h4 class="subtitle">
    <span>voor op de "{{ $page->title}}" pagina</span>
</h4> --}}
<form method="POST" action="{{ route('posts.store', $page) }}" enctype="multipart/form-data">
    <div class="columns">
        <div class="column">
            @include ('posts.form')
        </div>
        <div class="column is-one-third is-narrow">
            <label class="label">Artikel plaatjes</label>
            <div class="field">
                <figure class="image is-3by2">
                @if ($media = $post->getFirstMedia('featured-images') )
                    {{ $media('full')}}
                @else
                <img src="https://via.placeholder.com/640/00d1b2/ffffff?text=1280px%20*%20960px">
                @endif
                </figure>
                <div class="file has-name is-right is-fullwidth">
                    <label class="file-label">
                        <input class="file-input" type="file" name="featured-image" id="file">
                        <span class="file-cta">
                            <span class="file-icon">
                                <i class="fa fa-image"></i>
                            </span>
                            <span class="file-label">
                                Uploaden
                            </span>
                        </span>
                        <span class="file-name" id="filename">
                            {{ ( $pageHeader = $post->getFirstMedia('featured-images') ) ? $pageHeader->file_name : "Een bestand kiezen..." }}
                        </span>
                    </label>
                </div>
            </div>
        </div>
    </div>
    <div class="field is-grouped">
        <div class="control">
            <button  type="submit" class="button is-primary">
                <span class="icon">
                    <i class="fa fa-plus"></i>
                </span>
                <span>Artikel Aanmaken</span>
            </button>
            <a class="button is-outlined is-danger" href="{{ URL::previous() }}">Annuleren</a>
        </div>
    </div>
</form>
@endsection
