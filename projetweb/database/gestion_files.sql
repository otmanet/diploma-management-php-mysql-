-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 04, 2022 at 12:54 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gestion_files`
--

-- --------------------------------------------------------

--
-- Table structure for table `etudiant`
--

DROP TABLE IF EXISTS `etudiant`;
CREATE TABLE IF NOT EXISTS `etudiant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) COLLATE utf8_bin NOT NULL,
  `prenom` varchar(45) COLLATE utf8_bin NOT NULL,
  `email` varchar(45) COLLATE utf8_bin NOT NULL,
  `numero_telephone` int(11) NOT NULL,
  `CNE` varchar(45) COLLATE utf8_bin NOT NULL,
  `CIN` varchar(45) COLLATE utf8_bin NOT NULL,
  `adress` varchar(45) COLLATE utf8_bin NOT NULL,
  `diplome` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `etudiant`
--

INSERT INTO `etudiant` (`id`, `nom`, `prenom`, `email`, `numero_telephone`, `CNE`, `CIN`, `adress`, `diplome`) VALUES
(9, 'zahouani', 'zineb', 'zahouanizineb@gmail.com', 658191666, 'f13426', 'Q43578', 'khouribga', 0),
(10, 'sammat', 'sanaa', 'sanaasammat256@gmail.com', 658191666, 'f13426', 'q4267', 'khouribga', 1);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_et` int(11) NOT NULL,
  `message` varchar(3000) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_et` (`id_et`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `id_et`, `message`) VALUES
(5, 9, 'j ai un probleme au niveau de mon cne ...'),
(6, 9, 'fdgnb,:zertjykutyutkey');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `et_id` int(11) DEFAULT NULL,
  `username` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `type_user` varchar(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  KEY `et_id` (`et_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `et_id`, `username`, `password`, `created_at`, `type_user`) VALUES
(8, 9, 'zahouanizineb', '$2y$10$QRklzv7sB7Sl7Hl7I8.jgOJ2QhlFp7RCJNSOTo6bi46kdUF86W4sG', '2022-01-02 15:55:35', 'user'),
(9, NULL, 'sanaasammat', '$2y$10$QRklzv7sB7Sl7Hl7I8.jgOJ2QhlFp7RCJNSOTo6bi46kdUF86W4sG', '2022-01-02 16:02:12', 'admin'),
(12, 10, 'ziadsammat', '$2y$10$oRFurKKnAvv8SxL/lCWyfuv3DcuM0iFXFi9ZrgWtVe3XAFxrbx192', '2022-01-02 21:13:07', 'user');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
