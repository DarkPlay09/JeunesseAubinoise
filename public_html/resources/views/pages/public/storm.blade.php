@extends('layouts.public')

@section('title', 'Jeunesse Aubinoise | Storm')
@section('description', 'Découvrez Storm Festival, la soirée électro de La Jeunesse Aubinoise.')
@section('body_class', 'page-party page-storm')

@section('content')
    <section class="party-hero party-hero--storm">
        <video autoplay muted loop playsinline preload="metadata" class="party-hero__media">
            <source src="{{ asset('videos/events/storm/storm-bg.mp4') }}" type="video/mp4">
        </video>

        <img
            src="{{ asset('images/events/storm/hero.jpg') }}"
            alt="Ambiance Storm Festival"
            class="party-hero__fallback"
        >

        <div class="party-hero__overlay"></div>
        <div class="party-hero__grid"></div>

        <div class="party-hero__content">
            <p class="party-hero__eyebrow" data-reveal="fade-left">
                Rave Party
            </p>

            <h1
                class="party-hero__title party-hero__title--storm"
                data-reveal="title"
                data-reveal-delay="80"
                data-storm-title="Storm"
            >
                Storm
            </h1>

            <div class="party-hero__meta" data-reveal="fade-left" data-reveal-delay="180">
                <span>12 septembre 2026</span>
                <span>Aubin</span>
                <span>Tickets 12€</span>
            </div>

            <div class="countdown" data-countdown="2026-09-12T22:00:00+02:00" data-reveal="fade-left" data-reveal-delay="280">
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

        <a href="#storm-details" class="scroll-down-indicator" aria-label="Descendre vers les informations Storm">
            <span></span>
        </a>
    </section>

    <section id="storm-details" class="party-about">
        <article class="party-about__media" data-reveal="fade-right">
            <img src="{{ asset('images/events/storm/poster.png') }}" alt="Affiche Storm Festival">
        </article>

        <article class="party-about__content" data-reveal="fade-left" data-reveal-delay="140">
            <p class="section-kicker">Storm Festival</p>

            <h2>Rave Party | Storm 13 septembre 2026</h2>

            <p class="party-date">Samedi : 22h00 - 03h00 à Aubin</p>

            <p>
                C’est la soirée électro de La Jeunesse Aubinoise.
                Une ambiance plus sombre, plus intense, avec une sélection DJ pensée pour faire monter la pression toute la nuit.
            </p>

            <p>
                Au programme : une grosse soirée, plusieurs DJs et une scénographie lumineuse dans l’esprit Storm.
            </p>

            <button class="button button-disabled" type="button">
                Billetterie bientôt disponible
            </button>
        </article>
    </section>

    <section class="lineup-section lineup-section--storm">
        <div class="lineup-section__heading" data-reveal="fade-left">
            <p class="section-kicker">Line-up</p>
            <h2>Bientôt disponible</h2>
        </div>

        <div class="storm-lineup-soon" data-reveal="zoom" data-reveal-delay="140">
            <div class="storm-lineup-soon__content">
                <span class="storm-lineup-soon__icon material-symbols-outlined">bolt</span>

                <h3>Annonce à venir</h3>

                <p>
                    Le line-up de la prochaine édition STORM sera dévoilé prochainement.
                    Les artistes seront ajoutés ici dès que les confirmations seront prêtes.
                </p>
            </div>
        </div>
    </section>
@endsection
