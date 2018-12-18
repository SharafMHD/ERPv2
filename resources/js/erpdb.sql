-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 18, 2018 at 08:04 PM
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
-- Table structure for table `accounting__accounts`
--

CREATE TABLE `accounting__accounts` (
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
-- Dumping data for table `accounting__accounts`
--

INSERT INTO `accounting__accounts` (`id`, `no`, `name`, `main_account`, `description`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'ACC-00010290', '--', '--', '--', '--', '2018-10-18 11:42:00', NULL, NULL),
(2, 'ACC-000000013', '--', 'Customers', '--', 'is active', '2018-10-18 11:42:00', NULL, NULL),
(3, '2', '2', '2', '2', '2', '2018-10-28 00:05:29', '2018-10-27 22:05:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `accounting__transactions`
--

CREATE TABLE `accounting__transactions` (
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
-- Table structure for table `hr__attendances`
--

CREATE TABLE `hr__attendances` (
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
-- Table structure for table `hr__bonuses`
--

CREATE TABLE `hr__bonuses` (
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
-- Table structure for table `hr__certifications`
--

CREATE TABLE `hr__certifications` (
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
-- Table structure for table `hr__certification_configs`
--

CREATE TABLE `hr__certification_configs` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hr__contracts`
--

CREATE TABLE `hr__contracts` (
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
-- Table structure for table `hr__courses`
--

CREATE TABLE `hr__courses` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `descritpion` varchar(500) NOT NULL,
  `award_point` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hr__courses`
--

INSERT INTO `hr__courses` (`id`, `name`, `descritpion`, `award_point`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '11', '11', '11', '2018-11-05 11:09:53', '2018-11-05 11:09:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hr__courses_details`
--

CREATE TABLE `hr__courses_details` (
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
-- Table structure for table `hr__deductions`
--

CREATE TABLE `hr__deductions` (
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
-- Table structure for table `hr__departments`
--

CREATE TABLE `hr__departments` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hr__departments`
--

INSERT INTO `hr__departments` (`id`, `name`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'بشسيبشسيبسشيب', 'بيلسيبلسيلس', '2018-10-23 15:00:01', '2018-10-23 15:00:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hr__documents`
--

CREATE TABLE `hr__documents` (
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
-- Table structure for table `hr__employees`
--

CREATE TABLE `hr__employees` (
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
-- Table structure for table `hr__employee_exits`
--

CREATE TABLE `hr__employee_exits` (
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
-- Table structure for table `hr__employee_leaves`
--

CREATE TABLE `hr__employee_leaves` (
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
-- Table structure for table `hr__familys`
--

CREATE TABLE `hr__familys` (
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
-- Table structure for table `hr__holydays`
--

CREATE TABLE `hr__holydays` (
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
-- Table structure for table `hr__identity_types`
--

CREATE TABLE `hr__identity_types` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hr__insurances`
--

CREATE TABLE `hr__insurances` (
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
-- Table structure for table `hr__jobs`
--

CREATE TABLE `hr__jobs` (
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
-- Dumping data for table `hr__jobs`
--

INSERT INTO `hr__jobs` (`id`, `code`, `name`, `description`, `departmentID`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, '11', '11', '11', 1, '2018-10-30 06:28:39', '2018-10-30 06:28:39', NULL),
(3, '1', '1', '1', 1, '2018-10-30 06:29:02', '2018-10-30 06:29:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hr__loans`
--

CREATE TABLE `hr__loans` (
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
-- Table structure for table `hr__loans_payments`
--

CREATE TABLE `hr__loans_payments` (
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
-- Table structure for table `hr__nationalities`
--

CREATE TABLE `hr__nationalities` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `code` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hr__payrolls`
--

CREATE TABLE `hr__payrolls` (
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
-- Table structure for table `hr__resignations`
--

CREATE TABLE `hr__resignations` (
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
-- Table structure for table `hr__salary_items`
--

CREATE TABLE `hr__salary_items` (
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
-- Table structure for table `hr__salary_profiles`
--

CREATE TABLE `hr__salary_profiles` (
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
-- Table structure for table `hr__terminations`
--

CREATE TABLE `hr__terminations` (
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
-- Table structure for table `hr__trainings`
--

CREATE TABLE `hr__trainings` (
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
-- Table structure for table `hr__training_members`
--

CREATE TABLE `hr__training_members` (
  `id` int(11) NOT NULL,
  `training_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hr__vacations`
--

CREATE TABLE `hr__vacations` (
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
-- Table structure for table `hr__warnings`
--

CREATE TABLE `hr__warnings` (
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
-- Table structure for table `inventory__categories`
--

CREATE TABLE `inventory__categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inventory__categories`
--

INSERT INTO `inventory__categories` (`id`, `name`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'testing', 'fsdfsdfsdf', '2018-12-03 10:10:48', '2018-10-22 17:06:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `inventory__details`
--

CREATE TABLE `inventory__details` (
  `id` int(11) NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `qty` float NOT NULL,
  `expiry_date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inventory__details`
--

INSERT INTO `inventory__details` (`id`, `warehouse_id`, `item_id`, `qty`, `expiry_date`, `created_at`, `updated_at`, `deleted_at`) VALUES
(67, 1, 1, 0, '2018-12-10', '2018-12-15 11:45:54', '2018-12-15 09:45:54', NULL),
(69, 1, 1, 0, '2018-12-12', '2018-12-16 19:32:42', '2018-12-16 17:32:42', NULL),
(71, 2, 1, 10, '2018-12-18', '2018-12-17 13:25:57', '2018-12-16 17:33:23', NULL),
(72, 2, 2, 20, '2018-12-03', '2018-12-16 17:33:37', '2018-12-16 17:33:37', NULL),
(73, 2, 1, 10, '2018-12-23', '2018-12-17 13:28:54', '2018-12-17 11:16:45', NULL),
(74, 2, 2, 5, '2018-12-10', '2018-12-17 11:18:38', '2018-12-17 11:18:38', NULL),
(75, 1, 1, 10, '2018-12-18', '2018-12-17 11:25:57', '2018-12-17 11:25:57', NULL),
(76, 1, 1, 10, '2018-12-23', '2018-12-17 11:28:54', '2018-12-17 11:28:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `inventory__items`
--

CREATE TABLE `inventory__items` (
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

--
-- Dumping data for table `inventory__items`
--

INSERT INTO `inventory__items` (`id`, `no`, `name`, `category_id`, `unit_id`, `sales_price`, `purchase_price`, `low_stock_qty`, `color`, `size`, `description`, `item_type`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'IT-00000001', 'test', 1, 8, 44, 44, 4, '--', '---', '--', 'item', '2018-12-16 15:15:21', '2018-12-03 10:04:51', NULL),
(2, 'IT-00000002', 'dsfsdfsdf', 1, 8, 333, 333, 444, '444', '20*50', '----', 'Item', '2018-12-16 15:15:30', '2018-12-03 10:17:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `inventory__movements`
--

CREATE TABLE `inventory__movements` (
  `id` int(11) NOT NULL,
  `no` varchar(20) NOT NULL,
  `from_warehouse_id` int(11) NOT NULL,
  `to_warehouse_id` int(11) NOT NULL,
  `notes` varchar(500) NOT NULL,
  `status` varchar(15) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inventory__movements`
--

INSERT INTO `inventory__movements` (`id`, `no`, `from_warehouse_id`, `to_warehouse_id`, `notes`, `status`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(48, 'R-6100272', 1, 2, '--2', 'Completed', 2, '2018-12-06 07:31:06', '2018-12-06 07:31:06', NULL),
(49, 'R-3959507', 1, 2, '--2', 'Completed', 2, '2018-12-06 07:32:47', '2018-12-06 07:32:47', NULL),
(50, 'R-1000730', 2, 1, '---2', 'Completed', 2, '2018-12-06 08:27:46', '2018-12-06 08:27:46', NULL),
(51, 'R-2507654', 1, 2, '--', 'Completed', 2, '2018-12-06 08:30:49', '2018-12-06 08:30:49', NULL),
(52, 'R-4178258', 1, 2, 'fsdfds', 'Completed', 2, '2018-12-06 08:34:42', '2018-12-06 08:34:42', NULL),
(53, 'R-1763252', 1, 2, 'tertertert', 'Completed', 2, '2018-12-06 08:35:47', '2018-12-06 08:35:47', NULL),
(54, 'R-8717488', 2, 2, 'gdfg', 'Completed', 2, '2018-12-06 08:36:38', '2018-12-06 08:36:38', NULL),
(55, 'R-5595320', 2, 1, 'tertert', 'Completed', 2, '2018-12-06 08:41:29', '2018-12-06 08:41:29', NULL),
(56, 'R-8762641', 1, 2, 'dfsdfsdf', 'Completed', 2, '2018-12-06 08:42:06', '2018-12-06 08:42:06', NULL),
(57, 'R-1482983', 2, 1, '888', 'Completed', 2, '2018-12-06 08:44:20', '2018-12-06 08:44:20', NULL),
(58, 'R-5785052', 2, 1, '888', 'Completed', 2, '2018-12-06 08:44:55', '2018-12-06 08:44:55', NULL),
(59, 'R-847975', 2, 1, '888', 'Completed', 2, '2018-12-06 08:45:02', '2018-12-06 08:45:02', NULL),
(60, 'R-4177760', 1, 2, 'fdsfsdfsss', 'Completed', 2, '2018-12-06 08:52:34', '2018-12-06 08:52:34', NULL),
(61, 'R-8071151', 1, 1, 'fdsfds', 'Completed', 2, '2018-12-06 08:53:12', '2018-12-06 08:53:12', NULL),
(62, 'R-3318516', 1, 2, 'hfghfgh', 'Completed', 2, '2018-12-06 08:54:00', '2018-12-06 08:54:00', NULL),
(63, 'R-8020581', 1, 2, 'tertertert', 'Completed', 2, '2018-12-06 08:54:43', '2018-12-06 08:54:43', NULL),
(64, 'R-1560149', 1, 2, 'jggjg', 'Completed', 2, '2018-12-12 10:39:12', '2018-12-12 08:39:12', '2018-12-12 08:39:12'),
(65, 'R-2578462', 1, 2, '--', 'Completed', 2, '2018-12-06 08:59:04', '2018-12-06 08:59:04', NULL),
(66, 'R-4768460', 1, 2, '--', 'Completed', 2, '2018-12-06 09:00:49', '2018-12-06 09:00:49', NULL),
(67, 'R-1220527', 1, 2, '--', 'Completed', 2, '2018-12-06 09:02:23', '2018-12-06 09:02:23', NULL),
(68, 'R-2660747', 1, 1, '--', 'Completed', 2, '2018-12-06 09:07:27', '2018-12-06 09:07:27', NULL),
(69, 'R-1580529', 2, 1, 'tretr', 'Completed', 2, '2018-12-06 09:08:30', '2018-12-06 09:08:30', NULL),
(70, 'R-3754624', 1, 2, '--', 'Completed', 2, '2018-12-08 08:15:42', '2018-12-08 08:15:42', NULL),
(71, 'R-1566567', 1, 2, '--', 'Completed', 2, '2018-12-08 08:23:30', '2018-12-08 08:23:30', NULL),
(72, 'R-8366752', 1, 2, '--', 'Completed', 2, '2018-12-08 08:24:09', '2018-12-08 08:24:09', NULL),
(73, 'R-5987813', 2, 1, '--', 'Completed', 2, '2018-12-08 08:25:14', '2018-12-08 08:25:14', NULL),
(74, 'R-6690075', 2, 1, '--', 'Completed', 2, '2018-12-08 08:27:08', '2018-12-08 08:27:08', NULL),
(75, 'R-603960', 1, 2, '---', 'Completed', 2, '2018-12-08 08:34:33', '2018-12-08 08:34:33', NULL),
(76, 'R-6222126', 1, 2, '---2', 'Completed', 2, '2018-12-09 09:42:38', '2018-12-09 09:42:38', NULL),
(77, 'R-6901166', 1, 2, '---2', 'Completed', 2, '2018-12-09 09:42:46', '2018-12-09 09:42:46', NULL),
(78, 'R-1497726', 1, 2, '---2', 'Completed', 2, '2018-12-09 09:46:17', '2018-12-09 09:46:17', NULL),
(79, 'R-9160493', 1, 2, '---2', 'Completed', 2, '2018-12-09 09:46:59', '2018-12-09 09:46:59', NULL),
(80, 'R-9407665', 1, 2, '---', 'Completed', 2, '2018-12-09 10:03:17', '2018-12-09 10:03:17', NULL),
(84, 'R-4181972', 1, 2, '---', 'Completed', 2, '2018-12-09 13:52:12', '2018-12-09 13:52:12', NULL),
(85, 'R-3861508', 1, 1, '---', 'Completed', 2, '2018-12-09 13:53:04', '2018-12-09 13:53:04', NULL),
(86, 'R-8766261', 1, 2, '---2', 'Completed', 2, '2018-12-10 06:16:23', '2018-12-10 06:16:23', NULL),
(87, 'R-1044351', 1, 1, '--', 'Completed', 2, '2018-12-10 14:19:24', '2018-12-10 14:19:24', NULL),
(89, 'R-5720329', 1, 2, '--', 'Completed', 2, '2018-12-10 14:21:17', '2018-12-10 14:21:17', NULL),
(90, 'R-9726245', 1, 2, '---', 'Completed', 2, '2018-12-10 14:21:48', '2018-12-10 14:21:48', NULL),
(116, 'R-6523633', 2, 1, '--', 'Completed', 2, '2018-12-11 13:44:39', '2018-12-11 13:44:39', NULL),
(117, 'R-9343969', 1, 2, '---2', 'Completed', 2, '2018-12-12 08:31:59', '2018-12-12 08:31:59', NULL),
(118, 'R-8803053', 2, 1, '---2', 'Completed', 2, '2018-12-12 08:33:54', '2018-12-12 08:33:54', NULL),
(119, 'R-5371367', 1, 1, '---', 'Completed', 2, '2018-12-12 08:34:39', '2018-12-12 08:34:39', NULL),
(120, 'R-3374043', 1, 2, '--', 'Completed', 2, '2018-12-12 08:35:17', '2018-12-12 08:35:17', NULL),
(121, 'R-5381458', 1, 1, '---', 'Completed', 2, '2018-12-12 08:35:53', '2018-12-12 08:35:53', NULL),
(122, 'R-5690654', 1, 1, '---', 'Completed', 2, '2018-12-12 08:36:37', '2018-12-12 08:36:37', NULL),
(123, 'R-6281877', 1, 2, '---', 'Completed', 2, '2018-12-12 08:37:45', '2018-12-12 08:37:45', NULL),
(124, 'R-3698700', 2, 1, '---', 'Completed', 2, '2018-12-12 08:38:35', '2018-12-12 08:38:35', NULL),
(125, 'R-1264673', 2, 1, '--', 'Completed', 2, '2018-12-12 08:39:12', '2018-12-12 08:39:12', NULL),
(126, 'R-1346728', 2, 1, '--', 'Completed', 2, '2018-12-12 08:41:38', '2018-12-12 08:41:38', NULL),
(127, 'R-9396010', 1, 2, '--', 'Completed', 2, '2018-12-12 08:42:09', '2018-12-12 08:42:09', NULL),
(128, 'R-427025', 1, 2, '---', 'Completed', 2, '2018-12-12 08:45:11', '2018-12-12 08:45:11', NULL),
(129, 'R-9306648', 2, 1, '--', 'Completed', 2, '2018-12-12 08:46:18', '2018-12-12 08:46:18', NULL),
(130, 'R-6772388', 1, 2, '---', 'Completed', 2, '2018-12-17 11:16:45', '2018-12-17 11:16:45', NULL),
(131, 'R-2359354', 1, 2, '---', 'Completed', 2, '2018-12-17 11:16:53', '2018-12-17 11:16:53', NULL),
(133, 'R-6101875', 1, 2, '---', 'Completed', 2, '2018-12-17 11:18:38', '2018-12-17 11:18:38', NULL),
(134, 'R-4689161', 1, 2, '---', 'Completed', 2, '2018-12-17 11:18:50', '2018-12-17 11:18:50', NULL),
(135, 'R-224475', 2, 1, '----', 'Completed', 2, '2018-12-17 11:21:58', '2018-12-17 11:21:58', NULL),
(136, 'R-4747935', 2, 1, '---', 'Completed', 2, '2018-12-17 11:23:12', '2018-12-17 11:23:12', NULL),
(137, 'R-4547040', 2, 1, '---', 'Completed', 2, '2018-12-17 11:25:57', '2018-12-17 11:25:57', NULL),
(138, 'R-7877407', 2, 1, '---', 'Completed', 2, '2018-12-17 11:28:54', '2018-12-17 11:28:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `inventory__movement_details`
--

CREATE TABLE `inventory__movement_details` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `qty` float NOT NULL,
  `expiry_date` date NOT NULL,
  `notes` varchar(250) NOT NULL,
  `movement_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inventory__movement_details`
--

INSERT INTO `inventory__movement_details` (`id`, `item_id`, `qty`, `expiry_date`, `notes`, `movement_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(82, 2, 5, '2018-12-10', '-', 116, '2018-12-11 13:44:39', '2018-12-11 13:44:39', NULL),
(83, 1, 5, '2018-12-10', '--', 116, '2018-12-11 13:44:39', '2018-12-11 13:44:39', NULL),
(84, 1, 15, '2018-12-10', '---', 117, '2018-12-12 08:31:59', '2018-12-12 08:31:59', NULL),
(85, 2, 20, '2018-12-10', '---2', 117, '2018-12-12 08:31:59', '2018-12-12 08:31:59', NULL),
(86, 1, 15, '2018-12-10', '---', 118, '2018-12-12 08:33:54', '2018-12-12 08:33:54', NULL),
(87, 2, 20, '2018-12-10', '---2', 118, '2018-12-12 08:33:54', '2018-12-12 08:33:54', NULL),
(88, 1, 15, '2018-12-10', '---', 122, '2018-12-12 08:36:38', '2018-12-12 08:36:38', NULL),
(89, 1, 15, '2018-12-10', '---', 123, '2018-12-12 08:37:45', '2018-12-12 08:37:45', NULL),
(90, 1, 15, '2018-12-10', '--', 125, '2018-12-12 08:39:12', '2018-12-12 08:39:12', NULL),
(91, 1, 15, '2018-12-10', '--', 126, '2018-12-12 08:41:38', '2018-12-12 08:41:38', NULL),
(92, 1, 30, '2018-12-10', '--', 127, '2018-12-12 08:42:09', '2018-12-12 08:42:09', NULL),
(93, 2, 20, '2018-12-10', '---', 128, '2018-12-12 08:45:11', '2018-12-12 08:45:11', NULL),
(94, 1, 30, '2018-12-10', '--', 129, '2018-12-12 08:46:18', '2018-12-12 08:46:18', NULL),
(95, 2, 20, '2018-12-10', '--', 129, '2018-12-12 08:46:18', '2018-12-12 08:46:18', NULL),
(96, 1, 10, '2018-12-18', '---', 137, '2018-12-17 11:25:57', '2018-12-17 11:25:57', NULL),
(97, 1, 10, '2018-12-23', '---', 138, '2018-12-17 11:28:54', '2018-12-17 11:28:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `inventory__orders`
--

CREATE TABLE `inventory__orders` (
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
-- Table structure for table `inventory__order_details`
--

CREATE TABLE `inventory__order_details` (
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
-- Table structure for table `inventory__transactions`
--

CREATE TABLE `inventory__transactions` (
  `id` int(11) NOT NULL,
  `no` varchar(20) NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `transaction_type` varchar(50) NOT NULL,
  `qty` float NOT NULL,
  `expiry_date` date NOT NULL,
  `description` varchar(500) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inventory__transactions`
--

INSERT INTO `inventory__transactions` (`id`, `no`, `warehouse_id`, `item_id`, `transaction_type`, `qty`, `expiry_date`, `description`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(234, 'R-1341084', 1, 1, 'Export', 5, '2018-12-12', 'Warehouse Stock Out/ hhh', 2, '2018-12-15 10:00:42', '2018-12-15 10:00:42', NULL),
(235, 'R-1341084', 1, 2, 'Import', 5, '2018-12-10', 'Warehouse Stock Out/ hhh2', 2, '2018-12-16 20:10:10', '2018-12-15 10:00:42', NULL),
(236, 'R-4353174', 1, 1, 'Import', 5, '2018-12-12', 'Warehouse Stock Out/ ----', 2, '2018-12-16 20:10:24', '2018-12-16 17:32:42', NULL),
(237, 'R-1004967', 1, 1, 'Import', 20, '2018-12-23', 'Warehouse Stock in', 2, '2018-12-16 17:33:12', '2018-12-16 17:33:12', NULL),
(238, 'R-7335379', 2, 1, 'Export', 20, '2018-12-18', 'Warehouse Stock in', 2, '2018-12-16 20:10:49', '2018-12-16 17:33:24', NULL),
(239, 'R-611139', 2, 2, 'Import', 20, '2018-12-03', 'Warehouse Stock in', 2, '2018-12-16 17:33:37', '2018-12-16 17:33:37', NULL),
(240, 'R-9480037', 2, 1, 'Export', 10, '2018-12-18', 'Warehouse transfer', 2, '2018-12-17 11:25:57', '2018-12-17 11:25:57', NULL),
(241, 'R-9480037', 1, 1, 'Import', 10, '2018-12-18', 'Warehouse transfer', 2, '2018-12-17 11:25:57', '2018-12-17 11:25:57', NULL),
(242, 'R-6761405', 2, 1, 'Export', 10, '2018-12-23', 'Warehouse transfer', 2, '2018-12-17 11:28:54', '2018-12-17 11:28:54', NULL),
(243, 'R-6761405', 1, 1, 'Import', 10, '2018-12-23', 'Warehouse transfer', 2, '2018-12-17 11:28:54', '2018-12-17 11:28:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `inventory__units`
--

CREATE TABLE `inventory__units` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inventory__units`
--

INSERT INTO `inventory__units` (`id`, `name`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'test', 'gdfgdfg', '2018-12-18 16:13:53', '2018-10-22 17:06:28', NULL),
(2, 'Pice', 'gdfgdfgdfg', '2018-12-18 16:13:50', '2018-10-22 17:12:57', NULL),
(3, 'carton', 'dsfgsdfgdsgdsgdsfg', '2018-12-18 16:13:47', '2018-10-22 17:19:35', NULL),
(4, 'package', 'fghfghfgh', '2018-12-18 16:13:45', '2018-10-22 17:29:29', NULL),
(5, 'LM', 'dgdgdfg', '2018-12-18 16:13:42', '2018-12-02 09:08:41', NULL),
(6, 'CM', 'ssss', '2018-12-18 16:13:40', '2018-12-02 09:11:04', NULL),
(7, 'KG', 'aaaaaaaaaaaaaaaaaaaaaaaaaa', '2018-12-18 16:13:37', '2018-12-02 12:08:00', NULL),
(8, 'SQM', 'sdfsadfsadf', '2018-12-17 15:08:54', '2018-12-02 12:08:29', NULL),
(9, 'gdfgdf', 'gdfgdfg', '2018-12-18 14:13:02', '2018-12-18 14:13:02', NULL),
(10, 'fsdfsdf', 'fsdfsdfdsf', '2018-12-18 14:14:10', '2018-12-18 14:14:10', NULL),
(11, 'aaa', 'dsfsdfsdf', '2018-12-18 14:14:17', '2018-12-18 14:14:17', NULL),
(12, 'xxxxxxxxxxxxxxxx', 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx', '2018-12-18 14:14:37', '2018-12-18 14:14:37', NULL),
(13, 'test', 'gdfgdfg', '2018-12-18 16:13:53', '2018-10-22 17:06:28', NULL),
(14, 'Pice', 'gdfgdfgdfg', '2018-12-18 16:13:50', '2018-10-22 17:12:57', NULL),
(15, 'carton', 'dsfgsdfgdsgdsgdsfg', '2018-12-18 16:13:47', '2018-10-22 17:19:35', NULL),
(16, 'package', 'fghfghfgh', '2018-12-18 16:13:45', '2018-10-22 17:29:29', NULL),
(17, 'LM', 'dgdgdfg', '2018-12-18 16:13:42', '2018-12-02 09:08:41', NULL),
(18, 'CM', 'ssss', '2018-12-18 16:13:40', '2018-12-02 09:11:04', NULL),
(19, 'KG', 'aaaaaaaaaaaaaaaaaaaaaaaaaa', '2018-12-18 16:13:37', '2018-12-02 12:08:00', NULL),
(20, 'SQM', 'sdfsadfsadf', '2018-12-17 15:08:54', '2018-12-02 12:08:29', NULL),
(21, 'gdfgdf', 'gdfgdfg', '2018-12-18 14:13:02', '2018-12-18 14:13:02', NULL),
(22, 'test', 'gdfgdfg', '2018-12-18 16:13:53', '2018-10-22 17:06:28', NULL),
(23, 'Pice', 'gdfgdfgdfg', '2018-12-18 16:13:50', '2018-10-22 17:12:57', NULL),
(24, 'carton', 'dsfgsdfgdsgdsgdsfg', '2018-12-18 16:13:47', '2018-10-22 17:19:35', NULL),
(25, 'package', 'fghfghfgh', '2018-12-18 16:13:45', '2018-10-22 17:29:29', NULL),
(26, 'LM', 'dgdgdfg', '2018-12-18 16:13:42', '2018-12-02 09:08:41', NULL),
(27, 'CM', 'ssss', '2018-12-18 16:13:40', '2018-12-02 09:11:04', NULL),
(28, 'KG', 'aaaaaaaaaaaaaaaaaaaaaaaaaa', '2018-12-18 16:13:37', '2018-12-02 12:08:00', NULL),
(29, 'SQM', 'sdfsadfsadf', '2018-12-17 15:08:54', '2018-12-02 12:08:29', NULL),
(30, 'gdfgdf', 'gdfgdfg', '2018-12-18 14:13:02', '2018-12-18 14:13:02', NULL),
(31, 'fsdfsdf', 'fsdfsdfdsf', '2018-12-18 14:14:10', '2018-12-18 14:14:10', NULL),
(32, 'aaa', 'dsfsdfsdf', '2018-12-18 14:14:17', '2018-12-18 14:14:17', NULL),
(33, 'xxxxxxxxxxxxxxxx', 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx', '2018-12-18 14:14:37', '2018-12-18 14:14:37', NULL),
(34, 'test', 'gdfgdfg', '2018-12-18 16:13:53', '2018-10-22 17:06:28', NULL),
(35, 'Pice', 'gdfgdfgdfg', '2018-12-18 16:13:50', '2018-10-22 17:12:57', NULL),
(36, 'carton', 'dsfgsdfgdsgdsgdsfg', '2018-12-18 16:13:47', '2018-10-22 17:19:35', NULL),
(37, 'package', 'fghfghfgh', '2018-12-18 16:13:45', '2018-10-22 17:29:29', NULL),
(38, 'LM', 'dgdgdfg', '2018-12-18 16:13:42', '2018-12-02 09:08:41', NULL),
(39, 'CM', 'ssss', '2018-12-18 16:13:40', '2018-12-02 09:11:04', NULL),
(40, 'KG', 'aaaaaaaaaaaaaaaaaaaaaaaaaa', '2018-12-18 16:13:37', '2018-12-02 12:08:00', NULL),
(41, 'SQM', 'sdfsadfsadf', '2018-12-17 15:08:54', '2018-12-02 12:08:29', NULL),
(42, 'gdfgdf', 'gdfgdfg', '2018-12-18 14:13:02', '2018-12-18 14:13:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `inventory__warehouses`
--

CREATE TABLE `inventory__warehouses` (
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

--
-- Dumping data for table `inventory__warehouses`
--

INSERT INTO `inventory__warehouses` (`id`, `name`, `keeper`, `location`, `phone`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Main', '--', 'Kartoum bahary ', '01838383', '-', '2018-12-06 13:22:05', NULL, NULL),
(2, 'Second ', '-', 'oumdurman', '018354545', '-', '2018-12-06 13:22:24', NULL, NULL);

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
-- Table structure for table `project__attachments`
--

CREATE TABLE `project__attachments` (
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
-- Table structure for table `project__orders`
--

CREATE TABLE `project__orders` (
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
-- Table structure for table `project__order_details`
--

CREATE TABLE `project__order_details` (
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
-- Table structure for table `project__projects`
--

CREATE TABLE `project__projects` (
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
-- Table structure for table `project__visits`
--

CREATE TABLE `project__visits` (
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
-- Table structure for table `project__visit_schedulars`
--

CREATE TABLE `project__visit_schedulars` (
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
-- Table structure for table `project__work_groups`
--

CREATE TABLE `project__work_groups` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `project__work_group_members`
--

CREATE TABLE `project__work_group_members` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `work_group_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `purchase__purchases`
--

CREATE TABLE `purchase__purchases` (
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
-- Table structure for table `purchase__purchase_details`
--

CREATE TABLE `purchase__purchase_details` (
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
-- Table structure for table `purchase__suppliers`
--

CREATE TABLE `purchase__suppliers` (
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
-- Table structure for table `sales__customers`
--

CREATE TABLE `sales__customers` (
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
-- Table structure for table `sales__qoutations`
--

CREATE TABLE `sales__qoutations` (
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
-- Table structure for table `sales__qoutation_details`
--

CREATE TABLE `sales__qoutation_details` (
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
-- Table structure for table `sales__sales`
--

CREATE TABLE `sales__sales` (
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
-- Table structure for table `sales__sales_details`
--

CREATE TABLE `sales__sales_details` (
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounting__accounts`
--
ALTER TABLE `accounting__accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `accounting__transactions`
--
ALTER TABLE `accounting__transactions`
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
-- Indexes for table `hr__attendances`
--
ALTER TABLE `hr__attendances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `deduction_id` (`deduction_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `hr__bonuses`
--
ALTER TABLE `hr__bonuses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`),
  ADD KEY `salary_item_id` (`salary_item_id`);

--
-- Indexes for table `hr__certifications`
--
ALTER TABLE `hr__certifications`
  ADD KEY `employee_id` (`employee_id`),
  ADD KEY `cretification_id` (`cretification_id`);

--
-- Indexes for table `hr__certification_configs`
--
ALTER TABLE `hr__certification_configs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hr__contracts`
--
ALTER TABLE `hr__contracts`
  ADD KEY `id` (`id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `hr__courses`
--
ALTER TABLE `hr__courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hr__courses_details`
--
ALTER TABLE `hr__courses_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `hr__deductions`
--
ALTER TABLE `hr__deductions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `hr__departments`
--
ALTER TABLE `hr__departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hr__documents`
--
ALTER TABLE `hr__documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `hr__employees`
--
ALTER TABLE `hr__employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `identity_id` (`identity_id`),
  ADD KEY `job_id` (`job_id`),
  ADD KEY `account_id` (`account_id`);

--
-- Indexes for table `hr__employee_exits`
--
ALTER TABLE `hr__employee_exits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `hr__employee_leaves`
--
ALTER TABLE `hr__employee_leaves`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vaction_id` (`vaction_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `hr__familys`
--
ALTER TABLE `hr__familys`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `hr__holydays`
--
ALTER TABLE `hr__holydays`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `hr__identity_types`
--
ALTER TABLE `hr__identity_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hr__insurances`
--
ALTER TABLE `hr__insurances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `hr__jobs`
--
ALTER TABLE `hr__jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `departmentID` (`departmentID`);

--
-- Indexes for table `hr__loans`
--
ALTER TABLE `hr__loans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `hr__loans_payments`
--
ALTER TABLE `hr__loans_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loan_id` (`loan_id`);

--
-- Indexes for table `hr__nationalities`
--
ALTER TABLE `hr__nationalities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hr__payrolls`
--
ALTER TABLE `hr__payrolls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`),
  ADD KEY `salary_item_id` (`salary_item_id`);

--
-- Indexes for table `hr__resignations`
--
ALTER TABLE `hr__resignations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `hr__salary_items`
--
ALTER TABLE `hr__salary_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hr__salary_profiles`
--
ALTER TABLE `hr__salary_profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `salary_item_id` (`salary_item_id`),
  ADD KEY `job_id` (`job_id`);

--
-- Indexes for table `hr__terminations`
--
ALTER TABLE `hr__terminations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `hr__trainings`
--
ALTER TABLE `hr__trainings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `department_id` (`department_id`);

--
-- Indexes for table `hr__training_members`
--
ALTER TABLE `hr__training_members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `training_id` (`training_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `hr__vacations`
--
ALTER TABLE `hr__vacations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `hr__warnings`
--
ALTER TABLE `hr__warnings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `inventory__categories`
--
ALTER TABLE `inventory__categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory__details`
--
ALTER TABLE `inventory__details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `warehouse_id` (`warehouse_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `inventory__items`
--
ALTER TABLE `inventory__items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `unit_id` (`unit_id`),
  ADD KEY `category_id_2` (`category_id`);

--
-- Indexes for table `inventory__movements`
--
ALTER TABLE `inventory__movements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `from_warehouse_id` (`from_warehouse_id`),
  ADD KEY `to_warehouse_id` (`to_warehouse_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `inventory__movement_details`
--
ALTER TABLE `inventory__movement_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `movement_id` (`movement_id`);

--
-- Indexes for table `inventory__orders`
--
ALTER TABLE `inventory__orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `warehouse_id` (`warehouse_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `inventory__order_details`
--
ALTER TABLE `inventory__order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `id` (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `inventory__transactions`
--
ALTER TABLE `inventory__transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `warehouse_id` (`warehouse_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `inventory__units`
--
ALTER TABLE `inventory__units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory__warehouses`
--
ALTER TABLE `inventory__warehouses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `models`
--
ALTER TABLE `models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `privileges`
--
ALTER TABLE `privileges`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role` (`role`),
  ADD KEY `action` (`action`),
  ADD KEY `model` (`model`);

--
-- Indexes for table `project__attachments`
--
ALTER TABLE `project__attachments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `project__orders`
--
ALTER TABLE `project__orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `project__order_details`
--
ALTER TABLE `project__order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `project__projects`
--
ALTER TABLE `project__projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `work_group_id` (`work_group_id`),
  ADD KEY `employee_id` (`employee_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `project__visits`
--
ALTER TABLE `project__visits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `project__visit_schedulars`
--
ALTER TABLE `project__visit_schedulars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `project__work_groups`
--
ALTER TABLE `project__work_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project__work_group_members`
--
ALTER TABLE `project__work_group_members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`),
  ADD KEY `work_group_id` (`work_group_id`);

--
-- Indexes for table `purchase__purchases`
--
ALTER TABLE `purchase__purchases`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `warehouse_id` (`warehouse_id`),
  ADD KEY `supplier_id` (`supplier_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `purchase__purchase_details`
--
ALTER TABLE `purchase__purchase_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `purchase_id` (`purchase_id`),
  ADD KEY `purchase_id_2` (`purchase_id`);

--
-- Indexes for table `purchase__suppliers`
--
ALTER TABLE `purchase__suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales__customers`
--
ALTER TABLE `sales__customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales__qoutations`
--
ALTER TABLE `sales__qoutations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `sales__qoutation_details`
--
ALTER TABLE `sales__qoutation_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `qoutation_id` (`qoutation_id`);

--
-- Indexes for table `sales__sales`
--
ALTER TABLE `sales__sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `warehouse_id` (`warehouse_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `sales__sales_details`
--
ALTER TABLE `sales__sales_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `sales_id` (`sales_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role` (`role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounting__accounts`
--
ALTER TABLE `accounting__accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `accounting__transactions`
--
ALTER TABLE `accounting__transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `actions`
--
ALTER TABLE `actions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `hr__attendances`
--
ALTER TABLE `hr__attendances`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hr__bonuses`
--
ALTER TABLE `hr__bonuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hr__certification_configs`
--
ALTER TABLE `hr__certification_configs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hr__contracts`
--
ALTER TABLE `hr__contracts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hr__courses`
--
ALTER TABLE `hr__courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `hr__courses_details`
--
ALTER TABLE `hr__courses_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hr__deductions`
--
ALTER TABLE `hr__deductions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hr__departments`
--
ALTER TABLE `hr__departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `hr__documents`
--
ALTER TABLE `hr__documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hr__employees`
--
ALTER TABLE `hr__employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hr__employee_exits`
--
ALTER TABLE `hr__employee_exits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hr__employee_leaves`
--
ALTER TABLE `hr__employee_leaves`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hr__familys`
--
ALTER TABLE `hr__familys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hr__holydays`
--
ALTER TABLE `hr__holydays`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hr__identity_types`
--
ALTER TABLE `hr__identity_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hr__insurances`
--
ALTER TABLE `hr__insurances`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hr__jobs`
--
ALTER TABLE `hr__jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `hr__loans`
--
ALTER TABLE `hr__loans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hr__loans_payments`
--
ALTER TABLE `hr__loans_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hr__nationalities`
--
ALTER TABLE `hr__nationalities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hr__payrolls`
--
ALTER TABLE `hr__payrolls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hr__resignations`
--
ALTER TABLE `hr__resignations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hr__salary_items`
--
ALTER TABLE `hr__salary_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hr__salary_profiles`
--
ALTER TABLE `hr__salary_profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hr__terminations`
--
ALTER TABLE `hr__terminations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hr__trainings`
--
ALTER TABLE `hr__trainings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hr__training_members`
--
ALTER TABLE `hr__training_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hr__vacations`
--
ALTER TABLE `hr__vacations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hr__warnings`
--
ALTER TABLE `hr__warnings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `inventory__categories`
--
ALTER TABLE `inventory__categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `inventory__details`
--
ALTER TABLE `inventory__details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
--
-- AUTO_INCREMENT for table `inventory__items`
--
ALTER TABLE `inventory__items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `inventory__movements`
--
ALTER TABLE `inventory__movements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;
--
-- AUTO_INCREMENT for table `inventory__movement_details`
--
ALTER TABLE `inventory__movement_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;
--
-- AUTO_INCREMENT for table `inventory__orders`
--
ALTER TABLE `inventory__orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `inventory__order_details`
--
ALTER TABLE `inventory__order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `inventory__transactions`
--
ALTER TABLE `inventory__transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=244;
--
-- AUTO_INCREMENT for table `inventory__units`
--
ALTER TABLE `inventory__units`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `inventory__warehouses`
--
ALTER TABLE `inventory__warehouses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `models`
--
ALTER TABLE `models`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `privileges`
--
ALTER TABLE `privileges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=362;
--
-- AUTO_INCREMENT for table `project__attachments`
--
ALTER TABLE `project__attachments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `project__orders`
--
ALTER TABLE `project__orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `project__order_details`
--
ALTER TABLE `project__order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `project__projects`
--
ALTER TABLE `project__projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `project__visits`
--
ALTER TABLE `project__visits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `project__visit_schedulars`
--
ALTER TABLE `project__visit_schedulars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `project__work_groups`
--
ALTER TABLE `project__work_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `project__work_group_members`
--
ALTER TABLE `project__work_group_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `purchase__purchases`
--
ALTER TABLE `purchase__purchases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `purchase__purchase_details`
--
ALTER TABLE `purchase__purchase_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `purchase__suppliers`
--
ALTER TABLE `purchase__suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sales__customers`
--
ALTER TABLE `sales__customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sales__qoutations`
--
ALTER TABLE `sales__qoutations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sales__qoutation_details`
--
ALTER TABLE `sales__qoutation_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sales__sales`
--
ALTER TABLE `sales__sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sales__sales_details`
--
ALTER TABLE `sales__sales_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `accounting__transactions`
--
ALTER TABLE `accounting__transactions`
  ADD CONSTRAINT `accounting__transactions_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `accounting__accounts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `accounting__transactions_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `actions`
--
ALTER TABLE `actions`
  ADD CONSTRAINT `actions_ibfk_1` FOREIGN KEY (`model`) REFERENCES `models` (`id`);

--
-- Constraints for table `hr__attendances`
--
ALTER TABLE `hr__attendances`
  ADD CONSTRAINT `hr__attendances_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `hr__employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hr__attendances_ibfk_2` FOREIGN KEY (`deduction_id`) REFERENCES `hr__deductions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hr__bonuses`
--
ALTER TABLE `hr__bonuses`
  ADD CONSTRAINT `hr__bonuses_ibfk_1` FOREIGN KEY (`salary_item_id`) REFERENCES `hr__salary_items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hr__bonuses_ibfk_2` FOREIGN KEY (`employee_id`) REFERENCES `hr__employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hr__certifications`
--
ALTER TABLE `hr__certifications`
  ADD CONSTRAINT `hr__certifications_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `hr__employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hr__certifications_ibfk_2` FOREIGN KEY (`cretification_id`) REFERENCES `hr__certification_configs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hr__contracts`
--
ALTER TABLE `hr__contracts`
  ADD CONSTRAINT `hr__contracts_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `hr__employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hr__courses_details`
--
ALTER TABLE `hr__courses_details`
  ADD CONSTRAINT `hr__courses_details_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `hr__courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hr__courses_details_ibfk_2` FOREIGN KEY (`employee_id`) REFERENCES `hr__employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hr__deductions`
--
ALTER TABLE `hr__deductions`
  ADD CONSTRAINT `hr__deductions_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `hr__employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hr__documents`
--
ALTER TABLE `hr__documents`
  ADD CONSTRAINT `hr__documents_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `hr__employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hr__employees`
--
ALTER TABLE `hr__employees`
  ADD CONSTRAINT `hr__employees_ibfk_1` FOREIGN KEY (`identity_id`) REFERENCES `hr__identity_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hr__employees_ibfk_2` FOREIGN KEY (`job_id`) REFERENCES `hr__jobs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hr__employees_ibfk_3` FOREIGN KEY (`account_id`) REFERENCES `accounting__accounts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hr__employee_exits`
--
ALTER TABLE `hr__employee_exits`
  ADD CONSTRAINT `hr__employee_exits_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `hr__employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hr__employee_leaves`
--
ALTER TABLE `hr__employee_leaves`
  ADD CONSTRAINT `hr__employee_leaves_ibfk_1` FOREIGN KEY (`vaction_id`) REFERENCES `hr__vacations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hr__employee_leaves_ibfk_2` FOREIGN KEY (`employee_id`) REFERENCES `hr__employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hr__familys`
--
ALTER TABLE `hr__familys`
  ADD CONSTRAINT `hr__familys_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `hr__employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hr__holydays`
--
ALTER TABLE `hr__holydays`
  ADD CONSTRAINT `hr__holydays_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `hr__employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hr__insurances`
--
ALTER TABLE `hr__insurances`
  ADD CONSTRAINT `hr__insurances_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `hr__employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hr__jobs`
--
ALTER TABLE `hr__jobs`
  ADD CONSTRAINT `hr__jobs_ibfk_1` FOREIGN KEY (`departmentID`) REFERENCES `hr__departments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hr__loans`
--
ALTER TABLE `hr__loans`
  ADD CONSTRAINT `hr__loans_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `hr__employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hr__loans_payments`
--
ALTER TABLE `hr__loans_payments`
  ADD CONSTRAINT `hr__loans_payments_ibfk_1` FOREIGN KEY (`loan_id`) REFERENCES `hr__loans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hr__payrolls`
--
ALTER TABLE `hr__payrolls`
  ADD CONSTRAINT `hr__payrolls_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `hr__employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hr__payrolls_ibfk_2` FOREIGN KEY (`salary_item_id`) REFERENCES `hr__salary_items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hr__resignations`
--
ALTER TABLE `hr__resignations`
  ADD CONSTRAINT `hr__resignations_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `hr__employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hr__salary_profiles`
--
ALTER TABLE `hr__salary_profiles`
  ADD CONSTRAINT `hr__salary_profiles_ibfk_1` FOREIGN KEY (`salary_item_id`) REFERENCES `hr__salary_items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hr__salary_profiles_ibfk_2` FOREIGN KEY (`job_id`) REFERENCES `hr__jobs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hr__terminations`
--
ALTER TABLE `hr__terminations`
  ADD CONSTRAINT `hr__terminations_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `hr__employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hr__trainings`
--
ALTER TABLE `hr__trainings`
  ADD CONSTRAINT `hr__trainings_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `hr__departments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hr__training_members`
--
ALTER TABLE `hr__training_members`
  ADD CONSTRAINT `hr__training_members_ibfk_1` FOREIGN KEY (`training_id`) REFERENCES `hr__trainings` (`id`),
  ADD CONSTRAINT `hr__training_members_ibfk_2` FOREIGN KEY (`employee_id`) REFERENCES `hr__employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hr__vacations`
--
ALTER TABLE `hr__vacations`
  ADD CONSTRAINT `hr__vacations_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `hr__employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hr__warnings`
--
ALTER TABLE `hr__warnings`
  ADD CONSTRAINT `hr__warnings_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `hr__employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inventory__details`
--
ALTER TABLE `inventory__details`
  ADD CONSTRAINT `inventory__details_ibfk_1` FOREIGN KEY (`warehouse_id`) REFERENCES `inventory__warehouses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inventory__details_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `inventory__items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inventory__items`
--
ALTER TABLE `inventory__items`
  ADD CONSTRAINT `inventory__items_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `inventory__categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inventory__items_ibfk_2` FOREIGN KEY (`unit_id`) REFERENCES `inventory__units` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inventory__movements`
--
ALTER TABLE `inventory__movements`
  ADD CONSTRAINT `inventory__movements_ibfk_1` FOREIGN KEY (`from_warehouse_id`) REFERENCES `inventory__warehouses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inventory__movements_ibfk_2` FOREIGN KEY (`to_warehouse_id`) REFERENCES `inventory__warehouses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inventory__movements_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inventory__movement_details`
--
ALTER TABLE `inventory__movement_details`
  ADD CONSTRAINT `inventory__movement_details_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `inventory__items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inventory__movement_details_ibfk_2` FOREIGN KEY (`movement_id`) REFERENCES `inventory__movements` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inventory__orders`
--
ALTER TABLE `inventory__orders`
  ADD CONSTRAINT `inventory__orders_ibfk_1` FOREIGN KEY (`warehouse_id`) REFERENCES `inventory__warehouses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inventory__orders_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inventory__order_details`
--
ALTER TABLE `inventory__order_details`
  ADD CONSTRAINT `inventory__order_details_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `inventory__items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inventory__order_details_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `inventory__orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inventory__transactions`
--
ALTER TABLE `inventory__transactions`
  ADD CONSTRAINT `inventory__transactions_ibfk_1` FOREIGN KEY (`warehouse_id`) REFERENCES `inventory__warehouses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inventory__transactions_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `inventory__items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inventory__transactions_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `privileges`
--
ALTER TABLE `privileges`
  ADD CONSTRAINT `privileges_ibfk_1` FOREIGN KEY (`model`) REFERENCES `models` (`id`),
  ADD CONSTRAINT `privileges_ibfk_2` FOREIGN KEY (`action`) REFERENCES `actions` (`id`),
  ADD CONSTRAINT `privileges_ibfk_3` FOREIGN KEY (`role`) REFERENCES `roles` (`id`);

--
-- Constraints for table `project__attachments`
--
ALTER TABLE `project__attachments`
  ADD CONSTRAINT `project__attachments_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `project__attachments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `project__orders`
--
ALTER TABLE `project__orders`
  ADD CONSTRAINT `project__orders_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `project__projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `project__orders_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `project__order_details`
--
ALTER TABLE `project__order_details`
  ADD CONSTRAINT `project__order_details_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `inventory__items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `project__order_details_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `inventory__orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `project__projects`
--
ALTER TABLE `project__projects`
  ADD CONSTRAINT `project__projects_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `hr__employees` (`id`),
  ADD CONSTRAINT `project__projects_ibfk_2` FOREIGN KEY (`work_group_id`) REFERENCES `project__work_groups` (`id`),
  ADD CONSTRAINT `project__projects_ibfk_3` FOREIGN KEY (`customer_id`) REFERENCES `sales__customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `project__visits`
--
ALTER TABLE `project__visits`
  ADD CONSTRAINT `project__visits_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `project__projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `project__visit_schedulars`
--
ALTER TABLE `project__visit_schedulars`
  ADD CONSTRAINT `project__visit_schedulars_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `project__projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `project__visit_schedulars_ibfk_2` FOREIGN KEY (`employee_id`) REFERENCES `hr__employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `project__work_group_members`
--
ALTER TABLE `project__work_group_members`
  ADD CONSTRAINT `project__work_group_members_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `hr__employees` (`id`),
  ADD CONSTRAINT `project__work_group_members_ibfk_2` FOREIGN KEY (`work_group_id`) REFERENCES `project__work_groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `purchase__purchases`
--
ALTER TABLE `purchase__purchases`
  ADD CONSTRAINT `purchase__purchases_ibfk_1` FOREIGN KEY (`warehouse_id`) REFERENCES `inventory__warehouses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `purchase__purchases_ibfk_2` FOREIGN KEY (`supplier_id`) REFERENCES `purchase__suppliers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `purchase__purchases_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `purchase__purchase_details`
--
ALTER TABLE `purchase__purchase_details`
  ADD CONSTRAINT `purchase__purchase_details_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `inventory__items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `purchase__purchase_details_ibfk_2` FOREIGN KEY (`purchase_id`) REFERENCES `purchase__purchases` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sales__qoutations`
--
ALTER TABLE `sales__qoutations`
  ADD CONSTRAINT `sales__qoutations_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sales__qoutation_details`
--
ALTER TABLE `sales__qoutation_details`
  ADD CONSTRAINT `sales__qoutation_details_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `inventory__items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sales__qoutation_details_ibfk_2` FOREIGN KEY (`qoutation_id`) REFERENCES `sales__qoutations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sales__sales`
--
ALTER TABLE `sales__sales`
  ADD CONSTRAINT `sales__sales_ibfk_1` FOREIGN KEY (`warehouse_id`) REFERENCES `inventory__warehouses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sales__sales_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `sales__customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sales__sales_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sales__sales_details`
--
ALTER TABLE `sales__sales_details`
  ADD CONSTRAINT `sales__sales_details_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `inventory__items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sales__sales_details_ibfk_2` FOREIGN KEY (`sales_id`) REFERENCES `sales__sales` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role`) REFERENCES `roles` (`id`);

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`phpmyadmin`@`localhost` EVENT `Clean_0qty_stockdetails` ON SCHEDULE EVERY '0 1' DAY_HOUR STARTS '2018-12-11 17:54:54' ON COMPLETION NOT PRESERVE ENABLE COMMENT 'Clean up log connections at 1 AM.' DO DELETE FROM inventory__details
    WHERE qty=0$$

DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;