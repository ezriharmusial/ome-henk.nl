        <nav class="tabs is-boxed is-centered">
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
                        <span>Nieuwe Pagina</span>
                    </a>
                </li>
@endif
            </ul>
        </nav>
