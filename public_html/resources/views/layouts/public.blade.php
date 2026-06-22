<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'La Jeunesse Aubinoise')</title>
    <meta name="description" content="@yield('description', 'La Jeunesse Aubinoise organise les événements Safari et Storm à Aubin.')">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="site-body @yield('body_class')">
<x-public.navbar />

<main class="site-main">
    @yield('content')
</main>

<x-public.footer />
</body>
</html>
