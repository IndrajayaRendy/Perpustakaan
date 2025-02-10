@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Pelanggan</h2>
    <a href="{{ route('pelanggan.create') }}" class="btn btn-primary">Tambah Pelanggan</a>
    <table class="table mt-3">
        <thead>
            <tr>
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
                <td>
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

    <!-- Informasi jumlah data dan paginasi -->
    <div class="d-flex justify-content-between align-items-center mt-3">
        <div>
            <p class="mb-0">
                Showing {{ $pelanggans->firstItem() }} to {{ $pelanggans->lastItem() }} of {{ $pelanggans->total() }} results
            </p>
        </div>
        <div class="d-flex justify-content-end">
            {!! $pelanggans->links() !!}
        </div>
    </div>
</div>
@endsection