-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2020 年 7 月 09 日 16:06
-- サーバのバージョン： 10.4.11-MariaDB
-- PHP のバージョン: 7.3.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `gsacf_d06_04`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `sachiko`
--

CREATE TABLE `sachiko` (
  `No` int(20) NOT NULL,
  `todo` varchar(200) NOT NULL,
  `today` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `latitude` varchar(20) NOT NULL,
  `longitude` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `sachiko`
--

INSERT INTO `sachiko` (`No`, `todo`, `today`, `latitude`, `longitude`) VALUES
(7, 'てすと', '2020-07-08 15:07:00', '33.5796547', '130.4005603'),
(8, 'test', '2020-07-09 14:17:00', '', ''),
(9, 'test', '2020-07-09 14:17:00', '33.57519011717882', '130.40790796279907'),
(10, '県知事公舎', '2020-07-09 13:27:00', '33.57622701703072', '130.4070121049881');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `sachiko`
--
ALTER TABLE `sachiko`
  ADD PRIMARY KEY (`No`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `sachiko`
--
ALTER TABLE `sachiko`
  MODIFY `No` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
