@extends ('layouts.master')
@section ('window-title', '| Gebruiker Bewerken')
@section ('title')
        <span class="icon is-medium">
            <i class="fa fa-user-plus"></i>
        </span>
        <span>Gebruiker Bewerken</span>
@endsection
@section ('subtitle')
voor op Ome-Henk.nl
@endsection

@section ('content')
        <form method="POST" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
            {{ method_field('PATCH') }}
            @csrf
            <div class="media">
                <div class="media-left">
                    <label for="file">
                        <figure class="image is-128x128">
                            <img src="{{ ($avatarUrl = Auth::user()->getFirstMediaUrl('avatar', 'thumb')) ? $avatarUrl : "https://via.placeholder.com/128/00d1b2/ffffff"}}">
                        </figure>
                    </label>
                </div>
                <div class="media-content">
                    <div class="field">
                        <label class="label" for="name">{{ __('Naam') }}</label>
                        <p class="control has-icons-left">
                            <input id="name" type="text" class="input is-static" name="name" value="{{ $user->name or old('name') }}" readonly>
                            <span class="icon is-small is-left">
                                <i class="fa fa-user"></i>
                            </span>
                        </p>
                    </div>

                    <div class="field">
                        <label class="label">Gebruikers Rol</label>
                        <div class="control has-icons-left">
                            <div class="select">
                                @if(!empty($roles))
                                <select name="roles[]">
                                    @foreach ($roles as $name)
                                       <option value="{{ $name }}"{{ !is_null($userRoles) && in_array( $name, $userRoles) ? ' selected="selected"' : '' }}>{{ $name }}</option>
                                    @endforeach
                                </select>
                                @else
                                Nog geen rollen gedefinieerd
                                @endif
                            </div>
                            <span class="icon is-left">
                                <i class="fa fa-briefcase"></i>
                            </span>
                        </div>
                    </div>

                    <div class="field is-grouped is-grouped-right">
                        <div class="control">
                            <a class="button is-outlined is-danger" href="{{ route('users.index') }}">Annuleren</a>
                            <button type="submit" class="button is-primary">
                                <span class="icon">
                                    <i class="fa fa-edit"></i>
                                </span>
                                <span>Wijzigingen Opslaan</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
@endsection
