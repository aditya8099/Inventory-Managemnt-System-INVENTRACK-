-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2021 at 08:44 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web`
--

-- --------------------------------------------------------

--
-- Table structure for table `sign`
--

CREATE TABLE `sign` (
  `id` int(255) NOT NULL,
  `txtName` varchar(255) NOT NULL,
  `txtEmail` varchar(255) NOT NULL,
  `txtPass` varchar(255) NOT NULL,
  `txtCPass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sign`
--

INSERT INTO `sign` (`id`, `txtName`, `txtEmail`, `txtPass`, `txtCPass`) VALUES
(1, 'Arslan', 'mughalarslan996@gmail.com', '$2y$10$F/KozE2tLrlwS/pB.Fi.2O02FHdLFFYT/X8JLHEr6s184Lii/14hy', '$2y$10$gZooNnzbgcRcTLB0aU5AWuMFrz4h9.MRFNx0GVlthpPE9aDDqxHum'),
(4, 'M Azam', 'bazam3592@gmail.com', '$2y$10$ld1nJ0oaOmVp.s0EezCiOehC4/BZarDnN4H48eZTr8WQnRNo3G3ra', '$2y$10$RLLUlU451nNuFvn6LMovO.PDsea.TOcaT2rvFICG9hBaw.0K1r2mW'),
(5, 'shahab', 'shahabbut@gmail.com', '$2y$10$VI7T8fHUbReqbmaGn2jeBuIdpLGhP9XFDM7Fem8gsP98/w2a/2gIW', '$2y$10$fMqsjysjAV9T8nYVrlPkgO3aIQZYMeYF3/oTHH27/cxcTigi6y7Fi'),
(10, 'Muhammad Arslan', 'mughalarslan@gmail.com', '$2y$10$PdX4ILVIy3bRXp5Ira8I/ubg3k7Ltuo3lEPKC/OoViVG6RtaCgvWy', '$2y$10$UPJVtkcyNlTlslcuyKhsJeeeVkYnOfVsQfZMV7ylzNmPsbYE.5Ij2');

-- --------------------------------------------------------

--
-- Table structure for table `tblcustomer`
--

CREATE TABLE `tblcustomer` (
  `Customer_id` int(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `Customer_image` varchar(255) NOT NULL,
  `Customer_name` varchar(255) NOT NULL,
  `Customer_phone` varchar(255) NOT NULL,
  `Customer_address` varchar(255) NOT NULL,
  `Customer_email` varchar(255) NOT NULL,
  `Customer_city` varchar(255) NOT NULL,
  `Customer_bio` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcustomer`
--

INSERT INTO `tblcustomer` (`Customer_id`, `date`, `Customer_image`, `Customer_name`, `Customer_phone`, `Customer_address`, `Customer_email`, `Customer_city`, `Customer_bio`) VALUES
(7, '2021/07/04', 'Img_Assets/customer_image/T6vMEQ.jpg', 'Muhammad Ilyas', '03177638978', 'Kaccha Fattomand Road', 'mughalarslan99@gmail.com', 'gujranwala', 'developer'),
(8, '2021/07/04', 'Img_Assets/customer_image/T6vMEQ.jpg', 'Muhammad Ilyas', '03177638978', 'Kaccha Fattomand Road', 'mughalarslan99@gmail.com', 'gujranwala', 'developer'),
(9, '2021/07/04', 'Img_Assets/customer_image/ales-nesetril-Im7lZjxeLhg-unsplash.jpg', 'Azam Naveed', '03049762436', 'wahdat colony gujranwala', 'am1667999@gmail.com', 'gujranwala', 'Front End Developer'),
(10, '2021/07/04', 'Img_Assets/customer_image/crop.jfif', 'Muhammad Arslan', '030162626282', 'Kaccha Fattomand Road', 'mughalarslan99@gmail.com', 'gujranwala', 'Front End develper'),
(11, '2021/07/04', 'Img_Assets/customer_image/alex-knight-j4uuKnN43_M-unsplash.jpg', 'Amaz Iqbal', '03177638978', 'Kaccha Fattomand Road', 'mughalarslan99@gmail.com', 'gujranwala', 'chotiya');

-- --------------------------------------------------------

--
-- Table structure for table `tblorder`
--

CREATE TABLE `tblorder` (
  `order_id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_size` varchar(255) NOT NULL,
  `product_supplier` varchar(255) NOT NULL,
  `product_weight` varchar(255) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_color` varchar(255) NOT NULL,
  `product_price` float NOT NULL,
  `product_comment` varchar(255) NOT NULL,
  `product_totalprice` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblorder`
--

INSERT INTO `tblorder` (`order_id`, `order_date`, `product_image`, `product_code`, `product_name`, `product_size`, `product_supplier`, `product_weight`, `product_quantity`, `product_color`, `product_price`, `product_comment`, `product_totalprice`) VALUES
(1, '2021-07-06', 'Img_Assets/order_image/', 'wallpaper01', 'Wallpaper iron man', 'Wallpaper iron man', 'Muhammad Ilyas', '10kb', 10, 'black', 150, '', 0),
(2, '2021-07-06', 'Img_Assets/order_image/', 'wallpaper01', 'Wallpaper iron man', 'Wallpaper iron man', 'Muhammad Ilyas', '10kb', 10, 'black', 150, '', 0),
(3, '2021-07-06', 'Img_Assets/order_image/', 'laptop02', 'Laptop HP', 'Laptop HP', 'Muhammad Arslan', '100mg', 10, 'white', 30999, '', 0),
(4, '2021-07-06', 'Img_Assets/product_image/', 'wallpaper', 'Wallpaper', 'Wallpaper', 'Muhammad Arslan', '10kb', 10, 'blue black', 100, 'need it in white color', 0),
(5, '2021-07-06', 'Img_Assets/order_image/I', 'wallpaper01', 'Wallpaper iron man', 'Wallpaper iron man', 'Muhammad Ilyas', '10kb', 10, 'black', 150, '', 0),
(6, '2021-07-06', 'Img_Assets/product_image/', 'laptop02', 'Laptop HP', 'Laptop HP', 'Muhammad Arslan', '100mg', 5, 'white', 30999, '', 0),
(7, '2021-07-06', 'Img_Assets/product_image/', 'juicer ', 'juicerr blender', 'juicerr blender', 'Muhammad Arslan', '100mg', 1, 'white', 1000, 'i want it in black color', 0),
(8, '2021-07-06', 'Img_Assets/product_image/', 'juicer ', 'juicerr blender', 'juicerr blender', 'Muhammad Arslan', '100mg', 5, 'white', 1000, '', 0),
(9, '2021-07-06', 'Img_Assets/product_image/', 'wallpaper', 'Wallpaper', 'Wallpaper', 'Muhammad Arslan', '10kb', 10, 'blue black', 100, '', 0),
(10, '2021-07-06', 'Img_Assets/product_image/', 'laptop01', 'Dell Laptop  ', 'Dell Laptop  ', 'Muhammad Arslan', '100mg', 6, 'white', 20000, '', 0),
(11, '2021-07-06', 'Img_Assets/product_image/', 'laptop01', 'Dell Laptop  ', 'Dell Laptop  ', 'Muhammad Arslan', '100mg', 30, 'white', 20000, '', 0),
(12, '2021-07-06', 'Img_Assets/product_image/', 'laptop01', 'Dell Laptop  ', 'Dell Laptop  ', 'Muhammad Arslan', '100mg', 30, 'white', 20000, '', 0),
(13, '2021-07-06', 'Img_Assets/product_image/', 'laptop01', 'Dell Laptop  ', 'Dell Laptop  ', 'Muhammad Arslan', '100mg', 30, 'white', 20000, '', 0),
(14, '2021-07-06', '', 'laptop01', 'Dell Laptop  ', 'Dell Laptop  ', 'Muhammad Arslan', '100mg', 30, 'white', 20000, '', 0),
(15, '2021-07-06', '', 'laptop01', 'Dell Laptop  ', 'Dell Laptop  ', 'Muhammad Arslan', '100mg', 29, 'white', 20000, '', 0),
(16, '2021-07-06', '', 'laptop01', 'Dell Laptop  ', 'Dell Laptop  ', 'Muhammad Arslan', '100mg', 30, 'white', 20000, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblproduct`
--

CREATE TABLE `tblproduct` (
  `product_id` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_size` varchar(255) NOT NULL,
  `product_supplier` varchar(255) NOT NULL,
  `product_weight` varchar(255) NOT NULL,
  `product_color` varchar(255) NOT NULL,
  `product_quantity` varchar(255) NOT NULL,
  `product_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblproduct`
--

INSERT INTO `tblproduct` (`product_id`, `date`, `product_image`, `product_code`, `product_name`, `product_size`, `product_supplier`, `product_weight`, `product_color`, `product_quantity`, `product_price`) VALUES
(10, '2021/07/04', 'Img_Assets/product_image/alex-knight-j4uuKnN43_M-unsplash.jpg', 'laptop01', 'Dell Laptop  ', 'Dell Laptop ', 'Muhammad Arslan', '100mg', 'white', '30', 20000),
(11, '2021/07/04', 'Img_Assets/product_image/ales-nesetril-Im7lZjxeLhg-unsplash.jpg', 'laptop02', 'Laptop HP', 'Large', 'Muhammad Arslan', '100mg', 'white', '10', 30999),
(12, '2021/07/04', 'Img_Assets/product_image/crop.jfif', 'Ironman', 'Iron Man', 'Large', 'Muhammad Ilyas', '10kg', 'red and white', '0', 50999),
(13, '2021/07/04', 'Img_Assets/product_image/Iron man HUD - PSD by megatron17 on DeviantArt.jpg', 'wallpaper', 'Wallpaper', 'Large', 'Muhammad Arslan', '10kb', 'blue black', '10', 100),
(14, '2021/07/04', 'Img_Assets/product_image/iron-man-black-background-superhero-typographic-portraits-wallpaper.jpg', 'wallpaper01', 'Wallpaper iron man', 'medium', 'Muhammad Ilyas', '10kb', 'black', '10', 150),
(15, '2021/07/06', 'Img_Assets/product_image/8.jpg', 'juicer ', 'juicerr blender', 'medium', 'Muhammad Arslan', '100mg', 'white', '20', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `tblsupplier`
--

CREATE TABLE `tblsupplier` (
  `supplier_id` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `supplier_image` varchar(255) NOT NULL,
  `supplier_name` varchar(255) NOT NULL,
  `supplier_phone` varchar(255) NOT NULL,
  `supplier_address` varchar(255) NOT NULL,
  `supplier_email` varchar(255) NOT NULL,
  `supplier_city` varchar(200) NOT NULL,
  `supplier_bio` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblsupplier`
--

INSERT INTO `tblsupplier` (`supplier_id`, `date`, `supplier_image`, `supplier_name`, `supplier_phone`, `supplier_address`, `supplier_email`, `supplier_city`, `supplier_bio`) VALUES
(1, '2021/07/03', 'Img_Assets/supplier_image/img.jpg', 'Muhammad Arslan', '03177638978', 'Kaccha Fattomand Road', 'mughalarslan996@gmail.com', 'gujranwala', ''),
(2, '2021/07/03', 'Img_Assets/supplier_image/iron-man-black-background-superhero-typographic-portraits-wallpaper.jpg', 'Muhammad Ilyas', '03177638978', 'Kaccha Fattomand Road', 'mughalarslan@gmail.com', 'gujranwala', 'gqgwuyg qwegqygwe qweg yqwge qywge u');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sign`
--
ALTER TABLE `sign`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcustomer`
--
ALTER TABLE `tblcustomer`
  ADD PRIMARY KEY (`Customer_id`);

--
-- Indexes for table `tblorder`
--
ALTER TABLE `tblorder`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tblproduct`
--
ALTER TABLE `tblproduct`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tblsupplier`
--
ALTER TABLE `tblsupplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sign`
--
ALTER TABLE `sign`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tblcustomer`
--
ALTER TABLE `tblcustomer`
  MODIFY `Customer_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tblorder`
--
ALTER TABLE `tblorder`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tblproduct`
--
ALTER TABLE `tblproduct`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tblsupplier`
--
ALTER TABLE `tblsupplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
