<?php

namespace Database\Seeders;

use App\Models\BatasUji;
use Illuminate\Database\Seeder;

class BatasUjiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect([
            [
                'laporan_id' => 
                'nama_uji' => 'jmlh_ph',
                'batas_atas' => '6.0',
                'batas_bawah' => '9.0'
            ],
            [
                'nama_uji' => 'jmlh_amoniak',
                'batas_atas' => '0.1',
                'batas_bawah' => '0'
            ],
            [
                'nama_uji' => 'jmlh_pshospat',
                'batas_atas' => '2',
                'batas_bawah' => '0'
            ],
            [
                'nama_uji' => 'jmlh_bod',
                'batas_atas' => '30',
                'batas_bawah' => '0'
            ],
            [
                'nama_uji' => 'jmlh_cod',
                'batas_atas' => '50',
                'batas_bawah' => '0'
            ],
            [
                'nama_uji' => 'jmlh_suhu',
                'batas_atas' => '30',
                'batas_bawah' => '0'
            ],
            [
                'nama_uji' => 'jmlh_tss',
                'batas_atas' => '30',
                'batas_bawah' => '0'
            ],
        ])->each(function ($batasuji) {
            BatasUji::create($batasuji);
        });
    }
}
