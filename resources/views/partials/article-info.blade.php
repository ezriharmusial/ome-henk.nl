@php
// dd(Request::route()->getName(), in_array(Request::route()->getName(), ['posts.show', 'posts.index']));
if ( in_array(Request::route()->getName(), ['posts.show', 'posts.index'])  ){
    $article = $post;
    $articleType = "Artikel";
} else {
    $article = $page;
    $articleType = "Pagina";
}
@endphp
                    @if ( $article->published != 1 )
                    <div class="notification is-info content">
                        <span class="fa fa-info"> </span> Deze {{ $articleType }} is niet gepubliceerd en daarom niet zichtbaar voor anderen.
                    </div>
                    @endif


                    <div class="notification is-light content">
                        <p class="subtitle">Aanvullende {{ $articleType }} Informatie</p>
                        <dl>
                            @if( $article->getTable() == "pages" )
                            <dt>{{ $articleType }} bevat Artikelen:</dt>
                            <dd>{{ ($article->has_articles) ? "Ja" : "Nee" }}</dd>
                            @endif
                            <dt>{{ $articleType }} Status:</dt>
                            <dd>{{ ($article->published) ? "Gepubliceerd" : "Concept" }}</dd>
                            <dt>{{ $articleType }} Aangemaakt op:</dt>
                            <dd>{{ $article->created_at->diffForHumans() }}</dd>
                            <dt>{{ $articleType }} Aangepast op:</dt>
                            <dd>{{ $article->updated_at->diffForHumans() }}</dd>
                        </dl>
                        <div class="field is-grouped is-grouped-multiline">
                            <p class="control">
                                <a href="{{ url()->full() }}/bewerken" class="button is-link">
                                   <span class="icon">
                                        <i class="fa fa-edit"></i>
                                    </span>
                                    <span>Bewerken</span>
                                </a>
                            </p>
                            <form method="post" action="{{ url()->full() }}/verwijderen" >
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
                        </div>
                    </div>
