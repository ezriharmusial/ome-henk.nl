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
