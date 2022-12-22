-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Des 2022 pada 13.45
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
-- Struktur dari tabel `budget`
--

CREATE TABLE `budget` (
  `id_bud` int(10) NOT NULL,
  `id_dep` int(10) NOT NULL,
  `budget` int(30) NOT NULL,
  `id_fis` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `budget`
--

INSERT INTO `budget` (`id_bud`, `id_dep`, `budget`, `id_fis`) VALUES
(25, 1, 2, 21),
(26, 2, 0, 21),
(27, 3, 0, 21);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_user`
--

CREATE TABLE `data_user` (
  `username` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `area` varchar(100) NOT NULL,
  `pass` char(40) NOT NULL,
  `id_level` int(10) NOT NULL,
  `id_dep` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_user`
--

INSERT INTO `data_user` (`username`, `nama`, `area`, `pass`, `id_level`, `id_dep`) VALUES
('1234', 'GENERAL USER', 'UNDER FRONT # 1 D40D', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1, 2),
('21312', 'SDASD', 'UNDER FRONT # 1 D26A', '6ea2d03eee278427448cb6e698d880818eb2b64b', 1, 1),
('37932', 'ADMIN', 'OFFICE', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 2, 3),
('44131', 'rio', 'obeya', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1, 2),
('707131', 'ANA SUJANA', 'DNA', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 3, 1);

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
  `cost_ia` int(10) NOT NULL,
  `pic_ia` varchar(50) NOT NULL,
  `time_ia` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, '1234', '37932', 'proposal', 1, 'Pending', 'Telah Ditambahkan', '2022-12-09 04:27:19'),
(2, '37932', '1234', 'proposal', 1, 'Pending', 'Telah Diupdate ke Proses BUDGET PLANNING', '2022-12-12 02:19:17'),
(3, '37932', '1234', 'proposal', 1, 'Pending', 'IA dengan nomor : DASDD Telah Ditambahkan', '2022-12-12 02:24:57'),
(4, '37932', '1234', 'proposal', 1, 'Pending', 'IA dengan nomor : fasfafa Telah Ditambahkan', '2022-12-12 02:31:03'),
(5, '37932', '1234', 'proposal', 1, 'Pending', 'Proposal Ditolak', '2022-12-12 02:37:32'),
(6, '1234', '37932', 'proposal', 3, 'Pending', 'Telah Ditambahkan', '2022-12-12 03:00:17'),
(7, '37932', '1234', 'proposal', 3, 'Pending', 'Telah Diupdate ke Proses  QUOTATION', '2022-12-12 03:09:04'),
(8, '37932', '37932', 'proposal', 4, 'Pending', 'Proposal Ditolak', '2022-12-12 03:26:03'),
(9, '37932', '1234', 'proposal', 3, 'Pending', 'Telah Diupdate ke Proses BUDGET PLANNING', '2022-12-12 03:44:32'),
(10, '37932', '1234', 'proposal', 3, 'Pending', 'IA dengan nomor : fdsff Telah Ditambahkan', '2022-12-12 03:44:50'),
(11, '37932', '37932', 'proposal', 4, 'Pending', 'Telah Diupdate ke Proses BUDGET PLANNING', '2022-12-12 03:45:25'),
(12, '37932', '37932', 'proposal', 4, 'Pending', 'IA dengan nomor : nonjn Telah Ditambahkan', '2022-12-12 03:45:52'),
(13, '37932', '37932', 'ia', 4, 'Pending', 'Dengan No IA : nonjn Telah Diupdate Ke Proses SECT HEAD', '2022-12-12 03:54:07'),
(14, '37932', '37932', 'ia', 4, 'Pending', 'Proposal Ditolak', '2022-12-12 03:55:54'),
(15, '1234', '37932', 'proposal', 5, 'Read', 'Telah Ditambahkan', '2022-12-12 09:28:29'),
(16, '37932', '1234', 'proposal', 5, 'Read', 'Proposal Ditolak', '2022-12-12 09:36:53'),
(17, '37932', '1234', 'proposal', 5, 'Read', 'Proposal Ditolak', '2022-12-12 09:41:02'),
(18, '37932', '1234', 'proposal', 5, 'Read', 'Telah Diupdate ke Proses BUDGET PLANNING', '2022-12-12 09:49:48'),
(19, '37932', '1234', 'proposal', 5, 'Pending', 'IA dengan nomor : P4/BDY/IP/07/21/I.4 .04.C-00005 Telah Ditambahkan', '2022-12-12 09:54:13'),
(20, '37932', '1234', 'proposal', 5, 'Pending', 'IA dengan nomor : P4/BDY/IP/09/21/I.4 .04.C-00008 Telah Ditambahkan', '2022-12-12 10:02:47'),
(21, '37932', '1234', 'ia', 5, 'Pending', 'Dengan No IA : P4/BDY/IP/07/21/I.4 .04.C-00005 Telah Diupdate Ke Proses PIC', '2022-12-12 10:30:15'),
(22, '37932', '1234', 'proposal', 5, 'Pending', 'IA dengan nomor : NNSANASKSAMS Telah Ditambahkan', '2022-12-13 02:19:56'),
(23, '37932', '1234', 'ia', 5, 'Pending', 'Dengan No IA : P4/BDY/IP/07/21/I.4 .04.C-00005 Telah Diupdate Ke Proses GR', '2022-12-13 02:25:20'),
(24, '37932', '1234', 'proposal', 5, 'Pending', 'IA dengan nomor : dasda Telah Ditambahkan', '2022-12-14 08:10:23'),
(25, '37932', '1234', 'proposal', 5, 'Pending', 'IA dengan nomor : qwwewqe Telah Ditambahkan', '2022-12-14 08:10:33'),
(26, '37932', '1234', 'proposal', 5, 'Pending', 'IA dengan nomor : weqweqw Telah Ditambahkan', '2022-12-14 08:10:42'),
(27, '37932', '1234', 'proposal', 5, 'Pending', 'IA dengan nomor : jaajwqewq Telah Ditambahkan', '2022-12-14 08:10:57'),
(28, '37932', '1234', 'proposal', 5, 'Pending', 'IA dengan nomor : 321312 Telah Ditambahkan', '2022-12-14 08:11:09'),
(29, '37932', '1234', 'proposal', 5, 'Pending', 'IA dengan nomor : 1229032 Telah Ditambahkan', '2022-12-14 08:11:21'),
(30, '37932', '1234', 'proposal', 5, 'Pending', 'IA dengan nomor : dsdas Telah Ditambahkan', '2022-12-14 08:11:38'),
(31, '37932', '1234', 'ia', 6, 'Pending', 'Dengan No IA : P4/BDY/IP/09/21/I.4 .04.C-00008 Telah Diupdate Ke Proses GR', '2022-12-14 08:13:06'),
(32, '37932', '1234', 'ia', 7, 'Pending', 'Dengan No IA : NNSANASKSAMS Telah Diupdate Ke Proses GR', '2022-12-14 08:15:15'),
(33, '37932', '1234', 'ia', 8, 'Pending', 'IA dengan nomor : dasda Telah Diupdate', '2022-12-14 08:15:39'),
(34, '37932', '1234', 'ia', 9, 'Pending', 'IA dengan nomor : qwwewqe Telah Diupdate', '2022-12-14 08:15:48'),
(35, '37932', '1234', 'ia', 10, 'Pending', 'IA dengan nomor : weqweqw Telah Diupdate', '2022-12-14 08:15:55'),
(36, '37932', '1234', 'ia', 12, 'Pending', 'IA dengan nomor : 321312 Telah Diupdate', '2022-12-14 08:16:05'),
(37, '37932', '1234', 'ia', 11, 'Pending', 'IA dengan nomor : jaajwqewq Telah Diupdate', '2022-12-14 08:16:13'),
(38, '37932', '1234', 'ia', 13, 'Pending', 'IA dengan nomor : 1229032 Telah Diupdate', '2022-12-14 08:16:20'),
(39, '37932', '1234', 'ia', 14, 'Pending', 'IA dengan nomor : dsdas Telah Diupdate', '2022-12-14 08:16:27'),
(40, '37932', '1234', 'ia', 8, 'Pending', 'Dengan No IA : dasda Telah Diupdate Ke Proses GR', '2022-12-14 08:17:17'),
(41, '37932', '1234', 'ia', 9, 'Pending', 'Dengan No IA : qwwewqe Telah Diupdate Ke Proses GR', '2022-12-14 08:23:43'),
(42, '37932', '1234', 'ia', 10, 'Pending', 'Dengan No IA : weqweqw Telah Diupdate Ke Proses GR', '2022-12-14 08:24:37'),
(43, '37932', '1234', 'ia', 11, 'Pending', 'Dengan No IA : jaajwqewq Telah Diupdate Ke Proses GR', '2022-12-14 08:25:40'),
(44, '37932', '1234', 'ia', 12, 'Pending', 'Dengan No IA : 321312 Telah Diupdate Ke Proses GR', '2022-12-14 08:26:37'),
(45, '37932', '1234', 'ia', 13, 'Pending', 'Dengan No IA : 1229032 Telah Diupdate Ke Proses GR', '2022-12-14 08:27:36'),
(46, '37932', '1234', 'ia', 14, 'Pending', 'Dengan No IA : dsdas Telah Diupdate Ke Proses GR', '2022-12-14 08:28:31'),
(47, '37932', '1234', 'proposal', 5, 'Pending', 'IA dengan nomor : fdsfsdf Telah Ditambahkan', '2022-12-14 08:30:09'),
(48, '37932', '1234', 'proposal', 5, 'Pending', 'IA dengan nomor : ddasdas Telah Ditambahkan', '2022-12-14 08:30:19'),
(49, '37932', '1234', 'proposal', 5, 'Pending', 'IA dengan nomor : dsaddas Telah Ditambahkan', '2022-12-14 08:30:28'),
(50, '37932', '1234', 'proposal', 5, 'Pending', 'IA dengan nomor : dsdsad Telah Ditambahkan', '2022-12-14 08:30:36'),
(51, '37932', '1234', 'proposal', 5, 'Pending', 'IA dengan nomor : dasds Telah Ditambahkan', '2022-12-14 08:30:44'),
(52, '37932', '1234', 'ia', 15, 'Pending', 'Dengan No IA : fdsfsdf Telah Diupdate Ke Proses GR', '2022-12-14 08:32:01'),
(53, '37932', '1234', 'ia', 16, 'Pending', 'Dengan No IA : ddasdas Telah Diupdate Ke Proses GR', '2022-12-14 08:34:06'),
(54, '37932', '1234', 'ia', 16, 'Pending', 'Dengan No IA : ddasdas Telah Diupdate Ke Proses GR', '2022-12-14 08:36:49'),
(55, '37932', '1234', 'ia', 17, 'Pending', 'Dengan No IA : dsaddas Telah Diupdate Ke Proses PIC', '2022-12-14 08:43:35'),
(56, '37932', '1234', 'ia', 17, 'Pending', 'Dengan No IA : dsaddas Telah Diupdate Ke Proses GR', '2022-12-14 08:44:20'),
(57, '37932', '1234', 'ia', 18, 'Pending', 'Dengan No IA : dsdsad Telah Diupdate Ke Proses GR', '2022-12-14 08:45:05'),
(58, '37932', '1234', 'ia', 19, 'Pending', 'Dengan No IA : dasds Telah Diupdate Ke Proses GR', '2022-12-14 08:45:50');

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
  `area` varchar(100) NOT NULL,
  `id_dep` int(10) NOT NULL,
  `id_kat` int(10) NOT NULL,
  `proposal` varchar(100) NOT NULL,
  `cost` int(30) NOT NULL,
  `id_fis` int(10) NOT NULL,
  `id_matauang` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `plan_proposal`
--

INSERT INTO `plan_proposal` (`id_prop`, `area`, `id_dep`, `id_kat`, `proposal`, `cost`, `id_fis`, `id_matauang`) VALUES
(3, 'DNA', 1, 1, 'adsdas', 2, 21, 1);

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
  `id_dep` int(10) NOT NULL,
  `id_kat` int(10) NOT NULL,
  `proposal` varchar(100) NOT NULL,
  `benefit` varchar(1000) NOT NULL,
  `cost` int(30) NOT NULL,
  `id_fis` int(10) NOT NULL,
  `lampiran` varchar(255) NOT NULL,
  `id_matauang` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `proposal`
--

INSERT INTO `proposal` (`id_prop`, `username`, `id_dep`, `id_kat`, `proposal`, `benefit`, `cost`, `id_fis`, `lampiran`, `id_matauang`) VALUES
(5, '1234', 1, 1, 'MODIFIKASI JIG UNDER BODY # D26A ', 'PREPARATION TT 1,6 & @', 500, 21, 'hasil print.pdf', 1);

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
(1, 1, 1, 0, '37932', '2023-04-05 09:19:00'),
(6, 3, 1, 1, '37932', '2023-04-01 10:09:00'),
(7, 4, 1, 1, '37932', '2023-04-07 10:26:00'),
(8, 3, 2, 1, '37932', '2023-04-13 10:44:00'),
(9, 3, 3, 1, '37932', '2023-04-13 10:44:00'),
(10, 3, 4, 1, '37932', '2023-04-20 10:44:00'),
(11, 3, 5, 1, '37932', '2023-04-20 10:44:00'),
(12, 4, 2, 1, '37932', '2023-04-15 10:45:00'),
(13, 4, 3, 1, '37932', '2023-04-21 10:45:00'),
(14, 4, 4, 1, '37932', '2023-04-20 10:45:00'),
(15, 4, 5, 1, '37932', '2023-04-19 10:45:00'),
(16, 5, 1, 1, '37932', '2023-04-01 16:36:00'),
(17, 5, 2, 1, '37932', '2023-04-06 16:48:00'),
(18, 5, 3, 1, '37932', '2023-04-22 16:49:00'),
(19, 5, 4, 1, '37932', '2024-03-01 16:49:00'),
(20, 5, 5, 1, '37932', '2023-04-15 16:49:00');

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
,`budget` int(30)
,`status` varchar(20)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_data_user`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_data_user` (
`nama` varchar(50)
,`username` varchar(50)
,`area` varchar(100)
,`pass` char(40)
,`role_name` varchar(50)
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
-- AUTO_INCREMENT untuk tabel `budget`
--
ALTER TABLE `budget`
  MODIFY `id_bud` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

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
  MODIFY `id_ia` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategori_proposal`
--
ALTER TABLE `kategori_proposal`
  MODIFY `id_kat` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
  MODIFY `id_notif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT untuk tabel `pic`
--
ALTER TABLE `pic`
  MODIFY `id_pic` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `plan_proposal`
--
ALTER TABLE `plan_proposal`
  MODIFY `id_prop` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id_trackia` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tracking_prop`
--
ALTER TABLE `tracking_prop`
  MODIFY `id_trackprop` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id_role` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
