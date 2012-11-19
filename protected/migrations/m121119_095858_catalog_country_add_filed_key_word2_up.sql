ALTER TABLE `catalog_country` ADD `key_word2` VARCHAR( 50 ) NOT NULL COMMENT 'слаг в дугом падеже ( например политика УЗБЕКИСТАНА )';
UPDATE `catalog_country` SET `key_word2` = 'uzbekistana' WHERE `catalog_country`.`id` =1;

ALTER TABLE `catalog_country` ADD `name2` VARCHAR( 50 ) NOT NULL COMMENT 'слаг в дугом падеже ( например политика УЗБЕКИСТАНА )';
UPDATE `yii-news`.`catalog_country` SET `name2` = 'Узбекистана' WHERE `catalog_country`.`id` =1;
