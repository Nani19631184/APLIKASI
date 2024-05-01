-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Jul 2023 pada 16.41
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pelayanan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bimbingan`
--

CREATE TABLE `bimbingan` (
  `bimbingan_id` int(11) NOT NULL,
  `jadwal_tanggal` date NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `jadwal_tgl` datetime NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `penyuluh` int(11) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `binwin`
--

CREATE TABLE `binwin` (
  `binwin_id` int(11) NOT NULL,
  `jadwal_tgl` datetime NOT NULL,
  `jadwal_tanggal` datetime NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `penyuluh` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `haji`
--

CREATE TABLE `haji` (
  `haji_id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `jadwal_id` int(11) NOT NULL,
  `jadwal_tanggal` date NOT NULL,
  `suami` varchar(50) NOT NULL,
  `istri` varchar(50) NOT NULL,
  `wali` varchar(50) NOT NULL,
  `jadwal_tgl` datetime NOT NULL,
  `tempat_nikah` varchar(50) NOT NULL,
  `kelurahan` varchar(50) NOT NULL,
  `penghulu` int(11) NOT NULL,
  `jadwal_ket` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jhaji`
--

CREATE TABLE `jhaji` (
  `jhaji_id` int(11) NOT NULL,
  `jadwal_tanggal` date NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `jadwal_tgl` datetime NOT NULL,
  `penyuluh` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mesjid`
--

CREATE TABLE `mesjid` (
  `id_mesjid` int(11) NOT NULL,
  `id_penyuluh` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `luas tanah` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `nikah`
--

CREATE TABLE `nikah` (
  `nikah_id` int(11) NOT NULL,
  `jadwal_tanggal` date NOT NULL,
  `np` varchar(50) NOT NULL,
  `suami` varchar(50) NOT NULL,
  `tempats` varchar(50) NOT NULL,
  `tl` date NOT NULL,
  `umur` int(11) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `status_s` enum('Perjaka','Duda Mati',' Duda Cerai','Sudah Kawin') NOT NULL,
  `pt` varchar(50) NOT NULL,
  `pkj` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `nik_a` varchar(20) NOT NULL,
  `nik_i` varchar(20) NOT NULL,
  `istri` varchar(50) NOT NULL,
  `tempati` varchar(50) NOT NULL,
  `tli` date NOT NULL,
  `umuri` int(2) NOT NULL,
  `nik_istri` varchar(20) NOT NULL,
  `status_i` enum('Perawan','Janda Mati',' Janda Cerai') NOT NULL,
  `pt_i` varchar(50) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `alamat_i` varchar(100) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `nik_ayah` varchar(20) NOT NULL,
  `nik_ibu` varchar(20) NOT NULL,
  `saksi1` varchar(50) NOT NULL,
  `saksi2` varchar(50) NOT NULL,
  `penghulu` int(11) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penghulu`
--

CREATE TABLE `penghulu` (
  `penghulu_id` int(11) NOT NULL,
  `penghulu` varchar(50) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `penghulu_foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `penghulu`
--

INSERT INTO `penghulu` (`penghulu_id`, `penghulu`, `nip`, `penghulu_foto`) VALUES
(1, 'H. Syamsuri, S.Ag. MHI.', '1976041', '1231959876_Screenshot 2023-07-26 at 17-16-20 Tren Nikah di KUA Karena Gratis Kepala KUA Banjarmasin Timur Beri Tanggapan.jpg'),
(2, 'Abdi Hikmatullah, S.Ag', '1972032', '224967987_IMG_20230726_170017.jpg'),
(3, 'Zainul Erfan, S.S.', '1978800', '1970196471_IMG_20230726_165956.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyuluh`
--

CREATE TABLE `penyuluh` (
  `penyuluh_id` int(11) NOT NULL,
  `penyuluh` varchar(50) NOT NULL,
  `nip` varchar(10) NOT NULL,
  `penyuluh_foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `penyuluh`
--

INSERT INTO `penyuluh` (`penyuluh_id`, `penyuluh`, `nip`, `penyuluh_foto`) VALUES
(1, 'Hj. Hairunnisa, S.Ag.', '1977070', '1600631990_IMG_20230726_170049.jpg'),
(2, 'Mawaddah, S.Ag', '1971090', '1024299381_IMG_20230726_170111.jpg'),
(3, 'Mariansyah, S.Ag', '1967022', '1587297783_IMG20230726(1).jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekomendasi`
--

CREATE TABLE `rekomendasi` (
  `rekomendasi_id` int(11) NOT NULL,
  `jadwal_tanggal` date NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `rekomendasi_foto` varchar(255) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `transaksi_id` int(11) NOT NULL,
  `transaksi_tanggal` date NOT NULL,
  `nama` varchar(50) NOT NULL,
  `transaksi_jenis` enum('Tunai','Transfer') NOT NULL,
  `kategori` int(11) NOT NULL,
  `transaksi_nominal` int(11) NOT NULL,
  `transaksi_foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_nama` varchar(100) NOT NULL,
  `user_username` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_foto` varchar(100) DEFAULT NULL,
  `user_level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `user_nama`, `user_username`, `user_password`, `user_foto`, `user_level`) VALUES
(3, 'User', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', '852945721_kemenag-logo.png', 'user'),
(4, 'Administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3', '166053921_613858027_kemenag-logo - Copy.png', 'administrator');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`jadwal_id`),
  ADD KEY `penghulu` (`penghulu`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indeks untuk tabel `nikah`
--
ALTER TABLE `nikah`
  ADD PRIMARY KEY (`nikah_id`);

--
-- Indeks untuk tabel `penghulu`
--
ALTER TABLE `penghulu`
  ADD PRIMARY KEY (`penghulu_id`);

--
-- Indeks untuk tabel `penyuluh`
--
ALTER TABLE `penyuluh`
  ADD PRIMARY KEY (`penyuluh_id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`transaksi_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `jadwal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `nikah`
--
ALTER TABLE `nikah`
  MODIFY `nikah_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `penghulu`
--
ALTER TABLE `penghulu`
  MODIFY `penghulu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `penyuluh`
--
ALTER TABLE `penyuluh`
  MODIFY `penyuluh_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `transaksi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
