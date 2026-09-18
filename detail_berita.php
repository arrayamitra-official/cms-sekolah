<?php
include 'header.php';

// Ambil ID berita dari URL
$id = $_GET['id'] ?? 0;

// Query mengambil berita berdasarkan ID
$query = mysqli_query($koneksi, "SELECT * FROM berita WHERE id='$id'");
$berita = mysqli_fetch_assoc($query);

// Jika berita tidak ditemukan
if (!$berita) {
    header("Location: index.php");
    exit;
}
?>



<!-- Container Detail Berita -->
<div class="container my-5" style="min-height: 450px;">
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <!-- Judul Berita -->
            <h1 class="fw-bold mb-3"><?= $berita['judul']; ?></h1>
            
            <!-- Tanggal & Kategori -->
            <div class="text-muted small mb-4 pb-2 border-bottom">
                <span>Dipublikasikan pada: <strong><?= date('d F Y - H:i', strtotime($berita['tanggal'])); ?> WIB</strong></span>
                <?php if ($berita['kategori'] == 'utama'): ?>
                    <span class="badge bg-danger ms-2">Berita Utama</span>
                <?php endif; ?>
            </div>

            <!-- Gambar Berita Utuh -->
            <?php if (!empty($berita['gambar'])): ?>
                <div class="text-center mb-4">
                   <img src="uploads/<?= $berita['gambar']; ?>" class="img-fluid rounded shadow-sm p-2" style="max-height: 400px; width: 100%; object-fit: contain;" alt="<?= $berita['judul']; ?>">
                </div>
            <?php endif; ?>

            <!-- Isi Berita Selengkapnya -->
            <div class="lh-lg fs-5 text-justify mb-5" style="white-space: pre-line;">
                <?= $berita['isi']; ?>
            </div>

            <!-- Tombol Kembali -->
            <div class="border-top pt-3">
                <a href="index.php" class="btn btn-outline-success">&laquo; Kembali ke Beranda</a>
            </div>
        </div>
    </div>
</div>

<footer class="bg-dark text-white text-center py-3 mt-5">
    <small>&copy; <?= date('Y'); ?> Website Resmi Sekolah. All Rights Reserved.</small>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>