<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('description', 'La Jeunesse Aubinoise organise des événements festifs à Aubin : Safari, Storm, programme et galerie.')">
    <title>@yield('title', 'La Jeunesse Aubinoise')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="ja-site @yield('bodyClass')">
    <x-public.navbar />

    <main>
        @yield('content')
    </main>

    <x-public.footer />
</body>
</html>
