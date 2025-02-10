<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjamans'; // Pastikan ini sesuai dengan nama tabel di database

    protected $fillable = [
        'pelanggan_id', 
        'buku_id', 
        'tanggal_pinjam', 
        'tanggal_kembali', 
        'status'
    ];

    /**
     * Relasi ke tabel Pelanggan
     */
    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'pelanggan_id');
    }
    
    public function buku()
    {
        return $this->belongsTo(Buku::class, 'buku_id');
    }
    
}
