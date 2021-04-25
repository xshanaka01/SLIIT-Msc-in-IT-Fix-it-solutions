-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 20, 2021 at 10:45 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `helpdesk`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_department`
--

DROP TABLE IF EXISTS `tbl_department`;
CREATE TABLE IF NOT EXISTS `tbl_department` (
  `dept_code` varchar(2) NOT NULL,
  `dept_name` varchar(50) NOT NULL,
  PRIMARY KEY (`dept_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_department`
--

INSERT INTO `tbl_department` (`dept_code`, `dept_name`) VALUES
('1', 'DGs Office                                        '),
('11', 'Monitoring                                        '),
('14', 'Technical Services                                '),
('15', 'Environment                                       '),
('17', 'R & PA                                            '),
('18', 'Promotion                                         '),
('19', 'Legal                                             '),
('2', 'DDGs Office  (Administration)                     '),
('20', 'Internal Audit                                    '),
('22', 'Investor services                                 '),
('23', 'Zone Management                                   '),
('24', 'Industrial Relations                              '),
('26', 'Media & Publicity                                 '),
('28', 'Investment                                        '),
('35', 'Eng Approvals & Special Project                   '),
('36', 'ED - Zone                                         '),
('37', 'Directors Office                                  '),
('4', 'Finance                                           '),
('40', 'Engineering  Services                             '),
('43', 'Government  Audit                                 '),
('45', 'Strategic   Planning                              '),
('46', 'Donated                                           '),
('5', 'Personnel                                         '),
('50', 'Security & Fire                                   '),
('51', 'Ministry of Finance                               '),
('52', 'Project Implementation                            '),
('53', 'Ministry of Investment Promotion                  '),
('54', 'RO - North East                                   '),
('55', 'RO - North West                                   '),
('56', 'RO - Central                                      '),
('58', 'RO - Sourthern                                    '),
('59', 'E- Future                                         '),
('6', 'HRD                                               '),
('60', 'Special Projects                                  '),
('61', 'BII                                               '),
('65', 'ACV Unit KEPZ                                     '),
('66', 'CVT - Orugodawatta                                '),
('67', 'ED - Monitoring & Proj.Implementation             '),
('68', 'ACDUV Unit KEPZ                                   '),
('69', 'CESMA                                             '),
('7', 'Administration                                    '),
('70', 'Marketting                                        '),
('71', 'Operation                                         '),
('72', 'Asycuda - Post Audit Unit                         '),
('73', 'Mega Unit                                         '),
('74', 'DGs Secretariat                                   '),
('75', 'Reception                                         '),
('76', 'Import                                            '),
('77', 'Export                                            '),
('78', 'Sector G1                                         '),
('79', 'Sector G2                                         '),
('8', 'Info.Technology                                   '),
('80', 'Sector G3                                         '),
('81', 'PPP Unit                                          '),
('82', 'Verification & Service Unit                       '),
('83', 'Investor Centre                                   '),
('84', 'Visa Unit                                         '),
('86', 'ED Office                                         '),
('87', 'IT Room                                           '),
('88', 'Monthly Permit                                    '),
('89', 'Gate 02                                           '),
('90', 'Gate 01                                           '),
('91', 'HRO                                               '),
('92', 'Chairmans Office                                  '),
('93', 'Project Appraisal -Tourism/Knowledge & Agriculture'),
('94', 'Project Appraisal-Service & Utilities             '),
('95', 'Project Appraisal -Infrastructure                 '),
('96', 'Project Appraisal -Manufacturing                  '),
('97', 'Project Appraisal -Apparel                        '),
('98', 'Project Appraisal -Visa Unit                      '),
('99', 'Office Of ED (Recoveries)                         ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_equipments_type`
--

DROP TABLE IF EXISTS `tbl_equipments_type`;
CREATE TABLE IF NOT EXISTS `tbl_equipments_type` (
  `equipments_type_code` varchar(3) NOT NULL,
  `equipments_descrip` varchar(40) NOT NULL,
  PRIMARY KEY (`equipments_type_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_equipments_type`
--

INSERT INTO `tbl_equipments_type` (`equipments_type_code`, `equipments_descrip`) VALUES
('CPU', 'Central Processing Unit'),
('KEY', 'Keyboard'),
('LAP', 'Laptop'),
('MON', 'Monitor'),
('MOU', 'Mouse'),
('NET', 'Network Error'),
('PRI', 'Printer'),
('SCA', 'Scanner'),
('SYS', 'System  / Application Problems'),
('UPS', 'UPS');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_faults`
--

DROP TABLE IF EXISTS `tbl_faults`;
CREATE TABLE IF NOT EXISTS `tbl_faults` (
  `fault_code` varchar(3) NOT NULL,
  `fault_description` varchar(45) NOT NULL,
  `faults_type` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`fault_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_faults`
--

INSERT INTO `tbl_faults` (`fault_code`, `fault_description`, `faults_type`) VALUES
('001', 'No power', 'CPU'),
('002', 'Network problem', 'NET'),
('003', 'No display', 'MON'),
('004', 'Getting stuck', 'CPU'),
('005', 'Paper feeding error', 'PRI'),
('006', 'Printout not clear', 'PRI'),
('007', 'Unable to print', 'PRI'),
('008', 'Garbage printout', 'PRI'),
('009', 'Damaged', 'CPU'),
('010', 'App. S/W corruption', 'SYS'),
('011', 'O/S corruption', 'SYS'),
('012', 'Memory problem', 'CPU'),
('013', 'CMOS battery failure', 'CPU'),
('014', 'Baterry low/drained', 'UPS'),
('015', 'Control panel error', 'CPU'),
('016', 'Internet/E-mail failure', 'SYS'),
('017', 'HDD error', 'CPU'),
('018', 'Floppy Disk drive error', 'CPU'),
('019', 'Issued Inventory Items', 'SYS'),
('020', 'System Failure', 'SYS'),
('021', 'Machine Slow', 'CPU'),
('022', 'Paper Jam', 'PRI'),
('023', 'PC Automatically Restarting', 'CPU'),
('024', 'PC Cannot Boot', 'CPU'),
('025', 'Virus Attack', 'CPU'),
('026', 'New PC Installation', 'CPU'),
('027', 'New Printer Installation', 'PRI'),
('028', 'Printer Sharing', 'PRI'),
('029', 'New requirement for PC', 'CPU'),
('030', 'New requirement for Printer', 'PRI'),
('031', 'New requirement for UPS', 'UPS'),
('032', 'New requirement for Scanner', 'SCA'),
('033', 'New requirement for photocopier', 'NEW'),
('034', 'Scanner not work', 'SCA'),
('035', 'Network error', 'NET'),
('036', 'USB port not work', 'CPU');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jobs`
--

DROP TABLE IF EXISTS `tbl_jobs`;
CREATE TABLE IF NOT EXISTS `tbl_jobs` (
  `job_no` int(10) NOT NULL,
  `report_at` varchar(10) DEFAULT NULL,
  `log_by` varchar(10) DEFAULT NULL,
  `date_enter` datetime DEFAULT NULL,
  `loc_code` varchar(2) DEFAULT NULL,
  `dept_code` varchar(2) DEFAULT NULL,
  `item` varchar(20) DEFAULT NULL,
  `fault_reqt` varchar(100) DEFAULT NULL,
  `other_reqt` varchar(250) DEFAULT NULL,
  `job_status` int(1) DEFAULT NULL,
  `it_officer_code` varchar(10) DEFAULT NULL,
  `assign_H_user` varchar(10) DEFAULT NULL,
  `assign_date` datetime DEFAULT NULL,
  `inv_other` varchar(1) DEFAULT NULL,
  `equipment_id` varchar(7) DEFAULT NULL,
  `itof_fault_selected` varchar(3) DEFAULT NULL,
  `it_comment` varchar(250) DEFAULT NULL,
  `start_datetime` datetime DEFAULT NULL,
  `support_type_code` varchar(1) DEFAULT NULL,
  `action` varchar(200) DEFAULT NULL,
  `end_datetime` datetime DEFAULT NULL,
  `complete_officer` varchar(10) DEFAULT NULL,
  `comp_comment` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`job_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jobs`
--

INSERT INTO `tbl_jobs` (`job_no`, `report_at`, `log_by`, `date_enter`, `loc_code`, `dept_code`, `item`, `fault_reqt`, `other_reqt`, `job_status`, `it_officer_code`, `assign_H_user`, `assign_date`, `inv_other`, `equipment_id`, `itof_fault_selected`, `it_comment`, `start_datetime`, `support_type_code`, `action`, `end_datetime`, `complete_officer`, `comp_comment`) VALUES
(2020010001, '6511', '6511', '2020-01-02 10:30:01', 'HO', '8', 'CPU', '011', '  OS corruption', 8, '2724', '2582', '2020-01-08 09:55:18', 'I', 'CPU2049', '', 'Repair the OS', '2020-01-08 09:58:00', 's', NULL, '2020-01-08 09:59:00', '2724', 'Done'),
(2020010002, '6511', '6511', '2020-01-02 10:32:19', 'HO', '8', 'NET', '002', '  Network issue', 8, '2724', '2582', '2020-01-08 09:55:26', 'O', 'CPU2049', '035', 'install new network card', '2020-01-08 10:00:00', 's', NULL, '2020-01-08 10:01:00', '2724', 'done'),
(2020010003, '6511', '6511', '2020-01-02 10:33:15', 'HO', '8', 'SYS', '010', '  System not working', 2, '2590', '2582', '2020-01-08 09:55:37', NULL, 'MON1932', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2020010004, '6511', '6511', '2020-01-02 10:34:10', 'HO', '8', 'MON', '003', '  no display', 2, '2590', '2582', '2020-01-08 09:55:43', NULL, 'CPU2049', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2020010005, '6511', '6511', '2020-01-03 12:37:00', 'HO', '8', 'KEY', '004', '  not working properly ', 7, '2724', '2582', '2020-01-08 09:55:49', 'I', 'CPU2049', '', 'Keyboard not work', '2020-01-08 10:05:02', 'c', 'Need to replace Keyboard', NULL, NULL, NULL),
(2020010006, '2582', '2582', '2020-01-03 12:38:11', 'HO', '8', 'SYS', '011', '  OS issue', 7, '2724', '2582', '2020-01-08 09:55:54', 'I', 'CPU2048', '', 'OS issue', '2020-01-08 10:05:56', 's', 'need to install os', NULL, NULL, NULL),
(2020010007, '2582', '2582', '2020-01-03 12:38:50', 'HO', '8', 'PRI', '006', '  Printouts not clear', 8, '2724', '2582', '2020-01-08 09:56:02', 'O', 'PRN1001', '006', 'Photo c Unit clean', '2020-01-08 10:06:00', 's', NULL, '2020-01-08 10:07:00', '2724', 'done'),
(2020010008, '2582', '2582', '2020-01-06 09:39:59', 'HO', '8', 'MON', '003', '  no display', 8, '2724', '2582', '2020-01-08 09:56:06', 'I', 'MON1932', '', 'display not working. need to replace LCD', '2020-01-08 10:08:49', 's', 'Need to inform', '2020-01-08 10:43:00', '2724', 'ok'),
(2020010009, '6511', '6511', '2020-01-06 09:44:34', 'HO', '8', 'CPU', '020', '  NO Power', 8, '2724', '2582', '2020-01-08 09:56:20', 'I', 'CPU2049', '', 'Ram issue', '2020-01-08 10:09:33', 's', 'Need to inform vendor', '2020-01-08 10:55:00', '2724', 'Done'),
(2020010010, '6511', '6511', '2020-01-06 09:45:27', 'HO', '8', 'MON', '003', '  NO display', 5, '2724', '2582', '2020-01-08 09:56:24', 'I', 'MON1933', '', 'LCD not working ', '2020-01-08 10:11:00', 's', 'Need to inform vendor', NULL, NULL, NULL),
(2020010011, '6511', '6511', '2020-01-08 09:46:25', 'HO', '8', 'CPU', '021', '  Computer slow', 7, '2724', '2582', '2020-01-08 09:56:28', 'I', 'CPU2049', '', 'Need install RAM', '2020-01-08 10:50:01', 's', 'Inform Vendor', NULL, NULL, NULL),
(2020010012, '6511', '6511', '2020-01-08 09:46:46', 'HO', '8', 'PRI', '005', '  Paper Not feeding', 8, '2724', '2582', '2020-01-08 09:56:36', 'O', 'PRN1001', '028', 'Printer sharing ', '2020-01-08 10:10:00', 'r', NULL, '2020-01-08 10:12:00', '2724', 'done'),
(2020010013, '6511', '6511', '2020-01-08 09:51:53', 'HO', '8', 'SCA', '034', 'Scanner not work', 8, '2724', '2582', '2020-01-08 09:56:42', 'O', 'SCN0001', '034', 'Scanner not work. Re install software', '2020-01-08 10:12:00', 's', NULL, '2020-01-08 10:12:00', '2724', 'done'),
(2020010014, '6511', '6511', '2020-01-08 09:53:01', 'HO', '8', 'CPU', '023', 'Restart automatically ', 4, '2724', '2582', '2020-01-08 10:50:28', 'I', 'CPU2049', '', 'Need to replace Hdd', '2020-01-08 11:52:25', 's', 'informed vendor', NULL, NULL, NULL),
(2020010015, '6511', '6511', '2020-01-08 09:53:39', 'HO', '8', 'CPU', '024', 'Not working ', 4, '2724', '2582', '2020-01-08 11:52:42', 'I', 'CPU2049', '', 'Need to install New Ram', '2020-01-08 11:54:25', 's', 'informed vendor', NULL, NULL, NULL),
(2020010016, '6511', '6511', '2020-01-08 09:54:29', 'HO', '8', 'CPU', '035', 'PC  Network not working ', 7, '2724', '2582', '2020-01-08 11:52:47', 'I', 'CPU2049', '', 'inform vendor', '2020-01-12 14:10:50', 's', 'need to replace Network card', NULL, NULL, NULL),
(2020010017, '6511', '6511', '2020-01-08 11:50:53', 'HO', '8', 'CPU', '001', '  Power supply Issue ', 2, '2589', '2582', '2021-03-22 10:38:51', NULL, 'CPU2049', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2020010018, '6511', '6511', '2020-01-08 11:51:11', 'HO', '8', 'CPU', '002', '  Network issue', 2, '2589', '2582', '2021-03-22 10:38:57', NULL, 'CPU2049', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2020010019, '6511', '6511', '2020-01-11 11:13:00', 'HO', '8', 'CPU', '017', '  HDD damage', 8, '2724', '2582', '2020-01-11 11:13:33', 'I', 'CPU2049', '', 'Need to replace Hdd ', '2020-01-12 14:10:00', 'r', 'Informed vendor', '2020-01-12 14:11:00', '2724', 'done'),
(2020010021, '2582', '6511', '2020-01-12 13:59:16', 'HO', '8', 'CPU', '001', '  no power', 8, '2724', '2582', '2020-01-12 14:06:03', 'I', 'CPU2048', '', 'Need to replace Power supply ', '2020-01-12 14:07:00', 's', NULL, '2020-01-12 14:08:00', '2724', 'Need to inform vendor'),
(2020010022, '6511', '6511', '2020-01-12 14:01:50', 'HO', '8', 'MON', '003', 'NO power', 8, '2724', '2582', '2020-01-12 14:14:43', 'I', 'MON1933', '', 'nedd', '2020-01-12 14:15:00', 'r', NULL, '2020-01-12 14:15:00', '2724', 'done'),
(2021010023, '6511', '6511', '2021-01-22 12:49:55', 'HO', '8', 'LAP', '004', '  rttrytry', 8, '2724', '2582', '2021-01-22 12:50:10', '', '', '', 'ghgfn', '2021-04-20 15:11:00', 's', NULL, '2021-04-20 15:11:00', '2724', 'sdas'),
(2021010024, '2403', '2403', '2021-01-22 15:13:07', 'HO', '8', 'LAP', '003', '  ss', 2, '2724', '2582', '2021-01-22 15:13:21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2021010025, '2403', '2403', '2021-01-22 15:22:50', 'HO', '8', 'PRI', '006', '  sometimes it is not clear', 3, '2724', '2582', '2021-01-22 15:26:44', 'I', 'CPU2084', '', 'bvfggfhgjhg h j jhjhj jhjhj jhjhjhjhjhj jhjhj jhjhj jtedyuyt yujyuytuyuyuyuyuyuyuyuyuyu uyuyuy', '2021-01-22 15:36:38', 'c', 'Please detect the issue', NULL, NULL, NULL),
(2021020026, '3285', '3285', '2021-02-02 12:25:22', 'HO', '8', 'CPU', '002', '  ', 2, '3285', '2582', '2021-02-03 14:19:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2021020027, '2591', '2591', '2021-02-02 13:57:16', 'HO', '8', 'CPU', '031', 'New UPS Not Attached to PC.', 2, '2724', '2582', '2021-02-03 14:19:21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2021020028, '2724', '2582', '2021-02-03 09:36:31', 'HO', '8', 'PRI', '005', '  Big sound occurred when paper feeding', 2, '2589', '2582', '2021-02-19 09:18:23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2021020029, '1034', '1034', '2021-02-03 14:36:16', 'KE', '22', 'PRI', '005', '  ', 2, '2724', '2582', '2021-02-03 14:36:55', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2021020030, '2526', '2582', '2021-02-15 10:33:12', 'HO', '8', 'CPU', '004', '  ', 2, '2590', '2526', '2021-02-15 10:34:06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2021020031, '2582', '6511', '2021-02-15 16:03:23', 'HO', '8', 'LAP', '017', '  HDD error', 2, '2724', '2582', '2021-02-15 16:07:29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2021030032, '6511', '6511', '2021-03-22 09:42:00', 'HO', '8', 'CPU', '001', '  dedd', 2, '2724', '2582', '2021-03-22 10:39:08', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2021030033, '6511', '6511', '2021-03-22 09:44:28', 'HO', '8', 'CPU', '004', '  ddd', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2021030034, '6511', '6511', '2021-03-22 09:44:50', 'HO', '8', 'CPU', '004', '  ff', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2021030035, '6511', '6511', '2021-03-22 09:45:00', 'HO', '8', 'CPU', '004', '  ff', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2021030036, '6511', '6511', '2021-03-22 09:45:36', 'HO', '8', 'CPU', '009', '  fffdfdf', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2021030037, '6511', '6511', '2021-03-22 09:48:45', 'HO', '8', 'CPU', '001', '  fdgfdf', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2021030038, '6511', '6511', '2021-03-22 09:49:24', 'HO', '8', 'CPU', '009', '  hgjgj', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2021030039, '6511', '6511', '2021-03-22 09:49:53', 'HO', '8', 'CPU', '004', '  hgfjfj', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2021030040, '6511', '6511', '2021-03-22 09:52:08', 'HO', '8', 'CPU', '004', '  ghfdh', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2021030041, '6511', '6511', '2021-03-22 09:52:50', 'HO', '8', 'CPU', '012', '  jhgjhgjg', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2021030042, '6511', '6511', '2021-03-22 09:52:55', 'HO', '8', 'CPU', '009', '  fghgfdh', 3, '2724', '2582', '2021-03-22 15:29:27', NULL, '', '004', 'fghfh', '2021-04-20 15:27:19', 'c', '', NULL, NULL, NULL),
(2021030043, '6511', '6511', '2021-03-22 12:53:08', 'HO', '8', 'CPU', '004', '  hy', 2, '2589', '2582', '2021-03-22 15:29:23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2021040044, '6511', '6511', '2021-04-19 15:22:12', 'HO', '8', 'SCA', '032', '  dfgdg', 3, '2724', '2582', '2021-04-19 15:22:34', '', '', '002', 'tery', '2021-04-20 15:26:45', 'c', '', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_job_status`
--

DROP TABLE IF EXISTS `tbl_job_status`;
CREATE TABLE IF NOT EXISTS `tbl_job_status` (
  `job_status_id` int(1) NOT NULL,
  `job_status_desc` varchar(30) NOT NULL,
  PRIMARY KEY (`job_status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_job_status`
--

INSERT INTO `tbl_job_status` (`job_status_id`, `job_status_desc`) VALUES
(1, 'Pending at HelpDesk Officer   '),
(2, 'Assign IT Officer for the Job '),
(3, 'Informed To Vendor            '),
(4, 'Pending Approval Payment      '),
(5, 'Payment Approved              '),
(6, 'Payment Rejected'),
(7, 'Job Complete-Vendor '),
(8, 'Complete the Job              '),
(9, 'Disposal                      ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_last_job`
--

DROP TABLE IF EXISTS `tbl_last_job`;
CREATE TABLE IF NOT EXISTS `tbl_last_job` (
  `last_job_no` int(10) NOT NULL,
  PRIMARY KEY (`last_job_no`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_last_job`
--

INSERT INTO `tbl_last_job` (`last_job_no`) VALUES
(44);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_location`
--

DROP TABLE IF EXISTS `tbl_location`;
CREATE TABLE IF NOT EXISTS `tbl_location` (
  `loc_code` varchar(2) NOT NULL,
  `loc_name` varchar(50) NOT NULL,
  PRIMARY KEY (`loc_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_location`
--

INSERT INTO `tbl_location` (`loc_code`, `loc_name`) VALUES
('BE', 'EPZ-Biyagama                  '),
('CE', 'RO - Central                  '),
('CV', 'CVT - Orugodawatta            '),
('DO', 'Donated                       '),
('HO', 'Colombo'),
('HR', 'EPZ-Horana                    '),
('HT', 'Hambanthota                   '),
('JF', 'Jaffna Regional Office        '),
('KD', 'Ind-Park-Kandy                '),
('KE', 'EPZ-Katunayaka                '),
('KG', 'EPZ-Koggala                   '),
('MA', 'EPZ-Mawathagama               '),
('ME', 'EPZ-Mirigama                  '),
('MI', 'Ministry                      '),
('MW', 'EPP-Malwatta                  '),
('NE', 'RO - North East               '),
('NW', 'RO - North Western            '),
('OB', 'SBJ Office                    '),
('PW', 'EPZ-Polgahawela               '),
('SI', 'Ind-Park-Seethawaka           '),
('SO', 'RO - Southern                 '),
('WP', 'EPZ-Wathupitiwala             ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE IF NOT EXISTS `tbl_users` (
  `title` varchar(2) NOT NULL,
  `f_name` varchar(50) NOT NULL,
  `l_name` varchar(50) NOT NULL,
  `disp_name` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `cont_no` varchar(10) NOT NULL,
  `user_code` varchar(10) NOT NULL,
  `usr_type` varchar(1) NOT NULL,
  `pro_pic` varchar(250) NOT NULL,
  `dept_code` varchar(2) NOT NULL,
  `loc_code` varchar(2) NOT NULL,
  `status` int(2) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`user_code`),
  KEY `fk_dept_code_idx` (`dept_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`title`, `f_name`, `l_name`, `disp_name`, `email`, `cont_no`, `user_code`, `usr_type`, `pro_pic`, `dept_code`, `loc_code`, `status`, `password`) VALUES
('', 'East-West Infor.', 'sys ltd', 'East-West Infor.sys ltd', 'East-WestInfor@gmail.com', '0111245679', '015', 'V', '', '', '', 1, '202cb962ac59075b964b07152d234b70'),
('', 'Abans', ' (Pvt) Ltd', 'Abans (Pvt) Ltd', 'abansit@abans.lk', '0716390900', '053', 'V', '', '', '', 1, '202cb962ac59075b964b07152d234b70'),
('Mr', 'Nadee', 'Perera', 'N Perera', 'nadeep@sierra.lk', '0112427308', '2582', 'H', '', '8', 'HO', 1, '202cb962ac59075b964b07152d234b70'),
('Mr', 'Thilan', 'Thilakarathne', 'T Thilarathne', 'thilant@sierra.lk', '0112427031', '2589', 'O', '', '8', 'HO', 1, '202cb962ac59075b964b07152d234b70'),
('Mr', 'Chathura', 'Prasanga', 'R P C Prasanga', 'chathurap@sierra.lk', '0112427357', '2590', 'O', '', '8', 'HO', 1, '202cb962ac59075b964b07152d234b70'),
('Mr', 'Chathuranga', 'Dahanayake', 'A C Dahanayake', 'amilac@sierra.lk', '0112427155', '2724', 'O', '', '8', 'HO', 1, '202cb962ac59075b964b07152d234b70'),
('Mr', 'Suneth', 'Hettiarachchi', 'S Hettiarachchi', 'sunethh@sierra.lk', '0112427316', '3001', 'A', '', '8', 'HO', 1, '202cb962ac59075b964b07152d234b70'),
('Mr', 'Chathura', 'Kumara', 'R C K Jayarathne', 'chathurak@sierra.lk', '0112427030', '6511', 'U', ' ', '8', 'HO', 1, '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_type`
--

DROP TABLE IF EXISTS `tbl_user_type`;
CREATE TABLE IF NOT EXISTS `tbl_user_type` (
  `usr_type` varchar(1) NOT NULL,
  `usr_descrip` varchar(20) NOT NULL,
  PRIMARY KEY (`usr_type`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_type`
--

INSERT INTO `tbl_user_type` (`usr_type`, `usr_descrip`) VALUES
('A', 'Approval Officer'),
('H', 'Help Desk officer'),
('O', 'Operation Officer'),
('U', 'User'),
('V', 'Vendor');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
