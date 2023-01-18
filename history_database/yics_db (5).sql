-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Jan 2023 pada 05.50
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
(6, 2, 'DNA BODY 2'),
(7, 3, 'ADMIN BQC'),
(9, 2, 'RM BODY 2'),
(10, 2, 'QUALITY  ASSURANCE '),
(12, 1, 'SL A BODY 1'),
(13, 3, 'design,jig in house & metrology');

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
('35953', 'MUHAMMAD EFENDI', 7, 'd033e22ae348aeb5660fc2140aec35850c4da997', 2),
('37932', 'HASAN', 6, 'bea8ed4d790d7df42ab78ad2ae59c6e7ba1e893b', 2),
('44131', 'RIO SETIAWAN JUDEN', 9, 'bea8ed4d790d7df42ab78ad2ae59c6e7ba1e893b', 1),
('62725', 'JEPRI DANI PRATAMA', 13, 'd033e22ae348aeb5660fc2140aec35850c4da997', 1);

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

-- --------------------------------------------------------

--
-- Struktur dari tabel `notif_prop_rjct`
--

CREATE TABLE `notif_prop_rjct` (
  `id` int(10) NOT NULL,
  `id_prop` int(10) NOT NULL,
  `reason` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `plan_proposal`
--

CREATE TABLE `plan_proposal` (
  `id_prop` int(10) NOT NULL,
  `id_area` int(10) NOT NULL,
  `id_kat` int(10) NOT NULL,
  `proposal` varchar(100) NOT NULL,
  `cost` decimal(30,2) NOT NULL,
  `id_fis` int(10) NOT NULL,
  `id_matauang` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(21, 2023, '2023-04-01', '2024-03-31', 'AKTIF');

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
-- Struktur untuk view `view_alokasi_budget`
--
DROP TABLE IF EXISTS `view_alokasi_budget`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_alokasi_budget`  AS SELECT `budget`.`id_bud` AS `id_bud`, `time_fiscal`.`periode` AS `periode`, `time_fiscal`.`awal` AS `awal`, `time_fiscal`.`akhir` AS `akhir`, `depart`.`depart` AS `depart`, `budget`.`budget` AS `budget`, `time_fiscal`.`status` AS `status` FROM ((`budget` left join `depart` on(`budget`.`id_dep` = `depart`.`id_dep`)) left join `time_fiscal` on(`budget`.`id_fis` = `time_fiscal`.`id_fis`))  ;

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
  MODIFY `id_area` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `budget`
--
ALTER TABLE `budget`
  MODIFY `id_bud` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
  MODIFY `id_ia` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

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
  MODIFY `id_notif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `notif_ia_rjct`
--
ALTER TABLE `notif_ia_rjct`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `notif_prop_rjct`
--
ALTER TABLE `notif_prop_rjct`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `plan_proposal`
--
ALTER TABLE `plan_proposal`
  MODIFY `id_prop` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `progress`
--
ALTER TABLE `progress`
  MODIFY `id_prog` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `proposal`
--
ALTER TABLE `proposal`
  MODIFY `id_prop` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

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
  MODIFY `id_trackia` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tracking_prop`
--
ALTER TABLE `tracking_prop`
  MODIFY `id_trackprop` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id_role` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
