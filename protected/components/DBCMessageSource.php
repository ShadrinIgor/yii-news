<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Игорь
 * Date: 08.10.12
 * To change this template use File | Settings | File Templates.
 */
class DBCMessageSource extends CMessageSource
{
    public function loadmessages( $category, $language)
    {
        // TODO Надо будет доделать сохранение сообщений
        //Yii::app()->db->createCommand( "SELECT * FROM i18n WHERE category='".$category."'" );
    }

    public function translateMessage( $category, $message, $language )
    {
        $result = Yii::app()->db->createCommand( "SELECT b.translation FROM i18n a, i18n_translate b WHERE a.category='".$category."' AND a.message='".$message."' AND b.language='".$language."'" )->queryColumn();
        return $result[0];
    }
}
