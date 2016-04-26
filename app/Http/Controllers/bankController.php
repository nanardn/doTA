<?php

namespace App\Http\Controllers;

//use App\Campaign;
//use App\CrowdReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use Carbon\Carbon;
use App\CampaignBank;
use App\ReportBank;
use Illuminate\Pagination\LengthAwarePaginator;
use Session;
use DB;
class bankController extends Controller
{
    //
     public function createLaporanBank(Request $request) {
        $bankReport = new ReportBank();
        $bankReport->fill($request->all());
        $bankReport->save();
        return redirect()->back();
    }

     public function showfund()
    {
           // $result=DB::select('SELECT * FROM fund_bank WHERE fund_bank.id_umkm=Auth::user()->id');
       // $pendanaanbank =  DB::table('fund_bank')->orderBy('id_pendanaan_bank', 'desc')->paginate(5);

        return view('dashboard.dashboard-daftar-pendanaan-bank')->with('bankreports', BankReport::pluck('nama_bank','id_bank'));
    }
    public function fundReport(Request $req)
    {
        $detailDana  = DB::select('SELECT * FROM fund_bank ');
            
        return view('dashboard.dashboard-listpendanaanbank')->with('detailDana',$detailDana);
    }
    public function listReportBank(Request $request){
    	$result = DB::select('SELECT * FROM laporan_bank, fund_bank
            WHERE laporan_bank.id_pendanaan_bank=fund_bank.id_pendanaan_bank');
    	return view('dashboard.dashboard-reportpendanaanbank')->with('reportBank',$result)->with('campaigns', CampaignBank::pluck('nama_proyek', 'id_pendanaan_bank'))->with('years', range(ReportBank::first()->tahun, date('Y')));
    }
	public function detailReport(Request $req, $id)
    {
        $detailDana['data']  = DB::table('laporan_penggunaan_bank')
            ->where('laporan_penggunaan_bank.id_laporan_b','=',$id)
            ->orderBy('id_laporan_bt', 'desc')
            ->paginate(30);
        $detailDana['id'] = $id;
        return view('dashboard.dashboard-detailreportpendanaanbank')->with('detailDana',$detailDana)->with('id', $id);
    }

     
              public function uploaddetaillaporan(Request $request){
                $postpendanaan = $request->all();
                $dateimputpendanaan = Carbon::now()->format('Y-m-d H:i:s');
                $postpendanaan = array(
                        'akun'        => $postpendanaan['transaksi'], 
                        'date'    => $postpendanaan['tgl_transaksi'], 
                        'kategori_transaksi'       => $postpendanaan['kategori'], 
                        'jumlah_transaksi'     => $postpendanaan['jumlah_transaksi'], 
                    
                        'id_laporan_b'   => $postpendanaan['id_laporan_b'],
                        'date'  => $dateimputpendanaan, 
                    );
                $result = DB::select('SELECT * FROM laporan_penggunaan_bank
                    WHERE id_laporan_b = :id
                    ORDER BY id_laporan_bt DESC
                    LIMIT 0,1', [$postpendanaan['id_laporan_b']]);
                
                if (count($result)) {
                    $total_pemasukan = $result[0]->total_pemasukan;
                    $total_pengeluaran = $result[0]->total_pengeluaran;
                    $saldo_dana_usaha = $result[0]->saldo_dana_usaha;
                }else{
                    $total_pemasukan = 0;
                    $total_pengeluaran = 0;
                    $saldo_dana_usaha = 0;
                }
                if ($postpendanaan['kategori_transaksi'] == 'Pemasukan') {
                    $penambahan = $postpendanaan['jumlah_transaksi'];
                    $postpendanaan['total_pemasukan'] = $total_pemasukan + $postpendanaan['jumlah_transaksi'];
                    $postpendanaan['total_pengeluaran'] = $total_pengeluaran;
                }else{
                    $penambahan = 0 - $postpendanaan['jumlah_transaksi'];
                    $postpendanaan['total_pengeluaran'] = $total_pengeluaran + $postpendanaan['jumlah_transaksi'];
                    $postpendanaan['total_pemasukan'] = $total_pemasukan;
                }
                $postpendanaan['saldo_dana_usaha'] = $saldo_dana_usaha + $penambahan;
                $i = DB::table('laporan_penggunaan_bank')->insert($postpendanaan);
                $i2 = DB::table('laporan_bank')
                    ->where('id_laporan_b','=',$postpendanaan['id_laporan_b'])
                    ->update(array('total_pengeluaran' => $postpendanaan['total_pengeluaran'],
                        'total_pemasukan'=> $postpendanaan['total_pemasukan'],
                        'saldo_usaha' => $postpendanaan['saldo_dana_usaha']));
                if ($i && $i2) {
                    return redirect('/dashboard/detail_laporan_bank/'.$postpendanaan['id_laporan_b']);
                }
} 
   

}
