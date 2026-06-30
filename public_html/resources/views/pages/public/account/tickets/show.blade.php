@extends('layouts.public')

@section('title', 'Détail du ticket | La Jeunesse Aubinoise')
@section('description', 'Consultez le détail de votre ticket.')
@section('body_class', 'page-account page-account-ticket-detail')

@section('content')
    <main class="account-page">
        <section class="account-shell account-shell--small">
            @if (session('status'))
                <div class="account-alert account-alert--success">
                    <span class="material-symbols-outlined">check_circle</span>
                    {{ session('status') }}
                </div>
            @endif

            <a href="{{ route('account.tickets') }}" class="account-back-link">
                <span class="material-symbols-outlined">arrow_back</span>
                Retour à mes tickets
            </a>

            <nav class="account-breadcrumb" aria-label="Fil d’Ariane">
                <a href="{{ route('account.tickets') }}">Mes tickets</a>
                <span>/</span>
                <strong>Ticket #{{ $ticket->ticket_number }}</strong>
            </nav>

            <header class="account-header">
                <p class="section-kicker">Espace membre</p>

                <h1>Détail du ticket</h1>

                <p>
                    Présentez ce QR code à l’entrée de l’événement.
                </p>
            </header>

            <article class="ticket-detail-card">
                <div class="ticket-detail-card__status">
                    <span class="material-symbols-outlined">check_circle</span>
                    {{ $ticket->status_label }}
                </div>

                <section class="ticket-detail-card__qr">
                    <div>
                        <span>Scanner à l’entrée</span>
                        <strong>Billet #{{ $ticket->ticket_number }}</strong>
                    </div>

                    <div class="ticket-qr-box">
                        @if ($ticket->qr_code_path)
                            <img src="{{ asset('storage/' . $ticket->qr_code_path) }}" alt="QR code du ticket {{ $ticket->ticket_number }}">
                        @else
                            <div class="ticket-qr-placeholder">
                                <span class="material-symbols-outlined">qr_code_2</span>
                                <small>QR démo</small>
                            </div>
                        @endif
                    </div>
                </section>

                <section class="ticket-detail-card__content">
                    <div class="ticket-detail-main">
                        <div>
                            <span>Participant</span>
                            <strong>{{ $ticket->participant_name }}</strong>
                        </div>

                        <div class="ticket-detail-grid">
                            <div>
                                <span>Type de billet</span>
                                <strong>{{ $ticket->ticketType?->name ?? 'Ticket' }}</strong>
                            </div>

                            <div>
                                <span>Événement</span>
                                <strong>{{ $ticket->event?->name ?? 'Événement' }}</strong>
                            </div>

                            <div>
                                <span>Date</span>
                                <strong>
                                    {{ $ticket->event?->starts_at?->format('d/m/Y H:i') ?? 'Date à confirmer' }}
                                </strong>
                            </div>

                            <div>
                                <span>Lieu</span>
                                <strong>{{ $ticket->event?->location ?? 'Aubin-Neufchâteau' }}</strong>
                            </div>

                            <div>
                                <span>Commande</span>
                                <strong>{{ $ticket->order?->order_number }}</strong>
                            </div>

                            <div>
                                <span>Statut</span>
                                <strong>{{ $ticket->status_label }}</strong>
                            </div>
                        </div>
                    </div>

                    <div class="account-actions ticket-detail-actions">
                        <a
                            href="{{ route('account.tickets.download', $ticket->ticket_number) }}"
                            class="account-button account-button--primary"
                        >
                            <span class="material-symbols-outlined">download</span>
                            Télécharger le PDF
                        </a>

                        @if ($ticket->status === 'valid')
                            <a
                                href="{{ route('account.tickets.edit-name', ['ticket' => $ticket->ticket_number, 'from' => 'detail']) }}"
                                class="account-button account-button--secondary"
                            >
                                <span class="material-symbols-outlined">edit</span>
                                Modifier le nom
                            </a>
                        @endif
                    </div>
                </section>
            </article>

            <p class="ticket-detail-help">
                Besoin d’aide avec ce ticket ?
                <a href="{{ route('contact') }}">Contacter le support</a>
            </p>
        </section>
    </main>
@endsection
