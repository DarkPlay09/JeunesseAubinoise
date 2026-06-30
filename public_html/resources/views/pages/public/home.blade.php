@extends('layouts.public')

@section('title', "La Jeunesse Aubinoise - L'esprit de fête local")
@section('description', 'Découvrez La Jeunesse Aubinoise, Safari Party, Storm Festival, le programme et la galerie des événements.')
@section('body_class', 'page-home page-home-brutalist')

@section('content')
    <section class="home-hero">
        <img
            src="{{ asset('images/pages/home/hero.jpg') }}"
            alt="Ambiance festive de La Jeunesse Aubinoise"
            class="home-hero__image"
        >

        <div class="home-hero__overlay"></div>
        <div class="home-hero__grid" aria-hidden="true"></div>

        <div class="home-hero__content">
            <div class="home-hero__content-inner">
                <h1 class="home-hero__title">
                    L’esprit de <span>fête local</span>
                </h1>

                <p class="home-hero__text">
                    Nous organisons les événements les plus mémorables de la région.
                    De la légendaire Safari à l’électrisante Storm, rejoignez-nous pour des soirées inoubliables.
                </p>

                <div class="home-hero__actions">
                    <a href="{{ route('programme') }}" class="button button-primary">
                        Voir le programme
                    </a>

                    <a href="{{ route('safari') }}" class="button button-secondary">
                        Voir Safari
                    </a>

                    <a href="{{ route('storm') }}" class="button button-secondary">
                        Voir Storm
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="home-section home-events">
        <div class="section-heading section-heading--brutalist home-events__heading">
            <div>
                <p class="section-kicker">Nos concepts</p>
                <h2>Nos soirées signatures</h2>
                <p class="home-events__intro">
                    Découvrez nos deux univers qui rythment l’année : une ambiance sauvage avec Safari,
                    une atmosphère plus sombre et électrique avec Storm.
                </p>
            </div>
        </div>

        <div class="event-card-grid event-flip-grid">
            <a href="{{ route('safari') }}" class="event-card event-flip-card event-card--safari" aria-label="Découvrir Safari Party">
                <div class="event-flip-card__inner">
                    <div class="event-flip-card__face event-flip-card__front">
                        <img src="{{ asset('images/pages/home/safari_affiche.png') }}" alt="Safari Party">
                        <div class="event-card__overlay"></div>

                        <div class="event-card__content event-card__content--front">
                            <span class="event-card__badge">Concept Jungle</span>
                            <h3 class="event-card__title">Safari Party</h3>
                        </div>
                    </div>

                    <div class="event-flip-card__face event-flip-card__back">
                        <span class="event-card__badge">Concept Jungle</span>
                        <h3 class="event-card__title">Safari Party</h3>

                        <p class="event-card__text">
                            L’événement le plus sauvage de l’année. Une immersion dans un décor tropical
                            avec une ambiance survoltée.
                        </p>

                        <strong class="event-card__link">En savoir plus</strong>
                    </div>
                </div>
            </a>

            <a href="{{ route('storm') }}" class="event-card event-flip-card event-card--storm" aria-label="Découvrir Storm Festival">
                <div class="event-flip-card__inner">
                    <div class="event-flip-card__face event-flip-card__front">
                        <img src="{{ asset('images/pages/home/storm_affiche.png') }}" alt="Storm Festival">
                        <div class="event-card__overlay"></div>

                        <div class="event-card__content event-card__content--front">
                            <span class="event-card__badge">Concept Électro</span>
                            <h3 class="event-card__title">Storm Festival</h3>
                        </div>
                    </div>

                    <div class="event-flip-card__face event-flip-card__back">
                        <span class="event-card__badge">Concept Électro</span>
                        <h3 class="event-card__title">Storm Festival</h3>

                        <p class="event-card__text">
                            Une tempête de son et de lumière. Notre format DJ set pour les amateurs
                            de grosses basses.
                        </p>

                        <strong class="event-card__link">En savoir plus</strong>
                    </div>
                </div>
            </a>
        </div>
    </section>

    <section class="home-section gallery-preview">
        <div class="section-heading section-heading--row section-heading--brutalist">
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
            <img src="{{ asset('images/pages/home/home_galerie_01.png') }}" alt="Ambiance principale" class="gallery-preview__main">
            <img src="{{ asset('images/pages/home/home_galerie_02.png') }}" alt="DJ">
            <img src="{{ asset('images/pages/home/home_galerie_03.png') }}" alt="Public">
            <img src="{{ asset('images/pages/home/home_galerie_04.png') }}" alt="Chapiteau">
        </div>
    </section>
@endsection
