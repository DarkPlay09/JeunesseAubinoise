@extends('layouts.public')

@section('title', 'Mot de passe oublié | La Jeunesse Aubinoise')
@section('description', 'Réinitialisez votre mot de passe Jeunesse Aubinoise.')
@section('body_class', 'page-login')

@section('content')
    <main class="login-page">
        <section class="login-card">
            <div class="login-card__header">
                <h1>Mot de passe oublié</h1>

                <p>
                    Indiquez votre adresse e-mail pour recevoir un lien de réinitialisation.
                </p>
            </div>

            @if (session('status'))
                <div class="login-alert login-alert--success">
                    {{ session('status') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="login-alert login-alert--error">
                    {{ $errors->first() }}
                </div>
            @endif

            <form
                method="POST"
                action="{{ route('password.email') }}"
                class="login-form"
                data-forgot-password-form
                data-cooldown="{{ session('cooldown', 0) }}"
            >
                @csrf

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

                <button
                    type="submit"
                    class="login-form__submit"
                    data-forgot-password-submit
                >
                    Envoyer le lien
                </button>

                <p class="login-form__register">
                    Vous avez retrouvé votre mot de passe ?
                    <a href="{{ route('login') }}">Se connecter</a>
                </p>
            </form>
        </section>
    </main>
@endsection
