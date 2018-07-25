@extends ('layouts.master')
@section ('window-title', '| Rol Bekijken')
@section ('title')
        <span class="icon is-medium">
            <i class="fa fa-briefcase"></i>
        </span>
        <span>Rol Bekijken</span>
@endsection
@section ('subtitle')
voor op Ome-Henk.nl
@endsection

@section ('content')
            <div class="field">
                <label class="label" for="name">{{ __('Rol') }}</label>
                <p class="control has-icons-left">
                    <input id="name" type="text" class="input is-static" name="name" value="{{ $role->name or old('name') }}" readonly>
                    <span class="icon is-small is-left">
                        <i class="fa fa-briefcase"></i>
                    </span>
                </p>
            </div>

            <div class="field content">
                <label class="label">Permissies</label>
                <ul>
                @foreach($permissions as $value)
                    <li><label>{{ $value->name }}</label></li>
                @endforeach
                </ul>
            </div>

            <div class="field is-grouped is-grouped-right">
                <div class="control">
                    <a class="button is-outlined is-danger" href="{{ route('roles.index') }}">Annuleren</a>
                </div>
            </div>
@endsection
