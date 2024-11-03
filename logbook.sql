-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Sep 2024 pada 12.03
-- Versi server: 10.1.40-MariaDB
-- Versi PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `logbook`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_logbook`
--

CREATE TABLE `t_logbook` (
  `id_log` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `piket` enum('pagi','sore','malam') NOT NULL,
  `PK` text,
  `nama_kewenangan` varchar(50) NOT NULL DEFAULT '0',
  `no_rekam_medis` varchar(25) NOT NULL DEFAULT '0',
  `tindakan_keperawatan` text,
  `nilai` varchar(25) DEFAULT NULL,
  `sifat` varchar(25) NOT NULL DEFAULT '0',
  `v_karo` int(11) NOT NULL DEFAULT '0',
  `v_kabid` int(11) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_logbook`
--

INSERT INTO `t_logbook` (`id_log`, `id_user`, `tanggal`, `piket`, `PK`, `nama_kewenangan`, `no_rekam_medis`, `tindakan_keperawatan`, `nilai`, `sifat`, `v_karo`, `v_kabid`, `created`, `status`) VALUES
(5, 23, '2024-09-10 00:00:00', 'sore', 'testing', 'elenor', '12341234', '1212sds sdfsdf sf sd fdfsd  dfsdfsd f sdfsdsd gsdfg dg dg sds g  fsdfg sdf fsfg sdfg  ', 'baik', 'qweqweqw', 0, 0, '2024-09-26 14:36:21', 3),
(6, 23, '2024-09-10 00:00:00', 'sore', 'testing 2', '22', '22', '222', 'belum di input', 'belum di input', 0, 0, '2024-09-26 14:55:11', 1),
(7, 24, '2024-09-13 00:00:00', 'sore', 'belum di input', 'belum di input', 'belum di input', 'belum di input', 'belum di input', 'belum di input', 0, 0, '2024-09-26 16:53:00', 0),
(8, 24, '2024-09-06 00:00:00', 'malam', 'belum di input', 'belum di input', 'belum di input', 'belum di input', 'belum di input', 'belum di input', 0, 0, '2024-09-26 17:04:10', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_pengalaman`
--

CREATE TABLE `t_pengalaman` (
  `id_pengalaman` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `tahun_masuk` date DEFAULT NULL,
  `tahun_selesai` date DEFAULT NULL,
  `penempatan` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_pengalaman`
--

INSERT INTO `t_pengalaman` (`id_pengalaman`, `id_user`, `tahun_masuk`, `tahun_selesai`, `penempatan`) VALUES
(1, 23, '2024-01-11', '2024-01-20', 'manembo nembo'),
(2, 24, '2023-01-05', '2024-01-05', 'rs.advemt teling'),
(3, 12, '2024-01-02', '2024-01-02', 'manado'),
(4, 8, '2024-01-02', '2024-01-18', 'bailang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_role`
--

CREATE TABLE `t_role` (
  `id_role` int(11) NOT NULL,
  `role` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_role`
--

INSERT INTO `t_role` (`id_role`, `role`) VALUES
(1, 'user'),
(2, 'admin'),
(3, 'admin-validator');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_users`
--

CREATE TABLE `t_users` (
  `id_user` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `position` varchar(50) DEFAULT NULL,
  `NRP` text,
  `pendidikan` text,
  `str_berlaku` date DEFAULT NULL,
  `str_selesai` date DEFAULT NULL,
  `ruangan` text,
  `pengalaman_id` int(11) DEFAULT NULL,
  `image` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_users`
--

INSERT INTO `t_users` (`id_user`, `name`, `username`, `password`, `role_id`, `position`, `NRP`, `pendidikan`, `str_berlaku`, `str_selesai`, `ruangan`, `pengalaman_id`, `image`) VALUES
(0, 'cres iroth', 'iroth123', 'iroth123', 3, 'kepala bidang', '12332143', 'dc8781d7dacfaa2d08c490314c51c637ffd214b5', '2024-09-01', '2025-05-31', 'Palma E', 1, '31c70e5709c0fd1972c6fb91e1bb06e0.webp'),
(12, 'karu1', 'karu1', 'karu1', 2, 'kepala ruangan', '198302212010012003', 'S.Kep., Ns., M.Kep.,', '2023-01-16', '2024-01-09', 'irina a', 1, '7d0560dfef9790b684ccaa9bdbde7b6a.png'),
(23, 'tresya', 'perawat1', 'perawat1', 1, 'perawat1', '12341234', 's-1 ', '2024-06-05', '2027-07-07', 'ck rantuing', 1, 'cdb744d14e083c36c7074a3c98fd0406.jpg'),
(24, 'orisya', 'perawat2', 'perawat2', 1, 'pengawas team', '12341234', 's-2', '2024-06-05', '2026-10-13', 'irina b', 2, '\'default.jpg\''),
(25, 'anggraini stirman', 'pewarat3', 'pewarat3', 1, 'pewarat', '1234321', 's-2', '2024-06-05', '2028-06-06', 'irina a', 1, '\'default.jpg\'');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_list_perawat`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_list_perawat` (
`id_user` int(11)
,`name` varchar(50)
,`username` varchar(50)
,`password` varchar(50)
,`role_id` int(11)
,`position` varchar(50)
,`NRP` text
,`pendidikan` text
,`str_berlaku` date
,`str_selesai` date
,`ruangan` text
,`pengalaman_id` int(11)
,`image` text
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_log_users`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_log_users` (
`id_log` int(11)
,`id_user` int(11)
,`name` varchar(50)
,`tanggal` datetime
,`piket` enum('pagi','sore','malam')
,`PK` text
,`nama_kewenangan` varchar(50)
,`no_rekam_medis` varchar(25)
,`tindakan_keperawatan` text
,`nilai` varchar(25)
,`sifat` varchar(25)
,`v_karo` int(11)
,`v_kabid` int(11)
,`status` int(11)
,`ruangan` text
,`nama_perawat` varchar(50)
,`nama_role` varchar(25)
,`created` datetime
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_profil`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_profil` (
`id_pengalaman` int(11)
,`id_user` int(11)
,`tahun_masuk` date
,`tahun_selesai` date
,`penempatan` text
,`name` varchar(50)
,`username` varchar(50)
,`position` varchar(50)
,`ruangan` text
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_user_logbook`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_user_logbook` (
`id_log` int(11)
,`id_user` int(11)
,`tanggal` datetime
,`PK` text
,`nama_kewenangan` varchar(50)
,`no_rekam_medis` varchar(25)
,`tindakan_keperawatan` text
,`nilai` varchar(25)
,`sifat` varchar(25)
,`v_karo` int(11)
,`v_kabid` int(11)
,`status` int(11)
,`ruangan` text
,`nama_perawat` varchar(50)
,`nama_role` varchar(25)
,`created` datetime
);

-- --------------------------------------------------------

--
-- Struktur untuk view `v_list_perawat`
--
DROP TABLE IF EXISTS `v_list_perawat`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_list_perawat`  AS  select `t_users`.`id_user` AS `id_user`,`t_users`.`name` AS `name`,`t_users`.`username` AS `username`,`t_users`.`password` AS `password`,`t_users`.`role_id` AS `role_id`,`t_users`.`position` AS `position`,`t_users`.`NRP` AS `NRP`,`t_users`.`pendidikan` AS `pendidikan`,`t_users`.`str_berlaku` AS `str_berlaku`,`t_users`.`str_selesai` AS `str_selesai`,`t_users`.`ruangan` AS `ruangan`,`t_users`.`pengalaman_id` AS `pengalaman_id`,`t_users`.`image` AS `image` from `t_users` where (`t_users`.`role_id` = '1') ;

-- --------------------------------------------------------

--
-- Struktur untuk view `v_log_users`
--
DROP TABLE IF EXISTS `v_log_users`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_log_users`  AS  select `lb`.`id_log` AS `id_log`,`u`.`id_user` AS `id_user`,`u`.`name` AS `name`,`lb`.`tanggal` AS `tanggal`,`lb`.`piket` AS `piket`,`lb`.`PK` AS `PK`,`lb`.`nama_kewenangan` AS `nama_kewenangan`,`lb`.`no_rekam_medis` AS `no_rekam_medis`,`lb`.`tindakan_keperawatan` AS `tindakan_keperawatan`,`lb`.`nilai` AS `nilai`,`lb`.`sifat` AS `sifat`,`lb`.`v_karo` AS `v_karo`,`lb`.`v_kabid` AS `v_kabid`,`lb`.`status` AS `status`,`u`.`ruangan` AS `ruangan`,`u`.`name` AS `nama_perawat`,`r`.`role` AS `nama_role`,now() AS `created` from ((`t_logbook` `lb` join `t_users` `u` on((`lb`.`id_user` = `u`.`id_user`))) join `t_role` `r` on((`u`.`role_id` = `r`.`id_role`))) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `v_profil`
--
DROP TABLE IF EXISTS `v_profil`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_profil`  AS  select `p`.`id_pengalaman` AS `id_pengalaman`,`p`.`id_user` AS `id_user`,`p`.`tahun_masuk` AS `tahun_masuk`,`p`.`tahun_selesai` AS `tahun_selesai`,`p`.`penempatan` AS `penempatan`,`u`.`name` AS `name`,`u`.`username` AS `username`,`u`.`position` AS `position`,`u`.`ruangan` AS `ruangan` from (`t_pengalaman` `p` join `t_users` `u` on((`p`.`id_user` = `u`.`id_user`))) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `v_user_logbook`
--
DROP TABLE IF EXISTS `v_user_logbook`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_user_logbook`  AS  select `lb`.`id_log` AS `id_log`,`u`.`id_user` AS `id_user`,`lb`.`tanggal` AS `tanggal`,`lb`.`PK` AS `PK`,`lb`.`nama_kewenangan` AS `nama_kewenangan`,`lb`.`no_rekam_medis` AS `no_rekam_medis`,`lb`.`tindakan_keperawatan` AS `tindakan_keperawatan`,`lb`.`nilai` AS `nilai`,`lb`.`sifat` AS `sifat`,`lb`.`v_karo` AS `v_karo`,`lb`.`v_kabid` AS `v_kabid`,`lb`.`status` AS `status`,`u`.`ruangan` AS `ruangan`,`u`.`name` AS `nama_perawat`,`r`.`role` AS `nama_role`,now() AS `created` from ((`t_logbook` `lb` join `t_users` `u` on((`lb`.`id_user` = `u`.`id_user`))) join `t_role` `r` on((`u`.`role_id` = `r`.`id_role`))) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `t_logbook`
--
ALTER TABLE `t_logbook`
  ADD PRIMARY KEY (`id_log`);

--
-- Indeks untuk tabel `t_pengalaman`
--
ALTER TABLE `t_pengalaman`
  ADD PRIMARY KEY (`id_pengalaman`);

--
-- Indeks untuk tabel `t_role`
--
ALTER TABLE `t_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indeks untuk tabel `t_users`
--
ALTER TABLE `t_users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `t_logbook`
--
ALTER TABLE `t_logbook`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
