-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2023 年 1 月 20 日 03:17
-- サーバのバージョン： 10.4.21-MariaDB
-- PHP のバージョン: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `gs_php05_submit`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_user_table`
--

CREATE TABLE `gs_user_table` (
  `id` int(12) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `lid` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `lpw` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `kanri_flg` int(1) NOT NULL,
  `life_flg` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_user_table`
--

INSERT INTO `gs_user_table` (`id`, `name`, `lid`, `lpw`, `kanri_flg`, `life_flg`) VALUES
(1, 'テスト１管理者', 'test1', '$2y$10$amJsJbnjco8Gyz9bytkawOgWcKDu2PC/hf6daAkGYFZ35nmoq1ETu', 1, 0),
(2, 'テスト2一般', 'test2', '$2y$10$Jrod7Xts/VPa0ThZhT33AedMO7D2rHLA.qqDLqYGvimBqsP5Xliia', 0, 0),
(3, 'テスト３', 'test3', '$2y$10$hT8NciYWQ3.lO0QLfz1UHOySxqHYFVN3f3p2tTLQKiIgw0kBvO6g.', 0, 0);

-- --------------------------------------------------------

--
-- テーブルの構造 `match_list`
--

CREATE TABLE `match_list` (
  `id` int(12) NOT NULL,
  `nickname` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `age` int(12) DEFAULT NULL,
  `summary` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `occupation` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `workplace` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `annual_income` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `latest_academic_background` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `former_school` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `desire_for_marriage` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `marital_history` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `children` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birthplace` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `height` int(12) DEFAULT NULL,
  `figure` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `how_we_met` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_contact` date NOT NULL,
  `first_contact` date NOT NULL,
  `first_date_place` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `value_1` int(12) DEFAULT NULL,
  `value_2` int(12) DEFAULT NULL,
  `value_3` int(12) DEFAULT NULL,
  `value_4` int(12) DEFAULT NULL,
  `img` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '画像のパス'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `match_list`
--

INSERT INTO `match_list` (`id`, `nickname`, `name`, `age`, `summary`, `occupation`, `workplace`, `annual_income`, `latest_academic_background`, `former_school`, `desire_for_marriage`, `marital_history`, `children`, `birthplace`, `height`, `figure`, `how_we_met`, `last_contact`, `first_contact`, `first_date_place`, `value_1`, `value_2`, `value_3`, `value_4`, `img`) VALUES
(1, 'Hide', '秀吉修正', 37, '・休日は食べ歩き\r\n・ゲーム、漫画、アニメが好き', '会社役員', 'スタートアップ', '1000-1500万円', '大学院卒', '〇〇大学', 'すぐにでも', '未婚', '絶対にほしい', '福岡市', 170, '普通', 'Dineおごり', '2022-08-26', '2022-08-16', NULL, NULL, NULL, NULL, NULL, '20230120025442_sample-1.jpg'),
(2, 'Yasu', '家康', 35, '・四国出身、田舎育ち\r\n・大学は神戸で東京は5年目\r\n・好奇心旺盛\r\n・家はマンションを買いたい\r\n・海沿いの家が良い', '自営業', 'フリーランス', '1000-1500万円', '大学卒', '▲▲大学', '未選択', '未婚', '絶対にほしい', '徳島県', 175, '普通', 'Dine', '2022-07-14', '2022-07-14', NULL, NULL, NULL, NULL, NULL, '20230119150405_sample-3.jpg'),
(3, 'Mitsu', '家光', 39, '・コンサル\r\n・ロードバイクが趣味', 'コンサル', '', '1000-1500万円', '修士卒', '◆◆大学', '未選択', '離婚', '未選択', '栃木県', 165, '筋肉質', 'Dineおごり', '2022-06-08', '2022-06-08', NULL, NULL, NULL, NULL, NULL, '20230119150442_sample-2.jpg'),
(17, 'Taka', '尊氏', 28, '', '金融', '▲▲アセットマネジメント', '〜3,000万円', '院卒', '東京大学大学院', '未選択', '未選択', '未選択', '', 0, '未選択', '', '2023-01-20', '2023-01-07', NULL, NULL, NULL, NULL, NULL, '');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `gs_user_table`
--
ALTER TABLE `gs_user_table`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `match_list`
--
ALTER TABLE `match_list`
  ADD UNIQUE KEY `memo` (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `gs_user_table`
--
ALTER TABLE `gs_user_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- テーブルの AUTO_INCREMENT `match_list`
--
ALTER TABLE `match_list`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
