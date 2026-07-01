@extends('layouts.public')

@section('title', $album['title'] . ' | Galerie | La Jeunesse Aubinoise')
@section('description', $album['description'])
@section('body_class', 'page-gallery page-gallery-brutalist page-gallery-show')

@section('content')
    <section class="gallery-album-hero">
        <img
            src="{{ asset($album['cover']) }}"
            alt="{{ $album['title'] }}"
            class="gallery-album-hero__image"
        >

        <div class="gallery-album-hero__overlay"></div>
        <div class="gallery-album-hero__texture" aria-hidden="true"></div>

        <div class="gallery-album-hero__content">
            <a
                href="{{ route('galerie') }}"
                class="gallery-back-link"
                data-reveal="fade-left"
            >
                ← Retour à la galerie
            </a>

            <p class="gallery-hero__kicker" data-reveal="fade-left" data-reveal-delay="80">
                {{ $album['category_label'] }} {{ $album['year'] }}
            </p>

            <h1 data-reveal="title" data-reveal-delay="160">
                {{ $album['title'] }}
            </h1>

            <p data-reveal="fade-left" data-reveal-delay="240">
                {{ $album['description'] }}
            </p>
        </div>
    </section>

    <section class="gallery-page-section gallery-page-section--photos">
        <div class="gallery-toolbar" data-reveal="fade-left">
            <div>
                <p class="section-kicker">Photos</p>

                <h2>Toutes les photos</h2>

                <p class="gallery-photo-count">
                    {{ count($album['photos']) }} photo{{ count($album['photos']) > 1 ? 's' : '' }}
                </p>
            </div>
        </div>

        <div class="gallery-photos-grid" data-lightbox-gallery>
            @foreach ($album['photos'] as $index => $photo)
                <button
                    type="button"
                    class="gallery-photo"
                    data-lightbox-trigger
                    data-index="{{ $index }}"
                    data-src="{{ asset($photo['src']) }}"
                    data-alt="{{ $photo['alt'] }}"
                    data-reveal="zoom"
                    data-reveal-delay="{{ min($loop->index * 60, 360) }}"
                >
                    <img
                        src="{{ asset($photo['src']) }}"
                        alt="{{ $photo['alt'] }}"
                        loading="lazy"
                    >
                </button>
            @endforeach
        </div>
    </section>

    <div class="gallery-lightbox" data-lightbox hidden>
        <button type="button" class="gallery-lightbox__close" data-lightbox-close aria-label="Fermer">
            ×
        </button>

        <button type="button" class="gallery-lightbox__nav gallery-lightbox__nav--prev" data-lightbox-prev aria-label="Photo précédente">
            ←
        </button>

        <img src="" alt="" data-lightbox-image>

        <button type="button" class="gallery-lightbox__nav gallery-lightbox__nav--next" data-lightbox-next aria-label="Photo suivante">
            →
        </button>
    </div>
@endsection
