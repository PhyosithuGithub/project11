-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2020 at 04:54 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ewebsite`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Clothes', 'clothes', '2020-04-20 04:29:20', '2020-04-20 04:29:20', '2020-04-20 08:59:20'),
(2, 'Electronic', 'electronic', '2020-04-20 04:31:29', '2020-04-20 04:31:29', '2020-04-20 09:01:29'),
(3, 'PPPPPP', 'pppppp', '2020-04-24 22:18:38', '2020-04-24 22:18:38', '2020-04-25 02:48:39');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order_extra` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `order_no`, `order_extra`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '5eac1348835df', '{\"id\":\"ch_1GdxnoK8uST9Um9gGgd2Bz0G\",\"object\":\"charge\",\"amount\":5000,\"amount_refunded\":0,\"application\":null,\"application_fee\":null,\"application_fee_amount\":null,\"balance_transaction\":\"txn_1GdxnoK8uST9Um9grFIhQEnI\",\"billing_details\":{\"address\":{\"city\":null,\"country\":null,\"line1\":null,\"line2\":null,\"postal_code\":\"1111\",\"state\":null},\"email\":null,\"name\":\"phyosithu@gmail.com\",\"phone\":null},\"calculated_statement_descriptor\":\"Stripe\",\"captured\":true,\"created\":1588335432,\"currency\":\"usd\",\"customer\":\"cus_HCMWzDHVcSPn1Q\",\"description\":null,\"destination\":null,\"dispute\":null,\"disputed\":false,\"failure_code\":null,\"failure_message\":null,\"fraud_details\":[],\"invoice\":null,\"livemode\":false,\"metadata\":[],\"on_behalf_of\":null,\"order\":null,\"outcome\":{\"network_status\":\"approved_by_network\",\"reason\":null,\"risk_level\":\"normal\",\"risk_score\":17,\"seller_message\":\"Payment complete.\",\"type\":\"authorized\"},\"paid\":true,\"payment_intent\":null,\"payment_method\":\"card_1GdxnjK8uST9Um9gwbDWArqh\",\"payment_method_details\":{\"card\":{\"brand\":\"visa\",\"checks\":{\"address_line1_check\":null,\"address_postal_code_check\":\"pass\",\"cvc_check\":\"pass\"},\"country\":\"US\",\"exp_month\":10,\"exp_year\":2020,\"fingerprint\":\"HgZ0ltASMW80N0A9\",\"funding\":\"credit\",\"installments\":null,\"last4\":\"4242\",\"network\":\"visa\",\"three_d_secure\":null,\"wallet\":null},\"type\":\"card\"},\"receipt_email\":null,\"receipt_number\":null,\"receipt_url\":\"https:\\/\\/pay.stripe.com\\/receipts\\/acct_1GcMTHK8uST9Um9g\\/ch_1GdxnoK8uST9Um9gGgd2Bz0G\\/rcpt_HCMWYlxm7XXCHbIokB51iUYEttCv8ji\",\"refunded\":false,\"refunds\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"\\/v1\\/charges\\/ch_1GdxnoK8uST9Um9gGgd2Bz0G\\/refunds\"},\"review\":null,\"shipping\":null,\"source\":{\"id\":\"card_1GdxnjK8uST9Um9gwbDWArqh\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":\"1111\",\"address_zip_check\":\"pass\",\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_HCMWzDHVcSPn1Q\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":10,\"exp_year\":2020,\"fingerprint\":\"HgZ0ltASMW80N0A9\",\"funding\":\"credit\",\"last4\":\"4242\",\"metadata\":[],\"name\":\"phyosithu@gmail.com\",\"tokenization_method\":null},\"source_transfer\":null,\"statement_descriptor\":null,\"statement_descriptor_suffix\":null,\"status\":\"succeeded\",\"transfer_data\":null,\"transfer_group\":null}', '2020-05-01 07:47:12', '2020-05-01 07:47:12', '2020-05-01 12:17:12');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `unit_price` float NOT NULL,
  `status` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` float NOT NULL,
  `order_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `user_id`, `product_id`, `unit_price`, `status`, `quantity`, `total`, `order_no`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 200.1, 'succeeded', 1, 200.1, '5eac1348835df', '2020-05-01 07:47:12', '2020-05-01 07:47:12', '2020-05-01 12:17:12'),
(2, 1, 3, 120, 'succeeded', 1, 120, '5eac1348835df', '2020-05-01 07:47:12', '2020-05-01 07:47:12', '2020-05-01 12:17:12'),
(3, 1, 5, 432, 'succeeded', 1, 432, '5eac1348835df', '2020-05-01 07:47:12', '2020-05-01 07:47:12', '2020-05-01 12:17:12');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` float NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `user_id`, `amount`, `status`, `order_no`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 752.1, 'succeeded', '5eac1348835df', '2020-05-01 07:47:12', '2020-05-01 07:47:12', '2020-05-01 12:17:12');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` float NOT NULL,
  `cat_id` int(11) NOT NULL,
  `sub_cat_id` int(11) NOT NULL,
  `featured` int(2) NOT NULL DEFAULT 1,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `cat_id`, `sub_cat_id`, `featured`, `image`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'One Shirt', 200.1, 1, 1, 2, 'http://shop.ps/assets/uploads/php852c-5b6e50df392d16d4523704ceb6ae5a09.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2020-04-20 04:44:45', '2020-04-20 04:44:45', '2020-04-20 09:14:45'),
(2, 'Two Shirt', 300.1, 1, 1, 1, 'http://shop.ps/assets/uploads/php47d2-59279015409ce77afa4a2c25022f4b2c.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2020-04-20 04:45:33', '2020-04-20 04:45:33', '2020-04-20 09:15:33'),
(3, 'Three Shirt', 120, 1, 1, 2, 'http://shop.ps/assets/uploads/phpeaba-8f7572fc4c5d31eee7d3aa3d24342a79.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2020-04-20 04:46:15', '2020-04-20 04:46:15', '2020-04-20 09:16:15'),
(4, 'Four Shirt', 1320, 1, 1, 1, 'http://shop.ps/assets/uploads/php3e5a-d53891a4ec7242550903f63ddfe5ca03.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2020-04-20 04:46:36', '2020-04-20 04:46:36', '2020-04-20 09:16:36'),
(5, 'Five Shirt', 432, 1, 1, 2, 'http://shop.ps/assets/uploads/php919b-4f8ef85a63706eb562ed674c35009587.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2020-04-20 04:46:58', '2020-04-20 04:46:58', '2020-04-20 09:16:58'),
(6, 'Six Shirt', 243, 1, 1, 1, 'http://shop.ps/assets/uploads/phpeb16-fc498be412f9d6f8ac76795657991187.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2020-04-20 04:47:21', '2020-04-20 04:47:21', '2020-04-20 09:17:21'),
(7, 'Seven', 413, 1, 1, 1, 'http://shop.ps/assets/uploads/php3455-a509ef1dda67cb6632069794cfe182a3.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2020-04-20 04:47:39', '2020-04-20 04:47:39', '2020-04-20 09:17:39'),
(8, 'Eight Shirt', 490, 1, 1, 1, 'http://shop.ps/assets/uploads/php370d-fa30faddf4e5f01218cfd0192e275bb0.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2020-04-20 04:53:08', '2020-04-20 04:53:08', '2020-04-20 09:23:08'),
(9, 'ACer One', 500.23, 2, 5, 1, 'http://shop.ps/assets/uploads/phpf117-27f9442f16d9e60b93a62679b2784bb7.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2020-04-20 04:53:55', '2020-04-20 04:53:55', '2020-04-20 09:23:55'),
(10, 'Ausu One', 390, 2, 5, 1, 'http://shop.ps/assets/uploads/php1304-7b19831493c44007e1fdb1eb1c609537.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2020-04-20 04:55:10', '2020-04-20 04:55:10', '2020-04-20 09:25:10'),
(11, 'Ausu Two', 500, 2, 5, 1, 'http://shop.ps/assets/uploads/php84ba-59195bac9305f646ae8cda1dfefaeb5d.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2020-04-20 04:55:39', '2020-04-20 04:55:39', '2020-04-20 09:25:39'),
(12, 'Shirt Twelve', 290, 1, 1, 2, 'http://shop.ps/assets/uploads/phpd046-0377a35986e7ac6bf95cfa909e1090e2.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2020-04-20 04:57:04', '2020-04-20 04:57:04', '2020-04-20 09:27:04'),
(13, 'Shirt Thirteen', 343, 1, 1, 1, 'http://shop.ps/assets/uploads/phpc9cb-5efb9c9f58524084c6453bf2bc8c00de.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2020-04-20 04:58:07', '2020-04-20 04:58:07', '2020-04-20 09:28:07'),
(14, 'Shirt Forteen', 243, 1, 1, 1, 'http://shop.ps/assets/uploads/php254a-04955a10540fcd3c8e83646b405f094b.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2020-04-20 04:58:31', '2020-04-20 04:58:31', '2020-04-20 09:28:31'),
(15, 'Shirt Fifteen', 433, 1, 1, 1, 'http://shop.ps/assets/uploads/php3a96-401804dd99ffb5e504c80cd65fc03dbd.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2020-04-20 04:59:42', '2020-04-20 04:59:42', '2020-04-20 09:29:42'),
(16, 'Shirt Sixteen', 522, 1, 1, 1, 'http://shop.ps/assets/uploads/php8e06-4e67a47c8458d79a2e5cba32b07a4af5.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2020-04-20 05:00:03', '2020-04-20 05:00:03', '2020-04-20 09:30:03'),
(17, 'Shirt Seventeen', 534, 1, 1, 1, 'http://shop.ps/assets/uploads/php12b8-f17c954254ff1ab434d21ecf00ff4138.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2020-04-20 05:00:37', '2020-04-20 05:00:37', '2020-04-20 09:30:37'),
(18, 'Shirt Eighteen', 435, 1, 1, 2, 'http://shop.ps/assets/uploads/php6482-b0881574a9444c3d60c39e5790e8627a.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2020-04-20 05:00:58', '2020-04-20 05:00:58', '2020-04-20 09:30:58'),
(19, 'SHirt Nineteen', 76, 1, 1, 1, 'http://shop.ps/assets/uploads/phpc699-496371d4008d842f1bf880e32eddaf96.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2020-04-20 05:01:23', '2020-04-20 05:01:23', '2020-04-20 09:31:23'),
(20, 'Shirt Twenteen', 54, 1, 1, 2, 'http://shop.ps/assets/uploads/php8e2-82842b4096d0af0270f897f95852f1f9.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2020-04-20 05:01:40', '2020-04-20 05:01:40', '2020-04-20 09:31:40'),
(21, 'Shirt 21', 543, 1, 1, 1, 'http://shop.ps/assets/uploads/php75a7-f9ce3c359fd3f00d9b2f4c6703783730.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2020-04-20 05:02:08', '2020-04-20 05:02:08', '2020-04-20 09:32:08'),
(22, 'Shirt 22', 65, 1, 1, 1, 'http://shop.ps/assets/uploads/phpd174-a0d76dcb603f4a560784d93d127d7460.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2020-04-20 05:02:32', '2020-04-20 05:02:32', '2020-04-20 09:32:32'),
(23, 'Shirt 23', 78, 1, 1, 2, 'http://shop.ps/assets/uploads/php2552-ea900de0cf013f5762b458f9d5567597.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2020-04-20 05:02:53', '2020-04-20 05:02:53', '2020-04-20 09:32:53'),
(24, 'Lenovo', 500, 2, 5, 1, 'http://shop.ps/assets/uploads/php4fd6-90b941011174b89a76cd49340b1bf266.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2020-04-20 05:05:15', '2020-04-20 05:05:15', '2020-04-20 09:35:15'),
(25, 'Lenovo One', 400, 2, 5, 2, 'http://shop.ps/assets/uploads/phpa6c1-409d2cb44d194902a012646328901d2f.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2020-04-20 05:05:37', '2020-04-20 05:05:37', '2020-04-20 09:35:37'),
(26, 'Shirt 26', 67, 1, 1, 1, 'http://shop.ps/assets/uploads/php4baa-c6f7753a6130ae6eb20020848e8d62ad.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2020-04-20 05:07:25', '2020-04-20 05:07:25', '2020-04-20 09:37:25'),
(27, 'Shirt 27', 88, 1, 1, 2, 'http://shop.ps/assets/uploads/php9b52-56dfd66519456c8446b615706030b0b6.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2020-04-20 05:07:45', '2020-04-20 05:07:45', '2020-04-20 09:37:45'),
(28, 'Shirt 28', 99, 1, 1, 1, 'http://shop.ps/assets/uploads/phpd7a0-19467a8d36d8892e221553d637ff8157.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2020-04-20 05:08:01', '2020-04-20 05:08:01', '2020-04-20 09:38:01'),
(29, 'Shirt 29', 67, 1, 1, 1, 'http://shop.ps/assets/uploads/php6805-f94ab533b0229d8c061464e0c077121c.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2020-04-20 05:10:49', '2020-04-20 05:10:49', '2020-04-20 09:40:49'),
(30, 'SHirt 30', 560, 1, 1, 1, 'http://shop.ps/assets/uploads/phpc51b-f9ae36b4ef28042b2c1a2b3c5749af3f.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2020-04-20 05:11:13', '2020-04-20 05:11:13', '2020-04-20 09:41:13'),
(31, 'Shirt 31', 510, 1, 1, 1, 'http://shop.ps/assets/uploads/php14e1-6de19b90a2ce86f39c13ee287f9e6c50.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2020-04-20 05:11:33', '2020-04-20 05:11:33', '2020-04-20 09:41:33'),
(32, 'Shirt 32', 90, 1, 1, 2, 'http://shop.ps/assets/uploads/php4e03-aa2b442453027d738a62fb726e56f6ff.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2020-04-20 05:11:48', '2020-04-20 05:11:48', '2020-04-20 09:41:48'),
(33, 'Shirt 33', 78, 1, 1, 1, 'http://shop.ps/assets/uploads/phpc737-17a97e58bc55a3cb934c6782a6595239.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2020-04-20 05:13:24', '2020-04-20 05:13:24', '2020-04-20 09:43:24'),
(34, 'Shirt 34', 87, 1, 1, 1, 'http://shop.ps/assets/uploads/php337f-c6ba35bfc753f7c57f0bdd2d5c467ea2.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2020-04-20 05:13:52', '2020-04-20 05:13:52', '2020-04-20 09:43:52'),
(35, 'Shirt 35', 89, 1, 1, 1, 'http://shop.ps/assets/uploads/phpdafc-a9e33b87258a949a545201dc21ea6df2.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2020-04-20 05:14:35', '2020-04-20 05:14:35', '2020-04-20 09:44:35'),
(36, 'Shirt 36', 97, 1, 1, 1, 'http://shop.ps/assets/uploads/php22f3-d7c12e6f5f9427a361bdf2a082f4bdf1.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2020-04-20 05:14:53', '2020-04-20 05:14:53', '2020-04-20 09:44:53'),
(37, 'Shirt 37', 67, 1, 1, 1, 'http://shop.ps/assets/uploads/php9555-589cb219459e90b3f78658df55715cfc.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2020-04-20 05:15:23', '2020-04-20 05:15:23', '2020-04-20 09:45:23'),
(38, 'Shirt 38', 76, 1, 1, 2, 'http://shop.ps/assets/uploads/php2746-6b67555be12623ad039f9ece7affae61.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2020-04-20 05:16:00', '2020-04-20 05:16:00', '2020-04-20 09:46:00'),
(39, 'Shirt 39', 68, 1, 1, 1, 'http://shop.ps/assets/uploads/php6a7a-75d26cce87c064841372f39c713984af.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2020-04-20 05:16:17', '2020-04-20 05:16:17', '2020-04-20 09:46:17'),
(40, 'Shirt 40', 50, 1, 1, 1, 'http://shop.ps/assets/uploads/phpb271-c88f2e112f1eb4e9f2b86e63ece7cd49.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2020-04-20 05:16:36', '2020-04-20 05:16:36', '2020-04-20 09:46:36'),
(41, 'Shrit 41', 86, 1, 1, 1, 'http://shop.ps/assets/uploads/php34-2f1e4dc4722b3d3c02bc4fce0f519b34.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2020-04-20 05:16:55', '2020-04-20 05:16:55', '2020-04-20 09:46:55'),
(42, 'Shirt 42', 341, 1, 1, 1, 'http://shop.ps/assets/uploads/php99f6-e6c79e2c75ea2ac947d13e0f61e45e3f.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2020-04-20 05:17:35', '2020-04-20 05:17:35', '2020-04-20 09:47:35'),
(43, 'Shirt 43', 910, 1, 1, 1, 'http://shop.ps/assets/uploads/phpe8a3-82ce6cf729dd8047ec6f0fe74b703916.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2020-04-20 05:17:55', '2020-04-20 05:17:55', '2020-04-20 09:47:55'),
(44, 'Shirt 44', 98, 1, 1, 1, 'http://shop.ps/assets/uploads/php7b12-c090ae4467aec7953624c059e1f88465.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2020-04-20 05:18:33', '2020-04-20 05:18:33', '2020-04-20 09:48:33'),
(45, 'Shirt 45', 501, 1, 1, 1, 'http://shop.ps/assets/uploads/phpbcee-4003657662031410f4ea0f229c3d167c.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2020-04-20 05:18:49', '2020-04-20 05:18:49', '2020-04-20 09:48:49');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cat_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `name`, `cat_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Men_Shirt', 1, '2020-04-20 04:37:20', '2020-04-20 04:37:20', '2020-04-20 09:07:20'),
(2, 'Women_Shirt', 1, '2020-04-20 04:37:38', '2020-04-20 04:37:38', '2020-04-20 09:07:38'),
(3, 'Baby_Shirt', 1, '2020-04-20 04:37:53', '2020-04-20 04:37:53', '2020-04-20 09:07:53'),
(4, 'Old_Shirt', 1, '2020-04-20 04:38:39', '2020-04-20 04:38:39', '2020-04-20 09:08:39'),
(5, 'Computer', 2, '2020-04-20 04:48:59', '2020-04-20 04:48:59', '2020-04-20 09:18:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'phyosithu', 'phyosithu@gmail.com', '$2y$10$8kB4G0cZmBt4J4FGe../8enHfAtZ9trJ7kGuLRbdSDxjxbYl1bs4e', '', '2020-04-25 09:13:56', '2020-04-25 09:13:56', '2020-04-25 13:43:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `order_no` (`order_no`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
