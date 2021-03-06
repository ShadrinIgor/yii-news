-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Фев 16 2013 г., 18:35
-- Версия сервера: 5.5.24-log
-- Версия PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `yii-news`
--

-- --------------------------------------------------------

--
-- Структура таблицы `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `key` varchar(25) NOT NULL,
  `name` varchar(25) NOT NULL,
  `del` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Структура таблицы `notifications_items`
--

DROP TABLE IF EXISTS `notifications_items`;
CREATE TABLE IF NOT EXISTS `notifications_items` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `notification_id` int(15) NOT NULL,
  `message_id` int(15) NOT NULL,
  `user_id` int(15) NOT NULL,
  `date` int(15) NOT NULL DEFAULT '0',
  `del` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `notification_id` (`notification_id`),
  KEY `message_id` (`message_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Структура таблицы `notifications_messages`
--

DROP TABLE IF EXISTS `notifications_messages`;
CREATE TABLE IF NOT EXISTS `notifications_messages` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `notification_id` int(15) NOT NULL,
  `type` varchar(25) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `mesage` varchar(25) NOT NULL,
  `template` varchar(25) DEFAULT '',
  `copy_sender` varchar(25) DEFAULT '',
  `del` int(1) NOT NULL DEFAULT '0',
  `send_from` varchar(25) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `type_id` (`type`),
  KEY `notification_id` (`notification_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `notifications_items`
--
ALTER TABLE `notifications_items`
  ADD CONSTRAINT `notifications_items_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `catalog_users` (`id`),
  ADD CONSTRAINT `notifications_items_ibfk_1` FOREIGN KEY (`notification_id`) REFERENCES `notifications` (`id`),
  ADD CONSTRAINT `notifications_items_ibfk_2` FOREIGN KEY (`message_id`) REFERENCES `notifications_messages` (`id`);

--
-- Ограничения внешнего ключа таблицы `notifications_messages`
--
ALTER TABLE `notifications_messages`
  ADD CONSTRAINT `notifications_messages_ibfk_2` FOREIGN KEY (`notification_id`) REFERENCES `notifications` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
