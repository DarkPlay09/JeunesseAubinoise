@extends('layouts.public')

@section('title', 'Notifications | La Jeunesse Aubinoise')
@section('description', 'Retrouvez toutes vos notifications.')
@section('body_class', 'page-notifications')

@section('content')
    <main class="notifications-page">
        <section class="notifications-shell">
            <header class="notifications-header">
                <p class="section-kicker">Espace membre</p>

                <div class="notifications-header__row">
                    <div>
                        <h1>Notifications</h1>

                        <p>
                            Retrouvez ici les dernières informations utiles liées à vos tickets, vos achats et aux événements.
                        </p>
                    </div>

                    <button
                        type="button"
                        class="notifications-clear-button notifications-clear-button--icon"
                        data-notifications-clear
                        aria-label="Supprimer toutes les notifications"
                        title="Supprimer toutes les notifications"
                    >
                        <span class="material-symbols-outlined">delete</span>
                    </button>
                </div>
            </header>

            <section class="notifications-list" data-notifications-page-list></section>

            <div class="notifications-empty" data-notifications-empty hidden>
                <span class="material-symbols-outlined">notifications_off</span>

                <h2>Aucune notification</h2>

                <p>
                    Vous n’avez plus de notifications pour le moment.
                </p>
            </div>
        </section>
    </main>
@endsection
