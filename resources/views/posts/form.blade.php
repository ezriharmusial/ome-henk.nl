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
        </script>
@endsection

        @csrf
        <div class="field">
            <label class="label">Artikel Titel</label>
            <div class="control is-expanded">
                <input class="input" id="title" name="title" type="text" placeholder="Titel van Artikel" value="{{ $post->title }}" required>
            </div>
            @if ($errors->has('title'))
            <p class="help is-danger">
                {{ $errors->first('title') }}
            </p>
            @endif
        </div>

{{--         <div class="field">
            <label class="label">Artikel Subtitel</label>
            <div class="control">
                <input class="input" id="subtitle" name="subtitle" type="text" placeholder="Subtitel van Artikel" value="{{ $post->subtitle }}">
            </div>
            @if ($errors->has('subtitle'))
            <p class="help is-danger">
                {{ $errors->first('subtitle') }}
            </p>
            @endif
        </div>
 --}}
        <div class="field">
            <label class="label">Artikel Inhoud</label>
            <div class="control content">
                <textarea class="textarea" id="content" name="content" placeholder="Artikel inhoud" required>{!! $post->content !!}</textarea>
            </div>
            @if ($errors->has('content'))
            <p class="help is-danger">
                {{ $errors->first('content') }}
            </p>
            @endif
        </div>

        <div class="field">
            <input id="published" type="checkbox" name="published" class="switch is-success is-medium is-rounded is-adaptive" value=1 @if ( $post->published || $post->exists == false ) checked="checked" @endif>
            <label for="published">Artikel Publiceren</label>
        </div>
