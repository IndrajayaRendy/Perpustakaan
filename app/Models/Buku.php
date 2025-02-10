<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'buku'; // Pastikan tabel sesuai dengan database

    protected $fillable = [
        'judul', 
        'penulis', 
        'penerbit', 
        'tahun_terbit', 
        'stok'
    ];

    /**
     * Relasi ke tabel Peminjaman
     */
    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class, 'buku_id');
    }

    public function edit($id)
{
    $buku = Buku::findOrFail($id); // Pastikan data ditemukan
    return view('buku.edit', compact('buku'));
}


}

