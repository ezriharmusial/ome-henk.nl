<header class="banner">
          <nav class="navbar is-primary" role="navigation" aria-label="main navigation">
            <!-- Hidden Checkbox hack trigger for Pure CSS toggle -->
            <input type="checkbox" id="menu-toggle" class="is-hidden"/>

            <div class="navbar-brand">
              <a class="navbar-item has-text-weight-bold is-italic has-text-shadow is-size-5" href="{{ home_url('/') }}">
                <img src="@asset('images/logo-36x36.png')" alt="Stichting ArtKids Foundation: Funding Happiness" width="30" height="30">
                <span class="artkids has-text-danger">ArtKids</span><span class="foundation has-text-secondary">Foundation</span>
              </a>

              <label for="menu-toggle" class="nav-toggle navbar-burger">
                <span></span>
                <span></span>
                <span></span>
              </label>
            </div>

            <div class="navbar-menu nav-menu">
              <div class="navbar-end">
                @if (has_nav_menu('primary_navigation')){!! wp_nav_menu([
                  'theme_location' => 'primary_navigation',
                  'depth' => 2,
                  'container' => false,
                  'items_wrap' => '%3$s',
                  'after' => "</div>",
                  'walker' => new bulma_navwalker()
                ]) !!} @endif
                <a class="navbar-item" href="https://www.facebook.com/ArtKidsFoundation/?fref=ts" target="_blank" title="Onze Facebook pagina"><i class="fa fa-facebook-official fa-lg"> </i> <span class="is-hidden-desktop is-hidden-widescreen is-hidden-fullhd">Our Facebook page</span></a>
                <a class="navbar-item" href="https://twitter.com/ArtKids?lang=en" id="gh" target="_blank" title="Onze Twitter pagina"><i class="fa fa-twitter fa-lg"> </i> <span class="is-hidden-desktop is-hidden-widescreen is-hidden-fullhd">Our Twitter Page</span></a>
                <div class="navbar-item">
                  <div class="field is-grouped">
                    <div class="control">
                       <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
                        <input type="hidden" name="cmd" value="_s-xclick">
                        <input type="hidden" name="hosted_button_id" value="ZJFP4YQFC4LFL">
                        <input type="image" src="https://www.paypalobjects.com/en_US/NL/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!" class="is-hidden-touch is-hidden-desktop">
                        <button type="submit" class="button has-text-bold is-secondary is-full-touch" alt="PayPal - The safer, easier way to pay online!">
                          <i class="fa fa-paypal"> </i> DONATE
                        </button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </nav>
        </header>
