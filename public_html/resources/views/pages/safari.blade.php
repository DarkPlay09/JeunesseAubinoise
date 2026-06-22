@extends('layouts.public')

@section('title', 'Jeunesse Aubinoise | Safari')
@section('description', 'Safari Night à Aubin : soirée jungle, décor tropical, line-up et informations pratiques.')
@section('bodyClass', 'page-event page-safari')

@section('content')
    <section class="party-hero party-hero--safari" style="--hero-image: url('{{ asset('images/events/safari/hero.jpg') }}');">
        <video autoplay muted loop playsinline preload="metadata" class="party-hero__media">
            <source src="{{ asset('videos/events/safari/safari-bg.mp4') }}" type="video/mp4">
        </video>
        <div class="party-hero__overlay"></div>

        <div class="party-hero__content">
            <h1 class="safari-title-wrap">
                <span class="safari-title">Safari</span>
                <span class="night-container">
                    <span class="night">Night</span>
                    <span class="edition">14th edition</span>
                </span>
            </h1>

            <div class="party-meta">
                <span>19 septembre 2025</span>
                <span>Aubin</span>
                <span>Préventes 9€</span>
            </div>

            <div class="countdown" data-countdown="2025-09-19T21:30:00">
                <div class="box"><h2 data-days>--</h2><span>Jours</span></div>
                <div class="box"><h2 data-hours>--</h2><span>Heures</span></div>
                <div class="box"><h2 data-minutes>--</h2><span>Minutes</span></div>
                <div class="box"><h2 data-seconds>--</h2><span>Secondes</span></div>
            </div>
        </div>
    </section>

    <section class="event-about">
        <article class="event-media-card">
            <img src="{{ asset('images/events/safari/poster.jpg') }}" alt="Affiche Safari Night">
        </article>
        <article class="event-text-card">
            <p class="eyebrow">Safari Night</p>
            <h2>Safari Night 19 septembre 2025</h2>
            <p class="date-party">Ven : 21h30 - 03h00 à Aubin</p>
            <p>La soirée Safari est de retour à Aubin pour sa <strong>14ᵉ édition</strong>. Depuis des années, elle fait parler du petit village dans toute la région et a laissé des souvenirs incroyables à des milliers de jeunes.</p>
            <p>Une grande scène extérieure, un décor jungle géant, des déguisements, des cocktails exotiques et un show lumière unique : tout est réuni pour vivre une nuit à part.</p>
            <a href="#" class="btn btn-safari">Obtenir des billets</a>
        </article>
    </section>

    <section class="lineup-section lineup-section--safari">
        <p class="eyebrow">Line-up</p>
        <h2>Découvrez notre line-up</h2>
        <div class="artist-grid artist-grid--center">
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

    <section class="event-about event-about--reverse">
        <article class="event-media-card">
            <img src="{{ asset('images/events/safari/ambiance-1.jpg') }}" alt="Décor jungle Safari">
        </article>
        <article class="event-text-card">
            <h2>Découvrez ce qui se cache dans la jungle</h2>
            <p>Entrez dans la légende de la Safari, la plus grande soirée de la région, de retour pour une édition rugissante au cœur d’Aubin.</p>
            <p>Un <strong>espace VIP (+21)</strong> surélevé vous offre une vue plongeante sur le dancefloor, pendant que les cocktails signés Tarzan, Jane & Safari coulent à flots.</p>
            <p>Une friterie sera là toute la nuit pour calmer vos fringales, et un espace photo décoré vous permettra d'immortaliser vos plus beaux rugissements.</p>
        </article>
    </section>

    <section class="event-info">
        <h2>Informations utiles</h2>
        <div class="info-grid">
            <p>Entrée sur place possible au prix de <strong>12€</strong>.</p>
            <p>Carte d'identité <strong>obligatoire</strong>.</p>
            <p>Adresse : <strong>Rue du Colonel d'Ardenne 11, 4608 Aubin-Neufchâteau</strong>.</p>
            <p class="small">Le comité se réserve le droit d’entrée et décline toute responsabilité en cas de vol ou d’accident.</p>
        </div>
    </section>
@endsection
