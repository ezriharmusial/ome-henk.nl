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
            <h3 class="title">
                <span class="icon is-medium">
                    <i class="fa fa-plus"></i>
                </span>
                <span>Nieuwe Pagina</span>
            </h3>
            <h4 class="subtitle">voor op Ome-Henk.nl</h4>
            @include ('pages.form')

            <div class="field is-grouped is-grouped-right">
                <div class="control">
                    <button  type="submit" class="button is-primary">
                        <span class="icon">
                            <i class="fa fa-plus"></i>
                        </span>
                        <span>Pagina Aanmaken</span>
                    </button>
                    <a class="button is-outlined is-danger" href="{{ URL::previous() }}">Annuleren</a>
                </div>
            </div>
        </div>
        <div class="column is-one-forth is-narrow">
            <label class="label">Header Achtergrond</label>
            <div class="box">
                @include ('media.form')
            </div>
        </div>
    </div>
</form>
@endsection
