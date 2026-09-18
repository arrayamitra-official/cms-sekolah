-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Sep 2026 pada 16.06
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms_sekolah`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alumni`
--

CREATE TABLE `alumni` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `pendidikan` varchar(100) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `kesan_pesan` text NOT NULL,
  `foto` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `alumni`
--

INSERT INTO `alumni` (`id`, `nama`, `pendidikan`, `alamat`, `kesan_pesan`, `foto`, `created_at`) VALUES
(1, 'riswanda', 's1 informatika', 'jenitri', 'hjk\r\nk\r\nl[l;];\r\n\'', '1788856946_Linux-Logo.png', '2026-09-08 08:42:26'),
(2, 'rizal', 'sma darusalam', 'cemoro kandang', 'liburan yang sangat berguna', '1788857787_poto.jpg', '2026-09-08 08:56:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `kategori` enum('utama','biasa') DEFAULT 'biasa',
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id`, `judul`, `slug`, `isi`, `gambar`, `kategori`, `tanggal`) VALUES
(1, 'Situasi Terkini Bandara Soetta yang Masih Ditutup Usai Erupsi Anak Krakatau  Baca artikel detiknews, \"Situasi Terkini Bandara Soetta yang Masih Ditutup Usai Erupsi Anak Krakatau\" selengkapnya https://news.detik.com/berita/d-8651214/situasi-terkini-bandara', '', 'Jakarta - Bandara Soekarno-Hatta (Soetta), Tangerang masih ditutup karena terdampak abu Gunung Anak Krakatau hingga pukul 23.59 WIB. Begini situasi terkini Bandara Soetta malam ini.\r\nPantauan detikcom di terminal 3 Bandara Soetta, pukul 19.00 WIB, Minggu (6/9/2026), sejumlah penumpang masih terlihat bertahan di Bandara meski adanya penutupan operasional. Mereka terlihat duduk menunggu di ruang tunggu bandara.\r\n\r\nBeberapa dari mereka terlihat masih memegang koper hingga tas yang dibawanya. Sementara, ada juga penumpang lain yang terlihat meninggalkan area bandara.\r\n\r\n\r\n\r\nBaca artikel detiknews, \"Situasi Terkini Bandara Soetta yang Masih Ditutup Usai Erupsi Anak Krakatau\" selengkapnya https://news.detik.com/berita/d-8651214/situasi-terkini-bandara-soetta-yang-masih-ditutup-usai-erupsi-anak-krakatau.\r\n\r\nDownload Apps Detikcom Sekarang https://apps.detik.com/detik/', '1788705702_Logo SMK.jpeg', 'biasa', '2026-09-06 14:41:42'),
(2, 'bbbbbbbbbbbbbbbbbbbbbbbbbb', '', 'Jakarta - Bandara Soekarno-Hatta (Soetta), Tangerang masih ditutup karena terdampak abu Gunung Anak Krakatau hingga pukul 23.59 WIB. Begini situasi terkini Bandara Soetta malam ini.\r\nPantauan detikcom di terminal 3 Bandara Soetta, pukul 19.00 WIB, Minggu (6/9/2026), sejumlah penumpang masih terlihat bertahan di Bandara meski adanya penutupan operasional. Mereka terlihat duduk menunggu di ruang tunggu bandara.\r\n\r\nBeberapa dari mereka terlihat masih memegang koper hingga tas yang dibawanya. Sementara, ada juga penumpang lain yang terlihat meninggalkan area bandara.\r\n\r\n\r\n\r\nBaca artikel detiknews, \"Situasi Terkini Bandara Soetta yang Masih Ditutup Usai Erupsi Anak Krakatau\" selengkapnya https://news.detik.com/berita/d-8651214/situasi-terkini-bandara-soetta-yang-masih-ditutup-usai-erupsi-anak-krakatau.\r\n\r\nDownload Apps Detikcom Sekarang https://apps.detik.com/detik/', '1788705760_Logo YPIM.jpeg', 'biasa', '2026-09-06 14:42:40'),
(3, 'llllllllljjjjjjjjjjjjjjjjjjjjj', '', 'Jakarta - Bandara Soekarno-Hatta (Soetta), Tangerang masih ditutup karena terdampak abu Gunung Anak Krakatau hingga pukul 23.59 WIB. Begini situasi terkini Bandara Soetta malam ini.\r\nPantauan detikcom di terminal 3 Bandara Soetta, pukul 19.00 WIB, Minggu (6/9/2026), sejumlah penumpang masih terlihat bertahan di Bandara meski adanya penutupan operasional. Mereka terlihat duduk menunggu di ruang tunggu bandara.\r\n\r\nBeberapa dari mereka terlihat masih memegang koper hingga tas yang dibawanya. Sementara, ada juga penumpang lain yang terlihat meninggalkan area bandara.\r\n\r\n\r\n\r\nBaca artikel detiknews, \"Situasi Terkini Bandara Soetta yang Masih Ditutup Usai Erupsi Anak Krakatau\" selengkapnya https://news.detik.com/berita/d-8651214/situasi-terkini-bandara-soetta-yang-masih-ditutup-usai-erupsi-anak-krakatau.\r\n\r\nDownload Apps Detikcom Sekarang https://apps.detik.com/detik/', '1788705813_Logo_SMK-removebg-preview.png', 'biasa', '2026-09-06 14:43:33'),
(4, 'klnflskaldlahsdfhp', '', 'Jakarta - Bandara Soekarno-Hatta (Soetta), Tangerang masih ditutup karena terdampak abu Gunung Anak Krakatau hingga pukul 23.59 WIB. Begini situasi terkini Bandara Soetta malam ini.\r\nPantauan detikcom di terminal 3 Bandara Soetta, pukul 19.00 WIB, Minggu (6/9/2026), sejumlah penumpang masih terlihat bertahan di Bandara meski adanya penutupan operasional. Mereka terlihat duduk menunggu di ruang tunggu bandara.\r\n\r\nBeberapa dari mereka terlihat masih memegang koper hingga tas yang dibawanya. Sementara, ada juga penumpang lain yang terlihat meninggalkan area bandara.\r\n\r\n\r\n\r\nBaca artikel detiknews, \"Situasi Terkini Bandara Soetta yang Masih Ditutup Usai Erupsi Anak Krakatau\" selengkapnya https://news.detik.com/berita/d-8651214/situasi-terkini-bandara-soetta-yang-masih-ditutup-usai-erupsi-anak-krakatau.\r\n\r\nDownload Apps Detikcom Sekarang https://apps.detik.com/detik/', '1788705859_Logo_YPIM-removebg-preview.png', 'utama', '2026-09-06 14:44:19'),
(5, 'Demo AMPB Disebut dapat Respon Khusus DPR RI, Begini Kata Pakar Hukum', '', 'Gerakan Aliansi Masyarakat Pati Bersatu (AMPB) kembali menjadi sorotan setelah merencanakan aksi demonstrasi di depan Gedung DPR RI, Jakarta Pusat, pada Kamis, 27 Agustus 2026.\r\n\r\nMassa AMPB membawa sejumlah tuntutan, di antaranya percepatan pengesahan Rancangan Undang-Undang (RUU) Perampasan Aset serta penerapan hukuman mati bagi koruptor.\r\n\r\n\r\nTim perintis AMPB dari Pati dilaporkan telah tiba di Jakarta sejak 21 Agustus 2026. Mereka disebut mendirikan posko konsolidasi sebagai persiapan aksi dan menggalang dukungan masyarakat.\r\n\r\nKoordinator AMPB, Supriyono alias Botok, mengajak masyarakat dari berbagai daerah untuk ikut menyuarakan tuntutan dalam aksi tersebut.\r\n\r\n\r\n\r\nArtikel ini telah tayang di Tribunnews.com dengan judul Mengenal AMPB, Gerakan Warga Pati dari Aksi Mengawal Kasus Sudewo hingga Aspirasi Tingkat Nasional, https://www.tribunnews.com/regional/7872641/mengenal-ampb-gerakan-warga-pati-dari-aksi-mengawal-kasus-sudewo-hingga-aspirasi-tingkat-nasional.\r\n\r\nEditor: Glery Lazuardi', '1788854031_poto.jpg', 'biasa', '2026-09-08 07:53:52'),
(6, 'Linux System Administrator', '', 'Training Linux System Administrator adalah program pelatihan yang dirancang untuk membekali peserta dengan pengetahuan dan keterampilan yang diperlukan untuk mengelola dan memelihara sistem operasi Linux di lingkungan server. Dalam era digital saat ini, Linux telah menjadi salah satu sistem operasi yang paling dominan, terutama dalam pengelolaan server, layanan cloud, dan pengembangan perangkat lunak. Oleh karena itu, pelatihan ini sangat relevan bagi mereka yang ingin mengejar karir di bidang teknologi informasi.\r\n\r\nUbuntu adalah salah satu distro linux yang sangat terkenal di dunia yang banyak digunakan oleh perusahaan-perusahaan nasional dan internasional. Pada training linux system administrator, peserta akan belajar mengenai instalasi, konfigurasi, manajemen serta troubleshooting pada system Ubuntu Linux server.\r\n\r\nTraining yang akan dilakukan selama 4 hari ini akan dijalani setiap peserta Bersama dengan trainer yang telah professional di bidangnya. Selain itu peserta juga akan mendapatkan sharing pengalaman mengenai penerapan atau implementasi kasus dan kebutuhan di lapangan.\r\n\r\nNOTE: Jika masih pemula di bidang linux, disarankan untuk mempelajari materi linux fundamentals terlebih dahulu melalui link berikut, Gratis!\r\n>>> https://lms.idn.id/courses/linux-dasar/', '1788854545_Linux-Logo.png', 'biasa', '2026-09-08 08:02:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeri`
--

CREATE TABLE `galeri` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) DEFAULT NULL,
  `gambar` varchar(255) NOT NULL,
  `file_gambar` varchar(255) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `galeri`
--

INSERT INTO `galeri` (`id`, `judul`, `gambar`, `file_gambar`, `tanggal`) VALUES
(1, 'upacara', '1788873204_WhatsApp Image 2026-06-30 at 11.38.58.jpeg', '', '2026-09-08 13:13:24'),
(2, 'kura', '1788873226_WhatsApp Image 2026-07-14 at 18.48.31.jpeg', '', '2026-09-08 13:13:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `halaman`
--

CREATE TABLE `halaman` (
  `id` int(11) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `konten` text NOT NULL,
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `halaman`
--

INSERT INTO `halaman` (`id`, `kategori`, `judul`, `konten`, `gambar`) VALUES
(1, 'struktur', 'sdku', 'fafjaojo[a[k[<p></p>', '1788872869_851.jpeg'),
(2, 'kontak', 'hubungi kami di', '<p>kdapovjOAJDOja[skc]pakskA]SP</p>', '1788874077_166.jpeg'),
(3, 'sarana', 'bbbbbbb', 'bbbbb', '1788937168_WhatsApp Image 2026-08-13 at 18.12.43.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `profil_sekolah`
--

CREATE TABLE `profil_sekolah` (
  `id` int(11) NOT NULL,
  `nama_sekolah` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `profil_sekolah`
--

INSERT INTO `profil_sekolah` (`id`, `nama_sekolah`, `alamat`, `logo`) VALUES
(1, 'SDN Sekar mayang', 'Jl. Raya Pakis No. 123, Malang', '1788833766_Logo SMK.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'arto', 'sekar'),
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(3, 'admin', 'admin123'),
(4, 'admin', 'marwoto');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `level` varchar(20) NOT NULL DEFAULT 'admin',
  `role` varchar(20) NOT NULL DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `nama_lengkap`, `level`, `role`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500', 'Administrator Sekolah', 'admin', 'admin'),
(5, 'MARDIYA', 'df2dc2fcb331a05ff513685f09461e74', '', 'admin', 'admin'),
(6, 'MARDIYAN', 'bc40ada293eb747e60981302b8a56303', '', 'admin', 'admin'),
(8, 'ivone', 'c0cce3961a15de69c13dc3031491d7f5', '', 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `alumni`
--
ALTER TABLE `alumni`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `halaman`
--
ALTER TABLE `halaman`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kategori` (`kategori`);

--
-- Indeks untuk tabel `profil_sekolah`
--
ALTER TABLE `profil_sekolah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `alumni`
--
ALTER TABLE `alumni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `halaman`
--
ALTER TABLE `halaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `profil_sekolah`
--
ALTER TABLE `profil_sekolah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
