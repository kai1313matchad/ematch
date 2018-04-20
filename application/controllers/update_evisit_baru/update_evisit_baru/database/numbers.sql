-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               10.1.28-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table ematch.numbers
CREATE TABLE IF NOT EXISTS `numbers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_visit` int(11) DEFAULT NULL,
  `email_address` varchar(50) DEFAULT NULL,
  `verification_code` varchar(50) DEFAULT NULL,
  `verified` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=latin1;

-- Dumping data for table ematch.numbers: ~29 rows (approximately)
/*!40000 ALTER TABLE `numbers` DISABLE KEYS */;
INSERT INTO `numbers` (`id`, `id_visit`, `email_address`, `verification_code`, `verified`) VALUES
	(44, 31, 'forheron@gmail.com', '1KVI', NULL),
	(45, 32, 'forheron@gmail.com', '4FT9', 1),
	(46, 32, 'forheron@gmail.com', 'DZRI', NULL),
	(47, 34, 'forheron@gmail.com', 'CE8C', 1),
	(48, 38, 'forheron@gmail.com', 'REGC', NULL),
	(49, 39, 'forheron@gmail.com', 'ZKIH', 1),
	(50, 40, 'zamroni@match-advertising.com', 'BFFI', 1),
	(51, 49, 'zamroni@match-advertising.com', 'K35T', 1),
	(52, 51, 'zamroni@match-advertising.com', 'WB8P', NULL),
	(53, 52, 'zamroni@match-advertising.com', '75SD', NULL),
	(54, 53, 'zamroni@match-advertising.com', '8VLM', NULL),
	(55, 54, 'zamroni@match-advertising.com', 'NU89', NULL),
	(56, 55, 'zamroni@match-advertising.com', '7LTM', NULL),
	(57, 56, 'zamroni@match-advertising.com', 'NE8L', NULL),
	(58, 57, 'zamroni@match-advertising.com', 'JRN2', NULL),
	(59, 58, 'zamroni@match-advertising.com', 'IK25', NULL),
	(60, 59, 'zamroni@match-advertising.com', 'EIBK', 1),
	(61, 60, 'zamroni@match-advertising.com', '9Z99', NULL),
	(62, 61, 'zamroni@match-advertising.com', 'CFH6', 1),
	(63, 62, 'zamroni@match-advertising.com', 'WIUU', NULL),
	(64, 63, 'zamroni@match-advertising.com', '3VUE', 1),
	(65, 64, 'zamroni@match-advertising.com', 'UOOX', NULL),
	(66, 65, 'zamroni@match-advertising.com', 'SP4K', 1),
	(67, 66, 'zamroni@match-advertising.com', 'LU8Y', 1),
	(68, 67, 'zamroni@match-advertising.com', 'XUOR', 1),
	(69, 68, 'zamroni@match-advertising.com', 'CJRR', 1),
	(70, 69, 'zamroni@match-advertising.com', 'CVOI', 1),
	(71, 70, 'zamroni@match-advertising.com', 'W4CF', 1),
	(72, 71, 'zamroni@match-advertising.com', 'OB1M', 1),
	(73, 72, 'zamroni@match-advertising.com', '6F54', 1),
	(74, 73, 'zamroni@match-advertising.com', 'CYJU', 1);
/*!40000 ALTER TABLE `numbers` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
