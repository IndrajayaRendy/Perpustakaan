<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $table = 'pelanggans'; // Pastikan tabel ada di database

    protected $fillable = ['nama', 'email', 'alamat', 'telepon'];

    /**
     * Relasi ke tabel Peminjaman
     */
    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class, 'pelanggan_id');
    }
}
