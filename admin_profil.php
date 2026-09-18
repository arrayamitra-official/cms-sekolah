<?php
//include 'header.php';

// Ambil data profil saat ini
$query = mysqli_query($koneksi, "SELECT * FROM profil_sekolah ORDER BY id ASC LIMIT 1");
$profil = mysqli_fetch_assoc($query);

// Proses simpan data saat tombol ditekan
if (isset($_POST['simpan'])) {
    $nama_sekolah = $_POST['nama_sekolah'];
    $alamat       = $_POST['alamat'];
    
    // Cek apakah ada logo baru yang diunggah
    if (!empty($_FILES['logo']['name'])) {
        $logo_nama = time() . '_' . $_FILES['logo']['name'];
        $tmp_name  = $_FILES['logo']['tmp_name'];
        
        // Simpan langsung ke folder uploads/ (tanpa ../)
        move_uploaded_file($tmp_name, "uploads/" . $logo_nama);
        
        // Update menggunakan nama kolom 'nama_sekolah'
        $update = mysqli_query($koneksi, "UPDATE profil_sekolah SET nama_sekolah='$nama_sekolah', alamat='$alamat', logo='$logo_nama' WHERE id='" . ($profil['id'] ?? 1) . "'");
    } else {
        // Jika logo tidak diubah
        $update = mysqli_query($koneksi, "UPDATE profil_sekolah SET nama_sekolah='$nama_sekolah', alamat='$alamat' WHERE id='" . ($profil['id'] ?? 1) . "'");
    }

    if ($update) {
        echo "<script>alert('Profil Sekolah Berhasil Diperbarui!'); window.location='admin_profil.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui data!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Profil & Header Sekolah</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">

<div class="container my-5">
    <div class="card shadow-sm col-md-8 mx-auto">
        <div class="card-header bg-success text-white">
            <h5 class="mb-0">Kelola Header & Profil Sekolah</h5>
        </div>
        <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
                
                <div class="mb-3">
                    <label class="form-label font-weight-bold">Nama Sekolah</label>
                    <input type="text" name="nama_sekolah" class="form-control" value="<?= $profil['nama_sekolah'] ?? ''; ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Alamat Sekolah</label>
                    <textarea name="alamat" class="form-control" rows="3" required><?= $profil['alamat'] ?? ''; ?></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Logo Sekolah Saat Ini</label><br>
                    <?php if (!empty($profil['logo'])): ?>
                        <img src="uploads/<?= $profil['logo']; ?>" style="height: 80px; object-fit: contain;" class="mb-2 border p-1 rounded"><br>
                    <?php endif; ?>
                    <input type="file" name="logo" class="form-control" accept="image/*">
                    <small class="text-muted">*Biarkan kosong jika tidak ingin mengganti logo.</small>
                </div>

                <button type="submit" name="simpan" class="btn btn-success">Simpan Perubahan</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>