<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pendanaanbank extends Model
{
    //
    public $table = "fund_bank";
  	
  	protected $fillable = ['nama_pj','nama_proyek','id_bank','id_umkm','total_dana','status','tgl_pendanaan'];
  	
  	protected $primaryKey = 'id_pendanaan_bank';
}
