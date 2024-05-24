-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Bulan Mei 2024 pada 14.22
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.0.28

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
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(10, 'admin', '$2a$12$N2lyA2IVkksAwtCSZhjfF.FjXBPDR2chzsoRxraXNukKW1Ed27wpW');

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikel`
--

CREATE TABLE `artikel` (
  `kode` int(30) NOT NULL,
  `judul` varchar(30) NOT NULL,
  `isi` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `no_wa` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `no_wa`, `email`, `password`) VALUES
(9, 'user', '086681928172', 'user@gmail.com', '$2y$10$oMx9dlc3y9iSgK9mo8IdF.rDs6ybV3LILt2pelox/0Ziq2/8abA5K'),
(10, 'Ridwan', '082289560436', 'muhammadridwan@gmail.com', '$2y$10$zw28ns0DV3gdGVyw725FeeohevnRP2A0oSMikwG2n530z7zBdX6.i');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_order`
--

CREATE TABLE `user_order` (
  `id` int(11) NOT NULL,
  `id_tiket` varchar(15) NOT NULL,
  `order_id` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `catatan` varchar(200) NOT NULL,
  `rek_pengirim` varchar(50) NOT NULL,
  `namarek_pengirim` varchar(100) NOT NULL,
  `bank_pengirim` varchar(20) NOT NULL,
  `jenis_pesanan` varchar(100) NOT NULL,
  `bank_penerima` varchar(150) NOT NULL,
  `total_pembayaran` varchar(50) NOT NULL,
  `waktu_pesanan` varchar(50) NOT NULL,
  `bukti_pembayaran` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `link_status` varchar(50) NOT NULL,
  `warna_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user_order`
--

INSERT INTO `user_order` (`id`, `id_tiket`, `order_id`, `email`, `catatan`, `rek_pengirim`, `namarek_pengirim`, `bank_pengirim`, `jenis_pesanan`, `bank_penerima`, `total_pembayaran`, `waktu_pesanan`, `bukti_pembayaran`, `status`, `link_status`, `warna_status`) VALUES
(31, 'Ridwan|79003', 'Ridwan', '082289560436 / muhammadridwan@gmail.com', '', '7001644078', 'RIDWAN', 'BANK 9', 'wisata berkuda', 'BANK 9 7001643538 A/N SHELLY MARCELINA', '', 'Thursday, 25-04-2024 | 07:19:51 am', '', 'Telah Digunakan', '#', 'primary'),
(32, 'Ridwan|21200', 'Ridwan', '082289560436 / muhammadridwan@gmail.com', '', '082289560836', 'AGUS', 'BANK 9', 'prewedding', 'BANK 9 7001643538 A/N SHELLY MARCELINA', '500.000/1.000000', 'Friday, 03-05-2024 | 18:44:46 pm', '', 'pending', '#', 'warning');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`kode`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_order`
--
ALTER TABLE `user_order`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `artikel`
--
ALTER TABLE `artikel`
  MODIFY `kode` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `user_order`
--
ALTER TABLE `user_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
