-- phpMyAdmin SQL Dump
-- version 4.0.10.19
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 10, 2017 at 11:51 AM
-- Server version: 5.6.35
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `quill`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE IF NOT EXISTS `booking` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `commentID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `userID` int(11) DEFAULT NULL,
  `comment` varchar(250) DEFAULT NULL,
  `notificationMessage` varchar(250) DEFAULT NULL,
  `deleted` int(10) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`commentID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `conversations`
--

CREATE TABLE IF NOT EXISTS `conversations` (
  `conversationID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `recipientID` int(10) DEFAULT NULL,
  `senderID` int(10) DEFAULT NULL,
  `messageTime` date DEFAULT NULL,
  PRIMARY KEY (`conversationID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ipaddress`
--

CREATE TABLE IF NOT EXISTS `ipaddress` (
  `loginIP` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `messageID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `conversationID` int(10) DEFAULT NULL,
  `time` date DEFAULT NULL,
  `sender` int(10) DEFAULT NULL,
  `recipient` int(10) DEFAULT NULL,
  `message` text,
  PRIMARY KEY (`messageID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE IF NOT EXISTS `notifications` (
  `notificationID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `userID` int(10) DEFAULT NULL,
  `notificationType` int(10) DEFAULT NULL,
  `notificationMessage` int(10) DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`notificationID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `paymentID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bookingID` int(10) DEFAULT NULL,
  `paymentPrice` int(11) DEFAULT NULL,
  `cardName` int(11) DEFAULT NULL,
  `cardNumber` varchar(50) DEFAULT NULL,
  `cvc` int(3) DEFAULT NULL,
  `refunded` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`paymentID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tattoos`
--

CREATE TABLE IF NOT EXISTS `tattoos` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `forename` varchar(20) NOT NULL DEFAULT '',
  `surname` varchar(20) NOT NULL DEFAULT '',
  `dob` date DEFAULT NULL,
  `email` varchar(50) NOT NULL DEFAULT '',
  `emailCode` varchar(32) DEFAULT NULL,
  `password` varchar(250) NOT NULL DEFAULT '',
  `userType` int(1) NOT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `picture` text,
  `media` text,
  `description` text,
  `blocked` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `forename`, `surname`, `dob`, `email`, `emailCode`, `password`, `userType`, `verified`, `active`, `picture`, `media`, `description`, `blocked`) VALUES
(30, 'cohen', 'Macdonald', '1969-12-13', 'cohen.macdonald1@gmail.com', '6b22521d61174f5851bb5288d80c6cd6', '$2y$10$QrTQjzGIv83yVnR3yDs8GOO1IyQ323JTWMRs1rFa4YpdNLCKL/9AK', 1, 0, 1, NULL, NULL, NULL, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
