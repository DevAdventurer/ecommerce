-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 05, 2023 at 11:52 AM
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
('asif.sanix@gmail.com', '$2y$10$cNoidIFR/27b5zYgCugNGeto1P2Dr0uHNen4gUahwteuP1vCgURlm', '2019-08-08 06:19:27');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `slug`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Adidas', 'adidas', 'storage/brands/1680327039.png', '2023-04-01 05:30:39', '2023-04-01 05:30:39', NULL);

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
(1, NULL, 26, 'Men', 'men', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, 'Men', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', '2023-01-01', '2023-04-01 05:22:11', '2023-04-05 06:14:34', NULL),
(2, NULL, 14, 'Women', 'women', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, 'Women', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,', '2023-01-01', '2023-04-01 05:23:22', '2023-04-05 05:17:56', NULL);

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
(13, 'storage/media/group-3934-7.png', 'Group 3934 (7)', 'group-3934-7', 'png', 'Group 3934 (7).png', 'group-3934-7', '201.56 KB', '2023-04-04 06:53:04', '2023-04-04 06:53:04'),
(14, 'storage/media/group-3934-8.png', 'Group 3934 (8)', 'group-3934-8', 'png', 'Group 3934 (8).png', 'group-3934-8', '185.21 KB', '2023-04-04 06:53:19', '2023-04-04 06:53:19'),
(15, 'storage/media/group-3934-8-2.png', 'Group 3934 (8)', 'group-3934-8-2', 'png', 'Group 3934 (8).png', 'group-3934-8', '185.21 KB', '2023-04-04 06:59:08', '2023-04-04 06:59:08'),
(16, 'storage/media/group-3934-7-2.png', 'Group 3934 (7)', 'group-3934-7-2', 'png', 'Group 3934 (7).png', 'group-3934-7', '201.56 KB', '2023-04-04 06:59:08', '2023-04-04 06:59:08'),
(17, 'storage/media/accessories.png', 'accessories', 'accessories', 'png', 'accessories.png', 'accessories', '67.93 KB', '2023-04-05 00:41:15', '2023-04-05 00:41:15'),
(18, 'storage/media/healthcare-bears.png', 'healthcare-bears', 'healthcare-bears', 'png', 'healthcare-bears.png', 'healthcare-bears', '1.84 MB', '2023-04-05 00:41:15', '2023-04-05 00:41:15'),
(19, 'storage/media/first-responder-bears.png', 'first-responder-bears', 'first-responder-bears', 'png', 'first-responder-bears.png', 'first-responder-bears', '66.48 KB', '2023-04-05 00:41:15', '2023-04-05 00:41:15'),
(20, 'storage/media/military-bears.png', 'military-bears', 'military-bears', 'png', 'military-bears.png', 'military-bears', '82.53 KB', '2023-04-05 00:41:15', '2023-04-05 00:41:15'),
(21, 'storage/media/glemorg.png', 'glemorg', 'glemorg', 'png', 'glemorg.png', 'glemorg', '12.09 KB', '2023-04-05 00:41:48', '2023-04-05 00:41:48'),
(22, 'storage/media/adidas-logo-svg.png', 'Adidas_Logo.svg', 'adidas-logo-svg', 'png', 'Adidas_Logo.svg.png', 'adidas-logosvg', '34.03 KB', '2023-04-05 00:41:48', '2023-04-05 00:41:48'),
(23, 'storage/media/group-3934-6.png', 'Group 3934 (6)', 'group-3934-6', 'png', 'Group 3934 (6).png', 'group-3934-6', '130.96 KB', '2023-04-05 00:41:48', '2023-04-05 00:41:48'),
(24, 'storage/media/group-3934-5.png', 'Group 3934 (5)', 'group-3934-5', 'png', 'Group 3934 (5).png', 'group-3934-5', '174.79 KB', '2023-04-05 00:41:48', '2023-04-05 00:41:48'),
(25, 'storage/media/group-3934-4.png', 'Group 3934 (4)', 'group-3934-4', 'png', 'Group 3934 (4).png', 'group-3934-4', '142.47 KB', '2023-04-05 00:41:48', '2023-04-05 00:41:48'),
(26, 'storage/media/group-3934-2.png', 'Group 3934 (2)', 'group-3934-2', 'png', 'Group 3934 (2).png', 'group-3934-2', '188.08 KB', '2023-04-05 00:41:48', '2023-04-05 00:41:48'),
(27, 'storage/media/group-3934-1.png', 'Group 3934 (1)', 'group-3934-1', 'png', 'Group 3934 (1).png', 'group-3934-1', '120.92 KB', '2023-04-05 00:41:48', '2023-04-05 00:41:48'),
(28, 'storage/media/group-3934.png', 'Group 3934', 'group-3934', 'png', 'Group 3934.png', 'group-3934', '187.87 KB', '2023-04-05 00:41:48', '2023-04-05 00:41:48'),
(29, 'storage/media/gifting-moonie.png', 'GIFTING-MOONIE', 'gifting-moonie', 'png', 'GIFTING-MOONIE.png', 'gifting-moonie', '1.66 MB', '2023-04-05 00:41:48', '2023-04-05 00:41:48'),
(30, 'storage/media/f1.jpg', 'f1', 'f1', 'jpg', 'f1.jpg', 'f1', '170.88 KB', '2023-04-05 03:46:46', '2023-04-05 03:46:46'),
(31, 'storage/media/f2.jpg', 'f2', 'f2', 'jpg', 'f2.jpg', 'f2', '236.81 KB', '2023-04-05 04:07:30', '2023-04-05 04:07:30'),
(32, 'storage/media/logo.png', 'logo', 'logo', 'png', 'logo.png', 'logo', '1.21 KB', '2023-04-05 04:08:57', '2023-04-05 04:08:57');

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
('admin', 'Admin', 'mdi mdi-account-lock', NULL, 2, 1),
('brand', 'Brand', NULL, 'ecommerce', 3, 1),
('bread', 'Bread', 'ft-target', 'setting', 2, 1),
('collection', 'Collection', NULL, 'ecommerce', 1, 1),
('dashboard', 'Dashboard', 'bx bx-home-circle', NULL, 0, 1),
('ecommerce', 'Ecommerce', 'bx bxs-shopping-bag-alt', NULL, 1, 1),
('media', 'Media', 'bx bx-images', NULL, 3, 1),
('menu', 'Menu', NULL, 'setting', 1, 1),
('product', 'Product', NULL, 'ecommerce', 0, 1),
('product_type', 'Product Type', NULL, 'ecommerce', 4, 1),
('role', 'Role', NULL, 'setting', 0, 1),
('setting', 'Setting', 'mdi mdi-tools', NULL, 5, 1),
('site_setting', 'Site Setting', 'bx bx-cog', NULL, 4, 1),
('slider', 'Slider', NULL, NULL, NULL, 1),
('tag', 'Tag', NULL, 'ecommerce', 2, 1),
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
(1, 1, 'Size', '2023-04-03 19:34:13', '2023-04-03 19:34:13'),
(2, 1, 'Color', '2023-04-03 19:34:13', '2023-04-03 19:34:13'),
(3, 2, 'Size', '2023-04-04 08:50:11', '2023-04-04 08:50:11'),
(4, 2, 'Color', '2023-04-04 08:50:11', '2023-04-04 08:50:11'),
(5, 2, 'Material', '2023-04-04 08:50:11', '2023-04-04 08:50:11');

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
(1, 1, 1, 'L', '2023-04-03 19:34:13', '2023-04-03 19:34:13'),
(2, 1, 1, 'M', '2023-04-03 19:34:13', '2023-04-03 19:34:13'),
(3, 1, 2, 'Red', '2023-04-03 19:34:13', '2023-04-03 19:34:13'),
(4, 1, 2, 'Green', '2023-04-03 19:34:13', '2023-04-03 19:34:13'),
(5, 2, 3, 'S', '2023-04-04 08:50:11', '2023-04-04 08:50:11'),
(6, 2, 3, 'M', '2023-04-04 08:50:11', '2023-04-04 08:50:11'),
(7, 2, 3, 'L', '2023-04-04 08:50:11', '2023-04-04 08:50:11'),
(8, 2, 3, 'XL', '2023-04-04 08:50:11', '2023-04-04 08:50:11'),
(9, 2, 4, 'Red', '2023-04-04 08:50:11', '2023-04-04 08:50:11'),
(10, 2, 4, 'Green', '2023-04-04 08:50:11', '2023-04-04 08:50:11'),
(11, 2, 4, 'Blue', '2023-04-04 08:50:11', '2023-04-04 08:50:11'),
(12, 2, 5, 'Wool', '2023-04-04 08:50:11', '2023-04-04 08:50:11'),
(13, 2, 5, 'Cottom', '2023-04-04 08:50:11', '2023-04-04 08:50:11');

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
(81, 'slider', 'delete_slider');

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
  `price` decimal(10,2) DEFAULT NULL,
  `sale_price` decimal(10,2) DEFAULT NULL,
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

INSERT INTO `products` (`id`, `brand_id`, `product_type_id`, `vendor_id`, `title`, `slug`, `body`, `short_description`, `featured_image`, `status`, `price`, `sale_price`, `tax_id`, `meta_title`, `meta_description`, `published_at`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 1, 'Test Product', 'test-product', '<p>Hello World</p>', '<p>Short Deskription</p>', 'storage/products/1680550453.jpg', 1, '900.00', '1500.00', NULL, 'Test Product', 'Hello World', '2023-04-01', '2023-04-03 19:34:13', '2023-04-03 19:34:13', NULL),
(2, 1, 2, 2, 'New Product', 'new-product', '<p>Hello World</p>', '<p>New Product<br></p>', 'storage/products/1680598211.png', 1, '599.00', '1200.00', NULL, 'New Product', 'New Product', '2023-04-01', '2023-04-04 08:50:11', '2023-04-04 08:50:11', NULL);

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
(1, 1, '2023-04-03 19:34:13', '2023-04-03 19:34:13'),
(2, 2, '2023-04-04 08:50:11', '2023-04-04 08:50:11');

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
(1, 1, '2023-04-03 19:34:13', '2023-04-03 19:34:13'),
(2, 1, '2023-04-04 08:50:11', '2023-04-04 08:50:11'),
(2, 2, '2023-04-04 08:50:11', '2023-04-04 08:50:11');

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
(2, 'T-Shirts', 't-shirt', '2023-04-01 05:39:34', '2023-04-01 05:43:36');

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
(1, 1, 'L/Red', 'LR00', '900.00', '1500.00', 200, 150, '2023-04-03 19:34:13', '2023-04-03 19:34:13'),
(2, 1, 'L/Green', 'LG00', '890.00', '1500.00', 350, 250, '2023-04-03 19:34:13', '2023-04-03 19:34:13'),
(3, 1, 'M/Red', 'MR00', '999.00', '1800.00', 100, 60, '2023-04-03 19:34:13', '2023-04-03 19:34:13'),
(4, 1, 'M/Green', 'MG000', '899.00', '1200.00', 700, 600, '2023-04-03 19:34:13', '2023-04-03 19:34:13'),
(5, 2, 'S/Red/Wool', 'SRW', '999.00', '1200.00', 100, 100, '2023-04-04 08:50:11', '2023-04-04 08:50:11'),
(6, 2, 'S/Red/Cottom', 'SRC', '999.00', '1200.00', 100, 100, '2023-04-04 08:50:11', '2023-04-04 08:50:11'),
(7, 2, 'S/Green/Wool', 'SGW', '999.00', '1200.00', 100, 100, '2023-04-04 08:50:11', '2023-04-04 08:50:11'),
(8, 2, 'S/Green/Cottom', 'SGC', '999.00', '1200.00', 100, 100, '2023-04-04 08:50:11', '2023-04-04 08:50:11'),
(9, 2, 'S/Blue/Wool', 'SBW', '999.00', '1200.00', 100, 100, '2023-04-04 08:50:11', '2023-04-04 08:50:11'),
(10, 2, 'S/Blue/Cottom', 'SBC', '999.00', '1200.00', 100, 100, '2023-04-04 08:50:11', '2023-04-04 08:50:11'),
(11, 2, 'M/Red/Wool', 'MRW', '1199.00', '1500.00', 100, 100, '2023-04-04 08:50:11', '2023-04-04 08:50:11'),
(12, 2, 'M/Red/Cottom', 'MRC', '1199.00', '1500.00', 100, 100, '2023-04-04 08:50:11', '2023-04-04 08:50:11'),
(13, 2, 'M/Green/Wool', 'MGW', '1199.00', '1500.00', 100, 100, '2023-04-04 08:50:11', '2023-04-04 08:50:11'),
(14, 2, 'M/Green/Cottom', 'MGC', '1199.00', '1500.00', 100, 100, '2023-04-04 08:50:11', '2023-04-04 08:50:11'),
(15, 2, 'M/Blue/Wool', 'MBW', '1199.00', '1500.00', 100, 100, '2023-04-04 08:50:11', '2023-04-04 08:50:11'),
(16, 2, 'M/Blue/Cottom', 'MBC', '1199.00', '1500.00', 100, 100, '2023-04-04 08:50:11', '2023-04-04 08:50:11'),
(17, 2, 'L/Red/Wool', 'LRW', '1499.00', '1800.00', 100, 100, '2023-04-04 08:50:11', '2023-04-04 08:50:11'),
(18, 2, 'L/Red/Cottom', 'LRC', '1499.00', '1800.00', 100, 100, '2023-04-04 08:50:11', '2023-04-04 08:50:11'),
(19, 2, 'L/Green/Wool', 'LRW', '1499.00', '1800.00', 100, 100, '2023-04-04 08:50:11', '2023-04-04 08:50:11'),
(20, 2, 'L/Green/Cottom', 'LGC', '1499.00', '1800.00', 100, 100, '2023-04-04 08:50:11', '2023-04-04 08:50:11'),
(21, 2, 'L/Blue/Wool', 'LBW', '1499.00', '1800.00', 100, 100, '2023-04-04 08:50:11', '2023-04-04 08:50:11'),
(22, 2, 'L/Blue/Cottom', 'LBC', '1499.00', '1800.00', 100, 100, '2023-04-04 08:50:11', '2023-04-04 08:50:11'),
(23, 2, 'XL/Red/Wool', 'XLRW', '1799.00', '2100.00', 100, 100, '2023-04-04 08:50:11', '2023-04-04 08:50:11'),
(24, 2, 'XL/Red/Cottom', 'XLRC', '1799.00', '2100.00', 100, 100, '2023-04-04 08:50:11', '2023-04-04 08:50:11'),
(25, 2, 'XL/Green/Wool', 'XLGW', '1799.00', '2100.00', 100, 100, '2023-04-04 08:50:11', '2023-04-04 08:50:11'),
(26, 2, 'XL/Green/Cottom', 'XLGC', '1799.00', '2100.00', 100, 100, '2023-04-04 08:50:11', '2023-04-04 08:50:11'),
(27, 2, 'XL/Blue/Wool', 'XLBW', '1799.00', '2100.00', 100, 100, '2023-04-04 08:50:11', '2023-04-04 08:50:11'),
(28, 2, 'XL/Blue/Cottom', 'XLBC', '1799.00', '2100.00', 100, 100, '2023-04-04 08:50:11', '2023-04-04 08:50:11');

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
(1, 'add_media'),
(1, 'add_menu'),
(1, 'add_product'),
(1, 'add_product_type'),
(1, 'add_role'),
(1, 'add_site_setting'),
(1, 'add_slider'),
(1, 'add_tag'),
(1, 'add_vendor'),
(1, 'browse_admin'),
(1, 'browse_attribute'),
(1, 'browse_brand'),
(1, 'browse_bread'),
(1, 'browse_collection'),
(1, 'browse_dashboard'),
(1, 'browse_ecommerce'),
(1, 'browse_media'),
(1, 'browse_menu'),
(1, 'browse_product'),
(1, 'browse_product_type'),
(1, 'browse_role'),
(1, 'browse_setting'),
(1, 'browse_site_setting'),
(1, 'browse_slider'),
(1, 'browse_tag'),
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
(1, 'delete_media'),
(1, 'delete_menu'),
(1, 'delete_product'),
(1, 'delete_product_type'),
(1, 'delete_role'),
(1, 'delete_site_setting'),
(1, 'delete_slider'),
(1, 'delete_tag'),
(1, 'delete_vendor'),
(1, 'edit_admin'),
(1, 'edit_attribute'),
(1, 'edit_brand'),
(1, 'edit_bread'),
(1, 'edit_collection'),
(1, 'edit_ecommerce'),
(1, 'edit_media'),
(1, 'edit_menu'),
(1, 'edit_product'),
(1, 'edit_product_type'),
(1, 'edit_role'),
(1, 'edit_site_setting'),
(1, 'edit_slider'),
(1, 'edit_tag'),
(1, 'edit_vendor'),
(1, 'logo_site_setting'),
(1, 'read_admin'),
(1, 'read_attribute'),
(1, 'read_brand'),
(1, 'read_bread'),
(1, 'read_collection'),
(1, 'read_ecommerce'),
(1, 'read_media'),
(1, 'read_menu'),
(1, 'read_product'),
(1, 'read_product_type'),
(1, 'read_role'),
(1, 'read_site_setting'),
(1, 'read_slider'),
(1, 'read_tag'),
(1, 'read_vendor');

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `favicon` varchar(255) DEFAULT NULL,
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
(1, 'AR Technology', 'Partner with an award-winning app development company to take your brick-and-mortar business online and reach a wider audience with powerful mobile and web solutions.', 'storage/site-setting/default-logo.png', 'storage/site-setting/default-favicon.png', 'info@artechnology.in', '+91 8109763160', 'India', 'Delhi', 'New Delhi', '95-B DDA Flat Mata Suntri Road\r\nNew Delhi-110002', '2022-06-26 15:46:11', '2023-02-16 14:51:43');

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
  `button_text` varchar(255) DEFAULT NULL,
  `button_link` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `subtitle`, `body`, `media_id`, `button_text`, `button_link`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Discover The Best Furniture', 'Look for your inspiration here', 'The services provided by the officials was smooth and satisfactory. Products and goods delivered were up to satisfaction', 31, 'SHOP NOW', '#', 1, '2023-04-05 09:23:15', '2023-04-05 09:38:15'),
(2, 'Discover The Best Furniture', 'Look for your inspiration here', 'The services provided by the officials was smooth and satisfactory. Products and goods delivered were up to satisfaction', 30, 'SHOP NOW', '#', 1, '2023-04-05 09:35:32', '2023-04-05 09:35:32');

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
(2, 'T-Shirt', 't-shirt', '2023-04-01 05:29:09', '2023-04-01 05:29:09');

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
(1, 'Lee Cooper', 'lee-cooper', '2023-04-01 05:58:19', '2023-04-01 05:58:19'),
(2, 'Zara', 'zara', '2023-04-01 06:04:44', '2023-04-01 06:04:44');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `collections`
--
ALTER TABLE `collections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `medias`
--
ALTER TABLE `medias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `option_values`
--
ALTER TABLE `option_values`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_types`
--
ALTER TABLE `product_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_variants`
--
ALTER TABLE `product_variants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
