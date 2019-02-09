-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 09, 2019 at 07:48 AM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kompanija`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_01_02_160151_initial_create', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('milospetrovic008@gmail.com', '$2y$10$5DHqmpGkpZBKn0wONlI7s.9m2U/nvdYTVnIZs36RHaQHmd6h2phNS', '2019-01-08 10:42:33');

-- --------------------------------------------------------

--
-- Table structure for table `poslodavac`
--

DROP TABLE IF EXISTS `poslodavac`;
CREATE TABLE IF NOT EXISTS `poslodavac` (
  `JMBG` char(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ime` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prezime` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `godine` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`JMBG`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `poslodavac`
--

INSERT INTO `poslodavac` (`JMBG`, `ime`, `prezime`, `godine`) VALUES
('1234567891000', 'Aleksandar', 'Ognjenovic', 40),
('1234567892000', 'Milos', 'Nikolic', 42),
('1234567893000', 'Aleksandar', 'Crncevic', 38);

-- --------------------------------------------------------

--
-- Table structure for table `radnik`
--

DROP TABLE IF EXISTS `radnik`;
CREATE TABLE IF NOT EXISTS `radnik` (
  `JMBG` char(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ime` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prezime` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `godine` int(10) UNSIGNED NOT NULL,
  `datum_zaposlenja` date NOT NULL,
  `naziv_radnog_mesta` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `JMBG_poslodavca` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`JMBG`),
  KEY `radnik_naziv_radnog_mesta_foreign` (`naziv_radnog_mesta`),
  KEY `radnik_jmbg_poslodavca_foreign` (`JMBG_poslodavca`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `radnik`
--

INSERT INTO `radnik` (`JMBG`, `ime`, `prezime`, `godine`, `datum_zaposlenja`, `naziv_radnog_mesta`, `JMBG_poslodavca`) VALUES
('1234567890001', 'Nikola', 'Nikolic', 25, '2010-11-21', 'Elektricar', '1234567891000'),
('1234567890002', 'Zoran', 'Dimitrijevic', 31, '2008-05-18', 'Domar', '1234567891000'),
('1234567890003', 'Sava', 'Cakic', 24, '2015-04-18', 'Inspektor', '1234567892000'),
('1234567890004', 'Stefan', 'Petrovic', 33, '2012-10-28', 'Programer', '1234567893000'),
('1234567890005', 'Jelena', 'Nedovic', 35, '2018-05-03', 'Programer', '1234567893000'),
('1234567890006', 'Aleksandar', 'Nemanjic', 32, '2017-07-07', 'Inspektor', '1234567891000'),
('1234567890007', 'Marko', 'Markovic', 24, '2019-08-03', 'Elektricar', '1234567893000');

-- --------------------------------------------------------

--
-- Table structure for table `radno_mesto`
--

DROP TABLE IF EXISTS `radno_mesto`;
CREATE TABLE IF NOT EXISTS `radno_mesto` (
  `naziv` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`naziv`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `radno_mesto`
--

INSERT INTO `radno_mesto` (`naziv`) VALUES
('Domar'),
('Elektricar'),
('Inspektor'),
('Programer'),
('Vodoinstalater');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Milos Petrovic', 'milospetrovic008@gmail.com', NULL, '$2y$10$3Vw/9awdWGhS9DanQHdUpeKM0N3l2tPY7m00R2ClB8ruWVdPJZHrO', 'ejZACyIS7Vqnzx6UnlufQsbe14hkfNiujXbE4AkB4mk41gNS9dvAvx4PyP93', '2019-01-06 13:44:58', '2019-01-06 13:44:58');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
