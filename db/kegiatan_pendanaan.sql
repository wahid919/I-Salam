-- Adminer 4.6.2 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `kegiatan_pendanaan`;
CREATE TABLE `kegiatan_pendanaan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pendanaan_id` int(11) NOT NULL,
  `kegiatan` text NOT NULL,
  `foto` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `agenda_pendanaan_id` (`pendanaan_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- 2021-11-28 12:01:58
