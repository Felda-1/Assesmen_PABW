<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Dashboard') | AgroClima Garut</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bitter:wght@500;700&family=Public+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/agroclima.css') }}">
</head>
<body>
    <header class="kepala">
        <div class="wadah">
            <p class="kepala__judul">AgroClima Kabupaten Garut</p>
            <p class="kepala__sub">Pemantauan mikroklimat lahan pertanian</p>
        </div>
    </header>

    @include('partials.navbar')

    <main class="wadah isi">
        @yield('content')
    </main>

    <footer class="kaki">
        <div class="wadah">
            <p>© 2026 AgroClima Kelompok Tani Makmur Kabupaten Garut</p>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>
