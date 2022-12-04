<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'nama_barang','merek', 'deskripsi', 'ukuran', 'harga', 'jumlah', 'stok'];
    public function transaction()
    {
        return $this->hasMany(Transaction::class);
    }

}
