@extends ('layouts.master')
@section ('window-title', '| Pagina Aanmaken' )
@section ('title')
        <span class="icon is-medium">
            <i class="fa fa-plus"></i>
        </span>
        <span>Pagina aanmaken?</span>
@endsection
@section ('subtitle')
Vul dan het onderstaande formulier in..
@endsection

@section ('content')
<div class="column">
    <article class="section">
        <form method="POST" action="{{ route('pages.store') }}" enctype="multipart/form-data">
            @include ('media.form')
            @include ('pages.form')

            <div class="field is-grouped is-grouped-right">
                <div class="control">
                    <button  type="submit" class="button is-primary">
                        <span class="icon">
                            <i class="fa fa-plus"></i>
                        </span>
                        <span>Pagina Aanmaken</span>
                    </button>
                    <a class="button is-outlined is-warning" href="{{ URL::previous() }}">Annuleren</a>
                </div>
            </div>
        </form>
    </article>
</div>
@endsection
