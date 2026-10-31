@extends('layouts.main')

@section('title', 'Hasil Prediksi')

@section('content')
    <h1>Hasil prediksi</h1>
    <p class="pengantar">Data berikut sudah tersimpan di riwayat prediksi.</p>

    @include('partials.skala', ['nilai' => $prediksi->kelembapan_tanah])

    <div class="tabel-gulir">
        <table class="tabel tabel--hasil">
            <tbody>
                <tr>
                    <th scope="row">Lokasi lahan</th>
                    <td>{{ $prediksi->lokasi }}</td>
                </tr>
                <tr>
                    <th scope="row">Nama tanaman</th>
                    <td>{{ $prediksi->nama_tanaman }}</td>
                </tr>
                <tr>
                    <th scope="row">Suhu udara</th>
                    <td>{{ number_format($prediksi->suhu_udara, 1, ',', '.') }} °C</td>
                </tr>
                <tr>
                    <th scope="row">Kelembapan udara</th>
                    <td>{{ $prediksi->kelembapan_udara }}%</td>
                </tr>
                <tr>
                    <th scope="row">Kelembapan tanah</th>
                    <td>{{ $prediksi->kelembapan_tanah }}%</td>
                </tr>
                <tr>
                    <th scope="row">Status mikroklimat</th>
                    <td>
                        @if ($prediksi->status_mikroklimat === 'Kering')
                            <span class="lencana lencana--kering">Kering</span>
                            <span class="catatan">Kelembapan tanah di bawah 40%.</span>
                        @elseif ($prediksi->status_mikroklimat === 'Optimal')
                            <span class="lencana lencana--optimal">Optimal</span>
                            <span class="catatan">Kelembapan tanah 40–70%.</span>
                        @else
                            <span class="lencana lencana--lembap">Terlalu Lembap</span>
                            <span class="catatan">Kelembapan tanah di atas 70%.</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th scope="row">Rekomendasi</th>
                    <td>{{ $rekomendasi }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="tombol-baris">
        <a class="tombol" href="{{ route('prediksi') }}">Input prediksi baru</a>
        <a class="tombol tombol--sekunder" href="{{ route('riwayat') }}">Lihat riwayat</a>
    </div>
@endsection
