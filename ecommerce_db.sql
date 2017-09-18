-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2017 at 10:24 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_account`
--

CREATE TABLE `tbl_account` (
  `acc_id` int(11) NOT NULL,
  `acc_code` varchar(50) DEFAULT NULL,
  `acc_password` varchar(220) DEFAULT NULL,
  `mem_id` int(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
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
  `date_updt` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_account`
--

INSERT INTO `tbl_account` (`acc_id`, `acc_code`, `acc_password`, `mem_id`, `email`, `sex`, `dob`, `pob`, `acc_type`, `acc_img`, `company`, `position`, `contact_phone`, `loc_id`, `user_crea`, `date_crea`, `user_updt`, `date_updt`) VALUES
(199, 'A00 1ddddddd', '666', 90, NULL, 'M', '2017-03-22', '<p>&lt;p&gt;fdsfsdfsdffdsfdsfds&lt;/p&gt;</p>', 'Shop-owner', 'Dough_Nut.png', 'fsdfdsfsf', 'sdfdsfdsf', '021313', 1, 'Admin', '2017-03-24', 'Admin', '2017-03-31'),
(212, 'M 000 10', '1234', 4, NULL, 'F', '2017-03-22', '<p>&lt;p&gt;sdfdsfdsfdf&lt;/p&gt;</p>', 'Association', 'avatar_icon_by_astrolink247-d9xxs6r.jpg', 'CCCG', 'Manager', '09434434', 1, 'Admin', '2017-03-31', 'admin', '2017-06-12'),
(213, 'acc0000001', NULL, 4, NULL, 'F', '2017-04-05', '<p>&lt;p&gt;&amp;lt;p&amp;gt;&amp;amp;lt;p&amp;amp;gt;&amp;amp;amp;lt;p&amp;amp;amp;gt;&amp;amp;amp;amp;lt;p&amp;amp;amp;amp;gt;fsdfsdfs&amp;amp;amp;amp;lt;/p&amp;amp;amp;amp;gt;&amp;amp;amp;lt;/p&amp;amp;amp;gt;&amp;amp;lt;/p&amp;amp;gt;&amp;lt;/p&amp;gt;&lt;/p&gt;</p>', 'General', 'm8sXbHfIkoXixnG11FWH2VA.jpg', 'ddd', 'IT', '0349553', 1, '1', '2017-06-15', 'admin', '2017-06-15'),
(216, 'Acc 007', '99', 1, NULL, 'F', '2017-04-06', '<p>ffff hhhhhhhhhhhhhhhh</p>', 'General', 'acleda.png', 'ddd', 'it', '0997877', 1, 'Admin', '2017-04-07', NULL, NULL),
(217, 'acc0000001', NULL, 20, NULL, '0', '2017-05-11', '<p>rsrewrrwe</p>', 'General', 'avatar_icon_by_astrolink247-d9xxs6r.jpg', 'it', 'Manager', '024244', 1, '1', '2017-04-06', 'admin', '2017-05-11'),
(219, 'Acc 007', '1234', 1, NULL, 'F', '2017-04-20', '<p>asedsadsadasdasdasdasd</p>', 'Bussiness', 'ANGLE NEW RIGHT.gif', 'it', 'ff', '034824234', 1, 'admin', '2017-04-20', NULL, NULL),
(220, 'acc0000001', NULL, 21, NULL, NULL, NULL, NULL, 'general', NULL, NULL, NULL, NULL, 0, NULL, '2017-05-11', NULL, NULL),
(221, 'acc0034', '1234', 20, NULL, 'F', '2017-05-11', '<p>dsssasd sfsdafsdafqrf</p>', 'Agent', '', 'Amppil', 'IT Manager', '02492324', 1, 'admin', '2017-05-11', NULL, NULL),
(222, 'qwewqewe', '123', 1, NULL, 'M', '2017-05-11', NULL, 'Shop-owner', '', 'qweqwee', 'qweqeqw', NULL, 1, NULL, '2017-05-11', NULL, NULL),
(223, 'acc0000001', NULL, 22, NULL, NULL, NULL, NULL, 'general', NULL, NULL, NULL, NULL, 0, NULL, '2017-06-12', NULL, NULL),
(224, 'acc0000001', NULL, 23, NULL, NULL, NULL, NULL, 'general', NULL, NULL, NULL, NULL, 0, '1', '2017-06-12', NULL, NULL),
(225, 'acc0000001', NULL, 24, NULL, NULL, NULL, NULL, 'general', NULL, NULL, NULL, NULL, 0, '1', '2017-06-12', NULL, NULL),
(226, 'acc0000001', NULL, 25, NULL, NULL, NULL, NULL, 'general', NULL, NULL, NULL, NULL, 0, '24', '2017-06-12', NULL, NULL),
(227, 'acc0000001', NULL, 26, NULL, NULL, NULL, NULL, 'general', NULL, NULL, NULL, NULL, 0, '25', '2017-06-12', NULL, NULL),
(228, 'acc0000001', NULL, 27, NULL, NULL, NULL, NULL, 'general', NULL, NULL, NULL, NULL, 0, '25', '2017-06-12', NULL, NULL),
(229, 'acc0000001', NULL, 28, NULL, NULL, NULL, NULL, 'general', NULL, NULL, NULL, NULL, 0, '25', '2017-06-12', NULL, NULL),
(230, 'acc0000001', NULL, 29, NULL, NULL, NULL, NULL, 'general', NULL, NULL, NULL, NULL, 0, '25', '2017-06-12', NULL, NULL),
(231, 'acc0000001', NULL, 30, NULL, NULL, NULL, NULL, 'general', NULL, NULL, NULL, NULL, 0, '1', '2017-06-13', NULL, NULL),
(232, 'acc0000001', NULL, 31, NULL, NULL, NULL, NULL, 'general', NULL, NULL, NULL, NULL, 0, '1', '2017-06-13', NULL, NULL),
(233, 'acc0000001', NULL, 32, NULL, NULL, NULL, NULL, 'general', NULL, NULL, NULL, NULL, 0, NULL, '2017-06-13', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_advertisement`
--

CREATE TABLE `tbl_advertisement` (
  `ad_id` int(11) NOT NULL,
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
  `date_updt` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_advertisement`
--

INSERT INTO `tbl_advertisement` (`ad_id`, `ad_name`, `ad_desc`, `img`, `page`, `url`, `advertiser`, `position`, `price`, `height`, `user_crea`, `date_crea`, `user_updt`, `date_updt`) VALUES
(1, 'Testing Advertisement', '<p>&lt;p&gt;&amp;lt;p&amp;gt;&amp;amp;lt;p&amp;amp;gt;Testing&amp;amp;lt;/p&amp;amp;gt;&amp;lt;/p&amp;gt;&lt;/p&gt;</p>', 'Barbeque.png', 'fff', 'http://www.google.com1', 'samnang1', 'left', '51.00', '1001px', 'admin', '2017-02-14', 'admin', '2017-04-20'),
(3, 'sdadsasdsad', '<p>&lt;p&gt;fsdfdsfsfsf&lt;/p&gt;</p>', '8655996739695547732.jpg', 'Home', 'https://www.facebook.com/webtech.solution.kh/?fref=ts', 'dsdsdd', 'left', '900.00', '500', 'N/A', '2017-03-19', 'N/A', '2017-04-05'),
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

CREATE TABLE `tbl_blog` (
  `bl_id` int(10) NOT NULL,
  `title` char(225) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bl_desc` text COLLATE utf8_unicode_ci,
  `user_crea` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_crea` date DEFAULT NULL,
  `user_updt` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_updt` date DEFAULT NULL,
  `status` char(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brn_id` int(11) NOT NULL,
  `brn_name` varchar(150) DEFAULT NULL,
  `brn_desc` text,
  `user_crea` varchar(50) DEFAULT NULL,
  `date_crea` date DEFAULT NULL,
  `user_updt` varchar(50) DEFAULT NULL,
  `date_updt` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brn_id`, `brn_name`, `brn_desc`, `user_crea`, `date_crea`, `user_updt`, `date_updt`) VALUES
(3, 'IPhone', '<p>sdsssssssssd</p>', 'admin', '2017-01-23', 'admin', '2017-06-12'),
(4, 'Samsung', '', 'admin', '2017-01-23', NULL, NULL),
(5, 'ndgdfgdg', '<p>gdfgfdg</p>', 'admin', '2017-05-22', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(150) DEFAULT NULL,
  `cat_name_kh` varchar(150) DEFAULT NULL,
  `cat_name_ch` varchar(150) DEFAULT NULL,
  `cat_desc` text,
  `user_crea` varchar(50) DEFAULT NULL,
  `date_crea` date DEFAULT NULL,
  `user_updt` varchar(50) DEFAULT NULL,
  `date_updt` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`cat_id`, `cat_name`, `cat_name_kh`, `cat_name_ch`, `cat_desc`, `user_crea`, `date_crea`, `user_updt`, `date_updt`) VALUES
(6, 'Construction Materials ', 'សំភារៈសំណង់', '建築材料', '<p>ccccccccccccccccccccc</p>', 'admin', '2017-07-21', NULL, NULL),
(5, 'Agricultural Equipment', 'សំភារៈសិកម្ម', '農業設備', '<p>សដថសដដថដសថ</p>', 'Admin', '2017-03-30', NULL, NULL),
(7, ' Household devices', 'ឧបករណ៍ប្រើប្រាស់ក្នុងផ្ទះ', '家用設備', '<p>ដថសថសថសដថសថសដថ</p>', 'Admin', '2017-03-30', NULL, NULL),
(8, 'Classify', 'សំភារៈផ្សេងៗ', '分類', '<p>សាដសាថាសាសដាស​ដសថដ</p>', 'Admin', '2017-03-30', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comment`
--

CREATE TABLE `tbl_comment` (
  `cm_id` int(10) UNSIGNED NOT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `cm_crea` date DEFAULT NULL,
  `bl_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_location`
--

CREATE TABLE `tbl_location` (
  `loc_id` int(11) NOT NULL,
  `loc_name` varchar(150) DEFAULT NULL,
  `loc_desc` text,
  `user_crea` varchar(50) DEFAULT NULL,
  `date_crea` date DEFAULT NULL,
  `user_updt` varchar(50) DEFAULT NULL,
  `date_updt` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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

CREATE TABLE `tbl_media` (
  `media_id` int(11) NOT NULL,
  `p_id` int(11) DEFAULT NULL,
  `alt` text,
  `url` text,
  `path` text,
  `media_type` varchar(50) DEFAULT NULL,
  `user_crea` varchar(50) DEFAULT NULL,
  `date_crea` date DEFAULT NULL,
  `user_updt` varchar(50) DEFAULT NULL,
  `date_updt` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_media`
--

INSERT INTO `tbl_media` (`media_id`, `p_id`, `alt`, `url`, `path`, `media_type`, `user_crea`, `date_crea`, `user_updt`, `date_updt`) VALUES
(87, 11, NULL, NULL, '', NULL, NULL, '2017-03-22', NULL, NULL),
(86, 10, NULL, NULL, 'icon-avatar.gif', NULL, NULL, '2017-03-22', 'admin', '2017-03-22'),
(80, 86, NULL, NULL, 'icon-avatar.gif', NULL, NULL, '2017-03-21', NULL, NULL),
(81, 5, NULL, NULL, 'User Red.png', NULL, NULL, '2017-03-22', NULL, NULL),
(82, 6, NULL, NULL, 'bg.jpg', NULL, NULL, '2017-03-22', NULL, '2017-03-22'),
(83, 7, NULL, NULL, '0141.jpg', NULL, NULL, '2017-03-22', NULL, '2017-03-22'),
(84, 8, NULL, NULL, 'galaxy-note5_gallery_left-perspective_pinkgold_s3.png', NULL, NULL, '2017-03-22', NULL, '2017-03-22'),
(85, 9, NULL, NULL, '600.png', NULL, NULL, '2017-03-22', NULL, '2017-03-22'),
(79, 85, NULL, NULL, '1474866502.jpg', NULL, NULL, '2017-03-21', NULL, NULL),
(78, 84, NULL, NULL, 'CAM220IP-Camera-Dome.jpg', NULL, NULL, '2017-03-21', NULL, NULL),
(77, 83, NULL, NULL, 'galaxy-note5_gallery_left-perspective_pinkgold_s3.png', NULL, NULL, '2017-03-21', NULL, NULL),
(76, 82, NULL, NULL, 'm8sXbHfIkoXixnG11FWH2VA.jpg', NULL, NULL, '2017-03-20', NULL, NULL),
(75, 81, NULL, NULL, 'canon_xc10_01_fsl_c_0x250.jpg', NULL, NULL, '2017-03-20', NULL, NULL),
(74, 80, NULL, NULL, '81lcrgmpicl.jpg', NULL, NULL, '2017-03-20', NULL, '2017-03-20'),
(73, 79, NULL, NULL, 'no-image11.png', NULL, NULL, '2017-03-20', NULL, '2017-03-22'),
(61, 67, NULL, NULL, '', NULL, NULL, '2017-03-20', NULL, NULL),
(62, 68, NULL, NULL, '', NULL, NULL, '2017-03-20', NULL, NULL),
(63, 69, NULL, NULL, '', NULL, NULL, '2017-03-20', NULL, NULL),
(64, 70, NULL, NULL, '', NULL, NULL, '2017-03-20', NULL, NULL),
(65, 71, NULL, NULL, '', NULL, NULL, '2017-03-20', NULL, NULL),
(66, 72, NULL, NULL, '', NULL, NULL, '2017-03-20', NULL, NULL),
(67, 73, NULL, NULL, '', NULL, NULL, '2017-03-20', NULL, NULL),
(68, 74, NULL, NULL, '', NULL, NULL, '2017-03-20', NULL, NULL),
(69, 75, NULL, NULL, '', NULL, NULL, '2017-03-20', NULL, NULL),
(70, 76, NULL, NULL, 'User Red.png', NULL, NULL, '2017-03-20', NULL, NULL),
(71, 77, NULL, NULL, 'samsung-galaxy-s7--.jpg', NULL, NULL, '2017-03-20', NULL, '2017-03-20'),
(88, 12, NULL, NULL, 'webtech_logo.jpg', NULL, NULL, '2017-03-22', NULL, '2017-03-22'),
(72, 78, NULL, NULL, 'Sorry, your file is too large.Sorry, your file was not uploaded.', NULL, NULL, '2017-03-20', NULL, NULL),
(89, 13, NULL, NULL, 'Beef_Steak.jpg', NULL, NULL, '2017-03-22', NULL, '2017-03-23'),
(90, 14, NULL, NULL, 'btn_donateCC_LG.gif', NULL, NULL, '2017-03-23', NULL, '2017-03-23'),
(91, 15, NULL, NULL, 'canon_xc10_01_fsl_c_0x250.jpg', NULL, NULL, '2017-03-23', NULL, '2017-03-23'),
(92, 16, NULL, NULL, 'LE-819-03-230x230.png', NULL, NULL, '2017-03-24', NULL, NULL),
(93, 17, NULL, NULL, 'LE-901-02-230x230.png', NULL, NULL, '2017-03-24', NULL, NULL),
(94, 18, NULL, NULL, '', NULL, NULL, '2017-03-24', NULL, NULL),
(95, 19, NULL, NULL, '', NULL, NULL, '2017-03-24', NULL, NULL),
(96, 20, NULL, NULL, 'bg.jpg', NULL, NULL, '2017-03-24', NULL, NULL),
(97, 21, NULL, NULL, 'm8sXbHfIkoXixnG11FWH2VA.jpg', NULL, NULL, '2017-03-27', NULL, NULL),
(98, 22, NULL, NULL, 'logo.png', NULL, NULL, '2017-03-27', NULL, NULL),
(99, 23, NULL, NULL, 'toshiba-computer-support.jpg', NULL, NULL, '2017-03-27', NULL, NULL),
(100, 24, NULL, NULL, 'bg.jpg', NULL, NULL, '2017-03-27', NULL, '2017-03-27'),
(101, 25, NULL, NULL, '00128-500x500.jpg', NULL, NULL, '2017-03-27', NULL, '2017-03-27'),
(102, 26, NULL, NULL, 'depositphotos_8725944-stock-illustration-nokia-n9-touch-screen-cell.jpg', NULL, NULL, '2017-03-28', NULL, NULL),
(103, 27, NULL, NULL, 'galaxy-note5_gallery_left-perspective_pinkgold_s3.png', NULL, NULL, '2017-03-28', NULL, NULL),
(104, 28, NULL, NULL, 'koreastyle1.gif', NULL, NULL, '2017-03-28', NULL, NULL),
(105, 29, NULL, NULL, 'icon-avatar.gif', NULL, NULL, '2017-03-28', NULL, NULL),
(106, 30, NULL, NULL, '2qtfp6w.jpg', NULL, NULL, '2017-03-30', NULL, NULL),
(107, 31, NULL, NULL, 'samsung-galaxy-s7--.jpg', NULL, NULL, '2017-03-30', NULL, NULL),
(125, 49, NULL, NULL, 'tractorsimplements.jpg', 'txtMediaType', 'admin', '2017-04-19', NULL, NULL),
(113, 37, NULL, NULL, 'meng-hak.gif', NULL, NULL, '2017-04-05', NULL, NULL),
(110, 34, NULL, NULL, 'LH-100-230x230.png', NULL, NULL, '2017-03-31', NULL, NULL),
(120, 44, NULL, NULL, '67619-professiona28-c.jpg', 'inventory', '1', '2017-04-18', NULL, NULL),
(112, 36, NULL, NULL, '20130808105543934.jpg', NULL, NULL, '2017-04-04', NULL, '2017-04-07'),
(114, 38, NULL, NULL, 'logo033.png', NULL, NULL, '2017-04-06', NULL, '2017-04-10'),
(115, 39, NULL, NULL, 'brand6.png', NULL, NULL, '2017-04-07', NULL, NULL),
(124, 48, NULL, NULL, 'disc-harrow-1562017.jpg', 'txtMediaType', 'admin', '2017-04-19', NULL, NULL),
(117, 41, NULL, NULL, 'facebook.png', NULL, NULL, '2017-04-07', NULL, NULL),
(118, 42, NULL, NULL, 'wallet.jpg', NULL, NULL, '2017-04-07', NULL, NULL),
(122, 46, NULL, NULL, 'constructionmaterials.jpg', 'txtMediaType', 'admin', '2017-04-19', NULL, NULL),
(121, 45, NULL, NULL, 'Building-materials_cropped.jpg', 'txtMediaType', 'admin', '2017-04-19', NULL, NULL),
(123, 47, NULL, NULL, 'AAEAAQAAAAAAAAVfAAAAJDBlZWZkMzI4LTM0NDgtNGFjNS04YzljLTFmYjdmZDgyNGRmMA.png', 'txtMediaType', 'admin', '2017-04-19', NULL, NULL),
(126, 50, NULL, NULL, 'Agricultural_Machinery_Tiller.jpg', 'txtMediaType', 'admin', '2017-04-19', NULL, NULL),
(127, 51, NULL, NULL, '8834912_l.jpg', 'txtMediaType', 'admin', '2017-04-19', NULL, NULL),
(129, 54, NULL, NULL, '81lcrgmpicl.jpg', NULL, NULL, '2017-04-20', NULL, NULL),
(130, 55, NULL, NULL, '', NULL, NULL, '2017-05-11', NULL, NULL),
(131, 57, NULL, NULL, '18254310_1552849854754649_2033790123_n.jpg', 'inventory', '1', '2017-05-17', NULL, NULL),
(132, 59, NULL, NULL, '580b57fbd9996e24bc43c10a.png', NULL, NULL, '2017-05-18', NULL, '2017-05-18'),
(133, 60, NULL, NULL, 'abc-extra-stout-can.jpg', NULL, NULL, '2017-05-19', NULL, '2017-05-19'),
(134, 61, NULL, NULL, '18279945_1552849954754639_dssssd15915941_n.png', NULL, NULL, '2017-05-19', NULL, NULL),
(135, 63, NULL, NULL, '600.png', NULL, NULL, '2017-06-16', NULL, NULL),
(136, 64, NULL, NULL, 'acleda.png', NULL, NULL, '2017-06-16', NULL, NULL),
(137, 65, NULL, NULL, 'download (1).jpg', 'inventory', '4', '2017-06-16', NULL, NULL),
(138, 66, NULL, NULL, 'canon_xc10_01_fsl_c_0x250.jpg', 'inventory', '4', '2017-06-16', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member`
--

CREATE TABLE `tbl_member` (
  `mem_id` int(11) NOT NULL,
  `mem_code` varchar(100) DEFAULT NULL,
  `mem_name` varchar(100) DEFAULT NULL,
  `mem_addr` text,
  `mem_phone` varchar(25) DEFAULT NULL,
  `mem_email` varchar(50) DEFAULT NULL,
  `mem_status` int(1) DEFAULT NULL,
  `reg_date` date DEFAULT NULL,
  `mem_desc` text,
  `valid_code` varchar(100) DEFAULT NULL,
  `mem_password` varchar(220) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_member`
--

INSERT INTO `tbl_member` (`mem_id`, `mem_code`, `mem_name`, `mem_addr`, `mem_phone`, `mem_email`, `mem_status`, `reg_date`, `mem_desc`, `valid_code`, `mem_password`) VALUES
(4, 'mem20170209081518bb', 'But Choumeng ', '', '01010101010', 'choumentit@gmail.com', 1, '2017-02-09', '', '', '1234'),
(17, 'mem20170331115024', 'nharboy', 'pp', '90909900', 'nharboy@gmail.com', 0, '2017-03-31', NULL, NULL, '123'),
(28, 'mem20170612115407', 'sophea', 'PP', '0969742547', 'samnang164@gmail.com', 0, '2017-06-12', NULL, NULL, '12');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_det`
--

CREATE TABLE `tbl_order_det` (
  `ord_det_id` int(11) NOT NULL,
  `ord_code` varchar(100) DEFAULT NULL,
  `str_id` int(11) DEFAULT NULL,
  `p_id` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `price` decimal(18,2) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `total` decimal(18,2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_order_det`
--

INSERT INTO `tbl_order_det` (`ord_det_id`, `ord_code`, `str_id`, `p_id`, `qty`, `price`, `discount`, `total`) VALUES
(166, 'ord0000008', 0, 54, 1, '34.00', 0, '34.00'),
(165, 'ord0000007', 9, 45, 1, '455.00', 0, '455.00'),
(164, 'ord0000007', 7, 51, 1, '80.00', 0, '80.00'),
(163, 'ord0000007', 7, 36, 1, '45.00', 0, '45.00'),
(162, 'ord0000007', 9, 45, 1, '455.00', 0, '455.00'),
(161, 'ord0000006', 9, 45, 1, '455.00', 0, '455.00'),
(160, 'ord0000005', 7, 36, 1, '45.00', 0, '45.00'),
(159, 'ord0000005', 7, 51, 1, '80.00', 0, '80.00'),
(158, 'ord0000004', 7, 36, 1, '45.00', 0, '45.00'),
(157, 'ord0000004', 9, 38, 1, '90.00', 0, '90.00'),
(156, 'ord0000003', 0, 47, 3, '120.00', 0, '360.00'),
(155, 'ord0000002', 9, 41, 1, '45.00', 0, '45.00'),
(154, 'ord0000001', 9, 38, 1, '90.00', 0, '90.00'),
(167, 'ord0000009', 9, 60, 1, '90.00', 0, '90.00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_hdr`
--

CREATE TABLE `tbl_order_hdr` (
  `ord_id` int(11) NOT NULL,
  `ord_code` varchar(50) DEFAULT NULL,
  `ord_date` date DEFAULT NULL,
  `mem_id` int(11) DEFAULT NULL,
  `ord_status` varchar(100) DEFAULT NULL,
  `user_crea` varchar(50) DEFAULT NULL,
  `date_crea` date DEFAULT NULL,
  `user_updt` varchar(50) DEFAULT NULL,
  `date_updt` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_order_hdr`
--

INSERT INTO `tbl_order_hdr` (`ord_id`, `ord_code`, `ord_date`, `mem_id`, `ord_status`, `user_crea`, `date_crea`, `user_updt`, `date_updt`) VALUES
(40, 'ord0000008', '2017-04-25', 1, 'pending', '1', '2017-04-25', NULL, NULL),
(39, 'ord0000007', '2017-04-21', 1, 'pending', '1', '2017-04-21', NULL, NULL),
(38, 'ord0000006', '2017-04-20', 1, 'pending', '1', '2017-04-20', NULL, NULL),
(37, 'ord0000005', '2017-04-20', 1, 'pending', '1', '2017-04-20', NULL, NULL),
(36, 'ord0000004', '2017-04-20', 1, 'pending', '1', '2017-04-20', NULL, NULL),
(35, 'ord0000003', '2017-04-20', 1, 'complete', '1', '2017-04-20', NULL, NULL),
(34, 'ord0000002', '2017-04-20', 4, 'pending', '4', '2017-04-20', NULL, NULL),
(33, 'ord0000001', '2017-04-20', 1, 'pending', '1', '2017-04-20', NULL, NULL),
(41, 'ord0000009', '2017-06-15', 4, 'pending', '4', '2017-06-15', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_permission`
--

CREATE TABLE `tbl_permission` (
  `per_id` int(11) NOT NULL,
  `mem_id` int(11) DEFAULT NULL,
  `page` varchar(100) DEFAULT NULL,
  `add` int(11) DEFAULT '0',
  `edit` int(11) DEFAULT '0',
  `delete` int(11) DEFAULT '0',
  `chg_pwd` int(11) DEFAULT '0',
  `user_crea` varchar(50) DEFAULT NULL,
  `date_crea` date DEFAULT NULL,
  `user_updt` varchar(50) DEFAULT NULL,
  `date_updt` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `p_id` int(11) NOT NULL,
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
  `p_status` int(11) DEFAULT NULL,
  `user_crea` varchar(50) DEFAULT NULL,
  `date_crea` date DEFAULT NULL,
  `user_updt` varchar(50) DEFAULT NULL,
  `date_updt` date DEFAULT NULL,
  `p_type` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`p_id`, `p_code`, `acc_id`, `str_id`, `cat_id`, `brn_id`, `p_name`, `p_desc`, `short_desc`, `price`, `color`, `size`, `model`, `date_release`, `dimension`, `p_status`, `user_crea`, `date_crea`, `user_updt`, `date_updt`, `p_type`) VALUES
(60, 'p 003', 222, 9, 7, 3, 'New Product', '<p>fsdfsfsdf</p>', NULL, '90.00', 'red', '12', '', '2017-05-20', 'qweqeqw', 1, NULL, '2017-05-19', NULL, NULL, 'product'),
(61, 'p 0003', 222, 9, 7, 3, 'New Product4', '<p>sdfsfsf</p>', '<p>vbvccb</p>', '45.00', 'red', '32', 'dsfsdf', '1970-01-01', 'ggggggggggg', 1, 'admin', '2017-06-14', NULL, NULL, 'product'),
(63, NULL, 213, 0, 8, NULL, 'cccccccccccc', '<p>cccccccccccccccccccc</p>', NULL, '12.00', NULL, NULL, NULL, '2017-06-16', NULL, 1, NULL, '2017-06-16', NULL, NULL, 'service'),
(44, 'inv0000001', 216, 6, 7, 3, 'dsfdfsfs', '', NULL, '89.00', 're', '45', 'fsfsf', '2017-04-14', 'sdfsdf', 1, '1', '2017-04-18', NULL, NULL, 'inventory'),
(64, NULL, 213, 0, 8, NULL, 'mmmmmmmmmmmmmm', '<p>sdffghgmn,</p>', NULL, '9.00', NULL, NULL, NULL, '2017-06-16', NULL, 1, NULL, '2017-06-16', NULL, NULL, 'service'),
(36, 'sdsfsfffffffffffffffffffffffffffffffffffff', 0, 7, 5, 3, 'ggggggggggggg', '<p>dsadadsadad</p>', '', '45.00', '45', '34', 'dssdasadsad', '2017-04-11', 'adsads', 1, 'admin', '2017-04-20', NULL, NULL, 'product'),
(66, 'inv0000006', 213, NULL, 5, 3, 'uuuu', '<p>dfssssssssssssssssss</p>', NULL, '90.00', 'red', '12', 'Dell', '2017-06-16', 'ddddddddddd', 1, '4', '2017-06-16', NULL, NULL, 'inventory'),
(54, 'nnnnnnnnnnnnnn000', 219, 0, 6, 3, 'sdfsdfsdf', '<p>asdsadadasd</p>', NULL, '34.00', 'red', '34', 'fsdsdfsf', '2017-04-20', 'sdffsdf', 1, NULL, '2017-04-20', NULL, NULL, 'product'),
(57, 'inv0000004', 0, 9, 6, 3, 'sdfsdf', '<p>&lt;p&gt;fsdfsf&lt;/p&gt;</p>', NULL, '90.00', 'red', '56', 'sfddfd', '2017-05-17', 'sdfdf', 1, NULL, '2017-06-14', NULL, NULL, 'inventory'),
(65, 'inv0000005', 213, NULL, 6, 3, 'gggggggggggg', '<p>gggggggggggggggggggggg</p>', NULL, '12.00', 're', '12', 'fdddddddddddddd', '2017-06-16', 'sssssssssssss', 1, '4', '2017-06-16', NULL, NULL, 'inventory'),
(59, 'p 0001', 222, 9, 5, 3, 'DDD', '<p>sdfsdfsfs</p>', NULL, '45.00', 'red', '40', 'sdfsdf', '2017-05-19', 'dsfsdf', 1, NULL, '2017-05-18', NULL, NULL, 'product');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_promotion`
--

CREATE TABLE `tbl_promotion` (
  `pro_id` varchar(20) NOT NULL,
  `occ_id` int(10) UNSIGNED DEFAULT NULL,
  `str_id` int(10) UNSIGNED NOT NULL,
  `status` char(1) NOT NULL,
  `pro_name` varchar(200) DEFAULT NULL,
  `pro_type` varchar(100) NOT NULL,
  `cat_id` int(10) UNSIGNED NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_promotion`
--

INSERT INTO `tbl_promotion` (`pro_id`, `occ_id`, `str_id`, `status`, `pro_name`, `pro_type`, `cat_id`, `date_from`, `date_to`) VALUES
('59224b4ebf947', 8, 9, '1', NULL, 'd', 6, '2017-05-22', '2017-05-23');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_promotion_det`
--

CREATE TABLE `tbl_promotion_det` (
  `pro_det_id` int(11) NOT NULL,
  `pro_id` varchar(20) DEFAULT NULL,
  `p_id` int(11) DEFAULT NULL,
  `discount_percent` int(11) NOT NULL,
  `qty_buy` int(11) DEFAULT NULL,
  `item_free` int(11) DEFAULT NULL,
  `qty_free` int(11) DEFAULT NULL,
  `buy_total` double DEFAULT NULL,
  `discount_cash` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_promotion_det`
--

INSERT INTO `tbl_promotion_det` (`pro_det_id`, `pro_id`, `p_id`, `discount_percent`, `qty_buy`, `item_free`, `qty_free`, `buy_total`, `discount_cash`) VALUES
(177, '59224b4ebf947', 57, 12, NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_promotion_occasion`
--

CREATE TABLE `tbl_promotion_occasion` (
  `occ_id` int(10) UNSIGNED NOT NULL,
  `occ_name` varchar(100) NOT NULL,
  `occ_desc` text NOT NULL,
  `user_crea` varchar(100) NOT NULL,
  `date_crea` date DEFAULT NULL,
  `user_updt` varchar(100) NOT NULL,
  `date_updt` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Table structure for table `tbl_slide`
--

CREATE TABLE `tbl_slide` (
  `slide_id` int(11) NOT NULL,
  `slide_name` varchar(150) DEFAULT NULL,
  `slide_desc` text,
  `slide_url` text,
  `slide_path` text,
  `slide_status` int(1) DEFAULT NULL,
  `user_crea` varchar(50) DEFAULT NULL,
  `date_crea` date DEFAULT NULL,
  `user_updt` varchar(50) DEFAULT NULL,
  `date_updt` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_slide`
--

INSERT INTO `tbl_slide` (`slide_id`, `slide_name`, `slide_desc`, `slide_url`, `slide_path`, `slide_status`, `user_crea`, `date_crea`, `user_updt`, `date_updt`) VALUES
(1, 'dsfsfsf', '<p>sdfdsfsfdsfdsfsdfsd</p>', 'sdfsf', 'banner1.jpg', 1, 'admin', '2017-03-19', 'admin', '2017-04-27'),
(2, 'ddddddddddddd', '<p>ssdsaasdsa</p>', 'ddddd', '3.png', 1, 'admin', '2017-03-21', 'admin', '2017-04-27'),
(3, 'dssadsadsad', '<p>rrwerrewrewr</p>', 'sadasdas', '0db8dd32459533.5683ebb55376c.jpg', 1, 'admin', '2017-03-21', 'admin', '2017-04-27');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stock`
--

CREATE TABLE `tbl_stock` (
  `stk_id` int(11) NOT NULL,
  `p_id` int(11) DEFAULT NULL,
  `str_id` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT '0',
  `stk_type` varchar(20) DEFAULT NULL,
  `stk_flow` varchar(20) NOT NULL,
  `stk_desc` text,
  `user_crea` varchar(50) DEFAULT NULL,
  `date_crea` date DEFAULT NULL,
  `user_updt` varchar(50) DEFAULT NULL,
  `date_updt` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_stock`
--

INSERT INTO `tbl_stock` (`stk_id`, `p_id`, `str_id`, `qty`, `stk_type`, `stk_flow`, `stk_desc`, `user_crea`, `date_crea`, `user_updt`, `date_updt`) VALUES
(103, 33, 9, 1, 'n/a', 'stock out', NULL, 'N/A', '2017-04-04', NULL, NULL),
(104, 33, 9, 1, 'stock out', 'n/a', NULL, 'N/A', '2017-04-04', NULL, NULL),
(105, 33, 9, 1, 'stock out', 'n/a', NULL, NULL, '2017-04-04', NULL, NULL),
(106, 33, 9, 1, 'stock out', 'n/a', NULL, NULL, '2017-04-04', NULL, NULL),
(107, 35, 6, 1, 'stock out', 'n/a', NULL, NULL, '2017-04-04', NULL, NULL),
(108, 33, 9, 1, 'stock out', 'n/a', NULL, NULL, '2017-04-04', NULL, NULL),
(109, 35, 6, 1, 'stock out', 'n/a', NULL, NULL, '2017-04-04', NULL, NULL),
(110, 33, 9, 1, 'stock out', 'n/a', NULL, NULL, '2017-04-04', NULL, NULL),
(111, 35, 6, 1, 'stock out', 'n/a', NULL, NULL, '2017-04-04', NULL, NULL),
(112, 35, 6, 1, 'stock out', 'n/a', NULL, NULL, '2017-04-04', NULL, NULL),
(113, 35, 6, 1, 'stock out', 'n/a', NULL, NULL, '2017-04-04', NULL, NULL),
(114, 35, 6, 1, 'stock out', 'n/a', NULL, NULL, '2017-04-04', NULL, NULL),
(115, 35, 6, 1, 'stock out', 'n/a', NULL, NULL, '2017-04-04', NULL, NULL),
(116, 33, 9, 1, 'stock out', 'n/a', NULL, NULL, '2017-04-04', NULL, NULL),
(117, 35, 6, 1, 'stock out', 'n/a', NULL, NULL, '2017-04-04', NULL, NULL),
(118, 35, 6, 1, 'stock out', 'n/a', NULL, NULL, '2017-04-04', NULL, NULL),
(119, 33, 9, 1, 'stock out', 'n/a', NULL, NULL, '2017-04-04', NULL, NULL),
(120, 33, 9, 1, 'stock out', 'n/a', NULL, NULL, '2017-04-04', NULL, NULL),
(121, 35, 6, 1, 'stock out', 'n/a', NULL, NULL, '2017-04-04', NULL, NULL),
(122, 35, 6, 1, 'stock out', 'n/a', NULL, NULL, '2017-04-04', NULL, NULL),
(123, 33, 9, 1, 'stock out', 'n/a', NULL, NULL, '2017-04-04', NULL, NULL),
(124, 35, 6, 1, 'stock out', 'n/a', NULL, NULL, '2017-04-04', NULL, NULL),
(125, 33, 9, 1, 'stock out', 'n/a', NULL, NULL, '2017-04-04', NULL, NULL),
(126, 35, 6, 1, 'stock out', 'n/a', NULL, NULL, '2017-04-04', NULL, NULL),
(127, 35, 6, 1, 'stock out', 'n/a', NULL, NULL, '2017-04-04', NULL, NULL),
(128, 33, 9, 1, 'stock out', 'n/a', NULL, NULL, '2017-04-04', NULL, NULL),
(129, 35, 6, 1, 'stock out', 'n/a', NULL, NULL, '2017-04-04', NULL, NULL),
(130, 35, 6, 1, 'stock out', 'n/a', NULL, NULL, '2017-04-04', NULL, NULL),
(131, 35, 6, 90, 'stock out', 'n/a', NULL, NULL, '2017-04-04', NULL, NULL),
(132, 35, 6, 1, 'stock out', 'n/a', NULL, NULL, '2017-04-04', NULL, NULL),
(133, 35, 6, 1, 'stock out', 'n/a', NULL, NULL, '2017-04-04', NULL, NULL),
(134, 35, 6, 1, 'stock out', 'n/a', NULL, NULL, '2017-04-04', NULL, NULL),
(135, 35, 6, 1, 'stock out', 'n/a', NULL, NULL, '2017-04-04', NULL, NULL),
(136, 35, 6, 1, 'stock out', 'n/a', NULL, NULL, '2017-04-04', NULL, NULL),
(137, 35, 6, 1, 'stock out', 'n/a', NULL, NULL, '2017-04-04', NULL, NULL),
(138, 33, 9, 1, 'stock out', 'n/a', NULL, NULL, '2017-04-04', NULL, NULL),
(139, 35, 6, 1, 'stock out', 'n/a', NULL, NULL, '2017-04-04', NULL, NULL),
(140, 35, 6, 1, 'stock out', 'n/a', NULL, NULL, '2017-04-04', NULL, NULL),
(141, 35, 6, 1, 'stock out', 'n/a', NULL, NULL, '2017-04-04', NULL, NULL),
(142, 33, 9, 1, 'stock out', 'n/a', NULL, NULL, '2017-04-04', NULL, NULL),
(143, 35, 6, 1, 'stock out', 'n/a', NULL, NULL, '2017-04-04', NULL, NULL),
(145, 38, 9, 45, 'stock in', '', NULL, NULL, '2017-04-06', NULL, NULL),
(146, 40, 9, 900, 'stock in', '', NULL, NULL, '2017-04-07', NULL, NULL),
(181, 45, 9, 1, 'product', 'stock_out', NULL, '1', '2017-04-21', NULL, NULL),
(147, 41, 9, 34, 'stock in', '', NULL, NULL, '2017-04-07', NULL, NULL),
(148, 43, 9, 23, 'stock in', '', NULL, NULL, '2017-04-10', NULL, NULL),
(149, 40, 9, 1, 'product', 'stock_out', NULL, '4', '2017-04-12', NULL, NULL),
(150, 41, 9, 1, 'product', 'stock_out', NULL, '4', '2017-04-13', NULL, NULL),
(151, 40, 9, 1, 'product', 'stock_out', NULL, '4', '2017-04-13', NULL, NULL),
(152, 45, 1, 20, 'Stock In', '', '<p>sefsfsdfsfsdfsd</p>', 'admin', '2017-04-21', NULL, NULL),
(153, 31, 1, 22, 'Stock In', '', '', 'admin', '2017-04-21', NULL, NULL),
(154, 47, 1, 45, 'stock in', '', NULL, 'admin', '2017-04-19', NULL, NULL),
(155, 48, 1, 12, 'Stock In', '', '', 'admin', '2017-04-21', NULL, NULL),
(156, 49, 1, 54, 'stock in', '', NULL, 'admin', '2017-04-19', NULL, NULL),
(157, 50, 1, 0, 'stock in', '', NULL, 'admin', '2017-04-19', NULL, NULL),
(180, 51, 7, 1, 'product', 'stock_out', NULL, '1', '2017-04-21', NULL, NULL),
(159, 52, 1, 45, 'stock in', '', NULL, 'admin', '2017-04-19', NULL, NULL),
(160, 38, 9, 1, 'product', 'stock_out', NULL, '1', '2017-04-19', NULL, NULL),
(161, 45, 1, 20, 'Stock In', 'stock_out', '<p>sefsfsdfsfsdfsd</p>', 'admin', '2017-04-21', NULL, NULL),
(163, 31, 1, 22, 'Stock In', 'stock_out', '', 'admin', '2017-04-21', NULL, NULL),
(165, 31, 1, 22, 'Stock In', 'stock_out', '', 'admin', '2017-04-21', NULL, NULL),
(166, 38, 9, 3, 'product', 'stock_out', NULL, '4', '2017-04-20', NULL, NULL),
(179, 36, 1, 12, 'Stock In', 'stock_out', '<p>cccccccccccccccc</p>', 'admin', '2017-06-15', NULL, NULL),
(178, 45, 9, 1, 'product', 'stock_out', NULL, '1', '2017-04-21', NULL, NULL),
(169, 38, 9, 1, 'product', 'stock_out', NULL, '1', '2017-04-20', NULL, NULL),
(170, 41, 9, 1, 'product', 'stock_out', NULL, '4', '2017-04-20', NULL, NULL),
(171, 47, 0, 3, 'product', 'stock_out', NULL, '1', '2017-04-20', NULL, NULL),
(172, 38, 9, 1, 'product', 'stock_out', NULL, '1', '2017-04-20', NULL, NULL),
(177, 45, 1, 20, 'Stock In', 'stock_out', '<p>sefsfsdfsfsdfsd</p>', 'admin', '2017-04-21', NULL, NULL),
(183, 59, 1, 90, 'Stock In', '', '<p>vbbbbbbbbbbbbbbbbb</p>', 'admin', '2017-06-15', NULL, NULL),
(190, 60, 9, 1, 'product', 'stock_out', NULL, '4', '2017-06-15', NULL, NULL),
(188, 61, 1, 12, 'Stock Out', '', '<p>ddddddddddddddddddd</p>', 'admin', '2017-06-15', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_store`
--

CREATE TABLE `tbl_store` (
  `str_id` int(11) NOT NULL,
  `str_code` varchar(100) DEFAULT NULL,
  `acc_id` int(11) DEFAULT NULL,
  `str_name` varchar(150) DEFAULT NULL,
  `str_type` varchar(150) DEFAULT NULL,
  `str_desc` text,
  `str_img` varchar(200) DEFAULT NULL,
  `user_crea` varchar(50) DEFAULT NULL,
  `date_crea` date DEFAULT NULL,
  `user_updt` varchar(50) DEFAULT NULL,
  `date_updt` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_store`
--

INSERT INTO `tbl_store` (`str_id`, `str_code`, `acc_id`, `str_name`, `str_type`, `str_desc`, `str_img`, `user_crea`, `date_crea`, `user_updt`, `date_updt`) VALUES
(6, 'Store 00 3', 199, 'parkson', '', '<p>dasasdsadsfsdfsdf</p>', 'CAM220IP-Camera-Dome.jpg', 'admin', '2017-03-22', NULL, '2017-03-24'),
(9, 'Str 009', 222, 'Apple', 'dffsff', '<p>sdfsdfdsfsf</p>', 'apple-iphone-7-plus-gallery-img-6.jpg', NULL, '2017-03-23', 'admin', '2017-04-20'),
(8, 'hhhhhhhhhhhhhddd', 199, 'Big Phone', 'ttttddd', '<p>dfsdfsfsfss</p>', 'brand4.png', NULL, '2017-03-22', NULL, '2017-03-23'),
(14, 'Store 00 3', 212, 'ABC', 'Service', '<p>dsfsfdsfsf</p>', '600.png', 'admin', '2017-06-14', 'admin', '2017-06-14'),
(12, 'Str', 216, 'ABC', 'ccvvv', '<p>sdffsdff</p>', '8834912_l.jpg', 'admin', '2017-04-20', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sysdata`
--

CREATE TABLE `tbl_sysdata` (
  `key_id` int(11) NOT NULL,
  `key_type` varchar(100) DEFAULT NULL,
  `key_code` varchar(100) DEFAULT NULL,
  `key_data` varchar(100) DEFAULT NULL,
  `key_data1` text,
  `key_data2` varchar(100) DEFAULT NULL,
  `user_crea` varchar(50) DEFAULT NULL,
  `date_crea` date DEFAULT NULL,
  `user_updt` varchar(50) DEFAULT NULL,
  `date_updt` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_sysdata`
--

INSERT INTO `tbl_sysdata` (`key_id`, `key_type`, `key_code`, `key_data`, `key_data1`, `key_data2`, `user_crea`, `date_crea`, `user_updt`, `date_updt`) VALUES
(1, 'marquee', NULL, NULL, '<p>E-Commerce or Electronics Commerce is a methodology of modern business, which addresses the requirements of business organizations. It can be broadly defined as the process of buying or selling of goods or services using an electronic medium such as the Internet. This tutorial takes adopts a simple and practical approach to explain the governing principles of e-commerce.</p>', NULL, NULL, NULL, NULL, NULL),
(9, 'template', NULL, '0', 'template.jpg', NULL, NULL, NULL, NULL, NULL),
(12, 'template', NULL, '0', '600.png', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_code` varchar(50) DEFAULT NULL,
  `user_name` varchar(100) DEFAULT NULL,
  `user_pass` varchar(100) DEFAULT NULL,
  `user_desc` varchar(250) DEFAULT NULL,
  `user_type` varchar(50) DEFAULT NULL,
  `user_status` int(1) DEFAULT NULL,
  `user_crea` varchar(50) DEFAULT NULL,
  `date_crea` date DEFAULT NULL,
  `user_updt` varchar(50) DEFAULT NULL,
  `date_updt` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_code`, `user_name`, `user_pass`, `user_desc`, `user_type`, `user_status`, `user_crea`, `date_crea`, `user_updt`, `date_updt`) VALUES
(3, 'admin', 'administrator', '8cb2237d0679ca88db6464eac60da96345513964', '', 'admin', 1, 'N/A', '2017-02-10', 'admin', '2017-04-20');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wallet`
--

CREATE TABLE `tbl_wallet` (
  `wal_id` int(11) NOT NULL,
  `acc_id` int(11) DEFAULT NULL,
  `wal_code` varchar(100) DEFAULT NULL,
  `wal_desc` text,
  `wal_status` int(1) DEFAULT NULL,
  `user_crea` varchar(50) DEFAULT NULL,
  `date_crea` date DEFAULT NULL,
  `user_updt` varchar(50) DEFAULT NULL,
  `date_updt` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_wallet`
--

INSERT INTO `tbl_wallet` (`wal_id`, `acc_id`, `wal_code`, `wal_desc`, `wal_status`, `user_crea`, `date_crea`, `user_updt`, `date_updt`) VALUES
(24, 212, 'Code 002', '<p>adssssssssssssssss</p>', 1, 'admin', '2017-06-15', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wallet_transaction`
--

CREATE TABLE `tbl_wallet_transaction` (
  `wal_tran_id` int(11) NOT NULL,
  `wal_id` int(11) DEFAULT NULL,
  `tran_type` varchar(50) DEFAULT NULL,
  `tran_amt` decimal(18,2) DEFAULT NULL,
  `tran_date` datetime DEFAULT NULL,
  `tran_status` char(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_wallet_transaction`
--

INSERT INTO `tbl_wallet_transaction` (`wal_tran_id`, `wal_id`, `tran_type`, `tran_amt`, `tran_date`, `tran_status`) VALUES
(103, 25, 'cash_in', '90.00', '2017-06-15 00:00:00', '1'),
(102, 24, 'cash_out', '90.00', '2017-06-15 10:08:06', '1'),
(101, 24, 'cash_in', '1000.00', '2017-06-15 00:00:00', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_account`
--
ALTER TABLE `tbl_account`
  ADD PRIMARY KEY (`acc_id`);

--
-- Indexes for table `tbl_advertisement`
--
ALTER TABLE `tbl_advertisement`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `tbl_blog`
--
ALTER TABLE `tbl_blog`
  ADD PRIMARY KEY (`bl_id`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brn_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD PRIMARY KEY (`cm_id`);

--
-- Indexes for table `tbl_location`
--
ALTER TABLE `tbl_location`
  ADD PRIMARY KEY (`loc_id`);

--
-- Indexes for table `tbl_media`
--
ALTER TABLE `tbl_media`
  ADD PRIMARY KEY (`media_id`);

--
-- Indexes for table `tbl_member`
--
ALTER TABLE `tbl_member`
  ADD PRIMARY KEY (`mem_id`);

--
-- Indexes for table `tbl_order_det`
--
ALTER TABLE `tbl_order_det`
  ADD PRIMARY KEY (`ord_det_id`);

--
-- Indexes for table `tbl_order_hdr`
--
ALTER TABLE `tbl_order_hdr`
  ADD PRIMARY KEY (`ord_id`);

--
-- Indexes for table `tbl_permission`
--
ALTER TABLE `tbl_permission`
  ADD PRIMARY KEY (`per_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `tbl_promotion`
--
ALTER TABLE `tbl_promotion`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `tbl_promotion_det`
--
ALTER TABLE `tbl_promotion_det`
  ADD PRIMARY KEY (`pro_det_id`);

--
-- Indexes for table `tbl_promotion_occasion`
--
ALTER TABLE `tbl_promotion_occasion`
  ADD PRIMARY KEY (`occ_id`);

--
-- Indexes for table `tbl_slide`
--
ALTER TABLE `tbl_slide`
  ADD PRIMARY KEY (`slide_id`);

--
-- Indexes for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  ADD PRIMARY KEY (`stk_id`);

--
-- Indexes for table `tbl_store`
--
ALTER TABLE `tbl_store`
  ADD PRIMARY KEY (`str_id`);

--
-- Indexes for table `tbl_sysdata`
--
ALTER TABLE `tbl_sysdata`
  ADD PRIMARY KEY (`key_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_wallet`
--
ALTER TABLE `tbl_wallet`
  ADD PRIMARY KEY (`wal_id`);

--
-- Indexes for table `tbl_wallet_transaction`
--
ALTER TABLE `tbl_wallet_transaction`
  ADD PRIMARY KEY (`wal_tran_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_account`
--
ALTER TABLE `tbl_account`
  MODIFY `acc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=234;
--
-- AUTO_INCREMENT for table `tbl_advertisement`
--
ALTER TABLE `tbl_advertisement`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_blog`
--
ALTER TABLE `tbl_blog`
  MODIFY `bl_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brn_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  MODIFY `cm_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_location`
--
ALTER TABLE `tbl_location`
  MODIFY `loc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_media`
--
ALTER TABLE `tbl_media`
  MODIFY `media_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;
--
-- AUTO_INCREMENT for table `tbl_member`
--
ALTER TABLE `tbl_member`
  MODIFY `mem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `tbl_order_det`
--
ALTER TABLE `tbl_order_det`
  MODIFY `ord_det_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;
--
-- AUTO_INCREMENT for table `tbl_order_hdr`
--
ALTER TABLE `tbl_order_hdr`
  MODIFY `ord_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `tbl_permission`
--
ALTER TABLE `tbl_permission`
  MODIFY `per_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT for table `tbl_promotion_det`
--
ALTER TABLE `tbl_promotion_det`
  MODIFY `pro_det_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;
--
-- AUTO_INCREMENT for table `tbl_promotion_occasion`
--
ALTER TABLE `tbl_promotion_occasion`
  MODIFY `occ_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tbl_slide`
--
ALTER TABLE `tbl_slide`
  MODIFY `slide_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  MODIFY `stk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;
--
-- AUTO_INCREMENT for table `tbl_store`
--
ALTER TABLE `tbl_store`
  MODIFY `str_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tbl_sysdata`
--
ALTER TABLE `tbl_sysdata`
  MODIFY `key_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_wallet`
--
ALTER TABLE `tbl_wallet`
  MODIFY `wal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `tbl_wallet_transaction`
--
ALTER TABLE `tbl_wallet_transaction`
  MODIFY `wal_tran_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
