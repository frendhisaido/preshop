-- phpMyAdmin SQL Dump
-- version 3.3.8.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 23, 2010 at 11:43 PM
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
  `size` varchar(35) NOT NULL,
  `harga_barang` int(11) NOT NULL,
  `diskon` int(11) NOT NULL,
  `promo` tinyint(1) NOT NULL DEFAULT '0',
  `tgl_selesai_promo` date NOT NULL,
  `tgl_selesai_diskon` date NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `id_kategori`, `nama_barang`, `size`, `harga_barang`, `diskon`, `promo`, `tgl_selesai_promo`, `tgl_selesai_diskon`, `keterangan`) VALUES
(4, 1, 'coba', '200', 10000, 0, 0, '0000-00-00', '0000-00-00', ''),
(3, 2, 'coba', '', 0, 0, 0, '0000-00-00', '0000-00-00', ''),
(5, 3, 'coba', '200grm', 20000, 0, 1, '0000-00-00', '0000-00-00', ''),
(6, 3, 'coba', '200grm', 20000, 0, 1, '0000-00-00', '0000-00-00', ''),
(7, 2, 'mencoba', '200ml', 20000, 0, 0, '0000-00-00', '0000-00-00', '');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`) VALUES
(1, 'minuman kaleng'),
(2, 'bumbu dapur'),
(3, 'snack'),
(5, 'obat'),
(6, 'minuman'),
(7, 'baterai');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `telp`, `level`, `baned_status`, `rahasia`, `jawaban`, `login_gagal`) VALUES
(1, 'admin', 'a11952ec8b5f3d79c1e65d41ba2947a20dc262472ddb0bbedb166e9d413dbd8f', 'Administrator', '085279916229', 0, 0, '', '0', 0),
(10, 'bram', '46947fc34c923a838bf8274410a837f5e828d845cbce413881471802dcd981f3', 'Bramandityo Prabowo', '085279916229', 1, 0, 'Siapakah nama anjing saya', 'edi', 4);
