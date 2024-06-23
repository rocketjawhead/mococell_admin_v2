-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2022 at 03:46 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jajanpulsa_dev`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `userid` varchar(50) NOT NULL DEFAULT '0',
  `balance` int(11) NOT NULL DEFAULT 0,
  `poin` int(11) NOT NULL DEFAULT 0,
  `status` int(1) NOT NULL DEFAULT 1,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `userid`, `balance`, `poin`, `status`, `create_date`, `update_date`) VALUES
(15, '9920220129014859', 0, 3, 1, '2022-01-29 06:42:15', NULL),
(43, '001', 200000, 2, 1, '2022-02-25 12:36:57', NULL),
(44, '9520220225200157', 350000, 4, 1, '2022-02-25 13:01:57', NULL),
(45, '7120220226230300', 16752, 9, 1, '2022-02-26 16:03:00', NULL),
(46, '6620220228131457', 0, 0, 1, '2022-02-28 06:14:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `type_service` varchar(1) DEFAULT NULL,
  `product_name` varchar(200) NOT NULL,
  `category` varchar(200) NOT NULL,
  `brand` varchar(200) NOT NULL,
  `type` varchar(200) NOT NULL,
  `seller_name` varchar(200) NOT NULL,
  `price` varchar(200) NOT NULL,
  `buyer_sku_code` varchar(200) NOT NULL,
  `buyer_product_status` varchar(200) NOT NULL,
  `seller_product_status` varchar(200) NOT NULL,
  `unlimited_stock` varchar(200) NOT NULL,
  `stock` varchar(200) NOT NULL,
  `multi` varchar(200) NOT NULL,
  `start_cut_off` varchar(200) NOT NULL,
  `end_cut_off` varchar(200) NOT NULL,
  `desc_product` varchar(200) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `type_service`, `product_name`, `category`, `brand`, `type`, `seller_name`, `price`, `buyer_sku_code`, `buyer_product_status`, `seller_product_status`, `unlimited_stock`, `stock`, `multi`, `start_cut_off`, `end_cut_off`, `desc_product`, `create_date`) VALUES
(1, 't', 'Telkomsel 5.000', 'Pulsa', 'TELKOMSEL', 'Umum', 'PULSA GADGET', '4780', 'tl5', '1', '1', '1', '0', '0', '23:0', '1:0', 'Pulsa Telkomsel Rp 5.000', '2022-04-17 10:31:19'),
(2, 't', 'Telkomsel 15.000', 'Pulsa', 'TELKOMSEL', 'Umum', 'TRENT TRONIK CORP', '14805', 'tl15', '1', '1', '1', '0', '0', '23:29', '0:16', 'Pulsa Telkomsel Rp 15.000', '2022-04-17 10:31:19'),
(3, 't', 'Telkomsel 10.000', 'Pulsa', 'TELKOMSEL', 'Umum', 'PULSA GADGET', '9480', 'tl10', '1', '1', '1', '0', '0', '23:0', '1:0', 'Pulsa Telkomsel Rp 10.000', '2022-04-17 10:31:19'),
(4, 't', 'Telkomsel 20.000', 'Pulsa', 'TELKOMSEL', 'Umum', 'LOKALSEL', '19299', 'tl20', '1', '1', '1', '0', '0', '0:0', '1:0', 'Pulsa Telkomsel Rp 20.000', '2022-04-17 10:31:19'),
(5, 't', 'Telkomsel 25.000', 'Pulsa', 'TELKOMSEL', 'Umum', 'LOKALSEL', '23999', 'tl25', '1', '1', '1', '0', '0', '22:50', '23:30', 'Pulsa Telkomsel Rp 25.000', '2022-04-17 10:31:19'),
(6, 't', 'Telkomsel 50.000', 'Pulsa', 'TELKOMSEL', 'Umum', 'TRENT TRONIK CORP', '49570', 'tl50', '1', '1', '1', '0', '0', '23:29', '0:16', 'Pulsa Telkomsel Rp 50.000', '2022-04-17 10:31:19'),
(7, 't', 'Telkomsel 100.000', 'Pulsa', 'TELKOMSEL', 'Umum', 'TRENT TRONIK CORP', '96655', 'tl100', '1', '1', '1', '0', '0', '23:29', '0:16', 'Pulsa Telkomsel Rp 100.000', '2022-04-17 10:31:19'),
(8, 't', 'Telkomsel 150.000', 'Pulsa', 'TELKOMSEL', 'Umum', 'PT MMBC TOUR AND TRAVEL', '145400', 'tl150', '1', '0', '1', '0', '1', '23:0', '0:35', 'Pulsa Telkomsel Rp 150.000', '2022-04-17 10:31:19'),
(9, 't', 'Telkomsel 200.000', 'Pulsa', 'TELKOMSEL', 'Umum', 'PT MMBC TOUR AND TRAVEL', '193900', 'tl200', '1', '0', '1', '0', '1', '23:0', '0:35', 'Pulsa Telkomsel Rp 200.000', '2022-04-17 10:31:19'),
(10, 'i', 'Indosat 25.000', 'Pulsa', 'INDOSAT', 'Umum', 'SMTEL', '24895', 'id25', '1', '1', '1', '0', '1', '23:30', '0:30', 'Pulsa Indosat Rp 25.000', '2022-04-17 10:31:19'),
(11, 't', 'Telkomsel 300.000', 'Pulsa', 'TELKOMSEL', 'Umum', 'Teladan Pulsa', '290375', 'tl300', '1', '1', '1', '0', '0', '23:45', '0:15', 'Pulsa Telkomsel Rp 300.000', '2022-04-17 10:31:19'),
(12, 't', 'Telkomsel 500.000', 'Pulsa', 'TELKOMSEL', 'Umum', 'Ayopop', '485525', 'tl500', '0', '1', '1', '0', '0', '0:0', '0:0', 'Pulsa Telkomsel Rp 500.000', '2022-04-17 10:31:19'),
(13, 't', 'Telkomsel 1.000.000', 'Pulsa', 'TELKOMSEL', 'Umum', 'Ayopop', '968550', 'tl1000', '1', '1', '1', '0', '0', '0:0', '0:0', 'Pulsa Telkomsel Rp 1.000.000', '2022-04-17 10:31:19'),
(14, 'i', 'Indosat 10.000', 'Pulsa', 'INDOSAT', 'Umum', 'PULSA GADGET', '10005', 'id10', '1', '1', '1', '0', '1', '23:30', '0:30', 'Pulsa Indosat Rp 10.000', '2022-04-17 10:31:20'),
(15, 'i', 'Indosat 5.000', 'Pulsa', 'INDOSAT', 'Umum', 'PULSA GADGET', '5005', 'id5', '1', '1', '1', '0', '1', '23:40', '0:30', 'Pulsa Indosat Rp 5.000', '2022-04-17 10:31:19'),
(16, 'i', 'Indosat 15.000', 'Pulsa', 'INDOSAT', 'Umum', 'Teladan Pulsa', '14835', 'id15', '1', '1', '1', '0', '0', '23:45', '0:15', 'Pulsa Indosat Rp 15.000', '2022-04-17 10:31:20'),
(17, 'i', 'Indosat 20.000', 'Pulsa', 'INDOSAT', 'Umum', 'TRENT TRONIK CORP', '19725', 'id20', '1', '1', '1', '0', '0', '23:29', '0:16', 'Pulsa Indosat Rp 20.000', '2022-04-17 10:31:20'),
(18, 'i', 'Indosat 100.000', 'Pulsa', 'INDOSAT', 'Umum', 'Super Reload', '96330', 'id100', '1', '1', '1', '0', '1', '0:0', '6:0', 'Pulsa Indosat Rp 100.000', '2022-04-17 10:31:20'),
(19, 'i', 'Indosat 50.000', 'Pulsa', 'INDOSAT', 'Umum', 'PULSA GADGET', '48650', 'id50', '1', '1', '1', '0', '0', '23:30', '0:30', 'Pulsa Indosat Rp 50.000', '2022-04-17 10:31:20'),
(20, 'i', 'Indosat 150.000', 'Pulsa', 'INDOSAT', 'Umum', 'PT BukaKios Teknologi Indonesia', '142625', 'id150', '1', '1', '1', '0', '1', '23:30', '0:20', 'Pulsa Indosat Rp 150.000', '2022-04-17 10:31:20'),
(21, 'i', 'Indosat 200.000', 'Pulsa', 'INDOSAT', 'Umum', 'PT BukaKios Teknologi Indonesia', '185125', 'id200', '1', '1', '1', '0', '1', '23:30', '0:20', 'Pulsa Indosat Rp 200.000', '2022-04-17 10:31:20'),
(22, 'i', 'Indosat 250.000', 'Pulsa', 'INDOSAT', 'Umum', 'Ayopop', '232050', 'id250', '1', '1', '1', '0', '0', '0:0', '0:0', 'Pulsa Indosat Rp 250.000', '2022-04-17 10:31:20'),
(23, 'b', 'by.U 2.000', 'Pulsa', 'by.U', 'Umum', 'BCA PULSA', '2730', 'by.U2K', '0', '1', '1', '0', '1', '23:45', '0:15', '-', '2022-04-17 10:31:20'),
(24, 'b', 'by.U 1.000', 'Pulsa', 'by.U', 'Umum', 'BCA PULSA', '1730', 'by.U1K', '0', '1', '1', '0', '1', '23:45', '0:15', '-', '2022-04-17 10:31:20'),
(25, 'i', 'Indosat 500.000', 'Pulsa', 'INDOSAT', 'Umum', 'Lucky 7 Cell', '467545', 'id500', '1', '1', '1', '0', '1', '0:0', '0:0', 'Pulsa Indosat Rp 500.000', '2022-04-17 10:31:20'),
(26, 'b', 'by.U 4.000', 'Pulsa', 'by.U', 'Umum', 'BCA PULSA', '4730', 'by.U4K', '0', '1', '1', '0', '1', '23:45', '0:15', '-', '2022-04-17 10:31:20'),
(27, 'b', 'by.U 3.000', 'Pulsa', 'by.U', 'Umum', 'BCA PULSA', '3730', 'by.U3K', '0', '1', '1', '0', '1', '23:45', '0:15', '-', '2022-04-17 10:31:20'),
(28, 'b', 'by.U 5.000', 'Pulsa', 'by.U', 'Umum', 'FKIOS', '5345', 'by.U5K', '0', '1', '1', '0', '1', '23:30', '0:30', 'pulsa by.U Rp 5.000', '2022-04-17 10:31:20'),
(29, 'b', 'by.U 7.000', 'Pulsa', 'by.U', 'Umum', 'BCA PULSA', '7730', 'by.U7K', '0', '1', '1', '0', '1', '23:45', '0:15', '-', '2022-04-17 10:31:20'),
(30, 'b', 'by.U 8.000', 'Pulsa', 'by.U', 'Umum', 'SIGNAL H2H', '8855', 'by.U8K', '0', '1', '1', '0', '1', '23:45', '0:20', '-', '2022-04-17 10:31:20'),
(31, 'b', 'by.U 6.000', 'Pulsa', 'by.U', 'Umum', 'SIGNAL H2H', '6855', 'by.U6K', '0', '1', '1', '0', '1', '23:45', '0:20', '-', '2022-04-17 10:31:20'),
(32, 'S', 'Indosat 300 MB / 30 Hari', 'Data', 'INDOSAT', 'Umum', 'PT BukaKios Teknologi Indonesia', '2400', 'SAT300MB', '1', '1', '1', '0', '1', '23:30', '0:20', 'Indosat 300MB 30 Hari', '2022-04-17 10:31:20'),
(33, 'S', 'Indosat 100 MB / 30 Hari', 'Data', 'INDOSAT', 'Umum', 'PT BukaKios Teknologi Indonesia', '850', 'SAT100MB', '1', '1', '1', '0', '1', '23:30', '0:20', 'Indosat 100MB 30 Hari', '2022-04-17 10:31:20'),
(34, 'S', 'Indosat 200 MB / 30 Hari', 'Data', 'INDOSAT', 'Umum', 'PT BukaKios Teknologi Indonesia', '1600', 'SAT200MBSAT100MB', '1', '1', '1', '0', '1', '23:30', '0:20', 'Indosat 200MB 30 Hari', '2022-04-17 10:31:20'),
(35, 'S', 'Indosat 500 MB / 30 Hari', 'Data', 'INDOSAT', 'Umum', 'PT BukaKios Teknologi Indonesia', '4000', 'SAT400MB', '1', '1', '1', '0', '1', '23:30', '0:20', 'Indosat 500MB 30 Hari', '2022-04-17 10:31:20'),
(36, 'S', 'Indosat 750 MB / 30 Hari', 'Data', 'INDOSAT', 'Umum', 'PT BukaKios Teknologi Indonesia', '6000', 'SAT750MB', '1', '1', '1', '0', '1', '23:30', '0:20', 'Indosat 750MB 30 Hari', '2022-04-17 10:31:20'),
(37, 'S', 'Indosat 2 GB / 30 Hari', 'Data', 'INDOSAT', 'Umum', 'PT BukaKios Teknologi Indonesia', '16000', 'SAT2GB', '1', '1', '1', '0', '1', '23:30', '0:20', 'KUOTA 2GB 30 hari', '2022-04-17 10:31:20'),
(38, 'S', 'Indosat 1 GB / 30 Hari', 'Data', 'INDOSAT', 'Umum', 'TWIN Reload', '7600', 'SAT1GB', '1', '1', '1', '0', '0', '23:45', '0:15', 'KUOTA 1GB 30 hari', '2022-04-17 10:31:20'),
(39, 'S', 'Indosat 3 GB / 30 Hari', 'Data', 'INDOSAT', 'Umum', 'TWIN Reload', '22000', 'SAT3GB', '1', '1', '1', '0', '0', '23:45', '0:15', 'KUOTA 3GB 30 hari', '2022-04-17 10:31:20'),
(40, 'S', 'Indosat 10 GB / 30 Hari', 'Data', 'INDOSAT', 'Umum', 'PULSA GADGET', '80275', 'SAT10GB', '1', '1', '1', '0', '0', '23:30', '0:30', 'Kuota 10GB 30 hari', '2022-04-17 10:31:20'),
(41, 'S', 'Indosat 9 GB / 30 Hari', 'Data', 'INDOSAT', 'Umum', 'PULSA GADGET', '72175', 'SAT9GB', '1', '1', '1', '0', '0', '23:30', '0:30', 'Kuota 9GB 30 hari', '2022-04-17 10:31:20'),
(42, 'S', 'Indosat 7 GB / 30 Hari', 'Data', 'INDOSAT', 'Umum', 'PULSA GADGET', '56175', 'SAT7GB', '1', '1', '1', '0', '0', '23:30', '0:30', 'Kuota 7GB 30 hari', '2022-04-17 10:31:20'),
(43, 'S', 'Indosat 6 GB / 30 Hari', 'Data', 'INDOSAT', 'Umum', 'PT BukaKios Teknologi Indonesia', '48000', 'SAT6GB', '1', '1', '1', '0', '1', '23:30', '0:20', 'Kuota 6GB 30 hari', '2022-04-17 10:31:20'),
(44, 'S', 'Indosat 4 GB / 30 Hari', 'Data', 'INDOSAT', 'Umum', 'RAJAWALI PULSA', '24850', 'SAT4GB', '1', '1', '1', '0', '1', '23:30', '0:15', 'kuota 4GB 30 hari', '2022-04-17 10:31:20'),
(45, 'Y', 'Indosat Yellow 1 GB / 1 Hari', 'Data', 'INDOSAT', 'Yellow', 'PULSAID', '3400', 'YLW1GB1H', '1', '1', '1', '0', '0', '23:0', '6:0', 'cek di https://www.indosatooredoo.com/portal/id/psyellowplan', '2022-04-17 10:31:20'),
(46, 'Y', 'Indosat Yellow 6 GB / 1 Hari', 'Data', 'INDOSAT', 'Yellow', 'PULSA GADGET', '4100', 'YLW6GB1H', '1', '0', '1', '0', '0', '23:30', '0:30', 'cek di https://www.indosatooredoo.com/portal/id/psyellowplan', '2022-04-17 10:31:20'),
(47, 'Y', 'Indosat Yellow 1 GB / 7 Hari', 'Data', 'INDOSAT', 'Yellow', 'TWIN Reload', '9000', 'YLW1GB7H', '1', '1', '1', '0', '0', '23:45', '0:15', 'cek di https://www.indosatooredoo.com/portal/id/psyellowplan', '2022-04-17 10:31:20'),
(48, 'Y', 'Indosat Yellow 1 GB / 15 Hari', 'Data', 'INDOSAT', 'Yellow', 'TWIN Reload', '12350', 'YLW1GB15H', '1', '1', '1', '0', '0', '23:45', '0:15', 'cek di https://www.indosatooredoo.com/portal/id/psyellowplan', '2022-04-17 10:31:20'),
(49, 'F', 'Indosat Freedom U 5 GB / 30 Hari', 'Data', 'INDOSAT', 'Freedom U', 'RUSH PULSA DIGITAL', '61000', 'FRDMU5GB30H', '1', '1', '1', '0', '0', '23:45', '0:10', 'cek di https://www.indosatooredoo.com/portal/id/psfreedomu', '2022-04-17 10:31:20'),
(50, 'F', 'Indosat Freedom Kuota Harian 7 GB / 7 Hari', 'Data', 'INDOSAT', 'Freedom Harian', 'PULSAID', '22659', 'FKH7GB7H', '1', '0', '1', '0', '0', '23:0', '1:0', 'Total Kuota 7GB dengan batas pemakaian harian 1GB/hari. Setelah batas pemakaian harian, pemakaian internet gratis dgn Pulsa Safe kecepatan s.d 64Kbps. Masa aktif 7 hari', '2022-04-17 10:31:20'),
(51, 'S', 'Indosat Freedom Internet 2.5 GB / 5 Hari', 'Data', 'INDOSAT', 'Freedom Internet', 'CiPulsa Reload', '9550', 'SATFRDM2.5GB5H', '1', '1', '1', '0', '0', '0:30', '23:30', 'cek di link https://www.indosatooredoo.com/portal/id/psfreedominternet', '2022-04-17 10:31:20'),
(52, 'S', 'Indosat Freedom Internet 2 GB / 30 Hari', 'Data', 'INDOSAT', 'Freedom Internet', 'TWIN Reload', '14250', 'SATFRDM2GB30H', '1', '1', '1', '0', '0', '23:45', '0:15', 'INDOSAT DATA FREEDOM 2GB FULL 24 JAM NASIONAL, 30HARI', '2022-04-17 10:31:20'),
(53, 'F', 'Indosat Freedom U 3 GB + 15 GB Apps / 30 Hari', 'Data', 'INDOSAT', 'Freedom U', 'PULSA GADGET', '49525', 'FRDMU3GB15GBAPP30H', '1', '0', '1', '0', '0', '23:40', '0:30', 'cek di https://www.indosatooredoo.com/portal/id/psfreedomu', '2022-04-17 10:31:20'),
(54, 'S', 'Indosat Data Mini 2.5 GB / 30 Hari', 'Data', 'INDOSAT', 'Mini', 'TWIN Reload', '20075', 'SATMINI2.5GB30H', '1', '1', '1', '0', '0', '23:45', '0:15', '1 GB kuota utama + 1 GB kuota malam (01.00 - 06.00) + 0.5 GB kuota apps, berlaku 30 Hari', '2022-04-17 10:31:20'),
(55, 'S', 'Indosat Freedom Internet 1.5 GB / 5 Hari', 'Data', 'INDOSAT', 'Freedom Internet', 'TWIN Reload', '8800', 'SATFRDM1.5GB5H', '1', '1', '1', '0', '0', '23:45', '0:15', 'INDOSAT DATA FREEDOM 1.5 GB FULL 24 JAM NASIONAL, 5 Hari', '2022-04-17 10:31:20'),
(56, 'S', 'Indosat Freedom Internet 2 GB / 15 Hari', 'Data', 'INDOSAT', 'Freedom Internet', 'TWIN Reload', '13750', 'SATFRDM2GB15H', '1', '1', '1', '0', '0', '23:45', '0:15', 'INDOSAT DATA FREEDOM 2GB FULL 24 JAM NASIONAL, 15HARI', '2022-04-17 10:31:20'),
(57, 'S', 'Indosat Freedom Internet 8 GB / 30 Hari', 'Data', 'INDOSAT', 'Freedom Internet', 'TWIN Reload', '32400', 'SATFRDM8GB30H', '1', '0', '1', '0', '0', '23:45', '0:15', 'INDOSAT DATA FREEDOM 8 GB FULL 24 JAM NASIONAL, 30 HARI', '2022-04-17 10:31:20'),
(58, 'S', 'Indosat Freedom Internet 18 GB / 30 Hari', 'Data', 'INDOSAT', 'Freedom Internet', 'TWIN Reload', '59000', 'SATFRDM18GB30H', '1', '1', '1', '0', '0', '23:45', '0:15', 'INDOSAT DATA FREEDOM 18GB FULL 24 JAM NASIONAL, 30HARI', '2022-04-17 10:31:20'),
(59, 'S', 'Indosat Freedom Internet 25 GB / 30 Hari', 'Data', 'INDOSAT', 'Freedom Internet', 'TWIN Reload', '78000', 'SATFRDM25GB30H', '1', '1', '1', '0', '0', '23:45', '0:15', 'INDOSAT DATA FREEDOM 25GB FULL 24 JAM NASIONAL, 30HARI', '2022-04-17 10:31:20'),
(60, 'S', 'Indosat Unlimited JUMBO / 30 Hari', 'Data', 'INDOSAT', 'Unlimited', 'TWIN Reload', '130000', 'SATUNLIMETEDJMB30H', '1', '1', '1', '0', '0', '23:45', '0:15', 'Kuota Utama JUMBO + Unlimited Aplikasi sehari-hari + Unlimited Streaming Spotify dan iFlix + 100 SMS ke Semua Operator + Unlimited Nelpon + SMS ke Indosat + Unlimited Youtube', '2022-04-17 10:31:20'),
(61, 'F', 'Indosat Freedom Longlife 12 GB / 90 Hari', 'Data', 'INDOSAT', 'Freedom Longlife', 'TWIN Reload', '63400', 'FRDMLONGLIFE12GB90H', '1', '0', '1', '0', '0', '23:45', '0:15', '4 GB setiap bulan.', '2022-04-17 10:31:20'),
(62, 'F', 'Indosat Freedom Longlife 20 GB / 60 Hari', 'Data', 'INDOSAT', 'Freedom Longlife', 'HOKI NINE', '84815', 'FRDMLONGLIFE20GB60H', '1', '0', '1', '0', '0', '23:30', '0:30', '10 GB setiap bulan.', '2022-04-17 10:31:20'),
(63, 'S', 'Apps Kuota 10GB 30hr', 'Data', 'INDOSAT', 'Apps Kuota', 'TWIN Reload', '36325', 'SATAPPKOUTA10GB30H', '1', '1', '1', '0', '0', '23:45', '0:15', '-', '2022-04-17 10:31:20'),
(64, 'S', 'Apps Kuota 15GB 30hr', 'Data', 'INDOSAT', 'Apps Kuota', 'TWIN Reload', '50425', 'SATAPPKOUTA15GB30H', '1', '1', '1', '0', '0', '23:45', '0:15', '-', '2022-04-17 10:31:20'),
(65, 'F', 'Indosat Freedom Longlife 8 GB / 60 Hari', 'Data', 'INDOSAT', 'Freedom Longlife', 'TWIN Reload', '45000', 'FRDMLONGLIFE8GB60H', '1', '0', '1', '0', '0', '23:45', '0:15', '4 GB setiap bulan.', '2022-04-17 10:31:20'),
(66, 'P', 'PLN 5.000', 'PLN', 'PLN', 'Umum', 'APAYMENTS', '5700', 'PLN5rb', '1', '1', '1', '0', '1', '23:45', '0:30', 'masukkan nomor meter/id pelanggan', '2022-04-17 10:31:20'),
(67, 'P', 'PLN 100.000', 'PLN', 'PLN', 'Umum', 'Agen Pulsa Indonesia', '99025', 'PLN100rb', '1', '1', '1', '0', '0', '23:42', '0:45', 'masukkan nomor meter/id pelanggan', '2022-04-17 10:31:20'),
(68, 'P', 'PLN 1.000.000', 'PLN', 'PLN', 'Umum', 'Super Reload', '1000010', 'PLN1jt', '1', '1', '1', '0', '1', '0:0', '7:0', 'masukkan nomor meter/id pelanggan', '2022-04-17 10:31:20'),
(69, 'F', 'Indosat Freedom U JUMBO / 30 Hari', 'Data', 'INDOSAT', 'Freedom U', 'KR Lancar', '140450', 'FRDMUUNLI30H', '1', '1', '1', '0', '0', '23:45', '0:15', '60 GB Kuota Utama + Telepon 100 Menit + 100 SMS semua op + Unlimited Streaming + Unlimited Apps Belajar + Unlimited Telepon dan SMS ke sesama IM3, Berlaku 30 Hari', '2022-04-17 10:31:20'),
(70, 'P', 'PLN 15.000', 'PLN', 'PLN', 'Umum', 'APAYMENTS', '15700', 'PLN15rb', '1', '1', '1', '0', '1', '23:45', '0:30', 'masukkan nomor meter/id pelanggan', '2022-04-17 10:31:20'),
(71, 'P', 'PLN 20.000', 'PLN', 'PLN', 'Umum', 'Super Reload', '20010', 'PLN20rb', '1', '1', '1', '0', '1', '0:0', '7:0', 'masukkan nomor meter/id pelanggan', '2022-04-17 10:31:20'),
(72, 'P', 'PLN 50.000', 'PLN', 'PLN', 'Umum', 'Sofi reload', '49300', 'PLN50rb', '1', '0', '1', '0', '0', '23:45', '0:1', 'masukkan nomor meter/id pelanggan', '2022-04-17 10:31:20'),
(73, 'P', 'PLN 10.000', 'PLN', 'PLN', 'Umum', 'APAYMENTS', '10700', 'PLN10rb', '1', '1', '1', '0', '1', '23:45', '0:30', 'masukkan nomor meter/id pelanggan', '2022-04-17 10:31:20'),
(74, 'P', 'PLN 200.000', 'PLN', 'PLN', 'Umum', 'Super Reload', '200010', 'PLN200rb', '1', '1', '1', '0', '1', '0:0', '7:0', 'masukkan nomor meter/id pelanggan', '2022-04-17 10:31:20'),
(75, 'P', 'PLN 500.000', 'PLN', 'PLN', 'Umum', 'Super Reload', '500010', 'PLN500rb', '1', '1', '1', '0', '1', '0:0', '7:0', 'masukkan nomor meter/id pelanggan', '2022-04-17 10:31:20'),
(76, 'G', 'Go Pay 10.000', 'E-Money', 'GO PAY', 'Customer', 'PT MMBC TOUR AND TRAVEL', '10550', 'GPAY10K', '1', '1', '1', '0', '1', '23:15', '2:0', 'Masukan no HP', '2022-04-17 10:31:20'),
(77, 'G', 'Go Pay 15.000', 'E-Money', 'GO PAY', 'Customer', 'PT MMBC TOUR AND TRAVEL', '15550', 'GPAY15K', '1', '1', '1', '0', '1', '23:0', '1:0', 'Masukan no HP', '2022-04-17 10:31:20'),
(78, 'G', 'Go Pay 20.000', 'E-Money', 'GO PAY', 'Customer', 'PT MMBC TOUR AND TRAVEL', '20550', 'GPAY20K', '1', '1', '1', '0', '1', '23:15', '2:0', 'Masukan no HP', '2022-04-17 10:31:20'),
(79, 'G', 'Go Pay 25.000', 'E-Money', 'GO PAY', 'Customer', 'PT MMBC TOUR AND TRAVEL', '25550', 'GPAY25K', '1', '1', '1', '0', '1', '23:15', '2:0', 'Masukan no HP', '2022-04-17 10:31:20'),
(80, 'G', 'Go Pay 30.000', 'E-Money', 'GO PAY', 'Customer', 'PT MMBC TOUR AND TRAVEL', '30550', 'GPAY30K', '1', '1', '1', '0', '1', '23:0', '1:0', 'Masukan no HP', '2022-04-17 10:31:20'),
(81, 'G', 'Go Pay 35.000', 'E-Money', 'GO PAY', 'Customer', 'PT MMBC TOUR AND TRAVEL', '35550', 'GPAY35K', '1', '1', '1', '0', '1', '23:0', '1:0', 'Masukan no HP', '2022-04-17 10:31:20'),
(82, 'G', 'Go Pay 40.000', 'E-Money', 'GO PAY', 'Customer', 'PT MMBC TOUR AND TRAVEL', '40550', 'GPAY40K', '1', '1', '1', '0', '1', '23:0', '1:0', 'Masukan no HP', '2022-04-17 10:31:20'),
(83, 'G', 'Go Pay 50.000', 'E-Money', 'GO PAY', 'Customer', 'PT MMBC TOUR AND TRAVEL', '50550', 'GPAY50K', '1', '1', '1', '0', '1', '23:15', '2:0', 'Masukan no HP', '2022-04-17 10:31:20'),
(84, 'G', 'Go Pay 45.000', 'E-Money', 'GO PAY', 'Customer', 'PT MMBC TOUR AND TRAVEL', '45550', 'GPAY45K', '1', '1', '1', '0', '1', '23:0', '1:0', 'Masukan no HP', '2022-04-17 10:31:20'),
(85, 'G', 'Go Pay 55.000', 'E-Money', 'GO PAY', 'Customer', 'PT MMBC TOUR AND TRAVEL', '55550', 'GPAY55K', '1', '1', '1', '0', '1', '23:0', '1:0', 'Masukan no HP', '2022-04-17 10:31:20'),
(86, 'G', 'Go Pay 60.000', 'E-Money', 'GO PAY', 'Customer', 'PT MMBC TOUR AND TRAVEL', '60550', 'GPAY60K', '1', '1', '1', '0', '1', '23:0', '1:0', 'Masukkan no HP', '2022-04-17 10:31:20'),
(87, 'G', 'Go Pay 65.000', 'E-Money', 'GO PAY', 'Customer', 'PT MMBC TOUR AND TRAVEL', '65550', 'GPAY65K', '1', '1', '1', '0', '1', '23:0', '1:0', 'Masukkan no HP', '2022-04-17 10:31:20'),
(88, 'G', 'Go Pay 70.000', 'E-Money', 'GO PAY', 'Customer', 'PT MMBC TOUR AND TRAVEL', '70550', 'GPAY70K', '1', '1', '1', '0', '1', '23:0', '1:0', 'Masukan no HP', '2022-04-17 10:31:20'),
(89, 'G', 'Go Pay 75.000', 'E-Money', 'GO PAY', 'Customer', 'PT MMBC TOUR AND TRAVEL', '75550', 'GPAY75K', '1', '1', '1', '0', '1', '23:15', '2:0', 'Masukan no HP', '2022-04-17 10:31:20'),
(90, 'G', 'Go Pay 80.000', 'E-Money', 'GO PAY', 'Customer', 'PT MMBC TOUR AND TRAVEL', '80550', 'GPAY80K', '1', '1', '1', '0', '1', '23:0', '1:0', 'Masukkan no HP', '2022-04-17 10:31:20'),
(91, 'G', 'Go Pay 85.000', 'E-Money', 'GO PAY', 'Customer', 'PT MMBC TOUR AND TRAVEL', '85550', 'GPAY85K', '1', '1', '1', '0', '1', '23:0', '1:0', 'Masukkan no HP', '2022-04-17 10:31:20'),
(92, 'G', 'Go Pay 90.000', 'E-Money', 'GO PAY', 'Customer', 'PT MMBC TOUR AND TRAVEL', '90550', 'GPAY90K', '1', '1', '1', '0', '1', '23:0', '1:0', 'Masukkan no HP', '2022-04-17 10:31:20'),
(93, 'G', 'Go Pay 95.000', 'E-Money', 'GO PAY', 'Customer', 'PT MMBC TOUR AND TRAVEL', '95550', 'GPAY95K', '1', '1', '1', '0', '1', '23:0', '1:0', 'Masukkan no HP', '2022-04-17 10:31:20'),
(94, 'G', 'Go Pay 100.000', 'E-Money', 'GO PAY', 'Customer', 'PT MMBC TOUR AND TRAVEL', '100550', 'GPAY100K', '1', '1', '1', '0', '1', '23:15', '2:0', 'Masukan no HP', '2022-04-17 10:31:20'),
(95, 'G', 'Go Pay 150.000', 'E-Money', 'GO PAY', 'Customer', 'PT MMBC TOUR AND TRAVEL', '150550', 'GPAY150K', '1', '1', '1', '0', '1', '23:15', '2:0', 'Masukan no HP', '2022-04-17 10:31:20'),
(96, 'G', 'Go Pay 200.000', 'E-Money', 'GO PAY', 'Customer', 'PT MMBC TOUR AND TRAVEL', '200550', 'GPAY200K', '1', '1', '1', '0', '1', '23:15', '2:0', 'Masukan no HP', '2022-04-17 10:31:20'),
(97, 'G', 'Go Pay 250.000', 'E-Money', 'GO PAY', 'Customer', 'PT MMBC TOUR AND TRAVEL', '250550', 'GPAY250K', '1', '1', '1', '0', '1', '23:15', '2:0', 'Masukan no HP', '2022-04-17 10:31:20'),
(98, 'G', 'Go Pay 300.000', 'E-Money', 'GO PAY', 'Customer', 'Teladan Pulsa', '300610', 'GPAY300K', '1', '1', '1', '0', '0', '23:18', '0:18', 'Masukkan no HP', '2022-04-17 10:31:20'),
(99, 'G', 'Go Pay 350.000', 'E-Money', 'GO PAY', 'Customer', 'PT MMBC TOUR AND TRAVEL', '350550', 'GPAY350K', '1', '1', '1', '0', '1', '23:0', '1:0', 'Masukkan no HP', '2022-04-17 10:31:20'),
(100, 'G', 'Go Pay 400.000', 'E-Money', 'GO PAY', 'Customer', 'IMC PULSA', '400635', 'GPAY400K', '1', '1', '1', '0', '0', '23:45', '0:15', 'Masukkan no HP', '2022-04-17 10:31:20'),
(101, 'G', 'Go Pay 450.000', 'E-Money', 'GO PAY', 'Customer', 'PT MMBC TOUR AND TRAVEL', '450550', 'GPAY450K', '1', '1', '1', '0', '1', '23:0', '1:0', 'Masukkan no HP', '2022-04-17 10:31:20'),
(102, 'G', 'Go Pay 600.000', 'E-Money', 'GO PAY', 'Customer', 'PT MMBC TOUR AND TRAVEL', '600550', 'GPAY600K', '1', '1', '1', '0', '1', '23:0', '1:0', 'Masukan no HP', '2022-04-17 10:31:20'),
(103, 'G', 'Go Pay 500.000', 'E-Money', 'GO PAY', 'Customer', 'PT MMBC TOUR AND TRAVEL', '500550', 'GPAY500K', '1', '1', '1', '0', '1', '23:15', '2:0', 'Masukan no HP', '2022-04-17 10:31:20'),
(104, 'G', 'Go Pay 700.000', 'E-Money', 'GO PAY', 'Customer', 'PT MMBC TOUR AND TRAVEL', '700550', 'GPAY700K', '1', '1', '1', '0', '1', '23:0', '1:0', 'Masukan No hp', '2022-04-17 10:31:20'),
(105, 'G', 'Go Pay 800.000', 'E-Money', 'GO PAY', 'Customer', 'PT MMBC TOUR AND TRAVEL', '800550', 'GPAY800K', '1', '1', '1', '0', '1', '23:0', '1:0', 'Masukan no hp', '2022-04-17 10:31:20'),
(106, 'G', 'Go Pay 900.000', 'E-Money', 'GO PAY', 'Customer', 'PT MMBC TOUR AND TRAVEL', '900550', 'GPAY900K', '1', '1', '1', '0', '1', '23:0', '1:0', 'Masukan no hp', '2022-04-17 10:31:20'),
(107, 'G', 'Go Pay 1.000.000', 'E-Money', 'GO PAY', 'Customer', 'PT MMBC TOUR AND TRAVEL', '1000550', 'GPAY1000K', '1', '1', '1', '0', '1', '23:15', '2:0', 'Masukan no HP', '2022-04-17 10:31:20'),
(108, 'M', 'Mandiri E-Toll 10.000', 'E-Money', 'MANDIRI E-TOLL', 'Umum', 'Digital Komunika', '10850', 'MandiriE-Toll10k', '0', '1', '1', '0', '1', '23:30', '2:0', 'Wajib update saldo setelah pengisian sukses.', '2022-04-17 10:31:20'),
(109, 'M', 'Mandiri E-Toll 20.000', 'E-Money', 'MANDIRI E-TOLL', 'Umum', 'Teladan Pulsa', '20375', 'MandiriE-Toll20k', '1', '1', '1', '0', '0', '23:45', '0:15', 'Wajib update saldo setelah pengisian sukses.', '2022-04-17 10:31:20'),
(110, 'M', 'Mandiri E-Toll 30.000', 'E-Money', 'MANDIRI E-TOLL', 'Umum', 'MARKAZ', '30975', 'MandiriE-Toll30k', '0', '1', '1', '0', '1', '23:45', '1:0', 'Wajib update saldo setelah pengisian sukses.', '2022-04-17 10:31:20'),
(111, 'M', 'Mandiri E-Toll 75.000', 'E-Money', 'MANDIRI E-TOLL', 'Umum', 'Teladan Pulsa', '75375', 'MandiriE-Toll75k', '1', '1', '1', '0', '0', '23:45', '0:15', 'Wajib update saldo setelah pengisian sukses.', '2022-04-17 10:31:20'),
(112, 'M', 'Mandiri E-Toll 50.000', 'E-Money', 'MANDIRI E-TOLL', 'Umum', 'Teladan Pulsa', '50375', 'MandiriE-Toll50k', '1', '1', '1', '0', '0', '23:45', '0:15', 'Wajib update saldo setelah pengisian sukses.', '2022-04-17 10:31:20'),
(113, 'M', 'Mandiri E-Toll 25.000', 'E-Money', 'MANDIRI E-TOLL', 'Umum', 'Teladan Pulsa', '25375', 'MandiriE-Toll25k', '1', '1', '1', '0', '0', '23:45', '0:15', 'Wajib update saldo setelah pengisian sukses.', '2022-04-17 10:31:20'),
(114, 'M', 'Mandiri E-Toll 100.000', 'E-Money', 'MANDIRI E-TOLL', 'Umum', 'Teladan Pulsa', '100375', 'MandiriE-Toll100k', '1', '1', '1', '0', '0', '23:45', '0:15', 'Wajib update saldo setelah pengisian sukses.', '2022-04-17 10:31:20'),
(115, 'M', 'Mandiri E-Toll 150.000', 'E-Money', 'MANDIRI E-TOLL', 'Umum', 'Teladan Pulsa', '150375', 'MandiriE-Toll150k', '1', '1', '1', '0', '0', '23:45', '0:15', 'Wajib update saldo setelah pengisian sukses.', '2022-04-17 10:31:20'),
(116, 'M', 'Mandiri E-Toll 200.000', 'E-Money', 'MANDIRI E-TOLL', 'Umum', 'Teladan Pulsa', '200375', 'MandiriE-Toll200k', '1', '1', '1', '0', '0', '23:45', '0:15', 'Wajib update saldo setelah pengisian sukses.', '2022-04-17 10:31:20'),
(117, 'M', 'Mandiri E-Toll 250.000', 'E-Money', 'MANDIRI E-TOLL', 'Umum', 'Teladan Pulsa', '250375', 'MandiriE-Toll250k', '1', '1', '1', '0', '0', '23:45', '0:15', 'Wajib update saldo setelah pengisian sukses.', '2022-04-17 10:31:20'),
(118, 'M', 'Mandiri E-Toll 300.000', 'E-Money', 'MANDIRI E-TOLL', 'Umum', 'Teladan Pulsa', '300375', 'MandiriE-Toll300k', '1', '1', '1', '0', '0', '23:45', '0:15', 'Wajib update saldo setelah pengisian sukses.', '2022-04-17 10:31:20'),
(119, 'M', 'Mandiri E-Toll 400.000', 'E-Money', 'MANDIRI E-TOLL', 'Umum', 'GO RELOAD ID', '400675', 'MandiriE-Toll400k', '0', '1', '1', '0', '1', '23:30', '0:30', 'Wajib update saldo setelah pengisian sukses.', '2022-04-17 10:31:20'),
(120, 'M', 'Mandiri E-Toll 500.000', 'E-Money', 'MANDIRI E-TOLL', 'Umum', 'GO RELOAD ID', '500675', 'MandiriE-Toll500k', '0', '1', '1', '0', '1', '23:30', '0:30', 'Wajib update saldo setelah pengisian sukses.', '2022-04-17 10:31:20'),
(121, 'S', 'SHOPEE PAY 9.500', 'E-Money', 'SHOPEE PAY', 'Umum', 'LOVER RELOAD', '10250', 'SPAY9.5K', '0', '1', '1', '0', '1', '23:45', '0:15', 'SHOPEE PAY 9.500', '2022-04-17 10:31:20'),
(122, 'S', 'SHOPEE PAY 10.000', 'E-Money', 'SHOPEE PAY', 'Umum', 'PT MMBC TOUR AND TRAVEL', '10200', 'SPAYK10K', '0', '1', '1', '0', '1', '23:15', '1:15', 'SHOPEE PAY 10.000', '2022-04-17 10:31:20'),
(123, 'S', 'SHOPEE PAY 14.500', 'E-Money', 'SHOPEE PAY', 'Umum', 'LOVER RELOAD', '15250', 'SPAY14.5K', '0', '1', '1', '0', '1', '23:45', '18:45', 'SHOPEE PAY 14.500', '2022-04-17 10:31:20'),
(124, 'S', 'SHOPEE PAY 15.000', 'E-Money', 'SHOPEE PAY', 'Umum', 'MAXPULSA', '15075', 'SPAY15K', '0', '0', '1', '0', '1', '23:40', '0:20', 'SHOPEE PAY 15.000', '2022-04-17 10:31:20'),
(125, 'S', 'SHOPEE PAY 19.500', 'E-Money', 'SHOPEE PAY', 'Umum', 'LOVER RELOAD', '20250', 'SPAY19.5K', '0', '1', '1', '0', '1', '23:45', '0:15', 'SHOPEE PAY 19.500', '2022-04-17 10:31:20'),
(126, 'S', 'SHOPEE PAY 20.000', 'E-Money', 'SHOPEE PAY', 'Umum', 'MAXPULSA', '20075', 'SPAYK20K', '0', '0', '1', '0', '1', '23:40', '0:20', 'SHOPEE PAY 20.000', '2022-04-17 10:31:20'),
(127, 'S', 'SHOPEE PAY 24.500', 'E-Money', 'SHOPEE PAY', 'Umum', 'LOVER RELOAD', '25250', 'SPAY24.5K', '0', '1', '1', '0', '1', '23:45', '0:15', 'SHOPEE PAY 24.500', '2022-04-17 10:31:20'),
(128, 'S', 'SHOPEE PAY 25.000', 'E-Money', 'SHOPEE PAY', 'Umum', 'MAXPULSA', '25075', 'SPAY25K', '0', '0', '1', '0', '1', '23:40', '0:20', 'SHOPEE PAY 25.000', '2022-04-17 10:31:20'),
(129, 'T', 'Tapcash BNI 10.000', 'E-Money', 'TAPCASH BNI', 'Umum', 'BCA PULSA', '10500', 'TapcashBNI10k', '0', '1', '1', '0', '1', '23:45', '0:15', 'Tapcash BNI 10.000. Wajib update saldo setelah pengisian sukses.', '2022-04-17 10:31:20'),
(130, 'S', 'SHOPEE PAY 29.500', 'E-Money', 'SHOPEE PAY', 'Umum', 'LOVER RELOAD', '30250', 'SPAY29.5K', '0', '1', '1', '0', '1', '23:45', '0:15', 'SHOPEE PAY 29.500', '2022-04-17 10:31:20'),
(131, 'T', 'Tapcash BNI 20.000', 'E-Money', 'TAPCASH BNI', 'Umum', 'BCA PULSA', '20500', 'TapcashBNI20k', '0', '1', '1', '0', '1', '23:45', '0:15', 'Tapcash BNI 20.000. Wajib update saldo setelah pengisian sukses.', '2022-04-17 10:31:20'),
(132, 'T', 'Tapcash BNI 100.000', 'E-Money', 'TAPCASH BNI', 'Umum', 'BCA PULSA', '100500', 'TapcashBNI100k', '0', '1', '1', '0', '1', '23:45', '0:15', 'Tapcash BNI 100.000. Wajib update saldo setelah pengisian sukses.', '2022-04-17 10:31:20'),
(133, 'T', 'Tapcash BNI 50.000', 'E-Money', 'TAPCASH BNI', 'Umum', 'BCA PULSA', '50500', 'TapcashBNI50k', '0', '1', '1', '0', '1', '23:45', '0:15', 'Tapcash BNI 50.000. Wajib update saldo setelah pengisian sukses.', '2022-04-17 10:31:20'),
(134, 'T', 'Tapcash BNI 250.000', 'E-Money', 'TAPCASH BNI', 'Umum', 'CV Atlanta Maju Jaya', '250525', 'TapcashBNI250k', '0', '1', '1', '0', '1', '0:0', '0:0', 'Tapcash BNI 250.000. Wajib update saldo setelah pengisian sukses.', '2022-04-17 10:31:20'),
(135, 'T', 'Tapcash BNI 500.000', 'E-Money', 'TAPCASH BNI', 'Umum', 'CV Atlanta Maju Jaya', '500525', 'TapcashBNI500k', '0', '1', '1', '0', '1', '0:0', '0:0', 'Tapcash BNI 500.000. Wajib update saldo setelah pengisian sukses.', '2022-04-17 10:31:20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `unique_id` varchar(200) DEFAULT NULL,
  `username` varchar(200) DEFAULT NULL,
  `apikey_dev` varchar(200) DEFAULT NULL,
  `apikey_prod` varchar(200) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `unique_id`, `username`, `apikey_dev`, `apikey_prod`, `status`) VALUES
(1, '001', 'abc', 'qwe', 'asd', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userid` (`userid`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
