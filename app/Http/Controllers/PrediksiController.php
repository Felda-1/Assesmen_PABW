<?php

namespace App\Http\Controllers;

use App\Models\PrediksiMikroklimat;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PrediksiController extends Controller
{
    /** Lokasi pemantauan (dipakai dropdown, validasi, dan seeder). */
    public const LOKASI = ['Garut Kota', 'Tarogong Kaler', 'Samarang'];

    /** Menampilkan form input prediksi. */
    public function form()
    {
        return view('prediksi', ['daftarLokasi' => self::LOKASI]);
    }

    /** Validasi, hitung status, simpan ke database, tampilkan hasil. */
    public function prosesData(Request $request)
    {
        $data = $request->validate([
            'lokasi'           => ['required', Rule::in(self::LOKASI)],
            'nama_tanaman'     => ['required', 'string', 'max:100'],
            'suhu_udara'       => ['required', 'numeric', 'between:0,60'],
            'kelembapan_udara' => ['required', 'integer', 'between:0,100'],
            'kelembapan_tanah' => ['required', 'integer', 'between:0,100'],
        ], [
            'required' => ':attribute wajib diisi.',
            'numeric'  => ':attribute harus berupa angka.',
            'integer'  => ':attribute harus berupa bilangan bulat.',
            'between'  => ':attribute harus di antara :min dan :max.',
            'max'      => ':attribute maksimal :max karakter.',
            'in'       => 'Pilih salah satu lokasi yang tersedia.',
        ], [
            'lokasi'           => 'Lokasi lahan',
            'nama_tanaman'     => 'Nama tanaman',
            'suhu_udara'       => 'Suhu udara (°C)',
            'kelembapan_udara' => 'Kelembapan udara (%)',
            'kelembapan_tanah' => 'Kelembapan tanah (%)',
        ]);

        // Pengolahan status dilakukan di Controller, berdasarkan kelembapan tanah.
        $status      = self::tentukanStatus((int) $data['kelembapan_tanah']);
        $rekomendasi = self::tentukanRekomendasi($status);

        $prediksi = PrediksiMikroklimat::create([
            'lokasi'             => $data['lokasi'],
            'nama_tanaman'       => $data['nama_tanaman'],
            'suhu_udara'         => $data['suhu_udara'],
            'kelembapan_udara'   => $data['kelembapan_udara'],
            'kelembapan_tanah'   => $data['kelembapan_tanah'],
            'status_mikroklimat' => $status,
        ]);

        return view('hasil', compact('prediksi', 'rekomendasi'));
    }

    /** Menampilkan seluruh data prediksi dari database. */
    public function riwayat()
    {
        $riwayat = PrediksiMikroklimat::latest()->latest('id')->get();

        return view('riwayat', compact('riwayat'));
    }

    /** < 40 = Kering, 40–70 = Optimal, > 70 = Terlalu Lembap. Juga dipakai seeder. */
    public static function tentukanStatus(int $kelembapanTanah): string
    {
        if ($kelembapanTanah < 40) {
            return 'Kering';
        }

        if ($kelembapanTanah <= 70) {
            return 'Optimal';
        }

        return 'Terlalu Lembap';
    }

    public static function tentukanRekomendasi(string $status): string
    {
        return match ($status) {
            'Kering'  => 'Segera lakukan penyiraman atau irigasi.',
            'Optimal' => 'Pertahankan pola perawatan saat ini.',
            default   => 'Kurangi penyiraman dan periksa drainase.',
        };
    }
}
