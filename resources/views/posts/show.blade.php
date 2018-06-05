@extends ('layouts.master')

@section ('title')
{{-- <figure class="is-image is-square">
    <img src="images\logo.svg" alt="" style="width: 25vw;">
</figure> --}}
Blog
@endsection
@section ('subtitle')
{{ $post->title }}
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
                                    <textarea id="body" name="body" class="textarea" placeholder="Add a comment..." required></textarea>
                                  </p>
                                </div>
                                <div class="field">
                                  <p class="control">
                                    <button class="button">Post comment</button>
                                  </p>
                                </div>
                            </form>
                          </div>
                        </section>
                        @endguest
                    </div>
@endsection

@section ('footer')
@endsection

