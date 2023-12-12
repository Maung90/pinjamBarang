-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 11 Des 2023 pada 04.24
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
('inv001', 'proyektor1', 'samsung', 'tidak tersedia', '', 1),
('inv002', 'kabel roll 1', 'ssamsung', 'tersedia', '', 2),
('inv003', 'proyektor1', 'samsung', 'tersedia', '', 1),
('inv004', 'kabel roll 1', 'ssamsung', 'tersedia', '', 2),
('inv005', 'proyektor1', 'samsung', 'tersedia', '', 1),
('inv006', 'kabel roll 1', 'ssamsung', 'tersedia', '', 2),
('inv007', 'proyektor1', 'samsung', 'tersedia', '', 1),
('inv008', 'kabel roll 1', 'ssamsung', 'tersedia', '', 2);

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
(2, 'kabel roll');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbnote`
--

CREATE TABLE `tbnote` (
  `keterangan` varchar(100) DEFAULT NULL,
  `id_peminjaman` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbpeminjam`
--

INSERT INTO `tbpeminjam` (`no_identitas`, `nama_peminjam`, `kelas`, `alamat`, `no_telp`, `password`) VALUES
('1', 'asep', '-', 'jalan 11', '11', '1');

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
(20, 'inv002', 1),
(21, 'inv004', 1),
(22, 'inv006', 1),
(23, 'inv008', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_order`
--

CREATE TABLE `tb_order` (
  `id_order` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_peminjam` int(11) NOT NULL,
  `jumlah` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, '1', '2023-12-03 15:31:00', '2023-12-02 15:30:37', NULL, 'pending');

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
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbkategori`
--
ALTER TABLE `tbkategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_history`
--
ALTER TABLE `tb_history`
  MODIFY `id_history` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `tb_order`
--
ALTER TABLE `tb_order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbbarang`
--
ALTER TABLE `tbbarang`
  ADD CONSTRAINT `fk_tbBarang_tbkategori1` FOREIGN KEY (`id_kategori`) REFERENCES `tbkategori` (`id_kategori`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `tbnote`
--
ALTER TABLE `tbnote`
  ADD CONSTRAINT `fk_tbnote_tb_peminjaman1` FOREIGN KEY (`id_peminjaman`) REFERENCES `tb_peminjaman` (`id_peminjaman`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `tbuser`
--
ALTER TABLE `tbuser`
  ADD CONSTRAINT `fk_tbUser_role` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `tb_history`
--
ALTER TABLE `tb_history`
  ADD CONSTRAINT `fk_tbBarang_has_tbpeminjam_tbBarang1` FOREIGN KEY (`kode_barang`) REFERENCES `tbbarang` (`kode_barang`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tb_history_tb_peminjaman1` FOREIGN KEY (`id_peminjaman`) REFERENCES `tb_peminjaman` (`id_peminjaman`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `tb_peminjaman`
--
ALTER TABLE `tb_peminjaman`
  ADD CONSTRAINT `fk_tb_peminjaman_tbUser1` FOREIGN KEY (`approved_by`) REFERENCES `tbuser` (`no_user`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tb_peminjaman_tbpeminjam1` FOREIGN KEY (`no_identitas`) REFERENCES `tbpeminjam` (`no_identitas`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
