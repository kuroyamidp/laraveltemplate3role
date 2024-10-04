-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Sep 2024 pada 04.02
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel3role`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensis`
--

CREATE TABLE `absensis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uid` char(36) NOT NULL,
  `kode_absen` varchar(255) NOT NULL,
  `progdi_id` varchar(255) DEFAULT NULL,
  `mahasiswa_id` varchar(255) NOT NULL,
  `kelas_id` varchar(255) NOT NULL,
  `status_absensi` int(11) DEFAULT NULL,
  `hari` text NOT NULL,
  `latitude` varchar(100) DEFAULT NULL,
  `longitude` varchar(100) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `absensis`
--

INSERT INTO `absensis` (`id`, `uid`, `kode_absen`, `progdi_id`, `mahasiswa_id`, `kelas_id`, `status_absensi`, `hari`, `latitude`, `longitude`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(37, '142e26d0-f37d-4116-a6db-986be3a2e439', '0094576235', '8', '21', '5', 1, '2024-08-05 10:02:25', '-7.048701043516936', '110.05100357055717', '1722826945-siwa.jpg', '2024-08-05 03:02:25', '2024-08-19 06:49:49', NULL),
(38, 'a36087be-902c-4f32-b116-0fb1d0014c73', '0091773634', '8', '22', '5', 1, '2024-08-07 20:24:34', '-6.9881095', '110.44363850000002', '1723037074-siwa.jpg', '2024-08-07 13:24:34', '2024-08-07 13:24:34', NULL),
(39, '808ebfcd-163f-40ec-a430-db7f09036dac', '0091773634', '8', '22', '5', 0, '2024-08-08 11:11:02', '-6.989260918286992', '110.43538783313137', '1723090262-Siswi.png', '2024-08-08 04:11:04', '2024-08-08 07:21:41', '2024-08-08 07:21:41'),
(40, 'e01183f9-a317-4247-818a-5f3cb8bcd554', '0091773634', '8', '22', '5', 1, '2024-08-08 14:26:15', '-6.9893443843439025', '110.4353795865197', '1723101975-Siswi.png', '2024-08-08 07:26:15', '2024-08-08 07:26:15', NULL),
(41, '68db1747-ce43-46c5-a3dc-5be36fc04368', '0091773634', '8', '22', '5', 1, '2024-08-18 21:14:02', '-6.9714', '110.4254', '1723990442-5-makanan-enak-dari-indonesia-dan-malaysia-yang-terkenal-enak-5.jpeg', '2024-08-18 14:14:02', '2024-08-18 14:14:02', NULL),
(42, 'b805ebdc-af8d-402d-af0e-f1fdbed69adb', '0091773634', '8', '22', '5', 1, '2024-08-19 12:39:33', '-6.9714', '110.4254', '1724045973-images.jpg', '2024-08-19 05:39:33', '2024-08-19 05:39:33', NULL),
(43, '6e9db9a2-ee47-4e9d-a383-70b516a53b4c', '0091773634', '8', '22', '5', 1, '2024-08-19 13:47:22', '-6.989299468754398', '110.43530807366258', '1724050042-Siswi.png', '2024-08-19 06:47:22', '2024-08-19 06:47:22', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftarkelas_models`
--

CREATE TABLE `daftarkelas_models` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uid` char(36) NOT NULL,
  `kode_kelas` varchar(255) NOT NULL,
  `progdi_id` varchar(255) NOT NULL,
  `makul_id` varchar(255) NOT NULL,
  `dosen_id` varchar(255) NOT NULL,
  `ruang_id` varchar(255) NOT NULL,
  `start` varchar(255) NOT NULL,
  `hari` varchar(255) NOT NULL,
  `semester` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `daftarkelas_models`
--

INSERT INTO `daftarkelas_models` (`id`, `uid`, `kode_kelas`, `progdi_id`, `makul_id`, `dosen_id`, `ruang_id`, `start`, `hari`, `semester`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '47c83a23-c6dd-4ebc-b91f-4e94a8fca269', '1', '8', '19', '15', '4', '07:30-09:15', 'Senin', '5', '2024-08-19 06:59:33', '2024-08-19 06:59:33', NULL),
(2, '3b8da2b6-b86e-419e-be1e-2e1fb62dae3f', '2', '8', '17', '16', '4', '09:15-11:00', 'Senin', '5', '2024-08-19 06:59:33', '2024-08-19 06:59:33', NULL),
(3, 'a7462644-503b-4279-b33b-8635e640d1f8', '3', '8', '18', '15', '4', '11:00-12:45', 'Senin', '5', '2024-08-19 06:59:33', '2024-08-19 06:59:33', NULL),
(4, '6e301047-1cfb-4dbf-b3b8-aa7bf264b658', '4', '9', '20', '19', '5', '07:30-09:15', 'Senin', '5', '2024-08-19 06:59:33', '2024-08-19 06:59:33', NULL),
(5, '47d681ae-3d3f-48a1-8e06-0bc850d14a0b', '5', '9', '22', '21', '5', '09:15-11:00', 'Senin', '5', '2024-08-19 06:59:33', '2024-08-19 06:59:33', NULL),
(6, 'c239d586-031b-4718-a4b1-b7ac76bae784', '6', '9', '23', '23', '5', '11:00-12:45', 'Senin', '5', '2024-08-19 06:59:33', '2024-08-19 06:59:33', NULL),
(7, '0d24fb75-6a8d-43e5-9c44-46b495aed019', '7', '8', '21', '17', '4', '12:45-14:30', 'Senin', '5', '2024-08-19 06:59:33', '2024-08-19 06:59:33', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar_kelas`
--

CREATE TABLE `daftar_kelas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uid` char(36) NOT NULL,
  `kode_kelas` varchar(255) NOT NULL,
  `progdi_id` bigint(20) UNSIGNED NOT NULL,
  `makul_id` bigint(20) UNSIGNED NOT NULL,
  `dosen_id` bigint(20) UNSIGNED NOT NULL,
  `ruang_id` bigint(20) UNSIGNED NOT NULL,
  `hari` varchar(50) DEFAULT NULL,
  `start` varchar(255) DEFAULT NULL,
  `semester` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uid` char(36) NOT NULL,
  `progdi_id` bigint(20) UNSIGNED DEFAULT NULL,
  `kelas_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nama` text NOT NULL,
  `nidn` text NOT NULL COMMENT 'nomor_induk_dosen',
  `perguruan_tinggi` varchar(255) NOT NULL,
  `jenis_kelamin` int(11) NOT NULL COMMENT '1 laki_laki; 2 perempuan',
  `jabatan_fungsional` varchar(255) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`id`, `uid`, `progdi_id`, `kelas_id`, `user_id`, `nama`, `nidn`, `perguruan_tinggi`, `jenis_kelamin`, `jabatan_fungsional`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(14, 'd8fd0ae1-553f-43b9-a27c-3db90216c9fc', 8, 5, NULL, 'Sri Ambarwati, S.Pd, M.Pd', '197508212008012005', 'SMK N 5 KENDAL', 1, 'Guru', '1722769688-cewe.jpeg', '2024-08-04 11:08:08', '2024-08-04 11:28:55', '2024-08-04 11:28:55'),
(15, '9e7c5572-d965-4f8f-af7d-2ed8537c725c', 8, 5, 19, 'Sri Ambarwati, S.Pd, M.Pd', '197508212008012005', 'SMK N 5 KENDAL', 2, 'Guru', '1722771144-cewe.jpeg', '2024-08-04 11:32:24', '2024-08-19 05:44:12', NULL),
(16, 'fbd62daa-c66c-4920-948b-7c2fa1ec4bc1', 9, 5, 26, 'Sanaji, S.Pd', '196809022008011007', 'SMK N 5 KENDAL', 1, 'Guru', '1722771182-cowo.jpeg', '2024-08-04 11:33:02', '2024-08-19 06:46:03', NULL),
(17, 'a31b7481-6ce1-4cf1-aa93-dd0513878a45', 10, 5, NULL, 'Teguh Waluyo, S.Pd, M.Pd', '197007152008011008', 'SMK N 5 KENDAL', 1, 'Guru', '1722771211-cowo.jpeg', '2024-08-04 11:33:31', '2024-08-04 11:33:31', NULL),
(18, '76793ec2-e1d4-48fa-95f9-d12e3b9aff3a', 8, 6, NULL, 'Masduki, S.Pd', '196906062008011020', 'SMK N 5 KENDAL', 1, 'Guru', '1722771240-cowo.jpeg', '2024-08-04 11:34:00', '2024-08-19 05:44:05', NULL),
(19, 'b6d49226-097c-42e5-bfce-9a8134ce8dfa', 9, 6, NULL, 'Drs. Yulianto, M.Pd', '196509182007011011', 'SMK N 5 KENDAL', 1, 'Guru', '1722771277-cowo.jpeg', '2024-08-04 11:34:37', '2024-08-04 11:34:37', NULL),
(20, '6b26ff73-9a72-4689-a5ac-e52f25293370', 10, 6, 21, 'Makmum Muhaimin, S.Pd', '196510242008011002', 'SMK N 5 KENDAL', 1, 'Guru', '1722771326-cowo.jpeg', '2024-08-04 11:35:26', '2024-08-19 05:43:38', NULL),
(21, 'b6ef0e54-e878-4cd6-8fd2-204e6b9f8499', 10, 7, NULL, 'Misran, S.Pd', '196511112007011016', 'SMK N 5 KENDAL', 1, 'Guru', '1722771355-cowo.jpeg', '2024-08-04 11:35:55', '2024-08-19 05:43:49', NULL),
(22, '98e331ee-94c9-4888-94de-872ad7feb6a1', 10, 7, NULL, 'Tri Budi Utami, S.Pd', '197505202008012020', 'SMK N 5 KENDAL', 1, 'Guru', '1722771388-cowo.jpeg', '2024-08-04 11:36:28', '2024-08-19 05:43:58', NULL),
(23, '8096569d-c389-4bfe-9377-8522bbaafbfb', 10, 7, NULL, 'Sri Joko Wuryanto, S.Pd', '196811262008011005', 'SMK N 5 KENDAL', 1, 'Guru', '1722771415-cowo.jpeg', '2024-08-04 11:36:55', '2024-08-04 11:36:55', NULL),
(24, 'ca13b74a-9ba4-4bc9-b2d1-2f9428cd3490', 8, 5, NULL, 'asdas', '12312', 'SMK N 5 KENDAL', 1, 'asdasd', '1723099550-siwa.jpg', '2024-08-08 06:45:50', '2024-08-08 06:46:20', '2024-08-08 06:46:20'),
(25, 'ac9b508d-e191-481c-abd9-23937f773511', 8, 5, NULL, 'we', '1234', 'SMK N 5 KENDAL', 1, 'tyu', '1723101006-siwa.jpg', '2024-08-08 07:10:06', '2024-08-18 13:45:34', '2024-08-18 13:45:34'),
(27, '4e32b758-54ac-49d7-9fa9-6ddc07252a94', 10, 5, NULL, 'Rizal', '098000', 'SMK N 5 KENDAL', 1, 'Guru', '1724049693-siwa.jpg', '2024-08-19 06:41:33', '2024-08-19 06:42:09', '2024-08-19 06:42:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `forms`
--

CREATE TABLE `forms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uid` char(36) NOT NULL,
  `kode_form` varchar(255) NOT NULL,
  `abc` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uid` char(36) NOT NULL,
  `kode_kelas` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL COMMENT 'nama_kelas',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id`, `uid`, `kode_kelas`, `nama`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, '879bb624-5dd4-4b53-a078-6828ccd913ae', '1', 'X', '2024-08-03 09:57:10', '2024-08-03 09:57:10', NULL),
(6, 'f7d22fa8-4a3d-4a45-bcf1-8ee9bd24f845', '2', 'XI', '2024-08-03 09:57:21', '2024-08-03 09:57:21', NULL),
(7, '97083822-a8f5-4cf9-9086-701f980014db', '3', 'XII', '2024-08-03 09:57:29', '2024-08-03 09:57:29', NULL),
(8, '1097b767-e521-48c3-982d-6ab1190247c7', '4', 'IXX', '2024-08-19 06:37:05', '2024-08-19 06:37:15', '2024-08-19 06:37:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keterangan_guru`
--

CREATE TABLE `keterangan_guru` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dosen_id` bigint(20) UNSIGNED NOT NULL,
  `daftarkelas_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `keterangan_guru`
--

INSERT INTO `keterangan_guru` (`id`, `dosen_id`, `daftarkelas_id`, `tanggal`, `keterangan`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(12, 11, 2, '2024-07-30', 'tes', 'images/mqS5icf4SUECGOVw8nvEE2ICHsSAhNd77SFac9cB.png', '2024-07-30 06:25:11', '2024-07-30 06:25:11', NULL),
(13, 11, 2, '2024-07-30', 'yet', 'images/ZDiRUXFBn5Dgg1EDZNmlZDFQbHb5Co0lP8jUHtbC.jpg', '2024-07-30 06:25:29', '2024-07-30 06:25:29', NULL),
(14, 11, 2, '2024-07-30', 'asdasdas', 'images/DueX2CcM9faHtblBqK9PIJeynhWPK7RIOz0m4MOc.jpg', '2024-07-30 06:28:36', '2024-07-30 06:28:36', NULL),
(15, 11, 2, '2024-07-30', 'alim prikitiw', 'images/LrlsbG89JNLI6OnBJR998FZKAxT9uQfD9DjbschX.jpg', '2024-07-30 06:34:37', '2024-07-30 06:34:37', NULL),
(16, 11, 1, '2024-07-31', 'test', 'images/sOgtJCvLPinHhTKpx1oroCXsFd8WzhHsNhzDMVyE.png', '2024-07-31 06:53:20', '2024-07-31 06:53:20', NULL),
(17, 11, 1, '2024-07-31', 'ola amigos', 'images/9mnNnVoH639i318xtbm0b110pqswjcx83MUsDrts.png', '2024-07-31 06:59:50', '2024-07-31 06:59:50', NULL),
(18, 11, 3, '2024-08-01', '12312312312', 'images/pUX8m3zZd6NCJscaM77yA35GurycBkmjzIF1iysV.png', '2024-08-01 07:10:00', '2024-08-01 07:10:00', NULL),
(19, 15, 1, '2024-08-04', 'tes', 'images/i27ekHxn26856TkdP8CaF3EIw1F3vhWRQPWYI94X.jpg', '2024-08-04 15:05:03', '2024-08-04 15:05:03', NULL),
(20, 20, 2, '2024-08-05', 'qwertyui', 'images/oWUzadzRLGRZfvGa9Ob2m69izIOukruRzl1Slslz.png', '2024-08-05 03:05:39', '2024-08-05 03:05:39', NULL),
(21, 15, 1, '2024-08-07', 'asggg', 'images/TwOxg8Ruu98bFTI73QRc5LZ9Ti82Hc0C4gNZiXqi.png', '2024-08-07 13:23:54', '2024-08-07 13:23:54', NULL),
(22, 15, 1, '2024-08-08', 'asda', 'images/Wq9RURPuaoA5XjHJU62wX9Bn3qimVcT2tg8dVLWc.png', '2024-08-08 06:52:24', '2024-08-08 06:52:24', NULL),
(23, 15, 1, '2024-08-08', 'wqe', 'images/ac3WxPdGG2h4mzQx9DhC2I06pYlZibs7kJM7VlSq.png', '2024-08-08 07:25:14', '2024-08-08 07:25:14', NULL),
(24, 15, 1, '2024-08-19', 'Pelajaran Hari Senin', 'images/4heXx7xFNRwDAIzNCqWTGKW5RYCRToG2J4iYlGLV.jpg', '2024-08-19 06:48:29', '2024-08-19 06:48:29', NULL),
(25, 15, 1, '2024-09-02', 'tes', 'images/14iO4W2TRx1J9rNR5lC6nZDL2LmCcVfXNDjGzv06.jpg', '2024-09-02 14:34:23', '2024-09-02 14:34:23', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uid` char(36) NOT NULL,
  `progdi_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nim` text NOT NULL COMMENT 'nomor_induk_mahasiswa',
  `nama` varchar(255) NOT NULL,
  `jenis_kelamin` int(11) NOT NULL COMMENT '1 laki_laki; 2 perempuan',
  `perguruan_tinggi` varchar(255) NOT NULL,
  `image` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `semester_id` varchar(100) DEFAULT NULL,
  `nis` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `uid`, `progdi_id`, `user_id`, `nim`, `nama`, `jenis_kelamin`, `perguruan_tinggi`, `image`, `created_at`, `updated_at`, `deleted_at`, `semester_id`, `nis`) VALUES
(21, '0d0d872d-a269-4d07-b592-7e6d2b5b3966', 8, 20, '0094576235', 'Alvia Nav\'A Aisyah', 2, 'SMK N 5 KENDAL', '1722680209-Siswi.png', '2024-08-03 10:10:16', '2024-08-05 02:59:20', NULL, '5', '5904'),
(22, 'd6eae26f-0f26-42dd-95d1-e59e0d8e1c93', 8, 22, '0091773634', 'Amalia Ramadhany', 2, 'SMK N 5 KENDAL', '1722680760-Siswi.png', '2024-08-03 10:26:00', '2024-08-05 03:46:26', NULL, '5', '5905'),
(23, 'fa996314-f04b-4e91-9362-a72123a750ce', 8, 25, '0091176659', 'Anindita Revi Aulia', 2, 'SMK N 5 KENDAL', '1722680832-Siswi.png', '2024-08-03 10:27:12', '2024-08-19 06:45:22', NULL, '5', '5906'),
(24, '5e8c489b-0432-4d9a-a684-08a9033e2e6c', 8, 23, '0095159101', 'Aufa Muhammad Yasin', 1, 'SMK N 5 KENDAL', '1722680859-siwa.jpg', '2024-08-03 10:27:39', '2024-08-08 07:23:07', NULL, '5', '5907'),
(25, 'a3ab1dc1-540d-48bc-81ab-ff88ca43a683', 9, 24, '0099610342', 'Airin Rahma Qotrun Nada', 2, 'SMK N 5 KENDAL', '1722681072-Siswi.png', '2024-08-03 10:31:12', '2024-08-19 03:00:03', NULL, '5', '5940'),
(26, '164a768f-dcef-419f-84ee-7f990395bf89', 9, NULL, '0098918606', 'Andien', 2, 'SMK N 5 KENDAL', '1722681102-Siswi.png', '2024-08-03 10:31:42', '2024-08-03 10:31:42', NULL, '5', '5941'),
(27, '87b8272e-c309-4d0e-b295-6c4859211592', 9, NULL, '0082463595', 'Bayu Aji Setiawan', 1, 'SMK N 5 KENDAL', '1722681133-siwa.jpg', '2024-08-03 10:32:13', '2024-08-03 10:32:13', NULL, '5', '5942'),
(28, 'a180758a-ca92-4383-8c61-553fdad8c1b8', 10, NULL, '0078161496', 'Adi Saputra', 1, 'SMK N 5 KENDAL', '1722681170-siwa.jpg', '2024-08-03 10:32:50', '2024-08-03 10:32:50', NULL, '5', '5976'),
(29, 'f6707fc3-c80e-4bfb-9946-2cfa9204f5aa', 10, NULL, '0098353030', 'Ariska Noviana', 2, 'SMK N 5 KENDAL', '1722681197-Siswi.png', '2024-08-03 10:33:17', '2024-08-03 10:33:17', NULL, '5', '5977'),
(30, '4f44c697-2c06-4e30-9281-593cfb8f9495', 10, NULL, '0094543623', 'Bilqis Meylani Primadhani', 2, 'SMK N 5 KENDAL', '1722681232-Siswi.png', '2024-08-03 10:33:52', '2024-08-03 10:33:52', NULL, '5', '5978'),
(31, '79c58b01-b8e2-44d7-a51a-6580cf156593', 8, NULL, '123214', 'ghfasd', 1, 'SMK N 5 KENDAL', '1723099358-siwa.jpg', '2024-08-08 06:42:38', '2024-08-18 14:05:52', '2024-08-18 14:05:52', '5', '1234'),
(32, '6098737f-1d92-4a73-ba97-4f64a064db90', 8, NULL, '12', 'yui', 1, 'SMK N 5 KENDAL', '1723100910-Siswi.png', '2024-08-08 07:08:30', '2024-08-08 07:08:51', '2024-08-08 07:08:51', '5', '1234'),
(33, '9c0b9e2e-b37a-4b28-b919-90eceba44754', 8, NULL, '5677', 'Muhammad Fahrur Rizal', 1, 'SMK N 5 KENDAL', '1724049605-01hda7wa68gv1xsj2t8b9a185e.png', '2024-08-19 06:39:31', '2024-08-19 06:40:11', '2024-08-19 06:40:11', '6', '123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mata_kuliah`
--

CREATE TABLE `mata_kuliah` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uid` char(36) NOT NULL,
  `kode_mk` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL COMMENT 'nama_mata_kuliah',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mata_kuliah`
--

INSERT INTO `mata_kuliah` (`id`, `uid`, `kode_mk`, `nama`, `created_at`, `updated_at`, `deleted_at`) VALUES
(17, '00a95b78-b9f1-4d5a-84a5-614579c2c477', '1', 'Informatika', '2024-08-03 10:41:54', '2024-08-03 10:45:10', NULL),
(18, '76a898db-64dd-4bc1-98a3-41b4442efb6c', '2', 'Bimbingan Dan Konseling', '2024-08-03 10:42:45', '2024-08-03 10:43:14', NULL),
(19, 'c296df30-ccb8-4ff2-9fc0-5cd58fd9cace', '3', 'Dasar-dasar Pengembangan Perangkat Lunak dan Gim', '2024-08-03 10:43:31', '2024-08-03 10:43:31', NULL),
(20, 'b23aaf99-4cdc-40e2-96c0-1d454d8a4b1f', '4', 'Bahasa Inggris', '2024-08-03 10:44:37', '2024-08-03 10:44:37', NULL),
(21, 'cfc452d2-268c-4a56-85dd-9356cab07b96', '5', 'Pendidikan Jasmani, Olahraga, dan Kesehatan', '2024-08-03 10:45:07', '2024-08-03 10:45:07', NULL),
(22, '00c76eb9-edc0-46b6-a33b-40b56ac96536', '6', 'Pendidikan Ilmu Pengetahuan Alam Dan Sosial', '2024-08-03 10:45:47', '2024-08-03 10:47:03', NULL),
(23, 'c0735f7e-3649-4d8d-831d-cbe94d8909b8', '7', 'Pendidikan Agama Dan Budi Pekerti', '2024-08-03 10:48:23', '2024-08-03 10:48:23', NULL),
(24, '625ad7e4-faac-4ba7-b5f3-3f501764638a', '8', 'JC', '2024-08-03 10:48:53', '2024-08-03 10:48:53', NULL),
(25, '07ebcc44-fa5b-4e49-ad54-de30476118f1', '9', 'Pendidikan Pancasila', '2024-08-03 10:49:19', '2024-08-03 10:49:19', NULL),
(26, '4ea5160d-5f6e-4c85-9726-1730a4d7efea', '10', 'Seni Musik', '2024-08-03 10:49:35', '2024-08-03 10:49:35', NULL),
(27, 'e56fdff2-0bec-4cc4-bffc-6e38cdba9093', '11', 'Matematika', '2024-08-03 10:49:48', '2024-08-03 10:49:48', NULL),
(28, '284a679a-f379-4c80-a9e8-e78d9f51155e', '12', 'Bahasa Jawa', '2024-08-03 10:50:09', '2024-08-03 10:50:09', NULL),
(29, '8d901614-24b5-4a2d-82b1-c598120881e9', '13', 'Sejarah', '2024-08-03 10:50:21', '2024-08-03 10:50:21', NULL),
(30, '86a21e6d-b823-42ff-a80e-867a0ee2a92d', '14', 'Bahasa Indonesia', '2024-08-03 10:50:50', '2024-08-03 10:50:50', NULL),
(34, 'f89b20dd-dfba-4a47-9216-46fab162132e', '15', 'PPGR', '2024-08-19 06:35:52', '2024-08-19 06:36:20', '2024-08-19 06:36:20');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_11_11_012743_create_matakuliah_models_table', 1),
(6, '2022_11_11_020415_create_ruang_models_table', 1),
(7, '2022_11_11_021008_create_progdi_models_table', 1),
(8, '2022_11_11_022935_create_dosen_models_table', 1),
(9, '2022_11_11_030958_create_mahasiswa_models_table', 1),
(10, '2022_11_18_051540_create_daftarkelas_models_table', 1),
(11, '2022_11_22_032727_create_jadwalkelas_models_table', 1),
(12, '2022_11_24_104438_update_colom_mahasiswa', 1),
(13, '2022_11_24_134048_create_provinsi_models_table', 1),
(14, '2022_11_24_140956_create_datapribadimahasiswa_models_table', 1),
(15, '2022_11_24_141751_create_krs_table', 1),
(16, '2023_02_20_143618_create_daftarsidangs_table', 2),
(17, '2023_02_21_082533_create_daftar_sidang_models_table', 3),
(18, '2023_02_22_085505_create_daftarsidang_models_table', 4),
(19, '2023_02_20_132920_create_daftarsidangs_table', 5),
(20, '2023_02_24_134102_create_nilai_ujian_models_table', 5),
(21, '2023_02_24_152907_nilai_ujian', 6),
(22, '2023_02_24_153413_nilai_ujian', 7),
(23, '2023_02_27_105707_create_jadwalujians_table', 8),
(24, '2023_02_27_144110_create_krs_table', 9),
(25, '2023_03_03_134433_create_daftar_wisuda_table', 10),
(26, '2024_04_23_121433_kelas', 11),
(28, '2024_04_29_180102_create_absensis_table', 12),
(29, '2024_05_01_080310_create_absensis_table', 13),
(30, '2024_05_01_080737_create_absen_table', 14),
(31, '2024_05_22_122917_create_waktus_table', 15),
(32, '2023_02_24_105401_create_jadwalujians_table', 16),
(33, '2023_03_01_133026_create_nilai_ujian_table', 16),
(34, '2023_03_03_150128_create_khs_table', 16),
(35, '2023_04_03_165632_create_daftar_wisudas_table', 16),
(36, '2023_04_04_141144_create_daftarsidangs_table', 16),
(37, '2024_07_03_151558_create_daftarkelas_models_table', 16),
(38, '2024_07_29_160342_create_keterangan_dosen_table', 17),
(39, '2024_07_29_160342_create_keterangan_guru_table', 18),
(40, '2024_09_02_121451_create_forms_table', 19);

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
-- Struktur dari tabel `progdi`
--

CREATE TABLE `progdi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uid` char(36) NOT NULL,
  `kode_progdi` varchar(255) NOT NULL,
  `nama_studi` varchar(255) NOT NULL,
  `singkatan_studi` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `progdi`
--

INSERT INTO `progdi` (`id`, `uid`, `kode_progdi`, `nama_studi`, `singkatan_studi`, `created_at`, `updated_at`, `deleted_at`) VALUES
(8, '1d1acb3b-de09-4677-bbff-658ba03855c4', '1', 'Pengembangan Perangkat Lunak dan Gim 1', 'PPLG 1', '2024-08-03 09:58:01', '2024-08-03 10:28:16', NULL),
(9, 'b2b13f3d-9219-4b9d-a984-896f12d66005', '2', 'Pengembangan Perangkat Lunak dan Gim 2', 'PPLG 2', '2024-08-03 10:28:39', '2024-08-03 10:28:39', NULL),
(10, '2c8ab3d3-b47a-47c6-bb5a-c77c3a76fbf9', '3', 'Pengembangan Perangkat Lunak dan Gim 3', 'PPLG 3', '2024-08-03 10:30:20', '2024-08-03 10:30:20', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruang`
--

CREATE TABLE `ruang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uid` char(36) NOT NULL,
  `kode_ruang` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL COMMENT 'nama_ruang_kelas',
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0 inactive; 1 active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ruang`
--

INSERT INTO `ruang` (`id`, `uid`, `kode_ruang`, `nama`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, '74160d61-c093-4242-b08a-b8b2c1dd090f', '1', 'A-1', 0, '2024-08-04 08:36:10', '2024-08-04 08:36:10', NULL),
(5, '733758d4-b516-4526-81c2-bd1739e5f6af', '2', 'A-2', 0, '2024-08-04 08:36:17', '2024-08-04 08:36:17', NULL),
(6, 'adf8de78-b3db-48eb-b0fe-a6f8d272f82d', '3', 'A-3', 0, '2024-08-04 08:36:27', '2024-08-04 08:36:27', NULL),
(7, 'd55a5276-a4c5-4b85-a789-11c79e3bf267', '4', 'B-1', 0, '2024-08-04 08:36:39', '2024-08-04 08:36:39', NULL),
(8, '4eadde51-b623-461e-93c2-0dd4bff2b7ce', '5', 'B-2', 0, '2024-08-04 08:36:50', '2024-08-04 08:36:50', NULL),
(9, '2fa47560-8870-441f-ad60-199e0924eaf3', '6', 'B-3', 0, '2024-08-04 08:37:01', '2024-08-04 08:37:01', NULL),
(10, '23cf57e2-3fd4-45fd-b258-2fb4c0bad8a3', '7', 'C-1', 0, '2024-08-04 08:37:08', '2024-08-04 08:37:21', NULL),
(11, '16e4a260-03fd-4315-836d-d3e635e1ffa1', '8', 'C-2', 0, '2024-08-04 08:37:15', '2024-08-04 08:37:26', NULL),
(12, '5a422b7e-57ea-4586-96a5-49d127b9e6be', '9', 'C-3', 0, '2024-08-04 08:37:43', '2024-08-04 08:37:43', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uid` char(36) NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT 0 COMMENT '0 admin/BAK; 1 dosen; 2 mahasiswa;',
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `uid`, `role_id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'c4e40e5a-1b15-48bb-a4ed-954adf4e4c1e', 0, 'Root', 'root@root.root', NULL, '$2y$10$qBr0bcLU4/YO1fNrXdj0X./OlvtuHshV4JW0pJu6oGv7i8AwSLUae', NULL, NULL, NULL, NULL),
(19, 'ba0e5a4b-6668-4307-9c2a-d1d6126174d9', 1, 'Sri Ambarwati, S.Pd, M.Pd', 'sriambarwat@gmail.com', NULL, '$2y$10$flU8suJrxy8qWqrzQaqQJ.gReVX.7KxeSr/BrfJA0yDQVVq.9X8Ae', NULL, '2024-08-04 15:04:24', '2024-08-04 15:04:24', NULL),
(20, 'c4f32fe7-a74b-455a-a2df-5c34c175de47', 2, 'Alvia Nav\'A Aisyah', 'alv@gmail.com', NULL, '$2y$10$OGN7a.Em7Ad8OcwwIW9iDu02Uj.DzD806t5T7lIP6L5oPMOa3gJ4C', NULL, '2024-08-05 02:59:20', '2024-08-05 02:59:20', NULL),
(21, '67dcad05-8af5-4e4e-86c0-d404d00f6f00', 1, 'Makmum Muhaimin, S.Pd', 'muh@gmail.com', NULL, '$2y$10$XduteKgirAr.whRdq/S.ke8zwxPYjdsXsxS8pCrNuU10aQ0zMkZpG', NULL, '2024-08-05 03:03:29', '2024-08-05 03:03:29', NULL),
(22, '4252bc32-37a2-492d-bb93-8d9adbd4ae7a', 2, 'Amalia Ramadhany', 'amalia@gmail.com', NULL, '$2y$10$1SbJeUz3mNM6vq3EcAJQTODSD5X9VAo/zIY/APfuaIIy17DdWZ59.', NULL, '2024-08-05 03:46:26', '2024-08-05 03:46:26', NULL),
(23, '8b3204ef-0f5b-4ed6-8fb1-9a91ea12734a', 2, 'Aufa Muhammad Yasin', 'qwer@gmail.com', NULL, '$2y$10$x/lJlrFzDPU6XHdSWlG9k.XSTYFNvCJ6NY4uehitkktU9iGDve.4u', NULL, '2024-08-08 07:23:07', '2024-08-08 07:23:23', '2024-08-08 07:23:23'),
(24, '70540cdf-30d9-4015-9d55-a6c1c21e8d63', 2, 'Airin Rahma Qotrun Nada', 'arin@gmail.com', NULL, '$2y$10$n8ZAPG7tekkjw5u1qmUnNup2v8Z1CAKoQpJjd8cYytIFAry.oHKvi', NULL, '2024-08-19 03:00:03', '2024-08-19 03:00:03', NULL),
(25, '08a1d347-5d84-434d-a38d-a92a98c2315a', 2, 'Anindita Revi Aulia', 'Anindita@gmail.com', NULL, '$2y$10$bhlLdKbE8UhMORjJ9nslsOXcJ7yjWgEkLOnHSvSGKljTh1.PuELhW', NULL, '2024-08-19 06:45:22', '2024-08-19 06:45:22', NULL),
(26, 'a42205dc-c414-451c-999f-0f24ecb1e5f3', 1, 'Sanaji, S.Pd', 'sanaji@gmail.com', NULL, '$2y$10$pi24F0KFPz2tvwL6yhGxveF6OHNcskew5AnQVlGl2o2Iu6sB.NBKq', NULL, '2024-08-19 06:46:03', '2024-08-19 06:46:03', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `waktus`
--

CREATE TABLE `waktus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uid` char(36) NOT NULL,
  `kode_waktu` varchar(255) NOT NULL,
  `jam` varchar(255) NOT NULL COMMENT 'Waktu start dan berhenti (format: HH:MM-HH:MM)',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `waktus`
--

INSERT INTO `waktus` (`id`, `uid`, `kode_waktu`, `jam`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 'b3a08592-df4e-476e-8ed2-b010b00a1065', '1', '07:30-09:15', '2024-08-04 08:38:45', '2024-08-04 10:34:20', NULL),
(7, '1a8c634a-f5cc-404d-a211-71897c9cf1f6', '2', '09:15-11:00', '2024-08-04 08:42:04', '2024-08-04 10:36:34', NULL),
(8, '7c1d802a-f984-408f-903b-39cb8aad8a3e', '3', '11:00-12:45', '2024-08-04 08:46:19', '2024-08-04 10:37:54', NULL),
(9, 'cfe8a239-25b0-463d-9528-00d57473b792', '4', '12:45-14:30', '2024-08-04 08:46:48', '2024-08-04 10:38:58', NULL),
(10, 'a6b98930-5adf-4a63-afff-e23dee3f425f', '5', '14:30-16:15', '2024-08-04 10:40:36', '2024-08-04 10:40:36', NULL),
(11, 'c79a34eb-1c92-4e6c-aa4a-31eadf939b67', '10', '07:30-08:15', '2024-08-05 03:08:42', '2024-08-07 13:36:39', '2024-08-07 13:36:39');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absensis`
--
ALTER TABLE `absensis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `absen_uid_index` (`uid`);

--
-- Indeks untuk tabel `daftarkelas_models`
--
ALTER TABLE `daftarkelas_models`
  ADD PRIMARY KEY (`id`),
  ADD KEY `daftarkelas_models_uid_index` (`uid`);

--
-- Indeks untuk tabel `daftar_kelas`
--
ALTER TABLE `daftar_kelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `daftar_kelas_progdi_id_foreign` (`progdi_id`),
  ADD KEY `daftar_kelas_makul_id_foreign` (`makul_id`),
  ADD KEY `daftar_kelas_dosen_id_foreign` (`dosen_id`),
  ADD KEY `daftar_kelas_ruang_id_foreign` (`ruang_id`),
  ADD KEY `daftar_kelas_uid_index` (`uid`);

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dosen_progdi_id_foreign` (`progdi_id`),
  ADD KEY `dosen_user_id_foreign` (`user_id`),
  ADD KEY `dosen_uid_index` (`uid`);

--
-- Indeks untuk tabel `forms`
--
ALTER TABLE `forms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `forms_uid_index` (`uid`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kelas_uid_index` (`uid`);

--
-- Indeks untuk tabel `keterangan_guru`
--
ALTER TABLE `keterangan_guru`
  ADD PRIMARY KEY (`id`),
  ADD KEY `keterangan_guru_dosen_id_foreign` (`dosen_id`),
  ADD KEY `keterangan_guru_daftarkelas_id_foreign` (`daftarkelas_id`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mahasiswa_progdi_id_foreign` (`progdi_id`),
  ADD KEY `mahasiswa_user_id_foreign` (`user_id`),
  ADD KEY `mahasiswa_uid_index` (`uid`);

--
-- Indeks untuk tabel `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mata_kuliah_uid_index` (`uid`);

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
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `progdi`
--
ALTER TABLE `progdi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `progdi_uid_index` (`uid`);

--
-- Indeks untuk tabel `ruang`
--
ALTER TABLE `ruang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ruang_uid_index` (`uid`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_uid_index` (`uid`);

--
-- Indeks untuk tabel `waktus`
--
ALTER TABLE `waktus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `waktus_uid_index` (`uid`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absensis`
--
ALTER TABLE `absensis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `daftarkelas_models`
--
ALTER TABLE `daftarkelas_models`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `daftar_kelas`
--
ALTER TABLE `daftar_kelas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT untuk tabel `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `forms`
--
ALTER TABLE `forms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `keterangan_guru`
--
ALTER TABLE `keterangan_guru`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `progdi`
--
ALTER TABLE `progdi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `ruang`
--
ALTER TABLE `ruang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `waktus`
--
ALTER TABLE `waktus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `daftar_kelas`
--
ALTER TABLE `daftar_kelas`
  ADD CONSTRAINT `daftar_kelas_dosen_id_foreign` FOREIGN KEY (`dosen_id`) REFERENCES `dosen` (`id`),
  ADD CONSTRAINT `daftar_kelas_makul_id_foreign` FOREIGN KEY (`makul_id`) REFERENCES `mata_kuliah` (`id`),
  ADD CONSTRAINT `daftar_kelas_progdi_id_foreign` FOREIGN KEY (`progdi_id`) REFERENCES `progdi` (`id`),
  ADD CONSTRAINT `daftar_kelas_ruang_id_foreign` FOREIGN KEY (`ruang_id`) REFERENCES `ruang` (`id`);

--
-- Ketidakleluasaan untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD CONSTRAINT `dosen_progdi_id_foreign` FOREIGN KEY (`progdi_id`) REFERENCES `progdi` (`id`),
  ADD CONSTRAINT `dosen_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_progdi_id_foreign` FOREIGN KEY (`progdi_id`) REFERENCES `progdi` (`id`),
  ADD CONSTRAINT `mahasiswa_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
