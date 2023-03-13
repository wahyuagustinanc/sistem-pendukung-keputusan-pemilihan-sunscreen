-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2022 at 04:10 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_skincare`
--

-- --------------------------------------------------------

--
-- Table structure for table `tab_alternatif`
--

CREATE TABLE `tab_alternatif` (
  `id_alternatif` varchar(10) NOT NULL,
  `nama_alternatif` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tab_alternatif`
--

INSERT INTO `tab_alternatif` (`id_alternatif`, `nama_alternatif`) VALUES
('A1', 'Wardah UV Shield Aqua Fresh Essence 30ml'),
('A2', 'Garnier Bright Complete Super UV Spot Proof matte '),
('A3', 'Azarine Hydramax-C Sunscreen Serum 40ml'),
('A4', 'Biore UV Aqua Rich Watery Essence 50gr'),
('A5', 'Skintific 5X Ceramide Serum Sunscreen 30ml'),
('A6', 'Somethinc Holyshield! UV Watery Sunscreen Gel 15ml'),
('A7', 'Madame Gie Madame Protect Me Sunscreen 35ml'),
('A8', 'Skin Aqua UV Whitening Milk 40gr'),
('A9', 'Hanasui Perfect Shield Sunscreen 30ml'),
('AB1', 'N\'Pure Cica Beat The Sun 35ml');

-- --------------------------------------------------------

--
-- Table structure for table `tab_kriteria`
--

CREATE TABLE `tab_kriteria` (
  `id_kriteria` varchar(10) NOT NULL,
  `nama_kriteria` varchar(50) NOT NULL,
  `bobot` float NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tab_kriteria`
--

INSERT INTO `tab_kriteria` (`id_kriteria`, `nama_kriteria`, `bobot`, `status`) VALUES
('C1', 'Harga', 4, 'Cost'),
('C2', 'Kualitas/rating', 4, 'Benefit'),
('C3', 'Jenis kulit', 5, 'Benefit');

-- --------------------------------------------------------

--
-- Table structure for table `tab_topsis`
--

CREATE TABLE `tab_topsis` (
  `id_alternatif` varchar(10) NOT NULL,
  `id_kriteria` varchar(10) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tab_topsis`
--

INSERT INTO `tab_topsis` (`id_alternatif`, `id_kriteria`, `nilai`) VALUES
('A1', 'C1', 4),
('A1', 'C2', 5),
('A1', 'C3', 5),
('A2', 'C1', 4),
('A2', 'C2', 1),
('A2', 'C3', 5),
('A3', 'C1', 4),
('A3', 'C2', 5),
('A3', 'C3', 5),
('A4', 'C1', 2),
('A4', 'C2', 1),
('A4', 'C3', 5),
('A5', 'C1', 1),
('A5', 'C2', 1),
('A5', 'C3', 5),
('A6', 'C1', 5),
('A6', 'C2', 5),
('A6', 'C3', 5),
('A7', 'C1', 4),
('A7', 'C2', 5),
('A7', 'C3', 5),
('A8', 'C1', 4),
('A8', 'C2', 5),
('A8', 'C3', 5),
('A9', 'C1', 5),
('A9', 'C2', 5),
('A9', 'C3', 5),
('AB1', 'C1', 3),
('AB1', 'C2', 5),
('AB1', 'C3', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tab_user`
--

CREATE TABLE `tab_user` (
  `id` int(11) NOT NULL,
  `uname` varchar(8) NOT NULL,
  `upass` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tab_user`
--

INSERT INTO `tab_user` (`id`, `uname`, `upass`) VALUES
(1, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tab_alternatif`
--
ALTER TABLE `tab_alternatif`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indexes for table `tab_kriteria`
--
ALTER TABLE `tab_kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `tab_topsis`
--
ALTER TABLE `tab_topsis`
  ADD PRIMARY KEY (`id_alternatif`,`id_kriteria`),
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- Indexes for table `tab_user`
--
ALTER TABLE `tab_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tab_user`
--
ALTER TABLE `tab_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tab_alternatif`
--
ALTER TABLE `tab_alternatif`
  ADD CONSTRAINT `tab_alternatif_ibfk_1` FOREIGN KEY (`id_alternatif`) REFERENCES `tab_topsis` (`id_alternatif`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tab_topsis`
--
ALTER TABLE `tab_topsis`
  ADD CONSTRAINT `tab_topsis_ibfk_1` FOREIGN KEY (`id_kriteria`) REFERENCES `tab_kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
