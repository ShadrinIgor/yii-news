<?php

class m121008_114806_add_i18n_error extends CDbMigration
{
    public function up()
    {
        $sql = file_get_contents(dirname(__FILE__).DIRECTORY_SEPARATOR.__CLASS__.'_up.sql');
        $this->getDbConnection()->createCommand($sql)->execute();
    }

    public function down()
    {
        //$sql = file_get_contents(dirname(__FILE__).DIRECTORY_SEPARATOR.__CLASS__.'_down.sql');
        //$this->getDbConnection()->createCommand($sql)->execute();
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