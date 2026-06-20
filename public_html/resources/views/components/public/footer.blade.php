<footer class="ja-footer">
    <section class="ja-footer__bloc">
        <img
            src="{{ asset('images/logo/logo_jeunesse_aubinoise.jpg') }}"
            alt="Logo de La Jeunesse Aubinoise"
            class="ja-footer__logo"
        >

        <div class="ja-footer__navigation">
            <h3 class="ja-footer__title">Navigation</h3>
            <ul class="ja-footer__list">
                <li><a href="{{ route('home') }}" class="ja-footer__link">Accueil</a></li>
                <li><a href="{{ route('safari') }}" class="ja-footer__link">Safari</a></li>
                <li><a href="{{ route('storm') }}" class="ja-footer__link">Storm</a></li>
                <li><a href="{{ route('galerie') }}" class="ja-footer__link">Galerie</a></li>
                <li><a href="{{ route('contact') }}" class="ja-footer__link">Contact</a></li>
            </ul>
        </div>

        <div class="ja-footer__socials">
            <h3 class="ja-footer__title">Socials</h3>
            <ul class="ja-footer__list">
                <li><a href="https://www.facebook.com/jeunesse.aubinoise" target="_blank" rel="noopener noreferrer" class="ja-footer__link">Facebook</a></li>
                <li><a href="https://www.instagram.com/jeunesse_aubinoise" target="_blank" rel="noopener noreferrer" class="ja-footer__link">Instagram</a></li>
                <li><a href="https://www.tiktok.com/@jeunesse_aubinoise" target="_blank" rel="noopener noreferrer" class="ja-footer__link">Tik Tok</a></li>
            </ul>
        </div>
    </section>

    <hr class="ja-footer__separator">

    <pclass="ja-footer__copyright">
        © jeunesseaubinoise
    </p>
</footer>
