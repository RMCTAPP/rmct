-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 01, 2023 at 03:07 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom-pc-store`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrators`
--

CREATE TABLE `administrators` (
  `id` int NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `last_login` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrators`
--

INSERT INTO `administrators` (`id`, `username`, `password`, `name`, `status`, `last_login`) VALUES
(1, 'admin', 'f5bb0c8de146c67b44babbf4e6584cc0', 'Juan Dela Cruz', 1, '2022-09-29 02:37:06');

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `id` int NOT NULL,
  `customer_id` int NOT NULL,
  `product_item_id` int NOT NULL,
  `quantity` int NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart_items`
--

INSERT INTO `cart_items` (`id`, `customer_id`, `product_item_id`, `quantity`, `price`) VALUES
(5, 22, 2, 10, '120.50'),
(6, 22, 1, 5, '100.30'),
(30, 10, 2, 1, '120.50'),
(31, 10, 3, 1, '150.00'),
(48, 3, 11, 3, '122.00'),
(54, 2, 1, 18, '0.00'),
(55, 2, 7, 5, '0.00'),
(56, 2, 3, 1, '150.00'),
(57, 2, 12, 2, '122.00'),
(58, 2, 11, 2, '122.00');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int NOT NULL,
  `app_token` varchar(100) NOT NULL,
  `name` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `contact_no` varchar(13) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `address` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `verified_at` timestamp NULL DEFAULT NULL,
  `verification_key` varchar(255) DEFAULT NULL,
  `password_reset_key` varchar(255) DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `app_token`, `name`, `contact_no`, `email`, `password`, `address`, `verified_at`, `verification_key`, `password_reset_key`, `last_login`, `status`) VALUES
(1, '3b40e9robvj3-jte-t4ererhpo', 'Juan', '9696547852', NULL, 'f5bb0c8de146c67b44babbf4e6584cc0', NULL, NULL, NULL, NULL, NULL, 1),
(2, '3b40e9robvj3-et4mr9pobk-t4erpo', 'Louis Oneil', '09654345424', 'test@gmail.com', 'f5bb0c8de146c67b44babbf4e6584cc0', 'Quasi ea iste dolore', NULL, NULL, NULL, NULL, 1),
(3, '3berge5-et4mr9pobk-t4erpo', 'Juan', '9476759738', 'tolentinogerone1@gmail.com', 'f5bb0c8de146c67b44babbf4e6584cc0', NULL, NULL, NULL, NULL, NULL, 1),
(34, '9e3057ec228f7d0095118c80ca69da7820dc5ce862b6f79b9186d842d572f51b', 'Lysandra Chang', '09344489383', 'xyxyr@mailinator.com', '548f5bb049ccafcd1ffa09a6f0736aca', 'Sed ea non laudantiu', NULL, NULL, NULL, NULL, 1),
(35, '4b4e8203642380bd71251983aee723e65a5f0fd34e654a868da4467badf81da6', 'Nathan Cross', '09344989383', 'lohiba@mailinator.com', '46a2768e12aafdf3e0c08b2871d61fac', 'Nostrum magni dolor ', NULL, NULL, NULL, NULL, 1),
(36, 'fe66cb94f67acc025e326a2024abcac74cb8f7d7f05fb73eb3dfd84f9b6ad76a', 'Kay Wright', '09344289383', 'hycysobaly@mailinator.com', '9217cceb25b875a78871e51b3a8aa676', 'Neque sit repellend', NULL, NULL, NULL, NULL, 1),
(37, '9ed082b16a34768c7fd6583a0ca3837ca9895a38b090802ee2ad7879b73ec85e', 'Diana Vazquez', '09343939383', 'gotixy@mailinator.com', '33a4e5c0424c5166c2fa46cbc46c023d', 'Do soluta dolor adip', NULL, NULL, NULL, NULL, 1),
(38, '98cf4191ea6ae49658788c7832667b2f6d0b7923fd047449dde30aed3304b79c', 'Alden Griffith', '09456464653', 'sefe@ligibahyhomailinator.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'Consequuntur in ut i', NULL, NULL, NULL, NULL, 1),
(39, '84d0c4d9510c0f0d45a4fc1e415b6984736ed38ef30d638a61be241c560a82ab', 'Steel Travis', '09341189383', 'zofagy@mailinator.com', '13b1688b9919b0f231d7f2e3860d4ed7', 'Voluptatem At ipsum', NULL, NULL, NULL, NULL, 1),
(40, 'fef03093d2bdfd1e40cc010ef9ba6e81b9e066bc9e4c9409de5459e4b74cb473', 'Roary Morris', '09343938983', 'dohec@mailinator.com', '49de9ee0de581c818f481d7d70373d59', 'Dolor aliqua Ipsum ', NULL, NULL, NULL, NULL, 1),
(41, '571752a04ccc095e6a509a602f618666f26ae431fd97be0b44b2f8998097a66c', 'Cairo Miller', '09348989383', 'mikonyve@mailinator.com', 'b95839fddcf15bdf923752c5e4ba6939', 'In et labore in ulla', NULL, NULL, NULL, NULL, 1),
(42, '564f583fc31c6a98fe1da7e2faa59b1ca2aa608cedb4ff5cd512703036dfab47', 'Zelda Oneil', '09786555463', 'weewt@lobufynmailinator.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'Facere tempora accus', NULL, NULL, NULL, NULL, 1),
(43, 'c047d9e21a16f2f486b7dbc9eb23e7df030f3d081f228d79c37945db68891bc8', 'Deirdre Decker', '09361489383', 'hevaqopi@mailinator.com', 'f13847ffd9ddcf99261bbabb8628dbd6', 'Distinctio Assumend', NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ecom_settings`
--

CREATE TABLE `ecom_settings` (
  `id` int NOT NULL,
  `meta_field` mediumtext NOT NULL,
  `meta_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ecom_settings`
--

INSERT INTO `ecom_settings` (`id`, `meta_field`, `meta_value`) VALUES
(4, 'paypal-client-id', 'Aflhit3w4clhRG5V8PVgXD6em-4FfL76_XIdAJE3XtBRd9QUYMCtwQabQlLEMA7EKM67DC6ysVxuzlQa'),
(5, 'gcash-key', '');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_histories`
--

CREATE TABLE `inventory_histories` (
  `id` int NOT NULL,
  `product_item_id` int NOT NULL,
  `old_quantity` int NOT NULL,
  `new_quantity` int NOT NULL,
  `description` varchar(100) NOT NULL,
  `inventory_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory_histories`
--

INSERT INTO `inventory_histories` (`id`, `product_item_id`, `old_quantity`, `new_quantity`, `description`, `inventory_date`) VALUES
(1, 12, 0, 35, 'PRODUCT CREATED', '2023-04-26 18:32:42'),
(2, 8, 10, 3, 'PRODUCT UPDATED', '2023-04-26 18:37:48'),
(3, 8, 3, 30, 'PRODUCT UPDATED', '2023-04-26 18:38:03'),
(4, 6, 100, 102, 'PRODUCT STOCK UPDATED', '2023-04-26 18:39:29'),
(5, 1, 100, 98, 'ORDER PURCHASE [ORDER ID: 230428D5EF01D2]', '2023-04-27 17:14:14'),
(6, 12, 35, 34, 'ORDER PURCHASE [ORDER ID: 230428D5EF01D2]', '2023-04-27 17:14:14'),
(7, 2, 50, 49, 'ORDER PURCHASE [ORDER ID: 230428D72EF7FB]', '2023-04-27 17:15:26'),
(8, 9, 100, 98, 'ORDER PURCHASE [ORDER ID: 230428E29B0E9F]', '2023-04-27 17:18:32'),
(9, 2, 49, 47, 'ORDER PURCHASE [ORDER ID: 230428E29B0E9F]', '2023-04-27 17:18:32'),
(10, 2, 47, 46, 'ORDER PURCHASE [ORDER ID: 230428E7B41FC8]', '2023-04-27 17:18:59');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `order_reference` varchar(20) NOT NULL,
  `customer_id` int NOT NULL,
  `delivery_address` mediumtext,
  `delivery_fee` decimal(10,2) DEFAULT NULL,
  `discount_coupon` varchar(10) DEFAULT NULL,
  `discount_value` decimal(10,2) DEFAULT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `payment_method` varchar(20) NOT NULL,
  `payment_captured_data` mediumtext,
  `is_paid` tinyint(1) NOT NULL,
  `is_delivered` tinyint(1) NOT NULL,
  `order_type` enum('pickup','deliver') NOT NULL,
  `order_status` enum('pending','completed','cancelled','packed','ready for delivery/pickup') NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_reference`, `customer_id`, `delivery_address`, `delivery_fee`, `discount_coupon`, `discount_value`, `total_amount`, `payment_method`, `payment_captured_data`, `is_paid`, `is_delivered`, `order_type`, `order_status`, `order_date`) VALUES
(1, '202210151665813375', 2, ',  , ', '0.00', '0', '0.00', '3077.00', 'COD', NULL, 1, 1, 'deliver', 'cancelled', '2022-10-15 05:56:39'),
(2, '202210151665813375', 2, ',  , ', '0.00', '0', '0.00', '3077.00', 'COD', NULL, 1, 0, 'deliver', 'packed', '2022-10-15 05:57:18'),
(3, '202210151665813441', 2, ',  , ', '0.00', '0', '0.00', '3077.00', 'COD', NULL, 1, 0, 'deliver', 'ready for delivery/pickup', '2022-10-15 05:57:24'),
(4, '202210151665813441', 2, ',  , ', '0.00', '0', '0.00', '3077.00', 'COD', NULL, 1, 0, 'deliver', 'completed', '2022-10-15 05:57:47'),
(5, '2202210151665813511', 2, ',  , ', '0.00', '0', '0.00', '341.40', 'COD', NULL, 1, 0, 'deliver', 'packed', '2022-10-15 05:58:38'),
(6, '2202210151665813543', 2, ',  , ', '0.00', '0', '0.00', '441.80', 'COD', NULL, 1, 0, 'deliver', 'packed', '2022-10-15 05:59:08'),
(7, '2202210151665813648', 2, ',  , ', '0.00', '0', '0.00', '150.00', 'COD', NULL, 1, 0, 'deliver', 'completed', '2022-10-15 06:00:59'),
(8, '2202210151665813669', 2, ',  , ', '0.00', '0', '0.00', '962.70', 'COD', NULL, 1, 0, 'deliver', 'completed', '2022-10-15 06:01:12'),
(9, '2202210151665813986', 2, ',  , ', '0.00', '0', '0.00', '401.60', 'COD', NULL, 1, 0, 'deliver', 'completed', '2022-10-15 06:06:34'),
(10, '2202210151665814675', 2, 'w, fwf feewfw, ew', '0.00', '0', '0.00', '502.00', 'COD', NULL, 1, 0, 'deliver', 'completed', '2022-10-15 06:19:51'),
(11, '2202210151665815003', 2, 's, svsv dsvsvd, sdv', '0.00', '0', '0.00', '602.40', 'COD', NULL, 0, 0, 'deliver', 'pending', '2022-10-15 06:24:47'),
(12, '2202210151665815137', 2, 'svs, vsv vsv, sdvs', '0.00', '0', '0.00', '702.80', 'COD', NULL, 0, 0, 'deliver', 'pending', '2022-10-15 06:25:46'),
(13, '2202210151665815162', 2, 'fs, sfs sf, sdf', '0.00', '0', '0.00', '482.00', 'COD', NULL, 0, 0, 'deliver', 'pending', '2022-10-15 06:26:09'),
(14, '2202210151665815262', 2, 'fsfds, fsfs sfs, efdsdf', '0.00', '0', '0.00', '450.00', 'COD', NULL, 0, 0, 'deliver', 'pending', '2022-10-15 06:27:51'),
(15, '2202210151665815351', 2, 'd r , rvrv rcr, ffcf', '0.00', '0', '0.00', '943.90', 'COD', NULL, 0, 0, 'deliver', 'cancelled', '2022-10-15 06:29:23'),
(17, '28306886661668570853', 2, 'svs, vsvsv svds, vsdv', '0.00', '0', '0.00', '100.40', 'COD', NULL, 0, 0, 'deliver', 'cancelled', '2022-11-16 03:54:18'),
(18, '28306886661668570853', 2, 'svs, vsvsv svds, vsdv', '0.00', '0', '0.00', '100.40', 'COD', NULL, 0, 0, 'deliver', 'cancelled', '2022-11-16 03:54:26'),
(19, '28306886661668570853', 2, 'svs, vsvsv svds, vsdv', '0.00', '0', '0.00', '100.40', 'COD', NULL, 0, 0, 'deliver', 'cancelled', '2022-11-16 03:59:26'),
(20, '28306886661668570853', 2, 'svs, vsvsv svds, vsdv', '0.00', '0', '0.00', '100.40', 'COD', NULL, 0, 0, 'deliver', 'cancelled', '2022-11-16 03:59:42'),
(21, '22590732111668576161', 2, 'e, geg egege, geg', '0.00', '0', '0.00', '320.00', 'COD', NULL, 0, 0, 'deliver', 'packed', '2022-11-16 05:23:12'),
(22, '230428D5EF01D2', 2, 'Quasi ea iste dolore', NULL, NULL, NULL, '362.00', 'COD', 'null', 0, 0, 'deliver', 'pending', '2023-04-27 17:14:14'),
(23, '230428D72EF7FB', 2, 'Quasi ea iste dolore', NULL, NULL, NULL, '120.50', 'PAYPAL', '{\"id\":\"7HH64292F7708363A\",\"intent\":\"CAPTURE\",\"status\":\"COMPLETED\",\"purchase_units\":[{\"reference_id\":\"default\",\"amount\":{\"currency_code\":\"PHP\",\"value\":\"120.50\"},\"payee\":{\"email_address\":\"sb-jydye25808708@business.example.com\",\"merchant_id\":\"88YFLFLSTQTDG\"},\"description\":\"RMCT ECOM CHECKOUT: 230428D72EF7FB\",\"soft_descriptor\":\"PAYPAL *TEST STORE\",\"shipping\":{\"name\":{\"full_name\":\"r drtdrt\"},\"address\":{\"address_line_1\":\"Urdaneta Junction - Dagupan Road\",\"admin_area_2\":\"Santa Barbara\",\"admin_area_1\":\"PANGASINAN\",\"country_code\":\"PH\"}},\"payments\":{\"captures\":[{\"id\":\"67U8508853661803G\",\"status\":\"COMPLETED\",\"amount\":{\"currency_code\":\"PHP\",\"value\":\"120.50\"},\"final_capture\":true,\"seller_protection\":{\"status\":\"ELIGIBLE\",\"dispute_categories\":[\"ITEM_NOT_RECEIVED\",\"UNAUTHORIZED_TRANSACTION\"]},\"create_time\":\"2023-04-27T17:15:27Z\",\"update_time\":\"2023-04-27T17:15:27Z\"}]}}],\"payer\":{\"name\":{\"given_name\":\"r\",\"surname\":\"drtdrt\"},\"email_address\":\"teste@dti.com\",\"payer_id\":\"YYZAVNH8JTPYY\",\"address\":{\"country_code\":\"PH\"}},\"create_time\":\"2023-04-27T17:14:34Z\",\"update_time\":\"2023-04-27T17:15:27Z\",\"links\":[{\"href\":\"https://api.sandbox.paypal.com/v2/checkout/orders/7HH64292F7708363A\",\"rel\":\"self\",\"method\":\"GET\"}]}', 0, 0, 'deliver', 'pending', '2023-04-27 17:15:26'),
(24, '230428E29B0E9F', 2, 'Quasi ea iste dolore', NULL, NULL, NULL, '241.00', 'PAYPAL', '{\"id\":\"50V218714C9926908\",\"intent\":\"CAPTURE\",\"status\":\"COMPLETED\",\"purchase_units\":[{\"reference_id\":\"default\",\"amount\":{\"currency_code\":\"PHP\",\"value\":\"241.00\"},\"payee\":{\"email_address\":\"sb-jydye25808708@business.example.com\",\"merchant_id\":\"88YFLFLSTQTDG\"},\"description\":\"RMCT ECOM CHECKOUT: 230428E29B0E9F\",\"soft_descriptor\":\"PAYPAL *TEST STORE\",\"shipping\":{\"name\":{\"full_name\":\"test s\"},\"address\":{\"address_line_1\":\"Urdaneta Junction - Dagupan Road\",\"admin_area_2\":\"Santa Barbara\",\"admin_area_1\":\"PANGASINAN\",\"country_code\":\"PH\"}},\"payments\":{\"captures\":[{\"id\":\"0F0274533W064533J\",\"status\":\"COMPLETED\",\"amount\":{\"currency_code\":\"PHP\",\"value\":\"241.00\"},\"final_capture\":true,\"seller_protection\":{\"status\":\"ELIGIBLE\",\"dispute_categories\":[\"ITEM_NOT_RECEIVED\",\"UNAUTHORIZED_TRANSACTION\"]},\"create_time\":\"2023-04-27T17:18:33Z\",\"update_time\":\"2023-04-27T17:18:33Z\"}]}}],\"payer\":{\"name\":{\"given_name\":\"test\",\"surname\":\"s\"},\"email_address\":\"pcstore.uep@gmail.com\",\"payer_id\":\"YYZAVNH8JTPYY\",\"address\":{\"country_code\":\"PH\"}},\"create_time\":\"2023-04-27T17:17:37Z\",\"update_time\":\"2023-04-27T17:18:33Z\",\"links\":[{\"href\":\"https://api.sandbox.paypal.com/v2/checkout/orders/50V218714C9926908\",\"rel\":\"self\",\"method\":\"GET\"}]}', 1, 0, 'deliver', 'pending', '2023-04-27 17:18:32'),
(25, '230428E7B41FC8', 2, 'Quasi ea iste dolore', NULL, NULL, NULL, '120.50', 'COP', 'null', 0, 0, 'pickup', 'pending', '2023-04-27 17:18:59');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int NOT NULL,
  `order_id` int NOT NULL,
  `product_item_id` int NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int NOT NULL,
  `sub_total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_item_id`, `price`, `quantity`, `sub_total`) VALUES
(1, 1, 3, '9.00', 150, '1350.00'),
(2, 2, 3, '9.00', 150, '1350.00'),
(3, 3, 3, '9.00', 150, '1350.00'),
(4, 4, 3, '9.00', 150, '1350.00'),
(5, 4, 2, '6.00', 121, '723.00'),
(6, 4, 1, '10.00', 100, '1004.00'),
(7, 5, 1, '1.00', 100, '100.40'),
(8, 5, 2, '2.00', 121, '241.00'),
(9, 6, 1, '2.00', 100, '200.80'),
(10, 6, 2, '2.00', 121, '241.00'),
(11, 7, 3, '1.00', 150, '150.00'),
(12, 8, 1, '3.00', 100, '301.20'),
(13, 8, 2, '3.00', 121, '361.50'),
(14, 8, 3, '2.00', 150, '300.00'),
(15, 9, 1, '4.00', 100, '401.60'),
(16, 10, 1, '5.00', 100, '502.00'),
(17, 11, 1, '6.00', 100, '602.40'),
(18, 12, 1, '7.00', 100, '702.80'),
(19, 13, 2, '4.00', 121, '482.00'),
(20, 14, 3, '3.00', 150, '450.00'),
(21, 15, 1, '1.00', 100, '100.40'),
(22, 15, 2, '7.00', 121, '843.50'),
(24, 20, 1, '100.40', 1, '100.40'),
(25, 21, 1, '80.00', 1, '80.00'),
(26, 21, 1, '120.00', 2, '240.00'),
(27, 22, 1, '120.00', 2, '240.00'),
(28, 22, 12, '122.00', 1, '122.00'),
(29, 23, 2, '120.50', 1, '120.50'),
(30, 24, 9, '0.00', 2, '0.00'),
(31, 24, 2, '120.50', 2, '241.00'),
(32, 25, 2, '120.50', 1, '120.50');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `name`) VALUES
(1, 'Desktop'),
(2, 'Laptop'),
(3, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `product_items`
--

CREATE TABLE `product_items` (
  `id` int NOT NULL,
  `product_category_id` int NOT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `description` mediumtext NOT NULL,
  `cost` decimal(10,2) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `current_stocks` int NOT NULL,
  `current_ratings` decimal(10,2) NOT NULL DEFAULT '0.00',
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_items`
--

INSERT INTO `product_items` (`id`, `product_category_id`, `slug`, `name`, `description`, `cost`, `price`, `current_stocks`, `current_ratings`, `status`) VALUES
(1, 2, NULL, 'Signature Classic Venti', 'just description', '40.00', '0.00', 98, '0.00', 1),
(2, 2, NULL, 'Signature Classic Tall', 'just description', '50.00', '120.50', 46, '0.00', 1),
(3, 3, NULL, 'Taro Cream Cheese Medium', 'sdfsd', '70.00', '150.00', -17, '0.00', 1),
(6, 2, NULL, 'Red Velvet', 'blue na pearl', '20.00', '0.00', 102, '0.00', 1),
(7, 2, NULL, 'PENK Velvet', 'blue na pearl', '20.00', '0.00', 100, '0.00', 1),
(8, 2, NULL, 'tetst', 'green', '50.00', '0.00', 30, '0.00', 1),
(9, 2, NULL, 'test', 'wefw', '10.00', '0.00', 98, '0.00', 1),
(11, 1, NULL, 'test', 'rgr', '23.00', '122.00', 35, '0.00', 1),
(12, 1, NULL, 'test', 'rgr', '23.00', '122.00', 34, '0.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_item_images`
--

CREATE TABLE `product_item_images` (
  `id` int NOT NULL,
  `product_item_id` int NOT NULL,
  `filename` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_item_images`
--

INSERT INTO `product_item_images` (`id`, `product_item_id`, `filename`) VALUES
(6, 7, '25082664.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int NOT NULL,
  `order_item_id` int NOT NULL,
  `product_item_id` int DEFAULT NULL,
  `customer_id` int DEFAULT NULL,
  `rate` int NOT NULL,
  `comment` mediumtext NOT NULL,
  `rate_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrators`
--
ALTER TABLE `administrators`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ecom_settings`
--
ALTER TABLE `ecom_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory_histories`
--
ALTER TABLE `inventory_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_items`
--
ALTER TABLE `product_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_item_images`
--
ALTER TABLE `product_item_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrators`
--
ALTER TABLE `administrators`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `ecom_settings`
--
ALTER TABLE `ecom_settings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `inventory_histories`
--
ALTER TABLE `inventory_histories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_items`
--
ALTER TABLE `product_items`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product_item_images`
--
ALTER TABLE `product_item_images`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
