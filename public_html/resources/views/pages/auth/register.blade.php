@extends('layouts.public')

@section('title', 'Inscription | La Jeunesse Aubinoise')
@section('description', 'Créez votre compte Jeunesse Aubinoise.')
@section('body_class', 'page-login')

@section('content')
    <main class="login-page">
        <section class="login-card">
            <div class="login-card__header">
                <h1>Inscription</h1>

                <p>
                    Créez votre compte.
                </p>
            </div>

            <form method="POST" action="#" class="login-form">
                @csrf

                <div class="login-form__grid">
                    <div class="login-form__group">
                        <label for="firstname">Prénom</label>

                        <div class="login-form__field">
                            <span class="material-symbols-outlined login-form__field-icon">person</span>

                            <input
                                type="text"
                                id="firstname"
                                name="firstname"
                                placeholder="Votre prénom"
                                autocomplete="given-name"
                                required
                            >
                        </div>
                    </div>

                    <div class="login-form__group">
                        <label for="lastname">Nom</label>

                        <div class="login-form__field">
                            <span class="material-symbols-outlined login-form__field-icon">badge</span>

                            <input
                                type="text"
                                id="lastname"
                                name="lastname"
                                placeholder="Votre nom"
                                autocomplete="family-name"
                                required
                            >
                        </div>
                    </div>
                </div>

                <div class="login-form__group">
                    <label for="email">Adresse e-mail</label>

                    <div class="login-form__field">
                        <span class="material-symbols-outlined login-form__field-icon">mail</span>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            placeholder="vous@exemple.com"
                            autocomplete="email"
                            required
                        >
                    </div>
                </div>

                <div class="login-form__group">
                    <label for="password">Mot de passe</label>

                    <div class="login-form__field login-form__field--password">
                        <span class="material-symbols-outlined login-form__field-icon">lock</span>

                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="Votre mot de passe"
                            autocomplete="new-password"
                            minlength="8"
                            data-password-input
                            required
                        >

                        <button
                            type="button"
                            class="login-form__password-toggle"
                            data-password-toggle
                            aria-label="Afficher le mot de passe"
                            aria-pressed="false"
                        >
                            <span class="material-symbols-outlined">visibility</span>
                        </button>
                    </div>

                    <ul class="password-rules" data-password-rules>
                        <li data-password-rule="length">
                            <span class="material-symbols-outlined">close</span>
                            8 caractères minimum
                        </li>

                        <li data-password-rule="uppercase">
                            <span class="material-symbols-outlined">close</span>
                            Au moins une majuscule
                        </li>

                        <li data-password-rule="number">
                            <span class="material-symbols-outlined">close</span>
                            Au moins un chiffre
                        </li>
                    </ul>
                </div>

                <div class="login-form__group">
                    <label for="password_confirmation">Confirmer le mot de passe</label>

                    <div class="login-form__field login-form__field--password">
                        <span class="material-symbols-outlined login-form__field-icon">lock_reset</span>

                        <input
                            type="password"
                            id="password_confirmation"
                            name="password_confirmation"
                            placeholder="Confirmez votre mot de passe"
                            autocomplete="new-password"
                            required
                        >

                        <button
                            type="button"
                            class="login-form__password-toggle"
                            data-password-toggle
                            aria-label="Afficher le mot de passe"
                            aria-pressed="false"
                        >
                            <span class="material-symbols-outlined">visibility</span>
                        </button>
                    </div>
                </div>

                <label class="login-form__remember">
                    <input type="checkbox" name="terms" required>

                    <span>J’accepte les conditions d’utilisation.</span>
                </label>

                <div class="login-form__honeypot" aria-hidden="true">
                    <label for="website">Site web</label>
                    <input
                        type="text"
                        id="website"
                        name="website"
                        tabindex="-1"
                        autocomplete="off"
                    >
                </div>

                <button type="submit" class="login-form__submit">
                    Créer mon compte
                </button>

                <p class="login-form__register">
                    Déjà un compte ?
                    <a href="{{ route('login') }}">Se connecter</a>
                </p>
            </form>
        </section>
    </main>
@endsection
