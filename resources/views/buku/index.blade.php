@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Buku</h2>
    <a href="{{ route('buku.create') }}" class="btn btn-primary">Tambah Buku</a>

    <!-- Formulir Pencarian -->
    <form action="{{ route('buku.index') }}" method="GET" class="mt-3">
    <div class="input-group mb-3">
        <input type="text" name="search" class="form-control" placeholder="Cari judul atau penulis..." value="{{ request('search') }}">
        <button class="btn btn-outline-primary" type="submit">
            <i class="fas fa-search"></i> <!-- Ikon pencarian -->
        </button>
    </div>
    </form>

    <table class="table mt-3">
        <thead>
            <tr>
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
                <td>{{ $buku->tahun_terbit }}</td>
                <td>{{ $buku->stok }}</td>
                <td>
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

    <!-- Informasi jumlah data dan paginasi -->
    <div class="d-flex justify-content-between align-items-center mt-3">
        <div>
            <p class="mb-0">
                Showing {{ $bukus->firstItem() }} to {{ $bukus->lastItem() }} of {{ $bukus->total() }} results
            </p>
        </div>
        <div>
            {!! $bukus->links() !!}
        </div>
    </div>
</div>

@endsection
