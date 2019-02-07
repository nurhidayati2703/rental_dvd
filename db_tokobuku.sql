-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 09 Mei 2018 pada 09.50
-- Versi Server: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_tokobuku`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE IF NOT EXISTS `buku` (
`kode_buku` int(11) NOT NULL,
  `judul_buku` varchar(100) NOT NULL,
  `tahun` int(11) NOT NULL,
  `kode_kategori` varchar(20) NOT NULL,
  `harga` int(11) NOT NULL,
  `foto_cover` varchar(100) NOT NULL,
  `penerbit` varchar(100) NOT NULL,
  `penulis` varchar(100) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`kode_buku`, `judul_buku`, `tahun`, `kode_kategori`, `harga`, `foto_cover`, `penerbit`, `penulis`, `stok`) VALUES
(7, 'Novel', 2018, 'R', 20000, '8.jpg', 'TS', 'TS', 82),
(8, 'Pameran', 2015, 'R', 15000, '6.jpg', 'Tiga Serangkai', 'Tiga Serangkai', 118),
(9, 'Fisika 2', 2015, 'A', 20000, 'Kejuruan.png', 'Gramedia', 'Pak Bidin', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_transaksi`
--

CREATE TABLE IF NOT EXISTS `data_transaksi` (
`kode_transaksi` int(11) NOT NULL,
  `kode_user` int(11) NOT NULL,
  `nama_pembeli` varchar(100) NOT NULL,
  `total` int(11) NOT NULL,
  `tanggal_beli` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_transaksi`
--

INSERT INTO `data_transaksi` (`kode_transaksi`, `kode_user`, `nama_pembeli`, `total`, `tanggal_beli`) VALUES
(73, 3, 'Sudarsono', 9900000, '2018-05-09'),
(74, 4, 'Toha', 300000, '2018-05-09'),
(75, 3, 'Budi', 35000, '2018-05-09'),
(76, 3, 'Budi', 15000, '2018-05-09'),
(77, 3, 'Hayo', 20000, '2018-05-09'),
(78, 5, 'Ilham', 4000000, '2018-05-09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_user`
--

CREATE TABLE IF NOT EXISTS `data_user` (
`kode_user` int(11) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_user`
--

INSERT INTO `data_user` (`kode_user`, `nama_user`, `username`, `password`, `level`) VALUES
(1, 'Muhammad Ilham Fajar', 'ilham', 'ilham', 'admin'),
(3, 'Insinyur Juanda', 'iniuser', 'iniuser', 'kasir'),
(4, 'Toha', 'kasir', 'kasir', 'kasir'),
(5, 'Budiono', 'budi12345', '1234567', 'kasir');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksi`
--

CREATE TABLE IF NOT EXISTS `detail_transaksi` (
`id_detail` int(11) NOT NULL,
  `kode_transaksi` int(11) NOT NULL,
  `kode_buku` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_detail`, `kode_transaksi`, `kode_buku`, `jumlah`) VALUES
(74, 74, 7, 15),
(75, 75, 7, 1),
(76, 75, 8, 1),
(77, 76, 8, 1),
(78, 77, 7, 1),
(79, 78, 9, 199),
(80, 78, 7, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `kode_kategori` varchar(20) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`kode_kategori`, `nama_kategori`) VALUES
('A', 'Anak'),
('Bo', 'Bimbingan Orang Tua'),
('D', 'Dewasa'),
('R', 'Remaja');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
 ADD PRIMARY KEY (`kode_buku`);

--
-- Indexes for table `data_transaksi`
--
ALTER TABLE `data_transaksi`
 ADD PRIMARY KEY (`kode_transaksi`);

--
-- Indexes for table `data_user`
--
ALTER TABLE `data_user`
 ADD PRIMARY KEY (`kode_user`);

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
 ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
 ADD PRIMARY KEY (`kode_kategori`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
MODIFY `kode_buku` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `data_transaksi`
--
ALTER TABLE `data_transaksi`
MODIFY `kode_transaksi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=79;
--
-- AUTO_INCREMENT for table `data_user`
--
ALTER TABLE `data_user`
MODIFY `kode_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=81;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
