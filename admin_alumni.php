<?php
// admin_alumni.php
include 'koneksi.php'; // Sesuaikan nama file koneksi Mas Joko

// Ambil data alumni dari database
$query = mysqli_query($koneksi, "SELECT * FROM alumni ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola Kesan & Pesan Alumni</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="text-success fw-bold">Kelola Kesan & Pesan Alumni</h3>
        
    </div>

    <!-- FORM TAMBAH ALUMNI -->
    <div class="card border-0 shadow-sm mb-5">
        <div class="card-header bg-success text-white fw-bold">
            Tambah Data Alumni
        </div>
        <div class="card-body">
            <form action="proses_alumni.php?aksi=tambah" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label font-weight-bold">Nama Lengkap & Gelar</label>
                        <input type="text" name="nama" class="form-control" placeholder="Contoh: Ahmad Fauzi, S.Kom." required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label font-weight-bold">Pendidikan Terakhir / Pekerjaan</label>
                        <input type="text" name="pendidikan" class="form-control" placeholder="Contoh: S1 Teknik Informatika" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label font-weight-bold">Alamat Ringkas</label>
                        <input type="text" name="alamat" class="form-control" placeholder="Contoh: Pakis, Malang" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label font-weight-bold">Foto Alumni</label>
                        <input type="file" name="foto" class="form-control" accept="image/*" required>
                    </div>
                    <div class="col-12 mb-3">
                        <label class="form-label font-weight-bold">Kesan & Pesan (1 Paragraf Ringkas)</label>
                        <textarea name="kesan_pesan" class="form-control" rows="3" placeholder="Tuliskan kesan dan pesan alumni di sini..." required></textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Simpan Data Alumni</button>
            </form>
        </div>
    </div>

    <!-- TABEL DAFTAR ALUMNI -->
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-dark text-white fw-bold">
            Daftar Alumni
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0 align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Foto</th>
                            <th>Nama</th>
                            <th>Pendidikan</th>
                            <th>Alamat</th>
                            <th>Kesan & Pesan</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        if(mysqli_num_rows($query) > 0):
                            while($row = mysqli_fetch_assoc($query)): 
                        ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td>
                                <img src="uploads/<?= $row['foto']; ?>" width="50" height="50" class="rounded-circle object-fit-cover" alt="Foto">
                            </td>
                            <td class="fw-bold"><?= $row['nama']; ?></td>
                            <td><?= $row['pendidikan']; ?></td>
                            <td><?= $row['alamat']; ?></td>
                            <td style="max-width: 300px;"><?= $row['kesan_pesan']; ?></td>
                            <td class="text-center">
                                <a href="proses_alumni.php?aksi=hapus&id=<?= $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data alumni ini?')">Hapus</a>
                            </td>
                        </tr>
                        <?php 
                            endwhile;
                        else:
                        ?>
                        <tr>
                            <td colspan="7" class="text-center py-3 text-muted">Belum ada data alumni.</td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

</body>
</html>