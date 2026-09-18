<?php
// koneksi.php
include 'koneksi.php';

// Fetch Data Profil Sekolah
$query_sekolah = mysqli_query($koneksi, "SELECT * FROM profil_sekolah ORDER BY id ASC LIMIT 1");
$data_sekolah  = mysqli_fetch_assoc($query_sekolah);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= $data_sekolah['nama_sekolah'] ?? 'Website Resmi Sekolah'; ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Icon Bootstrap untuk logo WA -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    
    <style>
        .brand-container {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
        }
        .brand-logo {
            height: 45px;
            width: auto;
            object-fit: contain;
        }
        .brand-text {
            display: flex;
            flex-direction: column;
        }
        .nama-sekolah {
            font-size: 18px;
            font-weight: bold;
            color: #ffffff;
            margin: 0;
            line-height: 1.2;
        }
        .alamat-sekolah {
            font-size: 11px;
            color: #e0e0e0;
            margin: 0;
        }

        /* --- STYLES TOMBOL WA MENGAMBANG --- */
        .wa-floating {
            position: fixed;
            bottom: 25px;
            right: 25px;
            background-color: #25d366;
            color: white;
            border-radius: 50px;
            text-align: center;
            font-size: 14px;
            font-weight: bold;
            padding: 10px 18px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.3);
            z-index: 9999;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
        }

        .wa-floating:hover {
            background-color: #128c7e;
            color: white;
            transform: scale(1.05);
        }

        .wa-floating i {
            font-size: 22px;
        }
    </style>
</head>
<body>

<!-- Navbar Menu Dinamis -->
<nav class="navbar navbar-expand-lg navbar-dark bg-success sticky-top">
  <div class="container">
    <a class="brand-container" href="index.php">
        <?php if (!empty($data_sekolah['logo'])): ?>
            <img src="uploads/<?= $data_sekolah['logo']; ?>" alt="Logo Sekolah" class="brand-logo">
        <?php endif; ?>
        <div class="brand-text">
            <span class="nama-sekolah"><?= $data_sekolah['nama_sekolah'] ?? 'SMK NEGERI'; ?></span>
            <span class="alamat-sekolah"><?= $data_sekolah['alamat'] ?? ''; ?></span>
        </div>
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link active" href="index.php">Beranda</a></li>
        <li class="nav-item"><a class="nav-link" href="halaman.php?hal=struktur">Struktur Organisasi</a></li>
        <li class="nav-item"><a class="nav-link" href="halaman.php?hal=sarana">Sarana & Prasarana</a></li>
        <li class="nav-item"><a class="nav-link" href="halaman.php?hal=kegiatan">Kegiatan</a></li>
        <li class="nav-item"><a class="nav-link" href="galeri.php">Galeri</a></li>
        <li class="nav-item"><a class="nav-link" href="halaman.php?hal=kontak">Kontak</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- TOMBOL WA MENGAMBANG -->
<a href="https://wa.me/6282230991951?text=Halo%20Admin%20Sekolah,%20saya%20ingin%20bertanya%20informasi" class="wa-floating" target="_blank">
    <i class="bi bi-whatsapp"></i>
    <span>Hubungi Kami</span>
</a>