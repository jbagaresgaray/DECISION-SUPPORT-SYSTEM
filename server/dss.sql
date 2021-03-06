
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
  `coords` VARCHAR(255) NOT NULL,
  `description` varchar(100),
  `landarea` varchar(100),
  `nw_path` varchar(100),
  `uw_path` varchar(100),
  `suw_path` varchar(100),
  `ow_path` varchar(100),
  `diameter` varchar(100),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0 ;

--
-- Dumping data for table `location`
--
INSERT INTO `location` VALUES ('1','Cervantes','673,115,768,84,796,104,755,160,739,169,719,164,713,156,681,173,682,159,669,140,676,124','','','726, 132','703, 142','724, 108','692, 119','15');
INSERT INTO `location` VALUES ('2','Hda Fe','498,193,525,164,670,115,675,126,672,140,683,162,681,221,546,188,516,211,501,215','','','534, 177','574, 164','645, 164','631, 187','15');
INSERT INTO `location` VALUES ('3','Washington','682,177,712,161,750,176,759,171,759,177,766,182,776,171,789,184,774,192,812,219,812,242,801,265,770,265,762,259,752,264,726,268,709,256,681,223','','','770, 235','730, 196','725, 243','700, 189','15');
INSERT INTO `location` VALUES ('4','Balintawak','685,319,721,262,706,256,681,222,548,188,524,208,602,244,620,244,632,247,637,269,644,286,657,295,667,294,675,302,669,308','','','568, 159','638, 232','658, 269','684, 264','15');
INSERT INTO `location` VALUES ('5','Alimango','720,261,682,323,714,331,723,343,716,355,720,376,734,385,732,398,745,408,769,381,810,365,826,345,800,350,797,341,832,292,804,267,761,260','','','725, 283','770, 301','735, 359','759, 345','20');
INSERT INTO `location` VALUES ('6','Old Poblacion','829,291,795,341,803,348,820,341,837,337,863,359,882,367,904,357,942,323,943,311,942,249,932,245,912,261,908,277,882,276,865,288','','','900, 301','867, 298','869, 332','830, 312','15');
INSERT INTO `location` VALUES ('7','Jonobjonob','502,215,522,208,597,242,620,244,632,249,645,279,669,297,684,318,692,328,716,333,720,343,710,359,717,380,729,388,729,404,738,404,743,415,752,404,755,408,745,428,713,425,694,404,693,395,676,408,672,404,666,372,649,376,652,396,647,399,632,386,609,393,625,373,633,366,629,350,602,357,597,319,587,319,572,289,577,282,567,275,560,287,502,290','','','521, 240','572, 256','618, 299','662, 346','20');
INSERT INTO `location` VALUES ('8','Malasibog','409,281,497,194,503,212,502,291,513,289,572,279,540,343,506,374,458,357,442,344,444,335,433,314,417,308,419,293,416,285','','','434, 276','523, 307','474, 340','465, 239','15');
INSERT INTO `location` VALUES ('9','Langub','790,517,823,468,832,358,761,396,760,413,748,432,726,433,723,457','','','798, 395','777, 481','766, 438','793, 435','15');
INSERT INTO `location` VALUES ('10','Buenavista','911,488,878,474,824,468,832,358,841,346,854,354,878,374,889,375,916,376,925,400,941,432,950,461,937,480','','','845, 388','901, 452','844, 437','891, 409','15');
INSERT INTO `location` VALUES ('11','Rizal','790,516,871,531,909,554,916,548,921,514,914,503,916,495,912,489,880,475,825,469','','','830, 484','832, 503','873, 492','886, 521','15');
INSERT INTO `location` VALUES ('12','Japitan','786,515,872,531,909,552,905,559,880,572,849,587,865,610,846,647,822,645,797,617,800,605,789,602,772,590,786,571,776,561,773,529','','','792, 539','839, 546','798, 579','825, 605','15');
INSERT INTO `location` VALUES ('13','Udtongan','656,570,660,542,654,517,665,512,668,500,723,456,791,516,773,528,774,560,788,571,772,590,766,588,752,594,736,592,724,583,713,588,692,572,674,574,665,574,656,571','','','684, 519','709, 486','740, 532','725, 556','15');
INSERT INTO `location` VALUES ('14','Mabini','571,279,539,345,506,374,510,388,530,398,545,425,530,422,509,453,560,549,559,574,532,578,530,599,559,600,565,617,579,631,656,573,655,515,666,508,669,498,722,456,724,433,690,399,676,416,669,400,665,373,653,378,656,395,646,399,635,390,615,393,605,395,610,386,629,366,624,350,604,355,604,341,608,326,598,316,588,316,578,305,572,291,579,284','','','558, 355','575, 415','553, 465','587, 527','20');
INSERT INTO `location` VALUES ('15','Paitan','404,328,441,326,458,355,506,374,511,389,530,397,543,425,530,422,509,453,498,449,495,452,488,450,484,437,469,436,473,444,453,440,414,417,406,404,415,387,418,368,397,356','','','419, 349','434, 376','470, 387','479, 416','15');
INSERT INTO `location` VALUES ('16','Libertad','398,356,417,368,417,386,408,402,417,414,454,436,470,442,469,433,482,436,485,451,494,451,499,450,508,452,559,550,558,573,531,578,530,596,561,598,566,616,580,631,562,654,465,652,454,636,465,595,455,587,470,569,443,567,434,535,413,534,414,520,424,519,419,478,431,470,425,455,374,462','','','448, 470','484, 497','460, 552','497, 598','15');
INSERT INTO `location` VALUES ('17','Tamlang','333,359,321,448,373,464,405,327,440,326,434,307,417,306,420,291,408,283','','','395, 315','372, 344','350, 396','345, 426','15');
INSERT INTO `location` VALUES ('18','Binaguiohan','322,449,373,464,423,456,429,472,417,483,422,520,297,547,313,507','','','328, 515','349, 474','361, 512','385, 492','15');
INSERT INTO `location` VALUES ('19','Magsaysay','187,506,313,505,332,360','','','235, 480','304, 406','292, 444','272, 474','15');
INSERT INTO `location` VALUES ('20','Pinapugasan','295,547,295,652,462,652,452,635,462,597,458,590,469,571,444,569,436,538,413,535,414,523','','','330, 561','380, 563','334, 616','394, 625','18');
INSERT INTO `location` VALUES ('21','Dian-ay','33,657,188,505,312,507,297,545,294,652,72,652','','','184, 549','236, 542','143, 604','219, 619','20');

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
  `year_id` int(11) NOT NULL,
  `createddate` DATETIME,
  `updateddate` DATETIME,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0 ;

--
-- Dumping data for table `student`
--
-- --------------------------------------------------------
INSERT INTO `child` (`id`, `fname`, `lname`, `mname`, `address`, `locationID`, `dob`, `height`, `weight`, `gender`, `months`, `status_id`, `year_id`, `createddate`, `updateddate`) VALUES
(1, 'Audrey', 'Mercado', 'Villa', 'Escalante City', 7, '2013-02-08 00:00:00', '67', '17', 'Female', 31, 1, 1, '2015-09-01 13:42:08', '2015-09-04 13:59:20'),
(2, 'Patric', 'Dela Cruz', 'Tan', 'Esc.', 20, '2012-10-26 00:00:00', '34', '9.1', 'Male', 34, 2, 1, '2015-09-01 13:55:43', NULL),
(3, 'Glezza', 'Balopenas', 'Patan', 'Escalanate', 17, '2011-11-12 00:00:00', '111', '11.2', 'Female', 46, 3, 1, '2015-09-01 14:14:44', '2015-09-01 14:33:56'),
(4, 'Gean', 'Gracia', 'Alcos', 'Escalante City', 2, '2014-11-10 00:00:00', '53', '4.4', 'Male', 10, 2, 1, '2015-09-01 14:33:09', NULL),
(5, 'Jon Lester', 'Lester', 'HOn', 'Escalante', 9, '2011-05-02 00:00:00', '38', '67', 'Male', 52, 4, 1, '2015-09-01 14:39:10', '2015-09-04 15:31:37'),
(6, 'Garpes', 'Chris', 'ponyo', 'Escalante', 7, '2009-12-28 00:00:00', '66', '17.0', 'Male', 68, 1, 1, '2015-09-01 14:51:00', NULL),
(7, 'rubelyn', 'uy', 'villa', 'esc', 17, '2010-03-04 00:00:00', '124', '28', 'Female', 66, 4, 1, '2015-09-02 09:36:39', NULL),
(8, 'Asley Gwapo', 'Mahilum', 'Malaay', 'Escalante City', 9, '2012-11-21 00:00:00', '124', '46', 'Male', 33, 4, 1, '2015-09-04 11:44:40', '2015-09-04 15:16:18'),
(9, 'John Jeirod', 'Salusdaquit', 'Pacina', 'Escalante City', 5, '2014-11-10 00:00:00', '59', '8', 'Male', 10, 1, 1, '2015-09-04 11:48:26', NULL),
(10, 'Rose Marie', 'Cabarabias', 'Bulahan', 'Escalante City', 5, '2009-11-24 00:00:00', '70', '15', 'Female', 69, 3, 1, '2015-09-04 11:51:04', NULL),
(11, 'Jenny Love', 'Carbaquel', 'Luneta', 'Escalante City', 5, '2011-03-03 00:00:00', '53', '23', 'Female', 54, 4, 1, '2015-09-04 11:53:36', NULL),
(12, 'Jan', 'Cuberos', 'Aponte', 'Escalante City', 5, '2012-01-13 00:00:00', '47', '8', 'Male', 44, 2, 1, '2015-09-04 11:55:11', NULL),
(13, 'Pauline Mae ', 'Tabuada', 'Segovia ', 'Escalante City', 5, '2012-02-28 00:00:00', '45', '9.5', 'Female', 42, 2, 1, '2015-09-04 11:58:41', NULL),
(14, 'Vicente', 'Tabotabo', 'Pelayo', 'Escalante City', 16, '2010-04-24 00:00:00', '56', '11', 'Male', 64, 2, 1, '2015-09-04 12:00:30', '2015-09-04 15:48:45'),
(15, 'Thirdy', 'Zaragoza', 'Bachoco', 'Escalante City', 5, '2013-10-24 00:00:00', '34', '12', 'Male', 22, 1, 1, '2015-09-04 12:02:38', NULL),
(16, 'Karen', 'Salvadaquit', 'Paclibar', 'Esacalante City', 5, '2014-11-10 00:00:00', '53', '7', 'Female', 10, 3, 1, '2015-09-04 12:04:52', NULL),
(17, 'Ranalyn', 'Albarico', 'Lopez', 'Escalante City', 5, '2014-05-09 00:00:00', '45', '9.3', 'Female', 16, 1, 1, '2015-09-04 12:15:14', NULL),
(18, 'Brushel Jay', 'Lobaton', 'Aloria', 'Escalante City', 5, '2014-07-09 00:00:00', '35', '6', 'Female', 14, 2, 1, '2015-09-04 12:17:03', NULL),
(19, 'Rhea', 'Soberano', 'Ingalla', 'Escalante City', 4, '2012-06-29 00:00:00', '78', '30.4', 'Female', 38, 4, 1, '2015-09-04 12:31:52', NULL),
(20, 'Mely', 'Luneta', 'Abello', 'Escalante City', 4, '2013-06-29 00:00:00', '67', '34', 'Female', 26, 4, 1, '2015-09-04 12:33:49', NULL),
(21, 'Sheila', 'Gillana', 'Jarabelo', 'Escalante City', 4, '2012-01-03 00:00:00', '84', '18.8', 'Female', 44, 1, 1, '2015-09-04 12:35:22', NULL),
(22, 'Loren', 'Mapa', 'aducal', 'Escalante City', 4, '2013-04-03 00:00:00', '68', '20.5', 'Female', 29, 4, 1, '2015-09-04 12:36:38', NULL),
(23, 'Rena', 'Villanueva', 'Silva', 'Escalante', 5, '2010-08-09 00:00:00', '87', '20.5', 'Female', 61, 1, 1, '2015-09-04 12:38:04', NULL),
(24, 'Mac Jiro', 'Agabon', 'Sanchez', 'Escalante City', 18, '2012-09-30 00:00:00', '81', '9.8', 'Male', 35, 2, 1, '2015-09-04 12:40:57', NULL),
(25, 'Rodave', 'Canoy', 'Tan-awan', 'Escalante City', 18, '2012-06-12 00:00:00', '84', '14.5', 'Male', 39, 1, 1, '2015-09-04 12:42:54', NULL),
(26, 'Rose', 'Cadalso', 'Lozano', 'Escalante City', 18, '2013-12-27 00:00:00', '82', '11.6', 'Female', 20, 1, 1, '2015-09-04 12:44:12', NULL),
(27, 'Arianne', 'Cabuhat', 'Villa', 'Escalante City', 18, '2014-05-25 00:00:00', '34', '12.6', 'Female', 15, 1, 1, '2015-09-04 12:45:49', NULL),
(28, 'Angel', 'Moral', 'Mahusay', 'Escalante City', 18, '2012-12-23 00:00:00', '69', '9.9', 'Female', 32, 3, 1, '2015-09-04 12:47:41', NULL),
(29, 'Roland', 'Baluado', 'Calopez', 'Escalante City', 18, '2013-11-02 00:00:00', '54', '13.9', 'Male', 22, 1, 1, '2015-09-04 12:49:25', NULL),
(30, 'Mary Grace', 'Idullan', 'Cabag', 'Escalante City', 10, '2010-03-04 00:00:00', '89', '24.9', 'Female', 66, 1, 1, '2015-09-04 12:56:28', NULL),
(31, 'Randy', 'Jarabelo', 'Bachoco', 'Escalante City', 10, '2012-05-26 00:00:00', '75', '11.5', 'Male', 39, 3, 1, '2015-09-04 12:58:46', NULL),
(32, 'Rassel', 'Dela Cruz', 'Cabo', 'Escalante City', 10, '2012-09-09 00:00:00', '78', '9.15', 'Female', 36, 2, 1, '2015-09-04 13:00:51', NULL),
(33, 'Dayna', 'Lapastora', 'Clarin', 'Escalante City', 10, '2011-04-26 00:00:00', '89', '25.6', 'Female', 52, 4, 1, '2015-09-04 13:04:12', NULL),
(34, 'Jon Jon', 'Damalerio', 'Cabuguason', 'Escalante City', 10, '2012-03-08 00:00:00', '71.5', '13', 'Male', 42, 1, 1, '2015-09-04 13:10:01', NULL),
(35, 'Carlo', 'Serios', 'Villar', 'Escalante City', 10, '2011-11-12 00:00:00', '94', '15', 'Male', 46, 1, 1, '2015-09-04 13:11:15', NULL),
(36, 'Raven', 'Cedona', 'Ibanos', 'Escalante City', 10, '2011-10-07 00:00:00', '89', '11', 'Male', 47, 2, 1, '2015-09-04 13:12:47', NULL),
(37, 'Kent ', 'Liavao', 'Palmares', 'Escalante City', 10, '2011-10-12 00:00:00', '94', '13.4', 'Male', 47, 1, 1, '2015-09-04 13:13:55', NULL),
(38, 'Kyla', 'Hernandez', 'Palma', 'Escalante City', 10, '2011-03-14 00:00:00', '107', '17', 'Female', 54, 1, 1, '2015-09-04 13:16:03', NULL),
(39, 'Nathaniel', 'Sivilla', 'Blanco', 'Escalante City', 1, '2011-04-28 00:00:00', '93', '17.8', 'Male', 52, 1, 1, '2015-09-04 13:20:10', NULL),
(40, 'Joecel Joy ', 'Guanzon', 'Legaspi', 'Escalnte City', 1, '2010-01-20 00:00:00', '99', '14.9', 'Female', 67, 3, 1, '2015-09-04 13:21:54', NULL),
(41, 'Jovelito', 'Maquiza', 'Yee', 'Escalante City', 1, '2009-12-17 00:00:00', '99.5', '13.6', 'Male', 69, 2, 1, '2015-09-04 13:23:40', NULL),
(42, 'Anne', 'Binonggo', 'Sipalo', 'Escalante City', 1, '2012-12-08 00:00:00', '56', '17.9', 'Female', 33, 4, 1, '2015-09-04 13:25:26', NULL),
(43, 'Andrew', 'Pahilanga', 'Sevallos', 'Escalante City', 1, '2009-11-22 00:00:00', '105', '16.0', 'Male', 69, 1, 1, '2015-09-04 13:27:13', NULL),
(44, 'Angelo', 'Siblag', 'Cortes', 'Escalante City', 21, '2009-11-17 00:00:00', '98', '18.9', 'Male', 70, 1, 1, '2015-09-04 13:29:25', NULL),
(45, 'Annabelle', 'Bautista', 'Alvarez', 'Escalante City', 21, '2012-01-17 00:00:00', '78', '10.8', 'Female', 44, 2, 1, '2015-09-04 13:30:40', NULL),
(46, 'Loren', 'Hachuela', 'Hernandez', 'Escalante City', 21, '2013-09-04 00:00:00', '53', '12.4', 'Female', 24, 1, 1, '2015-09-04 13:32:04', NULL),
(47, 'Renz', 'Vilchez', 'Mahinay', 'Escalante City', 21, '2009-10-09 00:00:00', '102', '16.0', 'Male', 71, 1, 1, '2015-09-04 13:33:24', NULL),
(48, 'Joemarie', 'Pelaez', 'Santillan', 'Escalante City', 2, '2010-02-15 00:00:00', '113', '17.5', 'Male', 67, 1, 1, '2015-09-04 13:37:37', NULL),
(49, 'Vina', 'Mahusay', 'Bacolod', 'Escalante City', 2, '2010-06-12 00:00:00', '89', '14.2', 'Female', 63, 3, 1, '2015-09-04 13:39:34', NULL),
(50, 'Yllie', 'Rama', 'Lacang', 'Escalante City', 2, '2009-09-23 00:00:00', '99', '17.7', 'Female', 71, 1, 1, '2015-09-04 13:41:02', NULL),
(51, 'Rosell', 'Garcia', 'Pascual', 'Escalante City', 2, '2010-09-02 00:00:00', '99', '12.2', 'Female', 60, 2, 1, '2015-09-04 13:42:27', NULL),
(52, 'Romela', 'Lumbo', 'Ledesma', 'Escalante City', 2, '2012-06-23 00:00:00', '89', '18.9', 'Female', 38, 4, 1, '2015-09-04 13:44:28', NULL),
(53, 'Donnel John', 'Ometer', 'Ganancial', 'Escalanta City', 12, '2011-06-23 00:00:00', '112', '20.8', 'Male', 50, 1, 1, '2015-09-04 13:47:19', NULL),
(54, 'Rowelyn', 'Redido', 'Paes', 'Escalante City', 12, '2011-08-09 00:00:00', '78', '11.9', 'Female', 49, 3, 1, '2015-09-04 13:49:02', NULL),
(55, 'Grace', 'Morales', 'Teodosio', 'Escalante City', 12, '2011-01-22 00:00:00', '89', '11.7', 'Female', 55, 2, 1, '2015-09-04 13:50:25', NULL),
(56, 'Lyndon', 'Jumantoc', 'Lucero ', 'Escalante City', 12, '2012-07-08 00:00:00', '97', '19.9', 'Male', 38, 4, 1, '2015-09-04 13:51:57', NULL),
(57, 'Edzel', 'Londres', 'Naranjo', 'Escalante City', 12, '2013-05-07 00:00:00', '87', '12.9', 'Male', 28, 1, 1, '2015-09-04 13:53:35', NULL),
(58, 'Charles Adrian', 'Herroro', 'Lamique', 'Escalante City', 7, '2012-02-28 00:00:00', '90', '19', 'Male', 42, 1, 1, '2015-09-04 13:55:13', NULL),
(59, 'Irez Belle', 'Calvo', 'Moronez', 'Escalante City', 7, '2009-12-09 00:00:00', '77', '13.9', 'Female', 69, 3, 1, '2015-09-04 13:57:47', NULL),
(60, 'Mars Jhon', 'Ticala ', 'Lop', 'Escalante', 9, '2010-12-08 00:00:00', '99', '13.1', 'Male', 57, 3, 1, '2015-09-04 15:09:09', '2015-09-04 15:40:44'),
(61, 'Kristel', 'Kristal Jean', 'Mon', 'Escalante City', 9, '2014-06-22 00:00:00', '67', '15.9', 'Female', 14, 4, 1, '2015-09-04 15:14:33', '2015-09-04 15:41:00'),
(62, 'Marie', 'Supilanas', 'Jean', 'Escalante City', 9, '2013-07-11 00:00:00', '123', '15.9', 'Female', 26, 4, 1, '2015-09-04 15:19:41', '2015-09-04 15:41:54'),
(63, 'Jean', 'Guilonas', 'Lopez', 'Escalante City', 9, '2009-12-07 00:00:00', '89', '78', 'Female', 69, 4, 1, '2015-09-04 15:22:29', NULL),
(64, 'Kristel', 'Habilis', 'Honas', 'Escalante City', 9, '2012-02-10 00:00:00', '80', '47', 'Female', 43, 4, 1, '2015-09-04 15:29:16', NULL),
(65, 'Katherine', 'Sante', 'lonas', 'Escalante City', 16, '2010-10-04 00:00:00', '99', '13.1', 'Female', 59, 3, 1, '2015-09-04 15:34:52', NULL),
(66, 'Jean', 'Aldanta', 'Kilo', 'Escalanate City', 16, '2011-02-09 00:00:00', '99', '56', 'Female', 55, 4, 1, '2015-09-04 15:39:54', NULL),
(67, 'Kris', 'Intok', 'Jen', 'Escalante City', 17, '2010-04-05 00:00:00', '59', '13', 'Female', 65, 2, 1, '2015-09-04 15:46:14', '2015-09-04 15:48:11');

-- --------------------------------------------------------
--
-- Table structure for table `userdata`
--
DROP TABLE IF EXISTS `userdata`;
CREATE TABLE IF NOT EXISTS `userdata` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `str_password` varchar(100) NOT NULL,
  `email` varchar(60),
  `mobileno` varchar(45),
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `locationID` int(11) NULL,
  `level` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0 ;

--
-- Dumping data for table `userdata`
--
INSERT INTO `userdata` VALUES ('1', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997','admin','sample@email.com','12345678910','Admin','Admin','','Admin');

--
-- Table structure for table `usergroup`
--
DROP TABLE IF EXISTS `usergroup`;
CREATE TABLE IF NOT EXISTS `usergroup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `module` varchar(100) NOT NULL,
  `level`  varchar(100) NOT NULL,
  `allow` tinyint(2),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0 ;

--
-- Dumping data for table `usergroup`
--
INSERT INTO `usergroup` VALUES ('1', 'Dashboard','Admin', '1');
INSERT INTO `usergroup` VALUES ('2', 'CNO','Admin', '1');
INSERT INTO `usergroup` VALUES ('3', 'Child','Admin', '1');
INSERT INTO `usergroup` VALUES ('4', 'Location','Admin', '1');
INSERT INTO `usergroup` VALUES ('5', 'YearTerms','Admin', '1');
INSERT INTO `usergroup` VALUES ('6', 'Reports','Admin', '1');
INSERT INTO `usergroup` VALUES ('7', 'DSS','Admin', '1');
INSERT INTO `usergroup` VALUES ('8', 'Profile','Admin', '1');
INSERT INTO `usergroup` VALUES ('9', 'UserGroup','Admin', '1');
INSERT INTO `usergroup` VALUES ('10', 'UserAccount','Admin', '1');

INSERT INTO `usergroup` VALUES ('11', 'Dashboard','User', '1');
INSERT INTO `usergroup` VALUES ('12', 'CNO','User', '0');
INSERT INTO `usergroup` VALUES ('13', 'Child','User', '1');
INSERT INTO `usergroup` VALUES ('14', 'Location','User', '0');
INSERT INTO `usergroup` VALUES ('15', 'YearTerms','User', '0');
INSERT INTO `usergroup` VALUES ('16', 'Reports','User', '0');
INSERT INTO `usergroup` VALUES ('17', 'DSS','User', '0');
INSERT INTO `usergroup` VALUES ('18', 'Profile','User', '1');
INSERT INTO `usergroup` VALUES ('19', 'UserGroup','User', '0');
INSERT INTO `usergroup` VALUES ('20', 'UserAccount','User', '0');

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
INSERT INTO `status` VALUES ('1', 'normal', 'NORMAL');
INSERT INTO `status` VALUES ('2', 'severely underweight', 'SEVERELY UNDERWEIGHT');
INSERT INTO `status` VALUES ('3', 'underweight', 'UNDERWEIGHT');
INSERT INTO `status` VALUES ('4', 'overweight', 'OVERWEIGHT');

--
-- Table structure for table `yearterms`
--
DROP TABLE IF EXISTS `yearterms`;
CREATE TABLE IF NOT EXISTS `yearterms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `year` varchar(100) NOT NULL,
  `terms` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0;
--
-- Dumping data for table `yearterms`
--


DELIMITER $$
CREATE PROCEDURE printLocationStatus(IN ID INTEGER)
BEGIN
  SET @rank=0;
  SELECT A.*, @rank:=@rank+1 AS rank FROM
  (
    SELECT l.id,l.name,l.description,l.landarea,
    (SELECT COUNT(c.id) FROM child c WHERE c.status_id=ID AND c.locationID=l.id) AS noOfchild
    FROM location l
    GROUP BY l.id
    ORDER BY noOfchild DESC
  ) AS A ORDER BY rank ASC;
END$$

CREATE PROCEDURE printSevereUnder()
BEGIN
  SET @rank=0;
  SELECT A.*,@rank:=@rank+1 AS rank FROM 
  (
    SELECT l.id,l.name,l.description,l.landarea,
    (SELECT COUNT(c.id) FROM child c WHERE c.status_id=2 AND c.locationID=l.id) AS under,
    (SELECT COUNT(c.id) FROM child c WHERE c.status_id=3 AND c.locationID=l.id) AS severely,
    ((SELECT COUNT(c.id) FROM child c WHERE c.status_id=2 AND c.locationID=l.id) + (SELECT COUNT(c.id) FROM child c WHERE c.status_id=3 AND c.locationID=l.id)) AS  Total
    FROM location l
    GROUP BY l.id
    ORDER By Total DESC
  ) AS A ORDER BY rank ASC;
END$$

DELIMITER $$
CREATE PROCEDURE printSevereUnderLocation (IN ID INTEGER)
BEGIN
  SET @rank=0;
  SELECT A.*,@rank:=@rank+1 AS rank FROM 
  (
    SELECT l.id,l.name,l.description,l.landarea,
    (SELECT COUNT(c.id) FROM child c WHERE c.status_id=2 AND c.locationID=l.id) AS under,
    (SELECT COUNT(c.id) FROM child c WHERE c.status_id=3 AND c.locationID=l.id) AS severely,
    ((SELECT COUNT(c.id) FROM child c WHERE c.status_id=2 AND c.locationID=l.id) + (SELECT COUNT(c.id) FROM child c WHERE c.status_id=3 AND c.locationID=l.id)) AS  Total
    FROM location l WHERE l.id=ID
    GROUP BY l.id
    ORDER By Total DESC
  ) AS A ORDER BY rank ASC;
END$$


CREATE PROCEDURE printDSS(IN STATUSID VARCHAR(10),IN YEAR VARCHAR(10))
BEGIN
  SET @rank=0;
  SELECT A.* ,@rank:=@rank+1 AS rank FROM (
  SELECT l.id,l.name,l.description,l.landarea,
  (SELECT COUNT(c.id) FROM child c WHERE c.status_id=STATUSID AND c.locationID=l.id AND c.year_id=YEAR) AS Count
  FROM location l
  GROUP BY l.id
  ORDER BY Count DESC) AS A WHERE A.Count > 0 LIMIT 5;
END$$


CREATE PROCEDURE printStatusGender(IN ID INTEGER)
BEGIN
  SET @rank=0;
  SELECT l.id,l.name,l.description,l.landarea,
  (SELECT COUNT(c.id) FROM child c WHERE c.status_id=ID AND c.gender='Male' AND c.locationID=l.id) AS Male,
  (SELECT COUNT(c.id) FROM child c WHERE c.status_id=ID AND c.gender='Female' AND c.locationID=l.id) AS Female,
  @rank:=@rank+1 AS rank
  FROM location l
  GROUP BY l.id
  ORDER BY  Male DESC,Female DESC, rank ASC;
END;
