
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
--
-- Database: `DSS`
--

-- --------------------------------------------------------
--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `growth_standards` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `age` varchar(10) NOT NULL,
  `su_3sd` decimal(10,2) NOT NULL,
  `uw_3sd_from` decimal(10,2) NOT NULL,
  `uw_2sd_to` decimal(10,2) NOT NULL,
  `normal_2sd_from` decimal(10,2) NOT NULL,
  `normal_2sd_to` decimal(10,2) NOT NULL,
  `ow_2sd` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0 ;

--
-- Dumping data for table `category`
--

-- --------------------------------------------------------
--
-- Table structure for table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `x` DECIMAL(10,2) NOT NULL,
  `y` DECIMAL(10,2) NOT NULL,
  `description` DECIMAL(10,2),
  `landarea` varchar(100),
  `image_path` varchar(100),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0 ;

--
-- Dumping data for table `category`
--

-- --------------------------------------------------------
--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `child` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `mname` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `locationID` int(11) NOT NULL,
  `dob` DATETIME NOT NULL,
  `height` varchar(45) NOT NULL,
  `weight` varchar(45) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `createddate` DATETIME,
  `updateddate` DATETIME,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0 ;

--
-- Dumping data for table `student`
--
-- --------------------------------------------------------

--
-- Table structure for table `userdata`
--

CREATE TABLE IF NOT EXISTS `userdata` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(60),
  `mobileno` varchar(45),
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `level` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0 ;

--
-- Dumping data for table `userdata`
--
