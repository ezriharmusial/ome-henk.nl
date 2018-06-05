                        <article class="section content">
                            <p class="title"><a href="/{{ $page->slug }}/{{ $post->slug }}">{{ $post->title }}</a></p>
                            <p class="subtitle"><small>op {{ $post->created_at->toFormattedDateString() }} door {{ $post->user->name }}</small></p>
                            <p>{{ $post->body }}</p>
                        </article>
