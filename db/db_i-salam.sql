-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Jul 2023 pada 04.44
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_i-salam`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `action`
--

CREATE TABLE `action` (
  `id` int(11) NOT NULL,
  `controller_id` varchar(50) NOT NULL,
  `action_id` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `action`
--

INSERT INTO `action` (`id`, `controller_id`, `action_id`, `name`) VALUES
(12, 'site', 'index', 'Index'),
(13, 'site', 'profile', 'Profile'),
(14, 'site', 'login', 'Login'),
(15, 'site', 'logout', 'Logout'),
(16, 'site', 'contact', 'Contact'),
(17, 'site', 'about', 'About'),
(18, 'menu', 'index', 'Index'),
(19, 'menu', 'view', 'View'),
(20, 'menu', 'create', 'Create'),
(21, 'menu', 'update', 'Update'),
(22, 'menu', 'delete', 'Delete'),
(23, 'role', 'index', 'Index'),
(24, 'role', 'view', 'View'),
(25, 'role', 'create', 'Create'),
(26, 'role', 'update', 'Update'),
(27, 'role', 'delete', 'Delete'),
(28, 'role', 'detail', 'Detail'),
(29, 'user', 'index', 'Index'),
(30, 'user', 'view', 'View'),
(31, 'user', 'create', 'Create'),
(32, 'user', 'update', 'Update'),
(33, 'user', 'delete', 'Delete'),
(34, 'site', 'register', 'Register'),
(35, 'site', 'pemasukkan', 'Pemasukkan'),
(36, 'site', 'pengeluaran', 'Pengeluaran'),
(37, 'site', 'list-perhitungan', 'List Perhitungan'),
(38, 'site', 'list-hutang', 'List Hutang'),
(39, 'site', 'jurnal', 'Jurnal'),
(40, 'site', 'neraca', 'Neraca'),
(41, 'site', 'arus-kas', 'Arus Kas'),
(42, 'site', 'proyeksi', 'Proyeksi'),
(43, 'site', 'cetak-neraca', 'Cetak Neraca'),
(44, 'site', 'cetak-list-perhitungan', 'Cetak List Perhitungan'),
(45, 'site', 'cetak-arus-kas', 'Cetak Arus Kas'),
(46, 'site', 'cetak-proyeksi', 'Cetak Proyeksi'),
(47, 'site', 'generate', 'Generate'),
(48, 'menu', 'save', 'Save'),
(49, 'bank', 'index', 'Index'),
(50, 'bank', 'view', 'View'),
(51, 'bank', 'create', 'Create'),
(52, 'bank', 'update', 'Update'),
(53, 'bank', 'delete', 'Delete'),
(54, 'kategori-pendanaan', 'index', 'Index'),
(55, 'kategori-pendanaan', 'view', 'View'),
(56, 'kategori-pendanaan', 'create', 'Create'),
(57, 'kategori-pendanaan', 'update', 'Update'),
(58, 'kategori-pendanaan', 'delete', 'Delete'),
(59, 'status', 'index', 'Index'),
(60, 'status', 'view', 'View'),
(61, 'status', 'create', 'Create'),
(62, 'status', 'update', 'Update'),
(63, 'status', 'delete', 'Delete'),
(64, 'marketing-data-user', 'index', 'Index'),
(65, 'marketing-data-user', 'view', 'View'),
(66, 'marketing-data-user', 'create', 'Create'),
(67, 'marketing-data-user', 'update', 'Update'),
(68, 'marketing-data-user', 'delete', 'Delete'),
(69, 'pembayaran', 'index', 'Index'),
(70, 'pembayaran', 'view', 'View'),
(71, 'pembayaran', 'create', 'Create'),
(72, 'pembayaran', 'update', 'Update'),
(73, 'pembayaran', 'delete', 'Delete'),
(74, 'pendanaan', 'index', 'Index'),
(75, 'pendanaan', 'view', 'View'),
(76, 'pendanaan', 'create', 'Create'),
(77, 'pendanaan', 'update', 'Update'),
(78, 'pendanaan', 'delete', 'Delete'),
(79, 'setting', 'index', 'Index'),
(80, 'setting', 'view', 'View'),
(81, 'setting', 'create', 'Create'),
(82, 'setting', 'update', 'Update'),
(83, 'setting', 'delete', 'Delete'),
(84, 'pendanaan', 'approve-pendanaan', 'Approve Pendanaan'),
(85, 'pendanaan', 'pendanaan-cair', 'Pendanaan Cair'),
(86, 'pendanaan', 'pendanaan-selesai', 'Pendanaan Selesai'),
(87, 'pendanaan', 'pendanaan-tolak', 'Pendanaan Tolak'),
(88, 'pembayaran', 'approve-pembayaran', 'Approve Pembayaran'),
(89, 'pembayaran', 'pembayaran-tolak', 'Pembayaran Tolak'),
(90, 'partner-pendanaan', 'index', 'Index'),
(91, 'partner-pendanaan', 'view', 'View'),
(92, 'partner-pendanaan', 'create', 'Create'),
(93, 'partner-pendanaan', 'update', 'Update'),
(94, 'partner-pendanaan', 'delete', 'Delete'),
(95, 'agenda-pendanaan', 'index', 'Index'),
(96, 'agenda-pendanaan', 'view', 'View'),
(97, 'agenda-pendanaan', 'create', 'Create'),
(98, 'agenda-pendanaan', 'update', 'Update'),
(99, 'agenda-pendanaan', 'delete', 'Delete'),
(100, 'jenis-pembayaran', 'index', 'Index'),
(101, 'jenis-pembayaran', 'view', 'View'),
(102, 'jenis-pembayaran', 'create', 'Create'),
(103, 'jenis-pembayaran', 'update', 'Update'),
(104, 'jenis-pembayaran', 'delete', 'Delete'),
(105, 'tema-hubungi-kami', 'index', 'Index'),
(106, 'tema-hubungi-kami', 'view', 'View'),
(107, 'tema-hubungi-kami', 'create', 'Create'),
(108, 'tema-hubungi-kami', 'update', 'Update'),
(109, 'tema-hubungi-kami', 'delete', 'Delete'),
(110, 'pendanaan', 'unduh-file-uraian', 'Unduh File Uraian'),
(111, 'organisasi', 'index', 'Index'),
(112, 'organisasi', 'view', 'View'),
(113, 'organisasi', 'create', 'Create'),
(114, 'organisasi', 'update', 'Update'),
(115, 'organisasi', 'delete', 'Delete'),
(116, 'lembaga-penerima', 'index', 'Index'),
(117, 'lembaga-penerima', 'view', 'View'),
(118, 'lembaga-penerima', 'create', 'Create'),
(119, 'lembaga-penerima', 'update', 'Update'),
(120, 'lembaga-penerima', 'delete', 'Delete'),
(121, 'pendanaan', 'export', 'Export'),
(122, 'pendanaan', 'cetak', 'Cetak'),
(123, 'pembayaran', 'cetak', 'Cetak'),
(124, 'kategori-berita', 'index', 'Index'),
(125, 'kategori-berita', 'view', 'View'),
(126, 'kategori-berita', 'create', 'Create'),
(127, 'kategori-berita', 'update', 'Update'),
(128, 'kategori-berita', 'delete', 'Delete'),
(129, 'berita', 'index', 'Index'),
(130, 'berita', 'view', 'View'),
(131, 'berita', 'create', 'Create'),
(132, 'berita', 'update', 'Update'),
(133, 'berita', 'delete', 'Delete'),
(134, 'testimonials', 'index', 'Index'),
(135, 'testimonials', 'view', 'View'),
(136, 'testimonials', 'create', 'Create'),
(137, 'testimonials', 'update', 'Update'),
(138, 'testimonials', 'delete', 'Delete'),
(139, 'hubungi-kami', 'index', 'Index'),
(140, 'hubungi-kami', 'view', 'View'),
(141, 'hubungi-kami', 'create', 'Create'),
(142, 'hubungi-kami', 'update', 'Update'),
(143, 'hubungi-kami', 'delete', 'Delete'),
(144, 'hubungi-kami', 'sudah-dihubungi', 'Sudah Dihubungi'),
(145, 'site', 'error', 'Error'),
(146, 'setting', 'unduh', 'Unduh'),
(147, 'rekening', 'index', 'Index'),
(148, 'rekening', 'view', 'View'),
(149, 'rekening', 'create', 'Create'),
(150, 'rekening', 'update', 'Update'),
(151, 'rekening', 'delete', 'Delete'),
(152, 'pendanaan', 'pendanaan-penyaluran', 'Pendanaan Penyaluran'),
(153, 'penyaluran', 'index', 'Index'),
(154, 'penyaluran', 'view', 'View'),
(155, 'penyaluran', 'create', 'Create'),
(156, 'penyaluran', 'update', 'Update'),
(157, 'penyaluran', 'delete', 'Delete'),
(158, 'site', 'lupa-password', 'Lupa Password'),
(159, 'site', 'ganti-password', 'Ganti Password'),
(160, 'slides', 'index', 'Index'),
(161, 'slides', 'view', 'View'),
(162, 'slides', 'create', 'Create'),
(163, 'slides', 'update', 'Update'),
(164, 'slides', 'delete', 'Delete'),
(165, 'kontak', 'index', 'Index'),
(166, 'kontak', 'view', 'View'),
(167, 'kontak', 'create', 'Create'),
(168, 'kontak', 'update', 'Update'),
(169, 'kontak', 'delete', 'Delete'),
(170, 'pembayaran', 'export', 'Export'),
(171, 'pembayaran', 'export-pdf', 'Export Pdf'),
(172, 'pendanaan', 'export-pdf', 'Export Pdf'),
(173, 'pendanaan', 'exports', 'Exports'),
(174, 'pendanaan', 'back', 'Back'),
(175, 'pendanaan', 'tampil-pendanaan', 'Tampil Pendanaan'),
(176, 'amanah-pendanaan', 'index', 'Index'),
(177, 'amanah-pendanaan', 'view', 'View'),
(178, 'amanah-pendanaan', 'create', 'Create'),
(179, 'amanah-pendanaan', 'update', 'Update'),
(180, 'amanah-pendanaan', 'delete', 'Delete'),
(181, 'afiliasi', 'index', 'Index'),
(182, 'afiliasi', 'view', 'View'),
(183, 'afiliasi', 'create', 'Create'),
(184, 'afiliasi', 'update', 'Update'),
(185, 'afiliasi', 'delete', 'Delete'),
(186, 'kegiatan-pendanaan', 'index', 'Index'),
(187, 'kegiatan-pendanaan', 'view', 'View'),
(188, 'kegiatan-pendanaan', 'create', 'Create'),
(189, 'kegiatan-pendanaan', 'update', 'Update'),
(190, 'kegiatan-pendanaan', 'delete', 'Delete');

-- --------------------------------------------------------

--
-- Struktur dari tabel `afliasi`
--

CREATE TABLE `afliasi` (
  `id` int(11) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `afliasi`
--

INSERT INTO `afliasi` (`id`, `nama_produk`, `foto`) VALUES
(2, 'Daihatsu', 'TVIeaPIEvsQ-AN4qQemTE6K9n2ltbz7J.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `agenda_pendanaan`
--

CREATE TABLE `agenda_pendanaan` (
  `id` int(11) NOT NULL,
  `pendanaan_id` int(11) NOT NULL,
  `nama_agenda` varchar(255) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `agenda_pendanaan`
--

INSERT INTO `agenda_pendanaan` (`id`, `pendanaan_id`, `nama_agenda`, `tanggal`) VALUES
(28, 37, 'Pendanaan Membangun Masjid', '2022-11-18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `amanah_pendanaan`
--

CREATE TABLE `amanah_pendanaan` (
  `id` int(11) NOT NULL,
  `pendanaan_id` int(11) NOT NULL,
  `amanah` text NOT NULL,
  `flag` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `amanah_pendanaan`
--

INSERT INTO `amanah_pendanaan` (`id`, `pendanaan_id`, `amanah`, `flag`) VALUES
(1, 49, 'Untuk Organisasis', 1),
(4, 49, 'Organisasi', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bank`
--

CREATE TABLE `bank` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bank`
--

INSERT INTO `bank` (`id`, `name`, `logo`) VALUES
(1, 'BNI', 'DPNJTBXxSHSP-XXmhE_sRgPIZCQXb2HS.png'),
(2, 'BRI', 'i2GHYAhttbK1TfU0Or69-1VY32Yq7NxJ.jpg'),
(3, 'BCA', 'vSy4iim5meEH2z5Y5jG7QmhFLu7rz3td.webp'),
(4, 'Mandiri', 'L12Fpo0wV1TvcUlZZF4EsJiG5ewVHkf9.webp'),
(5, 'Cimb Niaga', 'VoqOev0G8q37_IOQBzAHNmFAEAwicAut.jpg'),
(6, 'DANA', 'tL8eA0fJZIKAI-K9GGOomq9_yMg7obxU.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id` int(11) NOT NULL,
  `kategori_berita_id` int(11) NOT NULL,
  `view_count` int(11) DEFAULT NULL,
  `image_summary` text DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id`, `kategori_berita_id`, `view_count`, `image_summary`, `user_id`, `judul`, `slug`, `gambar`, `isi`, `created_at`, `updated_at`) VALUES
(1, 2, 6, NULL, 1, 'Forum Wakaf Produktif Sebut Antusiasme Generasi Milenial Untuk Wakaf Meningkat', 'Forum-Wakaf-Produktif-Sebut-Antusiasme-Generasi-Milenial-Untuk-Wakaf-Meningkat2022-10-27', '9fd09d038621ef70720d1266f6cba81874c3d7a4.jpg', '<p>Antusiasme generasi milenial dalam berwakaf mengalami peningkatan meski di tengah pandemi Covid-19.</p>\r\n<p>Ketua Forum Wakaf Produktif, Bobby P Manulang, mengatakan secara umum penghimpunan wakaf pada tahun mini memang masih mengalami penurunan.<br />', '2022-10-27 14:24:22', '2023-06-21 01:22:33'),
(2, 2, NULL, NULL, 1, 'RI Negara Paling Dermawan, Potensi Wakaf Uang Capai Rp 180 T', 'Forum-Wakaf-Produktif-Sebut-Antusiasme-Generasi-Milenial-Untuk-Wakaf-Meningkat2022-10-27', 'm0j4MQkKfLwForxaKLcQY34sz8jTcySw.jpg', '<p>Kepala Divisi Dana Sosial Syariah Komite Nasional Ekonomi dan Keuangan Syariah (KNEKS) Urip Budiarto mengatakan Indonesia termasuk salah satu negara paling dermawan menurut World Giving Index 2019. Hal itu ditunjukkan dengan tingginya potensi&nbsp;<a h', '2022-10-27 14:24:47', '2022-11-03 09:12:00'),
(3, 2, NULL, NULL, 1, 'Kisah Sedekah: Sepotong Roti Yang Mengantarkan Ke Surga', 'Forum-Wakaf-Produktif-Sebut-Antusiasme-Generasi-Milenial-Untuk-Wakaf-Meningkat2022-10-27', 'e35ZXJXYSJiMqKv3xaR83pUuBv8Tv1wW.jpg', '<p>Alkisah, Abu Musa Al-Asy&rsquo;ari ra. tengah berbaring menunggu malaikat maut menjemputnya. Sembari berzikir, Abu Musa ditemani oleh anaknya yang setia berada di sebelah ayahnya.</p>\r\n<p>Abu Musa lantas berkata kepada anaknya, &ldquo;Apakah kalian mas', '2022-10-27 14:25:41', '2022-11-03 09:11:08'),
(4, 1, 1, NULL, 1, 'test123', 'test1232022-10-27', 'snSHftHwDdmthfNyzmZ9WnC2kEIoYlEX.png', '<p>uwu</p>', '2022-10-27 14:29:17', '2023-06-15 13:31:35'),
(5, 1, NULL, NULL, 1, 'Kejuaraan Balap Motor Piala Gubernur Papua Barat Bergulir, Waterpauw Motivasi Pembalap Tampil Terbaik', 'test1232022-10-27', 'iQ-oi-z7hBglmMP3zjcFVpUfC68h1Mqm.JPG', '<p>MANOKWARI - Kejuaraan Balap Motor Piala Gubernur Papua Barat resmi bergulir. Pembukaan ditandai pengecekan lintasan oleh Penjabat Gubernur Waterpauw, Bupati Manokwari serta forkopimda, Jumat (5/5/2023) berlokasi di sirkuit Drs. Dominggus Mandacan, Distrik Masni.</p>\r\n<p>&nbsp;</p>\r\n<p>Kibaran bendera star oleh Penjabat Ketua TP PKK Papua Barat, Ny. Roma M.P Waterpauw spontan membuka kelas balap yang memacu adrenalin tersebut.</p>\r\n<p>&nbsp;</p>\r\n<p>Penjabat Gubernur Papua Barat, Komjen Pol. (Purn) Drs. Paulus Waterpauw,M.Si mengatakan ini merupakan titik awal penyelenggaraan tahun 2023 dan akan terus ditingkatkan. Disamping itu menjadi upaya kembangkan bakat yang dimiliki talenta muda, untuk dilatih dan dibina sehingga suatu saat pembalap nasional dan internasional muncul dari Papua Barat.</p>\r\n<p>&nbsp;</p>\r\n<p>\"Sama makan nasi, kenapa mereka hebat kita tidak mereka bisa kita harus lebih bisa. Ini persiapan kita hadapi kompetisi kedepan dalam waktu dekat ini PON dan kejurnas akan kita ikuti,\" Ujarnya.</p>\r\n<p>&nbsp;</p>\r\n<p>Dirinya mengingatkan para peserta agar mengedepankan keselamatan disamping mengejar impian sebagai juara.</p>\r\n<p>&nbsp;</p>\r\n<p>\"Saya berharap ade-ade pembalap tetap ingin mencapai cita-cita, tetapi keselamatan dan keamanan menjadi bagian utama yang harus dijaga,\" Harapnya.</p>\r\n<p>&nbsp;</p>\r\n<p>Ketua Ikatan Motor Indonesia (IMI) Papua Barat, Jerry Suila menambahkan event Balap Motor Piala Gubernur Papua Barat di Manokwari terlaksana untuk meningkatkan kembali olahraga yang memacu adrenalin. Karenanya disamping menumbuh kembangkan bakat peserta/pembalap sekaligus menjadi hiburan masyarakat.</p>\r\n<p>&nbsp;</p>\r\n<p>Diharapkan pula event seperti ini akan dilakukan secara berkesinambungan dengan tujuan mencari bibit handal Papua Barat untuk dapat berkompetisi pada gelaran yang lebih besar kedepan.</p>\r\n<p>&nbsp;</p>\r\n<p>\"Kepada pembalap hendaknya junjung tinggi sportifitas sehingga dapat mempertahankan prestasi,\" Tambahnya.</p>\r\n<p>&nbsp;</p>\r\n<p>Hal senada diungkapkan Ketua Panitia, Wendy Adrian. Tujuan gelaran Kejuaraan Balap Motor sebagai wujud realisasi pembinaan prestasi olahraga diseluruh Kabupaten Se- Papua Barat. Berikut sebagai langkah pembinaan atlit Papua Barat cabang olahraga balap motor.</p>\r\n<p>&nbsp;</p>\r\n<p>Peserta yang mengikuti event ini berjumlah 58 peserta dengan jumlah starter 213 berasal dari sejumlah daerah di Tanah Papua dan berlangsung 5 hingga 7 mei 2023.</p>\r\n<p>&nbsp;</p>\r\n<p>Penulis : Givenly Frans</p>', '2022-10-27 14:29:31', '2023-06-21 01:39:29'),
(6, 1, NULL, NULL, 1, 'TEBAR BERKAH BUKA PUASA bersama I-SALAM', 'test123sds2022-10-27', 'UzwdHqgOi3E726RA9C29TjrCNfiy3kNd.JPG', '<p>Ramadhan hampir beranjak ke penghujungnya. Masih tersisa hari-hari penuh keutamaan di bulan penuh berkah ini.</p>\r\n<p><br />Mari memanfaatkan sisa hari-hari mulia ini untuk menebar berkah dan meraih pahala dengan memberi buka puasa kepada sesama.<br /><br />Rasulullah shallallahu \'alaihi wasallam bersabda:<br />\"Siapa saja memberi makan orang yang berpuasa, untuknya pahala seperti orang yang berpuasa tersebut, tanpa mengurangi pahala orang yang berpuasa itu sedikitpun juga.\"<br />(Diriwayatkan oleh At-Tirmidzy, Ibnu Majah, dan Ahmad. Dishahihkan oleh Syekh Al-Albaniy.)<br /><br />Adapun kebutuhan donasi buka puasa kami adalah senilai Rp 150.000.000 (seratus lima puluh juta) untuk 3.200 paket buka puasa.<br /><br />Anda yang ingin berpartisipasi bisa langsung menyalurkannya ke:<br /><br />BSI 7770120246<br />an Yayasan I Salam<br /><br />Konfirmasi ke:<br />08114100721 atau 08124282216<br /><br />____________<br /><br />Yayasan I-Salam</p>', '2022-10-27 14:32:42', '2023-06-21 01:30:52'),
(9, 1, NULL, NULL, 57, 'LOLONGENG BARAKKA, LINO AHERA’ (MERAIH KEBERKAHAN DI DUNIA DAN AKHIRAT)', 'LOLONGENG-BARAKKA,-LINO-AHERA’-(MERAIH-KEBERKAHAN-DI-DUNIA-DAN-AKHIRAT)2023-06-15', '8fd269c0fb71ca88365d1d3a23dc6be5dc2f516a.JPG', '<p>Uduppai manekki&rsquo; sininna umma&rsquo; sellengnge!<br />(mengundang kepada seluruh umat Islam)<br /><br />Hadirilah Tabligh Akbar Ahlussunnah Wal Jamaah Sulselbar ke-14 Kab. Wajo<br /><br />Dengan tema:<br />LOLONGENG BARAKKA, LINO AHERA&rsquo;<br />(MERAIH KEBERKAHAN DI DUNIA DAN AKHIRAT)<br /><br /><br />Insya Allah dilaksanakan pada<br />Sabtu-Ahad, 16-17 Syawal 1444<br />6 &amp; 7 Mei 2023<br />Pukul 09.00-17.30 WITA<br /><br />Bertempat di<br />Islamic Center Al Markaz Al Islami<br />Jl. Poros Sengkang-Soppeng-Bone<br />Peta: https://maps.app.goo.gl/adZBfdMz9wcb4Bh86<br /><br />___________________<br /><br />Materi dan Pembicara:<br /><br />- Hakikat Berkah<br />Ustad Khaidir Muhammad Sunusi<br /><br />- Amalan-Amalan Pembawa Berkah<br />Ustad Dr. Abdul Hakim<br /><br />- Waktu dan Tempat yang Berberkah<br />Ustad Muhammad Abduh<br /><br />- Pribadi yang Membawa Berkah<br />Ustad Lukman Jamal, Lc.<br /><br />- Perdagangan yang Diberkahi<br />Ustad Abdul Qodir, Lc.<br /><br />- Benda-Benda yang Membawa Berkah<br />Ustad Salman Mahmud<br /><br />- Keberkahan dalam Rumah Tangga<br />Ustad Muhammad Sanusi Daris<br /><br />Insya Allah kata sambutan oleh:<br />- Bapak Gubernur Sulawesi Selatan (dalam konfirmasi)<br />- Bapak Bupati Wajo<br /><br />Penyelenggara:<br />- Forum Asatidzah Ahlussunnah Sulselbar<br />- Yayasan Safinatun Najah Wajo<br /><br />Bekerjasama dengan:<br />- Pemerintah Kabupaten Wajo<br />- Takmir Masjid Islamic Center Al Markaz Al Islami Sengkang<br /><br />Didukung oleh:<br />- Pesantren Ahlussunah Wal Jamaah Se-Sulselbar<br />- I-Salam<br />- Markaz Dakwah untuk Bimbingan, Taklim, dan Keamanan Berpikir<br />- Peduli Dakwah<br />- Madrosah Sunnah<br />- Masjid Jannatul Firdaus Official<br />- Hafayu TV<br />- Radio An-Nashihah 88.2 FM<br />- Sanwa Media<br />- Masjid Imam Syafi\'i<br /><br />Siaran langsung audio di:<br />Aplikasi Radio An-Nashihah Saluran 2 (radio.an-nashihah.com/live2)<br /><br />Siaran langsung video di:<br />-&nbsp;<a class=\"x1i10hfl xjbqb8w x6umtig x1b1mbwd xaqea5y xav7gou x9f619 x1ypdohk xt0psk2 xe8uvvx xdj266r x11i5rnm xat24cr x1mh8g0r xexx8yu x4uap5 x18d9i69 xkhd6sd x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz notranslate _a6hd\" tabindex=\"0\" role=\"link\" href=\"https://www.instagram.com/tvannashihah/\">@tvannashihah</a><br />-&nbsp;<a class=\"x1i10hfl xjbqb8w x6umtig x1b1mbwd xaqea5y xav7gou x9f619 x1ypdohk xt0psk2 xe8uvvx xdj266r x11i5rnm xat24cr x1mh8g0r xexx8yu x4uap5 x18d9i69 xkhd6sd x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz notranslate _a6hd\" tabindex=\"0\" role=\"link\" href=\"https://www.instagram.com/dzulqarnainms/\">@dzulqarnainms</a><br />-&nbsp;<a class=\"x1i10hfl xjbqb8w x6umtig x1b1mbwd xaqea5y xav7gou x9f619 x1ypdohk xt0psk2 xe8uvvx xdj266r x11i5rnm xat24cr x1mh8g0r xexx8yu x4uap5 x18d9i69 xkhd6sd x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz notranslate _a6hd\" tabindex=\"0\" role=\"link\" href=\"https://www.instagram.com/masjidjannatulfirdausofficial/\">@masjidjannatulfirdausofficial</a><br />-&nbsp;<a class=\"x1i10hfl xjbqb8w x6umtig x1b1mbwd xaqea5y xav7gou x9f619 x1ypdohk xt0psk2 xe8uvvx xdj266r x11i5rnm xat24cr x1mh8g0r xexx8yu x4uap5 x18d9i69 xkhd6sd x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz notranslate _a6hd\" tabindex=\"0\" role=\"link\" href=\"https://www.instagram.com/hafayutv/\">@hafayutv</a><br />-&nbsp;<a class=\"x1i10hfl xjbqb8w x6umtig x1b1mbwd xaqea5y xav7gou x9f619 x1ypdohk xt0psk2 xe8uvvx xdj266r x11i5rnm xat24cr x1mh8g0r xexx8yu x4uap5 x18d9i69 xkhd6sd x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz notranslate _a6hd\" tabindex=\"0\" role=\"link\" href=\"https://www.instagram.com/sanwamedia/\">@sanwamedia</a><br /><br />Link live clean Youtube:<br />- markazdakwah.or.id/liveclean<br /><br />Kontak informasi:<br />- Ikhwan: Abu Royyan 0816256743<br />- Akhwat: Ummu Muhammad 085386398242<br /><br />Info akomodasi &amp; penginapan:<br />- Abu Jinan 08114499658<br /><br />Info lapak jualan:<br />- Ikhwan: Abu Aqilah 085342582332<br />- Akhwat: Ummu Rifqi 085240008381<br /><br />- Donasi bisa ke:<br />BSI 7229452015 (kode bank 451)<br />a.n. Masjid Imam Syafi\'i<br />Catatan: tambahkan angka 01 di akhir nominal</p>', '2023-06-15 12:32:59', '2023-06-21 01:25:27'),
(10, 2, NULL, NULL, 57, 'Acara Santunan Anak Yatim', 'Acara-Santunan-Anak-Yatim2023-06-25', '6k9HLyGs8Iz2KFJNqvkJPCH8_EXPGmOd.jpg', '<p>Acara Santunan Anak Yatim pada tanggal 15 Mei 2023</p>', '2023-06-25 06:04:25', '2023-07-13 11:28:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hubungi_kami`
--

CREATE TABLE `hubungi_kami` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nomor_hp` varchar(255) NOT NULL,
  `tema_hubungi_kami_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `hubungi_kami`
--

INSERT INTO `hubungi_kami` (`id`, `nama`, `nomor_hp`, `tema_hubungi_kami_id`, `status`, `created_at`, `updated_at`) VALUES
(61, 'tes', '089637384849', 2, 0, '2021-07-24 15:20:45', '2021-07-24 15:20:45'),
(62, 'Faisal', '08114606682', 1, 1, '2021-08-01 05:27:20', '2021-10-15 16:23:36'),
(63, 'erere', '2323232', 2, 1, '2023-03-16 15:26:20', '2023-03-16 15:26:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_pembayaran`
--

CREATE TABLE `jenis_pembayaran` (
  `id` int(11) NOT NULL,
  `nama_jenis` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_pembayaran`
--

INSERT INTO `jenis_pembayaran` (`id`, `nama_jenis`) VALUES
(1, 'Bank'),
(2, 'OVO'),
(3, 'GOPAY'),
(4, 'Alfamart'),
(5, 'Indomaret'),
(6, 'DANA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_berita`
--

CREATE TABLE `kategori_berita` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori_berita`
--

INSERT INTO `kategori_berita` (`id`, `nama`) VALUES
(1, 'Literasi Wakaf'),
(2, 'Wakaf in Action'),
(3, 'Kata Wakif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_pendanaan`
--

CREATE TABLE `kategori_pendanaan` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori_pendanaan`
--

INSERT INTO `kategori_pendanaan` (`id`, `name`) VALUES
(1, 'Perdagangan'),
(2, 'sedekah'),
(3, 'wakaf'),
(4, 'bencana alam'),
(5, 'Belita & Anak Sakit'),
(6, 'Rumah Ibadah'),
(7, 'Bantuan Pendidikan'),
(8, 'Kegiatan Sosial'),
(9, 'Panti Asuhan'),
(10, 'Kemanusiaan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatan_pendanaan`
--

CREATE TABLE `kegiatan_pendanaan` (
  `id` int(11) NOT NULL,
  `pendanaan_id` int(11) NOT NULL,
  `kegiatan` text NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kegiatan_pendanaan`
--

INSERT INTO `kegiatan_pendanaan` (`id`, `pendanaan_id`, `kegiatan`, `foto`) VALUES
(1, 22, '<p>membangun fondasi masjid</p>', 'WMccx7HtJDH70HxASocnerXDGC8fD3IN.jpg'),
(2, 33, '<p>Pembuatan fondasi masjid</p>', 'rioHWt9esTBRtpor0M99lJkLa3uz7wKo.jpg'),
(3, 33, '<p>dajkdkahdhajdkajdahdj</p>', 'kwLQOznRALuR5YurMxxtBMlg1710nlK6.jpeg'),
(4, 48, '<p><strong>SUKABUMIUPDATE.com</strong>&nbsp;-&nbsp;<a href=\"https://www.sukabumiupdate.com/tag/masjid\">Masjid</a>&nbsp;raya Al Jabbar menarik perhatian sehingga masyarakat berbondong-bondong mendatangi masjid yang berada di daerah Gedebage, Kota Bandung.&nbsp;<a href=\"https://www.sukabumiupdate.com/tag/masjid-al-jabbar\">Masjid Al Jabbar</a>&nbsp;yang memiliki desain megah itu diresmikan Gubernur Jawa Barat Ridwan Kamil pada Jumat, 30 Desember 2022.</p>\r\n<p>Tak lama setelah itu, media sosial Ridwan Kamil yang sekaligus sebagai perancang&nbsp;<a href=\"https://www.sukabumiupdate.com/tag/masjid-al-jabbar\">Masjid Al Jabbar</a>&nbsp;tersebut banjir komentar.</p>\r\n<p>Yang menonjol mulai dari yang mempertanyakan lokasinya di Gedebage, hingga biaya pembangunan&nbsp;<a href=\"https://www.sukabumiupdate.com/tag/masjid-al-jabbar\">Masjid Al Jabbar</a>&nbsp;yang disebut-sebut menyedot anggaran provinsi yang tembus Rp 1 triliun.</p>\r\n<p><strong>Cerita awal pembangunan&nbsp;<a href=\"https://www.sukabumiupdate.com/tag/masjid\">Masjid</a>&nbsp;Raya Al Jabbar</strong></p>\r\n<p>Ridwan Kamil sempat menceritakan pemilihan Gedebage tersebut di sela peresmian masjid tersebut pada 30 Desember 2022. Bermula dari pembicaraan panjangnya dengan Ahmad Heryawan tahun 2015, gubernur Jawa Barat kala itu. Emil, sapaan Ridwan Kamil, saat itu masih menjabat sebagai Wali Kota Bandung.</p>\r\n<p><strong>Baca Juga:&nbsp;<a href=\"https://www.sukabumiupdate.com/jawa-barat/111414/datang-ke-cikembar-sukabumi-wagub-jabar-bilang-akan-bangun-3-km-jalan-rusak\">Datang ke Cikembar Sukabumi, Wagub Jabar Bilang akan Bangun 3 Km Jalan Rusak</a></strong></p>\r\n<p>Aher, sapaan Ahmad Heryawan saat itu tengah mencari lokasi untuk membangun masjid provinsi yang selama ini menumpang di&nbsp;<a href=\"https://www.sukabumiupdate.com/tag/masjid\">Masjid</a>&nbsp;Agung yang berada di pinggir Alun-alun Kota Bandung.</p>', '_tSZpzZl1J_hy5iJzIvNKn0WDk5TQYYp.jpg'),
(5, 48, '<p>Memasang genting</p>', 'C7_YK_RHCxNoncKxb82tyVjMgAn_EHB2.jpg'),
(6, 51, '<p>Pembangunan Musholla Al-Kausar dimulai pada tanggal 1 Juni 2023</p>', '81pR01isNM2H06MbU8m-0PxcmaRRbaxv.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kontak`
--

CREATE TABLE `kontak` (
  `id` int(11) NOT NULL,
  `nama_kontak` varchar(255) DEFAULT NULL,
  `nomor_telepon` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kontak`
--

INSERT INTO `kontak` (`id`, `nama_kontak`, `nomor_telepon`) VALUES
(1, 'Sekretariat Jendral', '081322117794'),
(2, 'Keuangan', '0811547227'),
(3, 'Wakaf', '08114606682'),
(4, 'Managemen Aset', '08124282216'),
(5, 'Pusdiklat', '081327660272'),
(6, 'Ekonomi Umat', '0811310979'),
(7, 'Dakwah dan Sosial', '081322117794');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lembaga_penerima`
--

CREATE TABLE `lembaga_penerima` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `flag` int(11) NOT NULL,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `lembaga_penerima`
--

INSERT INTO `lembaga_penerima` (`id`, `nama`, `foto`, `flag`, `deskripsi`) VALUES
(1, 'Bank Muamalat', 'sDmNT-CmDfdzP1k4W3m6R8pu35U87tyL.png', 1, ''),
(2, 'BNI Syariah', '5kEjDfLjnng-SMO-GvzuzcQnpc9aTMrV.jpg', 1, '-'),
(3, 'Bank Mandiri Syariah', '41J40FWGINPkwLGn7EOoMblz80xwxOBC.png', 1, ''),
(4, 'Bank Muamalatt', 'gy0T_kpeOGMvwUA-pcpr-wOyM2ONvGoM.jpeg', 0, 'Bank Muamalatt');

-- --------------------------------------------------------

--
-- Struktur dari tabel `marketing_data_user`
--

CREATE TABLE `marketing_data_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `domisili` varchar(255) DEFAULT NULL,
  `no_rekening` int(11) DEFAULT NULL,
  `no_identitas` varchar(255) DEFAULT NULL,
  `referensi_kerja` varchar(255) DEFAULT NULL,
  `bank_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `marketing_data_user`
--

INSERT INTO `marketing_data_user` (`id`, `nama`, `alamat`, `domisili`, `no_rekening`, `no_identitas`, `referensi_kerja`, `bank_id`, `user_id`) VALUES
(3, 'Budi Admin', 'ponorogo', 'Batu', 12345, '1234', 'banyak', 1, 1),
(4, 'HIHIHI', 'ponorogo', 'batu', 123123123, '123123123', 'kerja', 1, 17),
(5, 'Wildan', 'Ponorogo', 'Batu', 12345678, '123456789564', 'Program', 1, 27),
(6, 'Wildansyah', 'Jalan Trunojoyo no 28', 'Jalan Trunojoyo no 28', 123690875, '351321459632587', '-', 2, 48),
(7, 'nama', 'alamat', 'domisili', 93220, NULL, NULL, 2, 17),
(8, 'Rudi', 'jalan batu', 'malang', 9083248, '094887891798', 'kerja rodi', 3, 52),
(9, 'anma', 'alamt', 'domisili', 92309849, '0982382', 'kerja', 4, 53),
(10, 'Budi Setiawan', 'Jl. Ir Sukarno No.8, Beji, Kec. Junrejo, Kota Batu, Jawa Timur 65315', 'Jl. Ir Sukarno No.8, Beji, Kec. Junrejo, Kota Batu, Jawa Timur 65315', 210009921, '9274128000002', 'CEO Tokopedia', 3, 54);

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `controller` varchar(50) NOT NULL,
  `action` varchar(50) NOT NULL DEFAULT 'index',
  `icon` varchar(50) NOT NULL,
  `order` int(11) NOT NULL DEFAULT 1,
  `parent_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id`, `name`, `controller`, `action`, `icon`, `order`, `parent_id`) VALUES
(1, 'Home', 'site', 'index', 'fa fa-home', 1, NULL),
(2, 'Master', '', 'index', 'fa fa-database', 2, NULL),
(3, 'Menu', 'menu', 'index', 'fa fa-circle-o', 15, 2),
(4, 'Role', 'role', 'index', 'fa fa-circle-o', 16, 2),
(5, 'User', 'user', 'index', 'fa fa-circle-o', 17, 2),
(6, 'Bank', 'bank', 'index', 'fa fa-bank', 12, 2),
(7, 'Kategori Pendanaan', 'kategori-pendanaan', 'index', 'fa fa-align-justify', 13, 2),
(8, 'Data Marketing ', 'marketing-data-user', 'index', 'fa fa-user-secret', 22, NULL),
(9, 'Pembayaran', 'pembayaran', 'index', 'fa fa-money', 23, NULL),
(10, 'Pendanaan', 'pendanaan', 'index', 'fa fa-bank', 24, NULL),
(11, 'Master Status', 'status', 'index', 'fa fa-align-justify', 14, 2),
(12, 'Setting Website', 'setting', 'index', 'fa fa-align-justify', 25, NULL),
(13, 'Partner Pendanaan', 'partner-pendanaan', 'index', 'fa fa-users', 20, NULL),
(14, 'Agenda Pendanaan', 'agenda-pendanaan', 'index', 'fa fa-calendar', 19, NULL),
(15, 'Jenis Pembayaran', 'jenis-pembayaran', 'index', 'fa fa-money', 11, 2),
(16, 'Tema Hubungi Kami', 'tema-hubungi-kami', 'index', 'fa fa-align-justify', 10, 2),
(17, 'Organisasi', 'organisasi', 'index', 'fa fa-group', 9, 2),
(18, 'Lembaga Penerima', 'lembaga-penerima', 'index', 'fa fa-group', 8, 2),
(19, 'Kategori Berita', 'kategori-berita', 'index', 'fa fa-align-justify', 7, 2),
(20, 'Berita', 'berita', 'index', 'fa fa-newspaper-o', 18, NULL),
(21, 'Testimoni', 'testimonials', 'index', 'fa fa-user', 3, NULL),
(22, 'Hubungi Kami', 'hubungi-kami', 'index', 'fa fa-envelope-o', 21, NULL),
(23, 'Slider', 'slides', 'index', 'fa fa-area-chart', 6, 2),
(24, 'Kontak', 'kontak', 'index', 'fa fa-archive', 2, NULL),
(25, 'Kegiatan Pendanaan', 'kegiatan-pendanaan', 'index', 'fa fa-adjust', 5, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id` int(11) NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL,
  `flag` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `notifikasi`
--

INSERT INTO `notifikasi` (`id`, `message`, `date`, `flag`, `user_id`) VALUES
(1, 'Pembayaran dana untuk Pendanaan Sumbangan Diri Telah disetujui', '2021-07-25 12:05:49', 1, 18),
(2, 'Pendanaan Pendanaan 12 Telah selesai', '2021-07-25 12:15:05', 0, 1),
(3, 'Pembayaran dana untuk Pendanaan Sumbangan Diri Telah disetujui', '2021-07-25 14:13:21', 1, 18),
(10, 'Hai nama,Pendanaan Sumbangan Diri Telah di cairkan Pada Tanggal 27 Jul 2021', '2021-07-27 09:51:44', 1, 18),
(11, 'Hai Adi,Pendanaan Sumbangan Diri Telah di cairkan Pada Tanggal 27 Jul 2021', '2021-07-27 09:51:44', 1, 18),
(12, 'Pendanaan Pendanaan Wakaf Telah di Setujui', '2021-07-30 10:08:36', 1, 27),
(13, 'Pembayaran dana untuk Pendanaan Pendanaan Wakaf Telah disetujui', '2021-07-30 10:41:26', 1, 26),
(14, 'Pembayaran dana untuk Pendanaan Pendanaan Wakaf Telah disetujui', '2021-07-30 10:42:41', 1, 26),
(15, 'Pendanaan Pendanaan Wakaf Telah selesai', '2021-07-30 10:47:55', 1, 26),
(16, 'Pendanaan Pendanaan Wakaf Telah selesai', '2021-07-30 10:47:55', 1, 26),
(17, 'Hai Iannn,Pendanaan Pendanaan Wakaf Telah di cairkan Pada Tanggal 30 Jul 2021', '2021-07-30 10:48:06', 1, 26),
(18, 'Hai Hamba allah,Pendanaan Pendanaan Wakaf Telah di cairkan Pada Tanggal 30 Jul 2021', '2021-07-30 10:48:06', 1, 26),
(19, 'Pendanaan Pendanaan Wakaf Telah selesai', '2021-07-30 11:10:40', 1, 26),
(20, 'Pendanaan Pendanaan Wakaf Telah selesai', '2021-07-30 11:10:40', 1, 26),
(21, 'Pendanaan Sumbangan Fahru Telah di Setujui', '2021-07-30 11:16:16', 1, 17),
(22, 'Pendanaan Pendanaan Wakaf Telah selesai', '2021-07-30 11:16:51', 1, 26),
(23, 'Pendanaan Pendanaan Wakaf Telah selesai', '2021-07-30 11:16:51', 1, 26),
(24, 'Pendanaan  wakaf jalan Diponegoro Telah di Setujui', '2021-07-30 11:25:26', 1, 27),
(25, 'Pendanaan  wakaf jalan Diponegoro Telah selesai', '2021-07-30 11:29:23', 1, 26),
(26, 'Pendanaan  wakaf jalan Diponegoro Telah selesai', '2021-07-30 11:29:23', 1, 26),
(28, 'Pendanaan Pembangunan Masjid dan Mushola di jalan Merauke Telah di Setujui', '2021-08-02 12:06:17', 1, 48),
(29, 'Pembayaran dana untuk Pendanaan Pembangunan Masjid dan Mushola di jalan Merauke Telah disetujui', '2021-08-02 12:14:14', 1, 49),
(30, 'Pendanaan Pembangunan Masjid dan Mushola di jalan Merauke Telah selesai', '2021-08-02 12:18:02', 1, 49),
(31, 'Pendanaan Pembangunan Masjid dan Mushola di jalan Merauke Telah selesai', '2021-08-02 12:18:02', 1, 49),
(32, 'Pendanaan Pembangunan Masjid dan Mushola di jalan Merauke Telah selesai', '2021-08-02 12:25:28', 1, 49),
(33, 'Pendanaan Pembangunan Masjid dan Mushola di jalan Merauke Telah selesai', '2021-08-02 12:25:28', 1, 49),
(34, 'Pendanaan Pembangunan Masjid dan Mushola di jalan Merauke Telah selesai', '2021-08-02 12:25:28', 1, 48),
(35, 'Hai Wildan,Pendanaan Pembangunan Masjid dan Mushola di jalan Merauke Telah di cairkan Pada Tanggal 02 Ags 2021', '2021-08-02 12:26:02', 1, 49),
(36, 'Hai Wildan,Pendanaan Pembangunan Masjid dan Mushola di jalan Merauke Telah di cairkan Pada Tanggal 02 Ags 2021', '2021-08-02 12:26:02', 1, 49),
(37, 'Pendanaan Pembangunan Masjid dan Mushola di jalan Merauke Telah anda Cairkan', '2021-08-02 12:26:02', 1, 48),
(38, 'Pembayaran dana untuk Pendanaan Sumbangan Fahru Telah disetujui', '2021-08-03 13:10:37', 1, 51),
(39, 'Pendanaan Pendanaan untuk Korban Bencana Banjir Telah di Setujui', '2021-08-03 14:37:56', 1, 52),
(40, 'Pembayaran dana untuk Pendanaan Pendanaan untuk Korban Bencana Banjir Telah disetujui', '2021-08-03 14:55:20', 1, 51),
(41, 'Pendanaan Pendanaan untuk Korban Bencana Banjir Telah selesai', '2021-08-03 15:06:02', 1, 51),
(42, 'Pendanaan Pendanaan untuk Korban Bencana Banjir Telah selesai', '2021-08-03 15:06:02', 1, 52),
(43, 'Hai nama,Pendanaan Pendanaan untuk Korban Bencana Banjir Telah di cairkan Pada Tanggal 03 Ags 2021', '2021-08-03 15:06:52', 1, 51),
(44, 'Pendanaan Pendanaan untuk Korban Bencana Banjir Telah anda Cairkan', '2021-08-03 15:06:52', 1, 52),
(45, 'Pendanaan tes dana Telah di Setujui', '2021-08-03 15:20:23', 1, 53),
(46, 'Pendanaan Sumbangan Fahru Telah selesai', '2021-08-03 15:20:38', 1, 30),
(47, 'Pendanaan Sumbangan Fahru Telah selesai', '2021-08-03 15:20:38', 1, 51),
(48, 'Pendanaan Sumbangan Fahru Telah selesai', '2021-08-03 15:20:38', 1, 17),
(49, 'Hai hadudu,Pendanaan Sumbangan Fahru Telah di cairkan Pada Tanggal 03 Ags 2021', '2021-08-03 15:20:46', 1, 30),
(50, 'Hai wildan,Pendanaan Sumbangan Fahru Telah di cairkan Pada Tanggal 03 Ags 2021', '2021-08-03 15:20:46', 1, 51),
(51, 'Pendanaan Sumbangan Fahru Telah anda Cairkan', '2021-08-03 15:20:46', 1, 17),
(52, 'Pembayaran dana untuk Pendanaan tes dana Telah disetujui', '2021-08-03 15:21:48', 1, 51),
(53, 'Hai Iannn,Pendanaan Pendanaan Wakaf Telah di cairkan Pada Tanggal 05 Ags 2021', '2021-08-05 13:00:05', 1, 26),
(54, 'Hai Hamba allah,Pendanaan Pendanaan Wakaf Telah di cairkan Pada Tanggal 05 Ags 2021', '2021-08-05 13:00:05', 1, 26),
(55, 'Pendanaan Pendanaan Wakaf Telah anda Cairkan', '2021-08-05 13:00:05', 1, 27),
(56, 'Hai Iannn,Pendanaan Pendanaan Wakaf Telah di cairkan Pada Tanggal 05 Ags 2021', '2021-08-05 13:03:36', 1, 26),
(57, 'Hai Hamba allah,Pendanaan Pendanaan Wakaf Telah di cairkan Pada Tanggal 05 Ags 2021', '2021-08-05 13:03:36', 1, 26),
(58, 'Pendanaan Pendanaan Wakaf Telah anda Cairkan', '2021-08-05 13:03:36', 1, 27),
(59, 'Hai Iannn,Pendanaan Pendanaan Wakaf Telah di cairkan Pada Tanggal 05 Ags 2021', '2021-08-05 13:05:00', 1, 26),
(60, 'Hai Hamba allah,Pendanaan Pendanaan Wakaf Telah di cairkan Pada Tanggal 05 Ags 2021', '2021-08-05 13:05:00', 1, 26),
(61, 'Pendanaan Pendanaan Wakaf Telah anda Cairkan', '2021-08-05 13:05:00', 1, 27),
(62, 'Hai Iannn,Pendanaan Pendanaan Wakaf Telah di cairkan Pada Tanggal 05 Ags 2021', '2021-08-05 13:10:57', 1, 26),
(63, 'Hai Hamba allah,Pendanaan Pendanaan Wakaf Telah di cairkan Pada Tanggal 05 Ags 2021', '2021-08-05 13:10:57', 1, 26),
(64, 'Pendanaan Pendanaan Wakaf Telah anda Cairkan', '2021-08-05 13:10:57', 1, 27),
(65, 'Hai Iannn,Pendanaan Pendanaan Wakaf Telah di cairkan Pada Tanggal 05 Ags 2021', '2021-08-05 13:13:10', 1, 26),
(66, 'Hai Hamba allah,Pendanaan Pendanaan Wakaf Telah di cairkan Pada Tanggal 05 Ags 2021', '2021-08-05 13:13:10', 1, 26),
(67, 'Pendanaan Pendanaan Wakaf Telah anda Cairkan', '2021-08-05 13:13:10', 1, 27),
(68, 'Hai Iannn,Pendanaan Pendanaan Wakaf Telah di cairkan Pada Tanggal 05 Ags 2021', '2021-08-05 13:15:41', 1, 26),
(69, 'Hai Hamba allah,Pendanaan Pendanaan Wakaf Telah di cairkan Pada Tanggal 05 Ags 2021', '2021-08-05 13:15:41', 1, 26),
(70, 'Pendanaan Pendanaan Wakaf Telah anda Cairkan', '2021-08-05 13:15:41', 1, 27),
(71, 'Hai Iannn,Pendanaan Pendanaan Wakaf Telah di cairkan Pada Tanggal 05 Ags 2021', '2021-08-05 13:16:03', 1, 26),
(72, 'Hai Hamba allah,Pendanaan Pendanaan Wakaf Telah di cairkan Pada Tanggal 05 Ags 2021', '2021-08-05 13:16:03', 1, 26),
(73, 'Pendanaan Pendanaan Wakaf Telah anda Cairkan', '2021-08-05 13:16:03', 1, 27),
(74, 'Hai Iannn,Pendanaan Pendanaan Wakaf Telah di cairkan Pada Tanggal 05 Ags 2021', '2021-08-05 13:19:10', 1, 26),
(75, 'Hai Hamba allah,Pendanaan Pendanaan Wakaf Telah di cairkan Pada Tanggal 05 Ags 2021', '2021-08-05 13:19:10', 1, 26),
(76, 'Pendanaan Pendanaan Wakaf Telah anda Cairkan', '2021-08-05 13:19:10', 1, 27),
(77, 'Hai Iannn,Pendanaan Pendanaan Wakaf Telah di cairkan Pada Tanggal 05 Ags 2021', '2021-08-05 13:22:41', 1, 26),
(78, 'Hai Hamba allah,Pendanaan Pendanaan Wakaf Telah di cairkan Pada Tanggal 05 Ags 2021', '2021-08-05 13:22:41', 1, 26),
(79, 'Pendanaan Pendanaan Wakaf Telah anda Cairkan', '2021-08-05 13:22:41', 1, 27),
(80, 'Hai Iannn,Pendanaan Pendanaan Wakaf Telah di cairkan Pada Tanggal 05 Ags 2021', '2021-08-05 13:25:24', 1, 26),
(81, 'Hai Hamba allah,Pendanaan Pendanaan Wakaf Telah di cairkan Pada Tanggal 05 Ags 2021', '2021-08-05 13:25:24', 1, 26),
(82, 'Pendanaan Pendanaan Wakaf Telah anda Cairkan', '2021-08-05 13:25:24', 1, 27),
(83, 'Hai Iannn,Pendanaan Pendanaan Wakaf Telah di cairkan Pada Tanggal 05 Ags 2021', '2021-08-05 13:28:29', 1, 26),
(84, 'Hai Hamba allah,Pendanaan Pendanaan Wakaf Telah di cairkan Pada Tanggal 05 Ags 2021', '2021-08-05 13:28:29', 1, 26),
(85, 'Pendanaan Pendanaan Wakaf Telah anda Cairkan', '2021-08-05 13:28:29', 1, 27),
(86, 'Hai Iannn,Pendanaan Pendanaan Wakaf Telah di cairkan Pada Tanggal 05 Ags 2021', '2021-08-05 13:29:26', 1, 26),
(87, 'Hai Hamba allah,Pendanaan Pendanaan Wakaf Telah di cairkan Pada Tanggal 05 Ags 2021', '2021-08-05 13:29:26', 1, 26),
(88, 'Pendanaan Pendanaan Wakaf Telah anda Cairkan', '2021-08-05 13:29:26', 1, 27),
(89, 'Pembayaran dana untuk Pendanaan tes dana Telah disetujui', '2021-08-07 16:57:35', 1, 49),
(90, 'Pendanaan tes dana Telah selesai', '2021-08-07 16:58:23', 1, 51),
(91, 'Pendanaan tes dana Telah selesai', '2021-08-07 16:58:23', 1, 49),
(92, 'Pendanaan tes dana Telah selesai', '2021-08-07 16:58:23', 1, 53),
(93, 'Pendanaan Bantuan untuk Warga Kurang Mampu di Desa SukaMaju Telah di Setujui', '2021-08-23 15:06:31', 1, 54),
(94, 'Pembayaran dana untuk Pendanaan Bantuan untuk Warga Kurang Mampu di Desa SukaMaju Telah disetujui', '2021-08-23 17:19:53', 1, 49),
(95, 'Pendanaan Bantuan untuk Warga Kurang Mampu di Desa SukaMaju Telah selesai', '2021-08-23 17:20:41', 1, 49),
(96, 'Pendanaan Bantuan untuk Warga Kurang Mampu di Desa SukaMaju Telah selesai', '2021-08-23 17:20:41', 1, 54),
(97, 'Hai Hamba Allah,Pendanaan Bantuan untuk Warga Kurang Mampu di Desa SukaMaju Telah di cairkan Pada Tanggal 23 Ags 2021', '2021-08-23 17:21:06', 1, 49),
(98, 'Pendanaan Bantuan untuk Warga Kurang Mampu di Desa SukaMaju Telah anda Cairkan', '2021-08-23 17:21:06', 1, 54),
(99, 'Hai Hamba Allah,Pendanaan Bantuan untuk Warga Kurang Mampu di Desa SukaMaju Telah di cairkan Pada Tanggal 23 Ags 2021', '2021-08-23 17:26:38', 1, 49),
(100, 'Pendanaan Bantuan untuk Warga Kurang Mampu di Desa SukaMaju Telah anda Cairkan', '2021-08-23 17:26:38', 1, 54),
(101, 'Hai Hamba Allah,Pendanaan Bantuan untuk Warga Kurang Mampu di Desa SukaMaju Telah di cairkan Pada Tanggal 23 Ags 2021', '2021-08-23 17:36:09', 1, 49),
(102, 'Pendanaan Bantuan untuk Warga Kurang Mampu di Desa SukaMaju Telah anda Cairkan', '2021-08-23 17:36:09', 1, 54),
(103, 'Hai Hamba Allah,Pendanaan Bantuan untuk Warga Kurang Mampu di Desa SukaMaju Telah di cairkan Pada Tanggal 23 Ags 2021', '2021-08-23 17:37:02', 1, 49),
(104, 'Pendanaan Bantuan untuk Warga Kurang Mampu di Desa SukaMaju Telah anda Cairkan', '2021-08-23 17:37:02', 1, 54),
(105, 'Pendanaan Pendanaan Percobaan Telah di Setujui', '2021-09-17 17:11:28', 1, 17),
(106, 'Pembayaran dana untuk Pendanaan Pendanaan Percobaan Telah disetujui', '2021-09-17 17:13:22', 1, 49),
(107, 'Pendanaan Pendanaan Percobaan Telah selesai', '2021-09-19 11:04:30', 1, 49),
(108, 'Pendanaan Pendanaan Percobaan Telah selesai', '2021-09-19 11:04:30', 1, 17),
(109, 'Hai Hamba allah,Pendanaan Pendanaan Percobaan Telah di cairkan Pada Tanggal 19 Sep 2021', '2021-09-19 11:04:51', 1, 49),
(110, 'Pendanaan Pendanaan Percobaan Telah anda Cairkan', '2021-09-19 11:04:51', 1, 17),
(111, 'Pendanaan Pendanaan untuk Membangun Masjid Telah selesai', '2021-09-30 10:00:49', 1, 1),
(112, 'Pendanaan Pendanaan Percobaan 1 Telah di Setujui', '2021-09-30 10:35:12', 1, 17),
(113, 'Pembayaran dana untuk Pendanaan Pendanaan Membangun Masjid Telah disetujui', '2021-09-30 11:09:41', 1, 49),
(114, 'Pendanaan Pendanaan Membangun Masjid Telah selesai', '2021-09-30 11:09:48', 1, 49),
(115, 'Pendanaan Pendanaan Membangun Masjid Telah selesai', '2021-09-30 11:09:48', 1, 17),
(116, 'Pendanaan Pendanaan Membangun Masjid Telah di cairkan', '2021-09-30 11:10:28', 1, 49),
(117, 'Pendanaan Pendanaan Membangun Masjid Telah Anda Cairkan', '2021-09-30 11:10:31', 1, 17),
(118, 'Pendanaan Pendanaan untuk Membangun Masjid Telah Anda Cairkan', '2021-09-30 14:56:41', 1, 1),
(119, 'Pendanaan Testing pendanaan Telah di Setujui', '2021-10-04 06:40:51', 1, 17),
(120, 'Pembayaran dana untuk Pendanaan Testing pendanaan Telah disetujui', '2021-10-04 06:42:17', 1, 49),
(121, 'Pendanaan Testing pendanaan Telah selesai', '2021-10-04 06:43:20', 1, 49),
(122, 'Pendanaan Testing pendanaan Telah selesai', '2021-10-04 06:43:20', 1, 17),
(123, 'Hai Wildan,Pendanaan Testing pendanaan Telah di cairkan Pada Tanggal 04 Okt 2021', '2021-10-04 06:43:40', 1, 49),
(124, 'Pendanaan Testing pendanaan Telah anda Cairkan', '2021-10-04 06:43:40', 1, 17),
(125, 'Pendanaan Pendanaan Untuk Masjid Telah di Setujui', '2021-10-04 06:51:30', 1, 17),
(126, 'Pembayaran dana untuk Pendanaan Pendanaan Untuk Masjid Telah disetujui', '2021-10-04 07:36:38', 1, 49),
(127, 'Pendanaan Pendanaan Untuk Masjid Telah selesai', '2021-10-04 07:38:27', 1, 49),
(128, 'Pendanaan Pendanaan Untuk Masjid Telah selesai', '2021-10-04 07:38:27', 1, 17),
(129, 'Hai Hamba Allah,Pendanaan Pendanaan Untuk Masjid Telah di cairkan Pada Tanggal 04 Okt 2021', '2021-10-04 07:39:08', 1, 49),
(130, 'Pendanaan Pendanaan Untuk Masjid Telah anda Cairkan', '2021-10-04 07:39:08', 1, 17),
(131, 'Pendanaan Pendanaan Untuk Masjid Telah di Setujui', '2021-10-04 07:44:34', 1, 17),
(132, 'Pendanaan Pendanaan Untuk Masjid Telah selesai', '2021-10-04 07:44:40', 1, 49),
(133, 'Pendanaan Pendanaan Untuk Masjid Telah selesai', '2021-10-04 07:44:40', 1, 17),
(134, 'Hai Hamba Allah,Pendanaan Pendanaan Untuk Masjid Telah di cairkan Pada Tanggal 04 Okt 2021', '2021-10-04 07:45:09', 1, 49),
(135, 'Pendanaan Pendanaan Untuk Masjid Telah anda Cairkan', '2021-10-04 07:45:09', 1, 17),
(136, 'Pendanaan Fasd Telah di Setujui', '2021-10-05 09:45:13', 1, 17),
(137, 'Pendanaan Pembangunan Masjid Telah di Setujui', '2021-10-08 20:28:51', 1, 1),
(138, 'Pendanaan Pembangunan Masjid Telah di Setujui', '2021-10-08 21:09:08', 1, 1),
(139, 'Pendanaan Pembangunan Masjid Telah selesai', '2021-10-08 21:09:21', 1, 1),
(140, 'Pembayaran dana untuk Pendanaan Fasd Telah disetujui', '2021-10-08 21:24:39', 1, 30),
(141, 'Pembayaran dana untuk Pendanaan Pendanaan Masjid Telah disetujui', '2021-10-16 08:21:21', 1, 49),
(142, 'Pendanaan Fahru Nyumbang Telah di Setujui', '2021-10-18 19:59:12', 1, 17),
(143, 'Pembayaran dana untuk Pendanaan Pembangunan Masjid Telah disetujui', '2021-10-18 20:10:05', 1, 49),
(144, 'Pembayaran dana untuk Pendanaan Pembangunan Masjid Telah disetujui', '2021-10-18 20:34:06', 1, 49),
(145, 'Pendanaan Testing Pendanaan Telah di Setujui', '2021-10-20 15:22:26', 1, 1),
(146, 'Pembayaran dana untuk Pendanaan Testing Pendanaan Telah disetujui', '2021-10-20 15:32:32', 1, 17),
(147, 'Pembayaran dana untuk Pendanaan Testing Pendanaan Telah disetujui', '2021-10-20 15:32:54', 1, 17),
(148, ' Berita Baru ', '2023-01-16 15:09:52', 1, 30),
(149, ' Berita Baru ', '2023-02-02 14:54:06', 1, 30),
(150, 'Pendanaan Pendanaan Pembangunan Masjid Telah di Setujui', '2023-06-13 18:20:51', 1, 17),
(151, 'Pendanaan Wakaf Mushaf Al-Qur\'an Telah di Setujui', '2023-06-13 18:21:07', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `organisasi`
--

CREATE TABLE `organisasi` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `quotes` text DEFAULT NULL,
  `flag` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `organisasi`
--

INSERT INTO `organisasi` (`id`, `nama`, `jabatan`, `foto`, `quotes`, `flag`) VALUES
(1, 'USTADZ DZULQARNAIN MUHAMMAD SUNUSI', 'Direktur', 'ulaD1nXqqVyh1T6U-Zj3AmCOvNyui3Xz.png', '-', 1),
(2, 'LUKMAN HAKIM', 'WAKIL DIREKTUR', '2tEnijVPZfY6JnIJonqsCmRE9qdqWKzF.png', '-', 1),
(3, 'USTADZ ABU AHMAD ROKHMAD RIYADI, SPD', 'KETUA DEPARTEMEN PUSDIKLAT', 'bJeTJ5vgoRx0v2KsmKJenpEXGBuqM7-g.png', '-\r\n', 1),
(4, 'USTADZ ABDUL MU’THIY ALMAIDANY', 'KETUA DEPARTEMEN DAKWAH SOSIAL', '2llY6ZhnO8_qaPD-vpAZLWS5ikuMZFh5.png', '-', 1),
(5, 'RISWAN ILYAS', 'KETUA DEPARTEMEN MANAJEMEN ASET', '2DkBnoQ6QPjhKoXy8PV64V-PnhvQ8DrV.png', '-', 1),
(6, 'SETIA BUDI YUNARTO', 'KETUA DEPARTEMEN EKONOMI UMMAT', '4XZmZYVVV7CBUrv2ej59Du__M6MFR7p_.png', '-', 1),
(7, 'ANDRI MAADSA', 'SEKRETARIS JENDERAL', 'n6KDNdvabFy12rQIAmYM81c-GbdqQB9X.png', '-', 1),
(8, 'FAISAL RIZA BASALAMAH', 'KETUA DEPARTEMEN WAKAF', 'J5J1R_DfRDyTTM865ah5cshEpV8amNhE.png', '-', 1),
(9, 'USTADZ MUHAMMAD HAMID ALWI', 'KETUA DEPARTEMEN TEKNOLOGI INFORMASI', 'XODm9554u-giLr3rz7rxxqXgv56mcaxb.png', '-', 1),
(10, 'ANDI NASRULLAH', 'WEBMASTER', 'AC24W8py-bl9kIoBUHTukPTA_TE1g9G7.png', '-', 1),
(11, 'SUWARDI', 'ADMIN', '88gWjpCaGktaPzvLxXQD3eCjiayfX4sv.png', '-', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `otp`
--

CREATE TABLE `otp` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `kode_otp` int(11) NOT NULL,
  `is_used` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `otp`
--

INSERT INTO `otp` (`id`, `id_user`, `kode_otp`, `is_used`, `created_at`, `updated_at`) VALUES
(3, 10, 6891, 0, '2021-07-18 19:29:47', '2021-07-18 19:29:47'),
(4, 11, 3025, 1, '2021-07-18 16:08:54', '2021-07-18 16:08:54'),
(7, 14, 8904, 0, '2021-07-18 19:03:08', '2021-07-18 19:03:08'),
(10, 17, 9943, 0, '2021-07-18 20:24:28', '2021-07-18 20:24:01'),
(11, 18, 9580, 1, '2021-07-22 15:29:23', '2021-07-22 15:29:23'),
(19, 26, 7325, 1, '2021-07-30 02:59:28', '2021-07-30 02:59:28'),
(20, 27, 1128, 1, '2021-07-30 03:00:13', '2021-07-30 03:00:13'),
(23, 30, 3318, 1, '2021-07-30 04:37:15', '2021-07-30 04:37:15'),
(41, 48, 3093, 1, '2021-08-02 04:38:15', '2021-08-02 04:38:15'),
(42, 49, 5150, 1, '2021-08-02 05:12:17', '2021-08-02 05:12:17'),
(43, 51, 6326, 1, '2021-08-03 05:43:44', '2021-08-03 05:43:44'),
(44, 52, 4150, 1, '2021-08-03 06:15:51', '2021-08-03 06:15:51'),
(45, 53, 7617, 1, '2021-08-03 08:18:00', '2021-08-03 08:18:00'),
(46, 54, 7790, 1, '2021-08-23 03:31:07', '2021-08-23 03:31:07'),
(47, 55, 3898, 1, '2021-08-23 07:58:22', '2021-08-23 07:58:22'),
(48, 93, 3093, 1, '2022-11-16 06:56:22', '2022-11-16 06:56:22'),
(49, 95, 9940, 1, '2022-12-12 07:53:19', '2022-12-12 07:53:19'),
(50, 96, 7807, 1, '2022-12-13 15:58:14', '2022-12-13 15:58:14'),
(51, 97, 8180, 0, '2023-02-02 02:15:59', '2023-02-02 02:15:59'),
(52, 98, 2730, 1, '2023-06-14 03:27:39', '2023-06-14 03:27:39'),
(53, 99, 4807, 0, '2023-06-14 03:34:30', '2023-06-14 03:34:30'),
(54, 100, 4161, 0, '2023-06-14 10:17:21', '2023-06-14 10:17:21'),
(55, 101, 2895, 0, '2023-06-14 10:18:05', '2023-06-14 10:18:05'),
(56, 102, 9647, 0, '2023-06-14 10:54:44', '2023-06-14 10:54:44'),
(57, 103, 8376, 0, '2023-06-14 11:00:27', '2023-06-14 11:00:27'),
(58, 104, 7732, 0, '2023-06-14 11:03:25', '2023-06-14 11:03:25'),
(59, 105, 9362, 0, '2023-06-14 11:23:55', '2023-06-14 11:23:55'),
(60, 106, 7037, 0, '2023-06-14 11:41:36', '2023-06-14 11:41:36'),
(61, 107, 9825, 0, '2023-06-14 11:43:21', '2023-06-14 11:43:21'),
(62, 108, 2137, 0, '2023-06-14 11:46:12', '2023-06-14 11:46:12'),
(63, 109, 1604, 0, '2023-06-14 11:46:29', '2023-06-14 11:46:29'),
(64, 110, 5795, 0, '2023-06-14 11:52:07', '2023-06-14 11:52:07'),
(65, 111, 1613, 0, '2023-06-14 12:06:10', '2023-06-14 12:06:10'),
(66, 112, 5791, 0, '2023-06-14 12:32:33', '2023-06-14 12:32:33'),
(67, 113, 4663, 0, '2023-06-14 12:33:46', '2023-06-14 12:33:46'),
(68, 114, 7164, 0, '2023-06-14 12:58:54', '2023-06-14 12:58:54'),
(69, 115, 7649, 0, '2023-06-14 12:59:54', '2023-06-14 12:59:54'),
(70, 116, 5943, 0, '2023-06-14 13:02:54', '2023-06-14 13:02:54'),
(71, 117, 6199, 0, '2023-06-14 13:06:28', '2023-06-14 13:06:28'),
(72, 118, 9358, 0, '2023-06-14 13:24:48', '2023-06-14 13:24:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `partner_pendanaan`
--

CREATE TABLE `partner_pendanaan` (
  `id` int(11) NOT NULL,
  `nama_partner` varchar(255) NOT NULL,
  `pendanaan_id` int(11) NOT NULL,
  `foto_ktp_partner` varchar(255) DEFAULT NULL,
  `no_hp` varchar(20) CHARACTER SET utf8mb4 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `partner_pendanaan`
--

INSERT INTO `partner_pendanaan` (`id`, `nama_partner`, `pendanaan_id`, `foto_ktp_partner`, `no_hp`) VALUES
(8, 'Yasir Nadem', 21, 'partner-pendanaan/2021-08-02/20210802_110758e6cb24ac07067a72a8d718dbafd5f5261c.jpg', ''),
(9, 'Agus', 23, 'partner-pendanaan/2021-08-03/20210803_87277d4685e66d0f85b9a13ed48c9253d5bc8fb0.jpg', ''),
(10, 'Budi', 23, 'partner-pendanaan/2021-08-03/20210803_f5e707278c16421e72717fe65f23b9394e92fed5.jpg', ''),
(11, 'partner', 25, 'partner-pendanaan/2021-08-03/20210803_8ba0e7e020675b1d43914b4aaaf68b892b52e974.jpg', ''),
(12, 'Yusuf', 26, 'partner-pendanaan/2021-08-23/20210823_5d79cd9c687577795a2349d2470ab268da2af699.jpg', ''),
(13, 'Partner 1', 27, 'partner-pendanaan/2021-09-17/20210917_70ac2ffcf11f24d59360e0d4cefb1816a96053a4.jpg', ''),
(14, 'Iankco', 28, 'partner-pendanaan/2021-09-19/20210919_7681487a700babdec731c9f339b33ab5abf52195.jpg', ''),
(15, 'Partner 1', 29, 'partner-pendanaan/2021-10-04/20211004_93ac1946cb917abc4735cdd1ee5fb7e3c6e164de.jpg', ''),
(16, 'Partner 1', 30, 'partner-pendanaan/2021-10-04/20211004_7c8b72146cc7eb1761d462eb86287a01d21b5e7a.jpg', ''),
(17, 'Super Dede', 31, 'partner-pendanaan/2021-10-04/20211004_c5e06d5e3fa1a0192d71ba9ae3c97385a282bf44.jpg', ''),
(18, 'FF', 32, 'partner-pendanaan/2021-10-04/20211004_e5d9a6fc5f64988cb4be455685d209cd662a8be5.png', ''),
(19, 'Fahru CS', 33, 'partner-pendanaan/2021-10-04/20211004_34d293d054e9352f321eee9ae3e52d6e47f91d03.png', ''),
(21, 'Agenda 1', 35, 'partner-pendanaan/2021-10-05/20211005_a57fa5b1c57271cf5f39945e88cd09c71edeff81.jpg', ''),
(22, 'Fahru ', 36, 'partner-pendanaan/2021-10-05/20211005_0abbb1561a4859fd97aad91e2b4a1eb9426b28b8.jpg', ''),
(24, 'ZUKY', 35, 'cQXj54ttYkeHchd1K0M8qaaXYe97jB1f.jpg', ''),
(25, 'Dani', 48, 'k-3CfC_q3NPPqk-Bv08fRuNYGdPN0i_m.jpg', '798374983749'),
(26, 'dani2', 48, '3PKD74wdaFVbmPBpQZMZ62zKO7CwNMs9.png', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `kode_transaksi` varchar(255) DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  `nominal` int(11) NOT NULL,
  `jumlah_lembaran` int(11) NOT NULL DEFAULT 0,
  `keterangan` varchar(255) DEFAULT NULL,
  `amanah_pendanaan` varchar(255) DEFAULT NULL,
  `jenis` varchar(255) DEFAULT NULL,
  `jenis_pembayaran_id` varchar(255) DEFAULT NULL,
  `qr_code` varchar(255) DEFAULT NULL,
  `link_qr` varchar(255) DEFAULT NULL,
  `bukti_transaksi` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `pendanaan_id` int(11) NOT NULL,
  `tanggal_konfirmasi` datetime DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `tanggal_upload_bukti` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `status_id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `read` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `kode_transaksi`, `nama`, `nominal`, `jumlah_lembaran`, `keterangan`, `amanah_pendanaan`, `jenis`, `jenis_pembayaran_id`, `qr_code`, `link_qr`, `bukti_transaksi`, `user_id`, `pendanaan_id`, `tanggal_konfirmasi`, `code`, `tanggal_upload_bukti`, `created_at`, `updated_at`, `status_id`, `email`, `read`) VALUES
(81, '505931818', 'Dani', 600000, 0, NULL, 'undefined', 'wakaf', 'bank_transfer', NULL, NULL, NULL, 57, 49, '2023-07-10 20:38:00', '7626162c-b4e3-4592-8eb5-547913b07c92', NULL, '2023-07-10 13:38:00', '2023-07-10 13:38:00', 6, 'dani@gmail.com', 1),
(89, '865622132', 'Dani', 100000, 0, NULL, 'undefined', 'wakaf', 'bank_transfer', NULL, NULL, NULL, 57, 48, '2023-07-10 20:38:01', 'f7a2b38a-e65f-47c7-a6ce-99919a7dc7e4', NULL, '2023-07-10 13:38:01', '2023-07-10 13:38:01', 6, 'dani@gmail.com', 1),
(90, '1439186459', 'Dani', 100000, 0, NULL, 'undefined', 'wakaf', 'bank_transfer', NULL, NULL, NULL, 57, 33, '2023-07-10 20:38:01', '07db8b0a-7c05-4622-92bd-7611d787ae12', NULL, '2023-07-10 13:38:01', '2023-07-10 13:38:01', 6, 'dani@gmail.com', 2),
(94, '2029538808', 'Dani', 10000, 0, NULL, 'undefined', 'wakaf', 'bank_transfer', NULL, NULL, NULL, 57, 48, '2023-07-10 20:38:01', '348dc162-e0b6-4bcb-a8dd-b8d039414789', NULL, '2023-07-10 13:38:01', '2023-07-10 13:38:01', 6, 'dani@gmail.com', 1),
(95, '505665391', 'Coba', 100000, 0, NULL, 'undefined', 'wakaf', 'bank_transfer', NULL, NULL, NULL, 59, 48, '2023-06-24 20:03:25', 'b4f0bd8b-f1de-4eda-88c4-2affaef36877', NULL, '2023-06-24 13:03:25', '2023-06-24 13:03:25', 6, 'coba@gmail.com', 1),
(96, '1021801544', 'Coba', 100000, 0, NULL, 'undefined', 'wakaf', 'bank_transfer', NULL, NULL, NULL, 59, 48, '2023-06-24 20:03:24', '6b0f5acd-1391-413c-821b-cfb8209711fb', NULL, '2023-06-24 13:03:24', '2023-06-24 13:03:24', 6, 'coba@gmail.com', 0),
(97, '1959898386', 'Coba', 100000, 0, NULL, 'undefined', 'wakaf', 'bank_transfer', NULL, NULL, NULL, 59, 49, '2023-06-24 20:03:22', 'c124ab66-55b5-4bbf-bef4-fead5766c94a', NULL, '2023-06-24 13:03:22', '2023-06-24 13:03:22', 6, 'coba@gmail.com', 0),
(98, '644484112', 'Coba', 100000, 0, NULL, 'undefined', 'wakaf', 'bank_transfer', NULL, NULL, NULL, 59, 49, '2023-06-24 20:03:23', '9a9f1b75-4806-493e-a0e4-9e2cb6716779', NULL, '2023-06-24 13:03:23', '2023-06-24 13:03:23', 6, 'coba@gmail.com', 0),
(99, '1183399293', 'Coba', 100000, 0, NULL, 'undefined', 'wakaf', 'bank_transfer', NULL, NULL, NULL, 59, 33, '2023-06-24 20:03:28', 'c7639d39-ed67-4183-a787-e403d3b83ea0', NULL, '2023-06-24 13:03:28', '2023-06-24 13:03:28', 6, 'coba@gmail.com', 0),
(104, '1675252569', 'Coba', 100000, 0, NULL, 'undefined', 'wakaf', 'bank_transfer', NULL, NULL, NULL, 59, 49, '2023-06-24 20:03:22', 'a2c71881-c938-439f-a185-6224b73a10a7', NULL, '2023-06-24 13:03:22', '2023-06-24 13:03:22', 6, 'coba@gmail.com', 0),
(105, '596386289', 'Coba', 100000, 0, NULL, 'undefined', 'wakaf', 'bank_transfer', NULL, NULL, NULL, 59, 48, '2023-06-24 20:03:27', 'f54307ae-cf24-486b-a52f-af2a6cd7034f', NULL, '2023-06-24 13:03:27', '2023-06-24 13:03:27', 6, 'coba@gmail.com', 0),
(108, '1612274255', 'Coba', 100000, 0, NULL, 'undefined', 'wakaf', 'bank_transfer', NULL, NULL, NULL, 59, 33, '2023-06-24 20:03:29', '1a37a07b-d2f9-4630-a114-5960bdbf0844', NULL, '2023-06-24 13:03:29', '2023-06-24 13:03:29', 6, 'coba@gmail.com', 0),
(109, '1913321453', 'Coba', 200000, 0, NULL, 'undefined', 'wakaf', 'bank_transfer', NULL, NULL, NULL, 59, 49, '2023-06-24 20:03:21', '5ebd1b86-ec87-41dd-8905-ec275d30dc45', NULL, '2023-06-24 13:03:21', '2023-06-24 13:03:21', 6, 'coba@gmail.com', 0),
(112, '1108545827', 'Dani', 10000, 0, NULL, 'undefined', 'wakaf', 'bank_transfer', NULL, NULL, NULL, 57, 33, '2023-07-10 20:38:02', '39871a47-6866-4b1c-aefe-ab6dcfe06c57', NULL, '2023-07-10 13:38:02', '2023-07-10 13:38:02', 6, 'dani@gmail.com', 0),
(114, '1879123345', 'Dani', 100000, 0, NULL, 'undefined', 'wakaf', 'bank_transfer', NULL, NULL, NULL, 57, 33, '2023-07-10 20:38:02', '38076972-468c-40f0-9ce8-11176db2e4f1', NULL, '2023-07-10 13:38:02', '2023-07-10 13:38:02', 8, 'dani@gmail.com', 0),
(115, '709139629', 'Dani', 20000, 0, NULL, 'undefined', 'wakaf', 'bank_transfer', NULL, NULL, NULL, 57, 33, '2023-07-10 20:38:02', '8c355004-437d-4875-a2d1-915ad2840f25', NULL, '2023-07-10 13:38:02', '2023-07-10 13:38:02', 8, 'dani@gmail.com', 0),
(116, '2094090740', 'Coba', 100000, 0, NULL, 'undefined', 'wakaf', 'bank_transfer', NULL, NULL, NULL, 59, 33, '2023-06-24 20:03:26', '6fa56e0d-283b-4679-acfd-ec3bd9026cbc', NULL, '2023-06-24 13:03:26', '2023-06-24 13:03:26', 6, 'coba@gmail.com', 0),
(117, '151553805', 'Coba', 250000, 0, NULL, 'undefined', 'wakaf', 'bank_transfer', NULL, NULL, NULL, 59, 48, '2023-06-24 20:03:24', '13fa2086-1c62-4c35-8edf-f31ab7862c69', NULL, '2023-06-24 13:03:24', '2023-06-24 13:03:24', 6, 'coba@gmail.com', 0),
(118, '607486942', 'Coba', 200000, 0, NULL, 'undefined', 'wakaf', 'bank_transfer', NULL, NULL, NULL, 59, 33, '2023-06-24 20:03:26', '2ca23430-b292-4359-b701-114f64b77a53', NULL, '2023-06-24 13:03:26', '2023-06-24 13:03:26', 6, 'coba@gmail.com', 0),
(120, '404005222', 'Coba', 320000, 0, NULL, 'undefined', 'wakaf', 'bank_transfer', NULL, NULL, NULL, 59, 48, '2023-06-24 20:03:27', '9866f54e-e81d-4f9a-8677-5056c8476c87', NULL, '2023-06-24 13:03:27', '2023-06-24 13:03:27', 6, 'coba@gmail.com', 0),
(121, '446790118', 'Coba', 230000, 0, NULL, 'undefined', 'wakaf', 'bank_transfer', NULL, NULL, NULL, 59, 48, '2023-06-24 20:03:25', '4e4d8f61-ea55-48ca-be20-6eda2654c0d6', NULL, '2023-06-24 13:03:25', '2023-06-24 13:03:25', 6, 'coba@gmail.com', 0),
(174, '349543207', 'Coba', 20000, 0, '', NULL, 'wakaf', 'bank_transfer', NULL, NULL, NULL, 59, 48, '2023-06-24 20:03:29', 'b976943e-c95f-48ad-852a-c821956c01d9', NULL, '2023-06-24 13:03:29', '2023-06-24 13:03:29', 8, NULL, 0),
(175, '278139430', 'Aku01', 30000, 0, '', NULL, 'wakaf', 'echannel', NULL, NULL, NULL, 59, 48, '2023-06-24 20:03:26', '0d6a4d11-08a6-492f-9f32-89c0aa7dc999', NULL, '2023-06-24 13:03:26', '2023-06-24 13:03:26', 8, NULL, 0),
(176, '1998566748', 'Tdte', 80000, 0, '', NULL, 'wakaf', 'bank_transfer', NULL, NULL, NULL, 59, 33, '2023-06-24 20:03:28', '7fe31be6-29f7-4d37-8c18-6ad4f395f9a8', NULL, '2023-06-24 13:03:28', '2023-06-24 13:03:28', 8, NULL, 0),
(177, '1910975708', 'Qqq', 25000, 0, '', NULL, 'wakaf', 'bank_transfer', NULL, NULL, NULL, 59, 33, '2023-06-24 20:03:26', '2dc7c91c-98f1-456b-852f-19c794ff5cd0', NULL, '2023-06-24 13:03:26', '2023-06-24 13:03:26', 8, NULL, 0),
(178, '422049182', 'Leli', 50000, 0, '', NULL, 'wakaf', 'bank_transfer', NULL, NULL, NULL, 59, 33, '2023-06-24 20:03:25', '6fffcbbb-1a73-4102-9bd3-52d83087193d', NULL, '2023-06-24 13:03:25', '2023-06-24 13:03:25', 8, NULL, 0),
(179, '1674344846', 'Drff', 28000, 0, '', NULL, 'wakaf', 'echannel', NULL, NULL, NULL, 59, 32, '2023-06-24 20:03:28', '42bec8d1-a914-4ca8-aa62-42a08173a640', NULL, '2023-06-24 13:03:28', '2023-06-24 13:03:28', 8, NULL, 0),
(180, '1380322267', 'Ynwr', 250000, 0, '', NULL, 'wakaf', 'echannel', NULL, NULL, NULL, 59, 22, '2023-06-24 20:03:21', '6f5ce83d-bf01-4b6f-b998-28be828b0624', NULL, '2023-06-24 13:03:21', '2023-06-24 13:03:21', 8, NULL, 0),
(187, '2090095577', 'Gdyd', 10000, 0, '', NULL, 'wakaf', 'bank_transfer', NULL, NULL, NULL, 59, 49, '2023-06-24 20:03:27', '19c36688-d075-409d-b267-a6f9b37de87d', NULL, '2023-06-24 13:03:27', '2023-06-24 13:03:27', 6, NULL, 0),
(188, '2087305615', 'Aku', 20000, 0, '', NULL, 'wakaf', 'bank_transfer', NULL, NULL, NULL, 59, 22, '2023-06-24 20:03:23', '554cedf3-47a4-4d9e-a154-6773fadecf12', NULL, '2023-06-24 13:03:23', '2023-06-24 13:03:23', 6, NULL, 0),
(190, '1696651143', 'F7ttig', 60000, 0, '', NULL, 'wakaf', 'bank_transfer', NULL, NULL, NULL, 59, 22, '2023-06-24 20:03:23', 'ca459b09-1e8a-4834-8217-c91b6dd28d27', NULL, '2023-06-24 13:03:23', '2023-06-24 13:03:23', 6, NULL, 0),
(191, '1246281295', 'Akulah Sang Prabu', 80000, 0, '', NULL, 'wakaf', 'bank_transfer', NULL, NULL, NULL, 59, 22, '2023-06-24 20:03:24', '68109245-59a7-4633-9493-0244b2c7e26e', NULL, '2023-06-24 13:03:24', '2023-06-24 13:03:24', 6, NULL, 0),
(193, '273211460', 'T', 20008, 0, '', NULL, 'wakaf', 'bank_transfer', NULL, NULL, NULL, 59, 22, '2023-06-24 20:03:22', 'd4de2003-8a03-41d0-8acb-b537c0472713', NULL, '2023-06-24 13:03:22', '2023-06-24 13:03:22', 6, NULL, 0),
(195, '1832708592', 'Farah', 100000, 0, '', NULL, 'wakaf', 'bank_transfer', NULL, NULL, NULL, 119, 22, '2023-06-21 15:13:31', 'f08d2f1a-6923-4d29-8c81-1d67760e977b', NULL, '2023-06-21 08:13:31', '2023-06-21 08:13:31', 6, NULL, 0),
(196, '1988552460', 'Tes', 10000, 0, '', NULL, 'wakaf', 'bank_transfer', NULL, NULL, NULL, 119, 22, '2023-06-21 15:13:28', '921b3f2e-2c13-453e-af95-32bc06a3e6b0', NULL, '2023-06-21 08:13:28', '2023-06-21 08:13:28', 6, NULL, 0),
(198, '276931815', 'Fft', 28500, 0, '', NULL, 'wakaf', 'bank_transfer', NULL, NULL, NULL, 119, 22, '2023-06-21 15:13:31', '4ca09832-8a88-422f-8913-07ffdc825d44', NULL, '2023-06-21 08:13:31', '2023-06-21 08:13:31', 6, NULL, 0),
(200, '319365802', 'Aku01', 12000, 0, 'hdahdhaihdiahidhaihdiahdihaidhiahdiuahduhaudhuiahdiuahdihiaudhaiduhaid', NULL, 'wakaf', 'bank_transfer', NULL, NULL, NULL, 119, 32, '2023-06-21 15:13:29', 'dd6e0585-4c93-42a6-9ba5-477b5a6f5448', NULL, '2023-06-21 08:13:29', '2023-06-21 08:13:29', 6, NULL, 0),
(201, '270629954', 'Aku000', 55555, 0, 'Rrrr', NULL, 'wakaf', 'bank_transfer', NULL, NULL, NULL, 119, 49, '2023-06-21 15:13:32', 'ec1283b6-2953-404a-bd57-7af8be51dc83', NULL, '2023-06-21 08:13:32', '2023-06-21 08:13:32', 6, NULL, 0),
(202, '1599630382', '11111', 22222, 0, '33333', NULL, 'wakaf', 'bank_transfer', NULL, NULL, NULL, 119, 32, '2023-06-21 15:13:30', '750a91d9-9b72-45d4-acf8-0d5de4951f61', NULL, '2023-06-21 08:13:30', '2023-06-21 08:13:30', 6, NULL, 0),
(203, '872435241', 'Supardi', 25000, 0, 'Nice', NULL, 'wakaf', 'bank_transfer', NULL, NULL, NULL, 119, 32, '2023-06-21 15:13:29', 'b2cff070-9970-424d-a357-5e8e68e379cc', NULL, '2023-06-21 08:13:29', '2023-06-21 08:13:29', 6, NULL, 0),
(204, '105594866', 'Affan', 20000, 0, 'Oke', NULL, 'wakaf', 'bank_transfer', NULL, NULL, NULL, 119, 22, NULL, 'dbeb701b-9498-40f7-b54b-8b9978758cde', NULL, '2023-06-21 08:08:15', '2023-06-21 08:08:15', 5, NULL, 0),
(206, '1614504927', 'Affan', 30000, 0, 'Assalamu\'aldikum', NULL, 'wakaf', 'bank_transfer', NULL, NULL, NULL, 123, 32, '2023-07-17 16:44:12', '2b0adf11-bc7e-4595-ad42-a3f80479ecec', NULL, '2023-07-17 09:44:12', '2023-07-17 09:44:12', 8, NULL, 0),
(208, '1934342098', 'Tes', 5000, 0, 'Aku', NULL, 'wakaf', 'Tidak Ditemukan', NULL, NULL, NULL, 59, 49, '2023-06-23 23:31:59', '1613f8dd-9963-41ee-9479-3fe237b7936f', NULL, '2023-06-23 16:31:59', '2023-06-23 16:31:59', 8, NULL, 0),
(209, '838185012', 'Supardi', 9000, 0, 'Oke', NULL, 'wakaf', 'Tidak Ditemukan', NULL, NULL, NULL, 59, 22, '2023-06-24 19:21:27', 'cd16d80e-f005-42b6-940b-554636d7b96e', NULL, '2023-06-24 12:21:27', '2023-06-24 12:21:27', 8, NULL, 0),
(212, '37009668', 'Percobaan', 28000, 0, 'Semoga barokah', NULL, 'wakaf', 'bank_transfer', NULL, NULL, NULL, 127, 51, '2023-06-24 18:30:06', '7f1cd875-fb97-4319-977b-34b86709c0c7', NULL, '2023-06-24 11:30:06', '2023-06-24 11:30:06', 6, NULL, 0),
(213, '1079526696', 'Percobaan', 25000, 0, 'Percobaan', NULL, 'wakaf', 'bank_transfer', NULL, NULL, NULL, 127, 51, '2023-06-24 18:30:06', '47ed2424-4048-4153-a25c-e808414e473f', NULL, '2023-06-24 11:30:06', '2023-06-24 11:30:06', 6, NULL, 0),
(218, '1343081456', 'Tes', 12000, 0, 'Oke', NULL, 'wakaf', 'bank_transfer', NULL, NULL, NULL, 59, 22, '2023-06-24 20:03:17', '6a1913d2-cfbf-4e90-8070-59b145e27d42', NULL, '2023-06-24 13:03:21', '2023-06-24 13:03:21', 5, NULL, 0),
(219, '1630692572', 'Percobaan 3', 24000, 0, 'Percobaan 3', NULL, 'wakaf', 'bank_transfer', NULL, NULL, NULL, 128, 51, '2023-06-25 07:26:28', 'f403ffff-0a80-4df5-9850-910a1f9d0233', NULL, '2023-06-25 00:26:28', '2023-06-25 00:26:28', 6, NULL, 0),
(220, '38474106', 'Percobaan 3', 30000, 0, 'Percobaan 3', NULL, 'wakaf', 'bank_transfer', NULL, NULL, NULL, 128, 51, '2023-06-25 07:26:28', '781c4b2a-10d2-455e-9149-45d39b1b96ba', NULL, '2023-06-25 00:26:28', '2023-06-25 00:26:28', 6, NULL, 0),
(223, '908607797', 'Percobaan 3', 23000, 0, 'Percobaan 3', NULL, 'wakaf', 'bank_transfer', NULL, NULL, NULL, 128, 51, NULL, 'd75c7bb8-7e97-46bb-8390-906068d4e97d', NULL, '2023-06-25 00:18:26', '2023-06-25 00:18:26', 5, NULL, 0),
(224, '1934342099', 'Percobaan 3', 10000, 0, 'Percobaan 3', NULL, 'wakaf', 'Tidak Ditemukan', NULL, NULL, NULL, 128, 51, '2023-06-24 23:31:59', '1613f8dd-9963-41ee-9479-3fe237b79f36f', NULL, '2023-06-23 16:31:59', '2023-06-23 16:31:59', 8, NULL, 0),
(225, '2005188155', 'Coba 5', 15000, 0, 'Oke', NULL, 'wakaf', 'bank_transfer', NULL, NULL, NULL, 132, 51, '2023-06-25 10:33:54', '168ddeaa-3c84-41aa-bbe8-7c2da10bae7a', NULL, '2023-06-25 03:33:54', '2023-06-25 03:33:54', 6, NULL, 0),
(226, '1668865502', 'Coba 6', 20000, 0, 'Oke', NULL, 'wakaf', 'bank_transfer', NULL, NULL, NULL, 132, 51, '2023-06-25 10:33:55', 'dae6be57-a7cf-47c3-a462-919a22436e4d', NULL, '2023-06-25 03:33:55', '2023-06-25 03:33:55', 6, NULL, 0),
(227, '519856053', 'Coba 23', 30000, 0, 'Oke', NULL, 'wakaf', 'bank_transfer', NULL, NULL, NULL, 133, 51, '2023-06-25 10:42:04', '22d05ae6-9fa7-4c22-97dd-6cf0358a343e', NULL, '2023-06-25 03:42:04', '2023-06-25 03:42:04', 6, NULL, 0),
(228, '91389552', 'Coba 23', 50000, 0, 'Tes 1', NULL, 'wakaf', 'bank_transfer', NULL, NULL, NULL, 133, 51, '2023-06-25 10:42:04', 'dd3995ad-5110-49bf-8bb1-641530897222', NULL, '2023-06-25 03:42:04', '2023-06-25 03:42:04', 6, NULL, 0),
(229, '8992778', 'Trr', 2222, 0, 'Ff', NULL, 'wakaf', 'bank_transfer', NULL, NULL, NULL, 134, 51, '2023-06-25 10:51:35', 'a0e82fc7-bd0c-49d1-b713-3ca6f2f74896', NULL, '2023-06-25 03:51:35', '2023-06-25 03:51:35', 6, NULL, 0),
(230, '848964293', 'Erkk', 25000, 0, 'Oke', NULL, 'wakaf', 'bank_transfer', NULL, NULL, NULL, 135, 51, '2023-07-11 07:44:44', 'b294614c-543f-492f-9139-abeef223ef90', NULL, '2023-07-11 00:44:44', '2023-07-11 00:44:44', 6, NULL, 0),
(231, '871076325', 'Administrator', 25000, 0, NULL, 'undefined', 'wakaf', 'bank_transfer', NULL, NULL, NULL, 1, 22, '2023-07-17 14:42:25', '827ee550-b1c8-4cc6-a8c5-73e7c2c5129e', NULL, '2023-07-17 07:42:25', '2023-07-17 07:42:25', 6, 'admin@admin.com', 0),
(232, '2125407043', 'Administrator', 20000, 0, NULL, 'undefined', 'wakaf', 'bank_transfer', NULL, NULL, NULL, 1, 22, '2023-07-17 14:42:26', '4a4114c9-cbfb-4393-9f0f-e7e7cdc58158', NULL, '2023-07-17 07:42:26', '2023-07-17 07:42:26', 8, 'admin@admin.com', 0),
(234, '1633276893', 'Angga', 30000, 0, NULL, 'undefined', 'wakaf', 'bank_transfer', NULL, NULL, NULL, 123, 22, '2023-07-17 16:44:12', '564eb9b6-1f83-401f-93a0-3e7c07ecfd97', NULL, '2023-07-17 09:44:12', '2023-07-17 09:44:12', 6, 'angga@gmail.com', 0),
(235, '1248224458', 'Angga', 23000, 0, NULL, 'undefined', 'wakaf', 'bank_transfer', NULL, NULL, NULL, 123, 22, '2023-07-17 16:44:13', '153e0ce1-a7a1-45f9-ac2d-54601f9ae36f', NULL, '2023-07-17 09:44:13', '2023-07-17 09:44:13', 6, 'angga@gmail.com', 0),
(236, '1324571420', 'Angga', 20000, 0, NULL, 'undefined', 'wakaf', 'bank_transfer', NULL, NULL, NULL, 123, 32, '2023-07-17 16:44:14', '7263a76d-0673-482d-8153-dbe7ae6316e8', NULL, '2023-07-17 09:44:14', '2023-07-17 09:44:14', 6, 'angga@gmail.com', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pencairan`
--

CREATE TABLE `pencairan` (
  `id` int(11) NOT NULL,
  `pendanaan_id` int(11) NOT NULL,
  `nominal` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pencairan`
--

INSERT INTO `pencairan` (`id`, `pendanaan_id`, `nominal`, `tanggal`, `created_at`) VALUES
(1, 3, 9000, '2021-07-20', '2021-07-20 09:22:52'),
(2, 3, 1000, '2021-07-09', '2021-07-20 10:26:59'),
(3, 16, 300000, '2021-07-26', '2021-07-25 20:35:36'),
(4, 16, 300000, '2021-07-26', '2021-07-25 20:36:26'),
(8, 16, 300000, '2021-07-26', '2021-07-25 23:17:35'),
(9, 16, 1000, '2021-07-27', '2021-07-26 19:39:05'),
(10, 16, 1000, '2021-07-27', '2021-07-26 19:42:05'),
(11, 16, 1000, '2021-07-27', '2021-07-26 19:43:04'),
(12, 16, 1000, '2021-07-27', '2021-07-26 19:45:24'),
(13, 16, 1000, '2021-07-27', '2021-07-26 19:51:13'),
(14, 16, 1000, '2021-07-27', '2021-07-26 19:51:44'),
(17, 19, 5000000, '2021-07-30', '2021-07-29 21:29:48'),
(18, 21, 1000000000, '2021-08-02', '2021-08-01 22:26:02'),
(19, 23, 499000000, '2021-08-03', '2021-08-03 01:06:52'),
(20, 18, 110000, '2021-08-03', '2021-08-03 01:20:46'),
(22, 17, 1000, '2021-08-05', '2021-08-04 23:03:36'),
(23, 17, 1000, '2021-08-05', '2021-08-04 23:05:00'),
(24, 17, 1000, '2021-08-05', '2021-08-04 23:10:57'),
(25, 17, 1000, '2021-08-05', '2021-08-04 23:13:10'),
(26, 17, 1000, '2021-08-05', '2021-08-04 23:15:41'),
(27, 17, 1000, '2021-08-05', '2021-08-04 23:16:03'),
(28, 17, 1000, '2021-08-05', '2021-08-04 23:19:10'),
(29, 17, 1000, '2021-08-05', '2021-08-04 23:22:41'),
(30, 17, 1000, '2021-08-05', '2021-08-04 23:25:24'),
(31, 17, 1000, '2021-08-05', '2021-08-04 23:28:29'),
(32, 17, 1000, '2021-08-05', '2021-08-04 23:29:26'),
(33, 26, 50000000, '2021-08-23', '2021-08-23 03:21:06'),
(34, 26, 1000, '2021-08-23', '2021-08-23 03:26:38'),
(35, 26, 1000, '2021-08-23', '2021-08-23 03:36:09'),
(36, 26, 50000000, '2021-08-23', '2021-08-23 03:37:01'),
(37, 27, 500000, '2021-09-19', '2021-09-18 21:04:51'),
(38, 28, 500000, '2021-09-30', '2021-09-29 21:10:31'),
(39, 22, 50000, '2021-09-30', '2021-09-30 00:56:41'),
(40, 29, 50000, '2021-10-04', '2021-10-03 16:43:40'),
(41, 30, 5000000, '2021-10-04', '2021-10-03 17:39:08'),
(42, 30, 5000000, '2021-10-04', '2021-10-03 17:45:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendanaan`
--

CREATE TABLE `pendanaan` (
  `id` int(11) NOT NULL,
  `nama_pendanaan` varchar(255) DEFAULT NULL,
  `is_wakaf` tinyint(4) NOT NULL DEFAULT 0,
  `foto` varchar(255) DEFAULT NULL,
  `uraian` text DEFAULT NULL,
  `nominal` varchar(255) DEFAULT NULL,
  `pendanaan_berakhir` datetime DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `bank_id` int(11) DEFAULT NULL,
  `nomor_rekening` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `nama_nasabah` varchar(255) DEFAULT NULL,
  `nama_perusahaan` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `foto_ktp` varchar(255) DEFAULT NULL,
  `foto_kk` varchar(255) DEFAULT NULL,
  `file_uraian` varchar(255) DEFAULT NULL,
  `poster` varchar(255) DEFAULT NULL,
  `status_lembaran` tinyint(4) NOT NULL DEFAULT 0,
  `nominal_lembaran` varchar(255) NOT NULL DEFAULT '0',
  `jumlah_lembaran` int(11) DEFAULT NULL,
  `kategori_pendanaan_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `status_tampil` int(11) DEFAULT 0,
  `is_zakat` tinyint(4) NOT NULL DEFAULT 0,
  `is_infak` tinyint(4) NOT NULL DEFAULT 0,
  `is_sedekah` tinyint(4) NOT NULL DEFAULT 0,
  `tempat` varchar(255) DEFAULT NULL,
  `penerima_wakaf` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pendanaan`
--

INSERT INTO `pendanaan` (`id`, `nama_pendanaan`, `is_wakaf`, `foto`, `uraian`, `nominal`, `pendanaan_berakhir`, `user_id`, `bank_id`, `nomor_rekening`, `nama_nasabah`, `nama_perusahaan`, `deskripsi`, `foto_ktp`, `foto_kk`, `file_uraian`, `poster`, `status_lembaran`, `nominal_lembaran`, `jumlah_lembaran`, `kategori_pendanaan_id`, `status_id`, `status_tampil`, `is_zakat`, `is_infak`, `is_sedekah`, `tempat`, `penerima_wakaf`, `created_at`) VALUES
(22, 'Pendanaan untuk Membangun Masjid Al-Marwa Sumenep', 1, 'pendanaan/TuclKmPPNR2aCuSB7yzo0DoHGMLTq7Uq.jpg', 'Masjid (bentuk tidak baku: mesjid) adalah rumah tempat ibadah umat Islam atau Muslim. Masjid artinya tempat sujud, sebutan lain yang berkaitan dengan masjid di Indonesia adalah musala, langgar atau surau. Istilah tersebut diperuntukkan bagi bangunan menyerupai masjid yang tidak digunakan untuk salat Jumat, iktikaf, dan umumnya berukuran kecil.', '5000000', '2023-10-13 10:00:20', 1, 2, '0987654321', 'PERCOBAAN', 'Tugas Akhir', '<div class=\"container mx-auto flex flex-col\">\r\n<div class=\"rounded-sm overflow-hidden shadow-2xl w-full md:h-101 mb-10 self-center\"><img class=\"lozad object-cover w-full fade\" src=\"https://media.sukabumiupdate.com/media/2023/01/07/1673061833_63b8e5c9cb4ce_vhtt4VIJOJ5kVJNWBiJB.jpeg\" alt=\"Masjid Raya Al Jabbar di Gedebage, Kota Bandung.  Masjid Al Jabbar diresmikan Gubernur Jabar Ridwan Kamil akhir tahun 2022. |Foto: Jabarprov.go.id.\" data-src=\"https://media.sukabumiupdate.com/media/2023/01/07/1673061833_63b8e5c9cb4ce_vhtt4VIJOJ5kVJNWBiJB.jpeg\" data-loaded=\"true\" /></div>\r\n<p class=\"text-center text-[12px] text-gray-600 \">Masjid Raya Al Jabbar di Gedebage, Kota Bandung. Masjid Al Jabbar diresmikan Gubernur Jabar Ridwan Kamil akhir tahun 2022. |Foto: Jabarprov.go.id.</p>\r\n<div class=\"my-3\">&nbsp;</div>\r\n</div>\r\n<div class=\"flex flex-wrap mb-5\">\r\n<div class=\"w-full mr-auto md:p-3 p-6 order-1\">\r\n<article class=\"content-article\">\r\n<p><strong>SUKABUMIUPDATE.com</strong>&nbsp;-&nbsp;<a href=\"https://www.sukabumiupdate.com/tag/masjid\">Masjid</a>&nbsp;raya Al Jabbar menarik perhatian sehingga masyarakat berbondong-bondong mendatangi masjid yang berada di daerah Gedebage, Kota Bandung.&nbsp;<a href=\"https://www.sukabumiupdate.com/tag/masjid-al-jabbar\">Masjid Al Jabbar</a>&nbsp;yang memiliki desain megah itu diresmikan Gubernur Jawa Barat Ridwan Kamil pada Jumat, 30 Desember 2022.</p>\r\n<p>Tak lama setelah itu, media sosial Ridwan Kamil yang sekaligus sebagai perancang&nbsp;<a href=\"https://www.sukabumiupdate.com/tag/masjid-al-jabbar\">Masjid Al Jabbar</a>&nbsp;tersebut banjir komentar.</p>\r\n<p>Yang menonjol mulai dari yang mempertanyakan lokasinya di Gedebage, hingga biaya pembangunan&nbsp;<a href=\"https://www.sukabumiupdate.com/tag/masjid-al-jabbar\">Masjid Al Jabbar</a>&nbsp;yang disebut-sebut menyedot anggaran provinsi yang tembus Rp 1 triliun.</p>\r\n<p><strong>Cerita awal pembangunan&nbsp;<a href=\"https://www.sukabumiupdate.com/tag/masjid\">Masjid</a>&nbsp;Raya Al Jabbar</strong></p>\r\n<p>Ridwan Kamil sempat menceritakan pemilihan Gedebage tersebut di sela peresmian masjid tersebut pada 30 Desember 2022. Bermula dari pembicaraan panjangnya dengan Ahmad Heryawan tahun 2015, gubernur Jawa Barat kala itu. Emil, sapaan Ridwan Kamil, saat itu masih menjabat sebagai Wali Kota Bandung.</p>\r\n<p><strong>Baca Juga:&nbsp;<a href=\"https://www.sukabumiupdate.com/jawa-barat/111414/datang-ke-cikembar-sukabumi-wagub-jabar-bilang-akan-bangun-3-km-jalan-rusak\">Datang ke Cikembar Sukabumi, Wagub Jabar Bilang akan Bangun 3 Km Jalan Rusak</a></strong></p>\r\n<p>Aher, sapaan Ahmad Heryawan saat itu tengah mencari lokasi untuk membangun masjid provinsi yang selama ini menumpang di&nbsp;<a href=\"https://www.sukabumiupdate.com/tag/masjid\">Masjid</a>&nbsp;Agung yang berada di pinggir Alun-alun Kota Bandung.</p>\r\n</article>\r\n</div>\r\n</div>', 'xfyjTk888UI5BdLKkx3ioOOc7-AKqe3v.jpg', 'vDl_VQdm6c1XUHhMVfCIQkIoCvSNKy7K.jpg', NULL, 'poster/VPx-Rl0kCD2AWDmqAh0stM_xt37xSl4j.jpg', 0, '0', 0, 2, 2, 1, 0, 0, 0, 'Indonesia', 'isalam', '2023-06-22 10:47:00'),
(32, 'Pembangunan Area Parkir Masjid Nur Muhammad', 1, 'pendanaan/EXZ5zxtI2WkyLXJP-dB_srFxJdaZeOXy.JPG', 'b', '300000', '2023-12-12 12:00:20', 17, 1, '792878728424', 'Al Makalah', 'Tugas Akhir', '', 'pendanaan/foto_ktp/20211004_f08bb56bf956aacef5f703a8e88c1a3953e2156a.png', 'pendanaan/foto_kk/20211004_9418174fe27bf6bb503482a67e07c3c9e90eb4cc.png', NULL, 'poster/Tu-jkLL0Lhvg1jJu9CQr30biUjeHj68F.JPG', 0, '0', 0, 3, 2, 1, 0, 0, 0, '', '', '2023-06-22 10:47:04'),
(33, 'Pendanaan Pembangunan Masjid', 1, 'pendanaan/iW0-BZDAmcexez1wl0Dyz4USOY0po3Xk.JPG', '', '50000000', '2023-09-23 12:00:20', 17, 2, '1212121212', 'Fahru CJ', 'Fahru Company', '<div class=\"col-lg-8 col-md-6 col-sm-12 pt-60\">\r\n<div class=\"header-panel-wrap\">\r\n<div id=\"myTabContent\" class=\"tab-content pt-4\">\r\n<div id=\"detail\" class=\"tab-pane fade active show\" role=\"tabpanel\" aria-labelledby=\"detail-tab\">\r\n<p style=\"text-align: left;\">Masjid adalah rumah tempat ibadah umat Muslim. Masjid artinya tempat sujud, dan mesjid yang berukuran kecil disebut musholla, langgar atau surau. Selain tempat ibadah masjid juga merupakan pusat kehidupan komunitas muslim. Kegiatan-kegiatan perayaan hari besar, diskusi, kajian agama, ceramah dan belajar Al Qur&rsquo;an sering dilaksanakan di Masjid. Bahkan dalam sejarah Islam, masjid turut memegang peranan dalam aktivitas sosial kemasyarakata.</p>\r\n<p style=\"text-align: left;\">Unsur pertama yang harus jadi pondasi pembangunan mesjid adalah pelurusan niat.Artinya orang yang memancangkan niat bahwa apa yang dikerjakannya itu semata untuk mecapai keridhoaan Allah swt. Juga agar mesjid yang di bangun itu menjadi tempat bagi kaum muslimin untuk berzikir kepada Allah, melaksanakan kewajiban-kewajibannya kepada Allah, mengangkat syiar-syiar islam, berkumpul dalam ketaatan kepada Allah, dan membela agama-Nya.Sebab awal yang bersih dan suci akan mempengaruhi langkah perjalanan panjang sebuah mesjid.</p>\r\n<p style=\"text-align: left;\">Niat yang tidak baik dalam mendirikan mesjid tercemari oleh kegiatan-kegiatan yang jauh dari tuntunan agama. Pahala besar yang dijanjikan oleh Rasulullah saw.bagi orang yang membangun mesjid,hanya diberikan bagi orang yang membangun mesjid itu semata-mata untuk Allah atau mencari keridhaan Allah SWT.Bukan untuk mencari ketenaran,keuntungan atau pamer kepada manusia.</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', 'pendanaan/foto_ktp/BF8eiKlEfgBmwLHvmC25FG7E0mtnYx1K.png', 'pendanaan/foto_kk/3r_HscsCCTFohIsMYt343erS7uFqdVzO.png', 'uraian/Cw2DA4YdM-9kNCCeMUYNoeJ7uzMUk3da.doc', 'poster/tVSDSYd6Wm7gMLMzaRfPEWgttMLseQZ6.JPG', 0, '0', 0, 3, 2, 0, 0, 0, 0, 'Jakarta', 'Pengurus Masjid', '2023-06-22 10:48:12'),
(48, 'Pembangunan Area Parkir Masjid Darussalam', 1, 'pendanaan/SZB---tUoOR7Xpe_ekIEn2rzC0c1Ep7N.png', '', '6000000', '2023-09-11 11:00:21', 1, 6, '085334749312', 'Achmad Khairul Madani', 'DANA', '<p>y</p>', 'pendanaan/foto_ktp/gRo0uiV_z84vuqLYtcNSo9MyMZG0X4hD.png', 'pendanaan/foto_kk/M479_9Dvd2Ob5zoUGRmTYRNQElfEFLB8.png', 'uraian/LLGSUFoTN6rLmhakTgviNX9aUQmsEc_L.doc', 'poster/QwlXQdGxJzl3k_YnhAsIYr4nHy40k3AI.png', 0, '0', 0, 3, 2, 1, 0, 0, 0, 'Dusun Poreh Tengan ', 'Pengurus Masjid Darussalam', '2023-06-22 10:45:45'),
(49, 'Wakaf Mushaf Al-Qur\'an', 1, 'pendanaan/fPvP7AQVEjgaAYvqNhwnlJnf4t_zmmhS.JPG', 'sasas', '1000000', '2023-01-12 10:45:54', 1, 6, '2147483647', 'Achmad Khairul Madani', 'DANA', '<p><strong>YUK RAIH BERKAH MELALUI WAKAF MUSHAF AL-QUR\'AN</strong></p>\r\n<p>Divisi Sosial I-Salam memberi kesempatan untuk meraih kebaikan tanpa henti melalui wakaf Mushaf Al-Qur\'an untuk masjid, pesantren, tahfizh, TPA, dan selainnya. Lipatgandakan wakaf anda dengan terus menerus menambah donasi anda di iSalam.</p>\r\n<p><br />Wakaf Mushaf Al-Qur\'an senilai Rp100.000 per mushaf</p>', 'pendanaan/foto_ktp/GLuWgU1a7P1yB-xAI0ksWjjn_5fLb0rv.png', 'pendanaan/foto_kk/zRTd2a65_jUyfRSTzjqtsRDtR4pcROGc.png', 'uraian/KMpl3ddF6_tj63O7-q7RPiJ0cBu0yiaW.doc', 'poster/bBKTjGF3fipaQEVAkIrbBgZWWpZQPzZy.JPG', 0, '0', 0, 3, 2, 0, 0, 0, 0, 'Indonesia', 'Pengurus I-SALAM', '2023-06-23 13:49:59'),
(51, 'Pembangunan Musholla Al-Kausar', 0, 'pendanaan/1JccRGw3lczEozq2QUiAQdRRTwbYVYJN.jpg', NULL, '60000000', '2023-12-22 04:15:34', 57, 2, '0987654321', 'Pengurus Masjid', 'Musholla Al-Kausar', '<p>Pembangunan Musholla Al-Kausar di kota Surabaya</p>', '', '', '', '20230624_2e2f7b99fbabb51ec37d8f54b164f309b2a6fc36.jpg', 0, '0', 0, 6, 1, 1, 0, 0, 0, 'Sukolilo Surabaya', 'Pengurus Masjid', '2023-06-24 09:42:31'),
(52, 'tester', 1, 'pendanaan/T4fu_Ek3LLBu06t8VZFrdEdOQVA6UTC7.jpg', NULL, '1000000', '2024-04-03 04:45:40', 1, 3, '93009090', 'Al Makalah', 'Tugas Akhir', '<p>tester</p>', 'pendanaan/foto_ktp/XSD7SB1XWRxyATt8PTfxDoNB47bIbxo9.JPG', 'pendanaan/foto_kk/7gI9gMpTnH3oEsH-5g6r-kHHqRWOcl5Z.JPG', 'uraian/hfCqXeKIfyqSkTXcmNYni124X3PPgtfX.pdf', '20230717_9fd3de80bf2ee22fb667b609871475539ea0a9fd.JPG', 1, '1000', 1000, 6, 1, 1, 0, 0, 0, 'abc', 'ab', '2023-07-17 09:49:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyaluran`
--

CREATE TABLE `penyaluran` (
  `id` int(11) NOT NULL,
  `id_pendanaan` int(11) NOT NULL,
  `nominal` int(11) NOT NULL,
  `tanggal_penyaluran` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penyaluran`
--

INSERT INTO `penyaluran` (`id`, `id_pendanaan`, `nominal`, `tanggal_penyaluran`) VALUES
(1, 2, 5000000, '2021-11-27 14:12:25'),
(2, 22, 50000, '2021-11-27 15:35:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'Super Administrator'),
(2, 'Marketing'),
(3, 'Regular User'),
(4, 'Pengaju Wakaf'),
(5, 'Pewakaf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_action`
--

CREATE TABLE `role_action` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `action_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `role_action`
--

INSERT INTO `role_action` (`id`, `role_id`, `action_id`) VALUES
(33, 2, 12),
(34, 2, 13),
(35, 2, 14),
(36, 2, 15),
(37, 2, 16),
(38, 2, 17),
(39, 2, 18),
(40, 2, 19),
(41, 2, 20),
(42, 2, 21),
(43, 2, 22),
(44, 2, 23),
(45, 2, 24),
(46, 2, 25),
(47, 2, 26),
(48, 2, 27),
(49, 2, 28),
(50, 2, 29),
(51, 2, 30),
(52, 2, 31),
(53, 2, 32),
(54, 2, 33),
(98, 3, 12),
(99, 3, 13),
(100, 3, 14),
(101, 3, 15),
(102, 3, 16),
(103, 3, 17),
(104, 3, 18),
(105, 3, 19),
(106, 3, 20),
(107, 3, 21),
(108, 3, 22),
(109, 3, 23),
(110, 3, 24),
(111, 3, 25),
(112, 3, 26),
(113, 3, 27),
(114, 3, 28),
(115, 3, 29),
(116, 3, 30),
(117, 3, 31),
(118, 3, 32),
(119, 3, 33),
(1688, 1, 12),
(1689, 1, 13),
(1690, 1, 14),
(1691, 1, 15),
(1692, 1, 17),
(1693, 1, 18),
(1694, 1, 19),
(1695, 1, 20),
(1696, 1, 21),
(1697, 1, 22),
(1698, 1, 23),
(1699, 1, 24),
(1700, 1, 25),
(1701, 1, 26),
(1702, 1, 27),
(1703, 1, 28),
(1704, 1, 29),
(1705, 1, 30),
(1706, 1, 31),
(1707, 1, 32),
(1708, 1, 33),
(1709, 1, 49),
(1710, 1, 50),
(1711, 1, 51),
(1712, 1, 52),
(1713, 1, 53),
(1714, 1, 54),
(1715, 1, 55),
(1716, 1, 56),
(1717, 1, 57),
(1718, 1, 58),
(1719, 1, 59),
(1720, 1, 60),
(1721, 1, 61),
(1722, 1, 62),
(1723, 1, 63),
(1724, 1, 100),
(1725, 1, 101),
(1726, 1, 102),
(1727, 1, 103),
(1728, 1, 104),
(1729, 1, 105),
(1730, 1, 106),
(1731, 1, 107),
(1732, 1, 108),
(1733, 1, 109),
(1734, 1, 111),
(1735, 1, 112),
(1736, 1, 113),
(1737, 1, 114),
(1738, 1, 115),
(1739, 1, 116),
(1740, 1, 117),
(1741, 1, 118),
(1742, 1, 119),
(1743, 1, 120),
(1744, 1, 124),
(1745, 1, 125),
(1746, 1, 126),
(1747, 1, 127),
(1748, 1, 128),
(1749, 1, 160),
(1750, 1, 161),
(1751, 1, 162),
(1752, 1, 163),
(1753, 1, 164),
(1754, 1, 64),
(1755, 1, 65),
(1756, 1, 66),
(1757, 1, 67),
(1758, 1, 68),
(1759, 1, 69),
(1760, 1, 70),
(1761, 1, 71),
(1762, 1, 88),
(1763, 1, 89),
(1764, 1, 72),
(1765, 1, 73),
(1766, 1, 123),
(1767, 1, 74),
(1768, 1, 75),
(1769, 1, 76),
(1770, 1, 84),
(1771, 1, 85),
(1772, 1, 86),
(1773, 1, 87),
(1774, 1, 77),
(1775, 1, 110),
(1776, 1, 122),
(1777, 1, 78),
(1778, 1, 121),
(1779, 1, 79),
(1780, 1, 80),
(1781, 1, 81),
(1782, 1, 82),
(1783, 1, 83),
(1784, 1, 146),
(1785, 1, 90),
(1786, 1, 91),
(1787, 1, 92),
(1788, 1, 93),
(1789, 1, 94),
(1790, 1, 95),
(1791, 1, 96),
(1792, 1, 97),
(1793, 1, 98),
(1794, 1, 99),
(1795, 1, 129),
(1796, 1, 130),
(1797, 1, 131),
(1798, 1, 132),
(1799, 1, 133),
(1800, 1, 134),
(1801, 1, 135),
(1802, 1, 136),
(1803, 1, 137),
(1804, 1, 138),
(1805, 1, 139),
(1806, 1, 140),
(1807, 1, 141),
(1808, 1, 142),
(1809, 1, 143),
(1810, 1, 144),
(1811, 1, 165),
(1812, 1, 166),
(1813, 1, 167),
(1814, 1, 168),
(1815, 1, 169),
(1816, 1, 186),
(1817, 1, 187),
(1818, 1, 188),
(1819, 1, 189),
(1820, 1, 190);

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_menu`
--

CREATE TABLE `role_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `role_menu`
--

INSERT INTO `role_menu` (`id`, `role_id`, `menu_id`) VALUES
(56, 2, 1),
(57, 2, 2),
(58, 2, 3),
(59, 2, 4),
(60, 2, 5),
(71, 3, 1),
(72, 3, 2),
(73, 3, 3),
(74, 3, 4),
(75, 3, 5),
(376, 1, 1),
(377, 1, 2),
(378, 1, 3),
(379, 1, 4),
(380, 1, 5),
(381, 1, 6),
(382, 1, 7),
(383, 1, 11),
(384, 1, 15),
(385, 1, 16),
(386, 1, 17),
(387, 1, 18),
(388, 1, 19),
(389, 1, 23),
(390, 1, 8),
(391, 1, 9),
(392, 1, 10),
(393, 1, 12),
(394, 1, 13),
(395, 1, 14),
(396, 1, 20),
(397, 1, 21),
(398, 1, 22),
(399, 1, 24),
(400, 1, 25);

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `pin` int(11) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `ikut_wakaf` text DEFAULT NULL,
  `daftar_wakaf` varchar(255) DEFAULT NULL,
  `latar_belakang` text DEFAULT NULL,
  `aturan_wakaf` text DEFAULT NULL,
  `fiqih_wakaf` text DEFAULT NULL,
  `regulasi_wakaf` text DEFAULT NULL,
  `banner` text DEFAULT NULL,
  `judul_web` varchar(255) DEFAULT NULL,
  `link_download_apk_marketing` varchar(255) DEFAULT NULL,
  `bg_login` varchar(255) DEFAULT NULL,
  `bg_pin` varchar(255) DEFAULT NULL,
  `link_download_apk` varchar(255) DEFAULT NULL,
  `tentang_kami` text DEFAULT NULL,
  `judul_tentang_kami` varchar(255) DEFAULT NULL,
  `foto_tentang_kami` varchar(255) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `youtube_link` varchar(255) DEFAULT NULL,
  `judul_video` text DEFAULT NULL,
  `deskripsi_video` text DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `telegram` varchar(255) DEFAULT NULL,
  `nama_web` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `visi` text DEFAULT NULL,
  `misi` text DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `slogan_web` text NOT NULL,
  `pesan` text DEFAULT NULL,
  `text_apk` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `setting`
--

INSERT INTO `setting` (`id`, `pin`, `logo`, `ikut_wakaf`, `daftar_wakaf`, `latar_belakang`, `aturan_wakaf`, `fiqih_wakaf`, `regulasi_wakaf`, `banner`, `judul_web`, `link_download_apk_marketing`, `bg_login`, `bg_pin`, `link_download_apk`, `tentang_kami`, `judul_tentang_kami`, `foto_tentang_kami`, `latitude`, `longitude`, `youtube_link`, `judul_video`, `deskripsi_video`, `facebook`, `instagram`, `twitter`, `telegram`, `nama_web`, `alamat`, `visi`, `misi`, `phone`, `email`, `slogan_web`, `pesan`, `text_apk`) VALUES
(3, 1234, 'aexn2rssdPCjiPfVjWoJEiYAUX8Ig-A5.png', 'alur.pdf', NULL, '<p class=\"MsoNormal\"><span style=\"font-size: 12.0pt; mso-bidi-font-size: 11.0pt; line-height: 107%; font-family: \'Arial\',\'sans-serif\';\">Kemandirian ekonomi serta keamanan dan ketahanan ideologi merupakan bagian dari pilar utama tegaknya sebuah negeri.</span></p>\r\n<p class=\"MsoNormal\"><span style=\"font-size: 12.0pt; mso-bidi-font-size: 11.0pt; line-height: 107%; font-family: \'Arial\',\'sans-serif\';\">&nbsp;</span></p>\r\n<p class=\"MsoNormal\"><span style=\"font-size: 12.0pt; mso-bidi-font-size: 11.0pt; line-height: 107%; font-family: \'Arial\',\'sans-serif\';\">Sudah menjadi tanggung jawab kita bersama untuk mengembangkan potensi ditengah ummat Islam dalam negeri ini serta menampilkan langkah-langkah baru yang menjamin kemakmuran dan kesejahteraan masyarakat.<span style=\"mso-spacerun: yes;\">&nbsp; </span></span></p>\r\n<p class=\"MsoNormal\"><span style=\"font-size: 12.0pt; mso-bidi-font-size: 11.0pt; line-height: 107%; font-family: \'Arial\',\'sans-serif\';\">&nbsp;</span></p>\r\n<p class=\"MsoNormal\"><span style=\"font-size: 12.0pt; mso-bidi-font-size: 11.0pt; line-height: 107%; font-family: \'Arial\',\'sans-serif\';\">Alhamdulillah, Yayasan Inisiator Salam Kariim (disingkat I-SALAM) yang disahkan oleh Kementerian Hukum dan Hak Asasi Manusia dengan surat keputusan nomor AHU-0001429.AH.01.04.Tahun 2021, hadir dengan segenap keyakinan dan optimisme, serta kemampuan sumber daya yang berkualitas untuk memenuhi kebutuhan pengembangan potensi aset ummat dalam skala nasional sehingga diharapkan memberi hasil yang terbaik bagi masyarakat.</span></p>\r\n<p class=\"MsoNormal\"><span style=\"font-size: 12.0pt; mso-bidi-font-size: 11.0pt; line-height: 107%; font-family: \'Arial\',\'sans-serif\';\">&nbsp;</span></p>\r\n<p class=\"MsoNormal\"><span style=\"font-size: 12.0pt; mso-bidi-font-size: 11.0pt; line-height: 107%; font-family: \'Arial\',\'sans-serif\';\">Manajemen Yayasan I-SALAM memiliki jaringan yang luas dikenal baik di dalam dan luar negeri dan berpotensi untuk menjalin kerjasama strategis di berbagai bidang.</span></p>\r\n<p class=\"MsoNormal\"><span style=\"font-size: 12.0pt; mso-bidi-font-size: 11.0pt; line-height: 107%; font-family: \'Arial\',\'sans-serif\';\">&nbsp;</span></p>\r\n<p class=\"MsoNormal\"><span style=\"font-size: 12.0pt; mso-bidi-font-size: 11.0pt; line-height: 107%; font-family: \'Arial\',\'sans-serif\';\">I-Salam adalah amalan jariah yang diharapkan terus bermanfaat dan mengalir pahalanya hingga hari kiamat pada segala kegiatan yang dijalankannya.</span></p>\r\n<p class=\"MsoNormal\"><span style=\"font-size: 12.0pt; mso-bidi-font-size: 11.0pt; line-height: 107%; font-family: \'Arial\',\'sans-serif\';\">&nbsp;</span></p>\r\n<p class=\"MsoNormal\"><span style=\"font-size: 12.0pt; mso-bidi-font-size: 11.0pt; line-height: 107%; font-family: \'Arial\',\'sans-serif\';\">Semoga Allah menjadikan I-SALAM ini sebagai wadah yang mengantar kepada peradaban islami yang selalu menebarkan dan membuka pintu kebaikan yang luas bagi para mitra serta membawa keberkahan bagi seluruh masyarakat.</span></p>\r\n<p class=\"MsoNormal\"><span style=\"font-size: 12.0pt; mso-bidi-font-size: 11.0pt; line-height: 107%; font-family: \'Arial\',\'sans-serif\';\">&nbsp;</span></p>\r\n<p class=\"MsoNormal\"><span style=\"font-size: 12.0pt; mso-bidi-font-size: 11.0pt; line-height: 107%; font-family: \'Arial\',\'sans-serif\';\">&nbsp;</span></p>\r\n<p class=\"MsoNormal\"><span style=\"font-size: 12.0pt; mso-bidi-font-size: 11.0pt; line-height: 107%; font-family: \'Arial\',\'sans-serif\';\">Ayo bekerjasama dengan I-SALAM !</span></p>', '<div class=\"wrapper\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; outline: none; color: #787878; font-family: Poppins, sans-serif; font-size: 15px;\">\r\n<h4 style=\"box-sizing: border-box; margin: 0px 0px 10px; padding: 0px; outline: none; line-height: 1.1; font-size: 25px; color: #121c45; text-transform: capitalize; background-color: #ffffff;\">Aturan Wakaf ISalam</h4>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 15px; padding: 0px; outline: none; font-size: 1rem; line-height: 25px; background-color: #ffffff;\">Terdapat 2 kategori wakaf di iSalam yaitu:</p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 15px; padding: 0px; outline: none; font-size: 1rem; line-height: 25px; background-color: #ffffff;\">1.&nbsp;<em style=\"box-sizing: border-box; margin: 0px; padding: 0px; outline: none;\"><span style=\"box-sizing: border-box; margin: 0px; padding: 0px; outline: none; font-weight: bolder;\">Wakaf Sosial</span></em>, yaitu harta yang disalurkan untuk keperluan sosial masyarakat seperti pembangunan masjid, pengadaan Al Qur\'an, pembuatan Sumur, dan lain-lain.</p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 15px; padding: 0px; outline: none; font-size: 1rem; line-height: 25px; background-color: #ffffff;\">2.&nbsp;<em style=\"box-sizing: border-box; margin: 0px; padding: 0px; outline: none;\"><span style=\"box-sizing: border-box; margin: 0px; padding: 0px; outline: none; font-weight: bolder;\">Wakaf Produktif</span></em>, yaitu harta yang diinvestasikan untuk dikelola secara produktif kemudian hasilnya akan diteruskan sebagaimana yang tertuang dalam&nbsp;<span style=\"box-sizing: border-box; margin: 0px; padding: 0px; outline: none; font-weight: bolder;\">amanah wakaf&nbsp;</span>baik untuk kepentingan sosial maupun untuk dapat diproduktifkan kembali.</p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 15px; padding: 0px; outline: none; font-size: 1rem; line-height: 25px; background-color: #ffffff;\">Cara berwakaf dapat diakses melalui Menu&nbsp;<span style=\"box-sizing: border-box; margin: 0px; padding: 0px; outline: none; font-weight: bolder;\">Layanan</span>:</p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 15px; padding: 0px; outline: none; font-size: 1rem; line-height: 25px; background-color: #ffffff;\">1. Pilih&nbsp;<span style=\"box-sizing: border-box; margin: 0px; padding: 0px; outline: none; font-weight: bolder;\">Semua Program Wakaf</span>&nbsp;jika ingin menampilkan semua kategori program Wakaf, atau&nbsp;</p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 15px; padding: 0px; outline: none; font-size: 1rem; line-height: 25px; background-color: #ffffff;\">2. Pilih&nbsp;<span style=\"box-sizing: border-box; margin: 0px; padding: 0px; outline: none; font-weight: bolder;\">Wakaf Sosial</span>&nbsp;jika hanya ingin menampilkan semua program pada kategori Wakaf Sosial, atau</p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 15px; padding: 0px; outline: none; font-size: 1rem; line-height: 25px; background-color: #ffffff;\">3. Pilih&nbsp;<span style=\"box-sizing: border-box; margin: 0px; padding: 0px; outline: none; font-weight: bolder;\">Wakaf Produktif</span>&nbsp;jika ingin menampilkan semua program wakaf pada kategori produktif.</p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 15px; padding: 0px; outline: none; font-size: 1rem; line-height: 25px; background-color: #ffffff;\">4. Pilih&nbsp;<span style=\"box-sizing: border-box; margin: 0px; padding: 0px; outline: none; font-weight: bolder;\">Lainnya</span>&nbsp;jika ingin melakukan Zakat, Infak dan Sedekah.&nbsp;</p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 15px; padding: 0px; outline: none; font-size: 1rem; line-height: 25px; background-color: #ffffff;\">Pada masing-masing pilihan silakan memilih program wakaf yang diinginkan hingga proses pembayaran selesai.</p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 15px; padding: 0px; outline: none; font-size: 1rem; line-height: 25px; background-color: #ffffff;\">Untuk Program Wakaf Produktif sangat disarankan agar calon Wakif melakukan registrasi agar laporan wakaf bisa didapatkan secara berkala.</p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 15px; padding: 0px; outline: none; font-size: 1rem; line-height: 25px; background-color: #ffffff;\"><span style=\"box-sizing: border-box; margin: 0px; padding: 0px; outline: none; font-weight: bolder;\">Semua Program Wakaf</span>&nbsp;juga dapat di akses melalui tombol&nbsp;<span style=\"box-sizing: border-box; margin: 0px; padding: 0px; outline: none; font-weight: bolder;\">Wakaf Sekarang</span>&nbsp;di sebelah kanan atas. Melalui tombol ini, para calon pewakaf (Wakif) tidak perlu melakukan pendaftaran, namun hanya disarankan untuk wakaf sosial.</p>\r\n</div>', '<p class=\"MsoNormal\" style=\"margin-bottom: .0001pt; line-height: 13.8pt; background: white;\"><span style=\"font-size: 10.0pt; font-family: \'Montserrat\',\'serif\'; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: Arial; color: #787878;\">Secara&nbsp;istilah&nbsp;(terminologi),&nbsp;<strong>wakaf</strong>&nbsp;adalah&nbsp;<strong><em>menahan&nbsp;pokok/asal&nbsp;harta&nbsp;dan&nbsp;mengalirkan&nbsp;hasil/manfaatnya.</em></strong></span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: .0001pt; line-height: 13.8pt; background: white;\"><span style=\"font-size: 10.0pt; font-family: \'Montserrat\',\'serif\'; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: Arial; color: #787878;\">Wakaf&nbsp;adalah&nbsp;hal&nbsp;yang&nbsp;dianjurkan.</span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: .0001pt; line-height: 13.8pt; background: white;\"><strong><span style=\"font-size: 10.0pt; font-family: \'Montserrat\',\'serif\'; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: Arial; color: #787878;\">Allah&nbsp;berfirman:</span></strong></p>\r\n<p class=\"MsoNormal\" dir=\"RTL\" style=\"margin-bottom: .0001pt; text-align: right; line-height: 13.8pt; background: white; direction: rtl; unicode-bidi: embed;\"><strong><span lang=\"AR-SA\" style=\"font-family: \'Arial\',\'sans-serif\'; mso-ascii-font-family: \'Traditional Arabic\'; mso-fareast-font-family: \'Times New Roman\'; mso-hansi-font-family: \'Traditional Arabic\'; color: #787878;\">لَن تَنَالُوا الْبِرَّ حَتَّىٰ تُنفِقُوا مِمَّا تُحِبُّونَ وَمَا تُنفِقُوا مِن شَيْءٍ فَإِنَّ اللَّهَ بِهِ عَلِيمٌ</span></strong></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: .0001pt; line-height: 13.8pt; background: white;\"><em><span style=\"font-size: 10.0pt; font-family: \'Montserrat\',\'serif\'; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: Arial; color: #787878;\">\"Kalian&nbsp;sekali-kali&nbsp;tidak&nbsp;sampai&nbsp;kepada&nbsp;kebajikan&nbsp;(yang&nbsp;sempurna),&nbsp;sebelum&nbsp;kalian&nbsp;menafkahkan&nbsp;sebahagian&nbsp;harta&nbsp;yang kalian&nbsp;cintai. Dan&nbsp;apa&nbsp;saja&nbsp;yang kalian&nbsp;nafkahkan&nbsp;maka&nbsp;sesungguhnya&nbsp;Allah&nbsp;mengetahuinya.\" [Ali Imran: 92]</span></em></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: .0001pt; line-height: 13.8pt; background: white;\"><strong><span style=\"font-size: 10.0pt; font-family: \'Montserrat\',\'serif\'; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: Arial; color: #787878;\">Rasulullah&nbsp;shallallahu&nbsp;\'alaihi&nbsp;wasallam&nbsp;bersabda:</span></strong></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: 10.0pt; line-height: 13.8pt; background: white;\"><span style=\"font-size: 12.0pt; font-family: \'Arial\',\'sans-serif\'; mso-fareast-font-family: \'Times New Roman\'; color: #787878;\">&nbsp;</span></p>\r\n<p class=\"MsoNormal\" dir=\"RTL\" style=\"margin-bottom: .0001pt; text-align: right; line-height: 13.8pt; background: white; direction: rtl; unicode-bidi: embed;\"><strong><span lang=\"AR-SA\" style=\"font-family: \'Arial\',\'sans-serif\'; mso-ascii-font-family: \'Traditional Arabic\'; mso-fareast-font-family: \'Times New Roman\'; mso-hansi-font-family: \'Traditional Arabic\'; color: #787878;\">إِذَا مَاتَ الْإِنْسَانُ انْقَطَعَ عَنْهُ عَمَلُهُ إِلَّا مِنْ ثَلَاثَةٍ: إِلَّا مِنْ صَدَقَةٍ جَارِيَةٍ، أَوْ عِلْمٍ يُنْتَفَعُ بِهِ، أَوْ وَلَدٍ صَالِحٍ يَدْعُو لَهُ</span></strong></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: .0001pt; line-height: 13.8pt; background: white;\"><em><span style=\"font-size: 10.0pt; font-family: \'Montserrat\',\'serif\'; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: Arial; color: #787878;\">&ldquo;Apabila&nbsp;manusia&nbsp;meninggal,&nbsp;maka&nbsp;terputuslah&nbsp;seluruh&nbsp;amalannya,&nbsp;kecuali&nbsp;tiga:&nbsp;sedekah&nbsp;jariah,&nbsp;ilmu&nbsp;yang&nbsp;bermanfaat,&nbsp;atau&nbsp;anak&nbsp;saleh&nbsp;yang&nbsp;mendoakannya.&rdquo; [Diriwayatkan&nbsp;oleh Imam Muslim]</span></em></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: .0001pt; line-height: 13.8pt; background: white;\"><span style=\"font-size: 10.0pt; font-family: \'Montserrat\',\'serif\'; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: Arial; color: #787878;\">Tentang&nbsp;syariat&nbsp;dan&nbsp;berbagai&nbsp;hukum&nbsp;wakaf&nbsp;diterangkan&nbsp;dalam&nbsp;hadits&nbsp;Abdullah bin Umar&nbsp;radhiyallahu&nbsp;\'anhuma,</span></p>\r\n<p class=\"MsoNormal\" dir=\"RTL\" style=\"margin-bottom: .0001pt; text-align: right; line-height: 13.8pt; background: white; direction: rtl; unicode-bidi: embed;\"><strong><span lang=\"AR-SA\" style=\"font-family: \'Arial\',\'sans-serif\'; mso-ascii-font-family: \'Traditional Arabic\'; mso-fareast-font-family: \'Times New Roman\'; mso-hansi-font-family: \'Traditional Arabic\'; color: #787878;\">أَنْ عُمَرَ بْنَ الخَطَّابِ أَصَابَ أَرْضًا بِخَيْبَرَ، فَأَتَى النَّبِيَّ صَلَّى اللهُ عَلَيْهِ وَسَلَّمَ يَسْتَأْمِرُهُ فِيهَا، فَقَالَ: يَا رَسُولَ اللَّهِ، إِنِّي أَصَبْتُ أَرْضًا بِخَيْبَرَ لَمْ أُصِبْ مَالًا قَطُّ أَنْفَسَ عِنْدِي مِنْهُ، فَمَا تَأْمُرُ بِهِ؟ قَالَ: &laquo;إِنْ شِئْتَ حَبَسْتَ أَصْلَهَا، وَتَصَدَّقْتَ بِهَا&raquo; قَالَ: فَتَصَدَّقَ بِهَا عُمَرُ، أَنَّهُ لاَ يُبَاعُ وَلاَ يُوهَبُ وَلاَ يُورَثُ، وَتَصَدَّقَ بِهَا فِي الفُقَرَاءِ، وَفِي القُرْبَى وَفِي الرِّقَابِ، وَفِي سَبِيلِ اللَّهِ، وَابْنِ السَّبِيلِ، وَالضَّيْفِ لاَ جُنَاحَ عَلَى مَنْ وَلِيَهَا أَنْ يَأْكُلَ مِنْهَا بِالْمَعْرُوفِ، وَيُطْعِمَ غَيْرَ مُتَمَوِّلٍ</span></strong></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: .0001pt; line-height: 13.8pt; background: white;\"><span style=\"font-size: 10.0pt; font-family: \'Montserrat\',\'serif\'; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: Arial; color: #787878;\">&ldquo;Sesungguhnya&nbsp;Umar bin Al-Khattab&nbsp;radhiyallahu&nbsp;\'anhu&nbsp;mendapatkan&nbsp;bagian&nbsp;tanah&nbsp;di&nbsp;Khaibar,&nbsp;maka&nbsp;Beliau&nbsp;mendatangi&nbsp;Nabi&nbsp;shallallahu&nbsp;\'alaihi&nbsp;wasallam&nbsp;meminta&nbsp;arahan&nbsp;(Nabi&nbsp;shallallahu&nbsp;\'alaihi&nbsp;wasallam)&nbsp;tentang&nbsp;(tanah&nbsp;itu), (Umar)&nbsp;berkata:</span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: .0001pt; line-height: 13.8pt; background: white;\"><span style=\"font-size: 10.0pt; font-family: \'Montserrat\',\'serif\'; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: Arial; color: #787878;\">\"Wahai&nbsp;Rasulullah,&nbsp;saya&nbsp;mendapatkan&nbsp;bagian&nbsp;tanah&nbsp;di&nbsp;Khaibar, Saya&nbsp;sama&nbsp;sekali&nbsp;tidak&nbsp;pernah&nbsp;memiliki&nbsp;harta&nbsp;yang&nbsp;lebih&nbsp;bernilai&nbsp;dari&nbsp;(tanah)&nbsp;itu,&nbsp;maka&nbsp;apa&nbsp;perintahmu?\"</span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: .0001pt; line-height: 13.8pt; background: white;\"><span style=\"font-size: 10.0pt; font-family: \'Montserrat\',\'serif\'; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: Arial; color: #787878;\">(Rasulullah&nbsp;shallallahu&nbsp;\'alaihi&nbsp;wasallam)&nbsp;bersabda,</span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: .0001pt; line-height: 13.8pt; background: white;\"><span style=\"font-size: 10.0pt; font-family: \'Montserrat\',\'serif\'; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: Arial; color: #787878;\">&ldquo;Jika&nbsp;engkau&nbsp;berkenan,&nbsp;maka&nbsp;tahanlah&nbsp;asal/pokoknya&nbsp;dan&nbsp;sedekahkanlah&nbsp;(hasil/manfaat)&nbsp;nya.\"</span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: .0001pt; line-height: 13.8pt; background: white;\"><span style=\"font-size: 10.0pt; font-family: \'Montserrat\',\'serif\'; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: Arial; color: #787878;\">Umar pun&nbsp;menyedekahkannya&nbsp;agar&nbsp;tidak&nbsp;dijual,&nbsp;tidak&nbsp;dihibahkan, dan&nbsp;tidak&nbsp;diwariskan. Umar&nbsp;menyedekahkannya&nbsp;untuk&nbsp;kaum&nbsp;fakir,&nbsp;karib&nbsp;kerabat,&nbsp;Ar-Riqab, fi&nbsp;sabilillah, dan&nbsp;Ibnus&nbsp;Sabil,&nbsp;serta&nbsp;para&nbsp;tamu.&nbsp;Tidak&nbsp;mengapa&nbsp;untuk&nbsp;penanggung&nbsp;jawabnya&nbsp;makan&nbsp;dari&nbsp;(wakaf&nbsp;itu)&nbsp;dengan&nbsp;hal&nbsp;yang&nbsp;ma&rsquo;ruf&nbsp;dan&nbsp;memberi&nbsp;makan&nbsp;kepada&nbsp;orang lain&nbsp;tanpa&nbsp;menimbun&nbsp;harta.&rdquo; [Diriwayatkan&nbsp;oleh Al-Bukhariy&nbsp;dan Muslim]</span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: 10.0pt; line-height: 13.8pt; background: white;\"><span style=\"font-size: 12.0pt; font-family: \'Arial\',\'sans-serif\'; mso-fareast-font-family: \'Times New Roman\'; color: #787878;\">&nbsp;</span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: .0001pt; text-align: justify; line-height: 18.75pt; background: white;\"><strong><span style=\"font-size: 10.0pt; font-family: \'Montserrat\',\'serif\'; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: Arial; color: #787878;\">HIKMAH DAN MASLAHAT WAKAF</span></strong></p>\r\n<p class=\"MsoNormal\" style=\"text-align: justify; text-indent: -18.0pt; line-height: normal; background: white;\"><span style=\"font-size: 10.0pt; font-family: \'Arial\',\'sans-serif\'; mso-fareast-font-family: \'Times New Roman\'; color: #787878;\">1.</span><span style=\"font-size: 10.0pt; font-family: \'Montserrat\',\'serif\'; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: Arial; color: #787878;\">Penjagaan&nbsp;terhadap&nbsp;Pokok-Pokok&nbsp;Pensyariatan</span></p>\r\n<p class=\"MsoNormal\" style=\"text-align: justify; text-indent: -18.0pt; line-height: normal; background: white;\"><span style=\"font-size: 10.0pt; font-family: \'Arial\',\'sans-serif\'; mso-fareast-font-family: \'Times New Roman\'; color: #787878;\">2.</span><span style=\"font-size: 10.0pt; font-family: \'Montserrat\',\'serif\'; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: Arial; color: #787878;\">Menjawab&nbsp;Seruan&nbsp;Allah dan Rasul-Nya</span></p>\r\n<p class=\"MsoNormal\" style=\"text-align: justify; text-indent: -18.0pt; line-height: normal; background: white;\"><span style=\"font-size: 10.0pt; font-family: \'Arial\',\'sans-serif\'; mso-fareast-font-family: \'Times New Roman\'; color: #787878;\">3.</span><span style=\"font-size: 10.0pt; font-family: \'Montserrat\',\'serif\'; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: Arial; color: #787878;\">Melangsungkan&nbsp;Pahala&nbsp;Saat&nbsp;Hidup&nbsp;dan&nbsp;Setelah&nbsp;Mati</span></p>\r\n<p class=\"MsoNormal\" style=\"text-align: justify; text-indent: -18.0pt; line-height: normal; background: white;\"><span style=\"font-size: 10.0pt; font-family: \'Arial\',\'sans-serif\'; mso-fareast-font-family: \'Times New Roman\'; color: #787878;\">4.</span><span style=\"font-size: 10.0pt; font-family: \'Montserrat\',\'serif\'; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: Arial; color: #787878;\">Penjagaan&nbsp;terhadap&nbsp;Masjid dan Sarana Ibadah&nbsp;Umat&nbsp;Islam</span></p>\r\n<p class=\"MsoNormal\" style=\"text-align: justify; text-indent: -18.0pt; line-height: normal; background: white;\"><span style=\"font-size: 10.0pt; font-family: \'Arial\',\'sans-serif\'; mso-fareast-font-family: \'Times New Roman\'; color: #787878;\">5.</span><span style=\"font-size: 10.0pt; font-family: \'Montserrat\',\'serif\'; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: Arial; color: #787878;\">Penjagaan&nbsp;terhadap&nbsp;Kelangsungan&nbsp;Pendidikan dan&nbsp;Meningkatkan&nbsp;Kecerdasan&nbsp;Umat</span></p>\r\n<p class=\"MsoNormal\" style=\"text-align: justify; text-indent: -18.0pt; line-height: normal; background: white;\"><span style=\"font-size: 10.0pt; font-family: \'Arial\',\'sans-serif\'; mso-fareast-font-family: \'Times New Roman\'; color: #787878;\">6.</span><span style=\"font-size: 10.0pt; font-family: \'Montserrat\',\'serif\'; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: Arial; color: #787878;\">Sumber&nbsp;Kekuatan&nbsp;Negara&nbsp;dari&nbsp;Sudut&nbsp;Perekonomian,&nbsp;Pertahanan, Kesehatan, dan lain-lain</span></p>\r\n<p class=\"MsoNormal\" style=\"text-align: justify; text-indent: -18.0pt; line-height: normal; background: white;\"><span style=\"font-size: 10.0pt; font-family: \'Arial\',\'sans-serif\'; mso-fareast-font-family: \'Times New Roman\'; color: #787878;\">7.</span><span style=\"font-size: 10.0pt; font-family: \'Montserrat\',\'serif\'; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: Arial; color: #787878;\">Bantuan untuk Kaum Fakir dan Dhuafa</span></p>', '<p style=\"box-sizing: border-box; margin: 0px 0px 15px; padding: 0px; outline: none; font-size: 1rem; line-height: 25px; color: #787878; font-family: Poppins, sans-serif; background-color: #ffffff;\"><span style=\"font-size: 12pt;\">Undang-undang Republik Indonesia No. 41 Tahun 2004</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 15px; padding: 0px; outline: none; font-size: 1rem; line-height: 25px; color: #787878; font-family: Poppins, sans-serif; background-color: #ffffff;\"><span style=\"font-size: 12pt;\">Peraturan Pemerintah Republik Indonesia Nomor 42 Tahun 2006</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 15px; padding: 0px; outline: none; font-size: 1rem; line-height: 25px; color: #787878; font-family: Poppins, sans-serif; background-color: #ffffff;\"><span style=\"font-size: 12pt;\">Peraturan Menteri Agama Republik Indonesia No. 73 Tahun 2013</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 15px; padding: 0px; outline: none; font-size: 1rem; line-height: 25px; color: #787878; font-family: Poppins, sans-serif; background-color: #ffffff;\"><span style=\"font-size: 12pt;\">Peraturan Pemerintah Republik Indonesia Nomor 25 Tahun 2018</span></p>', 'OzrtKubaiaN7H0SxBdw9fk4i8tUSxJws.png', 'Yayasan Wakaf iSalam', 'marketing', 'WZnGf183PCJjCxkJzkJS4I97L3_siwab.png', '1AxYE37bhrsYjudjpPTdf6uY7hqvnHVl.jpg', 'playstore', '<p style=\"text-align: justify;\"><span style=\"color: #000000;\">Sudah menjadi tanggung jawab kita bersama untuk mengembangkan potensi ditengah ummat Islam dalam negeri ini serta menampilkan langkah-langkah baru yang menjamin kemakmuran dan kesejahteraan masyarakat. Alhamdulillah, Yayasan Inisiator Salam Kariim (disingkat I-SALAM) yang disahkan oleh Kementerian Hukum dan Hak Asasi Manusia dengan surat keputusan nomor AHU-0001429.AH.01.04.Tahun 2021, hadir dengan segenap keyakinan dan optimisme, serta kemampuan sumber daya yang berkualitas Kemandirian ekonomi serta keamanan dan ketahanan ideologi merupakan bagian dari pilar utama tegaknya sebuah negeri.</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"color: #000000;\"> </span><br /><span style=\"color: #000000;\">Manajemen Yayasan I-SALAM memiliki jaringan yang luas dikenal baik di dalam dan luar negeri dan berpotensi untuk menjalin kerjasama strategis di berbagai bidang. I-Salam adalah amalan jariah yang diharapkan terus bermanfaat dan mengalir pahalanya hingga hari kiamat pada segala kegiatan yang dijalankannya. </span></p>\r\n<p style=\"text-align: justify;\"><span style=\"color: #000000;\">Semoga Allah menjadikan I-SALAM ini sebagai wadah yang mengantar kepada peradaban islami yang selalu menebarkan dan membuka pintu kebaikan yang luas bagi para mitra serta membawa keberkahan bagi seluruh masyarakat. </span><br /><span style=\"color: #000000;\">Ayo bekerjasama dengan I-SALAM ! untuk memenuhi kebutuhan pengembangan potensi aset ummat dalam skala nasional sehingga diharapkan memberi hasil yang terbaik bagi masyarakat.</span></p>', 'Lembaga Penyalur Wakaf Isalam', 'aFsuWhLC35Ne5hSuJ4XDmcT3AqhGuMjX.jpg', '-7.963169587297386', '112.63095066210936', 'https://www.youtube.com/embed/bmUpUKnsQ4U', 'TOP 10 Masjid Terindah Dan Terbesar Di Dunia', '<p><span style=\"color: #030303; font-family: Roboto, Arial, sans-serif; font-size: 14px; white-space: pre-wrap; background-color: rgba(0, 0, 0, 0.05);\">Masjid adalah sebuah tempat peribadatan umat muslim yang tentunya sangat diagungkan seperti tempat peri</span></p>', 'https://www.facebook.com/isalamkarim', 'https://www.instagram.com/isalamkarim/', 'https://twitter.com/isalamkarim', 'https://web.telegram.org/z/', 'I-Salam', 'MAKASSAR Jl.Gunung Lompobattang No. 56, Kel. Pisang Utara Kec. Ujung Pandang Kota Makassar 90115', '<p><span style=\"color: #000000;\">Menjadi Lembaga Islam yang unggul, amanah dan profesional dalam mengembangkan potensi keummatan secara nasional yang bermanfaat bagi Umat Islam dalam bidang Dakwah, Sosial, Pendidikan, Ekonomi, dan Pengembangan Aset dengan berlandaskan Al-Qur\'an dan As-Sunnah sesuai pemahaman ParaSalaf</span></p>', '<p><span style=\"color: #000000;\">1. Mendirikan pusat pendidikan dan pelatihan (pusdiklat) yang unggul dalam mewadahi penyelenggaraan pendidikan dan pelatihan formal maupun informal.</span></p>\r\n<p><span style=\"color: #000000;\">2. Menyelenggarakan program dakwah dan aktifitas sosial yang menyentuh seluruh lapisan masyarakat melalui berbagai media.</span></p>\r\n<p><span style=\"color: #000000;\">3. Memberdayakan potensi ekonomi umat dengan menggalakkan investasi sesuai syariat, pemberdayaan wakaf yang akuntabel serta menanamkan dan menghidupkan kewirausahaan di berbagai sektor untuk kesejahteraan umat Islam.</span></p>\r\n<p><span style=\"color: #000000;\">4. Membangun dan Mengelola Aset untuk kepentingan Umat Islam baik sarana prasarana ibadah, pendidikan, dakwah, ekonomi serta sosial kemasyarakatan</span></p>', '628114100721', 'isalam@isalam.com', 'Ketika manusia meninggal dunia, maka terputus sudah amal jariahnya kecuali tiga perkara yakni: sedekah jariyah, ilmu bermanfaat dan doa anak yang sholeh. ', '<p>jsjkjskjsk</p>', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `slides`
--

CREATE TABLE `slides` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `sub_judul` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `slides`
--

INSERT INTO `slides` (`id`, `judul`, `sub_judul`, `gambar`, `status`, `link`) VALUES
(2, 'Hukum Wakaf', 'Hukum wakaf adalah sunnah. Wakaf umumnya berbentuk tanah dan bangunan, seperti wakaf masjid, atau wakaf Al Quran. Biasanya digunakan untuk berbagai keperluan seperti masjid hingga pemakaman alias kuburan.', 'ZKaTMty36k2XG42FFzz8G7Bx84wsawzt.jpg', 1, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `status`
--

INSERT INTO `status` (`id`, `name`) VALUES
(1, 'Pendanaan diajukan'),
(2, 'Pendanaan diterima'),
(3, 'Pendanaan dicairkan'),
(4, 'Pendanaan selesai'),
(5, 'Pembayaran Pending'),
(6, 'Pembayaran diterima'),
(7, 'Pendanaan Ditolak'),
(8, 'Pembayaran Ditolak'),
(9, 'Draf Pendanaan'),
(10, 'Pembayaran Menunggu Konfirmasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tema_hubungi_kami`
--

CREATE TABLE `tema_hubungi_kami` (
  `id` int(11) NOT NULL,
  `nama_tema` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tema_hubungi_kami`
--

INSERT INTO `tema_hubungi_kami` (`id`, `nama_tema`) VALUES
(1, 'Saya Tertarik Menjadi Investor'),
(2, 'Apa itu ISALAM?');

-- --------------------------------------------------------

--
-- Struktur dari tabel `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `testimonials`
--

INSERT INTO `testimonials` (`id`, `nama`, `jabatan`, `isi`, `gambar`) VALUES
(1, 'Ahmad', 'ahmad@gmail.com', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type', '3vZ9HPON9XYO4nR3zhh-xsRjm27jf5l7.png'),
(2, 'tes', 'tes@gmial.com', 'gdajhdhada', 'v65ifLpD8pwtEsHDrnhd13EoyCJ30VBl.JPG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `role_id` int(11) NOT NULL,
  `confirm` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `pin` varchar(8) DEFAULT NULL,
  `photo_url` varchar(255) NOT NULL,
  `secret_token` varchar(255) DEFAULT NULL,
  `nomor_handphone` varchar(20) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `last_logout` datetime DEFAULT NULL,
  `fcm_token` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `name`, `role_id`, `confirm`, `status`, `pin`, `photo_url`, `secret_token`, `nomor_handphone`, `last_login`, `last_logout`, `fcm_token`) VALUES
(1, 'admin@admin.com', '$2a$10$DaKrwNFMq2cQo/AVB4jtTOsStIeSmiTTZf28TuDPVn00WDRKpER0u', 'Administrator', 1, 1, 1, '', '20230710_cef239141c378cc0998e5f526985c2d57c535d6c.png', 'ISALAMMTYyNzIrSkNULU1vT0xHNXNIKzNQNk51NWFFS2_mpzQv_V2UGJiQk1hWnROUXR5Y2ZpVGtLeWpPKzE1NjYzS3CRETKEY', '6289658798162', '2023-07-21 08:38:49', '2023-07-17 14:44:43', NULL),
(10, 'fachruwildan14@gmail.com', '$2y$13$jcXMY3qgypS7ybnzr6yT8ef2idr1NEaq2gS2LUGhL9xp1T.lNBTDi', 'fachru wildans', 5, 0, 1, NULL, 'default.png', NULL, '08965879812', NULL, NULL, NULL),
(11, 'fachruwildan13@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'fachru wildans', 3, 0, 1, NULL, 'default.png', NULL, '089658798125', NULL, NULL, NULL),
(14, 'fachruwildan12@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'fachru wildans', 3, 0, 1, NULL, 'default.png', NULL, '0896587981254', NULL, NULL, NULL),
(17, 'hardiansah7101@gmail.com', '$2y$13$pm1zgDOB5jNY4MNS93eibuhUSu.bPAEcagIxT6mYu73NsNattN9jG', 'Muh. Hardiansah', 2, 1, 1, '1234', 'default.png', 'ISALAMMTYzNTMrRTROSTYtTFZEUm02M25Cby1URVNLSGd4_3B2Wk_WGl5TzVoRkpscnBycjlsMi1JOTIzS3ErNDI4OTI=S3CRETKEY', '081911106262', NULL, NULL, NULL),
(18, 'dellanjng@gmail.com', '$2y$13$pskad5BMklO4gWTrinjG0e2FD5/GTrH3NkFnRqE/S/HS7wIunMZni', 'Fahru', 2, 1, 1, '1234', 'default.png', 'ISALAMMTYyNzYrbzJPVDZXbnM3TFZXOEZveS1w_PK1aa_NXoycXQyQzZ6aHlDa1hFNiszMzUwMA==S3CRETKEY', '081082083081', NULL, NULL, NULL),
(26, 'fachruwildan16@gmail.com', '$2y$13$0heSPr.ToTsNcawskOPB0.bysgg1vktEN13E/hUZAK0LhUITF5JkW', 'Wildan', 5, 1, 1, '1234', 'default.png', 'ISALAMMTYyNzYrVnZZamVSNVMxZnNZc0VqeV_DaLsf_FmbUFLMkhBR2xOK1oyR1R4KzMyMDQ2S3CRETKEY', '089658798168', NULL, NULL, NULL),
(27, 'fachruwildan11@gmail.com', '$2y$13$DoYZdwB5f/c5BW8DjH8HwOeNFdDQ74ESutC.b2RrSZsYayzBLx5rK', 'Afdinal', 2, 1, 1, '1234', 'default.png', 'ISALAMMTYyNzYrMkVvRjdhYkRrK0lJS04tMU82Ml_clLU4_J4U3pmZkR1K3VJa3hrSWJyVG4zKzM3NjQyS3CRETKEY', '089658798169', NULL, NULL, NULL),
(30, 'iankco46@gmail.com', '$2y$13$RqgvzP7Z0mYDGs47nE6wtuzXauyqK7alMKL/vpiOkykTxJ8E75pxa', 'Ian', 5, 1, 1, '1231', 'default.png', 'ISALAMMTYzNTMrUE1jUS1nc0R5ZWxuMUk3c1Zwc2VvUVVT_YxkbW_U3ZQcTdGRVdwUktwNWEwRXBtMHIzN1UrNzMzMDk=S3CRETKEY', '081082083082', NULL, NULL, NULL),
(48, 'fachruwildan@gmail.com', '$2y$13$s8hb2Xmi6CS/VUFCJhDocugZBKxbqnK/ExJ8z2zhXsCxIAs9XeK7i', 'Fachru Wildan', 2, 1, 1, '1234', 'default.png', 'ISALAMMTYyOTcrY1d0NFpSa0FFbEV3UXdrVytwdzVU_9y6tt_Z3ZvdTVzdE54SytzYjNwMG4rRkpDKzMxNTk4S3CRETKEY', '089658798164', NULL, NULL, NULL),
(49, 'fachruwildan1@gmail.com', '$2y$13$pm1zgDOB5jNY4MNS93eibuhUSu.bPAEcagIxT6mYu73NsNattN9jG', 'Fachru Wildan Afdinal', 5, 1, 1, '1234', 'default.png', 'ISALAMMTYzNjArVWIwTzErRjgzTWZmU0xXLUhQ_C6Ygf_VTAzTzFmcHJYclhWWlE1KyszMTU3Mg==S3CRETKEY', '08965879869', NULL, NULL, NULL),
(50, 'lukmanhakim.idris@gmail.com', '$2y$13$fukx/l9xAZ3nma844HMk/et6SyGnaE/NpWSbe7PCR/GnXDn60QNkC', 'Lukman Hakim', 1, 1, 1, '12345', 'default.png', NULL, '0811547227', '2021-08-02 12:24:57', NULL, NULL),
(51, 'akuntes2022@gmail.com', '$2y$13$w/d.n0q3fASufkboQZtA.uIGzcQAAVtuC0Sl8oD2zxu.hOFvbbXW.', 'Wildan Subekti', 5, 1, 1, '1234', 'default.png', 'ISALAMMTYyNzkrZDg5R3hVLXlSdkxjeTZhTz_eUT6T_RxZmNwV3JSYWZSMTBlNGRtKzk0ODc3S3CRETKEY', '08123457890', NULL, '2022-12-13 22:37:46', NULL),
(52, 'xicoret961@flipssl.com', '$2y$13$Ic151yFXkRJHDDnCg447iOVfSbz/sGm8Xh2Gg3eTpnD8f6ShkihMi', 'Fani', 2, 1, 1, '1234', 'default.png', 'ISALAMMTYyNzkrb1ZjNWZCak9NaStVQk5xOHpjYWRSUT_0yN96_Q1alkzNW5TWE1NOFItSjhOdHFNbSs5Mzc3MQ==S3CRETKEY', '0988478389', NULL, NULL, NULL),
(53, 'dapow11303@hyprhost.com', '$2y$13$R.FkxE.GtYegHn.czjMGXO9.CQqzMK/hTUpsaG5Mmb/nl6U6X7Kfe', 'tesakun', 2, 1, 1, '1234', 'default.png', 'ISALAMMTYyOTcrbkdsV0c0Mnd1bGswZ1BJUnVmR3_OqgOG_ltdm42QTNsQUw2VzZNZzFyazRZKzA2OTA0S3CRETKEY', '0923893', NULL, NULL, NULL),
(54, 'fosoxic318@ampswipe.com', '$2y$13$GF.0PAoWSyL3iyzcGX3da.K0tq/hi8ZHCHsffLYfIw8BvvUPQssti', 'Budi', 2, 1, 1, '1234', 'default.png', 'ISALAMMTYyOTcrbWphTVZ5RlYya3FTWW5vWDJ3RUI5_a4Kz0_WW1lZlNkMjJTQnA5TGEzaFFZazhuKzIzNjc3S3CRETKEY', '0898776666', NULL, NULL, NULL),
(55, 'hanafinaufal01@gmail.com', '$2y$13$jcXMY3qgypS7ybnzr6yT8ef2idr1NEaq2gS2LUGhL9xp1T.lNBTDi', 'hanafi', 5, 1, 1, '1234', 'default.png', 'ISALAMMTYyOTcrbCtQUnFGQjg0UjEwa1JHNTlN_xpCCe_QTJ3eFUxdHc3aUY0NSsyVVB0KzIzNTM0S3CRETKEY', '089663773888', NULL, NULL, NULL),
(57, 'dani@gmail.com', '$2y$13$0McI4TbQfnuwCMLwG8b0ru0wCtursGWIwwHnoFDjP2PIancaRKjDO', 'Dani', 1, 1, 1, 'dani2309', '20221115_52c88b165a3a614a5e3ceac0074bad92d5bb1c0a.png', 'ISALAMMTY4NjUrNjNBclUwVXNmUUV3QWREdHdTZEx3UWV6_dbSAg_U0FzQUl2V0xQWEMxT1VKYUN5RmpoUlorNzg3NjY=S3CRETKEY', '6285234567890', '2023-06-25 05:30:37', '2023-07-10 20:38:30', 'ISALAMMTY4NjUrNjNBclUwVXNmUUV3QWREdHdTZEx3UWV6_dbSAg_U0FzQUl2V0xQWEMxT1VKYUN5RmpoUlorNzg3NjY=S3CRETKEY'),
(59, 'coba@gmail.com', '$2a$10$RuoGXXSk.p2GE3K4qReXo.C.49scU/MYpqkeNX7myqN.8G.a.bNQW', 'Coba', 3, 1, 1, '111', 'BBiG-bVwqebupfz5QKFLBC9POfSSyotT.jpg', 'ISALAMMTY4NzArMmc1SlZnRXJjb3Z1VG9WRFJhWm1zRjY1_KvWnc_cGVHOERnLWxyVTJnTXorQW5KSXdiYTl4Kzk0MTUzS3CRETKEY', '0987654321', NULL, '2023-05-27 11:20:17', 'ISALAMMTY4NTYrOGI2TnBCRHVUeENvVTRNMjg0N09R_aGrya_aTNSVDA3engtSTFJbzJrQThCSEYrMTE4NTY=S3CRETKEY'),
(92, 'admin_test@admin.com', '$2a$10$K0M0w.MgmG/Br6/2ZmUrUunOVDrAWg2eyIQMpko0tn4gbHC21o1hW\n', 'Pewakaf', 5, 1, 1, 'admintes', '20221103_bcc1409f060101848034c011ef5f09c20260be23.png', 'ISALAMMTYyNzIrSkNULU1vT0xHNXNIKzNQNk51NWFFS2_mpzQv_V2UGJiQk1hWnROUXR5Y2ZpVGtLeWpPKzE1NjYzS3CRETKEY', '6289658798162', '2021-11-26 15:26:59', '2022-10-26 10:48:52', NULL),
(93, 'satyaashilah2002@gmail.com', '$2y$13$ZMHOLyBoOkQVk6Y5cZhJ1eALjARAlBdQxHhed3Wh2m29/W1SEPUxW', 'Satya Ashilah', 5, 1, 1, 'shilah', 'XCaqeXS5DfJ7vg1qwe7CidELqOllCPK-.jpg', NULL, '62812345678990', '2022-11-16 14:47:35', '2022-12-10 22:40:27', NULL),
(94, 'aa@gmail.com', '$2y$13$AYpuNALppvX2ew3Db3FFS.1fyf3gUDIrpkZkFAWTOAKQM/iD6ZZEW', 'coba123', 5, NULL, NULL, '123456', '', NULL, '62812345678990', NULL, NULL, NULL),
(95, 'abogoboga@gmail.com', '$2y$13$h2dgaa1oa6aAK6PocQ9h2eM/nhqHvjIwDU9P9PimhsFw8hCDazRHu', 'abogoboga', 5, 1, 1, '123456', '', NULL, '628123456787', NULL, NULL, NULL),
(96, 'fararinty@gmail.com', '$2y$13$Xcdke5WEC4QZNXJwtr.umupS6KDl7yoPSIBC7tmdnKVXBbPNRtoD2', 'Farah', 5, 1, 1, '123456', '', NULL, '628123456786767', NULL, NULL, NULL),
(97, 'tes@gmail.com', '$2y$13$2GRqqZD0v1CVcgikx6F9y.QD1f0DrtjI8xIdKur2eIPkcR8YzGGVm', 'abogoboga', 5, NULL, NULL, '123456', '', NULL, '62812345678', NULL, '2023-02-02 09:19:58', NULL),
(98, 'olivercharlie101002@gmail.com', '$2y$13$EoN5CcN6BSPLvN3iaqRsV.hHHDNLeAHT2BpMbUXP.3hPYoT0l9d/G', 'Oliver', 5, 1, 1, '123456', '', NULL, '628587382738273', NULL, '2023-06-14 10:35:25', NULL),
(99, 'danibusiness23@gmail.com', '$2y$13$Bf8R/ZY/7uZZHcHO4yyO4..wR7lr7j1H1n7KZyKd046IvxbnXebxO', 'Oliver', 2, 0, 0, NULL, 'default.png', NULL, '085987654321', NULL, '2023-06-14 16:22:23', NULL),
(100, 'danibusines@gmail.com', '$2y$13$IAKFXEgeAv8DAxnbhNFkq.TbbfwyGi94Uqn7vSx4ze8e/u3FkSkyG', 'Oliver', 2, 0, 0, NULL, 'default.png', NULL, '085987654321323', NULL, NULL, NULL),
(101, 'akucobadaftar@gmail.com', '$2y$13$oX2HT85YsDb6q9ZHAASvzO3RveS4Af8Y58k4mlcY4YTi0Xj3vgj1S', 'Oliver', 2, 0, 0, NULL, 'default.png', NULL, '0859876', NULL, NULL, NULL),
(102, 'hcjgjgkg@gmail.com', '$2y$13$STlhYZlzvphpY.EineHdbuE55tN5Q.m7QwVLpsZpuAeiZf7tnREKS', 'Utrit', 2, 0, 0, NULL, 'default.png', NULL, '08686565353', NULL, NULL, NULL),
(103, 'danibusiness2344@gmail.com', '$2y$13$HQtQl/4d5W3DYYhJdkJzye6b/FNBdxBvOHcFCT4DxZj40u748kfI.', 'ydufjfufuc', 2, 0, 0, NULL, 'default.png', NULL, '58643535', NULL, NULL, NULL),
(104, 'danibusiness23445@gmail.com', '$2y$13$Rpz43zsBbNTwimQh/G55QORWsQFVkkt/SK2ChM61NBMTOLyaevX7e', 'ydufjfufucg', 2, 0, 0, NULL, 'default.png', NULL, '586435355', NULL, NULL, NULL),
(105, 'danibusiness245@gmail.com', '$2y$13$7rlcKvvcepH8RlCTBoXAH.LdyTTMH9s.88pcH1d0uos3fA3DRtEgm', 'ydufjfufucg', 2, 0, 0, NULL, 'default.png', NULL, '5864353556', NULL, NULL, NULL),
(106, 'ddff@gmail.com', '$2y$13$Hku8Z663IswnUQVPm4k2P.JWhJNDfTbKToUGIWhhVVEvCbfFqvsmO', 'Uttut7', 2, 0, 0, NULL, 'default.png', NULL, '253235', NULL, NULL, NULL),
(107, 'ddfff@gmail.com', '$2y$13$ctVUsgYGbhE71ttEggNEiO/vWW/Tl6ExztRnJ73oStZclhx9.SpeS', 'Uttut7', 2, 0, 0, NULL, 'default.png', NULL, '2532358', NULL, NULL, NULL),
(108, 'ddffrf@gmail.com', '$2y$13$dWzxPdXrp.zS4/jmDFTML.vxpKINKEHRZqvFYykZeRU9c6A4zp4SO', 'Uttut7', 2, 0, 0, NULL, 'default.png', NULL, '25323585', NULL, NULL, NULL),
(109, 'ddffgrf@gmail.com', '$2y$13$c16YBDNmqb3kp4DeTyhGrOKWjyXvpHa74Q4VNbuyMaulvGx0niebi', 'Uttut7', 2, 0, 0, NULL, 'default.png', NULL, '253235585', NULL, NULL, NULL),
(110, 'clararinssjani117@gmail.com', '$2y$13$OeJWKBZ1Zy4VIrmKa/Fl9Ot.iL46HA/1JdOZZh8hFEwj2GgRyg1.Wss', 'Uttut7', 2, 0, 0, NULL, 'default.png', NULL, '2532355855', NULL, NULL, NULL),
(111, 'clararinjdadani117@gmail.com', '$2y$13$yAgnjAYw6XZMfyfytyEq..GEt7nMGNPEbSnr09lOw.x.iza/AynwKdd', 'Clara', 2, 0, 0, NULL, 'default.png', NULL, '055568683', NULL, NULL, NULL),
(112, 'clararinjani117@gmail.comda', '$2y$13$8PJddf5PgBT2CxbknYshSyFeTebqtnVrC5wOXJ.BoZJ.V8dcV5fZEo6', 'Ufud', 2, 1, 1, NULL, 'default.png', NULL, '686865', NULL, NULL, NULL),
(113, 'clararinjani117@gmail.comdnada', '$2y$13$rdadaDumdCHh9Y8n4vT5sHBDKOkSzVQo76eJRZA6QBSCcDqiMwuGqXeby', 'Ugug8f8g8', 2, 1, 1, '', '', NULL, '6535353535656', NULL, NULL, NULL),
(114, 'clararinjani117@gmail.comdada', '$2y$13$n1g29E5X.ONeFpa1EpIuzurSawgYFv1Nxws/Q22hJC8gS301Ue8oK', 'Ufiffi', 2, 1, 1, NULL, 'default.png', NULL, '65353535', NULL, NULL, NULL),
(115, 'clararinjani117@gmail.comdsd', '$2y$13$CEWek6MTgQ4E0C0QnKzWoOSxxxBPk7VJQ2pj6bXzk46LJDjTzPu9C', 'Ufiffi', 2, 1, 1, NULL, 'default.png', NULL, '6535353555', NULL, NULL, NULL),
(116, 'clararinjani1sas17@gmail.com', '$2y$13$es8XJiODnwRCpirHz1Ra1OTcW/SiUuLQ258ex27SGVlb9M47yMrJOsas', 'Ufiffitt', 2, 1, 1, NULL, 'default.png', NULL, '653535355555', NULL, NULL, NULL),
(117, 'clararinadjani117@gmail.comda', '$2y$13$/F0X0TR4xVTukKnwqVEmhufZmOS779MC01hZpebNS8Fj0AeGWf32C', 'Dfgg', 2, 1, 1, NULL, 'default.png', NULL, '35353535353535', NULL, NULL, NULL),
(118, 'clararinjani117@gmail.comdad', '$2y$13$KVlCwaCV8ME/asGhTcUmZuluiE3aZjClNFKn9./P/z5oslKa/5urK', '8yiiti', 2, 1, 1, NULL, 'default.png', NULL, '6886865653', NULL, NULL, NULL),
(119, 'Ff@gmail.com', '$2y$13$OBcz52YAKbLo7rjeLn5TQOmgUKd0SHfByaiqGrNa2UFdChvD6vCwS', 'Farah', 2, 1, 1, NULL, 'default.png', 'ISALAMMTY4NjcrQUVlbmdITm5EUWd5WDBpUnY1dlc4_jIy8s_UEV5dkJNN1lwVS1VSUtUamgzN21OKzY4MDM2S3CRETKEY', '563517687', NULL, NULL, NULL),
(120, 'userku@gmail.com', '$2y$13$TJdTcLeF3c0PGP2/.HBie.ejj8HjHk8OEDTubnTdcA8T.WhqezRte', 'userku', 2, 1, 1, '1234', 'default.png', NULL, '8732897', NULL, NULL, NULL),
(121, 'Acds@gmail.com', '$2a$12$L4ppHZ6oK1jaasn5nZkD1ugV7qP9K3I4/geZeZx6nUwq1iTwTLFvi', 'Fjddk', 2, 1, 1, NULL, 'default.png', 'ISALAMMTY4NjgrOFFhT1pEeE1MekUyU3JrMUtL_AosAh_VWpuckt3dm1mMnotdFM1NVQrMzAyNTE=S3CRETKEY', '956565', NULL, NULL, NULL),
(122, 'alfan@gmail.com', '$2a$10$imHyTZ5svKcNprk65.Ng/e/1fT32Tg6oF5rUd01PAmcRYL.YXdpH.', 'Alfan', 2, 1, 1, NULL, 'default.png', 'ISALAMMTY4NzIrSHdJMm44NFozT2F4c3pHZ3JuZC1uen_vW-6L_lORmxFeUViUkM3Tit1RDN0ZHpyUis5ODUzNA==S3CRETKEY', '085334954057', NULL, NULL, NULL),
(123, 'angga@gmail.com', '$2a$10$kS917f2k.yIUUzvN8G1ayOKBCRRusSaa2b9taFxgBgG7M.jGogHby', 'Angga', 2, 1, 1, NULL, 'default.png', 'ISALAMMTY4NzIreTdIa2lXWTViT2hGNWw5ZGVn_LIFIu_V3NMeEpCMkcwVXF3Nk5UNkFyKzk4ODg0S3CRETKEY', '0875565228', NULL, NULL, NULL),
(124, 'fff@gmail.com', '$2y$13$KfHsHHlZT/KvA8DLd4HOF.e3st57D063EoGLpjzj7ndMBiBkuz8Oy', 'Aaa', 2, 1, 1, NULL, 'default.png', 'ISALAMMTY4NzIrUGJFTFpCOHktdjZvdFE2_CgF-O_M2FRNTQ0cUt1Sk95MEROKzk5MDMyS3CRETKEY', '555', NULL, NULL, NULL),
(125, 'coba1@gmail.com', '$2y$13$VYnmvcD2l1cQ0f5CtLlGdOxDgQqHVGeyqx16xg7glRMiePV5yjcya', 'Percobaan', 2, 1, 1, NULL, 'default.png', 'ISALAMMTY4NzYreXh5R3ZuRUxocVNoTWNUTjlmc0xp_icx4j_YWh4RHJmOTFpM252MG5ReS1jUXhuKzE4MjI0S3CRETKEY', '08987654321', NULL, NULL, NULL),
(126, 'coba2@gmail.com', '$2y$13$Sfs4ajmCRefQBbd4FKAq2.DB5M6QrScFI6JcLmvv.lQF.vVdgkwCy', 'Percobaan Daftar', 2, 1, 1, NULL, 'default.png', 'ISALAMMTY4NzYrbWxsUGZ3UFhXME93N05TSWtBSFVF_N-ySZ_dm5LMHU3MEp3Vk1qRkRvUEJ3RkhQKzIyNDY4S3CRETKEY', '0897654321', NULL, NULL, NULL),
(127, 'coba11@gmail.com', '$2y$13$PeYuDmbXtfCjmk.Ee0GooeM6V72r.SBs5Q7LfvaQXeXsY2YtCrrp6', 'Percobaan 1', 2, 1, 1, NULL, 'default.png', 'ISALAMMTY4NzYrK0ZmVktqUzNCUVpLdXRjQm5V_iwskr_Zy0wbWd3R0FPSC16dU1JU1orMjI3MTA=S3CRETKEY', '089876543212', NULL, NULL, NULL),
(128, 'coba3@gmail.com', '$2y$13$TPIzQtEXy4v6RijpHtywBuyKhP6J3rT/hSf0J6O9T/PF6ROJiAbvS', 'Percobaan 3', 2, 1, 1, NULL, 'default.png', 'ISALAMMTY4NzYrR3pJWGk1RVk1aWoxTXhCeTU1_4B0UY_NTc2MGZac3hDOENlTHg4ZSs2NjczOQ==S3CRETKEY', '089876543213', NULL, NULL, NULL),
(129, 'dani1@gmail.com', '$2y$13$azK6kPXHANUenbauAdH5V.dWwvE2Q5oWPyR4Od11o18Lttv2des32', 'Achmad Khairul Madani', 2, 1, 1, NULL, 'default.png', 'ISALAMMTY4NzYrSlE4MVpKdGxiYnBEblZZQmJESWhwYX_wRZp9_lWR2o2alMraCtrSVFZV1ZlU2lRTnJQKzgxNTI4S3CRETKEY', '0898765432123', NULL, NULL, NULL),
(131, 'aaa@gmail.com', '$2y$13$zdGhao1kyUgB.P1yTHJCM.BUMG/z3WjSGWn/gngbKdsxLalGyojGy', 'Percobaan', 2, 1, 1, NULL, 'default.png', 'ISALAMMTY4NzYrNGV3VjZRQVdKbzA1UEpUdTlv_7XXje_LTRGTjhXR1RlNzl6ZDAxRzcrODE1ODY=S3CRETKEY', '0000000', NULL, NULL, NULL),
(132, 'coba5@gmail.com', '$2y$13$k2uhU5ty4jDWYwbjurn.oOpb4dHI8Pzn1WKoMbrReNCp4k03BkKdO', 'Percobaan 5', 2, 1, 1, NULL, 'default.png', 'ISALAMMTY4NzYrQXBBYTNOMHVWWFA0ejBONzlJTVIx_E+ALe_LUJTeS15TW1lcE1tMTlFOCtVbzNvKzgxNzQxS3CRETKEY', '08987654334', NULL, NULL, NULL),
(133, 'coba23@gmail.com', '$2y$13$WNHctvQnbRUpTBBiRhPUg.SzMUUFWW8DnWd37PVeRrJGhN2nqAsRW', 'Percobaan 23', 2, 1, 1, NULL, 'default.png', 'ISALAMMTY4NzYrQllnMklScGNLQU1WeDBHSnR4SF_bvfW-_Qrekk2VlVZNUMtdGZ6QU0yRCs4MjI0OQ==S3CRETKEY', '085749632', NULL, NULL, NULL),
(134, 'coba55@gmail.com', '$2y$13$4DrWYaxYOD74SQylPQimjO7pMY7T7qlQQ1LOh84UKTHy.TxyiTDQm', 'Coba 55', 2, 1, 1, NULL, 'default.png', 'ISALAMMTY4NzYra1A5UHItSWEwdDlXc04zWi03LTlU_HpK+6_bnIzcmk5Zmh5dFh2SnduMGNJVnZDKzgyODQ2S3CRETKEY', '0854647231', NULL, NULL, NULL),
(135, 'erik1@gmail.com', '$2y$13$Mxlwfj1WWPrsVundE693re90YysEvn3L9ciJxo5xKkyK47AeQzjwy', 'Erik', 2, 1, 1, NULL, 'default.png', 'ISALAMMTY4NzYralk2MTFUUnZ0WXB4NExMYTM1YkZlc0hsNG_E4GK7_FsUXZ5c3VyOERXQ2hRZ1JKN0RoQWwwQk4rODMyMzQ=S3CRETKEY', '0853214758', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `action`
--
ALTER TABLE `action`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `afliasi`
--
ALTER TABLE `afliasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `agenda_pendanaan`
--
ALTER TABLE `agenda_pendanaan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pendanaan_id` (`pendanaan_id`);

--
-- Indeks untuk tabel `amanah_pendanaan`
--
ALTER TABLE `amanah_pendanaan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pendanaan_id` (`pendanaan_id`);

--
-- Indeks untuk tabel `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategori_berita_id` (`kategori_berita_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `hubungi_kami`
--
ALTER TABLE `hubungi_kami`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tema_hubungi_kami_id` (`tema_hubungi_kami_id`);

--
-- Indeks untuk tabel `jenis_pembayaran`
--
ALTER TABLE `jenis_pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori_berita`
--
ALTER TABLE `kategori_berita`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori_pendanaan`
--
ALTER TABLE `kategori_pendanaan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kegiatan_pendanaan`
--
ALTER TABLE `kegiatan_pendanaan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `agenda_pendanaan_id` (`pendanaan_id`);

--
-- Indeks untuk tabel `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `lembaga_penerima`
--
ALTER TABLE `lembaga_penerima`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `marketing_data_user`
--
ALTER TABLE `marketing_data_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk-marketing-data-user-to-user-table` (`user_id`),
  ADD KEY `fk-marketing-data-user-bank` (`bank_id`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Indeks untuk tabel `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `organisasi`
--
ALTER TABLE `organisasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `otp`
--
ALTER TABLE `otp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `partner_pendanaan`
--
ALTER TABLE `partner_pendanaan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pendanaan_id` (`pendanaan_id`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk-pembayaran-user` (`user_id`),
  ADD KEY `fk-pembayaran-pendanaan` (`pendanaan_id`),
  ADD KEY `fk-pembayaran-status` (`status_id`),
  ADD KEY `jenis_pembayaran_id` (`jenis_pembayaran_id`(191));

--
-- Indeks untuk tabel `pencairan`
--
ALTER TABLE `pencairan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pendanaan_id` (`pendanaan_id`);

--
-- Indeks untuk tabel `pendanaan`
--
ALTER TABLE `pendanaan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk-pendanaan-user` (`user_id`),
  ADD KEY `fk-pendanaan-ketegori-pendanaan` (`kategori_pendanaan_id`),
  ADD KEY `fk-status-pendanaan` (`status_id`),
  ADD KEY `bank_id` (`bank_id`);

--
-- Indeks untuk tabel `penyaluran`
--
ALTER TABLE `penyaluran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `role_action`
--
ALTER TABLE `role_action`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `action_id` (`action_id`);

--
-- Indeks untuk tabel `role_menu`
--
ALTER TABLE `role_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Indeks untuk tabel `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tema_hubungi_kami`
--
ALTER TABLE `tema_hubungi_kami`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `action`
--
ALTER TABLE `action`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;

--
-- AUTO_INCREMENT untuk tabel `afliasi`
--
ALTER TABLE `afliasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `agenda_pendanaan`
--
ALTER TABLE `agenda_pendanaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `amanah_pendanaan`
--
ALTER TABLE `amanah_pendanaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `bank`
--
ALTER TABLE `bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `hubungi_kami`
--
ALTER TABLE `hubungi_kami`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT untuk tabel `jenis_pembayaran`
--
ALTER TABLE `jenis_pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `kategori_berita`
--
ALTER TABLE `kategori_berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kategori_pendanaan`
--
ALTER TABLE `kategori_pendanaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `kegiatan_pendanaan`
--
ALTER TABLE `kegiatan_pendanaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `lembaga_penerima`
--
ALTER TABLE `lembaga_penerima`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `marketing_data_user`
--
ALTER TABLE `marketing_data_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT untuk tabel `organisasi`
--
ALTER TABLE `organisasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `otp`
--
ALTER TABLE `otp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT untuk tabel `partner_pendanaan`
--
ALTER TABLE `partner_pendanaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=237;

--
-- AUTO_INCREMENT untuk tabel `pencairan`
--
ALTER TABLE `pencairan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `pendanaan`
--
ALTER TABLE `pendanaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT untuk tabel `penyaluran`
--
ALTER TABLE `penyaluran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `role_action`
--
ALTER TABLE `role_action`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1821;

--
-- AUTO_INCREMENT untuk tabel `role_menu`
--
ALTER TABLE `role_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=401;

--
-- AUTO_INCREMENT untuk tabel `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `slides`
--
ALTER TABLE `slides`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tema_hubungi_kami`
--
ALTER TABLE `tema_hubungi_kami`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `agenda_pendanaan`
--
ALTER TABLE `agenda_pendanaan`
  ADD CONSTRAINT `agenda_pendanaan_ibfk_2` FOREIGN KEY (`pendanaan_id`) REFERENCES `pendanaan` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `amanah_pendanaan`
--
ALTER TABLE `amanah_pendanaan`
  ADD CONSTRAINT `amanah_pendanaan_ibfk_1` FOREIGN KEY (`pendanaan_id`) REFERENCES `pendanaan` (`id`);

--
-- Ketidakleluasaan untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD CONSTRAINT `berita_ibfk_1` FOREIGN KEY (`kategori_berita_id`) REFERENCES `kategori_berita` (`id`),
  ADD CONSTRAINT `berita_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Ketidakleluasaan untuk tabel `hubungi_kami`
--
ALTER TABLE `hubungi_kami`
  ADD CONSTRAINT `hubungi_kami_ibfk_1` FOREIGN KEY (`tema_hubungi_kami_id`) REFERENCES `tema_hubungi_kami` (`id`);

--
-- Ketidakleluasaan untuk tabel `marketing_data_user`
--
ALTER TABLE `marketing_data_user`
  ADD CONSTRAINT `fk-marketing-data-user-bank` FOREIGN KEY (`bank_id`) REFERENCES `bank` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk-marketing-data-user-to-user-table` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `menu` (`id`);

--
-- Ketidakleluasaan untuk tabel `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD CONSTRAINT `notifikasi_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Ketidakleluasaan untuk tabel `otp`
--
ALTER TABLE `otp`
  ADD CONSTRAINT `otp_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Ketidakleluasaan untuk tabel `partner_pendanaan`
--
ALTER TABLE `partner_pendanaan`
  ADD CONSTRAINT `partner_pendanaan_ibfk_1` FOREIGN KEY (`pendanaan_id`) REFERENCES `pendanaan` (`id`);

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `fk-pembayaran-status` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk-pembayaran-user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembayaran_ibfk_2` FOREIGN KEY (`pendanaan_id`) REFERENCES `pendanaan` (`id`);

--
-- Ketidakleluasaan untuk tabel `pencairan`
--
ALTER TABLE `pencairan`
  ADD CONSTRAINT `pencairan_ibfk_1` FOREIGN KEY (`pendanaan_id`) REFERENCES `pendanaan` (`id`);

--
-- Ketidakleluasaan untuk tabel `pendanaan`
--
ALTER TABLE `pendanaan`
  ADD CONSTRAINT `fk-pendanaan-ketegori-pendanaan` FOREIGN KEY (`kategori_pendanaan_id`) REFERENCES `kategori_pendanaan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk-pendanaan-user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk-status-pendanaan` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pendanaan_ibfk_1` FOREIGN KEY (`bank_id`) REFERENCES `bank` (`id`);

--
-- Ketidakleluasaan untuk tabel `role_action`
--
ALTER TABLE `role_action`
  ADD CONSTRAINT `role_action_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`),
  ADD CONSTRAINT `role_action_ibfk_2` FOREIGN KEY (`action_id`) REFERENCES `action` (`id`);

--
-- Ketidakleluasaan untuk tabel `role_menu`
--
ALTER TABLE `role_menu`
  ADD CONSTRAINT `role_menu_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`),
  ADD CONSTRAINT `role_menu_ibfk_2` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`);

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
