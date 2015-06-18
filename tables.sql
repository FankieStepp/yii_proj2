-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Host: sql311.0fees.us
-- Generation Time: Jun 18, 2015 at 07:07 PM
-- Server version: 5.6.22-71.0
-- PHP Version: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `0fe_15790014_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE IF NOT EXISTS `authors` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `name` char(90) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `creat` datetime NOT NULL,
  `upd` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `name`, `creat`, `upd`) VALUES
(2, 'Шукшин', '2015-06-16 15:13:01', '2015-06-16 15:13:01'),
(3, 'Пушкин', '2015-06-16 15:13:07', '2015-06-16 15:13:07'),
(4, 'Достоевский', '2015-06-16 15:13:13', '2015-06-16 15:13:13'),
(5, 'Гете', '2015-06-18 15:45:42', '2015-06-18 15:45:42'),
(6, 'Гоголь', '2015-06-18 15:45:48', '2015-06-18 15:45:48'),
(7, 'Грибоедов', '2015-06-18 15:46:00', '2015-06-18 15:46:00');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `name` char(90) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `creat` datetime NOT NULL,
  `upd` datetime NOT NULL,
  `pic` char(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `reader` int(12) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `name`, `creat`, `upd`, `pic`, `reader`) VALUES
(1, 'Вечера на хуторе', '2015-06-16 15:15:26', '2015-06-16 15:15:26', '01_pre1.jpg', 0),
(2, 'Василич', '2015-06-16 18:56:59', '2015-06-18 15:48:30', '1bestoilportraitselisabethvigeelebrun.jpg', 4),
(3, 'Горе от ума', '2015-06-18 15:45:26', '2015-06-18 15:45:26', 'gore_ot_uma.jpg', 0),
(4, 'Фауст', '2015-06-18 15:45:34', '2015-06-18 15:45:34', '210180529.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `book_authors`
--

CREATE TABLE IF NOT EXISTS `book_authors` (
  `book_id` int(12) NOT NULL,
  `author_id` int(12) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_authors`
--

INSERT INTO `book_authors` (`book_id`, `author_id`) VALUES
(1, 2),
(2, 3),
(4, 5),
(3, 7),
(2, 4),
(2, 6);

-- --------------------------------------------------------

--
-- Table structure for table `readers`
--

CREATE TABLE IF NOT EXISTS `readers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(90) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `dept` char(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `creat` datetime NOT NULL,
  `upd` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `readers`
--

INSERT INTO `readers` (`id`, `name`, `dept`, `creat`, `upd`) VALUES
(3, 'Иван Иванов', 'IT отдел', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Петр Петров', 'логистика', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Семен Семенов', 'бухгалтерия', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Павел Воля', 'отдел продаж', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Василий Алибабаевич', 'Ит-отдел', '2015-06-17 13:20:57', '2015-06-17 13:20:57');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
