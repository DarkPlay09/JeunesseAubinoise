@extends('layouts.public')

@section('title', 'Jeunesse Aubinoise | Storm')
@section('description', 'Storm Festival à Aubin : rave party, DJs, ambiance sombre et nouvelle identité rose.')
@section('bodyClass', 'page-event page-storm')

@section('content')
    <section class="party-hero party-hero--storm" style="--hero-image: url('{{ asset('images/events/storm/hero.jpg') }}');">
        <video autoplay muted loop playsinline preload="metadata" class="party-hero__media">
            <source src="{{ asset('videos/events/storm/storm-bg.mp4') }}" type="video/mp4">
        </video>
        <div class="party-hero__overlay"></div>

        <div class="party-hero__content">
            <p class="eyebrow">Rave Party</p>
            <h1 class="storm-title">Storm</h1>

            <div class="party-meta">
                <span>13 septembre 2025</span>
                <span>Aubin</span>
                <span>Tickets 12€</span>
            </div>

            <div class="countdown countdown--storm" data-countdown="2025-09-13T22:00:00">
                <div class="box"><h2 data-days>--</h2><span>Jours</span></div>
                <div class="box"><h2 data-hours>--</h2><span>Heures</span></div>
                <div class="box"><h2 data-minutes>--</h2><span>Minutes</span></div>
                <div class="box"><h2 data-seconds>--</h2><span>Secondes</span></div>
            </div>
        </div>
    </section>

    <section class="event-about event-about--dark" id="more-info">
        <article class="event-media-card">
            <img src="{{ asset('images/events/storm/poster.png') }}" alt="Affiche Storm Festival">
        </article>
        <article class="event-text-card">
            <p class="eyebrow">Storm Festival</p>
            <h2>Rave Party | Storm 13 septembre 2025</h2>
            <p class="date-party">Sam : 22h00 - 03h00 à Aubin</p>
            <p>C’est LA nouveauté 2025, LA soirée à ne pas manquer sur les hauteurs d’Aubin.</p>
            <p>La Jeunesse Aubinoise a le plaisir de vous présenter sa soirée <strong>Storm</strong>, une rave party comme peu de gens savent faire.</p>
            <p>Au programme, une grosse soirée avec 5 DJs d’exception qui vous feront danser sur des sons techno jusqu’aux petites heures.</p>
            <button type="button" class="btn btn-disabled">Épuisé</button>
        </article>
    </section>

    <section class="lineup-section lineup-section--storm">
        <p class="eyebrow">Line-up</p>
        <h2>Découvrez notre line-up</h2>
        <div class="artist-grid">
            <article class="artist-card">
                <img src="{{ asset('images/artists/elipter.jpg') }}" alt="Elipter">
                <h3>Elipter</h3>
                <p>Techno · D&B · Hard Techno</p>
            </article>
            <article class="artist-card">
                <img src="{{ asset('images/artists/mondello.jpg') }}" alt="Mondello">
                <h3>Mondello</h3>
                <p>Hard Techno</p>
            </article>
            <article class="artist-card">
                <img src="{{ asset('images/artists/furax.jpg') }}" alt="DJ Furax">
                <h3>DJ Furax</h3>
                <p>Oldschool & Jumpstyle</p>
            </article>
            <article class="artist-card">
                <img src="{{ asset('images/artists/mathisb.png') }}" alt="Mathis B">
                <h3>Mathis B</h3>
                <p>Hardstyle & Rawstyle</p>
            </article>
            <article class="artist-card">
                <img src="{{ asset('images/artists/nociid.jpg') }}" alt="Nociid">
                <h3>Nociid</h3>
                <p>Drum & Bass</p>
            </article>
        </div>
    </section>

    <section class="artist-detail artist-detail--storm">
        <article>
            <h2>Elipter</h2>
            <p>La soirée Storm débutera en force avec Elipter, le meilleur ami de la Jeunesse Aubinoise. Il proposera un set sur-mesure mêlant techno, drum and bass et hard techno.</p>
            <a href="https://www.instagram.com/elipter_/" target="_blank" rel="noopener">@elipter_</a>
        </article>
        <article>
            <h2>Nociid</h2>
            <p>Ensuite, place à Nociid pour faire gronder la tempête avec un set qui secouera les amateurs de Drum & Bass.</p>
            <a href="https://www.instagram.com/nociid.wav/" target="_blank" rel="noopener">@nociid.wav</a>
        </article>
        <article>
            <h2>DJ Furax</h2>
            <p>Une légende vivante des platines débarque à Storm. DJ Furax est prêt à faire trembler Aubin de minuit à 1h.</p>
            <a href="https://www.instagram.com/djfuraxofficial/" target="_blank" rel="noopener">@djfuraxofficial</a>
        </article>
    </section>
@endsection
