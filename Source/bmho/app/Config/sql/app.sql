-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 12, 2014 at 12:27 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `marketplace_script`
--

-- --------------------------------------------------------

--
-- Table structure for table `enquiries`
--

DROP TABLE IF EXISTS `enquiries`;
CREATE TABLE IF NOT EXISTS `enquiries` (
  `id` char(36) NOT NULL,
  `shop_id` char(36) NOT NULL,
  `user_id` char(36) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enquiries`
--

INSERT INTO `enquiries` (`id`, `shop_id`, `user_id`, `subject`, `message`, `created`, `modified`) VALUES
('52f73c71-c368-40e9-8128-369caad93326', '52f3454d-de6c-4478-992f-0e38aad93326', '52f73c65-8954-4970-a772-369caad93326', 'Enquiry for Product: Kain A001', 'testestst', '2014-02-09 08:29:36', '2014-02-09 08:29:36'),
('52f740ed-ab98-4b6d-8081-369caad93326', '52f3454d-de6c-4478-992f-0e38aad93326', '52f740e7-b6f0-4087-99eb-369caad93326', 'Enquiry for Product: Kain A001', 'dasdasdasdasd', '2014-02-09 08:48:45', '2014-02-09 08:48:45'),
('52f8eaf9-3c80-4f60-8b86-2394aad93326', '52f8e071-5814-40a8-acf1-2394aad93326', '52f3050c-fa44-44b2-82b4-0e38aad93326', 'Enquiry for Product: Apple iPod Touch 4th Generation (8 GB)', 'Hi,\r\n\r\nIs this item still available? Can you give me better price?\r\n\r\nThank you.', '2014-02-10 15:06:33', '2014-02-10 15:06:33'),
('52f8f558-0348-4074-98a5-2394aad93326', '52f8e071-5814-40a8-acf1-2394aad93326', '52f3050c-fa44-44b2-82b4-0e38aad93326', 'Enquiry for Product: Asus S500CA 15.6" i3-3217 500GB 4GB 1.8GHz Window 8 TOUCHSCREEN Ultrabook Laptop', 'test sajo la', '2014-02-10 15:50:48', '2014-02-10 15:50:48'),
('52f8f570-2298-4488-8c74-2394aad93326', '52f8e071-5814-40a8-acf1-2394aad93326', '52f3050c-fa44-44b2-82b4-0e38aad93326', 'Enquiry for Product: Asus S500CA 15.6" i3-3217 500GB 4GB 1.8GHz Window 8 TOUCHSCREEN Ultrabook Laptop', 'Test sajo la 2', '2014-02-10 15:51:12', '2014-02-10 15:51:12'),
('52f8f77e-4ad0-4298-b257-2394aad93326', '52f8e071-5814-40a8-acf1-2394aad93326', '52f3050c-fa44-44b2-82b4-0e38aad93326', 'Enquiry for Product: Asus S500CA 15.6" i3-3217 500GB 4GB 1.8GHz Window 8 TOUCHSCREEN Ultrabook Laptop', 'test test test', '2014-02-10 15:59:58', '2014-02-10 15:59:58'),
('52f8f7ce-a47c-4638-a3b6-2394aad93326', '52f8e071-5814-40a8-acf1-2394aad93326', '52f3050c-fa44-44b2-82b4-0e38aad93326', 'Enquiry for Product: Asus S500CA 15.6" i3-3217 500GB 4GB 1.8GHz Window 8 TOUCHSCREEN Ultrabook Laptop', 'test1 test1 test1', '2014-02-10 16:01:18', '2014-02-10 16:01:18'),
('52f9864a-4c28-41ae-b71e-2394aad93326', '52f8e071-5814-40a8-acf1-2394aad93326', '52f3050c-fa44-44b2-82b4-0e38aad93326', 'Enquiry for Product: Microsoft Xbox 360 Slim Holiday Bundle 250 GB Black Console (NTSC)', 'test 5 test 5 test 5 test 5 ', '2014-02-11 02:09:14', '2014-02-11 02:09:14'),
('52f98737-6720-470e-ad40-2394aad93326', '52f8e071-5814-40a8-acf1-2394aad93326', '52f3050c-fa44-44b2-82b4-0e38aad93326', 'Enquiry for Product: Microsoft Xbox 360 Slim Holiday Bundle 250 GB Black Console (NTSC)', 'test 10:13 test 10:13 test 10:13 test 10:13 ', '2014-02-11 02:13:11', '2014-02-11 02:13:11'),
('52f987a6-65a0-411f-9e5a-2394aad93326', '52f8e071-5814-40a8-acf1-2394aad93326', '52f3050c-fa44-44b2-82b4-0e38aad93326', 'Enquiry for Product: Microsoft Xbox 360 Slim Holiday Bundle 250 GB Black Console (NTSC)', 'test 10:14 test 10:14 test 10:14 test 10:14 ', '2014-02-11 02:15:02', '2014-02-11 02:15:02'),
('52f998cf-6bbc-4c86-b53a-2394aad93326', '52f894b9-eb34-415c-8de0-369caad93326', '52f73c65-8954-4970-a772-369caad93326', 'Enquiry for Product: Canon EOS 50D 15.1 MP Digital SLR Camera - Black (Kit w/ EF-S IS 28-135mm Lens)', 'test 11:28 test 11:28 test 11:28 test 11:28 test 11:28 test 11:28 ', '2014-02-11 03:28:15', '2014-02-11 03:28:15'),
('52f99a02-882c-4c0c-83ed-2394aad93326', '52f894b9-eb34-415c-8de0-369caad93326', '52f73c65-8954-4970-a772-369caad93326', 'Enquiry for Product: Canon EOS 50D 15.1 MP Digital SLR Camera - Black (Kit w/ EF-S IS 28-135mm Lens)', 'test 11:33 test 11:33 test 11:33 ', '2014-02-11 03:33:22', '2014-02-11 03:33:22'),
('52f99dff-9388-40a3-a709-2394aad93326', '52f894b9-eb34-415c-8de0-369caad93326', '52f73c65-8954-4970-a772-369caad93326', 'Enquiry for Product: Canon EOS 50D 15.1 MP Digital SLR Camera - Black (Kit w/ EF-S IS 28-135mm Lens)', 'test 11:50 test 11:50 ', '2014-02-11 03:50:23', '2014-02-11 03:50:23'),
('52f9ac23-1798-4ae7-ac08-2394aad93326', '52f894b9-eb34-415c-8de0-369caad93326', '52f740e7-b6f0-4087-99eb-369caad93326', 'Enquiry for Product: Canon EOS 50D 15.1 MP Digital SLR Camera - Black (Kit w/ EF-S IS 28-135mm Lens)', 'test 12:50', '2014-02-11 04:50:43', '2014-02-11 04:50:43'),
('52f9cd56-2f38-40c0-85f8-2394aad93326', '52f8e071-5814-40a8-acf1-2394aad93326', '52f9ccb3-a078-4124-b41a-2394aad93326', 'Enquiry for Product: Sony PlayStation 4 (Latest Model)- 500 GB Jet Black Console - Launch Edition', 'test 3:12 pm', '2014-02-11 07:12:22', '2014-02-11 07:12:22'),
('52f9ce29-3c2c-49fd-9c5a-2394aad93326', '52f8a04f-e070-4d5b-848b-369caad93326', '52f9ce1b-94c0-48bb-9fef-2394aad93326', 'Enquiry for Product: NEW Samsung Galaxy Note III 3 4G LTE N9005 32GB Black â˜…Factory Unlocked', 'test 3:15pm', '2014-02-11 07:15:53', '2014-02-11 07:15:53'),
('52f9ceab-31a0-4eb2-a882-2394aad93326', '52f894b9-eb34-415c-8de0-369caad93326', '52f9ce9e-1974-4ecb-ab48-2394aad93326', 'Enquiry for Product: NEW Nikon D5200 Digital SLR Camera Body w 4 Lens Complete DSLR 24GB VALUE KIT', 'test 3:17pm', '2014-02-11 07:18:03', '2014-02-11 07:18:03'),
('52f9d00c-4be8-4d72-869a-2394aad93326', '52f894b9-eb34-415c-8de0-369caad93326', '52f9ce9e-1974-4ecb-ab48-2394aad93326', 'Enquiry for Product: NEW Nikon D5200 Digital SLR Camera Body w 4 Lens Complete DSLR 24GB VALUE KIT', 'test 3:23pm', '2014-02-11 07:23:56', '2014-02-11 07:23:56'),
('52f9d09d-2e58-499e-b4d7-2394aad93326', '52f894b9-eb34-415c-8de0-369caad93326', '52f9ce9e-1974-4ecb-ab48-2394aad93326', 'Enquiry for Product: NEW Nikon D5200 Digital SLR Camera Body w 4 Lens Complete DSLR 24GB VALUE KIT', 'test 3:26pm', '2014-02-11 07:26:21', '2014-02-11 07:26:21');

-- --------------------------------------------------------

--
-- Table structure for table `enquiry_replies`
--

DROP TABLE IF EXISTS `enquiry_replies`;
CREATE TABLE IF NOT EXISTS `enquiry_replies` (
  `id` char(36) NOT NULL,
  `enquiry_id` char(36) NOT NULL,
  `user_id` char(36) NOT NULL,
  `message` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enquiry_replies`
--

INSERT INTO `enquiry_replies` (`id`, `enquiry_id`, `user_id`, `message`, `created`, `modified`) VALUES
('52f8fb6a-fab0-47e2-8020-2394aad93326', '52f8f7ce-a47c-4638-a3b6-2394aad93326', '52f740e7-b6f0-4087-99eb-369caad93326', 'test 2 test 2 test 2', '2014-02-10 16:16:42', '2014-02-10 16:16:42'),
('52f8fc2f-d764-4545-9da6-2394aad93326', '52f8f7ce-a47c-4638-a3b6-2394aad93326', '52f740e7-b6f0-4087-99eb-369caad93326', 'test 3 test 3 test 3 ', '2014-02-10 16:19:59', '2014-02-10 16:19:59'),
('52f8fcab-9420-4844-9915-2394aad93326', '52f8f7ce-a47c-4638-a3b6-2394aad93326', '52f740e7-b6f0-4087-99eb-369caad93326', 'test 3 test 3 test 3 ', '2014-02-10 16:22:03', '2014-02-10 16:22:03'),
('52f9766f-fc8c-4a3f-a13e-2394aad93326', '52f8f7ce-a47c-4638-a3b6-2394aad93326', '52f740e7-b6f0-4087-99eb-369caad93326', 'test 4 test 4 test 4 ', '2014-02-11 01:01:35', '2014-02-11 01:01:35'),
('52f97826-2664-40ba-a061-2394aad93326', '52f8f7ce-a47c-4638-a3b6-2394aad93326', '52f740e7-b6f0-4087-99eb-369caad93326', 'test 5 test 5 test 5 test 5 ', '2014-02-11 01:08:54', '2014-02-11 01:08:54'),
('52f98118-98d4-4ac1-87a3-2394aad93326', '52f8f7ce-a47c-4638-a3b6-2394aad93326', '52f740e7-b6f0-4087-99eb-369caad93326', 'test 5 test 5 test 5 test 5 ', '2014-02-11 01:47:04', '2014-02-11 01:47:04'),
('52f982dc-7c50-43e2-99fe-2394aad93326', '52f8f7ce-a47c-4638-a3b6-2394aad93326', '52f740e7-b6f0-4087-99eb-369caad93326', 'test 5 test 5 test 5 test 5 ', '2014-02-11 01:54:36', '2014-02-11 01:54:36'),
('52f9843d-299c-4fec-9d53-2394aad93326', '52f8f7ce-a47c-4638-a3b6-2394aad93326', '52f740e7-b6f0-4087-99eb-369caad93326', 'test 6 test 6 test 6 test 6 ', '2014-02-11 02:00:29', '2014-02-11 02:00:29'),
('52f98461-8578-40d7-8c7b-2394aad93326', '52f8f7ce-a47c-4638-a3b6-2394aad93326', '52f740e7-b6f0-4087-99eb-369caad93326', 'test 6 test 6 test 6 test 6 ', '2014-02-11 02:01:05', '2014-02-11 02:01:05'),
('52f99e45-b9a8-439e-ac7a-2394aad93326', '52f99dff-9388-40a3-a709-2394aad93326', '52f3050c-fa44-44b2-82b4-0e38aad93326', 'test 11:51 test 11:51 ', '2014-02-11 03:51:33', '2014-02-11 03:51:33'),
('52f99f32-10c8-4f60-abb3-2394aad93326', '52f99dff-9388-40a3-a709-2394aad93326', '52f3050c-fa44-44b2-82b4-0e38aad93326', 'test 11:55 test 11:55 test 11:55 ', '2014-02-11 03:55:30', '2014-02-11 03:55:30'),
('52f9a11a-e588-4b73-b730-2394aad93326', '52f99dff-9388-40a3-a709-2394aad93326', '52f3050c-fa44-44b2-82b4-0e38aad93326', 'test 12:03 test 12:03 ', '2014-02-11 04:03:38', '2014-02-11 04:03:38'),
('52f9a1ae-cdac-4050-8228-2394aad93326', '52f99dff-9388-40a3-a709-2394aad93326', '52f3050c-fa44-44b2-82b4-0e38aad93326', 'test 12:05 test 12:05', '2014-02-11 04:06:06', '2014-02-11 04:06:06'),
('52f9ac72-a534-427f-9bb1-2394aad93326', '52f9ac23-1798-4ae7-ac08-2394aad93326', '52f3050c-fa44-44b2-82b4-0e38aad93326', 'test 12:51', '2014-02-11 04:52:02', '2014-02-11 04:52:02'),
('52f9ae51-8d90-4bf8-9ba6-2394aad93326', '52f9ac23-1798-4ae7-ac08-2394aad93326', '52f3050c-fa44-44b2-82b4-0e38aad93326', 'test 12:59', '2014-02-11 05:00:01', '2014-02-11 05:00:01'),
('52f9af8e-1d14-4e48-831e-2394aad93326', '52f9ac23-1798-4ae7-ac08-2394aad93326', '52f740e7-b6f0-4087-99eb-369caad93326', 'test 1:05', '2014-02-11 05:05:18', '2014-02-11 05:05:18'),
('52f9afd1-9220-4231-a2a5-2394aad93326', '52f9ac23-1798-4ae7-ac08-2394aad93326', '52f740e7-b6f0-4087-99eb-369caad93326', 'test 1:06', '2014-02-11 05:06:25', '2014-02-11 05:06:25'),
('52f9d0cb-ab88-48d0-93a3-2394aad93326', '52f9d09d-2e58-499e-b4d7-2394aad93326', '52f3050c-fa44-44b2-82b4-0e38aad93326', 'test 3:27pm', '2014-02-11 07:27:07', '2014-02-11 07:27:07'),
('52f9d258-02dc-4aa4-a4c4-2394aad93326', '52f9d09d-2e58-499e-b4d7-2394aad93326', '52f9ce9e-1974-4ecb-ab48-2394aad93326', 'test 3:33pm a', '2014-02-11 07:33:44', '2014-02-11 07:34:12'),
('52f9d381-ec24-4db2-9da6-2394aad93326', '52f9d09d-2e58-499e-b4d7-2394aad93326', '52f9ce9e-1974-4ecb-ab48-2394aad93326', 'test 3:38pm', '2014-02-11 07:38:41', '2014-02-11 07:38:41'),
('52f9d3b0-b15c-41b4-822b-2394aad93326', '52f9d09d-2e58-499e-b4d7-2394aad93326', '52f9ce9e-1974-4ecb-ab48-2394aad93326', 'test 3:39pm', '2014-02-11 07:39:28', '2014-02-11 07:39:28'),
('52f9d3f9-52dc-40f8-bd8e-2394aad93326', '52f9d09d-2e58-499e-b4d7-2394aad93326', '52f3050c-fa44-44b2-82b4-0e38aad93326', 'test 3:40pm', '2014-02-11 07:40:41', '2014-02-11 07:40:41'),
('52f9e473-9c34-4869-8848-2394aad93326', '52f9d09d-2e58-499e-b4d7-2394aad93326', '52f9ce9e-1974-4ecb-ab48-2394aad93326', 'test 4:50pm', '2014-02-11 08:50:59', '2014-02-11 08:50:59');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` char(36) NOT NULL,
  `shop_id` char(36) NOT NULL,
  `product_category_id` char(36) DEFAULT NULL,
  `name` varchar(200) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `price_discounted` decimal(10,2) DEFAULT NULL,
  `weight` float DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `option_name` varchar(100) DEFAULT NULL,
  `shipping_rate` varchar(20) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  KEY `shop_id` (`shop_id`),
  KEY `slug` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `shop_id`, `product_category_id`, `name`, `slug`, `description`, `price`, `price_discounted`, `weight`, `qty`, `status`, `option_name`, `shipping_rate`, `modified`, `created`) VALUES
('52f896b3-c91c-4f8e-bd12-369caad93326', '52f894b9-eb34-415c-8de0-369caad93326', '52f892e9-94fc-418f-8b2e-369caad93326', 'Canon EOS 50D 15.1 MP Digital SLR Camera - Black (Kit w/ EF-S IS 28-135mm Lens)', 'Canon_EOS_50D_15_1_MP_Digital_SLR_Camera_Black_Kit_w_EF_S_IS_28_135mm_Lens', 'Capture all your special moments with the Canon EOS 50D DSLR camera that comes with EF-S IS 28-135 mm lens and cherish the memories over and over again. With 15.1 MP APS-C sized sensor and Dual DIGIC 4 Image Processor, the Canon EOS 50D lets you take smooth, detailed, and high-quality images. Plus, the nine auto focus points help this Canon 15.1 MP camera to quickly and easily focus on off-center subjects too. <br><br>With a high ISO sensitivity (up to 12,800), this DSLR camera captures clear photos even in low-light conditions. What''s more, you can connect this Canon 15.1 MP camera with any PictBridge compatible printer to print images, thanks to its high-speed USB 2.0 port. <br><br>To top it all, the strong magnesium alloy construction helps this Canon 15.1 MP camera to withstand almost any condition, making it an ideal travel companion.\r\n', 699.00, 599.00, NULL, 1, 'Available', NULL, NULL, '2014-02-10 09:38:37', '2014-02-10 09:06:59'),
('52f89950-cfb0-4122-a929-369caad93326', '52f894b9-eb34-415c-8de0-369caad93326', '52f892e9-94fc-418f-8b2e-369caad93326', 'NEW Nikon D5200 Digital SLR Camera Body w 4 Lens Complete DSLR 24GB VALUE KIT', 'NEW_Nikon_D5200_Digital_SLR_Camera_Body_w_4_Lens_Complete_DSLR_24GB_VALUE_KIT', 'The Nikon D5200 is a small &amp; light weight camera with a rugged newly designed polymer Body. <br><br>The camera features Nikon''s newly developed DX-format CMOS Sensor with 24.1 effective megapixels.\r\n', 1009.00, 786.00, NULL, 1, 'Available', NULL, NULL, '2014-02-10 09:38:11', '2014-02-10 09:18:08'),
('52f89bd2-f270-4170-b529-369caad93326', '52f894b9-eb34-415c-8de0-369caad93326', '52f892e9-94fc-418f-8b2e-369caad93326', 'Olympus M 790 SW 7.1 MP Digital Camera - Black', 'Olympus_M_790_SW_7_1_MP_Digital_Camera_Black', 'Boasting a tough body, the 7.1 Megapixel Âµ 790 SW has the ability to go where other cameras can''t. Whether at the beach, doing a round of snowboarding or navigating the hazards of a kids'' party, this camera withstands it all.<br><br>The Âµ 790 SW matches brawn with performance. For versatility in locating and framing subjects, it features a 3x optical zoom (equiv. to 38-114mm). The ability to recognize human faces as the main subject of a composition through implementation of Face Detection Technology ensures optimal focus and exposure in the areas you want. <br><br>What''s more, the Âµ 790 SW applies innovative technology to deliver stunningly realistic results through the lightening of shadowy areas such as shade under a tree or backlit subjects. And ensuring photographic settings are tailored for most shooting situations, multiple scene modes are available, including four specifically made for use underwater.\r\n', 200.00, 99.00, NULL, 1, 'Available', NULL, NULL, '2014-02-10 09:33:38', '2014-02-10 09:28:50'),
('52f89f79-6824-463a-9e0b-369caad93326', '52f894b9-eb34-415c-8de0-369caad93326', '52f892e9-94fc-418f-8b2e-369caad93326', 'Canon EOS Rebel T3I 600D Body + 4 Lens Kit 18-55 IS +75-300 +24GB Flash & More', 'Canon_EOS_Rebel_T3I_600D_Body_4_Lens_Kit_18_55_IS_75_300_24GB_Flash_More', '<p><table><tbody><tr><td><b>Product Information</b></td></tr><tr><td>Capture all your special moments with the Canon EOS Rebel T3i/600D DSLR camera and cherish the memories over and over again. With an 18.0 MP CMOS sensor and DIGIC 4 image processor, this DSLR camera lets you take smooth, detailed, and high-quality images. The 3-inch monitor on this Canon 18.0 MP camera makes it easy to view photos, read menu, and compose shots. With a high ISO sensitivity (up to 6,400), the Canon EOS Rebel T3i/600D captures clear photos even in low-light conditions. What''s more, you can connect this Canon 18.0 MP camera to the USB port of a PC or a printer, thanks to its dedicated interface cable. All things considered, this Canon 18.0 MP camera, with an EF-S IS II 18-55 mm lens, aims to be a great travel companion.</td></tr><tr><td><b>Product Features</b></td></tr><tr><td><ul><li><strong>18-megapixel APS-C CMOS sensor</strong><br>An APS-C sized, 18-megapixel CMOS sensor captures images that are packed with detail and clarity. Such high-resolution allows large print sizes and the flexibility to crop pictures for alternative compositions.</li><li><strong>ISO 100-6400 sensitivity</strong><br>An ISO range of 100-6400, extendable to ISO 12,800, enables high-quality hand-held shooting in low-light conditions, without the need for flash.</li><li><strong>14-bit image processing</strong><br>At the heart of the Canon EOS 600D is a 14-bit DIGIC 4 image processor that provides exceptional color reproduction, smooth tonal gradation and tight control over noise.</li><li><strong>Scene intelligent auto mode</strong><br>Scene intelligent auto analyzes each scene in detail and picks the right camera settings each and every time, leaving you free to concentrate on what''s important - your photography.</li><li><strong>On-screen feature guide</strong><br>The EOS 600D''s on-screen feature guide provides descriptions of many of the camera''s functions, as well as advice on how to use them.</li><li><strong>Full-HD EOS movie</strong><br>Shoot Full-HD video with manual control over frame rate, exposure and sound. Video Snapshot technology allows short clips of 2, 4 or 8 sec to be merged into a single movie file, for footage that looks like it was edited professionally, while movie digital zoom permits 3-10x magnification while retaining Full-HD quality.</li><li><strong>9-point wide-area AF and iFCL metering</strong><br>Nine AF points, including one central cross-type sensor, spread out across the frame for swift, accurate focusing, even with off-center subjects. 63-zone iFCL metering ensures accurate exposures time after time.</li><li><strong>Basic+</strong><br>Basic+ technology allows photographers to customize basic auto settings according to lighting conditions or ambience.</li><li><strong>Creative filter effects</strong><br>Creative filter effects can be applied to Raw and JPEG files post capture, including toy camera, soft focus, miniature, grainy black and white and fish eye simulations.</li><li><strong>Built-in wireless flash control</strong><br>An integrated wireless Speedlite flash controller and Easy Wireless technology allow off-camera TTL flash without the need for extra accessories.</li><li><strong>Use with all EF and EF-S lenses</strong><br>The EOS 600D is supported by the complete system: flashguns, remote releases and over 60 lenses trusted by professional photographers the world over.</li></ul></td></tr></tbody></table><br></p>', 1239.00, 799.00, NULL, 1, 'Available', NULL, NULL, '2014-02-10 09:44:25', '2014-02-10 09:44:25'),
('52f8a0e9-5210-471a-a647-369caad93326', '52f8a04f-e070-4d5b-848b-369caad93326', '52f892f7-0f6c-41a4-b4ef-369caad93326', 'BRAND NEW Apple iPhone 5s Latest Model 16GB Gold Smartphone Factory Unlocked', 'BRAND_NEW_Apple_iPhone_5s_Latest_Model_16GB_Gold_Smartphone_Factory_Unlocked', '<p>Explore high-quality efficiency and a wide range of applications with the sleek and stylish iPhone 5s. This Apple mobile phone features 4-inch multi-touch widescreen IPS Retina display, which supports 1136x640-pixel native resolution at 326 ppi. Powered by a 64-bit Apple A7 processor and an M7 motion coprocessor, this Apple smartphone makes multitasking a breeze and lets you spare your battery power. The iPhone 5s is fully supported by the iOS 7, which makes your day more enjoyable, with its great features. Moreover, the 8 MP rear iSight camera on this Apple mobile phone lets you capture beautiful photos and supports Full HD (1080p) video recording. The iPhone 5s comes in three metallic colors and three capacity options. Whatâ€™s more, this smartphone supports 802.11n Wi-Fi, Bluetooth 4.0, and 4G/LTE, which ease your sharing and surfing experience.<br></p>', 799.00, 709.00, NULL, 1, 'Available', NULL, NULL, '2014-02-10 09:50:33', '2014-02-10 09:50:33'),
('52f8a2ac-9294-49cb-a839-369caad93326', '52f8a04f-e070-4d5b-848b-369caad93326', '52f892f7-0f6c-41a4-b4ef-369caad93326', 'BRAND NEW Google Nexus 5 32GB Black Unlocked Smartphone Latest Model', 'BRAND_NEW_Google_Nexus_5_32GB_Black_Unlocked_Smartphone_Latest_Model', '<p><table><tbody><tr><td><b>Product Identifiers</b></td></tr><tr><td>Brand</td><td>LG</td></tr><tr><td>Carrier</td><td>Unlocked</td></tr><tr><td>Model</td><td>Nexus 5</td></tr><tr><td>Type</td><td>Smartphone</td></tr><tr><td><b>Key Features</b></td></tr><tr><td>Storage Capacity</td><td>32 GB</td></tr><tr><td>Color</td><td>Black</td></tr><tr><td>Network Generation</td><td>2G, 3G, 4G</td></tr><tr><td>Network Technology</td><td>CDMA, GSM, LTE</td></tr><tr><td>Band</td><td>GSM 800/900/1800/1900 (Quadband)</td></tr><tr><td>Camera</td><td>13.0 MP</td></tr><tr><td>Connectivity</td><td>Android Beam, Bluetooth, Micro USB, WiFi</td></tr><tr><td><b>Battery</b></td></tr><tr><td>Battery Capacity</td><td>2300 mAh</td></tr><tr><td><b>Display</b></td></tr><tr><td>Display Technology</td><td>IPS+</td></tr><tr><td>Diagonal Screen Size</td><td>4.95 in.</td></tr><tr><td>Display Resolution</td><td>1920 x 1080</td></tr><tr><td><b>Other Features</b></td></tr><tr><td>Touch Screen</td><td>Yes</td></tr><tr><td>Bluetooth</td><td>Yes</td></tr><tr><td>Digital Camera</td><td>Yes</td></tr><tr><td>GPS</td><td>Yes</td></tr><tr><td>Email Access</td><td>Yes</td></tr><tr><td>Internet Browser</td><td>Yes</td></tr><tr><td>Speakerphone</td><td>Yes</td></tr><tr><td><b>Dimensions</b></td></tr><tr><td>Height</td><td>5.42 in.</td></tr><tr><td>Depth</td><td>0.34 in.</td></tr><tr><td>Width</td><td>2.72 in.</td></tr><tr><td>Weight</td><td>4.59 oz</td></tr></tbody></table><br></p>', 549.00, 499.00, NULL, 1, 'Available', NULL, NULL, '2014-02-10 09:58:04', '2014-02-10 09:58:04'),
('52f8a99e-2f70-466d-b60a-369caad93326', '52f8a04f-e070-4d5b-848b-369caad93326', '52f892f7-0f6c-41a4-b4ef-369caad93326', 'NEW Samsung Galaxy Note III 3 4G LTE N9005 32GB Black â˜…Factory Unlocked', 'NEW_Samsung_Galaxy_Note_III_3_4G_LTE_N9005_32GB_Black_Factory_Unlocked', '<p>Samsung Galaxy Note III 3 4G LTE N9005 32GB (Black)</p>', 699.00, NULL, NULL, 1, 'Available', NULL, NULL, '2014-02-10 10:27:42', '2014-02-10 10:27:42'),
('52f8a9d6-43a0-45e0-b86b-369caad93326', '52f8a04f-e070-4d5b-848b-369caad93326', '52f892f7-0f6c-41a4-b4ef-369caad93326', 'New Sony XPERIA Z1 C6903 Quad 20.7MP 4G LTE (FACTORY UNLOCKED) 16GB Black Phone', 'New_Sony_XPERIA_Z1_C6903_Quad_20_7MP_4G_LTE_FACTORY_UNLOCKED_16GB_Black_Phone', '<p>Sony XPERIA Z1 - 16GB - Black (Unlocked) Smartphone [zipedit]In Stock TODAY! No Waiting! This is a Sony XPERIA Z1 Smartphone Factory Unlocked Unlocked to Be used with any compatible carrier This is a 4G AT T Compatible Sony XPERIA Z1 - 16GB - Black (Unlocked) Smartphone:2G Network GSM 850 / 900 / 1800 / 1900 3G Network HSDPA 850 / 900 / 1700 / 1900 / 2100 4G Network LTE 800 / 850 / 900 / 1700 / 1800 / 1900 / 2100 / 2600 Prices Go up and Down.<br></p>', 699.00, NULL, NULL, 1, 'Available', NULL, NULL, '2014-02-10 10:28:38', '2014-02-10 10:28:38'),
('52f8e208-a3bc-4431-85e9-2394aad93326', '52f8e071-5814-40a8-acf1-2394aad93326', '52f892f0-9fbc-4e0b-be23-369caad93326', 'ASUS 7" 32GB Android 4.1 Tablet w/ Front Camera White MeMO Pad ME172V-B1-WH', 'ASUS_7_32GB_Android_4_1_Tablet_w_Front_Camera_White_MeMO_Pad_ME172V_B1_WH', '<p><strong>Vivid Display</strong><br>The ASUS tablet features a 7" inch LED display panel, which creates rich, vibrant colors and sharp graphics. The display is enabled with multitouch technology, so you can operate it with the tap of a finger.<br><br><strong>Large Storage Capacity</strong><br>With the large 32GB storage capacity available on the MeMO Pad, you can store tons of songs and videos for your enjoyment. If you need more storage space, the MeMO Pad has a micro SD slot available allowing you to increase storage space up to an additional 32GB!<br><br><strong>Control YouTube Videos on your TV</strong><br>Use the ASUS MeMO Pad to browse videos and fling them directly onto your YouTube enabled TV or device. Play, pause, or stop and even browse for something else while the current video is still playing.<br><br><strong>SonicMaster</strong><br>Exclusive ASUS Sonic Master technology together with Maxx Audio Wizard brings your music and movies to life. Choose from five different preset modes to perfectly match the situation so you know the sound you hear is exactly the sound you wanted.<br><br><strong>Wireless Connection</strong><br>The ASUS Memo Pad tablet features a built-in Wi-Fi connector, which enables you to join any open wireless network.<br></p>', 199.00, 99.00, NULL, 1, 'Available', NULL, NULL, '2014-02-10 14:28:24', '2014-02-10 14:28:24'),
('52f8e33f-5360-4b9f-8c82-2394aad93326', '52f8e071-5814-40a8-acf1-2394aad93326', '52f892f0-9fbc-4e0b-be23-369caad93326', '8GB iRulu 7" Android 4.0 Tablet PC Cortex A8 Dual Cameras w/ Keyboard&Earphone', '8GB_iRulu_7_Android_4_0_Tablet_PC_Cortex_A8_Dual_Cameras_w_Keyboard_Earphone', '<p><table><tbody><tr><td><p><strong>CPU Processor</strong></p></td><td><p>&nbsp;RK2926 Cortex-A8 1.2GHz + GPU Mali 400 MP</p></td></tr><tr><td><p><strong>&nbsp;Operating System</strong></p></td><td><p>&nbsp;Google Android 4.03 ICS</p></td></tr><tr><td><p><strong>&nbsp;Size</strong></p></td><td><p>&nbsp;7" TFT LCD(16:9 Screen) Capacitive Tablet PC TFT LCD</p></td></tr><tr><td><p><strong>&nbsp;Resolution</strong></p></td><td><p>&nbsp;800*480 Pixel, support G-Sensor</p></td></tr><tr><td><p><strong>&nbsp;Touch Screen</strong></p></td><td><p>&nbsp;Full Size, High Sensitive 5 Point Capacitive Touch Screen</p></td></tr><tr><td><p><strong>&nbsp;RAM</strong></p></td><td><p>&nbsp;512MB DDR3</p></td></tr><tr><td><p><strong>&nbsp;Capacity</strong></p></td><td><p>&nbsp;8GB; Expandable by MicroSD to 32GB</p></td></tr><tr><td><p><strong>&nbsp;Camera</strong></p></td><td><p>&nbsp;Dual Cameras</p></td></tr><tr><td><p><strong>&nbsp;Output Device</strong></p></td><td><p>&nbsp;Built-in Loud Speaker</p></td></tr><tr><td><p><strong>&nbsp;Input Device</strong></p></td><td><p>&nbsp;Built-in Microphone</p></td></tr><tr><td><p><strong>&nbsp;LAN</strong></p></td><td><p>&nbsp;External Fast 10/100 Mbps if equipped with an Ethernet Adapter</p></td></tr><tr><td><p><strong>&nbsp;Wireless</strong></p></td><td><p>&nbsp;Support WiFi (Built-in 802.11b/g WLAN Card), Support 3G (3G Dongle Not Included in Package)</p></td></tr><tr><td><p><strong>&nbsp;Card Reader Slot</strong></p></td><td><p>&nbsp;TF/MMC Card slot X 1</p></td></tr><tr><td><p><strong>&nbsp;USB</strong></p></td><td><p>&nbsp;Mini USB port</p></td></tr><tr><td><p><strong>&nbsp;Audio Port</strong></p></td><td><p>&nbsp;Headphone socket * 1</p></td></tr><tr><td><p><strong>&nbsp;AC Power Adaptor</strong></p></td><td><p>&nbsp;Input AC100-240V, 50-60Hz, Output 5V 1.5A</p></td></tr><tr><td><p><strong>&nbsp;Battery Pack</strong></p></td><td><p>&nbsp;3.7V 2800mAh Li-Polymer rechargeable battery, enjoy longer running time</p></td></tr><tr><td><p><strong>&nbsp;Dimension</strong></p></td><td><p>&nbsp;196.3*120.8*9.5mm</p></td></tr><tr><td><p><strong>&nbsp;Weight</strong></p></td><td><p>&nbsp;520g</p></td></tr><tr><td><strong>&nbsp;Picture Viewer</strong></td><td><p>&nbsp;Support JPG, JPEG, GIF.....</p></td></tr><tr><td><strong>&nbsp;Media File Audio</strong></td><td><p>&nbsp;MP3, WMA, WAV, APE, OGG, FLAC</p></td></tr><tr><td><strong>&nbsp;Video Player</strong></td><td><p>&nbsp;Support AVI, RM, RMVB, MKV, WMV, MOV, MP4,PMP,MPEG, MPG, FLV, 3GP, MPG, H.264, etc</p></td></tr><tr><td><strong>&nbsp;Music Player</strong></td><td><p>&nbsp;Support MP3, WMA, MP2, OGG, AAC, M4A, MA4, FLAC, APE, 3GP, WAV, support playlist</p></td></tr><tr><td><p><strong>&nbsp;G Sensor</strong></p></td><td><p>&nbsp;Yes</p></td></tr><tr><td><p><strong>&nbsp;Languages</strong></p></td><td><p>&nbsp;English,Spanish,French,German,Japanese,Dutch,Greek,Russian,Italian,Indonesian,Norwegian,Polish,Hungarian,<br>Swedish, Chinese (Traditional), Chinese (Simplified)</p></td></tr><tr><td><p><strong>&nbsp;Software</strong></p></td><td><p>&nbsp;Fring, QQ, MSN, Youtube, Google Map, Document to go, Multimedia Player, Application Store</p></td></tr><tr><td><p><strong>&nbsp; Input/Output Ports</strong></p></td><td><p>&nbsp; 3.5mm Headphone*1</p></td></tr><tr><td><p>&nbsp; Micro USB port*1</p></td></tr><tr><td><p>&nbsp; Power Jack*1</p></td></tr><tr><td><p>&nbsp; TF Card Slot*1</p></td></tr><tr><td><p><strong>&nbsp;Accessories</strong></p></td><td><p>&nbsp;8 Pin USB Cable, 8 Pin OTG Cable, English User''s Manual, AC Charger, Capacitive Stylus Pen</p></td></tr></tbody></table><br></p>', 69.00, 59.00, NULL, 1, 'Available', NULL, NULL, '2014-02-10 14:33:35', '2014-02-10 14:33:35'),
('52f8e474-42bc-4fdc-944b-2394aad93326', '52f8e071-5814-40a8-acf1-2394aad93326', '52f892f0-9fbc-4e0b-be23-369caad93326', 'Asus S500CA 15.6" i3-3217 500GB 4GB 1.8GHz Window 8 TOUCHSCREEN Ultrabook Laptop', 'Asus_S500CA_15_6_i3_3217_500GB_4GB_1_8GHz_Window_8_TOUCHSCREEN_Ultrabook_Laptop', '<p><h3>Overview:</h3><p>The ASUS VivoBook S500 gets even more hands on, thanks to a responsive 15.6â€ HD touchscreen that lets you tap, swipe and pinch to zoom just like a tablet. Designed with users in mind, the VivoBook offers an incredible mobile computing experience with a stylish and easy-to-carry slim design.</p><h4>ASUS VivoBook S500 and You. Incredible Together</h4><ul><li>Intuitive touchscreen built for incredible Windows 8 experience</li><li>Premium brushed metallic texture with Chiclet keyboard offering high durability and elegant look</li><li>ASUS SonicMaster technology, delivering surprisingly full sound from built-in speakers.</li><li>2-second Instant On resume time from hibernate mode</li><li>Solid State Hybrid Drive for faster boot time and speedy data access</li><li>Worry free auto back up when battery life falls below 5%</li></ul><h3>Features:</h3><h4>Move over, keyboard and mouse.</h4><p>ASUS VivoBook S500 Series unleashes the power of Windows 8 with an all-glass 15.6â€ HD capacitive touch panel. Open up a world of functionality with a notebook that lets you double tap to open documents, swipe to browse photos, and pinch to zoom in on maps, just like you would with a smartphone or tablet. Of course, if you prefer your trusty keyboard and track pad, youâ€™re free to use those methods as well.</p><h4>Designed to impress.</h4><p>A notebook with a touchscreen is incredible in and of itself. Of course, a slim Ultrabookâ„¢ profile with premium brushed metallic texture, hidden hinges design, and a Chiclet keyboard wouldnâ€™t hurt either. Focusing on even the smallest details, the ASUS VivoBook S500 is set to offer high durability and an elegant look within an ultra-slim profile that matches the dynamic new standards for high-portability and intuitive computing.</p><h4>Oneâ€¦twoâ€¦ and weâ€™re back on.</h4><p>Get up to speed faster with exclusive Super Hybrid Engine IIâ€”delivering two-second instant on so you can resume from hibernate mode without delay. Data is also safe and secure with the ASUS VivoBook S500 Series which automatically backs up your data when battery level drops below 5%.</p><h4>Itâ€™s ULTRABOOKâ„¢ Fast</h4><p>With a 24GB solid state hybrid drive cache, the ASUS VivoBook S500 delivers faster data load time and responsiveness compared to traditional hard drives</p><h4>Hear the power.</h4><p>Featuring exclusive ASUS SonicMaster Lite technology, the ASUS VivoBook S500 delivers deeper and richer bass, a wider audio range and pristine clarity by employing larger speakers and specially designed chambers within the limited space of a notebook to allow sound waves to fully expand outwards. With proprietary software, ASUS AudioWizard, it also offers access to new dimensions of sound with selectable modes including music, movie, and even game mode fitting audio needs based on your environment and preferences.</p><h4>Grab it from the cloud.</h4><p>With cloud-based ASUS WebStorage, access all your documents, photos, music, and videos from any device you are on.</p><br></p>', 599.00, 399.00, NULL, 1, 'Available', NULL, NULL, '2014-02-10 14:38:44', '2014-02-10 14:38:44'),
('52f8e581-c2bc-45a6-831f-2394aad93326', '52f8e071-5814-40a8-acf1-2394aad93326', '52f892f0-9fbc-4e0b-be23-369caad93326', 'Dell Latitude E6410 Laptop i-Core i5 2.4gzh 4GB Windows 7 Pro Notebook', 'Dell_Latitude_E6410_Laptop_i_Core_i5_2_4gzh_4GB_Windows_7_Pro_Notebook', '<p><table><tbody><tr><td><p>Type:</p></td><td><p>Notebook</p></td><td><p>Processor Type:</p></td><td><p>Intel Core i5</p></td></tr><tr><td><p>Brand:</p></td><td><p>Dell</p></td><td><p>Processor Speed:</p></td><td><p>2.4 GHz</p></td></tr><tr><td><p>Product Line:</p></td><td><p>Latitude</p></td><td><p>Memory:</p></td><td><p>4GB</p></td></tr><tr><td><p>Model:</p></td><td><p>E6410</p></td><td><p>Hard Drive Capacity:</p></td><td><p>160 GB</p></td></tr><tr><td><p>Operating System:</p></td><td><p>Windows 7 with COA License</p></td><td><p>Operating System Edition:</p></td><td><p>Professional</p></td></tr></tbody></table><br></p>', 399.00, 299.00, NULL, 1, 'Available', NULL, NULL, '2014-02-10 14:43:13', '2014-02-10 14:43:13'),
('52f8e95b-aed0-491b-accf-2394aad93326', '52f8e071-5814-40a8-acf1-2394aad93326', '52f89315-e64c-4aee-bba2-369caad93326', 'Vizio E321VL 32" 720p HD LCD Television', 'Vizio_E321VL_32_720p_HD_LCD_Television', '<p><table><tbody><tr><td>The Vizio E321VL television delivers superior quality picture with 100,000:1 dynamic contrast ratio and 720p HD resolution. This Vizio HDTV LCD television boasts Ambient Light Sensing technology, which automatically adjusts backlight levels to the brightness of its surroundings. This Vizio 32-inch television features SRS TruVolume, which limits volume inconsistencies between programming and SRS TruSurround HD audio for advanced virtual surround sound. The Vizio E321VL is equipped with two HDMI ports to accommodate your home theater setup. This Vizio 32-inch television exceeds ENERGY STAR 4.1 guidelines by using technology with remarkably low energy consumption.</td></tr><tr><td><b>Product Features</b></td></tr><tr><td><ul><li><strong>Ambient lighting</strong><br>Energy efficient sensors auto-adjust brightness for the perfect picture regardless of room conditions.</li><li><strong>SRS TruVolume</strong><br>Limits volume inconsistencies between programming.</li><li><strong>Dynamic Contrast Ratio</strong><br>A 100,000:1 Dynamic Contrast Ratio delivers deeper blacks and brighter whites through contrast and dimensions.</li><li><strong>SRS TruSurround HD</strong><br>Delivers immersive virtual high definition surround sound.</li><li><strong>Eco HD</strong><br>Eco HD saves you money on your utility bills while limiting the impact on the environment.</li></ul></td></tr></tbody></table><br></p>', 500.00, NULL, NULL, 1, 'Available', NULL, NULL, '2014-02-10 14:59:39', '2014-02-10 14:59:39'),
('52f8e9ac-15e8-4523-85ee-2394aad93326', '52f8e071-5814-40a8-acf1-2394aad93326', '52f89315-e64c-4aee-bba2-369caad93326', 'Apple iPod Touch 4th Generation (8 GB)', 'Apple_iPod_Touch_4th_Generation_8_GB', '<p>Enjoy watching videos on the 3.5-inch Multi-touch Retina display of the iPod touch 4G at a stunning resolution of 960x640p. The FaceTime feature of this Apple media player allows you to seamlessly video call your friend just by sending an invite. Equipped with an A4 processor, this digital media player makes multitasking, placing FaceTime calls or editing videos easy while enhancing the battery life. The Gyro+ Accelerometer of the iPod touch 4G enables better motion sensing like full 3D attitude, rotation rate and user acceleration, making gaming even more enjoyable. With a built-in editing feature, you do not have to wait to get to your PC to edit your videos; you can do that right away on this Apple media player. The two cameras of this digital media player shoot amazing videos in HD 720p resolution while the integrated microphone can record conversations or music simultaneously.<br></p>', 285.00, NULL, NULL, 1, 'Available', NULL, NULL, '2014-02-10 15:01:00', '2014-02-10 15:01:00'),
('52f8ea0d-fa4c-49ea-8bb7-2394aad93326', '52f8e071-5814-40a8-acf1-2394aad93326', '52f8931b-9450-4abb-8373-369caad93326', 'Microsoft Xbox 360 Slim Holiday Bundle 250 GB Black Console (NTSC)', 'Microsoft_Xbox_360_Slim_Holiday_Bundle_250_GB_Black_Console_NTSC', '<p><p>The Xbox 360 250GB Holiday Value Bundle features two free games,<em>Halo 4</em>and<em>Tomb Raider</em>, and one month of Xbox Live Gold membership. Wi-Fi is built-in for easier connection to the world of entertainment on Xbox Live, where HD movies and TV stream in an instant.<sup>1</sup>Xbox 360 is more games, entertainment and fun.</p><h4>Key Features</h4><ul><li><b>Xbox 360 E Console</b>: The Xbox 360 console is sleek and quiet, with a stylish design that will be the centerpiece of your home entertainment system.</li><li><b>Xbox 360 250GB Hard Drive</b>: The internal 250GB hard drive allows you to save your games and store television shows, movies, music, pictures, trailers, levels, demos, and other content available from Xbox Live Marketplace.</li><li><b>Built-in Wi-Fi</b>: The Xbox 360 has 802.11n Wi-Fi built in for a faster and easier connection to Xbox Live. Download or stream HD movies, TV episodes, and games from Xbox Live Marketplace in 1080p and 5.1 surround sound from anywhere in the house.<sup>2</sup></li><li><b>Kinect Ready</b>: Kinect makes<em>you</em>the controller. With a dedicated, specialized port, the Xbox 360 250GB is built to connect seamlessly with the Kinect sensor â€“ and have you up off the couch and into the world of Kinect in no time.<sup>3</sup></li><li><b>Xbox 360 Wireless Controller</b>: This award-winning, high-performance wireless controller features the Xbox Guide Button for quick, in-game access to friends and music. It has a range of up to 30 feet to allow you to play all over your living room.</li><li><b>Xbox 360 Headset</b>: Strategize or trade taunts while playing games, and chat with your friends on Xbox Live.</li><li><b>Xbox 360 Composite A/V cable</b>: Use your Xbox 360 on standard-definition televisions using this connection over traditional composite connectors. Play high-quality audio with the included stereo connector.</li><li><b>1 Month Xbox Live Gold Membership</b>: Xbox Live brings a whole world of entertainment possibility right to your Xbox 360. Play with friends online, and watch streaming movies and TV from Xbox Video and Netflix, all in crystal-clear HD. Youâ€™ll find loads of your favorite music from Last.fm right on the best screen in the house. With this Bundle, you get 1 month of Xbox Live Gold included at no additional cost.<sup>4</sup></li></ul><h4>Games Included</h4><p><i><b>Halo 4</b></i>: The Master Chief returns to battle an ancient evil bent on vengeance and annihilation. Shipwrecked on a mysterious world, faced with new enemies and deadly technology, the universe will never be the same. Enlist aboard the Infinity to experience Haloâ€™s original multiplayer and Spartan Ops â€“ innovative episodic fiction-based co-op missions.</p><ul><li><b>The Reclaimer Saga Begins</b>: Experience the dawn of an epic new Halo adventure, solo or split screen with up to three friends.</li><li><b>Go Beyond the Story</b>:<em>Halo 4</em>â€™s Infinity Multiplayer features a vastly expanded suite of multiplayer modes, weapons, vehicles, armor abilities, a new loadout and Spartan IV player progression system.</li><li><b>Edge-of-your-seat Entertainment</b>: Immerse yourself in<em>Halo 4</em>â€™s graphics, sound, and epic gameplay including a mysterious and deadly new class of enemies.<sup>5</sup></li></ul><p><i><b>Tomb Raider</b></i>:<i>Tomb Raider</i>is a fresh reimagining of the classic action-adventure franchise and will explore the intense and gritty origin story of an iconic character. In the game, Lara Croft will ascend from a frightened young woman on her first adventure and emerge as a hardened survivor. Armed with only her instincts and her innate ability to push beyond the limits of human endurance, Lara must fight, explore, and use her intelligence to unravel the dark history of a forgotten island and escape its relentless hold. With high-octane cinematic set pieces, visceral third-person combat, and large levels for Lara to navigate and explore,<em>Tomb Raider</em>is aiming to reinvent the action genre and recapture fans'' imagination with the original female video game heroine.<sup>6</sup></p><br></p>', 329.00, NULL, NULL, 1, 'Available', NULL, NULL, '2014-02-10 15:02:37', '2014-02-10 15:02:37'),
('52f8ea54-5b70-4991-bd7b-2394aad93326', '52f8e071-5814-40a8-acf1-2394aad93326', '52f8931b-9450-4abb-8373-369caad93326', 'Sony PlayStation 4 (Latest Model)- 500 GB Jet Black Console - Launch Edition', 'Sony_PlayStation_4_Latest_Model_500_GB_Jet_Black_Console_Launch_Edition', '<p>This is for a brand new, still sealed Playstation 4 500gb console. Your order will be shipped out within 24 hours by Canada Post - Expedited Parcel (Canada or USA) With tracking service and insurance included.<br><br>Please note we are required to charge GST / PST to orders shipped to Canada. Please allow up to 2 weeks delivery for orders shipped to U.S.A as there may be delays at the border.<br><br>Expresspost is currently at $39.99, but please contact me if you would like a quote, as that is the price for a location in Canada far away, it may be as little as an extra $5.99 based on your distance from me.<br></p>', 549.00, NULL, NULL, 1, 'Available', NULL, NULL, '2014-02-10 15:03:48', '2014-02-10 15:03:48');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

DROP TABLE IF EXISTS `product_categories`;
CREATE TABLE IF NOT EXISTS `product_categories` (
  `id` char(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `product_count` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `name`, `slug`, `product_count`) VALUES
('52f892e9-94fc-418f-8b2e-369caad93326', 'Cameras & Photography', 'Cameras_Photography', 4),
('52f892f0-9fbc-4e0b-be23-369caad93326', 'Computers & Tablets', 'Computers_Tablets', 4),
('52f892f7-0f6c-41a4-b4ef-369caad93326', 'Cell Phones & Accessories', 'Cell_Phones_Accessories', 4),
('52f89315-e64c-4aee-bba2-369caad93326', 'TV, Audio & Surveillance', 'TV_Audio_Surveillance', 2),
('52f8931b-9450-4abb-8373-369caad93326', 'Video Games & Consoles', 'Video_Games_Consoles', 2),
('52f89322-1344-42c6-80ae-369caad93326', 'Car Audio, Video & GPS', 'Car_Audio_Video_GPS', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

DROP TABLE IF EXISTS `product_images`;
CREATE TABLE IF NOT EXISTS `product_images` (
  `id` char(36) NOT NULL,
  `product_id` char(36) NOT NULL,
  `image` varchar(255) NOT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `thumbnail`) VALUES
('52f896b4-580c-4fbb-99db-369caad93326', '52f896b3-c91c-4f8e-bd12-369caad93326', '/files/products/product1_52f896b4125c4.jpg', '/files/products/product1_52f896b4125c4_resized_370x278.jpg'),
('52f896c4-b0b8-44fa-ac6c-369caad93326', '52f896b3-c91c-4f8e-bd12-369caad93326', '/files/products/product1b_52f896c4083fc.jpg', '/files/products/product1b_52f896c4083fc_resized_370x276.jpg'),
('52f896d0-cfe8-4be0-b74a-369caad93326', '52f896b3-c91c-4f8e-bd12-369caad93326', '/files/products/product1c_52f896d014318.jpg', '/files/products/product1c_52f896d014318_resized_370x276.jpg'),
('52f89950-83cc-4688-b504-369caad93326', '52f89950-cfb0-4122-a929-369caad93326', '/files/products/product2_52f899506cd20.jpg', '/files/products/product2_52f899506cd20_resized_370x370.jpg'),
('52f8995b-6194-4e90-9b05-369caad93326', '52f89950-cfb0-4122-a929-369caad93326', '/files/products/product2a_52f8995b5874d.jpg', '/files/products/product2a_52f8995b5874d_resized_370x370.jpg'),
('52f89966-c538-493e-a2e7-369caad93326', '52f89950-cfb0-4122-a929-369caad93326', '/files/products/product2b_52f899668e36b.jpg', '/files/products/product2b_52f899668e36b_resized_370x370.jpg'),
('52f89970-d15c-429b-9606-369caad93326', '52f89950-cfb0-4122-a929-369caad93326', '/files/products/product2c_52f89970af14d.jpg', '/files/products/product2c_52f89970af14d_resized_370x370.jpg'),
('52f89bd2-25b4-4bbb-ac30-369caad93326', '52f89bd2-f270-4170-b529-369caad93326', '/files/products/product3_52f89bd21c4d4.jpg', '/files/products/product3_52f89bd21c4d4_resized_370x278.jpg'),
('52f89be3-90ac-4a12-aee6-369caad93326', '52f89bd2-f270-4170-b529-369caad93326', '/files/products/product3b_52f89be28704a.jpg', '/files/products/product3b_52f89be28704a_resized_370x278.jpg'),
('52f89bef-9fd4-4c33-af74-369caad93326', '52f89bd2-f270-4170-b529-369caad93326', '/files/products/product3c_52f89beed0a5d.jpg', '/files/products/product3c_52f89beed0a5d_resized_370x278.jpg'),
('52f89f7a-bc8c-4922-816d-369caad93326', '52f89f79-6824-463a-9e0b-369caad93326', '/files/products/product4_52f89f79eb4f1.jpg', '/files/products/product4_52f89f79eb4f1_resized_370x370.jpg'),
('52f89f89-3ab8-4bd6-a2a5-369caad93326', '52f89f79-6824-463a-9e0b-369caad93326', '/files/products/product4b_52f89f897e810.jpg', '/files/products/product4b_52f89f897e810_resized_370x370.jpg'),
('52f89f98-9c40-4df4-85c5-369caad93326', '52f89f79-6824-463a-9e0b-369caad93326', '/files/products/product4c_52f89f981d8b1.jpg', '/files/products/product4c_52f89f981d8b1_resized_370x370.jpg'),
('52f8a0e9-4568-4b0a-b945-369caad93326', '52f8a0e9-5210-471a-a647-369caad93326', '/files/products/product5_52f8a0e97bf9c.jpg', '/files/products/product5_52f8a0e97bf9c_resized_370x322.jpg'),
('52f8a0f6-5774-4d3c-8e71-369caad93326', '52f8a0e9-5210-471a-a647-369caad93326', '/files/products/product5b_52f8a0f612e1f.jpg', '/files/products/product5b_52f8a0f612e1f_resized_370x278.jpg'),
('52f8a2ac-8d0c-419d-a79c-369caad93326', '52f8a2ac-9294-49cb-a839-369caad93326', '/files/products/product6_52f8a2ac4de0b.jpg', '/files/products/product6_52f8a2ac4de0b_resized_370x380.jpg'),
('52f8a99e-dbb4-47c5-b218-369caad93326', '52f8a99e-2f70-466d-b60a-369caad93326', '/files/products/product7_52f8a99e5650d.jpg', '/files/products/product7_52f8a99e5650d_resized_370x370.jpg'),
('52f8a9d6-dd18-4a5f-975d-369caad93326', '52f8a9d6-43a0-45e0-b86b-369caad93326', '/files/products/product8_52f8a9d659283.jpg', '/files/products/product8_52f8a9d659283_resized_370x497.jpg'),
('52f8e209-8e14-4818-b87d-2394aad93326', '52f8e208-a3bc-4431-85e9-2394aad93326', '/files/products/product9_52f8e2088076e.jpg', '/files/products/product9_52f8e2088076e_resized_370x370.jpg'),
('52f8e20a-7aa0-4b7f-a398-2394aad93326', '52f8e208-a3bc-4431-85e9-2394aad93326', '/files/products/product9a_52f8e209b10ce.jpg', '/files/products/product9a_52f8e209b10ce_resized_370x370.jpg'),
('52f8e20b-72d0-45b2-9967-2394aad93326', '52f8e208-a3bc-4431-85e9-2394aad93326', '/files/products/product9b_52f8e20a8a19a.jpg', '/files/products/product9b_52f8e20a8a19a_resized_370x493.jpg'),
('52f8e340-0888-43bf-b566-2394aad93326', '52f8e33f-5360-4b9f-8c82-2394aad93326', '/files/products/product10b_52f8e34082aaa.jpg', '/files/products/product10b_52f8e34082aaa_resized_370x242.jpg'),
('52f8e340-e19c-42a4-b712-2394aad93326', '52f8e33f-5360-4b9f-8c82-2394aad93326', '/files/products/product10a_52f8e3401ea28.jpg', '/files/products/product10a_52f8e3401ea28_resized_370x370.jpg'),
('52f8e340-f3b4-4f69-b3b9-2394aad93326', '52f8e33f-5360-4b9f-8c82-2394aad93326', '/files/products/product10_52f8e33fa5c0d.jpg', '/files/products/product10_52f8e33fa5c0d_resized_370x370.jpg'),
('52f8e341-f4e8-4809-b995-2394aad93326', '52f8e33f-5360-4b9f-8c82-2394aad93326', '/files/products/product10c_52f8e340dbf90.jpg', '/files/products/product10c_52f8e340dbf90_resized_370x247.jpg'),
('52f8e475-8680-46e5-b2a4-2394aad93326', '52f8e474-42bc-4fdc-944b-2394aad93326', '/files/products/product11c_52f8e4754dc65.jpg', '/files/products/product11c_52f8e4754dc65_resized_370x370.jpg'),
('52f8e475-8fb4-4d57-bfc4-2394aad93326', '52f8e474-42bc-4fdc-944b-2394aad93326', '/files/products/product11b_52f8e47505473.jpg', '/files/products/product11b_52f8e47505473_resized_370x370.jpg'),
('52f8e581-976c-4093-8f1d-2394aad93326', '52f8e581-c2bc-45a6-831f-2394aad93326', '/files/products/product12_52f8e5812149f.jpg', '/files/products/product12_52f8e5812149f_resized_370x278.jpg'),
('52f8e95b-43e8-404c-9fa6-2394aad93326', '52f8e95b-aed0-491b-accf-2394aad93326', '/files/products/product13b_52f8e95b62726.jpg', '/files/products/product13b_52f8e95b62726_resized_370x370.jpg'),
('52f8e95b-c8c8-453d-85de-2394aad93326', '52f8e95b-aed0-491b-accf-2394aad93326', '/files/products/product13c_52f8e95ba8676.jpg', '/files/products/product13c_52f8e95ba8676_resized_350x350.jpg'),
('52f8e95c-0fa0-4bd5-8321-2394aad93326', '52f8e95b-aed0-491b-accf-2394aad93326', '/files/products/product13d_52f8e95bc8a1f.jpg', '/files/products/product13d_52f8e95bc8a1f_resized_370x370.jpg'),
('52f8e9ac-ed30-4cf1-9b29-2394aad93326', '52f8e9ac-15e8-4523-85ee-2394aad93326', '/files/products/product14_52f8e9ac42ad6.jpg', '/files/products/product14_52f8e9ac42ad6_resized_370x620.jpg'),
('52f8ea0e-39c8-4f63-a26e-2394aad93326', '52f8ea0d-fa4c-49ea-8bb7-2394aad93326', '/files/products/product15_52f8ea0d9108c.jpg', '/files/products/product15_52f8ea0d9108c_resized_370x370.jpg'),
('52f8ea54-dcec-406c-8be6-2394aad93326', '52f8ea54-5b70-4991-bd7b-2394aad93326', '/files/products/product16_52f8ea54aeec8.jpg', '/files/products/product16_52f8ea54aeec8_resized_369x246.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `value` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `value`) VALUES
(1, 'email', 'test@neptunescripts.com'),
(6, 'website_title', 'Gadget Style'),
(7, 'website_header', 'Malaysian''a largest marketplace for Electronics.'),
(8, 'banner', 'files/banner.jpg'),
(9, 'website_desc', 'Malaysian''a largest marketplace for Gadget. Buy and Sell your Gadget here.'),
(10, 'currency', 'USD');

-- --------------------------------------------------------

--
-- Table structure for table `shops`
--

DROP TABLE IF EXISTS `shops`;
CREATE TABLE IF NOT EXISTS `shops` (
  `id` char(36) NOT NULL,
  `shop_category_id` char(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_id` char(36) DEFAULT NULL,
  `description` text,
  `email` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `banner` varchar(255) DEFAULT NULL,
  `product_count` int(11) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shops`
--

INSERT INTO `shops` (`id`, `shop_category_id`, `name`, `user_id`, `description`, `email`, `website`, `banner`, `product_count`, `created`, `modified`) VALUES
('52f894b9-eb34-415c-8de0-369caad93326', '', 'Zhaff''s Gadget Zone', '52f3050c-fa44-44b2-82b4-0e38aad93326', 'We sell cheap mobile phones.', 'zhaff@yahoo.com', 'http://neptunescripts.com', NULL, 4, '2014-02-10 08:58:33', '2014-02-11 07:42:28'),
('52f8a04f-e070-4d5b-848b-369caad93326', '', 'PDA Centre', '52f73c65-8954-4970-a772-369caad93326', 'We sell PDA, mobile phones and many more.', 'zhaff@yahoo.com', 'http://neptunescripts.com', NULL, 4, '2014-02-10 09:47:59', '2014-02-10 09:47:59'),
('52f8e071-5814-40a8-acf1-2394aad93326', '', 'Online Computer Shop', '52f740e7-b6f0-4087-99eb-369caad93326', 'Find high quality laptop and desktop at cheaper price here.', 'zhaff@yahoo.com', 'http://neptunescripts.com', NULL, 8, '2014-02-10 14:21:37', '2014-02-10 14:24:55');

-- --------------------------------------------------------

--
-- Table structure for table `shop_categories`
--

DROP TABLE IF EXISTS `shop_categories`;
CREATE TABLE IF NOT EXISTS `shop_categories` (
  `id` char(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `shop_count` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` char(36) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `hash_change_password` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `name`, `role`, `created`, `modified`, `hash_change_password`) VALUES
('52f2fe96-4524-4a86-b3b4-0e38aad93326', 'admin', 'ee49bcd4540a08c48ab9f3f6580cac830c08dfc2', 'zhaff@yahoo.com', 'Admin', 'admin', '2014-02-06 03:16:38', '2014-02-06 03:16:38', ''),
('52f3050c-fa44-44b2-82b4-0e38aad93326', 'user', '7d03718592d0fb2d08746f19593d698dfaf572ee', 'zhaff@yahoo.com', 'user', 'user', '2014-02-06 03:44:12', '2014-02-10 03:51:46', ''),
('52f73c65-8954-4970-a772-369caad93326', 'user2', '58023360fd3b95acd8c7782f4b627522572d47a8', 'zhaff@yahoo.com', 'user2', 'user', '2014-02-09 08:29:25', '2014-02-09 08:29:25', ''),
('52f740e7-b6f0-4087-99eb-369caad93326', 'user3', '05eb8d788a844c04e600abef4e7dae08dc62ec76', 'zhaff@yahoo.com', 'user3', 'user', '2014-02-09 08:48:39', '2014-02-09 08:48:39', ''),
('52f85667-b088-4eb4-b32f-369caad93326', 'user4', 'b8d2686f602d0e906df71306c434b21d5a24de1d', 'zhaff@yahoo.com', 'user4', 'user', '2014-02-10 04:32:39', '2014-02-10 04:32:39', ''),
('52f9ccb3-a078-4124-b41a-2394aad93326', 'web', '73132fc8c9d07c291f080419961dee7c6dd8b741', 'zhaff@yahoo.com', 'web', 'user', '2014-02-11 07:09:39', '2014-02-11 07:09:39', ''),
('52f9ce1b-94c0-48bb-9fef-2394aad93326', 'web1', 'b3e0b6b51156e0a112c640c274c84502b5ada62a', 'zhaff@yahoo.com', 'web1', 'user', '2014-02-11 07:15:39', '2014-02-11 07:15:39', ''),
('52f9ce9e-1974-4ecb-ab48-2394aad93326', 'web2', 'bb11d8527aca81fede2541467fb43207feb5cf94', 'zhaff@yahoo.com', 'web2', 'user', '2014-02-11 07:17:50', '2014-02-11 07:17:50', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
