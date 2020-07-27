-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2019 年 11 月 06 日 01:42
-- サーバのバージョン： 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sangijidokandb`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '職員番号',
  `userid` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ユーザID',
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'パスワード',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- テーブルのデータのダンプ `admin`
--

INSERT INTO `admin` (`id`, `userid`, `password`) VALUES
(1, 'sangijidokan', '23605d6916a155db1e33f6b542aa9cbd6bb203b0');

-- --------------------------------------------------------

--
-- テーブルの構造 `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '書籍番号',
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT '書籍名',
  `author` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT '作者',
  `publisher` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT '出版社',
  `issue` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT '発行日',
  `page` int(11) NOT NULL COMMENT 'ページ数',
  `age` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT '対象年齢',
  `description` text COLLATE utf8_unicode_ci NOT NULL COMMENT '説明文',
  `cover` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT '表紙画像',
  `pdf` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT '書籍PDF',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- テーブルのデータのダンプ `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `publisher`, `issue`, `page`, `age`, `description`, `cover`, `pdf`) VALUES
(1, '小ぐまのきょうだいのクリスマスイブ', 'ぷっちょんです', 'みらい情報出版', '2019/05/03', 25, '3〜5歳', 'クリスマスの心温まるお話です。', 'kogumanokyoudainokurisumasu.png', 'kogumanokyoudainokurisumasu.pdf'),
(2, 'ちょっちおねがい', '日向あい', 'みらい情報出版', '2019/05/04', 18, '4〜6歳', 'ペットの大切さについて、もう一度考えてみませんか？', 'chocchionegai.png', 'chocchionegai.pdf'),
(7, 'ボクは走りたい', '静岡太郎', 'みらい情報出版', '2019/05/05', 18, '6〜8歳', 'ペットの大切さを描いたお話です。\r\nペットも大事な家族です。', 'bokuhahashiritai.png', 'bokuhahashiritai.pdf'),
(8, 'みならいほあんかん', 'kanac', '産技出版', '2010/09/11', 22, '4〜6歳', 'うさぎのほあんかんのはなし。\r\nおもしろいよ。', 'minaraihoankan.png', 'minaraihoankan.pdf'),
(9, 'へんしんママ', '谷口圭', '産技出版', '2019/07/08', 15, '4〜6歳', 'ママがへんしんします。\r\nぜひ読んでください。', 'henshinmama.png', 'henshinmama.pdf'),
(10, 'かぼちゃのおばけ', '吉田', '吉田出版', '2019/10/11', 35, '6歳', 'かぼちゃの本です。', 'kabochanoobake.png', 'kabochanoobake.pdf');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
