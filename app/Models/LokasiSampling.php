<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LokasiSampling extends Model
{
    use HasFactory;

    protected $table = 'table_lokasisampling';
    protected $guarded = ['id'];

    public function laporan()
    {
        return $this->hasMany(Perusahaan::class);
    }
}
