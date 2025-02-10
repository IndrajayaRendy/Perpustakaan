<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Pelanggan;
use App\Models\Peminjaman;

class HomeController extends Controller
{
    public function index()
    {
        $jumlahBuku = Buku::count();
        $jumlahPelanggan = Pelanggan::count();
        $jumlahPeminjam = Peminjaman::where('status', 'Dipinjam')->count();

        return view('welcome', compact('jumlahBuku', 'jumlahPelanggan', 'jumlahPeminjam'));
    }
}
