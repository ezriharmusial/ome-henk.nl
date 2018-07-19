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
                <figure class="image is-2by1">
                @if ($media = $page->getFirstMedia('page-headers') )
                    {{ $media('full')}}
                @else
                <img src="https://via.placeholder.com/640/320/00d1b2/ffffff?text=1280px%20*%20640px">
                @endif
                </figure>
                <div class="file has-name is-right is-fullwidth">
                    <label class="file-label">
                        <input class="file-input" type="file" name="page-header" id="file">
                        <span class="file-cta">
                            <span class="file-icon">
                                <i class="fa fa-image"></i>
                            </span>
                            <span class="file-label">
                                Uploaden
                            </span>
                        </span>
                        <span class="file-name"  id="filename">
                            {{ ( $pageHeader = $page->getFirstMedia('page-headers') ) ? $pageHeader->file_name : "Een bestand kiezen..." }}
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
                    <i class="fa fa-edit"></i>
                </span>
                <span>Pagina Opslaan</span>
            </button>
            <a class="button is-outlined is-danger" href="{{ URL::previous() }}">Annuleren</a>
        </div>
    </div>
</form>
@endsection
