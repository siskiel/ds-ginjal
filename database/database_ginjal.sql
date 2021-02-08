-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.11-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             10.3.0.5771
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for database_yola
CREATE DATABASE IF NOT EXISTS `database_yola` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `database_yola`;

-- Dumping structure for table database_yola.gejala
CREATE TABLE IF NOT EXISTS `gejala` (
  `id_gejala` int(11) NOT NULL AUTO_INCREMENT,
  `kode_gejala` varchar(50) NOT NULL,
  `nama_gejala` varchar(255) NOT NULL,
  `nilai_ds` float NOT NULL,
  PRIMARY KEY (`id_gejala`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table database_yola.gejala: ~9 rows (approximately)
/*!40000 ALTER TABLE `gejala` DISABLE KEYS */;
INSERT INTO `gejala` (`id_gejala`, `kode_gejala`, `nama_gejala`, `nilai_ds`) VALUES
	(1, 'G1', 'Frekuensi buang air kecil meningkat deras', 0.6),
	(2, 'G2', 'Buang air kecil tidak lancar atau seperti tidak selesai', 0.4),
	(3, 'G3', 'Urin berwarna gelap atau keruh', 0.4),
	(4, 'G4', 'Nyeri hebat di bagian punggung sampai terjadi kolik (Rasa sakit hilang timbul dan menjalar)', 0.7),
	(5, 'G5', 'Nyeri pada bagian perut bawah', 0.6),
	(6, 'G6', 'Keluarnya serpihan pasir bersama urin', 0.6),
	(7, 'G7', 'Pembengkakan dan nyeri pada penis', 0.6),
	(8, 'G8', 'Adanya darah di dalam urin (Hematuria)', 0.6),
	(9, 'G9', 'Mulai disertai demam', 0.5);
/*!40000 ALTER TABLE `gejala` ENABLE KEYS */;

-- Dumping structure for table database_yola.pasien
CREATE TABLE IF NOT EXISTS `pasien` (
  `id_pasien` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pasien` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `umur` int(11) NOT NULL,
  `jk` enum('p','l') NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `tgl_konsul` date NOT NULL,
  `id_penyakit` int(11) NOT NULL,
  `gejala` longtext DEFAULT NULL,
  `total_perhitungan` float NOT NULL,
  PRIMARY KEY (`id_pasien`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table database_yola.pasien: ~3 rows (approximately)
/*!40000 ALTER TABLE `pasien` DISABLE KEYS */;
INSERT INTO `pasien` (`id_pasien`, `nama_pasien`, `tgl_lahir`, `umur`, `jk`, `pekerjaan`, `no_hp`, `alamat`, `tgl_konsul`, `id_penyakit`, `gejala`, `total_perhitungan`) VALUES
	(1, 'nama_pasien', '2020-06-26', 21, 'l', 'Pedagang', '089908990899', 'Jl. Galang L. Pakam', '2020-06-26', 1, 'a:4:{i:0;i:1;i:1;i:3;i:2;i:4;i:3;i:9;}', 0.94),
	(2, 'nisa', '2020-06-26', 21, 'l', 'Pedagang', '089908990899', 'Jl. Galang L. Pakam', '2020-06-26', 1, 'a:4:{i:0;i:1;i:1;i:3;i:2;i:4;i:3;i:9;}', 0.94),
	(3, 'zizah', '2020-06-26', 21, 'l', 'Pedagang', '089908990899', 'Jl. Galang L. Pakam', '2020-06-26', 1, 'a:4:{i:0;i:1;i:1;i:3;i:2;i:4;i:3;i:9;}', 0.94);
/*!40000 ALTER TABLE `pasien` ENABLE KEYS */;

-- Dumping structure for table database_yola.penyakit
CREATE TABLE IF NOT EXISTS `penyakit` (
  `id_penyakit` int(11) NOT NULL AUTO_INCREMENT,
  `kode_penyakit` varchar(255) NOT NULL,
  `nama_penyakit` varchar(255) NOT NULL,
  `solusi` text NOT NULL,
  PRIMARY KEY (`id_penyakit`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table database_yola.penyakit: ~2 rows (approximately)
/*!40000 ALTER TABLE `penyakit` DISABLE KEYS */;
INSERT INTO `penyakit` (`id_penyakit`, `kode_penyakit`, `nama_penyakit`, `solusi`) VALUES
	(1, 'P1', 'Batu Karang Ureter', 'Dokter akan melakukan pemeriksaan penunjang seperti USG, CT Scan . Jika ukuran nya kecil maka perbanyak minum air putih'),
	(2, 'P2', 'Batu Karang Uretra', 'Jika baru sudah membesar maka akan dilakukan operasi');
/*!40000 ALTER TABLE `penyakit` ENABLE KEYS */;

-- Dumping structure for table database_yola.rule
CREATE TABLE IF NOT EXISTS `rule` (
  `id_rule` int(11) NOT NULL AUTO_INCREMENT,
  `id_gejala` int(11) NOT NULL DEFAULT 0,
  `id_penyakit` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_rule`),
  KEY `fk_rule_gejala` (`id_gejala`),
  KEY `fk_rule_penyakit` (`id_penyakit`),
  CONSTRAINT `fk_rule_gejala` FOREIGN KEY (`id_gejala`) REFERENCES `gejala` (`id_gejala`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_rule_penyakit` FOREIGN KEY (`id_penyakit`) REFERENCES `penyakit` (`id_penyakit`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table database_yola.rule: ~11 rows (approximately)
/*!40000 ALTER TABLE `rule` DISABLE KEYS */;
INSERT INTO `rule` (`id_rule`, `id_gejala`, `id_penyakit`) VALUES
	(1, 1, 1),
	(2, 2, 2),
	(3, 2, 1),
	(4, 3, 1),
	(5, 3, 2),
	(6, 4, 1),
	(7, 5, 2),
	(8, 6, 1),
	(9, 7, 2),
	(10, 8, 2),
	(11, 9, 1);
/*!40000 ALTER TABLE `rule` ENABLE KEYS */;

-- Dumping structure for table database_yola.user
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` enum('admin','pasien') NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table database_yola.user: ~2 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id_user`, `nama_lengkap`, `email`, `no_hp`, `password`, `level`) VALUES
	(1, 'yolanda', 'yolanda@gmail.com', '081238888878', 'yola', 'admin'),
	(2, 'nama pasiesn', 'emailpasien@gmail.com', '0978876762563', 'pasien', 'admin');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
