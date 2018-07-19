                        <article>
                            <p class="content">{{ $page->content }}</p>
                            <p><small class="has-text-grey-light has-text-weight-normal"> {{ $page->updated_at->diffForHumans() }} door {{ $page->user->name }}</small></p>
                        </article>
