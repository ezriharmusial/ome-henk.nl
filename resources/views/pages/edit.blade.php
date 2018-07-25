@extends ('layouts.master')
@section ('window-title', '| pagina bewerken')
@section ('title')
        <span class="icon is-medium">
            <i class="fa fa-edit"></i>
        </span>
        <span>Pagina bewerken</span>
@endsection
@section ('page-header-style')
@if ($pageHeader = $page->getFirstMediaUrl('page-headers', 'full'))
style="background-image: url('{{ $pageHeader }}');background-size: cover;"
@endif
@endsection

@section ('subtitle')
voor op Ome-Henk.nl
@endsection

@section ('content')
{{-- <h3 class="title">
    <span class="icon is-medium">
        <i class="fa fa-edit"></i>
    </span>
    <span>Pagina bewerken</span>
</h3>
<h4 class="subtitle">
    <span>voor op Ome-Henk.nl</span>
</h4> --}}
<form method="POST" action="{{ route('pages.update', $page->slug) }}" enctype="multipart/form-data">
    {{ method_field('PATCH') }}
    <div class="columns">
        <div class="column">
            @include ('pages.form')
        </div>
        <div class="column is-one-third is-narrow">
            <label class="label">Header Achtergrond</label>
            <div class="field">
                <label for="file">
                    <figure class="image is-2by1">
                    @if ($media = $page->getFirstMedia('page-headers') )
                        {{ $media('full')}}
                    @else
                        <img src="https://via.placeholder.com/640/320/00d1b2/ffffff?text=1280px%20*%20640px">
                    @endif
                    </figure>
                </label>
                <div class="file has-name is-right is-fullwidth">
                    <label class="file-label">
                        <input class="file-input" type="file" name="page-header" id="file">
                        <span class="file-cta">
                            <span class="file-icon">
                                <i class="fa fa-image"></i>
                            </span>
                            <span class="file-label">
                                Bestanden
                            </span>
                        </span>
                        <span class="file-name"  id="filename">
                            {{ ( $pageHeader = $page->getFirstMedia('page-headers') ) ? $pageHeader->file_name : "Kies een Foto voor de Header Achtergrond..." }}
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
