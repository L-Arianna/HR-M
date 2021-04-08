-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2021 at 05:26 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hr-m`
--

-- --------------------------------------------------------

--
-- Table structure for table `dat_pegawai`
--

CREATE TABLE `dat_pegawai` (
  `id_kat_jabatan` int(11) NOT NULL,
  `id_grade` int(11) NOT NULL,
  `id_pendidikan` int(11) NOT NULL,
  `id_kat_golongan` int(11) NOT NULL,
  `id_resign` int(11) NOT NULL,
  `nip` bigint(50) NOT NULL,
  `nama_pegawai` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `nomor_ktp` varchar(100) DEFAULT NULL,
  `npwp` varchar(100) DEFAULT NULL,
  `alamat` varchar(255) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `kelurahan` varchar(100) NOT NULL,
  `rt` tinyint(4) NOT NULL,
  `rw` tinyint(4) NOT NULL,
  `desa` varchar(255) NOT NULL,
  `agama` varchar(255) NOT NULL,
  `status_nikah` varchar(255) NOT NULL,
  `asal_negara` varchar(255) NOT NULL,
  `no_telp` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date_created` int(11) NOT NULL,
  `no_rek` int(11) DEFAULT NULL,
  `atas_nama` varchar(255) DEFAULT NULL,
  `nama_bank` varchar(255) DEFAULT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dat_pegawai`
--

INSERT INTO `dat_pegawai` (`id_kat_jabatan`, `id_grade`, `id_pendidikan`, `id_kat_golongan`, `id_resign`, `nip`, `nama_pegawai`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `nomor_ktp`, `npwp`, `alamat`, `kecamatan`, `kelurahan`, `rt`, `rw`, `desa`, `agama`, `status_nikah`, `asal_negara`, `no_telp`, `email`, `username`, `password`, `role_id`, `image`, `date_created`, `no_rek`, `atas_nama`, `nama_bank`, `is_active`) VALUES
(2, 2, 4, 8, 0, 1506042021002, 'Arief Rahman Hakim', 'Semarang', '1998-02-24', 'Laki-laki', '3232937142', '', 'Jl ahmad', 'Semarang barat', 'tawang mas', 6, 0, '-', 'Islam', 'Belum', 'Warga Negara Indonesia', '087636452126', 'ariefhakim@gmail.com', 'arief', '$2y$10$DVACsNRDeCllMC9rsid31ewB8eyr17/XT/cbvzFcIJbQ.Tz7LHJb.', 3, 'default.jpg', 0, 2147483647, 'Ariefrahman', 'BCA', 1),
(3, 2, 4, 8, 0, 1507042021003, 'Sinta am', 'Semarang', '2021-04-08', 'Perempuan', '4365465232', '2312314324', 'Jl sholeh', 'Semarang barat', 'jroro', 1, 6, 'swuda', 'Islam', 'Belum', 'Warga Negara Indonesia', '087636452126', 'sinta@gmail.com', 'sinta', '$2y$10$dny.aXfCRn88f/1ll5gHnupxBdrBgL6byB6BepmZ2wrRgjg6h8cX2', 3, 'default.jpg', 1617768255, 45646454, 'sinta', 'BCA', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dropdown_aspekpemasaran`
--

CREATE TABLE `tbl_dropdown_aspekpemasaran` (
  `id_dropdown_pemasaran` int(11) NOT NULL,
  `nama_dropdown_pemasaran` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dropdown_atapbangunan`
--

CREATE TABLE `tbl_dropdown_atapbangunan` (
  `id_dropdown_atapbangunan` int(11) NOT NULL,
  `nama_dropdown_atapbangunan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dropdown_bank`
--

CREATE TABLE `tbl_dropdown_bank` (
  `id_dropdown_bank` int(11) NOT NULL,
  `nama_dropdown_bank` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dropdown_bentukbangunan`
--

CREATE TABLE `tbl_dropdown_bentukbangunan` (
  `id_dropdown_bentukbangunan` int(11) NOT NULL,
  `nama_dropdown_bentukbangunan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dropdown_bentukpinjaman`
--

CREATE TABLE `tbl_dropdown_bentukpinjaman` (
  `id_dropdown_bentukpinjaman` int(11) NOT NULL,
  `nama_dropdown_bentukpinjaman` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dropdown_bidangusaha`
--

CREATE TABLE `tbl_dropdown_bidangusaha` (
  `id_dropdown_bidangusaha` int(11) NOT NULL,
  `nama_dropdown_bidangusaha` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dropdown_daerahoperasi`
--

CREATE TABLE `tbl_dropdown_daerahoperasi` (
  `id_dropdown_daerahoperasi` int(11) NOT NULL,
  `nama_dropdown_daerahoperasi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dropdown_frekuensipickup`
--

CREATE TABLE `tbl_dropdown_frekuensipickup` (
  `id_dropdown_frekuensipickup` int(11) NOT NULL,
  `nama_dropdown_frekuensipickup` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dropdown_hubungan`
--

CREATE TABLE `tbl_dropdown_hubungan` (
  `id_dropdown_hubungan` int(11) NOT NULL,
  `nama_dropdown_hubungan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dropdown_hubungandenganpemohon`
--

CREATE TABLE `tbl_dropdown_hubungandenganpemohon` (
  `id_dropdown_hubungandenganpemohon` int(11) NOT NULL,
  `nama_dropdown_hubungandenganpemohon` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dropdown_hubunganpemeganghak`
--

CREATE TABLE `tbl_dropdown_hubunganpemeganghak` (
  `id_dropdown_hubunganpemeganghak` int(11) NOT NULL,
  `nama_dropdown_hubunganpemeganhak` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dropdown_jeniskendaraan`
--

CREATE TABLE `tbl_dropdown_jeniskendaraan` (
  `id_dropdown_jeniskendaraan` int(11) NOT NULL,
  `nama_dropdown_jeniskendaraan` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dropdown_jenistempatusaha`
--

CREATE TABLE `tbl_dropdown_jenistempatusaha` (
  `id_dropdown_jenistempatusaha` int(11) NOT NULL,
  `nama_dropdown_jenistempatusaha` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dropdown_jenisusaha`
--

CREATE TABLE `tbl_dropdown_jenisusaha` (
  `id_dropdown_jenisusaha` int(11) NOT NULL,
  `nama_dropdown_jenisusaha` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dropdown_konstruksibangunan`
--

CREATE TABLE `tbl_dropdown_konstruksibangunan` (
  `id_dropdown_konstruksibangunan` int(11) NOT NULL,
  `nama_dropdown_konstruksibangunan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dropdown_lantaibangunan`
--

CREATE TABLE `tbl_dropdown_lantaibangunan` (
  `id_dropdown_lantaibangunan` int(11) NOT NULL,
  `nama_dropdown_lantaibangunan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dropdown_lokasijaminan`
--

CREATE TABLE `tbl_dropdown_lokasijaminan` (
  `id_dropdown_lokasijaminan` int(11) NOT NULL,
  `nama_dropdown_lokasijaminan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dropdown_lokasiusaha`
--

CREATE TABLE `tbl_dropdown_lokasiusaha` (
  `id_dropdown_lokasiusaha` int(11) NOT NULL,
  `nama_dropdown_lokasiusaha` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dropdown_pekerjaan`
--

CREATE TABLE `tbl_dropdown_pekerjaan` (
  `id_dropdown_pekerjaan` int(11) NOT NULL,
  `nama_dropdown_pekerjaan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dropdown_pendidikan`
--

CREATE TABLE `tbl_dropdown_pendidikan` (
  `id_dropdown_pendidikan` int(11) NOT NULL,
  `nama_dropdown_pendidikan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dropdown_peruntukantanah`
--

CREATE TABLE `tbl_dropdown_peruntukantanah` (
  `id_dropdown_peruntukantanah` int(11) NOT NULL,
  `nama_dropdown_peruntukantanah` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dropdown_prnggunaanjaminan`
--

CREATE TABLE `tbl_dropdown_prnggunaanjaminan` (
  `id_dropdown_penggunaanjaminan` int(11) NOT NULL,
  `nama_dropdown_penggunaanjaminan` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dropdown_produk`
--

CREATE TABLE `tbl_dropdown_produk` (
  `id_dropdown_produk` int(11) NOT NULL,
  `nama_dropdown_produk` varchar(20) NOT NULL,
  `kode_dropdown_produk` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_dropdown_produk`
--

INSERT INTO `tbl_dropdown_produk` (`id_dropdown_produk`, `nama_dropdown_produk`, `kode_dropdown_produk`) VALUES
(1, 'Kredit Angsuran', '0.61'),
(2, 'Kredit Musiman', '0.62'),
(4, 'Tes 2', 'Tes012'),
(5, 'Tes3', 'Tes013');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dropdown_statuspenggarap`
--

CREATE TABLE `tbl_dropdown_statuspenggarap` (
  `id_dropdown_statuspenggarap` int(11) NOT NULL,
  `nama_dropdown_statuspenggarap` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dropdown_statustanah`
--

CREATE TABLE `tbl_dropdown_statustanah` (
  `id_dropdown_statustanah` int(11) NOT NULL,
  `nama_dropdown_statustanah` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dropdown_statustempatusaha`
--

CREATE TABLE `tbl_dropdown_statustempatusaha` (
  `id_dropdown_statustempatusaha` int(11) NOT NULL,
  `nama_dropdown_statustempatusaha` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dropdown_tempattinggal`
--

CREATE TABLE `tbl_dropdown_tempattinggal` (
  `id_dropdown_tempattinggal` int(11) NOT NULL,
  `nama_dropdown_tempattinggal` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dropdown_tujuanpinjaman`
--

CREATE TABLE `tbl_dropdown_tujuanpinjaman` (
  `id_dropdown_tujuanpinjaman` int(11) NOT NULL,
  `nama_dropdown_tujuanpinjaman` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_gaji`
--

CREATE TABLE `tb_gaji` (
  `id_gaji` int(11) NOT NULL,
  `nip` varchar(100) NOT NULL,
  `id_pendidikan` int(11) NOT NULL,
  `id_kat_jabatan` int(11) NOT NULL,
  `id_kat_golongan` int(11) NOT NULL,
  `id_grade` int(11) NOT NULL,
  `makan` int(11) NOT NULL,
  `pulsa` int(11) NOT NULL,
  `transport` int(11) NOT NULL,
  `kesehatan_k` int(11) NOT NULL,
  `tot_pot_bpjs` int(11) NOT NULL,
  `tunj_lainnya` int(11) NOT NULL,
  `jml_potongan` int(11) NOT NULL,
  `gaji_kotor` int(11) NOT NULL,
  `gaji_net` int(11) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_gaji`
--

INSERT INTO `tb_gaji` (`id_gaji`, `nip`, `id_pendidikan`, `id_kat_jabatan`, `id_kat_golongan`, `id_grade`, `makan`, `pulsa`, `transport`, `kesehatan_k`, `tot_pot_bpjs`, `tunj_lainnya`, `jml_potongan`, `gaji_kotor`, `gaji_net`, `status`) VALUES
(17, '1506042021002', 4, 2, 8, 2, 30000, 20000, 15000, 110000, 5, 15000, 110000, 2785000, 2675000, 'bayar'),
(19, '1507042021003', 4, 3, 8, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_grade`
--

CREATE TABLE `tb_grade` (
  `id_grade` int(11) NOT NULL,
  `nama_grade` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_grade`
--

INSERT INTO `tb_grade` (`id_grade`, `nama_grade`) VALUES
(1, 'Junior'),
(2, 'Middle'),
(3, 'Senior');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kat_cuti`
--

CREATE TABLE `tb_kat_cuti` (
  `id_kat_cuti` int(11) NOT NULL,
  `nama_cuti` varchar(255) NOT NULL,
  `jumlah_hari` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kat_cuti`
--

INSERT INTO `tb_kat_cuti` (`id_kat_cuti`, `nama_cuti`, `jumlah_hari`) VALUES
(1, 'Cuti Tahunan', '12 (dua belas) hari kerja');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kat_golongan`
--

CREATE TABLE `tb_kat_golongan` (
  `id_kat_golongan` int(11) NOT NULL,
  `id_grade` int(11) NOT NULL,
  `nama_golongan` varchar(255) NOT NULL,
  `gaji_gol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kat_golongan`
--

INSERT INTO `tb_kat_golongan` (`id_kat_golongan`, `id_grade`, `nama_golongan`, `gaji_gol`) VALUES
(1, 1, 'Junior 5', 20000),
(2, 1, 'Junior 4', 25000),
(3, 2, 'Middle 5', 45000),
(4, 1, 'Junior 3', 30000),
(5, 1, 'Junior 2', 35000),
(6, 1, 'Junior 1', 40000),
(7, 2, 'Middle 4', 50000),
(8, 2, 'Middle 3', 55000),
(9, 2, 'Middle 2', 60000),
(10, 2, 'Middle 1', 65000),
(11, 3, 'Senior 5', 75000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kat_jabatan`
--

CREATE TABLE `tb_kat_jabatan` (
  `id_kat_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(255) NOT NULL,
  `gapok` int(11) NOT NULL,
  `gaji_jabatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kat_jabatan`
--

INSERT INTO `tb_kat_jabatan` (`id_kat_jabatan`, `nama_jabatan`, `gapok`, `gaji_jabatan`) VALUES
(1, 'Manager', 2900000, 400000),
(2, 'Full stack development', 2200000, 250000),
(3, 'Telemarketing', 2100000, 200000),
(5, 'Umum', 1500000, 150000),
(6, 'test', 1500000, 150000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kat_peringatan`
--

CREATE TABLE `tb_kat_peringatan` (
  `id_kat_peringatan` int(11) NOT NULL,
  `nama_peringatan` varchar(255) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kat_peringatan`
--

INSERT INTO `tb_kat_peringatan` (`id_kat_peringatan`, `nama_peringatan`, `keterangan`) VALUES
(1, 'Peringatan tahap 1', 'Peringatan tahap 1 berlaku untuk jangka waktu 6 bulan'),
(2, 'Peringatan tahap 2', 'Peringatan tahap 2 dengan jangka waktu 6 bulan'),
(3, 'Peringatan tahap 3', 'Peringatan tahap 3 dengan jangka waktu 6 bulan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pendidikan`
--

CREATE TABLE `tb_pendidikan` (
  `id_pendidikan` int(11) NOT NULL,
  `nama_pendidikan` varchar(255) NOT NULL,
  `gaji_pend` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pendidikan`
--

INSERT INTO `tb_pendidikan` (`id_pendidikan`, `nama_pendidikan`, `gaji_pend`) VALUES
(1, 'SD', 50000),
(2, 'SMP', 100000),
(3, 'SMA', 150000),
(4, 'Sarjana Strata-1', 200000),
(5, 'Sarjana Strata-2', 250000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_promosi`
--

CREATE TABLE `tb_promosi` (
  `id_promosi` int(11) NOT NULL,
  `nip` int(11) NOT NULL,
  `jumlah_1` int(11) NOT NULL,
  `jumlah_2` int(11) NOT NULL,
  `jumlah_3` int(11) NOT NULL,
  `jumlah_4` int(11) NOT NULL,
  `jumlah_5` int(11) NOT NULL,
  `syarat_1` varchar(255) NOT NULL,
  `syarat_2` varchar(255) NOT NULL,
  `syarat_3` varchar(255) NOT NULL,
  `syarat_4` varchar(255) NOT NULL,
  `syarat_5` varchar(255) NOT NULL,
  `total_score` int(11) NOT NULL,
  `tgl_promosi` date NOT NULL,
  `status_promosi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_resign`
--

CREATE TABLE `tb_resign` (
  `id_resign` int(11) NOT NULL,
  `nip` bigint(50) NOT NULL,
  `tgl_resign` varchar(50) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_resign`
--

INSERT INTO `tb_resign` (`id_resign`, `nip`, `tgl_resign`, `keterangan`) VALUES
(4, 1505042021001, '07-04-2021', '<p>pegawai keluar</p>');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `is_active` int(11) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama`, `username`, `password`, `role_id`, `image`, `is_active`, `date_created`) VALUES
(17, 'arief rahman hakim', 'admin', '$2y$10$H4MBENBFSMwSAXpOpKzpfuVm1ifak2UNBZdxm/7w3G65a/fg9rC3e', 1, 'default.jpg', 1, 1617778539);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dat_pegawai`
--
ALTER TABLE `dat_pegawai`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `tbl_dropdown_aspekpemasaran`
--
ALTER TABLE `tbl_dropdown_aspekpemasaran`
  ADD PRIMARY KEY (`id_dropdown_pemasaran`);

--
-- Indexes for table `tbl_dropdown_atapbangunan`
--
ALTER TABLE `tbl_dropdown_atapbangunan`
  ADD PRIMARY KEY (`id_dropdown_atapbangunan`);

--
-- Indexes for table `tbl_dropdown_bank`
--
ALTER TABLE `tbl_dropdown_bank`
  ADD PRIMARY KEY (`id_dropdown_bank`);

--
-- Indexes for table `tbl_dropdown_bentukbangunan`
--
ALTER TABLE `tbl_dropdown_bentukbangunan`
  ADD PRIMARY KEY (`id_dropdown_bentukbangunan`);

--
-- Indexes for table `tbl_dropdown_bentukpinjaman`
--
ALTER TABLE `tbl_dropdown_bentukpinjaman`
  ADD PRIMARY KEY (`id_dropdown_bentukpinjaman`);

--
-- Indexes for table `tbl_dropdown_bidangusaha`
--
ALTER TABLE `tbl_dropdown_bidangusaha`
  ADD PRIMARY KEY (`id_dropdown_bidangusaha`);

--
-- Indexes for table `tbl_dropdown_daerahoperasi`
--
ALTER TABLE `tbl_dropdown_daerahoperasi`
  ADD PRIMARY KEY (`id_dropdown_daerahoperasi`);

--
-- Indexes for table `tbl_dropdown_frekuensipickup`
--
ALTER TABLE `tbl_dropdown_frekuensipickup`
  ADD PRIMARY KEY (`id_dropdown_frekuensipickup`);

--
-- Indexes for table `tbl_dropdown_hubungan`
--
ALTER TABLE `tbl_dropdown_hubungan`
  ADD PRIMARY KEY (`id_dropdown_hubungan`);

--
-- Indexes for table `tbl_dropdown_hubungandenganpemohon`
--
ALTER TABLE `tbl_dropdown_hubungandenganpemohon`
  ADD PRIMARY KEY (`id_dropdown_hubungandenganpemohon`);

--
-- Indexes for table `tbl_dropdown_hubunganpemeganghak`
--
ALTER TABLE `tbl_dropdown_hubunganpemeganghak`
  ADD PRIMARY KEY (`id_dropdown_hubunganpemeganghak`);

--
-- Indexes for table `tbl_dropdown_jeniskendaraan`
--
ALTER TABLE `tbl_dropdown_jeniskendaraan`
  ADD PRIMARY KEY (`id_dropdown_jeniskendaraan`);

--
-- Indexes for table `tbl_dropdown_jenistempatusaha`
--
ALTER TABLE `tbl_dropdown_jenistempatusaha`
  ADD PRIMARY KEY (`id_dropdown_jenistempatusaha`);

--
-- Indexes for table `tbl_dropdown_jenisusaha`
--
ALTER TABLE `tbl_dropdown_jenisusaha`
  ADD PRIMARY KEY (`id_dropdown_jenisusaha`);

--
-- Indexes for table `tbl_dropdown_konstruksibangunan`
--
ALTER TABLE `tbl_dropdown_konstruksibangunan`
  ADD PRIMARY KEY (`id_dropdown_konstruksibangunan`);

--
-- Indexes for table `tbl_dropdown_lantaibangunan`
--
ALTER TABLE `tbl_dropdown_lantaibangunan`
  ADD PRIMARY KEY (`id_dropdown_lantaibangunan`);

--
-- Indexes for table `tbl_dropdown_lokasijaminan`
--
ALTER TABLE `tbl_dropdown_lokasijaminan`
  ADD PRIMARY KEY (`id_dropdown_lokasijaminan`);

--
-- Indexes for table `tbl_dropdown_lokasiusaha`
--
ALTER TABLE `tbl_dropdown_lokasiusaha`
  ADD PRIMARY KEY (`id_dropdown_lokasiusaha`);

--
-- Indexes for table `tbl_dropdown_pekerjaan`
--
ALTER TABLE `tbl_dropdown_pekerjaan`
  ADD PRIMARY KEY (`id_dropdown_pekerjaan`);

--
-- Indexes for table `tbl_dropdown_pendidikan`
--
ALTER TABLE `tbl_dropdown_pendidikan`
  ADD PRIMARY KEY (`id_dropdown_pendidikan`);

--
-- Indexes for table `tbl_dropdown_peruntukantanah`
--
ALTER TABLE `tbl_dropdown_peruntukantanah`
  ADD PRIMARY KEY (`id_dropdown_peruntukantanah`);

--
-- Indexes for table `tbl_dropdown_prnggunaanjaminan`
--
ALTER TABLE `tbl_dropdown_prnggunaanjaminan`
  ADD PRIMARY KEY (`id_dropdown_penggunaanjaminan`);

--
-- Indexes for table `tbl_dropdown_produk`
--
ALTER TABLE `tbl_dropdown_produk`
  ADD PRIMARY KEY (`id_dropdown_produk`);

--
-- Indexes for table `tbl_dropdown_statuspenggarap`
--
ALTER TABLE `tbl_dropdown_statuspenggarap`
  ADD PRIMARY KEY (`id_dropdown_statuspenggarap`);

--
-- Indexes for table `tbl_dropdown_statustanah`
--
ALTER TABLE `tbl_dropdown_statustanah`
  ADD PRIMARY KEY (`id_dropdown_statustanah`);

--
-- Indexes for table `tbl_dropdown_statustempatusaha`
--
ALTER TABLE `tbl_dropdown_statustempatusaha`
  ADD PRIMARY KEY (`id_dropdown_statustempatusaha`);

--
-- Indexes for table `tbl_dropdown_tempattinggal`
--
ALTER TABLE `tbl_dropdown_tempattinggal`
  ADD PRIMARY KEY (`id_dropdown_tempattinggal`);

--
-- Indexes for table `tbl_dropdown_tujuanpinjaman`
--
ALTER TABLE `tbl_dropdown_tujuanpinjaman`
  ADD PRIMARY KEY (`id_dropdown_tujuanpinjaman`);

--
-- Indexes for table `tb_gaji`
--
ALTER TABLE `tb_gaji`
  ADD PRIMARY KEY (`id_gaji`);

--
-- Indexes for table `tb_grade`
--
ALTER TABLE `tb_grade`
  ADD PRIMARY KEY (`id_grade`);

--
-- Indexes for table `tb_kat_cuti`
--
ALTER TABLE `tb_kat_cuti`
  ADD PRIMARY KEY (`id_kat_cuti`);

--
-- Indexes for table `tb_kat_golongan`
--
ALTER TABLE `tb_kat_golongan`
  ADD PRIMARY KEY (`id_kat_golongan`);

--
-- Indexes for table `tb_kat_jabatan`
--
ALTER TABLE `tb_kat_jabatan`
  ADD PRIMARY KEY (`id_kat_jabatan`);

--
-- Indexes for table `tb_kat_peringatan`
--
ALTER TABLE `tb_kat_peringatan`
  ADD PRIMARY KEY (`id_kat_peringatan`);

--
-- Indexes for table `tb_pendidikan`
--
ALTER TABLE `tb_pendidikan`
  ADD PRIMARY KEY (`id_pendidikan`);

--
-- Indexes for table `tb_promosi`
--
ALTER TABLE `tb_promosi`
  ADD PRIMARY KEY (`id_promosi`);

--
-- Indexes for table `tb_resign`
--
ALTER TABLE `tb_resign`
  ADD PRIMARY KEY (`id_resign`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dat_pegawai`
--
ALTER TABLE `dat_pegawai`
  MODIFY `nip` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1531032021003;

--
-- AUTO_INCREMENT for table `tbl_dropdown_atapbangunan`
--
ALTER TABLE `tbl_dropdown_atapbangunan`
  MODIFY `id_dropdown_atapbangunan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_dropdown_bank`
--
ALTER TABLE `tbl_dropdown_bank`
  MODIFY `id_dropdown_bank` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_dropdown_bentukbangunan`
--
ALTER TABLE `tbl_dropdown_bentukbangunan`
  MODIFY `id_dropdown_bentukbangunan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_dropdown_bidangusaha`
--
ALTER TABLE `tbl_dropdown_bidangusaha`
  MODIFY `id_dropdown_bidangusaha` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_dropdown_daerahoperasi`
--
ALTER TABLE `tbl_dropdown_daerahoperasi`
  MODIFY `id_dropdown_daerahoperasi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_dropdown_frekuensipickup`
--
ALTER TABLE `tbl_dropdown_frekuensipickup`
  MODIFY `id_dropdown_frekuensipickup` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_dropdown_hubungandenganpemohon`
--
ALTER TABLE `tbl_dropdown_hubungandenganpemohon`
  MODIFY `id_dropdown_hubungandenganpemohon` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_dropdown_hubunganpemeganghak`
--
ALTER TABLE `tbl_dropdown_hubunganpemeganghak`
  MODIFY `id_dropdown_hubunganpemeganghak` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_dropdown_jeniskendaraan`
--
ALTER TABLE `tbl_dropdown_jeniskendaraan`
  MODIFY `id_dropdown_jeniskendaraan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_dropdown_jenisusaha`
--
ALTER TABLE `tbl_dropdown_jenisusaha`
  MODIFY `id_dropdown_jenisusaha` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_dropdown_lantaibangunan`
--
ALTER TABLE `tbl_dropdown_lantaibangunan`
  MODIFY `id_dropdown_lantaibangunan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_dropdown_lokasijaminan`
--
ALTER TABLE `tbl_dropdown_lokasijaminan`
  MODIFY `id_dropdown_lokasijaminan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_dropdown_pekerjaan`
--
ALTER TABLE `tbl_dropdown_pekerjaan`
  MODIFY `id_dropdown_pekerjaan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_dropdown_pendidikan`
--
ALTER TABLE `tbl_dropdown_pendidikan`
  MODIFY `id_dropdown_pendidikan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_dropdown_prnggunaanjaminan`
--
ALTER TABLE `tbl_dropdown_prnggunaanjaminan`
  MODIFY `id_dropdown_penggunaanjaminan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_dropdown_produk`
--
ALTER TABLE `tbl_dropdown_produk`
  MODIFY `id_dropdown_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_dropdown_statuspenggarap`
--
ALTER TABLE `tbl_dropdown_statuspenggarap`
  MODIFY `id_dropdown_statuspenggarap` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_dropdown_statustanah`
--
ALTER TABLE `tbl_dropdown_statustanah`
  MODIFY `id_dropdown_statustanah` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_gaji`
--
ALTER TABLE `tb_gaji`
  MODIFY `id_gaji` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tb_grade`
--
ALTER TABLE `tb_grade`
  MODIFY `id_grade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_kat_cuti`
--
ALTER TABLE `tb_kat_cuti`
  MODIFY `id_kat_cuti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_kat_golongan`
--
ALTER TABLE `tb_kat_golongan`
  MODIFY `id_kat_golongan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_kat_jabatan`
--
ALTER TABLE `tb_kat_jabatan`
  MODIFY `id_kat_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_kat_peringatan`
--
ALTER TABLE `tb_kat_peringatan`
  MODIFY `id_kat_peringatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_pendidikan`
--
ALTER TABLE `tb_pendidikan`
  MODIFY `id_pendidikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_promosi`
--
ALTER TABLE `tb_promosi`
  MODIFY `id_promosi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_resign`
--
ALTER TABLE `tb_resign`
  MODIFY `id_resign` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
