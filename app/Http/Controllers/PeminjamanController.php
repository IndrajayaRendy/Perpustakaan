<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Pelanggan;
use App\Models\Buku;

class PeminjamanController extends Controller
{
    public function index(Request $request)
    {
        $query = Peminjaman::with(['pelanggan', 'buku'])->orderBy('created_at', 'desc');
    
        if ($request->has('search')) {
            $search = $request->search;
            $query->whereHas('pelanggan', function ($q) use ($search) {
                $q->where('nama', 'like', "%$search%");
            })->orWhereHas('buku', function ($q) use ($search) {
                $q->where('judul', 'like', "%$search%");
            });
        }
    
        $peminjamans = $query->paginate(10);
        return view('peminjaman.index', compact('peminjamans'));
    }

    public function create()
    {
        $pelanggans = Pelanggan::all();
        $buku = Buku::all();
        return view('peminjaman.create', compact('pelanggans', 'buku'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pelanggan_id' => 'required|exists:pelanggans,id',
            'buku_id' => 'required|exists:buku,id',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'nullable|date|after:tanggal_pinjam',
        ]);

        Peminjaman::create([
            'pelanggan_id' => $request->pelanggan_id,
            'buku_id' => $request->buku_id,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_kembali' => $request->tanggal_kembali ?? null,
            'status' => 'Dipinjam',
        ]);

        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil ditambahkan');
    }

    public function edit(Peminjaman $peminjaman)
    {
        $pelanggans = Pelanggan::all();
        $buku = Buku::all();
        return view('peminjaman.edit', compact('peminjaman', 'pelanggans', 'buku'));
    }

    public function update(Request $request, Peminjaman $peminjaman)
    {
        $request->validate([
            'pelanggan_id' => 'required|exists:pelanggans,id',
            'buku_id' => 'required|exists:buku,id',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'nullable|date|after:tanggal_pinjam',
            'status' => 'required|string',
        ]);

        $peminjaman->update($request->all());

        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil diperbarui');
    }

    public function destroy(Peminjaman $peminjaman)
    {
        $peminjaman->delete();
        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil dihapus');
    }

    public function show($id)
{
    $peminjaman = Peminjaman::findOrFail($id);
    return view('peminjaman.show', compact('peminjaman'));
}

}
