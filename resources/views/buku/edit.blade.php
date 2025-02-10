@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Buku</h2>
    <form action="{{ route('buku.update', $buku->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="judul" class="form-label">Judul Buku</label>
            <input type="text" name="judul" class="form-control" value="{{ $buku->judul }}" required>
        </div>
        <div class="mb-3">
            <label for="penulis" class="form-label">Penulis</label>
            <input type="text" name="penulis" class="form-control" value="{{ $buku->penulis }}" required>
        </div>
        <div class="mb-3">
            <label for="penerbit" class="form-label">Penerbit</label>
            <input type="text" name="penerbit" class="form-control" value="{{ $buku->penerbit }}" required>
        </div>
        <div class="mb-3">
            <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
            <input type="number" name="tahun_terbit" class="form-control" value="{{ $buku->tahun_terbit }}" required>
        </div>
        <div class="mb-3">
            <label for="stok" class="form-label">Stok</label>
            <input type="number" name="stok" class="form-control" value="{{ $buku->stok }}" required>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('buku.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
