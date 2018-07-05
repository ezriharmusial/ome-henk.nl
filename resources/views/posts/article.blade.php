                        <article class="section columns">
@if (Route::current()->getName() == 'showPage' && isset($post->featured_image))
                            <div class="column is-4">
                                <figure class="image is-16by9" style="background-image: url('/images/{{ $post->featured_image }}');background-size: cover;">
                                </figure>
                            </div>
@endif
                            <div class="column content">
                                <p class="title"><a href="/{{ $page->slug }}/{{ $post->slug }}">{{ $post->title }}</a></p>
                                <p class="subtitle">{{ $post->subtitle }}</p>
                                <p>{{ $post->content }}<br><small class="has-text-grey-light has-text-weight-normal"> {{ $post->updated_at->diffForHumans() }} door {{ $post->user->name }}</small></p>
                            </div>
                        </article>
