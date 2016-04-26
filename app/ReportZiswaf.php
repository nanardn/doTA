<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportZiswaf extends Model
{
    //
    
    //
    protected $fillable = ['bulan', 'id_pendanaan_ziswaf', 'tahun'];
    protected $table = 'laporan_ziswaf';
    public function pendanaanZiswaf() {
         return $this->belongsTo(PendanaanZiswaf::class, 'id_umkm', 'id_pendanaan_ziswaf');
     }
}
