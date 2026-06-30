@extends('layouts.public')

@section('title', 'Paiement confirmé | La Jeunesse Aubinoise')
@section('description', 'Votre paiement a été confirmé.')
@section('body_class', 'page-tickets page-tickets-success')

@section('content')
    <main class="tickets-success">
        <section class="tickets-success__content">
            <div class="tickets-success__icon">
                <span class="material-symbols-outlined">check_circle</span>
            </div>

            <div class="tickets-success__header">
                <h1>Paiement confirmé !</h1>

                <p>
                    Votre commande est validée. Vos tickets seront disponibles dans votre espace et envoyés par e-mail.
                </p>
            </div>

            <section class="success-order-card">
                <div class="success-order-card__header">
                    <span>Numéro de commande</span>
                    <strong data-success-order-number>#LJA-LOCAL</strong>
                </div>

                <div data-success-items></div>

                <div class="success-order-card__total">
                    <span>Total</span>
                    <strong data-cart-total>0,00 €</strong>
                </div>
            </section>

            <div class="tickets-success__actions">
                <a href="#" class="ticket-summary__button">
                    <span class="material-symbols-outlined">local_activity</span>
                    Voir mes tickets
                </a>

                <a href="{{ route('home') }}" class="ticket-secondary-button">
                    Retour à l’accueil
                </a>
            </div>

            <div class="tickets-success__help">
                <p>Un problème ?</p>

                <a href="{{ route('contact') }}">
                    <span class="material-symbols-outlined">help</span>
                    Contactez-nous
                </a>
            </div>
        </section>
    </main>
@endsection
