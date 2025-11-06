<?php
session_start();
require_once 'config.php';

// Fetch berita from database
$query = "SELECT * FROM berita ORDER BY tanggal DESC";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita & Kegiatan - KKN ITB</title>
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
            width: 150px;
            height: 4px;
            background-color: var(--secondary-color);
        }
        
        .berita-header {
            background-color: var(--primary-color);
            color: white;
            padding: 3rem 0;
            margin: 3rem 0;
            border-radius: 20px;
        }
        
        .berita-icon {
            font-size: 5rem;
            margin-bottom: 1rem;
        }
        
        .berita-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            margin-bottom: 2rem;
            overflow: hidden;
            transition: transform 0.3s;
        }
        
        .berita-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0,0,0,0.2);
        }
        
        .berita-date {
            background-color: var(--primary-color);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 25px;
            font-size: 0.875rem;
            display: inline-block;
            margin-bottom: 1rem;
        }
        
        .berita-title {
            color: var(--primary-color);
            font-weight: bold;
            font-size: 1.25rem;
            margin-bottom: 1rem;
        }
        
        .berita-content {
            color: #666;
            line-height: 1.8;
        }
        
        .badge-berita {
            background-color: #e3f2fd;
            color: var(--primary-color);
            padding: 0.5rem 1rem;
            border-radius: 15px;
            font-weight: 500;
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
        <h1>Berita & Kegiatan Terbaru</h1>
    </div>

    <!-- Content -->
    <div class="container my-5">
        <!-- Header -->
        <div class="berita-header text-center">
            <i class="fas fa-newspaper berita-icon"></i>
            <h2>Informasi Terkini KKN ITB</h2>
        </div>

        <!-- Berita List -->
        <?php if (mysqli_num_rows($result) > 0): ?>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <div class="berita-card">
                    <div class="card-body p-4">
                        <div class="berita-date">
                            <i class="fas fa-calendar-alt me-2"></i>
                            <?php echo date('d/m/Y', strtotime($row['tanggal'])); ?>
                        </div>
                        
                        <h3 class="berita-title">
                            <?php echo htmlspecialchars($row['judul']); ?>
                        </h3>
                        
                        <div class="berita-content">
                            <?php 
                            $konten = htmlspecialchars($row['konten']);
                            // Display first 300 characters
                            if (strlen($konten) > 300) {
                                echo nl2br(substr($konten, 0, 300)) . '...';
                            } else {
                                echo nl2br($konten);
                            }
                            ?>
                        </div>
                        
                        <div class="mt-3">
                            <span class="badge-berita">
                                <i class="fas fa-tag me-2"></i>berita terbaru
                            </span>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <div class="alert alert-info text-center">
                <i class="fas fa-info-circle me-2"></i>
                Belum ada berita yang dipublikasikan.
            </div>
        <?php endif; ?>
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
<?php mysqli_close($conn); ?>