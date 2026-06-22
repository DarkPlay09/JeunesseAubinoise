@extends('layouts.public')

@section('title', $title . ' | La Jeunesse Aubinoise')
@section('description', $description ?? 'Page en préparation.')
@section('body_class', 'page-placeholder')

@section('content')
    <section class="placeholder-page">
        <div>
            <p class="section-kicker">Bientôt disponible</p>
            <h1>{{ $title }}</h1>
            <p>{{ $description }}</p>

            <a href="{{ route('home') }}" class="button button-primary">
                Retour à l’accueil
            </a>
        </div>
    </section>
@endsection
