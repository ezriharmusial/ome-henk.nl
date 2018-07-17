@extends ('layouts.master')

@section ('title')
                <span class="icon is-medium">
                    <i class="{{ $page->title_icon }}"></i>
                </span>
                <span>{{ $page->title}}</span>
@endsection

@section ('page-header-style')
@if ($avatarUrl = $page->getFirstMediaUrl('page-headers', 'full'))
style="background-image: url('{{ $avatarUrl }}');background-size: cover;"
@endif
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

