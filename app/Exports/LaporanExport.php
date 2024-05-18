<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\Laporan;
use App\Models\Perusahaan;
use App\Models\Laboratorium;
use Illuminate\Support\Facades\DB;

class LaporanExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $ar_laporan = DB::table('table_laporan')
            ->join('table_nib', 'table_nib.id', '=', 'table_laporan.perusahaan_id')
            ->join('table_laboratorium', 'table_laboratorium.id', '=', 'table_laporan.laboratorium_id')
            ->select(
                'table_laporan.kode',
                'table_nib.nama_perusahaan',
                'table_laboratorium.nama_lab',
                'table_laporan.nama_petugas',
                'table_laporan.jenis_sampling',
                'table_laporan.parameter',
                'table_laporan.tanggal_sampling',
                'table_laporan.jmlh_inlet',
                'table_laporan.jmlh_outlet',
                'table_laporan.jmlh_debit',
                'table_laporan.jmlh_ph',
                'table_laporan.jmlh_suhu',
                'table_laporan.jmlh_tss',
                'table_laporan.jmlh_tds',
                'table_laporan.jmlh_bod',
                'table_laporan.jmlh_amoniak',
                'table_laporan.jmlh_minyak',
                'table_laporan.jmlh_caliform',
                'table_laporan.jmlh_bakteri',
                'table_laporan.jmlh_mbas',
                'table_laporan.jmlh_sulfida',
                'table_laporan.jmlh_nitrat',
                'table_laporan.jmlh_nitrit',
                'table_laporan.jmlh_pshospat',
                'table_laporan.jmlh_fenol',
                'table_laporan.jmlh_khorm',
                'table_laporan.jmlh_seng',
                'table_laporan.jmlh_klorida',
                'table_laporan.jmlh_klor',
                'table_laporan.jmlh_fluorida',
                'table_laporan.jmlh_warna',
                'table_laporan.jmlh_cod',
                'table_laporan.jmlh_produksi',
                'table_laporan.jmlh_hunian',
                'table_laporan.jmlh_bed',
            )
            ->get();
        return $ar_laporan;
    }

    public function headings(): array
    {
        return [
            'No.Laporan',
            'Nama Perusahaan',
            'Nama Laboratorium',
            'Nama Petugas',
            'Jenis Sampling',
            'Paramater',
            'Tanggal Sampling',
            'Debit Inlet',
            'Debit Outler',
            'Debit Air Baku Mutu',
            'pH',
            'Suhu',
            'TSS',
            'TDS',
            'BOD',
            'COD',
            'Amoniak (NH₃₋N)',
            'Minyak & Lemak',
            'Total Caliform',
            'Bakteri Caliform',
            'MBAS',
            'Sulfida (S)',
            'Nitrat (NO3-N)',
            'Nitrit (NO2-N)',
            'Phosphat (PO4-P)',
            'Fenol Total',
            'Khrom Total (Cr)',
            'Seng (ZN)',
            'Klorida',
            'Klor Bebas',
            'Fluorida (F)',
            'Warna',
            'Produksi',
            'Jumlah Hunian',
            'Jumlah BED',
        ];
    }

    // public function collection()
    // {
    //     return Laporan::all();
    // }
}
