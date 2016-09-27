-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.13-MariaDB - Source distribution
-- Server OS:                    Linux
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for marco
CREATE DATABASE IF NOT EXISTS `marco` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `marco`;


-- Dumping structure for table marco.tb_barang
CREATE TABLE IF NOT EXISTS `tb_barang` (
  `id_barang` int(11) NOT NULL AUTO_INCREMENT,
  `awb` int(11) NOT NULL DEFAULT '0',
  `id_expedisi` int(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `pengirim` varchar(50) NOT NULL,
  `tujuan` int(11) NOT NULL,
  `asal` int(11) NOT NULL,
  `penerima` varchar(50) NOT NULL,
  `alamat_penerima` text NOT NULL,
  `jenis` enum('dokumen','paket','colly') NOT NULL,
  `Berat` int(11) NOT NULL,
  `colly` int(11) DEFAULT NULL,
  `tgl_kirim` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deskripsi` text,
  `harga` varchar(50) NOT NULL,
  PRIMARY KEY (`id_barang`),
  UNIQUE KEY `awb` (`awb`),
  KEY `FK_tb_barang_tb_expedisi` (`id_expedisi`),
  KEY `FK_tb_barang_tb_cab` (`tujuan`),
  KEY `FK_tb_barang_tb_cab_2` (`asal`),
  CONSTRAINT `FK_tb_barang_tb_cab` FOREIGN KEY (`tujuan`) REFERENCES `tb_cab` (`id_cabang`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_tb_barang_tb_cab_2` FOREIGN KEY (`asal`) REFERENCES `tb_cab` (`id_cabang`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_tb_barang_tb_expedisi` FOREIGN KEY (`id_expedisi`) REFERENCES `tb_expedisi` (`id_expedisi`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- Dumping data for table marco.tb_barang: ~3 rows (approximately)
/*!40000 ALTER TABLE `tb_barang` DISABLE KEYS */;
REPLACE INTO `tb_barang` (`id_barang`, `awb`, `id_expedisi`, `nama_barang`, `pengirim`, `tujuan`, `asal`, `penerima`, `alamat_penerima`, `jenis`, `Berat`, `colly`, `tgl_kirim`, `deskripsi`, `harga`) VALUES
	(16, 12345678, 15, 'Barang', 'Pengirim', 1, 2, 'Penerima', 'Alamat', 'dokumen', 1, 1, '2016-09-27 00:00:00', 'Deskripsi', '15000'),
	(17, 1234564, 16, 'Barang 1', 'Pengirim 1', 4, 1, 'Penerima 1', 'Alamat Penerima 1', 'dokumen', 2, 1, '2016-09-27 00:00:00', 'Desk', '30000'),
	(18, 123456412, 15, 'ede', 'wefd', 2, 7, 'wfewf', 'wefewf', 'dokumen', 2, 1, '2016-09-27 00:00:00', 'desk', '30000');
/*!40000 ALTER TABLE `tb_barang` ENABLE KEYS */;


-- Dumping structure for table marco.tb_cab
CREATE TABLE IF NOT EXISTS `tb_cab` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cabang` int(5) NOT NULL,
  `kota` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_cabang` (`id_cabang`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table marco.tb_cab: ~8 rows (approximately)
/*!40000 ALTER TABLE `tb_cab` DISABLE KEYS */;
REPLACE INTO `tb_cab` (`id`, `id_cabang`, `kota`) VALUES
	(1, 1, 'Palu'),
	(2, 2, 'Poso'),
	(3, 3, 'Ampana'),
	(4, 4, 'Luwuk'),
	(5, 5, 'Tentena'),
	(6, 6, 'Toli - Toli'),
	(7, 7, 'Buol'),
	(8, 8, 'Morowali');
/*!40000 ALTER TABLE `tb_cab` ENABLE KEYS */;


-- Dumping structure for table marco.tb_exp
CREATE TABLE IF NOT EXISTS `tb_exp` (
  `id_antar` int(11) NOT NULL AUTO_INCREMENT,
  `asal` int(5) NOT NULL,
  `tujuan` int(5) NOT NULL,
  `kode_expedisi` varchar(50) NOT NULL,
  PRIMARY KEY (`id_antar`),
  KEY `FK_tb_antar_tb_cab` (`asal`),
  KEY `FK_tb_antar_tb_cab_2` (`tujuan`),
  KEY `kode_expedisi` (`kode_expedisi`),
  CONSTRAINT `FK_tb_antar_tb_cab` FOREIGN KEY (`asal`) REFERENCES `tb_cab` (`id_cabang`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_tb_antar_tb_cab_2` FOREIGN KEY (`tujuan`) REFERENCES `tb_cab` (`id_cabang`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=latin1;

-- Dumping data for table marco.tb_exp: ~56 rows (approximately)
/*!40000 ALTER TABLE `tb_exp` DISABLE KEYS */;
REPLACE INTO `tb_exp` (`id_antar`, `asal`, `tujuan`, `kode_expedisi`) VALUES
	(21, 1, 2, 'Plw - Pso'),
	(22, 1, 3, 'Plw - Amp'),
	(23, 1, 4, 'Plw - Lwk'),
	(24, 1, 5, 'Plw - Tnt'),
	(25, 1, 6, 'Plw - Tolis'),
	(26, 1, 7, 'Plw - Buol'),
	(27, 1, 8, 'Plw - Mrw'),
	(28, 2, 1, 'Pso - Plw'),
	(29, 2, 3, 'Pso - Amp'),
	(30, 2, 4, 'Pso - Lwk'),
	(31, 2, 5, 'Pso - Tnt'),
	(32, 2, 6, 'Pso - Tolis'),
	(33, 2, 7, 'Pso - Buol'),
	(34, 2, 8, 'Pso - Mrw'),
	(35, 3, 1, 'Amp - Plw'),
	(36, 3, 2, 'Amp - Pso'),
	(37, 3, 4, 'Amp - Lwk'),
	(38, 3, 5, 'Amp - Tnt'),
	(39, 3, 6, 'Amp - Tolis'),
	(40, 3, 7, 'Amp - Buol'),
	(41, 3, 8, 'Amp - Mrw'),
	(42, 4, 1, 'Lwk - Plw'),
	(43, 4, 2, 'Lwk - Pso'),
	(44, 4, 3, 'Lwk - Amp'),
	(45, 4, 5, 'Lwk - Tnt'),
	(46, 4, 6, 'Lwk - Tolis'),
	(47, 4, 7, 'Lwk - Buol'),
	(48, 4, 8, 'Lwk - Mrw'),
	(49, 5, 1, 'Tnt - Plw'),
	(50, 5, 2, 'Tnt - Pso'),
	(51, 5, 3, 'Tnt - Amp'),
	(52, 5, 4, 'Tnt - Lwk'),
	(53, 5, 6, 'Tnt - Tolis'),
	(54, 5, 7, 'Tnt - Buol'),
	(55, 5, 8, 'Tnt - Mrw'),
	(56, 6, 1, 'Tolis - Plw'),
	(57, 6, 2, 'Tolis - Pso'),
	(58, 6, 3, 'Tolis - Amp'),
	(59, 6, 4, 'Tolis - Lwk'),
	(60, 6, 5, 'Tolis - Tnt'),
	(61, 6, 7, 'Tolis - Buol'),
	(62, 6, 8, 'Tolis - Mrw'),
	(63, 7, 1, 'Buol - Plw'),
	(64, 7, 2, 'Buol - Pso'),
	(65, 7, 3, 'Buol - Amp'),
	(66, 7, 4, 'Buol - Lwk'),
	(67, 7, 5, 'Buol - Tnt'),
	(68, 7, 6, 'Buol - Tolis'),
	(69, 7, 8, 'Buol - Mrw'),
	(70, 8, 1, 'Mrw - Plw'),
	(71, 8, 2, 'Mrw - Pso'),
	(72, 8, 3, 'Mrw - Amp'),
	(73, 8, 4, 'Mrw - Lwk'),
	(74, 8, 5, 'Mrw - Tnt'),
	(75, 8, 6, 'Mrw - Tolis'),
	(76, 8, 7, 'Mrw - Buol');
/*!40000 ALTER TABLE `tb_exp` ENABLE KEYS */;


-- Dumping structure for table marco.tb_expedisi
CREATE TABLE IF NOT EXISTS `tb_expedisi` (
  `id_expedisi` int(11) NOT NULL AUTO_INCREMENT,
  `id_exp` varchar(50) NOT NULL DEFAULT '0',
  `id_mobil` varchar(50) NOT NULL DEFAULT '0',
  `tgl_berangkat` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_expedisi`),
  KEY `FK_tb_expedisi_tb_exp` (`id_exp`),
  KEY `FK_tb_expedisi_tb_mobil` (`id_mobil`),
  CONSTRAINT `FK_tb_expedisi_tb_exp` FOREIGN KEY (`id_exp`) REFERENCES `tb_exp` (`kode_expedisi`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_tb_expedisi_tb_mobil` FOREIGN KEY (`id_mobil`) REFERENCES `tb_mobil` (`id_nopol`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- Dumping data for table marco.tb_expedisi: ~3 rows (approximately)
/*!40000 ALTER TABLE `tb_expedisi` DISABLE KEYS */;
REPLACE INTO `tb_expedisi` (`id_expedisi`, `id_exp`, `id_mobil`, `tgl_berangkat`) VALUES
	(15, 'Pso - Plw', 'DN 8386 AQ', '2016-09-27 00:00:00'),
	(16, 'Plw - Lwk', 'DN 1150 AJ', '2016-09-28 00:00:00'),
	(17, 'Buol - Pso', 'DN 1150 AJ', '2016-09-27 00:00:00');
/*!40000 ALTER TABLE `tb_expedisi` ENABLE KEYS */;


-- Dumping structure for table marco.tb_harga
CREATE TABLE IF NOT EXISTS `tb_harga` (
  `id_harga` int(11) NOT NULL AUTO_INCREMENT,
  `id_asal` int(11) NOT NULL,
  `id_tujuan` int(11) NOT NULL,
  `harga` varchar(50) NOT NULL,
  `paket` enum('paket','dokumen','colly') NOT NULL,
  `estimasi` text,
  PRIMARY KEY (`id_harga`),
  KEY `FK_tb_harga_tb_cab` (`id_tujuan`),
  KEY `FK_tb_harga_tb_cab_2` (`id_asal`),
  CONSTRAINT `FK_tb_harga_tb_cab` FOREIGN KEY (`id_tujuan`) REFERENCES `tb_cab` (`id_cabang`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_tb_harga_tb_cab_2` FOREIGN KEY (`id_asal`) REFERENCES `tb_cab` (`id_cabang`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=113 DEFAULT CHARSET=latin1;

-- Dumping data for table marco.tb_harga: ~81 rows (approximately)
/*!40000 ALTER TABLE `tb_harga` DISABLE KEYS */;
REPLACE INTO `tb_harga` (`id_harga`, `id_asal`, `id_tujuan`, `harga`, `paket`, `estimasi`) VALUES
	(21, 1, 2, '5000', 'dokumen', '2 Hari'),
	(25, 1, 6, '7000', 'dokumen', '2 Hari'),
	(26, 1, 3, '15000', 'dokumen', '2 Hari'),
	(27, 1, 4, '15000', 'dokumen', '2 Hari'),
	(28, 1, 5, '15000', 'dokumen', '2 Hari'),
	(29, 1, 7, '15000', 'dokumen', '2 Hari'),
	(30, 1, 8, '15000', 'dokumen', '2 Hari'),
	(31, 2, 1, '15000', 'dokumen', '2 Hari'),
	(32, 2, 3, '15000', 'dokumen', '2 Hari'),
	(34, 2, 5, '15000', 'dokumen', '2 Hari'),
	(35, 2, 6, '15000', 'dokumen', '2 Hari'),
	(36, 2, 7, '15000', 'dokumen', '2 Hari'),
	(37, 2, 8, '15000', 'dokumen', '2 Hari'),
	(38, 3, 1, '15000', 'dokumen', '2 Hari'),
	(39, 3, 2, '15000', 'dokumen', '2 Hari'),
	(40, 3, 4, '15000', 'dokumen', '2 Hari'),
	(41, 3, 5, '15000', 'dokumen', '2 Hari'),
	(42, 3, 6, '15000', 'dokumen', '2 Hari'),
	(43, 3, 7, '15000', 'dokumen', '2 Hari'),
	(44, 3, 8, '15000', 'dokumen', '2 Hari'),
	(45, 4, 1, '15000', 'dokumen', '2 Hari'),
	(46, 4, 2, '15000', 'dokumen', '2 Hari'),
	(47, 4, 3, '15000', 'dokumen', '2 Hari'),
	(48, 4, 5, '15000', 'dokumen', '2 Hari'),
	(49, 4, 6, '15000', 'dokumen', '2 Hari'),
	(50, 4, 7, '15000', 'dokumen', '2 Hari'),
	(51, 4, 8, '15000', 'dokumen', '2 Hari'),
	(53, 5, 1, '15000', 'dokumen', '2 Hari'),
	(60, 2, 4, '15000', 'dokumen', '2 Hari'),
	(61, 5, 2, '15000', 'dokumen', '2 Hari'),
	(62, 5, 3, '15000', 'dokumen', '2 Hari'),
	(63, 5, 4, '15000', 'dokumen', '2 Hari'),
	(64, 5, 6, '15000', 'dokumen', '2 Hari'),
	(65, 5, 7, '15000', 'dokumen', '2 Hari'),
	(66, 5, 8, '15000', 'dokumen', '2 Hari'),
	(67, 6, 1, '15000', 'dokumen', '2 Hari'),
	(68, 6, 2, '15000', 'dokumen', '2 Hari'),
	(69, 6, 3, '15000', 'dokumen', '2 Hari'),
	(70, 6, 4, '15000', 'dokumen', '2 Hari'),
	(71, 6, 5, '15000', 'dokumen', '2 Hari'),
	(72, 6, 7, '15000', 'dokumen', '2 Hari'),
	(73, 6, 8, '15000', 'dokumen', '2 Hari'),
	(74, 7, 1, '15000', 'dokumen', '2 Hari'),
	(75, 7, 2, '15000', 'dokumen', '2 Hari'),
	(76, 7, 3, '15000', 'dokumen', '2 Hari'),
	(77, 7, 4, '15000', 'dokumen', '2 Hari'),
	(78, 7, 5, '15000', 'dokumen', '2 Hari'),
	(79, 7, 6, '15000', 'dokumen', '2 Hari'),
	(80, 7, 8, '15000', 'dokumen', '2 Hari'),
	(81, 8, 1, '15000', 'dokumen', '2 Hari'),
	(82, 8, 2, '15000', 'dokumen', '2 Hari'),
	(83, 8, 3, '15000', 'dokumen', '2 Hari'),
	(84, 8, 4, '15000', 'dokumen', '2 Hari'),
	(85, 8, 5, '15000', 'dokumen', '2 Hari'),
	(86, 8, 7, '15000', 'dokumen', '2 Hari'),
	(87, 8, 6, '15000', 'dokumen', '2 Hari'),
	(88, 1, 2, '15000', 'colly', '3 Hari'),
	(89, 1, 3, '20000', 'colly', '3 Hari'),
	(90, 1, 4, '20000', 'colly', '3 Hari'),
	(91, 1, 5, '25000', 'colly', '3 Hari'),
	(92, 1, 6, '20000', 'colly', '3 Hari'),
	(93, 1, 7, '30000', 'colly', '3 Hari'),
	(94, 1, 8, '30000', 'colly', '3 Hari'),
	(95, 2, 1, '15000', 'colly', '3 Hari'),
	(96, 2, 3, '15000', 'colly', '3 Hari'),
	(97, 2, 4, '20000', 'colly', '3 Hari'),
	(98, 2, 5, '15000', 'colly', '3 Hari'),
	(99, 2, 6, '20000', 'colly', '3 Hari'),
	(100, 2, 7, '30000', 'colly', '3 Hari'),
	(101, 2, 8, '30000', 'colly', '3 Hari'),
	(102, 3, 1, '20000', 'colly', '3 Hari'),
	(103, 3, 2, '15000', 'colly', '3 Hari'),
	(104, 3, 4, '15000', 'colly', '3 Hari'),
	(105, 3, 5, '20000', 'colly', '3 Hari'),
	(106, 1, 2, '6000', 'paket', '2 - 3 Hari'),
	(107, 1, 3, '8000', 'paket', '2 - 3 Hari'),
	(108, 1, 4, '10000', 'paket', '2 - 3 Hari'),
	(109, 1, 5, '8000', 'paket', '2 - 3 Hari'),
	(110, 1, 6, '10000', 'paket', '2 - 3 Hari'),
	(111, 1, 7, '15000', 'paket', '2 - 3 Hari'),
	(112, 1, 8, '15000', 'paket', '2 - 3 Hari');
/*!40000 ALTER TABLE `tb_harga` ENABLE KEYS */;


-- Dumping structure for table marco.tb_kariawan
CREATE TABLE IF NOT EXISTS `tb_kariawan` (
  `id_kariawan` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  PRIMARY KEY (`id_kariawan`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- Dumping data for table marco.tb_kariawan: ~12 rows (approximately)
/*!40000 ALTER TABLE `tb_kariawan` DISABLE KEYS */;
REPLACE INTO `tb_kariawan` (`id_kariawan`, `nama`, `jabatan`) VALUES
	(1, 'Marco Mario Lameanda', 'Admin'),
	(3, 'Hari Purnomo', 'Pimpinan'),
	(4, 'Yulien Lameanda', 'Bendahara'),
	(5, 'Franky Larimpa', 'Kepala Operasional'),
	(6, 'Irwan Vijai', 'Kepala Gudang'),
	(7, 'Nickson', 'Driver'),
	(8, 'Irvan', 'Driver'),
	(9, 'Sutik', 'Driver'),
	(10, 'Liling', 'Driver'),
	(11, 'Ucik', 'Driver'),
	(12, 'Edwin', 'Driver'),
	(13, 'Venus', 'Driver');
/*!40000 ALTER TABLE `tb_kariawan` ENABLE KEYS */;


-- Dumping structure for table marco.tb_mobil
CREATE TABLE IF NOT EXISTS `tb_mobil` (
  `id_mobil` int(11) NOT NULL AUTO_INCREMENT,
  `id_nopol` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `jenis` text,
  PRIMARY KEY (`id_mobil`),
  UNIQUE KEY `id_nopol` (`id_nopol`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table marco.tb_mobil: ~4 rows (approximately)
/*!40000 ALTER TABLE `tb_mobil` DISABLE KEYS */;
REPLACE INTO `tb_mobil` (`id_mobil`, `id_nopol`, `nama`, `alamat`, `jenis`) VALUES
	(1, 'DN 8386 AQ', 'Frangky', 'Jl. Dewi Sartika 3', 'Grand Max Box'),
	(4, 'DN 5555 TY', 'Doni', 'Jl. Garuda 2', 'Truk Box'),
	(5, 'DN 1150 AJ', 'Marco Mario Lameanda', 'Jl. Soekarno Hatta No. 12 Palu', 'Truk Box');
/*!40000 ALTER TABLE `tb_mobil` ENABLE KEYS */;


-- Dumping structure for table marco.tb_tracking
CREATE TABLE IF NOT EXISTS `tb_tracking` (
  `id_tracking` int(11) NOT NULL AUTO_INCREMENT,
  `id_exp` int(11) NOT NULL DEFAULT '0',
  `id_barang` int(11) NOT NULL DEFAULT '0',
  `status` enum('Sampai','Transit','Manifested') NOT NULL,
  PRIMARY KEY (`id_tracking`),
  KEY `FK_tb_tracking_tb_barang` (`id_barang`),
  KEY `FK_tb_tracking_tb_exp` (`id_exp`),
  CONSTRAINT `FK_tb_tracking_tb_barang` FOREIGN KEY (`id_barang`) REFERENCES `tb_barang` (`awb`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_tb_tracking_tb_exp` FOREIGN KEY (`id_exp`) REFERENCES `tb_exp` (`id_antar`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- Dumping data for table marco.tb_tracking: ~0 rows (approximately)
/*!40000 ALTER TABLE `tb_tracking` DISABLE KEYS */;
REPLACE INTO `tb_tracking` (`id_tracking`, `id_exp`, `id_barang`, `status`) VALUES
	(21, 28, 12345678, 'Manifested');
/*!40000 ALTER TABLE `tb_tracking` ENABLE KEYS */;


-- Dumping structure for table marco.tb_user
CREATE TABLE IF NOT EXISTS `tb_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL DEFAULT '',
  `password` varchar(50) NOT NULL DEFAULT '',
  `level` enum('A','C') DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table marco.tb_user: ~1 rows (approximately)
/*!40000 ALTER TABLE `tb_user` DISABLE KEYS */;
REPLACE INTO `tb_user` (`id_user`, `username`, `password`, `level`) VALUES
	(1, 'admin', '12345', 'A'),
	(2, 'cabang', '123456', 'C');
/*!40000 ALTER TABLE `tb_user` ENABLE KEYS */;


-- Dumping structure for view marco.track_view
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `track_view` (
	`awb` INT(11) NOT NULL,
	`nama_barang` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`pengirim` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`penerima` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`alamat_penerima` TEXT NOT NULL COLLATE 'latin1_swedish_ci',
	`jenis` ENUM('dokumen','paket','colly') NOT NULL COLLATE 'latin1_swedish_ci',
	`status` ENUM('Sampai','Transit','Manifested') NOT NULL COLLATE 'latin1_swedish_ci',
	`kota` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;


-- Dumping structure for view marco.view_barang
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_barang` (
	`id_barang` INT(11) NOT NULL,
	`nama_barang` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`awb` INT(11) NOT NULL,
	`id_expedisi` INT(11) NOT NULL,
	`id_mobil` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`tgl_berangkat` DATETIME NOT NULL,
	`pengirim` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`tujuan` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`asal` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`penerima` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`alamat_penerima` TEXT NOT NULL COLLATE 'latin1_swedish_ci',
	`jenis` ENUM('dokumen','paket','colly') NOT NULL COLLATE 'latin1_swedish_ci',
	`Berat` INT(11) NOT NULL,
	`colly` INT(11) NULL,
	`tgl_manifes` DATETIME NOT NULL,
	`deskripsi` TEXT NULL COLLATE 'latin1_swedish_ci',
	`harga` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;


-- Dumping structure for view marco.view_detail
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_detail` (
	`awb` INT(11) NOT NULL,
	`id_nopol` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`tgl_berangkat` DATETIME NOT NULL,
	`nama_barang` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`pengirim` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`penerima` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`alamat_penerima` TEXT NOT NULL COLLATE 'latin1_swedish_ci',
	`jenis` ENUM('dokumen','paket','colly') NOT NULL COLLATE 'latin1_swedish_ci',
	`Berat` INT(11) NOT NULL,
	`tgl_kirim` DATETIME NOT NULL,
	`deskripsi` TEXT NULL COLLATE 'latin1_swedish_ci',
	`kota` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;


-- Dumping structure for view marco.view_exp
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_exp` (
	`id_antar` INT(11) NOT NULL,
	`kode_expedisi` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`asal` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`tujuan` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;


-- Dumping structure for view marco.view_harga
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_harga` (
	`id_harga` INT(11) NOT NULL,
	`id_kota_asal` INT(5) NOT NULL,
	`kota_asal` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`id_kota_tujuan` INT(5) NOT NULL,
	`kota_tujuan` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`harga` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`paket` ENUM('paket','dokumen','colly') NOT NULL COLLATE 'latin1_swedish_ci',
	`estimasi` TEXT NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;


-- Dumping structure for view marco.track_view
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `track_view`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `track_view` AS select `m3`.`awb` AS `awb`,`m3`.`nama_barang` AS `nama_barang`,`m3`.`pengirim` AS `pengirim`,`m3`.`penerima` AS `penerima`,`m3`.`alamat_penerima` AS `alamat_penerima`,`m3`.`jenis` AS `jenis`,`m1`.`status` AS `status`,`m4`.`kota` AS `kota` from (((`tb_tracking` `m1` join `tb_exp` `m2` on((`m1`.`id_exp` = `m2`.`id_antar`))) join `tb_barang` `m3` on((`m1`.`id_barang` = `m3`.`awb`))) join `tb_cab` `m4` on((`m3`.`tujuan` = `m4`.`id_cabang`)));


-- Dumping structure for view marco.view_barang
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_barang`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_barang` AS select `m1`.`id_barang` AS `id_barang`,`m1`.`nama_barang` AS `nama_barang`,`m1`.`awb` AS `awb`,`m1`.`id_expedisi` AS `id_expedisi`,`m4`.`id_mobil` AS `id_mobil`,`m4`.`tgl_berangkat` AS `tgl_berangkat`,`m1`.`pengirim` AS `pengirim`,`m2`.`kota` AS `tujuan`,`m3`.`kota` AS `asal`,`m1`.`penerima` AS `penerima`,`m1`.`alamat_penerima` AS `alamat_penerima`,`m1`.`jenis` AS `jenis`,`m1`.`Berat` AS `Berat`,`m1`.`colly` AS `colly`,`m1`.`tgl_kirim` AS `tgl_manifes`,`m1`.`deskripsi` AS `deskripsi`,`m1`.`harga` AS `harga` from (((`tb_barang` `m1` join `tb_cab` `m2` on((`m1`.`tujuan` = `m2`.`id_cabang`))) join `tb_cab` `m3` on((`m1`.`asal` = `m3`.`id_cabang`))) join `tb_expedisi` `m4` on((`m1`.`id_expedisi` = `m4`.`id_expedisi`)));


-- Dumping structure for view marco.view_detail
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_detail`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_detail` AS select `m1`.`awb` AS `awb`,`m4`.`id_nopol` AS `id_nopol`,`m3`.`tgl_berangkat` AS `tgl_berangkat`,`m1`.`nama_barang` AS `nama_barang`,`m1`.`pengirim` AS `pengirim`,`m1`.`penerima` AS `penerima`,`m1`.`alamat_penerima` AS `alamat_penerima`,`m1`.`jenis` AS `jenis`,`m1`.`Berat` AS `Berat`,`m1`.`tgl_kirim` AS `tgl_kirim`,`m1`.`deskripsi` AS `deskripsi`,`m2`.`kota` AS `kota` from (((`tb_barang` `m1` join `tb_cab` `m2` on((`m1`.`tujuan` = `m2`.`id_cabang`))) join `tb_expedisi` `m3` on((`m1`.`id_expedisi` = `m3`.`id_expedisi`))) join `tb_mobil` `m4` on((`m3`.`id_mobil` = `m4`.`id_nopol`)));


-- Dumping structure for view marco.view_exp
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_exp`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_exp` AS select `m1`.`id_antar` AS `id_antar`,`m1`.`kode_expedisi` AS `kode_expedisi`,`m2`.`kota` AS `asal`,`m3`.`kota` AS `tujuan` from ((`tb_exp` `m1` join `tb_cab` `m2` on((`m1`.`asal` = `m2`.`id_cabang`))) join `tb_cab` `m3` on((`m1`.`tujuan` = `m3`.`id_cabang`)));


-- Dumping structure for view marco.view_harga
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_harga`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_harga` AS select `m1`.`id_harga` AS `id_harga`,`m2`.`id_cabang` AS `id_kota_asal`,`m2`.`kota` AS `kota_asal`,`m3`.`id_cabang` AS `id_kota_tujuan`,`m3`.`kota` AS `kota_tujuan`,`m1`.`harga` AS `harga`,`m1`.`paket` AS `paket`,`m1`.`estimasi` AS `estimasi` from ((`tb_harga` `m1` join `tb_cab` `m2` on((`m1`.`id_asal` = `m2`.`id_cabang`))) join `tb_cab` `m3` on((`m1`.`id_tujuan` = `m3`.`id_cabang`)));
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
