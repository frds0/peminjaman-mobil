-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2022 at 10:36 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `peminjamanmobil`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail_biaya_operasional`
--

CREATE TABLE `tbl_detail_biaya_operasional` (
  `id_detail` int(11) NOT NULL,
  `id_permintaan` int(11) DEFAULT NULL,
  `namabiaya` varchar(30) DEFAULT NULL,
  `harga` varchar(11) DEFAULT NULL,
  `metode` varchar(100) DEFAULT NULL,
  `gambar` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_detail_biaya_operasional`
--

INSERT INTO `tbl_detail_biaya_operasional` (`id_detail`, `id_permintaan`, `namabiaya`, `harga`, `metode`, `gambar`) VALUES
(1, 1, 'Bensin', '40000', 'Cash', '1_0.png'),
(2, 2, 'Bensin', '30000', 'Cash', '2_0.jpg'),
(4, 2, 'Tambal Ban', '40000', 'Cash', '2_2.jpg'),
(5, 3, 'Bensin', '30000', 'Cash', '3_0.png'),
(6, 3, 'Parkir', '4000', 'Cash', '3_1.blm'),
(7, 4, 'Tambal Ban', '40000', 'Cash', '4_0.png'),
(8, 4, 'Parkir', '30000', 'Cash', '4_1.png'),
(9, 5, 'Cuci Mobil', '40000', 'Cash', '5_0.png'),
(10, 2, 'Lain-lain', '30000', 'Cash', '2_5.jpg'),
(11, 6, 'GRAB', '40000', 'Cash', '6_0.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_driver`
--

CREATE TABLE `tbl_driver` (
  `id_driver` int(11) NOT NULL,
  `npk` varchar(12) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `available` varchar(80) NOT NULL,
  `status` varchar(30) NOT NULL,
  `createdby` int(11) NOT NULL,
  `createddate` datetime NOT NULL,
  `modifiedby` int(11) NOT NULL,
  `modifieddate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_driver`
--

INSERT INTO `tbl_driver` (`id_driver`, `npk`, `nama`, `available`, `status`, `createdby`, `createddate`, `modifiedby`, `modifieddate`) VALUES
(1, '', 'Tidak Ada Driver', 'Tersedia', 'Aktif', 465456, '2022-05-30 05:12:17', 465456, '2022-05-30 05:12:17'),
(2, '114963', 'Hasan', 'Tersedia', 'Aktif', 465456, '2022-02-18 10:20:19', 465456, '2022-03-01 10:55:14'),
(3, '104404', 'Hendra', 'Tersedia', 'Aktif', 465456, '2022-02-18 10:20:34', 465456, '2022-03-01 10:55:21'),
(4, '100096', 'Erwin', 'Tersedia', 'Aktif', 465456, '2022-02-18 10:20:51', 465456, '2022-03-01 10:55:26'),
(5, '100098', 'Sugeng Mudiyanto', 'Tersedia', 'Aktif', 465456, '2022-02-18 10:21:16', 465456, '2022-03-01 10:55:31'),
(6, '101988', 'Dermawan', 'Tersedia', 'Aktif', 465456, '2022-02-18 10:20:03', 465456, '2022-04-04 08:22:27');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_emoney`
--

CREATE TABLE `tbl_emoney` (
  `id_emoney` int(11) NOT NULL,
  `nomor` varchar(20) NOT NULL,
  `namabank` varchar(50) NOT NULL,
  `available` varchar(50) NOT NULL,
  `status` varchar(100) NOT NULL,
  `createdby` int(11) NOT NULL,
  `createddate` datetime NOT NULL,
  `modifiedby` int(11) NOT NULL,
  `modifieddate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_emoney`
--

INSERT INTO `tbl_emoney` (`id_emoney`, `nomor`, `namabank`, `available`, `status`, `createdby`, `createddate`, `modifiedby`, `modifieddate`) VALUES
(1, '', 'Tidak Ada E-money', 'Tersedia', 'Aktif', 465456, '2022-04-04 11:55:02', 465456, '2022-04-04 11:56:47'),
(2, '2012 6876 4134 6127', 'BCA', 'Tersedia', 'Aktif', 475456, '2022-02-24 11:00:00', 465456, '2022-04-27 10:07:25'),
(3, '6767 8987 1234 6543', 'Mandiri', 'Tersedia', 'Aktif', 475456, '2022-02-24 11:00:18', 465456, '2022-04-27 10:07:15'),
(4, '6032 9840 1908 9899', 'Mandiri', 'Tersedia', 'Aktif', 465456, '2022-03-22 09:15:13', 465456, '2022-04-27 10:06:52'),
(5, '6032 9825 0198 8768', 'Mandiri', 'Tersedia', 'Aktif', 465456, '2022-04-04 08:25:55', 465456, '2022-04-27 10:06:27'),
(6, '6032 9827 0312 4873', 'Mandiri', 'Tersedia', 'Aktif', 465456, '2022-02-24 10:53:18', 465456, '2022-04-27 10:06:01');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mobil`
--

CREATE TABLE `tbl_mobil` (
  `id_mobil` int(11) NOT NULL,
  `nopolisi` varchar(12) NOT NULL,
  `merk` varchar(30) NOT NULL,
  `warna` varchar(30) NOT NULL,
  `tahunpembelian` varchar(5) NOT NULL,
  `available` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `createdby` int(11) NOT NULL,
  `createddate` datetime NOT NULL,
  `modifiedby` int(11) NOT NULL,
  `modifieddate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_mobil`
--

INSERT INTO `tbl_mobil` (`id_mobil`, `nopolisi`, `merk`, `warna`, `tahunpembelian`, `available`, `status`, `createdby`, `createddate`, `modifiedby`, `modifieddate`) VALUES
(1, '', 'GRAB', '', '', 'Tersedia', 'Aktif', 475456, '2022-02-18 11:08:27', 475456, '2022-03-01 10:53:12'),
(2, 'B 2788 UOM', 'Terios', 'Hitam', '-', 'Tersedia', 'Aktif', 475456, '2022-02-18 10:13:48', 475456, '2022-03-01 14:52:40'),
(3, 'B 2938 UOQ', 'Terios', 'Hitam', '2020', 'Tersedia', 'Aktif', 475456, '2022-02-18 10:17:06', 475456, '2022-03-01 10:54:27'),
(4, 'B 2313 UFA ', 'Terios', 'Hitam', '-', 'Tersedia', 'Aktif', 475456, '2022-02-18 10:22:59', 475456, '2022-03-01 10:53:38'),
(5, 'B 2472 UFC', 'Agya', 'Silver', '2013', 'Tersedia', 'Aktif', 475456, '2022-02-18 10:24:50', 475456, '2022-03-01 10:54:02'),
(6, 'B 1381 UYB', 'Avanza', 'Hitam', '2013', 'Tersedia', 'Aktif', 475456, '2022-02-18 10:26:04', 475456, '2022-03-01 10:53:24'),
(7, 'B 9861 UDE', 'Isuzu', 'Putih', '2014', 'Tersedia', 'Aktif', 475456, '2022-02-18 10:27:09', 465456, '2022-03-15 11:08:40'),
(8, 'B 9862 UDE', 'Isuzu', 'Putih', '2014', 'Tersedia', 'Non Aktif', 475456, '2022-02-18 10:27:54', 465456, '2022-06-02 11:21:42'),
(9, 'B 9873 UDE', 'Isuzu', 'Putih', '2014', 'Tersedia', 'Aktif', 475456, '2022-02-18 10:28:58', 475456, '2022-03-01 11:19:23'),
(10, 'B 2869 UON', 'Voxi', 'Hitam', '2019', 'Tersedia', 'Aktif', 475456, '2022-02-18 10:29:54', 475456, '2022-03-01 10:54:18'),
(11, 'B 9698 IG ', 'Isuzu', 'Hitam', '2008', 'Tersedia', 'Aktif', 475456, '2022-02-18 10:30:29', 465456, '2022-03-24 09:31:13');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_permintaan`
--

CREATE TABLE `tbl_permintaan` (
  `id_permintaan` int(11) NOT NULL,
  `npk` int(12) NOT NULL,
  `dept` varchar(50) NOT NULL,
  `tujuan` varchar(100) NOT NULL,
  `keperluan` varchar(100) NOT NULL,
  `berangkat` datetime NOT NULL,
  `kembali` datetime DEFAULT NULL,
  `driver` varchar(10) DEFAULT NULL,
  `kendaraan` varchar(50) DEFAULT NULL,
  `kodevoucher` varchar(20) DEFAULT NULL,
  `mobil` varchar(50) DEFAULT NULL,
  `namadriver` varchar(50) DEFAULT NULL,
  `km_berangkat` int(11) DEFAULT NULL,
  `jmberangkat` time DEFAULT NULL,
  `km_akhir` int(11) DEFAULT NULL,
  `jmkembali` time NOT NULL,
  `saldo_awal_emoney` int(11) DEFAULT NULL,
  `emoney` varchar(100) DEFAULT NULL,
  `saldo_akhir_emoney` int(11) DEFAULT NULL,
  `total_biaya_grab` int(11) DEFAULT NULL,
  `total_biaya_bensin` int(11) DEFAULT NULL,
  `total_biaya_tol` int(11) DEFAULT NULL,
  `total_biaya_parkir` int(11) DEFAULT NULL,
  `total_biaya_tambalban` int(11) DEFAULT NULL,
  `total_biaya_cucimobil` int(11) DEFAULT NULL,
  `total_biaya_lainlain` int(11) DEFAULT NULL,
  `total_biaya_cash` int(11) DEFAULT NULL,
  `total_biaya_emoney` int(11) DEFAULT NULL,
  `total_biaya_perusahaan` int(11) DEFAULT NULL,
  `total_keseluruhan` int(11) DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `approved_tidaksetuju` varchar(200) NOT NULL,
  `alasan_assignmobil` varchar(200) NOT NULL,
  `approvedby` int(11) DEFAULT NULL,
  `approveddate` datetime DEFAULT NULL,
  `createdby` int(11) NOT NULL,
  `createddate` datetime NOT NULL,
  `modifiedby` int(11) DEFAULT NULL,
  `modifieddate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_permintaan`
--

INSERT INTO `tbl_permintaan` (`id_permintaan`, `npk`, `dept`, `tujuan`, `keperluan`, `berangkat`, `kembali`, `driver`, `kendaraan`, `kodevoucher`, `mobil`, `namadriver`, `km_berangkat`, `jmberangkat`, `km_akhir`, `jmkembali`, `saldo_awal_emoney`, `emoney`, `saldo_akhir_emoney`, `total_biaya_grab`, `total_biaya_bensin`, `total_biaya_tol`, `total_biaya_parkir`, `total_biaya_tambalban`, `total_biaya_cucimobil`, `total_biaya_lainlain`, `total_biaya_cash`, `total_biaya_emoney`, `total_biaya_perusahaan`, `total_keseluruhan`, `status`, `keterangan`, `approved_tidaksetuju`, `alasan_assignmobil`, `approvedby`, `approveddate`, `createdby`, `createddate`, `modifiedby`, `modifieddate`) VALUES
(1, 475456, 'IT', 'Bogor', 'Assesment', '2022-06-02 09:00:00', '2022-06-02 18:00:00', 'Ya', 'Mobil', '-', '2', '2', 123, '09:00:00', 555, '18:00:00', 200000, '3', 200000, 0, 40000, 0, 0, 0, 0, 0, 40000, 0, 0, 40000, 'Done', '', '', '-', 485456, '2022-06-02 13:43:52', 475456, '2022-06-02 13:39:38', 465456, '2022-06-02 14:52:44'),
(2, 475456, 'IT', 'Tanggerang', 'Kantor', '2022-06-07 09:00:00', '2022-06-07 17:00:00', 'Tidak', 'Mobil', '-', '4', NULL, 2323, '09:00:00', 444, '17:00:00', 200000, '4', 200000, 0, 30000, 0, 0, 40000, 0, 30000, 100000, 0, 0, 100000, 'Done', 'gambar kurang tepat', '', '-', 485456, '2022-06-02 13:52:09', 475456, '2022-06-02 13:40:20', 465456, '2022-06-02 14:51:53'),
(3, 475456, 'IT', 'Mangga Besar', 'Kantor', '2022-06-07 10:00:00', '2022-06-07 17:30:00', NULL, 'GRAB', '-', '3', NULL, 122, '10:00:00', 111, '17:30:00', 200000, '2', 200000, 0, 30000, 0, 4000, 0, 0, 0, 34000, 0, 0, 34000, 'Done', '', '', 'Masih ada mobil', 485456, '2022-06-02 13:44:09', 475456, '2022-06-02 13:41:01', 465456, '2022-06-02 14:52:50'),
(4, 475456, 'IT', 'Kalideres', 'Kantor', '2022-06-08 13:00:00', '2022-06-08 18:00:00', 'Ya', 'Mobil', '-', '6', '4', 888, '13:00:00', 111, '18:00:00', 200000, '6', 200000, 0, 0, 0, 30000, 40000, 0, 0, 70000, 0, 0, 70000, 'Done', '', '', '-', 485456, '2022-06-02 13:43:46', 475456, '2022-06-02 13:41:31', 465456, '2022-06-02 14:52:55'),
(5, 475456, 'IT', 'Bekasi', 'Kantor', '2022-06-09 09:00:00', '2022-06-09 16:30:00', 'Ya', 'Mobil', '-', '5', '1', 888, '09:00:00', 999, '16:30:00', 200000, '5', 200000, 0, 0, 0, 0, 0, 40000, 0, 40000, 0, 0, 40000, 'Done', '', '', 'Supir habis', 485456, '2022-06-02 13:44:16', 475456, '2022-06-02 13:42:07', 465456, '2022-06-02 14:53:00'),
(6, 475456, 'IT', 'Bandung', 'Kantor', '2022-06-02 09:00:00', '2022-06-02 09:00:00', NULL, 'GRAB', 'PAKEGRABAJA123', '1', NULL, NULL, '09:00:00', 888, '09:00:00', NULL, NULL, 0, 40000, 0, 0, 0, 0, 0, 0, 40000, 0, 0, 40000, 'Done', '', '', '-', 485456, '2022-06-02 14:07:29', 475456, '2022-06-02 14:06:21', 465456, '2022-06-02 14:55:17');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `npk` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `dept` varchar(200) NOT NULL,
  `password` varchar(30) NOT NULL,
  `password_baru` varchar(100) DEFAULT NULL,
  `role` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `createdby` int(11) NOT NULL,
  `createddate` datetime NOT NULL,
  `modifiedby` int(11) NOT NULL,
  `modifieddate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `npk`, `nama`, `dept`, `password`, `password_baru`, `role`, `status`, `createdby`, `createddate`, `modifiedby`, `modifieddate`) VALUES
(1, 455456, 'Jojo', 'HCHO', 'jojo', NULL, 'Staff', 'Aktif', 0, '0000-00-00 00:00:00', 465456, '2022-06-02 09:06:25'),
(2, 465456, 'Admin', 'GA', 'amelia', NULL, 'Admin', 'Aktif', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(3, 475456, 'User', 'IT', 'fahmi', NULL, 'Staff', 'Aktif', 0, '0000-00-00 00:00:00', 465456, '2022-04-04 07:54:41'),
(4, 485456, 'Kepala Departemen', 'IT', '123456', NULL, 'Kadept', 'Aktif', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(5, 495456, 'Ahmad Firdaus', 'IT', 'daus', NULL, 'Staff', 'Aktif', 0, '0000-00-00 00:00:00', 465456, '2022-04-04 07:54:20'),
(6, 505456, 'Tama', 'HCHO', 'tama', NULL, 'Kadept', 'Aktif', 0, '0000-00-00 00:00:00', 465456, '2022-06-02 09:06:38'),
(10, 515456, 'Hanny Pertiwi', 'HCHO', 'hanny', NULL, 'Staff', 'Aktif', 465456, '2022-04-04 07:53:46', 465456, '2022-06-02 09:06:50'),
(11, 525456, 'Restu Rafirani', 'HO', 'restu', NULL, 'Staff', 'Aktif', 465456, '2022-04-27 14:40:21', 0, '0000-00-00 00:00:00'),
(12, 535456, 'Kadept HO', 'HO', 'kadeptho', NULL, 'Kadept', 'Aktif', 465456, '2022-04-27 14:41:45', 0, '0000-00-00 00:00:00'),
(13, 104576, 'Budiono', 'GA', 'budi', NULL, 'Admin', 'Aktif', 465456, '2022-05-20 08:44:18', 0, '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_detail_biaya_operasional`
--
ALTER TABLE `tbl_detail_biaya_operasional`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `tbl_driver`
--
ALTER TABLE `tbl_driver`
  ADD PRIMARY KEY (`id_driver`);

--
-- Indexes for table `tbl_emoney`
--
ALTER TABLE `tbl_emoney`
  ADD PRIMARY KEY (`id_emoney`);

--
-- Indexes for table `tbl_mobil`
--
ALTER TABLE `tbl_mobil`
  ADD PRIMARY KEY (`id_mobil`);

--
-- Indexes for table `tbl_permintaan`
--
ALTER TABLE `tbl_permintaan`
  ADD PRIMARY KEY (`id_permintaan`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_detail_biaya_operasional`
--
ALTER TABLE `tbl_detail_biaya_operasional`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_driver`
--
ALTER TABLE `tbl_driver`
  MODIFY `id_driver` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_emoney`
--
ALTER TABLE `tbl_emoney`
  MODIFY `id_emoney` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_mobil`
--
ALTER TABLE `tbl_mobil`
  MODIFY `id_mobil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_permintaan`
--
ALTER TABLE `tbl_permintaan`
  MODIFY `id_permintaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
