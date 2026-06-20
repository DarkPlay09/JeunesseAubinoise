<x-layouts.public
    title="La Jeunesse Aubinoise - L'esprit de fête local"
    description="Découvrez La Jeunesse Aubinoise, Safari Party, Storm Festival, le programme et la galerie des événements."
>
    <section class="relative flex min-h-[82vh] items-center overflow-hidden bg-safari-dark">
        <img
            src="{{ asset('images/home/hero-party.jpg') }}"
            alt="Foule en fête sous un chapiteau pendant un événement de La Jeunesse Aubinoise"
            class="absolute inset-0 h-full w-full object-cover object-center opacity-70"
        >
        <span class="absolute inset-0 bg-gradient-to-r from-safari-dark via-safari-dark/85 to-safari-dark/45"></span>

        <div class="ja-container relative z-10 grid items-center gap-12 py-20 lg:grid-cols-[1fr_320px]">
            <div class="max-w-4xl text-center lg:text-left">
                <p class="ja-label text-storm-blue">Jeunesse Aubinoise</p>

                <h1 class="ja-heading-xl mt-5 text-white">
                    L'esprit de <br>
                    <span class="text-storm-blue">fête local.</span>
                </h1>

                <p class="mx-auto mt-7 max-w-2xl text-lg leading-8 text-surface-variant lg:mx-0">
                    Nous organisons les événements les plus mémorables de la région. De la légendaire Safari à l'électrisante Storm, rejoignez-nous pour des soirées inoubliables.
                </p>

                <div class="mt-10 flex flex-wrap items-center justify-center gap-4 lg:justify-start">
                    <a href="{{ route('programme') }}" class="ja-button-primary">
                        Voir le programme
                        <span class="material-symbols-outlined text-xl">calendar_month</span>
                    </a>
                    <a href="{{ route('safari') }}" class="ja-button-outline-light">Voir Safari</a>
                    <a href="{{ route('storm') }}" class="ja-button-outline-light">Voir Storm</a>
                </div>
            </div>

            <div class="hidden flex-col gap-6 lg:flex">
                <div class="rounded-3xl border border-white/20 bg-white/10 p-6 text-white backdrop-blur-md">
                    <p class="font-display text-4xl font-extrabold">2</p>
                    <p class="ja-label mt-2 text-surface-variant">Événements majeurs</p>
                </div>
                <div class="rounded-3xl border border-white/20 bg-white/10 p-6 text-white backdrop-blur-md">
                    <p class="font-display text-4xl font-extrabold">+2000</p>
                    <p class="ja-label mt-2 text-surface-variant">Participants annuels</p>
                </div>
            </div>
        </div>
    </section>

    <section class="ja-section">
        <div class="ja-container">
            <div class="mb-12 max-w-3xl md:mb-16">
                <p class="ja-label text-storm-blue">Nos concepts</p>
                <h2 class="ja-heading-lg mt-4 text-on-background">Nos soirées signatures</h2>
                <p class="mt-4 text-lg leading-8 text-secondary">
                    Découvrez nos deux univers qui rythment l'année : une ambiance sauvage avec Safari, une énergie électrique avec Storm.
                </p>
            </div>

            <div class="grid gap-gutter md:grid-cols-2">
                <x-public.event-card
                    title="Safari Party"
                    label="Concept Jungle"
                    description="L'événement le plus sauvage de l'année. Une immersion totale dans un décor tropical avec une ambiance survoltée."
                    :image="asset('images/home/safari-party.jpg')"
                    :href="route('safari')"
                    variant="safari"
                />

                <x-public.event-card
                    title="Storm Festival"
                    label="Concept Électro"
                    description="Une tempête de son et de lumière. Notre format DJ set pour les amateurs de grosses basses et de scénographie intense."
                    :image="asset('images/home/storm-festival.jpg')"
                    :href="route('storm')"
                    variant="storm"
                />
            </div>
        </div>
    </section>

    <section class="ja-section bg-surface-muted">
        <div class="ja-container">
            <div class="mb-12 flex flex-col justify-between gap-6 md:flex-row md:items-end">
                <div>
                    <p class="ja-label text-storm-blue">Souvenirs</p>
                    <h2 class="ja-heading-lg mt-4 text-on-background">Galerie</h2>
                    <p class="mt-4 max-w-2xl text-lg leading-8 text-secondary">
                        Revivez l'ambiance de nos précédentes éditions à travers quelques moments forts.
                    </p>
                </div>

                <a href="{{ route('gallery') }}" class="hidden items-center gap-2 text-sm font-bold uppercase tracking-[0.1em] text-storm-blue transition hover:text-primary md:inline-flex">
                    Voir toutes les photos
                    <span class="material-symbols-outlined">arrow_forward</span>
                </a>
            </div>

            <div class="grid auto-rows-[170px] grid-cols-2 gap-4 md:auto-rows-[210px] md:grid-cols-4">
                <a href="{{ route('gallery') }}" class="group col-span-2 row-span-2 overflow-hidden rounded-3xl bg-safari-dark">
                    <img src="{{ asset('images/home/gallery-main.jpg') }}" alt="Participants costumés pendant une soirée" class="h-full w-full object-cover transition duration-500 group-hover:scale-105">
                </a>
                <a href="{{ route('gallery') }}" class="group overflow-hidden rounded-3xl bg-safari-dark">
                    <img src="{{ asset('images/home/gallery-dj.jpg') }}" alt="Table de mixage DJ" class="h-full w-full object-cover transition duration-500 group-hover:scale-105">
                </a>
                <a href="{{ route('gallery') }}" class="group overflow-hidden rounded-3xl bg-safari-dark">
                    <img src="{{ asset('images/home/gallery-crowd.jpg') }}" alt="Foule devant la scène" class="h-full w-full object-cover transition duration-500 group-hover:scale-105">
                </a>
                <a href="{{ route('gallery') }}" class="group col-span-2 overflow-hidden rounded-3xl bg-safari-dark">
                    <img src="{{ asset('images/home/gallery-tent.jpg') }}" alt="Chapiteau de soirée" class="h-full w-full object-cover transition duration-500 group-hover:scale-105">
                </a>
            </div>

            <a href="{{ route('gallery') }}" class="mt-8 inline-flex w-full items-center justify-center gap-2 rounded-full border border-storm-blue px-6 py-3 text-sm font-bold uppercase tracking-[0.1em] text-storm-blue transition hover:bg-storm-blue hover:text-white md:hidden">
                Voir toutes les photos
                <span class="material-symbols-outlined">arrow_forward</span>
            </a>
        </div>
    </section>
</x-layouts.public>
