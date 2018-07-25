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

                    <div class="field">
                        <label for="password-confirm">{{ __('Bevestig Wachtwoord') }}</label>
                        <p class="control has-icons-left">
                            <input id="password-confirm" type="password" class="input" name="password_confirmation" required>
                            <span class="icon is-small is-left">
                                <i class="fa fa-lock"></i>
                            </span>
                        </p>
                    </div>
