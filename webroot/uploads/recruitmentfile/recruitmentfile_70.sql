-- phpMyAdmin SQL Dump
-- version 2.11.3deb1ubuntu1.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 12, 2009 at 02:55 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.4-2ubuntu5.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `member_manage_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `mms_admin_privilages`
--

CREATE TABLE IF NOT EXISTS `mms_admin_privilages` (
  `id` bigint(250) NOT NULL auto_increment,
  `privilagename` varchar(256) default NULL,
  `value` varchar(50) NOT NULL,
  `status` enum('A','I') NOT NULL default 'I',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `mms_admin_privilages`
--

INSERT INTO `mms_admin_privilages` (`id`, `privilagename`, `value`, `status`) VALUES
(1, 'changepassword', 'changepass', 'I'),
(2, 'systeminformation', 'sysinfo', 'I'),
(3, 'siteinformation', 'siteifno', 'I'),
(4, 'adminmanager', 'adminmanagement', 'I');

-- --------------------------------------------------------

--
-- Table structure for table `mms_cms`
--

CREATE TABLE IF NOT EXISTS `mms_cms` (
  `cmsId` bigint(255) NOT NULL auto_increment,
  `cmsName` varchar(255) NOT NULL default '',
  `content` text,
  `cmsStatus` enum('A','I','D') NOT NULL default 'A',
  PRIMARY KEY  (`cmsId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `mms_cms`
--

INSERT INTO `mms_cms` (`cmsId`, `cmsName`, `content`, `cmsStatus`) VALUES
(1, 'place_ad', '  Gerace is perched 400mt above sea level. Known as the Ã¯Â¿Â½Florence of the southÃ¯Â¿Â½ it is just 15mins away from the white sandy beaches of the Ionian Sea, the remains of Locri Epizephiri and the Magna Grecia colony. In Gerace you can breath a medieval atmosphere, with itÃ¯Â¿Â½s lanes, the impressive Roman-Norman Cathedral (one of the greatest works of art in Europe), many Churches. All this is what makes Gerace unique. Gerace itself has been inhabited for thousands of years, but from the 9th century it became the city you see now. Step back a 1000 years in time and relive the lifestyle and culture of one of ItalyÃ¯Â¿Â½s best kept secrets.<br />\r\n<br />\r\nGerace Ã¯Â¿Â½ stata definita Ã¯Â¿Â½La Firenze Del sudÃ¯Â¿Â½. Situata a 400mt sul livello del mare Ã¯Â¿Â½ solo a 15 minuti di macchina dalla meravigliosa costa Ionica e da Locri Epizephiri antica colonia della Magna Grecia. A gerace si respira unÃ¯Â¿Â½atmosfera medievale.Suggestive stradine unÃ¯Â¿Â½imponente Cattedrale Romanico - Normanna (uno dei capolavori dellÃ¯Â¿Â½arte Europea), le tante chiese ed i resti di un castello Normanno contribuiscono a renderla unica. La cittadina Ã¯Â¿Â½ stata abitata per migliaia di anni ma dal 9 secolo Ã¯Â¿Â½ divenuta la cittÃ¯Â¿Â½ che si puÃ¯Â¿Â½ visitare oggi. Tornate indietro nel tempo e visitate una delle cittadine piÃ¯Â¿Â½ belle dellÃ¯Â¿Â½Italia del sud.               ', 'A'),
(2, 'aboutus', 'Dublin2Rome is an International Internet Marketing Company which allows you the opportunity to advertise or find advertisements at ease. After extensive research and 4 years of internet monitoring we created a website which is user-friendly, hi-tech and accessible all over the world.', 'A'),
(3, 'services', 'Property Advertisement. Banner, Video, Slide Show and Floating Adverts. Website, Banner, Logo, Business Card and Stationery Design.', 'A'),
(4, 'contactus', ' 	You can contact Dublin2Rome any time 24 hours a day. We will try to do everything possible to ensure all our clientele get the very best service. Contact us by Messenger or simply email us and you will receive a reply Immediately. Our customer service is at the forefront of business and we guarantee your satisfaction. info@dublin2rome.com info@gerace.com yahoo messanger spslmail@yahoo.ie', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `mms_config`
--

CREATE TABLE IF NOT EXISTS `mms_config` (
  `config_id` bigint(255) NOT NULL default '0',
  `item` varchar(255) default NULL,
  `item_value` varchar(255) default 'no',
  `metaID` bigint(255) default '0',
  PRIMARY KEY  (`config_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mms_config`
--

INSERT INTO `mms_config` (`config_id`, `item`, `item_value`, `metaID`) VALUES
(1, 'form_permission', 'no', 0);

-- --------------------------------------------------------

--
-- Table structure for table `mms_country_master`
--

CREATE TABLE IF NOT EXISTS `mms_country_master` (
  `country_id` bigint(255) NOT NULL auto_increment,
  `country_name` varchar(255) default NULL,
  `countryISO` varchar(255) default NULL,
  `telPrefix` bigint(128) default NULL,
  `metaID` bigint(255) default '0',
  `status` enum('A','I','D') NOT NULL default 'A',
  PRIMARY KEY  (`country_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 PACK_KEYS=0 AUTO_INCREMENT=350 ;

--
-- Dumping data for table `mms_country_master`
--

INSERT INTO `mms_country_master` (`country_id`, `country_name`, `countryISO`, `telPrefix`, `metaID`, `status`) VALUES
(1, 'ANDORRA', '', 0, 0, 'A'),
(2, 'UNITED1 ARAB EMIRATES', '', 0, 0, 'A'),
(3, 'AFGHANISTAN', '', 0, 0, 'D'),
(4, 'ANTIGUA AND BARBUDA', '', 0, 0, 'A'),
(5, 'ANGUILLA', '', 0, 0, 'A'),
(7, 'ARMENIA', '', 0, 0, 'A'),
(8, 'NETHERLANDS ANTILLES', '', 0, 0, 'A'),
(9, 'ANGOLA', '', 0, 0, 'D'),
(10, 'ANTARCTICA', '', 0, 0, 'A'),
(11, 'ARGENTINA', '', 0, 0, 'A'),
(12, 'AUSTRIA', '', 0, 0, 'A'),
(13, 'AUSTRALIA', '', 0, 0, 'A'),
(14, 'ARUBA', '', 0, 0, 'A'),
(15, 'AZERBAIJAN', '', 0, 0, 'A'),
(16, 'BOSNIA AND HERZEGOVINA', '', 0, 0, 'A'),
(17, 'BARBADOS', '', 0, 0, 'A'),
(18, 'BANGLADESH', '', 0, 0, 'A'),
(19, 'BELGIUM', '', 0, 0, 'A'),
(20, 'BURKINA FASO', '', 0, 0, 'A'),
(21, 'BULGARIA', '', 0, 0, 'A'),
(316, 'SADS', NULL, NULL, 0, 'A'),
(23, 'BURUNDI', '', 0, 0, 'A'),
(24, 'BENIN', '', 0, 0, 'A'),
(25, 'BERMUDA', '', 0, 0, 'A'),
(26, 'BRUNEI DARUSSALAM', '', 0, 0, 'A'),
(27, 'BOLIVIA', '', 0, 0, 'A'),
(28, 'BRAZIL', '', 0, 0, 'A'),
(29, 'BAHAMAS', '', 0, 0, 'A'),
(30, 'BHUTAN', '', 0, 0, 'A'),
(31, 'BOUVET ISLAND', '', 0, 0, 'A'),
(32, 'BOTSWANA', '', 0, 0, 'A'),
(33, 'BELARUS', '', 0, 0, 'A'),
(34, 'BELIZE', '', 0, 0, 'A'),
(35, 'CANADA', '', 0, 0, 'A'),
(36, 'COCOS (KEELING) ISLANDS', '', 0, 0, 'A'),
(37, 'CONGO', '', 0, 0, 'A'),
(38, 'CENTRAL AFRICAN REPUBLIC', '', 0, 0, 'A'),
(39, 'CONGO', '', 0, 0, 'A'),
(40, 'SWITZERLAND', '', 0, 0, 'A'),
(41, 'COTE D''IVOIRE', '', 0, 0, 'A'),
(42, 'COOK ISLANDS', '', 0, 0, 'A'),
(44, 'CAMEROON', '', 0, 0, 'A'),
(45, 'CHINA', '', 0, 0, 'A'),
(46, 'COLOMBIA', '', 0, 0, 'A'),
(47, 'COSTA RICA', '', 0, 0, 'A'),
(48, 'CUBA', '', 0, 0, 'A'),
(49, 'CAPE VERDE', '', 0, 0, 'A'),
(50, 'CHRISTMAS ISLAND', '', 0, 0, 'A'),
(51, 'CYPRUS', '', 0, 0, 'A'),
(52, 'CZECH REPUBLIC', '', 0, 0, 'A'),
(53, 'GERMANY', '', 0, 0, 'A'),
(54, 'DJIBOUTI', '', 0, 0, 'A'),
(55, 'DENMARK', '', 0, 0, 'A'),
(56, 'DOMINICA', '', 0, 0, 'A'),
(57, 'DOMINICAN REPUBLIC', '', 0, 0, 'A'),
(58, 'ALGELA', '', 0, 0, 'A'),
(59, 'ECUADOR', '', 0, 0, 'A'),
(60, 'ESTONIA', '', 0, 0, 'A'),
(61, 'EGYPT', '', 0, 0, 'A'),
(62, 'WESTERN SAHARA', '', 0, 0, 'A'),
(63, 'ERITREA', '', 0, 0, 'A'),
(64, 'SPAIN', '', 0, 0, 'A'),
(65, 'ETHIOPIA', '', 0, 0, 'A'),
(66, 'FINLAND', '', 0, 0, 'A'),
(67, 'FIJI', '', 0, 0, 'A'),
(68, 'FALKLAND ISLANDS (MALVINAS)', '', 0, 0, 'A'),
(69, 'MICRONESIA, FEDERATED STATES OF', '', 0, 0, 'A'),
(70, 'FAROE ISLANDS', '', 0, 0, 'A'),
(71, 'FRANCE', '', 0, 0, 'A'),
(72, 'GABON', '', 0, 0, 'A'),
(73, 'UNITED KINGDOM', '', 0, 0, 'A'),
(74, 'GRENADA', '', 0, 0, 'A'),
(75, 'GEORGIA', '', 0, 0, 'A'),
(76, 'FRENCH GUIANA', '', 0, 0, 'A'),
(77, 'GHANA', '', 0, 0, 'A'),
(78, 'GIBRALTAR', '', 0, 0, 'A'),
(79, 'GREENLAND', '', 0, 0, 'A'),
(80, 'GAMBIA', '', 0, 0, 'A'),
(81, 'GUINEA', '', 0, 0, 'A'),
(82, 'GUADELOUPE', '', 0, 0, 'A'),
(83, 'EQUATORIAL GUINEA', '', 0, 0, 'A'),
(84, 'GREECE', '', 0, 0, 'A'),
(85, 'SOUTH GEORGIA', '', 0, 0, 'A'),
(86, 'GUATEMALA', '', 0, 0, 'A'),
(87, 'GUAM', '', 0, 0, 'A'),
(88, 'GUINEA-BISSAU', '', 0, 0, 'A'),
(89, 'GUYANA', '', 0, 0, 'A'),
(90, 'HONG KONG', '', 0, 0, 'A'),
(91, 'HEARD ISLAND AND MCDONALD ISLANDS', '', 0, 0, 'A'),
(92, 'HONDURAS', '', 0, 0, 'A'),
(93, 'CROATIA', '', 0, 0, 'A'),
(94, 'HAITI', '', 0, 0, 'A'),
(95, 'HUNGARY', '', 0, 0, 'A'),
(96, 'INDONESIA', '', 0, 0, 'A'),
(97, 'IRELAND', '', 0, 0, 'A'),
(98, 'ISRAEL', '', 0, 0, 'A'),
(99, 'INDIA', '', 0, 0, 'A'),
(100, 'BRITISH INDIAN OCEAN TERRITORY', '', 0, 0, 'A'),
(101, 'IRAQ', '', 0, 0, 'A'),
(102, 'IRAN, ISLAMIC REPUBLIC OF', '', 0, 0, 'A'),
(103, 'ICELAND', '', 0, 0, 'A'),
(104, 'ITALY', '', 0, 0, 'A'),
(105, 'JAMAICA', '', 0, 0, 'A'),
(106, 'JORDAN', '', 0, 0, 'A'),
(107, 'JAPAN', '', 0, 0, 'A'),
(108, 'KENYA', '', 0, 0, 'A'),
(109, 'KYRGYZSTAN', '', 0, 0, 'A'),
(110, 'CAMBODIA', '', 0, 0, 'A'),
(111, 'KIRIBATI', '', 0, 0, 'A'),
(112, 'COMOROS', '', 0, 0, 'A'),
(113, 'SAINT KITTS AND NEVIS', '', 0, 0, 'A'),
(114, 'KOREA, DEMOCRATIC PEOPLE''S REPUBLIC', '', 0, 0, 'A'),
(115, 'KOREA, REPUBLIC OF', '', 0, 0, 'A'),
(116, 'KUWAIT', '', 0, 0, 'A'),
(117, 'CAYMAN ISLANDS', '', 0, 0, 'A'),
(118, 'KAZAKSTAN', '', 0, 0, 'A'),
(119, 'LAO PEOPLE''S DEMOCRATIC REPUBLIC', '', 0, 0, 'A'),
(120, 'LEBANON', '', 0, 0, 'A'),
(121, 'SAINT LUCIA', '', 0, 0, 'A'),
(122, 'LIECHTENSTEIN', '', 0, 0, 'A'),
(123, 'SRI LANKA', '', 0, 0, 'A'),
(124, 'LIBERIA', '', 0, 0, 'A'),
(125, 'LESOTHO', '', 0, 0, 'A'),
(126, 'LITHUANIA', '', 0, 0, 'A'),
(127, 'LUXEMBOURG', '', 0, 0, 'A'),
(128, 'LATVIA', '', 0, 0, 'A'),
(129, 'LIBYAN ARAB JAMAHIRIYA', '', 0, 0, 'A'),
(130, 'MOROCCO', '', 0, 0, 'A'),
(131, 'MONACO', '', 0, 0, 'A'),
(132, 'MOLDOVA, REPUBLIC OF', '', 0, 0, 'A'),
(133, 'MADAGASCAR', '', 0, 0, 'A'),
(134, 'MARSHALL ISLANDS', '', 0, 0, 'A'),
(135, 'MACEDONIA', '', 0, 0, 'A'),
(136, 'MALI', '', 0, 0, 'A'),
(137, 'MYANMAR', '', 0, 0, 'A'),
(138, 'MONGOLIA', '', 0, 0, 'A'),
(139, 'MACAU', '', 0, 0, 'A'),
(140, 'NORTHERN MARIANA ISLANDS', '', 0, 0, 'A'),
(141, 'MARTINIQUE', '', 0, 0, 'A'),
(142, 'MAURITANIA', '', 0, 0, 'A'),
(143, 'MONTSERRAT', '', 0, 0, 'A'),
(144, 'MALTA', '', 0, 0, 'A'),
(145, 'MAURITIUS', '', 0, 0, 'A'),
(146, 'MALDIVES', '', 0, 0, 'A'),
(147, 'MALAWI', '', 0, 0, 'A'),
(148, 'MEXICO', '', 0, 0, 'A'),
(149, 'MALAYSIA', '', 0, 0, 'A'),
(150, 'MOZAMBIQUE', '', 0, 0, 'A'),
(151, 'NAMIBIA', '', 0, 0, 'A'),
(152, 'NEW CALEDONIA', '', 0, 0, 'A'),
(153, 'NIGER', '', 0, 0, 'A'),
(154, 'NORFOLK ISLAND', '', 0, 0, 'A'),
(155, 'NIGERIA', '', 0, 0, 'A'),
(156, 'NICARAGUA', '', 0, 0, 'A'),
(157, 'NETHERLANDS', '', 0, 0, 'A'),
(158, 'NORWAY', '', 0, 0, 'A'),
(159, 'NEPAL', '', 0, 0, 'A'),
(160, 'NAURU', '', 0, 0, 'A'),
(161, 'NIUE', '', 0, 0, 'A'),
(162, 'NEW ZEALAND', '', 0, 0, 'A'),
(163, 'OMAN', '', 0, 0, 'A'),
(164, 'PANAMA', '', 0, 0, 'A'),
(165, 'PERU', '', 0, 0, 'A'),
(166, 'FRENCH POLYNESIA', '', 0, 0, 'A'),
(167, 'PAPUA NEW GUINEA', '', 0, 0, 'A'),
(168, 'PHILIPPINES', '', 0, 0, 'A'),
(169, 'PAKISTAN', '', 0, 0, 'A'),
(170, 'POLAND', '', 0, 0, 'A'),
(171, 'SAINT PIERRE AND MIQUELON', '', 0, 0, 'A'),
(172, 'PITCAIRN', '', 0, 0, 'A'),
(173, 'PUERTO RICO', '', 0, 0, 'A'),
(174, 'PALESTINIAN TERRITORY, OCCUPIED', '', 0, 0, 'A'),
(175, 'PORTUGAL', '', 0, 0, 'A'),
(176, 'PALAU', '', 0, 0, 'A'),
(177, 'PARAGUAY', '', 0, 0, 'A'),
(178, 'QATAR', '', 0, 0, 'A'),
(179, 'RÃ‰UNION', '', 0, 0, 'A'),
(180, 'ROMANIA', '', 0, 0, 'A'),
(181, 'RUSSIAN FEDERATION', '', 0, 0, 'A'),
(182, 'RWANDA', '', 0, 0, 'A'),
(183, 'SAUDI ARABIA', '', 0, 0, 'A'),
(184, 'SOLOMON ISLANDS', '', 0, 0, 'A'),
(185, 'SEYCHELLES', '', 0, 0, 'A'),
(186, 'SUDAN', '', 0, 0, 'A'),
(187, 'SWEDEN', '', 0, 0, 'A'),
(188, 'SINGAPORE', '', 0, 0, 'A'),
(189, 'SAINT HELENA', '', 0, 0, 'A'),
(190, 'SLOVENIA', '', 0, 0, 'A'),
(191, 'SVALBARD AND JAN MAYEN', '', 0, 0, 'A'),
(192, 'SLOVAKIA', '', 0, 0, 'A'),
(193, 'SIERRA LEONE', '', 0, 0, 'A'),
(194, 'SAN MARINO', '', 0, 0, 'A'),
(195, 'SENEGAL', '', 0, 0, 'A'),
(196, 'SOMALIA', '', 0, 0, 'A'),
(197, 'SURINAME', '', 0, 0, 'A'),
(198, 'SAO TOME AND PRINCIPE', '', 0, 0, 'A'),
(199, 'EL SALVADOR', '', 0, 0, 'A'),
(200, 'SYRIAN ARAB REPUBLIC', '', 0, 0, 'A'),
(201, 'SWAZILAND', '', 0, 0, 'A'),
(202, 'TURKS AND CAICOS ISLANDS', '', 0, 0, 'A'),
(203, 'CHAD', '', 0, 0, 'A'),
(204, 'FRENCH SOUTHERN TERRITORIES', '', 0, 0, 'A'),
(205, 'TOGO', '', 0, 0, 'A'),
(206, 'THAILAND', '', 0, 0, 'A'),
(207, 'TAJIKISTAN', '', 0, 0, 'A'),
(208, 'TOKELAU', '', 0, 0, 'A'),
(209, 'TURKMENISTAN', '', 0, 0, 'A'),
(210, 'TUNISIA', '', 0, 0, 'A'),
(211, 'TONGA', '', 0, 0, 'A'),
(212, 'EAST TIMOR', '', 0, 0, 'A'),
(213, 'TURKEY', '', 0, 0, 'A'),
(214, 'TRINIDAD AND TOBAGO', '', 0, 0, 'A'),
(215, 'TUVALU', '', 0, 0, 'A'),
(216, 'TAIWAN, PROVINCE OF CHINA', '', 0, 0, 'A'),
(217, 'TANZANIA, UNITED REPUBLIC OF', '', 0, 0, 'A'),
(218, 'UKRAINE', '', 0, 0, 'A'),
(219, 'UGANDA', '', 0, 0, 'A'),
(220, 'UNITED STATES MINOR ISLANDS', '', 0, 0, 'A'),
(221, 'USA', '', 0, 0, 'A'),
(222, 'URUGUAY', '', 0, 0, 'A'),
(223, 'UZBEKISTAN', '', 0, 0, 'A'),
(224, 'HOLY SEE (VATICAN CITY STATE)', '', 0, 0, 'A'),
(225, 'SAINT VINCENT AND THE GRENADINES', '', 0, 0, 'A'),
(226, 'VENEZUELA', '', 0, 0, 'A'),
(227, 'VIRGIN ISLANDS, BRITISH', '', 0, 0, 'A'),
(228, 'VIRGIN ISLANDS, U.S.', '', 0, 0, 'A'),
(229, 'VIETNAM', '', 0, 0, 'A'),
(230, 'VANUATU', '', 0, 0, 'A'),
(231, 'WALLIS AND FUTUNA', '', 0, 0, 'A'),
(232, 'SAMOA', '', 0, 0, 'A'),
(233, 'YEMEN', '', 0, 0, 'A'),
(234, 'MAYOTTE', '', 0, 0, 'A'),
(235, 'YUGOSLAVIA', '', 0, 0, 'A'),
(236, 'SOUTH AFRICA', '', 0, 0, 'A'),
(237, 'ZAMBIA', '', 0, 0, 'A'),
(238, 'ZIMBABWE', '', 0, 0, 'A'),
(239, 'JHGFHGD', '', 0, 0, 'A'),
(240, 'COUNTRY', '', 0, 0, 'A'),
(243, 'NJGFDHGF', '', 0, 0, 'A'),
(248, 'ASTROBGDFRTH', '', 0, 0, 'A'),
(291, 'HGFFD', NULL, NULL, 0, 'A'),
(309, 'rfd', NULL, NULL, 0, 'A'),
(312, 'LOLIPOP', NULL, NULL, 0, 'A'),
(314, 'KOHLI', NULL, NULL, 0, 'A'),
(303, 'GFTUSAGDF', NULL, NULL, 0, 'A'),
(324, 'SADA', NULL, NULL, 0, 'A'),
(335, 'AMAZONDA', NULL, NULL, 0, 'A'),
(343, 'AAAAAzzz', NULL, NULL, 0, 'D'),
(344, 'a''a''a', NULL, NULL, 261, 'D'),
(345, 'fghhh', NULL, NULL, 317, 'A'),
(346, 'gfgf', NULL, NULL, 318, 'A'),
(347, 'aaaaaaaaaaaaaaaa', NULL, NULL, 319, 'D'),
(348, 's', NULL, NULL, 321, 'A'),
(349, 'aaa', NULL, NULL, 322, 'D');

-- --------------------------------------------------------

--
-- Table structure for table `mms_course`
--

CREATE TABLE IF NOT EXISTS `mms_course` (
  `course_id` bigint(128) NOT NULL auto_increment,
  `course_name` varchar(255) default NULL,
  `institution_id` bigint(255) default '0',
  `status` enum('A','I','D') NOT NULL default 'A',
  `metaID` bigint(255) default '0',
  PRIMARY KEY  (`course_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Dumping data for table `mms_course`
--

INSERT INTO `mms_course` (`course_id`, `course_name`, `institution_id`, `status`, `metaID`) VALUES
(27, 'Soumen', 21, 'A', 0),
(32, 'DWECK', 8, 'A', 0),
(37, 'SADS', 0, 'A', 0),
(40, 'BTECH', 5, 'A', 0),
(41, 'BSc Multimedia Course and Design', 24, 'A', 0),
(42, 'BSc Science ', 24, 'A', 0),
(43, '1', 13, 'A', 0),
(44, '1@1', 13, 'A', 0),
(45, '2', 5, 'A', 0),
(46, '4 & 33', 9, 'A', 0),
(47, '8&99', 12, 'A', 0),
(48, 'sas & jk', 12, 'A', 0),
(49, 'AAAAzzz', 13, 'D', 0),
(50, 'a''a''a', 29, 'D', 264);

-- --------------------------------------------------------

--
-- Table structure for table `mms_group`
--

CREATE TABLE IF NOT EXISTS `mms_group` (
  `group_id` bigint(128) NOT NULL auto_increment,
  `group_name` varchar(255) NOT NULL,
  `groupURL` varchar(255) NOT NULL,
  `groupshotURL` varchar(255) NOT NULL,
  `studentID` bigint(255) default NULL,
  `projectID` bigint(255) default NULL,
  `mibyear` varchar(255) NOT NULL,
  `statement` varchar(255) NOT NULL,
  `status` enum('A','I','D') NOT NULL default 'A',
  `metaID` bigint(255) NOT NULL default '0',
  PRIMARY KEY  (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `mms_group`
--

INSERT INTO `mms_group` (`group_id`, `group_name`, `groupURL`, `groupshotURL`, `studentID`, `projectID`, `mibyear`, `statement`, `status`, `metaID`) VALUES
(4, 'LJHDFVUYNBDS', 'JG VDHF', 'FCDTYXC', NULL, NULL, '2007', 'FCFDCF', 'A', 0),
(10, 'FSDSD', 'GSDSS', 'DSDSDS', NULL, NULL, '2007', 'fcgh', 'A', 0),
(11, 'FGFGF', 'FDFD', 'HGFGHFGF', NULL, NULL, '2008', '123132', 'A', 0),
(14, 'FDGHFD', 'FDGDFG', 'GFHGFH', NULL, NULL, '2008', 'vcvcvfx', 'A', 0),
(16, 'DSFSD', 'DFDSSS', 'DFGHFDHG', NULL, NULL, '2007', 'FSERSETS', 'A', 0),
(17, 'HFF', 'FTFT', 'TFTF', NULL, NULL, '2007', 'TFTFT', 'A', 0),
(18, 'FDFSA', 'RRDRD', 'SFDR', NULL, NULL, '2007', 'GCFD', 'A', 0),
(19, 'GFGF', 'FTFF', 'FXDX', NULL, NULL, '2007', 'GCFDDDFD', 'A', 0),
(22, 'Raju', 'raju@web.com', 'webs.gif', NULL, NULL, '2008', 'something is never can change', 'A', 0),
(23, 'Asiff', 'asiff@web.com', 'good@asiffweb.com', NULL, NULL, '2008', 'Asiff is good boy', 'A', 0),
(24, 'Sarad', 'sarad@web.com', 'web.gip', NULL, NULL, '2008', 'Sarad has nothing to do', 'A', 0),
(25, 'Fahrukh', 'fahrukh@web.com', 'admins.gip', NULL, NULL, '2008', 'Fahrukh can do everything', 'D', 0),
(28, 'Khabij', 'khabi @gfgfsd', 'gdfdfdsdgs', NULL, NULL, '2007', 'jhfghfdss', 'A', 0),
(31, 'saf', 'dfgds', 'dsg', NULL, NULL, '2007', 'dfd', 'A', 0),
(32, 'test', 'test@test.com', 'test', NULL, NULL, '2007', 'test', 'A', 0),
(33, 'AAAzzz', 'AAAzzz', 'AAA', NULL, NULL, '2008', 'AAAAzzz', 'D', 229),
(34, '233', '233', '233', NULL, NULL, '2007', '233', 'D', 247),
(35, '111', '111', '111', NULL, NULL, '2007', '111', 'D', 249),
(36, '444', '444', '22', NULL, NULL, '2007', '22', 'D', 250),
(37, '324', '324', '23', NULL, NULL, '2008', '23', 'A', 251),
(38, 'qwe', 'qwe', 'asd', NULL, NULL, '2008', 'asd', 'A', 252),
(39, '1''1''q', '2''2''w', 'qwqwqwqw''qwqwqwqw;''qwq', NULL, NULL, '2008', 'qwwqqw''qwqwqw;'';''', 'D', 263);

-- --------------------------------------------------------

--
-- Table structure for table `mms_institution`
--

CREATE TABLE IF NOT EXISTS `mms_institution` (
  `institution_id` bigint(128) NOT NULL auto_increment,
  `institution_name` varchar(255) default NULL,
  `url` varchar(255) default NULL,
  `country_id` varchar(255) default NULL,
  `country_name` varchar(255) default NULL,
  `status` enum('A','D','I') NOT NULL default 'A',
  `metaID` bigint(255) default '0',
  PRIMARY KEY  (`institution_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `mms_institution`
--

INSERT INTO `mms_institution` (`institution_id`, `institution_name`, `url`, `country_id`, `country_name`, `status`, `metaID`) VALUES
(5, 'bidhanchandra high school', 'bidhan@school.com', '11', '0', 'A', 0),
(8, 'narula institution', 'narula@collsge.com', '17', NULL, 'A', 0),
(9, 'Prafulla Vidyamandir', 'Prafulla@Vidyamandir.com', '32', NULL, 'A', 0),
(11, 'asdfsaf', 'dsfgfdh', '9', NULL, 'A', 0),
(12, 'ASAASW', 'AASASA', '14', NULL, 'A', 0),
(13, 'ADSF', 'WEFGWE', '54', NULL, 'A', 0),
(20, 'SDGFD', 'DFSGDS', '73', NULL, 'A', 0),
(21, 'dsfgdsgf', 'dsgsdfg', '3', NULL, 'A', 135),
(24, 'Govindo Pur vishya Bidyalaya', 'GPvishya@bidyalaya.com', '5', NULL, 'A', 183),
(27, 'cbv', 'vbv', '3', NULL, 'D', 197),
(28, 'AAAAzzzz', 'AAAAzzzz', '29', NULL, 'D', 231),
(29, 'AAA', 'AAA', '3', NULL, 'A', 233),
(30, '"sajib"', '""``hdfgh', '29', NULL, 'D', 256),
(31, '''sajibcxgfd', 'fds', '1', NULL, 'A', 257),
(32, 'a''aa''aaa''''daads', 'aaaa''aaaa''aaaa', '3', NULL, 'D', 265),
(33, 'd', 'gf', '335', NULL, 'A', 289),
(34, 'e', 'e', '3', NULL, 'D', 290),
(35, 'q', 'q', '3', NULL, 'D', 291),
(36, 'ss', 'ss', '58', NULL, 'A', 292),
(37, 'r', 'r', '3', NULL, 'A', 293),
(38, 't', 't', '3', NULL, 'A', 294),
(39, 'u', 'u', '58', NULL, 'A', 295),
(40, 'qwe', 'qwe', '1', NULL, 'A', 296),
(41, 'asd', 'asd', '335', NULL, 'A', 297),
(42, 'qw', 'qw', '5', NULL, 'A', 298);

-- --------------------------------------------------------

--
-- Table structure for table `mms_mediatypes`
--

CREATE TABLE IF NOT EXISTS `mms_mediatypes` (
  `typeID` bigint(128) NOT NULL auto_increment,
  `mediaType` varchar(255) default NULL,
  `fragment` varchar(255) default NULL,
  `metaID` bigint(255) default '0',
  `status` enum('A','I','D') NOT NULL default 'A',
  PRIMARY KEY  (`typeID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `mms_mediatypes`
--

INSERT INTO `mms_mediatypes` (`typeID`, `mediaType`, `fragment`, `metaID`, `status`) VALUES
(8, 'AGE', '', 0, 'A'),
(10, 'POWER', '', 0, 'A'),
(13, 'WEIGHT', '', 0, 'A'),
(14, 'HIGHT', NULL, 0, 'A'),
(18, 'MOODY', NULL, 16, 'A'),
(19, 'EMOTION', NULL, 18, 'A'),
(23, 'CREATIVE', NULL, 35, 'A'),
(25, 'CARRET', NULL, 37, 'A'),
(26, 'DHOOM2', NULL, 87, 'A'),
(28, 'GOAL2', NULL, 89, 'A'),
(29, 'ADOPTED', NULL, 91, 'A'),
(36, 'FASEN', NULL, 98, 'A'),
(39, 'FSDRES', NULL, 105, 'A'),
(43, 'ENERGY', NULL, 168, 'A'),
(44, 'AAAEWQ12132', NULL, 169, 'D'),
(45, 'AAAAzzzz', NULL, 228, 'D'),
(46, 'a''a''s', NULL, 262, 'D');

-- --------------------------------------------------------

--
-- Table structure for table `mms_meta`
--

CREATE TABLE IF NOT EXISTS `mms_meta` (
  `metaID` bigint(255) NOT NULL auto_increment,
  `isDeleted` varchar(255) default NULL,
  `isPublished` varchar(255) default NULL,
  `dateCreated` date default NULL,
  `dateModified` date default NULL,
  `userModified` varchar(255) default NULL,
  `adminModified` varchar(255) default NULL,
  PRIMARY KEY  (`metaID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=325 ;

--
-- Dumping data for table `mms_meta`
--

INSERT INTO `mms_meta` (`metaID`, `isDeleted`, `isPublished`, `dateCreated`, `dateModified`, `userModified`, `adminModified`) VALUES
(1, '', '', '2008-05-09', NULL, '1', NULL),
(2, NULL, NULL, '2008-05-09', NULL, NULL, ''),
(3, NULL, NULL, '2008-05-09', NULL, NULL, ''),
(4, NULL, NULL, '2008-05-09', NULL, NULL, ''),
(5, NULL, NULL, '2008-05-09', NULL, NULL, ''),
(6, NULL, NULL, '2008-05-09', NULL, NULL, 'admin'),
(7, NULL, NULL, '2008-05-09', NULL, NULL, 'admin'),
(8, NULL, NULL, '2008-05-09', NULL, NULL, 'admin'),
(9, NULL, NULL, '2008-05-10', NULL, NULL, 'admin'),
(10, NULL, NULL, '2008-05-10', NULL, NULL, 'admin'),
(11, NULL, NULL, '2008-05-10', NULL, NULL, ''),
(12, NULL, NULL, '2008-05-10', NULL, NULL, '1'),
(13, NULL, NULL, '2008-05-10', NULL, NULL, '1'),
(14, NULL, NULL, '2008-05-10', NULL, NULL, '1'),
(15, NULL, NULL, '2008-05-10', NULL, NULL, '1'),
(16, NULL, NULL, '2008-05-10', NULL, NULL, '1'),
(17, NULL, NULL, '2008-05-11', NULL, NULL, '1'),
(18, NULL, NULL, '2008-05-11', NULL, NULL, '1'),
(19, NULL, NULL, '2008-05-12', NULL, NULL, '1'),
(20, NULL, NULL, '2008-05-12', NULL, NULL, '1'),
(21, NULL, NULL, '2008-05-14', NULL, NULL, '1'),
(22, NULL, NULL, '2008-05-14', NULL, NULL, '1'),
(23, NULL, NULL, '2008-05-15', NULL, NULL, '1'),
(24, NULL, NULL, '2008-05-15', NULL, NULL, '1'),
(25, NULL, NULL, '2008-05-15', NULL, NULL, '1'),
(26, NULL, NULL, '2008-05-15', NULL, NULL, '1'),
(27, NULL, NULL, '2008-05-15', NULL, NULL, '1'),
(28, NULL, NULL, '2008-05-16', NULL, NULL, '1'),
(29, NULL, NULL, '2008-05-16', NULL, NULL, '1'),
(30, NULL, NULL, '2008-05-16', NULL, NULL, '1'),
(31, NULL, NULL, '2008-05-16', NULL, NULL, '1'),
(32, NULL, NULL, '2008-05-16', NULL, NULL, '1'),
(33, NULL, NULL, '2008-05-16', NULL, NULL, '1'),
(34, NULL, NULL, '2008-05-16', NULL, NULL, '1'),
(35, NULL, NULL, '2008-05-16', NULL, NULL, '1'),
(36, NULL, NULL, '2008-05-16', NULL, NULL, '1'),
(37, NULL, NULL, '2008-05-16', '2008-06-02', NULL, '1'),
(38, NULL, NULL, '2008-05-16', NULL, NULL, '1'),
(39, NULL, NULL, '2008-05-16', NULL, NULL, '1'),
(40, NULL, NULL, '2008-05-16', NULL, NULL, '1'),
(41, NULL, NULL, '2008-05-16', NULL, NULL, '1'),
(42, NULL, NULL, '2008-05-16', NULL, NULL, '1'),
(43, NULL, NULL, '2008-05-16', NULL, NULL, '1'),
(44, NULL, NULL, '2008-05-16', NULL, NULL, '1'),
(45, NULL, NULL, '2008-05-16', NULL, NULL, '1'),
(46, NULL, NULL, '2008-05-16', NULL, NULL, '1'),
(47, NULL, NULL, '2008-05-16', NULL, NULL, '1'),
(48, NULL, NULL, '2008-05-16', NULL, NULL, '1'),
(49, NULL, NULL, '2008-05-16', NULL, NULL, '1'),
(50, NULL, NULL, '2008-05-16', NULL, NULL, '1'),
(51, NULL, NULL, '2008-05-16', NULL, NULL, '1'),
(52, NULL, NULL, '2008-05-16', NULL, NULL, '1'),
(53, NULL, NULL, '2008-05-16', NULL, NULL, '1'),
(54, NULL, NULL, '2008-05-16', NULL, NULL, '1'),
(55, NULL, NULL, '2008-05-16', NULL, NULL, '1'),
(56, NULL, NULL, '2008-05-16', NULL, NULL, '1'),
(57, NULL, NULL, '2008-05-15', NULL, NULL, '1'),
(58, NULL, NULL, '2008-05-15', NULL, NULL, '1'),
(59, NULL, NULL, '2008-05-15', NULL, NULL, '1'),
(60, NULL, NULL, '2008-05-15', NULL, NULL, '1'),
(61, NULL, NULL, '2008-05-15', NULL, NULL, '1'),
(62, NULL, NULL, '2008-05-15', NULL, NULL, '1'),
(63, NULL, NULL, '2008-05-15', NULL, NULL, '1'),
(64, NULL, NULL, '2008-05-15', NULL, NULL, '1'),
(65, NULL, NULL, '2008-05-15', NULL, NULL, '1'),
(66, NULL, NULL, '2008-05-15', NULL, NULL, '1'),
(67, NULL, NULL, '2008-05-15', NULL, NULL, '1'),
(68, NULL, NULL, '2008-05-15', NULL, NULL, '1'),
(69, NULL, NULL, '2008-05-15', NULL, NULL, '1'),
(70, NULL, NULL, '2008-05-15', NULL, NULL, '1'),
(71, NULL, NULL, '2008-05-15', NULL, NULL, '1'),
(72, NULL, NULL, '2008-05-15', NULL, NULL, '1'),
(73, NULL, NULL, '2008-05-15', NULL, NULL, '1'),
(74, NULL, NULL, '2008-05-15', NULL, NULL, '1'),
(75, NULL, NULL, '2008-05-15', NULL, NULL, '1'),
(76, NULL, NULL, '2008-05-15', NULL, NULL, '1'),
(77, NULL, NULL, '2008-05-15', NULL, NULL, '1'),
(78, NULL, NULL, '2008-05-15', NULL, NULL, '1'),
(79, NULL, NULL, '2008-05-15', NULL, NULL, '1'),
(80, NULL, NULL, '2008-05-15', NULL, NULL, '1'),
(81, NULL, NULL, '2008-05-15', NULL, NULL, '1'),
(82, NULL, NULL, '2008-05-16', NULL, NULL, '1'),
(83, NULL, NULL, '2008-05-16', NULL, NULL, '1'),
(84, NULL, NULL, '2008-05-17', NULL, NULL, '1'),
(85, NULL, NULL, '2008-05-17', NULL, NULL, '1'),
(86, NULL, NULL, '2008-05-17', NULL, NULL, '1'),
(87, NULL, NULL, '2008-05-17', NULL, NULL, '1'),
(88, NULL, NULL, '2008-05-17', NULL, NULL, '1'),
(89, NULL, NULL, '2008-05-16', NULL, NULL, '1'),
(90, NULL, NULL, '2008-05-16', NULL, NULL, '1'),
(91, NULL, NULL, '2008-05-16', '2009-02-09', NULL, '1'),
(92, NULL, NULL, '2008-05-16', NULL, NULL, '1'),
(93, NULL, NULL, '2008-05-16', NULL, NULL, '1'),
(94, NULL, NULL, '2008-05-16', NULL, NULL, '1'),
(95, NULL, NULL, '2008-05-16', NULL, NULL, '1'),
(96, NULL, NULL, '2008-05-16', NULL, NULL, '1'),
(97, NULL, NULL, '2008-05-16', '2008-06-07', NULL, '1'),
(98, NULL, NULL, '2008-05-20', NULL, NULL, '1'),
(99, NULL, NULL, '2008-05-24', NULL, NULL, '1'),
(100, NULL, NULL, '2008-05-24', NULL, NULL, '1'),
(101, NULL, NULL, '2008-05-24', NULL, NULL, '1'),
(102, NULL, NULL, '2008-05-24', NULL, NULL, '1'),
(103, NULL, NULL, '2008-05-24', NULL, NULL, '1'),
(104, NULL, NULL, '2008-05-24', NULL, NULL, '1'),
(105, NULL, NULL, '2008-05-24', '2008-06-04', NULL, '1'),
(106, NULL, NULL, '2008-05-24', NULL, NULL, '1'),
(107, NULL, NULL, '2008-05-24', NULL, NULL, '1'),
(108, NULL, NULL, '2008-05-24', NULL, NULL, '1'),
(109, NULL, NULL, '2008-05-24', NULL, NULL, '1'),
(110, NULL, NULL, '2008-05-24', NULL, NULL, '1'),
(111, NULL, NULL, '2008-05-24', NULL, NULL, '1'),
(112, NULL, NULL, '2008-05-24', NULL, NULL, '1'),
(113, NULL, NULL, '2008-05-24', NULL, NULL, '1'),
(114, NULL, NULL, '2008-05-24', NULL, NULL, '1'),
(115, NULL, NULL, '2008-05-24', NULL, NULL, '1'),
(116, NULL, NULL, '2008-05-24', NULL, NULL, '1'),
(117, NULL, NULL, '2008-05-24', NULL, NULL, '1'),
(118, NULL, NULL, '2008-05-24', NULL, NULL, '1'),
(119, NULL, NULL, '2008-05-24', NULL, NULL, '1'),
(120, NULL, NULL, '2008-05-24', NULL, NULL, '1'),
(121, NULL, NULL, '2008-05-24', NULL, NULL, '1'),
(122, NULL, NULL, '2008-05-24', NULL, NULL, '1'),
(123, NULL, NULL, '2008-05-24', '2008-06-02', NULL, '1'),
(124, NULL, NULL, '2008-05-24', NULL, NULL, '1'),
(125, NULL, NULL, '2008-05-24', NULL, NULL, '1'),
(126, NULL, NULL, '2008-05-24', '2008-06-02', NULL, '1'),
(127, NULL, NULL, '2008-05-24', '2008-06-02', NULL, '1'),
(128, NULL, NULL, '2008-05-29', NULL, NULL, '1'),
(129, NULL, NULL, '2008-05-29', NULL, NULL, '1'),
(130, NULL, NULL, '2008-06-02', '2008-06-02', NULL, '1'),
(131, NULL, NULL, '2008-06-02', NULL, NULL, '1'),
(132, NULL, NULL, '2008-06-02', NULL, NULL, '1'),
(133, NULL, NULL, '2008-06-02', '2008-06-02', NULL, '1'),
(134, NULL, NULL, '2008-06-02', '2008-06-04', NULL, '1'),
(135, NULL, NULL, '2008-06-02', NULL, NULL, '1'),
(136, NULL, NULL, '2008-06-02', '2008-06-07', NULL, '1'),
(137, NULL, NULL, '2008-06-03', NULL, NULL, '1'),
(138, NULL, NULL, '2008-06-03', NULL, NULL, '1'),
(139, NULL, NULL, '2008-06-03', NULL, NULL, '1'),
(140, NULL, NULL, '2008-06-03', NULL, NULL, '1'),
(141, NULL, NULL, '2008-06-03', '2008-06-03', NULL, '1'),
(142, NULL, NULL, '2008-06-03', NULL, NULL, '1'),
(143, NULL, NULL, '2008-06-03', NULL, NULL, '1'),
(144, NULL, NULL, '2008-06-03', NULL, NULL, '1'),
(145, NULL, NULL, '2008-06-03', NULL, NULL, '1'),
(146, NULL, NULL, '2008-06-03', NULL, NULL, '1'),
(147, NULL, NULL, '2008-06-03', NULL, NULL, '1'),
(148, NULL, NULL, '2008-06-03', NULL, NULL, '1'),
(149, NULL, NULL, '2008-06-03', NULL, NULL, '1'),
(150, NULL, NULL, '2008-06-03', '2008-06-07', NULL, '1'),
(151, NULL, NULL, '2008-06-03', NULL, NULL, '1'),
(152, NULL, NULL, '2008-06-03', NULL, NULL, '1'),
(153, NULL, NULL, '2008-06-04', '2008-06-04', NULL, '1'),
(154, NULL, NULL, '2008-06-04', NULL, NULL, '1'),
(155, NULL, NULL, '2008-06-04', NULL, NULL, '1'),
(156, NULL, NULL, '2008-06-04', NULL, NULL, '1'),
(157, NULL, NULL, '2008-06-04', NULL, NULL, '1'),
(158, NULL, NULL, '2008-06-04', NULL, NULL, '1'),
(159, NULL, NULL, '2008-06-04', NULL, NULL, '1'),
(160, NULL, NULL, '2008-06-04', NULL, NULL, '1'),
(161, NULL, NULL, '2008-06-04', NULL, NULL, '1'),
(162, NULL, NULL, '2008-06-04', NULL, NULL, '1'),
(163, NULL, NULL, '2008-06-04', NULL, NULL, '1'),
(164, NULL, NULL, '2008-06-07', NULL, NULL, '1'),
(165, NULL, NULL, '2008-06-07', NULL, NULL, '1'),
(166, NULL, NULL, '2008-06-07', NULL, NULL, '1'),
(167, NULL, NULL, '2008-06-07', NULL, NULL, '1'),
(168, NULL, NULL, '2008-06-07', NULL, NULL, '1'),
(169, 'YES', NULL, '2008-06-07', '2008-07-14', NULL, '1'),
(170, NULL, NULL, '2008-06-07', NULL, NULL, '1'),
(171, NULL, NULL, '2008-06-07', NULL, NULL, '1'),
(172, NULL, NULL, '2008-06-07', NULL, NULL, '1'),
(173, NULL, NULL, '2008-06-07', NULL, NULL, '1'),
(174, NULL, NULL, '2008-06-07', NULL, NULL, '1'),
(175, NULL, NULL, '2008-06-07', NULL, NULL, '1'),
(176, NULL, NULL, '2008-06-07', NULL, NULL, '1'),
(177, NULL, NULL, '2008-06-07', '2008-06-07', NULL, '1'),
(178, NULL, NULL, '2008-06-07', NULL, NULL, '1'),
(179, NULL, NULL, '2008-06-07', NULL, NULL, '1'),
(180, NULL, NULL, '2008-06-07', NULL, NULL, '1'),
(181, NULL, NULL, '2008-06-07', NULL, NULL, '1'),
(182, 'YES', NULL, '2008-06-07', '2008-07-05', NULL, '1'),
(183, NULL, NULL, '2008-06-07', NULL, NULL, '1'),
(184, NULL, NULL, '2008-06-07', NULL, NULL, '1'),
(185, NULL, NULL, '2008-06-08', NULL, NULL, '1'),
(186, NULL, NULL, '2008-06-08', NULL, NULL, '1'),
(187, NULL, NULL, '2008-06-08', NULL, NULL, '1'),
(188, NULL, NULL, '2008-06-08', NULL, NULL, '1'),
(189, NULL, NULL, '2008-06-08', NULL, NULL, '1'),
(190, NULL, NULL, '2008-06-08', NULL, NULL, '1'),
(191, NULL, NULL, '2008-06-08', NULL, NULL, '1'),
(192, NULL, NULL, '2008-06-08', NULL, NULL, '1'),
(193, NULL, NULL, '2008-06-08', '2008-06-08', NULL, '1'),
(194, NULL, NULL, '2008-06-08', '2008-06-08', NULL, '1'),
(195, NULL, NULL, '2008-06-08', '2008-06-20', NULL, '1'),
(196, NULL, NULL, '2008-06-08', NULL, NULL, '1'),
(197, 'YES', NULL, '2008-06-08', '2008-07-04', NULL, '1'),
(198, NULL, NULL, '2008-06-09', '2008-06-09', NULL, '1'),
(199, NULL, NULL, '2008-06-09', NULL, NULL, '1'),
(200, 'YES', NULL, '2008-06-09', '2008-07-04', NULL, '1'),
(201, 'YES', NULL, '2008-06-09', '2008-07-04', NULL, '1'),
(202, NULL, NULL, '2008-06-10', '2008-06-10', NULL, '1'),
(203, NULL, NULL, '2008-06-10', '2008-06-10', NULL, '1'),
(204, NULL, NULL, '2008-06-10', NULL, NULL, '1'),
(205, NULL, NULL, '2008-06-10', NULL, NULL, '1'),
(206, NULL, NULL, '2008-06-10', NULL, NULL, '1'),
(207, NULL, NULL, '2008-06-10', '2008-06-10', NULL, '1'),
(208, NULL, NULL, '2008-06-10', NULL, NULL, '1'),
(209, NULL, NULL, '2008-06-10', NULL, NULL, '1'),
(210, NULL, NULL, '2008-06-11', '2009-03-16', NULL, '1'),
(211, NULL, NULL, '2008-06-11', '2009-03-16', '102', '1'),
(212, NULL, NULL, '2008-06-11', NULL, NULL, '1'),
(213, NULL, NULL, '2008-06-11', NULL, NULL, '1'),
(214, 'YES', NULL, '2008-06-12', '2008-07-04', NULL, '1'),
(215, 'YES', NULL, '2008-06-12', '2008-07-04', NULL, '1'),
(216, NULL, NULL, '2008-06-12', '2008-06-12', NULL, '1'),
(217, NULL, NULL, '2008-06-12', '2008-06-12', NULL, '1'),
(218, NULL, NULL, '2008-06-20', NULL, NULL, '1'),
(219, NULL, NULL, '2008-06-20', NULL, NULL, '1'),
(220, NULL, NULL, '2008-06-20', NULL, NULL, '1'),
(221, NULL, NULL, '2008-06-20', NULL, NULL, '1'),
(222, NULL, NULL, '2008-06-20', NULL, NULL, '1'),
(223, NULL, NULL, '2008-06-20', '2008-06-20', NULL, '1'),
(224, NULL, NULL, '2008-06-20', '2008-06-20', NULL, '1'),
(225, NULL, NULL, '2008-06-20', '2008-06-20', NULL, '1'),
(226, NULL, NULL, '2008-06-20', '2008-06-20', NULL, '1'),
(227, 'YES', 'YES', '2008-07-04', '2008-07-04', NULL, '1'),
(228, 'YES', 'YES', '2008-07-04', '2008-07-04', NULL, '1'),
(229, 'YES', 'YES', '2008-07-04', '2008-07-05', NULL, '1'),
(230, 'YES', 'YES', '2008-07-04', '2008-07-04', NULL, '1'),
(231, 'YES', 'YES', '2008-07-04', '2008-07-04', NULL, '1'),
(232, 'YES', 'YES', '2008-07-04', '2008-07-04', NULL, '1'),
(233, NULL, 'YES', '2008-07-04', NULL, NULL, '1'),
(234, 'YES', 'YES', '2008-07-04', '2008-07-04', NULL, '1'),
(235, 'YES', NULL, '2008-07-04', '2008-07-04', NULL, '1'),
(236, 'YES', 'YES', '2008-07-04', '2008-07-04', NULL, '1'),
(237, NULL, 'YES', '2008-07-04', NULL, NULL, '1'),
(238, 'YES', 'YES', '2008-07-05', '2008-07-05', NULL, '1'),
(239, 'YES', NULL, '2008-07-05', '2008-07-05', NULL, '1'),
(240, 'YES', 'YES', '2008-07-05', '2008-07-05', NULL, '1'),
(241, NULL, 'YES', '2008-07-05', '2008-07-10', '1', NULL),
(242, NULL, 'YES', '2008-07-05', '2008-07-10', '1', NULL),
(243, NULL, 'YES', '2008-07-05', NULL, NULL, '1'),
(244, NULL, 'YES', '2008-07-05', '2008-07-05', NULL, '1'),
(245, NULL, 'YES', '2008-07-05', '2008-07-06', NULL, '1'),
(246, NULL, 'YES', '2008-07-05', '2008-07-10', '1', NULL),
(247, 'YES', 'YES', '2008-07-05', '2008-07-05', NULL, '1'),
(248, 'YES', 'YES', '2008-07-05', '2009-02-07', NULL, '1'),
(249, 'YES', 'YES', '2008-07-05', '2008-07-05', NULL, '1'),
(250, 'YES', 'YES', '2008-07-05', '2008-07-05', NULL, '1'),
(251, NULL, 'YES', '2008-07-05', '2008-07-07', NULL, '1'),
(252, NULL, 'YES', '2008-07-05', '2008-07-07', NULL, '1'),
(253, NULL, 'YES', '2008-07-05', '2008-07-06', NULL, '1'),
(254, NULL, 'YES', '2008-07-05', '2008-07-10', '1', '1'),
(255, NULL, 'YES', '2008-07-05', '2008-07-05', NULL, '1'),
(256, 'YES', 'YES', '2008-07-05', '2008-07-05', NULL, '1'),
(257, NULL, 'YES', '2008-07-05', '2008-07-05', NULL, '1'),
(258, NULL, NULL, '2008-07-05', '2008-07-05', NULL, '1'),
(259, NULL, 'YES', '2008-07-05', '2008-07-05', NULL, '1'),
(260, NULL, 'YES', '2008-07-05', NULL, NULL, '1'),
(261, 'YES', 'YES', '2008-07-05', '2008-07-05', NULL, '1'),
(262, 'YES', 'YES', '2008-07-05', '2008-07-05', NULL, '1'),
(263, 'YES', 'YES', '2008-07-05', '2008-07-05', NULL, '1'),
(264, 'YES', 'YES', '2008-07-05', '2008-07-05', NULL, '1'),
(265, 'YES', 'YES', '2008-07-05', '2008-07-05', NULL, '1'),
(266, NULL, 'YES', '2008-07-05', '2008-07-10', '1', NULL),
(267, NULL, 'YES', '2008-07-05', NULL, '1', NULL),
(268, NULL, 'YES', '2008-07-05', NULL, '1', NULL),
(269, 'YES', 'YES', '2008-07-05', '2009-02-07', NULL, '1'),
(270, NULL, 'YES', '2008-07-05', NULL, '1', NULL),
(271, NULL, 'YES', '2008-07-05', NULL, '1', NULL),
(272, NULL, 'YES', '2008-07-05', NULL, '1', NULL),
(273, NULL, 'YES', '2008-07-05', NULL, '1', NULL),
(274, NULL, 'YES', '2008-07-05', NULL, '1', NULL),
(275, NULL, 'YES', '2008-07-05', NULL, '1', NULL),
(276, NULL, 'YES', '2008-07-05', NULL, '1', NULL),
(277, NULL, 'YES', '2008-07-05', NULL, '1', NULL),
(278, NULL, 'YES', '2008-07-05', NULL, '1', NULL),
(279, NULL, 'YES', '2008-07-05', NULL, '1', NULL),
(280, NULL, 'YES', '2008-07-05', NULL, '1', NULL),
(281, NULL, 'YES', '2008-07-05', NULL, '1', NULL),
(282, NULL, 'YES', '2008-07-05', NULL, '1', NULL),
(283, NULL, 'YES', '2008-07-05', NULL, '1', NULL),
(284, NULL, 'YES', '2008-07-05', NULL, '1', NULL),
(285, NULL, 'YES', '2008-07-05', NULL, '1', NULL),
(286, NULL, 'YES', '2008-07-05', NULL, '1', NULL),
(287, NULL, 'YES', '2008-07-05', NULL, '1', NULL),
(288, NULL, 'YES', '2008-07-05', NULL, '1', NULL),
(289, NULL, 'YES', '2008-07-06', NULL, NULL, '1'),
(290, 'YES', 'YES', '2008-07-06', '2008-07-06', NULL, '1'),
(291, 'YES', 'YES', '2008-07-06', '2008-07-06', NULL, '1'),
(292, NULL, 'YES', '2008-07-06', NULL, NULL, '1'),
(293, NULL, 'YES', '2008-07-06', NULL, NULL, '1'),
(294, NULL, 'YES', '2008-07-06', NULL, NULL, '1'),
(295, NULL, 'YES', '2008-07-06', NULL, NULL, '1'),
(296, NULL, 'YES', '2008-07-06', NULL, NULL, '1'),
(297, NULL, 'YES', '2008-07-06', NULL, NULL, '1'),
(298, NULL, 'YES', '2008-07-06', NULL, NULL, '1'),
(299, 'YES', 'YES', '2008-07-06', '2008-07-06', NULL, '1'),
(300, 'YES', 'YES', '2008-07-06', '2008-07-06', NULL, '1'),
(301, 'YES', 'YES', '2008-07-06', '2008-07-06', NULL, '1'),
(302, 'YES', 'YES', '2008-07-06', '2009-02-07', NULL, '1'),
(303, 'YES', 'YES', '2008-07-06', '2009-02-07', NULL, '1'),
(304, NULL, 'YES', '2008-07-06', '2008-07-06', NULL, '1'),
(305, NULL, 'YES', '2008-07-06', NULL, '1', NULL),
(306, NULL, 'YES', '2008-07-06', NULL, '1', NULL),
(307, NULL, 'YES', '2008-07-06', NULL, '1', NULL),
(308, NULL, 'YES', '2008-07-06', NULL, '1', NULL),
(309, NULL, 'YES', '2008-07-06', NULL, '1', NULL),
(310, NULL, 'YES', '2008-07-06', '2008-07-10', '1', NULL),
(311, NULL, 'YES', '2008-07-06', '2008-07-10', '1', NULL),
(312, NULL, 'YES', '2008-07-08', '2008-07-10', '1', NULL),
(313, NULL, 'YES', '2008-07-08', '2008-07-10', '1', NULL),
(314, NULL, 'YES', '2008-07-09', '2008-07-10', '1', NULL),
(315, NULL, 'YES', '2008-07-10', '2008-07-10', '1', NULL),
(316, NULL, 'YES', '2008-08-12', NULL, NULL, '1'),
(317, NULL, 'YES', '2008-08-12', NULL, NULL, '1'),
(318, NULL, 'YES', '2008-08-12', NULL, NULL, '1'),
(319, 'YES', 'YES', '2008-08-12', '2009-02-07', NULL, '1'),
(320, 'YES', 'YES', '2009-02-07', '2009-02-07', NULL, '1'),
(321, NULL, 'YES', '2009-02-07', '2009-02-07', NULL, '1'),
(322, 'YES', 'YES', '2009-02-07', '2009-02-07', NULL, '1'),
(323, NULL, 'YES', '2009-08-18', NULL, NULL, '1'),
(324, NULL, 'YES', '2009-10-12', NULL, NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `mms_projectmedia`
--

CREATE TABLE IF NOT EXISTS `mms_projectmedia` (
  `media_id` bigint(255) NOT NULL auto_increment,
  `project_id` bigint(255) default NULL,
  `typeID` varchar(255) default '0',
  `mediaURL` varchar(255) default NULL,
  `caption` varchar(255) default NULL,
  `metaID` bigint(255) default '0',
  PRIMARY KEY  (`media_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `mms_projectmedia`
--

INSERT INTO `mms_projectmedia` (`media_id`, `project_id`, `typeID`, `mediaURL`, `caption`, `metaID`) VALUES
(1, 2, '8', '123', '123', 0),
(2, 2, '14', '123', '123', 0),
(3, 1, '13', 'test1', '1', 0),
(4, 1, '8', 'test2', '2', 0),
(5, 1, '18', 'test3', '3', 0),
(6, 3, '10', 'p', 'p', 0),
(7, 3, '13', 'w', 'w', 0),
(8, 1, '25', 'test4', '4', 0),
(9, 3, '14', 'h', 'h', 0),
(10, 1, '8', 'test5', '5', 0),
(11, 3, '25', 'c', 'c', 0),
(12, 1, '8', 'test6', '6', 0),
(13, 3, '18', 'm', 'm', 0),
(14, 1, '8', 'test7', '7', 0),
(15, 1, '8', 'test8', '8', 0),
(16, 1, '8', 'test9', '9', 0),
(17, 1, '8', 'test10', '10', 0),
(18, 1, '8', 'test11', '11', 241),
(19, 1, '8', 'test12', '12', 242),
(20, 1, '8', 'test13', '13', 246),
(21, 1, '8', 'test14', '14', 266),
(22, 3, '36', 'f', 'f', 310),
(23, 25, '26', 'qwe', 'qwe', 311),
(24, 25, '44', 'xxx', 'xxx', 312),
(25, 25, '23', 'yyy', 'yyy', 313),
(26, 25, '10', 'a', 'a', 314),
(27, 25, '13', '7', '7', 315);

-- --------------------------------------------------------

--
-- Table structure for table `mms_projects`
--

CREATE TABLE IF NOT EXISTS `mms_projects` (
  `project_id` bigint(255) NOT NULL auto_increment,
  `userid` bigint(255) NOT NULL default '0',
  `project_name` varchar(255) default NULL,
  `title_id` bigint(255) default '0',
  `title` varchar(255) default NULL,
  `topic` varchar(255) default NULL,
  `topicID` bigint(255) default NULL,
  `group_id` bigint(255) default '0',
  `group_name` bigint(255) default NULL,
  `headshotURL` varchar(255) default NULL,
  `mib_id` bigint(255) default '0',
  `mibyear` varchar(255) default NULL,
  `description` varchar(255) default NULL,
  `notes` varchar(255) default NULL,
  `projectURL` varchar(255) default NULL,
  `status` enum('A','I','D') default 'A',
  `metaID` bigint(255) default '0',
  PRIMARY KEY  (`project_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `mms_projects`
--

INSERT INTO `mms_projects` (`project_id`, `userid`, `project_name`, `title_id`, `title`, `topic`, `topicID`, `group_id`, `group_name`, `headshotURL`, `mib_id`, `mibyear`, `description`, `notes`, `projectURL`, `status`, `metaID`) VALUES
(1, 0, 'sajib''s', 0, '1', '0', NULL, 17, 3, 'tsun''sami.jpg', 2007, '2007', 'project about tfggggggsunami in Srilanka/''s', NULL, 'tsunam''si.gol@jbt.com', 'A', 0),
(2, 0, '', 0, 'dsfd', '0', NULL, 0, NULL, '123', 2008, '2008', '123', NULL, '123', 'D', 0),
(3, 0, '', 0, '3', '0', NULL, 18, NULL, 'www', 2008, '2008', '1', NULL, 'ww@ww.com', 'A', 0),
(5, 0, NULL, 0, 'gfg', NULL, NULL, 14, NULL, 'fdgfdg', 0, '2007', NULL, NULL, 'GDSGD', 'A', 0),
(6, 0, NULL, 0, 'www', NULL, NULL, 14, NULL, 'sdgfgsdg@fv.com', 0, '2008', NULL, NULL, 'qaewaewq', 'D', 0),
(16, 0, NULL, 0, 'adsd', NULL, NULL, 0, NULL, '', 0, '2008', NULL, NULL, 'edfrewtrfheadshotURL=dfedf', 'D', 182),
(18, 0, NULL, 0, 'q', NULL, NULL, 14, NULL, '', 0, '2007', NULL, NULL, 'kkkkheadshotURL=kkk', 'D', 0),
(19, 0, NULL, 0, 'AAA', NULL, NULL, 14, NULL, 'AAA', 0, '2008', NULL, NULL, 'AAAheadshotURL=AAA', 'D', 234),
(20, 0, NULL, 0, 'sdaddsa', NULL, NULL, 0, NULL, 'cgvfg', 0, '2008', NULL, NULL, 'fdfheadshotURL=dfdfv', 'D', 238),
(21, 0, NULL, 0, '1', NULL, NULL, 23, NULL, '', 0, '1', NULL, NULL, '1headshotURL=1', 'A', 243),
(22, 0, NULL, 0, '2', NULL, NULL, 23, NULL, '', 0, '2', NULL, NULL, '2headshotURL=2', 'A', 244),
(23, 0, NULL, 0, '4', NULL, NULL, 23, NULL, '123', 0, '2008', 'rfdsf', NULL, '123', 'A', 245),
(24, 0, NULL, 0, 'test', NULL, NULL, 23, NULL, 'test', 0, '3454', 'hgsdgf"bvx', NULL, 'test', 'A', 253),
(25, 0, NULL, 0, '123', NULL, NULL, 23, NULL, '123', 0, '2008', '1231321212', NULL, '123', 'A', 254),
(26, 0, NULL, 0, '''sajib'' ''saha''', NULL, NULL, 23, NULL, 'google.com', 0, '2008', 'sajib''s description', NULL, 'saha.sajib@rediffmail.com', 'A', 255),
(27, 0, NULL, 0, 'dv', NULL, NULL, 16, NULL, 'bcx', 0, '5467546', 'cxvc', NULL, 'cbc', 'A', 304);

-- --------------------------------------------------------

--
-- Table structure for table `mms_project_assign`
--

CREATE TABLE IF NOT EXISTS `mms_project_assign` (
  `project_asign_id` bigint(255) NOT NULL auto_increment,
  `project_id` bigint(255) default '0',
  `userid` bigint(255) default '0',
  `group_id` bigint(255) NOT NULL default '0',
  `status` enum('A','I','D') default 'A',
  `metaID` bigint(255) default '0',
  PRIMARY KEY  (`project_asign_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `mms_project_assign`
--

INSERT INTO `mms_project_assign` (`project_asign_id`, `project_id`, `userid`, `group_id`, `status`, `metaID`) VALUES
(20, 2, 83, 0, 'D', 0),
(23, 1, 0, 18, 'D', 0),
(25, 1, 1, 0, 'D', 0),
(31, 3, 83, 0, 'A', 0),
(32, 1, 83, 0, 'A', 0),
(33, 3, 1, 0, 'A', 0),
(34, 1, 92, 0, 'A', 0),
(35, 16, 97, 0, 'A', 0),
(36, 6, 107, 0, 'D', 0),
(37, 5, 101, 0, 'D', 248),
(38, 25, 1, 0, 'D', 269),
(39, 24, 101, 0, 'D', 299),
(40, 5, 107, 0, 'D', 300),
(41, 24, 105, 0, 'D', 301),
(42, 26, 107, 0, 'D', 302),
(43, 26, 92, 0, 'D', 303),
(44, 24, 94, 0, 'D', 320),
(45, 24, 97, 0, 'A', 323),
(46, 24, 98, 0, 'A', 324);

-- --------------------------------------------------------

--
-- Table structure for table `mms_student`
--

CREATE TABLE IF NOT EXISTS `mms_student` (
  `studentID` bigint(255) NOT NULL auto_increment,
  `userid` bigint(20) default NULL,
  `course_id` bigint(255) default NULL,
  `course_name` varchar(255) default NULL,
  `firstName` varchar(255) default NULL,
  `secondName` varchar(255) default NULL,
  `familyName` varchar(255) default NULL,
  `address` varchar(255) NOT NULL,
  `institution_id` bigint(255) NOT NULL default '0',
  `portfolioURL` varchar(255) default NULL,
  `mobile` bigint(255) default '0',
  `landline` varchar(255) default '0',
  `zip` bigint(255) default '0',
  `fax` bigint(255) NOT NULL,
  `statement` varchar(255) default NULL,
  `country_id` varchar(255) default NULL,
  `metaID` bigint(255) NOT NULL default '0',
  `status` enum('A','I','D') NOT NULL default 'A',
  PRIMARY KEY  (`studentID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `mms_student`
--

INSERT INTO `mms_student` (`studentID`, `userid`, `course_id`, `course_name`, `firstName`, `secondName`, `familyName`, `address`, `institution_id`, `portfolioURL`, `mobile`, `landline`, `zip`, `fax`, `statement`, `country_id`, `metaID`, `status`) VALUES
(8, 1, 32, '4', 'Courtney', ' Mbwanga', NULL, 'Kohalampur', 12, 'test@test.co.in', 9874695869, '32653222', 54534, 57, 'statement should be given here', '0', 0, 'A'),
(9, 83, 46, '2', 'Raju', 'Sarkar', NULL, 'Durganagar', 5, 'http://192.168.1.2/brunell/webmaster/student.php', 93392586544, '25663698', 7000025, 5589655632, 'this is very important to see.', '45', 0, 'A'),
(12, 91, 32, NULL, 'sajib', 'saha', NULL, 'Durganagar', 12, 'http://192.168.1.2/brunell/webmaster/', 9874585477, '32546552', 700065, 55486, 'Nothing', '105', 0, 'A'),
(13, 92, 37, NULL, 'Raju', 'Sarkar', NULL, 'Badrah', 0, 'http://192.168.1.2/brunell/webmaster/', 9874585477, '32546552', 700065, 5569856698, 'Nothing', '104', 0, 'A'),
(14, 96, 40, NULL, 'TRYG', 'GFUJHTY', NULL, 'THRG', 13, 'YHG', 5484, '4654', 0, 6544, 'GFHGFHGH', '17', 188, 'A'),
(15, 97, 32, NULL, 'ali', 'mallik', NULL, 'dumdum', 9, 'ali@dum.com', 546547, '454564', 0, 54564, 'judhfy gdffre xvs ', '5', 190, 'A'),
(16, 98, 40, NULL, 'sd', 'sad', NULL, 'sd', 13, 'sdsad', 245, '5645', 0, 545, 'ssadadsa', '18', 192, 'A'),
(18, 100, 41, NULL, '1', '1', NULL, '123', 13, '1', 123, '123', 0, 1, '1', '335', 201, 'D'),
(19, 101, 40, NULL, 'Sajib', 'Saha', NULL, 'Durganagar', 9, 'something@test.com', 9883569479, '25660611', 0, 5502363022, 'Nothing', '99', 203, 'A'),
(20, 102, 48, NULL, 'aaa', 'sss', NULL, 'zzz', 8, 'aa@sss.com', 574, '454', 0, 4545, 'nothing', '0', 211, 'A'),
(21, 103, 44, NULL, 'qweqw', 'wqeq', NULL, 'qewq', 12, 'wqe', 4545, '5454', 0, 5454, 'fgrth', '9', 213, 'A'),
(22, 104, 44, NULL, '123', '123', NULL, '123', 12, '123', 123, '123', 0, 123, '123', '58', 215, 'D'),
(23, 105, 44, NULL, '123', '123', NULL, '132', 5, '123', 123, '132', 0, 123, '132', '58', 217, 'A'),
(25, 107, 42, NULL, 'Arman', 'Malik', NULL, 'Mumbai', 9, 'www.hrkali.co.in', 123, '123', 0, 123, 'Nothing', '32', 224, 'A'),
(26, 109, 41, NULL, 'ZZZAAA', 'ZZZAAA', NULL, 'ZZZAAAA', 29, 'ZZZ', 111, '111', 0, 111, 'ZZZ', '9', 236, 'D'),
(27, 110, 40, NULL, 'ami', 'tumi', NULL, 'ami', 12, 'ami', 321, '321', 0, 322, 'ami', '4', 240, 'D'),
(28, 111, 41, NULL, 'tg', 'etrt', NULL, '`r', 21, 'etgf''fdg', 35435, '865675', 0, 7657656, 'hfg''nhfd`hvh', '248', 259, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `mms_user`
--

CREATE TABLE IF NOT EXISTS `mms_user` (
  `userid` bigint(20) NOT NULL auto_increment,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(100) default NULL,
  `email` varchar(255) default NULL,
  `permission` varchar(255) default NULL,
  `metaID` bigint(255) default '0',
  `userstatus` enum('A','I','D') NOT NULL default 'A',
  PRIMARY KEY  (`userid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=112 ;

--
-- Dumping data for table `mms_user`
--

INSERT INTO `mms_user` (`userid`, `user_name`, `password`, `email`, `permission`, `metaID`, `userstatus`) VALUES
(1, 'test', 'TVRJek5EVTI', 'gdafds@gfgfsd.com', '', 241, 'A'),
(3, 'test3', '123456', 'soumya@encoders.co.in', '', 0, 'A'),
(4, 'test44', 'nabarun', 'test@test.com', '', 0, 'A'),
(72, 'test65', 'demo', 'demo', '', 0, 'A'),
(71, 'test77', 'test', 'test', '', 0, 'A'),
(67, 'test3432', 'test1', 'test1', '', 0, 'A'),
(74, 'test324', '123', 'paul_mithun@hotmail.com', '', 0, 'A'),
(75, 'hjgyu', 'ygysdt', 'gdsyf@hgdv.com', NULL, 0, 'A'),
(2, 'jgfvghdsf', '0000000000', 'bhvbfgf@hfgdhf.com', NULL, 0, 'A'),
(83, 'user1', 'TVRJek5EVTI', 'raju.pass@user.com', NULL, 0, 'A'),
(88, 'dgds', 'dsg', '', NULL, 0, 'A'),
(84, 'test3244323', '1', '1', NULL, 0, 'A'),
(93, 'test2', 'test2', 'fdhgfhg', NULL, 162, 'A'),
(91, 'saha.roni', 'T1RnMw', 'roni.saha@hotmail.com', NULL, 0, 'A'),
(92, 'sarkar.raju', 'password', 'roni.saha@hotmail.com', NULL, 0, 'A'),
(94, '', '', '', NULL, 173, 'A'),
(95, 'aaa', 'aaa', 'AAA', NULL, 185, 'A'),
(96, 'DSGFG', 'FDGFGG', 'FGHG', NULL, 187, 'A'),
(97, 'joomla', '123456', 'hazrat@kali.com', NULL, 189, 'A'),
(98, 'sdad', '000', 'sds', NULL, 191, 'A'),
(100, '1', '1', '1', NULL, 200, 'D'),
(101, 'saha.sajib', 'TXc9PQ', 'msoft.sajib@gmail.com', NULL, 202, 'A'),
(102, 'test', 'TVRJeg', 'saha.sajib87@gmail.com', NULL, 210, 'A'),
(103, 'qwew', '000', 'contact.subi.roy@gmail.com', NULL, 212, 'A'),
(104, '123', '123', '123', NULL, 214, 'D'),
(105, '3211', 'TXpFeU1USXo', 'Ã¨', NULL, 216, 'A'),
(107, 'oops', 'YjI5d2N3PT0', 'roni.saha@hotmail.com', NULL, 223, 'A'),
(109, 'ZZZAAA', 'V2xwYVFVRkI', 'ZZZ', NULL, 235, 'D'),
(110, 'ami', 'WVcxcA', 'ami', NULL, 239, 'D'),
(111, 'WWqr`rd', 'WlhSeVpYUT0', 'jhs''cdv', NULL, 258, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `mms_webmaster`
--

CREATE TABLE IF NOT EXISTS `mms_webmaster` (
  `a_id` int(11) NOT NULL auto_increment,
  `user_name` varchar(255) NOT NULL default '',
  `user_pass` varchar(255) NOT NULL default '',
  `status` enum('A','I','D') default 'A',
  `Email` text,
  `Telephone` varchar(255) default NULL,
  `privilages` enum('Super','Normal') NOT NULL default 'Normal',
  `metaID` bigint(255) default '0',
  PRIMARY KEY  (`a_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `mms_webmaster`
--

INSERT INTO `mms_webmaster` (`a_id`, `user_name`, `user_pass`, `status`, `Email`, `Telephone`, `privilages`, `metaID`) VALUES
(1, 'admin', 'TVRJeg', 'A', 'gh''sdv@jhgsdj.com', '1111', 'Super', 0),
(2, 'adminlocri', 'TURBd01EQT0', 'A', 'adm''in@clori.com', '9874586', 'Normal', 0),
(3, 'adminsiderno', 'TlRVMQ', 'A', '', '324534', 'Normal', 0),
(23, 'cwo', 'TkRVMg', 'A', 'qwe.ewq@weq.com', '98745854635', 'Super', 0),
(34, 'HRID', 'TVRBeE1BPT0', 'A', 'HRID', '9856985636', 'Super', 0),
(36, 'xdfgdg', 'TVRFeA', 'A', 'fgfd', '567864', 'Super', 0),
(40, 'raju', 'TURBd01BPT0', 'A', 'raju1', '987', 'Super', 0),
(41, '123', 'TVRJeg', 'A', '123', '123', 'Super', 0),
(42, '1', 'TVE9PQ', 'A', '1', '11', 'Super', 0),
(43, 'AAAzzz', 'T1RnMw', 'D', 'AAAzzz', '987', 'Super', 232),
(44, 'qw''qw', 'ZHc9PQ', 'A', 'q''w', 'w', 'Super', 260),
(45, '', '', 'A', '', '', 'Super', 316);
