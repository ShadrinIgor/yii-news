--
-- Структура таблицы `b_baners`
--

DROP TABLE IF EXISTS `b_baners`;
CREATE TABLE IF NOT EXISTS `b_baners` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '',
  `image` varchar(50) NOT NULL DEFAULT '',
  `href` varchar(50) NOT NULL DEFAULT '',
  `cid` int(15) NOT NULL DEFAULT '0',
  `key` varchar(25) NOT NULL,
  `default` int(1) NOT NULL,
  `page` int(25) NOT NULL,
  `type` int(1) DEFAULT '0',
  `width` varchar(25) NOT NULL,
  `height` varchar(25) NOT NULL,
  `through` varchar(25) NOT NULL,
  `count_show` varchar(25) NOT NULL,
  `inner_page` int(1) NOT NULL,
  `email` varchar(50) NOT NULL,
  `start_date` varchar(10) NOT NULL,
  `finish_date` varchar(10) NOT NULL,
  `finish_count_show` varchar(25) NOT NULL,
  `active` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ;

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