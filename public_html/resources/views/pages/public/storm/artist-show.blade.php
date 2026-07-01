@extends('layouts.public')

@section('title', $artist['name'] . ' | Storm Festival | Jeunesse Aubinoise')
@section('description', $artist['tagline'])
@section('body_class', 'page-party page-storm page-storm-artist')

@section('content')
    <section class="storm-artist-hero">
        <div class="storm-artist-hero__grid" aria-hidden="true"></div>
        <div class="storm-artist-hero__noise" aria-hidden="true"></div>

        <div class="storm-artist-hero__inner">
            <a href="{{ route('storm') }}#lineup" class="storm-artist-back" data-reveal="fade-left">
                <span class="material-symbols-outlined">arrow_back</span>
                Retour au line-up
            </a>

            <div class="storm-artist-hero__layout">
                <div class="storm-artist-hero__content">
                    <p class="storm-artist-kicker" data-reveal="fade-left" data-reveal-delay="60">
                        {{ $artist['event'] }}
                    </p>

                    <h1 data-reveal="title" data-reveal-delay="120">
                        {{ $artist['name'] }}
                    </h1>

                    <p class="storm-artist-hero__tagline" data-reveal="fade-left" data-reveal-delay="220">
                        {{ $artist['tagline'] }}
                    </p>

                    <div class="storm-artist-meta" data-reveal="fade-left" data-reveal-delay="300">
                        <span>{{ $artist['style'] }}</span>
                        <span>{{ $artist['time'] }}</span>
                    </div>

                    @if (! empty($artist['socials']))
                        <div class="storm-artist-socials" data-reveal="fade-left" data-reveal-delay="360">
                            @foreach ($artist['socials'] as $social)
                                <a
                                    href="{{ $social['url'] }}"
                                    class="storm-artist-social"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                >
                                    <span class="material-symbols-outlined">{{ $social['icon'] }}</span>
                                    {{ $social['label'] }}
                                </a>
                            @endforeach
                        </div>
                    @endif
                </div>

                <div class="storm-artist-visual" data-reveal="zoom" data-reveal-delay="180">
                    <div class="storm-artist-visual__shadow"></div>

                    <div class="storm-artist-visual__frame">
                        <img
                            src="{{ asset($artist['image']) }}"
                            alt="{{ $artist['name'] }}"
                        >
                    </div>

                    <div class="storm-artist-visual__label">
                        <span>Storm</span>
                        <strong>Edition</strong>
                    </div>
                </div>
            </div>

            <div class="storm-artist-tech-card" data-reveal="zoom" data-reveal-delay="420">
                <div class="storm-artist-tech-card__row">
                    <span>Style</span>
                    <strong>{{ $artist['style'] }}</strong>
                </div>

                <div class="storm-artist-tech-card__row">
                    <span>Horaire</span>
                    <strong>{{ $artist['time'] }}</strong>
                </div>
            </div>
        </div>
    </section>

    <section class="storm-artist-section">
        <div class="storm-artist-section__heading" data-reveal="fade-left">
            <p class="section-kicker">À propos</p>
            <h2>Dans l’univers de {{ $artist['name'] }}</h2>
        </div>

        <div class="storm-artist-about">
            <article class="storm-artist-about__text" data-reveal="fade-right">
                @foreach ($artist['description'] as $paragraph)
                    <p>{{ $paragraph }}</p>
                @endforeach
            </article>

            <aside class="storm-artist-stats" data-reveal="fade-left" data-reveal-delay="140">
                @foreach ($artist['stats'] as $stat)
                    <div class="storm-artist-stat">
                        <span>{{ $stat['label'] }}</span>
                        <strong>{{ $stat['value'] }}</strong>
                    </div>
                @endforeach
            </aside>
        </div>
    </section>

    <section class="storm-artist-media-section">
        <div class="storm-artist-section__heading" data-reveal="fade-left">
            <p class="section-kicker">Médias</p>
            <h2>Ambiance & billetterie</h2>
        </div>

        <div class="storm-artist-media-layout">
            <div class="storm-artist-gallery" data-reveal="fade-right">
                @forelse ($artist['gallery'] ?? [] as $media)
                    <figure class="storm-artist-gallery__item">
                        <img src="{{ asset($media['src']) }}" alt="{{ $media['alt'] }}" loading="lazy">
                    </figure>
                @empty
                    <div class="storm-artist-gallery__empty">
                        Images bientôt disponibles
                    </div>
                @endforelse
            </div>

            <div class="storm-artist-ticket-zone" data-reveal="fade-left" data-reveal-delay="160">
                <article class="storm-artist-video-card">
                    <div class="storm-artist-video-card__top">
                        <span>Preview</span>
                        <strong>{{ $artist['video']['title'] ?? 'Vidéo' }}</strong>
                    </div>

                    @if (! empty($artist['video']['src']))
                        <video
                            controls
                            preload="metadata"
                            poster="{{ asset($artist['video']['poster'] ?? $artist['image']) }}"
                        >
                            <source src="{{ asset($artist['video']['src']) }}" type="video/mp4">
                            Votre navigateur ne supporte pas la lecture vidéo.
                        </video>
                    @else
                        <div class="storm-artist-video-card__empty">
                            Vidéo bientôt disponible
                        </div>
                    @endif
                </article>

                <article class="storm-artist-ticket-card">
                    <span>Billetterie</span>

                    <h3>Prêt pour la nuit ?</h3>

                    <p>
                        La billetterie sera bientôt disponible. Revenez prochainement pour réserver votre prévente STORM.
                    </p>

                    <button class="button button-disabled" type="button">
                        Billetterie bientôt disponible
                    </button>
                </article>
            </div>
        </div>
    </section>
@endsection
