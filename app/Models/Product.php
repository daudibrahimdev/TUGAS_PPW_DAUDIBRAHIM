<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    protected $fillable = [
        'kategori_id',
        'foto',
        'nama',
        'deskripsi',
        'harga',
        'stok',
    ];
    // 👇 SOLUSI UNTUK ERROR RELATIONSHIP
    public function kategori()
    {
        // Mendefinisikan bahwa Produk ini "milik" (belongsTo) ke Model Category
        // menggunakan foreign key 'kategori_id'
        return $this->belongsTo(Category::class, 'kategori_id');
    }

}

