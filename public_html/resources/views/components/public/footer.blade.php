<footer class="site-footer">
    <div class="footer-bloc">
        <a href="{{ route('home') }}" class="footer-logo" aria-label="Retour à l'accueil">
            <img src="{{ asset('images/brand/logo-jeunesse-aubinoise-2025.jpg') }}" alt="Logo de La Jeunesse Aubinoise">
        </a>

        <section class="navigation" aria-labelledby="footer-navigation-title">
            <h3 id="footer-navigation-title">Navigation</h3>
            <ul>
                <li><a href="{{ route('home') }}">Accueil</a></li>
                <li><a href="{{ route('safari') }}">Safari</a></li>
                <li><a href="{{ route('storm') }}">Storm</a></li>
                <li><a href="{{ route('galerie') }}">Galerie</a></li>
                <li><a href="{{ route('a-propos') }}">À propos</a></li>
                <li><a href="{{ route('contact') }}">Contact</a></li>
            </ul>
        </section>

        <section class="socials" aria-labelledby="footer-socials-title">
            <h3 id="footer-socials-title">Socials</h3>
            <ul>
                <li><a href="#" target="_blank" rel="noopener">Facebook</a></li>
                <li><a href="#" target="_blank" rel="noopener">Instagram</a></li>
                <li><a href="#" target="_blank" rel="noopener">Tik Tok</a></li>
            </ul>
        </section>
    </div>

    <hr>
    <p class="footer-copy">© jeunesseaubin</p>
</footer>
