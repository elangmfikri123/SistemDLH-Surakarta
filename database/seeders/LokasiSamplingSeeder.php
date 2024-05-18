<?php

namespace Database\Seeders;

use App\Models\LokasiSampling;
use Illuminate\Database\Seeder;

class LokasiSamplingSeeder extends Seeder
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
                'lokasi_sampling' => 'Inlet',
            ],
            [
                'lokasi_sampling' => 'Outlet',
            ],
            [
                'lokasi_sampling' => 'Titik Pantau',
            ],
        ])->each(function ($lokasisampling) {
            LokasiSampling::create($lokasisampling);
        });
    }
}
