-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2021 at 09:09 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dossier`
--
CREATE DATABASE IF NOT EXISTS `dossier` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `dossier`;

-- --------------------------------------------------------

--
-- Table structure for table `academic_records`
--

CREATE TABLE `academic_records` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `file_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_id` int(11) NOT NULL,
  `do_id` int(11) DEFAULT NULL,
  `phase` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phase3_type` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `term` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doc_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doc_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `joto_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `academic_records`
--

INSERT INTO `academic_records` (`id`, `file_name`, `file_type`, `file_path`, `file_size`, `p_id`, `do_id`, `phase`, `phase3_type`, `term`, `doc_name`, `doc_type`, `created_at`, `updated_at`, `joto_id`) VALUES
(1, '5ed8493a34453uniformpic2019-10-21at5.21.46PM.jpeg', 'jpeg', 'http://localhost/dossier/attachments/academic_record/5ed8493a34453uniformpic2019-10-21at5.21.46PM.jpeg', '66.802 kb', 1, 3, 'Phase 1', NULL, 'Term I', 'result', 'Result', '2020-06-03 20:07:06', '2020-06-03 20:07:06', NULL),
(2, '5ed849581fc76BIO-DATAFORM.docx', 'docx', 'http://localhost/dossier/attachments/academic_record/5ed849581fc76BIO-DATAFORM.docx', '17.545 kb', 1, 3, 'Phase 1', NULL, 'Term II', 'result', 'Result', '2020-06-03 20:07:36', '2020-06-03 20:07:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `branch_allocations`
--

CREATE TABLE `branch_allocations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `p_id` int(11) NOT NULL,
  `option1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option3` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_recommended` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_allocated` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `do_id` int(11) DEFAULT NULL,
  `phase` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `joto_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branch_allocations`
--

INSERT INTO `branch_allocations` (`id`, `p_id`, `option1`, `option2`, `option3`, `branch_recommended`, `branch_allocated`, `do_id`, `phase`, `created_at`, `updated_at`, `joto_id`) VALUES
(1, 1, 'OPS', 'WE', 'LOG', 'OPS', 'OPS', 3, 'Phase 1', '2020-06-03 20:25:43', '2020-06-03 20:25:43', NULL),
(2, 2, 'LOG', 'LOG', 'LOG', 'LOG', 'LOG', 4, 'Phase 1', '2020-06-04 00:34:53', '2020-06-04 00:34:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cadets_autobiographies`
--

CREATE TABLE `cadets_autobiographies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `file_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_id` int(11) NOT NULL,
  `do_id` int(11) NOT NULL,
  `phase` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `joto_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cadets_autobiographies`
--

INSERT INTO `cadets_autobiographies` (`id`, `file_name`, `file_type`, `file_path`, `file_size`, `p_id`, `do_id`, `phase`, `created_at`, `updated_at`, `joto_id`) VALUES
(1, '5ed8458edfa09BIO-DATAFORM.docx', 'docx', 'http://localhost/dossier/attachments/cadets_autobiography/5ed8458edfa09BIO-DATAFORM.docx', '17.545 kb', 1, 3, 'Phase 1', '2020-06-03 19:51:26', '2020-06-03 19:51:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `captain_trainings`
--

CREATE TABLE `captain_trainings` (
  `captain_training_id` int(11) NOT NULL,
  `captain_training_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `captain_training_rank` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `navy_unit_id` int(191) NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `captain_trainings`
--

INSERT INTO `captain_trainings` (`captain_training_id`, `captain_training_name`, `captain_training_rank`, `p_no`, `navy_unit_id`, `email`, `username`, `password`, `account_status`, `created_at`, `updated_at`) VALUES
(1, 'captainrahbar', 'Captain', '1234', 1, 'captainrahbar@gmail.com', 'ctrahbar', '2ce6400b8383af3b1b46173b968f6596', 'Approved', '2020-12-15 09:04:52', '2020-12-15 09:04:52'),
(2, 'ctjauhar', 'Captain', '1897', 3, 'ctjauhar@gmail.com', 'ctjauhar', 'd883afd17e8a67c7c6d01a5506a72234', 'Approved', '2020-12-15 09:28:39', '2020-12-15 09:28:39'),
(3, 'ctbahadur', 'Captain', '1111', 2, 'ctbahadur@gmail.com', 'ctbahadur', '503ff161b30f6dd2e864bc193cbf1e40', 'Approved', '2020-12-15 09:30:26', '2020-12-15 09:30:26');

-- --------------------------------------------------------

--
-- Table structure for table `captain_training_dossiers`
--

CREATE TABLE `captain_training_dossiers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `captain_training_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `phase1_remarks` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phase2_remarks` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phase3_pnec_remarks` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phase3_remarks` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `joto_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `captain_training_dossiers`
--

INSERT INTO `captain_training_dossiers` (`id`, `captain_training_id`, `p_id`, `phase1_remarks`, `phase2_remarks`, `phase3_pnec_remarks`, `phase3_remarks`, `created_at`, `updated_at`, `joto_id`) VALUES
(12, 1, 33, 'good', NULL, NULL, NULL, '2020-12-15 09:56:46', '2020-12-15 09:57:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `commanding_officers`
--

CREATE TABLE `commanding_officers` (
  `co_id` int(11) NOT NULL,
  `co_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `co_rank` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `navy_unit_id` int(191) DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `exo_id` int(11) DEFAULT NULL,
  `ship_name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `commanding_officers`
--

INSERT INTO `commanding_officers` (`co_id`, `co_name`, `co_rank`, `p_no`, `navy_unit_id`, `email`, `username`, `password`, `account_status`, `created_at`, `updated_at`, `exo_id`, `ship_name`) VALUES
(1, 'corahabar', 'Commodore', '123', 1, 'corahabar@gmail.com', 'rahbar', 'ea5371666d5c0d8f5aaaf5961da0d1f7', 'Approved', '2020-12-15 09:03:36', '2020-12-18 08:02:09', NULL, NULL),
(2, 'coshamsheer', 'Captain', '34343434343', NULL, 'coshamsheer@gmail.com', 'coshamsheer', 'f0a41df118ef9c4e503bde22cb852e40', 'Approved', '2020-12-15 09:25:34', '2020-12-15 09:25:34', NULL, 'shamsheer'),
(3, 'cojauhar', 'Commodore', '1279', 3, 'cojauhar@gmail.com', 'cojauhar', '1eb577e9cfa838f6ad648d6b0880122d', 'Approved', '2020-12-15 09:27:59', '2020-12-15 09:27:59', NULL, NULL),
(4, 'cobahadur', 'Commodore', '1998', 2, 'cobahadur@gmail.com', 'cobahadur', 'd23471ac3fd9e960f1ce1c7d179a6a4c', 'Approved', '2020-12-15 09:29:53', '2020-12-15 09:29:53', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `commanding_officer_dossiers`
--

CREATE TABLE `commanding_officer_dossiers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `commanding_officer_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `phase1_remarks` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phase2_remarks` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phase3_pnec_remarks` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phase3_remarks` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `joto_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `commanding_officer_dossiers`
--

INSERT INTO `commanding_officer_dossiers` (`id`, `commanding_officer_id`, `p_id`, `phase1_remarks`, `phase2_remarks`, `phase3_pnec_remarks`, `phase3_remarks`, `created_at`, `updated_at`, `joto_id`) VALUES
(1, 1, 1, NULL, NULL, NULL, NULL, '2020-06-04 05:03:55', '2020-06-04 05:03:55', NULL),
(2, 1, 4, 'Observed and checked.', 'Observed and checked.', 'Observed and checked.', NULL, '2020-06-14 06:12:33', '2020-06-14 01:12:33', NULL),
(3, 1, 6, NULL, NULL, NULL, NULL, '2020-06-14 01:28:58', '2020-06-14 01:28:58', NULL),
(4, 1, 7, NULL, NULL, NULL, NULL, '2020-06-15 00:42:55', '2020-06-15 00:42:55', NULL),
(5, 1, 8, NULL, NULL, NULL, NULL, '2020-06-15 00:43:28', '2020-06-15 00:43:28', NULL),
(6, 1, 9, NULL, NULL, NULL, NULL, '2020-06-15 00:43:54', '2020-06-15 00:43:54', NULL),
(7, 1, 10, NULL, NULL, NULL, NULL, '2020-06-16 22:15:57', '2020-06-16 22:15:57', NULL),
(8, 1, 13, NULL, NULL, NULL, NULL, '2020-10-08 12:30:57', '2020-10-08 12:30:57', NULL),
(9, 5, 3, NULL, NULL, NULL, NULL, '2020-12-12 08:29:00', '2020-12-12 08:29:00', NULL),
(10, 2, 6, NULL, NULL, NULL, NULL, '2020-12-14 06:48:04', '2020-12-14 06:48:04', NULL),
(13, 6, 20, NULL, NULL, NULL, NULL, '2020-12-14 07:32:43', '2020-12-14 07:32:43', NULL),
(14, 1, 33, 'good', NULL, NULL, NULL, '2020-12-15 15:01:59', '2020-12-15 10:01:59', NULL),
(15, 4, 33, NULL, NULL, NULL, NULL, '2020-12-15 10:15:32', '2020-12-15 10:15:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `degree_certificates`
--

CREATE TABLE `degree_certificates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `p_id` int(11) NOT NULL,
  `officer_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `degree` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cgpa` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `division` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phase` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phase3_type` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `do_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `joto_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `degree_certificates`
--

INSERT INTO `degree_certificates` (`id`, `p_id`, `officer_name`, `p_no`, `degree`, `year`, `cgpa`, `division`, `phase`, `phase3_type`, `do_id`, `created_at`, `updated_at`, `joto_id`) VALUES
(1, 1, 'shahzad ali', '10302', 'BS MIS', '2020', '3.30', '1st', 'Phase 3', 'pnec', 3, '2020-06-06 09:15:22', '2020-06-06 09:15:22', NULL),
(2, 4, 'Kashif', '10302', 'BS MIS', '2020', '3.30', 'First', 'Phase 3', 'pnec', 1, '2020-06-14 01:03:38', '2020-06-14 01:03:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `distinctions_records`
--

CREATE TABLE `distinctions_records` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `p_id` int(11) NOT NULL,
  `academic` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sports` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extra_curricular_activities` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phase` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phase3_type` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `do_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `joto_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `distinctions_records`
--

INSERT INTO `distinctions_records` (`id`, `p_id`, `academic`, `sports`, `extra_curricular_activities`, `phase`, `phase3_type`, `do_id`, `created_at`, `updated_at`, `joto_id`) VALUES
(1, 1, 'nill;', 'footbal', 'quiz competition', 'Phase 1', NULL, 3, '2020-06-03 20:22:50', '2020-06-03 20:22:50', NULL),
(2, 1, 'nil', 'compak hockey tournament', 'nil', 'Phase 2', NULL, 3, '2020-06-03 20:45:29', '2020-06-03 20:45:29', NULL),
(3, 1, 'nil', 'nil', 'hockey participation', 'Phase 2', NULL, 3, '2020-06-06 08:02:18', '2020-06-06 08:02:18', NULL),
(4, 1, 'nill', 'footbal', 'litrary society head', 'Phase 3', 'pnec', 3, '2020-06-06 09:10:37', '2020-06-06 09:10:37', NULL),
(5, 4, 'CJSCC MEDAL', 'nil', 'nil', 'Phase 1', NULL, 1, '2020-06-14 00:15:54', '2020-06-14 00:15:54', NULL),
(6, 4, 'nil', 'nil', 'nil', 'Phase 2', NULL, 1, '2020-06-14 00:31:33', '2020-06-14 00:31:33', NULL),
(7, 4, 'nil', 'nil', 'nil', 'Phase 3', 'pnec', 1, '2020-06-14 01:00:57', '2020-06-14 01:00:57', NULL),
(8, 10, 'adsfd', 'sdfasd', 'asdf', 'Phase 2', NULL, NULL, '2020-12-02 13:35:17', '2020-12-02 13:35:17', 1),
(9, 10, 'adsfd', 'sdfasd', 'asdf', 'Phase 2', NULL, NULL, '2020-12-02 13:35:17', '2020-12-02 13:35:17', 1),
(10, 33, 'good', 'hockey', 'speech', 'Phase 1', NULL, 1, '2020-12-15 09:51:01', '2020-12-15 09:51:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `do_accounts`
--

CREATE TABLE `do_accounts` (
  `do_id` int(11) NOT NULL,
  `do_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `do_rank` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `navy_unit_id` int(191) NOT NULL,
  `profile_pic` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sqc_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sqc_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `divison_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `do_accounts`
--

INSERT INTO `do_accounts` (`do_id`, `do_name`, `do_rank`, `p_no`, `navy_unit_id`, `profile_pic`, `email`, `username`, `password`, `account_status`, `created_at`, `updated_at`, `sqc_name`, `sqc_id`, `divison_name`) VALUES
(1, 'raiz', 'Lieutenant commander', '23451', 1, '5fd8c39c150aeWhatsAppImage2020-12-14at2.59.29PM.jpeg', 'hamza@gmail.com', 'hamza', '8950259507cd8ce2a99f8b94674f2b77', 'Approved', '2020-12-15 09:09:32', '2020-12-15 09:09:32', NULL, NULL, 'hamza'),
(2, 'ali', 'Lieutenant commander', '56788', 1, '5fd8c3da19238WhatsAppImage2020-12-14at2.59.29PM.jpeg', 'saif@gmail.com', 'saif', '44c099ff522cd529ade21a9c7aa54ebf', 'Approved', '2020-12-15 09:10:34', '2020-12-15 09:10:34', NULL, NULL, 'saif'),
(3, 'iqbal', 'Lieutenant', '4465767698', 3, '5fd8c4fa17cdcWhatsAppImage2020-12-14at2.59.29PM.jpeg', 'iqbal@gmail.com', 'iqbal', 'eedae20fc3c7a6e9c5b1102098771c70', 'Approved', '2020-12-15 09:15:22', '2020-12-15 09:15:22', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `do_records`
--

CREATE TABLE `do_records` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `p_id` int(11) NOT NULL,
  `rank_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `period_from` date DEFAULT NULL,
  `period_to` date DEFAULT NULL,
  `phase` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `do_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `joto_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `do_records`
--

INSERT INTO `do_records` (`id`, `p_id`, `rank_name`, `period_from`, `period_to`, `phase`, `do_id`, `created_at`, `updated_at`, `joto_id`) VALUES
(3, 4, 'lt cdr ali', '2020-01-13', '2020-06-13', 'Phase 1', '1', '2020-06-12 23:21:55', '2020-06-12 23:21:55', NULL),
(4, 4, 'lt cdr asad', '2020-06-29', '2020-07-08', 'Phase 2', '1', '2020-06-14 00:18:19', '2020-06-14 00:18:19', NULL),
(8, 1, 'Lieutenant commander', NULL, NULL, 'Phase 1', '6', '2020-12-09 09:37:55', '2020-12-09 09:37:55', NULL),
(13, 6, 'Lieutenant commander', NULL, NULL, 'Phase 3', '6', '2020-12-13 11:55:42', '2020-12-13 11:55:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `exo_dossiers`
--

CREATE TABLE `exo_dossiers` (
  `id` int(11) NOT NULL,
  `exo_id` int(11) DEFAULT NULL,
  `p_id` int(11) DEFAULT NULL,
  `phase1_remarks` varchar(191) DEFAULT NULL,
  `phase2_remarks` varchar(191) DEFAULT NULL,
  `phase3_pnec_remarks` text DEFAULT NULL,
  `phase3_remarks` varchar(191) DEFAULT NULL,
  `joto_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exo_dossiers`
--

INSERT INTO `exo_dossiers` (`id`, `exo_id`, `p_id`, `phase1_remarks`, `phase2_remarks`, `phase3_pnec_remarks`, `phase3_remarks`, `joto_id`, `created_at`, `updated_at`) VALUES
(1, 1, 10, NULL, NULL, NULL, NULL, NULL, '2020-12-05 03:24:07', '2020-12-05 03:24:07'),
(2, 1, 1, NULL, NULL, NULL, NULL, 5, '2020-12-05 12:08:20', '2020-12-05 12:08:20'),
(3, 2, 20, NULL, NULL, NULL, NULL, 1, '2020-12-14 07:27:50', '2020-12-14 07:27:50');

-- --------------------------------------------------------

--
-- Table structure for table `exo_officers`
--

CREATE TABLE `exo_officers` (
  `exo_id` int(11) NOT NULL,
  `exo_name` varchar(191) DEFAULT NULL,
  `exo_rank` varchar(191) DEFAULT NULL,
  `p_no` varchar(191) DEFAULT NULL,
  `navy_unit_id` int(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `username` varchar(191) DEFAULT NULL,
  `password` varchar(191) DEFAULT NULL,
  `account_status` varchar(191) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ship_name` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exo_officers`
--

INSERT INTO `exo_officers` (`exo_id`, `exo_name`, `exo_rank`, `p_no`, `navy_unit_id`, `email`, `username`, `password`, `account_status`, `created_at`, `updated_at`, `ship_name`) VALUES
(1, 'exoshamsheer', 'Commander', '454646412', NULL, 'exoshamsheer@gmail.com', 'exoshamsheer', 'aef5d8666fd2f2f0f14d12f3c4357bf3', 'Approved', '2020-12-15 09:26:51', '2020-12-15 09:26:51', 'shamsheer');

-- --------------------------------------------------------

--
-- Table structure for table `games_proficiencies`
--

CREATE TABLE `games_proficiencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `p_id` int(11) DEFAULT NULL,
  `term` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `game` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `proficiency` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `do_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phase` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phase3_type` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `do_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `joto_id` int(11) DEFAULT NULL,
  `oc_no` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `games_proficiencies`
--

INSERT INTO `games_proficiencies` (`id`, `p_id`, `term`, `game`, `proficiency`, `do_name`, `phase`, `phase3_type`, `do_id`, `created_at`, `updated_at`, `joto_id`, `oc_no`) VALUES
(1, 1, 'Term-I', 'foot ball', 'medal', 'LT CDR IOMRAN', 'Phase 1', NULL, 3, '2020-06-03 20:02:25', '2020-06-03 20:02:25', NULL, NULL),
(2, 1, 'Term-II', 'cricket', 'medal', 'LT CDR IMRAN', 'Phase 1', NULL, 3, '2020-06-03 20:02:49', '2020-06-03 20:02:49', NULL, NULL),
(3, 1, 'Term-III', 'foot ball', 'medal', 'LT CDR IMRAN', 'Phase 1', NULL, 3, '2020-06-03 20:03:09', '2020-06-03 20:03:09', NULL, NULL),
(4, 1, '4', 'cricket', 'medal', 'LT CDR IOMRAN', 'Phase 2', NULL, 3, '2020-06-06 07:42:16', '2020-06-06 07:42:16', NULL, NULL),
(5, 4, 'Term-I', 'foot ball', 'medal', 'LT CDR IMRAN', 'Phase 1', NULL, 1, '2020-06-13 12:23:30', '2020-06-13 12:23:30', NULL, NULL),
(6, 4, 'Term-II', 'cricket', 'medal', 'LT CDR IMRAN', 'Phase 1', NULL, 1, '2020-06-13 12:23:42', '2020-06-13 12:23:42', NULL, NULL),
(7, 4, 'Term-III', 'foot ball', 'medal', 'LT CDR IMRAN', 'Phase 1', NULL, 1, '2020-06-13 12:23:53', '2020-06-13 12:23:53', NULL, NULL),
(8, 2, 'Term_I', 'football', 'medal', 'Lt Mushtaq', 'Phase 1', NULL, 2, '2020-11-12 12:53:01', '2020-11-12 12:53:01', NULL, NULL),
(9, 10, 'VI', 'asdf', 'sdfsd', 'adsf', 'Phase 2', NULL, NULL, '2020-12-02 13:29:58', '2020-12-02 13:29:58', 1, NULL),
(10, NULL, 'Term_I', 'football', 'medal', 'Lt Mushtaq', 'Phase 1', NULL, NULL, '2020-12-03 12:15:48', '2020-12-03 12:15:48', NULL, 11),
(11, NULL, 'Term_I', 'football', 'medal', 'Lt Mushtaq', 'Phase 1', NULL, NULL, '2020-12-12 08:18:43', '2020-12-12 08:18:43', NULL, 454),
(12, NULL, 'Term_I', 'football', 'medal', 'Lt Mushtaq', 'Phase 1', NULL, NULL, '2020-12-13 07:05:45', '2020-12-13 07:05:45', NULL, 454),
(13, NULL, 'Term_I', 'football', 'medal', 'Lt Mushtaq', 'Phase 1', NULL, NULL, '2020-12-15 10:05:31', '2020-12-15 10:05:31', NULL, 12349);

-- --------------------------------------------------------

--
-- Table structure for table `general_remarks`
--

CREATE TABLE `general_remarks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `p_id` int(11) NOT NULL,
  `term` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assessment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `form_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `do_id` int(11) DEFAULT NULL,
  `phase` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phase3_type` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `joto_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `general_remarks`
--

INSERT INTO `general_remarks` (`id`, `p_id`, `term`, `assessment`, `remarks`, `form_type`, `do_id`, `phase`, `phase3_type`, `created_at`, `updated_at`, `joto_id`) VALUES
(1, 1, 'Term-I', 'Mid-term assessment', 'he is good', 'S 1-32', 3, 'Phase 1', NULL, '2020-06-03 20:18:28', '2020-06-03 20:18:28', NULL),
(2, 1, 'Term-II', 'Terminal assessment', 'he is good', 'S 1-32', 3, 'Phase 1', NULL, '2020-06-03 20:18:43', '2020-06-03 20:18:43', NULL),
(3, 1, 'Term-II', 'Mid-term assessment', 'he is good', 'S 1-32', 3, 'Phase 1', NULL, '2020-06-03 20:18:58', '2020-06-03 20:18:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `inspection_records`
--

CREATE TABLE `inspection_records` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `p_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `remarks` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `inspecting_officer_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phase` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `do_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `joto_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inspection_records`
--

INSERT INTO `inspection_records` (`id`, `p_id`, `date`, `remarks`, `inspecting_officer_name`, `phase`, `do_id`, `created_at`, `updated_at`, `joto_id`) VALUES
(1, 1, '2019-03-02', 'good', 'lt cdr umair', 'Phase 1', 3, '2020-06-03 19:38:51', '2020-06-03 19:38:51', NULL),
(2, 1, '2019-03-02', 'good', 'lt cdr umair', 'Phase 1', 3, '2020-06-03 19:38:51', '2020-06-03 19:38:51', NULL),
(3, 1, '2018-07-31', 'dressed good', 'lt ali amjad', 'Phase 2', 3, '2020-06-06 07:24:48', '2020-06-06 07:24:48', NULL),
(4, 4, '2020-06-27', 'satisfactory', 'lt cdr umair', 'Phase 1', 1, '2020-06-12 23:21:28', '2020-06-12 23:21:28', NULL),
(5, 4, '2020-06-25', 'good turnout', 'lt ali amjad', 'Phase 2', 1, '2020-06-14 00:18:06', '2020-06-14 00:18:06', NULL),
(6, 23, '2020-12-03', 'ADFASDF', 'ASDFASDF', 'Phase 2', NULL, '2020-12-02 12:39:51', '2020-12-02 12:39:51', NULL),
(7, 23, '2020-12-03', 'EEE', 'EEE', 'Phase 2', NULL, '2020-12-02 12:39:52', '2020-12-02 12:39:52', NULL),
(8, 10, '2020-12-02', 'ADFASDF', 'ASDFASDF', 'Phase 2', NULL, '2020-12-02 12:47:12', '2020-12-02 12:47:12', 1),
(9, 10, '2020-12-02', 'dfgfgfs', 'dfgfdg', 'Phase 2', NULL, '2020-12-02 12:47:13', '2020-12-02 12:47:13', 1),
(10, 3, '2020-12-12', 'ee', 'e', 'Phase 1', 9, '2020-12-12 07:30:17', '2020-12-12 07:30:17', NULL),
(11, 3, '2020-12-12', 'ee', 'e', 'Phase 1', 9, '2020-12-12 07:30:17', '2020-12-12 07:30:17', NULL),
(12, 3, '2020-12-11', 'e', 'e', 'Phase 1', 9, '2020-12-12 07:30:33', '2020-12-12 07:30:33', NULL),
(13, 17, '2020-12-14', 'ADFASDF', 'ASDFASDF', 'Phase 1', 3, '2020-12-14 04:44:55', '2020-12-14 04:44:55', NULL),
(14, 17, '2020-12-14', 'ADFASDF', 'ASDFASDF', 'Phase 1', 3, '2020-12-14 04:44:55', '2020-12-14 04:44:55', NULL),
(15, 23, '2020-12-14', 'good', 'good', 'Phase 1', 3, '2020-12-14 12:12:28', '2020-12-14 12:12:28', NULL),
(16, 23, '2020-12-14', 'good', 'good', 'Phase 1', 3, '2020-12-14 12:12:28', '2020-12-14 12:12:28', NULL),
(17, 33, '2020-12-15', 'good', 'Lt hamaz', 'Phase 1', 1, '2020-12-15 09:34:17', '2020-12-15 09:34:17', NULL),
(18, 33, '2020-12-15', 'good', 'Lt hamaz', 'Phase 1', 1, '2020-12-15 09:34:17', '2020-12-15 09:34:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `joto_accounts`
--

CREATE TABLE `joto_accounts` (
  `joto_id` int(11) NOT NULL,
  `joto_name` varchar(191) DEFAULT NULL,
  `joto_rank` varchar(191) DEFAULT NULL,
  `p_no` varchar(191) DEFAULT NULL,
  `navy_unit_id` int(191) DEFAULT NULL,
  `profile_pic` text DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `username` varchar(191) DEFAULT NULL,
  `password` varchar(191) DEFAULT NULL,
  `account_status` varchar(191) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ship_name` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `joto_accounts`
--

INSERT INTO `joto_accounts` (`joto_id`, `joto_name`, `joto_rank`, `p_no`, `navy_unit_id`, `profile_pic`, `email`, `username`, `password`, `account_status`, `created_at`, `updated_at`, `ship_name`) VALUES
(1, 'jotosham', 'Lieutenant', '4567890', NULL, '5fd8c42e4f347WhatsAppImage2020-12-14at2.59.29PM.jpeg', 'shamsheer@gmail.com', 'shamsheer', '56d463d0ae542f4e620695e7e426a985', 'Approved', '2020-12-15 09:11:58', '2020-12-15 09:11:58', 'shamsheer'),
(2, 'pnssaif', 'Lieutenant', '3456780', NULL, '5fd8c492749abWhatsAppImage2020-12-14at2.59.29PM.jpeg', 'pnssaif@gmail.com', 'pnssaif', '5445b15a2feba31275fd110e4386b200', 'Approved', '2020-12-15 09:13:38', '2020-12-15 09:13:38', 'pnssaif'),
(3, 'jauhar', 'Lieutenant', '4567913', 3, '5fd8c4cc16642WhatsAppImage2020-12-14at2.59.29PM.jpeg', 'jauhar@gmail.com', 'jauhar', 'feebc8554051e8b0069154847775ac87', 'Approved', '2020-12-15 09:14:36', '2020-12-15 09:14:36', NULL),
(4, 'glops', 'Lieutenant commander', '3456123', 2, '5fd8c53bd59f4WhatsAppImage2020-12-14at2.59.29PM.jpeg', 'glops@gmail.com', 'glops', 'ae8b6e1834136d11bacb88c9019a2416', 'Approved', '2020-12-15 09:16:27', '2020-12-15 09:16:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `joto_records`
--

CREATE TABLE `joto_records` (
  `id` bigint(20) NOT NULL,
  `p_id` int(11) DEFAULT NULL,
  `rank_name` varchar(191) DEFAULT NULL,
  `period_from` date DEFAULT NULL,
  `period_to` date DEFAULT NULL,
  `phase` varchar(191) DEFAULT NULL,
  `joto_id` varchar(191) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `joto_records`
--

INSERT INTO `joto_records` (`id`, `p_id`, `rank_name`, `period_from`, `period_to`, `phase`, `joto_id`, `created_at`, `updated_at`) VALUES
(8, 14, NULL, NULL, NULL, 'Phase 3', '2', '2020-11-30 15:48:09', '2020-11-30 15:48:09'),
(17, 6, NULL, NULL, NULL, 'Phase 3', '5', '2020-12-13 11:54:56', '2020-12-13 11:54:56'),
(26, 20, NULL, NULL, NULL, 'Phase 2', '1', '2020-12-14 06:56:14', '2020-12-14 06:56:14');

-- --------------------------------------------------------

--
-- Table structure for table `medical_records`
--

CREATE TABLE `medical_records` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `p_id` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `term` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `disease` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admitted` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mo_remarks` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `specialist_opinion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instructional_loss` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `do_remarks` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `do_id` int(11) DEFAULT NULL,
  `phase` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phase3_type` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `joto_id` int(11) DEFAULT NULL,
  `joto_remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oc_no` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medical_records`
--

INSERT INTO `medical_records` (`id`, `p_id`, `date`, `term`, `disease`, `admitted`, `mo_remarks`, `specialist_opinion`, `instructional_loss`, `do_remarks`, `do_id`, `phase`, `phase3_type`, `created_at`, `updated_at`, `joto_id`, `joto_remarks`, `oc_no`) VALUES
(1, 1, '2018-11-28 19:00:00', 'Term-I', 'nil', 'nil', 'good', 'nil', '0', 'nil', 3, 'Phase 1', NULL, '2020-06-03 20:04:12', '2020-06-03 20:04:12', NULL, NULL, NULL),
(2, 1, '2017-11-29 19:00:00', 'Term-II', 'fever', 'nil', 'good', 'nil', '03days', 'nil', 3, 'Phase 1', NULL, '2020-06-03 20:05:11', '2020-06-03 20:05:11', NULL, NULL, NULL),
(3, 1, '2018-10-29 19:00:00', 'Term-III', 'flu', 'nil', 'he is ok', 'nil', 'nil', 'nil', 3, 'Phase 1', NULL, '2020-06-03 20:06:07', '2020-06-03 20:06:07', NULL, NULL, NULL),
(4, 1, '2018-10-29 19:00:00', '4', 'parkinson', 'admitted in rahat', 'recovered', 'nil', 'nil', 'nil', 3, 'Phase 2', NULL, '2020-06-06 07:44:17', '2020-06-06 07:44:17', NULL, NULL, NULL),
(5, 4, '2020-06-23 19:00:00', 'Term-I', 'fever', 'sickbay pns rahbar', 'bed rest', 'nill', '2 days', 'satisfactory', 1, 'Phase 1', NULL, '2020-06-13 12:24:53', '2020-06-13 12:24:53', NULL, NULL, NULL),
(6, 4, '2020-06-23 19:00:00', 'Term-II', 'fever', 'sickbay pns rahbar', 'attc 2 days', 'nil', '2 days', 'improving', 1, 'Phase 1', NULL, '2020-06-13 12:25:44', '2020-06-13 12:25:44', NULL, NULL, NULL),
(7, 4, '2020-06-24 19:00:00', 'Term-III', 'fever', 'sickbay pns rahbar', 'rest 2 days', 'nill', '2 days', 'improving', 1, 'Phase 1', NULL, '2020-06-13 12:26:14', '2020-06-13 12:26:14', NULL, NULL, NULL),
(8, 4, '2020-06-23 19:00:00', '4', 'fever', 'sickbay pns rahbar', 'rest 2 days', 'nil', '2 days', 'improving', 1, 'Phase 2', NULL, '2020-06-14 00:27:06', '2020-06-14 00:27:06', NULL, NULL, NULL),
(9, 1, '2020-10-15 19:00:00', 'Term-I', 'a', 'a', 'a', 'a', 'a', 'a', 3, 'Phase 1', NULL, '2020-10-16 08:35:19', '2020-10-16 08:35:19', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `message_to` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message_subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sender_id` int(11) DEFAULT NULL,
  `reciever_id` int(11) DEFAULT NULL,
  `message_from` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `joto_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(3, '2014_10_12_000000_create_users_table', 1),
(4, '2014_10_12_100000_create_password_resets_table', 1),
(5, '2020_02_04_102508_create_do_accounts_table', 1),
(6, '2020_02_19_064752_create_nhq_logins_table', 2),
(7, '2020_02_21_053031_create_pn_form1s_table', 3),
(8, '2020_02_21_064434_create_inspection_records_table', 4),
(9, '2020_02_22_062837_create_do_records_table', 5),
(10, '2020_02_22_071144_create_personal_datas_table', 6),
(11, '2020_02_22_071209_create_personal_data_attachments_table', 6),
(12, '2020_02_24_052753_create_obiographies_table', 7),
(13, '2020_02_24_084753_create_cadets_autobiographies_table', 8),
(14, '2020_02_24_090243_create_psychologist_reports_table', 9),
(15, '2020_02_24_100431_create_observation_records_table', 10),
(16, '2020_02_24_110422_create_punishment_records_table', 11),
(17, '2020_02_24_115143_create_observation_slips_table', 12),
(18, '2020_02_25_052417_create_warning_records_table', 13),
(19, '2020_02_25_055231_create_warning_attachments_table', 14),
(20, '2020_02_26_053914_create_saluting_swimming_records_table', 15),
(21, '2020_02_26_063653_create_physical_effeciency_records_table', 16),
(22, '2020_02_26_073330_create_games_proficiencies_table', 17),
(23, '2020_02_26_085751_create_medical_records_table', 18),
(24, '2020_02_27_063608_create_officer_qualities_table', 19),
(25, '2020_02_27_084335_create_general_remarks_table', 20),
(26, '2020_02_27_085347_create_progress_charts_table', 21),
(27, '2020_02_27_095040_create_distinctions_records_table', 22),
(28, '2020_02_28_060157_create_seniority_records_table', 23),
(29, '2020_03_10_054443_create_academic_records_table', 24),
(30, '2020_03_13_053454_create_branch_allocations_table', 25),
(31, '2020_03_20_133156_create_seniority_record_phase2s_table', 26),
(32, '2020_03_20_133607_create_degree_certificates_table', 27),
(33, '2020_03_20_133752_create_seniority_record_phase2s_table', 28),
(34, '2020_03_26_100628_create_seniority_record_phase3s_table', 29),
(35, '2020_03_26_100647_create_overall_seniority_records_table', 29),
(36, '2020_03_28_125231_create_captain_trainings_table', 30),
(37, '2020_03_28_125246_create_commanding_officers_table', 30),
(38, '2020_03_28_134101_create_captain_training_dossiers_table', 31),
(39, '2020_03_28_134110_create_commanding_officer_dossiers_table', 31),
(40, '2020_04_06_124345_create_seniority_record2_phase2s_table', 32),
(41, '2020_04_07_061727_create_seniority_record_phase3_pnecs_table', 33),
(42, '2020_04_10_084013_create_messages_table', 34),
(43, '2020_04_20_113941_create_navy_units_table', 35),
(44, '2020_04_26_103248_create_progress_chart_phase3s_table', 36);

-- --------------------------------------------------------

--
-- Table structure for table `navy_units`
--

CREATE TABLE `navy_units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unit_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `navy_units`
--

INSERT INTO `navy_units` (`id`, `unit_name`, `created_at`, `updated_at`) VALUES
(1, 'PNS Rahbar', NULL, NULL),
(2, 'PNS Bahadur', NULL, NULL),
(3, 'PNS Jauhar', NULL, NULL),
(4, 'PNS Karsaz', NULL, NULL),
(5, 'PNSL', NULL, NULL),
(6, 'PN Fleet', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nhq_dossiers`
--

CREATE TABLE `nhq_dossiers` (
  `id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `do_id` int(11) DEFAULT NULL,
  `joto_id` int(11) DEFAULT NULL,
  `phase1_remarks` varchar(191) DEFAULT NULL,
  `phase2_remarks` varchar(191) DEFAULT NULL,
  `phase3_pnec_remarks` text DEFAULT NULL,
  `phase3_remarks` varchar(191) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `phase` varchar(191) DEFAULT NULL,
  `nhq_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nhq_dossiers`
--

INSERT INTO `nhq_dossiers` (`id`, `p_id`, `do_id`, `joto_id`, `phase1_remarks`, `phase2_remarks`, `phase3_pnec_remarks`, `phase3_remarks`, `created_at`, `updated_at`, `phase`, `nhq_id`) VALUES
(18, 33, NULL, 4, NULL, NULL, NULL, NULL, '2020-12-15 16:33:45', '2020-12-15 11:33:45', 'Phase 3', 2),
(19, 37, NULL, 1, NULL, NULL, NULL, NULL, '2020-12-15 16:16:25', '2020-12-15 11:16:25', 'Phase 3', 3),
(20, 37, NULL, 1, NULL, NULL, NULL, NULL, '2020-12-15 16:16:25', '2020-12-15 11:16:25', 'Phase 3', 2),
(21, 38, NULL, 4, NULL, NULL, NULL, NULL, '2020-12-15 16:33:36', '2020-12-15 11:33:36', 'Phase 3', 2),
(22, 39, NULL, 4, NULL, NULL, NULL, NULL, '2020-12-15 16:39:35', '2020-12-15 11:39:35', 'Phase 3', 2);

-- --------------------------------------------------------

--
-- Table structure for table `nhq_logins`
--

CREATE TABLE `nhq_logins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_type` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nhq_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nhq_id` int(11) DEFAULT NULL,
  `nhq_rank` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_pic` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nhq_logins`
--

INSERT INTO `nhq_logins` (`id`, `username`, `password`, `account_type`, `created_at`, `updated_at`, `nhq_name`, `nhq_id`, `nhq_rank`, `p_no`, `profile_pic`, `email`) VALUES
(2, 'cao', '18452d47d97eb0f306c59ae38087fcb0', 'COA', NULL, '2020-12-17 07:17:35', NULL, 2, NULL, NULL, NULL, NULL),
(3, 'nhq123', 'd31b3e87a57f70194e6d4bdc75b38e2e', NULL, '2020-12-15 09:31:45', '2020-12-21 11:25:36', 'nhq', 3, 'Commodore', '343535', '5fd8c8d13d85eWhatsAppImage2020-12-14at2.59.29PM.jpeg', 'nhq@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `obiographies`
--

CREATE TABLE `obiographies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `p_id` int(11) NOT NULL,
  `p_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `division` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `religion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sect` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permanent_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `identification_mark` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `height` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blood_group` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_place_birth` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `joining_date` date NOT NULL,
  `nic` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `not_held` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `previous_service` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `matric_marks` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `matric_division` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `matric_year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `matric_school` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fsc_marks` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fsc_division` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fsc_year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fsc_school` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `other_marks` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_division` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_year` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_school` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profession` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `next_of_kin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `relation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `karachi_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `karachi_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emergency_contact` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `family_background` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `education_early` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `education_high_school` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `education_college` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `unforgettable_moment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `favourite_personality` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `influence_by_whom` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `disliked_person` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `achievements` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `aim` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `good_points` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `weak_points` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phase` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `do_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `joto_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `obiographies`
--

INSERT INTO `obiographies` (`id`, `p_id`, `p_no`, `division`, `religion`, `sect`, `permanent_address`, `telephone`, `identification_mark`, `height`, `weight`, `blood_group`, `date_place_birth`, `joining_date`, `nic`, `not_held`, `previous_service`, `matric_marks`, `matric_division`, `matric_year`, `matric_school`, `fsc_marks`, `fsc_division`, `fsc_year`, `fsc_school`, `other_marks`, `other_division`, `other_year`, `other_school`, `father_name`, `profession`, `next_of_kin`, `relation`, `address`, `karachi_address`, `karachi_phone`, `emergency_contact`, `family_background`, `education_early`, `education_high_school`, `education_college`, `unforgettable_moment`, `favourite_personality`, `influence_by_whom`, `disliked_person`, `achievements`, `aim`, `good_points`, `weak_points`, `phase`, `do_id`, `created_at`, `updated_at`, `joto_id`) VALUES
(1, 1, '9750', 'c', 'islam', 'sunni', 'skardu', 'nil', 'nil', '173', '65', 'a+', '01 02 1997         skardu', '2016-01-31', '1234343 4425 4', 'nil', 'nil', '800', 'a', '2010', 's', '800', 'a', '2012', 'govt', 'nnil', 'nil', 'nil', 'nil', 'khan', 'teacher', 'father', 'father', 'skardu', 'skardu', NULL, 'nil', 'good', 'good', 'good', 'good', 'good', 'good', 'good', 'good', 'good', 'good', 'good', 'good', 'Phase 1', 3, '2020-06-03 19:49:24', '2020-06-03 19:49:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `observation_records`
--

CREATE TABLE `observation_records` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `p_id` int(11) NOT NULL,
  `term` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date NOT NULL,
  `observation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `observed_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `action_taken` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phase3_type` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `do_id` int(11) DEFAULT NULL,
  `phase` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `joto_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `observation_records`
--

INSERT INTO `observation_records` (`id`, `p_id`, `term`, `date`, `observation`, `observed_by`, `action_taken`, `phase3_type`, `do_id`, `phase`, `created_at`, `updated_at`, `joto_id`) VALUES
(1, 1, 'Term-I', '2018-12-31', 'good', 'LT IMRAN', 'APPRECIATED', NULL, 3, 'Phase 1', '2020-06-03 19:52:43', '2020-06-03 19:52:43', NULL),
(2, 1, 'Term-II', '2019-12-31', 'good', 'lt cdr  umair pn', 'green slip', NULL, 3, 'Phase 1', '2020-06-03 19:53:19', '2020-06-03 19:53:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `observation_slips`
--

CREATE TABLE `observation_slips` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `file_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_id` int(11) NOT NULL,
  `do_id` int(11) DEFAULT NULL,
  `phase` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phase3_type` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `joto_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `observation_slips`
--

INSERT INTO `observation_slips` (`id`, `file_name`, `file_type`, `file_path`, `file_size`, `p_id`, `do_id`, `phase`, `phase3_type`, `created_at`, `updated_at`, `joto_id`) VALUES
(1, '5ed8469b02524BIO-DATAFORM.docx', 'docx', 'http://localhost/dossier/attachments/observation_slips/5ed8469b02524BIO-DATAFORM.docx', '17.545 kb', 1, 3, 'Phase 1', NULL, '2020-06-03 19:55:55', '2020-06-03 19:55:55', NULL),
(2, '5edb8dad21b7bWhatsAppImage2020-06-04at08.27.48.jpeg', 'jpeg', 'http://localhost/dossier/attachments/observation_slips/5edb8dad21b7bWhatsAppImage2020-06-04at08.27.48.jpeg', '59.072 kb', 1, 3, 'Phase 1', NULL, '2020-06-06 07:35:57', '2020-06-06 07:35:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `officer_qualities`
--

CREATE TABLE `officer_qualities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `p_id` int(11) NOT NULL,
  `term` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `truthfulness_mid` int(11) NOT NULL,
  `truthfulness_terminal` int(11) DEFAULT NULL,
  `integrity_mid` int(11) NOT NULL,
  `integrity_terminal` int(11) DEFAULT NULL,
  `pride_mid` int(11) NOT NULL,
  `pride_terminal` int(11) DEFAULT NULL,
  `courage_mid` int(11) NOT NULL,
  `courage_terminal` int(11) DEFAULT NULL,
  `confidence_mid` int(11) NOT NULL,
  `confidence_terminal` int(11) DEFAULT NULL,
  `initiative_mid` int(11) NOT NULL,
  `inititative_terminal` int(11) DEFAULT NULL,
  `command_mid` int(11) NOT NULL,
  `command_terminal` int(11) DEFAULT NULL,
  `discipline_mid` int(11) NOT NULL,
  `discipline_terminal` int(11) DEFAULT NULL,
  `duty_mid` int(11) NOT NULL,
  `duty_terminal` int(11) DEFAULT NULL,
  `reliability_mid` int(11) NOT NULL,
  `reliability_terminal` int(11) DEFAULT NULL,
  `appearance_mid` int(11) NOT NULL,
  `appearance_terminal` int(11) DEFAULT NULL,
  `fitness_mid` int(11) NOT NULL,
  `fitness_terminal` int(11) DEFAULT NULL,
  `conduct_mid` int(11) NOT NULL,
  `conduct_terminal` int(11) DEFAULT NULL,
  `cs_mid` int(11) NOT NULL,
  `cs_terminal` int(11) DEFAULT NULL,
  `teamwork_mid` int(11) NOT NULL,
  `teamwork_terminal` int(11) DEFAULT NULL,
  `expression_mid` int(11) NOT NULL,
  `expression_terminal` int(11) DEFAULT NULL,
  `total_mid` int(11) NOT NULL,
  `total_terminal` int(11) DEFAULT NULL,
  `mid_marks` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `terminal_marks` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mid_marks_date` date NOT NULL,
  `terminal_marks_date` date DEFAULT NULL,
  `do_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `form_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `do_id` int(11) NOT NULL,
  `phase` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phase3_type` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `officer_qualities`
--

INSERT INTO `officer_qualities` (`id`, `p_id`, `term`, `truthfulness_mid`, `truthfulness_terminal`, `integrity_mid`, `integrity_terminal`, `pride_mid`, `pride_terminal`, `courage_mid`, `courage_terminal`, `confidence_mid`, `confidence_terminal`, `initiative_mid`, `inititative_terminal`, `command_mid`, `command_terminal`, `discipline_mid`, `discipline_terminal`, `duty_mid`, `duty_terminal`, `reliability_mid`, `reliability_terminal`, `appearance_mid`, `appearance_terminal`, `fitness_mid`, `fitness_terminal`, `conduct_mid`, `conduct_terminal`, `cs_mid`, `cs_terminal`, `teamwork_mid`, `teamwork_terminal`, `expression_mid`, `expression_terminal`, `total_mid`, `total_terminal`, `mid_marks`, `terminal_marks`, `mid_marks_date`, `terminal_marks_date`, `do_name`, `form_type`, `do_id`, `phase`, `phase3_type`, `created_at`, `updated_at`) VALUES
(1, 1, 'Term-I', 19, 18, 18, 17, 10, 10, 7, 5, 10, 6, 5, 8, 9, 9, 10, 7, 4, 7, 8, 5, 9, 9, 6, 8, 9, 8, 5, 5, 5, 8, 15, 15, 149, 145, '74.5%', '72.5%', '2018-11-29', '2015-04-03', 'lt cdr hamza pn', 'S 1-27', 3, 'Phase 1', NULL, '2020-06-03 20:12:32', '2020-06-03 20:12:32'),
(2, 1, 'Term-II', 13, 12, 14, 18, 10, 10, 5, 9, 11, 12, 10, 8, 10, 10, 10, 4, 5, 6, 5, 8, 9, 8, 8, 7, 5, 8, 10, 7, 9, 7, 8, 9, 142, 143, '71%', '71.5%', '2017-11-30', '2017-10-29', 'lt cdr hamza pn', 'S 1-28', 3, 'Phase 1', NULL, '2020-06-03 20:15:06', '2020-06-03 20:15:06');

-- --------------------------------------------------------

--
-- Table structure for table `overall_seniority_records`
--

CREATE TABLE `overall_seniority_records` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `p_id` int(11) NOT NULL,
  `phase1_seniority_gained` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phase1_seniority_lost` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phase2_seniority_gained` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phase2_seniority_lost` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phase3_seniority_gained` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phase3_seniority_lost` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phase3_seniority_professional_gained` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phase3_seniority_professional_lost` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_gained` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_lost` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `net_gained_lost` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phase` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phase3_type` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `do_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `joto_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `overall_seniority_records`
--

INSERT INTO `overall_seniority_records` (`id`, `p_id`, `phase1_seniority_gained`, `phase1_seniority_lost`, `phase2_seniority_gained`, `phase2_seniority_lost`, `phase3_seniority_gained`, `phase3_seniority_lost`, `phase3_seniority_professional_gained`, `phase3_seniority_professional_lost`, `total_gained`, `total_lost`, `net_gained_lost`, `phase`, `phase3_type`, `do_id`, `created_at`, `updated_at`, `joto_id`) VALUES
(1, 1, '30', '0', '15', '0', '2', '2', '2', '0', '49', '2', '47', NULL, NULL, 3, '2020-06-03 20:25:11', '2020-12-13 14:08:25', NULL),
(2, 4, '30', '0', '10', '0', '45', '0', NULL, NULL, '85', '0', '85', NULL, NULL, 1, '2020-06-14 00:17:15', '2020-06-14 01:02:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_datas`
--

CREATE TABLE `personal_datas` (
  `id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `p_no` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `course` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `religion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emergency_contact` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ex_army` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ex_army_from` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ex_army_to` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_occupation` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `next_of_kin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `siblings` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `near_relatives` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `identification_marks` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `height` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `navy_joining_date` date NOT NULL,
  `entry_mode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nic` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blood_group` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `karachi_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `matric_school` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `matric_division` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `matric_subjects` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `intermediate_college` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `intermediate_division` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diploma` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phase` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `do_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `joto_id` int(11) DEFAULT NULL,
  `upload_file` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_datas`
--

INSERT INTO `personal_datas` (`id`, `p_id`, `p_no`, `course`, `religion`, `emergency_contact`, `telephone_no`, `ex_army`, `ex_army_from`, `ex_army_to`, `father_name`, `father_occupation`, `next_of_kin`, `siblings`, `near_relatives`, `identification_marks`, `height`, `weight`, `navy_joining_date`, `entry_mode`, `service_id`, `nic`, `blood_group`, `address`, `karachi_address`, `matric_school`, `matric_division`, `matric_subjects`, `intermediate_college`, `intermediate_division`, `diploma`, `phase`, `do_id`, `created_at`, `updated_at`, `joto_id`) VALUES
(1, 1, '9686', '16A', 'islam', '24456', '23456', 'nil', 'nil', 'nil', 'khan', 'teacher', 'father       skardu', 'a\r\na\r\ns\r\nd', 'nil', 'nil', '173', '65', '2020-01-31', 'regular', '12455', '3234 34234 4322', 'a+', 'skardu', 'nil', 'govt school', '1st divison', 'maths physics chemistry  english', 'govt college tanduu allahyar', 'a', 'nill', 'Phase 1', 3, '2020-06-03 19:43:40', '2020-06-03 19:43:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personal_data_attachments`
--

CREATE TABLE `personal_data_attachments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `file_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_id` int(11) NOT NULL,
  `phase` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `joto_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_data_attachments`
--

INSERT INTO `personal_data_attachments` (`id`, `file_name`, `file_type`, `file_path`, `file_size`, `p_id`, `phase`, `created_at`, `updated_at`, `joto_id`) VALUES
(1, '5ed843bc23261uniformpic2019-10-21at5.21.46PM.jpeg', 'jpeg', 'http://localhost/dossier/attachments/officer_pics/5ed843bc23261uniformpic2019-10-21at5.21.46PM.jpeg', '66.802 kb', 1, 'Phase 1', '2020-06-03 19:43:40', '2020-06-03 19:43:40', NULL),
(2, '5edb8cec85ee0uniformpic2019-10-21at5.21.46PM.jpeg', 'jpeg', 'http://localhost/dossier/attachments/officer_pics/5edb8cec85ee0uniformpic2019-10-21at5.21.46PM.jpeg', '66.802 kb', 1, 'Phase 2', '2020-06-06 07:32:44', '2020-06-06 07:32:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `physical_effeciency_records`
--

CREATE TABLE `physical_effeciency_records` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `p_id` int(11) DEFAULT NULL,
  `term` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mile_time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mile_time_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rope_class` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rope_class_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `beam_work` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `beam_work_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `push_ups` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `push_ups_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sprint_time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sprint_time_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pet_score_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pet_score_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mini_cross_country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mini_cross_country_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cross_country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cross_country_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assault_course_time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `assault_course_time_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `do_id` int(11) DEFAULT NULL,
  `phase` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `joto_id` int(11) DEFAULT NULL,
  `oc_no` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `physical_effeciency_records`
--

INSERT INTO `physical_effeciency_records` (`id`, `p_id`, `term`, `mile_time`, `mile_time_status`, `rope_class`, `rope_class_status`, `beam_work`, `beam_work_status`, `push_ups`, `push_ups_status`, `sprint_time`, `sprint_time_status`, `pet_score_date`, `pet_score_status`, `mini_cross_country`, `mini_cross_country_status`, `cross_country`, `cross_country_status`, `assault_course_time`, `assault_course_time_status`, `do_id`, `phase`, `created_at`, `updated_at`, `joto_id`, `oc_no`) VALUES
(1, 1, 'Term-I', '6.18', 'Qualified', 'alpha', 'Qualified', '6', 'Qualified', '40', 'Qualified', '17', 'Qualified', '80', 'Qualified', '119', 'Qualified', '43', 'Qualified', '15 min', 'Qualified', 3, 'Phase 1', '2020-06-03 20:00:05', '2020-06-03 20:00:05', NULL, NULL),
(2, 1, 'Term-II', '6.03', 'Qualified', 'alpha', 'Qualified', '6', 'Qualified', '40', 'Qualified', '11', 'Qualified', '80', 'Qualified', '220', 'Qualified', '122', 'Qualified', '16', 'Qualified', 3, 'Phase 1', '2020-06-03 20:01:06', '2020-06-03 20:01:06', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pn_form1s`
--

CREATE TABLE `pn_form1s` (
  `p_id` bigint(20) UNSIGNED NOT NULL,
  `oc_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `issb_batch` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `do_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `unit_id` bigint(20) DEFAULT NULL,
  `joto_id` int(11) DEFAULT NULL,
  `term` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phase` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `completed` bit(1) NOT NULL DEFAULT b'0',
  `isterminated` bit(1) NOT NULL DEFAULT b'0',
  `relegate` bit(1) NOT NULL DEFAULT b'0',
  `do_nhq` int(11) DEFAULT NULL,
  `nhq_joto` int(11) DEFAULT NULL,
  `joto_nhq` int(11) DEFAULT NULL,
  `do_joto` int(11) DEFAULT NULL,
  `category` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bahadur` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `relegated_p_id` int(11) DEFAULT NULL,
  `divison_name` varchar(999) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pn_form1s`
--

INSERT INTO `pn_form1s` (`p_id`, `oc_no`, `p_no`, `name`, `class`, `issb_batch`, `do_id`, `created_at`, `updated_at`, `unit_id`, `joto_id`, `term`, `phase`, `completed`, `isterminated`, `relegate`, `do_nhq`, `nhq_joto`, `joto_nhq`, `do_joto`, `category`, `bahadur`, `relegated_p_id`, `divison_name`) VALUES
(1, '16135', '96862', 'shahzad ali', '2016A', 'NKIWs', 3, '2020-06-03 19:37:59', '2020-12-13 14:08:25', 3, 5, 'Term I', 'Phase 1', b'0', b'0', b'0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `progress_charts`
--

CREATE TABLE `progress_charts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `p_id` int(11) NOT NULL,
  `do_id` int(11) NOT NULL,
  `term1_academics` int(11) DEFAULT NULL,
  `term1_olqs` int(11) DEFAULT NULL,
  `term1_aggregate` int(11) DEFAULT NULL,
  `term2_academics` int(11) DEFAULT NULL,
  `term2_olqs` int(11) DEFAULT NULL,
  `term2_aggregate` int(11) DEFAULT NULL,
  `term3_academics` int(11) DEFAULT NULL,
  `term3_olqs` int(11) DEFAULT NULL,
  `term3_aggregate` int(11) DEFAULT NULL,
  `phase` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `joto_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


--
-- Table structure for table `semester_results`
--

CREATE TABLE `semester_results` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `p_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `gpa_t1` decimal(10,2) DEFAULT 0.00,
  `gpa_t2` decimal(10,2) DEFAULT 0.00,
  `gpa_t3` decimal(10,2) DEFAULT 0.00,
  `gpa_t4` decimal(10,2) DEFAULT 0.00,
  `gpa_t5` decimal(10,2) DEFAULT 0.00,
  `gpa_t6` decimal(10,2) DEFAULT 0.00,
  `gpa_t7` decimal(10,2) DEFAULT 0.00,
  `gpa_t8` decimal(10,2) DEFAULT 0.00,
  `cgpa` decimal(10,2) DEFAULT 0.00,
  `phase` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `progress_charts`
--

INSERT INTO `progress_charts` (`id`, `p_id`, `do_id`, `term1_academics`, `term1_olqs`, `term1_aggregate`, `term2_academics`, `term2_olqs`, `term2_aggregate`, `term3_academics`, `term3_olqs`, `term3_aggregate`, `phase`, `created_at`, `updated_at`, `joto_id`) VALUES
(1, 1, 3, 67, 81, 74, 64, 84, 77, 75, 80, 76, 'Phase 1', '2020-06-03 20:21:35', '2020-06-03 20:21:35', NULL),
(2, 4, 1, 75, 70, 72, 85, 80, 83, 90, 85, 87, 'Phase 1', '2020-06-14 00:15:16', '2020-06-14 00:15:16', NULL),
(3, 33, 1, 70, 65, 67, 80, 76, 78, 80, 70, 75, 'Phase 1', '2020-12-15 09:50:29', '2020-12-15 09:50:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `progress_chart_phase3s`
--

CREATE TABLE `progress_chart_phase3s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `p_id` int(11) NOT NULL,
  `term5_cgpa` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `term5_olqs` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `term5_cgpa_olqs` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `term6_cgpa` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `term6_olqs` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `term6_cgpa_olqs` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `term7_cgpa` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `term7_olqs` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `term7_cgpa_olqs` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `term8_cgpa` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `term8_olqs` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `term8_cgpa_olqs` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `term9_cgpa` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `term9_olqs` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `term9_cgpa_olqs` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `term10_cgpa` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `term10_olqs` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `term10_cgpa_olqs` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `term11_cgpa` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `term11_olqs` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `term11_cgpa_olqs` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `do_id` int(11) NOT NULL,
  `phase` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phase3_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `joto_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `progress_chart_phase3s`
--

INSERT INTO `progress_chart_phase3s` (`id`, `p_id`, `term5_cgpa`, `term5_olqs`, `term5_cgpa_olqs`, `term6_cgpa`, `term6_olqs`, `term6_cgpa_olqs`, `term7_cgpa`, `term7_olqs`, `term7_cgpa_olqs`, `term8_cgpa`, `term8_olqs`, `term8_cgpa_olqs`, `term9_cgpa`, `term9_olqs`, `term9_cgpa_olqs`, `term10_cgpa`, `term10_olqs`, `term10_cgpa_olqs`, `term11_cgpa`, `term11_olqs`, `term11_cgpa_olqs`, `do_id`, `phase`, `phase3_type`, `created_at`, `updated_at`, `joto_id`) VALUES
(1, 1, '65', '75', '73', '61', '80', '63', '69', '72', '70', '75', '70', '69', '87', '87', '87', '0', '0', '0', '0', '0', '0', 3, 'Phase 3', 'pnec', '2020-06-06 09:08:47', '2020-06-06 09:08:47', NULL),
(2, 4, '74', '70', '72', '76', '74', '75', '76', '73', '75', '80', '75', '77', '80', '74', '76', '89', '85', '83', '90', '85', '87', 1, 'Phase 3', 'pnec', '2020-06-14 01:00:26', '2020-06-14 01:00:26', NULL),
(3, 34, '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', 1, 'Phase 3', 'pnec', '2020-12-18 09:29:48', '2020-12-18 09:29:48', NULL),
(4, 35, '2', '2', '3', '3', '2', '2', '3', '3', '3', '4', '4', '4', '4', '4', '3.5', '3', '3', '3', '2.5', '2.5', '2.5', 1, 'Phase 3', 'pnec', '2020-12-18 09:37:58', '2020-12-18 09:37:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `psychologist_reports`
--

CREATE TABLE `psychologist_reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `file_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_id` int(11) NOT NULL,
  `do_id` int(11) NOT NULL,
  `phase` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `joto_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `psychologist_reports`
--

INSERT INTO `psychologist_reports` (`id`, `file_name`, `file_type`, `file_path`, `file_size`, `p_id`, `do_id`, `phase`, `created_at`, `updated_at`, `joto_id`) VALUES
(1, '5ed845b2186ddBIO-DATAFORM.docx', 'docx', 'http://localhost/dossier/attachments/psychologist_report/5ed845b2186ddBIO-DATAFORM.docx', '17.545 kb', 1, 3, 'Phase 1', '2020-06-03 19:52:02', '2020-06-03 19:52:02', NULL),
(2, '5ee457cd22cdaWhatsAppImage2019-06-15at8.16.25PM-Copy.jpeg', 'jpeg', 'http://localhost/dossier/attachments/psychologist_report/5ee457cd22cdaWhatsAppImage2019-06-15at8.16.25PM-Copy.jpeg', '153.611 kb', 4, 1, 'Phase 1', '2020-06-12 23:36:29', '2020-06-12 23:36:29', NULL),
(3, '5faaac1919f3cMedical-CV-template.pdf', 'pdf', 'http://localhost/dossier/attachments/psychologist_report/5faaac1919f3cMedical-CV-template.pdf', '211.885 kb', 1, 3, 'Phase 1', '2020-11-10 10:04:57', '2020-11-10 10:04:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `punishment_records`
--

CREATE TABLE `punishment_records` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `p_id` int(11) DEFAULT NULL,
  `term` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date NOT NULL,
  `offence` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `punishment_awarded` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `awarded_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `do_id` int(11) DEFAULT NULL,
  `phase` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phase3_type` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `joto_id` int(11) DEFAULT NULL,
  `oc_no` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `punishment_records`
--

INSERT INTO `punishment_records` (`id`, `p_id`, `term`, `date`, `offence`, `punishment_awarded`, `awarded_by`, `do_id`, `phase`, `phase3_type`, `created_at`, `updated_at`, `joto_id`, `oc_no`) VALUES
(1, 1, 'Term-I', '2017-12-31', 'absent from classes', '7*RC', 'lt cdr kazim pn', 3, 'Phase 1', NULL, '2020-06-03 19:54:34', '2020-06-03 19:54:34', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `relegations`
--

CREATE TABLE `relegations` (
  `id` int(11) UNSIGNED NOT NULL,
  `oc_no` varchar(30) NOT NULL,
  `re_p_id` varchar(30) DEFAULT NULL,
  `new_p_id` varchar(30) DEFAULT NULL,
  `p_id` varchar(30) NOT NULL,
  `term` varchar(30) NOT NULL,
  `reason` varchar(2100) NOT NULL,
  `remarks` varchar(2100) NOT NULL,
  `co_name` varchar(200) NOT NULL,
  `do_name` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `relegations`
--

INSERT INTO `relegations` (`id`, `oc_no`, `re_p_id`, `new_p_id`, `p_id`, `term`, `reason`, `remarks`, `co_name`, `do_name`, `created_at`, `updated_at`) VALUES
(1, '3333333333', NULL, NULL, '11', 'Term-I', 'adfasdf', 'asdfsdfsa', 'rahbharco', 'sabir', '2020-12-14 04:24:30', '2020-12-14 04:24:30');

-- --------------------------------------------------------

--
-- Table structure for table `saluting_swimming_records`
--

CREATE TABLE `saluting_swimming_records` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `p_id` int(11) DEFAULT NULL,
  `saluting_date` date NOT NULL DEFAULT '0000-00-00',
  `saluting_remarks_attempt` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `saluting_remarks_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_swimming_date` date NOT NULL DEFAULT '0000-00-00',
  `p_swimming_remarks_attempt` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_swimming_remarks_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `s_swimming_date` date NOT NULL DEFAULT '0000-00-00',
  `s_swimming_remarks_attempt` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `s_swimming_remarks_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `do_id` int(11) DEFAULT NULL,
  `phase` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `joto_id` int(11) DEFAULT NULL,
  `oc_no` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `saluting_swimming_records`
--

INSERT INTO `saluting_swimming_records` (`id`, `p_id`, `saluting_date`, `saluting_remarks_attempt`, `saluting_remarks_status`, `p_swimming_date`, `p_swimming_remarks_attempt`, `p_swimming_remarks_status`, `s_swimming_date`, `s_swimming_remarks_attempt`, `s_swimming_remarks_status`, `do_id`, `phase`, `created_at`, `updated_at`, `joto_id`, `oc_no`) VALUES
(1, 1, '2018-11-29', 'Attempt 5', 'qualified', '2018-11-30', 'Attempt 5', 'qualified', '2019-11-30', 'Attempt 10', 'qualified', 3, 'Phase 1', '2020-06-03 19:58:46', '2020-06-03 19:58:46', NULL, NULL);
-- --------------------------------------------------------

--
-- Table structure for table `security_info`
--

CREATE TABLE `security_info` (
  `id` bigint(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `reg_data` timestamp NOT NULL DEFAULT current_timestamp(),
  `acct_type` enum('do','joto','ct','co','exo','sqc','cao','cao_sec','smo','admin','dean','ctmwt','hougp') NOT NULL,
  `status` enum('offline','online') NOT NULL,
  `is_active` enum('yes','no') NOT NULL,
  `division` varchar(50) NULL,
  `email` varchar(200) NULL,
  `phone` varchar(200) NULL,
  `address` varchar(500) NULL,
  `full_name` varchar(100) NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `security_info`
--

INSERT INTO `security_info` (`id`, `username`, `password`, `reg_data`, `acct_type`, `status`,`is_active`, `division`) VALUES
(1, 'admin', '$2y$10$uVajLuVrXeV2S4TWWuH4a.CLTS4LW92nmGiitB94akkA6pAWMJyI2', '2021-05-21 14:00:00', 'admin', 'offline','yes', NULL),
(2, 'do', '$2y$10$7ht2URnlOaTf4Phga9oWaOd9t5LdtChLLMUVgkzUFhmeRCbZS9Rpe', '2021-06-29 04:10:11', 'do', 'offline','yes', 'Hamza division'),
(3, 'joto', '$2y$10$7ht2URnlOaTf4Phga9oWaOd9t5LdtChLLMUVgkzUFhmeRCbZS9Rpe', '2021-06-29 04:10:11', 'joto', 'offline','yes', 'Hamza division'),
(4, 'cao', '$2y$10$7ht2URnlOaTf4Phga9oWaOd9t5LdtChLLMUVgkzUFhmeRCbZS9Rpe', '2021-06-29 04:10:11', 'cao', 'offline','yes', NULL),
(5, 'smo', '$2y$10$7ht2URnlOaTf4Phga9oWaOd9t5LdtChLLMUVgkzUFhmeRCbZS9Rpe', '2021-06-29 04:10:11', 'smo', 'offline','yes', NULL),
(6, 'cao_sec', '$2y$10$7ht2URnlOaTf4Phga9oWaOd9t5LdtChLLMUVgkzUFhmeRCbZS9Rpe', '2021-06-29 04:10:11', 'cao_sec', 'offline','yes', NULL),
(7, 'ct', '$2y$10$7ht2URnlOaTf4Phga9oWaOd9t5LdtChLLMUVgkzUFhmeRCbZS9Rpe', '2021-06-29 04:10:11', 'ct', 'offline','yes', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `seniority_record2_phase2s`
--

CREATE TABLE `seniority_record2_phase2s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `p_id` int(11) NOT NULL,
  `marks_obtained` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aggregate_percentage` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `relegated` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subjects_failed` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seniority_gained_lost` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phase` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `do_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `joto_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seniority_record2_phase2s`
--

INSERT INTO `seniority_record2_phase2s` (`id`, `p_id`, `marks_obtained`, `aggregate_percentage`, `relegated`, `subjects_failed`, `seniority_gained_lost`, `phase`, `do_id`, `created_at`, `updated_at`, `joto_id`) VALUES
(1, 1, '600', '76', 'no', '0', '15', 'Phase 2', 3, '2020-06-03 20:46:18', '2020-06-03 20:46:18', NULL),
(2, 1, '750', '65', 'no', 'no', '10', 'Phase 2', 3, '2020-06-04 00:49:12', '2020-06-04 00:49:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `seniority_records`
--

CREATE TABLE `seniority_records` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `p_id` int(11) NOT NULL,
  `term1_marks` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `term1_percentage` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `term1_relegated` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `term1_subjects_failed` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `term1_seniority` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `term2_marks` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `term2_percentage` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `term2_relegated` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `term2_subjects_failed` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `term2_seniority` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `term3_marks` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `term3_percentage` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `term3_relegated` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `term3_subjects_failed` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `term3_seniority` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `net_percentage` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seniority_gained` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seniority_lost` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `net_seniority` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phase` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `do_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `joto_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seniority_records`
--

INSERT INTO `seniority_records` (`id`, `p_id`, `term1_marks`, `term1_percentage`, `term1_relegated`, `term1_subjects_failed`, `term1_seniority`, `term2_marks`, `term2_percentage`, `term2_relegated`, `term2_subjects_failed`, `term2_seniority`, `term3_marks`, `term3_percentage`, `term3_relegated`, `term3_subjects_failed`, `term3_seniority`, `net_percentage`, `seniority_gained`, `seniority_lost`, `net_seniority`, `phase`, `do_id`, `created_at`, `updated_at`, `joto_id`) VALUES
(1, 1, '76', '76', 'no', '0', '5', '81', '83', 'no', '0', '15', '76', '77', 'no', '0', '15', '65%', '35', '0', '35', 'Phase 1', 3, '2020-06-03 20:25:11', '2020-06-03 20:25:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `seniority_record_phase3s`
--

CREATE TABLE `seniority_record_phase3s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `p_id` int(11) NOT NULL,
  `marks_obtained` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aggregate_percentage` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seniority_lost` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `courses_failed` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seniority_gained_lost` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phase` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phase3_type` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `do_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `joto_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seniority_record_phase3s`
--

INSERT INTO `seniority_record_phase3s` (`id`, `p_id`, `marks_obtained`, `aggregate_percentage`, `seniority_lost`, `courses_failed`, `seniority_gained_lost`, `phase`, `phase3_type`, `do_id`, `created_at`, `updated_at`, `joto_id`) VALUES
(1, 1, '1045', '86', '0', '0', '30', 'Phase 3', 'bahadur', 3, '2020-06-04 00:53:13', '2020-06-04 00:53:13', NULL),
(2, 1, '2', '2', '2', '2', '2', 'Phase 3', 'bahadur', 3, '2020-12-13 14:08:25', '2020-12-13 14:08:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `seniority_record_phase3_pnecs`
--

CREATE TABLE `seniority_record_phase3_pnecs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `p_id` int(11) NOT NULL,
  `term3_cgpa` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `term3_relegated` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `term3_subjects_failed` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `term3_seniority` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `term4_cgpa` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `term4_relegated` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `term4_subjects_failed` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `term4_seniority` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `term5_cgpa` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `term5_relegated` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `term5_subjects_failed` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `term5_seniority` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `term6_cgpa` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `term6_relegated` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `term6_subjects_failed` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `term6_seniority` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `term7_cgpa` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `term7_relegated` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `term7_subjects_failed` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `term7_seniority` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `term8_cgpa` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `term8_relegated` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `term8_subjects_failed` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `term8_seniority` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `term9_cgpa` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `term9_relegated` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `term9_subjects_failed` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `term9_seniority` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `term10_cgpa` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `term10_relegated` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `term10_subjects_failed` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `term10_seniority` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `term11_cgpa` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `term11_relegated` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `term11_subjects_failed` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `term11_seniority` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `net_percentage` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seniority_gained` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seniority_lost` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `net_seniority` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phase` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phase3_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `do_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `joto_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seniority_record_phase3_pnecs`
--

INSERT INTO `seniority_record_phase3_pnecs` (`id`, `p_id`, `term3_cgpa`, `term3_relegated`, `term3_subjects_failed`, `term3_seniority`, `term4_cgpa`, `term4_relegated`, `term4_subjects_failed`, `term4_seniority`, `term5_cgpa`, `term5_relegated`, `term5_subjects_failed`, `term5_seniority`, `term6_cgpa`, `term6_relegated`, `term6_subjects_failed`, `term6_seniority`, `term7_cgpa`, `term7_relegated`, `term7_subjects_failed`, `term7_seniority`, `term8_cgpa`, `term8_relegated`, `term8_subjects_failed`, `term8_seniority`, `term9_cgpa`, `term9_relegated`, `term9_subjects_failed`, `term9_seniority`, `term10_cgpa`, `term10_relegated`, `term10_subjects_failed`, `term10_seniority`, `term11_cgpa`, `term11_relegated`, `term11_subjects_failed`, `term11_seniority`, `net_percentage`, `seniority_gained`, `seniority_lost`, `net_seniority`, `phase`, `phase3_type`, `do_id`, `created_at`, `updated_at`, `joto_id`) VALUES
(1, 1, '3.7', 'no', 'no', '10', '3,8', 'no', 'no', '10', '3.4', 'no', 'no', '10', '3.7', 'no', 'no', '10', '3.7', 'no', 'no', '10', '3.7', 'no', 'no', '10', '3.7', 'no', 'no', '10', '3.7', 'no', 'no', '10', '3.7', 'no', 'no', '10', '88', '40', '0', '40', 'Phase 3', 'pnec', 3, '2020-06-04 00:52:16', '2020-06-04 00:52:16', NULL),
(2, 1, '3.7', 'no', '0', '10', '3,8', 'no', 'no', '12', '3.4', 'no', 'no', '12', '3.7', 'no', 'no', '10', '3.7', 'no', 'no', '10', '3.7', 'no', 'no', '10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '65%', '64', '0', '70', 'Phase 3', 'pnec', 3, '2020-06-06 09:14:04', '2020-06-06 09:14:04', NULL),
(3, 4, '3.7', 'no', 'no', '5', '3,8', 'no', 'no', '5', '3.4', 'no', 'no', '5', '3.7', 'no', 'no', '5', '3.7', 'no', 'no', '5', '3.7', 'no', 'no', '5', '3.7', 'no', 'no', '5', '3.7', 'no', 'no', '5', '3.7', 'no', 'no', '5', '85', '45', '0', '45', 'Phase 3', 'pnec', 1, '2020-06-14 01:02:55', '2020-06-14 01:02:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sqcs`
--

CREATE TABLE `sqcs` (
  `sqc_id` int(11) NOT NULL,
  `sqc_name` varchar(255) NOT NULL,
  `sqc_rank` varchar(255) DEFAULT NULL,
  `p_no` varchar(191) DEFAULT NULL,
  `navy_unit_id` int(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `username` varchar(191) DEFAULT NULL,
  `password` varchar(191) DEFAULT NULL,
  `account_status` varchar(191) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `divison_name` varchar(1191) DEFAULT NULL,
  `divison_count` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sqcs`
--

INSERT INTO `sqcs` (`sqc_id`, `sqc_name`, `sqc_rank`, `p_no`, `navy_unit_id`, `email`, `username`, `password`, `account_status`, `created_at`, `updated_at`, `divison_name`, `divison_count`) VALUES
(2, 'q/deck', 'Lieutenant commander', '12345', 1, 'deck@gmail.com', 'q/deck', '80940bbbd02a8e1608c7a591f0085d50', 'Approved', '2020-12-15 09:06:25', '2020-12-15 09:06:25', 'hamza,shamsheer,tariq,', 3),
(3, 'foxl', 'Lieutenant commander', '2345', 1, 'foxl@gmail.com', 'foxl', 'fddf720311ba765c9e0e18b9ad00d928', 'Approved', '2020-12-15 09:07:43', '2020-12-15 09:07:43', 'khaild,saif,tipu,', 3);

-- --------------------------------------------------------

--
-- Table structure for table `sqc_dossiers`
--

CREATE TABLE `sqc_dossiers` (
  `id` int(11) NOT NULL,
  `sqc_id` int(11) DEFAULT NULL,
  `p_id` varchar(191) DEFAULT NULL,
  `phase1_remarks` varchar(191) DEFAULT NULL,
  `phase2_remarks` varchar(191) DEFAULT NULL,
  `phase3_pnec_remarks` text DEFAULT NULL,
  `phase3_remarks` varchar(191) DEFAULT NULL,
  `joto_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `terminations`
--

CREATE TABLE `terminations` (
  `id` int(11) UNSIGNED NOT NULL,
  `oc_no` varchar(30) NOT NULL,
  `p_id` varchar(30) NOT NULL,
  `reason` varchar(2100) NOT NULL,
  `remarks` varchar(2100) NOT NULL,
  `co_name` varchar(200) NOT NULL,
  `captain_name` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `terminations`
--

INSERT INTO `terminations` (`id`, `oc_no`, `p_id`, `reason`, `remarks`, `co_name`, `captain_name`, `created_at`, `updated_at`) VALUES
(1, '55555555555555555', '7', 'e', 'e', 'exojauhar', 'e', '2020-12-14 03:38:01', '2020-12-14 03:38:01'),
(2, '1234567', '23', 'reason', 'reason', 'reason', 'reason', '2020-12-14 12:14:41', '2020-12-14 12:14:41'),
(3, '222222222', '36', 'aaaaa', 'aaaa', 'a', 'a', '2020-12-15 10:41:01', '2020-12-15 10:41:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `do_id` int(11) NOT NULL,
  `do_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `do_rank` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `warning_attachments`
--

CREATE TABLE `warning_attachments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `file_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_id` int(11) NOT NULL,
  `do_id` int(11) DEFAULT NULL,
  `phase` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phase3_type` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warning_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `joto_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `warning_attachments`
--

INSERT INTO `warning_attachments` (`id`, `file_name`, `file_type`, `file_path`, `file_size`, `p_id`, `do_id`, `phase`, `phase3_type`, `warning_type`, `created_at`, `updated_at`, `joto_id`) VALUES
(1, '5ed846f8821e0BIO-DATAFORM.docx', 'docx', 'http://localhost/dossier/attachments/warnings/5ed846f8821e0BIO-DATAFORM.docx', '17.545 kb', 1, 3, 'Phase 1', NULL, 'Training Commander', '2020-06-03 19:57:28', '2020-06-03 19:57:28', NULL),
(2, '5ed8550c2e13bBIO-DATAFORM.docx', 'docx', 'http://localhost/dossier/attachments/warnings/5ed8550c2e13bBIO-DATAFORM.docx', '17.545 kb', 1, 3, 'Phase 3', 'pnec', 'Training Commander', '2020-06-03 20:57:32', '2020-06-03 20:57:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `warning_records`
--

CREATE TABLE `warning_records` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `p_id` int(11) NOT NULL,
  `sno` int(11) NOT NULL,
  `date` date NOT NULL,
  `issued_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reasons` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `do_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `do_id` int(11) DEFAULT NULL,
  `phase` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phase3_type` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `joto_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `warning_records`
--

INSERT INTO `warning_records` (`id`, `p_id`, `sno`, `date`, `issued_by`, `reasons`, `do_name`, `do_id`, `phase`, `phase3_type`, `created_at`, `updated_at`, `joto_id`) VALUES
(1, 1, 1, '2018-10-31', 'lt cdr seemab pn', 'failed in aggregate', 'LT CDR IMRAN', 3, 'Phase 1', NULL, '2020-06-03 19:56:36', '2020-06-03 19:56:36', NULL),
(2, 1, 1, '2019-11-29', 'lt cdr seemab pn', 'failed in aggregate', 'LT CDR IOMRAN', 3, 'Phase 2', NULL, '2020-06-06 07:40:52', '2020-06-06 07:40:52', NULL);

--
-- Table structure for table `cadet_club`
--

CREATE TABLE `cadet_club` (
  `id` int(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cadet_club`
--

INSERT INTO `cadet_club` (`id`, `name`, `status`) VALUES
(1, 'club-1', 'Active'),
(2, 'club-2', 'Active'),
(3, 'club-3', 'Active');

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` int(20) NOT NULL,
  `division_name` varchar(50) NOT NULL,
  `division_officer` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `division_name`, `division_officer`, `status`) VALUES
(1, 'Kashmir division', NULL, NULL),
(2, 'Tariq division', NULL, NULL), 
(3, 'Shamsheer division', NULL, NULL), 
(4, 'Hamza division', NULL, NULL), 
(5, 'Nasr division', NULL, NULL),
(6, 'Khaibar division', NULL, NULL),
(7, 'Saad division', NULL, NULL),
(8, 'Aslat division', NULL, NULL),
(9, 'Zulfiqar division', NULL, NULL), 
(10, 'Yarmook division', NULL, NULL), 
(11, 'Alamgir division', NULL, NULL), 
(12, 'Tabuk division', NULL, NULL), 
(13, 'Saif division', NULL, NULL), 
(14, 'Khalid division', NULL, NULL), 
(15, 'Moawin division', NULL, NULL);


--
-- Table structure for table `quality_list`
--

CREATE TABLE `quality_list` (
  `id` int(20) NOT NULL,
  `quality_name` varchar(50) DEFAULT NULL,
  `max_marks` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quality_list`
--

INSERT INTO `quality_list` (`id`, `quality_name`, `max_marks`) VALUES
(1, 'Truthfulness', 20),
(2, 'Integrity', 25),
(3, 'Sense of Pride', 10),
(4, 'Moral Courage', 15),
(5, 'Confidence and Behviour Under Stress', 15),
(6, 'Initiative', 10),
(7, 'Ability to command,control and Assert', 10),
(8, 'Self and General Discipline', 10),
(9, 'Sense of Duty', 10),
(10, 'Reliability', 10),
(11, 'General Appearance and Bearing', 10),
(12, 'Physical Fitness', 10),
(13, 'Manners and Social Conduct', 10),
(14, 'Intelligence and Common sense', 10),
(15, 'Cooperation Adaptability and Team work', 10),
(16, 'Power of Expression (Written & Oral)', 15);

--
-- Table structure for table `club_records`
--

CREATE TABLE `club_records` (
  `id` bigint(20) NOT NULL,
  `p_id` int(11) NOT NULL,
  `assigned_club` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `do_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Table structure for table `branch_preference_list`
--

CREATE TABLE `branch_preference_list` (
  `id` int(20) NOT NULL,
  `branch_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `branch_preference_list`
--

INSERT INTO `branch_preference_list` (`id`, `branch_name`) VALUES
(1, 'OPS'),
(2, 'WE'),
(3, 'LOG');

CREATE TABLE `divisional_officer_records` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `p_id` int(11) NOT NULL,
  `do_id` int(11) NOT NULL,
  `rank` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `officer_name` varchar(200) NULL DEFAULT NULL,
  `date_from` date NULL DEFAULT NULL,
  `date_to` date NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `attachment_name` text NOT NULL,
  `file_ext` text NOT NULL,
  `mime_type` text NOT NULL,
  `message_date_time` text NOT NULL,
  `ip_address` text NOT NULL,
  `seen` enum('yes','no') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
 `id` int(11) NOT NULL,
 `activity_module` enum('do','joto','ct','co','exo','sqc','cao','cao_sec','smo','admin') NOT NULL,
 `activity_action` enum('add','update','delete') ,
 `activity_detail` text NULL,
 `activity_by` varchar(250) NULL,
 `activity_date` datetime
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log_seen` (
 `activity_id` int(11) NOT NULL,
 `user_id` int(11) NOT NULL,
 `seen` enum('yes','no') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Alter Tables by Awais Ahmad

alter table pn_form1s
add COLUMN club varchar(30) null;

alter table punishment_records
add column start_date date null;

alter table punishment_records
add column end_date date null;

alter table medical_records
add column start_date date;

alter table medical_records
add column end_date date;

alter table observation_records
add column status varchar(50) NOT NULL;

alter table punishment_records
add COLUMN status varchar(50) NOT NULL;

alter table punishment_records
add column days int(20);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activity_log`
--  
ALTER TABLE `activity_log`
 ADD PRIMARY KEY (`id`);



--
-- Indexes for table `academic_records`
--
ALTER TABLE `academic_records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branch_allocations`
--
ALTER TABLE `branch_allocations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cadets_autobiographies`
--
ALTER TABLE `cadets_autobiographies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `captain_trainings`
--
ALTER TABLE `captain_trainings`
  ADD PRIMARY KEY (`captain_training_id`),
  ADD UNIQUE KEY `captain_trainings_email_unique` (`email`),
  ADD UNIQUE KEY `captain_trainings_username_unique` (`username`);

--
-- Indexes for table `captain_training_dossiers`
--
ALTER TABLE `captain_training_dossiers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commanding_officers`
--
ALTER TABLE `commanding_officers`
  ADD PRIMARY KEY (`co_id`),
  ADD UNIQUE KEY `commanding_officers_email_unique` (`email`),
  ADD UNIQUE KEY `commanding_officers_username_unique` (`username`);

--
-- Indexes for table `commanding_officer_dossiers`
--
ALTER TABLE `commanding_officer_dossiers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `degree_certificates`
--
ALTER TABLE `degree_certificates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `distinctions_records`
--
ALTER TABLE `distinctions_records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `do_accounts`
--
ALTER TABLE `do_accounts`
  ADD PRIMARY KEY (`do_id`),
  ADD UNIQUE KEY `do_accounts_email_unique` (`email`);

--
-- Indexes for table `do_records`
--
ALTER TABLE `do_records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exo_dossiers`
--
ALTER TABLE `exo_dossiers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exo_officers`
--
ALTER TABLE `exo_officers`
  ADD PRIMARY KEY (`exo_id`),
  ADD KEY `email` (`email`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `games_proficiencies`
--
ALTER TABLE `games_proficiencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_remarks`
--
ALTER TABLE `general_remarks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inspection_records`
--
ALTER TABLE `inspection_records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `joto_accounts`
--
ALTER TABLE `joto_accounts`
  ADD PRIMARY KEY (`joto_id`);

--
-- Indexes for table `joto_records`
--
ALTER TABLE `joto_records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medical_records`
--
ALTER TABLE `medical_records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `navy_units`
--
ALTER TABLE `navy_units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nhq_dossiers`
--
ALTER TABLE `nhq_dossiers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nhq_logins`
--
ALTER TABLE `nhq_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `obiographies`
--
ALTER TABLE `obiographies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `observation_records`
--
ALTER TABLE `observation_records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `observation_slips`
--
ALTER TABLE `observation_slips`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `officer_qualities`
--
ALTER TABLE `officer_qualities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `overall_seniority_records`
--
ALTER TABLE `overall_seniority_records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_datas`
--
ALTER TABLE `personal_datas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_data_attachments`
--
ALTER TABLE `personal_data_attachments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `physical_effeciency_records`
--
ALTER TABLE `physical_effeciency_records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pn_form1s`
--
ALTER TABLE `pn_form1s`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `progress_charts`
--
ALTER TABLE `progress_charts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semester_results`
--
ALTER TABLE `semester_results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `progress_chart_phase3s`
--
ALTER TABLE `progress_chart_phase3s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `psychologist_reports`
--
ALTER TABLE `psychologist_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `punishment_records`
--
ALTER TABLE `punishment_records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `relegations`
--
ALTER TABLE `relegations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saluting_swimming_records`
--
ALTER TABLE `saluting_swimming_records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `security_info`
--
ALTER TABLE `security_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seniority_record2_phase2s`
--
ALTER TABLE `seniority_record2_phase2s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seniority_records`
--
ALTER TABLE `seniority_records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seniority_record_phase3s`
--
ALTER TABLE `seniority_record_phase3s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seniority_record_phase3_pnecs`
--
ALTER TABLE `seniority_record_phase3_pnecs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sqcs`
--
ALTER TABLE `sqcs`
  ADD PRIMARY KEY (`sqc_id`),
  ADD KEY `email` (`email`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `sqc_dossiers`
--
ALTER TABLE `sqc_dossiers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terminations`
--
ALTER TABLE `terminations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `warning_attachments`
--
ALTER TABLE `warning_attachments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warning_records`
--
ALTER TABLE `warning_records`
  ADD PRIMARY KEY (`id`);
  
--
-- Indexes for table `cadet_club`
--
ALTER TABLE `cadet_club`
  ADD PRIMARY KEY (`id`);
  
--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`);
  
--
-- Indexes for table `quality_list`
--
ALTER TABLE `quality_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `club_records`
--
ALTER TABLE `club_records`
  ADD PRIMARY KEY (`id`);
  
--
-- Indexes for table `branch_preference_list`
--
ALTER TABLE `branch_preference_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `divisional_officer_records`
--
ALTER TABLE `divisional_officer_records`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academic_records`
--
ALTER TABLE `academic_records`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `branch_allocations`
--
ALTER TABLE `branch_allocations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `cadets_autobiographies`
--
ALTER TABLE `cadets_autobiographies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `captain_training_dossiers`
--
ALTER TABLE `captain_training_dossiers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `commanding_officer_dossiers`
--
ALTER TABLE `commanding_officer_dossiers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `degree_certificates`
--
ALTER TABLE `degree_certificates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `distinctions_records`
--
ALTER TABLE `distinctions_records`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `do_records`
--
ALTER TABLE `do_records`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `exo_dossiers`
--
ALTER TABLE `exo_dossiers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `exo_officers`
--
ALTER TABLE `exo_officers`
  MODIFY `exo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `games_proficiencies`
--
ALTER TABLE `games_proficiencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `general_remarks`
--
ALTER TABLE `general_remarks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `inspection_records`
--
ALTER TABLE `inspection_records`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `joto_accounts`
--
ALTER TABLE `joto_accounts`
  MODIFY `joto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `joto_records`
--
ALTER TABLE `joto_records`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `medical_records`
--
ALTER TABLE `medical_records`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `navy_units`
--
ALTER TABLE `navy_units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `nhq_dossiers`
--
ALTER TABLE `nhq_dossiers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `nhq_logins`
--
ALTER TABLE `nhq_logins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `obiographies`
--
ALTER TABLE `obiographies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `observation_records`
--
ALTER TABLE `observation_records`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `observation_slips`
--
ALTER TABLE `observation_slips`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `officer_qualities`
--
ALTER TABLE `officer_qualities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `overall_seniority_records`
--
ALTER TABLE `overall_seniority_records`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_datas`
--
ALTER TABLE `personal_datas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_data_attachments`
--
ALTER TABLE `personal_data_attachments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `physical_effeciency_records`
--
ALTER TABLE `physical_effeciency_records`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pn_form1s`
--
ALTER TABLE `pn_form1s`
  MODIFY `p_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `progress_charts`
--
ALTER TABLE `progress_charts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `semester_results`
--
ALTER TABLE `semester_results`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `progress_chart_phase3s`
--
ALTER TABLE `progress_chart_phase3s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `psychologist_reports`
--
ALTER TABLE `psychologist_reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `punishment_records`
--
ALTER TABLE `punishment_records`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `relegations`
--
ALTER TABLE `relegations`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `saluting_swimming_records`
--
ALTER TABLE `saluting_swimming_records`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `security_info`
--
ALTER TABLE `security_info`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `seniority_record2_phase2s`
--
ALTER TABLE `seniority_record2_phase2s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `seniority_records`
--
ALTER TABLE `seniority_records`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `seniority_record_phase3s`
--
ALTER TABLE `seniority_record_phase3s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `seniority_record_phase3_pnecs`
--
ALTER TABLE `seniority_record_phase3_pnecs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `sqcs`
--
ALTER TABLE `sqcs`
  MODIFY `sqc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sqc_dossiers`
--
ALTER TABLE `sqc_dossiers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `terminations`
--
ALTER TABLE `terminations`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `warning_attachments`
--
ALTER TABLE `warning_attachments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `warning_records`
--
ALTER TABLE `warning_records`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
  
--
-- AUTO_INCREMENT for table `cadet_club`
--
ALTER TABLE `cadet_club`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
  
--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
  

--
-- AUTO_INCREMENT for table `quality_list`
--
ALTER TABLE `quality_list`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `club_records`
--
ALTER TABLE `club_records`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `branch_preference_list`
--
ALTER TABLE `branch_preference_list`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `divisional_officer_records`
--
ALTER TABLE `divisional_officer_records`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
 MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Table structure for table `academic_records`
--

-- physical_milestone 
CREATE TABLE `physical_milestone` (
  `id` bigint(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `p_id` int(11) NOT NULL,
  `oc_no` int(11) NOT NULL,
  `do_id` int(11) DEFAULT NULL,
  `term` varchar(20),
  `PST_result` varchar(200),
  `PST_attempt` varchar(200),
  `SST_result` varchar(200),
  `SST_attempt` varchar(200),
  `PET_I_result` varchar(200),
  `PET_I_attempt` varchar(200),
  `PET_II_result` varchar(200),
  `PET_II_attempt` varchar(200),
  `assault_result` varchar(200),
  `assault_attempt` varchar(200),
  `saluting_result` varchar(200),
  `saluting_attempt` varchar(200),
  `PLX_result` varchar(200),
  `PLX_attempt` varchar(200),
  `long_cross_result` varchar(200),
  `long_cross_card_number` varchar(200),
  `mini_cross_result` varchar(200),
  `mini_cross_card_number` varchar(200),
  `date_added` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Term_I Details  --
CREATE TABLE `term_I_details` (
  `id` bigint(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `p_id` int(11) NOT NULL,
  `oc_no` int(11) NOT NULL,
  `term` varchar(20),
  `do_id` int(11) DEFAULT NULL,
  `mile_time` varchar(200),
  `pushups` varchar(200),
  `chinups` varchar(200),
  `rope` varchar(200),
  `sprint_time` varchar(200),
  `date_added` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Term_II Details  --
CREATE TABLE `term_II_details` (
  `id` bigint(20) NOT NULL  PRIMARY KEY AUTO_INCREMENT,
  `p_id` int(11) NOT NULL,
  `oc_no` int(11) NOT NULL,
  `term` varchar(20),
  `do_id` int(11) DEFAULT NULL,
  `mile_time` varchar(200),
  `pushups` varchar(200),
  `chinups` varchar(200),
  `rope` varchar(200),
  `sprint_time` varchar(200),
  `date_added` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `warning_records`
  ADD `type` varchar(500);

ALTER TABLE `warning_records`
  ADD `file` varchar(500);

ALTER TABLE `warning_records`
  ADD `oc_no` int(11);

ALTER TABLE `club_records`
  ADD `status` enum('active','deleted');

ALTER TABLE `branch_allocations`
  ADD `oc_no` int(11);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

/* Insert into units */
INSERT INTO `navy_units`( `unit_name`, `created_at`, `updated_at`) VALUES ('PNS Tabuk','NULL','NULL');
INSERT INTO `navy_units`( `unit_name`, `created_at`, `updated_at`) VALUES ('PNS Yamook','NULL','NULL');
INSERT INTO `navy_units`( `unit_name`, `created_at`, `updated_at`) VALUES ('PNS Aslat','NULL','NULL');
INSERT INTO `navy_units`( `unit_name`, `created_at`, `updated_at`) VALUES ('PNS Saif','NULL','NULL');
INSERT INTO `navy_units`( `unit_name`, `created_at`, `updated_at`) VALUES ('PNS Shamsheer','NULL','NULL');
INSERT INTO `navy_units`( `unit_name`, `created_at`, `updated_at`) VALUES ('PNS Zulfiqar','NULL','NULL');
INSERT INTO `navy_units`( `unit_name`, `created_at`, `updated_at`) VALUES ('PNS Alamgir','NULL','NULL');
INSERT INTO `navy_units`( `unit_name`, `created_at`, `updated_at`) VALUES ('PNS Moawin','NULL','NULL');
INSERT INTO `navy_units`( `unit_name`, `created_at`, `updated_at`) VALUES ('PNS Nasr','NULL','NULL');
INSERT INTO `navy_units`( `unit_name`, `created_at`, `updated_at`) VALUES ('PNS Taughril','NULL','NULL');
INSERT INTO `navy_units`( `unit_name`, `created_at`, `updated_at`) VALUES ('PN School of logistics','NULL','NULL');

DELETE FROM `navy_units` WHERE `unit_name`='PNSL';
DELETE FROM `navy_units` WHERE `unit_name`='PN Fleet';
DELETE FROM `navy_units` WHERE `unit_name`='PNS Karsaz';

Update `navy_units` set unit_name = 'PNS Rahbar (Pakistan Naval Academy)' WHERE unit_name = 'PNS Rahbar';

/*Alter security_info*/

alter table security_info
add COLUMN unit varchar(100) null;

Update `security_info` set unit = 'PNS Rahbar (Pakistan Naval Academy)' WHERE unit is null;

alter table security_info
add COLUMN branch varchar(100) null;

INSERT INTO `branch_preference_list`( `branch_name`) VALUES ('ME');

alter table pn_form1s
add COLUMN branch_id int(11) null;

alter table pn_form1s
add COLUMN ct_viewed enum('no','yes');

alter table pn_form1s
add COLUMN old_division varchar(255);

/* Update S/LT in db xisting records */
UPDATE `pn_form1s` SET `phase`='Sub-Lieutenant' WHERE `phase`='Sub-Leutinent';

/* Update units in db existing records */
UPDATE `navy_units` SET `unit_name`='PNS Aslat' WHERE `unit_name`='PNS Aslar';

UPDATE `navy_units` SET `unit_name`='PNS Nasr' WHERE `unit_name`='PNS Nasab';

ALTER TABLE physical_milestone CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

ALTER TABLE term_i_details CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

ALTER TABLE term_ii_details CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;


COMMIT;