                            <div class="tile is-child">
{{--                                 <h4 class="title">{{ $post->title }}</h4>
                                <h5 class="subtitle">{{ $post->subtitle }}</h5>
 --}}                                <div class="content">{!! $post->content !!}</div>
                                <p><small class="has-text-grey-light has-text-weight-normal"> {{ $post->updated_at->diffForHumans() }} door {{ $post->user->name }}</small></p>
                            </div>
