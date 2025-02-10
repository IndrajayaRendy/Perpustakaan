@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Peminjaman</h2>
    <a href="{{ route('peminjaman.create') }}" class="btn btn-primary">Tambah Peminjaman</a>

    <form action="{{ route('peminjaman.index') }}" method="GET" class="mt-3">
    <div class="input-group mb-3">
        <input type="text" name="search" class="form-control" placeholder="Cari pelanggan atau buku..." value="{{ request('search') }}">
        <button class="btn btn-outline-primary" type="submit">
            <i class="fas fa-search"></i> <!-- Ikon pencarian -->
        </button>
    </div>
    </form>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>Pelanggan</th>
                <th>Buku</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($peminjamans as $peminjaman)  <!-- Pastikan ini menggunakan $peminjamans -->
            <tr>
                <td>{{ $peminjaman->pelanggan->nama }}</td>
                <td>{{ $peminjaman->buku->judul }}</td>
                <td>{{ $peminjaman->tanggal_pinjam }}</td>
                <td>{{ $peminjaman->tanggal_kembali ?? 'Belum dikembalikan' }}</td>
                <td>{{ $peminjaman->status }}</td>
                <td>
                <a href="{{ route('peminjaman.show', $peminjaman->id) }}" class="btn btn-info btn-sm">
                  <i class="far fa-eye text-white"></i>
                        </a>
                        <a href="{{ route('peminjaman.edit', $peminjaman->id) }}" class="btn btn-warning btn-sm">
                        <i class="fas fa-pencil-alt text-white"></i>
                        </a>
                        <form action="{{ route('peminjaman.destroy', $peminjaman->id) }}" method="POST" class="d-inline delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger btn-sm delete-btn" data-id="{{ $peminjaman->id }}">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Informasi jumlah data dan paginasi -->
    <div class="d-flex justify-content-between align-items-center mt-3">
        <div>
            <p class="mb-0">
                Showing {{ $peminjamans->firstItem() }} to {{ $peminjamans->lastItem() }} of {{ $peminjamans->total() }} results
            </p>
        </div>
        <div class="d-flex justify-content-end">
            {!! $peminjamans->links() !!}
        </div>
    </div>
</div>
@endsection