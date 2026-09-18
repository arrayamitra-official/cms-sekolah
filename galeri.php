<?php
include "koneksi.php";

// Ambil data profil sekolah untuk header
$q_profil = mysqli_query($koneksi, "SELECT * FROM profil_sekolah WHERE id=1");
$profil   = mysqli_fetch_assoc($q_profil);

$nama_sekolah = $profil['nama_sekolah'] ?? 'SDN SUMBERSUKO';
$alamat       = $profil['alamat'] ?? 'Jl. Raya Pakis No. 123, Malang';
$logo         = !empty($profil['logo']) && file_exists('uploads/' . $profil['logo']) ? 'uploads/' . $profil['logo'] : '';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri Kegiatan - <?= htmlspecialchars($nama_sekolah); ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body class="bg-light d-flex flex-column min-vh-100">

<!-- NAVBAR HEADER -->
<nav class="navbar navbar-expand-lg navbar-dark bg-success shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold d-flex align-items-center" href="index.php">
            <?php if (!empty($logo)): ?>
                <img src="<?= $logo; ?>" alt="Logo" height="40" class="me-2 rounded bg-white p-1">
            <?php else: ?>
                <i class="bi bi-building-fill fs-3 me-2"></i>
            <?php endif; ?>
            <div>
                <?= htmlspecialchars($nama_sekolah); ?><br>
                <small style="font-size: 10px; font-weight: normal;" class="d-block text-white-50">
                    <?= htmlspecialchars($alamat); ?>
                </small>
            </div>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="index.php">Beranda</a></li>
                <li class="nav-item"><a class="nav-link" href="halaman.php?kategori=struktur">Struktur Organisasi</a></li>
                <li class="nav-item"><a class="nav-link" href="halaman.php?kategori=sarana">Sarana & Prasarana</a></li>
                <li class="nav-item"><a class="nav-link" href="halaman.php?kategori=kegiatan">Kegiatan</a></li>
                <li class="nav-item"><a class="nav-link active fw-bold" href="galeri.php">Galeri</a></li>
                <li class="nav-item"><a class="nav-link" href="kontak.php">Kontak</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- KONTEN GALERI -->
<div class="container my-5">
    <h2 class="text-success fw-bold mb-4 border-bottom pb-2"><i class="bi bi-images me-2"></i>Galeri Kegiatan Sekolah</h2>

    <div class="row">
        <?php
        $query = mysqli_query($koneksi, "SELECT * FROM galeri ORDER BY id DESC");
        if (mysqli_num_rows($query) > 0):
            while ($row = mysqli_fetch_assoc($query)):
                $file_gambar = $row['gambar'] ?? '';
                $path_gambar = "uploads/" . $file_gambar;
        ?>
            <div class="col-md-4 col-sm-6 mb-4">
                <div class="card h-100 shadow-sm border-0 rounded-3 overflow-hidden">
                    <?php if (!empty($file_gambar) && file_exists($path_gambar)): ?>
                        <img src="<?= $path_gambar; ?>" class="card-img-top" alt="<?= htmlspecialchars($row['judul']); ?>" style="height: 220px; object-fit: cover;">
                    <?php else: ?>
                        <div class="bg-secondary text-white d-flex align-items-center justify-content-center" style="height: 220px;">
                            <small class="text-center p-2"><i class="bi bi-image me-1"></i> Gambar tidak ditemukan</small>
                        </div>
                    <?php endif; ?>
                    
                    <div class="card-body text-center bg-white">
                        <h6 class="card-title fw-bold text-dark mb-0"><?= htmlspecialchars($row['judul']); ?></h6>
                    </div>
                </div>
            </div>
        <?php 
            endwhile; 
        else: 
        ?>
            <div class="col-12">
                <div class="alert alert-info text-center py-4">Belum ada foto galeri yang diunggah.</div>
            </div>
        <?php endif; ?>
    </div>
</div>

<!-- FOOTER -->
<footer class="bg-dark text-white text-center py-3 mt-auto">
    <small>&copy; 2026 Website Resmi Sekolah. All Rights Reserved.</small>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>