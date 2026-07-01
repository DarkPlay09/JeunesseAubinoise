@extends('layouts.public')

@section('title', 'Jeunesse Aubinoise | Safari')
@section('description', 'Découvrez la Safari Night de La Jeunesse Aubinoise.')
@section('body_class', 'page-party page-safari')

@section('content')
    <section class="party-hero party-hero--safari">
        <video autoplay muted loop playsinline preload="metadata" class="party-hero__media">
            <source src="{{ asset('videos/events/safari/safari-bg.mp4') }}" type="video/mp4">
        </video>

        <img
            src="{{ asset('images/events/safari/hero.jpg') }}"
            alt="Ambiance Safari Night"
            class="party-hero__fallback"
        >

        <div class="party-hero__overlay"></div>
        <div class="party-hero__grid"></div>

        <div class="party-hero__content">
            <p class="party-hero__eyebrow" data-reveal="fade-left">
                Concept Jungle
            </p>

            <h1
                class="party-hero__title party-hero__title--safari"
                data-reveal="title"
                data-reveal-delay="80"
            >
                <span>Safari</span>
                <strong>Night</strong>
            </h1>

            <div class="party-hero__meta" data-reveal="fade-left" data-reveal-delay="180">
                <span>19 septembre 2025</span>
                <span>Aubin</span>
                <span>Préventes 9€</span>
            </div>

            <div class="countdown" data-countdown="2025-09-19T21:30:00+02:00" data-reveal="fade-left" data-reveal-delay="280">
                <div class="countdown-box">
                    <strong data-days>--</strong>
                    <span>Jours</span>
                </div>

                <div class="countdown-box">
                    <strong data-hours>--</strong>
                    <span>Heures</span>
                </div>

                <div class="countdown-box">
                    <strong data-minutes>--</strong>
                    <span>Minutes</span>
                </div>

                <div class="countdown-box">
                    <strong data-seconds>--</strong>
                    <span>Secondes</span>
                </div>
            </div>
        </div>

        <a href="#safari-details" class="scroll-down-indicator" aria-label="Descendre vers les informations Safari">
            <span></span>
        </a>
    </section>

    <section id="safari-details" class="party-about">
        <article class="party-about__media" data-reveal="fade-right">
            <img src="{{ asset('images/events/safari/poster.jpg') }}" alt="Affiche Safari Night">
        </article>

        <article class="party-about__content" data-reveal="fade-left" data-reveal-delay="140">
            <p class="section-kicker">Safari Night</p>

            <h2>Safari Night 19 septembre 2025</h2>

            <p class="party-date">Ven : 21h30 - 03h00 à Aubin</p>

            <p>
                La soirée Safari est de retour à Aubin pour sa 14ᵉ édition.
                Depuis des années, elle fait parler du petit village dans toute la région
                et laisse des souvenirs incroyables à des milliers de jeunes.
            </p>

            <p>
                Une grande scène extérieure, un décor jungle géant, des déguisements,
                des cocktails exotiques et un show lumière unique : tout est réuni pour vivre une nuit à part.
            </p>

            <button class="button button-disabled" type="button">
                Billetterie bientôt disponible
            </button>
        </article>
    </section>

    <section class="lineup-section lineup-section--safari">
        <div class="lineup-section__heading" data-reveal="fade-left">
            <p class="section-kicker">Line-up</p>
            <h2>Bientôt disponible</h2>
        </div>

        <div class="safari-lineup-soon" data-reveal="zoom" data-reveal-delay="140">
            <div class="safari-lineup-soon__content">
                <span class="safari-lineup-soon__icon material-symbols-outlined">forest</span>

                <h3>Annonce à venir</h3>

                <p>
                    Le line-up de la prochaine édition Safari sera dévoilé prochainement.
                    Les artistes seront ajoutés ici dès que les confirmations seront prêtes.
                </p>
            </div>
        </div>
    </section>
@endsection
