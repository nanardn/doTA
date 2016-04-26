<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BankFund extends Model
{
    //
    protected $fillable = ['nama_pj','nama_proyek', 'total_dana', 'id_bank', 'tgl_pendanaan'];
    protected $table = 'fund_bank';

	
}
