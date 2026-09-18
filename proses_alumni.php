<?php
// proses_alumni.php
include 'koneksi.php'; // Sesuaikan nama file koneksi Mas Joko

$aksi = $_GET['aksi'] ?? '';

// 1. PROSES TAMBAH ALUMNI
if ($aksi == 'tambah') {
    $nama        = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $pendidikan  = mysqli_real_escape_string($koneksi, $_POST['pendidikan']);
    $alamat      = mysqli_real_escape_string($koneksi, $_POST['alamat']);
    $kesan_pesan = mysqli_real_escape_string($koneksi, $_POST['kesan_pesan']);

    // Upload Foto
    $filename = $_FILES['foto']['name'];
    $tmp_name = $_FILES['foto']['tmp_name'];
    
    // Rename foto agar unik
    $new_filename = time() . '_' . $filename;
    $target_dir   = "uploads/" . $new_filename;

    if (move_uploaded_file($tmp_name, $target_dir)) {
        $insert = mysqli_query($koneksi, "INSERT INTO alumni (nama, pendidikan, alamat, kesan_pesan, foto) 
                                          VALUES ('$nama', '$pendidikan', '$alamat', '$kesan_pesan', '$new_filename')");
        if ($insert) {
            echo "<script>alert('Data alumni berhasil ditambahkan!'); window.location='admin_alumni.php';</script>";
        } else {
            echo "<script>alert('Gagal menyimpan ke database!'); window.location='admin_alumni.php';</script>";
        }
    } else {
        echo "<script>alert('Gagal mengunggah foto!'); window.location='admin_alumni.php';</script>";
    }
}

// 2. PROSES HAPUS ALUMNI
if ($aksi == 'hapus') {
    $id = intval($_GET['id']);

    // Ambil nama file foto untuk dihapus dari folder uploads/
    $get_foto = mysqli_query($koneksi, "SELECT foto FROM alumni WHERE id = '$id'");
    $data     = mysqli_fetch_assoc($get_foto);

    if ($data) {
        $foto_path = "uploads/" . $data['foto'];
        if (file_exists($foto_path)) {
            unlink($foto_path); // Hapus foto fisik dari server
        }

        mysqli_query($koneksi, "DELETE FROM alumni WHERE id = '$id'");
        echo "<script>alert('Data alumni berhasil dihapus!'); window.location='admin_alumni.php';</script>";
    }
}
?>