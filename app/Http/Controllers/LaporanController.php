<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\laporan;
use App\Http\Requests;

use DB;
use Illuminate\Pagination\LengthAwarePaginator;


class LaporanController extends Controller
{
    public function getInformasiLaporan($id){

		$laporanpendanaan = DB::table('laporan')
		            ->join('pendanaan', 'laporan.id_pendanaan', '=', 'pendanaan.id_pendanaan')
		            ->join('transaksi', 'transaksi.id_pendanaan', '=', 'pendanaan.id_pendanaan')
		            ->join('users', 'users.id', '=', 'transaksi.id')
		            ->select('pendanaan.nama_proyek', 'pendanaan.nama_pj', 'laporan.deskripsi_laporan', 'laporan.waktu_laporan' , 'laporan.file_laporan')
		            ->where('users.id', '=', $id)
		            ->paginate(10);

	  	//var_dump($laporanpendanaan);
	 	return view('dashboard.dashboard-laporan')->withLaporanpendanaan($laporanpendanaan);
	 }

	// public function getLaporan($id_pendanaan){
	//     $laporan  = laporan::find($id_pendanaan);
	//     return view('details-pendanaan')->withLaporan($laporan);
	// }


}
