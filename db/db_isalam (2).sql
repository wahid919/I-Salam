-- Adminer 4.7.7 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `action`;
CREATE TABLE `action` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `controller_id` varchar(50) NOT NULL,
  `action_id` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=latin1;

INSERT INTO `action` (`id`, `controller_id`, `action_id`, `name`) VALUES
(12,	'site',	'index',	'Index'),
(13,	'site',	'profile',	'Profile'),
(14,	'site',	'login',	'Login'),
(15,	'site',	'logout',	'Logout'),
(16,	'site',	'contact',	'Contact'),
(17,	'site',	'about',	'About'),
(18,	'menu',	'index',	'Index'),
(19,	'menu',	'view',	'View'),
(20,	'menu',	'create',	'Create'),
(21,	'menu',	'update',	'Update'),
(22,	'menu',	'delete',	'Delete'),
(23,	'role',	'index',	'Index'),
(24,	'role',	'view',	'View'),
(25,	'role',	'create',	'Create'),
(26,	'role',	'update',	'Update'),
(27,	'role',	'delete',	'Delete'),
(28,	'role',	'detail',	'Detail'),
(29,	'user',	'index',	'Index'),
(30,	'user',	'view',	'View'),
(31,	'user',	'create',	'Create'),
(32,	'user',	'update',	'Update'),
(33,	'user',	'delete',	'Delete'),
(34,	'site',	'register',	'Register'),
(35,	'site',	'pemasukkan',	'Pemasukkan'),
(36,	'site',	'pengeluaran',	'Pengeluaran'),
(37,	'site',	'list-perhitungan',	'List Perhitungan'),
(38,	'site',	'list-hutang',	'List Hutang'),
(39,	'site',	'jurnal',	'Jurnal'),
(40,	'site',	'neraca',	'Neraca'),
(41,	'site',	'arus-kas',	'Arus Kas'),
(42,	'site',	'proyeksi',	'Proyeksi'),
(43,	'site',	'cetak-neraca',	'Cetak Neraca'),
(44,	'site',	'cetak-list-perhitungan',	'Cetak List Perhitungan'),
(45,	'site',	'cetak-arus-kas',	'Cetak Arus Kas'),
(46,	'site',	'cetak-proyeksi',	'Cetak Proyeksi'),
(47,	'site',	'generate',	'Generate'),
(48,	'menu',	'save',	'Save'),
(49,	'bank',	'index',	'Index'),
(50,	'bank',	'view',	'View'),
(51,	'bank',	'create',	'Create'),
(52,	'bank',	'update',	'Update'),
(53,	'bank',	'delete',	'Delete'),
(54,	'kategori-pendanaan',	'index',	'Index'),
(55,	'kategori-pendanaan',	'view',	'View'),
(56,	'kategori-pendanaan',	'create',	'Create'),
(57,	'kategori-pendanaan',	'update',	'Update'),
(58,	'kategori-pendanaan',	'delete',	'Delete'),
(59,	'status',	'index',	'Index'),
(60,	'status',	'view',	'View'),
(61,	'status',	'create',	'Create'),
(62,	'status',	'update',	'Update'),
(63,	'status',	'delete',	'Delete'),
(64,	'marketing-data-user',	'index',	'Index'),
(65,	'marketing-data-user',	'view',	'View'),
(66,	'marketing-data-user',	'create',	'Create'),
(67,	'marketing-data-user',	'update',	'Update'),
(68,	'marketing-data-user',	'delete',	'Delete'),
(69,	'pembayaran',	'index',	'Index'),
(70,	'pembayaran',	'view',	'View'),
(71,	'pembayaran',	'create',	'Create'),
(72,	'pembayaran',	'update',	'Update'),
(73,	'pembayaran',	'delete',	'Delete'),
(74,	'pendanaan',	'index',	'Index'),
(75,	'pendanaan',	'view',	'View'),
(76,	'pendanaan',	'create',	'Create'),
(77,	'pendanaan',	'update',	'Update'),
(78,	'pendanaan',	'delete',	'Delete'),
(79,	'setting',	'index',	'Index'),
(80,	'setting',	'view',	'View'),
(81,	'setting',	'create',	'Create'),
(82,	'setting',	'update',	'Update'),
(83,	'setting',	'delete',	'Delete'),
(84,	'pendanaan',	'approve-pendanaan',	'Approve Pendanaan'),
(85,	'pendanaan',	'pendanaan-cair',	'Pendanaan Cair'),
(86,	'pendanaan',	'pendanaan-selesai',	'Pendanaan Selesai'),
(87,	'pendanaan',	'pendanaan-tolak',	'Pendanaan Tolak'),
(88,	'pembayaran',	'approve-pembayaran',	'Approve Pembayaran'),
(89,	'pembayaran',	'pembayaran-tolak',	'Pembayaran Tolak');

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `agenda_pendanaan`;
CREATE TABLE `agenda_pendanaan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pendanaan_id` int(11) NOT NULL,
  `nama_agenda` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pendanaan_id` (`pendanaan_id`),
  CONSTRAINT `agenda_pendanaan_ibfk_1` FOREIGN KEY (`pendanaan_id`) REFERENCES `pendanaan` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `bank`;
CREATE TABLE `bank` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

INSERT INTO `bank` (`id`, `name`, `logo`) VALUES
(1,	'BNI',	NULL),
(2,	'BRI',	NULL),
(3,	'BCA',	NULL),
(4,	'Mandiri',	NULL),
(5,	'Cimb Niaga',	NULL);

DROP TABLE IF EXISTS `kategori_pendanaan`;
CREATE TABLE `kategori_pendanaan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

INSERT INTO `kategori_pendanaan` (`id`, `name`) VALUES
(1,	'Perdagangan'),
(2,	'sedekah'),
(3,	'wakaf'),
(4,	'bencana alam');

DROP TABLE IF EXISTS `marketing_data_user`;
CREATE TABLE `marketing_data_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `domisili` varchar(255) DEFAULT NULL,
  `no_rekening` int(11) DEFAULT NULL,
  `no_identitas` varchar(255) DEFAULT NULL,
  `referensi_kerja` varchar(255) DEFAULT NULL,
  `bank_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk-marketing-data-user-to-user-table` (`user_id`),
  KEY `fk-marketing-data-user-bank` (`bank_id`),
  CONSTRAINT `fk-marketing-data-user-bank` FOREIGN KEY (`bank_id`) REFERENCES `bank` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk-marketing-data-user-to-user-table` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `controller` varchar(50) NOT NULL,
  `action` varchar(50) NOT NULL DEFAULT 'index',
  `icon` varchar(50) NOT NULL,
  `order` int(11) NOT NULL DEFAULT 1,
  `parent_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `parent_id` (`parent_id`),
  CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `menu` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

INSERT INTO `menu` (`id`, `name`, `controller`, `action`, `icon`, `order`, `parent_id`) VALUES
(1,	'Home',	'site',	'index',	'fa fa-home',	1,	NULL),
(2,	'Master',	'',	'index',	'fa fa-database',	2,	NULL),
(3,	'Menu',	'menu',	'index',	'fa fa-circle-o',	10,	2),
(4,	'Role',	'role',	'index',	'fa fa-circle-o',	11,	2),
(5,	'User',	'user',	'index',	'fa fa-circle-o',	12,	2),
(6,	'Bank',	'bank',	'index',	'fa fa-bank',	7,	2),
(7,	'Kategori Pendanaan',	'kategori-pendanaan',	'index',	'fa fa-align-justify',	8,	2),
(8,	'Data Marketing ',	'marketing-data-user',	'index',	'fa fa-user-secret',	2,	NULL),
(9,	'Pembayaran',	'pembayaran',	'index',	'fa fa-money',	3,	NULL),
(10,	'Pendanaan',	'pendanaan',	'index',	'fa fa-bank',	4,	NULL),
(11,	'Master Status',	'status',	'index',	'fa fa-align-justify',	9,	2),
(12,	'Setting Website',	'setting',	'index',	'fa fa-align-justify',	5,	NULL);

DROP TABLE IF EXISTS `otp`;
CREATE TABLE `otp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `kode_otp` int(11) NOT NULL,
  `is_used` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `otp_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

INSERT INTO `otp` (`id`, `id_user`, `kode_otp`, `is_used`, `created_at`, `updated_at`) VALUES
(3,	10,	6891,	0,	'2021-07-18 19:29:47',	'2021-07-18 19:29:47'),
(4,	11,	3025,	1,	'2021-07-18 16:08:54',	'2021-07-18 16:08:54'),
(7,	14,	8904,	0,	'2021-07-18 19:03:08',	'2021-07-18 19:03:08'),
(10,	17,	9943,	0,	'2021-07-18 20:24:28',	'2021-07-18 20:24:01');

DROP TABLE IF EXISTS `pembayaran`;
CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `nominal` int(11) NOT NULL,
  `bukti_transaksi` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `marketing_id` int(11) DEFAULT NULL,
  `bank` varchar(255) NOT NULL,
  `pendanaan_id` int(11) NOT NULL,
  `tanggal_pembayaran` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `status_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk-pembayaran-user` (`user_id`),
  KEY `fk-pembayaran-bank` (`bank`),
  KEY `fk-pembayaran-pendanaan` (`pendanaan_id`),
  KEY `fk-pembayaran-status` (`status_id`),
  KEY `marketing_id` (`marketing_id`),
  CONSTRAINT `fk-pembayaran-status` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk-pembayaran-user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`marketing_id`) REFERENCES `user` (`id`),
  CONSTRAINT `pembayaran_ibfk_2` FOREIGN KEY (`pendanaan_id`) REFERENCES `pendanaan` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

INSERT INTO `pembayaran` (`id`, `nama`, `nominal`, `bukti_transaksi`, `user_id`, `marketing_id`, `bank`, `pendanaan_id`, `tanggal_pembayaran`, `created_at`, `updated_at`, `status_id`) VALUES
(2,	'WIldan',	10000,	'4-lbEYDOMV-TypUtm8PtDf7nILy6HCy3.png',	1,	5,	'BNI',	3,	'2021-07-20',	'2021-07-20 14:56:01',	'2021-07-20 14:56:01',	5),
(3,	'WIldan',	10000,	'4-lbEYDOMV-TypUtm8PtDf7nILy6HCy3.png',	1,	5,	'BNI',	3,	'2021-07-20',	'2021-07-20 15:19:17',	'2021-07-20 15:19:17',	6),
(4,	'WIldan',	10000,	'4-lbEYDOMV-TypUtm8PtDf7nILy6HCy3.png',	1,	5,	'BNI',	3,	'2021-07-20',	'2021-07-20 15:19:20',	'2021-07-20 15:19:20',	8);

DROP TABLE IF EXISTS `pencairan`;
CREATE TABLE `pencairan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pendanaan_id` int(11) NOT NULL,
  `nominal` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `pendanaan_id` (`pendanaan_id`),
  CONSTRAINT `pencairan_ibfk_1` FOREIGN KEY (`pendanaan_id`) REFERENCES `pendanaan` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO `pencairan` (`id`, `pendanaan_id`, `nominal`, `tanggal`, `created_at`) VALUES
(1,	3,	9000,	'2021-07-20',	'2021-07-20 16:22:52');

DROP TABLE IF EXISTS `pendanaan`;
CREATE TABLE `pendanaan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pendanaan` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `uraian` text DEFAULT NULL,
  `nominal` int(11) DEFAULT NULL,
  `pendanaan_berakhir` datetime DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `bank_id` int(11) DEFAULT NULL,
  `nomor_rekening` int(11) DEFAULT NULL,
  `nama_nasabah` varchar(255) DEFAULT NULL,
  `nama_perusahaan` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `kategori_pendanaan_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk-pendanaan-user` (`user_id`),
  KEY `fk-pendanaan-ketegori-pendanaan` (`kategori_pendanaan_id`),
  KEY `fk-status-pendanaan` (`status_id`),
  KEY `bank_id` (`bank_id`),
  CONSTRAINT `fk-pendanaan-ketegori-pendanaan` FOREIGN KEY (`kategori_pendanaan_id`) REFERENCES `kategori_pendanaan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk-pendanaan-user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk-status-pendanaan` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pendanaan_ibfk_1` FOREIGN KEY (`bank_id`) REFERENCES `bank` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

INSERT INTO `pendanaan` (`id`, `nama_pendanaan`, `foto`, `uraian`, `nominal`, `pendanaan_berakhir`, `user_id`, `bank_id`, `nomor_rekening`, `nama_nasabah`, `nama_perusahaan`, `deskripsi`, `kategori_pendanaan_id`, `status_id`) VALUES
(2,	'Pendanaan 1',	NULL,	'Tes Uraian',	80000,	'0000-00-00 00:00:00',	1,	NULL,	NULL,	NULL,	NULL,	NULL,	1,	7),
(3,	'Pendanaan 12',	NULL,	'Tes Uraian',	80000,	'0000-00-00 00:00:00',	1,	NULL,	NULL,	NULL,	NULL,	NULL,	1,	2),
(4,	'Pendanaan 1',	NULL,	'Tes Uraian',	80000,	'0000-00-00 00:00:00',	1,	NULL,	NULL,	NULL,	NULL,	NULL,	1,	4),
(5,	'Pendanaan 1',	NULL,	'Tes Uraian',	80000,	'0000-00-00 00:00:00',	1,	NULL,	NULL,	NULL,	NULL,	NULL,	1,	1),
(6,	'Pendanaan 1',	NULL,	'Tes Uraian',	80000,	'0000-00-00 00:00:00',	1,	NULL,	NULL,	NULL,	NULL,	NULL,	1,	1),
(7,	'Pendanaan 1',	'pendanaan/20210719_2dc0c690d3726aed41ab1c89d2ed65c9f01e4337.PNG',	'Tes Uraian',	80000,	'0000-00-00 00:00:00',	1,	NULL,	NULL,	NULL,	NULL,	NULL,	1,	1),
(8,	'Pendanaan 1',	'pendanaan/20210719_5b1537e128fb3f98238b1aa0ebc1214d63e7e5b7.PNG',	'Tes Uraian',	80000,	'0000-00-00 00:00:00',	1,	NULL,	NULL,	NULL,	NULL,	NULL,	1,	1),
(9,	'Pendanaan 1',	'pendanaan/20210719_23d202fb561c67ac5d22ae22f0e595ed35106b02.PNG',	'Tes Uraian',	80000,	'0000-00-00 00:00:00',	1,	NULL,	NULL,	NULL,	NULL,	NULL,	1,	1),
(10,	'Pendanaan 1',	'pendanaan/20210720_5be92fce55bc28add0e9b38755d67690f7199977.PNG',	'Tes Uraian',	80000,	'0000-00-00 00:00:00',	1,	NULL,	NULL,	NULL,	NULL,	NULL,	1,	1),
(11,	'Pendanaan 1',	'pendanaan/20210720_a14750179f4f06b4cbe8f1fd53d87ed980b18155.PNG',	'Tes Uraian',	80000,	'0000-00-00 00:00:00',	1,	NULL,	NULL,	NULL,	NULL,	NULL,	1,	1),
(12,	'Pendanaan 1',	'pendanaan/20210720_7c86ae7523e8e05e8722ad2e1011878662bce335.PNG',	'Tes Uraian',	80000,	'0000-00-00 00:00:00',	1,	1,	NULL,	'Budi',	'Perusahaan Nama',	'tidak ada',	1,	1),
(13,	'Pendanaan 1',	'',	'uraian 1',	100000,	'2021-07-20 02:50:32',	1,	NULL,	NULL,	NULL,	NULL,	NULL,	1,	1);

DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO `role` (`id`, `name`) VALUES
(1,	'Super Administrator'),
(2,	'Marketing'),
(3,	'Regular User'),
(4,	'Pengaju Wakaf'),
(5,	'Pewakaf');

DROP TABLE IF EXISTS `role_action`;
CREATE TABLE `role_action` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `action_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `role_id` (`role_id`),
  KEY `action_id` (`action_id`),
  CONSTRAINT `role_action_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`),
  CONSTRAINT `role_action_ibfk_2` FOREIGN KEY (`action_id`) REFERENCES `action` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=298 DEFAULT CHARSET=latin1;

INSERT INTO `role_action` (`id`, `role_id`, `action_id`) VALUES
(33,	2,	12),
(34,	2,	13),
(35,	2,	14),
(36,	2,	15),
(37,	2,	16),
(38,	2,	17),
(39,	2,	18),
(40,	2,	19),
(41,	2,	20),
(42,	2,	21),
(43,	2,	22),
(44,	2,	23),
(45,	2,	24),
(46,	2,	25),
(47,	2,	26),
(48,	2,	27),
(49,	2,	28),
(50,	2,	29),
(51,	2,	30),
(52,	2,	31),
(53,	2,	32),
(54,	2,	33),
(98,	3,	12),
(99,	3,	13),
(100,	3,	14),
(101,	3,	15),
(102,	3,	16),
(103,	3,	17),
(104,	3,	18),
(105,	3,	19),
(106,	3,	20),
(107,	3,	21),
(108,	3,	22),
(109,	3,	23),
(110,	3,	24),
(111,	3,	25),
(112,	3,	26),
(113,	3,	27),
(114,	3,	28),
(115,	3,	29),
(116,	3,	30),
(117,	3,	31),
(118,	3,	32),
(119,	3,	33),
(236,	1,	12),
(237,	1,	13),
(238,	1,	14),
(239,	1,	15),
(240,	1,	17),
(241,	1,	18),
(242,	1,	19),
(243,	1,	20),
(244,	1,	21),
(245,	1,	22),
(246,	1,	23),
(247,	1,	24),
(248,	1,	25),
(249,	1,	26),
(250,	1,	27),
(251,	1,	28),
(252,	1,	29),
(253,	1,	30),
(254,	1,	31),
(255,	1,	32),
(256,	1,	33),
(257,	1,	49),
(258,	1,	50),
(259,	1,	51),
(260,	1,	52),
(261,	1,	53),
(262,	1,	54),
(263,	1,	55),
(264,	1,	56),
(265,	1,	57),
(266,	1,	58),
(267,	1,	59),
(268,	1,	60),
(269,	1,	61),
(270,	1,	62),
(271,	1,	63),
(272,	1,	64),
(273,	1,	65),
(274,	1,	66),
(275,	1,	67),
(276,	1,	68),
(277,	1,	69),
(278,	1,	70),
(279,	1,	71),
(280,	1,	88),
(281,	1,	89),
(282,	1,	72),
(283,	1,	73),
(284,	1,	74),
(285,	1,	75),
(286,	1,	76),
(287,	1,	84),
(288,	1,	85),
(289,	1,	86),
(290,	1,	87),
(291,	1,	77),
(292,	1,	78),
(293,	1,	79),
(294,	1,	80),
(295,	1,	81),
(296,	1,	82),
(297,	1,	83);

DROP TABLE IF EXISTS `role_menu`;
CREATE TABLE `role_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `role_id` (`role_id`),
  KEY `menu_id` (`menu_id`),
  CONSTRAINT `role_menu_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`),
  CONSTRAINT `role_menu_ibfk_2` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=112 DEFAULT CHARSET=latin1;

INSERT INTO `role_menu` (`id`, `role_id`, `menu_id`) VALUES
(56,	2,	1),
(57,	2,	2),
(58,	2,	3),
(59,	2,	4),
(60,	2,	5),
(71,	3,	1),
(72,	3,	2),
(73,	3,	3),
(74,	3,	4),
(75,	3,	5),
(100,	1,	1),
(101,	1,	2),
(102,	1,	3),
(103,	1,	4),
(104,	1,	5),
(105,	1,	6),
(106,	1,	7),
(107,	1,	11),
(108,	1,	8),
(109,	1,	9),
(110,	1,	10),
(111,	1,	12);

DROP TABLE IF EXISTS `setting`;
CREATE TABLE `setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pin` int(11) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `bg_login` varchar(255) DEFAULT NULL,
  `bg_pin` varchar(255) DEFAULT NULL,
  `link_download_apk` varchar(255) DEFAULT NULL,
  `nama_web` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `slogan_web` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

INSERT INTO `setting` (`id`, `pin`, `logo`, `bg_login`, `bg_pin`, `link_download_apk`, `nama_web`, `alamat`, `slogan_web`) VALUES
(3,	1234,	'yQoJ9OmHlbYUjzgZcoJ5IjfdHEiBcm0u.png',	'ffRcyGCYL0suTs1S-ascCXf-YQ9e7inT.jpg',	'DTHT9iFuA9xm0-1_U_KsHSd84D_C6Ky1.jpg',	'playstore',	'ISALAM',	'Batu',	'-');

DROP TABLE IF EXISTS `status`;
CREATE TABLE `status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

INSERT INTO `status` (`id`, `name`) VALUES
(1,	'Pendanaan diajukan'),
(2,	'Pendanaan diterima'),
(3,	'Pendanaan dicairkan'),
(4,	'Pendanaan selesai'),
(5,	'Pembayaran diajukan'),
(6,	'Pembayaran diterima'),
(7,	'Pendanaan Ditolak'),
(8,	'Pembayaran Ditolak'),
(9,	'Draf Pendanaan');

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `role_id` int(11) NOT NULL,
  `confirm` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `photo_url` varchar(255) DEFAULT NULL,
  `secret_token` varchar(100) DEFAULT NULL,
  `nomor_handphone` varchar(20) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `last_logout` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `role_id` (`role_id`),
  CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

INSERT INTO `user` (`id`, `username`, `password`, `name`, `role_id`, `confirm`, `status`, `photo_url`, `secret_token`, `nomor_handphone`, `last_login`, `last_logout`) VALUES
(1,	'admin@admin.com',	'21232f297a57a5a743894a0e4a801fc3',	'Administrator',	1,	1,	1,	'default.png',	'ISALAMMTYyNjcrQlVib3F0UGdDSDVlRGlSQ2d0ank0eE_ERv6J_hHNmRCdUM2Q3NjSitlWHNMUjVVUnJmKzkzMDg5S3CRETKEY',	NULL,	'2021-07-19 19:18:41',	'2021-07-19 19:18:03'),
(2,	'user',	'ee11cbb19052e40b07aac0ca060c23ee',	'Regular User',	3,	1,	1,	'default.png',	NULL,	NULL,	NULL,	NULL),
(3,	'budi@gmail.com',	'21232f297a57a5a743894a0e4a801fc3',	'budi@gmail.com',	3,	0,	1,	'default.png',	NULL,	'0876786876',	NULL,	NULL),
(4,	'budi1@gmail.com',	'827ccb0eea8a706c4c34a16891f84e7b',	'Name budi',	3,	0,	1,	'default.png',	NULL,	'08767868761',	NULL,	NULL),
(5,	'budi12@gmail.com',	'827ccb0eea8a706c4c34a16891f84e7b',	'Name budi',	2,	0,	1,	'default.png',	NULL,	'087678687612',	NULL,	NULL),
(10,	'fachruwildan1@gmail.com',	'81dc9bdb52d04dc20036dbd8313ed055',	'fachru wildans',	5,	0,	1,	'default.png',	NULL,	'08965879812',	NULL,	NULL),
(11,	'fachruwildan@gmail.com',	'81dc9bdb52d04dc20036dbd8313ed055',	'fachru wildans',	3,	0,	1,	'default.png',	NULL,	'089658798125',	NULL,	NULL),
(14,	'fachruwildan12@gmail.com',	'81dc9bdb52d04dc20036dbd8313ed055',	'fachru wildans',	3,	0,	1,	'default.png',	NULL,	'0896587981254',	NULL,	NULL),
(17,	'hardiansah7101@gmail.com',	'f5bb0c8de146c67b44babbf4e6584cc0',	'Muh. Hardiansah',	3,	0,	1,	'default.png',	NULL,	'081911106262',	NULL,	NULL);

-- 2021-07-20 17:03:53
