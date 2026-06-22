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

        <div class="party-hero__content">
            <p class="party-hero__eyebrow">Rave Party</p>

            <h1 class="party-hero__title party-hero__title--storm">
                Storm
            </h1>

            <div class="party-hero__meta">
                <span>13 septembre 2025</span>
                <span>Aubin</span>
                <span>Tickets 12€</span>
            </div>

            <div class="countdown" data-countdown="2025-09-13T22:00:00+02:00">
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
    </section>

    <section class="party-about">
        <article class="party-about__media">
            <img src="{{ asset('images/events/storm/poster.png') }}" alt="Affiche Storm Festival">
        </article>

        <article class="party-about__content">
            <p class="section-kicker">Storm Festival</p>
            <h2>Rave Party | Storm 13 septembre 2025</h2>

            <p class="party-date">Sam : 22h00 - 03h00 à Aubin</p>

            <p>
                C’est la nouveauté 2025, la soirée à ne pas manquer sur les hauteurs d’Aubin.
                La Jeunesse Aubinoise vous présente Storm, une rave party comme peu de gens savent faire.
            </p>

            <p>
                Au programme : une grosse soirée, cinq DJs d’exception et des sons techno
                jusqu’aux petites heures.
            </p>

            <button class="button button-disabled" type="button">
                Épuisé
            </button>
        </article>
    </section>

    <section class="lineup-section lineup-section--storm">
        <h2>Découvrez notre line-up</h2>

        <div class="artist-scroll" data-horizontal-scroll>
            <article class="artist-card artist-card--storm">
                <img src="{{ asset('images/artists/elipter.jpg') }}" alt="Elipter">
                <h3>Elipter</h3>
                <p>Techno, D&B, HardTechno</p>
            </article>

            <article class="artist-card artist-card--storm">
                <img src="{{ asset('images/artists/mondello.jpg') }}" alt="Mondello">
                <h3>Mondello</h3>
                <p>Hard Techno</p>
            </article>

            <article class="artist-card artist-card--storm">
                <img src="{{ asset('images/artists/furax.jpg') }}" alt="DJ Furax">
                <h3>DJ Furax</h3>
                <p>Oldschool & Jumpstyle</p>
            </article>

            <article class="artist-card artist-card--storm">
                <img src="{{ asset('images/artists/mathisb.png') }}" alt="Mathis B">
                <h3>Mathis B</h3>
                <p>Hardstyle & Rawstyle</p>
            </article>

            <article class="artist-card artist-card--storm">
                <img src="{{ asset('images/artists/nociid.jpg') }}" alt="Nociid">
                <h3>Nociid</h3>
                <p>Drum & Bass</p>
            </article>
        </div>
    </section>
@endsection
