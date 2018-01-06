-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 31 Des 2017 pada 12.43
-- Versi Server: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tugas_sti`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `id_akun` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(1) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`id_akun`, `nama`, `username`, `password`, `level`, `created_at`, `update_at`) VALUES
(2, 'Super User', 'su', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', '0', '2017-12-23 23:18:55', '2017-12-23 23:18:55'),
(3, 'Owner', 'owner', '4c1029697ee358715d3a14a2add817c4b01651440de808371f78165ac90dc581', '1', '2017-12-30 06:49:45', '2017-12-30 07:14:06'),
(4, 'Pegawai', 'pegawai', '1c09dbc0ad0aa4e712009e87de284f2760aa05c0b494bb915552be3e64edda32', '2', '2017-12-30 06:50:11', '2017-12-30 06:50:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `barcode` varchar(50) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `barcode`, `nama_barang`, `jumlah_barang`, `harga_beli`, `harga_jual`) VALUES
(1, '912841053948', 'Testing', 12, 20000, 35000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_keluar`
--

CREATE TABLE `transaksi_keluar` (
  `id_transaksi_keluar` int(11) NOT NULL,
  `tgl_transaksi_keluar` date NOT NULL,
  `total_transaksi_keluar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi_keluar`
--

INSERT INTO `transaksi_keluar` (`id_transaksi_keluar`, `tgl_transaksi_keluar`, `total_transaksi_keluar`) VALUES
(1, '2017-10-15', 40000),
(2, '2017-12-31', 40000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_keluar_detail`
--

CREATE TABLE `transaksi_keluar_detail` (
  `id_transaksi_keluar_detail` int(11) NOT NULL,
  `id_transaksi_keluar` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `banyak` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi_keluar_detail`
--

INSERT INTO `transaksi_keluar_detail` (`id_transaksi_keluar_detail`, `id_transaksi_keluar`, `id_barang`, `banyak`) VALUES
(1, 1, 1, 2),
(2, 2, 1, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_masuk`
--

CREATE TABLE `transaksi_masuk` (
  `id_transaksi_masuk` int(11) NOT NULL,
  `tgl_transaksi_masuk` date NOT NULL,
  `total_transaksi_masuk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi_masuk`
--

INSERT INTO `transaksi_masuk` (`id_transaksi_masuk`, `tgl_transaksi_masuk`, `total_transaksi_masuk`) VALUES
(2, '2017-05-31', 70000),
(5, '2017-02-28', 175000),
(6, '2017-12-31', 70000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_masuk_detail`
--

CREATE TABLE `transaksi_masuk_detail` (
  `id_transaksi_masuk_detail` int(11) NOT NULL,
  `id_transaksi_masuk` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `banyak` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi_masuk_detail`
--

INSERT INTO `transaksi_masuk_detail` (`id_transaksi_masuk_detail`, `id_transaksi_masuk`, `id_barang`, `banyak`) VALUES
(3, 2, 1, 2),
(8, 5, 1, 3),
(9, 5, 1, 2),
(10, 6, 1, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD UNIQUE KEY `code_barcode` (`barcode`);

--
-- Indexes for table `transaksi_keluar`
--
ALTER TABLE `transaksi_keluar`
  ADD PRIMARY KEY (`id_transaksi_keluar`);

--
-- Indexes for table `transaksi_keluar_detail`
--
ALTER TABLE `transaksi_keluar_detail`
  ADD PRIMARY KEY (`id_transaksi_keluar_detail`),
  ADD KEY `fk_transaksi_keluar_id_transaksi_keluar` (`id_transaksi_keluar`),
  ADD KEY `fk_barang_id_barang_transaksi_keluar` (`id_barang`);

--
-- Indexes for table `transaksi_masuk`
--
ALTER TABLE `transaksi_masuk`
  ADD PRIMARY KEY (`id_transaksi_masuk`);

--
-- Indexes for table `transaksi_masuk_detail`
--
ALTER TABLE `transaksi_masuk_detail`
  ADD PRIMARY KEY (`id_transaksi_masuk_detail`),
  ADD KEY `fk_barang_id_barang` (`id_barang`),
  ADD KEY `fk_transaksi_masuk_id_transaksi_masuk` (`id_transaksi_masuk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `transaksi_keluar`
--
ALTER TABLE `transaksi_keluar`
  MODIFY `id_transaksi_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `transaksi_keluar_detail`
--
ALTER TABLE `transaksi_keluar_detail`
  MODIFY `id_transaksi_keluar_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `transaksi_masuk`
--
ALTER TABLE `transaksi_masuk`
  MODIFY `id_transaksi_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `transaksi_masuk_detail`
--
ALTER TABLE `transaksi_masuk_detail`
  MODIFY `id_transaksi_masuk_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `transaksi_keluar_detail`
--
ALTER TABLE `transaksi_keluar_detail`
  ADD CONSTRAINT `fk_barang_id_barang_transaksi_keluar` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_transaksi_keluar_id_transaksi_keluar` FOREIGN KEY (`id_transaksi_keluar`) REFERENCES `transaksi_keluar` (`id_transaksi_keluar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi_masuk_detail`
--
ALTER TABLE `transaksi_masuk_detail`
  ADD CONSTRAINT `fk_barang_id_barang` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_transaksi_masuk_id_transaksi_masuk` FOREIGN KEY (`id_transaksi_masuk`) REFERENCES `transaksi_masuk` (`id_transaksi_masuk`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
