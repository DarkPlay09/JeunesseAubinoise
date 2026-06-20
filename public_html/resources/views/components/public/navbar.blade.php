@php
    $links = [
        ['label' => 'Accueil', 'route' => 'home'],
        ['label' => 'Safari', 'route' => 'safari'],
        ['label' => 'Storm', 'route' => 'storm'],
        ['label' => 'Programme', 'route' => 'programme'],
        ['label' => 'Galerie', 'route' => 'gallery'],
        ['label' => 'Contact', 'route' => 'contact'],
    ];
@endphp

<header class="sticky top-0 z-50 border-b border-outline-variant bg-surface/95 backdrop-blur-md">
    <nav class="ja-container flex items-center justify-between py-4" aria-label="Navigation principale">
        <a href="{{ route('home') }}" class="flex items-center gap-4" aria-label="Retour à l'accueil">
            <img
                src="{{ asset('images/logo/jeunesse-aubinoise-logo.png') }}"
                alt="Logo La Jeunesse Aubinoise"
                class="h-12 w-12 object-contain"
            >
            <span class="hidden font-display text-xl font-extrabold text-storm-blue md:block">
                La Jeunesse Aubinoise
            </span>
        </a>

        <div class="hidden items-center gap-7 lg:flex">
            @foreach ($links as $link)
                <a
                    href="{{ route($link['route']) }}"
                    @class([
                        'text-sm font-semibold uppercase tracking-[0.08em] transition-colors hover:text-primary',
                        'text-primary' => request()->routeIs($link['route']),
                        'text-secondary' => ! request()->routeIs($link['route']),
                    ])
                >
                    {{ $link['label'] }}
                </a>
            @endforeach
        </div>

        <div class="hidden items-center gap-3 lg:flex">
            @auth
                <a href="{{ url('/dashboard') }}" class="ja-button-primary px-6 py-2.5">
                    Dashboard
                </a>
            @else
                <a href="{{ url('/login') }}" class="ja-button-primary px-6 py-2.5">
                    Connexion
                </a>
            @endauth
        </div>

        <button
            type="button"
            class="inline-flex h-11 w-11 items-center justify-center rounded-full border border-outline-variant text-on-background lg:hidden"
            aria-label="Ouvrir le menu"
            aria-expanded="false"
            data-mobile-menu-button
        >
            <span class="material-symbols-outlined">menu</span>
        </button>
    </nav>

    <div class="hidden border-t border-outline-variant bg-surface lg:hidden" data-mobile-menu>
        <div class="ja-container flex flex-col gap-1 py-4">
            @foreach ($links as $link)
                <a
                    href="{{ route($link['route']) }}"
                    class="rounded-xl px-4 py-3 text-sm font-semibold uppercase tracking-[0.08em] text-secondary transition hover:bg-surface-container hover:text-primary"
                >
                    {{ $link['label'] }}
                </a>
            @endforeach

            @auth
                <a href="{{ url('/dashboard') }}" class="mt-3 ja-button-primary w-full">
                    Dashboard
                </a>
            @else
                <a href="{{ url('/login') }}" class="mt-3 ja-button-primary w-full">
                    Connexion
                </a>
            @endauth
        </div>
    </div>
</header>
