-- phpMyAdmin SQL Dump
-- version 4.9.11
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 03, 2023 at 11:19 AM
-- Server version: 5.7.23-23
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `virtual2_mag_aircargo`
--

-- --------------------------------------------------------

--
-- Table structure for table `aboutussliders`
--

CREATE TABLE `aboutussliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `about_banners`
--

CREATE TABLE `about_banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sort_order` int(11) NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `about_banners`
--

INSERT INTO `about_banners` (`id`, `title`, `sort_order`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'We provides single page webapps', 1, 'Inactive', '2023-05-12 07:11:02', '2023-05-27 02:17:36', NULL),
(2, 'Provide AI to Your Apps', 2, 'Active', '2023-05-12 07:12:11', '2023-05-12 07:18:38', NULL),
(3, 'About slider 3', 3, 'Inactive', '2023-05-12 07:18:52', '2023-05-22 04:40:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `about_features`
--

CREATE TABLE `about_features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `number` int(11) NOT NULL,
  `sort_order` int(11) NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sub_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `short_description` text COLLATE utf8_unicode_ci,
  `description` text COLLATE utf8_unicode_ci,
  `second_description` text COLLATE utf8_unicode_ci NOT NULL,
  `alternate_description` longtext COLLATE utf8_unicode_ci,
  `image_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8_unicode_ci,
  `webp_image` text COLLATE utf8_unicode_ci,
  `image_attribute` text COLLATE utf8_unicode_ci,
  `alternate_image` text COLLATE utf8_unicode_ci,
  `alternate_webp_image` text COLLATE utf8_unicode_ci,
  `alternate_image_attribute` text COLLATE utf8_unicode_ci,
  `mission` text COLLATE utf8_unicode_ci NOT NULL,
  `vision` text COLLATE utf8_unicode_ci NOT NULL,
  `mission_vission_image` text COLLATE utf8_unicode_ci NOT NULL,
  `mission_vission_image_webp` text COLLATE utf8_unicode_ci NOT NULL,
  `mission_vission_image_attribute` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `trustedby` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `title`, `sub_title`, `short_description`, `description`, `second_description`, `alternate_description`, `image_title`, `image`, `webp_image`, `image_attribute`, `alternate_image`, `alternate_webp_image`, `alternate_image_attribute`, `mission`, `vision`, `mission_vission_image`, `mission_vission_image_webp`, `mission_vission_image_attribute`, `trustedby`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'WORLD’S BEST FREIGHT FORWARDING COMPANY', 'About us', '<p><strong>Mag Air Cargo,</strong> is a professional Freight Forwarding Company based in Dubai, Sharjah, United Arab Emirates, &amp; Cairo, Egypt.</p>', '<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>We are specialized in providing your logistics needs whether by air, sea, or both with more than 21 years of experience providing freight forwarding services in the U.A.E. and globally we ensure the smooth transportation of cargo in any form A to Z.</p>\r\n<p><strong>Mag Air Cargo Cairo</strong> - is an accredited branch with experience in dealing with Carriers, &nbsp;as they are the GSSA in Egypt for <strong>Nile Air, Neos, Fly Nas, and Al Jazeera airlines.</strong></p>\r\n<p><strong>Heavyweight Air Express, Cairo, Egypt</strong> - Is an accredited partner company, for freight forwarding and customs clearance, dealing with overseas agents. which services the whole cycle of companies.</p>', '<p>Mag Air Cargo can manage all of your administration and walk you through custom regulations and restrictions across the globe, ensuring every part of the operation goes safely as expected, without any unexpected delivery delays. Mag Air Cargo staffs are highly motivated, well trained, and experienced in all aspects of shipping and freight forwarding services with the flexibility to meet all the requirements and challenges in the industry.</p>\r\n<p>Mag Air Cargo is one of the pioneering Air Cargo Companies in Sharjah - Dubai - Cairo - Nairobi - Istanbul</p>\r\n<p>&nbsp;</p>', '', '', 'uploads/about-us/image/about1687623882.png', 'uploads/about-us/image/about1687623882.webp', 'alt=\"About Us\"', 'uploads/about-us/alternate_image/about1684498839.jpg', 'uploads/about-us/alternate_image/about1684498839.webp', '', 'We want our solutions to be unique, our clients to be happy and the trust in us never to be broken. Our vision is to keep these promises intact even when we become one of the topmost IT solutions firms in the world. We strongly believe that our success is our client’s growth and helps them in achieving their goals. We want the world to know us as the most reliable, creative, trustworthy, and customer-friendly company in the world by providing our clients with the most efficient and quality services.', 'We want our solutions to be unique, our clients to be happy and the trust in us never to be broken. Our vision is to keep these promises intact even when we become one of the topmost IT solutions firms in the world. We strongly believe that our success is our client’s growth and helps them in achieving their goals. We want the world to know us as the most reliable, creative, trustworthy, and customer-friendly company in the world by providing our clients with the most efficient and quality services.', 'uploads/about-us/mission_vission_image/about1684498840.jpg', 'uploads/about-us/mission_vission_image/about1684498839.webp', '', '', '2022-12-06 07:44:50', '2023-06-25 02:12:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role` enum('Super Admin','Admin') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Admin',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `user_id`, `role`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Super Admin', '2022-12-01 07:01:34', '2022-12-01 07:01:34', NULL),
(2, 2, 'Admin', '2023-05-01 05:44:46', '2023-05-02 03:15:23', '2023-05-02 03:15:23'),
(3, 3, 'Admin', '2023-05-02 01:09:20', '2023-05-02 03:09:44', '2023-05-02 03:09:44'),
(4, 4, 'Admin', '2023-05-02 03:17:06', '2023-05-02 03:17:06', NULL),
(5, 5, 'Super Admin', '2023-05-23 07:35:55', '2023-05-23 07:35:55', NULL),
(6, 6, 'Admin', '2023-05-23 07:45:07', '2023-05-23 07:45:07', NULL),
(7, 7, 'Admin', '2023-05-23 07:52:02', '2023-05-23 07:52:02', NULL),
(8, 8, 'Admin', '2023-05-23 08:00:16', '2023-05-23 08:00:16', NULL),
(9, 9, 'Admin', '2023-05-23 08:07:03', '2023-05-23 08:07:03', NULL),
(10, 10, 'Admin', '2023-05-27 03:45:04', '2023-05-27 03:45:04', NULL),
(11, 11, 'Admin', '2023-05-27 04:03:14', '2023-05-27 04:03:14', NULL),
(12, 12, 'Admin', '2023-05-27 04:10:13', '2023-05-27 04:10:13', NULL),
(13, 10, 'Admin', '2023-05-27 04:35:24', '2023-05-27 04:35:24', NULL),
(14, 11, 'Admin', '2023-05-29 04:46:04', '2023-05-29 04:46:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `agents`
--

CREATE TABLE `agents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` longtext COLLATE utf8_unicode_ci,
  `webp_image` longtext COLLATE utf8_unicode_ci,
  `image_meta_tag` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort_order` int(11) NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `linkedin_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `resume` longtext COLLATE utf8_unicode_ci,
  `message` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `associates`
--

CREATE TABLE `associates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `image_webp` text COLLATE utf8mb4_unicode_ci,
  `image_attribute` text COLLATE utf8mb4_unicode_ci,
  `sort_order` int(11) NOT NULL,
  `display_to_home` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No',
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `associates`
--

INSERT INTO `associates` (`id`, `title`, `image`, `image_webp`, `image_attribute`, `sort_order`, `display_to_home`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'IATA', 'uploads/associate/image/associate1681546868.jpg', 'uploads/associate/image/associate1681546868.webp', 'alt=\"Egyptian Emirates\"', 1, 'No', 'Active', '2023-04-15 04:21:08', '2023-05-03 08:09:42', NULL),
(2, 'NAFL', 'uploads/associate/image/associate1681548639.jpg', 'uploads/associate/image/associate1681548639.webp', 'alt=\"Egyptian Emirates\"', 2, 'No', 'Active', '2023-04-15 04:50:39', '2023-04-15 04:50:39', NULL),
(3, 'WCA China Global', 'uploads/associate/image/associate1681548665.jpg', 'uploads/associate/image/associate1681548665.webp', 'alt=\"Egyptian Emirates\"', 3, 'No', 'Active', '2023-04-15 04:51:05', '2023-04-15 04:51:05', NULL),
(4, 'FIATA', 'uploads/associate/image/associate1681548682.jpg', 'uploads/associate/image/associate1681548682.webp', 'alt=\"Egyptian Emirates\"', 4, 'No', 'Active', '2023-04-15 04:51:22', '2023-04-15 04:51:22', NULL),
(5, 'WCA World', 'uploads/associate/image/associate1681548698.jpg', 'uploads/associate/image/associate1681548698.webp', 'alt=\"Egyptian Emirates\"', 5, 'No', 'Active', '2023-04-15 04:51:38', '2023-04-15 04:51:38', NULL),
(6, 'TEST LOGO', 'uploads/associate/image/associate1682922495.jpg', 'uploads/associate/image/associate1682922495.webp', 'alt=\"Egyptian Air Cargo\"', 6, 'No', 'Active', '2023-04-30 23:22:31', '2023-05-01 00:58:42', '2023-05-01 00:58:42');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` text COLLATE utf8_unicode_ci,
  `sub_title` text COLLATE utf8_unicode_ci,
  `description` longtext COLLATE utf8_unicode_ci,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `webp_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_attribute` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `type`, `title`, `sub_title`, `description`, `image`, `webp_image`, `image_attribute`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'About', 'About', NULL, NULL, 'uploads/banner/About/image/home-about1687010941.png', 'uploads/banner/About/image/home-about1687010941.webp', 'alt=\"Mag Air Cargo\"', '2022-12-07 00:38:54', '2023-06-25 02:07:11', NULL),
(2, 'Portfolio', 'PORTFOLIO', 'Our Portfolio', NULL, 'uploads/banner/Portfolio/image/home-about1684155974.jpg', 'uploads/banner/Portfolio/image/home-about1684155974.webp', 'alt=\"Arabian Leisure\"', '2022-12-07 00:42:40', '2023-05-22 09:34:11', NULL),
(3, 'Blog', 'our BLOGs', NULL, NULL, 'uploads/banner/Blog/image/home-about1686921124.png', 'uploads/banner/Blog/image/home-about1686921123.webp', 'alt=\"Egyptian Emirates\"', '2022-12-07 00:43:05', '2023-06-23 10:25:07', NULL),
(4, 'Contact', 'Contact Us', NULL, NULL, 'uploads/banner/Contact/image/home-about1687185726.png', 'uploads/banner/Contact/image/home-about1687185726.webp', 'alt=\"Pentacodes\"', '2022-12-07 00:47:30', '2023-06-25 02:57:13', NULL),
(5, 'Testimonials', 'TESTIMONIALS', 'Client’s Voice', NULL, 'uploads/banner/Testimonials/image/home-about1670394019.png', 'uploads/banner/Testimonials/image/home-about1670394019.webp', 'alt=\"Arabian Leisure\"', '2022-12-07 00:50:19', '2022-12-07 00:50:19', NULL),
(6, 'Privacy-policy', 'PRIVACY POLICY', 'Privacy Policy', NULL, 'uploads/banner/Privacy-policy/image/home-about1684748448.jpg', 'uploads/banner/Privacy-policy/image/home-about1684748448.webp', 'alt=\"Egyptian Air Cargo\"', '2022-12-07 00:52:15', '2023-05-22 09:40:48', NULL),
(7, 'Terms-conditions', 'Our Terms', 'Terms and Conditions', NULL, 'uploads/banner/Terms-conditions/image/home-about1687185765.png', 'uploads/banner/Terms-conditions/image/home-about1687185765.webp', 'alt=\"ff', '2022-12-07 00:52:32', '2023-06-19 10:50:21', NULL),
(8, 'Services', 'Services', NULL, NULL, 'uploads/banner/Services/image/home-about1687681607.png', 'uploads/banner/Services/image/home-about1687681607.webp', 'alt=\"Mag Air Cargo\"', '2023-04-18 00:34:22', '2023-06-25 02:56:47', NULL),
(9, 'Certificate', 'Certificates', NULL, NULL, 'uploads/banner/Team/image/home-about1687157979.png', 'uploads/banner/Team/image/home-about1687157979.webp', 'alt=\"Egyptian Emirates\"', '2023-04-19 03:13:47', '2023-06-26 00:53:57', NULL),
(11, 'Casestudies', 'sdf', 'sdf', NULL, 'uploads/banner/Casestudies/image/home-about1684156032.jpg', 'uploads/banner/Casestudies/image/home-about1684156032.webp', 'alt=\"pentacodes\"', NULL, '2023-05-22 09:30:13', NULL),
(12, 'Career', 'Careers', 'dfg', NULL, NULL, NULL, 'alt=\"penta\"', '2023-05-16 06:29:30', '2023-05-27 08:48:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `short_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sub_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `posted_date` date DEFAULT NULL,
  `written_by` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` longtext COLLATE utf8_unicode_ci,
  `image_webp` longtext COLLATE utf8_unicode_ci,
  `image_attribute` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `video_url` text COLLATE utf8_unicode_ci,
  `video_thumbnail_image` longtext COLLATE utf8_unicode_ci,
  `video_thumbnail_image_webp` longtext COLLATE utf8_unicode_ci,
  `video_thumbnail_attribute` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alternate_description` longtext COLLATE utf8_unicode_ci,
  `banner_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `banner_sub_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `banner_image` longtext COLLATE utf8_unicode_ci,
  `banner_image_webp` longtext COLLATE utf8_unicode_ci,
  `banner_image_attribute` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8_unicode_ci,
  `meta_keyword` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `other_meta_tag` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('Active','Inactive') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Active',
  `showonhome` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `short_url`, `sub_title`, `posted_date`, `written_by`, `image`, `image_webp`, `image_attribute`, `description`, `video_url`, `video_thumbnail_image`, `video_thumbnail_image_webp`, `video_thumbnail_attribute`, `alternate_description`, `banner_title`, `banner_sub_title`, `banner_image`, `banner_image_webp`, `banner_image_attribute`, `meta_title`, `meta_description`, `meta_keyword`, `other_meta_tag`, `status`, `showonhome`, `created_at`, `updated_at`, `deleted_at`) VALUES
(21, 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 'lorem-ipsum-dolor-sit-amet-consectetur-adipisicing-elit', NULL, '2023-04-16', 'Admin', 'uploads/blog/image/blog1681710265.jpg', 'uploads/blog/image_webp/blog1681710265.webp', 'alt=\"Egyptian Air Cargo\"', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularized in the 1960s with the release of Letterset sheets containing.</p>\r\n<ul class=\"points list\">\r\n<li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard .</li>\r\n<li>Lorem Ipsum is simply dummy text of the printing</li>\r\n</ul>', '', 'uploads/blog/video_thumbnail_image/blog1681710266.jpg', 'uploads/blog/video_thumbnail_image_webp/blog1681710265.webp', 'alt=\"Egyptian Emirates\"', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>', '', '', 'uploads/blog/banner_image/blog1681710266.jpg', 'uploads/blog/banner_image_webp/blog1681710266.webp', 'alt=\"Egyptian Air Cargo\"', 'blog', '', '', '', 'Active', NULL, '2023-04-17 01:44:26', '2023-04-29 03:57:04', '2023-04-29 03:57:04'),
(22, '“The key to being a successful GSSA is agility”', 'the-key-to-being-a-successful-gssa-is-agility', NULL, '2023-04-28', 'Admin', 'uploads/blog/image/blog1683547346.jpg', 'uploads/blog/image_webp/blog1683547346.webp', 'alt=\"Pentacodes\"', '<p>The agility and quick thinking of GSAs has kept cargo moving through uncertain and turbulent times. Stephen Dawkins, chief executive officer, Air Logistics Group; Zafer Aggunduz chief marketing officer, Global GSA Group; and Ingo Zimmer, CEO, ATC Aviation Services spoke to ACW about how the unsung heroes of the past year have ensured goods got from A to B.</p>\r\n<p><strong>ACW: With uncertainty surrounding capacity, routes and staff, how have GSAs had to adapt throughout the pandemic?</strong></p>\r\n<p><strong>Dawkins:</strong>&nbsp;The last year has been challenging for everyone in the industry and for GSSAs it has highlighted the requirement for us to continually evolve. Air Logistics has continued to invest during these challenging times, by adding value where we can and easing the pressure on our Airline Principals by assisting our forwarding clients with especially demanding service levels. In the current climate capacity is scarce and GSSAs need to provide high quality solutions for their forwarding clients.</p>\r\n<p>Air Logistics is focussed on enabling our teams with the right tools to realize efficiencies that enhance sales and yields for our Partners.</p>\r\n<p>The pandemic highlighted the importance of our continuous investment in our network, IT infrastructure and digitalising our processes to provide faster quotations to our client base of over 16,000 freight forwarders worldwide.</p>\r\n<p>Around the world the impact of COVID-19 was swift, Air Logistics teams had the tools &amp; systems (communications / financial / operations / business intelligence) in place to work directly from home immediately, ensuring swift and efficient communication with our Forwarding and Airline clients.</p>\r\n<p><strong>Aggunduz:</strong>&nbsp;The air cargo industry is already a fast paced industry. Everyday is different so our teams already have the experience to cope with challenges and so they are able to act fast.</p>\r\n<p>For Global, the most important thing was the safety of our people, so we took measures in each country to see what we needed to do to keep our staff safe and abide my each country&rsquo;s rules and regulations.</p>\r\n<p>Everyday was an uncertainty. We were not able to plan ahead in regard to rates and capacity. The main solution for us was to have daily communication with airlines and agents.</p>\r\n<p>When you have this kind of uncertainty, there is also a lot of opportunity that arises. We had to be creative to take advantage of opportunities.</p>\r\n<p>For example, we have a company called ChartAir Cargo. A few years ago we started this as there was a gap in the market and we try to act as a broker as we</p>\r\n<p>receive a lot of requests from the market that we cannot act on with the portfolio that we have.</p>\r\n<p><strong>Zimmer:</strong>&nbsp;As a consequence of the pandemic the capacities on passenger flights dropped significantly. In order to cater for the demand we decided to offer charter services in addition to the GSSA segment. Volker Dunkake had been appointed to head our Charter and Solutions team.</p>\r\n<p>Volker has a broad experience in the charter business and before he joined ATC he was part of the Lufthansa Cargo Charter management. At the beginning of the pandemic the focus of the new department was on pax freighter charters exporting masks, gloves and ancillary equipment from China into destinations everywhere in the world. About 100 charters had been handled to Europe, Africa and South America.</p>\r\n<p>At the same time a COVID Task force has been put together. Thomas Baumert, a veteran in the Pharma business, and his team analysed the situation, talked to the concerned stakeholders in the logistic chain and offered solutions to our customers.</p>\r\n<p>Beside pax charters the solution team started to sell unused capacities from agent charters. Our group did set-up own charter chains into the USA.</p>\r\n<p><strong>ACW: Do you think the role of the GSSA has changed during this time? Why?</strong></p>\r\n<p><strong>Dawkins:</strong>&nbsp;During the pandemic airlines have been downsizing or parking their fleets and reducing the number of flights they operate. With this reduced activity, Airlines are having to make the difficult decisions to furlough or reduce head count and as such working with an outsourced cargo provider makes sense until the market returns, we all anticipate in 2022.</p>\r\n<p>Air Logistics Group offers more than just a selling solution &ndash; it provides additional administrative &amp; back-office functions, IT &amp; business intelligence solutions, alongside experienced sales and customer service teams.</p>\r\n<p>Any or all of these services can be selected by our airlines to ensure their cargo operation runs smoothly and provides a vital revenue stream during these challenging times in our industry.</p>\r\n<p><strong>Aggunduz:</strong>&nbsp;I think going forward it will definitely change. In this period all the carriers who had offices outside their own country had difficulty complying with the differing regulations.</p>\r\n<p>As a GSA we have 20 or 30 years experience and with that comes strong relationships. We know the agents by heart and we have personal relations with them as well as knowledge and expertise of the market.</p>\r\n<p>As a GSA we have various airlines, so we were able to take advantage of the buying power we have. We were also able to support the carriers we have in their portfolio as a lot of carriers cancelled some routes but in order not to lose the business we were able to book it on other carriers.</p>\r\n<p><strong>Zimmer:</strong>&nbsp;During COVID, we changed slightly into the role of a capacity provider and were forced to offer solutions. Not only selling scheduled carriers capacities because these capacities were insufficient for the airfreight demand.</p>', '', 'uploads/blog/video_thumbnail_image/blog1683705846.jpg', 'uploads/blog/video_thumbnail_image_webp/blog1683705846.webp', 'alt=\"Pentacodes\"', '<p>um pulvinar etiam non quam. Placerat duis ultricies lacus sed turpis. Tristique senectus et netus et malesuada fames ac. Ac auctor augue mauris augue neque. Lectus magna fringilla urna porttitor rhoncus. Id eu nisl nunc mi ipsum faucibus vitae aliquet nec. Habitant morbi tristique senectus et. Vitae nunc sed velit dignissim sodales ut eu. Elementum facilisis leo vel fringilla. Enim diam vulputate ut pharetra sit amet aliquam id. Euismod in p</p>', '', '', 'uploads/blog/banner_image/blog1682660815.jpg', 'uploads/blog/banner_image_webp/blog1682660815.webp', '', '“The key to being a successful GSSA is agility”', '“The key to being a successful GSSA is agility”', 'cont', '“The key to being a successful GSSA is agility”', 'Active', 'no', '2023-04-28 01:46:55', '2023-06-23 08:04:17', NULL),
(23, 'How Soaring Shipping Costs Raise Prices Around the World', 'how-soaring-shipping-costs-raise-prices-around-the-world', NULL, '2023-04-28', 'Egyptian Emirates Cargo', 'uploads/blog/image/blog1683547360.jpg', 'uploads/blog/image_webp/blog1683547360.webp', 'alt=\"Pentacodes\"', '<p>The sea carries more than 80 percent of the world&rsquo;s traded goods, most of which sail inside 40-foot-long steel containers stacked by the thousands atop some of the largest vessels ever built.</p>\r\n<p>The shock of the pandemic underscored just how crucial the maritime container trade is to the global economy. From Shanghai to Rotterdam to Los Angeles, the coronavirus upended supply chains. Ports lacked workers who were home sick. Truck drivers and ship crews couldn&rsquo;t cross borders because of public health restrictions. Pent-up demand from huge stimulus programs during extended lockdowns overwhelmed the capacity of supply chains. Besides causing delays in getting goods to customers, the cost of getting them there surged.</p>\r\n<p>As the Chart of the Week shows, the result of those challenges was that the cost of shipping a container on the world&rsquo;s transoceanic trade routes increased seven-fold in the 18 months following March 2020, while the cost of shipping bulk commodities spiked even more.&nbsp;<a href=\"https://www.imf.org/en/Publications/WP/Issues/2022/03/25/Shipping-Costs-and-Inflation-515144\">Our new research shows</a>&nbsp;that the inflationary impact of those higher costs is poised to keep building through the end of this year . Our analysis predates the war in Ukraine but isn&rsquo;t isolated from it: the conflict will likely exacerbate global inflation.</p>\r\n<p>Studying data from 143 countries over the past 30 years, we find that shipping costs are an important driver of inflation around the world: when freight rates double, inflation picks up by about 0.7 percentage point. Most importantly, the effects are quite persistent, peaking after a year and lasting up to 18 months. This implies that the increase in shipping costs observed in 2021 could increase inflation by about 1.5 percentage points in 2022.</p>\r\n<p>While the pass-through to inflation is less than that associated with fuel or food prices&mdash;which account for a larger share of consumer purchases&mdash;shipping costs are much more volatile. As a result, the contribution in the variation of inflation due to global shipping price changes is quantitatively similar to the variation generated by shocks to global oil and food prices.</p>\r\n<p>Our findings also reveal some of the mechanisms at work. We show that higher shipping costs hit prices of imported goods at the dock within two months, and quickly pass through to producer prices&mdash;many of whom rely on imported inputs to manufacture their goods.</p>\r\n<p>But the impact on the prices consumers pay at the cash register builds up more gradually, hitting its peak after 12 months. This is a much slower process than what is seen after a rise in global oil prices, which drivers feel at the pump within a couple of months.</p>\r\n<p>Rising shipping costs affect inflation in some countries more than others. First, our research shows that the structural characteristics of an economy matter. Countries that import more of what they consume see larger increases in inflation, as do those who are more integrated into global supply chains. Similarly, countries that typically pay higher freight costs&mdash;landlocked countries, low-income countries, and especially island states&mdash;see more inflation when these rise.</p>\r\n<p>Second, a strong and credible monetary policy framework can play a role in mitigating the second-round effects from import prices and inflation. Our analysis shows that keeping inflation expectations well-anchored is key to containing the effect of soaring shipping costs on consumer prices, particularly core measures that exclude fuel and food.</p>\r\n<p>Our results suggest the inflationary impact of shipping costs will continue to build through the end of 2022. This will create complicated trade-offs for many central bankers facing increasing inflation and still ample slack in economic activity. Moreover, the war in Ukraine is likely to cause further disruptions to supply chains, which could keep global shipping costs&mdash;and their inflationary effects&mdash;higher for longer.</p>', 'https://youtu.be/IyBDHuOA6B4', 'uploads/blog/video_thumbnail_image/blog1683267359.jpg', 'uploads/blog/video_thumbnail_image_webp/blog1683267359.webp', 'alt=\"Pentacodes\"', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Non curabitur gravida arcu ac tortor dignissim. Vestibulum lorem sed risus ultricies. At in tellus integer feugiat scelerisque varius morbi. Quis imperdiet massa tincidunt nunc pulvinar sapien et. Pellentesque dignissim enim sit amet venenatis urna. Urna id volutpat lacus laoreet non curabitur gravida arcu ac. Et malesuada fames ac turpis egestas maecenas pharetra convallis. Quis vel eros donec ac odio tempor orci. Viverra justo nec ultrices dui. Convallis tellus id interdum velit laoreet id donec ultrices tincidunt. Tortor at auctor urna nunc id cursus metus aliquam. Integer vitae justo eget magna fermentum iaculis. Pretium lectus quam id leo in. Quis hendrerit dolor magna eget est lorem ipsum.</p>', '', '', 'uploads/blog/banner_image/blog1682759758.jpg', 'uploads/blog/banner_image_webp/blog1682759758.webp', '', 'Pentacodes IT solution', 'Pentacodes IT solution', 'Pentacodes IT solution', '', 'Active', 'no', '2023-04-29 03:25:52', '2023-06-23 08:04:20', NULL),
(24, 'Air Charter Services Market Size And Forecast', 'air-charter-services-market-size-and-forecast', NULL, '2023-05-03', NULL, 'uploads/blog/image/blog1683547374.jpg', 'uploads/blog/image_webp/blog1683547374.webp', 'alt=\"Egyptian Air Cargo\"', '<p>Air Charter Services Market was valued at USD 25,574.6 Million in 2018 and is projected to reach<strong>&nbsp;USD 34,930.2 Million by 2026,</strong>&nbsp;growing at a&nbsp;<strong>CAGR of 4.04% from 2019 to 2026.</strong></p>\r\n<p>Major factors like time shortages, last-minute capacity, and unanticipated applications have also led to a push in the adoption of Air Charter, and hence the growth of Air Charter Services market size.&nbsp;The Global Air Charter Services Market report provides a holistic evaluation of the market. The report offers a comprehensive analysis of key segments, trends, drivers, restraints, competitive landscape, and factors that are playing a substantial role in the market.</p>\r\n<p>What is an Air Charter?</p>\r\n<p>An unscheduled flight that is not part of a regular airline routing is a charter flight. With a charter flight, one can rent an entire aircraft and can decide on the departure/arrival locations and times as per requirement. In contrast with the scheduled flights, the seats on charter flights can be sold individually through a charter company or by tour operators as a part of some travel package. Moreover, travelers can also hire an entire charter for a group (or an individual).</p>\r\n<p>The industry provides services for air transit for passengers as well as cargo over regular routes and on regular schedules. In case of this industry, the corporations and large businesses usually account for a large proportion of industry revenue as such businesses are in the capacity to use charter flights to transport staff between different work sites and to and from meetings, as well as to transport goods exclusively. Companies are more likely to use chartered flights for their staff when the corporate profit is high and economic conditions are strong.</p>\r\n<p>Global Air Charter Services Market Overview</p>\r\n<p>The growth in demand in the air cargo market is a positive prospect for air cargo providers and cargo charter operators which is expected to fuel the market for Air Charter Services over the forecast period. In recent times there has been an increasing number of shipments being delivery by air due to the growing demand by the customers for instant and timely delivery of their products. Major factors like time shortages, last-minute capacity, and unanticipated applications has also led to a push in the adoption of Air Charter, and hence the growth of Air Charter Services market size.</p>\r\n<p>Moreover, the on-demand charter jets are a growing choice of high and ultra-high net worth individuals as instead of owning jets, which can costlier to own and to maintain, high and ultra-high-net-worth individuals, are now gravitating towards private charter which is anticipated to boost the market further during the forecast period.</p>', '', NULL, NULL, 'alt=\"Egyptian Air Cargo\"', '', '', '', 'uploads/blog/banner_image/blog4321.jpg', 'uploads/blog/banner_image_webp/blog4321.webp', '', '', '', '', '', 'Active', 'no', '2023-05-03 10:24:38', '2023-06-25 02:48:28', NULL),
(25, 'Blog 4', 'sdf', 'fsdf', '2023-05-17', 'fdsf', 'uploads/blog/image/blog1683538770.jpg', 'uploads/blog/image_webp/blog1683538770.webp', 'alt=\"Egyptian Airgf Cargo\"', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'https://www.youtube.com/watch?v=n_uFzLPYDd8', 'uploads/blog/video_thumbnail_image/blog1683538770.jpg', 'uploads/blog/video_thumbnail_image_webp/blog1683538770.webp', 'alt=\"Egyptian Air Cargo\"', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '', '', NULL, NULL, '', '', '', '', '', 'Inactive', NULL, '2023-05-08 05:39:30', '2023-05-08 07:24:26', '2023-05-08 07:24:26'),
(26, 'Pacifics', 'pacifics', NULL, '2023-05-09', NULL, 'uploads/blog/image/blog1683547390.jpg', 'uploads/blog/image_webp/blog1683547390.webp', 'alt=\"Pentacodes\"', '<p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>\r\n<ul>\r\n<li>Lorem Ipsum is simply&nbsp;<a href=\"http://localhost/penta_frontend/case-study-detials.php\">dummy text of the printing and typesetting</a>&nbsp;industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li>\r\n<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A accusantium architecto consequatur delectus dolores id illum, ipsa laboriosam, officiis quibusdam quis quo repellat, sunt voluptas.</li>\r\n<li>Lorem Ipsum is simply&nbsp;<a href=\"http://localhost/penta_frontend/case-study-detials.php\">dummy text of the printing and typesetting</a>&nbsp;industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li>\r\n</ul>', '', 'uploads/blog/video_thumbnail_image/blog1687521177.jpg', 'uploads/blog/video_thumbnail_image_webp/blog1687521177.webp', 'alt=\"Pentacodes\"', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '', '', NULL, NULL, '', 'Pentacodes IT solution', 'Pentacodes IT solution', 'Pentacodes IT solution', '', 'Active', 'no', '2023-05-08 08:00:40', '2023-06-25 23:13:29', NULL),
(27, 'test', 'test', 'sdf', '2023-05-08', 'sdg', 'uploads/blog/image/blog1687521247.jpg', 'uploads/blog/image_webp/blog1687521247.webp', 'alt=\"sdg\"', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.test</p>', 'https://www.youtube.com/watch?v=HNGATxRZmYc', 'uploads/blog/video_thumbnail_image/blog1687521247.jpg', 'uploads/blog/video_thumbnail_image_webp/blog1687521247.webp', 'alt=\"pentacodes\"', '<p>test, Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '', '', NULL, NULL, '', 'Pentacodes IT solution', 'Pentacodes IT solution', 'Pentacodes IT solution', '', 'Active', 'no', '2023-05-13 00:42:15', '2023-06-23 08:04:34', NULL),
(28, 'Test blog one', 'test-blog-one', 'Test One blog', '2023-05-17', 'Writer 1', 'uploads/blog/image/blog1684322834.jpg', 'uploads/blog/image_webp/blog1684322834.webp', 'alt=\"blog test 1\"', '<p>The step-by-step guide on this page will show you how to create a blog in 20 minutes with&nbsp;<em>just the most basic computer skills.</em></p>\r\n<p>Test After completing this guide you will have a beautiful blog that is ready to share with the world.</p>\r\n<p>This guide is made especially for beginners. I will walk you through each and every step, using plenty of pictures and videos to make it all perfectly clear.</p>\r\n<p>If you get stuck or have questions at any point, simply&nbsp;<a href=\"https://www.theblogstarter.com/contact-me/\" target=\"_blank\" rel=\"noopener noreferrer\">send me a message</a>&nbsp;and I will do my best to help you out.</p>', 'test/url1', 'uploads/blog/video_thumbnail_image/blog1684322835.jpg', 'uploads/blog/video_thumbnail_image_webp/blog1684322834.webp', 'alt=\"Video\"', '<p>Test After completing this guide you will have a beautiful blog that is ready to share with the world.</p>\r\n<p>This guide is made especially for beginners. I will walk you through each and every step, using plenty of pictures and videos to make it all perfectly clear.</p>', '', '', NULL, NULL, '', '', '', '', '', 'Active', 'yes', '2023-05-17 11:27:15', '2023-05-17 12:06:49', NULL),
(29, 'Test blog 3', 'test-blog-3', 'blog test', '2023-05-20', 'test', 'uploads/blog/image/blog1684324226.jpg', 'uploads/blog/image_webp/blog1684324225.webp', 'alt=\"Egyptian Air Cargo\"', '<p>test</p>', '', 'uploads/blog/video_thumbnail_image/blog1684324227.jpg', 'uploads/blog/video_thumbnail_image_webp/blog1684324226.webp', 'alt=\"Egyptian Air Cargo\"', '<p>test</p>', '', '', NULL, NULL, '', '', '', '', '', 'Active', 'yes', '2023-05-17 11:50:27', '2023-06-23 07:34:06', NULL),
(30, 'test 4', 'test-4', 'test 4.2', '2023-05-17', NULL, NULL, NULL, 'alt=\"Egyptian Air Cargo\"', '<p>test</p>', '', 'uploads/blog/video_thumbnail_image/blog1684325850.jpg', 'uploads/blog/video_thumbnail_image_webp/blog1684325850.webp', 'alt=\"Egyptian Air Cargo\"', '', '', '', NULL, NULL, '', '', '', '', '', 'Active', 'no', '2023-05-17 12:14:34', '2023-06-23 08:04:10', NULL),
(31, 'title', 'title', ';hk;', '2023-05-17', NULL, NULL, NULL, 'alt=\"Pentacodes\"', '<p>desc</p>', '', NULL, NULL, 'alt=\"Egyptian Air Cargo\"', '<p>alt desc</p>', '', '', NULL, NULL, '', 'Pentacodes IT solution', 'Pentacodes IT solution', 'Pentacodes IT solution', '', 'Active', 'no', '2023-05-26 07:04:19', '2023-06-23 08:04:38', NULL),
(32, 'test blog  10', 'test-blog--10', 'test blog  10', '2023-05-17', 'test bloger', 'uploads/blog/image/blog1685112911.jpg', 'uploads/blog/image_webp/blog1685112911.webp', 'alt=\"Pentacodes\"', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '', NULL, NULL, 'alt=\"Pentacodes\"', '<p>test blog &nbsp;10</p>', '', '', NULL, NULL, '', 'Pentacodes IT solution', 'Pentacodes IT solution', 'Pentacodes IT solution', '', 'Active', NULL, '2023-05-26 10:55:11', '2023-06-19 04:37:21', NULL),
(33, 'ghfghfgh', 'ghfghfgh', NULL, '2023-06-23', 'rftyh', 'uploads/blog/image/blog1687521692.jpg', 'uploads/blog/image_webp/blog1687521692.webp', 'alt=\"Mag Air Cargo\"', '<p>hfgh</p>', '', NULL, NULL, 'alt=\"Mag Air Cargo\"', '', '', '', NULL, NULL, '', 'ghfghfgh', 'ghfghfgh', 'ghfghfgh', '', 'Active', NULL, '2023-06-23 08:01:32', '2023-06-23 08:02:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `careers`
--

CREATE TABLE `careers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `designation` text COLLATE utf8mb4_unicode_ci,
  `department` text COLLATE utf8mb4_unicode_ci,
  `location` text COLLATE utf8mb4_unicode_ci,
  `experience` text COLLATE utf8mb4_unicode_ci,
  `no_of_vac` text COLLATE utf8mb4_unicode_ci,
  `cv` text COLLATE utf8mb4_unicode_ci,
  `urg_status` text COLLATE utf8mb4_unicode_ci,
  `status` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `extra` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `casestudies`
--

CREATE TABLE `casestudies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `short_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sub_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `posted_date` date DEFAULT NULL,
  `written_by` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` longtext COLLATE utf8_unicode_ci,
  `image_webp` longtext COLLATE utf8_unicode_ci,
  `image_attribute` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `video_url` text COLLATE utf8_unicode_ci,
  `video_thumbnail_image` longtext COLLATE utf8_unicode_ci,
  `video_thumbnail_image_webp` longtext COLLATE utf8_unicode_ci,
  `video_thumbnail_attribute` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alternate_description` longtext COLLATE utf8_unicode_ci,
  `banner_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `banner_sub_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `banner_image` longtext COLLATE utf8_unicode_ci,
  `banner_image_webp` longtext COLLATE utf8_unicode_ci,
  `banner_image_attribute` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8_unicode_ci,
  `meta_keyword` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `other_meta_tag` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `scope` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Location` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Type` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Website` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('Active','Inactive') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Active',
  `showonhome` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `casestudies`
--

INSERT INTO `casestudies` (`id`, `title`, `short_url`, `sub_title`, `posted_date`, `written_by`, `image`, `image_webp`, `image_attribute`, `description`, `video_url`, `video_thumbnail_image`, `video_thumbnail_image_webp`, `video_thumbnail_attribute`, `alternate_description`, `banner_title`, `banner_sub_title`, `banner_image`, `banner_image_webp`, `banner_image_attribute`, `meta_title`, `meta_description`, `meta_keyword`, `other_meta_tag`, `scope`, `Location`, `Type`, `Website`, `status`, `showonhome`, `created_at`, `updated_at`, `deleted_at`) VALUES
(21, 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 'lorem-ipsum-dolor-sit-amet-consectetur-adipisicing-elit', NULL, '2023-04-16', NULL, 'uploads/blog/image/blog1683548430.jpg', 'uploads/blog/image_webp/blog1683548430.webp', 'alt=\"Egyptian Air Cargo\"', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularized in the 1960s with the release of Letterset sheets containing.</p>\r\n<ul class=\"points list\">\r\n<li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard .</li>\r\n<li>Lorem Ipsum is simply dummy text of the printing</li>\r\n</ul>', '', 'uploads/blog/video_thumbnail_image/blog1681710266.jpg', 'uploads/blog/video_thumbnail_image_webp/blog1681710265.webp', 'alt=\"Egyptian Emirates\"', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>', '', '', 'uploads/blog/banner_image/blog1681710266.jpg', 'uploads/blog/banner_image_webp/blog1681710266.webp', '', 'blog', '', '', '', 'development ,test ,host', 'dubai', 'design', 'www.google.com', 'Active', NULL, '2023-04-17 01:44:26', '2023-05-13 00:48:01', '2023-04-29 03:57:04'),
(22, '“The key to being a successful GSSA is agility”', '“The-key-to-being-a-successful-GSSA-is-agility”', 'test', '2023-04-28', NULL, 'uploads/blog/image/blog1683782086.jpg', 'uploads/blog/image_webp/blog1683782086.webp', 'alt=\"Egyptian Air Cargo\"', '<p>The agility and quick thinking of GSAs has kept cargo moving through uncertain and turbulent times. Stephen Dawkins, chief executive officer, Air Logistics Group; Zafer Aggunduz chief marketing officer, Global GSA Group; and Ingo Zimmer, CEO, ATC Aviation Services spoke to ACW about how the unsung heroes of the past year have ensured goods got from A to B.</p>\r\n<p><strong>ACW: With uncertainty surrounding capacity, routes and staff, how have GSAs had to adapt throughout the pandemic?</strong></p>\r\n<p><strong>Dawkins:</strong>&nbsp;The last year has been challenging for everyone in the industry and for GSSAs it has highlighted the requirement for us to continually evolve. Air Logistics has continued to invest during these challenging times, by adding value where we can and easing the pressure on our Airline Principals by assisting our forwarding clients with especially demanding service levels. In the current climate capacity is scarce and GSSAs need to provide high quality solutions for their forwarding clients.</p>\r\n<p>Air Logistics is focussed on enabling our teams with the right tools to realize efficiencies that enhance sales and yields for our Partners.</p>\r\n<p>The pandemic highlighted the importance of our continuous investment in our network, IT infrastructure and digitalising our processes to provide faster quotations to our client base of over 16,000 freight forwarders worldwide.</p>\r\n<p>Around the world the impact of COVID-19 was swift, Air Logistics teams had the tools &amp; systems (communications / financial / operations / business intelligence) in place to work directly from home immediately, ensuring swift and efficient communication with our Forwarding and Airline clients.</p>\r\n<p><strong>Aggunduz:</strong>&nbsp;The air cargo industry is already a fast paced industry. Everyday is different so our teams already have the experience to cope with challenges and so they are able to act fast.</p>\r\n<p>For Global, the most important thing was the safety of our people, so we took measures in each country to see what we needed to do to keep our staff safe and abide my each country&rsquo;s rules and regulations.</p>\r\n<p>Everyday was an uncertainty. We were not able to plan ahead in regard to rates and capacity. The main solution for us was to have daily communication with airlines and agents.</p>\r\n<p>When you have this kind of uncertainty, there is also a lot of opportunity that arises. We had to be creative to take advantage of opportunities.</p>\r\n<p>For example, we have a company called ChartAir Cargo. A few years ago we started this as there was a gap in the market and we try to act as a broker as we</p>\r\n<p>receive a lot of requests from the market that we cannot act on with the portfolio that we have.</p>\r\n<p><strong>Zimmer:</strong>&nbsp;As a consequence of the pandemic the capacities on passenger flights dropped significantly. In order to cater for the demand we decided to offer charter services in addition to the GSSA segment. Volker Dunkake had been appointed to head our Charter and Solutions team.</p>\r\n<p>Volker has a broad experience in the charter business and before he joined ATC he was part of the Lufthansa Cargo Charter management. At the beginning of the pandemic the focus of the new department was on pax freighter charters exporting masks, gloves and ancillary equipment from China into destinations everywhere in the world. About 100 charters had been handled to Europe, Africa and South America.</p>\r\n<p>At the same time a COVID Task force has been put together. Thomas Baumert, a veteran in the Pharma business, and his team analysed the situation, talked to the concerned stakeholders in the logistic chain and offered solutions to our customers.</p>\r\n<p>Beside pax charters the solution team started to sell unused capacities from agent charters. Our group did set-up own charter chains into the USA.</p>\r\n<p><strong>ACW: Do you think the role of the GSSA has changed during this time? Why?</strong></p>\r\n<p><strong>Dawkins:</strong>&nbsp;During the pandemic airlines have been downsizing or parking their fleets and reducing the number of flights they operate. With this reduced activity, Airlines are having to make the difficult decisions to furlough or reduce head count and as such working with an outsourced cargo provider makes sense until the market returns, we all anticipate in 2022.</p>\r\n<p>Air Logistics Group offers more than just a selling solution &ndash; it provides additional administrative &amp; back-office functions, IT &amp; business intelligence solutions, alongside experienced sales and customer service teams.</p>\r\n<p>Any or all of these services can be selected by our airlines to ensure their cargo operation runs smoothly and provides a vital revenue stream during these challenging times in our industry.</p>\r\n<p><strong>Aggunduz:</strong>&nbsp;I think going forward it will definitely change. In this period all the carriers who had offices outside their own country had difficulty complying with the differing regulations.</p>\r\n<p>As a GSA we have 20 or 30 years experience and with that comes strong relationships. We know the agents by heart and we have personal relations with them as well as knowledge and expertise of the market.</p>\r\n<p>As a GSA we have various airlines, so we were able to take advantage of the buying power we have. We were also able to support the carriers we have in their portfolio as a lot of carriers cancelled some routes but in order not to lose the business we were able to book it on other carriers.</p>\r\n<p><strong>Zimmer:</strong>&nbsp;During COVID, we changed slightly into the role of a capacity provider and were forced to offer solutions. Not only selling scheduled carriers capacities because these capacities were insufficient for the airfreight demand.</p>', '', NULL, NULL, 'alt=\"Egyptian Air Cargo\"', '', '', '', 'uploads/blog/banner_image/blog1682660815.jpg', 'uploads/blog/banner_image_webp/blog1682660815.webp', '', '', '', '', '', 'test', 'uae', 'artifitial intelligence', 'www.instagram.com', 'Active', 'yes', '2023-04-28 01:46:55', '2023-05-16 14:06:18', NULL),
(23, 'How Soaring Shipping Costs Raise Prices Around the World', 'how-soaring-shipping-costs-raise-prices-around-the-world', NULL, '2023-04-28', NULL, 'uploads/blog/image/blog1683548485.jpg', 'uploads/blog/image_webp/blog1683548485.webp', 'alt=\"Egyptian Air Cargo\"', '<p>The sea carries more than 80 percent of the world&rsquo;s traded goods, most of which sail inside 40-foot-long steel containers stacked by the thousands atop some of the largest vessels ever built.</p>\r\n<p>The shock of the pandemic underscored just how crucial the maritime container trade is to the global economy. From Shanghai to Rotterdam to Los Angeles, the coronavirus upended supply chains. Ports lacked workers who were home sick. Truck drivers and ship crews couldn&rsquo;t cross borders because of public health restrictions. Pent-up demand from huge stimulus programs during extended lockdowns overwhelmed the capacity of supply chains. Besides causing delays in getting goods to customers, the cost of getting them there surged.</p>\r\n<p>As the Chart of the Week shows, the result of those challenges was that the cost of shipping a container on the world&rsquo;s transoceanic trade routes increased seven-fold in the 18 months following March 2020, while the cost of shipping bulk commodities spiked even more.&nbsp;<a href=\"https://www.imf.org/en/Publications/WP/Issues/2022/03/25/Shipping-Costs-and-Inflation-515144\">Our new research shows</a>&nbsp;that the inflationary impact of those higher costs is poised to keep building through the end of this year . Our analysis predates the war in Ukraine but isn&rsquo;t isolated from it: the conflict will likely exacerbate global inflation.</p>\r\n<p>Studying data from 143 countries over the past 30 years, we find that shipping costs are an important driver of inflation around the world: when freight rates double, inflation picks up by about 0.7 percentage point. Most importantly, the effects are quite persistent, peaking after a year and lasting up to 18 months. This implies that the increase in shipping costs observed in 2021 could increase inflation by about 1.5 percentage points in 2022.</p>\r\n<p>While the pass-through to inflation is less than that associated with fuel or food prices&mdash;which account for a larger share of consumer purchases&mdash;shipping costs are much more volatile. As a result, the contribution in the variation of inflation due to global shipping price changes is quantitatively similar to the variation generated by shocks to global oil and food prices.</p>\r\n<p>Our findings also reveal some of the mechanisms at work. We show that higher shipping costs hit prices of imported goods at the dock within two months, and quickly pass through to producer prices&mdash;many of whom rely on imported inputs to manufacture their goods.</p>\r\n<p>But the impact on the prices consumers pay at the cash register builds up more gradually, hitting its peak after 12 months. This is a much slower process than what is seen after a rise in global oil prices, which drivers feel at the pump within a couple of months.</p>\r\n<p>Rising shipping costs affect inflation in some countries more than others. First, our research shows that the structural characteristics of an economy matter. Countries that import more of what they consume see larger increases in inflation, as do those who are more integrated into global supply chains. Similarly, countries that typically pay higher freight costs&mdash;landlocked countries, low-income countries, and especially island states&mdash;see more inflation when these rise.</p>\r\n<p>Second, a strong and credible monetary policy framework can play a role in mitigating the second-round effects from import prices and inflation. Our analysis shows that keeping inflation expectations well-anchored is key to containing the effect of soaring shipping costs on consumer prices, particularly core measures that exclude fuel and food.</p>\r\n<p>Our results suggest the inflationary impact of shipping costs will continue to build through the end of 2022. This will create complicated trade-offs for many central bankers facing increasing inflation and still ample slack in economic activity. Moreover, the war in Ukraine is likely to cause further disruptions to supply chains, which could keep global shipping costs&mdash;and their inflationary effects&mdash;higher for longer.</p>', 'https://youtu.be/IyBDHuOA6B4', 'uploads/blog/video_thumbnail_image/blog1683267359.jpg', 'uploads/blog/video_thumbnail_image_webp/blog1683267359.webp', 'alt=\"Egyptian Air Cargo\"', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Non curabitur gravida arcu ac tortor dignissim. Vestibulum lorem sed risus ultricies. At in tellus integer feugiat scelerisque varius morbi. Quis imperdiet massa tincidunt nunc pulvinar sapien et. Pellentesque dignissim enim sit amet venenatis urna. Urna id volutpat lacus laoreet non curabitur gravida arcu ac. Et malesuada fames ac turpis egestas maecenas pharetra convallis. Quis vel eros donec ac odio tempor orci. Viverra justo nec ultrices dui. Convallis tellus id interdum velit laoreet id donec ultrices tincidunt. Tortor at auctor urna nunc id cursus metus aliquam. Integer vitae justo eget magna fermentum iaculis. Pretium lectus quam id leo in. Quis hendrerit dolor magna eget est lorem ipsum.</p>', '', '', 'uploads/blog/banner_image/blog1682759758.jpg', 'uploads/blog/banner_image_webp/blog1682759758.webp', '', '', '', '', '', 'fdwfver', 'erverv', 'design', 'www.google.com', 'Active', 'yes', '2023-04-29 03:25:52', '2023-05-16 14:06:19', NULL),
(24, 'Air Charter Services Market Size And Forecast', 'air-charter-services-market-size-and-forecast', NULL, '2023-05-03', NULL, 'uploads/blog/image/blog1683549936.jpg', 'uploads/blog/image_webp/blog1683549936.webp', 'alt=\"Egyptian Air Cargo\"', '<p>Air Charter Services Market was valued at USD 25,574.6 Million in 2018 and is projected to reach<strong>&nbsp;USD 34,930.2 Million by 2026,</strong>&nbsp;growing at a&nbsp;<strong>CAGR of 4.04% from 2019 to 2026.</strong></p>\r\n<p>Major factors like time shortages, last-minute capacity, and unanticipated applications have also led to a push in the adoption of Air Charter, and hence the growth of Air Charter Services market size.&nbsp;The Global Air Charter Services Market report provides a holistic evaluation of the market. The report offers a comprehensive analysis of key segments, trends, drivers, restraints, competitive landscape, and factors that are playing a substantial role in the market.</p>\r\n<p>What is an Air Charter?</p>\r\n<p>An unscheduled flight that is not part of a regular airline routing is a charter flight. With a charter flight, one can rent an entire aircraft and can decide on the departure/arrival locations and times as per requirement. In contrast with the scheduled flights, the seats on charter flights can be sold individually through a charter company or by tour operators as a part of some travel package. Moreover, travelers can also hire an entire charter for a group (or an individual).</p>\r\n<p>The industry provides services for air transit for passengers as well as cargo over regular routes and on regular schedules. In case of this industry, the corporations and large businesses usually account for a large proportion of industry revenue as such businesses are in the capacity to use charter flights to transport staff between different work sites and to and from meetings, as well as to transport goods exclusively. Companies are more likely to use chartered flights for their staff when the corporate profit is high and economic conditions are strong.</p>\r\n<p>Global Air Charter Services Market Overview</p>\r\n<p>The growth in demand in the air cargo market is a positive prospect for air cargo providers and cargo charter operators which is expected to fuel the market for Air Charter Services over the forecast period. In recent times there has been an increasing number of shipments being delivery by air due to the growing demand by the customers for instant and timely delivery of their products. Major factors like time shortages, last-minute capacity, and unanticipated applications has also led to a push in the adoption of Air Charter, and hence the growth of Air Charter Services market size.</p>\r\n<p>Moreover, the on-demand charter jets are a growing choice of high and ultra-high net worth individuals as instead of owning jets, which can costlier to own and to maintain, high and ultra-high-net-worth individuals, are now gravitating towards private charter which is anticipated to boost the market further during the forecast period.</p>', '', NULL, NULL, 'alt=\"Egyptian Air Cargo\"', '', '', '', 'uploads/blog/banner_image/blog4321.jpg', 'uploads/blog/banner_image_webp/blog4321.webp', '', '', '', '', '', NULL, NULL, 'development', NULL, 'Active', NULL, '2023-05-03 10:24:38', '2023-05-08 08:45:36', NULL),
(25, 'Blog 4', 'sdf', 'fsdf', '2023-05-17', NULL, 'uploads/blog/image/blog1683781989.jpg', 'uploads/blog/image_webp/blog1683781989.webp', 'alt=\"Egyptian Airgf Cargo\"', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'https://www.youtube.com/watch?v=n_uFzLPYDd8', 'uploads/blog/video_thumbnail_image/blog1683538770.jpg', 'uploads/blog/video_thumbnail_image_webp/blog1683538770.webp', 'alt=\"Egyptian Air Cargo\"', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '', '', NULL, NULL, '', '', '', '', '', 'ververv', 'dsg', 'design', 'dsg', 'Active', NULL, '2023-05-08 05:39:30', '2023-05-11 01:53:47', NULL),
(26, 'Case Study 4', 'case-study-4', 'tyj', '2023-05-09', NULL, 'uploads/blog/image/blog1683548662.jpg', 'uploads/blog/image_webp/blog1683548662.webp', 'alt=\"sdgs\"', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. At erat pellentesque adipiscing commodo elit at imperdiet dui accumsan. Urna nunc id cursus metus aliquam eleifend mi in nulla. Lectus magna fringilla urna porttitor rhoncus dolor. Ipsum suspendisse ultrices gravida dictum fusce ut. Vel orci porta non pulvinar neque laoreet suspendisse interdum consectetur. Integer feugiat scelerisque varius morbi enim nunc faucibus. Diam maecenas ultricies mi eget mauris pharetra. Dictum varius duis at consectetur lorem donec massa sapien faucibus. Porttitor rhoncus dolor purus non. Elementum sagittis vitae et leo duis. Sed elementum tempus egestas sed sed risus pretium. Et netus et malesuada fames. Tellus pellentesque eu tincidunt tortor aliquam nulla. Malesuada nunc vel risus commodo viverra maecenas accumsan lacus. Ac odio tempor orci dapibus ultrices. Turpis egestas maecenas pharetra convallis. Facilisis magna etiam tempor orci eu. Eros in cursus turpis massa tincidunt. Neque sodales ut etiam sit amet nisl purus in mollis.</p>\r\n<p>In iaculis nunc sed augue lacus viverra. Id volutpat lacus laoreet non curabitur gravida arcu. Luctus venenatis lectus magna fringilla urna porttitor. Tellus molestie nunc non blandit massa enim nec. Sollicitudin ac orci phasellus egestas. Sit amet consectetur adipiscing elit ut aliquam purus sit amet. Mi proin sed libero enim sed faucibus turpis in eu. Rutrum tellus pellentesque eu tincidunt tortor aliquam nulla facilisi cras. Tincidunt dui ut ornare lectus sit amet. Rhoncus aenean vel elit scelerisque. Bibendum est ultricies integer quis auctor elit sed.</p>\r\n<p>Elementum pulvinar etiam non quam lacus suspendisse faucibus. Tristique sollicitudin nibh sit amet commodo nulla facilisi nullam. Felis imperdiet proin fermentum leo vel orci porta. Habitasse platea dictumst vestibulum rhoncus. Faucibus a pellentesque sit amet porttitor eget dolor morbi. Orci a scelerisque purus semper eget duis at tellus. Quam vulputate dignissim suspendisse in est ante. Scelerisque purus semper eget duis at tellus. Gravida cum sociis natoque penatibus et magnis dis. Purus faucibus ornare suspendisse sed nisi lacus sed. Consequat mauris nunc congue nisi vitae suscipit tellus. Nunc sed id semper risus in hendrerit gravida rutrum quisque. Feugiat pretium nibh ipsum consequat nisl vel pretium lectus quam. Mi quis hendrerit dolor magna eget. Urna molestie at elementum eu facilisis. Et ligula ullamcorper malesuada proin libero nunc consequat. Porta non pulvinar neque laoreet.</p>\r\n<p>Arcu ac tortor dignissim convallis. Integer enim neque volutpat ac tincidunt. Nulla posuere sollicitudin aliquam ultrices sagittis orci. Egestas integer eget aliquet nibh praesent tristique magna sit. In metus vulputate eu scelerisque felis. Nulla pellentesque dignissim enim sit amet venenatis urna cursus eget. Semper eget duis at tellus at. Molestie at elementum eu facilisis sed odio morbi. Vel turpis nunc eget lorem dolor. Purus viverra accumsan in nisl nisi scelerisque eu. Sit amet volutpat consequat mauris nunc. A condimentum vitae sapien pellentesque habitant. Iaculis eu non diam phasellus.</p>\r\n<p>Sodales ut eu sem integer. Scelerisque viverra mauris in aliquam. In hac habitasse platea dictumst vestibulum rhoncus est pellentesque. Fringilla urna porttitor rhoncus dolor purus non enim praesent elementum. Et netus et malesuada fames ac turpis egestas maecenas. Etiam tempor orci eu lobortis elementum. Mattis rhoncus urna neque viverra justo nec ultrices. Congue eu consequat ac felis donec et odio pellentesque. Dui id ornare arcu odio ut sem. Scelerisque varius morbi enim nunc faucibus a pellentesque sit. Pretium aenean pharetra magna ac. Adipiscing tristique risus nec feugiat in.</p>', '', NULL, NULL, 'alt=\"Egyptian Air Cargo\"', '', '', '', NULL, NULL, '', '', '', '', '', 'jtyj', '', 'design', 'www.jtyj.tyj', 'Active', NULL, '2023-05-08 08:24:22', '2023-05-16 13:03:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `casestudytypes`
--

CREATE TABLE `casestudytypes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `casestudytypes`
--

INSERT INTO `casestudytypes` (`id`, `title`, `created_at`, `updated_at`) VALUES
(2, 'developments', '2023-05-10 08:30:30', '2023-05-11 01:33:49'),
(3, 'design', '2023-05-10 08:30:50', '2023-05-10 08:37:46'),
(4, 'artifitial intelligence', '2023-05-10 08:35:51', '2023-05-10 08:38:01'),
(5, 'type 4', '2023-05-10 08:38:22', '2023-05-10 08:38:22'),
(6, 'Test case studies One', '2023-05-22 05:14:32', '2023-05-22 05:15:15');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` longtext COLLATE utf8_unicode_ci,
  `webp_image` longtext COLLATE utf8_unicode_ci,
  `image_meta_tag` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort_order` int(11) NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `flag_image` longtext COLLATE utf8_unicode_ci,
  `flag_webp_image` longtext COLLATE utf8_unicode_ci,
  `flag_image_meta_tag` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('Active','Inactive') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `enquiries`
--

CREATE TABLE `enquiries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `enquiry_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `request_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_of_appointment` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `no_of_passengers` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` longtext COLLATE utf8_unicode_ci,
  `service_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sub_service_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `message` longtext COLLATE utf8_unicode_ci,
  `reply` longtext COLLATE utf8_unicode_ci,
  `reply_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `enquiries`
--

INSERT INTO `enquiries` (`id`, `enquiry_type`, `request_url`, `name`, `phone`, `email`, `date_of_appointment`, `no_of_passengers`, `type`, `service_id`, `sub_service_id`, `message`, `reply`, `reply_date`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'contact-us', 'https://demo.pentacodesdemos.com/', 'images', '6238349119', 'lijojohn016@gmail.com', NULL, NULL, NULL, NULL, NULL, '6', NULL, NULL, '2023-05-17 04:39:34', '2023-05-17 04:39:34', NULL),
(2, 'contact-us', 'https://demo.pentacodesdemos.com/services-details52', 'images', '6238349119', 'lijojohn016@gmail.com', NULL, NULL, NULL, NULL, NULL, 'dfg', NULL, NULL, '2023-05-17 05:49:19', '2023-05-17 05:49:19', NULL),
(3, 'contact-us', 'https://demo.pentacodesdemos.com/services-details52', 'images', '6238349119', 'lijojohn016@gmail.com', NULL, NULL, NULL, NULL, NULL, 'dfg', NULL, NULL, '2023-05-17 05:51:27', '2023-05-17 05:51:27', NULL),
(4, 'contact-us', 'https://demo.pentacodesdemos.com/services-details52', 'images', '6238349119', 'lijojohn016@gmail.com', NULL, NULL, NULL, NULL, NULL, 'dfg', NULL, NULL, '2023-05-17 05:58:26', '2023-05-17 05:58:26', NULL),
(5, 'contact-us', 'https://demo.pentacodesdemos.com/services-details52', 'images', '6238349119', 'lijojohn016@gmail.com', NULL, NULL, NULL, NULL, NULL, 'dfg', NULL, NULL, '2023-05-17 06:00:50', '2023-05-17 06:00:50', NULL),
(6, 'contact-us', 'https://demo.pentacodesdemos.com/services-details52', 'images', '6238349119', 'lijojohn016@gmail.com', NULL, NULL, NULL, NULL, NULL, 'dfg', NULL, NULL, '2023-05-17 06:01:32', '2023-05-17 06:01:32', NULL),
(7, 'contact-us', 'https://demo.pentacodesdemos.com/services-details52', 'images', '6238349119', 'lijojohn016@gmail.com', NULL, NULL, NULL, NULL, NULL, 'dfg', NULL, NULL, '2023-05-17 06:04:28', '2023-05-17 06:04:28', NULL),
(8, 'contact-us', 'http://demo.pentacodesdemos.com/services-details48', 'fwef', '3453454354', 'lijo.pentacodes@gmail.com', NULL, NULL, NULL, NULL, NULL, 'nc', NULL, NULL, '2023-05-17 06:48:15', '2023-05-17 06:48:15', NULL),
(9, 'contact-us', 'https://demo.pentacodesdemos.com/', 'Shadil Pentacodes', '122121122', 'webteamlead.pentacodesllp@gmail.com', NULL, NULL, NULL, NULL, NULL, 'test by shadil', NULL, NULL, '2023-05-17 07:01:17', '2023-05-17 07:01:17', NULL),
(10, 'contact-us', 'https://demo.pentacodesdemos.com/', 'images', '6238349119', 'lijojohn016@gmail.com', NULL, NULL, NULL, NULL, NULL, 'sdvsdv', NULL, NULL, '2023-05-17 07:10:45', '2023-05-17 07:10:45', NULL),
(11, 'contact-us', 'https://demo.pentacodesdemos.com/', 'images', '6238349119', 'lijojohn016@gmail.com', NULL, NULL, NULL, NULL, NULL, 'sdvsdv', NULL, NULL, '2023-05-17 07:13:18', '2023-05-17 07:13:18', NULL),
(12, 'contact-us', 'http://demo.pentacodesdemos.com/about-us', 'Subin', '9946258412', 'subin.pentacodesllp@gmail.com', NULL, NULL, NULL, NULL, NULL, 'Test 1', 'test enq reply', '2023-05-23 06:46:42', '2023-05-17 10:04:15', '2023-05-23 06:46:42', NULL),
(13, 'contact-us', 'https://demo.pentacodesdemos.com/', '132324', '45612379', 'subin.pentacodesllp@gmail.com', NULL, NULL, NULL, NULL, NULL, 'Test GAQ 2', NULL, NULL, '2023-05-17 10:28:08', '2023-05-17 10:28:08', NULL),
(14, 'contact-us', 'https://demo.pentacodesdemos.com/career', 'Subin', '9946032581', 'subin.pentacodesllp@gmail.com', NULL, NULL, NULL, NULL, NULL, 'test 4', '12.23 pm\r\n23/5/2023\r\ntest', '2023-05-23 06:53:23', '2023-05-23 06:52:23', '2023-05-23 06:53:23', NULL),
(15, 'contact-us', 'https://demo.pentacodesdemos.com/enquiry', 'Subin test', '994600010', 'subin.pentacodesllp@gmail.com', NULL, NULL, NULL, NULL, NULL, 'test get a quote enq 6', NULL, NULL, '2023-05-23 06:54:50', '2023-05-23 06:56:55', '2023-05-23 06:56:55'),
(16, 'contact-us', 'https://demo.pentacodesdemos.com/enquiry', 'subin get a quote', '9946303020', 'subinbaby.3@rediffmail.com', NULL, NULL, NULL, NULL, NULL, 'test get a quote enq 23/5/23. 12.25 pm', '12.26pm Indian time', '2023-05-23 06:56:28', '2023-05-23 06:55:47', '2023-05-23 06:56:28', NULL),
(17, 'contact-us', 'https://demo.pentacodesdemos.com/', 'Subin', '9946024735', 'subin.pentacodesllp@gmail.com', NULL, NULL, NULL, NULL, NULL, 'test iphone 12', 'seryg', '2023-05-29 02:09:16', '2023-05-23 12:45:22', '2023-05-29 02:09:16', NULL),
(18, 'contact-us', 'https://demo.pentacodesdemos.com/contact-us', 'frgdfsg', '6238349119', 'lijojohn016@gmail.com', NULL, NULL, NULL, NULL, NULL, 'o78o', 'd', '2023-05-29 02:07:46', '2023-05-26 04:43:17', '2023-05-29 02:07:46', NULL),
(19, 'contact-us', 'https://demo.pentacodesdemos.com/', 'fwef', '6238349119', 'admin@gmail.com', NULL, NULL, NULL, NULL, NULL, 'iri8ri', 'ew', '2023-05-29 02:03:54', '2023-05-26 04:46:19', '2023-05-29 02:03:54', NULL),
(20, 'enquiry_modal', 'http://127.0.0.1:8000/contact-us', 'dzfg', '3453454354', 'lijojohn016@gmail.com', NULL, NULL, NULL, NULL, NULL, 'zdfg', NULL, NULL, '2023-05-26 08:41:45', '2023-05-26 08:41:45', NULL),
(21, 'enquiry_modal', 'http://127.0.0.1:8000/contact-us', 'dzfg', '3453454354', 'lijojohn016@gmail.com', NULL, NULL, NULL, NULL, NULL, 'zdfg', 'ok', '2023-05-29 01:19:54', '2023-05-26 08:45:03', '2023-05-29 01:19:54', NULL),
(22, 'contact-us', 'http://127.0.0.1:8000/about-us', 'hhdfh', '3453454354', 'lijo.pentacodes@gmail.com', NULL, NULL, NULL, NULL, NULL, 'hjk', 'gera', '2023-05-26 22:03:51', '2023-05-26 09:07:49', '2023-05-27 10:03:51', NULL),
(23, 'contact-us', 'http://127.0.0.1:8000/', 'hhdfh', '3453454354', 'lijojohn016@gmail.com', NULL, NULL, NULL, NULL, NULL, 'sfdgasdg', 'jxgj', '2023-05-27 03:51:42', '2023-05-26 09:09:16', '2023-05-27 04:26:26', '2023-05-27 04:26:26'),
(24, 'contact-us', 'http://127.0.0.1:8000/portfolio', 'dzfgs', '3453454354', 'lijojohn016@gmail.com', NULL, NULL, NULL, NULL, NULL, 'htsrhs', NULL, NULL, '2023-05-27 03:52:45', '2023-05-27 04:26:15', '2023-05-27 04:26:15'),
(25, 'enquiry_modal', 'http://127.0.0.1:8000/contact-us', 'hhdfh', '3453454354', 'lijo.pentacodes@gmail.com', NULL, NULL, NULL, NULL, NULL, 'zsdfg', NULL, NULL, '2023-05-29 04:50:49', '2023-05-29 04:50:49', NULL),
(26, 'contact-us', 'http://127.0.0.1:8000/', 'drt', '3453454354', 'lijojohn016@gmail.com', NULL, NULL, NULL, NULL, NULL, 'cxfgjh', NULL, NULL, '2023-05-29 04:53:01', '2023-05-29 04:53:01', NULL),
(27, 'contact-us', 'http://127.0.0.1:8000/enquiry', 'sedth', '3453454354', 'lijojohneben@gmail.com', NULL, NULL, NULL, NULL, NULL, 'shsh', NULL, NULL, '2023-05-29 04:59:30', '2023-05-29 04:59:30', NULL),
(28, 'contact-us', 'http://127.0.0.1:8000/enquiry', 'sedth', '3453454354', 'lijojohneben@gmail.com', NULL, NULL, NULL, NULL, NULL, 'shsh', NULL, NULL, '2023-05-29 05:00:10', '2023-05-29 05:00:10', NULL),
(29, 'contact-us', 'http://127.0.0.1:8000/', 'drt', '3453454354', 'lijojohn016@gmail.com', NULL, NULL, NULL, NULL, NULL, 'hsth', NULL, NULL, '2023-05-29 05:45:28', '2023-05-29 05:45:28', NULL),
(30, 'contact-us', 'http://127.0.0.1:8000/', 'hhdfh', '3453454354', 'lijojohn016@gmail.com', NULL, NULL, NULL, NULL, NULL, 'fef', NULL, NULL, '2023-06-17 06:43:31', '2023-06-17 06:43:31', NULL),
(31, 'service-detail', 'http://127.0.0.1:8000/', 'hhdfh', '3453454354', 'lijo.pentacodes@gmail.com', NULL, NULL, NULL, NULL, NULL, 'dfds', NULL, NULL, '2023-06-17 07:17:43', '2023-06-17 07:17:43', NULL),
(32, 'service-detail', 'http://127.0.0.1:8000/services-details47', 'Salesman pro', '456456546', 'salesmanpro@gmail.com', NULL, NULL, NULL, '47', NULL, 'vgjfvgj', NULL, NULL, '2023-06-17 10:47:10', '2023-06-17 10:47:10', NULL),
(33, 'service-detail', 'http://127.0.0.1:8000/certificates', 'hhdfh', '3453454354', 'lijo.pentacodes@gmail.com', NULL, NULL, NULL, '47', NULL, 'hjgj', NULL, NULL, '2023-06-19 00:59:16', '2023-06-19 00:59:16', NULL),
(34, 'service-detail', 'http://127.0.0.1:8000/blog30', 'asdfadf', '6238349119', 'lijojohneben@gmail.com', NULL, NULL, NULL, '48', NULL, 'fdsf', NULL, NULL, '2023-06-19 01:48:51', '2023-06-19 01:48:51', NULL),
(35, 'service-detail', 'http://127.0.0.1:8000/blogs', 'iuy', '6238349119', 'lijo.pentacodes@gmail.com', NULL, NULL, NULL, '47', NULL, 'uyiyui', NULL, NULL, '2023-06-19 02:04:37', '2023-06-19 02:04:37', NULL),
(36, 'service-detail', 'http://127.0.0.1:8000/blogs', 'uiti', '6238349119', 'lijojohneben@gmail.com', NULL, NULL, NULL, '48', NULL, 'ityi', NULL, NULL, '2023-06-19 02:06:24', '2023-06-19 02:06:24', NULL),
(37, 'service-detail', 'http://127.0.0.1:8000/', 'uytu', '6238349119', 'lijojohneben@gmail.com', NULL, NULL, NULL, '48', NULL, 'ertert', NULL, NULL, '2023-06-19 02:19:25', '2023-06-19 02:19:25', NULL),
(38, 'service-detail', 'http://127.0.0.1:8000/blog23', 'hgjhjgh', '6238349119', 'lijojohneben@gmail.com', NULL, NULL, NULL, '55', NULL, 'ytryryrty', NULL, NULL, '2023-06-19 06:37:48', '2023-06-19 06:37:48', NULL),
(39, 'service-detail', 'http://127.0.0.1:8000/blog23', 'ukfk', '6238349119', 'lijojohn016@gmail.com', NULL, NULL, NULL, '55', NULL, 'iyititi', NULL, NULL, '2023-06-19 06:39:31', '2023-06-19 06:39:31', NULL),
(40, 'service-detail', 'http://127.0.0.1:8000/', 'ghj', '6238349119', 'lijojohneben@gmail.com', NULL, NULL, NULL, '48', NULL, 'htrfh', NULL, NULL, '2023-06-19 06:41:59', '2023-06-19 06:41:59', NULL),
(41, 'service-detail', 'http://127.0.0.1:8000/services', 'hhdfh', '3453454354', 'lijojohn016@gmail.com', NULL, NULL, NULL, '55', NULL, 'dsg', 'tyu', '2023-06-19 08:14:01', '2023-06-19 07:55:16', '2023-06-19 08:14:01', NULL),
(42, 'service-detail', 'http://127.0.0.1:8000/', 'hhdfh', '3453454354', 'lijo.pentacodes@gmail.com', NULL, NULL, NULL, '48', NULL, 'tret', NULL, NULL, '2023-06-19 08:00:21', '2023-06-19 08:00:21', NULL),
(43, 'service-detail', 'http://127.0.0.1:8000/services-details47', 'hhdfh', '3453454354', 'lijojohn016@gmail.com', NULL, NULL, NULL, '47', NULL, 'tyju', NULL, NULL, '2023-06-19 08:02:48', '2023-06-19 08:02:48', NULL),
(44, 'service-detail', 'http://127.0.0.1:8000/contact-us', 'hhdfh', '3453454354', 'lijo.pentacodes@gmail.com', NULL, NULL, NULL, '48', NULL, 'utyu', NULL, NULL, '2023-06-19 08:36:44', '2023-06-19 08:36:44', NULL),
(45, 'enquiry_modal', 'http://127.0.0.1:8000/contact-us', 'hhdfh', '3453454354', 'lijojohn016@gmail.com', NULL, NULL, NULL, NULL, NULL, 'dasfsd', NULL, NULL, '2023-06-19 08:53:50', '2023-06-19 08:53:50', NULL),
(46, 'enquiry_modal', 'http://127.0.0.1:8000/contact-us', 'hhdfh', '3453454354', 'lijojohn016@gmail.com', NULL, NULL, NULL, NULL, NULL, 'dasfsd', NULL, NULL, '2023-06-19 08:53:59', '2023-06-19 08:53:59', NULL),
(47, 'enquiry_modal', 'http://127.0.0.1:8000/contact-us', 'new enq', '3453454354', 'lijojohn016@gmail.com', NULL, NULL, NULL, NULL, NULL, 'new enq', NULL, NULL, '2023-06-19 08:55:46', '2023-06-19 08:55:46', NULL),
(48, 'service-detail', 'http://127.0.0.1:8000/about-us', 'gds', '+971545864000', 'lijojohn016@gmail.com', NULL, NULL, NULL, '48', NULL, 'greg', NULL, NULL, '2023-06-19 09:02:56', '2023-06-19 09:02:56', NULL),
(49, 'service-detail', 'http://127.0.0.1:8000/about-us', 'Govind', '6238349119', 'lijojohn016@gmail.com', NULL, NULL, NULL, '48', NULL, 'rewr', NULL, NULL, '2023-06-19 09:03:37', '2023-06-19 09:03:37', NULL),
(50, 'service-detail', 'http://127.0.0.1:8000/about-us', 'ghd', '35345345345', 'lijojohneben@gmail.com', NULL, NULL, NULL, '47', NULL, 'tert', NULL, NULL, '2023-06-19 09:04:14', '2023-06-19 09:04:14', NULL),
(51, 'service-detail', 'http://127.0.0.1:8000/contact-us', 'hhdfh', '3453454354', 'lijojohn016@gmail.com', NULL, NULL, NULL, '47', NULL, 'fgvxcgv', NULL, NULL, '2023-06-19 09:10:58', '2023-06-19 09:10:58', NULL),
(52, 'service-detail', 'http://127.0.0.1:8000/contact-us', 'Salesman pro', '456456546', 'salesmanpro@gmail.com', NULL, NULL, NULL, '48', NULL, 'tewt', NULL, NULL, '2023-06-19 09:14:04', '2023-06-19 09:14:04', NULL),
(53, 'service-detail', 'http://127.0.0.1:8000/about-us', 'frgdfsg', '6238349119', 'lijojohn016@gmail.com', NULL, NULL, NULL, '47', NULL, 'htrsh', NULL, NULL, '2023-06-19 09:14:43', '2023-06-19 09:14:43', NULL),
(54, 'service-detail', 'http://127.0.0.1:8000/contact-us', 'Salesman pro', '456456546', 'salesmanpro@gmail.com', NULL, NULL, NULL, '55', NULL, 'sdtst', NULL, NULL, '2023-06-19 09:16:46', '2023-06-19 09:16:46', NULL),
(55, 'service-detail', 'http://127.0.0.1:8000/contact-us', 'Salesman pro', '456456546', 'salesmanpro@gmail.com', NULL, NULL, NULL, '55', NULL, 'yrty', NULL, NULL, '2023-06-19 09:17:56', '2023-06-19 09:17:56', NULL),
(56, 'service-detail', 'http://127.0.0.1:8000/contact-us', 'hhdfh', '3453454354', 'lijojohn016@gmail.com', NULL, NULL, NULL, '55', NULL, 'hdfh', NULL, NULL, '2023-06-19 09:37:40', '2023-06-19 09:37:40', NULL),
(57, 'service-detail', 'http://127.0.0.1:8000/', 'fgjhfgj', '6238349119', 'lijojohn016@gmail.com', NULL, NULL, NULL, '48', NULL, 'jdj', NULL, NULL, '2023-06-19 09:43:33', '2023-06-19 09:43:33', NULL),
(58, 'service-detail', 'http://127.0.0.1:8000/', 'fghf', '6238349119', 'lijojohn016@gmail.com', NULL, NULL, NULL, '47', NULL, 'dfjhdf', NULL, NULL, '2023-06-19 09:44:13', '2023-06-19 09:44:13', NULL),
(59, 'contact-us', 'http://127.0.0.1:8000/contact-us', 'Salesman pro', '456456546', 'salesmanpro@gmail.com', NULL, NULL, NULL, NULL, NULL, 'jgjhgj', NULL, NULL, '2023-06-19 10:01:18', '2023-06-19 10:01:18', NULL),
(60, 'service-detail', 'http://127.0.0.1:8000/contact-us', 'images', '6238349119', 'lijojohneben@gmail.com', NULL, NULL, NULL, '55', NULL, 'lig', NULL, NULL, '2023-06-19 10:26:25', '2023-06-19 10:26:25', NULL),
(61, 'service-detail', 'http://127.0.0.1:8000/service/48', 'hhdfh', '3453454354', 'lijojohn016@gmail.com', NULL, NULL, NULL, '48', NULL, 'hg', NULL, NULL, '2023-06-19 10:44:58', '2023-06-19 10:44:58', NULL),
(62, 'service-detail', 'http://127.0.0.1:8000/service/48', 'hhdfh', '3453454354', 'lijojohn016@gmail.com', NULL, NULL, NULL, '48', NULL, 'hg', NULL, NULL, '2023-06-19 10:47:26', '2023-06-19 10:47:26', NULL),
(63, 'contact-us', 'http://127.0.0.1:8000/contact-us', 'hhdfh', '3453454354', 'lijo.pentacodes@gmail.com', NULL, NULL, NULL, NULL, NULL, 'sgdg', 'njfg', '2023-06-22 23:57:15', '2023-06-22 10:27:26', '2023-06-23 11:57:15', NULL),
(64, 'service-detail', 'http://127.0.0.1:8000/service/48', 'hhdfh', '3453454354', 'lijo.pentacodes@gmail.com', NULL, NULL, NULL, '48', NULL, 'sdgdsg', NULL, NULL, '2023-06-23 10:59:58', '2023-06-23 10:59:58', NULL),
(65, 'service-detail', 'http://127.0.0.1:8000/service/48', 'hhdfh', '3453454354', 'lijo.pentacodes@gmail.com', NULL, NULL, NULL, '48', NULL, 'sdgdsg', NULL, NULL, '2023-06-23 11:10:05', '2023-06-23 11:10:05', NULL),
(66, 'service-detail', 'https://pentacodesdemo.com/mag_aircargo/blogs', 'images', '6238349119', 'lijojohn016@gmail.com', NULL, NULL, NULL, '48', NULL, 'sd', NULL, NULL, '2023-06-26 08:02:04', '2023-06-26 08:02:04', NULL),
(67, 'service-detail', 'https://pentacodesdemo.com/mag_aircargo/', 'images', '6238349119', 'lijojohn016@gmail.com', NULL, NULL, NULL, '60', NULL, 'ferf', NULL, NULL, '2023-06-27 03:30:47', '2023-06-27 03:30:47', NULL),
(68, 'service-detail', 'https://pentacodesdemo.com/mag_aircargo/service/tests', 'Govind', '2342342343', 'lijojohn016@gmail.com', NULL, NULL, NULL, '63', NULL, 'frf', NULL, NULL, '2023-06-27 03:31:34', '2023-06-27 03:31:34', NULL),
(69, 'service-detail', 'https://pentacodesdemo.com/mag_aircargo/contact-us', 'images', '6238349119', 'lijojohn016@gmail.com', NULL, NULL, NULL, '61', NULL, 'tyhtyh', NULL, NULL, '2023-06-27 08:24:14', '2023-06-27 08:24:14', NULL),
(70, 'service-detail', 'https://pentacodesdemo.com/mag_aircargo/', 'images', '6238349119', 'lijojohn016@gmail.com', NULL, NULL, NULL, '58', NULL, 'gtgth', NULL, NULL, '2023-06-27 08:27:53', '2023-06-27 08:27:53', NULL),
(71, 'service-detail', 'https://pentacodesdemo.com/mag_aircargo/', 'images', '6238349119', 'lijojohn016@gmail.com', NULL, NULL, NULL, '58', NULL, 'gtgth', NULL, NULL, '2023-06-27 08:27:53', '2023-06-27 08:27:53', NULL),
(72, 'service-detail', 'https://pentacodesdemo.com/mag_aircargo/service-enquiry', 'images', '6238349119', 'lijojohn016@gmail.com', NULL, NULL, NULL, '59', NULL, 'fdsf', NULL, NULL, '2023-06-27 08:36:34', '2023-06-27 08:36:34', NULL),
(73, 'service-detail', 'https://pentacodesdemo.com/mag_aircargo/service-enquiry', 'frgdfsg', '6238349119', 'lijojohn016@gmail.com', NULL, NULL, NULL, '60', NULL, 'cdscs', NULL, NULL, '2023-06-27 08:37:49', '2023-06-27 08:37:49', NULL),
(74, 'service-detail', 'https://pentacodesdemo.com/mag_aircargo/', 'images', '6238349119', 'lijojohn016@gmail.com', NULL, NULL, NULL, '56', NULL, 'gfggf', NULL, NULL, '2023-06-30 04:31:59', '2023-06-30 04:31:59', NULL),
(75, 'service-detail', 'https://pentacodesdemo.com/mag_aircargo/', 'images', '6238349119', 'lijojohn016@gmail.com', NULL, NULL, NULL, '56', NULL, 'gfggf', NULL, NULL, '2023-06-30 04:33:05', '2023-06-30 04:33:05', NULL),
(76, 'service-detail', 'https://pentacodesdemo.com/mag_aircargo/', 'images', '+971545864000', 'lijojohn016@gmail.com', NULL, NULL, NULL, NULL, NULL, 'efef', NULL, NULL, '2023-06-30 05:04:01', '2023-06-30 05:04:01', NULL),
(77, 'service-detail', 'https://pentacodesdemo.com/mag_aircargo/enquiry', 'Subin', '+919964024735', 'subin.pentacodesllp@gmail.com', NULL, NULL, NULL, NULL, NULL, 'Test phone +', NULL, NULL, '2023-06-30 05:38:29', '2023-06-30 05:38:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `extra_tags`
--

CREATE TABLE `extra_tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `header_tag` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `footer_tag` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body_tag` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `founder_messages`
--

CREATE TABLE `founder_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `signature_image` text COLLATE utf8mb4_unicode_ci,
  `signature_image_webp` text COLLATE utf8mb4_unicode_ci,
  `signature_image_attribute` text COLLATE utf8mb4_unicode_ci,
  `founder_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `founder_designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `founder_image` text COLLATE utf8mb4_unicode_ci,
  `founder_image_webp` text COLLATE utf8mb4_unicode_ci,
  `founder_image_attribute` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `founder_messages`
--

INSERT INTO `founder_messages` (`id`, `title`, `sub_title`, `description`, `signature_image`, `signature_image_webp`, `signature_image_attribute`, `founder_name`, `founder_designation`, `founder_image`, `founder_image_webp`, `founder_image_attribute`, `created_at`, `updated_at`) VALUES
(1, 'Going Beyond Sales', 'FOUNDER MESSAGE', '<p>I am thrilled to welcome you to Mag Air Cargo a leading air cargo, logistics, transportation, and customs brokerage services provider. Our team is dedicated to providing you with comprehensive solutions that streamline your supply chain and help you reduce costs and increase efficiency.</p>\r\n<p>At Mag Air Cargo, we understand the challenges and opportunities that come with the ever-evolving air cargo industry. That\'s why we are constantly seeking new and innovative ways to provide our customers with the best possible service.</p>\r\n<p>Whether you are looking to transport goods domestically or internationally or need help managing your inventory or supply chain, our team of experts is here to help. We are proud to offer a full range of services, including air cargo, warehousing, liner shipments, and overseas agent services, to meet all your logistics needs.</p>\r\n<p>I am confident that our commitment to quality, customer service, and innovation will make Mag Air Cargo&nbsp;your go-to source for all your air cargo and logistics needs. Our team of experts is always available to assist you in any way possible, so you can be confident that your shipment is in good hands. Thank you for considering Mag Air Cargo as your partner for all your logistics needs. We look forward to serving you and helping you achieve success in the global marketplace.</p>', NULL, NULL, 'alt=\"Egyptian Emirates\"', 'Gamil Gamal El Din', 'Founder & CEO', 'uploads/about-us/founder_image/about1687679392.jpg', 'uploads/about-us/founder_image/about1687679392.webp', 'alt=\"Egyptian Emirates\"', '2023-04-15 08:43:54', '2023-06-25 02:19:52');

-- --------------------------------------------------------

--
-- Table structure for table `group_companies`
--

CREATE TABLE `group_companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `image_webp` text COLLATE utf8mb4_unicode_ci,
  `image_attribute` text COLLATE utf8mb4_unicode_ci,
  `sort_order` int(11) NOT NULL,
  `display_to_home` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No',
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `class` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `group_companies`
--

INSERT INTO `group_companies` (`id`, `title`, `image`, `image_webp`, `image_attribute`, `sort_order`, `display_to_home`, `status`, `class`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'ONE', 'uploads/group-companies/image/group-companies1683187845.jpg', 'uploads/group-companies/image/group-companies1683187845.webp', 'alt=\"Egyptian Emirates\"', 1, 'No', 'Active', 'clientSliderOne', '2023-04-18 07:31:15', '2023-05-04 04:10:45', NULL),
(2, 'TWO', 'uploads/group-companies/image/group-companies1681817499.png', 'uploads/group-companies/image/group-companies1681817499.webp', 'alt=\"Egyptian Emirates\"', 2, 'No', 'Active', 'clientSliderTwo', '2023-04-18 07:31:39', '2023-04-28 02:52:04', NULL),
(3, 'THREE', 'uploads/group-companies/image/group-companies1681817517.png', 'uploads/group-companies/image/group-companies1681817517.webp', 'alt=\"Egyptian Emirates\"', 3, 'No', 'Active', 'clientSliderThree', '2023-04-18 07:31:57', '2023-04-18 07:31:57', NULL),
(4, 'FOUR', 'uploads/group-companies/image/group-companies1681817530.png', 'uploads/group-companies/image/group-companies1681817530.webp', 'alt=\"Egyptian Emirates\"', 4, 'No', 'Active', 'clientSliderOne', '2023-04-18 07:32:10', '2023-04-18 07:32:10', NULL),
(5, 'FIVE', 'uploads/group-companies/image/group-companies1681817543.png', 'uploads/group-companies/image/group-companies1681817543.webp', 'alt=\"Egyptian Emirates\"', 5, 'No', 'Active', 'clientSliderTwo', '2023-04-18 07:32:23', '2023-04-18 07:32:23', NULL),
(6, 'edited', 'uploads/group-companies/image/group-companies1682664772.png', 'uploads/group-companies/image/group-companies1682664772.webp', 'alt=\"Egyptian Air Cargo\"', 6, 'No', 'Active', 'clientSliderThree', '2023-04-28 02:52:52', '2023-04-28 02:53:32', '2023-04-28 02:53:32'),
(7, 'tEST', NULL, NULL, 'alt=\"Egyptian Air Cargo\"', 6, 'No', 'Active', 'clientSliderOne', '2023-04-30 07:03:40', '2023-04-30 07:03:40', '2023-05-02 05:29:13'),
(8, 'TEST', 'uploads/group-companies/image/group-companies1682925075.jpg', 'uploads/group-companies/image/group-companies1682925075.webp', 'alt=\"Egyptian Air Cargo\"', 6, 'No', 'Active', 'clientSliderTwo', '2023-05-01 01:41:15', '2023-05-01 01:42:13', '2023-05-01 01:42:13'),
(9, 'TEST', 'uploads/group-companies/image/group-companies1683180624.jpeg', 'uploads/group-companies/image/group-companies1683180624.webp', 'alt=\"Egyptian Air Cargo\"', 6, 'No', 'Active', 'clientSliderThree', '2023-05-04 02:10:24', '2023-05-04 02:11:16', '2023-05-04 02:11:16'),
(10, 'client 3', 'uploads/group-companies/image/group-companies1683533332.jpg', 'uploads/group-companies/image/group-companies1683533332.webp', 'alt=\"Egyptian Air Cargo\"', 6, 'No', 'Active', 'clientSliderOne', '2023-05-08 04:08:52', '2023-05-08 04:08:52', NULL),
(11, 'client10', 'uploads/group-companies/image/group-companies1683550186.jpg', 'uploads/group-companies/image/group-companies1683550186.webp', 'alt=\"Egyptian Air Cargo\"', 7, 'No', 'Active', 'clientSliderTwo', '2023-05-08 08:49:46', '2023-05-08 08:49:46', NULL),
(12, 'client 11', 'uploads/group-companies/image/group-companies1683550204.jpg', 'uploads/group-companies/image/group-companies1683550204.webp', 'alt=\"Egyptian Air Cargo\"', 8, 'No', 'Active', 'clientSliderThree', '2023-05-08 08:50:04', '2023-05-08 08:50:04', NULL),
(13, 'client 80', 'uploads/group-companies/image/group-companies1683550224.jpg', 'uploads/group-companies/image/group-companies1683550224.webp', 'alt=\"Egyptian Air Cargo\"', 9, 'No', 'Active', 'clientSliderOne', '2023-05-08 08:50:24', '2023-05-18 12:48:17', '2023-05-18 12:48:17'),
(14, 'client 100', 'uploads/group-companies/image/group-companies1683550248.jpg', 'uploads/group-companies/image/group-companies1683550248.webp', 'alt=\"Egyptian Air Cargo\"', 10, 'No', 'Active', 'clientSliderTwo', '2023-05-08 08:50:48', '2023-05-08 08:50:48', NULL),
(15, 'test', 'uploads/group-companies/image/group-companies1684299616.jpg', 'uploads/group-companies/image/group-companies1684299616.webp', 'alt=\"Egyptian Air Cargo\"', 11, 'No', 'Active', 'clientSliderThree', '2023-05-17 05:00:16', '2023-05-17 05:00:16', NULL),
(16, 'test', 'uploads/group-companies/image/group-companies1684299694.jpg', 'uploads/group-companies/image/group-companies1684299694.webp', 'alt=\"penta\"', 12, 'No', 'Active', 'clientSliderOne', '2023-05-17 05:01:34', '2023-05-17 05:01:34', NULL),
(17, 'Test Client 1', 'uploads/group-companies/image/group-companies1684413484.jpg', 'uploads/group-companies/image/group-companies1684413484.webp', 'alt=\"Egyptian Air Cargo\"', 1, 'No', 'Inactive', 'clientSliderThree', '2023-05-18 12:38:04', '2023-05-18 12:48:37', '2023-05-18 12:48:37');

-- --------------------------------------------------------

--
-- Table structure for table `hirings`
--

CREATE TABLE `hirings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `posted_date` date DEFAULT NULL,
  `is_open` enum('Yes','No') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Yes',
  `department` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `experience` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `additional_information` varchar(3000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort_order` int(11) NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `no_of_vac` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `urg_status` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hirings`
--

INSERT INTO `hirings` (`id`, `title`, `posted_date`, `is_open`, `department`, `location`, `experience`, `additional_information`, `sort_order`, `status`, `created_at`, `updated_at`, `deleted_at`, `no_of_vac`, `urg_status`) VALUES
(1, 'Laravel', '2023-05-15', 'Yes', 'development', 'UAE', '4', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A accusantium animi autem beatae culpa debitis delectus earum et eveniet excepturi id laborum, minima nisi porro praesentium, recusandae rem ullam vel, velit voluptatum? Commodi, ipsam tenetur!</p>\r\n<ul>\r\n<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem consequuntur dignissimos facere hic laboriosam quibusdam quo soluta veritatis vitae. Aperiam dolores, dolorum et nulla odit quibusdam ratione reiciendis unde voluptatibus.</li>\r\n<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur beatae debitis dicta eveniet iste laudantium maxime possimus quis?</li>\r\n<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid exercitationem praesentium voluptates?</li>\r\n<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci amet consequuntur, distinctio maxime minus quod sint sit voluptatem! Dolorum, necessitatibus!</li>\r\n<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A, alias, distinctio dolor ducimus exercitationem fugit ipsam labore magnam maiores mollitia porro quisquam quos tenetur veritatis.</li>\r\n</ul>', 3, 'Active', '2023-05-11 03:42:41', '2023-05-27 09:51:26', NULL, '5', 'Urgent'),
(2, 'Python Developer', '2023-05-17', 'Yes', 'test', 'Kerala', '4', '<p>nothing</p>', 2, 'Active', '2023-05-16 05:28:22', '2023-05-16 05:28:22', NULL, '1', 'Urgent'),
(3, 'gtg', '2023-05-19', 'No', 'hgg', 'ggg', '5', NULL, 3, 'Active', '2023-05-17 06:46:27', '2023-05-27 09:50:32', NULL, '55', 'Urgent'),
(4, 'Test Opening  1', '2023-05-23', 'No', 'Testing', 'Kochi', '3', '<p>test&nbsp;</p>', 4, 'Inactive', '2023-05-23 05:56:27', '2023-05-27 09:50:30', NULL, '2', 'Urgent'),
(5, 'test  2', '2023-05-22', 'Yes', 'test', 'kkd', '3', '<p>test</p>', 5, 'Active', '2023-05-23 06:01:30', '2023-05-27 09:57:03', NULL, '1', 'Onsite'),
(6, 'Test 3', '2023-05-24', 'Yes', 'test', 'mdy', '1', '<p>test</p>', 3, 'Active', '2023-05-23 06:09:38', '2023-05-27 09:51:31', NULL, '1', 'Onsite'),
(7, 'test 4', '2023-05-23', 'Yes', 'tes', 'kkd', '2', '<p>test 4</p>', 4, 'Active', '2023-05-23 06:10:32', '2023-05-27 09:54:25', NULL, '1dsrtg', 'Urgent'),
(8, 'test  7', '2023-05-24', 'Yes', 'test', 'kkm', '4', '<p>test</p>', 8, 'Active', '2023-05-23 06:20:28', '2023-05-23 06:29:38', '2023-05-23 06:29:38', '1', NULL),
(9, 'ttttt', '2023-05-16', 'Yes', 'ip', 'giup', '6', NULL, 6, 'Active', '2023-05-29 02:13:31', '2023-05-29 03:45:37', NULL, '6', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hiring_tags`
--

CREATE TABLE `hiring_tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hiring_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `home_about_us`
--

CREATE TABLE `home_about_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sub_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `short_description` text COLLATE utf8_unicode_ci,
  `description` text COLLATE utf8_unicode_ci,
  `image_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8_unicode_ci,
  `webp_image` text COLLATE utf8_unicode_ci,
  `image_attribute` text COLLATE utf8_unicode_ci,
  `alternate_image` text COLLATE utf8_unicode_ci,
  `alternate_webp_image` text COLLATE utf8_unicode_ci,
  `alternate_image_attribute` text COLLATE utf8_unicode_ci,
  `button_text` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `button_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mission_vission_image` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mission_vission_image_webp` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `mission_vission_image_attribute` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trustedby` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `home_about_us`
--

INSERT INTO `home_about_us` (`id`, `title`, `sub_title`, `short_description`, `description`, `image_title`, `image`, `webp_image`, `image_attribute`, `alternate_image`, `alternate_webp_image`, `alternate_image_attribute`, `button_text`, `button_url`, `mission_vission_image`, `mission_vission_image_webp`, `mission_vission_image_attribute`, `trustedby`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Largest Logistics Network worldwide', 'ABOUT US', '<p>Mag Air Cargo Services, is a professional Freight Forwarding Company Located in Dubai, Sharjah, UAE, &amp; Cairo, Egypt.&nbsp;</p>', '<div class=\"textWrapper\">\r\n<p>We are specialized in providing your logistics needs whether by air, sea, or both with more than 21 years of experience providing freight forwarding services in the U.A.E. and globally we ensure the smooth transportation of cargo in any form A to Z.</p>\r\n</div>', '', NULL, 'uploads/home/about/image/home-about1685185621.webp', '', 'uploads/home/about/alternate_image/home-about1687162389.png', 'uploads/home/about/alternate_image/home-about1687162389.webp', 'alt=\"Pentacodefgs\"', 'Know More', 'https://pentacodesdemo.com/mag_aircargo/contact', 'uploads/about-us/mission_vission_image/about1687162389.png', 'uploads/about-us/mission_vission_image/about1687162389.webp', 'alt=\"Pentacodes\"', '9876', '2022-12-02 00:33:41', '2023-06-25 01:52:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `home_banners`
--

CREATE TABLE `home_banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sub_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `main_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `button_txt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `button_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_webp` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_attribute` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bg_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bg_image_webp` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bg_image_attribute` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort_order` int(11) DEFAULT NULL,
  `status` enum('Active','Inactive') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `home_banners`
--

INSERT INTO `home_banners` (`id`, `sub_title`, `title1`, `main_title`, `title2`, `description`, `button_txt`, `button_url`, `image`, `image_webp`, `image_attribute`, `image_title`, `bg_image`, `bg_image_webp`, `bg_image_attribute`, `sort_order`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(7, '', 'Freight Forwarding', '', '', '', 'Explore More', 'https://pentacodesdemo.com/mag_aircargo/service/freight-forwarding', 'uploads/home/slider/image/home-slider1681721174.png', 'uploads/home/slider/image/home-slider1681721174.webp', 'alt=\"Freight Forwarding\"', '', 'uploads/home/slider/bg_image/home-slider1686978866.png', 'uploads/home/slider/bg_webp_image/home-slider1686978865.webp', '', 1, 'Active', '2023-04-17 04:46:14', '2023-06-26 09:57:43', NULL),
(8, '', 'Chartering', '', '', '', 'Explore More', 'https://pentacodesdemo.com/mag_aircargo/service/chartering', 'uploads/home/slider/image/home-slider1681722660.png', 'uploads/home/slider/image/home-slider1681722660.webp', '', '', 'uploads/home/slider/bg_image/home-slider1686978875.png', 'uploads/home/slider/bg_webp_image/home-slider1686978875.webp', '', 2, 'Active', '2023-04-17 05:11:00', '2023-06-25 01:59:21', NULL),
(9, '', 'Cargo Handling', '', '', '', 'Explore More', 'https://pentacodesdemo.com/mag_aircargo/service/cargo-handling', NULL, NULL, '', '', 'uploads/home/slider/bg_image/home-slider1686978923.png', 'uploads/home/slider/bg_webp_image/home-slider1686978923.webp', '', 3, 'Active', '2023-05-01 01:27:32', '2023-06-25 02:00:09', NULL),
(10, '', 'Digital Marketing', '', '', '', 'Market', '', NULL, NULL, '', '', 'uploads/home/slider/bg_image/home-slider1683381016.png', 'uploads/home/slider/bg_image/home-slider1683381016.webp', 'alt=\"Egyptian Air Cargo\"', NULL, 'Active', '2023-05-06 09:50:16', '2023-06-24 07:57:32', '2023-06-24 07:57:32'),
(11, '', 'test', '', '', '', 'test button', 'www.google.com', NULL, NULL, '', '', 'uploads/home/slider/bg_image/home-slider1683521146.png', 'uploads/home/slider/bg_image/home-slider1683521146.webp', 'alt=\"Egyptian Air Cargo\"', NULL, 'Active', '2023-05-08 00:45:46', '2023-06-16 06:38:53', '2023-06-16 06:38:53'),
(12, '', 'On page Seo', '', '', '', 'fef', 'www.google.com', NULL, NULL, '', '', 'uploads/home/slider/bg_image/home-slider1683710535.png', 'uploads/home/slider/bg_image/home-slider1683710535.webp', 'alt=\"Pentacodes\"', NULL, 'Active', '2023-05-10 05:22:15', '2023-06-17 01:14:38', '2023-06-17 01:14:38'),
(13, '', 'Off Page SEo', '', '', '', 'explore', 'http://127.0.0.1:8000/casestudies', NULL, NULL, '', '', 'uploads/home/slider/bg_image/home-slider1683710633.png', 'uploads/home/slider/bg_image/home-slider1683710633.webp', 'alt=\"Penta\"', NULL, 'Active', '2023-05-10 05:23:53', '2023-06-16 06:38:47', '2023-06-16 06:38:47'),
(14, '', 'Test Slider 2-1', '', '', '', 'txtbtn', 'test', NULL, NULL, '', '', 'uploads/home/slider/bg_image/home-slider1685338166.png', 'uploads/home/slider/bg_webp_image/home-slider1685338166.webp', 'alt=\"Pentacodes\"', NULL, 'Active', '2023-05-18 12:12:25', '2023-06-16 06:38:42', '2023-06-16 06:38:42');

-- --------------------------------------------------------

--
-- Table structure for table `home_footer_sections`
--

CREATE TABLE `home_footer_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci,
  `image` text COLLATE utf8mb4_unicode_ci,
  `webp_image` varchar(350) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_attribute` text COLLATE utf8mb4_unicode_ci,
  `text` text COLLATE utf8mb4_unicode_ci,
  `phone` text COLLATE utf8mb4_unicode_ci,
  `button_text` text COLLATE utf8mb4_unicode_ci,
  `button_url` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_footer_sections`
--

INSERT INTO `home_footer_sections` (`id`, `title`, `image`, `webp_image`, `image_attribute`, `text`, `phone`, `button_text`, `button_url`, `created_at`, `updated_at`) VALUES
(1, 'EASY STEPS FOR A LOGISTICS AND TRANSPORT', '/tmp/phpQjGTkf', 'uploads/home/footersec/webp_image/key-feature-image1687623004.webp', NULL, 'Call 24 * 7', '+971501599118', 'Contact Us', '/contact', '2023-06-17 08:20:52', '2023-06-24 10:40:04');

-- --------------------------------------------------------

--
-- Table structure for table `home_get_in_touches`
--

CREATE TABLE `home_get_in_touches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subtitle` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personname` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `button_url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phonenumber` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `display_to_home` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Yes',
  `image` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `webp_image` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `listone` text COLLATE utf8mb4_unicode_ci,
  `listtwo` text COLLATE utf8mb4_unicode_ci,
  `listthree` text COLLATE utf8mb4_unicode_ci,
  `listfour` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_get_in_touches`
--

INSERT INTO `home_get_in_touches` (`id`, `subtitle`, `title`, `description`, `personname`, `designation`, `button_text`, `button_url`, `phonenumber`, `display_to_home`, `image`, `webp_image`, `listone`, `listtwo`, `listthree`, `listfour`, `created_at`, `updated_at`) VALUES
(1, 'We move anything anywhere', 'We move anything anywhere', '<div class=\"small-title\">We understand the importance of reliable and efficient air cargo shipping and customs clearance services. Our team of experts is dedicated to providing exceptional customer service and ensuring that each shipment is handled with care and precision.</div>', '', '', '', '', '', 'Yes', 'uploads/imk/image/managers1687623591.png', 'uploads/imk/webp_image/managers1687623591.webp', '<h3>Focus on safety</h3>', '<h3>Real-Time Tracking</h3>', '<h3>Real-Time Tracking</h3>', '<h3>24/7 Hours Support</h3>', '2023-04-18 06:57:37', '2023-06-23 22:49:51');

-- --------------------------------------------------------

--
-- Table structure for table `home_our_services`
--

CREATE TABLE `home_our_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `short_description` text COLLATE utf8mb4_unicode_ci,
  `button_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contactperson` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `webp_image` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_attribute` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_our_services`
--

INSERT INTO `home_our_services` (`id`, `title`, `sub_title`, `description`, `short_description`, `button_text`, `button_url`, `contactperson`, `designation`, `image`, `webp_image`, `image_attribute`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'Managing Logistics For World’s Multinational Companies.', 'Safe & Reliable Cargo Solutions', '<p>Our global logistics expertise, advanced supply chain technology &amp; customized logistics solutions will help you analyze, develop and implement successful supply chain management strategies from end-to-ends.&nbsp;</p>', '', 'Explore More now', 'https://pentacodesdemo.com/mag_aircargo/services', 'Joel', 'Sales Manager', NULL, 'uploads/servicecontact//webp_image/1687623040.webp', NULL, '', '2023-04-15 03:43:54', '2023-06-24 10:40:52');

-- --------------------------------------------------------

--
-- Table structure for table `home_videos`
--

CREATE TABLE `home_videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` longtext COLLATE utf8_unicode_ci,
  `webp_image` longtext COLLATE utf8_unicode_ci,
  `image_meta_tag` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `video_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `how_we_can_helps`
--

CREATE TABLE `how_we_can_helps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `button_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_url` text COLLATE utf8mb4_unicode_ci,
  `display_to_home` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Yes',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `how_we_can_helps`
--

INSERT INTO `how_we_can_helps` (`id`, `title`, `description`, `button_text`, `button_url`, `display_to_home`, `created_at`, `updated_at`) VALUES
(1, 'How We Can Help You ?', 'EEAC can manage all of your administration and walk you through custom regulations and restrictions across the globe making sure every part of the operation goes safely as expected, without any unexpected delivery delays.', 'Our Services', 'http://www.egyptianemirates.net/services', 'Yes', '2023-04-15 03:01:17', '2023-05-03 08:27:50');

-- --------------------------------------------------------

--
-- Table structure for table `jobapplications`
--

CREATE TABLE `jobapplications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `test` text COLLATE utf8mb4_unicode_ci,
  `name` text COLLATE utf8mb4_unicode_ci,
  `email` text COLLATE utf8mb4_unicode_ci,
  `phone` text COLLATE utf8mb4_unicode_ci,
  `message` text COLLATE utf8mb4_unicode_ci,
  `resume` text COLLATE utf8mb4_unicode_ci,
  `ex` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobapplications`
--

INSERT INTO `jobapplications` (`id`, `test`, `name`, `email`, `phone`, `message`, `resume`, `ex`, `created_at`, `updated_at`) VALUES
(14, '2', 'python app test', 'lijojohn016@gmail.com', '6238349119', 'python app test desc', 'sample-2 (1) (1).pdf', NULL, '2023-05-16 05:54:50', '2023-05-16 05:54:50'),
(15, '2', 'python app test', 'lijojohn016@gmail.com', '6238349119', 'python app test desc', 'sample-2 (1) (1).pdf', NULL, '2023-05-16 05:56:30', '2023-05-16 05:56:30'),
(16, '1', NULL, NULL, NULL, NULL, 'p31000x1000.jpg', NULL, '2023-05-17 10:55:06', '2023-05-17 10:55:06'),
(17, '1', NULL, NULL, NULL, NULL, '1000x1000 Webp.webp', NULL, '2023-05-17 11:00:28', '2023-05-17 11:00:28'),
(18, '1', 'Subin', 'subin.pentacodesllp@gmail.com', '9946367521', 'Test Apply 2', 'dummy text.docx', NULL, '2023-05-17 11:01:58', '2023-05-17 11:01:58'),
(19, '7', 'Subin', 'subin.pentacodesllp@gmail.com', '4564879213', 'test 23', 'dummy text.docx', NULL, '2023-05-23 06:36:29', '2023-05-23 06:36:29'),
(20, '6', 'Subin', 'subin.pentacodesllp@gmail.com', '4564879213', 'test 23', 'dummy text.docx', NULL, '2023-05-23 06:37:08', '2023-05-23 06:37:08');

-- --------------------------------------------------------

--
-- Table structure for table `journeys`
--

CREATE TABLE `journeys` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `year` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `sort_order` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `journeys`
--

INSERT INTO `journeys` (`id`, `year`, `description`, `sort_order`, `status`, `created_at`, `updated_at`) VALUES
(3, '2015', '<p>sgdgsdgsg</p>', '2', 'Active', '2023-05-15 02:10:17', '2023-05-27 07:40:19'),
(4, '2017', '<p>fewfrrrrrrrrr</p>', '1', 'Active', '2023-05-15 02:15:08', '2023-05-27 07:40:48'),
(5, '2016', '<p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '3', 'Active', '2023-05-15 02:30:29', '2023-05-27 07:45:08');

-- --------------------------------------------------------

--
-- Table structure for table `key_features`
--

CREATE TABLE `key_features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` longtext COLLATE utf8_unicode_ci,
  `webp_image` longtext COLLATE utf8_unicode_ci,
  `image_meta_tag` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort_order` int(11) NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `key_features`
--

INSERT INTO `key_features` (`id`, `title`, `number`, `image`, `webp_image`, `image_meta_tag`, `sort_order`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Parcels Shipped Safely', '380000', 'uploads/home/key_feature/image/key-feature1687603407.png', 'uploads/home/key_feature/webp_image/key-feature1687603407.webp', NULL, 1, 'Active', '2022-12-02 09:15:47', '2023-06-24 05:14:49', NULL),
(2, 'Cities Served Worldwide', '120000', 'uploads/home/key_feature/image/key-feature1687603446.png', 'uploads/home/key_feature/webp_image/key-feature1687603446.webp', NULL, 2, 'Active', '2022-12-02 09:17:06', '2023-06-24 05:14:06', NULL),
(3, 'Satisfied Clients', '71280', 'uploads/home/key_feature/image/key-feature1687603478.png', 'uploads/home/key_feature/webp_image/key-feature1687603478.webp', NULL, 3, 'Active', '2022-12-02 09:17:48', '2023-06-24 05:14:38', NULL),
(4, 'Company We Help', '100', 'uploads/home/key_feature/image/key-feature1687603508.png', 'uploads/home/key_feature/webp_image/key-feature1687603508.webp', NULL, 4, 'Active', '2022-12-02 09:18:48', '2023-06-24 05:15:08', NULL),
(7, 'New Key Feature', '12', NULL, NULL, NULL, 5, 'Inactive', '2023-04-28 03:16:47', '2023-05-02 00:42:15', '2023-05-02 00:42:15'),
(8, 'Test key feature', '120', 'uploads/home/key_feature/image/key-feature1684471471.jpg', 'uploads/home/key_feature/webp_image/key-feature1684471471.webp', NULL, 5, 'Inactive', '2023-05-19 04:44:31', '2023-06-19 04:26:33', '2023-06-19 04:26:33'),
(9, 'Test kf 2', '123', NULL, NULL, NULL, 6, 'Inactive', '2023-05-19 04:52:03', '2023-06-19 04:26:45', '2023-06-19 04:26:45'),
(10, 'sfdh', '23', NULL, NULL, NULL, 7, 'Inactive', '2023-05-27 07:10:41', '2023-06-19 04:26:38', '2023-06-19 04:26:38'),
(11, 'sdf', '456', NULL, NULL, NULL, 8, 'Inactive', '2023-05-27 07:15:27', '2023-06-19 04:27:00', '2023-06-19 04:27:00'),
(12, 'dwf', '324', 'uploads/home/key_feature/image/key-feature1685186245.png', 'uploads/home/key_feature/webp_image/key-feature1685186245.webp', NULL, 9, 'Inactive', '2023-05-27 07:17:25', '2023-06-19 04:26:53', '2023-06-19 04:26:53'),
(13, '.jkl', '12', 'uploads/home/key_feature/image/key-feature1687619781.png', 'uploads/home/key_feature/webp_image/key-feature1687619781.webp', NULL, 5, 'Inactive', '2023-06-24 09:46:21', '2023-06-24 09:46:29', '2023-06-24 09:46:29');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `office_address` text COLLATE utf8_unicode_ci,
  `phone_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `google_map` text COLLATE utf8_unicode_ci,
  `sort_order` int(11) NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `alternate_phone_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `land_phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alternate_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `webp_image` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_attribute` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `working_hours` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `location`, `office_address`, `phone_number`, `google_map`, `sort_order`, `status`, `created_at`, `updated_at`, `deleted_at`, `alternate_phone_number`, `land_phone`, `email`, `alternate_email`, `fax`, `image`, `webp_image`, `image_attribute`, `working_hours`) VALUES
(4, 'Abhudhabi', '<p>Freight Centre Office and Warehouse No-10</p>\r\n<p>Sharjah International Airport</p>', NULL, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3607.6560217973124!2d55.350447776111544!3d25.282154228253066!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f5d02e542d279%3A0x179ca033b067810a!2sPentacodes-Website%20Development%20%26%20Digital%20Marketing%20Agency%20in%20Dubai!5e0!3m2!1sen!2sae!4v1683885840522!5m2!1sen!2sae\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade', 2, 'Active', '2023-04-28 12:02:37', '2023-06-25 03:10:42', '2023-06-25 03:10:42', '', '+971 6 558 0464', 'shj.ops@egyptianemirates.net', '', '+971 6 558 0465', 'uploads/home/lcoation/image/location1684240691.png', 'uploads/home/lcoation/image/location1684240691.webp', NULL, '<p>Monday - Friday : 8:00 AM to 5:00 PM</p>\r\n<p>Saturday - Sunday: Closed</p>'),
(5, 'DWC', '<p>Al Maktoum International Airport&nbsp;</p>', '+97148814711', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3608.3767796057564!2d55.33056551501073!3d25.25790778386794!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f5d1d0a8d4f6f%3A0x3bd3485ee8c21b28!2sEgyptian%20%26%20Emirates%20Air%20Cargo%20LLC!5e0!3m2!1sen!2sae!4v1682702561269!5m2!1sen!2sae\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade', 1, 'Active', '2023-04-28 12:07:41', '2023-06-25 03:12:49', NULL, '', '', 'eeac@egyptianemirates.net', '', '', 'uploads/home/lcoation/image/location1684240655.png', 'uploads/home/lcoation/image/location1684240654.webp', NULL, '<p>Monday - Friday : 9.30 AM to 6:30 PM</p>'),
(7, 'Jabel Ali Free Zone', '<p>Jabel Ali Free Zone&nbsp; - Dubai</p>', '+97142828950', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3608.3767796057564!2d55.33056551501073!3d25.25790778386794!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f5d1d0a8d4f6f%3A0x3bd3485ee8c21b28!2sEgyptian%20%26%20Emirates%20Air%20Cargo%20LLC!5e0!3m2!1sen!2sae!4v1686285924417!5m2!1sen!2sae', 3, 'Active', '2023-05-17 06:37:27', '2023-06-25 23:46:02', NULL, '', '', 'eeac@egyptianemirates.net', '', '', 'uploads/home/lcoation/image/location1684305447.png', 'uploads/home/lcoation/image/location1684305447.webp', NULL, '<p>Monday - Friday : 8:00 AM to 5:00 PM</p>'),
(8, 'Ernakulam', '<p>#154,2nd floor .R K tower ernakulam&nbsp;</p>', '9946320145', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3452.060325573498!2d31.377397999999992!3d30.092458599999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1458170e808b9f95%3A0x3de1ce5335056bc9!2sEgyptian%20Emirates%20Air%20cargo%20services%20Cairo%20branch!5e0!3m2!1sen!2sae!4v1682929177905!5m2!1sen!2sae\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade', 4, 'Inactive', '2023-05-22 07:19:12', '2023-06-25 02:58:35', '2023-06-25 02:58:35', '9946963891', '+91 0480 245415', 'subin.pentacodesllp@gmail.com', 'subin2@testcom', '+91495246074', 'uploads/home/lcoation/image/location1684739952.jpg', 'uploads/home/lcoation/image/location1684739952.webp', NULL, '<p>9 to 6</p>'),
(9, 'test', '<p>fdsfdsf</p>', '234', 'dsfsdf', 6, 'Inactive', '2023-05-22 07:32:27', '2023-06-25 02:58:31', '2023-06-25 02:58:31', '', '3453454354', 'lijojohneben@gmail.com', 'lijojohneben@gmail.com', '', 'uploads/home/lcoation/image/location1684740747.jpg', 'uploads/home/lcoation/image/location1684740747.webp', NULL, '<p>9 to 7</p>'),
(10, 'test 3', '<p>afdafda</p>', '12345687', 'fwefewr', 8, 'Inactive', '2023-05-22 07:33:33', '2023-06-25 02:58:17', '2023-06-25 02:58:17', '1235467', 'dsafaf', NULL, '', '7456321', NULL, NULL, NULL, '<p>1 7 dsf</p>'),
(11, 'Test 6', '<p>cdasc</p>', 'fasdfcas', 'csdc', 7, 'Active', '2023-05-22 07:35:37', '2023-05-22 07:58:01', '2023-05-22 07:58:01', 'asdsadsa', '123456', 'subingmail.com', '', '123456', 'uploads/home/lcoation/image/location1684740937.jpg', 'uploads/home/lcoation/image/location1684740937.webp', NULL, '<p>dsc</p>'),
(12, 'Test5', '<p>#2342</p>', '+678456655', 'Test', 5, 'Active', '2023-05-22 07:44:34', '2023-06-25 02:58:09', '2023-06-25 02:58:09', '+6666666', '+3453454354', 'lijo.pentacodes@gmail.com', 'lijojohn@gmail.com', '', 'uploads/home/lcoation/image/location1684741474.jpg', 'uploads/home/lcoation/image/location1684741473.webp', NULL, '<p>10. 00 to 5.00</p>');

-- --------------------------------------------------------

--
-- Table structure for table `meta_tags`
--

CREATE TABLE `meta_tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_title` text COLLATE utf8_unicode_ci NOT NULL,
  `meta_description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `meta_keyword` text COLLATE utf8_unicode_ci NOT NULL,
  `other_meta_tag` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `meta_tags`
--

INSERT INTO `meta_tags` (`id`, `page_name`, `meta_title`, `meta_description`, `meta_keyword`, `other_meta_tag`, `created_at`, `updated_at`) VALUES
(1, 'Home', 'Homeszx', 'World\'s best freight forwarding companyHomeszx', 'Cargo, Air carg in dubaiHomeszx', '', '2023-04-28 06:40:43', '2023-06-18 21:26:34'),
(2, 'Services', 'Service Titlecsacasc', 'services', 'servicesfsfas', '', '2023-05-05 05:04:09', '2023-06-18 21:26:09'),
(3, 'About', 'about', 'ger', 'gerg', '', '2023-05-10 06:56:01', '2023-05-23 09:39:31'),
(4, 'Contact', 'Contact', 'Pentacodes', 'Pentacodes', '', '2023-05-11 06:10:08', '2023-05-23 09:41:21'),
(5, 'Privacy', 'title1', 'privacy', 'privacyKeyword1', '', '2023-05-15 08:45:32', '2023-05-23 09:41:34'),
(6, 'Blog', 'blogs', 'Our blogs', 'Our blogs, recent blogs', '', '2023-05-17 05:28:14', '2023-05-23 09:39:57'),
(7, 'Testimonials', 'Testimonial', 'Pentacodes', 'Pentacodes', '', '2023-05-23 09:40:49', '2023-05-23 09:40:49'),
(8, 'Terms', 'Terms', 'Pentacodes', 'Pentacodes', '', '2023-05-23 09:42:09', '2023-05-23 09:42:09');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(11, '2022_07_08_095440_create_meta_tags_table', 1),
(12, '2022_07_08_095754_create_extra_tags_table', 1),
(17, '2022_09_19_114701_create_admins_table', 1),
(18, '2022_09_21_102547_create_about_banners_table', 1),
(19, '2022_09_21_112945_create_about_features_table', 1),
(20, '2022_09_21_124254_create_locations_table', 1),
(21, '2022_09_22_070846_create_agents_table', 1),
(22, '2022_09_22_112756_create_clients_table', 1),
(23, '2022_09_23_063503_create_hirings_table', 1),
(24, '2022_09_23_073219_create_tags_table', 1),
(25, '2022_09_23_090431_create_hiring_tags_table', 1),
(26, '2022_09_23_112028_create_photos_table', 1),
(27, '2022_09_23_123105_create_photo_galleries_table', 1),
(28, '2022_09_23_180241_create_videos_table', 1),
(29, '2022_09_25_053313_create_partner_benefits_table', 1),
(30, '2022_09_25_073312_create_home_videos_table', 1),
(31, '2022_09_25_092718_create_our_processes_table', 1),
(32, '2022_09_25_101140_create_support_services_table', 1),
(33, '2022_09_25_114358_create_programs_table', 1),
(34, '2022_09_26_050606_create_sub_services_table', 1),
(35, '2022_09_26_090321_create_service_faqs_table', 1),
(36, '2022_09_26_103556_create_countries_table', 1),
(37, '2022_09_27_065634_create_program_faqs_table', 1),
(38, '2022_09_27_084304_create_program_benefits_table', 1),
(39, '2022_09_27_092539_create_program_requirements_table', 1),
(40, '2022_09_27_095701_create_program_details_table', 1),
(41, '2022_09_28_044607_create_program_blogs_table', 1),
(42, '2022_09_30_093701_create_service_categories_table', 1),
(43, '2022_09_30_101440_addserviceandservicecategory_to_programs_table', 1),
(44, '2022_10_03_100641_addbannertitle_to_services_table', 1),
(45, '2022_10_03_133018_addimage_to_services_table', 1),
(46, '2022_10_05_082958_addallrightsreserved_to_site_information_table', 1),
(47, '2022_10_05_103030_create_newsletters_table', 1),
(49, '2022_10_05_122747_addrequesturl_to_enquiries_table', 1),
(50, '2022_10_06_013700_create_departments_table', 1),
(51, '2022_10_06_020713_renamedepartment_to_hirings_table', 1),
(52, '2022_10_06_021010_adddepartment_to_hirings_table', 1),
(53, '2022_10_06_024507_create_applications_table', 1),
(54, '2022_11_24_111751_create_text_us_partner_enquiries_table', 1),
(55, '2022_07_04_092749_create_home_banners_table', 2),
(57, '2022_07_05_091414_create_home_about_us_table', 3),
(59, '2022_09_12_093655_create_home_headings_table', 4),
(60, '2022_09_12_093655_create_headings_table', 5),
(61, '2022_12_02_084936_create_section_headings_table', 6),
(62, '2022_09_16_081956_create_key_features_table', 7),
(69, '2022_12_03_072157_create_portfolios_table', 9),
(74, '2022_07_06_042732_create_about_us_table', 11),
(80, '2022_07_05_122336_create_testimonials_table', 13),
(84, '2022_07_08_090004_create_banners_table', 15),
(88, '2022_07_08_051630_create_services_table', 17),
(90, '2022_12_07_112623_create_service_galleries_table', 18),
(91, '2022_12_03_072606_create_portfolio_galleries_table', 19),
(93, '2022_07_08_123324_create_blogs_table', 20),
(94, '2022_09_16_125211_create_site_information_table', 21),
(95, '2022_10_05_120519_create_enquiries_table', 22),
(96, '2023_04_15_063934_create_how-we-can-helps_table', 23),
(97, '2023_04_15_073845_create_home_our_services_table', 24),
(98, '2023_04_15_075222_create_associate_table', 25),
(99, '2023_04_15_114011_create_founder_messages_table', 26),
(100, '2023_04_15_125750_create_teams_table', 27),
(101, '2023_04_18_104926_create_home_get_in_touches_table', 28),
(102, '2023_04_18_110746_create_goup_companies_table', 29),
(103, '2023_04_28_083256_create_visit_links_table', 30),
(104, '2023_05_05_125550_create_quck_links_table', 31),
(105, '2023_05_08_051048_create_sliders_table', 32),
(106, '2023_05_08_111053_create_casestudies_table', 33),
(107, '2023_05_10_121339_create_casestudytypes_table', 34),
(108, '2023_05_11_071644_create_careers_table', 35),
(109, '2023_05_11_100710_create_jobapplications_table', 36),
(110, '2023_05_11_131115_create_processcommitments_table', 37),
(111, '2023_05_12_100941_create_aboutussliders_table', 38),
(112, '2023_05_13_062639_create_siteimages_table', 38),
(113, '2023_05_13_094126_create_procesesses_table', 39),
(114, '2023_05_15_053554_create_journeys_table', 40),
(115, '2023_06_17_120400_create_home_footer_sections_table', 41);

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `our_processes`
--

CREATE TABLE `our_processes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `sort_order` int(11) NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `partner_benefits`
--

CREATE TABLE `partner_benefits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` longtext COLLATE utf8_unicode_ci,
  `webp_image` longtext COLLATE utf8_unicode_ci,
  `image_meta_tag` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `sort_order` int(11) NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `htag` enum('H1','H2','H3','H4','H5','H6') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'H1',
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `short_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` longtext COLLATE utf8_unicode_ci,
  `webp_image` longtext COLLATE utf8_unicode_ci,
  `image_meta_tag` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `short_description` longtext COLLATE utf8_unicode_ci,
  `description` longtext COLLATE utf8_unicode_ci,
  `banner_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8_unicode_ci,
  `meta_keyword` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `other_meta_tag` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort_order` int(11) NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `photo_galleries`
--

CREATE TABLE `photo_galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `photo_id` int(11) NOT NULL,
  `image` longtext COLLATE utf8_unicode_ci NOT NULL,
  `image_webp` longtext COLLATE utf8_unicode_ci,
  `image_attribute` longtext COLLATE utf8_unicode_ci NOT NULL,
  `sort_order` int(11) NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `portfolios`
--

CREATE TABLE `portfolios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `short_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sub_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `posted_date` date DEFAULT NULL,
  `written_by` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` longtext COLLATE utf8_unicode_ci,
  `image_webp` longtext COLLATE utf8_unicode_ci,
  `image_attribute` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `video_url` text COLLATE utf8_unicode_ci,
  `video_thumbnail_image` longtext COLLATE utf8_unicode_ci,
  `video_thumbnail_image_webp` longtext COLLATE utf8_unicode_ci,
  `video_thumbnail_attribute` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alternate_description` longtext COLLATE utf8_unicode_ci,
  `banner_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `banner_sub_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `banner_image` longtext COLLATE utf8_unicode_ci,
  `banner_image_webp` longtext COLLATE utf8_unicode_ci,
  `banner_image_attribute` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8_unicode_ci,
  `meta_keyword` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `other_meta_tag` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `scope` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Location` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Type` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Website` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('Active','Inactive') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Active',
  `showonhome` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `portfolios`
--

INSERT INTO `portfolios` (`id`, `title`, `short_url`, `sub_title`, `posted_date`, `written_by`, `image`, `image_webp`, `image_attribute`, `description`, `video_url`, `video_thumbnail_image`, `video_thumbnail_image_webp`, `video_thumbnail_attribute`, `alternate_description`, `banner_title`, `banner_sub_title`, `banner_image`, `banner_image_webp`, `banner_image_attribute`, `meta_title`, `meta_description`, `meta_keyword`, `other_meta_tag`, `scope`, `Location`, `Type`, `Website`, `status`, `showonhome`, `created_at`, `updated_at`, `deleted_at`) VALUES
(21, 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 'lorem-ipsum-dolor-sit-amet-consectetur-adipisicing-elit', NULL, '2023-04-16', NULL, 'uploads/blog/image/blog1683548430.jpg', 'uploads/blog/image_webp/blog1683548430.webp', 'alt=\"Egyptian Air Cargo\"', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularized in the 1960s with the release of Letterset sheets containing.</p>\r\n<ul class=\"points list\">\r\n<li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard .</li>\r\n<li>Lorem Ipsum is simply dummy text of the printing</li>\r\n</ul>', '', 'uploads/blog/video_thumbnail_image/blog1681710266.jpg', 'uploads/blog/video_thumbnail_image_webp/blog1681710265.webp', 'alt=\"Egyptian Emirates\"', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>', '', '', 'uploads/blog/banner_image/blog1681710266.jpg', 'uploads/blog/banner_image_webp/blog1681710266.webp', '', 'blog', '', '', '', 'development ,test ,host', 'dubai', 'artifitial intelligence', 'www.google.com', 'Active', NULL, '2023-04-17 01:44:26', '2023-05-10 08:45:30', '2023-04-29 03:57:04'),
(22, '“PortFolio 1”', 'portfolio-1', 'tyj', '2023-04-28', NULL, 'uploads/blog/image/blog1683782817.jpg', 'uploads/blog/image_webp/blog1683782817.webp', 'alt=\"Egyptian Air Cargo\"', '<p>The agility and quick thinking of GSAs has kept cargo moving through uncertain and turbulent times. Stephen Dawkins, chief executive officer, Air Logistics Group; Zafer Aggunduz chief marketing officer, Global GSA Group; and Ingo Zimmer, CEO, ATC Aviation Services spoke to ACW about how the unsung heroes of the past year have ensured goods got from A to B.</p>\r\n<p><strong>ACW: With uncertainty surrounding capacity, routes and staff, how have GSAs had to adapt throughout the pandemic?</strong></p>\r\n<p><strong>Dawkins:</strong>&nbsp;The last year has been challenging for everyone in the industry and for GSSAs it has highlighted the requirement for us to continually evolve. Air Logistics has continued to invest during these challenging times, by adding value where we can and easing the pressure on our Airline Principals by assisting our forwarding clients with especially demanding service levels. In the current climate capacity is scarce and GSSAs need to provide high quality solutions for their forwarding clients.</p>\r\n<p>Air Logistics is focussed on enabling our teams with the right tools to realize efficiencies that enhance sales and yields for our Partners.</p>\r\n<p>The pandemic highlighted the importance of our continuous investment in our network, IT infrastructure and digitalising our processes to provide faster quotations to our client base of over 16,000 freight forwarders worldwide.</p>\r\n<p>Around the world the impact of COVID-19 was swift, Air Logistics teams had the tools &amp; systems (communications / financial / operations / business intelligence) in place to work directly from home immediately, ensuring swift and efficient communication with our Forwarding and Airline clients.</p>\r\n<p><strong>Aggunduz:</strong>&nbsp;The air cargo industry is already a fast paced industry. Everyday is different so our teams already have the experience to cope with challenges and so they are able to act fast.</p>\r\n<p>For Global, the most important thing was the safety of our people, so we took measures in each country to see what we needed to do to keep our staff safe and abide my each country&rsquo;s rules and regulations.</p>\r\n<p>Everyday was an uncertainty. We were not able to plan ahead in regard to rates and capacity. The main solution for us was to have daily communication with airlines and agents.</p>\r\n<p>When you have this kind of uncertainty, there is also a lot of opportunity that arises. We had to be creative to take advantage of opportunities.</p>\r\n<p>For example, we have a company called ChartAir Cargo. A few years ago we started this as there was a gap in the market and we try to act as a broker as we</p>\r\n<p>receive a lot of requests from the market that we cannot act on with the portfolio that we have.</p>\r\n<p><strong>Zimmer:</strong>&nbsp;As a consequence of the pandemic the capacities on passenger flights dropped significantly. In order to cater for the demand we decided to offer charter services in addition to the GSSA segment. Volker Dunkake had been appointed to head our Charter and Solutions team.</p>\r\n<p>Volker has a broad experience in the charter business and before he joined ATC he was part of the Lufthansa Cargo Charter management. At the beginning of the pandemic the focus of the new department was on pax freighter charters exporting masks, gloves and ancillary equipment from China into destinations everywhere in the world. About 100 charters had been handled to Europe, Africa and South America.</p>\r\n<p>At the same time a COVID Task force has been put together. Thomas Baumert, a veteran in the Pharma business, and his team analysed the situation, talked to the concerned stakeholders in the logistic chain and offered solutions to our customers.</p>\r\n<p>Beside pax charters the solution team started to sell unused capacities from agent charters. Our group did set-up own charter chains into the USA.</p>\r\n<p><strong>ACW: Do you think the role of the GSSA has changed during this time? Why?</strong></p>\r\n<p><strong>Dawkins:</strong>&nbsp;During the pandemic airlines have been downsizing or parking their fleets and reducing the number of flights they operate. With this reduced activity, Airlines are having to make the difficult decisions to furlough or reduce head count and as such working with an outsourced cargo provider makes sense until the market returns, we all anticipate in 2022.</p>\r\n<p>Air Logistics Group offers more than just a selling solution &ndash; it provides additional administrative &amp; back-office functions, IT &amp; business intelligence solutions, alongside experienced sales and customer service teams.</p>\r\n<p>Any or all of these services can be selected by our airlines to ensure their cargo operation runs smoothly and provides a vital revenue stream during these challenging times in our industry.</p>\r\n<p><strong>Aggunduz:</strong>&nbsp;I think going forward it will definitely change. In this period all the carriers who had offices outside their own country had difficulty complying with the differing regulations.</p>\r\n<p>As a GSA we have 20 or 30 years experience and with that comes strong relationships. We know the agents by heart and we have personal relations with them as well as knowledge and expertise of the market.</p>\r\n<p>As a GSA we have various airlines, so we were able to take advantage of the buying power we have. We were also able to support the carriers we have in their portfolio as a lot of carriers cancelled some routes but in order not to lose the business we were able to book it on other carriers.</p>\r\n<p><strong>Zimmer:</strong>&nbsp;During COVID, we changed slightly into the role of a capacity provider and were forced to offer solutions. Not only selling scheduled carriers capacities because these capacities were insufficient for the airfreight demand.</p>', '', NULL, NULL, 'alt=\"Egyptian Air Cargo\"', '', '', '', 'uploads/blog/banner_image/blog1682660815.jpg', 'uploads/blog/banner_image_webp/blog1682660815.webp', '', '', '', '', '', NULL, NULL, 'design', NULL, 'Active', 'no', '2023-04-28 01:46:55', '2023-05-26 10:17:51', NULL),
(23, 'text portfolio', 'text-portfolio', NULL, '2023-04-28', NULL, 'uploads/blog/image/blog1683548485.jpg', 'uploads/blog/image_webp/blog1683548485.webp', 'alt=\"Egyptian Air Cargo\"', '<p>The sea carries more than 80 percent of the world&rsquo;s traded goods, most of which sail inside 40-foot-long steel containers stacked by the thousands atop some of the largest vessels ever built.</p>\r\n<p>The shock of the pandemic underscored just how crucial the maritime container trade is to the global economy. From Shanghai to Rotterdam to Los Angeles, the coronavirus upended supply chains. Ports lacked workers who were home sick. Truck drivers and ship crews couldn&rsquo;t cross borders because of public health restrictions. Pent-up demand from huge stimulus programs during extended lockdowns overwhelmed the capacity of supply chains. Besides causing delays in getting goods to customers, the cost of getting them there surged.</p>\r\n<p>As the Chart of the Week shows, the result of those challenges was that the cost of shipping a container on the world&rsquo;s transoceanic trade routes increased seven-fold in the 18 months following March 2020, while the cost of shipping bulk commodities spiked even more.&nbsp;<a href=\"https://www.imf.org/en/Publications/WP/Issues/2022/03/25/Shipping-Costs-and-Inflation-515144\">Our new research shows</a>&nbsp;that the inflationary impact of those higher costs is poised to keep building through the end of this year . Our analysis predates the war in Ukraine but isn&rsquo;t isolated from it: the conflict will likely exacerbate global inflation.</p>\r\n<p>Studying data from 143 countries over the past 30 years, we find that shipping costs are an important driver of inflation around the world: when freight rates double, inflation picks up by about 0.7 percentage point. Most importantly, the effects are quite persistent, peaking after a year and lasting up to 18 months. This implies that the increase in shipping costs observed in 2021 could increase inflation by about 1.5 percentage points in 2022.</p>\r\n<p>While the pass-through to inflation is less than that associated with fuel or food prices&mdash;which account for a larger share of consumer purchases&mdash;shipping costs are much more volatile. As a result, the contribution in the variation of inflation due to global shipping price changes is quantitatively similar to the variation generated by shocks to global oil and food prices.</p>\r\n<p>Our findings also reveal some of the mechanisms at work. We show that higher shipping costs hit prices of imported goods at the dock within two months, and quickly pass through to producer prices&mdash;many of whom rely on imported inputs to manufacture their goods.</p>\r\n<p>But the impact on the prices consumers pay at the cash register builds up more gradually, hitting its peak after 12 months. This is a much slower process than what is seen after a rise in global oil prices, which drivers feel at the pump within a couple of months.</p>\r\n<p>Rising shipping costs affect inflation in some countries more than others. First, our research shows that the structural characteristics of an economy matter. Countries that import more of what they consume see larger increases in inflation, as do those who are more integrated into global supply chains. Similarly, countries that typically pay higher freight costs&mdash;landlocked countries, low-income countries, and especially island states&mdash;see more inflation when these rise.</p>\r\n<p>Second, a strong and credible monetary policy framework can play a role in mitigating the second-round effects from import prices and inflation. Our analysis shows that keeping inflation expectations well-anchored is key to containing the effect of soaring shipping costs on consumer prices, particularly core measures that exclude fuel and food.</p>\r\n<p>Our results suggest the inflationary impact of shipping costs will continue to build through the end of 2022. This will create complicated trade-offs for many central bankers facing increasing inflation and still ample slack in economic activity. Moreover, the war in Ukraine is likely to cause further disruptions to supply chains, which could keep global shipping costs&mdash;and their inflationary effects&mdash;higher for longer.</p>', 'https://youtu.be/IyBDHuOA6B4', 'uploads/blog/video_thumbnail_image/blog1683267359.jpg', 'uploads/blog/video_thumbnail_image_webp/blog1683267359.webp', 'alt=\"Egyptian Air Cargo\"', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Non curabitur gravida arcu ac tortor dignissim. Vestibulum lorem sed risus ultricies. At in tellus integer feugiat scelerisque varius morbi. Quis imperdiet massa tincidunt nunc pulvinar sapien et. Pellentesque dignissim enim sit amet venenatis urna. Urna id volutpat lacus laoreet non curabitur gravida arcu ac. Et malesuada fames ac turpis egestas maecenas pharetra convallis. Quis vel eros donec ac odio tempor orci. Viverra justo nec ultrices dui. Convallis tellus id interdum velit laoreet id donec ultrices tincidunt. Tortor at auctor urna nunc id cursus metus aliquam. Integer vitae justo eget magna fermentum iaculis. Pretium lectus quam id leo in. Quis hendrerit dolor magna eget est lorem ipsum.</p>', '', '', 'uploads/blog/banner_image/blog1682759758.jpg', 'uploads/blog/banner_image_webp/blog1682759758.webp', '', '', '', '', '', 'fdwfver', 'erverv', 'design', 'www.google.com', 'Active', 'yes', '2023-04-29 03:25:52', '2023-05-16 14:05:28', NULL),
(24, 'Size And Forecast', '-size-and-forecast', NULL, '2023-05-03', NULL, 'uploads/blog/image/blog1683549936.jpg', 'uploads/blog/image_webp/blog1683549936.webp', 'alt=\"Egyptian Air Cargo\"', '<p>Air Charter Services Market was valued at USD 25,574.6 Million in 2018 and is projected to reach<strong>&nbsp;USD 34,930.2 Million by 2026,</strong>&nbsp;growing at a&nbsp;<strong>CAGR of 4.04% from 2019 to 2026.</strong></p>\r\n<p>Major factors like time shortages, last-minute capacity, and unanticipated applications have also led to a push in the adoption of Air Charter, and hence the growth of Air Charter Services market size.&nbsp;The Global Air Charter Services Market report provides a holistic evaluation of the market. The report offers a comprehensive analysis of key segments, trends, drivers, restraints, competitive landscape, and factors that are playing a substantial role in the market.</p>\r\n<p>What is an Air Charter?</p>\r\n<p>An unscheduled flight that is not part of a regular airline routing is a charter flight. With a charter flight, one can rent an entire aircraft and can decide on the departure/arrival locations and times as per requirement. In contrast with the scheduled flights, the seats on charter flights can be sold individually through a charter company or by tour operators as a part of some travel package. Moreover, travelers can also hire an entire charter for a group (or an individual).</p>\r\n<p>The industry provides services for air transit for passengers as well as cargo over regular routes and on regular schedules. In case of this industry, the corporations and large businesses usually account for a large proportion of industry revenue as such businesses are in the capacity to use charter flights to transport staff between different work sites and to and from meetings, as well as to transport goods exclusively. Companies are more likely to use chartered flights for their staff when the corporate profit is high and economic conditions are strong.</p>\r\n<p>Global Air Charter Services Market Overview</p>\r\n<p>The growth in demand in the air cargo market is a positive prospect for air cargo providers and cargo charter operators which is expected to fuel the market for Air Charter Services over the forecast period. In recent times there has been an increasing number of shipments being delivery by air due to the growing demand by the customers for instant and timely delivery of their products. Major factors like time shortages, last-minute capacity, and unanticipated applications has also led to a push in the adoption of Air Charter, and hence the growth of Air Charter Services market size.</p>\r\n<p>Moreover, the on-demand charter jets are a growing choice of high and ultra-high net worth individuals as instead of owning jets, which can costlier to own and to maintain, high and ultra-high-net-worth individuals, are now gravitating towards private charter which is anticipated to boost the market further during the forecast period.</p>', '', NULL, NULL, 'alt=\"Egyptian Air Cargo\"', '', '', '', 'uploads/blog/banner_image/blog4321.jpg', 'uploads/blog/banner_image_webp/blog4321.webp', '', '', '', '', '', NULL, NULL, 'development', NULL, 'Active', 'yes', '2023-05-03 10:24:38', '2023-05-16 14:05:28', NULL),
(25, 'Blog 5', 'sdf', 'fsdf', '2023-05-17', NULL, 'uploads/blog/image/blog1683782785.jpg', 'uploads/blog/image_webp/blog1683782785.webp', 'alt=\"Egyptian Airgf Cargo\"', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'https://www.youtube.com/watch?v=n_uFzLPYDd8', 'uploads/blog/video_thumbnail_image/blog1683538770.jpg', 'uploads/blog/video_thumbnail_image_webp/blog1683538770.webp', 'alt=\"Egyptian Air Cargo\"', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '', '', NULL, NULL, '', '', '', '', '', 'ververv', 'rev', 'artifitial intelligence', 'erv', 'Active', 'yes', '2023-05-08 05:39:30', '2023-05-16 14:05:29', NULL),
(26, 'Pacific', 'pacific', NULL, '2023-05-09', NULL, 'uploads/blog/image/blog1683548662.jpg', 'uploads/blog/image_webp/blog1683548662.webp', 'alt=\"Egyptian Air Cargo\"', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. At erat pellentesque adipiscing commodo elit at imperdiet dui accumsan. Urna nunc id cursus metus aliquam eleifend mi in nulla. Lectus magna fringilla urna porttitor rhoncus dolor. Ipsum suspendisse ultrices gravida dictum fusce ut. Vel orci porta non pulvinar neque laoreet suspendisse interdum consectetur. Integer feugiat scelerisque varius morbi enim nunc faucibus. Diam maecenas ultricies mi eget mauris pharetra. Dictum varius duis at consectetur lorem donec massa sapien faucibus. Porttitor rhoncus dolor purus non. Elementum sagittis vitae et leo duis. Sed elementum tempus egestas sed sed risus pretium. Et netus et malesuada fames. Tellus pellentesque eu tincidunt tortor aliquam nulla. Malesuada nunc vel risus commodo viverra maecenas accumsan lacus. Ac odio tempor orci dapibus ultrices. Turpis egestas maecenas pharetra convallis. Facilisis magna etiam tempor orci eu. Eros in cursus turpis massa tincidunt. Neque sodales ut etiam sit amet nisl purus in mollis.</p>\r\n<p>In iaculis nunc sed augue lacus viverra. Id volutpat lacus laoreet non curabitur gravida arcu. Luctus venenatis lectus magna fringilla urna porttitor. Tellus molestie nunc non blandit massa enim nec. Sollicitudin ac orci phasellus egestas. Sit amet consectetur adipiscing elit ut aliquam purus sit amet. Mi proin sed libero enim sed faucibus turpis in eu. Rutrum tellus pellentesque eu tincidunt tortor aliquam nulla facilisi cras. Tincidunt dui ut ornare lectus sit amet. Rhoncus aenean vel elit scelerisque. Bibendum est ultricies integer quis auctor elit sed.</p>\r\n<p>Elementum pulvinar etiam non quam lacus suspendisse faucibus. Tristique sollicitudin nibh sit amet commodo nulla facilisi nullam. Felis imperdiet proin fermentum leo vel orci porta. Habitasse platea dictumst vestibulum rhoncus. Faucibus a pellentesque sit amet porttitor eget dolor morbi. Orci a scelerisque purus semper eget duis at tellus. Quam vulputate dignissim suspendisse in est ante. Scelerisque purus semper eget duis at tellus. Gravida cum sociis natoque penatibus et magnis dis. Purus faucibus ornare suspendisse sed nisi lacus sed. Consequat mauris nunc congue nisi vitae suscipit tellus. Nunc sed id semper risus in hendrerit gravida rutrum quisque. Feugiat pretium nibh ipsum consequat nisl vel pretium lectus quam. Mi quis hendrerit dolor magna eget. Urna molestie at elementum eu facilisis. Et ligula ullamcorper malesuada proin libero nunc consequat. Porta non pulvinar neque laoreet.</p>\r\n<p>Arcu ac tortor dignissim convallis. Integer enim neque volutpat ac tincidunt. Nulla posuere sollicitudin aliquam ultrices sagittis orci. Egestas integer eget aliquet nibh praesent tristique magna sit. In metus vulputate eu scelerisque felis. Nulla pellentesque dignissim enim sit amet venenatis urna cursus eget. Semper eget duis at tellus at. Molestie at elementum eu facilisis sed odio morbi. Vel turpis nunc eget lorem dolor. Purus viverra accumsan in nisl nisi scelerisque eu. Sit amet volutpat consequat mauris nunc. A condimentum vitae sapien pellentesque habitant. Iaculis eu non diam phasellus.</p>\r\n<p>Sodales ut eu sem integer. Scelerisque viverra mauris in aliquam. In hac habitasse platea dictumst vestibulum rhoncus est pellentesque. Fringilla urna porttitor rhoncus dolor purus non enim praesent elementum. Et netus et malesuada fames ac turpis egestas maecenas. Etiam tempor orci eu lobortis elementum. Mattis rhoncus urna neque viverra justo nec ultrices. Congue eu consequat ac felis donec et odio pellentesque. Dui id ornare arcu odio ut sem. Scelerisque varius morbi enim nunc faucibus a pellentesque sit. Pretium aenean pharetra magna ac. Adipiscing tristique risus nec feugiat in.</p>', '', NULL, NULL, 'alt=\"Egyptian Air Cargo\"', '', '', '', NULL, NULL, '', '', '', '', '', NULL, NULL, 'development', NULL, 'Active', NULL, '2023-05-08 08:24:22', '2023-05-11 04:28:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `portfolio_galleries`
--

CREATE TABLE `portfolio_galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `portfolio_id` int(11) NOT NULL,
  `image` text COLLATE utf8_unicode_ci,
  `image_webp` text COLLATE utf8_unicode_ci,
  `image_attribute` text COLLATE utf8_unicode_ci,
  `video_url` text COLLATE utf8_unicode_ci,
  `sort_order` int(11) NOT NULL,
  `display_to_home` enum('Yes','No') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No',
  `status` enum('Active','Inactive') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `portfolio_galleries`
--

INSERT INTO `portfolio_galleries` (`id`, `portfolio_id`, `image`, `image_webp`, `image_attribute`, `video_url`, `sort_order`, `display_to_home`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'uploads/portfolio/gallery/image/dubai-city-tour1670505713.png', 'uploads/portfolio/gallery/image_webp/dubai-city-tour1670505712.webp', 'alt=\"Arabian Leisure\"', NULL, 1, 'Yes', 'Active', '2022-12-08 07:51:53', '2022-12-08 07:51:59', NULL),
(2, 1, 'uploads/portfolio/gallery/image/dubai-city-tour1670505713_1.png', 'uploads/portfolio/gallery/image_webp/dubai-city-tour1670505713.webp', 'alt=\"Arabian Leisure\"', NULL, 3, 'Yes', 'Active', '2022-12-08 07:51:53', '2022-12-08 07:52:06', NULL),
(3, 1, 'uploads/portfolio/gallery/image/dubai-city-tour1670505713_2.png', 'uploads/portfolio/gallery/image_webp/dubai-city-tour1670505713_1.webp', 'alt=\"Arabian Leisure\"', NULL, 3, 'No', 'Active', '2022-12-08 07:51:53', '2022-12-08 07:51:53', NULL),
(4, 3, 'uploads/portfolio/gallery/image/trio-deiras1670505786.png', 'uploads/portfolio/gallery/image_webp/trio-deiras1670505786.webp', 'alt=\"Arabian Leisure\"', NULL, 2, 'Yes', 'Active', '2022-12-08 07:53:06', '2022-12-08 07:53:19', NULL),
(5, 3, 'uploads/portfolio/gallery/image/trio-deiras1670505786_1.png', 'uploads/portfolio/gallery/image_webp/trio-deiras1670505786_1.webp', 'alt=\"Arabian Leisure\"', NULL, 4, 'Yes', 'Active', '2022-12-08 07:53:06', '2022-12-08 07:53:27', NULL),
(6, 2, 'uploads/portfolio/gallery/image/desert-safari1670505820.png', 'uploads/portfolio/gallery/image_webp/desert-safari1670505820.webp', 'alt=\"Arabian Leisure\"', NULL, 5, 'No', 'Active', '2022-12-08 07:53:40', '2022-12-08 07:57:00', NULL),
(7, 2, 'uploads/portfolio/gallery/image/desert-safari1670505820_1.png', 'uploads/portfolio/gallery/image_webp/desert-safari1670505820_1.webp', 'alt=\"Arabian Leisure\"', NULL, 5, 'Yes', 'Active', '2022-12-08 07:53:40', '2022-12-09 00:15:54', NULL),
(8, 4, 'uploads/portfolio/gallery/image/dhow-cruise1670505864.png', 'uploads/portfolio/gallery/image_webp/dhow-cruise1670505864.webp', 'alt=\"Arabian Leisure\"', NULL, 7, 'Yes', 'Active', '2022-12-08 07:54:24', '2022-12-08 07:54:37', NULL),
(9, 4, 'uploads/portfolio/gallery/image/dhow-cruise1670505864_1.png', 'uploads/portfolio/gallery/image_webp/dhow-cruise1670505864_1.webp', 'alt=\"Arabian Leisure\"', 'https://www.youtube.com/watch?v=zuipS8jvV5Q', 6, 'Yes', 'Active', '2022-12-08 07:54:24', '2022-12-08 07:58:06', NULL),
(10, 5, 'uploads/portfolio/gallery/image/dubai-city-tour1670505713_2.png', 'uploads/portfolio/gallery/image_webp/dubai-city-tour1670505713_1.webp', 'alt=\"Arabian Leisure\"', NULL, 1, 'No', 'Active', '2022-12-08 07:51:53', '2022-12-08 07:51:53', NULL),
(11, 6, 'uploads/portfolio/gallery/image/desert-safari1670505820_1.png', 'uploads/portfolio/gallery/image_webp/desert-safari1670505820_1.webp', 'alt=\"Arabian Leisure\"', NULL, 1, 'No', 'Active', '2022-12-08 07:53:40', '2022-12-08 07:57:05', NULL),
(12, 5, 'uploads/portfolio/gallery/image/dhow-cruise1670505864.png', 'uploads/portfolio/gallery/image_webp/dhow-cruise1670505864.webp', 'alt=\"Arabian Leisure\"', NULL, 2, 'No', 'Active', '2022-12-08 07:54:24', '2022-12-08 07:54:37', NULL),
(13, 6, 'uploads/portfolio/gallery/image/dhow-cruise1670505864_1.png', 'uploads/portfolio/gallery/image_webp/dhow-cruise1670505864_1.webp', 'alt=\"Arabian Leisure\"', 'https://www.youtube.com/watch?v=zuipS8jvV5Q', 2, 'No', 'Active', '2022-12-08 07:54:24', '2022-12-08 07:58:06', NULL),
(14, 7, 'uploads/portfolio/gallery/image/dubai-city-tour1670564823.png', 'uploads/portfolio/gallery/image_webp/dubai-city-tour1670564823.webp', 'alt=\"Arabian Leisure\"', NULL, 4, 'No', 'Active', '2022-12-09 00:17:03', '2022-12-09 00:17:03', NULL),
(15, 8, 'uploads/portfolio/gallery/image/dubai-city-tour1670564823_1.png', 'uploads/portfolio/gallery/image_webp/dubai-city-tour1670564823_1.webp', 'alt=\"Arabian Leisure\"', NULL, 5, 'No', 'Active', '2022-12-09 00:17:03', '2022-12-09 00:17:03', NULL),
(16, 8, 'uploads/portfolio/gallery/image/dubai-city-tour1670564858.png', 'uploads/portfolio/gallery/image_webp/dubai-city-tour1670564857.webp', 'alt=\"Arabian Leisure\"', NULL, 6, 'No', 'Active', '2022-12-09 00:17:38', '2022-12-09 00:17:38', NULL),
(17, 9, 'uploads/portfolio/gallery/image/dubai-city-tour1670564870.png', 'uploads/portfolio/gallery/image_webp/dubai-city-tour1670564870.webp', 'alt=\"Arabian Leisure\"', NULL, 7, 'No', 'Active', '2022-12-09 00:17:50', '2022-12-09 00:17:50', NULL),
(18, 10, 'uploads/portfolio/gallery/image/desert-safari1670505820.png', 'uploads/portfolio/gallery/image_webp/desert-safari1670505820.webp', 'alt=\"Arabian Leisure\"', NULL, 5, 'No', 'Active', '2022-12-08 07:53:40', '2022-12-08 07:57:00', NULL),
(19, 11, 'uploads/portfolio/gallery/image/dubai-city-tour1670505713_2.png', 'uploads/portfolio/gallery/image_webp/dubai-city-tour1670505713_1.webp', 'alt=\"Arabian Leisure\"', NULL, 1, 'No', 'Active', '2022-12-08 07:51:53', '2022-12-08 07:51:53', NULL),
(20, 11, 'uploads/portfolio/gallery/image/dhow-cruise1670505864_1.png', 'uploads/portfolio/gallery/image_webp/dhow-cruise1670505864_1.webp', 'alt=\"Arabian Leisure\"', 'https://www.youtube.com/watch?v=zuipS8jvV5Q', 2, 'No', 'Active', '2022-12-08 07:54:24', '2022-12-08 07:58:06', NULL),
(21, 12, 'uploads/portfolio/gallery/image/dubai-city-tour1670564858.png', 'uploads/portfolio/gallery/image_webp/dubai-city-tour1670564857.webp', 'alt=\"Arabian Leisure\"', NULL, 6, 'No', 'Active', '2022-12-09 00:17:38', '2022-12-09 00:17:38', NULL),
(22, 13, 'uploads/portfolio/gallery/image/dhow-cruise1670505864_1.png', 'uploads/portfolio/gallery/image_webp/dhow-cruise1670505864_1.webp', 'alt=\"Arabian Leisure\"', 'https://www.youtube.com/watch?v=zuipS8jvV5Q', 2, 'No', 'Active', '2022-12-08 07:54:24', '2022-12-08 07:58:06', NULL),
(23, 13, 'uploads/portfolio/gallery/image/dubai-city-tour1670564823.png', 'uploads/portfolio/gallery/image_webp/dubai-city-tour1670564823.webp', 'alt=\"Arabian Leisure\"', NULL, 4, 'No', 'Active', '2022-12-09 00:17:03', '2022-12-09 00:17:03', NULL),
(24, 18, 'uploads/portfolio/gallery/image/dubai-city-tour1670564823_1.png', 'uploads/portfolio/gallery/image_webp/dubai-city-tour1670564823_1.webp', 'alt=\"Arabian Leisure\"', NULL, 5, 'No', 'Active', '2022-12-09 00:17:03', '2022-12-09 00:17:03', NULL),
(25, 17, 'uploads/portfolio/gallery/image/dubai-city-tour1670564858.png', 'uploads/portfolio/gallery/image_webp/dubai-city-tour1670564857.webp', 'alt=\"Arabian Leisure\"', NULL, 1, 'No', 'Active', '2022-12-09 00:17:38', '2022-12-09 00:17:38', NULL),
(26, 16, 'uploads/portfolio/gallery/image/dubai-city-tour1670564870.png', 'uploads/portfolio/gallery/image_webp/dubai-city-tour1670564870.webp', 'alt=\"Arabian Leisure\"', NULL, 1, 'No', 'Active', '2022-12-09 00:17:50', '2022-12-09 00:17:50', NULL),
(27, 16, 'uploads/portfolio/gallery/image/desert-safari1670505820.png', 'uploads/portfolio/gallery/image_webp/desert-safari1670505820.webp', 'alt=\"Arabian Leisure\"', NULL, 5, 'No', 'Active', '2022-12-08 07:53:40', '2022-12-08 07:57:00', NULL),
(28, 14, 'uploads/portfolio/gallery/image/dubai-city-tour1670505713_2.png', 'uploads/portfolio/gallery/image_webp/dubai-city-tour1670505713_1.webp', 'alt=\"Arabian Leisure\"', NULL, 1, 'No', 'Active', '2022-12-08 07:51:53', '2022-12-08 07:51:53', NULL),
(29, 15, 'uploads/portfolio/gallery/image/dhow-cruise1670505864_1.png', 'uploads/portfolio/gallery/image_webp/dhow-cruise1670505864_1.webp', 'alt=\"Arabian Leisure\"', 'https://www.youtube.com/watch?v=zuipS8jvV5Q', 2, 'No', 'Active', '2022-12-08 07:54:24', '2022-12-08 07:58:06', NULL),
(30, 13, 'uploads/portfolio/gallery/image/dubai-city-tour1670564858.png', 'uploads/portfolio/gallery/image_webp/dubai-city-tour1670564857.webp', 'alt=\"Arabian Leisure\"', NULL, 6, 'No', 'Active', '2022-12-09 00:17:38', '2022-12-09 00:17:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `procesesses`
--

CREATE TABLE `procesesses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `sort_order` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `procesesses`
--

INSERT INTO `procesesses` (`id`, `title`, `description`, `sort_order`, `status`, `created_at`, `updated_at`) VALUES
(7, 'CLIENT FEEDBACK', '<div class=\"textWrapper\">\r\n<p>Client&nbsp; feedback is important. We never overlook client feedback, and consider every single feedback that is more important to achieve client goals in each developing phase of design. Ta king client feedback allows us to complete the job in a fulfilling and rewarding manner.</p>\r\n</div>', '2', NULL, '2023-05-13 07:12:47', '2023-05-17 06:45:51'),
(8, 'UNDERSTAND THE BRAND', '<h5><span style=\"font-size: 14px;\">Crafting a design without aim is useless. We go into designing by thoroughly understanding your brand goals and the impulse of its customers. Our graphic design services in UAE rely on brand knowledge that makes your brand exclusively familiar, remarkable, and widely viewed.</span></h5>\r\n<div class=\"textWrapper\">\r\n<ul>\r\n<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad culpa ex natus officiis repudiandae ullam?</li>\r\n</ul>\r\n</div>', '1', NULL, '2023-05-13 07:14:41', '2023-05-17 06:45:46');

-- --------------------------------------------------------

--
-- Table structure for table `processcommitments`
--

CREATE TABLE `processcommitments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sub_heading` text COLLATE utf8mb4_unicode_ci,
  `heading` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `short_description` text COLLATE utf8mb4_unicode_ci,
  `type` text COLLATE utf8mb4_unicode_ci,
  `ex` text COLLATE utf8mb4_unicode_ci,
  `webp_image` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image_attribute` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_title` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `processcommitments`
--

INSERT INTO `processcommitments` (`id`, `sub_heading`, `heading`, `description`, `short_description`, `type`, `ex`, `webp_image`, `image`, `created_at`, `updated_at`, `image_attribute`, `image_title`) VALUES
(1, 'Lorem Ipsum', 'OUR COMMITMENTS & GUARANTEE', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip</p>', '<div class=\"textWrapper\">\r\n<h5 class=\"mainDescription\">The process we follow for reaping the best benefits from social media marketing will involve Customer Analysis, Brainstorming, Implementation, and Promotion.vdsv</h5>\r\n</div>', 'commitments', NULL, 'uploads/commitments/image/commitments1684304146.webp', 'uploads/commitments/image/commitments1684304146.png', '2023-05-11 10:00:49', '2023-05-17 06:15:46', 'alt=\"Egyptian Air Cargo\"gf', 'gd'),
(2, 'gds', 'sdg', '<p>sdg</p>', '<p>sdg sg</p>', 'commitments', NULL, 'uploads/commitments/image/commitments1683867665.webp', 'uploads/commitments/image/commitments1683867665.jpg', '2023-05-12 01:01:05', '2023-05-12 01:01:05', 'alt=\"Egyptian Air Cargo\"', ''),
(3, 'OUR PROCESS', 'Lorem Ipsum', '<p>&nbsp; &nbsp;cfjjlvl yti&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ujp[;u</p>', '<p>tst lorem ipsum</p>', 'process', NULL, 'uploads/commitments/image/commitments1684304090.webp', 'uploads/commitments/image/commitments1684304091.png', '2023-05-12 01:59:25', '2023-05-29 00:36:48', 'dxtysy', 'Test image');

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `program_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `short_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `service_id` int(11) NOT NULL,
  `service_category_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `start_cost` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `list_description` longtext COLLATE utf8_unicode_ci,
  `program_description` longtext COLLATE utf8_unicode_ci,
  `about_program_description` longtext COLLATE utf8_unicode_ci,
  `program_image` longtext COLLATE utf8_unicode_ci,
  `program_webp_image` longtext COLLATE utf8_unicode_ci,
  `program_image_meta_tag` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` longtext COLLATE utf8_unicode_ci,
  `webp_image` longtext COLLATE utf8_unicode_ci,
  `image_meta_tag` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `first_minimum_investment_value` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `first_minimum_investment_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `second_minimum_investment_value` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `second_minimum_investment_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `time_to_citizenship_value` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `time_to_citizenship_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `visa_free_access_value` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `visa_free_access_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `brochure` longtext COLLATE utf8_unicode_ci,
  `banner_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8_unicode_ci,
  `meta_keyword` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `other_meta_tag` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort_order` int(11) NOT NULL,
  `top_tier` enum('Yes','No') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No',
  `status` enum('Active','Inactive') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `program_benefits`
--

CREATE TABLE `program_benefits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `program_id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `sort_order` int(11) NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `program_blogs`
--

CREATE TABLE `program_blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `program_id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `program_details`
--

CREATE TABLE `program_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `program_id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `status` enum('Active','Inactive') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `program_faqs`
--

CREATE TABLE `program_faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `program_id` int(11) NOT NULL,
  `question` text COLLATE utf8_unicode_ci NOT NULL,
  `answer` text COLLATE utf8_unicode_ci,
  `sort_order` int(11) NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `program_requirements`
--

CREATE TABLE `program_requirements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `program_id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `sort_order` int(11) NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quck_links`
--

CREATE TABLE `quck_links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` text COLLATE utf8mb4_unicode_ci,
  `sort_order` int(11) NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quck_links`
--

INSERT INTO `quck_links` (`id`, `title`, `url`, `sort_order`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Home', '/home', 1, 'Active', '2023-05-06 00:49:03', '2023-05-10 04:21:40', NULL),
(2, 'Hosting Solutions', 'www.youtube.com', 2, 'Active', '2023-05-10 04:20:51', '2023-05-10 04:20:51', NULL),
(3, 'blogs', '/blogs', 3, 'Active', '2023-05-10 04:22:12', '2023-05-10 04:22:12', NULL),
(4, 'web support', 'www.google.com', 4, 'Active', '2023-05-10 04:22:33', '2023-05-23 05:57:44', NULL),
(5, 'Search Engine Optimisation', 'http://127.0.0.1:8000/services-details49', 5, 'Active', '2023-05-10 04:23:05', '2023-05-10 04:23:05', NULL),
(6, 'media', 'sdv', 6, 'Active', '2023-05-10 08:22:41', '2023-05-10 08:23:53', '2023-05-10 08:23:53'),
(7, 'Test Quick link 1', 'test/link1', 6, 'Active', '2023-05-23 05:52:25', '2023-05-23 05:57:49', NULL),
(8, 'vdzc', 'czc', 7, 'Active', '2023-05-23 05:58:19', '2023-05-23 05:58:31', '2023-05-23 05:58:31');

-- --------------------------------------------------------

--
-- Table structure for table `section_headings`
--

CREATE TABLE `section_headings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sub_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `image` text COLLATE utf8_unicode_ci,
  `webp_image` text COLLATE utf8_unicode_ci,
  `image_attribute` text COLLATE utf8_unicode_ci,
  `button_text` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `button_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `buttontwo_text` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `buttontwo_url` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `section_headings`
--

INSERT INTO `section_headings` (`id`, `type`, `title1`, `title2`, `sub_title`, `description`, `image`, `webp_image`, `image_attribute`, `button_text`, `button_url`, `buttontwo_text`, `buttontwo_url`, `created_at`, `updated_at`, `deleted_at`) VALUES
(6, 'testimonial', 'Individually Assess Each Plan And Offer Optimal Solutions!', NULL, 'WHAT OUR CLIENTS SAY!', NULL, 'uploads/heading/testimonial/image/testimonial1684474098.jpg', 'uploads/heading/testimonial/webp_image/testimonial1684474097.webp', NULL, NULL, NULL, NULL, NULL, '2022-12-06 08:39:40', '2023-06-24 05:41:45', NULL),
(7, 'Blogs', 'News & Articles', NULL, 'OUR NEWS', '<p>More information is always better than less.&nbsp;</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-08 04:10:20', '2023-06-25 02:51:31', NULL),
(11, 'home_key_feature', 'World’s Leading Companies For Over 80 Years.', NULL, 'LETS COUNT', '<p>A big opportunity for your business growth. Delivering Results for Industry Leaders. We are proud of our work for and have worked hard.</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-25 01:52:42', NULL),
(17, 'Contact', 'Don\'t Hesitate Contact With Us and Solve Your Problem', NULL, 'CONTACT US', '<p>Our team of experts is dedicated to providing exceptional customer service and ensuring that each shipment is handled with care and precision.</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-25 02:54:04', NULL),
(24, 'Service', 'Our  Services', NULL, 'Services', '<p>Our global logistics expertise, advanced supply chain technology &amp; customized logistics solutions will help you analyze, develop and implement successful supply chain management strategies from end-to-ends.&nbsp;</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-26 12:00:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sub_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `short_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `banner_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `banner_sub_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `banner_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `banner_image_webp` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `banner_image_attribute` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `short_description` longtext COLLATE utf8_unicode_ci,
  `description` longtext COLLATE utf8_unicode_ci,
  `alternate_short_description` longtext COLLATE utf8_unicode_ci,
  `alternate_description` longtext COLLATE utf8_unicode_ci,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_webp` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_attribute` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alternate_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alternate_image_webp` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alternate_image_attribute` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `list_image` text COLLATE utf8_unicode_ci,
  `list_image_webp` text COLLATE utf8_unicode_ci,
  `list_image_attribute` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `menu_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `menu_image_webp` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `menu_image_attribute` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_title` longtext COLLATE utf8_unicode_ci,
  `meta_description` longtext COLLATE utf8_unicode_ci,
  `meta_keyword` longtext COLLATE utf8_unicode_ci,
  `other_meta_tag` longtext COLLATE utf8_unicode_ci,
  `sort_order` int(11) NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `parent_id`, `title`, `sub_title`, `short_url`, `banner_title`, `banner_sub_title`, `banner_image`, `banner_image_webp`, `banner_image_attribute`, `short_description`, `description`, `alternate_short_description`, `alternate_description`, `image`, `image_webp`, `image_attribute`, `alternate_image`, `alternate_image_webp`, `alternate_image_attribute`, `list_image`, `list_image_webp`, `list_image_attribute`, `menu_image`, `menu_image_webp`, `menu_image_attribute`, `meta_title`, `meta_description`, `meta_keyword`, `other_meta_tag`, `sort_order`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(41, NULL, 'Digital Marketing', NULL, 'Digital Marketing', '', NULL, 'uploads/service/banner/service1682777923.jpg', 'uploads/service/banner/service1682777922.webp', '', '<p>Liner shipments refer to the transportation of goods by ocean carriers on a regular, scheduled basis between fixed ports or regions. This type of shipping is also known as container shipping, as cargo is typically transported in standardized shipping containers.</p>\r\n<p>Liner shipping companies operate large container ships that carry a wide variety of goods, from raw materials and manufactured goods to perishable items and consumer products. These ships follow fixed routes and schedules, with regular departures from major ports around the world.</p>\r\n<p>&nbsp;</p>', '<p>We offer liner shipment services for your cargo, whether you need to transport goods domestically or internationally.</p>\r\n<p>with a wide range network of connections worldwide.. we can secure your cargo from /to anywhere globally.&nbsp;</p>\r\n<p><strong>WCA - AWS -CLN - IATA- NAFL - FIATA&nbsp;</strong></p>\r\n<p>Our liner shipment solutions are designed to provide you with the speed and reliability you need to succeed in today\'s fast-paced business environment.</p>', NULL, '', 'uploads/service/image/service1683110476.jpg', 'uploads/service/image/service1683110476.webp', 'alt=\"Egyptian Air Cargo\"', NULL, NULL, 'alt=\"Egyptian Air Cargo\"', 'uploads/service/list/service-list1682777923.jpg', 'uploads/service/list/service-list1682777923.webp', '', NULL, NULL, NULL, '', '', '', '', 4, 'Active', '2023-04-29 08:48:43', '2023-05-26 06:39:50', '2023-05-26 06:39:50'),
(42, NULL, 'Machine Learning', NULL, 'Artificial Intelligence', '', NULL, 'uploads/service/banner/service1682937143.jpg', 'uploads/service/banner/service1682937143.webp', '', '<p>Our freight forwarding service ensures the safe and timely delivery of your goods to their final destination. We handle all aspects of the shipping process, including documentation, customs clearance, and transportation. <br />Freight forwarding is a logistics service that involves the transportation of goods from one location to another, using a variety of modes of transportation such as air, sea, or land. Freight forwarding solutions are designed to provide a comprehensive and efficient logistics service to clients who need to transport goods across different regions or countries.</p>\r\n<p>Freight forwarding companies are responsible for managing the entire logistics process, including the arrangement of transportation, documentation, customs clearance, and delivery of the goods to their final destination. This allows clients to focus on their core business activities, while leaving the logistics to the experts.</p>\r\n<p>A key benefit of freight forwarding solutions is that they provide clients with a single point of contact for all their logistics needs. Freight forwarders act as intermediaries between the client and the carriers, coordinating all aspects of the transportation process to ensure that the goods are delivered on time and in good condition.</p>', '<p><strong>Freight forwarding</strong> solutions can also provide clients with cost-effective shipping options. Freight forwarders have established relationships with carriers and can negotiate better rates for their clients, based on the volume of shipments they handle.</p>\r\n<p>Another benefit of freight forwarding solutions is that they provide clients with access to a range of value-added services. These can include cargo insurance, warehousing, and distribution services, which can help to streamline the logistics process and reduce the overall cost of transportation.</p>\r\n<p>Overall, the vision of freight forwarding solutions is to provide clients with a comprehensive, efficient, and cost-effective logistics service that meets their specific transportation needs. By leveraging the expertise of freight forwarders, clients can ensure that their goods are transported safely, efficiently, and on time, allowing them to focus on growing their business.</p>', NULL, '', 'uploads/service/image/service1683110566.jpg', 'uploads/service/image/service1683110566.webp', 'alt=\"Egyptian Air Cargo\"', NULL, NULL, 'alt=\"Egyptian Air Cargo\"', 'uploads/service/list/service-list1682937144.jpg', 'uploads/service/list/service-list1682937144.webp', '', NULL, NULL, NULL, '', '', '', '', 3, 'Active', '2023-05-01 05:02:24', '2023-06-16 06:52:17', '2023-06-16 06:52:17'),
(44, NULL, 'Web Development', NULL, 'Web Development', '', NULL, 'uploads/service/banner/service1682938762.jpg', 'uploads/service/banner/service1682938762.webp', '', '<p><strong>Customs clearance</strong> is an essential part of the logistics process that involves the submission and verification of documentation to ensure that goods can be legally imported or exported across international borders. The customs clearance process is governed by the laws and regulations of the countries involved, and it is essential for ensuring that goods are transported in a safe, legal, and compliant manner.</p>\r\n<p>The customs clearance process typically involves several steps, including the submission of the necessary documentation to the customs authorities, such as invoices, bills of lading, and packing lists. The customs authorities will then review the documentation to ensure that it is complete and accurate, and that the goods being transported comply with all relevant regulations and laws.</p>', '<p>Once the documentation has been verified, the customs authorities will either release the goods for shipment or request additional information or inspections if there are any concerns about the goods. Customs clearance can be a complex and time-consuming process, particularly for goods that are subject to additional regulations, such as hazardous materials or food products.</p>\r\n<p>At our company, we provide custom clearance services to ensure that your goods are transported safely, legally, and in compliance with all relevant regulations and laws. We have extensive experience in navigating the customs clearance process, and we work closely with our clients to ensure that all documentation is complete and accurate, and that any potential issues are addressed in a timely and efficient manner.</p>\r\n<p>By entrusting us with your custom clearance needs, you can focus on your core business activities, while we handle the logistics of importing or exporting your goods across international borders. Our goal is to ensure that your goods are transported safely, efficiently, and in compliance with all relevant regulations and laws, so that you can achieve your logistics objectives with confidence.</p>', NULL, '', 'uploads/service/image/service1683614757.png', 'uploads/service/image/service1683614757.webp', 'alt=\"Egyptian Air Cargo\"', 'uploads/service/alternate/service1683614758.jpg', 'uploads/service/alternate/service1683614757.webp', 'alt=\"Egyptian Air Cargo\"', 'uploads/service/list/service-list1682938763.jpg', 'uploads/service/list/service-list1682938763.webp', '', NULL, NULL, NULL, '', '', '', '', 5, 'Active', '2023-05-01 05:29:23', '2023-06-16 06:52:40', '2023-06-16 06:52:40'),
(45, NULL, 'Mobile App Development', NULL, 'mobile-app-development', '', NULL, 'uploads/service/banner/service1682939253.jpg', 'uploads/service/banner/service1682939253.webp', '', '<p><strong>Cargo consolidation</strong> is a logistics service that involves the consolidation of multiple smaller shipments into a larger shipment, which is then transported to its destination using a shared transportation mode. This can be an efficient and cost-effective way to transport smaller quantities of goods that may not be cost-effective to transport on their own.</p>\r\n<p>Cargo consolidation involves the grouping of smaller shipments into larger ones, which are then transported together on a shared basis. This can help to reduce transportation costs by making use of the available space more efficiently, and by reducing the number of individual shipments that need to be transported.</p>', '<p>It gives users a new visual experience that influences their awareness. These visuals can be business logos, posters, website layouts, infographics, user interfaces (UI) and the list goes on. The role of the graphical element is indescribable in this digital age, it turns out to be crucial that companies use to promote products, use in websites to convey information, and to develop an identity in business and so.</p>', NULL, '', 'uploads/service/image/service1683614587.png', 'uploads/service/image/service1683614586.webp', 'alt=\"Egyptian Air Cargo\"', 'uploads/service/alternate/service1683614587.jpg', 'uploads/service/alternate/service1683614587.webp', 'alt=\"Egyptian Air Cargo\"', 'uploads/service/list/service-list1682939253.jpg', 'uploads/service/list/service-list1682939253.webp', '', NULL, NULL, NULL, 'Cargo consolidation', '', '', '', 1, 'Active', '2023-05-01 05:37:34', '2023-06-16 06:52:36', '2023-06-16 06:52:36'),
(46, NULL, 'Graphic Design', NULL, 'Web Development', '', NULL, NULL, NULL, '', '<p>It gives users a new visual experience that influences their awareness. These visuals can be business logos, posters, website layouts, infographics, user interfaces (UI) and the list goes on. The role of the graphical element is indescribable in this digital age, it turns out to be crucial that companies use to promote products, use in websites to convey information, and to develop an identity in business and so.</p>', '<p>It gives users a new visual experience that influences their awareness. These visuals can be business logos, posters, website layouts, infographics, user interfaces (UI) and the list goes on. The role of the graphical element is indescribable in this digital age, it turns out to be crucial that companies use to promote products, use in websites to convey information, and to develop an identity in business and so.</p>', NULL, '', 'uploads/service/image/service1683616976.png', 'uploads/service/webp_image/service1683616976.webp', 'alt=\"Egyptian Air Cargo\"', 'uploads/service/alternate/image/service1683616977.jpg', 'uploads/service/alternate/webp_image/service1683616976.webp', 'alt=\"Egyptian Air Cargo\"', NULL, NULL, '', NULL, NULL, NULL, '', '', '', '', 2, 'Active', '2023-05-09 03:22:57', '2023-06-16 06:52:31', '2023-06-16 06:52:31'),
(47, NULL, 'Cargo Handling', NULL, 'cargo-handling', '', NULL, NULL, NULL, '', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>', NULL, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'uploads/service/image/service1686914507.png', 'uploads/service/image/service1686914507.webp', 'alt=\"Mag Air Cargo\"', 'uploads/service/alternate/service1686914508.png', 'uploads/service/alternate/service1686914507.webp', 'alt=\"Mag Air Cargo\"', 'uploads/service/list/service-list1686914508.png', 'uploads/service/list/service-list1686914508.webp', 'alt=\"Mag Air Cargo\"', NULL, NULL, NULL, 'Cargo Handling', 'Cargo Handling', 'Cargo Handling', '', 3, 'Active', '2023-05-09 06:48:35', '2023-06-25 03:42:14', '2023-06-25 03:42:14'),
(48, NULL, 'FREIGHT FORWARDING', NULL, 'freight-forwarding', '', NULL, NULL, NULL, '', '<p>Our freight forwarding service ensures the safe and timely delivery of your goods to their final destination.&nbsp;</p>', '<p>Our freight forwarding service ensures the safe and timely delivery of your goods to their final destination. We handle all aspects of the shipping process, including documentation, customs clearance, and transportation. Freight forwarding is a logistics service that involves the transportation of goods from one location to another, using a variety of modes of transportation such as air, sea, or land. Freight forwarding solutions are designed to provide a comprehensive and efficient logistics service to clients who need to transport goods across different regions or countries.</p>\r\n<p>Freight forwarding companies are responsible for managing the entire logistics process, including the arrangement of transportation, documentation, customs clearance, and delivery of the goods to their final destination. This allows clients to focus on their core business activities, while leaving the logistics to the experts.</p>\r\n<p>A key benefit of freight forwarding solutions is that they provide clients with a single point of contact for all their logistics needs. Freight forwarders act as intermediaries between the client and the carriers, coordinating all aspects of the transportation process to ensure that the goods are delivered on time and in good condition.</p>', NULL, '<p><strong>Freight forwarding</strong>&nbsp;solutions can also provide clients with cost-effective shipping options. Freight forwarders have established relationships with carriers and can negotiate better rates for their clients, based on the volume of shipments they handle.</p>\r\n<p>Another benefit of freight forwarding solutions is that they provide clients with access to a range of value-added services. These can include cargo insurance, warehousing, and distribution services, which can help to streamline the logistics process and reduce the overall cost of transportation.</p>\r\n<p>Overall, the vision of freight forwarding solutions is to provide clients with a comprehensive, efficient, and cost-effective logistics service that meets their specific transportation needs. By leveraging the expertise of freight forwarders, clients can ensure that their goods are transported safely, efficiently, and on time, allowing them to focus on growing their business.</p>', 'uploads/service/image/service1687683327.jpeg', 'uploads/service/image/service1687683327.webp', 'alt=\"Mag Air Cargo\"', NULL, NULL, 'alt=\"Mag Air Cargo\"', 'uploads/service/list/service-list1687683327.jpeg', 'uploads/service/list/service-list1687683327.webp', 'alt=\"Mag Air Cargo\"', NULL, NULL, NULL, 'Freight Forwarding', 'Freight Forwarding', 'Freight Forwarding', '', 1, 'Active', '2023-05-09 06:51:35', '2023-06-25 03:42:22', NULL),
(49, NULL, 'SEO', NULL, 'Digital Marketing', '', NULL, NULL, NULL, '', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', NULL, '', 'uploads/service/image/service1683629527.png', 'uploads/service/webp_image/service1683629527.webp', 'alt=\"Egyptian Air Cargo\"', 'uploads/service/alternate/image/service1683629527.jpg', 'uploads/service/alternate/webp_image/service1683629527.webp', 'alt=\"Egyptian Air Cargo\"', NULL, NULL, '', NULL, NULL, NULL, '', '', '', '', 8, 'Active', '2023-05-09 06:52:07', '2023-05-26 06:41:56', '2023-05-26 06:41:56'),
(50, NULL, 'Paids Ads Management', NULL, 'Digital Marketing', '', NULL, NULL, NULL, '', '', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', NULL, '', 'uploads/service/image/service1683629564.png', 'uploads/service/webp_image/service1683629564.webp', 'alt=\"Egyptian Air Cargo\"', 'uploads/service/alternate/image/service1683629564.jpg', 'uploads/service/alternate/webp_image/service1683629564.webp', 'alt=\"Egyptian Air Cargo\"', NULL, NULL, '', NULL, NULL, NULL, '', '', '', '', 9, 'Active', '2023-05-09 06:52:44', '2023-06-16 06:52:25', '2023-06-16 06:52:25'),
(52, NULL, 'Ecommerce App', NULL, 'App Development', '', NULL, NULL, NULL, '', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>', '<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', NULL, '<p>Quam elementum pulvinar etiam non quam. Placerat duis ultricies lacus sed turpis. Tristique senectus et netus et malesuada fames ac. Ac auctor augue mauris augue neque. Lectus magna fringilla urna porttitor rhoncus. Id eu nisl nunc mi ipsum faucibus vitae aliquet nec. Habitant morbi tristique senectus et. Vitae nunc sed velit dignissim sodales ut eu. Elementum facilisis leo vel fringilla. Enim diam vulputate ut pharetra sit amet aliquam id. Euismod in pellentesque massa placerat duis. Tellus integer feugiat scelerisque varius morbi enim. Urna id volutpat lacus laoreet non curabitur. Dictum sit amet justo donec enim diam vulputate ut pharetra. Erat imperdiet sed euismod nisi porta lorem mollis aliquam. Nunc lobortis mattis aliquam faucibus purus in massa tempor nec. Ut tellus elementum sagittis vitae et leo duis ut. Imperdiet sed euismod nisi porta lorem. Morbi tristique senectus et netus. Volutpat ac tincidunt vitae semper quis lectus.</p>', 'uploads/service/image/service1683697952.png', 'uploads/service/webp_image/service1683697952.webp', 'alt=\"Pentacodes\"', 'uploads/service/alternate/image/service1683697952.jpg', 'uploads/service/alternate/webp_image/service1683697952.webp', 'alt=\"Pentacodes\"', NULL, NULL, '', NULL, NULL, NULL, 'ecommerce title', 'ecommerce description', 'ecommerce keyword', '', 11, 'Active', '2023-05-10 01:52:32', '2023-06-16 06:52:22', '2023-06-16 06:52:22'),
(53, NULL, 'gf', NULL, '', '', NULL, NULL, NULL, '', '', '', NULL, '', NULL, NULL, 'alt=\"Pentacodes\"', NULL, NULL, 'alt=\"Pentacodes\"', NULL, NULL, '', NULL, NULL, NULL, '', '', '', '', 12, 'Active', '2023-05-26 06:47:12', '2023-05-26 06:48:36', '2023-05-26 06:48:36'),
(54, NULL, 'sdf', NULL, '', '', NULL, NULL, NULL, '', '', '', NULL, '', NULL, NULL, 'alt=\"Pentacodes\"', NULL, NULL, 'alt=\"Pentacodes\"', NULL, NULL, '', NULL, NULL, NULL, '', '', '', '', 13, 'Active', '2023-05-26 06:48:22', '2023-05-26 06:48:30', '2023-05-26 06:48:30'),
(55, NULL, 'CHARTERING', NULL, 'chartering', '', NULL, NULL, NULL, '', '<p>Our chartering service offers a reliable and efficient solution for transporting large and heavy goods. We work with a network of trusted carriers,</p>', '<p>Our chartering service offers a reliable and efficient solution for transporting large and heavy goods. We work with a network of trusted carriers to provide you with flexible and customized shipping options that meet your specific needs.</p>\r\n<p>Chartering is a logistics service that involves hiring a vessel, aircraft, or other transportation mode for a specific client\'s exclusive use. The vision of chartering is to provide a flexible and customized transportation solution that meets the specific needs of the client.</p>\r\n<p>Chartering allows the client to have greater control over the shipping process and enables them to tailor the transportation solution to their unique requirements. This can include factors such as the type of cargo being transported, the destination, and the desired timeline for delivery.</p>', NULL, '<p>Chartering can be particularly beneficial for clients who need to transport large or heavy goods, as it allows them to choose a mode of transportation that is specifically designed to handle their cargo. For example, if a client needs to transport oversized equipment or machinery, they may choose to charter a specialized heavy-lift vessel or aircraft that is capable of carrying the weight and size of their cargo.</p>\r\n<p>Chartering can also provide greater flexibility when it comes to scheduling and routing, as the client can choose the departure and arrival ports and the route that the vessel or aircraft takes. This can help to minimize transit times and reduce the risk of delays.</p>\r\n<p>Overall, the vision of chartering is to provide clients with a reliable, efficient, and customized transportation solution that meets their unique needs and enables them to achieve their logistics goals.</p>', 'uploads/service/image/service1687683725.jpg', 'uploads/service/image/service1687683725.webp', 'alt=\"Mag Air Cargo\"', NULL, NULL, 'alt=\"Mag Air Cargo\"', 'uploads/service/list/service-list1687683725.jpg', 'uploads/service/list/service-list1687683725.webp', '', NULL, NULL, NULL, 'Chartering', 'Chartering', 'Chartering', '', 2, 'Active', '2023-05-26 07:11:18', '2023-06-26 00:08:11', NULL),
(56, NULL, 'LOGISTICS SOLUTIONS', NULL, 'logistics-solutions', '', NULL, NULL, NULL, '', '<p>Discover our comprehensive logistics solutions, including supply chain management, warehousing, and distribution services.</p>', '<p>Discover our comprehensive logistics solutions, including supply chain management, warehousing, and distribution services. Our team of experts will work with you to develop a custom solution that meets your specific needs and helps you streamline your operations for maximum efficiency.</p>\r\n<p>Our logistics solutions are designed to streamline your supply chain operations, reduce costs, and increase efficiency. Whether you need help managing your warehouse operations or managing your supply chain, our team of experts can help.</p>', NULL, '<p>Logistics coordination and solutions refer to the various processes, services, and technologies used to manage the movement of goods and products across the supply chain. Effective logistics coordination and solutions are essential to ensure that goods are delivered on time, in the right condition, and at the right cost.</p>', 'uploads/service/image/service1687684232.jpg', 'uploads/service/webp_image/service1687684231.webp', 'alt=\"Mag Air Cargo\"', NULL, NULL, 'alt=\"Mag Air Cargo\"', 'uploads/service/list/service-list1687684232.jpg', 'uploads/service/list/service-list1687684232.webp', 'alt=\"Mag Air Cargo\"', NULL, NULL, NULL, 'Mag Air Cargo', 'Mag Air Cargo', 'Mag Air Cargo', '', 3, 'Active', '2023-06-25 03:40:32', '2023-06-25 03:42:22', NULL),
(57, NULL, 'CUSTOMS CLEARANCE', NULL, 'customs-clearance', '', NULL, NULL, NULL, '', '<p>Customs clearance&nbsp;is an essential part of the logistics process that involves the submission and verification of documentation</p>', '<p>Customs clearance&nbsp;is an essential part of the logistics process that involves the submission and verification of documentation to ensure that goods can be legally imported or exported across international borders. The customs clearance process is governed by the laws and regulations of the countries involved, and it is essential for ensuring that goods are transported in a safe, legal, and compliant manner.</p>\r\n<p>The customs clearance process typically involves several steps, including the submission of the necessary documentation to the customs authorities, such as invoices, bills of lading, and packing lists. The customs authorities will then review the documentation to ensure that it is complete and accurate, and that the goods being transported comply with all relevant regulations and laws.</p>', NULL, '<p>Once the documentation has been verified, the customs authorities will either release the goods for shipment or request additional information or inspections if there are any concerns about the goods. Customs clearance can be a complex and time-consuming process, particularly for goods that are subject to additional regulations, such as hazardous materials or food products.</p>\r\n<p>At our company, we provide custom clearance services to ensure that your goods are transported safely, legally, and in compliance with all relevant regulations and laws. We have extensive experience in navigating the customs clearance process, and we work closely with our clients to ensure that all documentation is complete and accurate, and that any potential issues are addressed in a timely and efficient manner.</p>\r\n<p>By entrusting us with your custom clearance needs, you can focus on your core business activities, while we handle the logistics of importing or exporting your goods across international borders. Our goal is to ensure that your goods are transported safely, efficiently, and in compliance with all relevant regulations and laws, so that you can achieve your logistics objectives with confidence.</p>', 'uploads/service/image/service1687684730.jpg', 'uploads/service/webp_image/service1687684730.webp', 'alt=\"Mag Air Cargo\"', NULL, NULL, 'alt=\"Mag Air Cargo\"', 'uploads/service/list/service-list1687684730.jpg', 'uploads/service/list/service-list1687684730.webp', 'alt=\"Mag Air Cargo\"', NULL, NULL, NULL, 'CUSTOMS CLEARANCE', 'CUSTOMS CLEARANCE', 'CUSTOMS CLEARANCE', '', 4, 'Active', '2023-06-25 03:48:50', '2023-06-25 03:49:04', NULL),
(58, NULL, 'TRANSPORTATION SERVICES', NULL, 'transportation-services', '', NULL, NULL, NULL, '', '<p>We provide reliable transportation services for your cargo, whether you need to transport goods domestically or internationally.&nbsp;</p>', '<p>We provide reliable transportation services for your cargo, whether you need to transport goods domestically or internationally.&nbsp;</p>', NULL, '<article>\r\n<p>Our transportation solutions are designed to meet your specific requirements, so you can be confident that your shipment will arrive at its destination on time and in good condition.</p>\r\n<p>&nbsp;</p>\r\n</article>', 'uploads/service/image/service1687684970.jpg', 'uploads/service/webp_image/service1687684970.webp', 'alt=\"Mag Air Cargo\"', NULL, NULL, 'alt=\"Mag Air Cargo\"', 'uploads/service/list/service-list1687684970.jpg', 'uploads/service/list/service-list1687684970.webp', 'alt=\"Mag Air Cargo\"', NULL, NULL, NULL, 'TRANSPORTATION SERVICES', 'TRANSPORTATION SERVICES', 'TRANSPORTATION SERVICES', '', 5, 'Active', '2023-06-25 03:52:50', '2023-06-25 03:54:17', NULL),
(59, NULL, 'AIR CARGO', NULL, 'air-cargo', '', NULL, NULL, NULL, '', '<p>Air cargo handling refers to the processes involved in the movement and management of air freight shipments at airports.</p>', '<p>Air cargo handling refers to the processes involved in the movement and management of air freight shipments at airports. Air cargo handling companies are responsible for a range of activities, including the following:</p>\r\n<ol>\r\n<li>\r\n<p>Cargo acceptance: This involves the physical receipt of cargo from shippers, as well as the processing of documentation and verification of compliance with various regulations and security protocols.</p>\r\n</li>\r\n<li>\r\n<p>Cargo loading and unloading: This involves the physical handling of cargo, including loading it onto and off of aircraft, and transferring it between different modes of transportation.</p>\r\n</li>\r\n<li>\r\n<p>Cargo storage and warehousing: This involves the management of cargo storage facilities, including temperature-controlled areas for perishable goods and secure areas for hazardous materials.</p>\r\n</li>\r\n<li>\r\n<p>Cargo tracking and documentation: This involves the use of advanced tracking systems and software to monitor the movement of cargo, and the maintenance of accurate and complete documentation throughout the shipping process.</p>\r\n</li>\r\n</ol>', NULL, '<p>Whether you need to transport dangerous goods or require specialized handling, we have the expertise and experience to get the job done.</p>', 'uploads/service/image/service1687685434.jpg', 'uploads/service/webp_image/service1687685434.webp', 'alt=\"Mag Air Cargo\"', NULL, NULL, 'alt=\"Mag Air Cargo\"', 'uploads/service/list/service-list1687685434.jpg', 'uploads/service/list/service-list1687685434.webp', 'alt=\"Mag Air Cargo\"', NULL, NULL, NULL, 'AIR CARGO', 'AIR CARGO', 'AIR CARGO', '', 6, 'Active', '2023-06-25 04:00:34', '2023-06-25 04:03:11', NULL),
(60, NULL, 'CONNECTION SERVICES', NULL, 'connection-services', '', NULL, NULL, NULL, '', '<p>We understand the importance of maintaining strong connections in the air cargo industry, which is why we offer a range of connection.</p>', '<p>We understand the importance of maintaining strong connections in the air cargo industry, which is why we offer a range of connection</p>\r\n<p>WCA (World Cargo Alliance), CLN (Cargo Logistics Network), and IATA (International Air Transport Association) are three examples of global networks that connect freight forwarding and logistics companies around the world. These networks provide a range of benefits to member companies, including access to new business opportunities, increased visibility in the market, and enhanced collaboration with other logistics providers.</p>\r\n<p>WCA is one of the largest and most extensive logistics networks in the world, with over 9,500 member offices in 194 countries. CLN is another global logistics network with over 430 member companies in 100 countries. Both WCA and CLN offer a range of benefits to their members, including networking opportunities, training and development programs, and access to a range of business tools and resources.</p>\r\n<p>IATA is a trade association representing over 290 airlines around the world. As a member of IATA, freight forwarders and logistics companies gain access to a range of benefits, including industry insights, regulatory updates, and access to a global network of air transport professionals.</p>\r\n<p>By joining these networks, freight forwarding and logistics companies can expand their reach, access new markets, and build relationships with other industry players. They can also leverage the expertise and resources of other members to enhance their service offerings and provide better solutions to their clients. Overall, the world connection of networks like WCA, CLN, and IATA play an important role in facilitating international trade and logistics.</p>', NULL, '<p>Our connection services are designed to help you grow your business and succeed in today\'s competitive marketplace.</p>', 'uploads/service/image/service1687685903.jpg', 'uploads/service/webp_image/service1687685903.webp', 'alt=\"Mag Air Cargo\"', NULL, NULL, 'alt=\"Mag Air Cargo\"', 'uploads/service/list/service-list1687685903.jpg', 'uploads/service/list/service-list1687685903.webp', 'alt=\"Mag Air Cargo\"', NULL, NULL, NULL, 'CONNECTION SERVICES', 'CONNECTION SERVICES', 'CONNECTION SERVICES', '', 7, 'Active', '2023-06-25 04:08:23', '2023-06-25 04:11:50', NULL),
(61, NULL, 'WAREHOUSING SERVICES', NULL, 'warehousing-services', '', NULL, NULL, NULL, '', '<p>Warehousing solutions refer to the services and facilities that are designed to meet the storage needs of businesses and organizations.</p>', '<p>Warehousing solutions refer to the services and facilities that are designed to meet the storage needs of businesses and organizations. Warehousing solutions are an essential part of the logistics industry, providing a secure and organized space to store goods and products before they are shipped to their final destination.</p>\r\n<p>Our warehousing services are designed to provide you with comprehensive logistics solutions that help you manage your operations more efficiently.</p>', NULL, '<p>Whether you need help managing your inventory or need assistance with order fulfillment, our team of experts is here to help.</p>', 'uploads/service/image/service1687686166.jpg', 'uploads/service/webp_image/service1687686166.webp', 'alt=\"Mag Air Cargo\"', NULL, NULL, 'alt=\"Mag Air Cargo\"', 'uploads/service/list/service-list1687686166.jpg', 'uploads/service/list/service-list1687686166.webp', 'alt=\"Mag Air Cargo\"', NULL, NULL, NULL, 'WAREHOUSING SERVICES', 'WAREHOUSING SERVICES', 'WAREHOUSING SERVICES', '', 8, 'Active', '2023-06-25 04:12:46', '2023-06-25 04:12:59', NULL),
(62, NULL, 'GSSA / GSA SERVICES', NULL, 'gssa--gsa-services', '', NULL, NULL, NULL, '', '<p>A General Sales and Service Agent (GSSA) is a company that acts on behalf of an airline to provide sales and marketing services&nbsp;</p>', '<p>A General Sales and Service Agent (GSSA) is a company that acts on behalf of an airline to provide sales and marketing services, as well as cargo handling and management services. GSSAs are responsible for promoting and selling the airline\'s services to customers, as well as managing the operational aspects of the airline\'s cargo business. This includes managing the airline\'s cargo sales, cargo operations, and customer service functions.</p>', NULL, '<p><strong>A General Sales Agent (GSA)</strong>&nbsp;is similar to a GSSA, but typically focuses solely on sales and marketing services, rather than also providing cargo handling and management services. The GSA is responsible for promoting and selling the airline\'s services to customers, and may also be involved in negotiating contracts with customers and coordinating the airline\'s marketing activities.</p>\r\n<p>In both cases, the GSSA or GSA acts as an extension of the airline and represents the airline\'s interests in a specific geographic region or market. The goal of the GSSA or GSA is to help the airline expand its reach and reach new markets, while also providing customers with local support and expertise.</p>', 'uploads/service/image/service1687686558.jpg', 'uploads/service/webp_image/service1687686558.webp', 'alt=\"Mag Air Cargo\"', NULL, NULL, 'alt=\"Mag Air Cargo\"', 'uploads/service/list/service-list1687686558.jpg', 'uploads/service/list/service-list1687686558.webp', '', NULL, NULL, NULL, 'GSSA / GSA SERVICES', 'GSSA / GSA SERVICES', 'GSSA / GSA SERVICES', '', 9, 'Active', '2023-06-25 04:19:18', '2023-06-30 05:26:11', NULL),
(63, NULL, 'tests', NULL, 'tests', '', NULL, NULL, NULL, '', '<p>test short</p>', '<p>test desc</p>', NULL, '', 'uploads/service/image/service1687757785.jpg', 'uploads/service/webp_image/service1687757785.webp', 'alt=\"Mag Air Cargo\"', NULL, NULL, 'alt=\"Mag Air Cargo\"', 'uploads/service/list/service-list1687757785.png', 'uploads/service/list/service-list1687757785.webp', '', NULL, NULL, NULL, 'tests', 'tests', 'tests', '', 10, 'Active', '2023-06-26 00:06:25', '2023-06-28 09:45:35', '2023-06-28 09:45:35'),
(64, NULL, 'sdsdd', NULL, 'sdsdd', '', NULL, NULL, NULL, '', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard&nbsp;</p>', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also theh kjjj</p>', NULL, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the</p>', 'uploads/service/image/service1687790281.png', 'uploads/service/webp_image/service1687790280.webp', 'alt=\"Mag Air Cargo\"', NULL, NULL, 'alt=\"Mag Air Cargo\"', NULL, NULL, '', NULL, NULL, NULL, 'sdsdd', 'sdsdd', 'sdsdd', '', 10, 'Active', '2023-06-26 09:08:01', '2023-06-28 09:45:31', '2023-06-28 09:45:31');

-- --------------------------------------------------------

--
-- Table structure for table `service_categories`
--

CREATE TABLE `service_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `sort_order` int(11) DEFAULT NULL,
  `status` enum('Active','Inactive') COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `service_categories`
--

INSERT INTO `service_categories` (`id`, `title`, `sort_order`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Web Development', 1, 'Active', '2023-05-09 04:58:21', '2023-05-09 06:24:47', NULL),
(2, 'mkh', 2, NULL, '2023-05-09 05:01:33', '2023-05-09 05:03:49', '2023-05-09 05:03:49'),
(3, 'App Development', 2, 'Active', '2023-05-09 05:07:51', '2023-05-09 06:23:18', NULL),
(4, 'Digital Marketing', 3, 'Active', '2023-05-09 05:08:07', '2023-05-09 06:24:45', NULL),
(5, 'test', 4, 'Inactive', '2023-05-09 06:10:56', '2023-05-26 10:30:55', NULL),
(6, 'Artificial Intelligence', 5, 'Active', '2023-05-18 10:18:25', '2023-05-26 06:37:37', NULL),
(7, 'Test serv cat', 6, 'Active', '2023-05-18 10:37:35', '2023-05-18 11:02:01', '2023-05-18 11:02:01');

-- --------------------------------------------------------

--
-- Table structure for table `service_faqs`
--

CREATE TABLE `service_faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` int(10) UNSIGNED NOT NULL,
  `question` text COLLATE utf8_unicode_ci NOT NULL,
  `answer` text COLLATE utf8_unicode_ci,
  `sort_order` int(11) NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Active',
  `connectid` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `service_faqs`
--

INSERT INTO `service_faqs` (`id`, `service_id`, `question`, `answer`, `sort_order`, `status`, `connectid`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 47, 'qn 1', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 1, 'Active', 1, '2023-06-23 08:33:17', '2023-06-25 03:25:55', '2023-06-25 03:25:55'),
(2, 48, 'qn 1', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 1, 'Active', 1, '2023-06-23 08:33:17', '2023-06-25 03:25:55', '2023-06-25 03:25:55'),
(3, 48, 'qn 2', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 2, 'Active', 2, '2023-06-23 08:33:34', '2023-06-25 03:25:51', '2023-06-25 03:25:51'),
(4, 55, 'qn 2', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 1, 'Active', 2, '2023-06-23 08:33:34', '2023-06-25 03:25:51', '2023-06-25 03:25:51');

-- --------------------------------------------------------

--
-- Table structure for table `service_faq_connect`
--

CREATE TABLE `service_faq_connect` (
  `id` bigint(20) NOT NULL,
  `question` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `answer` text COLLATE utf8_unicode_ci,
  `status` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort_order` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted_at` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service_galleries`
--

CREATE TABLE `service_galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `portfolio_gallery_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `service_galleries`
--

INSERT INTO `service_galleries` (`id`, `service_id`, `portfolio_gallery_id`) VALUES
(6, 4, 9),
(7, 4, 4),
(8, 4, 7),
(9, 4, 1),
(10, 10, 8),
(11, 10, 5),
(12, 11, 9),
(13, 11, 8),
(14, 11, 5),
(15, 12, 17),
(16, 12, 26),
(17, 12, 16),
(18, 12, 21),
(19, 12, 25),
(20, 12, 14),
(21, 12, 15);

-- --------------------------------------------------------

--
-- Table structure for table `siteimages`
--

CREATE TABLE `siteimages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `webp_image` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon_image` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon_webp_image` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `siteimages`
--

INSERT INTO `siteimages` (`id`, `image`, `webp_image`, `icon_image`, `icon_webp_image`, `section`, `created_at`, `updated_at`) VALUES
(1, 'uploads/home/key_feature/image/key-feature-image1684148382.jpg', 'uploads/home/key_feature/webp_image/key-feature-image1684148382.webp', 'uploads/home/key_feature/image/key-feature-image1684148345.png', 'uploads/home/key_feature/webp_image/key-feature-image1684148345.webp', 'clients', '2023-05-15 06:58:02', '2023-05-15 06:59:42'),
(2, 'uploads/home/key_feature/image/key-feature-image1684148429.jpg', 'uploads/home/key_feature/webp_image/key-feature-image1684148429.webp', NULL, NULL, 'keyfeature', '2023-05-15 07:00:29', '2023-05-15 07:00:29'),
(3, NULL, NULL, NULL, NULL, 'keyfeature', '2023-05-19 04:50:55', '2023-05-19 04:50:55'),
(4, NULL, NULL, NULL, NULL, 'keyfeature', '2023-05-19 04:54:15', '2023-05-19 04:54:15'),
(5, 'uploads/home/key_feature/image/key-feature-image1684472201.jpg', 'uploads/home/key_feature/webp_image/key-feature-image1684472197.webp', NULL, NULL, 'keyfeature', '2023-05-19 04:56:41', '2023-05-19 04:56:41');

-- --------------------------------------------------------

--
-- Table structure for table `site_information`
--

CREATE TABLE `site_information` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `call_free` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `book_on_trip_advisor_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `logo_webp` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `logo_attribute` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dashboard_logo` text COLLATE utf8_unicode_ci,
  `dashboard_logo_webp` text COLLATE utf8_unicode_ci,
  `dashboard_logo_attribute` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `footer_logo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `footer_logo_webp` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `footer_logo_attribute` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_sub_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` text COLLATE utf8_unicode_ci,
  `landline` text COLLATE utf8_unicode_ci,
  `whatsapp_number` text COLLATE utf8_unicode_ci,
  `google_map` text COLLATE utf8_unicode_ci,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alternate_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_recipient` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `working_hours` text COLLATE utf8_unicode_ci,
  `facebook_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `instagram_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `snapchat_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pinterest_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `linkedin_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `youtube_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `review_us_on_google_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` longtext COLLATE utf8_unicode_ci,
  `footer_location` longtext COLLATE utf8_unicode_ci,
  `copyright` text COLLATE utf8_unicode_ci,
  `privacy_policy` longtext COLLATE utf8_unicode_ci,
  `terms_and_conditions` longtext COLLATE utf8_unicode_ci,
  `header_tag` longtext COLLATE utf8_unicode_ci,
  `footer_tag` longtext COLLATE utf8_unicode_ci,
  `body_tag` longtext COLLATE utf8_unicode_ci,
  `desc` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company_info_footer` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `site_information`
--

INSERT INTO `site_information` (`id`, `brand_name`, `call_free`, `book_on_trip_advisor_url`, `logo`, `logo_webp`, `logo_attribute`, `dashboard_logo`, `dashboard_logo_webp`, `dashboard_logo_attribute`, `footer_logo`, `footer_logo_webp`, `footer_logo_attribute`, `contact_title`, `contact_sub_title`, `phone`, `landline`, `whatsapp_number`, `google_map`, `email`, `alternate_email`, `email_recipient`, `working_hours`, `facebook_url`, `instagram_url`, `snapchat_url`, `pinterest_url`, `linkedin_url`, `youtube_url`, `twitter_url`, `review_us_on_google_url`, `location`, `footer_location`, `copyright`, `privacy_policy`, `terms_and_conditions`, `header_tag`, `footer_tag`, `body_tag`, `desc`, `company_info_footer`, `created_at`, `updated_at`) VALUES
(1, 'Mag Air Cargo', NULL, '', 'uploads/site_information/logo/logo1686904617.png', 'uploads/site_information/logo_webp/logo1686904617.webp', 'alt=\"Pentacodes\"', 'uploads/site_information/dashboard_logo/dashboard-logo1686904617.png', 'uploads/site_information/dashboard_logo/dashboard-logo1686904617.webp', '', NULL, NULL, '', NULL, NULL, '+971501599118', '+971501599118', '+971501599118', NULL, 'lijo.pentacodes@gmail.com', 'sales@magaircargo.com', 'Mag Air Cargo', NULL, 'https://www.facebook.com/', 'https://www.instagram.com/', NULL, NULL, 'https://www.linkedin.com/company/', NULL, NULL, '', NULL, NULL, '<p>Copyright &copy; 2022 Mag Air Cargo</p>', '<div class=\"term-desc-box\">\r\n<p>As a cargo and logistics company, we understand the importance of privacy and the protection of personal data. We are committed to protecting the privacy and personal information of our customers and have developed this privacy policy to outline how we collect, use, and protect personal information.</p>\r\n<p>Collection of Personal Information: We may collect personal information such as name, address, phone number, email address, and payment information when necessary to provide our services. We collect personal information directly from our customers and may also collect information from third-party service providers.</p>\r\n<p>Use of Personal Information: We use personal information to provide our services, including shipment and delivery of goods, customs clearance, and other logistics-related services. We may also use personal information to communicate with our customers about their shipments and to send marketing communications.</p>\r\n<p>Storage and Security of Personal Information: We maintain appropriate technical and organizational measures to protect personal information from unauthorized access, loss, or misuse. We store personal information for as long as necessary to fulfill the purposes for which it was collected or as required by law.</p>\r\n<p>Sharing of Personal Information: We do not share personal information with third parties except as necessary to provide our services or as required by law. We may share personal information with our service providers, such as shipping carriers or customs brokers, to facilitate the provision of our services.</p>\r\n<p>Compliance with Applicable Laws and Regulations: We comply with all applicable data protection laws and regulations, including the General Data Protection Regulation (GDPR).</p>\r\n<p>Communication with Customers: We communicate our privacy policy to our customers and respond to any inquiries or concerns they may have regarding their personal information. We also provide our customers with the necessary tools to access, update, or delete their personal information.</p>\r\n<p>By implementing this privacy policy, we aim to protect the personal information of our customers and provide transparency about how we collect and use personal data. We continuously review and update our privacy practices to ensure compliance with applicable laws and regulations and provide the highest protection for our customers\' personal information.</p>\r\n<p>&nbsp;</p>\r\n</div>', '<div class=\"term-desc-box\">\r\n<p>As a company that provides cargo and logistics services, we understand the importance of secure transactions and payments. To ensure that our customers have a clear understanding of our terms and conditions regarding payments and transactions, we have developed the following policy:</p>\r\n<p>Payment Terms: All payments must be made in full before the shipment is released for delivery. We accept various forms of payment, including bank transfers, credit/debit cards, and online payment platforms. If payment is not received within the agreed-upon terms, we reserve the right to hold or delay shipment until payment is made. Unless we have a credit term agreement.</p>\r\n<p>Disputed Payments: In the event of a disputed payment, we will work with the customer to resolve the dispute in a timely and transparent manner. If the dispute cannot be resolved, we reserve the right to take legal action to recover the amount owed.</p>\r\n<p>Refunds and Returns: Refunds and returns are subject to our company\'s policies and applicable laws. In general, refunds and returns are only accepted for damaged or defective products or for products that do not meet the customer\'s specifications.</p>\r\n<p>Liability: Our liability for any damages or losses incurred during shipment is limited to the value of the shipment or the amount of insurance coverage purchased by the customer, whichever is less. Customers are responsible for purchasing insurance coverage for their shipments if desired.</p>\r\n<p class=\"terms-description\">By using our services, customers agree to our terms and conditions regarding payments and transactions. We reserve the right to modify or update these policies at any time, and it is the customer\'s responsibility to review these policies regularly. If you have any questions or concerns about our payment and transaction policies, please contact us for more information.</p>\r\n</div>', '<!-- Google Tag Manager  -->\r\n<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({\'gtm.start\':\r\nnew Date().getTime(),event:\'gtm.js\'});var f=d.getElementsByTagName(s)[0],\r\nj=d.createElement(s),dl=l!=\'dataLayer\'?\'&l=\'+l:\'\';j.async=true;j.src=\r\n\'https://www.googletagmanager.com/gtm.js?id=\'+i+dl;f.parentNode.insertBefore(j,f);\r\n})(window,document,\'script\',\'dataLayer\',\'GTM-PB7ZTFP\');</script>\r\n<!-- End Google Tag Manager -->\r\n\r\n  <!-- Facebook Pixel Code -->\r\n    <script>\r\n      !function(f,b,e,v,n,t,s)\r\n      {if(f.fbq)return;n=f.fbq=function(){n.callMethod?\r\n      n.callMethod.apply(n,arguments):n.queue.push(arguments)};\r\n      if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version=\'2.0\';\r\n      n.queue=[];t=b.createElement(e);t.async=!0;\r\n      t.src=v;s=b.getElementsByTagName(e)[0];\r\n      s.parentNode.insertBefore(t,s)}(window, document,\'script\',\r\n      \'https://connect.facebook.net/en_US/fbevents.js\');\r\n      fbq(\'init\', \'335460437128188\');\r\n      fbq(\'track\', \'PageView\');\r\n    </script>\r\n    <noscript>\r\n        <img height=\"1\" width=\"1\" style=\"display:none\"\r\n          src=\"https://www.facebook.com/tr?id=335460437128188&ev=PageView&noscript=1\"\r\n        />\r\n\r\n    </noscript>\r\n    \r\n    <!-- End Facebook Pixel Code -->\r\n\r\n\r\n<!-- Global site tag (gtag.js) - Google Analytics -->\r\n    \r\n    <script async src=\"https://www.googletagmanager.com/gtag/js?id=UA-135746565-1\"></script>\r\n    \r\n    <script>\r\n    \r\n        window.dataLayer = window.dataLayer || [];\r\n        function gtag(){dataLayer.push(arguments);}\r\n        gtag(\'js\', new Date());\r\n        \r\n        gtag(\'config\', \'UA-135746565-1\');\r\n        \r\n    </script>\r\n<!-- End Analytics  Code -->\r\n<meta name=\"google-site-verification\" content=\"evzvpx0Z9MZE-PKINa_8ZFdXrCmHHFYkUUbKEaGpof8\" />\r\n\r\n<!--Schema Code-->\r\n<script type=\"application/ld+json\">\r\n{\r\n  \"@context\": \"https://schema.org/\",\r\n  \"@type\": \"WebSite\",\r\n  \"name\": \"Pentacodes IT Solutions\",\r\n  \"url\": \"https://www.pentacodes.com/\",\r\n  \"potentialAction\": {\r\n    \"@type\": \"SearchAction\",\r\n    \"target\": \"{search_term_string}\",\r\n    \"query-input\": \"required name=search_term_string\"\r\n  }\r\n}\r\n</script>\r\n\r\n<script type=\"application/ld+json\">\r\n{\r\n  \"@context\": \"https://schema.org\",\r\n  \"@type\": \"LocalBusiness\",\r\n  \"name\": \"Pentacodes IT Solutions\",\r\n  \"image\": \"https://www.pentacodes.com/web/images/logo.svg\",\r\n  \"@id\": \"\",\r\n  \"url\": \"https://www.pentacodes.com/\",\r\n  \"telephone\": \"054 586 4306\",\r\n  \"address\": {\r\n    \"@type\": \"PostalAddress\",\r\n    \"streetAddress\": \"Dar Al Wuheida Building ,Hor Al Anz East\",\r\n    \"addressLocality\": \"Dubai\",\r\n    \"postalCode\": \"87076\",\r\n    \"addressCountry\": \"AE\"\r\n  } ,\r\n  \"sameAs\": [\r\n    \"https://www.facebook.com/pentacodesit\",\r\n    \"https://twitter.com/pentacodesit\",\r\n    \"https://www.instagram.com/pentacodes/\",\r\n    \"https://www.youtube.com/channel/UCXHj0VWYHzcZ1ekXKAu9ohg\",\r\n    \"https://www.linkedin.com/company/pentacodes/\",\r\n    \"https://www.pinterest.com/pentacodes/\",\r\n    \"https://www.pentacodes.com/\"\r\n  ] \r\n}\r\n</script>\r\n<meta property=\"og:image\" content=\"https://www.pentacodes.com/web/images/logo.svg\" />\r\n\r\n<script type=\"text/javascript\">\r\n    (function(c,l,a,r,i,t,y){\r\n        c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};\r\n        t=l.createElement(r);t.async=1;t.src=\"https://www.clarity.ms/tag/\"+i;\r\n        y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);\r\n    })(window, document, \"clarity\", \"script\", \"g9w5er9tmb\");\r\n</script>', '', '<!-- Google Tag Manager (noscript)  -->\r\n<noscript><iframe src=\"https://www.googletagmanager.com/ns.html?id=GTM-PB7ZTFP\"\r\nheight=\"0\" width=\"0\" style=\"display:none;visibility:hidden\"></iframe></noscript>\r\n<!-- End Google Tag Manager (noscript) -->', NULL, '<p>Mag Air Cargo Services, is a professional Freight Forwarding Company Located in Dubai, Sharjah, UAE, &amp; Cairo, Egypt.&nbsp;</p>', '2022-12-07 01:11:13', '2023-06-26 20:27:35');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sub_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `main_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `button_txt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_webp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_attribute` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bg_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bg_image_webp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bg_image_attribute` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort_order` int(11) DEFAULT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `sub_title`, `title1`, `main_title`, `title2`, `description`, `button_txt`, `button_url`, `image`, `image_webp`, `image_attribute`, `image_title`, `bg_image`, `bg_image_webp`, `bg_image_attribute`, `sort_order`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(9, 'Secure', '<p>Better Solution</p>\r\n<p>For Logistics</p>', '', '', '', 'Contact Us', '/contact', NULL, NULL, '', '', 'uploads/home/slider/bg_image/home-slider1686903402.jpg', 'uploads/home/slider/bg_webp_image/home-slider1686903401.webp', 'alt=\"Mag Air Cargos\"', 2, 'Active', '2023-05-27 01:21:52', '2023-06-26 09:56:42', NULL),
(10, 'Reliable', '<p>Better Solution</p>\r\n<p>For Logistics</p>', '', '', '', 'Contact Us', '/contact', NULL, NULL, '', '', 'uploads/home/slider/bg_image/home-slider1686903518.png', 'uploads/home/slider/bg_webp_image/home-slider1686903518.webp', 'alt=\"Mag Air Cargo\"', 1, 'Active', '2023-05-27 01:22:15', '2023-06-24 06:09:48', NULL),
(11, 'Fast', '<p>Better Solution</p>\r\n<p>For Logistics</p>', '', '', '', 'Contact Us', '/contact', NULL, NULL, '', '', 'uploads/home/slider/bg_image/home-slider1687602245.jpg', 'uploads/home/slider/bg_image/home-slider1687602244.webp', 'alt=\"Mag Air Cargo\"', 3, 'Active', '2023-06-24 04:54:05', '2023-06-24 06:10:42', NULL),
(12, 'Trusted', '<p>Better Solution</p>\r\n<p>For Logistics</p>', '', '', '', 'Contact Us', '/contact', NULL, NULL, '', '', 'uploads/home/slider/bg_image/home-slider1687602703.jpg', 'uploads/home/slider/bg_image/home-slider1687602703.webp', 'alt=\"Mag Air Cargo\"', 4, 'Active', '2023-06-24 05:01:43', '2023-06-24 06:11:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_services`
--

CREATE TABLE `sub_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `short_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sort_order` int(11) NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `support_services`
--

CREATE TABLE `support_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sort_order` int(11) NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` text COLLATE utf8mb4_unicode_ci,
  `image_webp` text COLLATE utf8mb4_unicode_ci,
  `image_attribute` text COLLATE utf8mb4_unicode_ci,
  `sort_order` int(11) NOT NULL,
  `facebook` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `title`, `short_description`, `description`, `image`, `image_webp`, `image_attribute`, `sort_order`, `facebook`, `linkedin`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Certificate 1', 'Lorem Ipsum is simply dummy text of the printing and typesetting', '<div class=\"larg-title\">\r\n<p>Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n</div>\r\n<ul class=\"list-inline\">\r\n<li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>\r\n<li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>\r\n</ul>', 'uploads/team/team1686986417.png', 'uploads/team/team1686986416.webp', '', 1, 'www.facebook.com', 'www.linkedin.com', 'Active', '2023-04-15 09:30:26', '2023-06-25 02:44:09', NULL),
(8, 'Certificate 2', 'Lorem Ipsum is simply dummy text of the printing and typesetting', '<div class=\"larg-title\">\r\n<p>Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n</div>\r\n<ul class=\"list-inline\">\r\n<li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>\r\n<li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>\r\n</ul>', 'uploads/team/team1686986471.png', 'uploads/team/team1686986471.webp', '', 2, NULL, NULL, 'Active', '2023-05-03 09:46:06', '2023-06-25 02:44:37', NULL),
(13, 'certificate 5', NULL, NULL, NULL, NULL, '', 4, NULL, NULL, 'Active', '2023-06-19 00:40:48', '2023-06-25 02:43:08', '2023-06-25 02:43:08'),
(15, 'ytsey', 'syty', '<p>styhty</p>', 'uploads/team/team1687531402.jpg', 'uploads/team/team1687531401.webp', '', 6, NULL, NULL, 'Active', '2023-06-23 10:43:22', '2023-06-25 02:42:45', '2023-06-25 02:42:45'),
(16, 'Certificate 5', 'Lorem Ipsum is simply dummy text of the printing and typesetting', '<div class=\"larg-title\">\r\n<p>Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n</div>\r\n<ul class=\"list-inline\">\r\n<li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>\r\n<li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>\r\n</ul>', 'uploads/team/team1686986471.png', 'uploads/team/team1686986471.webp', '', 2, NULL, NULL, 'Active', '2023-05-03 09:46:06', '2023-06-25 02:44:37', NULL),
(17, 'certificate 6', NULL, NULL, NULL, NULL, '', 4, NULL, NULL, 'Active', '2023-06-19 00:40:48', '2023-06-25 02:43:08', '2023-06-25 02:43:08'),
(18, 'certificate 6', NULL, NULL, NULL, NULL, '', 4, NULL, NULL, 'Active', '2023-06-19 00:40:48', '2023-06-25 02:43:08', '2023-06-25 02:43:08'),
(19, 'Certificate 1', 'Lorem Ipsum is simply dummy text of the printing and typesetting', '<div class=\"larg-title\">\r\n<p>Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n</div>\r\n<ul class=\"list-inline\">\r\n<li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>\r\n<li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>\r\n</ul>', 'uploads/team/team1686986417.png', 'uploads/team/team1686986416.webp', '', 1, 'www.facebook.com', 'www.linkedin.com', 'Active', '2023-04-15 09:30:26', '2023-06-25 02:44:09', NULL),
(20, 'Certificate 3', 'Lorem Ipsum is simply dummy text of the printing and typesetting', '<div class=\"larg-title\">\r\n<p>Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n</div>\r\n<ul class=\"list-inline\">\r\n<li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>\r\n<li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>\r\n</ul>', 'uploads/team/team1686987858.png', 'uploads/team/team1686987858.webp', '', 3, NULL, NULL, 'Active', '2023-04-15 09:32:01', '2023-06-25 02:45:05', NULL),
(21, 'Certificate 1', 'Lorem Ipsum is simply dummy text of the printing and typesetting', '<div class=\"larg-title\">\r\n<p>Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n</div>\r\n<ul class=\"list-inline\">\r\n<li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>\r\n<li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>\r\n</ul>', 'uploads/team/team1686986417.png', 'uploads/team/team1686986416.webp', '', 1, 'www.facebook.com', 'www.linkedin.com', 'Active', '2023-04-15 09:30:26', '2023-06-25 02:44:09', NULL),
(22, 'Certificate 1', 'Lorem Ipsum is simply dummy text of the printing and typesetting', '<div class=\"larg-title\">\r\n<p>Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n</div>\r\n<ul class=\"list-inline\">\r\n<li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>\r\n<li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>\r\n</ul>', 'uploads/team/team1686986417.png', 'uploads/team/team1686986416.webp', '', 1, 'www.facebook.com', 'www.linkedin.com', 'Active', '2023-04-15 09:30:26', '2023-06-25 02:44:09', NULL),
(23, 'Certificate 10', 'Lorem Ipsum is simply dummy text of the printing and typesetting', '<div class=\"larg-title\">\r\n<p>Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n</div>\r\n<ul class=\"list-inline\">\r\n<li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>\r\n<li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>\r\n</ul>', 'uploads/team/team1686986417.png', 'uploads/team/team1686986416.webp', '', 1, 'www.facebook.com', 'www.linkedin.com', 'Active', '2023-04-15 09:30:26', '2023-06-25 02:44:09', NULL),
(24, 'Certificate 20', 'Lorem Ipsum is simply dummy text of the printing and typesetting', '<div class=\"larg-title\">\r\n<p>Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n</div>\r\n<ul class=\"list-inline\">\r\n<li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>\r\n<li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>\r\n</ul>', 'uploads/team/team1686986471.png', 'uploads/team/team1686986471.webp', '', 2, NULL, NULL, 'Active', '2023-05-03 09:46:06', '2023-06-25 02:44:37', NULL),
(25, 'certificate 50', NULL, NULL, NULL, NULL, '', 4, NULL, NULL, 'Active', '2023-06-19 00:40:48', '2023-06-25 02:43:08', '2023-06-25 02:43:08');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `author_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `designation` text COLLATE utf8_unicode_ci,
  `location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `video_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8_unicode_ci,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `webp_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_attribute` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `author_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `author_image_webp` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `author_image_attribute` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rating` int(11) NOT NULL DEFAULT '1',
  `review_type` enum('Normal','Google','Facebook','Instagram') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Normal',
  `sort_order` int(11) NOT NULL,
  `is_featured` enum('Yes','No') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No',
  `display_to_home` enum('Yes','No') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No',
  `status` enum('Active','Inactive') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `title`, `author_name`, `designation`, `location`, `video_url`, `message`, `image`, `webp_image`, `image_attribute`, `author_image`, `author_image_webp`, `author_image_attribute`, `rating`, `review_type`, `sort_order`, `is_featured`, `display_to_home`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(21, NULL, 'Anuraj R', 'Operations Manager,Pentacodes', NULL, NULL, '<p><span style=\"font-weight: 400;\">I just want to take the time to compliment you guys on your IMPRESSIVE work. Egyptian &amp; Emirates Logistics has been instrumental in my ability to focus on expanding my business into new markets and driving sales. We experienced very professional service from the team and their partners in Dubai, and everything was delivered on time and in perfect condition. </span></p>', NULL, NULL, '', 'uploads/testimonial/author_image/testimonial1683185051.png', 'uploads/testimonial/author_image_webp/testimonial1683185051.webp', 'alt=\"Egyptian Air Cargo\"', 3, 'Google', 1, 'No', 'No', 'Active', '2023-04-15 06:32:33', '2023-06-23 07:02:50', '2023-06-23 07:02:50'),
(22, 'Abosolute Spots On!', 'Wattson Maxido', 'AdX Solutions', NULL, NULL, '<p><span style=\"font-weight: 400;\">We were very pleased with the level of service we received from the Mag Air Cargo teams. We appreciate your understanding of our vision and your recommendations on how to improve our service as well as opportunities to expand. This team rocks! Keep up the good work, and thanks again for the effort well beyond reasonable expectations. </span></p>', NULL, NULL, '', 'uploads/testimonial/author_image/testimonial1687605251.png', 'uploads/testimonial/author_image_webp/testimonial1687605251.webp', 'alt=\"Egyptian Air Cargo\"', 5, 'Google', 1, 'No', 'Yes', 'Active', '2023-04-15 06:45:49', '2023-06-25 22:24:30', NULL),
(23, 'Hence We found A fast  Cargo', 'Vineeth Valliyodan', 'BDM, Pentacodes LLP', NULL, NULL, '<p><span style=\"font-weight: 400;\">CWe have been using Mag Air Cargo Services for years. Their warehousing and transportation services have taken many of the headaches out of our supply chain, all at a reasonable price. And, of course, your expertise in logistics, managing our changing demands, and shipping customer material is unmatched. That is priceless.</span></p>', NULL, NULL, '', 'uploads/testimonial/author_image/testimonial1687605263.png', 'uploads/testimonial/author_image_webp/testimonial1687605263.webp', 'alt=\"Egyptian Air Cargo\"', 4, 'Facebook', 2, 'No', 'Yes', 'Active', '2023-04-15 06:47:25', '2023-06-30 05:59:37', NULL),
(24, 'Test testimonial 1', 'Tester one', 'Test', NULL, NULL, '<p>Test testimonial one</p>', NULL, NULL, '', 'uploads/testimonial/author_image/testimonial1684475950.jpg', 'uploads/testimonial/author_image_webp/testimonial1684475950.webp', 'alt=\"Egyptian Air Cargo\"', 1, 'Normal', 1, 'No', 'Yes', 'Active', '2023-05-19 05:59:10', '2023-06-24 05:41:01', '2023-06-24 05:41:01'),
(25, 'Test Testimonial 2', 'Tester two', 'Software Tester', NULL, NULL, '<p>Test google review .</p>', NULL, NULL, '', NULL, NULL, 'alt=\"Egyptian Air Cargo\"', 4, 'Instagram', 5, 'No', 'Yes', 'Active', '2023-05-19 06:11:10', '2023-06-24 05:40:56', '2023-06-24 05:40:56'),
(26, 'szcc', 'zxc', 'cxzc', NULL, NULL, '<p>xzc</p>', NULL, NULL, '', NULL, NULL, 'alt=\"Egyptian Air Cargo\"', 1, 'Normal', 7, 'No', 'No', 'Active', '2023-05-19 06:19:12', '2023-05-19 06:19:21', '2023-05-19 06:19:21'),
(27, NULL, 'xsh', 'dfg', NULL, NULL, '<p>zxdfh</p>', NULL, NULL, '', 'uploads/testimonial/author_image/testimonial1685165570.jpg', 'uploads/testimonial/author_image_webp/testimonial1685165570.webp', 'alt=\"Pentacodes\"', 1, 'Instagram', 7, 'No', 'Yes', 'Active', '2023-05-27 01:32:50', '2023-06-24 05:40:53', '2023-06-24 05:40:53'),
(28, NULL, 'lijo', 'dev', NULL, NULL, '<p>uouio</p>', NULL, NULL, '', 'uploads/testimonial/author_image/testimonial1687794273.png', 'uploads/testimonial/author_image_webp/testimonial1687794273.webp', 'alt=\"Mag Air Cargo\"', 4, 'Facebook', 3, 'No', 'No', 'Active', '2023-06-26 10:14:33', '2023-06-26 10:18:58', '2023-06-26 10:18:58'),
(29, 'asd', 'test', 'njn', NULL, NULL, '<p>vhvjvjh jvhjvhjv</p>', NULL, NULL, '', NULL, NULL, 'alt=\"Mag Air Cargo\"', 3, 'Instagram', 3, 'No', 'No', 'Active', '2023-06-30 05:50:58', '2023-06-30 05:50:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `text_us_partner_enquiries`
--

CREATE TABLE `text_us_partner_enquiries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `industry` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `job_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `residence` int(11) DEFAULT NULL,
  `message` longtext COLLATE utf8_unicode_ci,
  `reply` longtext COLLATE utf8_unicode_ci,
  `reply_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `profile_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `profile_image_webp` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_attribute` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('Active','Inactive') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Active',
  `token` text COLLATE utf8_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `username`, `password`, `profile_image`, `profile_image_webp`, `image_attribute`, `status`, `token`, `remember_token`, `email_verified_at`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', 'ullas.pentacodes@gmail.com', '1122334455', 'admin', '$2y$10$E.yJQwf.cQDUfwYMDyT6k.OK.MZ42TtJQTeXPi56FeH3olbx6sa3i', NULL, NULL, NULL, 'Active', '2a71018eff2c0e39f3b73ab3afc4eba6e9feb45235c36c026fb5cd60694a51414f2ded3cafba8f8a7003b27075607e79db05ebccfe075489244b61c8f5b6a27b', NULL, '2022-12-01 07:01:34', '2022-12-01 07:01:34', '2023-05-27 06:22:28', NULL),
(2, 'Penta', 'operations@pentacodes.com', '0545864308', 'penta12', '$2y$10$HUP7e9s2NFgRf0mhdb4H8.VCkd26mr44SLTooho.0AGASyQeL/8XG', NULL, NULL, NULL, 'Active', '0730161694997360cc470e222bb17bb98f6d2f8d55adf16d33657ce4f7efe295a0a04802e7e5a5e51086e4d37384d5fa616cd5edde2f0a5e3fac4acf0f7dabb5', NULL, '2023-05-01 05:46:07', '2023-05-01 05:44:46', '2023-05-02 03:15:23', '2023-05-02 03:15:23'),
(3, 'ajeeesh', 'ajeesh.pentacodesllp@gmail.com', '9846942618', 'ajeesh', '$2y$10$D477TtwLZz/QjzbH2WXXKeLSCl72f2nWxlyTlFjJ4y.H0/.lleeVC', NULL, NULL, NULL, 'Active', 'af9ad0a9f4dabd3ada337030c58d3c6bd3122c87524d1d32d91b84419944ab7d91847a5c3fbdf3ecf91a390a55106bbaac6712eb52ed57e3a6dfe02c43c2dfff', NULL, NULL, '2023-05-02 01:09:20', '2023-05-02 03:09:44', '2023-05-02 03:09:44'),
(4, 'Anu', 'operations@pentacodes.com', '+971545864308', 'penta20', '$2y$10$vawRxJ7KLjk2hiDlw7myb.9Y7JAvkIXaogy8agJkAGoZ9PcqHMo5W', 'uploads/admin/profile_image/admin1683017226.jpg', NULL, NULL, 'Active', 'UQqrR3hxXjl0nzmcqFCIIgSrcORsxIsFpgwWLvjBx4IcoZaP5Glbi9y9ZxyTgTpr', NULL, NULL, '2023-05-02 03:17:06', '2023-05-23 08:31:58', NULL),
(5, 'subin', 'subinbaby.3@rediffmail.com', '9946352014', 'subinbaby.3@rediffmail.com', '$2y$10$a3e3grJgfwRxGBNDAJbeeersbYrntd0pzjktHCA./J2Khpg4hNfUu', 'uploads/admin/profile_image/admin1684827794.jpg', NULL, NULL, 'Inactive', '174dd52951c211e2de2ffcd50104ad667c3ebb43065b0bd0fedb79935a2e4db3abaa5b4e6f54f165b8210f933a2f3fbbeab5a33cc0818e19b36820595b53cac6', NULL, '2023-05-23 07:38:35', '2023-05-23 07:35:55', '2023-05-23 08:32:02', NULL),
(6, 'Subin', 'subin.pentacodesllp@gmail.com', '9946567', 'subinbaby', '$2y$10$ji5Ut3sXF/fPQFO3Ayrr2.M5CMhVnIXL45.wtLHIG.XLaHFGpqcle', 'uploads/admin/profile_image/admin1684827907.jpg', NULL, NULL, 'Active', '2e4d385c7db3bacc3e38e5f96370902576289f604b1d96b85ca572d9f76060e15dfd09c5a0dfa4aab43561de34645ff86c73ea4e959add1538b7f5b6f383fb16', NULL, '2023-05-23 07:47:25', '2023-05-23 07:45:07', '2023-06-30 07:44:20', NULL),
(7, 'Tester one', 'subin@gmail.com', '994602536', 'subin1', '$2y$10$LYXWAyOLDtxgveIbU9HZxuXOYLhnvU3o//mrKYd8/aJ8wnzaC3fd2', 'uploads/admin/profile_image/admin1684828322.webp', NULL, NULL, 'Active', 'gdc5du1PSDp0O8mB9JlmZl9yQwGHTElHz2HdD9dQj6myuo5HS4VulGsQZOE3x7DZ', NULL, NULL, '2023-05-23 07:52:02', '2023-05-23 07:52:02', NULL),
(8, 'test', 'test@gmail.don', '994654545', '12345', '$2y$10$pLl/yBnsU4ik/77mbm91BOwFJQYipXBJypMLDhnSasMADX6GT7JPK', 'uploads/admin/profile_image/admin1684828937.webp', NULL, NULL, 'Active', '9XvlbKoL03t7hfFZZKrOx73byHMosUosJdSXfo6VB0gd2opimXFjdloX03vbhXzX', NULL, NULL, '2023-05-23 08:00:16', '2023-05-23 08:02:17', NULL),
(9, 'Test S admin', 'testadmin@gmail.com', '9946360210', 'tester one', '$2y$10$sbylLBEEm2RtQda.XLPhpumkGNojr7LbDG5VFDDUZ.iS9uKaUjqK.', NULL, NULL, NULL, 'Active', 'VvDOuBBo8BYceIE34Ebs1d2mLKN5uURtcUx4y9xwquiMeOCtxYKLEZacKpy6LMHW', NULL, NULL, '2023-05-23 08:07:03', '2023-05-23 08:10:04', NULL),
(11, 'very new admin', 'lijo.pentacodes@gmail.com', '3453454354', 'verynewadmin', '$2y$10$5VIpS.oWs3sb2r9/12bA7uY3Edeg85ebvsOt5KL3Juw7gt6aLEtQC', 'uploads/admin/profile_image/admin1685349964.jpg', NULL, NULL, 'Active', 'ddb3a82a6cb6c815550c0501b563389942ce1f08d378e078d5b964fbd4897f2e45d126bbf3d235388f14653ab8e0464ebd2c5810d0da404b2d14ab240b911847', NULL, '2023-05-29 04:46:40', '2023-05-29 04:46:04', '2023-06-28 09:52:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `htag` enum('H1','H2','H3','H4','H5','H6') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'H1',
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `short_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `video_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `posted_date` date DEFAULT NULL,
  `posted_by` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` longtext COLLATE utf8_unicode_ci,
  `webp_image` longtext COLLATE utf8_unicode_ci,
  `image_meta_tag` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `short_description` longtext COLLATE utf8_unicode_ci,
  `description` longtext COLLATE utf8_unicode_ci,
  `banner_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8_unicode_ci,
  `meta_keyword` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `other_meta_tag` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort_order` int(11) NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visit_links`
--

CREATE TABLE `visit_links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `image_webp` text COLLATE utf8mb4_unicode_ci,
  `image_attribute` text COLLATE utf8mb4_unicode_ci,
  `sort_order` int(11) NOT NULL,
  `display_to_home` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No',
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visit_links`
--

INSERT INTO `visit_links` (`id`, `title`, `url`, `image`, `image_webp`, `image_attribute`, `sort_order`, `display_to_home`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Egyptian Emirates', 'http://egyptianemirates.net/', 'uploads/visit-us/image/visit-us1687680131.png', 'uploads/visit-us/image/visit-us1687680131.webp', 'alt=\"Egyptian Air Cargo\"', 1, 'No', 'Active', '2023-04-28 05:03:00', '2023-06-25 02:32:11', NULL),
(2, 'Name 2', 'https://www.haec.ae/', 'uploads/visit-us/image/visit-us1687680648.png', 'uploads/visit-us/image/visit-us1687680648.webp', 'alt=\"Egyptian Air Cargo\"', 2, 'No', 'Active', '2023-04-28 05:04:54', '2023-06-25 02:40:48', NULL),
(3, 'xsa', 'swaxs', 'uploads/visit-us/image/visit-us1682672706.png', 'uploads/visit-us/image/visit-us1682672706.webp', 'alt=\"Egyptian Air Cargo\"', 3, 'No', 'Active', '2023-04-28 05:05:06', '2023-04-28 05:05:51', '2023-04-28 05:05:51'),
(4, 'Test', 'www.haec.ae', 'uploads/visit-us/image/visit-us1682915650.jpg', 'uploads/visit-us/image/visit-us1682915650.webp', 'alt=\"Egyptian Air Cargo\"', 3, 'No', 'Active', '2023-04-30 23:04:10', '2023-04-30 23:05:39', '2023-04-30 23:05:39'),
(5, 'Name3', 'pentacodes.com', 'uploads/visit-us/image/visit-us1683007702.jpg', 'uploads/visit-us/image/visit-us1683007702.webp', 'alt=\"Egyptian Air Cargo\"', 3, 'No', 'Inactive', '2023-05-02 00:38:22', '2023-05-02 00:40:36', '2023-05-02 00:40:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aboutussliders`
--
ALTER TABLE `aboutussliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `about_banners`
--
ALTER TABLE `about_banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `about_features`
--
ALTER TABLE `about_features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `associates`
--
ALTER TABLE `associates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `careers`
--
ALTER TABLE `careers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `casestudies`
--
ALTER TABLE `casestudies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `casestudytypes`
--
ALTER TABLE `casestudytypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enquiries`
--
ALTER TABLE `enquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `extra_tags`
--
ALTER TABLE `extra_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `founder_messages`
--
ALTER TABLE `founder_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_companies`
--
ALTER TABLE `group_companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hirings`
--
ALTER TABLE `hirings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hiring_tags`
--
ALTER TABLE `hiring_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_about_us`
--
ALTER TABLE `home_about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_banners`
--
ALTER TABLE `home_banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_footer_sections`
--
ALTER TABLE `home_footer_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_get_in_touches`
--
ALTER TABLE `home_get_in_touches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_our_services`
--
ALTER TABLE `home_our_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_videos`
--
ALTER TABLE `home_videos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `how_we_can_helps`
--
ALTER TABLE `how_we_can_helps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobapplications`
--
ALTER TABLE `jobapplications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `journeys`
--
ALTER TABLE `journeys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `key_features`
--
ALTER TABLE `key_features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meta_tags`
--
ALTER TABLE `meta_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `our_processes`
--
ALTER TABLE `our_processes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partner_benefits`
--
ALTER TABLE `partner_benefits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photo_galleries`
--
ALTER TABLE `photo_galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolios`
--
ALTER TABLE `portfolios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolio_galleries`
--
ALTER TABLE `portfolio_galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `procesesses`
--
ALTER TABLE `procesesses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `processcommitments`
--
ALTER TABLE `processcommitments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `program_benefits`
--
ALTER TABLE `program_benefits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `program_blogs`
--
ALTER TABLE `program_blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `program_details`
--
ALTER TABLE `program_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `program_faqs`
--
ALTER TABLE `program_faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `program_requirements`
--
ALTER TABLE `program_requirements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quck_links`
--
ALTER TABLE `quck_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `section_headings`
--
ALTER TABLE `section_headings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `section_headings_type_unique` (`type`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_categories`
--
ALTER TABLE `service_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_faqs`
--
ALTER TABLE `service_faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_faq_connect`
--
ALTER TABLE `service_faq_connect`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_galleries`
--
ALTER TABLE `service_galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siteimages`
--
ALTER TABLE `siteimages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_information`
--
ALTER TABLE `site_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_services`
--
ALTER TABLE `sub_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support_services`
--
ALTER TABLE `support_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `text_us_partner_enquiries`
--
ALTER TABLE `text_us_partner_enquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visit_links`
--
ALTER TABLE `visit_links`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aboutussliders`
--
ALTER TABLE `aboutussliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `about_banners`
--
ALTER TABLE `about_banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `about_features`
--
ALTER TABLE `about_features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `agents`
--
ALTER TABLE `agents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `associates`
--
ALTER TABLE `associates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `careers`
--
ALTER TABLE `careers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `casestudies`
--
ALTER TABLE `casestudies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `casestudytypes`
--
ALTER TABLE `casestudytypes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `enquiries`
--
ALTER TABLE `enquiries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `extra_tags`
--
ALTER TABLE `extra_tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `founder_messages`
--
ALTER TABLE `founder_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `group_companies`
--
ALTER TABLE `group_companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `hirings`
--
ALTER TABLE `hirings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `hiring_tags`
--
ALTER TABLE `hiring_tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `home_about_us`
--
ALTER TABLE `home_about_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `home_banners`
--
ALTER TABLE `home_banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `home_footer_sections`
--
ALTER TABLE `home_footer_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `home_get_in_touches`
--
ALTER TABLE `home_get_in_touches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `home_our_services`
--
ALTER TABLE `home_our_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `home_videos`
--
ALTER TABLE `home_videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `how_we_can_helps`
--
ALTER TABLE `how_we_can_helps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jobapplications`
--
ALTER TABLE `jobapplications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `journeys`
--
ALTER TABLE `journeys`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `key_features`
--
ALTER TABLE `key_features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `meta_tags`
--
ALTER TABLE `meta_tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `our_processes`
--
ALTER TABLE `our_processes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `partner_benefits`
--
ALTER TABLE `partner_benefits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `photo_galleries`
--
ALTER TABLE `photo_galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `portfolios`
--
ALTER TABLE `portfolios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `portfolio_galleries`
--
ALTER TABLE `portfolio_galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `procesesses`
--
ALTER TABLE `procesesses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `processcommitments`
--
ALTER TABLE `processcommitments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `program_benefits`
--
ALTER TABLE `program_benefits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `program_blogs`
--
ALTER TABLE `program_blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `program_details`
--
ALTER TABLE `program_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `program_faqs`
--
ALTER TABLE `program_faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `program_requirements`
--
ALTER TABLE `program_requirements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quck_links`
--
ALTER TABLE `quck_links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `section_headings`
--
ALTER TABLE `section_headings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `service_categories`
--
ALTER TABLE `service_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `service_faqs`
--
ALTER TABLE `service_faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `service_faq_connect`
--
ALTER TABLE `service_faq_connect`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service_galleries`
--
ALTER TABLE `service_galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `siteimages`
--
ALTER TABLE `siteimages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `site_information`
--
ALTER TABLE `site_information`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `sub_services`
--
ALTER TABLE `sub_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `support_services`
--
ALTER TABLE `support_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `text_us_partner_enquiries`
--
ALTER TABLE `text_us_partner_enquiries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `visit_links`
--
ALTER TABLE `visit_links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
