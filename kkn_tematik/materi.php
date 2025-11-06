<?php
session_start();
require_once 'config.php';

$query = "SELECT * FROM materi ORDER BY created_at DESC";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Materi & Modul - KKN ITB</title>
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
        .materi-card { border: none; border-radius: 15px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); padding: 2rem; margin-bottom: 2rem; transition: all 0.3s; }
        .materi-card:hover { transform: translateY(-5px); box-shadow: 0 8px 15px rgba(0,0,0,0.2); }
        .materi-title { color: var(--primary-color); font-weight: bold; font-size: 1.5rem; margin-bottom: 1rem; }
        .materi-content { color: #666; line-height: 1.8; white-space: pre-line; }
        .btn-download { background-color: var(--primary-color); color: white; border: none; padding: 0.75rem 2rem; border-radius: 10px; }
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
        <h1>Materi & Modul</h1>
    </div>

    <div class="container my-5">
        <?php if (mysqli_num_rows($result) > 0): ?>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <div class="materi-card">
                    <h3 class="materi-title"><?php echo htmlspecialchars($row['judul']); ?></h3>
                    <div class="materi-content">
                        <?php echo htmlspecialchars($row['deskripsi']); ?>
                    </div>
                    <?php if ($row['file_path']): ?>
                        <div class="mt-4">
                            <a href="<?php echo htmlspecialchars($row['file_path']); ?>" class="btn btn-download" download>
                                <i class="fas fa-download me-2"></i>Download PDF
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <div class="alert alert-info text-center">
                <i class="fas fa-info-circle me-2"></i>
                Belum ada materi yang tersedia.
            </div>
        <?php endif; ?>
    </div>

    <footer>
        <div class="container">
            <p class="mb-0">&copy; 2025 KKN ITB - Institut Teknologi dan Bisnis Tuban. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php mysqli_close($conn); ?>