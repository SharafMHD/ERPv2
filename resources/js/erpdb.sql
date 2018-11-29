-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 29, 2018 at 06:37 PM
-- Server version: 5.7.23-0ubuntu0.18.04.1
-- PHP Version: 7.2.12-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `erpdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `no` varchar(20) NOT NULL,
  `name` varchar(150) NOT NULL,
  `main_account` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `status` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `no`, `name`, `main_account`, `description`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'ACC-00010290', '--', '--', '--', '--', '2018-10-18 11:42:00', NULL, NULL),
(2, 'ACC-000000013', '--', 'Customers', '--', 'is active', '2018-10-18 11:42:00', NULL, NULL),
(3, '2', '2', '2', '2', '2', '2018-10-28 00:05:29', '2018-10-27 22:05:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `accounts_transactions`
--

CREATE TABLE `accounts_transactions` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `no` varchar(20) NOT NULL,
  `account_id` int(11) NOT NULL,
  `transaction_type` varchar(10) NOT NULL,
  `credit` float NOT NULL,
  `debit` float NOT NULL,
  `pay_type` varchar(10) NOT NULL,
  `description` varchar(500) NOT NULL,
  `cheque_no` varchar(50) DEFAULT NULL,
  `cheque_date` date DEFAULT NULL,
  `cheque_bank` varchar(100) DEFAULT NULL,
  `cheque_status` varchar(50) DEFAULT NULL,
  `ref_no` varchar(50) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `actions`
--

CREATE TABLE `actions` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `label` varchar(50) DEFAULT NULL,
  `deleted_at` date DEFAULT NULL,
  `model` int(11) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `actions`
--

INSERT INTO `actions` (`id`, `name`, `label`, `deleted_at`, `model`, `type`, `created_at`, `updated_at`) VALUES
(1, 'index', 'home', NULL, 1, 1, NULL, NULL),
(2, 'index', 'users', NULL, 2, 1, NULL, NULL),
(3, 'index', 'roles', NULL, 3, 1, NULL, NULL),
(4, 'show', NULL, NULL, 3, 1, '2018-10-25', '2018-10-25'),
(5, 'index', NULL, NULL, 4, 1, '2018-10-25', '2018-10-25'),
(6, 'assign', NULL, NULL, 3, 1, '2018-10-25', '2018-10-25'),
(7, 'edit', NULL, NULL, 3, 1, '2018-10-25', '2018-10-25'),
(8, 'assignpost', NULL, NULL, 3, 1, '2018-10-25', '2018-10-25'),
(9, 'create', NULL, NULL, 3, 1, '2018-10-25', '2018-10-25'),
(13, 'index', 'jobs', NULL, 6, 1, '2018-10-25', NULL),
(14, 'create', 'jobs', NULL, 6, 1, '2018-10-25', NULL),
(16, 'index', 'index', NULL, 8, 1, '2018-10-25', NULL),
(18, 'create', 'create', NULL, 8, 1, '2018-10-25', NULL),
(19, 'edit', 'edit', NULL, 8, 1, '2018-10-25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `employee_id` int(11) NOT NULL,
  `cut_salary` int(11) NOT NULL,
  `deduction_id` int(11) NOT NULL,
  `location` varchar(500) NOT NULL,
  `supervisor` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bonuses`
--

CREATE TABLE `bonuses` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `salary_item_id` int(11) NOT NULL,
  `amount` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'fsdfsdf', 'fsdfsdfsdf', '2018-10-22 17:06:41', '2018-10-22 17:06:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `certifications`
--

CREATE TABLE `certifications` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `cretification_id` int(11) NOT NULL,
  `certi_image` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `certification_configs`
--

CREATE TABLE `certification_configs` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `contracts`
--

CREATE TABLE `contracts` (
  `id` int(11) NOT NULL,
  `no` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `contract_type` varchar(50) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `description` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `descritpion` varchar(500) NOT NULL,
  `award_point` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `descritpion`, `award_point`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '11', '11', '11', '2018-11-05 11:09:53', '2018-11-05 11:09:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `courses_details`
--

CREATE TABLE `courses_details` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `period` float NOT NULL,
  `degree` float NOT NULL,
  `rate` float NOT NULL,
  `employee_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `no` varchar(20) NOT NULL,
  `name` varchar(250) NOT NULL,
  `type` varchar(30) NOT NULL,
  `country` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `web_site` varchar(150) NOT NULL,
  `fax` varchar(20) NOT NULL,
  `account_id` int(11) NOT NULL,
  `have_ceilling` tinyint(1) NOT NULL,
  `ceilling_amount` float NOT NULL,
  `status` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `deductions`
--

CREATE TABLE `deductions` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `description` varchar(500) NOT NULL,
  `amount` float NOT NULL,
  `due_date` date NOT NULL,
  `admin_accept` varchar(50) NOT NULL,
  `employee_accept` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'بشسيبشسيبسشيب', 'بيلسيبلسيلس', '2018-10-23 15:00:01', '2018-10-23 15:00:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `description` varchar(500) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `no` varchar(50) NOT NULL,
  `name` varchar(250) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `birth_of_date` date NOT NULL,
  `join_date` date NOT NULL,
  `martial_status` varchar(20) NOT NULL,
  `identity_id` int(11) NOT NULL,
  `identity_no` varchar(50) NOT NULL,
  `job_id` int(11) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `email` varchar(50) NOT NULL,
  `bank_account` varchar(50) NOT NULL,
  `bank_name` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL,
  `image` text NOT NULL,
  `account_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `employee_exits`
--

CREATE TABLE `employee_exits` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `employee_id` int(11) NOT NULL,
  `type_of_exit` varchar(50) NOT NULL,
  `conducted_exit_interview` varchar(100) NOT NULL,
  `reason` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `employee_leaves`
--

CREATE TABLE `employee_leaves` (
  `id` int(11) NOT NULL,
  `vaction_id` int(11) NOT NULL,
  `reason` varchar(250) NOT NULL,
  `leave_from` date NOT NULL,
  `leave_to` date NOT NULL,
  `leave_duration` varchar(100) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `description` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `familys`
--

CREATE TABLE `familys` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `relationship` varchar(50) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `holydays`
--

CREATE TABLE `holydays` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `holy_from` date NOT NULL,
  `holy_to` date NOT NULL,
  `holy_type` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `hr_admin_accept` varchar(50) NOT NULL,
  `admin_accept` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `identity_types`
--

CREATE TABLE `identity_types` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `insurances`
--

CREATE TABLE `insurances` (
  `id` int(11) NOT NULL,
  `no` varchar(20) NOT NULL,
  `company` varchar(250) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `insurance_type` varchar(50) NOT NULL,
  `insurance_date` date NOT NULL,
  `insurance_title` varchar(250) NOT NULL,
  `emp_amount` float NOT NULL,
  `org_amount` float NOT NULL,
  `description` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `no` varchar(20) NOT NULL,
  `name` varchar(250) NOT NULL,
  `category_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `sales_price` float NOT NULL,
  `purchase_price` float NOT NULL,
  `low_stock_qty` float NOT NULL,
  `color` varchar(50) NOT NULL,
  `size` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `item_type` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `departmentID` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `code`, `name`, `description`, `departmentID`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, '11', '11', '11', 1, '2018-10-30 06:28:39', '2018-10-30 06:28:39', NULL),
(3, '1', '1', '1', 1, '2018-10-30 06:29:02', '2018-10-30 06:29:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE `loans` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `amount` float NOT NULL,
  `employee_id` int(11) NOT NULL,
  `pay_slip` tinyint(1) NOT NULL,
  `monthly_amount` float NOT NULL,
  `payment_start_date` date NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `loans_payments`
--

CREATE TABLE `loans_payments` (
  `id` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `no` varchar(20) NOT NULL,
  `loan_id` int(11) NOT NULL,
  `amount` float NOT NULL,
  `description` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `models`
--

CREATE TABLE `models` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `label` varchar(50) DEFAULT NULL,
  `parent` int(11) DEFAULT NULL,
  `deleted_at` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `icon` varchar(50) DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `models`
--

INSERT INTO `models` (`id`, `name`, `label`, `parent`, `deleted_at`, `created_at`, `icon`, `updated_at`) VALUES
(1, 'categories', 'Users management', NULL, NULL, '2018-10-23 14:11:15', 'icon-users', '2018-10-31'),
(2, 'users', 'Users', 1, NULL, '2018-10-23 14:29:20', NULL, NULL),
(3, 'roles', 'Roles', 1, NULL, '2018-10-23 14:41:56', NULL, NULL),
(4, 'Home', NULL, NULL, NULL, '2018-10-25 13:17:34', NULL, '2018-10-25'),
(5, 'accounts', 'Accounts', 10, NULL, '2018-10-27 19:44:05', NULL, NULL),
(6, 'Settings', 'Settings', NULL, NULL, '2018-10-30 07:22:20', 'icon-settings', '2018-10-31'),
(7, 'models55', 'Settings', NULL, NULL, '2018-10-31 10:09:42', NULL, NULL),
(8, 'models', 'Menu', 6, NULL, '2018-10-31 10:10:38', 'icon-menu', '2018-10-31'),
(10, 'Accounts', 'Accounts management', NULL, NULL, '2018-11-05 12:44:52', NULL, '2018-11-05');

-- --------------------------------------------------------

--
-- Table structure for table `movements`
--

CREATE TABLE `movements` (
  `id` int(11) NOT NULL,
  `no` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `from_warehouse_id` int(11) NOT NULL,
  `to_warehouse_id` int(11) NOT NULL,
  `notes` varchar(500) NOT NULL,
  `status` varchar(15) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `movement_details`
--

CREATE TABLE `movement_details` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `qty` float NOT NULL,
  `notes` varchar(250) NOT NULL,
  `movement_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nationalities`
--

CREATE TABLE `nationalities` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `code` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `no` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `status` varchar(15) NOT NULL,
  `type` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `qty` float NOT NULL,
  `notes` varchar(250) NOT NULL,
  `order_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `payrolls`
--

CREATE TABLE `payrolls` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `employee_id` int(11) NOT NULL,
  `salary_item_id` int(11) NOT NULL,
  `amount` float NOT NULL,
  `description` varchar(500) NOT NULL,
  `issue_by` varchar(100) NOT NULL,
  `hr_admin_accept` tinyint(1) NOT NULL,
  `acc_admin_accept` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `privileges`
--

CREATE TABLE `privileges` (
  `id` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  `action` int(11) NOT NULL,
  `model` int(11) NOT NULL,
  `deleted_at` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `privileges`
--

INSERT INTO `privileges` (`id`, `role`, `action`, `model`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2018-10-25', '2018-10-25 15:34:30', '2018-10-25'),
(2, 1, 2, 2, '2018-10-25', '2018-10-25 15:34:30', '2018-10-25'),
(3, 1, 3, 3, '2018-10-25', '2018-10-25 15:34:30', '2018-10-25'),
(4, 1, 1, 1, '2018-10-25', '2018-10-25 15:34:39', '2018-10-25'),
(5, 1, 1, 1, '2018-10-25', '2018-10-25 15:34:54', '2018-10-25'),
(6, 1, 2, 2, '2018-10-25', '2018-10-25 15:34:54', '2018-10-25'),
(7, 1, 3, 3, '2018-10-25', '2018-10-25 15:34:54', '2018-10-25'),
(8, 1, 4, 3, '2018-10-25', '2018-10-25 15:34:54', '2018-10-25'),
(9, 1, 1, 1, '2018-10-25', '2018-10-25 15:35:21', '2018-10-25'),
(10, 1, 2, 2, '2018-10-25', '2018-10-25 15:35:21', '2018-10-25'),
(11, 1, 3, 3, '2018-10-25', '2018-10-25 15:35:21', '2018-10-25'),
(12, 1, 4, 3, '2018-10-25', '2018-10-25 15:35:21', '2018-10-25'),
(13, 1, 6, 3, '2018-10-25', '2018-10-25 15:35:21', '2018-10-25'),
(14, 1, 7, 3, '2018-10-25', '2018-10-25 15:35:21', '2018-10-25'),
(15, 1, 8, 3, '2018-10-25', '2018-10-25 15:35:21', '2018-10-25'),
(16, 1, 1, 1, '2018-10-25', '2018-10-25 16:00:04', '2018-10-25'),
(17, 1, 2, 2, '2018-10-25', '2018-10-25 16:00:04', '2018-10-25'),
(18, 1, 3, 3, '2018-10-25', '2018-10-25 16:00:04', '2018-10-25'),
(19, 1, 4, 3, '2018-10-25', '2018-10-25 16:00:04', '2018-10-25'),
(20, 1, 6, 3, '2018-10-25', '2018-10-25 16:00:04', '2018-10-25'),
(21, 1, 8, 3, '2018-10-25', '2018-10-25 16:00:04', '2018-10-25'),
(22, 1, 1, 1, '2018-10-25', '2018-10-25 16:33:05', '2018-10-25'),
(23, 1, 2, 2, '2018-10-25', '2018-10-25 16:33:05', '2018-10-25'),
(24, 1, 3, 3, '2018-10-25', '2018-10-25 16:33:05', '2018-10-25'),
(25, 1, 4, 3, '2018-10-25', '2018-10-25 16:33:05', '2018-10-25'),
(26, 1, 6, 3, '2018-10-25', '2018-10-25 16:33:05', '2018-10-25'),
(27, 1, 7, 3, '2018-10-25', '2018-10-25 16:33:05', '2018-10-25'),
(28, 1, 8, 3, '2018-10-25', '2018-10-25 16:33:05', '2018-10-25'),
(29, 1, 9, 3, '2018-10-25', '2018-10-25 16:33:05', '2018-10-25'),
(30, 1, 1, 1, '2018-10-25', '2018-10-25 18:01:43', '2018-10-25'),
(31, 1, 2, 2, '2018-10-25', '2018-10-25 18:01:43', '2018-10-25'),
(32, 1, 3, 3, '2018-10-25', '2018-10-25 18:01:43', '2018-10-25'),
(33, 1, 4, 3, '2018-10-25', '2018-10-25 18:01:43', '2018-10-25'),
(34, 1, 6, 3, '2018-10-25', '2018-10-25 18:01:43', '2018-10-25'),
(35, 1, 7, 3, '2018-10-25', '2018-10-25 18:01:43', '2018-10-25'),
(36, 1, 8, 3, '2018-10-25', '2018-10-25 18:01:43', '2018-10-25'),
(37, 1, 9, 3, '2018-10-25', '2018-10-25 18:01:43', '2018-10-25'),
(38, 1, 5, 4, '2018-10-25', '2018-10-25 18:01:43', '2018-10-25'),
(39, 1, 1, 1, '2018-10-25', '2018-10-25 18:01:55', '2018-10-25'),
(40, 1, 3, 3, '2018-10-25', '2018-10-25 18:01:55', '2018-10-25'),
(41, 1, 4, 3, '2018-10-25', '2018-10-25 18:01:55', '2018-10-25'),
(42, 1, 6, 3, '2018-10-25', '2018-10-25 18:01:55', '2018-10-25'),
(43, 1, 7, 3, '2018-10-25', '2018-10-25 18:01:55', '2018-10-25'),
(44, 1, 8, 3, '2018-10-25', '2018-10-25 18:01:55', '2018-10-25'),
(45, 1, 9, 3, '2018-10-25', '2018-10-25 18:01:55', '2018-10-25'),
(46, 1, 5, 4, '2018-10-25', '2018-10-25 18:01:55', '2018-10-25'),
(47, 1, 1, 1, '2018-10-25', '2018-10-25 18:01:59', '2018-10-25'),
(48, 1, 2, 2, '2018-10-25', '2018-10-25 18:01:59', '2018-10-25'),
(49, 1, 3, 3, '2018-10-25', '2018-10-25 18:01:59', '2018-10-25'),
(50, 1, 4, 3, '2018-10-25', '2018-10-25 18:01:59', '2018-10-25'),
(51, 1, 6, 3, '2018-10-25', '2018-10-25 18:01:59', '2018-10-25'),
(52, 1, 7, 3, '2018-10-25', '2018-10-25 18:01:59', '2018-10-25'),
(53, 1, 8, 3, '2018-10-25', '2018-10-25 18:01:59', '2018-10-25'),
(54, 1, 9, 3, '2018-10-25', '2018-10-25 18:01:59', '2018-10-25'),
(55, 1, 5, 4, '2018-10-25', '2018-10-25 18:01:59', '2018-10-25'),
(56, 1, 1, 1, '2018-10-27', '2018-10-27 18:48:18', '2018-10-27'),
(57, 1, 2, 2, '2018-10-27', '2018-10-27 18:48:18', '2018-10-27'),
(58, 1, 3, 3, '2018-10-27', '2018-10-27 18:48:18', '2018-10-27'),
(59, 1, 4, 3, '2018-10-27', '2018-10-27 18:48:18', '2018-10-27'),
(60, 1, 6, 3, '2018-10-27', '2018-10-27 18:48:18', '2018-10-27'),
(61, 1, 7, 3, '2018-10-27', '2018-10-27 18:48:18', '2018-10-27'),
(62, 1, 8, 3, '2018-10-27', '2018-10-27 18:48:18', '2018-10-27'),
(63, 1, 9, 3, '2018-10-27', '2018-10-27 18:48:18', '2018-10-27'),
(64, 1, 5, 4, '2018-10-27', '2018-10-27 18:48:18', '2018-10-27'),
(65, 1, 1, 1, '2018-10-27', '2018-10-27 18:49:15', '2018-10-27'),
(66, 1, 2, 2, '2018-10-27', '2018-10-27 18:49:15', '2018-10-27'),
(67, 1, 3, 3, '2018-10-27', '2018-10-27 18:49:15', '2018-10-27'),
(68, 1, 4, 3, '2018-10-27', '2018-10-27 18:49:15', '2018-10-27'),
(69, 1, 6, 3, '2018-10-27', '2018-10-27 18:49:15', '2018-10-27'),
(70, 1, 7, 3, '2018-10-27', '2018-10-27 18:49:15', '2018-10-27'),
(71, 1, 8, 3, '2018-10-27', '2018-10-27 18:49:15', '2018-10-27'),
(72, 1, 5, 4, '2018-10-27', '2018-10-27 18:49:15', '2018-10-27'),
(73, 1, 1, 1, '2018-10-27', '2018-10-27 19:45:00', '2018-10-27'),
(74, 1, 2, 2, '2018-10-27', '2018-10-27 19:45:00', '2018-10-27'),
(75, 1, 3, 3, '2018-10-27', '2018-10-27 19:45:00', '2018-10-27'),
(76, 1, 4, 3, '2018-10-27', '2018-10-27 19:45:00', '2018-10-27'),
(77, 1, 6, 3, '2018-10-27', '2018-10-27 19:45:00', '2018-10-27'),
(78, 1, 7, 3, '2018-10-27', '2018-10-27 19:45:00', '2018-10-27'),
(79, 1, 8, 3, '2018-10-27', '2018-10-27 19:45:00', '2018-10-27'),
(80, 1, 5, 4, '2018-10-27', '2018-10-27 19:45:00', '2018-10-27'),
(81, 1, 1, 1, '2018-10-27', '2018-10-27 20:07:54', '2018-10-27'),
(82, 1, 2, 2, '2018-10-27', '2018-10-27 20:07:54', '2018-10-27'),
(83, 1, 3, 3, '2018-10-27', '2018-10-27 20:07:54', '2018-10-27'),
(84, 1, 4, 3, '2018-10-27', '2018-10-27 20:07:54', '2018-10-27'),
(85, 1, 6, 3, '2018-10-27', '2018-10-27 20:07:54', '2018-10-27'),
(86, 1, 7, 3, '2018-10-27', '2018-10-27 20:07:54', '2018-10-27'),
(87, 1, 8, 3, '2018-10-27', '2018-10-27 20:07:54', '2018-10-27'),
(88, 1, 5, 4, '2018-10-27', '2018-10-27 20:07:54', '2018-10-27'),
(90, 1, 1, 1, '2018-10-27', '2018-10-27 20:17:47', '2018-10-27'),
(91, 1, 2, 2, '2018-10-27', '2018-10-27 20:17:47', '2018-10-27'),
(92, 1, 3, 3, '2018-10-27', '2018-10-27 20:17:47', '2018-10-27'),
(93, 1, 4, 3, '2018-10-27', '2018-10-27 20:17:47', '2018-10-27'),
(94, 1, 6, 3, '2018-10-27', '2018-10-27 20:17:47', '2018-10-27'),
(95, 1, 7, 3, '2018-10-27', '2018-10-27 20:17:47', '2018-10-27'),
(96, 1, 8, 3, '2018-10-27', '2018-10-27 20:17:47', '2018-10-27'),
(97, 1, 5, 4, '2018-10-27', '2018-10-27 20:17:47', '2018-10-27'),
(100, 1, 1, 1, '2018-10-27', '2018-10-27 20:39:41', '2018-10-27'),
(101, 1, 2, 2, '2018-10-27', '2018-10-27 20:39:41', '2018-10-27'),
(102, 1, 3, 3, '2018-10-27', '2018-10-27 20:39:41', '2018-10-27'),
(103, 1, 4, 3, '2018-10-27', '2018-10-27 20:39:41', '2018-10-27'),
(104, 1, 6, 3, '2018-10-27', '2018-10-27 20:39:41', '2018-10-27'),
(105, 1, 7, 3, '2018-10-27', '2018-10-27 20:39:41', '2018-10-27'),
(106, 1, 8, 3, '2018-10-27', '2018-10-27 20:39:41', '2018-10-27'),
(107, 1, 5, 4, '2018-10-27', '2018-10-27 20:39:41', '2018-10-27'),
(109, 1, 1, 1, '2018-10-27', '2018-10-27 20:45:34', '2018-10-27'),
(110, 1, 2, 2, '2018-10-27', '2018-10-27 20:45:34', '2018-10-27'),
(111, 1, 3, 3, '2018-10-27', '2018-10-27 20:45:34', '2018-10-27'),
(112, 1, 4, 3, '2018-10-27', '2018-10-27 20:45:34', '2018-10-27'),
(113, 1, 6, 3, '2018-10-27', '2018-10-27 20:45:34', '2018-10-27'),
(114, 1, 7, 3, '2018-10-27', '2018-10-27 20:45:34', '2018-10-27'),
(115, 1, 8, 3, '2018-10-27', '2018-10-27 20:45:34', '2018-10-27'),
(116, 1, 9, 3, '2018-10-27', '2018-10-27 20:45:34', '2018-10-27'),
(117, 1, 5, 4, '2018-10-27', '2018-10-27 20:45:34', '2018-10-27'),
(120, 1, 1, 1, '2018-10-30', '2018-10-30 07:23:41', '2018-10-30'),
(121, 1, 2, 2, '2018-10-30', '2018-10-30 07:23:41', '2018-10-30'),
(122, 1, 3, 3, '2018-10-30', '2018-10-30 07:23:41', '2018-10-30'),
(123, 1, 4, 3, '2018-10-30', '2018-10-30 07:23:41', '2018-10-30'),
(124, 1, 6, 3, '2018-10-30', '2018-10-30 07:23:41', '2018-10-30'),
(125, 1, 7, 3, '2018-10-30', '2018-10-30 07:23:41', '2018-10-30'),
(126, 1, 8, 3, '2018-10-30', '2018-10-30 07:23:41', '2018-10-30'),
(127, 1, 9, 3, '2018-10-30', '2018-10-30 07:23:41', '2018-10-30'),
(128, 1, 5, 4, '2018-10-30', '2018-10-30 07:23:41', '2018-10-30'),
(132, 1, 1, 1, '2018-10-30', '2018-10-30 07:25:33', '2018-10-30'),
(133, 1, 2, 2, '2018-10-30', '2018-10-30 07:25:33', '2018-10-30'),
(134, 1, 3, 3, '2018-10-30', '2018-10-30 07:25:33', '2018-10-30'),
(135, 1, 4, 3, '2018-10-30', '2018-10-30 07:25:33', '2018-10-30'),
(136, 1, 6, 3, '2018-10-30', '2018-10-30 07:25:33', '2018-10-30'),
(137, 1, 7, 3, '2018-10-30', '2018-10-30 07:25:33', '2018-10-30'),
(138, 1, 8, 3, '2018-10-30', '2018-10-30 07:25:33', '2018-10-30'),
(139, 1, 9, 3, '2018-10-30', '2018-10-30 07:25:33', '2018-10-30'),
(140, 1, 5, 4, '2018-10-30', '2018-10-30 07:25:33', '2018-10-30'),
(144, 1, 13, 6, '2018-10-30', '2018-10-30 07:25:33', '2018-10-30'),
(145, 1, 1, 1, '2018-10-30', '2018-10-30 07:27:19', '2018-10-30'),
(146, 1, 2, 2, '2018-10-30', '2018-10-30 07:27:19', '2018-10-30'),
(147, 1, 3, 3, '2018-10-30', '2018-10-30 07:27:19', '2018-10-30'),
(148, 1, 4, 3, '2018-10-30', '2018-10-30 07:27:19', '2018-10-30'),
(149, 1, 6, 3, '2018-10-30', '2018-10-30 07:27:19', '2018-10-30'),
(150, 1, 7, 3, '2018-10-30', '2018-10-30 07:27:19', '2018-10-30'),
(151, 1, 8, 3, '2018-10-30', '2018-10-30 07:27:19', '2018-10-30'),
(152, 1, 9, 3, '2018-10-30', '2018-10-30 07:27:19', '2018-10-30'),
(153, 1, 5, 4, '2018-10-30', '2018-10-30 07:27:19', '2018-10-30'),
(157, 1, 13, 6, '2018-10-30', '2018-10-30 07:27:19', '2018-10-30'),
(158, 1, 1, 1, '2018-10-31', '2018-10-31 10:12:05', '2018-10-31'),
(159, 1, 2, 2, '2018-10-31', '2018-10-31 10:12:05', '2018-10-31'),
(160, 1, 3, 3, '2018-10-31', '2018-10-31 10:12:05', '2018-10-31'),
(161, 1, 4, 3, '2018-10-31', '2018-10-31 10:12:05', '2018-10-31'),
(162, 1, 6, 3, '2018-10-31', '2018-10-31 10:12:05', '2018-10-31'),
(163, 1, 7, 3, '2018-10-31', '2018-10-31 10:12:05', '2018-10-31'),
(164, 1, 8, 3, '2018-10-31', '2018-10-31 10:12:05', '2018-10-31'),
(165, 1, 9, 3, '2018-10-31', '2018-10-31 10:12:05', '2018-10-31'),
(166, 1, 5, 4, '2018-10-31', '2018-10-31 10:12:05', '2018-10-31'),
(170, 1, 13, 6, '2018-10-31', '2018-10-31 10:12:05', '2018-10-31'),
(171, 1, 14, 6, '2018-10-31', '2018-10-31 10:12:05', '2018-10-31'),
(172, 1, 1, 1, '2018-10-31', '2018-10-31 10:12:50', '2018-10-31'),
(173, 1, 2, 2, '2018-10-31', '2018-10-31 10:12:50', '2018-10-31'),
(174, 1, 3, 3, '2018-10-31', '2018-10-31 10:12:50', '2018-10-31'),
(175, 1, 4, 3, '2018-10-31', '2018-10-31 10:12:50', '2018-10-31'),
(176, 1, 6, 3, '2018-10-31', '2018-10-31 10:12:50', '2018-10-31'),
(177, 1, 7, 3, '2018-10-31', '2018-10-31 10:12:50', '2018-10-31'),
(178, 1, 8, 3, '2018-10-31', '2018-10-31 10:12:50', '2018-10-31'),
(179, 1, 9, 3, '2018-10-31', '2018-10-31 10:12:50', '2018-10-31'),
(180, 1, 5, 4, '2018-10-31', '2018-10-31 10:12:50', '2018-10-31'),
(184, 1, 13, 6, '2018-10-31', '2018-10-31 10:12:50', '2018-10-31'),
(185, 1, 14, 6, '2018-10-31', '2018-10-31 10:12:50', '2018-10-31'),
(189, 1, 1, 1, '2018-10-31', '2018-10-31 10:19:10', '2018-10-31'),
(190, 1, 2, 2, '2018-10-31', '2018-10-31 10:19:10', '2018-10-31'),
(191, 1, 3, 3, '2018-10-31', '2018-10-31 10:19:10', '2018-10-31'),
(192, 1, 4, 3, '2018-10-31', '2018-10-31 10:19:10', '2018-10-31'),
(193, 1, 6, 3, '2018-10-31', '2018-10-31 10:19:10', '2018-10-31'),
(194, 1, 7, 3, '2018-10-31', '2018-10-31 10:19:10', '2018-10-31'),
(195, 1, 8, 3, '2018-10-31', '2018-10-31 10:19:10', '2018-10-31'),
(196, 1, 9, 3, '2018-10-31', '2018-10-31 10:19:10', '2018-10-31'),
(197, 1, 5, 4, '2018-10-31', '2018-10-31 10:19:10', '2018-10-31'),
(201, 1, 13, 6, '2018-10-31', '2018-10-31 10:19:10', '2018-10-31'),
(202, 1, 14, 6, '2018-10-31', '2018-10-31 10:19:10', '2018-10-31'),
(206, 1, 1, 1, '2018-10-31', '2018-10-31 10:19:19', '2018-10-31'),
(207, 1, 2, 2, '2018-10-31', '2018-10-31 10:19:19', '2018-10-31'),
(208, 1, 3, 3, '2018-10-31', '2018-10-31 10:19:19', '2018-10-31'),
(209, 1, 4, 3, '2018-10-31', '2018-10-31 10:19:19', '2018-10-31'),
(210, 1, 6, 3, '2018-10-31', '2018-10-31 10:19:19', '2018-10-31'),
(211, 1, 7, 3, '2018-10-31', '2018-10-31 10:19:19', '2018-10-31'),
(212, 1, 8, 3, '2018-10-31', '2018-10-31 10:19:19', '2018-10-31'),
(213, 1, 9, 3, '2018-10-31', '2018-10-31 10:19:19', '2018-10-31'),
(214, 1, 5, 4, '2018-10-31', '2018-10-31 10:19:19', '2018-10-31'),
(218, 1, 13, 6, '2018-10-31', '2018-10-31 10:19:19', '2018-10-31'),
(219, 1, 14, 6, '2018-10-31', '2018-10-31 10:19:19', '2018-10-31'),
(220, 1, 1, 1, '2018-10-31', '2018-10-31 10:19:26', '2018-10-31'),
(221, 1, 2, 2, '2018-10-31', '2018-10-31 10:19:26', '2018-10-31'),
(222, 1, 3, 3, '2018-10-31', '2018-10-31 10:19:26', '2018-10-31'),
(223, 1, 4, 3, '2018-10-31', '2018-10-31 10:19:26', '2018-10-31'),
(224, 1, 6, 3, '2018-10-31', '2018-10-31 10:19:26', '2018-10-31'),
(225, 1, 7, 3, '2018-10-31', '2018-10-31 10:19:26', '2018-10-31'),
(226, 1, 8, 3, '2018-10-31', '2018-10-31 10:19:26', '2018-10-31'),
(227, 1, 9, 3, '2018-10-31', '2018-10-31 10:19:26', '2018-10-31'),
(228, 1, 5, 4, '2018-10-31', '2018-10-31 10:19:26', '2018-10-31'),
(232, 1, 13, 6, '2018-10-31', '2018-10-31 10:19:26', '2018-10-31'),
(233, 1, 14, 6, '2018-10-31', '2018-10-31 10:19:26', '2018-10-31'),
(237, 1, 1, 1, '2018-10-31', '2018-10-31 10:25:21', '2018-10-31'),
(238, 1, 2, 2, '2018-10-31', '2018-10-31 10:25:21', '2018-10-31'),
(239, 1, 3, 3, '2018-10-31', '2018-10-31 10:25:21', '2018-10-31'),
(240, 1, 4, 3, '2018-10-31', '2018-10-31 10:25:21', '2018-10-31'),
(241, 1, 6, 3, '2018-10-31', '2018-10-31 10:25:21', '2018-10-31'),
(242, 1, 7, 3, '2018-10-31', '2018-10-31 10:25:21', '2018-10-31'),
(243, 1, 8, 3, '2018-10-31', '2018-10-31 10:25:21', '2018-10-31'),
(244, 1, 9, 3, '2018-10-31', '2018-10-31 10:25:21', '2018-10-31'),
(245, 1, 5, 4, '2018-10-31', '2018-10-31 10:25:21', '2018-10-31'),
(249, 1, 13, 6, '2018-10-31', '2018-10-31 10:25:21', '2018-10-31'),
(250, 1, 14, 6, '2018-10-31', '2018-10-31 10:25:21', '2018-10-31'),
(254, 1, 1, 1, '2018-10-31', '2018-10-31 10:27:26', '2018-10-31'),
(255, 1, 2, 2, '2018-10-31', '2018-10-31 10:27:26', '2018-10-31'),
(256, 1, 3, 3, '2018-10-31', '2018-10-31 10:27:26', '2018-10-31'),
(257, 1, 4, 3, '2018-10-31', '2018-10-31 10:27:26', '2018-10-31'),
(258, 1, 6, 3, '2018-10-31', '2018-10-31 10:27:26', '2018-10-31'),
(259, 1, 7, 3, '2018-10-31', '2018-10-31 10:27:26', '2018-10-31'),
(260, 1, 8, 3, '2018-10-31', '2018-10-31 10:27:26', '2018-10-31'),
(261, 1, 9, 3, '2018-10-31', '2018-10-31 10:27:26', '2018-10-31'),
(262, 1, 5, 4, '2018-10-31', '2018-10-31 10:27:26', '2018-10-31'),
(266, 1, 13, 6, '2018-10-31', '2018-10-31 10:27:26', '2018-10-31'),
(267, 1, 14, 6, '2018-10-31', '2018-10-31 10:27:26', '2018-10-31'),
(268, 1, 16, 8, '2018-10-31', '2018-10-31 10:27:26', '2018-10-31'),
(269, 1, 1, 1, '2018-11-05', '2018-11-05 12:08:24', '2018-11-05'),
(270, 1, 2, 2, '2018-11-05', '2018-11-05 12:08:24', '2018-11-05'),
(271, 1, 3, 3, '2018-11-05', '2018-11-05 12:08:24', '2018-11-05'),
(272, 1, 4, 3, '2018-11-05', '2018-11-05 12:08:24', '2018-11-05'),
(273, 1, 6, 3, '2018-11-05', '2018-11-05 12:08:24', '2018-11-05'),
(274, 1, 7, 3, '2018-11-05', '2018-11-05 12:08:24', '2018-11-05'),
(275, 1, 8, 3, '2018-11-05', '2018-11-05 12:08:24', '2018-11-05'),
(276, 1, 9, 3, '2018-11-05', '2018-11-05 12:08:24', '2018-11-05'),
(277, 1, 5, 4, '2018-11-05', '2018-11-05 12:08:24', '2018-11-05'),
(281, 1, 13, 6, '2018-11-05', '2018-11-05 12:08:24', '2018-11-05'),
(282, 1, 14, 6, '2018-11-05', '2018-11-05 12:08:24', '2018-11-05'),
(283, 1, 16, 8, '2018-11-05', '2018-11-05 12:08:24', '2018-11-05'),
(284, 1, 18, 8, '2018-11-05', '2018-11-05 12:08:24', '2018-11-05'),
(285, 1, 19, 8, '2018-11-05', '2018-11-05 12:08:24', '2018-11-05'),
(286, 1, 1, 1, '2018-11-05', '2018-11-05 12:09:31', '2018-11-05'),
(287, 1, 2, 2, '2018-11-05', '2018-11-05 12:09:31', '2018-11-05'),
(288, 1, 3, 3, '2018-11-05', '2018-11-05 12:09:31', '2018-11-05'),
(289, 1, 4, 3, '2018-11-05', '2018-11-05 12:09:31', '2018-11-05'),
(290, 1, 6, 3, '2018-11-05', '2018-11-05 12:09:31', '2018-11-05'),
(291, 1, 7, 3, '2018-11-05', '2018-11-05 12:09:31', '2018-11-05'),
(292, 1, 8, 3, '2018-11-05', '2018-11-05 12:09:31', '2018-11-05'),
(293, 1, 9, 3, '2018-11-05', '2018-11-05 12:09:31', '2018-11-05'),
(294, 1, 5, 4, '2018-11-05', '2018-11-05 12:09:31', '2018-11-05'),
(298, 1, 13, 6, '2018-11-05', '2018-11-05 12:09:31', '2018-11-05'),
(299, 1, 14, 6, '2018-11-05', '2018-11-05 12:09:31', '2018-11-05'),
(300, 1, 16, 8, '2018-11-05', '2018-11-05 12:09:31', '2018-11-05'),
(301, 1, 18, 8, '2018-11-05', '2018-11-05 12:09:31', '2018-11-05'),
(302, 1, 19, 8, '2018-11-05', '2018-11-05 12:09:31', '2018-11-05'),
(304, 1, 1, 1, '2018-11-05', '2018-11-05 12:22:54', '2018-11-05'),
(305, 1, 2, 2, '2018-11-05', '2018-11-05 12:22:54', '2018-11-05'),
(306, 1, 3, 3, '2018-11-05', '2018-11-05 12:22:54', '2018-11-05'),
(307, 1, 4, 3, '2018-11-05', '2018-11-05 12:22:54', '2018-11-05'),
(308, 1, 6, 3, '2018-11-05', '2018-11-05 12:22:54', '2018-11-05'),
(309, 1, 7, 3, '2018-11-05', '2018-11-05 12:22:54', '2018-11-05'),
(310, 1, 8, 3, '2018-11-05', '2018-11-05 12:22:54', '2018-11-05'),
(311, 1, 9, 3, '2018-11-05', '2018-11-05 12:22:54', '2018-11-05'),
(312, 1, 5, 4, '2018-11-05', '2018-11-05 12:22:54', '2018-11-05'),
(316, 1, 13, 6, '2018-11-05', '2018-11-05 12:22:54', '2018-11-05'),
(317, 1, 14, 6, '2018-11-05', '2018-11-05 12:22:54', '2018-11-05'),
(318, 1, 16, 8, '2018-11-05', '2018-11-05 12:22:54', '2018-11-05'),
(319, 1, 18, 8, '2018-11-05', '2018-11-05 12:22:54', '2018-11-05'),
(320, 1, 19, 8, '2018-11-05', '2018-11-05 12:22:54', '2018-11-05'),
(323, 1, 1, 1, '2018-11-06', '2018-11-06 14:11:57', '2018-11-06'),
(324, 1, 2, 2, '2018-11-06', '2018-11-06 14:11:57', '2018-11-06'),
(325, 1, 3, 3, '2018-11-06', '2018-11-06 14:11:57', '2018-11-06'),
(326, 1, 4, 3, '2018-11-06', '2018-11-06 14:11:57', '2018-11-06'),
(327, 1, 6, 3, '2018-11-06', '2018-11-06 14:11:57', '2018-11-06'),
(328, 1, 7, 3, '2018-11-06', '2018-11-06 14:11:57', '2018-11-06'),
(329, 1, 8, 3, '2018-11-06', '2018-11-06 14:11:57', '2018-11-06'),
(330, 1, 9, 3, '2018-11-06', '2018-11-06 14:11:57', '2018-11-06'),
(331, 1, 5, 4, '2018-11-06', '2018-11-06 14:11:57', '2018-11-06'),
(335, 1, 13, 6, '2018-11-06', '2018-11-06 14:11:57', '2018-11-06'),
(336, 1, 14, 6, '2018-11-06', '2018-11-06 14:11:57', '2018-11-06'),
(337, 1, 16, 8, '2018-11-06', '2018-11-06 14:11:57', '2018-11-06'),
(338, 1, 18, 8, '2018-11-06', '2018-11-06 14:11:57', '2018-11-06'),
(339, 1, 19, 8, '2018-11-06', '2018-11-06 14:11:57', '2018-11-06'),
(343, 1, 1, 1, NULL, '2018-11-06 13:11:57', '2018-11-06'),
(344, 1, 2, 2, NULL, '2018-11-06 13:11:57', '2018-11-06'),
(345, 1, 3, 3, NULL, '2018-11-06 13:11:57', '2018-11-06'),
(346, 1, 4, 3, NULL, '2018-11-06 13:11:57', '2018-11-06'),
(347, 1, 6, 3, NULL, '2018-11-06 13:11:58', '2018-11-06'),
(348, 1, 7, 3, NULL, '2018-11-06 13:11:58', '2018-11-06'),
(349, 1, 8, 3, NULL, '2018-11-06 13:11:58', '2018-11-06'),
(350, 1, 9, 3, NULL, '2018-11-06 13:11:58', '2018-11-06'),
(351, 1, 5, 4, NULL, '2018-11-06 13:11:58', '2018-11-06'),
(357, 1, 13, 6, NULL, '2018-11-06 13:11:58', '2018-11-06'),
(358, 1, 14, 6, NULL, '2018-11-06 13:11:58', '2018-11-06'),
(359, 1, 16, 8, NULL, '2018-11-06 13:11:58', '2018-11-06'),
(360, 1, 18, 8, NULL, '2018-11-06 13:11:58', '2018-11-06'),
(361, 1, 19, 8, NULL, '2018-11-06 13:11:58', '2018-11-06');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `address` varchar(500) NOT NULL,
  `start_date` date NOT NULL,
  `finish_date` date NOT NULL,
  `project_details` varchar(500) NOT NULL,
  `rate` float NOT NULL,
  `employee_id` int(11) NOT NULL,
  `budget` float NOT NULL,
  `current_balance` float NOT NULL,
  `work_group_id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `project_attachments`
--

CREATE TABLE `project_attachments` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `file_name` varchar(500) NOT NULL,
  `project_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `project_orders`
--

CREATE TABLE `project_orders` (
  `id` int(11) NOT NULL,
  `no` int(20) NOT NULL,
  `date` date NOT NULL,
  `project_id` int(11) NOT NULL,
  `shipping_date` date NOT NULL,
  `receiving_date` date NOT NULL,
  `recipient_name` varchar(150) NOT NULL,
  `recipient_phone` varchar(50) NOT NULL,
  `recipient_address` varchar(500) NOT NULL,
  `status` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `project_order_details`
--

CREATE TABLE `project_order_details` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `qty` float NOT NULL,
  `description` varchar(500) NOT NULL,
  `status` varchar(50) NOT NULL,
  `order_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `project_visits`
--

CREATE TABLE `project_visits` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `project_id` int(11) NOT NULL,
  `description` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `project_visit_schedulars`
--

CREATE TABLE `project_visit_schedulars` (
  `id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `description` varchar(500) NOT NULL,
  `project_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `no` varchar(20) NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `supplier_bill` varchar(50) NOT NULL,
  `pay_type` varchar(10) NOT NULL,
  `amount` float NOT NULL,
  `discount` float NOT NULL,
  `net_amount` float NOT NULL,
  `paid` float NOT NULL,
  `remaining` float NOT NULL,
  `status` varchar(15) NOT NULL,
  `returned_no` varchar(20) NOT NULL,
  `type` varchar(15) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_details`
--

CREATE TABLE `purchase_details` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `qty` float NOT NULL,
  `price` float NOT NULL,
  `total` float NOT NULL,
  `description` varchar(100) NOT NULL,
  `purchase_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `qoutations`
--

CREATE TABLE `qoutations` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `no` varchar(20) NOT NULL,
  `customer_name` varchar(250) NOT NULL,
  `customer_phone` varchar(50) NOT NULL,
  `customer_address` varchar(500) NOT NULL,
  `valide_date` date NOT NULL,
  `notes` varchar(500) NOT NULL,
  `amount` float NOT NULL,
  `discount` float NOT NULL,
  `net_amount` float NOT NULL,
  `status` varchar(15) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `qoutation_details`
--

CREATE TABLE `qoutation_details` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `qty` float NOT NULL,
  `price` float NOT NULL,
  `total` float NOT NULL,
  `description` varchar(500) NOT NULL,
  `qoutation_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `resignations`
--

CREATE TABLE `resignations` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `reason` varchar(500) NOT NULL,
  `status` varchar(50) NOT NULL,
  `hr_admin_opinion` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role_name` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(10) NOT NULL,
  `deleted_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `created_at`, `created_by`, `deleted_at`, `updated_at`) VALUES
(1, 'Admin role', '2018-10-23 13:54:05', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `salary_items`
--

CREATE TABLE `salary_items` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `direction` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `salary_profiles`
--

CREATE TABLE `salary_profiles` (
  `id` int(11) NOT NULL,
  `salary_item_id` int(11) NOT NULL,
  `amount` float NOT NULL,
  `job_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `no` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `pay_type` varchar(10) NOT NULL,
  `amount` float NOT NULL,
  `discount` float NOT NULL,
  `net_amount` float NOT NULL,
  `paid` float NOT NULL,
  `remaining` float NOT NULL,
  `shipping_date` date NOT NULL,
  `receiving_date` date NOT NULL,
  `status` varchar(15) NOT NULL,
  `returned_no` varchar(20) NOT NULL,
  `type` varchar(15) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sales_details`
--

CREATE TABLE `sales_details` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `qty` float NOT NULL,
  `price` float NOT NULL,
  `total` float NOT NULL,
  `description` varchar(100) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `stock_details`
--

CREATE TABLE `stock_details` (
  `id` int(11) NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `qty` float NOT NULL,
  `status` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `stock_transactions`
--

CREATE TABLE `stock_transactions` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `no` varchar(20) NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `transaction_type` int(10) NOT NULL,
  `qty` float NOT NULL,
  `price` float NOT NULL,
  `description` varchar(500) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL,
  `no` varchar(20) NOT NULL,
  `name` varchar(250) NOT NULL,
  `country` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `web_site` varchar(150) NOT NULL,
  `fax` varchar(20) NOT NULL,
  `account_id` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `terminations`
--

CREATE TABLE `terminations` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `employee_id` int(11) NOT NULL,
  `description` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `trainings`
--

CREATE TABLE `trainings` (
  `id` int(11) NOT NULL,
  `training_subject` varchar(500) NOT NULL,
  `training_type` varchar(150) NOT NULL,
  `training_nature` varchar(150) NOT NULL,
  `training_title` varchar(150) NOT NULL,
  `trainer_name` varchar(150) NOT NULL,
  `training_location` varchar(150) NOT NULL,
  `sponesored_by` varchar(150) NOT NULL,
  `organized_by` varchar(150) NOT NULL,
  `training_from` date NOT NULL,
  `training_to` date NOT NULL,
  `training_cost` float NOT NULL,
  `travel_cost` float NOT NULL,
  `department_id` int(11) NOT NULL,
  `description` varchar(500) NOT NULL,
  `reason` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `training_members`
--

CREATE TABLE `training_members` (
  `id` int(11) NOT NULL,
  `training_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'test', 'gdfgdfg', '2018-10-22 13:06:28', '2018-10-22 17:06:28', '2018-10-22 17:06:28'),
(2, 'gdfgdfgdfg', 'gdfgdfgdfg', '2018-10-22 13:12:57', '2018-10-22 17:12:57', '2018-10-22 17:12:57'),
(3, 'dfgdsfgdgsdg', 'dsfgsdfgdsgdsgdsfg', '2018-10-22 13:19:35', '2018-10-22 17:19:35', '2018-10-22 17:19:35'),
(4, 'hfghfghfgh', 'fghfghfgh', '2018-10-22 13:29:29', '2018-10-22 17:29:29', '2018-10-22 17:29:29'),
(5, 'fasdfsadfasdf', 'dgdgdfg', '2018-10-22 13:32:18', '2018-10-22 17:32:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `role` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_group` varchar(50) NOT NULL,
  `image` varchar(500) DEFAULT NULL,
  `status` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(1000) NOT NULL,
  `email` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `user_name`, `role`, `password`, `user_group`, `image`, `status`, `created_at`, `updated_at`, `deleted_at`, `remember_token`, `email`) VALUES
(2, 'admin@admin.com', 'admin@admin.com', 1, '$2y$10$VSM40wvyEkRAe92rI86Nt.Kyd8dQhBeyVgCWf27CzHC3aoj7UMrcW', '123', 'https://cdn0.iconfinder.com/data/icons/mobile-device/512/man-body-person-blue-round-512.png', '', '2018-11-06 14:16:05', NULL, NULL, 'aITpDcTwzbe7kG4NqTQ8GsMoz3RKDzoAvJlkaI9HuPHEflfkclLLoG8KIVoD', 'admin@admin.com');

-- --------------------------------------------------------

--
-- Table structure for table `vacations`
--

CREATE TABLE `vacations` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `vacation_type` varchar(50) NOT NULL,
  `vacation_balance` int(11) NOT NULL,
  `current_balance` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `warehouse`
--

CREATE TABLE `warehouse` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `keeper` varchar(100) NOT NULL,
  `location` varchar(500) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `warnings`
--

CREATE TABLE `warnings` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `subject` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `emp_opinion` varchar(500) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `work_groups`
--

CREATE TABLE `work_groups` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `work_group_members`
--

CREATE TABLE `work_group_members` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `work_group_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `accounts_transactions`
--
ALTER TABLE `accounts_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `account_id` (`account_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `account_id_2` (`account_id`),
  ADD KEY `account_id_3` (`account_id`),
  ADD KEY `user_id_2` (`user_id`);

--
-- Indexes for table `actions`
--
ALTER TABLE `actions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `model` (`model`);

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `deduction_id` (`deduction_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `bonuses`
--
ALTER TABLE `bonuses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`),
  ADD KEY `salary_item_id` (`salary_item_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `certifications`
--
ALTER TABLE `certifications`
  ADD KEY `employee_id` (`employee_id`),
  ADD KEY `cretification_id` (`cretification_id`);

--
-- Indexes for table `certification_configs`
--
ALTER TABLE `certification_configs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contracts`
--
ALTER TABLE `contracts`
  ADD KEY `id` (`id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses_details`
--
ALTER TABLE `courses_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deductions`
--
ALTER TABLE `deductions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `identity_id` (`identity_id`),
  ADD KEY `job_id` (`job_id`),
  ADD KEY `account_id` (`account_id`);

--
-- Indexes for table `employee_exits`
--
ALTER TABLE `employee_exits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `employee_leaves`
--
ALTER TABLE `employee_leaves`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vaction_id` (`vaction_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `familys`
--
ALTER TABLE `familys`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `holydays`
--
ALTER TABLE `holydays`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `identity_types`
--
ALTER TABLE `identity_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `insurances`
--
ALTER TABLE `insurances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `unit_id` (`unit_id`),
  ADD KEY `category_id_2` (`category_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `departmentID` (`departmentID`);

--
-- Indexes for table `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `loans_payments`
--
ALTER TABLE `loans_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loan_id` (`loan_id`);

--
-- Indexes for table `models`
--
ALTER TABLE `models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movements`
--
ALTER TABLE `movements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `from_warehouse_id` (`from_warehouse_id`),
  ADD KEY `to_warehouse_id` (`to_warehouse_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `movement_details`
--
ALTER TABLE `movement_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `movement_id` (`movement_id`);

--
-- Indexes for table `nationalities`
--
ALTER TABLE `nationalities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `warehouse_id` (`warehouse_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `id` (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `payrolls`
--
ALTER TABLE `payrolls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`),
  ADD KEY `salary_item_id` (`salary_item_id`);

--
-- Indexes for table `privileges`
--
ALTER TABLE `privileges`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role` (`role`),
  ADD KEY `action` (`action`),
  ADD KEY `model` (`model`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `work_group_id` (`work_group_id`),
  ADD KEY `employee_id` (`employee_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `project_attachments`
--
ALTER TABLE `project_attachments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `project_orders`
--
ALTER TABLE `project_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `project_order_details`
--
ALTER TABLE `project_order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `project_visits`
--
ALTER TABLE `project_visits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `project_visit_schedulars`
--
ALTER TABLE `project_visit_schedulars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `warehouse_id` (`warehouse_id`),
  ADD KEY `supplier_id` (`supplier_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `purchase_details`
--
ALTER TABLE `purchase_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `purchase_id` (`purchase_id`),
  ADD KEY `purchase_id_2` (`purchase_id`);

--
-- Indexes for table `qoutations`
--
ALTER TABLE `qoutations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `qoutation_details`
--
ALTER TABLE `qoutation_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `qoutation_id` (`qoutation_id`);

--
-- Indexes for table `resignations`
--
ALTER TABLE `resignations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary_items`
--
ALTER TABLE `salary_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary_profiles`
--
ALTER TABLE `salary_profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `salary_item_id` (`salary_item_id`),
  ADD KEY `job_id` (`job_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `warehouse_id` (`warehouse_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `sales_details`
--
ALTER TABLE `sales_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `sales_id` (`sales_id`);

--
-- Indexes for table `stock_details`
--
ALTER TABLE `stock_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `warehouse_id` (`warehouse_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `stock_transactions`
--
ALTER TABLE `stock_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `warehouse_id` (`warehouse_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terminations`
--
ALTER TABLE `terminations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `trainings`
--
ALTER TABLE `trainings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `department_id` (`department_id`);

--
-- Indexes for table `training_members`
--
ALTER TABLE `training_members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `training_id` (`training_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role` (`role`);

--
-- Indexes for table `vacations`
--
ALTER TABLE `vacations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `warehouse`
--
ALTER TABLE `warehouse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warnings`
--
ALTER TABLE `warnings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `work_groups`
--
ALTER TABLE `work_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work_group_members`
--
ALTER TABLE `work_group_members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`),
  ADD KEY `work_group_id` (`work_group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `accounts_transactions`
--
ALTER TABLE `accounts_transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `actions`
--
ALTER TABLE `actions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bonuses`
--
ALTER TABLE `bonuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `certification_configs`
--
ALTER TABLE `certification_configs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `contracts`
--
ALTER TABLE `contracts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `courses_details`
--
ALTER TABLE `courses_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `deductions`
--
ALTER TABLE `deductions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `employee_exits`
--
ALTER TABLE `employee_exits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `employee_leaves`
--
ALTER TABLE `employee_leaves`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `familys`
--
ALTER TABLE `familys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `holydays`
--
ALTER TABLE `holydays`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `identity_types`
--
ALTER TABLE `identity_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `insurances`
--
ALTER TABLE `insurances`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `loans`
--
ALTER TABLE `loans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `loans_payments`
--
ALTER TABLE `loans_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `models`
--
ALTER TABLE `models`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `movements`
--
ALTER TABLE `movements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `movement_details`
--
ALTER TABLE `movement_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `nationalities`
--
ALTER TABLE `nationalities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payrolls`
--
ALTER TABLE `payrolls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `privileges`
--
ALTER TABLE `privileges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=365;
--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `project_attachments`
--
ALTER TABLE `project_attachments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `project_orders`
--
ALTER TABLE `project_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `project_order_details`
--
ALTER TABLE `project_order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `project_visits`
--
ALTER TABLE `project_visits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `project_visit_schedulars`
--
ALTER TABLE `project_visit_schedulars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `purchase_details`
--
ALTER TABLE `purchase_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `qoutations`
--
ALTER TABLE `qoutations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `qoutation_details`
--
ALTER TABLE `qoutation_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `resignations`
--
ALTER TABLE `resignations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `salary_items`
--
ALTER TABLE `salary_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `salary_profiles`
--
ALTER TABLE `salary_profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sales_details`
--
ALTER TABLE `sales_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `stock_details`
--
ALTER TABLE `stock_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `stock_transactions`
--
ALTER TABLE `stock_transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `terminations`
--
ALTER TABLE `terminations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `trainings`
--
ALTER TABLE `trainings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `training_members`
--
ALTER TABLE `training_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `vacations`
--
ALTER TABLE `vacations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `warehouse`
--
ALTER TABLE `warehouse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `warnings`
--
ALTER TABLE `warnings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `work_groups`
--
ALTER TABLE `work_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `work_group_members`
--
ALTER TABLE `work_group_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `accounts_transactions`
--
ALTER TABLE `accounts_transactions`
  ADD CONSTRAINT `accounts_transactions_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `accounts_transactions_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `actions`
--
ALTER TABLE `actions`
  ADD CONSTRAINT `actions_ibfk_1` FOREIGN KEY (`model`) REFERENCES `models` (`id`);

--
-- Constraints for table `attendances`
--
ALTER TABLE `attendances`
  ADD CONSTRAINT `attendances_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `attendances_ibfk_2` FOREIGN KEY (`deduction_id`) REFERENCES `deductions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bonuses`
--
ALTER TABLE `bonuses`
  ADD CONSTRAINT `bonuses_ibfk_1` FOREIGN KEY (`salary_item_id`) REFERENCES `salary_items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bonuses_ibfk_2` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `certifications`
--
ALTER TABLE `certifications`
  ADD CONSTRAINT `certifications_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `certifications_ibfk_2` FOREIGN KEY (`cretification_id`) REFERENCES `certification_configs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `contracts`
--
ALTER TABLE `contracts`
  ADD CONSTRAINT `contracts_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `courses_details`
--
ALTER TABLE `courses_details`
  ADD CONSTRAINT `courses_details_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `courses_details_ibfk_2` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `deductions`
--
ALTER TABLE `deductions`
  ADD CONSTRAINT `deductions_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `documents`
--
ALTER TABLE `documents`
  ADD CONSTRAINT `documents_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`identity_id`) REFERENCES `identity_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employees_ibfk_2` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employees_ibfk_3` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employee_exits`
--
ALTER TABLE `employee_exits`
  ADD CONSTRAINT `employee_exits_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employee_leaves`
--
ALTER TABLE `employee_leaves`
  ADD CONSTRAINT `employee_leaves_ibfk_1` FOREIGN KEY (`vaction_id`) REFERENCES `vacations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employee_leaves_ibfk_2` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `familys`
--
ALTER TABLE `familys`
  ADD CONSTRAINT `familys_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `holydays`
--
ALTER TABLE `holydays`
  ADD CONSTRAINT `holydays_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `insurances`
--
ALTER TABLE `insurances`
  ADD CONSTRAINT `insurances_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `items_ibfk_2` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_ibfk_1` FOREIGN KEY (`departmentID`) REFERENCES `departments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `loans`
--
ALTER TABLE `loans`
  ADD CONSTRAINT `loans_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `loans_payments`
--
ALTER TABLE `loans_payments`
  ADD CONSTRAINT `loans_payments_ibfk_1` FOREIGN KEY (`loan_id`) REFERENCES `loans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `movements`
--
ALTER TABLE `movements`
  ADD CONSTRAINT `movements_ibfk_1` FOREIGN KEY (`from_warehouse_id`) REFERENCES `warehouse` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `movements_ibfk_2` FOREIGN KEY (`to_warehouse_id`) REFERENCES `warehouse` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `movements_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `movement_details`
--
ALTER TABLE `movement_details`
  ADD CONSTRAINT `movement_details_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `movement_details_ibfk_2` FOREIGN KEY (`movement_id`) REFERENCES `movements` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`warehouse_id`) REFERENCES `warehouse` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payrolls`
--
ALTER TABLE `payrolls`
  ADD CONSTRAINT `payrolls_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `payrolls_ibfk_2` FOREIGN KEY (`salary_item_id`) REFERENCES `salary_items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `privileges`
--
ALTER TABLE `privileges`
  ADD CONSTRAINT `privileges_ibfk_1` FOREIGN KEY (`model`) REFERENCES `models` (`id`),
  ADD CONSTRAINT `privileges_ibfk_2` FOREIGN KEY (`action`) REFERENCES `actions` (`id`),
  ADD CONSTRAINT `privileges_ibfk_3` FOREIGN KEY (`role`) REFERENCES `roles` (`id`);

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`),
  ADD CONSTRAINT `projects_ibfk_2` FOREIGN KEY (`work_group_id`) REFERENCES `work_groups` (`id`),
  ADD CONSTRAINT `projects_ibfk_3` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `project_attachments`
--
ALTER TABLE `project_attachments`
  ADD CONSTRAINT `project_attachments_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `project_attachments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `project_orders`
--
ALTER TABLE `project_orders`
  ADD CONSTRAINT `project_orders_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `project_orders_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `project_order_details`
--
ALTER TABLE `project_order_details`
  ADD CONSTRAINT `project_order_details_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `project_order_details_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `project_visits`
--
ALTER TABLE `project_visits`
  ADD CONSTRAINT `project_visits_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `project_visit_schedulars`
--
ALTER TABLE `project_visit_schedulars`
  ADD CONSTRAINT `project_visit_schedulars_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `project_visit_schedulars_ibfk_2` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `purchases_ibfk_1` FOREIGN KEY (`warehouse_id`) REFERENCES `warehouse` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `purchases_ibfk_2` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `purchases_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `purchase_details`
--
ALTER TABLE `purchase_details`
  ADD CONSTRAINT `purchase_details_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `purchase_details_ibfk_2` FOREIGN KEY (`purchase_id`) REFERENCES `purchases` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `qoutations`
--
ALTER TABLE `qoutations`
  ADD CONSTRAINT `qoutations_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `qoutation_details`
--
ALTER TABLE `qoutation_details`
  ADD CONSTRAINT `qoutation_details_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `qoutation_details_ibfk_2` FOREIGN KEY (`qoutation_id`) REFERENCES `qoutations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `resignations`
--
ALTER TABLE `resignations`
  ADD CONSTRAINT `resignations_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `salary_profiles`
--
ALTER TABLE `salary_profiles`
  ADD CONSTRAINT `salary_profiles_ibfk_1` FOREIGN KEY (`salary_item_id`) REFERENCES `salary_items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `salary_profiles_ibfk_2` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`warehouse_id`) REFERENCES `warehouse` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sales_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sales_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sales_details`
--
ALTER TABLE `sales_details`
  ADD CONSTRAINT `sales_details_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sales_details_ibfk_2` FOREIGN KEY (`sales_id`) REFERENCES `sales` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stock_details`
--
ALTER TABLE `stock_details`
  ADD CONSTRAINT `stock_details_ibfk_1` FOREIGN KEY (`warehouse_id`) REFERENCES `warehouse` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stock_details_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stock_transactions`
--
ALTER TABLE `stock_transactions`
  ADD CONSTRAINT `stock_transactions_ibfk_1` FOREIGN KEY (`warehouse_id`) REFERENCES `warehouse` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stock_transactions_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stock_transactions_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `terminations`
--
ALTER TABLE `terminations`
  ADD CONSTRAINT `terminations_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trainings`
--
ALTER TABLE `trainings`
  ADD CONSTRAINT `trainings_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `training_members`
--
ALTER TABLE `training_members`
  ADD CONSTRAINT `training_members_ibfk_1` FOREIGN KEY (`training_id`) REFERENCES `trainings` (`id`),
  ADD CONSTRAINT `training_members_ibfk_2` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role`) REFERENCES `roles` (`id`);

--
-- Constraints for table `vacations`
--
ALTER TABLE `vacations`
  ADD CONSTRAINT `vacations_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `warnings`
--
ALTER TABLE `warnings`
  ADD CONSTRAINT `warnings_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `work_group_members`
--
ALTER TABLE `work_group_members`
  ADD CONSTRAINT `work_group_members_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`),
  ADD CONSTRAINT `work_group_members_ibfk_2` FOREIGN KEY (`work_group_id`) REFERENCES `work_groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
