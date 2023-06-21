-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2022 at 01:22 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bidtik`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_adm` int(11) NOT NULL,
  `nama_adm` varchar(50) NOT NULL,
  `telp_adm` varchar(15) NOT NULL,
  `user_adm` varchar(50) NOT NULL,
  `pass_adm` varchar(100) NOT NULL,
  `foto_adm` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_adm`, `nama_adm`, `telp_adm`, `user_adm`, `pass_adm`, `foto_adm`) VALUES
(1, 'Administrator', '08962878534', 'admin', '020304', '');

-- --------------------------------------------------------

--
-- Table structure for table `eksternal_keluar`
--

CREATE TABLE `eksternal_keluar` (
  `tgl_surat` date NOT NULL,
  `No_Surat` varchar(30) NOT NULL,
  `Dari` varchar(30) NOT NULL,
  `Keterangan` varchar(255) NOT NULL,
  `Untuk` varchar(30) NOT NULL,
  `id_user` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `eksternal_masuk`
--

CREATE TABLE `eksternal_masuk` (
  `tgl_surat` date NOT NULL,
  `No_Surat` varchar(30) NOT NULL,
  `Dari` varchar(30) NOT NULL,
  `Keterangan` varchar(255) NOT NULL,
  `Untuk` varchar(30) NOT NULL,
  `id_user` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id_user` varchar(20) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `hak_akses` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto_emp` text NOT NULL,
  `active` varchar(20) NOT NULL,
  `id_adm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id_user`, `nama_user`, `hak_akses`, `password`, `foto_emp`, `active`, `id_adm`) VALUES
('1', 'Polres Metro Bekasi', 'Polres', '1', 'foto_emp1I.png', 'Aktif', 1),
('15', 'BID HUMAS', 'Satker', '15', 'foto_emp15S.png', 'aktif', 1),
('16', 'BID KEUANGAN', 'Satker', '16', 'foto_emp16N.png', 'aktif', 1),
('17', 'BID PROPAM', 'Satker', '17', 'foto_emp17M.png', 'aktif', 1),
('2', 'Polres Metro Jakarta Pusat', 'Polres', '2', 'foto_emp2T.png', 'Aktif', 1),
('3', 'Polres Metro Jakarta Selatan', 'Polres', '3', 'foto_emp3N.png', 'Aktif', 1),
('36', 'BID TIK', 'Anggota', '36', '', 'aktif', 1),
('4', 'Polres Metro Jakarta Barat', 'Polres', '4', 'foto_emp4T.png', 'Aktif', 1),
('5', 'Polres Metro Jakarta Timur', 'Polres', '5', 'foto_emp5R.png', 'Aktif', 1),
('Biddokkes', 'BID DOKKES', 'Polres', 'Biddokkes', '', 'aktif', 1);

-- --------------------------------------------------------

--
-- Table structure for table `internal_keluar`
--

CREATE TABLE `internal_keluar` (
  `tgl_surat` date NOT NULL,
  `No_Surat` varchar(30) NOT NULL,
  `Dari` varchar(30) NOT NULL,
  `Keterangan` varchar(255) NOT NULL,
  `Untuk` varchar(30) NOT NULL,
  `id_user` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `internal_masuk`
--

CREATE TABLE `internal_masuk` (
  `tgl_surat` date NOT NULL,
  `No_Surat` varchar(30) NOT NULL,
  `Dari` varchar(30) NOT NULL,
  `Keterangan` varchar(255) NOT NULL,
  `Untuk` varchar(30) NOT NULL,
  `id_user` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jarkom`
--

CREATE TABLE `jarkom` (
  `No_Pengajuan` int(11) NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `Kegiatan` varchar(255) NOT NULL,
  `tgl_kegiatan` datetime NOT NULL,
  `tempat` varchar(255) NOT NULL,
  `kontak` varchar(100) NOT NULL,
  `Keterangan` varchar(100) NOT NULL,
  `File` varchar(255) NOT NULL,
  `status` varchar(30) NOT NULL,
  `id_user` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kamtibmas_khusus`
--

CREATE TABLE `kamtibmas_khusus` (
  `id_user` varchar(20) NOT NULL,
  `No_Lp` varchar(30) NOT NULL,
  `Polsek` varchar(50) NOT NULL,
  `Jenis_ppgk` varchar(50) NOT NULL,
  `Waktu` datetime NOT NULL,
  `Pelapor` varchar(30) NOT NULL,
  `Korban` varchar(30) NOT NULL,
  `Alamat` varchar(100) NOT NULL,
  `Terlapor` varchar(30) NOT NULL,
  `Lokasi` varchar(100) NOT NULL,
  `Motif` varchar(100) NOT NULL,
  `Kerugian` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kamtibmas_khusus`
--

INSERT INTO `kamtibmas_khusus` (`id_user`, `No_Lp`, `Polsek`, `Jenis_ppgk`, `Waktu`, `Pelapor`, `Korban`, `Alamat`, `Terlapor`, `Lokasi`, `Motif`, `Kerugian`) VALUES
('1', 'LP/B/30/VII/2022/SPKT', 'Polsek Beji', 'Penganiayaan', '2022-07-08 07:30:00', 'Elvi Zahara', 'Elvi Zahara', 'kplio', 'EPI', 'Gg.Assalam', 'Mencengkeram leher', 'Sakit Leher');

-- --------------------------------------------------------

--
-- Table structure for table `kamtibmas_umum`
--

CREATE TABLE `kamtibmas_umum` (
  `id_user` varchar(20) NOT NULL,
  `No_Lp` varchar(30) NOT NULL,
  `Polsek` varchar(30) NOT NULL,
  `Jenis_ppgk` varchar(50) NOT NULL,
  `Waktu` datetime NOT NULL,
  `Pelapor` varchar(30) NOT NULL,
  `Korban` varchar(30) NOT NULL,
  `Alamat` varchar(100) NOT NULL,
  `Terlapor` varchar(30) NOT NULL,
  `Lokasi` varchar(100) NOT NULL,
  `Motif` varchar(100) NOT NULL,
  `Kerugian` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kamtibmas_umum`
--

INSERT INTO `kamtibmas_umum` (`id_user`, `No_Lp`, `Polsek`, `Jenis_ppgk`, `Waktu`, `Pelapor`, `Korban`, `Alamat`, `Terlapor`, `Lokasi`, `Motif`, `Kerugian`) VALUES
('1', 'LP/B/30/VII/2022/SPKT', 'Polsek Beji', '', '2022-07-08 07:30:00', 'Elvi Zahara', 'Elvi Zahara', 'Kp. Lio', 'EPI', 'Gg. Assalam', 'Mencengkeram Leher', 'Korban Sakit Leher');

-- --------------------------------------------------------

--
-- Table structure for table `perbaikan`
--

CREATE TABLE `perbaikan` (
  `tgl_pengajuan` date NOT NULL,
  `No_Pengajuan` varchar(20) NOT NULL,
  `id_radio` varchar(11) NOT NULL,
  `kondisi` varchar(15) NOT NULL,
  `Keterangan` varchar(100) NOT NULL,
  `id_user` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perbaikan`
--

INSERT INTO `perbaikan` (`tgl_pengajuan`, `No_Pengajuan`, `id_radio`, `kondisi`, `Keterangan`, `id_user`) VALUES
('2022-07-14', 'HT/1/VII/2022', '1000', 'Rusak Ringan', 'Suara terlalu kecil', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_alkom`
--

CREATE TABLE `tabel_alkom` (
  `id_user` varchar(20) NOT NULL,
  `Nama` varchar(30) NOT NULL,
  `Pangkat` varchar(50) NOT NULL,
  `Jabatan` varchar(30) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `Keterangan` varchar(100) NOT NULL,
  `id_radio` varchar(11) NOT NULL,
  `serial_number` int(11) NOT NULL,
  `kondisi` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_alkom`
--

INSERT INTO `tabel_alkom` (`id_user`, `Nama`, `Pangkat`, `Jabatan`, `telp`, `Keterangan`, `id_radio`, `serial_number`, `kondisi`) VALUES
('1', 'Silvi', 'Pengatur/199800202020', 'Bhay. ADM Pelaksana Renmin', '0212201', 'Suara Kurang Jelas', '1000', 19931016, 'Rusak Ringan'),
('1', 'Anggi', 'Pengatur/199002032022022001', 'Bhay. ADM Pelaksana Renmin', '0202002', 'Baik', '1500', 2003100202, 'Barang Baru'),
('1', 'Sulis', 'Pengatur/199002032022022001', 'Bhay. ADM Pelaksana Renmin', '0852123456', 'Baik', '20000', 102993, 'Barang Baru'),
('1', 'Netra', 'Pengatur', 'Bhay. ADM Pelaksana Renmin', '0212201', 'Baik', '3000', 19931016, 'Barang Baru'),
('1', 'artur', 'Pengatur/199505172022022001', 'Bhay. ADM Pelaksana Renmin', '0212201', 'Baik', '4000', 3655879, 'Barang Baru'),
('5', 'Liberty Artur', 'Pengatur/199505172022022001', 'Bhay. ADM Pelaksana Renmin', '082210981067', 'Suara kurang jelas', '5000', 1000000, 'Rusak Ringan'),
('1', 'Triana Panji', 'Pengatur/198901202022022001', 'Bhay. ADM Pelaksana Renmin', '0212201', 'baik', '6000', 10101011, 'Barang Baru');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_hiltem`
--

CREATE TABLE `tabel_hiltem` (
  `id_user` varchar(20) NOT NULL,
  `No_Lp` varchar(50) NOT NULL,
  `Tgl_Lp` date NOT NULL,
  `Tgl_hilang` date NOT NULL,
  `Merk_Kendaraan` varchar(30) NOT NULL,
  `No_Rangka` varchar(30) NOT NULL,
  `No_Polisi` varchar(10) NOT NULL,
  `Jenis_Kendaraan` varchar(10) NOT NULL,
  `Tahun_Buat` year(4) NOT NULL,
  `No_Mesin` varchar(30) NOT NULL,
  `Nama_Pemilik` varchar(30) NOT NULL,
  `Alamat_Pemilik` varchar(100) NOT NULL,
  `Nama_Pelapor` varchar(30) NOT NULL,
  `Alamat_Pelapor` varchar(100) NOT NULL,
  `Warna` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `yankom`
--

CREATE TABLE `yankom` (
  `No_Pengajuan` varchar(20) NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `Kegiatan` varchar(30) NOT NULL,
  `tgl_kegiatan` datetime NOT NULL,
  `tempat` varchar(255) NOT NULL,
  `kontak` varchar(100) NOT NULL,
  `Keterangan` varchar(100) NOT NULL,
  `File` varchar(255) NOT NULL,
  `status` varchar(100) NOT NULL,
  `id_user` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_adm`),
  ADD KEY `id_adm` (`id_adm`);

--
-- Indexes for table `eksternal_keluar`
--
ALTER TABLE `eksternal_keluar`
  ADD PRIMARY KEY (`No_Surat`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `eksternal_masuk`
--
ALTER TABLE `eksternal_masuk`
  ADD PRIMARY KEY (`No_Surat`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_adm` (`id_adm`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `internal_keluar`
--
ALTER TABLE `internal_keluar`
  ADD PRIMARY KEY (`No_Surat`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `internal_masuk`
--
ALTER TABLE `internal_masuk`
  ADD PRIMARY KEY (`No_Surat`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `jarkom`
--
ALTER TABLE `jarkom`
  ADD PRIMARY KEY (`No_Pengajuan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `kamtibmas_khusus`
--
ALTER TABLE `kamtibmas_khusus`
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `kamtibmas_umum`
--
ALTER TABLE `kamtibmas_umum`
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `perbaikan`
--
ALTER TABLE `perbaikan`
  ADD PRIMARY KEY (`No_Pengajuan`),
  ADD KEY `id_radio` (`id_radio`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tabel_alkom`
--
ALTER TABLE `tabel_alkom`
  ADD PRIMARY KEY (`id_radio`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_radio` (`id_radio`);

--
-- Indexes for table `tabel_hiltem`
--
ALTER TABLE `tabel_hiltem`
  ADD PRIMARY KEY (`No_Lp`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `yankom`
--
ALTER TABLE `yankom`
  ADD PRIMARY KEY (`No_Pengajuan`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_adm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `eksternal_keluar`
--
ALTER TABLE `eksternal_keluar`
  ADD CONSTRAINT `eksternal_keluar_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `employee` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `eksternal_masuk`
--
ALTER TABLE `eksternal_masuk`
  ADD CONSTRAINT `eksternal_masuk_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `employee` (`id_user`) ON DELETE CASCADE;

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`id_adm`) REFERENCES `admin` (`id_adm`);

--
-- Constraints for table `internal_keluar`
--
ALTER TABLE `internal_keluar`
  ADD CONSTRAINT `internal_keluar_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `employee` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `internal_masuk`
--
ALTER TABLE `internal_masuk`
  ADD CONSTRAINT `internal_masuk_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `employee` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jarkom`
--
ALTER TABLE `jarkom`
  ADD CONSTRAINT `jarkom_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `employee` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kamtibmas_khusus`
--
ALTER TABLE `kamtibmas_khusus`
  ADD CONSTRAINT `kamtibmas_khusus_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `employee` (`id_user`);

--
-- Constraints for table `kamtibmas_umum`
--
ALTER TABLE `kamtibmas_umum`
  ADD CONSTRAINT `kamtibmas_umum_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `employee` (`id_user`);

--
-- Constraints for table `perbaikan`
--
ALTER TABLE `perbaikan`
  ADD CONSTRAINT `perbaikan_ibfk_1` FOREIGN KEY (`id_radio`) REFERENCES `tabel_alkom` (`id_radio`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `perbaikan_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `employee` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tabel_alkom`
--
ALTER TABLE `tabel_alkom`
  ADD CONSTRAINT `tabel_alkom_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `employee` (`id_user`);

--
-- Constraints for table `tabel_hiltem`
--
ALTER TABLE `tabel_hiltem`
  ADD CONSTRAINT `tabel_hiltem_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `employee` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `yankom`
--
ALTER TABLE `yankom`
  ADD CONSTRAINT `yankom_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `employee` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
