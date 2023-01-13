-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 30, 2022 lúc 01:40 PM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `web_ban_hang_edit`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_account`
--

CREATE TABLE `admin_account` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `pass_word` varchar(255) DEFAULT NULL,
  `cookie` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `admin_account`
--

INSERT INTO `admin_account` (`id`, `user_name`, `pass_word`, `cookie`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'KHRbVhnZdSv$I13pZLAua&GSKH4OUQyYO8a25QLHk%Yn$prxaDMM$Ar4gN@P@aTuFKL9#eZvVgHm^qnImVdjjnLuHWg8$HBZQg6qYHDV1GrwSEjkQwXT2kwsbh2$&fc2cwu$ygRTZNlep4xrD3tiyPeOn13f2uGl64ecC8HRjY$CWVpnfWkB3oFbrXoWPi#1%edTjfyz');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `status_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `slug`, `status`, `create_at`, `update_at`, `status_delete`) VALUES
(112, 'Quần Jean Nam 1', 'Quan-Jean-Nam-1', 'Hiển Thị', '2022-03-25 10:26:44', '0000-00-00 00:00:00', 0),
(113, 'Áo Thun Nam', 'Ao-Thun-Nam', 'Hiển Thị', '2022-03-25 10:27:00', '0000-00-00 00:00:00', 0),
(114, 'Áo Sơ Mi Nam', 'Ao-So-Mi-Nam', 'Hiển Thị', '2022-03-25 10:27:00', '0000-00-00 00:00:00', 0),
(115, 'Quần KaKi Nam', 'Quan-KaKi-Nam', 'Hiển Thị', '2022-03-25 10:27:00', '0000-00-00 00:00:00', 0),
(116, 'Quần Short', 'Quan-Short', 'Hiển Thị', '2022-03-25 10:27:00', '0000-00-00 00:00:00', 0),
(117, 'Đồ Gia Đình', 'Do-Gia-Dinh', 'Hiển Thị', '2022-03-28 10:28:50', '0000-00-00 00:00:00', 0),
(118, 'Áo Thun Nữ', 'Ao-Thun-Nu', 'Hiển Thị', '2022-03-28 10:28:50', '0000-00-00 00:00:00', 0),
(119, 'Áo Sơ Mi Nữ', 'Ao-So-Mi-Nu', 'Hiển Thị', '2022-03-28 10:28:50', '0000-00-00 00:00:00', 0),
(120, 'Đầm, Váy', 'Dam,-Vay', 'Hiển Thị', '2022-03-28 10:28:50', '0000-00-00 00:00:00', 0),
(122, 'Đồ Thể Thao', 'Do-The-Thao', 'Hiển Thị', '2022-03-28 10:28:50', '0000-00-00 00:00:00', 0),
(123, 'Áo Ấm', 'Ao-Am', 'Hiển Thị', '2022-03-28 10:28:50', '0000-00-00 00:00:00', 0),
(124, 'Áo Khoác', 'Ao-Khoac', 'Hiển Thị', '2022-03-28 10:28:50', '0000-00-00 00:00:00', 0),
(125, 'Áo Phông', 'Ao-Phong', 'Hiển Thị', '2022-03-28 10:28:50', '0000-00-00 00:00:00', 0),
(126, 'Phước', 'Phuoc', 'Hiển Thị', '2022-03-28 10:28:50', '0000-00-00 00:00:00', 1),
(128, 'áo đá banh', 'ao-da-banh', 'Hiển Thị', '2022-03-28 10:28:50', '0000-00-00 00:00:00', 1),
(129, 'áo đá banh', 'ao-da-banh', 'Hiển Thị', '2022-03-28 10:28:50', '0000-00-00 00:00:00', 1),
(130, 'áo đá banh', 'ao-da-banh', 'Hiển Thị', '2022-03-28 10:28:50', '0000-00-00 00:00:00', 1),
(131, 'áo đá banh', 'ao-da-banh', 'Hiển Thị', '2022-03-28 10:28:50', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment_product`
--

CREATE TABLE `comment_product` (
  `id` int(11) NOT NULL,
  `id_product` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `name_user` varchar(255) NOT NULL,
  `content` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `comment_product`
--

INSERT INTO `comment_product` (`id`, `id_product`, `id_user`, `name_user`, `content`) VALUES
(14, 53, 31, 'b', 'hay qua');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `order_id` int(11) NOT NULL,
  `name_product` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `unit_price` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`order_id`, `name_product`, `product_id`, `quantity`, `unit_price`) VALUES
(92, 'Quần Jean Nam', 53, 10, 1699991.5),
(93, 'Combo đầm, váy mẹ và bé', 52, 2, 179998.2),
(94, 'Quần Jean Nam', 53, 2, 339998.3),
(95, 'Quần Jean Nam', 53, 5, 849995.75);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_product`
--

CREATE TABLE `order_product` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `create_at` datetime DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `total_mony` double DEFAULT NULL,
  `status_recieve` varchar(20) NOT NULL,
  `cancel_order` int(11) NOT NULL,
  `delete_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `price` double DEFAULT NULL,
  `img_product` varchar(255) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `descrip` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `production_company` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `name_category` varchar(255) NOT NULL,
  `pay` int(11) NOT NULL,
  `sale_product` int(10) NOT NULL,
  `status_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `img_product`, `quantity`, `descrip`, `production_company`, `create_at`, `update_at`, `category_id`, `name_category`, `pay`, `sale_product`, `status_delete`) VALUES
(50, 'Áo gia đình', 50000, 'ao-gia-dinh-AG0554-2.jpg', 0, 'Đồ mặc gia đình thoáng mát', 'Công Ty TNHH PHUOCMG', '2021-12-31 10:38:00', '2022-01-01 00:31:55', 117, 'Đồ Gia Đình', 8, 20, 0),
(51, 'Áo, váy gia đình', 59999, 'ao-vay-gia-dinh-ag0515-1m4G3-4UKwpv_simg_d0daf0_800x1200_max.jpg', 0, 'Đồ mặc gia đình thoáng mát', 'Công Ty TNHH PHUOCMG', '2021-12-31 10:40:01', '2022-01-01 00:32:09', 117, 'Đồ Gia Đình', 9, 10, 0),
(52, 'Combo đầm, váy mẹ và bé', 99999, 'combo-dam-cap-me-va-be-1m4G3-hKwaQm_simg_d0daf0_800x1200_max.jpg', 36, 'Đồ mặc gia đình đẹp, thoáng mát', 'Công Ty TNHH PHUOCMG', '2021-12-31 10:43:36', '0000-00-00 00:00:00', 117, 'Đồ Gia Đình', 12, 10, 0),
(53, 'Quần Jean Nam', 199999, '4.jpg', 109, 'Chất liệu vải tốt, đẹp thể hiện đẳng cấp đàn ông', 'Công Ty TNHH PHUOCMG', '2021-12-31 10:48:46', '0000-00-00 00:00:00', 112, 'Quần Jean Nam', 41, 15, 0),
(55, 'Áo ấm nam lông cừu', 400000, 'ao-am-nam-long-cuu.jpg', 0, 'Áo khoác nam quân sự hàng xịn chuẩn quân đội', 'Công Ty TNHH PHUOCMG', '2021-12-31 11:01:07', '0000-00-00 00:00:00', 123, 'Áo Ấm', 10, 5, 0),
(56, 'Áo Khoác nữ hoodie', 155000, 'ao-khoac-ni-hoodie.jpg', 0, 'Chất liệu vải mềm, rất ấm', 'Công Ty TNHH PHUOCMG', '2021-12-31 11:05:37', '0000-00-00 00:00:00', 124, 'Áo Khoác', 8, 20, 0),
(57, 'Áo thun nữ', 35000, '1.jpg', 13, 'Chất liệu vải tốt, rộng thoáng mát', 'Công Ty TNHH PHUOCMG', '2021-12-31 22:09:34', '0000-00-00 00:00:00', 118, 'Áo Thun Nữ', 2, 25, 0),
(58, 'Áo thun nữ', 39000, 'ao-thun-ao-phong-nu-eiffel-ca-tinh-msat28-1m4G3-LpJZdC_simg_d0daf0_800x1200_max.jpg', 0, 'Mặc rộng thoáng mát', 'Công Ty TNHH PHUOCMG', '2022-01-01 08:51:37', '0000-00-00 00:00:00', 118, 'Áo Thun Nữ', 15, 50, 0),
(59, 'Áo thun nữ', 50000, 'ao-thu-ngua-mini-1m4G3-57c588_simg_d0daf0_800x1200_max.jpg', 7, 'Chống nắng', 'Công Ty TNHH PHUOCMG', '2022-01-02 09:15:42', '0000-00-00 00:00:00', 118, 'Áo Thun Nữ', 3, 10, 0),
(61, 'Quần KaKi Nam', 50000, 'cu-cai-quan-kaki-thun-jogger-thoi-trang-mau-kem-qg06-1m4G3-7ec3c2_simg_d0daf0_800x1200_max.jpg', 14, 'đẹp', 'Công Ty TNHH PHUOCMG', '2022-01-02 10:52:52', '0000-00-00 00:00:00', 115, 'Quần KaKi Nam', 1, 50, 0),
(63, 'Quần Jean Nam', 200000, 'quan-jean-nam1.png', 40, 'Chất liệu vải tốt', 'Công Ty TNHH PHUOCMG ', '2022-01-15 10:36:28', '0000-00-00 00:00:00', 112, 'Quần Jean Nam', 10, 10, 0),
(64, 'Quần Jean Nam', 210000, 'quan-jean-nam2.jpg', 50, 'Chất liệu vải tốt', 'Công Ty TNHH PHUOCMG ', '2022-01-15 10:37:07', '0000-00-00 00:00:00', 112, 'Quần Jean Nam', 0, 10, 0),
(65, 'Quần Jean Nam', 250000, 'quan-jean-nam3.jpg', 50, 'Chất liệu vải tốt', 'Công Ty TNHH PHUOCMG ', '2022-01-15 10:37:39', '0000-00-00 00:00:00', 112, 'Quần Jean Nam', 0, 10, 0),
(66, 'Quần Jean Nam', 500000, 'quan-jean-nam5.jpg', 99, 'Chất liệu vải tốt', 'Công Ty TNHH PHUOCMG', '2022-01-16 19:51:44', '0000-00-00 00:00:00', 112, 'Quần Jean Nam', 1, 25, 0),
(67, 'Áo Thun Nam', 60000, 'ao-thun-nam1.jpg', 100, 'Chất liệu vải tốt', 'Công Ty TNHH PHUOCMG', '2022-01-16 19:59:21', '0000-00-00 00:00:00', 113, 'Áo Thun Nam', 0, 10, 0),
(68, 'Áo Thun Nam', 70000, 'ao-thun-nam2.jpg', 100, 'Chất liệu vải tốt', 'Công Ty TNHH PHUOCMG', '2022-01-16 19:59:51', '0000-00-00 00:00:00', 113, 'Áo Thun Nam', 0, 10, 0),
(69, 'Áo Thun Nam', 80000, 'ao-thun-nam3.jpg', 100, 'Chất liệu vải tốt', 'Công Ty TNHH PHUOCMG', '2022-01-16 20:04:48', '0000-00-00 00:00:00', 113, 'Áo Thun Nam', 0, 10, 0),
(70, 'Áo Thun Nam', 90000, 'ao-thun-nam4.jpg', 100, 'Chất liệu vải tốt', 'Công Ty TNHH PHUOCMG', '2022-01-16 20:04:58', '0000-00-00 00:00:00', 113, 'Áo Thun Nam', 0, 10, 0),
(71, 'Áo Thun Nam', 50000, 'ao-thun-nam5.jpg', 100, 'Chất liệu vải tốt', 'Công Ty TNHH PHUOCMG', '2022-01-16 20:05:12', '0000-00-00 00:00:00', 113, 'Áo Thun Nam', 0, 10, 0),
(72, 'Áo Thun Nam', 55000, 'ao-thun-nam6.jpg', 100, 'Chất liệu vải tốt', 'Công Ty TNHH PHUOCMG', '2022-01-16 20:05:37', '0000-00-00 00:00:00', 113, 'Áo Thun Nam', 0, 10, 0),
(73, 'Áo Sơ Mi Nam', 55000, 'ao-so-mi-nam1.jpg', 100, 'Chất liệu vải tốt', 'Công Ty TNHH PHUOCMG', '2022-01-16 20:10:54', '0000-00-00 00:00:00', 114, 'Áo Sơ Mi Nam', 0, 10, 0),
(74, 'Áo Sơ Mi Nam', 65000, 'ao-so-mi-nam2.jpeg', 99, 'Chất liệu vải tốt', 'Công Ty TNHH PHUOCMG', '2022-01-16 20:11:08', '0000-00-00 00:00:00', 114, 'Áo Sơ Mi Nam', 1, 10, 0),
(75, 'Áo Sơ Mi Nam', 75000, 'ao-so-mi-nam3.jpg', 100, 'Chất liệu vải tốt', 'Công Ty TNHH PHUOCMG', '2022-01-16 20:11:33', '0000-00-00 00:00:00', 114, 'Áo Sơ Mi Nam', 0, 10, 0),
(76, 'Áo Sơ Mi Nam', 85000, 'ao-so-mi-nam4.jpeg', 100, 'Chất liệu vải tốt', 'Công Ty TNHH PHUOCMG', '2022-01-16 20:11:51', '0000-00-00 00:00:00', 114, 'Áo Sơ Mi Nam', 0, 10, 0),
(77, 'Áo Sơ Mi Nam', 95000, 'ao-so-mi-nam5.jpg', 100, 'Chất liệu vải tốt', 'Công Ty TNHH PHUOCMG', '2022-01-16 20:12:08', '0000-00-00 00:00:00', 114, 'Áo Sơ Mi Nam', 0, 10, 0),
(78, 'Áo Sơ Mi Nam', 45000, 'ao-so-mi-nam-phong-cach-phoi-mau-1m4G3-BSZiod.jpg', 100, 'Chất liệu vải tốt', 'Công Ty TNHH PHUOCMG', '2022-01-16 20:12:30', '0000-00-00 00:00:00', 114, 'Áo Sơ Mi Nam', 0, 10, 0),
(79, 'Quần KaKi Nam', 450000, 'quan-kaki-nam-lich-lam-1m4G3-NvjQo7_simg_d0daf0_800x1200_max.jpg', 100, 'Chất liệu vải tốt', 'Công Ty TNHH PHUOCMG', '2022-01-16 20:15:21', '0000-00-00 00:00:00', 115, 'Quần KaKi Nam', 0, 10, 0),
(80, 'Quần KaKi Nam', 460000, 'quan-kaki-nam2.jpg', 99, 'Chất liệu vải tốt', 'Công Ty TNHH PHUOCMG', '2022-01-16 20:17:24', '0000-00-00 00:00:00', 115, 'Quần KaKi Nam', 1, 10, 0),
(81, 'Quần KaKi Nam', 470000, 'quan-kaki-nam3.jpg', 100, 'Chất liệu vải tốt', 'Công Ty TNHH PHUOCMG', '2022-01-16 20:17:49', '0000-00-00 00:00:00', 115, 'Quần KaKi Nam', 0, 10, 0),
(82, 'Quần KaKi Nam', 480000, 'quan-kaki-nam4.jpg', 100, 'Chất liệu vải tốt', 'Công Ty TNHH PHUOCMG', '2022-01-16 20:18:15', '0000-00-00 00:00:00', 115, 'Quần KaKi Nam', 0, 10, 0),
(83, 'Quần Short', 52000, 'quan-short-nam1.jpeg', 100, 'Chất liệu vải tốt', 'Công Ty TNHH PHUOCMG', '2022-01-16 20:19:42', '0000-00-00 00:00:00', 116, 'Quần Short', 0, 10, 0),
(84, 'Quần Short', 62000, 'quan-short-nam2.jpg', 100, 'Chất liệu vải tốt', 'Công Ty TNHH PHUOCMG', '2022-01-16 20:20:11', '0000-00-00 00:00:00', 116, 'Quần Short', 0, 10, 0),
(85, 'Quần Short', 72000, 'quan-short-nam3.jpg', 100, 'Chất liệu vải tốt', 'Công Ty TNHH PHUOCMG', '2022-01-16 20:20:32', '0000-00-00 00:00:00', 116, 'Quần Short', 0, 10, 0),
(86, 'Quần Short', 82000, 'quan-short-nam4.jpg', 100, 'Chất liệu vải tốt', 'Công Ty TNHH PHUOCMG', '2022-01-16 20:20:47', '0000-00-00 00:00:00', 116, 'Quần Short', 0, 10, 0),
(87, 'Quần Short', 92000, 'quan-short-nam5.jpg', 100, 'Chất liệu vải tốt', 'Công Ty TNHH PHUOCMG', '2022-01-16 20:21:00', '0000-00-00 00:00:00', 116, 'Quần Short', 0, 10, 0),
(95, 'Áo Sơ Mi Nữ', 205000, 'ao-so-mi-nu-vien-co-hoa-31.jpg', 100, 'Chất liệu vải tốt', 'Công Ty TNHH PHUOCMG', '2022-01-16 20:32:49', '2022-01-16 20:34:41', 119, 'Áo Sơ Mi Nữ', 0, 10, 0),
(96, 'Áo Sơ Mi Nữ', 215000, 'ao-so-mi-nu1.jpg', 100, 'Chất liệu vải tốt', 'Công Ty TNHH PHUOCMG', '2022-01-16 20:33:03', '2022-01-16 20:34:11', 119, 'Áo Sơ Mi Nữ', 0, 10, 0),
(97, 'Áo Sơ Mi Nữ', 255000, 'ao-so-mi-nu4.jpg', 100, 'Chất liệu vải tốt', 'Công Ty TNHH PHUOCMG', '2022-01-16 20:33:39', '0000-00-00 00:00:00', 119, 'Áo Sơ Mi Nữ', 0, 10, 0),
(98, 'Đồ Gia Đình', 59000, 'do-gia-dinh1.jpg', 100, 'Chất liệu vải tốt', 'Công Ty TNHH PHUOCMG', '2022-01-16 20:37:57', '0000-00-00 00:00:00', 117, 'Đồ Gia Đình', 0, 10, 0),
(99, 'Đồ Gia Đình', 69000, 'do-gia-dinh1.jpg', 100, 'Chất liệu vải tốt', 'Công Ty TNHH PHUOCMG', '2022-01-16 20:38:06', '0000-00-00 00:00:00', 117, 'Đồ Gia Đình', 0, 10, 0),
(100, 'Đồ Gia Đình', 79000, 'do-gia-dinh2.jpg', 100, 'Chất liệu vải tốt', 'Công Ty TNHH PHUOCMG', '2022-01-16 20:38:36', '0000-00-00 00:00:00', 117, 'Đồ Gia Đình', 0, 10, 0),
(101, 'Áo Thun Nữ', 79000, 'ao-thun-nu1.jpg', 100, 'Chất liệu vải tốt', 'Công Ty TNHH PHUOCMG', '2022-01-16 20:39:06', '0000-00-00 00:00:00', 118, 'Áo Thun Nữ', 0, 10, 0),
(102, 'Áo Thun Nữ', 89000, 'do-gia-dinh2.jpg', 100, 'Chất liệu vải tốt', 'Công Ty TNHH PHUOCMG', '2022-01-16 20:39:23', '0000-00-00 00:00:00', 118, 'Áo Thun Nữ', 0, 10, 0),
(103, 'Áo Sơ Mi Nữ', 89000, 'ao-so-mi-nu1.jpg', 100, 'Chất liệu vải tốt', 'Công Ty TNHH PHUOCMG', '2022-01-16 20:40:11', '0000-00-00 00:00:00', 119, 'Áo Sơ Mi Nữ', 0, 10, 0),
(104, 'Áo Sơ Mi Nữ', 99000, 'ao-so-mi-nu2.jpg', 100, 'Chất liệu vải tốt', 'Công Ty TNHH PHUOCMG', '2022-01-16 20:40:30', '0000-00-00 00:00:00', 119, 'Áo Sơ Mi Nữ', 0, 10, 0),
(106, 'Váy', 199000, 'dam-vay-nu1.jpg', 100, 'Chất liệu vải đẹp', 'Công Ty TNHH PHUOCMG', '2022-01-16 21:02:44', '0000-00-00 00:00:00', 120, 'Đầm, Váy', 0, 10, 0),
(107, 'Váy', 299999, 'dam-vay-nu2.jpg', 100, 'Chất liệu vải tốt', 'Công Ty TNHH PHUOCMG', '2022-01-16 21:04:20', '0000-00-00 00:00:00', 120, 'Đầm, Váy', 0, 10, 0),
(108, 'Váy', 255000, 'dam-vay-nu1.jpg', 100, 'Chất liệu vải tốt', 'Công Ty TNHH PHUOCMG', '2022-01-16 21:06:48', '0000-00-00 00:00:00', 120, 'Đầm, Váy', 0, 10, 0),
(109, 'Váy', 265000, 'dam-vay-nu3.jpg', 100, 'Chất liệu vải tốt', 'Công Ty TNHH PHUOCMG', '2022-01-16 21:07:02', '0000-00-00 00:00:00', 120, 'Đầm, Váy', 0, 10, 0),
(110, 'Váy', 275000, 'dam-vay-nu4.jpg', 100, 'Chất liệu vải tốt', 'Công Ty TNHH PHUOCMG', '2022-01-16 21:09:24', '0000-00-00 00:00:00', 120, 'Đầm, Váy', 0, 10, 0),
(111, 'Áo Len Nữ', 200000, 'ao-len-nu.jpg', 9, '11', 'Công Ty TNHH PHUOCMG', '2022-01-20 00:45:41', '0000-00-00 00:00:00', 125, 'Áo Phông', 1, 10, 0),
(112, 'áo dài', 200000, 'conong.png', 10, '.ccc', 'Công Ty TNHH PHUOCMG', '2022-01-20 00:54:10', '2022-01-20 22:32:31', 113, 'Áo Thun Nam', 0, 10, 1),
(113, 'TEST1', 200000, 'tien1.jpg', 10, 'kjkmmk', 'Công Ty TNHH PHUOCMG', '2022-01-20 09:38:38', '0000-00-00 00:00:00', 127, 'TEST', 0, 10, 1),
(114, 'TEST2', 500000, 'tien2.jpg', 100, 'huhuhuhu', 'Công Ty TNHH PHUOCMG', '2022-01-20 10:32:12', '0000-00-00 00:00:00', 127, 'TEST', 0, 10, 1),
(115, 'quần thun', 200000, '6.jpg', 10, 'èooe', 'phước', '2022-01-21 08:13:30', '0000-00-00 00:00:00', 125, 'Áo Phông', 0, 10, 1),
(116, 'quần thun', 200000, 'h1.png', 10, 'ìeiejeije', 'Công Ty TNHH PHUOCMG', '2022-01-21 08:23:04', '0000-00-00 00:00:00', 125, 'Áo Phông', 0, 10, 1),
(117, 'Quần Short', 500000, '5.jpg', 100, 'kk', 'Công Ty TNHH PHUOCMG', '2022-01-21 10:41:15', '0000-00-00 00:00:00', 1, '', 0, 10, 0),
(118, 'Quần Short', 500000, '246824978_3013829235559521_1342044413971316351_n.jpg', 10, 'knknnk', 'Công Ty TNHH PHUOCMG', '2022-01-21 10:48:20', '0000-00-00 00:00:00', 1, '', 0, 1000, 0),
(119, 'Sharecode.vn', 10000, 'login.png', 150, 'sharecode.vn', 'Công Ty TNHH PHUOCMG', '2022-01-22 14:44:45', '0000-00-00 00:00:00', 132, 'Sharecode.vn', 0, 10, 1),
(120, 'Quan au', 200000, 'z3287773108038_6ff8b724d9624e64672f9e3ca44caa31.jpg', 122, 'dep', 'VN', '2022-03-25 19:00:50', '0000-00-00 00:00:00', 116, 'Quần Short', 0, 10, 0),
(121, 'quan sip', 3000000, 'dFqvmh.png', 444, 'mat lam', 'VN', '2022-03-25 20:14:10', '0000-00-00 00:00:00', 116, 'Quần Short', 0, 10, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `name_slider` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `slider_img` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `slider`
--

INSERT INTO `slider` (`id`, `name_slider`, `slider_img`, `create_at`, `update_at`, `status`) VALUES
(15, '2', '100187.png', '2022-03-25 18:50:00', '0000-00-00 00:00:00', 'Hiển Thị');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_account`
--

CREATE TABLE `user_account` (
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `email_account` varchar(255) DEFAULT NULL,
  `pass_word` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `address_user` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `active_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user_account`
--

INSERT INTO `user_account` (`id`, `name`, `email_account`, `pass_word`, `phone_number`, `address_user`, `create_at`, `update_at`, `active_status`) VALUES
(30, 'Văn A', 'vana@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1111111111111111', 'Ha Noi', '2022-03-25 18:41:25', '0000-00-00 00:00:00', 'Hoạt Động'),
(31, 'b', 'b@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1111111111111111', 'Ha Noi', '2022-03-25 18:58:44', '0000-00-00 00:00:00', 'Hoạt Động');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin_account`
--
ALTER TABLE `admin_account`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comment_product`
--
ALTER TABLE `comment_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_user` (`id_user`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_id`,`product_id`);

--
-- Chỉ mục cho bảng `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin_account`
--
ALTER TABLE `admin_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT cho bảng `comment_product`
--
ALTER TABLE `comment_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT cho bảng `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `user_account`
--
ALTER TABLE `user_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `comment_product`
--
ALTER TABLE `comment_product`
  ADD CONSTRAINT `comment_product_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `comment_product_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user_account` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
