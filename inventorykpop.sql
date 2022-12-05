-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2022 at 06:24 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory_kpop`
--

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `ID_ALBUM` int(3) NOT NULL,
  `ALBUM_TITTLE` varchar(30) NOT NULL,
  `IDOL_GROUP` varchar(15) NOT NULL,
  `ALBUM_TYPE` varchar(20) NOT NULL,
  `RELEASE_YEAR` varchar(4) NOT NULL,
  `DELETED` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`ID_ALBUM`, `ALBUM_TITTLE`, `IDOL_GROUP`, `ALBUM_TYPE`, `RELEASE_YEAR`, `DELETED`) VALUES
(1, 'GROWL', 'EXO', 'STUDIO ALBUM', '2013', 0),
(2, 'BLACKPINK', 'BLACKPINK', 'REPACKAGE', '2018', 0),
(3, 'YOU MAKE MY DAY', 'SEVENTEEN', 'KIHNO', '2018', 0),
(4, 'I DECIDE', 'IKON', 'MINI ALBUM', '2019', 0),
(5, 'RESONANCE', 'NCT', 'YEARBOOK', '2020', 0),
(6, 'I NEVER DIE', '(G)-IDLE', 'STUDIO ALBUM', '2022', 0),
(7, 'BAMBI', 'EXO', 'SOLO', '2021', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pc`
--

CREATE TABLE `pc` (
  `ID_PC` int(3) NOT NULL,
  `MEMBER` varchar(15) NOT NULL,
  `IDOL_GROUP` varchar(15) NOT NULL,
  `PC_TYPE` varchar(20) NOT NULL,
  `ID_ALBUM` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pc`
--

INSERT INTO `pc` (`ID_PC`, `MEMBER`, `IDOL_GROUP`, `PC_TYPE`, `ID_ALBUM`) VALUES
(1, 'SEHUN', 'EXO', 'RARE', 1),
(2, 'LISA', 'BLACKPINK', 'ALBUM', 2),
(3, 'MINGHAO', 'SEVENTEEN', 'KIHNO', 3),
(4, 'YUNHYONG', 'IKON', 'MPC', 4),
(5, 'MARK LEE', 'NCT', 'YEARBOOK', 5),
(6, 'JAEMIN', 'NCT', 'YEARBOOK', 5),
(7, 'CHANYEOL', 'EXO', 'RARE', 1),
(8, 'YUQI', '(G)-IDLE', 'ALBUM', 6),
(9, 'MINGHYU', 'SEVENTEEN', 'KIHNO', 3),
(10, 'JENNIE', 'BLACKPINK', 'ALBUM', 2),
(11, 'BAEKHYUN', 'EXO', 'SELCA', 7),
(12, 'BAEKHYUN', 'EXO', 'SELCA', 7),
(13, 'JAY', 'IKON', 'MPC', 4),
(14, 'SOYEON', '(G)-IDLE', 'ALBUM', 6);

-- --------------------------------------------------------

--
-- Table structure for table `poster`
--

CREATE TABLE `poster` (
  `ID_POSTER` int(3) NOT NULL,
  `MEMBER` varchar(15) NOT NULL,
  `IDOL_GROUP` varchar(15) NOT NULL,
  `ID_ALBUM` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `poster`
--

INSERT INTO `poster` (`ID_POSTER`, `MEMBER`, `IDOL_GROUP`, `ID_ALBUM`) VALUES
(1, 'KAI', 'EXO', 1),
(2, 'ROSE', 'BLACKPINK', 2),
(3, 'S.COUPS', 'SEVENTEEN', 3),
(4, 'JUNE', 'IKON', 4),
(5, 'CHENLE', 'NCT', 5),
(6, 'MIYEON', '(G)-IDLE', 6),
(7, 'BAEKHYUN', 'EXO', 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`ID_ALBUM`);

--
-- Indexes for table `pc`
--
ALTER TABLE `pc`
  ADD PRIMARY KEY (`ID_PC`),
  ADD KEY `ID_ALBUM` (`ID_ALBUM`);

--
-- Indexes for table `poster`
--
ALTER TABLE `poster`
  ADD PRIMARY KEY (`ID_POSTER`),
  ADD KEY `ID_ALBUM` (`ID_ALBUM`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `ID_ALBUM` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pc`
--
ALTER TABLE `pc`
  MODIFY `ID_PC` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `poster`
--
ALTER TABLE `poster`
  MODIFY `ID_POSTER` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pc`
--
ALTER TABLE `pc`
  ADD CONSTRAINT `ID_ALBUM` FOREIGN KEY (`ID_ALBUM`) REFERENCES `album` (`ID_ALBUM`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
