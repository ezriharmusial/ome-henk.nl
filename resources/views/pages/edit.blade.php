@extends ('layouts.master')
@section ('window-title', '| pagina bewerken')
@section ('head-tail')
  <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
@endsection

@section ('title')
        <span class="icon">
            <i class="fas fa-plus"></i>
        </span>
        <span>{{ $page->title }}</span>
@endsection
@section ('subtitle')
Pagina bewerken
@endsection

@section ('content')
<div class="column">
    <article class="section content">
        <form method="POST" action="{{ route('pages.store') }}">
            {{ csrf_field() }}
            <div class="field">
                <div class="control">
                    <label class="label">Icoon</label>
                    {{-- <input class="input" type="text" id="title_icon" name="title_icon" data-action="iconPicker" value="fa fa-icon fa-star" /> --}}
                    <div class="select">
                        <select id="title_icon" name="title_icon">
                            @foreach ($icons as $icon)
                            <option value="{{ $icon }}">{{ $icon }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                @if ($errors->has('title_icon'))
                <p class="help is-danger">
                    {{ $errors->first('title_icon') }}
                </p>
                @else
                <p class="help is-dark">
                    Kies een Icoontje voor de Pagina Titels en Knoppen.
                </p>
                @endif
            </div>

            <div class="field">
                <label class="label">Pagina Titel</label>
                <div class="control is-expanded">
                    <input class="input" id="title" name="title" type="text" placeholder="Titel van Pagina" value="{{ $page->title }}" required>
                </div>
                @if ($errors->has('title'))
                <p class="help is-danger">
                    {{ $errors->first('title') }}
                </p>
                @else
                <p class="help">
                    Een korte bondige titel, max. 3 woorden en max. 20 Letters.
                </p>
                @endif
            </div>

            <div class="field">
                <label class="label">Subtitel</label>
                <div class="control">
                    <input class="input" id="subtitle" name="subtitle" type="text" placeholder="Subtitel van Pagina" value="{{ $page->subtitle }}" required>
                </div>
                @if ($errors->has('subtitle'))
                <p class="help is-danger">
                    {{ $errors->first('subtitle') }}
                </p>
                @else
                <p class="help">
                    Geef een korte aanvullende beschrijving, maximaal 30 Letters.
                </p>
                @endif
            </div>

            <div class="field">
                <label class="label">Pagina Inhoud</label>
                <div class="control">
                    <textarea class="textarea" id="content" name="content" placeholder="Pagina inhoud" required>{{ $page->content }}</textarea>
                </div>
                @if ($errors->has('content'))
                <p class="help is-danger">
                    {{ $errors->first('content') }}
                </p>
                @else
                <p class="help">
                    Plaats hier de tekst of media voor deze pagina.
                </p>
                @endif
            </div>

            <div class="field">
                <label class="label">Bevat deze pagina artiekelen?</label>
                <div class="control">
                    <label class="radio">
                        <input checked="checked" type="radio" name="has_articles" value=0>
                        Nee
                    </label>
                    <br />
                    <label class="radio">
                        <input type="radio" id="has_articles" name="has_articles" value=1>
                        Ja
                    </label>
                </div>
            </div>



            <div class="field">
                <label class="label">Publicatie status?</label>
                <div class="control">
                    <label class="radio">
                        <input @if ( $page->published ) checked="checked" @endif type="radio" name="published" value=0>
                        Concept (Niet zichtbaar voor publiek)
                    </label>
                    <br />
                    <label class="radio">
                        <input @if ( $page->published ) checked="checked" @endif type="radio" name="published" value=1>
                        Gepubliceerd (Zichtbaar voor publiek)
                    </label>
                </div>
            </div>

            <div class="field is-grouped">
              <div class="control">
                <button type="submit" class="button is-success">
                    <span class="icon">
                        <i class="fas fa-save"></i>
                    </span>
                    <span>Pagina Opslaan</span>
                </button>
              </div>
            </div>
        </form>
    </article>
</div>
@endsection

@section ('footer')
{{-- <script>
let iconPickerOptions = {
  iconSets: [ {
  //   name: 'fontAwesome 5 Regular', // Name displayed on tab
  //   css: 'https://use.fontawesome.com/releases/v5.0.13/css/regular.css', // CSS url containing icons rules
  //   prefix: 'fa-', // CSS rules prefix to identify icons
  //   displayPrefix: 'far'
  // },
  // {
    name: 'fontAwesome', // Name displayed on tab
    css: 'https://opensource.keycdn.com/fontawesome/4.7.0/font-awesome.min.css', // CSS url containing icons rules
    prefix: 'fa-', // CSS rules prefix to identify icons
    displayPrefix: 'fa fa-icon'
  }//,
  // {
  //   name: 'fontAwesome 5 Solid', // Name displayed on tab
  //   css: 'https://use.fontawesome.com/releases/v5.0.13/css/solid.css', // CSS url containing icons rules
  //   prefix: 'fa-', // CSS rules prefix to identify icons
  //   displayPrefix: 'fas'
  // },
  // {
  //   name: 'fontAwesome 5 Brands', // Name displayed on tab
  //   css: 'https://use.fontawesome.com/releases/v5.0.13/css/brands.css', // CSS url containing icons rules
  //   prefix: 'fa-', // CSS rules prefix to identify icons
  //   displayPrefix: 'fab'
  // }
]};
</script>
 --}}@endsection
