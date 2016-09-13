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
  `penerima` varchar(50) NOT NULL,
  `alamat_penerima` text NOT NULL,
  `jenis` enum('Doc','Paket') NOT NULL,
  `Berat` int(11) NOT NULL,
  `colly` int(11) NOT NULL,
  `tgl_kirim` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deskripsi` text,
  `harga` varchar(50) NOT NULL,
  PRIMARY KEY (`id_barang`),
  UNIQUE KEY `awb` (`awb`),
  KEY `FK_tb_barang_tb_expedisi` (`id_expedisi`),
  KEY `FK_tb_barang_tb_cab` (`tujuan`),
  CONSTRAINT `FK_tb_barang_tb_cab` FOREIGN KEY (`tujuan`) REFERENCES `tb_cab` (`id_cabang`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_tb_barang_tb_expedisi` FOREIGN KEY (`id_expedisi`) REFERENCES `tb_expedisi` (`id_expedisi`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Dumping data for table marco.tb_barang: ~0 rows (approximately)
/*!40000 ALTER TABLE `tb_barang` DISABLE KEYS */;
REPLACE INTO `tb_barang` (`id_barang`, `awb`, `id_expedisi`, `nama_barang`, `pengirim`, `tujuan`, `penerima`, `alamat_penerima`, `jenis`, `Berat`, `colly`, `tgl_kirim`, `deskripsi`, `harga`) VALUES
	(9, 1234567890, 7, 'fdgfj', 'bfbf', 113, 'vcnbm', 'dfghjkl;\'', 'Doc', 2, 1, '2016-09-12 00:00:00', 'ggfjh,kl', '20000');
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
	(1, 111, 'palu'),
	(2, 112, 'poso'),
	(3, 113, 'ampana'),
	(4, 114, 'luwuk'),
	(5, 115, 'tentena'),
	(6, 116, 'toli-toli'),
	(7, 117, 'buol'),
	(8, 118, 'morowali');
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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- Dumping data for table marco.tb_exp: ~9 rows (approximately)
/*!40000 ALTER TABLE `tb_exp` DISABLE KEYS */;
REPLACE INTO `tb_exp` (`id_antar`, `asal`, `tujuan`, `kode_expedisi`) VALUES
	(1, 111, 112, 'a111'),
	(2, 111, 113, 'a111'),
	(3, 111, 114, 'a111'),
	(4, 111, 116, 'b111'),
	(5, 111, 117, 'b111'),
	(6, 111, 112, 'c111'),
	(8, 111, 115, 'c111'),
	(9, 111, 118, 'c111');
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table marco.tb_expedisi: ~1 rows (approximately)
/*!40000 ALTER TABLE `tb_expedisi` DISABLE KEYS */;
REPLACE INTO `tb_expedisi` (`id_expedisi`, `id_exp`, `id_mobil`, `tgl_berangkat`) VALUES
	(7, 'a111', 'DN 5555 TY', '2016-09-13 22:47:53');
/*!40000 ALTER TABLE `tb_expedisi` ENABLE KEYS */;


-- Dumping structure for table marco.tb_harga
CREATE TABLE IF NOT EXISTS `tb_harga` (
  `id_harga` int(11) NOT NULL AUTO_INCREMENT,
  `id_tujuan` int(11) NOT NULL,
  `harga` varchar(50) NOT NULL,
  `paket` enum('paket','dokumen','colly') NOT NULL,
  `estimasi` text,
  PRIMARY KEY (`id_harga`),
  KEY `FK_tb_harga_tb_cab` (`id_tujuan`),
  CONSTRAINT `FK_tb_harga_tb_cab` FOREIGN KEY (`id_tujuan`) REFERENCES `tb_cab` (`id_cabang`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- Dumping data for table marco.tb_harga: ~13 rows (approximately)
/*!40000 ALTER TABLE `tb_harga` DISABLE KEYS */;
REPLACE INTO `tb_harga` (`id_harga`, `id_tujuan`, `harga`, `paket`, `estimasi`) VALUES
	(1, 113, '10000', 'dokumen', '3 Hari'),
	(2, 113, '5000', 'paket', NULL),
	(3, 113, '20000', 'colly', NULL),
	(4, 116, '10000', 'dokumen', NULL),
	(5, 116, '5000', 'paket', NULL),
	(6, 116, '20000', 'colly', NULL),
	(7, 114, '10000', 'dokumen', NULL),
	(8, 114, '5000', 'paket', NULL),
	(9, 114, '20000', 'colly', NULL),
	(10, 117, '15000', 'dokumen', NULL),
	(11, 117, '9000', 'paket', NULL),
	(12, 117, '30000', 'colly', NULL),
	(13, 112, '10000', 'dokumen', NULL);
/*!40000 ALTER TABLE `tb_harga` ENABLE KEYS */;


-- Dumping structure for table marco.tb_kariawan
CREATE TABLE IF NOT EXISTS `tb_kariawan` (
  `id_kariawan` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  PRIMARY KEY (`id_kariawan`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table marco.tb_kariawan: ~2 rows (approximately)
/*!40000 ALTER TABLE `tb_kariawan` DISABLE KEYS */;
REPLACE INTO `tb_kariawan` (`id_kariawan`, `nama`, `jabatan`) VALUES
	(1, 'Marco Mario Lameanda', 'Admin'),
	(2, 'Marco', 'Admin Keuangan');
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table marco.tb_mobil: ~2 rows (approximately)
/*!40000 ALTER TABLE `tb_mobil` DISABLE KEYS */;
REPLACE INTO `tb_mobil` (`id_mobil`, `id_nopol`, `nama`, `alamat`, `jenis`) VALUES
	(1, 'DN 8386 AQ', 'Frangky', 'Jl. Dewi Sartika 3', 'Grand Max Box'),
	(4, 'DN 5555 TY', 'Doni', 'Jl. Garuda 2', 'Truk Box');
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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- Dumping data for table marco.tb_tracking: ~0 rows (approximately)
/*!40000 ALTER TABLE `tb_tracking` DISABLE KEYS */;
REPLACE INTO `tb_tracking` (`id_tracking`, `id_exp`, `id_barang`, `status`) VALUES
	(17, 2, 1234567890, 'Sampai');
/*!40000 ALTER TABLE `tb_tracking` ENABLE KEYS */;


-- Dumping structure for table marco.tb_user
CREATE TABLE IF NOT EXISTS `tb_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL DEFAULT '',
  `password` varchar(50) NOT NULL DEFAULT '',
  `level` enum('A','C') DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table marco.tb_user: ~2 rows (approximately)
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
	`jenis` ENUM('Doc','Paket') NOT NULL COLLATE 'latin1_swedish_ci',
	`status` ENUM('Sampai','Transit','Manifested') NOT NULL COLLATE 'latin1_swedish_ci',
	`kota` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci'
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
	`jenis` ENUM('Doc','Paket') NOT NULL COLLATE 'latin1_swedish_ci',
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
	`kota` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`harga` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`paket` ENUM('paket','dokumen','colly') NOT NULL COLLATE 'latin1_swedish_ci',
	`estimasi` TEXT NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;


-- Dumping structure for view marco.track_view
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `track_view`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `track_view` AS select `m3`.`awb` AS `awb`,`m3`.`nama_barang` AS `nama_barang`,`m3`.`pengirim` AS `pengirim`,`m3`.`penerima` AS `penerima`,`m3`.`alamat_penerima` AS `alamat_penerima`,`m3`.`jenis` AS `jenis`,`m1`.`status` AS `status`,`m4`.`kota` AS `kota` from (((`tb_tracking` `m1` join `tb_exp` `m2` on((`m1`.`id_exp` = `m2`.`id_antar`))) join `tb_barang` `m3` on((`m1`.`id_barang` = `m3`.`awb`))) join `tb_cab` `m4` on((`m3`.`tujuan` = `m4`.`id_cabang`)));


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
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_harga` AS select `m2`.`kota` AS `kota`,`m1`.`harga` AS `harga`,`m1`.`paket` AS `paket`,`m1`.`estimasi` AS `estimasi` from (`tb_harga` `m1` join `tb_cab` `m2` on((`m1`.`id_tujuan` = `m2`.`id_cabang`)));
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
