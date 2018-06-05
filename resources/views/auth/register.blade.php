@extends('layouts.master')

@section ('title')
Bezoeker Inschrijven
@endsection
@section ('subtitle')
Dan Weet de Ome-Henk website, wie jij bent
@endsection

@section('content')
            <div class="column">
                <h2 class="title">Bezoeker Inschrijven</h2>
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="field">
                        <label for="name">{{ __('Name') }}</label>
                        <p class="control has-icons-left has-icons-right">
                            <input id="name" type="text" class="input{{ $errors->has('name') ? ' is-danger' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                            <span class="icon is-small is-left">
                                <i class="fas fa-user"></i>
                            </span>
                            @if ($errors->has('name'))
                            <span class="icon is-small is-right">
                                <i class="fas fa-cross"></i>
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
                        <label for="email">{{ __('E-Mail Address') }}</label>
                        <p class="control has-icons-left has-icons-right">
                            <input id="email" type="email" class="input{{ $errors->has('email') ? ' is-danger' : '' }}" name="email" value="{{ old('email') }}" required>
                            <span class="icon is-small is-left">
                                <i class="fas fa-envelope"></i>
                            </span>
                            @if ($errors->has('email'))
                            <span class="icon is-small is-right">
                                <i class="fas fa-cross"></i>
                            </span>
                            @endif
                        </p>
                        @if ($errors->has('email'))
                        <p class="help is-danger">
                            <strong>{{ $errors->first('email') }}</strong>
                        </p>
                        @endif
                    </div>

                    <div class="field">
                        <label for="password">{{ __('Password') }}</label>
                        <p class="control has-icons-left has-icons-right">
                            <input id="password" type="password" class="input{{ $errors->has('password') ? ' is-danger' : '' }}" name="password" required>
                            <span class="icon is-small is-left">
                                <i class="fas fa-lock"></i>
                            </span>
                            @if ($errors->has('password'))
                            <span class="icon is-small is-right">
                                <i class="fas fa-cross"></i>
                            </span>
                            @endif
                        </p>
                        @if ($errors->has('password'))
                        <p class="help is-danger">
                            <strong>{{ $errors->first('password') }}</strong>
                        </p>
                        @endif
                    </div>

                    <div class="field">
                        <label for="password-confirm">{{ __('Confirm Password') }}</label>
                        <p class="control has-icons-left">
                            <input id="password-confirm" type="password" class="input" name="password_confirmation" required>
                            <span class="icon is-small is-left">
                                <i class="fas fa-lock"></i>
                            </span>
                        </p>
                    </div>

                    <div class="field">
                        <p class="control">
                            <button type="submit" class="button is-primary">
                                <span class="icon">
                                    <i class="fas fa-user-plus"></i>
                                </span>
                                <span>{{ __('Inschrijven') }}</span>
                            </button>
                        </p>
                    </div>
                </form>
            </div>
@endsection
