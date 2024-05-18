<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use App\Models\Laporan;
use Illuminate\Http\Request;
use App\Exports\ExportLaporan;
use App\Exports\LaporanExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function cetakLaporan()
    {
        $bidang = Bidang::all();
        $laporan = Laporan::all();
        return view('admin.cetak', [
            'laporan' => $laporan,
            'bidang' => $bidang,
        ]);
    }

    public function getLaporanBetweenDate($date1, $date2, $bidang = 'all', $lokasi = 'all')
    {
        $data = ["Inlet", "Outlet", "Titik Pantau", "all"];
        if (!in_array($lokasi, $data)) {
            return redirect('cetak/laporan');
        }
        $mulai = date($date1);
        $akhir = date($date2);
        if ($bidang == 'all') {
            $laporan = Laporan::whereBetween('tanggal_sampling', [$mulai, $akhir]);
        } else {
            $laporan = Laporan::whereBetween('tanggal_sampling', [$mulai, $akhir])->whereHas('perusahaan', function ($q) use ($bidang) {
                $q->where('bidang_id', $bidang);
            });
        }

        if ($lokasi != 'all') {
            $laporan->where('jenis_sampling', $lokasi);
        } else {
            $laporan;
        }
        return $laporan->get();
    }
    public function laporanView($date1, $date2, $bidang, $lokasi)
    {
        $mulai = date($date1);
        $akhir = date($date2);
        $laporan = $this->getLaporanBetweenDate($mulai, $akhir, $bidang, $lokasi);

        // dd($laporan);
        return view('admin.view-laporan', [
            'laporan' => $laporan,
            'mulai' => $mulai,
            'akhir' => $akhir
        ]);
    }

    public function laporanExport($date1, $date2)
    {
        $mulai = date($date1);
        $akhir = date($date2);

        return (new ExportLaporan($mulai, $akhir))->download('Laporan ' . str_replace("-", "", $mulai) . '-' . str_replace("-", "", $akhir) . '.xlsx');
    }
    public function export()
    {
        return Excel::download(new LaporanExport, 'datalaporan.xlsx');
    }
}
