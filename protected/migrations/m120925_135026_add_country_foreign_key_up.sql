ALTER TABLE `catalog_country` ENGINE = InnoDB;
INSERT INTO catalog_cid( id ) values(0);
ALTER TABLE catalog_news ADD FOREIGN KEY (country) REFERENCES catalog_country(id);
