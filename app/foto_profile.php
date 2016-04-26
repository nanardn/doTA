<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class foto_profile extends Model
{
    public $table = "foto_profile";
  	
  	protected $fillable = ['id_user','url_foto'];
  	
  	protected $primaryKey = 'id_fotoprofile';
  	
}
