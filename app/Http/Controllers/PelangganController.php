<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;

class PelangganController extends Controller
{
    // Menampilkan daftar pelanggan
    public function index()
    {
        $pelanggans = Pelanggan::orderBy('created_at', 'desc')->paginate(5); // Batasi 5 pelanggan per halaman
        return view('pelanggan.index', compact('pelanggans'));
    }
    
    

    // Menampilkan form tambah pelanggan
    public function create()
    {
        return view('pelanggan.create');
    }

    // Menyimpan pelanggan baru ke database
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:pelanggans,email',
            'telepon' => 'required|string|max:15',
            'alamat' => 'required|string',
        ]);

        // Menyimpan data pelanggan
        Pelanggan::create($request->all());

        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil ditambahkan!');
    }

    // Menampilkan form edit pelanggan
    public function edit($id)
    {
        $pelanggan = Pelanggan::findOrFail($id); // Ambil data pelanggan berdasarkan ID
        return view('pelanggan.edit', compact('pelanggan'));
    }
    

    // Memperbarui data pelanggan di database
    public function update(Request $request, Pelanggan $pelanggan)
    {
        // Validasi data
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:pelanggans,email,' . $pelanggan->id,
            'telepon' => 'required|string|max:15',
            'alamat' => 'required|string',
        ]);

        // Mengupdate data pelanggan
        $pelanggan->update($request->all());

        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil diperbarui!');
    }

    // Menghapus pelanggan dari database
    public function destroy(Pelanggan $pelanggan)
    {
        $pelanggan->delete();
        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil dihapus!');
    }

    public function show($id)
{
    $pelanggan = Pelanggan::findOrFail($id);
    return view('pelanggan.show', compact('pelanggan'));
}

}
