-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 08, 2014 at 10:52 AM
-- Server version: 5.5.38
-- PHP Version: 5.3.10-1ubuntu3.14

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `moviedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `awards`
--

CREATE TABLE IF NOT EXISTS `awards` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `year` int(4) NOT NULL,
  `director` varchar(60) NOT NULL,
  `actor` varchar(60) NOT NULL,
  `movie` int(5) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `year` (`year`),
  KEY `movie` (`movie`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `awards`
--

INSERT INTO `awards` (`id`, `year`, `director`, `actor`, `movie`) VALUES
(1, 2005, '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE IF NOT EXISTS `movies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(80) NOT NULL,
  `year` int(4) NOT NULL,
  `director` varchar(80) NOT NULL,
  `producers` varchar(160) NOT NULL,
  `actors` varchar(250) NOT NULL,
  `studio` varchar(100) NOT NULL,
  `rating` varchar(6) NOT NULL,
  `length` int(5) NOT NULL,
  `genre` varchar(30) NOT NULL,
  `theatres` varchar(1000) NOT NULL,
  `profit` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `title`, `year`, `director`, `producers`, `actors`, `studio`, `rating`, `length`, `genre`, `theatres`, `profit`, `created_on`) VALUES
(1, 'Ghost Rider', 2004, 'Andrew Perkins', 'John Matthew', 'Tom Cruise, Will Smith', 'Dreamworks', '3.7', 132, 'humor', '1, 3', 980, '2014-11-03 18:21:22'),
(2, 'Inception', 2004, 'Jack Alfred', 'Tom Hansen', 'Nolan', 'Art Studios', '4.7', 123, 'horror', '', 0, '2014-11-07 22:26:45');

-- --------------------------------------------------------

--
-- Table structure for table `people`
--

CREATE TABLE IF NOT EXISTS `people` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(80) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` tinyint(1) NOT NULL DEFAULT '0',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `people`
--

INSERT INTO `people` (`id`, `fullname`, `address`, `phone`, `username`, `password`, `role`, `timestamp`) VALUES
(1, 'Akash Deep Singhal', 'Room 248, Hostel 6', '7738983120', 'akigupta131@gmail.com', '5e79cf94469fc99fafcb468e4416a60a', 1, '2014-11-02 06:34:15'),
(2, 'Akash Deep Singhal', 'Room 248', '07738983120', 'akash', '5e79cf94469fc99fafcb468e4416a60a', 0, '2014-11-02 06:35:41');

-- --------------------------------------------------------

--
-- Table structure for table `shows`
--

CREATE TABLE IF NOT EXISTS `shows` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `tid` int(11) NOT NULL,
  `mid` int(11) NOT NULL,
  `showtime` time NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `premiumseatnumber` int(11) NOT NULL,
  `premiumseatprice` int(11) NOT NULL,
  `regularseatnumber` int(11) NOT NULL,
  `regularseatprice` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  UNIQUE KEY `sid` (`sid`),
  KEY `tid` (`tid`),
  KEY `mid` (`mid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `shows`
--

INSERT INTO `shows` (`sid`, `date`, `tid`, `mid`, `showtime`, `startdate`, `enddate`, `premiumseatnumber`, `premiumseatprice`, `regularseatnumber`, `regularseatprice`, `active`, `created_on`) VALUES
(1, '2014-11-08', 1, 1, '13:00:00', '2014-11-08', '2014-11-12', 80, 120, 120, 80, 0, '2014-11-07 20:04:20'),
(2, '2014-11-09', 1, 1, '13:00:00', '2014-11-08', '2014-11-12', 80, 120, 120, 80, 0, '2014-11-07 20:04:20'),
(3, '2014-11-10', 1, 1, '13:00:00', '2014-11-08', '2014-11-12', 72, 120, 120, 80, 0, '2014-11-07 20:04:20'),
(4, '2014-11-11', 1, 1, '13:00:00', '2014-11-08', '2014-11-12', 80, 120, 120, 80, 0, '2014-11-07 20:04:20'),
(5, '2014-11-08', 1, 1, '18:00:00', '2014-11-08', '2014-11-12', 80, 120, 120, 80, 0, '2014-11-07 20:04:33'),
(6, '2014-11-09', 1, 1, '18:00:00', '2014-11-08', '2014-11-12', 80, 120, 120, 80, 0, '2014-11-07 20:04:33'),
(7, '2014-11-10', 1, 1, '18:00:00', '2014-11-08', '2014-11-12', 80, 120, 120, 80, 0, '2014-11-07 20:04:33'),
(8, '2014-11-11', 1, 1, '18:00:00', '2014-11-08', '2014-11-12', 80, 120, 120, 80, 0, '2014-11-07 20:04:33'),
(9, '2014-11-08', 1, 1, '21:00:00', '2014-11-08', '2014-11-12', 80, 120, 120, 80, 0, '2014-11-07 20:04:40'),
(10, '2014-11-09', 1, 1, '21:00:00', '2014-11-08', '2014-11-12', 80, 120, 120, 80, 0, '2014-11-07 20:04:40'),
(11, '2014-11-10', 1, 1, '21:00:00', '2014-11-08', '2014-11-12', 80, 120, 120, 80, 0, '2014-11-07 20:04:40'),
(12, '2014-11-11', 1, 1, '21:00:00', '2014-11-08', '2014-11-12', 80, 120, 117, 80, 0, '2014-11-07 20:04:40'),
(13, '2014-11-08', 3, 1, '09:10:00', '2014-11-08', '2014-11-12', 30, 210, 90, 130, 0, '2014-11-07 21:22:26'),
(14, '2014-11-09', 3, 1, '09:10:00', '2014-11-08', '2014-11-12', 30, 210, 90, 130, 0, '2014-11-07 21:22:26'),
(15, '2014-11-10', 3, 1, '09:10:00', '2014-11-08', '2014-11-12', 30, 210, 90, 130, 0, '2014-11-07 21:22:26'),
(16, '2014-11-11', 3, 1, '09:10:00', '2014-11-08', '2014-11-12', 30, 210, 88, 130, 0, '2014-11-07 21:22:26');

-- --------------------------------------------------------

--
-- Table structure for table `theatres`
--

CREATE TABLE IF NOT EXISTS `theatres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tname` varchar(60) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `theatres`
--

INSERT INTO `theatres` (`id`, `tname`, `created_on`) VALUES
(1, 'Polo Victory', '2014-11-06 16:53:31'),
(2, 'Inox', '2014-11-06 16:53:52'),
(3, 'Cinepolis', '2014-11-06 16:53:59'),
(4, 'Huma', '2014-11-06 16:54:09'),
(5, 'EP', '2014-11-06 16:54:15'),
(6, 'Pink Square', '2014-11-06 16:54:26'),
(7, 'Center Square', '2014-11-06 16:54:32');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `awards`
--
ALTER TABLE `awards`
  ADD CONSTRAINT `awards_ibfk_1` FOREIGN KEY (`movie`) REFERENCES `movies` (`id`);

--
-- Constraints for table `shows`
--
ALTER TABLE `shows`
  ADD CONSTRAINT `shows_ibfk_1` FOREIGN KEY (`tid`) REFERENCES `theatres` (`id`),
  ADD CONSTRAINT `shows_ibfk_2` FOREIGN KEY (`mid`) REFERENCES `movies` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
