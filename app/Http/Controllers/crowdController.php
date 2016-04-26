<?php
namespace App\Http\Controllers;
use App\Campaign;
use App\CrowdReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use Carbon\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;
use Session;
use DB;

class crowdController extends Controller
{
    public function createLaporanCrowd(Request $request) {
        $crowdReport = new CrowdReport();
        $crowdReport->fill($request->all());
        $crowdReport->save();
        return redirect()->back();
    }
    //
     public function index()
    {
        return view('dashboard.dashboard-pendanaan');
    }
    public function showReport()
    {
        return view('dashboard.dashboard-reportpendanaan');
    }
    public function listReportCrowd(Request $request){
    	$result = DB::select('SELECT * FROM laporan_crowd, pendanaan 
            WHERE laporan_crowd.id_pendanaan=pendanaan.id_pendanaan');
    	return view('dashboard.dashboard-reportpendanaan')->with('reportCrowd',Auth::user()->crowdReport)->with('campaigns', Auth::user()->pendanaan->pluck('nama_proyek', 'id_pendanaan'))->with('years', range(CrowdReport::first()->tahun, date('Y')));
    }

    
    public function detailReport(Request $req, $id)
    {
        $detailDana['data']  = DB::table('laporan_penggunaan_crowd')
            ->where('laporan_penggunaan_crowd.id_laporan_c','=',$id)
            ->orderBy('id_laporan_ct', 'desc')
            ->paginate(30);
        $detailDana['id'] = $id;
        return view('dashboard.dashboard-detailreportpendanaan')->with('detailDana',$detailDana)->with('id', $id);;
    }
      
              public function uploaddetaillaporan(Request $request){
                $postpendanaan = $request->all();
                $dateimputpendanaan = Carbon::now()->format('Y-m-d H:i:s');
                $postpendanaan = array(
                        'akun'        => $postpendanaan['transaksi'], 
                        'date'    => $postpendanaan['tgl_transaksi'], 
                        'kategori_transaksi'       => $postpendanaan['kategori'], 
                        'jumlah_transaksi'     => $postpendanaan['jumlah_transaksi'], 
                    
                        'id_laporan_c'   => $postpendanaan['id_laporan_c'],
                        'date'  => $dateimputpendanaan, 
                    );
                $result = DB::select('SELECT * FROM laporan_penggunaan_crowd
                    WHERE id_laporan_c = :id
                    ORDER BY id_laporan_ct DESC
                    LIMIT 0,1', [$postpendanaan['id_laporan_c']]);
                
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
                $i = DB::table('laporan_penggunaan_crowd')->insert($postpendanaan);
                $i2 = DB::table('laporan_crowd')
                    ->where('id_laporan_c','=',$postpendanaan['id_laporan_c'])
                    ->update(array('total_pengeluaran' => $postpendanaan['total_pengeluaran'],
                        'total_pemasukan'=> $postpendanaan['total_pemasukan'],
                        'saldo_usaha' => $postpendanaan['saldo_dana_usaha']));
                if ($i && $i2) {
                    return redirect('/dashboard/detail_laporan_crowdfunding/'.$postpendanaan['id_laporan_c']);
                }
}
}