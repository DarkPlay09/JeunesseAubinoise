@extends('layouts.public')

@section('title', 'Réinitialisation | La Jeunesse Aubinoise')
@section('description', 'Choisissez un nouveau mot de passe.')
@section('body_class', 'page-login')

@section('content')
    <main class="login-page">
        <section class="login-card">
            <div class="login-card__header">
                <h1>Nouveau mot de passe</h1>

                <p>
                    Choisissez un nouveau mot de passe pour votre compte.
                </p>
            </div>

            @if ($errors->any())
                <div class="login-alert login-alert--error">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.update') }}" class="login-form">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="login-form__group">
                    <label for="email">Adresse e-mail</label>

                    <div class="login-form__field">
                        <span class="material-symbols-outlined login-form__field-icon">mail</span>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="{{ old('email', $email) }}"
                            placeholder="vous@exemple.com"
                            autocomplete="email"
                            required
                        >
                    </div>
                </div>

                <div class="login-form__group">
                    <label for="password">Nouveau mot de passe</label>

                    <div class="login-form__field login-form__field--password">
                        <span class="material-symbols-outlined login-form__field-icon">lock</span>

                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="Votre nouveau mot de passe"
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

                <button type="submit" class="login-form__submit">
                    Modifier mon mot de passe
                </button>
            </form>
        </section>
    </main>
@endsection
