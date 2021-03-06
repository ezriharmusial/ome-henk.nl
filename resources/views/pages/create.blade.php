@extends ('layouts.master')
@section ('window-title', '| Pagina Aanmaken' )
@section ('title')
        <span class="icon is-medium">
            <i class="fa fa-plus"></i>
        </span>
        <span>Nieuwe Pagina</span>
@endsection
@section ('subtitle')
voor op Ome-Henk.nl
@endsection

@section ('content')

<form method="POST" action="{{ route('pages.store') }}" enctype="multipart/form-data">
    <div class="columns">
        <div class="column">
            @include ('pages.form')
        </div>
        <div class="column is-one-third is-narrow">
            <label class="label">Header Achtergrond</label>
            <div class="field">
                <label for="file">
                    <figure class="image">
                        <img :src="image" ref="imagePreview" src="{{ $page->getFirstMediaUrl('page-headers', 'full') }}">
                    </figure>
                </label>
                <div class="file has-name is-right is-fullwidth">
                    <label class="file-label">
                        <input type="file" v-on:change="onFileChange" class="file-input" name="page-header" id="file">
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
            <a class="button is-outlined is-danger" href="{{ route('pages.index') }}">Annuleren</a>
            <button type="submit" class="button is-primary">
                <span class="icon">
                    <i class="fa fa-plus"></i>
                </span>
                <span>Pagina Opslaan</span>
            </button>
        </div>
    </div>
</form>
@endsection
