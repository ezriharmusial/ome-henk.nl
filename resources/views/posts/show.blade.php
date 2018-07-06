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
                        @include('partials.comments')
                    </div>
@endsection

@section ('sidebar-content')
    @include ('auth.partials.article-info')
@endsection

