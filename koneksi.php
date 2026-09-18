<?php
$host = "154.19.37.34";
$user = "root";
$pass = "Nu15M@l4ng";
$db   = "cms_sekolah";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi Database Gagal: " . mysqli_connect_error());
}
?>