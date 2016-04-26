<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','url_foto',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getID(){
        return $this->id;
    }
     public function pendanaan() {
   return $this->hasMany(Pendanaan::class, 'id_umkm', 'id');
    }
    public function crowdReport() {
         return $this->hasManyThrough(CrowdReport::class, Pendanaan::class, 'id_umkm', 'id_pendanaan');
     }
     public function fund_ziswaf() {
         return $this->hasMany(PendanaanZiswaf::class, 'id_umkm', 'id');
     }
}

