@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-lg p-4">
        <h2 class="fw-bold text-primary mb-3"><i class="fas fa-edit"></i> Edit Pelanggan</h2>

        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <form action="{{ route('pelanggan.update', $pelanggan->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="nama" class="form-label fw-bold"><i class="fas fa-user"></i> Nama</label>
                        <input type="text" name="nama" class="form-control" value="{{ $pelanggan->nama }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label fw-bold"><i class="fas fa-envelope"></i> Email</label>
                        <input type="email" name="email" class="form-control" value="{{ $pelanggan->email }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="telepon" class="form-label fw-bold"><i class="fas fa-phone"></i> Telepon</label>
                        <input type="text" name="telepon" class="form-control" value="{{ $pelanggan->telepon }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="alamat" class="form-label fw-bold"><i class="fas fa-map-marker-alt"></i> Alamat</label>
                        <textarea name="alamat" class="form-control" required>{{ $pelanggan->alamat }}</textarea>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-success me-2">
                            <i class="fas fa-save"></i> Simpan
                        </button>
                        <a href="{{ route('pelanggan.index') }}" class="btn btn-secondary">
                            <i class="fas fa-times"></i> Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
