@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-lg p-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="fw-bold text-primary">Daftar Pelanggan</h2>
            <a href="{{ route('pelanggan.create') }}" class="btn btn-success">
                <i class="fas fa-plus-circle"></i> Tambah Pelanggan
            </a>
        </div>

        <!-- Formulir Pencarian -->
        <form action="{{ route('pelanggan.index') }}" method="GET" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control rounded-start" placeholder="Cari nama atau email..." value="{{ request('search') }}">
                <button class="btn btn-primary rounded-end" type="submit">
                    <i class="fas fa-search"></i> Cari
                </button>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-primary">
                    <tr class="text-center">
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Telepon</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pelanggans as $pelanggan)
                    <tr>
                        <td>{{ $pelanggan->nama }}</td>
                        <td>{{ $pelanggan->email }}</td>
                        <td>{{ $pelanggan->telepon }}</td>
                        <td>{{ $pelanggan->alamat }}</td>
                        <td class="text-center">
                            <a href="{{ route('pelanggan.show', $pelanggan->id) }}" class="btn btn-info btn-sm">
                                <i class="far fa-eye text-white"></i>
                            </a>
                            <a href="{{ route('pelanggan.edit', $pelanggan->id) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-pencil-alt text-white"></i>
                            </a>
                            <form action="{{ route('pelanggan.destroy', $pelanggan->id) }}" method="POST" class="d-inline delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger btn-sm delete-btn" data-id="{{ $pelanggan->id }}">
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
                Menampilkan {{ $pelanggans->firstItem() }} - {{ $pelanggans->lastItem() }} dari {{ $pelanggans->total() }} hasil
            </p>
            <div>
                {!! $pelanggans->links('pagination::bootstrap-4') !!}
            </div>
        </div>
    </div>
</div>
@endsection
