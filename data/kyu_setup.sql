-- phpMyAdmin SQL Dump
-- version 4.2.5
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: 2015 年 3 月 09 日 05:59
-- サーバのバージョン： 5.5.38
-- PHP Version: 5.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kyu`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `history`
--

CREATE TABLE `history` (
`id` int(11) NOT NULL,
  `event` varchar(225) NOT NULL,
  `date` varchar(225) NOT NULL,
  `order` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- テーブルのデータのダンプ `history`
--

INSERT INTO `history` (`id`, `event`, `date`, `order`) VALUES
(1, 'TEAM CREATED', 'Feb, 2010', 1),
(2, 'FIRST TEAM GAME', 'August 2010', 2),
(3, 'JOINED MULTICULTURAL LEAGUE', 'April, 2012', 3),
(4, '2ND PLACE IN MC LEAGUE', '2012', 4),
(5, '1ST PLACE IN MC LEAGUE', '2013', 5),
(6, '1ST PLACE IN MC LEAGUE', '2014', 6),
(7, 'JOINED K LEAGUE', 'April, 2015', 7);

-- --------------------------------------------------------

--
-- テーブルの構造 `Images`
--

CREATE TABLE `Images` (
`id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `thumb_path` varchar(225) NOT NULL,
  `path` varchar(225) NOT NULL,
  `album` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=58 ;

--
-- テーブルのデータのダンプ `Images`
--

INSERT INTO `Images` (`id`, `name`, `thumb_path`, `path`, `album`) VALUES
(1, 'e1.jpg', 'es1.jpg', 'e1.jpg', 20140530),
(2, 'e2.jpg', 'es2.jpg', 'e2.jpg', 20140530),
(3, 'e3.jpg', 'es3.jpg', 'e3.jpg', 20140530),
(4, 'e4.jpg', 'es4.jpg', 'e4.jpg', 20140530),
(5, 'e5.jpg', 'es5.jpg', 'e5.jpg', 20140530),
(6, 'e6.jpg', 'es6.jpg', 'e6.jpg', 20140530),
(7, 'e7.jpg', 'es7.jpg', 'e7.jpg', 20140530),
(8, 'e8.jpg', 'es8.jpg', 'e8.jpg', 20140530),
(9, 'e9.jpg', 'es9.jpg', 'e9.jpg', 20140530),
(10, 'IMG_5354.jpg', 'IMG_5354_thumb.jpg', 'IMG_5354.jpg', 20140530),
(11, 'IMG_5358.jpg', 'IMG_5358_thumb.jpg\r\n', 'IMG_5358.jpg', 20140530),
(12, 'IMG_5366.jpg', 'IMG_5366_thumb.jpg', 'IMG_5366.jpg\r\n', 20140530),
(13, 'IMG_5369.jpg', 'IMG_5369_thumb.jpg\r\n', 'IMG_5369.jpg', 20140530),
(14, 'IMG_5381.jpg', 'IMG_5381_thumb.jpg\r\n', 'IMG_5381.jpg', 20140530),
(15, 'IMG_5382.jpg', 'IMG_5382_thumb.jpg', 'IMG_5382.jpg', 20140530),
(16, 'IMG_5385.jpg', 'IMG_5385_thumb.jpg', 'IMG_5385.jpg', 20140530),
(17, 'IMG_5389.JPG', 'IMG_5389_thumb.jpg', 'IMG_5389.JPG', 20140428),
(18, 'IMG_5392.JPG', 'IMG_5392_thumb.jpg', 'IMG_5392.JPG', 20140428),
(19, 'IMG_5397.JPG', 'IMG_5397_thumb.jpg', 'IMG_5397.JPG', 20140428),
(20, 'IMG_5399.JPG', 'IMG_5399_thumb.jpg', 'IMG_5399.JPG', 20140428),
(21, 'IMG_5411.JPG', 'IMG_5411_thumb.jpg', 'IMG_5411.JPG', 20140428),
(22, 'IMG_5419.JPG', 'IMG_5419_thumb.jpg', 'IMG_5419.JPG', 20140428),
(23, 'IMG_5424.JPG', 'IMG_5424_thumb.jpg', 'IMG_5424.JPG', 20140428),
(24, 'IMG_5425.JPG', 'IMG_5425_thumb.jpg', 'IMG_5425.JPG', 20140428),
(25, 'IMG_5437.JPG', 'IMG_5437_thumb.jpg', 'IMG_5437.JPG', 20140428),
(26, 'IMG_5442.JPG', 'IMG_5442_thumb.jpg', 'IMG_5442.JPG', 20140428),
(27, 'IMG_5451.JPG', 'IMG_5451_thumb.jpg', 'IMG_5451.JPG', 20140428),
(28, 'IMG_5452.JPG', 'IMG_5452_thumb.jpg', 'IMG_5452.JPG', 20140428),
(29, 'IMG_5456.JPG', 'IMG_5456_thumb.jpg', 'IMG_5456.JPG', 20140428),
(30, 'IMG_5465.JPG', 'IMG_5465_thumb.jpg', 'IMG_5465.JPG', 20140428),
(31, 'IMG_5470.JPG', 'IMG_5470_thumb.jpg', 'IMG_5470.JPG', 20140428),
(32, 'IMG_5473.JPG', 'IMG_5473_thumb.jpg', 'IMG_5473.JPG', 20140428),
(33, 'IMG_5478.JPG', 'IMG_5478_thumb.jpg', 'IMG_5478.JPG', 20140428),
(34, 'IMG_5481.JPG', 'IMG_5481_thumb.jpg', 'IMG_5481.JPG', 20140428),
(35, 'IMG_5482.JPG', 'IMG_5482_thumb.jpg', 'IMG_5482.JPG', 20140428),
(36, 'IMG_5483.JPG', 'IMG_5483_thumb.jpg', 'IMG_5483.JPG', 20140415),
(38, 'IMG_5489.JPG', 'IMG_5489_thumb.jpg', 'IMG_5489.JPG', 20140415),
(39, 'IMG_5498.JPG', 'IMG_5498_thumb.jpg', 'IMG_5498.JPG', 20140415),
(40, 'IMG_5500.JPG', 'IMG_5500_thumb.jpg', 'IMG_5500.JPG', 20140415),
(41, 'IMG_5511.JPG', 'IMG_5511_thumb.jpg', 'IMG_5511.JPG', 20140415),
(42, 'IMG_5525.JPG', 'IMG_5525_thumb.jpg', 'IMG_5525.JPG', 20140415),
(43, 'IMG_5538.JPG', 'IMG_5538_thumb.jpg', 'IMG_5538.JPG', 20140415),
(44, 'IMG_5554.JPG', 'IMG_5554_thumb.jpg', 'IMG_5554.JPG', 20140415),
(45, 'IMG_5555.JPG', 'IMG_5555_thumb.jpg', 'IMG_5555.JPG', 20140415),
(46, 'IMG_5565.JPG', 'IMG_5565_thumb.jpg', 'IMG_5565.JPG', 20140415),
(47, 'IMG_5566.JPG', 'IMG_5566_thumb.jpg', 'IMG_5566.JPG', 20140415),
(48, 'IMG_5570.JPG', 'IMG_5570_thumb.jpg', 'IMG_5570.JPG', 20140415),
(49, 'IMG_5571.JPG', 'IMG_5571_thumb.jpg', 'IMG_5571.JPG', 20140415),
(50, 'IMG_5573.JPG', 'IMG_5573_thumb.jpg', 'IMG_5573.JPG', 20140415),
(51, 'IMG_5575.JPG', 'IMG_5575_thumb.jpg', 'IMG_5575.JPG', 20140415),
(52, 'IMG_5584.JPG', 'IMG_5584_thumb.jpg', 'IMG_5584.JPG', 20140415),
(53, 'IMG_5596.JPG', 'IMG_5596_thumb.jpg', 'IMG_5596.JPG', 20140415),
(54, 'IMG_5598.JPG', 'IMG_5598_thumb.jpg', 'IMG_5598.JPG', 20140415),
(55, 'IMG_5600.JPG', 'IMG_5600_thumb.jpg', 'IMG_5600.JPG', 20140415),
(56, 'IMG_5610.JPG', 'IMG_5610_thumb.jpg', 'IMG_5610.JPG', 20140415),
(57, 'IMG_5612.JPG', 'IMG_5612_thumb.jpg', 'IMG_5612.JPG', 20140415);

-- --------------------------------------------------------

--
-- テーブルの構造 `keyvalue`
--

CREATE TABLE `keyvalue` (
  `key` varchar(225) NOT NULL,
  `value` varchar(8000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- テーブルのデータのダンプ `keyvalue`
--

INSERT INTO `keyvalue` (`key`, `value`) VALUES
('ANNOUNCEMENT', 'The weather forcast says it is going to rain the coming Saturday. We will be playing badminton at ~~gym instead.  abcda'),
('contact', '\r\nLorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat\r\n'),
('email', 'bd0421@gmail.com');

-- --------------------------------------------------------

--
-- テーブルの構造 `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `title` varchar(225) NOT NULL,
  `name` varchar(225) NOT NULL,
  `description` varchar(8000) NOT NULL,
  `image_path` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- テーブルのデータのダンプ `team`
--

INSERT INTO `team` (`id`, `title`, `name`, `description`, `image_path`) VALUES
(0, 'About Dragons', 'About Dragons', 'We are highly motivated baseball team consisting of 12 members at this moment.\r\nDuring Pre-season, we develop various fundamental baseball skills through badminton, batting, and other activities.\r\nTeam defensive practice is scheduled at 1 PM, Central Park, Burnaby. \r\nTeam batting practice is scheduled at 6PM, Ball Yard, Richmond.\r\nFollowing Season begins at 10th, April.', 'team.jpg'),
(1, 'Team Manager', 'Young Cheul Doh', 'As of 2010, our baseball team "Dragons" has shown outstanding demonstrations both in and out of field. In the field, members believe in the companionship\r\nwe has created. It is what links us together, allows to overcome strenuous weekly base practices, and leads us to achieve our goal. At the outfield, \r\nmembers believe in each individuals. Beyond teammates, we are brothers, friends, and family. Baseball must be entertaining, and that is what we play.', 'pImage1.jpg'),
(2, 'Team Captain', 'Kyu Sik Shin', 'We feel what I almost always feel when playing a ballgame: Just for those two or three hours, there is really no place I would rather be.\r\n    We want to savor every minute of it. That is what baseball mean to us.', 'pImage2.jpg');

-- --------------------------------------------------------

--
-- テーブルの構造 `updates`
--

CREATE TABLE `updates` (
`id` int(11) NOT NULL,
  `title` varchar(225) NOT NULL,
  `link` varchar(225) NOT NULL,
  `comment` varchar(8000) NOT NULL,
  `date` varchar(40) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- テーブルのデータのダンプ `updates`
--

INSERT INTO `updates` (`id`, `title`, `link`, `comment`, `date`) VALUES
(23, 'Team Manager''s profile', '/team', 'As of 2010, our baseball team "Dragons" has shown outstanding demonstrations bot......', 'March 8, 2015, 9:46 pm'),
(24, 'Team Manager''s profile', '/team', 'As of 2010, our baseball team "Dragons" has shown outstanding demonstrations bot......', 'March 8, 2015, 9:46 pm'),
(25, 'Team Manager''s profile', '/team', 'As of 2010, our baseball team "Dragons" has shown outstanding demonstrations bot......', 'March 8, 2015, 9:55 pm'),
(26, 'Team Manager''s profile', '/team', 'As of 2010, our baseball team "Dragons" has shown outstanding demonstrations bot......', 'March 8, 2015, 9:56 pm'),
(27, 'Team Captain''s profile', '/team', 'We feel what I almost always feel when playing a ballgame: Just for those two or......', 'March 8, 2015, 9:56 pm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `history`
--
ALTER TABLE `history`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Images`
--
ALTER TABLE `Images`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keyvalue`
--
ALTER TABLE `keyvalue`
 ADD PRIMARY KEY (`key`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `updates`
--
ALTER TABLE `updates`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `Images`
--
ALTER TABLE `Images`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `updates`
--
ALTER TABLE `updates`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
