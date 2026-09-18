<?php
// Tentukan nama tabel yang digunakan di database (jika di database bernama 'users', ubah $tabel_user = 'users';)
$tabel_user = 'user'; 

// Cek otomatis jika tabel dinamai 'users'
$cek_tabel = mysqli_query($koneksi, "SHOW TABLES LIKE 'user'");
if (mysqli_num_rows($cek_tabel) == 0) {
    $tabel_user = 'users';
}

// 1. PROSES TAMBAH ADMIN BARU
if (isset($_POST['tambah_admin'])) {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);

    // Cek apakah username sudah ada
    $cek = mysqli_query($koneksi, "SELECT * FROM $tabel_user WHERE username='$username'");
    if ($cek && mysqli_num_rows($cek) > 0) {
        echo "<script>alert('Username sudah digunakan! Silakan pilih username lain.');</script>";
    } else {
        // Jika password disimpan tanpa enkripsi:
        $sql = "INSERT INTO $tabel_user (username, password) VALUES ('$username', '$password')";
        
        // Jika password di database menggunakan MD5, aktifkan baris di bawah ini (hapus tanda //):
        // $password_md5 = md5($password);
        // $sql = "INSERT INTO $tabel_user (username, password) VALUES ('$username', '$password_md5')";

        if (mysqli_query($koneksi, $sql)) {
            echo "<script>alert('Admin Baru Berhasil Ditambahkan!'); window.location='admin.php?tab=user';</script>";
        } else {
            echo "<script>alert('Gagal menambah admin: " . mysqli_error($koneksi) . "');</script>";
        }
    }
}

// 2. PROSES HAPUS ADMIN
if (isset($_GET['hapus_admin'])) {
    $id_hapus = $_GET['hapus_admin'];
    
    // Ambil nama kolom primary key (id atau id_user)
    $cek_pk = mysqli_query($koneksi, "SHOW KEYS FROM $tabel_user WHERE Key_name = 'PRIMARY'");
    $row_pk = mysqli_fetch_assoc($cek_pk);
    $pk_field = $row_pk['Column_name'] ?? 'id';

    // Cek jumlah admin tersisa
    $total = mysqli_query($koneksi, "SELECT * FROM $tabel_user");
    if ($total && mysqli_num_rows($total) <= 1) {
        echo "<script>alert('Tidak dapat menghapus! Minimal harus tersisa 1 Admin.'); window.location='admin.php?tab=user';</script>";
    } else {
        mysqli_query($koneksi, "DELETE FROM $tabel_user WHERE $pk_field='$id_hapus'");
        echo "<script>alert('Akun Admin Berhasil Dihapus!'); window.location='admin.php?tab=user';</script>";
    }
}
?>

<div class="row">
    <!-- FORM TAMBAH ADMIN -->
    <div class="col-md-5 mb-4">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-primary text-white fw-bold">
                <i class="bi bi-person-plus-fill me-1"></i> Tambah Admin Baru
            </div>
            <div class="card-body">
                <form method="POST">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Username Baru</label>
                        <input type="text" name="username" class="form-control" placeholder="Masukkan username" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Password Baru</label>
                        <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
                    </div>
                    <button type="submit" name="tambah_admin" class="btn btn-primary w-100 fw-bold">
                        <i class="bi bi-save me-1"></i> Simpan Admin Baru
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- DAFTAR ADMIN -->
    <div class="col-md-7">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-dark text-white fw-bold">
                <i class="bi bi-people-fill me-1"></i> Daftar Akun Admin
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-hover mb-0 align-middle">
                        <thead class="table-light">
                            <tr>
                                <th width="10%">No</th>
                                <th>Username</th>
                                <th width="25%" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $query = mysqli_query($koneksi, "SELECT * FROM $tabel_user");
                            if ($query && mysqli_num_rows($query) > 0) :
                                while ($row = mysqli_fetch_assoc($query)) :
                                    // Deteksi nama kolom ID (id / id_user / id_admin)
                                    $id_val = $row['id'] ?? $row['id_user'] ?? $row['id_admin'] ?? reset($row);
                            ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><span class="fw-bold text-dark"><?= htmlspecialchars($row['username']); ?></span></td>
                                <td class="text-center">
                                    <a href="admin.php?tab=user&hapus_admin=<?= $id_val; ?>" 
                                       class="btn btn-danger btn-sm" 
                                       onclick="return confirm('Apakah Anda yakin ingin menghapus admin ini?')">
                                        <i class="bi bi-trash"></i> Hapus
                                    </a>
                                </td>
                            </tr>
                            <?php 
                                endwhile;
                            else :
                            ?>
                            <tr>
                                <td colspan="3" class="text-center py-3 text-muted">Belum ada data admin.</td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>