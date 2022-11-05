-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Nov 2022 pada 10.53
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.3.23

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
(45, 1, 1000, 16),
(46, 2, 2000, 16),
(47, 3, 5000, 16),
(48, 1, 1000, 17),
(49, 2, 2000, 17),
(50, 3, 3000, 17),
(51, 1, 2000, 18),
(52, 2, 2000, 18),
(53, 3, 3000, 18);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_user`
--

CREATE TABLE `data_user` (
  `username` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `area` varchar(50) NOT NULL,
  `pass` char(40) NOT NULL,
  `id_level` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_user`
--

INSERT INTO `data_user` (`username`, `nama`, `area`, `pass`, `id_level`) VALUES
('1234', 'GENERAL USER', 'UNDER FRONT # 1', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1),
('37932', 'ADMIN', 'OFFICE', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 2),
('707131', 'ANA SUJANA', 'DNA', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 3);

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

--
-- Dumping data untuk tabel `ia`
--

INSERT INTO `ia` (`id_ia`, `id_prop`, `ia`, `deskripsi`, `cost_ia`, `pic_ia`, `time_ia`) VALUES
(40, 52, 'eeeeeee', 'ssssss', 1, '37932', '2022-11-04'),
(41, 52, '22222222', 'rrrrrr', 222222, '37932', '2022-11-04'),
(42, 52, 'TES', 'TES', 930, '37932', '2022-11-11');

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
(1, 'PLANNING', 1),
(2, 'RSS', 2),
(3, 'BP', 3),
(4, 'PR', 4),
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
(1, 1, '105', '15000');

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
(2, 'Admin', 'priana', 'proposal', 1, 'Pending', 'Pesan', '2022-10-14 13:41:45'),
(3, 'Admin', 'priana', 'proposal', 1, 'Pending', 'Proposal akan ditambahkan', '2022-10-14 13:46:10'),
(4, 'Admin', 'priana', 'proposal', 1, 'Pending', 'Proposal akan ditambahkan', '2022-10-14 13:47:00'),
(5, 'Priana', 'Admin', 'proposal', 1, 'Pending', 'Proposal baru telah ditambahkan', '2022-10-14 13:55:15'),
(6, 'priana', '37932', 'proposal', 1, 'Pending', 'Proposal baru telah ditambahkan', '2022-10-14 13:59:52'),
(7, 'priana', '37932', 'proposal', 1, 'Pending', 'Proposal baru telah ditambahkan', '2022-10-14 14:00:56'),
(8, '37932', '37932', 'proposal', 1, 'Pending', 'Proposal baru telah ditambahkan', '2022-10-15 00:51:15'),
(9, '37932', '37932', 'proposal', 1, 'Pending', 'Proposal baru telah ditambahkan', '2022-10-15 07:21:50'),
(10, '37932', '37932', 'proposal', 1, 'Pending', 'Proposal baru telah ditambahkan', '2022-10-15 07:22:48'),
(11, '37932', '37932', 'proposal', 1, 'Pending', 'Proposal baru telah ditambahkan', '2022-10-15 07:25:22'),
(12, '37932', '37932', 'proposal', 1, 'Pending', 'Proposal baru telah ditambahkan', '2022-10-15 07:25:45'),
(13, '1234', '37932', 'proposal', 45, 'Read', 'Menambahkan proposal baru', '2022-10-17 09:50:10'),
(14, '1234', '37932', 'proposal', 46, 'Read', 'Menambahkan proposal baru', '2022-10-17 13:29:09'),
(15, '1234', '37932', 'proposal', 47, 'Pending', 'Menambahkan proposal baru', '2022-10-18 14:19:53'),
(16, '1234', '37932', 'proposal', 48, 'Pending', 'Menambahkan proposal baru', '2022-10-18 14:23:54'),
(17, '37932', '37932', 'proposal', 49, 'Read', 'Proposal Masuk Tahap 5', '2022-10-21 14:08:39'),
(18, '1234', '37932', 'proposal', 51, 'Pending', 'Menambahkan proposal baru', '2022-10-22 04:13:53'),
(19, '1234', '37932', 'proposal', 52, 'Read', 'Menambahkan proposal baru', '2022-10-22 04:17:48'),
(20, '1234', '37932', 'proposal', 53, 'Read', 'Menambahkan proposal baru', '2022-10-22 06:00:59'),
(21, '37932', '1234', 'proposal', 53, 'Pending', 'Proposal Masuk Tahap 3', '2022-10-22 06:49:37'),
(22, '37932', '37932', 'proposal', 50, 'Read', 'Proposal Masuk Tahap 5', '2022-10-22 08:15:35'),
(23, '37932', '37932', 'proposal', 54, 'Read', 'Proposal Masuk Tahap 1', '2022-10-26 04:22:38'),
(24, '37932', '37932', 'proposal', 54, 'Read', 'Proposal Masuk Tahap 5', '2022-11-01 02:39:45'),
(25, '37932', '1234', 'proposal', 53, 'Pending', 'Proposal Masuk Tahap 5', '2022-11-02 13:58:33'),
(26, '37932', '1234', 'proposal', 52, 'Pending', 'Proposal Masuk Tahap 5', '2022-11-03 02:09:27'),
(27, '37932', '37932', 'proposal', 50, 'Pending', 'Proposal Masuk Tahap 5', '2022-11-03 07:07:59'),
(28, '37932', '37932', 'proposal', 55, 'Pending', 'Proposal Masuk Tahap 5', '2022-11-03 07:34:18'),
(29, '37932', '37932', 'proposal', 50, 'Pending', 'Proposal ada Perubahan Step', '2022-11-04 01:59:36');

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
(7, 'SECT HEAD', 7, 2),
(8, 'DEPT.HEAD', 8, 2),
(9, 'DIV HEAD', 9, 2),
(10, 'CREATE', 10, 2),
(11, 'DEPT HEAD', 11, 3),
(12, 'TAGGING', 12, 3),
(13, 'MAXIMO', 13, 3),
(14, 'FAM', 14, 3),
(15, 'DIV HEAD', 15, 3),
(16, 'DIR (I)', 16, 3),
(17, 'DIR (J)', 17, 3),
(18, 'FIN (I)', 18, 3),
(19, 'FIN (J)', 19, 3),
(20, 'VPD', 20, 3),
(21, 'PD', 21, 3),
(22, 'BUDGET (I)', 22, 3),
(23, 'BUDGET (J)', 23, 3),
(24, 'IO', 24, 3),
(25, 'AMCF', 25, 3),
(26, 'PR ', 26, 3),
(27, 'PO', 27, 3),
(28, 'SEND PO', 28, 3),
(29, 'PUD', 29, 4),
(30, 'GOOD RECEIVE', 30, 5);

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
  `cost` int(30) NOT NULL,
  `id_fis` int(10) NOT NULL,
  `lampiran` varchar(255) NOT NULL,
  `id_matauang` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `proposal`
--

INSERT INTO `proposal` (`id_prop`, `username`, `id_dep`, `id_kat`, `proposal`, `cost`, `id_fis`, `lampiran`, `id_matauang`) VALUES
(50, '37932', 1, 1, 'eeweww', 2000, 17, '16092022143316-0001.pdf', 1),
(52, '1234', 1, 1, 'adsdsa', 20000, 17, '16092022143316-0001.pdf', 1),
(55, '37932', 1, 1, 'fdsf', 120, 17, '16092022143407-0001.pdf', 1);

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
(17, 2022, '2022-04-01', '2023-03-31', 'AKTIF '),
(20, 2023, '2023-04-01', '2024-03-04', 'TIDAK AKTIF ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tracking_ia`
--

CREATE TABLE `tracking_ia` (
  `id_trackia` int(10) NOT NULL,
  `id_ia` int(10) NOT NULL,
  `id_prog` int(10) NOT NULL,
  `approval` int(10) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tracking_ia`
--

INSERT INTO `tracking_ia` (`id_trackia`, `id_ia`, `id_prog`, `approval`, `time`) VALUES
(1, 1, 5, 1, '2022-09-09 02:17:07'),
(2, 1, 6, 1, '2022-09-09 02:17:09'),
(3, 1, 7, 0, '2022-09-09 02:46:15');

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
(89, 54, 1, 1, '37932', '2022-11-02 09:39:00'),
(90, 54, 2, 1, '37932', '2022-11-03 09:39:00'),
(91, 54, 3, 1, '37932', '2022-11-07 09:39:00'),
(92, 54, 4, 1, '37932', '2022-11-16 09:39:00'),
(93, 54, 5, 1, '37932', '2022-11-30 09:39:00'),
(94, 53, 1, 1, '37932', '2022-11-02 20:58:00'),
(95, 53, 2, 1, '37932', '2022-11-02 20:58:00'),
(96, 53, 3, 1, '37932', '2022-11-02 20:58:00'),
(97, 53, 4, 1, '37932', '2022-11-02 20:58:00'),
(98, 53, 5, 1, '37932', '2022-11-02 20:58:00'),
(99, 52, 1, 1, '37932', '2022-11-03 09:09:00'),
(100, 52, 2, 1, '37932', '2022-11-04 09:09:00'),
(101, 52, 3, 1, '37932', '2022-11-04 09:09:00'),
(102, 52, 4, 1, '37932', '2022-11-04 09:09:00'),
(103, 52, 5, 1, '37932', '2022-11-02 09:09:00'),
(104, 50, 1, 1, '37932', '2022-11-08 14:07:00'),
(105, 50, 2, 1, '37932', '2022-11-09 14:07:00'),
(106, 50, 3, 1, '37932', '2022-11-11 14:07:00'),
(107, 50, 4, 1, '37932', '2022-11-24 14:07:00'),
(109, 55, 1, 1, '37932', '2022-11-15 14:34:00'),
(110, 55, 2, 1, '37932', '2022-11-03 14:34:00'),
(111, 55, 3, 1, '37932', '2022-11-16 14:34:00'),
(112, 55, 4, 1, '37932', '2022-11-11 14:34:00'),
(113, 55, 5, 1, '37932', '2022-11-18 14:34:00');

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
,`area` varchar(50)
,`pass` char(40)
,`role_name` varchar(50)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `view_alokasi_budget`
--
DROP TABLE IF EXISTS `view_alokasi_budget`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_alokasi_budget`  AS SELECT `budget`.`id_bud` AS `id_bud`, `time_fiscal`.`periode` AS `periode`, `time_fiscal`.`awal` AS `awal`, `time_fiscal`.`akhir` AS `akhir`, `depart`.`depart` AS `depart`, `budget`.`budget` AS `budget`, `time_fiscal`.`status` AS `status` FROM ((`budget` left join `depart` on(`budget`.`id_dep` = `depart`.`id_dep`)) left join `time_fiscal` on(`budget`.`id_fis` = `time_fiscal`.`id_fis`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_data_user`
--
DROP TABLE IF EXISTS `view_data_user`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_data_user`  AS SELECT `data_user`.`nama` AS `nama`, `data_user`.`username` AS `username`, `data_user`.`area` AS `area`, `data_user`.`pass` AS `pass`, `user_role`.`role_name` AS `role_name` FROM (`data_user` join `user_role` on(`data_user`.`id_level` = `user_role`.`id_role`)) ;

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
  MODIFY `id_bud` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

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
  MODIFY `id_ia` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `kategori_proposal`
--
ALTER TABLE `kategori_proposal`
  MODIFY `id_kat` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `keterangan_progress`
--
ALTER TABLE `keterangan_progress`
  MODIFY `id_ket` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `konversi_matauang`
--
ALTER TABLE `konversi_matauang`
  MODIFY `id_matauang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id_notif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `pic`
--
ALTER TABLE `pic`
  MODIFY `id_pic` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `progress`
--
ALTER TABLE `progress`
  MODIFY `id_prog` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `proposal`
--
ALTER TABLE `proposal`
  MODIFY `id_prop` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT untuk tabel `status`
--
ALTER TABLE `status`
  MODIFY `id_status` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `time_fiscal`
--
ALTER TABLE `time_fiscal`
  MODIFY `id_fis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `tracking_ia`
--
ALTER TABLE `tracking_ia`
  MODIFY `id_trackia` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tracking_prop`
--
ALTER TABLE `tracking_prop`
  MODIFY `id_trackprop` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id_role` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
