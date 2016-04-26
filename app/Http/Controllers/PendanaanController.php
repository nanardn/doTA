<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pendanaan;
use App\laporan;
use App\Http\Requests;

use DB;
use App\Http\Controllers\Controller;

use App\Users;
use Session;

use Illuminate\Pagination\LengthAwarePaginator;

class PendanaanController extends Controller
{
    public function getAllPendanaan(){
    	$pendanaans  = DB::table('pendanaan')->paginate(4);
    	return view('home')->withPendanaans($pendanaans);
	}

	public function getAllPendanaans1(){
    	$pendanaans1  = DB::table('pendanaan')->paginate(6);
    	return view('pendanaan')->withPendanaans1($pendanaans1);
	}

	public function getPendanaan($id_pendanaan){
	    $pendanaan  = Pendanaan::find($id_pendanaan);
	    $laporan    = DB::table('laporan')->where('id_pendanaan', '=', $id_pendanaan)->get();
	    //return view('details-pendanaan')->withPendanaan($pendanaan);
	    return view('details-pendanaan',['pendanaan' => $pendanaan],['laporan' => $laporan]);
	}

	public function getKategoriPendanaan($kategori){	    
		$pendanaank = DB::table('pendanaan')->where('kategori', '=', $kategori)->paginate(6);
    	return view('kategori')->withPendanaank($pendanaank);
	}

	public function getDonasiPendanaan($id_pendanaan){	    
		$pendanaand  = Pendanaan::find($id_pendanaan);
    	return view('donasi')->withPendanaand($pendanaand);
	}

	//Dashboard Pendanaan
	public function getInformasiPendanaan($id){
	  // $usertransaksi = DB::table('users')->where('id', '=', $id)->get();
	  // $infotransaksi = DB::table('transaksi')->where('id', '=', $usertransaksi[0]->id)->get();
	  // $pendanaantransaksi = DB::table('pendanaan')->where('id_pendanaan', '=', $infotransaksi[0]->id_pendanaan)->get();

		$pendanaantransaksi = DB::table('transaksi')
		            ->join('users', 'transaksi.id', '=', 'users.id')
		            ->join('pendanaan', 'transaksi.id_pendanaan', '=', 'pendanaan.id_pendanaan')
		            ->select('users.id', 'pendanaan.nama_proyek', 'pendanaan.kategori', 'transaksi.*')
		            ->where('transaksi.id', '=', $id)
		            ->orderBy('transaksi.id_transaksi', 'desc')
		            ->paginate(5);

	  	//var_dump($pendanaantransaksi);
	  	return view('dashboard.dashboard-pendanaan')->withPendanaantransaksi($pendanaantransaksi);
	    
	    // return view('dashboard.dashboard-pendanaan',['infotransaksi' => $infotransaksi],['pendanaantransaksi' => $pendanaantransaksi],['usertransaksi' => $usertransaksi]);  
		// return view('dashboard.dashboard-pendanaan',['pendanaantransaksi' => $pendanaantransaksi]);
	 }

	//Halaman Donasi Payment
	public function getDonasiPayment($id_pendanaan){	    
		$pendanaanpayment  = Pendanaan::find($id_pendanaan);
		$pendanaannominal = Session::get('message-nominal');
    	//return view('donasi-payment')->withPendanaanpayment($pendanaanpayment);
    	return view('donasi-payment',['pendanaanpayment' => $pendanaanpayment],['pendanaannominal' => $pendanaannominal]);
	}

	//Halaman Donasi Invoice
	public function getDonasiInvoice($id_pendanaan){	    
		$pendanaaninvoice  = Pendanaan::find($id_pendanaan);
		$pendanaannominal = Session::get('message-nominal');
    	//return view('donasi-invoice')->withPendanaaninvoice($pendanaaninvoice);
    	return view('donasi-invoice',['pendanaaninvoice' => $pendanaaninvoice],['pendanaannominal' => $pendanaannominal]); 
	}

	//Halaman Administrator Pendanaa
	public function getAllPendanaanAdmin(){
    	$pendanaanadmin  = DB::table('pendanaan')->paginate(5);
    	return view('administrator.administrator-listdonasi')->withPendanaanadmin($pendanaanadmin);
	}


}
