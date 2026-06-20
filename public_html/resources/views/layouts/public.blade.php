<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'La Jeunesse Aubinoise')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-background text-on-background font-body-md antialiased selection:bg-storm-blue selection:text-white">
<x-public.navbar />

<main>
    @yield('content')
</main>

<x-public.footer />
</body>
</html>
