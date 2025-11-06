<?php
session_start();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KKN ITB - Beranda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #0d5a8f;
            --secondary-color: #1976d2;
        }
        
        .navbar {
            background-color: var(--primary-color) !important;
            padding: 1rem 0;
        }
        
        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
            color: white !important;
        }
        
        .nav-link {
            color: white !important;
            margin: 0 1rem;
            transition: opacity 0.3s;
        }
        
        .nav-link:hover {
            opacity: 0.8;
        }
        
        .btn-login {
            background-color: white;
            color: var(--primary-color);
            border-radius: 25px;
            padding: 0.5rem 2rem;
            font-weight: 500;
        }
        
        .hero-section {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            padding: 5rem 0;
            text-align: center;
        }
        
        .hero-title {
            font-size: 3rem;
            font-weight: bold;
            margin-bottom: 2rem;
        }
        
        .section-title {
            color: var(--primary-color);
            font-size: 2.5rem;
            font-weight: bold;
            text-align: center;
            margin: 4rem 0 3rem 0;
            position: relative;
            padding-bottom: 1rem;
        }
        
        .section-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 4px;
            background-color: var(--secondary-color);
        }
        
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            transition: transform 0.3s, box-shadow 0.3s;
            height: 100%;
        }
        
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 15px rgba(0,0,0,0.2);
        }
        
        .icon-box {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background-color: var(--primary-color);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
        }
        
        .icon-box i {
            font-size: 2.5rem;
            color: white;
        }
        
        .feature-card {
            background-color: #f8f9fa;
            padding: 2rem;
            margin-bottom: 2rem;
        }
        
        footer {
            background-color: var(--primary-color);
            color: white;
            padding: 2rem 0;
            text-align: center;
            margin-top: 5rem;
        }
        
        .program-icon {
            font-size: 3rem;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">KKN ITB</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav align-items-center">
                    <li class="nav-item"><a class="nav-link" href="tentang.php">Tentang</a></li>
                    <li class="nav-item"><a class="nav-link" href="berita.php">Berita</a></li>
                    <li class="nav-item"><a class="nav-link" href="program.php">Program</a></li>
                    <li class="nav-item"><a class="nav-link" href="galeri.php">Galeri</a></li>
                    <li class="nav-item"><a class="nav-link" href="kontak.php">Kontak</a></li>
                    <li class="nav-item"><a class="nav-link" href="materi.php">Materi</a></li>
                    <li class="nav-item"><a class="btn btn-login" href="login.php">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <h1 class="hero-title">KKN TEMATIK ITB TUBAN</h1>
            <p class="lead">Kuliah Kerja Nyata Institut Teknologi dan Bisnis Tuban</p>
        </div>
    </section>

    <!-- Tentang Section -->
    <section class="container">
        <h2 class="section-title">Tentang KKN ITB</h2>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <p class="text-center lead mb-5">
                    Kuliah Kerja Nyata (KKN) Institut Teknologi dan Bisnis Tuban adalah program pengabdian masyarakat yang melibatkan mahasiswa dalam kegiatan pemberdayaan dan pengembangan masyarakat di berbagai wilayah.
                </p>
            </div>
        </div>
        
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card feature-card">
                    <div class="icon-box">
                        <i class="fas fa-bullseye"></i>
                    </div>
                    <h4 class="text-center mb-3">Visi</h4>
                    <p class="text-center">Menjadi program KKN terdepan dalam memberdayakan masyarakat melalui inovasi dan kolaborasi.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card feature-card">
                    <div class="icon-box">
                        <i class="fas fa-rocket"></i>
                    </div>
                    <h4 class="text-center mb-3">Misi</h4>
                    <p class="text-center">Mengembangkan potensi mahasiswa dan masyarakat melalui program kerja yang berkelanjutan.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card feature-card">
                    <div class="icon-box">
                        <i class="fas fa-lightbulb"></i>
                    </div>
                    <h4 class="text-center mb-3">Tujuan</h4>
                    <p class="text-center">Menciptakan dampak positif bagi masyarakat dan pengalaman berharga bagi mahasiswa.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Program Section -->
    <section class="container">
        <h2 class="section-title">Program & Lokasi KKN</h2>
        <div class="row g-4">
            <div class="col-md-3">
                <div class="card p-4 text-center">
                    <i class="fas fa-school program-icon"></i>
                    <h5 class="mb-3">Pendidikan</h5>
                    <p>Program bimbingan belajar dan literasi untuk anak-anak di desa binaan.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card p-4 text-center">
                    <i class="fas fa-briefcase program-icon"></i>
                    <h5 class="mb-3">Ekonomi</h5>
                    <p>Pemberdayaan UMKM dan pelatihan kewirausahaan untuk masyarakat.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card p-4 text-center">
                    <i class="fas fa-hospital program-icon"></i>
                    <h5 class="mb-3">Kesehatan</h5>
                    <p>Penyuluhan kesehatan dan pemeriksaan gratis untuk warga.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card p-4 text-center">
                    <i class="fas fa-leaf program-icon"></i>
                    <h5 class="mb-3">Lingkungan</h5>
                    <p>Program penghijauan dan pengelolaan sampah berkelanjutan.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Mitra Section -->
    <section class="container">
        <h2 class="section-title">Mitra & Kerjasama</h2>
        <div class="row g-4 justify-content-center">
            <div class="col-md-3">
                <div class="card p-4 text-center">
                    <i class="fas fa-landmark" style="font-size: 3rem; color: var(--primary-color);"></i>
                    <h5 class="mt-3">Pemerintah Desa Pakel</h5>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card p-4 text-center">
                    <i class="fas fa-home" style="font-size: 3rem; color: var(--primary-color);"></i>
                    <h5 class="mt-3">UMKM Lokal</h5>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card p-4 text-center">
                    <i class="fas fa-building" style="font-size: 3rem; color: var(--primary-color);"></i>
                    <h5 class="mt-3">Instansi ITB</h5>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card p-4 text-center">
                    <i class="fas fa-handshake" style="font-size: 3rem; color: var(--primary-color);"></i>
                    <h5 class="mt-3">Gen Z</h5>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <p class="mb-0">&copy; 2025 KKN TEMATIK ITB - Institut Teknologi dan Bisnis Tuban. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>