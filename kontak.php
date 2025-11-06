<?php
session_start();

$success = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = htmlspecialchars(trim($_POST['nama']));
    $email = htmlspecialchars(trim($_POST['email']));
    $subjek = htmlspecialchars(trim($_POST['subjek']));
    $pesan = htmlspecialchars(trim($_POST['pesan']));
    
    // Simulasi pengiriman email (bisa diimplementasikan dengan mail() atau PHPMailer)
    if (!empty($nama) && !empty($email) && !empty($pesan)) {
        $success = 'Pesan Anda berhasil dikirim! Kami akan segera menghubungi Anda.';
    } else {
        $error = 'Mohon lengkapi semua field yang wajib diisi.';
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hubungi Kami - KKN ITB</title>
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
            width: 120px;
            height: 4px;
            background-color: var(--secondary-color);
        }
        
        .contact-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            padding: 2rem;
            height: 100%;
        }
        
        .contact-icon {
            width: 60px;
            height: 60px;
            background-color: var(--primary-color);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
        }
        
        .contact-icon i {
            font-size: 1.5rem;
            color: white;
        }
        
        .contact-title {
            color: var(--primary-color);
            font-weight: bold;
            margin-bottom: 0.5rem;
        }
        
        .form-section {
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            padding: 2.5rem;
        }
        
        .form-label {
            color: var(--primary-color);
            font-weight: 600;
            margin-bottom: 0.5rem;
        }
        
        .form-control, .form-select {
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            padding: 0.75rem 1rem;
        }
        
        .form-control:focus, .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(13, 90, 143, 0.25);
        }
        
        .btn-send {
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 0.75rem 3rem;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.3s;
        }
        
        .btn-send:hover {
            background-color: #094a75;
            transform: translateY(-2px);
        }
        
        .email-icon-large {
            font-size: 5rem;
            color: var(--primary-color);
            margin-bottom: 1.5rem;
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
        <h1>Hubungi Kami</h1>
    </div>

    <!-- Contact Info -->
    <div class="container my-5">
        <h2 class="text-center mb-5" style="color: var(--primary-color); font-weight: bold;">Informasi Kontak</h2>
        
        <div class="row g-4 mb-5">
            <div class="col-md-4">
                <div class="contact-card text-center">
                    <div class="contact-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <h5 class="contact-title">Alamat</h5>
                    <p class="text-muted">Jl. Telang Indah No.1, Tuban, Jawa Timur</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="contact-card text-center">
                    <div class="contact-icon">
                        <i class="fas fa-phone"></i>
                    </div>
                    <h5 class="contact-title">Telepon</h5>
                    <p class="text-muted">(0356) 123456</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="contact-card text-center">
                    <div class="contact-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <h5 class="contact-title">Email</h5>
                    <p class="text-muted">kkn@itbtuban.ac.id</p>
                </div>
            </div>
        </div>

        <!-- Contact Form -->
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="form-section">
                    <div class="text-center mb-4">
                        <i class="fas fa-at email-icon-large"></i>
                        <h3 style="color: var(--primary-color); font-weight: bold;">Kirim Pesan</h3>
                        <p class="text-muted">Untuk mengirim pesan atau pertanyaan, silakan hubungi kami melalui email:</p>
                        <h5 style="color: var(--primary-color);">kkntematikitbtuban22@gmail.com</h5>
                    </div>
                    
                    <?php if ($success): ?>
                        <div class="alert alert-success" role="alert">
                            <i class="fas fa-check-circle me-2"></i><?php echo $success; ?>
                        </div>
                    <?php endif; ?>
                    
                    <?php if ($error): ?>
                        <div class="alert alert-danger" role="alert">
                            <i class="fas fa-exclamation-triangle me-2"></i><?php echo $error; ?>
                        </div>
                    <?php endif; ?>

                    <form method="POST" action="">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Lengkap *</label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="email" class="form-label">Email *</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="subjek" class="form-label">Subjek</label>
                            <input type="text" class="form-control" id="subjek" name="subjek">
                        </div>
                        
                        <div class="mb-4">
                            <label for="pesan" class="form-label">Pesan *</label>
                            <textarea class="form-control" id="pesan" name="pesan" rows="5" required></textarea>
                        </div>
                        
                        <div class="text-center">
                            <button type="submit" class="btn btn-send">
                                <i class="fas fa-paper-plane me-2"></i>Kirim Pesan
                            </button>
                        </div>
                    </form>
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