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
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=latin1;

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
(99,	'agenda-pendanaan',	'delete',	'Delete'),
(100,	'pendanaan',	'unduh-file-uraian',	'Unduh File Uraian'),
(101,	'organisasi',	'index',	'Index'),
(102,	'organisasi',	'view',	'View'),
(103,	'organisasi',	'create',	'Create'),
(104,	'organisasi',	'update',	'Update'),
(105,	'organisasi',	'delete',	'Delete'),
(106,	'lembaga-penerima',	'index',	'Index'),
(107,	'lembaga-penerima',	'view',	'View'),
(108,	'lembaga-penerima',	'create',	'Create'),
(109,	'lembaga-penerima',	'update',	'Update'),
(110,	'lembaga-penerima',	'delete',	'Delete');

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

INSERT INTO `kategori_pendanaan` (`id`, `name`) VALUES
(1,	'Perdagangan'),
(2,	'sedekah'),
(3,	'wakaf'),
(4,	'bencana alam');

DROP TABLE IF EXISTS `lembaga_penerima`;
CREATE TABLE `lembaga_penerima` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `flag` int(11) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

INSERT INTO `lembaga_penerima` (`id`, `nama`, `foto`, `flag`, `deskripsi`) VALUES
(1,	'Bank Muamalat',	'27xYmMsNGk_Nf4jv7rIlFXxME4fUyt6g.png',	1,	''),
(2,	'BNI Syariah',	'bIMEdbhrWtMfBuEDeiNHodNpex-StnTb.png',	1,	''),
(3,	'Bank Syariah Mandiri',	'zc5c0F1glP8_3IC-g05i879oVXjm59x-.png',	1,	'');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

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
  `order` int(11) NOT NULL DEFAULT 1,
  `parent_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `parent_id` (`parent_id`),
  CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `menu` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

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
(14,	'Agenda Pendanaan',	'agenda-pendanaan',	'index',	'fa fa-calendar',	1,	NULL),
(15,	'Organisasi',	'organisasi',	'index',	'fa fa-users',	1,	2),
(16,	'Lembaga Penerima',	'lembaga-penerima',	'index',	'fa fa-building-o',	1,	2);

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO `notifikasi` (`id`, `message`, `date`, `flag`, `user_id`) VALUES
(1,	'Pendanaan Pendanaan 12 Telah selesai',	'2021-07-25 12:14:32',	1,	1),
(2,	'Pendanaan Sumbangan Diri Telah selesai',	'2021-07-25 12:39:44',	1,	18),
(3,	'Pendanaan Sumbangan Diri Telah selesai',	'2021-07-25 12:39:44',	1,	10),
(4,	'Pendanaan Pembagunan Masjid di Batu Telah di Setujui',	'2021-09-03 15:13:07',	1,	1),
(5,	'Pendanaan Pendanaan 1 Telah di Setujui',	'2021-09-03 15:14:37',	1,	1);

DROP TABLE IF EXISTS `organisasi`;
CREATE TABLE `organisasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `quotes` text DEFAULT NULL,
  `flag` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

INSERT INTO `organisasi` (`id`, `nama`, `jabatan`, `foto`, `quotes`, `flag`) VALUES
(1,	'Bapak Direktur Utama',	'Direktur Utama',	NULL,	'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',	1),
(2,	'Ibu Sekretaris',	'Sekretaris',	NULL,	'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',	1),
(3,	'Ibu Bendahara',	'Bendahara',	NULL,	'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',	1),
(4,	'Mbak Marketing',	'Marketing',	'pkRPu_WbjzO5PCyZkEsyvkt5k8bN24ao.jpg',	'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',	1),
(5,	'Mas Marketing',	'Marketing',	'wUr-1yfVtjIPKYE8J4DOhORtRGkvqVb9.jpg',	'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',	1);

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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

INSERT INTO `pembayaran` (`id`, `kode_transaksi`, `nama`, `nominal`, `jenis_pembayaran_id`, `bukti_transaksi`, `user_id`, `pendanaan_id`, `tanggal_konfirmasi`, `tanggal_upload_bukti`, `created_at`, `updated_at`, `status_id`) VALUES
(2,	NULL,	'WIldan',	10000,	NULL,	'4-lbEYDOMV-TypUtm8PtDf7nILy6HCy3.png',	1,	3,	'2021-07-20 00:00:00',	NULL,	'2021-08-30 05:51:14',	'2021-07-20 14:56:01',	6),
(3,	NULL,	'WIldan',	10000,	NULL,	'4-lbEYDOMV-TypUtm8PtDf7nILy6HCy3.png',	1,	3,	'2021-07-20 00:00:00',	NULL,	'2021-07-20 15:19:17',	'2021-07-20 15:19:17',	6),
(4,	NULL,	'WIldan',	10000,	NULL,	'4-lbEYDOMV-TypUtm8PtDf7nILy6HCy3.png',	1,	3,	'2021-07-22 00:00:00',	NULL,	'2021-07-24 16:42:19',	'2021-07-20 15:19:20',	6),
(10,	'tz2vg_9rdK24072021090408',	'nama',	100000,	NULL,	NULL,	18,	16,	NULL,	NULL,	'2021-07-24 02:04:08',	'2021-07-24 02:04:08',	5),
(11,	'tz2vg_9rdK24072021090408',	'nama',	100000,	1,	'p72rJFOU150tc2OGor2UUJuK_QofDftW.jpg',	18,	16,	NULL,	'2021-07-24 09:26:16',	'2021-07-25 05:39:34',	'2021-07-24 02:26:16',	6),
(12,	'tz2vy_9rdK24072021090408',	'nama',	100000,	1,	'p72rJFOU150tc2OGor2UUJuK_QofDftW.jpg',	10,	16,	NULL,	'2021-07-24 09:26:16',	'2021-07-24 16:16:24',	'2021-07-24 02:26:16',	6);

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

INSERT INTO `pencairan` (`id`, `pendanaan_id`, `nominal`, `tanggal`, `created_at`) VALUES
(1,	3,	9000,	'2021-07-20',	'2021-07-20 16:22:52'),
(2,	3,	1000,	'2021-07-09',	'2021-07-20 17:26:59'),
(3,	16,	10,	'2021-07-25',	'2021-07-25 05:41:31');

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
  `file_uraian` varchar(255) DEFAULT NULL,
  `poster` varchar(255) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;

INSERT INTO `pendanaan` (`id`, `nama_pendanaan`, `foto`, `uraian`, `nominal`, `pendanaan_berakhir`, `user_id`, `bank_id`, `nomor_rekening`, `nama_nasabah`, `nama_perusahaan`, `deskripsi`, `foto_ktp`, `foto_kk`, `file_uraian`, `poster`, `kategori_pendanaan_id`, `status_id`) VALUES
(2,	'Pendanaan 1',	NULL,	'Tes Uraian',	80000,	'0000-00-00 00:00:00',	1,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	1,	7),
(3,	'Pendanaan 12',	NULL,	'Tes Uraian',	80000,	'2021-09-04 00:00:00',	1,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'',	'dQMufAQuevXNEY9DgRxHBbe7X1XvNxYF.pdf',	'QZI4SYIAIoDWr5aVZ7lAU5Ey5JW83tgW.jpg',	1,	2),
(4,	'Pendanaan 1',	NULL,	'Tes Uraian',	80000,	'0000-00-00 00:00:00',	1,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	1,	3),
(5,	'Pendanaan 1',	NULL,	'Tes Uraian',	80000,	'2021-09-05 00:00:00',	1,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'',	NULL,	'XFnsbS7D88MTCd70FnmWERrvyMU3udKM.jpg',	1,	2),
(6,	'Pendanaan 1',	NULL,	'Tes Uraian',	80000,	'0000-00-00 00:00:00',	1,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	1,	1),
(7,	'Pendanaan 1',	'pendanaan/20210719_2dc0c690d3726aed41ab1c89d2ed65c9f01e4337.PNG',	'Tes Uraian',	80000,	'0000-00-00 00:00:00',	1,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	1,	1),
(8,	'Pendanaan 1',	'pendanaan/20210719_5b1537e128fb3f98238b1aa0ebc1214d63e7e5b7.PNG',	'Tes Uraian',	80000,	'0000-00-00 00:00:00',	1,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	1,	1),
(9,	'Pendanaan 1',	'pendanaan/20210719_23d202fb561c67ac5d22ae22f0e595ed35106b02.PNG',	'Tes Uraian',	80000,	'0000-00-00 00:00:00',	1,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	1,	1),
(10,	'Pendanaan 1',	'pendanaan/20210720_5be92fce55bc28add0e9b38755d67690f7199977.PNG',	'Tes Uraian',	80000,	'0000-00-00 00:00:00',	1,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	1,	1),
(11,	'Pendanaan 1',	'pendanaan/20210720_a14750179f4f06b4cbe8f1fd53d87ed980b18155.PNG',	'Tes Uraian',	80000,	'0000-00-00 00:00:00',	1,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	1,	1),
(12,	'Pendanaan 1',	'pendanaan/20210720_7c86ae7523e8e05e8722ad2e1011878662bce335.PNG',	'Tes Uraian',	80000,	'0000-00-00 00:00:00',	1,	1,	NULL,	'Nama Nasabah',	'Perusahaan Nama',	'tidak ada',	NULL,	NULL,	NULL,	NULL,	1,	1),
(13,	'Pendanaan 1',	'',	'uraian 1',	100000,	'2021-07-20 02:50:32',	1,	NULL,	NULL,	NULL,	NULL,	NULL,	'pendanaan/20210721_a165fbd61c277745f187eaac7182d9c05d0d1171.png',	'pendanaan/20210721_7f8ee84f4cf599be71dc87a7eecacf740c7f12b7.png',	NULL,	NULL,	1,	1),
(15,	'Pendanaan 1',	'pendanaan/20210721_e85056a1203e6df1d2f52d464cb23070b33fd85c.PNG',	'Tes Uraian',	80000,	'2021-09-07 19:18:41',	1,	1,	123456,	'Budi',	'Perusahaan Nama',	'tidak ada',	'pendanaan/20210721_619cc696ef6af0741f624818aca554fcaba2ad9e.png',	'pendanaan/20210721_cd45b5b7049c852536ee19af1309a5aac70c61b3.png',	NULL,	NULL,	1,	1),
(16,	'Sumbangan Diri',	'pendanaan/20210722_1574bddb75c78a6fd2251d61e2993b5146201319.jpg',	'',	10000000,	'2021-08-31 00:00:00',	17,	1,	123456789,	'Ian',	'Pribadi',	'Mmisquen',	'pendanaan/20210722_e0dadb2ff54f4f7476f0c3ca3e904b778384e4ca.jpg',	'pendanaan/20210722_1e587263e3e1bf03411c4415cc1743a8aba34915.jpg',	NULL,	NULL,	2,	3),
(17,	'asdas',	'W5cei9MATGqA-aCU7Q6_ILmUoSEJKDH6.PNG',	'asdasasd',	12312123,	'2021-07-07 02:50:13',	1,	NULL,	NULL,	NULL,	NULL,	NULL,	'WVWKCgLayqTcx72zP__qtIKBJ-QG-bvM.PNG',	's0vPpgDFDDMYnGhrkQ4OeI1x1-Dt2ACX.PNG',	NULL,	NULL,	3,	3),
(18,	'Pembagunan Masjid di Batu',	'wO3y75f6JafgFw9Lq7pfFgNEYOJo2bLv.jpg',	'-',	50000,	'2021-09-13 03:05:36',	1,	NULL,	NULL,	NULL,	NULL,	NULL,	'fpt0SvFnm9EhkVZd3AITHDYsBa6hsaSm.jpg',	'kFj4O_lMLeefcXbnuMnUCLNRyMtVCzHj.jpg',	'F5mQ8CMaUxsJYRe8QTj5OfxiewD_L3Li.pdf',	'X6Pu3pzmvwhR39gJYE1k5mI3dPc97bN5.jpg',	3,	2);

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
) ENGINE=InnoDB AUTO_INCREMENT=604 DEFAULT CHARSET=latin1;

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
(521,	1,	12),
(522,	1,	13),
(523,	1,	14),
(524,	1,	15),
(525,	1,	17),
(526,	1,	18),
(527,	1,	19),
(528,	1,	20),
(529,	1,	21),
(530,	1,	22),
(531,	1,	23),
(532,	1,	24),
(533,	1,	25),
(534,	1,	26),
(535,	1,	27),
(536,	1,	28),
(537,	1,	29),
(538,	1,	30),
(539,	1,	31),
(540,	1,	32),
(541,	1,	33),
(542,	1,	49),
(543,	1,	50),
(544,	1,	51),
(545,	1,	52),
(546,	1,	53),
(547,	1,	54),
(548,	1,	55),
(549,	1,	56),
(550,	1,	57),
(551,	1,	58),
(552,	1,	59),
(553,	1,	60),
(554,	1,	61),
(555,	1,	62),
(556,	1,	63),
(557,	1,	101),
(558,	1,	102),
(559,	1,	103),
(560,	1,	104),
(561,	1,	105),
(562,	1,	106),
(563,	1,	107),
(564,	1,	108),
(565,	1,	109),
(566,	1,	110),
(567,	1,	64),
(568,	1,	65),
(569,	1,	66),
(570,	1,	67),
(571,	1,	68),
(572,	1,	69),
(573,	1,	70),
(574,	1,	71),
(575,	1,	88),
(576,	1,	89),
(577,	1,	72),
(578,	1,	73),
(579,	1,	74),
(580,	1,	75),
(581,	1,	76),
(582,	1,	84),
(583,	1,	85),
(584,	1,	86),
(585,	1,	87),
(586,	1,	77),
(587,	1,	100),
(588,	1,	78),
(589,	1,	79),
(590,	1,	80),
(591,	1,	81),
(592,	1,	82),
(593,	1,	83),
(594,	1,	90),
(595,	1,	91),
(596,	1,	92),
(597,	1,	93),
(598,	1,	94),
(599,	1,	95),
(600,	1,	96),
(601,	1,	97),
(602,	1,	98),
(603,	1,	99);

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
) ENGINE=InnoDB AUTO_INCREMENT=171 DEFAULT CHARSET=latin1;

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
(155,	1,	1),
(156,	1,	2),
(157,	1,	3),
(158,	1,	4),
(159,	1,	5),
(160,	1,	6),
(161,	1,	7),
(162,	1,	11),
(163,	1,	15),
(164,	1,	16),
(165,	1,	8),
(166,	1,	9),
(167,	1,	10),
(168,	1,	12),
(169,	1,	13),
(170,	1,	14);

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
  `tentang_kami` text DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `nama_web` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `slogan_web` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

INSERT INTO `setting` (`id`, `pin`, `logo`, `judul_web`, `link_download_apk_marketing`, `bg_login`, `bg_pin`, `link_download_apk`, `tentang_kami`, `latitude`, `longitude`, `nama_web`, `alamat`, `slogan_web`) VALUES
(3,	1234,	'PIVCd3QPQ5nZWUpqFxSu0yMKfpe2UGt5.png',	'Wakaf Mudah Pahala Berlimpah',	'marketing',	'Zk2Bn-BQSmtTFiC_lXs2K179n-mR3bR0.jpg',	NULL,	'playstore',	'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',	'-7.8712057',	'112.530626',	'ISALAM',	'Batu',	'Ketika manusia meninggal dunia, maka terputus sudah amal jariahnya kecuali tiga perkara yakni: sedekah jariyah, ilmu bermanfaat dan doa anak yang sholeh. ');

DROP TABLE IF EXISTS `status`;
CREATE TABLE `status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

INSERT INTO `user` (`id`, `username`, `password`, `name`, `role_id`, `confirm`, `status`, `pin`, `photo_url`, `secret_token`, `nomor_handphone`, `last_login`, `last_logout`) VALUES
(1,	'admin@admin.com',	'$2y$13$jfVHR0wNqQMpR42YeRoG9ue8LavYwtz0Ou9wLTOEN.g5Mv7/TxIOe',	'Administrator',	1,	1,	1,	'1234',	'default.png',	'ISALAMMTYyNzErUmJEZmtPcGt4WVFVVW9Dal_YnkcI_Vjb3AxdFlXV2p5WjdjSiswOTg5Nw==S3CRETKEY',	'',	'2021-09-03 15:06:35',	'2021-07-24 22:50:41'),
(2,	'user',	'ee11cbb19052e40b07aac0ca060c23ee',	'Regular User',	3,	1,	1,	NULL,	'default.png',	NULL,	NULL,	NULL,	NULL),
(3,	'budi@gmail.com',	'21232f297a57a5a743894a0e4a801fc3',	'budi@gmail.com',	3,	0,	1,	NULL,	'default.png',	NULL,	'0876786876',	NULL,	NULL),
(4,	'budi1@gmail.com',	'827ccb0eea8a706c4c34a16891f84e7b',	'Name budi',	3,	0,	1,	NULL,	'default.png',	NULL,	'08767868761',	NULL,	NULL),
(5,	'budi12@gmail.com',	'827ccb0eea8a706c4c34a16891f84e7b',	'Name budi',	2,	0,	1,	NULL,	'default.png',	NULL,	'087678687612',	NULL,	NULL),
(10,	'fachruwildan1@gmail.com',	'81dc9bdb52d04dc20036dbd8313ed055',	'fachru wildans',	5,	0,	1,	NULL,	'default.png',	NULL,	'08965879812',	NULL,	NULL),
(11,	'fachruwildan@gmail.com',	'81dc9bdb52d04dc20036dbd8313ed055',	'fachru wildans',	3,	0,	1,	NULL,	'default.png',	NULL,	'089658798125',	NULL,	NULL),
(14,	'fachruwildan12@gmail.com',	'81dc9bdb52d04dc20036dbd8313ed055',	'fachru wildans',	3,	0,	1,	NULL,	'default.png',	NULL,	'0896587981254',	NULL,	NULL),
(17,	'hardiansah7101@gmail.com',	'$2y$13$pm1zgDOB5jNY4MNS93eibuhUSu.bPAEcagIxT6mYu73NsNattN9jG',	'Muh. Hardiansah',	2,	1,	1,	NULL,	'default.png',	'ISALAMMTYyNzArWktRdWFYMzJocjVSWVFNUDRnVVRM_o7B8W_MC1VQy02aWVNeGN1bEhGaExIemFOKzQxMjEyS3CRETKEY',	'081911106262',	NULL,	NULL),
(18,	'dellanjng@gmail.com',	'$2y$13$pskad5BMklO4gWTrinjG0e2FD5/GTrH3NkFnRqE/S/HS7wIunMZni',	'Fahru',	5,	1,	1,	'1234',	'default.png',	'ISALAMMTYyNzErcERzc3lLR1VNWUdEY1FYMUJHZ0dYeG_fwFRb_NtR1ZTQStLMm5sdVFVZHZNWnNyQUUrMzI1Nzk=S3CRETKEY',	'081082083081',	NULL,	NULL);

-- 2021-09-06 05:40:16
