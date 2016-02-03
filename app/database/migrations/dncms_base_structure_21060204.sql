/*
SQLyog Community v11.22 (32 bit)
MySQL - 5.5.33-MariaDB-log : Database - dnc
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`dnc` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `dnc`;

/*Table structure for table `campaigns` */

DROP TABLE IF EXISTS `campaigns`;

CREATE TABLE `campaigns` (
  `campaign_id` int(10) NOT NULL AUTO_INCREMENT,
  `campaign_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`campaign_id`)
) ENGINE=MyISAM AUTO_INCREMENT=100008 DEFAULT CHARSET=latin1;

/*Table structure for table `dnc_list_campaigns` */

DROP TABLE IF EXISTS `dnc_list_campaigns`;

CREATE TABLE `dnc_list_campaigns` (
  `phone_number` varchar(15) DEFAULT NULL,
  `campaign_id` int(10) DEFAULT NULL,
  `timestamp` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Table structure for table `dnc_list_campaigns2` */

DROP TABLE IF EXISTS `dnc_list_campaigns2`;

CREATE TABLE `dnc_list_campaigns2` (
  `campaign_phone` varchar(20) NOT NULL,
  PRIMARY KEY (`campaign_phone`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Table structure for table `dnc_list_campaigns_lite` */

DROP TABLE IF EXISTS `dnc_list_campaigns_lite`;

CREATE TABLE `dnc_list_campaigns_lite` (
  `phone_number` varchar(15) NOT NULL,
  PRIMARY KEY (`phone_number`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Table structure for table `dnc_list_federal` */

DROP TABLE IF EXISTS `dnc_list_federal`;

CREATE TABLE `dnc_list_federal` (
  `phone_number` varchar(15) NOT NULL,
  PRIMARY KEY (`phone_number`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Table structure for table `dnc_list_federal_state` */

DROP TABLE IF EXISTS `dnc_list_federal_state`;

CREATE TABLE `dnc_list_federal_state` (
  `phone_number` varchar(15) NOT NULL,
  PRIMARY KEY (`phone_number`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Table structure for table `dnc_list_permanent` */

DROP TABLE IF EXISTS `dnc_list_permanent`;

CREATE TABLE `dnc_list_permanent` (
  `phone_number` varchar(15) NOT NULL,
  `campaign_id` int(10) DEFAULT NULL,
  `timestamp` date DEFAULT NULL,
  PRIMARY KEY (`phone_number`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Table structure for table `dnc_list_zip_codes` */

DROP TABLE IF EXISTS `dnc_list_zip_codes`;

CREATE TABLE `dnc_list_zip_codes` (
  `campaign_id` int(10) DEFAULT NULL,
  `zip_code` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Table structure for table `scrub_delete_list` */

DROP TABLE IF EXISTS `scrub_delete_list`;

CREATE TABLE `scrub_delete_list` (
  `ip_address` varchar(20) DEFAULT NULL,
  `campaign_phone` varchar(20) DEFAULT NULL,
  `phone_number` varchar(12) DEFAULT NULL,
  `lead_status` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Table structure for table `scrub_leads` */

DROP TABLE IF EXISTS `scrub_leads`;

CREATE TABLE `scrub_leads` (
  `ip_address` varchar(20) DEFAULT NULL,
  `filename` varchar(150) DEFAULT NULL,
  `phone_number` varchar(10) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(2) DEFAULT NULL,
  `zip_code` varchar(10) DEFAULT NULL,
  `cf1` varchar(100) DEFAULT NULL,
  `cf2` varchar(100) DEFAULT NULL,
  `cf3` varchar(100) DEFAULT NULL,
  `lead_status` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`phone_number`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Table structure for table `temp_upload_campaigns` */

DROP TABLE IF EXISTS `temp_upload_campaigns`;

CREATE TABLE `temp_upload_campaigns` (
  `phone_number` varchar(15) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Table structure for table `temp_upload_campaigns_unique` */

DROP TABLE IF EXISTS `temp_upload_campaigns_unique`;

CREATE TABLE `temp_upload_campaigns_unique` (
  `phone_number` varchar(15) NOT NULL,
  PRIMARY KEY (`phone_number`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Table structure for table `temp_upload_federal_new` */

DROP TABLE IF EXISTS `temp_upload_federal_new`;

CREATE TABLE `temp_upload_federal_new` (
  `area_code` varchar(3) DEFAULT NULL,
  `phone_number` varchar(7) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Table structure for table `temp_upload_federal_update` */

DROP TABLE IF EXISTS `temp_upload_federal_update`;

CREATE TABLE `temp_upload_federal_update` (
  `phone_number` varchar(15) DEFAULT NULL,
  `entry_date` varchar(50) DEFAULT NULL,
  `action` varchar(5) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Table structure for table `user_groupings` */

DROP TABLE IF EXISTS `user_groupings`;

CREATE TABLE `user_groupings` (
  `user_group_id` varchar(20) DEFAULT NULL,
  `campaign_id` int(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Table structure for table `user_groups` */

DROP TABLE IF EXISTS `user_groups`;

CREATE TABLE `user_groups` (
  `user_group_id` varchar(20) DEFAULT NULL,
  `user_group_name` varchar(50) DEFAULT NULL,
  `active` enum('1','0') DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Table structure for table `user_log` */

DROP TABLE IF EXISTS `user_log`;

CREATE TABLE `user_log` (
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `ip_address` varchar(20) DEFAULT NULL,
  `timestamp` varchar(30) DEFAULT NULL,
  `log_status` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) DEFAULT NULL,
  `fullname` varchar(50) DEFAULT NULL,
  `user_level` enum('0','1','2','3','4','5') DEFAULT '0',
  `user_group` varchar(20) DEFAULT NULL,
  `ip_address` varchar(15) DEFAULT NULL,
  `active` enum('1','0') DEFAULT '1',
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Table structure for table `whitelist_log` */

DROP TABLE IF EXISTS `whitelist_log`;

CREATE TABLE `whitelist_log` (
  `phone_number` varchar(15) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `manager_name` varchar(50) DEFAULT NULL,
  `agent_name` varchar(50) DEFAULT NULL,
  `sip_id` varchar(4) DEFAULT NULL,
  `request_date` date DEFAULT NULL,
  `ip_address` varchar(15) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
