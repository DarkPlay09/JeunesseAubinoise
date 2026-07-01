@extends('layouts.public')

@section('title', 'Programme | La Jeunesse Aubinoise')
@section('description', 'Découvrez le programme des événements de La Jeunesse Aubinoise.')
@section('body_class', 'page-programme page-programme-brutalist')

@section('content')
    <section class="programme-hero">
        <img
            src="{{ asset('images/pages/programme/hero-programme.jpg') }}"
            alt="Ambiance festive de La Jeunesse Aubinoise"
            class="programme-hero__image"
        >

        <div class="programme-hero__overlay"></div>
        <div class="programme-hero__texture" aria-hidden="true"></div>

        <div class="programme-hero__content">
            <h1 data-reveal="title" data-reveal-delay="80">
                Notre programme 2026
            </h1>

            <p data-reveal="fade-left" data-reveal-delay="160">
                Découvrez les soirées, activités et événements organisés par La Jeunesse Aubinoise.
            </p>
        </div>
    </section>

    <section id="programme-list" class="programme-page-section">
        <div class="programme-section-heading" data-reveal="fade-left">
            <p class="section-kicker">Programme</p>

            <h2>Tous les événements</h2>

            <p>
                Ouvrez les cartes et retrouvez les horaires importants de chaque moment.
            </p>
        </div>

        <div class="programme-events-list">
            @foreach ($events as $event)
                <article
                    class="programme-event-card"
                    data-programme-card
                    data-category="{{ $event['category'] }}"
                    data-year="{{ $event['year'] }}"
                    data-title="{{ strtolower($event['title']) }}"
                    data-reveal="zoom"
                    data-reveal-delay="{{ min($loop->index * 70, 280) }}"
                >
                    <button
                        type="button"
                        class="programme-event-card__header"
                        data-programme-toggle
                        aria-expanded="{{ $loop->first ? 'true' : 'false' }}"
                    >
                        <span class="programme-event-card__image">
                            <img
                                src="{{ asset($event['image']) }}"
                                alt="{{ $event['title'] }}"
                                loading="lazy"
                            >
                        </span>

                        <span class="programme-event-card__main">
                            <span class="programme-event-card__category">
                                {{ $event['category_label'] }}
                            </span>

                            <span class="programme-event-card__title">
                                {{ $event['title'] }}
                            </span>

                            <span class="programme-event-card__date">
                                {{ $event['date_label'] }}
                            </span>
                        </span>

                        <span class="material-symbols-outlined programme-event-card__icon">
                            expand_more
                        </span>
                    </button>

                    <div class="programme-event-card__content">
                        <div class="programme-event-card__body">
                            <p class="programme-event-card__summary">
                                {{ $event['summary'] }}
                            </p>

                            <div class="programme-details-list">
                                @foreach ($event['details'] as $detail)
                                    <div class="programme-detail">
                                        <span class="material-symbols-outlined programme-detail__icon">
                                            {{ $detail['icon'] }}
                                        </span>

                                        <div>
                                            <p>
                                                <strong>{{ $detail['time'] }}</strong>
                                                {{ $detail['title'] }}
                                            </p>

                                            @if (! empty($detail['description']))
                                                <span>{{ $detail['description'] }}</span>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach

                                <div class="programme-detail">
                                    <span class="material-symbols-outlined programme-detail__icon">
                                        location_on
                                    </span>

                                    <div>
                                        <p>{{ $event['location'] }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="programme-actions">
                                @if (! empty($event['actions']['ticket']))
                                    @if ($event['actions']['ticket']['enabled'] ?? true)
                                        <a
                                            href="{{ url($event['actions']['ticket']['url']) }}"
                                            class="programme-action programme-action--primary"
                                        >
                                            <span class="material-symbols-outlined">confirmation_number</span>
                                            {{ $event['actions']['ticket']['label'] }}
                                        </a>
                                    @else
                                        <button
                                            type="button"
                                            class="programme-action programme-action--disabled"
                                            disabled
                                        >
                                            <span class="material-symbols-outlined">confirmation_number</span>
                                            {{ $event['actions']['ticket']['label'] }}
                                        </button>
                                    @endif
                                @endif

                                @if (! empty($event['actions']['registration']))
                                    <a
                                        href="{{ $event['actions']['registration']['url'] }}"
                                        class="programme-action programme-action--primary"
                                    >
                                        <span class="material-symbols-outlined">edit_calendar</span>
                                        {{ $event['actions']['registration']['label'] }}
                                    </a>
                                @endif

                                @if (! empty($event['actions']['calendar']))
                                    <a
                                        href="{{ route('programme.calendar', $event['slug']) }}"
                                        class="programme-action programme-action--secondary"
                                    >
                                        <span class="material-symbols-outlined">calendar_add_on</span>
                                        Ajouter au calendrier
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </section>
@endsection
