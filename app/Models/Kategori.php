<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    //mendaftarkan nama table yang ada di database ke model
    protected $table = 'kategori';

    // kolom yang akan di isi dari form input
    protected $fillable = [
        'nama_kategori',
        'deskripsi',];
}
