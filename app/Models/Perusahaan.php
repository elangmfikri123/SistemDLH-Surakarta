<?php

namespace App\Models;

use App\Models\Kecamatan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Perusahaan extends Model
{
    use HasFactory;

    protected $table = 'table_perusahaan';
    protected $guarded = ['id'];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function nib()
    {
        return $this->belongsTo(NIB::class, 'nib_id');
    }
    public function laporan()
    {
        return $this->hasMany(Laporan::class, 'perusahaan_id', 'id');
    }
    public function bidang()
    {
        return $this->belongsTo(Bidang::class);
    }
    public function pimpinan()
    {
        return $this->belongsTo(Pimpinan::class);
    }
    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }
    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }
    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class);
    }
}
