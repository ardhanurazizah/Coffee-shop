-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 16, 2019 lúc 06:23 PM
-- Phiên bản máy phục vụ: 10.1.38-MariaDB
-- Phiên bản PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `coffeeshop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `id_cus` int(11) NOT NULL,
  `lastname` varchar(20) CHARACTER SET utf8 NOT NULL,
  `firstname` varchar(20) CHARACTER SET utf8 NOT NULL,
  `username` varchar(30) CHARACTER SET utf8 NOT NULL,
  `password` varchar(30) CHARACTER SET utf8 NOT NULL,
  `email` varchar(30) CHARACTER SET utf8 NOT NULL,
  `phone` varchar(12) CHARACTER SET utf8 DEFAULT NULL,
  `address` text CHARACTER SET utf8,
  `clocked` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`id_cus`, `lastname`, `firstname`, `username`, `password`, `email`, `phone`, `address`, `clocked`) VALUES
(1, 'Vu Tr', 'Gi', 'abcdef', '123456', 'vua@grm.com', '0903774503', '172 Le Thiet', 0),
(2, 'Do Tr', 'Hi', 'hieu5', '123abc', 'abc@gmail.com', '', 'cnsjcns', 0),
(3, 'Ch Qu', 'Vi', '5anhem', '123456', 'cndj@yahoo.com', '0123456789', '', 0),
(4, 'Le Vi', 'Hi', 'qwerty', '123456', 'fedhlfk@fgmi.com', '', '', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_cus`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `id_cus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
