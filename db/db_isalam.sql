-- Adminer 4.7.2 MySQL dump

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
(99,	'agenda-pendanaan',	'delete',	'Delete'),
(100,	'jenis-pembayaran',	'index',	'Index'),
(101,	'jenis-pembayaran',	'view',	'View'),
(102,	'jenis-pembayaran',	'create',	'Create'),
(103,	'jenis-pembayaran',	'update',	'Update'),
(104,	'jenis-pembayaran',	'delete',	'Delete'),
(105,	'tema-hubungi-kami',	'index',	'Index'),
(106,	'tema-hubungi-kami',	'view',	'View'),
(107,	'tema-hubungi-kami',	'create',	'Create'),
(108,	'tema-hubungi-kami',	'update',	'Update'),
(109,	'tema-hubungi-kami',	'delete',	'Delete'),
(110,	'pendanaan',	'unduh-file-uraian',	'Unduh File Uraian'),
(111,	'organisasi',	'index',	'Index'),
(112,	'organisasi',	'view',	'View'),
(113,	'organisasi',	'create',	'Create'),
(114,	'organisasi',	'update',	'Update'),
(115,	'organisasi',	'delete',	'Delete'),
(116,	'lembaga-penerima',	'index',	'Index'),
(117,	'lembaga-penerima',	'view',	'View'),
(118,	'lembaga-penerima',	'create',	'Create'),
(119,	'lembaga-penerima',	'update',	'Update'),
(120,	'lembaga-penerima',	'delete',	'Delete'),
(121,	'pendanaan',	'export',	'Export'),
(122,	'pendanaan',	'cetak',	'Cetak'),
(123,	'pembayaran',	'cetak',	'Cetak'),
(124,	'kategori-berita',	'index',	'Index'),
(125,	'kategori-berita',	'view',	'View'),
(126,	'kategori-berita',	'create',	'Create'),
(127,	'kategori-berita',	'update',	'Update'),
(128,	'kategori-berita',	'delete',	'Delete'),
(129,	'berita',	'index',	'Index'),
(130,	'berita',	'view',	'View'),
(131,	'berita',	'create',	'Create'),
(132,	'berita',	'update',	'Update'),
(133,	'berita',	'delete',	'Delete'),
(134,	'testimonials',	'index',	'Index'),
(135,	'testimonials',	'view',	'View'),
(136,	'testimonials',	'create',	'Create'),
(137,	'testimonials',	'update',	'Update'),
(138,	'testimonials',	'delete',	'Delete'),
(139,	'hubungi-kami',	'index',	'Index'),
(140,	'hubungi-kami',	'view',	'View'),
(141,	'hubungi-kami',	'create',	'Create'),
(142,	'hubungi-kami',	'update',	'Update'),
(143,	'hubungi-kami',	'delete',	'Delete'),
(144,	'hubungi-kami',	'sudah-dihubungi',	'Sudah Dihubungi'),
(145,	'site',	'error',	'Error'),
(146,	'setting',	'unduh',	'Unduh'),
(147,	'rekening',	'index',	'Index'),
(148,	'rekening',	'view',	'View'),
(149,	'rekening',	'create',	'Create'),
(150,	'rekening',	'update',	'Update'),
(151,	'rekening',	'delete',	'Delete'),
(152,	'pendanaan',	'pendanaan-penyaluran',	'Pendanaan Penyaluran'),
(153,	'penyaluran',	'index',	'Index'),
(154,	'penyaluran',	'view',	'View'),
(155,	'penyaluran',	'create',	'Create'),
(156,	'penyaluran',	'update',	'Update'),
(157,	'penyaluran',	'delete',	'Delete'),
(158,	'site',	'lupa-password',	'Lupa Password'),
(159,	'site',	'ganti-password',	'Ganti Password'),
(160,	'slides',	'index',	'Index'),
(161,	'slides',	'view',	'View'),
(162,	'slides',	'create',	'Create'),
(163,	'slides',	'update',	'Update'),
(164,	'slides',	'delete',	'Delete'),
(165,	'kontak',	'index',	'Index'),
(166,	'kontak',	'view',	'View'),
(167,	'kontak',	'create',	'Create'),
(168,	'kontak',	'update',	'Update'),
(169,	'kontak',	'delete',	'Delete'),
(170,	'pembayaran',	'export',	'Export'),
(171,	'pembayaran',	'export-pdf',	'Export Pdf'),
(172,	'pendanaan',	'export-pdf',	'Export Pdf'),
(173,	'pendanaan',	'exports',	'Exports'),
(174,	'pendanaan',	'back',	'Back'),
(175,	'pendanaan',	'tampil-pendanaan',	'Tampil Pendanaan'),
(176,	'amanah-pendanaan',	'index',	'Index'),
(177,	'amanah-pendanaan',	'view',	'View'),
(178,	'amanah-pendanaan',	'create',	'Create'),
(179,	'amanah-pendanaan',	'update',	'Update'),
(180,	'amanah-pendanaan',	'delete',	'Delete'),
(181,	'afiliasi',	'index',	'Index'),
(182,	'afiliasi',	'view',	'View'),
(183,	'afiliasi',	'create',	'Create'),
(184,	'afiliasi',	'update',	'Update'),
(185,	'afiliasi',	'delete',	'Delete');

DROP TABLE IF EXISTS `afliasi`;
CREATE TABLE `afliasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_produk` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `afliasi` (`id`, `nama_produk`, `foto`) VALUES
(2,	'Daihatsu',	'TVIeaPIEvsQ-AN4qQemTE6K9n2ltbz7J.png');

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `agenda_pendanaan`;
CREATE TABLE `agenda_pendanaan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pendanaan_id` int(11) NOT NULL,
  `nama_agenda` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pendanaan_id` (`pendanaan_id`),
  CONSTRAINT `agenda_pendanaan_ibfk_2` FOREIGN KEY (`pendanaan_id`) REFERENCES `pendanaan` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `agenda_pendanaan` (`id`, `pendanaan_id`, `nama_agenda`, `tanggal`) VALUES
(27,	47,	'Membangun Halaman Depan Masjid',	'2021-12-31');

DROP TABLE IF EXISTS `amanah_pendanaan`;
CREATE TABLE `amanah_pendanaan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pendanaan_id` int(11) NOT NULL,
  `amanah` text NOT NULL,
  `flag` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `pendanaan_id` (`pendanaan_id`),
  CONSTRAINT `amanah_pendanaan_ibfk_1` FOREIGN KEY (`pendanaan_id`) REFERENCES `pendanaan` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `amanah_pendanaan` (`id`, `pendanaan_id`, `amanah`, `flag`) VALUES
(1,	49,	'Untuk Organisasis',	1),
(4,	49,	'Organisasi',	1);

DROP TABLE IF EXISTS `bank`;
CREATE TABLE `bank` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `bank` (`id`, `name`, `logo`) VALUES
(1,	'BNI',	'w_k9OQ4vXaEy_j1gzUs4FjjDEk4sCw-F.png'),
(2,	'BRI',	'J7vrXc5_tm2EkUOoW7jVnf3y8TQSQdl3.png'),
(3,	'BCA',	NULL),
(4,	'Mandiri',	NULL),
(5,	'Cimb Niaga',	NULL);

DROP TABLE IF EXISTS `berita`;
CREATE TABLE `berita` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori_berita_id` int(11) NOT NULL,
  `view_count` int(11) DEFAULT NULL,
  `image_summary` text DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `kategori_berita_id` (`kategori_berita_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `berita_ibfk_1` FOREIGN KEY (`kategori_berita_id`) REFERENCES `kategori_berita` (`id`),
  CONSTRAINT `berita_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
