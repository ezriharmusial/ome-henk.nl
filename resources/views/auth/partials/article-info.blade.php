@auth
@php
if (Route::current()->getName() == 'pages.show' ){
    $article = $page;
} elseif (Route::current()->getName() == 'posts.show') {
    $article = $post;
}
@endphp
                    <div class="box content">
                        <p class="title">Informatie</p>
                        <dl>
                            <dt>Gemaakt op:</dt>
                            <dd>{{ $article->created_at->toFormattedDateString() }}</dd>
                            <dt>Aangepast op:</dt>
                            <dd>{{ $article->updated_at->toFormattedDateString() }}</dd>
                        </dl>
                        <div class="field is-grouped">
                            @if (Route::current()->getName() == 'pages.edit' || Route::current()->getName() == 'posts.edit')
                            <p class="control">
                                <a href="{{ url()->full() }}/bewerken" class="button is-link">
                                   <span class="icon">
                                        <i class="fa fa-save"></i>
                                    </span>
                                    <span>Opslaan</span>
                                </a>
                            </p>
                            <p class="control">
                                @if (Route::current()->getName() == 'pages.edit')
                                <a href="{{ route('pages.show') }}" class="button is-link">
                                @elseif (Route::current()->getName() == 'posts.edit')
                                <a href="{{ route('posts.show') }}" class="button is-link">
                                @endif
                                   <span class="icon">
                                        <i class="fa fa-edit"></i>
                                    </span>
                                    <span>Annuleren</span>
                                </a>
                            </p>
                            @else
                            <p class="control">
                                <a href="{{ url()->full() }}/bewerken" class="button is-link">
                                   <span class="icon">
                                        <i class="fa fa-edit"></i>
                                    </span>
                                    <span>Bewerken</span>
                                </a>
                            </p>
                            @if (Route::current()->getName() == 'pages.show')
                            <form method="post" action="{{action('PagesController@destroy', $page->slug)}}" >
                            @elseif (Route::current()->getName() == 'posts.show')
                            <form method="post" action="{{action('PostsController@destroy', $post->slug)}}" >
                            @endif
                                @csrf
                                <input name="_method" type="hidden" value="DELETE">
                                <p class="control">
                                    <button class="button is-danger" type="submit">
                                       <span class="icon">
                                            <i class="fa fa-trash"></i>
                                        </span>
                                        <span>Verwijderen</span>
                                    </button>
                                </p>
                            </form>
                            @endif
                        </div>
                    </div>
@endauth
