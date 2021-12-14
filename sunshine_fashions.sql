-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2020 at 07:04 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sunshine_fashions`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Saree', '2020-11-27 01:59:02', '2020-11-27 01:59:02'),
(2, 'Salwar', '2020-11-27 01:59:02', '2020-11-27 01:59:02'),
(3, 'Top', '2020-11-27 01:59:02', '2020-11-27 01:59:02'),
(4, 'Skirt', '2020-11-27 01:59:02', '2020-11-27 01:59:02'),
(5, 'Blouse', '2020-11-27 01:59:03', '2020-11-27 01:59:03'),
(6, 'Frock', '2020-11-27 01:59:03', '2020-11-27 01:59:03');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_10_29_152452_create_categories_table', 1),
(5, '2020_11_03_062458_create_products_table', 1),
(6, '2020_12_04_075341_create_carts_table', 2),
(7, '2020_12_07_050651_create_carts_table', 3),
(8, '2020_12_10_042442_create_orders_table', 4),
(9, '2020_12_13_042935_create_order_items_table', 5),
(10, '2020_12_15_082801_create_order_details_table', 6),
(11, '2020_12_15_122709_create_orders_table', 7),
(12, '2020_12_15_125315_create_order_items_table', 8),
(13, '2020_12_15_134033_create_orders_table', 9),
(14, '2020_12_15_134247_create_order_items_table', 10),
(15, '2020_12_15_135214_create_orders_table', 11),
(16, '2020_12_15_135326_create_order_items_table', 12),
(17, '2020_12_18_175621_create_orders_table', 13),
(18, '2020_12_18_175723_create_order_items_table', 14);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('pending','processing','completed','decline') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `grand_total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_count` int(10) UNSIGNED NOT NULL,
  `payment_status` tinyint(1) NOT NULL DEFAULT 1,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `line1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `line2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_number`, `user_id`, `status`, `grand_total`, `item_count`, `payment_status`, `payment_method`, `note`, `firstname`, `lastname`, `line1`, `line2`, `post_code`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'ORD-5FDCEDDB58D84', 2, 'pending', '16900', 3, 1, 'cash', 'good', 'Mishoba', 'Selvarathnam', 'Manipay road kopay', 'north kopay jaffna', '4000', '0772409260', '2020-12-18 12:28:51', '2020-12-18 12:28:55');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` bigint(20) NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `user_id`, `order_id`, `product_id`, `quantity`, `price`, `avatar`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 12, 1, '4000', 'avatar.1606538014.jpg', '2020-12-18 12:28:51', '2020-12-18 12:28:51'),
(2, 2, 1, 8, 1, '900', 'avatar.1606537659.jpg', '2020-12-18 12:28:51', '2020-12-18 12:28:51'),
(3, 2, 1, 2, 1, '12000', 'avatar.1606537222.jpg', '2020-12-18 12:28:51', '2020-12-18 12:28:51');

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `real_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `avatar`, `brand`, `real_price`, `price`, `status`, `code`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Half sleeve Frock', 'avatar.1606537260.webp', 'Frock', '1000', '800', 'In stock', 'Product 01', 'A beautiful silver color frock.', '2020-11-27 22:11:33', '2020-11-27 22:51:00'),
(2, 'Pink net saree', 'avatar.1606537222.jpg', 'Saree', '19000', '12000', 'In stock', 'Product 02', 'Saree', '2020-11-27 22:12:39', '2020-12-09 05:01:54'),
(3, 'Blue designed saree', 'avatar.1606537187.jpg', 'Saree', '18000', '15000', 'In stock', 'Product 03', 'A blue saree with colorful', '2020-11-27 22:14:20', '2020-12-09 05:01:41'),
(4, 'Full sleeve Frock', 'avatar.1606537149.jpg', 'Frock', '2000', '1600', 'Out of Stock', 'Product 04', 'A simple frock', '2020-11-27 22:16:40', '2020-12-09 05:01:31'),
(5, 'Green Full Salwar', 'avatar.1606536950.jpg', 'Salwar', '4000', '3800', 'Out of Stock', 'Product 05', 'Salawar', '2020-11-27 22:21:40', '2020-12-09 05:01:23'),
(6, 'Blue Half salwar', 'avatar.1606537078.jpg', 'Salwar', '1000', '800', 'Out of Stock', 'Product 06', 'Salwar', '2020-11-27 22:31:38', '2020-12-09 05:01:13'),
(7, 'Kalf sleeve Top', 'avatar.1606537643.jpg', 'Top', '1500', '1000', 'In stock', 'Product 07', 'Top', '2020-11-27 22:55:53', '2020-12-09 05:01:06'),
(8, 'Top', 'avatar.1606537659.jpg', 'Top', '1200', '900', 'In stock', 'Product 08', 'tp', '2020-11-27 22:57:39', '2020-12-09 05:00:56'),
(10, 'Half Top', 'avatar.1606537905.jpg', 'Top', '1700', '1500', 'Out of Stock', 'Product 09', 'top', '2020-11-27 23:01:02', '2020-12-09 05:00:48'),
(11, 'Pattern Top', 'avatar.1606537953.jpeg', 'Top', '1400', '1200', 'In stock', 'Product 10', 'Black Top', '2020-11-27 23:02:33', '2020-12-09 05:00:41'),
(12, 'Net Saree', 'avatar.1606538014.jpg', 'Saree', '5000', '4000', 'In stock', 'Product 11', 'jkew', '2020-11-27 23:03:34', '2020-12-09 05:00:27'),
(13, 'Pattu Saree', 'avatar.1606538118.jpg', 'Saree', '10000', '8000', 'In stock', 'Product 12', 'Pattu saree', '2020-11-27 23:05:18', '2020-12-09 05:00:20'),
(14, 'Normal Saree', 'avatar.1606538186.jpg', 'Saree', '5000', '4300', 'Out of Stock', 'Product 13', 'Blue & white saree', '2020-11-27 23:06:26', '2020-12-09 04:58:42'),
(15, 'Pattern Saree', 'avatar.1606538238.jpg', 'Saree', '20000', '17000', 'In stock', 'Product 14', 'Saree', '2020-11-27 23:07:18', '2020-12-09 04:58:52'),
(16, 'Half Sleeve cotton Frock', 'avatar.1606544760.jpg', 'Frock', '1300', '1000', 'In stock', 'Product 15', 'Half sleeve frock', '2020-11-28 00:56:00', '2020-12-09 04:59:02'),
(17, 'Cotton Frock', 'avatar.1606545214.jpg', 'Frock', '1900', '1500', 'In stock', 'Product 16', 'djjfk', '2020-11-28 01:03:34', '2020-12-09 04:59:10'),
(18, 'Half Salwar', 'avatar.1606545283.jpeg', 'Salwar', '1500', '1000', 'Out of Stock', 'Product 17', 'jdd', '2020-11-28 01:04:43', '2020-12-09 04:59:18'),
(19, 'Green half salwar', 'avatar.1606545450.jpeg', 'Salwar', '1300', '1000', 'Out of Stock', 'Product 18', 'djkf', '2020-11-28 01:07:30', '2020-12-09 04:59:29'),
(20, 'Cotton salwar', 'avatar.1606545456.jpg', 'Salwar', '1400', '1200', 'Out of Stock', 'Product 19', 'wekwjrrle', '2020-11-28 01:07:36', '2020-12-09 04:59:38'),
(21, 'Blue pattu saree', 'avatar.1606545576.jpeg', 'Saree', '18000', '15000', 'In stock', 'Product 20', 'qer', '2020-11-28 01:09:36', '2020-12-09 04:59:55'),
(22, 'White Top', 'avatar.1606545581.jpg', 'Top', '1700', '1500', 'In stock', 'Product 21', 'ertj', '2020-11-28 01:09:41', '2020-12-09 05:00:02'),
(23, 'Brown Frock', 'avatar.1606749177.jpg', 'Frock', '1700', '1400', 'Out of Stock', 'Product 22', 'dkjf', '2020-11-30 09:11:19', '2020-12-09 05:00:11'),
(24, 'Circle neck Frock', 'avatar.1606747491.jpg', 'Frock', '2000', '2000', 'In stock', 'Product 23', 'jw', '2020-11-30 09:14:51', '2020-12-09 04:57:16'),
(25, 'Check Design Frock', 'avatar.1606749117.jpg', 'Frock', '2000', '1400', 'In stock', 'Product 24', 'wjq', '2020-11-30 09:16:25', '2020-12-09 04:57:05'),
(26, 'Fashion Frock', 'avatar.1606749148.webp', 'Frock', '1800', '1500', 'In stock', 'Product 25', 'jhd', '2020-11-30 09:34:23', '2020-12-09 04:56:54'),
(27, 'Red Party frock', 'avatar.1606749277.jpg', 'Frock', '3500', '2700', 'In stock', 'Product 26', 'jksdk', '2020-11-30 09:44:37', '2020-12-09 04:56:46'),
(28, 'Net Frock', 'avatar.1606749643.jpg', 'Frock', '4000', '2500', 'In stock', 'Product 27', 'svd', '2020-11-30 09:50:43', '2020-12-09 04:56:37'),
(29, 'Net Party Frock', 'avatar.1606750488.jpg', 'Frock', '3500', '3000', 'In stock', 'Product 28', 'jd', '2020-11-30 10:02:05', '2020-12-09 04:56:25'),
(30, 'Simple Frock', 'avatar.1606750541.webp', 'Frock', '1500', '1300', 'In stock', 'Product 29', 'sd', '2020-11-30 10:05:41', '2020-12-09 04:56:17'),
(32, 'Half simple salwar', 'avatar.1606796213.jpg', 'Salwar', '1500', '1000', 'Out of Stock', 'Product 30', 'hdj', '2020-11-30 22:33:10', '2020-12-09 04:56:00'),
(33, 'Full Salwar', 'avatar.1606795570.jpg', 'Salwar', '5000', '4000', 'In stock', 'Product 31', 'enrf', '2020-11-30 22:34:33', '2020-12-09 04:55:50'),
(34, 'Maroon salwar', 'avatar.1606796273.jpg', 'Salwar', '8000', '6000', 'In stock', 'Product 32', 'sdsf', '2020-11-30 22:37:07', '2020-12-09 04:55:41'),
(35, 'Normal Design Chudi', 'avatar.1606796433.jpg', 'Salwar', '6000', '4000', 'In stock', 'Product 33', 'ddfgf', '2020-11-30 22:50:33', '2020-12-09 04:54:27'),
(36, 'Embroidery Anarkali', 'avatar.1606796514.jpg', 'Salwar', '15000', '12000', 'Out of Stock', 'Product 34', 'dn', '2020-11-30 22:51:54', '2020-12-09 04:54:36'),
(37, 'Half and Half Saree', 'avatar.1606797439.jpg', 'Saree', '13000', '9500', 'In stock', 'Product 35', 'bsdf', '2020-11-30 23:03:39', '2020-12-09 04:54:13'),
(38, 'Kanchipuram Hand Embroidered Saree in Blue and Golden', 'avatar.1606798054.jpg', 'Saree', '12000', '10000', 'In stock', 'Product 36', 'djf', '2020-11-30 23:11:47', '2020-12-09 04:54:02'),
(40, 'Kanchipuram Hand Embroidered Saree in Red', 'avatar.1606798232.jpg', 'Saree', '42000', '35000', 'In stock', 'Product 37', 'nsd', '2020-11-30 23:20:32', '2020-12-09 04:53:50'),
(41, 'Lemon color kurti', 'avatar.1606800097.jpg', 'Top', '1000', '800', 'In stock', 'Product 38', 'ahns', '2020-11-30 23:51:37', '2020-12-09 04:53:37'),
(42, 'pink kurti', 'avatar.1606800208.jpg', 'Top', '1200', '800', 'Out of Stock', 'Product 39', 'shd', '2020-11-30 23:52:27', '2020-12-09 04:53:27'),
(43, 'Full kurti', 'avatar.1606800274.jpg', 'Top', '2300', '2000', 'Out of Stock', 'Product 40', 'df', '2020-11-30 23:54:34', '2020-12-09 04:53:11'),
(44, 'Peacock design kurti', 'avatar.1606800356.jpg', 'Top', '1700', '1300', 'In stock', 'Product 41', 'ndf', '2020-11-30 23:55:56', '2020-12-09 04:52:56'),
(45, 'Green simple kurti', 'avatar.1606800429.jpg', 'Top', '1700', '1500', 'In stock', 'Product 42', 'cv', '2020-11-30 23:56:50', '2020-12-09 04:52:47'),
(46, 'casual wear blouse', 'avatar.1606801126.jpg', 'Blouse', '800', '500', 'In stock', 'Product 43', 'jksdf', '2020-12-01 00:08:46', '2020-12-09 04:47:32'),
(47, 'Half sleeve blouse', 'avatar.1606827014.jpg', 'Blouse', '1000', '800', 'In stock', 'Product 44', 'fghjk', '2020-12-01 00:23:17', '2020-12-09 04:51:11'),
(48, 'Check Design Blouse', 'avatar.1606802074.jpg', 'Blouse', '1200', '800', 'In stock', 'Product 45', 'fgh', '2020-12-01 00:24:34', '2020-12-09 04:50:49'),
(49, 'Half sleeve fabric blouse', 'avatar.1606802198.jpg', 'Blouse', '1500', '1300', 'Out of Stock', 'Product 46', 'gh', '2020-12-01 00:25:50', '2020-12-09 04:50:37'),
(50, 'Office Interview Blouse', 'avatar.1606802285.jpg', 'Blouse', '1500', '1200', 'In stock', 'Product 47', 'hjk', '2020-12-01 00:28:05', '2020-12-09 04:50:20'),
(51, 'Office Fabric Blouse', 'avatar.1606802349.jpg', 'Blouse', '1700', '1200', 'Out of Stock', 'Product 48', 'jkl', '2020-12-01 00:29:09', '2020-12-09 04:49:58'),
(53, 'Half Sleeve Brown Colour Frock', 'avatar.1606802645.jpeg', 'Blouse', '1200', '1200', 'In stock', 'Product 49', 'gh', '2020-12-01 00:34:05', '2020-12-09 04:49:48'),
(54, 'Half Sleeve check Blouse', 'avatar.1606802747.jpg', 'Blouse', '900', '700', 'Out of Stock', 'Product 50', 'dfjm', '2020-12-01 00:35:47', '2020-12-09 04:49:30'),
(55, 'Half Sleeve maroon Blouse', 'avatar.1606803836.jpg', 'Blouse', '900', '1300', 'Out of Stock', 'Product 51', 'nm', '2020-12-01 00:53:56', '2020-12-09 04:49:13'),
(56, 'Half sleeve Flower Design Blouse', 'avatar.1606803920.jpg', 'Blouse', '1200', '1000', 'Out of Stock', 'Product 52', 'dhjfkg', '2020-12-01 00:55:20', '2020-12-09 04:48:51'),
(57, 'Green Layer Skirt', 'avatar.1606804827.jpg', 'Skirt', '800', '500', 'In stock', 'Product 53', 'sdf', '2020-12-01 01:10:27', '2020-12-09 04:47:02'),
(58, 'Blue Layered Skirt', 'avatar.1606804881.jpg', 'Skirt', '1200', '1000', 'Out of Stock', 'Product 54', 'sdfdgfb', '2020-12-01 01:11:21', '2020-12-09 04:46:48'),
(59, 'Office Skirt', 'avatar.1606804940.jpg', 'Skirt', '1500', '1200', 'Out of Stock', 'Product 55', 'saghj', '2020-12-01 01:12:20', '2020-12-09 04:46:20'),
(60, 'Office Interview Skirt', 'avatar.1606805008.webp', 'Skirt', '900', '1200', 'Out of Stock', 'Product 56', 'sghgdjfg', '2020-12-01 01:13:28', '2020-12-09 04:45:47'),
(61, 'Black Pleats Skirt', 'avatar.1606807378.jpg', 'Skirt', '700', '700', 'Out of Stock', 'Product 57', 'hhjwk', '2020-12-01 01:48:29', '2020-12-01 01:52:58'),
(62, 'Flower Design Skirt', 'avatar.1606827078.jpg', 'Skirt', '900', '600', 'In stock', 'Product 58', 'sdyfud', '2020-12-01 01:49:37', '2020-12-09 04:42:50'),
(63, 'Denim Button Skirt', 'avatar.1606807404.jpg', 'Skirt', '1500', '1000', 'In stock', 'Product 59', 'hsjd', '2020-12-01 01:51:18', '2020-12-09 04:43:17'),
(64, 'Block printed Skirt', 'avatar.1606807341.jpg', 'Skirt', '1200', '1100', 'In stock', 'Product 60', 'gwhgherjr', '2020-12-01 01:52:01', '2020-12-09 04:42:25'),
(65, 'Blue Long Net Skirt', 'avatar.1606807450.jpg', 'Skirt', '1200', '800', 'In stock', 'Product 61', 'ghwhje', '2020-12-01 01:54:10', '2020-12-09 04:41:48'),
(66, 'Denim Office Skirt', 'avatar.1606807571.jpg', 'Skirt', '1900', '1300', 'In stock', 'Product 62', 'ghgwjed', '2020-12-01 01:55:35', '2020-12-09 04:40:38');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `firstname`, `lastname`, `role`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, NULL, 'Admin', 'admin@gmail.com', NULL, '$2y$10$rzReANcv9T9f1JP8rYbT1eW31cOCu3253vEG84uBmBL/hpqEt75Vy', NULL, '2020-11-27 01:59:01', '2020-11-27 01:59:01'),
(2, 'User', 'Mishoba', 'Selvarathnam', 'User', 'misho@gmail.com', NULL, '$2y$10$bahkpECxEfUWGL8B/7QBbO4YSqjBONo4Farq1nMVrl1ogNI6Yk8A6', NULL, '2020-11-27 01:59:02', '2020-11-27 01:59:02'),
(3, 'miso', NULL, NULL, 'User', 'mishomishoba@gmail.com', NULL, '$2y$10$UEzu4pA0PyuEeAAbfklIl.9IxdLktXEd778Dbv0vwKoK4t7TA1aTu', NULL, '2020-12-06 23:00:44', '2020-12-06 23:00:44'),
(4, 'mishomishoba', NULL, NULL, 'User', 'mishose@gmail.com', NULL, '$2y$10$lSvZsk/9R8kkAZKsO8k21.vQ5mV/EXfkG32dOEZyA3IOjxaf5xSuW', NULL, '2020-12-10 21:20:30', '2020-12-10 21:20:30'),
(5, 'kiniththa', 'Kini', 'Thiruchchelvam', 'User', 'tkiniththa05@gmail.com', NULL, '$2y$10$A9KHsjs3fpcvsRdU0JYu.efjZ19wncdVY86x4gAGbuF1V5.WeeYGi', NULL, '2020-12-18 12:31:43', '2020-12-18 12:31:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_order_number_unique` (`order_number`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_user_id_foreign` (`user_id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_name_unique` (`name`),
  ADD UNIQUE KEY `products_code_unique` (`code`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
