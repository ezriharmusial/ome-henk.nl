@extends ('layouts.master')
@section ('window-title', '| pagina bewerken')
@section ('title')
        <span class="icon is-medium">
            <i class="fa fa-plus"></i>
        </span>
        <span>{{ $page->title }}</span>
@endsection
@section ('subtitle')
Pagina bewerken
@endsection

@section ('content')
<div class="column">
    <article class="section">
        <form method="POST" action="{{ route('pages.update', $page->slug) }}">
            @csrf
            <input name="_method" type="hidden" value="PATCH">
            @include ('pages.form-inputs')

            <div class="field is-grouped is-grouped-right">
                <div class="control">
                    <button type="submit" class="button is-success">
                        <span class="icon">
                            <i class="fa fa-save"></i>
                        </span>
                        <span>Pagina Opslaan</span>
                    </button>
                    <a class="button is-info" href="{{ URL::previous() }}">Annuleren</a>
                </div>
            </div>
        </form>
    </article>
</div>
@endsection
