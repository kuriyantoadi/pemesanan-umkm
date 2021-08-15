-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 14, 2021 at 08:10 
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pemasaran_umkm`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_info`
--

CREATE TABLE `tb_info` (
  `id_info` int(11) NOT NULL,
  `id_umkm` varchar(100) NOT NULL,
  `tgl_upload` varchar(20) NOT NULL,
  `judul_info` varchar(100) NOT NULL,
  `isi_info` text NOT NULL,
  `kondisi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_info`
--

INSERT INTO `tb_info` (`id_info`, `id_umkm`, `tgl_upload`, `judul_info`, `isi_info`, `kondisi`) VALUES
(2, '1', '07-08-2021', 'Pengambilan Beras', '2', 'aktif'),
(5, '1', '14-08-2021', 'pengambilan komoditi', 'Di mohon untuk mengambil komoditi jam 1 siang', 'aktif');

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
(9, '1', 'K0003', '14-08-2021', 'Sudah diterima', '14-08-2021', '14-08-2021', ''),
(10, '1', 'K0004', '', 'belum selesai', '', '', '');

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
(3, 'Beras', 10800, '10', 1911),
(4, 'Telor', 27000, '2', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_komoditi_umkm`
--

CREATE TABLE `tb_komoditi_umkm` (
  `id_komoditi_umkm` int(11) NOT NULL,
  `id_umkm` varchar(100) NOT NULL,
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

INSERT INTO `tb_komoditi_umkm` (`id_komoditi_umkm`, `id_umkm`, `nama_komoditi`, `jumlah_komoditi`, `volume`, `harga_satuan`, `satuan_kg`, `tgl_diterima`) VALUES
(2, '1', 'Beras', 102, '10800', 10800, '1911', '14-08-2021'),
(3, '1', 'Telor', 120, '27000', 27000, '2', '14-08-2021');

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
(12, 'Upin', '123456', '2000-05-11', 'Serang', 'upin', '1098546859b56f5297205943b5a0469e', '1', 'aktif');

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
(18, 'K0002', '1', '1', 'Beras1', 10000012, 'karung12', 1012, 0, '', 0),
(19, 'K0002', '2', '1', 'Gula Pasir', 15000, '1 Karung', 100, 0, '', 0),
(25, 'K0003', '3', '1', 'Beras', 10800, '10', 1911, 102, 'Diterima', 1101600),
(26, 'K0003', '4', '1', 'Telor', 27000, '2', 2, 120, 'Diterima', 3240000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengiriman`
--

CREATE TABLE `tb_pengiriman` (
  `id_pengiriman` int(11) NOT NULL,
  `id_pesanan` varchar(100) NOT NULL,
  `tgl_pengiriman` varchar(20) NOT NULL,
  `tgl_diterima` varchar(20) NOT NULL,
  `feedback_agro` text NOT NULL,
  `feedback_umkm` text NOT NULL,
  `kondisi` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'umkm', '5f5466445fdda727d9d8312c4b18ba3f', 'aktif', 'Toko madura', 'ciruas', 'Serang');

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
(1, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user'),
(2, 'pimpinan', '90973652b88fe07d05a4304f0a945de8', 'pimpinan');

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
-- Indexes for table `tb_pengiriman`
--
ALTER TABLE `tb_pengiriman`
  ADD PRIMARY KEY (`id_pengiriman`);

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
  MODIFY `id_info` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tb_kode_pesanan`
--
ALTER TABLE `tb_kode_pesanan`
  MODIFY `id_kode_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tb_komoditi_agro`
--
ALTER TABLE `tb_komoditi_agro`
  MODIFY `id_komoditi_agro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_komoditi_umkm`
--
ALTER TABLE `tb_komoditi_umkm`
  MODIFY `id_komoditi_umkm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_masyarakat`
--
ALTER TABLE `tb_masyarakat`
  MODIFY `id_masyarakat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tb_pemesanan`
--
ALTER TABLE `tb_pemesanan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `tb_pengiriman`
--
ALTER TABLE `tb_pengiriman`
  MODIFY `id_pengiriman` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_umkm`
--
ALTER TABLE `tb_umkm`
  MODIFY `id_umkm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
