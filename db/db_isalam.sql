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
(109,	'hubungi-kami',	'delete',	'Delete'),
(110,	'hubungi-kami',	'sudah-dihubungi',	'Sudah Dihubungi'),
(111,	'jenis-pembayaran',	'index',	'Index'),
(112,	'jenis-pembayaran',	'view',	'View'),
(113,	'jenis-pembayaran',	'create',	'Create'),
(114,	'jenis-pembayaran',	'update',	'Update'),
(115,	'jenis-pembayaran',	'delete',	'Delete');

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
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tema_hubungi_kami_id` (`tema_hubungi_kami_id`),
  CONSTRAINT `hubungi_kami_ibfk_1` FOREIGN KEY (`tema_hubungi_kami_id`) REFERENCES `tema_hubungi_kami` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `hubungi_kami` (`id`, `nama`, `nomor_hp`, `tema_hubungi_kami_id`, `status`, `created_at`, `updated_at`) VALUES
(97,	'kasjkasj',	'9839480',	1,	1,	'2021-07-22 06:13:15',	'2021-07-22 06:32:24'),
(98,	'kasjkasj',	'9839480',	1,	0,	'2021-07-22 06:56:28',	'2021-07-22 06:56:28'),
(99,	'sakl',	'skdl',	1,	1,	'2021-07-22 06:57:04',	'2021-07-22 09:23:58'),
(100,	'aska',	'08923893',	1,	0,	'2021-07-22 06:59:53',	'2021-07-22 06:59:53'),
(101,	'namaku',	'0897736667',	1,	0,	'2021-07-22 07:01:05',	'2021-07-22 07:01:05'),
(102,	'namaku',	'0897736667',	1,	0,	'2021-07-22 07:01:46',	'2021-07-22 07:01:46'),
(103,	'namaku',	'0897736667',	1,	0,	'2021-07-22 07:02:15',	'2021-07-22 07:02:15'),
(104,	'kajksa',	'093829032',	1,	0,	'2021-07-22 07:03:52',	'2021-07-22 07:03:52'),
(105,	'askak',	'90982398',	1,	0,	'2021-07-22 07:04:44',	'2021-07-22 07:04:44'),
(106,	'namaku',	'0897736667',	1,	0,	'2021-07-22 08:24:10',	'2021-07-22 08:24:10'),
(107,	'namaku',	'0897736667',	1,	0,	'2021-07-22 08:25:46',	'2021-07-22 08:25:46'),
(108,	'namaku',	'0897736667',	1,	0,	'2021-07-22 08:25:47',	'2021-07-22 08:25:47'),
(109,	'aaaa',	'0023890',	1,	0,	'2021-07-22 08:28:11',	'2021-07-22 08:28:11'),
(110,	'kasksajk',	'093293',	1,	0,	'2021-07-22 08:32:14',	'2021-07-22 08:32:14'),
(111,	'kasksajk',	'093293',	1,	0,	'2021-07-22 08:38:43',	'2021-07-22 08:38:43'),
(112,	'am,msa,',	'08393',	2,	0,	'2021-07-22 08:39:46',	'2021-07-22 08:39:46'),
(113,	'am,msa,',	'08393',	2,	0,	'2021-07-22 08:40:00',	'2021-07-22 08:40:00'),
(114,	'tesss',	'94384390',	1,	0,	'2021-07-22 08:40:33',	'2021-07-22 08:40:33'),
(115,	'tesss',	'94384390',	1,	0,	'2021-07-22 08:42:10',	'2021-07-22 08:42:10'),
(116,	'tesss',	'94384390',	1,	0,	'2021-07-22 08:42:12',	'2021-07-22 08:42:12'),
(117,	'tesss',	'94384390',	1,	0,	'2021-07-22 08:42:48',	'2021-07-22 08:42:48'),
(118,	'asam,s',	'0789789',	1,	0,	'2021-07-22 08:43:15',	'2021-07-22 08:43:15'),
(119,	'namaku',	'0897736667',	1,	1,	'2021-07-22 08:48:01',	'2021-07-22 09:23:49'),
(120,	'namakukkk',	'0897736667',	1,	0,	'2021-07-22 08:53:34',	'2021-07-22 08:53:34'),
(121,	'namakukkk',	'0897736667',	1,	0,	'2021-07-22 08:53:35',	'2021-07-22 08:53:35'),
(122,	'namakukkk',	'0897736667',	1,	0,	'2021-07-22 08:53:35',	'2021-07-22 08:53:35'),
(123,	'namaku',	'0092832930',	1,	0,	'2021-07-22 08:58:39',	'2021-07-22 08:58:39'),
(124,	'ajdklajsk',	'0329849389',	1,	0,	'2021-07-22 09:04:00',	'2021-07-22 09:04:00'),
(125,	'asdjal',	'03290492',	2,	0,	'2021-07-22 09:04:36',	'2021-07-22 09:04:36'),
(126,	'asdjal',	'03290492',	2,	0,	'2021-07-22 09:08:05',	'2021-07-22 09:08:05'),
(127,	'asdjal',	'03290492',	2,	0,	'2021-07-22 09:08:18',	'2021-07-22 09:08:18'),
(128,	'aaaa',	'0798278',	1,	0,	'2021-07-22 09:08:27',	'2021-07-22 09:08:27'),
(129,	'jasld',	'09382492',	1,	0,	'2021-07-22 09:18:29',	'2021-07-22 09:18:29'),
(130,	'jasld',	'09382492',	1,	0,	'2021-07-22 09:19:07',	'2021-07-22 09:19:07');

DROP TABLE IF EXISTS `jenis_pembayaran`;
CREATE TABLE `jenis_pembayaran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jenis` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `jenis_pembayaran` (`id`, `nama_jenis`) VALUES
(1,	'Bank'),
(2,	'OVO'),
(3,	'GOPAY'),
(4,	'Alfamart'),
(5,	'Indomaret');

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
(3,	'Ian',	'Ponorogo',	'Batu',	123321123,	'123123123',	'Ngoding',	1,	5);

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
(16,	'Hubungi Kami',	'hubungi-kami',	'index',	'fa fa-phone',	1,	NULL),
(17,	'Jenis Pembayaran',	'jenis-pembayaran',	'index',	'fa fa-money',	1,	2);

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
  `kode_transaksi` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nominal` int(11) NOT NULL,
  `jenis_pembayaran_id` int(11) DEFAULT NULL,
  `bukti_transaksi` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `pendanaan_id` int(11) NOT NULL,
  `tanggal_upload_bukti` timestamp NULL DEFAULT NULL,
  `tanggal_konfirmasi` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `status_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk-pembayaran-user` (`user_id`),
  KEY `fk-pembayaran-pendanaan` (`pendanaan_id`),
  KEY `fk-pembayaran-status` (`status_id`),
  KEY `jenis_pembayaran_id` (`jenis_pembayaran_id`),
  CONSTRAINT `fk-pembayaran-status` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk-pembayaran-user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pembayaran_ibfk_2` FOREIGN KEY (`pendanaan_id`) REFERENCES `pendanaan` (`id`),
  CONSTRAINT `pembayaran_ibfk_3` FOREIGN KEY (`jenis_pembayaran_id`) REFERENCES `jenis_pembayaran` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `pembayaran` (`id`, `kode_transaksi`, `nama`, `nominal`, `jenis_pembayaran_id`, `bukti_transaksi`, `user_id`, `pendanaan_id`, `tanggal_upload_bukti`, `tanggal_konfirmasi`, `created_at`, `updated_at`, `status_id`) VALUES
(2,	'',	'WIldan',	10000,	NULL,	'4-lbEYDOMV-TypUtm8PtDf7nILy6HCy3.png',	1,	3,	'2021-07-19 17:00:00',	NULL,	'2021-07-20 14:56:01',	'2021-07-20 14:56:01',	5),
(3,	'',	'WIldan',	10000,	NULL,	'4-lbEYDOMV-TypUtm8PtDf7nILy6HCy3.png',	1,	3,	'2021-07-19 17:00:00',	NULL,	'2021-07-20 15:19:17',	'2021-07-20 15:19:17',	6),
(4,	'',	'WIldan',	10000,	NULL,	'4-lbEYDOMV-TypUtm8PtDf7nILy6HCy3.png',	1,	3,	'2021-07-19 17:00:00',	NULL,	'2021-07-20 15:19:20',	'2021-07-20 15:19:20',	8),
(5,	'',	'tes',	100000,	NULL,	NULL,	1,	3,	'2021-07-21 17:00:00',	NULL,	'2021-07-22 05:28:57',	'2021-07-22 05:28:57',	5),
(6,	'',	'tes',	100000,	NULL,	NULL,	1,	3,	'2021-07-21 17:00:00',	NULL,	'2021-07-22 05:30:45',	'2021-07-22 05:30:45',	5),
(7,	'',	'tes',	100000,	NULL,	NULL,	1,	3,	'2021-07-21 17:00:00',	NULL,	'2021-07-22 05:31:33',	'2021-07-22 05:31:33',	5),
(8,	'',	'tes',	100000,	NULL,	'GGqvSukRgqEFYxN_oX_nVUNWf05iYrQR.png',	1,	3,	'2021-07-21 17:00:00',	NULL,	'2021-07-22 05:35:59',	'2021-07-22 05:35:59',	5),
(9,	'Hn1gK7f2j-23072021150137',	'tes',	100000,	3,	'Gey7gVgwT1EpDKqSeKCPmXl6UYRDe5OQ.png',	1,	3,	'2021-07-23 08:07:04',	'2021-07-23 08:09:14',	'2021-07-23 08:34:47',	'2021-07-23 08:34:47',	10);

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
(16,	'gogogo',	'pendanaan/20210721_c65e5f685ddd3613ba2346a443527dd7aa82857f.jpg',	'',	100000,	'2021-07-31 00:00:00',	17,	1,	123123,	'Namasadsad',	'hohoho',	'popopo',	NULL,	NULL,	2,	9),
(17,	'tes',	NULL,	'pendanaan',	100000,	'2021-09-20 00:00:00',	5,	1,	123444,	'',	'Tokped',	'deskripsi',	NULL,	NULL,	1,	9),
(18,	'tes',	NULL,	'pendanaan',	100000,	'2021-09-20 19:20:02',	5,	1,	123444888,	'',	'Tokped',	'deskripsi',	NULL,	NULL,	1,	9);

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
(679,	1,	12),
(680,	1,	13),
(681,	1,	14),
(682,	1,	15),
(683,	1,	17),
(684,	1,	18),
(685,	1,	19),
(686,	1,	20),
(687,	1,	21),
(688,	1,	22),
(689,	1,	23),
(690,	1,	24),
(691,	1,	25),
(692,	1,	26),
(693,	1,	27),
(694,	1,	28),
(695,	1,	29),
(696,	1,	30),
(697,	1,	31),
(698,	1,	32),
(699,	1,	33),
(700,	1,	49),
(701,	1,	50),
(702,	1,	51),
(703,	1,	52),
(704,	1,	53),
(705,	1,	54),
(706,	1,	55),
(707,	1,	56),
(708,	1,	57),
(709,	1,	58),
(710,	1,	59),
(711,	1,	60),
(712,	1,	61),
(713,	1,	62),
(714,	1,	63),
(715,	1,	100),
(716,	1,	101),
(717,	1,	102),
(718,	1,	103),
(719,	1,	104),
(720,	1,	111),
(721,	1,	112),
(722,	1,	113),
(723,	1,	114),
(724,	1,	115),
(725,	1,	64),
(726,	1,	65),
(727,	1,	66),
(728,	1,	67),
(729,	1,	68),
(730,	1,	69),
(731,	1,	70),
(732,	1,	71),
(733,	1,	88),
(734,	1,	89),
(735,	1,	72),
(736,	1,	73),
(737,	1,	74),
(738,	1,	75),
(739,	1,	76),
(740,	1,	84),
(741,	1,	85),
(742,	1,	86),
(743,	1,	87),
(744,	1,	77),
(745,	1,	78),
(746,	1,	79),
(747,	1,	80),
(748,	1,	81),
(749,	1,	82),
(750,	1,	83),
(751,	1,	90),
(752,	1,	91),
(753,	1,	92),
(754,	1,	93),
(755,	1,	94),
(756,	1,	95),
(757,	1,	96),
(758,	1,	97),
(759,	1,	98),
(760,	1,	99),
(761,	1,	105),
(762,	1,	106),
(763,	1,	107),
(764,	1,	108),
(765,	1,	109),
(766,	1,	110);

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
(186,	1,	1),
(187,	1,	2),
(188,	1,	3),
(189,	1,	4),
(190,	1,	5),
(191,	1,	6),
(192,	1,	7),
(193,	1,	11),
(194,	1,	15),
(195,	1,	17),
(196,	1,	8),
(197,	1,	9),
(198,	1,	10),
(199,	1,	12),
(200,	1,	13),
(201,	1,	14),
(202,	1,	16);

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
(9,	'Draf Pendanaan'),
(10,	'Pembayaran Menunggu Konfirmasi');

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
  `password` varchar(255) NOT NULL,
  `pin` varchar(8) NOT NULL,
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

INSERT INTO `user` (`id`, `username`, `password`, `pin`, `name`, `role_id`, `confirm`, `status`, `photo_url`, `secret_token`, `nomor_handphone`, `last_login`, `last_logout`) VALUES
(1,	'admin@admin.com',	'$2y$13$6.FbXl1pNiXyV0lzaQM.NelR2x5wW.N8Oc.L6fWOYZAk5OInfTs46',	'1234',	'Administrator',	1,	1,	1,	'default.png',	'ISALAMMTYyNzArWHlxSVhBLUhZLU1ma25UVDJiST_N-xu7_hZMWlkY2ltbTh2SUdBd2tNd3crNDQ1Mzk=S3CRETKEY',	'',	'2021-07-19 19:18:41',	'2021-07-19 19:18:03'),
(2,	'user',	'ee11cbb19052e40b07aac0ca060c23ee',	'0',	'Regular User',	3,	1,	1,	'default.png',	NULL,	NULL,	NULL,	NULL),
(3,	'budi@gmail.com',	'21232f297a57a5a743894a0e4a801fc3',	'0',	'budi@gmail.com',	3,	0,	1,	'default.png',	NULL,	'0876786876',	NULL,	NULL),
(4,	'budi1@gmail.com',	'827ccb0eea8a706c4c34a16891f84e7b',	'0',	'Name budi3',	3,	0,	1,	'default.png',	NULL,	'08767868761',	NULL,	NULL),
(5,	'budiancok@email.com',	'$2y$13$aiYgce.oVWQKYYhGY/D3ke0to0TKmSfp4Iif1gesu95nUd.rukRW2',	'0',	'Name budi',	2,	0,	1,	'default.png',	'ISALAMMTYyNjkrLU0rYWc2MnF0Nmd4bUJ6UmtWcE_hI9Wq_03VStqSmpXNVZFN3E5S2l6cys3NTQ2Nw==S3CRETKEY',	'087678687612',	NULL,	NULL),
(10,	'fachruwildan1@gmail.com',	'81dc9bdb52d04dc20036dbd8313ed055',	'0',	'fachru wildans',	5,	0,	1,	'default.png',	NULL,	'08965879812',	NULL,	NULL),
(11,	'fachruwildan@gmail.com',	'81dc9bdb52d04dc20036dbd8313ed055',	'0',	'fachru wildans',	3,	0,	1,	'default.png',	NULL,	'089658798125',	NULL,	NULL),
(14,	'fachruwildan12@gmail.com',	'81dc9bdb52d04dc20036dbd8313ed055',	'0',	'fachru wildans',	3,	0,	1,	'default.png',	NULL,	'0896587981254',	NULL,	NULL),
(17,	'hardiansah7101@gmail.com',	'f5bb0c8de146c67b44babbf4e6584cc0',	'0',	'Muh. Hardiansah',	3,	1,	1,	'default.png',	'ISALAMMTYyNjgrQkFxYkQ0UHFielp2RnlGYnIyMlRuNG_uBgXC_9XajFsdjBQbWdpcXhvWGJvZC1pcWkrNzAyNzQ=S3CRETKEY',	'081911106262',	NULL,	NULL);

-- 2021-07-23 12:15:47
