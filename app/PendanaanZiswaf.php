<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PendanaanZiswaf extends Model
{
    //
      public $table = "fund_ziswaf";
  	
  	protected $fillable = ['nama_pendanaan','tgl_pendanaan','id_umkm','total_dana'];
  	
  	protected $primaryKey = 'id_pendanaan_bank';
}
