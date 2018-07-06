@extends('layouts.master')

@section ('title')
        <span class="icon is-medium">
            <i class="fa fa-sign-in"></i>
        </span>
        <span>Bezoeker Aanmelden</span>
@endsection
@section ('subtitle')
Dat Chat een stuk makkelijker
@endsection

@section('content')
            <div class="column">
                <h2 class="title">
                    <span class="icon is-medium">
                        <i class="fa fa-sign-in"></i>
                    </span>
                    <span>Bezoeker Aanmelden</span>
                </h2>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="field">
                        <label for="email">{{ __('E-Mail Adres') }}</label>
                        <p class="control has-icons-left has-icons-right">
                            <input id="email" type="email" class="input {{ $errors->has('email') ? ' is-error' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
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
                            {{ $errors->first('email') }}
                        </p>
                        @endif
                    </div>

                    <div class="field">
                        <label for="password">{{ __('Wachtwoord') }}</label>
                        <p class="control has-icons-left">
                            <input id="password" type="password" class="input{{ $errors->has('password') ? ' is-danger' : '' }}" name="password" required>
                            <span class="icon is-small is-left">
                                <i class="fa fa-lock"></i>
                            </span>
                        </p>
                        @if ($errors->has('password'))
                        <p class="help is-danger">
                            {{ $errors->first('password') }}
                        </p>
                        @endif
                    </div>

                    <div class="field">
                        <p class="control">
                            <label class="checkbox">
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Onthoud mij in deze Browser') }}
                            </label>
                        </p>
                    </div>

                    <div class="field is-grouped">
                        <div class="control">
                            <button  type="submit" class="button is-primary">
                                <span class="icon is-medium">
                                    <i class="fa fa-sign-in"></i>
                                </span>
                                <span>{{ __('Aanmelden') }}</span>
                            </button>
                        </div>
                        <div class="control">
                            <a class="button is-outlined is-text" href="{{ route('password.request') }}">
                                {{ __('Wachtwoord vergeten?') }}
                            </a>
                        </div>
                    </div>
                </form>
            </div>
@endsection
