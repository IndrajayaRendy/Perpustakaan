@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-lg p-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="fw-bold text-primary">Daftar Peminjaman</h2>
            <a href="{{ route('peminjaman.create') }}" class="btn btn-success">
                <i class="fas fa-plus-circle"></i> Tambah Peminjaman
            </a>
        </div>

        <!-- Formulir Pencarian -->
        <form action="{{ route('peminjaman.index') }}" method="GET" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control rounded-start" placeholder="Cari pelanggan atau buku..." value="{{ request('search') }}">
                <button class="btn btn-primary rounded-end" type="submit">
                    <i class="fas fa-search"></i> Cari
                </button>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-primary">
                    <tr class="text-center">
                        <th>Pelanggan</th>
                        <th>Buku</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($peminjamans as $peminjaman)
                    <tr>
                        <td>{{ $peminjaman->pelanggan->nama }}</td>
                        <td>{{ $peminjaman->buku->judul }}</td>
                        <td>{{ $peminjaman->tanggal_pinjam }}</td>
                        <td>{{ $peminjaman->tanggal_kembali ?? 'Belum dikembalikan' }}</td>
                        <td>
                            <span class="badge {{ $peminjaman->status == 'Dipinjam' ? 'bg-warning' : 'bg-success' }}">
                                {{ $peminjaman->status }}
                            </span>
                        </td>
                        <td class="text-center">
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
        </div>

        <!-- Informasi jumlah data dan paginasi -->
        <div class="d-flex justify-content-between align-items-center mt-3">
            <p class="mb-0 text-muted">
                Menampilkan {{ $peminjamans->firstItem() }} - {{ $peminjamans->lastItem() }} dari {{ $peminjamans->total() }} hasil
            </p>
            <div>
                {!! $peminjamans->links('pagination::bootstrap-4') !!}
            </div>
        </div>
    </div>
</div>
@endsection
