-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 12 Agu 2019 pada 23.55
-- Versi Server: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pinjam_ruangan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `booking`
--

CREATE TABLE `booking` (
  `id_booking` int(11) NOT NULL,
  `id_ruangan` int(11) NOT NULL,
  `nama_peminjam` varchar(200) NOT NULL,
  `tanggal` varchar(100) NOT NULL,
  `kegiatan` varchar(200) NOT NULL,
  `waktu_mulai` varchar(20) NOT NULL,
  `waktu_selesai` varchar(20) NOT NULL,
  `jumlah_orang` int(20) NOT NULL,
  `kebutuhan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `booking`
--

INSERT INTO `booking` (`id_booking`, `id_ruangan`, `nama_peminjam`, `tanggal`, `kegiatan`, `waktu_mulai`, `waktu_selesai`, `jumlah_orang`, `kebutuhan`) VALUES
(14, 10, 'Kholid', '14 August, 2019', 'rapat', '08:59', '13:00', 5, 'Snack Basah,Snack Kering,Lunch,Minum'),
(17, 17, 'arnold', '13 August, 2019', 'tes', '08:01', '12:00', 2, 'Snack Kering,Snack Basah,Lunch,Minum');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peraturan`
--

CREATE TABLE `peraturan` (
  `id_rule` int(11) NOT NULL,
  `rule` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `peraturan`
--

INSERT INTO `peraturan` (`id_rule`, `rule`) VALUES
(1, 'Minimal 7 (hari) hari sebelum pelaksanaan pemohon menjadwal/booking ruangan/tempat dimaksud di Unit Layanan Terpadu (ULT) Gedung Rektorat Lt. 1 Kampus Universitas Padjadjaran Jatinangor');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruangan`
--

CREATE TABLE `ruangan` (
  `id_ruangan` int(11) NOT NULL,
  `nama_ruangan` varchar(200) NOT NULL,
  `fasilitas` varchar(200) NOT NULL,
  `kapasitas` varchar(200) NOT NULL,
  `foto_ruangan` varchar(200) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ruangan`
--

INSERT INTO `ruangan` (`id_ruangan`, `nama_ruangan`, `fasilitas`, `kapasitas`, `foto_ruangan`, `keterangan`) VALUES
(7, 'SGM EXPLOR ( ex 45 Besar ) ', 'AC ,LCD ,Toilet ,Telphone ,Dispenser,Flipchart', '280', '894e6f666447048bd862f6962a154027.jpg', 'Classroom : 40 \r\nRound Table : 30 \r\nTeather : 80\r\nLesehan : 100\r\nU Shape :Max 30 '),
(8, 'NUTRILON ROYAL ', 'AC ,LCD ,Flipchart,White Board ,Dispenser', '14', 'dc2e46466cf613614b913fc3f553a64b.jpg', 'lokasi  Lantai 1'),
(9, 'SGM ANANDA', 'AC,LCD,Dispenser,White Board ,Flipchart', '14', 'eef09a1da2fcdbb60c11dbb716ef0c33.jpg', 'lokasi di Lantai 1 Office Produksi \r\n'),
(10, 'SGM BUNDA ( ex Ruang 1 ) ', 'AC,LCD,Telephone ,Dispenser,Flipchart', '10', '780b3adb043fe8861e7451b9f7c442f6.jpg', 'lokasi di Lantai 2 Lorong Direksi \r\n'),
(11, 'RUANG DIREKSI 1', 'AC,LCD,Telphone ,Toilet ,Dispenser,Flipchart', '6', 'df015c6d73be39bc666a0aa749edcc9c.jpg', 'Lokasi : Lantai 2 Lorong Direksi \r\n'),
(12, 'RUANG DIREKSI 2 ', 'AC,LCD,Telphone ,Toilet ,Dispenser,Flipchart', '4', 'dfcaa9e141fbe2dbc9f69c911c45380f.jpg', 'lokasi di Lantai 2 Lorong Direksi \r\nMinta Persetujuan '),
(13, 'SGM AKTIF ( ex Ruang 3 ) ', 'AC,Dispenser,White Board ', '4', 'e2ced128371fa33dab6397fb1854e8b9.jpg', 'lokasi di Lantai 2 Lorong Direksi '),
(14, 'SGM LLM ( ex Ruang 2 ) ', 'AC,LCD,Telphone ,Toilet ,Dispenser,White Board ,Flipchart', '10', '1104275a232714cadeb0cbce94fa887f.jpg', 'lokasi di Lantai 2 Lorong Direksi \r\n'),
(15, 'LACTAMIL ( ex Ruang 4 ) ', 'AC,LCD,Telphone ,Vicon ,Dispenser,Flipchart', '10', 'f4bb547e8af70c0dbf93980234cd6736.jpg', 'lokasi di Lantai 2 Greenroom '),
(16, 'NUTRILON ', 'AC,LCD,Dispenser,White Board ', '10', '75bed6d2b99307257c4439b4a263a1cb.jpg', 'lokasi di Lantai 3'),
(17, 'RUANG MEETING EX THEMIS ', 'AC,LCD,Dispenser,Flipchart', '25', 'e85d770a106533e8f4a4c33abec9216a.jpg', 'lokasi di Lantai 3\r\n'),
(18, 'RUANG MEETING NEW RI ', 'AC,LCD,Dispenser,Telphone ', '14', '3bec8b03a86f9cbaff26ab80d46b7bdb.jpg', 'lokasi di Lantai 2 New RI \r\n'),
(19, 'LIBRARY', 'AC,LCD,Dispenser,Toilet ,Flipchart', '15', 'a9a6ea98d3acde897b4d4ab1200562e4.jpg', 'lokasi di Lantai 1\r\n'),
(22, 'tes1', 'dasd', '1', 'c67dbe4055d4bf1b4a93c8e353473ce9.png', 'tes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id_booking`);

--
-- Indexes for table `peraturan`
--
ALTER TABLE `peraturan`
  ADD PRIMARY KEY (`id_rule`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id_ruangan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id_booking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `peraturan`
--
ALTER TABLE `peraturan`
  MODIFY `id_rule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id_ruangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
