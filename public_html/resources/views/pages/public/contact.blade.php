@extends('layouts.public')

@section('title', 'Contact | La Jeunesse Aubinoise')
@section('description', 'Contactez La Jeunesse Aubinoise pour vos questions sur les événements, tickets ou l’organisation.')
@section('body_class', 'page-contact')

@section('content')
    <section class="contact-hero">
        <div class="contact-hero__content">
            <p class="section-kicker">Contact</p>

            <h1>Nous contacter</h1>

            <p>
                Une question sur nos événements, vos tickets ou l’organisation ?
                Contactez-nous facilement.
            </p>
        </div>
    </section>

    <section class="contact-page-section">
        <div class="contact-grid">
            <article class="contact-card">
                <div class="contact-card__icon">
                    <span class="material-symbols-outlined">mail</span>
                </div>

                <h2>Jeunesse Aubinoise</h2>

                <p>jeunesseaubinoise.1949@gmail.com</p>

                <a href="mailto:jeunesseaubinoise.1949@gmail.com" class="contact-card__button contact-card__button--primary">
                    Envoyer un e-mail
                </a>
            </article>

            <article class="contact-card">
                <div class="contact-card__icon">
                    <span class="material-symbols-outlined">support_agent</span>
                </div>

                <h2>Support technique</h2>

                <p>loiccarlier45@gmail.com</p>

                <a href="mailto:loiccarlier45@gmail.com" class="contact-card__button contact-card__button--primary">
                    Envoyer un e-mail
                </a>
            </article>

            <article class="contact-card">
                <div class="contact-card__icon">
                    <span class="material-symbols-outlined">person</span>
                </div>

                <span class="contact-card__role">Président</span>

                <h2>Noah Xhonneux</h2>

                <p>+32 478 09 24 92</p>

                <a href="tel:+32478092492" class="contact-card__button contact-card__button--secondary">
                    Appeler
                </a>
            </article>

            <article class="contact-card">
                <div class="contact-card__icon">
                    <span class="material-symbols-outlined">edit_document</span>
                </div>

                <span class="contact-card__role">Secrétariat</span>

                <h2>Antoine Ploemmen</h2>

                <p>+32 496 93 61 39</p>

                <a href="tel:+32496936139" class="contact-card__button contact-card__button--secondary">
                    Appeler
                </a>
            </article>

            <article class="contact-card">
                <div class="contact-card__icon">
                    <span class="material-symbols-outlined">payments</span>
                </div>

                <span class="contact-card__role">Trésorerie</span>

                <h2>Responsable</h2>

                <p>+32 485 20 76 55</p>

                <a href="tel:+32485207655" class="contact-card__button contact-card__button--secondary">
                    Appeler
                </a>
            </article>
        </div>
    </section>

    <section class="contact-faq-section">
        <div class="contact-section-heading">
            <p class="section-kicker">F.A.Q</p>

            <h2>Questions fréquentes</h2>

            <p>
                Retrouvez les réponses aux questions les plus courantes concernant nos événements.
            </p>
        </div>

        <div class="contact-faq-list">
            <article class="contact-faq-item">
                <button type="button" class="contact-faq-item__button" data-contact-faq-toggle aria-expanded="false">
                    <span>Est-il possible de se faire rembourser ?</span>
                    <span class="material-symbols-outlined">expand_more</span>
                </button>

                <div class="contact-faq-item__content">
                    <p>
                        Les billets ne sont généralement pas remboursables, sauf en cas d’annulation
                        de l’événement par l’organisateur.
                    </p>
                </div>
            </article>

            <article class="contact-faq-item">
                <button type="button" class="contact-faq-item__button" data-contact-faq-toggle aria-expanded="false">
                    <span>Je me suis trompé d’adresse e-mail lors de mon achat</span>
                    <span class="material-symbols-outlined">expand_more</span>
                </button>

                <div class="contact-faq-item__content">
                    <p>
                        Contactez le support technique avec votre nom complet, la date d’achat
                        et la bonne adresse e-mail. Nous ferons le nécessaire.
                    </p>
                </div>
            </article>

            <article class="contact-faq-item">
                <button type="button" class="contact-faq-item__button" data-contact-faq-toggle aria-expanded="false">
                    <span>Puis-je donner ma prévente à quelqu’un d’autre ?</span>
                    <span class="material-symbols-outlined">expand_more</span>
                </button>

                <div class="contact-faq-item__content">
                    <p>
                        Oui, les billets ne sont pas nominatifs sauf indication contraire.
                        Le porteur du billet pourra entrer avec le QR code valide.
                    </p>
                </div>
            </article>

            <article class="contact-faq-item">
                <button type="button" class="contact-faq-item__button" data-contact-faq-toggle aria-expanded="false">
                    <span>Y aura-t-il une vente de tickets sur place ?</span>
                    <span class="material-symbols-outlined">expand_more</span>
                </button>

                <div class="contact-faq-item__content">
                    <p>
                        Cela dépendra de la capacité restante. Si l’événement n’est pas complet,
                        une vente sur place pourra être organisée.
                    </p>
                </div>
            </article>

            <article class="contact-faq-item">
                <button type="button" class="contact-faq-item__button" data-contact-faq-toggle aria-expanded="false">
                    <span>Combien coûtent les tickets boissons ?</span>
                    <span class="material-symbols-outlined">expand_more</span>
                </button>

                <div class="contact-faq-item__content">
                    <p>
                        Les tarifs peuvent varier selon l’événement. Les prix seront indiqués
                        clairement aux caisses sur place.
                    </p>
                </div>
            </article>

            <article class="contact-faq-item">
                <button type="button" class="contact-faq-item__button" data-contact-faq-toggle aria-expanded="false">
                    <span>Est-il possible de rentrer à nouveau après être sorti ?</span>
                    <span class="material-symbols-outlined">expand_more</span>
                </button>

                <div class="contact-faq-item__content">
                    <p>
                        Pour des raisons de sécurité, toute sortie est généralement définitive,
                        sauf organisation spécifique annoncée sur place.
                    </p>
                </div>
            </article>
        </div>
    </section>

    <section class="contact-help-section">
        <div class="contact-help-banner">
            <div>
                <h2>Vous n’avez pas trouvé votre réponse ?</h2>

                <p>
                    Notre équipe est là pour vous aider avec toute autre question.
                </p>
            </div>

            <div class="contact-help-banner__actions">
                <a href="mailto:jeunesseaubinoise.1949@gmail.com" class="contact-help-banner__button contact-help-banner__button--primary">
                    Nous contacter
                </a>

                <a href="{{ route('programme') }}" class="contact-help-banner__button contact-help-banner__button--secondary">
                    Voir les événements
                </a>
            </div>
        </div>
    </section>
@endsection
