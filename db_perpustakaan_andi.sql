-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Feb 2024 pada 03.14
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perpustakaan_andi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_buku`
--

CREATE TABLE `t_buku` (
  `id_buku` int(11) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `id_kategori` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `penulis` varchar(255) DEFAULT NULL,
  `penerbit` varchar(255) DEFAULT NULL,
  `tahun_terbit` int(11) DEFAULT NULL,
  `stok` int(11) NOT NULL,
  `foto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_buku`
--

INSERT INTO `t_buku` (`id_buku`, `judul`, `id_kategori`, `deskripsi`, `penulis`, `penerbit`, `tahun_terbit`, `stok`, `foto`) VALUES
(1, 'Sword Art Online', 2, 'Sword Art Online (SAO) adalah kisah tentang Kirito yang terjebak dalam permainan VRMMORPG, harus mencapai lantai teratas untuk bebas. Jika mati dalam permainan, pemain mati di kehidupan nyata. Kirito memimpin upaya keluar dari permainan. Cerita berfokus pada petualangan, aksi, dan romansa mereka.', 'Reki Kawahara', 'ASCII Media Works', 2009, 9, 'assets/img/Cover-Sword_Art_Online_02_INA.jpg'),
(2, 'Bahasa Inggris', 3, 'Buku bahasa Inggris melibatkan beragam genre dan topik, termasuk fiksi dan non-fiksi. Fiksi menawarkan cerita imajiner dari pengarang, sementara non-fiksi mencakup berbagai tema seperti sejarah, ilmu pengetahuan, biografi, dan panduan praktis. Dengan keragaman ini, buku dalam bahasa Inggris memenuhi berbagai minat pembaca.', 'Alexander Maya', 'Liana miya', 2011, 10, 'assets/img/sampul 2.png'),
(3, 'Bisnis Online', 4, 'Buku yang mengajarkan dan memberikan tips cara berbisnis online dari kecil sampai ke besar ', 'Zacky', 'Chris Renald', 2015, 10, 'assets/img/sampul bisnis.jpg'),
(4, 'Jujutsu Kaisen', 1, ' Jujutsu Kaisen mengikuti kisah Yuji Itadori, seorang siswa sekolah menengah yang terlibat dalam dunia sihir dan makhluk terkutuk setelah temannya tidak sengaja melepaskan kutukan kuat. Setelah kematian temannya, Yuji bergabung dengan sekolah sihir dan bertemu dengan Satoru Gojo. Bersama dengan teman-temannya, mereka berjuang melawan makhluk terkutuk dan mengungkap rahasia yang lebih dalam tentang dunia mereka. Seri ini dikenal karena aksinya yang intens, pertarungan sihir yang dinamis, dan perkembangan karakter yang kuat.', 'Gege Akutami', 'Shueisha', 2017, 10, 'assets/img/jjk.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_kategoribuku`
--

CREATE TABLE `t_kategoribuku` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_kategoribuku`
--

INSERT INTO `t_kategoribuku` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Komik'),
(2, 'Novel'),
(3, 'Pendidikan'),
(4, 'Bisnis');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_peminjaman`
--

CREATE TABLE `t_peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_buku` int(11) DEFAULT NULL,
  `tgl_peminjaman` datetime DEFAULT NULL,
  `tgl_pengembalian` datetime DEFAULT NULL,
  `batas_diajukan` datetime DEFAULT NULL,
  `status_peminjaman` enum('dipinjam','dikembalikan','diajukan','expired') DEFAULT NULL,
  `kode_peminjaman` varchar(10) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_peminjaman`
--

INSERT INTO `t_peminjaman` (`id_peminjaman`, `id_user`, `id_buku`, `tgl_peminjaman`, `tgl_pengembalian`, `batas_diajukan`, `status_peminjaman`, `kode_peminjaman`, `jumlah`) VALUES
(15, 4, 1, '2024-02-21 02:01:34', '2024-02-28 02:01:34', NULL, 'dikembalikan', 'PM001', 0),
(17, 4, 1, '2024-02-21 02:04:23', '2024-02-28 02:04:23', NULL, 'dikembalikan', 'PM002', 0),
(18, 4, 1, '2024-02-21 08:08:11', '2024-02-28 08:08:11', NULL, 'dipinjam', 'PM003', 1);

--
-- Trigger `t_peminjaman`
--
DELIMITER $$
CREATE TRIGGER `kembali` AFTER UPDATE ON `t_peminjaman` FOR EACH ROW BEGIN 
UPDATE t_buku set stok = stok + old.jumlah
WHERE id_buku = old.id_buku;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `pinjam` AFTER UPDATE ON `t_peminjaman` FOR EACH ROW BEGIN 
UPDATE t_buku set stok = stok - new.jumlah
WHERE id_buku = new.id_buku;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_ulasanbuku`
--

CREATE TABLE `t_ulasanbuku` (
  `id_ulasan` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_buku` int(11) DEFAULT NULL,
  `ulasan` text DEFAULT NULL,
  `rating` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_user`
--

CREATE TABLE `t_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telp` varchar(14) DEFAULT NULL,
  `nama_lengkap` varchar(150) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `level` enum('admin','petugas','anggota','') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_user`
--

INSERT INTO `t_user` (`id_user`, `username`, `password`, `email`, `telp`, `nama_lengkap`, `alamat`, `level`) VALUES
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin09@gmail.com', '0895711240801', 'administrator', 'Bandung Barat', 'admin'),
(3, 'petugas', 'afb91ef692fd08c445e8cb1bab2ccf9c', 'Fikri09@gmail.com', '0895711240801', 'Fikri', 'Bandung', 'petugas'),
(4, 'Lycoris', 'fd371b1fcda3381e1efe179a4d80911b', 'Andirostiandi08@gmail.com', '0895711240801', 'Andi Rostiandi', 'cililin', 'anggota'),
(6, 'petugas2', 'ac5604a8b8504d4ff5b842480df02e91', 'petugas@gmail.com', '089887587578', 'petugas', 'Bandung', 'petugas'),
(7, 'Lyco', 'ab4d5d25499dd34b626ef4b14824fc5c', 'LycorisAvolire@gmail.com', '08978868758766', 'Petugas', 'Bandung', 'petugas'),
(8, 'petugas3', '6f7dc121bccfd778744109cac9593474', 'Ramdanb@gmail.com', '09097097', 'Ramdan', 'laksana', 'petugas');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `t_buku`
--
ALTER TABLE `t_buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD KEY `kategoriID` (`id_kategori`);

--
-- Indeks untuk tabel `t_kategoribuku`
--
ALTER TABLE `t_kategoribuku`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `t_peminjaman`
--
ALTER TABLE `t_peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `userID` (`id_user`),
  ADD KEY `bukuID` (`id_buku`);

--
-- Indeks untuk tabel `t_ulasanbuku`
--
ALTER TABLE `t_ulasanbuku`
  ADD PRIMARY KEY (`id_ulasan`),
  ADD KEY `userID` (`id_user`),
  ADD KEY `bukuID` (`id_buku`);

--
-- Indeks untuk tabel `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `t_buku`
--
ALTER TABLE `t_buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `t_kategoribuku`
--
ALTER TABLE `t_kategoribuku`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `t_peminjaman`
--
ALTER TABLE `t_peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `t_ulasanbuku`
--
ALTER TABLE `t_ulasanbuku`
  MODIFY `id_ulasan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `t_user`
--
ALTER TABLE `t_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `t_buku`
--
ALTER TABLE `t_buku`
  ADD CONSTRAINT `t_buku_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `t_kategoribuku` (`id_kategori`);

--
-- Ketidakleluasaan untuk tabel `t_peminjaman`
--
ALTER TABLE `t_peminjaman`
  ADD CONSTRAINT `t_peminjaman_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `t_user` (`id_user`),
  ADD CONSTRAINT `t_peminjaman_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `t_buku` (`id_buku`);

--
-- Ketidakleluasaan untuk tabel `t_ulasanbuku`
--
ALTER TABLE `t_ulasanbuku`
  ADD CONSTRAINT `t_ulasanbuku_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `t_user` (`id_user`),
  ADD CONSTRAINT `t_ulasanbuku_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `t_buku` (`id_buku`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
