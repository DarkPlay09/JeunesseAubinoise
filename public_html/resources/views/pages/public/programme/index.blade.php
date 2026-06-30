@extends('layouts.public')

@section('title', 'Programme | La Jeunesse Aubinoise')
@section('description', 'Découvrez le programme des événements de La Jeunesse Aubinoise.')
@section('body_class', 'page-programme')

@section('content')
    <section class="programme-hero">
        <img
            src="{{ asset('images/pages/programme/hero-programme.jpg') }}"
            alt="Ambiance festive de La Jeunesse Aubinoise"
            class="programme-hero__image"
        >

        <div class="programme-hero__overlay"></div>

        <div class="programme-hero__content">
            <p class="section-kicker">Programme</p>

            <h1>Notre programme 2026</h1>

            <p>
                Découvrez les soirées, activités et événements organisés par La Jeunesse Aubinoise.
            </p>
        </div>
    </section>

    <section class="programme-page-section">
        <div class="programme-filters-toolbar" data-programme-filters>
            <div class="programme-search">
                <span class="material-symbols-outlined programme-search__icon">
                    search
                </span>

                <input
                    type="text"
                    class="programme-search__input"
                    placeholder="Rechercher un événement..."
                    autocomplete="off"
                    data-programme-search
                >
            </div>

            <div class="programme-filter-controls">
                <div class="programme-select-group">
                    <label for="programme-category" class="programme-select-group__label">
                        Filtrer par catégorie :
                    </label>

                    <div class="programme-select-wrapper">
                        <select
                            id="programme-category"
                            class="programme-select"
                            data-programme-category
                        >
                            @foreach ($categories as $value => $label)
                                <option value="{{ $value }}">{{ $label }}</option>
                            @endforeach
                        </select>

                        <span class="material-symbols-outlined programme-select-wrapper__icon">
                            expand_more
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="programme-events-list">
            @foreach ($events as $event)
                <article
                    class="programme-event-card"
                    data-programme-card
                    data-category="{{ $event['category'] }}"
                    data-year="{{ $event['year'] }}"
                    data-title="{{ strtolower($event['title']) }}"
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

        <p class="programme-empty-message" data-programme-empty hidden>
            Aucun événement ne correspond à votre recherche.
        </p>
    </section>
@endsection
