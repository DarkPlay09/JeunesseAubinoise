@extends('layouts.public')

@section('title', 'Billetterie | La Jeunesse Aubinoise')
@section('description', 'Sélectionnez vos billets pour les soirées Safari et Storm.')
@section('body_class', 'page-tickets page-tickets-selection')

@section('content')
    <main class="tickets-page">
        <section class="tickets-layout">
                <header class="tickets-header">
                    <p class="section-kicker">Billetterie</p>

                    <h1>Réservez vos places</h1>

                    <p>
                        Sélectionnez vos billets pour les prochaines soirées de la Jeunesse Aubinoise.
                    </p>
                </header>

                <div class="ticket-steps" aria-label="Étapes de commande">
                    <div class="ticket-step is-active">
                        <span>1</span>
                        <strong>Billets</strong>
                    </div>

                    <div class="ticket-step">
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
                <section class="ticket-list" data-ticket-list>
                    <article
                        class="ticket-card ticket-card--featured"
                        data-ticket-card
                        data-ticket-id="duo"
                        data-ticket-name="Duo Safari + Storm"
                        data-ticket-description="Accès aux deux soirées pour une même personne."
                        data-ticket-price="22"
                    >
                        <div class="ticket-card__badge">Recommandé</div>

                        <div class="ticket-card__content">
                            <div>
                                <h2>Duo Safari + Storm</h2>

                                <p>
                                    Accès aux deux soirées. Formule avantageuse pour profiter du week-end complet.
                                </p>

                                <strong class="ticket-card__price">22 €</strong>
                            </div>

                            <div class="ticket-quantity">
                                <button type="button" data-ticket-minus aria-label="Retirer un billet">
                                    <span class="material-symbols-outlined">remove</span>
                                </button>

                                <span data-ticket-count>0</span>

                                <button type="button" data-ticket-plus aria-label="Ajouter un billet">
                                    <span class="material-symbols-outlined">add</span>
                                </button>
                            </div>
                        </div>
                    </article>

                    <article
                        class="ticket-card"
                        data-ticket-card
                        data-ticket-id="safari"
                        data-ticket-name="Safari Solo"
                        data-ticket-description="Accès à la soirée Safari uniquement."
                        data-ticket-price="15"
                    >
                        <div class="ticket-card__content">
                            <div>
                                <h2>Safari Solo</h2>

                                <p>
                                    Accès à la soirée Safari uniquement.
                                </p>

                                <strong class="ticket-card__price">15 €</strong>
                            </div>

                            <div class="ticket-quantity">
                                <button type="button" data-ticket-minus aria-label="Retirer un billet">
                                    <span class="material-symbols-outlined">remove</span>
                                </button>

                                <span data-ticket-count>0</span>

                                <button type="button" data-ticket-plus aria-label="Ajouter un billet">
                                    <span class="material-symbols-outlined">add</span>
                                </button>
                            </div>
                        </div>
                    </article>

                    <article
                        class="ticket-card"
                        data-ticket-card
                        data-ticket-id="storm"
                        data-ticket-name="Storm Solo"
                        data-ticket-description="Accès à la soirée Storm uniquement."
                        data-ticket-price="12"
                    >
                        <div class="ticket-card__content">
                            <div>
                                <h2>Storm Solo</h2>

                                <p>
                                    Accès à la soirée Storm uniquement.
                                </p>

                                <strong class="ticket-card__price">12 €</strong>
                            </div>

                            <div class="ticket-quantity">
                                <button type="button" data-ticket-minus aria-label="Retirer un billet">
                                    <span class="material-symbols-outlined">remove</span>
                                </button>

                                <span data-ticket-count>0</span>

                                <button type="button" data-ticket-plus aria-label="Ajouter un billet">
                                    <span class="material-symbols-outlined">add</span>
                                </button>
                            </div>
                        </div>
                    </article>
                </section>
                </div>

            <aside class="ticket-summary">
                <div class="ticket-summary__box">
                    <h2>Votre commande</h2>

                    <div class="ticket-summary__items" data-cart-items>
                        <div class="ticket-summary__empty" data-cart-empty>
                            <span class="material-symbols-outlined">shopping_cart</span>
                            <p>Votre panier est vide.</p>
                        </div>
                    </div>

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

                    <a
                        href="{{ route('tickets.participants') }}"
                        class="ticket-summary__button is-disabled"
                        data-cart-continue
                    >
                        Continuer
                        <span class="material-symbols-outlined">arrow_forward</span>
                    </a>

                    <p class="ticket-summary__secure">
                        <span class="material-symbols-outlined">lock</span>
                        Paiement sécurisé par Stripe
                    </p>
                </div>
            </aside>
            </div>
        </section>

        <div class="ticket-mobile-bar" data-ticket-mobile-bar>
            <div>
                <span data-mobile-count>0 billet</span>
                <strong data-mobile-total>0,00 €</strong>
            </div>

            <a href="{{ route('tickets.participants') }}" class="is-disabled" data-cart-continue-mobile>
                Continuer
            </a>
        </div>
    </main>
@endsection
