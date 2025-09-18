<?php

namespace App\Models;

use App\Models\Kategori;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produk extends Model
{
    use HasFactory;
     //mendaftarkan nama table yang ada di database ke model
    protected $table = 'produk';

    // kolom yang akan di isi dari form input
    protected $fillable = [
        'nama',
        'harga',
        'stok',
        'kategori_id',];

        public function kategori()
        {
            // Kategori adalah nama model
            // Kategori_id adalah nama foreign key di tabel produk
            // id adalah nama primary key di tabel kategori
            return $this->belongsTo(Kategori::class, 'Kategori_id','id');
        }

}
