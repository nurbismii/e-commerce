-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2021 at 05:39 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id_kategori`, `kategori`) VALUES
(1, 'Baju'),
(2, 'Celana'),
(3, 'Sepatu'),
(4, 'Sweater'),
(5, 'Kacamata');

-- --------------------------------------------------------

--
-- Table structure for table `detail_order`
--

CREATE TABLE `detail_order` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `produk` char(20) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_order`
--

INSERT INTO `detail_order` (`id`, `order_id`, `produk`, `qty`, `harga`) VALUES
(55, 78, 'B004', 1, '50000'),
(56, 79, 'B005', 1, '150000');

-- --------------------------------------------------------

--
-- Table structure for table `no_rek`
--

CREATE TABLE `no_rek` (
  `id_norek` int(11) NOT NULL,
  `nama_bank` varchar(64) NOT NULL,
  `no_rek` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `no_rek`
--

INSERT INTO `no_rek` (`id_norek`, `nama_bank`, `no_rek`) VALUES
(1, 'Bank Mandiri a/n DFIZA STORE', '111 1111 111'),
(2, 'Bank BNI a/n DFIZA STORE', '222 222 2222');

-- --------------------------------------------------------

--
-- Table structure for table `ordeer`
--

CREATE TABLE `ordeer` (
  `id` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `transaksi_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ordeer`
--

INSERT INTO `ordeer` (`id`, `tanggal`, `transaksi_id`) VALUES
(78, '2021-07-08 07:58:48', 79),
(79, '2021-07-08 08:00:39', 80);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id_produk` char(10) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `foto` varchar(225) DEFAULT 'default.jpg',
  `deskripsi` varchar(225) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id_produk`, `id_kategori`, `nama`, `harga`, `jumlah`, `foto`, `deskripsi`, `created_at`, `updated_at`) VALUES
('B004', 1, 'Baju Pantai ', 50000, 1, 'B004.jpg', 'Baju pantai pria kain sangat halus', '2021-07-08 04:02:48', '2021-07-08 07:58:48'),
('B005', 1, 'Baju Kemeja', 150000, 4, 'B005.jpg', 'Baju Kemeja keren untuk pria', '2021-07-07 05:20:00', '2021-07-08 08:00:39'),
('B006', 1, 'Baju Santai', 50000, 4, 'B006.jpg', 'Baju santai motif bunga bunga', '2021-07-08 05:22:14', '2021-07-08 07:00:41'),
('C001', 2, 'Jeans Denim 1945', 300000, 7, 'C001.jpg', 'Denim blalalalalalala~', '2021-07-02 12:34:43', '2021-07-08 07:05:33'),
('K001', 5, 'Kacamata Hitam Pria Aviation Polarized UV400 Anti Silau', 30000, 9, 'K001.jpeg', 'Paket Pembelian Gratis 1.Hard Case Original 2.Lap Kain Kacamata 3.Tester Card(Membuktikan kacamata original) 4.Sarung Kacamata', '2021-07-06 14:07:41', '2021-07-08 05:22:42'),
('K002', 5, 'Kacamata Hitam Pria Aviation Polarized UV401 Anti Silau', 150000, 5, 'K002.jpg', 'Kacamata anti radiasi Aviaton Polarized UV', '2021-07-03 10:08:40', NULL),
('S002', 3, 'SEPATU VANS OLDSKOOL CLASSIC NAVY WHITE ORIGINAL BNIB TERMURAH', 450000, 9, 'S002.jpg', 'VANS CLASSIC OLDSKOOL NAVY WHITE GLOBAL', '2021-07-01 09:13:11', '2021-07-08 04:32:46'),
('SW01', 4, 'Sweater', 150000, 5, 'SW01.jpg', 'Sweater WanitaÂ bahan FLEECE ukuran REMAJA-DEWASA Ukuran M, Lebar 98, Panjang 58 Ukuran L, Lebar 102, Panjang 62', '2021-07-05 13:25:02', '2021-07-05 13:25:02');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `role` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `role`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_temp`
--

CREATE TABLE `transaksi_temp` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(64) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `telp` varchar(16) NOT NULL,
  `status` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi_temp`
--

INSERT INTO `transaksi_temp` (`id`, `id_user`, `nama`, `email`, `alamat`, `telp`, `status`) VALUES
(79, 7, 'Dfiza', 'dfiza@gmail.com', 'Jl Kebayoran', '085282810040', 'Selesai'),
(80, 1, 'Nur Bismi', 'admin@gmail.com', 'Jl Kebayoran', '085282810040', 'Proses');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `email` varchar(128) NOT NULL,
  `picture` varchar(225) DEFAULT 'default.jpg',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `id_role`, `nama`, `username`, `password`, `email`, `picture`, `created_at`) VALUES
(1, 1, 'Nur Bismi', 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 'admin@gmail.com', 'default.jpg', '2021-07-01 14:31:12'),
(7, 2, 'Dfiza', 'user', '827ccb0eea8a706c4c34a16891f84e7b', 'dfiza@gmail.com', 'default.jpg', '2021-07-02 06:08:24'),
(8, 2, 'Mayang', 'mayang', '827ccb0eea8a706c4c34a16891f84e7b', 'mayang@gmail.com', 'default.jpg', '2021-07-02 06:10:50'),
(9, 2, 'Iswan', 'iswan', '827ccb0eea8a706c4c34a16891f84e7b', 'iswan.hamdah@gmail.com', '.jpg', '2021-07-02 12:31:01');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_order`
-- (See below for the actual view)
--
CREATE TABLE `v_order` (
`id` int(11)
,`nama` varchar(128)
,`email` varchar(64)
,`alamat` varchar(225)
,`telp` varchar(16)
,`status` varchar(32)
,`tanggal` timestamp
,`qty` int(11)
,`harga` varchar(20)
,`nama_produk` varchar(225)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_products`
-- (See below for the actual view)
--
CREATE TABLE `v_products` (
`id_produk` char(10)
,`nama` varchar(225)
,`jumlah` int(11)
,`harga` int(11)
,`deskripsi` varchar(225)
,`foto` varchar(225)
,`kategori` varchar(64)
);

-- --------------------------------------------------------

--
-- Structure for view `v_order`
--
DROP TABLE IF EXISTS `v_order`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_order`  AS  select `transaksi_temp`.`id` AS `id`,`transaksi_temp`.`nama` AS `nama`,`transaksi_temp`.`email` AS `email`,`transaksi_temp`.`alamat` AS `alamat`,`transaksi_temp`.`telp` AS `telp`,`transaksi_temp`.`status` AS `status`,`ordeer`.`tanggal` AS `tanggal`,`detail_order`.`qty` AS `qty`,`detail_order`.`harga` AS `harga`,`product`.`nama` AS `nama_produk` from (((`transaksi_temp` join `ordeer` on(`transaksi_temp`.`id` = `ordeer`.`transaksi_id`)) join `detail_order` on(`ordeer`.`id` = `detail_order`.`order_id`)) join `product` on(`detail_order`.`produk` = `product`.`id_produk`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_products`
--
DROP TABLE IF EXISTS `v_products`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_products`  AS  select `product`.`id_produk` AS `id_produk`,`product`.`nama` AS `nama`,`product`.`jumlah` AS `jumlah`,`product`.`harga` AS `harga`,`product`.`deskripsi` AS `deskripsi`,`product`.`foto` AS `foto`,`category`.`kategori` AS `kategori` from (`product` join `category`) where `product`.`id_kategori` = `category`.`id_kategori` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `detail_order`
--
ALTER TABLE `detail_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `no_rek`
--
ALTER TABLE `no_rek`
  ADD PRIMARY KEY (`id_norek`);

--
-- Indexes for table `ordeer`
--
ALTER TABLE `ordeer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_kategori_2` (`id_kategori`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `transaksi_temp`
--
ALTER TABLE `transaksi_temp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_role` (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `detail_order`
--
ALTER TABLE `detail_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `no_rek`
--
ALTER TABLE `no_rek`
  MODIFY `id_norek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ordeer`
--
ALTER TABLE `ordeer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaksi_temp`
--
ALTER TABLE `transaksi_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
