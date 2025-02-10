@extends('layouts.app')

@section('title', 'Aksara Library')

@section('content')
    <!-- Banner Section -->
    <div class="d-flex justify-content-center align-items-center text-center" style="height: 50vh; background: linear-gradient(to right, #4e54c8, #8f94fb); color: white; border-radius: 15px; padding: 40px;">
        <div>
            <h1 class="fw-bold mb-3" style="font-size: 2.5rem;">📚 Selamat Datang di Perpustakaan 📚</h1>
            <p class="lead">Tempat terbaik untuk membaca, mempelajari, dan menjelajahi dunia literasi.</p>
            <a href="{{ route('buku.index') }}" class="btn btn-lg btn-light shadow mt-3 px-4 py-2">📖 Jelajahi Buku</a>
        </div>
    </div>

    <!-- Statistik Cards -->
    <div class="container mt-5">
        <div class="row text-center">
            <!-- Card Jumlah Buku -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-lg border-0 text-center card-hover" style="border-radius: 15px; transition: transform 0.3s ease;">
                    <div class="card-body">
                        <i class="fas fa-book fa-3x text-primary mb-3"></i>
                        <h5 class="card-title fw-bold" style="font-size: 1.5rem;">Jumlah Buku</h5>
                        <p class="display-4 fw-bold text-dark">{{ $jumlahBuku }}</p>
                    </div>
                </div>
            </div>

            <!-- Card Jumlah Pelanggan -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-lg border-0 text-center card-hover" style="border-radius: 15px; transition: transform 0.3s ease;">
                    <div class="card-body">
                        <i class="fas fa-users fa-3x text-success mb-3"></i>
                        <h5 class="card-title fw-bold" style="font-size: 1.5rem;">Jumlah Pelanggan</h5>
                        <p class="display-4 fw-bold text-dark">{{ $jumlahPelanggan }}</p>
                    </div>
                </div>
            </div>

            <!-- Card Jumlah Peminjam -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-lg border-0 text-center card-hover" style="border-radius: 15px; transition: transform 0.3s ease;">
                    <div class="card-body">
                        <i class="fas fa-book-reader fa-3x text-warning mb-3"></i>
                        <h5 class="card-title fw-bold" style="font-size: 1.5rem;">Jumlah Peminjam</h5>
                        <p class="display-4 fw-bold text-dark">{{ $jumlahPeminjam }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Hover Effect and Card Style -->
    <style>
        .card-hover {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card-hover:hover {
            transform: scale(1.05);
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.1);
        }

        /* Optional: Adding spacing around the card content */
        .card-body {
            padding: 2rem;
        }

        .card-title {
            font-size: 1.3rem;
        }

        .display-4 {
            font-size: 2.5rem;
        }
    </style>
@endsection
