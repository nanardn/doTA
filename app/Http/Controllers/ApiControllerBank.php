<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\ReportBank;
use App\BankUsageReport;
class ApiControllerBank extends Controller
{
    //
    public function ReportBank()
    {
        $campaignbank = request('campaign');
        $yearbank = request('year');
        $result = ReportBank::where('id_pendanaan_bank', $campaignbank)->where('tahun', $yearbank)->orderBy('bulan', 'ASC')->get();
        $data = [
            [
                'data' => [],
                'label' => 'Total Pengeluaran'
            ],
            [
                'data' => [],
                'label' => 'Total Pemasukan'
            ],
            [
                'data' => [],
                'label' => 'Saldo Usaha'
            ]
        ];
        foreach ($result as $row) {
            $data[0]['data'][] = [strtotime($row->tahun . '-' . $row->bulan . '-15') * 1000, $row->total_pengeluaran];
            $data[1]['data'][] = [strtotime($row->tahun . '-' . $row->bulan . '-15') * 1000, $row->total_pemasukan];
            $data[2]['data'][] = [strtotime($row->tahun . '-' . $row->bulan . '-15') * 1000, $row->saldo_usaha];
        }
        return collect($data)->toJson();
    }
}
