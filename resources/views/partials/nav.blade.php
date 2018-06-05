    <nav class="navbar">
      <div class="container">
        <!-- Hidden Checkbox hack trigger for Pure CSS toggle -->
        <input type="checkbox" id="menu-toggle" class="is-hidden"/>

        <div class="navbar-brand">
          <a href="/" class="navbar-item">
            <img src="https://bulma.io/images/bulma-type-white.png" alt="Logo">
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
                <span class="icon">
                    <i class="fas fa-sign-in-alt"></i>
                </span>
                <span>Aanmelden</span>
            </a>
            <span class="navbar-item">
              <a href="{{ route('register') }}" class="button is-success is-inverted">
                <span class="icon">
                    <i class="fas fa-user-plus"></i>
                </span>
                <span>Inschrijven</span>
              </a>
            </span>
            @else
            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link">
                    <span class="icon">
                        <i class="fas fa-user-circle"></i>
                    </span>
                    <span>Welkom, {{ Auth::user()->name }}</span>
                </a>

                <div class="navbar-dropdown">
                    <a class="navbar-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        <span class="icon">
                            <i class="fas fa-sign-out-alt"></i>
                        </span>
                        <span>{{ __('Afmelden') }}</span>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
            @endguest
          </div>
        </div>
      </div>
    </nav>
