-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 19, 2025 at 03:37 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_masjid`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_log`
--

CREATE TABLE `data_log` (
  `aktivitas` varchar(255) NOT NULL,
  `pelaku_aktivitas` varchar(255) NOT NULL,
  `tanggal_aktivitas` datetime NOT NULL,
  `detail_aktivitas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_log`
--

INSERT INTO `data_log` (`aktivitas`, `pelaku_aktivitas`, `tanggal_aktivitas`, `detail_aktivitas`) VALUES
('Hapus', 'root@localhost', '2019-08-03 09:20:07', 'Menghapus Petugas BerID PT-003'),
('Hapus', 'root@localhost', '2019-08-03 09:20:10', 'Menghapus Petugas BerID PT-002'),
('Hapus', 'root@localhost', '2019-08-03 09:20:13', 'Menghapus Petugas BerID PT-001'),
('Hapus', 'root@localhost', '2019-08-03 09:20:49', 'Menghapus User BerID 001'),
('Tambah', 'root@localhost', '2019-08-03 10:31:47', 'Menambah Petugas BerID PT-001'),
('Mengubah', 'root@localhost', '2019-08-03 10:33:59', 'Mengubah Data Petugas BerID PT-001'),
('Hapus', 'root@localhost', '2019-08-03 10:34:07', 'Menghapus Petugas BerID PT-001'),
('Tambah', 'root@localhost', '2019-08-03 10:34:19', 'Menambah Petugas BerID PT-001'),
('Mengubah', 'root@localhost', '2019-08-03 10:34:25', 'Mengubah Data Petugas BerID PT-001'),
('Hapus', 'root@localhost', '2019-08-03 10:34:31', 'Menghapus Petugas BerID PT-001'),
('Tambah', 'root@localhost', '2019-08-03 10:37:33', 'Menambah Kategori Donasi'),
('Tambah', 'root@localhost', '2019-08-04 11:42:22', 'Menambah User BerID US-001'),
('Tambah', 'root@localhost', '2019-08-04 19:03:03', 'Menambah User Kategori Sedekah'),
('Tambah', 'root@localhost', '2019-08-04 19:28:18', 'Menambah Petugas BerID PT-001'),
('Tambah', 'root@localhost', '2019-08-04 19:28:53', 'Menambah User BerID US-002'),
('Mengubah', 'root@localhost', '2021-09-01 20:22:29', 'Mengubah Data Petugas BerID PT-001'),
('Hapus', 'root@localhost', '2025-01-19 12:29:14', 'Menghapus User BerID US-002'),
('Hapus', 'root@localhost', '2025-01-19 12:29:17', 'Menghapus User BerID US-001'),
('Tambah', 'root@localhost', '2025-01-19 14:14:23', 'Menambah Petugas BerID PT-002'),
('Mengubah', 'root@localhost', '2025-01-19 14:14:37', 'Mengubah Data Petugas BerID PT-001'),
('Tambah', 'root@localhost', '2025-01-19 14:16:21', 'Menambah User BerID US-001'),
('Tambah', 'root@localhost', '2025-01-19 14:16:32', 'Menambah User Kategori Tes'),
('Mengubah', 'root@localhost', '2025-01-19 22:04:34', 'Mengubah Data User BerID US-001');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` char(6) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `nohp_admin` varchar(13) DEFAULT NULL,
  `alamat_admin` text,
  `username_admin` varchar(50) NOT NULL,
  `password_admin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `nama_admin`, `nohp_admin`, `alamat_admin`, `username_admin`, `password_admin`) VALUES
('AD-001', 'Ari Smrd', '085863727216', 'Bebas', 'admin', '*4ACFE3202A5FF5CF467898FC58AAB1D615029441'),
('AD-002', 'Eka Prasetyo', '081234567891', 'Surabaya', 'eka', '40bd001563085fc35165329ea1ff5c5ecbdbbeef');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_agenda`
--

CREATE TABLE `tbl_agenda` (
  `id_agenda` int NOT NULL,
  `id_petugas` char(6) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `jam_awal` time NOT NULL,
  `jam_akhir` time NOT NULL,
  `tgl_awal` date NOT NULL,
  `tgl_akhir` date NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_agenda`
--

INSERT INTO `tbl_agenda` (`id_agenda`, `id_petugas`, `judul`, `jam_awal`, `jam_akhir`, `tgl_awal`, `tgl_akhir`, `keterangan`) VALUES
(1, 'PT-001', 'Tahfidz Alquran Syeikh Abdurrahman', '17:24:00', '17:25:00', '2025-01-19', '2025-01-19', 'tes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_album`
--

CREATE TABLE `tbl_album` (
  `id_album` int NOT NULL,
  `id_petugas` char(6) NOT NULL,
  `file_name` varchar(90) NOT NULL,
  `tgl_upload` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_album`
--

INSERT INTO `tbl_album` (`id_album`, `id_petugas`, `file_name`, `tgl_upload`) VALUES
(1, 'PT-001', 'activity user.png', '2025-01-19');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dana`
--

CREATE TABLE `tbl_dana` (
  `id_dana` int NOT NULL,
  `id_kategori` char(10) NOT NULL,
  `total` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_dana`
--

INSERT INTO `tbl_dana` (`id_dana`, `id_kategori`, `total`) VALUES
(1, 'KT01', 0),
(2, 'KT02', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detailpemasukan`
--

CREATE TABLE `tbl_detailpemasukan` (
  `id_pemasukan` char(10) NOT NULL,
  `id_kategori` varchar(10) NOT NULL,
  `jumlah` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_detailpemasukan`
--

INSERT INTO `tbl_detailpemasukan` (`id_pemasukan`, `id_kategori`, `jumlah`) VALUES
('PM-003', 'KT01', 5000),
('PM-004', 'KT01', 7000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detailtransfer`
--

CREATE TABLE `tbl_detailtransfer` (
  `id_transfer` varchar(10) NOT NULL,
  `id_kategori` char(10) NOT NULL,
  `jumlah` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_detailtransfer`
--

INSERT INTO `tbl_detailtransfer` (`id_transfer`, `id_kategori`, `jumlah`) VALUES
('PM-001', 'KT01', 10000),
('PM-002', 'KT02', 20000),
('PM-003', 'KT01', 5000),
('PM-004', 'KT01', 7000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` char(10) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `nama_kategori`) VALUES
('KT01', 'Donasi'),
('KT02', 'Sedekah'),
('KT03', 'Tes');

--
-- Triggers `tbl_kategori`
--
DELIMITER $$
CREATE TRIGGER `auto` AFTER INSERT ON `tbl_kategori` FOR EACH ROW BEGIN
INSERT INTO tbl_dana(id_kategori) values (new.id_kategori);
INSERT INTO data_log (aktivitas, pelaku_aktivitas, tanggal_aktivitas, detail_aktivitas)
  VALUES ('Tambah', USER(),now(), CONCAT('Menambah User Kategori ', NEW.nama_kategori) );
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pemasukan`
--

CREATE TABLE `tbl_pemasukan` (
  `id_pemasukan` char(10) NOT NULL,
  `id_user` varchar(30) DEFAULT NULL,
  `id_petugas` char(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `tgl_pemasukan` varchar(15) NOT NULL,
  `totalbayar` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pemasukan`
--

INSERT INTO `tbl_pemasukan` (`id_pemasukan`, `id_user`, `id_petugas`, `nama`, `tgl_pemasukan`, `totalbayar`) VALUES
('PM-003', 'US-001', 'PT-001', 'FIkri', '2025-01-19', 5000),
('PM-004', 'US-001', 'PT-001', 'FIkri', '2025-01-19', 7000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengeluaran`
--

CREATE TABLE `tbl_pengeluaran` (
  `id_pengeluaran` char(10) NOT NULL,
  `id_kategori` char(10) NOT NULL,
  `id_petugas` char(10) NOT NULL,
  `tgl_pengeluaran` datetime NOT NULL,
  `nominal` int NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `tbl_pengeluaran`
--
DELIMITER $$
CREATE TRIGGER `danakeluar_auto` AFTER INSERT ON `tbl_pengeluaran` FOR EACH ROW BEGIN
UPDATE tbl_dana set total = total - new.nominal where id_kategori = new.id_kategori;
    
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_petugas`
--

CREATE TABLE `tbl_petugas` (
  `id_petugas` char(6) NOT NULL,
  `no_ktp` int NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL,
  `id_admin` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_petugas`
--

INSERT INTO `tbl_petugas` (`id_petugas`, `no_ktp`, `nama`, `alamat`, `no_hp`, `username`, `password`, `id_admin`) VALUES
('PT-001', 908070605, 'Ari Sumardi1', ' Sekeloa ', '2147483647', 'petugas', '$2y$10$q/vBmuqpujbweoBkZvR5TOWN0AnoqDb/1PiS.s7Bf9OjFYq07ews6', 'AD-001'),
('PT-002', 12223455, 'Budiman', 'Padang', '082165443677', 'budiman', '$2y$10$iYvJXtA2W73B/8G3xCd3TeFbpgHT5c7ydz01rwkqlXSk8GAJYcI1O', 'AD-002');

--
-- Triggers `tbl_petugas`
--
DELIMITER $$
CREATE TRIGGER `editpetugas` AFTER UPDATE ON `tbl_petugas` FOR EACH ROW INSERT INTO data_log (aktivitas, pelaku_aktivitas, tanggal_aktivitas, detail_aktivitas)
  VALUES ('Mengubah', USER(),now(), CONCAT('Mengubah Data Petugas BerID ', new.id_petugas) )
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `hapuspetugas` BEFORE DELETE ON `tbl_petugas` FOR EACH ROW INSERT INTO data_log (aktivitas, pelaku_aktivitas, tanggal_aktivitas, detail_aktivitas)
  VALUES ('Hapus', USER(),now(), CONCAT('Menghapus Petugas BerID ', old.id_petugas) )
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tambahpetugas` AFTER INSERT ON `tbl_petugas` FOR EACH ROW INSERT INTO data_log (aktivitas, pelaku_aktivitas, tanggal_aktivitas, detail_aktivitas)
  VALUES ('Tambah', USER(),now(), CONCAT('Menambah Petugas BerID ', NEW.id_petugas) )
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sementara`
--

CREATE TABLE `tbl_sementara` (
  `id_pemasukan` char(10) NOT NULL,
  `id_kategori` char(10) NOT NULL,
  `jumlah` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sementaratrf`
--

CREATE TABLE `tbl_sementaratrf` (
  `id_transfer` varchar(50) NOT NULL,
  `id_kategori` varchar(30) NOT NULL,
  `subtotal` decimal(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transfer`
--

CREATE TABLE `tbl_transfer` (
  `id_transfer` varchar(10) NOT NULL,
  `id_user` char(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_rekening` varchar(30) NOT NULL,
  `nama_bank` varchar(30) NOT NULL,
  `jumlah` bigint NOT NULL,
  `tgl_transfer` date NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` enum('tertunda','sukses','selesai') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_transfer`
--

INSERT INTO `tbl_transfer` (`id_transfer`, `id_user`, `nama`, `no_rekening`, `nama_bank`, `jumlah`, `tgl_transfer`, `image`, `status`) VALUES
('', 'US-001', 'FIkri', '', '', 10000, '2025-01-19', 'activity biro.png', 'sukses'),
('PM-001', 'US-001', 'FIkri', '', '', 10000, '2025-01-19', 'activity biro.png', 'sukses'),
('PM-002', 'US-001', 'FIkri', '', '', 20000, '2025-01-19', 'activity admin.png', 'sukses'),
('PM-003', 'US-001', 'FIkri', '0865131609', 'BNI', 5000, '2025-01-19', 'activity user.png', 'selesai'),
('PM-004', 'US-001', 'FIkri', '0865131609', 'BNI', 7000, '2025-01-19', 'activity biro.png', 'selesai');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` char(6) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `nohp_user` varchar(13) NOT NULL,
  `alamat_user` text NOT NULL,
  `bank_user` varchar(100) DEFAULT NULL,
  `rekening_user` varchar(100) DEFAULT NULL,
  `username_user` varchar(50) NOT NULL,
  `password_user` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_user`, `nohp_user`, `alamat_user`, `bank_user`, `rekening_user`, `username_user`, `password_user`) VALUES
('US-001', 'FIkri', '082165443677', ' Padang ', 'BNI', '0865131609', 'fikri', '$2y$10$sxyQpfCdG6.uecvn/aEkD.ILeIqBnI4J2wcCmx7nL8sLjO5s0WcNe');

--
-- Triggers `tbl_user`
--
DELIMITER $$
CREATE TRIGGER `deteleuser` BEFORE DELETE ON `tbl_user` FOR EACH ROW INSERT INTO data_log (aktivitas, pelaku_aktivitas, tanggal_aktivitas, detail_aktivitas)
  VALUES ('Hapus', USER(),now(), CONCAT('Menghapus User BerID ', old.id_user) )
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `edituser` AFTER UPDATE ON `tbl_user` FOR EACH ROW INSERT INTO data_log (aktivitas, pelaku_aktivitas, tanggal_aktivitas, detail_aktivitas)
  VALUES ('Mengubah', USER(),now(), CONCAT('Mengubah Data User BerID ', new.id_user) )
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tambahuser` AFTER INSERT ON `tbl_user` FOR EACH ROW INSERT INTO data_log (aktivitas, pelaku_aktivitas, tanggal_aktivitas, detail_aktivitas)
  VALUES ('Tambah', USER(),now(), CONCAT('Menambah User BerID ', NEW.id_user) )
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tbl_agenda`
--
ALTER TABLE `tbl_agenda`
  ADD PRIMARY KEY (`id_agenda`),
  ADD KEY `id_petugas` (`id_petugas`),
  ADD KEY `id_petugas_2` (`id_petugas`),
  ADD KEY `id_petugas_3` (`id_petugas`),
  ADD KEY `id_petugas_4` (`id_petugas`),
  ADD KEY `id_petugas_5` (`id_petugas`);

--
-- Indexes for table `tbl_album`
--
ALTER TABLE `tbl_album`
  ADD PRIMARY KEY (`id_album`),
  ADD KEY `id_petugas` (`id_petugas`);

--
-- Indexes for table `tbl_dana`
--
ALTER TABLE `tbl_dana`
  ADD PRIMARY KEY (`id_dana`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `tbl_detailpemasukan`
--
ALTER TABLE `tbl_detailpemasukan`
  ADD KEY `id_pemasukan` (`id_pemasukan`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `tbl_detailtransfer`
--
ALTER TABLE `tbl_detailtransfer`
  ADD KEY `2` (`id_kategori`),
  ADD KEY `1` (`id_transfer`),
  ADD KEY `id_transfer` (`id_transfer`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tbl_pemasukan`
--
ALTER TABLE `tbl_pemasukan`
  ADD PRIMARY KEY (`id_pemasukan`),
  ADD KEY `id_petugas` (`id_petugas`),
  ADD KEY `id_petugas_2` (`id_petugas`),
  ADD KEY `id_petugas_3` (`id_petugas`);

--
-- Indexes for table `tbl_pengeluaran`
--
ALTER TABLE `tbl_pengeluaran`
  ADD PRIMARY KEY (`id_pengeluaran`),
  ADD KEY `id_petugas` (`id_petugas`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_petugas_2` (`id_petugas`),
  ADD KEY `id_petugas_3` (`id_petugas`);

--
-- Indexes for table `tbl_petugas`
--
ALTER TABLE `tbl_petugas`
  ADD PRIMARY KEY (`id_petugas`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `tbl_sementara`
--
ALTER TABLE `tbl_sementara`
  ADD KEY `id_pemasukan` (`id_pemasukan`);

--
-- Indexes for table `tbl_sementaratrf`
--
ALTER TABLE `tbl_sementaratrf`
  ADD PRIMARY KEY (`id_transfer`);

--
-- Indexes for table `tbl_transfer`
--
ALTER TABLE `tbl_transfer`
  ADD PRIMARY KEY (`id_transfer`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_agenda`
--
ALTER TABLE `tbl_agenda`
  MODIFY `id_agenda` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_album`
--
ALTER TABLE `tbl_album`
  MODIFY `id_album` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_dana`
--
ALTER TABLE `tbl_dana`
  MODIFY `id_dana` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_agenda`
--
ALTER TABLE `tbl_agenda`
  ADD CONSTRAINT `tbl_agenda_ibfk_1` FOREIGN KEY (`id_petugas`) REFERENCES `tbl_petugas` (`id_petugas`);

--
-- Constraints for table `tbl_album`
--
ALTER TABLE `tbl_album`
  ADD CONSTRAINT `tbl_album_ibfk_1` FOREIGN KEY (`id_petugas`) REFERENCES `tbl_petugas` (`id_petugas`);

--
-- Constraints for table `tbl_dana`
--
ALTER TABLE `tbl_dana`
  ADD CONSTRAINT `tbl_dana_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `tbl_kategori` (`id_kategori`);

--
-- Constraints for table `tbl_detailpemasukan`
--
ALTER TABLE `tbl_detailpemasukan`
  ADD CONSTRAINT `tbl_detailpemasukan_ibfk_1` FOREIGN KEY (`id_pemasukan`) REFERENCES `tbl_pemasukan` (`id_pemasukan`),
  ADD CONSTRAINT `tbl_detailpemasukan_ibfk_2` FOREIGN KEY (`id_kategori`) REFERENCES `tbl_kategori` (`id_kategori`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_detailtransfer`
--
ALTER TABLE `tbl_detailtransfer`
  ADD CONSTRAINT `tbl_detailtransfer_ibfk_1` FOREIGN KEY (`id_transfer`) REFERENCES `tbl_transfer` (`id_transfer`);

--
-- Constraints for table `tbl_pemasukan`
--
ALTER TABLE `tbl_pemasukan`
  ADD CONSTRAINT `tbl_pemasukan_ibfk_1` FOREIGN KEY (`id_petugas`) REFERENCES `tbl_petugas` (`id_petugas`);

--
-- Constraints for table `tbl_pengeluaran`
--
ALTER TABLE `tbl_pengeluaran`
  ADD CONSTRAINT `tbl_pengeluaran_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `tbl_kategori` (`id_kategori`),
  ADD CONSTRAINT `tbl_pengeluaran_ibfk_2` FOREIGN KEY (`id_petugas`) REFERENCES `tbl_petugas` (`id_petugas`);

--
-- Constraints for table `tbl_petugas`
--
ALTER TABLE `tbl_petugas`
  ADD CONSTRAINT `tbl_petugas_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `tbl_admin` (`id_admin`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_transfer`
--
ALTER TABLE `tbl_transfer`
  ADD CONSTRAINT `tbl_transfer_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
