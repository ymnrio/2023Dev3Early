-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2023-05-23 04:10:24
-- サーバのバージョン： 10.4.24-MariaDB
-- PHP のバージョン: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- データベース: `yamatter`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `favorite genre`
--

CREATE TABLE `favorite genre` (
  `user_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL,
  `genre_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `favorite post`
--

CREATE TABLE `favorite post` (
  `like_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `like_subject` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `genre`
--

CREATE TABLE `genre` (
  `genre_id` int(11) NOT NULL,
  `genre_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `genre`
--

INSERT INTO `genre` (`genre_id`, `genre_name`) VALUES
(1, 'JPOP'),
(2, '洋楽'),
(3, 'アニソン'),
(4, 'クラシック'),
(5, 'ロック'),
(6, 'VOCALOID'),
(7, 'ギター'),
(8, '楽器'),
(9, 'その他');

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
  `media2` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `reply`
--

CREATE TABLE `reply` (
  `reply_id` int(11) NOT NULL,
  `reply_subject` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `reply_contents` varchar(200) NOT NULL,
  `date_time` datetime NOT NULL,
  `fabulous` int(11) NOT NULL,
  `comments` int(11) NOT NULL,
  `media1` longblob DEFAULT NULL,
  `media2` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `favorite genre`
--
ALTER TABLE `favorite genre`
  ADD UNIQUE KEY `a` (`user_id`,`genre_id`);

--
-- テーブルのインデックス `favorite post`
--
ALTER TABLE `favorite post`
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
-- テーブルの AUTO_INCREMENT `favorite post`
--
ALTER TABLE `favorite post`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `genre`
--
ALTER TABLE `genre`
  MODIFY `genre_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- テーブルの AUTO_INCREMENT `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `reply`
--
ALTER TABLE `reply`
  MODIFY `reply_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;
