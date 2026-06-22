@extends('layouts.public')

@section('title', "La Jeunesse Aubinoise - L'esprit de fête local")
@section('description', 'Découvrez La Jeunesse Aubinoise, Safari Party, Storm Festival, le programme et la galerie des événements.')
@section('bodyClass', 'page-home')

@section('content')
    <section class="home-hero" style="--hero-image: url('{{ asset('images/pages/home/hero-party.jpg') }}');">
        <div class="home-hero__overlay"></div>

        <div class="home-hero__content">
            <p class="eyebrow">Jeunesse Aubinoise</p>
            <h1>
                L'esprit de
                <span>fête local.</span>
            </h1>
            <p class="home-hero__text">
                Nous organisons les événements les plus mémorables de la région. De la légendaire Safari à l'électrisante Storm, rejoignez-nous pour des soirées inoubliables.
            </p>

            <div class="home-hero__actions">
                <a href="{{ route('programme') }}" class="btn btn-primary">Voir le programme</a>
                <a href="{{ route('safari') }}" class="btn btn-ghost">Voir Safari</a>
                <a href="{{ route('storm') }}" class="btn btn-ghost">Voir Storm</a>
            </div>
        </div>
    </section>

    <section class="home-section home-events" id="events">
        <div class="section-heading">
            <p class="eyebrow">Nos concepts</p>
            <h2>Nos soirées signatures</h2>
            <p>Deux univers qui rythment l'année : une ambiance sauvage avec Safari, une tempête sonore avec Storm.</p>
        </div>

        <div class="event-grid">
            <a href="{{ route('safari') }}" class="event-card event-card--safari">
                <img src="{{ asset('images/pages/home/safari-preview.jpg') }}" alt="Ambiance Safari Party">
                <div class="event-card__overlay"></div>
                <div class="event-card__content">
                    <span>Concept Jungle</span>
                    <h3>Safari Night</h3>
                    <p>L'événement sauvage de la région : décor tropical, ambiance survoltée et nuit mémorable à Aubin.</p>
                    <strong>Découvrir Safari</strong>
                </div>
            </a>

            <a href="{{ route('storm') }}" class="event-card event-card--storm">
                <img src="{{ asset('images/pages/home/storm-preview.jpg') }}" alt="Visuel Storm Festival">
                <div class="event-card__overlay"></div>
                <div class="event-card__content">
                    <span>Concept Rave</span>
                    <h3>Storm Festival</h3>
                    <p>Une soirée sombre, électronique et intense, maintenant habillée avec la nouvelle identité rose Storm.</p>
                    <strong>Découvrir Storm</strong>
                </div>
            </a>
        </div>
    </section>

    <section class="home-section gallery-preview">
        <div class="section-heading section-heading--row">
            <div>
                <p class="eyebrow">Souvenirs</p>
                <h2>Galerie</h2>
                <p>Revivez l'ambiance de nos précédentes éditions.</p>
            </div>
            <a href="{{ route('galerie') }}" class="text-link">Voir toutes les photos</a>
        </div>

        <div class="gallery-grid">
            <img class="gallery-grid__large" src="{{ asset('images/pages/home/gallery-main.jpg') }}" alt="Ambiance festive à Aubin">
            <img src="{{ asset('images/pages/home/gallery-dj.jpg') }}" alt="DJ pendant une soirée">
            <img src="{{ asset('images/pages/home/gallery-crowd.jpg') }}" alt="Public en soirée">
            <img class="gallery-grid__wide" src="{{ asset('images/pages/home/gallery-tent.jpg') }}" alt="Chapiteau de soirée">
        </div>
    </section>
@endsection
