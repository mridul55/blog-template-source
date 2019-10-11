-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 11, 2019 at 06:25 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_page`
--

DROP TABLE IF EXISTS `add_page`;
CREATE TABLE IF NOT EXISTS `add_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `body` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_page`
--

INSERT INTO `add_page` (`id`, `name`, `body`) VALUES
(1, 'About Us', '<p>Monaem</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit illum quasi delectus perferendis aut accusamus ipsam eum ratione vitae quis fuga, esse qui dolor ad voluptatem blanditiis aspernatur in, nesciunt!</p>'),
(2, 'Privacy Policy ', '<p>&nbsp;Policy Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit illum quasi delectus perferendis aut accusamus ipsam eum ratione vitae quis fuga, esse qui dolor ad voluptatem blanditiis aspernatur in, nesciunt!</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit illum quasi delectus perferendis aut accusamus ipsam eum ratione vitae quis fuga, esse qui dolor ad voluptatem blanditiis aspernatur in, nesciunt!</p>');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

DROP TABLE IF EXISTS `tbl_category`;
CREATE TABLE IF NOT EXISTS `tbl_category` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `name`) VALUES
(1, 'Java'),
(2, 'PHP'),
(3, 'HTML'),
(6, 'Education'),
(7, 'Sports'),
(8, 'css');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

DROP TABLE IF EXISTS `tbl_contact`;
CREATE TABLE IF NOT EXISTS `tbl_contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `message` text,
  `status` int(11) NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`id`, `firstname`, `lastname`, `email`, `message`, `status`, `date`) VALUES
(2, 'Md ', 'Mridul', 'mridul@gmail.com', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to', 0, '2019-10-06 16:15:19'),
(3, 'Md ', 'Morshalin', 'morshalin@gmail.com', 'The enc-type attribute specifies how the form-data should be encoded when submitting it', 1, '2019-10-07 04:27:59');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_footer`
--

DROP TABLE IF EXISTS `tbl_footer`;
CREATE TABLE IF NOT EXISTS `tbl_footer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_footer`
--

INSERT INTO `tbl_footer` (`id`, `name`) VALUES
(1, ' Copyright Training with live project. new');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post`
--

DROP TABLE IF EXISTS `tbl_post`;
CREATE TABLE IF NOT EXISTS `tbl_post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat` bigint(20) DEFAULT NULL,
  `titel` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `author` varchar(50) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `date` timestamp NOT NULL,
  `userid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tbl_post_cat_foreign` (`cat`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_post`
--

INSERT INTO `tbl_post` (`id`, `cat`, `titel`, `body`, `image`, `author`, `tags`, `date`, `userid`) VALUES
(29, 1, 'Java Post Will be here', '<p>dsfgrsy</p>', 'upload/81e3789958.jpg', 'admin', 'java', '2019-10-10 16:38:33', 1),
(30, 8, 'CSS Post will be go Here', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam tenetur praesentium, laboriosam maxime quaerat et blanditiis dolorum iure, voluptate non?</p>', 'upload/8eb1781a7d.jpg', 'admin', 'css', '2019-10-11 05:41:30', 1),
(31, 1, 'Java Post Will be here', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam tenetur praesentium, laboriosam maxime quaerat et blanditiis dolorum iure, voluptate non?</p>', 'upload/f7fc7b1965.jpg', 'admin', 'java', '2019-10-11 05:41:46', 1),
(32, 2, 'PHP Post will be go here..', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam tenetur praesentium, laboriosam maxime quaerat et blanditiis dolorum iure, voluptate non?</p>', 'upload/62a1243e41.jpg', 'admin', 'php', '2019-10-11 05:42:09', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider`
--

DROP TABLE IF EXISTS `tbl_slider`;
CREATE TABLE IF NOT EXISTS `tbl_slider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_slider`
--

INSERT INTO `tbl_slider` (`id`, `title`, `image`) VALUES
(1, 'First Slider', 'upload/slider/5bcf89be6b.jpg'),
(2, '2nd slider', 'upload/slider/831fca4444.jpg'),
(3, '3rd slider', 'upload/slider/925f6a557f.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_theme`
--

DROP TABLE IF EXISTS `tbl_theme`;
CREATE TABLE IF NOT EXISTS `tbl_theme` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_theme`
--

INSERT INTO `tbl_theme` (`id`, `name`) VALUES
(1, 'green');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `details` text,
  `role` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `name`, `username`, `password`, `email`, `details`, `role`) VALUES
(1, 'Minhaj', 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'mridul9650@gmail.com', 'lkhjaoithwoih sfjgui isuh', 0),
(10, NULL, 'Rasid Khan', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, 2),
(7, NULL, 'mridul', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, 2),
(8, NULL, 'hasan', '827ccb0eea8a706c4c34a16891f84e7b', NULL, NULL, 0),
(9, NULL, 'ahmed', '81dc9bdb52d04dc20036dbd8313ed055', NULL, NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `title_slogan`
--

DROP TABLE IF EXISTS `title_slogan`;
CREATE TABLE IF NOT EXISTS `title_slogan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slogan` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `title_slogan`
--

INSERT INTO `title_slogan` (`id`, `title`, `slogan`, `logo`) VALUES
(1, 'our title new', 'our slogan', 'upload/36583099e4.png');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD CONSTRAINT `tbl_post_cat_foreign` FOREIGN KEY (`cat`) REFERENCES `tbl_category` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
