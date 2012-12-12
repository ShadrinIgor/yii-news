INSERT INTO `yii-news`.`i18n` (`id` ,`category` ,`message`)VALUES (8 , 'page', 'Люди');
INSERT INTO `yii-news`.`i18n_translate` (`id` ,`language` ,`translation`)VALUES ('8', 'ru', 'Люди');

ALTER TABLE `catalog_people` CHANGE `country` `country` INT( 25 ) NOT NULL ,
CHANGE `cid_id` `cid_id` INT( 25 ) NOT NULL ;

ALTER TABLE `catalog_people_cid` ENGINE = InnoDB;
INSERT INTO `yii-news`.`catalog_people_cid` (`id` ,`col` ,`cid` ,`name` ,`path` ,`active` ,`select` ,`dateadd` ,`dateedit` ,`pos` ,`metaData`, `del` ,`lang_group` ,`id_lang`) VALUES ('999999', '0', '0', '0', '0', '1', '1', NULL , NULL , '0', NULL , '0', '0', '0', '0');
UPDATE `catalog_people_cid` SET `id` = '0' WHERE `catalog_people_cid`.`id` =999999;

ALTER TABLE catalog_people ADD FOREIGN KEY (country) REFERENCES catalog_country(id);
ALTER TABLE catalog_people ADD FOREIGN KEY (cid_id) REFERENCES catalog_people_cid(id);

ALTER TABLE `catalog_people_cid` ADD `key_word` VARCHAR( 50 ) NOT NULL;