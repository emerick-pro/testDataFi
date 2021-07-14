-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 14, 2021 at 02:22 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `drugrefill`
--

-- --------------------------------------------------------

--
-- Table structure for table `arv_refills`
--

DROP TABLE IF EXISTS `arv_refills`;
CREATE TABLE IF NOT EXISTS `arv_refills` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `patient_code` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facility_name` varchar(48) COLLATE utf8mb4_unicode_ci DEFAULT 'DATAFI TEST',
  `date_refill` date DEFAULT NULL,
  `medecine_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nbr_days` int(10) DEFAULT NULL,
  `date_recorded` datetime DEFAULT NULL,
  `commentaire` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prochain_rendez_vous` date DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `codepatient` (`patient_code`),
  KEY `dateappro` (`date_refill`),
  KEY `codepatient_2` (`patient_code`,`date_refill`),
  KEY `combinaison` (`medecine_name`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `arv_refills`
--

INSERT INTO `arv_refills` (`id`, `patient_code`, `facility_name`, `date_refill`, `medecine_name`, `quantity`, `nbr_days`, `date_recorded`, `commentaire`, `prochain_rendez_vous`, `updated_at`, `created_at`) VALUES
(5, '65', 'DATAFI TEST', '2020-12-14', NULL, '30', 30, NULL, NULL, '2021-01-12', '2021-07-14 14:06:16', '2021-07-14 14:06:16'),
(4, '65', 'DATAFI TEST', '2020-02-15', NULL, '2', 151, NULL, NULL, '2021-01-12', '2021-07-14 13:31:06', '2021-07-14 13:31:06');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

DROP TABLE IF EXISTS `patients`;
CREATE TABLE IF NOT EXISTS `patients` (
  `id` bigint(20) NOT NULL,
  `facility_id` varchar(22) DEFAULT NULL,
  `patient_code` varchar(10) NOT NULL,
  `name` varchar(50) CHARACTER SET latin1 NOT NULL,
  `date_birth` date DEFAULT NULL,
  `date_enrollment` date DEFAULT NULL,
  `sex` varchar(1) CHARACTER SET latin1 DEFAULT NULL,
  `adresse` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `prename` varchar(30) CHARACTER SET latin1 DEFAULT '',
  `date_arv_start` date NOT NULL DEFAULT '1900-01-01',
  `date_stop` date NOT NULL DEFAULT '1900-01-01',
  `on_which_arv` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `date_tested_positive` date DEFAULT '1900-01-01',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `days_last_dispensation` int(11) NOT NULL DEFAULT '0',
  `prochain_rendez_vous` date DEFAULT '1900-01-01'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `facility_id`, `patient_code`, `name`, `date_birth`, `date_enrollment`, `sex`, `adresse`, `prename`, `date_arv_start`, `date_stop`, `on_which_arv`, `date_tested_positive`, `created_at`, `updated_at`, `days_last_dispensation`, `prochain_rendez_vous`) VALUES
(1, NULL, '65', 'Mwimenyerezo', '2011-11-01', '2020-06-01', 'F', NULL, 'Exercice', '1900-01-01', '1900-01-01', NULL, '1900-01-01', NULL, NULL, 0, '1900-01-01');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
