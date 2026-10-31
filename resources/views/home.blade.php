@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')
    <section class="pembuka">
        <h1>Pantau kelembapan tanah, 
            putuskan kapan menyiram!</h1>
        <p class="pengantar">
            AgroClima membantu Kelompok Tani Makmur membaca kondisi mikroklimat lahan di Garut Kota,
            Tarogong Kaler, dan Samarang. Masukkan hasil pengukuran, lalu lihat status tanah dan tindakan yang disarankan.
        </p>
        <div class="tombol-baris">
            <a class="tombol" href="{{ route('prediksi') }}">Input prediksi</a>
            <a class="tombol tombol--sekunder" href="{{ route('riwayat') }}">Lihat riwayat</a>
        </div>
    </section>

    <section>
        <h2>Status ditentukan dari kelembapan tanah pada lahan.</h2>

        @include('partials.skala')

        <div class="tabel-gulir">
            <table class="tabel">
                <thead>
                    <tr>
                        <th scope="col">Status</th>
                        <th scope="col">Kelembapan tanah</th>
                        <th scope="col">Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><span class="lencana lencana--kering">Kering</span></td>
                        <td>di bawah 40%</td>
                        <td>Segera lakukan penyiraman atau irigasi.</td>
                    </tr>
                    <tr>
                        <td><span class="lencana lencana--optimal">Optimal</span></td>
                        <td>40–70%</td>
                        <td>Pertahankan pola perawatan saat ini.</td>
                    </tr>
                    <tr>
                        <td><span class="lencana lencana--lembap">Terlalu Lembap</span></td>
                        <td>di atas 70%</td>
                        <td>Kurangi penyiraman dan periksa drainase.</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
@endsection
