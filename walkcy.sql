-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2024 at 12:48 PM
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
-- Database: `walkcy`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `pincode` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `added_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `user_id`, `country`, `state`, `city`, `pincode`, `address`, `active_status`, `is_deleted`, `added_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '21', 'india', 'uttarpradesh', 'lucknow', '226004', 'bb ginj', 1, 0, NULL, NULL, NULL, '2022-10-13 11:32:02', '2022-10-13 06:13:03', NULL),
(2, '21', 'india', 'uttarpradesh', 'lucknow', '226004', 'bb ginj', 1, 0, NULL, NULL, NULL, '2022-10-13 11:32:30', NULL, NULL),
(3, '21', 'india', 'uttarpradesh', 'lucknow', '226010', 'bb ginj', 1, 0, NULL, NULL, NULL, '2022-10-13 11:32:53', '2022-11-27 17:11:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `attendance` tinyint(4) DEFAULT NULL COMMENT '1=present',
  `date` timestamp NULL DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `added_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `user_id`, `attendance`, `date`, `active_status`, `is_deleted`, `added_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, '2022-10-31 18:30:00', 1, 0, 1, NULL, NULL, '2022-11-01 14:07:46', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE `attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `option` varchar(255) DEFAULT NULL,
  `is_required` varchar(255) DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `added_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attributes`
--

INSERT INTO `attributes` (`id`, `title`, `type`, `name`, `option`, `is_required`, `active_status`, `is_deleted`, `added_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(8, 'name', 'text', 'name', NULL, '1', 1, 0, 1, NULL, NULL, '2022-09-17 13:54:05', NULL, NULL),
(9, 'document', 'file', 'document', NULL, '1', 1, 0, 1, NULL, NULL, '2022-09-17 13:54:20', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `attribute_values`
--

CREATE TABLE `attribute_values` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `form_id` varchar(255) DEFAULT NULL,
  `attribute_id` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `added_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `added_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `name`, `cat_id`, `image`, `description`, `active_status`, `is_deleted`, `added_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'this is th first blog', 2, 'http://127.0.0.1:8000/uploads/635c13596a875-logo.png', '<p>this is the firat blog in aaaaaaaaaaaaaaaaa</p>', 1, 0, 1, 1, NULL, '2022-10-28 17:37:29', '2022-10-28 12:18:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `added_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `name`, `image`, `active_status`, `is_deleted`, `added_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'blog2', 'http://127.0.0.1:8000/uploads/635c0d06c2f15-logo.png', 1, 1, 1, 1, NULL, '2022-10-28 17:10:14', '2022-10-28 11:40:37', NULL),
(2, 'blog cat', 'http://127.0.0.1:8000/uploads/635c12b7ad184-belive.png', 1, 0, 1, NULL, NULL, '2022-10-28 17:34:47', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `added_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `image`, `active_status`, `is_deleted`, `added_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Ayusharogyam', 'http://127.0.0.1:8000/uploads/635fb264a8ac6-ezgif-1-0c3276ad62.jpg', 1, 1, 1, NULL, NULL, '2022-10-31 11:32:52', '2023-08-01 03:55:37', NULL),
(2, 'Walkcy', 'https://ecom.todaytalk.in/uploads/64c89e62a187e-product-1.webp', 1, 0, 1, NULL, NULL, '2023-08-01 05:55:46', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `brand_partners`
--

CREATE TABLE `brand_partners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `added_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brand_partners`
--

INSERT INTO `brand_partners` (`id`, `image`, `active_status`, `is_deleted`, `added_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'http://127.0.0.1:8000/uploads/636a8d7ab3941-logo.png', 1, 1, 1, 1, NULL, '2022-11-08 17:10:18', '2024-02-03 06:04:13', NULL),
(2, 'http://127.0.0.1:8000/uploads/636a8d8825ad1-Untitled design (12).png', 1, 1, 1, 1, NULL, '2022-11-08 17:10:32', '2022-11-08 11:40:41', NULL),
(3, 'http://127.0.0.1:8000/uploads/636a8d967ad66-ezgif-1-e39dd31113.jpg', 1, 1, 1, NULL, NULL, '2022-11-08 17:10:46', '2024-02-03 06:04:15', NULL),
(4, 'http://127.0.0.1:8000/uploads/636a9024f24d3-ezgif-1-e39dd31113.jpg', 1, 1, 1, NULL, NULL, '2022-11-08 17:21:40', '2024-02-03 06:04:18', NULL),
(5, 'http://127.0.0.1:8000/uploads/636a902942948-ezgif-1-0c3276ad62.jpg', 1, 1, 1, NULL, NULL, '2022-11-08 17:21:45', '2024-02-03 06:04:20', NULL),
(6, 'http://127.0.0.1:8000/uploads/636a902f470f0-Untitled design (12).png', 1, 1, 1, NULL, NULL, '2022-11-08 17:21:51', '2024-02-03 06:04:25', NULL),
(7, 'http://127.0.0.1:8000/uploads/636a90332d7a7-Untitled design (14).png', 1, 1, 1, NULL, NULL, '2022-11-08 17:21:55', '2024-02-03 06:04:23', NULL),
(8, 'http://127.0.0.1:8000/uploads/65be25343c127-insta5.jpg', 1, 0, 1, NULL, NULL, '2024-02-03 11:36:20', NULL, NULL),
(9, 'http://127.0.0.1:8000/uploads/65be25379cb84-insta6.jpg', 1, 0, 1, NULL, NULL, '2024-02-03 11:36:23', NULL, NULL),
(10, 'http://127.0.0.1:8000/uploads/65be253a8cfb1-insta7.jpg', 1, 0, 1, NULL, NULL, '2024-02-03 11:36:26', NULL, NULL),
(11, 'http://127.0.0.1:8000/uploads/65be253e366a9-insta8.jpg', 1, 0, 1, NULL, NULL, '2024-02-03 11:36:30', NULL, NULL),
(12, 'http://127.0.0.1:8000/uploads/65be2540d7c4b-insta9.jpg', 1, 0, 1, NULL, NULL, '2024-02-03 11:36:32', NULL, NULL),
(13, 'http://127.0.0.1:8000/uploads/65be2543df38a-insta10.jpg', 1, 0, 1, NULL, NULL, '2024-02-03 11:36:35', NULL, NULL),
(14, 'http://127.0.0.1:8000/uploads/65be254663923-insta11.jpg', 1, 0, 1, NULL, NULL, '2024-02-03 11:36:38', NULL, NULL),
(15, 'http://127.0.0.1:8000/uploads/65be254911ec8-insta12.jpg', 1, 0, 1, NULL, NULL, '2024-02-03 11:36:41', NULL, NULL),
(16, 'http://127.0.0.1:8000/uploads/65be254ba9446-insta6.jpg', 1, 0, 1, NULL, NULL, '2024-02-03 11:36:43', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `commision` varchar(20) DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `added_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `commision`, `active_status`, `is_deleted`, `added_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Classical Ayurveda', 'http://127.0.0.1:8000/uploads/635fb250496af-ezgif-1-0c3276ad62.jpg', '10', 1, 1, 1, NULL, NULL, '2022-10-31 11:32:32', '2023-08-01 03:49:34', NULL),
(2, 'Men Footwear', 'http://127.0.0.1:8000/uploads/65bdf50f1b913-logo-black.png', '10', 1, 0, 1, 1, NULL, '2023-08-01 05:50:09', '2024-02-03 02:40:55', NULL),
(3, 'Women Footwear', 'http://127.0.0.1:8000/uploads/65bdf5077acf1-71c528aa51fa6137b7835d133baa644b.png', '10', 1, 0, 1, 1, NULL, '2023-08-01 05:50:28', '2024-02-03 02:40:47', NULL),
(4, 'Kids Footwear', 'https://ecom.todaytalk.in/uploads/64c89d4bc9374-product-1.webp', '10', 1, 1, 1, NULL, NULL, '2023-08-01 05:51:07', '2023-08-01 03:51:12', NULL),
(5, 'Kids Footwear', 'http://127.0.0.1:8000/uploads/65bdf4ff69513-2023 07_55_22.jpeg', '10', 1, 0, 1, 1, NULL, '2023-08-01 05:51:07', '2024-02-03 02:40:39', NULL),
(6, 'Sale', 'http://127.0.0.1:8000/uploads/65bdf4f89ef8e-cd9542ab551a9cf37b7a9fed0b0a2367.jpeg', '10', 1, 0, 1, 1, NULL, '2023-08-01 05:51:21', '2024-02-03 02:40:32', NULL),
(7, 'newx', 'http://inventory.walkcy.com/uploads/658ad5f659c0f-walkcy logo black.png', '43', 1, 1, 1, 1, NULL, '2023-12-26 13:32:38', '2023-12-26 12:33:13', NULL),
(8, 'fsdfdfdsfsdfsdf', 'http://127.0.0.1:8000/uploads/65be0e7521f2c-category_8.png', '20', 0, 0, 1, 1, NULL, '2024-02-03 09:59:17', '2024-02-03 04:51:01', NULL),
(9, 'lllllllllllllllllllllllllllllllllll', 'http://127.0.0.1:8000/uploads/65be0ea247e2b-product-2-1.jpg', '12', 0, 0, 1, 1, NULL, '2024-02-03 10:00:02', '2024-02-03 04:39:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `added_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `subject`, `message`, `phone`, `active_status`, `is_deleted`, `added_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'harsh', 'harshsrivastava@gmail.com', 'sub', 'this is the message', '6393228471', 1, 0, NULL, NULL, NULL, '2022-09-09 13:47:16', NULL, NULL),
(2, 'harshAfAdmin', 'sd@gmail.com', '345', '34534534534', '6393228471', 1, 0, NULL, NULL, NULL, '2024-02-03 11:23:29', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us_pages`
--

CREATE TABLE `contact_us_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `location` longtext DEFAULT NULL,
  `mail` longtext DEFAULT NULL,
  `contact` longtext DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `added_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_us_pages`
--

INSERT INTO `contact_us_pages` (`id`, `location`, `mail`, `contact`, `active_status`, `is_deleted`, `added_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '<ul><li>Hanumangadi Mandir, Walkcy, Ram path Road, beside sagar Life Style, Rikaabganj, Faizabad, Uttar Pradesh 224001</li></ul><p><br></p>', '<p><a href=\"mailto:Help@walkcy.com\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: rgb(51, 51, 51); background-color: rgb(240, 240, 240);\">Help@walkcy.com</a></p>', '<p><a href=\"https://ecom.todaytalk.in/%2b0025425456554.html\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: rgb(51, 51, 51); background-color: rgb(240, 240, 240);\">+91 70070 28489</a></p>', 1, 0, 1, NULL, NULL, '2023-08-01 06:01:39', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `usage` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  `validity_from` varchar(255) DEFAULT NULL,
  `validity_to` varchar(255) DEFAULT NULL,
  `order_amount` varchar(255) DEFAULT NULL,
  `usage_limit` int(11) DEFAULT NULL,
  `max_discount` varchar(20) DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `added_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `name`, `code`, `type`, `usage`, `value`, `validity_from`, `validity_to`, `order_amount`, `usage_limit`, `max_discount`, `active_status`, `is_deleted`, `added_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'isurance one', 'MV-63600197304B4', '1', '1', '5', '2022-11-02 ', ' 2022-11-05', '500', 4, '100', 1, 0, 1, 1, NULL, '2022-10-31 17:10:47', '2022-11-02 08:58:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coupon_useds`
--

CREATE TABLE `coupon_useds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `coupon_id` varchar(255) DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `added_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctor_categories`
--

CREATE TABLE `doctor_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `commision` varchar(255) DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `added_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctor_categories`
--

INSERT INTO `doctor_categories` (`id`, `name`, `image`, `commision`, `active_status`, `is_deleted`, `added_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'eye', 'http://127.0.0.1:8000/uploads/634c26dea3bd6-3.png', '5', 1, 0, 1, NULL, NULL, '2022-10-16 15:44:30', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `doctor_infos`
--

CREATE TABLE `doctor_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `heading` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `added_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctor_infos`
--

INSERT INTO `doctor_infos` (`id`, `name`, `heading`, `image`, `description`, `price`, `active_status`, `is_deleted`, `added_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Harsh', 'heading', 'http://127.0.0.1:8000/uploads/6351859d710c8-1.png', '<ol><li>dfsfsfsd<sub>fsdfsdfsdfsddssdfsdfsd</sub>fsd</li></ol><ul><li>xcxcbxcbxcbx</li><li>dgfvccvncv</li></ul><ol><li>fxfbvcncvcvcvbcvbcvbcvbcvbbcbcvbcbvcvbcbvbvcbcvb<em>bcv</em><strong><em>bcvbcvbcvbcvb<u>bbvcccbcvbvbcvcvbvbvbcvbv</u></em></strong></li><li><strong><em><u>fgdfhhgfhgfhgfhgfhgfhgfhgf</u></em></strong></li></ol>', '500', 1, 0, 36, NULL, NULL, '2022-10-20 17:30:05', '2022-10-21 12:32:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `doctor_reviews`
--

CREATE TABLE `doctor_reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `product_id` varchar(255) DEFAULT NULL,
  `review` longtext DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `added_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctor_reviews`
--

INSERT INTO `doctor_reviews` (`id`, `user_id`, `product_id`, `review`, `active_status`, `is_deleted`, `added_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '21', NULL, 'ths is the best docotr', 1, 0, NULL, NULL, NULL, '2022-10-21 14:10:52', NULL, NULL),
(2, '21', '1', 'ths is the best docotr', 1, 0, NULL, NULL, NULL, '2022-10-21 14:11:46', NULL, NULL),
(3, '21', '1', 'gcvb', 1, 0, NULL, NULL, NULL, '2022-10-21 14:50:08', NULL, NULL),
(4, '21', NULL, NULL, 1, 0, NULL, NULL, NULL, '2022-10-30 09:10:09', NULL, NULL),
(5, '21', NULL, NULL, 1, 0, NULL, NULL, NULL, '2022-10-30 09:10:28', NULL, NULL),
(6, '21', NULL, NULL, 1, 0, NULL, NULL, NULL, '2022-10-30 09:11:43', NULL, NULL),
(7, '21', NULL, NULL, 1, 0, NULL, NULL, NULL, '2022-10-30 09:14:53', NULL, NULL),
(8, '21', NULL, NULL, 1, 0, NULL, NULL, NULL, '2022-10-30 09:22:50', NULL, NULL),
(9, '21', NULL, NULL, 1, 0, NULL, NULL, NULL, '2022-10-30 09:23:01', NULL, NULL),
(10, '21', NULL, NULL, 1, 0, NULL, NULL, NULL, '2022-10-30 10:03:58', NULL, NULL),
(11, '21', NULL, NULL, 1, 0, NULL, NULL, NULL, '2022-10-30 10:04:12', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `eclinic_pages`
--

CREATE TABLE `eclinic_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cat_id` varchar(255) DEFAULT NULL,
  `heading` varchar(255) DEFAULT NULL,
  `sub_heading` varchar(255) DEFAULT NULL,
  `banner` varchar(255) DEFAULT NULL,
  `image1` varchar(255) DEFAULT NULL,
  `image2` varchar(255) DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `added_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `eclinic_pages`
--

INSERT INTO `eclinic_pages` (`id`, `cat_id`, `heading`, `sub_heading`, `banner`, `image1`, `image2`, `active_status`, `is_deleted`, `added_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1', 'heading', 'subheading', 'http://127.0.0.1:8000/uploads/6351680b1ebd4-5.png', 'http://127.0.0.1:8000/uploads/6351680b1efbc-4.png', 'http://127.0.0.1:8000/uploads/6351680b1f3a5-2.png', 1, 0, 1, 1, NULL, '2022-10-20 15:23:55', '2022-10-20 09:54:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `location` text DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `event_type_id` int(11) DEFAULT NULL,
  `labels` varchar(255) DEFAULT NULL,
  `color` varchar(15) DEFAULT NULL,
  `share_with` text DEFAULT NULL,
  `repeat_every` int(11) NOT NULL DEFAULT 0,
  `repeat_type` enum('days','weeks','months','years') DEFAULT NULL,
  `no_of_cycles` int(11) DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1 COMMENT '1=active,2=deactive',
  `is_deleted` int(11) NOT NULL DEFAULT 1 COMMENT '2=deleted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `description`, `start_date`, `end_date`, `start_time`, `end_time`, `location`, `client_id`, `event_type_id`, `labels`, `color`, `share_with`, `repeat_every`, `repeat_type`, `no_of_cycles`, `created_at`, `updated_at`, `created_by`, `updated_by`, `is_active`, `is_deleted`) VALUES
(1, 'teesr', 'rrfdfds sfsfsd sdfdfds', '2022-07-13', '2022-07-27', '23:20:00', '21:19:00', 'ddfds', NULL, NULL, NULL, '#884ea0', NULL, 0, NULL, 0, '2022-07-18 19:17:26', '2022-07-18 14:04:52', 1, 1, 1, 2),
(2, 'fdfdsf', 'fdsfds', '2022-07-20', '2022-07-20', '05:07:00', '19:07:00', 'india', NULL, NULL, NULL, '#2e86c1', NULL, 0, NULL, 0, '2022-07-20 17:08:01', NULL, 1, NULL, 1, 1),
(3, 'event 1', 'thdi is the desc', '2022-07-22', '2022-07-23', '13:00:00', '15:02:00', 'bhartiya', NULL, NULL, NULL, '#83c340', NULL, 0, NULL, 0, '2022-07-22 13:00:25', NULL, 1, NULL, 1, 1),
(4, 'dssfsdfdsf', 'dsffdsfs', '2022-11-13', '2022-11-13', '22:47:00', '21:48:00', 'dfdsf', NULL, NULL, NULL, '#2e86c1', NULL, 0, NULL, 0, '2022-09-05 21:48:26', '2022-11-14 19:44:17', 1, NULL, 1, 1);

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
-- Table structure for table `forms`
--

CREATE TABLE `forms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `role_id` varchar(255) DEFAULT NULL,
  `attribute_id` varchar(255) DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `added_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `forms`
--

INSERT INTO `forms` (`id`, `title`, `role_id`, `attribute_id`, `active_status`, `is_deleted`, `added_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 'vendor signup', '3', '8,9', 1, 0, 1, NULL, NULL, '2022-09-17 13:55:15', NULL, NULL),
(5, 'doctor', '5', '8,9', 1, 0, 1, NULL, NULL, '2022-10-16 15:10:05', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `genral_pages`
--

CREATE TABLE `genral_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `banner` varchar(255) DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `added_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `genral_pages`
--

INSERT INTO `genral_pages` (`id`, `contact`, `banner`, `active_status`, `is_deleted`, `added_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '6393228471', 'http://127.0.0.1:8000/uploads/636bb7c795eab-ezgif-1-e39dd31113.jpg', 1, 1, 1, NULL, NULL, '2022-11-09 14:23:03', '2023-08-01 04:01:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `home_banners`
--

CREATE TABLE `home_banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cat_id1` varchar(255) DEFAULT NULL,
  `cat_id2` varchar(255) DEFAULT NULL,
  `cat_id3` varchar(255) DEFAULT NULL,
  `cat_id4` varchar(255) DEFAULT NULL,
  `banner1` varchar(255) DEFAULT NULL,
  `banner2` varchar(255) DEFAULT NULL,
  `banner3` varchar(255) DEFAULT NULL,
  `banner4` varchar(255) DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `added_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_banners`
--

INSERT INTO `home_banners` (`id`, `cat_id1`, `cat_id2`, `cat_id3`, `cat_id4`, `banner1`, `banner2`, `banner3`, `banner4`, `active_status`, `is_deleted`, `added_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1', '1', '1', '1', 'http://127.0.0.1:8000/uploads/63667b2b1230f-ezgif-1-e39dd31113.jpg', 'http://127.0.0.1:8000/uploads/63667b2b126f8-ezgif-1-e39dd31113.jpg', 'http://127.0.0.1:8000/uploads/63667b2b12ae0-ezgif-1-e39dd31113.jpg', 'http://127.0.0.1:8000/uploads/63667b2b12ec8-ezgif-1-e39dd31113.jpg', 1, 1, 1, 1, NULL, '2022-11-05 15:03:07', '2022-11-05 09:54:57', NULL),
(2, '2', '3', '5', '6', 'http://127.0.0.1:8000/uploads/65be04cbbf6cb-category_10.jpg', 'http://127.0.0.1:8000/uploads/65be04cbbfe8c-product-1-2.jpg', 'http://127.0.0.1:8000/uploads/65be04cbc0589-product-8.jpg', 'http://127.0.0.1:8000/uploads/65be04cbc0b69-product-4.jpg', 1, 0, 1, 1, NULL, '2023-08-01 06:00:12', '2024-02-03 03:48:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `home_pages`
--

CREATE TABLE `home_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cat_id` varchar(255) DEFAULT NULL,
  `heading` varchar(255) DEFAULT NULL,
  `sub_heading` varchar(255) DEFAULT NULL,
  `banner` varchar(255) DEFAULT NULL,
  `image1` varchar(255) DEFAULT NULL,
  `image2` varchar(255) DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `added_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_pages`
--

INSERT INTO `home_pages` (`id`, `cat_id`, `heading`, `sub_heading`, `banner`, `image1`, `image2`, `active_status`, `is_deleted`, `added_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(6, '2', 'Men', 'shoess', 'http://127.0.0.1:8000/uploads/65be01f1e0f4f-slideshow-character1.png', '', '', 1, 0, 1, 1, NULL, '2024-02-03 09:04:16', '2024-02-03 03:35:53', NULL),
(7, '3', 'Menen', 'menn', 'http://127.0.0.1:8000/uploads/65be0255c330e-product-11.jpg', '', '', 1, 0, 1, NULL, NULL, '2024-02-03 09:07:33', NULL, NULL);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_08_24_075510_create_roles_table', 2),
(6, '2022_08_24_080302_create_categories_table', 2),
(7, '2022_08_24_080318_create_sub_categories_table', 2),
(8, '2022_08_26_060354_create_brands_table', 3),
(9, '2022_08_26_091111_create_coupons_table', 4),
(10, '2022_08_30_135201_create_taxations_table', 5),
(11, '2022_08_31_093010_create_products_table', 6),
(12, '2022_08_31_093643_create_product_images_table', 6),
(13, '2022_09_09_133759_create_contacts_table', 7),
(15, '2022_09_09_133814_create_news_letter\'_table', 8),
(16, '2022_09_14_092600_create_attributes_table', 9),
(17, '2022_09_14_092624_create_attribute_values_table', 9),
(18, '2022_09_14_092642_create_forms_table', 9),
(19, '2022_09_18_154409_create_home_pages_table', 10),
(20, '2022_09_18_154758_create_contact_us_pages_table', 10),
(21, '2022_09_18_154831_create_genral_pages_table', 10),
(22, '2022_09_27_092251_create_vendor_commisions_table', 11),
(23, '2022_10_13_055631_create_addresses_table', 12),
(26, '2022_10_16_152522_create_doctor_categories_table', 13),
(27, '2022_10_20_150238_create_eclinic_pages_table', 14),
(28, '2022_10_20_163042_create_doctor_infos_table', 15),
(29, '2022_10_21_140250_create_doctor_reviews_table', 16),
(30, '2022_10_27_130035_create_coupon_useds_table', 17),
(31, '2022_10_28_075510_create_product_variants_table', 18),
(32, '2022_10_28_165622_create_blog_categories_table', 19),
(33, '2022_10_28_171242_create_blogs_table', 20),
(34, '2022_10_29_150602_create_wishlists_table', 21),
(35, '2022_10_13_124103_create_orders_table', 22),
(36, '2022_10_13_124134_create_order_details_table', 22),
(37, '2022_11_01_114347_create_notifications_table', 23),
(38, '2022_11_01_131145_create_prices_table', 24),
(39, '2022_11_01_140259_create_attendances_table', 25),
(40, '2022_11_05_143915_create_home_banners_table', 26),
(41, '2022_11_08_161302_create_testimonials_table', 27),
(42, '2022_11_08_164744_create_brand_partners_table', 28);

-- --------------------------------------------------------

--
-- Table structure for table `news_letters`
--

CREATE TABLE `news_letters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `added_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news_letters`
--

INSERT INTO `news_letters` (`id`, `email`, `active_status`, `is_deleted`, `added_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'user@gmail.com', 1, 0, NULL, NULL, NULL, '2022-09-09 13:53:26', NULL, NULL),
(2, 'harshsrivastava261@gmail.com', 1, 0, NULL, NULL, NULL, '2022-10-30 09:08:48', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `added_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `name`, `description`, `user_id`, `active_status`, `is_deleted`, `added_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'this is th first notification', '<p><ul><li>this is the&nbsp;</li><li>notificationt</li></ul></p>', '33,38', 1, 0, 1, 1, NULL, '2022-11-01 12:24:20', '2022-11-01 06:55:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `pincode` varchar(255) DEFAULT NULL,
  `tax` varchar(50) DEFAULT NULL,
  `discount` varchar(50) DEFAULT NULL,
  `shipping` varchar(20) DEFAULT NULL,
  `total` varchar(50) DEFAULT NULL,
  `orders_id` varchar(255) DEFAULT NULL,
  `payment_id` varchar(255) DEFAULT NULL,
  `is_payment` varchar(255) DEFAULT NULL,
  `order_status` varchar(50) DEFAULT '1',
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `added_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `email`, `mobile`, `address`, `country`, `city`, `state`, `pincode`, `tax`, `discount`, `shipping`, `total`, `orders_id`, `payment_id`, `is_payment`, `order_status`, `active_status`, `is_deleted`, `added_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '38', 'harsh', 'harshsakeel@gmail.com', '6393228471', 'address', 'india', 'lucknow', 'uttarpradesh', '226004', '70', '0', '356', '1126', 'order_KoHwsFOF8iFoBF', 'pay_KoHx57meqtvwKg', '1', '1', 0, 0, NULL, NULL, NULL, '2022-12-05 16:05:46', '2022-12-05 10:38:32', NULL),
(2, '38', 'Harsh', 'harshsakeel@gmail.com', '6393228471', 'harsh', 'india', 'lucknow', 'uttarpradesh', '226004', '70', '0', '356', '1126', 'order_KpuCDHbxHoB5I0', 'pay_KpuNgT8J9wQiDP', '1', '1', 0, 0, NULL, NULL, NULL, '2022-12-09 18:09:32', '2022-12-09 12:50:31', NULL),
(3, '1', 'Harsh', NULL, '6393228471', '303 BASHIRAT GUNJ LUCKNOW 226004', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, 0, NULL, NULL, NULL, '2023-09-26 14:13:55', NULL, NULL),
(4, '1', 'Harsh', NULL, '6393228471', '303 BASHIRAT GUNJ LUCKNOW 226004', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, 0, NULL, NULL, NULL, '2023-09-26 14:14:57', NULL, NULL),
(5, '1', 'Harsh', NULL, '6393228471', '303 BASHIRAT GUNJ LUCKNOW 226004', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, 0, NULL, NULL, NULL, '2023-09-26 14:16:49', NULL, NULL),
(6, '1', 'Harsh', NULL, '6393228471', '303 BASHIRAT GUNJ LUCKNOW 226004', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, 0, NULL, NULL, NULL, '2023-09-26 14:17:13', NULL, NULL),
(7, '1', 'Harsh', NULL, '6393228471', '303 BASHIRAT GUNJ LUCKNOW 226004', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, 0, NULL, NULL, NULL, '2023-09-26 14:17:17', NULL, NULL),
(8, '1', 'Harsh', NULL, '6393228471', '303 BASHIRAT GUNJ LUCKNOW 226004', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, 0, NULL, NULL, NULL, '2023-09-26 14:22:31', NULL, NULL),
(9, '1', 'Harsh', NULL, '6393228471', '303 BASHIRAT GUNJ LUCKNOW 226004', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, 0, NULL, NULL, NULL, '2023-09-26 14:22:48', NULL, NULL),
(10, '1', 'Harsh', NULL, '6393228471', '303 BASHIRAT GUNJ LUCKNOW 226004', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', 1, 0, NULL, NULL, NULL, '2023-09-26 14:24:45', NULL, NULL),
(11, '1', 'Harsh', NULL, '6393228471', '303 BASHIRAT GUNJ LUCKNOW 226004', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', 1, 0, NULL, NULL, NULL, '2023-09-26 14:25:31', NULL, NULL),
(12, '1', 'Harsh', NULL, '6393228471', '303 BASHIRAT GUNJ LUCKNOW 226004', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', 1, 0, NULL, NULL, NULL, '2023-09-26 14:27:51', NULL, NULL),
(13, '1', 'Harsh', NULL, '6393228471', '303 BASHIRAT GUNJ LUCKNOW 226004', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', 1, 0, NULL, NULL, NULL, '2023-09-26 14:32:22', NULL, NULL),
(14, '1', 'Harsh', NULL, '6393228471', '303 BASHIRAT GUNJ LUCKNOW 226004', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', 1, 0, NULL, NULL, NULL, '2023-09-26 14:33:45', NULL, NULL),
(15, '1', 'Harsh', NULL, '6393228471', '303 BASHIRAT GUNJ LUCKNOW 226004', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', 1, 0, NULL, NULL, NULL, '2023-09-26 14:35:05', NULL, NULL),
(16, '1', 'Harsh', NULL, '6393228471', '303 BASHIRAT GUNJ LUCKNOW 226004', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', 1, 0, NULL, NULL, NULL, '2023-09-26 14:36:09', NULL, NULL),
(17, '1', 'Harsh', NULL, '6393228471', '303 BASHIRAT GUNJ LUCKNOW 226004', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', 1, 0, NULL, NULL, NULL, '2023-09-26 14:42:04', NULL, NULL),
(18, '1', 'Harsh', NULL, '6393228471', '303 BASHIRAT GUNJ LUCKNOW 226004', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', 1, 0, NULL, NULL, NULL, '2023-09-26 14:42:34', NULL, NULL),
(19, '1', 'Harsh', NULL, '6393228471', '303 BASHIRAT GUNJ LUCKNOW 226004', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', 1, 0, NULL, NULL, NULL, '2023-09-26 14:43:12', NULL, NULL),
(20, '1', 'Harsh', NULL, '6393228471', '303 BASHIRAT GUNJ LUCKNOW 226004', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', 1, 0, NULL, NULL, NULL, '2023-09-26 14:44:28', NULL, NULL),
(21, '1', 'Harsh', NULL, '6393228471', '303 BASHIRAT GUNJ LUCKNOW 226004', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', 1, 0, NULL, NULL, NULL, '2023-09-26 14:44:41', NULL, NULL),
(22, '1', 'Harsh', NULL, '6393228471', '303 BASHIRAT GUNJ LUCKNOW 226004', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', 1, 0, NULL, NULL, NULL, '2023-09-26 14:45:01', NULL, NULL),
(23, '1', 'Harsh', NULL, '6393228471', '303 BASHIRAT GUNJ LUCKNOW 226004', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', 1, 0, NULL, NULL, NULL, '2023-09-26 14:45:19', NULL, NULL),
(24, '1', 'Harsh', NULL, '6303228471', 'vbcvbvbcvb', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', 1, 0, NULL, NULL, NULL, '2023-09-30 11:13:50', NULL, NULL),
(25, '1', 'Hartsh', NULL, '6393228471', 'dcvbncvnbvnvbn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', 1, 0, NULL, NULL, NULL, '2023-09-30 11:19:14', NULL, NULL),
(26, '1', 'Himanshu Wadhwani', NULL, '7007028489', 'Faizabad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', 1, 0, NULL, NULL, NULL, '2023-09-30 13:54:30', NULL, NULL),
(27, '1', 'Saurabh', NULL, '9876543210', 'Bihar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', 1, 0, NULL, NULL, NULL, '2023-10-02 11:23:47', NULL, NULL),
(28, '1', 'harsh', NULL, '6393228471', '303 bashirat gunj lucknow', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', 1, 0, NULL, NULL, NULL, '2023-11-21 05:53:39', NULL, NULL),
(29, '1', 'Himanshu Vadhwani', NULL, '7007028489', 'Faizabad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', 1, 0, NULL, NULL, NULL, '2023-11-21 09:10:55', NULL, NULL),
(30, '1', 'harsh', NULL, '6393228471', '303 Bashirat Gunj Lucknow', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', 1, 0, NULL, NULL, NULL, '2023-11-21 09:49:11', NULL, NULL),
(31, '1', 'harsh', NULL, '6393228471', 'ds', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', 1, 0, NULL, NULL, NULL, '2023-11-21 10:19:57', NULL, NULL),
(32, '1', 'Himanshu Vadhwani', NULL, '7007028489', 'Faizabad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', 1, 0, NULL, NULL, NULL, '2023-11-21 13:58:28', NULL, NULL),
(33, '1', 'Himanshu Vadhwani', NULL, '7007028489', 'Faizabad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', 1, 0, NULL, NULL, NULL, '2023-11-21 14:00:58', NULL, NULL),
(34, '1', 'Himanshu Wadhwani', NULL, '7007028489', 'Faizabad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', 1, 0, NULL, NULL, NULL, '2023-11-21 14:04:26', NULL, NULL),
(35, '1', 'Himanshu Vadhwani', NULL, '7007028489', 'Faizabad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', 1, 0, NULL, NULL, NULL, '2023-11-21 14:11:30', NULL, NULL),
(36, '1', 'harsh', NULL, '6393228471', 'sd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', 1, 0, NULL, NULL, NULL, '2023-11-24 07:03:18', NULL, NULL),
(37, '1', 'harsh', NULL, '6393228471', 'sd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', 1, 0, NULL, NULL, NULL, '2023-11-24 07:03:35', NULL, NULL),
(38, '1', 'harsh', NULL, '6393228471', 'dsd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', 1, 0, NULL, NULL, NULL, '2023-11-24 07:12:51', NULL, NULL),
(39, '1', 'Himanshu Wadhwani', NULL, '7007028489', 'Faizabad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', 1, 0, NULL, NULL, NULL, '2023-11-24 14:04:36', NULL, NULL),
(40, '1', 'Himanshu Vadhwani', NULL, '7007028489', 'Faizabad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', 1, 0, NULL, NULL, NULL, '2023-11-25 10:29:46', NULL, NULL),
(41, '1', 'Himanshu Vadhwani', NULL, '7007028489', 'Faizabad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', 1, 0, NULL, NULL, NULL, '2023-11-25 13:49:25', NULL, NULL),
(42, '1', 'Test', NULL, '9876543210', 'T', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', 1, 0, NULL, NULL, NULL, '2023-11-25 14:43:07', NULL, NULL),
(43, '1', 'Rakesh', NULL, '9335336433', 'Faizabad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', 1, 0, NULL, NULL, NULL, '2023-11-26 10:45:03', NULL, NULL),
(44, '1', 'Rakesh', NULL, '9335336433', 'faizabad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', 1, 0, NULL, NULL, NULL, '2023-11-26 10:50:41', NULL, NULL),
(45, '1', 'Rakesh', NULL, '9335336433', 'Faizabad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', 1, 0, NULL, NULL, NULL, '2023-11-26 11:45:05', NULL, NULL),
(46, '1', 'Him', NULL, '70070', 'Abc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', 1, 0, NULL, NULL, NULL, '2023-11-28 15:03:23', NULL, NULL),
(47, '1', 'Him', NULL, '9876543210', 'Th', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', 1, 0, NULL, NULL, NULL, '2023-11-28 15:28:55', NULL, NULL),
(48, '1', 'harsh', NULL, '6393228471', 'dsfsdf', NULL, 'Card', NULL, NULL, NULL, '250', NULL, NULL, NULL, NULL, '1', '1', 1, 0, NULL, NULL, NULL, '2023-11-30 10:57:58', NULL, NULL),
(49, '1', 'Saurabh Mishra', NULL, '7054320211', 'Bhorey', NULL, 'Cash', NULL, NULL, NULL, '100', NULL, NULL, NULL, NULL, '1', '1', 1, 0, NULL, NULL, NULL, '2023-12-01 07:40:35', NULL, NULL),
(50, '1', 'Saurabh Mishra', NULL, '7054320211', 'Bhorey', NULL, 'Cash', NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, '1', '1', 1, 0, NULL, NULL, NULL, '2023-12-01 07:45:35', NULL, NULL),
(51, '1', 'Saurabh Mishra', NULL, '7054320211', 'Bhorey', NULL, 'UPI', NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, '1', '1', 1, 0, NULL, NULL, NULL, '2023-12-02 08:45:58', NULL, NULL),
(52, '1', 'HarshsTEsts', NULL, '3365665852', NULL, NULL, 'Cash', NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, '1', '1', 1, 0, NULL, NULL, NULL, '2023-12-02 14:14:21', NULL, NULL),
(53, '1', 'NewTest', NULL, '6365669854', NULL, NULL, 'Cash', NULL, NULL, NULL, '500', NULL, NULL, NULL, NULL, '1', '1', 1, 0, NULL, NULL, NULL, '2023-12-02 14:15:33', NULL, NULL),
(54, '1', 'testedForTotal', NULL, '4563226589', NULL, NULL, 'Cash', NULL, NULL, NULL, '150', NULL, '400', NULL, NULL, '1', '1', 1, 0, NULL, NULL, NULL, '2023-12-02 14:50:13', NULL, NULL),
(55, '1', 'Vads', NULL, '7007028489', NULL, NULL, 'Cash', NULL, NULL, NULL, '20', NULL, '400', NULL, NULL, '1', '1', 1, 0, NULL, NULL, NULL, '2023-12-03 11:09:26', NULL, NULL),
(56, '1', 'Rakesh', NULL, '9335336433', NULL, NULL, 'Cash', NULL, NULL, NULL, '0', NULL, '1790', NULL, NULL, '1', '1', 1, 0, NULL, NULL, NULL, '2023-12-03 11:36:27', NULL, NULL),
(57, '1', 'Himanshu Vadhwani', NULL, '7007028489', NULL, NULL, 'Card', NULL, NULL, NULL, '20', NULL, '400', NULL, NULL, '1', '1', 1, 0, NULL, NULL, NULL, '2023-12-04 08:55:27', NULL, NULL),
(58, '1', '45 butterfly selp', NULL, '9335336433', NULL, NULL, 'Cash', NULL, NULL, NULL, '0', NULL, '1300', NULL, NULL, '1', '1', 1, 0, NULL, NULL, NULL, '2023-12-04 09:11:30', NULL, NULL),
(59, '1', 'Rakesh', NULL, '9335336433', NULL, NULL, 'Cash', NULL, NULL, NULL, '0', NULL, '400', NULL, NULL, '1', '1', 1, 0, NULL, NULL, NULL, '2023-12-05 08:34:22', NULL, NULL),
(60, '1', 'Mahendra Gupta', NULL, '8978945454', NULL, NULL, 'Cash', NULL, NULL, NULL, '0', NULL, '490', NULL, NULL, '1', '1', 1, 0, NULL, NULL, NULL, '2023-12-05 09:18:50', NULL, NULL),
(61, '1', '45 butterfly selp', NULL, '9335336433', NULL, NULL, 'Cash', NULL, NULL, NULL, '0', NULL, '400', NULL, NULL, '1', '1', 1, 0, NULL, NULL, NULL, '2023-12-08 11:19:38', NULL, NULL),
(62, '1', 'Rakesh', NULL, '9335336433', NULL, NULL, 'Cash', NULL, NULL, NULL, '0', NULL, '400', NULL, NULL, '1', '1', 1, 0, NULL, NULL, NULL, '2023-12-10 14:47:40', NULL, NULL),
(63, '1', 'Rakesh', NULL, '9335336433', NULL, NULL, 'Cash', NULL, NULL, NULL, '0', NULL, '400', NULL, NULL, '1', '1', 1, 0, NULL, NULL, NULL, '2023-12-10 14:48:17', NULL, NULL),
(64, '1', 'cash', NULL, '9335336433', NULL, NULL, 'Cash', NULL, NULL, NULL, '0', NULL, '400', NULL, NULL, '1', '1', 1, 0, NULL, NULL, NULL, '2023-12-11 12:18:56', NULL, NULL),
(65, '1', 'cash', NULL, '9335336433', NULL, NULL, 'Cash', NULL, NULL, NULL, '0', NULL, '400', NULL, NULL, '1', '1', 1, 0, NULL, NULL, NULL, '2023-12-11 12:18:56', NULL, NULL),
(66, '1', 'Rakesh', NULL, '9335336433', NULL, NULL, 'Cash', NULL, NULL, NULL, '0', NULL, '400', NULL, NULL, '1', '1', 1, 0, NULL, NULL, NULL, '2023-12-11 12:19:20', NULL, NULL),
(67, '1', 'Rakesh', NULL, '9335336433', NULL, NULL, 'Cash', NULL, NULL, NULL, '43', NULL, '435', NULL, NULL, '1', '1', 1, 0, NULL, NULL, NULL, '2023-12-17 08:36:08', NULL, NULL),
(68, '1', 'cash', NULL, '9335336433', NULL, NULL, 'Cash', NULL, NULL, NULL, '043', NULL, '435', NULL, NULL, '1', '1', 1, 0, NULL, NULL, NULL, '2023-12-18 09:48:01', NULL, NULL),
(69, '1', 'cash', NULL, '9335336433', NULL, NULL, 'Cash', NULL, NULL, NULL, '0', NULL, '435', NULL, NULL, '1', '1', 1, 0, NULL, NULL, NULL, '2023-12-19 11:54:50', NULL, NULL),
(70, '1', 'cash', NULL, '9335336433', NULL, NULL, 'Cash', NULL, NULL, NULL, '048', NULL, '435', NULL, NULL, '1', '1', 1, 0, NULL, NULL, NULL, '2023-12-19 11:57:59', NULL, NULL),
(71, '1', 'Dec Him', NULL, '7704044270', NULL, NULL, 'Cash', NULL, NULL, NULL, '0', NULL, '3888', NULL, NULL, '1', '1', 1, 0, NULL, NULL, NULL, '2023-12-20 08:44:12', NULL, NULL),
(72, '1', 'cash', NULL, '9335336433', NULL, NULL, 'Cash', NULL, NULL, NULL, '0400', NULL, '3888', NULL, NULL, '1', '1', 1, 0, NULL, NULL, NULL, '2023-12-22 08:32:51', NULL, NULL),
(73, '1', 'Rakesh', NULL, '9335336433', NULL, NULL, 'Cash', NULL, NULL, NULL, '0428', NULL, '4288', NULL, NULL, '1', '1', 1, 0, NULL, NULL, NULL, '2023-12-24 12:12:20', NULL, NULL),
(74, '1', 'Ramesh', NULL, '9876543623', NULL, NULL, 'Card', NULL, NULL, NULL, '0', NULL, '3888', NULL, NULL, '1', '1', 1, 0, NULL, NULL, NULL, '2023-12-27 09:15:15', NULL, NULL),
(75, '1', 'cash', NULL, '9336336433', NULL, NULL, 'Cash', NULL, NULL, NULL, '0', NULL, '666', NULL, NULL, '1', '1', 1, 0, NULL, NULL, NULL, '2023-12-31 08:18:03', NULL, NULL),
(76, '1', 'Rakesh', NULL, '9335336433', NULL, NULL, 'Cash', NULL, NULL, NULL, '0', NULL, '666', NULL, NULL, '1', '1', 1, 0, NULL, NULL, NULL, '2023-12-31 08:33:26', NULL, NULL),
(77, '1', 'cash', NULL, '9335336433', NULL, NULL, 'Cash', NULL, NULL, NULL, '666', NULL, '740', NULL, NULL, '1', '1', 1, 0, NULL, NULL, NULL, '2023-12-31 12:57:11', NULL, NULL),
(78, '1', 'abc', NULL, '9876543210', NULL, NULL, 'Cash', NULL, NULL, NULL, '74', NULL, '740', NULL, NULL, '1', '1', 1, 0, NULL, NULL, NULL, '2023-12-31 13:16:22', NULL, NULL),
(79, '1', 'harshTest', NULL, '6393228471', NULL, NULL, 'Cash', NULL, NULL, NULL, '50', NULL, '820', NULL, NULL, '1', '1', 1, 0, NULL, NULL, NULL, '2024-01-12 13:41:57', NULL, NULL),
(80, '1', 'fdgfdfg', NULL, '5645546546', NULL, NULL, 'Cash', NULL, NULL, NULL, '0', NULL, '820', NULL, NULL, '1', '1', 1, 0, NULL, NULL, NULL, '2024-01-12 13:55:50', NULL, NULL),
(81, '1', 'Harsh', NULL, '6393228471', NULL, NULL, 'Cash', NULL, NULL, NULL, '0', NULL, '730', NULL, NULL, '1', '1', 1, 0, NULL, NULL, NULL, '2024-01-13 05:34:00', NULL, NULL),
(82, '1', 'Himanshu Wadhwani', NULL, '7007028489', NULL, NULL, 'Cash', NULL, NULL, NULL, '0', NULL, '460', NULL, NULL, '1', '1', 1, 0, NULL, NULL, NULL, '2024-01-14 15:38:49', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `variant_id` int(11) DEFAULT NULL,
  `order_id` varchar(255) DEFAULT NULL,
  `prod_id` varchar(255) DEFAULT NULL,
  `coupon_id` varchar(255) DEFAULT NULL,
  `variation` varchar(255) DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `tax` varchar(255) DEFAULT NULL,
  `shipping` varchar(255) DEFAULT NULL,
  `coupon_discount` varchar(255) DEFAULT NULL,
  `total_amount` varchar(255) DEFAULT NULL,
  `length` varchar(50) DEFAULT NULL,
  `breath` varchar(50) DEFAULT NULL,
  `height` varchar(50) DEFAULT NULL,
  `weight` varchar(50) DEFAULT NULL,
  `shiprocket_id` int(11) NOT NULL,
  `shiprocket_shipment_id` int(11) NOT NULL,
  `order_status` varchar(50) DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `added_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `variant_id`, `order_id`, `prod_id`, `coupon_id`, `variation`, `quantity`, `price`, `tax`, `shipping`, `coupon_discount`, `total_amount`, `length`, `breath`, `height`, `weight`, `shiprocket_id`, `shiprocket_shipment_id`, `order_status`, `active_status`, `is_deleted`, `added_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 61, '1', '59', NULL, '0.3g', '1', '350', '35', NULL, NULL, NULL, '5', '5', '5', '5', 282826927, 282219377, 'CANCELED', 1, 0, 38, NULL, NULL, '2022-12-05 16:05:46', '2022-12-05 10:38:33', NULL),
(2, 58, '1', '56', NULL, '650g', '1', '350', '35', NULL, NULL, NULL, '5', '5', '5', '5', 282826933, 282219383, 'CANCELED', 1, 0, 38, NULL, NULL, '2022-12-05 16:05:46', '2022-12-05 10:38:34', NULL),
(3, 61, '2', '59', NULL, '0.3g', '1', '350', '35', NULL, NULL, NULL, '5', '5', '5', '5', 282950225, 282342665, 'CANCELED', 1, 0, 38, NULL, NULL, '2022-12-09 18:09:32', '2022-12-09 12:50:32', NULL),
(4, 59, '2', '57', NULL, '0.5g', '1', '350', '35', NULL, NULL, NULL, '5', '5', '5', '5', 282950228, 282342668, 'CANCELED', 1, 0, 38, NULL, NULL, '2022-12-09 18:09:32', '2022-12-09 12:50:34', NULL),
(5, 63, '3', '61', NULL, 'L', '1', '400', '40', NULL, NULL, NULL, '10', '10', '10', '10', 0, 0, NULL, 1, 0, 1, NULL, NULL, '2023-09-26 14:13:56', NULL, NULL),
(6, 70, '3', '62', NULL, 'variant 1', '1', '1', '0.1', NULL, NULL, NULL, '10', '10', '10', '10', 0, 0, NULL, 1, 0, 1, NULL, NULL, '2023-09-26 14:13:56', NULL, NULL),
(7, 63, '4', '61', NULL, 'L', '1', '400', '40', NULL, NULL, NULL, '10', '10', '10', '10', 0, 0, NULL, 1, 0, 1, NULL, NULL, '2023-09-26 14:14:57', NULL, NULL),
(8, 70, '4', '62', NULL, 'variant 1', '1', '1', '0.1', NULL, NULL, NULL, '10', '10', '10', '10', 0, 0, NULL, 1, 0, 1, NULL, NULL, '2023-09-26 14:14:57', NULL, NULL),
(9, 63, '5', '61', NULL, 'L', '1', '400', '40', NULL, NULL, NULL, '10', '10', '10', '10', 0, 0, NULL, 1, 0, 1, NULL, NULL, '2023-09-26 14:16:50', NULL, NULL),
(10, 70, '5', '62', NULL, 'variant 1', '1', '1', '0.1', NULL, NULL, NULL, '10', '10', '10', '10', 0, 0, NULL, 1, 0, 1, NULL, NULL, '2023-09-26 14:16:50', NULL, NULL),
(11, 63, '6', '61', NULL, 'L', '1', '400', '40', NULL, NULL, NULL, '10', '10', '10', '10', 0, 0, NULL, 1, 0, 1, NULL, NULL, '2023-09-26 14:17:13', NULL, NULL),
(12, 70, '6', '62', NULL, 'variant 1', '1', '1', '0.1', NULL, NULL, NULL, '10', '10', '10', '10', 0, 0, NULL, 1, 0, 1, NULL, NULL, '2023-09-26 14:17:13', NULL, NULL),
(13, 63, '7', '61', NULL, 'L', '1', '400', '40', NULL, NULL, NULL, '10', '10', '10', '10', 0, 0, NULL, 1, 0, 1, NULL, NULL, '2023-09-26 14:17:17', NULL, NULL),
(14, 70, '7', '62', NULL, 'variant 1', '1', '1', '0.1', NULL, NULL, NULL, '10', '10', '10', '10', 0, 0, NULL, 1, 0, 1, NULL, NULL, '2023-09-26 14:17:17', NULL, NULL),
(15, 63, '8', '61', NULL, 'L', '1', '400', '40', NULL, NULL, NULL, '10', '10', '10', '10', 0, 0, NULL, 1, 0, 1, NULL, NULL, '2023-09-26 14:22:31', NULL, NULL),
(16, 70, '8', '62', NULL, 'variant 1', '1', '1', '0.1', NULL, NULL, NULL, '10', '10', '10', '10', 0, 0, NULL, 1, 0, 1, NULL, NULL, '2023-09-26 14:22:31', NULL, NULL),
(17, 63, '9', '61', NULL, 'L', '1', '400', '40', NULL, NULL, NULL, '10', '10', '10', '10', 0, 0, NULL, 1, 0, 1, NULL, NULL, '2023-09-26 14:22:48', NULL, NULL),
(18, 70, '9', '62', NULL, 'variant 1', '1', '1', '0.1', NULL, NULL, NULL, '10', '10', '10', '10', 0, 0, NULL, 1, 0, 1, NULL, NULL, '2023-09-26 14:22:48', NULL, NULL),
(19, 63, '10', '61', NULL, 'L', '1', '400', '40', NULL, NULL, NULL, '10', '10', '10', '10', 2, 2, '1', 1, 0, 1, NULL, NULL, '2023-09-26 14:24:45', '2023-09-26 08:54:45', NULL),
(20, 70, '10', '62', NULL, 'variant 1', '1', '1', '0.1', NULL, NULL, NULL, '10', '10', '10', '10', 2, 2, '1', 1, 0, 1, NULL, NULL, '2023-09-26 14:24:45', '2023-09-26 08:54:45', NULL),
(21, 63, '11', '61', NULL, 'L', '1', '400', '40', NULL, NULL, NULL, '10', '10', '10', '10', 2, 2, '1', 1, 0, 1, NULL, NULL, '2023-09-26 14:25:31', '2023-09-26 08:55:31', NULL),
(22, 70, '11', '62', NULL, 'variant 1', '1', '1', '0.1', NULL, NULL, NULL, '10', '10', '10', '10', 2, 2, '1', 1, 0, 1, NULL, NULL, '2023-09-26 14:25:31', '2023-09-26 08:55:31', NULL),
(23, 63, '12', '61', NULL, 'L', '1', '400', '40', NULL, NULL, NULL, '10', '10', '10', '10', 0, 0, NULL, 1, 0, 1, NULL, NULL, '2023-09-26 14:27:51', NULL, NULL),
(24, 70, '12', '62', NULL, 'variant 1', '1', '1', '0.1', NULL, NULL, NULL, '10', '10', '10', '10', 0, 0, NULL, 1, 0, 1, NULL, NULL, '2023-09-26 14:27:51', NULL, NULL),
(25, 63, '13', '61', NULL, 'L', '1', '400', '40', NULL, NULL, NULL, '10', '10', '10', '10', 0, 0, NULL, 1, 0, 1, NULL, NULL, '2023-09-26 14:32:22', NULL, NULL),
(26, 70, '13', '62', NULL, 'variant 1', '1', '1', '0.1', NULL, NULL, NULL, '10', '10', '10', '10', 0, 0, NULL, 1, 0, 1, NULL, NULL, '2023-09-26 14:32:22', NULL, NULL),
(27, 63, '14', '61', NULL, 'L', '1', '400', '40', NULL, NULL, NULL, '10', '10', '10', '10', 0, 0, NULL, 1, 0, 1, NULL, NULL, '2023-09-26 14:33:45', NULL, NULL),
(28, 70, '14', '62', NULL, 'variant 1', '1', '1', '0.1', NULL, NULL, NULL, '10', '10', '10', '10', 0, 0, NULL, 1, 0, 1, NULL, NULL, '2023-09-26 14:33:45', NULL, NULL),
(29, 63, '15', '61', NULL, 'L', '1', '400', '40', NULL, NULL, NULL, '10', '10', '10', '10', 0, 0, NULL, 1, 0, 1, NULL, NULL, '2023-09-26 14:35:05', NULL, NULL),
(30, 70, '15', '62', NULL, 'variant 1', '1', '1', '0.1', NULL, NULL, NULL, '10', '10', '10', '10', 0, 0, NULL, 1, 0, 1, NULL, NULL, '2023-09-26 14:35:05', NULL, NULL),
(31, 63, '16', '61', NULL, 'L', '1', '400', '40', NULL, NULL, NULL, '10', '10', '10', '10', 0, 0, NULL, 1, 0, 1, NULL, NULL, '2023-09-26 14:36:09', NULL, NULL),
(32, 70, '16', '62', NULL, 'variant 1', '1', '1', '0.1', NULL, NULL, NULL, '10', '10', '10', '10', 0, 0, NULL, 1, 0, 1, NULL, NULL, '2023-09-26 14:36:09', NULL, NULL),
(33, 70, '17', '62', NULL, 'variant 1', '1', '1', '0.1', NULL, NULL, NULL, '10', '10', '10', '10', 0, 0, NULL, 1, 0, 1, NULL, NULL, '2023-09-26 14:42:04', NULL, NULL),
(34, 63, '17', '61', NULL, 'L', '1', '400', '40', NULL, NULL, NULL, '10', '10', '10', '10', 0, 0, NULL, 1, 0, 1, NULL, NULL, '2023-09-26 14:42:04', NULL, NULL),
(35, 70, '18', '62', NULL, 'variant 1', '1', '1', '0.1', NULL, NULL, NULL, '10', '10', '10', '10', 0, 0, NULL, 1, 0, 1, NULL, NULL, '2023-09-26 14:42:34', NULL, NULL),
(36, 63, '18', '61', NULL, 'L', '1', '400', '40', NULL, NULL, NULL, '10', '10', '10', '10', 0, 0, NULL, 1, 0, 1, NULL, NULL, '2023-09-26 14:42:34', NULL, NULL),
(37, 70, '19', '62', NULL, 'variant 1', '1', '1', '0.1', NULL, NULL, NULL, '10', '10', '10', '10', 0, 0, NULL, 1, 0, 1, NULL, NULL, '2023-09-26 14:43:12', NULL, NULL),
(38, 63, '19', '61', NULL, 'L', '1', '400', '40', NULL, NULL, NULL, '10', '10', '10', '10', 0, 0, NULL, 1, 0, 1, NULL, NULL, '2023-09-26 14:43:12', NULL, NULL),
(39, 70, '20', '62', NULL, 'variant 1', '1', '1', '0.1', NULL, NULL, NULL, '10', '10', '10', '10', 0, 0, NULL, 1, 0, 1, NULL, NULL, '2023-09-26 14:44:28', NULL, NULL),
(40, 63, '20', '61', NULL, 'L', '1', '400', '40', NULL, NULL, NULL, '10', '10', '10', '10', 0, 0, NULL, 1, 0, 1, NULL, NULL, '2023-09-26 14:44:28', NULL, NULL),
(41, 70, '21', '62', NULL, 'variant 1', '1', '1', '0.1', NULL, NULL, NULL, '10', '10', '10', '10', 0, 0, NULL, 1, 0, 1, NULL, NULL, '2023-09-26 14:44:41', NULL, NULL),
(42, 63, '21', '61', NULL, 'L', '1', '400', '40', NULL, NULL, NULL, '10', '10', '10', '10', 0, 0, NULL, 1, 0, 1, NULL, NULL, '2023-09-26 14:44:41', NULL, NULL),
(43, 70, '22', '62', NULL, 'variant 1', '1', '1', '0.1', NULL, NULL, NULL, '10', '10', '10', '10', 0, 0, NULL, 1, 0, 1, NULL, NULL, '2023-09-26 14:45:01', NULL, NULL),
(44, 63, '22', '61', NULL, 'L', '1', '400', '40', NULL, NULL, NULL, '10', '10', '10', '10', 0, 0, NULL, 1, 0, 1, NULL, NULL, '2023-09-26 14:45:01', NULL, NULL),
(45, 70, '23', '62', NULL, 'variant 1', '1', '1', '0.1', NULL, NULL, NULL, '10', '10', '10', '10', 0, 0, NULL, 1, 0, 1, NULL, NULL, '2023-09-26 14:45:19', NULL, NULL),
(46, 63, '23', '61', NULL, 'L', '1', '400', '40', NULL, NULL, NULL, '10', '10', '10', '10', 0, 0, NULL, 1, 0, 1, NULL, NULL, '2023-09-26 14:45:19', NULL, NULL),
(47, 71, '24', '62', NULL, 'variant 2', '1', '20', '2', NULL, NULL, NULL, '10', '10', '10', '10', 0, 0, NULL, 1, 0, 1, NULL, NULL, '2023-09-30 11:13:50', NULL, NULL),
(48, 63, '24', '61', NULL, 'L', '1', '400', '40', NULL, NULL, NULL, '10', '10', '10', '10', 0, 0, NULL, 1, 0, 1, NULL, NULL, '2023-09-30 11:13:50', NULL, NULL),
(49, 71, '25', '62', NULL, 'variant 2', '1', '20', '2', NULL, NULL, NULL, '10', '10', '10', '10', 0, 0, NULL, 1, 0, 1, NULL, NULL, '2023-09-30 11:19:14', NULL, NULL),
(50, 63, '25', '61', NULL, 'L', '1', '400', '40', NULL, NULL, NULL, '10', '10', '10', '10', 0, 0, NULL, 1, 0, 1, NULL, NULL, '2023-09-30 11:19:14', NULL, NULL),
(51, 72, '26', '63', NULL, 'abc', '2', '180', '18', NULL, NULL, NULL, '10', '2', '22', '1', 0, 0, NULL, 1, 0, 1, NULL, NULL, '2023-09-30 13:54:30', NULL, NULL),
(52, 72, '27', '63', NULL, 'abc', '1', '90', '9', NULL, NULL, NULL, '10', '2', '22', '1', 0, 0, NULL, 1, 0, 1, NULL, NULL, '2023-10-02 11:23:48', NULL, NULL),
(53, 72, '28', '63', NULL, 'abc', '1', '90', '9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 1, 0, 1, NULL, NULL, '2023-11-21 05:53:39', NULL, NULL),
(54, 70, '28', '62', NULL, 'variant 1', '1', '1', '0.1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 1, 0, 1, NULL, NULL, '2023-11-21 05:53:39', NULL, NULL),
(55, 71, '28', '62', NULL, 'variant 2', '1', '20', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 1, 0, 1, NULL, NULL, '2023-11-21 05:53:39', NULL, NULL),
(56, 73, '29', '64', NULL, 'XL', '1', '1000', '100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 1, 0, 1, NULL, NULL, '2023-11-21 09:10:55', NULL, NULL),
(57, 70, '29', '62', NULL, 'variant 1', '1', '1', '0.1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 1, 0, 1, NULL, NULL, '2023-11-21 09:10:55', NULL, NULL),
(58, 73, '30', '64', NULL, 'XL', '1', '1000', '100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 1, 0, 1, NULL, NULL, '2023-11-21 09:49:12', NULL, NULL),
(59, 63, '31', '61', NULL, 'L', '2', '800', '80', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 1, 0, 1, NULL, NULL, '2023-11-21 10:19:57', NULL, NULL),
(60, 73, '32', '64', NULL, 'XL', '2', '2000', '200', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 1, 0, 1, NULL, NULL, '2023-11-21 13:58:28', NULL, NULL),
(61, 70, '32', '62', NULL, 'variant 1', '2', '2', '0.2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 1, 0, 1, NULL, NULL, '2023-11-21 13:58:28', NULL, NULL),
(62, 73, '33', '64', NULL, 'XL', '1', '1000', '100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 1, 0, 1, NULL, NULL, '2023-11-21 14:00:58', NULL, NULL),
(63, 73, '34', '64', NULL, 'XL', '1', '1000', '100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 1, 0, 1, NULL, NULL, '2023-11-21 14:04:26', NULL, NULL),
(64, 72, '35', '63', NULL, 'abc', '2', '180', '18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 1, 0, 1, NULL, NULL, '2023-11-21 14:11:30', NULL, NULL),
(65, 63, '36', '61', NULL, 'L', '1', '408', '40.8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 1, 0, 1, NULL, NULL, '2023-11-24 07:03:18', NULL, NULL),
(66, 72, '38', '63', NULL, 'abc', '1', '8000', '800', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 1, 0, 1, NULL, NULL, '2023-11-24 07:12:51', NULL, NULL),
(67, 73, '38', '64', NULL, 'XL', '1', '25000', '2500', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 1, 0, 1, NULL, NULL, '2023-11-24 07:12:51', NULL, NULL),
(68, 63, '39', '61', NULL, 'L', '2', '1000', '100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 1, 0, 1, NULL, NULL, '2023-11-24 14:04:36', NULL, NULL),
(69, 73, '40', '64', NULL, 'XL', '1', '1000', '100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 1, 0, 1, NULL, NULL, '2023-11-25 10:29:46', NULL, NULL),
(70, 73, '41', '64', NULL, 'XL', '1', '1000', '100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 1, 0, 1, NULL, NULL, '2023-11-25 13:49:25', NULL, NULL),
(71, 73, '42', '64', NULL, 'XL', '2', '2000', '200', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 1, 0, 1, NULL, NULL, '2023-11-25 14:43:07', NULL, NULL),
(72, 73, '43', '64', NULL, 'XL', '2', '1998', '199.8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 1, 0, 1, NULL, NULL, '2023-11-26 10:45:03', NULL, NULL),
(73, 63, '44', '61', NULL, 'L', '1', '400', '40', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 1, 0, 1, NULL, NULL, '2023-11-26 10:50:41', NULL, NULL),
(74, 63, '45', '61', NULL, 'L', '1', '640', '64', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 1, 0, 1, NULL, NULL, '2023-11-26 11:45:05', NULL, NULL),
(75, 63, '46', '61', NULL, 'L', '1', '400', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 1, 0, 1, NULL, NULL, '2023-11-28 15:03:23', NULL, NULL),
(76, 63, '47', '61', NULL, 'L', '1', '400', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 1, 0, 1, NULL, NULL, '2023-11-28 15:28:55', NULL, NULL),
(77, 63, '48', '61', '1', 'L', '3', '1200', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 1, 0, 1, NULL, NULL, '2023-11-30 10:57:58', NULL, NULL),
(78, 73, '49', '64', '1', 'XL', '1', '1000', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 1, 0, 1, NULL, NULL, '2023-12-01 07:40:35', NULL, NULL),
(79, 74, '50', '65', '0', 'XL', '1', '1300', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 1, 0, 1, NULL, NULL, '2023-12-01 07:45:35', NULL, NULL),
(80, 74, '51', '65', '0', 'XL', '5', '6500', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 1, 0, 1, NULL, NULL, '2023-12-02 08:45:58', NULL, NULL),
(81, 63, '52', '61', '1', 'L', '2', '800', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 1, 0, 1, NULL, NULL, '2023-12-02 14:14:21', NULL, NULL),
(82, 74, '53', '65', '0', 'XL', '2', '2600', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 1, 0, 1, NULL, NULL, '2023-12-02 14:15:33', NULL, NULL),
(83, 63, '54', '61', '1', 'L', '1', '400', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 1, 0, 1, NULL, NULL, '2023-12-02 14:50:13', NULL, NULL),
(84, 63, '55', '61', '0', 'L', '1', '400', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 1, 0, 1, NULL, NULL, '2023-12-03 11:09:26', NULL, NULL),
(85, 74, '56', '65', '0', 'XL', '1', '1300', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 1, 0, 1, NULL, NULL, '2023-12-03 11:36:27', NULL, NULL),
(86, 72, '56', '63', '0', 'abc', '1', '90', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 1, 0, 1, NULL, NULL, '2023-12-03 11:36:27', NULL, NULL),
(87, 63, '56', '61', '0', 'L', '1', '400', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 1, 0, 1, NULL, NULL, '2023-12-03 11:36:27', NULL, NULL),
(88, 63, '57', '61', '0', 'L', '1', '400', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 1, 0, 1, NULL, NULL, '2023-12-04 08:55:27', NULL, NULL),
(89, 74, '58', '65', '0', 'XL', '1', '1300', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 1, 0, 1, NULL, NULL, '2023-12-04 09:11:30', NULL, NULL),
(90, 63, '59', '61', '1', 'L', '1', '400', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 1, 0, 1, NULL, NULL, '2023-12-05 08:34:22', NULL, NULL),
(91, 63, '60', '61', '1', 'L', '1', '400', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 1, 0, 1, NULL, NULL, '2023-12-05 09:18:50', NULL, NULL),
(92, 72, '60', '63', '1', 'abc', '1', '90', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 1, 0, 1, NULL, NULL, '2023-12-05 09:18:50', NULL, NULL),
(93, 63, '61', '61', '1', 'L', '1', '400', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 1, 0, 1, NULL, NULL, '2023-12-08 11:19:38', NULL, NULL),
(94, 63, '62', '61', '0', 'L', '1', '400', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 1, 0, 1, NULL, NULL, '2023-12-10 14:47:40', NULL, NULL),
(95, 63, '64', '61', '0', 'L', '1', '400', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 1, 0, 1, NULL, NULL, '2023-12-11 12:18:56', NULL, NULL),
(96, 75, '67', '66', '0', 'wff', '1', '435', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 1, 0, 1, NULL, NULL, '2023-12-17 08:36:08', NULL, NULL),
(97, 75, '68', '66', '0', 'wff', '1', '435', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 1, 0, 1, NULL, NULL, '2023-12-18 09:48:01', NULL, NULL),
(98, 75, '69', '66', '0', 'wff', '1', '435', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 1, 0, 1, NULL, NULL, '2023-12-19 11:54:50', NULL, NULL),
(99, 75, '70', '66', '0', 'wff', '1', '435', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 1, 0, 1, NULL, NULL, '2023-12-19 11:57:59', NULL, NULL),
(100, 78, '71', '68', '0', 'Dec V1 Himanshu', '1', '3888', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 1, 0, 1, NULL, NULL, '2023-12-20 08:44:12', NULL, NULL),
(101, 78, '72', '68', '0', 'Dec V1 Himanshu', '1', '3888', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 1, 0, 1, NULL, NULL, '2023-12-22 08:32:51', NULL, NULL),
(102, 63, '73', '61', '0', 'L', '1', '400', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 1, 0, 1, NULL, NULL, '2023-12-24 12:12:20', NULL, NULL),
(103, 78, '73', '68', '0', 'Dec V1 Himanshu', '1', '3888', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 1, 0, 1, NULL, NULL, '2023-12-24 12:12:20', NULL, NULL),
(104, 78, '74', '68', '0', 'Dec V1 Himanshu', '1', '3888', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 1, 0, 1, NULL, NULL, '2023-12-27 09:15:15', NULL, NULL),
(105, 79, '75', '69', '0', 'BROWN', '1', '666', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 1, 0, 1, NULL, NULL, '2023-12-31 08:18:03', NULL, NULL),
(106, 79, '76', '69', '1', 'BROWN', '1', '666', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 1, 0, 1, NULL, NULL, '2023-12-31 08:33:26', NULL, NULL),
(107, 83, '77', '73', '0', 'BROWN', '1', '740', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 1, 0, 1, NULL, NULL, '2023-12-31 12:57:11', NULL, NULL),
(108, 83, '78', '73', '0', 'BROWN', '1', '740', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 1, 0, 1, NULL, NULL, '2023-12-31 13:16:22', NULL, NULL),
(109, 140, '79', '128', '1', 'FANCY SLEEPER HELLO PINK GOLDEN', '1', '820', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 1, 0, 1, NULL, NULL, '2024-01-12 13:41:57', NULL, NULL),
(110, 140, '80', '128', '1', 'FANCY SLEEPER HELLO PINK GOLDEN', '1', '820', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 1, 0, 1, NULL, NULL, '2024-01-12 13:55:50', NULL, NULL),
(111, 139, '81', '127', '1', 'FANCY SLEEPER SLEEK  KAREM', '1', '730', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 1, 0, 1, NULL, NULL, '2024-01-13 05:34:00', NULL, NULL),
(112, 150, '82', '138', '0', 'slipper sleek black', '1', '460', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 1, 0, 1, NULL, NULL, '2024-01-14 15:38:49', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
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
-- Table structure for table `prices`
--

CREATE TABLE `prices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `added_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prices`
--

INSERT INTO `prices` (`id`, `name`, `description`, `price`, `active_status`, `is_deleted`, `added_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Beginer', '<p>desc</p>', '5000', 1, 0, 1, 1, NULL, '2022-11-01 13:22:23', '2022-11-01 07:55:21', NULL),
(2, 'advance', '<p>features</p><p></p><ul><li>all free</li></ul><p></p>', '2000', 1, 0, 1, NULL, NULL, '2022-11-01 13:25:40', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `tax_id` int(11) DEFAULT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `sub_cat_id` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `description2` longtext DEFAULT NULL,
  `tag` varchar(255) DEFAULT NULL,
  `qty` varchar(255) DEFAULT NULL,
  `mrp` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `stock_warning` varchar(255) DEFAULT NULL,
  `is_return` tinyint(4) NOT NULL DEFAULT 0,
  `best_selling` tinyint(4) NOT NULL DEFAULT 1,
  `coupon_valid` int(11) DEFAULT NULL,
  `self_shipping` int(11) DEFAULT NULL,
  `sale` tinyint(4) NOT NULL DEFAULT 0,
  `length` int(11) NOT NULL,
  `breath` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `added_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `brand_id`, `tax_id`, `cat_id`, `sub_cat_id`, `image`, `description`, `description2`, `tag`, `qty`, `mrp`, `price`, `stock_warning`, `is_return`, `best_selling`, `coupon_valid`, `self_shipping`, `sale`, `length`, `breath`, `height`, `weight`, `active_status`, `is_deleted`, `added_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'product 1', 2, 1, 2, 2, 'http://127.0.0.1:8000/uploads/65bdee18036dc-walkcy logo black.png', NULL, NULL, NULL, NULL, '1', '1', NULL, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, NULL, NULL, '2024-02-03 07:41:12', '2024-02-03 07:53:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `path` varchar(255) DEFAULT NULL,
  `prd_id` varchar(255) DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `added_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `path`, `prd_id`, `active_status`, `is_deleted`, `added_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'http://127.0.0.1:8000/uploads/1706946072-2023 07_53_47.jpeg', '1', 1, 0, 1, NULL, NULL, '2024-02-03 07:41:12', NULL, NULL),
(2, 'http://127.0.0.1:8000/uploads/1706946072-2023 07_53_45.jpeg', '1', 1, 0, 1, NULL, NULL, '2024-02-03 07:41:12', NULL, NULL),
(3, 'http://127.0.0.1:8000/uploads/1706946072-2023 07_51_32.png', '1', 1, 0, 1, NULL, NULL, '2024-02-03 07:41:12', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_variants`
--

CREATE TABLE `product_variants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `prod_id` varchar(255) DEFAULT NULL,
  `variant` varchar(255) DEFAULT NULL,
  `qty` varchar(255) DEFAULT NULL,
  `mrp` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `length` varchar(255) DEFAULT NULL,
  `breath` varchar(255) DEFAULT NULL,
  `height` varchar(255) DEFAULT NULL,
  `weight` varchar(255) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `added_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_variants`
--

INSERT INTO `product_variants` (`id`, `prod_id`, `variant`, `qty`, `mrp`, `price`, `length`, `breath`, `height`, `weight`, `color`, `active_status`, `is_deleted`, `added_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1', '1', '1', '1', '1', NULL, NULL, NULL, NULL, '#832f2f', 1, 0, 1, NULL, NULL, '2024-02-03 07:41:12', NULL, NULL),
(2, '1', '2', '2', '2', '2', NULL, NULL, NULL, NULL, '#ec7e7e', 1, 0, 1, NULL, NULL, '2024-02-03 07:41:12', NULL, NULL),
(3, '1', '3', '3', '3', '3', NULL, NULL, NULL, NULL, '#ba1212', 1, 0, 1, NULL, NULL, '2024-02-03 07:41:12', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `create` tinyint(4) NOT NULL DEFAULT 0,
  `update` tinyint(4) NOT NULL DEFAULT 0,
  `delete` tinyint(4) NOT NULL DEFAULT 0,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `added_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `create`, `update`, `delete`, `active_status`, `is_deleted`, `added_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Super Admin', 1, 1, 1, 1, 0, 1, 1, NULL, '2022-08-26 07:33:16', '2022-09-08 03:18:59', NULL),
(2, 'Admin', 1, 1, 1, 1, 0, 1, 1, NULL, '2022-08-26 08:42:55', '2022-09-08 03:18:30', NULL),
(3, 'Vendor', 1, 1, 1, 1, 0, 1, NULL, NULL, '2022-08-26 08:43:05', NULL, NULL),
(4, 'User', 1, 1, 1, 1, 0, 1, 1, NULL, '2022-09-06 15:15:12', '2022-09-08 12:32:37', NULL),
(5, 'Doctor', 0, 0, 0, 1, 0, 1, NULL, NULL, '2022-10-16 15:07:20', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `added_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `name`, `cat_id`, `image`, `active_status`, `is_deleted`, `added_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'aristham', 1, 'http://127.0.0.1:8000/uploads/635fb25b37810-ezgif-1-0c3276ad62.jpg', 1, 0, 1, NULL, NULL, '2022-10-31 11:32:43', NULL, NULL),
(2, 'Men Casual', 2, 'https://ecom.todaytalk.in/uploads/64c89e2d79920-product-1.webp', 1, 0, 1, NULL, NULL, '2023-08-01 05:54:53', NULL, NULL),
(3, 'Women Casual', 3, 'https://ecom.todaytalk.in/uploads/64c89e3c4403f-product-1.webp', 1, 0, 1, NULL, NULL, '2023-08-01 05:55:08', NULL, NULL),
(4, 'Kids Casual', 5, 'https://ecom.todaytalk.in/uploads/64c89e5249a87-product-1.webp', 1, 0, 1, NULL, NULL, '2023-08-01 05:55:30', NULL, NULL),
(5, 'newd', 3, 'http://inventory.walkcy.com/uploads/658ad6b02d53f-walkcy logo black.png', 1, 0, 1, 1, NULL, '2023-12-26 13:35:44', '2023-12-26 12:35:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `taxations`
--

CREATE TABLE `taxations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `added_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `taxations`
--

INSERT INTO `taxations` (`id`, `name`, `value`, `active_status`, `is_deleted`, `added_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Zero Tax', '0', 1, 0, 1, 1, NULL, '2022-10-31 11:33:08', '2023-12-26 12:42:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `added_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `position`, `description`, `active_status`, `is_deleted`, `added_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Harshs', 'Developers', 'this is the best prodducts', 1, 0, 1, 1, NULL, '2022-11-08 16:35:33', '2022-11-08 11:23:10', NULL),
(2, 'harsh2', 'Developer', 'okkk', 1, 0, 1, NULL, NULL, '2022-11-08 16:53:26', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `commision` varchar(50) DEFAULT NULL,
  `extra_info` longtext DEFAULT NULL,
  `extra_file` longtext DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `user_type` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `pincode` varchar(50) DEFAULT NULL,
  `location_id` varchar(50) DEFAULT NULL,
  `is_whatsapp` int(11) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `added_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `mobile`, `image`, `password`, `commision`, `extra_info`, `extra_file`, `email_verified_at`, `password_reset_token`, `user_type`, `profile_photo_path`, `pincode`, `location_id`, `is_whatsapp`, `token`, `active_status`, `is_deleted`, `added_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '6393665424', NULL, '$2y$10$PX8uF0GZmPEal8wk6whUR.E86WefmUDbKNBt3dlVdHzn2k3.A5QCi', NULL, NULL, NULL, NULL, NULL, 1, NULL, '226004', 'Primary', NULL, NULL, 1, 0, NULL, 1, NULL, '2022-08-22 08:44:16', '2022-11-28 06:03:56', NULL),
(47, 'harsh', 'harshsrivastava261@gmail.com', '6393228471', NULL, '$2y$10$7JgB4W0v3.M71UCgFaLtte.oWZUIqmP7aKc4N/cUfftgrDerPCGR6', NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, '2024-02-03 11:07:05', '2024-02-03 05:41:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vendor_commisions`
--

CREATE TABLE `vendor_commisions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `cat_id` varchar(255) DEFAULT NULL,
  `commision` varchar(255) DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `added_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendor_commisions`
--

INSERT INTO `vendor_commisions` (`id`, `user_id`, `cat_id`, `commision`, `active_status`, `is_deleted`, `added_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '33', '2', '4', 1, 0, NULL, NULL, NULL, '2022-10-10 13:25:49', NULL, NULL),
(2, '33', '8', '5', 1, 0, NULL, NULL, NULL, '2022-10-10 13:25:49', '2022-10-10 14:50:48', NULL),
(3, '11', NULL, NULL, 1, 0, NULL, NULL, NULL, '2022-11-28 08:57:33', NULL, NULL),
(4, '1', NULL, NULL, 1, 0, NULL, NULL, NULL, '2022-11-28 08:59:47', NULL, NULL),
(5, '1', NULL, NULL, 1, 0, NULL, NULL, NULL, '2022-11-28 11:33:56', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `prod_id` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `added_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `prod_id`, `user_id`, `active_status`, `is_deleted`, `added_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '33', 21, 1, 0, 21, NULL, NULL, '2022-11-05 14:03:38', NULL, NULL),
(2, '20', 21, 1, 0, 21, NULL, NULL, '2022-11-05 14:04:28', NULL, NULL),
(3, '59', 21, 1, 0, 21, NULL, NULL, '2022-11-05 14:35:26', NULL, NULL),
(4, '58', 21, 1, 0, 21, NULL, NULL, '2022-11-05 14:35:28', NULL, NULL),
(5, '57', 21, 1, 0, 21, NULL, NULL, '2022-11-05 14:36:54', NULL, NULL),
(6, '55', 21, 1, 0, 21, NULL, NULL, '2022-11-05 14:36:58', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attribute_values`
--
ALTER TABLE `attribute_values`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand_partners`
--
ALTER TABLE `brand_partners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us_pages`
--
ALTER TABLE `contact_us_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupon_useds`
--
ALTER TABLE `coupon_useds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor_categories`
--
ALTER TABLE `doctor_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor_infos`
--
ALTER TABLE `doctor_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor_reviews`
--
ALTER TABLE `doctor_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eclinic_pages`
--
ALTER TABLE `eclinic_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `forms`
--
ALTER TABLE `forms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genral_pages`
--
ALTER TABLE `genral_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_banners`
--
ALTER TABLE `home_banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_pages`
--
ALTER TABLE `home_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_letters`
--
ALTER TABLE `news_letters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `prices`
--
ALTER TABLE `prices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
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
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taxations`
--
ALTER TABLE `taxations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_mobile_unique` (`mobile`);

--
-- Indexes for table `vendor_commisions`
--
ALTER TABLE `vendor_commisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `attribute_values`
--
ALTER TABLE `attribute_values`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `brand_partners`
--
ALTER TABLE `brand_partners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact_us_pages`
--
ALTER TABLE `contact_us_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `coupon_useds`
--
ALTER TABLE `coupon_useds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctor_categories`
--
ALTER TABLE `doctor_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `doctor_infos`
--
ALTER TABLE `doctor_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `doctor_reviews`
--
ALTER TABLE `doctor_reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `eclinic_pages`
--
ALTER TABLE `eclinic_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forms`
--
ALTER TABLE `forms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `genral_pages`
--
ALTER TABLE `genral_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `home_banners`
--
ALTER TABLE `home_banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `home_pages`
--
ALTER TABLE `home_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `news_letters`
--
ALTER TABLE `news_letters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prices`
--
ALTER TABLE `prices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_variants`
--
ALTER TABLE `product_variants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `taxations`
--
ALTER TABLE `taxations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `vendor_commisions`
--
ALTER TABLE `vendor_commisions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
