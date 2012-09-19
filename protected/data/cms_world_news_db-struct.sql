-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Сен 19 2012 г., 15:29
-- Версия сервера: 5.1.65
-- Версия PHP: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `cms_world_news_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `acc_category`
--

CREATE TABLE IF NOT EXISTS `acc_category` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `type` int(15) NOT NULL DEFAULT '0',
  `user` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Структура таблицы `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `login` varchar(25) NOT NULL,
  `password` varchar(120) NOT NULL,
  `dd` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `b_baners`
--

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

-- --------------------------------------------------------

--
-- Структура таблицы `b_category`
--

CREATE TABLE IF NOT EXISTS `b_category` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '',
  `pos` int(25) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Структура таблицы `b_keys`
--

CREATE TABLE IF NOT EXISTS `b_keys` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Структура таблицы `catalog_afisha`
--

CREATE TABLE IF NOT EXISTS `catalog_afisha` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `col` int(15) NOT NULL DEFAULT '0',
  `cid` int(15) NOT NULL DEFAULT '0',
  `name` varchar(25) NOT NULL DEFAULT '0',
  `path` varchar(25) NOT NULL DEFAULT '0',
  `description` text,
  `image` varchar(255) NOT NULL DEFAULT '0',
  `active` int(1) NOT NULL DEFAULT '1',
  `select` int(1) NOT NULL DEFAULT '1',
  `dateadd` date DEFAULT NULL,
  `dateedit` date DEFAULT NULL,
  `pos` int(15) NOT NULL DEFAULT '0',
  `metaData` text,
  `user` int(15) NOT NULL DEFAULT '0',
  `del` int(1) NOT NULL DEFAULT '0',
  `lang_group` int(15) NOT NULL DEFAULT '0',
  `id_lang` int(15) NOT NULL DEFAULT '0',
  `cid_id` varchar(25) NOT NULL,
  `country` varchar(25) NOT NULL,
  `date` date NOT NULL,
  `date_do` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cid` (`cid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Структура таблицы `catalog_afisha_cid`
--

CREATE TABLE IF NOT EXISTS `catalog_afisha_cid` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `col` int(15) NOT NULL DEFAULT '0',
  `cid` int(15) NOT NULL DEFAULT '0',
  `name` varchar(150) NOT NULL,
  `path` varchar(25) NOT NULL DEFAULT '0',
  `active` int(1) NOT NULL DEFAULT '1',
  `select` int(1) NOT NULL DEFAULT '1',
  `dateadd` date DEFAULT NULL,
  `dateedit` date DEFAULT NULL,
  `pos` int(15) NOT NULL DEFAULT '0',
  `metaData` text,
  `user` int(15) NOT NULL DEFAULT '0',
  `del` int(1) NOT NULL DEFAULT '0',
  `lang_group` int(15) NOT NULL DEFAULT '0',
  `id_lang` int(15) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `cid` (`cid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Структура таблицы `catalog_cid`
--

CREATE TABLE IF NOT EXISTS `catalog_cid` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `col` int(15) NOT NULL DEFAULT '0',
  `cid` int(15) NOT NULL DEFAULT '0',
  `name` varchar(50) NOT NULL,
  `path` varchar(25) NOT NULL DEFAULT '0',
  `active` int(1) NOT NULL DEFAULT '1',
  `select` int(1) NOT NULL DEFAULT '1',
  `dateadd` date DEFAULT NULL,
  `dateedit` date DEFAULT NULL,
  `pos` int(15) NOT NULL DEFAULT '0',
  `metaData` text,
  `user` int(15) NOT NULL DEFAULT '0',
  `del` int(1) NOT NULL DEFAULT '0',
  `lang_group` int(15) NOT NULL DEFAULT '0',
  `id_lang` int(15) NOT NULL DEFAULT '0',
  `owner` varchar(25) NOT NULL,
  `key_word` varchar(50) NOT NULL,
  `link` varchar(255) NOT NULL,
  `show_in_menu` varchar(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cid` (`cid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=50 ;

-- --------------------------------------------------------

--
-- Структура таблицы `catalog_city`
--

CREATE TABLE IF NOT EXISTS `catalog_city` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `col` int(15) NOT NULL DEFAULT '0',
  `cid` int(15) NOT NULL DEFAULT '0',
  `name` varchar(25) NOT NULL DEFAULT '0',
  `path` varchar(25) NOT NULL DEFAULT '0',
  `active` int(1) NOT NULL DEFAULT '1',
  `select` int(1) NOT NULL DEFAULT '1',
  `dateadd` date DEFAULT NULL,
  `dateedit` date DEFAULT NULL,
  `pos` int(15) NOT NULL DEFAULT '0',
  `metaData` text,
  `user` int(15) NOT NULL DEFAULT '0',
  `del` int(1) NOT NULL DEFAULT '0',
  `lang_group` int(15) NOT NULL DEFAULT '0',
  `id_lang` int(15) NOT NULL DEFAULT '0',
  `country` varchar(25) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cid` (`cid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Структура таблицы `catalog_coments`
--

CREATE TABLE IF NOT EXISTS `catalog_coments` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `col` int(15) NOT NULL DEFAULT '0',
  `cid` int(15) NOT NULL DEFAULT '0',
  `name` varchar(25) NOT NULL,
  `path` varchar(25) NOT NULL DEFAULT '0',
  `description` text NOT NULL,
  `active` int(1) NOT NULL DEFAULT '1',
  `select` int(1) NOT NULL DEFAULT '1',
  `dateadd` date DEFAULT NULL,
  `dateedit` date DEFAULT NULL,
  `pos` int(15) NOT NULL DEFAULT '0',
  `metaData` text,
  `user` int(15) NOT NULL DEFAULT '0',
  `del` int(1) NOT NULL DEFAULT '0',
  `lang_group` int(15) NOT NULL DEFAULT '0',
  `id_lang` int(15) NOT NULL DEFAULT '0',
  `user_id` varchar(25) NOT NULL,
  `add_time` varchar(5) NOT NULL,
  `add_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cid` (`cid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Структура таблицы `catalog_comments`
--

CREATE TABLE IF NOT EXISTS `catalog_comments` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `col` int(15) NOT NULL DEFAULT '0',
  `cid` int(15) NOT NULL DEFAULT '0',
  `name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(25) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `active` int(1) NOT NULL DEFAULT '1',
  `select` int(1) NOT NULL DEFAULT '1',
  `dateadd` date DEFAULT NULL,
  `dateedit` date DEFAULT NULL,
  `pos` int(15) NOT NULL DEFAULT '0',
  `metaData` text COLLATE utf8_unicode_ci,
  `user` int(15) NOT NULL DEFAULT '0',
  `del` int(1) NOT NULL DEFAULT '0',
  `lang_group` int(15) NOT NULL DEFAULT '0',
  `id_lang` int(15) NOT NULL DEFAULT '0',
  `u_name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `date_add` date NOT NULL,
  `u_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `time_add` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cid` (`cid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=85 ;

-- --------------------------------------------------------

--
-- Структура таблицы `catalog_country`
--

CREATE TABLE IF NOT EXISTS `catalog_country` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `col` int(15) NOT NULL DEFAULT '0',
  `cid` int(15) NOT NULL DEFAULT '0',
  `name` varchar(25) NOT NULL DEFAULT '0',
  `path` varchar(25) NOT NULL DEFAULT '0',
  `active` int(1) NOT NULL DEFAULT '1',
  `select` int(1) NOT NULL DEFAULT '1',
  `dateadd` date DEFAULT NULL,
  `dateedit` date DEFAULT NULL,
  `pos` int(15) NOT NULL DEFAULT '0',
  `metaData` text,
  `user` int(15) NOT NULL DEFAULT '0',
  `del` int(1) NOT NULL DEFAULT '0',
  `lang_group` int(15) NOT NULL DEFAULT '0',
  `id_lang` int(15) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `cid` (`cid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

-- --------------------------------------------------------

--
-- Структура таблицы `catalog_feedback`
--

CREATE TABLE IF NOT EXISTS `catalog_feedback` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `col` int(15) NOT NULL DEFAULT '0',
  `cid` int(15) NOT NULL DEFAULT '0',
  `name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(25) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `active` int(1) NOT NULL DEFAULT '1',
  `select` int(1) NOT NULL DEFAULT '1',
  `dateadd` date DEFAULT NULL,
  `dateedit` date DEFAULT NULL,
  `pos` int(15) NOT NULL DEFAULT '0',
  `metaData` text COLLATE utf8_unicode_ci,
  `user` int(15) NOT NULL DEFAULT '0',
  `del` int(1) NOT NULL DEFAULT '0',
  `lang_group` int(15) NOT NULL DEFAULT '0',
  `id_lang` int(15) NOT NULL DEFAULT '0',
  `date_add` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `fio` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `telefon` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cid` (`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `catalog_foto`
--

CREATE TABLE IF NOT EXISTS `catalog_foto` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `col` int(15) NOT NULL DEFAULT '0',
  `cid` int(15) NOT NULL DEFAULT '0',
  `name` varchar(50) NOT NULL,
  `path` varchar(25) NOT NULL DEFAULT '0',
  `description` text NOT NULL,
  `active` int(1) NOT NULL DEFAULT '1',
  `select` int(1) NOT NULL DEFAULT '1',
  `dateadd` date DEFAULT NULL,
  `dateedit` date DEFAULT NULL,
  `pos` int(15) NOT NULL DEFAULT '0',
  `metaData` text,
  `user` int(15) NOT NULL DEFAULT '0',
  `del` int(1) NOT NULL DEFAULT '0',
  `lang_group` int(15) NOT NULL DEFAULT '0',
  `id_lang` int(15) NOT NULL DEFAULT '0',
  `cid_rations` varchar(25) NOT NULL,
  `ration` int(25) DEFAULT '0',
  `timeadd` varchar(5) NOT NULL,
  `cat_id` varchar(25) NOT NULL,
  `image` varchar(255) NOT NULL,
  `add_date` date NOT NULL,
  `add_time` varchar(5) NOT NULL,
  `count_show` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cid` (`cid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

-- --------------------------------------------------------

--
-- Структура таблицы `catalog_f_commands`
--

CREATE TABLE IF NOT EXISTS `catalog_f_commands` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `col` int(15) NOT NULL DEFAULT '0',
  `cid` int(15) NOT NULL DEFAULT '0',
  `name` varchar(25) NOT NULL DEFAULT '0',
  `path` varchar(25) NOT NULL DEFAULT '0',
  `description` text,
  `image` varchar(255) NOT NULL DEFAULT '0',
  `active` int(1) NOT NULL DEFAULT '1',
  `select` int(1) NOT NULL DEFAULT '1',
  `dateadd` date DEFAULT NULL,
  `dateedit` date DEFAULT NULL,
  `pos` int(15) NOT NULL DEFAULT '0',
  `metaData` text,
  `user` int(15) NOT NULL DEFAULT '0',
  `del` int(1) NOT NULL DEFAULT '0',
  `lang_group` int(15) NOT NULL DEFAULT '0',
  `id_lang` int(15) NOT NULL DEFAULT '0',
  `group_id` varchar(25) NOT NULL,
  `games` varchar(25) NOT NULL,
  `victory` varchar(25) NOT NULL,
  `draw` varchar(25) NOT NULL,
  `goals` varchar(25) NOT NULL,
  `goals_against` varchar(25) NOT NULL,
  `points` varchar(25) NOT NULL,
  `loss` varchar(25) NOT NULL,
  `image_2` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cid` (`cid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

-- --------------------------------------------------------

--
-- Структура таблицы `catalog_f_groups`
--

CREATE TABLE IF NOT EXISTS `catalog_f_groups` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `col` int(15) NOT NULL DEFAULT '0',
  `cid` int(15) NOT NULL DEFAULT '0',
  `name` varchar(25) NOT NULL DEFAULT '0',
  `path` varchar(25) NOT NULL DEFAULT '0',
  `active` int(1) NOT NULL DEFAULT '1',
  `select` int(1) NOT NULL DEFAULT '1',
  `dateadd` date DEFAULT NULL,
  `dateedit` date DEFAULT NULL,
  `pos` int(15) NOT NULL DEFAULT '0',
  `metaData` text,
  `user` int(15) NOT NULL DEFAULT '0',
  `del` int(1) NOT NULL DEFAULT '0',
  `lang_group` int(15) NOT NULL DEFAULT '0',
  `id_lang` int(15) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `cid` (`cid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Структура таблицы `catalog_f_tables`
--

CREATE TABLE IF NOT EXISTS `catalog_f_tables` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `col` int(15) NOT NULL DEFAULT '0',
  `cid` int(15) NOT NULL DEFAULT '0',
  `name` varchar(150) NOT NULL,
  `path` varchar(25) NOT NULL DEFAULT '0',
  `active` int(1) NOT NULL DEFAULT '1',
  `select` int(1) NOT NULL DEFAULT '1',
  `dateadd` date DEFAULT NULL,
  `dateedit` date DEFAULT NULL,
  `pos` int(15) NOT NULL DEFAULT '0',
  `metaData` text,
  `user` int(15) NOT NULL DEFAULT '0',
  `del` int(1) NOT NULL DEFAULT '0',
  `lang_group` int(15) NOT NULL DEFAULT '0',
  `id_lang` int(15) NOT NULL DEFAULT '0',
  `command` varchar(25) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cid` (`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `catalog_goroskop`
--

CREATE TABLE IF NOT EXISTS `catalog_goroskop` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `col` int(15) NOT NULL DEFAULT '0',
  `cid` int(15) NOT NULL DEFAULT '0',
  `name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(25) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `active` int(1) NOT NULL DEFAULT '1',
  `select` int(1) NOT NULL DEFAULT '1',
  `dateadd` date DEFAULT NULL,
  `dateedit` date DEFAULT NULL,
  `pos` int(15) NOT NULL DEFAULT '0',
  `metaData` text COLLATE utf8_unicode_ci,
  `user` int(15) NOT NULL DEFAULT '0',
  `del` int(1) NOT NULL DEFAULT '0',
  `lang_group` int(15) NOT NULL DEFAULT '0',
  `id_lang` int(15) NOT NULL DEFAULT '0',
  `date` date NOT NULL,
  `pos_` int(5) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cid` (`cid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=31 ;

-- --------------------------------------------------------

--
-- Структура таблицы `catalog_items`
--

CREATE TABLE IF NOT EXISTS `catalog_items` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `col` int(15) NOT NULL DEFAULT '0',
  `cid` int(15) NOT NULL DEFAULT '0',
  `name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(25) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `description` text COLLATE utf8_unicode_ci,
  `ltext` text COLLATE utf8_unicode_ci,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `active` int(1) NOT NULL DEFAULT '1',
  `select` int(1) NOT NULL DEFAULT '1',
  `dateadd` date DEFAULT NULL,
  `dateedit` date DEFAULT NULL,
  `pos` int(15) NOT NULL DEFAULT '0',
  `metaData` text COLLATE utf8_unicode_ci,
  `user` int(15) NOT NULL DEFAULT '0',
  `del` int(1) NOT NULL DEFAULT '0',
  `lang_group` int(15) NOT NULL DEFAULT '0',
  `id_lang` int(15) NOT NULL DEFAULT '0',
  `date` date NOT NULL,
  `date_do` date NOT NULL,
  `cid_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `avtor` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `people` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cid` (`cid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=156 ;

-- --------------------------------------------------------

--
-- Структура таблицы `catalog_message`
--

CREATE TABLE IF NOT EXISTS `catalog_message` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `col` int(15) NOT NULL DEFAULT '0',
  `cid` int(15) NOT NULL DEFAULT '0',
  `name` varchar(100) NOT NULL,
  `path` varchar(25) NOT NULL DEFAULT '0',
  `active` int(1) NOT NULL DEFAULT '1',
  `select` int(1) NOT NULL DEFAULT '1',
  `dateadd` date DEFAULT NULL,
  `dateedit` date DEFAULT NULL,
  `pos` int(15) NOT NULL DEFAULT '0',
  `metaData` text,
  `user` int(15) NOT NULL DEFAULT '0',
  `del` int(1) NOT NULL DEFAULT '0',
  `lang_group` int(15) NOT NULL DEFAULT '0',
  `id_lang` int(15) NOT NULL DEFAULT '0',
  `user_from` varchar(25) NOT NULL,
  `description` text NOT NULL,
  `new_item` varchar(1) NOT NULL DEFAULT '1',
  `user_to` varchar(25) NOT NULL,
  `timeadd` varchar(5) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cid` (`cid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Структура таблицы `catalog_money`
--

CREATE TABLE IF NOT EXISTS `catalog_money` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `col` int(15) NOT NULL DEFAULT '0',
  `cid` int(15) NOT NULL DEFAULT '0',
  `name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(25) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `active` int(1) NOT NULL DEFAULT '1',
  `select` int(1) NOT NULL DEFAULT '1',
  `dateadd` date DEFAULT NULL,
  `dateedit` date DEFAULT NULL,
  `pos` int(15) NOT NULL DEFAULT '0',
  `metaData` text COLLATE utf8_unicode_ci,
  `user` int(15) NOT NULL DEFAULT '0',
  `del` int(1) NOT NULL DEFAULT '0',
  `lang_group` int(15) NOT NULL DEFAULT '0',
  `id_lang` int(15) NOT NULL DEFAULT '0',
  `name_value` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `city` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cid` (`cid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=54 ;

-- --------------------------------------------------------

--
-- Структура таблицы `catalog_news`
--

CREATE TABLE IF NOT EXISTS `catalog_news` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `col` int(15) NOT NULL DEFAULT '0',
  `cid` int(15) NOT NULL DEFAULT '0',
  `name` varchar(150) NOT NULL,
  `path` varchar(25) NOT NULL DEFAULT '0',
  `description` text NOT NULL,
  `active` int(1) NOT NULL DEFAULT '1',
  `select` int(1) NOT NULL DEFAULT '1',
  `dateadd` date DEFAULT NULL,
  `dateedit` date DEFAULT NULL,
  `pos` int(15) NOT NULL DEFAULT '0',
  `metaData` text,
  `user` int(15) NOT NULL DEFAULT '0',
  `del` int(1) NOT NULL DEFAULT '0',
  `lang_group` int(15) NOT NULL DEFAULT '0',
  `id_lang` int(15) NOT NULL DEFAULT '0',
  `key_word` varchar(250) NOT NULL,
  `country` int(25) NOT NULL,
  `image` varchar(255) NOT NULL,
  `cid_id` varchar(25) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(10) NOT NULL,
  `tags` text NOT NULL,
  `archive` int(1) NOT NULL,
  `people` int(25) NOT NULL,
  `tags_` text NOT NULL,
  `image_2` varchar(255) NOT NULL,
  `image_3` varchar(255) NOT NULL,
  `source` varchar(255) NOT NULL,
  `video` int(1) NOT NULL,
  `tags_checked` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cid_id` (`cid_id`),
  KEY `archive` (`archive`),
  KEY `people` (`people`),
  KEY `date` (`date`),
  KEY `col` (`col`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=85211 ;

-- --------------------------------------------------------

--
-- Структура таблицы `catalog_people`
--

CREATE TABLE IF NOT EXISTS `catalog_people` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `col` int(15) NOT NULL DEFAULT '0',
  `cid` int(15) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(25) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `description` text COLLATE utf8_unicode_ci,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `active` int(1) NOT NULL DEFAULT '1',
  `select` int(1) NOT NULL DEFAULT '1',
  `dateadd` date DEFAULT NULL,
  `dateedit` date DEFAULT NULL,
  `pos` int(15) NOT NULL DEFAULT '0',
  `metaData` text COLLATE utf8_unicode_ci,
  `user` int(15) NOT NULL DEFAULT '0',
  `del` int(1) NOT NULL DEFAULT '0',
  `lang_group` int(15) NOT NULL DEFAULT '0',
  `id_lang` int(15) NOT NULL DEFAULT '0',
  `www` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `key_word` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `cid_id` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cid` (`cid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=177 ;

-- --------------------------------------------------------

--
-- Структура таблицы `catalog_people_cid`
--

CREATE TABLE IF NOT EXISTS `catalog_people_cid` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `col` int(15) NOT NULL DEFAULT '0',
  `cid` int(15) NOT NULL DEFAULT '0',
  `name` varchar(25) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `path` varchar(25) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `active` int(1) NOT NULL DEFAULT '1',
  `select` int(1) NOT NULL DEFAULT '1',
  `dateadd` date DEFAULT NULL,
  `dateedit` date DEFAULT NULL,
  `pos` int(15) NOT NULL DEFAULT '0',
  `metaData` text COLLATE utf8_unicode_ci,
  `user` int(15) NOT NULL DEFAULT '0',
  `del` int(1) NOT NULL DEFAULT '0',
  `lang_group` int(15) NOT NULL DEFAULT '0',
  `id_lang` int(15) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `cid` (`cid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=21 ;

-- --------------------------------------------------------

--
-- Структура таблицы `catalog_ration`
--

CREATE TABLE IF NOT EXISTS `catalog_ration` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `col` int(15) NOT NULL DEFAULT '0',
  `cid` int(15) NOT NULL DEFAULT '0',
  `name` varchar(25) NOT NULL DEFAULT '0',
  `path` varchar(25) NOT NULL DEFAULT '0',
  `active` int(1) NOT NULL DEFAULT '1',
  `select` int(1) NOT NULL DEFAULT '1',
  `dateadd` date DEFAULT NULL,
  `dateedit` date DEFAULT NULL,
  `pos` int(15) NOT NULL DEFAULT '0',
  `metaData` text,
  `user` int(15) NOT NULL DEFAULT '0',
  `del` int(1) NOT NULL DEFAULT '0',
  `lang_group` int(15) NOT NULL DEFAULT '0',
  `id_lang` int(15) NOT NULL DEFAULT '0',
  `ration` varchar(5) NOT NULL,
  `from_user` varchar(25) NOT NULL,
  `add_date` date NOT NULL,
  `add_time` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cid` (`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `catalog_s_f_games`
--

CREATE TABLE IF NOT EXISTS `catalog_s_f_games` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `col` int(15) NOT NULL DEFAULT '0',
  `cid` int(15) NOT NULL DEFAULT '0',
  `name` varchar(150) NOT NULL,
  `path` varchar(25) NOT NULL DEFAULT '0',
  `description` text,
  `image` varchar(255) NOT NULL DEFAULT '0',
  `active` int(1) NOT NULL DEFAULT '1',
  `select` int(1) NOT NULL DEFAULT '1',
  `dateadd` date DEFAULT NULL,
  `dateedit` date DEFAULT NULL,
  `pos` int(15) NOT NULL DEFAULT '0',
  `metaData` text,
  `user` int(15) NOT NULL DEFAULT '0',
  `del` int(1) NOT NULL DEFAULT '0',
  `lang_group` int(15) NOT NULL DEFAULT '0',
  `id_lang` int(15) NOT NULL DEFAULT '0',
  `year` varchar(25) NOT NULL,
  `tour` varchar(25) NOT NULL,
  `command_l` varchar(25) NOT NULL,
  `command_r` varchar(25) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(10) NOT NULL,
  `victory_l` varchar(1) NOT NULL,
  `victory_r` varchar(1) NOT NULL,
  `finish` varchar(1) NOT NULL,
  `chet` varchar(25) NOT NULL,
  `number` varchar(25) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cid` (`cid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=436 ;

-- --------------------------------------------------------

--
-- Структура таблицы `catalog_s_f_status`
--

CREATE TABLE IF NOT EXISTS `catalog_s_f_status` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `col` int(15) NOT NULL DEFAULT '0',
  `cid` int(15) NOT NULL DEFAULT '0',
  `name` varchar(25) NOT NULL DEFAULT '0',
  `path` varchar(25) NOT NULL DEFAULT '0',
  `active` int(1) NOT NULL DEFAULT '1',
  `select` int(1) NOT NULL DEFAULT '1',
  `dateadd` date DEFAULT NULL,
  `dateedit` date DEFAULT NULL,
  `pos` int(15) NOT NULL DEFAULT '0',
  `metaData` text,
  `user` int(15) NOT NULL DEFAULT '0',
  `del` int(1) NOT NULL DEFAULT '0',
  `lang_group` int(15) NOT NULL DEFAULT '0',
  `id_lang` int(15) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `cid` (`cid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Структура таблицы `catalog_s_f_tours`
--

CREATE TABLE IF NOT EXISTS `catalog_s_f_tours` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `col` int(15) NOT NULL DEFAULT '0',
  `cid` int(15) NOT NULL DEFAULT '0',
  `name` varchar(25) NOT NULL DEFAULT '0',
  `path` varchar(25) NOT NULL DEFAULT '0',
  `active` int(1) NOT NULL DEFAULT '1',
  `select` int(1) NOT NULL DEFAULT '1',
  `dateadd` date DEFAULT NULL,
  `dateedit` date DEFAULT NULL,
  `pos` int(15) NOT NULL DEFAULT '0',
  `metaData` text,
  `user` int(15) NOT NULL DEFAULT '0',
  `del` int(1) NOT NULL DEFAULT '0',
  `lang_group` int(15) NOT NULL DEFAULT '0',
  `id_lang` int(15) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `cid` (`cid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Структура таблицы `catalog_s_news`
--

CREATE TABLE IF NOT EXISTS `catalog_s_news` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `col` int(15) NOT NULL DEFAULT '0',
  `cid` int(15) NOT NULL DEFAULT '0',
  `name` varchar(150) NOT NULL,
  `path` varchar(25) NOT NULL DEFAULT '0',
  `description` text,
  `image` varchar(255) NOT NULL DEFAULT '0',
  `active` int(1) NOT NULL DEFAULT '1',
  `select` int(1) NOT NULL DEFAULT '1',
  `dateadd` date DEFAULT NULL,
  `dateedit` date DEFAULT NULL,
  `pos` int(15) NOT NULL DEFAULT '0',
  `metaData` text,
  `user` int(15) NOT NULL DEFAULT '0',
  `del` int(1) NOT NULL DEFAULT '0',
  `lang_group` int(15) NOT NULL DEFAULT '0',
  `id_lang` int(15) NOT NULL DEFAULT '0',
  `people` varchar(25) NOT NULL,
  `cid_id` varchar(25) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(5) NOT NULL,
  `key_word` text NOT NULL,
  `archive` varchar(1) NOT NULL,
  `tags` text NOT NULL,
  `tags_` text NOT NULL,
  `image_2` varchar(255) NOT NULL,
  `image_3` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cid` (`cid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4483 ;

-- --------------------------------------------------------

--
-- Структура таблицы `catalog_s_news_cid`
--

CREATE TABLE IF NOT EXISTS `catalog_s_news_cid` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `col` int(15) NOT NULL DEFAULT '0',
  `cid` int(15) NOT NULL DEFAULT '0',
  `name` varchar(150) NOT NULL,
  `path` varchar(25) NOT NULL DEFAULT '0',
  `active` int(1) NOT NULL DEFAULT '1',
  `select` int(1) NOT NULL DEFAULT '1',
  `dateadd` date DEFAULT NULL,
  `dateedit` date DEFAULT NULL,
  `pos` int(15) NOT NULL DEFAULT '0',
  `metaData` text,
  `user` int(15) NOT NULL DEFAULT '0',
  `del` int(1) NOT NULL DEFAULT '0',
  `lang_group` int(15) NOT NULL DEFAULT '0',
  `id_lang` int(15) NOT NULL DEFAULT '0',
  `show_in_menu` varchar(1) NOT NULL,
  `key_word` varchar(50) NOT NULL,
  `link` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cid` (`cid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=104 ;

-- --------------------------------------------------------

--
-- Структура таблицы `catalog_text_info`
--

CREATE TABLE IF NOT EXISTS `catalog_text_info` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `col` int(15) NOT NULL DEFAULT '0',
  `cid` int(15) NOT NULL DEFAULT '0',
  `name` varchar(25) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `path` varchar(25) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `description` text COLLATE utf8_unicode_ci,
  `active` int(1) NOT NULL DEFAULT '1',
  `select` int(1) NOT NULL DEFAULT '1',
  `dateadd` date DEFAULT NULL,
  `dateedit` date DEFAULT NULL,
  `pos` int(15) NOT NULL DEFAULT '0',
  `metaData` text COLLATE utf8_unicode_ci,
  `user` int(15) NOT NULL DEFAULT '0',
  `del` int(1) NOT NULL DEFAULT '0',
  `lang_group` int(15) NOT NULL DEFAULT '0',
  `id_lang` int(15) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `cid` (`cid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Структура таблицы `catalog_users`
--

CREATE TABLE IF NOT EXISTS `catalog_users` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `col` int(15) NOT NULL DEFAULT '0',
  `cid` int(15) NOT NULL DEFAULT '0',
  `name` varchar(35) NOT NULL,
  `path` varchar(25) NOT NULL DEFAULT '0',
  `active` int(1) NOT NULL DEFAULT '1',
  `select` int(1) NOT NULL DEFAULT '1',
  `dateadd` date DEFAULT NULL,
  `dateedit` date DEFAULT NULL,
  `pos` int(15) NOT NULL DEFAULT '0',
  `metaData` text,
  `user` int(15) NOT NULL DEFAULT '0',
  `del` int(1) NOT NULL DEFAULT '0',
  `lang_group` int(15) NOT NULL DEFAULT '0',
  `id_lang` int(15) NOT NULL DEFAULT '0',
  `password` varchar(255) NOT NULL,
  `u_name` varchar(50) NOT NULL,
  `u_surname` varchar(25) NOT NULL,
  `u_fatchname` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `country` varchar(25) NOT NULL,
  `city` varchar(25) NOT NULL,
  `ration` double DEFAULT NULL,
  `type` varchar(5) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cid` (`cid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Структура таблицы `catalog_weather`
--

CREATE TABLE IF NOT EXISTS `catalog_weather` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `col` int(15) NOT NULL DEFAULT '0',
  `cid` int(15) NOT NULL DEFAULT '0',
  `name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(25) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` int(1) NOT NULL DEFAULT '1',
  `select` int(1) NOT NULL DEFAULT '1',
  `dateadd` date DEFAULT NULL,
  `dateedit` date DEFAULT NULL,
  `pos` int(15) NOT NULL DEFAULT '0',
  `metaData` text COLLATE utf8_unicode_ci,
  `user` int(15) NOT NULL DEFAULT '0',
  `del` int(1) NOT NULL DEFAULT '0',
  `lang_group` int(15) NOT NULL DEFAULT '0',
  `id_lang` int(15) NOT NULL DEFAULT '0',
  `w_day` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `w_nigth` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `w_status` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `day_` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cid` (`cid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5315 ;

-- --------------------------------------------------------

--
-- Структура таблицы `catalog_years`
--

CREATE TABLE IF NOT EXISTS `catalog_years` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `col` int(15) NOT NULL DEFAULT '0',
  `cid` int(15) NOT NULL DEFAULT '0',
  `name` varchar(25) NOT NULL DEFAULT '0',
  `path` varchar(25) NOT NULL DEFAULT '0',
  `active` int(1) NOT NULL DEFAULT '1',
  `select` int(1) NOT NULL DEFAULT '1',
  `dateadd` date DEFAULT NULL,
  `dateedit` date DEFAULT NULL,
  `pos` int(15) NOT NULL DEFAULT '0',
  `metaData` text,
  `user` int(15) NOT NULL DEFAULT '0',
  `del` int(1) NOT NULL DEFAULT '0',
  `lang_group` int(15) NOT NULL DEFAULT '0',
  `id_lang` int(15) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `cid` (`cid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Структура таблицы `cat_category`
--

CREATE TABLE IF NOT EXISTS `cat_category` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `name_table` varchar(255) CHARACTER SET cp1251 NOT NULL DEFAULT '',
  `owner` int(15) NOT NULL DEFAULT '0',
  `key_word` varchar(255) CHARACTER SET cp1251 NOT NULL DEFAULT '',
  `lang_group` int(15) NOT NULL DEFAULT '0',
  `id_lang` int(15) NOT NULL DEFAULT '0',
  `img_type` int(15) NOT NULL DEFAULT '0',
  `image` varchar(255) CHARACTER SET cp1251 NOT NULL DEFAULT '',
  `cid_table` varchar(255) CHARACTER SET cp1251 NOT NULL DEFAULT '',
  `pos` int(15) NOT NULL DEFAULT '0',
  `description` text CHARACTER SET cp1251 NOT NULL,
  `descriptionCID` int(11) NOT NULL DEFAULT '0',
  `descriptionID` int(11) NOT NULL DEFAULT '0',
  `userAdd` int(1) NOT NULL DEFAULT '0',
  `userFind` int(1) NOT NULL DEFAULT '0',
  `group` int(15) NOT NULL,
  `select` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `owner` (`owner`),
  KEY `id_lang` (`id_lang`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=253 ;

-- --------------------------------------------------------

--
-- Структура таблицы `cat_fields`
--

CREATE TABLE IF NOT EXISTS `cat_fields` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `cid` int(15) NOT NULL DEFAULT '0',
  `field` varchar(255) NOT NULL,
  `visible` int(1) NOT NULL DEFAULT '0',
  `type` varchar(255) NOT NULL,
  `size` int(15) NOT NULL DEFAULT '0',
  `id_lang` int(15) NOT NULL DEFAULT '0',
  `fcid` int(15) NOT NULL DEFAULT '0',
  `default_` varchar(255) NOT NULL,
  `best` int(1) NOT NULL DEFAULT '0',
  `cat_id` int(15) NOT NULL DEFAULT '0',
  `findUser` int(1) NOT NULL DEFAULT '0',
  `enable` int(1) NOT NULL DEFAULT '1',
  `first` int(1) NOT NULL DEFAULT '0',
  `pos` int(15) NOT NULL DEFAULT '0',
  `need` int(1) NOT NULL DEFAULT '0',
  `cat_multi` int(1) NOT NULL DEFAULT '0',
  `unicum` int(1) NOT NULL DEFAULT '0',
  `visibleUser` int(1) NOT NULL DEFAULT '1',
  `canDelete` int(1) NOT NULL DEFAULT '1',
  `userCategory` int(15) NOT NULL,
  `cat_filter` int(1) NOT NULL DEFAULT '0',
  `cat_notshowlist` int(1) NOT NULL DEFAULT '0',
  `dop_left` varchar(25) NOT NULL,
  `dop_right` varchar(25) NOT NULL,
  `coment` varchar(255) NOT NULL,
  `css_line` varchar(25) NOT NULL,
  `css_element` varchar(25) NOT NULL,
  `file_size` varchar(25) NOT NULL,
  `cat_add` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cid` (`cid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=242 ;

-- --------------------------------------------------------

--
-- Структура таблицы `cat_group`
--

CREATE TABLE IF NOT EXISTS `cat_group` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL DEFAULT '',
  `pos` int(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

-- --------------------------------------------------------

--
-- Структура таблицы `cat_items_to_items`
--

CREATE TABLE IF NOT EXISTS `cat_items_to_items` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `id_left` int(15) NOT NULL DEFAULT '0',
  `id_right` int(15) NOT NULL DEFAULT '0',
  `leftCid` varchar(50) DEFAULT '0',
  `rightCid` varchar(50) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id_left` (`id_left`),
  KEY `id_right` (`id_right`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `cat_news_tags`
--

CREATE TABLE IF NOT EXISTS `cat_news_tags` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `tag` varchar(25) NOT NULL DEFAULT '',
  `count_items` int(15) NOT NULL DEFAULT '0',
  `tag_translate` varchar(50) NOT NULL,
  `cid_id` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9145 ;

-- --------------------------------------------------------

--
-- Структура таблицы `cat_news_tags_relation`
--

CREATE TABLE IF NOT EXISTS `cat_news_tags_relation` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `news_id` int(15) NOT NULL DEFAULT '0',
  `tag_id` int(15) NOT NULL DEFAULT '0',
  `tag` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tag_id` (`tag_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=111233 ;

-- --------------------------------------------------------

--
-- Структура таблицы `cat_opt_category`
--

CREATE TABLE IF NOT EXISTS `cat_opt_category` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `cid` int(15) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `lang_group` int(15) NOT NULL DEFAULT '0',
  `id_lang` int(15) NOT NULL DEFAULT '0',
  `best` int(15) NOT NULL DEFAULT '0',
  `pos` int(15) NOT NULL DEFAULT '0',
  `css_line` varchar(25) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cid` (`cid`,`id_lang`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

-- --------------------------------------------------------

--
-- Структура таблицы `cat_temp_selected`
--

CREATE TABLE IF NOT EXISTS `cat_temp_selected` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `p_cid` int(15) DEFAULT NULL,
  `p_id` int(15) DEFAULT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=571 ;

-- --------------------------------------------------------

--
-- Структура таблицы `config`
--

CREATE TABLE IF NOT EXISTS `config` (
  `Value` varchar(255) NOT NULL DEFAULT '',
  `Name` varchar(50) NOT NULL,
  `InternalName` varchar(25) NOT NULL DEFAULT '',
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `type` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Структура таблицы `config_list`
--

CREATE TABLE IF NOT EXISTS `config_list` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `text` text,
  `id_lang` int(15) NOT NULL DEFAULT '0',
  `lang_group` int(15) NOT NULL DEFAULT '0',
  `internalname` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

-- --------------------------------------------------------

--
-- Структура таблицы `img_gallery`
--

CREATE TABLE IF NOT EXISTS `img_gallery` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `type` int(25) NOT NULL DEFAULT '0',
  `img` varchar(255) NOT NULL,
  `img2` varchar(255) NOT NULL,
  `img3` varchar(255) NOT NULL,
  `table_` varchar(255) NOT NULL,
  `lang_group` int(15) NOT NULL DEFAULT '0',
  `id_lang` int(15) NOT NULL DEFAULT '0',
  `cid` int(15) NOT NULL DEFAULT '0',
  `link` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `flash` varchar(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id_lang` (`id_lang`,`cid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2150 ;

-- --------------------------------------------------------

--
-- Структура таблицы `img_type`
--

CREATE TABLE IF NOT EXISTS `img_type` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '0',
  `type` varchar(255) NOT NULL DEFAULT '0',
  `width` int(5) NOT NULL DEFAULT '0',
  `height` int(5) NOT NULL DEFAULT '0',
  `width2` int(5) NOT NULL DEFAULT '0',
  `height2` int(5) NOT NULL DEFAULT '0',
  `width3` int(5) NOT NULL DEFAULT '0',
  `height3` int(5) NOT NULL DEFAULT '0',
  `dop` varchar(15) NOT NULL,
  `optimization` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

-- --------------------------------------------------------

--
-- Структура таблицы `lang`
--

CREATE TABLE IF NOT EXISTS `lang` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `name` varchar(15) NOT NULL,
  `prefix` varchar(5) NOT NULL,
  `best` int(1) NOT NULL DEFAULT '0',
  `image` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Структура таблицы `log_add`
--

CREATE TABLE IF NOT EXISTS `log_add` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `p_cid` int(15) DEFAULT NULL,
  `p_id` int(15) DEFAULT NULL,
  `date` date NOT NULL,
  `user` int(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5832 ;

-- --------------------------------------------------------

--
-- Структура таблицы `m_ajax_files`
--

CREATE TABLE IF NOT EXISTS `m_ajax_files` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) CHARACTER SET cp1251 NOT NULL DEFAULT '',
  `src` varchar(50) CHARACTER SET cp1251 NOT NULL DEFAULT '0',
  `title` varchar(100) CHARACTER SET cp1251 NOT NULL DEFAULT '0',
  `visible` enum('0','1') CHARACTER SET cp1251 DEFAULT '1',
  `pos` int(11) NOT NULL DEFAULT '0',
  `cat` int(11) NOT NULL DEFAULT '0',
  `sort` varchar(25) CHARACTER SET cp1251 NOT NULL DEFAULT '0',
  `kol` int(15) NOT NULL DEFAULT '10',
  `sdesc` varchar(6) CHARACTER SET cp1251 NOT NULL DEFAULT '0',
  `tabl` varchar(255) CHARACTER SET cp1251 NOT NULL DEFAULT '0',
  `text` text CHARACTER SET cp1251 NOT NULL,
  `InMenu` int(1) NOT NULL DEFAULT '0',
  `link` varchar(255) CHARACTER SET cp1251 NOT NULL DEFAULT '',
  `access` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='InnoDB free: 32768 kB' AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Структура таблицы `m_category`
--

CREATE TABLE IF NOT EXISTS `m_category` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET cp1251 NOT NULL DEFAULT '',
  `visible` enum('0','1') CHARACTER SET cp1251 DEFAULT '1',
  `pos` int(25) NOT NULL DEFAULT '0',
  `text` text CHARACTER SET cp1251 NOT NULL,
  `access` int(15) NOT NULL DEFAULT '0',
  `inFirst` int(1) NOT NULL,
  `image` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='InnoDB free: 32768 kB' AUTO_INCREMENT=14 ;

-- --------------------------------------------------------

--
-- Структура таблицы `m_files`
--

CREATE TABLE IF NOT EXISTS `m_files` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `src` varchar(50) NOT NULL DEFAULT '0',
  `title` varchar(100) NOT NULL DEFAULT '0',
  `visible` enum('0','1') DEFAULT '1',
  `pos` int(11) NOT NULL DEFAULT '0',
  `cat` int(11) NOT NULL DEFAULT '0',
  `sort` varchar(25) NOT NULL DEFAULT '0',
  `kol` int(15) NOT NULL DEFAULT '10',
  `sdesc` varchar(6) NOT NULL DEFAULT '0',
  `tabl` varchar(255) NOT NULL DEFAULT '0',
  `text` text NOT NULL,
  `InMenu` int(1) NOT NULL DEFAULT '0',
  `link` varchar(255) NOT NULL,
  `access` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `cat` (`cat`),
  KEY `cat_2` (`cat`),
  KEY `cat_3` (`cat`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='InnoDB free: 32768 kB' AUTO_INCREMENT=342 ;

-- --------------------------------------------------------

--
-- Структура таблицы `m_method`
--

CREATE TABLE IF NOT EXISTS `m_method` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `files_id` int(15) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `q_answers`
--

CREATE TABLE IF NOT EXISTS `q_answers` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `qid` int(15) NOT NULL DEFAULT '0',
  `name` varchar(100) NOT NULL DEFAULT '',
  `correct` int(1) NOT NULL DEFAULT '0',
  `cid` int(15) NOT NULL,
  `lang_group` int(15) NOT NULL,
  `id_lang` int(15) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `qid` (`qid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

-- --------------------------------------------------------

--
-- Структура таблицы `q_category`
--

CREATE TABLE IF NOT EXISTS `q_category` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `pos` int(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Структура таблицы `q_questions`
--

CREATE TABLE IF NOT EXISTS `q_questions` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `cid` int(15) NOT NULL,
  `date` date NOT NULL,
  `pos` int(15) NOT NULL,
  `lang_group` int(15) NOT NULL,
  `id_lang` int(15) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cid` (`cid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Структура таблицы `q_useranswers`
--

CREATE TABLE IF NOT EXISTS `q_useranswers` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `qid` int(15) NOT NULL DEFAULT '0',
  `name` varchar(100) NOT NULL DEFAULT '',
  `cid` int(15) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `other` text NOT NULL,
  `user` int(15) NOT NULL,
  `date` datetime NOT NULL,
  `userip` varchar(25) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `qid` (`qid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Структура таблицы `res_css`
--

CREATE TABLE IF NOT EXISTS `res_css` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `src` varchar(255) NOT NULL,
  `pages` text,
  `pos` int(15) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

-- --------------------------------------------------------

--
-- Структура таблицы `sh_bloki`
--

CREATE TABLE IF NOT EXISTS `sh_bloki` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '0',
  `key_word` varchar(255) NOT NULL,
  `access` int(3) NOT NULL DEFAULT '0',
  `cache` int(1) NOT NULL DEFAULT '0',
  `cache_date` varchar(255) NOT NULL DEFAULT '0',
  `cache_interval` varchar(255) CHARACTER SET cp1251 NOT NULL DEFAULT '0',
  `page` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Структура таблицы `sh_files`
--

CREATE TABLE IF NOT EXISTS `sh_files` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  `file` varchar(150) NOT NULL,
  `pos` int(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Структура таблицы `sh_functions`
--

CREATE TABLE IF NOT EXISTS `sh_functions` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `template` int(15) NOT NULL DEFAULT '0',
  `function` varchar(255) NOT NULL,
  `text_function` text,
  `key_word` varchar(255) NOT NULL,
  `system` int(1) NOT NULL DEFAULT '0',
  `parametrs` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `cid` int(25) NOT NULL DEFAULT '0',
  `code` text NOT NULL,
  `parametrsin` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cid` (`cid`),
  KEY `cid_2` (`cid`),
  KEY `cid_3` (`cid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=169 ;

-- --------------------------------------------------------

--
-- Структура таблицы `sh_functions_category`
--

CREATE TABLE IF NOT EXISTS `sh_functions_category` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `pos` int(15) NOT NULL DEFAULT '0',
  `file` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

-- --------------------------------------------------------

--
-- Структура таблицы `sh_list`
--

CREATE TABLE IF NOT EXISTS `sh_list` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `text` text,
  `owner` int(15) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `key_word` varchar(255) NOT NULL,
  `dop` int(1) NOT NULL DEFAULT '0',
  `parametrs` varchar(255) NOT NULL,
  `visible` int(1) NOT NULL DEFAULT '1',
  `system` int(1) NOT NULL DEFAULT '0',
  `type` int(15) NOT NULL DEFAULT '0',
  `page` int(15) NOT NULL DEFAULT '0',
  `description` text NOT NULL,
  `kesh` int(1) NOT NULL DEFAULT '0',
  `file` int(25) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `owner` (`owner`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=951 ;

-- --------------------------------------------------------

--
-- Структура таблицы `sh_pages`
--

CREATE TABLE IF NOT EXISTS `sh_pages` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `link` varchar(25) NOT NULL,
  `ForAll` int(1) NOT NULL DEFAULT '0',
  `FirstPage` int(1) NOT NULL DEFAULT '0',
  `template` int(15) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Структура таблицы `sh_schema`
--

CREATE TABLE IF NOT EXISTS `sh_schema` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '0',
  `template` varchar(255) NOT NULL,
  `best` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Структура таблицы `sh_schema_list`
--

CREATE TABLE IF NOT EXISTS `sh_schema_list` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `id_schema` int(15) NOT NULL DEFAULT '0',
  `id_bloki` int(15) NOT NULL DEFAULT '0',
  `id_template` int(15) NOT NULL DEFAULT '0',
  `access` int(3) NOT NULL DEFAULT '0',
  `url` varchar(255) NOT NULL,
  `best` int(15) NOT NULL DEFAULT '0',
  `page` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id_bloki` (`id_bloki`),
  KEY `id_template` (`id_template`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=95 ;

-- --------------------------------------------------------

--
-- Структура таблицы `s_sections`
--

CREATE TABLE IF NOT EXISTS `s_sections` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `parent` int(15) NOT NULL DEFAULT '0',
  `lang_group` int(15) NOT NULL DEFAULT '0',
  `id_lang` int(15) NOT NULL DEFAULT '0',
  `internalname` varchar(25) NOT NULL,
  `path` varchar(255) NOT NULL,
  `template` int(25) NOT NULL DEFAULT '0',
  `description` text NOT NULL,
  `inmap` int(1) NOT NULL DEFAULT '0',
  `meta_description` text NOT NULL,
  `meta_keyvords` text NOT NULL,
  `title` varchar(255) NOT NULL,
  `pos` int(11) NOT NULL DEFAULT '0',
  `default_page` int(1) NOT NULL DEFAULT '0',
  `engine_template` int(15) NOT NULL DEFAULT '0',
  `visible` int(1) NOT NULL DEFAULT '1',
  `error404` int(1) NOT NULL DEFAULT '0',
  `gallery` int(15) NOT NULL DEFAULT '0',
  `inmenu` int(1) NOT NULL DEFAULT '0',
  `componentCategory` int(15) NOT NULL,
  `isIdPage` int(1) NOT NULL DEFAULT '0',
  `itemIdOrName` varchar(255) NOT NULL,
  `key_words` text NOT NULL,
  `key_words_cash` text NOT NULL,
  `access` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=336 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
