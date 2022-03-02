-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2022 at 03:51 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rpll`
--

-- --------------------------------------------------------

--
-- Table structure for table `detailmatakuliah`
--

DROP TABLE IF EXISTS `detailmatakuliah`;
CREATE TABLE `detailmatakuliah` (
  `id` int(5) NOT NULL,
  `jumlahPertemuan` int(2) NOT NULL,
  `kelas` char(1) NOT NULL,
  `semester` text NOT NULL,
  `tahun` int(4) NOT NULL,
  `hitungKehadiran` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `detailskripsi`
--

DROP TABLE IF EXISTS `detailskripsi`;
CREATE TABLE `detailskripsi` (
  `id` int(11) NOT NULL,
  `asAccepted` tinyint(1) NOT NULL,
  `komentar` text NOT NULL,
  `label` text NOT NULL,
  `tanggalAccepted` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

DROP TABLE IF EXISTS `dosen`;
CREATE TABLE `dosen` (
  `bidangIlmu` text NOT NULL,
  `gelarAkademik` text NOT NULL,
  `programStudi` text NOT NULL,
  `statusDosen` tinyint(1) NOT NULL,
  `statusIkatankerja` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kehadiran`
--

DROP TABLE IF EXISTS `kehadiran`;
CREATE TABLE `kehadiran` (
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

DROP TABLE IF EXISTS `mahasiswa`;
CREATE TABLE `mahasiswa` (
  `jurusan` text NOT NULL,
  `tahunLulus` int(4) NOT NULL,
  `tahunMasuk` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `matakuliah`
--

DROP TABLE IF EXISTS `matakuliah`;
CREATE TABLE `matakuliah` (
  `jenis` text NOT NULL,
  `kode` text NOT NULL,
  `nama` text NOT NULL,
  `sifat` text NOT NULL,
  `sks` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

DROP TABLE IF EXISTS `nilai`;
CREATE TABLE `nilai` (
  `index` char(1) NOT NULL,
  `nilai1` float NOT NULL,
  `nilai2` float NOT NULL,
  `nilai3` float NOT NULL,
  `nilai4` float NOT NULL,
  `nilai5` float NOT NULL,
  `nilaiAkhir` float NOT NULL,
  `nilaiUAS` int(5) NOT NULL,
  `hitungNA` float NOT NULL,
  `konvertNA` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

DROP TABLE IF EXISTS `pengumuman`;
CREATE TABLE `pengumuman` (
  `id` int(5) NOT NULL,
  `judul` text NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rencanastudi`
--

DROP TABLE IF EXISTS `rencanastudi`;
CREATE TABLE `rencanastudi` (
  `id` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `hitungIPS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `roster`
--

DROP TABLE IF EXISTS `roster`;
CREATE TABLE `roster` (
  `jamMulai` int(11) NOT NULL,
  `jamSelesai` int(11) NOT NULL,
  `ruangan` text NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `skripsi`
--

DROP TABLE IF EXISTS `skripsi`;
CREATE TABLE `skripsi` (
  `batasAkhir` date NOT NULL,
  `file` text NOT NULL,
  `id` int(5) NOT NULL,
  `isTugasakhir` tinyint(1) NOT NULL,
  `judul` text NOT NULL,
  `milestone` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `alamat` text NOT NULL,
  `email` text NOT NULL,
  `fotoProfil` bit(10) NOT NULL,
  `jenisKelamin` char(2) NOT NULL,
  `nama` text NOT NULL,
  `nomorInduk` text NOT NULL,
  `noTelepon` text NOT NULL,
  `password` char(5) NOT NULL,
  `status` text NOT NULL,
  `tanggalLahir` date NOT NULL,
  `tempatLahir` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
