<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class KSPP extends Authenticatable
{
    use HasFactory;

    public $timestamps = false;
    // public $incrementing = false;
    // protected $primaryKey = 'id_petugas';
    // protected $keyType = 'string';
    protected $table = 'k_s_p_p_s';
    protected $fillable = [
        'nip',
        'nama_kabag',
        'jabatan',
        'email',
        'level',
        'username',
        'password',
        'foto',
    ];
    protected $hidden = ['password',  'remember_token'];

    public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }
}
