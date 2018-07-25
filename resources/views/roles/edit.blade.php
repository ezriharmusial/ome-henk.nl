@extends ('layouts.master')
@section ('window-title', '| Rol Bewerken')
@section ('title')
        <span class="icon is-medium">
            <i class="fa fa-briefcase"></i>
        </span>
        <span>Rol Bewerken</span>
@endsection
@section ('subtitle')
voor op Ome-Henk.nl
@endsection

@section ('content')
        <form method="POST" action="{{ route('roles.update', $role->id) }}">
            {{ method_field('PATCH') }}
            @csrf
            @include('roles.form')
            <div class="field is-grouped is-grouped-right">
                <div class="control">
                    <a class="button is-outlined is-link" href="{{ route('roles.index') }}">Annuleren</a>
                    <button type="submit" class="button is-primary">
                        <span class="icon">
                            <i class="fa fa-edit"></i>
                        </span>
                        <span>Rol Wijzigen</span>
                    </button>
                </div>
            </div>
        </form>
@endsection
