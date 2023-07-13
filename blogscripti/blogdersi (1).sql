-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2023 at 05:33 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blogdersi`
--

-- --------------------------------------------------------

--
-- Table structure for table `aboneler`
--

CREATE TABLE `aboneler` (
  `id` int(11) NOT NULL,
  `abone_mail` varchar(200) NOT NULL,
  `abone_tarih` timestamp NOT NULL DEFAULT current_timestamp(),
  `abone_ip` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ayarlar`
--

CREATE TABLE `ayarlar` (
  `id` int(11) NOT NULL,
  `site_url` varchar(200) NOT NULL,
  `site_baslik` varchar(200) NOT NULL,
  `site_keyw` varchar(260) NOT NULL,
  `site_desc` varchar(260) NOT NULL,
  `site_harita` varchar(500) NOT NULL,
  `site_mail` varchar(250) NOT NULL,
  `site_logo` varchar(200) NOT NULL,
  `site_favicon` varchar(200) NOT NULL,
  `google_dogrulama_kodu` varchar(200) NOT NULL,
  `yandex_doğrulama_kodu` varchar(200) NOT NULL,
  `bing_dogrulama_kodu` varchar(200) NOT NULL,
  `analiytcs_kodu` mediumtext NOT NULL,
  `site_durum` int(1) NOT NULL,
  `harita_durum` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ayarlar`
--

INSERT INTO `ayarlar` (`id`, `site_url`, `site_baslik`, `site_keyw`, `site_desc`, `site_harita`, `site_mail`, `site_logo`, `site_favicon`, `google_dogrulama_kodu`, `yandex_doğrulama_kodu`, `bing_dogrulama_kodu`, `analiytcs_kodu`, `site_durum`, `harita_durum`) VALUES
(1, 'http://localhost/blogsitesi', 'TEST', 'Açıklama', 'Anahtar', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d100905.58888569917!2d28.99924480820201!3d37.78301673539692!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14c73fb1353a6a69%3A0x2e3363fee62068ae!2zRGVuaXpsaSwgS3Vta8Sxc8SxaywgRGVuaXpsaQ!5e0!3m2!1str!2str!4v1681585051395!5m2!1str!2str', 'TEST', '61158863140d0fca631317758ca6e0f2.webp', '9757c6423c9553c571670905c3275bdf.webp', '1', '2', '3', '4', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kategoriler`
--

CREATE TABLE `kategoriler` (
  `id` int(11) NOT NULL,
  `kat_adi` varchar(200) NOT NULL,
  `kat_sef` varchar(200) NOT NULL,
  `kat_keyw` varchar(260) NOT NULL,
  `kat_desc` varchar(260) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategoriler`
--

INSERT INTO `kategoriler` (`id`, `kat_adi`, `kat_sef`, `kat_keyw`, `kat_desc`) VALUES
(12, 'Yeni Kategori', 'yeni-kategori', 'Yeni,Kategori', 'Yeni Kategori Açıklaması');

-- --------------------------------------------------------

--
-- Table structure for table `mesajlar`
--

CREATE TABLE `mesajlar` (
  `id` int(11) NOT NULL,
  `isim` varchar(200) NOT NULL,
  `konu` varchar(200) NOT NULL,
  `eposta` varchar(200) NOT NULL,
  `mesaj` text NOT NULL,
  `tarih` timestamp NOT NULL DEFAULT current_timestamp(),
  `durum` tinyint(1) NOT NULL DEFAULT 2,
  `ip` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mesajlar`
--

INSERT INTO `mesajlar` (`id`, `isim`, `konu`, `eposta`, `mesaj`, `tarih`, `durum`, `ip`) VALUES
(6, 'Halit Ergül', 'Deneme', 'deneme@gmail.com', 'aa', '2023-05-23 18:34:22', 1, '::1'),
(7, 'Halit Ergül', 'asd', 'admin@admin.com', 'aaaaaaaa', '2023-05-23 19:07:45', 1, '::1');

-- --------------------------------------------------------

--
-- Table structure for table `sosyalmedya`
--

CREATE TABLE `sosyalmedya` (
  `id` int(11) NOT NULL,
  `ikon` varchar(200) NOT NULL,
  `link` varchar(200) NOT NULL,
  `durum` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sosyalmedya`
--

INSERT INTO `sosyalmedya` (`id`, `ikon`, `link`, `durum`) VALUES
(2, 'instagram', 'instagramlink', 1),
(3, 'twitter', 'twitterlink', 1),
(4, 'linkedin', 'linkedinlink', 1),
(5, 'tumblr', 'tumblr.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `yazilar`
--

CREATE TABLE `yazilar` (
  `yazi_id` int(11) NOT NULL,
  `yazi_kat_id` int(11) NOT NULL,
  `yazi_baslik` varchar(250) NOT NULL,
  `yazi_sef` varchar(250) NOT NULL,
  `yazi_resim` varchar(250) NOT NULL,
  `yazi_icerik` text NOT NULL,
  `yazi_etiketler` varchar(250) NOT NULL,
  `yazi_sef_etiketler` varchar(250) NOT NULL,
  `yazi_tarih` timestamp NOT NULL DEFAULT current_timestamp(),
  `yazi_durum` tinyint(1) NOT NULL DEFAULT 1,
  `yazi_goruntulenme` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `yazilar`
--

INSERT INTO `yazilar` (`yazi_id`, `yazi_kat_id`, `yazi_baslik`, `yazi_sef`, `yazi_resim`, `yazi_icerik`, `yazi_etiketler`, `yazi_sef_etiketler`, `yazi_tarih`, `yazi_durum`, `yazi_goruntulenme`) VALUES
(37, 12, 'TEST', 'test', 'd2a01bec96ce95a4db290ca0fc8c4b0a.webp', '<p><em>TEST</em></p>\r\n', 'TEST,TEST', 'test,test', '2023-05-26 16:39:43', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `yoneticiler`
--

CREATE TABLE `yoneticiler` (
  `id` int(11) NOT NULL,
  `kadi` varchar(200) NOT NULL,
  `eposta` varchar(200) NOT NULL,
  `sifre` varchar(200) NOT NULL,
  `sonip` varchar(200) NOT NULL,
  `sontarih` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `yoneticiler`
--

INSERT INTO `yoneticiler` (`id`, `kadi`, `eposta`, `sifre`, `sonip`, `sontarih`) VALUES
(1, 'Halit Ergül', 'halitergul18@gmail.com', 'adcd7048512e64b48da55b027577886ee5a36350', '::1', '2023-07-13 18:29:18');

-- --------------------------------------------------------

--
-- Table structure for table `yorumlar`
--

CREATE TABLE `yorumlar` (
  `id` int(11) NOT NULL,
  `yorum_yazi_id` int(11) NOT NULL,
  `yorum_isim` varchar(200) NOT NULL,
  `yorum_eposta` varchar(200) NOT NULL,
  `yorum_icerik` text NOT NULL,
  `yorum_tarih` timestamp NOT NULL DEFAULT current_timestamp(),
  `yorum_durum` tinyint(1) NOT NULL DEFAULT 2,
  `yorum_ip` varchar(255) NOT NULL,
  `yorum_website` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aboneler`
--
ALTER TABLE `aboneler`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ayarlar`
--
ALTER TABLE `ayarlar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategoriler`
--
ALTER TABLE `kategoriler`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mesajlar`
--
ALTER TABLE `mesajlar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sosyalmedya`
--
ALTER TABLE `sosyalmedya`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `yazilar`
--
ALTER TABLE `yazilar`
  ADD PRIMARY KEY (`yazi_id`);

--
-- Indexes for table `yoneticiler`
--
ALTER TABLE `yoneticiler`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `yorumlar`
--
ALTER TABLE `yorumlar`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aboneler`
--
ALTER TABLE `aboneler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ayarlar`
--
ALTER TABLE `ayarlar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kategoriler`
--
ALTER TABLE `kategoriler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `mesajlar`
--
ALTER TABLE `mesajlar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sosyalmedya`
--
ALTER TABLE `sosyalmedya`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `yazilar`
--
ALTER TABLE `yazilar`
  MODIFY `yazi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `yoneticiler`
--
ALTER TABLE `yoneticiler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `yorumlar`
--
ALTER TABLE `yorumlar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
