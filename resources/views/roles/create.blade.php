@extends ('layouts.master')
@section ('window-title', '| Rol Aanmaken' )
@section ('title')
        <span class="icon is-medium">
            <i class="fa fa-briefcase"></i>
        </span>
        <span>Rol Aanmaken</span>
@endsection
@section ('subtitle')
voor op Ome-Henk.nl
@endsection

@section ('content')
        <form method="POST" action="{{ route('roles.store') }}">
            @csrf
            @include('roles.form')
            <div class="field is-grouped is-grouped-right">
                <div class="control">
                    <a class="button is-outlined is-danger" href="{{ route('roles.index') }}">Annuleren</a>
                    <button type="submit" class="button is-primary">
                        <span class="icon">
                            <i class="fa fa-briefcase"></i>
                        </span>
                        <span>Rol Opslaan</span>
                    </button>
                </div>
            </div>
        </form>
@endsection
