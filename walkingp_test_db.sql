-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 16, 2020 at 02:19 PM
-- Server version: 10.2.31-MariaDB-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `walkingp_test_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts_tbl`
--

CREATE TABLE `accounts_tbl` (
  `account_id` int(10) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts_tbl`
--

INSERT INTO `accounts_tbl` (`account_id`, `email`, `password`, `role`, `status`) VALUES
(1, 'mojoo@gmail.com', 'asdfgh', 'Admin', 'Active'),
(3, 'mojooroger45@gmail.com', 'asdfgh', 'Customer', 'Active'),
(16, 'nasir@gmail.com', 'asdfgh', 'Customer', 'Active'),
(22, 'naveed@gmail.com', 'asdfgh', 'Tech', 'Active'),
(32, 'singleadmin1@gmail.com', 'asdfgh', 'Store Admin', 'Active'),
(33, 'singleadmin2@gmail.com', 'asdfgh', 'Store Admin', 'Active'),
(34, 'multistore@gmail.com', 'asdfgh', 'Store Admin', 'Active'),
(35, 'singleadmin3@gmail.com', 'asdfgh', 'Store Admin', 'Active'),
(36, 'mohsin@gmail.com', 'asdfgh', 'Tech', 'Active'),
(37, 'junaid@gmail.com', 'asdfgh', 'Tech', 'Active'),
(38, 'asfund@gmail.com', 'asdfgh', 'Tech', 'Active'),
(39, 'amir@gmail.com', 'asdfgh', 'Tech', 'Active'),
(40, 'mubeen@gmail.com', 'asdfgh', 'Tech', 'Active'),
(41, 'test1@gmail.com', 'asdfgh', 'Tech', 'In-Active'),
(42, 'abc@gmail.com', 'asdfgh', 'Tech', 'In-Active'),
(43, 'firstech@gmail.com', 'asdfgh', 'Tech', 'In-Active');

-- --------------------------------------------------------

--
-- Table structure for table `admin_tbl`
--

CREATE TABLE `admin_tbl` (
  `admin_id` varchar(10) NOT NULL,
  `admin_full_name` varchar(50) DEFAULT NULL,
  `admin_mobile` varchar(20) DEFAULT NULL,
  `admin_pic` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_tbl`
--

INSERT INTO `admin_tbl` (`admin_id`, `admin_full_name`, `admin_mobile`, `admin_pic`) VALUES
('1', 'Mujahid Islam Khan', '03071990955', '3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `brands_tbl`
--

CREATE TABLE `brands_tbl` (
  `brand_id` int(10) NOT NULL,
  `brand_title` varchar(100) DEFAULT NULL,
  `brand_status` varchar(20) DEFAULT NULL,
  `brand_pic` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands_tbl`
--

INSERT INTO `brands_tbl` (`brand_id`, `brand_title`, `brand_status`, `brand_pic`) VALUES
(1, 'BlackBerry', 'Active', 'blackberry.png'),
(2, 'Apple', 'Active', 'apple.png'),
(3, 'LG', 'Active', 'LG.png'),
(4, 'Samsung', 'Active', 'samsung.png');

-- --------------------------------------------------------

--
-- Table structure for table `brand_models_relation_tbl`
--

CREATE TABLE `brand_models_relation_tbl` (
  `bmr_id` int(10) NOT NULL,
  `brand_id` varchar(10) DEFAULT NULL,
  `model_id` varchar(10) DEFAULT NULL,
  `repair_id` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand_models_relation_tbl`
--

INSERT INTO `brand_models_relation_tbl` (`bmr_id`, `brand_id`, `model_id`, `repair_id`) VALUES
(1, '2', '1', '1'),
(2, '2', '2', '2'),
(3, '4', '3', '1'),
(4, '4', '4', '2'),
(5, '1', '5', '1'),
(8, '3', '6', '2');

-- --------------------------------------------------------

--
-- Table structure for table `customers_tbl`
--

CREATE TABLE `customers_tbl` (
  `customer_id` varchar(10) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `contact_number` varchar(20) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `zip` varchar(10) DEFAULT NULL,
  `address` varchar(1000) DEFAULT NULL,
  `about_me` varchar(1000) DEFAULT NULL,
  `customer_pic` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers_tbl`
--

INSERT INTO `customers_tbl` (`customer_id`, `first_name`, `last_name`, `contact_number`, `country`, `city`, `zip`, `address`, `about_me`, `customer_pic`) VALUES
('3', 'Mujahid', 'Islam', '03071990955', 'Pakistan', 'Rawalpindi', '7877', 'Test Address', 'I am new here!', '50639526_155338098787187_5506403138694807552_n.jpg'),
('16', 'Nasir', 'Iqbal', '03157617618', 'Pakistan', 'Mandi Bahaudin', '7877', 'Mandi Bahaudin Phalia city', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `jobs_tbl`
--

CREATE TABLE `jobs_tbl` (
  `job_id` int(10) NOT NULL,
  `store_id` varchar(10) DEFAULT NULL,
  `job_title` varchar(200) DEFAULT NULL,
  `about_company` varchar(2000) DEFAULT NULL,
  `job_city` varchar(100) DEFAULT NULL,
  `job_state` varchar(100) DEFAULT NULL,
  `job_requirements` varchar(2000) DEFAULT NULL,
  `job_key_benefits` varchar(2000) DEFAULT NULL,
  `job_additional_description` varchar(2000) DEFAULT NULL,
  `posted_on` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobs_tbl`
--

INSERT INTO `jobs_tbl` (`job_id`, `store_id`, `job_title`, `about_company`, `job_city`, `job_state`, `job_requirements`, `job_key_benefits`, `job_additional_description`, `posted_on`) VALUES
(1, '1', 'Test Job', 'About Company Test Description', 'Rawalpindi', 'Punjab', '- Requirement 1\r\n-Requirement 2\r\n-Requirement N', '- Key Benefit 1\r\n- Key Benefit 2\r\n- Key Benefit N', 'additional test details', 'Friday 30th of August 2019');

-- --------------------------------------------------------

--
-- Table structure for table `models_services_relation_tbl`
--

CREATE TABLE `models_services_relation_tbl` (
  `msr_id` int(10) NOT NULL,
  `model_id` varchar(10) DEFAULT NULL,
  `price` varchar(10) DEFAULT NULL,
  `service_id` varchar(10) DEFAULT NULL,
  `repair_id` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `models_services_relation_tbl`
--

INSERT INTO `models_services_relation_tbl` (`msr_id`, `model_id`, `price`, `service_id`, `repair_id`) VALUES
(24, '2', '150', '6', '2'),
(25, '1', '120', '4', '1'),
(26, '3', '140', '4', '1'),
(27, '5', '180', '4', '1'),
(28, '1', '100', '5', '1'),
(29, '5', '80', '5', '1'),
(30, '1', '300', '7', '1'),
(31, '1', '300', '8', '1'),
(32, '3', '20', '8', '1'),
(33, '5', '40', '8', '1');

-- --------------------------------------------------------

--
-- Table structure for table `models_tbl`
--

CREATE TABLE `models_tbl` (
  `model_id` int(10) NOT NULL,
  `model_title` varchar(100) DEFAULT NULL,
  `model_status` varchar(20) DEFAULT NULL,
  `model_pic` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `models_tbl`
--

INSERT INTO `models_tbl` (`model_id`, `model_title`, `model_status`, `model_pic`) VALUES
(1, 'IPhone 8', 'Active', 'iphone8.png'),
(2, 'iPad Pro 15in', 'Active', 'ipad.png'),
(3, 'Samsung S9', 'Active', 's9.png'),
(4, 'Samsung Tab A', 'Active', 'samsung_tab.png'),
(5, 'BlackBerry Q10', 'Active', 'Q10.png'),
(6, 'LG Tab A', 'Active', 'samsung_tab.png');

-- --------------------------------------------------------

--
-- Table structure for table `parts_tbl`
--

CREATE TABLE `parts_tbl` (
  `part_id` int(10) NOT NULL,
  `store_id` varchar(10) DEFAULT NULL,
  `part_title` varchar(200) DEFAULT NULL,
  `unit_cost` varchar(10) DEFAULT NULL,
  `qty` varchar(10) DEFAULT NULL,
  `min_qty` varchar(10) DEFAULT NULL,
  `part_description` varchar(1000) DEFAULT NULL,
  `part_pic` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parts_tbl`
--

INSERT INTO `parts_tbl` (`part_id`, `store_id`, `part_title`, `unit_cost`, `qty`, `min_qty`, `part_description`, `part_pic`) VALUES
(1, '1', 'Test Part', '35', '20', '5', 'Test description', 'broken_screen.png'),
(2, '4', 'Test 2', '23', '30', '10', 'akjhdakj', 'blackberry.png'),
(3, '3', 'Test 45', '23', '30', '5', 'Test', 'charging_port.png');

-- --------------------------------------------------------

--
-- Table structure for table `repair_brand_relation_tbl`
--

CREATE TABLE `repair_brand_relation_tbl` (
  `rbr_id` int(10) NOT NULL,
  `repair_id` varchar(10) DEFAULT NULL,
  `brand_id` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `repair_brand_relation_tbl`
--

INSERT INTO `repair_brand_relation_tbl` (`rbr_id`, `repair_id`, `brand_id`) VALUES
(1, '1', '1'),
(2, '1', '2'),
(3, '2', '2'),
(4, '2', '3'),
(5, '1', '4'),
(6, '2', '4');

-- --------------------------------------------------------

--
-- Table structure for table `repair_types_tbl`
--

CREATE TABLE `repair_types_tbl` (
  `repair_id` int(10) NOT NULL,
  `repair_title` varchar(100) DEFAULT NULL,
  `repair_status` varchar(20) DEFAULT NULL,
  `repair_pic` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `repair_types_tbl`
--

INSERT INTO `repair_types_tbl` (`repair_id`, `repair_title`, `repair_status`, `repair_pic`) VALUES
(1, 'Cell Phone Repairing', 'Active', 'iphone8.png'),
(2, 'Tablet Repairing ', 'Active', 'ipad.png');

-- --------------------------------------------------------

--
-- Table structure for table `sales_orders_tbl`
--

CREATE TABLE `sales_orders_tbl` (
  `order_id` int(10) NOT NULL,
  `client_id` varchar(10) DEFAULT NULL,
  `tech_id` varchar(10) DEFAULT NULL,
  `store_id` varchar(10) DEFAULT NULL,
  `client_name` varchar(100) DEFAULT NULL,
  `client_address` varchar(500) DEFAULT NULL,
  `client_email` varchar(100) DEFAULT NULL,
  `client_contact` varchar(20) DEFAULT NULL,
  `client_zip_code` varchar(10) DEFAULT NULL,
  `time_slot` varchar(50) DEFAULT NULL,
  `grand_total` varchar(10) DEFAULT NULL,
  `order_date` varchar(50) DEFAULT NULL,
  `order_status` varchar(20) DEFAULT NULL,
  `service_type` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_orders_tbl`
--

INSERT INTO `sales_orders_tbl` (`order_id`, `client_id`, `tech_id`, `store_id`, `client_name`, `client_address`, `client_email`, `client_contact`, `client_zip_code`, `time_slot`, `grand_total`, `order_date`, `order_status`, `service_type`) VALUES
(1, '3', '36', '1', 'Mujahid Islam', 'Test Address', 'mojooroger45@gmail.com', '03071990955', '7877', '07/15/2019 8:00 PM', '420', '2019-08-08', 'In-Progress', 'Store Repair'),
(2, '16', '38', '3', 'Nasir Iqbal', 'Mandi Bahaudin Phalia city', 'nasir@gmail.com', '03157617618', '7877', '07/17/2019 4:01 AM', '150', '2019-08-08', '', 'Store Repair'),
(3, '3', '37', '4', 'Mujahid Islam', 'Test Address', 'mojooroger45@gmail.com', '03071990955', '7878', '07/11/2019 4:01 AM', '150', '2019-08-08', 'In-Progress', 'Store Repair'),
(4, '3', '0', '0', 'Mujahid Islam', 'Test Address', 'mojooroger45@gmail.com', '03071990955', '7877', '08/13/2019 3:21 AM', '520', '2019-08-09', 'New', 'Mobile Repair'),
(5, '0', '4', '4', 'Test Customer', 'Test Customer test address', 'test@gmail.com', '03157617618', '7877', '07/15/2019 8:00 PM', '886', '2019-08-14', 'New', 'Store Repair'),
(6, '0', '0', '3', 'Muhammad Naveed', 'asdhals aljsdhlsjka', 'junaid@gmail.com', '03157617618', '7877', '07/17/2019 4:01 AM', '270', '2019-08-20', 'New', 'Store Repair'),
(7, '0', '38', '3', 'Mujahid Islam Khan', 'asdkjhfa aljdhal', 'mohsin@gmail.com', '03071990955', '7877', '07/17/2019 4:01 AM', '200', '2019-08-20', 'New', 'Store Repair'),
(8, '0', '0', '1', 'Water', 'aslkdjhla', 'asfund@gmail.com', '030719909551', '7789', '07/15/2019 8:00 PM', '50', '2019-08-20', 'New', 'Store Repair'),
(9, '3', '0', '1', 'Mujahid Islam', 'Test Address', 'mojooroger45@gmail.com', '03071990955', '7877', '2019-08-20 06pm-07pm', '100', '2019-08-22', 'New', 'Store Repair'),
(10, '0', '0', '4', 'Mujahid Islam Khan', 'asdjhal alkdjhkl', 'junaid@gmail.com', '03071990955', '7877', '2019-08-26 , 06pm-07pm', '290', '2019-08-22', 'New', 'Store Repair'),
(11, '0', '36', '1', 'Water', 'aslkdjha adsh a', 'naveed@gmail.com', '03157617617', '7877', '2019-07-30 , 05pm-06pm', '120', '2019-08-22', 'New', 'Store Repair'),
(13, '3', NULL, '', 'Mujahid Islam', 'Test Address', 'mojooroger45@gmail.com', '03071990955', '7877', '2020-03-18 , 10am-11am', '80', '2020-03-16', 'New', 'Mobile Repair');

-- --------------------------------------------------------

--
-- Table structure for table `sales_services_tbl`
--

CREATE TABLE `sales_services_tbl` (
  `sale_service_id` int(10) NOT NULL,
  `order_id` varchar(10) DEFAULT NULL,
  `repair_type` varchar(100) DEFAULT NULL,
  `brand` varchar(100) DEFAULT NULL,
  `model` varchar(100) DEFAULT NULL,
  `service` varchar(100) DEFAULT NULL,
  `service_price` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_services_tbl`
--

INSERT INTO `sales_services_tbl` (`sale_service_id`, `order_id`, `repair_type`, `brand`, `model`, `service`, `service_price`) VALUES
(1, '1', 'Cell Phone Repairing', 'Apple', 'IPhone 8', 'Broken Screen', '120'),
(2, '1', 'Cell Phone Repairing', 'Apple', 'IPhone 8', 'Bettery Replace', '300'),
(3, '2', 'Tablet Repairing ', 'Apple', 'iPad Pro 15in', 'Broken Screen', '150'),
(4, '3', 'Tablet Repairing ', 'Apple', 'iPad Pro 15in', 'Broken Screen', '150'),
(5, '4', 'Cell Phone Repairing', 'Apple', 'IPhone 8', 'Broken Screen', '120'),
(6, '4', 'Cell Phone Repairing', 'Apple', 'IPhone 8', 'Earphone Port', '100'),
(7, '4', 'Cell Phone Repairing', 'Apple', 'IPhone 8', 'Charging Port', '300'),
(8, '5', 'Cell Phone Repairing', 'Apple', 'IPhone 8', 'Charging Port', '786'),
(9, '5', 'Cell Phone Repairing', 'Apple', 'IPhone 8', 'Broken Screen', '100'),
(10, '6', 'Tablet Repairing ', 'Apple', 'iPad Pro 15in', 'Bettery Replace', '270'),
(11, '7', 'Cell Phone Repairing', 'Apple', 'IPhone 8', 'Charging Port', '200'),
(12, '8', 'Cell Phone Repairing', 'Apple', 'IPhone 8', 'Earphone Port', '50'),
(13, '9', 'Cell Phone Repairing', 'Apple', 'IPhone 8', 'Earphone Port', '100'),
(14, '10', 'Tablet Repairing ', 'Apple', 'Samsung S9', 'Broken Screen', '290'),
(15, '11', 'Cell Phone Repairing', 'Apple', 'IPhone 8', 'Bettery Replace', '120'),
(16, '13', 'Cell Phone Repairing', 'BlackBerry', 'BlackBerry Q10', 'Earphone Port', '80');

-- --------------------------------------------------------

--
-- Table structure for table `services_tbl`
--

CREATE TABLE `services_tbl` (
  `service_id` int(10) NOT NULL,
  `service_title` varchar(100) DEFAULT NULL,
  `service_status` varchar(20) DEFAULT NULL,
  `service_pic` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services_tbl`
--

INSERT INTO `services_tbl` (`service_id`, `service_title`, `service_status`, `service_pic`) VALUES
(4, 'Broken Screen', 'Active', 'broken_screen.png'),
(5, 'Earphone Port', 'Active', 'earphone.png'),
(6, 'Broken Screen', 'Active', 'broken_screen.png'),
(7, 'Bettery Replace', 'Active', 'bettery_replace.png'),
(8, 'Charging Port', 'Active', 'charging_port.png');

-- --------------------------------------------------------

--
-- Table structure for table `stores_admin_tbl`
--

CREATE TABLE `stores_admin_tbl` (
  `store_admin_id` varchar(10) DEFAULT NULL,
  `store_admin_full_name` varchar(100) DEFAULT NULL,
  `store_admin_mobile` varchar(20) DEFAULT NULL,
  `store_admin_pic` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stores_admin_tbl`
--

INSERT INTO `stores_admin_tbl` (`store_admin_id`, `store_admin_full_name`, `store_admin_mobile`, `store_admin_pic`) VALUES
('32', 'Mobile Klinik Store Admin', '03071990955', '2.jpg'),
('33', 'Mobile Sloutions Store Admin', '0315-7617618', '11.jpg'),
('34', 'Multiple Store Admin', '03157617618', '14.jpg'),
('35', 'Mobile Klinik 2 Store Admin', '03157617617', '8.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `stores_tbl`
--

CREATE TABLE `stores_tbl` (
  `store_id` int(10) NOT NULL,
  `store_title` varchar(100) DEFAULT NULL,
  `store_address` varchar(100) DEFAULT NULL,
  `store_status` varchar(20) DEFAULT NULL,
  `store_pic` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stores_tbl`
--

INSERT INTO `stores_tbl` (`store_id`, `store_title`, `store_address`, `store_status`, `store_pic`) VALUES
(1, 'I-Tech Mobile Repair Shop', 'I-Tech Mobile Repair Shop Test Address', 'Active', 'download (1).jpg'),
(2, 'Mobile Solutions', 'Mobile Solutions Test Address', 'Active', 'download.jpg'),
(3, 'Mobile Klinik', 'Mobile Klinik Test Address', 'Active', 'shop-mobileKlinik-ottawa.jpg'),
(4, 'Mobile Solutions 2', 'Mobile Solutions 2 Test Address', 'Active', 'download.jpg'),
(5, 'Mobile Klinik 2', 'Mobile Klinik 2 Test Address', 'Active', 'shop-mobileKlinik-ottawa.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `store_admin_stores_relation_tbl`
--

CREATE TABLE `store_admin_stores_relation_tbl` (
  `sasr_id` int(10) NOT NULL,
  `store_id` varchar(10) DEFAULT NULL,
  `store_admin_id` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store_admin_stores_relation_tbl`
--

INSERT INTO `store_admin_stores_relation_tbl` (`sasr_id`, `store_id`, `store_admin_id`) VALUES
(1, '3', '32'),
(2, '2', '33'),
(5, '5', '35'),
(8, '1', '34'),
(9, '4', '34');

-- --------------------------------------------------------

--
-- Table structure for table `store_models_relation_tbl`
--

CREATE TABLE `store_models_relation_tbl` (
  `ssr_id` int(10) NOT NULL,
  `model_id` varchar(10) DEFAULT NULL,
  `store_id` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store_models_relation_tbl`
--

INSERT INTO `store_models_relation_tbl` (`ssr_id`, `model_id`, `store_id`) VALUES
(32, '1', '1'),
(33, '2', '1'),
(36, '5', '3'),
(37, '6', '3'),
(38, '1', '4'),
(39, '2', '4'),
(40, '3', '4'),
(41, '4', '4'),
(42, '5', '4'),
(43, '6', '4'),
(44, '2', '5'),
(45, '3', '5'),
(46, '3', '2'),
(47, '4', '2');

-- --------------------------------------------------------

--
-- Table structure for table `store_zip_relation_tbl`
--

CREATE TABLE `store_zip_relation_tbl` (
  `szr_id` int(10) NOT NULL,
  `zip_id` varchar(10) DEFAULT NULL,
  `store_id` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store_zip_relation_tbl`
--

INSERT INTO `store_zip_relation_tbl` (`szr_id`, `zip_id`, `store_id`) VALUES
(13, '2', '1'),
(15, '2', '3'),
(16, '3', '3'),
(17, '3', '4'),
(18, '3', '5'),
(19, '3', '2'),
(20, '4', '2');

-- --------------------------------------------------------

--
-- Table structure for table `technicians_tbl`
--

CREATE TABLE `technicians_tbl` (
  `tech_id` varchar(10) DEFAULT NULL,
  `store_id` varchar(10) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `contact_number` varchar(20) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `address` varchar(1000) DEFAULT NULL,
  `background_check` varchar(20) DEFAULT NULL,
  `age_check` varchar(20) DEFAULT NULL,
  `experience` varchar(100) DEFAULT NULL,
  `about_me` varchar(1000) DEFAULT NULL,
  `tech_pic` varchar(1000) DEFAULT NULL,
  `tech_cv` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `technicians_tbl`
--

INSERT INTO `technicians_tbl` (`tech_id`, `store_id`, `first_name`, `last_name`, `contact_number`, `country`, `city`, `address`, `background_check`, `age_check`, `experience`, `about_me`, `tech_pic`, `tech_cv`) VALUES
('22', '0', 'Muhammad', 'Naveed', '03157617618', 'Pakistan', 'Rawalpindi', 'sadh a', 'Yes', 'No', 'I have done a few repairs', 'Hello there, I am a technician.', '50639526_155338098787187_5506403138694807552_n.jpg', ''),
('36', '1', 'Mohsin', 'Ahmad', '03157617618', 'Pakistan', 'Rawalpindi', 'Test Address', 'Yes', 'Yes', 'I have done a few repairs', 'I am I-Tech Mobile Repair Shop  Technician! (Multi-Store)', '21.jpg', ''),
('37', '4', 'Junaid', 'Islam', '03071990955', 'Pakistan', 'Rawalpindi', 'Test Address', 'Yes', 'Yes', 'I am a Master Tech', 'I am Mobile Solutions 2 Store Tech! (Multi-Store)', '6.jpg', ''),
('38', '3', 'Asfund', 'Mirza', '03157617618', 'Pakistan', 'Mandi Bahaudin', 'Test Physical Address', 'Yes', 'Yes', 'I have a professional experience', 'I am Test Tech at Mobile Klinik! (single store admin)', '4.jpg', ''),
('39', '2', 'Muhammad', 'Amir', '03071990955', 'Pakistan', 'Rawalpindi', 'Test Address', 'Yes', 'Yes', 'I am a Master Tech', 'I am Test Tech at Mobile Solutions! (single store admin)', '2.jpg', ''),
('40', '5', 'Mubeen', 'Ashraf', '03157617618', 'Pakistan', 'Mandi Bahaudin', 'Test Address', 'Yes', 'Yes', 'I am a Master Tech', 'I am Tech at Mobile Klinik 2! (single store admin)', '7.jpg', ''),
('41', '0', 'Test1', 'Name1', '03071990955', 'Pakistan', 'Rawalpindii', 'hjgadk laksjdhl aldsjhl', 'No', 'Yes', 'I am a Master Tech', '', '', ''),
('42', '1', 'abc', 'asd', '03157617617', 'Pakistan', 'Rawalpindii', 'kkhasgdk', 'No', 'No', 'I have a professional experience', '', '', 'CV58108023_Mujahid Islam.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tech_services_tbl`
--

CREATE TABLE `tech_services_tbl` (
  `ts_id` int(10) NOT NULL,
  `tech_id` varchar(10) DEFAULT NULL,
  `service_id` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tech_services_tbl`
--

INSERT INTO `tech_services_tbl` (`ts_id`, `tech_id`, `service_id`) VALUES
(91, '22', '1'),
(92, '22', '3'),
(93, '22', '4'),
(94, '22', '6'),
(127, '36', '1'),
(128, '36', '2'),
(129, '37', '3'),
(130, '37', '4'),
(131, '38', '1'),
(132, '38', '3'),
(133, '39', '1'),
(134, '39', '2'),
(135, '39', '3'),
(136, '40', '1'),
(137, '40', '4'),
(138, '40', '5'),
(139, '40', '6'),
(140, '41', '1'),
(141, '41', '2'),
(142, '41', '3'),
(143, '42', '1'),
(144, '42', '3'),
(145, '42', '6');

-- --------------------------------------------------------

--
-- Table structure for table `tech_service_zip_tbl`
--

CREATE TABLE `tech_service_zip_tbl` (
  `tsz_id` int(10) NOT NULL,
  `tech_id` varchar(10) DEFAULT NULL,
  `zip_id` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tech_service_zip_tbl`
--

INSERT INTO `tech_service_zip_tbl` (`tsz_id`, `tech_id`, `zip_id`) VALUES
(30, '22', '2'),
(31, '22', '3'),
(48, '36', '2'),
(49, '36', '3'),
(50, '37', '2'),
(51, '38', '2'),
(52, '38', '3'),
(53, '39', '2'),
(54, '39', '3'),
(55, '40', '2'),
(56, '40', '3'),
(57, '41', '2'),
(58, '41', '3'),
(59, '42', '3');

-- --------------------------------------------------------

--
-- Table structure for table `zip_codes_tbl`
--

CREATE TABLE `zip_codes_tbl` (
  `zip_id` int(10) NOT NULL,
  `zip_code` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `zip_codes_tbl`
--

INSERT INTO `zip_codes_tbl` (`zip_id`, `zip_code`) VALUES
(2, '7877'),
(3, '7878'),
(4, '32809');

-- --------------------------------------------------------

--
-- Table structure for table `zip_services_relation_tbl`
--

CREATE TABLE `zip_services_relation_tbl` (
  `zsr_id` int(10) NOT NULL,
  `zip_id` varchar(10) DEFAULT NULL,
  `service_id` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `zip_services_relation_tbl`
--

INSERT INTO `zip_services_relation_tbl` (`zsr_id`, `zip_id`, `service_id`) VALUES
(1, '2', '1'),
(2, '3', '1'),
(3, '2', '2'),
(4, '2', '3'),
(5, '2', '4'),
(6, '3', '4'),
(7, '2', '5'),
(8, '2', '6'),
(9, '3', '6'),
(10, '2', '7'),
(11, '3', '7'),
(12, '2', '8'),
(13, '3', '8');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts_tbl`
--
ALTER TABLE `accounts_tbl`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `brands_tbl`
--
ALTER TABLE `brands_tbl`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `brand_models_relation_tbl`
--
ALTER TABLE `brand_models_relation_tbl`
  ADD PRIMARY KEY (`bmr_id`);

--
-- Indexes for table `jobs_tbl`
--
ALTER TABLE `jobs_tbl`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `models_services_relation_tbl`
--
ALTER TABLE `models_services_relation_tbl`
  ADD PRIMARY KEY (`msr_id`);

--
-- Indexes for table `models_tbl`
--
ALTER TABLE `models_tbl`
  ADD PRIMARY KEY (`model_id`);

--
-- Indexes for table `parts_tbl`
--
ALTER TABLE `parts_tbl`
  ADD PRIMARY KEY (`part_id`);

--
-- Indexes for table `repair_brand_relation_tbl`
--
ALTER TABLE `repair_brand_relation_tbl`
  ADD PRIMARY KEY (`rbr_id`);

--
-- Indexes for table `repair_types_tbl`
--
ALTER TABLE `repair_types_tbl`
  ADD PRIMARY KEY (`repair_id`);

--
-- Indexes for table `sales_orders_tbl`
--
ALTER TABLE `sales_orders_tbl`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `sales_services_tbl`
--
ALTER TABLE `sales_services_tbl`
  ADD PRIMARY KEY (`sale_service_id`);

--
-- Indexes for table `services_tbl`
--
ALTER TABLE `services_tbl`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `stores_tbl`
--
ALTER TABLE `stores_tbl`
  ADD PRIMARY KEY (`store_id`);

--
-- Indexes for table `store_admin_stores_relation_tbl`
--
ALTER TABLE `store_admin_stores_relation_tbl`
  ADD PRIMARY KEY (`sasr_id`);

--
-- Indexes for table `store_models_relation_tbl`
--
ALTER TABLE `store_models_relation_tbl`
  ADD PRIMARY KEY (`ssr_id`);

--
-- Indexes for table `store_zip_relation_tbl`
--
ALTER TABLE `store_zip_relation_tbl`
  ADD PRIMARY KEY (`szr_id`);

--
-- Indexes for table `tech_services_tbl`
--
ALTER TABLE `tech_services_tbl`
  ADD PRIMARY KEY (`ts_id`);

--
-- Indexes for table `tech_service_zip_tbl`
--
ALTER TABLE `tech_service_zip_tbl`
  ADD PRIMARY KEY (`tsz_id`);

--
-- Indexes for table `zip_codes_tbl`
--
ALTER TABLE `zip_codes_tbl`
  ADD PRIMARY KEY (`zip_id`);

--
-- Indexes for table `zip_services_relation_tbl`
--
ALTER TABLE `zip_services_relation_tbl`
  ADD PRIMARY KEY (`zsr_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts_tbl`
--
ALTER TABLE `accounts_tbl`
  MODIFY `account_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `brands_tbl`
--
ALTER TABLE `brands_tbl`
  MODIFY `brand_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `brand_models_relation_tbl`
--
ALTER TABLE `brand_models_relation_tbl`
  MODIFY `bmr_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `jobs_tbl`
--
ALTER TABLE `jobs_tbl`
  MODIFY `job_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `models_services_relation_tbl`
--
ALTER TABLE `models_services_relation_tbl`
  MODIFY `msr_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `models_tbl`
--
ALTER TABLE `models_tbl`
  MODIFY `model_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `parts_tbl`
--
ALTER TABLE `parts_tbl`
  MODIFY `part_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `repair_brand_relation_tbl`
--
ALTER TABLE `repair_brand_relation_tbl`
  MODIFY `rbr_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `repair_types_tbl`
--
ALTER TABLE `repair_types_tbl`
  MODIFY `repair_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sales_orders_tbl`
--
ALTER TABLE `sales_orders_tbl`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `sales_services_tbl`
--
ALTER TABLE `sales_services_tbl`
  MODIFY `sale_service_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `services_tbl`
--
ALTER TABLE `services_tbl`
  MODIFY `service_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `stores_tbl`
--
ALTER TABLE `stores_tbl`
  MODIFY `store_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `store_admin_stores_relation_tbl`
--
ALTER TABLE `store_admin_stores_relation_tbl`
  MODIFY `sasr_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `store_models_relation_tbl`
--
ALTER TABLE `store_models_relation_tbl`
  MODIFY `ssr_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `store_zip_relation_tbl`
--
ALTER TABLE `store_zip_relation_tbl`
  MODIFY `szr_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tech_services_tbl`
--
ALTER TABLE `tech_services_tbl`
  MODIFY `ts_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT for table `tech_service_zip_tbl`
--
ALTER TABLE `tech_service_zip_tbl`
  MODIFY `tsz_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `zip_codes_tbl`
--
ALTER TABLE `zip_codes_tbl`
  MODIFY `zip_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `zip_services_relation_tbl`
--
ALTER TABLE `zip_services_relation_tbl`
  MODIFY `zsr_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
