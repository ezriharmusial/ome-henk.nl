        <nav class="tabs is-boxed is-fullwidth">
            <div class="container">
                <ul>
@foreach ($pages as $tab)

                    <li{{ (isset($page) && $tab['id'] == $page->id) ? ' class=is-active' : '' }}>
                        <a href="/{{ $tab['slug'] }}" title="{{ $tab['title'] }}: {{ $tab['subtitle'] }}">
                            <span class="icon is-small">
                                <i class="{{ $tab['title_icon'] }}"></i>
                            </span>
                            <span>{{ $tab['title'] }}</span>
                        </a>
                    </li>

@endforeach
@if (Auth::check())

                    <li{{ (Route::current()->getName() == 'pages.create') ? ' class=is-active' : '' }}>
                        <a href="{{ route('pages.create') }}">
                            <span class="icon is-small">
                                <i class="fa fa-plus"></i>
                            </span>
                            <span>Pagina Aanmaken</span>
                        </a>
                    </li>
@endif
        {{--             <li>
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
                                <i class="fa fa-screwdriver"></i>
                            </span>
                            <span>Werken is Gezond</span>
                        </a>
                    </li>
                    <li>
                        <a>
                            <span class="icon">
                                <i class="fa fa-utensils"></i>
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
                    </li>--}}
                </ul>
            </div>
        </nav>
