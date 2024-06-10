-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th6 06, 2024 lúc 08:11 AM
-- Phiên bản máy phục vụ: 8.0.36
-- Phiên bản PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `php1_wd19303`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pc09326_departments`
--

CREATE TABLE `pc09326_departments` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `status` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Đang đổ dữ liệu cho bảng `pc09326_departments`
--

INSERT INTO `pc09326_departments` (`id`, `name`, `status`) VALUES
(1, 'Human Resources', 1),
(2, 'Finance', 1),
(3, 'Marketing', 1),
(4, 'Sales', 1),
(5, 'IT', 1),
(6, 'Customer Service', 1),
(7, 'Research and Development', 1),
(8, 'Operations', 1),
(9, 'Purchasing', 1),
(10, 'Logistics', 1),
(11, 'Quality Assurance', 1),
(12, 'Legal', 1),
(13, 'Administration', 1),
(14, 'Production', 1),
(15, 'Product Management', 1),
(16, 'Design', 1),
(17, 'Engineering', 1),
(18, 'Corporate Communications', 1),
(19, 'Public Relations', 1),
(20, 'Investor Relations', 1),
(21, 'Risk Management', 1),
(22, 'Business Development', 1),
(23, 'Strategic Planning', 1),
(24, 'Facilities Management', 1),
(25, 'Security', 1),
(26, 'Training and Development', 1),
(27, 'Environmental Health and Safety', 1),
(28, 'Supply Chain Management', 1),
(29, 'Information Security', 1),
(30, 'Compliance', 1),
(31, 'Audit', 1),
(32, 'Accounting', 1),
(33, 'Payroll', 1),
(34, 'Technical Support', 1),
(36, 'Innovation', 1),
(37, 'Talent Acquisition', 1),
(38, 'Employee Relations', 1),
(39, 'Compensation and Benefits', 1),
(40, 'Diversity and Inclusion', 1),
(41, 'Corporate Social Responsibility', 1),
(42, 'Event Management', 1),
(43, 'Merchandising', 1),
(45, 'Media Relations', 1),
(47, 'Customer Insights', 1),
(48, 'E-commerce', 1),
(63, 'Đào Tạo', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pc09326_employee`
--

CREATE TABLE `pc09326_employee` (
  `id` int NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `code` varchar(7) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `department_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Đang đổ dữ liệu cho bảng `pc09326_employee`
--

INSERT INTO `pc09326_employee` (`id`, `firstname`, `lastname`, `code`, `department_id`) VALUES
(1, 'John', 'Doe', 'EMP001', 101),
(2, 'Jane', 'Smith', 'EMP002', 102),
(3, 'Jim', 'Beam', 'EMP003', 103),
(4, 'Jill', 'Valentine', 'EMP004', 104),
(5, 'Jack', 'Sparrow', 'EMP005', 105),
(6, 'Jessica', 'Jones', 'EMP006', 101),
(7, 'Jerry', 'Seinfeld', 'EMP007', 102),
(8, 'Janet', 'Jackson', 'EMP008', 103),
(9, 'Jacob', 'Black', 'EMP009', 104),
(10, 'Jenna', 'Marbles', 'EMP010', 105),
(11, 'Jordan', 'Belfort', 'EMP011', 101),
(12, 'Jasmine', 'Rice', 'EMP012', 102),
(13, 'Jon', 'Snow', 'EMP013', 103),
(14, 'Jamie', 'Lannister', 'EMP014', 104),
(15, 'Joffrey', 'Baratheon', 'EMP015', 105),
(16, 'Jeff', 'Bezos', 'EMP016', 101),
(17, 'Jennifer', 'Lawrence', 'EMP017', 102),
(18, 'Jake', 'Peralta', 'EMP018', 103),
(19, 'Judy', 'Hopps', 'EMP019', 104),
(20, 'Jim', 'Halpert', 'EMP020', 105),
(21, 'James', 'Bond', 'EMP021', 101),
(22, 'Julia', 'Roberts', 'EMP022', 102),
(23, 'Justin', 'Timberlake', 'EMP023', 103),
(24, 'Jared', 'Leto', 'EMP024', 104),
(25, 'Jason', 'Statham', 'EMP025', 105),
(26, 'Joan', 'Holloway', 'EMP026', 101),
(27, 'Jay', 'Gatsby', 'EMP027', 102),
(28, 'John', 'Wick', 'EMP028', 103),
(29, 'James', 'Franco', 'EMP029', 104),
(30, 'Jaden', 'Smith', 'EMP030', 105),
(44, 'Nguyễn', 'Quốc Anh', 'EMP030', 108);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pc09326_products`
--

CREATE TABLE `pc09326_products` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Đang đổ dữ liệu cho bảng `pc09326_products`
--

INSERT INTO `pc09326_products` (`id`, `name`, `description`, `image`) VALUES
(1, 'Product 1', 'This is the description for Product 1', 'product1.jpg'),
(2, 'Product 2', 'This is the description for Product 2', 'product2.jpg'),
(3, 'Product 3', 'This is the description for Product 3', 'product3.jpg'),
(4, 'Product 4', 'This is the description for Product 4', 'product4.jpg'),
(5, 'Product 5', 'This is the description for Product 5', 'product5.jpg'),
(6, 'Product 6', 'This is the description for Product 6', 'product6.jpg'),
(7, 'Product 7', 'This is the description for Product 7', 'product7.jpg'),
(8, 'Product 8', 'This is the description for Product 8', 'product8.jpg'),
(9, 'Product 9', 'This is the description for Product 9', 'product9.jpg'),
(10, 'Product 10', 'This is the description for Product 10', 'product10.jpg'),
(11, 'Product 11', 'This is the description for Product 11', 'product11.jpg'),
(12, 'Product 12', 'This is the description for Product 12', 'product12.jpg'),
(13, 'Product 13', 'This is the description for Product 13', 'product13.jpg'),
(14, 'Product 14', 'This is the description for Product 14', 'product14.jpg'),
(15, 'Product 15', 'This is the description for Product 15', 'product15.jpg'),
(16, 'Product 16', 'This is the description for Product 16', 'product16.jpg'),
(17, 'Product 17', 'This is the description for Product 17', 'product17.jpg'),
(18, 'Product 18', 'This is the description for Product 18', 'product18.jpg'),
(19, 'Product 19', 'This is the description for Product 19', 'product19.jpg'),
(20, 'Product 20', 'This is the description for Product 20', 'product20.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pc09326_users`
--

CREATE TABLE `pc09326_users` (
  `id` int NOT NULL,
  `name` varchar(60) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Đang đổ dữ liệu cho bảng `pc09326_users`
--

INSERT INTO `pc09326_users` (`id`, `name`, `email`, `password`, `avatar`) VALUES
(1, 'Nguyễn Quốc Anh', 'Nguyenquocanh25115@gmail.com', '$2y$10$aAbv6RkfFW4qL4tozQabTuTbQ5Gw2PHi/SY1KpWhClyd2WuP52oou', 'avatar.jpg\r\n'),
(19, 'Quốc Anh', 'NQA@gmail.com', '$2y$10$cpRDqrXFfkJ.BbTaEPeEme3XAlbmf9R8sMgudu3yzFmfu1Xet1MOe', 'default_avatar.png'),
(20, 'Nguyễn Quốc Anh', 'quocanh25115@gmail.com', '$2y$10$NhosYP6LErM5CFsOXy8.vev461LL3ziJgj.rC8ml2mVY1XXptbsbO', 'default_avatar.png');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `pc09326_departments`
--
ALTER TABLE `pc09326_departments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `pc09326_employee`
--
ALTER TABLE `pc09326_employee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `department_id` (`department_id`);

--
-- Chỉ mục cho bảng `pc09326_products`
--
ALTER TABLE `pc09326_products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `pc09326_users`
--
ALTER TABLE `pc09326_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `pc09326_departments`
--
ALTER TABLE `pc09326_departments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT cho bảng `pc09326_employee`
--
ALTER TABLE `pc09326_employee`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT cho bảng `pc09326_products`
--
ALTER TABLE `pc09326_products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `pc09326_users`
--
ALTER TABLE `pc09326_users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
