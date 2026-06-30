@extends('layouts.public')

@section('title', 'Connexion | La Jeunesse Aubinoise')
@section('description', 'Connectez-vous à votre espace Jeunesse Aubinoise.')
@section('body_class', 'page-login')

@section('content')
    <main class="login-page">
        <section class="login-card">
            <div class="login-card__header">
                <h1>Connexion</h1>

                <p>
                    Connectez-vous à votre compte.
                </p>
            </div>

            <form method="POST" action="{{ route('login.store') }}" class="login-form">
                @csrf

                @if ($errors->any())
                    <div class="login-form__alert">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                @if (session('status'))
                    <div class="login-form__alert login-form__alert--success">
                        <p>{{ session('status') }}</p>
                    </div>
                @endif

                <div class="login-form__group">
                    <label for="email">Adresse e-mail</label>

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
                        <label for="password">Mot de passe</label>

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
                            placeholder="Votre mot de passe"
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
                    <input type="checkbox" name="remember">

                    <span>Se souvenir de moi</span>
                </label>

                <button type="submit" class="login-form__submit">
                    Se connecter
                </button>

                <p class="login-form__register">
                    Pas encore de compte ?
                    <a href="{{ route('register') }}">Créer un compte</a>
                </p>
            </form>
        </section>
    </main>
@endsection
