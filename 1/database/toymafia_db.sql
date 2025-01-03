-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2024 at 09:53 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toymafia_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_items`
--

CREATE TABLE `tbl_items` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `item_description` text NOT NULL,
  `item_location` varchar(50) NOT NULL,
  `item_category` varchar(50) NOT NULL,
  `item_quality` varchar(50) NOT NULL,
  `item_price` decimal(10,2) NOT NULL,
  `item_quantity` int(11) NOT NULL,
  `item_image` varchar(100) NOT NULL,
  `item_status` varchar(11) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_items`
--

INSERT INTO `tbl_items` (`item_id`, `item_name`, `item_description`, `item_location`, `item_category`, `item_quality`, `item_price`, `item_quantity`, `item_image`, `item_status`) VALUES
(1, '100 UV LED', 'LED', 'Exclusive Box Floors', 'Disposable', 'Damaged', 1.00, 6, 'n/a', 'active'),
(2, '100 UV LED', 'LED', 'Exclusive Box Floor', 'Disposable', 'Good', 0.00, 33, 'n/a', 'active'),
(3, 'TONYTONY. CHOPPER #99', 'FUNKO', 'Rack 8 3rd', 'Normal', 'Good', 0.00, 12, 'n/a', 'active'),
(4, 'TONYTONY. CHOPPER #99', 'FUNKO', 'Rack 8 3rd', 'Normal', 'Damaged', 0.00, 4, 'n/a', 'active'),
(5, 'TONYTONY. CHOPPER #99', 'FUNKO', 'Rack 8 3rd', 'FLOCKED SE', 'Good', 0.00, 4, 'n/a', 'active'),
(6, 'TONYTONY. CHOPPER #99', 'FUNKO', 'Rack 8 3rd', 'FLOCKED SE', 'Damaged', 0.00, 33, 'n/a', 'active'),
(7, 'CHOPPERMON #1471', 'FUNKO', 'Rack 8 3rd', 'Normal', 'Good', 0.00, 5, 'n/a', 'active'),
(8, 'YAMAMOTO # 1596', 'FUNKO', 'Rack 8 Top', 'Normal', 'Good', 0.00, 6, 'n/a', 'active'),
(9, 'YAMAMOTO # 1596', 'FUNKO', 'Rack 8 Top', 'Glow in the Dark - Exclusive', 'Good', 0.00, 12, 'n/a', 'active'),
(10, 'YAMAMOTO # 1596', 'FUNKO', 'Rack 8 Top', 'Glow in the Dark - SE', 'Good', 0.00, 7, 'n/a', 'active'),
(11, 'KAIDO #1624', 'FUNKO', 'Rack 7 Top / Rack 6 Top', 'Normal', 'Good', 0.00, 18, 'n/a', 'active'),
(12, 'CHILD BIG MOM #1271', 'FUNKO', 'Rack 7 Top', 'Specialty Series Exclusice', 'Good', 0.00, 4, 'n/a', 'active'),
(13, 'LUFFY GEAR FIVE #1607', 'FUNKO', 'Rack 7 Top', 'Normal', 'Good', 0.00, 28, 'n/a', 'active'),
(14, 'LUFFY GEAR FIVE #1607', 'FUNKO', 'Rack 7 Top', 'Limited Chase Edition', 'Good', 0.00, 3, 'n/a', 'active'),
(15, 'LUFFY GEAR FIVE #1607', 'FUNKO', 'Rack 7 3rd', 'Normal', 'Damaged', 0.00, 3, 'n/a', 'active'),
(16, 'LUFFY GEAR FIVE #1607', 'FUNKO', 'Rack 7 3rd', 'Limited Chase Edition', 'Damaged', 0.00, 2, 'n/a', 'active'),
(17, 'USSOP #1774', 'FUNKO', 'Rack 8 Top', 'Normal', 'Good', 0.00, 18, 'n/a', 'active'),
(18, 'MONKEY D. LUFFY #1771', 'FUNKO', 'Rack 7 Top', 'Normal', 'Good', 0.00, 6, 'n/a', 'active'),
(19, 'NAMI #1772', 'FUNKO', 'Rack 7 Top / BOXED', 'Normal', 'Good', 0.00, 42, 'n/a', 'active'),
(20, 'WARHAMMER TITAN', 'FUNKO', 'Rack 3 Top', 'Glow in the Dark - Exclusive', 'Good', 0.00, 2, 'n/a', 'active'),
(21, 'MS-06S CHAR\'S ZAKU II #1717', 'FUNKO', 'Rack 3 Top', 'Normal', 'Good', 0.00, 3, 'n/a', 'active'),
(22, 'ALLUKA ZILDYCK #1728', 'FUNKO', 'Rack 3 Top', 'Normal', 'Good', 0.00, 2, 'n/a', 'active'),
(23, 'RX-78-2 GUNDAM #1716', 'FUNKO', 'Rack 3 Top', 'Normal', 'Good', 0.00, 6, 'n/a', 'active'),
(24, 'KATARA #1807', 'FUNKO', 'N/A', 'Normal', 'Good', 0.00, 1, 'n/a', 'active'),
(25, 'TOPH #1808', 'FUNKO', 'N/A', 'Normal', 'Good', 0.00, 1, 'n/a', 'active'),
(26, 'SUKO #1809', 'FUNKO', 'N/A', 'Normal', 'Good', 0.00, 1, 'n/a', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `timelogtbl`
--

CREATE TABLE `timelogtbl` (
  `time_id` int(11) NOT NULL,
  `log_action` longtext NOT NULL,
  `log_date` date NOT NULL,
  `log_time` time NOT NULL,
  `log_status` varchar(11) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_items`
--
ALTER TABLE `tbl_items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `timelogtbl`
--
ALTER TABLE `timelogtbl`
  ADD PRIMARY KEY (`time_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_items`
--
ALTER TABLE `tbl_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `timelogtbl`
--
ALTER TABLE `timelogtbl`
  MODIFY `time_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
