@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-lg p-4">
    <h2 class="fw-bold text-primary mb-3">
    <i class="fas fa-file-alt"></i> Detail Peminjaman
    </h2>
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <h4 class="card-title text-dark fw-semibold">
                    <i class="fas fa-user"></i> {{ $peminjaman->pelanggan->nama }}
                </h4>
                <hr>

                <p class="mb-2"><strong><i class="fas fa-book"></i> Buku:</strong> {{ $peminjaman->buku->judul }}</p>
                <p class="mb-2"><strong><i class="fas fa-calendar-alt"></i> Tanggal Pinjam:</strong> {{ $peminjaman->tanggal_pinjam }}</p>
                <p class="mb-2">
                    <strong><i class="fas fa-calendar-check"></i> Tanggal Kembali:</strong> 
                    {{ $peminjaman->tanggal_kembali ?? 'Belum dikembalikan' }}
                </p>
                <p class="mb-3">
                    <strong><i class="fas fa-info-circle"></i> Status:</strong> 
                    <span class="badge {{ $peminjaman->status == 'Dipinjam' ? 'bg-warning text-dark' : 'bg-success' }}">
                        {{ ucfirst($peminjaman->status) }}
                    </span>
                </p>

                <div class="d-flex justify-content-end">
                    <a href="{{ route('peminjaman.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
