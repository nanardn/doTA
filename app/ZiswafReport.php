<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PendanaanZiswaf;
class ZiswafReport extends Model
{
    //
    protected $fillable = ['bulan', 'id_pendanaan', 'tahun'];
    protected $table = 'laporan_ziswaf';
    public function pendanaanZiswaf() {
         return $this->belongsTo(PendanaanZiswaf::class, 'id_umkm', 'id_pendanaan_ziswaf');
     }
}
