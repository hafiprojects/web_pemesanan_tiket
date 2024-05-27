-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 27, 2024 at 12:35 PM
-- Server version: 8.0.30
-- PHP Version: 7.4.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_pemesanan_tiket`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(10, 'admin', '$2y$10$UextIKQkR.hBckTiGR.Xieszo1O317kp/D3Tl.MhZ4qnpnvfYe.Ja'),
(12, 'admin2', '$2y$10$EkaqWyXD.kh8fFqL/fUoI.jY4oFbkeQLQLqBiS.YmgRZtN7wfT596');

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `is_published` tinyint NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `title`, `slug`, `thumbnail`, `content`, `is_published`, `created_at`, `updated_at`) VALUES
(3, 'Partisipasi Al-Hidayah Horse Stable dalam Event Internasional di Bandung', 'partisipasi-alhidayah-horse-stable-dalam-event-internasional-di-bandung', 'uploads/665432041ac12.png', '<p>Al Hidayah Horse Stable berdiri pada tanggal 21 November 2021 berawal dengan sepasang kuda yang dipinjamkan oleh Pimpinan Pengadaian Syariah Cabang Jambi. Setelah melihat minat dan bakat santri yang antusias dalam olahraga berkuda, dengan dukungan dari para santri dan pimpinan pondok PKP Al Hidayah mendorong Tim Al Hidayah Horse Stable untuk memperluas koleksi kuda dengan membeli sepasang lainnya dari Sumatra Barat. Tim Al Hidayah Horse Stable tidak hanya meningkatkan jumlah kuda, tetapi juga mengembangkan kemampuan di bidang panahan. Pada tahun 2023, fasilitas Al Hidayah Horse Stable berkembang pesat, memiliki sepuluh ekor kuda (enam jantan dan empat betina).&nbsp;</p><p>Keberhasilan ini mencerminkan pertumbuhan fisik dan fokus kuat pada pengembangan keterampilan olahraga kuda dan panahan. Dukungan dari pimpinan pondok dan antusiasme para santri mendorong Tim Al Hidayah Horse Stable mencapai prestasi signifikan. Al Hidayah Horse Stable berhasil menciptakan lingkungan yang mendukung pertumbuhan fisik kuda-kuda dan membentuk atlet berkuda yang handal di bidang panahan. Hal tersebut menjadikan dasar dalam penetapan tujuan berdirinya Al Hidayah Horse Stable. Di antaranya:&nbsp;</p><ol><li>Menjadikan stable yang berstandar nasional&nbsp;</li><li>Melahirkan atlet yang siap bersaing secara nasional maupun internasional&nbsp;</li><li>Menjadikan fasilitas pelatihan yang safety, proposional, mudah dan terjangkau.&nbsp;</li><li>Melatih keberanian, kesabaran serta kefokusan dalam berkuda dan memanah&nbsp;</li></ol><p>Menjalin ikatan antara rider dan kuda Tim Al Hidayah Horse Stable aktif berkompetisi, meraih prestasi di berbagai event seperti HBA di Sawahlunto, Gesit Se-sumatra, Adventure Se-kota Jambi, Skoring Ramadhan Day Se-kota Jambi, 1000 Kyai dan Santri Memanah Se-sumatra, Piala Gubernur Cup Palembang 2023 di Sumatra Selatan (HBA dan Archery), Adventure Kids Se-kota Jambi, serta ivent Indonesian CUP internasional di provinsu jawa barata.&nbsp;</p><p>Al Hidayah Horse Stable juga menjadi tuan rumah untuk event regional Sumatra memperebutkan Piala Gubernur Jambi Tahun 2023, dengan sukses event berkuda memanah se-sumatra yang diikuti oleh lebih dari 300 peserta dari Jambi, Riau, Palembang, Medan dan Sumatra Barat. Keberhasilan ini mencerminkan kontribusi positif Al Hidayah Horse Stable dalam memajukan olahraga kuda dan panahan di tingkat regional.</p>', 1, '2024-05-27 07:06:45', '2024-05-27 07:06:45'),
(4, 'Visi Misi Motto Al-Hidayah Horse Stable V1', 'visi-misi-motto-alhidayah-horse-stable-v1', 'uploads/6654315734cc6.jpeg', '<h3><strong>VISI, MISI DAN MOTTO AL HIDAYAH HORSE STABLE</strong></h3><p>VISI : “MEMBENTUK ATLET BERKUDA MEMANAH YANG UNGGUL DALAM PRESTASI FISIK SERTA MEMILIKI KARAKTER YANG BERINTEGRITAS.”</p><p>MISI : 1. MENYEDIAKAN FASILITAS PELATIHAN YANG BERKUALITAS TINGGI. 2. MENCIPTAKAN ATLET BERKUDA MEMANAH MELALUI PROGRAM UNGGULAN. 3. MEMBERIKAN PELATIHAN NILAI-NILAI MORAL DAN ETIKA YANG BERINTEGRITAS.</p><p>MOTTO: “TIDAK AKAN TANGGUH JIKA BELUM MENUNGGANG, TIDAK AKAN SAMPAI TUJUAN JIKA BELUM MELESAT”</p>', 1, '2024-05-27 07:08:07', '2024-05-27 07:08:07');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `image`, `created_at`, `updated_at`) VALUES
(11, 'uploads/665435e565ebf.png', '2024-05-26 15:17:25', '2024-05-26 15:17:25'),
(14, 'uploads/6654354ff2ddb.png', '2024-05-27 04:14:29', '2024-05-27 04:14:29');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `no_wa` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(300) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `no_wa`, `email`, `password`) VALUES
(9, 'user', '086681928172', 'user@gmail.com', '$2y$10$oMx9dlc3y9iSgK9mo8IdF.rDs6ybV3LILt2pelox/0Ziq2/8abA5K'),
(10, 'Ridwan', '082289560436', 'muhammadridwan@gmail.com', '$2y$10$zw28ns0DV3gdGVyw725FeeohevnRP2A0oSMikwG2n530z7zBdX6.i'),
(13, 'hafigo', '098765432123', 'hafigo@gmail.com', '$2y$10$UextIKQkR.hBckTiGR.Xieszo1O317kp/D3Tl.MhZ4qnpnvfYe.Ja');

-- --------------------------------------------------------

--
-- Table structure for table `user_order`
--

CREATE TABLE `user_order` (
  `id` int NOT NULL,
  `id_tiket` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `order_id` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `catatan` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `rek_pengirim` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `namarek_pengirim` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `bank_pengirim` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `jenis_pesanan` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `bank_penerima` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `total_pembayaran` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `waktu_pesanan` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `bukti_pembayaran` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `link_status` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `warna_status` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_order`
--

INSERT INTO `user_order` (`id`, `id_tiket`, `order_id`, `email`, `catatan`, `rek_pengirim`, `namarek_pengirim`, `bank_pengirim`, `jenis_pesanan`, `bank_penerima`, `total_pembayaran`, `waktu_pesanan`, `bukti_pembayaran`, `status`, `link_status`, `warna_status`) VALUES
(31, 'Ridwan|79003', 'Ridwan', '082289560436 / muhammadridwan@gmail.com', '', '7001644078', 'RIDWAN', 'BANK 9', 'wisata berkuda', 'BANK 9 7001643538 A/N SHELLY MARCELINA', '', 'Thursday, 25-04-2024 | 07:19:51 am', '', 'Telah Digunakan', '#', 'primary'),
(32, 'Ridwan|21200', 'Ridwan', '082289560436 / muhammadridwan@gmail.com', '', '082289560836', 'AGUS', 'BANK 9', 'prewedding', 'BANK 9 7001643538 A/N SHELLY MARCELINA', '500.000/1.000000', 'Friday, 03-05-2024 | 18:44:46 pm', '', 'pending', '#', 'warning');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_order`
--
ALTER TABLE `user_order`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_order`
--
ALTER TABLE `user_order`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
