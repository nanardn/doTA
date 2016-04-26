<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportBank extends Model
{
    //
    protected $table = 'laporan_bank';
    protected $fillable = ['bulan', 'id_pendanaan_bank', 'tahun'];
    //protected $table = 'laporan_crowd';
    public function pendanaanbank() {
         return $this->belongsTo(pendanaanbank::class, 'id_umkm', 'id_pendanaan_bank');
     }
}
