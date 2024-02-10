-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2024-01-17 05:51:20
-- サーバのバージョン： 10.4.32-MariaDB
-- PHP のバージョン: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `ec`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `login` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- テーブルのデータのダンプ `customer`
--

INSERT INTO `customer` (`id`, `name`, `address`, `login`, `password`) VALUES
(1, '熊木 和夫', '東京都新宿区西新宿2-8-1', 'kumaki', 'BearTree1'),
(2, '鳥居 健二', '神奈川県横浜市中区日本大通1', 'torii', 'BirdStay2'),
(3, '鷺沼 美子', '大阪府大阪市中央区大手前2', 'saginuma', 'EgretPond3'),
(4, '鷲尾 史郎', '愛知県名古屋市中区三の丸3-1-2', 'washio', 'EagleTail4'),
(5, '牛島 大悟', '埼玉県さいたま市浦和区高砂3-15-1', 'ushijima', 'CowIsland5'),
(6, '相馬 助六', '千葉県地足中央区市場町1-1', 'souma', 'PhaseHorse6'),
(7, '猿飛 菜々子', '兵庫県神戸市中央区下山手通5-10-1', 'sarutobi', 'MonkeyFly7'),
(8, '犬山 陣八', '北海道札幌市中央区北3西6', 'inuyama', 'DogMountain8'),
(9, '猪口 一休', '福岡県福岡市博多区東公園7-7', 'inokuchi', 'BoarMouse9');

-- --------------------------------------------------------

--
-- テーブルの構造 `favorite`
--

CREATE TABLE `favorite` (
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- テーブルのデータのダンプ `favorite`
--

INSERT INTO `favorite` (`customer_id`, `product_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- テーブルの構造 `pass`
--

CREATE TABLE `pass` (
  `id` varchar(256) NOT NULL,
  `cardNUM` varchar(256) NOT NULL,
  `pass` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `pass`
--

INSERT INTO `pass` (`id`, `cardNUM`, `pass`) VALUES
('1', 'a', '1234');

-- --------------------------------------------------------

--
-- テーブルの構造 `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `kaisya` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `setumei` varchar(255) DEFAULT NULL,
  `moresetumei` varchar(255) DEFAULT NULL,
  `kyouka` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `products`
--

INSERT INTO `products` (`id`, `title`, `price`, `kaisya`, `image`, `setumei`, `moresetumei`, `kyouka`) VALUES
(1, '小学校 国語 六年 上', 1000, '学校図書', 'image/kokugo6.jpg', '小学６年生の前半の授業で使う教科書です', '254P 汚れあり 傷あり<br>定価\0', '国語'),
(2, '国語 六 創造', 1000, '光村図書', 'image/ko6.jpg', '小学６年生 上期の国語の教科書です', '230P 汚れ無し 傷なし 乱丁あり', '国語'),
(3, '新編 新しい国語 六', 1000, '東京書籍', 'image/koku6.jpg', '小学六年生の国語の教科書です', '200P 破れあり', '国語'),
(4, '小学 算数 6', 1000, '教育出版', 'image/san6.jpg', '小学６年生の算数の教科書です', '150P 新品 未開封', '算数'),
(5, '新編 新しい算数 6', 1000, '東京書籍', 'image/sansuu6.jpg', '小学６年生の算数の教科書です', '167P 汚れあり', '算数'),
(6, '中学校 数学 1', 1500, '学校図書', 'image/sugaku1.jpg', '中学1年生の数学の教科書です', '183P 新品', '数学'),
(7, '中学校 数学 2', 1500, '学校図書', 'image/sugaku2.jpg', '中学2年生の数学の教科書です', '173P 新品', '数学'),
(8, '新編 新しい理科 6', 1000, '東京書籍', 'image/rika6.jpg', '小学６年生の理科の教科書です', '120P 傷あり', '理科'),
(9, '自然の研究 中学 理科 1', 1500, '教育出版', 'image/rika1.jpg', '中学1年生の理科の教科書です', '138P\r\n  新品', '理科'),
(10, '自然の研究 中学 理科 2', 1500, '教育出版', 'image/rika2.jpg', '中学2年生の理科の教科書です', '138P\r\n  新品', '理科'),
(11, '社会科 中学生の歴史 日本の歩みと世界の歴史', 1500, '帝国書院', 'image/reki.jpg', '中学生の歴史の教科書です', '168P 傷あり', '社会'),
(12, '中学社会 歴史 未来をみつめて', 1500, '教育出版', 'image/rekis.jpg', '中学生の歴史の教科書です', '179P 汚れあり', '社会'),
(13, '新しい社会 歴史', 1500, '東京書籍', 'image/rekisi.jpg', '中学生の歴史の教科書です', '196P 新品', '社会'),
(14, 'NEW CROWN 1', 1500, '三省堂', 'image/eigo1.jpg', '中学1年生の英語の教科書です', '154P 汚れあり', '外国語'),
(15, 'NEW CROWN 2', 1500, '三省堂', 'image/eigo2.jpg', '中学2年生の英語の教科書です', '158P 汚れあり', '外国語'),
(16, 'わたしたちの家庭科 5・6', 1000, '開隆堂', 'image/katei56.jpg', '小学5年、6年生の家庭科のの教科書です', '230P 新品', 'その他');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- テーブルのインデックス `favorite`
--
ALTER TABLE `favorite`
  ADD PRIMARY KEY (`customer_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- テーブルのインデックス `pass`
--
ALTER TABLE `pass`
  ADD KEY `cardNUM` (`cardNUM`) USING BTREE;

--
-- テーブルのインデックス `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
