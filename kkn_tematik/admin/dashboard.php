<?php
session_start();
require_once '../config.php';
require_login();

// Get statistics
$query_berita = "SELECT COUNT(*) as total FROM berita";
$query_galeri = "SELECT COUNT(*) as total FROM galeri";
$query_materi = "SELECT COUNT(*) as total FROM materi";

$total_berita = mysqli_fetch_assoc(mysqli_query($conn, $query_berita))['total'];
$total_galeri = mysqli_fetch_assoc(mysqli_query($conn, $query_galeri))['total'];
$total_materi = mysqli_fetch_assoc(mysqli_query($conn, $query_materi))['total'];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - KKN ITB</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #0d5a8f;
            --secondary-color: #1976d2;
        }
        
        .navbar {
            background-color: var(--primary-color) !important;
        }
        
        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
            color: white !important;
        }
        
        .btn-logout {
            background-color: white;
            color: var(--primary-color);
            border-radius: 25px;
            padding: 0.5rem 2rem;
            border: none;
        }
        
        .page-title {
            color: var(--primary-color);
            font-size: 2rem;
            font-weight: bold;
            margin: 2rem 0;
        }
        
        .stats-card {
            border-radius: 15px;
            padding: 2rem;
            color: white;
            margin-bottom: 2rem;
            transition: transform 0.3s;
        }
        
        .stats-card:hover {
            transform: translateY(-5px);
        }
        
        .stats-card.berita {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        .stats-card.galeri {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        }
        
        .stats-card.materi {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        }
        
        .stats-number {
            font-size: 3rem;
            font-weight: bold;
        }
        
        .stats-label {
            font-size: 1.25rem;
            opacity: 0.9;
        }
        
        .stats-icon {
            font-size: 3rem;
            opacity: 0.3;
            position: absolute;
            right: 1.5rem;
            top: 50%;
            transform: translateY(-50%);
        }
        
        .menu-card {
            border: none;
            border-radius: 15px;
            padding: 2rem;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            transition: all 0.3s;
            height: 100%;
        }
        
        .menu-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 15px rgba(0,0,0,0.2);
        }
        
        .menu-icon {
            font-size: 3rem;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }
        
        .menu-title {
            color: var(--primary-color);
            font-weight: bold;
            font-size: 1.25rem;
        }
        
        .btn-menu {
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 0.75rem 2rem;
            border-radius: 10px;
            margin-top: 1rem;
            transition: all 0.3s;
        }
        
        .btn-menu:hover {
            background-color: #094a75;
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-dark">
        <div class="container-fluid">
            <span class="navbar-brand">Dashboard Admin KKN ITB</span>
            <a href="logout.php" class="btn btn-logout">
                <i class="fas fa-sign-out-alt me-2"></i>Logout
            </a>
        </div>
    </nav>

    <div class="container-fluid mt-4">
        <h1 class="page-title">Selamat Datang, Admin!</h1>
        
        <!-- Statistics -->
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="stats-card berita position-relative">
                    <i class="fas fa-newspaper stats-icon"></i>
                    <div class="stats-number"><?php echo $total_berita; ?></div>
                    <div class="stats-label">Judul Berita</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stats-card galeri position-relative">
                    <i class="fas fa-images stats-icon"></i>
                    <div class="stats-number"><?php echo $total_galeri; ?></div>
                    <div class="stats-label">Judul Foto</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stats-card materi position-relative">
                    <i class="fas fa-book stats-icon"></i>
                    <div class="stats-number"><?php echo $total_materi; ?></div>
                    <div class="stats-label">Judul Materi</div>
                </div>
            </div>
        </div>

        <!-- Management Menu -->
        <div class="row g-4">
            <div class="col-md-4">
                <div class="menu-card">
                    <i class="fas fa-newspaper menu-icon"></i>
                    <h5 class="menu-title">Kelola Berita</h5>
                    <p class="text-muted">Tambah, edit, dan hapus berita</p>
                    <a href="kelola_berita.php" class="btn btn-menu">
                        <i class="fas fa-edit me-2"></i>Kelola
                    </a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="menu-card">
                    <i class="fas fa-images menu-icon"></i>
                    <h5 class="menu-title">Kelola Galeri</h5>
                    <p class="text-muted">Upload dan kelola foto kegiatan</p>
                    <a href="kelola_galeri.php" class="btn btn-menu">
                        <i class="fas fa-edit me-2"></i>Kelola
                    </a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="menu-card">
                    <i class="fas fa-book menu-icon"></i>
                    <h5 class="menu-title">Kelola Materi</h5>
                    <p class="text-muted">Upload materi dan dokumentasi</p>
                    <a href="kelola_materi.php" class="btn btn-menu">
                        <i class="fas fa-edit me-2"></i>Kelola
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>