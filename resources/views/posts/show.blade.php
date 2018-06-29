@extends ('layouts.master')

@section ('title')
{{ $post->title }}
@endsection
@section ('subtitle')
{{ $post->subtitle }}
@endsection

@section ('content')
                    <div class="column">
                        @include('posts.article')
                        @foreach ($post->comments as $comment)
                        <section class="media">
                          <figure class="media-left">
                            <p class="image is-64x64">
                              <img src="https://bulma.io/images/placeholders/128x128.png">
                            </p>
                          </figure>
                          <div class="media-content">
                            <div class="content">
                              <p>
                                <strong>{{ $comment->user->name }}</strong>
                                <br>
                                {{ $comment->body }}
                                <br>
                                <small><a>Like</a> · <a>Reply</a> · {{ $comment->created_at->diffForHumans() }}</small>
                              </p>
                            </div>
                          </div>
                        </section>
                        @endforeach
                        @guest
                        @else
                        <section class="media">
                          <figure class="media-left">
                            <p class="image is-64x64">
                              <img src="https://bulma.io/images/placeholders/128x128.png">
                            </p>
                          </figure>
                          <div class="media-content">
                            <form method="POST" action="{{ route( 'storeComment', [ $page->slug, $post->slug] ) }}">
                                {{ csrf_field() }}
                                <div class="field">
                                  <p class="control">
                                    <textarea id="body" name="body" class="textarea" placeholder="Plaats opmerking..." required></textarea>
                                  </p>
                                </div>
                                @if ($errors->has('subtitle'))
                                <p class="help is-danger">
                                    {{ $errors->first('body') }}
                                </p>
                                @else
                                <p class="help">
                                    Geef een korte aanvullende beschrijving, maximaal 30 Letters.
                                </p>
                                @endif
                                <div class="field">
                                  <p class="control">
                                    <button class="button">Plaats opmerking</button>
                                  </p>
                                </div>
                            </form>
                          </div>
                        </section>
                        @endguest
                    </div>
@endsection

@section ('sidebar-content')
    @include ('auth.partials.article-info')
@endsection

