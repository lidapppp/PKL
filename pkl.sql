-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 23, 2021 at 10:28 AM
-- Server version: 10.3.25-MariaDB-0+deb10u1
-- PHP Version: 7.3.19-1~deb10u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pkl`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `nip` int(12) NOT NULL,
  `latitude` varchar(128) NOT NULL,
  `longitude` varchar(128) NOT NULL,
  `catatan` text NOT NULL,
  `foto` varchar(128) NOT NULL,
  `device` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(255) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`, `level`) VALUES
(1, 'Chief Executive Officer', 1),
(2, 'Manager HRD', 2),
(5, 'Manager CSR', 2);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2021-02-08-040450', 'App\\Database\\Migrations\\User', 'default', 'App', 1612778316, 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `judul` varchar(128) NOT NULL,
  `slug` varchar(128) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` varchar(128) NOT NULL,
  `date_uploaded` int(11) NOT NULL,
  `uploader` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `judul`, `slug`, `deskripsi`, `foto`, `date_uploaded`, `uploader`) VALUES
(1, 'Algoritma dan Pemrograman dalam C++', 'Algoritma-dan-Pemrograman-dalam-C++', '<p>$this-&gt;portofolioModel = new PortofolioModel();</p>', '1. Nabil.png', 1613582798, 'admin'),
(0, 'fsdf', 'fsdf', '<p>aaaaa</p>', '1.jpg', 1613645283, 'admin'),
(0, 'testt', 'testt', '<p>test1</p>', '1.png', 1613658002, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nip` int(11) NOT NULL,
  `foto` varchar(128) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `telepon` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `jabatan` int(11) NOT NULL,
  `gaji_pokok` int(11) NOT NULL,
  `mulai_bekerja` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nip`, `foto`, `nama`, `telepon`, `email`, `jabatan`, `gaji_pokok`, `mulai_bekerja`, `created_at`) VALUES
(1, 1817051074, 'EM9NURDU4AAO2MH.jpeg', 'Aulia Ahmad Nabil', '082297578773', 'nabilunited2@gmail.com', 1, 12000000, '2020-05-10', '0000-00-00'),
(5, 1807051008, 'default.png', 'Pandi Barep', '081278317777', 'admin@gmail.com', 5, 1000000, '2021-03-11', '0000-00-00'),
(6, 1807051006, 'default.png', 'Thorin Satria Ramadhans', '081278317778', 'idnbdy@gmail.com', 2, 1000000, '2021-03-18', '0000-00-00'),
(7, 1817051025, 'default.png', 'Intania Rahmadila', '089630479663', 'intaniar@gmail.com', 5, 3500000, '2021-03-01', '0000-00-00'),
(8, 1817051002, 'default.png', 'Bobby Malela', '081234567890', 'bur.ilham2021@students.ugm.ac.id', 2, 1000000, '2021-03-02', '0000-00-00'),
(9, 1817051001, 'default.png', 'Pandi Barep', '081278317744', 'pandi.barep@gmail.com', 1, 2500000, '2021-03-02', '2021-03-18');

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan`
--

CREATE TABLE `perusahaan` (
  `id` int(11) NOT NULL,
  `nama_pt` varchar(255) NOT NULL,
  `profile_pt` varchar(255) NOT NULL,
  `logo_pt` varchar(255) NOT NULL,
  `no_telp` int(255) NOT NULL,
  `email` varchar(128) NOT NULL,
  `tempat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perusahaan`
--

INSERT INTO `perusahaan` (`id`, `nama_pt`, `profile_pt`, `logo_pt`, `no_telp`, `email`, `tempat`) VALUES
(1, 'arsi enarcon', 'test', 'aa', 815403785, 'test@gmail.com', 'bsndung');

-- --------------------------------------------------------

--
-- Table structure for table `portofolio`
--

CREATE TABLE `portofolio` (
  `id` int(11) NOT NULL,
  `foto` varchar(128) NOT NULL,
  `date_uploaded` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `portofolio`
--

INSERT INTO `portofolio` (`id`, `foto`, `date_uploaded`) VALUES
(4, '1. Nabil.png', 1613582461);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `nama_pt` varchar(128) NOT NULL,
  `profile_pt` text NOT NULL,
  `logo_pt` varchar(128) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `email` varchar(128) NOT NULL,
  `tempat` text NOT NULL,
  `instagram` varchar(70) NOT NULL,
  `facebook` varchar(70) NOT NULL,
  `whatsapp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `nama_pt`, `profile_pt`, `logo_pt`, `no_telp`, `email`, `tempat`, `instagram`, `facebook`, `whatsapp`) VALUES
(1, 'Arsi Enarcon', 'Perusahaan ini mulai dirintis oleh 4 orang ex karyawan PT Megapola Macro Design (MMD). Dari keempat orang tersebut, tiga di antaranya memiliki disiplin arsitektur dari perguruan tinggi yang sama dan satu orang mempunyai disiplin seni rupa. Mereka adalah Ir. Iman N. Djatiatmadja (arsitek), Ir. Beni Robini (arsitek), Ir. Budi Satria (arsitek), dan Drs. Zainal Arifin (seni rupa). Setelah lima tahun bekerja pada PT MMD, tahun 1995 mereka memisahkan diri dengan mendirikan Studio Adi Reka Seni Imaji (ARSI). Manajemen PT MMD sendiri mengalami perpecahan.', 'default.svg', '(022) 7275016', 'arsienarcon@gmail.com', 'Jl. Saninten No.6, Cihapit, Kec. Bandung Wetan, Kota Bandung, Jawa Barat 40114', 'www.instagram.com/arsienarcon', 'www.facebook.com/arsienarcon', '082297578773');

-- --------------------------------------------------------

--
-- Table structure for table `proyek`
--

CREATE TABLE `proyek` (
  `id_proyek` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `status` varchar(255) NOT NULL,
  `progress` int(11) NOT NULL,
  `dana` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `proyek`
--

INSERT INTO `proyek` (`id_proyek`, `nama`, `lokasi`, `tgl_mulai`, `tgl_selesai`, `status`, `progress`, `dana`) VALUES
(1, 'Perpustakaan', 'Bandung', '2021-03-12', '2021-03-17', 'dalam proses', 50, 15000000),
(3, 'Mall Terpadu', 'Jogja', '2021-03-10', '2021-03-24', 'selesai', 30, 90000000);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role`, `nama`) VALUES
(1, 'Admin Utama'),
(2, 'Admin Administrasi'),
(3, 'Admin Content'),
(4, 'Pegawai');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `last_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `foto`, `username`, `id_pegawai`, `email`, `password`, `role_id`, `last_login`) VALUES
(1, 'default.png', 'brondol', 0, 'nabilunited2@gmail.com', '$2y$10$wjkg9fEhWg4nfgcsyj46jelDv.BKlS/y20CojprdmL7ogZE5J8Q7m', 1, '2021-03-23 08:05:37'),
(2, '1. Nabil.png', 'aulia.ahmad1074', 0, 'aulia.ahmad1074@students.unila.ac.id', '$2y$10$FsbN.vw4D06GXG7ekV69N.9FsaV5BdCrC0c0JLxkfYWk4s6zmRRbq', 2, '2021-03-18 13:14:44'),
(3, 'default.png', '1817051025', 7, 'intaniar@gmail.com', '$2y$10$s6.Z.H0s.JJFiRVrNoMdNOFQPD9ql5UwfGMQItnNMx4aPrMYJA2yy', 4, '2021-03-18 13:33:23'),
(4, 'default.png', '1817051002', 8, 'bur.ilham2021@students.ugm.ac.id', '$2y$10$z0.BN2t8nZlu6GHLqJZqI.nmSD.g0xsjaF0XB/NzvkbA4IrlT2s3y', 4, '2021-03-16 13:37:22'),
(5, 'default.png', '1817051001', 9, 'pandi.barep@gmail.com', '$2y$10$yhJdi193oBwuB70aDcq/W.XVwQLQXvh1vNY/e9.k.uXJDFqZzJQ2a', 4, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `judul` varchar(128) NOT NULL,
  `deskripsi` text NOT NULL,
  `link` varchar(128) NOT NULL,
  `date_uploaded` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `judul`, `deskripsi`, `link`, `date_uploaded`) VALUES
(1, 'Astrid S - Hurts So Good (Lyric Video)', '<p>Astrids S - Hurts So Good (Lyric Video) Song: Hurts So Good by Astrid S lyrics Discover of best new pop music on my channel: http://bit.ly/Lovelifelyrics</p>', 'https://www.youtube.com/embed/8RmvCLn6RoI', 1613582442),
(2, 'I really miss you... Chill vibes', '<p>I really miss you... Chill vibes Just relax and enjoy this chill mix: <a href=\"https://www.youtube.com/redirect?event=video_description&amp;redir_token=QUFFLUhqazJiZjkyczZZb05SdmczNDR3bjBPUW5KTEdVd3xBQ3Jtc0ttdUUwUlcxV1N6QzdFSjRHRDA3SHRCNnRQUlhNclVWeEo1b0VqRWxwRDBjdnFzSWl2OF9WSnJrLXdkaS1yU2dMYW9VYVotSGx5TGhwMmd1a2Z1LVZxQVhpQlB0cmNiU091UzlaNXN6aEs4b3ZFNUUtSQ&amp;q=https%3A%2F%2Fbit.ly%2Fchillvibesmusic\">https://bit.ly/chillvibesmusic</a>​ Discover the best pop music &amp; chill songs: <a href=\"https://www.youtube.com/redirect?event=video_description&amp;redir_token=QUFFLUhqbHY4VWQ4dnJtRVpTcjd6U09PVnJuY21YNlJLUXxBQ3Jtc0ttZHlVWlNqZzFOaVRpeWV4NzE3UFcwMU0zcnp6VkVacG1hVTB4bmV1OXdXNVZWN3B1TDlrU3lKQVh4NXR5b3lRWHhjRDI1UjByb1hoZkNMX2N6LWJ4RWJTd0ZBcHQzOXN1R0xLWXVkejRUR1BoWnlMOA&amp;q=http%3A%2F%2Fbit.ly%2FLovelifelyrics\">http://bit.ly/Lovelifelyrics</a></p>', 'https://www.youtube.com/embed/9AYl10qxc0M', 1612871413),
(4, 'fsdf', '<p>test</p>', 'https://www.youtube.com/embed/EBotfH842hc', 1613621344);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proyek`
--
ALTER TABLE `proyek`
  ADD PRIMARY KEY (`id_proyek`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `proyek`
--
ALTER TABLE `proyek`
  MODIFY `id_proyek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
