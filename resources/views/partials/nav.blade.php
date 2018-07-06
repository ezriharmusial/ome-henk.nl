<nav class="navbar is-primary">
                <div class="container">
                    <!-- Hidden Checkbox hack trigger for Pure CSS toggle -->
                    <input type="checkbox" id="menu-toggle" class="is-hidden"/>
                    <div class="navbar-brand">
                        <a href="/" class="navbar-item">
                            <img src="/images/ome-henk.nl-wide-white.png" alt="Logo">
                        </a>

                        <label for="menu-toggle" class="nav-toggle navbar-burger">
                            <span></span>
                            <span></span>
                            <span></span>
                        </label>
                    </div>
                    <div id="navbarMenuHeroC" class="navbar-menu nav-menu">
                        <div class="navbar-end">
                            @guest
                            <a href="{{ route('login') }}" class="navbar-item">
                                <span class="icon is-medium">
                                    <i class="fa fa-sign-in"></i>
                                </span>
                                <span>Aanmelden</span>
                            </a>
                            <span class="navbar-item">
                                <a href="{{ route('register') }}" class="button is-primary is-inverted">
                                    <span class="icon is-medium">
                                        <i class="fa fa-user-plus"></i>
                                    </span>
                                    <span>Inschrijven</span>
                                </a>
                            </span>
                            @else
                            <div class="navbar-item has-dropdown is-hoverable">
                                <a class="navbar-link">
                                    <span class="icon is-medium">
                                        <i class="fa fa-user-circle"></i>
                                    </span>
                                    <span>Welkom, {{ Auth::user()->name }}</span>
                                </a>

                                <div class="navbar-dropdown">
                                    <a class="navbar-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                        <span class="icon is-medium">
                                            <i class="fa fa-sign-out"></i>
                                        </span>
                                        <span>{{ __('Afmelden') }}</span>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                                </div>
                            </div>
@endguest
                        </div>
                    </div>
                </div>
            </nav>
