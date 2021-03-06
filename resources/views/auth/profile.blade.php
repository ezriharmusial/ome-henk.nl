@php
if ( is_null(\App\User::first()))
    $beheerder = 'Beheerder';
@endphp
@extends('layouts.master')

@section ('title')
        <span class="icon is-medium">
            <i class="fa fa-user-circle"></i>
        </span>
        <span>{{ $beheerder or "Bezoeker" }}s Profiel</span>
@endsection
@section ('subtitle')
Uw Profiel wijzigen?
@endsection

@section('content')
            <h3 class="title">
                <span class="icon is-medium">
                    <i class="fa fa-user-circle"></i>
                </span>
                <span>{{ $user->name }}</span>
            </h3>
            <h4 class="subtitle">Pas hier uw profielfoto aan.</h4>
            <form method="POST" action="{{ route('profile') }}" enctype="multipart/form-data">
                @csrf
                {{ method_field('PATCH') }}
                <div class="media">
                    <div class="media-left">
                        <label for="file">
                            <figure class="image is-128x128">
                                <img src="{{ ($avatarUrl = Auth::user()->getFirstMediaUrl('avatar', 'thumb')) ? $avatarUrl : "https://via.placeholder.com/128/00d1b2/ffffff"}}">
                            </figure>
                        </label>
                    </div>
                    <div class="media-content">
                        <div class="field">
                            <label class="label">Profielfoto</label>
                            <div class="file has-name is-fullwidth">
                                <label class="file-label">
                                    <input id="file" class="file-input" type="file" name="avatar">
                                    <span class="file-cta">
                                        <span class="file-icon">
                                            <i class="fa fa-image"></i>
                                        </span>
                                        <span class="file-label">
                                            Bestanden
                                        </span>
                                    </span>
                                    <span class="file-name" id="filename">
                                        {{ ( $avatar = Auth::user()->getFirstMedia('avatar') ) ? $avatar->file_name : "Kies een Foto voor uw Avatar..." }}
                                    </span>
                                </label>
                            </div>
                        </div>

                        {{-- @include ('user.form') --}}

                    </div>
                </div>

                <div class="field is-grouped is-grouped-right">
                    <div class="control">
                        <button type="submit" class="button is-primary">
                            <span class="icon">
                                <i class="fa fa-edit"></i>
                            </span>
                            <span>{{ __('Opslaan') }}</span>
                        </button>
                    </div>
                </div>

            </form>
@endsection
