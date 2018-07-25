@extends ('layouts.master')
@section ('window-title', '| Rollen Beheer')
@section ('title')
        <span class="icon is-medium">
            <i class="fa fa-briefcase"></i>
        </span>
        <span>Rollen Beheer</span>
@endsection

@section ('subtitle')
voor op Ome-Henk.nl
@endsection

@section ('content')
<table class="table is-bordered is-striped is-fullwidth ">
    <thead>
        <tr>
            <th>ID</th>
            <th>Naam</th>
            <th width="280px">Actie</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($roles as $key => $role)
        <tr>
            <td>{{ $role->id }}</td>
            <td>{{ $role->name }}</td>
            <td>
                <div class="field is-grouped is-grouped-right">
                    {{-- <p class="control">
                        <a class="button is-info" href="{{ route('roles.show',$role->id) }}">
                            <span class="icon">
                                <i class="fa fa-briefcase"></i>
                            </span>
                            <span>Bekijken</span>
                        </a>
                    </p> --}}
                    <p class="control">
                        <a class="button is-primary" href="{{ route('roles.edit', $role->id) }}">
                            <span class="icon">
                                <i class="fa fa-edit"></i>
                            </span>
                            <span>Bewerken</span>
                        </a>
                    </p>
                    <form method="post" action="{{ route('roles.destroy', $role->id) }}" onsubmit="return confirm('Weet u het zeker dat u de rol {{ $role->name }} wilt verwijderen?');">
                        @csrf
                        {{ method_field('DELETE') }}
                        <p class="control">
                            <button class="button is-outlined is-danger" type="submit">
                                <span class="icon">
                                    <i class="fa fa-trash"></i>
                                </span>
                                <span>Verwijderen</span>
                            </button>
                        </p>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{!! $roles->render() !!}

<div class="field is-grouped is-grouped-right">
    <div class="control">
        <a class="button is-primary" href="{{ route('roles.create') }}">
            <span class="icon">
                <i class="fa fa-plus"></i>
            </span>
            <span>Rol Toevoegen</span>
        </a>
    </div>
</div>
@endsection
