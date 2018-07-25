@extends ('layouts.master')
@section ('window-title', '| Gebruiker Bekijken')
@section ('title')
        <span class="icon is-medium">
            <i class="fa fa-user-circle"></i>
        </span>
        <span>Gebruiker Bekijken</span>
@endsection
@section ('subtitle')
voor op Ome-Henk.nl
@endsection

@section ('content')
                <div class="media">
                    <div class="media-left">
                        <label for="file">
                            <figure class="image is-128x128">
                                <img src="{{ ($avatarUrl = Auth::user()->getFirstMediaUrl('avatar', 'thumb')) ? $avatarUrl : "https://via.placeholder.com/128/00d1b2/ffffff"}}">
                            </figure>
                        </label>
                    </div>
                    <div class="media-content content">
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
                            <label class="label">Rollen</label>
                            <p class="control has-icons-left">
                                @if(!empty($user->getRoleNames()))
                                    @foreach($user->getRoleNames() as $v)
                                        <label class="badge is-success">{{ $v }}</label>
                                    @endforeach
                                @endif
                            </p>
                        </div>

                        <div class="field is-grouped is-grouped-right">
                            <div class="control">
                                <a class="button is-outlined is-danger" href="{{ route('users.index') }}">Terug</a>
                            </div>
                        </div>
                    </div>
                </div>
@endsection
