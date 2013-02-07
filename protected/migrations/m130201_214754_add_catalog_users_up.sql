DROP TABLE IF EXISTS `catalog_users`;
CREATE TABLE IF NOT EXISTS `catalog_users` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `col` int(15) NOT NULL DEFAULT '0',
  `cid` int(15) NOT NULL DEFAULT '0',
  `name` varchar(35) NOT NULL,
  `active` int(1) NOT NULL DEFAULT '1',
  `dateadd` date DEFAULT NULL,
  `dateedit` date DEFAULT NULL,
  `pos` int(15) NOT NULL DEFAULT '0',
  `metaData` text,
  `user` int(15) NOT NULL DEFAULT '0',
  `del` int(1) NOT NULL DEFAULT '0',
  `id_lang` int(15) NOT NULL DEFAULT '0',
  `password` varchar(255) NOT NULL,
  `u_name` varchar(50) NOT NULL,
  `u_surname` varchar(25) NOT NULL,
  `u_fatchname` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `country` int(25) NOT NULL,
  `city` int(25) NOT NULL,
  `type` int(5) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cid` (`cid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;