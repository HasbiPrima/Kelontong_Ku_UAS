<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alamat extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'provinsi','kabupaten', 'kecamatan', 'alamat_lengkap', 'tambahan', 'kode_pos', 'nama_penerima'];

}
