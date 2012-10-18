<?php

class m121018_133629_change_catalognews_image_not_required extends CDbMigration
{
	public function up()
	{
        $sql = file_get_contents(dirname(__FILE__).DIRECTORY_SEPARATOR.__CLASS__.'_up.sql');
        $this->getDbConnection()->createCommand($sql)->execute();
	}

	public function down()
	{
		echo "m121018_133629_change_catalognews_image_not_required does not support migration down.\n";
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