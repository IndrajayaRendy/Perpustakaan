@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-lg p-4">
    <h2 class="fw-bold text-primary mb-3"><i class="fas fa-edit"></i> Edit Peminjaman</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('peminjaman.update', $peminjaman->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="pelanggan_id" class="form-label fw-semibold">Pelanggan</label>
                <select name="pelanggan_id" id="pelanggan_id" class="form-select">
                    @foreach($pelanggans as $pelanggan)
                        <option value="{{ $pelanggan->id }}" {{ $peminjaman->pelanggan_id == $pelanggan->id ? 'selected' : '' }}>
                            {{ $pelanggan->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="buku_id" class="form-label fw-semibold">Buku</label>
                <select name="buku_id" id="buku_id" class="form-select">
                    @foreach($buku as $b)
                        <option value="{{ $b->id }}" {{ $peminjaman->buku_id == $b->id ? 'selected' : '' }}>
                            {{ $b->judul }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="tanggal_pinjam" class="form-label fw-semibold">Tanggal Pinjam</label>
                    <input type="date" name="tanggal_pinjam" class="form-control" value="{{ $peminjaman->tanggal_pinjam }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="tanggal_kembali" class="form-label fw-semibold">Tanggal Kembali</label>
                    <input type="date" name="tanggal_kembali" class="form-control" value="{{ $peminjaman->tanggal_kembali }}">
                </div>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label fw-semibold">Status</label>
                <select name="status" id="status" class="form-select">
                    <option value="Dipinjam" {{ $peminjaman->status == 'Dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                    <option value="Dikembalikan" {{ $peminjaman->status == 'Dikembalikan' ? 'selected' : '' }}>Dikembalikan</option>
                </select>
            </div>

            <div class="d-flex justify-content-end">
                <a href="{{ route('peminjaman.index') }}" class="btn btn-secondary me-2">
                    <i class="fas fa-times"></i> Batal
                </a>
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i> Update
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
