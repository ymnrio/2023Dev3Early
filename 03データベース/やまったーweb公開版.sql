-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2023 年 7 月 25 日 01:11
-- サーバのバージョン： 10.4.27-MariaDB
-- PHP のバージョン: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `yamatter`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `favorite_genre`
--

CREATE TABLE `favorite_genre` (
  `user_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL,
  `genre_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- テーブルのデータのダンプ `favorite_genre`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `favorite_post`
--

CREATE TABLE `favorite_post` (
  `like_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `like_subject` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- テーブルのデータのダンプ `favorite_post`
--


-- --------------------------------------------------------

--
-- テーブルの構造 `genre`
--

CREATE TABLE `genre` (
  `genre_id` int(11) NOT NULL,
  `genre_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- テーブルのデータのダンプ `genre`
--

INSERT INTO `genre` (`genre_id`, `genre_name`) VALUES
(1, 'すべて'),
(2, 'JPOP'),
(3, '洋楽'),
(4, 'アニソン'),
(5, 'クラシック'),
(6, 'ロック'),
(7, 'VOCALOID'),
(8, 'ギター'),
(9, '楽器'),
(10, 'その他');

-- --------------------------------------------------------

--
-- テーブルの構造 `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL,
  `post_contents` varchar(200) NOT NULL,
  `date_time` datetime NOT NULL,
  `fabulous` int(11) NOT NULL,
  `comments` int(11) NOT NULL,
  `media1` longblob DEFAULT NULL,
  `media2` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
-- --------------------------------------------------------

--
-- テーブルの構造 `reply`
--

CREATE TABLE `reply` (
  `reply_id` varchar(50) NOT NULL,
  `reply_subject` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `reply_contents` varchar(200) NOT NULL,
  `date_time` datetime NOT NULL,
  `fabulous` int(11) NOT NULL,
  `comments` int(11) NOT NULL,
  `media1` longblob DEFAULT NULL,
  `media2` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- テーブルのデータのダンプ `reply`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(10) NOT NULL,
  `email_address` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `media` longblob DEFAULT NULL,
  `self_introduction` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- テーブルのデータのダンプ `user`
--
--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `favorite_post`
--
ALTER TABLE `favorite_post`
  ADD PRIMARY KEY (`like_id`);

--
-- テーブルのインデックス `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`genre_id`);

--
-- テーブルのインデックス `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- テーブルのインデックス `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`reply_id`);

--
-- テーブルのインデックス `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `favorite_post`
--
ALTER TABLE `favorite_post`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- テーブルの AUTO_INCREMENT `genre`
--
ALTER TABLE `genre`
  MODIFY `genre_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- テーブルの AUTO_INCREMENT `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- テーブルの AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
