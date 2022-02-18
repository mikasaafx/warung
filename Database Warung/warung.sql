-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2022 at 03:24 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `warung`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jenis_brg` varchar(50) NOT NULL,
  `harga` int(10) NOT NULL,
  `stok` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `nama`, `jenis_brg`, `harga`, `stok`) VALUES
(1, 'kecap abc', 'bumbu', 2100, 250),
(2, 'indomie goreng', 'mie', 2500, 150),
(3, 'garam ibu bijak', 'bumbu', 1000, 70),
(4, 'royco', 'bumbu dapur', 500, 242),
(5, 'soklin lantai', 'minuman', 3000, 210),
(6, 'permen miilkita', 'makanan ringan', 500, 75),
(7, 'sunlight', 'sabun', 3000, 30),
(8, 'soklin', 'sabun', 500, 50),
(9, 'pop mie', 'mie', 4000, 145),
(10, 'daya', 'sabun', 2000, 120),
(11, 'energen', 'minuman', 2000, 170),
(12, 'milo', 'minuman', 2000, 50),
(16, 'teh pucuk', 'minuman', 3000, 250),
(18, 'sukro', 'Makanan ringan', 500, 400),
(19, 'cotton bud', 'Kecantikan & kesehatan', 3000, 100),
(20, 'colokan terminal', 'Lainnya', 30000, 10),
(21, 'sukro', 'Makanan ringan', 500, 400),
(22, 'betadine', 'Kecantikan & kesehatan', 5000, 20),
(23, 'mie sukses', 'mie instan', 3000, 50),
(24, 'teh gelas', 'minuman', 1000, 100),
(28, 'soklin lantai', 'sabun', 3000, 210),
(29, 'teh pucuk', 'minuman', 3000, 250),
(33, 'tea jus lemon', 'minuman', 500, 100),
(35, 'teh hijau', 'minuman', 1000, 40),
(36, 'kopikap', 'minuman', 1000, 100),
(38, '', 'bumbu', 0, 0),
(39, 'sd', 'bumbu', 0, 0),
(40, 'kuaci', 'makanan ringan', 500, 50),
(41, 'eweas', 'mie', 0, 0),
(44, 'wqwqw', 'bumbu', 122, 121);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(20) NOT NULL,
  `no_hp` char(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `no_hp`) VALUES
(1, 'udinnnn', 'ciherang', '0874644533'),
(2, 'asep', 'cihuahua', '0812345667'),
(3, 'jajang', 'cireong', '089776443'),
(4, 'kosim', 'cimaragas', '0833362443'),
(5, 'ika', 'cireong', '08971176443'),
(6, 'yusuf', 'cijambe', '085126443'),
(7, 'udin', 'cireong', '081776443'),
(9, 'ucok', 'cibeunteur', '08872121315'),
(11, 'ayang', 'cibeunteur', '088847464'),
(12, 'ucok', 'cibeunteur', '08976454533434'),
(13, 'dasim', 'cibeunteur', '08373365454'),
(14, 'euisssss', 'cigayam', '08887645432');

-- --------------------------------------------------------

--
-- Table structure for table `produsen`
--

CREATE TABLE `produsen` (
  `kode` varchar(10) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `industri` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produsen`
--

INSERT INTO `produsen` (`kode`, `nama`, `industri`) VALUES
('PD01', 'Indofood', 'Makanan & Minuman'),
('PD02', 'ABC', 'Makanan & Minuman'),
('PD03', 'Netsle', 'Makanan & Minuman'),
('PD04', 'Sumber Makmur', 'Kebutuhan Rumah Tangga'),
('PD05', 'Harapan Jaya', 'Bumbu Masak'),
('PD06', 'Setia Abadi', 'Minuman'),
('PD07', 'Sumber Sejahtera', 'Makanan Ringan'),
('PD08', 'Sumber Bahagia ', 'Pembersih');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(10) NOT NULL,
  `waktu` datetime(6) DEFAULT NULL,
  `keterangan` varchar(30) DEFAULT NULL,
  `id_barang` int(10) NOT NULL,
  `id_pelanggan` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `waktu`, `keterangan`, `id_barang`, `id_pelanggan`) VALUES
(1, '2022-01-01 13:29:41.000000', NULL, 2, 1),
(2, '2022-01-13 10:32:59.303000', 'lunas', 3, 2),
(3, '2022-01-16 11:32:59.000000', NULL, 2, 2),
(5, '2022-01-11 13:04:00.000000', NULL, 1, 6),
(6, '2022-01-31 16:09:23.000000', NULL, 7, 5),
(10, '2022-01-01 11:03:52.000000', NULL, 2, 2),
(12, '2022-01-01 11:04:08.000000', NULL, 2, 2),
(13, '2022-01-31 12:12:25.005000', NULL, 4, 1),
(14, '2022-01-19 13:04:00.000000', NULL, 1, 3),
(16, '2022-01-14 16:18:28.000000', NULL, 2, 4),
(17, '2022-01-20 16:19:24.000000', NULL, 2, 5),
(19, '2022-01-10 16:19:52.000000', NULL, 2, 2),
(20, '2022-01-04 16:20:05.000000', NULL, 2, 1),
(27, '0000-00-00 00:00:00.000000', 'belum lunas', 22, 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produsen`
--
ALTER TABLE `produsen`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_trans` (`id_barang`),
  ADD KEY `fk_pembeli` (`id_pelanggan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `fk_pembeli` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id`),
  ADD CONSTRAINT `fk_trans` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
