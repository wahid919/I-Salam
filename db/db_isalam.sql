-- Adminer 4.6.2 MySQL dump

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
(90,	'partner-pendanaan',	'index',	'Index'),
(91,	'partner-pendanaan',	'view',	'View'),
(92,	'partner-pendanaan',	'create',	'Create'),
(93,	'partner-pendanaan',	'update',	'Update'),
(94,	'partner-pendanaan',	'delete',	'Delete'),
(95,	'agenda-pendanaan',	'index',	'Index'),
(96,	'agenda-pendanaan',	'view',	'View'),
(97,	'agenda-pendanaan',	'create',	'Create'),
(98,	'agenda-pendanaan',	'update',	'Update'),
(99,	'agenda-pendanaan',	'delete',	'Delete');

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

INSERT INTO `agenda_pendanaan` (`id`, `pendanaan_id`, `nama_agenda`, `tanggal`) VALUES
(1,	3,	'Nama Agenda Pendanaan',	'2021-07-07'),
(4,	13,	'Agenda 1',	'2021-07-07'),
(5,	16,	'Agenda 1',	'2021-07-26'),
(6,	16,	'Agenda 2',	'2021-07-30');

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


DROP TABLE IF EXISTS `jenis_pembayaran`;
CREATE TABLE `jenis_pembayaran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jenis` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


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
(3,	'Budi Admin',	'ponorogo',	'Batu',	12345,	'1234',	'banyak',	1,	1),
(4,	'HIHIHI',	'ponorogo',	'batu',	123123123,	'123123123',	'kerja',	1,	17);

DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `controller` varchar(50) NOT NULL,
  `action` varchar(50) NOT NULL DEFAULT 'index',
  `icon` varchar(50) NOT NULL,
  `order` int(11) NOT NULL DEFAULT '1',
  `parent_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `parent_id` (`parent_id`),
  CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `menu` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(12,	'Setting Website',	'setting',	'index',	'fa fa-align-justify',	5,	NULL),
(13,	'Partner Pendanaan',	'partner-pendanaan',	'index',	'fa fa-users',	1,	NULL),
(14,	'Agenda Pendanaan',	'agenda-pendanaan',	'index',	'fa fa-calendar',	1,	NULL);

DROP TABLE IF EXISTS `notifikasi`;
CREATE TABLE `notifikasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` text NOT NULL,
  `date` datetime NOT NULL,
  `flag` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `notifikasi_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `otp`;
CREATE TABLE `otp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `kode_otp` int(11) NOT NULL,
  `is_used` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `otp_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `otp` (`id`, `id_user`, `kode_otp`, `is_used`, `created_at`, `updated_at`) VALUES
(3,	10,	6891,	0,	'2021-07-18 19:29:47',	'2021-07-18 19:29:47'),
(4,	11,	3025,	1,	'2021-07-18 16:08:54',	'2021-07-18 16:08:54'),
(7,	14,	8904,	0,	'2021-07-18 19:03:08',	'2021-07-18 19:03:08'),
(10,	17,	9943,	0,	'2021-07-18 20:24:28',	'2021-07-18 20:24:01'),
(11,	18,	9580,	1,	'2021-07-22 15:29:23',	'2021-07-22 15:29:23');

DROP TABLE IF EXISTS `partner_pendanaan`;
CREATE TABLE `partner_pendanaan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_partner` varchar(255) NOT NULL,
  `pendanaan_id` int(11) NOT NULL,
  `foto_ktp_partner` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pendanaan_id` (`pendanaan_id`),
  CONSTRAINT `partner_pendanaan_ibfk_1` FOREIGN KEY (`pendanaan_id`) REFERENCES `pendanaan` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `partner_pendanaan` (`id`, `nama_partner`, `pendanaan_id`, `foto_ktp_partner`) VALUES
(2,	'Partner Isalam 1',	13,	'foto_ktp_partner/20210721_88f6892d65e5e92d41b3a9d20748f1c157eaf4c9.png'),
(3,	'hohoho',	16,	'partner-pendanaan/2021-07-22/20210722_346a6941b9f5b0d59d9ab849e8a76aebaebbdb3e.jpg'),
(4,	'bboboho',	16,	'partner-pendanaan/2021-07-22/20210722_e2d0621d2482fc10d2adc32f342a11cb4075c671.jpg');

DROP TABLE IF EXISTS `pembayaran`;
CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_transaksi` varchar(255) DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  `nominal` int(11) NOT NULL,
  `jenis_pembayaran_id` int(11) DEFAULT NULL,
  `bukti_transaksi` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `pendanaan_id` int(11) NOT NULL,
  `tanggal_konfirmasi` datetime DEFAULT NULL,
  `tanggal_upload_bukti` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
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

INSERT INTO `pembayaran` (`id`, `kode_transaksi`, `nama`, `nominal`, `jenis_pembayaran_id`, `bukti_transaksi`, `user_id`, `pendanaan_id`, `tanggal_konfirmasi`, `tanggal_upload_bukti`, `created_at`, `updated_at`, `status_id`) VALUES
(2,	NULL,	'WIldan',	10000,	NULL,	'4-lbEYDOMV-TypUtm8PtDf7nILy6HCy3.png',	1,	3,	'2021-07-20 00:00:00',	NULL,	'2021-07-24 02:25:59',	'2021-07-20 14:56:01',	6),
(3,	NULL,	'WIldan',	10000,	NULL,	'4-lbEYDOMV-TypUtm8PtDf7nILy6HCy3.png',	1,	3,	'2021-07-20 00:00:00',	NULL,	'2021-07-20 15:19:17',	'2021-07-20 15:19:17',	6),
(4,	NULL,	'WIldan',	10000,	NULL,	'4-lbEYDOMV-TypUtm8PtDf7nILy6HCy3.png',	1,	3,	'2021-07-21 00:00:00',	NULL,	'2021-07-21 06:36:28',	'2021-07-20 15:19:20',	6),
(10,	'tz2vg_9rdK24072021090408',	'nama',	100000,	NULL,	NULL,	18,	16,	NULL,	NULL,	'2021-07-24 02:04:08',	'2021-07-24 02:04:08',	5),
(11,	'tz2vg_9rdK24072021090408',	'nama',	100000,	NULL,	'p72rJFOU150tc2OGor2UUJuK_QofDftW.jpg',	18,	16,	NULL,	'2021-07-24 09:26:16',	'2021-07-24 02:26:16',	'2021-07-24 02:26:16',	10);

DROP TABLE IF EXISTS `pencairan`;
CREATE TABLE `pencairan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pendanaan_id` int(11) NOT NULL,
  `nominal` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `pendanaan_id` (`pendanaan_id`),
  CONSTRAINT `pencairan_ibfk_1` FOREIGN KEY (`pendanaan_id`) REFERENCES `pendanaan` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `pencairan` (`id`, `pendanaan_id`, `nominal`, `tanggal`, `created_at`) VALUES
(1,	3,	9000,	'2021-07-20',	'2021-07-20 16:22:52'),
(2,	3,	1000,	'2021-07-09',	'2021-07-20 17:26:59');

DROP TABLE IF EXISTS `pendanaan`;
CREATE TABLE `pendanaan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pendanaan` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `uraian` text,
  `nominal` int(11) DEFAULT NULL,
  `pendanaan_berakhir` datetime DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `bank_id` int(11) DEFAULT NULL,
  `nomor_rekening` int(11) DEFAULT NULL,
  `nama_nasabah` varchar(255) DEFAULT NULL,
  `nama_perusahaan` varchar(255) DEFAULT NULL,
  `deskripsi` text,
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
(4,	'Pendanaan 1',	NULL,	'Tes Uraian',	80000,	'0000-00-00 00:00:00',	1,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	1,	4),
(5,	'Pendanaan 1',	NULL,	'Tes Uraian',	80000,	'0000-00-00 00:00:00',	1,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	1,	1),
(6,	'Pendanaan 1',	NULL,	'Tes Uraian',	80000,	'0000-00-00 00:00:00',	1,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	1,	1),
(7,	'Pendanaan 1',	'pendanaan/20210719_2dc0c690d3726aed41ab1c89d2ed65c9f01e4337.PNG',	'Tes Uraian',	80000,	'0000-00-00 00:00:00',	1,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	1,	1),
(8,	'Pendanaan 1',	'pendanaan/20210719_5b1537e128fb3f98238b1aa0ebc1214d63e7e5b7.PNG',	'Tes Uraian',	80000,	'0000-00-00 00:00:00',	1,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	1,	1),
(9,	'Pendanaan 1',	'pendanaan/20210719_23d202fb561c67ac5d22ae22f0e595ed35106b02.PNG',	'Tes Uraian',	80000,	'0000-00-00 00:00:00',	1,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	1,	1),
(10,	'Pendanaan 1',	'pendanaan/20210720_5be92fce55bc28add0e9b38755d67690f7199977.PNG',	'Tes Uraian',	80000,	'0000-00-00 00:00:00',	1,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	1,	1),
(11,	'Pendanaan 1',	'pendanaan/20210720_a14750179f4f06b4cbe8f1fd53d87ed980b18155.PNG',	'Tes Uraian',	80000,	'0000-00-00 00:00:00',	1,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	1,	1),
(12,	'Pendanaan 1',	'pendanaan/20210720_7c86ae7523e8e05e8722ad2e1011878662bce335.PNG',	'Tes Uraian',	80000,	'0000-00-00 00:00:00',	1,	1,	NULL,	'Nama Nasabah',	'Perusahaan Nama',	'tidak ada',	NULL,	NULL,	1,	1),
(13,	'Pendanaan 1',	'',	'uraian 1',	100000,	'2021-07-20 02:50:32',	1,	NULL,	NULL,	NULL,	NULL,	NULL,	'pendanaan/20210721_a165fbd61c277745f187eaac7182d9c05d0d1171.png',	'pendanaan/20210721_7f8ee84f4cf599be71dc87a7eecacf740c7f12b7.png',	1,	1),
(15,	'Pendanaan 1',	'pendanaan/20210721_e85056a1203e6df1d2f52d464cb23070b33fd85c.PNG',	'Tes Uraian',	80000,	'2021-09-07 19:18:41',	1,	1,	123456,	'Budi',	'Perusahaan Nama',	'tidak ada',	'pendanaan/20210721_619cc696ef6af0741f624818aca554fcaba2ad9e.png',	'pendanaan/20210721_cd45b5b7049c852536ee19af1309a5aac70c61b3.png',	1,	1),
(16,	'Sumbangan Diri',	'pendanaan/20210722_1574bddb75c78a6fd2251d61e2993b5146201319.jpg',	'',	10000000,	'2021-08-31 00:00:00',	17,	1,	123456789,	'Ian',	'Pribadi',	'Mmisquen',	'pendanaan/20210722_e0dadb2ff54f4f7476f0c3ca3e904b778384e4ca.jpg',	'pendanaan/20210722_1e587263e3e1bf03411c4415cc1743a8aba34915.jpg',	2,	2);

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
(298,	1,	12),
(299,	1,	13),
(300,	1,	14),
(301,	1,	15),
(302,	1,	17),
(303,	1,	18),
(304,	1,	19),
(305,	1,	20),
(306,	1,	21),
(307,	1,	22),
(308,	1,	23),
(309,	1,	24),
(310,	1,	25),
(311,	1,	26),
(312,	1,	27),
(313,	1,	28),
(314,	1,	29),
(315,	1,	30),
(316,	1,	31),
(317,	1,	32),
(318,	1,	33),
(319,	1,	49),
(320,	1,	50),
(321,	1,	51),
(322,	1,	52),
(323,	1,	53),
(324,	1,	54),
(325,	1,	55),
(326,	1,	56),
(327,	1,	57),
(328,	1,	58),
(329,	1,	59),
(330,	1,	60),
(331,	1,	61),
(332,	1,	62),
(333,	1,	63),
(334,	1,	64),
(335,	1,	65),
(336,	1,	66),
(337,	1,	67),
(338,	1,	68),
(339,	1,	69),
(340,	1,	70),
(341,	1,	71),
(342,	1,	88),
(343,	1,	89),
(344,	1,	72),
(345,	1,	73),
(346,	1,	74),
(347,	1,	75),
(348,	1,	76),
(349,	1,	84),
(350,	1,	85),
(351,	1,	86),
(352,	1,	87),
(353,	1,	77),
(354,	1,	78),
(355,	1,	79),
(356,	1,	80),
(357,	1,	81),
(358,	1,	82),
(359,	1,	83),
(360,	1,	90),
(361,	1,	91),
(362,	1,	92),
(363,	1,	93),
(364,	1,	94),
(365,	1,	95),
(366,	1,	96),
(367,	1,	97),
(368,	1,	98),
(369,	1,	99);

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
(112,	1,	1),
(113,	1,	2),
(114,	1,	3),
(115,	1,	4),
(116,	1,	5),
(117,	1,	6),
(118,	1,	7),
(119,	1,	11),
(120,	1,	8),
(121,	1,	9),
(122,	1,	10),
(123,	1,	12),
(124,	1,	13),
(125,	1,	14);

DROP TABLE IF EXISTS `setting`;
CREATE TABLE `setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pin` int(11) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `judul_web` varchar(255) DEFAULT NULL,
  `link_download_apk_marketing` varchar(255) DEFAULT NULL,
  `bg_login` varchar(255) DEFAULT NULL,
  `bg_pin` varchar(255) DEFAULT NULL,
  `link_download_apk` varchar(255) DEFAULT NULL,
  `nama_web` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `slogan_web` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `setting` (`id`, `pin`, `logo`, `judul_web`, `link_download_apk_marketing`, `bg_login`, `bg_pin`, `link_download_apk`, `nama_web`, `alamat`, `slogan_web`) VALUES
(3,	1234,	'UHHB5dc9RcnV-d48no4oK8EQc8NWte-O.png',	'Wakaf Mudah Pahala Berlimpah',	'marketing',	'PZ9iQ72nyBx7QNfqO5aK2x95Zt-v8Rbq.jpg',	'z4spKTc3CoEp3MIWk1iG6YhhAVwj1JlM.jpg',	'playstore',	'ISALAM',	'Batu',	'Ketika manusia meninggal dunia, maka terputus sudah amal jariahnya kecuali tiga perkara yakni: sedekah jariyah, ilmu bermanfaat dan doa anak yang sholeh. ');

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
(5,	'Pembayaran Pending'),
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
  `name` varchar(50) NOT NULL,
  `role_id` int(11) NOT NULL,
  `confirm` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `pin` varchar(8) DEFAULT NULL,
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

INSERT INTO `user` (`id`, `username`, `password`, `name`, `role_id`, `confirm`, `status`, `pin`, `photo_url`, `secret_token`, `nomor_handphone`, `last_login`, `last_logout`) VALUES
(1,	'admin@admin.com',	'$2y$13$jfVHR0wNqQMpR42YeRoG9ue8LavYwtz0Ou9wLTOEN.g5Mv7/TxIOe',	'Administrator',	1,	1,	1,	NULL,	'default.png',	'ISALAMMTYyNzErUmJEZmtPcGt4WVFVVW9Dal_YnkcI_Vjb3AxdFlXV2p5WjdjSiswOTg5Nw==S3CRETKEY',	NULL,	'2021-07-22 21:50:18',	'2021-07-21 19:06:29'),
(2,	'user',	'ee11cbb19052e40b07aac0ca060c23ee',	'Regular User',	3,	1,	1,	NULL,	'default.png',	NULL,	NULL,	NULL,	NULL),
(3,	'budi@gmail.com',	'21232f297a57a5a743894a0e4a801fc3',	'budi@gmail.com',	3,	0,	1,	NULL,	'default.png',	NULL,	'0876786876',	NULL,	NULL),
(4,	'budi1@gmail.com',	'827ccb0eea8a706c4c34a16891f84e7b',	'Name budi',	3,	0,	1,	NULL,	'default.png',	NULL,	'08767868761',	NULL,	NULL),
(5,	'budi12@gmail.com',	'827ccb0eea8a706c4c34a16891f84e7b',	'Name budi',	2,	0,	1,	NULL,	'default.png',	NULL,	'087678687612',	NULL,	NULL),
(10,	'fachruwildan1@gmail.com',	'81dc9bdb52d04dc20036dbd8313ed055',	'fachru wildans',	5,	0,	1,	NULL,	'default.png',	NULL,	'08965879812',	NULL,	NULL),
(11,	'fachruwildan@gmail.com',	'81dc9bdb52d04dc20036dbd8313ed055',	'fachru wildans',	3,	0,	1,	NULL,	'default.png',	NULL,	'089658798125',	NULL,	NULL),
(14,	'fachruwildan12@gmail.com',	'81dc9bdb52d04dc20036dbd8313ed055',	'fachru wildans',	3,	0,	1,	NULL,	'default.png',	NULL,	'0896587981254',	NULL,	NULL),
(17,	'hardiansah7101@gmail.com',	'$2y$13$pm1zgDOB5jNY4MNS93eibuhUSu.bPAEcagIxT6mYu73NsNattN9jG',	'Muh. Hardiansah',	2,	1,	1,	NULL,	'default.png',	'ISALAMMTYyNzArWktRdWFYMzJocjVSWVFNUDRnVVRM_o7B8W_MC1VQy02aWVNeGN1bEhGaExIemFOKzQxMjEyS3CRETKEY',	'081911106262',	NULL,	NULL),
(18,	'dellanjng@gmail.com',	'$2y$13$pskad5BMklO4gWTrinjG0e2FD5/GTrH3NkFnRqE/S/HS7wIunMZni',	'Fahru',	5,	1,	1,	'1234',	'default.png',	'ISALAMMTYyNzErcERzc3lLR1VNWUdEY1FYMUJHZ0dYeG_fwFRb_NtR1ZTQStLMm5sdVFVZHZNWnNyQUUrMzI1Nzk=S3CRETKEY',	'081082083081',	NULL,	NULL);

-- 2021-07-24 11:19:39
