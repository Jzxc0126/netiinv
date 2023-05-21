-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2023 at 03:09 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `netiinv`
--

-- --------------------------------------------------------

--
-- Table structure for table `assetstatus_tbl`
--

CREATE TABLE `assetstatus_tbl` (
  `assetstatusid` int(11) NOT NULL,
  `assetstatus` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assetstatus_tbl`
--

INSERT INTO `assetstatus_tbl` (`assetstatusid`, `assetstatus`) VALUES
(1, 'Active'),
(2, 'Disposed'),
(3, 'For Repair'),
(4, 'Missing'),
(5, 'Reserved'),
(6, 'Stolen'),
(7, 'Expired'),
(8, 'Defective'),
(9, 'Decommissioned'),
(10, 'NA');

-- --------------------------------------------------------

--
-- Table structure for table `assetusage_tbl`
--

CREATE TABLE `assetusage_tbl` (
  `assetusageid` int(11) NOT NULL,
  `assetusage` varchar(250) NOT NULL,
  `departmentid` int(11) NOT NULL,
  `usage_deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assetusage_tbl`
--

INSERT INTO `assetusage_tbl` (`assetusageid`, `assetusage`, `departmentid`, `usage_deleted`) VALUES
(1, 'NONE', 1, 1),
(2, 'OFFICE WORK', 1, 1),
(3, 'TRAINING LAPTOP', 1, 0),
(4, 'EVENTS', 1, 1),
(5, 'TRAINING', 1, 1),
(6, 'SIGNAGE', 1, 1),
(7, 'COMMUNICATION', 1, 1),
(8, 'DORM USE', 1, 1),
(9, 'SAFETY', 1, 1),
(10, 'EVENTS', 1, 1),
(11, 'SECURITY', 1, 1),
(12, 'MONITORING', 1, 1),
(13, 'NETWORK SYSTEM', 1, 1),
(14, 'DATA CENTER', 1, 1),
(15, 'WIFI NETWORK SYSTEM', 1, 1),
(16, 'NETWORK SECURITY', 1, 1),
(17, 'FOR EVENT COVERAGE', 1, 1),
(18, 'FOR PHOTO TAKING', 1, 1),
(19, 'FOR PRESENTATION', 1, 1),
(20, 'FOR CONFERENCE MEETING', 1, 1),
(25, 'Training', 1, 1),
(26, 'NONE', 2, 1),
(27, 'Laundry User', 3, 1),
(28, 'MODULE DEVELOPER', 1, 1),
(29, 'COOKING', 2, 1),
(35, 'Office Supplies', 2, 1),
(37, 'Office Work', 2, 1),
(38, 'Training', 3, 1),
(39, 'NONE', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category_tbl`
--

CREATE TABLE `category_tbl` (
  `categoryid` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `departmentid` int(11) NOT NULL,
  `cat_deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_tbl`
--

INSERT INTO `category_tbl` (`categoryid`, `category`, `departmentid`, `cat_deleted`) VALUES
(1, 'Laptop', 1, 1),
(2, 'Galley Laptop', 2, 1),
(3, 'Desktop', 1, 1),
(4, 'Server PC', 1, 1),
(5, 'Monitor', 1, 1),
(6, 'IP Phone', 1, 1),
(7, 'Power Supply', 1, 1),
(8, 'Projector', 1, 1),
(9, 'Surveillance Camera', 1, 1),
(10, 'CCTV Recorder', 1, 1),
(11, 'Network Switch', 1, 1),
(12, 'Printer', 1, 1),
(13, 'Cooking Appliances', 2, 1),
(14, 'Washing Machine', 3, 1),
(15, 'Fish', 2, 1),
(16, 'Pork Meat', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `consumabletype_tbl`
--

CREATE TABLE `consumabletype_tbl` (
  `consumabletypeid` int(11) NOT NULL,
  `consumable` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consumabletype_tbl`
--

INSERT INTO `consumabletype_tbl` (`consumabletypeid`, `consumable`) VALUES
(1, 'Fixed Asset'),
(2, 'Consumables');

-- --------------------------------------------------------

--
-- Table structure for table `consumable_tbl`
--

CREATE TABLE `consumable_tbl` (
  `consumableid` int(11) NOT NULL,
  `categoryid` int(11) NOT NULL,
  `consumablename` varchar(250) NOT NULL,
  `pieces` int(11) NOT NULL,
  `unitid` int(11) NOT NULL,
  `datepurchased` varchar(250) NOT NULL,
  `expdate` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consumable_tbl`
--

INSERT INTO `consumable_tbl` (`consumableid`, `categoryid`, `consumablename`, `pieces`, `unitid`, `datepurchased`, `expdate`) VALUES
(1, 15, 'Bangus', 10, 7, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `department_tbl`
--

CREATE TABLE `department_tbl` (
  `departmentid` int(11) NOT NULL,
  `department` varchar(255) NOT NULL,
  `dept_deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department_tbl`
--

INSERT INTO `department_tbl` (`departmentid`, `department`, `dept_deleted`) VALUES
(1, 'Network Operation Center', 1),
(2, 'Galley Department', 1),
(3, 'Dormitory Department', 1),
(4, 'Engine Department', 1);

-- --------------------------------------------------------

--
-- Table structure for table `files_tbl`
--

CREATE TABLE `files_tbl` (
  `fileid` int(11) NOT NULL,
  `itemid` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `file_owner` varchar(250) NOT NULL,
  `file_deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `files_tbl`
--

INSERT INTO `files_tbl` (`fileid`, `itemid`, `filename`, `file_owner`, `file_deleted`) VALUES
(6, 35, 'SAMPLE for Laptop.pdf', '', 1),
(7, 35, 'kasunduan sa Laptop.pdf', '', 1),
(9, 34, 'Team 2.jpg', 'Jay Cris', 1);

-- --------------------------------------------------------

--
-- Table structure for table `inventory_tbl`
--

CREATE TABLE `inventory_tbl` (
  `itemid` int(11) NOT NULL,
  `itemcode` varchar(250) NOT NULL,
  `itemname` varchar(250) NOT NULL,
  `brand` varchar(250) NOT NULL,
  `serialnumber` varchar(250) NOT NULL,
  `macaddress` varchar(11) NOT NULL,
  `departmentid` int(11) NOT NULL,
  `categoryid` int(11) NOT NULL,
  `supplierid` int(11) NOT NULL,
  `locationid` int(11) DEFAULT NULL,
  `assetusageid` int(11) NOT NULL,
  `consumabletypeid` int(11) NOT NULL,
  `assetstatusid` int(11) NOT NULL,
  `unitid` int(11) NOT NULL,
  `piece` varchar(250) NOT NULL,
  `daysremaining` int(11) NOT NULL,
  `datepurchased` varchar(250) NOT NULL,
  `dateissued` varchar(250) NOT NULL,
  `fileid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventory_tbl`
--

INSERT INTO `inventory_tbl` (`itemid`, `itemcode`, `itemname`, `brand`, `serialnumber`, `macaddress`, `departmentid`, `categoryid`, `supplierid`, `locationid`, `assetusageid`, `consumabletypeid`, `assetstatusid`, `unitid`, `piece`, `daysremaining`, `datepurchased`, `dateissued`, `fileid`) VALUES
(1, 'LTOP-NTTC-001', 'Sample_X1 carbon G3', 'Lenovo', 'R9-Y0C33', '', 1, 1, 1, 4, 1, 1, 1, 1, '1', 365, '2015 SEPTEMBER 23', '2015-09-23', NULL),
(2, 'LTOP-NTTC-143', 'Sample_Thinbook 15 Gen 2', ' Hewlett-Packard', '', '', 1, 1, 2, 4, 1, 1, 1, 1, '1', 365, '', '', NULL),
(3, 'CBNT-FDC-001', 'Bangus', 'NA', '', '', 2, 15, 5, 2, 29, 1, 1, 1, '1', 0, '', '', NULL),
(4, 'LTOP-NTTC-002', 'Probook 440s', ' Hewlett-Packard', '', '', 1, 1, 3, 4, 2, 1, 1, 1, '2', 0, '2023-04-24', '', NULL),
(5, 'LTOP-NTTC-003', 'Probook 440s', ' Hewlett-Packard', '', '', 1, 1, 3, 4, 2, 1, 1, 1, '2', 0, '2023-04-24', '', NULL),
(6, 'LTOP-NTTC-004', 'Probook 440s', ' Hewlett-Packard', '', '', 1, 1, 3, 4, 3, 1, 1, 1, '6', 0, '2023-04-04', '', NULL),
(7, 'LTOP-NTTC-005', 'Probook 440s', ' Hewlett-Packard', '', '', 1, 1, 3, 4, 3, 1, 1, 1, '6', 0, '2023-04-04', '', NULL),
(8, 'LTOP-NTTC-006', 'Probook 440s', ' Hewlett-Packard', '', '', 1, 1, 3, 4, 3, 1, 1, 1, '6', 0, '2023-04-04', '', NULL),
(9, 'LTOP-NTTC-007', 'Probook 440s', ' Hewlett-Packard', '', '', 1, 1, 3, 4, 3, 1, 1, 1, '6', 0, '2023-04-04', '', NULL),
(10, 'LTOP-NTTC-008', 'Probook 440s', ' Hewlett-Packard', '', '', 1, 1, 3, 4, 3, 1, 1, 1, '6', 0, '2023-04-04', '', NULL),
(11, 'LTOP-NTTC-009', 'Probook 440s', ' Hewlett-Packard', '', '', 1, 1, 3, 4, 3, 1, 1, 1, '6', 0, '2023-04-04', '', NULL),
(12, 'LTOP-NTTC-010', 'Probook 440s', ' Hewlett-Packard', '', '', 1, 1, 3, 4, 2, 1, 1, 1, '6', 0, '2023-04-04', '', NULL),
(13, 'LTOP-NTTC-011', 'Probook 440s', ' Hewlett-Packard', '', '', 1, 1, 3, 4, 2, 1, 1, 1, '6', 0, '2023-04-04', '', NULL),
(14, 'LTOP-NTTC-012', 'Probook 440s', ' Hewlett-Packard', '', '', 1, 1, 3, 4, 2, 1, 1, 1, '6', 0, '2023-04-04', '', NULL),
(15, 'LTOP-NTTC-013', 'Probook 440s', ' Hewlett-Packard', '', '', 1, 1, 3, 4, 2, 1, 1, 1, '6', 0, '2023-04-04', '', NULL),
(16, 'LTOP-NTTC-014', 'Probook 440s', ' Hewlett-Packard', '', '', 1, 1, 3, 4, 2, 1, 1, 1, '6', 0, '2023-04-04', '', NULL),
(17, 'LTOP-NTTC-015', 'Probook 440s', ' Hewlett-Packard', '', '', 1, 1, 3, 4, 2, 1, 1, 1, '6', 0, '2023-04-04', '', NULL),
(18, 'LTOP-NTTC-016', 'Carbon G5', 'Lenovo', '', '', 1, 1, 4, 4, 3, 1, 1, 1, '2', 0, '2023-05-06', '', NULL),
(19, 'LTOP-NTTC-017', 'Carbon G5', 'Lenovo', '', '', 1, 1, 4, 4, 3, 1, 1, 1, '2', 0, '2023-05-06', '', NULL),
(20, 'LTOP-NTTC-018', 'Carbon G7', 'Lenovo', '', '', 1, 1, 1, 4, 2, 1, 1, 1, '2', 0, '2023-05-29', '', NULL),
(21, 'LTOP-NTTC-019', 'Carbon G7', 'Lenovo', '', '', 1, 1, 1, 4, 2, 1, 1, 1, '2', 0, '2023-05-29', '', NULL),
(22, 'LTOP-NTTC-020', 'Carbon G8', 'Lenovo', '', '', 1, 1, 3, 4, 5, 1, 1, 1, '2', 0, '2023-04-30', '', NULL),
(23, 'LTOP-NTTC-021', 'Carbon G8', 'Lenovo', '', '', 1, 1, 3, 4, 5, 1, 1, 1, '2', 0, '2023-04-30', '', NULL),
(24, 'LTOP-NTTC-022', 'Carbon G8', 'Lenovo', '', '', 1, 1, 1, 4, 2, 1, 1, 1, '2', 0, '2023-05-06', '', NULL),
(25, 'LTOP-NTTC-023', 'Carbon G8', 'Lenovo', '', '', 1, 1, 1, 4, 2, 1, 1, 1, '2', 0, '2023-05-06', '', NULL),
(26, 'LTOP-NTTC-024', 'Carbon G9', 'Lenovo', '', '', 1, 1, 4, 4, 2, 1, 1, 1, '3', 0, '2023-05-06', '', NULL),
(27, 'LTOP-NTTC-025', 'Carbon G9', 'Lenovo', '', '', 1, 1, 4, 4, 2, 1, 1, 1, '3', 0, '2023-05-06', '', NULL),
(28, 'LTOP-NTTC-026', 'Carbon G9', 'Lenovo', '', '', 1, 1, 4, 4, 2, 1, 1, 1, '3', 0, '2023-05-06', '', NULL),
(29, 'LTOP-NTTC-027', 'Carbon L1', ' Hewlett-Packard', '', '', 1, 1, 3, 4, 2, 1, 1, 1, '2', 0, '2023-05-06', '', NULL),
(30, 'LTOP-NTTC-028', 'Carbon L1', ' Hewlett-Packard', '', '', 1, 1, 3, 4, 2, 1, 1, 1, '2', 0, '2023-05-06', '', NULL),
(31, 'LTOP-NTTC-029', 'Carbon L1', ' Hewlett-Packard', '', '', 1, 1, 1, 4, 3, 1, 1, 1, '3', 0, '2023-05-05', '', NULL),
(32, 'LTOP-NTTC-030', 'Carbon L1', ' Hewlett-Packard', '', '', 1, 1, 1, 4, 3, 1, 1, 1, '3', 0, '2023-05-05', '', NULL),
(33, 'LTOP-NTTC-031', 'Carbon L1', ' Hewlett-Packard', '', '', 1, 1, 1, 4, 3, 1, 1, 1, '3', 0, '2023-05-05', '', NULL),
(34, 'DTOP-NTTC-001', 'HP PRODESK 400 G7 MICROTOWER PC', ' Hewlett-Packard', '', '', 1, 1, 4, 4, 2, 1, 1, 1, '2', 0, '2023-05-06', '', NULL),
(35, 'DTOP-NTTC-002', 'HP PRODESK 400 G7 MICROTOWER PC', ' Hewlett-Packard', '', '', 1, 1, 3, 1, 2, 1, 1, 1, '2', 0, '2023-05-06', '', 6),
(36, 'DTOP-NTTC-010', 'Probook 440s', ' Hewlett-Packard', '', '', 1, 4, 1, 1, 18, 1, 1, 1, '3', 0, '2023-05-25', '', NULL),
(37, 'DTOP-NTTC-003', 'Probook 440s', ' Hewlett-Packard', '', '', 1, 4, 1, 1, 18, 1, 1, 1, '3', 0, '2023-05-25', '', NULL),
(38, 'DTOP-NTTC-004', 'Probook 440s', ' Hewlett-Packard', '', '', 1, 4, 1, 1, 18, 1, 1, 1, '3', 0, '2023-05-25', '', NULL),
(39, 'DTOP-NTTC-005', 'HP PRODESK 400 G7 MICROTOWER PC', ' Hewlett-Packard', '', '', 1, 1, 3, 4, 2, 1, 1, 1, '5', 0, '2023-05-13', '', NULL),
(40, 'DTOP-NTTC-006', 'HP PRODESK 400 G7 MICROTOWER PC', ' Hewlett-Packard', '', '', 1, 1, 3, 4, 2, 1, 1, 1, '5', 0, '2023-05-13', '', NULL),
(41, 'DTOP-NTTC-007', 'HP PRODESK 400 G7 MICROTOWER PC', ' Hewlett-Packard', '', '', 1, 1, 3, 4, 2, 1, 1, 1, '5', 0, '2023-05-13', '', NULL),
(42, 'DTOP-NTTC-008', 'HP PRODESK 400 G7 MICROTOWER PC', ' Hewlett-Packard', '', '', 1, 1, 3, 4, 2, 1, 1, 1, '5', 0, '2023-05-13', '', NULL),
(43, 'DTOP-NTTC-009', 'HP PRODESK 400 G7 MICROTOWER PC', ' Hewlett-Packard', '', '', 1, 1, 3, 4, 2, 1, 1, 1, '5', 0, '2023-05-13', '', NULL),
(44, 'MNTR-NTTC-001', 'LED24633R', 'ChangChong', '', '', 1, 1, 4, 1, 7, 1, 1, 1, '1', 0, '2023-05-06', '', NULL),
(45, 'MNTR-NTTC-002', 'LED24633R', 'ChangChong', '', '', 1, 1, 4, 1, 7, 1, 1, 1, '1', 0, '2023-05-06', '', NULL),
(46, 'MNTR-NTTC-003', 'LED24633R', 'ChangChong', '', '', 1, 1, 4, 1, 7, 1, 1, 1, '1', 0, '2023-05-06', '', NULL),
(47, 'MNTR-NTTC-004', 'LED24633R', 'ChangChong', '', '', 1, 1, 4, 1, 7, 1, 1, 1, '1', 0, '2023-05-06', '', NULL),
(48, 'MNTR-NTTC-005', 'LED24633R', 'ChangChong', '', '', 1, 1, 4, 1, 7, 1, 1, 1, '1', 0, '2023-05-06', '', NULL),
(49, 'MNTR-NTTC-006', 'LED24633R', 'ChangChong', '', '', 1, 1, 4, 1, 7, 1, 1, 1, '1', 0, '2023-05-06', '', NULL),
(50, 'MNTR-NTTC-007', 'LED24633R', 'ChangChong', '', '', 1, 1, 4, 1, 7, 1, 1, 1, '1', 0, '2023-05-06', '', NULL),
(51, 'MNTR-NTTC-008', 'LED24633R', 'ChangChong', '', '', 1, 1, 4, 1, 7, 1, 1, 1, '1', 0, '2023-05-06', '', NULL),
(52, 'MNTR-NTTC-009', 'LED24633R', 'ChangChong', '', '', 1, 1, 4, 1, 7, 1, 1, 1, '1', 0, '2023-05-06', '', NULL),
(53, 'MNTR-NTTC-010', 'LED24633R', 'ChangChong', '', '', 1, 1, 4, 1, 7, 1, 1, 1, '1', 0, '2023-05-06', '', NULL),
(54, 'SAMPLE_ORO-001', 'Kawali', 'Camel', '', '', 2, 13, 5, 2, 29, 1, 1, 1, '1', 0, '2023-05-11', '', NULL),
(55, 'SAMPLE_ORO-002', 'Kawali', 'Camel', '', '', 2, 13, 5, 2, 29, 1, 1, 1, '1', 0, '2023-05-11', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `level_tbl`
--

CREATE TABLE `level_tbl` (
  `level_id` int(11) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level_tbl`
--

INSERT INTO `level_tbl` (`level_id`, `level`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Viewer');

-- --------------------------------------------------------

--
-- Table structure for table `location_tbl`
--

CREATE TABLE `location_tbl` (
  `locationid` int(11) NOT NULL,
  `locationname` varchar(250) NOT NULL,
  `departmentid` int(11) NOT NULL,
  `loc_deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location_tbl`
--

INSERT INTO `location_tbl` (`locationid`, `locationname`, `departmentid`, `loc_deleted`) VALUES
(1, 'None', 1, 1),
(2, 'None', 2, 1),
(3, 'None', 3, 1),
(4, 'NOC', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `supplier_tbl`
--

CREATE TABLE `supplier_tbl` (
  `supplierid` int(11) NOT NULL,
  `supp_name` varchar(250) NOT NULL,
  `supp_number` varchar(250) NOT NULL,
  `supp_contactperson` varchar(250) NOT NULL,
  `supp_address` varchar(250) NOT NULL,
  `departmentid` int(11) NOT NULL,
  `supp_deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier_tbl`
--

INSERT INTO `supplier_tbl` (`supplierid`, `supp_name`, `supp_number`, `supp_contactperson`, `supp_address`, `departmentid`, `supp_deleted`) VALUES
(1, 'Transnational E-Business Solutions, Inc.', '(0632)830-8888', 'Manong', 'The Penthouse, Net Quad Building, 4th Ave, corner 30th St. E-Square Crescent Park West Bonifacio Global City, Taguig City', 1, 1),
(2, 'MegaKarte Smartcard Corp.', '(0632)753-1801', 'Manong 2', 'Room 1407 14/F Cityland 10 Tower II 154 H V Dela Costa St. Salcedo Village Makati City', 2, 1),
(3, 'Fil-Nippon Technology Supply Inc.', '(0632)553-8390', 'Manong 3', 'Bay 9-11 UPRC I BLDG 2230 Chino Roces Ave Brgy. Bangkal, Makati City', 1, 1),
(4, 'ISSI Information Technologies', 'NA', 'Manong 4', '#3B Speaker Perez St., Brgy Sta Teresita, Quezon City', 1, 1),
(5, 'Palengke', '09077813929', 'Manang Inday', 'Palengke, Canlubang', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `unit_tbl`
--

CREATE TABLE `unit_tbl` (
  `unitid` int(11) NOT NULL,
  `unit` varchar(50) NOT NULL,
  `unit_deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit_tbl`
--

INSERT INTO `unit_tbl` (`unitid`, `unit`, `unit_deleted`) VALUES
(1, 'Pcs', 1),
(2, 'Unit', 1),
(3, 'Box', 1),
(4, 'Liter', 1),
(5, 'Tons', 1),
(6, 'Meter', 1),
(7, 'Kilo', 1),
(8, 'Ream/s', 1),
(9, 'Pack/s', 1),
(10, 'Roll/s', 1),
(11, 'Sample Unittss', 0),
(12, 'Sample UNit', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_acc_tbl`
--

CREATE TABLE `user_acc_tbl` (
  `u_ids` int(11) NOT NULL,
  `emp_id` varchar(250) NOT NULL,
  `u_firstname` varchar(250) NOT NULL,
  `u_middlename` varchar(250) NOT NULL,
  `u_lastname` varchar(250) NOT NULL,
  `u_emailadd` varchar(250) NOT NULL,
  `u_contactno` varchar(250) NOT NULL,
  `u_address` varchar(250) NOT NULL,
  `u_departmentid` int(11) DEFAULT NULL,
  `u_username` varchar(250) NOT NULL,
  `u_password` varchar(250) NOT NULL,
  `u_levelid` int(11) NOT NULL,
  `u_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_acc_tbl`
--

INSERT INTO `user_acc_tbl` (`u_ids`, `emp_id`, `u_firstname`, `u_middlename`, `u_lastname`, `u_emailadd`, `u_contactno`, `u_address`, `u_departmentid`, `u_username`, `u_password`, `u_levelid`, `u_status`) VALUES
(1, '1001', 'Jzxc', 'C', 'Niels', 'jzxcmatre1@gmail.com', ' 09122732815', 'NYK-TDG', 1, 'a', 'a', 1, 1),
(2, '1002', 'Niella', 'G', 'Step', 'Niels@gmail.com', '0966452758', 'canlubangs', 3, 'u', 'u', 2, 1),
(3, '1003', 'Step', 'M', 'Jigz', 'Jigz@gmail.com', '0966515758', '', 2, 'v', 'v', 3, 1),
(4, '101001', 'Meynard', 'B', 'Castro', 'Meynard.castro@neti.com.ph', '093532214512', '', 2, 'm', 'm', 2, 1),
(5, '231545', 'Janiella', 'P', 'Pana', ' niela@yahoo.com', '0912424564878', ' Canluabng', 1, 'j', 'j', 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assetstatus_tbl`
--
ALTER TABLE `assetstatus_tbl`
  ADD PRIMARY KEY (`assetstatusid`);

--
-- Indexes for table `assetusage_tbl`
--
ALTER TABLE `assetusage_tbl`
  ADD PRIMARY KEY (`assetusageid`),
  ADD KEY `departmentid` (`departmentid`);

--
-- Indexes for table `category_tbl`
--
ALTER TABLE `category_tbl`
  ADD PRIMARY KEY (`categoryid`),
  ADD KEY `departmentid` (`departmentid`);

--
-- Indexes for table `consumabletype_tbl`
--
ALTER TABLE `consumabletype_tbl`
  ADD PRIMARY KEY (`consumabletypeid`);

--
-- Indexes for table `consumable_tbl`
--
ALTER TABLE `consumable_tbl`
  ADD PRIMARY KEY (`consumableid`),
  ADD KEY `unitid` (`unitid`),
  ADD KEY `categoryid` (`categoryid`);

--
-- Indexes for table `department_tbl`
--
ALTER TABLE `department_tbl`
  ADD PRIMARY KEY (`departmentid`);

--
-- Indexes for table `files_tbl`
--
ALTER TABLE `files_tbl`
  ADD PRIMARY KEY (`fileid`),
  ADD KEY `itemid` (`itemid`);

--
-- Indexes for table `inventory_tbl`
--
ALTER TABLE `inventory_tbl`
  ADD PRIMARY KEY (`itemid`),
  ADD KEY `inventory_tbl_ibfk_1` (`consumabletypeid`),
  ADD KEY `inventory_tbl_ibfk_2` (`unitid`),
  ADD KEY `invtoassetstatus` (`assetstatusid`),
  ADD KEY `invtoasssetussage` (`assetusageid`),
  ADD KEY `invtodepartment` (`departmentid`),
  ADD KEY `invtocategory` (`categoryid`),
  ADD KEY `supplierid` (`supplierid`),
  ADD KEY `locationid` (`locationid`),
  ADD KEY `fileid` (`fileid`);

--
-- Indexes for table `level_tbl`
--
ALTER TABLE `level_tbl`
  ADD PRIMARY KEY (`level_id`);

--
-- Indexes for table `location_tbl`
--
ALTER TABLE `location_tbl`
  ADD PRIMARY KEY (`locationid`),
  ADD KEY `departmentid` (`departmentid`);

--
-- Indexes for table `supplier_tbl`
--
ALTER TABLE `supplier_tbl`
  ADD PRIMARY KEY (`supplierid`);

--
-- Indexes for table `unit_tbl`
--
ALTER TABLE `unit_tbl`
  ADD PRIMARY KEY (`unitid`);

--
-- Indexes for table `user_acc_tbl`
--
ALTER TABLE `user_acc_tbl`
  ADD PRIMARY KEY (`u_ids`),
  ADD KEY `position` (`u_levelid`),
  ADD KEY `department` (`u_departmentid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assetstatus_tbl`
--
ALTER TABLE `assetstatus_tbl`
  MODIFY `assetstatusid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `assetusage_tbl`
--
ALTER TABLE `assetusage_tbl`
  MODIFY `assetusageid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `category_tbl`
--
ALTER TABLE `category_tbl`
  MODIFY `categoryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `consumabletype_tbl`
--
ALTER TABLE `consumabletype_tbl`
  MODIFY `consumabletypeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `consumable_tbl`
--
ALTER TABLE `consumable_tbl`
  MODIFY `consumableid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `department_tbl`
--
ALTER TABLE `department_tbl`
  MODIFY `departmentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `files_tbl`
--
ALTER TABLE `files_tbl`
  MODIFY `fileid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `inventory_tbl`
--
ALTER TABLE `inventory_tbl`
  MODIFY `itemid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `level_tbl`
--
ALTER TABLE `level_tbl`
  MODIFY `level_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `location_tbl`
--
ALTER TABLE `location_tbl`
  MODIFY `locationid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `supplier_tbl`
--
ALTER TABLE `supplier_tbl`
  MODIFY `supplierid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `unit_tbl`
--
ALTER TABLE `unit_tbl`
  MODIFY `unitid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_acc_tbl`
--
ALTER TABLE `user_acc_tbl`
  MODIFY `u_ids` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assetusage_tbl`
--
ALTER TABLE `assetusage_tbl`
  ADD CONSTRAINT `assetusage_tbl_ibfk_1` FOREIGN KEY (`departmentid`) REFERENCES `department_tbl` (`departmentid`);

--
-- Constraints for table `category_tbl`
--
ALTER TABLE `category_tbl`
  ADD CONSTRAINT `category_tbl_ibfk_1` FOREIGN KEY (`departmentid`) REFERENCES `department_tbl` (`departmentid`);

--
-- Constraints for table `consumable_tbl`
--
ALTER TABLE `consumable_tbl`
  ADD CONSTRAINT `consumable_tbl_ibfk_1` FOREIGN KEY (`unitid`) REFERENCES `unit_tbl` (`unitid`),
  ADD CONSTRAINT `consumable_tbl_ibfk_2` FOREIGN KEY (`categoryid`) REFERENCES `category_tbl` (`categoryid`);

--
-- Constraints for table `files_tbl`
--
ALTER TABLE `files_tbl`
  ADD CONSTRAINT `files_tbl_ibfk_1` FOREIGN KEY (`itemid`) REFERENCES `inventory_tbl` (`itemid`);

--
-- Constraints for table `inventory_tbl`
--
ALTER TABLE `inventory_tbl`
  ADD CONSTRAINT `inventory_tbl_ibfk_1` FOREIGN KEY (`consumabletypeid`) REFERENCES `consumabletype_tbl` (`consumabletypeid`) ON UPDATE CASCADE,
  ADD CONSTRAINT `inventory_tbl_ibfk_2` FOREIGN KEY (`unitid`) REFERENCES `unit_tbl` (`unitid`) ON UPDATE CASCADE,
  ADD CONSTRAINT `inventory_tbl_ibfk_3` FOREIGN KEY (`supplierid`) REFERENCES `supplier_tbl` (`supplierid`),
  ADD CONSTRAINT `inventory_tbl_ibfk_4` FOREIGN KEY (`locationid`) REFERENCES `location_tbl` (`locationid`),
  ADD CONSTRAINT `inventory_tbl_ibfk_5` FOREIGN KEY (`fileid`) REFERENCES `files_tbl` (`fileid`),
  ADD CONSTRAINT `invtoassetstatus` FOREIGN KEY (`assetstatusid`) REFERENCES `assetstatus_tbl` (`assetstatusid`) ON UPDATE CASCADE,
  ADD CONSTRAINT `invtoasssetussage` FOREIGN KEY (`assetusageid`) REFERENCES `assetusage_tbl` (`assetusageid`) ON UPDATE CASCADE,
  ADD CONSTRAINT `invtocategory` FOREIGN KEY (`categoryid`) REFERENCES `category_tbl` (`categoryid`),
  ADD CONSTRAINT `invtodepartment` FOREIGN KEY (`departmentid`) REFERENCES `department_tbl` (`departmentid`);

--
-- Constraints for table `location_tbl`
--
ALTER TABLE `location_tbl`
  ADD CONSTRAINT `location_tbl_ibfk_1` FOREIGN KEY (`departmentid`) REFERENCES `department_tbl` (`departmentid`);

--
-- Constraints for table `user_acc_tbl`
--
ALTER TABLE `user_acc_tbl`
  ADD CONSTRAINT `department` FOREIGN KEY (`u_departmentid`) REFERENCES `department_tbl` (`departmentid`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `position` FOREIGN KEY (`u_levelid`) REFERENCES `level_tbl` (`level_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
