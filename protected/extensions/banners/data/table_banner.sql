-- --------------------------------------------------------

--
-- Структура таблицы `b_category`
--

DROP TABLE IF EXISTS `b_category`;
CREATE TABLE IF NOT EXISTS `b_category` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '',
  `pos` int(25) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

INSERT INTO `b_category` (`id`, `name`, `pos`) VALUES(0, 'null', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `b_keys`
--

DROP TABLE IF EXISTS `b_keys`;
CREATE TABLE IF NOT EXISTS `b_keys` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

INSERT INTO `b_keys` (`id`, `name`) VALUES(0, 'null');

----------------------------------------------------------

--
-- Структура таблицы `b_baners`
--

DROP TABLE IF EXISTS `b_baners`;
CREATE TABLE IF NOT EXISTS `b_baners` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT '',
  `image` varchar(50) NOT NULL DEFAULT '',
  `href` varchar(50) DEFAULT '',
  `cid` int(15) NOT NULL DEFAULT '0',
  `key` varchar(25) NOT NULL,
  `default` int(1) DEFAULT NULL,
  `page` int(25) DEFAULT NULL,
  `type` int(1) NOT NULL DEFAULT '0',
  `width` int(25) DEFAULT NULL,
  `height` int(25) DEFAULT NULL,
  `through` varchar(25) DEFAULT NULL,
  `count_show` int(25) DEFAULT NULL,
  `inner_page` int(1) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `start_date` varchar(10) DEFAULT NULL,
  `finish_date` varchar(10) DEFAULT NULL,
  `finish_count_show` int(25) DEFAULT NULL,
  `active` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cid` (`cid`),
  KEY `type` (`type`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

--
-- Ограничения внешнего ключа таблицы `b_baners`
--
ALTER TABLE `b_baners`
ADD CONSTRAINT `b_baners_b_keys` FOREIGN KEY (`type`) REFERENCES `b_keys` (`id`),
ADD CONSTRAINT `b_baners_b_category` FOREIGN KEY (`cid`) REFERENCES `b_category` (`id`),

