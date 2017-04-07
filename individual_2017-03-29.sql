# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.16)
# Database: individual
# Generation Time: 2017-03-29 14:32:33 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table booking
# ------------------------------------------------------------

DROP TABLE IF EXISTS `booking`;

CREATE TABLE `booking` (
  `bookingID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `paymentID` int(10) DEFAULT NULL,
  `userID` int(10) DEFAULT NULL,
  `artistID` int(10) DEFAULT NULL,
  `bookingDate` date NOT NULL,
  `bookingLength` int(2) NOT NULL,
  `bookingMessage` varchar(250) DEFAULT NULL,
  `bookingTime` date NOT NULL,
  `accepted` tinyint(1) DEFAULT NULL,
  `cancelled` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`bookingID`),
  KEY `paymentID` (`paymentID`),
  KEY `userID` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table comments
# ------------------------------------------------------------

DROP TABLE IF EXISTS `comments`;

CREATE TABLE `comments` (
  `commentID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `userID` int(11) DEFAULT NULL,
  `comment` varchar(250) DEFAULT NULL,
  `notificationMessage` varchar(250) DEFAULT NULL,
  `deleted` int(10) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`commentID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table conversations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `conversations`;

CREATE TABLE `conversations` (
  `conversationID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `recipientID` int(10) DEFAULT NULL,
  `senderID` int(10) DEFAULT NULL,
  `messageTime` date DEFAULT NULL,
  PRIMARY KEY (`conversationID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table messages
# ------------------------------------------------------------

DROP TABLE IF EXISTS `messages`;

CREATE TABLE `messages` (
  `messageID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `conversationID` int(10) DEFAULT NULL,
  `time` date DEFAULT NULL,
  `sender` int(10) DEFAULT NULL,
  `recipient` int(10) DEFAULT NULL,
  `message` text,
  PRIMARY KEY (`messageID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table notifications
# ------------------------------------------------------------

DROP TABLE IF EXISTS `notifications`;

CREATE TABLE `notifications` (
  `notificationID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `userID` int(10) DEFAULT NULL,
  `notificationType` int(10) DEFAULT NULL,
  `notificationMessage` int(10) DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`notificationID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table payment
# ------------------------------------------------------------

DROP TABLE IF EXISTS `payment`;

CREATE TABLE `payment` (
  `paymentID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bookingID` int(10) DEFAULT NULL,
  `paymentPrice` int(11) DEFAULT NULL,
  `cardName` int(11) DEFAULT NULL,
  `cardNumber` varchar(50) DEFAULT NULL,
  `cvc` int(3) DEFAULT NULL,
  `refunded` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`paymentID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table tattoos
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tattoos`;

CREATE TABLE `tattoos` (
  `tattooID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL,
  `tattooName` varchar(50) DEFAULT NULL,
  `tattooDate` date DEFAULT NULL,
  `tattooTags` varchar(250) DEFAULT NULL,
  `tattooLikes` int(10) DEFAULT NULL,
  `tattooViews` int(10) DEFAULT NULL,
  `tattooShares` int(10) DEFAULT NULL,
  `tattooImage` text,
  `commentID` int(10) DEFAULT NULL,
  PRIMARY KEY (`tattooID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `forename` varchar(20) NOT NULL DEFAULT '',
  `surname` varchar(20) NOT NULL DEFAULT '',
  `dob` date DEFAULT NULL,
  `email` varchar(50) NOT NULL DEFAULT '',
  `password` varchar(250) NOT NULL DEFAULT '',
  `userType` tinyint(1) NOT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `picture` text,
  `media` text,
  `description` text,
  `blocked` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`userID`, `forename`, `surname`, `dob`, `email`, `password`, `userType`, `verified`, `active`, `picture`, `media`, `description`, `blocked`)
VALUES
	(10,'cohen','macdonald','1992-02-03','cohen.macdonald1@gmail.com','test123',1,0,0,NULL,NULL,NULL,0);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
