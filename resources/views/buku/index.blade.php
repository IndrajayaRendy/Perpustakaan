@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-lg p-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="fw-bold text-primary">Daftar Buku</h2>
            <a href="{{ route('buku.create') }}" class="btn btn-success">
                <i class="fas fa-plus-circle"></i> Tambah Buku
            </a>
        </div>

        <!-- Formulir Pencarian -->
        <form action="{{ route('buku.index') }}" method="GET" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control rounded-start" placeholder="Cari judul atau penulis..." value="{{ request('search') }}">
                <button class="btn btn-primary rounded-end" type="submit">
                    <i class="fas fa-search"></i> Cari
                </button>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-primary">
                    <tr class="text-center">
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Penerbit</th>
                        <th>Tahun Terbit</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bukus as $buku)
                    <tr>
                        <td>{{ $buku->judul }}</td>
                        <td>{{ $buku->penulis }}</td>
                        <td>{{ $buku->penerbit }}</td>
                        <td class="text-center">{{ $buku->tahun_terbit }}</td>
                        <td class="text-center">{{ $buku->stok }}</td>
                        <td class="text-center">
                            <a href="{{ route('buku.show', $buku->id) }}" class="btn btn-info btn-sm">
                                <i class="far fa-eye text-white"></i>
                            </a>
                            <a href="{{ route('buku.edit', $buku->id) }}" class="btn btn-warning btn-sm">
                                 <i class="fas fa-pencil-alt text-white"></i>
                            </a>
                            <form action="{{ route('buku.destroy', $buku->id) }}" method="POST" class="d-inline delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger btn-sm delete-btn" data-id="{{ $buku->id }}">
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
                Menampilkan {{ $bukus->firstItem() }} - {{ $bukus->lastItem() }} dari {{ $bukus->total() }} hasil
            </p>
            <div>
                {!! $bukus->links('pagination::bootstrap-4') !!}
            </div>
        </div>
    </div>
</div>

@endsection
