@section ('stylesheets')
@endsection
@section ('scripts')
{{--         <script>
            var editor = new window.Quill('#content', {
                modules: { toolbar: '#toolbar' },
                theme: 'snow'
            });
        </script>
 --}}
        <script>
            let defaultOptions = {
              iconSets: [{
                name: 'fontAwesome', // Name displayed on tab
                css: 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css', // CSS url containing icons rules
                prefix: 'fa-', // CSS rules prefix to identify icons
                displayPrefix: 'fa fa-icon'
                }
              ]
            };

            bulmaIconpicker.attach('[data-action="iconPicker"]', defaultOptions);
        </script>
@endsection

            <div class="field has-addons title">
                <p class="control button is-light is-rounded is-size-5 is-large">
                    <input class="input" type="text" id="title_icon" name="title_icon" data-action="iconPicker" value="{{ $page->title_icon or "fa fa-question"}}" />
                </p>
                <p class="control is-expanded">
                    <input class="input is-size-4 title" id="title" name="title" type="text" placeholder="Titel van Pagina" value="{{ $page->title }}" required>
                </p>
            </div>
            @if ($errors->has('title_icon'))
            <p class="help is-danger">
                {{ $errors->first('title_icon') }}
            </p>
            {{-- @else
            <p class="help is-dark">
                Kies een Icoon voor Pagina Titels en Knoppen.
            </p> --}}
            @endif
            @if ($errors->has('title'))
            <p class="help is-danger">
                {{ $errors->first('title') }}
            </p>
            {{-- @else
            <p class="help">
                Een korte bondige titel, max. 3 woorden en max. 20 Letters.
            </p> --}}
            @endif

            <div class="field subtitle">
                {{-- <label class="label">Subtitel</label> --}}
                <div class="control">
                    <input class="input is-size-5 has-text-weight-light" id="subtitle" name="subtitle" type="text" placeholder="Subtitel van Pagina" value="{{ $page->subtitle }}" required>
                </div>
                @if ($errors->has('subtitle'))
                <p class="help is-danger">
                    {{ $errors->first('subtitle') }}
                </p>
                @else
                {{-- <p class="help">
                    Geef een korte aanvullende beschrijving, maximaal 30 Letters.
                </p> --}}
                @endif
            </div>

            <div class="field">
                {{-- <label class="label">Pagina Inhoud</label> --}}
                <!-- Create the toolbar container -->
                <div id="toolbar">
                  <button class="ql-bold">Bold</button>
                  <button class="ql-italic">Italic</button>
                </div>

                <div class="control content">
                    <textarea class="textarea" id="content" name="content" placeholder="Pagina inhoud" required>{{ $page->content }}</textarea>
                </div>
                @if ($errors->has('content'))
                <p class="help is-danger">
                    {{ $errors->first('content') }}
                </p>
                @else
                {{-- <p class="help">
                    Plaats hier de tekst of media voor deze pagina.
                </p> --}}
                @endif
            </div>

            <div class="field">
                <input id="has_articles" type="checkbox" name="has_articles" class="switch is-success is-medium is-rounded is-adaptive" value=1 @if ( $page->has_articles ) checked="checked" @endif>
                <label for="has_articles">Pagina bevat Artikeltjes</label>
            </div>


            <div class="field">
                <input id="published" type="checkbox" name="published" class="switch is-success is-medium is-rounded is-adaptive" value=1 @if ( $page->published ) checked="checked" @endif>
                <label for="published">Pagina Publiceren</label>
            </div>


{{--             <div class="field">
                <label class="label">Artiekelen aan pagina toevoegen?</label>
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
                        Concept
                    </label>
                    <br />
                    <label class="radio">
                        <input @if ( $page->published ) checked="checked" @endif type="radio" name="published" value=1>
                        Gepubliceerd
                    </label>
                </div>
            </div>
 --}}
