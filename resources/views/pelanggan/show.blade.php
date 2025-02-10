@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-lg p-4">
        <h2 class="fw-bold text-primary mb-3"><i class="fas fa-user"></i> Detail Pelanggan</h2>

        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <h4 class="card-title text-dark"><i class="fas fa-user-circle"></i> {{ $pelanggan->nama }}</h4>
                <hr>
                <p><i class="fas fa-envelope"></i> <strong>Email:</strong> {{ $pelanggan->email }}</p>
                <p><i class="fas fa-phone"></i> <strong>Telepon:</strong> {{ $pelanggan->telepon }}</p>
                <p><i class="fas fa-map-marker-alt"></i> <strong>Alamat:</strong> {{ $pelanggan->alamat }}</p>
                
                <div class="d-flex justify-content-end">
                    <a href="{{ route('pelanggan.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
