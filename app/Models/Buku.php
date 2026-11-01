<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    // Nama tabel di database (tanpa ini Laravel otomatis cari "bukus")
    protected $table = 'buku';

    // Kolom bisa diisi lewat form
    protected $fillable = [
        'judul',
        'penulis',
        'penerbit',
        'tahun_terbit',
        'sinopsis',
    ];
}
