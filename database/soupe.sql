-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 17, 2021 at 01:17 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `soupe`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `created_at`, `updated_at`) VALUES
(3, 'Foot Wears', '2020-08-20 16:35:49', '2021-11-24 15:05:09'),
(4, 'Jewerries', '2020-08-20 16:35:59', '2021-11-24 15:04:50'),
(5, 'Ladies Wear', '2020-08-20 16:42:16', '2021-11-24 15:04:20'),
(6, 'Guys Wear', '2020-08-20 16:42:36', '2021-11-24 15:04:07'),
(7, 'Food Stuffs', '2020-08-20 16:45:24', '2021-11-24 15:03:48'),
(8, 'Electronics', '2020-08-20 16:45:34', '2021-11-24 15:03:37');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `user_id`, `email`, `name`, `message`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 'admin@vb.com', 'Admins', '&lt;p&gt;I wanna ask you questions&lt;/p&gt;', 'read', '2020-09-29 10:32:41', '2020-10-04 10:49:02'),
(2, 1, 'admin@vb.com', 'Admins', 'good &lt;b&gt;morning dear&amp;nbsp; &lt;/b&gt;&lt;u&gt;how are you&lt;/u&gt; &lt;i&gt;doing &lt;b&gt;jare&lt;/b&gt;&lt;/i&gt;&lt;br&gt;', 'read', '2020-10-04 00:18:24', '2020-10-04 10:57:35'),
(3, 1, 'admin@vb.com', 'Admins', '&lt;p&gt;Read me &lt;/p&gt;&lt;p&gt;so that we can go&lt;br&gt;&lt;/p&gt;', 'read', '2020-10-04 11:06:06', '2021-11-23 10:27:28'),
(4, 1, 'admin@vb.com', 'Admins', '&lt;p&gt;aslkdaslkdasldks da&lt;/p&gt;&lt;p&gt;sldkasldk;laskd;lask&lt;/p&gt;&lt;p&gt;ad;las;ldkaslkda;lskd;lak&lt;/p&gt;&lt;p&gt;asldjasldjaskjdklasjdklasjdklsajl&lt;br&gt;&lt;/p&gt;', 'read', '2021-11-23 10:28:58', '2021-11-23 10:29:16');

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
(3, '2020_08_09_233224_create_products_table', 1),
(4, '2020_08_10_000227_create_categories_table', 1),
(5, '2020_08_10_000558_create_pictures_table', 1),
(6, '2020_08_20_082355_create_orders_table', 1),
(7, '2020_08_20_092605_create_orderd_prodcts_table', 1),
(8, '2020_08_22_050143_create_order_histories_table', 1),
(9, '2020_09_10_010721_create_settings_table', 2),
(10, '2020_09_29_094437_create_contacts_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `orderd_prodcts`
--

CREATE TABLE `orderd_prodcts` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orderd_prodcts`
--

INSERT INTO `orderd_prodcts` (`id`, `order_id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, '5', '6', '3', '2020-08-22 08:44:22', '2020-08-22 08:44:22'),
(2, '5', '5', '1', '2020-08-22 08:44:22', '2020-08-22 08:44:22'),
(3, '5', '4', '1', '2020-08-22 08:44:22', '2020-08-22 08:44:22'),
(4, '3', '6', '11', '2020-08-22 08:47:19', '2020-08-22 08:47:19'),
(5, '3', '5', '2', '2020-08-22 08:47:19', '2020-08-22 08:47:19'),
(6, '3', '4', '2', '2020-08-22 08:47:19', '2020-08-22 08:47:19'),
(7, '5', '6', '1', '2020-08-22 10:10:46', '2020-08-22 10:10:46'),
(8, '5', '5', '1', '2020-08-22 10:10:47', '2020-08-22 10:10:47'),
(9, '8', '2', '1', '2020-08-26 01:23:18', '2020-08-26 01:23:18'),
(10, '8', '1', '1', '2020-08-26 01:23:18', '2020-08-26 01:23:18'),
(11, '8', '3', '1', '2020-08-26 01:23:18', '2020-08-26 01:23:18'),
(12, '11', '5', '1', '2020-09-02 01:26:46', '2020-09-02 01:26:46'),
(13, '11', '4', '1', '2020-09-02 01:26:46', '2020-09-02 01:26:46'),
(14, '11', '1', '3', '2020-09-02 01:26:46', '2020-09-02 01:26:46'),
(15, '14', '1', '1', '2020-11-19 07:09:42', '2020-11-19 07:09:42'),
(16, '14', '6', '1', '2020-11-19 07:09:43', '2020-11-19 07:09:43'),
(17, '14', '7', '2', '2020-11-19 07:09:43', '2020-11-19 07:09:43'),
(18, '16', '4', '2', '2020-11-19 07:30:54', '2020-11-19 07:30:54'),
(19, '16', '11', '3', '2020-11-19 07:30:54', '2020-11-19 07:30:54'),
(20, '18', '10', '1', '2020-11-19 07:34:31', '2020-11-19 07:34:31'),
(21, '18', '1', '1', '2020-11-19 07:34:31', '2020-11-19 07:34:31'),
(22, '21', '5', '3', '2020-11-19 07:54:56', '2020-11-19 07:54:56'),
(23, '21', '1', '1', '2020-11-19 07:54:57', '2020-11-19 07:54:57'),
(24, '21', '4', '2', '2020-11-19 07:54:57', '2020-11-19 07:54:57'),
(25, '23', '7', '1', '2020-11-21 01:32:50', '2020-11-21 01:32:50'),
(26, '23', '13', '2', '2020-11-21 01:32:51', '2020-11-21 01:32:51'),
(27, '25', '9', '1', '2021-10-10 05:52:19', '2021-10-10 05:52:19'),
(28, '25', '15', '1', '2021-10-10 05:52:19', '2021-10-10 05:52:19'),
(29, '29', '15', '1', '2021-11-23 03:47:50', '2021-11-23 03:47:50'),
(30, '29', '6', '1', '2021-11-23 03:47:50', '2021-11-23 03:47:50'),
(31, '29', '5', '1', '2021-11-23 03:47:51', '2021-11-23 03:47:51'),
(32, '29', '4', '1', '2021-11-23 03:47:51', '2021-11-23 03:47:51'),
(33, '31', '17', '2', '2021-11-27 08:32:11', '2021-11-27 08:32:11'),
(34, '31', '34', '4', '2021-11-27 08:32:11', '2021-11-27 08:32:11');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Pending','Delivered','Processing') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `delivered_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picture_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_zipcode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_total_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `orderid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `product_id`, `status`, `delivered_by`, `picture_id`, `quantity`, `product_name`, `billing_email`, `billing_country`, `billing_state`, `billing_city`, `billing_address`, `billing_zipcode`, `billing_phone`, `billing_price`, `billing_total_price`, `billing_payment_method`, `orderid`, `created_at`, `updated_at`) VALUES
(1, '3', '6', 'Delivered', '', '8', '11', 'tanatase', 'ok@vb.com', 'nigeria', 'oyo', 'iseyin', 'isalu, iseyin', '123456', '098776634', '323', '3553', 'Paystack', 'd41d8cd98f00b204e9800998ecf8427e', '2020-08-22 08:47:19', '2020-08-22 08:47:19'),
(2, '3', '5', 'Pending', '', '7', '2', 'green beans', 'ok@vb.com', 'nigeria', 'oyo', 'iseyin', 'isalu, iseyin', '123456', '098776634', '90', '180', 'Paystack', 'd41d8cd98f00b204e9800998ecf8427e', '2020-08-22 08:47:19', '2020-08-22 08:47:19'),
(3, '3', '4', 'Pending', '', '6', '2', 'carrot', 'ok@vb.com', 'nigeria', 'oyo', 'iseyin', 'isalu, iseyin', '123456', '098776634', '897', '1794', 'Paystack', 'd41d8cd98f00b204e9800998ecf8427e', '2020-08-22 08:47:19', '2020-08-22 08:47:19'),
(4, '3', '6', 'Delivered', 'Oluokun Kabiru', '8', '1', 'tanatase', 'ok@vb.com', 'ila', 'oyo', 'iseyin', 'okola, tribamark', '123456', '098776634', '323', '323', 'Paypal', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', '2020-08-22 10:10:44', '2020-08-30 15:53:02'),
(5, '3', '5', 'Delivered', 'Oluokun Kabiru', '7', '1', 'green beans', 'ok@vb.com', 'ila', 'oyo', 'iseyin', 'okola, tribamark', '123456', '098776634', '90', '90', 'Paypal', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', '2020-08-22 10:10:45', '2020-09-02 00:45:19'),
(6, '2', '2', 'Pending', '', '4', '1', 'Banana', 'oka@vb.com', 'nigeria', 'oyo', 'iseyin', 'isalu, iseyin', '123456', '09897873', '500', '500', 'Cash', 'e4da3b7fbbce2345d7772b0674a318d5', '2020-08-26 01:23:18', '2020-08-26 01:23:18'),
(7, '2', '1', 'Delivered', 'Admins', '3', '1', 'fresh tomatoes', 'oka@vb.com', 'nigeria', 'oyo', 'iseyin', 'isalu, iseyin', '123456', '09897873', '768', '768', 'Cash', 'e4da3b7fbbce2345d7772b0674a318d5', '2020-08-26 01:23:18', '2020-11-19 08:01:02'),
(8, '2', '3', 'Delivered', '', '5', '1', 'all in one', 'oka@vb.com', 'nigeria', 'oyo', 'iseyin', 'isalu, iseyin', '123456', '09897873', '90', '90', 'Cash', 'e4da3b7fbbce2345d7772b0674a318d5', '2020-08-26 01:23:18', '2020-08-26 01:23:18'),
(9, '2', '5', 'Pending', NULL, '7', '1', 'green beans', 'oka@vb.com', 'angola', 'oyo', 'iseyin', 'oka the street, 21', '123456', '09897873', '90', '90', 'Cash', 'c9f0f895fb98ab9159f51fd0297e236d', '2020-09-02 01:26:45', '2020-09-02 01:26:45'),
(10, '2', '4', 'Pending', NULL, '6', '1', 'carrot', 'oka@vb.com', 'angola', 'oyo', 'iseyin', 'oka the street, 21', '123456', '09897873', '897', '897', 'Cash', 'c9f0f895fb98ab9159f51fd0297e236d', '2020-09-02 01:26:45', '2020-09-02 01:26:45'),
(11, '2', '1', 'Delivered', 'Admins', '3', '3', 'fresh tomatoes', 'oka@vb.com', 'angola', 'oyo', 'iseyin', 'oka the street, 21', '123456', '09897873', '768', '2304', 'Cash', 'c9f0f895fb98ab9159f51fd0297e236d', '2020-09-02 01:26:45', '2020-09-05 14:22:45'),
(12, '2', '1', 'Delivered', 'Admins', '3', '1', 'fresh tomatoes', 'oka@vb.com', 'cuba', 'osun', 'osogo', 'orita sabo, osogbo', '123456', '7536253', '768.00', '768', 'Bitcoin', '6512bd43d9caa6e02c990b0a82652dca', '2020-11-19 07:09:42', '2020-11-19 08:00:37'),
(13, '2', '6', 'Pending', NULL, '34', '1', 'tanatase', 'oka@vb.com', 'cuba', 'osun', 'osogo', 'orita sabo, osogbo', '123456', '7536253', '323.00', '323', 'Bitcoin', '6512bd43d9caa6e02c990b0a82652dca', '2020-11-19 07:09:42', '2020-11-19 07:09:42'),
(14, '2', '7', 'Pending', NULL, '33', '2', 'Cashew Nut', 'oka@vb.com', 'cuba', 'osun', 'osogo', 'orita sabo, osogbo', '123456', '7536253', '432.00', '864', 'Bitcoin', '6512bd43d9caa6e02c990b0a82652dca', '2020-11-19 07:09:42', '2020-11-19 07:09:42'),
(15, '1', '4', 'Pending', NULL, '6', '2', 'carrot', 'admin@vb.com', 'nigeria', 'oyo', 'osogbo', 'Orita, Sabo osogbo', '444332', '809804', '897.00', '1794', 'Paystack', 'aab3238922bcc25a6f606eb525ffdc56', '2020-11-19 07:30:54', '2020-11-19 07:30:54'),
(16, '1', '11', 'Delivered', 'Oluokun Kabiru', '35', '3', 'group photo', 'admin@vb.com', 'nigeria', 'oyo', 'osogbo', 'Orita, Sabo osogbo', '444332', '809804', '23.00', '69', 'Paystack', 'aab3238922bcc25a6f606eb525ffdc56', '2020-11-19 07:30:54', '2020-11-19 08:02:28'),
(17, '3', '10', 'Delivered', 'Admins', '32', '1', 'Tomatoess', 'ok@vb.com', 'nigeria', 'osun', 'osogbo', 'osogbo, orita sabo', '786875', '39578397598', '22.00', '22', 'Bitcoin', 'c74d97b01eae257e44aa9d5bade97baf', '2020-11-19 07:34:30', '2020-11-19 08:00:24'),
(18, '3', '1', 'Delivered', 'Admins', '3', '1', 'fresh tomatoes', 'ok@vb.com', 'nigeria', 'osun', 'osogbo', 'osogbo, orita sabo', '786875', '39578397598', '768.00', '768', 'Bitcoin', 'c74d97b01eae257e44aa9d5bade97baf', '2020-11-19 07:34:30', '2020-11-19 08:01:12'),
(19, '5', '5', 'Pending', NULL, '7', '3', 'green beans', 'farmer@vb.com', 'nigeria', 'osun', 'osogbo', 'orita sabo, osun', '212323', '947874332', '90.00', '270', 'Bitcoin', '6f4922f45568161a8cdf4ad2299f6d23', '2020-11-19 07:54:54', '2020-11-19 07:54:54'),
(20, '5', '1', 'Delivered', 'Admins', '3', '1', 'fresh tomatoes', 'farmer@vb.com', 'nigeria', 'osun', 'osogbo', 'orita sabo, osun', '212323', '947874332', '768.00', '768', 'Bitcoin', '6f4922f45568161a8cdf4ad2299f6d23', '2020-11-19 07:54:54', '2020-11-19 08:00:46'),
(21, '5', '4', 'Pending', NULL, '6', '2', 'carrot', 'farmer@vb.com', 'nigeria', 'osun', 'osogbo', 'orita sabo, osun', '212323', '947874332', '897.00', '1794', 'Bitcoin', '6f4922f45568161a8cdf4ad2299f6d23', '2020-11-19 07:54:55', '2020-11-19 07:54:55'),
(22, '1', '7', 'Pending', NULL, '33', '1', 'Cashew Nut', 'admin@vb.com', 'nigeria', 'oyo', 'iseyin', 'Isalu, Aare Oje compound, iseyin', '444332', '809804', '432.00', '432', 'Bitcoin', '3c59dc048e8850243be8079a5c74d079', '2020-11-21 01:32:48', '2020-11-21 01:32:48'),
(23, '1', '13', 'Pending', NULL, '41', '2', 'group of africa code week 2019', 'admin@vb.com', 'nigeria', 'oyo', 'iseyin', 'Isalu, Aare Oje compound, iseyin', '444332', '809804', '28749.00', '57498', 'Bitcoin', '3c59dc048e8850243be8079a5c74d079', '2020-11-21 01:32:49', '2020-11-21 01:32:49'),
(24, '1', '9', 'Pending', NULL, '29', '1', 'oka the', 'admin@vb.com', 'nigeria', 'oyo', 'iseyin', 'Isalu, Iseyin', '444332', '8098047879', '23.00', '23', 'Paystack', '37693cfc748049e45d87b8c7d8b9aacd', '2021-10-10 05:52:18', '2021-10-10 05:52:18'),
(25, '1', '15', 'Pending', NULL, '43', '1', 'WCN', 'admin@vb.com', 'nigeria', 'oyo', 'iseyin', 'Isalu, Iseyin', '444332', '8098047879', '323.00', '323', 'Paystack', '37693cfc748049e45d87b8c7d8b9aacd', '2021-10-10 05:52:18', '2021-10-10 05:52:18'),
(26, '1', '15', 'Pending', NULL, '43', '1', 'WCN', 'admin@vb.com', 'nigeria', 'oyo', 'iseyin', 'Ogbomoso, Lautech', '444332', '8098047879', '323.00', '323', 'Paystack', '8e296a067a37563370ded05f5a3bf3ec', '2021-11-23 03:47:48', '2021-11-23 03:47:48'),
(27, '1', '6', 'Pending', NULL, '34', '1', 'tanatase', 'admin@vb.com', 'nigeria', 'oyo', 'iseyin', 'Ogbomoso, Lautech', '444332', '8098047879', '323.00', '323', 'Paystack', '8e296a067a37563370ded05f5a3bf3ec', '2021-11-23 03:47:48', '2021-11-23 03:47:48'),
(28, '1', '5', 'Pending', NULL, '7', '1', 'green beans', 'admin@vb.com', 'nigeria', 'oyo', 'iseyin', 'Ogbomoso, Lautech', '444332', '8098047879', '90.00', '90', 'Paystack', '8e296a067a37563370ded05f5a3bf3ec', '2021-11-23 03:47:49', '2021-11-23 03:47:49'),
(29, '1', '4', 'Pending', NULL, '6', '1', 'carrot', 'admin@vb.com', 'nigeria', 'oyo', 'iseyin', 'Ogbomoso, Lautech', '444332', '8098047879', '897.00', '897', 'Paystack', '8e296a067a37563370ded05f5a3bf3ec', '2021-11-23 03:47:49', '2021-11-23 03:47:49'),
(30, '2', '17', 'Pending', NULL, '46', '2', 'HP laptop', 'oka@vb.com', 'nigeria', 'oyo', 'iseyin', 'Isalu iseyin, vboy steet', '200000', '7536253', '150000.00', '300000', 'Bitcoin', '6ea9ab1baa0efb9e19094440c317e21b', '2021-11-27 08:32:11', '2021-11-27 08:32:11'),
(31, '2', '34', 'Pending', NULL, '63', '4', 'crayganeil', 'oka@vb.com', 'nigeria', 'oyo', 'iseyin', 'Isalu iseyin, vboy steet', '200000', '7536253', '1000.00', '4000', 'Bitcoin', '6ea9ab1baa0efb9e19094440c317e21b', '2021-11-27 08:32:11', '2021-11-27 08:32:11');

-- --------------------------------------------------------

--
-- Table structure for table `order_histories`
--

CREATE TABLE `order_histories` (
  `id` int(10) UNSIGNED NOT NULL,
  `history` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `users_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_histories`
--

INSERT INTO `order_histories` (`id`, `history`, `users_id`, `created_at`, `updated_at`) VALUES
(2, 'd41d8cd98f00b204e9800998ecf8427e', '3', '2020-08-22 08:47:19', '2020-08-22 08:47:19'),
(3, 'eccbc87e4b5ce2fe28308fd9f2a7baf3', '3', '2020-08-22 10:10:46', '2020-08-22 10:10:46'),
(4, 'e4da3b7fbbce2345d7772b0674a318d5', '2', '2020-08-26 01:23:18', '2020-08-26 01:23:18'),
(5, 'c9f0f895fb98ab9159f51fd0297e236d', '2', '2020-09-02 01:26:46', '2020-09-02 01:26:46'),
(6, '6512bd43d9caa6e02c990b0a82652dca', '2', '2020-11-19 07:09:42', '2020-11-19 07:09:42'),
(7, 'aab3238922bcc25a6f606eb525ffdc56', '1', '2020-11-19 07:30:54', '2020-11-19 07:30:54'),
(8, 'c74d97b01eae257e44aa9d5bade97baf', '3', '2020-11-19 07:34:30', '2020-11-19 07:34:30'),
(9, '6f4922f45568161a8cdf4ad2299f6d23', '5', '2020-11-19 07:54:55', '2020-11-19 07:54:55'),
(10, '3c59dc048e8850243be8079a5c74d079', '1', '2020-11-21 01:32:49', '2020-11-21 01:32:49'),
(11, '37693cfc748049e45d87b8c7d8b9aacd', '1', '2021-10-10 05:52:18', '2021-10-10 05:52:18'),
(12, '8e296a067a37563370ded05f5a3bf3ec', '1', '2021-11-23 03:47:49', '2021-11-23 03:47:49'),
(13, '6ea9ab1baa0efb9e19094440c317e21b', '2', '2021-11-27 08:32:11', '2021-11-27 08:32:11');

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
-- Table structure for table `pictures`
--

CREATE TABLE `pictures` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pictures`
--

INSERT INTO `pictures` (`id`, `file`, `created_at`, `updated_at`) VALUES
(1, 'login.png', '2020-08-20 16:31:21', '2020-08-20 16:31:21'),
(2, '1597916009b.jpg', '2020-08-20 16:33:29', '2020-08-20 16:33:29'),
(35, '16057741648AA53D0B-B9E5-471E-962C-055CBDF558D6.jpeg', '2020-11-19 07:22:44', '2020-11-19 07:22:44'),
(37, '16057760057C2E0356-A7EF-4ECB-BC74-39D21BB615FA.jpeg', '2020-11-19 07:53:25', '2020-11-19 07:53:25'),
(39, '1605776790IMG_20191023_075809_0.jpg', '2020-11-19 08:06:30', '2020-11-19 08:06:30'),
(40, '1605776818DSCN0170_-_Copy.JPG', '2020-11-19 08:06:58', '2020-11-19 08:06:58'),
(44, '1637667135_First Practice.jpg', '2021-11-23 10:32:15', '2021-11-23 10:32:15'),
(45, '1637770267top2.png', '2021-11-24 15:11:07', '2021-11-24 15:11:07'),
(46, '16377763932.jpg', '2021-11-24 16:53:13', '2021-11-24 16:53:13'),
(47, '16377765411.jpg', '2021-11-24 16:55:41', '2021-11-24 16:55:41'),
(48, '16377766523.jpg', '2021-11-24 16:57:32', '2021-11-24 16:57:32'),
(49, '16377767157.jpg', '2021-11-24 16:58:35', '2021-11-24 16:58:35'),
(50, '1637777065img6.jpg', '2021-11-24 17:04:25', '2021-11-24 17:04:25'),
(51, '1637777188img7.jpg', '2021-11-24 17:06:28', '2021-11-24 17:06:28'),
(52, '1637777257img8.jpg', '2021-11-24 17:07:37', '2021-11-24 17:07:37'),
(53, '1637777372download.jpeg', '2021-11-24 17:09:32', '2021-11-24 17:09:32'),
(54, '1637777444download.jpeg', '2021-11-24 17:10:44', '2021-11-24 17:10:44'),
(55, '1637777523download.jpeg', '2021-11-24 17:12:03', '2021-11-24 17:12:03'),
(56, '1637777626download.jpeg', '2021-11-24 17:13:46', '2021-11-24 17:13:46'),
(57, '1637777746download.jpeg', '2021-11-24 17:15:46', '2021-11-24 17:15:46'),
(58, '1637777967download.jpeg', '2021-11-24 17:19:27', '2021-11-24 17:19:27'),
(59, '1637778034download.jpeg', '2021-11-24 17:20:34', '2021-11-24 17:20:34'),
(62, '1637778357download.jpeg', '2021-11-24 17:25:57', '2021-11-24 17:25:57'),
(63, '1637780722images.jpeg', '2021-11-24 18:05:22', '2021-11-24 18:05:22'),
(64, '1639725389', '2021-12-17 06:16:29', '2021-12-17 06:16:29'),
(65, '1639725882', '2021-12-17 06:24:42', '2021-12-17 06:24:42');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `picture_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `newprice` decimal(10,2) NOT NULL,
  `oldprice` decimal(10,2) NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'city not available',
  `region` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'region not available',
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'country not available',
  `updated_user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_ipaddress` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'not available',
  `user_browser` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `picture_id`, `slug`, `product_name`, `newprice`, `oldprice`, `quantity`, `category_id`, `user_id`, `location`, `city`, `region`, `country`, `updated_user`, `user_ipaddress`, `user_location`, `user_browser`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(16, '45', 'Long sleve top-5-N2100-Ogbomoso-884529', 'Long sleve top', '2100.00', '2000.00', '4', '5', '1', 'Ogbomoso', 'city not available', 'region not available', 'country not available', NULL, '127.0.0.1', 'not available', 'Mozilla/5.0 (X11; Linux x86_64; rv:78.0) Gecko/20100101 Firefox/78.0', 'This is here', NULL, '2021-11-24 15:11:07', '2021-11-24 15:11:07'),
(17, '46', 'HP laptop-8-N150000-Iseyin-310059', 'HP laptop', '150000.00', '120000.00', '4', '8', '1', 'Iseyin', 'city not available', 'region not available', 'country not available', NULL, '192.168.217.223', 'not available', 'Mozilla/5.0 (Linux; Android 11; SM-A022F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Mobile Safari/537.36', 'HP laptop for students', NULL, '2021-11-24 16:53:13', '2021-11-24 16:53:13'),
(18, '47', 'Iphone 11 promax-8-N500000-Ogbomoso-922930', 'Iphone 11 promax', '500000.00', '450000.00', '57', '8', '1', 'Ogbomoso', 'city not available', 'region not available', 'country not available', NULL, '192.168.217.223', 'not available', 'Mozilla/5.0 (Linux; Android 11; SM-A022F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Mobile Safari/537.36', 'Best quality for customers', NULL, '2021-11-24 16:55:42', '2021-11-24 16:55:42'),
(19, '48', 'Tecno camon 13-8-N75000-Imo-469440', 'Tecno camon 13', '75000.00', '70000.00', '7', '8', '1', 'Imo', 'city not available', 'region not available', 'country not available', NULL, '192.168.217.223', 'not available', 'Mozilla/5.0 (Linux; Android 11; SM-A022F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Mobile Safari/537.36', 'Best quality', NULL, '2021-11-24 16:57:32', '2021-11-24 16:57:32'),
(20, '49', 'Mp Bass-8-N30000-Oyo-408312', 'Mp Bass', '30000.00', '25000.00', '78', '8', '1', 'Oyo', 'city not available', 'region not available', 'country not available', NULL, '192.168.217.223', 'not available', 'Mozilla/5.0 (Linux; Android 11; SM-A022F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Mobile Safari/537.36', 'Best quality', NULL, '2021-11-24 16:58:35', '2021-11-24 16:58:35'),
(21, '50', 'Samsong-8-N50000-Ogun-741981', 'Samsong', '50000.00', '46000.00', '7', '8', '1', 'Ogun', 'city not available', 'region not available', 'country not available', NULL, '192.168.217.223', 'not available', 'Mozilla/5.0 (Linux; Android 11; SM-A022F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Mobile Safari/537.36', 'Best regards', NULL, '2021-11-24 17:04:25', '2021-11-24 17:04:25'),
(22, '51', 'Infinix x-8-N75000-Ibadan-028766', 'Infinix x', '75000.00', '66000.00', '8', '8', '1', 'Ibadan', 'city not available', 'region not available', 'country not available', NULL, '192.168.217.223', 'not available', 'Mozilla/5.0 (Linux; Android 11; SM-A022F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Mobile Safari/537.36', 'Best regards', NULL, '2021-11-24 17:06:28', '2021-11-24 17:06:28'),
(23, '52', 'Samsong-8-N52000-Osun-634200', 'Samsong', '52000.00', '45000.00', '85', '8', '1', 'Osun', 'city not available', 'region not available', 'country not available', NULL, '192.168.217.223', 'not available', 'Mozilla/5.0 (Linux; Android 11; SM-A022F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Mobile Safari/537.36', 'Best regards', NULL, '2021-11-24 17:07:37', '2021-11-24 17:07:37'),
(24, '53', 'Palm oil-7-N6500-Iseyin-836373', 'Palm oil', '6500.00', '5000.00', '1858', '7', '1', 'Iseyin', 'city not available', 'region not available', 'country not available', NULL, '192.168.217.223', 'not available', 'Mozilla/5.0 (Linux; Android 11; SM-A022F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Mobile Safari/537.36', 'Best regards', NULL, '2021-11-24 17:09:32', '2021-11-24 17:09:32'),
(25, '54', 'Spaghetti-7-N300-Ibadan-385559', 'Spaghetti', '300.00', '250.00', '757894', '7', '1', 'Ibadan', 'city not available', 'region not available', 'country not available', NULL, '192.168.217.223', 'not available', 'Mozilla/5.0 (Linux; Android 11; SM-A022F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Mobile Safari/537.36', 'Best regards', NULL, '2021-11-24 17:10:44', '2021-11-24 17:10:44'),
(26, '55', 'Maize corn-7-N3000-Imo-598227', 'Maize corn', '3000.00', '3688.00', '646', '7', '1', 'Imo', 'city not available', 'region not available', 'country not available', NULL, '192.168.217.223', 'not available', 'Mozilla/5.0 (Linux; Android 11; SM-A022F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Mobile Safari/537.36', 'Best regards', NULL, '2021-11-24 17:12:03', '2021-11-24 17:12:03'),
(27, '56', 'Refill powder beverage-7-N1000-Ibadan-275819', 'Refill powder beverage', '1000.00', '1200.00', '466', '7', '1', 'Ibadan', 'city not available', 'region not available', 'country not available', NULL, '192.168.217.223', 'not available', 'Mozilla/5.0 (Linux; Android 11; SM-A022F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Mobile Safari/537.36', 'Best regards', NULL, '2021-11-24 17:13:46', '2021-11-24 17:13:46'),
(28, '57', 'Yam-7-N3000-Saki-077172', 'Yam', '3000.00', '2500.00', '4636368', '7', '1', 'Saki', 'city not available', 'region not available', 'country not available', NULL, '192.168.217.223', 'not available', 'Mozilla/5.0 (Linux; Android 11; SM-A022F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Mobile Safari/537.36', 'Best regards', NULL, '2021-11-24 17:15:47', '2021-11-24 17:15:47'),
(29, '58', 'Semovita-7-N700-Oyo-161053', 'Semovita', '700.00', '500.00', '5675', '7', '2', 'Oyo', 'city not available', 'region not available', 'country not available', NULL, '192.168.217.223', 'not available', 'Mozilla/5.0 (Linux; Android 11; SM-A022F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Mobile Safari/537.36', 'Best regards', NULL, '2021-11-24 17:19:27', '2021-11-24 17:19:27'),
(30, '59', 'Mama gold rice-7-N30000-Iseyin-912476', 'Mama gold rice', '30000.00', '25000.00', '46', '7', '2', 'Iseyin', 'city not available', 'region not available', 'country not available', NULL, '192.168.217.223', 'not available', 'Mozilla/5.0 (Linux; Android 11; SM-A022F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Mobile Safari/537.36', 'Best regards', NULL, '2021-11-24 17:20:35', '2021-11-24 17:20:35'),
(33, '62', 'Yam flour-7-N700-Osun-010889', 'Yam flour', '700.00', '500.00', '56', '7', '2', 'Osun', 'city not available', 'region not available', 'country not available', NULL, '192.168.217.223', 'not available', 'Mozilla/5.0 (Linux; Android 11; SM-A022F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Mobile Safari/537.36', 'Best regards', NULL, '2021-11-24 17:25:57', '2021-11-24 17:25:57'),
(34, '63', 'crayganeil-7-N1000-oyo-670768', 'crayganeil', '1000.00', '700.00', '87', '7', '1', 'oyo', 'city not available', 'region not available', 'country not available', NULL, '::1', 'not available', 'Mozilla/5.0 (X11; Linux x86_64; rv:78.0) Gecko/20100101 Firefox/78.0', 'Best regard', NULL, '2021-11-24 18:05:22', '2021-11-24 18:05:22'),
(35, '64', 'Android Phone-8-N456-Oyo-174041', 'Android Phone', '456.00', '234.00', '67', '8', '1', 'Oyo', 'city not available', 'region not available', 'country not available', NULL, '127.0.0.1', 'not available', 'Mozilla/5.0 (X11; Linux x86_64; rv:78.0) Gecko/20100101 Firefox/78.0', 'jkfjsdhfdsj hfsj hfjsdhfjsdhfjhsdh fsdjhfkh hsdh fkhjksjkhjshlariuwiurowiquq', NULL, '2021-12-17 06:16:29', '2021-12-17 06:16:29'),
(36, '65', 'Android Phone 2-8-N2100-Ogbomoso-212311', 'Android Phone 2', '2100.00', '2000.00', '40', '8', '2', 'Ogbomoso', 'city not available', 'region not available', 'country not available', NULL, '127.0.0.1', 'not available', 'Mozilla/5.0 (X11; Linux x86_64; rv:78.0) Gecko/20100101 Firefox/78.0', 'akldsk akj dkas jdklasjdklasjdkas jdlasj dksj dklasjkdsaiuioaudioasudioas', NULL, '2021-12-17 06:24:42', '2021-12-17 06:24:42');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `supportemail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picture_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aboutshop` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `who-we-are` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `supportemail`, `phone`, `picture_id`, `shipping`, `facebook`, `twitter`, `instagram`, `linkedin`, `company`, `address`, `about`, `policy`, `aboutshop`, `who-we-are`, `created_at`, `updated_at`) VALUES
(1, 'okediyakenny@gmail.com', '08141239778', '44', 'Free Shipping for All Products', 'https://facebook.com/oluokunkabir.adeshina/', 'https://twitter.com/DevOluokunKabir', 'https://instagram.com', 'https://www.linkedin.com/in/oluokun-kabir-adesina-58125b163', 'OKEDIYA KEHINDE REBECCA', 'No 5, Oja Agbe Street', 'Isalu Iseyin', NULL, NULL, NULL, NULL, '2021-11-23 10:32:15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picture_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zipcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('user','admin','marketer') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `status` enum('free','paid') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'free',
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `picture_id`, `address`, `city`, `state`, `country`, `zipcode`, `role`, `status`, `provider`, `provider_id`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admins', 'admin@vb.com', '8098047879', '2', NULL, 'iseyin', 'oyo', 'nigeria', '444332', 'admin', 'free', 'Soupe Register', '$2y$10$CzteJ3w8z.T2ua4msbedO.FwCI2.1kR5X6cqXojgg2Gk6rWxo8wOG', '$2y$10$/zhOjnQDutXak46fqu/BmuypsKXqrKRCeSkTn8UOrckltkmFpc46.', 'Xe8ksWk5R4C9Y052YF7KnlNzhFGZNtH7RecW76Xwa5SqSqQR726gzLpgoH3U', '2020-08-20 16:31:22', '2021-10-10 03:02:11'),
(2, 'Oluokun Kabiru', 'oka@vb.com', '7536253', '35', 'Isalu iseyin', 'iseyin', 'oyo', 'nigeria', NULL, 'marketer', 'paid', 'Soupe Register', '$2y$10$IpszvbVlUah8E4.wBHHqreFd9CgRT4qHDPGtictyU5ZZQYI.dlhgG', '$2y$10$UMcv3b3Ab4kw3fPCN8FdBuikYzrkdYjRl9glP/bdWDv4roz7WxAjW', 'uNsslvJU4nm5MXB41wtZY0YoqSrhWbM6IBfiIF26v0SsZY1AojsBtZtdsw3w', '2020-08-20 16:54:12', '2020-11-19 07:22:44'),
(3, 'Oluokun Kabirus', 'ok@vb.com', NULL, '1', '', '', '', '', NULL, 'user', 'free', 'Soupe Register', '$2y$10$i/i4Roumns1eJgF3I03UdeMnFpbuHPqzldGpTtyUoiqTwLBSCIFw.', '$2y$10$Sl8pjtZpSElQF3SxAOyy6uqr7DAS3FT4xbzG4wWcbwFY1S4MudOeG', 'AEFDl344TJKQUMHgYonZ1z3zOmdu7ZQGLGOHuSK0jVtEWzlsFmSYxe8IjQIv', '2020-08-20 17:03:24', '2020-08-20 17:03:24'),
(4, 'Oluokun Kabiru', 'vb@vb.vb', '897589785', '1', '', '', '', '', NULL, 'user', 'free', 'Soupe Register', '$2y$10$9pd6laxc1AUHmrjfbICJ1eqUxOSNXpO9E5kG8M35wP1B/apNBI4Zi', '$2y$10$zOLY8F7qNIpO/eTM55.oue5plUnQGBvwdGuxVr9W/6OTXSXdz3UFS', '7bmP83TexCrTX3OOgHKZcdcTIp26e0jCD7OEJ95UkGQAbOZDrw201TAgXXKH', '2020-10-09 09:29:03', '2020-10-09 09:29:03'),
(5, 'Oluokun Kabiru The Farmer', 'farmer@vb.com', '947874332', '37', 'orita sabo', 'osogbo', 'osun', 'nigeria', NULL, 'marketer', 'paid', 'Soupe Register', '$2y$10$KHXRXtIlLjF415aVZq7I6OJgglavqErx9Q.f.o5Iu/V4OKADecS0K', '$2y$10$cSUllHGPfQmmYLefhu6mDuvLYSjPTml7X3F//Z2qJcbUX0nwOeQhu', 'hTqMzE4YuzVgo5EGB9MpgVyaFp0wAHu9y58ZhsxQqLowisOloz7bLw756HCu', '2020-11-19 07:52:03', '2020-11-19 08:04:06'),
(6, 'Oka The Village Boy', 'vb@vb.v', '45353535', '1', 'orita sabo', NULL, NULL, NULL, NULL, 'user', 'free', 'Soupe Register', '$2y$10$PtlG6rAHzgdJyr32x2fc4OgocbtKhtHJTgvc0yPNfajNj621.WSt2', '$2y$10$gCWhvoM/OagHOjHNDIx86OpUl56B7RTsFoU8PozDnrLXbx0H5j35e', NULL, '2020-11-19 09:39:41', '2020-11-19 09:40:23'),
(7, 'Village Boy Adesina', 'admin1@vb.com', '4535453543', '1', 'Jkhjhjk Hjkhjkhjkh', 'Iseyin', 'OYO', 'Nigera', '767556', 'user', 'free', 'Soupe Register', '$2y$10$ObBglDfuaQv6m8UKPailFe5zwTM1Pg1RTIDQFy3u4vW6xER/xo97.', '$2y$10$pQpqccTcf5u0pi7pthq9OO2SaCBfK3TqIaYdpg7gdwR7FVMKmzHUC', NULL, '2021-09-30 10:14:00', '2021-09-30 10:14:00'),
(8, 'KENNY', 'kenny@gmail.com', '0814239778', '1', 'Lawyer Hammed street. stadium road', 'Ogbomoso', 'Oyo state', 'Nigeria', '123456', 'admin', 'free', 'Soupe Register', '619cca92046b0', '$2y$10$FrZ8EQc9p3OaHJjL1Ts4Pes1aCtkraUXB3WREGVg71rDhMVMcfOu2', 'aBb2nTyf7ortqnWAR8A4BWh1iUhqNDjggYtKiud1dOkeWXLigADfrpMoUSSk', '2021-11-23 10:03:46', '2021-11-23 10:26:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_category_unique` (`category`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderd_prodcts`
--
ALTER TABLE `orderd_prodcts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_histories`
--
ALTER TABLE `order_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
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
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orderd_prodcts`
--
ALTER TABLE `orderd_prodcts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `order_histories`
--
ALTER TABLE `order_histories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pictures`
--
ALTER TABLE `pictures`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
