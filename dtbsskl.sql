-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 04, 2025 at 12:57 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dtbsskl`
--

-- --------------------------------------------------------

--
-- Table structure for table `formulir_siswa`
--

CREATE TABLE `formulir_siswa` (
  `id_peserta` int NOT NULL,
  `reg_no` varchar(20) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `tingkat_kelas` varchar(10) NOT NULL,
  `program` varchar(50) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `nisn` varchar(20) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `dusun` varchar(225) DEFAULT NULL,
  `kecamatan` varchar(225) NOT NULL,
  `desa_kelurahan` varchar(225) NOT NULL,
  `kabupaten_kota` varchar(225) NOT NULL,
  `rt` varchar(5) NOT NULL,
  `rw` varchar(5) NOT NULL,
  `transportasi` varchar(50) NOT NULL,
  `no_telepon` varchar(15) NOT NULL,
  `nama_ayah` varchar(225) NOT NULL,
  `nik_ayah` varchar(20) DEFAULT NULL,
  `pendidikan_ayah` varchar(50) NOT NULL,
  `pekerjaan_ayah` varchar(220) NOT NULL,
  `penghasilan_ayah` varchar(50) NOT NULL,
  `nama_ibu` varchar(225) NOT NULL,
  `nik_ibu` varchar(20) DEFAULT NULL,
  `pendidikan_ibu` varchar(50) NOT NULL,
  `pekerjaan_ibu` varchar(220) NOT NULL,
  `penghasilan_ibu` varchar(50) NOT NULL,
  `nama_wali` varchar(225) DEFAULT NULL,
  `nik_wali` varchar(20) DEFAULT NULL,
  `pendidikan_wali` varchar(50) DEFAULT NULL,
  `pekerjaan_wali` varchar(220) DEFAULT NULL,
  `penghasilan_wali` varchar(50) DEFAULT NULL,
  `tinggi_badan` decimal(5,2) NOT NULL,
  `berat_badan` decimal(5,2) NOT NULL,
  `jarak_tempat_tinggal_kesekolah` decimal(5,2) NOT NULL,
  `waktu_tempuh_berangkat_kesekolah` int NOT NULL,
  `jumlah_saudara_kandung` int NOT NULL,
  `is_verified` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `formulir_siswa`
--

INSERT INTO `formulir_siswa` (`id_peserta`, `reg_no`, `tanggal`, `tingkat_kelas`, `program`, `nama_lengkap`, `jenis_kelamin`, `nisn`, `nik`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `dusun`, `kecamatan`, `desa_kelurahan`, `kabupaten_kota`, `rt`, `rw`, `transportasi`, `no_telepon`, `nama_ayah`, `nik_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `penghasilan_ayah`, `nama_ibu`, `nik_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `penghasilan_ibu`, `nama_wali`, `nik_wali`, `pendidikan_wali`, `pekerjaan_wali`, `penghasilan_wali`, `tinggi_badan`, `berat_badan`, `jarak_tempat_tinggal_kesekolah`, `waktu_tempuh_berangkat_kesekolah`, `jumlah_saudara_kandung`, `is_verified`) VALUES
(1, 'REG202511110001', '2025-11-11', 'XI', 'RPL', 'test', 'L', '08879', '111', 'podosugih', '2008-07-25', 'Islam', 'fgszxvzg', 'fasdf', 'qwfa', 'afaF', 'sss', '1', '11', 'Antar Jemput', '0819', 'w', '88782', 'SMP', 'Pedagang', '2.500.001 - 5.000.000', 'www', '7868', 'SMA', '2', '2.500.001 - 5.000.000', '', '', '', '', '', '133.00', '45.00', '12.00', 122, 100, 1),
(2, 'REG202511270002', '2025-11-27', 'XI', 'TITL', 'yanuk', 'L', '986873', '9383', 'bandengan', '2009-01-03', 'Kristen Katolik', 'perumahan bandengan no 50', 'bandengan', 'pekalongan lor', 'ceblung', 'pekalongan', '09', '08', 'Jalan Kaki', '08983', 'slamet santoso', '234', 'S3', 'admnin slot', '> 10.000.000', 'nur hayati', '123123', 'S3', 'model slot', '> 10.000.000', '', '', '', '', '', '165.00', '56.00', '12.00', 20, 100, 1),
(3, 'REG202511270003', '2025-11-27', 'X', 'TKJ', 'arya', 'L', '122', '11', '111', '2008-12-28', 'Islam', 'jl kusbang', 'panjang', 'pu', 'kp', 'pekalongan', '07', '05', 'Sepeda', '0928013', 'ar', '11', 'SMA', '1', '5.000.000 - 10.000.000', '11', '11', 'SMP', '11', '2.500.000 - 5.000.000', '', '', '', '', '', '175.00', '50.00', '1.00', 12, 1, 0),
(4, 'REG202511290004', '2025-11-29', 'XI', 'TKJ', '1', 'L', '1111', '1', '1', '2025-11-06', 'Kristen Katolik', '1', '111', '1', '1', '11', '1', '8', 'Jalan Kaki', '1', '1', '11', 'S2', '1', '2.500.000 - 5.000.000', '1', '1', 'S1', '1', '1.000.000 - 2.500.000', '', '', '', '', '', '1.00', '11.00', '1.00', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(225) DEFAULT NULL,
  `password` varchar(225) DEFAULT NULL,
  `email` varchar(225) DEFAULT NULL,
  `role` enum('admin','user') DEFAULT NULL,
  `id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `email`, `role`, `id`) VALUES
('arya', '1122', 'arya45@gmail.com', 'user', 1),
('admin', 'admin1234', 'admin@gmail.com', 'admin', 3),
('rayhan', '12345', 'rayhanhan2009@gmail.com', 'user', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `formulir_siswa`
--
ALTER TABLE `formulir_siswa`
  ADD PRIMARY KEY (`id_peserta`),
  ADD UNIQUE KEY `reg_no` (`reg_no`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `formulir_siswa`
--
ALTER TABLE `formulir_siswa`
  MODIFY `id_peserta` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
