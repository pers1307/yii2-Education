/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50538
Source Host           : localhost:3306
Source Database       : yii2

Target Server Type    : MYSQL
Target Server Version : 50538
File Encoding         : 65001

Date: 2016-05-11 10:02:48
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for customers
-- ----------------------------
DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers` (
  `CustomersID` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(45) NOT NULL,
  `SecondName` varchar(45) NOT NULL,
  `Phone` varchar(45) DEFAULT NULL,
  `Adress` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`CustomersID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of customers
-- ----------------------------
INSERT INTO `customers` VALUES ('1', 'Николай', 'Афанасьев', '02', 'г. Москва ул.Пушкина д.12');

-- ----------------------------
-- Table structure for employees
-- ----------------------------
DROP TABLE IF EXISTS `employees`;
CREATE TABLE `employees` (
  `EmployeeID` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(45) NOT NULL,
  `SecondName` varchar(45) NOT NULL,
  `Phone` varchar(45) NOT NULL,
  `Hired` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Job` int(11) NOT NULL,
  `Fired` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`EmployeeID`),
  KEY `fk_Employees_Jobs_idx` (`Job`),
  CONSTRAINT `fk_Employees_Jobs` FOREIGN KEY (`Job`) REFERENCES `jobs` (`JobID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of employees
-- ----------------------------
INSERT INTO `employees` VALUES ('1', 'Василий', 'Наливайко', '88005553535', '2015-04-03 21:00:00', '1', null);

-- ----------------------------
-- Table structure for jobs
-- ----------------------------
DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs` (
  `JobID` int(11) NOT NULL AUTO_INCREMENT,
  `Description` varchar(45) NOT NULL,
  PRIMARY KEY (`JobID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jobs
-- ----------------------------
INSERT INTO `jobs` VALUES ('1', 'Кассир');

-- ----------------------------
-- Table structure for journal
-- ----------------------------
DROP TABLE IF EXISTS `journal`;
CREATE TABLE `journal` (
  `OfferID` int(11) NOT NULL AUTO_INCREMENT,
  `SellDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Employee` int(11) DEFAULT NULL,
  `CustomerID` int(11) DEFAULT NULL,
  PRIMARY KEY (`OfferID`),
  KEY `fk_Journal_Employees1_idx` (`Employee`),
  KEY `fk_Journal_Customers1_idx` (`CustomerID`),
  CONSTRAINT `fk_Journal_Customers1` FOREIGN KEY (`CustomerID`) REFERENCES `customers` (`CustomersID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Journal_Employees1` FOREIGN KEY (`Employee`) REFERENCES `employees` (`EmployeeID`) ON DELETE SET NULL ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of journal
-- ----------------------------
INSERT INTO `journal` VALUES ('1', '2016-02-10 21:00:00', '1', '1');

-- ----------------------------
-- Table structure for medicinelist
-- ----------------------------
DROP TABLE IF EXISTS `medicinelist`;
CREATE TABLE `medicinelist` (
  `MedID` int(11) NOT NULL,
  `Name` varchar(45) NOT NULL,
  `DateOfProd` date NOT NULL,
  `BestBefore` date NOT NULL,
  PRIMARY KEY (`MedID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of medicinelist
-- ----------------------------
INSERT INTO `medicinelist` VALUES ('1', 'Аспирин', '0000-00-00', '0000-00-00');

-- ----------------------------
-- Table structure for medicinelist_has_journal
-- ----------------------------
DROP TABLE IF EXISTS `medicinelist_has_journal`;
CREATE TABLE `medicinelist_has_journal` (
  `MedID` int(11) NOT NULL,
  `JournalID` int(11) NOT NULL,
  `Count` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`MedID`,`JournalID`),
  KEY `fk_MedicineList_has_Journal_Journal1_idx` (`JournalID`),
  KEY `fk_MedicineList_has_Journal_MedicineList1_idx` (`MedID`),
  CONSTRAINT `fk_MedicineList_has_Journal_Journal1` FOREIGN KEY (`JournalID`) REFERENCES `journal` (`OfferID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_MedicineList_has_Journal_MedicineList1` FOREIGN KEY (`MedID`) REFERENCES `medicinelist` (`MedID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of medicinelist_has_journal
-- ----------------------------
INSERT INTO `medicinelist_has_journal` VALUES ('1', '1', '2');

-- ----------------------------
-- Table structure for migration
-- ----------------------------
DROP TABLE IF EXISTS `migration`;
CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of migration
-- ----------------------------
INSERT INTO `migration` VALUES ('m000000_000000_base', '1462379184');
INSERT INTO `migration` VALUES ('m130524_201442_init', '1462379189');

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `all_sum` decimal(10,0) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT NULL,
  `date_updated` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of orders
-- ----------------------------

-- ----------------------------
-- Table structure for profile
-- ----------------------------
DROP TABLE IF EXISTS `profile`;
CREATE TABLE `profile` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `sex` tinyint(1) DEFAULT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `born_date` varchar(255) DEFAULT NULL,
  `town` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of profile
-- ----------------------------
INSERT INTO `profile` VALUES ('1', '222', '4', '4', '4', '4');
INSERT INTO `profile` VALUES ('5', null, '1', null, '06/02/2016', null);
INSERT INTO `profile` VALUES ('6', null, '1', null, '06/02/2016', null);

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`),
  CONSTRAINT `id_id_profile` FOREIGN KEY (`id`) REFERENCES `profile` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('6', '', '', '', null, 'sr@t.ty', '10', '0', '0');
