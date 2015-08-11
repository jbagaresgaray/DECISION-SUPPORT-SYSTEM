
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
--
-- Database: `DSS`
--

DROP SCHEMA IF EXISTS `dss`;
CREATE SCHEMA `dss`;
USE `dss`;

-- --------------------------------------------------------
--
-- Table structure for table `growth_standards`
--
DROP TABLE IF EXISTS `growth_standards`;
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
-- Dumping data for table `growth_standards`
--
INSERT INTO `growth_standards` VALUES ('1', '0', '2.10', '2.20', '2.40', '2.50', '4.40', '4.50');
INSERT INTO `growth_standards` VALUES ('2', '1', '2.90', '3.00', '3.30', '3.40', '5.80', '5.90');
INSERT INTO `growth_standards` VALUES ('3', '2', '3.80', '3.90', '4.20', '4.30', '7.10', '7.20');
INSERT INTO `growth_standards` VALUES ('4', '3', '4.40', '4.50', '4.90', '5.00', '8.00', '8.10');
INSERT INTO `growth_standards` VALUES ('5', '4', '4.90', '5.00', '5.50', '5.60', '8.70', '8.80');
INSERT INTO `growth_standards` VALUES ('6', '5', '5.30', '5.40', '5.90', '6.00', '9.30', '9.40');
INSERT INTO `growth_standards` VALUES ('7', '6', '5.70', '5.80', '6.30', '6.40', '9.80', '9.90');
INSERT INTO `growth_standards` VALUES ('8', '7', '5.90', '6.00', '6.60', '6.70', '10.30', '10.40');
INSERT INTO `growth_standards` VALUES ('9', '8', '6.20', '6.30', '6.80', '6.90', '10.70', '10.80');
INSERT INTO `growth_standards` VALUES ('10', '9', '6.40', '6.50', '7.00', '7.10', '11.00', '11.10');
INSERT INTO `growth_standards` VALUES ('11', '10', '6.60', '6.70', '7.30', '7.40', '11.40', '11.50');
INSERT INTO `growth_standards` VALUES ('12', '11', '6.80', '6.90', '7.50', '7.60', '11.70', '11.80');
INSERT INTO `growth_standards` VALUES ('13', '12', '6.90', '7.00', '7.60', '7.70', '12.00', '12.10');
INSERT INTO `growth_standards` VALUES ('14', '13', '7.10', '7.20', '7.80', '7.90', '12.30', '12.40');
INSERT INTO `growth_standards` VALUES ('15', '14', '7.20', '7.30', '8.00', '8.10', '12.60', '12.70');
INSERT INTO `growth_standards` VALUES ('16', '15', '7.40', '7.50', '8.20', '8.30', '12.80', '12.90');
INSERT INTO `growth_standards` VALUES ('17', '16', '7.50', '7.60', '8.30', '8.40', '13.10', '13.20');
INSERT INTO `growth_standards` VALUES ('18', '17', '7.70', '7.80', '8.50', '8.60', '13.40', '13.50');
INSERT INTO `growth_standards` VALUES ('19', '18', '7.80', '7.90', '8.70', '8.80', '13.70', '13.80');
INSERT INTO `growth_standards` VALUES ('20', '19', '8.00', '8.10', '8.80', '8.90', '13.90', '14.00');
INSERT INTO `growth_standards` VALUES ('21', '20', '8.10', '8.20', '9.00', '9.10', '14.20', '14.30');
INSERT INTO `growth_standards` VALUES ('22', '21', '8.20', '8.30', '9.10', '9.20', '14.50', '14.60');
INSERT INTO `growth_standards` VALUES ('23', '22', '8.40', '8.50', '9.30', '9.40', '14.70', '14.80');
INSERT INTO `growth_standards` VALUES ('24', '23', '8.50', '8.60', '9.40', '9.50', '15.00', '15.10');
INSERT INTO `growth_standards` VALUES ('25', '24', '8.60', '8.70', '9.60', '9.70', '15.30', '15.40');
INSERT INTO `growth_standards` VALUES ('26', '25', '8.80', '8.90', '9.70', '9.80', '15.50', '15.60');
INSERT INTO `growth_standards` VALUES ('27', '26', '8.90', '9.00', '9.90', '10.00', '15.80', '15.90');
INSERT INTO `growth_standards` VALUES ('28', '27', '9.00', '9.10', '10.00', '10.10', '16.10', '16.20');
INSERT INTO `growth_standards` VALUES ('29', '28', '9.10', '9.20', '10.10', '10.20', '16.30', '16.40');
INSERT INTO `growth_standards` VALUES ('30', '29', '9.20', '9.30', '10.30', '10.40', '16.60', '16.70');
INSERT INTO `growth_standards` VALUES ('31', '30', '9.40', '9.50', '10.40', '10.50', '16.90', '17.00');
INSERT INTO `growth_standards` VALUES ('32', '31', '9.50', '9.60', '10.50', '10.70', '17.10', '17.20');
INSERT INTO `growth_standards` VALUES ('33', '32', '9.60', '9.70', '10.60', '10.80', '17.40', '17.50');
INSERT INTO `growth_standards` VALUES ('34', '33', '9.70', '9.80', '10.70', '10.90', '17.60', '17.70');
INSERT INTO `growth_standards` VALUES ('35', '34', '9.80', '9.90', '10.90', '11.00', '17.80', '17.90');
INSERT INTO `growth_standards` VALUES ('36', '35', '9.90', '10.00', '11.10', '11.20', '18.10', '18.20');
INSERT INTO `growth_standards` VALUES ('37', '36', '10.00', '10.10', '11.20', '11.30', '18.30', '18.40');
INSERT INTO `growth_standards` VALUES ('38', '37', '10.10', '10.20', '11.30', '11.40', '18.60', '18.70');
INSERT INTO `growth_standards` VALUES ('39', '38', '10.20', '10.30', '11.40', '11.50', '18.80', '18.90');
INSERT INTO `growth_standards` VALUES ('40', '39', '10.30', '10.40', '11.50', '11.60', '19.00', '19.10');
INSERT INTO `growth_standards` VALUES ('41', '40', '10.40', '10.50', '11.70', '11.80', '19.30', '19.40');
INSERT INTO `growth_standards` VALUES ('42', '41', '10.50', '10.60', '11.80', '11.90', '19.50', '19.60');
INSERT INTO `growth_standards` VALUES ('43', '42', '10.60', '10.70', '11.90', '12.00', '19.70', '19.80');
INSERT INTO `growth_standards` VALUES ('44', '43', '10.70', '10.80', '12.00', '12.10', '20.00', '20.10');
INSERT INTO `growth_standards` VALUES ('45', '44', '10.80', '10.90', '12.10', '12.20', '20.20', '20.30');
INSERT INTO `growth_standards` VALUES ('46', '45', '10.90', '11.00', '12.30', '12.40', '20.50', '20.60');
INSERT INTO `growth_standards` VALUES ('47', '46', '11.00', '11.10', '12.40', '12.50', '20.70', '20.80');
INSERT INTO `growth_standards` VALUES ('48', '47', '11.10', '11.20', '12.50', '12.60', '20.90', '21.00');
INSERT INTO `growth_standards` VALUES ('49', '48', '11.20', '11.30', '12.60', '12.70', '21.20', '21.30');
INSERT INTO `growth_standards` VALUES ('50', '49', '11.30', '11.40', '12.70', '12.80', '21.40', '21.50');
INSERT INTO `growth_standards` VALUES ('51', '50', '11.40', '11.50', '12.80', '12.90', '21.70', '21.80');
INSERT INTO `growth_standards` VALUES ('52', '51', '11.50', '11.60', '13.00', '13.10', '21.90', '22.00');
INSERT INTO `growth_standards` VALUES ('53', '52', '11.60', '11.70', '13.10', '13.20', '22.20', '22.30');
INSERT INTO `growth_standards` VALUES ('54', '53', '11.70', '11.80', '13.20', '13.30', '22.40', '22.50');
INSERT INTO `growth_standards` VALUES ('55', '54', '11.80', '11.90', '13.30', '13.40', '22.70', '22.80');
INSERT INTO `growth_standards` VALUES ('56', '55', '11.90', '12.00', '13.40', '14.50', '22.90', '23.00');
INSERT INTO `growth_standards` VALUES ('57', '56', '12.00', '12.10', '13.50', '13.60', '23.20', '23.30');
INSERT INTO `growth_standards` VALUES ('58', '57', '12.10', '12.20', '13.60', '13.70', '23.40', '23.50');
INSERT INTO `growth_standards` VALUES ('59', '58', '12.20', '12.30', '13.70', '13.80', '23.70', '23.80');
INSERT INTO `growth_standards` VALUES ('60', '59', '12.30', '12.40', '13.90', '14.00', '23.90', '24.00');
INSERT INTO `growth_standards` VALUES ('61', '60', '12.40', '12.50', '14.00', '14.10', '24.20', '24.30');
INSERT INTO `growth_standards` VALUES ('62', '61', '12.70', '12.80', '14.30', '14.40', '24.30', '24.40');
INSERT INTO `growth_standards` VALUES ('63', '62', '12.80', '12.90', '14.40', '14.50', '24.40', '24.50');
INSERT INTO `growth_standards` VALUES ('64', '63', '13.00', '13.10', '14.50', '14.60', '24.70', '24.80');
INSERT INTO `growth_standards` VALUES ('65', '64', '13.10', '13.20', '14.70', '14.80', '24.90', '25.00');
INSERT INTO `growth_standards` VALUES ('66', '65', '13.20', '13.30', '14.80', '14.90', '25.20', '25.30');
INSERT INTO `growth_standards` VALUES ('67', '66', '13.30', '13.40', '14.90', '15.00', '25.50', '25.60');
INSERT INTO `growth_standards` VALUES ('68', '67', '13.40', '13.50', '15.10', '15.20', '25.70', '25.80');
INSERT INTO `growth_standards` VALUES ('69', '68', '13.60', '13.70', '15.20', '15.30', '26.00', '26.10');
INSERT INTO `growth_standards` VALUES ('70', '69', '13.70', '13.80', '15.30', '15.40', '26.30', '26.40');
INSERT INTO `growth_standards` VALUES ('71', '70', '13.80', '13.90', '15.50', '15.60', '26.60', '26.70');
INSERT INTO `growth_standards` VALUES ('72', '71', '13.90', '14.00', '15.60', '15.70', '26.80', '26.90');

-- --------------------------------------------------------
--
-- Table structure for table `location`
--
DROP TABLE IF EXISTS `location`;
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
-- Dumping data for table `location`
--

-- --------------------------------------------------------
--
-- Table structure for table `child`
--
DROP TABLE IF EXISTS `child`;
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
  `months` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
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
DROP TABLE IF EXISTS `userdata`;
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


--
-- Table structure for table `status`
--
DROP TABLE IF EXISTS `status`;
CREATE TABLE IF NOT EXISTS `status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4;
--
-- Dumping data for table `status`
--
INSERT INTO `status` VALUES ('1', 'normal', 'normal');
INSERT INTO `status` VALUES ('2', 'severely underweight', 'severely underweight');
INSERT INTO `status` VALUES ('3', 'underweight', 'underweight');
INSERT INTO `status` VALUES ('4', 'overweight', 'overweight');
