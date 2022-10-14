-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 14, 2022 at 04:44 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yics_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id_notif` int(11) NOT NULL,
  `sender` varchar(30) NOT NULL,
  `dest` varchar(30) NOT NULL,
  `type` varchar(20) NOT NULL,
  `id_type` int(11) DEFAULT NULL,
  `status` varchar(20) NOT NULL,
  `message` varchar(200) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id_notif`, `sender`, `dest`, `type`, `id_type`, `status`, `message`, `date`) VALUES
(2, 'Admin', 'priana', 'proposal', 1, 'Pending', 'Pesan', '2022-10-14 13:41:45'),
(3, 'Admin', 'priana', 'proposal', 1, 'Pending', 'Proposal akan ditambahkan', '2022-10-14 13:46:10'),
(4, 'Admin', 'priana', 'proposal', 1, 'Pending', 'Proposal akan ditambahkan', '2022-10-14 13:47:00'),
(5, 'Priana', 'Admin', 'proposal', 1, 'Pending', 'Proposal baru telah ditambahkan', '2022-10-14 13:55:15'),
(6, 'priana', '37932', 'proposal', 1, 'Pending', 'Proposal baru telah ditambahkan', '2022-10-14 13:59:52'),
(7, 'priana', '37932', 'proposal', 1, 'Pending', 'Proposal baru telah ditambahkan', '2022-10-14 14:00:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id_notif`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id_notif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
