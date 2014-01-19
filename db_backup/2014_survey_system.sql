-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 19, 2014 at 06:37 PM
-- Server version: 5.1.33
-- PHP Version: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `2014_survey_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `outlets`
--

CREATE TABLE IF NOT EXISTS `outlets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `outlet_type_id` int(6) NOT NULL,
  `town_id` int(11) NOT NULL,
  `outlet_code` varchar(15) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) DEFAULT NULL,
  `phone` varchar(16) NOT NULL,
  `address` varchar(255) NOT NULL,
  `website` varchar(128) DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Of which survey will be happened' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `outlets`
--


-- --------------------------------------------------------

--
-- Table structure for table `outlets_users`
--

CREATE TABLE IF NOT EXISTS `outlets_users` (
  `outlet_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `outlets_users`
--


-- --------------------------------------------------------

--
-- Table structure for table `outlet_types`
--

CREATE TABLE IF NOT EXISTS `outlet_types` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `title` varchar(40) NOT NULL,
  `descr` varchar(128) DEFAULT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Type of objects' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `outlet_types`
--


-- --------------------------------------------------------

--
-- Table structure for table `parts`
--

CREATE TABLE IF NOT EXISTS `parts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL,
  `descr` varchar(256) DEFAULT NULL,
  `is_optional` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Whether this part is optional for the survey or not',
  `task_join_type` enum('And','Or') NOT NULL DEFAULT 'And',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Various parts of a survey' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `parts`
--


-- --------------------------------------------------------

--
-- Table structure for table `parts_survey_types`
--

CREATE TABLE IF NOT EXISTS `parts_survey_types` (
  `survey_type_id` int(11) NOT NULL,
  `part_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parts_survey_types`
--


-- --------------------------------------------------------

--
-- Table structure for table `parts_tasks`
--

CREATE TABLE IF NOT EXISTS `parts_tasks` (
  `part_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parts_tasks`
--


-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL,
  `descr` varchar(256) NOT NULL,
  `sku` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `products`
--


-- --------------------------------------------------------

--
-- Table structure for table `products_tasks`
--

CREATE TABLE IF NOT EXISTS `products_tasks` (
  `task_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products_tasks`
--


-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `code` varchar(20) DEFAULT NULL,
  `is_optional` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `category_id`, `subcategory_id`, `title`, `code`, `is_optional`, `created`, `modified`) VALUES
(1, 1, 1, 'Wheel Laundry Soap 130g', '201', 0, '2014-01-14 22:58:50', '2014-01-14 22:58:50'),
(2, 1, 1, 'Wheel washing powder 500g', '202', 0, '2014-01-14 22:59:13', '2014-01-14 22:59:13'),
(3, 1, 1, 'Wheel washing powder 200g', '203', 0, '2014-01-14 22:59:31', '2014-01-14 22:59:31'),
(4, 1, 1, 'Wheel washing powder 30g', '204', 0, '2014-01-14 22:59:54', '2014-01-14 22:59:54');

-- --------------------------------------------------------

--
-- Table structure for table `question_details`
--

CREATE TABLE IF NOT EXISTS `question_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question_id` int(11) NOT NULL,
  `title` varchar(64) NOT NULL,
  `answer_type_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `question_details`
--


-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE IF NOT EXISTS `regions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(40) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `regions`
--


-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `title` varchar(20) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Role of an User' AUTO_INCREMENT=4 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `title`, `created`, `modified`) VALUES
(1, 'Admin', '2014-01-14 16:35:49', '2014-01-14 16:35:49'),
(2, 'Member', '2014-01-14 16:35:59', '2014-01-14 16:35:59'),
(3, 'Surveyor', '2014-01-14 16:36:16', '2014-01-14 16:36:16');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `variable_name` varchar(50) NOT NULL,
  `variable_label` varchar(64) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `settings`
--


-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE IF NOT EXISTS `subcategories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `subtitle_or_code` varchar(256) DEFAULT NULL,
  `descr` text NOT NULL,
  `is_optional` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `category_id`, `title`, `subtitle_or_code`, `descr`, `is_optional`, `status`, `created`, `modified`) VALUES
(1, 1, 'Part 1:  On Shelf Availability', 'UNG - MUST HAVE SKU', 'Q2. Please count and record the Unilever SKU below:', 0, 1, '2014-01-14 22:57:52', '2014-01-14 22:57:52'),
(2, 1, 'Part 2: Fixed Display - Plan-o-gram and Quantity', 'Set 1:', 'Q3.a Please fill up the grid below as per the Plan-o-gram for the following Unilever brands/SKUs. (For Availability and Sequence, if yes, encircle Y; if no, encircle N).', 1, 1, '2014-01-14 23:14:29', '2014-01-14 23:14:29'),
(3, 1, 'Part 2: Fixed Display - Plan-o-gram and Quantity', 'Set 2:', 'Q3.b Please fill up the grid below as per the Plan-o-gram for the following Unilever brands/SKUs. (For Availability and Sequence, if yes, encircle Y; if no, encircle N).', 1, 1, '2014-01-14 23:15:48', '2014-01-14 23:15:48');

-- --------------------------------------------------------

--
-- Table structure for table `surveys`
--

CREATE TABLE IF NOT EXISTS `surveys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  `outlet_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `responder_name` varchar(40) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `responder_role` varchar(20) DEFAULT NULL,
  `image` varchar(128) DEFAULT NULL,
  `time` datetime NOT NULL,
  `lattitude` double NOT NULL,
  `longitude` double NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `surveys`
--


-- --------------------------------------------------------

--
-- Table structure for table `survey_attributes`
--

CREATE TABLE IF NOT EXISTS `survey_attributes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(30) NOT NULL,
  `type` enum('numeric','boolean','text') NOT NULL DEFAULT 'text',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `survey_attributes`
--


-- --------------------------------------------------------

--
-- Table structure for table `survey_details`
--

CREATE TABLE IF NOT EXISTS `survey_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `survey_id` int(11) NOT NULL,
  `question_detail_id` int(11) NOT NULL,
  `answer` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `survey_details`
--


-- --------------------------------------------------------

--
-- Table structure for table `survey_types`
--

CREATE TABLE IF NOT EXISTS `survey_types` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL,
  `descr` varchar(128) NOT NULL,
  `code` varchar(15) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Various survey categories' AUTO_INCREMENT=2 ;

--
-- Dumping data for table `survey_types`
--

INSERT INTO `survey_types` (`id`, `title`, `descr`, `code`, `created`) VALUES
(1, 'UNG', 'PERFECT STORE â€“ Questionnaire (UNG)', 'UNG', '2014-01-14 22:45:48');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL,
  `descr` varchar(256) DEFAULT NULL,
  `surv_attr_ids` varchar(100) NOT NULL,
  `guide_lines` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Represents the Each Form/Table of questions for survey' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tasks`
--


-- --------------------------------------------------------

--
-- Table structure for table `territories`
--

CREATE TABLE IF NOT EXISTS `territories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `region_id` int(11) NOT NULL,
  `title` varchar(40) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `territories`
--


-- --------------------------------------------------------

--
-- Table structure for table `towns`
--

CREATE TABLE IF NOT EXISTS `towns` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `territory_id` int(11) NOT NULL,
  `title` varchar(40) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `towns`
--


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(6) DEFAULT NULL,
  `category_id` int(6) DEFAULT NULL,
  `is_surveyor` tinyint(1) NOT NULL DEFAULT '0',
  `town_id` int(11) DEFAULT '0',
  `name` varchar(50) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(50) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='For various users, like Admin, Staff, Members etc' AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `category_id`, `is_surveyor`, `town_id`, `name`, `email`, `password`, `created`, `modified`) VALUES
(1, 1, NULL, 0, 0, 'Mushfiqur Rahman', 'mushfique@codetrio.com', '98b1047581990052900897caf62daccf14464354', '2014-01-14 22:33:39', '2014-01-14 22:33:39');
