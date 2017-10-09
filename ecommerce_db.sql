-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2017 at 07:20 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ecommerce_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_about`
--

CREATE TABLE IF NOT EXISTS `tbl_about` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `about_img` text NOT NULL,
  `descr` text NOT NULL,
  `user_create` char(30) NOT NULL,
  `date_create` date NOT NULL,
  `user_update` char(30) NOT NULL,
  `date_update` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_about`
--

INSERT INTO `tbl_about` (`id`, `about_img`, `descr`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
(1, 'success.jpg', '<p>zsdgsgsdfg sd,fhgsjkg asfgsrf sk uhgklsgsdfgsdfgzsdv zsdv&nbsp;</p>', 'admin', '2017-08-29', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_account`
--

CREATE TABLE IF NOT EXISTS `tbl_account` (
  `acc_id` int(11) NOT NULL AUTO_INCREMENT,
  `acc_code` varchar(50) DEFAULT NULL,
  `acc_password` varchar(220) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `mem_id` int(11) DEFAULT NULL,
  `sex` char(1) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `pob` text,
  `acc_type` varchar(100) DEFAULT NULL,
  `acc_img` varchar(200) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `position` varchar(100) DEFAULT NULL,
  `contact_phone` varchar(100) DEFAULT NULL,
  `loc_id` int(11) DEFAULT NULL,
  `user_crea` varchar(50) DEFAULT NULL,
  `date_crea` date DEFAULT NULL,
  `user_updt` varchar(50) DEFAULT NULL,
  `date_updt` date DEFAULT NULL,
  PRIMARY KEY (`acc_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=99 ;

--
-- Dumping data for table `tbl_account`
--

INSERT INTO `tbl_account` (`acc_id`, `acc_code`, `acc_password`, `status`, `mem_id`, `sex`, `dob`, `pob`, `acc_type`, `acc_img`, `company`, `position`, `contact_phone`, `loc_id`, `user_crea`, `date_crea`, `user_updt`, `date_updt`) VALUES
(40, 'acc0016', '12', 0, 0, 'F', '2017-08-10', '<p>&lt;p&gt;zxcvzcv&lt;/p&gt;</p>', 'Agent', 'Boy_photo.jpg', 'test', 'admin', '070433494', 1, 'admin', '2017-08-10', 'admin', '2017-08-10'),
(58, 'acc0003', '123', 1, 54, 'F', '2017-08-28', '<p>asdf</p>', 'General', 'success.jpg', 'no', 'no', '070854432', 1, 'admin', '2017-08-28', NULL, NULL),
(87, 'acc0043', '12345678', 0, 80, 'M', '2017-09-25', NULL, 'Agent', 'member_icon.jpg', 'Ampil', 'Agent', NULL, 1, NULL, '2017-09-25', NULL, NULL),
(82, 'acc0003', NULL, 0, NULL, NULL, NULL, NULL, 'General', 'no-image11.png', NULL, NULL, '07095445', NULL, NULL, NULL, NULL, NULL),
(85, 'acc0000017', NULL, 0, 80, NULL, NULL, NULL, 'General', NULL, NULL, NULL, NULL, 1, NULL, '2017-09-25', NULL, NULL),
(86, 'acc0018', '12345678', 1, 80, 'M', '2017-09-25', NULL, 'Shop-owner', 'Boy_photo.jpg', 'amppil', 'Shop Owner', NULL, 1, NULL, '2017-09-25', NULL, NULL),
(88, 'acc0055', '123', 1, 80, 'M', '2017-09-26', NULL, 'Bussiness', 'member_icon.jpg', 'Amppil', 'Businness', NULL, 1, NULL, '2017-09-26', NULL, NULL),
(94, 'acc0000056', '123', 1, 83, '0', '2017-09-28', '', 'General', NULL, '', '', '', 1, NULL, '2017-09-28', 'admin', '2017-09-28'),
(95, 'acc0023', '1234', 1, 83, 'M', '0000-00-00', NULL, 'Shop-owner', 'member_icon.jpg', 'Amppil', 'Shop-Owner', NULL, 1, NULL, '2017-09-28', NULL, NULL),
(96, 'acc0000056', '123', 0, 84, NULL, NULL, NULL, 'General', NULL, NULL, NULL, NULL, 1, NULL, '2017-10-03', NULL, NULL),
(97, 'acc0000056', '123', 0, 85, NULL, NULL, NULL, 'General', NULL, NULL, NULL, NULL, 1, '84', '2017-10-04', NULL, NULL),
(98, 'acc0009', '123', 1, 83, 'n', '0000-00-00', NULL, 'Association', '', '', '', NULL, 4, NULL, '2017-10-05', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_advertisement`
--

CREATE TABLE IF NOT EXISTS `tbl_advertisement` (
  `ad_id` int(11) NOT NULL AUTO_INCREMENT,
  `ad_name` varchar(150) NOT NULL,
  `ad_desc` text,
  `img` varchar(150) DEFAULT NULL,
  `page` varchar(100) DEFAULT NULL,
  `url` text,
  `advertiser` varchar(100) DEFAULT NULL,
  `position` varchar(100) DEFAULT NULL,
  `price` decimal(18,2) DEFAULT NULL,
  `height` varchar(10) DEFAULT NULL,
  `user_crea` varchar(50) NOT NULL,
  `date_crea` date NOT NULL,
  `user_updt` varchar(50) DEFAULT NULL,
  `date_updt` date DEFAULT NULL,
  PRIMARY KEY (`ad_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbl_advertisement`
--

INSERT INTO `tbl_advertisement` (`ad_id`, `ad_name`, `ad_desc`, `img`, `page`, `url`, `advertiser`, `position`, `price`, `height`, `user_crea`, `date_crea`, `user_updt`, `date_updt`) VALUES
(1, 'Testing Advertisement1', '<p>Testing</p>', 'Barbeque.png', NULL, 'http://www.google.com1', 'samnang1', 'left', '51.00', '1001px', 'admin', '2017-02-14', NULL, NULL),
(3, 'sdadsasdsad', '<p>&lt;p&gt;&amp;lt;p&amp;gt;&amp;amp;lt;p&amp;amp;gt;&amp;amp;amp;lt;p&amp;amp;amp;gt;zcsdsdasadsadsadasdsadasdsadasd&amp;amp;amp;lt;/p&amp;amp;amp;gt;&amp;amp;lt;/p&amp;amp;gt;&amp;lt;/p&amp;gt;&lt;/p&gt;</p>', '102542cb0722406c9bb21bb3a7e10900.jpg', 'Home', 'https://www.facebook.com/webtech.solution.kh/?fref=ts', 'dsdsdd', 'left', '900.00', '500', 'N/A', '2017-03-19', 'admin', '2017-08-24'),
(4, 'sddadasdasd', '<p>dsadaddsadsadsad dasdasds</p>', '45af64a1eeed8803facd4d739f804dd1.gif', 'Home', 'https://www.khmer24.com/', 'dsaadasd', 'right', '300.00', '500', 'N/A', '2017-03-19', NULL, NULL),
(5, 'sdfsfsa', '<p>asddadasdsdasddsa</p>', 'minyuan.gif', 'Products', 'https://www.facebook.com/groups/717636341737804/', 'sddadd', 'left', '40.00', '200', 'N/A', '2017-03-19', NULL, NULL),
(6, 'fsdfdsfdfdf', '<p>sdfdsffsdfdsf</p>', 'meng-hak.gif', 'Products', 'fedftereerew', 'sdffdsfsf', 'right', '600.00', '300', 'N/A', '2017-03-19', NULL, NULL),
(7, 'ewqewqeqe', '<p>dfsfdsfsfdsfsf</p>', '8655996739695547732.jpg', 'page detail', 'https://www.facebook.com/webtech.solution.kh/?fref=ts', 'dasdsadsada', 'right', '7000.00', '400', 'N/A', '2017-03-19', NULL, NULL),
(8, 'sdfdsfdsfdf', '<p>&lt;p&gt;adadadasd&lt;/p&gt;</p>', 'advertising.png', 'page detail', 'https://www.khmer24.com/c-house-for-sale.html', 'dfsfs', 'center', '444.00', '140', 'N/A', '2017-03-19', 'N/A', '2017-03-19'),
(9, 'HHHHHHHH', '<p>ddasddadadasdsad</p>', 'rane140.gif', 'Products', 'http://getbootstrap.com/components/', 'sdfsdfs', 'left', '500.00', '200', 'N/A', '2017-03-30', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blog`
--

CREATE TABLE IF NOT EXISTS `tbl_blog` (
  `bl_id` int(10) NOT NULL AUTO_INCREMENT,
  `title` char(225) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bl_desc` text COLLATE utf8_unicode_ci,
  `user_crea` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_crea` date DEFAULT NULL,
  `user_updt` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_updt` date DEFAULT NULL,
  `status` char(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`bl_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_blog`
--

INSERT INTO `tbl_blog` (`bl_id`, `title`, `bl_desc`, `user_crea`, `date_crea`, `user_updt`, `date_updt`, `status`, `img`) VALUES
(1, 'SAVE WITH EVERYDAY LOW PRICES', '<h1 id="itemTitle" class="it-ttl" style="margin-top: 0px; margin-bottom: 0px; font-size: 18px; font-weight: bold; line-height: normal; font-family: ''Helvetica neue'', Helvetica, Verdana, sans-serif; color: #333333; display: inline; background-color: #f8f8f8;">Alpinestars Mens Supertech R Original Style Boots</h1>\r\n<p>&nbsp;</p>\r\n<h2 id="subTitle" class="it-sttl" style="margin-top: 0px; margin-bottom: 0px; font-size: small; line-height: normal; font-family: ''Helvetica neue'', Helvetica, Verdana, sans-serif; background-color: #f8f8f8; color: #777777 !important;">FREE Domestic Shipping - New Items - Excellent Service</h2>', 'admin', '2017-08-11', NULL, NULL, 'enable', 's-l300.jpg'),
(2, 'SAVE WITH EVERYDAY LOW PRICES', '<p>River Road Textile Sissy Bar Bag Black M/Medium</p>\r\n<div class="" style="font-size: 13px; font-family: ''Helvetica neue'', Helvetica, Verdana, sans-serif; color: #333333; background-color: #f8f8f8;">\r\n<div id="vi-itt-filler">&nbsp;</div>\r\n<h2 id="subTitle" class="it-sttl" style="margin-top: 0px; margin-bottom: 0px; font-size: small; line-height: normal; font-family: ''Helvetica neue'', Helvetica, Verdana, sans-serif; color: #777777 !important;">FREE Domestic Shipping - New Items - Excellent Service</h2>\r\n</div>', 'admin', '2017-08-11', NULL, NULL, 'enable', 's-l500.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE IF NOT EXISTS `tbl_brand` (
  `brn_id` int(11) NOT NULL AUTO_INCREMENT,
  `brn_name` varchar(150) DEFAULT NULL,
  `brn_desc` text,
  `user_crea` varchar(50) DEFAULT NULL,
  `date_crea` date DEFAULT NULL,
  `user_updt` varchar(50) DEFAULT NULL,
  `date_updt` date DEFAULT NULL,
  PRIMARY KEY (`brn_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brn_id`, `brn_name`, `brn_desc`, `user_crea`, `date_crea`, `user_updt`, `date_updt`) VALUES
(3, 'IPhone', '<p>fgh</p>', 'admin', '2017-01-23', 'admin', '2017-08-14'),
(4, 'Samsung', '<p>zxcvzxcv</p>', 'admin', '2017-01-23', 'admin', '2017-08-10'),
(7, 'Dell', '<p>zxcvzxc</p>', 'admin', '2017-08-10', 'admin', '2017-08-24'),
(9, 'Adidas', '<p>Adidas in stock</p>', 'admin', '2017-08-15', 'admin', '2017-08-24');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE IF NOT EXISTS `tbl_category` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `cat_name` varchar(150) DEFAULT NULL,
  `cat_name_kh` varchar(150) DEFAULT NULL,
  `cat_name_ch` varchar(150) DEFAULT NULL,
  `cat_desc` text,
  `user_crea` varchar(50) DEFAULT NULL,
  `date_crea` date DEFAULT NULL,
  `user_updt` varchar(50) DEFAULT NULL,
  `date_updt` date DEFAULT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`cat_id`, `parent_id`, `cat_name`, `cat_name_kh`, `cat_name_ch`, `cat_desc`, `user_crea`, `date_crea`, `user_updt`, `date_updt`) VALUES
(6, 0, 'Construction Materials ', 'សំភារៈសំណង់', '建築材料', '<p>ccccccccccccccccccccc</p>', 'admin', '2017-07-21', NULL, NULL),
(5, 0, 'Agricultural Equipment', 'សំភារៈសិកម្ម', '農業設備', '<p>សដថសដដថដសថ</p>', 'Admin', '2017-03-30', NULL, NULL),
(7, 0, ' Household devices', 'ឧបករណ៍ប្រើប្រាស់ក្នុងផ្ទះ', '家用設備', '<p>ដថសថសថសដថសថសដថ</p>', 'Admin', '2017-03-30', NULL, NULL),
(8, 0, 'Classify', 'សំភារៈផ្សេងៗ', '分類', '<p>សាដសាថាសាសដាស​ដសថដ</p>', 'Admin', '2017-03-30', NULL, NULL),
(11, 6, ',kjhj', ',mn', '.,m', '<p>,kjh</p>', 'admin', '2017-09-28', NULL, NULL),
(12, 6, ',Boy', '.,m', ',mn', '', 'admin', '2017-09-29', NULL, NULL),
(13, 6, ',boyyyy', '.,m', ',mn', '', 'admin', '2017-09-29', NULL, NULL),
(14, 6, 'vf', ',mn', '.,m', '', 'admin', '2017-09-29', NULL, NULL),
(15, 6, ',kjhj', '.,m', ',mn', '', 'admin', '2017-09-29', NULL, NULL),
(16, 6, ',kjhj', '.,m', ',mn', '', 'admin', '2017-09-29', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_combind`
--

CREATE TABLE IF NOT EXISTS `tbl_combind` (
  `com_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `shop_id` int(11) NOT NULL,
  `bus_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  PRIMARY KEY (`com_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_combind`
--

INSERT INTO `tbl_combind` (`com_id`, `shop_id`, `bus_id`, `p_id`) VALUES
(1, 95, 88, 101),
(2, 96, 88, 102);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comment`
--

CREATE TABLE IF NOT EXISTS `tbl_comment` (
  `cm_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `comment` text COLLATE utf8_unicode_ci,
  `cm_crea` date DEFAULT NULL,
  `bl_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`cm_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_comment`
--

INSERT INTO `tbl_comment` (`cm_id`, `comment`, `cm_crea`, `bl_id`) VALUES
(1, 'fdvasdv', '2017-08-11', 1),
(2, 'good', '2017-08-18', 2),
(3, '12', '2017-08-18', 2),
(4, 'zxdvzsdv', '2017-08-25', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact_us`
--

CREATE TABLE IF NOT EXISTS `tbl_contact_us` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `contact_desc` text NOT NULL,
  `phone1` char(50) NOT NULL,
  `phone2` char(50) NOT NULL,
  `email` char(50) NOT NULL,
  `addr` varchar(100) NOT NULL,
  `fb` char(50) NOT NULL,
  `web` char(100) NOT NULL,
  `user_create` char(30) NOT NULL,
  `date_create` date NOT NULL,
  `user_update` char(30) NOT NULL,
  `date_update` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_contact_us`
--

INSERT INTO `tbl_contact_us` (`id`, `contact_desc`, `phone1`, `phone2`, `email`, `addr`, `fb`, `web`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
(2, '<p>sdf</p>', '070834493', '078459422', 'nharboy99@gmail.com', '<p>sfg</p>', 'sdfg', 'sdf', 'admin', '2017-08-25', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_coupon`
--

CREATE TABLE IF NOT EXISTS `tbl_coupon` (
  `cpn_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cpn_code` char(12) NOT NULL,
  `cpn_usd` decimal(18,2) NOT NULL,
  `cpn_status` char(1) NOT NULL,
  `valid_from` date NOT NULL,
  `valid_to` date NOT NULL,
  `user_crea` varchar(100) NOT NULL,
  `date_crea` date NOT NULL,
  PRIMARY KEY (`cpn_id`),
  UNIQUE KEY `cpn_code` (`cpn_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=159 ;

--
-- Dumping data for table `tbl_coupon`
--

INSERT INTO `tbl_coupon` (`cpn_id`, `cpn_code`, `cpn_usd`, `cpn_status`, `valid_from`, `valid_to`, `user_crea`, `date_crea`) VALUES
(142, '139228610190', '20.00', '1', '2017-03-07', '2017-03-07', 'admin', '2017-03-07'),
(143, '762119515020', '20.00', '1', '2017-03-07', '2017-03-07', 'admin', '2017-03-07'),
(144, '142373975326', '20.00', '1', '2017-03-07', '2017-03-07', 'admin', '2017-03-07'),
(145, '605870611262', '20.00', '1', '2017-03-07', '2017-03-07', 'admin', '2017-03-07'),
(146, '118431952580', '20.00', '1', '2017-03-07', '2017-03-07', 'admin', '2017-03-07'),
(147, '144049036726', '20.00', '1', '2017-03-07', '2017-03-07', 'admin', '2017-03-07'),
(148, '852794822906', '100.00', '1', '2017-03-07', '2017-03-07', 'admin', '2017-03-07'),
(149, '128469436508', '100.00', '1', '2017-03-07', '2017-03-07', 'admin', '2017-03-07'),
(150, '403559557045', '100.00', '1', '2017-03-07', '2017-03-07', 'admin', '2017-03-07'),
(151, '421277887112', '100.00', '1', '2017-03-07', '2017-03-07', 'admin', '2017-03-07'),
(152, '117039274669', '100.00', '1', '2017-03-07', '2017-03-07', 'admin', '2017-03-07'),
(153, '828976333988', '900.00', '1', '2017-03-07', '2017-03-07', 'admin', '2017-03-07'),
(154, '635645618427', '900.00', '1', '2017-03-07', '2017-03-07', 'admin', '2017-03-07'),
(155, '328215552943', '900.00', '1', '2017-03-07', '2017-03-07', 'admin', '2017-03-07'),
(156, '555901077536', '900.00', '1', '2017-03-07', '2017-03-07', 'admin', '2017-03-07'),
(157, '477867729029', '900.00', '1', '2017-03-07', '2017-03-07', 'admin', '2017-03-07'),
(158, '194085955188', '900.00', '1', '2017-03-07', '2017-03-07', 'admin', '2017-03-07');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_inventories`
--

CREATE TABLE IF NOT EXISTS `tbl_inventories` (
  `inv_id` int(11) NOT NULL AUTO_INCREMENT,
  `inv_code` varchar(100) DEFAULT NULL,
  `inv_name` varchar(100) NOT NULL,
  `acc_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `brn_id` int(11) NOT NULL,
  `inv_desc` text,
  `inv_short_desc` varchar(250) DEFAULT NULL,
  `price` decimal(18,2) NOT NULL,
  `color` varchar(50) DEFAULT NULL,
  `size` varchar(50) DEFAULT NULL,
  `model` varchar(100) DEFAULT NULL,
  `date_release` date NOT NULL,
  `dimensiion` varchar(250) DEFAULT NULL,
  `inv_status` int(11) NOT NULL,
  `user_crea` varchar(100) DEFAULT NULL,
  `date_crea` date DEFAULT NULL,
  `user_updt` varchar(100) DEFAULT NULL,
  `date_updt` date DEFAULT NULL,
  PRIMARY KEY (`inv_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_inventories`
--

INSERT INTO `tbl_inventories` (`inv_id`, `inv_code`, `inv_name`, `acc_id`, `cat_id`, `brn_id`, `inv_desc`, `inv_short_desc`, `price`, `color`, `size`, `model`, `date_release`, `dimensiion`, `inv_status`, `user_crea`, `date_crea`, `user_updt`, `date_updt`) VALUES
(4, 'item000001', 'Herbalife', 21, 2, 3, '<p>This a sample description.</p>', NULL, '37.00', 'vanilla', '', '', '2017-03-24', '', 1, '1', '2017-03-24', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_location`
--

CREATE TABLE IF NOT EXISTS `tbl_location` (
  `loc_id` int(11) NOT NULL AUTO_INCREMENT,
  `loc_name` varchar(150) DEFAULT NULL,
  `loc_desc` text,
  `user_crea` varchar(50) DEFAULT NULL,
  `date_crea` date DEFAULT NULL,
  `user_updt` varchar(50) DEFAULT NULL,
  `date_updt` date DEFAULT NULL,
  PRIMARY KEY (`loc_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_location`
--

INSERT INTO `tbl_location` (`loc_id`, `loc_name`, `loc_desc`, `user_crea`, `date_crea`, `user_updt`, `date_updt`) VALUES
(1, 'Phnom Penh', '<p>Test</p>', 'admin', '2017-01-23', NULL, NULL),
(4, 'Battambong', '', 'Admin', '2017-01-24', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_media`
--

CREATE TABLE IF NOT EXISTS `tbl_media` (
  `media_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_id` int(11) DEFAULT NULL,
  `alt` text,
  `url` text,
  `path` text,
  `media_type` varchar(50) DEFAULT NULL,
  `user_crea` varchar(50) DEFAULT NULL,
  `date_crea` date DEFAULT NULL,
  `user_updt` varchar(50) DEFAULT NULL,
  `date_updt` date DEFAULT NULL,
  PRIMARY KEY (`media_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=89 ;

--
-- Dumping data for table `tbl_media`
--

INSERT INTO `tbl_media` (`media_id`, `p_id`, `alt`, `url`, `path`, `media_type`, `user_crea`, `date_crea`, `user_updt`, `date_updt`) VALUES
(88, 101, NULL, NULL, 'images.jpg', 'txtMediaType', 'admin', '2017-09-25', NULL, NULL),
(84, 97, NULL, NULL, 'photo_2017-03-06_17-14-46 (1).jpg', 'inventory', '53', '2017-08-24', NULL, NULL),
(87, 100, NULL, NULL, 'Sorry, your file is too large.Sorry, your file was not uploaded.', NULL, NULL, '2017-09-11', NULL, NULL),
(86, 99, NULL, NULL, 'd76ce6f34f482e4d2982e162c0fa30d0--gold-everything-adidas-clothing.jpg', NULL, NULL, '2017-08-25', NULL, '2017-08-25'),
(85, 98, NULL, NULL, '90fbbbe8385d541c06f8f4bfd8b6092b--urban-outfit-adidas-fashion.jpg', NULL, NULL, '2017-08-25', NULL, NULL),
(83, 96, NULL, NULL, 'photo_2017-03-06_17-14-46 (1).jpg', 'inventory', '53', '2017-08-24', NULL, NULL),
(81, 93, NULL, NULL, 'd76ce6f34f482e4d2982e162c0fa30d0--gold-everything-adidas-clothing.jpg', NULL, NULL, '2017-08-24', '53', '2017-08-24');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member`
--

CREATE TABLE IF NOT EXISTS `tbl_member` (
  `mem_id` int(11) NOT NULL AUTO_INCREMENT,
  `mem_code` varchar(100) DEFAULT NULL,
  `mem_name` varchar(100) DEFAULT NULL,
  `mem_password` varchar(100) NOT NULL,
  `mem_addr` text,
  `mem_phone` varchar(25) DEFAULT NULL,
  `mem_email` varchar(50) DEFAULT NULL,
  `mem_status` int(1) DEFAULT NULL,
  `reg_date` date DEFAULT NULL,
  `mem_desc` text,
  `valid_code` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`mem_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=86 ;

--
-- Dumping data for table `tbl_member`
--

INSERT INTO `tbl_member` (`mem_id`, `mem_code`, `mem_name`, `mem_password`, `mem_addr`, `mem_phone`, `mem_email`, `mem_status`, `reg_date`, `mem_desc`, `valid_code`) VALUES
(83, 'mem20170928061559', 'Boy', '123', 'phnom penh', '070834493', 'nhorboy99@gmail.com', 1, '2017-09-28', NULL, NULL),
(80, 'mem20170925040117', 'Nhor Boy', '123', 'Phnom Penh', '070834493', 'nharboy99@gmail.com', 1, '2017-09-25', NULL, NULL),
(84, 'mem20171003105542', 'member A', '123', 'phnom penh', '070834493', 'nharboy99@gmal.com', 1, '2017-10-03', NULL, NULL),
(85, 'mem20171004041734', 'test', '123', 'kam pot', '0707494594', 'nharboy99@gmal.com', 1, '2017-10-04', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_det`
--

CREATE TABLE IF NOT EXISTS `tbl_order_det` (
  `ord_det_id` int(11) NOT NULL AUTO_INCREMENT,
  `ord_code` varchar(100) DEFAULT NULL,
  `str_id` int(11) DEFAULT NULL,
  `p_id` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `price` decimal(18,2) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `total` decimal(18,2) DEFAULT NULL,
  PRIMARY KEY (`ord_det_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=81 ;

--
-- Dumping data for table `tbl_order_det`
--

INSERT INTO `tbl_order_det` (`ord_det_id`, `ord_code`, `str_id`, `p_id`, `qty`, `price`, `discount`, `total`) VALUES
(80, 'ord0000003', 6, 101, 1, '432.00', 0, '432.00'),
(79, 'ord0000002', 6, 101, 1, '432.00', 0, '432.00'),
(78, 'ord0000001', 6, 101, 1, '432.00', 0, '432.00'),
(76, 'ord0000017', 6, 98, 1, '23.00', 0, '23.00'),
(77, 'ord0000017', 6, 98, 1, '23.00', 0, '23.00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_hdr`
--

CREATE TABLE IF NOT EXISTS `tbl_order_hdr` (
  `ord_id` int(11) NOT NULL AUTO_INCREMENT,
  `ord_code` varchar(50) DEFAULT NULL,
  `ord_date` date DEFAULT NULL,
  `mem_id` int(11) DEFAULT NULL,
  `ord_status` varchar(100) DEFAULT NULL,
  `delivery_addr` text NOT NULL,
  `user_crea` varchar(50) DEFAULT NULL,
  `date_crea` date DEFAULT NULL,
  `user_updt` varchar(50) DEFAULT NULL,
  `date_updt` date DEFAULT NULL,
  PRIMARY KEY (`ord_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=53 ;

--
-- Dumping data for table `tbl_order_hdr`
--

INSERT INTO `tbl_order_hdr` (`ord_id`, `ord_code`, `ord_date`, `mem_id`, `ord_status`, `delivery_addr`, `user_crea`, `date_crea`, `user_updt`, `date_updt`) VALUES
(52, 'ord0000003', '2017-09-25', 80, 'complete', '', '80', '2017-09-25', NULL, NULL),
(51, 'ord0000002', '2017-09-25', 80, 'order', '', '80', '2017-09-25', NULL, NULL),
(50, 'ord0000001', '2017-09-25', 80, 'deliver', '', '80', '2017-09-25', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_permission`
--

CREATE TABLE IF NOT EXISTS `tbl_permission` (
  `per_id` int(11) NOT NULL AUTO_INCREMENT,
  `mem_id` int(11) DEFAULT NULL,
  `page` varchar(100) DEFAULT NULL,
  `add` int(11) DEFAULT '0',
  `edit` int(11) DEFAULT '0',
  `delete` int(11) DEFAULT '0',
  `chg_pwd` int(11) DEFAULT '0',
  `user_crea` varchar(50) DEFAULT NULL,
  `date_crea` date DEFAULT NULL,
  `user_updt` varchar(50) DEFAULT NULL,
  `date_updt` date DEFAULT NULL,
  PRIMARY KEY (`per_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE IF NOT EXISTS `tbl_product` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_code` varchar(100) DEFAULT NULL,
  `acc_id` int(11) DEFAULT NULL,
  `str_id` int(11) DEFAULT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `brn_id` int(11) DEFAULT NULL,
  `p_name` varchar(200) DEFAULT NULL,
  `p_desc` text,
  `short_desc` varchar(500) DEFAULT NULL,
  `price` decimal(18,2) DEFAULT NULL,
  `color` varchar(20) DEFAULT NULL,
  `size` varchar(20) DEFAULT NULL,
  `model` varchar(100) DEFAULT NULL,
  `date_release` date DEFAULT NULL,
  `dimension` varchar(50) DEFAULT NULL,
  `p_type` varchar(50) DEFAULT NULL,
  `p_status` int(11) DEFAULT NULL,
  `user_crea` varchar(50) DEFAULT NULL,
  `date_crea` date DEFAULT NULL,
  `user_updt` varchar(50) DEFAULT NULL,
  `date_updt` date DEFAULT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=106 ;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`p_id`, `p_code`, `acc_id`, `str_id`, `cat_id`, `brn_id`, `p_name`, `p_desc`, `short_desc`, `price`, `color`, `size`, `model`, `date_release`, `dimension`, `p_type`, `p_status`, `user_crea`, `date_crea`, `user_updt`, `date_updt`) VALUES
(101, 'P0000001', 88, 6, 7, 4, 'Samsung AX7', '<p>Goods newsdb cvbxdfb sdfv</p>', '<p>New .zkxfvkzsv vxdfb dfgsdfg</p>', '432.00', 'blue', '0.9', 'AX007', '2017-09-25', 'zdc', 'product', 1, 'admin', '2017-09-25', NULL, NULL),
(102, 'ST001', 95, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'inventory', 1, '83', '2017-10-06', NULL, NULL),
(103, 'ST001', 95, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'inventory', 1, '83', '2017-10-06', NULL, NULL),
(104, 'ST001', 95, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'inventory', 1, '83', '2017-10-06', NULL, NULL),
(105, 'ST001', 95, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'inventory', 1, '83', '2017-10-06', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_promotion`
--

CREATE TABLE IF NOT EXISTS `tbl_promotion` (
  `pro_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `str_id` int(11) NOT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `occ_id` int(11) DEFAULT NULL,
  `pro_name` varchar(200) DEFAULT NULL,
  `pro_type` varchar(100) DEFAULT NULL,
  `dis_percent` int(11) DEFAULT NULL,
  `status` char(1) DEFAULT NULL,
  `date_from` date DEFAULT NULL,
  `date_to` date DEFAULT NULL,
  `buy_qty` int(11) DEFAULT NULL,
  `free_qty` int(11) DEFAULT NULL,
  `amt` decimal(18,2) DEFAULT NULL,
  `user_crea` varchar(50) DEFAULT NULL,
  `date_crea` date DEFAULT NULL,
  `user_updt` varchar(50) DEFAULT NULL,
  `date_updt` date DEFAULT NULL,
  PRIMARY KEY (`pro_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_promotion_det`
--

CREATE TABLE IF NOT EXISTS `tbl_promotion_det` (
  `pro_det_id` int(11) NOT NULL AUTO_INCREMENT,
  `pro_id` varchar(20) DEFAULT NULL,
  `p_id` int(11) DEFAULT NULL,
  `discount_percent` int(11) NOT NULL,
  `qty_buy` int(11) DEFAULT NULL,
  `item_free` int(11) DEFAULT NULL,
  `qty_free` int(11) DEFAULT NULL,
  `buy_total` double DEFAULT NULL,
  `discount_cash` int(11) NOT NULL,
  PRIMARY KEY (`pro_det_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=203 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_promotion_occasion`
--

CREATE TABLE IF NOT EXISTS `tbl_promotion_occasion` (
  `occ_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `occ_name` varchar(100) NOT NULL,
  `occ_desc` text NOT NULL,
  `user_crea` varchar(100) NOT NULL,
  `date_crea` date DEFAULT NULL,
  `user_updt` varchar(100) NOT NULL,
  `date_updt` date DEFAULT NULL,
  PRIMARY KEY (`occ_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `tbl_promotion_occasion`
--

INSERT INTO `tbl_promotion_occasion` (`occ_id`, `occ_name`, `occ_desc`, `user_crea`, `date_crea`, `user_updt`, `date_updt`) VALUES
(8, 'Khmer new year', '<p>s</p>', 'admin', '2017-02-23', 'admin', '2017-03-09'),
(9, 'pchhum benh', '', 'admin', '2017-02-23', 'admin', '2017-03-09'),
(10, 'water festival', '', 'admin', '2017-02-23', 'admin', '2017-03-09'),
(11, 'Krismax day', '', 'admin', '2017-02-23', 'admin', '2017-03-09'),
(12, 'Valentiday', '', 'admin', '2017-02-23', 'admin', '2017-03-09'),
(13, 'Independen day''s women', '<p>happy to dayy</p>', 'admin', '2017-03-09', 'admin', '2017-03-09');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shop_owner_product`
--

CREATE TABLE IF NOT EXISTS `tbl_shop_owner_product` (
  `sop_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `p_id` int(11) NOT NULL,
  `acc_id` int(11) NOT NULL,
  `price` char(50) NOT NULL,
  `store_qty` char(30) NOT NULL,
  `shop_owner_status` int(11) NOT NULL,
  `user_create` char(50) NOT NULL,
  `date_create` date NOT NULL,
  `user_update` char(50) NOT NULL,
  `date_update` date NOT NULL,
  PRIMARY KEY (`sop_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_shop_owner_product`
--

INSERT INTO `tbl_shop_owner_product` (`sop_id`, `p_id`, `acc_id`, `price`, `store_qty`, `shop_owner_status`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
(1, 100, 56, '12', '', 1, '', '0000-00-00', '', '0000-00-00'),
(2, 99, 56, '12', '', 1, '', '0000-00-00', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slide`
--

CREATE TABLE IF NOT EXISTS `tbl_slide` (
  `slide_id` int(11) NOT NULL AUTO_INCREMENT,
  `slide_name` varchar(150) DEFAULT NULL,
  `slide_desc` text,
  `slide_url` text,
  `slide_path` text,
  `slide_status` int(1) DEFAULT NULL,
  `user_crea` varchar(50) DEFAULT NULL,
  `date_crea` date DEFAULT NULL,
  `user_updt` varchar(50) DEFAULT NULL,
  `date_updt` date DEFAULT NULL,
  PRIMARY KEY (`slide_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tbl_slide`
--

INSERT INTO `tbl_slide` (`slide_id`, `slide_name`, `slide_desc`, `slide_url`, `slide_path`, `slide_status`, `user_crea`, `date_crea`, `user_updt`, `date_updt`) VALUES
(1, 'dsfsfsf', '<p>sdfdsfsfdsfdsfsdfsd</p>', 'sdfsf', '0db8dd32459533.5683ebb55376c.jpg', 1, 'admin', '2017-03-19', 'admin', '2017-03-21'),
(2, 'ddddddddddddd', '<p>ssdsaasdsa</p>', 'ddddd', '3.png', 1, 'admin', '2017-03-21', NULL, NULL),
(3, 'dssadsadsad', '<p>rrwerrewrewr</p>', 'sadasdas', 'banner1.jpg', 1, 'admin', '2017-03-21', 'admin', '2017-08-24');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_staf`
--

CREATE TABLE IF NOT EXISTS `tbl_staf` (
  `st_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `st_code` char(50) NOT NULL,
  `stf_status` int(11) NOT NULL,
  `staf_password` text NOT NULL,
  `acc_id` int(11) NOT NULL,
  `descr` text NOT NULL,
  `user_create` char(30) NOT NULL,
  `date_create` date NOT NULL,
  `user_update` char(30) NOT NULL,
  `date_update` date NOT NULL,
  PRIMARY KEY (`st_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=103 ;

--
-- Dumping data for table `tbl_staf`
--

INSERT INTO `tbl_staf` (`st_id`, `st_code`, `stf_status`, `staf_password`, `acc_id`, `descr`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
(101, 'ST001', 1, '', 85, '<p>zxczxxfvdfv</p>', '95', '2017-10-09', '', '0000-00-00'),
(102, 'ST00102', 0, '', 97, '<p>zxcvzc</p>', '95', '2017-10-09', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stock`
--

CREATE TABLE IF NOT EXISTS `tbl_stock` (
  `stk_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_id` int(11) DEFAULT NULL,
  `str_id` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT '0',
  `stk_type` varchar(20) DEFAULT NULL,
  `stk_flow` varchar(50) DEFAULT NULL,
  `stk_desc` text,
  `user_crea` varchar(50) DEFAULT NULL,
  `date_crea` date DEFAULT NULL,
  `user_updt` varchar(50) DEFAULT NULL,
  `date_updt` date DEFAULT NULL,
  PRIMARY KEY (`stk_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=110 ;

--
-- Dumping data for table `tbl_stock`
--

INSERT INTO `tbl_stock` (`stk_id`, `p_id`, `str_id`, `qty`, `stk_type`, `stk_flow`, `stk_desc`, `user_crea`, `date_crea`, `user_updt`, `date_updt`) VALUES
(106, 101, 6, 1, 'product', 'stock_out', NULL, '80', '2017-09-25', NULL, NULL),
(108, 101, 6, 1, 'product', 'stock_out', NULL, '84', '2017-10-04', NULL, NULL),
(107, 101, 6, 1, 'product', 'stock_out', NULL, '84', '2017-10-04', NULL, NULL),
(101, 98, 6, 1, 'product', 'stock_out', NULL, '72', '2017-09-13', NULL, NULL),
(102, 98, 6, 1, 'product', 'stock_out', NULL, '72', '2017-09-13', NULL, NULL),
(100, 98, 6, 1, 'product', 'stock_out', NULL, '72', '2017-09-13', NULL, NULL),
(99, 98, 6, 2, 'product', 'stock_out', NULL, '52', '2017-09-13', NULL, NULL),
(98, 99, 6, 1, 'product', 'stock_out', NULL, '52', '2017-09-13', NULL, NULL),
(97, 100, 6, 32, 'stock in', NULL, NULL, NULL, '2017-09-11', NULL, NULL),
(95, 99, 6, 1, 'product', 'stock_out', NULL, '52', '2017-08-28', NULL, NULL),
(94, 99, 6, 43, 'stock in', NULL, NULL, NULL, '2017-08-25', NULL, NULL),
(93, 98, 6, 1, 'product', 'stock_out', NULL, '52', '2017-08-25', NULL, NULL),
(92, 98, 6, 23, 'stock in', NULL, NULL, NULL, '2017-08-25', NULL, NULL),
(91, 91, 6, 32, 'stock in', NULL, NULL, NULL, '2017-08-24', NULL, NULL),
(90, 90, 6, 23, 'stock in', NULL, NULL, NULL, '2017-08-24', NULL, NULL),
(89, 86, 6, 1, 'product', 'stock_out', NULL, '53', '2017-08-23', NULL, NULL),
(88, 85, 6, 1, 'product', 'stock_out', NULL, '52', '2017-08-22', NULL, NULL),
(87, 86, 6, 32, 'stock in', NULL, NULL, NULL, '2017-08-22', NULL, NULL),
(86, 85, 1, 32, 'stock in', NULL, NULL, NULL, '2017-08-22', NULL, NULL),
(85, 84, 6, 12, 'stock in', NULL, NULL, NULL, '2017-08-22', NULL, NULL),
(109, 101, 6, 1, 'product', 'stock_out', NULL, '84', '2017-10-04', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_store`
--

CREATE TABLE IF NOT EXISTS `tbl_store` (
  `str_id` int(11) NOT NULL AUTO_INCREMENT,
  `str_code` varchar(100) DEFAULT NULL,
  `acc_id` int(11) DEFAULT NULL,
  `str_name` varchar(150) DEFAULT NULL,
  `str_type` varchar(150) DEFAULT NULL,
  `str_desc` text,
  `str_img` varchar(200) DEFAULT NULL,
  `user_crea` varchar(50) DEFAULT NULL,
  `date_crea` date DEFAULT NULL,
  `user_updt` varchar(50) DEFAULT NULL,
  `date_updt` date DEFAULT NULL,
  PRIMARY KEY (`str_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_store`
--

INSERT INTO `tbl_store` (`str_id`, `str_code`, `acc_id`, `str_name`, `str_type`, `str_desc`, `str_img`, `user_crea`, `date_crea`, `user_updt`, `date_updt`) VALUES
(1, 'str001', 11, 'Wilsun', 'computer', '', 'avatar_icon_by_astrolink247-d9xxs6r.jpg', 'admin', '2017-02-01', 'admin', '2017-02-13'),
(2, '', 41, 'zxcv', '.sgm', '<p>sdf</p>', '', 'admin', '2017-08-10', 'admin', '2017-08-10'),
(4, '12233', 34, 'Nssdsdfsf sdbvzdfv xdfbv', 'asc', '<p><span style="color: #626262; text-align: right;">zsvzav sdfg sdfg sdfg sdf&nbsp;</span></p>', 'images.jpg', 'admin', '2017-08-15', 'admin', '2017-08-15'),
(5, 'Str-097', 54, 'online_shop', 'computer', '<p>xsfvzxvzvxv</p>', 'Original-13-3-inch-Xiaomi.jpg', 'admin', '2017-08-21', NULL, NULL),
(6, 'S0012', 56, 'Boy-Shop', 'Eletrict', '<p>zxcvzcv</p>', 'Original-13-3-inch-Xiaomi.jpg', 'admin', '2017-08-22', 'admin', '2017-08-22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sysdata`
--

CREATE TABLE IF NOT EXISTS `tbl_sysdata` (
  `key_id` int(11) NOT NULL AUTO_INCREMENT,
  `key_type` varchar(100) DEFAULT NULL,
  `key_code` varchar(100) DEFAULT NULL,
  `key_data` varchar(100) DEFAULT NULL,
  `key_data1` varchar(100) DEFAULT NULL,
  `key_data2` varchar(100) DEFAULT NULL,
  `user_crea` varchar(50) DEFAULT NULL,
  `date_crea` date DEFAULT NULL,
  `user_updt` varchar(50) DEFAULT NULL,
  `date_updt` date DEFAULT NULL,
  PRIMARY KEY (`key_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_sysdata`
--

INSERT INTO `tbl_sysdata` (`key_id`, `key_type`, `key_code`, `key_data`, `key_data1`, `key_data2`, `user_crea`, `date_crea`, `user_updt`, `date_updt`) VALUES
(1, 'marquee', NULL, NULL, '<p>Announcement: During this Khmer New Year, We will have a special promotion</p>', NULL, NULL, NULL, NULL, NULL),
(2, 'template', NULL, '0', 'khmer_new_year.gif', NULL, NULL, NULL, NULL, NULL),
(4, 'template', NULL, '1', 'ecom_img.jpg', NULL, NULL, NULL, NULL, NULL),
(5, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL),
(6, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_code` varchar(50) DEFAULT NULL,
  `user_name` varchar(100) DEFAULT NULL,
  `user_pass` varchar(100) DEFAULT NULL,
  `user_desc` varchar(250) DEFAULT NULL,
  `user_type` varchar(50) DEFAULT NULL,
  `user_status` int(1) DEFAULT NULL,
  `user_crea` varchar(50) DEFAULT NULL,
  `date_crea` date DEFAULT NULL,
  `user_updt` varchar(50) DEFAULT NULL,
  `date_updt` date DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_code`, `user_name`, `user_pass`, `user_desc`, `user_type`, `user_status`, `user_crea`, `date_crea`, `user_updt`, `date_updt`) VALUES
(3, 'admin', 'administrator', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '', 'admin', 1, 'N/A', '2017-02-10', NULL, NULL),
(4, '1234', 'Boy', '7c222fb2927d828af22f592134e8932480637c0d', '<p>CFGNDFBDFGSDG SFGSERF</p>', 'admin', 1, 'admin', '2017-09-05', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_visitor`
--

CREATE TABLE IF NOT EXISTS `tbl_visitor` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ip` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_view` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=214 ;

--
-- Dumping data for table `tbl_visitor`
--

INSERT INTO `tbl_visitor` (`id`, `ip`, `date_view`) VALUES
(166, '::1', '2017-05-15'),
(168, '::1', '2017-05-16'),
(171, '127.0.0.1', '2017-05-16'),
(172, '192.168.123.7', '2017-05-16'),
(173, '::1', '2017-05-17'),
(174, '::1', '2017-05-18'),
(175, '::1', '2017-05-19'),
(176, '::1', '2017-05-21'),
(177, '::1', '2017-05-24'),
(178, '::1', '2017-05-25'),
(179, '::1', '2017-05-26'),
(180, '::1', '2017-05-30'),
(181, '::1', '2017-05-31'),
(182, '::1', '2017-06-01'),
(183, '::1', '2017-06-02'),
(184, '::1', '2017-06-07'),
(185, '::1', '2017-06-09'),
(186, '::1', '2017-06-12'),
(187, '::1', '2017-06-13'),
(188, '::1', '2017-06-14'),
(189, '::1', '2017-06-15'),
(190, '::1', '2017-06-19'),
(191, '::1', '2017-06-21'),
(192, '::1', '2017-06-22'),
(193, '::1', '2017-06-29'),
(194, '::1', '2017-07-18'),
(195, '::1', '2017-07-20'),
(196, '::1', '2017-09-07'),
(197, '::1', '2017-09-08'),
(198, '::1', '2017-09-11'),
(199, '::1', '2017-09-12'),
(200, '::1', '2017-09-13'),
(201, '::1', '2017-09-14'),
(202, '::1', '2017-09-15'),
(203, '::1', '2017-09-24'),
(204, '::1', '2017-09-25'),
(205, '::1', '2017-09-26'),
(206, '::1', '2017-09-27'),
(207, '::1', '2017-09-28'),
(208, '::1', '2017-09-29'),
(209, '::1', '2017-10-02'),
(210, '::1', '2017-10-03'),
(211, '::1', '2017-10-04'),
(212, '::1', '2017-10-05'),
(213, '::1', '2017-10-06');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wallet`
--

CREATE TABLE IF NOT EXISTS `tbl_wallet` (
  `wal_id` int(11) NOT NULL AUTO_INCREMENT,
  `acc_id` int(11) DEFAULT NULL,
  `wal_code` varchar(100) DEFAULT NULL,
  `wal_desc` text,
  `wal_status` int(1) DEFAULT NULL,
  `user_crea` varchar(50) DEFAULT NULL,
  `date_crea` date DEFAULT NULL,
  `user_updt` varchar(50) DEFAULT NULL,
  `date_updt` date DEFAULT NULL,
  PRIMARY KEY (`wal_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=54 ;

--
-- Dumping data for table `tbl_wallet`
--

INSERT INTO `tbl_wallet` (`wal_id`, `acc_id`, `wal_code`, `wal_desc`, `wal_status`, `user_crea`, `date_crea`, `user_updt`, `date_updt`) VALUES
(11, 33, 'wal20170406083257', NULL, 0, NULL, '2017-04-06', NULL, NULL),
(4, 25, 'wal20170329093424', '', 1, '7', '2017-03-29', 'admin', '2017-04-03'),
(10, 32, 'wal20170403063006', NULL, 0, '7', '2017-04-03', NULL, NULL),
(12, 34, 'wal20170417062227', NULL, 0, NULL, '2017-04-17', NULL, NULL),
(13, 35, 'wal20170417071223', NULL, 0, NULL, '2017-04-17', NULL, NULL),
(14, 36, 'wal20170428022614', NULL, 0, NULL, '2017-04-28', NULL, NULL),
(15, 37, 'wal20170428022715', NULL, 0, '7', '2017-04-28', NULL, NULL),
(16, 38, 'wal20170624110218', NULL, 0, NULL, '2017-06-24', NULL, NULL),
(17, 39, 'wal20170728115653', NULL, 0, NULL, '2017-07-28', NULL, NULL),
(19, 42, 'wal20170811033854', NULL, 0, NULL, '2017-08-11', NULL, NULL),
(20, 47, '123456', '<p>testing</p>', 1, 'admin', '2017-08-16', NULL, NULL),
(21, 48, 'wal20170817090443', '', 1, NULL, '2017-08-17', 'admin', '2017-08-17'),
(23, 52, 'wal20170818043204', NULL, 0, '49', '2017-08-18', NULL, NULL),
(24, 52, 'wal20170821042931', NULL, 0, '51', '2017-08-21', NULL, NULL),
(25, 52, 'wal20170822052331', NULL, 0, '52', '2017-08-22', NULL, NULL),
(26, 56, '12234', '<p>xcvzxcvzxcv</p>', 1, 'admin', '2017-08-22', 'admin', '2017-08-22'),
(27, 57, 'wal20170828041700', NULL, 0, '53', '2017-08-28', NULL, NULL),
(28, 57, 'wal20170828043914', NULL, 0, '54', '2017-08-28', NULL, NULL),
(29, 57, 'wal20170828050805', NULL, 0, '55', '2017-08-28', NULL, NULL),
(30, 57, 'wal20170828052717', NULL, 0, '54', '2017-08-28', NULL, NULL),
(31, 57, 'wal20170828053242', NULL, 0, '54', '2017-08-28', NULL, NULL),
(32, 57, 'wal20170828053823', NULL, 0, '56', '2017-08-28', NULL, NULL),
(33, 57, 'wal20170828054048', NULL, 0, '56', '2017-08-28', NULL, NULL),
(34, 57, 'wal20170828054257', NULL, 0, '56', '2017-08-28', NULL, NULL),
(35, 57, 'wal20170828054717', NULL, 0, '56', '2017-08-28', NULL, NULL),
(36, 57, 'wal20170828055619', NULL, 0, '56', '2017-08-28', NULL, NULL),
(37, 57, 'wal20170828060803', NULL, 0, '56', '2017-08-28', NULL, NULL),
(38, 57, 'wal20170828060834', NULL, 0, '56', '2017-08-28', NULL, NULL),
(39, 57, 'wal20170828060941', NULL, 0, '56', '2017-08-28', NULL, NULL),
(40, 57, 'wal20170828061013', NULL, 0, '56', '2017-08-28', NULL, NULL),
(41, 57, 'wal20170828061324', NULL, 0, '56', '2017-08-28', NULL, NULL),
(42, 57, 'wal20170908110337', NULL, 0, NULL, '2017-09-08', NULL, NULL),
(43, 57, 'wal20170913101409', NULL, 0, '53', '2017-09-13', NULL, NULL),
(44, 57, 'wal20170913103337', NULL, 0, '70', '2017-09-13', NULL, NULL),
(45, 78, 'wal20170913104458', NULL, 0, '71', '2017-09-13', NULL, NULL),
(46, 71, 'a0012', '<p>text</p>', 1, 'admin', '2017-09-13', NULL, NULL),
(49, 89, 'wal20170926065604', NULL, 0, '80', '2017-09-26', NULL, NULL),
(48, 84, 'wal20170925040117', NULL, 0, NULL, '2017-09-25', NULL, NULL),
(50, 93, 'wal20170928055659', NULL, 0, NULL, '2017-09-28', NULL, NULL),
(51, 94, 'wal20170928061559', NULL, 0, NULL, '2017-09-28', NULL, NULL),
(52, 94, 'wal20171003105542', NULL, 0, NULL, '2017-10-03', NULL, NULL),
(53, 94, 'wal20171004041734', NULL, 0, '84', '2017-10-04', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wallet_transaction`
--

CREATE TABLE IF NOT EXISTS `tbl_wallet_transaction` (
  `wal_tran_id` int(11) NOT NULL AUTO_INCREMENT,
  `wal_id` int(11) DEFAULT NULL,
  `tran_type` varchar(50) DEFAULT NULL,
  `tran_amt` decimal(18,2) DEFAULT NULL,
  `tran_date` datetime DEFAULT NULL,
  `tran_status` char(1) DEFAULT NULL,
  PRIMARY KEY (`wal_tran_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=70 ;

--
-- Dumping data for table `tbl_wallet_transaction`
--

INSERT INTO `tbl_wallet_transaction` (`wal_tran_id`, `wal_id`, `tran_type`, `tran_amt`, `tran_date`, `tran_status`) VALUES
(69, 0, 'cash_out', '432.00', '2017-09-25 05:24:49', '1'),
(68, 0, 'cash_out', '432.00', '2017-09-25 04:54:55', '1'),
(67, 0, 'cash_out', '432.00', '2017-09-25 04:04:00', '1'),
(66, 0, 'cash_in', '1000.00', '2017-09-25 04:01:48', '0'),
(65, 45, 'cash_out', '69.00', '2017-09-13 10:51:23', '1'),
(64, 45, 'cash_in', '1234.00', '2017-09-14 00:00:00', '1'),
(63, 0, 'cash_out', '58.00', '2017-09-13 07:51:23', '1'),
(62, 25, 'cash_in', '233.00', '2017-09-07 00:00:00', '1'),
(61, 0, 'cash_out', '12.00', '2017-09-01 06:01:17', '1'),
(60, 0, 'cash_out', '12.00', '2017-08-28 04:04:38', '1'),
(59, 0, 'cash_out', '23.00', '2017-08-25 03:39:17', '1'),
(58, 26, 'cash_out', '12.00', '2017-08-23 04:21:12', '1'),
(57, 26, 'cash_in', '1234.00', '2017-08-22 00:00:00', '1'),
(45, 4, 'cash_in', '1222.00', '2017-08-16 00:00:00', '1'),
(47, 21, 'cash_in', '500.00', '2017-08-17 00:00:00', '1'),
(48, 21, 'cash_out', '123.00', '2017-08-17 10:23:06', '1'),
(49, 0, 'cash_in', '1234.00', '2017-08-21 12:04:57', '0'),
(50, 0, 'cash_in', '123456.00', '2017-08-21 12:09:08', '1'),
(51, 0, 'cash_in', '123456.00', '2017-08-22 03:52:28', '0'),
(52, 0, 'cash_in', '123.00', '2017-08-22 04:12:47', '0'),
(53, 20, 'cash_in', '1234.00', '2017-08-22 00:00:00', '1'),
(54, 23, 'cash_in', '123456.00', '2017-08-22 05:19:21', '0'),
(55, 0, 'cash_out', '12.00', '2017-08-22 10:26:32', '1'),
(56, 0, 'cash_in', '123.00', '2017-08-22 10:37:28', '0');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
