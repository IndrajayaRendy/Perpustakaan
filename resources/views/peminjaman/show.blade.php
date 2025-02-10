@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detail Peminjaman</h2>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Pelanggan: {{ $peminjaman->pelanggan->nama }}</h4>
            <p><strong>Buku:</strong> {{ $peminjaman->buku->judul }}</p>
            <p><strong>Tanggal Pinjam:</strong> {{ $peminjaman->tanggal_pinjam }}</p>
            <p><strong>Tanggal Kembali:</strong> {{ $peminjaman->tanggal_kembali ?? 'Belum dikembalikan' }}</p>
            <p><strong>Status:</strong> {{ ucfirst($peminjaman->status) }}</p>
            <a href="{{ route('peminjaman.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection
