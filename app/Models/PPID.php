<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class PPID extends Authenticatable
{
    use HasFactory;

    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = 'id_petugas';
    protected $keyType = 'string';
    protected $table = 'p_p_i_d_s';
    
    protected $fillable = [
        'id_petugas',
        'nip',
        'nama_petugas',
        'jabatan',
        'username',
        'password',
        'foto',
    ];
    
    public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }
}
