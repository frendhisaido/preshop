-- phpMyAdmin SQL Dump
-- version 3.3.8.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 10, 2011 at 12:59 AM
-- Server version: 5.1.46
-- PHP Version: 5.2.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `chibmcom_preshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `id_barang` int(11) NOT NULL AUTO_INCREMENT,
  `id_kategori` int(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `merk` varchar(50) NOT NULL,
  `size` varchar(35) NOT NULL,
  `harga_barang` int(11) NOT NULL,
  `diskon` int(11) DEFAULT NULL,
  `promo` tinyint(1) NOT NULL DEFAULT '0',
  `tgl_selesai_promo` date NOT NULL,
  `tgl_selesai_diskon` date NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `id_kategori`, `nama_barang`, `merk`, `size`, `harga_barang`, `diskon`, `promo`, `tgl_selesai_promo`, `tgl_selesai_diskon`, `keterangan`, `gambar`) VALUES
(1, 2, 'gula batu', 'A pasti', '250 gram', 5400, NULL, 0, '0000-00-00', '0000-00-00', '', 'edc1ea232df2061c50f421a5c650c166b0b616873c5fd4164881ba7e64a62191'),
(2, 2, 'gula merah', 'A gula merah', '400 gram', 5900, NULL, 0, '0000-00-00', '0000-00-00', '', '18d9974e36cd5671a9f5c1f685e75889e7888f9e72869516b8cef585bae52ddb'),
(3, 2, 'bumbu all variant', 'finna', '50 gram', 3700, NULL, 0, '0000-00-00', '0000-00-00', '', 'nopict'),
(4, 2, 'penyedap rasa sapi', 'masako', '250 gram', 5800, NULL, 0, '0000-00-00', '0000-00-00', '', 'nopict'),
(5, 2, 'kecap manis', 'nasional', '625 ml', 9800, NULL, 0, '0000-00-00', '0000-00-00', '', 'nopict'),
(6, 2, 'kecap manis', 'lotte mart', '275 ml', 5950, NULL, 0, '0000-00-00', '0000-00-00', '', 'nopict'),
(7, 2, 'pecin', 'ajinomoto', '100 gram', 2500, NULL, 0, '0000-00-00', '0000-00-00', '', 'ddcb3a86cab78596a0289f95051ccba4b55baa9c62cccef17cea7b0fce15b757'),
(8, 2, 'saus siram', 'saori', '140 ml', 6000, NULL, 0, '0000-00-00', '0000-00-00', '', '47eb7531b06b08c17f7dca54a2ca9dbd90013934b0e022e3900116484eaab8b8'),
(9, 2, 'bumbu serbaguna', 'sasa', '4''sx8g', 1200, NULL, 0, '0000-00-00', '0000-00-00', '', 'nopict'),
(10, 2, 'sambal extra hot', 'sasa', '24''sx10g', 3900, NULL, 0, '0000-00-00', '0000-00-00', '', 'nopict'),
(11, 2, 'pecin', 'biomiwon', '200 gram', 5500, NULL, 0, '0000-00-00', '0000-00-00', '', '0cc1d0a363b5f9dec61f0e74de8f7d975d2d95903ec71ceb49d6b58b57b45de7'),
(12, 2, 'saus', 'delmonte tomato', '340 ml', 8000, NULL, 0, '0000-00-00', '0000-00-00', '', '8c6144db025b625f9ae2c711fb1ab6f4d153a6768bbf198c3352823f674cfd95'),
(13, 2, 'saus', 'delmonte extra hot', '340 ml', 8200, NULL, 0, '0000-00-00', '0000-00-00', '', 'fa717515f9f6bee9dbc3c87587e39d6ede583bd61b27f6d80ff5c6595834f93b'),
(14, 10, 'Choc & Vanchoc 2in1', 'Walls', '400 ml', 15000, NULL, 0, '0000-00-00', '0000-00-00', '', 'nopict'),
(15, 10, 'Candy Cake Nova', 'Walls', '60 ml', 2000, NULL, 0, '0000-00-00', '0000-00-00', '', 'nopict'),
(16, 10, 'Choco Berry Popper', 'Walls', '60 ml', 2000, NULL, 0, '0000-00-00', '0000-00-00', '', 'nopict'),
(17, 10, 'Chocolate Volt', 'Walls', '60 ml', 2000, NULL, 0, '0000-00-00', '0000-00-00', '', 'nopict'),
(18, 10, 'Conello Classic Chocolate', 'Walls', '120 ml', 5000, NULL, 0, '0000-00-00', '0000-00-00', '', 'nopict'),
(19, 10, 'Conello Hazelnut Mochacino', 'Walls', '135 ml', 6000, NULL, 0, '0000-00-00', '0000-00-00', '', 'nopict'),
(20, 10, 'Conello Latte Caramello', 'Walls', '135 ml', 6000, NULL, 0, '0000-00-00', '0000-00-00', '', 'nopict'),
(21, 10, 'Conello Royale', 'Walls', '135 ml', 6000, NULL, 0, '0000-00-00', '0000-00-00', '', 'nopict'),
(22, 10, 'Conello Royale Chocoluv', 'Walls', '135 ml', 6000, NULL, 0, '0000-00-00', '0000-00-00', '', 'nopict'),
(23, 10, 'Conetto Mini Chocolate', 'Walls', '30 ml', 1800, NULL, 0, '0000-00-00', '0000-00-00', '', '492ad1c263c539be274853849441aecd30c146ee2ef479b4a5a9e185b512adae'),
(24, 10, 'Dimpi Paddle Pop Tirico', 'Walls', '70 ml', 1500, NULL, 0, '0000-00-00', '0000-00-00', '', 'nopict'),
(25, 10, 'Feast Choco', 'Walls', '75 ml', 2700, NULL, 0, '0000-00-00', '0000-00-00', '', 'nopict'),
(26, 10, 'Twistercola', 'Walls', '75 ml', 2700, NULL, 0, '0000-00-00', '0000-00-00', '', '75adca7242ce1af91a4be04a2ac0ecfab084e0b97628778ce048fca1521db1c7'),
(27, 10, 'Magnum Almond', 'Walls', '90 ml', 9000, NULL, 0, '0000-00-00', '0000-00-00', '', '6bd42585e5471f9b85e0a222916e3518ea7bba09519b60fc7c71d6736120549b'),
(28, 10, 'Moo', 'Walls', '70 gram', 2700, NULL, 0, '0000-00-00', '0000-00-00', '', '50753239a0bda103d4a4805f7d17177033458fe3d40f5bb48cf9b9cb47ce15a6'),
(29, 10, 'Paddle Pop Mini Milk', 'Walls', '35 ml', 1100, NULL, 0, '0000-00-00', '0000-00-00', '', 'fc8f7966cac07a9a9b3a4a750cd1d331fc13802332d6f7d4cedcaac43ae83d68'),
(30, 10, 'Rainbow Spark', 'Walls', '60 ml', 2000, NULL, 0, '0000-00-00', '0000-00-00', '', 'e217ccb3587c9831d659586ac007292f0cdde2eedfe760ea8ecd9226c1c509bf'),
(31, 10, 'Viennetta Brownie', 'Walls', '600 ml', 26500, NULL, 0, '0000-00-00', '0000-00-00', '', '8cdd366bea76a86cdd67412c7b7f5749e5239d5311206562e273b8971ea7fe52');

-- --------------------------------------------------------

--
-- Table structure for table `barang_keluar`
--

CREATE TABLE IF NOT EXISTS `barang_keluar` (
  `id_keluar` int(11) NOT NULL AUTO_INCREMENT,
  `id_barang` int(11) NOT NULL,
  `barcode` varchar(25) NOT NULL,
  `jumlah_klr` int(11) NOT NULL,
  `tgl_keluar` date NOT NULL,
  PRIMARY KEY (`id_keluar`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `barang_keluar`
--


-- --------------------------------------------------------

--
-- Table structure for table `barang_masuk`
--

CREATE TABLE IF NOT EXISTS `barang_masuk` (
  `id_masuk` int(11) NOT NULL AUTO_INCREMENT,
  `id_barang` int(11) NOT NULL,
  `barcode` varchar(25) NOT NULL,
  `jumlah_msk` int(11) NOT NULL,
  `tgl_masuk` date NOT NULL,
  PRIMARY KEY (`id_masuk`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `barang_masuk`
--


-- --------------------------------------------------------

--
-- Table structure for table `belanja`
--

CREATE TABLE IF NOT EXISTS `belanja` (
  `id_barang` int(3) NOT NULL,
  `id_list_belanja` int(3) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `belanja`
--

INSERT INTO `belanja` (`id_barang`, `id_list_belanja`, `jumlah`) VALUES
(1, 2, 1),
(8, 2, 1),
(8, 2, 10),
(2, 1, 89);

-- --------------------------------------------------------

--
-- Table structure for table `iklan`
--

CREATE TABLE IF NOT EXISTS `iklan` (
  `id_iklan` int(11) NOT NULL AUTO_INCREMENT,
  `id_barang` int(11) NOT NULL,
  `nama_iklan` varchar(35) NOT NULL,
  `tgl` date NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  PRIMARY KEY (`id_iklan`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `iklan`
--


-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `kategori` varchar(35) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`) VALUES
(2, 'bumbu dapur'),
(10, 'eskrim');

-- --------------------------------------------------------

--
-- Table structure for table `list_belanja`
--

CREATE TABLE IF NOT EXISTS `list_belanja` (
  `id_list_belanja` int(3) NOT NULL AUTO_INCREMENT,
  `id_user` int(3) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tgl_buat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_list_belanja`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `list_belanja`
--

INSERT INTO `list_belanja` (`id_list_belanja`, `id_user`, `nama`, `tgl_buat`) VALUES
(1, 11, 's', '2011-01-09 19:58:25'),
(2, 11, 'alfamart', '2011-01-09 19:58:47');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE IF NOT EXISTS `stock` (
  `id_stock` int(11) NOT NULL AUTO_INCREMENT,
  `id_barang` int(11) NOT NULL,
  `jumlah_stock` int(11) NOT NULL,
  PRIMARY KEY (`id_stock`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `stock`
--


-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `level` int(1) NOT NULL DEFAULT '1',
  `baned_status` int(1) NOT NULL DEFAULT '0',
  `rahasia` text NOT NULL,
  `jawaban` text NOT NULL,
  `login_gagal` int(2) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `telp`, `level`, `baned_status`, `rahasia`, `jawaban`, `login_gagal`) VALUES
(1, 'admin', 'a11952ec8b5f3d79c1e65d41ba2947a20dc262472ddb0bbedb166e9d413dbd8f', 'Administrator', '085279916229', 0, 0, '', '0', 0),
(10, 'bram', '46947fc34c923a838bf8274410a837f5e828d845cbce413881471802dcd981f3', 'Bramandityo Prabowo', '085279916229', 1, 0, 'Siapakah nama anjing saya', 'edi', 0),
(11, 'abang', 'b1f1649f0680fa37dbf3c6292273a752ee261f318a3b39f7c4833feb0bfea8b2', 'Frendhi', '085279916229', 1, 0, 'Siapa nama anjing saya', 'herbet', 0);
