-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 14, 2023 at 12:26 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `avatar` varchar(255) DEFAULT NULL,
  `cover_photo` varchar(255) DEFAULT 'assets/images/profile-bg.jpg',
  `gender` varchar(255) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `role_id`, `name`, `email`, `mobile`, `password`, `remember_token`, `status`, `avatar`, `cover_photo`, `gender`, `date_of_birth`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Asif Jamal', 'asif.sanix@gmail.com', '7894561230', '$2y$10$yddxmLD6rySE7N5XT1OR5uS.G1Oe/UNOYE34lW9gPQvcIq1wFWBDW', '1My44rCElEyK3sp5XZa18D5xT9ANBwxZ768Tq5SfhNuQa8hbg08GKAb3grkk', 1, 'storage/admin/default-avatar.png', 'storage/admin/1679685085.jpg', 'male', NULL, '2019-03-27 00:00:00', '2023-03-24 19:11:25', NULL),
(2, 2, 'Jamal', 'asifjamal251@gmail.com', '8109763160', '$2y$10$HkdFs35.H07KzyY3BmmxJ.E1jCV9NFczzyvki1lHGGHqTqQ5N70VS', NULL, 1, 'storage/admin/default-avatar.png', NULL, 'male', '2022-01-20', '2022-06-25 15:33:05', '2022-06-25 18:31:25', NULL),
(3, 2, 'Asif', 'asif@gmail.com', '12345678', '$2y$10$SpNRIJ3YOFvk/xQzzvQIW.Kk2QjAKOzhBI0Gp.N5HckfgUaIhhFjK', NULL, 1, 'storage/admin/default-avatar.png', NULL, 'female', '2022-06-07', '2022-06-25 18:33:25', '2022-06-25 19:21:18', '2022-06-25 19:21:18');

-- --------------------------------------------------------

--
-- Table structure for table `admin_details`
--

CREATE TABLE `admin_details` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `dob` date DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_password_resets`
--

CREATE TABLE `admin_password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_password_resets`
--

INSERT INTO `admin_password_resets` (`email`, `token`, `created_at`) VALUES
('asifjamal@yopmail.com', '$2y$10$J/boDihlUPMgBF7L2uPVjeaYlLxKjQ4Ifo25TfhwBOt3UCix0kkYm', '2019-06-16 12:06:57'),
('asif.sanix@gmail.com', '$2y$10$cNoidIFR/27b5zYgCugNGeto1P2Dr0uHNen4gUahwteuP1vCgURlm', '2019-08-08 06:19:27'),
('asifjamal@yopmail.com', '$2y$10$J/boDihlUPMgBF7L2uPVjeaYlLxKjQ4Ifo25TfhwBOt3UCix0kkYm', '2019-06-16 12:06:57'),
('asif.sanix@gmail.com', '$2y$10$cNoidIFR/27b5zYgCugNGeto1P2Dr0uHNen4gUahwteuP1vCgURlm', '2019-08-08 06:19:27');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `media_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `slug`, `media_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Relaxo', 'relaxo', 5, '2023-04-07 09:43:27', '2023-04-07 09:50:31', NULL),
(2, 'Raymond', 'raymond', 6, '2023-04-07 09:45:54', '2023-04-07 09:45:54', NULL),
(3, 'Zarlak', 'zarlak', 5, '2023-04-13 12:17:05', '2023-04-13 12:17:05', NULL),
(4, 'Jamie Kay', 'jamie-kay', NULL, '2023-04-14 07:28:13', '2023-04-14 07:28:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `collections`
--

CREATE TABLE `collections` (
  `id` int(11) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `media_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `body` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `published_at` date DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `collections`
--

INSERT INTO `collections` (`id`, `parent`, `media_id`, `title`, `slug`, `body`, `status`, `meta_title`, `meta_description`, `published_at`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, 1, 'Best Sellers', 'best-sellers', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 1, 'Best Sellers', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.', '2023-04-01', '2023-04-07 09:22:08', '2023-04-07 09:22:08', NULL),
(2, NULL, 2, 'New Arrival', 'new-arrival', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.', 1, 'New Arrival', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.', '2023-04-01', '2023-04-07 09:25:28', '2023-04-07 09:25:28', NULL),
(3, NULL, 7, 'Girls Dresses', 'girls-dresses', NULL, 1, 'Girls Dresses', NULL, '2023-04-01', '2023-04-13 12:04:04', '2023-04-13 12:04:04', NULL),
(4, NULL, 9, 'Boys Clothing', 'boys-clothing', NULL, 1, 'Boys Clothing', NULL, '2023-04-01', '2023-04-13 12:19:57', '2023-04-13 12:19:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `medias`
--

CREATE TABLE `medias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `file` varchar(191) DEFAULT NULL,
  `name` varchar(191) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `type` varchar(191) DEFAULT NULL,
  `original_name` varchar(191) DEFAULT NULL,
  `handle` varchar(191) DEFAULT NULL,
  `size` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medias`
--

INSERT INTO `medias` (`id`, `file`, `name`, `slug`, `type`, `original_name`, `handle`, `size`, `created_at`, `updated_at`) VALUES
(1, 'storage/media/megamart-removebg-preview-2.png', 'Megamart-removebg-preview (2)', 'megamart-removebg-preview-2', 'png', 'Megamart-removebg-preview (2).png', 'megamart-removebg-preview-2', '5.12 KB', '2023-04-12 09:37:48', '2023-04-12 09:37:48'),
(2, 'storage/media/megamart-removebg-preview-1.png', 'Megamart-removebg-preview (1)', 'megamart-removebg-preview-1', 'png', 'Megamart-removebg-preview (1).png', 'megamart-removebg-preview-1', '14 KB', '2023-04-12 09:40:02', '2023-04-12 09:40:02'),
(3, 'storage/media/tl.png', 'tl', 'tl', 'png', 'tl.png', 'tl', '9.62 KB', '2023-04-12 10:08:37', '2023-04-12 10:08:37'),
(4, 'storage/media/megamart-4-removebg-preview-1.png', 'Megamart__4_-removebg-preview (1)', 'megamart-4-removebg-preview-1', 'png', 'Megamart__4_-removebg-preview (1).png', 'megamart-4-removebg-preview-1', '8.17 KB', '2023-04-12 10:08:52', '2023-04-12 10:08:52'),
(5, 'storage/media/zarlak-logo-full-color-rgb-720px.png', 'zarlak-logo-full-color-rgb-720px', 'zarlak-logo-full-color-rgb-720px', 'png', 'zarlak-logo-full-color-rgb-720px.png', 'zarlak-logo-full-color-rgb-720px', '39.1 KB', '2023-04-13 06:24:52', '2023-04-13 06:24:52'),
(6, 'storage/media/favicon-7e4f7621-035f-4cdf-9dc6-4a0f7e44243b.png', 'favicon_7e4f7621-035f-4cdf-9dc6-4a0f7e44243b', 'favicon-7e4f7621-035f-4cdf-9dc6-4a0f7e44243b', 'png', 'favicon_7e4f7621-035f-4cdf-9dc6-4a0f7e44243b.png', 'favicon-7e4f7621-035f-4cdf-9dc6-4a0f7e44243b', '1.71 KB', '2023-04-13 06:25:02', '2023-04-13 06:25:02'),
(7, 'storage/media/girls-dresses.png', 'GIRLS-DRESSES', 'girls-dresses', 'png', 'GIRLS-DRESSES.png', 'girls-dresses', '910.01 KB', '2023-04-13 06:27:48', '2023-04-13 06:27:48'),
(8, 'storage/media/calista-dress-dresses-children-of-the-tribe-37049775751414-1200x-49fdb399-8823-4b04-bdfa-b7bf545e3109.png', 'calista-dress-dresses-children-of-the-tribe-37049775751414_1200x_49fdb399-8823-4b04-bdfa-b7bf545e3109', 'calista-dress-dresses-children-of-the-tribe-37049775751414-1200x-49fdb399-8823-4b04-bdfa-b7bf545e3109', 'png', 'calista-dress-dresses-children-of-the-tribe-37049775751414_1200x_49fdb399-8823-4b04-bdfa-b7bf545e3109.png', 'calista-dress-dresses-children-of-the-tribe-37049775751414-1200x-49fdb399-8823-4b04-bdfa-b7bf545e3109', '1.72 MB', '2023-04-13 06:43:59', '2023-04-13 06:43:59'),
(9, 'storage/media/boys-clothing.png', 'BOYS-CLOTHING', 'boys-clothing', 'png', 'BOYS-CLOTHING.png', 'boys-clothing', '1.16 MB', '2023-04-13 06:49:22', '2023-04-13 06:49:22'),
(12, 'storage/media/grown-holiday22-mobile-2e55a505-72e7-4243-a260-ad8e1201c5e5-1-430x.png', 'GROWN-HOLIDAY22-MOBILE_2e55a505-72e7-4243-a260-ad8e1201c5e5_1_430x', 'grown-holiday22-mobile-2e55a505-72e7-4243-a260-ad8e1201c5e5-1-430x', 'png', 'GROWN-HOLIDAY22-MOBILE_2e55a505-72e7-4243-a260-ad8e1201c5e5_1_430x.png', 'grown-holiday22-mobile-2e55a505-72e7-4243-a260-ad8e1201c5e5-1-430x', '181 KB', '2023-04-14 01:17:02', '2023-04-14 01:17:02'),
(13, 'storage/media/banner.png', 'banner', 'banner', 'png', 'banner.png', 'banner', '1.32 MB', '2023-04-14 01:17:02', '2023-04-14 01:17:02'),
(16, 'storage/media/new-project.png', 'New Project', 'new-project', 'png', 'New Project.png', 'new-project', '15.37 KB', '2023-04-14 01:42:12', '2023-04-14 01:42:12'),
(17, 'storage/media/new-1.png', 'new (1)', 'new-1', 'png', 'new (1).png', 'new-1', '1.23 MB', '2023-04-14 01:44:21', '2023-04-14 01:44:21'),
(18, 'storage/media/new-small-1.png', 'new-small (1)', 'new-small-1', 'png', 'new-small (1).png', 'new-small-1', '1.31 MB', '2023-04-14 01:44:21', '2023-04-14 01:44:21'),
(19, 'storage/media/jamiekay-jan6-3950.jpg', 'JamieKay-Jan6-3950', 'jamiekay-jan6-3950', 'jpg', 'JamieKay-Jan6-3950.jpg', 'jamiekay-jan6-3950', '65.96 KB', '2023-04-14 02:02:53', '2023-04-14 02:02:53'),
(20, 'storage/media/jamiekay-jan6-4992.jpg', 'JamieKay-Jan6-4992', 'jamiekay-jan6-4992', 'jpg', 'JamieKay-Jan6-4992.jpg', 'jamiekay-jan6-4992', '82.99 KB', '2023-04-14 02:02:53', '2023-04-14 02:02:53'),
(21, 'storage/media/jamiekay-jan5-1214-c2166ad7-0118-4e17-8769-ef1086add1ef.jpg', 'JamieKay-Jan5-1214_c2166ad7-0118-4e17-8769-ef1086add1ef', 'jamiekay-jan5-1214-c2166ad7-0118-4e17-8769-ef1086add1ef', 'jpg', 'JamieKay-Jan5-1214_c2166ad7-0118-4e17-8769-ef1086add1ef.jpg', 'jamiekay-jan5-1214-c2166ad7-0118-4e17-8769-ef1086add1ef', '103.25 KB', '2023-04-14 02:02:53', '2023-04-14 02:02:53'),
(22, 'storage/media/jamiekay-jan5-1188.jpg', 'JamieKay-Jan5-1188', 'jamiekay-jan5-1188', 'jpg', 'JamieKay-Jan5-1188.jpg', 'jamiekay-jan5-1188', '76.98 KB', '2023-04-14 02:02:53', '2023-04-14 02:02:53'),
(23, 'storage/media/jamiekay-jan5-1153.jpg', 'JamieKay-Jan5-1153', 'jamiekay-jan5-1153', 'jpg', 'JamieKay-Jan5-1153.jpg', 'jamiekay-jan5-1153', '91.6 KB', '2023-04-14 02:02:53', '2023-04-14 02:02:53'),
(24, 'storage/media/februarydrop2organiccottonmuslingemimatop-mauveshadow.jpg', 'FebruaryDrop2OrganicCottonMuslinGemimaTop-MauveShadow', 'februarydrop2organiccottonmuslingemimatop-mauveshadow', 'jpg', 'FebruaryDrop2OrganicCottonMuslinGemimaTop-MauveShadow.jpg', 'februarydrop2organiccottonmuslingemimatop-mauveshadow', '23.96 KB', '2023-04-14 02:02:53', '2023-04-14 02:02:53');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `slug` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `parent` varchar(255) DEFAULT NULL,
  `ordering` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`slug`, `name`, `icon`, `parent`, `ordering`, `status`) VALUES
('admin', 'Admin', 'mdi mdi-account-lock', NULL, 4, 1),
('brand', 'Brand', NULL, 'ecommerce', 3, 1),
('bread', 'Bread', 'ft-target', 'setting', 2, 1),
('collection', 'Collection', NULL, 'ecommerce', 1, 1),
('dashboard', 'Dashboard', 'bx bx-home-circle', NULL, 2, 1),
('ecommerce', 'Ecommerce', 'bx bxs-shopping-bag-alt', NULL, 3, 1),
('home_page', 'Home Page', NULL, NULL, 0, 1),
('media', 'Media', 'bx bx-images', NULL, 5, 1),
('menu', 'Menu', NULL, 'setting', 1, 1),
('product', 'Product', NULL, 'ecommerce', 0, 1),
('product_type', 'Product Type', NULL, 'ecommerce', 4, 1),
('role', 'Role', NULL, 'setting', 0, 1),
('setting', 'Setting', 'mdi mdi-tools', NULL, 7, 1),
('site_setting', 'Site Setting', 'bx bx-cog', NULL, 6, 1),
('slider', 'Slider', NULL, 'home_page', 0, 1),
('tag', 'Tag', NULL, 'ecommerce', 2, 1),
('trusted_section', 'Trusted Section', NULL, 'home_page', 1, 1),
('trusted_sections', 'Trusted Sections', NULL, NULL, 1, 1),
('vendor', 'Vendor', NULL, 'ecommerce', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `product_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Size', '2023-04-13 12:14:25', '2023-04-13 12:14:25'),
(2, 2, 'Size', '2023-04-13 12:25:27', '2023-04-13 12:25:27'),
(3, 3, 'Size', '2023-04-14 07:34:03', '2023-04-14 07:34:03');

-- --------------------------------------------------------

--
-- Table structure for table `option_values`
--

CREATE TABLE `option_values` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `option_id` int(11) NOT NULL,
  `option_value` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `option_values`
--

INSERT INTO `option_values` (`id`, `product_id`, `option_id`, `option_value`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '4-5 Years', '2023-04-13 12:14:25', '2023-04-13 12:17:34'),
(2, 1, 1, '3-4 Years', '2023-04-13 12:14:25', '2023-04-13 12:14:25'),
(3, 1, 1, '4-5 Years', '2023-04-13 12:14:25', '2023-04-13 12:14:25'),
(4, 2, 2, '5 Years', '2023-04-13 12:25:27', '2023-04-14 08:12:10'),
(5, 2, 2, '4 Years', '2023-04-13 12:25:27', '2023-04-13 12:25:27'),
(6, 2, 2, '5 Years', '2023-04-13 12:25:27', '2023-04-13 12:25:27'),
(7, 2, 2, '6 Years', '2023-04-13 12:25:27', '2023-04-13 12:25:27'),
(8, 3, 3, '0-3 Months', '2023-04-14 07:34:03', '2023-04-14 07:34:03'),
(9, 3, 3, '3-6 Months', '2023-04-14 07:34:03', '2023-04-14 07:34:03'),
(10, 3, 3, '6-12 Months', '2023-04-14 07:34:03', '2023-04-14 07:34:03');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `menu_slug` varchar(200) DEFAULT NULL,
  `permission_key` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `menu_slug`, `permission_key`) VALUES
(1, 'role', 'browse_role'),
(2, 'role', 'read_role'),
(3, 'role', 'add_role'),
(4, 'role', 'edit_role'),
(5, 'role', 'delete_role'),
(6, 'menu', 'browse_menu'),
(7, 'menu', 'read_menu'),
(8, 'menu', 'add_menu'),
(9, 'menu', 'edit_menu'),
(10, 'menu', 'delete_menu'),
(11, 'setting', 'browse_setting'),
(12, 'dashboard', 'browse_dashboard'),
(13, 'bread', 'browse_bread'),
(14, 'bread', 'read_bread'),
(15, 'bread', 'add_bread'),
(16, 'bread', 'edit_bread'),
(17, 'bread', 'delete_bread'),
(18, 'site_setting', 'browse_site_setting'),
(19, 'site_setting', 'read_site_setting'),
(20, 'site_setting', 'add_site_setting'),
(21, 'site_setting', 'edit_site_setting'),
(22, 'site_setting', 'delete_site_setting'),
(23, 'site_setting', 'logo_site_setting'),
(24, 'admin', 'browse_admin'),
(25, 'admin', 'read_admin'),
(26, 'admin', 'add_admin'),
(27, 'admin', 'edit_admin'),
(28, 'admin', 'delete_admin'),
(29, 'admin', 'change_email'),
(30, 'admin', 'change_password'),
(31, 'admin', 'change_status'),
(32, 'ecommerce', 'browse_ecommerce'),
(33, 'ecommerce', 'read_ecommerce'),
(34, 'ecommerce', 'add_ecommerce'),
(35, 'ecommerce', 'edit_ecommerce'),
(36, 'ecommerce', 'delete_ecommerce'),
(37, 'product', 'browse_product'),
(38, 'product', 'read_product'),
(39, 'product', 'add_product'),
(40, 'product', 'edit_product'),
(41, 'product', 'delete_product'),
(42, 'collection', 'browse_collection'),
(43, 'collection', 'read_collection'),
(44, 'collection', 'add_collection'),
(45, 'collection', 'edit_collection'),
(46, 'collection', 'delete_collection'),
(47, 'tag', 'browse_tag'),
(48, 'tag', 'read_tag'),
(49, 'tag', 'add_tag'),
(50, 'tag', 'edit_tag'),
(51, 'tag', 'delete_tag'),
(52, 'attribute', 'browse_attribute'),
(53, 'attribute', 'read_attribute'),
(54, 'attribute', 'add_attribute'),
(55, 'attribute', 'edit_attribute'),
(56, 'attribute', 'delete_attribute'),
(57, 'brand', 'browse_brand'),
(58, 'brand', 'read_brand'),
(59, 'brand', 'add_brand'),
(60, 'brand', 'edit_brand'),
(61, 'brand', 'delete_brand'),
(62, 'product_type', 'browse_product_type'),
(63, 'product_type', 'read_product_type'),
(64, 'product_type', 'add_product_type'),
(65, 'product_type', 'edit_product_type'),
(66, 'product_type', 'delete_product_type'),
(67, 'vendor', 'browse_vendor'),
(68, 'vendor', 'read_vendor'),
(69, 'vendor', 'add_vendor'),
(70, 'vendor', 'edit_vendor'),
(71, 'vendor', 'delete_vendor'),
(72, 'media', 'browse_media'),
(73, 'media', 'read_media'),
(74, 'media', 'add_media'),
(75, 'media', 'edit_media'),
(76, 'media', 'delete_media'),
(77, 'slider', 'browse_slider'),
(78, 'slider', 'read_slider'),
(79, 'slider', 'add_slider'),
(80, 'slider', 'edit_slider'),
(81, 'slider', 'delete_slider'),
(92, 'home_page', 'browse_home_page'),
(93, 'home_page', 'read_home_page'),
(94, 'home_page', 'add_home_page'),
(95, 'home_page', 'edit_home_page'),
(96, 'home_page', 'delete_home_page'),
(102, 'trusted_section', 'browse_trusted_section'),
(103, 'trusted_section', 'read_trusted_section'),
(104, 'trusted_section', 'add_trusted_section'),
(105, 'trusted_section', 'edit_trusted_section'),
(106, 'trusted_section', 'delete_trusted_section');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `product_type_id` int(11) DEFAULT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `body` longtext DEFAULT NULL,
  `short_description` text DEFAULT NULL,
  `featured_image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `product_selectio_type` varchar(255) DEFAULT NULL,
  `tax_id` int(11) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `published_at` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `brand_id`, `product_type_id`, `vendor_id`, `title`, `slug`, `body`, `short_description`, `featured_image`, `status`, `product_selectio_type`, `tax_id`, `meta_title`, `meta_description`, `published_at`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 3, 5, 14, 'Alphabet Soup Amped Long Sleeve Tee Multi Tie Dye', 'alphabet-soup-amped-long-sleeve-tee-multi-tie-dye', '<p>Let your kid stand out in style with the <strong>Amped Long Sleeve T-Shirt </strong>in<strong> Multi Tie Dye </strong>from<strong> Alphabet Soup</strong>. This comfy 100% cotton tee features a multicolor tie-dye design with long sleeves perfect for cooler days. The ribbed neckline, embroidered logo, and brand patch to the front hem make it extra special. It\'s all the style and comfort your kiddo needs!</p>\r\n<ul>\r\n<li>Regular fit Longsleeve Tee.</li>\r\n<li>100% Cotton.</li>\r\n<li>All over tie-dye fabric Long sleeves.<br>\r\n</li>\r\n<li>Ribbed neckline Embroidered logo to front chest.</li>\r\n<li>Brand patch to front hem.</li>\r\n<li>Cold machine wash and do not tumble dry, bleach or dry clean.</li>\r\n</ul>', 'Let your kid stand out in style with the Amped Long Sleeve T-Shirt in Multi Tie Dye from Alphabet Soup. This comfy 100% cotton tee features a multicolor tie-dye design with long sleeves perfect for cooler days. The ribbed neckline, embroidered logo, and brand patch to the front hem make it extra special. It\'s all the style and comfort your kiddo needs!', NULL, 1, 'variant', NULL, NULL, NULL, '2023-04-01 00:00:00', '2023-04-13 12:25:27', '2023-04-14 08:10:33', NULL),
(3, 4, 5, 6, 'Organic Cotton Muslin Gemima Top Mauve Shadow', 'organic-cotton-muslin-gemima-top-mauve-shadow', '<p data-mce-fragment=\"1\"><meta charset=\"utf-8\">Let your little one make a statement in this&nbsp;gorgeous&nbsp;<strong>Organic Cotton Muslin&nbsp;Gemima Top</strong>&nbsp;in <strong>Mauve Shadow</strong> by <strong>Jamie Kay</strong>! Crafted from comfortable, breathable 100% organic cotton muslin and embellished with frills at the sleeves and bottom, it\'s perfect for twirling, dancing and any other&nbsp;activities your kid can dream of. Plus, the easy-dressing button-up design makes it a breeze to get them dressed and out the door.&nbsp;</p>\r\n<p data-mce-fragment=\"1\">Features :</p>\r\n<ul data-mce-fragment=\"1\">\r\n<li data-mce-fragment=\"1\">100% organic cotton muslin</li>\r\n<li data-mce-fragment=\"1\">Frill detailed&nbsp;on sleeves and bottom of top</li>\r\n<li data-mce-fragment=\"1\">Buttons on front</li>\r\n<li data-mce-fragment=\"1\">Mauve shadow colour</li>\r\n<li data-mce-fragment=\"1\">Available in sizes&nbsp;0 months -&nbsp;1 year</li>\r\n</ul>\r\n<div data-mce-fragment=\"1\">&nbsp;</div>\r\n<div data-mce-fragment=\"1\">\r\n<p class=\"p1\" data-mce-fragment=\"1\">Why organic cotton?&nbsp;Not only is&nbsp;it&nbsp;a more sustainable farming method, it doesn\'t contain any nasty chemicals which may irritate delicate skin.&nbsp;Muslin is well known for its ability to&nbsp;breath while keeping the body nice&nbsp;and warm. Light and soft - perfect for those summery days or layering up for winter.</p>\r\n<p class=\"p1\" data-mce-fragment=\"1\">For the most accurate garment colour, we recommend referring to the flat&nbsp;lay image on a desktop computer.</p>\r\n<p class=\"p1\" data-mce-fragment=\"1\"><em data-mce-fragment=\"1\">We recommend a delicate wash in laundry bag.&nbsp;Please follow our care label, wash on cold and do not tumble dry.</em></p></div>', 'Let your little one make a statement in this gorgeous Organic Cotton Muslin Gemima Top in Mauve Shadow by Jamie Kay! Crafted from comfortable, breathable 100% organic cotton muslin and embellished with frills at the sleeves and bottom, it\'s perfect for twirling, dancing and any other activities your kid can dream of. Plus, the easy-dressing button-up design makes it a breeze to get them dressed and out the door.', NULL, 1, 'variant', NULL, 'Organic Cotton Muslin Gemima Top Mauve Shadow', 'Let your little one make a statement in this gorgeous Organic Cotton Muslin Gemima Top in Mauve Shadow by Jamie Kay! Crafted from comfortable, breathable 100% organic cotton muslin and embellished with frills at the sleeves and bottom, it\'s perfect for twirling, dancing and any other activities your kid can dream of. Plus, the easy-dressing button-up design makes it a breeze to get them dressed and out the door.', '2023-04-01 00:00:00', '2023-04-14 07:34:03', '2023-04-14 07:34:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_collections`
--

CREATE TABLE `product_collections` (
  `product_id` int(11) NOT NULL,
  `collection_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_collections`
--

INSERT INTO `product_collections` (`product_id`, `collection_id`, `created_at`, `updated_at`) VALUES
(2, 4, '2023-04-13 12:25:27', '2023-04-13 12:25:27'),
(3, 3, '2023-04-14 07:34:03', '2023-04-14 07:34:03');

-- --------------------------------------------------------

--
-- Table structure for table `product_medias`
--

CREATE TABLE `product_medias` (
  `product_id` int(11) NOT NULL,
  `variant_id` int(11) NOT NULL,
  `media_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_medias`
--

INSERT INTO `product_medias` (`product_id`, `variant_id`, `media_id`, `created_at`, `updated_at`) VALUES
(1, 1, 8, '2023-04-13 12:17:34', '2023-04-13 12:17:34'),
(1, 2, 8, '2023-04-13 12:17:34', '2023-04-13 12:17:34'),
(1, 3, 8, '2023-04-13 12:17:34', '2023-04-13 12:17:34'),
(3, 5, 19, '2023-04-14 07:34:03', '2023-04-14 07:34:03'),
(3, 5, 20, '2023-04-14 07:34:03', '2023-04-14 07:34:03'),
(3, 5, 21, '2023-04-14 07:34:03', '2023-04-14 07:34:03'),
(3, 5, 22, '2023-04-14 07:34:03', '2023-04-14 07:34:03'),
(3, 5, 23, '2023-04-14 07:34:03', '2023-04-14 07:34:03'),
(3, 5, 24, '2023-04-14 07:34:03', '2023-04-14 07:34:03'),
(3, 6, 19, '2023-04-14 07:34:03', '2023-04-14 07:34:03'),
(3, 6, 20, '2023-04-14 07:34:03', '2023-04-14 07:34:03'),
(3, 6, 21, '2023-04-14 07:34:03', '2023-04-14 07:34:03'),
(3, 6, 22, '2023-04-14 07:34:03', '2023-04-14 07:34:03'),
(3, 6, 23, '2023-04-14 07:34:03', '2023-04-14 07:34:03'),
(3, 6, 24, '2023-04-14 07:34:03', '2023-04-14 07:34:03'),
(3, 7, 19, '2023-04-14 07:34:03', '2023-04-14 07:34:03'),
(3, 7, 20, '2023-04-14 07:34:03', '2023-04-14 07:34:03'),
(3, 7, 21, '2023-04-14 07:34:03', '2023-04-14 07:34:03'),
(3, 7, 22, '2023-04-14 07:34:03', '2023-04-14 07:34:03'),
(3, 7, 23, '2023-04-14 07:34:03', '2023-04-14 07:34:03'),
(3, 7, 24, '2023-04-14 07:34:03', '2023-04-14 07:34:03'),
(2, 4, 8, '2023-04-14 08:12:10', '2023-04-14 08:12:10'),
(2, 4, 7, '2023-04-14 08:12:10', '2023-04-14 08:12:10');

-- --------------------------------------------------------

--
-- Table structure for table `product_tags`
--

CREATE TABLE `product_tags` (
  `product_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_tags`
--

INSERT INTO `product_tags` (`product_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(3, 1, '2023-04-14 07:34:03', '2023-04-14 07:34:03');

-- --------------------------------------------------------

--
-- Table structure for table `product_types`
--

CREATE TABLE `product_types` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_types`
--

INSERT INTO `product_types` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Jeans', 'jeans', '2023-04-01 05:36:49', '2023-04-01 05:36:49'),
(2, 'T-Shirts', 't-shirt', '2023-04-01 05:39:34', '2023-04-01 05:43:36'),
(4, 'Shoes', 'shoes', '2023-04-07 09:52:50', '2023-04-07 09:52:50'),
(5, 'Dresses', 'dresses', '2023-04-13 12:15:07', '2023-04-13 12:15:07');

-- --------------------------------------------------------

--
-- Table structure for table `product_variants`
--

CREATE TABLE `product_variants` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `variant` varchar(255) NOT NULL,
  `sku` varchar(255) DEFAULT NULL,
  `variant_price` decimal(10,2) DEFAULT NULL,
  `variant_sale_price` decimal(10,2) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `available_stock` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_variants`
--

INSERT INTO `product_variants` (`id`, `product_id`, `variant`, `sku`, `variant_price`, `variant_sale_price`, `stock`, `available_stock`, `created_at`, `updated_at`) VALUES
(1, 1, '2-3 Years', 'CHD001', '39.99', '49.99', 200, 150, '2023-04-13 12:14:26', '2023-04-13 12:14:26'),
(2, 1, '3-4 Years', 'CHD002', '44.99', '49.99', 200, 150, '2023-04-13 12:14:26', '2023-04-13 12:14:26'),
(3, 1, '4-5 Years', 'CHD003', '49.99', '54.99', 200, 150, '2023-04-13 12:14:26', '2023-04-13 12:14:26'),
(4, 2, '3 Years', 'BDR001', '40.00', '50.00', 200, 150, '2023-04-13 12:25:27', '2023-04-13 12:25:27'),
(5, 3, '0-3 Months', 'JKY001', '1299.00', '1500.00', 100, 80, '2023-04-14 07:34:03', '2023-04-14 07:34:03'),
(6, 3, '3-6 Months', 'JKY002', '1399.00', '1800.00', 100, 80, '2023-04-14 07:34:03', '2023-04-14 07:34:03'),
(7, 3, '6-12 Months', 'JKY003', '1499.00', '2100.00', 100, 80, '2023-04-14 07:34:03', '2023-04-14 07:34:03');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `display_name` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
(1, 'root', 'Super Admin', '2019-03-28 06:21:03', '2019-03-28 06:21:03'),
(2, 'Admin', 'Admin', '2019-08-08 16:03:49', '2019-08-08 16:03:49');

-- --------------------------------------------------------

--
-- Table structure for table `role_permissions`
--

CREATE TABLE `role_permissions` (
  `role_id` int(11) NOT NULL,
  `permission_key` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `role_permissions`
--

INSERT INTO `role_permissions` (`role_id`, `permission_key`) VALUES
(1, 'add_admin'),
(1, 'add_attribute'),
(1, 'add_brand'),
(1, 'add_bread'),
(1, 'add_collection'),
(1, 'add_ecommerce'),
(1, 'add_home_page'),
(1, 'add_media'),
(1, 'add_menu'),
(1, 'add_product'),
(1, 'add_product_type'),
(1, 'add_role'),
(1, 'add_site_setting'),
(1, 'add_slider'),
(1, 'add_tag'),
(1, 'add_trusted_section'),
(1, 'add_vendor'),
(1, 'browse_admin'),
(1, 'browse_attribute'),
(1, 'browse_brand'),
(1, 'browse_bread'),
(1, 'browse_collection'),
(1, 'browse_dashboard'),
(1, 'browse_ecommerce'),
(1, 'browse_home_page'),
(1, 'browse_media'),
(1, 'browse_menu'),
(1, 'browse_product'),
(1, 'browse_product_type'),
(1, 'browse_role'),
(1, 'browse_setting'),
(1, 'browse_site_setting'),
(1, 'browse_slider'),
(1, 'browse_tag'),
(1, 'browse_trusted_section'),
(1, 'browse_vendor'),
(1, 'change_email'),
(1, 'change_password'),
(1, 'change_status'),
(1, 'delete_admin'),
(1, 'delete_attribute'),
(1, 'delete_brand'),
(1, 'delete_bread'),
(1, 'delete_collection'),
(1, 'delete_ecommerce'),
(1, 'delete_home_page'),
(1, 'delete_media'),
(1, 'delete_menu'),
(1, 'delete_product'),
(1, 'delete_product_type'),
(1, 'delete_role'),
(1, 'delete_site_setting'),
(1, 'delete_slider'),
(1, 'delete_tag'),
(1, 'delete_trusted_section'),
(1, 'delete_vendor'),
(1, 'edit_admin'),
(1, 'edit_attribute'),
(1, 'edit_brand'),
(1, 'edit_bread'),
(1, 'edit_collection'),
(1, 'edit_ecommerce'),
(1, 'edit_home_page'),
(1, 'edit_media'),
(1, 'edit_menu'),
(1, 'edit_product'),
(1, 'edit_product_type'),
(1, 'edit_role'),
(1, 'edit_site_setting'),
(1, 'edit_slider'),
(1, 'edit_tag'),
(1, 'edit_trusted_section'),
(1, 'edit_vendor'),
(1, 'logo_site_setting'),
(1, 'read_admin'),
(1, 'read_attribute'),
(1, 'read_brand'),
(1, 'read_bread'),
(1, 'read_collection'),
(1, 'read_ecommerce'),
(1, 'read_home_page'),
(1, 'read_media'),
(1, 'read_menu'),
(1, 'read_product'),
(1, 'read_product_type'),
(1, 'read_role'),
(1, 'read_site_setting'),
(1, 'read_slider'),
(1, 'read_tag'),
(1, 'read_trusted_section'),
(1, 'read_vendor');

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `logo` int(11) DEFAULT NULL,
  `favicon` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contact_no` varchar(255) DEFAULT NULL,
  `country` varchar(200) DEFAULT NULL,
  `state` varchar(200) DEFAULT NULL,
  `city` varchar(200) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `title`, `description`, `logo`, `favicon`, `email`, `contact_no`, `country`, `state`, `city`, `address`, `created_at`, `updated_at`) VALUES
(1, 'AR Technology', 'Partner with an award-winning app development company to take your brick-and-mortar business online and reach a wider audience with powerful mobile and web solutions.', 5, 6, 'info@artechnology.in', '+91 8109763160', 'India', 'Delhi', 'New Delhi', '95-B DDA Flat Mata Suntri Road\r\nNew Delhi-110002', '2022-06-26 15:46:11', '2023-04-13 06:25:08');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `body` text DEFAULT NULL,
  `media_id` int(11) NOT NULL,
  `small_media_id` int(11) DEFAULT NULL,
  `button_text` varchar(255) DEFAULT NULL,
  `button_link` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `content_align` varchar(255) DEFAULT 'justify-content-end',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `subtitle`, `body`, `media_id`, `small_media_id`, `button_text`, `button_link`, `status`, `content_align`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, 13, 12, NULL, NULL, 1, NULL, '2023-04-14 07:04:21', '2023-04-14 07:06:52'),
(2, NULL, NULL, NULL, 17, 18, NULL, NULL, 1, NULL, '2023-04-14 07:14:59', '2023-04-14 07:14:59');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `slug` varchar(150) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Jeans', 'jeans', '2023-04-01 05:29:02', '2023-04-01 05:29:02'),
(2, 'T-Shirt', 't-shirt', '2023-04-01 05:29:09', '2023-04-01 05:29:09'),
(3, 'Shoes', 'shoes', '2023-04-07 09:35:24', '2023-04-07 09:35:24');

-- --------------------------------------------------------

--
-- Table structure for table `trusted_sections`
--

CREATE TABLE `trusted_sections` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `icon_type` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trusted_sections`
--

INSERT INTO `trusted_sections` (`id`, `title`, `subtitle`, `icon`, `icon_type`, `created_at`, `updated_at`) VALUES
(1, 'Free Shipping & Return', 'On all order over $99.00', '27', 'image', '2023-04-11 16:13:01', '2023-04-11 16:13:01'),
(2, 'Customer Support 24/7', 'Instant access to support', '28', 'image', '2023-04-11 16:15:07', '2023-04-11 16:15:07'),
(3, '100% Secure Payment', 'We ensure secure payment!', '29', 'image', '2023-04-11 17:03:30', '2023-04-11 17:03:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Asif Jamal', 'asif.sanix@gmail.com', NULL, '$2y$10$wW779oAEb4cJOh/Xpej9iOevq/0KcVAKTsB5jRoR4VHkwfpzUp2L2', NULL, 1, '2023-02-14 07:39:43', '2023-02-14 07:39:43'),
(2, 'Sana', 'sana@gmail.com', NULL, '$2y$10$Y7fn5sAmZ47VXEPZjPql0e3PhuIl.dx/2x.YN/TW5S56SD83Y8v8m', NULL, 1, '2023-02-14 11:55:45', '2023-02-14 11:55:45');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `slug` varchar(150) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Kreal', 'kreal', '2023-04-07 09:13:13', '2023-04-07 09:13:13'),
(2, 'Meshlya', 'meshlya', '2023-04-07 09:13:32', '2023-04-07 09:13:32'),
(3, 'Woodland', 'woodland', '2023-04-07 09:16:10', '2023-04-07 09:16:10'),
(4, 'Zara', 'zara', '2023-04-07 09:16:15', '2023-04-07 09:16:15'),
(5, 'Baggit', 'baggit', '2023-04-07 09:16:48', '2023-04-07 09:16:48'),
(6, 'BIBA', 'biba', '2023-04-07 09:17:08', '2023-04-07 09:17:08'),
(7, 'Aurelia', 'aurelia', '2023-04-07 09:17:17', '2023-04-07 09:17:17'),
(8, 'Allen Solly', 'allen-solly', '2023-04-07 09:17:28', '2023-04-07 09:17:28'),
(9, 'Van Heusen', 'van-heusen', '2023-04-07 09:17:47', '2023-04-07 09:17:47'),
(10, 'Arrow', 'arrow', '2023-04-07 09:17:56', '2023-04-07 09:17:56'),
(11, 'Raymond', 'raymond', '2023-04-07 09:18:03', '2023-04-07 09:18:03'),
(12, 'Sparx', 'sparx', '2023-04-07 09:18:59', '2023-04-07 09:18:59'),
(13, 'Relaxo', 'relaxo', '2023-04-07 09:19:14', '2023-04-07 09:19:14'),
(14, 'Children Of The Tribe', 'children-of-the-tribe', '2023-04-13 12:15:45', '2023-04-13 12:15:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_details`
--
ALTER TABLE `admin_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_password_resets`
--
ALTER TABLE `admin_password_resets`
  ADD KEY `password_resets_email_index` (`email`(191));

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `collections`
--
ALTER TABLE `collections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medias`
--
ALTER TABLE `medias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`slug`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `option_values`
--
ALTER TABLE `option_values`
  ADD PRIMARY KEY (`id`);

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
  ADD UNIQUE KEY `key` (`permission_key`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_collections`
--
ALTER TABLE `product_collections`
  ADD KEY `collection_id` (`collection_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product_tags`
--
ALTER TABLE `product_tags`
  ADD KEY `product_tags_product_id_foreign` (`product_id`),
  ADD KEY `product_tags_tag_id_foreign` (`tag_id`);

--
-- Indexes for table `product_types`
--
ALTER TABLE `product_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_variants`
--
ALTER TABLE `product_variants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD UNIQUE KEY `role_id_2` (`role_id`,`permission_key`);

--
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trusted_sections`
--
ALTER TABLE `trusted_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `admin_details`
--
ALTER TABLE `admin_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `collections`
--
ALTER TABLE `collections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `medias`
--
ALTER TABLE `medias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `option_values`
--
ALTER TABLE `option_values`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_types`
--
ALTER TABLE `product_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_variants`
--
ALTER TABLE `product_variants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `trusted_sections`
--
ALTER TABLE `trusted_sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product_collections`
--
ALTER TABLE `product_collections`
  ADD CONSTRAINT `product_collections_collection_id_foreign` FOREIGN KEY (`collection_id`) REFERENCES `collections` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_collections_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_tags`
--
ALTER TABLE `product_tags`
  ADD CONSTRAINT `product_tags_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_tags_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
