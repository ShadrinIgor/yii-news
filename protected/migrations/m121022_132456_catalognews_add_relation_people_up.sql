ALTER TABLE `catalog_people` ENGINE = InnoDB;
INSERT INTO `yii-news`.`catalog_people` (`id`, `col`, `cid`, `name`, `path`, `description`, `image`, `active`, `select`, `dateadd`, `dateedit`, `pos`, `metaData`, `user`, `del`, `lang_group`, `id_lang`, `www`, `key_word`, `country`, `cid_id`) VALUES ( 2147483647, '0', '0', '', '0', NULL, '0', '1', '1', NULL, NULL, '0', NULL, '0', '0', '0', '0', '', '', '', '');
UPDATE `yii-news`.`catalog_people` SET `id` = '0' WHERE `catalog_people`.`id` =2147483647;
ALTER TABLE catalog_news ADD FOREIGN KEY (people) REFERENCES catalog_people(id);