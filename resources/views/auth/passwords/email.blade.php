@extends ('layouts.master')
@section ('window-title', '| Wachtwoord Reset Aanvragen')
@section ('title')
        <span class="icon is-medium">
            <i class="fa fa fa-envelope-open"></i>
        </span>
        <span>Wachtwoord Reset Aanvragen</span>
@endsection
@section ('subtitle')
Zodat u weer in kunt loggen
@endsection

@section('content')
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="columns">
                        <div class="column">
                            <div class="field">
                                <label for="email">{{ __('E-Mail Adres') }}</label>
                                <p class="control has-icons-left has-icons-right">
                                    <input id="email" type="email" class="input{{ $errors->has('email') ? ' is-danger' : '' }}" name="email" value="{{ $user->email or old('email') }}" required>
                                    <span class="icon is-small is-left">
                                        <i class="fa fa-envelope"></i>
                                    </span>
                                    @if ($errors->has('email'))
                                    <span class="icon is-small is-right">
                                        <i class="fa fa-cross"></i>
                                    </span>
                                    @endif
                                </p>
                                @if ($errors->has('email'))
                                <p class="help is-danger">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </p>
                                @endif
                            </div>

                            <div class="field is-grouped is-grouped-right">
                                <div class="control">
                                    <a class="button is-outlined is-danger" href="{{ route('pages.index') }}">Annuleren</a>
                                    <button type="submit" class="button <is-info></is-info>">
                                        <span class="icon">
                                            <i class="fa fa-envelope-open"></i>
                                        </span>
                                        <span>{{ __('Reset Link Sturen') }}</span>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="column">
                            <div class="box notification is-info content">
                                <p class="subtitle">U bent uw wachtwoord vergeten of verloren?</p>
                                <p>Geen paniek... Vul uw emailadres in waarmee op deze site geregistreerd bent, dan sturen wij u een Reset Link waarmee u een nieuw wachtwoord kunt instellen.</p>
                            </div>
                        </div>
                    </div>
                </form>
@endsection
