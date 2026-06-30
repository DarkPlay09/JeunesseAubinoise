@extends('layouts.public')

@section('title', 'Récapitulatif | La Jeunesse Aubinoise')
@section('description', 'Vérifiez votre commande avant le paiement.')
@section('body_class', 'page-tickets page-tickets-summary')

@section('content')
    <main class="tickets-page">
        <section class="tickets-layout">
            <header class="tickets-header">
                <p class="section-kicker">Billetterie</p>

                <h1>Récapitulatif de commande</h1>

                <p>
                    Vérifiez vos billets et vos informations avant de passer au paiement.
                </p>
            </header>

            <div class="ticket-steps">
                <div class="ticket-step is-done">
                    <span class="material-symbols-outlined">check</span>
                    <strong>Billets</strong>
                </div>

                <div class="ticket-step is-done">
                    <span class="material-symbols-outlined">check</span>
                    <strong>Participants</strong>
                </div>

                <div class="ticket-step is-active">
                    <span>3</span>
                    <strong>Paiement</strong>
                </div>
            </div>

            <div class="tickets-content-grid">
                <div class="tickets-main">
                    <section class="summary-card">
                        <div class="summary-card__header">
                            <h2>Vos billets</h2>
                            <span data-summary-count>0 billet</span>
                        </div>

                        <div class="summary-ticket-list" data-summary-tickets></div>
                    </section>

                    <div class="tickets-navigation">
                        <a href="{{ route('tickets.participants') }}" class="ticket-secondary-button">
                            <span class="material-symbols-outlined">arrow_back</span>
                            Modifier les participants
                        </a>
                    </div>
                </div>

                <aside class="ticket-summary">
                    <div class="ticket-summary__box">
                        <h2>Total à payer</h2>

                        <div class="ticket-summary__totals">
                            <div>
                                <span>Sous-total</span>
                                <strong data-cart-subtotal>0,00 €</strong>
                            </div>

                            <div>
                                <span>Frais de réservation</span>
                                <strong data-cart-fees>0,00 €</strong>
                            </div>

                            <div class="ticket-summary__total">
                                <span>Total</span>
                                <strong data-cart-total>0,00 €</strong>
                            </div>
                        </div>

                        <label class="ticket-terms">
                            <input type="checkbox" data-terms-checkbox>

                            <span>
                                J’accepte les conditions générales de vente et je reconnais que mon achat est définitif.
                            </span>
                        </label>

                        <a
                            href="{{ route('tickets.success') }}"
                            class="ticket-summary__button is-disabled"
                            data-fake-payment-button
                        >
                            <span class="material-symbols-outlined">credit_card</span>
                            Payer avec Stripe
                        </a>

                        <p class="ticket-summary__secure">
                            Paiement 100% sécurisé
                        </p>
                    </div>
                </aside>
            </div>
        </section>
    </main>
@endsection
