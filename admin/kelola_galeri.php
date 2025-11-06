<?php
session_start();
require_once '../config.php';
require_login();

$success = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['action'])) {
        if ($_POST['action'] == 'add') {
            $judul = clean_input($_POST['judul']);
            $url_gambar = clean_input($_POST['url_gambar']);
            $deskripsi = clean_input($_POST['deskripsi']);
            
            $query = "INSERT INTO galeri (judul, url_gambar, deskripsi) VALUES ('$judul', '$url_gambar', '$deskripsi')";
            if (mysqli_query($conn, $query)) {
                $success = 'Foto berhasil ditambahkan!';
            } else {
                $error = 'Gagal menambahkan foto: ' . mysqli_error($conn);
            }
        } elseif ($_POST['action'] == 'delete') {
            $id = clean_input($_POST['id']);
            $query = "DELETE FROM galeri WHERE id=$id";
            if (mysqli_query($conn, $query)) {
                $success = 'Foto berhasil dihapus!';
            }
        }
    }
}

$query = "SELECT * FROM galeri ORDER BY created_at DESC";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Galeri - Admin KKN ITB</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root { --primary-color: #0d5a8f; }
        .navbar { background-color: var(--primary-color) !important; }
        .navbar-brand { font-size: 1.5rem; font-weight: bold; color: white !important; }
        .btn-logout { background-color: white; color: var(--primary-color); border-radius: 25px; padding: 0.5rem 2rem; border: none; }
        .page-title { color: var(--primary-color); font-size: 2rem; font-weight: bold; margin: 2rem 0; }
        .btn-add { background-color: var(--primary-color); color: white; border: none; padding: 0.75rem 2rem; border-radius: 10px; margin-bottom: 2rem; }
        .gallery-card { border: none; border-radius: 15px; overflow: hidden; box-shadow: 0 4px 6px rgba(0,0,0,0.1); margin-bottom: 2rem; }
        .gallery-img { width: 100%; height: 200px; object-fit: cover; }
        .btn-delete { background-color: #dc3545; color: white; border: none; padding: 0.5rem 1rem; border-radius: 8px; width: 100%; }
        .form-label { color: var(--primary-color); font-weight: 600; }
        .form-control { border: 2px solid #e0e0e0; border-radius: 10px; padding: 0.75rem; }
        .btn-submit { background-color: var(--primary-color); color: white; border: none; padding: 0.75rem 2rem; border-radius: 10px; }
    </style>
</head>
<body>
    <nav class="navbar navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="dashboard.php">
                <i class="fas fa-arrow-left me-2"></i>Dashboard Admin KKN ITB
            </a>
            <a href="logout.php" class="btn btn-logout">
                <i class="fas fa-sign-out-alt me-2"></i>Logout
            </a>
        </div>
    </nav>

    <div class="container-fluid mt-4">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="page-title">Kelola Galeri</h1>
            <button class="btn btn-add" data-bs-toggle="modal" data-bs-target="#addModal">
                <i class="fas fa-plus me-2"></i>Tambah Foto
            </button>
        </div>

        <?php if ($success): ?>
            <div class="alert alert-success alert-dismissible fade show">
                <i class="fas fa-check-circle me-2"></i><?php echo $success; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <div class="row g-4">
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <div class="col-md-4">
                <div class="gallery-card">
                    <img src="<?php echo htmlspecialchars($row['url_gambar']); ?>" alt="" class="gallery-img">
                    <div class="p-3">
                        <h5 class="mb-2"><?php echo htmlspecialchars($row['judul']); ?></h5>
                        <p class="text-muted small mb-3"><?php echo htmlspecialchars($row['deskripsi']); ?></p>
                        <form method="POST" onsubmit="return confirm('Hapus foto ini?');">
                            <input type="hidden" name="action" value="delete">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <button type="submit" class="btn btn-delete">
                                <i class="fas fa-trash me-2"></i>Hapus
                            </button>

                        </form>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>

    <!-- Add Modal -->
    <div class="modal fade" id="addModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Foto Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form method="POST">
                    <input type="hidden" name="action" value="add">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Judul Foto *</label>
                            <input type="text" class="form-control" name="judul" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">URL Gambar *</label>
                            <input type="url" class="form-control" name="url_gambar" placeholder="https://example.com/image.jpg" required>
                            <small class="text-muted">Masukkan URL lengkap gambar dari hosting/CDN Anda</small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>