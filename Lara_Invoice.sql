-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 04, 2020 at 10:35 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Lara_Invoice`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Super Admin' COMMENT 'Admin | Super Admin',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `phone`, `avatar`, `email`, `password`, `type`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Zingo Admin', '01312281055', NULL, 'zingoadmin@gmail.com', '$2y$10$W7sE30m0Poc8HldZYo8o1OHfHGvNihJDo72jyg9OIZpM1PvqJN/HG', 'Super Admin', 'NOc7xxoSzgGx1bopUarrKWYpnqP9sccVwJNqkAfWvHdQiXbjz4F5Fm7dHTXT', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `order_id` int(10) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_quantity` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `product_id`, `user_id`, `order_id`, `ip_address`, `product_quantity`, `created_at`, `updated_at`) VALUES
(41, 1, 22, 9, '127.0.0.1', 1, '2019-10-22 14:53:25', '2020-09-29 11:25:35'),
(40, 2, 22, 9, '127.0.0.1', 1, '2019-10-22 14:36:49', '2020-09-29 11:25:35'),
(43, 8, NULL, 7, '::1', 2, '2019-11-12 14:06:13', '2019-12-13 02:55:24'),
(38, 2, NULL, 6, '127.0.0.1', 1, '2019-10-17 23:25:58', '2019-10-22 12:58:31'),
(37, 1, 22, 6, '127.0.0.1', 2, '2019-10-16 01:38:13', '2019-10-22 12:58:31'),
(36, 1, 22, 5, '127.0.0.1', 1, '2019-10-16 01:37:26', '2019-10-20 15:53:54'),
(35, 2, 22, 5, '127.0.0.1', 1, '2019-10-16 01:37:22', '2019-10-16 01:37:44'),
(34, 1, 22, 4, '127.0.0.1', 4, '2019-10-16 01:16:53', '2019-10-16 01:32:51'),
(33, 2, 22, 4, '127.0.0.1', 7, '2019-10-16 01:16:50', '2019-10-16 01:35:04'),
(44, 7, NULL, 7, '::1', 1, '2019-11-12 14:06:13', '2019-12-13 02:55:24'),
(45, 8, NULL, 8, '::1', 2, '2020-05-19 10:54:21', '2020-05-19 10:55:11'),
(48, 7, 22, 12, '::1', 1, '2020-09-29 11:29:58', '2020-09-29 11:30:17'),
(49, 8, 22, 13, '::1', 1, '2020-09-29 11:36:35', '2020-09-29 11:36:46'),
(50, 7, 22, 21, '::1', 1, '2020-09-29 11:41:12', '2020-09-29 11:41:23'),
(51, 7, 22, 23, '::1', 1, '2020-09-29 11:44:58', '2020-09-29 11:45:09'),
(52, 7, 22, 24, '::1', 1, '2020-09-29 12:11:48', '2020-09-29 12:11:57'),
(53, 7, 22, 25, '::1', 1, '2020-09-29 12:13:18', '2020-09-29 12:13:27'),
(54, 7, 22, 26, '::1', 1, '2020-09-29 12:14:51', '2020-09-29 12:14:59'),
(55, 7, 22, 27, '::1', 1, '2020-09-29 12:15:55', '2020-09-29 12:16:04'),
(56, 7, 22, 28, '::1', 1, '2020-09-29 12:18:42', '2020-09-29 12:18:52'),
(57, 7, 22, 29, '::1', 1, '2020-09-29 12:20:02', '2020-09-29 12:20:11'),
(58, 7, 22, 30, '::1', 2, '2020-09-29 12:25:09', '2020-09-29 12:25:27'),
(60, 7, 22, 31, '::1', 1, '2020-09-29 12:31:30', '2020-09-29 12:31:44'),
(61, 8, 22, 31, '::1', 1, '2020-09-29 12:31:33', '2020-09-29 12:31:44'),
(62, 7, 22, 32, '::1', 1, '2020-09-29 12:37:06', '2020-09-29 12:37:14'),
(63, 7, NULL, 33, '::1', 1, '2020-09-29 20:31:09', '2020-09-29 20:31:45'),
(64, 7, NULL, 34, '::1', 1, '2020-09-29 20:34:33', '2020-09-29 20:34:50'),
(65, 7, 22, 35, '::1', 1, '2020-09-30 10:27:08', '2020-09-30 10:27:20'),
(66, 7, 22, 36, '::1', 1, '2020-09-30 10:30:03', '2020-09-30 10:30:11'),
(67, 7, 22, 37, '::1', 1, '2020-09-30 10:31:14', '2020-09-30 10:31:22'),
(68, 8, 22, 38, '::1', 1, '2020-09-30 11:04:52', '2020-09-30 11:05:02'),
(69, 7, 22, NULL, '::1', 1, '2020-09-30 11:07:27', '2020-09-30 11:07:27'),
(72, 7, 2, NULL, '::1', 1, '2020-10-01 23:16:25', '2020-10-01 23:16:25'),
(73, 8, 4, 39, '127.0.0.1', 1, '2020-10-04 06:33:02', '2020-10-04 07:36:49'),
(75, 4, 4, 40, '127.0.0.1', 3, '2020-10-04 10:51:34', '2020-10-04 10:52:19'),
(76, 4, 4, 41, '127.0.0.1', 1, '2020-10-04 18:43:25', '2020-10-04 18:44:10');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `parent_id`, `created_at`, `updated_at`) VALUES
(5, 'Vehicle', '4 wheel, 3 wheel, 2 wheel vehicles', NULL, '2019-09-17 02:17:40', '2019-09-17 02:17:40'),
(6, 'Furniture', 'wooden, steel, chinese wood etc', NULL, '2019-09-23 04:11:21', '2019-09-23 04:11:21'),
(7, 'Clothing', 'mens, womens, baby etc', NULL, '2019-09-23 04:11:53', '2019-09-23 04:11:53'),
(8, 'Chair', 'various type of chair', 6, '2019-09-23 04:12:18', '2019-09-23 04:12:18'),
(9, 'Table', 'various types of table', 6, '2019-09-23 04:12:34', '2019-09-23 04:12:34'),
(10, 'Electronics', 'various types of electronics product', NULL, '2019-09-23 11:41:28', '2019-09-23 11:41:28'),
(11, 'Mobile', 'mobile', 10, '2019-09-23 11:41:53', '2019-09-23 11:41:53'),
(12, 'Television', 'television', 10, '2019-09-23 11:42:16', '2019-09-23 11:42:16'),
(13, 'Motor Cycle', '2 wheeler', 5, '2019-10-22 12:31:34', '2019-10-22 12:31:34'),
(14, 'Shirt', 'gents/girls', 7, '2019-10-22 15:21:55', '2019-10-22 15:21:55'),
(15, 'Pant', 'gents/girls', 7, '2019-10-22 15:22:16', '2019-10-22 15:22:32'),
(16, 'Shoe', 'for men, women and kids', 7, '2019-10-29 22:32:54', '2019-10-29 22:32:54'),
(17, 'Shoe', 'eteert', 7, '2020-05-19 11:00:24', '2020-05-19 11:00:24');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `division_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `name`, `division_id`, `created_at`, `updated_at`) VALUES
(1, 'Dhaka', 1, '2019-10-06 00:11:26', '2019-10-06 00:11:26'),
(3, 'Lakshmipur', 3, '2019-10-06 01:02:28', '2019-10-06 01:08:08'),
(4, 'Gazipur', 1, '2019-10-06 01:03:46', '2019-10-06 01:03:46'),
(5, 'Habiganj', 2, '2019-10-06 01:04:19', '2019-10-06 01:04:19'),
(6, 'Noakhali', 3, '2019-10-21 01:27:06', '2019-10-21 01:27:06'),
(7, 'Chittagong', 3, '2019-10-21 01:27:22', '2019-10-21 01:27:22'),
(8, 'Feni', 3, '2019-10-21 01:27:35', '2019-10-21 01:27:35'),
(9, 'Comilla', 3, '2019-10-21 01:27:44', '2019-10-21 01:27:44');

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `priority` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `name`, `priority`, `created_at`, `updated_at`) VALUES
(1, 'Dhaka', 1, '2019-10-05 23:33:27', '2019-10-05 23:33:27'),
(2, 'Sylhet', 4, '2019-10-05 23:33:52', '2019-10-05 23:35:23'),
(3, 'Chittagong', 2, '2019-10-05 23:34:11', '2019-10-05 23:34:11'),
(4, 'Barisal', 3, '2019-10-06 01:14:05', '2019-10-06 01:14:05'),
(5, 'Rajshahi', 5, '2019-10-06 01:14:24', '2019-10-06 01:14:24'),
(6, 'Khulna', 6, '2019-10-06 01:15:01', '2019-10-06 01:15:01'),
(7, 'Rangpur', 7, '2019-10-06 01:15:14', '2019-10-06 01:15:14'),
(8, 'Mymensingh', 8, '2019-10-06 01:15:45', '2019-10-06 01:15:45');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(30, '2014_10_12_000000_create_users_table', 13),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(13, '2019_08_22_081037_create_product_images_table', 5),
(5, '2019_08_22_080516_create_categories_table', 2),
(12, '2019_08_20_085815_create_products_table', 5),
(11, '2019_08_22_112108_create_customers_table', 4),
(14, '2019_09_25_055814_create_brands_table', 5),
(25, '2019_09_25_060913_create_admins_table', 12),
(17, '2019_10_05_053505_create_divisions_table', 7),
(18, '2019_10_05_053517_create_districts_table', 7),
(24, '2019_10_11_055854_create_orders_table', 11),
(20, '2019_10_11_055916_create_carts_table', 8),
(22, '2019_10_15_052423_create_settings_table', 9),
(23, '2019_10_15_062142_create_payments_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `payment_id` int(10) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_paid` tinyint(1) NOT NULL DEFAULT 0,
  `is_completed` tinyint(1) NOT NULL DEFAULT 0,
  `is_seen` tinyint(1) NOT NULL DEFAULT 0,
  `transection_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `payment_id`, `ip_address`, `name`, `phone`, `shipping_address`, `email`, `message`, `is_paid`, `is_completed`, `is_seen`, `transection_id`, `created_at`, `updated_at`) VALUES
(41, 4, 1, '127.0.0.1', 'golam rabbi', '0145675894', 'Mirpur-1, Dhaka', 'rabbi29157@gmail.com', NULL, 0, 0, 1, NULL, '2020-10-04 18:44:10', '2020-10-04 18:53:38');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('abc@gmail.com', '$2y$10$y9.zc.uJLKp1/LamXDAwkeE5V1WfhSL.asgzES/VtudSCzgdduNbW', '2019-10-04 00:00:05');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `priority` tinyint(4) NOT NULL DEFAULT 1,
  `short_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Payment No',
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Agent | Personal',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `name`, `image`, `priority`, `short_name`, `no`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Cash on Delivery', 'cash.jpg', 1, 'cash', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `brand_id` int(10) UNSIGNED NOT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `discription` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `discount_price` int(11) DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `brand_id`, `admin_id`, `name`, `quantity`, `discription`, `price`, `discount_price`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 13, 1, 1, 'Yamaha XSR155', 14, 'The Yamaha XSR155 is powered by the R15 V3\'s 155cc engine, which is good for 19.3 HP of maximum power and 14.7 Nm of maximum torque. The engine is mated to a 6-speed gearbox.', 460000, NULL, 'yamaha-xsr155', 0, '2019-09-28 02:23:04', '2019-10-22 12:32:26'),
(2, 13, 1, 1, 'Yamaha Vixion', 19, 'Yamaha Vixion is a product of Yamaha. Yamaha is the brand of Japan. Yamaha Vixion is Assemble/Made in Indonesia. This bike is powered by 149 engine which generates Maximum power 16.59 PS @ 8500 rpm and its maximum torque is 14.5 Nm @ 7500 rpm. Yamaha Vixion can runs 130 KM per hour and it burns fuel 45 KM per Liter (approx).', 360000, NULL, 'yamaha-vixion', 0, '2019-10-01 00:00:05', '2019-10-22 12:31:59'),
(5, 14, 5, 1, 'Woolen Shirt', 13, 'Good looking\r\nVarious Color', 850, NULL, 'woolen-shirt', 0, '2019-10-22 15:30:44', '2019-10-22 15:30:44'),
(6, 13, 1, 1, 'Yamaha FZS v3', 13, 'The third generation Yamaha FZ FI has been updated with completely new bodywork with a premium and aggressive design. A new headlamp, new side panels, beefier tank extensions,  new engine cowl, new tail section and new exhaust design mark the updated Yamaha FZ FI V 3.0.', 285000, NULL, 'yamaha-fzs-v3', 0, '2019-10-29 22:14:40', '2019-10-29 22:14:40'),
(4, 11, 2, 1, 'Xiaomi Redmi 5', 11, 'Ram: 3 gb\r\nRom: 32 gb\r\nQualcomm SDM450 Snapdragon 450 (14 nm)\r\nPS LCD capacitive touchscreen, 16M colors', 13500, NULL, 'xiaomi-redmi-5', 0, '2019-10-22 15:15:18', '2019-10-22 15:15:18'),
(7, 15, 5, 1, 'Men\'s Formal Pant', 12, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,', 1280, NULL, 'mens-formal-pant', 0, '2019-10-29 22:20:04', '2019-10-29 22:20:04'),
(8, 16, 6, 1, 'Nike Air max Sports Shoe', 12, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', 2700, NULL, 'nike-air-max-sports-shoe', 0, '2019-10-29 22:33:41', '2019-10-29 22:33:41');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, '1569658984.jpg', '2019-09-28 02:23:04', '2019-09-28 02:23:04'),
(2, 2, '1569909605.jpg', '2019-10-01 00:00:06', '2019-10-01 00:00:06'),
(3, 4, '1571778918.png', '2019-10-22 15:15:18', '2019-10-22 15:15:18'),
(4, 5, '1571779844.jpg', '2019-10-22 15:30:45', '2019-10-22 15:30:45'),
(5, 6, '1572408880.png', '2019-10-29 22:14:42', '2019-10-29 22:14:42'),
(6, 7, '1572409204.jpg', '2019-10-29 22:20:05', '2019-10-29 22:20:05'),
(10, 8, '1572410140.jpg', '2019-10-29 22:35:40', '2019-10-29 22:35:40');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_cost` int(10) UNSIGNED NOT NULL DEFAULT 120,
  `tax` int(10) UNSIGNED NOT NULL DEFAULT 5,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `phone`, `email`, `address`, `shipping_cost`, `tax`, `created_at`, `updated_at`) VALUES
(1, '+8801521430684', 'i.maf.shuvo@gmail.com', '205/4/1, Middle Paikpara, Tajlane, Mirpur-1, Dhaka-1216', 30, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `ip_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `phone`, `email`, `password`, `street_address`, `city`, `status`, `ip_address`, `avatar`, `shipping_address`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 'golam', 'rabbi', 'golamrabbi', '0145675894', 'rabbi29157@gmail.com', '$2y$10$0pPR6Dq9aKzoaBQuzP6JHemsly4GF9e3dzC6fjwbc85BbRsFP8IiC', 'Mirpur-1', 'Dhaka', 1, '127.0.0.1', NULL, NULL, 'mLd7q1oDwst6FdGUPjqEJowdx0S4pB80BOdus3J0Vq9hArCevLXywmpo48SR', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_product_id_foreign` (`product_id`),
  ADD KEY `carts_order_id_foreign` (`order_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_payment_id_foreign` (`payment_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `payments_short_name_unique` (`short_name`);

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
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
