<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class buku_tamu extends Model
{
    use HasFactory;

    public $timestamps = false;
    
    protected $fillable = [
        'nomor',
        'tanggal',
        'nama',
        'asal_instansi',
        'alamat',
        'no_tlp',
        'tujuan',
        'tingkat_kepuasan',
        'id_petugas',
        'status',
        'verify_kunjungan',
        'verify_layanan',
    ];
}
