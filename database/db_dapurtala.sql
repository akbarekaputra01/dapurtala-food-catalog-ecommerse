-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 17, 2024 at 01:15 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_dapurtala`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `varian_produk` varchar(50) NOT NULL,
  `harga_produk` int(50) NOT NULL,
  `foto_produk` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`id_produk`, `nama_produk`, `varian_produk`, `harga_produk`, `foto_produk`) VALUES
(7, 'Ricebowl Dapur Tala', 'Ayam Teriyaki', 15000, 'RicebowlDTalaAyamTeriyaki15000.jpg'),
(8, 'Ricebowl Dapur Tala', 'Cumi Cabe Ijo', 15000, '8RicebowlDapurTala.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ulasan`
--

CREATE TABLE `tb_ulasan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `role_pelanggan` varchar(50) NOT NULL,
  `foto_pelanggan` varchar(50) NOT NULL,
  `ulasan_pelanggan` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate_pelanggan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_ulasan`
--

INSERT INTO `tb_ulasan` (`id_pelanggan`, `nama_pelanggan`, `role_pelanggan`, `foto_pelanggan`, `ulasan_pelanggan`, `rate_pelanggan`) VALUES
(123456807, 'Mba Tamara', 'Customer', '123456807MbaTamara.jpg', 'Makasih bu, cuminya enak bu. Cuma menurutku nasinya kurang pulen sedikit bu,. Selebihnya mantul. i like it', '5'),
(123456812, 'Mba Tamara', 'Customer', '', 'Varian cumi asinnya enak, ga pernah gagal memang owner-nya dlm memasak tumis cumi asin. Untuk harga pas di kantong emak emak anak satu. Sukses terus dapur tala', '5'),
(123456813, 'Bu Isti', 'Customer', '', 'Enak bu masakannya Terima kasih ya ', '5'),
(123456814, 'Miss Naniek', 'Customer', '', 'Rasanya pas..asinnya pas..pedesnya pas..nasinya juga lembuuut....mantul ', '5'),
(123456815, 'Miss Naniek', 'Customer', '', 'Oh iya aku suka cabenya dipotong tipis..jadi bisa ikut dimasak', '5'),
(123456821, 'Dimas XII TEI 2', 'Siswa', '', 'Enak bu', '5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `tb_ulasan`
--
ALTER TABLE `tb_ulasan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_ulasan`
--
ALTER TABLE `tb_ulasan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123456823;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
