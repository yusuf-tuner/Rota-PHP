-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 28 Kas 2020, 18:19:20
-- Sunucu sürümü: 5.7.17-log
-- PHP Sürümü: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `rota`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `musteri`
--

CREATE TABLE `musteri` (
  `musteri_id` int(10) NOT NULL,
  `musteri_ad` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `musteri_soyad` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `musteri_tc` int(11) NOT NULL,
  `musteri_adres` varchar(1000) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `musteri_mail` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `musteri_no` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `musteri`
--

INSERT INTO `musteri` (`musteri_id`, `musteri_ad`, `musteri_soyad`, `musteri_tc`, `musteri_adres`, `musteri_mail`, `musteri_no`) VALUES
(8, 'mehmet', 'yurtseven', 12345678, 'istanbul fatih', 'mehmet@gmail.com', 545487111),
(9, 'ilknur', 'kılıc', 65656565, 'izmir boztepe', 'ilknur@gmail.com', 123456788),
(10, 'osman', 'mehmet', 4578111, 'İstanbul', 'osman@gmail.com', 1234555),
(12, 'Elif Nur', 'BayrakNur', 1234567891, 'istanbul Kartal', 'elif@gmail.com', 12345678),
(15, 'mahmut', 'aslanboğa', 123456, 'istanbul', 'mahmut@gmail.com', 456781),
(16, 'adem', 'adem', 123, '123adem', 'adem@gmail.com', 1234),
(20, 'mehmet', 'günsur', 695550012, 'istanbul', 'mehmet@gmail.com', 123456789);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `siparis`
--

CREATE TABLE `siparis` (
  `siparis_id` int(11) NOT NULL,
  `siparis_no` int(5) NOT NULL,
  `siparis_tarih` date NOT NULL,
  `urun_ad` varchar(50) NOT NULL,
  `urun_fiyat` varchar(5) NOT NULL,
  `urun_adet` varchar(5) NOT NULL,
  `musteri_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `siparis`
--

INSERT INTO `siparis` (`siparis_id`, `siparis_no`, `siparis_tarih`, `urun_ad`, `urun_fiyat`, `urun_adet`, `musteri_id`) VALUES
(16, 20, '2019-08-01', 'karpuz tabağı', '30', '5', 12),
(20, 21, '2015-02-02', 'kremalı pasta', '20', '1', 9),
(21, 25, '2018-03-03', 'künefe tatlısı', '30', '2', 15),
(23, 25, '2012-01-01', 'baklava', '25', '2', 7),
(25, 1, '2019-01-01', 'künefe', '1', '1', 17),
(29, 5, '2215-05-05', 'tatlı', '5', '5', 16);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `musteri`
--
ALTER TABLE `musteri`
  ADD PRIMARY KEY (`musteri_id`);

--
-- Tablo için indeksler `siparis`
--
ALTER TABLE `siparis`
  ADD PRIMARY KEY (`siparis_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `musteri`
--
ALTER TABLE `musteri`
  MODIFY `musteri_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- Tablo için AUTO_INCREMENT değeri `siparis`
--
ALTER TABLE `siparis`
  MODIFY `siparis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
