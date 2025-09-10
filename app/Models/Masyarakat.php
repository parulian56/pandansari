<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Masyarakat extends Model
{
    protected $table = 'masyarakat';

    protected $fillable = [
        'nik',
        'kk',
        'nama_lengkap',
        'tempat_tanggal_lahir',
        'jenis_kelamin',
        'alamat',
        'rt',
    ];
}
