<?php
session_start();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang KKN ITB</title>
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
        }
        
        .btn-login {
            background-color: white;
            color: var(--primary-color);
            border-radius: 25px;
            padding: 0.5rem 2rem;
        }
        
        .page-title {
            background-color: #f8f9fa;
            padding: 3rem 0;
            text-align: center;
        }
        
        .page-title h1 {
            color: var(--primary-color);
            font-size: 2.5rem;
            font-weight: bold;
            position: relative;
            display: inline-block;
            padding-bottom: 1rem;
        }
        
        .page-title h1::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 4px;
            background-color: var(--secondary-color);
        }
        
        .content-section {
            padding: 3rem 0;
        }
        
        .feature-box {
            background-color: #f8f9fa;
            padding: 2.5rem;
            border-radius: 15px;
            margin-bottom: 2rem;
            height: 100%;
        }
        
        .icon-wrapper {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background-color: var(--primary-color);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
        }
        
        .icon-wrapper i {
            font-size: 2.5rem;
            color: white;
        }
        
        .dosen-card {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        
        .dosen-avatar {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
        }
        
        .dosen-avatar i {
            font-size: 4rem;
            color: white;
        }
        
        footer {
            background-color: var(--primary-color);
            color: white;
            padding: 2rem 0;
            text-align: center;
            margin-top: 5rem;
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
                    <li class="nav-item"><a class="btn btn-login" href="login.php">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Page Title -->
    <div class="page-title">
        <h1>Tentang KKN ITB</h1>
    </div>

    <!-- Content -->
    <div class="container content-section">
        <div class="row justify-content-center mb-5">
            <div class="col-md-10">
                <p class="lead text-center">
                    Kuliah Kerja Nyata (KKN) Institut Teknologi dan Bisnis Tuban adalah program pengabdian masyarakat yang melibatkan mahasiswa dalam kegiatan pemberdayaan dan pengembangan masyarakat di berbagai wilayah.
                </p>
            </div>
        </div>

        <!-- Visi Misi Tujuan -->
        <div class="row g-4 mb-5">
            <div class="col-md-4">
                <div class="feature-box">
                    <div class="icon-wrapper">
                        <i class="fas fa-bullseye"></i>
                    </div>
                    <h4 class="text-center mb-3">Visi</h4>
                    <p class="text-center">Menjadi program KKN terdepan dalam memberdayakan masyarakat melalui inovasi dan kolaborasi.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-box">
                    <div class="icon-wrapper">
                        <i class="fas fa-rocket"></i>
                    </div>
                    <h4 class="text-center mb-3">Misi</h4>
                    <p class="text-center">Mengembangkan potensi mahasiswa dan masyarakat melalui program kerja yang berkelanjutan.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-box">
                    <div class="icon-wrapper">
                        <i class="fas fa-lightbulb"></i>
                    </div>
                    <h4 class="text-center mb-3">Tujuan</h4>
                    <p class="text-center">Menciptakan dampak positif bagi masyarakat dan pengalaman berharga bagi mahasiswa.</p>
                </div>
            </div>
        </div>

        <!-- Dosen Pembimbing -->
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="text-center mb-5" style="color: var(--primary-color); font-weight: bold;">Sambutan Dosen Pembimbing Lapangan</h2>
                <div class="dosen-card">
                <div class="dosen-avatar">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <h4 style="color: var(--primary-color); font-weight: bold;">Diyan Agus Permana, S.AB., M.A.</h4>
                    <p class="text-muted mb-4">Dosen Pembimbing Lapangan KKN ITB</p>
                    <p class="text-start">
                        Selamat datang di program KKN ITB! Melalui program ini, kami berharap mahasiswa dapat mengaplikasikan ilmu yang telah dipelajari untuk memberikan kontribusi nyata bagi masyarakat. Mari bersama-sama membangun negeri melalui dedikasi dan kerja keras.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="container">
            <p class="mb-0">&copy; 2025 KKN ITB - Institut Teknologi dan Bisnis Tuban. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>