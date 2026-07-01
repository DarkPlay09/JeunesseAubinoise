@extends('layouts.public')

@section('title', 'Écrire un message | La Jeunesse Aubinoise')
@section('description', 'Écrivez à La Jeunesse Aubinoise pour une question sur les événements, tickets, partenariats ou l’organisation.')
@section('body_class', 'page-contact-form')

@section('content')
    <section class="contact-form-page">
        <div class="contact-form-page__left">
            <a href="{{ route('contact') }}" class="contact-form-page__back">
                <span class="material-symbols-outlined">arrow_back</span>
                Retour au contact
            </a>

            <div class="contact-form-heading" data-reveal="fade-left">
                <h1>
                    Écrivez-<br>nous
                </h1>

                <p>
                    Une question sur les tickets, l’organisation, un partenariat ou un problème technique ?
                    Remplissez le formulaire et nous reviendrons vers vous dès que possible.
                </p>
            </div>

            <form class="contact-form" action="{{ route('contact.send') }}" method="POST" data-reveal="zoom" data-reveal-delay="120">
                @csrf

                @if (session('success'))
                    <div class="contact-form__success">
                        <span class="material-symbols-outlined">check_circle</span>
                        <p>{{ session('success') }}</p>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="contact-form__error">
                        <span class="material-symbols-outlined">error</span>
                        <p>Certains champs sont incorrects. Vérifiez le formulaire.</p>
                    </div>
                @endif

                <input type="text" name="website" class="contact-form__honeypot" tabindex="-1" autocomplete="off">

                <div class="contact-form__grid">
                    <div class="contact-form__field">
                        <label for="lastname">Nom *</label>
                        <input id="lastname" name="lastname" type="text" placeholder="Votre nom" required>
                    </div>

                    <div class="contact-form__field">
                        <label for="firstname">Prénom *</label>
                        <input id="firstname" name="firstname" type="text" placeholder="Votre prénom" required>
                    </div>
                </div>

                <div class="contact-form__grid">
                    <div class="contact-form__field">
                        <label for="email">Email *</label>
                        <input id="email" name="email" type="email" placeholder="votre@email.com" required>
                    </div>

                    <div class="contact-form__field">
                        <label for="phone">Téléphone</label>
                        <input id="phone" name="phone" type="tel" placeholder="+32 ...">
                    </div>
                </div>

                <div class="contact-form__field">
                    <label for="recipient">Destinataire *</label>

                    <select id="recipient" name="recipient" required>
                        @foreach ($recipients as $key => $recipient)
                            <option value="{{ $key }}" @selected(old('recipient', $selectedRecipient) === $key)>
                                {{ $recipient['label'] }}
                            </option>
                        @endforeach
                    </select>

                    @error('recipient')
                    <small class="contact-form__field-error">{{ $message }}</small>
                    @enderror
                </div>

                <div class="contact-form__field">
                    <label for="subject">Motif *</label>

                    <select id="subject" name="subject" required>
                        <option value="">Choisir un motif</option>

                        @foreach ($subjects as $key => $label)
                            <option value="{{ $key }}" @selected(old('subject') === $key)>
                                {{ $label }}
                            </option>
                        @endforeach
                    </select>

                    @error('subject')
                    <small class="contact-form__field-error">{{ $message }}</small>
                    @enderror
                </div>

                <div class="contact-form__field">
                    <label for="message">Message *</label>
                    <textarea id="message" name="message" rows="6" placeholder="Votre message ici..." required></textarea>
                </div>

                <div class="contact-form__notice">
                    <span class="material-symbols-outlined">info</span>
                    <p>
                        Pour un problème de ticket, indiquez l’adresse e-mail utilisée lors de l’achat,
                        l’événement concerné et votre nom complet.
                    </p>
                </div>

                <button type="submit" class="contact-form__submit">
                    Envoyer
                    <span class="material-symbols-outlined">arrow_forward</span>
                </button>
            </form>
        </div>

        <aside class="contact-form-page__right" aria-hidden="true">
            <img
                src="{{ asset('images/pages/home/hero.jpg') }}"
                alt=""
                class="contact-form-page__image"
            >

            <div class="contact-form-page__overlay"></div>

            <div class="contact-form-page__visual">
                <strong>Contact</strong>
            </div>
        </aside>
    </section>
@endsection
