ALTER TABLE `img_gallery` ENGINE = InnoDB;
INSERT INTO `yii-news`.`img_gallery` (`id`, `type`, `img`, `img2`, `img3`, `table_`, `lang_group`, `id_lang`, `cid`, `link`, `title`, `flash`) VALUES ('2147483647', '0', '', '', '', '', '0', '0', '0', '', '', '0');
UPDATE `yii-news`.`img_gallery` SET `id` = '0' WHERE `img_gallery`.`id` =2147483647;