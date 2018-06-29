@if (Session::has('success'))
<div class="notification is-success">
    <button class="delete"></button>
    {{ Session::get('success') }}
</div>
@endif
@if (Session::has('warning'))
<div class="notification is-warning">
    <button class="delete"></button>
    {{ Session::get('warning') }}
</div>
@endif
@if (count($errors) > 0)
<div class="notification is-error">
    <button class="delete"></button>
    Het formulier is niet goed ingevuld, corrigeer de fouten en probeer het opnieuw
</div>
@endif
@if (Session::has('info'))
<div class="notification is-info">
    <button class="delete"></button>
    {{ Session::get('info') }}
</div>
@endif
