-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Jan 2023 pada 11.41
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 7.4.30

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
-- Struktur dari tabel `approval`
--

CREATE TABLE `approval` (
  `id_approval` int(10) NOT NULL,
  `approval` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `approval`
--

INSERT INTO `approval` (`id_approval`, `approval`) VALUES
(0, 'REJECT'),
(1, 'APPROVE');

-- --------------------------------------------------------

--
-- Struktur dari tabel `area`
--

CREATE TABLE `area` (
  `id_area` int(10) NOT NULL,
  `id_dep` int(10) NOT NULL,
  `area` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `area`
--

INSERT INTO `area` (`id_area`, `id_dep`, `area`) VALUES
(2, 2, 'under body pick up'),
(3, 3, 'obeya'),
(4, 2, 'UNDER FRONT  D40D'),
(5, 1, 'under body # d26a');

-- --------------------------------------------------------

--
-- Struktur dari tabel `budget`
--

CREATE TABLE `budget` (
  `id_bud` int(10) NOT NULL,
  `id_dep` int(10) NOT NULL,
  `budget` decimal(30,2) NOT NULL,
  `id_fis` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `budget`
--

INSERT INTO `budget` (`id_bud`, `id_dep`, `budget`, `id_fis`) VALUES
(1, 1, '0.00', 21),
(2, 2, '2.00', 21),
(3, 3, '0.00', 21);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_user`
--

CREATE TABLE `data_user` (
  `username` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `id_area` int(10) NOT NULL,
  `pass` char(40) NOT NULL,
  `id_level` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_user`
--

INSERT INTO `data_user` (`username`, `nama`, `id_area`, `pass`, `id_level`) VALUES
('1234', 'DEddy', 2, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1),
('37932', 'efendi', 3, 'bea8ed4d790d7df42ab78ad2ae59c6e7ba1e893b', 2),
('44131', 'rio setiawan judeen', 3, 'bea8ed4d790d7df42ab78ad2ae59c6e7ba1e893b', 2),
('67252', 'JEPRI DANI PRATAMA', 3, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `depart`
--

CREATE TABLE `depart` (
  `id_dep` int(11) NOT NULL,
  `depart` varchar(50) NOT NULL,
  `id_div` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `depart`
--

INSERT INTO `depart` (`id_dep`, `depart`, `id_div`) VALUES
(1, 'BODY PLANT 1', 1),
(2, 'BODY PLANT 2', 1),
(3, 'BQC', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `division`
--

CREATE TABLE `division` (
  `id_div` int(10) NOT NULL,
  `divisi` varchar(40) NOT NULL,
  `id_company` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `division`
--

INSERT INTO `division` (`id_div`, `divisi`, `id_company`) VALUES
(1, 'BODY DIVISION', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ia`
--

CREATE TABLE `ia` (
  `id_ia` int(10) NOT NULL,
  `id_prop` int(10) NOT NULL,
  `ia` varchar(50) NOT NULL,
  `deskripsi` varchar(100) NOT NULL,
  `cost_ia` decimal(30,2) NOT NULL,
  `pic_ia` varchar(50) NOT NULL,
  `time_ia` date NOT NULL DEFAULT current_timestamp(),
  `validuntil` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ia`
--

INSERT INTO `ia` (`id_ia`, `id_prop`, `ia`, `deskripsi`, `cost_ia`, `pic_ia`, `time_ia`, `validuntil`) VALUES
(4, 1, 'dsdsa', 'dsdas', '0.00', '37932', '2023-04-04', '2024-03-31'),
(5, 1, 'dsd', 'dgsdg', '2.00', '37932', '2023-04-09', '2024-03-31'),
(6, 7, 'dasdas', 'dasdas', '34.00', ' 37932', '2023-04-13', '2024-03-31'),
(7, 7, 'sdsaas', 'dsdsa', '23.00', ' 37932', '2023-04-19', '2024-03-31'),
(8, 3, 'dsdsa', '', '30.00', ' 37932', '2023-04-05', '2024-03-31'),
(9, 3, 'sdsad', 'sssd', '20.00', ' 37932', '2023-04-14', '2024-03-31'),
(15, 5, 'dgfdgfd', 'gfdgfd', '43.00', '37932', '2023-04-19', '2024-03-31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_proposal`
--

CREATE TABLE `kategori_proposal` (
  `id_kat` int(10) NOT NULL,
  `kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori_proposal`
--

INSERT INTO `kategori_proposal` (`id_kat`, `kategori`) VALUES
(1, 'IMPROVEMENT'),
(2, 'REPLACEMENT'),
(3, 'OTHER');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keterangan_progress`
--

CREATE TABLE `keterangan_progress` (
  `id_ket` int(10) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `step` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `keterangan_progress`
--

INSERT INTO `keterangan_progress` (`id_ket`, `keterangan`, `step`) VALUES
(1, 'RSS / RFN', 1),
(2, 'BPE', 2),
(3, 'PR', 3),
(4, 'PO', 4),
(5, 'GR', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `konversi_matauang`
--

CREATE TABLE `konversi_matauang` (
  `id_matauang` int(10) NOT NULL,
  `rupiah` int(10) NOT NULL,
  `yen` varchar(50) NOT NULL,
  `dollar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `konversi_matauang`
--

INSERT INTO `konversi_matauang` (`id_matauang`, `rupiah`, `yen`, `dollar`) VALUES
(1, 1, '105', '15500');

-- --------------------------------------------------------

--
-- Struktur dari tabel `notifications`
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
-- Dumping data untuk tabel `notifications`
--

INSERT INTO `notifications` (`id_notif`, `sender`, `dest`, `type`, `id_type`, `status`, `message`, `date`) VALUES
(1, '1234', '37932', 'proposal', 1, 'Read', 'Telah Ditambahkan', '2023-01-09 06:13:21'),
(2, '37932', '1234', 'proposal', 1, 'Pending', 'Proposal Ditolak', '2023-01-09 06:36:34'),
(3, '37932', '1234', 'proposal', 1, 'Pending', 'Telah Diupdate ke Proses BUDGET PLANNING', '2023-01-09 06:40:01'),
(4, '37932', '21312', 'proposal', 1, 'Pending', 'IA dengan nomor : P4/BDY/IP/07/21/I.4 .04.C-00005 Telah Ditambahkan', '2023-01-09 06:58:13'),
(5, '37932', '21312', 'proposal', 1, 'Pending', 'IA dengan nomor : P4/BDY/IP/11/21/I.4 .04.C-00011 Telah Ditambahkan', '2023-01-09 07:01:27'),
(6, '37932', '21312', 'proposal', 1, 'Pending', 'IA dengan nomor : P4/BDY/IP/07/21/I.4 .04.C-00004 Telah Ditambahkan', '2023-01-09 07:02:40'),
(7, '37932', '21312', 'proposal', 1, 'Pending', 'IA dengan nomor : P4/BDY/IP/07/21/I.4 .04.C-00004 Telah Dihapus', '2023-01-09 07:03:13'),
(8, '37932', '21312', 'proposal', 1, 'Pending', 'IA dengan nomor : eeeee Telah Ditambahkan', '2023-01-09 07:03:51'),
(9, '37932', '21312', 'proposal', 1, 'Pending', 'IA dengan nomor : dsda Telah Ditambahkan', '2023-01-09 07:25:26'),
(10, '37932', '21312', 'proposal', 1, 'Pending', 'IA dengan nomor : dfdf Telah Ditambahkan', '2023-01-09 07:28:53'),
(11, '37932', '21312', 'proposal', 1, 'Pending', 'IA dengan nomor : dfdf Telah Dihapus', '2023-01-09 07:29:41'),
(12, '37932', '37932', 'proposal', 4, 'Pending', 'Proposal Ditolak', '2023-01-09 10:55:13'),
(13, '37932', '37932', 'proposal', 4, 'Pending', 'Proposal Ditolak', '2023-01-09 10:55:54'),
(14, '37932', '37932', 'proposal', 4, 'Pending', 'Proposal Ditolak', '2023-01-09 11:10:00'),
(15, '37932', '21312', 'ia', 5, 'Pending', 'Proposal Ditolak', '2023-01-09 11:54:48'),
(16, '37932', '37932', 'proposal', 5, 'Pending', 'Proposal Ditolak', '2023-01-09 12:33:14'),
(17, '37932', '21312', 'ia', 5, 'Pending', 'Proposal Ditolak', '2023-01-10 02:09:39'),
(18, '37932', '21312', 'ia', 4, 'Pending', 'Dengan No IA : eeeee Telah Diupdate Ke Proses PIC', '2023-01-10 02:31:45'),
(19, '37932', '21312', 'ia', 1, 'Pending', 'Proposal Ditolak', '2023-01-10 02:33:24'),
(20, '37932', '707131', 'ia', 4, 'Pending', 'Proposal Ditolak', '2023-01-10 04:40:02'),
(21, '37932', '707131', 'ia', 4, 'Pending', 'Dengan No IA : eeeee Telah Diupdate Ke Proses PIC', '2023-01-10 04:49:06'),
(22, '37932', '707131', 'ia', 4, 'Pending', 'Dengan No IA : eeeee Telah Diupdate Ke Proses DEPT HEAD', '2023-01-10 04:49:15'),
(23, '37932', '707131', 'ia', 1, 'Pending', 'Dengan No IA : P4/BDY/IP/07/21/I.4 .04.C-00005 Telah Diupdate Ke Proses PIC', '2023-01-10 06:40:57'),
(24, '37932', '707131', 'proposal', 1, 'Pending', 'IA dengan nomor : dsfdss Telah Ditambahkan', '2023-01-11 09:39:29'),
(25, '37932', '707131', 'proposal', 1, 'Pending', 'IA dengan nomor : dsfdss Telah Dihapus', '2023-01-11 09:43:09'),
(26, '37932', '707131', 'proposal', 1, 'Pending', 'IA dengan nomor : fdf Telah Ditambahkan', '2023-01-11 09:46:38'),
(27, '37932', '707131', 'proposal', 1, 'Pending', 'IA dengan nomor : sffd Telah Ditambahkan', '2023-01-11 10:43:41'),
(28, '37932', '707131', 'proposal', 1, 'Pending', 'IA dengan nomor : fdsfsd Telah Ditambahkan', '2023-01-11 10:44:27'),
(29, '37932', '707131', 'proposal', 1, 'Pending', 'IA dengan nomor : dsadas Telah Ditambahkan', '2023-01-11 11:12:12'),
(30, '37932', '707131', 'proposal', 1, 'Pending', 'IA dengan nomor : dsdsa Telah Ditambahkan', '2023-01-11 11:33:47'),
(31, '37932', '707131', 'proposal', 1, 'Pending', 'IA dengan nomor : dsd Telah Ditambahkan', '2023-01-11 11:34:39'),
(32, '37932', '707131', 'ia', 5, 'Pending', 'Proposal Ditolak', '2023-01-11 11:43:56'),
(33, '37932', '707131', 'ia', 4, 'Pending', 'Proposal Ditolak', '2023-01-11 12:07:35'),
(34, '37932', '', 'ia', 4, 'Pending', 'IA dengan nomor : dsdsa Telah Diupdate', '2023-01-11 14:41:11'),
(35, '37932', '707131', 'ia', 4, 'Pending', 'Dengan No IA : dsdsa Telah Diupdate Ke Proses TAGGING', '2023-01-11 14:45:10'),
(36, '37932', '1234', 'proposal', 7, 'Pending', 'IA dengan nomor : dasdas Telah Ditambahkan', '2023-01-11 15:11:03'),
(37, '37932', '1234', 'proposal', 7, 'Pending', 'IA dengan nomor : sdsaas Telah Ditambahkan', '2023-01-11 15:11:25'),
(38, '37932', '1234', 'proposal', 3, 'Pending', 'IA dengan nomor : sdsad Telah Ditambahkan', '2023-01-11 15:12:37'),
(39, '37932', '21312', 'proposal', 5, 'Pending', 'IA dengan nomor : dasdsad Telah Ditambahkan', '2023-01-11 17:23:46'),
(40, '37932', '21312', 'proposal', 5, 'Pending', 'IA dengan nomor : ggsdgs Telah Ditambahkan', '2023-01-11 17:23:56'),
(41, '37932', '21312', 'proposal', 5, 'Pending', 'IA dengan nomor : gfdgfdgd Telah Ditambahkan', '2023-01-11 17:24:09'),
(42, '37932', '21312', 'proposal', 5, 'Pending', 'IA dengan nomor : fefw Telah Ditambahkan', '2023-01-11 17:24:32'),
(43, '37932', '21312', 'proposal', 6, 'Pending', 'IA dengan nomor : dsdgsg Telah Ditambahkan', '2023-01-11 17:26:41'),
(44, '37932', '21312', 'proposal', 5, 'Pending', 'IA dengan nomor : dgfdgfd Telah Ditambahkan', '2023-01-11 17:40:15'),
(45, '37932', '707131', 'ia', 4, 'Pending', 'Proposal Ditolak', '2023-01-12 01:26:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `notif_ia_rjct`
--

CREATE TABLE `notif_ia_rjct` (
  `id` int(10) NOT NULL,
  `id_prop` int(10) NOT NULL,
  `id_ia` int(10) NOT NULL,
  `reason` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `notif_ia_rjct`
--

INSERT INTO `notif_ia_rjct` (`id`, `id_prop`, `id_ia`, `reason`) VALUES
(11, 1, 4, 'lo gak diajak men');

-- --------------------------------------------------------

--
-- Struktur dari tabel `notif_prop_rjct`
--

CREATE TABLE `notif_prop_rjct` (
  `id` int(10) NOT NULL,
  `id_prop` int(10) NOT NULL,
  `reason` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `notif_prop_rjct`
--

INSERT INTO `notif_prop_rjct` (`id`, `id_prop`, `reason`) VALUES
(4, 5, 'ana emng iya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pic`
--

CREATE TABLE `pic` (
  `id_pic` int(10) NOT NULL,
  `pic` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pic`
--

INSERT INTO `pic` (`id_pic`, `pic`) VALUES
(1, 'M.EFFENDI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `plan_proposal`
--

CREATE TABLE `plan_proposal` (
  `id_prop` int(10) NOT NULL,
  `id_area` int(10) NOT NULL,
  `id_dep` int(10) NOT NULL,
  `id_kat` int(10) NOT NULL,
  `proposal` varchar(100) NOT NULL,
  `cost` decimal(30,2) NOT NULL,
  `id_fis` int(10) NOT NULL,
  `id_matauang` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `plan_proposal`
--

INSERT INTO `plan_proposal` (`id_prop`, `id_area`, `id_dep`, `id_kat`, `proposal`, `cost`, `id_fis`, `id_matauang`) VALUES
(8, 2, 2, 1, 'adsdas', '2.00', 21, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `progress`
--

CREATE TABLE `progress` (
  `id_prog` int(10) NOT NULL,
  `nama_progress` varchar(50) NOT NULL,
  `step` int(10) NOT NULL,
  `id_ket` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `progress`
--

INSERT INTO `progress` (`id_prog`, `nama_progress`, `step`, `id_ket`) VALUES
(1, ' QUOTATION', 1, 1),
(2, 'ASSIGNMENT', 2, 1),
(3, 'REQUEST FOR NEGOISASI', 3, 1),
(4, 'PRICE CONFIRMATION', 4, 1),
(5, 'BUDGET PLANNING', 5, 1),
(6, 'PIC', 6, 2),
(7, 'DEPT HEAD', 7, 2),
(8, 'TAGGING', 8, 2),
(9, 'MAXIMO', 9, 2),
(10, 'DIV HEAD (INA)', 10, 2),
(11, 'DIV HEAD (JPN)', 11, 2),
(12, 'DIR (INA)', 12, 2),
(13, 'DIR (JPN)', 13, 2),
(14, 'BUDGET (INA)', 14, 2),
(15, 'BUDGET (JPN)', 15, 2),
(16, 'FIN (INA)', 16, 2),
(17, 'FIN  (JPN)', 17, 2),
(18, 'VPD', 18, 2),
(19, 'PD', 19, 2),
(20, 'IO', 20, 2),
(21, 'AMCF', 21, 3),
(22, 'PR', 22, 3),
(23, 'PO', 23, 4),
(24, 'SEND PO', 24, 4),
(25, 'GR', 25, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `proposal`
--

CREATE TABLE `proposal` (
  `id_prop` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `hp` varchar(15) NOT NULL,
  `id_dep` int(10) NOT NULL,
  `id_kat` int(10) NOT NULL,
  `proposal` varchar(100) NOT NULL,
  `benefit` varchar(1000) NOT NULL,
  `cost` decimal(30,2) NOT NULL,
  `id_fis` int(10) NOT NULL,
  `lampiran` varchar(255) NOT NULL,
  `id_matauang` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `proposal`
--

INSERT INTO `proposal` (`id_prop`, `username`, `hp`, `id_dep`, `id_kat`, `proposal`, `benefit`, `cost`, `id_fis`, `lampiran`, `id_matauang`) VALUES
(4, '37932', '081315065760', 2, 2, 'hasan ganteng', 'hasans gantenf', '200.00', 21, '8a3f5494-7b52-4a7e-af39-2523dfbe8178.jpg', 1),
(5, '37932', '08135065760', 1, 1, 'salksalk', 'hasalsadasd  asdlasl', '200.00', 21, '8a3f5494-7b52-4a7e-af39-2523dfbe8178.jpg', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `status`
--

CREATE TABLE `status` (
  `id_status` int(10) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `status`
--

INSERT INTO `status` (`id_status`, `status`) VALUES
(1, 'AKTIF'),
(2, 'TIDAK AKTIF');

-- --------------------------------------------------------

--
-- Struktur dari tabel `time_fiscal`
--

CREATE TABLE `time_fiscal` (
  `id_fis` int(11) NOT NULL,
  `periode` int(10) NOT NULL,
  `awal` date NOT NULL,
  `akhir` date NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `time_fiscal`
--

INSERT INTO `time_fiscal` (`id_fis`, `periode`, `awal`, `akhir`, `status`) VALUES
(21, 2023, '2023-04-01', '2024-03-31', 'AKTIF'),
(22, 2022, '2022-04-01', '2023-03-31', 'TIDAK AKTIF');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tracking_ia`
--

CREATE TABLE `tracking_ia` (
  `id_trackia` int(10) NOT NULL,
  `id_ia` int(10) NOT NULL,
  `id_prog` int(10) NOT NULL,
  `approval` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tracking_ia`
--

INSERT INTO `tracking_ia` (`id_trackia`, `id_ia`, `id_prog`, `approval`, `username`, `time`) VALUES
(1, 5, 6, 0, '37932', '2023-04-13 11:54:00'),
(2, 4, 6, 1, '37932', '2023-04-18 02:31:00'),
(3, 1, 6, 1, '37932', '2023-04-19 02:33:00'),
(4, 4, 7, 1, '37932', '2023-04-13 04:49:00'),
(5, 4, 8, 1, '37932', '2023-04-18 12:07:00'),
(6, 4, 9, 0, '37932', '2023-04-08 01:26:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tracking_prop`
--

CREATE TABLE `tracking_prop` (
  `id_trackprop` int(10) NOT NULL,
  `id_prop` int(10) NOT NULL,
  `id_prog` int(10) NOT NULL,
  `id_approval` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tracking_prop`
--

INSERT INTO `tracking_prop` (`id_trackprop`, `id_prop`, `id_prog`, `id_approval`, `username`, `time`) VALUES
(1, 1, 1, 1, '37932', '2023-04-07 13:36:00'),
(2, 1, 2, 1, '37932', '2023-04-25 13:39:00'),
(3, 1, 3, 1, '37932', '2023-04-27 13:39:00'),
(4, 1, 4, 1, '37932', '2023-04-20 13:39:00'),
(5, 1, 5, 1, '37932', '2023-04-06 13:39:00'),
(6, 4, 1, 0, '37932', '2023-04-05 17:55:00'),
(7, 5, 1, 0, '37932', '2023-04-07 19:33:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id_role` int(10) NOT NULL,
  `role_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id_role`, `role_name`) VALUES
(1, 'GENERAL USER'),
(2, 'ADMINISTRATOR'),
(3, 'SUPERVISOR');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_alokasi_budget`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_alokasi_budget` (
`id_bud` int(10)
,`periode` int(10)
,`awal` date
,`akhir` date
,`depart` varchar(50)
,`budget` decimal(30,2)
,`status` varchar(20)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_data_user`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_data_user` (
);

-- --------------------------------------------------------

--
-- Struktur untuk view `view_alokasi_budget`
--
DROP TABLE IF EXISTS `view_alokasi_budget`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_alokasi_budget`  AS SELECT `budget`.`id_bud` AS `id_bud`, `time_fiscal`.`periode` AS `periode`, `time_fiscal`.`awal` AS `awal`, `time_fiscal`.`akhir` AS `akhir`, `depart`.`depart` AS `depart`, `budget`.`budget` AS `budget`, `time_fiscal`.`status` AS `status` FROM ((`budget` left join `depart` on(`budget`.`id_dep` = `depart`.`id_dep`)) left join `time_fiscal` on(`budget`.`id_fis` = `time_fiscal`.`id_fis`))  ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_data_user`
--
DROP TABLE IF EXISTS `view_data_user`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_data_user`  AS SELECT `data_user`.`nama` AS `nama`, `data_user`.`username` AS `username`, `data_user`.`area` AS `area`, `data_user`.`pass` AS `pass`, `user_role`.`role_name` AS `role_name` FROM (`data_user` join `user_role` on(`data_user`.`id_level` = `user_role`.`id_role`))  ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `approval`
--
ALTER TABLE `approval`
  ADD PRIMARY KEY (`id_approval`);

--
-- Indeks untuk tabel `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id_area`);

--
-- Indeks untuk tabel `budget`
--
ALTER TABLE `budget`
  ADD PRIMARY KEY (`id_bud`);

--
-- Indeks untuk tabel `data_user`
--
ALTER TABLE `data_user`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `depart`
--
ALTER TABLE `depart`
  ADD PRIMARY KEY (`id_dep`);

--
-- Indeks untuk tabel `division`
--
ALTER TABLE `division`
  ADD PRIMARY KEY (`id_div`);

--
-- Indeks untuk tabel `ia`
--
ALTER TABLE `ia`
  ADD PRIMARY KEY (`id_ia`);

--
-- Indeks untuk tabel `kategori_proposal`
--
ALTER TABLE `kategori_proposal`
  ADD PRIMARY KEY (`id_kat`);

--
-- Indeks untuk tabel `keterangan_progress`
--
ALTER TABLE `keterangan_progress`
  ADD PRIMARY KEY (`id_ket`);

--
-- Indeks untuk tabel `konversi_matauang`
--
ALTER TABLE `konversi_matauang`
  ADD PRIMARY KEY (`id_matauang`);

--
-- Indeks untuk tabel `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id_notif`);

--
-- Indeks untuk tabel `notif_ia_rjct`
--
ALTER TABLE `notif_ia_rjct`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `notif_prop_rjct`
--
ALTER TABLE `notif_prop_rjct`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pic`
--
ALTER TABLE `pic`
  ADD PRIMARY KEY (`id_pic`);

--
-- Indeks untuk tabel `plan_proposal`
--
ALTER TABLE `plan_proposal`
  ADD PRIMARY KEY (`id_prop`);

--
-- Indeks untuk tabel `progress`
--
ALTER TABLE `progress`
  ADD PRIMARY KEY (`id_prog`);

--
-- Indeks untuk tabel `proposal`
--
ALTER TABLE `proposal`
  ADD PRIMARY KEY (`id_prop`);

--
-- Indeks untuk tabel `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indeks untuk tabel `time_fiscal`
--
ALTER TABLE `time_fiscal`
  ADD PRIMARY KEY (`id_fis`) USING BTREE;

--
-- Indeks untuk tabel `tracking_ia`
--
ALTER TABLE `tracking_ia`
  ADD PRIMARY KEY (`id_trackia`);

--
-- Indeks untuk tabel `tracking_prop`
--
ALTER TABLE `tracking_prop`
  ADD PRIMARY KEY (`id_trackprop`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id_role`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `approval`
--
ALTER TABLE `approval`
  MODIFY `id_approval` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `area`
--
ALTER TABLE `area`
  MODIFY `id_area` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `budget`
--
ALTER TABLE `budget`
  MODIFY `id_bud` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `depart`
--
ALTER TABLE `depart`
  MODIFY `id_dep` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `division`
--
ALTER TABLE `division`
  MODIFY `id_div` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `ia`
--
ALTER TABLE `ia`
  MODIFY `id_ia` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `kategori_proposal`
--
ALTER TABLE `kategori_proposal`
  MODIFY `id_kat` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `keterangan_progress`
--
ALTER TABLE `keterangan_progress`
  MODIFY `id_ket` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `konversi_matauang`
--
ALTER TABLE `konversi_matauang`
  MODIFY `id_matauang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id_notif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `notif_ia_rjct`
--
ALTER TABLE `notif_ia_rjct`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `notif_prop_rjct`
--
ALTER TABLE `notif_prop_rjct`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pic`
--
ALTER TABLE `pic`
  MODIFY `id_pic` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `plan_proposal`
--
ALTER TABLE `plan_proposal`
  MODIFY `id_prop` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `progress`
--
ALTER TABLE `progress`
  MODIFY `id_prog` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `proposal`
--
ALTER TABLE `proposal`
  MODIFY `id_prop` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `status`
--
ALTER TABLE `status`
  MODIFY `id_status` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `time_fiscal`
--
ALTER TABLE `time_fiscal`
  MODIFY `id_fis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `tracking_ia`
--
ALTER TABLE `tracking_ia`
  MODIFY `id_trackia` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tracking_prop`
--
ALTER TABLE `tracking_prop`
  MODIFY `id_trackprop` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id_role` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
