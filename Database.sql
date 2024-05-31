-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2023 at 07:36 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shoplaptop`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `creator` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `create_at`, `update_at`, `status`, `creator`) VALUES
(1, '  lenovo', '2023-04-05 23:08:18', '2023-04-12 13:24:45', 1, 1),
(2, 'acer', '2023-04-06 12:57:18', '2023-04-09 19:29:13', 1, 1),
(19, 'asus', '2023-04-09 19:29:21', NULL, 0, 1),
(20, 'demo', '2023-04-11 15:45:47', NULL, 0, 1),
(31, ' demo 1', '2023-04-12 23:09:38', '2023-04-12 23:09:45', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `creator` int(11) DEFAULT 1,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`, `status`, `creator`, `create_at`, `update_at`) VALUES
(1, 'Laptop Văn phòng', 0, 1, 1, '2023-04-05 23:08:33', '2023-04-12 14:40:08'),
(2, 'Laptop Gaming', 0, 1, 1, '2023-04-07 13:46:26', '2023-04-07 13:48:57'),
(3, 'Laptop Mỏng nhẹ', 0, 1, 1, '2023-04-07 13:46:32', '2023-04-07 13:49:03'),
(4, 'Laptop Đồ họa - Kỹ thuật', 0, 1, 1, '2023-04-07 13:47:07', '2023-04-07 13:49:12'),
(5, 'Laptop Sinh viên', 0, 1, 1, '2023-04-07 13:47:19', '2023-04-07 13:49:21'),
(6, 'Laptop Cảm ứng', 0, 1, 1, '2023-04-07 13:47:24', '2023-04-07 13:49:27'),
(7, 'demo', 0, 0, 1, '2023-04-12 23:10:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `content` varchar(100) NOT NULL,
  `rate` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime DEFAULT NULL,
  `status_comment` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `product_id`, `email`, `content`, `rate`, `status`, `create_at`, `update_at`, `status_comment`) VALUES
(12, 2, 'vuductien2908@gmail.com', 'Sản phẩm tốt', 1, 1, '2023-04-15 00:26:37', '2023-04-15 00:29:46', 1),
(13, 2, 'vuductien2908@gmail.com', 'Yes', 5, 1, '2023-04-15 00:31:26', '2023-04-15 00:31:31', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(256) DEFAULT NULL,
  `email` varchar(256) DEFAULT NULL,
  `content` varchar(256) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `content`, `status`, `customer_id`) VALUES
(7, 'Vũ Đức Tiến', 'vuductien2908@gmail.com', 'Tệ', 1, 4),
(8, 'Vũ Đức Tiến', 'vuductien2908@gmail.com', 'Tệ', 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` text NOT NULL,
  `birthday` date DEFAULT NULL,
  `address` text NOT NULL,
  `phone` varchar(15) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime DEFAULT current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `password`, `birthday`, `address`, `phone`, `create_at`, `update_at`, `status`) VALUES
(4, 'Tiến Vũ 1', 'vuductien2908@gmail.com', '25f9e794323b453885f5181f1b624d0b', '2023-04-14', '182 Trần Hưng Đạo', '0333669832', '2023-04-05 20:28:17', '2023-04-12 23:10:50', 1),
(5, 'Tiến Vũ', 'demo@gmail.com', '25f9e794323b453885f5181f1b624d0b', '0000-00-00', '182 Trần Hưng Đạo', '0333669832', '2023-04-11 15:09:35', '2023-04-11 15:09:35', 0),
(6, 'Lưu Văn A', 'lva@gmail.com', '25f9e794323b453885f5181f1b624d0b', '2023-04-07', '182 Trần Hưng Đạo', '11112222333', '2023-04-12 23:11:33', '2023-04-12 23:11:42', 0),
(7, '', '', 'd41d8cd98f00b204e9800998ecf8427e', '0000-00-00', '', '', '2023-04-14 21:48:25', '2023-04-14 21:48:25', 0),
(8, 'Tiến Vũ', 'abc@gmail.com', '25f9e794323b453885f5181f1b624d0b', '2002-04-25', '182 Trần Hưng Đạo', '123456789', '2023-04-14 21:57:32', '2023-04-14 21:57:32', 1),
(9, 'Tiến Vũ', '123@123.com', '25f9e794323b453885f5181f1b624d0b', '2002-10-15', '182 Trần Hưng Đạo', '123453454', '2023-04-15 11:55:26', '2023-04-15 11:55:26', 1),
(10, 'Trần Văn B', 'tranvanB@gmail.com', '25f9e794323b453885f5181f1b624d0b', '2002-01-17', '182 Trần Hưng Đạo', '123456789', '2023-04-17 12:11:50', '2023-04-17 12:11:50', 1),
(11, 'abc', 'adwdw@gmail.com', '25f9e794323b453885f5181f1b624d0b', '2000-06-17', '182 Trần Hưng Đạo', '03336698323123', '2023-04-17 12:15:33', '2023-04-17 12:15:33', 1),
(12, 'demo', 'demo@gmail.com', '25f9e794323b453885f5181f1b624d0b', '2002-06-17', '182 Trần Hưng Đạo', '3123123231', '2023-04-17 12:53:40', '2023-04-17 12:53:40', 1),
(13, 'demo1', 'demo1@gmail.com', '25f9e794323b453885f5181f1b624d0b', '2002-01-17', '182 Trần Hưng Đạo', '3123123123123', '2023-04-17 12:54:48', '2023-04-17 12:54:48', 1),
(14, 'demo2', 'demo2@gmail.com', '25f9e794323b453885f5181f1b624d0b', '2002-01-17', '182 Trần Hưng Đạo', '4324234324', '2023-04-17 12:57:56', '2023-04-17 12:57:56', 1),
(15, 'Tiến Vũ', 'vuductien322908@gmail.com', '698d51a19d8a121ce581499d7b701668', '2002-02-17', '182 Trần Hưng Đạo', '312312331', '2023-04-17 12:59:12', '2023-04-17 12:59:12', 1),
(16, 'Tiến Vũ', 'vuductien290dqwdwq8@gmail.com', '698d51a19d8a121ce581499d7b701668', '2002-03-02', '182 Trần Hưng Đạo', '231233123', '2023-04-17 13:00:08', '2023-04-17 13:00:08', 1),
(17, 'Tiến Vũ', 'vuductien32132908@gmail.com', '698d51a19d8a121ce581499d7b701668', '2002-03-31', '182 Trần Hưng Đạo', '033366983231232', '2023-04-17 13:00:28', '2023-04-17 13:00:28', 1),
(18, 'Tiến Vũ', 'vuductie3123n2908@gmail.com', '25f9e794323b453885f5181f1b624d0b', '2002-06-17', '182 Trần Hưng Đạo', '0333669832111', '2023-04-17 22:40:30', '2023-04-17 22:40:30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp(),
  `name_receive` varchar(250) NOT NULL,
  `phone_receive` varchar(15) NOT NULL,
  `address_receive` text NOT NULL,
  `note` text NOT NULL,
  `total` decimal(18,0) NOT NULL DEFAULT 0,
  `status_order` int(11) NOT NULL DEFAULT 1,
  `customer_id` int(11) NOT NULL,
  `promotion_id` int(11) NOT NULL DEFAULT 0,
  `payment_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime DEFAULT NULL,
  `approver` int(11) NOT NULL DEFAULT 1,
  `delivery` varchar(250) NOT NULL DEFAULT 'Giao hàng bình thường'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_date`, `name_receive`, `phone_receive`, `address_receive`, `note`, `total`, `status_order`, `customer_id`, `promotion_id`, `payment_id`, `status`, `create_at`, `update_at`, `approver`, `delivery`) VALUES
(68, '2023-04-17 00:23:38', 'Lưu Vũ Tuyển', '1212321332', 'Kiên Giang', 'đưqw', '24000000', 2, 4, 0, 1, 1, '2023-04-17 00:23:38', '2023-04-17 00:28:29', 1, 'Giao hàng tiết kiệm'),
(69, '2023-04-17 00:45:15', 'Lưu Vũ Tuyển', '3123123', 'Kiên Giang', 'dqwdwq', '12000000', 2, 4, 0, 1, 1, '2023-04-17 00:45:15', '2023-04-17 13:10:02', 9, 'Giao hàng Nhanh'),
(70, '2023-04-17 00:51:13', 'Vũ Đức Tiến', '3123123', 'Kiên Giang', 'demo', '12000000', 3, 4, 0, 1, 1, '2023-04-17 00:51:13', '2023-04-17 13:10:06', 9, 'Giao hàng bình thường'),
(71, '2023-04-17 13:04:42', 'Vũ Đức Tiến', '1212321332', 'đưqwd', 'feewf', '12000000', 2, 4, 0, 1, 1, '2023-04-17 13:04:42', '2023-04-17 13:10:12', 9, 'Giao hàng tiết kiệm'),
(72, '2023-04-17 13:05:07', 'Đinh Quang Huy', '1212321332', 'Kiên Giang', 'fefewf', '12000000', 3, 4, 0, 1, 1, '2023-04-17 13:05:07', '2023-04-17 13:10:30', 9, 'Giao hàng tiết kiệm'),
(73, '2023-04-17 13:06:33', 'Lưu Vũ Tuyển', '3123123', 'đưqwd', 'dưqdwq', '12000000', 1, 4, 0, 1, 1, '2023-04-17 13:06:33', NULL, 1, 'Giao hàng tiết kiệm'),
(74, '2023-04-17 13:07:03', 'Lưu Vũ Tuyển', '1212321332', 'Kiên Giang', 'dưqdqwd', '10000000', 1, 4, 0, 1, 1, '2023-04-17 13:07:03', NULL, 1, 'Giao hàng Nhanh'),
(75, '2023-04-17 23:53:41', 'Vũ Đức Tiến', '1212321332', 'Kiên Giang', 'dqwdqwd', '100000', 1, 18, 0, 1, 1, '2023-04-17 23:53:41', NULL, 1, 'Giao hàng nhanh'),
(77, '2023-04-17 23:57:14', 'Lưu Vũ Tuyển', '3123123', 'Kiên Giang', 'dwdwdq', '11800000', 1, 18, 0, 1, 1, '2023-04-17 23:57:14', NULL, 1, 'Giao hàng hỏa tốc'),
(78, '2023-04-18 00:22:16', 'Vũ Đức Tiến', '1212321332', 'Kiên Giang', 'Giao nhanh', '11600000', 1, 18, 8, 1, 1, '2023-04-18 00:22:16', NULL, 1, 'Giao hàng hỏa tốc');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(18,0) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `quantity`, `price`, `product_id`, `order_id`, `create_at`, `update_at`) VALUES
(36, 2, '12000000', 1, 68, '2023-04-17 00:23:38', NULL),
(37, 1, '12000000', 1, 69, '2023-04-17 00:45:15', NULL),
(38, 1, '12000000', 1, 70, '2023-04-17 00:51:13', NULL),
(39, 1, '12000000', 1, 71, '2023-04-17 13:04:42', NULL),
(40, 1, '12000000', 1, 72, '2023-04-17 13:05:07', NULL),
(41, 1, '12000000', 1, 73, '2023-04-17 13:06:33', NULL),
(42, 1, '10000000', 4, 74, '2023-04-17 13:07:03', NULL),
(43, 1, '12000000', 1, 75, '2023-04-17 23:53:41', NULL),
(44, 1, '12000000', 1, 77, '2023-04-17 23:57:14', NULL),
(45, 1, '12000000', 2, 78, '2023-04-18 00:22:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `creator` int(11) DEFAULT 1,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `name`, `status`, `create_at`, `creator`, `update_at`) VALUES
(1, 'Thanh toán khi nhận hàng xxx', 1, '2023-04-06 13:25:22', 1, '2023-04-12 14:39:49'),
(2, 'demo 1', 0, '2023-04-12 23:11:49', 1, '2023-04-12 23:11:55');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `price` decimal(18,0) NOT NULL,
  `sale_price` decimal(18,0) NOT NULL,
  `serial` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `img` text NOT NULL,
  `content` text NOT NULL,
  `view_count` int(11) NOT NULL DEFAULT 0,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `creator` int(11) DEFAULT 1,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime DEFAULT NULL,
  `hot` tinyint(1) NOT NULL DEFAULT 0,
  `list_img` text NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `sale_price`, `serial`, `description`, `img`, `content`, `view_count`, `category_id`, `brand_id`, `status`, `creator`, `create_at`, `update_at`, `hot`, `list_img`, `quantity`) VALUES
(1, 'Acer nitro 502', '16000000', '12000000', 'Acer123', '<p>- CPU: Intel Core i5-1230U<br>- Màn hình: 13.3\" (2880 x 1800)<br>- RAM: 8GB Onboard LPDDR4X 4266MHz<br>- Đồ họa: Onboard Intel Iris Xe Graphics<br>- Lưu trữ: 512GB SSD M.2 NVMe /<br>- Hệ điều hành: Windows 11 Home SL<br>- Pin: 4 cell 66 Wh Pin liền<br>- Khối lượng: 1.3kg</p>', '8eea2d02dffe1a5a872a40672f1eb216.jpg', '', 6, 1, 1, 1, 1, '2023-04-07 13:13:22', '2023-04-18 00:21:40', 0, 'af1d413887bef07aed78d75bd2e75323.jpg,57b249718913c9b4a297ad5783a121fa.jpg', 5),
(2, 'Legon 505', '16000000', '12000000', '11', '<p>- CPU: Intel Core i5-1230U<br>- Màn hình: 13.3\" (2880 x 1800)<br>- RAM: 8GB Onboard LPDDR4X 4266MHz<br>- Đồ họa: Onboard Intel Iris Xe Graphics<br>- Lưu trữ: 512GB SSD M.2 NVMe /<br>- Hệ điều hành: Windows 11 Home SL<br>- Pin: 4 cell 66 Wh Pin liền<br>- Khối lượng: 1.3kg</p>', 'd1d7e8502113bec539f1d25a0006c50d.jpg', '', 54, 1, 1, 1, 1, '2023-04-07 13:35:32', '2023-04-18 00:21:44', 1, '4c858dfbb442895e7b09f66a921d4206.jpg,8d41131de98a951e9f25f7ebbed58fa8.png,703c87cdba693975c652272ca61fa45f.jpg,af6d5d2b29957881df69fadab3a434f6.png,3150d64eb7ff4053fbdb3bcd51f99681.jpg', 9),
(3, 'test', '720000', '120000', 'Acer2', '<p>test</p>', '69872eb433739afb0d1ce65f04fdc43e.jpg', '', 0, 1, 2, 0, 1, '2023-04-07 13:36:01', NULL, 0, '', 0),
(4, 'Lenovo', '12000000', '10000000', '#12', '<p>- CPU: AMD Ryzen 7 4800H<br>- Màn hình: 15.6\" IPS (1920 x 1080),144Hz<br>- RAM: 1 x 8GB DDR4 3200MHz<br>- Đồ họa: RTX 3050Ti 4GB GDDR6 / AMD Radeon Graphics<br>- Lưu trữ: 512GB SSD M.2 NVMe /<br>- Hệ điều hành: Windows 11 Home<br>- Pin: 4 cell 56 Wh Pin liền<br>- Khối lượng: 2.1kg</p>', '050a2754e1c75606a427c86c23dd59d5.jpg', '', 2, 3, 1, 1, 1, '2023-04-07 23:06:47', '2023-04-15 16:04:03', 0, '5b242ef3cde7d937f11effec90248f25.', 7),
(5, 'macbook', '23000000', '21000000', 'Mac#102', '<ul><li>Phù hợp cho lập trình viên, thiết kế đồ họa 2D, dân văn phòng</li><li>Hiệu năng vượt trội - Cân mọi tác vụ từ word, exel đến chỉnh sửa ảnh trên các phần mềm như AI, PTS</li><li>Đa nhiệm mượt mà - Ram 8GB cho phép vừa mở trình duyệt để tra cứu thông tin, vừa làm việc trên phần mềm</li><li>Trang bị SSD 256GB - Cho thời gian khởi động nhanh chóng, tối ưu hoá thời gian load ứng dụng</li><li>Chất lượng hình ảnh sắc nét - Màn hình Retina cao cấp cùng công nghệ TrueTone cân bằng màu sắc</li><li>Thiết kế sang trọng - Nặng chỉ 1.29KG, độ dày 16.1mm. Tiện lợi mang theo mọi nơi</li></ul>', '80dbbe3cf4949b52ef87bb51c3a5ebed.png', '', 0, 3, 19, 0, 1, '2023-04-11 16:45:35', '2023-04-11 16:46:46', 1, '6565eb269b8b56d170cda33f407b18a7.webp,c8a4b9e289e569899f28b0a6d9617a26.webp,4ed8ae9b692455d380a23c9668a69e2c.webp', 0),
(6, 'demo', '160000', '12000000', '11', '<ul><li>Phù hợp cho lập trình viên, thiết kế đồ họa 2D, dân văn phòng</li><li>Hiệu năng vượt trội - Cân mọi tác vụ từ word, exel đến chỉnh sửa ảnh trên các phần mềm như AI, PTS</li><li>Đa nhiệm mượt mà - Ram 8GB cho phép vừa mở trình duyệt để tra cứu thông tin, vừa làm việc trên phần mềm</li><li>Trang bị SSD 256GB - Cho thời gian khởi động nhanh chóng, tối ưu hoá thời gian load ứng dụng</li><li>Chất lượng hình ảnh sắc nét - Màn hình Retina cao cấp cùng công nghệ TrueTone cân bằng màu sắc</li><li>Thiết kế sang trọng - Nặng chỉ 1.29KG, độ dày 16.1mm. Tiện lợi mang theo mọi nơi</li></ul>', '6f34a3edbab0ea28f04c054a76c49bd6.jpg', '', 0, 1, 1, 0, 1, '2023-04-11 16:47:24', '2023-04-11 16:48:57', 1, '6519f11c8fac7b4fd18c8cb498a42be9.jpg,6ebf32e4efcf0e9f5af25d60e99000e3.png,be0462f976dfc8de5835823b22aedd76.jpg', 0),
(7, 'demo', '160000', '120000', '11', '<ul><li>Phù hợp cho lập trình viên, thiết kế đồ họa 2D, dân văn phòng</li><li>Hiệu năng vượt trội - Cân mọi tác vụ từ word, exel đến chỉnh sửa ảnh trên các phần mềm như AI, PTS</li><li>Đa nhiệm mượt mà - Ram 8GB cho phép vừa mở trình duyệt để tra cứu thông tin, vừa làm việc trên phần mềm</li><li>Trang bị SSD 256GB - Cho thời gian khởi động nhanh chóng, tối ưu hoá thời gian load ứng dụng</li><li>Chất lượng hình ảnh sắc nét - Màn hình Retina cao cấp cùng công nghệ TrueTone cân bằng màu sắc</li><li>Thiết kế sang trọng - Nặng chỉ 1.29KG, độ dày 16.1mm. Tiện lợi mang theo mọi nơi</li></ul>', '70b734aa16d9e5938c646664287e4ace.jpg', '', 0, 1, 2, 0, 1, '2023-04-11 16:49:23', NULL, 1, 'bf58a8733f2c56c004552c2bcaa7365f.jpg,c312381d55c0e8ecc81b6f570f890d52.jpg,bb2cec25341366ae646abdbaaecfefdd.png', 0),
(8, 'demo', '160000', '120000', '11', '<ul><li>Phù hợp cho lập trình viên, thiết kế đồ họa 2D, dân văn phòng</li><li>Hiệu năng vượt trội - Cân mọi tác vụ từ word, exel đến chỉnh sửa ảnh trên các phần mềm như AI, PTS</li><li>Đa nhiệm mượt mà - Ram 8GB cho phép vừa mở trình duyệt để tra cứu thông tin, vừa làm việc trên phần mềm</li><li>Trang bị SSD 256GB - Cho thời gian khởi động nhanh chóng, tối ưu hoá thời gian load ứng dụng</li><li>Chất lượng hình ảnh sắc nét - Màn hình Retina cao cấp cùng công nghệ TrueTone cân bằng màu sắc</li><li>Thiết kế sang trọng - Nặng chỉ 1.29KG, độ dày 16.1mm. Tiện lợi mang theo mọi nơi</li></ul>', 'db907a01b455e0089002ac97c4a31475.jpg', '', 0, 1, 1, 0, 1, '2023-04-11 17:23:24', '2023-04-11 17:28:46', 1, '2f9840dc495091e19d7637373e80faa3.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE `promotions` (
  `id` int(11) NOT NULL,
  `code` varchar(250) NOT NULL,
  `price` decimal(18,0) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `creator` int(11) DEFAULT 1,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `promotions`
--

INSERT INTO `promotions` (`id`, `code`, `price`, `name`, `status`, `creator`, `create_at`, `update_at`) VALUES
(5, 'A21', '160000', 'demo', 1, 1, '2023-04-09 21:41:19', NULL),
(6, 'C0073', '120000', 'demo', 1, 1, '2023-04-09 21:41:37', '2023-04-12 23:10:10'),
(7, '13213', '1200', 'test', 0, 1, '2023-04-12 23:10:20', NULL),
(8, 'abc', '200000', 'test', 1, 1, '2023-04-18 00:21:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `specifications`
--

CREATE TABLE `specifications` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `key` varchar(250) NOT NULL,
  `value` varchar(250) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `creator` int(11) DEFAULT 1,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `specifications`
--

INSERT INTO `specifications` (`id`, `product_id`, `key`, `value`, `status`, `creator`, `create_at`, `update_at`) VALUES
(1, 4, 'test 234', '1232', 0, 1, '2023-04-10 23:59:15', '2023-04-11 14:13:53'),
(2, 4, 'Màn hình', '32 inch', 0, 1, '2023-04-11 00:27:07', '2023-04-11 14:17:03'),
(3, 4, 'Cận nặng', '3.6 Kg', 0, 1, '2023-04-11 00:35:10', '2023-04-11 14:17:01'),
(4, 4, 'demo', 'text demo', 0, 1, '2023-04-11 00:36:15', '2023-04-11 14:13:49'),
(5, 4, 'test', 'test', 0, 1, '2023-04-11 14:08:06', '2023-04-11 14:12:23'),
(6, 4, 'test 1', 'test 123', 0, 1, '2023-04-11 14:08:34', '2023-04-11 14:12:08'),
(7, 4, 'Loại card đồ họa', 'NVIDIA GeForce RTX 3050 4GB GDDR6, Boost Clock 1500MHz, TGP 85W', 1, 1, '2023-04-11 14:17:20', NULL),
(8, 4, 'Dung lượng RAM', '8GB', 1, 1, '2023-04-11 14:17:35', NULL),
(9, 4, 'Loại RAM', 'DDR5-4800', 1, 1, '2023-04-11 14:17:49', NULL),
(10, 4, 'Số khe ram', '2 khe', 1, 1, '2023-04-11 14:18:03', NULL),
(11, 4, 'Kích thước màn hình', '15.6 inches', 1, 1, '2023-04-11 14:18:17', NULL),
(12, 4, 'Công nghệ màn hình', 'IPS 250nits Anti-glare, 120Hz, 45% NTSC, Free-Sync, DC dimmer', 1, 1, '2023-04-11 14:18:30', NULL),
(13, 4, 'Pin', '3 Cell, 60Wh', 1, 1, '2023-04-11 14:18:46', NULL),
(14, 4, 'Hệ điều hành', 'Windows 11', 1, 1, '2023-04-11 14:18:57', NULL),
(15, 2, 'GPU', 'AMD rga 8 (AMD)', 1, 1, '2023-04-11 15:48:27', NULL),
(16, 1, 'CPU  1', '185.199.108.153', 1, 1, '2023-04-12 23:09:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` text NOT NULL,
  `address` varchar(500) NOT NULL,
  `phone` int(15) NOT NULL,
  `gender` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime DEFAULT current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `address`, `phone`, `gender`, `role`, `create_at`, `update_at`, `status`) VALUES
(1, 'Admin', 'admin@gmail.com', '25f9e794323b453885f5181f1b624d0b', '', 907090909, 1, 0, '2023-03-29 00:00:00', '2023-03-29 00:00:00', 1),
(8, 'Tiến Vũ', 'vuductien2908@gmail.com', '25f9e794323b453885f5181f1b624d0b', '182 Trần Hưng Đạo', 333669832, 1, 1, '2023-04-14 22:17:03', '2023-04-14 22:17:03', 0),
(9, 'Tiến Vũ', 'demo@123.com', '25f9e794323b453885f5181f1b624d0b', '182 Trần Hưng Đạo', 123456, 1, 1, '2023-04-15 11:50:41', '2023-04-15 11:50:41', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD KEY `creator` (`creator`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `creator` (`creator`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `promotion_id` (`promotion_id`),
  ADD KEY `payment_id` (`payment_id`),
  ADD KEY `approver` (`approver`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `order_id` (`order_id`);

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
  ADD KEY `category_id` (`category_id`),
  ADD KEY `brand_id` (`brand_id`),
  ADD KEY `creator` (`creator`);

--
-- Indexes for table `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `creator` (`creator`);

--
-- Indexes for table `specifications`
--
ALTER TABLE `specifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `creator` (`creator`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `promotions`
--
ALTER TABLE `promotions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `specifications`
--
ALTER TABLE `specifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `brands`
--
ALTER TABLE `brands`
  ADD CONSTRAINT `brands_ibfk_1` FOREIGN KEY (`creator`) REFERENCES `users` (`id`);

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`creator`) REFERENCES `users` (`id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`approver`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `products_ibfk_3` FOREIGN KEY (`creator`) REFERENCES `users` (`id`);

--
-- Constraints for table `promotions`
--
ALTER TABLE `promotions`
  ADD CONSTRAINT `promotions_ibfk_1` FOREIGN KEY (`creator`) REFERENCES `users` (`id`);

--
-- Constraints for table `specifications`
--
ALTER TABLE `specifications`
  ADD CONSTRAINT `specifications_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `specifications_ibfk_2` FOREIGN KEY (`creator`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
