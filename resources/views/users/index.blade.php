@extends ('layouts.master')
@section ('window-title', '| Gebruikers Beheer')
@section ('title')
        <span class="icon is-medium">
            <i class="fa fa-users"></i>
        </span>
        <span>Gebruikers Beheer</span>
@endsection

@section ('subtitle')
voor op Ome-Henk.nl
@endsection

@section ('content')
<table class="table is-bordered is-striped is-fullwidth ">
    <thead>
        <tr>
            <th>#</th>
            <th>Naam</th>
            <th>Email</th>
            <th>Rol</th>
            <th width="280px">Actie</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($data as $key => $user)
        <tr>
            <td>
                <figure class="image is-24x24">
                    <img src="{{ ($avatarUrl =$user->getFirstMediaUrl('avatar', 'mini')) ? $avatarUrl : "https://via.placeholder.com/28/00d1b2/ffffff"}}">
                </figure>
            </td>
            <td>
                {{ $user->name }}
            </td>
            <td>{{ $user->email }}</td>
            <td>
                @if(!empty($user->getRoleNames()))
                @foreach($user->getRoleNames() as $v)
                <label class="badge badge-success">{{ $v }}</label>
                @endforeach
                @endif
            </td>
            <td>
                <div class="field is-grouped">
                    @can('userrole-crud')
                    {{-- <p class="control">
                        <a class="button is-info" href="{{ route('users.show',$user->id) }}">
                            <span class="icon">
                                <i class="fa fa-user-circle"></i>
                            </span>
                            <span>Bekijken</span>
                        </a>
                    </p> --}}
                    <p class="control">
                        <a class="button is-primary" href="{{ route('users.edit',$user->id) }}">
                            <span class="icon">
                                <i class="fa fa-edit"></i>
                            </span>
                            <span>Bewerken</span>
                        </a>
                    </p>
                    <form method="post" action="{{ route('users.destroy', $user->id) }}" onsubmit="return confirm('Weet u het zeker dat u {{ $user->name }} wilt verwijderen?');">
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
                    @endcan
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{!! $data->render() !!}

@can('userrole-crud')
<div class="field is-grouped is-grouped-right">
    <div class="control">
        <a class="button is-primary" href="{{ route('users.create') }}">
            <span class="icon">
                <i class="fa fa-plus"></i>
            </span>
            <span>Gebruiken toevoegen</span>
        </a>
    </div>
</div>
@endcan
@endsection
