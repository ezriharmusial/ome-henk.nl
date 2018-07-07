@extends ('layouts.master')

@section ('head-tail')
  <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
@endsection

@section ('title')
        <span class="icon">
            <i class="fa fa-plus"></i>
        </span>
        <span>Nieuw Artikel</span>
@endsection

@section ('subtitle')
voor op de "{{ $page->title}}" pagina
@endsection

@section ('content')
<form method="POST" action="{{ route('posts.store', $page) }}" enctype="multipart/form-data">
    <div class="columns">
        <div class="column">
            <h3 class="title">
                <span class="icon">
                    <i class="fa fa-plus"></i>
        </span>
        <span>Nieuw Artikel</span>
            </h3>
            <h4 class="subtitle">
                <span>voor op de "{{ $page->title}}" pagina</span>
            </h4>
            @include ('posts.form')

            <div class="field is-grouped is-grouped-right">
                <div class="control">
                    <button  type="submit" class="button is-primary">
                        <span class="icon">
                            <i class="fa fa-plus"></i>
                        </span>
                        <span>Artikel Aanmaken</span>
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
