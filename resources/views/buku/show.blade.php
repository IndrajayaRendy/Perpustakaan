@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detail Buku</h2>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">{{ $buku->judul }}</h4>
            <p><strong>Penulis:</strong> {{ $buku->penulis }}</p>
            <p><strong>Penerbit:</strong> {{ $buku->penerbit }}</p>
            <p><strong>Tahun Terbit:</strong> {{ $buku->tahun_terbit }}</p>
            <p><strong>Stok:</strong> {{ $buku->stok }}</p>
            <a href="{{ route('buku.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection
