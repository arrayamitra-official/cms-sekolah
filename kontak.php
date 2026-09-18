<?php
include "koneksi.php";

// Ambil data profil sekolah untuk header
$q_profil = mysqli_query($koneksi, "SELECT * FROM profil_sekolah WHERE id=1");
$profil   = mysqli_fetch_assoc($q_profil);

$nama_sekolah = $profil['nama_sekolah'] ?? 'SDN SUMBERSUKO';
$alamat       = $profil['alamat'] ?? 'Jl. Raya Pakis No. 123, Malang';
$logo         = !empty($profil['logo']) && file_exists('uploads/' . $profil['logo']) ? 'uploads/' . $profil['logo'] : '';

// Ambil data konten kontak dari tabel halaman
$query = mysqli_query($koneksi, "SELECT * FROM halaman WHERE kategori='kontak'");
$data  = mysqli_fetch_assoc($query);

$judul  = !empty($data['judul']) ? $data['judul'] : 'Kontak & Informasi Sekolah';
$gambar = !empty($data['gambar']) ? $data['gambar'] : '';
$konten = !empty($data['konten']) ? $data['konten'] : '<p class="text-muted">Informasi kontak belum diisi di database.</p>';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($judul); ?> - <?= htmlspecialchars($nama_sekolah); ?></title>
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
                <li class="nav-item"><a class="nav-link" href="galeri.php">Galeri</a></li>
                <li class="nav-item"><a class="nav-link active fw-bold" href="kontak.php">Kontak</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- KONTEN UTAMA KONTAK -->
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card border-0 shadow-sm rounded-3 p-4 bg-white">
                <h3 class="text-success fw-bold border-bottom pb-2 mb-4">
                    <i class="bi bi-envelope-paper me-2"></i><?= htmlspecialchars($judul); ?>
                </h3>

                <div class="row align-items-start">
                    <?php if (!empty($gambar) && file_exists('uploads/' . $gambar)): ?>
                        <div class="col-md-5 mb-4 mb-md-0">
                            <div class="border rounded p-2 text-center bg-light">
                                <img src="uploads/<?= $gambar; ?>" class="img-fluid rounded shadow-sm" alt="Gambar Kontak" style="max-height: 350px; object-fit: cover;">
                            </div>
                        </div>
                    <?php endif; ?>

                    <div class="<?= (!empty($gambar) && file_exists('uploads/' . $gambar)) ? 'col-md-7' : 'col-md-12'; ?>">
                        <div class="content-area lh-lg fs-6">
                            <?= $konten; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- FOOTER -->
<footer class="bg-dark text-white text-center py-3 mt-auto">
    <small>&copy; 2026 Website Resmi Sekolah. All Rights Reserved.</small>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>