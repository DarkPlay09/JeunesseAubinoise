@extends('layouts.public')

@section('title', "La Jeunesse Aubinoise - L'esprit de fête local")
@section('description', 'Découvrez La Jeunesse Aubinoise, Safari Party, Storm Festival, le programme et la galerie des événements.')
@section('body_class', 'page-home')

@section('content')
    <section class="home-hero">
        <img
            src="{{ asset('images/pages/home/hero-party.jpg') }}"
            alt="Ambiance festive de La Jeunesse Aubinoise"
            class="home-hero__image"
        >

        <div class="home-hero__overlay"></div>

        <div class="home-hero__content">
            <p class="home-hero__eyebrow">Jeunesse Aubinoise</p>

            <h1 class="home-hero__title">
                L’esprit de <span>fête local.</span>
            </h1>

            <p class="home-hero__text">
                Nous organisons les événements les plus mémorables de la région.
                De la légendaire Safari à l’électrisante Storm, rejoignez-nous pour des soirées inoubliables.
            </p>

            <div class="home-hero__actions">
                <a href="{{ route('programme') }}" class="button button-primary">
                    Voir le programme
                </a>

                <a href="{{ route('safari') }}" class="button button-outline">
                    Voir Safari
                </a>

                <a href="{{ route('storm') }}" class="button button-outline">
                    Voir Storm
                </a>
            </div>
        </div>
    </section>

    <section class="home-section home-events">
        <div class="section-heading">
            <p class="section-kicker">Nos concepts</p>
            <h2>Nos soirées signatures</h2>
            <p>
                Découvrez nos deux univers qui rythment l’année :
                une ambiance sauvage avec Safari, une atmosphère plus sombre et électrique avec Storm.
            </p>
        </div>

        <div class="event-card-grid">
            <a href="{{ route('safari') }}" class="event-card event-card--safari">
                <img src="{{ asset('images/pages/home/safari-preview.jpg') }}" alt="Safari Party">
                <div class="event-card__overlay"></div>
                <div class="event-card__content">
                    <span>Concept Jungle</span>
                    <h3>Safari Party</h3>
                    <p>
                        L’événement le plus sauvage de l’année.
                        Une immersion dans un décor tropical avec une ambiance survoltée.
                    </p>
                    <strong>En savoir plus</strong>
                </div>
            </a>

            <a href="{{ route('storm') }}" class="event-card event-card--storm">
                <img src="{{ asset('images/pages/home/storm-preview.jpg') }}" alt="Storm Festival">
                <div class="event-card__overlay"></div>
                <div class="event-card__content">
                    <span>Concept Électro</span>
                    <h3>Storm Festival</h3>
                    <p>
                        Une tempête de son et de lumière.
                        Notre format DJ set pour les amateurs de grosses basses.
                    </p>
                    <strong>En savoir plus</strong>
                </div>
            </a>
        </div>
    </section>

    <section class="home-section gallery-preview">
        <div class="section-heading section-heading--row">
            <div>
                <p class="section-kicker">Galerie</p>
                <h2>Revivez l’ambiance</h2>
                <p>Quelques souvenirs de nos précédentes éditions.</p>
            </div>

            <a href="{{ route('galerie') }}" class="text-link">
                Voir toutes les photos
            </a>
        </div>

        <div class="gallery-preview__grid">
            <img src="{{ asset('images/pages/home/gallery-main.jpg') }}" alt="Ambiance principale" class="gallery-preview__main">
            <img src="{{ asset('images/pages/home/gallery-dj.jpg') }}" alt="DJ">
            <img src="{{ asset('images/pages/home/gallery-crowd.jpg') }}" alt="Public">
            <img src="{{ asset('images/pages/home/gallery-tent.jpg') }}" alt="Chapiteau">
        </div>
    </section>
@endsection
