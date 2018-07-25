@extends ('layouts.master')
@section ('window-title', '| Gebruiker Aanmaken' )
@section ('title')
        <span class="icon is-medium">
            <i class="fa fa-user-plus"></i>
        </span>
        <span>Gebruiker Aanmaken</span>
@endsection
@section ('subtitle')
voor op Ome-Henk.nl
@endsection

@section ('content')
        <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
            @csrf

            @include('users.form')

            <div class="field is-grouped is-grouped-right">
                <div class="control">
                    <a class="button is-outlined is-danger" href="{{ route('users.index') }}">Annuleren</a>
                    <button type="submit" class="button is-primary">
                        <span class="icon">
                            <i class="fa fa-user-plus"></i>
                        </span>
                        <span>Gebruiker Opslaan</span>
                    </button>
                </div>
            </div>
        </form>
@endsection
