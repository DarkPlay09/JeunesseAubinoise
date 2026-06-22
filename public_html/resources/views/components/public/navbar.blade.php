@php
    $links = [
        ['label' => 'Accueil', 'route' => 'home'],
        ['label' => 'Safari', 'route' => 'safari'],
        ['label' => 'Storm', 'route' => 'storm'],
        ['label' => 'Programme', 'route' => 'programme'],
        ['label' => 'Galerie', 'route' => 'galerie'],
        ['label' => 'Contact', 'route' => 'contact'],
    ];

    $loginUrl = Route::has('login') ? route('login') : '#';
@endphp

<header class="public-header">
    <nav id="public-navbar" class="public-navbar" aria-label="Navigation principale">
        <a href="{{ route('home') }}" class="navbar-brand" aria-label="Retour à l'accueil">
            <img
                src="{{ asset('images/brand/logo-jeunesse-aubinoise-2025.jpg') }}"
                alt="Logo de La Jeunesse Aubinoise"
                class="navbar-brand__logo"
            >
            <span class="navbar-brand__text">La Jeunesse Aubinoise</span>
        </a>

        <button
            class="navbar-toggle"
            type="button"
            aria-label="Ouvrir le menu"
            aria-expanded="false"
            data-mobile-nav-toggle
        >
            <span></span>
            <span></span>
            <span></span>
        </button>

        <ul class="navbar-links" data-mobile-nav-menu>
            @foreach ($links as $link)
                <li>
                    <a
                        href="{{ route($link['route']) }}"
                        class="navbar-link {{ request()->routeIs($link['route']) ? 'is-active' : '' }}"
                    >
                        {{ $link['label'] }}
                    </a>
                </li>
            @endforeach

            <li class="navbar-login-item">
                <a href="{{ $loginUrl }}" class="navbar-login">
                    Connexion
                </a>
            </li>
        </ul>
    </nav>
</header>
