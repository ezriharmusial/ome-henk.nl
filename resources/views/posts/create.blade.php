@extends ('layouts.master')

@section ('title')
        <span class="icon">
            <i class="fas fa-plus"></i>
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
            <i class="fas fa-plus"></i>
        </span>
        <span>Artikel Aanmaken</span>
    </h2>
    <p>Vul de onderstaande gegevens in om een nieuwe Artikel aan te maken.</p>
    <form method="POST" action="{{ route('storePost', $page) }}">
        {{ csrf_field() }}
        <div class="field">
            <label class="label">Artikel Titel</label>
            <div class="control is-expanded">
                <input class="input" id="title" name="title" type="text" placeholder="Titel van Artikel" value="" required>
            </div>
            @if ($errors->has('title'))
            <p class="help is-danger">
                {{ $errors->first('title') }}
            </p>
            @else
            <p class="help">
                Een passende titel voor dit Artikel.
            </p>
            @endif
        </div>

        <div class="field">
            <label class="label">Subtitel</label>
            <div class="control">
                <input class="input" id="subtitle" name="subtitle" type="text" placeholder="Subtitel van Artikel" value="" required>
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
            <label class="label">Artikel Inhoud</label>
            <div class="control">
                <textarea class="textarea" id="content" name="content" placeholder="Artikel inhoud" required></textarea>
            </div>
            @if ($errors->has('content'))
            <p class="help is-danger">
                {{ $errors->first('content') }}
            </p>
            @else
            <p class="help">
                Plaats hier de tekst of media voor dit Artikel.
            </p>
            @endif
        </div>

        <div class="field">
            <label class="label">Artikel direct Publiceren?</label>
            <div class="control">
                <label class="radio">
                    <input type="radio" id="has_articles" name="published" value=0>
                    Nee, het is nog een concept.
                </label>
                <br />
                <label class="radio">
                    <input checked="checked" type="radio" name="published" value=1>
                    Ja! Gooi maar online!
                </label>
            </div>
        </div>

        <div class="field is-grouped">
          <div class="control">
            <button type="submit" class="button is-link">Publiceren</button>
          </div>
        </div>
    </form>
</div>
@endsection

@section ('footer')
@endsection
