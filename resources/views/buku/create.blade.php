@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-lg p-4">
        <h2 class="fw-bold text-primary mb-3"><i class="fas fa-plus-circle"></i> Tambah Buku</h2>

        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <form action="{{ route('buku.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="judul" class="form-label fw-bold"><i class="fas fa-book"></i> Judul Buku</label>
                        <input type="text" name="judul" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="penulis" class="form-label fw-bold"><i class="fas fa-pen"></i> Penulis</label>
                        <input type="text" name="penulis" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="penerbit" class="form-label fw-bold"><i class="fas fa-building"></i> Penerbit</label>
                        <input type="text" name="penerbit" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="tahun_terbit" class="form-label fw-bold"><i class="fas fa-calendar"></i> Tahun Terbit</label>
                        <input type="number" name="tahun_terbit" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="stok" class="form-label fw-bold"><i class="fas fa-cubes"></i> Stok</label>
                        <input type="number" name="stok" class="form-control" required>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary me-2">
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
