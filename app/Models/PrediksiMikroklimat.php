<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrediksiMikroklimat extends Model
{
    protected $table = 'prediksi_mikroklimat';

    protected $fillable = [
        'lokasi',
        'nama_tanaman',
        'suhu_udara',
        'kelembapan_udara',
        'kelembapan_tanah',
        'status_mikroklimat',
    ];

    protected $casts = [
        'suhu_udara'       => 'float',
        'kelembapan_udara' => 'integer',
        'kelembapan_tanah' => 'integer',
    ];

    /** Kelas CSS untuk lencana status: kering | optimal | lembap. */
    public function getKelasStatusAttribute(): string
    {
        return match ($this->status_mikroklimat) {
            'Kering'  => 'kering',
            'Optimal' => 'optimal',
            default   => 'lembap',
        };
    }
}
