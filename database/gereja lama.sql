-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Bulan Mei 2021 pada 08.14
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id_role` varchar(3) NOT NULL,
  `nama_role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id_role`, `nama_role`) VALUES
('ad', 'admin'),
('jem', 'jemaat'),
('kw', 'ketua wilayah'),
('mj', 'majelis'),
('tu', 'tata usaha');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_aktivitas`
--

CREATE TABLE `tbl_aktivitas` (
  `id_kegiatan` int(7) NOT NULL,
  `nama_kegiatan` varchar(150) NOT NULL,
  `deskripsi` varchar(250) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `surat_keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_aktivitas`
--

INSERT INTO `tbl_aktivitas` (`id_kegiatan`, `nama_kegiatan`, `deskripsi`, `tanggal_mulai`, `tanggal_selesai`, `surat_keterangan`) VALUES
(1, 'Paskah 2021', 'Acara paskah tahunan', '2021-05-05', '2021-05-06', 'contoh.pdf');

-- --------------------------------------------------------

CREATE TABLE `tbl_panitia` ( 
	`p_a_id_kegiatan` INT(7) NOT NULL ,
	`p_u_id_user` VARCHAR(8) NOT NULL DEFAULT 'USR00001' , 
	`jabatan` VARCHAR(50) NOT NULL , `masa_berakhir` DATE NOT NULL , 
	`status_jabatan` BIT(1) NOT NULL ) ENGINE = InnoDB DEFAULT CHARSET=latin1;

--
-- Struktur dari tabel `tbl_atestasikeluar`
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
-- Struktur dari tabel `tbl_atestasimasuk`
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
-- Dumping data untuk tabel `tbl_atestasimasuk`
--

INSERT INTO `tbl_atestasimasuk` (`idAtestasiM`, `noAtestasi`, `tglPengajuan`, `namaLengkap`, `alamat`, `email`, `noTelp`, `noWA`, `agama`, `gerejaAsal`, `status`, `pasFoto`, `scanAkteBaptisSidi`, `suratKeterangan`) VALUES
(1, '210525', '2021-05-25', 'Dinda', 'Jl Asia Afrika', 'dindaayuf8@gmail.com', '085156381638', '085156381638', 'Kristen', 'GKI Guntur', 'Belum Disetujui', 'picture/In-Toast(2).png', 'picture/In-Toast(2).png', 'picture/In-Toast(2).png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_gereja`
--

CREATE TABLE `tbl_gereja` (
  `id_gereja` int(11) NOT NULL,
  `nama` varchar(500) NOT NULL,
  `alamat` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_gereja`
--

INSERT INTO `tbl_gereja` (`id_gereja`, `nama`, `alamat`) VALUES
(1, 'Gereja Kristen Pasundan Jemaat Bandung', 'Jl Kebon Jati No 108'),
(2, 'Gereja Kristen Pasundan', 'Jl Gatot Subroto No 24'),
(3, 'Gereja Kristen Pasundan Cimahi', 'Jl. Gatot Subroto No.24, Karangmekar, Cimahi Tengah, Kota Cimahi, Jawa Barat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kelahiran`
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
-- Dumping data untuk tabel `tbl_kelahiran`
--

INSERT INTO `tbl_kelahiran` (`IdKelahiran`, `noAkte`, `namaAyah`, `namaIbu`, `namaAnak`, `jk`, `tglLahir`, `goldar`, `namaPelapor`, `tglPelapor`) VALUES
(1, 3213341, 'AyahTest', 'IbuTest', 'AnakTest', 'P', '2021-05-18', 'B', 'PelaporTest', '2021-05-20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kematian`
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
-- Dumping data untuk tabel `tbl_kematian`
--

INSERT INTO `tbl_kematian` (`IdKematian`, `noJemaat`, `namaJemaat`, `tglMeninggal`, `keterangan`, `lokasiPemakaman`, `tglPemakaman`, `yangMelayani`) VALUES
(1, 3214567, 'TestNamaJemaat', '2021-05-21', 'Sakit', 'Jl Test', '2021-05-23', 'Pdt Test');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pekerjaan`
--

CREATE TABLE `tbl_pekerjaan` (
  `id_pekerjaan` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pekerjaan`
--

INSERT INTO `tbl_pekerjaan` (`id_pekerjaan`, `nama`) VALUES
(1, 'Dokter'),
(2, 'Pendeta'),
(3, 'Karyawan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
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
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `foto`, `status`, `id_role`) VALUES
('USR001', 'Amir', 'admin', '21232f297a57a5a743894a0e4a801fc3', NULL, 'Aktif', 'ad'),
('USR002', 'Jack', 'jemaat', '6ae36186a6c97b017319bc5ec47fe5d0', NULL, 'Aktif', 'jem'),
('USR003', 'Martha', 'majelis', '6375d4cda4127202fb101f21daca5175', NULL, 'Aktif', 'mj');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indeks untuk tabel `tbl_aktivitas`
--
ALTER TABLE `tbl_aktivitas`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indeks untuk tabel `tbl_atestasikeluar`
--
ALTER TABLE `tbl_atestasikeluar`
  ADD PRIMARY KEY (`ID_Atestasi_K`);

--
-- Indeks untuk tabel `tbl_atestasimasuk`
--
ALTER TABLE `tbl_atestasimasuk`
  ADD PRIMARY KEY (`idAtestasiM`);

--
-- Indeks untuk tabel `tbl_gereja`
--
ALTER TABLE `tbl_gereja`
  ADD PRIMARY KEY (`id_gereja`);

--
-- Indeks untuk tabel `tbl_kelahiran`
--
ALTER TABLE `tbl_kelahiran`
  ADD PRIMARY KEY (`IdKelahiran`);

--
-- Indeks untuk tabel `tbl_kematian`
--
ALTER TABLE `tbl_kematian`
  ADD PRIMARY KEY (`IdKematian`);


--
-- Indeks untuk tabel `tbl_pekerjaan`
--
ALTER TABLE `tbl_pekerjaan`
  ADD PRIMARY KEY (`id_pekerjaan`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--
ALTER TABLE `tbl_aktivitas`
  MODIFY `id_kegiatan` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT untuk tabel `tbl_atestasimasuk`
--
ALTER TABLE `tbl_atestasimasuk`
  MODIFY `idAtestasiM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_kelahiran`
--
ALTER TABLE `tbl_kelahiran`
  MODIFY `IdKelahiran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_kematian`
--
ALTER TABLE `tbl_kematian`
  MODIFY `IdKematian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
