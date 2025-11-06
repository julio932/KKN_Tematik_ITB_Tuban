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
            $deskripsi = clean_input($_POST['deskripsi']);
            
            $query = "INSERT INTO materi (judul, deskripsi) VALUES ('$judul', '$deskripsi')";
            if (mysqli_query($conn, $query)) {
                $success = 'Materi berhasil ditambahkan!';
            } else {
                $error = 'Gagal menambahkan materi: ' . mysqli_error($conn);
            }
        } elseif ($_POST['action'] == 'edit') {
            $id = clean_input($_POST['id']);
            $judul = clean_input($_POST['judul']);
            $deskripsi = clean_input($_POST['deskripsi']);
            
            $query = "UPDATE materi SET judul='$judul', deskripsi='$deskripsi' WHERE id=$id";
            if (mysqli_query($conn, $query)) {
                $success = 'Materi berhasil diupdate!';
            } else {
                $error = 'Gagal mengupdate materi: ' . mysqli_error($conn);
            }
        } elseif ($_POST['action'] == 'delete') {
            $id = clean_input($_POST['id']);
            $query = "DELETE FROM materi WHERE id=$id";
            if (mysqli_query($conn, $query)) {
                $success = 'Materi berhasil dihapus!';
            }
        }
    }
}

$query = "SELECT * FROM materi ORDER BY created_at DESC";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Materi - Admin KKN ITB</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root { --primary-color: #0d5a8f; }
        .navbar { background-color: var(--primary-color) !important; }
        .navbar-brand { font-size: 1.5rem; font-weight: bold; color: white !important; }
        .btn-logout { background-color: white; color: var(--primary-color); border-radius: 25px; padding: 0.5rem 2rem; border: none; }
        .page-title { color: var(--primary-color); font-size: 2rem; font-weight: bold; margin: 2rem 0; }
        .btn-add { background-color: var(--primary-color); color: white; border: none; padding: 0.75rem 2rem; border-radius: 10px; margin-bottom: 2rem; }
        .table-card { background: white; border-radius: 15px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); padding: 2rem; }
        .btn-edit { background-color: #ffc107; color: white; border: none; padding: 0.5rem 1rem; border-radius: 8px; }
        .btn-delete { background-color: #dc3545; color: white; border: none; padding: 0.5rem 1rem; border-radius: 8px; }
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
            <h1 class="page-title">Kelola Materi</h1>
            <button class="btn btn-add" data-bs-toggle="modal" data-bs-target="#addModal">
                <i class="fas fa-plus me-2"></i>Tambah Materi
            </button>
        </div>

        <?php if ($success): ?>
            <div class="alert alert-success alert-dismissible fade show">
                <i class="fas fa-check-circle me-2"></i><?php echo $success; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <?php if ($error): ?>
            <div class="alert alert-danger alert-dismissible fade show">
                <i class="fas fa-exclamation-triangle me-2"></i><?php echo $error; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <div class="table-card">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th width="25%">Judul</th>
                            <th width="50%">Deskripsi</th>
                            <th width="20%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        while ($row = mysqli_fetch_assoc($result)): 
                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo htmlspecialchars($row['judul']); ?></td>
                            <td><?php echo substr(htmlspecialchars($row['deskripsi']), 0, 150) . '...'; ?></td>
                            <td>
                                <button class="btn btn-edit btn-sm me-1" onclick="editMateri(<?php echo htmlspecialchars(json_encode($row)); ?>)">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-delete btn-sm" onclick="deleteMateri(<?php echo $row['id']; ?>, '<?php echo htmlspecialchars($row['judul']); ?>')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Add Modal -->
    <div class="modal fade" id="addModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Materi Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form method="POST">
                    <input type="hidden" name="action" value="add">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Judul Materi *</label>
                            <input type="text" class="form-control" name="judul" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Deskripsi *</label>
                            <textarea class="form-control" name="deskripsi" rows="15" required></textarea>
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

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Materi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form method="POST">
                    <input type="hidden" name="action" value="edit">
                    <input type="hidden" name="id" id="edit_id">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Judul Materi *</label>
                            <input type="text" class="form-control" name="judul" id="edit_judul" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Deskripsi *</label>
                            <textarea class="form-control" name="deskripsi" id="edit_deskripsi" rows="15" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-submit">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete Form -->
    <form method="POST" id="deleteForm" style="display: none;">
        <input type="hidden" name="action" value="delete">
        <input type="hidden" name="id" id="delete_id">
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function editMateri(data) {
            document.getElementById('edit_id').value = data.id;
            document.getElementById('edit_judul').value = data.judul;
            document.getElementById('edit_deskripsi').value = data.deskripsi;
            new bootstrap.Modal(document.getElementById('editModal')).show();
        }

        function deleteMateri(id, judul) {
            if (confirm('Apakah Anda yakin ingin menghapus materi "' + judul + '"?')) {
                document.getElementById('delete_id').value = id;
                document.getElementById('deleteForm').submit();
            }
        }
    </script>

</body>
</html>