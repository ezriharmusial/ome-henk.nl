@extends ('layouts.master')

@section ('head-tail')
  <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
@endsection

@section ('title')
        <span class="icon">
            <i class="fa fa-edit"></i>
        </span>
        <span>Artikel Bewerken</span>
@endsection

@section ('subtitle')
<span>voor op de "{{ $page->title }}" pagina</span>
@endsection

@section ('content')
{{-- @php (dd($page->slug , $post->slug)) --}}
<form method="POST" action="{{ "/" . $page->slug . "/" . $post->slug }}" enctype="multipart/form-data">
    {{ method_field('PATCH') }}
    <div class="columns">
        <div class="column">
            <h3 class="title">
                <span class="icon">
                    <i class="fa fa-edit"></i>
                </span>
                <span>Artikel Bewerken</span>
            </h3>
            <h4 class="subtitle">
                <span>voor op de "{{ $page->title }}" pagina</span>
            </h4>
            @include ('posts.form')

            <div class="field is-grouped is-grouped-right">
                <div class="control">
                    <button  type="submit" class="button is-primary">
                        <span class="icon">
                            <i class="fa fa-edit"></i>
                        </span>
                        <span>Artikel Opslaan</span>
                    </button>
                    <a class="button is-outlined is-danger" href="{{ URL::previous() }}">Annuleren</a>
                </div>
            </div>
        </div>
        <div class="column is-one-forth is-narrow">
            <label class="label">Plaatjes</label>
            <div class="box">
                @include ('media.form')
            </div>
        </div>
    </div>
</form>
@endsection
