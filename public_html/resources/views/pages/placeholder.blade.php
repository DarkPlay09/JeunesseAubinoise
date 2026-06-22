@extends('layouts.public')

@section('title', $title . ' | La Jeunesse Aubinoise')
@section('description', $description)

@section('content')
    <section class="placeholder-page">
        <p class="eyebrow">La Jeunesse Aubinoise</p>
        <h1>{{ $title }}</h1>
        <p>{{ $description }}</p>
        <a href="{{ route('home') }}" class="btn btn-primary">Retour à l'accueil</a>
    </section>
@endsection
