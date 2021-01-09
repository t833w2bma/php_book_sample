-- Adminer 4.7.8 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `login` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `customer` (`id`, `name`, `address`, `login`, `password`) VALUES
(1,	'熊木 和夫',	'東京都新宿区西新宿2-8-1',	'kumaki',	'BearTree1'),
(2,	'鳥居 健二',	'神奈川県横浜市中区日本大通1',	'torii',	'BirdStay2'),
(3,	'鷺沼 美子',	'大阪府大阪市中央区大手前2',	'saginuma',	'EgretPond3'),
(4,	'鷲尾 史郎',	'愛知県名古屋市中区三の丸3-1-2',	'washio',	'EagleTail4'),
(5,	'牛島 大悟',	'埼玉県さいたま市浦和区高砂3-15-1',	'ushijima',	'CowIsland5'),
(6,	'相馬 助六',	'千葉県地足中央区市場町1-1',	'souma',	'PhaseHorse6'),
(7,	'猿飛 菜々子',	'兵庫県神戸市中央区下山手通5-10-1',	'sarutobi',	'MonkeyFly7'),
(8,	'犬山 陣八',	'北海道札幌市中央区北3西6',	'inuyama',	'DogMountain8'),
(9,	'猪口 一休',	'福岡県福岡市博多区東公園7-7',	'inokuchi',	'BoarMouse9'),
(10,	'猫田 重蔵',	'静岡県静岡市葵区追手町9-6',	'nekota',	'CatRiceField10'),
(12,	'熊木 和夫',	'東京都新宿区西新宿2-8-1',	'kumaki1',	'$2y$10$SK5nwW9KqjUnoS6a1ZoseuQCHbfkBgSes8expF4XQk3RCW4jrcMZi');

DROP TABLE IF EXISTS `favorite`;
CREATE TABLE `favorite` (
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  PRIMARY KEY (`customer_id`,`product_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `favorite_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`),
  CONSTRAINT `favorite_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `favorite` (`customer_id`, `product_id`) VALUES
(1,	3);

DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `product` (`id`, `name`, `price`) VALUES
(1,	'松の実',	700),
(2,	'くるみ',	270),
(3,	'ひまわりの種',	210),
(4,	'アーモンド',	220),
(5,	'カシューナッツ',	250),
(6,	'ジャイアントコーン',	180),
(7,	'ピスタチオ',	310),
(8,	'マカダミアナッツ',	600),
(9,	'かぼちゃの種',	180),
(10,	'ピーナッツ',	150),
(11,	'クコの実',	400),
(12,	'バターピーナッツ',	200),
(13,	'ローストピーナッツ',	220);

DROP TABLE IF EXISTS `purchase`;
CREATE TABLE `purchase` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `customer_id` (`customer_id`),
  CONSTRAINT `purchase_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `purchase` (`id`, `customer_id`) VALUES
(1,	1),
(2,	1),
(3,	1),
(4,	2),
(5,	2);

DROP TABLE IF EXISTS `purchase_detail`;
CREATE TABLE `purchase_detail` (
  `purchase_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  PRIMARY KEY (`purchase_id`,`product_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `purchase_detail_ibfk_1` FOREIGN KEY (`purchase_id`) REFERENCES `purchase` (`id`),
  CONSTRAINT `purchase_detail_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `purchase_detail` (`purchase_id`, `product_id`, `count`) VALUES
(1,	8,	5),
(2,	1,	1),
(2,	3,	2),
(2,	9,	6),
(3,	3,	1),
(4,	1,	2),
(4,	7,	1),
(4,	8,	8),
(5,	2,	1);

-- 2021-01-09 10:15:50
