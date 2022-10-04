<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tamu extends Model
{
    use HasFactory;
    
    public $incrementing = false;
    protected $primaryKey = 'no_hp';
    protected $keyType = 'string';
    
    protected $fillable = [
        'no_hp',
        'nama',
        'asal_instansi',
        'alamat',
    ];
}
