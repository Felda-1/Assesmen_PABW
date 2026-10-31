@extends('layouts.main')

@section('title', 'Input Prediksi')

@section('content')
    <h1>Input Prediksi Mikroklimat</h1>

    @if ($errors->any())
        <div class="galat-ringkas" role="alert">
            Ada isian yang perlu diperbaiki. Lihat pesan di bawah kolom terkait.
        </div>
    @endif

    <form method="POST" action="{{ route('hasil-prediksi') }}" class="form" novalidate>
        @csrf

        <div class="form__baris">
            <div class="bidang">
                <label for="lokasi">Lokasi lahan</label>
                <select id="lokasi" name="lokasi" required class="@error('lokasi') tidak-valid @enderror">
                    <option value="">Pilih lokasi</option>
                    @foreach ($daftarLokasi as $lokasi)
                        <option value="{{ $lokasi }}" {{ old('lokasi') === $lokasi ? 'selected' : '' }}>{{ $lokasi }}</option>
                    @endforeach
                </select>
                @error('lokasi') <p class="galat">{{ $message }}</p> @enderror
            </div>

            <div class="bidang">
                <label for="nama_tanaman">Nama tanaman</label>
                <input type="text" id="nama_tanaman" name="nama_tanaman" list="daftar-tanaman" maxlength="100"
                       value="{{ old('nama_tanaman') }}" required class="@error('nama_tanaman') tidak-valid @enderror">
                <datalist id="daftar-tanaman">
                    <option value="Padi"><option value="Jagung"><option value="Cabai">
                </datalist>
                @error('nama_tanaman') <p class="galat">{{ $message }}</p> @enderror
            </div>
        </div>

        <div class="form__baris">
            <div class="bidang">
                <label for="suhu_udara">Suhu udara (°C)</label>
                <input type="number" id="suhu_udara" name="suhu_udara" step="0.1" min="0" max="60"
                       value="{{ old('suhu_udara') }}" required class="@error('suhu_udara') tidak-valid @enderror">
                @error('suhu_udara') <p class="galat">{{ $message }}</p> @enderror
            </div>

            <div class="bidang">
                <label for="kelembapan_udara">Kelembapan udara (%)</label>
                <input type="number" id="kelembapan_udara" name="kelembapan_udara" step="1" min="0" max="100"
                       value="{{ old('kelembapan_udara') }}" required class="@error('kelembapan_udara') tidak-valid @enderror">
                @error('kelembapan_udara') <p class="galat">{{ $message }}</p> @enderror
            </div>

            <div class="bidang">
                <label for="kelembapan_tanah">Kelembapan tanah (%)</label>
                <input type="number" id="kelembapan_tanah" name="kelembapan_tanah" step="1" min="0" max="100"
                       value="{{ old('kelembapan_tanah') }}" required class="@error('kelembapan_tanah') tidak-valid @enderror">
                @error('kelembapan_tanah') <p class="galat">{{ $message }}</p> @enderror
            </div>
        </div>

        <div class="pratinjau" aria-live="polite">
            <p class="pratinjau__judul">Perkiraan status tanah</p>
            @include('partials.skala', ['nilai' => null])
            <p id="pratinjau-status" class="pratinjau__teks">Isi kelembapan tanah untuk melihat statusnya.</p>
        </div>

        <button type="submit" class="tombol">Proses prediksi</button>
    </form>
@endsection

@push('scripts')
    <script>
        // Pratinjau saja; status resmi tetap dihitung di server (PrediksiController).
        (function () {
            var input = document.getElementById('kelembapan_tanah');
            var penanda = document.querySelector('.skala__penanda');
            var angka = penanda.querySelector('.skala__nilai');
            var teks = document.getElementById('pratinjau-status');
            var awal = teks.textContent;

            function perbarui() {
                var v = parseFloat(input.value);
                if (isNaN(v) || v < 0 || v > 100) {
                    penanda.hidden = true;
                    teks.textContent = awal;
                    return;
                }
                penanda.hidden = false;
                penanda.style.left = v + '%';
                angka.textContent = v + '%';
                if (v < 40) {
                    teks.textContent = 'Kering. Segera lakukan penyiraman atau irigasi.';
                } else if (v <= 70) {
                    teks.textContent = 'Optimal. Pertahankan pola perawatan saat ini.';
                } else {
                    teks.textContent = 'Terlalu Lembap. Kurangi penyiraman dan periksa drainase.';
                }
            }

            input.addEventListener('input', perbarui);
            perbarui();
        })();
    </script>
@endpush
