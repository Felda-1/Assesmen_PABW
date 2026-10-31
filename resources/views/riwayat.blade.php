@extends('layouts.main')

@section('title', 'Riwayat Prediksi')

@section('content')
    <h1>Riwayat Prediksi</h1>

    <p class="pengantar">
        {{ $riwayat->count() }} data tersimpan:
        Kering {{ $riwayat->where('status_mikroklimat', 'Kering')->count() }},
        Optimal {{ $riwayat->where('status_mikroklimat', 'Optimal')->count() }},
        Terlalu Lembap {{ $riwayat->where('status_mikroklimat', 'Terlalu Lembap')->count() }}.
    </p>

    <div class="tabel-gulir">
        <table class="tabel tabel--riwayat">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Waktu</th>
                    <th scope="col">Lokasi lahan</th>
                    <th scope="col">Tanaman</th>
                    <th scope="col" class="angka">Suhu (°C)</th>
                    <th scope="col" class="angka">Kelembapan udara (%)</th>
                    <th scope="col" class="angka">Kelembapan tanah (%)</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($riwayat as $p)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $p->created_at->format('d/m/Y H:i') }}</td>
                        <td>{{ $p->lokasi }}</td>
                        <td>{{ $p->nama_tanaman }}</td>
                        <td class="angka">{{ number_format($p->suhu_udara, 1, ',', '.') }}</td>
                        <td class="angka">{{ $p->kelembapan_udara }}</td>
                        <td class="angka">{{ $p->kelembapan_tanah }}</td>
                        <td><span class="lencana lencana--{{ $p->kelas_status }}">{{ $p->status_mikroklimat }}</span></td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="kosong">
                            Belum ada data. <a href="{{ route('prediksi') }}">Isi form prediksi</a> atau jalankan seeder.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
