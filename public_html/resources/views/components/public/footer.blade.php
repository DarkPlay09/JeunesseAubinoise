@php
    $isSafari = request()->routeIs('safari');
@endphp

<footer class="public-footer {{ $isSafari ? 'public-footer--safari' : '' }}">
    <section class="footer-bloc">
        <a href="{{ route('home') }}" class="footer-logo-link" aria-label="Retour à l'accueil">
            <img
                src="{{ asset('images/brand/logo-jeunesse-aubinoise-2025.jpg') }}"
                alt="Logo de La Jeunesse Aubinoise"
                class="footer-logo"
            >
        </a>

        <div class="footer-column navigation">
            <h3>Navigation</h3>
            <ul>
                <li><a href="{{ route('home') }}">Accueil</a></li>
                <li><a href="{{ route('safari') }}">Safari</a></li>
                <li><a href="{{ route('storm') }}">Storm</a></li>
                <li><a href="{{ route('galerie') }}">Galerie</a></li>
                <li><a href="{{ route('a-propos') }}">À propos</a></li>
                <li><a href="{{ route('contact') }}">Contact</a></li>
            </ul>
        </div>

        <div class="footer-column socials">
            <h3>Socials</h3>
            <ul>
                <li>
                    <a href="https://www.facebook.com/jeunesse.aubinoise" target="_blank" rel="noopener noreferrer">
                        Facebook
                    </a>
                </li>
                <li>
                    <a href="https://www.instagram.com/jeunesse_aubinoise" target="_blank" rel="noopener noreferrer">
                        Instagram
                    </a>
                </li>
                <li>
                    <a href="https://www.tiktok.com/@jeunesse_aubinoise" target="_blank" rel="noopener noreferrer">
                        Tik Tok
                    </a>
                </li>
            </ul>
        </div>
    </section>

    <hr>

    <a href="{{ Route::has('login') ? route('login') : '#' }}" class="footer-copyright">
        © jeunesseaubin
    </a>
</footer>
