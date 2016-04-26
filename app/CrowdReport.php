<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CrowdReport extends Model
{
	protected $fillable = ['bulan', 'id_pendanaan', 'tahun'];
    protected $table = 'laporan_crowd';
    public function pendanaan() {
         return $this->belongsTo(Pendanaan::class, 'id_umkm', 'id_pendanaan');
     }
}