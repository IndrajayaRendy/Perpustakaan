<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;

class BukuController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        
        $bukus = Buku::when($search, function ($query, $search) {
            return $query->where('judul', 'like', "%$search%")
                         ->orWhere('penulis', 'like', "%$search%");
        })
        ->orderBy('created_at', 'desc') // Mengurutkan berdasarkan created_at terbaru
        ->paginate(10);
    
        return view('buku.index', compact('bukus'));
    }

    public function create()
    {
        return view('buku.create');
    }

    public function store(Request $request)
    {
        Buku::create($request->all());
        return redirect()->route('buku.index')->with('success', 'Buku berhasil ditambahkan');
    }

    public function edit(Buku $buku)
    {
        return view('buku.edit', compact('buku'));
    }

    public function update(Request $request, Buku $buku)
    {
        $buku->update($request->all());
        return redirect()->route('buku.index')->with('success', 'Buku berhasil diperbarui');
    }

    public function destroy(Buku $buku)
    {
        $buku->delete();
        return redirect()->route('buku.index')->with('success', 'Buku berhasil dihapus');
    }

    public function show($id)
{
    $buku = Buku::findOrFail($id);
    return view('buku.show', compact('buku'));
}

}
