-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2022 at 07:36 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `madyoasis`
--

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE `assets` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `assign_assets`
--

CREATE TABLE `assign_assets` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `asset_id` int(10) UNSIGNED NOT NULL,
  `authority_id` int(10) UNSIGNED NOT NULL,
  `date_of_assignment` date NOT NULL,
  `date_of_release` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `assign_projects`
--

CREATE TABLE `assign_projects` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `project_id` int(10) UNSIGNED NOT NULL,
  `authority_id` int(10) UNSIGNED NOT NULL,
  `date_of_assignment` date NOT NULL,
  `date_of_release` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attendance_filenames`
--

CREATE TABLE `attendance_filenames` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `attendance_filenames`
--

INSERT INTO `attendance_filenames` (`id`, `name`, `description`, `date`, `created_at`, `updated_at`) VALUES
(1, 'attendance_sheet1.xlsx', 'this is a testing page', '2022-05-13', '2022-05-07 10:02:09', '2022-05-07 10:02:09');

-- --------------------------------------------------------

--
-- Table structure for table `attendance_managers`
--

CREATE TABLE `attendance_managers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `day` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `in_time` time NOT NULL,
  `out_time` time NOT NULL,
  `hours_worked` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `difference` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `leave_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `awardees`
--

CREATE TABLE `awardees` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `award_id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `reason` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `awards`
--

CREATE TABLE `awards` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `awards`
--

INSERT INTO `awards` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Mindstone Mavenx', 'Mindstone Mavenx desc', '2022-05-07 10:02:58', '2022-05-07 10:02:58');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `city_name` varchar(250) NOT NULL,
  `zone_id` int(11) DEFAULT NULL,
  `photo` varchar(250) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `city_name`, `zone_id`, `photo`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Greater Noida', 1, '', 1, '2022-05-12 10:06:54', '2022-05-12 10:06:54'),
(2, 'Bengaluru', 2, '', 1, '2022-05-12 10:07:01', '2022-05-12 10:07:01'),
(3, 'hapur city', 1, '', 1, '2022-05-12 10:08:43', '2022-05-12 10:08:43'),
(4, 'NOIDA', 1, '', 1, '2022-05-12 12:10:44', '2022-05-12 12:10:44'),
(5, 'Greater', 1, '', 1, '2022-05-12 12:10:44', '2022-05-12 12:10:44'),
(16, 'kk-1', 1, '', 1, '2022-05-13 10:43:05', '2022-05-13 10:43:05'),
(17, 'kk-2', 1, '', 1, '2022-05-13 10:43:05', '2022-05-13 10:43:05'),
(18, 'Ranchi', 3, '', 1, '2022-05-18 08:29:23', '2022-05-18 08:29:23'),
(19, 'Patna', 3, '', 1, '2022-05-18 08:29:23', '2022-05-18 08:29:23'),
(20, 'Daltnong', 3, '', 1, '2022-05-18 08:29:23', '2022-05-18 08:29:23');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL,
  `emp_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zone_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `unit_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `upload_pdf_report` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_of_health` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_of_report` date DEFAULT NULL,
  `date_of_joining` date DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `pan_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `current_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `permanent_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `report_status` int(11) DEFAULT NULL,
  `created_report_date` date NOT NULL,
  `report_created_by` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `user_id`, `parent_id`, `emp_code`, `name`, `first_name`, `last_name`, `number`, `gender`, `zone_id`, `city_id`, `unit_id`, `date_of_birth`, `upload_pdf_report`, `date_of_health`, `date_of_report`, `date_of_joining`, `photo`, `age`, `pan_number`, `current_address`, `permanent_address`, `report_status`, `created_report_date`, `report_created_by`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 'HR0001', 'HR Manager', 'jay', 'move2inbox', '9354005029', '1', 0, 0, '', '2022-05-16', 'http://develop.madyoasis.com/photos/41FWQ8XCbvdw.png', '2022-05-16', '2022-05-16', '0000-00-00', 'C:\\xampp\\htdocs\\hrms\\public\\photos/a.png', 0, '', 'H-163,Sector-63,Noida', '', NULL, '0000-00-00', NULL, 0, '2022-05-20 05:43:20', '2022-05-16 12:25:12'),
(10, 12, 0, ' emp01', '', ' emp01', ' emp01', '9354005029', NULL, 3, 2, '2', NULL, '', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, '0000-00-00', NULL, 1, '2022-05-18 10:19:28', '2022-05-24 06:36:33'),
(11, 13, 0, 'emp02', '', 'emp02', 'emp02', '9354005029', NULL, 3, 18, '4,5', NULL, '', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '0000-00-00', NULL, 1, '2022-05-18 11:48:41', '2022-05-24 06:36:27'),
(12, 14, 0, ' Emp0111  ', '', 'Raj', 'Kaushal', '8877897898', NULL, 3, 18, '4', NULL, '', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '0000-00-00', NULL, 0, '2022-05-18 11:50:25', '2022-05-24 06:36:22'),
(13, 15, 0, ' Emp011133', '', 'Raj', 'Kaushal', '8877897898', NULL, 3, 18, '4', NULL, '', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '0000-00-00', NULL, 0, '2022-05-18 11:50:49', '2022-05-18 11:50:49'),
(14, 16, 0, ' emp03', '', ' emp03', ' emp03', '9354005029', NULL, 3, 18, NULL, NULL, '', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '0000-00-00', NULL, 1, '2022-05-19 05:09:48', '2022-05-23 08:05:36'),
(15, 17, 0, ' emp04            ', '', ' emp04 jp', ' emp04', '9354005029', NULL, 3, 18, '4', '2022-05-18', 'http://develop.madyoasis.com/photos/ijVuxcBJ39LK.pdf', '2022-05-01', '2022-05-03', NULL, NULL, NULL, NULL, 'beta 3     ', NULL, 4, '2022-05-24', NULL, 0, '2022-05-19 05:56:09', '2022-05-24 11:02:32'),
(16, 18, 0, ' emp05     ', '', ' emp05    ', ' emp05  ', '9354005021', '1', 3, 18, '4', '1984-04-20', 'http://develop.madyoasis.com/photos/CaQCZflBAPOy.pdf', '2022-05-16', '2022-05-15', NULL, NULL, 12, NULL, 'test001    ', NULL, 4, '2022-05-20', NULL, 0, '2022-05-19 07:05:02', '2022-05-20 07:44:04'),
(17, 19, 0, 'emp04', '', 'emp04', 'emp04', '9354005029', NULL, 3, 18, '5,9', NULL, '', NULL, NULL, NULL, NULL, 21, NULL, NULL, NULL, NULL, '0000-00-00', NULL, 1, '2022-05-19 07:09:26', '2022-05-24 06:36:07'),
(18, 20, 0, 'admin1', '', 'admin1', 'admin1', '9354005029', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', NULL, 1, '2022-05-20 08:11:57', '2022-05-20 08:15:29'),
(19, 21, 0, 'sumemp_001', '', 'sumemp001', 'sumemp001', '9354005021', '0', 1, 1, '1', '2022-05-18', '', NULL, NULL, NULL, NULL, 21, NULL, 'sumemp001 beta', NULL, NULL, '0000-00-00', NULL, 1, '2022-05-23 12:32:41', '2022-05-23 12:32:41'),
(20, 22, 0, 'subemp002', '', 'subemp002', 'subemp002', '9354005022', '0', 3, 20, '8', '2022-05-09', '', NULL, NULL, NULL, NULL, 33, NULL, 'subemp002 beta 2', NULL, NULL, '0000-00-00', NULL, 1, '2022-05-23 12:37:39', '2022-05-23 12:37:39'),
(21, 23, 0, 'emp05', '', 'emp05', 'emp05', '9354005024', NULL, 1, 1, '1', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', NULL, 1, '2022-05-23 12:57:32', '2022-05-24 06:36:01'),
(22, 24, 12, ' emp0011', '', 'subemp001', 'subemp001', '9354005029', '0', 1, 1, '1', '2022-05-23', '', NULL, NULL, NULL, NULL, 21, NULL, 'test001', NULL, NULL, '0000-00-00', NULL, 1, '2022-05-23 13:24:25', '2022-05-23 13:24:25'),
(23, 25, 0, 'emp06', '', 'emp06', 'emp06', '9354005021', NULL, 3, 19, '6,7', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', NULL, 1, '2022-05-24 06:29:47', '2022-05-24 06:51:16'),
(24, 27, 25, 'user002', '', 'user002', 'user002', '9354005020', '0', 0, 0, '7', '2022-05-24', 'http://develop.madyoasis.com/photos/91oAOCW5xfMj.pdf', '2022-05-16', '2022-05-31', NULL, NULL, 22, NULL, 'H-163,Sector-63,Noida', NULL, 2, '2022-05-24', NULL, 1, '2022-05-24 08:09:00', '2022-05-24 11:07:51'),
(25, 28, 25, 'user003', '', 'user003', 'user003', '9354005023', '0', 0, 0, '7', '2022-05-16', 'http://develop.madyoasis.com/photos/T8oFPfPIcCNv.pdf', '2022-05-16', '2022-05-16', NULL, NULL, 32, NULL, 'H-163,Sector-63,Noida', NULL, 0, '2022-05-24', NULL, 1, '2022-05-24 08:14:37', '2022-05-24 10:58:27'),
(26, 29, 25, 'user004', '', 'user004', 'user004', '9354005024', '0', 0, 0, '6', '2022-05-24', 'http://develop.madyoasis.com/photos/QCFQldZZlinE.pdf', '2022-05-31', '2022-05-31', NULL, NULL, 21, NULL, 'H-163,Sector-63,Noida', NULL, 0, '2022-05-24', NULL, 1, '2022-05-24 09:39:21', '2022-05-24 10:56:51'),
(27, 30, 0, 'hr001', '', 'hr001', 'hr001', '9354005021', NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', NULL, 1, '2022-05-24 09:57:05', '2022-05-24 09:57:05'),
(28, 31, 25, 'user005', '', 'user005', 'user005', '9354005029', '0', 0, 0, '6', '2022-05-17', 'http://develop.madyoasis.com/photos/pCe3nNKyTUyY.pdf', '2022-05-16', '2022-05-31', NULL, NULL, 31, NULL, 'H-163,Sector-63,Noida', NULL, 1, '2022-05-24', 30, 1, '2022-05-24 11:16:54', '2022-05-24 11:27:23');

-- --------------------------------------------------------

--
-- Table structure for table `employee_leaves`
--

CREATE TABLE `employee_leaves` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `leave_type_id` int(10) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 = Unapproved, 1 = Approved',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee_units`
--

CREATE TABLE `employee_units` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `emp_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee_uploads`
--

CREATE TABLE `employee_uploads` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `coordinator_id` int(10) UNSIGNED NOT NULL,
  `date` datetime NOT NULL,
  `message` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event_attendees`
--

CREATE TABLE `event_attendees` (
  `id` int(10) UNSIGNED NOT NULL,
  `event_id` int(10) UNSIGNED NOT NULL,
  `attendee_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `item` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `purchase_from` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_of_purchase` date NOT NULL,
  `amount` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `holidays`
--

CREATE TABLE `holidays` (
  `id` int(10) UNSIGNED NOT NULL,
  `occasion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `holiday_filenames`
--

CREATE TABLE `holiday_filenames` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leave_applies`
--

CREATE TABLE `leave_applies` (
  `id` int(10) UNSIGNED NOT NULL,
  `dateFrom` date NOT NULL,
  `dateTo` date NOT NULL,
  `reason` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leave_drafts`
--

CREATE TABLE `leave_drafts` (
  `id` int(10) UNSIGNED NOT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `leave_type_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leave_types`
--

CREATE TABLE `leave_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `leave_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `leave_types`
--

INSERT INTO `leave_types` (`id`, `leave_type`, `description`, `created_at`, `updated_at`) VALUES
(1, 'kkkj', 'kikkk', '2022-05-07 09:57:47', '2022-05-07 09:57:47');

-- --------------------------------------------------------

--
-- Table structure for table `leave_type_applies`
--

CREATE TABLE `leave_type_applies` (
  `id` int(10) UNSIGNED NOT NULL,
  `leave_type_id` int(10) UNSIGNED NOT NULL,
  `leave_apply_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leave_uploads`
--

CREATE TABLE `leave_uploads` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `seller_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `meetings`
--

CREATE TABLE `meetings` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `coordinator_id` int(10) UNSIGNED NOT NULL,
  `date` datetime NOT NULL,
  `message` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `meeting_attendees`
--

CREATE TABLE `meeting_attendees` (
  `id` int(10) UNSIGNED NOT NULL,
  `meeting_id` int(10) UNSIGNED NOT NULL,
  `attendee_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_04_08_104008_create_profiles_table', 1),
(4, '2016_04_21_111604_create_roles_table', 1),
(5, '2016_04_21_111832_create_user_roles_table', 1),
(6, '2016_04_27_115938_create_employees_table', 1),
(7, '2016_05_04_123920_create_leave_types_table', 1),
(8, '2016_05_06_060806_create_leave_applies_table', 1),
(9, '2016_05_06_063627_create_leave_type_applies_table', 1),
(10, '2016_05_13_065329_create_teams_table', 1),
(11, '2016_05_30_051327_create_attendance_filenames_table', 1),
(12, '2016_05_30_051629_create_leave_uploads_table', 1),
(13, '2016_06_02_072217_create_employee_uploads_table', 1),
(14, '2016_06_02_111416_create_assets_table', 1),
(15, '2016_06_02_123731_create_assign_assets_table', 1),
(16, '2016_06_30_085514_create_leave_drafts_table', 1),
(17, '2016_06_30_090733_create_employee_leaves_table', 1),
(18, '2016_08_11_164621_create_attendance_manager_table', 1),
(19, '2016_08_14_000122_alter_table_attendance_manager_add_one_field', 1),
(20, '2016_08_27_001608_create_holidays_table', 1),
(21, '2016_08_28_151111_create_events_table', 1),
(22, '2016_08_28_151431_create_event_attendees_table', 1),
(23, '2016_08_29_130810_create_holiday_filenames', 1),
(24, '2016_09_07_182031_create_meetings_table', 1),
(25, '2016_09_07_182538_create_meeting_attendees', 1),
(26, '2016_12_05_210112_create_expenses_table', 1),
(27, '2016_12_06_102039_create_awards_table', 1),
(28, '2016_12_06_111217_create_awardees_table', 1),
(29, '2016_12_06_161800_create_training_programs_table', 1),
(30, '2016_12_06_170605_create_training_invites_table', 1),
(31, '2016_12_07_162939_create_promotions_table', 1),
(32, '2017_04_25_144352_create_posts_table', 1),
(33, '2017_04_25_144545_create_post_replies_table', 1),
(34, '2017_04_27_123435_create_clients_table', 1),
(35, '2017_04_27_131835_create_projects_table', 1),
(36, '2017_09_15_223652_create_assign_projects_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` text COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_replies`
--

CREATE TABLE `post_replies` (
  `id` int(10) UNSIGNED NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dob` int(11) NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE `promotions` (
  `id` int(10) UNSIGNED NOT NULL,
  `emp_id` int(10) UNSIGNED NOT NULL,
  `old_designation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `new_designation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `old_salary` int(11) NOT NULL,
  `new_salary` int(11) NOT NULL,
  `date_of_promotion` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Has all the rights', '2022-05-07 04:05:08', '2022-05-07 04:05:08'),
(2, 'Employee', 'Company Employee', '2022-05-07 04:05:08', '2022-05-19 05:33:10'),
(3, 'Manager', 'Has all the rights', '2022-05-07 04:05:08', '2022-05-07 04:05:08'),
(4, 'super admin', 'super admin', '2022-05-23 09:59:26', '2022-05-23 09:59:33'),
(5, 'admin Quality check', 'hr admin', '2022-05-24 10:18:24', '2022-05-24 10:19:13');

-- --------------------------------------------------------

--
-- Table structure for table `siteinfos`
--

CREATE TABLE `siteinfos` (
  `id` int(10) UNSIGNED NOT NULL,
  `website_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile_no` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `siteinfos`
--

INSERT INTO `siteinfos` (`id`, `website_name`, `address`, `city`, `state`, `zip`, `email_id`, `mobile_no`, `logo`, `status`, `created_at`, `updated_at`) VALUES
(1, 'mChemist Global Pvt Ltd               ', 'I-90B, New, Block I, Lajpat Nagar II, Lajpat Nagar, New Delhi, Delhi 110029               ', 'noida g           ', 'Delhi   2            ', '110022              ', 'jmehta@akosmd1.com               ', '9354005029', 'http://develop.madyoasis.com/photos/ZUU9rYBaeVc6.jpg', 1, '2022-05-16 07:10:02', '2022-05-23 08:02:48');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `team_id` int(11) NOT NULL,
  `manager_id` int(10) UNSIGNED NOT NULL,
  `leader_id` int(10) UNSIGNED NOT NULL,
  `member_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `training_invites`
--

CREATE TABLE `training_invites` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `program_id` int(10) UNSIGNED NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `training_programs`
--

CREATE TABLE `training_programs` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `training_programs`
--

INSERT INTO `training_programs` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Mindstone Mavenxcc', 'Mindstone Mavenx cc', '2022-05-07 09:58:23', '2022-05-07 09:58:42'),
(2, 'jay here1', 'this is a tesing program ', '2022-05-07 09:59:02', '2022-05-07 09:59:12');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` int(11) NOT NULL,
  `unit_name` varchar(250) NOT NULL,
  `city_id` int(11) NOT NULL,
  `zone_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `unit_name`, `city_id`, `zone_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'test001', 1, 1, 1, '2022-05-12 11:11:31', '2022-05-12 11:11:31'),
(2, 'test002', 2, 2, 1, '2022-05-12 12:04:17', '2022-05-12 12:04:17'),
(4, 'ranchi university', 18, 3, 1, '2022-05-18 08:30:28', '2022-05-18 08:30:28'),
(5, 'gossner college', 18, 3, 1, '2022-05-18 08:30:43', '2022-05-18 08:30:43'),
(6, 'panta university', 19, 3, 1, '2022-05-18 08:30:57', '2022-05-18 08:30:57'),
(7, 'patna college', 19, 3, 1, '2022-05-18 08:31:08', '2022-05-18 08:31:08'),
(8, 'gla college', 20, 3, 1, '2022-05-18 08:31:19', '2022-05-18 08:31:19'),
(9, 'nilamber university', 18, 3, 1, '2022-05-18 08:42:31', '2022-05-18 08:42:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@madyoasis.com', '$2y$10$utnnk78teM99Kmh/QRqYEOiwTKePN3pVm5X9PqbFXeje6NV06zI0u', '8GkvL0m9e0iw7w1qNKrQ1zyg6kzez7i1dwO9dPntqLhbXxZf2LvXyvJrgUA6', NULL, '2022-05-16 12:25:12'),
(12, ' emp01', 'emp01@gmail.com', '', 'lJw4ydKiFwZ41xXmAFmRw6dcMsY3hpXsWarvA3bgWeOwnhxErKnvZ5uUG5t6', '2022-05-18 10:19:28', '2022-05-24 06:36:33'),
(13, 'emp02', 'emp02@gmail.com', '', '3m90kHhoUazk51QOBgVGyQU27WWxmVhwFKY8nIfpodyCkcj6mhuems5yKA8Z', '2022-05-18 11:48:41', '2022-05-23 13:27:36'),
(14, 'Raj', 'raj@test.com', '', NULL, '2022-05-18 11:50:25', '2022-05-24 06:36:22'),
(15, 'Raj', 'rajeeee@test.com', '$2y$10$UZSrMjDMd8elTPmE0h3meuNqs21vKCr9hReYvDdjmii3jjV5oIJRy', NULL, '2022-05-18 11:50:49', '2022-05-18 11:50:49'),
(16, 'emp03', 'emp03@gmail.com', '$2y$10$Iu7KSNH5DFlBZ178CUlUYuZZ7e23yL4lkoN.DG26/D5zrtevoFeyS', NULL, '2022-05-19 05:09:48', '2022-05-23 08:05:36'),
(17, 'emp04', 'emp04@gg.com   ', '$2y$10$UbtbOSpibisD3cLoKDkgPOS2LguwxX1wIJ1HUuVrcuBiFr5SH7DtG', NULL, '2022-05-19 05:56:09', '2022-05-19 07:03:53'),
(18, 'emp05 ', ' emp05@gmail.com    ', '$2y$10$6v4tCUhRyQUICCTzOie/Vuo3N1ypERA0HERV5aNaAsxWxeLykcKVS', NULL, '2022-05-19 07:05:02', '2022-05-19 07:08:49'),
(19, 'emp04', 'emp04@gmail.com', '', 'NSH2KjuxmqvbWAsNSZ6vr6hO4mpQ3L8QsBUFnjhFSlput4N5WCK915i44nTt', '2022-05-19 07:09:26', '2022-05-23 10:07:27'),
(20, 'admin1', 'admin1@admin1.com', '$2y$10$RNlptZvvBS0bcKhp/c1LNOUVzRufxSKPqW2hLwn.mU5pngcZt4LHC', NULL, '2022-05-20 08:11:57', '2022-05-20 08:11:57'),
(21, 'subemp001', 'subemp001@gmail.com', '$2y$10$ngsUizkvHUwHI6FJaqHJjOQWp.SoWLev4AcakBGfnTKp2MPOI.4wS', NULL, '2022-05-23 12:32:41', '2022-05-23 12:32:41'),
(22, 'subemp002', 'subemp002@gmail.com', '$2y$10$3iPsWcIHOtXsf7SFbJ.VQ.FGgOqTQFxnFqaH5cvWhuzh6tph1mPXK', NULL, '2022-05-23 12:37:39', '2022-05-23 12:37:39'),
(23, 'emp05', 'emp05@gmail.com', '', NULL, '2022-05-23 12:57:32', '2022-05-24 06:28:30'),
(24, 'subemp001', 'subemp_001@gmail.com', '$2y$10$quAba0VcBgOKCImaz2bIS.PRYZGo1Kj25hfh5R92Z.C7Up5fQUbRm', NULL, '2022-05-23 13:24:25', '2022-05-23 13:24:25'),
(25, 'emp06', 'emp06@gmail.com', '$2y$10$sAGFlhN3bTvxj01MA7zD1eF5nnHMRGq3t8/c58DKsQRXzhKrMxzEm', '3GYuKwkCLD9J5E00agfGunqHbL5EHvWYecbd8yFsipnjMk1NteWQqAKGvWmo', '2022-05-24 06:29:47', '2022-05-24 06:39:12'),
(26, 'user001', 'user001@gmail.com', '$2y$10$rdVKRZxqR4h8Owf6iXLb/.Rduuwbwqo/mTNl/feea0cWFPQOcm7Fy', NULL, '2022-05-24 08:05:50', '2022-05-24 08:05:50'),
(27, 'user002', 'user002@gmail.com', '$2y$10$khsuPK6Tu85S1hzONzFyLucU2yo/eTG36SIxgc1CVaCPmJoig0bJe', NULL, '2022-05-24 08:09:00', '2022-05-24 08:09:00'),
(28, 'user003', 'user003@gmail.com', '$2y$10$v2XYr.dz.NAQQllkjUxfqO2Q1EIAr0gue8b1bdRd91aKsFEgcpFGW', NULL, '2022-05-24 08:14:37', '2022-05-24 08:14:37'),
(29, 'user004', 'user004@user004.com', '$2y$10$QfCr5lcz4e3KIBEcp9evre3yXZsB1GYUk./JEDIUzJip0eXpMIrGm', NULL, '2022-05-24 09:39:21', '2022-05-24 09:39:21'),
(30, 'hr001', 'hr001@gmail.com', '$2y$10$VQCy9HUXyIVhXL9x59Uu2uOifSejRL/pB0lBq0uJEaQD8IKGxRsKa', NULL, '2022-05-24 09:57:05', '2022-05-24 09:57:05'),
(31, 'user005', 'user005@user005.con', '$2y$10$q9nyPoICQx5YOPt1AZhWiO0F9VxAZhMnFitAUBd8/otbVhrbX77ym', NULL, '2022-05-24 11:16:54', '2022-05-24 11:16:54');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2022-05-07 04:05:08', '2022-05-07 04:05:08'),
(9, 3, 12, '2022-05-18 10:19:28', '2022-05-18 10:19:28'),
(10, 3, 13, '2022-05-18 11:48:41', '2022-05-18 11:48:41'),
(11, 3, 14, '2022-05-18 11:50:25', '2022-05-18 11:50:25'),
(12, 3, 15, '2022-05-18 11:50:49', '2022-05-18 11:50:49'),
(13, 3, 16, '2022-05-19 05:09:48', '2022-05-19 05:09:48'),
(14, 2, 17, '2022-05-19 05:56:09', '2022-05-19 05:56:09'),
(15, 2, 18, '2022-05-19 07:05:02', '2022-05-19 07:05:02'),
(16, 3, 19, '2022-05-19 07:09:26', '2022-05-19 07:42:14'),
(17, 1, 20, '2022-05-20 08:11:57', '2022-05-20 08:11:57'),
(18, 2, 21, '2022-05-23 12:32:41', '2022-05-23 12:32:41'),
(19, 2, 22, '2022-05-23 12:37:39', '2022-05-23 12:37:39'),
(20, 3, 23, '2022-05-23 12:57:32', '2022-05-23 12:57:32'),
(21, 2, 24, '2022-05-23 13:24:25', '2022-05-23 13:24:25'),
(22, 3, 25, '2022-05-24 06:29:47', '2022-05-24 06:29:47'),
(23, 2, 27, '2022-05-24 08:09:00', '2022-05-24 08:09:00'),
(24, 2, 28, '2022-05-24 08:14:37', '2022-05-24 08:14:37'),
(25, 2, 29, '2022-05-24 09:39:21', '2022-05-24 09:39:21'),
(26, 5, 30, '2022-05-24 09:57:05', '2022-05-24 09:57:05'),
(27, 2, 31, '2022-05-24 11:16:54', '2022-05-24 11:16:54');

-- --------------------------------------------------------

--
-- Table structure for table `zones`
--

CREATE TABLE `zones` (
  `id` int(11) NOT NULL,
  `zone_name` varchar(250) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `zones`
--

INSERT INTO `zones` (`id`, `zone_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'South zone', 1, '2022-05-12 10:06:37', '2022-05-12 10:06:37'),
(2, 'north zone', 1, '2022-05-12 10:06:46', '2022-05-12 10:06:46'),
(3, 'East Zone', 1, '2022-05-18 08:28:28', '2022-05-18 08:28:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign_assets`
--
ALTER TABLE `assign_assets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assign_assets_user_id_foreign` (`user_id`),
  ADD KEY `assign_assets_asset_id_foreign` (`asset_id`),
  ADD KEY `assign_assets_authority_id_foreign` (`authority_id`);

--
-- Indexes for table `assign_projects`
--
ALTER TABLE `assign_projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assign_projects_user_id_foreign` (`user_id`),
  ADD KEY `assign_projects_project_id_foreign` (`project_id`),
  ADD KEY `assign_projects_authority_id_foreign` (`authority_id`);

--
-- Indexes for table `attendance_filenames`
--
ALTER TABLE `attendance_filenames`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance_managers`
--
ALTER TABLE `attendance_managers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attendance_managers_user_id_foreign` (`user_id`);

--
-- Indexes for table `awardees`
--
ALTER TABLE `awardees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `awardees_award_id_foreign` (`award_id`),
  ADD KEY `awardees_user_id_foreign` (`user_id`);

--
-- Indexes for table `awards`
--
ALTER TABLE `awards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employees_user_id_foreign` (`user_id`);

--
-- Indexes for table `employee_leaves`
--
ALTER TABLE `employee_leaves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_units`
--
ALTER TABLE `employee_units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_uploads`
--
ALTER TABLE `employee_uploads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `events_coordinator_id_foreign` (`coordinator_id`);

--
-- Indexes for table `event_attendees`
--
ALTER TABLE `event_attendees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_attendees_event_id_foreign` (`event_id`),
  ADD KEY `event_attendees_attendee_id_foreign` (`attendee_id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `expenses_user_id_foreign` (`user_id`);

--
-- Indexes for table `holidays`
--
ALTER TABLE `holidays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `holiday_filenames`
--
ALTER TABLE `holiday_filenames`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_applies`
--
ALTER TABLE `leave_applies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_drafts`
--
ALTER TABLE `leave_drafts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `leave_drafts_leave_type_id_foreign` (`leave_type_id`);

--
-- Indexes for table `leave_types`
--
ALTER TABLE `leave_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_type_applies`
--
ALTER TABLE `leave_type_applies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `leave_type_applies_leave_type_id_foreign` (`leave_type_id`),
  ADD KEY `leave_type_applies_leave_apply_id_foreign` (`leave_apply_id`);

--
-- Indexes for table `leave_uploads`
--
ALTER TABLE `leave_uploads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meetings`
--
ALTER TABLE `meetings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `meetings_coordinator_id_foreign` (`coordinator_id`);

--
-- Indexes for table `meeting_attendees`
--
ALTER TABLE `meeting_attendees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `meeting_attendees_meeting_id_foreign` (`meeting_id`),
  ADD KEY `meeting_attendees_attendee_id_foreign` (`attendee_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Indexes for table `post_replies`
--
ALTER TABLE `post_replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_replies_user_id_foreign` (`user_id`),
  ADD KEY `post_replies_post_id_foreign` (`post_id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projects_client_id_foreign` (`client_id`);

--
-- Indexes for table `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `promotions_emp_id_foreign` (`emp_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siteinfos`
--
ALTER TABLE `siteinfos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teams_manager_id_foreign` (`manager_id`),
  ADD KEY `teams_leader_id_foreign` (`leader_id`),
  ADD KEY `teams_member_id_foreign` (`member_id`);

--
-- Indexes for table `training_invites`
--
ALTER TABLE `training_invites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `training_invites_program_id_foreign` (`program_id`),
  ADD KEY `training_invites_user_id_foreign` (`user_id`);

--
-- Indexes for table `training_programs`
--
ALTER TABLE `training_programs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_roles_role_id_foreign` (`role_id`),
  ADD KEY `user_roles_user_id_foreign` (`user_id`);

--
-- Indexes for table `zones`
--
ALTER TABLE `zones`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assign_assets`
--
ALTER TABLE `assign_assets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assign_projects`
--
ALTER TABLE `assign_projects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attendance_filenames`
--
ALTER TABLE `attendance_filenames`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attendance_managers`
--
ALTER TABLE `attendance_managers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `awardees`
--
ALTER TABLE `awardees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `awards`
--
ALTER TABLE `awards`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `employee_leaves`
--
ALTER TABLE `employee_leaves`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee_units`
--
ALTER TABLE `employee_units`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee_uploads`
--
ALTER TABLE `employee_uploads`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event_attendees`
--
ALTER TABLE `event_attendees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `holidays`
--
ALTER TABLE `holidays`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `holiday_filenames`
--
ALTER TABLE `holiday_filenames`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leave_applies`
--
ALTER TABLE `leave_applies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leave_drafts`
--
ALTER TABLE `leave_drafts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leave_types`
--
ALTER TABLE `leave_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `leave_type_applies`
--
ALTER TABLE `leave_type_applies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leave_uploads`
--
ALTER TABLE `leave_uploads`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `meetings`
--
ALTER TABLE `meetings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `meeting_attendees`
--
ALTER TABLE `meeting_attendees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post_replies`
--
ALTER TABLE `post_replies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `promotions`
--
ALTER TABLE `promotions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `siteinfos`
--
ALTER TABLE `siteinfos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `training_invites`
--
ALTER TABLE `training_invites`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `training_programs`
--
ALTER TABLE `training_programs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `zones`
--
ALTER TABLE `zones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assign_assets`
--
ALTER TABLE `assign_assets`
  ADD CONSTRAINT `assign_assets_asset_id_foreign` FOREIGN KEY (`asset_id`) REFERENCES `assets` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `assign_assets_authority_id_foreign` FOREIGN KEY (`authority_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `assign_assets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `assign_projects`
--
ALTER TABLE `assign_projects`
  ADD CONSTRAINT `assign_projects_authority_id_foreign` FOREIGN KEY (`authority_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `assign_projects_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `assign_projects_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `attendance_managers`
--
ALTER TABLE `attendance_managers`
  ADD CONSTRAINT `attendance_managers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `awardees`
--
ALTER TABLE `awardees`
  ADD CONSTRAINT `awardees_award_id_foreign` FOREIGN KEY (`award_id`) REFERENCES `awards` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `awardees_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `employee_leaves`
--
ALTER TABLE `employee_leaves`
  ADD CONSTRAINT `employee_leaves_leave_type_id_foreign` FOREIGN KEY (`leave_type_id`) REFERENCES `leave_types` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `employee_leaves_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_coordinator_id_foreign` FOREIGN KEY (`coordinator_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `event_attendees`
--
ALTER TABLE `event_attendees`
  ADD CONSTRAINT `event_attendees_attendee_id_foreign` FOREIGN KEY (`attendee_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `event_attendees_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `expenses`
--
ALTER TABLE `expenses`
  ADD CONSTRAINT `expenses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `leave_drafts`
--
ALTER TABLE `leave_drafts`
  ADD CONSTRAINT `leave_drafts_leave_type_id_foreign` FOREIGN KEY (`leave_type_id`) REFERENCES `leave_types` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `leave_type_applies`
--
ALTER TABLE `leave_type_applies`
  ADD CONSTRAINT `leave_type_applies_leave_apply_id_foreign` FOREIGN KEY (`leave_apply_id`) REFERENCES `leave_applies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `leave_type_applies_leave_type_id_foreign` FOREIGN KEY (`leave_type_id`) REFERENCES `leave_types` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `meetings`
--
ALTER TABLE `meetings`
  ADD CONSTRAINT `meetings_coordinator_id_foreign` FOREIGN KEY (`coordinator_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `meeting_attendees`
--
ALTER TABLE `meeting_attendees`
  ADD CONSTRAINT `meeting_attendees_attendee_id_foreign` FOREIGN KEY (`attendee_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `meeting_attendees_meeting_id_foreign` FOREIGN KEY (`meeting_id`) REFERENCES `meetings` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `post_replies`
--
ALTER TABLE `post_replies`
  ADD CONSTRAINT `post_replies_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `post_replies_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `promotions`
--
ALTER TABLE `promotions`
  ADD CONSTRAINT `promotions_emp_id_foreign` FOREIGN KEY (`emp_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `teams`
--
ALTER TABLE `teams`
  ADD CONSTRAINT `teams_leader_id_foreign` FOREIGN KEY (`leader_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `teams_manager_id_foreign` FOREIGN KEY (`manager_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `teams_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `training_invites`
--
ALTER TABLE `training_invites`
  ADD CONSTRAINT `training_invites_program_id_foreign` FOREIGN KEY (`program_id`) REFERENCES `training_programs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `training_invites_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
