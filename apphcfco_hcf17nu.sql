-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 06, 2026 at 09:55 AM
-- Server version: 8.0.46
-- PHP Version: 8.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apphcfco_hcf17nu`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` int NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `des` longtext,
  `url` varchar(100) DEFAULT NULL,
  `ad_file` varchar(255) DEFAULT NULL,
  `status` varchar(5) NOT NULL DEFAULT 'A' COMMENT 'A=Active, D=Deleted, I=''Default/Inactive'''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ad_files`
--

CREATE TABLE `ad_files` (
  `id` int NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'A',
  `ad_file` varchar(255) NOT NULL,
  `ad_id` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `attendees`
--

CREATE TABLE `attendees` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `user_name` varchar(100) DEFAULT NULL,
  `company_id` int DEFAULT NULL,
  `meeting_id` varchar(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contactno` varchar(100) DEFAULT NULL,
  `pay_method` enum('bacs','cheque') DEFAULT NULL,
  `status` enum('paid','unpaid') DEFAULT 'unpaid',
  `attended` enum('y','n') NOT NULL DEFAULT 'n',
  `fee` varchar(4) DEFAULT NULL,
  `comments` varchar(255) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'this is the date record was written into the table e.g. the date RSVP was submitted by user',
  `meetId` int DEFAULT NULL,
  `mtId` int DEFAULT NULL,
  `additionals` int DEFAULT NULL COMMENT 'change from additionals for additional',
  `type` varchar(20) DEFAULT NULL,
  `companytext` varchar(255) DEFAULT NULL,
  `astatus` varchar(2) NOT NULL DEFAULT 'A' COMMENT 'A=Active, D=Deleted',
  `last_name` varchar(75) DEFAULT NULL,
  `attendee_status` enum('Speaker','Committee') DEFAULT NULL,
  `send_email` varchar(20) DEFAULT NULL,
  `booking_process` varchar(5) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `attendees_bk-16-09-2021`
--

CREATE TABLE `attendees_bk-16-09-2021` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `company_id` int NOT NULL,
  `meeting_id` varchar(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contactno` varchar(100) NOT NULL,
  `pay_method` enum('bacs','cheque') NOT NULL,
  `status` enum('paid','unpaid') NOT NULL DEFAULT 'unpaid',
  `attended` enum('y','n') NOT NULL DEFAULT 'n',
  `fee` varchar(4) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'this is the date record was written into the table e.g. the date RSVP was submitted by user',
  `meetId` int DEFAULT NULL,
  `mtId` int NOT NULL,
  `additionals` int NOT NULL COMMENT 'change from additionals for additional',
  `type` varchar(20) NOT NULL DEFAULT 'NULL',
  `companytext` varchar(255) NOT NULL,
  `astatus` varchar(2) NOT NULL DEFAULT 'A' COMMENT 'A=Active, D=Deleted',
  `last_name` varchar(75) NOT NULL,
  `attendee_status` enum('Speaker','Committee') DEFAULT NULL,
  `send_email` varchar(20) NOT NULL,
  `booking_process` varchar(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bulletins`
--

CREATE TABLE `bulletins` (
  `id` int NOT NULL,
  `created` datetime NOT NULL,
  `message` text NOT NULL,
  `status` varchar(2) NOT NULL DEFAULT 'A' COMMENT 'A=Active, I=Inactive'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT 'N/A',
  `repuser` varchar(255) DEFAULT NULL,
  `no_of_member` varchar(255) DEFAULT NULL,
  `country` varchar(255) NOT NULL DEFAULT 'N/A',
  `state` varchar(255) NOT NULL DEFAULT 'N/A',
  `city` varchar(255) NOT NULL DEFAULT 'N/A',
  `address` varchar(255) NOT NULL DEFAULT 'N/A',
  `website` varchar(255) NOT NULL DEFAULT 'N/A',
  `contactno` varchar(255) NOT NULL DEFAULT 'N/A',
  `date` date NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'A',
  `datalock` varchar(10) NOT NULL DEFAULT 'y',
  `mem_type` enum('Full','Associated','e-Member') NOT NULL DEFAULT 'Full',
  `fax` varchar(255) DEFAULT NULL,
  `email` varchar(500) DEFAULT NULL,
  `prefix` varchar(25) DEFAULT NULL,
  `billing_entity` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `comments` text,
  `user_id` int DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `dId` int NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `date_sent` date DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `doc_type` enum('Useful Infomation','AGM and Constitution') DEFAULT NULL,
  `close_date` date DEFAULT NULL,
  `status` enum('A','I','D','AR') NOT NULL DEFAULT 'A'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `email_templates`
--

CREATE TABLE `email_templates` (
  `id` int NOT NULL,
  `template_key` varchar(30) DEFAULT NULL,
  `template_name` varchar(255) NOT NULL,
  `from_address` varchar(255) NOT NULL,
  `from_name` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `email_text` text NOT NULL,
  `status` enum('A','I','D') NOT NULL DEFAULT 'A'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_details`
--

CREATE TABLE `invoice_details` (
  `id` int NOT NULL,
  `date` date NOT NULL,
  `meeting_id` int NOT NULL,
  `meeting_title` varchar(255) NOT NULL,
  `meeting_date` date NOT NULL,
  `attendees_name` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `fee` int NOT NULL,
  `invoice_number` varchar(255) NOT NULL,
  `payment_method` enum('bacs','cheque') NOT NULL,
  `payment_status` enum('paid','unpaid') NOT NULL DEFAULT 'unpaid',
  `attendee_id` varchar(255) NOT NULL,
  `user_id` int NOT NULL,
  `added_by` int NOT NULL,
  `is_merged` enum('y','n') NOT NULL DEFAULT 'n',
  `status` varchar(15) NOT NULL DEFAULT 'A' COMMENT '	A=Active, D=Deleted',
  `billing_entity` varchar(200) DEFAULT NULL,
  `purchase_order` varchar(300) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `meetings`
--

CREATE TABLE `meetings` (
  `id` int NOT NULL,
  `title` varchar(150) DEFAULT NULL,
  `invite` longtext,
  `date` date DEFAULT NULL,
  `agenda` longtext,
  `location` tinytext,
  `location_map` varchar(100) DEFAULT NULL,
  `location_info` varchar(100) DEFAULT NULL,
  `sendto` varchar(50) DEFAULT NULL,
  `link` varchar(10) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'A',
  `file` varchar(255) DEFAULT NULL,
  `send_email` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mms_admin_privilages`
--

CREATE TABLE `mms_admin_privilages` (
  `id` bigint NOT NULL,
  `privilagename` varchar(256) DEFAULT NULL,
  `value` varchar(50) NOT NULL,
  `status` enum('A','I') NOT NULL DEFAULT 'I'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mms_annual_subscription_invoice`
--

CREATE TABLE `mms_annual_subscription_invoice` (
  `id` int NOT NULL,
  `userid` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `subscription_year` varchar(255) NOT NULL,
  `company_id` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_address` varchar(255) NOT NULL,
  `rep_name` varchar(255) NOT NULL,
  `subscription_type` varchar(255) NOT NULL,
  `subscription_amount` varchar(255) NOT NULL,
  `payment_status` enum('paid','unpaid') NOT NULL DEFAULT 'unpaid',
  `added_by` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mms_attendence`
--

CREATE TABLE `mms_attendence` (
  `atId` int NOT NULL,
  `userid` int NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `company` int NOT NULL,
  `email` varchar(255) NOT NULL,
  `contactno` varchar(100) NOT NULL,
  `pay_method` enum('bacs','cheque') NOT NULL,
  `status` enum('A','I') NOT NULL DEFAULT 'I',
  `comments` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mms_cms`
--

CREATE TABLE `mms_cms` (
  `cmsId` bigint NOT NULL,
  `cmsName` varchar(255) NOT NULL DEFAULT '',
  `content` text,
  `cmsStatus` enum('A','I','D') NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mms_company_subs`
--

CREATE TABLE `mms_company_subs` (
  `cmId` int NOT NULL,
  `cm_cId` int NOT NULL,
  `cm_year` varchar(255) NOT NULL,
  `status` enum('paid','unpaid') NOT NULL DEFAULT 'unpaid',
  `mem_type` enum('Full','Associated') NOT NULL DEFAULT 'Full'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mms_config`
--

CREATE TABLE `mms_config` (
  `config_id` bigint NOT NULL DEFAULT '0',
  `item` varchar(255) DEFAULT NULL,
  `item_value` varchar(255) DEFAULT 'no',
  `metaID` bigint DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mms_country_master`
--

CREATE TABLE `mms_country_master` (
  `country_id` bigint NOT NULL,
  `country_name` varchar(255) DEFAULT NULL,
  `countryISO` varchar(255) DEFAULT NULL,
  `telPrefix` bigint DEFAULT NULL,
  `metaID` bigint DEFAULT '0',
  `status` enum('A','I','D') NOT NULL DEFAULT 'A'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 PACK_KEYS=0;

-- --------------------------------------------------------

--
-- Table structure for table `mms_helpful_info`
--

CREATE TABLE `mms_helpful_info` (
  `hi_id` int NOT NULL,
  `hi_name` varchar(150) NOT NULL DEFAULT '',
  `status` varchar(20) NOT NULL DEFAULT 'A',
  `date` date NOT NULL,
  `hi_link_ref` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mms_member`
--

CREATE TABLE `mms_member` (
  `mId` int NOT NULL,
  `mName` varchar(255) NOT NULL,
  `mCountry` varchar(255) NOT NULL,
  `mState` varchar(255) NOT NULL,
  `mCity` varchar(255) NOT NULL,
  `mAddress` varchar(255) NOT NULL,
  `mEmail` varchar(255) NOT NULL,
  `mCompany` varchar(255) NOT NULL,
  `mContactno` varchar(255) NOT NULL,
  `mDate` date NOT NULL,
  `mStatus` set('A','I','P') NOT NULL DEFAULT 'I',
  `mRepuser` varchar(20) NOT NULL,
  `datalock` varchar(10) NOT NULL DEFAULT 'n',
  `mcId` int NOT NULL,
  `jobTitle` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `fax` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mms_mem_subs`
--

CREATE TABLE `mms_mem_subs` (
  `m_id` int NOT NULL,
  `m_memid` int NOT NULL,
  `m_year` varchar(4) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'A'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `mms_meta`
--

CREATE TABLE `mms_meta` (
  `metaID` bigint NOT NULL,
  `isDeleted` varchar(255) DEFAULT NULL,
  `isPublished` varchar(255) DEFAULT NULL,
  `dateCreated` date DEFAULT NULL,
  `dateModified` date DEFAULT NULL,
  `userModified` varchar(255) DEFAULT NULL,
  `adminModified` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mms_news`
--

CREATE TABLE `mms_news` (
  `n_id` int NOT NULL,
  `n_date` date NOT NULL,
  `n_time` time NOT NULL,
  `n_title` varchar(255) NOT NULL,
  `n_news` varchar(255) NOT NULL,
  `n_status` varchar(255) NOT NULL DEFAULT 'A'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mms_repuser`
--

CREATE TABLE `mms_repuser` (
  `rId` int NOT NULL,
  `rName` varchar(255) NOT NULL,
  `rmId` varchar(20) NOT NULL,
  `rCompany` varchar(255) NOT NULL,
  `rcId` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'A',
  `date` date NOT NULL,
  `datalock` varchar(10) NOT NULL DEFAULT 'n',
  `jobTitle` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contactno` bigint NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(20) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mms_rsvp`
--

CREATE TABLE `mms_rsvp` (
  `m_id` varchar(11) NOT NULL,
  `rId` int NOT NULL,
  `user_id` int NOT NULL,
  `title` text NOT NULL,
  `date` date NOT NULL,
  `cheque_details` longtext NOT NULL,
  `bacs_details` longtext NOT NULL,
  `return_details` longtext NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'A'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mms_subscription_fee`
--

CREATE TABLE `mms_subscription_fee` (
  `id` int NOT NULL,
  `BACS_text` text NOT NULL,
  `cheque_text` text NOT NULL,
  `fee` int NOT NULL,
  `return_text` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mms_sub_year`
--

CREATE TABLE `mms_sub_year` (
  `id` int NOT NULL,
  `year` year DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mms_webmaster`
--

CREATE TABLE `mms_webmaster` (
  `a_id` int NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL DEFAULT '',
  `status` enum('A','I','D') DEFAULT 'I',
  `Email` text,
  `Telephone` varchar(255) DEFAULT NULL,
  `privilages` enum('Super','Normal','admin') NOT NULL DEFAULT 'Normal',
  `metaID` bigint DEFAULT '0',
  `datalock` varchar(10) NOT NULL DEFAULT 'n',
  `date` date NOT NULL,
  `cname` varchar(255) NOT NULL,
  `cId` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `id` int NOT NULL,
  `title` varchar(200) NOT NULL DEFAULT '',
  `text` longtext NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  `sendto` varchar(30) NOT NULL DEFAULT '',
  `link` varchar(10) NOT NULL DEFAULT 'y',
  `date` date NOT NULL,
  `status` enum('A','I','D') NOT NULL DEFAULT 'A'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `presentation_files`
--

CREATE TABLE `presentation_files` (
  `id` int NOT NULL,
  `status` enum('A','I','D') NOT NULL DEFAULT 'A',
  `file` varchar(255) NOT NULL,
  `meeting_id` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `recruitments`
--

CREATE TABLE `recruitments` (
  `id` int NOT NULL,
  `company_id` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `text` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `pdf` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `addd` varchar(2) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `addm` varchar(2) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `addy` varchar(4) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `expd` varchar(2) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `expm` varchar(2) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `expy` varchar(4) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'A',
  `datalock` varchar(10) NOT NULL DEFAULT 'n',
  `mem_type` enum('Full','Associated') NOT NULL DEFAULT 'Full',
  `closeDate` date DEFAULT NULL,
  `othercompany` varchar(255) DEFAULT NULL,
  `prefix` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rsvp_settings`
--

CREATE TABLE `rsvp_settings` (
  `id` int NOT NULL,
  `bacs_text` text NOT NULL,
  `cheque_text` text NOT NULL,
  `fee` int NOT NULL,
  `return_text` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `service_providers`
--

CREATE TABLE `service_providers` (
  `AdId` int NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `des` longtext,
  `url` varchar(100) DEFAULT NULL,
  `ad_file` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subscription_invoice`
--

CREATE TABLE `subscription_invoice` (
  `id` int NOT NULL,
  `userid` varchar(255) DEFAULT NULL,
  `date` date NOT NULL,
  `subscription_year` varchar(255) NOT NULL,
  `company_id` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_address` varchar(255) DEFAULT NULL,
  `rep_name` varchar(255) DEFAULT NULL,
  `subscription_type` varchar(255) NOT NULL,
  `subscription_amount` varchar(255) NOT NULL,
  `payment_status` enum('paid','unpaid') NOT NULL DEFAULT 'unpaid',
  `added_by` int DEFAULT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'A'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `loginId` varchar(255) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `datalock` varchar(255) DEFAULT 'n',
  `status` enum('A','I','D','P') DEFAULT NULL,
  `cId` int DEFAULT NULL,
  `job_title` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `fax` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `rep_member` varchar(20) DEFAULT NULL,
  `company_id` int DEFAULT NULL,
  `company_name` varchar(60) DEFAULT NULL,
  `pwd` varchar(255) DEFAULT NULL,
  `confirmation_code` varchar(50) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `billing_entity` varchar(255) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `activation_code` varchar(50) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `tandc` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users-myone`
--

CREATE TABLE `users-myone` (
  `id` int NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `job_title` varchar(100) NOT NULL,
  `tel` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `company_id` int NOT NULL,
  `rep_member` tinyint(1) NOT NULL DEFAULT '0',
  `type` varchar(20) NOT NULL DEFAULT 'member',
  `activation_code` varchar(50) DEFAULT NULL,
  `confirmation_code` varchar(50) DEFAULT NULL,
  `avatar` varchar(50) DEFAULT NULL,
  `billing_entry` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `weblinks`
--

CREATE TABLE `weblinks` (
  `wId` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `status` enum('A','I','D') NOT NULL DEFAULT 'A'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ad_files`
--
ALTER TABLE `ad_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendees`
--
ALTER TABLE `attendees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendees_bk-16-09-2021`
--
ALTER TABLE `attendees_bk-16-09-2021`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bulletins`
--
ALTER TABLE `bulletins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `prefix` (`prefix`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`dId`);

--
-- Indexes for table `email_templates`
--
ALTER TABLE `email_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meetings`
--
ALTER TABLE `meetings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mms_admin_privilages`
--
ALTER TABLE `mms_admin_privilages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mms_annual_subscription_invoice`
--
ALTER TABLE `mms_annual_subscription_invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mms_attendence`
--
ALTER TABLE `mms_attendence`
  ADD PRIMARY KEY (`atId`);

--
-- Indexes for table `mms_cms`
--
ALTER TABLE `mms_cms`
  ADD PRIMARY KEY (`cmsId`);

--
-- Indexes for table `mms_company_subs`
--
ALTER TABLE `mms_company_subs`
  ADD PRIMARY KEY (`cmId`);

--
-- Indexes for table `mms_config`
--
ALTER TABLE `mms_config`
  ADD PRIMARY KEY (`config_id`);

--
-- Indexes for table `mms_country_master`
--
ALTER TABLE `mms_country_master`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `mms_helpful_info`
--
ALTER TABLE `mms_helpful_info`
  ADD PRIMARY KEY (`hi_id`);

--
-- Indexes for table `mms_member`
--
ALTER TABLE `mms_member`
  ADD PRIMARY KEY (`mId`);

--
-- Indexes for table `mms_mem_subs`
--
ALTER TABLE `mms_mem_subs`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `mms_meta`
--
ALTER TABLE `mms_meta`
  ADD PRIMARY KEY (`metaID`);

--
-- Indexes for table `mms_news`
--
ALTER TABLE `mms_news`
  ADD PRIMARY KEY (`n_id`);

--
-- Indexes for table `mms_repuser`
--
ALTER TABLE `mms_repuser`
  ADD PRIMARY KEY (`rId`);

--
-- Indexes for table `mms_rsvp`
--
ALTER TABLE `mms_rsvp`
  ADD PRIMARY KEY (`rId`);

--
-- Indexes for table `mms_subscription_fee`
--
ALTER TABLE `mms_subscription_fee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mms_sub_year`
--
ALTER TABLE `mms_sub_year`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mms_webmaster`
--
ALTER TABLE `mms_webmaster`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `presentation_files`
--
ALTER TABLE `presentation_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recruitments`
--
ALTER TABLE `recruitments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rsvp_settings`
--
ALTER TABLE `rsvp_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_providers`
--
ALTER TABLE `service_providers`
  ADD PRIMARY KEY (`AdId`);

--
-- Indexes for table `subscription_invoice`
--
ALTER TABLE `subscription_invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users-myone`
--
ALTER TABLE `users-myone`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `weblinks`
--
ALTER TABLE `weblinks`
  ADD PRIMARY KEY (`wId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ad_files`
--
ALTER TABLE `ad_files`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attendees`
--
ALTER TABLE `attendees`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attendees_bk-16-09-2021`
--
ALTER TABLE `attendees_bk-16-09-2021`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bulletins`
--
ALTER TABLE `bulletins`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `dId` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `email_templates`
--
ALTER TABLE `email_templates`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice_details`
--
ALTER TABLE `invoice_details`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `meetings`
--
ALTER TABLE `meetings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mms_admin_privilages`
--
ALTER TABLE `mms_admin_privilages`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mms_annual_subscription_invoice`
--
ALTER TABLE `mms_annual_subscription_invoice`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mms_attendence`
--
ALTER TABLE `mms_attendence`
  MODIFY `atId` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mms_cms`
--
ALTER TABLE `mms_cms`
  MODIFY `cmsId` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mms_company_subs`
--
ALTER TABLE `mms_company_subs`
  MODIFY `cmId` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mms_country_master`
--
ALTER TABLE `mms_country_master`
  MODIFY `country_id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mms_helpful_info`
--
ALTER TABLE `mms_helpful_info`
  MODIFY `hi_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mms_member`
--
ALTER TABLE `mms_member`
  MODIFY `mId` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mms_mem_subs`
--
ALTER TABLE `mms_mem_subs`
  MODIFY `m_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mms_meta`
--
ALTER TABLE `mms_meta`
  MODIFY `metaID` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mms_news`
--
ALTER TABLE `mms_news`
  MODIFY `n_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mms_repuser`
--
ALTER TABLE `mms_repuser`
  MODIFY `rId` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mms_rsvp`
--
ALTER TABLE `mms_rsvp`
  MODIFY `rId` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mms_subscription_fee`
--
ALTER TABLE `mms_subscription_fee`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mms_sub_year`
--
ALTER TABLE `mms_sub_year`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mms_webmaster`
--
ALTER TABLE `mms_webmaster`
  MODIFY `a_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `presentation_files`
--
ALTER TABLE `presentation_files`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `recruitments`
--
ALTER TABLE `recruitments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rsvp_settings`
--
ALTER TABLE `rsvp_settings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service_providers`
--
ALTER TABLE `service_providers`
  MODIFY `AdId` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscription_invoice`
--
ALTER TABLE `subscription_invoice`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users-myone`
--
ALTER TABLE `users-myone`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `weblinks`
--
ALTER TABLE `weblinks`
  MODIFY `wId` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
