-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Waktu pembuatan: 14 Jul 2025 pada 06.35
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
-- Database: `laravelsurat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategoris`
--

CREATE TABLE `kategoris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judulkategori` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategoris`
--

INSERT INTO `kategoris` (`id`, `judulkategori`, `created_at`, `updated_at`) VALUES
(4, 'Surat Keluar', '2025-07-08 05:41:21', '2025-07-08 05:41:21'),
(5, 'Surat Edaran', '2025-07-08 05:41:21', '2025-07-08 05:41:21'),
(6, 'Surat Tugas', '2025-07-08 05:41:21', '2025-07-08 05:41:21'),
(7, 'Surat Pengumuman', '2025-07-08 05:41:21', '2025-07-08 05:41:21'),
(8, 'Internal Memo', '2025-07-08 05:41:21', '2025-07-08 05:41:21'),
(9, 'Surat Ijin Atasan', '2025-07-08 05:41:21', '2025-07-08 05:41:21'),
(10, 'Surat Perintah', '2025-07-08 05:41:21', '2025-07-08 05:41:21'),
(11, 'Surat Keterangan', '2025-07-08 05:41:21', '2025-07-08 05:41:21'),
(12, 'Surat Rekomendasi', '2025-07-08 05:41:21', '2025-07-08 05:41:21'),
(13, 'Surat Pernyataan', '2025-07-08 05:41:21', '2025-07-08 05:41:21'),
(14, 'Surat Peringatan', '2025-07-08 05:41:21', '2025-07-08 05:41:21'),
(15, 'Surat Pernyataan Tanggung Jawab Mutlak', '2025-07-08 05:41:21', '2025-07-08 05:41:21'),
(16, 'Surat Kuasa', '2025-07-08 05:41:21', '2025-07-08 05:41:21'),
(17, 'Pakta Integritas', '2025-07-08 05:41:21', '2025-07-08 05:41:21'),
(18, 'Surat Perintah Kerja', '2025-07-08 05:41:21', '2025-07-08 05:41:21'),
(19, 'Surat Keputusan Rektor', '2025-07-08 05:41:21', '2025-07-08 05:41:21'),
(20, 'Peraturan Rektor', '2025-07-08 05:41:21', '2025-07-08 05:41:21'),
(21, 'Peraturan Universitas', '2025-07-08 05:41:21', '2025-07-08 05:41:21'),
(22, 'MOU', '2025-07-08 05:41:21', '2025-07-08 05:41:21'),
(23, 'PKS', '2025-07-08 05:41:21', '2025-07-08 05:41:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_07_07_070954_create_kategoris_table', 1),
(6, '2025_07_07_085700_create_surat_table', 2),
(7, '2025_07_08_025212_add_qrcode_to_surat_table', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `idpegawai` int(11) NOT NULL,
  `nama` varchar(500) NOT NULL,
  `nip` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `jabatan` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`idpegawai`, `nama`, `nip`, `email`, `jabatan`) VALUES
(2, 'Fahrul Adib', '1253212343245', 'fahruladib9@gmail.com', 'kepala'),
(3, 'Hari', '0921412', 'hari@gmail.com', 'Staff'),
(4, 'Melati', '05892015', 'melati@gmail.com', 'Staff');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat`
--

CREATE TABLE `surat` (
  `idsurat` bigint(20) UNSIGNED NOT NULL,
  `idkategori` bigint(20) UNSIGNED NOT NULL,
  `nosurat` varchar(255) NOT NULL,
  `dari` varchar(255) NOT NULL,
  `tujuan` varchar(255) NOT NULL,
  `judulsurat` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `deskripsisurat` text NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  `namattd` varchar(255) NOT NULL,
  `fotottd` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `qrcode` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `surat`
--

INSERT INTO `surat` (`idsurat`, `idkategori`, `nosurat`, `dari`, `tujuan`, `judulsurat`, `tanggal`, `deskripsisurat`, `file`, `namattd`, `fotottd`, `created_at`, `updated_at`, `qrcode`) VALUES
(15, 7, 'SP-001', 'Kelurahan ABX', 'Kepala RT Desa ABX', 'Rapat seluruh RT', '2025-07-09', '<p>Diharapkan seluruh RT keluarahan ABX dapat menghadiri rapat ini</p>', 'surat/u0iEOpsOo1hkMG8f6375jMIcd5JwbD1xU0OYMjbG.pdf', 'Kepala Desa ABX', 'ttd/OdTqnkgBUvOYaQ6KrMwxLEvomGRWbsx5Lj3R2jRt.jpg', '2025-07-07 22:48:45', '2025-07-07 22:48:45', 'qrcode/qrcode-15.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `idusers` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` text NOT NULL,
  `level` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`idusers`, `nama`, `email`, `password`, `level`) VALUES
(1, 'Admin', 'admin@gmail.com', 'admin', 'Admin'),
(24, 'Feby Saputra', 'arsiparis@gmail.com', 'arsiparis', 'Arsiparis'),
(25, 'M. Ridwan Tri Saputra', 'kasubbag@gmail.com', 'kasubbag', 'Kasubbag Tatausaha'),
(26, 'Ade Kusuma', 'kepalabiro@gmail.com', 'kepalabiro', 'Kepala Biro');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`idpegawai`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `surat`
--
ALTER TABLE `surat`
  ADD PRIMARY KEY (`idsurat`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idusers`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `idpegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `surat`
--
ALTER TABLE `surat`
  MODIFY `idsurat` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `idusers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
