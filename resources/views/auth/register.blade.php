@php
// dd(\App\User::first());
if ( is_null(\App\User::first()))
    $beheerder = 'Beheerder';
else
    $beheerder = null;
@endphp
@extends('layouts.master')

@section ('title')
        <span class="icon is-medium">
            <i class="fa fa-user-plus"></i>
        </span>
        <span>{{ $beheerder or "Bezoeker" }} Registreren</span>
@endsection
@section ('subtitle')
Dan weet Ome-Henk.nl, wie jij bent
@endsection

@section('content')
            <div class="column content">
                <h2 class="title">
                    <span class="icon is-medium">
                        <i class="fa fa-user-plus"></i>
                    </span>
                    <span>{{ $beheerder or "Bezoeker" }} Registreren</span>
                </h2>
                @if ( !is_null($beheerder) )
                <p>Om de site te kunnen gebruiken moet er eerst een beheerder worden aangesteld. De beheerder kan:
                    <ul>
                        <li>Pagina's beheren,</li>
                        <li>Artikelen beheren,</li>
                        <li>Foto's beheren,</li>
                        <li>en Commentaar modereren.</li>
                    </ul>
                @endif
                <p>Vult u hier eerst uw persoonlijke gegevens in. Zodat de website weet wie u bent.</p>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="field">
                        <label for="name">{{ __('Naam') }}</label>
                        <p class="control has-icons-left has-icons-right">
                            <input id="name" type="text" class="input{{ $errors->has('name') ? ' is-danger' : '' }}" name="name" value="{{ $user->name or old('name') }}" required autofocus>
                            <span class="icon is-small is-left">
                                <i class="fa fa-user"></i>
                            </span>
                            @if ($errors->has('name'))
                            <span class="icon is-small is-right">
                                <i class="fa fa-cross"></i>
                            </span>
                            @endif
                        </p>
                        @if ($errors->has('name'))
                        <p class="help is-danger">
                            <strong>{{ $errors->first('name') }}</strong>
                        </p>
                        @endif
                    </div>

                    @include('auth.form')

{{--                     <div class="field">
                        <label for="name">{{ __('Naam') }}</label>
                        <p class="control has-icons-left has-icons-right">
                            <input id="name" type="text" class="input{{ $errors->has('name') ? ' is-danger' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                            <span class="icon is-small is-left">
                                <i class="fa fa-user"></i>
                            </span>
                            @if ($errors->has('name'))
                            <span class="icon is-small is-right">
                                <i class="fa fa-cross"></i>
                            </span>
                            @endif
                        </p>
                        @if ($errors->has('name'))
                        <p class="help is-danger">
                            <strong>{{ $errors->first('name') }}</strong>
                        </p>
                        @endif
                    </div>

                    <div class="field">
                        <label for="email">{{ __('E-Mail Adres') }}</label>
                        <p class="control has-icons-left has-icons-right">
                            <input id="email" type="email" class="input{{ $errors->has('email') ? ' is-danger' : '' }}" name="email" value="{{ old('email') }}" required>
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
 --}}

                    <div class="field">
                        <label for="password-confirm">{{ __('Bevestig Wachtwoord') }}</label>
                        <p class="control has-icons-left">
                            <input id="password-confirm" type="password" class="input" name="password_confirmation" required>
                            <span class="icon is-small is-left">
                                <i class="fa fa-lock"></i>
                            </span>
                        </p>
                    </div>

                    <div class="field is-grouped">
                        <div class="control">
                            <button type="submit" class="button is-primary">
                                <span class="icon">
                                    <i class="fa fa-user-plus"></i>
                                </span>
                                <span>{{ __('Registreren') }}</span>
                            </button>
                        </div>
                        <div class="control">
                            <a class="button is-outlined is-text" href="{{ route('privacy-statement') }}" title="Weten hoe wij met uw gegevens omgaan?">
                                {{ __('Lees ons Privacybeleid') }}
                            </a>
                        </div>
                    </div>
                </form>
            </div>
@endsection
