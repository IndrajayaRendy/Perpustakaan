@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-lg p-4">
        <h2 class="fw-bold text-primary mb-3"><i class="fas fa-plus-circle"></i> Tambah Peminjaman</h2>

        <form action="{{ route('peminjaman.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="pelanggan_id" class="form-label fw-semibold"></i> Pelanggan</label>
                <select name="pelanggan_id" class="form-select" required>
                    <option value="" selected disabled>Pilih Pelanggan</option>
                    @foreach($pelanggans as $pelanggan)
                        <option value="{{ $pelanggan->id }}">{{ $pelanggan->nama }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="buku_id" class="form-label fw-semibold"></i> Buku</label>
                <select name="buku_id" class="form-select" required>
                    <option value="" selected disabled>Pilih Buku</option>
                    @foreach($buku as $b)
                        <option value="{{ $b->id }}">{{ $b->judul }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="tanggal_pinjam" class="form-label fw-semibold"></i> Tanggal Pinjam</label>
                <input type="date" name="tanggal_pinjam" class="form-control" required>
            </div>

            <div class="d-flex justify-content-end">
                <a href="{{ route('peminjaman.index') }}" class="btn btn-secondary me-2">
                    <i class="fas fa-times"></i> Batal
                </a>
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i> Simpan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
