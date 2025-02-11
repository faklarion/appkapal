-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 11 Feb 2025 pada 13.59
-- Versi server: 8.0.30
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `appkapal`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_berlayar`
--

CREATE TABLE `tbl_berlayar` (
  `id_berlayar` int NOT NULL,
  `id_kapal` int NOT NULL,
  `tanggal_berlayar` date NOT NULL,
  `tanggal_sampai` date NOT NULL,
  `pelabuhan_asal` varchar(100) NOT NULL,
  `pelabuhan_tujuan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_berlayar`
--

INSERT INTO `tbl_berlayar` (`id_berlayar`, `id_kapal`, `tanggal_berlayar`, `tanggal_sampai`, `pelabuhan_asal`, `pelabuhan_tujuan`) VALUES
(1, 3, '2025-02-11', '2025-02-14', 'Pelabuhan Rusdi', 'Tanjung Priok'),
(2, 4, '2025-02-11', '2025-02-18', 'Pelabuhan Tanjung Priok', 'Merak'),
(3, 1, '2025-02-11', '2025-02-13', 'Pelabuhan Tanjung Priok', 'Merak'),
(4, 5, '2025-02-11', '2025-02-14', 'Pelabuhan Merak', 'Tanjung Priok'),
(5, 4, '2025-02-11', '2025-02-13', 'Pelabuhan Rusdi', 'Tanjung Priok');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_hak_akses`
--

CREATE TABLE `tbl_hak_akses` (
  `id` int NOT NULL,
  `id_user_level` int NOT NULL,
  `id_menu` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_hak_akses`
--

INSERT INTO `tbl_hak_akses` (`id`, `id_user_level`, `id_menu`) VALUES
(30, 1, 2),
(31, 1, 10),
(32, 1, 11),
(33, 1, 12),
(34, 1, 13);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kapal`
--

CREATE TABLE `tbl_kapal` (
  `id_kapal` int NOT NULL,
  `nama_kapal` varchar(100) NOT NULL,
  `tanda_panggilan` varchar(50) NOT NULL,
  `panjang` double NOT NULL,
  `lebar` double NOT NULL,
  `dimensi` double NOT NULL,
  `tonase_kotor` int NOT NULL,
  `tonase_bersih` int NOT NULL,
  `tahun` int NOT NULL,
  `nomer_imo` varchar(20) NOT NULL,
  `penggerak_utama` varchar(50) NOT NULL,
  `merek_tk` varchar(50) NOT NULL,
  `bahan_utama` varchar(50) NOT NULL,
  `jumlah_geladak` int NOT NULL,
  `jumlah_baling` int NOT NULL,
  `status` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_kapal`
--

INSERT INTO `tbl_kapal` (`id_kapal`, `nama_kapal`, `tanda_panggilan`, `panjang`, `lebar`, `dimensi`, `tonase_kotor`, `tonase_bersih`, `tahun`, `nomer_imo`, `penggerak_utama`, `merek_tk`, `bahan_utama`, `jumlah_geladak`, `jumlah_baling`, `status`) VALUES
(1, 'Rimau 3019', '-', 88.78, 24.38, 6.1, 3346, 1004, 2013, '-', '-', '-', 'Baja', 1, 0, 1),
(2, 'Rimau 2012', '-', 88.78, 24.38, 6.1, 3346, 1004, 2013, '-', '-', '-', 'Baja', 1, 0, 1),
(3, 'Ship 2119', '-', 88.78, 24.38, 6.1, 3346, 1004, 2013, '-', '-', '-', 'Baja', 1, 0, 1),
(4, 'Kapal 3018', '-', 88.78, 24.38, 6.1, 3346, 1004, 2013, '-', '-', '-', 'Baja', 1, 0, 0),
(5, 'Kapal 7070', '-', 88.78, 24.38, 6.1, 3346, 1004, 2013, '-', '-', '-', 'Baja', 1, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_maintenance`
--

CREATE TABLE `tbl_maintenance` (
  `id_maintenance` int NOT NULL,
  `id_kapal` int NOT NULL,
  `tanggal_maintenance` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `bagian_maintenance` text NOT NULL,
  `biaya` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_maintenance`
--

INSERT INTO `tbl_maintenance` (`id_maintenance`, `id_kapal`, `tanggal_maintenance`, `tanggal_selesai`, `bagian_maintenance`, `biaya`) VALUES
(1, 1, '2025-02-11', '2025-02-18', 'Cat', 2000000),
(2, 2, '2025-02-11', '2025-02-18', 'Mesin', 30000000),
(3, 3, '2025-02-11', '2025-02-19', 'Kaca', 10000000),
(4, 4, '2025-02-11', '2025-02-19', 'Lantai', 10000000),
(5, 5, '2025-02-11', '2025-02-19', 'Cat', 2000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `id_menu` int NOT NULL,
  `title` varchar(50) NOT NULL,
  `url` varchar(30) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `is_main_menu` int NOT NULL,
  `is_aktif` enum('y','n') NOT NULL COMMENT 'y=yes,n=no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_menu`
--

INSERT INTO `tbl_menu` (`id_menu`, `title`, `url`, `icon`, `is_main_menu`, `is_aktif`) VALUES
(1, 'KELOLA MENU', 'kelolamenu', 'fa fa-server', 0, 'y'),
(2, 'KELOLA PENGGUNA', 'user', 'fa fa-user-o', 0, 'y'),
(3, 'level PENGGUNA', 'userlevel', 'fa fa-users', 0, 'y'),
(9, 'Contoh Form', 'welcome/form', 'fa fa-id-card', 0, 'y'),
(10, 'data kapal', 'tbl_kapal', 'fa fa-ship', 0, 'y'),
(11, 'data sertifikat', 'tbl_sertifikat', 'fa fa-address-card-o', 0, 'y'),
(12, 'data kapal berlayar', 'tbl_berlayar', 'fa fa-anchor', 0, 'y'),
(13, 'data maintenance kapal', 'tbl_maintenance', 'fa fa-wrench', 0, 'y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pembaruan`
--

CREATE TABLE `tbl_pembaruan` (
  `id_pembaruan` int NOT NULL,
  `id_sertifikat` int NOT NULL,
  `tempat_pembaruan` varchar(50) NOT NULL,
  `tanda_pembaruan` varchar(50) NOT NULL,
  `tanggal_pembaruan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_pembaruan`
--

INSERT INTO `tbl_pembaruan` (`id_pembaruan`, `id_sertifikat`, `tempat_pembaruan`, `tanda_pembaruan`, `tanggal_pembaruan`) VALUES
(2, 3, 'Banjarmasin', '-', '2025-01-24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_sertifikat`
--

CREATE TABLE `tbl_sertifikat` (
  `id_sertifikat` int NOT NULL,
  `id_kapal` int NOT NULL,
  `tempat_pendaftaran` varchar(100) NOT NULL,
  `tanda_pendaftaran` varchar(50) NOT NULL,
  `tanggal_terbit` date NOT NULL,
  `pembaruan_terakhir` date NOT NULL,
  `tanggal_expired` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_sertifikat`
--

INSERT INTO `tbl_sertifikat` (`id_sertifikat`, `id_kapal`, `tempat_pendaftaran`, `tanda_pendaftaran`, `tanggal_terbit`, `pembaruan_terakhir`, `tanggal_expired`) VALUES
(2, 1, 'Banjarmasin', '-', '2025-01-24', '2025-01-24', '2026-01-24'),
(3, 2, 'Banjarmasin', '-', '2022-01-24', '2025-01-24', '2026-01-24'),
(4, 3, 'Banjarmasin', '-', '2022-01-01', '2025-01-27', '2023-01-01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_setting`
--

CREATE TABLE `tbl_setting` (
  `id_setting` int NOT NULL,
  `nama_setting` varchar(50) NOT NULL,
  `value` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_setting`
--

INSERT INTO `tbl_setting` (`id_setting`, `nama_setting`, `value`) VALUES
(1, 'Tampil Menu', 'ya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_users` int NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `images` text NOT NULL,
  `id_user_level` int NOT NULL,
  `is_aktif` enum('y','n') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_users`, `full_name`, `email`, `password`, `images`, `id_user_level`, `is_aktif`) VALUES
(1, 'Nuris Akbar M.Kom', 'admin@gmail.com', '$2y$04$Wbyfv4xwihb..POfhxY5Y.jHOJqEFIG3dLfBYwAmnOACpH0EWCCdq', 'atomix_user31.png', 1, 'y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user_level`
--

CREATE TABLE `tbl_user_level` (
  `id_user_level` int NOT NULL,
  `nama_level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user_level`
--

INSERT INTO `tbl_user_level` (`id_user_level`, `nama_level`) VALUES
(1, 'Super Admin'),
(2, 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_berlayar`
--
ALTER TABLE `tbl_berlayar`
  ADD PRIMARY KEY (`id_berlayar`);

--
-- Indeks untuk tabel `tbl_hak_akses`
--
ALTER TABLE `tbl_hak_akses`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_kapal`
--
ALTER TABLE `tbl_kapal`
  ADD PRIMARY KEY (`id_kapal`);

--
-- Indeks untuk tabel `tbl_maintenance`
--
ALTER TABLE `tbl_maintenance`
  ADD PRIMARY KEY (`id_maintenance`);

--
-- Indeks untuk tabel `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `tbl_pembaruan`
--
ALTER TABLE `tbl_pembaruan`
  ADD PRIMARY KEY (`id_pembaruan`);

--
-- Indeks untuk tabel `tbl_sertifikat`
--
ALTER TABLE `tbl_sertifikat`
  ADD PRIMARY KEY (`id_sertifikat`);

--
-- Indeks untuk tabel `tbl_setting`
--
ALTER TABLE `tbl_setting`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_users`);

--
-- Indeks untuk tabel `tbl_user_level`
--
ALTER TABLE `tbl_user_level`
  ADD PRIMARY KEY (`id_user_level`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_berlayar`
--
ALTER TABLE `tbl_berlayar`
  MODIFY `id_berlayar` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_hak_akses`
--
ALTER TABLE `tbl_hak_akses`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `tbl_kapal`
--
ALTER TABLE `tbl_kapal`
  MODIFY `id_kapal` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_maintenance`
--
ALTER TABLE `tbl_maintenance`
  MODIFY `id_maintenance` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id_menu` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tbl_pembaruan`
--
ALTER TABLE `tbl_pembaruan`
  MODIFY `id_pembaruan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_sertifikat`
--
ALTER TABLE `tbl_sertifikat`
  MODIFY `id_sertifikat` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_setting`
--
ALTER TABLE `tbl_setting`
  MODIFY `id_setting` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_users` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_user_level`
--
ALTER TABLE `tbl_user_level`
  MODIFY `id_user_level` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
