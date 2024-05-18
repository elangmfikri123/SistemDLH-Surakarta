<?php

namespace Database\Seeders;

use App\Models\Bidang;
use Illuminate\Database\Seeder;

class BidangSeeder extends Seeder
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
                'user_id' => '1',
                'nama_bidang' => 'Kesehatan',
            ],
            [
                'user_id' => '1',
                'nama_bidang' => 'Perhotelan',
            ],
        ])->each(function ($bidang) {
            Bidang::create($bidang);
        });
    }
}
