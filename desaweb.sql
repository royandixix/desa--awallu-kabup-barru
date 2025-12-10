-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 10, 2025 at 10:13 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `desaweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrasi_penduduks`
--

CREATE TABLE `administrasi_penduduks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `administrasi_penduduks`
--

INSERT INTO `administrasi_penduduks` (`id`, `kategori`, `jumlah`, `created_at`, `updated_at`) VALUES
(1, 'Laki-laki', 1000000, '2025-12-06 23:00:27', '2025-12-06 23:00:27'),
(2, 'Perempuan', 200000, '2025-12-06 23:00:48', '2025-12-06 23:00:48'),
(3, 'Kepala Keluarga', 2000000, '2025-12-06 23:01:04', '2025-12-06 23:01:04'),
(4, 'Jumlah Penduduk', 300000000, '2025-12-06 23:01:17', '2025-12-07 04:04:06');

-- --------------------------------------------------------

--
-- Table structure for table `admin_posyandus`
--

CREATE TABLE `admin_posyandus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_posyandu` varchar(255) NOT NULL,
  `ibu_hamil` int(11) NOT NULL DEFAULT 0,
  `ibu_menyusui` int(11) NOT NULL DEFAULT 0,
  `bayi` int(11) NOT NULL DEFAULT 0,
  `balita_1_2` int(11) NOT NULL DEFAULT 0,
  `balita_2_3` int(11) NOT NULL DEFAULT 0,
  `balita_3_4` int(11) NOT NULL DEFAULT 0,
  `balita_4_5` int(11) NOT NULL DEFAULT 0,
  `apras_5_6` int(11) NOT NULL DEFAULT 0,
  `pus` int(11) NOT NULL DEFAULT 0,
  `wus` int(11) NOT NULL DEFAULT 0,
  `pra_lansia_lk` int(11) NOT NULL DEFAULT 0,
  `pra_lansia_pr` int(11) NOT NULL DEFAULT 0,
  `lansia_lk` int(11) NOT NULL DEFAULT 0,
  `lansia_pr` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `appras`
--

CREATE TABLE `appras` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_anak` varchar(255) NOT NULL,
  `umur` int(11) NOT NULL,
  `nama_ortu` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appras`
--

INSERT INTO `appras` (`id`, `nama_anak`, `umur`, `nama_ortu`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'royandi', 20, 'rexa', 'makassar', '2025-12-07 08:56:23', '2025-12-07 08:56:23'),
(2, 'wkwkkw', 2020, 'makasar', 'masakssar', '2025-12-07 09:04:21', '2025-12-07 09:04:21');

-- --------------------------------------------------------

--
-- Table structure for table `balitas`
--

CREATE TABLE `balitas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_balita` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `umur` varchar(255) NOT NULL,
  `nama_ibu` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `balitas`
--

INSERT INTO `balitas` (`id`, `nama_balita`, `tanggal_lahir`, `jenis_kelamin`, `umur`, `nama_ibu`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'JOKMO', '2025-12-27', 'P', '12', 'komang', 'MAKASASAR', '2025-12-07 13:04:20', '2025-12-07 13:04:20');

-- --------------------------------------------------------

--
-- Table structure for table `bayis`
--

CREATE TABLE `bayis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_bayi` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `nama_ibu` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bayis`
--

INSERT INTO `bayis` (`id`, `nama_bayi`, `tanggal_lahir`, `jenis_kelamin`, `nama_ibu`, `alamat`, `created_at`, `updated_at`) VALUES
(2, 'gaza', '2025-12-19', 'P', 'wkwkw', 'wkwkw', '2025-12-07 11:27:59', '2025-12-07 11:27:59');

-- --------------------------------------------------------

--
-- Table structure for table `beritas`
--

CREATE TABLE `beritas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `kategori` varchar(255) DEFAULT NULL,
  `konten` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `beritas`
--

INSERT INTO `beritas` (`id`, `judul`, `slug`, `kategori`, `konten`, `image`, `author`, `created_at`, `updated_at`) VALUES
(1, 'Pembangunan Jalan Desa Selesai', 'pembangunan-jalan-desa-selesai', 'Infrastruktur', 'ari ini, Pemerintah Desa mengumumkan bahwa pembangunan jalan penghubung antar dusun telah selesai dan siap digunakan oleh masyarakat. Jalan ini memiliki panjang sekitar 2 kilometer dan telah dilapisi aspal berkualitas untuk mempermudah akses transportasi warga.\r\n\r\nPembangunan ini dimulai sejak awal tahun dengan tujuan meningkatkan mobilitas warga, memperlancar distribusi barang, dan mempermudah akses pendidikan serta kesehatan. Selain itu, proyek ini juga membuka lapangan kerja sementara bagi warga sekitar, sehingga berdampak positif pada perekonomian desa.\r\n\r\nDalam peresmian, Kepala Desa menyampaikan bahwa proyek ini adalah bagian dari program pembangunan berkelanjutan yang fokus pada infrastruktur dan kesejahteraan warga. Beliau berharap jalan ini dapat meningkatkan kualitas hidup masyarakat desa serta mendukung berbagai kegiatan sosial dan ekonomi.\r\n\r\nWarga sangat antusias dan merasa terbantu dengan adanya jalan baru ini. Beberapa warga menyampaikan rasa terima kasih mereka kepada pemerintah desa karena pembangunan ini sangat tepat waktu dan sesuai kebutuhan. Pemerintah desa juga berjanji untuk terus melakukan pemeliharaan rutin agar jalan tetap aman dan nyaman digunakan.\r\n\r\nDi masa mendatang, pemerintah desa berencana membangun beberapa fasilitas pendukung, seperti penerangan jalan, rambu-rambu keselamatan, dan drainase agar jalan tetap awet dan lingkungan sekitar tetap terjaga kebersihannya.', 'uploads/berita/nWSaOHU1k0p8uuegwfRshZuveN6a6dnLOeb2CeuF.webp', 'Admin Desa', '2025-12-01 22:29:56', '2025-12-01 22:29:56');

-- --------------------------------------------------------

--
-- Table structure for table `bpds`
--

CREATE TABLE `bpds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `foto` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bpds`
--

INSERT INTO `bpds` (`id`, `foto`, `created_at`, `updated_at`) VALUES
(2, 'struktural/bpd/juIvITIeLTjpKXcaotoC2ODPGyzlCR6EAhdggJPi.png', '2025-12-04 21:44:14', '2025-12-05 07:44:24');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `foto_warga`
--

CREATE TABLE `foto_warga` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `file_path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `foto_wargas`
--

CREATE TABLE `foto_wargas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `foto_wargas`
--

INSERT INTO `foto_wargas` (`id`, `gambar`, `created_at`, `updated_at`) VALUES
(2, 'foto_warga/ks8lkjM60pNcJvQoPjNmWccA9SCcbWxJdOGREfA6.jpg', '2025-12-08 12:03:24', '2025-12-08 12:03:24');

-- --------------------------------------------------------

--
-- Table structure for table `galeris`
--

CREATE TABLE `galeris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `desc` text DEFAULT NULL,
  `lokasi` varchar(255) DEFAULT NULL,
  `kategori` varchar(255) DEFAULT NULL,
  `tanggal` timestamp NULL DEFAULT NULL,
  `file` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galeris`
--

INSERT INTO `galeris` (`id`, `title`, `desc`, `lokasi`, `kategori`, `tanggal`, `file`, `created_at`, `updated_at`) VALUES
(1, 'KEGIATAN GOTONG', 'Dokumentasi kegiatan Gotong Royong yang dilaksanakan di RT 01 Dusun Batupute bersama Pemerintah Desa Batupute , para Ketua RT dan masyarakt Desa Batupute pada hari Jumat, 13 Juni 2025', 'Batupute', 'Kegiatan Gotong Royong menumbuhkan persatuan dan kesatuan masyarakat', '2025-11-28 16:00:00', '1764102053_kegiatan-gotong-royong.webp', '2025-11-25 10:42:57', '2025-12-07 23:30:05'),
(3, 'jhkjn', 'jnjlkn', 'lmlm', 'ljjljl;jj', '2025-12-09 08:46:00', '1765269734_jhkjn.webp', '2025-12-09 00:42:14', '2025-12-09 00:42:14');

-- --------------------------------------------------------

--
-- Table structure for table `ibu_hamil`
--

CREATE TABLE `ibu_hamil` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_ibu` varchar(255) NOT NULL,
  `umur_kehamilan` int(11) NOT NULL,
  `nama_suami` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_hp` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ibu_hamil`
--

INSERT INTO `ibu_hamil` (`id`, `nama_ibu`, `umur_kehamilan`, `nama_suami`, `alamat`, `no_hp`, `created_at`, `updated_at`) VALUES
(1, 'saynag', 10, 'yayat', 'nakassar', '081347018612', '2025-12-07 10:39:28', '2025-12-07 10:39:28');

-- --------------------------------------------------------

--
-- Table structure for table `ibu_menyusuis`
--

CREATE TABLE `ibu_menyusuis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `umur` int(11) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `dusun` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ibu_menyusuis`
--

INSERT INTO `ibu_menyusuis` (`id`, `nama`, `umur`, `alamat`, `dusun`, `created_at`, `updated_at`) VALUES
(2, 'hau', 2, 'makssarrr', 'boda-bda', '2025-12-07 11:18:52', '2025-12-07 11:18:59');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `karang_tarunas`
--

CREATE TABLE `karang_tarunas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `karang_tarunas`
--

INSERT INTO `karang_tarunas` (`id`, `gambar`, `created_at`, `updated_at`) VALUES
(19, '1764928875_6932ad6b877e2.png', '2025-12-05 02:01:15', '2025-12-05 02:01:15');

-- --------------------------------------------------------

--
-- Table structure for table `kontak_saran`
--

CREATE TABLE `kontak_saran` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pesan` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kontak_saran`
--

INSERT INTO `kontak_saran` (`id`, `nama`, `email`, `pesan`, `created_at`, `updated_at`) VALUES
(1, 'dqdd', 'randiroyandi@gmail.com', 'qeqeeq', '2025-12-06 20:03:24', '2025-12-06 20:03:24'),
(2, 'royandi randi', 'admin@gmail.com', 'bangkelu', '2025-12-08 01:28:35', '2025-12-08 01:28:35'),
(3, 'garaa', 'admin@gmail.com', 'babi', '2025-12-09 10:51:05', '2025-12-09 10:51:05'),
(4, 'garaa', 'randi@gmail.com', 'POKKO', '2025-12-09 22:33:28', '2025-12-09 22:33:28');

-- --------------------------------------------------------

--
-- Table structure for table `lansia`
--

CREATE TABLE `lansia` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `umur` int(11) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `no_hp` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lansia`
--

INSERT INTO `lansia` (`id`, `nama`, `umur`, `alamat`, `no_hp`, `created_at`, `updated_at`) VALUES
(1, 'adad', 2, 'maksar', '081347018612', '2025-12-07 19:57:21', '2025-12-07 19:57:21');

-- --------------------------------------------------------

--
-- Table structure for table `laporan_kegiatan`
--

CREATE TABLE `laporan_kegiatan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `lokasi` varchar(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `anggaran` bigint(20) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `laporan_kegiatan`
--

INSERT INTO `laporan_kegiatan` (`id`, `judul`, `lokasi`, `tanggal`, `anggaran`, `foto`, `file_path`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 'Pembangunan Drainase Lingkungan RT 04 Dusun Batupute', 'RT 04 Dusun Batupute, Desa Batupute', '2025-12-12', 14000000, 'laporan/foto/xT1oXSAYvbl7IPiYUukmMTWE0hSZfpAliBKnvVXm.webp', 'laporan/file/tXoPtCzCAKeVFqcJaXzsKi1iQoAisT86bAVBPgKf.pdf', NULL, '2025-12-06 09:03:04', '2025-12-06 09:44:30'),
(2, 'Pembangunan Drainase Lingkungan RT 04 Dusun Batupute', 'RT 04 Dusun Batupute, Desa Batupute', '2025-12-12', 15000000, 'laporan/foto/ox2hpyWa5z5VqiMLVzVsr9ILhRiYvxHkyWmwaQE2.webp', 'laporan/file/zbjPo57iu650vvRGpPPMZNWTaFxNkuRDk1Cx9J99.pdf', NULL, '2025-12-06 09:04:46', '2025-12-06 09:04:46'),
(3, 'bahaya', 'Batupute', '2025-12-24', 200000000, 'laporan/foto/3xoBn37I3U75dQY8ATYreRcQNw6Vb2blaOh6QoHR.webp', 'laporan/file/wvEaObPqnnoWbxrRPwWW0yuP7gLZEcj0xg1OzK34.pdf', NULL, '2025-12-06 11:14:15', '2025-12-07 02:13:22');

-- --------------------------------------------------------

--
-- Table structure for table `lpms`
--

CREATE TABLE `lpms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lpms`
--

INSERT INTO `lpms` (`id`, `gambar`, `created_at`, `updated_at`) VALUES
(2, 'lpm/CJ5Bpyo7WM9ti2BE2BX7ZvItDOzGKv3byh4929uh.png', '2025-12-05 20:40:05', '2025-12-05 20:40:05');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_10_11_041419_add_role_to_users_table', 1),
(5, '2025_11_23_171217_create_profil_desa_table', 2),
(6, '2025_11_24_090807_alter_koordinat_in_profil_desa_table', 3),
(7, '2025_11_25_171430_create_galeris_table', 4),
(8, '2025_11_25_173332_create_galeris_table', 5),
(9, '2025_11_26_083855_create_transparansi_anggaran_table', 6),
(10, '2025_11_26_083937_create_transparansi_bumdes_table', 6),
(11, '2025_11_26_084100_create_transparansi_dokumen_table', 6),
(12, '2025_11_26_084123_create_transparansi_laporan_table', 6),
(13, '2025_11_28_094914_add_rekap_to_transparansi_anggaran', 7),
(14, '2025_12_02_045110_create_beritas_table', 8),
(15, '2025_12_02_120047_create_struktur_desa_table', 9),
(16, '2025_12_03_090926_create_struktur_desa_table', 10),
(17, '2025_12_04_175424_make_nama_nullable_in_struktur_desa_table', 11),
(18, '2025_12_04_181146_create_bpds_table', 12),
(19, '2025_12_05_054837_create_karang_tarunas_table', 13),
(20, '2025_12_05_075627_create_karang_tarunas_table', 14),
(21, '2025_12_06_031906_create_pkk_table', 15),
(22, '2025_12_06_042734_create_lpms_table', 16),
(23, '2025_12_06_061726_create_posyandus_table', 17),
(24, '2025_12_06_090736_create_pengaduans_table', 18),
(25, '2025_12_06_154223_create_laporan_kegiatan_table', 19),
(26, '2025_12_07_030301_create_kontak_saran_table', 20),
(27, '2025_12_07_052952_create_administrasi_penduduks_table', 21),
(28, '2025_12_07_070608_create_foto_warga_table', 22),
(29, '2025_12_07_092308_create_admin_posyandus_table', 23),
(30, '2025_12_07_152937_create_appras_table', 24),
(31, '2025_12_07_171133_create_ibu_hamil_table', 25),
(32, '2025_12_07_171818_create_ibu_hamil_table', 26),
(33, '2025_12_07_184604_create_ibu_menyusuis_table', 27),
(34, '2025_12_07_190331_create_bayis_table', 28),
(35, '2025_12_07_205401_create_balitas_table', 29),
(36, '2025_12_07_213409_create_puses_table', 30),
(37, '2025_12_07_214143_create_pus_table', 31),
(38, '2025_12_07_222134_create_wuses_table', 32),
(39, '2025_12_08_034956_create_pra_lansias_table', 33),
(40, '2025_12_08_035306_create_lansia_table', 34),
(41, '2025_12_08_152018_create_foto_wargas_table', 35),
(43, '2025_12_09_193627_add_username_to_users_table', 36),
(44, '2025_12_09_200325_make_email_nullable_in_users_table', 37),
(45, '2025_12_09_210544_make_email_nullable_in_users_table', 38),
(46, '2025_12_09_211131_create_users_table', 39);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengaduans`
--

CREATE TABLE `pengaduans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `pesan` text NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `status` enum('pending','diproses','selesai') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengaduans`
--

INSERT INTO `pengaduans` (`id`, `nama`, `no_hp`, `kategori`, `pesan`, `foto`, `status`, `created_at`, `updated_at`) VALUES
(2, 'user', '081347018612', 'Kesehatan', 'Saya ingin melaporkan bahwa Posyandu di Dusun 2 sudah lama tidak aktif. Ibu-ibu hamil dan balita kesulitan untuk mendapatkan pelayanan imunisasi dan pemeriksaan kesehatan rutin. Mohon Posyandu dapat diaktifkan kembali agar kesehatan ibu dan anak di desa dapat terpantau dengan baik. Terima kasih.', 'uploads/pengaduan/1765034435_1749777830.webp', 'pending', '2025-12-06 07:20:35', '2025-12-06 07:20:35'),
(4, 'hau', '081347018612', 'Kesehatan', 'wkwkwkwkwkwkwkwkwkwk', 'uploads/pengaduan/1765035228_1749777830.webp', 'pending', '2025-12-06 07:33:48', '2025-12-06 07:33:48'),
(5, 'royandimain', '081347018611', 'Kependudukan', 'gggggggggggggggggggg', 'uploads/pengaduan/1765036394_1749783979.webp', 'selesai', '2025-12-06 07:53:14', '2025-12-07 02:13:30'),
(6, 'hau', '081347018612', 'Kependudukan', 'wwkwkwkwkkwkwkw', 'uploads/pengaduan/1765178717_1750298179.webp', 'pending', '2025-12-07 23:25:17', '2025-12-07 23:25:17'),
(7, 'garaa', '081347018612', 'Kesehatan', 'bbbb', 'uploads/pengaduan/1765186505_language-of-flowers-book-cover.png', 'pending', '2025-12-08 01:35:05', '2025-12-08 01:35:05'),
(8, 'hau', '081347018612', 'Kesehatan', 'bvcssddd', 'uploads/pengaduan/1765348640_nWSaOHU1k0p8uuegwfRshZuveN6a6dnLOeb2CeuF.webp', 'pending', '2025-12-09 22:37:20', '2025-12-09 22:37:20');

-- --------------------------------------------------------

--
-- Table structure for table `pkk`
--

CREATE TABLE `pkk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pkk`
--

INSERT INTO `pkk` (`id`, `gambar`, `created_at`, `updated_at`) VALUES
(2, '1764991953_6933a3d147468.png', '2025-12-05 19:32:33', '2025-12-05 19:32:33');

-- --------------------------------------------------------

--
-- Table structure for table `posyandus`
--

CREATE TABLE `posyandus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `foto` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posyandus`
--

INSERT INTO `posyandus` (`id`, `foto`, `created_at`, `updated_at`) VALUES
(3, 'posyandu/SkDEVByNYjPnrWUJ6nLyf3kVFeUfff1ao0lGGd7D.png', '2025-12-05 22:41:16', '2025-12-05 22:41:16');

-- --------------------------------------------------------

--
-- Table structure for table `pra_lansias`
--

CREATE TABLE `pra_lansias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `umur` int(11) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pra_lansias`
--

INSERT INTO `pra_lansias` (`id`, `nama`, `umur`, `alamat`, `created_at`, `updated_at`) VALUES
(2, 'hau', 12, 'makassarr', '2025-12-07 19:52:02', '2025-12-07 19:52:02');

-- --------------------------------------------------------

--
-- Table structure for table `profil_desa`
--

CREATE TABLE `profil_desa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `deskripsi_singkat` text DEFAULT NULL,
  `gambar_header` varchar(255) DEFAULT NULL,
  `sejarah` longtext DEFAULT NULL,
  `wilayah_administratif` longtext DEFAULT NULL,
  `nama_desa` varchar(255) DEFAULT NULL,
  `kecamatan` varchar(255) DEFAULT NULL,
  `kabupaten` varchar(255) DEFAULT NULL,
  `batas_utara` varchar(255) DEFAULT NULL,
  `batas_selatan` varchar(255) DEFAULT NULL,
  `batas_timur` varchar(255) DEFAULT NULL,
  `batas_barat` varchar(255) DEFAULT NULL,
  `koordinat` longtext NOT NULL,
  `jarak_kabupaten` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profil_desa`
--

INSERT INTO `profil_desa` (`id`, `judul`, `deskripsi_singkat`, `gambar_header`, `sejarah`, `wilayah_administratif`, `nama_desa`, `kecamatan`, `kabupaten`, `batas_utara`, `batas_selatan`, `batas_timur`, `batas_barat`, `koordinat`, `jarak_kabupaten`, `created_at`, `updated_at`) VALUES
(3, 'Anggaran Pendapatan dan Belanja Desa Tahun 2024', 'xX', '[\"1765207027_1749626948.webp\"]', 'www', 'ww', 'ww', 'ww', 'ww', 'ww', 'ww', 'ww', 'ww', 'https://www.google.com/maps/embed/v1/view?key=YOUR_API_KEY&center=-4.247216,119.6027328&zoom=15', 'wwww', '2025-12-08 07:17:07', '2025-12-08 07:17:07');

-- --------------------------------------------------------

--
-- Table structure for table `pus`
--

CREATE TABLE `pus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `no_hp` varchar(255) DEFAULT NULL,
  `umur` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pus`
--

INSERT INTO `pus` (`id`, `nama`, `alamat`, `no_hp`, `umur`, `created_at`, `updated_at`) VALUES
(2, 'garaa', 'makassaaar', '081347018611', 14, '2025-12-07 13:57:52', '2025-12-07 14:15:00');

-- --------------------------------------------------------

--
-- Table structure for table `puses`
--

CREATE TABLE `puses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('CJAtTqJLuYuUFHbzh9CG7xYS06cjhPdlKyrzAPLd', 8, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiQmVaYUFFRTlQcjNrTTBnTUd2SzFKRVp0VUtUeXVXQ1N6a2FuNGRETCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hZG1pbi9kYXNoYm9hcmQiO3M6NToicm91dGUiO3M6MTU6ImFkbWluLmRhc2hib2FyZCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjg7fQ==', 1765350030),
('nvDywLDHVogbqOUbuxVvdl17ixmqCiPoiAwWvzrL', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUGpUVWhQRXlobzVsdmdMQWhKdTRWZE1sYnRSMzQwZDdtS3owbEdIVSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9ob21lIjtzOjU6InJvdXRlIjtzOjk6InVzZXIuaG9tZSI7fX0=', 1765357053),
('uBoYNSI88VL9UahLlPVnquNYm8JjKAvvlW3SME8A', 6, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiNWJvclVXb2ljQ1BMYjdXVDg0OVlzbE8wTWszTGxoM3N4U3RQT1RDZyI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjI6e3M6MzoidXJsIjtzOjM3OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYWRtaW4vZGFzaGJvYXJkIjtzOjU6InJvdXRlIjtzOjE1OiJhZG1pbi5kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo2O30=', 1765347253);

-- --------------------------------------------------------

--
-- Table structure for table `struktur_desa`
--

CREATE TABLE `struktur_desa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `struktur_desa`
--

INSERT INTO `struktur_desa` (`id`, `kategori`, `nama`, `jabatan`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'pemerintahan_desa', 'AKKASsss', 'Kadus Tanra Balana', 'struktur/jSHEtVCiN0rElJMgWy2ETHx2fYsvQMdT4troGamn.jpg', '2025-12-03 01:14:00', '2025-12-04 07:11:56'),
(4, 'pemerintahan_desa', 'garaa', 'Kadus Tanra Balana', 'struktur/bKecR4WJ6auBQnjjsrpv5dvefP72QPuUb6BaVr6S.png', '2025-12-05 04:16:37', '2025-12-05 04:16:37'),
(5, 'pemerintahan_desa', 'wkwkwk', 'ketua umum', 'struktur/tYhsldocAMqQJYTF3cWFQEIGdy6Jwn0vhOpXaZ9a.webp', '2025-12-07 23:32:25', '2025-12-07 23:32:25');

-- --------------------------------------------------------

--
-- Table structure for table `transparansi_anggaran`
--

CREATE TABLE `transparansi_anggaran` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `jenis` enum('POKOK','PERUBAHAN') NOT NULL DEFAULT 'POKOK',
  `tahun` year(4) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pemasukan` bigint(20) DEFAULT NULL,
  `pengeluaran` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transparansi_anggaran`
--

INSERT INTO `transparansi_anggaran` (`id`, `judul`, `jenis`, `tahun`, `tanggal`, `file`, `created_at`, `updated_at`, `pemasukan`, `pengeluaran`) VALUES
(2, 'APBDes 2025', 'POKOK', '2021', '2021-07-02', 'uploads/transparansi_anggaran/q3HKz0WrrHcH3QlrZtmquMd79jw0Hia3ipVVKWTU.pdf', '2025-11-30 05:43:34', '2025-12-05 03:18:34', 200000, 30000000);

-- --------------------------------------------------------

--
-- Table structure for table `transparansi_bumdes`
--

CREATE TABLE `transparansi_bumdes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `kategori` enum('BUMDES','KOPDES') NOT NULL DEFAULT 'BUMDES',
  `bulan` varchar(255) DEFAULT NULL,
  `tahun` year(4) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transparansi_bumdes`
--

INSERT INTO `transparansi_bumdes` (`id`, `judul`, `kategori`, `bulan`, `tahun`, `tanggal`, `file`, `created_at`, `updated_at`) VALUES
(1, 'LAPORAN BULAN JANUARI', 'KOPDES', NULL, NULL, '2025-12-02', 'bumdes/ncDhklhnzCSwXCbUQIBpLD4u8Vrbgj6nq4Crm37C.xlsx', '2025-12-01 10:30:43', '2025-12-07 02:13:51');

-- --------------------------------------------------------

--
-- Table structure for table `transparansi_dokumen`
--

CREATE TABLE `transparansi_dokumen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `jenis` enum('POKOK','PERUBAHAN') NOT NULL DEFAULT 'POKOK',
  `tahun` year(4) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transparansi_dokumen`
--

INSERT INTO `transparansi_dokumen` (`id`, `judul`, `jenis`, `tahun`, `tanggal`, `file`, `created_at`, `updated_at`) VALUES
(1, 'Anggaran Pendapatan dan Belanja Desa Tahun 2024', 'POKOK', '2025', '2025-12-27', 'dokumen/D3YYPytaLfFTvQRhg7r3XwlBImhZyKIgyuvzn942.pdf', '2025-11-30 21:41:39', '2025-12-01 05:54:18'),
(2, 'Anggaran Pembuatan jalan', 'PERUBAHAN', '2025', '2025-12-10', 'dokumen/MXK8nl0V2DUINm1AFqMlmQQ9F1ltnzdX9ecV27Qu.jpg', '2025-12-09 10:59:24', '2025-12-09 10:59:24');

-- --------------------------------------------------------

--
-- Table structure for table `transparansi_laporan`
--

CREATE TABLE `transparansi_laporan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transparansi_laporan`
--

INSERT INTO `transparansi_laporan` (`id`, `judul`, `deskripsi`, `tanggal`, `file`, `created_at`, `updated_at`) VALUES
(1, 'wkwkw', 'asfadsfafsadfafdfa', '2025-12-05', 'laporan/A1NJX0Isn5RJyWs1uUQyII189cvVNRKtyuTG2Qyd.png', '2025-12-05 03:38:52', '2025-12-05 03:38:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(6, 'admin', 'desalawallubarru', 'admin@gmail.com', '$2y$12$lMWXjw79PQuZ9RE5uzxynO2df2Yzf1bZA9A42UMwBlKWwB7HbVqiy', 'admin', NULL, '2025-12-09 18:09:03', '2025-12-09 22:12:53'),
(7, 'posyandu', 'posyandu', 'posyandu@gnail.com', '$2y$12$dtKT2iwXdtaL0lD/LUyM3.Mr0OQXcMQP8D9BatnS9NtpVEIGyjtQy', 'posyandu', NULL, '2025-12-09 18:52:01', '2025-12-09 18:52:01'),
(8, 'admin', 'barru01', 'barru@gmai.com', '$2y$12$xb8XrgxcFoz.DBkKh36GTuBzULnUNGS4rpuX3adQrYmfdEtZRMH16', 'admin', NULL, '2025-12-09 23:00:24', '2025-12-09 23:00:24');

-- --------------------------------------------------------

--
-- Table structure for table `wus`
--

CREATE TABLE `wus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `umur` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wus`
--

INSERT INTO `wus` (`id`, `nama`, `alamat`, `umur`, `created_at`, `updated_at`) VALUES
(2, 'user', 'makassaaar', 12, '2025-12-07 14:25:27', '2025-12-07 14:25:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrasi_penduduks`
--
ALTER TABLE `administrasi_penduduks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_posyandus`
--
ALTER TABLE `admin_posyandus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appras`
--
ALTER TABLE `appras`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `balitas`
--
ALTER TABLE `balitas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bayis`
--
ALTER TABLE `bayis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `beritas`
--
ALTER TABLE `beritas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `beritas_slug_unique` (`slug`);

--
-- Indexes for table `bpds`
--
ALTER TABLE `bpds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `foto_warga`
--
ALTER TABLE `foto_warga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foto_wargas`
--
ALTER TABLE `foto_wargas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galeris`
--
ALTER TABLE `galeris`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ibu_hamil`
--
ALTER TABLE `ibu_hamil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ibu_menyusuis`
--
ALTER TABLE `ibu_menyusuis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `karang_tarunas`
--
ALTER TABLE `karang_tarunas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kontak_saran`
--
ALTER TABLE `kontak_saran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lansia`
--
ALTER TABLE `lansia`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laporan_kegiatan`
--
ALTER TABLE `laporan_kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lpms`
--
ALTER TABLE `lpms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pengaduans`
--
ALTER TABLE `pengaduans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pkk`
--
ALTER TABLE `pkk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posyandus`
--
ALTER TABLE `posyandus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pra_lansias`
--
ALTER TABLE `pra_lansias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profil_desa`
--
ALTER TABLE `profil_desa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pus`
--
ALTER TABLE `pus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `puses`
--
ALTER TABLE `puses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `struktur_desa`
--
ALTER TABLE `struktur_desa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transparansi_anggaran`
--
ALTER TABLE `transparansi_anggaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transparansi_bumdes`
--
ALTER TABLE `transparansi_bumdes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transparansi_dokumen`
--
ALTER TABLE `transparansi_dokumen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transparansi_laporan`
--
ALTER TABLE `transparansi_laporan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wus`
--
ALTER TABLE `wus`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrasi_penduduks`
--
ALTER TABLE `administrasi_penduduks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `admin_posyandus`
--
ALTER TABLE `admin_posyandus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `appras`
--
ALTER TABLE `appras`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `balitas`
--
ALTER TABLE `balitas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bayis`
--
ALTER TABLE `bayis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `beritas`
--
ALTER TABLE `beritas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bpds`
--
ALTER TABLE `bpds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `foto_warga`
--
ALTER TABLE `foto_warga`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `foto_wargas`
--
ALTER TABLE `foto_wargas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `galeris`
--
ALTER TABLE `galeris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ibu_hamil`
--
ALTER TABLE `ibu_hamil`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ibu_menyusuis`
--
ALTER TABLE `ibu_menyusuis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `karang_tarunas`
--
ALTER TABLE `karang_tarunas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `kontak_saran`
--
ALTER TABLE `kontak_saran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lansia`
--
ALTER TABLE `lansia`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `laporan_kegiatan`
--
ALTER TABLE `laporan_kegiatan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lpms`
--
ALTER TABLE `lpms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `pengaduans`
--
ALTER TABLE `pengaduans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pkk`
--
ALTER TABLE `pkk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `posyandus`
--
ALTER TABLE `posyandus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pra_lansias`
--
ALTER TABLE `pra_lansias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `profil_desa`
--
ALTER TABLE `profil_desa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pus`
--
ALTER TABLE `pus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `puses`
--
ALTER TABLE `puses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `struktur_desa`
--
ALTER TABLE `struktur_desa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transparansi_anggaran`
--
ALTER TABLE `transparansi_anggaran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transparansi_bumdes`
--
ALTER TABLE `transparansi_bumdes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transparansi_dokumen`
--
ALTER TABLE `transparansi_dokumen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transparansi_laporan`
--
ALTER TABLE `transparansi_laporan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `wus`
--
ALTER TABLE `wus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
