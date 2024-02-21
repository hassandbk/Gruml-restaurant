-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2024 at 05:12 PM
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
-- Database: `new-food-order`
--

-- --------------------------------------------------------

--
-- Table structure for table `aamarpay`
--

CREATE TABLE `aamarpay` (
  `id` int(100) NOT NULL,
  `cus_name` text NOT NULL,
  `amount` int(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `pay_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `transaction_id` varchar(100) NOT NULL,
  `card_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `aamarpay`
--

INSERT INTO `aamarpay` (`id`, `cus_name`, `amount`, `status`, `pay_time`, `transaction_id`, `card_type`) VALUES
(3, 'Karim Molla', 600, 'Successful', '2022-01-25 07:29:16', 'ONL-PAY-R969U0935P', 'DBBL-MASTERDEBIT'),
(5, 'Hamza Hasan', 180, 'Successful', '2022-01-25 10:32:31', 'ONL-PAY-VLIBNZG666', 'DBBL-MobileBanking'),
(6, 'Montu Mia', 470, 'Successful', '2022-01-25 11:10:05', 'ONL-PAY-MTL9PG98XZ', 'DBBL-NEXUS'),
(7, 'Tarik Ali', 100, 'Successful', '2022-01-26 14:55:05', 'ONL-PAY-GC37DRKBNJ', 'DBBL-NEXUS'),
(8, 'Nazrul Islam', 470, 'Successful', '2021-05-05 16:21:03', 'ONL-PAY-20XSKIEKLF', 'DBBL-NEXUS'),
(9, 'Maheosy Haque', 170, 'Successful', '2022-01-27 07:47:59', 'ONL-PAY-QM7XFUQYHR', 'DBBL-NEXUS'),
(10, 'Maheosy Haque', 170, 'Successful', '2022-01-27 08:16:19', 'ONL-PAY-QM7XFUQYHR', 'DBBL-NEXUS'),
(11, 'Mohammad Wasikuzzaman', 270, 'Successful', '2022-01-27 08:17:01', 'ONL-PAY-COBQ6KWJSQ', 'DBBL-NEXUS'),
(12, 'my full name', 150, 'Successful', '2022-01-27 08:18:51', 'ONL-PAY-LJIBHV3TK8', 'DBBL-NEXUS'),
(14, 'my full name', 100, 'Successful', '2022-01-27 08:20:27', 'ONL-PAY-TFWV0J5REO', 'DBBL-NEXUS'),
(15, 'my full name', 130, 'Successful', '2022-01-27 02:24:44', 'ONL-PAY-GY1UBIG5RX', 'DBBL-NEXUS'),
(16, 'my full name', 270, 'Successful', '2020-12-16 08:29:40', 'ONL-PAY-FYCCSXTQHX', 'DBBL-NEXUS'),
(17, 'my full name', 150, 'Successful', '2022-01-27 08:32:11', 'ONL-PAY-DRV44CERAQ', 'DBBL-NEXUS'),
(18, 'my full name', 230, 'Successful', '2022-01-27 08:33:30', 'ONL-PAY-UXZ7UIZ402', 'DBBL-NEXUS'),
(19, 'This is a Test', 270, 'Successful', '2022-08-04 08:35:31', 'ONL-PAY-SSRRW2IYZE', 'DBBL-NEXUS'),
(20, 'my full name', 230, 'Successful', '2021-09-20 08:36:35', 'ONL-PAY-68N704WBI7', 'DBBL-NEXUS'),
(21, 'my full name', 280, 'Successful', '2021-07-16 08:38:12', 'ONL-PAY-PI6P46TMJS', 'DBBL-NEXUS'),
(22, 'my full name', 100, 'Successful', '2022-04-15 08:39:04', 'ONL-PAY-3M2UBMTZ01', 'DBBL-NEXUS'),
(23, 'Asad Ali', 1310, 'Successful', '2022-03-21 04:04:14', 'ONL-PAY-6V6RYWX24Z', 'DBBL-NEXUS'),
(24, 'Tamin Ahmed', 420, 'Successful', '2021-04-22 10:30:52', 'ONL-PAY-WVQRSZGWMW', 'DBBL-NEXUS'),
(25, 'my full name', 940, 'Successful', '2022-01-30 04:23:46', 'ONL-PAY-LDFBBO3TJW', 'DBBL-NEXUS'),
(26, 'Wasikuzzaman', 460, 'Successful', '2022-06-24 04:26:44', 'ONL-PAY-7UBFJLE87H', 'DBBL-NEXUS'),
(27, 'Eureka', 750, 'Successful', '2022-01-30 05:14:40', 'ONL-PAY-GWBLBMSVB8', 'DBBL-NEXUS'),
(28, 'Seems like This is working', 880, 'Successful', '2021-10-15 05:21:37', 'ONL-PAY-VHMONRPXA1', 'DBBL-NEXUS'),
(29, 'Maheosy Haque', 1080, 'Successful', '2021-11-06 13:51:10', 'ONL-PAY-C67X5PHHX4', 'DBBL-NEXUS'),
(30, 'Shoriful Islam', 300, 'Successful', '2022-02-01 16:03:50', 'ONL-PAY-OSKZYF7J42', 'bKash-bKash'),
(31, 'Farook Ahmed', 250, 'Successful', '2022-02-01 16:06:38', 'ONL-PAY-X3U8QMX9UG', 'DBBL-NEXUS'),
(32, 'my full name', 240, 'Successful', '2022-02-02 08:09:31', 'ONL-PAY-GDGUVQOCL3', 'bKash-bKash'),
(33, 'Monir Ali', 360, 'Successful', '2022-02-08 03:51:53', 'ONL-PAY-IRDBF59HGR', 'bKash-bKash'),
(34, 'Jalal Molla', 160, 'Successful', '2022-02-08 04:31:42', 'ONL-PAY-9U0IWYR96U', 'DBBL-NEXUS'),
(35, 'Kobita Begum', 110, 'Successful', '2022-02-08 05:25:22', 'ONL-PAY-FSSWV66LPV', 'DBBL-NEXUS'),
(36, 'Tashin', 590, 'Successful', '2022-02-08 05:43:46', 'ONL-PAY-KR8K8ZYVGM', 'DBBL-NEXUS'),
(37, 'Xasha Rahman', 450, 'Successful', '2022-02-08 05:45:48', 'ONL-PAY-Y7OP0RYLOB', 'DBBL-NEXUS'),
(38, 'Numna', 110, 'Successful', '2022-02-08 05:58:47', 'ONL-PAY-CF0ZZ553WD', 'DBBL-NEXUS'),
(39, 'Sultan', 300, 'Successful', '2022-02-08 06:02:26', 'ONL-PAY-EWEJN2ZP7P', 'DBBL-NEXUS'),
(40, 'Jamila Jameel', 120, 'Successful', '2022-02-08 06:33:03', 'ONL-PAY-C1HFESV819', 'DBBL-NEXUS'),
(41, 'Tom Hanks', 390, 'Successful', '2022-02-08 06:34:13', 'ONL-PAY-G7PB7WULEF', 'DBBL-NEXUS'),
(42, 'Sumona Akter', 540, 'Successful', '2022-02-08 06:38:05', 'ONL-PAY-H8GFL3LYB7', 'DBBL-NEXUS'),
(43, 'Sabir Ahmed', 200, 'Successful', '2022-02-08 06:40:34', 'ONL-PAY-3XF146V92Q', 'DBBL-NEXUS'),
(44, 'Jahangir Alom', 320, 'Successful', '2022-02-08 06:42:15', 'ONL-PAY-6EF97NAH6Y', 'DBBL-MASTERDEBIT'),
(45, 'Muhtasim Mubassir', 660, 'Successful', '2022-02-08 06:44:15', 'ONL-PAY-17FUFJJVGE', 'DBBL-NEXUS'),
(46, 'Shanto Islam', 480, 'Successful', '2022-02-08 06:51:03', 'ONL-PAY-W4VHG5CDC4', 'bKash-bKash'),
(47, 'Abir Ahmed', 200, 'Successful', '2022-02-08 06:55:07', 'ONL-PAY-RVDHMHT7Z8', 'DBBL-NEXUS'),
(48, 'Maheosy Haque', 1700, 'Successful', '2022-02-08 06:56:53', 'ONL-PAY-RA3OFS3JAG', 'DBBL-MASTERDEBIT'),
(49, 'Mohammad Wasikuzzaman', 660, 'Successful', '2022-02-08 06:59:08', 'ONL-PAY-V5AA6J9NHX', 'bKash-bKash'),
(50, 'Robin', 480, 'Successful', '2022-02-09 09:46:14', 'ONL-PAY-CUGZZYPKXL', 'DBBL-NEXUS'),
(51, 'Maheosy Haque', 300, 'Successful', '2022-02-09 16:46:28', 'ONL-PAY-03OZKBZ163', 'DBBL-NEXUS'),
(52, 'Jay ', 100, 'Successful', '2022-02-09 17:19:15', 'ONL-PAY-J1VSWT7Y36', 'DBBL-NEXUS'),
(53, 'Abdul ', 350, 'Successful', '2022-02-10 11:30:24', 'ONL-PAY-VU2GQSCWIE', 'DBBL-NEXUS'),
(54, 'Rahi', 100, 'Successful', '2022-02-10 11:32:44', 'ONL-PAY-GWG4PRVRS6', 'bKash-bKash'),
(55, 'Bashar', 320, 'Successful', '2022-02-10 11:34:16', 'ONL-PAY-DTYI65WPX7', 'DBBL-MobileBanking'),
(56, 'Kamal Khan', 300, 'Successful', '2022-02-10 11:40:19', 'ONL-PAY-9M8MHK5ROM', 'DBBL-MASTERDEBIT'),
(57, 'Mohammad Wasikuzzaman', 100, 'Successful', '2022-02-14 09:37:40', 'ONL-PAY-KI6TWT6P0S', 'DBBL-NEXUS'),
(58, 'Mohammad Wasikuzzaman', 380, 'Successful', '2022-02-14 09:40:16', 'ONL-PAY-6NW73HW7WR', 'bKash-bKash'),
(59, 'Mohammad Wasikuzzaman', 120, 'Successful', '2022-02-14 09:45:16', 'ONL-PAY-SK7IM5U84G', 'bKash-bKash'),
(60, 'Wasikuzzaman', 300, 'Successful', '2022-02-14 12:15:10', 'ONL-PAY-8E5L7NIWAE', 'DBBL-NEXUS'),
(61, 'Wasikuzzaman', 450, 'Successful', '2022-02-14 12:25:34', 'ONL-PAY-VPE49B581W', 'bKash-bKash'),
(62, '', 0, '', '0000-00-00 00:00:00', '', ''),
(63, 'Hassan', 550, 'Successful', '2024-02-16 15:27:52', 'ONL-PAY-MMPN481N37', 'mastercard_barclays'),
(64, 'Hassan', 704, 'Successful', '2024-02-16 15:35:24', 'ONL-PAY-PSEFMJLMPR', 'mastercard_standard_chartered'),
(65, 'Hassan', 363, 'Successful', '2024-02-16 15:42:47', 'ONL-PAY-WZU9EROGQC', 'ARTEL-UG'),
(66, 'Hassan', 143, 'Successful', '2024-02-16 15:47:06', 'ONL-PAY-4D53OZBE1M', 'visa_stanbic');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `phone` int(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` longtext NOT NULL,
  `message_status` varchar(100) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `name`, `phone`, `subject`, `message`, `message_status`, `date`) VALUES
(18, 'Mohammad Wasikuzzaman', 1717731002, 'Hi There', 'Aasdaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'read', '2022-02-13 11:23:36'),
(19, 'Maheosy Haque', 1867348264, 'Test Subject', 'Test Message', 'read', '2022-02-14 12:24:15'),
(20, 'katongole hassan', 705068168, 'thank you', 'very mucj', 'read', '2024-02-13 11:43:31'),
(21, 'afaf vasva', 2147483647, 'bannge', 'kino kika', 'unread', '2024-02-13 11:54:23'),
(22, 'Table Reservation', 742116353, 'dvdavav', 'fafvsafsfca', 'unread', '2024-02-13 09:00:31'),
(23, 'afaf vasva', 2147483647, 'sgsdgsesa', 'afaffdafs', 'unread', '2024-02-13 09:04:19'),
(24, 'afaf vasva', 2147483647, 'sgsdgsesa', 'afaffdafs', 'unread', '2024-02-13 09:06:40'),
(25, 'egfdsgd', 432652535, 'DXZBXBZV', 'CSFDa', 'unread', '2024-02-13 09:07:01');

-- --------------------------------------------------------

--
-- Table structure for table `online_orders_new`
--

CREATE TABLE `online_orders_new` (
  `order_id` int(100) NOT NULL,
  `Item_Name` varchar(100) NOT NULL,
  `Price` int(100) NOT NULL,
  `Quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `online_orders_new`
--

INSERT INTO `online_orders_new` (`order_id`, `Item_Name`, `Price`, `Quantity`) VALUES
(36, 'French Fries', 80, 1),
(37, 'Beef Burger', 150, 1),
(38, 'Beef Burger', 150, 3),
(38, 'Pizza', 250, 1),
(39, 'French Fries', 80, 1),
(40, 'Beef Burger', 150, 4),
(41, 'Beef Burger', 150, 1),
(42, 'Margherita Pizza', 200, 1),
(42, 'Regular French Fries', 100, 2),
(43, 'Beef Burger', 150, 1),
(44, 'Beef Burger', 150, 1),
(45, 'Vegetarian Pizza', 180, 1),
(46, 'Mexican Pizza', 250, 1),
(47, 'Vegetarian Pizza', 180, 1),
(48, 'Beef Burger', 150, 1),
(1, 'Mexican Pizza', 250, 1),
(1, 'Buffalo Wings', 250, 1),
(1, 'Regular French Fries', 100, 2),
(2, 'Pepperoni Pizza', 220, 1),
(3, 'Mexican Pizza', 250, 1),
(3, 'Beef Burger', 150, 1),
(3, 'Regular French Fries', 100, 2),
(4, 'Vegetarian Pizza', 180, 1),
(5, 'Buffalo Wings', 250, 1),
(6, 'Buffalo Wings', 250, 1),
(7, 'Vegetarian Pizza', 180, 1),
(8, 'Beef Burger', 150, 1),
(9, 'Buffalo Wings', 250, 1),
(9, 'Pepperoni Pizza', 220, 1),
(10, 'Regular French Fries', 100, 1),
(11, 'Regular French Fries', 100, 1),
(12, 'Mexican Pizza', 250, 1),
(12, 'Pepperoni Pizza', 220, 1),
(13, 'Cheese Burger', 170, 1),
(14, 'Hone Glazed Chicken', 270, 1),
(15, 'Popcorn Chicken', 150, 1),
(16, 'Samoosa ', 100, 1),
(17, 'French Fries ', 130, 1),
(18, 'Pepperoni Pizza ', 270, 1),
(19, 'Popcorn Chicken', 150, 1),
(20, 'BBQ Wings', 230, 1),
(21, 'Hone Glazed Chicken', 270, 1),
(22, 'BBQ Wings', 230, 1),
(23, 'Mushroom Pizza', 280, 1),
(24, 'Samoosa ', 100, 1),
(25, 'Vegetarian Pizza', 300, 1),
(26, 'Crispy Wings', 250, 1),
(27, 'Hone Glazed Chicken', 270, 1),
(28, 'Cheese Pizza', 290, 1),
(29, 'Crispy Wings', 250, 2),
(29, 'Hone Glazed Chicken', 270, 2),
(29, 'Pepperoni Pizza ', 270, 1),
(30, 'Chicken Kiev Balls', 200, 1),
(30, 'Chicken Burger', 120, 1),
(30, 'Onion Rings', 100, 1),
(31, 'Deluxe Pizza ', 490, 1),
(31, 'Beef Burger', 150, 3),
(32, 'Beef Burger', 150, 2),
(32, 'Hamburger', 160, 1),
(33, 'Beef Burger', 150, 5),
(34, 'Red Hot', 120, 1),
(34, 'Beef Burger', 150, 4),
(34, 'Hamburger', 160, 1),
(35, 'Deluxe Pizza ', 490, 2),
(35, 'Shingara', 100, 1),
(36, 'Cheese Burger', 100, 1),
(36, 'Samoosa', 100, 2),
(37, 'Chicken Nuggets', 150, 1),
(37, 'Onion Rings', 100, 1),
(38, 'Deluxe Pizza ', 490, 1),
(39, 'Chicken Burger', 120, 2),
(40, 'French Fries', 120, 3),
(41, 'Hamburger', 160, 1),
(42, 'Hamburger', 160, 1),
(43, 'Hamburger', 160, 1),
(44, 'Hamburger', 160, 1),
(45, 'Hamburger', 160, 1),
(46, 'Hamburger', 160, 1),
(47, 'Hamburger', 160, 1),
(48, 'Hamburger', 160, 1),
(49, 'Hamburger', 160, 1),
(50, 'Cheese Dog', 110, 1),
(51, 'Cheese Dog', 110, 1),
(52, 'Cheese Dog', 110, 1),
(53, 'Cheese Dog', 110, 1),
(54, 'Cheese Dog', 110, 1),
(55, 'Cheese Dog', 110, 1),
(56, 'Cheese Dog', 110, 1),
(57, 'Cheese Dog', 110, 1),
(58, 'Cheese Dog', 110, 1),
(59, 'Cheese Dog', 110, 1),
(60, 'Cheese Dog', 110, 1),
(61, 'Deluxe Pizza ', 490, 1),
(61, 'Samoosa', 100, 1),
(62, 'Deluxe Pizza ', 490, 1),
(62, 'Samoosa', 100, 1),
(63, 'Deluxe Pizza ', 490, 1),
(63, 'Samoosa', 100, 1),
(64, 'Deluxe Pizza ', 490, 1),
(64, 'Samoosa', 100, 1),
(65, 'Deluxe Pizza ', 490, 1),
(65, 'Samoosa', 100, 1),
(66, 'Deluxe Pizza ', 490, 1),
(66, 'Samoosa', 100, 1),
(67, 'Supreme Pizza', 450, 1),
(68, 'Red Hot', 120, 1),
(69, 'Red Hot', 120, 1),
(70, 'Red Hot', 120, 1),
(71, 'Red Hot', 120, 1),
(72, 'Red Hot', 120, 1),
(73, 'Cheese Dog', 110, 1),
(74, 'Cheese Dog', 110, 1),
(75, 'Chicken Nuggets', 150, 2),
(76, 'Chicken Burger', 120, 1),
(77, 'Chicken Burger', 120, 2),
(77, 'Beef Burger', 150, 1),
(78, 'Chicken Burger', 120, 2),
(78, 'Beef Burger', 150, 2),
(79, 'Chicken Burger', 120, 2),
(79, 'Beef Burger', 150, 2),
(80, 'Chicken Kiev Balls', 200, 1),
(81, 'Chicken Kiev Balls', 200, 1),
(82, 'Hamburger', 160, 2),
(83, 'Chicken Burger', 120, 3),
(83, 'Beef Burger', 150, 2),
(84, 'Chicken Burger', 120, 4),
(85, 'Cheese Burger', 100, 2),
(86, 'Cheese Burger', 100, 3),
(86, 'Cheese Pizza', 350, 4),
(87, 'Chicken Burger', 120, 3),
(87, 'Beef Burger', 150, 2),
(88, 'French Fries', 120, 4),
(89, 'Vegetarian Pizza', 300, 1),
(90, 'Hot Onion Dog', 100, 1),
(91, 'Shingara', 100, 2),
(91, 'Chicken Nuggets', 150, 1),
(92, 'Onion Rings', 100, 1),
(93, 'Chili Hot Dog', 80, 4),
(94, 'Vegetarian Pizza', 300, 1),
(95, 'Cheese Burger', 100, 1),
(96, 'Vegetarian Pizza', 300, 1),
(96, 'Chili Hot Dog', 80, 1),
(97, 'Red Hot', 120, 1),
(98, 'Vegetarian Pizza', 300, 1),
(99, 'Supreme Pizza', 450, 1),
(100, 'Cheese Burger', 100, 1),
(100, 'Beef Burger', 150, 1),
(101, 'French Fries', 120, 1),
(101, 'Hot Onion Dog', 100, 1),
(102, 'Cheese Dog', 110, 1),
(103, 'Cheese Dog', 110, 3),
(103, 'Hamburger', 160, 1),
(103, 'Cheese Burger', 100, 1),
(105, 'Cheese Dog', 110, 1),
(106, 'French Fries', 120, 1),
(106, 'Hamburger', 160, 1),
(107, 'Chicken Kiev Balls', 200, 1),
(107, 'Cheese Burger', 100, 1),
(108, 'Cheese Dog', 110, 1),
(109, 'Cheese Dog', 110, 1),
(110, 'French Fries', 120, 1),
(111, 'French Fries', 120, 1),
(112, 'Cheese Dog', 110, 1),
(112, 'Hamburger', 160, 1),
(113, 'French Fries', 120, 1),
(113, 'Hamburger', 160, 1),
(114, 'Cheese Dog', 110, 1),
(115, 'Cheese Dog', 110, 1),
(116, 'Cheese Dog', 110, 1),
(117, 'Cheese Dog', 110, 1),
(118, 'French Fries', 120, 1),
(119, 'French Fries', 120, 1),
(120, 'Cheese Dog', 110, 1),
(121, 'Cheese Dog', 110, 1),
(122, 'Cheese Dog', 110, 1),
(123, 'Cheese Dog', 110, 1),
(124, 'Cheese Dog', 110, 1),
(125, 'Cheese Dog', 110, 1),
(125, 'Cheese Burger', 100, 1),
(126, 'Hamburger', 160, 1),
(127, 'Cheese Dog', 110, 1),
(128, 'Cheese Dog', 110, 1),
(131, 'Cheese Dog', 110, 1),
(132, 'Cheese Dog', 110, 1),
(133, 'Cheese Dog', 110, 1),
(134, 'Cheese Dog', 110, 1),
(135, 'Cheese Dog', 110, 1),
(136, 'Cheese Dog', 110, 1),
(137, 'Cheese Dog', 110, 1),
(138, 'Cheese Dog', 110, 1),
(139, 'Cheese Dog', 110, 1),
(140, 'Cheese Dog', 110, 1),
(140, 'Hamburger', 160, 1),
(142, 'Cheese Dog', 110, 1),
(144, 'Cheese Dog', 110, 1),
(144, 'Hamburger', 160, 1),
(146, 'Cheese Dog', 110, 1),
(146, 'Hamburger', 160, 1),
(148, 'French Fries', 120, 1),
(148, 'Hamburger', 160, 1),
(149, 'Cheese Dog', 110, 1),
(149, 'Cheese Burger', 100, 1),
(150, 'Cheese Dog', 110, 1),
(150, 'Chicken Burger', 120, 1),
(151, 'Cheese Dog', 110, 1),
(151, 'Vegetarian Pizza', 300, 1),
(152, 'Spring Roll', 130, 1),
(152, 'Chicken Burger', 120, 1),
(153, 'Spring Roll', 130, 1),
(153, 'Chicken Burger', 120, 1),
(154, 'Spring Roll', 130, 1),
(154, 'Chicken Burger', 120, 1),
(155, 'Spring Roll', 130, 1),
(155, 'Chicken Burger', 120, 1),
(155, 'Cheese Dog', 110, 1),
(155, 'Hamburger', 160, 1),
(156, 'Spring Roll', 130, 1),
(156, 'Chicken Burger', 120, 1),
(156, 'Cheese Dog', 110, 1),
(156, 'Hamburger', 160, 1),
(157, 'Spring Roll', 130, 1),
(157, 'Chicken Burger', 120, 1),
(157, 'Cheese Dog', 110, 1),
(157, 'Hamburger', 160, 1),
(158, 'Spring Roll', 130, 1),
(158, 'Chicken Burger', 120, 1),
(158, 'Cheese Dog', 110, 1),
(158, 'Hamburger', 160, 1),
(159, 'Spring Roll', 130, 1),
(159, 'Chicken Burger', 120, 1),
(159, 'Cheese Dog', 110, 1),
(159, 'Hamburger', 160, 1),
(160, 'Spring Roll', 130, 1),
(160, 'Chicken Burger', 120, 1),
(160, 'Cheese Dog', 110, 1),
(160, 'Hamburger', 160, 1),
(161, 'Spring Roll', 130, 1),
(161, 'Chicken Burger', 120, 1),
(161, 'Cheese Dog', 110, 1),
(161, 'Hamburger', 160, 1),
(162, 'Spring Roll', 130, 1),
(162, 'Chicken Burger', 120, 1),
(162, 'Cheese Dog', 110, 1),
(162, 'Hamburger', 160, 1),
(163, 'Spring Roll', 130, 1),
(163, 'Chicken Burger', 120, 1),
(163, 'Cheese Dog', 110, 1),
(163, 'Hamburger', 160, 1),
(164, 'Spring Roll', 130, 1),
(164, 'Chicken Burger', 120, 1),
(164, 'Cheese Dog', 110, 1),
(164, 'Hamburger', 160, 1),
(165, 'Spring Roll', 130, 1),
(165, 'Chicken Burger', 120, 1),
(165, 'Cheese Dog', 110, 1),
(165, 'Hamburger', 160, 1),
(166, 'Spring Roll', 130, 1),
(166, 'Chicken Burger', 120, 1),
(166, 'Cheese Dog', 110, 1),
(166, 'Hamburger', 160, 1),
(167, 'Spring Roll', 130, 1),
(167, 'Chicken Burger', 120, 1),
(167, 'Cheese Dog', 110, 1),
(167, 'Hamburger', 160, 1),
(168, 'Spring Roll', 130, 1),
(168, 'Chicken Burger', 120, 1),
(168, 'Cheese Dog', 110, 1),
(168, 'Hamburger', 160, 1),
(169, 'Spring Roll', 130, 1),
(169, 'Chicken Burger', 120, 1),
(169, 'Cheese Dog', 110, 1),
(169, 'Hamburger', 160, 1),
(170, 'Spring Roll', 130, 1),
(170, 'Chicken Burger', 120, 1),
(170, 'Cheese Dog', 110, 1),
(170, 'Hamburger', 160, 1),
(171, 'Spring Roll', 130, 1),
(171, 'Chicken Burger', 120, 1),
(171, 'Cheese Dog', 110, 1),
(171, 'Hamburger', 160, 1),
(172, 'Spring Roll', 130, 1),
(172, 'Chicken Burger', 120, 1),
(172, 'Cheese Dog', 110, 1),
(172, 'Hamburger', 160, 1),
(173, 'Spring Roll', 130, 1),
(173, 'Chicken Burger', 120, 1),
(173, 'Cheese Dog', 110, 1),
(173, 'Hamburger', 160, 1),
(174, 'Spring Roll', 130, 1),
(174, 'Chicken Burger', 120, 1),
(174, 'Cheese Dog', 110, 1),
(174, 'Hamburger', 160, 1),
(175, 'Spring Roll', 130, 1),
(175, 'Chicken Burger', 120, 1),
(175, 'Cheese Dog', 110, 1),
(175, 'Hamburger', 160, 1),
(176, 'Spring Roll', 130, 1),
(176, 'Chicken Burger', 120, 1),
(176, 'Cheese Dog', 110, 1),
(176, 'Hamburger', 160, 1),
(177, 'Spring Roll', 130, 1),
(177, 'Chicken Burger', 120, 1),
(177, 'Cheese Dog', 110, 1),
(177, 'Hamburger', 160, 1),
(178, 'Spring Roll', 130, 1),
(178, 'Chicken Burger', 120, 1),
(178, 'Cheese Dog', 110, 1),
(178, 'Hamburger', 160, 1),
(179, 'Spring Roll', 130, 1),
(179, 'Chicken Burger', 120, 1),
(179, 'Cheese Dog', 110, 1),
(180, 'Spring Roll', 130, 1),
(180, 'Chicken Burger', 120, 1),
(180, 'Cheese Dog', 110, 1),
(181, 'Chicken Kiev Balls', 200, 1),
(181, 'Vegetarian Pizza', 300, 1),
(182, 'Chicken Kiev Balls', 200, 1),
(182, 'Vegetarian Pizza', 300, 1),
(183, 'Chicken Kiev Balls', 200, 1),
(183, 'Vegetarian Pizza', 300, 1),
(184, 'Chicken Kiev Balls', 200, 1),
(184, 'Vegetarian Pizza', 300, 1),
(185, 'Beef Burger', 150, 1),
(185, 'Deluxe Pizza ', 490, 1),
(186, 'Shingara', 100, 2),
(186, 'Spring Roll', 130, 1),
(187, 'Spring Roll', 130, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_manager`
--

CREATE TABLE `order_manager` (
  `order_id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `cus_name` text NOT NULL,
  `cus_email` varchar(100) NOT NULL,
  `cus_add1` varchar(100) NOT NULL,
  `cus_city` text NOT NULL,
  `cus_phone` bigint(100) NOT NULL,
  `payment_status` varchar(100) NOT NULL,
  `order_date` datetime NOT NULL,
  `total_amount` int(11) NOT NULL,
  `transaction_id` varchar(100) NOT NULL,
  `order_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `order_manager`
--

INSERT INTO `order_manager` (`order_id`, `username`, `cus_name`, `cus_email`, `cus_add1`, `cus_city`, `cus_phone`, `payment_status`, `order_date`, `total_amount`, `transaction_id`, `order_status`) VALUES
(12, '', 'Nazrul Islam', 'nazrul.334@gmail.com', 'Badda, Dhaka', 'Dhaka', 16475347689, 'successful', '2022-02-16 08:17:29', 470, 'ONL-PAY-20XSKIEKLF', ''),
(13, '', 'Maheosy Haque', 'maheosy.sristy@gmail.com', 'Banani, Dhaka', 'Dhaka', 34534534, 'successful', '2022-02-08 10:19:27', 170, 'ONL-PAY-QM7XFUQYHR', ''),
(14, '', 'Mohammad Wasikuzzaman', 'maheosy.sristy@gmail.com', 'Banani, Dhaka', 'city name', 56756, 'successful', '2022-02-01 06:22:22', 270, 'ONL-PAY-COBQ6KWJSQ', ''),
(15, '', 'my full name', 'me@mydomain.com', '01', 'city name', 65, 'successful', '2022-02-01 07:42:35', 150, 'ONL-PAY-LJIBHV3TK8', ''),
(16, '', 'my full name', 'me@mydomain.com', '01', 'city name', 67, 'successful', '0000-00-00 00:00:00', 100, 'ONL-PAY-TFWV0J5REO', ''),
(17, '', 'my full name', 'me@mydomain.com', '01', 'city name', 76, 'successful', '0000-00-00 00:00:00', 130, 'ONL-PAY-GY1UBIG5RX', ''),
(18, '', 'my full name', 'me@mydomain.com', '01', 'city name', 54, 'successful', '0000-00-00 00:00:00', 270, 'ONL-PAY-FYCCSXTQHX', ''),
(19, '', 'my full name', 'me@mydomain.com', '01', 'city name', 54, 'successful', '0000-00-00 00:00:00', 150, 'ONL-PAY-DRV44CERAQ', ''),
(20, '', 'my full name', 'me@mydomain.com', '01', 'city name', 78, 'successful', '0000-00-00 00:00:00', 230, 'ONL-PAY-UXZ7UIZ402', ''),
(21, '', 'This is a Test', 'test@sfdf.com', 'asdasd', 'dhaka', 3232, 'successful', '0000-00-00 00:00:00', 270, 'ONL-PAY-SSRRW2IYZE', ''),
(22, '', 'my full name', 'me@mydomain.com', '01', 'city name', 556, 'successful', '0000-00-00 00:00:00', 230, 'ONL-PAY-68N704WBI7', ''),
(23, '', 'my full name', 'me@mydomain.com', '01', 'city name', 76, 'successful', '0000-00-00 00:00:00', 280, 'ONL-PAY-PI6P46TMJS', ''),
(24, '', 'my full name', 'me@mydomain.com', '01', 'city name', 65, 'successful', '0000-00-00 00:00:00', 100, 'ONL-PAY-3M2UBMTZ01', ''),
(25, '', 'my full name', 'me@mydomain.com', '01', 'city name', 65, 'pending', '0000-00-00 00:00:00', 300, 'ONL-PAY-AWGN1Q66L9', ''),
(26, '', 'my full name', 'me@mydomain.com', '01', 'city name', 65, 'pending', '0000-00-00 00:00:00', 250, 'ONL-PAY-JSD8Y4AWW9', ''),
(27, '', 'my full name', 'me@mydomain.com', '01', 'city name', 65, 'pending', '0000-00-00 00:00:00', 270, 'ONL-PAY-S89OQX0OZD', ''),
(28, '', 'my full name', 'me@mydomain.com', '01', 'city name', 66, 'pending', '0000-00-00 00:00:00', 290, 'ONL-PAY-3EZX9X9K5J', ''),
(29, '', 'Asad Ali', 'asad45@gmail.com', 'House-34, Road 5, Sector7, Uttara', 'Dhaka', 1765349826, 'successful', '0000-00-00 00:00:00', 1310, 'ONL-PAY-6V6RYWX24Z', ''),
(30, '', 'Tamin Ahmed', 'tamim354@gmail.com', 'Uttara, Dhaka', 'Dhaka', 1876563854, 'successful', '0000-00-00 00:00:00', 420, 'ONL-PAY-WVQRSZGWMW', ''),
(31, '', 'my full name', 'me@mydomain.com', '01', 'city name', 8, 'successful', '0000-00-00 00:00:00', 940, 'ONL-PAY-LDFBBO3TJW', ''),
(32, '', 'Wasikuzzaman', 'wasik0003@gmail.com', 'House -15, Road - 19, Nikunja', 'Dhaka', 1717731002, 'successful', '0000-00-00 00:00:00', 460, 'ONL-PAY-7UBFJLE87H', ''),
(33, '', 'Eureka', 'euiiak@gmals.com', 'Sjsjsk', 'Djdjskş', 101, 'successful', '0000-00-00 00:00:00', 750, 'ONL-PAY-GWBLBMSVB8', ''),
(34, '', 'Seems like This is working', 'Yeahh@sohappy.com', 'Finally after all the hardworks', 'I can sigh a breath of relief', 999999, 'successful', '0000-00-00 00:00:00', 880, 'ONL-PAY-VHMONRPXA1', ''),
(35, '', 'Maheosy Haque', 'maheosy.sristy@gmail.com', 'Banani, Dhaka', 'Dhaka', 2121212, 'successful', '0000-00-00 00:00:00', 1080, 'ONL-PAY-C67X5PHHX4', ''),
(36, '', 'Shoriful Islam', 'shorif65@gmail.com', 'House 45, Road 2, Nikunja ', 'Dhaka', 1876349236, 'successful', '0000-00-00 00:00:00', 300, 'ONL-PAY-OSKZYF7J42', ''),
(37, '', 'Farook Ahmed', 'farook345@hotmail.com', 'House 4, Road 19, Sector 3, Uttara', 'Dhaka', 1934826457, 'successful', '0000-00-00 00:00:00', 250, 'ONL-PAY-X3U8QMX9UG', ''),
(38, '', 'Nazmul Islam', 'naz90@yahoo.com', 'House 20, Road 4, Block D, Aftabnagar', 'Dhaka', 1729458729, 'pending', '0000-00-00 00:00:00', 490, 'ONL-PAY-7PVDA9NVIL', ''),
(39, '', 'my full name', 'me@mydomain.com', '01', 'city name', 11, 'successful', '0000-00-00 00:00:00', 240, 'ONL-PAY-GDGUVQOCL3', ''),
(40, '', 'Monir Ali', 'monir56@gmail.com', 'Uttara, Dhaka', 'Dhaka', 17232567642, 'successful', '0000-00-00 00:00:00', 360, 'ONL-PAY-IRDBF59HGR', ''),
(41, '', 'Jalal Molla', 'jalal34@gmail.com', 'Basabo, Dhaka', 'Dhaka', 17822347345, 'successful', '0000-00-00 00:00:00', 160, 'ONL-PAY-9U0IWYR96U', ''),
(42, '', 'Jalal Molla', 'jalal34@gmail.com', 'Basabo, Dhaka', 'Dhaka', 17822347345, 'successful', '0000-00-00 00:00:00', 160, 'ONL-PAY-9U0IWYR96U', ''),
(43, '', 'Jalal Molla', 'jalal34@gmail.com', 'Basabo, Dhaka', 'Dhaka', 17822347345, 'successful', '0000-00-00 00:00:00', 160, 'ONL-PAY-9U0IWYR96U', ''),
(44, '', 'Jalal Molla', 'jalal34@gmail.com', 'Basabo, Dhaka', 'Dhaka', 17822347345, 'successful', '0000-00-00 00:00:00', 160, 'ONL-PAY-9U0IWYR96U', ''),
(45, '', 'Jalal Molla', 'jalal34@gmail.com', 'Basabo, Dhaka', 'Dhaka', 17822347345, 'successful', '0000-00-00 00:00:00', 160, 'ONL-PAY-9U0IWYR96U', ''),
(46, '', 'Jalal Molla', 'jalal34@gmail.com', 'Basabo, Dhaka', 'Dhaka', 17822347345, 'successful', '0000-00-00 00:00:00', 160, 'ONL-PAY-9U0IWYR96U', ''),
(47, '', 'Jalal Molla', 'jalal34@gmail.com', 'Basabo, Dhaka', 'Dhaka', 17822347345, 'successful', '0000-00-00 00:00:00', 160, 'ONL-PAY-9U0IWYR96U', ''),
(48, '', 'Jalal Molla', 'jalal34@gmail.com', 'Basabo, Dhaka', 'Dhaka', 17822347345, 'successful', '0000-00-00 00:00:00', 160, 'ONL-PAY-9U0IWYR96U', ''),
(49, '', 'Jalal Molla', 'jalal34@gmail.com', 'Basabo, Dhaka', 'Dhaka', 17822347345, 'successful', '0000-00-00 00:00:00', 160, 'ONL-PAY-9U0IWYR96U', ''),
(50, '', 'Kobita Begum', 'kobita456@gmail.com', 'Dhanmondi,Dhaka', 'Dhaka', 1876452946, 'successful', '0000-00-00 00:00:00', 110, 'ONL-PAY-FSSWV66LPV', ''),
(51, '', 'Kobita Begum', 'kobita456@gmail.com', 'Dhanmondi,Dhaka', 'Dhaka', 1876452946, 'successful', '0000-00-00 00:00:00', 110, 'ONL-PAY-FSSWV66LPV', ''),
(52, '', 'Kobita Begum', 'kobita456@gmail.com', 'Dhanmondi,Dhaka', 'Dhaka', 1876452946, 'successful', '0000-00-00 00:00:00', 110, 'ONL-PAY-FSSWV66LPV', ''),
(53, '', 'Kobita Begum', 'kobita456@gmail.com', 'Dhanmondi,Dhaka', 'Dhaka', 1876452946, 'successful', '0000-00-00 00:00:00', 110, 'ONL-PAY-FSSWV66LPV', ''),
(54, '', 'Kobita Begum', 'kobita456@gmail.com', 'Dhanmondi,Dhaka', 'Dhaka', 1876452946, 'successful', '0000-00-00 00:00:00', 110, 'ONL-PAY-FSSWV66LPV', ''),
(55, '', 'Kobita Begum', 'kobita456@gmail.com', 'Dhanmondi,Dhaka', 'Dhaka', 1876452946, 'successful', '0000-00-00 00:00:00', 110, 'ONL-PAY-FSSWV66LPV', ''),
(56, '', 'Kobita Begum', 'kobita456@gmail.com', 'Dhanmondi,Dhaka', 'Dhaka', 1876452946, 'successful', '0000-00-00 00:00:00', 110, 'ONL-PAY-FSSWV66LPV', ''),
(57, '', 'Kobita Begum', 'kobita456@gmail.com', 'Dhanmondi,Dhaka', 'Dhaka', 1876452946, 'successful', '0000-00-00 00:00:00', 110, 'ONL-PAY-FSSWV66LPV', ''),
(58, '', 'Kobita Begum', 'kobita456@gmail.com', 'Dhanmondi,Dhaka', 'Dhaka', 1876452946, 'successful', '0000-00-00 00:00:00', 110, 'ONL-PAY-FSSWV66LPV', ''),
(59, '', 'Kobita Begum', 'kobita456@gmail.com', 'Dhanmondi,Dhaka', 'Dhaka', 1876452946, 'successful', '0000-00-00 00:00:00', 110, 'ONL-PAY-FSSWV66LPV', ''),
(60, '', 'Kobita Begum', 'kobita456@gmail.com', 'Dhanmondi,Dhaka', 'Dhaka', 1876452946, 'successful', '0000-00-00 00:00:00', 110, 'ONL-PAY-FSSWV66LPV', ''),
(61, '', 'Tashin', 'tash7@gmail.com', 'Basundhara RA', 'Dhaka', 1863495433, 'successful', '0000-00-00 00:00:00', 590, 'ONL-PAY-KR8K8ZYVGM', ''),
(62, '', 'Tashin', 'tash7@gmail.com', 'Basundhara RA', 'Dhaka', 1863495433, 'successful', '0000-00-00 00:00:00', 590, 'ONL-PAY-KR8K8ZYVGM', ''),
(63, '', 'Tashin', 'tash7@gmail.com', 'Basundhara RA', 'Dhaka', 1863495433, 'successful', '0000-00-00 00:00:00', 590, 'ONL-PAY-KR8K8ZYVGM', ''),
(64, '', 'Tashin', 'tash7@gmail.com', 'Basundhara RA', 'Dhaka', 1863495433, 'successful', '0000-00-00 00:00:00', 590, 'ONL-PAY-KR8K8ZYVGM', ''),
(65, '', 'Tashin', 'tash7@gmail.com', 'Basundhara RA', 'Dhaka', 1863495433, 'successful', '0000-00-00 00:00:00', 590, 'ONL-PAY-KR8K8ZYVGM', ''),
(66, '', 'Tashin', 'tash7@gmail.com', 'Basundhara RA', 'Dhaka', 1863495433, 'successful', '0000-00-00 00:00:00', 590, 'ONL-PAY-KR8K8ZYVGM', ''),
(67, '', 'Xasha Rahman', 'xasha34@gmail.com', 'Banani, Dhaka', 'Dhaka', 1967349323, 'successful', '0000-00-00 00:00:00', 450, 'ONL-PAY-Y7OP0RYLOB', 'Cancelled'),
(68, '', 'Lokman Rahman', 'lokman56@gmail.com', 'Uttara, Dhaka', 'Dhaka', 1873343234, 'pending', '0000-00-00 00:00:00', 120, 'ONL-PAY-01H14DTP77', ''),
(69, '', 'Lokman Rahman', 'lokman56@gmail.com', 'Uttara, Dhaka', 'Dhaka', 1873343234, 'pending', '0000-00-00 00:00:00', 120, 'ONL-PAY-01H14DTP77', ''),
(70, '', 'Lokman Rahman', 'lokman56@gmail.com', 'Uttara, Dhaka', 'Dhaka', 1873343234, 'pending', '0000-00-00 00:00:00', 120, 'ONL-PAY-01H14DTP77', ''),
(71, '', 'Lokman Rahman', 'lokman56@gmail.com', 'Uttara, Dhaka', 'Dhaka', 1873343234, 'pending', '0000-00-00 00:00:00', 120, 'ONL-PAY-01H14DTP77', ''),
(72, '', 'Lokman Rahman', 'lokman56@gmail.com', 'Uttara, Dhaka', 'Dhaka', 1873343234, 'pending', '0000-00-00 00:00:00', 120, 'ONL-PAY-01H14DTP77', ''),
(73, '', 'Numna', 'numna34@gmail.com', 'Demra, Dhaka', 'Dhaka', 1876349934, 'successful', '0000-00-00 00:00:00', 110, 'ONL-PAY-CF0ZZ553WD', ''),
(74, '', 'Numna', 'numna34@gmail.com', 'Demra, Dhaka', 'Dhaka', 1876349934, 'successful', '0000-00-00 00:00:00', 110, 'ONL-PAY-CF0ZZ553WD', 'Pending'),
(75, '', 'Sultan', 'sultan45@gmail.com', 'Nikunja, Dhaka', 'Dhaka', 1876348465, 'successful', '0000-00-00 00:00:00', 300, 'ONL-PAY-EWEJN2ZP7P', ''),
(76, '', 'Jamila Jameel', 'jamila34@gmail.com', 'Badda, Dhaka', 'Dhaka', 1876343495, 'successful', '0000-00-00 00:00:00', 120, 'ONL-PAY-C1HFESV819', 'Processing'),
(77, '', 'Tom Hanks', 'tom45@gmail.com', 'Dhanmondi, Dhaka', 'Dhaka', 17656349832, 'successful', '0000-00-00 00:00:00', 390, 'ONL-PAY-G7PB7WULEF', 'Processing'),
(78, '', 'Sumona Akter', 'sumona43@yahoo.com', 'Cantonment,Dhaka', 'Dhaka', 1763838232, 'successful', '0000-00-00 00:00:00', 540, 'ONL-PAY-H8GFL3LYB7', 'Delivered'),
(79, '', 'Sumona Akter', 'sumona43@yahoo.com', 'Cantonment,Dhaka', 'Dhaka', 1763838232, 'successful', '0000-00-00 00:00:00', 540, 'ONL-PAY-H8GFL3LYB7', 'Pending'),
(80, '', 'Sabir Ahmed', 'sabir34@gmail.com', 'Mirpur,Dhaka', 'Dhaka', 1876344832, 'successful', '0000-00-00 00:00:00', 200, 'ONL-PAY-3XF146V92Q', 'Cancelled'),
(81, '', 'Sabir Ahmed', 'sabir34@gmail.com', 'Mirpur,Dhaka', 'Dhaka', 1876344832, 'successful', '0000-00-00 00:00:00', 200, 'ONL-PAY-3XF146V92Q', 'Processing'),
(82, '', 'Jahangir Alom', 'jahnalom@yahoo.com', 'Uttara,Dhaka', 'Dhaka', 1986473747, 'successful', '0000-00-00 00:00:00', 320, 'ONL-PAY-6EF97NAH6Y', 'Cancelled'),
(83, '', 'Muhtasim Mubassir', 'aumi65@gmail.com', 'Dhanmondi, Dhaka', 'Dhaka', 1867346529, 'successful', '0000-00-00 00:00:00', 660, 'ONL-PAY-17FUFJJVGE', 'Processing'),
(84, '', 'Shanto Islam', 'shanto342@yahoo.com', 'Mirpur 14, Dhaka', 'Dhaka', 1673495624, 'successful', '0000-00-00 00:00:00', 480, 'ONL-PAY-W4VHG5CDC4', 'Delivered'),
(85, '', 'Abir Ahmed', 'abir@gmail.com', 'Fargate,Dhaka', 'Dhaka', 1876374823, 'successful', '0000-00-00 00:00:00', 200, 'ONL-PAY-RVDHMHT7Z8', 'Delivered'),
(86, '', 'Maheosy Haque', 'maheosy.sristy@gmail.com', 'Banani,Dhaka', 'Dhaka', 1878456734, 'successful', '0000-00-00 00:00:00', 1700, 'ONL-PAY-RA3OFS3JAG', 'Delivered'),
(87, '', 'Mohammad Wasikuzzaman', 'wasik0003@gmail.com', 'Nikunja,Dhaka', 'Dhaka', 17177301002, 'successful', '0000-00-00 00:00:00', 660, 'ONL-PAY-V5AA6J9NHX', 'Delivered'),
(88, '', 'Robin', 'rob31@yahoo.com', 'Mirpur,Dhaka', 'Dhaka', 19672345423, 'successful', '0000-00-00 00:00:00', 480, 'ONL-PAY-CUGZZYPKXL', 'Delivered'),
(89, '', 'Maheosy Haque', 'numna34@gmail.com', 'Dhanmondi, Dhaka', 'Dhaka', 1723453478, 'successful', '0000-00-00 00:00:00', 300, 'ONL-PAY-03OZKBZ163', 'Delivered'),
(90, '', 'Jay Shah', 'jay69@gmail.com', 'Uttara,Dhaka', 'Dhaka ', 167349264, 'successful', '0000-00-00 00:00:00', 100, 'ONL-PAY-J1VSWT7Y36', 'Delivered'),
(91, '', 'Abdul ', 'abdul@gmail.com', 'Demra, Dhaka', 'Dhaka', 1756369234, 'successful', '0000-00-00 00:00:00', 350, 'ONL-PAY-VU2GQSCWIE', 'Delivered'),
(92, '', 'Rahi', 'rahi67@yahoo.com', 'Banani,Dhaka', 'Dhaka', 156394534, 'successful', '2022-02-10 12:33:45', 100, 'ONL-PAY-GWG4PRVRS6', 'Processing'),
(93, '', 'Bashar', 'bash97@yahoo.com', 'Mirpur 14, Dhaka', 'Dhaka', 1345982634, 'successful', '2022-02-10 05:35:19', 320, 'ONL-PAY-DTYI65WPX7', 'Delivered'),
(94, '', 'Kamal Khan', 'kamal65@gmail.com', 'Dhanmondi, Dhaka', 'Dhaka', 1763482934, 'successful', '2022-02-10 05:41:22', 300, 'ONL-PAY-9M8MHK5ROM', 'Delivered'),
(95, 'wasik0003', 'Mohammad Wasikuzzaman', 'wasikz331@gmail.com', 'Bhaluka Municipality, Bhaluka, Mymensingh.', 'Mymensingh', 1717731002, 'successful', '2022-02-14 03:38:43', 100, 'ONL-PAY-KI6TWT6P0S', 'Pending'),
(97, 'wasik0003', 'Mohammad Wasikuzzaman', 'wasikz331@gmail.com', 'Bhaluka Municipality, Bhaluka, Mymensingh.', 'Mymensingh', 1717731002, 'successful', '2022-02-14 03:46:19', 120, 'ONL-PAY-SK7IM5U84G', 'Delivered'),
(102, 'user', 'Hassan', 'hassan@gmail.com', 'Kajjansi', 'wakiso', 705068168, 'pending', '2024-02-15 04:28:59', 110, 'ONL-PAY-9WNEUFH72W', 'Pending'),
(103, 'user', 'Hassan', 'hassan@gmail.com', 'Kajjansi', 'wakiso', 705068168, 'pending', '2024-02-15 05:10:14', 590, 'ONL-PAY-80B20EXCN7', 'Pending'),
(104, 'user', 'Hassan', 'hassan@gmail.com', 'Kajjansi', 'wakiso', 705068168, 'pending', '2024-02-15 07:42:56', 480, 'ONL-PAY-9BZFA8E0N5', 'Pending'),
(105, 'user', 'Hassan', 'hassan@gmail.com', 'Kajjansi', 'wakiso', 705068168, 'pending', '2024-02-15 06:52:50', 110, 'ONL-PAY-13LHKD9FG6', 'Pending'),
(106, 'user', 'Hassan', 'hassan@gmail.com', 'Kajjansi', 'wakiso', 705068168, 'pending', '2024-02-15 07:02:26', 280, 'ONL-PAY-JS91RIUAML', 'Pending'),
(107, 'user', 'Hassan', 'hassan@gmail.com', 'Kajjansi', 'wakiso', 705068168, 'pending', '2024-02-15 07:22:28', 300, 'ONL-PAY-SAIEH10GVW', 'Pending'),
(108, 'user', 'Hassan', 'hassan@gmail.com', 'Kajjansi', 'wakiso', 705068168, 'pending', '2024-02-15 07:24:06', 110, 'ONL-PAY-80VPO08M6R', 'Pending'),
(109, 'user', 'Hassan', 'hassan@gmail.com', 'Kajjansi', 'wakiso', 705068168, 'pending', '2024-02-15 07:30:26', 110, 'ONL-PAY-WH9BT8HSUI', 'Pending'),
(110, 'user', 'Hassan', 'hassan@gmail.com', 'Kajjansi', 'wakiso', 705068168, 'pending', '2024-02-15 07:31:44', 120, 'ONL-PAY-ITST58A8EU', 'Pending'),
(111, 'user', 'Hassan', 'hassan@gmail.com', 'Kajjansi', 'wakiso', 705068168, 'pending', '2024-02-15 07:36:29', 120, 'ONL-PAY-ETUXUM4HDT', 'Pending'),
(112, 'user', 'Hassan', 'hassan@gmail.com', 'Kajjansi', 'wakiso', 705068168, 'pending', '2024-02-15 07:37:33', 270, 'ONL-PAY-MAOL6U6KSU', 'Pending'),
(113, 'user', 'Hassan', 'hassan@gmail.com', 'Kajjansi', 'wakiso', 705068168, 'pending', '2024-02-15 07:38:57', 280, 'ONL-PAY-UXMBZX5HIC', 'Pending'),
(114, 'user', 'Hassan', 'hassan@gmail.com', 'Kajjansi', 'wakiso', 705068168, 'pending', '2024-02-15 07:53:04', 110, 'ONL-PAY-NBQN31K145', 'Pending'),
(115, 'user', 'Hassan', 'hassan@gmail.com', 'Kajjansi', 'wakiso', 705068168, 'pending', '2024-02-15 07:54:10', 110, 'ONL-PAY-G25DN9Q4Y0', 'Pending'),
(116, 'user', 'Hassan', 'hassan@gmail.com', 'Kajjansi', 'wakiso', 705068168, 'pending', '2024-02-15 07:55:02', 110, 'ONL-PAY-VYOLRFIMFP', 'Pending'),
(117, 'user', 'Hassan', 'hassan@gmail.com', 'Kajjansi', 'wakiso', 705068168, 'pending', '2024-02-15 07:55:39', 110, 'ONL-PAY-OLYXKCWCRT', 'Pending'),
(118, 'user', 'Hassan', 'hassan@gmail.com', 'Kajjansi', 'wakiso', 705068168, 'pending', '2024-02-15 08:06:25', 120, 'ONL-PAY-0ACXJPCWO2', 'Pending'),
(119, 'user', 'Hassan', 'hassan@gmail.com', 'Kajjansi', 'wakiso', 705068168, 'pending', '2024-02-15 08:14:30', 120, 'ONL-PAY-U0C5W1KY3U', 'Pending'),
(120, 'user', 'Hassan', 'hassan@gmail.com', 'Kajjansi', 'wakiso', 705068168, 'pending', '2024-02-15 08:21:28', 110, 'ONL-PAY-P5W53XR3BP', 'Pending'),
(121, 'user', 'Hassan', 'hassan@gmail.com', 'Kajjansi', 'wakiso', 705068168, 'pending', '2024-02-15 08:23:06', 110, 'ONL-PAY-WQQF5PZ4JH', 'Pending'),
(122, 'user', 'Hassan', 'hassan@gmail.com', 'Kajjansi', 'wakiso', 705068168, 'pending', '2024-02-15 08:25:12', 110, 'ONL-PAY-RG6PYEJLDP', 'Pending'),
(123, 'user', 'Hassan', 'hassan@gmail.com', 'Kajjansi', 'wakiso', 705068168, 'pending', '2024-02-15 08:31:16', 110, 'ONL-PAY-HS4Q6NGF8V', 'Pending'),
(124, 'user', 'Hassan', 'hassan@gmail.com', 'Kajjansi', 'wakiso', 705068168, 'pending', '2024-02-15 08:32:56', 110, 'ONL-PAY-ACXKIV8DHY', 'Pending'),
(125, 'user', 'Hassan', 'hassan@gmail.com', 'Kajjansi', 'wakiso', 705068168, 'pending', '2024-02-15 08:36:57', 210, 'ONL-PAY-YRLSS7LCQT', 'Pending'),
(126, 'user', 'Hassan', 'hassan@gmail.com', 'Kajjansi', 'wakiso', 705068168, 'pending', '2024-02-15 08:38:37', 160, 'ONL-PAY-VR2C0LXPAK', 'Pending'),
(127, 'user', 'Hassan', 'hassan@gmail.com', 'Kajjansi', 'wakiso', 705068168, 'pending', '2024-02-15 08:50:49', 110, 'ONL-PAY-LVJWFJIL20', 'Pending'),
(128, 'user', 'Hassan', 'hassan@gmail.com', 'Kajjansi', 'wakiso', 705068168, 'pending', '2024-02-15 09:01:19', 110, 'ONL-PAY-BP8R2VZM9U', 'Pending'),
(129, 'user', 'Hassan', 'hassan@gmail.com', 'Kajjansi', 'wakiso', 705068168, 'pending', '2024-02-15 09:01:57', 110, 'ONL-PAY-BP8R2VZM9U', 'Pending'),
(130, 'user', 'Hassan', 'hassan@gmail.com', 'Kajjansi', 'wakiso', 705068168, 'pending', '2024-02-15 09:03:41', 110, 'ONL-PAY-BP8R2VZM9U', 'Pending'),
(131, 'user', 'Hassan', 'hassan@gmail.com', 'Kajjansi', 'wakiso', 705068168, 'pending', '2024-02-15 09:08:40', 110, 'ONL-PAY-JAFI1EENW2', 'Pending'),
(132, 'user', 'Hassan', 'hassan@gmail.com', 'Kajjansi', 'wakiso', 705068168, 'pending', '2024-02-15 09:10:39', 110, 'ONL-PAY-S78TP53I4K', 'Pending'),
(133, 'user', 'Hassan', 'hassan@gmail.com', 'Kajjansi', 'wakiso', 705068168, 'pending', '2024-02-15 09:13:35', 110, 'ONL-PAY-YM8UUVINMT', 'Pending'),
(134, 'user', 'Hassan', 'hassan@gmail.com', 'Kajjansi', 'wakiso', 705068168, 'pending', '2024-02-15 09:14:07', 110, 'ONL-PAY-34U2JK1KDJ', 'Pending'),
(135, 'user', 'Hassan', 'hassan@gmail.com', 'Kajjansi', 'wakiso', 705068168, 'pending', '2024-02-15 09:17:08', 110, 'ONL-PAY-ZQH00ZPYFG', 'Pending'),
(136, 'user', 'Hassan', 'hassan@gmail.com', 'Kajjansi', 'wakiso', 705068168, 'pending', '2024-02-15 09:24:28', 110, 'ONL-PAY-VQ7VERKH5L', 'Pending'),
(137, 'user', 'Hassan', 'hassan@gmail.com', 'Kajjansi', 'wakiso', 705068168, 'pending', '2024-02-15 09:28:08', 110, 'ONL-PAY-BXQ4CHHJZX', 'Pending'),
(138, 'user', 'Hassan', 'hassan@gmail.com', 'Kajjansi', 'wakiso', 705068168, 'pending', '2024-02-15 09:37:17', 110, 'ONL-PAY-9OYL3EQ5K4', 'Pending'),
(139, 'user', 'Hassan', 'hassan@gmail.com', 'Kajjansi', 'wakiso', 705068168, 'pending', '2024-02-15 09:38:25', 110, 'ONL-PAY-H9GDHXK7DH', 'Pending'),
(140, 'user', 'Hassan', 'hassan@gmail.com', 'Kajjansi', 'wakiso', 705068168, 'pending', '2024-02-16 12:22:35', 270, 'ONL-PAY-0ESGC1GLJJ', 'Pending'),
(141, 'user', 'Hassan', 'hassan@gmail.com', 'Kajjansi', 'wakiso', 705068168, 'pending', '2024-02-16 12:23:53', 270, 'ONL-PAY-0ESGC1GLJJ', 'Pending'),
(142, 'user', 'Hassan', 'hassan@gmail.com', 'Kajjansi', 'wakiso', 705068168, 'pending', '2024-02-16 12:25:15', 110, 'ONL-PAY-5BAWOEKPPD', 'Pending'),
(143, 'user', 'Hassan', 'hassan@gmail.com', 'Kajjansi', 'wakiso', 705068168, 'pending', '2024-02-16 12:41:17', 110, 'ONL-PAY-5BAWOEKPPD', 'Pending'),
(144, 'user', 'Hassan', 'hassan@gmail.com', 'Kajjansi', 'wakiso', 705068168, 'pending', '2024-02-16 12:41:46', 270, 'ONL-PAY-CJSRT2T1MF', 'Pending'),
(145, 'user', 'Hassan', 'hassan@gmail.com', 'Kajjansi', 'wakiso', 705068168, 'pending', '2024-02-16 12:46:07', 270, 'ONL-PAY-CJSRT2T1MF', 'Pending'),
(146, 'user', 'Hassan', 'hassan@gmail.com', 'Kajjansi', 'wakiso', 705068168, 'pending', '2024-02-16 12:46:30', 270, 'ONL-PAY-7F19VUB1TA', 'Pending'),
(147, 'user', 'Hassan', 'hassan@gmail.com', 'Kajjansi', 'wakiso', 705068168, 'pending', '2024-02-16 12:46:57', 270, 'ONL-PAY-7F19VUB1TA', 'Pending'),
(148, 'user', 'Hassan', 'hassan@gmail.com', 'Kajjansi', 'wakiso', 705068168, 'pending', '2024-02-16 12:47:44', 280, 'ONL-PAY-0RUY7DNQJN', 'Pending'),
(149, 'user', 'Hassan', 'hassan@gmail.com', 'Kajjansi', 'wakiso', 705068168, 'pending', '2024-02-16 12:48:53', 210, 'ONL-PAY-PZQ3NFDZ5M', 'Pending'),
(150, 'user', 'Hassan', 'hassan@gmail.com', 'Kajjansi', 'wakiso', 705068168, 'pending', '2024-02-16 12:50:21', 230, 'ONL-PAY-SR9X0GQL40', 'Pending'),
(151, 'user', 'Hassan', 'hassan@gmail.com', 'Kajjansi', 'wakiso', 705068168, 'pending', '2024-02-16 12:54:58', 410, 'ONL-PAY-8MJ9Z1C7CG', 'Pending'),
(152, 'user', 'Hassan', 'hassan@gmail.com', 'Kajjansi', 'wakiso', 705068168, 'pending', '2024-02-16 12:57:32', 250, 'ONL-PAY-HSNW7TPFLW', 'Pending'),
(153, 'user', 'Hassan', 'hassan@gmail.com', 'Kajjansi', 'wakiso', 705068168, 'pending', '2024-02-16 12:59:39', 250, 'ONL-PAY-ILUEJ5OZXL', 'Pending'),
(154, 'user', 'Hassan', 'hassan@gmail.com', 'Kajjansi', 'wakiso', 705068168, 'pending', '2024-02-16 01:04:10', 250, 'ONL-PAY-IZHFX9RRBP', 'Pending'),
(155, 'user', 'Hassan', 'hassan@gmail.com', 'Kajjansi', 'wakiso', 705068168, 'pending', '2024-02-16 01:14:28', 520, 'ONL-PAY-HJHW1QC3OY', 'Pending'),
(156, 'user', 'Hassan', 'hassan@gmail.com', 'Kajjansi', 'wakiso', 705068168, 'pending', '2024-02-16 01:16:07', 520, 'ONL-PAY-NB33PL64PM', 'Pending'),
(157, 'user', 'Hassan', 'hassan@gmail.com', 'Kajjansi', 'wakiso', 705068168, 'pending', '2024-02-16 02:06:50', 520, 'ONL-PAY-NB33PL64PM', 'Pending'),
(158, 'user', 'Hassan', 'hassan@gmail.com', 'Kajjansi', 'wakiso', 705068168, 'pending', '2024-02-16 02:09:05', 520, 'ONL-PAY-NB33PL64PM', 'Pending'),
(159, 'user', 'Hassan', 'hassan@gmail.com', 'Kajjansi', 'wakiso', 705068168, 'pending', '2024-02-16 02:10:34', 520, 'ONL-PAY-NB33PL64PM', 'Pending'),
(160, 'user', 'Hassan', 'hassan@gmail.com', 'Kajjansi', 'wakiso', 705068168, 'pending', '2024-02-16 02:13:03', 520, 'ONL-PAY-NB33PL64PM', 'Pending'),
(161, 'user', 'Hassan', 'hassan@gmail.com', 'Kajjansi', 'wakiso', 705068168, 'pending', '2024-02-16 02:14:04', 520, 'ONL-PAY-NB33PL64PM', 'Pending'),
(162, 'user', 'Hassan', 'hassan@gmail.com', 'Kajjansi', 'wakiso', 705068168, 'pending', '2024-02-16 02:14:29', 520, 'ONL-PAY-NB33PL64PM', 'Pending'),
(163, 'user', 'Hassan', 'hassan@gmail.com', 'Kajjansi', 'wakiso', 705068168, 'pending', '2024-02-16 02:16:52', 520, 'ONL-PAY-NB33PL64PM', 'Pending'),
(164, 'user', 'Hassan', 'hassan@gmail.com', 'Kajjansi', 'wakiso', 705068168, 'pending', '2024-02-16 02:16:59', 520, 'ONL-PAY-NB33PL64PM', 'Pending'),
(165, 'user', 'Hassan', 'hassan@gmail.com', 'Kajjansi', 'wakiso', 705068168, 'pending', '2024-02-16 02:17:56', 520, 'ONL-PAY-NB33PL64PM', 'Pending'),
(166, 'user', 'Hassan', 'hassan@gmail.com', 'Kajjansi', 'wakiso', 705068168, 'pending', '2024-02-16 02:18:53', 520, 'ONL-PAY-NB33PL64PM', 'Pending'),
(167, 'user', 'Hassan', 'hassan@gmail.com', 'Kajjansi', 'wakiso', 705068168, 'pending', '2024-02-16 02:21:15', 520, 'ONL-PAY-NB33PL64PM', 'Pending'),
(168, 'user', 'Hassan', 'hassan@gmail.com', 'Kajjansi', 'wakiso', 705068168, 'pending', '2024-02-16 02:21:35', 520, 'ONL-PAY-NB33PL64PM', 'Pending'),
(169, 'user', 'Hassan', 'hassan@gmail.com', 'Kajjansi', 'wakiso', 705068168, 'pending', '2024-02-16 02:22:39', 520, 'ONL-PAY-NB33PL64PM', 'Pending'),
(170, 'user', 'Hassan', 'hassan@gmail.com', 'Kajjansi', 'wakiso', 705068168, 'pending', '2024-02-16 02:23:23', 520, 'ONL-PAY-NB33PL64PM', 'Pending'),
(171, 'user', 'Hassan', 'hassan@gmail.com', 'Kajjansi', 'wakiso', 705068168, 'pending', '2024-02-16 02:24:59', 520, 'ONL-PAY-NB33PL64PM', 'Pending'),
(172, 'user', 'Hassan', 'hassan@gmail.com', 'Kajjansi', 'wakiso', 705068168, 'pending', '2024-02-16 02:26:41', 520, 'ONL-PAY-NB33PL64PM', 'Pending'),
(173, 'user', 'Hassan', 'hassan@gmail.com', 'Kajjansi', 'wakiso', 705068168, 'pending', '2024-02-16 02:29:31', 520, 'ONL-PAY-NB33PL64PM', 'Pending'),
(174, 'user', 'Hassan', 'hassan@gmail.com', 'Kajjansi', 'wakiso', 705068168, 'pending', '2024-02-16 02:31:50', 520, 'ONL-PAY-NB33PL64PM', 'Pending'),
(175, 'user', 'Hassan', 'hassan@gmail.com', 'Kajjansi', 'wakiso', 705068168, 'pending', '2024-02-16 02:32:50', 520, 'ONL-PAY-NB33PL64PM', 'Pending'),
(176, 'user', 'Hassan', 'hassan@gmail.com', 'Kajjansi', 'wakiso', 705068168, 'pending', '2024-02-16 02:39:08', 520, 'ONL-PAY-NB33PL64PM', 'Pending'),
(177, 'user', 'Hassan', 'hassan@gmail.com', 'Kajjansi', 'wakiso', 705068168, 'pending', '2024-02-16 02:40:03', 520, 'ONL-PAY-NB33PL64PM', 'Pending'),
(178, 'user', 'Hassan', 'hassan@gmail.com', 'Kajjansi', 'wakiso', 705068168, 'pending', '2024-02-16 02:40:41', 520, 'ONL-PAY-NB33PL64PM', 'Pending'),
(179, 'user', 'Hassan', 'hassan@gmail.com', 'Kajjansi', 'wakiso', 705068168, 'pending', '2024-02-16 02:42:13', 520, 'ONL-PAY-NB33PL64PM', 'Pending'),
(180, 'user', 'Hassan', 'hassan@gmail.com', 'Kajjansi', 'wakiso', 705068168, 'pending', '2024-02-16 02:44:24', 520, 'ONL-PAY-P87EHLA2YY', 'Pending'),
(181, 'user', 'Hassan', 'hassan@gmail.com', 'Kajjansi', 'wakiso', 705068168, 'pending', '2024-02-16 02:46:14', 500, 'ONL-PAY-0FJLUVEVXA', 'Pending'),
(182, 'user', 'Hassan', 'hassan@gmail.com', 'Kajjansi', 'wakiso', 705068168, 'successful', '2024-02-16 05:19:47', 500, 'ONL-PAY-MMPN481N37', 'Pending'),
(183, 'user', 'Hassan', 'hassan@gmail.com', 'Kajjansi', 'wakiso', 705068168, 'successful', '2024-02-16 05:20:26', 500, 'ONL-PAY-MMPN481N37', 'Pending'),
(184, 'user', 'Hassan', 'hassan@gmail.com', 'Kajjansi', 'wakiso', 705068168, 'successful', '2024-02-16 06:27:52', 500, 'ONL-PAY-MMPN481N37', 'Pending'),
(185, 'user', 'Hassan', 'hassan@gmail.com', 'Kajjansi', 'wakiso', 705068168, 'successful', '2024-02-16 06:35:24', 640, 'ONL-PAY-PSEFMJLMPR', 'Pending'),
(186, 'user', 'Hassan', 'hassan@gmail.com', 'Kajjansi', 'wakiso', 705068168, 'successful', '2024-02-16 06:42:47', 330, 'ONL-PAY-WZU9EROGQC', 'Pending'),
(187, 'user', 'Hassan', 'hassan@gmail.com', 'Kajjansi', 'wakiso', 705068168, 'successful', '2024-02-16 06:47:06', 130, 'ONL-PAY-4D53OZBE1M', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `person` varchar(20) DEFAULT NULL,
  `reservation_date` date DEFAULT NULL,
  `reservation_time` time DEFAULT NULL,
  `message` text DEFAULT NULL,
  `seating_preference` varchar(50) DEFAULT NULL,
  `reservation_type` varchar(50) DEFAULT NULL,
  `additional_notes` text DEFAULT NULL,
  `pre_order_info` text DEFAULT NULL,
  `terms_accepted` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('new','updated','cancelled') DEFAULT 'new'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `name`, `phone`, `person`, `reservation_date`, `reservation_time`, `message`, `seating_preference`, `reservation_type`, `additional_notes`, `pre_order_info`, `terms_accepted`, `created_at`, `status`) VALUES
(1, 'katongole hassan', '+256705068168', '4-person', '2024-02-05', '02:00:00', 'qwfwef', 'Patio', 'Brunch', 'qffqf', 'qfqff', 1, '2024-02-14 14:31:05', 'new');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`) VALUES
(39, 'Admin', 'Admin', 'b59c67bf196a4758191e42f76670ceba'),
(41, 'katongole hassan', 'hassan', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(41, 'Burger', 'Food_Category_81005.jpg', 'Yes', 'Yes'),
(42, 'Pizza', 'Food_Category_13196.jpg', 'Yes', 'Yes'),
(43, 'Hot Dogs', 'Food_Category_76472.jpg', 'Yes', 'Yes'),
(44, 'Sides', 'Food_Category_39435.jpg', 'Yes', 'Yes'),
(48, 'Bengali', 'Food_Category_94135.png', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_eipay`
--

CREATE TABLE `tbl_eipay` (
  `id` int(10) UNSIGNED NOT NULL,
  `table_id` varchar(50) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `tran_id` varchar(50) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `payment_status` varchar(50) NOT NULL,
  `order_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_eipay`
--

INSERT INTO `tbl_eipay` (`id`, `table_id`, `amount`, `tran_id`, `order_date`, `payment_status`, `order_status`) VALUES
(416, 'Table 2', 460.00, 'EI-PAY-5SA6TNEO29', '2022-02-09 12:14:30', 'Successful', 'Delivered'),
(418, 'Table 4', 450.00, 'EI-PAY-65IYLWUW2S', '2022-02-09 14:11:26', 'Successful', 'Pending'),
(420, 'Table 4', 678.00, 'EI-PAY-245XLV2144', '2022-02-09 16:41:41', 'Successful', 'Processing');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_food`
--

CREATE TABLE `tbl_food` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL,
  `stock` int(100) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_food`
--

INSERT INTO `tbl_food` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`, `stock`) VALUES
(34, 'Chicken Burger', 'Chicken Burger', 120.00, 'Food-Name-7394.jpg', 41, 'No', 'Yes', 40),
(35, 'Beef Burger', 'Beef Burger', 150.00, 'Food-Name-251.jpg', 41, 'No', 'Yes', 58),
(36, 'Cheese Burger', 'Cheese Burger', 100.00, 'Food-Name-1511.jpg', 41, 'No', 'Yes', 79),
(37, 'Hamburger', 'Hamburger', 160.00, 'Food-Name-8238.jpg', 41, 'Yes', 'Yes', 57),
(38, 'Supreme Pizza', 'Supreme Pizza', 450.00, 'Food-Name-3657.jpg', 42, 'Yes', 'Yes', 69),
(39, 'Deluxe Pizza ', 'Deluxe Pizza ', 490.00, 'Food-Name-4854.jpg', 42, 'No', 'Yes', 48),
(40, 'Cheese Pizza', 'Cheese Pizza', 350.00, 'Food-Name-926.jpg', 42, 'No', 'Yes', 80),
(41, 'Vegetarian Pizza', 'Vegetarian Pizza', 300.00, 'Food-Name-6428.jpg', 42, 'No', 'Yes', 81),
(42, 'Chili Hot Dog', 'Chili Hot Dog', 80.00, 'Food-Name-1499.jpg', 43, 'No', 'Yes', 145),
(43, 'Hot Onion Dog', 'Hot Onion Dog', 100.00, 'Food-Name-5049.jpg', 43, 'No', 'Yes', 158),
(44, 'Cheese Dog', 'Cheese Dog', 110.00, 'Food-Name-3512.jpg', 43, 'Yes', 'Yes', 0),
(45, 'Red Hot', 'Red Hot\r\n', 120.00, 'Food-Name-5500.jpg', 43, 'No', 'Yes', 139),
(46, 'Popcorn Chicken', 'Popcorn Chicken', 250.00, 'Food-Name-9143.jpg', 44, 'No', 'Yes', 500),
(47, 'Samoosa', 'Samoosa', 100.00, 'Food-Name-1669.jpg', 44, 'No', 'Yes', 300),
(48, 'Shingara', 'Shingara', 100.00, 'Food-Name-937.jpg', 44, 'Yes', 'Yes', 594),
(49, 'Spring Roll', 'Spring Roll', 130.00, 'Food-Name-5356.jpg', 44, 'Yes', 'Yes', 47),
(50, 'Chicken Nuggets', 'Chicken Nuggets', 150.00, 'Food-Name-5725.jpg', 44, 'No', 'Yes', 595),
(51, 'Chicken Kiev Balls', 'Chicken Kiev Balls', 200.00, 'Food-Name-5497.jpg', 44, 'Yes', 'Yes', 34),
(52, 'French Fries', 'French Fries', 120.00, 'Food-Name-2893.jpg', 44, 'Yes', 'Yes', 586),
(53, 'Onion Rings', 'Onion Rings', 100.00, 'Food-Name-8745.jpg', 44, 'Yes', 'Yes', 597);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `transaction_id` varchar(150) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `transaction_id`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`) VALUES
(1, 'Pepperoni Pizza', 220.00, '2022-01-16 06:47:44', 'Ordered', 'my full name', 'country name', 'me@mydomain.com', ''),
(2, 'Pepperoni Pizza', 220.00, '2022-01-16 06:50:46', 'Delivered', 'my full name', 'country name', 'me@mydomain.com', ''),
(3, 'Beef Burger', 150.00, '2022-01-16 08:09:49', 'Cancelled', 'my full name', 'country name', 'me@mydomain.com', ''),
(4, 'Mexican Pizza', 750.00, '2022-01-16 08:10:16', 'Ordered', 'my full name', 'country name', 'me@mydomain.com', ''),
(5, 'Buffalo Wings', 250.00, '2022-01-16 08:35:55', 'On Delivery', 'Maheosy Haque', '01717731002', 'me@mydomain.com', ''),
(6, 'Pepperoni Pizza', 220.00, '2022-01-17 07:10:28', 'Ordered', 'my full name', 'country name', 'me@mydomain.com', ''),
(7, 'Buffalo Wings', 250.00, '2022-01-17 07:11:00', 'Ordered', 'my full name', 'country name', 'me@mydomain.com', ''),
(8, 'Mexican Pizza', 250.00, '2022-01-17 07:11:56', 'Ordered', 'my full name', 'country name', 'me@mydomain.com', ''),
(9, '', 200.00, '2022-01-21 21:29:42', 'Successful', 'Maheosy Haque', '01717731002', 'maheosy.sristy@gmail.com', ''),
(10, '', 220.00, '2022-01-21 21:31:46', 'Successful', 'Maheosy Haque', '01717731002', 'me@mydomain.com', ''),
(11, '', 250.00, '2022-01-21 21:32:43', 'Successful', 'Maheosy Haque', '01717731002', 'maheosy.sristy@gmail.com', ''),
(12, 'HF141T', 220.00, '2022-01-21 21:38:46', 'Successful', 'Forest Gump', '01717731002', 'forest@gmail.com', ''),
(13, 'IVVOP1', 250.00, '2022-01-21 21:40:30', 'Successful', 'Maheosy Haque', '9', 'me@mydomain.com', ''),
(14, 'ROBO-CAFEMP5J31', 250.00, '2022-01-21 21:42:27', 'Successful', 'Maheosy Haque', '23', 'maheosy.sristy@gmail.com', ''),
(15, 'ROBO-CAFE-K0WPJ8', 150.00, '2022-01-21 21:49:59', 'Successful', 'Maheosy Haque', '2', 'maheosy.sristy@gmail.com', ''),
(16, 'ROBO-CAFE-7XS507', 680.00, '2022-01-21 23:18:36', 'Successful', 'Maheosy Haque', '01717732432', 'maheosy.sristy@gmail.com', ''),
(17, 'ROBO-CAFE-0GI4JT', 180.00, '2022-01-21 23:21:39', 'Successful', 'Maheosy Haque', '45345345', 'maheosy.sristy@gmail.com', ''),
(18, '', 0.00, '2022-01-22 02:05:57', '', '', '', '', ''),
(19, '', 0.00, '2022-01-22 02:14:44', '', '', '', '', ''),
(20, '', 0.00, '2022-01-22 02:15:44', '', '', '', '', ''),
(21, '', 0.00, '2022-01-22 02:17:10', '', '', '', '', 'Array'),
(22, 'Array', 0.00, '2022-01-22 02:18:24', '', '', '', '', 'cus_add1'),
(23, 'Array', 0.00, '2022-01-22 02:22:21', '', '', '', '', ''),
(24, 'Array', 0.00, '2022-01-22 02:23:30', '', '', '', '', ''),
(25, 'ROBO-CAFE-MML336', 250.00, '2022-01-22 02:27:11', '', 'my full name', '34534', 'me@mydomain.com', '01'),
(26, 'ROBO-CAFE-MML336', 250.00, '2022-01-22 02:28:40', '', 'my full name', '34534', 'me@mydomain.com', '01'),
(27, 'ROBO-CAFE-A1DFRQ', 250.00, '2022-01-22 02:29:22', '', 'my full name', '45', 'me@mydomain.com', '01'),
(28, 'ROBO-CAFE-S4B37V', 250.00, '2022-01-22 02:30:25', '', 'my full name', '45', 'me@mydomain.com', '01'),
(29, 'ROBO-CAFE-F7Y4XU', 250.00, '2022-01-22 02:31:15', '', 'my full name', '56', 'me@mydomain.com', '01'),
(30, 'ROBO-CAFE-F7Y4XU', 250.00, '2022-01-22 02:32:19', '', 'my full name', '56', 'me@mydomain.com', '01'),
(31, 'ROBO-CAFE-PQZ46L', 250.00, '2022-01-22 02:32:26', '', 'my full name', '4', 'me@mydomain.com', '01'),
(32, 'ROBO-CAFE-9F5EG7', 250.00, '2022-01-22 02:57:56', '', 'my full name', '345', 'me@mydomain.com', '01'),
(33, 'ROBO-CAFE-9F5EG7', 250.00, '2022-01-22 02:57:59', '', 'my full name', '345', 'me@mydomain.com', '01'),
(34, 'ROBO-CAFE-3N4U4N', 250.00, '2022-01-22 02:58:04', '', 'my full name', '234', 'me@mydomain.com', '01'),
(35, 'ROBO-CAFE-3N4U4N', 250.00, '2022-01-22 02:58:52', '', 'my full name', '234', 'me@mydomain.com', '01'),
(36, 'ROBO-CAFE-51G6DI', 100.00, '2022-01-22 05:52:14', '', 'Mohammad Wasikuzzaman', '01717731002', 'wasik@gmail.com', 'Banani, Dhaka'),
(37, 'ROBO-CAFE-CJAJIH', 250.00, '2022-01-22 05:54:56', '', 'my full name', '4', 'me@mydomain.com', '01'),
(38, 'ROBO-CAFE-MH9P87', 150.00, '2022-01-22 17:56:12', 'Successful', 'my full name', '8', 'me@mydomain.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `add1` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `phone` bigint(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `name`, `email`, `add1`, `city`, `phone`, `username`, `password`, `image`) VALUES
(1, 'Hassan', 'hassan@gmail.com', 'Kajjansi', 'wakiso', 705068168, 'user', 'b59c67bf196a4758191e42f76670ceba', './assets/images/uploads/65cafeea5d635-WIN_20240105_10_09_13_Pro.jpg'),
(5, 'Mofiz Mia', 'mofiz@gmail.com', 'Dhaka', 'Dhaka', 1717122112, 'mofiz11', 'b59c67bf196a4758191e42f76670ceba', NULL),
(6, 'katongole', 'katongolehassan@gmail.com', 'uggg', 'ttt', 705068168, 'Admin', '81dc9bdb52d04dc20036dbd8313ed055', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aamarpay`
--
ALTER TABLE `aamarpay`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_manager`
--
ALTER TABLE `order_manager`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_eipay`
--
ALTER TABLE `tbl_eipay`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_food`
--
ALTER TABLE `tbl_food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aamarpay`
--
ALTER TABLE `aamarpay`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `order_manager`
--
ALTER TABLE `order_manager`
  MODIFY `order_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=188;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `tbl_eipay`
--
ALTER TABLE `tbl_eipay`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=422;

--
-- AUTO_INCREMENT for table `tbl_food`
--
ALTER TABLE `tbl_food`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
