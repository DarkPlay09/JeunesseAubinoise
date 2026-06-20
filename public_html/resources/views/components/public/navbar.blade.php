<header class="public-navbar-wrapper">
    <nav class="public-navbar" aria-label="Navigation principale">
        <a href="{{ route('home') }}" class="public-navbar__brand">
            <img
                src="{{ asset('images/logo/logo_jeunesse_aubinoise.jpg') }}"
                alt="Logo de La Jeunesse Aubinoise"
                class="public-navbar__logo"
            >
            <span>La Jeunesse Aubinoise</span>
        </a>

        <div class="public-navbar__links">
            <a class="public-navbar__link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Accueil</a>
            <a class="public-navbar__link {{ request()->routeIs('safari') ? 'active' : '' }}" href="{{ route('safari') }}">Safari</a>
            <a class="public-navbar__link {{ request()->routeIs('storm') ? 'active' : '' }}" href="{{ route('storm') }}">Storm</a>
            <a class="public-navbar__link {{ request()->routeIs('programme') ? 'active' : '' }}" href="{{ route('programme') }}">Programme</a>
            <a class="public-navbar__link {{ request()->routeIs('galerie') ? 'active' : '' }}" href="{{ route('galerie') }}">Galerie</a>
            <a class="public-navbar__link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contact</a>
        </div>

        <a href="{{ route('login') }}" class="public-navbar__login">Connexion</a>

        <button class="public-navbar__burger" type="button" aria-label="Ouvrir le menu" aria-expanded="false" data-mobile-menu-button>
            <span></span>
        </button>

        <div class="public-navbar__mobile" data-mobile-menu>
            <a class="public-navbar__link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Accueil</a>
            <a class="public-navbar__link {{ request()->routeIs('safari') ? 'active' : '' }}" href="{{ route('safari') }}">Safari</a>
            <a class="public-navbar__link {{ request()->routeIs('storm') ? 'active' : '' }}" href="{{ route('storm') }}">Storm</a>
            <a class="public-navbar__link {{ request()->routeIs('programme') ? 'active' : '' }}" href="{{ route('programme') }}">Programme</a>
            <a class="public-navbar__link {{ request()->routeIs('galerie') ? 'active' : '' }}" href="{{ route('galerie') }}">Galerie</a>
            <a class="public-navbar__link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contact</a>
            <a href="{{ route('login') }}" class="public-navbar__login">Connexion</a>
        </div>
    </nav>
</header>
