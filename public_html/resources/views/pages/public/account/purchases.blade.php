@extends('layouts.public')

@section('title', 'Mes achats | La Jeunesse Aubinoise')
@section('description', 'Consultez l’historique de vos commandes.')
@section('body_class', 'page-account page-account-purchases')

@section('content')
    <main class="account-page">
        <section class="account-shell">
            <header class="account-header">
                <p class="section-kicker">Espace membre</p>

                <h1>Mes achats</h1>

                <p>
                    Retrouvez l’ensemble de vos commandes passées, les montants payés et vos factures.
                </p>
            </header>

            <section class="purchase-list">
                @forelse ($orders as $order)
                    <article class="purchase-card">
                        <div class="purchase-card__header">
                            <div class="purchase-card__title">
                                <span class="purchase-card__icon material-symbols-outlined">check_circle</span>

                                <div>
                                    <h2>Commande #{{ $order->order_number }}</h2>
                                    <p>Effectuée le {{ $order->created_at->format('d/m/Y') }}</p>
                                </div>
                            </div>

                            <div class="purchase-card__total">
                                <span>Montant total</span>
                                <strong>{{ $order->formatted_total }}</strong>
                            </div>
                        </div>

                        <div class="purchase-card__body">
                            <span class="account-status account-status--valid">
                                {{ $order->status_label }}
                            </span>

                            <div class="purchase-items">
                                <h3>Articles</h3>

                                <ul>
                                    @foreach ($order->items as $item)
                                        <li>
                                            <span></span>
                                            <strong>{{ $item->quantity }}x</strong>
                                            {{ $item->label }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            <div class="account-actions">
                                <a href="{{ route('account.tickets') }}" class="account-button account-button--primary">
                                    Voir les tickets
                                    <span class="material-symbols-outlined">arrow_forward</span>
                                </a>

                                <a href="#" class="account-button account-button--secondary">
                                    <span class="material-symbols-outlined">download</span>
                                    Facture bientôt disponible
                                </a>
                            </div>
                        </div>
                    </article>
                @empty
                    <section class="account-empty">
                        <span class="material-symbols-outlined">receipt_long</span>

                        <h2>Aucun achat</h2>

                        <p>
                            Vous n’avez encore passé aucune commande.
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
