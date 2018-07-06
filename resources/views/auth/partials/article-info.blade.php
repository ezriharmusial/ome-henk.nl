@auth
@php
// dd(Request::route()->getName(), in_array(Request::route()->getName(), ['posts.show', 'posts.index']));
if ( in_array(Request::route()->getName(), ['posts.show', 'posts.index'])  ){
    $article = $post;
    $articletype = "Posts";
} else {
    $article = $page;
    $articletype = "Pages";
}
@endphp
                    <div class="box notification is-light content">
                        <p class="subtitle">Aanvullende Informatie</p>
                        <dl>
                            {{ $article->title }}
                            @if( $articletype == "Pages" )
                            <dt>Pagina bevat Artikelen:</dt>
                            <dd>{{ ($article->has_articles) ? "Ja" : "Nee" }}</dd>
                            @endif
                            <dt>Status:</dt>
                            <dd>{{ ($article->published) ? "Gepubliceerd" : "Concept" }}</dd>
                            <dt>Aangemaakt op:</dt>
                            <dd>{{ $article->created_at->diffForHumans() }}</dd>
                            <dt>Aangepast op:</dt>
                            <dd>{{ $article->updated_at->diffForHumans() }}</dd>
                        </dl>
                        <div class="field is-grouped">
                            @if ( ends_with( Route::current()->getName(), '.edit') )
                            <p class="control">
                                <a href="{{ url()->full() }}/bewerken" class="button is-outlined is-link">
                                   <span class="icon">
                                        <i class="fa fa-save"></i>
                                    </span>
                                    <span>Opslaan</span>
                                </a>
                            </p>
                            <p class="control">
                                <a href="{{ route( strtolower($articletype) .'.show') }}" class="button is-outlined is-link">
                                   <span class="icon">
                                        <i class="fa fa-edit"></i>
                                    </span>
                                    <span>Annuleren</span>
                                </a>
                            </p>
                            @else
                            <p class="control">
                                <a href="{{ url()->full() }}/bewerken" class="button is-outlined is-link">
                                   <span class="icon">
                                        <i class="fa fa-edit"></i>
                                    </span>
                                    <span>Bewerken</span>
                                </a>
                            </p>
                            <form method="post" action="{{action($articletype.'Controller@destroy', $article->slug)}}" >
                                @csrf
                                {{ method_field('DELETE') }}
                                <p class="control">
                                    <button  class="button is-outlined is-danger" type="submit">
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
