@extends('layouts.public')

@section('title', 'Mon profil | La Jeunesse Aubinoise')
@section('description', 'Gérez les informations de votre compte.')
@section('body_class', 'page-account page-account-profile')

@section('content')
    <main class="account-page">
        <section class="account-shell">
            <header class="account-header">
                <p class="section-kicker">Espace membre</p>

                <h1>Mon profil</h1>

                <p>
                    Gérez vos informations personnelles et la sécurité de votre compte.
                </p>
            </header>

            <div class="account-grid account-grid--profile">
                <section class="account-card">
                    <div class="account-card__header">
                        <div>
                            <h2>Informations personnelles</h2>

                            <p>
                                Ces informations seront utilisées pour vos commandes et vos tickets.
                            </p>
                        </div>

                        <span class="account-card__icon material-symbols-outlined">person</span>
                    </div>

                    @if (session('profile_status'))
                        <div class="account-alert account-alert--success">
                            <span class="material-symbols-outlined">check_circle</span>
                            {{ session('profile_status') }}
                        </div>
                    @endif

                    <form action="{{ route('account.profile.update') }}" method="POST" class="account-form" data-profile-form>
                        @csrf
                        @method('PATCH')

                        <div class="account-form__grid">
                            <div class="account-field">
                                <label for="first_name">Prénom</label>

                                <input
                                    type="text"
                                    id="first_name"
                                    name="first_name"
                                    value="{{ old('first_name', auth()->user()->first_name) }}"
                                    autocomplete="given-name"
                                    data-profile-input
                                    required
                                >

                                @error('first_name')
                                    <small class="account-field__error">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="account-field">
                                <label for="last_name">Nom</label>

                                <input
                                    type="text"
                                    id="last_name"
                                    name="last_name"
                                    value="{{ old('last_name', auth()->user()->last_name) }}"
                                    autocomplete="family-name"
                                    data-profile-input
                                    required
                                >

                                @error('last_name')
                                    <small class="account-field__error">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="account-field">
                            <label for="email">Adresse e-mail</label>

                            <input
                                type="email"
                                id="email"
                                name="email"
                                value="{{ auth()->user()->email }}"
                                autocomplete="email"
                                readonly
                                class="is-readonly"
                            >

                            <small class="account-field__hint">
                                L’adresse e-mail ne peut pas être modifiée depuis cette page.
                            </small>
                        </div>

                        <button
                            type="submit"
                            class="account-button account-button--primary"
                            data-profile-save
                            disabled
                        >
                            Enregistrer les modifications
                        </button>
                    </form>
                </section>

                <section class="account-card">
                    <div class="account-card__header">
                        <div>
                            <h2>Sécurité</h2>

                            <p>
                                Modifiez votre mot de passe pour sécuriser votre compte.
                            </p>
                        </div>

                        <span class="account-card__icon material-symbols-outlined">lock</span>
                    </div>

                    @if (session('password_status'))
                        <div class="account-alert account-alert--success">
                            <span class="material-symbols-outlined">check_circle</span>
                            {{ session('password_status') }}
                        </div>
                    @endif

                    <form action="{{ route('account.password.update') }}" method="POST" class="account-form">
                        @csrf
                        @method('PATCH')

                        <div class="account-field">
                            <label for="current_password">Mot de passe actuel</label>

                            <div class="account-password-field">
                                <input
                                    type="password"
                                    id="current_password"
                                    name="current_password"
                                    autocomplete="current-password"
                                    required
                                >

                                <button
                                    type="button"
                                    class="account-password-toggle"
                                    data-account-password-toggle
                                    aria-label="Afficher le mot de passe"
                                    aria-pressed="false"
                                >
                                    <span class="material-symbols-outlined">visibility</span>
                                </button>
                            </div>

                            @error('current_password')
                                <small class="account-field__error">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="account-field">
                            <label for="password">Nouveau mot de passe</label>

                            <div class="account-password-field">
                                <input
                                    type="password"
                                    id="password"
                                    name="password"
                                    autocomplete="new-password"
                                    minlength="8"
                                    data-account-password-input
                                    required
                                >

                                <button
                                    type="button"
                                    class="account-password-toggle"
                                    data-account-password-toggle
                                    aria-label="Afficher le mot de passe"
                                    aria-pressed="false"
                                >
                                    <span class="material-symbols-outlined">visibility</span>
                                </button>
                            </div>

                            <ul class="account-password-rules" data-account-password-rules>
                                <li data-account-password-rule="length">
                                    <span class="material-symbols-outlined">close</span>
                                    8 caractères minimum
                                </li>

                                <li data-account-password-rule="uppercase">
                                    <span class="material-symbols-outlined">close</span>
                                    Au moins une majuscule
                                </li>

                                <li data-account-password-rule="number">
                                    <span class="material-symbols-outlined">close</span>
                                    Au moins un chiffre
                                </li>
                            </ul>

                            @error('password')
                                <small class="account-field__error">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="account-field">
                            <label for="password_confirmation">Confirmer le mot de passe</label>

                            <div class="account-password-field">
                                <input
                                    type="password"
                                    id="password_confirmation"
                                    name="password_confirmation"
                                    autocomplete="new-password"
                                    required
                                >

                                <button
                                    type="button"
                                    class="account-password-toggle"
                                    data-account-password-toggle
                                    aria-label="Afficher le mot de passe"
                                    aria-pressed="false"
                                >
                                    <span class="material-symbols-outlined">visibility</span>
                                </button>
                            </div>
                        </div>

                        <button type="submit" class="account-button account-button--secondary">
                            Modifier le mot de passe
                        </button>
                    </form>
                </section>
            </div>
        </section>
    </main>
@endsection
