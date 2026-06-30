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

        <div class="party-hero__content">
            <h1 class="party-hero__title party-hero__title--safari">
                <span>Safari</span>
                <strong>Night</strong>
            </h1>

            <div class="party-hero__meta">
                <span>19 septembre 2025</span>
                <span>Aubin</span>
                <span>Préventes 9€</span>
            </div>

            <div class="countdown" data-countdown="2025-09-19T21:30:00+02:00">
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
            <img src="{{ asset('images/events/safari/poster.jpg') }}" alt="Affiche Safari Night">
        </article>

        <article class="party-about__content">
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

    <section class="lineup-section">
        <h2>Découvrez notre line-up</h2>

        <div class="artist-scroll" data-horizontal-scroll>
            <article class="artist-card">
                <img src="{{ asset('images/artists/elipter.jpg') }}" alt="Elipter">
                <h3>Elipter</h3>
            </article>

            <article class="artist-card">
                <img src="{{ asset('images/artists/sergio.jpg') }}" alt="Sergio">
                <h3>Sergio</h3>
            </article>
        </div>
    </section>
@endsection
