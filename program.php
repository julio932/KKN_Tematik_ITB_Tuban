<?php session_start(); ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Program & Lokasi KKN - KKN ITB</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root { --primary-color: #0d5a8f; --secondary-color: #1976d2; }
        .navbar { background-color: var(--primary-color) !important; }
        .navbar-brand { font-size: 1.5rem; font-weight: bold; color: white !important; }
        .nav-link { color: white !important; margin: 0 1rem; }
        .btn-login { background-color: white; color: var(--primary-color); border-radius: 25px; padding: 0.5rem 2rem; }
        .page-title { background-color: #f8f9fa; padding: 3rem 0; text-align: center; }
        .page-title h1 { color: var(--primary-color); font-size: 2.5rem; font-weight: bold; position: relative; display: inline-block; padding-bottom: 1rem; }
        .page-title h1::after { content: ''; position: absolute; bottom: 0; left: 50%; transform: translateX(-50%); width: 150px; height: 4px; background-color: var(--secondary-color); }
        .program-card { border: none; border-radius: 15px; padding: 2.5rem; text-align: center; box-shadow: 0 4px 6px rgba(0,0,0,0.1); transition: all 0.3s; height: 100%; }
        .program-card:hover { transform: translateY(-10px); box-shadow: 0 8px 15px rgba(0,0,0,0.2); }
        .program-icon { font-size: 4rem; color: var(--primary-color); margin-bottom: 1.5rem; }
        .program-title { color: var(--primary-color); font-weight: bold; font-size: 1.5rem; margin-bottom: 1rem; }
        footer { background-color: var(--primary-color); color: white; padding: 2rem 0; text-align: center; margin-top: 5rem; }
    </style>
</head>
<body>
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

    <div class="page-title">
        <h1>Program & Lokasi KKN</h1>
    </div>

    <div class="container my-5">
        <div class="row g-4">
            <div class="col-md-3">
                <div class="program-card">
                    <i class="fas fa-school program-icon"></i>
                    <h5 class="program-title">Pendidikan</h5>
                    <p>Program bimbingan belajar dan literasi untuk anak-anak di desa binaan.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="program-card">
                    <i class="fas fa-briefcase program-icon"></i>
                    <h5 class="program-title">Ekonomi</h5>
                    <p>Pemberdayaan UMKM dan pelatihan kewirausahaan untuk masyarakat.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="program-card">
                    <i class="fas fa-hospital program-icon"></i>
                    <h5 class="program-title">Kesehatan</h5>
                    <p>Penyuluhan kesehatan dan pemeriksaan gratis untuk warga.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="program-card">
                    <i class="fas fa-leaf program-icon"></i>
                    <h5 class="program-title">Lingkungan</h5>
                    <p>Program penghijauan dan pengelolaan sampah berkelanjutan.</p>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <div class="container">
            <p class="mb-0">&copy; 2025 KKN ITB - Institut Teknologi dan Bisnis Tuban. All rights reserved.</p>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>