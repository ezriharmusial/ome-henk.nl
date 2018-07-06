@extends ('layouts.master')

@section ('head-tail')
  <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
@endsection

@section ('title')
        <span class="icon">
            <i class="fa fa-plus"></i>
        </span>
        <span>Artikel Aanmaken</span>
@endsection

@section ('subtitle')
Schrijf een nieuw artikel voor
@endsection

@section ('content')
<div class="column">
    <h2 class="title">
        <span class="icon">
            <i class="fa fa-plus"></i>
        </span>
        <span>Artikel Aanmaken</span>
    </h2>
    <p>Vul de onderstaande gegevens in om een nieuwe Artikel aan te maken.</p>
    <form method="POST" action="{{ route('posts.store', $page) }}" enctype="multipart/form-data">
        @include ('posts.form')
        <div class="field is-grouped">
          <div class="control">
            <button  type="submit" class="button is-outlined is-link">Publiceren</button>
          </div>
        </div>
    </form>
</div>
@endsection

@section ('footer')
@endsection
