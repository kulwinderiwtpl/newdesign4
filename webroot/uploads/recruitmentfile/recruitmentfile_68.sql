-- phpMyAdmin SQL Dump
-- version 2.11.3deb1ubuntu1.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 09, 2009 at 11:04 AM
-- Server version: 5.0.51
-- PHP Version: 5.2.4-2ubuntu5.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `coffee`
--

-- --------------------------------------------------------

--
-- Table structure for table `coff_cart`
--

DROP TABLE IF EXISTS `coff_cart`;
CREATE TABLE IF NOT EXISTS `coff_cart` (
  `ct_id` int(10) unsigned NOT NULL auto_increment,
  `pd_id` int(10) unsigned NOT NULL default '0',
  `ct_qty` mediumint(8) unsigned NOT NULL default '1',
  `ct_session_id` char(32) NOT NULL default '',
  `ct_date` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`ct_id`),
  KEY `pd_id` (`pd_id`),
  KEY `ct_session_id` (`ct_session_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=123 ;

--
-- Dumping data for table `coff_cart`
--


-- --------------------------------------------------------

--
-- Table structure for table `coff_category`
--

DROP TABLE IF EXISTS `coff_category`;
CREATE TABLE IF NOT EXISTS `coff_category` (
  `cat_id` int(10) unsigned NOT NULL auto_increment,
  `cat_parent_id` int(11) NOT NULL default '0',
  `cat_name` varchar(50) NOT NULL default '',
  `cat_description` text NOT NULL,
  `cat_image` varchar(255) default NULL,
  `categoryStatus` enum('A','I','D') NOT NULL default 'A',
  PRIMARY KEY  (`cat_id`),
  KEY `cat_parent_id` (`cat_parent_id`),
  KEY `cat_name` (`cat_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=63 ;

--
-- Dumping data for table `coff_category`
--


-- --------------------------------------------------------

--
-- Table structure for table `coff_cms`
--

DROP TABLE IF EXISTS `coff_cms`;
CREATE TABLE IF NOT EXISTS `coff_cms` (
  `cmsId` bigint(255) NOT NULL auto_increment,
  `pCatId` bigint(255) NOT NULL default '0',
  `cmsName` varchar(255) NOT NULL default '',
  `content` longtext,
  `cmsStatus` enum('A','I','D') default 'A',
  PRIMARY KEY  (`cmsId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `coff_cms`
--

INSERT INTO `coff_cms` (`cmsId`, `pCatId`, `cmsName`, `content`, `cmsStatus`) VALUES
(1, 0, 'About Us', '<p><span>Coffee House is a Europe based online pharmacy that offers popular medications like Xenical (orlistat), Dostinex (cabergoline), Ro-Accutane (isotretinoin), Tamiflu, and many more to the whole world customers. <br />\r\nOur prices are VERY competitive! The cheapest you can find in most cases! Also keep in mind that we charge ZERO shipment fee for orders $150 and above! <br />\r\nYou will not be billed for anything else except the items your are purchasing, no consultation fee, or hidden fees whatsoever! Please make sure you read our disclaimer before placing an order.</span></p>', 'A'),
(2, 0, 'Buy Coffee', '<p><span style=\\"color: rgb(128, 128, 128);\\"><span style=\\"font-size: x-large;\\">Our</span></span><span style=\\"font-size: x-large;\\"> <span style=\\"color: rgb(204, 51, 0);\\">Services</span></span><br />\r\n&nbsp;</p>\r\n<hr />\r\n<p style=\\"text-align: justify;\\"><br />\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages.<br />\r\n&nbsp;</p>\r\n<p style=\\"text-align: justify;\\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages.<br />\r\n&nbsp;</p>\r\n<p style=\\"text-align: justify;\\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages.</p>', 'A'),
(3, 0, 'Wholesale Coffee', '<p><span style=\\"color: rgb(128, 128, 128);\\"><span style=\\"font-size: x-large;\\">Refund</span></span><span style=\\"font-size: x-large;\\"> <span style=\\"color: rgb(204, 51, 0);\\">Policy</span></span><br />\r\n&nbsp;</p>\r\n<hr />\r\n<p style=\\"text-align: justify;\\"><br />\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages.<br />\r\n&nbsp;</p>\r\n<p style=\\"text-align: justify;\\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages.<br />\r\n&nbsp;</p>\r\n<p style=\\"text-align: justify;\\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages.</p>\r\n<p>&nbsp;</p>', 'A'),
(4, 0, 'Coffee Education', '<p><span style=\\"color: rgb(128, 128, 128);\\"><span style=\\"font-size: x-large;\\">Privacy</span></span><span style=\\"font-size: x-large;\\"> <span style=\\"color: rgb(204, 51, 0);\\">Policy</span></span><br />\r\n&nbsp;</p>\r\n<hr />\r\n<p style=\\"text-align: justify;\\"><br />\r\nYour privacy is important to us. To better protect your privacy we provide this notice explaining our online information practices and the choices you can make about the way your information is collected and used. To make this notice easy to find, we make it available on our homepage and at every point where personally identifiable information may be requested.\r\nAurapharm.com recognizes your right to confidentiality and has a firm commitment to ensuring your privacy. This recognition guides every decision we make about how, where, and when to collect information. The personal information we do collect allows us to provide you with an exemplary shopping and ordering experience. The information you share with Aurapharm.com is kept strictly confidential and fully secure. Aurapharm.com will never sell, distribute, or otherwise misuse this information. If you have any questions or concerns about this statement, or about the way your information is collected and used, please <br />\r\n&nbsp;</p>', 'A'),
(5, 0, 'Coffee Stores', '<p><span style=\\"color: rgb(128, 128, 128);\\"><span style=\\"font-size: x-large;\\">Disclaimer</span></span><br />\r\n&nbsp;</p>\r\n<hr />\r\n<p style=\\"text-align: justify;\\"><br />\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages.<br />\r\n&nbsp;</p>\r\n<p style=\\"text-align: justify;\\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages.<br />\r\n&nbsp;</p>\r\n<p style=\\"text-align: justify;\\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages.</p>\r\n<p>&nbsp;</p>', 'A'),
(6, 0, 'Contact Us', '<p><span style=\\"color: rgb(128, 128, 128);\\"><span style=\\"font-size: x-large;\\">Contact</span></span><span style=\\"font-size: x-large;\\"> <span style=\\"color: rgb(204, 51, 0);\\">Us</span></span><br />\r\n&nbsp;</p>\r\n<hr />\r\n<p style=\\"text-align: justify;\\"><br />\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages.<br />\r\n&nbsp;</p>\r\n<p style=\\"text-align: justify;\\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages.<br />\r\n&nbsp;</p>\r\n<p style=\\"text-align: justify;\\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages.</p>', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `coff_country_master`
--

DROP TABLE IF EXISTS `coff_country_master`;
CREATE TABLE IF NOT EXISTS `coff_country_master` (
  `country_id` bigint(20) NOT NULL auto_increment,
  `country_abbreviation` varchar(10) default NULL,
  `country_name` varchar(255) NOT NULL default '',
  `status` enum('A','I') default 'A',
  `siteID` bigint(255) default '1',
  PRIMARY KEY  (`country_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 PACK_KEYS=0 AUTO_INCREMENT=243 ;

--
-- Dumping data for table `coff_country_master`
--

INSERT INTO `coff_country_master` (`country_id`, `country_abbreviation`, `country_name`, `status`, `siteID`) VALUES
(105, 'AD', 'ANDORRA', 'A', 1),
(2, 'AE', 'UNITED ARAB EMIRATES', 'A', 1),
(3, 'AF', 'AFGHANISTAN', 'A', 1),
(4, 'AG', 'ANTIGUA AND BARBUDA', 'A', 1),
(5, 'AI', 'ANGUILLA', 'A', 1),
(6, 'AL', 'ALBANIA', 'A', 1),
(7, 'AM', 'ARMENIA', 'A', 1),
(8, 'AN', 'NETHERLANDS ANTILLES', 'A', 1),
(100, 'AO', 'ANGOLA', 'A', 1),
(10, 'AQ', 'ANTARCTICA', 'A', 1),
(11, 'AR', 'ARGENTINA', 'A', 1),
(12, 'AS', 'AMERICAN SAMOA', 'A', 1),
(13, 'AT', 'AUSTRIA', 'A', 1),
(14, 'AU', 'AUSTRALIA', 'A', 1),
(15, 'AW', 'ARUBA', 'A', 1),
(16, 'AZ', 'AZERBAIJAN', 'A', 1),
(17, 'BA', 'BOSNIA AND HERZEGOVINA', 'A', 1),
(18, 'BB', 'BARBADOS', 'A', 1),
(19, 'BD', 'BANGLADESH', 'A', 1),
(20, 'BE', 'BELGIUM', 'A', 1),
(21, 'BF', 'BURKINA FASO', 'A', 1),
(22, 'BG', 'BULGARIA', 'A', 1),
(23, 'BH', 'BAHRAIN', 'A', 1),
(24, 'BI', 'BURUNDI', 'A', 1),
(25, 'BJ', 'BENIN', 'A', 1),
(26, 'BM', 'BERMUDA', 'A', 1),
(27, 'BN', 'BRUNEI DARUSSALAM', 'A', 1),
(28, 'BO', 'BOLIVIA', 'A', 1),
(29, 'BR', 'BRAZIL', 'A', 1),
(30, 'BS', 'BAHAMAS', 'A', 1),
(31, 'BT', 'BHUTAN', 'A', 1),
(32, 'BV', 'BOUVET ISLAND', 'A', 1),
(33, 'BW', 'BOTSWANA', 'A', 1),
(34, 'BY', 'BELARUS', 'A', 1),
(35, 'BZ', 'BELIZE', 'A', 1),
(38, 'CA', 'CANADA', 'A', 1),
(37, 'CC', 'COCOS (KEELING) ISLANDS', 'A', 1),
(36, 'CD', 'CONGO', 'A', 1),
(39, 'CF', 'CENTRAL AFRICAN REPUBLIC', 'A', 1),
(40, 'CG', 'CONGO', 'A', 1),
(41, 'CH', 'SWITZERLAND', 'A', 1),
(42, 'CI', 'COTE D''IVOIRE', 'A', 1),
(43, 'CK', 'COOK ISLANDS', 'A', 1),
(44, 'CL', 'CHILE', 'A', 1),
(45, 'CM', 'CAMEROON', 'A', 1),
(46, 'CN', 'CHINA', 'A', 1),
(47, 'CO', 'COLOMBIA', 'A', 1),
(48, 'CR', 'COSTA RICA', 'A', 1),
(49, 'CU', 'CUBA', 'A', 1),
(50, 'CV', 'CAPE VERDE', 'A', 1),
(51, 'CX', 'CHRISTMAS ISLAND', 'A', 1),
(52, 'CY', 'CYPRUS', 'A', 1),
(53, 'CZ', 'CZECH REPUBLIC', 'A', 1),
(54, 'DE', 'GERMANY', 'A', 1),
(55, 'DJ', 'DJIBOUTI', 'A', 1),
(56, 'DK', 'DENMARK', 'A', 1),
(57, 'DM', 'DOMINICA', 'A', 1),
(58, 'DO', 'DOMINICAN REPUBLIC', 'A', 1),
(59, 'DZ', 'ALGERIA', 'A', 1),
(60, 'EC', 'ECUADOR', 'A', 1),
(61, 'EE', 'ESTONIA', 'A', 1),
(62, 'EG', 'EGYPT', 'A', 1),
(63, 'EH', 'WESTERN SAHARA', 'A', 1),
(64, 'ER', 'ERITREA', 'A', 1),
(65, 'ES', 'SPAIN', 'A', 1),
(66, 'ET', 'ETHIOPIA', 'A', 1),
(67, 'FI', 'FINLAND', 'A', 1),
(68, 'FJ', 'FIJI', 'A', 1),
(69, 'FK', 'FALKLAND ISLANDS (MALVINAS)', 'A', 1),
(70, 'FM', 'MICRONESIA, FEDERATED STATES OF', 'A', 1),
(71, 'FO', 'FAROE ISLANDS', 'A', 1),
(72, 'FR', 'FRANCE', 'A', 1),
(73, 'GA', 'GABON', 'A', 1),
(74, 'UK', 'UNITED KINGDOM', 'A', 1),
(75, 'GD', 'GRENADA', 'A', 1),
(76, 'GE', 'GEORGIA', 'A', 1),
(77, 'GF', 'FRENCH GUIANA', 'A', 1),
(78, 'GH', 'GHANA', 'A', 1),
(79, 'GI', 'GIBRALTAR', 'A', 1),
(80, 'GL', 'GREENLAND', 'A', 1),
(81, 'GM', 'GAMBIA', 'A', 1),
(82, 'GN', 'GUINEA', 'A', 1),
(83, 'GP', 'GUADELOUPE', 'A', 1),
(84, 'GQ', 'EQUATORIAL GUINEA', 'A', 1),
(85, 'GR', 'GREECE', 'A', 1),
(86, 'GS', 'SOUTH GEORGIA', 'A', 1),
(87, 'GT', 'GUATEMALA', 'A', 1),
(88, 'GU', 'GUAM', 'A', 1),
(89, 'GW', 'GUINEA-BISSAU', 'A', 1),
(90, 'GY', 'GUYANA', 'A', 1),
(91, 'HK', 'HONG KONG', 'A', 1),
(92, 'HM', 'HEARD ISLAND AND MCDONALD ISLANDS', 'A', 1),
(93, 'HN', 'HONDURAS', 'A', 1),
(94, 'HR', 'CROATIA', 'A', 1),
(95, 'HT', 'HAITI', 'A', 1),
(96, 'HU', 'HUNGARY', 'A', 1),
(97, 'ID', 'INDONESIA', 'A', 1),
(98, 'IE', 'IRELAND', 'A', 1),
(99, 'IL', 'ISRAEL', 'A', 1),
(1, 'IN', 'INDIA', 'A', 1),
(101, 'IO', 'BRITISH INDIAN OCEAN TERRITORY', 'A', 1),
(102, 'IQ', 'IRAQ', 'A', 1),
(103, 'IR', 'IRAN, ISLAMIC REPUBLIC OF', 'A', 1),
(104, 'IS', 'ICELAND', 'A', 1),
(9, 'IT', 'ITALY', 'A', 1),
(106, 'JM', 'JAMAICA', 'A', 1),
(107, 'JO', 'JORDAN', 'A', 1),
(108, 'JP', 'JAPAN', 'A', 1),
(109, 'KE', 'KENYA', 'A', 1),
(110, 'KG', 'KYRGYZSTAN', 'A', 1),
(111, 'KH', 'CAMBODIA', 'A', 1),
(112, 'KI', 'KIRIBATI', 'A', 1),
(113, 'KM', 'COMOROS', 'A', 1),
(114, 'KN', 'SAINT KITTS AND NEVIS', 'A', 1),
(115, 'KP', 'KOREA, DEMOCRATIC PEOPLE''S REPUBLIC', 'A', 1),
(116, 'KR', 'KOREA, REPUBLIC OF', 'A', 1),
(117, 'KW', 'KUWAIT', 'A', 1),
(118, 'KY', 'CAYMAN ISLANDS', 'A', 1),
(119, 'KZ', 'KAZAKSTAN', 'A', 1),
(120, 'LA', 'LAO PEOPLE''S DEMOCRATIC REPUBLIC', 'A', 1),
(121, 'LB', 'LEBANON', 'A', 1),
(122, 'LC', 'SAINT LUCIA', 'A', 1),
(123, 'LI', 'LIECHTENSTEIN', 'A', 1),
(124, 'LK', 'SRI LANKA', 'A', 1),
(125, 'LR', 'LIBERIA', 'A', 1),
(126, 'LS', 'LESOTHO', 'A', 1),
(127, 'LT', 'LITHUANIA', 'A', 1),
(128, 'LU', 'LUXEMBOURG', 'A', 1),
(129, 'LV', 'LATVIA', 'A', 1),
(130, 'LY', 'LIBYAN ARAB JAMAHIRIYA', 'A', 1),
(131, 'MA', 'MOROCCO', 'A', 1),
(132, 'MC', 'MONACO', 'A', 1),
(133, 'MD', 'MOLDOVA, REPUBLIC OF', 'A', 1),
(134, 'MG', 'MADAGASCAR', 'A', 1),
(135, 'MH', 'MARSHALL ISLANDS', 'A', 1),
(136, 'MK', 'MACEDONIA', 'A', 1),
(137, 'ML', 'MALI', 'A', 1),
(138, 'MM', 'MYANMAR', 'A', 1),
(139, 'MN', 'MONGOLIA', 'A', 1),
(140, 'MO', 'MACAU', 'A', 1),
(141, 'MP', 'NORTHERN MARIANA ISLANDS', 'A', 1),
(142, 'MQ', 'MARTINIQUE', 'A', 1),
(143, 'MR', 'MAURITANIA', 'A', 1),
(144, 'MS', 'MONTSERRAT', 'A', 1),
(145, 'MT', 'MALTA', 'A', 1),
(146, 'MU', 'MAURITIUS', 'A', 1),
(147, 'MV', 'MALDIVES', 'A', 1),
(148, 'MW', 'MALAWI', 'A', 1),
(149, 'MX', 'MEXICO', 'A', 1),
(150, 'MY', 'MALAYSIA', 'A', 1),
(151, 'MZ', 'MOZAMBIQUE', 'A', 1),
(152, 'NA', 'NAMIBIA', 'A', 1),
(153, 'NC', 'NEW CALEDONIA', 'A', 1),
(154, 'NE', 'NIGER', 'A', 1),
(155, 'NF', 'NORFOLK ISLAND', 'A', 1),
(156, 'NG', 'NIGERIA', 'A', 1),
(157, 'NI', 'NICARAGUA', 'A', 1),
(158, 'NL', 'NETHERLANDS', 'A', 1),
(159, 'NO', 'NORWAY', 'A', 1),
(160, 'NP', 'NEPAL', 'A', 1),
(161, 'NR', 'NAURU', 'A', 1),
(162, 'NU', 'NIUE', 'A', 1),
(163, 'NZ', 'NEW ZEALAND', 'A', 1),
(164, 'OM', 'OMAN', 'A', 1),
(165, 'PA', 'PANAMA', 'A', 1),
(166, 'PE', 'PERU', 'A', 1),
(167, 'PF', 'FRENCH POLYNESIA', 'A', 1),
(168, 'PG', 'PAPUA NEW GUINEA', 'A', 1),
(169, 'PH', 'PHILIPPINES', 'A', 1),
(170, 'PK', 'PAKISTAN', 'A', 1),
(171, 'PL', 'POLAND', 'A', 1),
(172, 'PM', 'SAINT PIERRE AND MIQUELON', 'A', 1),
(173, 'PN', 'PITCAIRN', 'A', 1),
(174, 'PR', 'PUERTO RICO', 'A', 1),
(175, 'PS', 'PALESTINIAN TERRITORY, OCCUPIED', 'A', 1),
(176, 'PT', 'PORTUGAL', 'A', 1),
(177, 'PW', 'PALAU', 'A', 1),
(178, 'PY', 'PARAGUAY', 'A', 1),
(179, 'QA', 'QATAR', 'A', 1),
(180, 'RE', 'RÉUNION', 'A', 1),
(181, 'RO', 'ROMANIA', 'A', 1),
(182, 'RU', 'RUSSIAN FEDERATION', 'A', 1),
(183, 'RW', 'RWANDA', 'A', 1),
(184, 'SA', 'SAUDI ARABIA', 'A', 1),
(185, 'SB', 'SOLOMON ISLANDS', 'A', 1),
(186, 'SC', 'SEYCHELLES', 'A', 1),
(187, 'SD', 'SUDAN', 'A', 1),
(188, 'SE', 'SWEDEN', 'A', 1),
(189, 'SG', 'SINGAPORE', 'A', 1),
(190, 'SH', 'SAINT HELENA', 'A', 1),
(191, 'SI', 'SLOVENIA', 'A', 1),
(192, 'SJ', 'SVALBARD AND JAN MAYEN', 'A', 1),
(193, 'SK', 'SLOVAKIA', 'A', 1),
(194, 'SL', 'SIERRA LEONE', 'A', 1),
(195, 'SM', 'SAN MARINO', 'A', 1),
(196, 'SN', 'SENEGAL', 'A', 1),
(197, 'SO', 'SOMALIA', 'A', 1),
(198, 'SR', 'SURINAME', 'A', 1),
(199, 'ST', 'SAO TOME AND PRINCIPE', 'A', 1),
(200, 'SV', 'EL SALVADOR', 'A', 1),
(201, 'SY', 'SYRIAN ARAB REPUBLIC', 'A', 1),
(202, 'SZ', 'SWAZILAND', 'A', 1),
(203, 'TC', 'TURKS AND CAICOS ISLANDS', 'A', 1),
(204, 'TD', 'CHAD', 'A', 1),
(205, 'TF', 'FRENCH SOUTHERN TERRITORIES', 'A', 1),
(206, 'TG', 'TOGO', 'A', 1),
(207, 'TH', 'THAILAND', 'A', 1),
(208, 'TJ', 'TAJIKISTAN', 'A', 1),
(209, 'TK', 'TOKELAU', 'A', 1),
(210, 'TM', 'TURKMENISTAN', 'A', 1),
(211, 'TN', 'TUNISIA', 'A', 1),
(212, 'TO', 'TONGA', 'A', 1),
(213, 'TP', 'EAST TIMOR', 'A', 1),
(214, 'TR', 'TURKEY', 'A', 1),
(215, 'TT', 'TRINIDAD AND TOBAGO', 'A', 1),
(216, 'TV', 'TUVALU', 'A', 1),
(217, 'TW', 'TAIWAN, PROVINCE OF CHINA', 'A', 1),
(218, 'TZ', 'TANZANIA, UNITED REPUBLIC OF', 'A', 1),
(219, 'UA', 'UKRAINE', 'A', 1),
(222, 'UG', 'UGANDA', 'A', 1),
(221, 'UM', 'UNITED STATES MINOR ISLANDS', 'A', 1),
(220, 'US', 'USA', 'A', 1),
(223, 'UY', 'URUGUAY', 'A', 1),
(224, 'UZ', 'UZBEKISTAN', 'A', 1),
(225, 'VA', 'HOLY SEE (VATICAN CITY STATE)', 'A', 1),
(226, 'VC', 'SAINT VINCENT AND THE GRENADINES', 'A', 1),
(227, 'VE', 'VENEZUELA', 'A', 1),
(228, 'VG', 'VIRGIN ISLANDS, BRITISH', 'A', 1),
(229, 'VI', 'VIRGIN ISLANDS, U.S.', 'A', 1),
(230, 'VN', 'VIETNAM', 'A', 1),
(231, 'VU', 'VANUATU', 'A', 1),
(232, 'WF', 'WALLIS AND FUTUNA', 'A', 1),
(233, 'WS', 'SAMOA', 'A', 1),
(234, 'YE', 'YEMEN', 'A', 1),
(235, 'YT', 'MAYOTTE', 'A', 1),
(236, 'YU', 'YUGOSLAVIA', 'A', 1),
(237, 'ZA', 'SOUTH AFRICA', 'A', 1),
(238, 'ZM', 'ZAMBIA', 'A', 1),
(239, 'ZW', 'ZIMBABWE', 'A', 1),
(240, 'UK-2', 'UNITED KINGDOM  2', 'A', 1),
(0, 'ALL', 'ALL COUNTRY', 'A', 1);

-- --------------------------------------------------------

--
-- Table structure for table `coff_currency`
--

DROP TABLE IF EXISTS `coff_currency`;
CREATE TABLE IF NOT EXISTS `coff_currency` (
  `cy_id` int(10) unsigned NOT NULL auto_increment,
  `cy_code` char(3) NOT NULL default '',
  `cy_symbol` varchar(8) NOT NULL default '',
  PRIMARY KEY  (`cy_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `coff_currency`
--

INSERT INTO `coff_currency` (`cy_id`, `cy_code`, `cy_symbol`) VALUES
(1, 'EUR', '&#8364;'),
(2, 'GBP', '&pound;'),
(3, 'JPY', '&yen;'),
(4, 'USD', '$');

-- --------------------------------------------------------

--
-- Table structure for table `coff_news`
--

DROP TABLE IF EXISTS `coff_news`;
CREATE TABLE IF NOT EXISTS `coff_news` (
  `newsId` int(10) NOT NULL auto_increment,
  `newsContent` text NOT NULL,
  `newsDate` varchar(255) NOT NULL,
  `newsStatus` enum('A','I','D') NOT NULL default 'A',
  PRIMARY KEY  (`newsId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `coff_news`
--


-- --------------------------------------------------------

--
-- Table structure for table `coff_order`
--

DROP TABLE IF EXISTS `coff_order`;
CREATE TABLE IF NOT EXISTS `coff_order` (
  `od_id` int(10) unsigned NOT NULL auto_increment,
  `od_date` date default '0000-00-00',
  `od_last_update` datetime NOT NULL default '0000-00-00 00:00:00',
  `od_status` enum('New','Paid','Shipped','Completed','Cancelled') NOT NULL default 'New',
  `od_memo` varchar(255) NOT NULL,
  `od_user_name` varchar(20) NOT NULL,
  `od_shipping_first_name` varchar(50) NOT NULL default '',
  `od_shipping_last_name` varchar(50) NOT NULL default '',
  `od_shipping_address1` varchar(100) NOT NULL default '',
  `od_shipping_address2` varchar(100) NOT NULL default '',
  `od_shipping_phone` varchar(32) NOT NULL default '',
  `od_shipping_city` varchar(100) NOT NULL default '',
  `od_shipping_state` varchar(32) NOT NULL default '',
  `od_shipping_country_id` bigint(20) NOT NULL,
  `od_shipping_postal_code` varchar(10) NOT NULL default '',
  `od_shipping_cost` decimal(5,2) default '0.00',
  `od_payment_first_name` varchar(50) NOT NULL default '',
  `od_payment_last_name` varchar(50) NOT NULL default '',
  `od_payment_address1` varchar(100) NOT NULL default '',
  `od_payment_address2` varchar(100) NOT NULL default '',
  `od_payment_phone` varchar(32) NOT NULL default '',
  `od_payment_city` varchar(100) NOT NULL default '',
  `od_payment_state` varchar(32) NOT NULL default '',
  `od_payment_country_id` bigint(20) NOT NULL,
  `od_payment_postal_code` varchar(10) NOT NULL default '',
  PRIMARY KEY  (`od_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1033 ;

--
-- Dumping data for table `coff_order`
--


-- --------------------------------------------------------

--
-- Table structure for table `coff_order_item`
--

DROP TABLE IF EXISTS `coff_order_item`;
CREATE TABLE IF NOT EXISTS `coff_order_item` (
  `od_id` int(10) unsigned NOT NULL default '0',
  `pd_id` int(10) unsigned NOT NULL default '0',
  `od_qty` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`od_id`,`pd_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coff_order_item`
--


-- --------------------------------------------------------

--
-- Table structure for table `coff_product`
--

DROP TABLE IF EXISTS `coff_product`;
CREATE TABLE IF NOT EXISTS `coff_product` (
  `pd_id` int(10) unsigned NOT NULL auto_increment,
  `cat_id` int(10) unsigned NOT NULL default '0',
  `pd_name` varchar(100) NOT NULL default '',
  `pd_description` text NOT NULL,
  `pd_price` decimal(10,2) NOT NULL default '0.00',
  `pd_qty` bigint(255) unsigned NOT NULL default '0',
  `pd_abs` varchar(255) default NULL,
  `pd_image` varchar(200) default NULL,
  `pd_thumbnail` varchar(200) default NULL,
  `pd_date` datetime NOT NULL default '0000-00-00 00:00:00',
  `pd_last_update` datetime NOT NULL default '0000-00-00 00:00:00',
  `pd_featured` enum('A','I') NOT NULL default 'I',
  `pd_status` enum('A','I','D') NOT NULL default 'A',
  PRIMARY KEY  (`pd_id`),
  KEY `cat_id` (`cat_id`),
  KEY `pd_name` (`pd_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Dumping data for table `coff_product`
--


-- --------------------------------------------------------

--
-- Table structure for table `coff_search`
--

DROP TABLE IF EXISTS `coff_search`;
CREATE TABLE IF NOT EXISTS `coff_search` (
  `search_id` int(10) NOT NULL auto_increment,
  `session_id` char(32) NOT NULL,
  `search_key` varchar(255) default NULL,
  `cat_id` int(10) NOT NULL default '0',
  `date` date NOT NULL default '0000-00-00',
  PRIMARY KEY  (`search_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `coff_search`
--


-- --------------------------------------------------------

--
-- Table structure for table `coff_shop_config`
--

DROP TABLE IF EXISTS `coff_shop_config`;
CREATE TABLE IF NOT EXISTS `coff_shop_config` (
  `sc_id` int(11) NOT NULL,
  `sc_name` varchar(50) NOT NULL default '',
  `sc_address` varchar(100) NOT NULL default '',
  `sc_phone` varchar(30) NOT NULL default '',
  `sc_email` varchar(30) NOT NULL default '',
  `sc_shipping_cost` decimal(10,2) NOT NULL default '0.00',
  `sc_free_shipping_limit` decimal(10,2) NOT NULL default '0.00',
  `sc_currency` int(10) unsigned NOT NULL default '1',
  `sc_order_email` enum('y','n') NOT NULL default 'n',
  PRIMARY KEY  (`sc_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coff_shop_config`
--


-- --------------------------------------------------------

--
-- Table structure for table `coff_user`
--

DROP TABLE IF EXISTS `coff_user`;
CREATE TABLE IF NOT EXISTS `coff_user` (
  `user_id` int(10) unsigned NOT NULL auto_increment,
  `user_name` varchar(20) NOT NULL default '',
  `user_password` varchar(32) NOT NULL default '',
  `user_first_name` varchar(50) NOT NULL,
  `user_last_name` varchar(50) NOT NULL,
  `user_shipping_address1` varchar(100) NOT NULL,
  `user_shipping_address2` varchar(100) NOT NULL,
  `user_phone` varchar(32) NOT NULL,
  `user_city` varchar(100) NOT NULL,
  `user_state` varchar(32) NOT NULL,
  `user_country_id` bigint(20) NOT NULL,
  `user_postal_code` varchar(10) NOT NULL,
  `user_regdate` datetime NOT NULL default '0000-00-00 00:00:00',
  `user_ip` varchar(255) NOT NULL,
  `user_last_login` datetime NOT NULL default '0000-00-00 00:00:00',
  `user_status` enum('A','I','D') NOT NULL default 'A',
  PRIMARY KEY  (`user_id`),
  UNIQUE KEY `user_name` (`user_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `coff_user`
--


-- --------------------------------------------------------

--
-- Table structure for table `coff_webmaster`
--

DROP TABLE IF EXISTS `coff_webmaster`;
CREATE TABLE IF NOT EXISTS `coff_webmaster` (
  `a_id` int(11) NOT NULL auto_increment,
  `user_name` varchar(255) default NULL,
  `user_pass` varchar(255) default NULL,
  `siteCityId` int(11) default '1',
  `siteID` bigint(255) default '1',
  PRIMARY KEY  (`a_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `coff_webmaster`
--

INSERT INTO `coff_webmaster` (`a_id`, `user_name`, `user_pass`, `siteCityId`, `siteID`) VALUES
(1, 'admin', 'TVRJeg', 1, 0),
(2, 'adminlocri', 'TVRJeg', 2, 0),
(3, 'adminsiderno', 'TVRJek5EVT0', 3, 0);
