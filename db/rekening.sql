-- Adminer 4.6.2 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `rekening`;
CREATE TABLE `rekening` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_bank` varchar(255) NOT NULL,
  `nomor_rekening` varchar(20) NOT NULL,
  `nama_rekening` varchar(100) NOT NULL,
  `jenis_rekening` varchar(100) NOT NULL,
  `flag` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `rekening` (`id`, `jenis_bank`, `nomor_rekening`, `nama_rekening`, `jenis_rekening`, `flag`) VALUES
(1,	'Bank Negara Indonesia',	'681.18767',	'Yayasan Initiator Wakaf',	'Penerima Wakaf',	1),
(2,	'Bank Central Asia',	'681.5234.12',	'Yayasan Initiator Salam',	'Penerima Wakaf',	1);

-- 2021-11-27 04:09:02
