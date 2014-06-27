-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 27, 2014 at 09:34 PM
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
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `title` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Table structure for table `front_end_menus`
--

CREATE TABLE IF NOT EXISTS `front_end_menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(40) NOT NULL,
  `menu_code` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Table structure for table `hot_spots`
--

CREATE TABLE IF NOT EXISTS `hot_spots` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `head` varchar(30) NOT NULL,
  `descr` varchar(200) NOT NULL,
  `first_compliance` varchar(25) NOT NULL,
  `second_compliance` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Table structure for table `hot_spots_outlet_types`
--

CREATE TABLE IF NOT EXISTS `hot_spots_outlet_types` (
  `hot_spot_id` int(11) NOT NULL,
  `outlet_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mapping_hotspots`
--

CREATE TABLE IF NOT EXISTS `mapping_hotspots` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `outlet_type_id` int(11) NOT NULL,
  `hot_spot_id` int(11) NOT NULL,
  `hotspot_order` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `mapping_new_products`
--

CREATE TABLE IF NOT EXISTS `mapping_new_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `outlet_type_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `sku` varchar(15) DEFAULT NULL,
  `product_order` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mapping_pops`
--

CREATE TABLE IF NOT EXISTS `mapping_pops` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `outlet_type_id` int(11) NOT NULL,
  `pop_item_id` int(11) NOT NULL,
  `pop_order` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `mapping_trade_promotions`
--

CREATE TABLE IF NOT EXISTS `mapping_trade_promotions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `outlet_type_id` int(11) NOT NULL,
  `program_id` int(11) NOT NULL,
  `trade_promotion_order` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Table structure for table `outlets`
--

CREATE TABLE IF NOT EXISTS `outlets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `outlet_type_id` int(6) NOT NULL,
  `town_id` int(11) NOT NULL,
  `dms_code` varchar(15) NOT NULL,
  `name` varchar(128) NOT NULL,
  `phone` varchar(16) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `class` varchar(10) DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Of which survey will be happened' AUTO_INCREMENT=88784 ;

-- --------------------------------------------------------

--
-- Table structure for table `outlets_users`
--

CREATE TABLE IF NOT EXISTS `outlets_users` (
  `outlet_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `outlet_types`
--

CREATE TABLE IF NOT EXISTS `outlet_types` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `title` varchar(40) NOT NULL,
  `descr` varchar(128) DEFAULT NULL,
  `class` varchar(15) DEFAULT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Type of objects' AUTO_INCREMENT=2448 ;

-- --------------------------------------------------------

--
-- Table structure for table `outlet_types_pop_items`
--

CREATE TABLE IF NOT EXISTS `outlet_types_pop_items` (
  `outlet_type_id` int(11) NOT NULL,
  `pop_item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `parts`
--

CREATE TABLE IF NOT EXISTS `parts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL,
  `front_end_menu_id` int(11) NOT NULL,
  `descr` varchar(256) DEFAULT NULL,
  `is_optional` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Whether this part is optional for the survey or not',
  `task_join_type` enum('And','Or') NOT NULL DEFAULT 'And',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Various parts of a survey' AUTO_INCREMENT=38 ;

-- --------------------------------------------------------

--
-- Table structure for table `parts_survey_types`
--

CREATE TABLE IF NOT EXISTS `parts_survey_types` (
  `survey_type_id` int(11) NOT NULL,
  `part_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `parts_tasks`
--

CREATE TABLE IF NOT EXISTS `parts_tasks` (
  `part_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pop_items`
--

CREATE TABLE IF NOT EXISTS `pop_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `head` varchar(20) NOT NULL,
  `descr` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL,
  `descr` varchar(256) NOT NULL,
  `sku` varchar(15) NOT NULL,
  `category_id` int(5) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `sku` (`sku`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=149 ;

-- --------------------------------------------------------

--
-- Table structure for table `products_subsets`
--

CREATE TABLE IF NOT EXISTS `products_subsets` (
  `product_id` int(11) NOT NULL,
  `subset_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `products_tasks`
--

CREATE TABLE IF NOT EXISTS `products_tasks` (
  `task_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE IF NOT EXISTS `programs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `descr` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE IF NOT EXISTS `regions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(40) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `subsets`
--

CREATE TABLE IF NOT EXISTS `subsets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `task_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `active_sku_code` varchar(20) NOT NULL,
  `end_sku_code` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=116 ;

-- --------------------------------------------------------

--
-- Table structure for table `surveys`
--

CREATE TABLE IF NOT EXISTS `surveys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `outlet_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '1',
  `is_failure` tinyint(1) NOT NULL DEFAULT '0',
  `failure_cause` varchar(255) DEFAULT NULL,
  `must_sku` text,
  `fixed_display` text,
  `new_product` text,
  `trade_promotion` text,
  `pop` text,
  `hot_spot` text,
  `additional_info` text,
  `first_image` varchar(128) DEFAULT NULL,
  `second_image` varchar(128) DEFAULT NULL,
  `lattitude` double NOT NULL,
  `longitude` double NOT NULL,
  `date_time` datetime NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=262 ;

-- --------------------------------------------------------

--
-- Table structure for table `survey_attributes`
--

CREATE TABLE IF NOT EXISTS `survey_attributes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `type` enum('numeric','boolean','text') NOT NULL DEFAULT 'text',
  PRIMARY KEY (`id`),
  UNIQUE KEY `title` (`title`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Various survey categories' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `outlet_type_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `descr` varchar(256) DEFAULT NULL,
  `surv_attr_ids` varchar(100) NOT NULL,
  `guide_lines` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Represents the Each Form/Table of questions for survey' AUTO_INCREMENT=61 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=126 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=249 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(6) DEFAULT NULL,
  `survey_type_id` int(6) DEFAULT NULL,
  `is_surveyor` tinyint(1) NOT NULL DEFAULT '0',
  `town_id` int(11) DEFAULT '0',
  `name` varchar(50) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(50) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='For various users, like Admin, Staff, Members etc' AUTO_INCREMENT=3 ;
