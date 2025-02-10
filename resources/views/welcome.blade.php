@extends('layouts.app')

@section('title', 'Selamat Datang di Perpustakaan')

@section('content')
    <div class="d-flex justify-content-center align-items-center" style="height: 80vh; background: linear-gradient(to right, #4e54c8, #8f94fb); color: white; border-radius: 15px; padding: 40px;">
        <div class="text-center">
            <h1 class="fw-bold mb-3">📚 Selamat Datang di Perpustakaan 📚</h1>
            <p class="lead">Tempat terbaik untuk membaca, mempelajari, dan menjelajahi dunia literasi.</p>
            <a href="{{ route('buku.index') }}" class="btn btn-lg btn-light shadow mt-3">📖 Jelajahi Buku</a>
        </div>
    </div>
@endsection
