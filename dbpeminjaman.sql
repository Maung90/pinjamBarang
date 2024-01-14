-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 14 Jan 2024 pada 05.35
-- Versi Server: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbpeminjaman`
--
CREATE DATABASE IF NOT EXISTS `dbpeminjaman` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `dbpeminjaman`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id_role`, `role`) VALUES
(1, 'master'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbbarang`
--

CREATE TABLE `tbbarang` (
  `kode_barang` varchar(20) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `merk_barang` varchar(50) NOT NULL,
  `status_barang` varchar(30) NOT NULL,
  `image` varchar(255) NOT NULL,
  `id_kategori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbbarang`
--

INSERT INTO `tbbarang` (`kode_barang`, `nama_barang`, `merk_barang`, `status_barang`, `image`, `id_kategori`) VALUES
('inv001', 'Proyektor Epson 300', 'Epson', 'dipinjam', '296765aa9c9af110c40ac94e977cb610.jpeg', 1),
('inv0010', 'Kabel VGA Razor L300', 'Razor', 'Tersedia', '086847ae877d22a3ebeae0f341ededc6.jpeg', 4),
('inv0011', 'Kabel VGA Razor L300', 'Razor', 'tersedia', '086847ae877d22a3ebeae0f341ededc6.jpeg', 4),
('inv0012', 'Speaker Sony K332', 'Sony', 'Tersedia', '99eb2fc379478a931df487a028fb33ae.jpeg', 5),
('inv0013', 'Speaker Sony K332', 'Sony', 'tersedia', '99eb2fc379478a931df487a028fb33ae.jpeg', 5),
('inv0014', 'Switch Deli 88', 'Deli', 'Tersedia', '0b03877c2eafe63a93fffc7b26a70028.jpeg', 6),
('inv0015', 'Switch Deli 88', 'Deli', 'tersedia', '0b03877c2eafe63a93fffc7b26a70028.jpeg', 6),
('inv0016', 'Switch Deli 88', 'Deli', 'tersedia', '0b03877c2eafe63a93fffc7b26a70028.jpeg', 6),
('inv0017', 'Printer Epson P330', 'Epson', 'Tersedia', '8c9d03eb6489af01e90b2afb46c70b73.jpeg', 7),
('inv0018', 'Printer Epson P330', 'Epson', 'tersedia', '8c9d03eb6489af01e90b2afb46c70b73.jpeg', 7),
('inv0019', 'Printer Epson P330', 'Epson', 'tersedia', '8c9d03eb6489af01e90b2afb46c70b73.jpeg', 7),
('inv002', 'Kabel Terminal', 'Uchida', 'dipinjam', 'ae13af5a7d5525d5cffebbf2192f13e4.jpg', 2),
('inv0020', 'Router Acome K188', 'Acome', 'tersedia', 'e60b69decc4f23f0deb9858408c0cb06.jpeg', 8),
('inv0021', 'Router Acome K188', 'Acome', 'Tersedia', 'e60b69decc4f23f0deb9858408c0cb06.jpeg', 8),
('inv0022', 'Router Acome K188', 'Acome', 'tersedia', 'e60b69decc4f23f0deb9858408c0cb06.jpeg', 8),
('inv0023', 'Router Acome K188', 'Acome', 'tersedia', 'e60b69decc4f23f0deb9858408c0cb06.jpeg', 8),
('inv0024', 'Proyektor Acome J11', 'Acome', 'Tersedia', '296765aa9c9af110c40ac94e977cb610.jpeg', 1),
('inv003', 'Proyektor Samsung S23', 'Samsung', 'dipinjam', '296765aa9c9af110c40ac94e977cb610.jpeg', 1),
('inv004', 'Kabel Terminal', 'Uchida', 'Tersedia', '0d1742ec2debaa075acd1184221a639f.jpeg', 2),
('inv005', 'Kabel Terminal', 'Miyako', 'Tersedia', 'ae13af5a7d5525d5cffebbf2192f13e4.jpg', 2),
('inv006', 'Kabel Terminal', 'Miyako', 'Tersedia', '843d545597c074ae5846f7e994644d38.jpeg', 1),
('inv007', 'Kabel HDMI Razor x22', 'Razor', 'Tersedia', '4e676fa7d23fb5f2c0862aa55a905cde.jpg', 3),
('inv008', 'Kabel HDMI Razor x22', 'Razor', 'tersedia', '4e676fa7d23fb5f2c0862aa55a905cde.jpg', 3),
('inv009', 'Kabel VGA Razor L300', 'Razor', 'Tersedia', '086847ae877d22a3ebeae0f341ededc6.jpeg', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbkategori`
--

CREATE TABLE `tbkategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbkategori`
--

INSERT INTO `tbkategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Proyektor'),
(2, 'Kabel Roll'),
(3, 'Kabel HDMI'),
(4, 'Kabel VGA'),
(5, 'Speaker'),
(6, 'Switch'),
(7, 'Printer'),
(8, 'Router');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbnote`
--

CREATE TABLE `tbnote` (
  `keterangan` varchar(100) DEFAULT NULL,
  `id_peminjaman` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbnote`
--

INSERT INTO `tbnote` (`keterangan`, `id_peminjaman`) VALUES
('9e8b59e5951915b41002509529311cbc.jpg', 'PNJ0001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbpeminjam`
--

CREATE TABLE `tbpeminjam` (
  `no_identitas` varchar(20) NOT NULL,
  `nama_peminjam` varchar(50) NOT NULL,
  `kelas` varchar(20) DEFAULT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telp` varchar(15) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbpeminjam`
--

INSERT INTO `tbpeminjam` (`no_identitas`, `nama_peminjam`, `kelas`, `alamat`, `no_telp`, `password`, `email`) VALUES
('2215354011', 'I Gede Surya Wibawa', '3C TRPL', 'Jalan Jimbaran', '0813379999', '$2y$10$DSZVAbX8x2CZOrr/nQCGUur41fLUuh2mMyzpGqRucQYRzYfeGUvwy', 'wsurya262@gmail.com'),
('2215354031', 'Levri Stevani Widodo', '3C TRPL', 'Jalan Raya Renon', '0815589832', '$2y$10$DSZVAbX8x2CZOrr/nQCGUur41fLUuh2mMyzpGqRucQYRzYfeGUvwy', 'sepri.levri@gmail.com'),
('2215354059', 'Nyoman Agus Mahardiputra', '3C TRPL', 'Jalan Sadewa', '0877822311', '$2y$10$DSZVAbX8x2CZOrr/nQCGUur41fLUuh2mMyzpGqRucQYRzYfeGUvwy', 'agus44@gmail.com'),
('2215354071', 'Ida Bagus Putu Wibawa', '3C TRPL', 'Jalan nakula', '089123456', '$2y$10$DSZVAbX8x2CZOrr/nQCGUur41fLUuh2mMyzpGqRucQYRzYfeGUvwy', 'wibawa13@gmail.com'),
('2215354079', 'M Irfan Rangganata', '3C TRPL', 'Jalan Bima', '0812332321', '$2y$10$DSZVAbX8x2CZOrr/nQCGUur41fLUuh2mMyzpGqRucQYRzYfeGUvwy', 'rangga123@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbuser`
--

CREATE TABLE `tbuser` (
  `no_user` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `unit_kerja` varchar(50) DEFAULT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbuser`
--

INSERT INTO `tbuser` (`no_user`, `username`, `password`, `nama_user`, `email`, `no_telp`, `alamat`, `unit_kerja`, `id_role`) VALUES
('1', '1', '$2y$10$M/8i2Q475hCzjAN8AYEJ6.UwrwgTxGBgAV/CS3TJ7IV23FUBvFJDm', 'master', 'wsurya262@gmail.com', '08123123', 'jalan penggangsaan timur', 'Lab MI', 1),
('1238765431', 'admin2', '$2y$10$3wgIqmkOsA5gKrvtoA3fB.Qr3KHlrKQjT6o01yNH0jZZ1fjR47XTy', 'Irfan', 'wsurya262@gmail.com', '09876123', 'jalan eka laweya', 'Lab MI', 2),
('221121212', 'admin1', '$2y$10$3wgIqmkOsA5gKrvtoA3fB.Qr3KHlrKQjT6o01yNH0jZZ1fjR47XTy', 'Adi', 'wsurya262@gmail.com', '0987612323', 'jalan imam bonjol', 'Lab MI', 2),
('33212321', 'admin3', '$2y$10$3wgIqmkOsA5gKrvtoA3fB.Qr3KHlrKQjT6o01yNH0jZZ1fjR47XTy', 'Yoga', 'wsurya262@gmail.com', '0815323123', 'jalan raya puputan\r\n', 'Lab MI', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_history`
--

CREATE TABLE `tb_history` (
  `id_history` int(11) NOT NULL,
  `kode_barang` varchar(20) DEFAULT NULL,
  `id_peminjaman` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_history`
--

INSERT INTO `tb_history` (`id_history`, `kode_barang`, `id_peminjaman`) VALUES
(71, 'inv002', 'PNJ0001'),
(72, 'inv001', 'PNJ0001'),
(73, 'inv002', 'PNJ0003'),
(74, 'inv001', 'PNJ0003'),
(75, 'inv002', 'PNJ0004'),
(76, 'inv001', 'PNJ0004'),
(77, 'inv001', 'PNJ0010'),
(78, 'inv003', 'PNJ0010'),
(79, 'inv002', 'PNJ0010');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_order`
--

CREATE TABLE `tb_order` (
  `id_order` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_peminjam` varchar(20) NOT NULL,
  `jumlah` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_order`
--

INSERT INTO `tb_order` (`id_order`, `id_kategori`, `id_peminjam`, `jumlah`) VALUES
(1, 4, '2215354031', 2),
(2, 5, '2215354031', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_peminjaman`
--

CREATE TABLE `tb_peminjaman` (
  `id_peminjaman` varchar(20) NOT NULL,
  `no_identitas` varchar(20) NOT NULL,
  `waktu_pengembalian` datetime DEFAULT NULL,
  `waktu_pinjam` datetime DEFAULT CURRENT_TIMESTAMP,
  `approved_by` varchar(20) DEFAULT NULL,
  `status_peminjaman` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_peminjaman`
--

INSERT INTO `tb_peminjaman` (`id_peminjaman`, `no_identitas`, `waktu_pengembalian`, `waktu_pinjam`, `approved_by`, `status_peminjaman`) VALUES
('PNJ0001', '2215354031', '2024-01-09 09:20:00', '2024-01-08 20:21:27', '33212321', 'dikembalikan'),
('PNJ0002', '2215354079', '2024-01-13 14:00:00', '2024-01-13 09:03:08', '221121212', 'dikembalikan'),
('PNJ0003', '2215354011', '2024-01-11 16:01:00', '2024-01-11 09:00:00', '1238765431', 'pending'),
('PNJ0004', '2215354071', '2024-01-13 14:36:00', '2024-01-13 11:19:15', '1238765431', 'pending'),
('PNJ0005', '2215354059', '2024-01-11 11:19:15', '2024-01-11 16:19:15', '221121212', 'dipinjam'),
('PNJ0006', '2215354059', '2024-12-13 14:00:00', '2024-12-13 08:00:00', '221121212', 'dikembalikan'),
('PNJ0007', '2215354071', '2024-01-03 14:00:00', '2024-01-03 09:00:00', '1238765431', 'dikembalikan'),
('PNJ0008', '2215354031', '2024-01-03 16:00:00', '2024-01-03 10:00:00', '1238765431', 'dipinjam'),
('PNJ0009', '2215354011', '2024-01-05 16:00:00', '2024-01-03 10:00:00', '33212321', 'dikembalikan'),
('PNJ0010', '2215354031', '2024-01-14 16:08:00', '2024-01-14 00:34:06', '221121212', 'dipinjam');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `tbbarang`
--
ALTER TABLE `tbbarang`
  ADD PRIMARY KEY (`kode_barang`),
  ADD KEY `fk_tbBarang_tbkategori1_idx` (`id_kategori`);

--
-- Indexes for table `tbkategori`
--
ALTER TABLE `tbkategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tbnote`
--
ALTER TABLE `tbnote`
  ADD PRIMARY KEY (`id_peminjaman`);

--
-- Indexes for table `tbpeminjam`
--
ALTER TABLE `tbpeminjam`
  ADD PRIMARY KEY (`no_identitas`);

--
-- Indexes for table `tbuser`
--
ALTER TABLE `tbuser`
  ADD PRIMARY KEY (`no_user`),
  ADD KEY `fk_tbUser_role_idx` (`id_role`);

--
-- Indexes for table `tb_history`
--
ALTER TABLE `tb_history`
  ADD PRIMARY KEY (`id_history`),
  ADD KEY `fk_tbBarang_has_tbpeminjam_tbBarang1_idx` (`kode_barang`),
  ADD KEY `fk_tb_history_tb_peminjaman1_idx` (`id_peminjaman`);

--
-- Indexes for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `tb_peminjaman`
--
ALTER TABLE `tb_peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `fk_tb_peminjaman_tbUser1_idx` (`approved_by`),
  ADD KEY `fk_tb_peminjaman_tbpeminjam1_idx` (`no_identitas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbkategori`
--
ALTER TABLE `tbkategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tb_history`
--
ALTER TABLE `tb_history`
  MODIFY `id_history` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;
--
-- AUTO_INCREMENT for table `tb_order`
--
ALTER TABLE `tb_order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbbarang`
--
ALTER TABLE `tbbarang`
  ADD CONSTRAINT `fk_tbBarang_tbkategori1` FOREIGN KEY (`id_kategori`) REFERENCES `tbkategori` (`id_kategori`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
