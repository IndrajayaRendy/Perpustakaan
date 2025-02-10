@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Peminjaman</h2>
    <form action="{{ route('peminjaman.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="pelanggan_id" class="form-label">Pelanggan</label>
            <select name="pelanggan_id" class="form-control" required>
                @foreach($pelanggans as $pelanggan)
                <option value="{{ $pelanggan->id }}">{{ $pelanggan->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="buku_id" class="form-label">Buku</label>
            <select name="buku_id" class="form-control" required>
                @foreach($buku as $buku)
                <option value="{{ $buku->id }}">{{ $buku->judul }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="tanggal_pinjam" class="form-label">Tanggal Pinjam</label>
            <input type="date" name="tanggal_pinjam" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('peminjaman.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
