-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2021 at 07:36 AM
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
(2, 1, 4, 6, 0, 1509042021001, 'Arief Rahman Hakim', 'Semarang', '2021-04-04', 'Laki-laki', '3232937142', '2312314324', 'Jl ahmad dahlan', 'Semarang barat', 'tawang mas', 12, 6, 'gedi', 'Islam', 'Belum', 'Warga Negara Indonesia', '08763648235', 'ariefhakim@gmail.com', 'arief', '$2y$10$1PgD7yhWQ7NkJXJPn.4CvOrtMASSC49ar4ikrQmiVgMnXITZEemQq', 3, 'default.jpg', 1617950117, 2147483647, 'Ariefrahman', 'BCA', 1),
(6, 1, 3, 1, 0, 1509042021002, 'Sinta', 'Semarang', '2021-03-19', 'Perempuan', '474324534678', '232425425', 'Jl ahmad', 'Semarang utara', 'jroro', 1, 6, 'semilir', 'Islam', 'Belum', 'Warga Negara Indonesia', '0876364823', 'sinta@gmail.com', 'sinta', '$2y$10$U1Y4PjWbab.wLge0Ba6KYurWazU8qM4vVJfSJ7MzAlQkzngjq5pNi', 3, 'default.jpg', 1617956599, 56464645, 'Sinta', 'BCA', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_book`
--

CREATE TABLE `tbl_book` (
  `id_book` int(11) NOT NULL,
  `judul_book` text NOT NULL,
  `keterangan_book` text NOT NULL,
  `file_book` varchar(50) NOT NULL,
  `created_at_book` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_buku_tamu`
--

CREATE TABLE `tbl_buku_tamu` (
  `id_tamu` int(11) NOT NULL,
  `nama_tamu` varchar(50) NOT NULL,
  `tujuan_tamu` varchar(50) NOT NULL,
  `start_tamu` datetime NOT NULL,
  `end_tamu` datetime NOT NULL,
  `lama_tamu` datetime NOT NULL,
  `keterangan_tamu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Table structure for table `tbl_dropdown_statussuratmasuk`
--

CREATE TABLE `tbl_dropdown_statussuratmasuk` (
  `id_dropdown_statussuratmasuk` int(11) NOT NULL,
  `nama_dropdown_statussuratmasuk` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_dropdown_statussuratmasuk`
--

INSERT INTO `tbl_dropdown_statussuratmasuk` (`id_dropdown_statussuratmasuk`, `nama_dropdown_statussuratmasuk`) VALUES
(1, 'Rahasia Sekali'),
(3, 'Bebas');

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
-- Table structure for table `tbl_kat_book`
--

CREATE TABLE `tbl_kat_book` (
  `id_kat_book` int(11) NOT NULL,
  `nama_kat_book` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kegiatan_khazanah`
--

CREATE TABLE `tbl_kegiatan_khazanah` (
  `id_keg_khazanah` int(11) NOT NULL,
  `jenis_keg_khazanah` varchar(50) NOT NULL,
  `idbuku_keg_khazanah` varchar(50) NOT NULL,
  `nobuku_keg_khazanah` varchar(20) NOT NULL,
  `stok_keg_khazanah` int(5) NOT NULL,
  `tujuan_keg_khazanah` varchar(11) NOT NULL,
  `create_at_keg_khazanah` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kegiatan_khazanah`
--

INSERT INTO `tbl_kegiatan_khazanah` (`id_keg_khazanah`, `jenis_keg_khazanah`, `idbuku_keg_khazanah`, `nobuku_keg_khazanah`, `stok_keg_khazanah`, `tujuan_keg_khazanah`, `create_at_keg_khazanah`) VALUES
(2, 'jenis', 'idbuku', 'nomor', 5, '1,2,3,4,5', '2021-04-22 14:48:38'),
(3, 'A', 'T1', '200 - 300', 200, '4,5', '2021-04-22 15:08:02'),
(4, 'jenis1', 'idbuku1', '1-10', 10, '3,4,5', '2021-04-26 12:55:40');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_khazanah`
--

CREATE TABLE `tbl_khazanah` (
  `id_khazanah` int(11) NOT NULL,
  `kegiatan_khazanah` varchar(50) NOT NULL,
  `tujuan_khazanah` varchar(50) NOT NULL,
  `filelokasi_khazanah` varchar(50) NOT NULL,
  `masuk_khazanah` datetime DEFAULT NULL,
  `keluar_khazanah` datetime DEFAULT NULL,
  `petugas_khazanah` varchar(50) NOT NULL,
  `pengawas_khazanah` varchar(50) NOT NULL,
  `keterangan_khazanah` text NOT NULL,
  `status_khazanah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_khazanah`
--

INSERT INTO `tbl_khazanah` (`id_khazanah`, `kegiatan_khazanah`, `tujuan_khazanah`, `filelokasi_khazanah`, `masuk_khazanah`, `keluar_khazanah`, `petugas_khazanah`, `pengawas_khazanah`, `keterangan_khazanah`, `status_khazanah`) VALUES
(1, '3', 'operasional', '05/XXI/2021', '2021-04-23 10:04:24', '2021-04-23 10:07:05', 'Bambang', 'Budi', '', 2),
(2, '3', 'operasional', '05/XXI/2021', '2021-04-23 14:02:50', '2021-04-23 14:13:53', 'Bambang2', 'Budi2', '', 2),
(3, '3', 'operasional', '05/XXI/2021', '2021-04-23 14:00:29', '2021-04-23 15:27:23', 'Bambang', 'Budi', '', 2),
(10, '2', 'audit', '05/XXI/2021', '2021-04-26 13:02:22', NULL, 'Bambang2', 'Budi2', '', 1),
(11, '2', 'ef', '05/XXI/2021', NULL, NULL, 'Bambang', 'Telemarketing', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_surat_keluar`
--

CREATE TABLE `tbl_surat_keluar` (
  `id_surat_keluar` int(11) NOT NULL,
  `nomor_surat_keluar` varchar(50) NOT NULL,
  `kepada_surat_keluar` varchar(50) NOT NULL,
  `pengirim_surat_keluar` varchar(50) NOT NULL,
  `file_surat_keluar` varchar(50) NOT NULL,
  `status_surat_keluar` int(3) NOT NULL,
  `keterangan_surat_keluar` varchar(50) NOT NULL,
  `indexs_berkas_surat` varchar(50) NOT NULL,
  `perihal_surat_keluar` varchar(50) NOT NULL,
  `lampiran_surat_keluar` varchar(50) NOT NULL,
  `tembusan_surat_keluar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_surat_keluar`
--

INSERT INTO `tbl_surat_keluar` (`id_surat_keluar`, `nomor_surat_keluar`, `kepada_surat_keluar`, `pengirim_surat_keluar`, `file_surat_keluar`, `status_surat_keluar`, `keterangan_surat_keluar`, `indexs_berkas_surat`, `perihal_surat_keluar`, `lampiran_surat_keluar`, `tembusan_surat_keluar`) VALUES
(7, '01', 'anda', 'saya', 'File__1618287410', 3, 'oke', '012ww22', 'Cek', '1 lampiran', 'asd2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_surat_masuk`
--

CREATE TABLE `tbl_surat_masuk` (
  `id_surat_masuk` int(11) NOT NULL,
  `pengirim_surat_masuk` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diterima_surat_masuk` datetime NOT NULL DEFAULT current_timestamp(),
  `kepada_surat_masuk` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deposisi_surat_masuk` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_surat_masuk` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_surat_masuk` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ringkasan_surat_masuk` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_surat_masuk` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tembusan_surat_masuk` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_surat_masuk`
--

INSERT INTO `tbl_surat_masuk` (`id_surat_masuk`, `pengirim_surat_masuk`, `diterima_surat_masuk`, `kepada_surat_masuk`, `deposisi_surat_masuk`, `file_surat_masuk`, `status_surat_masuk`, `ringkasan_surat_masuk`, `nomor_surat_masuk`, `tembusan_surat_masuk`) VALUES
(7, 'sdawd', '2021-04-10 12:08:26', 'ajdiowjad', 'dwaefiej', 'File__1618296869', '3', '<p>ajdiowjad</p>', '55551', '1,2,3'),
(8, 'kojio22', '2021-04-12 10:14:01', 'aaaaa', 'asd', 'File__1618296885', '1', '<p>aaaaa</p>', '636612', '1,2,6'),
(9, 'ewq', '2021-04-13 15:01:22', 'Full stack development', 'asdwad', 'File__1618300882', '1', '<p>awdasdw</p>', '2010', '1,2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tujuan_khazanah`
--

CREATE TABLE `tbl_tujuan_khazanah` (
  `id_tujuan_khazanah` int(11) NOT NULL,
  `nama_tujuan_khazanah` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_tujuan_khazanah`
--

INSERT INTO `tbl_tujuan_khazanah` (`id_tujuan_khazanah`, `nama_tujuan_khazanah`) VALUES
(1, 'Operasional Harian'),
(2, 'ef'),
(3, 'cd'),
(4, 'ab'),
(5, 'Audit');

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_cuti`
--

CREATE TABLE `tb_detail_cuti` (
  `id_detail_cuti` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kat_cuti` int(11) NOT NULL,
  `nip` bigint(50) NOT NULL,
  `status` varchar(100) NOT NULL,
  `no_hp_darurat` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `total` int(11) NOT NULL,
  `jumlah_ambil` int(11) NOT NULL,
  `sisa_cuti` int(11) NOT NULL,
  `tgl` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_detail_cuti`
--

INSERT INTO `tb_detail_cuti` (`id_detail_cuti`, `id_user`, `id_kat_cuti`, `nip`, `status`, `no_hp_darurat`, `alamat`, `keterangan`, `tgl_mulai`, `tgl_selesai`, `total`, `jumlah_ambil`, `sisa_cuti`, `tgl`) VALUES
(14, 18, 1, 1509042021002, 'pending', '09989797923', 'Jl ahmad dahlan', 'OK', '2021-04-21', '2021-04-26', 12, 3, 9, '2021-04-21 06:39:45');

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
  `tgl` date DEFAULT NULL,
  `makan` int(11) NOT NULL,
  `pulsa` int(11) NOT NULL,
  `transport` int(11) NOT NULL,
  `kesehatan_k` int(11) NOT NULL,
  `tot_pot_bpjs` int(11) NOT NULL,
  `tunj_lainnya` int(11) NOT NULL,
  `jml_potongan` int(11) NOT NULL,
  `gaji_kotor` int(11) NOT NULL,
  `gaji_net` int(11) NOT NULL,
  `status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_gaji`
--

INSERT INTO `tb_gaji` (`id_gaji`, `nip`, `id_pendidikan`, `id_kat_jabatan`, `id_kat_golongan`, `id_grade`, `tgl`, `makan`, `pulsa`, `transport`, `kesehatan_k`, `tot_pot_bpjs`, `tunj_lainnya`, `jml_potongan`, `gaji_kotor`, `gaji_net`, `status`) VALUES
(21, '1509042021001', 4, 2, 6, 1, '2021-04-10', 30000, 20000, 15000, 110000, 5, 15000, 110000, 2770000, 2660000, 'bayar'),
(23, '1509042021001', 4, 2, 6, 1, '2021-05-12', 30000, 20000, 15000, 110000, 5, 20000, 110000, 2775000, 2665000, 'belum bayar'),
(24, '1509042021001', 4, 2, 6, 1, '2021-03-12', 30000, 40000, 15000, 220000, 10, 15000, 220000, 2790000, 2570000, 'belum bayar'),
(25, '1509042021002', 3, 6, 1, 1, '2021-03-12', 30000, 20000, 15000, 75000, 5, 40000, 75000, 1925000, 1850000, 'belum bayar'),
(26, '1509042021002', 3, 6, 1, 1, '2021-04-12', 80000, 60000, 50000, 75000, 5, 20000, 75000, 2030000, 1955000, 'bayar');

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
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kat_cuti`
--

INSERT INTO `tb_kat_cuti` (`id_kat_cuti`, `nama_cuti`, `jumlah`) VALUES
(1, 'Cuti Tahunan', 12);

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
(17, 'arief rahman hakim', 'admin', '$2y$10$H4MBENBFSMwSAXpOpKzpfuVm1ifak2UNBZdxm/7w3G65a/fg9rC3e', 1, 'default.jpg', 1, 1617778539),
(18, 'asasas', 'wawan', '$2y$10$J5/n91zojOH1DCA9CZBeAO4NSrrYS1F91Hx0Zt54Bdp.Qib9RcqQq', 10, 'default.jpg', 1, 1618881763);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dat_pegawai`
--
ALTER TABLE `dat_pegawai`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `tbl_book`
--
ALTER TABLE `tbl_book`
  ADD PRIMARY KEY (`id_book`);

--
-- Indexes for table `tbl_buku_tamu`
--
ALTER TABLE `tbl_buku_tamu`
  ADD PRIMARY KEY (`id_tamu`);

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
-- Indexes for table `tbl_dropdown_statussuratmasuk`
--
ALTER TABLE `tbl_dropdown_statussuratmasuk`
  ADD PRIMARY KEY (`id_dropdown_statussuratmasuk`);

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
-- Indexes for table `tbl_kat_book`
--
ALTER TABLE `tbl_kat_book`
  ADD PRIMARY KEY (`id_kat_book`);

--
-- Indexes for table `tbl_kegiatan_khazanah`
--
ALTER TABLE `tbl_kegiatan_khazanah`
  ADD PRIMARY KEY (`id_keg_khazanah`);

--
-- Indexes for table `tbl_khazanah`
--
ALTER TABLE `tbl_khazanah`
  ADD PRIMARY KEY (`id_khazanah`);

--
-- Indexes for table `tbl_surat_keluar`
--
ALTER TABLE `tbl_surat_keluar`
  ADD PRIMARY KEY (`id_surat_keluar`);

--
-- Indexes for table `tbl_surat_masuk`
--
ALTER TABLE `tbl_surat_masuk`
  ADD PRIMARY KEY (`id_surat_masuk`);

--
-- Indexes for table `tbl_tujuan_khazanah`
--
ALTER TABLE `tbl_tujuan_khazanah`
  ADD PRIMARY KEY (`id_tujuan_khazanah`);

--
-- Indexes for table `tb_detail_cuti`
--
ALTER TABLE `tb_detail_cuti`
  ADD PRIMARY KEY (`id_detail_cuti`);

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
-- AUTO_INCREMENT for table `tbl_book`
--
ALTER TABLE `tbl_book`
  MODIFY `id_book` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_buku_tamu`
--
ALTER TABLE `tbl_buku_tamu`
  MODIFY `id_tamu` int(11) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `tbl_dropdown_statussuratmasuk`
--
ALTER TABLE `tbl_dropdown_statussuratmasuk`
  MODIFY `id_dropdown_statussuratmasuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_dropdown_statustanah`
--
ALTER TABLE `tbl_dropdown_statustanah`
  MODIFY `id_dropdown_statustanah` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_kat_book`
--
ALTER TABLE `tbl_kat_book`
  MODIFY `id_kat_book` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_kegiatan_khazanah`
--
ALTER TABLE `tbl_kegiatan_khazanah`
  MODIFY `id_keg_khazanah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_khazanah`
--
ALTER TABLE `tbl_khazanah`
  MODIFY `id_khazanah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_surat_keluar`
--
ALTER TABLE `tbl_surat_keluar`
  MODIFY `id_surat_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_surat_masuk`
--
ALTER TABLE `tbl_surat_masuk`
  MODIFY `id_surat_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_tujuan_khazanah`
--
ALTER TABLE `tbl_tujuan_khazanah`
  MODIFY `id_tujuan_khazanah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_detail_cuti`
--
ALTER TABLE `tb_detail_cuti`
  MODIFY `id_detail_cuti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_gaji`
--
ALTER TABLE `tb_gaji`
  MODIFY `id_gaji` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

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
  MODIFY `id_resign` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
