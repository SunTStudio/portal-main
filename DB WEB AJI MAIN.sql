-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2024 at 05:05 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webmain`
--

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_depthead` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_spv` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_members` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `code`, `name`, `email_depthead`, `email_spv`, `email_members`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'MKT', 'Marketing', NULL, NULL, NULL, '2024-11-03 19:13:29', '2024-11-03 19:13:29', NULL),
(2, 'PE', 'Process Engineering', NULL, NULL, NULL, '2024-11-03 19:13:29', '2024-11-03 19:13:29', NULL),
(3, 'PRODENG', 'Product Engineering', NULL, NULL, NULL, '2024-11-03 19:13:29', '2024-11-03 19:13:29', NULL),
(4, 'PROD', 'Produksi', NULL, NULL, NULL, '2024-11-03 19:13:29', '2024-11-03 19:13:29', NULL),
(5, 'HRGAEI', 'HRGA EHS IT', NULL, NULL, NULL, '2024-11-03 19:13:29', '2024-11-03 19:13:29', NULL),
(6, 'PUR', 'Purchasing', NULL, NULL, NULL, '2024-11-03 19:13:29', '2024-11-03 19:13:29', NULL),
(7, 'FA', 'Finance', NULL, NULL, NULL, '2024-11-03 19:13:29', '2024-11-03 19:13:29', NULL),
(8, 'QUALITY', 'Quality', NULL, NULL, NULL, '2024-11-03 19:13:29', '2024-11-03 19:13:29', NULL),
(9, 'PPIC', 'Product Plan Inventory Control', NULL, NULL, NULL, '2024-11-03 19:13:29', '2024-11-03 19:13:29', NULL),
(10, 'ME', 'Maintenance Engineering', NULL, NULL, NULL, '2024-11-03 19:13:29', '2024-11-03 19:13:29', NULL),
(11, 'BOD', 'Board Of Director', NULL, NULL, NULL, '2024-11-03 19:13:29', '2024-11-03 19:13:29', NULL),
(12, 'PPM', 'PRODPPICME', NULL, NULL, NULL, '2024-11-03 19:13:29', '2024-11-03 19:13:29', NULL),
(13, 'PEQA', 'PEQUALITY', NULL, NULL, NULL, '2024-11-03 19:13:29', '2024-11-03 19:13:29', NULL),
(14, 'PM', 'PEME', NULL, NULL, NULL, '2024-11-03 19:13:29', '2024-11-03 19:13:29', NULL),
(15, 'QA', 'Quality Assurance', NULL, NULL, NULL, '2024-11-03 19:13:29', '2024-11-03 19:13:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `detail_departements`
--

CREATE TABLE `detail_departements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `departement_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_depthead` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_director` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_spv` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_members` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_departements`
--

INSERT INTO `detail_departements` (`id`, `departement_id`, `name`, `code`, `email_depthead`, `email_director`, `email_spv`, `email_members`, `created_at`, `updated_at`) VALUES
(1, 1, 'Marketing', 'MKT', NULL, NULL, NULL, NULL, '2024-11-03 19:13:29', '2024-11-03 19:13:29'),
(2, 3, 'New Product Development', 'NPD', NULL, NULL, NULL, NULL, '2024-11-03 19:13:29', '2024-11-03 19:13:29'),
(3, 3, 'Research And Development', 'RND', NULL, NULL, NULL, NULL, '2024-11-03 19:13:29', '2024-11-03 19:13:29'),
(4, 5, 'Human Resource', 'HR', NULL, NULL, NULL, NULL, '2024-11-03 19:13:29', '2024-11-03 19:13:29'),
(5, 5, 'General Affair', 'GA', NULL, NULL, NULL, NULL, '2024-11-03 19:13:29', '2024-11-03 19:13:29'),
(6, 5, 'Environtment Health Safety', 'EHS', NULL, NULL, NULL, NULL, '2024-11-03 19:13:29', '2024-11-03 19:13:29'),
(7, 5, 'Information Technology', 'IT', NULL, NULL, NULL, NULL, '2024-11-03 19:13:29', '2024-11-03 19:13:29'),
(8, 5, 'Export Import', 'EXIM', NULL, NULL, NULL, NULL, '2024-11-03 19:13:29', '2024-11-03 19:13:29'),
(9, 5, 'Legal', 'LA', NULL, NULL, NULL, NULL, '2024-11-03 19:13:29', '2024-11-03 19:13:29'),
(10, 5, 'Payroll & Personalia', 'PNP', NULL, NULL, NULL, NULL, '2024-11-03 19:13:29', '2024-11-03 19:13:29'),
(11, 5, 'GA MBT', 'GA MBT', NULL, NULL, NULL, NULL, '2024-11-03 19:13:29', '2024-11-03 19:13:29'),
(12, 6, 'Purchasing', 'PUR', NULL, NULL, NULL, NULL, '2024-11-03 19:13:29', '2024-11-03 19:13:29'),
(13, 7, 'Finance', 'FA', NULL, NULL, NULL, NULL, '2024-11-03 19:13:29', '2024-11-03 19:13:29'),
(14, 7, 'Coasting, General Ledger & Tax', 'CGLT', NULL, NULL, NULL, NULL, '2024-11-03 19:13:29', '2024-11-03 19:13:29'),
(15, 9, 'Production Planning Control', 'PPC', NULL, NULL, NULL, NULL, '2024-11-03 19:13:29', '2024-11-03 19:13:29'),
(16, 9, 'Inventory Control', 'IC', NULL, NULL, NULL, NULL, '2024-11-03 19:13:29', '2024-11-03 19:13:29'),
(17, 9, 'Planning & WHFG', 'PNWHFG', NULL, NULL, NULL, NULL, '2024-11-03 19:13:29', '2024-11-03 19:13:29'),
(18, 9, 'Incoming', 'INC', NULL, NULL, NULL, NULL, '2024-11-03 19:13:29', '2024-11-03 19:13:29'),
(19, 9, 'WHRM & WHRG', 'WHRMNWHFG', NULL, NULL, NULL, NULL, '2024-11-03 19:13:29', '2024-11-03 19:13:29'),
(20, 9, 'Production Asselmbling', 'PA', NULL, NULL, NULL, NULL, '2024-11-03 19:13:29', '2024-11-03 19:13:29'),
(21, 9, 'Assembling', 'ASMBLI', NULL, NULL, NULL, NULL, '2024-11-03 19:13:29', '2024-11-03 19:13:29'),
(22, 9, 'Delivery', 'DEL', NULL, NULL, NULL, NULL, '2024-11-03 19:13:29', '2024-11-03 19:13:29'),
(23, 11, 'Board of Direction', 'BOD', NULL, NULL, NULL, NULL, '2024-11-03 19:13:29', '2024-11-03 19:13:29'),
(24, 12, 'Warehouse', 'HW', NULL, NULL, NULL, NULL, '2024-11-03 19:13:29', '2024-11-03 19:13:29'),
(25, 14, 'Process Engineering', 'PE', NULL, NULL, NULL, NULL, '2024-11-03 19:13:29', '2024-11-03 19:13:29'),
(26, 14, 'Assy Koja', 'ASSY', NULL, NULL, NULL, NULL, '2024-11-03 19:13:29', '2024-11-03 19:13:29'),
(27, 14, 'Injection Surface', 'INJ', NULL, NULL, NULL, NULL, '2024-11-03 19:13:29', '2024-11-03 19:13:29'),
(28, 14, 'Maintenance Engineering', 'ME', NULL, NULL, NULL, NULL, '2024-11-03 19:13:29', '2024-11-03 19:13:29'),
(29, 14, 'Mold Maintenance', 'MM', NULL, NULL, NULL, NULL, '2024-11-03 19:13:29', '2024-11-03 19:13:29'),
(30, 14, 'PE Injection', 'PEINJ', NULL, NULL, NULL, NULL, '2024-11-03 19:13:29', '2024-11-03 19:13:29'),
(31, 14, 'PE Surface', 'PESUR', NULL, NULL, NULL, NULL, '2024-11-03 19:13:29', '2024-11-03 19:13:29'),
(32, 14, 'PE Assembling', 'PEASS', NULL, NULL, NULL, NULL, '2024-11-03 19:13:29', '2024-11-03 19:13:29'),
(33, 14, 'PE Project', 'PEPROJ', NULL, NULL, NULL, NULL, '2024-11-03 19:13:29', '2024-11-03 19:13:29'),
(34, 14, 'ME Injection', 'MEINJ', NULL, NULL, NULL, NULL, '2024-11-03 19:13:29', '2024-11-03 19:13:29'),
(35, 14, 'ME Surface', 'MESUR', NULL, NULL, NULL, NULL, '2024-11-03 19:13:29', '2024-11-03 19:13:29'),
(36, 14, 'ME Assembling', 'MEASS', NULL, NULL, NULL, NULL, '2024-11-03 19:13:29', '2024-11-03 19:13:29'),
(37, 14, 'ME Utility', 'MEUTY', NULL, NULL, NULL, NULL, '2024-11-03 19:13:29', '2024-11-03 19:13:29'),
(38, 14, 'Built & Facility', 'BNF', NULL, NULL, NULL, NULL, '2024-11-03 19:13:29', '2024-11-03 19:13:29'),
(39, 15, 'Quality Control', 'QC', NULL, NULL, NULL, NULL, '2024-11-03 19:13:29', '2024-11-03 19:13:29'),
(40, 15, 'Quality Assurance', 'QA', NULL, NULL, NULL, NULL, '2024-11-03 19:13:29', '2024-11-03 19:13:29'),
(41, 15, 'Quality Engineering', 'QE', NULL, NULL, NULL, NULL, '2024-11-03 19:13:29', '2024-11-03 19:13:29'),
(42, 15, 'Quality Rep. Off', 'QRO', NULL, NULL, NULL, NULL, '2024-11-03 19:13:29', '2024-11-03 19:13:29');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2024_08_20_055947_create_permission_tables', 1),
(5, '2024_08_28_040839_create_departments_table', 1),
(6, '2024_08_28_041320_create_detail_departements_table', 1),
(7, '2024_08_28_041512_create_positions_table', 1),
(8, '2024_10_12_000000_create_users_table', 1),
(9, '2024_10_28_023252_create_sub_websites_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(5, 'App\\Models\\User', 1),
(6, 'App\\Models\\User', 14),
(6, 'App\\Models\\User', 15),
(6, 'App\\Models\\User', 16),
(7, 'App\\Models\\User', 2),
(7, 'App\\Models\\User', 3),
(7, 'App\\Models\\User', 6),
(7, 'App\\Models\\User', 9),
(7, 'App\\Models\\User', 10),
(7, 'App\\Models\\User', 11),
(7, 'App\\Models\\User', 12),
(7, 'App\\Models\\User', 13),
(8, 'App\\Models\\User', 4),
(8, 'App\\Models\\User', 7),
(8, 'App\\Models\\User', 17),
(8, 'App\\Models\\User', 18),
(8, 'App\\Models\\User', 19),
(8, 'App\\Models\\User', 20),
(8, 'App\\Models\\User', 21),
(8, 'App\\Models\\User', 22),
(8, 'App\\Models\\User', 23),
(8, 'App\\Models\\User', 24),
(8, 'App\\Models\\User', 25),
(8, 'App\\Models\\User', 26),
(8, 'App\\Models\\User', 27),
(8, 'App\\Models\\User', 28),
(8, 'App\\Models\\User', 29),
(8, 'App\\Models\\User', 30),
(8, 'App\\Models\\User', 31),
(8, 'App\\Models\\User', 32),
(8, 'App\\Models\\User', 33),
(8, 'App\\Models\\User', 34),
(9, 'App\\Models\\User', 5),
(9, 'App\\Models\\User', 35),
(9, 'App\\Models\\User', 36),
(9, 'App\\Models\\User', 37),
(9, 'App\\Models\\User', 38),
(9, 'App\\Models\\User', 39),
(9, 'App\\Models\\User', 40),
(9, 'App\\Models\\User', 41),
(9, 'App\\Models\\User', 42),
(9, 'App\\Models\\User', 43),
(9, 'App\\Models\\User', 44),
(9, 'App\\Models\\User', 45),
(9, 'App\\Models\\User', 46),
(9, 'App\\Models\\User', 47),
(9, 'App\\Models\\User', 48),
(9, 'App\\Models\\User', 49),
(9, 'App\\Models\\User', 50),
(9, 'App\\Models\\User', 51),
(9, 'App\\Models\\User', 52),
(10, 'App\\Models\\User', 53),
(10, 'App\\Models\\User', 54),
(10, 'App\\Models\\User', 55),
(10, 'App\\Models\\User', 56),
(10, 'App\\Models\\User', 57),
(10, 'App\\Models\\User', 58),
(10, 'App\\Models\\User', 59),
(10, 'App\\Models\\User', 60),
(10, 'App\\Models\\User', 61),
(11, 'App\\Models\\User', 62),
(11, 'App\\Models\\User', 63),
(11, 'App\\Models\\User', 64),
(11, 'App\\Models\\User', 65),
(11, 'App\\Models\\User', 66),
(11, 'App\\Models\\User', 67),
(11, 'App\\Models\\User', 68),
(11, 'App\\Models\\User', 69),
(11, 'App\\Models\\User', 70),
(11, 'App\\Models\\User', 71),
(12, 'App\\Models\\User', 8),
(12, 'App\\Models\\User', 72),
(12, 'App\\Models\\User', 73),
(12, 'App\\Models\\User', 74),
(12, 'App\\Models\\User', 75),
(12, 'App\\Models\\User', 76),
(12, 'App\\Models\\User', 77),
(12, 'App\\Models\\User', 78),
(12, 'App\\Models\\User', 79),
(12, 'App\\Models\\User', 80),
(12, 'App\\Models\\User', 81),
(12, 'App\\Models\\User', 82),
(12, 'App\\Models\\User', 83),
(12, 'App\\Models\\User', 84),
(12, 'App\\Models\\User', 85),
(12, 'App\\Models\\User', 86),
(12, 'App\\Models\\User', 87),
(12, 'App\\Models\\User', 88),
(12, 'App\\Models\\User', 89),
(12, 'App\\Models\\User', 90),
(12, 'App\\Models\\User', 91),
(12, 'App\\Models\\User', 92),
(12, 'App\\Models\\User', 93),
(12, 'App\\Models\\User', 94),
(12, 'App\\Models\\User', 95),
(12, 'App\\Models\\User', 96),
(12, 'App\\Models\\User', 97),
(12, 'App\\Models\\User', 98),
(12, 'App\\Models\\User', 99),
(12, 'App\\Models\\User', 100),
(12, 'App\\Models\\User', 101),
(12, 'App\\Models\\User', 102),
(12, 'App\\Models\\User', 103),
(12, 'App\\Models\\User', 104),
(12, 'App\\Models\\User', 105),
(12, 'App\\Models\\User', 106),
(12, 'App\\Models\\User', 107),
(12, 'App\\Models\\User', 108),
(12, 'App\\Models\\User', 109),
(12, 'App\\Models\\User', 110),
(12, 'App\\Models\\User', 111),
(12, 'App\\Models\\User', 112),
(12, 'App\\Models\\User', 113),
(12, 'App\\Models\\User', 114),
(12, 'App\\Models\\User', 115),
(12, 'App\\Models\\User', 116),
(12, 'App\\Models\\User', 117),
(12, 'App\\Models\\User', 118),
(12, 'App\\Models\\User', 119),
(12, 'App\\Models\\User', 120),
(12, 'App\\Models\\User', 121),
(12, 'App\\Models\\User', 122),
(12, 'App\\Models\\User', 123),
(12, 'App\\Models\\User', 124),
(12, 'App\\Models\\User', 125),
(12, 'App\\Models\\User', 126),
(12, 'App\\Models\\User', 127),
(12, 'App\\Models\\User', 128),
(12, 'App\\Models\\User', 129),
(12, 'App\\Models\\User', 130),
(12, 'App\\Models\\User', 131),
(12, 'App\\Models\\User', 132),
(12, 'App\\Models\\User', 133),
(12, 'App\\Models\\User', 134),
(12, 'App\\Models\\User', 135),
(12, 'App\\Models\\User', 136),
(12, 'App\\Models\\User', 137),
(12, 'App\\Models\\User', 138),
(12, 'App\\Models\\User', 139),
(12, 'App\\Models\\User', 140),
(12, 'App\\Models\\User', 141),
(12, 'App\\Models\\User', 142),
(12, 'App\\Models\\User', 143),
(12, 'App\\Models\\User', 144),
(12, 'App\\Models\\User', 145),
(12, 'App\\Models\\User', 146),
(12, 'App\\Models\\User', 147),
(12, 'App\\Models\\User', 148),
(12, 'App\\Models\\User', 149),
(12, 'App\\Models\\User', 150),
(12, 'App\\Models\\User', 151),
(12, 'App\\Models\\User', 152),
(12, 'App\\Models\\User', 153),
(12, 'App\\Models\\User', 154),
(12, 'App\\Models\\User', 155),
(12, 'App\\Models\\User', 156),
(12, 'App\\Models\\User', 157),
(12, 'App\\Models\\User', 158),
(12, 'App\\Models\\User', 159),
(12, 'App\\Models\\User', 160),
(12, 'App\\Models\\User', 161),
(12, 'App\\Models\\User', 162),
(12, 'App\\Models\\User', 163),
(12, 'App\\Models\\User', 164),
(12, 'App\\Models\\User', 165),
(12, 'App\\Models\\User', 166),
(12, 'App\\Models\\User', 167),
(12, 'App\\Models\\User', 168),
(12, 'App\\Models\\User', 169),
(12, 'App\\Models\\User', 170),
(12, 'App\\Models\\User', 171),
(12, 'App\\Models\\User', 172),
(12, 'App\\Models\\User', 173),
(12, 'App\\Models\\User', 174),
(12, 'App\\Models\\User', 175),
(12, 'App\\Models\\User', 176),
(12, 'App\\Models\\User', 177),
(12, 'App\\Models\\User', 178),
(12, 'App\\Models\\User', 179),
(12, 'App\\Models\\User', 180),
(12, 'App\\Models\\User', 181),
(12, 'App\\Models\\User', 182),
(12, 'App\\Models\\User', 183),
(12, 'App\\Models\\User', 184),
(12, 'App\\Models\\User', 185),
(12, 'App\\Models\\User', 186),
(12, 'App\\Models\\User', 187),
(12, 'App\\Models\\User', 188),
(12, 'App\\Models\\User', 189),
(12, 'App\\Models\\User', 190),
(12, 'App\\Models\\User', 191),
(12, 'App\\Models\\User', 192),
(12, 'App\\Models\\User', 193),
(12, 'App\\Models\\User', 194),
(12, 'App\\Models\\User', 195),
(12, 'App\\Models\\User', 196),
(12, 'App\\Models\\User', 197),
(12, 'App\\Models\\User', 198),
(12, 'App\\Models\\User', 199),
(12, 'App\\Models\\User', 200),
(12, 'App\\Models\\User', 201),
(12, 'App\\Models\\User', 202),
(12, 'App\\Models\\User', 203),
(12, 'App\\Models\\User', 204),
(12, 'App\\Models\\User', 205),
(12, 'App\\Models\\User', 206),
(12, 'App\\Models\\User', 207),
(12, 'App\\Models\\User', 208),
(12, 'App\\Models\\User', 209),
(12, 'App\\Models\\User', 210),
(12, 'App\\Models\\User', 211),
(12, 'App\\Models\\User', 212),
(12, 'App\\Models\\User', 213),
(12, 'App\\Models\\User', 214),
(12, 'App\\Models\\User', 215),
(12, 'App\\Models\\User', 216),
(12, 'App\\Models\\User', 217),
(12, 'App\\Models\\User', 218),
(12, 'App\\Models\\User', 219),
(12, 'App\\Models\\User', 220),
(12, 'App\\Models\\User', 221),
(12, 'App\\Models\\User', 222),
(12, 'App\\Models\\User', 223),
(12, 'App\\Models\\User', 224),
(12, 'App\\Models\\User', 225),
(12, 'App\\Models\\User', 226),
(12, 'App\\Models\\User', 227),
(12, 'App\\Models\\User', 228),
(12, 'App\\Models\\User', 229),
(12, 'App\\Models\\User', 230),
(12, 'App\\Models\\User', 231),
(12, 'App\\Models\\User', 232),
(12, 'App\\Models\\User', 233),
(12, 'App\\Models\\User', 234),
(12, 'App\\Models\\User', 235),
(12, 'App\\Models\\User', 236),
(12, 'App\\Models\\User', 237),
(12, 'App\\Models\\User', 238),
(12, 'App\\Models\\User', 239),
(12, 'App\\Models\\User', 240),
(12, 'App\\Models\\User', 241),
(12, 'App\\Models\\User', 242);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'ehs.create', 'web', '2024-11-03 20:00:00', '2024-11-03 20:00:00'),
(2, 'ehs.edit', 'web', '2024-11-03 20:00:29', '2024-11-03 20:00:29');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'API Token', '25b2893ec91a06f2e3fc07995da3e464d54e40fa92e56aca80d594c22c6aa6db', '[\"*\"]', '2024-11-03 19:21:08', '2024-11-03 19:20:59', '2024-11-03 19:21:08'),
(2, 'App\\Models\\User', 1, 'API Token', 'b1cdc547b845de06cf641a3959cbe435aa52739701570c865e2433436bd94c94', '[\"*\"]', '2024-11-03 20:40:21', '2024-11-03 20:36:08', '2024-11-03 20:40:21');

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `position`, `code`, `created_at`, `updated_at`) VALUES
(1, 'BOD', 'BOD', '2024-11-03 19:13:29', '2024-11-03 19:13:29'),
(2, 'Dept Head', 'DEPT', '2024-11-03 19:13:29', '2024-11-03 19:13:29'),
(3, 'Supervisor', 'SPV', '2024-11-03 19:13:29', '2024-11-03 19:13:29'),
(4, 'Officer', 'OFFICER', '2024-11-03 19:13:30', '2024-11-03 19:13:30'),
(5, 'Staff', 'STAFF', '2024-11-03 19:13:30', '2024-11-03 19:13:30'),
(6, 'Foreman', 'FRM', '2024-11-03 19:13:30', '2024-11-03 19:13:30'),
(7, 'Leader', 'LEAD', '2024-11-03 19:13:30', '2024-11-03 19:13:30'),
(8, 'Member', 'OP', '2024-11-03 19:13:30', '2024-11-03 19:13:30'),
(9, 'SUB', 'SUB', '2024-11-03 19:13:30', '2024-11-03 19:13:30');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'AdminLS', 'web', '2024-11-03 19:13:30', '2024-11-03 19:13:30'),
(2, 'PIC', 'web', '2024-11-03 19:13:30', '2024-11-03 19:13:30'),
(3, 'Departement Head PIC', 'web', '2024-11-03 19:13:30', '2024-11-03 19:13:30'),
(4, 'Departement Head EHS', 'web', '2024-11-03 19:13:30', '2024-11-03 19:13:30'),
(5, 'Admin', 'web', '2024-11-03 19:13:30', '2024-11-03 19:13:30'),
(6, 'Board of Directors', 'web', '2024-11-03 19:13:30', '2024-11-03 19:13:30'),
(7, 'Department Head', 'web', '2024-11-03 19:13:30', '2024-11-03 19:13:30'),
(8, 'Supervisor', 'web', '2024-11-03 19:13:30', '2024-11-03 19:13:30'),
(9, 'Staff', 'web', '2024-11-03 19:13:30', '2024-11-03 19:13:30'),
(10, 'Foreman', 'web', '2024-11-03 19:13:30', '2024-11-03 19:13:30'),
(11, 'Leader', 'web', '2024-11-03 19:13:30', '2024-11-03 19:13:30'),
(12, 'Member', 'web', '2024-11-03 19:13:30', '2024-11-03 19:13:30');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_websites`
--

CREATE TABLE `sub_websites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sampul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `departments` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'semua',
  `detail_departements` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'semua',
  `positions` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'semua',
  `users` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'semua',
  `role` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_websites`
--

INSERT INTO `sub_websites` (`id`, `name`, `sampul`, `link`, `departments`, `detail_departements`, `positions`, `users`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Limit-Sample', '1730686559.png', 'http://10.14.179.250:1111', '[\"semua\"]', '[\"Quality Control\",\"Quality Assurance\"]', '[\"semua\"]', '[\"semua\"]', NULL, '2024-11-03 19:16:00', '2024-11-03 19:18:21'),
(2, 'EHS Patrol (Local)', '1730691404.png', 'http://10.14.179.250:3333', '[\"semua\"]', '[\"semua\"]', '[\"semua\"]', '[\"semua\"]', NULL, '2024-11-03 20:36:44', '2024-11-03 20:36:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `npk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_masuk` date DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `dept_id` bigint(20) UNSIGNED DEFAULT NULL,
  `position_id` bigint(20) UNSIGNED DEFAULT NULL,
  `detail_dept_id` bigint(20) UNSIGNED DEFAULT NULL,
  `golongan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_logged_in` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `npk`, `username`, `gender`, `tgl_masuk`, `tgl_lahir`, `dept_id`, `position_id`, `detail_dept_id`, `golongan`, `email_verified_at`, `password`, `is_logged_in`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '0000', 'admin', 'Perempuan', NULL, NULL, NULL, NULL, NULL, '1', NULL, '$2y$10$GXkHq.z.i337NQZdYodxbuCHagleRRJ7OBPjPLqlMU/10w1xyLkn.', 1, NULL, '2024-11-03 19:13:30', '2024-11-03 20:36:08', NULL),
(2, 'Pandu Azaria Ginzel', 'pandu@gmail.com', '0797', 'pandu.a', 'Laki-Laki', '2022-03-01', '1987-12-02', 5, 2, 4, '2', NULL, '$2y$10$jml0xWmeR4DpRXolnNB22OzPzCgjXzDMgzrkqmNuRz33pZJEvhc8W', 0, NULL, '2024-11-03 19:13:30', '2024-11-03 19:13:30', NULL),
(3, 'Wahyu Rahayu Irawan', 'wahyu@gmail.com', '0012', 'wahyu.r', 'Laki-Laki', '2012-12-01', '1982-02-26', 1, 2, 1, '2', NULL, '$2y$10$8WRWvsX1/5103V82qR.6u.GGVCpJVhH4Qis9YNiLGEPHY9snclKXu', 0, NULL, '2024-11-03 19:13:31', '2024-11-03 19:13:31', NULL),
(4, 'Rizky Ayu Puspitasari', 'rizky@gmail.com', '0295', 'rizky.ayu', 'Perempuan', '2017-08-03', '1989-05-02', 1, 3, 1, '3', NULL, '$2y$10$lx6KGgTesSLpX7z7GyjkmOjZWwkZdXzjaEMp6TIeD9MbP6r9iBgrC', 0, NULL, '2024-11-03 19:13:31', '2024-11-03 19:13:31', NULL),
(5, 'Dini Septiani Permatasari', 'dini@gmail.com', '0677', 'dini.s', 'Perempuan', '2021-06-14', '1994-09-06', 1, 5, 1, '5', NULL, '$2y$10$GibmXYPMr8qqPY7wiJlDa.PJY8LOGw6uE6uPHk25jtgg/JlK9OUZy', 0, NULL, '2024-11-03 19:13:31', '2024-11-03 19:13:31', NULL),
(6, 'Ardan', 'ardan@gmail.com', '0066', 'ardan', 'Laki-Laki', '2008-08-01', '1987-04-30', 7, 2, 13, '2', NULL, '$2y$10$dYEG7P.aKsATuvsyiRs1uuRYlruitlYE104c6VFfJiSEA1AYWc2J2', 0, NULL, '2024-11-03 19:13:31', '2024-11-03 19:13:31', NULL),
(7, 'Dealiftian Sandy', 'dealiftian@gmail.com', '0811', 'sandy', 'Laki-Laki', '2022-05-17', '1987-10-13', 7, 3, 14, '3', NULL, '$2y$10$OoR4PeK1YRcdxb.OoIbpsOC.CjRo3JzLzEjcb3yxPDfsx/4xaDq8i', 0, NULL, '2024-11-03 19:13:31', '2024-11-03 19:13:31', NULL),
(8, 'G.A Zahwania Senkliani Rahmandani', 'zahwania@gmail.com', '0795', 'zahwania', 'Perempuan', '2022-01-06', '2001-03-05', 7, 8, 13, '8', NULL, '$2y$10$ROOlyPtDToCSsJI2s.rS4.p47usD2jpi7V5O0tQ0IHsFMU9yK66lm', 0, NULL, '2024-11-03 19:13:31', '2024-11-03 19:13:31', NULL),
(9, 'Antony', 'antony@gmail.com', '0049', 'antony', 'Laki-Laki', '2013-07-01', '1984-10-18', 3, 2, 3, '2', NULL, '$2y$10$IFNhwOzEIs8qrEvydYI2Z.IDs3eNqk9YxVVeg95f4akq6DEr4BScC', 0, NULL, '2024-11-03 19:13:31', '2024-11-03 19:13:31', NULL),
(10, 'Ellys Yuniar Sidauruk', 'ellys@gmail.com', '0059', 'ellys.y', 'Perempuan', '2013-11-01', '1984-06-23', 6, 2, 12, '2', NULL, '$2y$10$ym1UEm1y6.m9BMJLJpNUyOfjAAON2cpV2dBBirOG9.51YtpDDbRyK', 0, NULL, '2024-11-03 19:13:32', '2024-11-03 19:13:32', NULL),
(11, 'Fera Setiawati', 'fera@gmail.com', '0450', 'fera.s', 'Perempuan', '2019-04-15', '1986-09-08', 9, 2, 15, '2', NULL, '$2y$10$cEWid18GBPAoYYNLF.MbI.6sDzgHmqJQQiS5QUaoMEF/McljiDfSe', 0, NULL, '2024-11-03 19:13:32', '2024-11-03 19:13:32', NULL),
(12, 'Siswanto', 'siswanto@gmail.com', '0305', 'siswanto', 'Laki-Laki', '2002-11-01', '1981-03-09', 14, 2, 25, '2', NULL, '$2y$10$x2kC0QWNYhIzQIqquI/Wru2m9xT7f6Ji5stWJuIJmgdXSaGjdIzY6', 0, NULL, '2024-11-03 19:13:44', '2024-11-03 19:13:44', NULL),
(13, 'Agung Budiyanto', 'agung@gmail.com', '0844', 'agung.b', 'Laki-Laki', '2012-04-30', '1973-08-01', 15, 2, 40, '2', NULL, '$2y$10$82v7HEr1O.8Hx0/bBzucleYIM3yoFt5udqgASjSBvAhX4/je.rKcm', 0, NULL, '2024-11-03 19:13:45', '2024-11-03 19:13:45', NULL),
(14, 'Wu Chi Chen', 'wu@gmail.com', '0810', 'wu.c', 'Laki-Laki', '2022-05-07', '1979-05-31', 11, 1, 23, '1', NULL, '$2y$10$QHSUhPS4srxWsK9OnN/SNOCzs6vB6XBYIVCzvGxhSj8BN2morsJVi', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(15, 'Felix Rikantara', 'felix@gmail.com', '0303', 'felix.r', 'Laki-Laki', '1996-07-01', '1972-06-22', 11, 1, 23, '1', NULL, '$2y$10$Rf.Gx3iZfsYOG2EtWtra0eOGlgWRrNpP1l05LEB1JFxBpTQhQlnSu', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(16, 'Cindy Tirta', 'cindy@gmail.com', '0830', 'cindy.t', 'Perempuan', '2021-09-01', '1982-06-17', 11, 1, 23, '1', NULL, '$2y$10$/ADo9chonnNAZxy9JZ1z3OsMWx9mWtrMFtWm7sWfgi/L8mV0CaLP2', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(17, 'Iwan Muhdi', 'iwan@gmail.com', '0013', 'iwan.m', 'Laki-Laki', '2012-12-01', '1972-02-29', 5, 4, 11, '4', NULL, '$2y$10$zzmRrq/nHjDJouVxg6VbuujARcACVlVsLIFBlWzvEBVDkDxaa3zS.', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(18, 'Tanya Mutia', 'tanya@gmail.com', '0051', 'tanya.m', 'Perempuan', '2013-06-17', '1990-09-06', 5, 4, 4, '4', NULL, '$2y$10$xDIWzxeHzh6BDoAKUgKDCOd2Pu6na.6En4qIJpVTm.WY4vgu3JoD.', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(19, 'Septin Kisriani', 'septin@gmail.com', '0179', 'septin.k', 'Perempuan', '2015-10-12', '1993-09-11', 5, 4, 10, '4', NULL, '$2y$10$lk6qPCpemJZ57Ld52emx7O7aCMVqkpbfhHUFbT5o53tGlEHocpm4.', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(20, 'Miqdad Agil Amarullah', 'miqdad@gmail.com', '0801', 'miqdad.a', 'Laki-Laki', '2022-03-01', '1995-07-20', 5, 3, 7, '3', NULL, '$2y$10$2bdVOORDQbgCAxdt1YByH.CpVVjBOrojuktF4KMZkzdOSC9BBBMZq', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(21, 'Dewi Kartika', 'dewi@gmail.com', '0828', 'dewi.k', 'Perempuan', '2023-02-06', '1991-03-03', 5, 4, 5, '4', NULL, '$2y$10$.kzBDXxRRqAOZ8atWKaggufL2WCsHlUdYE2KLa/mxvzS7qNW174H.', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(22, 'Ferri Firdaus', 'ferri@gmail.com', '0415', 'ferri.f', 'Laki-Laki', '2014-05-08', '1974-12-13', 3, 3, 3, '3', NULL, '$2y$10$57rMw26NpXlN5ajfhqKKrOGtnDtIZgRp1trXc6NntS6FSXEadNtGe', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(23, 'Ridwan Syarif', 'syarif@gmail.com', '0320', 'ridwan.s', 'Laki-Laki', '2018-01-24', '1985-03-30', 3, 4, 25, '4', NULL, '$2y$10$UKYopKIkTaVNZjgcH7FPk.IRW02zPamFMnkl7YK14qyfpsXBxJyja', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(24, 'Muhammad Andaru Dwi Diva', 'andaru@gmail.com', '0834', 'andaru.d', 'Laki-Laki', '2023-11-13', '1998-11-07', 3, 4, 3, '4', NULL, '$2y$10$sCRmxoBtVwemdJ0Wuy7XlOLdRBY5W0MPLvDXho56HonT.JNiZOvNK', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(25, 'Surianto Farip', 'surianto@gmail.com', '0812', 'surianto.s', 'Laki-Laki', '2022-05-24', '1995-02-17', 3, 4, 25, '4', NULL, '$2y$10$eGd.b3GT5Z.6Wh1U7txvCu8inJXxoGcnxN8PyHQKpUfJLm1nKHwx2', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(26, 'Muhammad Ridwan', 'ridwan@gmail.com', '0813', 'ridwan.m', 'Laki-Laki', '2022-07-11', '1992-02-27', 3, 4, 3, '4', NULL, '$2y$10$qMMVNPeE013rg.QsjuwfdOD6ASABwk7cbJZdcTH/kjrX.THwR7x6y', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(27, 'Riky Sutriadi Putra', 'riky@gmail.com', '0347', 'riky.s', 'Laki-Laki', '2018-06-21', '1992-08-19', 9, 3, 15, '3', NULL, '$2y$10$nzS1cbiEg7Kb4MWJ2ZYJn.baetHAqYJGum8xcI1wwOjQzg28TYDii', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(28, 'Maya Lestari', 'maya@gmail.com', '0026', 'maya.l', 'Perempuan', '2012-12-01', '1993-02-28', 9, 3, 16, '3', NULL, '$2y$10$/p7BdYk3fmGF7IEt3ja2COwKj8X94LW/jeqzI2zuG85Jd3uRmVk8y', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(29, 'Jakaria', 'jakaria@gmail.com', '0807', 'jakaria', 'Laki-Laki', '2022-03-08', '1990-03-27', 9, 3, 20, '3', NULL, '$2y$10$25o19HZ8K.ghcreK.GwR..8qkgqJ/XdBGMv.pQwHnViXZQqG7Qzey', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(30, 'Imam Fazri Patar Marimbun', 'imam@gmail.com', '0808', 'imam.f', 'Laki-Laki', '2022-05-09', '1990-06-03', 9, 3, 20, '3', NULL, '$2y$10$pvoOW.lNzeoNLQzQd3YXouIK0Q4igE76XVg.73.qrFQ1V1Y56fQHO', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(31, 'Zuraida Rochman', 'zuraida@gmail.com', '0540', 'zuraida.r', 'Laki-Laki', '1995-02-28', '1974-09-05', 14, 3, 28, '3', NULL, '$2y$10$bFTWcljLLD4XQmeoPwkBlu5IOTSXU6F.Yt9K6OCjRGzYJcu5X0XXW', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(32, 'Dicky Kusworo Setiawan', 'dicky@gmail.com', '0559', 'dicky.k', 'Laki-Laki', '2013-10-01', '1991-07-31', 14, 3, 25, '3', NULL, '$2y$10$FxHk74Hyq5Zw4GFxgJM1juTenEeFtCRlEsCRFPk50JO4ky522Xm.q', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(33, 'Dwi Cahyadi', 'dwi@gmail.com', '0269', 'dwi.c', 'Laki-Laki', '2017-04-11', '1986-05-03', 15, 3, 39, '3', NULL, '$2y$10$sRs.O29wVxZLHYMua19aXeIgtU1AEfnIxrSrDWzwTkVus152V2lMm', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(34, 'Teguh Nur Tolib', 'teguh@gmail.com', '0299', 'teguh.n', 'Laki-Laki', '2017-09-25', '1989-03-15', 15, 3, 41, '3', NULL, '$2y$10$gx.97Pz2OY.keUVupUVa.uQKpk7IGpxuwtkcV3y8P6DZFx2MQzeh6', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(35, 'Isna Rahmawati', 'isna@gmail.com', '0176', 'isna.r', 'Perempuan', '2015-09-14', '1994-06-13', 7, 5, 14, '5', NULL, '$2y$10$h3k5qecmv0JOW3W4YNb7bO3M7dx9TupLVOTUgk/4oH79KQ7.fz8Cq', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(36, 'Kartika Pratiwi', 'kartika@gmail.com', '0053', 'kartika.p', 'Perempuan', '2013-07-22', '1988-11-20', 7, 5, 13, '5', NULL, '$2y$10$UAB73LkrhlP6fJf2pssKO.aWA4PAHTb66HoEHll6O7m6NfHzwGVdG', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(37, 'Susilo Hendro Nugroho', 'susilo@gmail.com', '0293', 'susilo.n', 'Laki-Laki', '2017-08-01', '1983-01-25', 5, 5, 5, '5', NULL, '$2y$10$ABjucKASD7V9HrwmSTkJeu1hIE5i2CXhsdwpA2WAhBMUOsDu/V9bC', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(38, 'Adela Rosya Ainunnisa', 'adela@gmail.com', '0831', 'adela.r', 'Perempuan', '2023-07-03', '2000-05-28', 5, 5, 6, '5', NULL, '$2y$10$vi53IgMyUN.aGJWTIpGY0usg4S6A9KOkdAjTZ..cpN0f2TwdGgXsq', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(39, 'Andreas Adhi Purnawan', 'andreas@gmail.com', '0178', 'andreas.a', 'Laki-Laki', '2015-10-05', '1993-05-10', 3, 5, 3, '5', NULL, '$2y$10$6lUx4vJv49zWp3N2TfCRD.6fBbfaX5Gx1ZxmN4NjQcSRFSr96jQXK', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(40, 'Yohanes Yerusalem Iskandar', 'yohanes@gmail.com', '0276', 'yohanes.y', 'Laki-Laki', '2017-04-25', '1986-11-23', 3, 5, 3, '5', NULL, '$2y$10$UxkTvexqmj/6ovDmy3vF6OVQzD86AJmK.4fSAzCYXIZPb71DeGdrC', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(41, 'Lesti Farida', 'lesti@gmail.com', '0337', 'lesti.l', 'Perempuan', '2018-04-23', '1990-05-12', 3, 5, 25, '5', NULL, '$2y$10$FIc1dSXFA4nkYOJm.jmtTu86IOy/pUH7vEKEY/2Ni2dtULM4z5eDK', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(42, 'Ahmad Hudori', 'ahmad@gmail.com', '0148', 'ahmad.h', 'Laki-Laki', '2015-04-20', '1985-11-17', 6, 5, 12, '5', NULL, '$2y$10$7.B0m0P5vMaeUfg/oJxHO.P6Z3CdnwNFlMxI8h1DpxpZL44tLNdsO', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(43, 'Resty Harianti', 'resty@gmail.com', '0369', 'resty.h', 'Perempuan', '2018-10-02', '1994-12-18', 6, 5, 12, '5', NULL, '$2y$10$VJRhlrW/FT3.fDJn9.BqOO17HTFdjFJblgzSToyKmwaZE0iWUIma6', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(44, 'Isman Ismail Marzuki', 'isman@gmail.com', '0798', 'isman.i', 'Laki-Laki', '2022-02-10', '1990-02-06', 14, 5, 37, '5', NULL, '$2y$10$1XzZSMDJhYEuOewv831RsOQ.pnJB3Ub47Y5/yGywRcZkOi9XS/MUu', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(45, 'Fajar Akbar', 'fajarakbar@gmail.com', '0824', 'fajar.a', 'Laki-Laki', '2022-11-11', '1995-12-23', 14, 5, 36, '5', NULL, '$2y$10$kWfee7vELcfXCaSZZenKLO0uGCKS29t9/3nTt9z2jfTVB.PTao4Uq', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(46, 'Hadiid Putra Lokananta', 'hadiid@gmail.com', '0833', 'hadiid.p', 'Laki-Laki', '2023-10-23', '2002-05-01', 14, 5, 32, '5', NULL, '$2y$10$ix1N4t4PBYAGJ1tDwSigIOtb0vb3MyDqTgu60VdTIRZpoHxAYELsS', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(47, 'Mgs Rendy Meifriansyah', 'rendy@gmail.com', '0065', 'rendy.m', 'Laki-Laki', '2013-12-11', '1982-05-30', 14, 5, 38, '5', NULL, '$2y$10$oe.YcTXZgjm/bEfhi1fYnuKaJX4tGx.GQGuVkcJ2sSnTjjY7X6i5u', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(48, 'Dedy Sukma Saputra', 'dedy@gmail.com', '0139', 'dedy.s', 'Laki-Laki', '2015-02-10', '1992-08-11', 14, 5, 33, '5', NULL, '$2y$10$pVAshn/aWTwSnhuudYfNau0SquKit0PbYLfp00Pkps58hVxWj111q', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(49, 'Achmad Edy Ismera Sesary Ramadhani', 'achmad@gmail.com', '0510', 'achmad.e', 'Laki-Laki', '2019-10-01', '1998-01-02', 14, 5, 31, '5', NULL, '$2y$10$eIVNA6IxNLbVtk/no0ACIuheTT1mcvxH5LeX9Qi2Tze6mLSQ.9hRe', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(50, 'Maulana Ahve Yunas', 'maulana@gmail.com', '0742', 'maulana.a', 'Laki-Laki', '2021-10-01', '1993-08-29', 15, 5, 42, '5', NULL, '$2y$10$9BGQh4baIAmZ.TQXwSfJT.9P2ukOMygKOZ5qlPlrW3BzK9cpo.8ti', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(51, 'Ghradika Asmara Wrahat Sangka', 'ghradika@gmail.com', '0836', 'ghradika.a', 'Laki-Laki', '2024-04-17', '2001-09-27', 15, 5, 42, '5', NULL, '$2y$10$9hNJUSJgzlBZHVL3363GRebkwMBNtEMOHJn1MdX1PN51PedzDpCfC', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(52, 'Fernanda Vebryan Syah', 'fernanda@gmail.com', '0837', 'fernanda.v', 'Laki-Laki', '2024-04-17', '2002-05-01', 15, 5, 39, '5', NULL, '$2y$10$roqWkk5/kpHWAUkSt3I7.uqYGPLVN2HazpQnoq0iIMdrWV03WuVrW', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(53, 'Novan Tri Harwiyanto', 'novan@gmail.com', '0825', 'novan.t', 'Laki-Laki', '2022-12-05', '1992-11-09', 9, 6, 15, '6', NULL, '$2y$10$L8ZnC9D20Mvr5XpI8EQm2eNyeByV1geVuXeETwRoZ5GjxWOtItyMm', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(54, 'Makhfud Anwar', 'makhfud@gmail.com', '0015', 'makhfud.a', 'Laki-Laki', '2012-12-01', '1983-05-12', 4, 6, 21, '6', NULL, '$2y$10$0KKwcFYD1mofXU6fa8/bJuTqTVDXDmI1r/JqVHDOEolmM7X7/LrCe', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(55, 'Endang Aminudin', 'endang@gmail.com', '0020', 'endang.a', 'Laki-Laki', '2012-12-01', '1982-02-18', 4, 6, 21, '6', NULL, '$2y$10$ACWs.WKS42PqIEClxYAb2OQchlvGXikMnSKvXGlfpg2iQuzS1Sf96', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(56, 'Wasito', 'wasito@gmail.com', '0069', 'wasito', 'Laki-Laki', '2014-01-13', '1990-09-22', 4, 6, 15, '6', NULL, '$2y$10$fcjIrpo7nyHqJi9tYDCzS.0/zQdoA1T8H5vM8SsthO06qiGmu.svG', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(57, 'Herma Mardian Fitriyansah', 'herma@gmail.com', '0675', 'herma.m', 'Laki-Laki', '2021-06-14', '1996-03-25', 4, 6, 15, '6', NULL, '$2y$10$cpKAn3oVchiW4eiJAflsLOG1bE1vB/bSpjO2dQkKmNvF9a74nXReC', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(58, 'Kristino Budiarto', 'kristino@gmail.com', '0095', 'kristino.b', 'Laki-Laki', '2014-10-27', '1993-05-30', 14, 6, 34, '6', NULL, '$2y$10$owjYsPTmMuaHc5F9/OHk8u9Ne.NC35rq10yb5nhFIvTuU5e1yi8dy', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(59, 'Wawan Edy Santoso', 'wawan@gmail.com', '0145', 'wawan.e', 'Laki-Laki', '2015-03-02', '1990-07-02', 14, 6, 29, '6', NULL, '$2y$10$5Oa99qA8S6/TqPL05SMQ3e1Pr4NEi.98gqvW5oFxqt9GEOEJtbOgi', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(60, 'Muhammad Rizki Marsudi', 'marsudi@gmail.com', '0800', 'muhammad.r', 'Laki-Laki', '2022-03-01', '1992-10-01', 15, 6, 39, '6', NULL, '$2y$10$IIgul2XnQ3jQ9CL9udwD/Of7nEy0foPm1aFmXnHHqigWo1xgB4xjC', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(61, 'Didit Aditya', 'didit@gmail.com', '0839', 'didit.a', 'Laki-Laki', '2024-05-20', '2000-02-13', 15, 6, 39, '6', NULL, '$2y$10$QmGW/GpJA7REcP11dgTLCe0ovyivRjgRV.WQp2.J.NP2GvJt/xZg2', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(62, 'Ubaidillah', 'ubaidillah@gmail.com', '0027', 'ubaidillah', 'Laki-Laki', '2012-12-01', '1988-11-21', 4, 7, 22, '7', NULL, '$2y$10$Dgub1TP1wdHLoxwfOx4Y/.qPpFRN037h5UyC79vl83Q4K6G2wUqrG', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(63, 'Iskandar', 'iskandar@gmail.com', '0036', 'iskandar', 'Laki-Laki', '2012-12-01', '1990-10-28', 4, 7, 17, '7', NULL, '$2y$10$2uGkRpH7r.AjxaC2doYXEezWCyxZ7JZoj9OYR0mN1Ic.AIx.9mTqa', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(64, 'Agil Hendi Saputro', 'agil@gmail.com', '0085', 'agil.h', 'Laki-Laki', '2014-08-15', '1991-02-04', 4, 7, 22, '7', NULL, '$2y$10$Gwju.RyNnLQR.uc4sWpVQuQWUf2sP01hnDjOtYwdniGG13fIA2Ocq', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(65, 'Novi Ari Septiawan', 'novi@gmail.com', '0115', 'novi.a', 'Laki-Laki', '2014-12-04', '1993-09-05', 4, 7, 17, '7', NULL, '$2y$10$AkK55LdaMzYMB4uTJ/HSpuNUTpls9UK7luvIaes6fT.ZfyHdx2Mca', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(66, 'Suparlan', 'suparlan@gmail.com', '0141', 'suparlan', 'Laki-Laki', '2015-02-24', '1993-10-21', 4, 7, 22, '7', NULL, '$2y$10$UQpcqnziMwUWaAscyAwHnuuzjmPLPl3RscyYaT6xVS5AKtgvhGIjm', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(67, 'Aries Komara', 'aries@gmail.com', '0151', 'aries.k', 'Laki-Laki', '2015-04-30', '1996-09-10', 4, 7, 17, '7', NULL, '$2y$10$neAZ3yor8wA0ByEysq9DHe8KBtvEwNUQgCb6syfS8k4zUHHpGz3Vi', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(68, 'Rifqi Nuryasin', 'rifqi@gmail.com', '0208', 'rifqi.n', 'Laki-Laki', '2016-06-16', '1994-08-28', 4, 7, 17, '7', NULL, '$2y$10$Y5ZhdmkqoKdEIuUlTqI1C.9auLQytZ4z0pU3zhXH3yz8RFHRO3yhK', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(69, 'Sutanto', 'sutanto@gmail.com', '0288', 'sutanto', 'Laki-Laki', '2017-05-26', '1995-02-16', 4, 7, 22, '7', NULL, '$2y$10$h4RGSSKTsb.jR8lBshUMleiA1WYoMgCqe6SUcOdgWZEc4U9CjNqxq', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(70, 'Agung Reksa Negara', 'agungreksa@gmail.com', '0034', 'agung.r', 'Laki-Laki', '2012-12-01', '1989-08-01', 15, 7, 39, '7', NULL, '$2y$10$Ra9z6zW9H0/0W/mfIzrPHuUoiit/yybMLwAn2N2toocMxmieYgY3u', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(71, 'Fajar Dwiyan Kusuma', 'fajar@gmail.com', '0142', 'fajar.d', 'Perempuan', '2015-02-24', '1992-12-18', 15, 7, 39, '7', NULL, '$2y$10$NZsDZxAeDQmiyjGOsD74curaXtj33gfJjRWJNPNp8u534Xx2N95EW', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(72, 'Galih Sudarsono', 'galih@gmail.com', '0029', 'galih.s', 'Laki-Laki', '2012-12-01', '1993-12-12', 9, 8, 22, '8', NULL, '$2y$10$oe22.PqqBFlO1s/CxG72webmouhyM2cpLLjsEzC08x0xtDwqZ.82a', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(73, 'Ade Arif Setiawan', 'ade@gmail.com', '0070', 'ade.a', 'Laki-Laki', '2014-01-13', '1991-05-30', 9, 8, 22, '8', NULL, '$2y$10$7QUsTWmESQ9/WpM1yZZQ3.M2g41dVfZGdgKg36aG94gr3QKTMTeni', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(74, 'Heri Ismanto', 'heriis@gmail.com', '0256', 'heri.i', 'Laki-Laki', '2017-02-01', '1994-06-16', 9, 8, 22, '8', NULL, '$2y$10$GI2D7f6Gkfuxq/vtlk9GzusnwaGYcf7FRWxM7dHk47KpkWwWmqe56', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(75, 'Sultonik', 'sultonik@gmail.com', '0627', 'sultonik', 'Laki-Laki', '2021-01-25', '1995-04-13', 9, 8, 22, '8', NULL, '$2y$10$XfBmh6hrHAKR11L41IccMOJnsQ25cJ1A7ors7WYjvsSsBlp.ZQHX6', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(76, 'Hadi Utama Putra', 'hadi@gmail.com', '0631', 'hadi.u', 'Laki-Laki', '2021-02-09', '1997-05-02', 9, 8, 22, '8', NULL, '$2y$10$fV1MgEzE3pijIzjXU1gcGurqH57etb5Uh83fTaPMyKs/ButeVYsga', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(77, 'Aldi Praseptio', 'aldi@gmail.com', '0633', 'aldi.p', 'Laki-Laki', '2021-02-22', '2002-09-22', 9, 8, 22, '8', NULL, '$2y$10$uMk.YuB5mWKkcB/0gJLM0.0f9GLo9is497zPP6OsjiAcSimmFkVGu', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(78, 'Heri Siswanto', 'herisis@gmail.com', '0694', 'heri.s', 'Laki-Laki', '2021-07-01', '1993-09-18', 9, 8, 22, '8', NULL, '$2y$10$5HexydJI99DSAdvqEkxV0OTibMeJXhJ5az44MAUhKZAIBI.AtIO3W', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(79, 'Ibnu Syafa\'at', 'ibnu@gmail.com', '0741', 'ibnu.s', 'Laki-Laki', '2021-09-29', '2003-03-10', 9, 8, 17, '8', NULL, '$2y$10$iYbzXfYDn46K/GLYXHG4w.di2VmRXVFWbUg4nH6u5ICspmqSYUYTK', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(80, 'Muhamad Rohendi', 'muhamad@gmail.com', '0743', 'muhamad.r', 'Laki-Laki', '2021-10-04', '1998-11-04', 9, 8, 17, '8', NULL, '$2y$10$eH5faQyUkD416oL8j5kHFuwG.TedW1lQxS/Y.uJYWZx5fYCbCQfYe', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(81, 'Risqi Sumarwanto', 'risqi@gmail.com', '0781', 'risqi.s', 'Laki-Laki', '2021-12-28', '1994-04-15', 9, 8, 17, '8', NULL, '$2y$10$ZMJPgQhvjCo3tSoV65fBG.3onc087pUuXEIJ/0E6/czzrnGwKdMdK', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(82, 'Ekham Husen Atamimi', 'ekam@gmail.com', '0783', 'ekam.h', 'Laki-Laki', '2021-12-28', '1997-09-06', 9, 8, 17, '8', NULL, '$2y$10$a3KuKcLICnkL5hSMg/eN..UlO.dn8J2b60kaM37jIqeFqJfpZErLa', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(83, 'Pranata Alfa Apriansyah', 'pranata@gmail.com', '0784', 'pranata.a', 'Laki-Laki', '2021-12-28', '2002-04-09', 9, 8, 17, '8', NULL, '$2y$10$uMeNIEAxjA0ej0V1c3cjz.QT7n4oqDS2DCgNJQ.bhpSkdUghSwkUO', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(84, 'Aulia Rindu Ahyar Diputri', 'aulia@gmail.com', '0787', 'aulia.r', 'Perempuan', '2021-12-28', '1999-09-08', 9, 8, 17, '8', NULL, '$2y$10$13GVkWSLIXOF6U7ASFUTfeE6KyJoIPTtVMYiuUCkfhZTMbuQYYH32', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(85, 'Ilham Dwi Nur Rohman', 'ilham@gmail.com', '0789', 'ilham.d', 'Laki-Laki', '2021-12-28', '2000-05-06', 9, 8, 22, '8', NULL, '$2y$10$l6mCGadHMcrWJuWALk/MWepAuh6HMG8vNbnLEfpSFi.PIkiziyQji', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(86, 'Nur Rohim', 'nur@gmail.com', '0814', 'nur.r', 'Laki-Laki', '2022-08-01', '1993-05-17', 9, 8, 22, '8', NULL, '$2y$10$I5jxvfJKP8VRVBsWUr0Uy.QepJZmjY.HdH9vsi9VlhlpTNlIcGcdy', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(87, 'Silma Fitria', 'silma@gmail.com', '0822', 'silma.f', 'Perempuan', '2022-10-01', '2000-07-03', 9, 8, 22, '8', NULL, '$2y$10$CKzjQIJuNB835A30cU12Luvf5MFWMwyRN2gFzKHFiK6hNN.ZOeAMm', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(88, 'Alji Maulana', 'alji@gmail.com', '0840', 'alji.m', 'Laki-Laki', '2024-07-01', '1998-02-10', 9, 8, 22, '8', NULL, '$2y$10$y9OLKGDXWwscuEyV6mTpI.cbaZrc1BvIiwEZbjlxXb/h3qCbHSLJu', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(89, 'Yuni Puspitaningrum', 'yuni@gmail.com', '0681', 'yuni.p', 'Perempuan', '2021-06-18', '2001-06-08', 4, 8, 22, '8', NULL, '$2y$10$X2/fZKdzBxyj/59nUkejg..b4BrvVbhgUxxmMp3vVaJTiXxoQ1nxi', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(90, 'Denisa Fitria', 'denisa@gmail.com', '0682', 'denisa.f', 'Perempuan', '2021-06-18', '2001-12-17', 4, 8, 18, '8', NULL, '$2y$10$zYbbUGMCuD7Q5tpa5wUCWeZsk/Ysf7nCi6EvqRYdtRfvDzZia5t6i', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(91, 'Dandi Maulana', 'dandi@gmail.com', '0684', 'dandi.m', 'Laki-Laki', '2021-06-18', '1997-02-14', 4, 8, 18, '8', NULL, '$2y$10$feDBJvuNniJSlPOcrW.u0ueG59kRucX7KIOGy8WuARHs0JElibbFe', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(92, 'Raynaldi', 'raynaldi@gmail.com', '0686', 'raynaldi', 'Laki-Laki', '2021-06-18', '1994-05-04', 4, 8, 18, '8', NULL, '$2y$10$y.flTwS.PbB0JOARW4lcsuCpWKut.7KX4FWQPTEUvsII4uCFnIoJy', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(93, 'Ahmad Yehiya Ayyash Mubaarok', 'ahmadyehiya@gmail.com', '0687', 'ahmad.y', 'Laki-Laki', '2021-06-18', '1999-04-22', 4, 8, 18, '8', NULL, '$2y$10$ZYlg6AjaqNMjDZG.puXReesMqmZcd6alFxhShgqlJDTTMBWpcGHa2', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(94, 'Muhammad Zhafar Lutfiansyah', 'zhafar@gmail.com', '0688', 'muhamad.z', 'Laki-Laki', '2021-06-24', '2002-07-14', 4, 8, 18, '8', NULL, '$2y$10$FAjz/L70jHcTZymSGj1uG.KkPEZS0khYncZgbTzZmFblQAx5Reb8S', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(95, 'Rafki Muhaindra Kurniawan', 'rafki@gmail.com', '0689', 'rafki.m', 'Laki-Laki', '2021-06-24', '2003-08-01', 4, 8, 18, '8', NULL, '$2y$10$C6cLB0tklRmvKA/VIzN3ueV4qGOyfLIuSu.Xgxwe4siRJEG38ytf6', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(96, 'Budiansyah', 'budiansyah@gmail.com', '0692', 'budiany.s', 'Laki-Laki', '2021-06-28', '2003-03-25', 4, 8, 18, '8', NULL, '$2y$10$/Wr9H.LW2a68UilHlf14LOlBKB9YjQr4lM/jWb0SA325pm1ZLVCqK', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(97, 'Nurul Yasin', 'nurul@gmail.com', '0693', 'nurul.y', 'Laki-Laki', '2021-07-01', '1995-08-04', 4, 8, 18, '8', NULL, '$2y$10$KlJOkDL5tQhXJpETqo5mk.FR.KPe353cOv36IJ.BBPt5GD0gHZ5C2', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(98, 'Muhammad Syahri', 'syahri@gmail.com', '0698', 'muhamad.s', 'Laki-Laki', '2021-07-01', '1996-01-19', 4, 8, 18, '8', NULL, '$2y$10$LHz2FhAn0vhvyqmNwjp5G.5IwjWMsgeU9pFtiWdDLHCrCc2NrKZKS', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(99, 'Riki', 'riki@gmail.com', '0699', 'riki', 'Laki-Laki', '2021-07-01', '1994-05-14', 4, 8, 19, '8', NULL, '$2y$10$CAot5STybqrvhHrNZHKMiO6Hpj4XVZGObTp1f6H8jyP5/ezkWm2C6', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(100, 'Rahmat Agus Wahyudi', 'rahmat@gmail.com', '0701', 'rahmat.a', 'Laki-Laki', '2021-07-01', '1993-08-29', 4, 8, 19, '8', NULL, '$2y$10$Gxo0FbQnJnIz9yCT.N.m0eJwgXMnJcsAYmLF9vZw.WPMkc66jth/C', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(101, 'Sumiyati', 'sumiyati@gmail.com', '0704', 'sumiyati', 'Perempuan', '2021-07-02', '1997-04-20', 4, 8, 19, '8', NULL, '$2y$10$4Pl2tEXNgHtYJe0yF0LqhO7RTUHMUFLhMRsACh0ifcerD/4h7ztS2', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(102, 'Oo Sunarto', 'sunarto@gmail.com', '0705', 'sunarto', 'Laki-Laki', '2021-07-02', '1996-11-17', 4, 8, 19, '8', NULL, '$2y$10$DgDXOFzk1TXmNgeoB4Yf5ezLJ5WufHr3yO2NwWkiUu2TB733h3z/2', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(103, 'Agus Triwibowo', 'agustri@gmail.com', '0222', 'agus.t', 'Laki-Laki', '1995-01-03', '1970-08-01', 4, 8, 22, '8', NULL, '$2y$10$r5p5L.7qSlNFllW6FG9QCukZCTfd3wwyKtVx1w1kb.zFONsi/9txO', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(104, 'Umu Toharoh', 'umu@gmail.com', '0022', 'umu.t', 'Perempuan', '2012-12-01', '1989-04-13', 4, 8, 22, '8', NULL, '$2y$10$v7i1ktxHSmuY8tUgMrsol.cVUXqsj0.t8.Wd4YtvE4RsnUoz/KJkO', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(105, 'Muhamad Hilman', 'hilman@gmail.com', '0031', 'muhamad.h', 'Laki-Laki', '2012-12-01', '1990-11-03', 4, 8, 22, '8', NULL, '$2y$10$kYNlyrN0Egj7Row/7xmrv.nURj0nC9HKS9h4Hij0bSiAXvJLCnyzC', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(106, 'Afrianti', 'afrianti@gmail.com', '0033', 'afrianti', 'Perempuan', '2012-12-01', '1992-04-09', 4, 8, 22, '8', NULL, '$2y$10$.U1eXlWbaEwT.Vt5KsYoa.D4LpY78p803Tw9d9eu1mrdwnBI/1eMq', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(107, 'Mardiansyah', 'mardi@gmail.com', '0037', 'mardi.f', 'Laki-Laki', '2012-12-01', '1988-05-11', 4, 8, 22, '8', NULL, '$2y$10$sbtB1umTH6J.poqibqNuzuXe6ECRhp.qRPZP38MoBstdtmewxZ.HS', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(108, 'Ratno Febriyanto', 'ratno@gmail.com', '0041', 'ratno.f', 'Laki-Laki', '2013-02-01', '1990-06-21', 4, 8, 22, '8', NULL, '$2y$10$r6mdIKX0YRL7Hpi2fDk5z.bP1WYCv0wGFyCDRNTzzAGT/dIOHnz5a', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(109, 'Ari Agus Setyanto', 'ari@gmail.com', '0055', 'ari.a', 'Laki-Laki', '2013-09-02', '1985-04-28', 4, 8, 22, '8', NULL, '$2y$10$B5H3rO/KISlS2y2Fm4u9NudDMbyNI9szPQyA8aWytEaxf6p/5uG..', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(110, 'Taopik Subhan', 'taopik@gmail.com', '0301', 'taopik.s', 'Laki-Laki', '2017-10-19', '1991-03-24', 4, 8, 22, '8', NULL, '$2y$10$PNa7NBkFeZtaWxU.ocjUy.uPqQxLyi/rm5AjUdX0E6lOAFl9vW29y', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(111, 'Gigih Prayoga', 'gigih@gmail.com', '0616', 'gigih.p', 'Laki-Laki', '2021-01-06', '2000-10-25', 4, 8, 22, '8', NULL, '$2y$10$rT1/P3nqUY./Lpi1hAEzOOIhqEIo2kEgPNrxv7kDuCG1qDinByGGO', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(112, 'Miftahul Farid', 'miftahul@gmail.com', '0618', 'miftahul.f', 'Laki-Laki', '2021-01-11', '2001-05-11', 4, 8, 22, '8', NULL, '$2y$10$YTGYztHg0qyNemt8UTW8Zu19Eeszj04Bwd7B49HcIDF9qRFdXZOBm', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(113, 'Iik Ighfirli', 'iik@gmail.com', '0619', 'iik.i', 'Laki-Laki', '2021-01-11', '2002-06-09', 4, 8, 22, '8', NULL, '$2y$10$whMVRYWNT4pi80AgyoAH7O0YfM0clorwovjXe.qygskeXx8ZdExbG', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(114, 'Sarnah', 'sarnah@gmail.com', '0623', 'sarnah', 'Perempuan', '2021-01-18', '1998-07-28', 4, 8, 22, '8', NULL, '$2y$10$lAXQe6OuhYUT9o5XAGDideS3vJD2/fYP/ep8MFQ/VDlB8kW/0Ob36', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(115, 'Sahrul Muafid', 'sahrul@gmail.com', '0624', 'sahrul.m', 'Laki-Laki', '2021-01-18', '1997-04-17', 4, 8, 22, '8', NULL, '$2y$10$JjVtf8O0BCQNjvjpGWyHleRaPiUZm/aD3k/FVorBMjwHovkoyzDCy', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(116, 'Gatot Purnomo', 'gatot@gmail.com', '0626', 'gatot.p', 'Laki-Laki', '2021-01-25', '1996-06-05', 4, 8, 22, '8', NULL, '$2y$10$FjpCM9p6w62wfn/xGKC5YOHvbYjj4FiedRsPRaFuGL/FmZFNZdFwe', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(117, 'Amir Mahmud', 'amir@gmail.com', '0629', 'amir.m', 'Laki-Laki', '2021-02-09', '2002-09-04', 4, 8, 22, '8', NULL, '$2y$10$dBSMHe40COQL3a7x190ZRuE/Sk8.vSgPIZLNxbCP5rToJOJyPSVtO', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(118, 'Rafianas Zuhroh', 'rafianas@gmail.com', '0632', 'rafianas.z', 'Laki-Laki', '2021-02-22', '2002-07-25', 4, 8, 22, '8', NULL, '$2y$10$GCcpfY6FcUMNvHzrvuWDkef17nxvK.0B5uizK5X9aF4hmOz6gvyGG', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(119, 'Dian Arifianto', 'dian@gmail.com', '0636', 'dian.a', 'Laki-Laki', '2021-02-24', '2002-06-24', 4, 8, 22, '8', NULL, '$2y$10$txCdVTOQSAMwDuUSqyT5WeElkvcgBRdTUlVVDpA13lYBB9majBMv6', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(120, 'Akmal Adi Yoga', 'akmal@gmail.com', '0637', 'akmal.a', 'Laki-Laki', '2021-02-24', '2001-05-19', 4, 8, 22, '8', NULL, '$2y$10$VghBFSVOApgCUKVwo.2ACejQfczrL0do3/qIvaggTMv5Gd8NsOadK', 0, NULL, '2024-11-03 19:13:49', '2024-11-03 19:13:49', NULL),
(121, 'Aditya Ardy Ferdian', 'aditya@gmail.com', '0642', 'aditya.a', 'Laki-Laki', '2021-03-03', '2002-02-21', 4, 8, 22, '8', NULL, '$2y$10$ZZa8XxSfO25kpLdGHpGwR.ACW8f1Zpm15NTHiy0jJcDP6HF5WWiH.', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(122, 'Muhammad Fahmi Alimmudin', 'fahmi@gmail.com', '0643', 'muhamad.f', 'Laki-Laki', '2021-03-03', '2002-05-14', 4, 8, 22, '8', NULL, '$2y$10$OFKEnaOIiYwg9wrXQ48MxuBWrbkbNO30qV6PdnFeNGwrxpOmoq5Z6', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(123, 'Allesio Oktavaldo Casamayor Fibianto', 'allesio@gmail.com', '0645', 'allesio.o', 'Laki-Laki', '2021-03-10', '2001-10-25', 4, 8, 22, '8', NULL, '$2y$10$mMs.Z/3djQ4JXVCXtW2Phus6GTgOeKyFHr5PeIx8FtMw/A6TbkQKO', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(124, 'Toriq Hadad', 'toriq@gmail.com', '0648', 'toriq.h', 'Laki-Laki', '2021-03-15', '2001-10-27', 4, 8, 22, '8', NULL, '$2y$10$kizl6EZ03GfPJ8Y5sYKBhu4uqziDEt7Mu3/hP0JtbNL6QyPKpHH8S', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(125, 'Cucu Fatimah', 'cucu@gmail.com', '0649', 'cucu.f', 'Perempuan', '2021-03-15', '1998-08-14', 4, 8, 22, '8', NULL, '$2y$10$cbHiAr6VO2E6OyyXDObNeO54HT8SGpqKOm.8OmekDvWXf1lf8EzUO', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(126, 'Iis Sumiati', 'iis@gmail.com', '0650', 'iis.s', 'Perempuan', '2021-03-15', '2000-11-01', 4, 8, 22, '8', NULL, '$2y$10$TF.ba6pkb7Y8uMRatbt6N.OpWNdXMYiRCZNrylBsQcjCyQ86mjxh.', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(127, 'Riski Irvan Nudin', 'riski@gmail.com', '0652', 'riski.i', 'Laki-Laki', '2021-03-16', '2002-01-10', 4, 8, 22, '8', NULL, '$2y$10$iNkoaeB6ddrAiFgNBEa3luMGT1e1Y9acBefVVrkuke1A5LCAVUExq', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(128, 'Mochamad Alief Fikri Nugroho', 'alief@gmail.com', '0653', 'mochamad.a', 'Laki-Laki', '2021-03-16', '2002-11-22', 4, 8, 22, '8', NULL, '$2y$10$0MFQS1.hEQJVvUADqbAJGOtAaCziPzNMUdaeuP9Jb3YQW8wMWj3QG', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(129, 'Muhammad Faishal Rahman', 'faishal@gmail.com', '0656', 'faishal.r', 'Laki-Laki', '2021-03-16', '2002-01-17', 4, 8, 22, '8', NULL, '$2y$10$jlHQtZ.6jMNgx0SeQf/LyuKAn0P6i26ESYONUOaLhdLcmHbqbDN62', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(130, 'Yoga Muhammad Fauzan', 'yoga@gmail.com', '0657', 'yoga.m', 'Laki-Laki', '2021-03-16', '2002-02-25', 4, 8, 22, '8', NULL, '$2y$10$.jGBu7lfJXr8VgPmjSmnieXTRB.Xh.V1m5MlRJ8SO9ifH40zvoXxq', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(131, 'Rudianto', 'rudianto@gmail.com', '0659', 'rudianto', 'Laki-Laki', '2021-03-16', '2002-02-03', 4, 8, 22, '8', NULL, '$2y$10$4EP1SqGo8MT41l785Eo2KeQ5IwmHPgSlieuNuegc9xh3MTXIM1A0S', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(132, 'Rifai Tri Safriyanto', 'rifai@gmail.com', '0661', 'rifai.t', 'Laki-Laki', '2021-03-16', '2002-05-09', 4, 8, 22, '8', NULL, '$2y$10$5.79K0uu.REybs8wagK5GeRDGeG7ItE3x0EOal/ITIE8/cvR0sdDe', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(133, 'Paramita Rahayu Ningtyas', 'paramita@gmail.com', '0662', 'paramita.r', 'Perempuan', '2021-03-23', '2002-04-01', 4, 8, 22, '8', NULL, '$2y$10$QHeA5KQDWnSK8d8thkasxeYr0yN2axzKsvZWbISKdzQ.gmNd06LtK', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(134, 'Bayu Tosin Pratama', 'bayu@gmail.com', '0666', 'bayu.t', 'Laki-Laki', '2021-04-22', '2001-01-18', 4, 8, 22, '8', NULL, '$2y$10$iT9f7MibTh8RcOgQY5EKZOVVmjMT0OE1qflVROOPrzQEibMNeGfje', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(135, 'Rizky Firdaus', 'rizkyfirdaus@gmail.com', '0672', 'rizky.f', 'Laki-Laki', '2021-06-10', '2002-09-02', 4, 8, 22, '8', NULL, '$2y$10$vZn9UOmn0N.xd7SVh3L1aeoeiH5X0e2dCsTaKSy5I0Kmbqqh64LBG', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(136, 'M Subehan Sidik', 'subehan@gmail.com', '0673', 'm.subehan', 'Laki-Laki', '2021-06-11', '2003-02-04', 4, 8, 22, '8', NULL, '$2y$10$ts5FHgPtgxwp2Uy3kfznMes2qmW77R8av1YsfWW3vSe5izxrNqDs.', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(137, 'Enang Burhanudin', 'enang@gmail.com', '0707', 'enang.b', 'Laki-Laki', '2021-07-02', '1993-07-26', 4, 8, 19, '8', NULL, '$2y$10$UspQ/5wjPSSF8T94xcJAwOWYcUU9VqQe1LfwQkGOqtTG7oxEYamRG', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(138, 'Eka Ariyono', 'eka@gmail.com', '0708', 'eka.a', 'Laki-Laki', '2021-07-02', '1995-01-18', 4, 8, 19, '8', NULL, '$2y$10$1E3wJaBZVSxu44r.ZXHnauZ7ovxur4xQQLBy/QxpqLBw.QaBzONYe', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(139, 'Rian Nursiddiq', 'rian@gmail.com', '0709', 'rian.n', 'Laki-Laki', '2021-06-28', '1993-11-18', 4, 8, 19, '8', NULL, '$2y$10$7pynMcr69z93GiayYR.Wk.L8JKUoHtkBz1BTe.nt/N8l3/QKFRv62', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(140, 'Sunandar', 'sunandar@gmail.com', '0710', 'sunandar', 'Laki-Laki', '2021-06-28', '1994-05-19', 4, 8, 19, '8', NULL, '$2y$10$Oy10WW6PHwg23fSK.iG8D.of7xT75ADnX514XAg2bA2VqNGYkC1By', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(141, 'Jeni Hendriatna Sulistian', 'jeni@gmail.com', '0711', 'jeni.h', 'Laki-Laki', '2021-06-28', '1992-01-27', 4, 8, 19, '8', NULL, '$2y$10$dXiZJEF76RwCR1Goih1ijelJetZ6TjIZU5luxCdH6lxMfLmF7rcY6', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(142, 'Reni Afriani', 'reni@gmail.com', '0712', 'reni.a', 'Perempuan', '2021-06-28', '1995-04-14', 4, 8, 19, '8', NULL, '$2y$10$KHqWyfkywQjwceYdkYX2e.qq1E/nNCtV7A2apzbTUkd.fuHN.VjSi', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(143, 'Siti Rehania', 'siti@gmail.com', '0713', 'siti.r', 'Perempuan', '2021-06-28', '1997-11-20', 4, 8, 19, '8', NULL, '$2y$10$8JIJNucTgjqY4w4.yQD2jOVU3f/roXqdJs5bFhRfixHCphoS07cYa', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(144, 'Agustian', 'agustian@gmail.com', '0715', 'agustian', 'Laki-Laki', '2021-06-28', '1996-08-11', 4, 8, 19, '8', NULL, '$2y$10$BZAsVi0vck1siiOET/oZIOvNSsDuJI3VxWXJnA6hg9bs2hbAi5P4u', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(145, 'Ndoko Dwi Saputro', 'ndoko@gmail.com', '0716', 'ndoko.d', 'Laki-Laki', '2021-06-28', '1991-02-08', 4, 8, 19, '8', NULL, '$2y$10$3T/u3xY5G.ncM2/hbKTj.OBsS/tzVCxt5pd5/RJ.uWLW.ADxWkeca', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(146, 'Aji Surya Pratama', 'aji@gmail.com', '0717', 'aji.s', 'Laki-Laki', '2021-06-28', '1996-12-12', 4, 8, 19, '8', NULL, '$2y$10$tV0.l6QiH.1QPg5DMBBcke5Tj1LqaNAvKOlhxUdYL1P7SBOzPAJz.', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(147, 'Adang Mulyana', 'adang@gmail.com', '0718', 'adang.m', 'Laki-Laki', '2021-06-28', '1993-11-21', 4, 8, 19, '8', NULL, '$2y$10$0DH7Xyx1BS/2IrNn/R5flOg5MN/.2K5woBwyZQghV83lt0ElYmZzO', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(148, 'Afifudin Azizatullah', 'afifudin@gmail.com', '0719', 'afifudin.a', 'Laki-Laki', '2021-07-05', '1994-12-23', 4, 8, 19, '8', NULL, '$2y$10$pQAZ14AwxqSa6Zk5ioXxUOI.zpyIs9mh8zMJ6mFPFb78vlTPtN8z2', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(149, 'Rafif Jun Iswantoro', 'rafif@gmail.com', '0724', 'rafif.j', 'Laki-Laki', '2021-07-06', '2002-06-19', 4, 8, 19, '8', NULL, '$2y$10$qQqXeb3NkBzHjHu/pwc/o.afn2ghRef76VHBliv3x7OpSbYxetiwq', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(150, 'Yusti Nurhamidah', 'yusti@gmail.com', '0727', 'yusti.n', 'Perempuan', '2021-07-06', '2002-01-02', 4, 8, 19, '8', NULL, '$2y$10$uyOJ0Ni.ACNm07frQLMu5e4M/dFYO1cO2fx61iDVmRBXzZ2fhjaqK', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(151, 'Suprapto', 'suprapto@gmail.com', '0728', 'suprapto', 'Laki-Laki', '2021-07-06', '2002-02-21', 4, 8, 19, '8', NULL, '$2y$10$3dBpCmu2BzpCh48fnxC4meeploKAWw0Oco2bzKWS72O1CcuUd0gkC', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(152, 'Tomy Reza Perdana', 'tomy@gmail.com', '0730', 'tomy.r', 'Laki-Laki', '2021-07-06', '2001-03-22', 4, 8, 19, '8', NULL, '$2y$10$9IfzMXz1uZVCSGNGjs9XaOyNWo4uvsMjOGaOPhLnNOcvyH5HrCMFO', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(153, 'Nur Hidayat', 'nurhidayat@gmail.com', '0732', 'nur.h', 'Laki-Laki', '2021-09-20', '2003-04-22', 4, 8, 19, '8', NULL, '$2y$10$AmetgAnnnX1mVrE0F1M26epRFpsrZXtznLraKtP8f/IQXjbsMl1zS', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(154, 'Tony Ferdiansyah', 'tony@gmail.com', '0733', 'tony.f', 'Laki-Laki', '2021-09-20', '2003-05-18', 4, 8, 19, '8', NULL, '$2y$10$Rp4oFDslwumyAmJauh5Y9OGv08ZwXgMDCXj2OJ3mTu0LlXJAAUZjG', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(155, 'Ristya Damayanti', 'ristya@gmail.com', '0735', 'ristya.d', 'Perempuan', '2021-09-20', '2003-02-24', 4, 8, 19, '8', NULL, '$2y$10$TvURZ56FJZ5vM0ZJ90mhKuh8nPnMBtMB8QXOF7FYI2Ra4/8cyJt/u', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(156, 'Nazar Tiono', 'nazar@gmail.com', '0737', 'nazar.t', 'Laki-Laki', '2021-09-27', '1995-07-12', 4, 8, 19, '8', NULL, '$2y$10$0Kbp/ksMSbFt1Qp4Yf9.C.dFUBavYMM0dXDfCUJHVnteFpmUhMp.i', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(157, 'M. Miftah Yusron', 'miftah@gmail.com', '0738', 'm.m', 'Laki-Laki', '2021-09-29', '2003-01-25', 4, 8, 19, '8', NULL, '$2y$10$QT.YMa42F/GIZpy6oZtoFOmHDw3ts3GmiCV0BjcBn6hahBeCOA2zS', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(158, 'Ridho Sulistyo', 'ridho@gmail.com', '0739', 'ridho.s', 'Laki-Laki', '2021-09-29', '2003-03-27', 4, NULL, NULL, NULL, NULL, '$2y$10$WJRaMA3BfTpUAZeU5hlUqOmWTBsfJlWrgyd0xpmgY36vblIlUQica', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(159, 'Irfan Apriyadi', 'irfan@gmail.com', '0744', 'irfan.a', 'Laki-Laki', '2021-10-13', '2002-04-06', 4, NULL, NULL, NULL, NULL, '$2y$10$Qnw4auFnhyPOy9SRup3yUuiRNixkFEm9Yszzz0BN0vugf1xZxpMfK', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(160, 'Zulva Aisya Khariska', 'zulva@gmail.com', '0746', 'zulva.a', 'Perempuan', '2021-10-13', '2002-11-23', 4, NULL, NULL, NULL, NULL, '$2y$10$yl4AXRG712OkYyU/.XVb/en2MMPIC.uLgWuk6ak4YTuwC3402PSH6', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(161, 'Renanda Reizia Fahira', 'renanda@gmail.com', '0747', 'renanda.r', 'Perempuan', '2021-10-13', '2002-12-13', 4, NULL, NULL, NULL, NULL, '$2y$10$4VJezrKIC/Cc0poZO72PoOJEFb/iSkSdJKPwX3vfQO4i4FUGW9MYi', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(162, 'Suhendra', 'suhendra@gmail.com', '0750', 'suhendra', 'Laki-Laki', '2021-10-26', '1997-08-15', 4, NULL, NULL, NULL, NULL, '$2y$10$DONLhZV8A8BC5rDG9wqsg.EsZI.2D5OE7wWp5TdbQynyWKZkt4KvW', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(163, 'Nafri Irfangi', 'nafri@gmail.com', '0751', 'nafri.i', 'Laki-Laki', '2021-10-27', '1995-12-15', 4, NULL, NULL, NULL, NULL, '$2y$10$IMlM0gXOE.ts93QwWyN2SuAOPZ8j3bS38wDXw0bg77IuCvaSn.4yW', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(164, 'Ade Yana Juni Priatna', 'adeyana@gmail.com', '0753', 'ade.y', 'Laki-Laki', '2021-11-01', '1995-06-04', 4, NULL, NULL, NULL, NULL, '$2y$10$gxy3moihWIJp78KDPVUtTeameFpBV27lvlfZASxzB9.VPcKWcX9vm', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(165, 'Mohammad Abdul Basir', 'abdul@gmail.com', '0754', 'mohammad.a', 'Laki-Laki', '2021-11-01', '1994-01-10', 4, NULL, NULL, NULL, NULL, '$2y$10$jB1JOU4WX5mPaH3Cm3rnWOaWudhgtu2RZgABSJ7kh4uBhNCTQveB6', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(166, 'Dika Indra Widiarsa', 'dika@gmail.com', '0755', 'dika.i', 'Laki-Laki', '2021-11-01', '1994-02-21', 4, NULL, NULL, NULL, NULL, '$2y$10$ECF7dxFqWMBp7jaOjRgsku6z75tzHieJv3yw8XXE9tQNDJcjamOee', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(167, 'Ratih Puspa Sari', 'ratih@gmail.com', '0756', 'ratih.p', 'Perempuan', '2021-11-05', '2003-02-27', 4, NULL, NULL, NULL, NULL, '$2y$10$heVCAgIUbJVh7tjcEX0vJu69mD/zJOgqHMRtTVh7EJSR4gt7EfYVS', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(168, 'Casimita Wijaya', 'casmita@gmail.com', '0758', 'casmita.w', 'Laki-Laki', '2021-11-09', '1998-07-28', 4, NULL, NULL, NULL, NULL, '$2y$10$SFuRq8JY/IBX1IIm5OBM9.cmXQPBJu//xl3riiQd6G7LdN.RBqxcy', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(169, 'Dede Komar', 'dede@gmail.com', '0759', 'dede.k', 'Laki-Laki', '2021-11-09', '1998-01-02', 4, NULL, NULL, NULL, NULL, '$2y$10$8uitTIou66chgdaXDYFeGeeTEHPb9lK/3qxJwaWAchfIXEWaMP0Ie', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(170, 'M. Atabiq', 'atabiq@gmail.com', '0760', 'atabiq', 'Laki-Laki', '2021-11-11', '1998-03-23', 4, NULL, NULL, NULL, NULL, '$2y$10$VsdpHz3.9Mw9Bv4hBxvL0.t.3SsTD4SaWL1LxNYqcVM.jAP26CRHW', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(171, 'Adhi Prasetyo', 'adhi@gmail.com', '0761', 'adhi.p', 'Laki-Laki', '2021-11-12', '1995-11-27', 4, NULL, NULL, NULL, NULL, '$2y$10$kV8OEPVUTN.75cIZddXwu.Ih6aSbux9LrSQM099KENTdhVP6vevX.', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(172, 'Ikmallunuha', 'ikmallunuha@gmail.com', '0762', 'ikmallunuha', 'Laki-Laki', '2021-11-17', '2003-05-17', 4, NULL, NULL, NULL, NULL, '$2y$10$9LXRaVkwnTdKNlLj4gzoYOgsLCgv2pCba0TC6N9aTCnilDe5zvTEK', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(173, 'Trio Adiyanto', 'trio@gmail.com', '0763', 'trio.a', 'Laki-Laki', '2021-11-17', '2003-08-07', 4, NULL, NULL, NULL, NULL, '$2y$10$PfLT5jfHum9MX8KdCnJKE./wn40Oky8uts/gw2DQE6RzcMTi3K8.q', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(174, 'Anjar Suganda', 'anjar@gmail.com', '0764', 'anjar.s', 'Laki-Laki', '2021-11-17', '1996-03-08', 4, NULL, NULL, NULL, NULL, '$2y$10$xvoDBjFFwPiHUWIHIsg1ve0zQPPHj17eLWKwrXvYwLAQVVfBNi8gS', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(175, 'Ali Romadiyanto', 'ali@gmail.com', '0765', 'ali.r', 'Laki-Laki', '2021-11-22', '1997-01-10', 4, NULL, NULL, NULL, NULL, '$2y$10$DHIoKeEIS8/ko/z.4.zhvumeAq4L7l.4aWl3iIB4.IVtD/gZ7THdW', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(176, 'Hari Anggoro', 'hari@gmail.com', '0766', 'hari.a', 'Laki-Laki', '2021-11-22', '1998-08-19', 4, NULL, NULL, NULL, NULL, '$2y$10$ue3e.Crk/CstC6JVSbd/b.OcDPRZnfDoFhlc/ONFPGnPzEPAdvmeW', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(177, 'Kasmuri', 'kasmuri@gmail.com', '0769', 'kasmuri', 'Laki-Laki', '2021-11-23', '1996-08-11', 4, NULL, NULL, NULL, NULL, '$2y$10$9Fgj8IoHPg2lDnYxI9uzkeW2kuQ4Vl.SYm7vJVr9HZtEAcgFGl2HW', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(178, 'Angga Adiansyah', 'angga@gmail.com', '0770', 'angga.a', 'Laki-Laki', '2021-11-26', '2003-04-15', 4, NULL, NULL, NULL, NULL, '$2y$10$YAkHeQn/fqqC/c6v.kuHo.cWvBTwPGAtqQ4LSlZiBjgi.RPgnkHju', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(179, 'Mulyadi', 'mulyadi@gmail.com', '0771', 'mulyadi', 'Laki-Laki', '2021-11-26', '2003-07-02', 4, NULL, NULL, NULL, NULL, '$2y$10$mY.1xfpAdObckl7WrIVKleA7xLNxiFW5fcXWXyB7qBau2.xpnhtMa', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(180, 'M. Erick Fahmilansyah', 'erick@gmail.com', '0772', 'erick.f', 'Laki-Laki', '2021-11-26', '2003-06-02', 4, NULL, NULL, NULL, NULL, '$2y$10$emIoUv4AnGYYvMVvGABHW.XpOXQZ9nSFEZ2bwn6ZNSHiKLF6vBf2G', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(181, 'Abdul Faqih', 'abdulfaqih@gmail.com', '0775', 'abdul.f', 'Laki-Laki', '2021-11-29', '1999-03-09', 4, NULL, NULL, NULL, NULL, '$2y$10$97Mxt9arABlHqK0nzHN15ufA7Rva0uDRikcUo0l0Mwsh4aRZT2hy6', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(182, 'Hery Kurniawan', 'hery@gmail.com', '0776', 'hery.k', 'Laki-Laki', '2021-11-30', '1996-08-21', 4, NULL, NULL, NULL, NULL, '$2y$10$Ng27rc7pUej0qwh3umIKhe87EF8qf7Z6YBPT8nHWutwrXM8kb3klW', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(183, 'Oktafiana Mukti', 'oktafiana@gmail.com', '0777', 'oktafiana.m', 'Perempuan', '2021-12-06', '2003-10-03', 4, NULL, NULL, NULL, NULL, '$2y$10$HZE17qBN28Pc5bu.Z1W4fegmU8eymNMdCQTCZOTMSAvEePcMDmMTe', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(184, 'Supriyadi Prasetya', 'supri@gmail.com', '0778', 'supri.p', 'Laki-Laki', '2021-12-08', '1997-03-04', 4, NULL, NULL, NULL, NULL, '$2y$10$l1paeD2C1hs6bApvlUhlBOqjASyYXGi/nYIxS/6XiXFgfTdHXEZS6', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(185, 'Syifa Salsabila', 'syifa@gmail.com', '0780', 'syifa.s', 'Perempuan', '2021-12-24', '2001-06-25', 4, NULL, NULL, NULL, NULL, '$2y$10$.sGrlK2yhiNvLCIOsoVhTubm4.SWPAtUFaU8EhiJZeWL6ND86toMK', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(186, 'Faisal Rizky Nugraha', 'faisal@gmail.com', '0785', 'faisal.r', 'Laki-Laki', '2021-12-28', '2002-04-26', 4, NULL, NULL, NULL, NULL, '$2y$10$AY4IgdrONUzjGgpMyk5jUOw0mAaiT9qmEVzWO8tXJ.Z1At8X8Apba', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(187, 'Yoffi Sopiandi', 'yoffi@gmail.com', '0786', 'yoffi.s', 'Laki-Laki', '2021-12-28', '1995-10-11', 4, NULL, NULL, NULL, NULL, '$2y$10$62ZplxjCJdhI6JSwenwmneUPQQZpy6ck5bDFyCjZ3YyYyWEEeTzb6', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(188, 'Saryono Catur Saputro', 'saryono@gmail.com', '0788', 'saryono.c', 'Laki-Laki', '2021-12-28', '1998-10-03', 4, NULL, NULL, NULL, NULL, '$2y$10$8rtreAxVVDzAcOA6H39QQuIKScEZT6Ov3uTqtlt2gGtUrEiRu6JcG', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(189, 'Emin Andrian', 'emin@gmail.com', '0790', 'emin.a', 'Laki-Laki', '2021-12-28', '1997-05-08', 4, NULL, NULL, NULL, NULL, '$2y$10$5cMCEt3KpqGRc8gj70Rq1u.fi1PZdlweUxZNlv.xED0AkgM056BVO', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(190, 'Ressa Ripaldi Hidayat', 'ressa@gmail.com', '0791', 'ressa.r', 'Laki-Laki', '2021-12-28', '1994-04-16', 4, NULL, NULL, NULL, NULL, '$2y$10$ZboF2IyUHbAPA5rjrK60cOToLJ/vKBtzvv/Q0OBb7AGJm5zG6AIAy', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(191, 'Illa Fatmawati', 'illa@gmail.com', '0792', 'illa.f', 'Perempuan', '2021-12-29', '2000-06-26', 4, NULL, NULL, NULL, NULL, '$2y$10$8OHxmTaw5mcLVW7v2lGBBuLT.B3rVkGqEhAmQZ4kYIQsdG3d85Xs.', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(192, 'Hermansyah', 'herman@gmail.com', '0805', 'hermansyah', 'Laki-Laki', '2022-03-07', '2001-07-29', 4, NULL, NULL, NULL, NULL, '$2y$10$UpKSag6rm2P.iXYbxHngVOZNxYm0bAK486OswgVJHSCH.MO8//rRG', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(193, 'Ibnu Azis Wicaksono', 'ibnuazis@gmail.com', '0806', 'ibnu.a', 'Laki-Laki', '2022-03-07', '2003-02-11', 4, NULL, NULL, NULL, NULL, '$2y$10$4d99i3Ygl/VKYwVeoaMOU.QCY46eymGn1.5FXy.xFwPywvgjTc1Vu', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(194, 'Lutfiah', 'lutfiah@gmail.com', '0816', 'lutfiah', 'Perempuan', '2022-09-01', '2003-05-05', 4, NULL, NULL, NULL, NULL, '$2y$10$6JZV3m2cWC6e5JGznto6ie04I0raYsPYajd2qbXPg/KxIPCDcrjSe', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(195, 'Mohamad Ridwan Fauzi', 'ridwanfauzi@gmail.com', '0817', 'mohamad.r', 'Laki-Laki', '2022-09-01', '1998-03-17', 4, NULL, NULL, NULL, NULL, '$2y$10$Eetugi7R4OWoKuKy8PCbJeoeAJHeOCa2.lmtzZ/gE92L8.6OppVcC', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(196, 'Yogi Tahrozi', 'yogi@gmail.com', '0818', 'yogi.t', 'Laki-Laki', '2022-09-01', '1998-09-23', 4, NULL, NULL, NULL, NULL, '$2y$10$Gf2ZBwmVwPjrJd7wrnmtE.DbiawyIPrvLw1EqvLHJlwdKQbDf7Itu', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(197, 'Asim', 'asim@gmail.com', '0819', 'asim', 'Laki-Laki', '2022-09-01', '1995-05-30', 4, NULL, NULL, NULL, NULL, '$2y$10$8c7O0avtx7CvsZ9GLPClJuy1wkjf6OvLp4FTICrxNGN0HIUDSSgzu', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(198, 'Gugun Firmansyah', 'gugun@gmail.com', '0820', 'gugun.f', 'Laki-Laki', '2022-09-01', '1999-07-25', 4, NULL, NULL, NULL, NULL, '$2y$10$veySR3q9hJ3EH7q55C3Oxet5MBFjEdCQTIm7nYJfHTXqoATMc1lj6', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL);
INSERT INTO `users` (`id`, `name`, `email`, `npk`, `username`, `gender`, `tgl_masuk`, `tgl_lahir`, `dept_id`, `position_id`, `detail_dept_id`, `golongan`, `email_verified_at`, `password`, `is_logged_in`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(199, 'Bagas Hari Wicaksono', 'bagas@gmail.com', '0821', 'bagas.h', 'Laki-Laki', '2022-09-01', '2003-03-20', 4, NULL, NULL, NULL, NULL, '$2y$10$qqnLfSs.fuiduapnCjKpveR/3UpCI739EFXG6ALcflCc.n2R5jAVy', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(200, 'Reza Indriyanto', 'rezaindriyanto@gmail.com', '0832', 'reza.i', 'Laki-Laki', '2023-09-01', '2001-09-27', 4, NULL, NULL, NULL, NULL, '$2y$10$iKe57pAmGFXzHZ28taIRgeSANii.bRXdRPrXDgJDw.NUxfVt7oRi.', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(201, 'Widya Sukma Utami', 'widya@gmail.com', '0841', 'widya.s', 'Perempuan', '2024-07-01', '2000-06-10', 4, NULL, NULL, NULL, NULL, '$2y$10$fTg6.Oz4tMQpa.GAMblQYuuQk2SqE.4b5FGBJO06U7k7/JKg2Tsi2', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(202, 'Mohammad Miftakhul Roza Fazri', 'miftakhul@gmail.com', '0725', 'mohammad.m', 'Laki-Laki', '2021-07-06', '2002-09-04', 4, NULL, NULL, NULL, NULL, '$2y$10$qMWGMa4jwC16353VdT/XReebGDHPFHiM8wHFRm9uWK0aPsTlZvKtG', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(203, 'Doni Dwi Apriyanto', 'doni@gmail.com', '0310', 'doni.d', 'Laki-Laki', '2017-11-28', '1993-04-11', NULL, NULL, NULL, NULL, NULL, '$2y$10$aKYzZumsHXHNbO3uwfipAedC4UpKqG/A1HLxYUYYxzHmxcD4r/p.m', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(204, 'Guntur Hermawan', 'guntur@gmail.com', '0157', 'guntur.h', 'Laki-Laki', '2015-06-03', '1992-06-23', NULL, NULL, NULL, NULL, NULL, '$2y$10$7LZVzY/RmQVWmxmFBxn56OhwMK5o060FD0DWEQ9vhKODzq3G7WJ5a', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(205, 'Eri Hermawan', 'eri@gmail.com', '0183', 'eri.h', 'Laki-Laki', '2015-10-19', '1990-03-29', 14, 8, 35, '8', NULL, '$2y$10$LoAHky9LAl0c5U2.Jml/JOGN4DooOj3ZpgEJ7FSitgLlrSepbjF8K', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(206, 'Naufal Galang Prakoso', 'naufal@gmail.com', '0112', 'naufal.g', 'Laki-Laki', '2014-12-04', '1993-11-03', 14, 8, 32, '8', NULL, '$2y$10$eCbwvl6yRf7huuyV8q6Vuui.mrQSyFBwwY2NmEYRIuUx71LRVpI1y', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(207, 'Andri Dwi Yatmoko', 'andri@gmail.com', '0084', 'andri.d', 'Laki-Laki', '2014-08-15', '1994-02-25', 14, 8, 29, '8', NULL, '$2y$10$cSCVSQbtjUYYG.7VOLxez.SM2.DexMswzdy5FC2wz6EM1wbZ1RMAW', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(208, 'Imam Joko Susilo', 'imamjoko@gmail.com', '0091', 'imam.j', 'Laki-Laki', '2014-10-06', '1993-09-21', 14, 8, 30, '8', NULL, '$2y$10$V9PD9Z93XHHbnlDu1jppAehd669FfrmLnvL7hIOKlYp47mZjnLj.G', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(209, 'Arief Rachman', 'arief@gmail.com', '0028', 'arief.r', 'Laki-Laki', '2012-12-01', '1992-06-30', 14, 8, 36, '8', NULL, '$2y$10$BawsNh8LNdXUsQDYTBhjK.4psdtaXD2AM9a9b0.qr0SHMJMueGiem', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(210, 'I Made Wahyu Karma Yoga', 'imade@gmail.com', '0030', 'made.w', 'Laki-Laki', '2012-12-01', '1992-04-21', 14, 8, 33, '8', NULL, '$2y$10$74QANLx1LjP7A2SO4OeqOeWavHPO1uzM0z8QvuuTWFWq5/MQzJgTG', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(211, 'Irfina Febianti', 'irfina@gmail.com', '0060', 'irfina.f', 'Perempuan', '2013-05-01', '1990-02-26', NULL, NULL, NULL, NULL, NULL, '$2y$10$h8/NcBaP5aC7.zNL2ZQVG.hf/An5D6bbkN8pfERUii1krJitzGgRa', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(212, 'Dinar Permana', 'dinar@gmail.com', '0842', 'dinar.p', 'Laki-Laki', '2024-07-01', '1999-09-29', NULL, NULL, NULL, NULL, NULL, '$2y$10$Kh73Hr015Owej85kL0os2eUKGWXWpgw4/vup0HyjoN/PYm7DnDVTe', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(213, 'Adhitiya', 'adhitiya@gmail.com', '0678', 'adhitiya', 'Laki-Laki', '2021-06-18', '2002-05-03', 15, 8, 42, '8', NULL, '$2y$10$qzfqYz./RrdZi5vPqvpMjOf441fmzUrRj6KtmcKyNpKlUosDrfYa6', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(214, 'Mochamad Surya Ali Imron', 'mochamad@gmail.com', '0679', 'mochamad.s', 'Laki-Laki', '2021-06-18', '2002-01-11', 15, 8, 42, '8', NULL, '$2y$10$GR9WMtN//cv/GzTk4AbkmOHWzHWjDmzgwq82RwiK9K39aaQTR3KTO', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(215, 'Alif Budi Prakoso', 'alif@gmail.com', '0683', 'alif.b', 'Laki-Laki', '2021-06-18', '2002-12-30', 15, 8, 42, '8', NULL, '$2y$10$ZssgWwOwufYvRETZYOv9lO3xc65ybqk2lJKYjxXc1p7SG/QN/aL.m', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(216, 'Endra Nur Haryanto', 'endra@gmail.com', '0691', 'endra.n', 'Laki-Laki', '2021-06-28', '2003-04-09', 15, 8, 42, '8', NULL, '$2y$10$3W4bB3T05kJLxYPl7esTGehqFLBsQcYR4T.pXprkhhqveVGSsUmu2', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(217, 'Reza Aldian Fauzi', 'reza@gmail.com', '0695', 'reza.a', 'Laki-Laki', '2021-07-01', '1998-06-20', 15, 8, 42, '8', NULL, '$2y$10$BnjGPKqQ0KnbR32MsEbYNepbcxc7qLA1I/tEln2WMq6WEdjpofZUi', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(218, 'Teguh Triono', 'teguhtriono@gmail.com', '0702', 'teguh.t', 'Laki-Laki', '2021-07-01', '1993-10-01', 15, 8, 39, '8', NULL, '$2y$10$oczjl.x1u0nGbGdgC20IRuI/eOKGoYdmadwlVLB/IfhSrglzeheju', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(219, 'Agus', 'agus@gmail.com', '0706', 'agus', 'Laki-Laki', '2021-07-02', '1994-08-13', 15, 8, 39, '8', NULL, '$2y$10$AcWK/TUZTWkGDRPBO.1lkuzTg6GZkch3qq0QgGaJ6JLAptG0BdG6S', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(220, 'Muhajirin', 'muhajirin@gmail.com', '0714', 'muhajirin', 'Laki-Laki', '2021-06-28', '1994-04-20', 15, 8, 39, '8', NULL, '$2y$10$KpIAz17xQ2EJe7YGJPs45.DXZK6j4KHYefNGlaBbLGOJTmY8Wdhce', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(221, 'Hendri Setyo Budi', 'hendri@gmail.com', '0721', 'hendri.s', 'Laki-Laki', '2021-07-05', '1995-06-19', 15, 8, 39, '8', NULL, '$2y$10$YevZLKV2M1LjJy05xAoIIeZKYxHKEtRCCxuKiqGyF84qV3xVUXkaO', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(222, 'Ilham Sururi', 'ilhamsururi@gmail.com', '0723', 'ilham.s', 'Laki-Laki', '2021-07-06', '2003-04-05', 15, 8, 39, '8', NULL, '$2y$10$ZgadZQwZ6awnN8fXNJwqvum/MfVLtRpjGfTXXEemfKizzB/6ldmQy', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(223, 'Doris Maulana Pakpahan', 'doris@gmail.com', '0745', 'doris.m', 'Laki-Laki', '2021-10-13', '2002-01-24', 15, 8, 39, '8', NULL, '$2y$10$XYdR4VFVOj.36.Qu8ghU9uTpI/6kOsUS8RcI495uQLh7AXo4wVhvS', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(224, 'Rio Raharjo', 'rio@gmail.com', '0748', 'rio.r', 'Laki-Laki', '2021-10-13', '2002-11-18', 15, 8, 39, '8', NULL, '$2y$10$GfkoQttI/AKUGZoSlUdTreWmTM/UIfSM8XCIkdaybRfjv.xnLJJtC', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(225, 'Sarip Hidayat', 'sarip@gmail.com', '0803', 'sarip.h', 'Laki-Laki', '2022-03-07', '1998-12-02', 15, 8, 39, '8', NULL, '$2y$10$nChgtSjBRBDadpr3FDehaeVHEXlvLQwqIuJrj.it.FdUCv0ru/VhG', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(226, 'Alvin Hendrianto', 'alvin@gmail.com', '0804', 'alvin.h', 'Laki-Laki', '2022-03-07', '2003-01-02', 15, 8, 39, '8', NULL, '$2y$10$IczcwXIkuFM9CSl.T.xY3OLumqvI/S5.gJ523X6Obg/BTRXBbxS7S', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(227, 'Zaenul Fatah', 'zaenul@gmail.com', '0768', 'zaenul.f', 'Laki-Laki', '2021-11-23', '1996-07-12', 15, 8, 39, '8', NULL, '$2y$10$bJId0ma3sGuwUGYA0nKUuehH2oBQ.O8xLCLtNYqF2OjQozuRmpbHm', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(228, 'Yogi Saputra', 'yogisaputra@gmail.com', '0793', 'yogi.s', 'Laki-Laki', '2022-01-03', '1995-05-19', 15, 8, 39, '8', NULL, '$2y$10$HdmpV7mO0pMMp/5viyYaT.oUO9ko.fftNopBRRtX1Vmmfv5a34jhi', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(229, 'Tomi Suhada', 'tomi@gmail.com', '0794', 'tomi.s', 'Laki-Laki', '2022-01-03', '2001-09-22', 15, 8, 39, '8', NULL, '$2y$10$hWzEaroAv25H.RoIebP.6uWSOFUk0E7VGVs0m2nNtb0Us6b31eYAu', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(230, 'Muhammad Nasai', 'nasai@gmail.com', '0796', 'muhammad.n', 'Laki-Laki', '2022-01-11', '1995-02-08', 15, 8, 39, '8', NULL, '$2y$10$TX0CVJUZXkGLbb5iPJBn7.4yW28woBMAz1961Mpkg1muK0VpZT/NO', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(231, 'Kurniawan Sandy', 'kurniawan@gmail.com', '0779', 'kurniawan.s', 'Laki-Laki', '2021-12-20', '1996-04-02', 15, 8, 39, '8', NULL, '$2y$10$1khQ2qsdBqsfLDiYeaIT/O0GrNwsVZ1o1M17ZtmPTJCbXPZW7qbxS', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(232, 'Septy Andriani', 'septy@gmail.com', '0045', 'septy.a', 'Laki-Laki', '2013-05-07', '1992-09-22', 15, 8, 39, '8', NULL, '$2y$10$dD5AX/cBblNGF2xJuPR1gOa9gy.0t/ven9D3GyxnSRuZoDMVOeaqm', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(233, 'Novrianto', 'novrianto@gmail.com', '0081', 'novrianto', 'Laki-Laki', '2014-07-10', '1987-11-02', 15, 8, 39, '8', NULL, '$2y$10$FITPF4NYo4Egsym/79vId./K7wa3R1h0kn7Ba9.G6ZnK17ewRyS4W', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(234, 'Juju Juhana', 'juju@gmail.com', '0144', 'juju.j', 'Laki-Laki', '2015-02-24', '1992-01-04', 15, 8, 39, '8', NULL, '$2y$10$/0KtJo0Vs5Il0mCCvAqg/uZWWYW/F04Y9RsAB/bfVbnhe4SDpZ5KK', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(235, 'Sumarsono', 'sumarsono@gmail.com', '0147', 'sumarsono', 'Laki-Laki', '2015-03-09', '1990-06-21', 15, 8, 39, '8', NULL, '$2y$10$Ksz9mnZJ3aVs7KyLHVjwLOYY94n8Vy08R9FHvMhyy3JP9NQvrt9R2', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(236, 'Jangkung Antoko', 'jangkung@gmail.com', '0244', 'jangkung.a', 'Laki-Laki', '2016-12-06', '1996-01-06', 15, 8, 39, '8', NULL, '$2y$10$7zPMhEFYCXB15zrGdDaOOeH7iyayY3Qrb.kmqfzsSefSzivcEfc8S', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(237, 'Adji Pratama', 'adji@gmail.com', '0246', 'adji.p', 'Laki-Laki', '2016-12-19', '1996-01-06', 15, 8, 39, '8', NULL, '$2y$10$0KaLyCTNNPgzQ4gleAPHeenSipnELoD8kZERvyRTBtHorFX2hks0.', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(238, 'M. Andika', 'm@gmail.com', '0617', 'm.andika', 'Laki-Laki', '2021-01-06', '1999-08-07', 15, 8, 41, '8', NULL, '$2y$10$1G8ZMPsnaUII0uG2JKZ1GOmRazcazM.QLZRU0qwvRGNcSHHKa7xUe', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(239, 'Syahrul Ramadhan', 'syahrul@gmail.com', '0621', 'syahrul', 'Laki-Laki', '2021-01-13', '1999-01-05', 15, 8, 41, '8', NULL, '$2y$10$GuDDF97B7aUbfMptCmX6vu02LpGNnI4Ce825nRboLki2zgcZlxtSm', 0, NULL, '2024-11-03 19:13:50', '2024-11-03 19:13:50', NULL),
(240, 'Endriawan Apriyanto', 'endriawan@gmail.com', '0646', 'endriawan.a', 'Laki-Laki', '2021-03-10', '2001-04-09', 15, 8, 42, '8', NULL, '$2y$10$YHDxbR4QpILliro88U53huQA4yCCkiBELghmc57U.NesHQ2HT4Qry', 0, NULL, '2024-11-03 19:13:51', '2024-11-03 19:13:51', NULL),
(241, 'Syahrul Ramdani', 'syahrulramdani@gmail.com', '0651', 'syahrul.r', 'Laki-Laki', '2021-03-15', '1998-01-29', 15, 8, 42, '8', NULL, '$2y$10$hx.dT9/P.7r2caohDvHdMehTAq6/5Z4gbHxINVXrMskycmBlFl7zG', 0, NULL, '2024-11-03 19:13:51', '2024-11-03 19:13:51', NULL),
(242, 'Indra Pujianto', 'indra@gmail.com', '0654', 'indra.p', 'Laki-Laki', '2021-03-16', '2001-06-20', 15, 8, 42, '8', NULL, '$2y$10$Wki49EhwWmWbXkosn5J5ouZ7VR5snFmz8erbFtvwP3XLEMwpvfkw6', 0, NULL, '2024-11-03 19:13:51', '2024-11-03 19:13:51', NULL),
(243, 'mahsun', 'mahsun@gmail.com', '1232', 'mahsun.b', 'laki-laki', '2024-10-09', '2004-10-09', 15, 5, 40, '3', NULL, '$2y$10$jJxb7OUMSqa.O4jtOGHcXuesAAXTl/bEBFSRkXU7fELeuXvWcN1kG', 0, NULL, '2024-11-03 20:02:18', '2024-11-03 20:02:18', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_departements`
--
ALTER TABLE `detail_departements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sub_websites`
--
ALTER TABLE `sub_websites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_npk_unique` (`npk`),
  ADD KEY `users_dept_id_foreign` (`dept_id`),
  ADD KEY `users_position_id_foreign` (`position_id`),
  ADD KEY `users_detail_dept_id_foreign` (`detail_dept_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `detail_departements`
--
ALTER TABLE `detail_departements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sub_websites`
--
ALTER TABLE `sub_websites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=244;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_dept_id_foreign` FOREIGN KEY (`dept_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_detail_dept_id_foreign` FOREIGN KEY (`detail_dept_id`) REFERENCES `detail_departements` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_position_id_foreign` FOREIGN KEY (`position_id`) REFERENCES `positions` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
