<nav class="navbar" aria-label="Navigasi utama">
    <div class="wadah">
        <ul>
            <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'aktif' : '' }}" @if (request()->routeIs('home')) aria-current="page" @endif>Dashboard</a></li>
            <li><a href="{{ route('tentang') }}" class="{{ request()->routeIs('tentang') ? 'aktif' : '' }}" @if (request()->routeIs('tentang')) aria-current="page" @endif>Tentang</a></li>
            <li><a href="{{ route('prediksi') }}" class="{{ request()->routeIs('prediksi', 'hasil-prediksi') ? 'aktif' : '' }}" @if (request()->routeIs('prediksi', 'hasil-prediksi')) aria-current="page" @endif>Input Prediksi</a></li>
            <li><a href="{{ route('riwayat') }}" class="{{ request()->routeIs('riwayat') ? 'aktif' : '' }}" @if (request()->routeIs('riwayat')) aria-current="page" @endif>Riwayat Prediksi</a></li>
        </ul>
    </div>
</nav>
