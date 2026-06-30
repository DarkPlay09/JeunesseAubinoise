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
                src="{{ asset('images/brand/logo_jeunesse_aubinoise_2026.jpg') }}"
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
        </ul>

        <div class="navbar-actions">
            @auth
                <div class="navbar-notifications" data-dropdown>
                    <button
                        type="button"
                        class="navbar-icon-button"
                        data-dropdown-toggle
                        aria-label="Voir les notifications"
                        aria-expanded="false"
                    >
                        <span class="material-symbols-outlined">notifications</span>
                        <span class="navbar-notifications__badge" data-notifications-badge>0</span>
                    </button>

                    <div class="navbar-dropdown navbar-dropdown--notifications" data-dropdown-menu>
                        <div class="navbar-dropdown__header navbar-dropdown__header--with-action">
                            <div>
                                <strong>Notifications</strong>
                                <span>Dernières news</span>
                            </div>

                            <button
                                type="button"
                                class="navbar-notifications__clear-icon"
                                data-notifications-clear
                                aria-label="Supprimer toutes les notifications"
                                title="Supprimer toutes les notifications"
                            >
                                <span class="material-symbols-outlined">delete</span>
                            </button>
                        </div>

                        <div class="navbar-notifications__list" data-navbar-notifications-list></div>

                        <a href="{{ route('notifications.index') }}" class="navbar-dropdown__footer">
                            Voir toutes les notifications
                        </a>
                    </div>
                </div>

                <div class="navbar-profile" data-dropdown>
                    <button
                        type="button"
                        class="navbar-profile__button"
                        data-dropdown-toggle
                        aria-expanded="false"
                    >
                <span class="navbar-profile__avatar">
                    {{ strtoupper(substr(auth()->user()->first_name ?? auth()->user()->name ?? 'U', 0, 1)) }}
                </span>

                        <span class="navbar-profile__name">
                    {{ auth()->user()->first_name ?? auth()->user()->name ?? 'Mon compte' }}
                </span>

                        <span class="material-symbols-outlined">expand_more</span>
                    </button>

                    <div class="navbar-dropdown navbar-dropdown--profile" data-dropdown-menu>
                        <a
                            href="{{ route('account.tickets') }}"
                            class="navbar-dropdown__link {{ request()->routeIs('account.tickets*') ? 'is-active' : '' }}"
                        >
                            <span class="material-symbols-outlined">local_activity</span>
                            Mes tickets
                        </a>

                        <a
                            href="{{ route('account.purchases') }}"
                            class="navbar-dropdown__link {{ request()->routeIs('account.purchases') ? 'is-active' : '' }}"
                        >
                            <span class="material-symbols-outlined">receipt_long</span>
                            Mes achats
                        </a>

                        <a
                            href="{{ route('account.profile') }}"
                            class="navbar-dropdown__link {{ request()->routeIs('account.profile') ? 'is-active' : '' }}"
                        >
                            <span class="material-symbols-outlined">person</span>
                            Mon profil
                        </a>

                        <div class="navbar-dropdown__separator"></div>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <button type="submit" class="navbar-dropdown__link navbar-dropdown__link--danger">
                                <span class="material-symbols-outlined">logout</span>
                                Se déconnecter
                            </button>
                        </form>
                    </div>
                </div>
            @else
                <a href="{{ route('login') }}" class="navbar-login">
                    Connexion
                </a>
            @endauth
        </div>
    </nav>
</header>
