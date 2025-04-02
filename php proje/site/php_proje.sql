-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 17 Ara 2024, 11:54:22
-- Sunucu sürümü: 5.7.17
-- PHP Sürümü: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `php_proje`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'admin', 'admin123', '2024-12-16 10:40:53');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanicilar`
--

CREATE TABLE `kullanicilar` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `kullanicilar`
--

INSERT INTO `kullanicilar` (`id`, `username`, `password`, `email`) VALUES
(1, 'ahmet', '$2y$10$CWFSWdz3Tie6Y6XWkvpkgOeO2XCj7m.XXxjzkGILmjgHNEQX9M..a', 'ahmetm1907@hotmail.com'),
(2, 'hikmet', '$2y$10$UdS/mLQjxSlUUybSOeuLD./qjruQuvkk0dEAZRCOgvRt7EGyXFwKu', 'hikmet@hotmail.com'),
(3, 'messi', '$2y$10$h0Vt4jQSakv9fTyaWQQHduh5zpeTq50rlIYoe2Vaz6e0wOXrQPz/W', 'messi@hotmail.com'),
(4, 'umut', '$2y$10$rWwFA9lGqVCsOiy8QuxQ5.KNn4GnXvAkta2c/i50k.uM20TdUQp8y', 'umut@hotmail.com'),
(5, 'kaÄŸan', '$2y$10$uqgRtHDi5EDRaqMYCezk/elj20MU6HivzdgPv6a7Y9ksB9B/xs5/.', 'kaganarslangorur@hotmail.com'),
(6, 'talha', '$2y$10$oWQgpnL2ZpCbjAEe3IxNu./V24HdBjgIY441r/DQzkNEGi7Uhq2vO', 'talha@hotmail.com'),
(7, 'ogi', '$2y$10$W2whr5Q58vE889BVHOfEw.De2maEykdtVqS7AKmg11AHOTrnlTbbC', 'ogi@hotmail.com');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `rezervasyonlar`
--

CREATE TABLE `rezervasyonlar` (
  `id` int(11) NOT NULL,
  `kullanici_id` int(11) DEFAULT NULL,
  `ad_soyad` varchar(255) DEFAULT NULL,
  `giris_tarihi` date DEFAULT NULL,
  `cikis_tarihi` date DEFAULT NULL,
  `oda_turu` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `rezervasyonlar`
--

INSERT INTO `rezervasyonlar` (`id`, `kullanici_id`, `ad_soyad`, `giris_tarihi`, `cikis_tarihi`, `oda_turu`, `created_at`) VALUES
(4, 5, 'ahmet', '2024-12-18', '2025-01-01', 'suit', '2024-12-16 11:10:34'),
(9, 2, 'hikmet', '2024-12-19', '2025-03-01', 'cift_kisilik', '2024-12-16 11:14:55'),
(12, 7, 'OÄŸuz', '2025-06-10', '2025-06-21', 'king_suit', '2024-12-17 10:51:07'),
(8, 1, 'ahmet', '2024-12-18', '2025-02-20', 'king_suit', '2024-12-16 11:14:12'),
(11, 6, 'Talha ÅžiÅŸman', '2024-12-20', '2025-01-01', 'cift_kisilik', '2024-12-17 10:38:18');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Tablo için indeksler `kullanicilar`
--
ALTER TABLE `kullanicilar`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Tablo için indeksler `rezervasyonlar`
--
ALTER TABLE `rezervasyonlar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kullanici_id` (`kullanici_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Tablo için AUTO_INCREMENT değeri `kullanicilar`
--
ALTER TABLE `kullanicilar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Tablo için AUTO_INCREMENT değeri `rezervasyonlar`
--
ALTER TABLE `rezervasyonlar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
