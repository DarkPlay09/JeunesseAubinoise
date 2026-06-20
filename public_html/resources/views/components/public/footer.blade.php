<footer class="bg-inverse-surface py-16 text-white">
    <div class="ja-container grid gap-12 md:grid-cols-[1.3fr_0.8fr_0.8fr]">
        <div class="max-w-md">
            <p class="font-display text-2xl font-black">La Jeunesse Aubinoise</p>
            <p class="mt-5 text-base leading-7 text-surface-variant/70">
                L'organisation de jeunesse dédiée à créer les meilleures expériences festives locales.
            </p>

            <div class="mt-7 flex gap-4">
                <a href="#" class="flex h-10 w-10 items-center justify-center rounded-full bg-white/10 transition hover:bg-storm-blue" aria-label="Instagram">
                    <span class="material-symbols-outlined">photo_camera</span>
                </a>
                <a href="#" class="flex h-10 w-10 items-center justify-center rounded-full bg-white/10 transition hover:bg-storm-blue" aria-label="Facebook">
                    <span class="material-symbols-outlined">thumb_up</span>
                </a>
            </div>
        </div>

        <div>
            <h2 class="ja-label text-white">Navigation</h2>
            <div class="mt-5 flex flex-col gap-3 text-sm font-semibold text-surface-variant/70">
                <a href="{{ route('safari') }}" class="transition hover:text-white">Safari</a>
                <a href="{{ route('storm') }}" class="transition hover:text-white">Storm</a>
                <a href="{{ route('programme') }}" class="transition hover:text-white">Programme</a>
                <a href="{{ route('gallery') }}" class="transition hover:text-white">Galerie</a>
                <a href="{{ route('contact') }}" class="transition hover:text-white">Contact</a>
            </div>
        </div>

        <div>
            <h2 class="ja-label text-white">Informations</h2>
            <div class="mt-5 flex flex-col gap-3 text-sm font-semibold text-surface-variant/70">
                <a href="#" class="transition hover:text-white">Mentions légales</a>
                <a href="#" class="transition hover:text-white">Conditions générales</a>
                <a href="#" class="transition hover:text-white">Confidentialité</a>
                <a href="#" class="transition hover:text-white">FAQ</a>
            </div>
        </div>
    </div>

    <div class="ja-container mt-12 border-t border-white/10 pt-6">
        <p class="text-sm text-surface-variant/50">
            © {{ date('Y') }} La Jeunesse Aubinoise. Tous droits réservés.
        </p>
    </div>
</footer>
