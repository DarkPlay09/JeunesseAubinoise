@extends('layouts.public')

@section('title', 'Participants | La Jeunesse Aubinoise')
@section('description', 'Renseignez les informations des participants.')
@section('body_class', 'page-tickets page-tickets-participants')

@section('content')
    <main class="tickets-page">
        <section class="tickets-layout">
            <header class="tickets-header">
                <p class="section-kicker">Billetterie</p>

                <h1>Informations des participants</h1>

                <p>
                    Renseignez les informations nécessaires pour chaque billet.
                </p>
            </header>

            <div class="ticket-steps">
                <div class="ticket-step is-done">
                    <span class="material-symbols-outlined">check</span>
                    <strong>Billets</strong>
                </div>

                <div class="ticket-step is-active">
                    <span>2</span>
                    <strong>Participants</strong>
                </div>

                <div class="ticket-step">
                    <span>3</span>
                    <strong>Paiement</strong>
                </div>
            </div>

            <div class="tickets-content-grid">
                <div class="tickets-main">
                    <form id="participants-form" class="participants-form" data-participants-form>
                        <div data-participants-list></div>

                        <div class="participants-empty" data-participants-empty hidden>
                            <span class="material-symbols-outlined">confirmation_number</span>

                            <h2>Aucun billet sélectionné</h2>

                            <p>
                                Retournez à la billetterie pour sélectionner au moins un billet.
                            </p>

                            <a href="{{ route('tickets.index') }}" class="ticket-secondary-button">
                                Retour à la sélection
                            </a>
                        </div>

                        <div class="tickets-navigation">
                            <a href="{{ route('tickets.index') }}" class="ticket-secondary-button">
                                <span class="material-symbols-outlined">arrow_back</span>
                                Retour à la sélection
                            </a>
                        </div>
                    </form>
                </div>

                <aside class="ticket-summary">
                    <div class="ticket-summary__box">
                        <h2>Récapitulatif</h2>

                        <div class="ticket-summary__items" data-cart-items></div>

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

                        <button
                            type="submit"
                            form="participants-form"
                            class="ticket-summary__button"
                            data-participants-submit
                        >
                            Continuer au récapitulatif
                            <span class="material-symbols-outlined">arrow_forward</span>
                        </button>

                        <p class="ticket-summary__secure">
                            <span class="material-symbols-outlined">lock</span>
                            Paiement sécurisé via Stripe
                        </p>
                    </div>
                </aside>
            </div>
        </section>
    </main>
@endsection
