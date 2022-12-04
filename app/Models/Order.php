<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory; 
    
    protected $fillable = ['id', 'id_produk','id_user', 'nama_barang', 'merek', 'ukuran', 'jumlah', 'tambahan'];
    protected $with = [
        'user'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
