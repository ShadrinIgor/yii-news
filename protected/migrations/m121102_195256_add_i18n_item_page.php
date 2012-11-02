<?php

class m121102_195256_add_i18n_item_page extends CDbMigration
{
	public function up()
	{
        $sql="INSERT INTO `yii-news`.`i18n` (`category` ,`message`)VALUES ('page', 'Новости')";
        $this->getDbConnection()->createCommand($sql)->execute();

        $sql="INSERT INTO `yii-news`.`i18n_translate` (`id` ,`language` ,`translation`)VALUES (NULL , 'page', 'Новости')";
        $this->getDbConnection()->createCommand($sql)->execute();
	}

	public function down()
	{
		echo "m121102_195256_add_i18n_item_page does not support migration down.\n";
		return false;
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}