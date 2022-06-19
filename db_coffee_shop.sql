-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2022 at 04:19 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_coffee_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `kritik_saran`
--

CREATE TABLE `kritik_saran` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `kritik` text NOT NULL,
  `saran` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kritik_saran`
--

INSERT INTO `kritik_saran` (`id`, `id_user`, `kritik`, `saran`, `created_at`) VALUES
(2, 1, 'asdlk', 'asdk', '2022-05-28 13:47:05'),
(3, 1, 'asd', 'asd', '2022-05-28 13:47:05'),
(4, 1, 'asdqw', 'weq', '2022-05-28 13:47:05'),
(5, 1, 'qwek', 'lasd\r\n', '2022-05-28 13:47:05'),
(6, 1, 'as,dm', 'wkljdm', '2022-05-28 13:47:05'),
(7, 1, 'klfdcv', 'oerm\r\n', '2022-05-28 13:47:05'),
(8, 1, 'Hello', 'World', '2022-05-28 13:47:05');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `kopi` varchar(128) NOT NULL,
  `deskripsi` varchar(1024) NOT NULL,
  `image` varchar(128) NOT NULL,
  `harga` varchar(128) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `kopi`, `deskripsi`, `image`, `harga`, `date_created`) VALUES
(1, 'Espresso', 'Minuman kopi paling dasar ini biasanya disajikan dalam demitasse alias cangkir khusus espresso berukuran 30 mililiter (satu shot) sampai 118 mililiter. Espresso bertekstur pekat dan pahit, dengan buih putih alias crema di atasnya yang terbentuk dari tekanan minyak dalam bijih kopi.', 'espresso.jpg', '30000', '0000-00-00 00:00:00'),
(2, 'Ristretto', 'Dalam bahasa Italia, ristretto berarti \"terbatas\" atau \"terlarang\". Serupa dengan espresso, hanya saja takaran air dalam minuman ini lebih sedikit. Namun, waktu press dalam pembuatan ristretto sama dengan espresso.', 'ristretto.jpg', '32000', '0000-00-00 00:00:00'),
(3, 'Americano', 'Americano terdiri dari satu shot espresso yang dituangkan dalam cangkir berukuran 178 mililiter yang dicampur dengan air panas hingga memenuhi gelas. Jenis lainnya adalah doppio, yakni segelas Americano dengan dua shot espresso. Minuman ini kerap disajikan dalam panas maupun dingin yang disebut iced Americano.', 'americano.jpg', '33000', '0000-00-00 00:00:00'),
(4, 'Cappuccino', 'Kamu pasti selalu menemukan cappuccino dalam buku menu tiap kali pergi ke kedai kopi, atau bahkan kafe-kafe biasa. Cappuccino adalah olahan espresso yang paling banyak digemari, terutama bagi penikmat kopi dengan rasa lebih mild.\r\n\r\nMinuman ini terdiri dari espresso dan steamed milk dengan rasio 1:1. Namun, ada juga yang memakai perbandingan 1/3 espresso, 1/3 steamed milk, dan 1/3 susu foam. Biasanya disajikan dalam cangkir berkapasitas 88 mililiter hingga 177 mililiter.', 'cappuccino.jpg', '35000', '0000-00-00 00:00:00'),
(5, 'Macchiato', 'Kalau kamu gak terlalu menikmati kopi yang cenderung pahit, kamu bisa pesan macchiato sebagai alternatif. Rasio steamed milk dalam minuman ini lebih besar dari espresso, sehingga ada sentuhan milky dan gurih. \r\n\r\nBiasanya semua olahan kopi di coffee shop autentik tidak menambahkan pemanis, tapi kamu bisa meminta barista untuk menyertakan gula dalam minumanmu.', 'macchiato.jpg', '37000', '0000-00-00 00:00:00'),
(6, 'Cortado', 'Dalam bahasa Spanyol, cotardo artinya \"memotong\". Banyak orang yang menyamakan cortado dengan macchiato karena komposisinya mirip. Namun perbandingan espresso dan steamed milk cortado biasanya 1:1, meski di sejumlah tempat ada yang memakai rasio 1:2.', 'cortado.jpg', '39000', '0000-00-00 00:00:00'),
(7, 'Latte', 'Perlu diingat, latte dan cappuccino adalah dua jenis racikan berbeda. Demikian dengan komposisi dan rasio bahannya. Latte biasanya menggunakan perbandingan espresso dan susu 2:1. Selain rasanya nikmat, latte biasanya disajikan dalam cangkir dengan motif indah di atasnya atau yang banyak disebut latte art.', 'latte.jpg', '41000', '0000-00-00 00:00:00'),
(8, 'Flat White', 'Banyak pengertian berbeda mengenai olahan minuman berbasis espresso satu ini. Ada yang menyebut kalau flat white termasuk latte, sebagian beranggapan kalau ini merupakan cappuccino tanpa foam.\r\n\r\nFlat white biasanya terdiri dari 60 mililiter textured milk alias microfoam atau gelembung yang terbentuk saat susu dipanaskan. Kemudian dua shot espresso dituang di atasnya dan dicampur menjadi satu.', 'flat-white.jpg', '43000', '0000-00-00 00:00:00'),
(9, 'Affogato', 'Sederhananya, affogato adalah es krim vanila yang dituang espresso shot. Paduan pahitnya kopi hitam dan es krim yang manis dan lembut menciptakan sensasi rasa menyenangkan. Apalagi saat es krim perlahan meleleh begitu tersiram espresso.', 'affogato.jpg', '44000', '0000-00-00 00:00:00'),
(10, 'Mocaccino', 'Espresso, susu, dan cokelat merupakan paduan ideal dari secangkir moccacino. Dibanding kopi, lembutnya cokelat dan susu lebih mendominasi. Biasanya minuman ini menggunakan cokelat bubuk untuk campuran dan garnish, tapi ada juga yang memakai sirup cokelat di atasnya.', 'mocaccino.jpg', '45000', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `no_pesanan` int(11) NOT NULL,
  `total_bayar` varchar(128) NOT NULL DEFAULT '0',
  `is_reservasi` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `id_user` int(11) DEFAULT NULL,
  `tgl_pengajuan` date DEFAULT NULL,
  `jml_cust` int(11) DEFAULT NULL,
  `ket` text DEFAULT NULL,
  `bukti_pembayaran` varchar(255) DEFAULT NULL,
  `is_lunas` tinyint(4) NOT NULL DEFAULT 0,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `no_pesanan`, `total_bayar`, `is_reservasi`, `id_user`, `tgl_pengajuan`, `jml_cust`, `ket`, `bukti_pembayaran`, `is_lunas`, `date_created`) VALUES
(4, 1, '65000', 0, 1, '0000-00-00', 0, '', NULL, 1, '2022-05-28 14:01:01'),
(5, 2, '78000', 1, 1, '2022-05-28', 2, 'asdk', 'words-of-the-week-48_2015.jpg', 1, '2022-05-28 14:01:38'),
(6, 3, '32000', 1, 1, '2022-05-28', 2, 'sa', 'words-of-the-week-48_2015.jpg', 0, '2022-05-28 14:03:55'),
(7, 4, '32000', 0, 1, '0000-00-00', 0, '', NULL, 1, '2022-05-31 06:59:21');

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `nominal` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengeluaran`
--

INSERT INTO `pengeluaran` (`id`, `judul`, `keterangan`, `nominal`, `created_at`) VALUES
(0, 'testing', 'asdlkasd', 200000, '2022-06-19 13:58:57'),
(0, 'beli gas', 'asdasd', 20000, '2022-06-19 14:17:38');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(11) NOT NULL,
  `no_pesanan` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `quantity` int(2) NOT NULL,
  `subtotal` varchar(128) NOT NULL,
  `id_user` int(11) NOT NULL,
  `lunas` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id`, `no_pesanan`, `menu_id`, `quantity`, `subtotal`, `id_user`, `lunas`) VALUES
(5, 1, 1, 1, '30000', 1, 1),
(6, 1, 4, 1, '35000', 1, 1),
(7, 2, 3, 1, '33000', 1, 1),
(8, 2, 10, 1, '45000', 1, 1),
(9, 3, 2, 1, '32000', 1, 1),
(10, 4, 2, 1, '32000', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','customer') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `no_telp`, `username`, `password`, `role`) VALUES
(1, 'oong26', '', 'oong26', '$2y$10$byrgQu3iTBPvt33wkm7BFOyziwpYmoSC0m5iuE37/bwzxXeXojRhC', 'customer'),
(4, 'khalil', '', 'khalil', '$2y$10$RHwW3sanAixYhPRTq9DYkOH042nG6Eh.mIUymeuVFTKX55mmeJIdS', 'customer'),
(5, 'kasir', '08514452568', 'kasir', '$2y$10$byrgQu3iTBPvt33wkm7BFOyziwpYmoSC0m5iuE37/bwzxXeXojRhC', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kritik_saran`
--
ALTER TABLE `kritik_saran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kritik_saran`
--
ALTER TABLE `kritik_saran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `foreign_pembayaran_id_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `foreign_pesanan_id_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
