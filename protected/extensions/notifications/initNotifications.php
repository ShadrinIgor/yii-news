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

    public function send( $key, $type, array $arrayParams = array() )
    {
        $notification = Notifications::fetchAll(
                DBQueryParamsClass::CreateParams()
                    ->setConditions( "key=:key" )
                    ->setParams( array( ":key"=>$key ) )
            );

        if( !empty( $notification ) && sizeof( $notification )>0 )
        {
            $notificationItems = NotificationsItems::fetchAll(
                DBQueryParamsClass::CreateParams()
                    ->setConditions( "notification_id=:notification_id" )
                    ->setParams( array( ":notification_id"=>$notification->id ) )
            );

            if( !empty( $notificationItems ) && sizeof( $notificationItems )>0 )
            {
                for( $i=0;$i<sizeof( $notificationItems );$i++ )
                {

                }
            }
                else return false;
        }
            else return false;
    }
}
?>
