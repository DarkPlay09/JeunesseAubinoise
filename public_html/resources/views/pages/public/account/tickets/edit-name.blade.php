@extends('layouts.public')

@section('title', 'Modifier le participant | La Jeunesse Aubinoise')
@section('description', 'Modifiez le nom du participant associé à votre ticket.')
@section('body_class', 'page-account page-account-ticket-edit')

@section('content')
    <main class="account-page">
        <section class="account-shell account-shell--small">
            <a href="{{ $backUrl }}" class="account-back-link">
                <span class="material-symbols-outlined">arrow_back</span>
                {{ $backLabel }}
            </a>

            <nav class="account-breadcrumb" aria-label="Fil d’Ariane">
                <a href="{{ route('account.tickets') }}">Mes tickets</a>

                @if ($from !== 'tickets')
                    <span>/</span>
                    <a href="{{ route('account.tickets.show', $ticket->ticket_number) }}">
                        Ticket #{{ $ticket->ticket_number }}
                    </a>
                @endif

                <span>/</span>
                <strong>Modifier le participant</strong>
            </nav>

            <header class="account-header">
                <p class="section-kicker">Espace membre</p>

                <h1>Modifier le participant</h1>

                <p>
                    Mettez à jour les informations de la personne qui se présentera à l’événement avec ce billet.
                </p>
            </header>

            <section class="ticket-edit-card">
                <div class="ticket-edit-warning">
                    <span class="material-symbols-outlined">info</span>

                    <div>
                        <strong>Attention</strong>
                        <p>Le nom du participant peut être modifié uniquement avant l’événement.</p>
                    </div>
                </div>

                <div class="ticket-edit-card__body">
                    <div class="ticket-current-participant">
                        <span>Participant actuel enregistré</span>

                        <div>
                            <div class="ticket-current-participant__icon">
                                <span class="material-symbols-outlined">person</span>
                            </div>

                            <div>
                                <strong>{{ $ticket->participant_name }}</strong>

                                <small>
                                    <span class="material-symbols-outlined">confirmation_number</span>
                                    {{ $ticket->ticketType?->name ?? 'Ticket' }}
                                </small>
                            </div>
                        </div>
                    </div>

                    <form
                        action="{{ route('account.tickets.update-name', $ticket->ticket_number) }}"
                        method="POST"
                        class="ticket-name-form"
                        data-ticket-name-form
                    >
                        @csrf

                        <input type="hidden" name="from" value="{{ $from }}">

                        <div class="account-form__grid">
                            <div class="account-field">
                                <label for="first_name">Nouveau prénom</label>

                                <input
                                    type="text"
                                    id="first_name"
                                    name="first_name"
                                    value="{{ old('first_name', $ticket->participant_first_name) }}"
                                    required
                                    data-ticket-name-input
                                >

                                @error('first_name')
                                    <small class="account-field__error">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="account-field">
                                <label for="last_name">Nouveau nom</label>

                                <input
                                    type="text"
                                    id="last_name"
                                    name="last_name"
                                    value="{{ old('last_name', $ticket->participant_last_name) }}"
                                    required
                                    data-ticket-name-input
                                >

                                @error('last_name')
                                    <small class="account-field__error">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="ticket-edit-actions">
                            <a href="{{ $backUrl }}" class="account-button account-button--secondary">
                                Annuler
                            </a>

                            <button
                                type="submit"
                                class="account-button account-button--primary"
                                data-ticket-name-save
                                disabled
                            >
                                <span class="material-symbols-outlined">save</span>
                                Enregistrer la modification
                            </button>
                        </div>
                    </form>
                </div>
            </section>

            <p class="ticket-detail-help">
                <span class="material-symbols-outlined">lock</span>
                Transmission sécurisée. Les modifications seront immédiates.
            </p>
        </section>
    </main>
@endsection
