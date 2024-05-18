<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BatasUji extends Model
{
    use HasFactory;

    protected $table = 'table_batas_uji';
    protected $guarded = ['id'];


    public function laporan()
    {
        return $this->belongsTo(Laporan::class);
    }
}
