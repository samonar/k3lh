-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 26 Apr 2020 pada 09.14
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proyek`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bagian`
--

CREATE TABLE `bagian` (
  `id_bagian` int(11) NOT NULL,
  `nm_bagian` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bagian`
--

INSERT INTO `bagian` (`id_bagian`, `nm_bagian`) VALUES
(6, 'Pekerjaan Pasangan bata Ringan'),
(7, 'Pekerjaan Dinding Lapis Plester dan Aci'),
(8, 'Pekerjaan Dinding Partisi Gypsum'),
(9, 'Pekerjaan Tangga');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bahaya`
--

CREATE TABLE `bahaya` (
  `id_bahaya` int(11) NOT NULL,
  `id_sumber` int(11) NOT NULL,
  `nm_bahaya` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `bahaya`
--

INSERT INTO `bahaya` (`id_bahaya`, `id_sumber`, `nm_bahaya`) VALUES
(6, 7, 'terjatuh dari ketinggian'),
(7, 7, 'tertimpa material scafolding'),
(8, 7, 'terjepit scafolding'),
(9, 8, 'tergores besi'),
(10, 8, 'terjepit besi'),
(11, 8, 'terpukul palu'),
(12, 8, 'tertusuk kawat'),
(13, 9, 'kejatuhan material'),
(14, 9, 'iritasi pada kuliat akibat terkan bahan mortar'),
(15, 10, 'tertimpa bekisting'),
(16, 10, 'terkena tumpahan material'),
(17, 11, 'kejatuhan besi'),
(18, 11, 'tergores besi'),
(19, 12, 'iritasi pada kulit akibat terkena bahan mortar'),
(20, 13, 'terluka akibat alat bor'),
(21, 13, 'tersengat listrik'),
(22, 13, 'kejatuhan besi'),
(23, 14, 'terluka akibat alat bor'),
(24, 15, 'gangguan pernafasan (bau menyengat cat)'),
(25, 15, 'luka bakar (uap paiinting meletup di titik nyala 50 C)'),
(26, 16, 'terjatuh dari ketinggian'),
(27, 16, 'tertimpa material scaffolding'),
(28, 16, 'kejatuhan material'),
(29, 16, 'pasang / bongkar bekisting'),
(30, 16, 'terluka akibat pemotong /gergaji'),
(31, 17, 'terbentur besi'),
(32, 17, 'terluka akibat bar  cutter'),
(33, 17, 'terluka akibat bar bender'),
(34, 17, 'tertusuk kawat'),
(35, 18, 'terluka akibat concrete vibrator'),
(36, 18, 'terbentur bucket cor'),
(37, 18, 'terbentur pipa tremi'),
(38, 18, 'iritasi kulit akibat terkena tumpahan material'),
(39, 18, 'tertimpa material scaffolding');

-- --------------------------------------------------------

--
-- Struktur dari tabel `identifikasi`
--

CREATE TABLE `identifikasi` (
  `id_identifikasi` int(11) NOT NULL,
  `id_proyek` int(11) NOT NULL,
  `id_bahaya` int(11) NOT NULL,
  `likelihood` int(11) NOT NULL,
  `severity` int(11) NOT NULL,
  `pengendalian` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `identifikasi`
--

INSERT INTO `identifikasi` (`id_identifikasi`, `id_proyek`, `id_bahaya`, `likelihood`, `severity`, `pengendalian`) VALUES
(16, 3, 39, 1, 2, 'popo'),
(17, 3, 38, 1, 2, 'opo'),
(18, 3, 37, 1, 2, 'opo'),
(19, 3, 36, 1, 2, 'opo'),
(20, 3, 35, 5, 2, 'opo'),
(21, 3, 34, 1, 2, 'opo'),
(22, 3, 33, 1, 2, 'opo'),
(23, 3, 32, 1, 2, 'opo'),
(24, 3, 31, 1, 2, 'opo'),
(25, 3, 30, 1, 2, 'op'),
(26, 3, 28, 1, 2, 'opo'),
(27, 3, 26, 1, 2, 'opo'),
(28, 3, 25, 1, 2, '- sedia pemadam kebakaran\r\n- pakai alat pemadam'),
(29, 3, 23, 1, 2, 'opo'),
(30, 3, 21, 1, 2, 'opo'),
(31, 3, 20, 1, 2, 'opo'),
(32, 2, 39, 1, 2, ''),
(33, 2, 38, 6, 3, ''),
(34, 2, 37, 2, 4, ''),
(35, 2, 36, 5, 2, ''),
(36, 2, 35, 3, 1, ''),
(37, 2, 34, 5, 2, ''),
(38, 2, 33, 3, 2, ''),
(39, 2, 32, 4, 2, ''),
(40, 2, 31, 3, 4, ''),
(41, 2, 29, 2, 3, ''),
(42, 2, 28, 0, 0, ''),
(43, 2, 23, 2, 5, ''),
(44, 2, 22, 2, 3, ''),
(45, 2, 21, 4, 5, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `proyek`
--

CREATE TABLE `proyek` (
  `id_proyek` int(11) NOT NULL,
  `nm_proyek` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `proyek`
--

INSERT INTO `proyek` (`id_proyek`, `nm_proyek`, `alamat`, `tgl`) VALUES
(2, 'kepala desa', 'pait', '2020-02-12'),
(3, 'kelurahan kasembn', 'slatri', '2020-04-23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sumber`
--

CREATE TABLE `sumber` (
  `id_sumber` int(11) NOT NULL,
  `id_bagian` int(11) NOT NULL,
  `nm_sumber` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sumber`
--

INSERT INTO `sumber` (`id_sumber`, `id_bagian`, `nm_sumber`) VALUES
(7, 6, 'Pasang / Bongkar Scaffolding'),
(8, 6, 'Pemasangan Kolom Praktis'),
(9, 6, 'Pemasangan Bata'),
(10, 6, 'Pengecoran'),
(11, 7, 'Pemasangan Jidar'),
(12, 7, 'Pelaksanaan Plester'),
(13, 8, 'Pemasangan Rangka'),
(14, 8, 'Penutupan Gypsum'),
(15, 8, 'Pengecatan Gypsum'),
(16, 9, 'Pasang / Bongkar Scaffolding'),
(17, 9, 'Pembesian'),
(18, 9, 'Pengecoran');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(5) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `bagian` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `bagian`) VALUES
(1, 'admin', 'admin', 'admin'),
(2, 'toko', 'toko', 'toko'),
(3, 'kantor', 'kantor', 'kantor'),
(4, 'setoran', 'setoran', 'setoran'),
(5, 'katul', 'katul', 'katul');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bagian`
--
ALTER TABLE `bagian`
  ADD PRIMARY KEY (`id_bagian`);

--
-- Indexes for table `bahaya`
--
ALTER TABLE `bahaya`
  ADD PRIMARY KEY (`id_bahaya`);

--
-- Indexes for table `identifikasi`
--
ALTER TABLE `identifikasi`
  ADD PRIMARY KEY (`id_identifikasi`);

--
-- Indexes for table `proyek`
--
ALTER TABLE `proyek`
  ADD PRIMARY KEY (`id_proyek`);

--
-- Indexes for table `sumber`
--
ALTER TABLE `sumber`
  ADD PRIMARY KEY (`id_sumber`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bagian`
--
ALTER TABLE `bagian`
  MODIFY `id_bagian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `bahaya`
--
ALTER TABLE `bahaya`
  MODIFY `id_bahaya` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `identifikasi`
--
ALTER TABLE `identifikasi`
  MODIFY `id_identifikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `proyek`
--
ALTER TABLE `proyek`
  MODIFY `id_proyek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sumber`
--
ALTER TABLE `sumber`
  MODIFY `id_sumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
