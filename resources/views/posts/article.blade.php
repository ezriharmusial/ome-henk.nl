                            <div class="tile is-child">
                                <h4 class="title">{{ $post->title }}</h4>
                                <h5 class="subtitle">{{ $post->subtitle }}</h5>
                                <p class="content">{{ $post->content }}</p>
                                <p><small class="has-text-grey-light has-text-weight-normal"> {{ $post->updated_at->diffForHumans() }} door {{ $post->user->name }}</small></p>
                            </div>
