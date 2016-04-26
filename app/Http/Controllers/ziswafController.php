<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use Carbon\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;
use Session;
use App\CampaignZiswaf;
use App\ReportZiswaf;
use DB;
class ziswafController extends Controller
{
    //
    public function createLaporanZiswaf(Request $request) {
        $ziswafReport = new ReportZiswaf();
        $ziswafReport->fill($request->all());
        $ziswafReport->save();
        return redirect()->back();
    }
    public function fundReport(Request $req)
    {
        $detailDana  = DB::select('SELECT * FROM fund_ziswaf ');
        return view('dashboard.dashboard-listpendanaanziswaf')->with('detailDana',$detailDana);
    }

    //menampilkan report bulanan
     public function listReportZiswaf(Request $request){
    	$result = DB::select('SELECT * FROM laporan_ziswaf, fund_ziswaf
            WHERE laporan_ziswaf.id_pendanaan_ziswaf=fund_ziswaf.id_pendanaan_ziswaf');
    	return view('dashboard.dashboard-reportpendanaanziswaf')->with('reportZiswaf',$result)->with('campaigns', CampaignZiswaf::pluck('nama_pendanaan', 'id_pendanaan_ziswaf'))->with('years', range(ReportZiswaf::first()->tahun, date('Y')));
    }  
    //detail lapporan harian
    public function detailReport(Request $req, $id)
    {
        $detailDana['data']  = DB::table('laporan_penggunaan_ziswaf')
            ->where('laporan_penggunaan_ziswaf.id_laporan_z','=',$id)
            ->orderBy('id_laporan_zt', 'desc')
            ->paginate(30);
        $detailDana['id'] = $id;
        return view('dashboard.dashboard-detailreportpendanaanziswaf')->with('detailDana',$detailDana)->with('id', $id);
    }
    //add laporan harian
    public function uploaddetaillaporan(Request $request){
                $postpendanaan = $request->all();
                $dateimputpendanaan = Carbon::now()->format('Y-m-d H:i:s');
                $postpendanaan = array(
                        'akun'        => $postpendanaan['transaksi'], 
                        'date'    => $postpendanaan['tgl_transaksi'], 
                        'kategori_transaksi'       => $postpendanaan['kategori'], 
                        'jumlah_transaksi'     => $postpendanaan['jumlah_transaksi'],                     
                        'id_laporan_z'          => $postpendanaan['id_laporan_z'],
                        'date'  => $dateimputpendanaan, 
                    );
                $result = DB::select('SELECT * FROM laporan_penggunaan_ziswaf
                    WHERE id_laporan_z = :id
                    ORDER BY id_laporan_zt DESC
                    LIMIT 0,1', [$postpendanaan['id_laporan_z']]);
                
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
                $i = DB::table('laporan_penggunaan_ziswaf')->insert($postpendanaan);
                $i2 = DB::table('laporan_ziswaf')
                    ->where('id_laporan_z','=',$postpendanaan['id_laporan_z'])
                    ->update(array('total_pengeluaran' => $postpendanaan['total_pengeluaran'],
                        'total_pemasukan'=> $postpendanaan['total_pemasukan'],
                        'saldo_usaha' => $postpendanaan['saldo_dana_usaha']));
                if ($i && $i2) {
                    return redirect('/dashboard/detail_laporan_ziswaf/'.$postpendanaan['id_laporan_z']);
                }
} 
   
}
