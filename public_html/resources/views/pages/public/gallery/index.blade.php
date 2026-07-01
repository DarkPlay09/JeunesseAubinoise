@extends('layouts.public')

@section('title', 'Galerie | La Jeunesse Aubinoise')
@section('description', 'Revivez les meilleurs moments des événements Safari et Storm de La Jeunesse Aubinoise.')
@section('body_class', 'page-gallery page-gallery-brutalist')

@section('content')
    <section class="gallery-hero">
        <img
            src="{{ asset('images/pages/gallery/hero.png') }}"
            alt="Ambiance festive de La Jeunesse Aubinoise"
            class="gallery-hero__image"
        >

        <div class="gallery-hero__overlay"></div>
        <div class="gallery-hero__texture" aria-hidden="true"></div>

        <div class="gallery-hero__content">
            <p class="gallery-hero__kicker" data-reveal="fade-left">
                Galerie
            </p>

            <h1 data-reveal="title" data-reveal-delay="80">
                Revivez nos meilleurs moments
            </h1>

            <p data-reveal="fade-left" data-reveal-delay="160">
                Retrouvez les albums photos de nos soirées Safari et Storm.
                Une sélection des meilleurs souvenirs de La Jeunesse Aubinoise.
            </p>
        </div>
    </section>

    <section class="gallery-page-section">
        <div
            class="gallery-filters-toolbar"
            data-gallery-filters
            data-reveal="zoom"
            data-reveal-delay="80"
        >
            <div class="gallery-search">
                <span class="material-symbols-outlined gallery-search__icon">
                    search
                </span>

                <input
                    type="text"
                    class="gallery-search__input"
                    placeholder="Rechercher un album..."
                    autocomplete="off"
                    data-gallery-search
                >
            </div>

            <div class="gallery-filter-controls">
                <div class="gallery-select-group">
                    <label for="gallery-category" class="gallery-select-group__label">
                        Filtrer par catégorie :
                    </label>

                    <div class="gallery-select-wrapper">
                        <select
                            id="gallery-category"
                            class="gallery-select"
                            data-gallery-category
                        >
                            @foreach ($categories as $value => $label)
                                <option value="{{ $value }}">{{ $label }}</option>
                            @endforeach
                        </select>

                        <span class="material-symbols-outlined gallery-select-wrapper__icon">
                            expand_more
                        </span>
                    </div>
                </div>

                <div class="gallery-select-group">
                    <label for="gallery-year" class="gallery-select-group__label">
                        Année :
                    </label>

                    <div class="gallery-select-wrapper">
                        <select
                            id="gallery-year"
                            class="gallery-select"
                            data-gallery-year
                        >
                            <option value="all">Toutes</option>

                            @foreach ($albums->pluck('year')->unique()->sortDesc() as $year)
                                <option value="{{ $year }}">{{ $year }}</option>
                            @endforeach
                        </select>

                        <span class="material-symbols-outlined gallery-select-wrapper__icon">
                            expand_more
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="gallery-albums-grid" data-gallery-grid>
            @foreach ($albums as $album)
                <article
                    class="gallery-album-card"
                    data-gallery-card
                    data-category="{{ $album['category'] }}"
                    data-year="{{ $album['year'] }}"
                    data-title="{{ strtolower($album['title']) }}"
                    data-reveal="fade-up"
                    data-reveal-delay="{{ min($loop->index * 90, 360) }}"
                >
                    <a href="{{ route('galerie.show', $album['slug']) }}" class="gallery-album-card__media">
                        <img
                            src="{{ asset($album['cover']) }}"
                            alt="{{ $album['title'] }}"
                            loading="lazy"
                        >

                        <span class="gallery-album-card__year">
                            {{ $album['year'] }}
                        </span>
                    </a>

                    <div class="gallery-album-card__content">
                        <p class="gallery-album-card__category">
                            {{ $album['category_label'] }}
                        </p>

                        <h3>{{ $album['title'] }}</h3>

                        <div class="gallery-album-card__meta">
                            <span>{{ $album['photos_count'] }} photos</span>
                        </div>

                        <a href="{{ route('galerie.show', $album['slug']) }}" class="gallery-album-card__button">
                            Voir l’album
                            <span>→</span>
                        </a>
                    </div>
                </article>
            @endforeach
        </div>

        <p class="gallery-empty-message" data-gallery-empty hidden>
            Aucun album ne correspond à ce filtre.
        </p>

        <div class="gallery-load-more-wrapper" data-reveal="fade-up" data-reveal-delay="120">
            <button type="button" class="gallery-load-more" data-gallery-load-more>
                Charger plus d’albums
                <span class="material-symbols-outlined">autorenew</span>
            </button>
        </div>
    </section>
@endsection
