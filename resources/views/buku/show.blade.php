@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm border-0">
        <div class="card-body">
            <h2 class="fw-bold text-primary mb-4"><i class="fas fa-book"></i> Detail Buku</h2>

            <div class="mb-3">
                <h4 class="card-title text-success">{{ $buku->judul }}</h4>
            </div>
            
            <div class="mb-3">
                <p><strong>Penulis:</strong> <span class="text-muted">{{ $buku->penulis }}</span></p>
            </div>

            <div class="mb-3">
                <p><strong>Penerbit:</strong> <span class="text-muted">{{ $buku->penerbit }}</span></p>
            </div>

            <div class="mb-3">
                <p><strong>Tahun Terbit:</strong> <span class="text-muted">{{ $buku->tahun_terbit }}</span></p>
            </div>

            <div class="mb-3">
                <p><strong>Stok:</strong> <span class="text-muted">{{ $buku->stok }}</span></p>
            </div>

            <div class="d-flex justify-content-end">
                <a href="{{ route('buku.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
