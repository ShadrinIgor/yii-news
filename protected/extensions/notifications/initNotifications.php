<?php

/**
 */

class initNotifications extends CApplicationComponent
{
    /*
     * Инициализация
     */
    public function init( )
    {
        Yii::import("ext.notifications.models.*");
    }


}
?>
