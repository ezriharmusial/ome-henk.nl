@extends ('layouts.master')
@section ('window-title', '| Pagina Aanmaken' )
@section ('title')
        <span class="icon is-medium">
            <i class="fa fa-image"></i>
        </span>
        <span>Plaatje toevoegen</span>
@endsection
@section ('subtitle')
Hier uploaden aub
@endsection

@section ('content')
<div class="columns">
    <div class="column is-multiline">
        <form class="box" method="POST" action="{{ route('media.store') }}" enctype="multipart/form-data">
            @csrf
            @include('media.form')

            <div class="field">
                <div class="control">
                    <button type="submit" class="button is-primary">
                        <span class="icon">
                            <i class="fa fa-plus"></i>
                        </span>
                        <span>Uploaden</span>
                    </button>
                </div>
            </div>
        </form>
    </div>
    @if($media)
    @foreach ($media as $medium)
    <div class="column">
        <div class="box">
            <figure class="image is-128x128">
                <a href="">
                    <img src="{{ asset("storage/images/thumbnails/" . $medium->filename ) }}"  /></a>
            </figure>
        </div>
    </div>
    @endforeach
    @endif


</div>
@foreach ($media as $medium)
<div class="modal">
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">{{$medium->filename}}</p>
      <button class="delete" aria-label="close"></button>
    </header>
    <section class="modal-card-body">
        <p class="image is-2by1">
            <img src="{{ asset("storage/images/optimized/" . $medium->filename ) }}" alt="{{$medium->filename}}">
        </p>
    </section>
    <footer class="modal-card-foot">
        <form method="post" action="{{action('MediaController@destroy', $medium->id)}}" >
            @csrf
            <input name="_method" type="hidden" value="DELETE">
            <p class="control">
                <button class="button is-outlined is-danger" type="submit">
                   <span class="icon">
                        <i class="fa fa-trash"></i>
                    </span>
                    <span>Verwijderen</span>
                </button>
            </p>
        </form>
    </footer>
  </div>
</div>

@endforeach
@endsection
