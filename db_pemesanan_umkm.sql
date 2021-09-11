-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 29, 2021 at 12:39 
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pemesanan_umkm`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_info`
--

CREATE TABLE `tb_info` (
  `id_info` int(11) NOT NULL,
  `id_umkm` varchar(100) NOT NULL,
  `kode_pengambilan` varchar(20) NOT NULL,
  `tgl_upload` varchar(20) NOT NULL,
  `judul_info` varchar(100) NOT NULL,
  `isi_info` text NOT NULL,
  `kondisi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_info`
--

INSERT INTO `tb_info` (`id_info`, `id_umkm`, `kode_pengambilan`, `tgl_upload`, `judul_info`, `isi_info`, `kondisi`) VALUES
(10, '1', 'K0001', '29-08-2021', 'pengambilan komoditi bulan juli', 'Pengambilan komoditi jam 08:00 s/d 16:00', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kode_pesanan`
--

CREATE TABLE `tb_kode_pesanan` (
  `id_kode_pesan` int(11) NOT NULL,
  `id_umkm` varchar(20) NOT NULL,
  `kode_pesanan` varchar(20) NOT NULL,
  `tgl_pesan` varchar(20) NOT NULL,
  `status_kode` varchar(20) NOT NULL,
  `tgl_pengiriman` varchar(20) NOT NULL,
  `tgl_diterima` varchar(20) NOT NULL,
  `ulasan_umkm` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kode_pesanan`
--

INSERT INTO `tb_kode_pesanan` (`id_kode_pesan`, `id_umkm`, `kode_pesanan`, `tgl_pesan`, `status_kode`, `tgl_pengiriman`, `tgl_diterima`, `ulasan_umkm`) VALUES
(19, '1', 'K0001', '29-08-2021', 'Sudah diterima', '29-08-2021', '29-08-2021', 'minyak belum diterima');

-- --------------------------------------------------------

--
-- Table structure for table `tb_komoditi_agro`
--

CREATE TABLE `tb_komoditi_agro` (
  `id_komoditi_agro` int(11) NOT NULL,
  `nama_komoditi` varchar(100) NOT NULL,
  `harga_satuan` double NOT NULL,
  `volume` varchar(100) NOT NULL,
  `satuan_kg` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_komoditi_agro`
--

INSERT INTO `tb_komoditi_agro` (`id_komoditi_agro`, `nama_komoditi`, `harga_satuan`, `volume`, `satuan_kg`) VALUES
(10, 'beras', 10000, '1', 1),
(11, 'Telur', 14000, '1', 1),
(12, 'Minyak', 18000, '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_komoditi_umkm`
--

CREATE TABLE `tb_komoditi_umkm` (
  `id_komoditi_umkm` int(11) NOT NULL,
  `id_umkm` varchar(100) NOT NULL,
  `kode_pesanan` varchar(20) NOT NULL,
  `nama_komoditi` varchar(100) NOT NULL,
  `jumlah_komoditi` int(11) NOT NULL,
  `volume` varchar(100) NOT NULL,
  `harga_satuan` double NOT NULL,
  `satuan_kg` varchar(100) NOT NULL,
  `tgl_diterima` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tb_komoditi_umkm`
--

INSERT INTO `tb_komoditi_umkm` (`id_komoditi_umkm`, `id_umkm`, `kode_pesanan`, `nama_komoditi`, `jumlah_komoditi`, `volume`, `harga_satuan`, `satuan_kg`, `tgl_diterima`) VALUES
(23, '1', 'K0001', 'beras', 12, '10000', 10000, '1', '29-08-2021'),
(24, '1', 'K0001', 'Telur', 1, '14000', 14000, '1', '29-08-2021');

-- --------------------------------------------------------

--
-- Table structure for table `tb_masyarakat`
--

CREATE TABLE `tb_masyarakat` (
  `id_masyarakat` int(11) NOT NULL,
  `nama_masyarakat` varchar(50) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `tgl_lahir` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `id_umkm` varchar(20) NOT NULL,
  `status_masyarakat` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_masyarakat`
--

INSERT INTO `tb_masyarakat` (`id_masyarakat`, `nama_masyarakat`, `nik`, `tgl_lahir`, `alamat`, `username`, `password`, `id_umkm`, `status_masyarakat`) VALUES
(14, 'hesti', '3604114210060001', '1990-11-01', 'kibin', 'hesti', '070550d8ed8790c0ef4848c86404e1b1', '1', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pemesanan`
--

CREATE TABLE `tb_pemesanan` (
  `id_pemesanan` int(11) NOT NULL,
  `kode_pesanan` varchar(20) NOT NULL,
  `id_komoditi` varchar(100) NOT NULL,
  `id_umkm` varchar(100) NOT NULL,
  `nama_komoditi` varchar(100) NOT NULL,
  `harga_satuan` double NOT NULL,
  `volume` varchar(100) NOT NULL,
  `satuan_kg` int(11) NOT NULL,
  `jumlah_komoditi` int(11) NOT NULL,
  `kondisi` varchar(20) NOT NULL,
  `sub_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pemesanan`
--

INSERT INTO `tb_pemesanan` (`id_pemesanan`, `kode_pesanan`, `id_komoditi`, `id_umkm`, `nama_komoditi`, `harga_satuan`, `volume`, `satuan_kg`, `jumlah_komoditi`, `kondisi`, `sub_total`) VALUES
(44, 'K0001', '10', '1', 'beras', 10000, '1', 1, 12, 'Diterima', 120000),
(45, 'K0001', '11', '1', 'Telur', 14000, '1', 1, 1, 'Diterima', 14000),
(46, 'K0001', '12', '1', 'Minyak', 18000, '1', 1, 2, 'Belum diterima', 36000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengambilan`
--

CREATE TABLE `tb_pengambilan` (
  `id_pengambilan` int(11) NOT NULL,
  `id_masyarakat` varchar(20) NOT NULL,
  `id_info` varchar(20) NOT NULL,
  `kode_pengambilan` varchar(20) NOT NULL,
  `kondisi` varchar(20) NOT NULL,
  `tgl_pengambilan` varchar(20) NOT NULL,
  `ulasan_pengambilan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengambilan`
--

INSERT INTO `tb_pengambilan` (`id_pengambilan`, `id_masyarakat`, `id_info`, `kode_pengambilan`, `kondisi`, `tgl_pengambilan`, `ulasan_pengambilan`) VALUES
(11, '14', '10', 'K0001', 'Sudah Diterima', '29-08-2021', 'sudah diambil');

-- --------------------------------------------------------

--
-- Table structure for table `tb_umkm`
--

CREATE TABLE `tb_umkm` (
  `id_umkm` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status_umkm` varchar(50) NOT NULL,
  `nama_umkm` varchar(100) NOT NULL,
  `kec_umkm` varchar(50) NOT NULL,
  `alamat_umkm` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_umkm`
--

INSERT INTO `tb_umkm` (`id_umkm`, `username`, `password`, `status_umkm`, `nama_umkm`, `kec_umkm`, `alamat_umkm`) VALUES
(1, 'kibin1', '05f2f6af458da6dd96f2e1383fd4e2e2', 'aktif', 'kibin1', 'kibin', 'kibin'),
(2, 'cikande2', 'ca4e070868709ca168a01365f1442784', 'aktif', 'cikande2', 'cikande', 'cikande'),
(3, 'ciruas3', 'd6d23d317a6998b71626057a0ff0d8ed', 'aktif', 'ciruas3', 'ciruas3', 'ciruas');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `status`) VALUES
(2, 'pimpinan', '90973652b88fe07d05a4304f0a945de8', 'pimpinan'),
(3, 'asb1', '51e3f13c27c7846c401ba0bae6c70c4a', 'user'),
(4, 'asb2', '9d73bd2ef760588c555513b415c61b97', 'user'),
(5, 'asb3', 'd38d53e1999384f07b58d297ba89d5fa', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_info`
--
ALTER TABLE `tb_info`
  ADD PRIMARY KEY (`id_info`);

--
-- Indexes for table `tb_kode_pesanan`
--
ALTER TABLE `tb_kode_pesanan`
  ADD PRIMARY KEY (`id_kode_pesan`);

--
-- Indexes for table `tb_komoditi_agro`
--
ALTER TABLE `tb_komoditi_agro`
  ADD PRIMARY KEY (`id_komoditi_agro`);

--
-- Indexes for table `tb_komoditi_umkm`
--
ALTER TABLE `tb_komoditi_umkm`
  ADD PRIMARY KEY (`id_komoditi_umkm`);

--
-- Indexes for table `tb_masyarakat`
--
ALTER TABLE `tb_masyarakat`
  ADD PRIMARY KEY (`id_masyarakat`);

--
-- Indexes for table `tb_pemesanan`
--
ALTER TABLE `tb_pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`);

--
-- Indexes for table `tb_pengambilan`
--
ALTER TABLE `tb_pengambilan`
  ADD PRIMARY KEY (`id_pengambilan`);

--
-- Indexes for table `tb_umkm`
--
ALTER TABLE `tb_umkm`
  ADD PRIMARY KEY (`id_umkm`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_info`
--
ALTER TABLE `tb_info`
  MODIFY `id_info` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tb_kode_pesanan`
--
ALTER TABLE `tb_kode_pesanan`
  MODIFY `id_kode_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `tb_komoditi_agro`
--
ALTER TABLE `tb_komoditi_agro`
  MODIFY `id_komoditi_agro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tb_komoditi_umkm`
--
ALTER TABLE `tb_komoditi_umkm`
  MODIFY `id_komoditi_umkm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `tb_masyarakat`
--
ALTER TABLE `tb_masyarakat`
  MODIFY `id_masyarakat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tb_pemesanan`
--
ALTER TABLE `tb_pemesanan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `tb_pengambilan`
--
ALTER TABLE `tb_pengambilan`
  MODIFY `id_pengambilan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tb_umkm`
--
ALTER TABLE `tb_umkm`
  MODIFY `id_umkm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
