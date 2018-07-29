@section ('title')
            <h3 class="title">
                <span class="icon is-large">
                    <i class="fa fa-dashboard"></i>
                </span>
                <span>Dashboard</span>
            </h3>
@endsection

@section ('subtitle')
Welkom op uw eigen website
@endsection


@extends('layouts.master')

@section('content')
        <div class="column">
            <p> Dit is <b>Versie 1.0</b> van de website. Deze versie van de website is bedoeld om u bekend te maken met het gebruik van een website door <b>"Content"</b> of inhoud te creëren. Door het te gebruiken komen we er ook achter wat uw behoefte zijn als Gebruiker met "Arbeidershanden" ;-) en een verminderd zicht. Met de tijd zal de <b>"Interface"</b>, het uiterlijk Schilletje, in overleg veranderen naar uw wensen. Maar U blijft verantwoordelijk voor de <b>Content</b>.
            </p>
            <p>
                Ik heb geprobeerd om de site zo duidelijk mogelijk te maken. Mocht u er niet uitkomen dan roept u maar.
            </p>
            <div class="content">
                @include ('partials.getting-started')
            </div>
        </div>
@endsection
