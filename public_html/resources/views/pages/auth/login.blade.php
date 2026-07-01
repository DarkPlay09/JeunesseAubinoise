@extends('layouts.public')

@section('title', 'Connexion | La Jeunesse Aubinoise')
@section('description', 'Connectez-vous à votre espace Jeunesse Aubinoise.')
@section('body_class', 'page-login page-login-brutalist')

@section('content')
    <main class="login-page">
        <section class="login-visual" aria-hidden="true">
            <img
                src="{{ asset('images/pages/home/hero.jpg') }}"
                alt=""
                class="login-visual__image"
            >

            <div class="login-visual__overlay"></div>
            <div class="login-visual__grid"></div>

            <div class="login-visual__watermark">
            </div>
        </section>

        <section class="login-panel">
            <div class="login-panel__inner">
                <header class="login-card__header">
                    <h1>Accéder à mon compte</h1>

                    <p>
                        Connectez-vous pour retrouver vos tickets, vos achats
                        et les informations utiles de La Jeunesse Aubinoise.
                    </p>
                </header>

                <div class="login-divider" aria-hidden="true"></div>

                <form method="POST" action="{{ route('login.store') }}" class="login-form">
                    @csrf

                    @if ($errors->any())
                        <div class="login-form__alert">
                            <span class="material-symbols-outlined">error</span>

                            <div>
                                @foreach ($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    @if (session('status'))
                        <div class="login-form__alert login-form__alert--success">
                            <span class="material-symbols-outlined">check_circle</span>
                            <p>{{ session('status') }}</p>
                        </div>
                    @endif

                    <div class="login-form__group">
                        <div class="login-form__label-row">
                            <label for="email">Identifiant / email *</label>
                        </div>

                        <div class="login-form__field">
                            <span class="material-symbols-outlined login-form__field-icon">mail</span>

                            <input
                                type="email"
                                id="email"
                                name="email"
                                value="{{ old('email') }}"
                                placeholder="vous@exemple.com"
                                autocomplete="email"
                                required
                            >
                        </div>
                    </div>

                    <div class="login-form__group">
                        <div class="login-form__label-row">
                            <label for="password">Mot de passe *</label>

                            <a href="{{ route('password.request') }}" class="login-form__small-link">
                                Mot de passe oublié ?
                            </a>
                        </div>

                        <div class="login-form__field login-form__field--password">
                            <span class="material-symbols-outlined login-form__field-icon">lock</span>

                            <input
                                type="password"
                                id="password"
                                name="password"
                                placeholder="••••••••"
                                autocomplete="current-password"
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
                        <span class="login-form__checkbox">
                            <input type="checkbox" name="remember">
                            <span></span>
                        </span>

                        <span>Rester connecté</span>
                    </label>

                    <button type="submit" class="login-form__submit">
                        Se connecter
                        <span class="material-symbols-outlined">arrow_forward</span>
                    </button>

                    <div class="login-speed-lines" aria-hidden="true">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>

                    <p class="login-form__register">
                        <span>Pas encore de compte ?</span>
                        <a href="{{ route('register') }}">Créer un compte</a>
                    </p>

                    <div class="login-form__links">
                        <a href="{{ route('home') }}">Accueil</a>
                        <span>•</span>
                        <a href="{{ route('contact') }}">Aide & support</a>
                    </div>
                </form>
            </div>

            <div class="login-panel__stamp" aria-hidden="true">
                JA26
            </div>
        </section>
    </main>
@endsection
