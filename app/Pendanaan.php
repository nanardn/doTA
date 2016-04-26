<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pendanaan extends Model
{

	public $table = "pendanaan";
  	
  	protected $fillable = ['nama_pj','nama_proyek','kategori','total_dana','sementara_dana','deskripsi','foto_proyek','foto_pj','status','tgl_pendanaan'];
  	
  	protected $primaryKey = 'id_pendanaan';

}
