<header class="site-header" data-navbar>
    <nav class="site-nav" id="header-nav" aria-label="Navigation principale">
        <a href="{{ route('home') }}" class="nav-brand" aria-label="Accueil - La Jeunesse Aubinoise">
            <img src="{{ asset('images/brand/logo-jeunesse-aubinoise-2025.jpg') }}" alt="Logo de La Jeunesse Aubinoise">
            <span>La Jeunesse Aubinoise</span>
        </a>

        <button class="burger" type="button" aria-label="Ouvrir le menu" aria-controls="main-navigation" aria-expanded="false" data-menu-button>
            <span></span>
            <span></span>
            <span></span>
        </button>

        <ul class="nav-links" id="main-navigation" data-menu>
            <li><a href="{{ route('home') }}" @class(['active' => request()->routeIs('home')])>Accueil</a></li>
            <li><a href="{{ route('safari') }}" @class(['active' => request()->routeIs('safari')])>Safari</a></li>
            <li><a href="{{ route('storm') }}" @class(['active' => request()->routeIs('storm')])>Storm</a></li>
            <li><a href="{{ route('programme') }}" @class(['active' => request()->routeIs('programme')])>Programme</a></li>
            <li><a href="{{ route('galerie') }}" @class(['active' => request()->routeIs('galerie')])>Galerie</a></li>
            <li><a href="{{ route('contact') }}" @class(['active' => request()->routeIs('contact')])>Contact</a></li>
            <li><a href="{{ route('login') }}" class="nav-login-mobile">Connexion</a></li>
        </ul>
    </nav>
</header>
