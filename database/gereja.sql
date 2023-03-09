-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2021 at 11:33 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gereja`
--

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` varchar(3) NOT NULL,
  `nama_role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `nama_role`) VALUES
('ad', 'admin'),
('jem', 'jemaat'),
('kw', 'ketua wilayah'),
('mj', 'majelis'),
('tu', 'tata usaha');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_aktivitas`
--

CREATE TABLE `tbl_aktivitas` (
  `id_kegiatan` int(7) NOT NULL,
  `nama_kegiatan` varchar(150) NOT NULL,
  `deskripsi` varchar(250),
  `jenis` varchar(20) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `surat_keterangan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_aktivitas`
--

INSERT INTO `tbl_aktivitas` (`id_kegiatan`, `nama_kegiatan`, `deskripsi`, `jenis`, `tanggal_mulai`, `tanggal_selesai`, `surat_keterangan`) VALUES
(1, 'Paskah 2021', 'Acara paskah tahunan', 'Acara', '2021-05-05', '2021-05-06', 'sk/contoh.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_atestasikeluar`
--

CREATE TABLE `tbl_atestasikeluar` (
  `ID_Atestasi_K` int(11) NOT NULL,
  `No_Atestasi_Keluar` varchar(20) NOT NULL,
  `tgl_Pengajuan` date NOT NULL,
  `noJemaat` varchar(500) NOT NULL,
  `jemaatNama_lengkap` varchar(500) NOT NULL,
  `alamatlama` varchar(500) NOT NULL,
  `alamatbaru` varchar(500) NOT NULL,
  `gerejaID` varchar(20) NOT NULL,
  `alamatGereja` varchar(500) NOT NULL,
  `alasan` varchar(500) NOT NULL,
  `anggotaTurutPindah` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_atestasimasuk`
--

CREATE TABLE `tbl_atestasimasuk` (
  `idAtestasiM` int(11) NOT NULL,
  `noAtestasi` varchar(20) NOT NULL,
  `tglPengajuan` date NOT NULL,
  `namaLengkap` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `email` varchar(20) NOT NULL,
  `noTelp` varchar(20) NOT NULL,
  `noWA` varchar(20) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `gerejaAsal` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `pasFoto` varchar(50) NOT NULL,
  `scanAkteBaptisSidi` varchar(50) NOT NULL,
  `suratKeterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_atestasimasuk`
--

INSERT INTO `tbl_atestasimasuk` (`idAtestasiM`, `noAtestasi`, `tglPengajuan`, `namaLengkap`, `alamat`, `email`, `noTelp`, `noWA`, `agama`, `gerejaAsal`, `status`, `pasFoto`, `scanAkteBaptisSidi`, `suratKeterangan`) VALUES
(1, '210525', '2021-05-25', 'Dinda', 'Jl Asia Afrika', 'dindaayuf8@gmail.com', '085156381638', '085156381638', 'Kristen', 'GKI Guntur', 'Belum Disetujui', 'picture/In-Toast(2).png', 'picture/In-Toast(2).png', 'picture/In-Toast(2).png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gereja`
--

CREATE TABLE `tbl_gereja` (
  `id_gereja` int(11) NOT NULL,
  `nama` varchar(500) NOT NULL,
  `alamat` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_gereja`
--

INSERT INTO `tbl_gereja` (`id_gereja`, `nama`, `alamat`) VALUES
(1, 'Gereja Kristen Pasundan Jemaat Bandung', 'Jl Kebon Jati No 108'),
(2, 'Gereja Kristen Pasundan', 'Jl Gatot Subroto No 24'),
(3, 'Gereja Kristen Pasundan Cimahi', 'Jl. Gatot Subroto No.24, Karangmekar, Cimahi Tengah, Kota Cimahi, Jawa Barat');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kelahiran`
--

CREATE TABLE `tbl_kelahiran` (
  `IdKelahiran` int(11) NOT NULL,
  `noAkte` int(30) NOT NULL,
  `namaAyah` varchar(50) NOT NULL,
  `namaIbu` varchar(50) NOT NULL,
  `namaAnak` varchar(50) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `tglLahir` date NOT NULL,
  `goldar` varchar(10) NOT NULL,
  `namaPelapor` varchar(50) NOT NULL,
  `tglPelapor` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kelahiran`
--

INSERT INTO `tbl_kelahiran` (`IdKelahiran`, `noAkte`, `namaAyah`, `namaIbu`, `namaAnak`, `jk`, `tglLahir`, `goldar`, `namaPelapor`, `tglPelapor`) VALUES
(1, 3213341, 'AyahTest', 'IbuTest', 'AnakTest', 'P', '2021-05-18', 'B', 'PelaporTest', '2021-05-20');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kematian`
--

CREATE TABLE `tbl_kematian` (
  `IdKematian` int(11) NOT NULL,
  `noJemaat` int(50) NOT NULL,
  `namaJemaat` varchar(50) NOT NULL,
  `tglMeninggal` date NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `lokasiPemakaman` varchar(100) NOT NULL,
  `tglPemakaman` date NOT NULL,
  `yangMelayani` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kematian`
--

INSERT INTO `tbl_kematian` (`IdKematian`, `noJemaat`, `namaJemaat`, `tglMeninggal`, `keterangan`, `lokasiPemakaman`, `tglPemakaman`, `yangMelayani`) VALUES
(1, 3214567, 'TestNamaJemaat', '2021-05-21', 'Sakit', 'Jl Test', '2021-05-23', 'Pdt Test');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_panitia`
--

CREATE TABLE `tbl_panitia` (
  `p_a_id_kegiatan` int(7) NOT NULL,
  `p_u_id_user` varchar(8) CHARACTER SET latin1 NOT NULL DEFAULT 'USR00001',
  `jabatan` varchar(50) NOT NULL,
  `masa_berakhir` date DEFAULT NULL,
  `status_jabatan` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
-- Error reading data for table gereja.tbl_panitia: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `gereja`.`tbl_panitia`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pekerjaan`
--

CREATE TABLE `tbl_pekerjaan` (
  `id_pekerjaan` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pekerjaan`
--

INSERT INTO `tbl_pekerjaan` (`id_pekerjaan`, `nama`) VALUES
(1, 'Dokter'),
(2, 'Pendeta'),
(3, 'Karyawan');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(8) NOT NULL DEFAULT 'USR00001',
  `nama` varchar(35) DEFAULT NULL,
  `username` varchar(15) DEFAULT NULL,
  `password` varchar(500) DEFAULT NULL,
  `foto` varchar(500) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `id_role` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `foto`, `status`, `id_role`) VALUES
('USR001', 'Amir', 'admin', '21232f297a57a5a743894a0e4a801fc3', NULL, 'Aktif', 'ad'),
('USR002', 'Jack', 'jemaat', '6ae36186a6c97b017319bc5ec47fe5d0', NULL, 'Aktif', 'jem'),
('USR003', 'Martha', 'majelis', '6375d4cda4127202fb101f21daca5175', NULL, 'Aktif', 'mj');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `tbl_aktivitas`
--
ALTER TABLE `tbl_aktivitas`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indexes for table `tbl_atestasikeluar`
--
ALTER TABLE `tbl_atestasikeluar`
  ADD PRIMARY KEY (`ID_Atestasi_K`);

--
-- Indexes for table `tbl_atestasimasuk`
--
ALTER TABLE `tbl_atestasimasuk`
  ADD PRIMARY KEY (`idAtestasiM`);

--
-- Indexes for table `tbl_gereja`
--
ALTER TABLE `tbl_gereja`
  ADD PRIMARY KEY (`id_gereja`);

--
-- Indexes for table `tbl_kelahiran`
--
ALTER TABLE `tbl_kelahiran`
  ADD PRIMARY KEY (`IdKelahiran`);

--
-- Indexes for table `tbl_kematian`
--
ALTER TABLE `tbl_kematian`
  ADD PRIMARY KEY (`IdKematian`);

--
-- Indexes for table `tbl_panitia`
--
ALTER TABLE `tbl_panitia`
  ADD KEY `p_a_id_kegiatan` (`p_a_id_kegiatan`),
  ADD KEY `p_u_id_user` (`p_u_id_user`);

--
-- Indexes for table `tbl_pekerjaan`
--
ALTER TABLE `tbl_pekerjaan`
  ADD PRIMARY KEY (`id_pekerjaan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_aktivitas`
--
ALTER TABLE `tbl_aktivitas`
  MODIFY `id_kegiatan` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tbl_atestasimasuk`
--
ALTER TABLE `tbl_atestasimasuk`
  MODIFY `idAtestasiM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_kelahiran`
--
ALTER TABLE `tbl_kelahiran`
  MODIFY `IdKelahiran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_kematian`
--
ALTER TABLE `tbl_kematian`
  MODIFY `IdKematian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_panitia`
--
ALTER TABLE `tbl_panitia`
  ADD CONSTRAINT `tbl_panitia_ibfk_1` FOREIGN KEY (`p_a_id_kegiatan`) REFERENCES `tbl_aktivitas` (`id_kegiatan`),
  ADD CONSTRAINT `tbl_panitia_ibfk_2` FOREIGN KEY (`p_u_id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
