                    <div class="field">
                        <label class="label" for="name">{{ __('Rol') }}</label>
                        <p class="control has-icons-left has-icons-right">
                            <input id="name" type="text" class="input{{ $errors->has('name') ? ' is-danger' : '' }}" name="name" value="{{ $role->name or old('name') }}" required autofocus>
                            <span class="icon is-small is-left">
                                <i class="fa fa-briefcase"></i>
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
                        <label class="label">Permissies</label>
                        @foreach($permissions as $permission)
                        <div class="field">
                            <input type="checkbox" name="permission[]" class="checkbox" value="{{ $permission->id }}" @if( !is_null($rolePermissions) && in_array($permission->id, $rolePermissions) ) checked="checked" @endif>
                            <label>{{ $permission->name }}</label>
                        </div>
                        @endforeach
                    </div>
