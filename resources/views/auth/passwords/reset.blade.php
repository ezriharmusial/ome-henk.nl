@extends ('layouts.master')
@section ('window-title', '| Wachtwoord Resetten')
@section ('title')
        <span class="icon is-medium">
            <i class="fa fa-unlock-alt"></i>
        </span>
        <span>Wachtwoord Resetten</span>
@endsection
@section ('subtitle')
Zodat u weer in kunt loggen
@endsection

@section('content')
                <form method="POST" action="{{ route('password.request') }}">
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="columns">
                        <div class="column">
                            @include('auth.form')
                            <div class="field">
                                <label for="password-confirm">{{ __('Bevestig Wachtwoord') }}</label>
                                <p class="control has-icons-left">
                                    <input id="password-confirm" type="password" class="input" name="password_confirmation" required>
                                    <span class="icon is-small is-left">
                                        <i class="fa fa-lock"></i>
                                    </span>
                                </p>
                            </div>

                            <div class="field is-grouped is-grouped-right">
                                <div class="control">
                                    <a class="button is-outlined is-danger" href="{{ route('pages.index') }}">Annuleren</a>
                                    <button type="submit" class="button is-info">
                                        <span class="icon">
                                            <i class="fa fa-unlock-alt"></i>
                                        </span>
                                        <span>{{ __('Wachtwoord Resetten') }}</span>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="column">
                            <div class="box notification is-info content">
                                <p class="subtitle">Uw Wachtwoord Resetten</p>
                                <p>Vul uw emailadres in waarop u de resetlink heeft ontvangen en vul een nieuw Wachtwoord in.</p>
                            </div>
                        </div>
                    </div>
                </form>
@endsection
