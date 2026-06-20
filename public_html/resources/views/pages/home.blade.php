@extends('layouts.public')

@section('title', "La Jeunesse Aubinoise - L'esprit de fête local")
@section('description', "Découvrez La Jeunesse Aubinoise, Safari Party, Storm Festival, le programme et la galerie des événements.")

@section('content')
    <header class="relative flex min-h-[92vh] w-full items-center justify-center overflow-hidden bg-safari-dark">
        <div class="absolute inset-0 z-0">
            <div class="absolute inset-0 z-10 bg-gradient-to-r from-safari-dark/90 to-safari-dark/60"></div>
            <img
                alt="Grande foule dans une soirée locale sous chapiteau avec lumières bleues et violettes."
                class="h-full w-full object-cover object-center opacity-80"
                src="{{ asset('images/home/hero.jpg') }}"
            >
        </div>

        <div class="relative z-20 mx-auto flex w-full max-w-container-max flex-col items-start gap-12 px-margin-mobile pt-24 text-left md:px-margin-desktop">
            <div class="max-w-3xl space-y-8">
                <h1 class="max-w-3xl font-display-lg text-display-lg leading-tight text-white">
                    L'esprit de <br>
                    <span class="text-storm-blue">fête local.</span>
                </h1>

                <p class="max-w-xl font-body-lg text-body-lg text-surface-variant">
                    Nous organisons les événements les plus mémorables de la région. De la légendaire Safari à l'électrisante Storm, rejoignez-nous pour des soirées inoubliables.
                </p>

                <div class="flex flex-wrap items-center gap-4 pt-4">
                    <a href="{{ route('programme') }}" class="flex items-center gap-2 rounded-full bg-storm-blue px-8 py-4 font-label-lg text-label-lg text-white shadow-lg transition-transform hover:-translate-y-1 hover:bg-primary">
                        Voir le programme
                        <span class="material-symbols-outlined text-xl">calendar_month</span>
                    </a>

                    <a href="{{ route('safari') }}" class="rounded-full border-2 border-white bg-transparent px-8 py-4 font-label-lg text-label-lg text-white transition-colors hover:bg-white/10">
                        Voir Safari
                    </a>

                    <a href="{{ route('storm') }}" class="rounded-full border-2 border-white bg-transparent px-8 py-4 font-label-lg text-label-lg text-white transition-colors hover:bg-white/10">
                        Voir Storm
                    </a>
                </div>
            </div>
        </div>
    </header>

    <section class="mx-auto max-w-container-max px-margin-mobile py-24 md:px-margin-desktop">
        <div class="mb-16">
            <h2 class="mb-4 font-headline-lg text-headline-lg text-on-background">Nos soirées signatures</h2>
            <p class="max-w-2xl font-body-lg text-body-lg text-secondary">
                Découvrez nos deux concepts uniques qui rythment l'année.
            </p>
        </div>

        <div class="grid grid-cols-1 gap-gutter md:grid-cols-2">
            <article class="group relative flex min-h-[500px] cursor-pointer items-end overflow-hidden rounded-[24px]">
                <div class="absolute inset-0 bg-safari-dark">
                    <img
                        class="h-full w-full object-cover opacity-60 transition-transform duration-700 group-hover:scale-105"
                        alt="Ambiance de soirée Safari avec décor jungle et lumières chaudes."
                        src="">
                </div>
                <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-transparent"></div>

                <div class="relative z-10 w-full p-10">
                    <div class="mb-6 inline-block rounded-full bg-white px-4 py-1.5 font-label-sm text-label-sm font-bold uppercase tracking-wider text-black">
                        Concept Jungle
                    </div>
                    <h3 class="mb-3 font-headline-lg text-headline-lg text-white">Safari Party</h3>
                    <p class="mb-8 max-w-md font-body-md text-body-md text-surface-variant">
                        L'événement le plus sauvage de l'année. Une immersion totale dans un décor tropical avec une ambiance survoltée.
                    </p>
                    <a href="{{ route('safari') }}" class="flex items-center gap-2 font-label-lg text-white transition-colors group-hover:text-storm-blue">
                        En savoir plus
                        <span class="material-symbols-outlined transition-transform group-hover:translate-x-2">arrow_forward</span>
                    </a>
                </div>
            </article>

            <article class="group relative flex min-h-[500px] cursor-pointer items-end overflow-hidden rounded-[24px]">
                <div class="absolute inset-0 bg-black">
                    <img
                        alt="Visuel sombre Storm Festival avec texte bleu électrique."
                        class="h-full w-full object-cover opacity-70 transition-transform duration-700 group-hover:scale-105"
                        src="">
                </div>
                <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-transparent"></div>

                <div class="relative z-10 w-full p-10">
                    <div class="mb-6 inline-block rounded-full bg-storm-blue px-4 py-1.5 font-label-sm text-label-sm font-bold uppercase tracking-wider text-white">
                        Concept Électro
                    </div>
                    <h3 class="mb-3 font-headline-lg text-headline-lg text-white">Storm Festival</h3>
                    <p class="mb-8 max-w-md font-body-md text-body-md text-surface-variant">
                        Une tempête de son et de lumière. Notre format 100% DJ set pour les amateurs de grosses basses.
                    </p>
                    <a href="{{ route('storm') }}" class="flex items-center gap-2 font-label-lg text-white transition-colors group-hover:text-storm-blue">
                        En savoir plus
                        <span class="material-symbols-outlined transition-transform group-hover:translate-x-2">arrow_forward</span>
                    </a>
                </div>
            </article>
        </div>
    </section>

    <section class="mx-auto max-w-container-max px-margin-mobile py-24 md:px-margin-desktop">
        <div class="mb-12 flex items-end justify-between">
            <div>
                <h2 class="mb-2 font-headline-md text-headline-lg text-on-background">Galerie</h2>
                <p class="font-body-lg text-body-lg text-secondary">Revivez l'ambiance de nos précédentes éditions.</p>
            </div>

            <a href="{{ route('galerie') }}" class="hidden items-center gap-2 font-label-lg text-storm-blue transition-colors hover:text-primary md:flex">
                Voir toutes les photos
                <span class="material-symbols-outlined">arrow_forward</span>
            </a>
        </div>

        <div class="grid auto-rows-[200px] grid-cols-2 gap-4 md:grid-cols-4">
            <div class="col-span-2 row-span-2 overflow-hidden rounded-2xl">
                <img
                    alt="Jeunes déguisés devant un DJ booth pendant une soirée."
                    class="h-full w-full object-cover transition-transform duration-500 hover:scale-105"
                    src="">
            </div>

            <div class="overflow-hidden rounded-2xl">
                <img
                    alt="Table de mixage de DJ avec lumières colorées."
                    class="h-full w-full object-cover transition-transform duration-500 hover:scale-105"
                    src="">
            </div>

            <div class="overflow-hidden rounded-2xl">
                <img
                    alt="Foule dansante avec lumières de scène."
                    class="h-full w-full object-cover transition-transform duration-500 hover:scale-105"
                    src="">
            </div>

            <div class="col-span-2 overflow-hidden rounded-2xl">
                <img
                    alt="Grand chapiteau événementiel éclairé de nuit."
                    class="h-full w-full object-cover transition-transform duration-500 hover:scale-105"
                    src="">
            </div>
        </div>

        <a href="{{ route('galerie') }}" class="mt-8 flex w-full items-center justify-center gap-2 rounded-full border border-storm-blue py-3 font-label-lg text-storm-blue md:hidden">
            Voir toutes les photos
        </a>
    </section>
@endsection
