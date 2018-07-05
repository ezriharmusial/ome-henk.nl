@if (count($errors) > 0)
<div class="box notification is-warning">
    <button class="delete"></button>
    Het formulier is niet goed ingevuld, corrigeer de fouten en probeer het opnieuw
</div>
@else
@foreach (['danger', 'warning', 'success', 'info'] as $msg)
@if (Session::has($msg))
<div class="box notification is-{{ $msg }}">
    <button class="delete"></button>
    {{ Session::get($msg) }}
</div>
@endif
@endforeach
@endif
