<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class laporan extends Model
{
    public $table = "laporan";
  	
  	protected $fillable = ['file_laporan','deskripsi_laporan','waktu_laporan'];
  	
  	protected $primaryKey = 'id_laporan';
  	
}
