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

                    <div class="field">
                        <label for="password">{{ __('Wachtwoord') }}</label>
                        <p class="control has-icons-left has-icons-right">
                            <input id="password" type="password" class="input{{ $errors->has('password') ? ' is-danger' : '' }}" name="password" required>
                            <span class="icon is-small is-left">
                                <i class="fa fa-lock"></i>
                            </span>
                            @if ($errors->has('password'))
                            <span class="icon is-small is-right">
                                <i class="fa fa-cross"></i>
                            </span>
                            @endif
                        </p>
                        @if ($errors->has('password'))
                        <p class="help is-danger">
                            <strong>{{ $errors->first('password') }}</strong>
                        </p>
                        @endif
                    </div>
