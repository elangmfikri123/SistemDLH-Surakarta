<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Laporan extends Model
{
    use HasFactory;

    protected $table = 'table_laporan';
    protected $guarded = ['id'];
    public $incrementing = false;

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function laboratorium()
    {
        return $this->belongsTo(Laboratorium::class);
    }
    public static function kode()
    {
        $kode = DB::table('table_laporan')->max('kode');
        $addNol = '';
        $kode = str_replace("DLH", "", $kode);
        $kode = (int) $kode + 1;
        $incrementKode = $kode;

        if (strlen($kode) == 1) {
            $addNol = "000";
        } elseif (strlen($kode) == 2) {
            $addNol = "00";
        } elseif (strlen($kode == 3)) {
            $addNol = "0";
        }

        $kodeBaru = "DLH" . $addNol . $incrementKode;
        return $kodeBaru;
    }
    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class, 'perusahaan_id', 'id');
    }
    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }
    public function feedback()
    {
        return $this->hasMany(Feedback::class, 'laporan_id');
    }
    public function batasuji()
    {
        return $this->hasMany(BatasUji::class, 'laporan_id');
    }
    public function lokasisampling()
    {
        return $this->hasMany(LokasiSampling::class, 'laporan_id');
    }
}
