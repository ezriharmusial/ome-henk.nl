@section ('stylesheets')
@endsection
@section ('scripts')
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-lite.css" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-lite.js"></script>
        <script>
            $('.textarea').summernote({
                placeholder: $('.textarea').placeholder,
                minHeight: 200,
                toolbar: [
                    ['misc', ['undo', 'redo']],
                    ['para', ['style']],
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link']],
                    ['misc', ['codeview', 'fullscreen']],
                ]
            });

            let defaultOptions = {
                iconSets: [{
                    name: 'fontAwesome', // Name displayed on tab
                    css: '/css/font-awesome.css', // CSS url containing icons rules
                    prefix: 'fa-', // CSS rules prefix to identify icons
                    displayPrefix: 'fa fa-icon'
                }]
            };
            bulmaIconpicker.attach('[data-action="iconPicker"]', defaultOptions);
        </script>
@endsection
            @csrf
            <label class="label">Icoon en Korte Titel</label>
            <div class="field has-addons">
                <p class="control button is-light is-size-4">
                    <input class="input" type="text" id="title_icon" name="title_icon" data-action="iconPicker" value="{{ $page->title_icon or "fa fa-question"}}" />
                </p>
                <p class="control is-expanded">
                    <input class="input is-size-4 has-text-weight-semibold" id="title" name="title" type="text" placeholder="Icoon & Titel van Pagina" value="{{ $page->title }}" required>
                </p>
            </div>
            @if ($errors->has('title_icon'))
            <p class="help is-danger">
                {{ $errors->first('title_icon') }}
            </p>
            @endif
            @if ($errors->has('title'))
            <p class="help is-danger">
                {{ $errors->first('title') }}
            </p>
            @endif

            <div class="field has-text-weight-light">
                <label class="label">Beschrijvende Subtitel</label>
                <div class="control">
                    <input class="input is-size-5 has-text-weight-light" id="subtitle" name="subtitle" type="text" placeholder="Subtitel van Pagina" value="{{ $page->subtitle }}" required>
                </div>
                @if ($errors->has('subtitle'))
                <p class="help is-danger">
                    {{ $errors->first('subtitle') }}
                </p>
                @endif
            </div>

            <div class="field">
                <label class="label">Pagina Inhoud</label>
                <div class="control content">
                    <textarea class="textarea" id="content" name="content" placeholder="Pagina inhoud" required>{!! $page->content !!}</textarea>
                </div>
                @if ($errors->has('content'))
                <p class="help is-danger">
                    {{ $errors->first('content') }}
                </p>
                @endif
            </div>

            <div class="field">
                <input id="has_articles" type="checkbox" name="has_articles" class="switch is-success is-medium is-rounded is-adaptive" value=1 @if ( $page->has_articles ) checked="checked" @endif>
                <label for="has_articles">Pagina bevat Artikeltjes</label>
            </div>

            <div class="field">
                <input id="published" type="checkbox" name="published" class="switch is-success is-medium is-rounded is-adaptive" value=1 @if ( $page->published || $page->exists == false ) checked="checked" @endif>
                <label for="published">Pagina Publiceren</label>
            </div>
