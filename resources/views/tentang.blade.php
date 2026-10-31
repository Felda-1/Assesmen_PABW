@extends('layouts.main')

@section('title', 'Tentang')

@section('content')
    <div class="tentang">
        <h1>Tentang AgroClima</h1>
        <p class="pengantar">Sistem pemantauan mikroklimat lahan pertanian Kabupaten Garut.</p>

        <div class="tentang__grid">
            <section class="bagian bagian--tujuan">
                <h2>Tujuan sistem</h2>
                <p>
                    AgroClima membantu petani menilai kondisi mikroklimat lahan dengan cepat. Dari hasil pengukuran,
                    sistem menentukan apakah tanah kering, optimal, atau terlalu lembap, lalu memberi rekomendasi perawatan.
                    Setiap prediksi tersimpan sebagai riwayat sehingga perubahan kondisi lahan bisa ditelusuri.
                </p>
            </section>

            <section class="bagian bagian--lokasi">
                <h2>Lokasi pemantauan</h2>
                <p>Pemantauan dilakukan di tiga kecamatan di Kabupaten Garut:</p>
                <ul class="daftar-lokasi">
                    <li>Garut Kota</li>
                    <li>Tarogong Kaler</li>
                    <li>Samarang</li>
                </ul>
            </section>

            <section class="bagian bagian--tabel">
                <h2>Parameter mikroklimat</h2>
                <div class="tabel-gulir">
                    <table class="tabel">
                        <thead>
                            <tr>
                                <th scope="col">Parameter</th>
                                <th scope="col">Satuan</th>
                                <th scope="col">Kegunaan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Suhu udara</td>
                                <td>°C</td>
                                <td>Menunjukkan kondisi panas di sekitar tanaman.</td>
                            </tr>
                            <tr>
                                <td>Kelembapan udara</td>
                                <td>%</td>
                                <td>Menunjukkan kadar uap air di udara sekitar lahan.</td>
                            </tr>
                            <tr>
                                <td>Kelembapan tanah</td>
                                <td>%</td>
                                <td>Dasar penentuan status: Kering, Optimal, atau Terlalu Lembap.</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>

            <section class="bagian bagian--lstm">
                <h2>Teknologi LSTM</h2>
                <p>
                    LSTM (Long Short-Term Memory) adalah jenis jaringan saraf tiruan untuk data berurutan, seperti catatan
                    suhu dan kelembapan dari waktu ke waktu. Model ini cocok untuk memperkirakan kondisi lahan berikutnya.
                </p>
                <p class="catatan-simulasi">
                    Pada aplikasi ini prediksi LSTM masih disimulasikan: data diisi manual melalui form,
                    tanpa model maupun sensor IoT sungguhan.
                </p>
            </section>
        </div>
    </div>
@endsection