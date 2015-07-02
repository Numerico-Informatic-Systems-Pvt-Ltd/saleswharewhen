-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 02, 2015 at 07:10 AM
-- Server version: 5.5.42-37.1-log
-- PHP Version: 5.4.23

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `nisclie1_swwnew`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `active_upto` date NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `date`, `active_upto`, `status`) VALUES
(1, 'admin@sales.com', '827ccb0eea8a706c4c34a16891f84e7b', '2015-01-23 13:20:12', '2020-05-04', 1);

-- --------------------------------------------------------

--
-- Table structure for table `admin_images`
--

DROP TABLE IF EXISTS `admin_images`;
CREATE TABLE IF NOT EXISTS `admin_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image_type` varchar(255) NOT NULL,
  `image_size` int(11) NOT NULL COMMENT '1=585*423||2=219*240||3=219*183',
  `image_name` varchar(255) NOT NULL,
  `image_url` text NOT NULL,
  `display_on` datetime NOT NULL,
  `display_off` datetime NOT NULL,
  `status` tinyint(2) NOT NULL,
  `is_deleted` tinyint(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `admin_images`
--

INSERT INTO `admin_images` (`id`, `image_type`, `image_size`, `image_name`, `image_url`, `display_on`, `display_off`, `status`, `is_deleted`) VALUES
(1, '1', 0, '', '', '2015-02-18 00:00:00', '2015-03-31 00:00:00', 0, 0),
(2, '1', 0, '<p>You did not select a file to upload.</p>', '', '2015-02-03 00:00:00', '2015-02-28 00:00:00', 1, 0),
(3, '1', 0, '<p>You did not select a file to upload.</p>', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(4, '1', 0, '<p>You did not select a file to upload.</p>', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(5, '1', 0, 'search_bg.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1),
(6, '2', 0, 'subway_prd1.jpg', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1),
(7, '2', 0, 'nestley_prd.jpg', '', '2015-02-13 12:00:00', '2015-02-28 12:00:00', 0, 1),
(8, '0', 0, 'jini_prd.jpg', '', '2015-02-03 12:00:00', '2015-02-28 12:00:00', 0, 0),
(9, '2', 1, 'banner_one.jpg', '', '2015-01-01 12:00:00', '2015-12-31 12:00:00', 1, 1),
(10, '2', 1, 'thumb_banner_one1.jpg', '', '2015-02-01 12:00:00', '2015-05-30 12:00:00', 1, 1),
(11, '2', 2, 'thumb_banner_two1.jpg', '', '2015-09-30 12:00:00', '2016-04-14 12:00:00', 1, 1),
(12, '2', 2, 'thumb_banner_three1.jpg', 'http://sww.nisclient.com/home/productDetails/5', '2015-01-01 12:00:00', '2016-01-14 12:00:00', 1, 1),
(13, '2', 2, 'thumb_banner_two.jpg', 'http://sww.nisclient.com/home/productDetails/13', '2015-01-01 12:00:00', '2015-12-30 12:00:00', 1, 1),
(14, '2', 2, 'thumb_banner_three.jpg', '', '2015-01-01 12:00:00', '2015-12-31 12:00:00', 1, 1),
(15, '2', 3, 'thumb_banner_four.jpg', 'http://sww.nisclient.com/home/productDetails/1', '2015-02-04 12:00:00', '2016-03-17 12:00:00', 1, 1),
(16, '2', 3, 'thumb_banner_five1.jpg', 'http://sww.nisclient.com/home/productDetails/5', '2015-01-01 12:00:00', '2015-12-30 12:00:00', 1, 1),
(17, '2', 3, 'thumb_banner_four1.jpg', 'http://sww.nisclient.com/home/productDetails/1', '2015-01-01 12:00:00', '2015-12-30 12:00:00', 1, 1),
(18, '2', 3, 'thumb_banner_five.jpg', '', '2015-01-01 12:00:00', '2015-12-30 12:00:00', 1, 1),
(19, '3', 0, 'grocery_big1.jpg', 'http://localhost/project/sww', '2015-04-06 12:00:00', '2015-04-30 12:00:00', 1, 1),
(20, '3', 0, 'grocery_big11.jpg', 'http://localhost/project/sww', '2015-04-06 12:00:00', '2015-05-06 12:00:00', 1, 1),
(21, '3', 0, 'grocery_big12.jpg', 'http://localhost/project/sww', '2015-04-06 12:00:00', '2015-05-06 12:00:00', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `advertisment`
--

DROP TABLE IF EXISTS `advertisment`;
CREATE TABLE IF NOT EXISTS `advertisment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` int(11) NOT NULL,
  `advertisements_type` int(11) NOT NULL COMMENT '1="Category List Page",2="Home Search Result",3="Grocery"',
  `image_type` int(11) NOT NULL COMMENT '1="Slider",2="Big"',
  `adv_title` varchar(255) NOT NULL,
  `adv_image` varchar(500) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `advertisment`
--

INSERT INTO `advertisment` (`id`, `category`, `advertisements_type`, `image_type`, `adv_title`, `adv_image`, `status`, `is_deleted`) VALUES
(1, 3, 0, 0, 'Travel', 'thumbASI_Memories_Fun_Pass_banner_new.jpg', 1, 1),
(2, 1, 0, 0, 'Travel1', 'thumbdisney_bg.jpg', 1, 1),
(3, 3, 0, 0, 'Ads', 'thumbBOM-Banner-Ad.png', 1, 1),
(4, 3, 0, 0, 'Test', 'thumbGrocery_Shop.jpeg', 1, 0),
(5, 3, 0, 0, 'Test1', 'thumb1391406012home-banner4_t.jpg', 1, 1),
(6, 14, 0, 0, 'BeautyFashion', 'thumbbn_covergirl.jpg', 1, 0),
(7, 14, 0, 0, 'BeautyFashion1', 'thumbdownload.jpg', 1, 1),
(8, 16, 0, 0, 'Health Fitness', 'thumbHealthFitness1.jpg', 1, 1),
(9, 16, 0, 0, 'Health Fitness1', 'thumbHealthFitness.jpg', 1, 1),
(10, 1, 1, 1, 'Travel & Vacations', 'thumboie_201652521MF3AgYa.jpg', 1, 1),
(11, 61, 1, 2, 'Travel & Vacations', 'thumbthumbbn_covergirl1.jpg', 1, 1),
(12, 14, 1, 1, 'FoodSlider1', 'thumbbahamas_49d_650x310.jpg', 1, 1),
(13, 61, 2, 1, 'Travel & Vacations', 'thumboie_201779OjZ8ALYf.jpg', 1, 1),
(14, 61, 2, 2, 'Right Search Add', 'thumbrt_banner.jpg', 1, 1),
(15, 61, 2, 2, 'Right Search Add', 'thumblt_panel_add.jpg', 1, 1),
(16, 61, 3, 0, 'Grocery', 'thumb211.jpg', 1, 1),
(17, 1, 1, 2, 'Travel & Vacations', 'thumb212.jpg', 1, 1),
(18, 14, 1, 2, 'Beauti & Fashion', 'thumb213.jpg', 1, 1),
(19, 61, 3, 0, '21 Days Diet', 'thumbBanner_3.png', 1, 1),
(20, 14, 1, 2, 'Loreal Paris', 'thumbk2-_a33b21af-571f-48e0-a2f6-014a12777f7b.v1_.png', 1, 1),
(21, 16, 1, 2, 'Suave Brand', 'thumbk2-_32915597-3320-4c20-9c7a-ad881e4a985b.v1_.png', 1, 1),
(22, 3, 1, 2, 'Party hard Sunny Beach', 'thumbSUN_Lads-Hol-Event-Banner-1200x200.jpg', 1, 1),
(23, 66, 1, 2, '21 Days Diet', 'thumbBanner_31.png', 1, 1),
(24, 14, 1, 1, 'Beauti and Fashion', 'thumbbridal_banner.jpg', 1, 1),
(25, 14, 1, 2, 'Fashion Image', 'thumbbeauty-report-banner.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `alert`
--

DROP TABLE IF EXISTS `alert`;
CREATE TABLE IF NOT EXISTS `alert` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  `type_data` varchar(255) NOT NULL,
  `alert_type` varchar(255) NOT NULL,
  `item` varchar(255) NOT NULL,
  `band` varchar(255) NOT NULL,
  `shop` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `alert`
--

INSERT INTO `alert` (`id`, `type`, `type_data`, `alert_type`, `item`, `band`, `shop`, `status`) VALUES
(1, '1', 'shibnis@gmail.com', '0', 'sample', '1,2,3,4,5,6,7,13,14,15,16,17', '0', 1),
(2, '1', 'shibnis@gmail.com', '0', 'shibu', '3,4,5,6,7,8,9,10', '7', 1),
(3, '1', 'shibnis@gmail.com', '0', 'shibu', '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18', '5', 1),
(4, '1', 'shibnis@gmail.com', '0', 'rfsdfsdfsd', '1,2,3,4,5', '7', 1),
(5, '1', 'doublezero7@hotmail.com', '0', 'gggg', '77', '0', 1),
(6, '1', 'doublezero7@hotmail.com', '0', 'bread', '3', '0', 1),
(7, '1', 'abcd@efg.com', '0', 'KFC', '3', '7', 1),
(8, '1', 'shibnis@gmail.com', '0', 'Bajaj Almond', '1,2,3,4,5,6,7,10,12,13,14,15,16,17,18,19', '0', 1),
(9, '1', 'shibnis@gmail.com', '0', 'Whole Foods', '3,6,7,8,9', '0', 1),
(10, '1', 'shibnis@gmail.com', '0', 'Bajaj Almond', '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,55,56,57,58,59,60,61,62,63,64,65,66,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91,', '0', 1),
(11, '1', 'shibnis@gmail.com', '0', 'shibbu', '2', '4', 1);

-- --------------------------------------------------------

--
-- Table structure for table `alert_mail_sent`
--

DROP TABLE IF EXISTS `alert_mail_sent`;
CREATE TABLE IF NOT EXISTS `alert_mail_sent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alert_id` int(11) NOT NULL,
  `emailed_date` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `alert_mail_sent`
--

INSERT INTO `alert_mail_sent` (`id`, `alert_id`, `emailed_date`) VALUES
(1, 1, '2015-05-27'),
(7, 2, '2015-05-27'),
(8, 3, '2015-05-27'),
(9, 6, '2015-05-28');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

DROP TABLE IF EXISTS `brand`;
CREATE TABLE IF NOT EXISTS `brand` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `merchant_id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `brand_image` varchar(250) NOT NULL,
  `brand_logo` varchar(255) NOT NULL,
  `speciality` text NOT NULL,
  `head_office` text NOT NULL,
  `head_contact` varchar(255) NOT NULL,
  `site_office` text NOT NULL,
  `site_contact` varchar(255) NOT NULL,
  `location` text NOT NULL,
  `posted_on` datetime NOT NULL,
  `brand_location_map` text NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '0',
  `is_deleted` tinyint(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `merchant_id`, `name`, `brand_image`, `brand_logo`, `speciality`, `head_office`, `head_contact`, `site_office`, `site_contact`, `location`, `posted_on`, `brand_location_map`, `status`, `is_deleted`) VALUES
(1, 0, 'Hilton Hotels and Resorts', 'Hilton_LOGO_BK_R_White_2.jpg', 'thumb_Hilton_LOGO_BK_R_White_2.jpg', 'Tours & Travels', 'Menelik II Ave, Addis Ababa 1164, Ethiopia', '251115170000', 'Menelik II Ave, Addis Ababa 1164, Ethiopia', '251115170000', 'Menelik II Ave, Addis Ababa 1164, Ethiopia', '2015-03-28 06:58:42', '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d31523.358430846598!2d38.74649285964965!3d9.025414005539858!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x7d2d64a64dc9c36f!2sHilton+Addis+Ababa!5e0!3m2!1sen!2sin!4v1427547502812" width="600" height="450" frameborder="0" style="border:0"></iframe>', 1, 1),
(2, 0, 'Pizza Hut', 'images.jpg', 'thumb_images.jpg', 'Food', 'Mililani, Hawaii, USA 96789: Pizza Hut Mililani', '8086235599', 'Mililani, Hawaii, USA 96789: Pizza Hut Mililani', '8086235599', 'Mililani, Hawaii, USA 96789: Pizza Hut Mililani', '2015-03-28 07:05:35', '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14853.574348362818!2d-158.006414!3d21.453068!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xc9cfd0b79934fe42!2sPizza+Hut!5e0!3m2!1sen!2sin!4v1427547852823" width="600" height="450" frameborder="0" style="border:0"></iframe>', 1, 1),
(3, 0, 'Levis', 'Levis-Jean-Logo.png', 'thumb_Levis-Jean-Logo.png', 'This is an exciting time for Levi Strauss & Co. We’re building on our heritage to move the company forward, to be as innovative and relevant to today’s consumers — and tomorrow’s — as we were when we invented the blue jean 140 years ago.\n\nWhen did you first discover one of our products? Millions of people around the world have grown up with Levi’s® blue jeans and Dockers® khakis. I’m one of them. And it’s my privilege to lead this company as we strive to engage consumers with new and familiar products, all while minimizing our impact on the planet.\n\n chip-bergh\nBut it takes more than our strong, enduring brands — which also include Signature by Levi Strauss & Co.™ and Denizen® — to succeed. It takes people to bring our product to life every day. I see these talented and creative folks at our headquarters in San Francisco and in our offices around the world. They’re proud to be here, working for a company that has long been a leader — not just in what we do, but how we do it.\n\nThis is a company that integrated its sewing factories decades before it was required by law. We established the first code of conduct for apparel manufacturers, ensuring the people who make our product work in a safe environment and are treated with dignity and respect. And we work to build sustainability into everything we do.', 'U.S, HEADQUARTERS, Levi Strauss & Co. 1155 Battery Street San ,Francisco, CA 94111 U.S.A.', '4155016000', 'U.S, HEADQUARTERS, Levi Strauss & Co. 1155 Battery Street San ,Francisco, CA 94111 U.S.A.', '4155016000', 'U.S, HEADQUARTERS, Levi Strauss & Co. 1155 Battery Street San ,Francisco, CA 94111 U.S.A.', '2015-03-28 07:13:11', '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3152.496027199365!2d-122.402208!3d37.801849!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808580f611d4c0fd%3A0x4aa37bb48f3ba31!2sLevi+Strauss+Employee+FCU!5e0!3m2!1sen!2sin!4v1427548176758" width="600" height="450" frameborder="0" style="border:0"></iframe>', 1, 1),
(4, 0, 'BodyLine', 'Bodyline-Logo.png', 'thumb_Bodyline-Logo.png', 'Buy Pro BODYLINE Health Equipments: Online Store For Pro BODYLINE Exercise & Fitness Products At Best Price. Find Latest Gym Exercise Equipments & Health Supplements Products .', '12852 S Saratoga Sunnyvale Rd ,Saratoga, CA 95070 ,United States', '7940260260', '12852 S Saratoga Sunnyvale Rd ,Saratoga, CA 95070 ,United States', '7940260260', '12852 S Saratoga Sunnyvale Rd ,Saratoga, CA 95070 ,United States', '2015-03-28 07:21:12', '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3174.5771525522055!2d-122.031133!3d37.281453000000006!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808fb52c3de2dbcf%3A0x6836397b6700192b!2sBody+Line+Fitness!5e0!3m2!1sen!2sin!4v1427548859969" width="600" height="450" frameborder="0" style="border:0"></iframe>', 1, 1),
(5, 0, 'LAKME COSMETICS', 'Capture.JPG', 'thumb_Capture.JPG', 'At Lakmé we share the same philosophy as professionals from around the world: a commitment to hair health, beauty and care.', 'LAKME COSMETICS S.L., Narcís Monturiol, 37. Sant Just Desvern., 08960 - ,Barcelona., SPAIN.', '934700155', 'LAKME COSMETICS S.L., Narcís Monturiol, 37. Sant Just Desvern., 08960 - ,Barcelona., SPAIN.', '934700155', 'LAKME COSMETICS S.L., Narcís Monturiol, 37. Sant Just Desvern., 08960 - ,Barcelona., SPAIN.', '2015-03-30 03:59:31', '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2993.4741137415117!2d2.068498!3d41.385509!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12a49980fca1e151%3A0x89ba6fcf8487faae!2sLakme+Cosmetics!5e0!3m2!1sen!2sin!4v1427709529694" width="600" height="450" frameborder="0" style="border:0"></iframe>', 1, 1),
(6, 0, 'Bloomingdales', 'Capture2.JPG', 'thumb_Capture2.JPG', 'Designer brand name clothes, accessories, and gifts for men, women, juniors, and children. Includes career information, credit services, and gift registry.', '59th, Street & Lexington Avenue, New York, NY', '2127053933', '59th, Street & Lexington Avenue, New York, NY', '2127053933', '59th, Street & Lexington Avenue, New York, NY', '2015-03-30 04:21:56', '<iframe src="https://www.google.com/maps/embed?pb=!1m12!1m8!1m3!1d3021.990917299095!2d-73.96817949999999!3d40.76222449999999!3m2!1i1024!2i768!4f13.1!2m1!1s59th%2C+Street+%26+Lexington+Avenue%2C+New+York%2C+NY+!5e0!3m2!1sen!2sin!4v1427710812249" width="600" height="450" frameborder="0" style="border:0"></iframe>', 1, 1),
(7, 0, 'SONY', 'sony_logo_sprite.png', 'thumb_sony_logo_sprite.png', 'Redefining the Bar', '115 Gordon Baker Road,\nNorth York, ON M2H 3R6,\nCanada', '4164965500', '115 Gordon Baker Road,\nNorth York, ON M2H 3R6,\nCanada', '4164965500', '115 Gordon Baker Road,\nNorth York, ON M2H 3R6,\nCanada', '2015-03-30 04:56:33', 'https://www.google.co.in/maps/place/Sony+Of+Canada+Ltd/@43.802505,-79.343975,17z/data=!3m1!4b1!4m2!3m1!1s0x89d4d30c22e60257:0x571c47ff0bc295d1', 1, 1),
(8, 0, 'KFC', 'Capture4.JPG', 'thumb_Capture4.JPG', 'KFC So good Super Sunday 50% off', 'KFC Canada, 101 Exchange Avenue, Vaughan Ontario L4K 5R6, Canada', '18666645696', 'KFC Canada, 101 Exchange Avenue, Vaughan Ontario L4K 5R6, Canada', '18666645696', 'KFC Canada, 101 Exchange Avenue, Vaughan Ontario L4K 5R6, Canada', '2015-03-30 05:21:22', '<iframe src="https://www.google.com/maps/embed?pb=!1m12!1m8!1m3!1d46085.33860793762!2d-79.5276676!3d43.78668899999999!3m2!1i1024!2i768!4f13.1!2m1!1sKFC+Canada%2C+101+Exchange+Avenue%2C+Vaughan+Ontario+L4K+5R6%2C+Canada!5e0!3m2!1sen!2sin!4v1427714313976" width="600" height="450" frameborder="0" style="border:0"></iframe>', 1, 1),
(9, 0, 'TARGET', 'download.png', 'thumb_download.png', 'Brighten up your living spaces with new home arrivals.', 'Target Canada\n5570 Explorer Drive,\nMississauga, ON,\nCANADA L4W OC4', '8666977276', 'Target Canada\n5570 Explorer Drive,\nMississauga, ON,\nCANADA L4W OC4', '8666977276', 'Target Canada\n5570 Explorer Drive,\nMississauga, ON,\nCANADA L4W OC4', '2015-03-30 05:27:54', '<iframe src="https://www.google.com/maps/embed?pb=!1m12!1m8!1m3!1d14744.62751901036!2d88.3579206!3d22.498296449999998!3m2!1i1024!2i768!4f13.1!2m1!1sTarget+Canada+5570+Explorer+Drive+Mississauga%2C+ON+CANADA+L4W+OC4!5e0!3m2!1sen!2sin!4v1427714671679" width="600" height="450" frameborder="0" style="border:0"></iframe>', 1, 1),
(10, 0, 'Playboy', 'download_(1).png', 'thumb_download_(1).png', 'Men''s and Women''s Perfume', '1940 Argentia Road, \nMississauga, \nON L5N 1P9, \nCanada', '5643218976', '1940 Argentia Road, \nMississauga, \nON L5N 1P9, \nCanada', '5643218976', '1940 Argentia Road, \nMississauga, \nON L5N 1P9, \nCanada', '2015-03-30 06:25:08', '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2889.268620202295!2d-79.7379748!3d43.6009483!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x882b402a26409755%3A0x38efc0e078873159!2s1940+Argentia+Rd%2C+Mississauga%2C+ON+L5N+1P9%2C+Canada!5e0!3m2!1sen!2sin!4v1427718263241" width="600" height="450" frameborder="0" style="border:0"></iframe>', 1, 1),
(11, 0, 'Cool Dawn', 'cool-dawn-recovery-drink-79088703.jpg', 'thumb_cool-dawn-recovery-drink-79088703.jpg', 'Cold Drinks', '234 Laurier Avenue West,\nOttawa, Ontario, Canada,\nK1A 0G9', '8956478569', '234 Laurier Avenue West,\nOttawa, Ontario, Canada,\nK1A 0G9', '8956478569', '234 Laurier Avenue West,\nOttawa, Ontario, Canada,\nK1A 0G9', '2015-03-30 07:44:26', '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d11202.044506173841!2d-75.696339!3d45.419197!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xc061f937f10b4200!2sBank+of+Canada!5e0!3m2!1sen!2sin!4v1427723004689" width="600" height="450" frameborder="0" style="border:0"></iframe>', 1, 1),
(17, 0, 'Gillette', '8_45.jpg', 'thumb_8_45.jpg', 'Turns Shaving Into Gliding', 'Walmart Heartland Supercentre,\n800 Matheson Blvd, West\nMississauga, ON L5V 2N6,\nCanada', '18003280403', 'Walmart Heartland Supercentre,\n800 Matheson Blvd, West\nMississauga, ON L5V 2N6,\nCanada', '18003280403', 'Walmart Heartland Supercentre,\n800 Matheson Blvd, West\nMississauga, ON L5V 2N6,\nCanada', '2015-04-06 06:24:20', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d23114.203246535988!2d-79.737745!3d43.600806999999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x882b40f5d1e217df%3A0x1944ae36bf6271e1!2sWalmart+Heartland+Supercentre!5e0!3m2!1sen!2sin!4v1428322808975" width="600" height="450" frameborder="0" style="border:0"></iframe>', 1, 1),
(18, 0, 'Whole Foods', 'images2.png', 'thumb_images2.png', 'Whole Foods Market. Organic Grocery and Supermarke', '226 East 57th Street\nBetween 2nd & 3rd Avenue\nNew York, NY 10022', '6464971222', '226 East 57th Street\nBetween 2nd & 3rd Avenue\nNew York, NY 10022', '6464971222', '226 East 57th Street\nBetween 2nd & 3rd Avenue\nNew York, NY 10022', '2015-04-06 06:25:34', '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3022.1155147416803!2d-73.966234!3d40.75948400000001!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c258e4300b82bd%3A0xf76f7dc8489b01cb!2sWhole+Foods+Market!5e0!3m2!1sen!2sin!4v1428323089409" width="600" height="450" frameborder="0" style="border:0"></iframe>', 1, 1),
(19, 0, 'Swanson Health Product', 'gI_0_Swansonlogo.jpg', 'thumb_gI_0_Swansonlogo.jpg', 'America''s Rated Catalog/Internet Brand', '109 Broadway N, Fargo, ND 58102, USA', '18008244491', '109 Broadway N, Fargo, ND 58102, USA', '18008244491', '109 Broadway N, Fargo, ND 58102, USA', '2015-04-06 06:55:51', '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2727.2865755662424!2d-96.7872328!3d46.877410499999996!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x52c8c967688ef511%3A0xd1bb5f1650689386!2s109+Broadway+N%2C+Fargo%2C+ND+58102%2C+USA!5e0!3m2!1sen!2sin!4v1428324881365" width="600" height="450" frameborder="0" style="border:0"></iframe>', 1, 1),
(20, 14, 'Bajaj Almond', '389793.jpeg', 'thumb_389793.jpeg', 'Have any questions about Indulekha or Indulekha products?', 'MOSONS Consumer Care\nIndustrial Estate, Palayad, Thalassery, Kerala-670 661', '6464971222', 'MOSONS Consumer Care\nIndustrial Estate, Palayad, Thalassery, Kerala-670 661', '6464971222', 'MOSONS Consumer Care\nIndustrial Estate, Palayad, Thalassery, Kerala-670 661', '2015-05-08 04:40:05', '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3905.564760860628!2d75.46722799999999!3d11.795664999999998!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ba424252fdec1f9:0x7d73c09962669a51!2sMoson+Extractions!5e0!3m2!1sen!2sin!4v1431077921115" width="600" height="450" frameborder="0" &gt;&lt;/iframe>', 1, 1),
(21, 14, 'Lifestyle Stores Brand', 'This_is_the_logo_of_the_Lifestyle_Stores.jpg', 'thumb_This_is_the_logo_of_the_Lifestyle_Stores.jpg', 'Some specialities', 'Lifestyle & Home Centre Mantri Mall No 1, \nSampige Road,\nMalleshwaram - 560003', '03325252565', 'Lifestyle & Home Centre Mantri Mall No 1, \nSampige Road,\nMalleshwaram - 560003', '03365656565', 'Lifestyle & Home Centre Mantri Mall No 1, \nSampige Road,\nMalleshwaram - 560003', '2015-06-17 01:28:44', '<iframe src="https://www.google.com/maps/embed?pb=!1m12!1m8!1m3!1d29484.29615087884!2d88.341939!3d22.5215475!3m2!1i1024!2i768!4f13.1!2m1!1slifestyle!5e0!3m2!1sen!2sin!4v1434524400373" width="600" height="450" frameborder="0" style="border:0"></iframe>', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `brand_locations`
--

DROP TABLE IF EXISTS `brand_locations`;
CREATE TABLE IF NOT EXISTS `brand_locations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `brand_id` int(11) NOT NULL,
  `location` text NOT NULL,
  `contact_no` varchar(150) NOT NULL,
  `is_deleted` tinyint(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `brand_locations`
--

INSERT INTO `brand_locations` (`id`, `brand_id`, `location`, `contact_no`, `is_deleted`) VALUES
(1, 0, '', '', 1),
(2, 0, '', '', 1),
(3, 0, '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(250) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `category_type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1="All",2="Grocery"',
  `category_image` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `is_deleted` tinyint(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=121 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`, `parent_id`, `category_type`, `category_image`, `status`, `is_deleted`) VALUES
(1, 'Travels and Vacations', 0, 1, 'a.jpg', 1, 1),
(2, 'Travel themes', 1, 1, 'manta-caye-4.jpg', 1, 1),
(3, 'Food & Drinks', 0, 1, 'index.jpeg', 1, 1),
(4, 'Popular Destination', 1, 1, 'usa-banner.jpg', 1, 1),
(5, 'Accomodation', 1, 1, 'aonang-tropical-resort.jpg', 1, 1),
(6, 'Chinese', 3, 1, 'indo-chinese.jpg', 1, 1),
(7, 'Asian', 3, 1, 'Crazy-Red-snapper.jpg', 1, 1),
(8, 'Mexican', 3, 1, 'index1.jpeg', 1, 1),
(9, 'Continental', 3, 1, 'Continental-Food-Image-Courtesy-Yummy.co__.ke__.jpeg', 1, 1),
(10, 'Booking and Ticket', 1, 1, 'hotelview1.jpg', 1, 1),
(11, 'Hot Drinks', 3, 1, 'index2.jpeg', 1, 1),
(12, 'Cold Drinks', 3, 1, '37ff8d093906cf767c9e4455df0ee932.jpg', 1, 1),
(13, 'Fruit Drinks', 3, 1, 'paradisedrinks1.jpg', 1, 1),
(14, 'Beauty & Fashion', 0, 1, 'bilde14.jpg', 1, 1),
(15, 'Perfumes', 14, 1, '334_aqua-fern-perfume-bottle-aqua-light.jpg', 1, 1),
(16, 'Health & Fitness', 0, 1, 'IMG_20140621_211332.jpg', 1, 1),
(17, 'Lipstick', 14, 1, 'gerard_cosmetics_lipstick_Nude.png', 1, 1),
(18, 'Spa', 14, 1, 'Foot_Spa_with_blue_border-2.jpg', 1, 1),
(19, 'Cruises', 1, 1, 'Crystal-Symphony-Sydney.jpg', 1, 1),
(20, 'Life Style', 0, 1, 'gothic-style-255060.jpg', 1, 1),
(21, 'Big City', 2, 1, 'shutterstock_53573335_2.jpg', 1, 1),
(22, 'Islands & Beaches', 2, 1, 'nassau.jpg', 1, 1),
(23, 'Electronics & Home Appliances', 0, 1, '_________________52d9e61566564.jpg', 1, 1),
(24, 'Ski Travel', 2, 1, 'm_658454_pZ8MW2fWE1RH.jpg', 1, 1),
(25, 'Snorkeling', 2, 1, 'snorkeling-category.jpg', 1, 1),
(26, 'Luxury', 2, 1, 'romantic_getaway_resorts_north_islands_seychelles_simon_upton.jpg', 1, 1),
(27, 'Disney', 2, 1, 'DFA-10587_L.jpg', 1, 1),
(28, 'Gaming & Gambling', 2, 1, 'casino_blackjack_table_3d_model_708be8db-bf83-4736-a410-a9860164bc5e.jpg', 1, 1),
(29, 'Decoration', 0, 1, 'Wedding-Venue-Decoration-Ideas.jpg', 1, 1),
(30, 'Africa', 4, 1, '7414580-animals-of-africa.jpg', 1, 1),
(31, 'Asia', 4, 1, 'Airbnb-Hospitality-Localisation-Asia-1200x1200.jpg', 1, 1),
(32, 'Caribbean', 4, 1, 'caribbean-coconut-dimensionFXmedia.jpg', 1, 1),
(33, 'Central & South America', 4, 1, 'iridium_cl_0000.jpg', 1, 1),
(34, 'Europe', 4, 1, 'REU-NASA-EARTH-2.jpg', 1, 1),
(35, 'New York City', 4, 1, 'empire_colors.jpg', 1, 1),
(36, 'Ee-Fu-Noodles', 6, 1, 'ee-fu-noodles-a1.jpg', 1, 1),
(37, 'Orlando Florida', 4, 1, 'Christmas-FrenchQuarter.jpg', 1, 1),
(38, 'Sesame-Chicken-Chinese-Food', 6, 1, 'sesame-chicken-chinese-food-24147606-1600-1600.jpg', 1, 1),
(39, 'Costa Rica', 4, 1, 'erik.goldstein_costarica_10_.jpg', 1, 1),
(40, 'San Francisco', 4, 1, 'img_0208.jpg', 1, 1),
(41, 'Cancun', 4, 1, '1_most_romantic_getaway_islands_tahiti_stregis_zach.jpeg', 1, 1),
(42, 'Punta Cana', 4, 1, 'punta_cana_all-inclusive_resort_punta_cana_princess_all-suites.jpg', 1, 1),
(43, 'Fragrant-Prawns', 6, 1, 'fragrant-south-east-asian-prawns.jpg', 1, 1),
(44, 'Jamaica', 4, 1, 'jamaica-flag-green-wayfarer-by-eyepster.jpg', 1, 1),
(45, 'Stir-fried-beef-wrap', 7, 1, 'Stir-fried-beef-wrap.jpg', 1, 1),
(46, 'Hotels', 5, 1, 'jade.jpg', 1, 1),
(47, 'great-asian-side-dish', 7, 1, 'A-great-asian-side-dish-1200x1200.jpg', 1, 1),
(48, 'Rooms', 5, 1, 'bora_bora_lemeridien558.jpg', 1, 1),
(49, 'Boats', 5, 1, 'intermarine-55-luxury-yacht-bmw-group-designworks-usa.jpg', 1, 1),
(50, 'Hotels', 10, 1, 'Santorini-at-night.jpg', 1, 1),
(51, 'Beef-and-Chicken-Satay-with-peanut-sauce', 7, 1, 'Beef-and-Chicken-Satay-with-peanut-sauce1-1200x1200.jpg', 1, 1),
(52, 'Flights', 10, 1, 'plane.jpg', 1, 1),
(53, 'taco', 8, 1, 'taco.jpg', 1, 1),
(54, 'Car', 10, 1, 'concept-of-the-eco-friendly-car-body-surface-is-covered-with-a-1200x1200.jpg', 1, 1),
(55, 'Caldo de Camaron_Mexican Shrimp Soup', 8, 1, '12.18_Caldo_de_Camaron_Mexican_Shrimp_Soup_LCDL_WeekdaySupper_.jpg', 1, 1),
(56, 'pasta-with-tomato-sauce-and-parmesan', 9, 1, '15570483-pasta-with-tomato-sauce-and-parmesan.jpg', 1, 1),
(57, 'Royal Caribbean', 19, 1, '7.jpg', 1, 1),
(58, 'Hot Strong and Irish Coffee', 11, 1, 'fullsize_b.jpg', 1, 1),
(59, 'Norweigian Cruise Lines', 19, 1, '61.jpg', 1, 1),
(60, 'wild_ginger_preparation_beverage', 12, 1, 'wild_ginger_preparation_beverage_c_wild_fotolia_hr.jpg', 1, 1),
(61, 'drink45-hurricane-', 13, 1, 'drink45-hurricane-and-barcardi-splash.jpg', 1, 1),
(62, 'Sound System', 23, 1, 'pSNYNA-BDVN8100W_main_enh.jpg', 1, 1),
(63, 'PC & Laptops', 23, 1, 'laptop.jpg', 1, 1),
(64, 'Television', 23, 1, 'TV.SONY_.Bravia_.KDL-40EX402R_.0002_.jpgced639cc-7efb-46b9-ba81-6ebb890b366bOriginal_.jpg', 1, 1),
(65, 'Vegetable Products', 3, 1, 'Products.jpg', 1, 1),
(66, 'Grocery Shopping', 0, 2, 'grocery-shopping.jpg', 1, 1),
(67, 'Tooth Paste', 66, 2, 'toothpaste.jpg', 1, 0),
(68, 'Hair Oil', 66, 2, '389793.jpeg', 1, 0),
(69, 'Tooth Brush', 66, 2, 'toothpaste1.jpg', 1, 0),
(70, 'Fruits', 66, 2, 'Fruits.jpg', 1, 1),
(71, 'Meat', 66, 2, 'Meat.jpg', 1, 1),
(72, 'Baking', 66, 2, 'Baking.jpg', 1, 1),
(73, 'Pasta & Rice', 66, 2, 'Pasta_Rice.jpg', 1, 1),
(74, 'Seasoning', 66, 2, 'Seasoning.jpg', 1, 1),
(75, 'Paper Products', 66, 2, 'Paper_Products.jpg', 1, 1),
(76, 'Vegatables', 66, 2, 'Vegatables.jpg', 1, 1),
(77, 'Frozen', 66, 2, 'Frozen.jpg', 1, 1),
(78, 'Snacks', 66, 2, 'Snacks.jpg', 1, 1),
(79, 'Seafoods', 66, 2, 'Seafoods.jpg', 1, 1),
(80, 'Cans & Jars', 66, 2, 'Cans_Jars.jpg', 1, 1),
(81, 'Cleaning', 66, 1, 'Cleaning.jpg', 1, 1),
(82, 'Sauces & Condiments', 66, 2, 'Sauces_Condiments.jpg', 1, 1),
(83, 'Personal Care', 66, 2, 'Personal_Care.jpg', 1, 1),
(84, 'Refrigerated', 66, 2, 'Refrigerated.jpg', 1, 1),
(85, 'Baby', 66, 2, 'Baby.jpg', 1, 1),
(86, 'Bakery', 66, 2, 'Bakery.jpg', 1, 1),
(87, 'Drinks', 66, 1, 'Drinks.jpg', 1, 1),
(88, 'Pets', 66, 2, 'Pets.jpg', 1, 1),
(89, 'Breakfast', 66, 2, 'Breakfast.jpg', 1, 1),
(90, 'Misc items', 66, 1, 'Misc_items.jpg', 1, 1),
(91, 'Men''s', 14, 1, 'Mens.jpg', 1, 1),
(92, 'Women''s', 14, 1, 'Womens.jpg', 1, 1),
(93, 'Kids & Baby', 14, 1, 'Kids_Baby.jpg', 1, 1),
(94, 'Designeer Collection', 14, 1, 'Designeer_Collection.jpg', 1, 1),
(95, 'Handbag & Accessories', 14, 1, 'Handbag_Accessories.JPG', 1, 1),
(96, 'Cosmetics & Fragrance', 14, 1, 'Cosmetics_Fragrance.jpg', 1, 1),
(97, 'Hair & Skin', 14, 1, 'Hair_Skin.jpg', 1, 1),
(98, 'Tattoos', 14, 1, 'tattoos.jpg', 1, 1),
(99, 'Entertainment & Nightlife', 0, 1, 'Entertainment_Nightlife.jpg', 1, 1),
(100, 'Automobile', 0, 1, 'Automobile.jpg', 1, 1),
(101, 'Restaurants', 3, 1, 'Restaurants.jpg', 1, 1),
(102, 'Alcoholic Beverages', 3, 1, 'Alcoholic_beverages.jpg', 1, 1),
(103, 'Non Alcoholic', 3, 1, 'non_Alcoholic.jpg', 1, 1),
(104, 'Buffets', 3, 1, 'ZSK_7639.jpg', 1, 1),
(105, 'Vegetarian', 3, 1, '20141001115732-vege.jpg', 1, 1),
(106, 'Pizza', 3, 1, 'images2.jpg', 1, 1),
(107, 'Yoga & Pilates', 16, 1, 'yoga.jpg', 1, 1),
(108, 'Fitness Equipment & Gear', 16, 1, 'Body-Building-Fitness-equipment-suit-Sports-apparatus-Gym-equipment-Hand-font-b-Grip-b-font-Rope.jpg', 1, 1),
(109, 'Food, Diet & Vitamins', 16, 1, 'hangover-sporcu-icecegi.jpg', 1, 1),
(110, 'Clothing & Footwear', 16, 1, '2012-autumn-men-s-clothing-fashion-classic-single-breasted-casual-suit-coat.jpg', 1, 1),
(111, 'Fitness DvDs', 16, 1, '0.jpg', 1, 1),
(112, 'Cardio Equipment', 16, 1, 'CFE1.jpg242bb6f3-3d38-4999-ab99-03629190637cOriginal_.jpg', 1, 1),
(113, 'Cycling', 16, 1, 'cyclist.jpg', 1, 1),
(114, 'Golf & PGA Shop', 16, 1, '8400652708255.jpg', 1, 1),
(115, 'Team Sports', 16, 1, 'download.jpg', 1, 1),
(116, 'Outdoor Sports', 16, 1, 'images3.jpg', 1, 1),
(117, 'Fishing', 16, 1, 'CmOBLV4M.jpeg', 1, 1),
(118, 'Gyms & Gym Accessories', 16, 1, 'joshs-compact-home-gym.jpg', 1, 1),
(119, 'NewTestCategory', 1, 1, 'canadian_tire.jpg', 1, 1),
(120, 'Lifestyle & Home Centre', 20, 1, 'This_is_the_logo_of_the_Lifestyle_Stores.jpg', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

DROP TABLE IF EXISTS `city`;
CREATE TABLE IF NOT EXISTS `city` (
  `city_id` int(5) NOT NULL,
  `city_name` varchar(50) NOT NULL,
  `country` varchar(255) NOT NULL,
  `latitude` varchar(10) NOT NULL,
  `longitude` varchar(10) NOT NULL,
  `state` varchar(50) NOT NULL,
  PRIMARY KEY (`city_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `city_name`, `country`, `latitude`, `longitude`, `state`) VALUES
(1, 'Toronto', 'Canada', '', '', ' Ontario'),
(2, 'Montréal', 'Canada', '', '', ' Quebec'),
(3, 'Vancouver', 'Canada', '', '', ' British Columbia'),
(4, 'Calgary', 'Canada', '', '', ' Alberta'),
(5, 'Edmonton', 'Canada', '', '', ' Alberta'),
(6, 'Ottawaâ€“Gatineau', 'Canada', '', '', ' Ontario/Quebec'),
(7, 'Quebec City', 'Canada', '', '', ' Quebec'),
(8, 'Winnipeg', 'Canada', '', '', ' Manitoba'),
(9, 'Hamilton', 'Canada', '', '', ' Ontario'),
(10, 'Kitchener', 'Canada', '', '', ' Ontario'),
(11, 'London', 'Canada', '', '', ' Ontario'),
(12, 'Victoria', 'Canada', '', '', ' British Columbia'),
(13, 'St. Catharinesâ€“Niagara', 'Canada', '', '', ' Ontario'),
(14, 'Halifax', 'Canada', '', '', ' Nova Scotia'),
(15, 'Oshawa', 'Canada', '', '', ' Ontario'),
(16, 'Windsor', 'Canada', '', '', ' Ontario'),
(17, 'Saskatoon', 'Canada', '', '', ' Saskatchewan'),
(18, 'Regina', 'Canada', '', '', ' Saskatchewan'),
(19, 'Barrie', 'Canada', '', '', ' Ontario'),
(20, 'St. John''s', 'Canada', '', '', ' Newfoundland and Labrador'),
(21, 'Abbotsford', 'Canada', '', '', ' British Columbia'),
(22, 'Kelowna', 'Canada', '', '', ' British Columbia'),
(23, 'Sherbrooke', 'Canada', '', '', ' Quebec'),
(24, 'Trois-RiviÃ¨res', 'Canada', '', '', ' Quebec'),
(25, 'Guelph', 'Canada', '', '', ' Ontario'),
(26, 'Kingston', 'Canada', '', '', ' Ontario'),
(27, 'Moncton', 'Canada', '', '', ' New Brunswick'),
(28, 'Sudbury', 'Canada', '', '', ' Ontario'),
(29, 'Chicoutimi-JonquiÃ¨re', 'Canada', '', '', ' Quebec'),
(30, 'Thunder Bay', 'Canada', '', '', ' Ontario'),
(31, 'Kanata', 'Canada', '', '', ' Ontario'),
(32, 'Saint John', 'Canada', '', '', ' New Brunswick'),
(33, 'Brantford', 'Canada', '', '', ' Ontario'),
(34, 'Red Deer', 'Canada', '', '', ' Alberta'),
(35, 'Nanaimo', 'Canada', '', '', ' British Columbia'),
(36, 'Lethbridge', 'Canada', '', '', ' Alberta'),
(37, 'Saint-Jean-sur-Richelieu', 'Canada', '', '', ' Quebec'),
(38, 'White Rock', 'Canada', '', '', ' British Columbia'),
(39, 'Peterborough', 'Canada', '', '', ' Ontario'),
(40, 'Sarnia', 'Canada', '', '', ' Ontario'),
(41, 'Milton', 'Canada', '', '', ' Ontario'),
(42, 'Kamloops', 'Canada', '', '', ' British Columbia'),
(43, 'ChÃ¢teauguay', 'Canada', '', '', ' Quebec'),
(44, 'Sault Ste. Marie', 'Canada', '', '', ' Ontario'),
(45, 'Chilliwack', 'Canada', '', '', ' British Columbia'),
(46, 'Drummondville', 'Canada', '', '', ' Quebec'),
(47, 'Saint-JÃ©rÃ´me', 'Canada', '', '', ' Quebec'),
(48, 'Medicine Hat', 'Canada', '', '', ' Alberta'),
(49, 'Prince George', 'Canada', '', '', ' British Columbia'),
(50, 'Belleville', 'Canada', '', '', ' Ontario'),
(51, 'Fredericton', 'Canada', '', '', ' New Brunswick'),
(52, 'Fort McMurray', 'Canada', '', '', ' Alberta'),
(53, 'Granby', 'Canada', '', '', ' Quebec'),
(54, 'Grande Prairie', 'Canada', '', '', ' Alberta'),
(55, 'North Bay', 'Canada', '', '', ' Ontario'),
(56, 'Beloeil', 'Canada', '', '', ' Quebec'),
(57, 'Cornwall', 'Canada', '', '', ' Ontario'),
(58, 'Saint-Hyacinthe', 'Canada', '', '', ' Quebec'),
(59, 'Shawinigan', 'Canada', '', '', ' Quebec'),
(60, 'Brandon', 'Canada', '', '', ' Manitoba'),
(61, 'Vernon', 'Canada', '', '', ' British Columbia'),
(62, 'Chatham', 'Canada', '', '', ' Ontario'),
(63, 'Bowmanville/Newcastle', 'Canada', '', '', ' Ontario'),
(64, 'Joliette', 'Canada', '', '', ' Quebec'),
(65, 'Charlottetown', 'Canada', '', '', ' Prince Edward Island'),
(66, 'Airdrie', 'Canada', '', '', ' Alberta'),
(67, 'Victoriaville', 'Canada', '', '', ' Quebec'),
(68, 'St. Thomas', 'Canada', '', '', ' Ontario'),
(69, 'Courtenay', 'Canada', '', '', ' British Columbia'),
(70, 'Georgetown', 'Canada', '', '', ' Ontario'),
(71, 'Salaberry-de-Valleyfield', 'Canada', '', '', ' Quebec'),
(72, 'Rimouski', 'Canada', '', '', ' Quebec'),
(73, 'Woodstock', 'Canada', '', '', ' Ontario'),
(74, 'Sorel-Tracy', 'Canada', '', '', ' Quebec'),
(75, 'Penticton', 'Canada', '', '', ' British Columbia'),
(76, 'Prince Albert', 'Canada', '', '', ' Saskatchewan'),
(77, 'Campbell River', 'Canada', '', '', ' British Columbia'),
(78, 'Moose Jaw', 'Canada', '', '', ' Saskatchewan'),
(79, 'Cape Breton-Sydney', 'Canada', '', '', ' Nova Scotia'),
(80, 'Midland', 'Canada', '', '', ' Ontario'),
(81, 'Leamington', 'Canada', '', '', ' Ontario'),
(82, 'Stratford', 'Canada', '', '', ' Ontario'),
(83, 'Orangeville', 'Canada', '', '', ' Ontario'),
(84, 'Timmins', 'Canada', '', '', ' Ontario'),
(85, 'Orillia', 'Canada', '', '', ' Ontario'),
(86, 'Walnut Grove', 'Canada', '', '', ' British Columbia'),
(87, 'Spruce Grove', 'Canada', '', '', ' Alberta'),
(88, 'Lloydminster', 'Canada', '', '', ' Alberta/Saskatchewan'),
(89, 'Alma', 'Canada', '', '', ' Quebec'),
(90, 'Bolton', 'Canada', '', '', ' Ontario'),
(91, 'Saint-Georges', 'Canada', '', '', ' Quebec'),
(92, 'Keswick-Elmhurst Beach', 'Canada', '', '', ' Ontario'),
(93, 'Stouffville', 'Canada', '', '', ' Ontario'),
(94, 'Okotoks', 'Canada', '', '', ' Alberta'),
(95, 'Duncan', 'Canada', '', '', ' British Columbia'),
(96, 'Parksville', 'Canada', '', '', ' British Columbia'),
(97, 'Leduc', 'Canada', '', '', ' Alberta'),
(98, 'Val-d''Or', 'Canada', '', '', ' Quebec'),
(99, 'Rouyn-Noranda', 'Canada', '', '', ' Quebec'),
(100, 'Buckingham', 'Canada', '', '', ' Quebec'),
(101, 'New York City', 'USA', '', '', ''),
(102, 'Los Angeles', 'USA', '', '', ''),
(103, 'Chicago', 'USA', '', '', ''),
(104, 'Houston', 'USA', '', '', ''),
(105, 'Phoenix', 'USA', '', '', 'Arizona'),
(106, 'Philadelphia', 'USA', '', '', ''),
(107, 'San Diego', 'USA', '', '', ''),
(108, 'San Antonio', 'USA', '', '', ''),
(109, 'Dallas', 'USA', '', '', ''),
(110, 'San Jose', 'USA', '', '', 'California'),
(111, 'San Francisco', 'USA', '', '', ''),
(112, 'Indianapolis', 'USA', '', '', ''),
(113, 'Austin', 'USA', '', '', 'Texas'),
(114, 'Columbus', 'USA', '', '', 'Ohio'),
(115, 'Detroit', 'USA', '', '', ''),
(116, 'Fort Worth', 'USA', '', '', 'Texas'),
(117, 'Charlotte', 'USA', '', '', 'North Carolina'),
(118, 'Memphis', 'USA', '', '', 'Tennessee'),
(119, 'Baltimore', 'USA', '', '', ''),
(120, 'El Paso', 'USA', '', '', 'Texas'),
(121, 'Boston', 'USA', '', '', ''),
(122, 'Milwaukee', 'USA', '', '', ''),
(123, 'Denver', 'USA', '', '', ''),
(124, 'Seattle', 'USA', '', '', ''),
(125, 'Nashville', 'USA', '', '', 'Tennessee'),
(126, 'Washington', 'USA', '', '', 'D.C.'),
(127, 'Las Vegas', 'USA', '', '', 'Nevada'),
(128, 'Portland', 'USA', '', '', 'Oregon'),
(129, 'Louisville', 'USA', '', '', 'Kentucky'),
(130, 'Oklahoma City', 'USA', '', '', ''),
(131, 'Tucson', 'USA', '', '', 'Arizona'),
(132, 'Atlanta', 'USA', '', '', ''),
(133, 'Albuquerque', 'USA', '', '', 'New Mexico'),
(134, 'Fresno', 'USA', '', '', 'California'),
(135, 'Sacramento', 'USA', '', '', 'California'),
(136, 'Long Beach', 'USA', '', '', 'California'),
(137, 'Mesa', 'USA', '', '', 'Arizona'),
(138, 'Kansas City', 'USA', '', '', 'Missouri'),
(139, 'Omaha', 'USA', '', '', 'Nebraska'),
(140, 'Cleveland', 'USA', '', '', 'Ohio'),
(141, 'Virginia Beach', 'USA', '', '', 'Virginia'),
(142, 'Miami', 'USA', '', '', ''),
(143, 'Oakland', 'USA', '', '', 'California'),
(144, 'Raleigh', 'USA', '', '', 'North Carolina'),
(145, 'Minneapolis', 'USA', '', '', ''),
(146, 'Tulsa', 'USA', '', '', 'Oklahoma'),
(147, 'Colorado Springs', 'USA', '', '', 'Colorado'),
(148, 'Honolulu', 'USA', '', '', ''),
(149, 'Arlington', 'USA', '', '', 'Texas'),
(150, 'Wichita', 'USA', '', '', 'Kansas'),
(151, 'St. Louis', 'USA', '', '', 'Missouri'),
(152, 'Tampa', 'USA', '', '', 'Florida'),
(153, 'Santa Ana', 'USA', '', '', 'California'),
(154, 'Anaheim', 'USA', '', '', 'California'),
(155, 'Cincinnati', 'USA', '', '', ''),
(156, 'Bakersfield', 'USA', '', '', 'California'),
(157, 'Aurora', 'USA', '', '', 'Colorado'),
(158, 'New Orleans', 'USA', '', '', ''),
(159, 'Pittsburgh', 'USA', '', '', ''),
(160, 'Riverside', 'USA', '', '', 'California'),
(161, 'Toledo', 'USA', '', '', 'Ohio'),
(162, 'Stockton', 'USA', '', '', 'California'),
(163, 'Corpus Christi', 'USA', '', '', 'Texas'),
(164, 'Lexington', 'USA', '', '', 'Kentucky'),
(165, 'St. Paul', 'USA', '', '', 'Minnesota'),
(166, 'Anchorage', 'USA', '', '', 'Alaska'),
(167, 'Newark', 'USA', '', '', 'New Jersey'),
(168, 'Buffalo', 'USA', '', '', 'New York'),
(169, 'Plano', 'USA', '', '', 'Texas'),
(170, 'Henderson', 'USA', '', '', 'Nevada'),
(171, 'Lincoln', 'USA', '', '', 'Nebraska'),
(172, 'Fort Wayne', 'USA', '', '', 'Indiana'),
(173, 'Glendale', 'USA', '', '', 'Arizona'),
(174, 'Greensboro', 'USA', '', '', 'North Carolina'),
(175, 'Chandler', 'USA', '', '', 'Arizona'),
(176, 'St. Petersburg', 'USA', '', '', 'Florida'),
(177, 'Jersey City', 'USA', '', '', 'New Jersey'),
(178, 'Scottsdale', 'USA', '', '', 'Arizona'),
(179, 'Norfolk', 'USA', '', '', 'Virginia'),
(180, 'Madison', 'USA', '', '', 'Wisconsin'),
(181, 'Orlando', 'USA', '', '', 'Florida'),
(182, 'Birmingham', 'USA', '', '', 'Alabama'),
(183, 'Baton Rouge', 'USA', '', '', 'Louisiana'),
(184, 'Jacksonville', 'USA', '', '', 'Florida'),
(185, 'Laredo', 'USA', '', '', 'Texas'),
(186, 'Lubbock', 'USA', '', '', 'Texas'),
(187, 'Chesapeake', 'USA', '', '', 'Virginia'),
(188, 'Chula Vista', 'USA', '', '', 'California'),
(189, 'Garland', 'USA', '', '', 'Texas'),
(190, 'Winston-Salem', 'USA', '', '', 'North Carolina'),
(191, 'North Las Vegas', 'USA', '', '', 'Nevada'),
(192, 'Reno', 'USA', '', '', 'Nevada'),
(193, 'Gilbert', 'USA', '', '', 'Arizona'),
(194, 'Hialeah', 'USA', '', '', 'Florida'),
(195, 'Arlington', 'USA', '', '', 'Virginia'),
(196, 'Akron', 'USA', '', '', 'Ohio'),
(197, 'Irvine', 'USA', '', '', 'California'),
(198, 'Rochester', 'USA', '', '', 'New York'),
(199, 'Boise', 'USA', '', '', 'Idaho'),
(200, 'Modesto', 'USA', '', '', 'California'),
(201, 'Fremont', 'USA', '', '', 'California'),
(202, 'Montgomery', 'USA', '', '', 'Alabama'),
(203, 'Spokane', 'USA', '', '', 'Washington'),
(204, 'Richmond', 'USA', '', '', 'Virginia'),
(205, 'Yonkers', 'USA', '', '', 'New York'),
(206, 'Irving', 'USA', '', '', 'Texas'),
(207, 'Shreveport', 'USA', '', '', 'Louisiana'),
(208, 'San Bernardino', 'USA', '', '', 'California'),
(209, 'Tacoma', 'USA', '', '', 'Washington'),
(210, 'Glendale', 'USA', '', '', 'California'),
(211, 'Des Moines', 'USA', '', '', 'Iowa'),
(212, 'Augusta', 'USA', '', '', 'Georgia'),
(213, 'Grand Rapids', 'USA', '', '', 'Michigan'),
(214, 'Huntington Beach', 'USA', '', '', 'California'),
(215, 'Mobile', 'USA', '', '', 'Alabama'),
(216, 'Moreno Valley', 'USA', '', '', 'California'),
(217, 'Little Rock', 'USA', '', '', 'Arkansas'),
(218, 'Portland', 'USA', '', '', 'Maine'),
(219, 'Columbus', 'USA', '', '', 'Georgia'),
(220, 'Oxnard', 'USA', '', '', 'California'),
(221, 'Fontana', 'USA', '', '', 'California'),
(222, 'Knoxville', 'USA', '', '', 'Tennessee'),
(223, 'Fort Lauderdale', 'USA', '', '', 'Florida'),
(224, 'Salt Lake City', 'USA', '', '', ''),
(225, 'Newport News', 'USA', '', '', 'Virginia'),
(226, 'Huntsville', 'USA', '', '', 'Alabama'),
(227, 'Tempe', 'USA', '', '', 'Arizona'),
(228, 'Brownsville', 'USA', '', '', 'Texas'),
(229, 'Worcester', 'USA', '', '', 'Massachusetts'),
(230, 'Fayetteville', 'USA', '', '', 'North Carolina'),
(231, 'Jackson', 'USA', '', '', 'Mississippi'),
(232, 'Tallahassee', 'USA', '', '', 'Florida'),
(233, 'Aurora', 'USA', '', '', 'Illinois'),
(234, 'Ontario', 'USA', '', '', 'California'),
(235, 'Providence', 'USA', '', '', 'Rhode Island'),
(236, 'Lewiston', 'USA', '', '', 'Maine'),
(237, 'Rancho Cucamonga', 'USA', '', '', 'California'),
(238, 'Chattanooga', 'USA', '', '', 'Tennessee'),
(239, 'Oceanside', 'USA', '', '', 'California'),
(240, 'Santa Clarita', 'USA', '', '', 'California'),
(241, 'Bangor', 'USA', '', '', 'Maine'),
(242, 'Vancouver', 'USA', '', '', 'Washington'),
(243, 'Grand Prairie', 'USA', '', '', 'Texas'),
(244, 'Peoria', 'USA', '', '', 'Arizona'),
(245, 'Rockford', 'USA', '', '', 'Illinois'),
(246, 'Cape Coral', 'USA', '', '', 'Florida'),
(247, 'Springfield', 'USA', '', '', 'Missouri'),
(248, 'Santa Rosa', 'USA', '', '', 'California'),
(249, 'Sioux Falls', 'USA', '', '', 'South Dakota'),
(250, 'Port St. Lucie', 'USA', '', '', 'Florida'),
(251, 'Dayton', 'USA', '', '', 'Ohio'),
(252, 'Salem', 'USA', '', '', 'Oregon'),
(253, 'Brunswick', 'USA', '', '', 'Maine'),
(254, 'Springfield', 'USA', '', '', 'Massachusetts'),
(255, 'Eugene', 'USA', '', '', 'Oregon'),
(256, 'Corona', 'USA', '', '', 'California'),
(257, 'Pasadena', 'USA', '', '', 'Texas'),
(258, 'Joliet', 'USA', '', '', 'Illinois'),
(259, 'Pembroke Pines', 'USA', '', '', 'Florida'),
(260, 'Paterson', 'USA', '', '', 'New Jersey'),
(261, 'Hampton', 'USA', '', '', 'Virginia'),
(262, 'Lancaster', 'USA', '', '', 'California'),
(263, 'Alexandria', 'USA', '', '', 'Virginia'),
(264, 'Salinas', 'USA', '', '', 'California'),
(265, 'Palmdale', 'USA', '', '', 'California'),
(266, 'Naperville', 'USA', '', '', 'Illinois'),
(267, 'Pasadena', 'USA', '', '', 'California'),
(268, 'Kansas City', 'USA', '', '', 'Kansas'),
(269, 'Hayward', 'USA', '', '', 'California'),
(270, 'Hollywood', 'USA', '', '', 'Florida'),
(271, 'Lakewood', 'USA', '', '', 'Colorado'),
(272, 'Torrance', 'USA', '', '', 'California'),
(273, 'Syracuse', 'USA', '', '', 'New York'),
(274, 'Escondido', 'USA', '', '', 'California'),
(275, 'Fort Collins', 'USA', '', '', 'Colorado'),
(276, 'Bridgeport', 'USA', '', '', 'Connecticut'),
(277, 'Orange', 'USA', '', '', 'California'),
(278, 'Warren', 'USA', '', '', 'Michigan'),
(279, 'Elk Grove', 'USA', '', '', 'California'),
(280, 'Savannah', 'USA', '', '', 'Georgia'),
(281, 'Mesquite', 'USA', '', '', 'Texas'),
(282, 'Sunnyvale', 'USA', '', '', 'California'),
(283, 'Fullerton', 'USA', '', '', 'California'),
(284, 'McAllen', 'USA', '', '', 'Texas'),
(285, 'Cary', 'USA', '', '', 'North Carolina'),
(286, 'Cedar Rapids', 'USA', '', '', 'Iowa'),
(287, 'Sterling Heights', 'USA', '', '', 'Michigan'),
(288, 'Columbia', 'USA', '', '', 'South Carolina'),
(289, 'Coral Springs', 'USA', '', '', 'Florida'),
(290, 'Carrollton', 'USA', '', '', 'Texas'),
(291, 'Elizabeth', 'USA', '', '', 'New Jersey'),
(292, 'Hartford', 'USA', '', '', 'Connecticut'),
(293, 'Waco', 'USA', '', '', 'Texas'),
(294, 'Bellevue', 'USA', '', '', 'Washington'),
(295, 'New Haven', 'USA', '', '', 'Connecticut'),
(296, 'West Valley City', 'USA', '', '', 'Utah'),
(297, 'Topeka', 'USA', '', '', 'Kansas'),
(298, 'Thousand Oaks', 'USA', '', '', 'California'),
(299, 'El Monte', 'USA', '', '', 'California'),
(300, 'McKinney', 'USA', '', '', 'Texas'),
(301, 'Concord', 'USA', '', '', 'California'),
(302, 'Visalia', 'USA', '', '', 'California'),
(303, 'Simi Valley', 'USA', '', '', 'California'),
(304, 'Olathe', 'USA', '', '', 'Kansas'),
(305, 'Clarksville', 'USA', '', '', 'Tennessee'),
(306, 'Denton', 'USA', '', '', 'Texas'),
(307, 'Stamford', 'USA', '', '', 'Connecticut'),
(308, 'Provo', 'USA', '', '', 'Utah'),
(309, 'Springfield', 'USA', '', '', 'Illinois'),
(310, 'Killeen', 'USA', '', '', 'Texas'),
(311, 'Abilene', 'USA', '', '', 'Texas'),
(312, 'Evansville', 'USA', '', '', 'Indiana'),
(313, 'Gainesville', 'USA', '', '', 'Florida'),
(314, 'Vallejo', 'USA', '', '', 'California'),
(315, 'Ann Arbor', 'USA', '', '', 'Michigan'),
(316, 'Peoria', 'USA', '', '', 'Illinois'),
(317, 'Lansing', 'USA', '', '', 'Michigan'),
(318, 'Lafayette', 'USA', '', '', 'Louisiana'),
(319, 'Thornton', 'USA', '', '', 'Colorado'),
(320, 'Athens', 'USA', '', '', 'Georgia'),
(321, 'Flint', 'USA', '', '', 'Michigan'),
(322, 'Inglewood', 'USA', '', '', 'California'),
(323, 'Roseville', 'USA', '', '', 'California'),
(324, 'Charleston', 'USA', '', '', 'South Carolina'),
(325, 'Beaumont', 'USA', '', '', 'Texas'),
(326, 'Independence', 'USA', '', '', 'Missouri'),
(327, 'Victorville', 'USA', '', '', 'California'),
(328, 'Santa Clara', 'USA', '', '', 'California'),
(329, 'Costa Mesa', 'USA', '', '', 'California'),
(330, 'Miami Gardens', 'USA', '', '', 'Florida'),
(331, 'Manchester', 'USA', '', '', 'New Hampshire'),
(332, 'Miramar', 'USA', '', '', 'Florida'),
(333, 'Downey', 'USA', '', '', 'California'),
(334, 'Arvada', 'USA', '', '', 'Colorado'),
(335, 'Allentown', 'USA', '', '', 'Pennsylvania'),
(336, 'Westminster', 'USA', '', '', 'Colorado'),
(337, 'Waterbury', 'USA', '', '', 'Connecticut'),
(338, 'Norman', 'USA', '', '', 'Oklahoma'),
(339, 'Midland', 'USA', '', '', 'Texas'),
(340, 'Elgin', 'USA', '', '', 'Illinois'),
(341, 'West Covina', 'USA', '', '', 'California'),
(342, 'Clearwater', 'USA', '', '', 'Florida'),
(343, 'Cambridge', 'USA', '', '', 'Massachusetts'),
(344, 'Fargo', 'USA', '', '', 'North Dakota'),
(345, 'West Jordan', 'USA', '', '', 'Utah'),
(346, 'Round Rock', 'USA', '', '', 'Texas'),
(347, 'Billings', 'USA', '', '', 'Montana'),
(348, 'Erie', 'USA', '', '', 'Pennsylvania'),
(349, 'South Bend', 'USA', '', '', 'Indiana'),
(350, 'San Buenaventura (Ventura)', 'USA', '', '', 'California'),
(351, 'Fairfield', 'USA', '', '', 'California'),
(352, 'Lowell', 'USA', '', '', 'Massachusetts'),
(353, 'Norwalk', 'USA', '', '', 'California'),
(354, 'Burbank', 'USA', '', '', 'California'),
(355, 'Richmond', 'USA', '', '', 'California'),
(356, 'Pompano Beach', 'USA', '', '', 'Florida'),
(357, 'High Point', 'USA', '', '', 'North Carolina'),
(358, 'Murfreesboro', 'USA', '', '', 'Tennessee'),
(359, 'Lewisville', 'USA', '', '', 'Texas'),
(360, 'Richardson', 'USA', '', '', 'Texas'),
(361, 'Daly City', 'USA', '', '', 'California'),
(362, 'Berkeley', 'USA', '', '', 'California'),
(363, 'Gresham', 'USA', '', '', 'Oregon'),
(364, 'Wichita Falls', 'USA', '', '', 'Texas'),
(365, 'Green Bay', 'USA', '', '', 'Wisconsin'),
(366, 'Davenport', 'USA', '', '', 'Iowa'),
(367, 'Palm Bay', 'USA', '', '', 'Florida'),
(368, 'Columbia', 'USA', '', '', 'Missouri'),
(369, 'Portsmouth', 'USA', '', '', 'Virginia'),
(370, 'Rochester', 'USA', '', '', 'Minnesota'),
(371, 'Antioch', 'USA', '', '', 'California'),
(372, 'Wilmington', 'USA', '', '', 'North Carolina');

-- --------------------------------------------------------

--
-- Table structure for table `deals`
--

DROP TABLE IF EXISTS `deals`;
CREATE TABLE IF NOT EXISTS `deals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_type` int(11) NOT NULL COMMENT '1=products,2=deals,3=coupons',
  `product_name` varchar(255) NOT NULL,
  `deal_site_url` text NOT NULL,
  `coupon_stock` int(11) NOT NULL DEFAULT '0',
  `shop_id` int(11) NOT NULL,
  `merchant_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `banner` varchar(255) NOT NULL,
  `deal_text` text NOT NULL,
  `deal_terms` text NOT NULL,
  `coupon_price` int(11) NOT NULL,
  `description` text NOT NULL,
  `short_description` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `deal_type` int(11) NOT NULL DEFAULT '1' COMMENT '1=normal,2=special,3=super special',
  `display_order` int(11) NOT NULL DEFAULT '1',
  `valid_from` date NOT NULL,
  `valid_till` date NOT NULL,
  `no_clicks` int(11) NOT NULL,
  `is_deleted` tinyint(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=61 ;

--
-- Dumping data for table `deals`
--

INSERT INTO `deals` (`id`, `item_type`, `product_name`, `deal_site_url`, `coupon_stock`, `shop_id`, `merchant_id`, `brand_id`, `category_id`, `logo`, `banner`, `deal_text`, `deal_terms`, `coupon_price`, `description`, `short_description`, `status`, `deal_type`, `display_order`, `valid_from`, `valid_till`, `no_clicks`, `is_deleted`) VALUES
(1, 2, 'Chilli Pizza', 'https://www.pizzahut.ca', 0, 1, 14, 2, 8, 'thumb_images5.jpg', 'p1.jpg', '40 % Off', '', 40, '<p>Catering Available,Free Delivery</p>', '', 1, 2, 1, '2015-03-30', '2020-05-29', 223, 1),
(2, 2, 'Spa', 'http://theraj.com/', 0, 3, 14, 4, 35, 'thumb_logo2.png', '5.jpg', '40 % Off', 'No terms', 123, '<p>HEALTH SPA RESORT MEDSPA WITH HOLISTIC &amp; NATURAL MAHARISHI AYURVEDA TREATMENTS AND MASSAGES - BETTER THAN A MEDICAL SPA</p>', '', 1, 2, 1, '2015-03-30', '2020-05-29', 115, 1),
(3, 3, 'Mauritius Trip', '', 17, 4, 14, 1, 22, 'thumb_collette_logo_197x59.png', 'images11.jpg', '20% LESS', 'Discover the magic and wonder of the “White Continent” aboard Hurtigruten’s MS Fram.', 256, '<p>Discover the magic and wonder of the &ldquo;White Continent&rdquo; aboard Hurtigruten&rsquo;s MS Fram.</p>', '', 1, 1, 1, '2015-03-30', '2020-05-29', 60, 1),
(4, 3, 'LakeMe Lipstick', '', 20, 5, 14, 5, 17, 'thumb_Capture1.JPG', 'Matte-Lipstick.jpg', '30% OFF', 'Buy lakme lip color, lipsticks, lip liner', 5, '<p>At Lakm&eacute; we share the same philosophy as professionals from around the world: a commitment to hair health, beauty and care.</p>', '', 1, 1, 1, '2015-03-31', '2020-05-29', 35, 1),
(5, 3, 'Top Garments', '', 20, 6, 14, 6, 26, 'thumb_Capture3.JPG', 'Screen-shot-2011-09-22-at-11.23_.20-AM_.png', '25% Offer', 'Friend and Family 25% off.', 80, '<p>Over 1000 Exclusives, Over 100 Designer</p>', '', 1, 1, 1, '2015-03-31', '2020-05-29', 58, 1),
(6, 3, 'Moroccanoil Body Line', '', 20, 2, 14, 4, 26, 'thumb_logo_BODYline.png', 'moroccanoil-body.jpg', '15% off', 'The key to our success is in offering every client a unique personalized service at the one-stop Bodyline Outlets.', 30, '<p>The key to our success is in offering every client a unique personalized service at the one-stop Bodyline Outlets.</p>', '', 1, 1, 1, '2015-03-25', '2020-05-29', 23, 1),
(7, 3, 'Australia Trip', '', 20, 4, 14, 1, 4, 'thumb_HHR_logo_masterbrand_color_rgb_FP.jpg', 'HPV_AVANCE-03_HRES_02_300dpi_HR-2.jpg', '30% off', 'Hilton Worldwide To Open First Hilton Hotels & Resorts ', 200, '<p>Hilton Worldwide To Open First Hilton Hotels &amp; Resorts</p>', '', 1, 1, 1, '2015-04-01', '2020-05-29', 15, 1),
(8, 3, 'Sony Home Theatre with WiFi', '', 20, 7, 14, 7, 62, 'thumb_sony_logo_sprite1.png', 'pSNYNA-BDVN8100W_main_enh.jpg', '30% off', 'Premium 3D Blue-Ray Home Theatre with WiFi', 500, '<p>Premium 3D Blue-Ray Home Theatre with WiFi</p>', '', 1, 1, 1, '2015-03-31', '2020-05-29', 18, 1),
(9, 3, 'Sofa Set', '', 19, 8, 14, 9, 48, 'thumb_download1.png', 'home-decorating-after-1-modern-colonial-home-decor-henderson1821-x-1230-651-kb-jpeg-x.jpg', '15% off', 'Home decorating doesn''t have to be expensive', 1200, '<p><span style="color: rgb(68, 68, 68); font-family: myriad-pro, ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">Home decorating doesn&#39;t have to be expensive</span></p>', '', 1, 1, 1, '2015-03-31', '2020-05-29', 26, 1),
(10, 3, 'Chicken Bucket', '', 20, 9, 14, 8, 46, 'thumb_Capture5.JPG', '31.jpg', '50% off', 'Chicken Snacker. A delicious chunk of chicken served in a soft sesame bun, with salad and Thousand Island sauce.', 12, '<p><span class="st"><em>Chicken</em> Snacker. A delicious chunk of <em>chicken</em> served in a soft sesame bun, with salad and Thousand Island sauce.</span></p>', '', 1, 1, 1, '2015-03-31', '2020-05-29', 31, 1),
(11, 1, 'Laptop', '', 0, 7, 14, 7, 63, 'thumb_images6.jpg', 'sony-laptop-7f.jpg', '15% off', ' Laptop Accessories - MINIMUM 50% OFF', 1000, '<p><span class="st">Explore latest <em>Sony Laptops</em> like <em>Notebook</em>, Gaming <em>Laptops</em> &amp; more.</span></p>', '', 1, 1, 1, '2015-03-31', '2020-05-29', 25, 1),
(12, 1, 'Perfume', '', 0, 5, 14, 10, 15, 'thumb_download_(1)1.png', 'Playboy-Fragrance-beautybrite3.jpg', '12% Off', 'Fragrance', 40, '<p>Fragrance</p>', '', 1, 1, 1, '2015-03-30', '2020-05-29', 24, 1),
(13, 1, 'Dress', '', 0, 7, 14, 3, 26, 'thumb_Levis_logo.svg_.png', 'img_3284_tokyo_harajuku_jingu_mae_meiji_dori_mise_-_fashion_clothing_store_on_meiji_dori_harajuku_jingumae.jpg', '45% off', 'Shop from our entire line of Levi''s clothes for men, women, juniors, kids, and babies.', 20, '<p><span class="st">Shop from our entire line of <em>Levi&#39;s</em> clothes for men, women, juniors, kids, and babies.</span></p>', '', 1, 1, 1, '2015-04-01', '2020-05-29', 68, 1),
(14, 1, 'LIPSTICK', '', 0, 7, 14, 5, 17, 'thumb_Lakme-logo.jpg', 'Lakme-Lipstick-Rose-Kissed.jpg', '10% Off', 'Lakme Cosmetics', 12, '<p><span style="color: rgb(0, 0, 0); font-family: arial, sans-serif-light, sans-serif; font-size: 30px; line-height: 37.2000007629395px;">Lakme Cosmetics</span></p>', '', 1, 1, 1, '2015-03-30', '2020-05-29', 26, 1),
(15, 1, 'LED Television', '', 0, 7, 14, 7, 64, 'thumb_post-42-1082985948.gif', 'images_(2).jpg', '15% off', 'SLIM', 200, '<p>SLIM</p>', '', 1, 1, 1, '2015-03-31', '2020-05-29', 35, 1),
(16, 1, 'Cold Drinks', '', 0, 7, 14, 11, 12, 'thumb_cool-dawn-recovery-drink-790887031.jpg', '42281-hi-drinks.jpg', '2% Off', 'Cool', 15, '<p>Cool</p>', '', 1, 1, 1, '2015-03-31', '2020-05-29', 25, 1),
(17, 4, 'Lakme Cosmetics', '', 0, 5, 14, 5, 17, '', 'lakme.jpg', '5% off', 'No Terms.', 5, '<p>Remove all 6 fairness blocks</p>', '', 1, 1, 1, '2015-04-06', '2020-05-29', 25, 1),
(18, 4, 'Perfumes', '', 0, 5, 14, 10, 15, '', 'Wz68awrLE01707201400_princess.jpeg', '10% off', 'Limited Offer', 10, '<p>Limited Offer</p>', '', 1, 1, 1, '2015-04-06', '2020-05-29', 14, 1),
(19, 4, 'Gillette Razors', '', 0, 7, 14, 17, 20, '', 'Proglide_Main_Image_Large._V175139880__.jpg', '30% off', 'World Shave', 8, '<p>World Shave</p>', '', 1, 1, 1, '2015-04-06', '2020-05-29', 15, 1),
(20, 4, 'Turkey', '', 0, 7, 14, 18, 7, 'thumb_superfreshh.jpg', 'maxresdefault.jpg', '30% Off', '30% Off on this Easter', 0, '<p>Super Fresh is a chain of supermarkets owned by A&amp;P, which introduced the brand in 1982, converting its Mid-Atlantic region stores to the new name.Super Fresh&#39;s 22 stores are mostly in the Philadelphia, Pennsylvania area, plus Delaware, southern New Jersey, and Ocean City, MD. Several Super Fresh stores operated in the Baton Rouge, Louisiana area into 2003, when they were rebranded to A&amp;P&#39;s Sav-A-Center banner. One Super Fresh in Philadelphia also had been rebranded to A&amp;P&#39;s Food Basics banner. Super Fresh also operated in Canada; its stores have been rebranded as Food Basics.</p>\n\n<p>&nbsp;</p>', '', 1, 1, 1, '2015-04-07', '2020-05-29', 19, 1),
(21, 4, 'Vegetables', '', -1, 10, 14, 18, 65, 'thumb_images3.png', 'Products.jpg', '10% Off', '', 1, '<p>Best DEal</p>', '', 1, 1, 1, '2015-04-06', '2020-05-29', 15, 1),
(22, 4, 'Dry Vitamins', '', 0, 7, 14, 19, 16, '', 'swanson_3.jpg', '15% off', 'Save up to 15% off limited offer', 16, '<p>Save up to 15% off limited offer</p>', '', 1, 1, 1, '2015-04-06', '2020-05-29', 15, 1),
(23, 4, 'Wheat', '', 0, 10, 14, 18, 0, 'thumb_superfreshh1.jpg', 'sacks_of_wheat_grains_sjpg39076.jpg', '10% Off', '', 0, '<p>Privately held supermarket discount chain, based in San Bernardino, California, consisting of 167 stores located throughout Southern California. Founded in Yucaipa, California in 1936 by Cleo and Leo Stater (with help from younger brother Lavoy), it consisted of 166 stores as of October, 2013. It entered the Fortune 500 for the first time in 2005 at #493,[ the first notable Inland Empire-based company to do so</p>', '', 1, 1, 1, '2015-04-07', '2020-05-29', 12, 1),
(24, 3, 'Pizza Hut', '', 66, 1, 14, 2, 8, 'thumb_Pizza_Hut_Logo.png', 'pizzahutcoupon.jpg', '$3', '', 0, '<p>Get It Delivered to your Room</p>', '', 1, 1, 1, '2015-04-06', '2020-05-29', 11, 1),
(25, 3, 'Treadmills', '', 20, 2, 14, 4, 16, 'thumb_logo_BODYline1.png', 'tb2-00_View010009.jpge2984783-36b3-485e-b49e-5da7ac8006bfOriginal_.jpg', '25% off', 'No Terms', 150, '<p>No Terms</p>', '', 1, 1, 1, '2015-04-06', '2020-05-29', 5, 1),
(26, 3, 'Roasted Chicken', '', 20, 9, 14, 8, 7, 'thumb_KFC_Logo.png', 'roast-chicken-009.jpg', '18% off', 'Mediterranean Roasted Chicken', 5, '<p><span class="irc_su" dir="ltr" style="text-align: left;">Mediterranean Roasted Chicken</span></p>', '', 1, 1, 1, '2015-04-06', '2020-05-29', 5, 1),
(27, 3, 'Sony Xperia', '', 25, 7, 14, 7, 23, 'thumb_1384834243000-sony-logo.jpg', 'M1-Mobile-Sony-Xperia-S-772x1280.jpg', '25% Off', '', 350, '<p>Best Coupon Deal</p>', '', 1, 1, 1, '2015-04-06', '2020-05-29', 5, 1),
(28, 3, 'Clothing for men and women', '', 40, 6, 14, 3, 20, 'thumb_Levi_s-logo-630D37C0FD-seeklogo.com_.gif', 'fashion-bigg-fashion.jpg', '22% off', 'Our range of clothing for men and women is available in more than 110 countries.', 15, '<p><span class="st">Our range of <em>clothing</em> for men and women is available in more than 110 countries.</span></p>', '', 1, 1, 1, '2015-04-06', '2020-05-29', 3, 1),
(29, 3, 'Holiday Savings', '', 56, 8, 14, 9, 20, 'thumb_photo.jpg.png', '23691-m2527scoupon20off.jpg', '20% Off', '', 1200, '<p>Best Offer</p>', '', 1, 1, 1, '2015-04-06', '2020-05-29', 6, 1),
(30, 3, 'Cocktails ', '', 30, 9, 14, 8, 3, 'thumb_1393719.1_.high_.jpg', 'drink45-hurricane-and-barcardi-splash.jpg', '5% off', 'Sometimes the cocktail may include both hot, cold drinks and even frozen drinks. Hot cocktails are also popular options for a New Year''s Eve party.', 4, '<p><span class="irc_su" dir="ltr" style="text-align: left;">Sometimes the cocktail may include both hot, cold drinks and even frozen drinks. Hot cocktails are also popular options for a New Year&#39;s Eve party.</span></p>', '', 1, 1, 1, '2015-04-06', '2020-05-29', 6, 1),
(31, 3, 'Cosmetics', '', 40, 11, 14, 5, 14, '', 'tom_box_subscription_box_for_that_time_of_the_month_3.jpg', '11% off', 'My overall thoughts on this box is that it is super fun! I love the idea of getting something fun, candy, jewelry and makeup to lift your mood during THAT ...', 14, '<p><span class="irc_su" dir="ltr" style="text-align: left;">My overall thoughts on this box is that it is super fun! I love the idea of getting something fun, candy, jewelry and makeup to lift your mood during THAT ...</span></p>', '', 1, 1, 1, '2015-04-06', '2020-05-29', 9, 1),
(32, 3, 'Pizza ', '', 1, 1, 14, 2, 56, 'thumb_Pizza_Hut3.png', '3441_LargeSpecial.png', '5% Off', 'Get an offer 5% Off', 0, '<p>Get an offer 5% Off</p>', '', 1, 1, 1, '2015-04-07', '2020-05-29', 8, 1),
(33, 1, 'Sony Xperia Z3', '', 0, 7, 14, 7, 23, '', 'Sony-Xperia-Z3.jpg', '40 % Off', 'Deal Terms', 200, '<p><span style="font-size: small; font-weight: bold; color: rgb(106, 106, 106); font-family: arial, sans-serif; line-height: 18.2000007629395px;">Sony Xperia Z3</span><span style="font-size: small; color: rgb(84, 84, 84); font-family: arial, sans-serif; line-height: 18.2000007629395px;">&nbsp;Android smartphone. Announced 2014, September. Features 3G, 5.2&Prime; IPS LCD capacitive touchscreen, 20.7 MP camera, Wi-Fi, GPS,</span></p>', '', 1, 1, 1, '2015-04-10', '2020-05-29', 7, 1),
(34, 1, 'Lakme Cream', '', 0, 5, 9, 5, 14, '', 'Lakme-Perfect-Radiance.jpg', '15% Off', '', 350, '<p>&nbsp;</p>\n\n<p>Lakme Cream...</p>', '', 1, 1, 1, '2015-05-08', '2019-09-19', 2, 1),
(35, 4, 'Almond Hair Oil', '', 0, 7, 14, 20, 68, '', '389793.jpeg', '20% Off', '', 12, '<p>Almond Hair Oil</p>', '', 1, 1, 1, '2015-05-08', '2019-09-19', 14, 1),
(36, 1, 'Pepsodent', '', 0, 7, 14, 18, 90, '', '3970Pepsodent_center_fresh.jpg', '20% Off', '', 12, '<p>Pepsodent</p>', '', 1, 1, 1, '2015-05-13', '2019-09-19', 4, 1),
(37, 2, 'Kesh King Hair Oil', 'http://www.keshking.com/', 0, 7, 14, 20, 90, '', '1966866_505078056268685_1571156274_n.jpg', '20% Off', '', 12, '<p><span class="st"><em>Kesh King</em> Ayurvedic Medicinal <em>Oil</em> is an Ayurvedic Patented <em>Hair</em> medicinal preparation without side effects. <em>Kesh King</em> is a complete Ayurvedic formula, which is&nbsp;...</span></p>', '', 1, 1, 1, '2015-05-14', '2019-05-14', 11, 1),
(38, 3, 'Pizza', '', 30, 9, 14, 2, 3, 'thumb_f6cae502-e0e8-4c76-8962-b02c3734f9b8.png', 'CBggYymUcAAc03u.jpg', '50% off', 'Pizza is an oven-baked flat bread generally topped with tomato sauce and cheese. It is commonly supplemented with a selection of meats, vegetables and condiments.', 5, '<p><span style="color: rgb(34, 34, 34); font-family: arial, sans-serif; line-height: 16.1200008392334px;">Pizza is an oven-baked flat bread generally topped with tomato sauce and cheese. It is commonly supplemented with a selection of meats, vegetables and condiments.</span></p>', '', 1, 1, 1, '2015-05-15', '2016-09-30', 2, 1),
(39, 3, 'Buffets', '', 40, 11, 14, 18, 3, 'thumb_543px-Whole_Foods_Market_logo.svg_.png', 'Breakfast_For_Dinner.jpg', '30% off', 'Are you hungry for better? When it comes to what we put in and on our bodies, Whole Foods Market believes the full story of those products is important', 20, '<p><span style="color: rgb(84, 84, 84); font-family: arial, sans-serif; font-size: small; line-height: 18.2000007629395px;">Are you hungry for better? When it comes to what we put in and on our bodies,&nbsp;</span><span style="font-weight: bold; color: rgb(106, 106, 106); font-family: arial, sans-serif; font-size: small; line-height: 18.2000007629395px;">Whole Foods</span><span style="color: rgb(84, 84, 84); font-family: arial, sans-serif; font-size: small; line-height: 18.2000007629395px;">&nbsp;Market&nbsp;believes the full story of those products is important</span></p>', '', 1, 1, 1, '2015-05-15', '2016-08-26', 2, 1),
(40, 3, 'Vegetable', '', 25, 10, 14, 18, 3, 'thumb_543px-Whole_Foods_Market_logo.svg_1.png', 'Correlation-artificial-fruits-and-vegetables-fake-fruit-foam-fruit-artificial-fruit-props.jpg', '20% off', 'In everyday usage, a vegetable is any part of a plant that is consumed by humans as food as part of a savoury course or meal.', 12, '<p><span style="color: rgb(84, 84, 84); font-family: arial, sans-serif; font-size: small; line-height: 18.2000007629395px;">In everyday usage, a&nbsp;</span><span style="font-weight: bold; color: rgb(106, 106, 106); font-family: arial, sans-serif; font-size: small; line-height: 18.2000007629395px;">vegetable</span><span style="color: rgb(84, 84, 84); font-family: arial, sans-serif; font-size: small; line-height: 18.2000007629395px;">&nbsp;is any part of a plant that is consumed by humans as food as part of a savoury course or meal.</span></p>', '', 1, 1, 1, '2015-05-13', '2016-08-27', 1, 1),
(41, 2, 'Wild Stone Body Spray', 'http://www.mcnroe.com/', 0, 5, 14, 10, 14, 'thumb_4a19714b-b877-4ac0-b19f-d9dc34d24581.jpg', 'Wild-Stone-Wild-Stone-THUNDER-Body-Deodorant-150ml-19486f05-f037-4024-9094-224e82150781-jpg-5167e1f0-65ed-4e3b-a481-81c0c6d2b6a8.jpg', '30% off', ' Buy Wild Stone RED Deodorant, 150ml online at low price', 5, '<p><span style="color: rgb(84, 84, 84); font-family: arial, sans-serif; font-size: small; line-height: 18.2000007629395px;">&nbsp;Buy&nbsp;</span><span style="font-weight: bold; color: rgb(106, 106, 106); font-family: arial, sans-serif; font-size: small; line-height: 18.2000007629395px;">Wild Stone</span><span style="color: rgb(84, 84, 84); font-family: arial, sans-serif; font-size: small; line-height: 18.2000007629395px;">&nbsp;RED Deodorant, 150ml online at low price</span></p>', '', 1, 1, 1, '2015-05-27', '2017-07-14', 3, 1),
(42, 3, 'Face Wash', '', 25, 7, 14, 5, 14, 'thumb_thumb.jpg', 'Lakme-Perfect-Radiance-Serum.png', '15% off', 'Wash away all visible dirt and impurities with Lakme Clean-up Fresh Fairness Face Wash.', 8, '<p><span style="font-weight: bold; color: rgb(106, 106, 106); font-family: arial, sans-serif; font-size: small; line-height: 18.2000007629395px;">Lakme</span><span style="color: rgb(84, 84, 84); font-family: arial, sans-serif; font-size: small; line-height: 18.2000007629395px;">&nbsp;Clean-up Fresh Fairness&nbsp;</span><span style="font-weight: bold; color: rgb(106, 106, 106); font-family: arial, sans-serif; font-size: small; line-height: 18.2000007629395px;">Face Wash</span></p>', '', 1, 1, 1, '2015-05-26', '2017-02-02', 6, 1),
(43, 2, 'Dry Food', 'https://www.shopforfresh.com/', 0, 11, 14, 18, 66, 'thumb_Whole-Foods-Logo-12.jpg', 'How-to-Save-Money-doing-Groceries.jpg', '40% off', 'Amazing offer save upto 40% to Save Money doing Groceries', 25, '<p><span style="color: rgb(136, 136, 136); font-family: arial, sans-serif; line-height: 16px; background-color: rgb(241, 241, 241);">How to Save Money doing Groceries</span></p>', '', 1, 1, 1, '2015-05-28', '2016-09-15', 4, 1),
(44, 2, 'Body Lotion', 'http://www.lakme.com/', 0, 3, 14, 5, 107, 'thumb_thumb1.jpg', 'Lakme-Lakme-Fruit-Moisture-Peach-Milk-Moisturizer-120-ml-Pack-of-02-Bottles-each-120-ml-Free-Lakme-Face-Wash-02-Bottles-17590935-8b0113eb-3c42-486e-8fa4-a6abebc960f4-jpg.jpg', '50% off', 'Lakme - Lakme Fruit Moisture Peach Milk Moisturizer 120 ml Pack of 02 Bottles each 120', 10, '<p>Lakme - Lakme Fruit Moisture Peach Milk Moisturizer 120 ml Pack of 02 Bottles each 120</p>', '', 1, 1, 1, '2015-05-26', '2016-08-12', 1, 1),
(45, 3, 'Hand Grip', '', 30, 3, 14, 4, 108, 'thumb_Bodyline-Logo1.png', 'hand-gripper.jpg', '20% off', 'Body Line is a well reputable importer of top quality heavy duty fitness equipment for the home and commercial markets.', 13, '<p><span style="font-weight: bold; color: rgb(106, 106, 106); font-family: arial, sans-serif; font-size: small; line-height: 18.2000007629395px;">Body Line</span><span style="color: rgb(84, 84, 84); font-family: arial, sans-serif; font-size: small; line-height: 18.2000007629395px;">&nbsp;is a well reputable importer of top quality heavy duty fitness equipment for the home and commercial markets.</span></p>', '', 1, 1, 1, '2015-05-26', '2017-02-07', 4, 1),
(46, 2, 'Dinner Set', 'http://www.target.com/', 0, 7, 14, 9, 66, 'thumb_yspbhPj.jpg', 'Quality-56-dinnerware-font-b-sets-b-font-Chinese-font-b-bowls-b-font-ceramic-font.jpg', '33% off', 'See offer details page for full details of all deals. some restrictions apply.', 26, '<p>See offer details page for full details of all deals. some restrictions apply.</p>', '', 1, 1, 1, '2015-05-26', '2017-07-06', 2, 1),
(47, 3, 'Meat', '', 30, 11, 14, 18, 71, 'thumb_Whole-Foods-Logo-121.jpg', 'maso.jpg', '20% off', 'Pieces of raw chicken meat', 7, '<p>Pieces of raw chicken meat</p>', '', 1, 1, 1, '2015-05-26', '2017-07-06', 3, 1),
(48, 3, 'Body Massage Oil', '', 30, 5, 14, 20, 16, 'thumb_2rek22w.jpg', 'using-essential-oils-in-massage-therapy_wm.jpg', '45% off', 'Bajaj Common Oils Used in Massage Therapy Men And Women', 5, '<p>Bajaj Common Oils Used in Massage Therapy Men And Women</p>', '', 1, 1, 1, '2015-05-26', '2017-04-07', 2, 1),
(49, 2, 'Health Drink', 'http://www.target.com/', 0, 11, 14, 9, 16, 'thumb_yspbhPj1.jpg', 'vitamin-DW-Wirtschaft-NEWYORK.jpg', '15% off', 'A reputable electrolyte health drink should contain a proper balance of electrolytes, water and carbohydrates in simple sugar form.', 6, '<p>A reputable electrolyte health drink should contain a proper balance of electrolytes, water and carbohydrates in simple sugar form.</p>', '', 1, 1, 1, '2015-05-26', '2017-03-10', 2, 1),
(50, 3, 'Mackup Kits', '', 30, 5, 14, 5, 14, 'thumb_thumb2.jpg', 'productos_light_love_1.jpg', '16% off', '78 Colour Eyeshadow Eye Shadow Palette Makeup Kit Set Make Up Box with Mirror', 22, '<p>78 Colour Eyeshadow Eye Shadow Palette Makeup Kit Set Make Up Box with Mirror</p>', '', 1, 1, 1, '2015-05-26', '2017-05-05', 2, 1),
(51, 2, 'Fitness DvDs', 'http://www.sony.com/', 0, 7, 14, 7, 16, 'thumb_sony_og_img.jpg', 'a4c1eb186368e729d8d0a54a10005eb7.jpg', '10% off', '5 of the best fitness DVDs you need to take home now', 8, '<p>5 of the best fitness DVDs you need to take home now</p>', '', 1, 1, 1, '2015-05-27', '2017-03-09', 2, 1),
(52, 3, 'Diet Food Vitamins', '', 30, 11, 14, 18, 16, '', 'an.jpg', '22% off', 'Fruits and vegetables are loaded with vitamins,minerals, and antioxidants runners need to go through training. Lots of color is good for you!', 7, '<p>Fruits and vegetables are loaded with vitamins,minerals, and antioxidants runners need to go through training. Lots of color is good for you!</p>', '', 1, 1, 1, '2015-05-25', '2016-11-04', 1, 1),
(53, 2, 'Fitness Equipment', 'http://bodylinefitness.net/', 0, 7, 14, 4, 16, 'thumb_Bodyline-Logo2.png', 'east-bay-fitness-equipment-store.jpg', '44% off', 'Finest Quality fitness equipment', 55, '<p>Finest Quality fitness equipment</p>', '', 1, 1, 1, '2015-05-26', '2017-06-16', 4, 1),
(54, 2, 'Gym Clothing', 'http://us.levi.com/home/', 0, 8, 14, 3, 16, 'thumb_Levi_s-logo-630D37C0FD-seeklogo.com_1.gif', 'Whats-in-my-bag-Theresa-Hanson.jpg', '29% off', 'We asked our experts what essential items they keep in their gym bags for the ultimate workout. This week, Fitness Expert Theresa Hanson gives advice', 15, '<p>We asked our experts what essential items they keep in their gym bags for the ultimate workout. This week, Fitness Expert Theresa Hanson gives advice</p>', '', 1, 1, 1, '2015-05-26', '2017-05-13', 4, 1),
(55, 2, 'Vegetable', 'http://www.target.com/', 0, 11, 14, 9, 66, 'thumb_yspbhPj2.jpg', 'Box-of-organic-vegetables-001.jpg', '5% off', ' Less price on organic vegetables', 3, '<p>&nbsp;Less price on organic vegetables</p>', '', 1, 1, 1, '2015-05-26', '2017-08-05', 9, 1),
(56, 3, 'Baby Food', '', 26, 7, 14, 19, 66, 'thumb_Capture6.JPG', 'Baby_food_section_at_Best_Price.jpg', '18% off', 'Market aisle stocked with commercial baby food', 16, '<p>Market aisle stocked with commercial baby food</p>', '', 1, 1, 1, '2015-05-26', '2017-06-03', 7, 1),
(57, 3, 'Kitchen Accessories', '', 30, 7, 14, 9, 66, 'thumb_yspbhPj3.jpg', 'download_(1).jpg', '23% off', 'Best price on Kitchen Accessories', 26, '<p>Best price on Kitchen Accessories</p>', '', 1, 1, 1, '2015-05-26', '2017-05-11', 6, 1),
(58, 3, 'Snacks Food', '', 25, 11, 14, 18, 66, 'thumb_Whole-Foods-Logo-122.jpg', 'img_good.jpg0aa438ba-7ab5-44b6-90d0-0c71883876e4Original_.jpg', '7% off', 'Sometimes it can be hard to think of snacks for kids, especially when you''re in a hurry! Here''s a great list of snacks that all involve fruit or vegetables ...', 6, '<p>Sometimes it can be hard to think of snacks for kids, especially when you&#39;re in a hurry! Here&#39;s a great list of snacks that all involve fruit or vegetables ...</p>', '', 1, 1, 1, '2015-05-26', '2017-08-17', 9, 1),
(59, 1, 'PLAYBOY VIP', '', 0, 5, 14, 10, 15, 'thumb_PlayboyLogo.svg_.png', 'playboy_vip.jpg', '25% Off', 'No Terms', 18, '<p>Retail company Lifestyle is launching its first store in Kolkata at Quest Mall on Saturday. The store is spread across four floors and 60,000 sq. ft.</p>', '', 1, 1, 1, '2015-06-17', '2015-11-12', 1, 1),
(60, 3, 'Gillette Sensitive Skin Shave Foam', '', 100, 7, 14, 17, 91, '', 'PG-615B_1z.jpg', '10% off', 'No terms', 13, '<p>Gillette Foamy Regular Shave foam is designed to give men a smooth, comfortable shave and rinses away clean to reveal skin that&#39;s soft to the touch.</p>\n\n<p>&nbsp;</p>', '', 1, 1, 1, '2015-06-17', '2015-12-26', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `deal_images`
--

DROP TABLE IF EXISTS `deal_images`;
CREATE TABLE IF NOT EXISTS `deal_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deal_id` int(11) NOT NULL,
  `deal_image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `deal_images`
--

INSERT INTO `deal_images` (`id`, `deal_id`, `deal_image`, `status`) VALUES
(1, 1, 'p2.jpg', 1),
(2, 1, 'p4.jpg', 1),
(3, 2, '3.jpg', 1),
(4, 2, '4.jpg', 1),
(5, 2, '1.jpg', 1),
(6, 3, 'blue_ocean-dsc00251-1080p.jpg', 1),
(7, 3, 'a.baa-Dream-house-on-the-beach_.jpg', 1),
(8, 3, 'images.jpg', 1),
(9, 11, 'ffshsf.jpg', 1),
(10, 11, 'sony-vaio-laptops-2.jpg', 1),
(11, 11, 'Capture1.JPG', 1),
(14, 12, '10249283393_df98d2e08f_o.jpg', 1),
(15, 12, 'Playboy-VIP-Him-Bling-hd.jpg', 1),
(16, 12, 'Picture_704.jpg', 1),
(20, 14, '356-bullet.jpg', 1),
(21, 14, 'images1.jpg', 1),
(22, 15, 'images_(1).jpg', 1),
(23, 16, '7-up-campaign-10f.jpg', 1),
(24, 16, 'cocktails-drinks-20150121204603-54c0100be2a7b.jpg', 1),
(25, 16, 'hurricane.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `manage_coupons`
--

DROP TABLE IF EXISTS `manage_coupons`;
CREATE TABLE IF NOT EXISTS `manage_coupons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deal_id` int(11) NOT NULL COMMENT '3=coupons',
  `user_id` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `manage_coupons`
--

INSERT INTO `manage_coupons` (`id`, `deal_id`, `user_id`, `is_deleted`) VALUES
(1, 9, 48, 1),
(2, 3, 74, 1),
(3, 3, 74, 1),
(4, 21, 74, 1),
(5, 3, 87, 1);

-- --------------------------------------------------------

--
-- Table structure for table `merchant`
--

DROP TABLE IF EXISTS `merchant`;
CREATE TABLE IF NOT EXISTS `merchant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` int(11) NOT NULL,
  `zone` int(11) NOT NULL,
  `comp_name` varchar(255) NOT NULL,
  `contact_telephone` varchar(255) NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `contact_no` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(20) NOT NULL,
  `facebook_login_id` varchar(255) NOT NULL,
  `google_login_id` varchar(255) NOT NULL,
  `twitter_login_id` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `profile_image` varchar(500) NOT NULL,
  `type` varchar(50) NOT NULL,
  `is_deleted` tinyint(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `merchant`
--

INSERT INTO `merchant` (`id`, `first_name`, `last_name`, `email_id`, `password`, `address`, `city`, `zone`, `comp_name`, `contact_telephone`, `contact_email`, `contact_no`, `dob`, `gender`, `facebook_login_id`, `google_login_id`, `twitter_login_id`, `status`, `profile_image`, `type`, `is_deleted`) VALUES
(14, 'Stanley', '', 'stanley@sales.com', '0f569b4cf5eb2687b6dbde10e19d2421', '', 25, 0, '', '', '', '', '2014-08-11', 'male', '', '', '', 1, '', 'admin', 1),
(23, 'Mary', 'manson', 'doublezero7@hotmail.com', '437cfea42a39c6b3ec2f4f2ee5d7ebb2', '155 dorval avenue', 109, 0, '', '', '', 'maritess', '0000-00-00', '', '', '', '', 1, '', 'merchant', 1),
(30, 'stan', 'lee', 'stan007lee@yahoo.com', 'e483f05d9cf0dc2a943a883c9dd3e479', 'addressesssssssssssssssssssssssssss', 233, 0, '', '', '', '4455544545445', '2015-05-27', 'male', '', '', '', 1, '10922681_10153117757730992_1076677814367125609_n.jpg', 'merchant', 1),
(32, 'shib', 'Maji', 'shibnis@gmail.com', 'd40faa1ed4bbc042221dc582a6f4305f', 'Kolkata, Jadavpur', 66, 0, 'ABC PVT LTD', '03323232323', 'shibu20sxc@gmail.com', '0334585235', '0000-00-00', '', '', '', '', 1, '', 'merchant', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_title` varchar(255) NOT NULL,
  `slug` varchar(50) NOT NULL,
  `page_content` text NOT NULL,
  `status` tinyint(2) NOT NULL,
  `is_deleted` tinyint(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `page_title`, `slug`, `page_content`, `status`, `is_deleted`) VALUES
(1, 'About Us', 'about_us', '<div class="common_page_wrap">\r\n<h2>About Us</h2>\r\n\r\n<div>\r\n<h3>Simply do good.</h3>\r\n<img alt="About Us" class="img-responsive" src="./../../images/icons/about_us.jpg" /> That&rsquo;s the phrase we have up on our wall here at Goodsearch. Why? Well, because doing good can be simple. And a simple act, combined with those of the millions of other people on Goodsearch, can make a big difference in the world -- it can feed a child, help find a cure, plant a tree, create a home for a stray dog, and do so much more. Helping a cause you care about and making the world a better place can be something you do every day -- not only when you have time to volunteer or extra money to donate. This is what Goodsearch is all about. We give you the ability to turn your everyday actions into simple ways to support and raise funds for your favorite cause.\r\n<h3>Join the movement!</h3>\r\nGoodsearch started as an idea&hellip;and now it has turned into a movement. More than 15 million people used Goodsearch last year to support more than 100,000 non-profits and schools. Since 2006, Goodsearch users have raised more than $9 million, participated in over 1.1 billion charitable actions, and have truly made a difference.\r\n\r\n<h3>How has the money been used</h3>\r\nOrganizations have used the money raised from Goodsearch to do everything from supporting cancer research, to buying books for a local library, to helping find homes for stray dogs, to cleaning up local rivers. The National Inclusion Project, for example, which helps children with disabilities, has used the money its supporters have raised through Goodsearch to send more than 400 kids to summer camp.\r\n\r\n<h3>So, how can I simply do good</h3>\r\nIt&rsquo;s easy. Just pick a cause you care about &ndash; we work with large national organizations like The American Cancer Society and The Nature Conservancy, to local ones like high schools and animal shelters (if your cause isn&#39;t listed, you can add it here. Then, as you go about your daily activities, you&rsquo;ll be raising money for that cause &ndash; at no cost to you! You can watch the dollars add up right here on the site. And, as you share your actions with your friends, you can inspire them to also make a difference every single day.\r\n\r\n<div class="clearfix">&nbsp;</div>\r\n</div>\r\n\r\n<div class="clearfix">&nbsp;</div>\r\n</div>', 1, 1),
(3, 'Contact US', 'contact', '<div class="contact_wrap">\n                <h2>Contact Us</h2>\n                \n                \n                    \n					<p>To get in touch, please fill out the form below and we''ll get back to you as soon as possible. For tech support, please email us at support@mightydeals.com. For partnerships, please contact info@mightydeals.com We reply to all inquiries within one business day. Thank you.</p>\n                    \n                    <h3>Official Address</h3>\n                   <div class="col-lg-12 address"> \n                    <p>25/369, Lake Gardens</p>\n                    <p>Kolkata:- 700045</p>\n                    <p>Phone : 355-5566-2368</p>\n                    <p>Email : info@sww.com</p>\n                    \n                   </div>\n                    <div class="clearfix"></div>\n                \n                	<!--<div class="col-lg-12">-->\n                    	<!--<form class="form-horizontal">\n                      <div class="form-group">\n                        <label class="col-sm-2 control-label">Name</label>\n                        <div class="col-sm-10">\n                          <input type="text" class="form-control" id="" placeholder="">\n                        </div>\n                      </div>\n                      <div class="form-group">\n                        <label class="col-sm-2 control-label">Email</label>\n                        <div class="col-sm-10">\n                          <input type="text" class="form-control" id="" placeholder="">\n                        </div>\n                      </div>\n                      <div class="form-group">\n                        <label class="col-sm-2 control-label">Subject</label>\n                        <div class="col-sm-10">\n                          <input type="text" class="form-control" id="" placeholder="">\n                        </div>\n                      </div>\n                      <div class="form-group">\n                        <label class="col-sm-2 control-label">Message</label>\n                        <div class="col-sm-10">\n                          <textarea class="form-control" rows="5"></textarea>\n                        </div>\n                      </div>\n                      \n                      <div class="form-group">\n                        <div class="col-sm-offset-2 col-sm-10">\n                          <button type="submit" class="btn btn-default">Sign in</button>\n                        </div>\n                      </div>\n                    </form>-->\n                    <!--</div>-->\n                      \n                    \n                <div class="clearfix"></div>\n            </div>', 1, 1),
(4, 'How It Works', 'howitworks', '<div class="work_wrap">\n                <h2>How it Works</h2>\n                <p>\n                 We think it''s important you understand the strengths and limitations of the site. We''re a journalistic website and aim to provide the best MoneySaving guides, tips, tools and techniques, but can''t guarantee to be perfect, so do note you use the information at your own risk and we can''t accept liability if things go wrong.\n                </p>\n                \n                <ul>\n                 <li>\n                     This info does not constitute financial advice, always do your own research on top to ensure it''s right for your specific circumstances and remember we focus on rates not service.\n                    </li>\n                    <li>\n                     We often link to other websites, but we can''t be responsible for their content.\n                    </li>\n                    <li>\n                     We don''t as a general policy investigate the solvency of companies mentioned (how likely they are to go bust), but there is a risk any company can struggle and it''s rarely made public until it''s too late (see the section 75 guide for protection tips). \n                    </li>\n                    <li>\n                     Always remember anyone can post on the MSE forums, so it can be very different from our opinion.\n                    </li>\n                </ul>\n                \n                <p>\n                 MoneySavingExpert.com is part of the MoneySupermarket Group, but is entirely editorially independent. Its stance of putting consumers first is protected and enshrined in the legally-binding MSE Editorial Code. \n                </p>\n                <p>\n                 Please read the Full Terms & Conditions, Privacy Policy, Cookies Q&A, How this site is financed and MSE''s Editorial Code.\n                </p>\n                \n                <div class="clearfix"></div>\n            </div>', 1, 1),
(5, 'FQ & A', 'frequently_question_answer', '<div class="common_page_wrap">\r\n                <h2>FAQ''s</h2>\r\n                \r\n                <div>\r\n                	<h3>Can’t I find these deals anywhere on the Web?</h3>\r\n                \r\n                    \r\n					Not a chance! The incredible deals you see here are exclusive to MightyDeals.com. We work with some of the best companies out there to negotiate the lowest possible prices around.\r\n                \r\n                <h3>Can I get a refund?</h3>   \r\n                    \r\n					Certainly. We take pride in the products we promote, but should you have any problems with a product or deal purchased through MightyDeals.com, we offer a 100% money back guarantee. If you’re not satisfied for any reason, please contact us so that we can quickly resolve your issue. \r\n                \r\n				<h3>Do I need to subscribe to your newsletter to purchase a deal?</h3>   \r\n                    \r\n					No, but we do recommend signing up so that you don’t miss out on any of our exclusive deals. Most of our deals are available for a limited time only, so stay up to date by subscribing to our newsletter. You’ll be alerted as soon as a new deal is posted.  \r\n                \r\n                <h3>How do I actually get my purchase?</h3>   \r\n                    \r\n					The majority of our deals will be delivered immediately after purchase. In most cases, you’ll instantly receive file downloads, coupon codes or serial numbers. In a few cases, your purchase will be emailed to you in less than 24 hours after completing your transaction.   \r\n                    \r\n                    <div class="clearfix"></div>\r\n                </div>\r\n                <div class="clearfix"></div>\r\n            </div>', 1, 1),
(6, 'Career', 'career', '<div class="common_page_wrap">\n<h2>Career</h2>\n\n<div>\n<h3>PHP Engineer</h3>\n<img alt="Career" class="img-responsive" src="./../../images/icons/career.jpg" /> That&rsquo;s the phrase we have up on our wall here at Goodsearch. Why? Well, because doing good can be simple. And a simple act, combined with those of the millions of other people on Goodsearch, can make a big difference in the world -- it can feed a child, help find a cure, plant a tree, create a home for a stray dog, and do so much more. Helping a cause you care about and making the world a better place can be something you do every day -- not only when you have time to volunteer or extra money to donate. This is what Goodsearch is all about. We give you the ability to turn your everyday actions into simple ways to support and raise funds for your favorite cause.\n<h3>Product Manager</h3>\nGoodsearch started as an idea&hellip;and now it has turned into a movement. More than 15 million people used Goodsearch last year to support more than 100,000 non-profits and schools. Since 2006, Goodsearch users have raised more than $9 million, participated in over 1.1 billion charitable actions, and have truly made a difference.\n\n<h3>Inside Sales Executive</h3>\nOrganizations have used the money raised from Goodsearch to do everything from supporting cancer research, to buying books for a local library, to helping find homes for stray dogs, to cleaning up local rivers. The National Inclusion Project, for example, which helps children with disabilities, has used the money its supporters have raised through Goodsearch to send more than 400 kids to summer camp.\n\n<h3>Affiliate Marketing</h3>\nIt&rsquo;s easy. Just pick a cause you care about &ndash; we work with large national organizations like The American Cancer Society and The Nature Conservancy, to local ones like high schools and animal shelters (if your cause isn&#39;t listed, you can add it here. Then, as you go about your daily activities, you&rsquo;ll be raising money for that cause &ndash; at no cost to you! You can watch the dollars add up right here on the site. And, as you share your actions with your friends, you can inspire them to also make a difference every single day.\n\n<h3>Assistant Manager Brands</h3>\nThat&rsquo;s the phrase we have up on our wall here at Goodsearch. Why? Well, because doing good can be simple. And a simple act, combined with those of the millions of other people on Goodsearch, can make a big difference in the world -- it can feed a child, help find a cure, plant a tree, create a home for a stray dog, and do so much more. Helping a cause you care about and making the world a better place can be something you do every day -- not only when you have time to volunteer or extra money to donate. This is what Goodsearch is all about. We give you the ability to turn your everyday actions into simple ways to support and raise funds for your favorite cause.\n\n<h3>Client Relations Accounts</h3>\nGoodsearch started as an idea&hellip;and now it has turned into a movement. More than 15 million people used Goodsearch last year to support more than 100,000 non-profits and schools. Since 2006, Goodsearch users have raised more than $9 million, participated in over 1.1 billion charitable actions, and have truly made a difference.\n\n<h3>Content Writer Executive</h3>\nIt&rsquo;s easy. Just pick a cause you care about &ndash; we work with large national organizations like The American Cancer Society and The Nature Conservancy, to local ones like high schools and animal shelters (if your cause isn&#39;t listed, you can add it here. Then, as you go about your daily activities, you&rsquo;ll be raising money for that cause &ndash; at no cost to you! You can watch the dollars add up right here on the site. And, as you share your actions with your friends, you can inspire them to also make a difference every single day.\n\n<div class="clearfix">&nbsp;</div>\n</div>\n\n<div class="clearfix">&nbsp;</div>\n</div>', 1, 1),
(7, 'Coupon', 'coupon', '<div class="work_wrap">\n                <h2>Coupons</h2>\n                <p>\n                 We think it''s important you understand the strengths and limitations of the site. We''re a journalistic website and aim to provide the best MoneySaving guides, tips, tools and techniques, but can''t guarantee to be perfect, so do note you use the information at your own risk and we can''t accept liability if things go wrong.\n                </p>\n                \n                <ul>\n                 <li>\n                     This info does not constitute financial advice, always do your own research on top to ensure it''s right for your specific circumstances and remember we focus on rates not service.\n                    </li>\n                    <li>\n                     We often link to other websites, but we can''t be responsible for their content.\n                    </li>\n                    <li>\n                     We don''t as a general policy investigate the solvency of companies mentioned (how likely they are to go bust), but there is a risk any company can struggle and it''s rarely made public until it''s too late (see the section 75 guide for protection tips). \n                    </li>\n                    <li>\n                     Always remember anyone can post on the MSE forums, so it can be very different from our opinion.\n                    </li>\n                </ul>\n                \n                <p>\n                 MoneySavingExpert.com is part of the MoneySupermarket Group, but is entirely editorially independent. Its stance of putting consumers first is protected and enshrined in the legally-binding MSE Editorial Code. \n                </p>\n                <p>\n                 Please read the Full Terms & Conditions, Privacy Policy, Cookies Q&A, How this site is financed and MSE''s Editorial Code.\n                </p>\n                \n                <div class="clearfix"></div>\n            </div>', 1, 1),
(8, 'test page', 'abc', '<div class="work_wrap">&nbsp;\n<div class="clearfix">&nbsp;</div>\n</div>', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

DROP TABLE IF EXISTS `review`;
CREATE TABLE IF NOT EXISTS `review` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL COMMENT 'deal,product,coupons',
  `item_type` int(11) NOT NULL DEFAULT '1' COMMENT '1="deal,coupon,product",2="brand",3="shop"',
  `rate` varchar(100) NOT NULL,
  `review_title` varchar(255) NOT NULL,
  `review_description` text NOT NULL,
  `review_date` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `is_deleted` tinyint(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `user_id`, `item_id`, `item_type`, `rate`, `review_title`, `review_description`, `review_date`, `status`, `is_deleted`) VALUES
(1, 42, 0, 2, '0', '', '', '2015-04-04 23:14:26', 0, 1),
(2, 74, 1, 1, '0', 'f', 'f', '2015-04-27 00:40:19', 0, 0),
(3, 74, 1, 1, '4', 'd', 'd', '2015-04-29 23:26:49', 1, 0),
(4, 74, 1, 1, '5', 'dd', 'ddd', '2015-04-29 23:28:12', 1, 0),
(5, 74, 0, 2, '0', '', '', '2015-05-05 04:08:57', 0, 1),
(6, 74, 0, 2, '4', 'Test', 'This is good brand', '2015-06-16 23:40:22', 0, 1),
(7, 74, 2, 1, '4', 'Test', 'This is usefull', '2015-06-16 23:49:34', 1, 1),
(8, 87, 3, 1, '4', 'This is Test Review', 'This is great....', '2015-06-17 03:40:49', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `role_permission`
--

DROP TABLE IF EXISTS `role_permission`;
CREATE TABLE IF NOT EXISTS `role_permission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  `role_permission` tinyint(1) NOT NULL DEFAULT '0',
  `merchants_list` tinyint(1) NOT NULL DEFAULT '0',
  `user_list` tinyint(1) NOT NULL DEFAULT '0',
  `category_list` tinyint(1) NOT NULL DEFAULT '0',
  `category_add` tinyint(1) NOT NULL DEFAULT '0',
  `brand_list` tinyint(1) NOT NULL DEFAULT '0',
  `brand_add` tinyint(1) NOT NULL DEFAULT '0',
  `shop_list` tinyint(1) NOT NULL DEFAULT '0',
  `shop_add` tinyint(1) NOT NULL DEFAULT '0',
  `deal_list` tinyint(1) NOT NULL DEFAULT '0',
  `deal_post` tinyint(1) NOT NULL DEFAULT '0',
  `image_list` tinyint(1) NOT NULL DEFAULT '0',
  `manage_slider` tinyint(1) NOT NULL DEFAULT '0',
  `review_list` tinyint(1) NOT NULL DEFAULT '0',
  `advertisement_add` tinyint(1) NOT NULL DEFAULT '0',
  `advertisement_list` tinyint(1) NOT NULL DEFAULT '0',
  `page_add` tinyint(1) NOT NULL DEFAULT '0',
  `page_list` tinyint(1) NOT NULL DEFAULT '0',
  `subscription_mail` tinyint(1) NOT NULL DEFAULT '0',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `role_permission`
--

INSERT INTO `role_permission` (`id`, `type`, `role_permission`, `merchants_list`, `user_list`, `category_list`, `category_add`, `brand_list`, `brand_add`, `shop_list`, `shop_add`, `deal_list`, `deal_post`, `image_list`, `manage_slider`, `review_list`, `advertisement_add`, `advertisement_list`, `page_add`, `page_list`, `subscription_mail`, `is_deleted`) VALUES
(4, 'admin', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(6, 'merchant', 0, 0, 0, 1, 0, 1, 0, 1, 0, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1),
(7, 'admin1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1),
(8, 'favicon.ico', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

DROP TABLE IF EXISTS `shop`;
CREATE TABLE IF NOT EXISTS `shop` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shop_name` varchar(250) NOT NULL,
  `shop_img` varchar(255) NOT NULL,
  `shop_thumb` varchar(255) NOT NULL,
  `shop_logo` varchar(255) NOT NULL,
  `logo_thumb` varchar(255) NOT NULL,
  `shop_address` text NOT NULL,
  `shop_city` int(11) NOT NULL,
  `shop_zone` int(11) NOT NULL,
  `shop_mobile` varchar(150) NOT NULL,
  `shop_highlights` text NOT NULL,
  `shop_url` varchar(250) NOT NULL,
  `shop_location_map` text NOT NULL,
  `merchant_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `is_deleted` tinyint(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `shop`
--

INSERT INTO `shop` (`id`, `shop_name`, `shop_img`, `shop_thumb`, `shop_logo`, `logo_thumb`, `shop_address`, `shop_city`, `shop_zone`, `shop_mobile`, `shop_highlights`, `shop_url`, `shop_location_map`, `merchant_id`, `status`, `is_deleted`) VALUES
(1, 'Fishman Lobster Clubhouse', 'pizzahut_picture.jpg', 'thumb_pizzahut_picture.jpg', 'Pizza_Hut.png', 'thumb_Pizza_Hut.png', '802 Pharmacy Avenue, Scarborough,Vancouver,Canada', 3, 0, '8830001234', 'Pizza Hut is an American restaurant chain and international franchise, known for pizza and side dishes, it is now corporately known as Pizza Hut, Inc. and is a subsidiary of Yum! Brands, Inc., the world''s largest restaurant company.\n\nIn 2012, the company had more than 6,000 Pizza Hut restaurants in the United States, and had more than 5,139 store locations in 94 other countries and territories around the world.', 'https://www.pizzahut.ca/', '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3901.417516797775!2d-77.014596!3d-12.083543999999998!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c88095c6a82b%3A0xbb383be101f2d099!2sPizza+Hut!5e0!3m2!1sen!2sin!4v1427548832596" width="600" height="450" frameborder="0" style="border:0"></iframe>', 0, 1, 1),
(2, 'Body Line Fitness', 'mofit-zym.jpg', 'thumb_mofit-zym.jpg', '', '', '12852 S Saratoga Sunnyvale Rd,Saratoga, CA 95070,United States', 17, 0, '4088722030', 'Top Trainers in Saratoga Sunnyvale Road, Saratoga, CA 95070 Live Liberated Fitness, Kaizen Fitness, Performance Science Training Institute', 'http://www.yelp.com/search?cflt=healthtrainers&find_loc=Saratoga+Sunnyvale+Road%2C+Saratoga%2C+CA+95070', '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3174.5605882536192!2d-122.0323373!3d37.28184569999999!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808fb52eaa67aeeb%3A0xd058132cbfdeb242!2s12852+S+Saratoga+Sunnyvale+Rd%2C+Saratoga%2C+CA+95070%2C+USA!5e0!3m2!1sen!2sin!4v1427549097760" width="600" height="450" frameborder="0" style="border:0"></iframe>', 14, 1, 1),
(3, 'AUTHENTIC AYURVEDA HEALTH SPA', '5.jpg', 'thumb_5.jpg', 'logo2.png', 'thumb_logo2.png', 'USA Fitness Center & Spa, North Hills, CA.', 11, 0, '4088722030', '', 'http://theraj.com/', '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3298.7285841035987!2d-118.46825799999999!3d34.229948!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c290b99e22b065%3A0x70bc68d9a7db0051!2sUSA+Fitness+Center!5e0!3m2!1sen!2sin!4v1427698713479" width="600" height="450" frameborder="0" style="border:0"></iframe>', 0, 1, 1),
(4, 'GLOBAL CORPORATE HEADQUARTERS', '180s.jpg', 'thumb_180s.jpg', 'collette_logo_197x59.png', 'thumb_collette_logo_197x59.png', 'GLOBAL CORPORATE HEADQUARTERS,Collette ,162 Middle Street,Pawtucket, Rhode Island 02860', 96, 0, '8004685955', 'Welcome to Collette\nWe’ll show you why Guided Travel is the ONLY way to travel!', 'http://www.gocollette.com/', '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2970.3236573570425!2d-71.379341!3d41.885896!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89e45cb381ee5159%3A0x1b5987b53b21a9c9!2sCollette+Travel+Services!5e0!3m2!1sen!2sin!4v1427706923316" width="600" height="450" frameborder="0" style="border:0"></iframe>', 0, 1, 1),
(5, 'Beauty Mark', '180s1.jpg', 'thumb_180s1.jpg', 'Capture.JPG', 'thumb_Capture.JPG', '1268 Pacific Boulevard, Vancouver, BC CANADA, V6Z 2V1', 3, 0, '6046422294', 'FREE SHIPPING OVER $99 ALWAYS!', 'https://www.beautymark.ca/', '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d5206.205787898433!2d-123.12624390611268!3d49.27444749320644!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x548673d72f1c9ac3%3A0x30170cedcf342b5d!2s1268+Pacific+Blvd%2C+Vancouver%2C+BC+V6Z+2W3%2C+Canada!5e0!3m2!1sen!2sin!4v1427708516670" width="600" height="450" frameborder="0" style="border:0"></iframe>', 0, 1, 1),
(6, 'MONIKOVA', '10873376_755439237875262_4534232209435001708_o-1200x600.jpg', 'thumb_10873376_755439237875262_4534232209435001708_o-1200x600.jpg', 'Home_Page_Logo-300x135.jpg', 'thumb_Home_Page_Logo-300x135.jpg', '5970 Tecumseh Road East,\nWindsor, ON N8T 1E3\nCanada', 16, 0, '5198202668', 'MEET MONIKA OF MONIKOVA AT FRESH COLLECTIVE', 'http://monikova.ca', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d94442.74722531864!2d-83.002882!3d42.29269865!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x883b2b1e82604a21%3A0x7de8282092b2e5c8!2sSophie&#39;s+Gown+Shoppe!5e0!3m2!1sen!2sin!4v1427709103149" width="600" height="450" frameborder="0" style="border:0"></iframe>', 0, 1, 1),
(7, 'WALMART', 'Wal-mart-Taking-Hits-and-Plunging.jpg', 'thumb_Wal-mart-Taking-Hits-and-Plunging.jpg', 'Walmart.jpg', 'thumb_Walmart.jpg', '1940 Argentia Road,\nMississauga, ON L5N 1P9,\nCanada', 1, 0, '18003280402', 'SAVE MONEY.LIVE BETTER.', 'http://www.walmart.ca/', '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2889.2754058169985!2d-79.73774499999999!3d43.600806999999996!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4cb895a51bdc1259%3A0xa61917309f99433c!2sWalmart!5e0!3m2!1sen!2sin!4v1427709976840" width="600" height="450" frameborder="0" style="border:0"></iframe>', 0, 1, 1),
(8, 'LOWE''S', 'briers-2025-newly-renovated-furniture-showroom-vancouver-2013.jpg', 'thumb_briers-2025-newly-renovated-furniture-showroom-vancouver-2013.jpg', 'lowescalogo.png', 'thumb_lowescalogo.png', '5577 Hazeldean Road,\nKanata, ON K2S 0P5,\nDistance 0KM', 6, 0, '6132743984', 'Modern Home Luxury', 'http://www.lowes.ca', '<iframe src="https://www.google.com/maps/embed?pb=!1m12!1m8!1m3!1d2804.5092244892858!2d-75.713328!3d45.338532!3m2!1i1024!2i768!4f13.1!2m1!1s340+West+Hunt+Club+Rd.++Ottawa%2C+ON+K2E+0B7++Store+%233089!5e0!3m2!1sen!2sin!4v1427710729204" width="600" height="450" frameborder="0" style="border:0"></iframe>', 0, 1, 1),
(9, 'Hudsons Tap House', 'range4.jpg', 'thumb_range4.jpg', 'download.jpg', 'thumb_download.jpg', '401 21st St E, \nSaskatoon, \nSK S7K, \nCanada', 17, 0, '3069740944', 'Here to Cheer or Just for The Beer', 'http://hudsonstaphouse.com', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d46055.42418257793!2d-79.5386!3d43.825475999999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x882b2f400f146771%3A0xfecc6319b424d091!2sKFC!5e0!3m2!1sen!2sin!4v1427869491563" width="600" height="450" frameborder="0" style="border:0"></iframe>', 0, 1, 1),
(10, 'Uwajimaya', 'Shop.jpg', 'thumb_Shop.jpg', 'Uwajimaya-Pics_Outside-Store-Front_IMG_0812.jpg', 'thumb_Uwajimaya-Pics_Outside-Store-Front_IMG_0812.jpg', '600 5th Ave S, Seattle, WA 98104, United States', 124, 0, '2063408882', 'Largest Asian Grocery Retailers', 'http://www.uwajimaya.com/', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d172133.14576322195!2d-122.33590585000002!3d47.61484805!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54906abcdbd7d9ab%3A0xfeedcd4ac66b4ebb!2sUwajimaya!5e0!3m2!1sen!2sin!4v1428324385810" width="600" height="450" frameborder="0" style="border:0"></iframe>', 0, 1, 1),
(11, 'Shopfresh', 'superfreshh.jpg', 'thumb_superfreshh.jpg', 'superfreshh1.jpg', 'thumb_superfreshh1.jpg', 'Philadelphia', 106, 0, '+919830004321', '', 'http://www.shopfreshseafood.com/', '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3020.128092881424!2d-73.87504419999999!3d40.803178900000006!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c2f513c8432e0b%3A0x7004b7da5c10008d!2s800+Food+Center+Dr%2C+The+New+Fulton+Fish+Market%2C+Bronx%2C+NY+10474%2C+USA!5e0!3m2!1sen!2sin!4v1428327911056" width="600" height="450" frameborder="0" style="border:0"></iframe>', 0, 1, 1),
(12, 'Lifestyle & Home Centre', 'This_is_the_logo_of_the_Lifestyle_Stores.jpg', 'thumb_This_is_the_logo_of_the_Lifestyle_Stores.jpg', 'This_is_the_logo_of_the_Lifestyle_Stores1.jpg', 'thumb_This_is_the_logo_of_the_Lifestyle_Stores1.jpg', 'Lifestyle & Home Centre Mantri Mall No 1, \nSampige Road,\nMalleshwaram - 560003', 196, 0, '9876543210', 'Retail company Lifestyle ', 'http://www.sww.nisclient.com', '<iframe src="https://www.google.com/maps/embed?pb=!1m12!1m8!1m3!1d29484.29615087884!2d88.341939!3d22.5215475!3m2!1i1024!2i768!4f13.1!2m1!1slifestyle!5e0!3m2!1sen!2sin!4v1434524400373" width="600" height="450" frameborder="0" style="border:0"></iframe>', 14, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

DROP TABLE IF EXISTS `subscriptions`;
CREATE TABLE IF NOT EXISTS `subscriptions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subscribe_email` varchar(255) NOT NULL,
  `type` varchar(150) NOT NULL,
  `status` int(11) NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `subscription_app`
--

DROP TABLE IF EXISTS `subscription_app`;
CREATE TABLE IF NOT EXISTS `subscription_app` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subscribe_email` varchar(255) NOT NULL,
  `type` varchar(150) NOT NULL,
  `status` int(11) NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` int(11) NOT NULL DEFAULT '2',
  `zone` int(11) NOT NULL,
  `contact_no` varchar(255) NOT NULL,
  `dob` datetime NOT NULL,
  `gender` varchar(10) NOT NULL,
  `facebook_login_id` varchar(255) NOT NULL,
  `google_login_id` varchar(255) NOT NULL,
  `twitter_login_id` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `profile_image` varchar(500) NOT NULL,
  `forgot_password` tinyint(1) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=88 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email_id`, `password`, `address`, `city`, `zone`, `contact_no`, `dob`, `gender`, `facebook_login_id`, `google_login_id`, `twitter_login_id`, `status`, `profile_image`, `forgot_password`, `is_deleted`) VALUES
(74, 'shib', ' Maji', 'shibu20sxc@gmail.com', '959b77183615139279016986bee9b29b', 'Kolkata , West Bengal', 2, 0, '9775391105', '0000-00-00 00:00:00', '', '911717368879657', '', '', 1, '', 1, 1),
(75, 'paul', '', 'doublezero7@hotmail.com', 'e483f05d9cf0dc2a943a883c9dd3e479', '', 2, 0, '', '0000-00-00 00:00:00', '', '', '', '', 1, '', 1, 1),
(76, 'jude', '', 'jude@jude.com', '440b8d401208063247833221e119c6a8', '', 2, 0, '', '0000-00-00 00:00:00', '', '', '', '', 1, '', 1, 1),
(77, 'Stanley', '', 'brainsparksinc@gmail.com', 'e483f05d9cf0dc2a943a883c9dd3e479', '', 2, 0, '', '0000-00-00 00:00:00', '', '', '', '', 1, '', 1, 1),
(78, 'Andreas', 'dsfsdfds', 'andreas.nisbusiness@gmail.com', '03c30acca0bd9d11179c9ab18567ab98', '', 200, 0, '9775391105', '2015-05-01 12:00:00', 'male', '', '', '', 1, 'bllllueeeeeee1.jpeg', 1, 1),
(79, 'shibu', ' shankar maji', 'shibu_1sxc@yahoo.co.in', 'a5c00c9b87cc68f2c7fe4e12ad446ec5', '', 2, 0, '', '0000-00-00 00:00:00', '', '', '', '', 0, '', 1, 1),
(80, 'sdasadsa', '', 'shibu_sxc@yahoo.co.in', '4c92980f9d7ead00ff288f11116edce7', '', 2, 0, '', '0000-00-00 00:00:00', '', '', '', '', 0, '', 1, 1),
(81, 'Biplab', ' Naskar', 'biplabapril@gmail.com', 'a5c00c9b87cc68f2c7fe4e12ad446ec5', 'Kolkata', 2, 0, '43543566', '2015-05-22 12:00:00', 'male', '', '', '', 1, 'bllllueeeeeee.jpeg', 1, 1),
(82, 'dfvdf', '', 'a@c.co', 'ba5c73535d7bc6dd46cfa3ea3c89d765', '', 2, 0, '', '0000-00-00 00:00:00', '', '', '', '', 0, '', 1, 1),
(83, 'hfghfh', '', 'vhfghfgh@hfhfh.njdjd', '2a57be4472a608ede924275e54e7af21', '', 2, 0, '', '0000-00-00 00:00:00', '', '', '', '', 0, '', 1, 1),
(84, 'shib', ' shankar maji', 'mail.me097@gmail.com', 'a5c00c9b87cc68f2c7fe4e12ad446ec5', '', 2, 0, '', '0000-00-00 00:00:00', '', '', '', '', 0, '', 1, 1),
(85, 'Peterson', '', 'peterson@gmail.com', '022b5ac7ea72a5ee3bfc6b3eb461f2fc', '', 2, 0, '', '0000-00-00 00:00:00', '', '', '', '', 0, '', 1, 1),
(86, 'mitarpus', '', 'supratim.nisbusiness@gmail.com', '03c30acca0bd9d11179c9ab18567ab98', '', 2, 0, '', '0000-00-00 00:00:00', '', '', '', '', 0, '', 1, 1),
(87, 'shib', ' shankar maji', 'shibnis@gmail.com', 'd40faa1ed4bbc042221dc582a6f4305f', 'Kolkata , WestBengal', 137, 0, '9775391105', '0000-00-00 00:00:00', 'Male', '', '', '', 1, '', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `vote`
--

DROP TABLE IF EXISTS `vote`;
CREATE TABLE IF NOT EXISTS `vote` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `voted_for` int(11) NOT NULL,
  `type` varchar(255) NOT NULL COMMENT 'deal or grocery',
  `like` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `vote`
--

INSERT INTO `vote` (`id`, `voted_for`, `type`, `like`, `ip_address`, `is_deleted`) VALUES
(1, 2, 'brand', '1', '113.21.72.20', 1),
(2, 0, 'brand', '1', '0', 1),
(3, 10, 'brand', '1', '112.79.36.123', 1),
(4, 5, 'brand', '1', '27.131.209.235', 1),
(5, 0, 'brand', '1', '0', 1),
(6, 5, 'brand', '1', '113.21.72.20', 1),
(7, 4, 'brand', '1', '113.21.72.20', 1),
(8, 4, 'brand', '1', '113.21.72.20', 1),
(9, 4, 'brand', '1', '113.21.72.20', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vote_details`
--

DROP TABLE IF EXISTS `vote_details`;
CREATE TABLE IF NOT EXISTS `vote_details` (
  `id` int(11) NOT NULL,
  `vote_id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `time` datetime NOT NULL,
  `is_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
