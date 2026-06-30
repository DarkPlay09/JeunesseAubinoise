@extends('layouts.public')

@section('title', 'Mes tickets | La Jeunesse Aubinoise')
@section('description', 'Retrouvez et gérez vos tickets.')
@section('body_class', 'page-account page-account-tickets')

@section('content')
    <main class="account-page">
        <section class="account-shell">
            @if (session('status'))
                <div class="account-alert account-alert--success">
                    <span class="material-symbols-outlined">check_circle</span>
                    {{ session('status') }}
                </div>
            @endif

            <header class="account-header">
                <p class="section-kicker">Espace membre</p>

                <h1>Mes tickets</h1>

                <p>
                    Retrouvez vos accès, téléchargez vos tickets et modifiez le nom du participant si nécessaire.
                </p>
            </header>

            <section class="account-ticket-list">
                @forelse ($tickets as $ticket)
                    <article class="account-ticket-card {{ $ticket->is_used ? 'is-used' : '' }}">
                        <div class="account-ticket-card__visual {{ $ticket->visual_class }}">
                            <span class="material-symbols-outlined">{{ $ticket->visual_icon }}</span>
                        </div>

                        <div class="account-ticket-card__content">
                            <div class="account-ticket-card__top">
                                <div>
                                    <h2>{{ $ticket->ticketType?->name ?? 'Ticket' }}</h2>

                                    <p>
                                        <span class="material-symbols-outlined">person</span>
                                        {{ $ticket->participant_name }}
                                    </p>
                                </div>

                                @if ($ticket->status === 'valid')
                                    <span class="account-status account-status--valid">
                                        <span class="material-symbols-outlined">check_circle</span>
                                        {{ $ticket->status_label }}
                                    </span>
                                @else
                                    <span class="account-status account-status--used">
                                        <span class="material-symbols-outlined">done_all</span>
                                        {{ $ticket->status_label }}
                                    </span>
                                @endif
                            </div>

                            <div class="account-ticket-card__meta">
                                <span>{{ $ticket->event?->name ?? 'Événement' }}</span>
                                <span>Commande #{{ $ticket->order?->order_number }}</span>
                                <span>Ticket #{{ $ticket->ticket_number }}</span>
                            </div>

                            <div class="account-actions">
                                <a
                                    href="{{ route('account.tickets.show', $ticket->ticket_number) }}"
                                    class="account-button account-button--primary"
                                >
                                    <span class="material-symbols-outlined">visibility</span>
                                    Voir le ticket
                                </a>

                                <a
                                    href="{{ route('account.tickets.download', $ticket->ticket_number) }}"
                                    class="account-button account-button--secondary"
                                >
                                    <span class="material-symbols-outlined">download</span>
                                    Télécharger
                                </a>

                                @if ($ticket->status === 'valid')
                                    <a
                                        href="{{ route('account.tickets.edit-name', ['ticket' => $ticket->ticket_number, 'from' => 'tickets']) }}"
                                        class="account-button account-button--secondary"
                                    >
                                        <span class="material-symbols-outlined">edit</span>
                                        Modifier le nom
                                    </a>
                                @else
                                    <button type="button" class="account-button account-button--disabled" disabled>
                                        <span class="material-symbols-outlined">visibility</span>
                                        Ticket utilisé
                                    </button>
                                @endif
                            </div>
                        </div>
                    </article>
                @empty
                    <section class="account-empty">
                        <span class="material-symbols-outlined">confirmation_number</span>

                        <h2>Aucun ticket</h2>

                        <p>
                            Vous n’avez pas encore de ticket disponible.
                        </p>

                        <a href="{{ route('tickets.index') }}" class="account-button account-button--primary">
                            Aller à la billetterie
                        </a>
                    </section>
                @endforelse
            </section>
        </section>
    </main>
@endsection
