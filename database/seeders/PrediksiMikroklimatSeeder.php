<?php

namespace Database\Seeders;

use App\Http\Controllers\PrediksiController;
use App\Models\PrediksiMikroklimat;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class PrediksiMikroklimatSeeder extends Seeder
{
    public function run(): void
    {
        $faker   = Faker::create('id_ID');
        $tanaman = ['Padi', 'Jagung', 'Cabai'];

        // 6 data per kategori (total 18) agar Kering, Optimal, dan Terlalu Lembap pasti terwakili.
        $rentangTanah = [[20, 39], [40, 70], [71, 90]];
        $nilaiTanah   = [];

        foreach ($rentangTanah as [$min, $maks]) {
            for ($i = 0; $i < 6; $i++) {
                $nilaiTanah[] = $faker->numberBetween($min, $maks);
            }
        }

        shuffle($nilaiTanah);

        foreach ($nilaiTanah as $tanah) {
            PrediksiMikroklimat::forceCreate([
                'lokasi'             => $faker->randomElement(PrediksiController::LOKASI),
                'nama_tanaman'       => $faker->randomElement($tanaman),
                'suhu_udara'         => $faker->randomFloat(1, 18, 35),
                'kelembapan_udara'   => $faker->numberBetween(40, 100),
                'kelembapan_tanah'   => $tanah,
                // Aturan yang sama persis dengan Controller.
                'status_mikroklimat' => PrediksiController::tentukanStatus($tanah),
                'created_at'         => $faker->dateTimeBetween('-14 days', 'now'),
                'updated_at'         => now(),
            ]);
        }
    }
}
