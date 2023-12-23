-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Des 2023 pada 01.43
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
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
  `id_peminjaman` varchar(20) NOT NULL
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
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbpeminjam`
--

INSERT INTO `tbpeminjam` (`no_identitas`, `nama_peminjam`, `kelas`, `alamat`, `no_telp`, `password`, `email`) VALUES
('1', '1234', '1', '1', '1', '$2y$10$MIPYOLOT46iYC11UWo0SdufoNskGyQyqWK4wp5R5xQHoUgy4LDJEO', ''),
('43213568', 't723io', '236', '2345', '234', '$2y$10$JpiGQljfx99UdXhegRa6NOt7POepexu.B57dbP6QA8yIQaSzI5dpG', 'wsurya262@gmail.com');

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
('098765', '098765', '$2y$10$RM3o5m/yATLLiAcb8/WtPusOFQZmtesoekCMV4i6emS6Vi.L604Ci', '09876', 'wsurya262@gmail.com', '09876', '09876', 'Lab MI', 2),
('0987654', '098765', '$2y$10$WiqajAs8j0Hc0EqvkgnWOuq9Iru96QG/2MuIYPZc/rDfvmhQfpZaO', '09876', 'wsurya262@gmail.com', '09876', '09876', 'Lab MI', 2),
('09876543', '098765', '$2y$10$nLuSbjuAhG5s51Lz6EeeEOoTzTEI/vkoKlbIV6gtDpM3fwbClUdAq', '09876', 'wsurya262@gmail.com', '09876', '09876', 'Lab MI', 2),
('098765431', '098765', '$2y$10$R35SCoD2YsFZFyLEzoQb/.UAcxQicSW.7t2CGbmfPnBC1V5LtoJTa', '09876', 'wsurya262@gmail.com', '09876', '09876', 'Lab MI', 2),
('1', '1', '$2y$10$M/8i2Q475hCzjAN8AYEJ6.UwrwgTxGBgAV/CS3TJ7IV23FUBvFJDm', '1', 'wsurya262@gmail.com', '1', '1', 'Lab MI', 1),
('111111', '234', '$2y$10$Gk20Bl2nMUcbGsfgDO0Cye43Af5NTUwKFY1rkwtW.RMHlo4UmiZVq', 'q', 'surya262@gmail.com', 'q', 'q', 'Lab MI', 2),
('1231', '321321', '$2y$10$NXmXlYqdyJCDhkk77ptkDu.cZTiqhj9.NNhsVD8PzlrE3hLRX7SoG', '', 'wsurya262@gmail.com', '', '', 'Masukan Unit Kerja', 2),
('1234567', '123456', '$2y$10$4EaebIdJuNr7RDDyFcremeCcbdZcerqnP2LpkUyA9jWUmC9fSDiBm', '1234567', 'wsurya262@gmail.com', '1', '1', 'Lab MI', 2),
('214421234', '12345', '$2y$10$8vRCOZq17rR6amlP9.5zMuw2b0UsxZ06R558PLuaCa7JLynx3bfFi', '', 'wsurya262@gmail.com', '', '', 'Masukan Unit Kerja', 2),
('3454', '4345', '$2y$10$doS1enwxYsuwTRYYLwZTmOrhdDrEM826mGS1uDQpn22eKMBZCkxgq', '', 'wsurya262@gmail.com', '', '', 'Masukan Unit Kerja', 2),
('456374', '436743', '$2y$10$qX/DQpT0iJW9zbPbuT01/ukzI3pKCXd47P8w.DbpVRbxGC.s5jYf.', '', 'wsurya262@gmail.com', '', '', 'Masukan Unit Kerja', 2),
('6352', '7396', '$2y$10$SI/mmSXRRCJwJ.p0nbGIyOW6b1/M2zouE5jWjrMzVP/HXIJqt.L4S', '', 'wsurya262@gmail.com', '', '', 'Masukan Unit Kerja', 2),
('asdsa', 'sadasd', '$2y$10$5veaoHhLf.DckscjWrwUp.pzI68M/z8dlQD4zXZyZ3Qal1D3VeQb.', '', 'wsurya262@gmail.com', '', '', 'Masukan Unit Kerja', 2),
('ASDSADAS', 'ASDSAD', '$2y$10$yAblX6H4IfDb2SgWEnHg4OxYIDAgzUYO.EY7cq1lpTmntPKwIu68C', '', 'wsurya262@gmail.com', '', '', 'Masukan Unit Kerja', 2);

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
(28, 'inv001', '2'),
(29, 'inv004', '2'),
(30, 'inv006', '2'),
(31, 'inv008', '2'),
(32, 'inv002', '1'),
(33, 'inv004', '1'),
(34, 'inv006', '1'),
(35, 'inv008', '1'),
(36, 'inv003', '1'),
(37, 'inv005', '1'),
(38, 'inv007', '1');

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
  `waktu_pinjam` datetime DEFAULT current_timestamp(),
  `approved_by` varchar(20) DEFAULT NULL,
  `status_peminjaman` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_peminjaman`
--

INSERT INTO `tb_peminjaman` (`id_peminjaman`, `no_identitas`, `waktu_pengembalian`, `waktu_pinjam`, `approved_by`, `status_peminjaman`) VALUES
('', '1', '2023-12-18 13:36:00', '2023-12-18 10:37:07', NULL, 'pending'),
('2', '1', '2023-12-14 13:01:00', '2023-12-14 13:02:04', NULL, 'pending');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indeks untuk tabel `tbbarang`
--
ALTER TABLE `tbbarang`
  ADD PRIMARY KEY (`kode_barang`),
  ADD KEY `fk_tbBarang_tbkategori1_idx` (`id_kategori`);

--
-- Indeks untuk tabel `tbkategori`
--
ALTER TABLE `tbkategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tbnote`
--
ALTER TABLE `tbnote`
  ADD PRIMARY KEY (`id_peminjaman`);

--
-- Indeks untuk tabel `tbpeminjam`
--
ALTER TABLE `tbpeminjam`
  ADD PRIMARY KEY (`no_identitas`);

--
-- Indeks untuk tabel `tbuser`
--
ALTER TABLE `tbuser`
  ADD PRIMARY KEY (`no_user`),
  ADD KEY `fk_tbUser_role_idx` (`id_role`);

--
-- Indeks untuk tabel `tb_history`
--
ALTER TABLE `tb_history`
  ADD PRIMARY KEY (`id_history`),
  ADD KEY `fk_tbBarang_has_tbpeminjam_tbBarang1_idx` (`kode_barang`),
  ADD KEY `fk_tb_history_tb_peminjaman1_idx` (`id_peminjaman`);

--
-- Indeks untuk tabel `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`id_order`);

--
-- Indeks untuk tabel `tb_peminjaman`
--
ALTER TABLE `tb_peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `fk_tb_peminjaman_tbUser1_idx` (`approved_by`),
  ADD KEY `fk_tb_peminjaman_tbpeminjam1_idx` (`no_identitas`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbkategori`
--
ALTER TABLE `tbkategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_history`
--
ALTER TABLE `tb_history`
  MODIFY `id_history` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `tb_order`
--
ALTER TABLE `tb_order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbbarang`
--
ALTER TABLE `tbbarang`
  ADD CONSTRAINT `fk_tbBarang_tbkategori1` FOREIGN KEY (`id_kategori`) REFERENCES `tbkategori` (`id_kategori`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
