ALTER TABLE `cat_news_tags` ENGINE = InnoDB;
ALTER TABLE `cat_news_tags_relation` ENGINE = InnoDB;
INSERT INTO `cat_news_tags_relation` (`id`, `news_id`, `tag_id`, `tag`) VALUES ( 999999, '0', '0', '');
UPDATE `cat_news_tags_relation` SET `id` = '0' WHERE `cat_news_tags_relation`.`id` =999999;

INSERT INTO `cat_news_tags` (`id`, `date`, `tag`, `count_items`, `tag_translate`, `cid_id`) VALUES ('999999', NULL, '', '0', '', '');
UPDATE `cat_news_tags` SET `id` = '0' WHERE `cat_news_tags`.`id` =999999;

ALTER TABLE cat_news_tags_relation ADD FOREIGN KEY (tag_id) REFERENCES cat_news_tags(id);
ALTER TABLE cat_news_tags_relation ADD FOREIGN KEY (news_id ) REFERENCES catalog_news(id);