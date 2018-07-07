@extends ('layouts.master')

@section ('title')
                <span class="icon is-medium">
                    <i class="{{ $page->title_icon }}"></i>
                </span>
                <span>{{ $page->title}}</span>
@endsection
@section ('subtitle')
{{ $post->title }}
@endsection

@section ('content')
            <div class="columns">
                <div class="column">
                    @include('posts.article')
                    {{-- @include('partials.comments') --}}
                </div>
                <div class="column is-one-forth is-narrow">
                    @include ('partials.article-info')
                </div>
            </div>
@endsection

