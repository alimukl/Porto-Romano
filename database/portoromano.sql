-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2025 at 02:55 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portoromano`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `log_name` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `subject_type` varchar(255) DEFAULT NULL,
  `event` varchar(255) DEFAULT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `causer_type` varchar(255) DEFAULT NULL,
  `causer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`properties`)),
  `batch_uuid` char(36) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_type`, `event`, `subject_id`, `causer_type`, `causer_id`, `properties`, `batch_uuid`, `created_at`, `updated_at`) VALUES
(457, 'default', 'User MUHAMMAD ALIM UKAIL logged out.', NULL, 'logout', NULL, 'App\\Models\\User', 40, '[]', NULL, '2025-03-23 17:59:04', '2025-03-23 17:59:04'),
(458, 'default', 'User successfully logged in after MFA verification', NULL, 'login', NULL, 'App\\Models\\User', 40, '[]', NULL, '2025-03-23 17:59:28', '2025-03-23 17:59:28'),
(459, 'leave_request', 'Leave request for User ID 40 has been created', 'App\\Models\\LeaveRequest', 'created', 88, 'App\\Models\\User', 40, '{\"attributes\":{\"user_id\":40,\"category\":\"Study Leave\",\"leave_date_start\":\"2025-03-25\",\"leave_date_end\":\"2025-03-26\",\"days\":2,\"status\":\"pending\",\"mc_pdf\":null}}', NULL, '2025-03-23 18:01:08', '2025-03-23 18:01:08'),
(460, 'leave_request', 'Leave request for User ID 89 has been created', 'App\\Models\\LeaveRequest', 'created', 89, 'App\\Models\\User', 40, '{\"attributes\":{\"user_id\":89,\"category\":\"Compassionate\\/Bereavement Leave\",\"leave_date_start\":\"2025-03-26\",\"leave_date_end\":\"2025-03-27\",\"days\":2,\"status\":\"pending\",\"mc_pdf\":null}}', NULL, '2025-03-23 18:13:00', '2025-03-23 18:13:00'),
(461, 'leave_request', 'Leave request for User ID 93 has been created', 'App\\Models\\LeaveRequest', 'created', 90, 'App\\Models\\User', 40, '{\"attributes\":{\"user_id\":93,\"category\":\"Maternity Leave\",\"leave_date_start\":\"2025-03-25\",\"leave_date_end\":\"2025-03-26\",\"days\":2,\"status\":\"pending\",\"mc_pdf\":\"mc_pdfs\\/1moJmBDrLhsCpeufLYIj8dnrFjnmJWJK8291JERJ.pdf\"}}', NULL, '2025-03-23 18:13:15', '2025-03-23 18:13:15'),
(462, 'leave_request', 'Leave request for User ID 94 has been created', 'App\\Models\\LeaveRequest', 'created', 91, 'App\\Models\\User', 40, '{\"attributes\":{\"user_id\":94,\"category\":\"Emergency Leave\",\"leave_date_start\":\"2025-03-27\",\"leave_date_end\":\"2025-03-29\",\"days\":3,\"status\":\"pending\",\"mc_pdf\":null}}', NULL, '2025-03-23 18:13:42', '2025-03-23 18:13:42'),
(463, 'user', 'User SOE MIN has been updated', 'App\\Models\\User', 'updated', 89, 'App\\Models\\User', 40, '{\"attributes\":{\"annual_leave_quota\":14},\"old\":{\"annual_leave_quota\":16}}', NULL, '2025-03-23 18:19:16', '2025-03-23 18:19:16'),
(464, 'leave_request', 'Leave request for User ID 89 has been updated', 'App\\Models\\LeaveRequest', 'updated', 89, 'App\\Models\\User', 40, '{\"attributes\":{\"status\":\"approved\"},\"old\":{\"status\":\"pending\"}}', NULL, '2025-03-23 18:19:16', '2025-03-23 18:19:16'),
(465, 'leave_request', 'Leave request for User ID 93 has been updated', 'App\\Models\\LeaveRequest', 'updated', 90, 'App\\Models\\User', 40, '{\"attributes\":{\"status\":\"rejected\"},\"old\":{\"status\":\"pending\"}}', NULL, '2025-03-23 18:19:21', '2025-03-23 18:19:21'),
(466, 'user', 'User MUHAMMAD ALIM UKAIL has been updated', 'App\\Models\\User', 'updated', 40, 'App\\Models\\User', 40, '{\"attributes\":{\"annual_leave_quota\":10},\"old\":{\"annual_leave_quota\":12}}', NULL, '2025-03-23 18:19:24', '2025-03-23 18:19:24'),
(467, 'leave_request', 'Leave request for User ID 40 has been updated', 'App\\Models\\LeaveRequest', 'updated', 88, 'App\\Models\\User', 40, '{\"attributes\":{\"status\":\"approved\"},\"old\":{\"status\":\"pending\"}}', NULL, '2025-03-23 18:19:24', '2025-03-23 18:19:24'),
(468, 'user', 'User Muhammad Alim has been created', 'App\\Models\\User', 'created', 96, 'App\\Models\\User', 40, '{\"attributes\":{\"name\":\"Muhammad Alim\",\"email\":\"alimukailfortnite@gmail.com\",\"job_position\":\"Waiters\",\"annual_leave_quota\":12,\"profile_photo\":null,\"age\":24,\"passport_number\":\"MI595163\",\"employment_pass\":\"EP54321\",\"address\":\"No 18 Jalan Taman Bakti , Damai Impian\",\"phone\":\"010-227-3242\"}}', NULL, '2025-03-23 18:23:43', '2025-03-23 18:23:43'),
(469, 'user', 'User Muhammad Alim has been updated', 'App\\Models\\User', 'updated', 96, 'App\\Models\\User', 40, '{\"attributes\":{\"profile_photo\":\"profile_photos\\/67e051d2cb9ca.jpg\"},\"old\":{\"profile_photo\":null}}', NULL, '2025-03-23 18:24:18', '2025-03-23 18:24:18'),
(470, 'user', 'User Muhammad Alim has been updated', 'App\\Models\\User', 'updated', 96, 'App\\Models\\User', 40, '{\"attributes\":{\"annual_leave_quota\":16,\"profile_photo\":\"profile_photos\\/67e051ef10acb.jpg\"},\"old\":{\"annual_leave_quota\":12,\"profile_photo\":\"profile_photos\\/67e051d2cb9ca.jpg\"}}', NULL, '2025-03-23 18:24:47', '2025-03-23 18:24:47'),
(471, 'default', 'User successfully logged in after MFA verification', NULL, 'login', NULL, 'App\\Models\\User', 96, '[]', NULL, '2025-03-23 18:25:52', '2025-03-23 18:25:52'),
(472, 'leave_request', 'Leave request for User ID 96 has been created', 'App\\Models\\LeaveRequest', 'created', 92, 'App\\Models\\User', 96, '{\"attributes\":{\"user_id\":96,\"category\":\"Maternity Leave\",\"leave_date_start\":\"2025-03-25\",\"leave_date_end\":\"2025-03-26\",\"days\":2,\"status\":\"pending\",\"mc_pdf\":\"mc_pdfs\\/spQaX9nqV9e9WwVhETkoBb6NmNk4IganqgdytX3P.pdf\"}}', NULL, '2025-03-23 18:29:55', '2025-03-23 18:29:55'),
(473, 'user', 'User MUHAMMAD ALIM UKAIL has been updated', 'App\\Models\\User', 'updated', 40, NULL, NULL, '{\"attributes\":{\"annual_leave_quota\":12},\"old\":{\"annual_leave_quota\":10}}', NULL, '2025-03-25 04:00:51', '2025-03-25 04:00:51'),
(474, 'default', 'User successfully logged in after MFA verification', NULL, 'login', NULL, 'App\\Models\\User', 40, '[]', NULL, '2025-03-25 04:01:08', '2025-03-25 04:01:08'),
(475, 'leave_request', 'Leave request for User ID 40 has been created', 'App\\Models\\LeaveRequest', 'created', 93, 'App\\Models\\User', 40, '{\"attributes\":{\"user_id\":40,\"category\":\"Sick Leave\",\"leave_date_start\":\"2025-03-26\",\"leave_date_end\":\"2025-03-27\",\"days\":2,\"status\":\"pending\",\"mc_pdf\":null}}', NULL, '2025-03-25 04:18:05', '2025-03-25 04:18:05'),
(476, 'user', 'User MUHAMMAD ALIM UKAIL has been updated', 'App\\Models\\User', 'updated', 40, 'App\\Models\\User', 40, '{\"attributes\":[],\"old\":[]}', NULL, '2025-03-25 04:19:22', '2025-03-25 04:19:22'),
(477, 'leave_request', 'Leave request for User ID 40 has been updated', 'App\\Models\\LeaveRequest', 'updated', 93, 'App\\Models\\User', 40, '{\"attributes\":{\"status\":\"approved\"},\"old\":{\"status\":\"pending\"}}', NULL, '2025-03-25 04:19:22', '2025-03-25 04:19:22'),
(478, 'leave_request', 'Leave request for User ID 40 has been created', 'App\\Models\\LeaveRequest', 'created', 94, 'App\\Models\\User', 40, '{\"attributes\":{\"user_id\":40,\"category\":\"Annual Leave\",\"leave_date_start\":\"2025-03-26\",\"leave_date_end\":\"2025-03-27\",\"days\":2,\"status\":\"pending\",\"mc_pdf\":null}}', NULL, '2025-03-25 04:19:58', '2025-03-25 04:19:58'),
(479, 'user', 'User MUHAMMAD ALIM UKAIL has been updated', 'App\\Models\\User', 'updated', 40, 'App\\Models\\User', 40, '{\"attributes\":{\"annual_leave_quota\":10},\"old\":{\"annual_leave_quota\":12}}', NULL, '2025-03-25 04:20:01', '2025-03-25 04:20:01'),
(480, 'leave_request', 'Leave request for User ID 40 has been updated', 'App\\Models\\LeaveRequest', 'updated', 94, 'App\\Models\\User', 40, '{\"attributes\":{\"status\":\"approved\"},\"old\":{\"status\":\"pending\"}}', NULL, '2025-03-25 04:20:01', '2025-03-25 04:20:01'),
(481, 'user', 'User Alim ukailtestesteststste has been created', 'App\\Models\\User', 'created', 97, 'App\\Models\\User', 40, '{\"attributes\":{\"name\":\"Alim ukailtestesteststste\",\"email\":\"alimukail994333@gmail.com\",\"job_position\":\"Manager\",\"annual_leave_quota\":16,\"profile_photo\":null,\"age\":43,\"passport_number\":\"2424242\",\"employment_pass\":\"42342424\",\"address\":\"NO15 JALAN DAMAI IMPAIN 1\",\"phone\":\"010-227-3242\"}}', NULL, '2025-03-25 04:39:27', '2025-03-25 04:39:27'),
(482, 'leave_request', 'Leave request for User ID 40 has been created', 'App\\Models\\LeaveRequest', 'created', 95, 'App\\Models\\User', 40, '{\"attributes\":{\"user_id\":40,\"category\":\"Annual Leave\",\"leave_date_start\":\"2025-03-26\",\"leave_date_end\":\"2025-03-27\",\"days\":2,\"status\":\"pending\",\"mc_pdf\":null}}', NULL, '2025-03-25 04:59:51', '2025-03-25 04:59:51'),
(483, 'user', 'User MUHAMMAD ALIM UKAIL has been updated', 'App\\Models\\User', 'updated', 40, 'App\\Models\\User', 40, '{\"attributes\":{\"annual_leave_quota\":8},\"old\":{\"annual_leave_quota\":10}}', NULL, '2025-03-25 04:59:58', '2025-03-25 04:59:58'),
(484, 'leave_request', 'Leave request for User ID 40 has been updated', 'App\\Models\\LeaveRequest', 'updated', 95, 'App\\Models\\User', 40, '{\"attributes\":{\"status\":\"approved\"},\"old\":{\"status\":\"pending\"}}', NULL, '2025-03-25 04:59:58', '2025-03-25 04:59:58'),
(485, 'leave_request', 'Leave request for User ID 40 has been created', 'App\\Models\\LeaveRequest', 'created', 96, 'App\\Models\\User', 40, '{\"attributes\":{\"user_id\":40,\"category\":\"Annual Leave\",\"leave_date_start\":\"2025-03-26\",\"leave_date_end\":\"2025-04-03\",\"days\":9,\"status\":\"pending\",\"mc_pdf\":null}}', NULL, '2025-03-25 05:06:08', '2025-03-25 05:06:08'),
(486, 'leave_request', 'Leave request for User ID 40 has been updated', 'App\\Models\\LeaveRequest', 'updated', 96, 'App\\Models\\User', 40, '{\"attributes\":{\"status\":\"rejected\"},\"old\":{\"status\":\"pending\"}}', NULL, '2025-03-25 05:06:22', '2025-03-25 05:06:22'),
(487, 'leave_request', 'Leave request for User ID 40 has been created', 'App\\Models\\LeaveRequest', 'created', 97, 'App\\Models\\User', 40, '{\"attributes\":{\"user_id\":40,\"category\":\"Annual Leave\",\"leave_date_start\":\"2025-03-26\",\"leave_date_end\":\"2025-04-04\",\"days\":10,\"status\":\"pending\",\"mc_pdf\":null}}', NULL, '2025-03-25 05:07:41', '2025-03-25 05:07:41'),
(488, 'leave_request', 'Leave request for User ID 40 has been updated', 'App\\Models\\LeaveRequest', 'updated', 97, 'App\\Models\\User', 40, '{\"attributes\":{\"status\":\"rejected\"},\"old\":{\"status\":\"pending\"}}', NULL, '2025-03-25 05:09:54', '2025-03-25 05:09:54'),
(489, 'leave_request', 'Leave request for User ID 40 has been created', 'App\\Models\\LeaveRequest', 'created', 98, 'App\\Models\\User', 40, '{\"attributes\":{\"user_id\":40,\"category\":\"Paternity Leave\",\"leave_date_start\":\"2025-03-26\",\"leave_date_end\":\"2025-04-01\",\"days\":7,\"status\":\"pending\",\"mc_pdf\":null}}', NULL, '2025-03-25 05:10:14', '2025-03-25 05:10:14'),
(490, 'user', 'User MUHAMMAD ALIM UKAIL has been updated', 'App\\Models\\User', 'updated', 40, 'App\\Models\\User', 40, '{\"attributes\":[],\"old\":[]}', NULL, '2025-03-25 05:10:22', '2025-03-25 05:10:22'),
(491, 'leave_request', 'Leave request for User ID 40 has been updated', 'App\\Models\\LeaveRequest', 'updated', 98, 'App\\Models\\User', 40, '{\"attributes\":{\"status\":\"approved\"},\"old\":{\"status\":\"pending\"}}', NULL, '2025-03-25 05:10:22', '2025-03-25 05:10:22'),
(492, 'leave_request', 'Leave request for User ID 40 has been created', 'App\\Models\\LeaveRequest', 'created', 99, 'App\\Models\\User', 40, '{\"attributes\":{\"user_id\":40,\"category\":\"Paternity Leave\",\"leave_date_start\":\"2025-03-26\",\"leave_date_end\":\"2025-03-27\",\"days\":2,\"status\":\"pending\",\"mc_pdf\":null}}', NULL, '2025-03-25 05:10:33', '2025-03-25 05:10:33'),
(493, 'leave_request', 'Leave request for User ID 40 has been created', 'App\\Models\\LeaveRequest', 'created', 100, 'App\\Models\\User', 40, '{\"attributes\":{\"user_id\":40,\"category\":\"Annual Leave\",\"leave_date_start\":\"2025-03-26\",\"leave_date_end\":\"2025-03-31\",\"days\":6,\"status\":\"pending\",\"mc_pdf\":null}}', NULL, '2025-03-25 05:10:47', '2025-03-25 05:10:47'),
(494, 'user', 'User MUHAMMAD ALIM UKAIL has been updated', 'App\\Models\\User', 'updated', 40, 'App\\Models\\User', 40, '{\"attributes\":{\"annual_leave_quota\":2},\"old\":{\"annual_leave_quota\":8}}', NULL, '2025-03-25 05:10:51', '2025-03-25 05:10:51'),
(495, 'leave_request', 'Leave request for User ID 40 has been updated', 'App\\Models\\LeaveRequest', 'updated', 100, 'App\\Models\\User', 40, '{\"attributes\":{\"status\":\"approved\"},\"old\":{\"status\":\"pending\"}}', NULL, '2025-03-25 05:10:51', '2025-03-25 05:10:51'),
(496, 'leave_request', 'Leave request for User ID 40 has been created', 'App\\Models\\LeaveRequest', 'created', 101, 'App\\Models\\User', 40, '{\"attributes\":{\"user_id\":40,\"category\":\"Annual Leave\",\"leave_date_start\":\"2025-03-26\",\"leave_date_end\":\"2025-03-27\",\"days\":2,\"status\":\"pending\",\"mc_pdf\":null}}', NULL, '2025-03-25 05:11:05', '2025-03-25 05:11:05'),
(497, 'user', 'User MUHAMMAD ALIM UKAIL has been updated', 'App\\Models\\User', 'updated', 40, 'App\\Models\\User', 40, '{\"attributes\":{\"annual_leave_quota\":0},\"old\":{\"annual_leave_quota\":2}}', NULL, '2025-03-25 05:11:08', '2025-03-25 05:11:08'),
(498, 'leave_request', 'Leave request for User ID 40 has been updated', 'App\\Models\\LeaveRequest', 'updated', 101, 'App\\Models\\User', 40, '{\"attributes\":{\"status\":\"approved\"},\"old\":{\"status\":\"pending\"}}', NULL, '2025-03-25 05:11:08', '2025-03-25 05:11:08'),
(499, 'leave_request', 'Leave request for User ID 40 has been created', 'App\\Models\\LeaveRequest', 'created', 102, 'App\\Models\\User', 40, '{\"attributes\":{\"user_id\":40,\"category\":\"Annual Leave\",\"leave_date_start\":\"2025-03-26\",\"leave_date_end\":\"2025-03-27\",\"days\":2,\"status\":\"pending\",\"mc_pdf\":null}}', NULL, '2025-03-25 05:11:16', '2025-03-25 05:11:16'),
(500, 'leave_request', 'Leave request for User ID 40 has been created', 'App\\Models\\LeaveRequest', 'created', 103, 'App\\Models\\User', 40, '{\"attributes\":{\"user_id\":40,\"category\":\"Annual Leave\",\"leave_date_start\":\"2025-03-26\",\"leave_date_end\":\"2025-03-27\",\"days\":2,\"status\":\"pending\",\"mc_pdf\":null}}', NULL, '2025-03-25 05:19:12', '2025-03-25 05:19:12'),
(501, 'leave_request', 'Leave request for User ID 40 has been created', 'App\\Models\\LeaveRequest', 'created', 104, 'App\\Models\\User', 40, '{\"attributes\":{\"user_id\":40,\"category\":\"Sick Leave\",\"leave_date_start\":\"2025-03-26\",\"leave_date_end\":\"2025-04-02\",\"days\":8,\"status\":\"pending\",\"mc_pdf\":null}}', NULL, '2025-03-25 05:20:50', '2025-03-25 05:20:50'),
(502, 'user', 'User MUHAMMAD ALIM UKAIL has been updated', 'App\\Models\\User', 'updated', 40, 'App\\Models\\User', 40, '{\"attributes\":[],\"old\":[]}', NULL, '2025-03-25 05:20:54', '2025-03-25 05:20:54'),
(503, 'leave_request', 'Leave request for User ID 40 has been updated', 'App\\Models\\LeaveRequest', 'updated', 104, 'App\\Models\\User', 40, '{\"attributes\":{\"status\":\"approved\"},\"old\":{\"status\":\"pending\"}}', NULL, '2025-03-25 05:20:54', '2025-03-25 05:20:54'),
(504, 'leave_request', 'Leave request for User ID 40 has been created', 'App\\Models\\LeaveRequest', 'created', 105, 'App\\Models\\User', 40, '{\"attributes\":{\"user_id\":40,\"category\":\"Paternity Leave\",\"leave_date_start\":\"2025-03-26\",\"leave_date_end\":\"2025-03-27\",\"days\":2,\"status\":\"pending\",\"mc_pdf\":null}}', NULL, '2025-03-25 05:21:06', '2025-03-25 05:21:06'),
(505, 'leave_request', 'Leave request for User ID 40 has been created', 'App\\Models\\LeaveRequest', 'created', 106, 'App\\Models\\User', 40, '{\"attributes\":{\"user_id\":40,\"category\":\"Paternity Leave\",\"leave_date_start\":\"2025-03-26\",\"leave_date_end\":\"2025-03-28\",\"days\":3,\"status\":\"pending\",\"mc_pdf\":null}}', NULL, '2025-03-25 05:22:43', '2025-03-25 05:22:43'),
(506, 'leave_request', 'Leave request for User ID 40 has been created', 'App\\Models\\LeaveRequest', 'created', 107, 'App\\Models\\User', 40, '{\"attributes\":{\"user_id\":40,\"category\":\"Paternity Leave\",\"leave_date_start\":\"2025-03-26\",\"leave_date_end\":\"2025-03-27\",\"days\":2,\"status\":\"pending\",\"mc_pdf\":null}}', NULL, '2025-03-25 05:27:18', '2025-03-25 05:27:18'),
(507, 'leave_request', 'Leave request for User ID 40 has been created', 'App\\Models\\LeaveRequest', 'created', 108, 'App\\Models\\User', 40, '{\"attributes\":{\"user_id\":40,\"category\":\"Unpaid Leave\",\"leave_date_start\":\"2025-03-26\",\"leave_date_end\":\"2025-03-27\",\"days\":2,\"status\":\"pending\",\"mc_pdf\":null}}', NULL, '2025-03-25 05:28:30', '2025-03-25 05:28:30'),
(508, 'leave_request', 'Leave request for User ID 40 has been updated', 'App\\Models\\LeaveRequest', 'updated', 108, 'App\\Models\\User', 40, '{\"attributes\":{\"status\":\"approved\"},\"old\":{\"status\":\"pending\"}}', NULL, '2025-03-25 05:29:06', '2025-03-25 05:29:06'),
(509, 'leave_request', 'Leave request for User ID 40 has been created', 'App\\Models\\LeaveRequest', 'created', 109, 'App\\Models\\User', 40, '{\"attributes\":{\"user_id\":40,\"category\":\"Sick Leave\",\"leave_date_start\":\"2025-03-26\",\"leave_date_end\":\"2025-03-27\",\"days\":2,\"status\":\"pending\",\"mc_pdf\":null}}', NULL, '2025-03-25 05:35:00', '2025-03-25 05:35:00'),
(510, 'user', 'User MUHAMMAD ALIM UKAIL has been updated', 'App\\Models\\User', 'updated', 40, 'App\\Models\\User', 40, '{\"attributes\":[],\"old\":[]}', NULL, '2025-03-25 05:35:22', '2025-03-25 05:35:22'),
(511, 'leave_request', 'Leave request for User ID 40 has been updated', 'App\\Models\\LeaveRequest', 'updated', 109, 'App\\Models\\User', 40, '{\"attributes\":{\"status\":\"approved\"},\"old\":{\"status\":\"pending\"}}', NULL, '2025-03-25 05:35:22', '2025-03-25 05:35:22'),
(512, 'leave_request', 'Leave request for User ID 40 has been created', 'App\\Models\\LeaveRequest', 'created', 110, 'App\\Models\\User', 40, '{\"attributes\":{\"user_id\":40,\"category\":\"Unpaid Leave\",\"leave_date_start\":\"2025-03-26\",\"leave_date_end\":\"2025-03-27\",\"days\":2,\"status\":\"pending\",\"mc_pdf\":null}}', NULL, '2025-03-25 05:38:00', '2025-03-25 05:38:00'),
(513, 'leave_request', 'Leave request for User ID 40 has been updated', 'App\\Models\\LeaveRequest', 'updated', 110, 'App\\Models\\User', 40, '{\"attributes\":{\"status\":\"approved\"},\"old\":{\"status\":\"pending\"}}', NULL, '2025-03-25 05:38:05', '2025-03-25 05:38:05'),
(514, 'leave_request', 'Leave request for User ID 40 has been created', 'App\\Models\\LeaveRequest', 'created', 111, 'App\\Models\\User', 40, '{\"attributes\":{\"user_id\":40,\"category\":\"Paternity Leave\",\"leave_date_start\":\"2025-03-26\",\"leave_date_end\":\"2025-03-26\",\"days\":1,\"status\":\"pending\",\"mc_pdf\":null}}', NULL, '2025-03-25 05:40:45', '2025-03-25 05:40:45'),
(515, 'leave_request', 'Leave request for User ID 40 has been created', 'App\\Models\\LeaveRequest', 'created', 112, 'App\\Models\\User', 40, '{\"attributes\":{\"user_id\":40,\"category\":\"Maternity Leave\",\"leave_date_start\":\"2025-03-26\",\"leave_date_end\":\"2025-03-28\",\"days\":3,\"status\":\"pending\",\"mc_pdf\":null}}', NULL, '2025-03-25 05:50:51', '2025-03-25 05:50:51'),
(516, 'leave_request', 'Leave request for User ID 40 has been created', 'App\\Models\\LeaveRequest', 'created', 113, 'App\\Models\\User', 40, '{\"attributes\":{\"user_id\":40,\"category\":\"Unpaid Leave\",\"leave_date_start\":\"2025-03-26\",\"leave_date_end\":\"2025-03-28\",\"days\":3,\"status\":\"pending\",\"mc_pdf\":null}}', NULL, '2025-03-25 05:51:16', '2025-03-25 05:51:16'),
(517, 'default', 'User successfully logged in after MFA verification', NULL, 'login', NULL, 'App\\Models\\User', 96, '[]', NULL, '2025-03-25 07:05:13', '2025-03-25 07:05:13'),
(518, 'user', 'User MUHAMMAD ALIM UKAIL has been updated', 'App\\Models\\User', 'updated', 40, NULL, NULL, '{\"attributes\":{\"annual_leave_quota\":12},\"old\":{\"annual_leave_quota\":0}}', NULL, '2025-04-05 11:11:19', '2025-04-05 11:11:19'),
(519, 'default', 'User successfully logged in after MFA verification', NULL, 'login', NULL, 'App\\Models\\User', 40, '[]', NULL, '2025-04-05 11:11:51', '2025-04-05 11:11:51'),
(520, 'default', 'User MUHAMMAD ALIM UKAIL logged out.', NULL, 'logout', NULL, 'App\\Models\\User', 40, '[]', NULL, '2025-04-05 12:30:17', '2025-04-05 12:30:17'),
(521, 'default', 'User successfully logged in after MFA verification', NULL, 'login', NULL, 'App\\Models\\User', 40, '[]', NULL, '2025-04-05 12:31:19', '2025-04-05 12:31:19'),
(522, 'default', 'User successfully logged in after MFA verification', NULL, 'login', NULL, 'App\\Models\\User', 40, '[]', NULL, '2025-04-06 14:08:38', '2025-04-06 14:08:38'),
(523, 'default', 'User successfully logged in after MFA verification', NULL, 'login', NULL, 'App\\Models\\User', 96, '[]', NULL, '2025-04-06 14:29:55', '2025-04-06 14:29:55'),
(524, 'leave_request', 'Leave request for User ID 96 has been created', 'App\\Models\\LeaveRequest', 'created', 114, 'App\\Models\\User', 96, '{\"attributes\":{\"user_id\":96,\"category\":\"Emergency Leave\",\"leave_date_start\":\"2025-04-07\",\"leave_date_end\":\"2025-04-11\",\"days\":5,\"status\":\"pending\",\"mc_pdf\":null}}', NULL, '2025-04-06 14:47:58', '2025-04-06 14:47:58'),
(525, 'user', 'User Muhammad Alim has been updated', 'App\\Models\\User', 'updated', 96, 'App\\Models\\User', 40, '{\"attributes\":[],\"old\":[]}', NULL, '2025-04-06 14:48:12', '2025-04-06 14:48:12'),
(526, 'leave_request', 'Leave request for User ID 96 has been updated', 'App\\Models\\LeaveRequest', 'updated', 114, 'App\\Models\\User', 40, '{\"attributes\":{\"status\":\"approved\"},\"old\":{\"status\":\"pending\"}}', NULL, '2025-04-06 14:48:12', '2025-04-06 14:48:12'),
(527, 'default', 'User successfully logged in after MFA verification', NULL, 'login', NULL, 'App\\Models\\User', 40, '[]', NULL, '2025-04-15 11:33:56', '2025-04-15 11:33:56'),
(528, 'user', 'User Ali baba bin ali has been created', 'App\\Models\\User', 'created', 98, 'App\\Models\\User', 40, '{\"attributes\":{\"name\":\"Ali baba bin ali\",\"email\":\"alimukail909@gmail.com\",\"job_position\":\"Chef\",\"annual_leave_quota\":8,\"profile_photo\":\"profile_photos\\/67fe446794cc6.jpg\",\"age\":38,\"passport_number\":\"MF093566\",\"employment_pass\":\"EP65432\",\"address\":\"NO15 JALAN DAMAI IMPAIN 1\",\"phone\":\"010-227-3242\"}}', NULL, '2025-04-15 11:35:04', '2025-04-15 11:35:04'),
(529, 'user', 'User bin Ali baba has been updated', 'App\\Models\\User', 'updated', 98, 'App\\Models\\User', 40, '{\"attributes\":{\"name\":\"bin Ali baba\"},\"old\":{\"name\":\"Ali baba bin ali\"}}', NULL, '2025-04-15 11:35:31', '2025-04-15 11:35:31'),
(530, 'user', 'User bin Ali baba has been deleted', 'App\\Models\\User', 'deleted', 98, 'App\\Models\\User', 40, '{\"old\":{\"name\":\"bin Ali baba\",\"email\":\"alimukail909@gmail.com\",\"job_position\":\"Chef\",\"annual_leave_quota\":8,\"profile_photo\":\"profile_photos\\/67fe446794cc6.jpg\",\"age\":38,\"passport_number\":\"MF093566\",\"employment_pass\":\"EP65432\",\"address\":\"NO15 JALAN DAMAI IMPAIN 1\",\"phone\":\"010-227-3242\"}}', NULL, '2025-04-15 11:35:45', '2025-04-15 11:35:45'),
(531, 'leave_request', 'Leave request for User ID 40 has been created', 'App\\Models\\LeaveRequest', 'created', 115, 'App\\Models\\User', 40, '{\"attributes\":{\"user_id\":40,\"category\":\"Sick Leave\",\"leave_date_start\":\"2025-04-16\",\"leave_date_end\":\"2025-04-17\",\"days\":2,\"status\":\"pending\",\"mc_pdf\":\"mc_pdfs\\/b3C7VILmhYLKBm2Gs3W44IcsX6OsdiYO8JQb0SsT.pdf\"}}', NULL, '2025-04-15 11:37:44', '2025-04-15 11:37:44'),
(532, 'user', 'User MUHAMMAD ALIM UKAIL has been updated', 'App\\Models\\User', 'updated', 40, 'App\\Models\\User', 40, '{\"attributes\":[],\"old\":[]}', NULL, '2025-04-15 11:38:05', '2025-04-15 11:38:05'),
(533, 'leave_request', 'Leave request for User ID 40 has been updated', 'App\\Models\\LeaveRequest', 'updated', 115, 'App\\Models\\User', 40, '{\"attributes\":{\"status\":\"approved\"},\"old\":{\"status\":\"pending\"}}', NULL, '2025-04-15 11:38:05', '2025-04-15 11:38:05'),
(534, 'leave_request', 'Leave request for User ID 90 has been updated', 'App\\Models\\LeaveRequest', 'updated', 87, 'App\\Models\\User', 40, '{\"attributes\":{\"status\":\"rejected\"},\"old\":{\"status\":\"pending\"}}', NULL, '2025-04-15 11:38:11', '2025-04-15 11:38:11'),
(535, 'leave_request', 'Leave request for User ID 90 has been deleted', 'App\\Models\\LeaveRequest', 'deleted', 87, 'App\\Models\\User', 40, '{\"old\":{\"user_id\":90,\"category\":\"Leave for Temporary Disability\",\"leave_date_start\":\"2025-03-25\",\"leave_date_end\":\"2025-03-27\",\"days\":3,\"status\":\"rejected\",\"mc_pdf\":\"mc_pdfs\\/I0Vtnjer5V5aC4jQwvyWrIHlmtrSDvcGsSZCn71u.pdf\"}}', NULL, '2025-04-15 11:38:19', '2025-04-15 11:38:19'),
(536, 'default', 'User MUHAMMAD ALIM UKAIL logged out.', NULL, 'logout', NULL, 'App\\Models\\User', 40, '[]', NULL, '2025-04-15 11:39:30', '2025-04-15 11:39:30'),
(537, 'default', 'User successfully logged in after MFA verification', NULL, 'login', NULL, 'App\\Models\\User', 40, '[]', NULL, '2025-04-15 11:40:43', '2025-04-15 11:40:43'),
(538, 'leave_request', 'Leave request for User ID 40 has been deleted', 'App\\Models\\LeaveRequest', 'deleted', 88, 'App\\Models\\User', 40, '{\"old\":{\"user_id\":40,\"category\":\"Study Leave\",\"leave_date_start\":\"2025-03-25\",\"leave_date_end\":\"2025-03-26\",\"days\":2,\"status\":\"approved\",\"mc_pdf\":null}}', NULL, '2025-04-15 11:41:17', '2025-04-15 11:41:17'),
(539, 'leave_request', 'Leave request for User ID 89 has been deleted', 'App\\Models\\LeaveRequest', 'deleted', 89, 'App\\Models\\User', 40, '{\"old\":{\"user_id\":89,\"category\":\"Compassionate\\/Bereavement Leave\",\"leave_date_start\":\"2025-03-26\",\"leave_date_end\":\"2025-03-27\",\"days\":2,\"status\":\"approved\",\"mc_pdf\":null}}', NULL, '2025-04-15 11:41:17', '2025-04-15 11:41:17'),
(540, 'leave_request', 'Leave request for User ID 93 has been deleted', 'App\\Models\\LeaveRequest', 'deleted', 90, 'App\\Models\\User', 40, '{\"old\":{\"user_id\":93,\"category\":\"Maternity Leave\",\"leave_date_start\":\"2025-03-25\",\"leave_date_end\":\"2025-03-26\",\"days\":2,\"status\":\"rejected\",\"mc_pdf\":\"mc_pdfs\\/1moJmBDrLhsCpeufLYIj8dnrFjnmJWJK8291JERJ.pdf\"}}', NULL, '2025-04-15 11:41:17', '2025-04-15 11:41:17'),
(541, 'leave_request', 'Leave request for User ID 94 has been deleted', 'App\\Models\\LeaveRequest', 'deleted', 91, 'App\\Models\\User', 40, '{\"old\":{\"user_id\":94,\"category\":\"Emergency Leave\",\"leave_date_start\":\"2025-03-27\",\"leave_date_end\":\"2025-03-29\",\"days\":3,\"status\":\"pending\",\"mc_pdf\":null}}', NULL, '2025-04-15 11:41:17', '2025-04-15 11:41:17'),
(542, 'leave_request', 'Leave request for User ID 96 has been deleted', 'App\\Models\\LeaveRequest', 'deleted', 92, 'App\\Models\\User', 40, '{\"old\":{\"user_id\":96,\"category\":\"Maternity Leave\",\"leave_date_start\":\"2025-03-25\",\"leave_date_end\":\"2025-03-26\",\"days\":2,\"status\":\"pending\",\"mc_pdf\":\"mc_pdfs\\/spQaX9nqV9e9WwVhETkoBb6NmNk4IganqgdytX3P.pdf\"}}', NULL, '2025-04-15 11:41:17', '2025-04-15 11:41:17'),
(543, 'leave_request', 'Leave request for User ID 40 has been deleted', 'App\\Models\\LeaveRequest', 'deleted', 93, 'App\\Models\\User', 40, '{\"old\":{\"user_id\":40,\"category\":\"Sick Leave\",\"leave_date_start\":\"2025-03-26\",\"leave_date_end\":\"2025-03-27\",\"days\":2,\"status\":\"approved\",\"mc_pdf\":null}}', NULL, '2025-04-15 11:41:17', '2025-04-15 11:41:17'),
(544, 'leave_request', 'Leave request for User ID 40 has been deleted', 'App\\Models\\LeaveRequest', 'deleted', 94, 'App\\Models\\User', 40, '{\"old\":{\"user_id\":40,\"category\":\"Annual Leave\",\"leave_date_start\":\"2025-03-26\",\"leave_date_end\":\"2025-03-27\",\"days\":2,\"status\":\"approved\",\"mc_pdf\":null}}', NULL, '2025-04-15 11:41:17', '2025-04-15 11:41:17'),
(545, 'leave_request', 'Leave request for User ID 40 has been deleted', 'App\\Models\\LeaveRequest', 'deleted', 95, 'App\\Models\\User', 40, '{\"old\":{\"user_id\":40,\"category\":\"Annual Leave\",\"leave_date_start\":\"2025-03-26\",\"leave_date_end\":\"2025-03-27\",\"days\":2,\"status\":\"approved\",\"mc_pdf\":null}}', NULL, '2025-04-15 11:41:17', '2025-04-15 11:41:17'),
(546, 'leave_request', 'Leave request for User ID 40 has been deleted', 'App\\Models\\LeaveRequest', 'deleted', 96, 'App\\Models\\User', 40, '{\"old\":{\"user_id\":40,\"category\":\"Annual Leave\",\"leave_date_start\":\"2025-03-26\",\"leave_date_end\":\"2025-04-03\",\"days\":9,\"status\":\"rejected\",\"mc_pdf\":null}}', NULL, '2025-04-15 11:41:17', '2025-04-15 11:41:17'),
(547, 'leave_request', 'Leave request for User ID 40 has been deleted', 'App\\Models\\LeaveRequest', 'deleted', 97, 'App\\Models\\User', 40, '{\"old\":{\"user_id\":40,\"category\":\"Annual Leave\",\"leave_date_start\":\"2025-03-26\",\"leave_date_end\":\"2025-04-04\",\"days\":10,\"status\":\"rejected\",\"mc_pdf\":null}}', NULL, '2025-04-15 11:41:17', '2025-04-15 11:41:17'),
(548, 'leave_request', 'Leave request for User ID 40 has been deleted', 'App\\Models\\LeaveRequest', 'deleted', 98, 'App\\Models\\User', 40, '{\"old\":{\"user_id\":40,\"category\":\"Paternity Leave\",\"leave_date_start\":\"2025-03-26\",\"leave_date_end\":\"2025-04-01\",\"days\":7,\"status\":\"approved\",\"mc_pdf\":null}}', NULL, '2025-04-15 11:41:17', '2025-04-15 11:41:17'),
(549, 'leave_request', 'Leave request for User ID 40 has been deleted', 'App\\Models\\LeaveRequest', 'deleted', 99, 'App\\Models\\User', 40, '{\"old\":{\"user_id\":40,\"category\":\"Paternity Leave\",\"leave_date_start\":\"2025-03-26\",\"leave_date_end\":\"2025-03-27\",\"days\":2,\"status\":\"pending\",\"mc_pdf\":null}}', NULL, '2025-04-15 11:41:17', '2025-04-15 11:41:17'),
(550, 'leave_request', 'Leave request for User ID 40 has been deleted', 'App\\Models\\LeaveRequest', 'deleted', 100, 'App\\Models\\User', 40, '{\"old\":{\"user_id\":40,\"category\":\"Annual Leave\",\"leave_date_start\":\"2025-03-26\",\"leave_date_end\":\"2025-03-31\",\"days\":6,\"status\":\"approved\",\"mc_pdf\":null}}', NULL, '2025-04-15 11:41:17', '2025-04-15 11:41:17'),
(551, 'leave_request', 'Leave request for User ID 40 has been deleted', 'App\\Models\\LeaveRequest', 'deleted', 101, 'App\\Models\\User', 40, '{\"old\":{\"user_id\":40,\"category\":\"Annual Leave\",\"leave_date_start\":\"2025-03-26\",\"leave_date_end\":\"2025-03-27\",\"days\":2,\"status\":\"approved\",\"mc_pdf\":null}}', NULL, '2025-04-15 11:41:17', '2025-04-15 11:41:17'),
(552, 'leave_request', 'Leave request for User ID 40 has been deleted', 'App\\Models\\LeaveRequest', 'deleted', 102, 'App\\Models\\User', 40, '{\"old\":{\"user_id\":40,\"category\":\"Annual Leave\",\"leave_date_start\":\"2025-03-26\",\"leave_date_end\":\"2025-03-27\",\"days\":2,\"status\":\"pending\",\"mc_pdf\":null}}', NULL, '2025-04-15 11:41:17', '2025-04-15 11:41:17'),
(553, 'leave_request', 'Leave request for User ID 40 has been deleted', 'App\\Models\\LeaveRequest', 'deleted', 103, 'App\\Models\\User', 40, '{\"old\":{\"user_id\":40,\"category\":\"Annual Leave\",\"leave_date_start\":\"2025-03-26\",\"leave_date_end\":\"2025-03-27\",\"days\":2,\"status\":\"pending\",\"mc_pdf\":null}}', NULL, '2025-04-15 11:41:17', '2025-04-15 11:41:17'),
(554, 'leave_request', 'Leave request for User ID 40 has been deleted', 'App\\Models\\LeaveRequest', 'deleted', 104, 'App\\Models\\User', 40, '{\"old\":{\"user_id\":40,\"category\":\"Sick Leave\",\"leave_date_start\":\"2025-03-26\",\"leave_date_end\":\"2025-04-02\",\"days\":8,\"status\":\"approved\",\"mc_pdf\":null}}', NULL, '2025-04-15 11:41:17', '2025-04-15 11:41:17'),
(555, 'leave_request', 'Leave request for User ID 40 has been deleted', 'App\\Models\\LeaveRequest', 'deleted', 105, 'App\\Models\\User', 40, '{\"old\":{\"user_id\":40,\"category\":\"Paternity Leave\",\"leave_date_start\":\"2025-03-26\",\"leave_date_end\":\"2025-03-27\",\"days\":2,\"status\":\"pending\",\"mc_pdf\":null}}', NULL, '2025-04-15 11:41:17', '2025-04-15 11:41:17'),
(556, 'leave_request', 'Leave request for User ID 40 has been deleted', 'App\\Models\\LeaveRequest', 'deleted', 106, 'App\\Models\\User', 40, '{\"old\":{\"user_id\":40,\"category\":\"Paternity Leave\",\"leave_date_start\":\"2025-03-26\",\"leave_date_end\":\"2025-03-28\",\"days\":3,\"status\":\"pending\",\"mc_pdf\":null}}', NULL, '2025-04-15 11:41:17', '2025-04-15 11:41:17'),
(557, 'leave_request', 'Leave request for User ID 40 has been deleted', 'App\\Models\\LeaveRequest', 'deleted', 107, 'App\\Models\\User', 40, '{\"old\":{\"user_id\":40,\"category\":\"Paternity Leave\",\"leave_date_start\":\"2025-03-26\",\"leave_date_end\":\"2025-03-27\",\"days\":2,\"status\":\"pending\",\"mc_pdf\":null}}', NULL, '2025-04-15 11:41:17', '2025-04-15 11:41:17'),
(558, 'leave_request', 'Leave request for User ID 40 has been deleted', 'App\\Models\\LeaveRequest', 'deleted', 108, 'App\\Models\\User', 40, '{\"old\":{\"user_id\":40,\"category\":\"Unpaid Leave\",\"leave_date_start\":\"2025-03-26\",\"leave_date_end\":\"2025-03-27\",\"days\":2,\"status\":\"approved\",\"mc_pdf\":null}}', NULL, '2025-04-15 11:41:17', '2025-04-15 11:41:17'),
(559, 'leave_request', 'Leave request for User ID 40 has been deleted', 'App\\Models\\LeaveRequest', 'deleted', 109, 'App\\Models\\User', 40, '{\"old\":{\"user_id\":40,\"category\":\"Sick Leave\",\"leave_date_start\":\"2025-03-26\",\"leave_date_end\":\"2025-03-27\",\"days\":2,\"status\":\"approved\",\"mc_pdf\":null}}', NULL, '2025-04-15 11:41:17', '2025-04-15 11:41:17'),
(560, 'leave_request', 'Leave request for User ID 40 has been deleted', 'App\\Models\\LeaveRequest', 'deleted', 110, 'App\\Models\\User', 40, '{\"old\":{\"user_id\":40,\"category\":\"Unpaid Leave\",\"leave_date_start\":\"2025-03-26\",\"leave_date_end\":\"2025-03-27\",\"days\":2,\"status\":\"approved\",\"mc_pdf\":null}}', NULL, '2025-04-15 11:41:17', '2025-04-15 11:41:17'),
(561, 'leave_request', 'Leave request for User ID 40 has been deleted', 'App\\Models\\LeaveRequest', 'deleted', 111, 'App\\Models\\User', 40, '{\"old\":{\"user_id\":40,\"category\":\"Paternity Leave\",\"leave_date_start\":\"2025-03-26\",\"leave_date_end\":\"2025-03-26\",\"days\":1,\"status\":\"pending\",\"mc_pdf\":null}}', NULL, '2025-04-15 11:41:17', '2025-04-15 11:41:17'),
(562, 'leave_request', 'Leave request for User ID 40 has been deleted', 'App\\Models\\LeaveRequest', 'deleted', 112, 'App\\Models\\User', 40, '{\"old\":{\"user_id\":40,\"category\":\"Maternity Leave\",\"leave_date_start\":\"2025-03-26\",\"leave_date_end\":\"2025-03-28\",\"days\":3,\"status\":\"pending\",\"mc_pdf\":null}}', NULL, '2025-04-15 11:41:17', '2025-04-15 11:41:17'),
(563, 'leave_request', 'Leave request for User ID 40 has been deleted', 'App\\Models\\LeaveRequest', 'deleted', 113, 'App\\Models\\User', 40, '{\"old\":{\"user_id\":40,\"category\":\"Unpaid Leave\",\"leave_date_start\":\"2025-03-26\",\"leave_date_end\":\"2025-03-28\",\"days\":3,\"status\":\"pending\",\"mc_pdf\":null}}', NULL, '2025-04-15 11:41:17', '2025-04-15 11:41:17'),
(564, 'leave_request', 'Leave request for User ID 96 has been deleted', 'App\\Models\\LeaveRequest', 'deleted', 114, 'App\\Models\\User', 40, '{\"old\":{\"user_id\":96,\"category\":\"Emergency Leave\",\"leave_date_start\":\"2025-04-07\",\"leave_date_end\":\"2025-04-11\",\"days\":5,\"status\":\"approved\",\"mc_pdf\":null}}', NULL, '2025-04-15 11:41:17', '2025-04-15 11:41:17'),
(565, 'leave_request', 'Leave request for User ID 40 has been deleted', 'App\\Models\\LeaveRequest', 'deleted', 115, 'App\\Models\\User', 40, '{\"old\":{\"user_id\":40,\"category\":\"Sick Leave\",\"leave_date_start\":\"2025-04-16\",\"leave_date_end\":\"2025-04-17\",\"days\":2,\"status\":\"approved\",\"mc_pdf\":\"mc_pdfs\\/b3C7VILmhYLKBm2Gs3W44IcsX6OsdiYO8JQb0SsT.pdf\"}}', NULL, '2025-04-15 11:41:17', '2025-04-15 11:41:17'),
(566, 'default', 'User MUHAMMAD ALIM UKAIL logged out.', NULL, 'logout', NULL, 'App\\Models\\User', 40, '[]', NULL, '2025-04-15 11:41:26', '2025-04-15 11:41:26'),
(567, 'default', 'User successfully logged in after MFA verification', NULL, 'login', NULL, 'App\\Models\\User', 40, '[]', NULL, '2025-04-15 11:41:55', '2025-04-15 11:41:55'),
(568, 'user', 'User Alim ukail bin saharuddin has been created', 'App\\Models\\User', 'created', 99, 'App\\Models\\User', 40, '{\"attributes\":{\"name\":\"Alim ukail bin saharuddin\",\"email\":\"alimukail909@gmail.com\",\"job_position\":\"Chef\",\"annual_leave_quota\":8,\"profile_photo\":\"profile_photos\\/67fe462db41f5.JPG\",\"age\":32,\"passport_number\":\"MG963743\",\"employment_pass\":\"EP13579\",\"address\":\"NO15 JALAN DAMAI IMPAIN 1\",\"phone\":\"010-227-3242\"}}', NULL, '2025-04-15 11:42:37', '2025-04-15 11:42:37'),
(569, 'user', 'User Alim Ukail saharuddin has been updated', 'App\\Models\\User', 'updated', 99, 'App\\Models\\User', 40, '{\"attributes\":{\"name\":\"Alim Ukail saharuddin\"},\"old\":{\"name\":\"Alim ukail bin saharuddin\"}}', NULL, '2025-04-15 11:43:06', '2025-04-15 11:43:06'),
(570, 'user', 'User Alim Ukail saharuddin has been deleted', 'App\\Models\\User', 'deleted', 99, 'App\\Models\\User', 40, '{\"old\":{\"name\":\"Alim Ukail saharuddin\",\"email\":\"alimukail909@gmail.com\",\"job_position\":\"Chef\",\"annual_leave_quota\":8,\"profile_photo\":\"profile_photos\\/67fe462db41f5.JPG\",\"age\":32,\"passport_number\":\"MG963743\",\"employment_pass\":\"EP13579\",\"address\":\"NO15 JALAN DAMAI IMPAIN 1\",\"phone\":\"010-227-3242\"}}', NULL, '2025-04-15 11:43:18', '2025-04-15 11:43:18'),
(571, 'leave_request', 'Leave request for User ID 40 has been created', 'App\\Models\\LeaveRequest', 'created', 116, 'App\\Models\\User', 40, '{\"attributes\":{\"user_id\":40,\"category\":\"Annual Leave\",\"leave_date_start\":\"2025-04-17\",\"leave_date_end\":\"2025-04-18\",\"days\":2,\"status\":\"pending\",\"mc_pdf\":\"mc_pdfs\\/UQtLnxGMFkmOr2OMr4xLof7jSV2TZuhaURfnnrd6.pdf\"}}', NULL, '2025-04-15 11:44:52', '2025-04-15 11:44:52'),
(572, 'user', 'User MUHAMMAD ALIM UKAIL has been updated', 'App\\Models\\User', 'updated', 40, 'App\\Models\\User', 40, '{\"attributes\":{\"annual_leave_quota\":10},\"old\":{\"annual_leave_quota\":12}}', NULL, '2025-04-15 11:45:04', '2025-04-15 11:45:04'),
(573, 'leave_request', 'Leave request for User ID 40 has been updated', 'App\\Models\\LeaveRequest', 'updated', 116, 'App\\Models\\User', 40, '{\"attributes\":{\"status\":\"approved\"},\"old\":{\"status\":\"pending\"}}', NULL, '2025-04-15 11:45:04', '2025-04-15 11:45:04'),
(574, 'default', 'User MUHAMMAD ALIM UKAIL logged out.', NULL, 'logout', NULL, 'App\\Models\\User', 40, '[]', NULL, '2025-04-15 11:46:02', '2025-04-15 11:46:02');

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
-- Table structure for table `leave_requests`
--

CREATE TABLE `leave_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `category` text NOT NULL,
  `leave_date_start` date DEFAULT NULL,
  `leave_date_end` date DEFAULT NULL,
  `days` int(11) DEFAULT NULL,
  `status` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending',
  `mc_pdf` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leave_requests`
--

INSERT INTO `leave_requests` (`id`, `user_id`, `category`, `leave_date_start`, `leave_date_end`, `days`, `status`, `mc_pdf`, `created_at`, `updated_at`) VALUES
(116, 40, 'Annual Leave', '2025-04-17', '2025-04-18', 2, 'approved', 'mc_pdfs/UQtLnxGMFkmOr2OMr4xLof7jSV2TZuhaURfnnrd6.pdf', '2025-04-15 11:44:52', '2025-04-15 11:45:04');

-- --------------------------------------------------------

--
-- Table structure for table `log_activity`
--

CREATE TABLE `log_activity` (
  `log_id` bigint(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `action` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(4, '2025_01_07_094755_add_profile_photo_to_users_table', 2),
(5, '2025_01_07_110231_add_details_to_users_table', 3),
(6, '2025_01_11_134030_add_address_to_users_table', 4),
(7, '2025_01_11_142456_add_phone_to_users_table', 5),
(8, '2025_01_16_071754_add_otp_columns_to_users_table', 6),
(9, '2025_03_04_130621_add_google2fa_columns_to_users_table', 7),
(10, '2025_03_04_151040_add_google2fa_to_users_table', 8),
(11, '2025_03_04_160242_add_mfa_columns_to_users_table', 9),
(12, '2025_03_06_142508_create_leaves_table', 10),
(13, '2025_03_06_142808_create_leave_requests_table', 11),
(14, '2025_03_09_215731_create_activity_log_table', 12),
(15, '2025_03_09_215732_add_event_column_to_activity_log_table', 12),
(16, '2025_03_09_215733_add_batch_uuid_column_to_activity_log_table', 12),
(17, '2025_03_11_133132_add_mc_pdf_to_leave_requests', 13),
(18, '2025_03_22_124941_add_job_position_to_users_table', 14),
(19, '2025_03_22_125225_add_job_position_and_annual_leave_to_users_table', 15),
(20, '2025_03_22_141509_modify_leave_requests_table', 16),
(21, '2025_03_22_151244_create_payslips_table', 17),
(22, '2025_03_22_151913_create_payslips_table', 18),
(23, '2025_03_25_121136_add_leave_quotas_to_users', 19);

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
-- Table structure for table `payslips`
--

CREATE TABLE `payslips` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `payslip_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payslips`
--

INSERT INTO `payslips` (`id`, `user_id`, `file_path`, `payslip_date`, `created_at`, `updated_at`) VALUES
(4, 40, 'payslip/Mr2Q1J9DsrWhVty9jw7cQb8ns1mcryxGj1BL6JHx.pdf', '2025-03-17', '2025-03-22 13:44:03', '2025-03-22 13:44:03'),
(6, 40, 'payslip/DTNtGQN64kqtl83RpmOJv69EQEbzPQmdHuRcU0pU.pdf', '2025-03-25', '2025-03-23 07:59:53', '2025-03-23 07:59:53'),
(7, 95, 'payslip/yRsQukekNsbnerTAsqXi2xl6ka3YKDQoalbA9Nkf.pdf', '2025-04-18', '2025-04-15 11:45:30', '2025-04-15 11:45:30');

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE `permission` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `groupby` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `permission`
--

INSERT INTO `permission` (`id`, `name`, `slug`, `groupby`, `created_at`, `updated_at`) VALUES
(1, 'Dashboard', 'Dashboard', 0, NULL, NULL),
(2, 'User', 'User', 1, NULL, NULL),
(3, 'Add User', 'Add User', 1, NULL, NULL),
(4, 'Edit User', 'Edit user', 1, NULL, NULL),
(5, 'Delete User', 'Delete User', 1, NULL, NULL),
(6, 'Role', 'Role', 2, NULL, NULL),
(7, 'Add Role', 'Add Role', 2, NULL, NULL),
(8, 'Edit Role', 'Edit Role', 2, NULL, NULL),
(9, 'Delete Role', 'Delete Role', 2, NULL, NULL),
(10, 'Log Activity', 'Log Activity', 3, NULL, NULL),
(11, 'List Leave', 'List Leave', 4, NULL, NULL),
(12, 'Edit List Leave', 'Edit List Leave', 4, NULL, NULL),
(13, 'Approve List Leave', 'Approve List Leave', 4, NULL, NULL),
(14, 'Delete List Leave', 'Delete List Leave', 4, NULL, NULL),
(15, 'Add Leave', 'Add Leave', 4, NULL, NULL),
(16, 'Apply Leave', 'Apply Leave', 5, NULL, NULL),
(19, 'PaySlip', 'PaySlip', 6, NULL, NULL),
(20, 'Upload PaySlip', 'Upload PaySlip', 6, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `id` int(11) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `permission_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`id`, `role_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(2903, 10, 1, '2025-03-25 15:05:53', '2025-03-25 15:05:53'),
(2904, 10, 16, '2025-03-25 15:05:53', '2025-03-25 15:05:53'),
(2905, 10, 19, '2025-03-25 15:05:53', '2025-03-25 15:05:53'),
(2976, 2, 1, '2025-04-05 19:54:43', '2025-04-05 19:54:43'),
(2977, 2, 2, '2025-04-05 19:54:43', '2025-04-05 19:54:43'),
(2978, 2, 3, '2025-04-05 19:54:43', '2025-04-05 19:54:43'),
(2979, 2, 4, '2025-04-05 19:54:43', '2025-04-05 19:54:43'),
(2980, 2, 5, '2025-04-05 19:54:43', '2025-04-05 19:54:43'),
(2981, 2, 6, '2025-04-05 19:54:43', '2025-04-05 19:54:43'),
(2982, 2, 7, '2025-04-05 19:54:43', '2025-04-05 19:54:43'),
(2983, 2, 8, '2025-04-05 19:54:43', '2025-04-05 19:54:43'),
(2984, 2, 9, '2025-04-05 19:54:43', '2025-04-05 19:54:43'),
(2985, 2, 10, '2025-04-05 19:54:43', '2025-04-05 19:54:43'),
(2986, 2, 11, '2025-04-05 19:54:43', '2025-04-05 19:54:43'),
(2987, 2, 12, '2025-04-05 19:54:43', '2025-04-05 19:54:43'),
(2988, 2, 13, '2025-04-05 19:54:43', '2025-04-05 19:54:43'),
(2989, 2, 14, '2025-04-05 19:54:43', '2025-04-05 19:54:43'),
(2990, 2, 15, '2025-04-05 19:54:43', '2025-04-05 19:54:43'),
(2991, 2, 16, '2025-04-05 19:54:43', '2025-04-05 19:54:43'),
(2992, 2, 19, '2025-04-05 19:54:43', '2025-04-05 19:54:43'),
(2993, 2, 20, '2025-04-05 19:54:43', '2025-04-05 19:54:43'),
(3081, 1, 1, '2025-04-15 19:44:00', '2025-04-15 19:44:00'),
(3082, 1, 2, '2025-04-15 19:44:00', '2025-04-15 19:44:00'),
(3083, 1, 3, '2025-04-15 19:44:00', '2025-04-15 19:44:00'),
(3084, 1, 4, '2025-04-15 19:44:00', '2025-04-15 19:44:00'),
(3085, 1, 5, '2025-04-15 19:44:00', '2025-04-15 19:44:00'),
(3086, 1, 6, '2025-04-15 19:44:00', '2025-04-15 19:44:00'),
(3087, 1, 7, '2025-04-15 19:44:00', '2025-04-15 19:44:00'),
(3088, 1, 8, '2025-04-15 19:44:00', '2025-04-15 19:44:00'),
(3089, 1, 9, '2025-04-15 19:44:00', '2025-04-15 19:44:00'),
(3090, 1, 10, '2025-04-15 19:44:00', '2025-04-15 19:44:00'),
(3091, 1, 11, '2025-04-15 19:44:00', '2025-04-15 19:44:00'),
(3092, 1, 12, '2025-04-15 19:44:00', '2025-04-15 19:44:00'),
(3093, 1, 13, '2025-04-15 19:44:00', '2025-04-15 19:44:00'),
(3094, 1, 14, '2025-04-15 19:44:00', '2025-04-15 19:44:00'),
(3095, 1, 15, '2025-04-15 19:44:00', '2025-04-15 19:44:00'),
(3096, 1, 16, '2025-04-15 19:44:00', '2025-04-15 19:44:00'),
(3097, 1, 19, '2025-04-15 19:44:00', '2025-04-15 19:44:00'),
(3098, 1, 20, '2025-04-15 19:44:00', '2025-04-15 19:44:00');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', '2025-03-17 15:56:51', '2025-03-17 15:56:51'),
(2, 'Admin', '2025-01-06 14:40:35', '2025-01-06 14:40:35'),
(10, 'User', '2025-01-06 19:44:02', '2025-03-07 16:57:30');

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
('TxjDXMgoFonwoubgBdmyOLaiPqIxVHWCxqsx4SYH', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQlZtUVdadFowbjVMb1k0YmpIbEtKUWQ1aHBhaFl0Z0ZZeHdteGhGeCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly9sb2NhbGhvc3QvcG9ydG9yb21hbm8oY29weSkiO319', 1744720095);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `job_position` varchar(255) DEFAULT NULL,
  `annual_leave_quota` int(11) NOT NULL DEFAULT 8,
  `start_date` date DEFAULT NULL,
  `profile_photo` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `passport_number` varchar(255) DEFAULT NULL,
  `employment_pass` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `mfa_token` varchar(255) DEFAULT NULL,
  `mfa_expires_at` timestamp NULL DEFAULT NULL,
  `sick_leave_quota` int(11) NOT NULL DEFAULT 14,
  `emergency_leave_quota` int(11) NOT NULL DEFAULT 5,
  `maternity_leave_quota` int(11) NOT NULL DEFAULT 60,
  `paternity_leave_quota` int(11) NOT NULL DEFAULT 7,
  `unpaid_leave_quota` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `job_position`, `annual_leave_quota`, `start_date`, `profile_photo`, `email_verified_at`, `password`, `role_id`, `remember_token`, `created_at`, `updated_at`, `age`, `passport_number`, `employment_pass`, `address`, `phone`, `mfa_token`, `mfa_expires_at`, `sick_leave_quota`, `emergency_leave_quota`, `maternity_leave_quota`, `paternity_leave_quota`, `unpaid_leave_quota`) VALUES
(40, 'MUHAMMAD ALIM UKAIL', 'alimukail99@gmail.com', 'Manager', 10, '2021-06-08', 'profile_photos/67e042426189e.jpg', NULL, '$2y$12$MuoecO.yoMhzz5CWUlUJ0.onNdYSY1dxy1VCjMp/H/f8QZRFr5gX6', 1, NULL, '2025-03-04 08:12:40', '2025-04-15 11:45:04', 23, '4321', '4321', 'eyJpdiI6IlpsZWVGSkZPYVhyenYzU3EwMTZaUUE9PSIsInZhbHVlIjoiS1hkY1hmV0VNem9Wdmh4MGE3bjh5cEIvZEF5YjNJTWhoOC9GL3NTdm50cUZNelV4WkRZSTM4QU5qUTB5bGl3ZmU3UWtpdDFuMUIrRVZTRnZCL0ovbXc9PSIsIm1hYyI6ImRjODY3MjJhZGVlYTI2NGE1M2I0ODA2OGY5NWMxYzAzYmQ0YmI2ZTU2NTVlMWIzOWQ5MTIwYWUwODg3Mjg3ZWMiLCJ0YWciOiIifQ==', 'eyJpdiI6IlpIaW9ZN1B6UVAwT3E3YWl3Mm1NcFE9PSIsInZhbHVlIjoiWFkzUDhuOGtlWjBGTEx4TUNGZ0VEdz09IiwibWFjIjoiNTNlYzQ5YmUxNDMyZDc5NDk1YjcyNTE0YjUxNzA0MGZmZTU3ZDA3MjNhNGRkZmNkODc4Mjk1ZjQyMTIzMzk4NSIsInRhZyI6IiJ9', NULL, NULL, 0, 5, 60, 0, 0),
(84, 'SALAI WIN AUNG', 'SalaiWinAung@gmail.com', 'Waiters', 12, '2021-01-11', 'profile_photos/67e02d3151735.jpg', NULL, '$2y$12$rsLslP27lc0VaaBwIZaahOOSdKRnAwnbAFTEQkNkeOHdjivbF52Ce', 10, NULL, '2025-03-23 15:48:01', '2025-03-23 16:35:32', 32, 'eyJpdiI6Im85amZqSmV4b0RtcVoxVmZOaEFsemc9PSIsInZhbHVlIjoiYWcxRkVkL3BHTkVyOFlTcUlaaGdFQT09IiwibWFjIjoiOWNkMmFiM2Y0NjFiOWVjNGFjMDMwNGZhM2E5ZWI4Y2UzY2IyNDk4NWVlYTJjNWIyMjA2YmEyNTk2ZDcxMDdmOCIsInRhZyI6IiJ9', 'eyJpdiI6Ijk1VSt4dHUwbXd1QXNWdFo3SE9Sb3c9PSIsInZhbHVlIjoidzNvR2xncldFQ1MvMUhGU2ZGUFB3Zz09IiwibWFjIjoiNDg4Yjg3Yzc3ODdiNjAwM2FmNGZhNjQ3ZDExMjBhMzI5YWQzNjBjMmMwZjhmYTljY2YxZjUxNDM4NzBiM2NiNSIsInRhZyI6IiJ9', 'eyJpdiI6Ik1BQlBHSGpUYjBQSnRxWk0rRjIyeFE9PSIsInZhbHVlIjoibTRFVW5iY3hQN1hkaXZ3YWRWcXVVeTI4M2ljNWtHbS91RjMrQWR3aGVXc0UxN1paVHY5d3BsUEkzcDNBQ1hBeUMyWnRGU3ZiakVUZ05xMWUzNDh6WVJXRXd2VWdyNS9nRVJPQlE2LzhlWnM9IiwibWFjIjoiYWMyYzMwMDdmMTVlNjNkYTRhMDg4Yjk4ZjYxZTQ1NTNjM2VjM2FiOTMxYzBlNGRkMmNhNmUwNmE3NmQ4NDlmZSIsInRhZyI6IiJ9', 'eyJpdiI6IlRPS0JWSnpQa2xiY0FNR01SbEtKaXc9PSIsInZhbHVlIjoiejhLekNzSGdvQTh2MEt3cHZCODlOQT09IiwibWFjIjoiNDk5YzQ1MzRhYjBhYmM0OTQwN2M3MTFlZjVlOGQ5ODg1ODJjMmY5ZjZiYzM3MmJmZGFkNzA5Y2MwMjQ4Yjc3NSIsInRhZyI6IiJ9', NULL, NULL, 14, 5, 60, 7, 0),
(89, 'SOE MIN', 'SoeMin@gmail.com', 'Waiters', 14, '2020-01-15', 'profile_photos/67e039d338654.jpg', NULL, '$2y$12$5f4jgsBTqq0TTghAvFtQC.1vPgf7e9CfB8AEVjpvvyQswCEnW5vLC', 10, NULL, '2025-03-23 16:41:55', '2025-03-23 18:19:16', 35, 'eyJpdiI6IlhGclUvbjdPVk9NelVMRnhmUEhWSFE9PSIsInZhbHVlIjoiZTJTRGx6V1lmbVVERU1lSGhsMWhXQT09IiwibWFjIjoiNTMyZTEwMzRkMjJiNjFjZjdhODg2MThjOTEzMzJlZTExNmU1MGIxNjA2ODkyODk5ZjhiZjBjMThjOGVmMmY0MCIsInRhZyI6IiJ9', 'eyJpdiI6IjdmSkZXYXh4YTZFdXZjVnI1MnU5MVE9PSIsInZhbHVlIjoiaXZocnpTWGVqcVRBS3pxRGc3ckx1dz09IiwibWFjIjoiNTFhYmUwYzUzYjJjMDJmYTdhYzc2NjVjMGE0NDJkODg4YmU5NDc4NGU1NmVlNTgwMmJkZDEyYjU3ZGQyYmRiZSIsInRhZyI6IiJ9', 'eyJpdiI6IjFabTJZRHg2Uzlsanl0aFhwcmtTNVE9PSIsInZhbHVlIjoiR0dkUHFZZ25SZXpNMmpyZVNmRTBXZ3AvNkVKV2hjSFNSaUdOeERmNXYzdUt4VlJUdjl1TzE1bG9NdnFHc2hDYllDRzQ1VC9zNHNEREJiN0laZ2NNTFB4U3lKaGN5K2RodmMranpDRU54aTQ9IiwibWFjIjoiYzY4ZGE3NjhhYjgyM2VjNjFlZGU2Y2NiNmY2YjViMDE3YWQ0ZTNlMmRmMzg3YTVjODk0NmQ0ZWJkZGUxNjM4YyIsInRhZyI6IiJ9', 'eyJpdiI6IlNOcGs4MmJ2RTd3SzJUbXBzM21LSnc9PSIsInZhbHVlIjoiWUlqS1o4Y05QMHhUVDNOTVF1OVRSZz09IiwibWFjIjoiMjlmMzg5ZTk2MDUwMmFkMmUxYjY4NGNkNjM1ZDlmZGYyNzI5YjdjNWQ4NTM1YWJjYjFjYzVlNzY1NWE3YWQwNyIsInRhZyI6IiJ9', NULL, NULL, 14, 5, 60, 7, 0),
(90, 'MYINT THU RA', 'MyintThuRa@gmail.com', 'Waiters', 12, '2021-01-24', 'profile_photos/67e03a6e17461.jpg', NULL, '$2y$12$qN8wy01/1bxUkxXABDrHDeWPeHPYnD/ohbyxEknaVGfIgqb.xcclm', 10, NULL, '2025-03-23 16:44:30', '2025-03-23 16:44:30', 27, 'eyJpdiI6IkdaTFg4ZkJJYzZvNnJOODlVa3QraWc9PSIsInZhbHVlIjoibmNJWlFKVmpLOUdkYU0rTlY4SVpFZz09IiwibWFjIjoiZjBlYTIxZDVjMjQyYmQ1OWQ1ZGQwYzllYzVjNDIzYjA1Mzg3YzNlZjE3MzJkMGNiZTQ0MDgyYWI5YTI0NDM0OCIsInRhZyI6IiJ9', 'eyJpdiI6IkMzQXp4SXFrampXaFRsc3NJT1hHSGc9PSIsInZhbHVlIjoiV3BvVWRDK1pvZlZ0YU5LWnl2WmlkZz09IiwibWFjIjoiNDU4ZDc0ZTE0ZGQ4OGM3YzkwMjFkZTdkZTM0NDVjZjliNzRmOWM2ZTE3Mjc5NzliZTcwMmY4MDBmZmVjMzMzNCIsInRhZyI6IiJ9', 'eyJpdiI6ImY4eWY2T0crVEpQdjIrc2hZeEp4Ymc9PSIsInZhbHVlIjoiUXh3cmJLeVJkczdtRWVHQVZleXFLa2ZLRy8zRENuRmdHczc5K25tTlorK0FkUnMvN1B3RXRBR09GYVVwc0dPeUNsMFBDT0JyOEdqem5aa2F5NXorK2h4dE5ETlB4QTdLWjI2VjV1Mkc5YmM9IiwibWFjIjoiOGUzNTRjNzU1ZjZlNThmMTQxZmY0NDJhZjFlNjdjYjlhODI5NGFkZWRkYmVlYjdmNTkwZWZjMTAzMmRjMzA0MCIsInRhZyI6IiJ9', 'eyJpdiI6IkJDNEdocXQ3U0lvckJjdGhGN1Z2V0E9PSIsInZhbHVlIjoiMXRJR1dvcEEwam5PTGFJRnh5bEZEUT09IiwibWFjIjoiYTYzZGEwMDAzZWQzMDRlNzM0OWFkYTg0YjFmMmQ0YTAwZWE4N2JmNjY5OTc2Y2RjNTZiN2JjYjMwNzJmODgyNyIsInRhZyI6IiJ9', NULL, NULL, 14, 5, 60, 7, 0),
(91, 'ALAM MAHABUB', 'AlamMahabub@gmail.com', 'Chef', 12, '2021-01-18', 'profile_photos/67e03b6bc69e3.jpg', NULL, '$2y$12$8APNIw9B5n8lHlJkRsQx7uxkGnnxF3Ka5lbq7dqSHu53swiJGQBHS', 10, NULL, '2025-03-23 16:48:43', '2025-03-23 16:48:43', 36, 'eyJpdiI6IkNsMnAzN3d5RllhZ2VUUTZpQmh4L1E9PSIsInZhbHVlIjoicUN6YWxkQnZ4cUhLbVJ5R29uMnlUUT09IiwibWFjIjoiYWEwZjllYWRkZmU0YmJjZDIzZGUxZDVlNmM2YzgwNjNkMzI1M2U3ZTlmODc2ZjljZTMwNzgyMzdjODMwYjU5MyIsInRhZyI6IiJ9', 'eyJpdiI6InhpUGg3OEw1ei91ZkNDTCtXUHBkWXc9PSIsInZhbHVlIjoiMHFlNC9QNCtKVXJJMTRMc0tCZGxRZz09IiwibWFjIjoiMjZlODQyYzk0Y2ZmYThmOTMyNTFjMWVlYzA1NWVjZWVmODRiYzVkMjk1NDljYzNhZjc0MDEyMDM4YWNiZTE3MiIsInRhZyI6IiJ9', 'eyJpdiI6IkVQM3N5cGhMQnpjUXdRV1BBaUJqR3c9PSIsInZhbHVlIjoiZVFDR08zMUxSb2p3MmhVUDlTajJvNlRpVzNvZjdydzlRN0p3Ti90VDMvcW0rM0lUYlhoY1hiM05JZGxxY3I5TFVqbkVtcHZ3NlROSmpjTzR1bjdySFAxMC9pcGFpMTdoc0VFMCs4cFNKTjg9IiwibWFjIjoiMzVmZTVmOTE2OTk0NWIwZjMxMjg2NWQ0M2FmYWRkNDg5MGQwMjBlNjM4YmZlNWE0MzE2YWU2OTFlYTYyZmQ4ZiIsInRhZyI6IiJ9', 'eyJpdiI6IlJGcUZqM1NPOXhSeFdBTzJXNU5ncWc9PSIsInZhbHVlIjoiMTliT2gxSlJhVml6a1g0SmZLVE43dz09IiwibWFjIjoiMTM5MDRhYjkwNDg1YzI2YTY2ZDQ1OWMxMTE5MGYyMGJjZGNkODBhYWI4NTgzYmZmYTlhOTY4ZjVjNGE1YjkzYyIsInRhZyI6IiJ9', NULL, NULL, 14, 5, 60, 7, 0),
(92, 'KAMINUR SHEIKH', 'KaminurSheikh@gmail.com', 'Chef', 12, '2021-01-18', 'profile_photos/67e03c5de85ba.jpg', NULL, '$2y$12$sr7/0gKOPl1b0VzuDTI/weFbcqXhlqAyu9cmcco7wVvsRSEDyqVdy', 10, NULL, '2025-03-23 16:52:45', '2025-03-23 16:52:45', 29, 'eyJpdiI6ImVqbVNVcm5PbVNKYU1QSDFzNUpwV1E9PSIsInZhbHVlIjoiR3BlMUQydUZ3T1ZNYldKMGhkQmI1Zz09IiwibWFjIjoiNDRhYTBkNGQ1NTdmYTUxYTNiODRlYzY0ZWIxM2U0MGIwOTY0Nzg3MzgzZDY2NDcyYzdjZWM1OWRmMjRkMGYzOSIsInRhZyI6IiJ9', 'eyJpdiI6IndtQ0dNSTV2VGxuZEtzbTFhaklSVHc9PSIsInZhbHVlIjoiVGk5cncyejRmOUJvY2duZTdRaklHdz09IiwibWFjIjoiZWU4YjQxYTJkZmMyYzIyODY1YmQ0ODJmM2Q3OGEwODFhZWE1NGVlZGQxNDAwZmYxYTVmMzJjNDhiYjQ1M2ZmMiIsInRhZyI6IiJ9', 'eyJpdiI6InFtcWUyczY4cXdKNVJjaGM0czBVNmc9PSIsInZhbHVlIjoiNkljUS94V1k0bnRxYVBRL29lVlRaVS9aTjZWOEpYN2lNYW8zdGZVZHBVdGdnWld6NXNWZkQwOTJrcjU2M1pDZmExcVk0K0hVdGhjV0NrUGd2UjRJdGhVR1IvM1d5SmtQMHNEM0hCVzBhWW89IiwibWFjIjoiOWU4ZTc5ODI4NjI0NjkzNWE2N2RhZTEwNTFhOTFkNGYyYjAzYWE3NjZjNjRjMjk2YWU2M2ZmZWQ0YzBmYmQwYSIsInRhZyI6IiJ9', 'eyJpdiI6Ik56aXdiOGFRN3EvcTI0aDZWeHlsK3c9PSIsInZhbHVlIjoiOGpGWUZUMGl2Y1YwVDZjZ1Q2eXJrZz09IiwibWFjIjoiYzg5MzQ3ZWQ1NDRmYzIyZTk5ZTg2OGExYWExNDRkMmRkMzYzNzU3OWIyNjAyNTAxYTRhNTUyOTNiZjUwOTRlOSIsInRhZyI6IiJ9', NULL, NULL, 14, 5, 60, 7, 0),
(93, 'AFRAD NAYIM', 'AfradNayim@gmail.com', 'Waiters', 16, '2020-02-11', 'profile_photos/67e03d12180e3.jpg', NULL, '$2y$12$TYlslw16oLyMGHTvbLvtI.BCAEtQzaRTghBNnU2c4ZvVogypg6CSm', 10, NULL, '2025-03-23 16:55:46', '2025-03-23 16:55:46', 27, 'eyJpdiI6Ijd4aFpKQURUTWRqNEJZU0daWjU3anc9PSIsInZhbHVlIjoiODFYdGFVZHY0UUJWVENsZkNSbjN0QT09IiwibWFjIjoiYjM4YzE4ZTczYzQ5M2Y1MTcyYzQxMjRmNDlmZWNkNmQxYmNlMTdkNWZlYmJmZjkyOWE2ZmI1MmVlMWZmOTdlMiIsInRhZyI6IiJ9', 'eyJpdiI6IllxckdKaDV5bGhrRkdGQ3RwNnRwOWc9PSIsInZhbHVlIjoiRDh2Z2E2WndnRXNqMUErbFFITkg3dz09IiwibWFjIjoiZmY3YjI0ZWNlM2Q1NWNmMmZhMmU4MmM1MWUyNTllYzA1NjQzYmE5ZTg3ZjU3M2RjYTcxNDAyYmViMzAxOTIzOSIsInRhZyI6IiJ9', 'eyJpdiI6Ilp2d3h3YXdYU3M5NVVTQmxUaTUwVXc9PSIsInZhbHVlIjoiU2N6VkVkeUQ2SVhhWDNud0YrN0lIRjYrRktZcS9pbEZSTktuN1N4RUpvSW13aExwZ2NMSExpT3pCcmcxWHIzSHE4MHkxZlZtZ2JLUjU1NjJXU3lEZTlMa2JpRC83aW5USjBkQUJCdytSaHc9IiwibWFjIjoiNzM4MWU2MWYxYjZlYzljZWUzOWIwYTcxN2M3OWU4NzBlN2U3NzUxMjc3NDc0YWM5YTlkZGY0ZDM4M2YyMzMzNSIsInRhZyI6IiJ9', 'eyJpdiI6IjlzRzBuQ1RIUk8xTnE4T2M5T1NnNEE9PSIsInZhbHVlIjoidTVOY3YrOFJsSHJqWDFOWkhhT01vQT09IiwibWFjIjoiZGFjOWU1MGJjMTEzZmUxZmM4OWRkNjMyZjIwNzU0MGNhYTg3ZWZhNDRiMjQ2YjhiYWJlY2Y5YTg1NzU4MGQ2MCIsInRhZyI6IiJ9', NULL, NULL, 14, 5, 60, 7, 0),
(94, 'MD KABIR', 'MdKabir@gmail.com', 'Waiters', 16, '2020-01-07', 'profile_photos/67e0420fa5994.jpg', NULL, '$2y$12$lGtRstOjEk.q9MJXPgZ1p.opL.vYaOWBF28vlnzvPOzasBWP5N9mG', 10, NULL, '2025-03-23 17:00:03', '2025-03-23 17:17:03', 26, 'eyJpdiI6Ik1VUndoVUVSdVNYcTkwSTRtcG5kYVE9PSIsInZhbHVlIjoicGZpQXBEOEp3MWU4ZTg5SnQ4RkxZZz09IiwibWFjIjoiYTdjYjllZjJhMWU3NThkOGRiZDllYjIyM2ZiM2JmZTBiNjk0ODQxNzI2ZDc4MWVkMzg0ZDliNzc3MzUwZjc2MCIsInRhZyI6IiJ9', 'eyJpdiI6IjRUTmhvNmN6TmJCUjZTY3d3ZHpHK3c9PSIsInZhbHVlIjoiSXhUSEFkaG0xTjQ0TU12WmRHY0J1Zz09IiwibWFjIjoiYThlNGU5NDY5YzQwNmY2NDJlMDMyNjhmNDQ4NjIwZDRiMjk0ZmM0NmRjOTUxMWM1ZGJhNTU5ODczOGU2ZjA1OSIsInRhZyI6IiJ9', 'eyJpdiI6IlhWajhlT1FpWXFCdDhEMU9PUGZiUUE9PSIsInZhbHVlIjoiSTMrbW52Zy96dkV1NjArQzNFR1RlRlIrWUlyNCs2SDJDUzZtc0plV2I2ZHFmMXdzNmIrbWp2cHVuQUwzZUJvcStjNmJ4SXhTUXp1NURzbGpCZFp1anR0V21ZWkpySlI3Z1ZBVHk2YWtwc1hFUmtSZEZiNC95UHVQUG9CREdlRjciLCJtYWMiOiJjMTM2NjM1OTkzYzQ1OWIxNDYzNjFmMmVmYjI3NmQyNTdjYzhmNzVjMGU4NWMxN2UyMWI0NWYxMjA1YmFmOTEzIiwidGFnIjoiIn0=', 'eyJpdiI6IjJ2M2xxRHhXNTdYdjdpdnN2RERIUXc9PSIsInZhbHVlIjoiTUpEZjVKd0RpZE8wYW9NNHpzL1VIZz09IiwibWFjIjoiYTNiZTgxZDBmMTI1MWVjNjA5YzE4MjlkM2RkN2U5NzQzYWE0MTI5N2QyZGZjMmJhOTExZDE1NGM0YTJmYTgwOCIsInRhZyI6IiJ9', NULL, NULL, 14, 5, 60, 7, 0),
(95, 'MUHAMMAD ALIM UKAIL', 'alimukail09@gmail.com', 'Manager', 16, '2020-02-03', 'profile_photos/67e042f163eef.jpg', NULL, '$2y$12$UtVG/rsQjHdrVWOlb65Ule8iOuTRalCqGZtoUQJJH2RniuUZwXeHe', 2, NULL, '2025-03-23 17:20:32', '2025-03-23 17:23:10', 25, NULL, NULL, 'eyJpdiI6Ii9LNFJPRlllU0h1YUkwdzhwRjZBSGc9PSIsInZhbHVlIjoicGRhcEFFUlFQUjNvdUcyb3ZTQ296SzdCbUtGaHpWSlRuYnY3cXptTnMrcXh1OFpXcSt2K0Uxa3ZxcVFadjBjOHJMQ0hCczJvOFV2RC8vZjJ3SUc1SFE9PSIsIm1hYyI6IjAxMzM0MmQzMTQ0NzhiZTYzNjhjMDUzMGZjNDliN2YzOWI3ZjhkNTdjZDIxMzI0OTczNDM4ZmYyNTIyZjA4OTYiLCJ0YWciOiIifQ==', 'eyJpdiI6InNIVkFndFBBSDk5Z0lPaWZBZVpPdUE9PSIsInZhbHVlIjoidFlFeVQ1bzJRb21ycjZucjJhUG04Zz09IiwibWFjIjoiNjA1MjI4YWZiYjc1MjExMWI5OTdmNmQ0NjU3NjJmOTNhZmNhY2YyYTE4MGI4OTcwNzMyNmExNzZiMDExYzczNyIsInRhZyI6IiJ9', NULL, NULL, 14, 5, 60, 7, 0),
(96, 'Muhammad Alim', 'alimukailfortnite@gmail.com', 'Waiters', 16, '2019-06-10', 'profile_photos/67e051ef10acb.jpg', NULL, '$2y$12$wy/zCixHmz59pZ/PHGoB5.mj5wbIkne0U4iBqZmRBjozmX43uNJzO', 10, NULL, '2025-03-23 18:23:43', '2025-04-06 14:48:12', 24, 'eyJpdiI6ImorL0FHem9kRHFqczluckRJeWREVHc9PSIsInZhbHVlIjoiQXBEdERGSitES0tWN3BwU1Q5eUtRQT09IiwibWFjIjoiMWQzOTk1OTIwODA2ODBlN2ZlMzMwYTc4YzEyOWMyZDFkMDNmN2M4NjVjMjg1NWU2YzRjNzEyYzljMDRlMTNhMyIsInRhZyI6IiJ9', 'eyJpdiI6IlNYVmYwd29ZaGhuaEhEYVJSRFhSQmc9PSIsInZhbHVlIjoicGtheVZpemVlRmpYRGQ2bFV0K0ZZUT09IiwibWFjIjoiMmQ4MjgxNjNjYzYwNjhkOGUyMDgxMjMwMDgyNzE4Yjg2MGQ5ODBjOTcwN2UwOWM2ZmVmMDA0ODBiYmRmMTUzYSIsInRhZyI6IiJ9', 'eyJpdiI6InhhOHJRWXFCQjFDOUdCbXpqMno1QVE9PSIsInZhbHVlIjoieHhoam9kODQzYVhjV00xdG1JSUErZGsyc0VUcWRwMlVQWmFtSXVLVm9JNFJGYUovbVQrK0pPcWF5SUltMXJ1TiIsIm1hYyI6Ijk2NjMyN2NjMmE3NWZjOGQ5OTQ0OGVjZjJhMWM2N2ExODEwOTQ2NTk4YjNmMTI0NjNhNDY5NmIyYWEyZGRlYzQiLCJ0YWciOiIifQ==', 'eyJpdiI6Im9NbkNkVW9wdW0yNE5TSDJQbWdXZEE9PSIsInZhbHVlIjoiQWlHZ2VmcUROY1BPZXdrWVVIU2taQT09IiwibWFjIjoiNjM3NDFlYjliOTQzZWE4MDBjNDZjZDFmY2E4MjQwNThjODAxNWNmNTNjMGRhYTAzODgxZmNjOWJlYThjN2VkZiIsInRhZyI6IiJ9', NULL, NULL, 14, 0, 60, 7, 0),
(97, 'Alim ukailtestesteststste', 'alimukail994333@gmail.com', 'Manager', 16, '2016-02-09', NULL, NULL, '$2y$12$/df0k/Wb2HHuQ/sy2c/igeQQpX.P3wnrIQClOou0LaEI5nPZMDGoS', 10, NULL, '2025-03-25 04:39:27', '2025-03-25 04:39:27', 43, 'eyJpdiI6Ijd3NkJhOGs2NFFJZmFVczJudndTS2c9PSIsInZhbHVlIjoiMEdIaWFudTJmZmpmQ3VweEFoVFNrdz09IiwibWFjIjoiZDc2NDM3MTRmZTVlODcxOTU2ZTI3Njk5MWNhMTM0NmMxYmE5ZDNmNjQ2YWI1ZDFjZjNlYWNkZjc0NmJhNThhOCIsInRhZyI6IiJ9', 'eyJpdiI6IlNVLyt3NHdHOGxwbG5iMGNjTFJkMmc9PSIsInZhbHVlIjoidCtSRWE2STNMaEhTc1VXckdNL2xrdz09IiwibWFjIjoiMTA4NzdmY2UwZmIwMmRjNDBkYmFiNGM0NzY4N2Y2ZjM1ODEzNWQ5MGE5OWE0ZjYxNjQyN2FkNGVlYThjMzQzOCIsInRhZyI6IiJ9', 'eyJpdiI6InQrNHhQSWI3R2hCRWpnN2x2TXVQOGc9PSIsInZhbHVlIjoiUnlzelZYVmZtS3oyUXJGNk1obURuczdvZCszTitmM3c1REZmZXFNaFRXcz0iLCJtYWMiOiJkZTliZTk1YTNmMzlhNTYxN2EwYjA4ZGY5ZGNiY2UwYzNlZTY4ODc4NWZlMDAwYTNhMjc5M2I5OGYzYjE0YTY2IiwidGFnIjoiIn0=', 'eyJpdiI6IlVMZWs1aUVEajVoKy9tOXBFdS9Zb0E9PSIsInZhbHVlIjoidEJPQmxUK0VWbjZWT3cvdmNKeE00dz09IiwibWFjIjoiNmMzYmNkMjIyMjY2MmMwZTljYjk5M2MxZWUxNTU5MDI2MmIwYjljNjY4ZDdmYTNmZjk3ZjRmMWE1YWNiM2Q3MSIsInRhZyI6IiJ9', NULL, NULL, 14, 5, 60, 7, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject` (`subject_type`,`subject_id`),
  ADD KEY `causer` (`causer_type`,`causer_id`),
  ADD KEY `activity_log_log_name_index` (`log_name`);

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
-- Indexes for table `leave_requests`
--
ALTER TABLE `leave_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `leave_requests_user_id_foreign` (`user_id`);

--
-- Indexes for table `log_activity`
--
ALTER TABLE `log_activity`
  ADD PRIMARY KEY (`log_id`);

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
-- Indexes for table `payslips`
--
ALTER TABLE `payslips`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payslips_user_id_foreign` (`user_id`);

--
-- Indexes for table `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=575;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leave_requests`
--
ALTER TABLE `leave_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `log_activity`
--
ALTER TABLE `log_activity`
  MODIFY `log_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `payslips`
--
ALTER TABLE `payslips`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `permission`
--
ALTER TABLE `permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3099;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `leave_requests`
--
ALTER TABLE `leave_requests`
  ADD CONSTRAINT `leave_requests_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payslips`
--
ALTER TABLE `payslips`
  ADD CONSTRAINT `payslips_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
