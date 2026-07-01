@extends('layouts.public')

@section('title', 'Contact | La Jeunesse Aubinoise')
@section('description', 'Contactez La Jeunesse Aubinoise pour vos questions sur les événements, tickets, partenariats ou l’organisation.')
@section('body_class', 'page-contact page-contact-brutalist')

@section('content')
    <section class="contact-hero">
        <img
            src="{{ asset('images/pages/home/hero.jpg') }}"
            alt="Ambiance de La Jeunesse Aubinoise"
            class="contact-hero__image"
        >

        <div class="contact-hero__overlay"></div>
        <div class="contact-hero__texture" aria-hidden="true"></div>

        <div class="contact-hero__content">
            <h1 data-reveal="title" data-reveal-delay="80">
                Nous contacter
            </h1>

            <p data-reveal="fade-left" data-reveal-delay="160">
                Une question sur nos événements, vos tickets, l’organisation ou un partenariat ?
                Retrouvez le bon contact et écrivez-nous facilement.
            </p>

            <div class="contact-hero__actions" data-reveal="fade-left" data-reveal-delay="240">
                <a href="{{ route('contact.form', 'general') }}" class="contact-button contact-button--primary">
                    Écrire un message
                </a>

                <a href="#contact-faq" class="contact-button contact-button--secondary">
                    Voir la FAQ
                </a>
            </div>
        </div>
    </section>

    <section class="contact-page-section">
        <div class="contact-section-heading" data-reveal="fade-left">
            <p class="section-kicker">Contacts utiles</p>

            <h2>Choisir le bon contact</h2>

            <p>
                Pour recevoir une réponse plus rapide, sélectionnez le contact le plus adapté à votre demande.
            </p>
        </div>

        <div class="contact-bento-grid">
            <article class="contact-card contact-card--featured" data-reveal="zoom">
                <div class="contact-card__top">
                    <span class="contact-card__role">Contact général</span>
                    <span class="contact-card__icon material-symbols-outlined">mail</span>
                </div>

                <div class="contact-card__content">
                    <h2>Jeunesse Aubinoise</h2>

                    <p>
                        Pour les demandes générales, les questions sur nos événements,
                        les infos pratiques ou les demandes qui ne rentrent dans aucune autre catégorie.
                    </p>
                </div>

                <div class="contact-card__actions">
                    <a href="{{ route('contact.form', 'general') }}" class="contact-card__button contact-card__button--primary">
                        Écrire à la jeunesse
                        <span class="material-symbols-outlined">arrow_forward</span>
                    </a>
                </div>
            </article>

            <article class="contact-card" data-reveal="zoom" data-reveal-delay="80">
                <div class="contact-card__top">
                    <span class="contact-card__role">Président</span>
                    <span class="contact-card__icon material-symbols-outlined">star</span>
                </div>

                <div class="contact-card__content">
                    <h2>Noah Xhonneux</h2>

                    <p>
                        Pour les demandes liées à l’organisation générale,
                        au comité ou aux décisions importantes.
                    </p>
                </div>

                <div class="contact-card__actions contact-card__actions--dual">
                    <a href="{{ route('contact.form', 'president') }}" class="contact-card__button contact-card__button--secondary">
                        Écrire
                        <span class="material-symbols-outlined">arrow_forward</span>
                    </a>

                    <a href="tel:+32478092492" class="contact-card__button contact-card__button--ghost">
                        Appeler
                        <span class="material-symbols-outlined">call</span>
                    </a>
                </div>
            </article>

            <article class="contact-card" data-reveal="zoom" data-reveal-delay="140">
                <div class="contact-card__top">
                    <span class="contact-card__role">Secrétariat</span>
                    <span class="contact-card__icon material-symbols-outlined">edit_document</span>
                </div>

                <div class="contact-card__content">
                    <h2>Antoine Ploemmen</h2>

                    <p>
                        Pour les documents, informations administratives,
                        demandes officielles ou suivi d’organisation.
                    </p>
                </div>

                <div class="contact-card__actions contact-card__actions--dual">
                    <a href="{{ route('contact.form', 'secretariat') }}" class="contact-card__button contact-card__button--secondary">
                        Écrire
                        <span class="material-symbols-outlined">arrow_forward</span>
                    </a>

                    <a href="tel:+32496936139" class="contact-card__button contact-card__button--ghost">
                        Appeler
                        <span class="material-symbols-outlined">call</span>
                    </a>
                </div>
            </article>

            <article class="contact-card" data-reveal="zoom" data-reveal-delay="200">
                <div class="contact-card__top">
                    <span class="contact-card__role">Trésorerie</span>
                    <span class="contact-card__icon material-symbols-outlined">payments</span>
                </div>

                <div class="contact-card__content">
                    <h2>Responsable trésorerie</h2>

                    <p>
                        Pour les questions de paiement, facturation,
                        remboursement exceptionnel ou suivi financier.
                    </p>
                </div>

                <div class="contact-card__actions contact-card__actions--dual">
                    <a href="{{ route('contact.form', 'tresorerie') }}" class="contact-card__button contact-card__button--secondary">
                        Écrire
                        <span class="material-symbols-outlined">arrow_forward</span>
                    </a>

                    <a href="tel:+32485207655" class="contact-card__button contact-card__button--ghost">
                        Appeler
                        <span class="material-symbols-outlined">call</span>
                    </a>
                </div>
            </article>

            <article class="contact-card contact-card--support" data-reveal="zoom" data-reveal-delay="260">
                <div class="contact-card__top">
                    <span class="contact-card__role">Support technique</span>
                    <span class="contact-card__icon material-symbols-outlined">build</span>
                </div>

                <div class="contact-card__content">
                    <h2>Billets, QR codes & site web</h2>

                    <p>
                        Vous n’avez pas reçu votre confirmation, votre QR code ne s’affiche pas,
                        vous vous êtes trompé d’adresse e-mail ou vous avez un souci avec votre compte ?
                    </p>
                </div>

                <div class="contact-card__actions">
                    <a href="{{ route('contact.form', 'support') }}" class="contact-card__button contact-card__button--primary">
                        Contacter le support
                        <span class="material-symbols-outlined">arrow_forward</span>
                    </a>
                </div>
            </article>
        </div>
    </section>

    <section class="contact-info-section">
        <div class="contact-info-panel" data-reveal="zoom">
            <div class="contact-info-panel__content">
                <p class="section-kicker">Avant d’écrire</p>

                <h2>Pour aller plus vite</h2>

                <p>
                    Si votre message concerne un ticket, indiquez directement votre nom complet,
                    l’adresse e-mail utilisée lors de l’achat, l’événement concerné et une capture d’écran si nécessaire.
                </p>
            </div>

            <div class="contact-info-list">
                <div class="contact-info-item">
                    <span class="material-symbols-outlined">confirmation_number</span>
                    <p>
                        <strong>Tickets</strong>
                        Vérifiez vos spams et recherchez “Safari”, “Storm” ou “Jeunesse Aubinoise”.
                    </p>
                </div>

                <div class="contact-info-item">
                    <span class="material-symbols-outlined">qr_code_2</span>
                    <p>
                        <strong>QR code</strong>
                        Le QR code est unique et ne peut être scanné qu’une seule fois.
                    </p>
                </div>

                <div class="contact-info-item">
                    <span class="material-symbols-outlined">local_bar</span>
                    <p>
                        <strong>Boissons</strong>
                        Les tickets boissons coûtent 2 €. Bière à partir de 16 ans, alcools forts à partir de 18 ans.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section id="contact-faq" class="contact-faq-section">
        <div class="contact-section-heading" data-reveal="fade-left">
            <p class="section-kicker">F.A.Q</p>

            <h2>Questions fréquentes</h2>

            <p>
                Les réponses aux questions qui reviennent le plus souvent avant nos événements.
            </p>
        </div>

        <div class="contact-faq-list">
            <article class="contact-faq-item" data-reveal="zoom">
                <button type="button" class="contact-faq-item__button" data-contact-faq-toggle aria-expanded="false">
                    <span>Je n’ai pas reçu mon ticket, que faire ?</span>
                    <span class="material-symbols-outlined">expand_more</span>
                </button>

                <div class="contact-faq-item__content">
                    <p>
                        Vérifiez d’abord vos spams et recherchez “Jeunesse Aubinoise”, “Safari” ou “Storm”.
                        Si vous ne trouvez toujours rien, contactez le support technique avec votre nom complet
                        et l’adresse e-mail utilisée lors de l’achat.
                    </p>
                </div>
            </article>

            <article class="contact-faq-item" data-reveal="zoom" data-reveal-delay="70">
                <button type="button" class="contact-faq-item__button" data-contact-faq-toggle aria-expanded="false">
                    <span>Je me suis trompé d’adresse e-mail lors de mon achat</span>
                    <span class="material-symbols-outlined">expand_more</span>
                </button>

                <div class="contact-faq-item__content">
                    <p>
                        Contactez le support technique avec votre nom, prénom, la mauvaise adresse e-mail,
                        la bonne adresse e-mail et l’événement concerné. Nous corrigerons la situation si l’achat est retrouvé.
                    </p>
                </div>
            </article>

            <article class="contact-faq-item" data-reveal="zoom" data-reveal-delay="140">
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

            <article class="contact-faq-item" data-reveal="zoom" data-reveal-delay="210">
                <button type="button" class="contact-faq-item__button" data-contact-faq-toggle aria-expanded="false">
                    <span>Puis-je donner ma prévente à quelqu’un d’autre ?</span>
                    <span class="material-symbols-outlined">expand_more</span>
                </button>

                <div class="contact-faq-item__content">
                    <p>
                        Oui, sauf indication contraire. Le porteur du billet pourra entrer avec un QR code valide,
                        mais ce QR code ne pourra être utilisé qu’une seule fois.
                    </p>
                </div>
            </article>

            <article class="contact-faq-item" data-reveal="zoom" data-reveal-delay="280">
                <button type="button" class="contact-faq-item__button" data-contact-faq-toggle aria-expanded="false">
                    <span>Peut-on sortir et rentrer à nouveau ?</span>
                    <span class="material-symbols-outlined">expand_more</span>
                </button>

                <div class="contact-faq-item__content">
                    <p>
                        Non. Pour des raisons de sécurité, toute sortie est définitive.
                        Le QR code ne permet pas une ré-entrée.
                    </p>
                </div>
            </article>

            <article class="contact-faq-item" data-reveal="zoom" data-reveal-delay="350">
                <button type="button" class="contact-faq-item__button" data-contact-faq-toggle aria-expanded="false">
                    <span>Quels sont les âges minimums pour l’alcool ?</span>
                    <span class="material-symbols-outlined">expand_more</span>
                </button>

                <div class="contact-faq-item__content">
                    <p>
                        La bière est autorisée à partir de 16 ans. Les alcools forts sont autorisés à partir de 18 ans.
                        Une carte d’identité peut être demandée sur place.
                    </p>
                </div>
            </article>
        </div>
    </section>

    <section class="contact-social-section">
        <div class="contact-social-banner" data-reveal="zoom">
            <div>
                <p class="section-kicker">Réseaux sociaux</p>

                <h2>Suivez les annonces</h2>

                <p>
                    Retrouvez les infos importantes, les annonces de line-up, les rappels billetterie
                    et les photos de nos événements sur nos réseaux.
                </p>
            </div>

            <div class="contact-social-banner__actions">
                <a href="#" class="contact-social-button">
                    Instagram
                    <span class="material-symbols-outlined">arrow_outward</span>
                </a>

                <a href="#" class="contact-social-button">
                    Facebook
                    <span class="material-symbols-outlined">arrow_outward</span>
                </a>
            </div>
        </div>
    </section>
@endsection
