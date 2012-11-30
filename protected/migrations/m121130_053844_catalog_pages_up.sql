UPDATE cat_category SET name_table='catalog_pages' WHERE name_table='catalog_text_info';
RENAME TABLE `catalog_text_info` TO `catalog_pages` ;
ALTER TABLE `catalog_pages` ENGINE = InnoDB;
ALTER TABLE `catalog_pages` DROP `cid` ,
DROP `select` ,
DROP `user` ;
ALTER TABLE `catalog_pages` ADD `key_word` VARCHAR( 255 ) NOT NULL COMMENT 'ключевое слово';
ALTER TABLE `catalog_pages` CHANGE `name` `name` VARCHAR( 25 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL;
ALTER TABLE `catalog_pages` DROP `path`;
UPDATE `yii-news`.`catalog_pages` SET `key_word` = 'contacts' WHERE `catalog_pages`.`id` =1;