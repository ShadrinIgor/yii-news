<?php

class m121212_190332_i18_add_people_title extends CDbMigration
{
	public function up()
	{
        $sql = file_get_contents(dirname(__FILE__).DIRECTORY_SEPARATOR.__CLASS__.'_up.sql');
        $this->getDbConnection()->createCommand($sql)->execute();
	}

	public function down()
	{
		echo "m121212_190332_i18_add_people_title does not support migration down.\n";
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