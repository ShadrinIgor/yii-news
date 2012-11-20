RENAME TABLE `img_gallery` TO `cat_gallery` ;
ALTER TABLE `cat_gallery` ENGINE = InnoDB;
ALTER TABLE `cat_gallery` DROP `lang_group` , DROP `id_lang` ;
ALTER TABLE `cat_gallery` CHANGE `flash` `flash` INT( 1 ) NULL DEFAULT '0';
ALTER TABLE `cat_gallery` CHANGE `img2` `img2` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL ,
CHANGE `img3` `img3` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL ,
CHANGE `link` `link` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL ,
CHANGE `title` `title` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL ,
CHANGE `flash` `flash` INT( 1 ) NULL DEFAULT '0';
DROP TABLE `img_type`;
ALTER TABLE `cat_gallery` CHANGE `cid` `item_id` INT( 15 ) NOT NULL;
ALTER TABLE `cat_gallery` ADD `del` INT NOT NULL DEFAULT '0';
ALTER TABLE `cat_gallery` CHANGE `img` `image` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
CHANGE `img2` `image_2` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
CHANGE `img3` `image_3` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;

INSERT INTO `cat_gallery` (`id`, `type`, `img`, `img2`, `img3`, `table_`, `lang_group`, `id_lang`, `cid`, `link`, `title`, `flash`) VALUES ('2147483647', '0', '', '', '', '', '0', '0', '0', '', '', '0');
UPDATE `cat_gallery` SET `id` = '0' WHERE `img_gallery`.`id` =2147483647;