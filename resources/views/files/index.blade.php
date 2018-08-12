@extends ('layouts.master')
@section ('window-title', '| Bijlagen' )

@section ('stylesheets')
@endsection

@section ('page-header-bg')
@endsection
@section ('title')
        <span class="icon is-medium">
            <i class="fa fa-paperclip"></i>
        </span>
        <span>Website Bijlagen</span>
@endsection
@section ('subtitle')
Overzicht van alle Bijlagen ooit geupload
@endsection

@section ('content')
             @include('files.file-form')
    <div class="container is-fluid box">
        <div class="tabs is-centered is-large">
            <ul>
                <li :class="{'is-active': isActive('image')}" @click="getFiles('image')">
                    <a>
                        <span class="icon is-small"><i class="fa fa-image"></i></span>
                        <span>Plaatjes</span>
                    </a>
                </li>
                <li :class="{'is-active': isActive('audio')}" @click="getFiles('audio')">
                   <a>
                        <span class="icon is-small"><i class="fa fa-music"></i></span>
                        <span>Muziek</span>
                    </a>
                </li>
                <li :class="{'is-active': isActive('video')}" @click="getFiles('video')">
                    <a>
                        <span class="icon is-small"><i class="fa fa-film"></i></span>
                        <span>Videos</span>
                    </a>
                </li>
                <li :class="{'is-active': isActive('document')}" @click="getFiles('document')">
                    <a>
                        <span class="icon is-small"><i class="fa fa-file-text-o"></i></span>
                        <span>Documenten</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="tabs-details">
            <div class="columns is-multiline">

                <div class="is-empty column is-4 is-offset-4" v-if="pagination.total == 0" v-cloak>
                    <p class="subtitle">
                        Geen bestanden aanwezig
                    </p>
                </div>

                <div class="loading column is-4 is-offset-4" v-if="loading">
                    <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
                    <span class="sr-only">Even geduld aub...</span>
                </div>

                <div class="column " :class="isVideo  ? 'is-half'  : 'is-one-quarter'" v-for="file in files">
                    <div class="card " :class="file.type == 'image' ? 'is-image' : ''">
                        <div class="card-image">
                            <button class="delete delete-file" title="Delete" @click="prepareToDelete(file.id)"></button>
                            <figure class="image" v-if="file.type == 'image'" @click="showModal(file)">
                                <img v-if="file === editingFile"  :src="'{{ asset('storage/' . Auth::user()->name . '_' . Auth::id()) }}' + '/' + savedFile.type + '/' + savedFile.name + '.' + savedFile.extension" :alt="file.name">
                                <img v-if="file !== editingFile"  :src="'{{ asset('storage/' . Auth::user()->name . '_' . Auth::id()) }}' + '/' + file.type + '/' + file.name + '.' + file.extension" :alt="file.name">
                            </figure>

                            <div v-if="file.type == 'audio'">
                                <figure class="image is-square">
                                    <span class="icon is-size-4">
                                        <i class="fa fa-music"></i>
                                    </span>
                                </figure>
                                <audio controls>
                                    <source :src="'{{ asset('storage/' . Auth::user()->name . '_' . Auth::id()) }}' + '/' + file.type + '/' + file.name + '.' + file.extension" :type="'audio/' + file.extension">
                                    Deze Browser ondersteund geen audio tags en kan dus niks afspelen.
                                </audio>
                            </div>

                            <div v-if="file.type == 'video'" class="video_block">
                                <video controls>
                                    <source :src="'{{ asset('storage/' . Auth::user()->name . '_' . Auth::id()) }}' + '/' + file.type + '/' + file.name + '.' + file.extension" :type="'video/' + file.extension">
                                    Uw browser ondersteund geen video tags en kan dus niks afspelen.
                                </video>
                            </div>

                            <div v-if="file.type == 'document'" class="document_block">

                                <span class="icon is-large is-size-1">
                                    <i class="fa fa-file-text-o"></i>
                                </span>
                                <a class="button is-primary" :href="'{{ asset('storage/' . Auth::user()->name . '_' . Auth::id()) }}' + '/' + file.type + '/' + file.name + '.' + file.extension" target="_blank">
                                    <i class="fa fa-download" aria-hidden="true"></i>
                                    &nbsp;Downloaden
                                </a>
                            </div>
                      </div>
                      <div class="card-content">
                            <div class="content">
                                <p v-if="file !== editingFile" @dblclick="editFile(file)" :title="'Dubbel klik om bestandsnaam te bewerken'">
                                    @{{ file.name + '.' + file.extension}}
                                </p>
                                <input class="input" v-if="file === editingFile" v-autofocus @keyup.enter="endEditing(file)" @blur="endEditing(file)" type="text" :placeholder="file.name" v-model="file.name">
                                <time datetime="2016-1-1">@{{ file.created_at }}</time>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <nav class="pagination is-centered" role="navigation" aria-label="pagination" v-if="pagination.last_page > 1" v-cloak>
            <a class="pagination-previous" @click.prevent="changePage(1)" :disabled="pagination.current_page <= 1">Eerste pagina</a>
            <a class="pagination-previous" @click.prevent="changePage(pagination.current_page - 1)" :disabled="pagination.current_page <= 1">Vorige</a>
            <a class="pagination-next" @click.prevent="changePage(pagination.current_page + 1)" :disabled="pagination.current_page >= pagination.last_page">Volgende</a>
            <a class="pagination-next" @click.prevent="changePage(pagination.last_page)" :disabled="pagination.current_page >= pagination.last_page">Laatste pagina</a>
            <ul class="pagination-list">
                <li v-for="page in pages">
                    <a class="pagination-link" :class="isCurrentPage(page) ? 'is-current' : ''" @click.prevent="changePage(page)">
                        @{{ page }}
                    </a>
                </li>
            </ul>
        </nav>
    </div>
@endsection

@section ('footer')
        @auth
            <!-- Notifications -->
            @include('partials.notification')
            <!-- MODALS -->
            @include('files.confirm')
            @include('files.modal')
        @endauth
@endsection
