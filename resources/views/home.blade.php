@extends('layouts.master')

@section('content')
        <div class="column">
            <h3 class="title">
                <span class="icon is-large">
                    <i class="fa fa-dashboard"></i>
                </span>
                <span>Dashboard</span>
            </h3>
            <div class="content">
                <div class="subtitle">Welkom op uw eigen website Ome Henk!</div>
                <p> Dit is <b>Versie 1.0</b> van de website. Deze versie van de website is bedoeld om u bekend te maken met het gebruik van een website door <b>"Content"</b> of inhoud te creëren. Door het te gebruiken komen we er ook achter wat uw behoefte zijn als Gebruiker met "Arbeidershanden" ;-) en een verminderd zicht. Met de tijd zal de <b>"Interface"</b>, het uiterlijk Schilletje, in overleg veranderen naar uw wensen. Maar U blijft verantwoordelijk voor de <b>Content</b>.
                Ik heb geprobeerd om de site zo duidelijk mogelijk te maken. Mocht u er niet uitkomen dan roept u maar.
                </p>
                @if (is_null(\App\Page::first()) )
                <div class="subtitle">Direct aan de slag</div>
                <p>Laten we direct aan de slag gaan, door uw <b>Allereerste Pagina</b> te maken. Het groene vlak bovenaan een Pagina heet een <b>"Header"</b>. Boven in de Header vindt u de knop om uw Pagina's aan te maken. Deze knop is <b>aleen zichtbaar</b> voor u als beheerder en ziet er als volgt uit:</p>
                <div class="box">
                    <div class="bd-callout is-primary tabs is-boxed is-fullwidth is-centered">
                        <ul>
                            <li>
                                <a>
                                <span class="icon is-small">
                                    <i class="fa fa-plus"></i>
                                </span>
                                <span>Nieuwe Pagina</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <p><small><em>Knop om Pagina's aan te maken.</em></small></p>
                </div>
                <p>Zodra u een pagina heeft aangemaakt, verschijnt er een knop in de vorm van een "Tabblad" naast pagina aanmaken, waarmee de bezoekers uw website door kunnen bladeren. Zo bouwt u de <b>"Site Navigatie"</b> op.</p>

                <div class="box">
                    <div class="bd-callout is-primary tabs is-boxed is-fullwidth is-centered">
                        <ul>
                            <li>
                                <a>
                                    <span class="icon">
                                        <i class="fa fa-user-circle"></i>
                                    </span>
                                    <span>Vraag het Ome Henk</span>
                                </a>
                            </li>
                            <li class="is-active">
                                <a>
                                    <span class="icon">
                                        <i class="fa fa-binoculars"></i>
                                    </span>
                                    <span>Uit de Natuur</span>
                                </a>
                            </li>
                            <li>
                                <a>
                                    <span class="icon">
                                        <i class="fa fa-cutlery"></i>
                                    </span>
                                    <span>Eet & Drink</span>
                                </a>
                            </li>
                            <li>
                                <a>
                                    <span class="icon">
                                        <i class="fa fa-shopping-basket"></i>
                                    </span>
                                    <span>Webshop</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <p><small><em>Voorbeeld van Site Navigatie, gezien door bezoekers.</em></small></p>
                </div>
                <p>Druk maar op de knop om uw Eerste pagina aan te maken.</p>
                @endif
            </div>
        </div>
@endsection
