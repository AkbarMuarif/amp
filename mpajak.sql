-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Jun 2021 pada 20.18
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mpajak`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `prs_hiburan`
--

CREATE TABLE `prs_hiburan` (
  `id_hbr` int(11) NOT NULL,
  `no_pws` varchar(30) NOT NULL,
  `npwpd` varchar(20) NOT NULL,
  `tipe_id` int(11) NOT NULL,
  `periode` date NOT NULL,
  `omset_sptpd` int(11) NOT NULL,
  `omset_periksa` int(11) NOT NULL,
  `omset_kurang` int(11) NOT NULL,
  `pajak_kurang` int(11) NOT NULL,
  `denda` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `dibuat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `prs_hiburan`
--

INSERT INTO `prs_hiburan` (`id_hbr`, `no_pws`, `npwpd`, `tipe_id`, `periode`, `omset_sptpd`, `omset_periksa`, `omset_kurang`, `pajak_kurang`, `denda`, `total`, `dibuat`) VALUES
(49, 'hbr-1908200004', '2012.01.02.0048', 5, '2019-01-01', 28000000, 28000000, 0, 0, 0, 0, '2020-08-13'),
(50, 'hbr-1908200004', '2012.01.02.0048', 5, '2019-02-01', 29500000, 29500000, 0, 0, 0, 0, '2020-08-13'),
(51, 'hbr-1908200004', '2012.01.02.0048', 5, '2019-03-01', 28350000, 28350000, 0, 0, 0, 0, '2020-08-13'),
(52, 'hbr-1908200004', '2012.01.02.0048', 5, '2019-04-01', 29200000, 29200000, 0, 0, 0, 0, '2020-08-13'),
(53, 'hbr-1908200004', '2012.01.02.0048', 5, '2019-05-01', 29950000, 29950000, 0, 0, 0, 0, '2020-08-13'),
(54, 'hbr-1908200004', '2012.01.02.0048', 5, '2019-06-01', 29085000, 29085000, 0, 0, 0, 0, '2020-08-13'),
(55, 'hbr-2008120001', '2017.01.02.0102', 9, '2019-01-01', 29500000, 30250000, -750000, -75000, -10500, -85500, '2020-08-13'),
(56, 'hbr-2008120001', '2017.01.02.0102', 9, '2020-02-01', 30850000, 30865000, -15000, -1500, -180, -1680, '2020-08-13'),
(57, 'hbr-2008120001', '2017.01.02.0102', 9, '2020-03-01', 30668000, 30805000, -137000, -13700, -1370, -15070, '2020-08-13'),
(58, 'hbr-2008120001', '2017.01.02.0102', 9, '2020-04-01', 30968000, 30968000, 0, 0, 0, 0, '2020-08-13'),
(59, 'hbr-2008120001', '2017.01.02.0102', 9, '2020-05-01', 29950000, 30140000, -190000, -19000, -1140, -20140, '2020-08-13'),
(60, 'hbr-2008120001', '2017.01.02.0102', 9, '2020-06-01', 30150000, 30850000, -700000, -70000, -2800, -72800, '2020-08-13'),
(61, 'hbr-2008110002', '2015.01.03.0008', 4, '2020-01-01', 45005000, 46205000, -1200000, -480000, -67200, -547200, '2020-08-13'),
(62, 'hbr-2008110002', '2015.01.03.0008', 4, '2020-02-01', 45820000, 46220000, -400000, -160000, -19200, -179200, '2020-08-13'),
(63, 'hbr-2008110002', '2015.01.03.0008', 4, '2020-03-01', 45105000, 45305000, -200000, -80000, -8000, -88000, '2020-08-13'),
(64, 'hbr-2008110002', '2015.01.03.0008', 4, '2020-04-01', 44700000, 44790000, -90000, -36000, -2880, -38880, '2020-08-13'),
(65, 'hbr-2008110002', '2015.01.03.0008', 4, '2020-05-01', 45620000, 45920000, -300000, -120000, -7200, -127200, '2020-08-13'),
(66, 'hbr-2008110002', '2015.01.03.0008', 4, '2020-06-01', 46100000, 46420000, -320000, -128000, -5120, -133120, '2020-08-13'),
(67, 'hbr-2002100002', '2017.01.02.0102', 9, '2019-07-01', 29055000, 29055000, 0, 0, 0, 0, '2020-08-13'),
(68, 'hbr-2002100002', '2017.01.02.0102', 9, '2019-08-01', 28850000, 28850000, 0, 0, 0, 0, '2020-08-13'),
(69, 'hbr-2002100002', '2017.01.02.0102', 9, '2019-09-01', 29200000, 29200000, 0, 0, 0, 0, '2020-08-13'),
(70, 'hbr-2002100002', '2017.01.02.0102', 9, '2019-10-01', 29350000, 29350000, 0, 0, 0, 0, '2020-08-13'),
(71, 'hbr-2002100002', '2017.01.02.0102', 9, '2019-11-01', 29950000, 29950000, 0, 0, 0, 0, '2020-08-13'),
(72, 'hbr-2002100002', '2017.01.02.0102', 9, '2019-12-01', 28905000, 28905000, 0, 0, 0, 0, '2020-08-13'),
(73, 'hbr-2002030003', '2010.01.02.0052', 4, '2019-07-01', 51500000, 51500000, 0, 0, 0, 0, '2020-08-13'),
(74, 'hbr-2002030003', '2010.01.02.0052', 4, '2019-08-01', 52450000, 52450000, 0, 0, 0, 0, '2020-08-13'),
(75, 'hbr-2002030003', '2010.01.02.0052', 4, '2019-09-01', 52680000, 52680000, 0, 0, 0, 0, '2020-08-13'),
(76, 'hbr-2002030003', '2010.01.02.0052', 4, '2019-10-01', 51045000, 51045000, 0, 0, 0, 0, '2020-08-13'),
(77, 'hbr-2002030003', '2010.01.02.0052', 4, '2019-11-01', 52820000, 52820000, 0, 0, 0, 0, '2020-08-13'),
(78, 'hbr-2002030003', '2010.01.02.0052', 4, '2019-12-01', 52660000, 52660000, 0, 0, 0, 0, '2020-08-13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `prs_hotel`
--

CREATE TABLE `prs_hotel` (
  `id_htl` int(11) NOT NULL,
  `no_pws` varchar(30) NOT NULL,
  `npwpd` varchar(20) NOT NULL,
  `tipe_id` int(11) NOT NULL,
  `periode` date NOT NULL,
  `omset_sptpd` int(11) NOT NULL,
  `omset_periksa` int(11) NOT NULL,
  `omset_kurang` int(11) NOT NULL,
  `pajak_kurang` int(11) NOT NULL,
  `denda` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `dibuat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `prs_hotel`
--

INSERT INTO `prs_hotel` (`id_htl`, `no_pws`, `npwpd`, `tipe_id`, `periode`, `omset_sptpd`, `omset_periksa`, `omset_kurang`, `pajak_kurang`, `denda`, `total`, `dibuat`) VALUES
(22, 'htl-2002030001', '2013.01.02.0035', 2, '2019-07-01', 21400000, 21400000, 0, 0, 0, 0, '2020-08-12'),
(23, 'htl-2002030001', '2013.01.02.0035', 2, '2019-08-01', 21620000, 21620000, 0, 0, 0, 0, '2020-08-12'),
(24, 'htl-2002030001', '2013.01.02.0035', 2, '2019-09-01', 21950000, 21950000, 0, 0, 0, 0, '2020-08-12'),
(25, 'htl-2002030001', '2013.01.02.0035', 2, '2019-10-01', 21780000, 21780000, 0, 0, 0, 0, '2020-08-12'),
(26, 'htl-2002030001', '2013.01.02.0035', 2, '2019-11-01', 21700000, 21700000, 0, 0, 0, 0, '2020-08-12'),
(27, 'htl-2002030001', '2013.01.02.0035', 2, '2019-12-01', 21750000, 21750000, 0, 0, 0, 0, '2020-08-12'),
(28, 'htl-2002030002', '2012.01.02.0002', 2, '2019-07-01', 34900000, 34958000, -58000, -5800, -116, -5800, '2020-08-12'),
(29, 'htl-2002030002', '2012.01.02.0002', 2, '2019-08-01', 35255000, 35255000, 0, 0, 0, -116, '2020-08-12'),
(30, 'htl-2002030002', '2012.01.02.0002', 2, '2019-09-01', 36285000, 38285000, -2000000, -200000, -44000, -200000, '2020-08-12'),
(31, 'htl-2002030002', '2012.01.02.0002', 2, '2019-10-01', 35855000, 36565000, -710000, -71000, -14200, -115000, '2020-08-12'),
(32, 'htl-2002030002', '2012.01.02.0002', 2, '2019-11-01', 35908000, 37085500, -1177500, -117750, -21195, -131950, '2020-08-12'),
(33, 'htl-2002030002', '2012.01.02.0002', 2, '2019-12-01', 36055000, 37485500, -1430500, -143050, -22888, -164245, '2020-08-12'),
(34, 'htl-2008030001', '2013.01.02.0012', 2, '2020-01-01', 46550000, 46550000, 0, 0, 0, 0, '2020-08-12'),
(35, 'htl-2008030001', '2013.01.02.0012', 2, '2020-02-01', 47068000, 47068000, 0, 0, 0, 0, '2020-08-12'),
(36, 'htl-2008030001', '2013.01.02.0012', 2, '2020-03-01', 47082000, 47082000, 0, 0, 0, 0, '2020-08-12'),
(37, 'htl-2008030001', '2013.01.02.0012', 2, '2020-04-01', 48450000, 48450000, 0, 0, 0, 0, '2020-08-12'),
(38, 'htl-2008030001', '2013.01.02.0012', 2, '2020-05-01', 47980000, 47980000, 0, 0, 0, 0, '2020-08-12'),
(39, 'htl-2008030001', '2013.01.02.0012', 2, '2020-06-01', 49103000, 49103000, 0, 0, 0, 0, '2020-08-12'),
(40, 'htl-2008050001', '2013.05.16.0031', 2, '2020-01-01', 28103000, 28603000, -500000, -50000, -7000, -50000, '2020-08-12'),
(41, 'htl-2008050001', '2013.05.16.0031', 2, '2020-02-01', 28303000, 28328000, -25000, -2500, -300, -9500, '2020-08-12'),
(42, 'htl-2008050001', '2013.05.16.0031', 2, '2020-03-01', 27953000, 28000000, -47000, -4700, -470, -5170, '2020-08-12'),
(43, 'htl-2008050001', '2013.05.16.0031', 2, '2020-04-01', 27823000, 28800000, -977000, -97700, -7816, 153830, '2020-08-12'),
(44, 'htl-2008050001', '2013.05.16.0031', 2, '2020-05-01', 28103000, 28103000, 0, 0, 0, -7816, '2020-08-12'),
(45, 'htl-2008050001', '2013.05.16.0031', 2, '2020-06-01', 28356000, 28556000, -200000, -20000, -800, -20000, '2020-08-12'),
(46, 'htl-2008140001', '2012.01.02.0025', 2, '2020-01-01', 35200000, 35200000, 0, 0, 0, 0, '2020-08-12'),
(47, 'htl-2008140001', '2012.01.02.0025', 2, '2020-02-01', 35300000, 35300000, 0, 0, 0, 0, '2020-08-12'),
(48, 'htl-2008140001', '2012.01.02.0025', 2, '2020-03-01', 36200000, 36200000, 0, 0, 0, 0, '2020-08-12'),
(49, 'htl-2008140001', '2012.01.02.0025', 2, '2020-04-01', 38250000, 38250000, 0, 0, 0, 0, '2020-08-12'),
(50, 'htl-2008140001', '2012.01.02.0025', 2, '2020-05-01', 37085000, 37085000, 0, 0, 0, 0, '2020-08-12'),
(51, 'htl-2008140001', '2012.01.02.0025', 2, '2020-06-01', 38005000, 38005000, 0, 0, 0, 0, '2020-08-12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `prs_restoran`
--

CREATE TABLE `prs_restoran` (
  `id_rst` int(11) NOT NULL,
  `no_pws` varchar(30) NOT NULL,
  `npwpd` varchar(20) NOT NULL,
  `tipe_id` int(11) NOT NULL,
  `periode` date NOT NULL,
  `omset_sptpd` int(11) NOT NULL,
  `omset_periksa` int(11) NOT NULL,
  `omset_kurang` int(11) NOT NULL,
  `pajak_kurang` int(11) NOT NULL,
  `denda` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `dibuat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `prs_restoran`
--

INSERT INTO `prs_restoran` (`id_rst`, `no_pws`, `npwpd`, `tipe_id`, `periode`, `omset_sptpd`, `omset_periksa`, `omset_kurang`, `pajak_kurang`, `denda`, `total`, `dibuat`) VALUES
(1, 'rst-2008120002', '2012.01.02.0028', 1, '2020-01-01', 38900000, 38952000, -52000, -5200, -728, -5928, '2020-08-13'),
(2, 'rst-2008120002', '2012.01.02.0028', 1, '2020-02-01', 39620000, 39620000, 0, 0, 0, 0, '2020-08-13'),
(3, 'rst-2008120002', '2012.01.02.0028', 1, '2020-03-01', 39320000, 39720500, -400500, -40050, -4005, -44055, '2020-08-13'),
(4, 'rst-2008120002', '2012.01.02.0028', 1, '2020-04-01', 40001500, 40040500, -39000, -3900, -312, -4212, '2020-08-13'),
(5, 'rst-2008120002', '2012.01.02.0028', 1, '2020-05-01', 40300000, 40398000, -98000, -9800, -588, -10388, '2020-08-13'),
(6, 'rst-2008120002', '2012.01.02.0028', 1, '2020-06-01', 40620500, 40702000, -81500, -8150, -326, -8476, '2020-08-13'),
(7, 'rst-2002050001', '2012.01.02.0044', 1, '2019-07-01', 37200000, 37200000, 0, 0, 0, 0, '2020-08-13'),
(8, 'rst-2002050001', '2012.01.02.0044', 1, '2019-08-01', 37625000, 37625000, 0, 0, 0, 0, '2020-08-13'),
(9, 'rst-2002050001', '2012.01.02.0044', 1, '2019-09-01', 36850000, 36850000, 0, 0, 0, 0, '2020-08-13'),
(10, 'rst-2002050001', '2012.01.02.0044', 1, '2019-10-01', 37300000, 37300000, 0, 0, 0, 0, '2020-08-13'),
(11, 'rst-2002050001', '2012.01.02.0044', 1, '2019-11-01', 37820000, 37820000, 0, 0, 0, 0, '2020-08-13'),
(12, 'rst-2002050001', '2012.01.02.0044', 1, '2019-12-01', 37505000, 37505000, 0, 0, 0, 0, '2020-08-13'),
(13, 'rst-2008060001', '2014.01.03.0021', 1, '2019-07-01', 26500000, 26500000, 0, 0, 0, 0, '2020-08-13'),
(14, 'rst-2008060001', '2014.01.03.0021', 1, '2019-08-01', 26425000, 26425000, 0, 0, 0, 0, '2020-08-13'),
(15, 'rst-2008060001', '2014.01.03.0021', 1, '2019-09-01', 27500000, 27500000, 0, 0, 0, 0, '2020-08-13'),
(16, 'rst-2008060001', '2014.01.03.0021', 1, '2019-10-01', 26905000, 26905000, 0, 0, 0, 0, '2020-08-13'),
(17, 'rst-2008060001', '2014.01.03.0021', 1, '2019-11-01', 27250000, 27250000, 0, 0, 0, 0, '2020-08-13'),
(18, 'rst-2008060001', '2014.01.03.0021', 1, '2019-12-01', 27650000, 27650000, 0, 0, 0, 0, '2020-08-13'),
(19, 'rst-2008120001', '2010.01.02.0014', 1, '2020-01-01', 27250000, 27459000, -209000, -20900, -2926, -20900, '2020-08-13'),
(20, 'rst-2008120001', '2010.01.02.0014', 1, '2020-02-01', 27500000, 27523000, -23000, -2300, -276, -5226, '2020-08-13'),
(21, 'rst-2008120001', '2010.01.02.0014', 1, '2020-03-01', 27605000, 27805000, -200000, -20000, -2000, -20276, '2020-08-13'),
(22, 'rst-2008120001', '2010.01.02.0014', 1, '2020-04-01', 27950000, 28050000, -100000, -10000, -800, -12000, '2020-08-13'),
(23, 'rst-2008120001', '2010.01.02.0014', 1, '2020-05-01', 28100500, 28100500, 0, 0, 0, -800, '2020-08-13'),
(24, 'rst-2008120001', '2010.01.02.0014', 1, '2020-06-01', 27540000, 28340500, -800500, -80050, -3202, -80050, '2020-08-13'),
(25, 'rst-2008100006', '2017.01.03.0008', 1, '2020-01-01', 32300000, 32300000, 0, 0, 0, 0, '2020-08-13'),
(26, 'rst-2008100006', '2017.01.03.0008', 1, '2020-02-01', 32730500, 32730500, 0, 0, 0, 0, '2020-08-13'),
(27, 'rst-2008100006', '2017.01.03.0008', 1, '2020-03-01', 33140000, 33140000, 0, 0, 0, 0, '2020-08-13'),
(28, 'rst-2008100006', '2017.01.03.0008', 1, '2020-04-01', 33520500, 33520500, 0, 0, 0, 0, '2020-08-13'),
(29, 'rst-2008100006', '2017.01.03.0008', 1, '2020-05-01', 32830000, 32830000, 0, 0, 0, 0, '2020-08-13'),
(30, 'rst-2008100006', '2017.01.03.0008', 1, '2020-06-01', 33020000, 33020000, 0, 0, 0, 0, '2020-08-13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pws_hiburan`
--

CREATE TABLE `pws_hiburan` (
  `no_pws` varchar(30) NOT NULL,
  `tgl_pws` date NOT NULL,
  `npwpd` varchar(20) NOT NULL,
  `tipe_id` int(11) NOT NULL,
  `izin` varchar(10) NOT NULL,
  `tarif` varchar(10) NOT NULL,
  `sptpd` varchar(30) DEFAULT NULL,
  `rekap_terima` varchar(10) NOT NULL,
  `rekap_bill` varchar(10) NOT NULL,
  `sspd` varchar(30) DEFAULT NULL,
  `bill` varchar(10) NOT NULL,
  `cash` varchar(5) NOT NULL,
  `edc` varchar(5) NOT NULL,
  `emoney` varchar(5) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `ket` varchar(300) DEFAULT NULL,
  `jumlah` int(11) NOT NULL,
  `verif` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pws_hiburan`
--

INSERT INTO `pws_hiburan` (`no_pws`, `tgl_pws`, `npwpd`, `tipe_id`, `izin`, `tarif`, `sptpd`, `rekap_terima`, `rekap_bill`, `sspd`, `bill`, `cash`, `edc`, `emoney`, `tgl_bayar`, `ket`, `jumlah`, `verif`) VALUES
('hbr-1908200004', '2019-08-20', '2012.01.02.0048', 5, 'ada', 'benar', 'pws-200811-58890ff242.pdf', 'ada', 'tidak', 'pws-200811-58890ff2421.pdf', 'ada', 'ya', 'ya', 'ya', '2019-07-16', '', 6, 'Y'),
('hbr-2002030002', '2020-02-03', '2012.01.02.0048', 5, 'ada', 'benar', 'pws-200811-8d54dedd62.pdf', 'ada', 'ada', 'pws-200811-8d54dedd621.pdf', 'ada', 'ya', 'ya', 'ya', '2020-07-16', '', 0, 'Y'),
('hbr-2002030003', '2020-02-03', '2010.01.02.0052', 4, 'ada', 'benar', 'pws-200811-79ff7cdf6b.pdf', 'ada', 'ada', 'pws-200811-79ff7cdf6b1.pdf', 'ada', 'ya', 'ya', 'ya', '2020-01-08', '', 6, 'Y'),
('hbr-2002100002', '2020-02-10', '2017.01.02.0102', 9, 'ada', 'benar', 'pws-200811-9cc1a21ad0.pdf', 'tidak', 'ada', 'pws-200811-9cc1a21ad01.pdf', 'ada', 'ya', 'ya', 'ya', '2020-01-20', '', 6, 'Y'),
('hbr-2008110001', '2020-08-11', '2012.01.02.0048', 5, 'ada', 'benar', 'pws-200811-20a277fea3.pdf', 'ada', 'ada', NULL, 'ada', 'ya', 'ya', 'ya', '2020-07-20', '', 0, 'T'),
('hbr-2008110002', '2020-08-11', '2015.01.03.0008', 4, 'ada', 'benar', 'pws-200811-46846626f1.pdf', 'ada', 'ada', 'pws-200811-46846626f11.pdf', 'ada', 'ya', 'ya', 'ya', '2020-07-02', '', 6, 'Y'),
('hbr-2008120001', '2020-08-12', '2017.01.02.0102', 9, 'ada', 'benar', 'pws-200811-dd99e3abb9.pdf', 'ada', 'ada', 'pws-200811-dd99e3abb91.pdf', 'ada', 'ya', 'ya', 'tidak', '2020-07-17', '', 6, 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pws_hotel`
--

CREATE TABLE `pws_hotel` (
  `no_pws` varchar(30) NOT NULL,
  `tgl_pws` date NOT NULL,
  `npwpd` varchar(20) NOT NULL,
  `tipe_id` int(11) NOT NULL,
  `izin` varchar(10) NOT NULL,
  `tarif` varchar(10) NOT NULL,
  `sptpd` varchar(30) DEFAULT NULL,
  `rekap_terima` varchar(10) NOT NULL,
  `rekap_bill` varchar(10) NOT NULL,
  `sspd` varchar(30) DEFAULT NULL,
  `bill` varchar(10) NOT NULL,
  `cash` varchar(5) NOT NULL,
  `edc` varchar(5) NOT NULL,
  `emoney` varchar(5) NOT NULL,
  `ota` varchar(5) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `ket` varchar(300) DEFAULT NULL,
  `jumlah` int(11) NOT NULL,
  `verif` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pws_hotel`
--

INSERT INTO `pws_hotel` (`no_pws`, `tgl_pws`, `npwpd`, `tipe_id`, `izin`, `tarif`, `sptpd`, `rekap_terima`, `rekap_bill`, `sspd`, `bill`, `cash`, `edc`, `emoney`, `ota`, `tgl_bayar`, `ket`, `jumlah`, `verif`) VALUES
('htl-2002030001', '2020-02-03', '2013.01.02.0035', 2, 'ada', 'benar', 'pws-200811-814df8fde2.pdf', 'ada', 'ada', 'pws-200811-814df8fde21.pdf', 'ada', 'ya', 'ya', 'ya', 'ya', '2020-01-15', '', 6, 'Y'),
('htl-2002030002', '2020-02-03', '2012.01.02.0002', 2, 'ada', 'benar', 'pws-200811-ed2eafbfaa.pdf', 'ada', 'ada', 'pws-200811-ed2eafbfaa1.pdf', 'ada', 'ya', 'ya', 'ya', 'ya', '2020-01-03', '', 6, 'Y'),
('htl-2008030001', '2020-08-03', '2013.01.02.0012', 2, 'ada', 'benar', 'pws-200811-8f7b20ef34.pdf', 'ada', 'ada', 'pws-200811-8f7b20ef341.pdf', 'ada', 'ya', 'ya', 'ya', 'ya', '2020-07-12', '', 6, 'Y'),
('htl-2008050001', '2020-08-05', '2013.05.16.0031', 2, 'ada', 'benar', 'pws-200811-2fea0d5a75.pdf', 'tidak ada', 'ada', 'pws-200811-2fea0d5a751.pdf', 'ada', 'ya', 'ya', 'tidak', 'ya', '2020-07-18', '', 6, 'Y'),
('htl-2008110001', '2020-08-11', '2013.01.02.0035', 2, 'ada', 'benar', NULL, 'ada', 'ada', 'pws-200811-84b0394652.pdf', 'ada', 'ya', 'ya', 'ya', 'ya', '2020-07-20', '', 0, 'T'),
('htl-2008110003', '2020-08-11', '2012.01.02.0002', 2, 'ada', 'benar', NULL, 'ada', 'ada', NULL, 'ada', 'ya', 'ya', 'ya', 'ya', '2020-07-17', '', 0, 'T'),
('htl-2008140001', '2020-08-14', '2012.01.02.0025', 2, 'ada', 'benar', 'pws-200811-3b6fb7f62c.pdf', 'ada', 'ada', 'pws-200811-3b6fb7f62c1.pdf', 'ada', 'ya', 'ya', 'tidak', 'ya', '2020-07-15', '', 6, 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pws_insidentil`
--

CREATE TABLE `pws_insidentil` (
  `no_pws` varchar(30) NOT NULL,
  `tgl_pws` date NOT NULL,
  `npwpd` varchar(20) DEFAULT NULL,
  `nama_p` varchar(100) NOT NULL,
  `alamat_p` varchar(200) NOT NULL,
  `no_telp_p` varchar(15) NOT NULL,
  `tempat` varchar(100) NOT NULL,
  `sah` varchar(10) NOT NULL,
  `harga` varchar(10) NOT NULL,
  `seri` varchar(10) NOT NULL,
  `sobek` varchar(10) NOT NULL,
  `simpan` varchar(10) NOT NULL,
  `lapor` varchar(10) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `ket` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pws_insidentil`
--

INSERT INTO `pws_insidentil` (`no_pws`, `tgl_pws`, `npwpd`, `nama_p`, `alamat_p`, `no_telp_p`, `tempat`, `sah`, `harga`, `seri`, `sobek`, `simpan`, `lapor`, `tgl_bayar`, `ket`) VALUES
('idt-2004190002', '2020-04-19', '2010.01.02.0052', 'Nashville HBI', 'Jl. A. Yani KM.4,5, Karang Mekar', '05113251008', 'Nashville HBI', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', '2020-04-14', 'Konser musik'),
('idt-2005200002', '2020-05-20', '2017.01.03.0008', 'Rocket Chicken', 'Jl. Pahlawan No.61, Seberang Mesjid, Kec. Banjarmasin Tengah', '081393131130', 'Lapangan Kamboja', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', '2020-05-08', 'Konser musik untuk merayakan buka cabang baru'),
('idt-2007220002', '2020-07-22', NULL, 'SMAN 5 Banjarmasin', 'Jln. Sultan Adam', '05119999999', 'Halaman SMAN 5 Banjarmasin', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', '2020-07-13', 'Acara Pentas Seni antar SMAN se-Banjarmasin'),
('idt-2008080002', '2020-08-08', '2012.01.02.0028', 'Rumah Makan Fauzan', 'Jl. Sultan Adam No.13', '085332900199', 'Rumah Makan Fauzan', 'Ya', 'Ya', 'Ya', 'Tidak', 'Tidak', 'Ya', '2020-08-03', 'Acara syukuran'),
('idt-2008120001', '2020-08-12', '2012.01.02.0002', 'Hotel Aston', 'Jln. Jend. A. Yani Km 11,8', '05116745555', 'Restoran Jorong', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', '2020-08-05', 'Acara malam ramah tamah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pws_reklame`
--

CREATE TABLE `pws_reklame` (
  `no_pws` varchar(30) NOT NULL,
  `tgl_pws` date NOT NULL,
  `npwpd` varchar(20) NOT NULL,
  `izin` varchar(10) NOT NULL,
  `masa` varchar(4) DEFAULT NULL,
  `tgl_bayar` date DEFAULT NULL,
  `jenis` varchar(50) NOT NULL,
  `ukuran` varchar(50) NOT NULL,
  `teks` varchar(100) NOT NULL,
  `lokasi` varchar(150) NOT NULL,
  `status_tempat` varchar(50) NOT NULL,
  `status_pasang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pws_reklame`
--

INSERT INTO `pws_reklame` (`no_pws`, `tgl_pws`, `npwpd`, `izin`, `masa`, `tgl_bayar`, `jenis`, `ukuran`, `teks`, `lokasi`, `status_tempat`, `status_pasang`) VALUES
('rkl-2003230001', '2020-03-23', '2019.01.03.0003', 'tidak ada', '', '0000-00-00', 'selebaran', '26x14 cm', 'Diskon spesial buka cabang baru', 'Jln. Ahmad Yani KM 03', 'halaman sendiri/sewa tanah', 'melanggar ketentuan'),
('rkl-2006110002', '2020-06-11', '2012.01.02.0002', 'ada', '6', '2020-06-04', 'kain', '350x200 cm', 'Promosi', 'Jln. Sultan Adam', 'nempel bangunan/atas bangunan', 'sesuai ketentuan'),
('rkl-2006110004', '2020-06-11', '2019.01.03.0003', 'tidak ada', '', '0000-00-00', 'selebaran', '26x14 cm', 'Harga Spesial', 'Jln. Sultan Adam', 'tanah negara', 'melanggar ketentuan'),
('rkl-2007140005', '2020-07-14', '2017.01.02.0102', 'ada', '3', '2020-07-09', 'kain', '350x200 cm', 'Buka Cabang Baru', 'Jln. RE Martadinata, No.34', 'halaman sendiri/sewa tanah', 'sesuai ketentuan'),
('rkl-2007200002', '2020-07-20', '2019.01.03.0003', 'ada', '', '0000-00-00', 'kain', '600x200 cm', 'Promosi hotel sekaligus kampanye new normal', 'Jln. Ahmad Yani KM 03', 'tanah negara', 'melanggar ketentuan'),
('rkl-2007220001', '2020-07-22', '2014.01.03.0021', 'ada', '', '0000-00-00', 'kain', '350x100 cm', 'Promosi', 'Jln. Gatot Subroto, No.25', 'nempel bangunan/atas bangunan', 'melanggar ketentuan'),
('rkl-2008060001', '2020-08-06', '2019.01.03.0011', 'tidak ada', '', '0000-00-00', 'kain', '350x200 cm', 'Promosi', 'Jln. Ahmad Yani KM 06', 'tanah negara', 'melanggar ketentuan'),
('rkl-2008100001', '2020-08-10', '2019.01.03.0011', 'tidak ada', '', '0000-00-00', 'stiker', '15x10 cm', 'Menu baru dengan diskon', 'Jln. Sultan Adam, Komplek H. Andir', 'tanah negara', 'melanggar ketentuan'),
('rkl-2008100002', '2020-08-10', '2013.01.02.0012', 'ada', '4', '2020-08-04', 'selebaran', '22x17 cm', 'Diskon spesial new normal', 'Jln. Ahmad Yani KM.5,7', 'halaman sendiri/sewa tanah', 'sesuai ketentuan'),
('rkl-2008100005', '2020-08-10', '2015.01.03.0008', 'ada', '', '0000-00-00', 'kain', '450x150 cm', 'Promosi', 'Jln. Ahmad Yani KM 07', 'nempel bangunan/atas bangunan', 'melanggar ketentuan'),
('rkl-2008120001', '2020-08-12', '2019.01.02.0022', 'tidak ada', '', '0000-00-00', 'kain', '400x300 cm', 'Promosi', 'Jln. Ahmad Yani KM 02', 'tanah negara', 'sesuai ketentuan'),
('rkl-2008120002', '2020-08-12', '2010.01.02.0014', 'ada', '4', '2020-08-07', 'kain', '350x200 cm', 'Promosi buka cabang baru', 'Jln. RE Martadinata, No.05', 'halaman sendiri/sewa tanah', 'sesuai ketentuan'),
('rkl-2008120003', '2020-08-12', '2012.01.02.0048', 'ada', '', '0000-00-00', 'kain', '30x20 cm', 'Diskon spesial untuk mahasiswa', 'Jln. Samudera Baru', 'tanah negara', 'melanggar ketentuan'),
('rkl-2008120004', '2020-06-02', '2012.01.02.0044', 'ada', '4', '2020-05-28', 'selebaran', '26x14 cm', 'Diskon spesial menu baru', 'Jl. Flamboyan II No.55', 'halaman sendiri/sewa tanah', 'sesuai ketentuan'),
('rkl-2008130001', '2020-08-13', '2013.01.02.0035', 'ada', '', '0000-00-00', 'kain', '350x200 cm', 'Promosi', 'Jln. Sultan Adam', 'tanah negara', 'melanggar ketentuan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pws_restoran`
--

CREATE TABLE `pws_restoran` (
  `no_pws` varchar(30) NOT NULL,
  `tgl_pws` date NOT NULL,
  `npwpd` varchar(20) NOT NULL,
  `tipe_id` int(11) NOT NULL,
  `izin` varchar(10) NOT NULL,
  `tarif` varchar(10) NOT NULL,
  `sptpd` varchar(30) DEFAULT NULL,
  `rekap_terima` varchar(10) NOT NULL,
  `rekap_bill` varchar(10) NOT NULL,
  `sspd` varchar(30) DEFAULT NULL,
  `bill` varchar(10) NOT NULL,
  `cash` varchar(5) NOT NULL,
  `edc` varchar(5) NOT NULL,
  `emoney` varchar(5) NOT NULL,
  `ditempat` varchar(5) NOT NULL,
  `pesan` varchar(5) NOT NULL,
  `catering` varchar(5) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `ket` varchar(300) DEFAULT NULL,
  `jumlah` int(11) NOT NULL,
  `verif` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pws_restoran`
--

INSERT INTO `pws_restoran` (`no_pws`, `tgl_pws`, `npwpd`, `tipe_id`, `izin`, `tarif`, `sptpd`, `rekap_terima`, `rekap_bill`, `sspd`, `bill`, `cash`, `edc`, `emoney`, `ditempat`, `pesan`, `catering`, `tgl_bayar`, `ket`, `jumlah`, `verif`) VALUES
('rst-2002050001', '2020-02-05', '2012.01.02.0044', 1, 'ada', 'benar', 'pws-200811-8938bdd9b0.pdf', 'tidak ada', 'ada', 'pws-200811-8938bdd9b01.pdf', 'ada', 'ya', 'ya', 'tidak', 'ya', 'ya', 'ya', '2020-01-14', '', 6, 'Y'),
('rst-2006280001', '2020-06-28', '2014.01.03.0021', 1, 'tidak', 'benar', 'pws-200628-706d1145f3.pdf', 'ada', 'ada', 'pws-200628-706d1145f31.pdf', 'tidak', '', '', '', '', '', '', '2020-06-15', '', 0, 'T'),
('rst-2008060001', '2020-08-06', '2014.01.03.0021', 1, 'ada', 'benar', 'pws-200811-fdd01b6ba5.pdf', 'ada', 'ada', 'pws-200811-fdd01b6ba51.pdf', 'ada', 'ya', 'ya', 'tidak', 'ya', 'tidak', 'ya', '2020-06-16', '', 6, 'Y'),
('rst-2008100006', '2020-08-10', '2017.01.03.0008', 1, 'ada', 'benar', 'pws-200811-7813c2ec2c.pdf', 'ada', 'ada', 'pws-200811-7813c2ec2c1.pdf', 'ada', 'ya', 'ya', 'ya', 'ya', 'tidak', 'ya', '2020-07-02', '', 6, 'Y'),
('rst-2008110003', '2020-08-11', '2012.01.02.0044', 1, 'ada', 'benar', NULL, 'ada', 'ada', NULL, 'ada', 'ya', 'ya', 'tidak', 'ya', 'ya', 'ya', '2020-07-17', '', 0, 'T'),
('rst-2008120001', '2020-08-11', '2010.01.02.0014', 1, 'ada', 'benar', 'pws-200811-72dae15776.pdf', 'ada', 'ada', 'pws-200811-72dae157761.pdf', 'ada', 'ya', 'tidak', 'tidak', 'ya', 'tidak', 'tidak', '2020-07-15', '', 6, 'Y'),
('rst-2008120002', '2020-08-11', '2012.01.02.0028', 1, 'ada', 'benar', 'pws-200811-cb371d23da.pdf', 'ada', 'tidak ada', 'pws-200811-cb371d23da1.pdf', 'ada', 'ya', 'ya', 'tidak', 'ya', 'ya', 'ya', '2020-07-14', '', 6, 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tipe_wp`
--

CREATE TABLE `tipe_wp` (
  `tipe_id` int(11) NOT NULL,
  `ket_tipe` varchar(10) NOT NULL,
  `jenis_tipe` varchar(50) NOT NULL,
  `pajak` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tipe_wp`
--

INSERT INTO `tipe_wp` (`tipe_id`, `ket_tipe`, `jenis_tipe`, `pajak`) VALUES
(1, 'restoran', 'restoran', 10),
(2, 'hotel', 'hotel', 10),
(3, 'hiburan', 'bioskop', 10),
(4, 'hiburan', 'diskotik, pub, bar, dan sejenisnya', 40),
(5, 'hiburan', 'karaoke', 30),
(6, 'hiburan', 'bilyar dan bowling', 10),
(7, 'hiburan', 'permainan ketangkasan', 10),
(8, 'hiburan', 'mandi uap atau spa', 30),
(9, 'hiburan', 'panti pijat, refleksi, dan pusat kebugaran', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `npwpd` varchar(20) DEFAULT NULL,
  `level` int(1) NOT NULL COMMENT '1:admin , 2:wp	'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `name`, `npwpd`, `level`) VALUES
(1, 'Admin', '21232f297a57a5a743894a0e4a801fc3', 'Akbar Arif', NULL, 1),
(2, 'hotel1', '139ab4e996c11ba2476b31469e724924', 'Hotel Aston', '2012.01.02.0002', 2),
(3, 'hotel2', '1afdcd703a35baa77831201c50c1e9c0', 'Hotel Treepark', '2013.05.16.0031', 2),
(18, 'rattan1', '15e620dd81ebc8ec65a34634ee6dddf2', 'Hotel Rattan-Inn', '2013.01.02.0012', 2),
(19, 'hotel5', '3f8a6abf5fbfd8bc16dab9b35a6bf17e', 'Hotel Fave', '2013.01.02.0035', 2),
(20, 'bunda', '55b0c86ed75326a42b7a48c3fbf67baf', 'Kedai Bunda Flamboyan', '2012.01.02.0044', 2),
(21, 'karaokenav', '1efd6f89ca9584ba8fc2a6771f8c5649', 'Nav Karaoke', '2012.01.02.0048', 2),
(22, 'pesona1', '47ca7441074215bc2b3a030950f9ad45', 'Hotel Pesona', '2012.01.02.0025', 2),
(23, 'resto1', 'cfd242d4258aaef4feb624eedfe22035', 'Rumah Makan Fauzan', '2012.01.02.0028', 2),
(25, 'orari', '5839507868ed5c84f8e9afa2b954eb26', 'Rumah Makan Lontong Orari', '2014.01.03.0021', 2),
(26, 'roket1', '64eb566afe6dc627f2d01e088ce6c519', 'Rocket Chicken', '2017.01.03.0008', 2),
(27, 'depot1', '4ff862cb426f796285fdde264c46115e', ' Depot Soto Bang Amat', '2010.01.02.0014', 2),
(28, 'revina', '63f502a234b67f546c22a166093dbb29', 'Revina Gym', '2017.01.02.0102', 2),
(29, 'karaoke2', '93037268168fbef8cbc39d0a7ea1f994', 'Nasa Karaoke Luxury Club', '2015.01.03.0008', 2),
(30, 'hiburan2', '170b2439c91914d4da2328114e382b84', 'Nashville HBI', '2010.01.02.0052', 2),
(31, 'baru123', '4ba2c6eb5a0045c66a09a12be73e822a', 'Rumah Makan Baru', '2019.01.03.0011', 2),
(32, 'azhar', '838e24a98647b16ed33f20774b2e3502', 'Azhar Billyard', '2019.01.02.0022', 2),
(33, 'khotel', 'cf32781a12815d51b48ae027bfcdaffd', 'Hotel Khazanah', '2019.01.03.0003', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `wp`
--

CREATE TABLE `wp` (
  `npwpd` varchar(20) NOT NULL,
  `nama_wp` varchar(100) NOT NULL,
  `tipe_id` int(11) NOT NULL,
  `nama_kelola` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `username` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `wp`
--

INSERT INTO `wp` (`npwpd`, `nama_wp`, `tipe_id`, `nama_kelola`, `alamat`, `no_telp`, `username`) VALUES
('2010.01.02.0014', ' Depot Soto Bang Amat', 1, 'Shafwati', 'Jalan Banua Anyar No. 6, Benua Anyar', '08115116164', 'depot1'),
('2010.01.02.0052', 'Nashville HBI', 4, 'Eri Sudarisman', 'Jl. A. Yani KM.4,5, Karang Mekar', '05113251008', 'hiburan2'),
('2012.01.02.0002', 'Hotel Aston', 2, 'Andri Kurniawan', 'Jln. Jend. A. Yani Km 11,8', '05116745555', 'hotel1'),
('2012.01.02.0025', 'Hotel Pesona', 2, 'Hendi Purwanto', 'Jalan Brigjen H. Hasan Basri No. 32 A', '05113302919', 'pesona1'),
('2012.01.02.0028', 'Rumah Makan Fauzan', 1, 'H. Fauzan', 'Jl. Sultan Adam No.13', '085332900199', 'resto1'),
('2012.01.02.0044', 'Kedai Bunda Flamboyan', 1, 'Rusmin Nuryadin', 'Jl. Flamboyan II No.55', '0811514566', 'bunda'),
('2012.01.02.0048', 'Nav Karaoke', 5, 'Herman Dinata', 'Jalan A. Yani KM.2,5 No.86', '05113268989', 'karaokenav'),
('2013.01.02.0012', 'Hotel Rattan-Inn', 2, 'Ahmad Budi Purnomo', 'Jl.Ahmad Yani KM.5,7', '05113267799', 'rattan1'),
('2013.01.02.0035', 'Hotel Fave', 2, 'Devy Antonius Malo', 'Jl. Ahmad Yani Km 2 No.35', '05116742777', 'hotel5'),
('2013.05.16.0031', 'Hotel Treepark', 2, 'Riswandi Saptono', 'Jl. Ahmad Yani KM 6.2', '05116742888', 'hotel2'),
('2014.01.03.0021', 'Rumah Makan Lontong Orari', 1, 'Rosminah', 'Jalan Sungai Mesa, Seberang Mesjid, Kec. Banjarmasin Tengah', '05116782672', 'orari'),
('2015.01.03.0008', 'Nasa Karaoke Luxury Club', 4, 'M. Riyadi', 'Jl. H.Djok Mentaya No.8, Kertak Baru Ilir', '05113366868', 'karaoke2'),
('2017.01.02.0102', 'Revina Gym', 9, 'Auren Ferdinand Lengkong', 'Jl. Raya Banjar Indah Permai, Pemurus Dalam', '08115012131', 'revina'),
('2017.01.03.0008', 'Rocket Chicken', 1, 'Bagus Irawan', 'Jl. Pahlawan No.61, Seberang Mesjid, Kec. Banjarmasin Tengah', '081393131130', 'roket1'),
('2019.01.02.0022', 'Azhar Billyard', 6, 'Fikri Azhar', 'Jln. Mawar Baru, No.05', '05112234444', 'azhar'),
('2019.01.03.0003', 'Hotel Khazanah', 2, 'M. Aditya Pratama', 'Jln. Kayu Baru, No.20', '05119876655', 'khotel'),
('2019.01.03.0011', 'Rumah Makan Baru', 1, 'Arif Akbar', 'Jln. Samudera Baru, No.25', '05119900990', 'baru123');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `prs_hiburan`
--
ALTER TABLE `prs_hiburan`
  ADD PRIMARY KEY (`id_hbr`),
  ADD KEY `no_pws` (`no_pws`),
  ADD KEY `npwpd` (`npwpd`),
  ADD KEY `tipe_id` (`tipe_id`);

--
-- Indeks untuk tabel `prs_hotel`
--
ALTER TABLE `prs_hotel`
  ADD PRIMARY KEY (`id_htl`),
  ADD KEY `no_pws` (`no_pws`),
  ADD KEY `npwpd` (`npwpd`),
  ADD KEY `tipe_id` (`tipe_id`);

--
-- Indeks untuk tabel `prs_restoran`
--
ALTER TABLE `prs_restoran`
  ADD PRIMARY KEY (`id_rst`),
  ADD KEY `no_pws` (`no_pws`),
  ADD KEY `npwpd` (`npwpd`),
  ADD KEY `tipe_id` (`tipe_id`);

--
-- Indeks untuk tabel `pws_hiburan`
--
ALTER TABLE `pws_hiburan`
  ADD PRIMARY KEY (`no_pws`),
  ADD KEY `npwpd` (`npwpd`),
  ADD KEY `tipe_id` (`tipe_id`);

--
-- Indeks untuk tabel `pws_hotel`
--
ALTER TABLE `pws_hotel`
  ADD PRIMARY KEY (`no_pws`),
  ADD KEY `npwpd` (`npwpd`),
  ADD KEY `tipe_id` (`tipe_id`);

--
-- Indeks untuk tabel `pws_insidentil`
--
ALTER TABLE `pws_insidentil`
  ADD PRIMARY KEY (`no_pws`),
  ADD KEY `pws_insidentil_ibfk_1` (`npwpd`);

--
-- Indeks untuk tabel `pws_reklame`
--
ALTER TABLE `pws_reklame`
  ADD PRIMARY KEY (`no_pws`),
  ADD KEY `data_reklame_ibfk_1` (`npwpd`);

--
-- Indeks untuk tabel `pws_restoran`
--
ALTER TABLE `pws_restoran`
  ADD PRIMARY KEY (`no_pws`),
  ADD KEY `npwpd` (`npwpd`),
  ADD KEY `tipe_id` (`tipe_id`);

--
-- Indeks untuk tabel `tipe_wp`
--
ALTER TABLE `tipe_wp`
  ADD PRIMARY KEY (`tipe_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `npwpd` (`npwpd`);

--
-- Indeks untuk tabel `wp`
--
ALTER TABLE `wp`
  ADD PRIMARY KEY (`npwpd`),
  ADD KEY `tipe_id` (`tipe_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `prs_hiburan`
--
ALTER TABLE `prs_hiburan`
  MODIFY `id_hbr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT untuk tabel `prs_hotel`
--
ALTER TABLE `prs_hotel`
  MODIFY `id_htl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT untuk tabel `prs_restoran`
--
ALTER TABLE `prs_restoran`
  MODIFY `id_rst` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `tipe_wp`
--
ALTER TABLE `tipe_wp`
  MODIFY `tipe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `prs_hiburan`
--
ALTER TABLE `prs_hiburan`
  ADD CONSTRAINT `prs_hiburan_ibfk_1` FOREIGN KEY (`no_pws`) REFERENCES `pws_hiburan` (`no_pws`),
  ADD CONSTRAINT `prs_hiburan_ibfk_2` FOREIGN KEY (`npwpd`) REFERENCES `wp` (`npwpd`),
  ADD CONSTRAINT `prs_hiburan_ibfk_3` FOREIGN KEY (`tipe_id`) REFERENCES `tipe_wp` (`tipe_id`);

--
-- Ketidakleluasaan untuk tabel `prs_hotel`
--
ALTER TABLE `prs_hotel`
  ADD CONSTRAINT `prs_hotel_ibfk_1` FOREIGN KEY (`no_pws`) REFERENCES `pws_hotel` (`no_pws`),
  ADD CONSTRAINT `prs_hotel_ibfk_2` FOREIGN KEY (`npwpd`) REFERENCES `wp` (`npwpd`),
  ADD CONSTRAINT `prs_hotel_ibfk_3` FOREIGN KEY (`tipe_id`) REFERENCES `tipe_wp` (`tipe_id`);

--
-- Ketidakleluasaan untuk tabel `prs_restoran`
--
ALTER TABLE `prs_restoran`
  ADD CONSTRAINT `prs_restoran_ibfk_1` FOREIGN KEY (`no_pws`) REFERENCES `pws_restoran` (`no_pws`),
  ADD CONSTRAINT `prs_restoran_ibfk_2` FOREIGN KEY (`npwpd`) REFERENCES `wp` (`npwpd`),
  ADD CONSTRAINT `prs_restoran_ibfk_3` FOREIGN KEY (`tipe_id`) REFERENCES `tipe_wp` (`tipe_id`);

--
-- Ketidakleluasaan untuk tabel `pws_hiburan`
--
ALTER TABLE `pws_hiburan`
  ADD CONSTRAINT `pws_hiburan_ibfk_1` FOREIGN KEY (`npwpd`) REFERENCES `wp` (`npwpd`),
  ADD CONSTRAINT `pws_hiburan_ibfk_2` FOREIGN KEY (`tipe_id`) REFERENCES `tipe_wp` (`tipe_id`);

--
-- Ketidakleluasaan untuk tabel `pws_hotel`
--
ALTER TABLE `pws_hotel`
  ADD CONSTRAINT `pws_hotel_ibfk_1` FOREIGN KEY (`npwpd`) REFERENCES `wp` (`npwpd`),
  ADD CONSTRAINT `pws_hotel_ibfk_2` FOREIGN KEY (`tipe_id`) REFERENCES `tipe_wp` (`tipe_id`);

--
-- Ketidakleluasaan untuk tabel `pws_insidentil`
--
ALTER TABLE `pws_insidentil`
  ADD CONSTRAINT `pws_insidentil_ibfk_1` FOREIGN KEY (`npwpd`) REFERENCES `wp` (`npwpd`);

--
-- Ketidakleluasaan untuk tabel `pws_reklame`
--
ALTER TABLE `pws_reklame`
  ADD CONSTRAINT `pws_reklame_ibfk_1` FOREIGN KEY (`npwpd`) REFERENCES `wp` (`npwpd`);

--
-- Ketidakleluasaan untuk tabel `pws_restoran`
--
ALTER TABLE `pws_restoran`
  ADD CONSTRAINT `pws_restoran_ibfk_1` FOREIGN KEY (`npwpd`) REFERENCES `wp` (`npwpd`),
  ADD CONSTRAINT `pws_restoran_ibfk_2` FOREIGN KEY (`tipe_id`) REFERENCES `tipe_wp` (`tipe_id`);

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`npwpd`) REFERENCES `wp` (`npwpd`);

--
-- Ketidakleluasaan untuk tabel `wp`
--
ALTER TABLE `wp`
  ADD CONSTRAINT `wp_ibfk_1` FOREIGN KEY (`tipe_id`) REFERENCES `tipe_wp` (`tipe_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
