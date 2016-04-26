<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;
use Carbon\Carbon;
use App\BankReport;
use App\BankFund;
use App\User;
use DB;

class daftarPendanaanController extends Controller
{   

        public function createFundBank(Request $request) {
        //mau nampilin cuma yg id_usernya sesuai dengan yang login
        //$id=Auth::user()->getId();
      
          //save dari form table

        $bankFund = new BankFund();
        $bankFund->fill($request->all());
        $bankFund->id_umkm = Auth::user()->id;
        $bankFund->save();

        return redirect()->back();
    }
	public function showpage()
    {
        return view('dashboard.dashboard-daftar-pendanaan');
    }
    public function showfund()
    {
           // $result=DB::select('SELECT * FROM fund_bank WHERE fund_bank.id_umkm=Auth::user()->id');
       // $pendanaanbank =  DB::table('fund_bank')->orderBy('id_pendanaan_bank', 'desc')->paginate(5);

        return view('dashboard.dashboard-daftar-pendanaan-bank')->with('bankreports', BankReport::pluck('nama_bank','id_bank'));
    }

   
    public function uploadpendanaan(Request $request){
        if(Input::hasFile('file')){
                $postpendanaan = $request->all();
                $file       = Input::file('file');
                $fileproyek = Input::file('fileproyek');
                $file->move('images/avatar/', $file->getClientOriginalName());
                $fileproyek->move('images/proyek/', $fileproyek->getClientOriginalName());
                $namafilepj = $file->getClientOriginalName();
                $namafileproyek = $fileproyek->getClientOriginalName();
                $dateimputpendanaan = Carbon::now()->format('Y-m-d H:i:s');
                $postpendanaan = array(
                        'nama_pj'        => $postpendanaan['nama_pj'], 
                        'nama_proyek'    => $postpendanaan['nama_proyek'],
                        'id_bank_tujuan' => $postpendanaan['id_bank_tujuan'],
                         'total_dana'     => $postpendanaan['total_dana'], 
                        'sementara_dana' => $postpendanaan['sementara_dana'], 
                        'deskripsi'      => $postpendanaan['deskripsi'], 
                        'foto_proyek'    => $namafileproyek,
                        'foto_pj'        => $namafilepj, 
                        'status'         => $postpendanaan['status'],  
                        'tgl_pendanaan'  => $dateimputpendanaan, 
                    );
            $i = DB::table('pendanaan')->insert($postpendanaan);
    		if ($i > 0) {
    		  	
    		  	return redirect('/home');
              
    		} 
        }
    }


    public function listReportCrowd(Request $request){
        $result = DB::select('SELECT * FROM laporan_crowd, pendanaan 
            WHERE laporan_crowd.id_pendanaan=pendanaan.id_pendanaan');
        return view('dashboard.dashboard-reportpendanaan')->with('reportCrowd',$result)->with('campaigns', Campaign::pluck('nama_proyek', 'id_pendanaan'))->with('years', range(CrowdReport::first()->tahun, date('Y')));
    }
}
