ALTER TABLE `catalog_country` ENGINE = InnoDB;
INSERT INTO `yii-news`.`catalog_country` (`id`, `col`, `cid`, `name`, `path`, `active`, `select`, `dateadd`, `dateedit`, `pos`, `metaData`, `user`, `del`, `lang_group`, `id_lang`, `key_word`) VALUES ('555555', '0', '0', '0', '0', '1', '1', NULL, NULL, '0', NULL, '0', '0', '0', '0', '');
UPDATE `yii-news`.`catalog_country` SET `id` = '0' WHERE `catalog_country`.`id` =555555;
ALTER TABLE catalog_news ADD FOREIGN KEY (country) REFERENCES catalog_country(id);