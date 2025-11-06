<?php
session_start();
require_once 'config.php';

// Fetch galeri from database
$query = "SELECT * FROM galeri ORDER BY created_at DESC";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri - KKN ITB</title>
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
            width: 100px;
            height: 4px;
            background-color: var(--secondary-color);
        }
        
        .gallery-card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            transition: all 0.3s;
            margin-bottom: 2rem;
        }
        
        .gallery-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 15px rgba(0,0,0,0.2);
        }
        
        .gallery-img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            cursor: pointer;
        }
        
        .gallery-body {
            padding: 1.5rem;
        }
        
        .gallery-title {
            color: var(--primary-color);
            font-weight: bold;
            font-size: 1.1rem;
            margin-bottom: 0.75rem;
        }
        
        .gallery-description {
            color: #666;
            font-size: 0.95rem;
        }
        
        .modal-img {
            width: 100%;
            max-height: 80vh;
            object-fit: contain;
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
        <h1>Galeri</h1>
    </div>

    <!-- Gallery Content -->
    <div class="container my-5">
        <?php if (mysqli_num_rows($result) > 0): ?>
            <div class="row g-4">
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <div class="col-md-4">
                        <div class="gallery-card">
                            <img src="<?php echo htmlspecialchars($row['url_gambar']); ?>" 
                                 alt="<?php echo htmlspecialchars($row['judul']); ?>" 
                                 class="gallery-img"
                                 data-bs-toggle="modal" 
                                 data-bs-target="#imageModal<?php echo $row['id']; ?>">
                            <div class="gallery-body">
                                <h5 class="gallery-title"><?php echo htmlspecialchars($row['judul']); ?></h5>
                                <?php if ($row['deskripsi']): ?>
                                    <p class="gallery-description"><?php echo htmlspecialchars($row['deskripsi']); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <!-- Modal for image -->
                    <div class="modal fade" id="imageModal<?php echo $row['id']; ?>" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title"><?php echo htmlspecialchars($row['judul']); ?></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body text-center">
                                    <img src="<?php echo htmlspecialchars($row['url_gambar']); ?>" 
                                         alt="<?php echo htmlspecialchars($row['judul']); ?>" 
                                         class="modal-img">
                                    <?php if ($row['deskripsi']): ?>
                                        <p class="mt-3"><?php echo htmlspecialchars($row['deskripsi']); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php else: ?>
            <div class="alert alert-info text-center">
                <i class="fas fa-info-circle me-2"></i>
                Belum ada foto yang diupload di galeri.
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