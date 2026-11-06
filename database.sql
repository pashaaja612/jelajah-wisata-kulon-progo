-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Nov 2026 pada 17.06
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_wisata_test`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket_wisata`
--

CREATE TABLE `paket_wisata` (
  `id` int(11) NOT NULL,
  `nama_paket` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `destinasi` text DEFAULT NULL,
  `gambar` varchar(150) NOT NULL,
  `link_youtube` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `paket_wisata`
--

INSERT INTO `paket_wisata` (`id`, `nama_paket`, `deskripsi`, `destinasi`, `gambar`, `link_youtube`) VALUES
(1, 'Tour Package 2 Hari', 'Dua hari menjelajah alam Pegunungan Menoreh. Hari pertama di Desa Wisata Jatimulyo, Girimulyo, mengunjungi Goa Kiskendo dan Air Terjun Kembang Soka. Hari kedua di Desa Wisata Hargowilis, Kokap, menikmati pemandangan perbukitan di Kalibiru dan Bukit Cendana.', 'Destinasi:\nHari pertama (Desa Wisata Jatimulyo, Girimulyo): Goa Kiskendo dan Air Terjun Kembang Soka.\nHari kedua (Desa Wisata Hargowilis, Kokap): Kalibiru dan Bukit Cendana.', 'img/tour_2_hari.jpg', NULL),
(2, 'Wisata Alam Sungai', 'Bermain air di kawasan Desa Wisata Jatimulyo. Ekowisata Sungai Mudal bersumber dari mata air alami dengan kolam bertingkat berair jernih kebiruan, dilanjutkan ke Air Terjun Kedung Pedut yang rindang di tengah kawasan hutan Pegunungan Menoreh.', 'Destinasi:\nEkowisata Sungai Mudal, Desa Jatimulyo, Girimulyo.\nAir Terjun Kedung Pedut, Desa Jatimulyo, Girimulyo.', 'img/wisata_sungai.jpg', NULL),
(3, 'Paket Camping Ground', 'Berkemah di kawasan Waduk Sermo, Desa Hargowilis, Kokap. Menikmati panorama danau yang dikelilingi perbukitan hijau dan suasana alam terbuka di area camping yang dikelola warga sekitar.', 'Lokasi:\nCamp Menara Pelangi, kawasan Waduk Sermo (Sermo Tengah, Hargowilis).\nAlternatif: Mengger Kemuning Waduk Sermo (Tegiri 1, Hargowilis).', 'img/camping_ground.jpg', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id` int(11) NOT NULL,
  `paket_id` int(11) NOT NULL,
  `nama_pemesan` varchar(100) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `tanggal_pesan` date NOT NULL,
  `lama_hari` int(11) NOT NULL,
  `penginapan` tinyint(1) NOT NULL DEFAULT 0,
  `transportasi` tinyint(1) NOT NULL DEFAULT 0,
  `makanan` tinyint(1) NOT NULL DEFAULT 0,
  `jumlah_peserta` int(11) NOT NULL,
  `harga_paket` int(11) NOT NULL,
  `jumlah_tagihan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `paket_wisata`
--
ALTER TABLE `paket_wisata`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_pemesanan_paket_id` (`paket_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `paket_wisata`
--
ALTER TABLE `paket_wisata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `fk_pemesanan_paket` FOREIGN KEY (`paket_id`) REFERENCES `paket_wisata` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
