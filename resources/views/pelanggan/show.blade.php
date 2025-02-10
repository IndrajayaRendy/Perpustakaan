@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detail Pelanggan</h2>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">{{ $pelanggan->nama }}</h4>
            <p><strong>Email:</strong> {{ $pelanggan->email }}</p>
            <p><strong>Telepon:</strong> {{ $pelanggan->telepon }}</p>
            <p><strong>Alamat:</strong> {{ $pelanggan->alamat }}</p>
            <a href="{{ route('pelanggan.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection
