-- Adminer 4.8.1 MySQL 5.5.5-10.4.17-MariaDB dump

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(89,	'pembayaran',	'pembayaran-tolak',	'Pembayaran Tolak'),
(90,	'agenda-pendanaan',	'index',	'Index'),
(91,	'agenda-pendanaan',	'view',	'View'),
(92,	'agenda-pendanaan',	'create',	'Create'),
(93,	'agenda-pendanaan',	'update',	'Update'),
(94,	'agenda-pendanaan',	'delete',	'Delete'),
(95,	'partner-pendanaan',	'index',	'Index'),
(96,	'partner-pendanaan',	'view',	'View'),
(97,	'partner-pendanaan',	'create',	'Create'),
(98,	'partner-pendanaan',	'update',	'Update'),
(99,	'partner-pendanaan',	'delete',	'Delete'),
(100,	'tema-hubungi-kami',	'index',	'Index'),
(101,	'tema-hubungi-kami',	'view',	'View'),
(102,	'tema-hubungi-kami',	'create',	'Create'),
(103,	'tema-hubungi-kami',	'update',	'Update'),
(104,	'tema-hubungi-kami',	'delete',	'Delete'),
(105,	'hubungi-kami',	'index',	'Index'),
(106,	'hubungi-kami',	'view',	'View'),
(107,	'hubungi-kami',	'create',	'Create'),
(108,	'hubungi-kami',	'update',	'Update'),
(109,	'hubungi-kami',	'delete',	'Delete');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `bank` (`id`, `name`, `logo`) VALUES
(1,	'BNI',	NULL),
(2,	'BRI',	NULL),
(3,	'BCA',	NULL),
(4,	'Mandiri',	NULL),
(5,	'Cimb Niaga',	NULL);

DROP TABLE IF EXISTS `hubungi_kami`;
CREATE TABLE `hubungi_kami` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `nomor_hp` varchar(255) NOT NULL,
  `tema_hubungi_kami_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tema_hubungi_kami_id` (`tema_hubungi_kami_id`),
  CONSTRAINT `hubungi_kami_ibfk_1` FOREIGN KEY (`tema_hubungi_kami_id`) REFERENCES `tema_hubungi_kami` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `hubungi_kami` (`id`, `nama`, `nomor_hp`, `tema_hubungi_kami_id`, `status`, `created_at`, `updated_at`) VALUES
(1,	'namaku',	'098789787',	1,	0,	'2021-07-22 03:08:02',	'2021-07-22 03:08:02'),
(2,	'namaku',	'098789787',	1,	0,	'2021-07-22 03:08:04',	'2021-07-22 03:08:04'),
(3,	'namaku',	'098789787',	1,	0,	'2021-07-22 03:08:04',	'2021-07-22 03:08:04'),
(4,	'namaku',	'098789787',	1,	0,	'2021-07-22 03:08:05',	'2021-07-22 03:08:05'),
(5,	'namaku',	'098789787',	1,	0,	'2021-07-22 03:08:05',	'2021-07-22 03:08:05'),
(6,	'namaku',	'098789787',	1,	0,	'2021-07-22 03:08:07',	'2021-07-22 03:08:07'),
(7,	'namaku',	'098789787',	1,	0,	'2021-07-22 03:08:07',	'2021-07-22 03:08:07'),
(8,	'namaku',	'098789787',	1,	0,	'2021-07-22 03:08:08',	'2021-07-22 03:08:08'),
(9,	'namaku',	'098789787',	1,	0,	'2021-07-22 03:08:09',	'2021-07-22 03:08:09'),
(10,	'namaku',	'098789787',	1,	0,	'2021-07-22 03:08:09',	'2021-07-22 03:08:09'),
(11,	'namaku',	'098789787',	1,	0,	'2021-07-22 03:08:09',	'2021-07-22 03:08:09'),
(12,	'namaku',	'098789787',	1,	0,	'2021-07-22 03:08:09',	'2021-07-22 03:08:09'),
(13,	'namaku',	'098789787',	1,	0,	'2021-07-22 03:08:09',	'2021-07-22 03:08:09'),
(14,	'namaku',	'098789787',	1,	0,	'2021-07-22 03:08:09',	'2021-07-22 03:08:09'),
(15,	'namaku',	'098789787',	1,	0,	'2021-07-22 03:08:10',	'2021-07-22 03:08:10'),
(16,	'namaku',	'098789787',	1,	0,	'2021-07-22 03:10:02',	'2021-07-22 03:10:02'),
(17,	'namaku',	'098789787',	1,	0,	'2021-07-22 03:10:04',	'2021-07-22 03:10:04'),
(18,	'namaku',	'098789787',	1,	0,	'2021-07-22 03:10:12',	'2021-07-22 03:10:12'),
(19,	'namaku',	'098789787',	1,	0,	'2021-07-22 03:10:13',	'2021-07-22 03:10:13'),
(20,	'namaku',	'098789787',	1,	0,	'2021-07-22 03:10:14',	'2021-07-22 03:10:14'),
(21,	'namaku',	'098789787',	1,	0,	'2021-07-22 03:10:29',	'2021-07-22 03:10:29'),
(22,	'namaku',	'098789787',	1,	0,	'2021-07-22 03:10:30',	'2021-07-22 03:10:30'),
(23,	'namaku',	'098789787',	1,	0,	'2021-07-22 03:10:31',	'2021-07-22 03:10:31'),
(24,	'namaku',	'098789787',	1,	0,	'2021-07-22 03:10:32',	'2021-07-22 03:10:32'),
(25,	'namaku',	'098789787',	1,	0,	'2021-07-22 03:10:33',	'2021-07-22 03:10:33'),
(26,	'namaku',	'098789787',	1,	0,	'2021-07-22 03:10:33',	'2021-07-22 03:10:33'),
(27,	'namaku',	'0897736667',	1,	0,	'2021-07-22 03:11:14',	'2021-07-22 03:11:14'),
(28,	'namaku',	'0897736667',	1,	0,	'2021-07-22 03:11:14',	'2021-07-22 03:11:14'),
(29,	'namaku',	'0897736667',	1,	0,	'2021-07-22 03:11:15',	'2021-07-22 03:11:15'),
(30,	'namaku',	'0897736667',	1,	0,	'2021-07-22 03:11:15',	'2021-07-22 03:11:15'),
(31,	'namaku',	'0897736667',	1,	0,	'2021-07-22 03:11:41',	'2021-07-22 03:11:41'),
(32,	'namaku',	'0897736667',	1,	0,	'2021-07-22 03:12:32',	'2021-07-22 03:12:32'),
(33,	'namaku',	'0897736667',	1,	0,	'2021-07-22 03:12:33',	'2021-07-22 03:12:33'),
(34,	'namaku',	'0897736667',	1,	0,	'2021-07-22 03:12:33',	'2021-07-22 03:12:33'),
(35,	'namaku',	'0897736667',	1,	0,	'2021-07-22 03:12:34',	'2021-07-22 03:12:34'),
(36,	'namaku',	'0897736667',	1,	0,	'2021-07-22 03:12:34',	'2021-07-22 03:12:34'),
(37,	'namaku',	'0897736667',	1,	0,	'2021-07-22 03:12:34',	'2021-07-22 03:12:34'),
(38,	'namaku',	'0897736667',	1,	0,	'2021-07-22 03:12:35',	'2021-07-22 03:12:35'),
(39,	'namaku',	'0897736667',	1,	0,	'2021-07-22 03:12:36',	'2021-07-22 03:12:36'),
(40,	'namaku',	'0897736667',	1,	0,	'2021-07-22 03:12:36',	'2021-07-22 03:12:36'),
(41,	'namaku',	'0897736667',	1,	0,	'2021-07-22 03:12:36',	'2021-07-22 03:12:36'),
(42,	'namaku',	'0897736667',	1,	0,	'2021-07-22 03:12:37',	'2021-07-22 03:12:37'),
(43,	'namaku',	'0897736667',	1,	0,	'2021-07-22 03:12:37',	'2021-07-22 03:12:37'),
(44,	'namaku',	'0897736667',	1,	0,	'2021-07-22 03:12:38',	'2021-07-22 03:12:38'),
(45,	'namaku',	'0897736667',	1,	0,	'2021-07-22 03:12:38',	'2021-07-22 03:12:38'),
(46,	'namaku',	'0897736667',	1,	0,	'2021-07-22 03:12:39',	'2021-07-22 03:12:39'),
(47,	'namaku',	'0897736667',	1,	0,	'2021-07-22 03:12:39',	'2021-07-22 03:12:39'),
(48,	'namaku',	'0897736667',	1,	0,	'2021-07-22 03:12:39',	'2021-07-22 03:12:39'),
(49,	'namaku',	'0897736667',	1,	0,	'2021-07-22 03:12:39',	'2021-07-22 03:12:39'),
(50,	'namaku',	'0897736667',	1,	0,	'2021-07-22 03:12:39',	'2021-07-22 03:12:39'),
(51,	'namaku',	'0897736667',	1,	0,	'2021-07-22 03:12:40',	'2021-07-22 03:12:40'),
(52,	'namaku',	'0897736667',	1,	0,	'2021-07-22 03:12:40',	'2021-07-22 03:12:40'),
(53,	'namaku',	'0897736667',	1,	0,	'2021-07-22 03:12:40',	'2021-07-22 03:12:40'),
(54,	'namaku',	'0897736667',	1,	0,	'2021-07-22 03:12:40',	'2021-07-22 03:12:40'),
(55,	'namaku',	'0897736667',	1,	0,	'2021-07-22 03:12:41',	'2021-07-22 03:12:41'),
(56,	'namaku',	'0897736667',	1,	0,	'2021-07-22 03:12:41',	'2021-07-22 03:12:41'),
(57,	'namaku',	'0897736667',	1,	0,	'2021-07-22 03:12:41',	'2021-07-22 03:12:41'),
(58,	'namaku',	'0897736667',	1,	0,	'2021-07-22 03:12:41',	'2021-07-22 03:12:41'),
(59,	'namaku',	'0897736667',	1,	0,	'2021-07-22 03:12:41',	'2021-07-22 03:12:41'),
(60,	'namaku',	'0897736667',	1,	0,	'2021-07-22 03:12:42',	'2021-07-22 03:12:42');

DROP TABLE IF EXISTS `kategori_pendanaan`;
CREATE TABLE `kategori_pendanaan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `marketing_data_user` (`id`, `nama`, `alamat`, `domisili`, `no_rekening`, `no_identitas`, `referensi_kerja`, `bank_id`, `user_id`) VALUES
(3,	'Ian',	'Ponorogo',	'Batu',	123321123,	'123123123',	'Ngoding',	1,	17);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `menu` (`id`, `name`, `controller`, `action`, `icon`, `order`, `parent_id`) VALUES
(1,	'Home',	'site',	'index',	'fa fa-home',	1,	NULL),
(2,	'Master',	'',	'index',	'fa fa-database',	2,	NULL),
(3,	'Menu',	'menu',	'index',	'fa fa-circle-o',	7,	2),
(4,	'Role',	'role',	'index',	'fa fa-circle-o',	8,	2),
(5,	'User',	'user',	'index',	'fa fa-circle-o',	9,	2),
(6,	'Bank',	'bank',	'index',	'fa fa-bank',	4,	2),
(7,	'Kategori Pendanaan',	'kategori-pendanaan',	'index',	'fa fa-align-justify',	5,	2),
(8,	'Data Marketing ',	'marketing-data-user',	'index',	'fa fa-user-secret',	10,	NULL),
(9,	'Pembayaran',	'pembayaran',	'index',	'fa fa-money',	11,	NULL),
(10,	'Pendanaan',	'pendanaan',	'index',	'fa fa-bank',	12,	NULL),
(11,	'Master Status',	'status',	'index',	'fa fa-align-justify',	6,	2),
(12,	'Setting Website',	'setting',	'index',	'fa fa-align-justify',	13,	NULL),
(13,	'Agenda Pendanaan',	'agenda-pendanaan',	'index',	'fa fa-align-justify',	2,	NULL),
(14,	'Partner Pendanaan',	'partner-pendanaan',	'index',	'fa fa-users',	1,	NULL),
(15,	'Tema Hubungi Kami',	'tema-hubungi-kami',	'index',	'fa fa-list',	1,	2),
(16,	'Hubungi Kami',	'hubungi-kami',	'index',	'fa fa-phone',	1,	NULL);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `otp` (`id`, `id_user`, `kode_otp`, `is_used`, `created_at`, `updated_at`) VALUES
(3,	10,	6891,	0,	'2021-07-18 19:29:47',	'2021-07-18 19:29:47'),
(4,	11,	3025,	1,	'2021-07-18 16:08:54',	'2021-07-18 16:08:54'),
(7,	14,	8904,	0,	'2021-07-18 19:03:08',	'2021-07-18 19:03:08'),
(10,	17,	3045,	1,	'2021-07-21 07:26:33',	'2021-07-21 07:26:33');

DROP TABLE IF EXISTS `partner_pendanaan`;
CREATE TABLE `partner_pendanaan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_partner` varchar(255) NOT NULL,
  `pendanaan_id` int(11) NOT NULL,
  `foto_ktp_partner` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pendanaan_id` (`pendanaan_id`),
  CONSTRAINT `partner_pendanaan_ibfk_2` FOREIGN KEY (`pendanaan_id`) REFERENCES `pendanaan` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `pencairan` (`id`, `pendanaan_id`, `nominal`, `tanggal`, `created_at`) VALUES
(1,	3,	9000,	'2021-07-20',	'2021-07-20 16:22:52'),
(2,	4,	79000,	'2021-07-21',	'2021-07-21 03:55:41'),
(3,	4,	79000,	'2021-07-21',	'2021-07-21 03:58:05'),
(4,	4,	79000,	'2021-07-21',	'2021-07-21 03:58:50');

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
  `foto_ktp` varchar(255) DEFAULT NULL,
  `foto_kk` varchar(255) DEFAULT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `pendanaan` (`id`, `nama_pendanaan`, `foto`, `uraian`, `nominal`, `pendanaan_berakhir`, `user_id`, `bank_id`, `nomor_rekening`, `nama_nasabah`, `nama_perusahaan`, `deskripsi`, `foto_ktp`, `foto_kk`, `kategori_pendanaan_id`, `status_id`) VALUES
(2,	'Pendanaan 1',	NULL,	'Tes Uraian',	80000,	'0000-00-00 00:00:00',	1,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	1,	7),
(3,	'Pendanaan 12',	NULL,	'Tes Uraian',	80000,	'0000-00-00 00:00:00',	1,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	1,	2),
(4,	'Pendanaan 1',	NULL,	'Tes Uraian',	80000,	'0000-00-00 00:00:00',	1,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	1,	3),
(5,	'Pendanaan 1',	NULL,	'Tes Uraian',	80000,	'0000-00-00 00:00:00',	1,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	1,	1),
(6,	'Pendanaan 1',	NULL,	'Tes Uraian',	80000,	'0000-00-00 00:00:00',	1,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	1,	1),
(7,	'Pendanaan 1',	'pendanaan/20210719_2dc0c690d3726aed41ab1c89d2ed65c9f01e4337.PNG',	'Tes Uraian',	80000,	'0000-00-00 00:00:00',	1,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	1,	1),
(8,	'Pendanaan 1',	'pendanaan/20210719_5b1537e128fb3f98238b1aa0ebc1214d63e7e5b7.PNG',	'Tes Uraian',	80000,	'0000-00-00 00:00:00',	1,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	1,	1),
(9,	'Pendanaan 1',	'pendanaan/20210719_23d202fb561c67ac5d22ae22f0e595ed35106b02.PNG',	'Tes Uraian',	80000,	'0000-00-00 00:00:00',	1,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	1,	1),
(10,	'Pendanaan 1',	'pendanaan/20210720_5be92fce55bc28add0e9b38755d67690f7199977.PNG',	'Tes Uraian',	80000,	'0000-00-00 00:00:00',	1,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	1,	1),
(11,	'Pendanaan 1',	'pendanaan/20210720_a14750179f4f06b4cbe8f1fd53d87ed980b18155.PNG',	'Tes Uraian',	80000,	'0000-00-00 00:00:00',	1,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	1,	1),
(12,	'Pendanaan 1',	'pendanaan/20210720_7c86ae7523e8e05e8722ad2e1011878662bce335.PNG',	'Tes Uraian',	80000,	'0000-00-00 00:00:00',	1,	1,	NULL,	'Budi',	'Perusahaan Nama',	'tidak ada',	NULL,	NULL,	1,	1),
(13,	'Pendanaan 1',	'',	'uraian 1',	100000,	'2021-07-20 02:50:32',	1,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	1,	1),
(16,	'gogogo',	'pendanaan/20210721_c65e5f685ddd3613ba2346a443527dd7aa82857f.jpg',	'',	100000,	'2021-07-31 00:00:00',	17,	1,	123123,	'Namasadsad',	'hohoho',	'popopo',	NULL,	NULL,	2,	9);

DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(514,	1,	12),
(515,	1,	13),
(516,	1,	14),
(517,	1,	15),
(518,	1,	17),
(519,	1,	18),
(520,	1,	19),
(521,	1,	20),
(522,	1,	21),
(523,	1,	22),
(524,	1,	23),
(525,	1,	24),
(526,	1,	25),
(527,	1,	26),
(528,	1,	27),
(529,	1,	28),
(530,	1,	29),
(531,	1,	30),
(532,	1,	31),
(533,	1,	32),
(534,	1,	33),
(535,	1,	49),
(536,	1,	50),
(537,	1,	51),
(538,	1,	52),
(539,	1,	53),
(540,	1,	54),
(541,	1,	55),
(542,	1,	56),
(543,	1,	57),
(544,	1,	58),
(545,	1,	59),
(546,	1,	60),
(547,	1,	61),
(548,	1,	62),
(549,	1,	63),
(550,	1,	100),
(551,	1,	101),
(552,	1,	102),
(553,	1,	103),
(554,	1,	104),
(555,	1,	64),
(556,	1,	65),
(557,	1,	66),
(558,	1,	67),
(559,	1,	68),
(560,	1,	69),
(561,	1,	70),
(562,	1,	71),
(563,	1,	88),
(564,	1,	89),
(565,	1,	72),
(566,	1,	73),
(567,	1,	74),
(568,	1,	75),
(569,	1,	76),
(570,	1,	84),
(571,	1,	85),
(572,	1,	86),
(573,	1,	87),
(574,	1,	77),
(575,	1,	78),
(576,	1,	79),
(577,	1,	80),
(578,	1,	81),
(579,	1,	82),
(580,	1,	83),
(581,	1,	90),
(582,	1,	91),
(583,	1,	92),
(584,	1,	93),
(585,	1,	94),
(586,	1,	95),
(587,	1,	96),
(588,	1,	97),
(589,	1,	98),
(590,	1,	99),
(591,	1,	105),
(592,	1,	106),
(593,	1,	107),
(594,	1,	108),
(595,	1,	109);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(154,	1,	1),
(155,	1,	2),
(156,	1,	3),
(157,	1,	4),
(158,	1,	5),
(159,	1,	6),
(160,	1,	7),
(161,	1,	11),
(162,	1,	15),
(163,	1,	8),
(164,	1,	9),
(165,	1,	10),
(166,	1,	12),
(167,	1,	13),
(168,	1,	14),
(169,	1,	16);

DROP TABLE IF EXISTS `setting`;
CREATE TABLE `setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pin` int(11) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `bg_login` varchar(255) DEFAULT NULL,
  `bg_pin` varchar(255) DEFAULT NULL,
  `link_download_apk` varchar(255) DEFAULT NULL,
  `link_download_apk_marketing` varchar(255) DEFAULT NULL,
  `nama_web` varchar(255) NOT NULL,
  `judul_web` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `slogan_web` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `setting` (`id`, `pin`, `logo`, `bg_login`, `bg_pin`, `link_download_apk`, `link_download_apk_marketing`, `nama_web`, `judul_web`, `alamat`, `slogan_web`) VALUES
(3,	1234,	'',	'JGwAevVzsYtUjGey1-aLfpyfoe6T9bcz.jpg',	'ztK99CgCh2lj71-NST3Tj5r30D20YpsA.jpg',	'playstore',	'marketing',	'ISALAM',	'Wakaf Mudah Pahala Berlimpah',	'Batu',	'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi fuga temporibus non cumque architecto magni cum dolorum id aperiam? Quidem.');

DROP TABLE IF EXISTS `status`;
CREATE TABLE `status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

DROP TABLE IF EXISTS `tema_hubungi_kami`;
CREATE TABLE `tema_hubungi_kami` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_tema` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tema_hubungi_kami` (`id`, `nama_tema`) VALUES
(1,	'Saya Tertarik Menjadi Investor'),
(2,	'Apa itu ISALAM?');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `user` (`id`, `username`, `password`, `name`, `role_id`, `confirm`, `status`, `photo_url`, `secret_token`, `nomor_handphone`, `last_login`, `last_logout`) VALUES
(1,	'admin@admin.com',	'21232f297a57a5a743894a0e4a801fc3',	'Administrator',	1,	1,	1,	'default.png',	'ISALAMMTYyNjcrQlVib3F0UGdDSDVlRGlSQ2d0ank0eE_ERv6J_hHNmRCdUM2Q3NjSitlWHNMUjVVUnJmKzkzMDg5S3CRETKEY',	NULL,	'2021-07-19 19:18:41',	'2021-07-19 19:18:03'),
(2,	'user',	'ee11cbb19052e40b07aac0ca060c23ee',	'Regular User',	3,	1,	1,	'default.png',	NULL,	NULL,	NULL,	NULL),
(3,	'budi@gmail.com',	'21232f297a57a5a743894a0e4a801fc3',	'budi@gmail.com',	3,	0,	1,	'default.png',	NULL,	'0876786876',	NULL,	NULL),
(4,	'budi1@gmail.com',	'827ccb0eea8a706c4c34a16891f84e7b',	'Name budi',	3,	0,	1,	'default.png',	NULL,	'08767868761',	NULL,	NULL),
(5,	'budi12@gmail.com',	'827ccb0eea8a706c4c34a16891f84e7b',	'Name budi',	2,	0,	1,	'default.png',	NULL,	'087678687612',	NULL,	NULL),
(10,	'fachruwildan1@gmail.com',	'81dc9bdb52d04dc20036dbd8313ed055',	'fachru wildans',	5,	0,	1,	'default.png',	NULL,	'08965879812',	NULL,	NULL),
(11,	'fachruwildan@gmail.com',	'81dc9bdb52d04dc20036dbd8313ed055',	'fachru wildans',	3,	0,	1,	'default.png',	NULL,	'089658798125',	NULL,	NULL),
(14,	'fachruwildan12@gmail.com',	'81dc9bdb52d04dc20036dbd8313ed055',	'fachru wildans',	3,	0,	1,	'default.png',	NULL,	'0896587981254',	NULL,	NULL),
(17,	'hardiansah7101@gmail.com',	'f5bb0c8de146c67b44babbf4e6584cc0',	'Muh. Hardiansah',	3,	1,	1,	'default.png',	'ISALAMMTYyNjgrQkFxYkQ0UHFielp2RnlGYnIyMlRuNG_uBgXC_9XajFsdjBQbWdpcXhvWGJvZC1pcWkrNzAyNzQ=S3CRETKEY',	'081911106262',	NULL,	NULL);

-- 2021-07-22 03:14:54
