-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2020 at 01:59 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data`
--

-- --------------------------------------------------------

--
-- Table structure for table `admingroup`
--

CREATE TABLE `admingroup` (
  `ma` int(10) NOT NULL,
  `ten` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `macha` int(10) DEFAULT NULL,
  `trangthai` int(10) DEFAULT NULL,
  `ngaytao` datetime DEFAULT NULL,
  `ngaycapnhap` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `adminstration`
--

CREATE TABLE `adminstration` (
  `ma` int(10) NOT NULL,
  `ten` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tendangnhap` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `matkhau` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hinh` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `manhom` int(10) DEFAULT NULL,
  `trangthai` int(10) DEFAULT NULL COMMENT '1 hiển thị, 2 ẩn, -1 xóa',
  `ngaytao` datetime DEFAULT NULL,
  `ngaycapnhap` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `adminstration`
--

INSERT INTO `adminstration` (`ma`, `ten`, `tendangnhap`, `matkhau`, `hinh`, `manhom`, `trangthai`, `ngaytao`, `ngaycapnhap`) VALUES
(3, 'khanh', 'khanhga2086', '123', 'images/avt.jpg', 2, 1, NULL, NULL),
(4, 'hong', 'hong123', '123', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin_contact`
--

CREATE TABLE `admin_contact` (
  `ma` int(10) NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ten` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tieude` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `noidung` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_news`
--

CREATE TABLE `admin_news` (
  `ma` int(10) NOT NULL,
  `ten` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hinh` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mota` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chitiet` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alias` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `manhomtin` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin_news`
--

INSERT INTO `admin_news` (`ma`, `ten`, `hinh`, `mota`, `chitiet`, `alias`, `manhomtin`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL),
(2, NULL, NULL, '', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin_newsgroup`
--

CREATE TABLE `admin_newsgroup` (
  `ma` int(10) NOT NULL,
  `ten` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `macha` int(10) DEFAULT NULL,
  `hinh` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mota` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alias` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_order`
--

CREATE TABLE `admin_order` (
  `ma` int(10) NOT NULL,
  `sodonhang` int(50) DEFAULT NULL,
  `ngaytao` datetime DEFAULT NULL,
  `ngaygiao` datetime DEFAULT NULL,
  `tongtien` int(50) DEFAULT NULL,
  `tennhan` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `emailnhan` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diachinhan` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sdtnhan` int(11) DEFAULT NULL,
  `tenmua` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `emailmua` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diachimua` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sdtmua` int(11) DEFAULT NULL,
  `trangthaidonhang` int(10) DEFAULT NULL,
  `thanhtoan` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vanchuyen` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_permission`
--

CREATE TABLE `admin_permission` (
  `iduser` int(50) NOT NULL,
  `machucnang` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin_permission`
--

INSERT INTO `admin_permission` (`iduser`, `machucnang`) VALUES
(3, 1),
(3, 2),
(3, 5),
(3, 6),
(3, 7),
(3, 8),
(3, 9),
(3, 12),
(3, 13),
(3, 15),
(3, 17),
(3, 19),
(3, 20),
(3, 21),
(3, 22),
(3, 23),
(3, 26),
(3, 27),
(3, 28),
(3, 29),
(3, 30),
(3, 31);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `ma` int(10) NOT NULL,
  `ten` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `macha` int(30) DEFAULT NULL,
  `hinh` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mota` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alias` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`ma`, `ten`, `macha`, `hinh`, `mota`, `alias`) VALUES
(1, 'Loa', NULL, NULL, NULL, NULL),
(2, 'Iphone', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `details_order`
--

CREATE TABLE `details_order` (
  `masanpham` int(10) NOT NULL,
  `mahoadon` int(10) DEFAULT NULL,
  `soluong` int(10) DEFAULT NULL,
  `gia` int(10) DEFAULT NULL,
  `giamgia` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dynamic`
--

CREATE TABLE `dynamic` (
  `ma` int(50) NOT NULL,
  `ten` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `icon` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `macha` int(50) DEFAULT NULL,
  `trangthai` int(50) DEFAULT NULL,
  `truycap` int(50) DEFAULT NULL,
  `hienmenu` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dynamic`
--

INSERT INTO `dynamic` (`ma`, `ten`, `link`, `icon`, `macha`, `trangthai`, `truycap`, `hienmenu`) VALUES
(1, 'Trang chủ', '?controller=system&action=home', NULL, 0, 1, 1, 1),
(2, 'Sản phẩm', NULL, NULL, 0, 1, 1, 1),
(5, 'Nhà cung cấp', '?controller=suplier&action=index', NULL, 2, 1, 1, 1),
(6, 'Danh mục', '?controller=category&action=index', NULL, 2, 1, 1, 1),
(7, 'Thượng hiệu', '?controller=trademark&action=index', NULL, 2, 1, 1, 1),
(8, 'Đơn hàng', NULL, NULL, 0, 1, 1, 1),
(9, 'Người dùng', NULL, NULL, 0, 1, 1, 1),
(12, 'Danh sách sản phẩm', '?controller=products&action=index', NULL, 2, 1, 1, 1),
(13, 'Thêm sản phẩm', '?controller=products&action=product_add', NULL, 2, 1, 1, 0),
(15, 'Thêm mới nhà cung cấp', '?controller=suplier&action=suplier_add', NULL, 2, 1, 1, 0),
(17, 'Thêm mới danh mục', '?controller=category&action=category_add', NULL, 2, 1, 1, 0),
(19, 'Thêm mới thương hiệu', '?controller=trademark&action=trademark_add', NULL, 2, 1, 1, 0),
(20, 'Danh sách đơn hàng', '?controller=admin_order&action=index', NULL, 8, 1, 1, 1),
(21, 'Cập nhập đơn hàng', '?controller=admin_order&action=admin_order_add', NULL, 8, 1, 1, 1),
(22, 'Phân quyền', '?controller=role&action=index', NULL, 9, 1, 1, 1),
(23, 'Đăng xuất', '?controller=user&action=logout', NULL, 9, 1, 1, 0),
(26, 'Đăng nhập', '?controller=user&action=login', NULL, 9, 1, 1, 0),
(27, 'Cấp quyền', '?controller=role&action=role_level', NULL, 9, 1, 1, 0),
(28, 'Sửa sản phẩm', 'controller=products&action=product_repair', NULL, 2, 1, 1, 0),
(29, 'Xóa sản phẩm', '?controller=products&action=product_remove', NULL, 2, 1, 1, 0),
(30, 'Hiển thị', '?controller=products&action=product_show', NULL, 2, 1, 1, 0),
(31, 'Ẩn', '?controller=products&action=product_hidden', NULL, 2, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ma` int(50) NOT NULL,
  `mahienthi` int(50) DEFAULT NULL,
  `madanhmuc` int(50) DEFAULT NULL,
  `manhacungcap` int(50) DEFAULT NULL,
  `mathuonghieu` int(50) DEFAULT NULL,
  `ten` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hinh` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `soluong` int(50) DEFAULT NULL,
  `dongia` int(50) DEFAULT NULL,
  `mota` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chitiet` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hinhchitiet` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trangthai` int(50) DEFAULT NULL,
  `alias` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ma`, `mahienthi`, `madanhmuc`, `manhacungcap`, `mathuonghieu`, `ten`, `hinh`, `soluong`, `dongia`, `mota`, `chitiet`, `hinhchitiet`, `trangthai`, `alias`) VALUES
(69, 692, 1, 2, 5, '2', '', 1, 1, '2', '11', '', 0, ''),
(71, 71, 1, 2, 5, '2', 'public/images/file_27_87757_1596856451.png', 1, 1, '2', '11', 'public/images/file_247_47717_1596856451.png', 1, ''),
(72, 72, 2, 2, 5, '123', '', 1, 21212, '1', '11', '', 0, ''),
(683, 1231231, 2, 3, 5, '312', '', 1000, 123, '121', '21', '', 0, ''),
(684, 12312311, 1, 2, 5, '2', '', 10002, 1, '123', '12', '', 0, ''),
(687, 2147483647, 1, 2, 6, '3', './public/images/file_141_92013_1596867452.png', 1000, 1, '2', '1', './public/images/file_168_2629_1596867452.png', 0, ''),
(688, 2147483647, 1, 3, 5, '2', './public/images/file_334_64079_1596867982.png', 1000, 12, '2', '1212', './public/images/file_61_1213_1596867982.png', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `suplier`
--

CREATE TABLE `suplier` (
  `ma` int(10) NOT NULL,
  `ten` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diachi` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sdt` int(11) DEFAULT NULL,
  `trangthai` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `suplier`
--

INSERT INTO `suplier` (`ma`, `ten`, `diachi`, `email`, `sdt`, `trangthai`) VALUES
(2, 'Thương mại điện tử', 'Tân phú', NULL, NULL, 1),
(3, 'Tài chính ngân hàng', NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `trademark`
--

CREATE TABLE `trademark` (
  `ma` int(10) NOT NULL,
  `ten` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hinh` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mota` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `trademark`
--

INSERT INTO `trademark` (`ma`, `ten`, `hinh`, `mota`, `alias`) VALUES
(5, 'Samxung', NULL, NULL, NULL),
(6, 'Galaxy', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admingroup`
--
ALTER TABLE `admingroup`
  ADD PRIMARY KEY (`ma`);

--
-- Indexes for table `adminstration`
--
ALTER TABLE `adminstration`
  ADD PRIMARY KEY (`ma`);

--
-- Indexes for table `admin_contact`
--
ALTER TABLE `admin_contact`
  ADD PRIMARY KEY (`ma`);

--
-- Indexes for table `admin_news`
--
ALTER TABLE `admin_news`
  ADD PRIMARY KEY (`ma`);

--
-- Indexes for table `admin_newsgroup`
--
ALTER TABLE `admin_newsgroup`
  ADD PRIMARY KEY (`ma`);

--
-- Indexes for table `admin_order`
--
ALTER TABLE `admin_order`
  ADD PRIMARY KEY (`ma`);

--
-- Indexes for table `admin_permission`
--
ALTER TABLE `admin_permission`
  ADD PRIMARY KEY (`iduser`,`machucnang`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`ma`);

--
-- Indexes for table `details_order`
--
ALTER TABLE `details_order`
  ADD PRIMARY KEY (`masanpham`);

--
-- Indexes for table `dynamic`
--
ALTER TABLE `dynamic`
  ADD PRIMARY KEY (`ma`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ma`);

--
-- Indexes for table `suplier`
--
ALTER TABLE `suplier`
  ADD PRIMARY KEY (`ma`);

--
-- Indexes for table `trademark`
--
ALTER TABLE `trademark`
  ADD PRIMARY KEY (`ma`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admingroup`
--
ALTER TABLE `admingroup`
  MODIFY `ma` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `adminstration`
--
ALTER TABLE `adminstration`
  MODIFY `ma` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `admin_contact`
--
ALTER TABLE `admin_contact`
  MODIFY `ma` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin_news`
--
ALTER TABLE `admin_news`
  MODIFY `ma` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin_newsgroup`
--
ALTER TABLE `admin_newsgroup`
  MODIFY `ma` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin_order`
--
ALTER TABLE `admin_order`
  MODIFY `ma` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `ma` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `details_order`
--
ALTER TABLE `details_order`
  MODIFY `masanpham` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dynamic`
--
ALTER TABLE `dynamic`
  MODIFY `ma` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1224;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ma` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=689;

--
-- AUTO_INCREMENT for table `suplier`
--
ALTER TABLE `suplier`
  MODIFY `ma` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `trademark`
--
ALTER TABLE `trademark`
  MODIFY `ma` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
