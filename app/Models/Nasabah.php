<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nasabah extends Model
{
    protected $fillable = [
        'nik',
        'nama',
        'nomor_wa',
        'rt',
        'rw',
        'jenis_kelamin',
        'alamat_lengkap',
        'saldo',
        'status',
    ];
}
