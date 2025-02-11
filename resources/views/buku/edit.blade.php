@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-lg p-4">
        <h2 class="fw-bold text-primary mb-3"><i class="fas fa-edit"></i> Edit Buku</h2>

        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <form action="{{ route('buku.update', $buku->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="judul" class="form-label fw-bold"></i> Judul Buku</label>
                        <input type="text" name="judul" class="form-control" value="{{ $buku->judul }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="penulis" class="form-label fw-bold"></i> Penulis</label>
                        <input type="text" name="penulis" class="form-control" value="{{ $buku->penulis }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="penerbit" class="form-label fw-bold"></i> Penerbit</label>
                        <input type="text" name="penerbit" class="form-control" value="{{ $buku->penerbit }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="tahun_terbit" class="form-label fw-bold"></i> Tahun Terbit</label>
                        <input type="number" name="tahun_terbit" class="form-control" value="{{ $buku->tahun_terbit }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="stok" class="form-label fw-bold"></i> Stok</label>
                        <input type="number" name="stok" class="form-control" value="{{ $buku->stok }}" required>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-success me-2">
                            <i class="fas fa-save"></i> Simpan
                        </button>
                        <a href="{{ route('buku.index') }}" class="btn btn-secondary">
                            <i class="fas fa-times"></i> Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
