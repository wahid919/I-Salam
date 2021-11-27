-- Adminer 4.6.2 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `penyaluran`;
CREATE TABLE `penyaluran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pendanaan` int(11) NOT NULL,
  `nominal` int(11) NOT NULL,
  `tanggal_penyaluran` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `penyaluran` (`id`, `id_pendanaan`, `nominal`, `tanggal_penyaluran`) VALUES
(1,	2,	5000000,	'2021-11-27 14:12:25'),
(2,	22,	50000,	'2021-11-27 15:35:02');

-- 2021-11-27 11:26:08
