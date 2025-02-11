@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-lg p-4">
        <h2 class="fw-bold text-primary mb-3"><i class="fas fa-user-plus"></i> Tambah Pelanggan</h2>

        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <form action="{{ route('pelanggan.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="nama" class="form-label fw-bold"></i> Nama</label>
                        <input type="text" name="nama" class="form-control" placeholder="Masukkan nama pelanggan" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label fw-bold"></i> Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Masukkan email pelanggan" required>
                    </div>

                    <div class="mb-3">
                        <label for="telepon" class="form-label fw-bold"></i> Telepon</label>
                        <input type="text" name="telepon" class="form-control" placeholder="Masukkan nomor telepon" required>
                    </div>

                    <div class="mb-3">
                        <label for="alamat" class="form-label fw-bold"></i> Alamat</label>
                        <textarea name="alamat" class="form-control" rows="3" placeholder="Masukkan alamat pelanggan" required></textarea>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary me-2"><i class="fas fa-save"></i> Simpan</button>
                        <a href="{{ route('pelanggan.index') }}" class="btn btn-secondary"><i class="fas fa-times"></i> Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
